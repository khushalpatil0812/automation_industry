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
    $icon = trim($_POST['new_category_icon']);
    if ($category->createCategory($name, $desc, $icon)) {
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

<div class="admin-content">
    <div class="content-header">
        <h1>Manage Services</h1>
        <div class="header-actions">
            <a href="add-service.php" class="btn btn-primary">Add New Service</a>
        </div>
    </div>

    <?php echo $message; ?>

    <!-- Category Management Section -->
    <div class="card">
        <div class="card-header">
            <h2>Manage Categories</h2>
        </div>
        <div class="card-body">
            <form method="POST" class="form-inline" style="display:flex;gap:1rem;flex-wrap:wrap;align-items:center;">
                <input type="text" name="new_category_name" placeholder="New category name" required style="padding:0.3rem;">
                <input type="text" name="new_category_desc" placeholder="Description" style="padding:0.3rem;">
                <input type="text" name="new_category_icon" placeholder="Icon (optional)" style="padding:0.3rem;">
                <button type="submit" name="add_category" class="btn btn-sm btn-primary">Add Category</button>
            </form>
            <div style="margin-top:1rem;">
                <table class="table" style="width:100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cat['name']); ?></td>
                            <td><?php echo htmlspecialchars($cat['description']); ?></td>
                            <td><?php echo htmlspecialchars($cat['icon']); ?></td>
                            <td>
                                <form method="POST" style="display:inline;" onsubmit="return confirm('Delete this category?')">
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
                    <div class="service-image">
                        <img src="<?php echo htmlspecialchars($svc['image']); ?>" alt="<?php echo htmlspecialchars($svc['title']); ?>">
                    </div>
                    <div class="service-content">
                        <h3><?php echo htmlspecialchars($svc['title']); ?></h3>
                        <p class="service-category"><strong>Category:</strong> <?php echo htmlspecialchars($svc['title'] ?? 'No Category'); ?></p>
                        <p><strong>Status:</strong> 
                           <?php echo $svc['is_active'] ? '<span style="color:green;">Active</span>' : '<span style="color:red;">Inactive</span>'; ?>
                        </p>
                        <p class="service-description"><?php echo substr(htmlspecialchars($svc['description']), 0, 100) . '...'; ?></p>
                        <div class="service-actions">
                            <a href="edit-service.php?id=<?php echo $svc['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            
                            <!-- Toggle Active/Inactive -->
                            <form method="POST" style="display:inline;">
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
                            <form method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this service?')">
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

<style>
.admin-content { max-width: 1200px; margin: 0 auto; padding: 2rem; font-family: 'Segoe UI', Arial, sans-serif; }
.content-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
.header-actions .btn { padding: 0.5rem 1.2rem; font-size: 1rem; border-radius: 4px; }
.card { background: #fff; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.07); margin-bottom: 2rem; border: 1px solid #eee; }
.card-header { border-bottom: 1px solid #eee; padding: 1rem 1.5rem; background: #f8f9fa; }
.card-body { padding: 1.5rem; }
.services-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 2rem; }
.service-item { background: #f9f9f9; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.05); display: flex; gap: 1.2rem; padding: 1.2rem; align-items: flex-start; border: 1px solid #e5e5e5; }
.service-image img { width: 80px; height: 80px; object-fit: cover; border-radius: 8px; border: 1px solid #ddd; }
.service-content { flex: 1; }
.service-category { font-size: 0.95rem; color: #888; margin-bottom: 0.5rem; }
.service-description { font-size: 1rem; margin-bottom: 0.8rem; }
.service-actions { display: flex; gap: 0.7rem; flex-wrap: wrap; }
.btn { background: #007bff; color: #fff; border: none; padding: 0.4rem 1rem; border-radius: 4px; cursor: pointer; transition: background 0.2s; text-decoration: none; font-size: 0.98rem; }
.btn:hover { background: #0056b3; }
.btn-secondary { background: #6c757d; }
.btn-secondary:hover { background: #495057; }
.btn-danger { background: #dc3545; }
.btn-danger:hover { background: #a71d2a; }
.btn-warning { background: #ffc107; color: #000; }
.btn-warning:hover { background: #e0a800; }
.btn-success { background: #28a745; }
.btn-success:hover { background: #1e7e34; }
.btn-sm { font-size: 0.92rem; padding: 0.3rem 0.7rem; }
.empty-state { text-align: center; color: #888; padding: 2rem 0; }
.alert { padding: 0.8rem 1.2rem; border-radius: 4px; margin-bottom: 1rem; }
.alert-success { background: #e6f9e6; color: #2e7d32; border: 1px solid #b2dfdb; }
.alert-error { background: #fdecea; color: #c62828; border: 1px solid #f5c6cb; }
</style>

<?php include 'includes/admin-footer.php'; ?>
