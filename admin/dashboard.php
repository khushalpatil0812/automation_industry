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
$total_services   = count($services);
$category_counts  = array_count_values(array_column($services, 'category'));

include 'includes/admin-header.php';
?>

<!-- Link to Dashboard CSS -->
<link rel="stylesheet" href="../assets/css//admindashboard.css">

<main class="admin-main">
    <div class="admin-container">
        
        <!-- Page Header -->
        <div class="page-header">
            <h1>Dashboard</h1>
            <p>Manage your business services</p>
        </div>

        <!-- Statistics Cards -->
        <div class="stats-grid">
            <a href="manage-services.php" class="stat-card">
                <div class="stat-icon">📊</div>
                <div class="stat-content">
                    <h3><?php echo $total_services; ?></h3>
                    <p>Total Services</p>
                </div>
                <div class="stat-action">View All Services →</div>
            </a>

            <a href="manage-categories.php" class="stat-card">
                <div class="stat-icon">📂</div>
                <div class="stat-content">
                    <h3><?php echo count($categories); ?></h3>
                    <p>Categories</p>
                </div>
                <div class="stat-action">Manage Categories →</div>
            </a>

            <div class="stat-card">
                <div class="stat-icon">👤</div>
                <div class="stat-content">
                    <h3><?php echo htmlspecialchars($_SESSION['admin_username']); ?></h3>
                    <p>Administrator</p>
                </div>
                <div class="stat-action">Account Active</div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2>Quick Actions</h2>
            <div class="action-buttons">
                <a href="add-service.php" class="action-button primary">
                    <span class="action-icon">✨</span>
                    <span class="action-text">
                        <strong>Add New Service</strong>
                        <span>Create a new service listing</span>
                    </span>
                </a>
                <a href="manage-services.php" class="action-button secondary">
                    <span class="action-icon">🔧</span>
                    <span class="action-text">
                        <strong>Manage Services</strong>
                        <span>Edit or update existing services</span>
                    </span>
                </a>
                <a href="manage-categories.php" class="action-button accent">
                    <span class="action-icon">📁</span>
                    <span class="action-text">
                        <strong>Manage Categories</strong>
                        <span>Organize your services</span>
                    </span>
                </a>
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
                                <td>
                                    <span class="category-badge">
                                        <?php echo htmlspecialchars($service_item['category_id']); ?>
                                    </span>
                                </td>
                                <td><?php echo date('M j, Y', strtotime($service_item['created_at'])); ?></td>
                                <td class="actions-cell">
                                    <a href="edit-service.php?id=<?php echo $service_item['id']; ?>" class="action-link edit">
                                        <span class="icon">✏️</span> Edit
                                    </a>
                                    <a href="view-service.php?id=<?php echo $service_item['id']; ?>" class="action-link view">
                                        <span class="icon">👁️</span> View
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="table-footer">
                    <a href="manage-services.php" class="view-all-link">View All Services →</a>
                </div>
            </div>
        </div>

    </div>
</main>

<?php include 'includes/admin-footer.php'; ?>