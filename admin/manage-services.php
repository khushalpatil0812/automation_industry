<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

$admin = new Admin();
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$service = new Service();
$category = new Category($pdo);
$message = '';

// Handle AJAX requests from view-service.php
if (isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    if ($_POST['action'] === 'delete' && isset($_POST['service_id'])) {
        $id = intval($_POST['service_id']);
        if ($service->deleteService($id)) {
            echo json_encode(['success' => true, 'message' => 'Service deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error deleting service']);
        }
        exit;
    }
    
    if ($_POST['action'] === 'toggle_status' && isset($_POST['service_id'])) {
        $id = intval($_POST['service_id']);
        // Get current status and toggle it
        $currentService = $service->getServiceByIdAdmin($id);
        if ($currentService) {
            $newStatus = $currentService['is_active'] ? 0 : 1;
            if ($service->setServiceStatus($id, $newStatus)) {
                echo json_encode(['success' => true, 'message' => 'Service status updated', 'new_status' => $newStatus]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error updating service status']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Service not found']);
        }
        exit;
    }
}

// Handle delete service
if (isset($_POST['delete_service'])) {
    $id = $_POST['service_id'];
    if ($service->deleteService($id)) {
        $message = '<div class="alert alert-success">Service deleted successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error deleting service.</div>';
    }
}

// Handle activate/deactivate service
if (isset($_POST['toggle_service'])) {
    $id = intval($_POST['service_id']);
    $status = ($_POST['toggle_service'] === 'activate') ? 1 : 0;
    if ($service->setServiceStatus($id, $status)) {
        $message = '<div class="alert alert-success">Service status updated!</div>';
    } else {
        $message = '<div class="alert alert-error">Error updating status.</div>';
    }
}

// Handle add/delete category
if (isset($_POST['add_category'])) {
    $name = trim($_POST['new_category_name']);
    $desc = trim($_POST['new_category_desc']);
    if ($category->createCategory($name, $desc, null)) {
        $message = '<div class="alert alert-success">Category added successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error adding category.</div>';
    }
}
if (isset($_POST['delete_category'])) {
    $id = $_POST['category_id'];
    if ($category->deleteCategory($id)) {
        $message = '<div class="alert alert-success">Category deleted successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error deleting category.</div>';
    }
}

// Get all services and categories
$services = $service->getAllServices();
$categories = $category->getAllCategories();
?>

<?php include 'includes/admin-header.php'; ?>

<link rel="stylesheet" href="../assets/css/manage-service.css">

<div class="admin-content">
    <div class="content-header">
        <h1>Manage Services</h1>
        <div class="header-actions">
            <a href="add-service.php" class="btn btn-primary">Add New Service</a>
        </div>
    </div>

    <?php echo $message; ?>

    <!-- Category Management -->
    <div class="card">
        <div class="card-header">
            <h2>Manage Categories</h2>
        </div>
        <div class="card-body">
            <form method="POST" class="form-inline">
                <input type="text" name="new_category_name" placeholder="New category name" required>
                <input type="text" name="new_category_desc" placeholder="Description">
                <button type="submit" name="add_category" class="btn btn-sm btn-primary">Add Category</button>
            </form>
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cat['name']); ?></td>
                            <td><?php echo htmlspecialchars($cat['description']); ?></td>
                            <td>
                                <form method="POST" onsubmit="return confirm('Delete this category?')">
                                    <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                                    <button type="submit" name="delete_category" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Services List -->
    <div class="card">
        <div class="card-header">
            <h2>Services (<?php echo count($services); ?>)</h2>
        </div>
        <div class="card-body">
            <div class="services-grid">
                <?php foreach ($services as $svc): ?>
                <div class="service-item">
                    <div class="service-content">
                        <h3><?php echo htmlspecialchars($svc['title']); ?></h3>
                        <p class="service-category">
                            <strong>Category:</strong> <?php echo htmlspecialchars($svc['category_name'] ?? 'No Category'); ?>
                        </p>
                        <p><strong>Status:</strong> 
                           <?php echo $svc['is_active'] ? '<span class="status-active">Active</span>' : '<span class="status-inactive">Inactive</span>'; ?>
                        </p>
                        <p class="service-description">
                            <?php echo substr(htmlspecialchars($svc['description']), 0, 100) . '...'; ?>
                        </p>
                        <div class="service-actions">
                            <a href="edit-service.php?id=<?php echo $svc['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            
                            <!-- Toggle Active/Inactive -->
                            <form method="POST">
                                <input type="hidden" name="service_id" value="<?php echo $svc['id']; ?>">
                                <?php if ($svc['is_active']): ?>
                                    <button type="submit" name="toggle_service" value="deactivate" class="btn btn-sm btn-warning">
                                        Deactivate
                                    </button>
                                <?php else: ?>
                                    <button type="submit" name="toggle_service" value="activate" class="btn btn-sm btn-success">
                                        Activate
                                    </button>
                                <?php endif; ?>
                            </form>

                            <!-- Delete -->
                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this service?')">
                                <input type="hidden" name="service_id" value="<?php echo $svc['id']; ?>">
                                <button type="submit" name="delete_service" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            
            <?php if (empty($services)): ?>
            <div class="empty-state">
                <p>No services found. <a href="add-service.php">Add your first service</a></p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
