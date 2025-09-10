<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

$admin = new Admin($pdo);
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$service = new Service($pdo);
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

// Get filter parameters
$category_filter = isset($_GET['category']) ? $_GET['category'] : '';
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Get services based on filters
if ($category_filter) {
    $services = $service->getServicesByCategory($category_filter);
} else {
    $services = $service->getAllServices();
}

// Apply search filter if provided
if ($search) {
    $services = array_filter($services, function($s) use ($search) {
        return stripos($s['title'], $search) !== false || stripos($s['description'], $search) !== false;
    });
}

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

    <!-- Filters -->
    <div class="card">
        <div class="card-body">
            <form method="GET" class="filters-form">
                <div class="form-row">
                    <div class="form-group">
                        <label for="category">Filter by Category</label>
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>" <?php echo $category_filter == $cat['id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="search">Search Services</label>
                        <input type="text" id="search" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by title or description">
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">Filter</button>
                        <a href="manage-services.php" class="btn btn-outline">Clear</a>
                    </div>
                </div>
            </form>
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
                        <p class="service-category"><?php echo htmlspecialchars($svc['category_name'] ?? 'No Category'); ?></p>
                        <p class="service-description"><?php echo substr(htmlspecialchars($svc['description']), 0, 100) . '...'; ?></p>
                        <div class="service-actions">
                            <a href="edit-service.php?id=<?php echo $svc['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this service?')">
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
