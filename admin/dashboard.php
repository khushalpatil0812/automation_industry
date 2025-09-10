<?php
require_once '../config/config.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';

$admin = new Admin();

// Check if logged in
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$service = new Service();
$services = $service->getAllServices();
$categories = $service->getCategories();

// Get statistics
$total_services = count($services);
$category_counts = array_count_values(array_column($services, 'category'));

include 'includes/admin-header.php';
?>

<main class="admin-main">
    <div class="admin-container">
        <div class="page-header">
            <h1>Dashboard</h1>
            <p>Manage your business services</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-content">
                    <h3><?php echo $total_services; ?></h3>
                    <p>Total Services</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">📂</div>
                <div class="stat-content">
                    <h3><?php echo count($categories); ?></h3>
                    <p>Categories</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">👤</div>
                <div class="stat-content">
                    <h3><?php echo $_SESSION['admin_username']; ?></h3>
                    <p>Logged in as</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="add-service.php" class="btn btn-primary">Add New Service</a>
                <a href="manage-services.php" class="btn btn-secondary">Manage Services</a>
                <a href="../index.php" class="btn btn-outline" target="_blank">View Website</a>
            </div>
        </div>

        <!-- Recent Services -->
        <div class="recent-services">
            <h2>Recent Services</h2>
            <div class="services-table">
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Created</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach (array_slice($services, 0, 5) as $service_item): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($service_item['title']); ?></td>
                                <td><span class="category-badge"><?php echo htmlspecialchars($service_item['category']); ?></span></td>
                                <td><?php echo date('M j, Y', strtotime($service_item['created_at'])); ?></td>
                                <td>
                                    <a href="edit-service.php?id=<?php echo $service_item['id']; ?>" class="btn-small">Edit</a>
                                    <a href="../service-detail.php?id=<?php echo $service_item['id']; ?>" class="btn-small" target="_blank">View</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/admin-footer.php'; ?>
