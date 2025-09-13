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
<link rel="stylesheet" href="dashboard.css">

<style>
/* Center alignment styles */
.admin-main {
    display: flex;
    justify-content: center;
    min-height: calc(100vh - 120px);
    padding: 20px;
}

.admin-container {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
}

.page-header {
    text-align: center;
    margin-bottom: 30px;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.stat-card {
    display: flex;
    align-items: center;
    background: white;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.stat-icon {
    font-size: 2.5rem;
    margin-right: 15px;
}

.stat-content h3 {
    font-size: 1.8rem;
    margin-bottom: 5px;
}

.quick-actions {
    text-align: center;
    margin-bottom: 40px;
}

.action-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 15px;
    flex-wrap: wrap;
}

.btn {
    padding: 10px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    display: inline-block;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #4a6cf7;
    color: white;
}

.btn-primary:hover {
    background-color: #3b5be3;
}

.btn-secondary {
    background-color: #6c757d;
    color: white;
}

.btn-secondary:hover {
    background-color: #5a6268;
}

.btn-outline {
    border: 1px solid #4a6cf7;
    color: #4a6cf7;
}

.btn-outline:hover {
    background-color: #4a6cf7;
    color: white;
}

.recent-services {
    background: white;
    border-radius: 8px;
    padding: 25px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.recent-services h2 {
    margin-bottom: 20px;
    text-align: center;
}

.services-table {
    overflow-x: auto;
}

.services-table table {
    width: 100%;
    border-collapse: collapse;
}

.services-table th,
.services-table td {
    padding: 12px 15px;
    text-align: left;
    border-bottom: 1px solid #eaeaea;
}

.services-table th {
    background-color: #f8f9fa;
    font-weight: 600;
}

.category-badge {
    background-color: #f1f5f9;
    padding: 5px 10px;
    border-radius: 20px;
    font-size: 0.85rem;
}

.btn-small {
    padding: 5px 10px;
    border-radius: 4px;
    text-decoration: none;
    font-size: 0.85rem;
    margin-right: 5px;
    display: inline-block;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .stats-grid {
        grid-template-columns: 1fr;
    }
    
    .action-buttons {
        flex-direction: column;
        align-items: center;
    }
    
    .btn {
        width: 200px;
        text-align: center;
    }
    
    .services-table th,
    .services-table td {
        padding: 8px 10px;
    }
}
</style>

<main class="admin-main">
    <div class="admin-container">
        
        <!-- Page Header -->
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
                    <h3><?php echo htmlspecialchars($_SESSION['admin_username']); ?></h3>
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
                                <td>
                                    <span class="category-badge">
                                        <?php echo htmlspecialchars($service_item['category_id']); ?>
                                    </span>
                                </td>
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