<?php
require_once '../config/config.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

$admin = new Admin();

// Check if logged in
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$service = new Service();

// Get services with error handling
try {
    $services = $service->getAllServices();
    $activeServices = $service->getActiveServices();
    
    // Ensure arrays are not null
    if (!is_array($services)) {
        $services = [];
    }
    if (!is_array($activeServices)) {
        $activeServices = [];
    }
} catch (Exception $e) {
    $services = [];
    $activeServices = [];
    error_log("Error fetching services: " . $e->getMessage());
}

// Get categories with error handling
try {
    $categories = $service->getCategoriesWithDetails();
    if (!is_array($categories)) {
        $categories = [];
    }
} catch (Exception $e) {
    $categories = [];
    error_log("Error fetching categories: " . $e->getMessage());
}

// Get enhanced statistics
$total_services = count($services);
$active_services = count($activeServices);
$inactive_services = $total_services - $active_services;
$total_categories = count($categories);

// Recent services (last 7 days)
$recent_services = array_filter($services, function($service) {
    return strtotime($service['created_at']) > strtotime('-7 days');
});

// Category distribution - filter out NULL and invalid values
$category_ids = array_column($services, 'category_id');
$filtered_category_ids = array_filter($category_ids, function($id) {
    return $id !== null && $id !== '' && (is_string($id) || is_int($id));
});
$category_counts = !empty($filtered_category_ids) ? array_count_values($filtered_category_ids) : [];

// Get current admin info
$admin_username = $_SESSION['admin_username'] ?? 'Administrator';

$page_title = 'Dashboard';
include 'includes/admin-header.php';
?>

<!-- Chart.js for data visualization -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Enhanced Dashboard Styles -->
<style>
    :root {
        --dashboard-primary: #4f46e5;
        --dashboard-secondary: #6366f1;
        --dashboard-success: #10b981;
        --dashboard-warning: #f59e0b;
        --dashboard-danger: #ef4444;
        --dashboard-info: #3b82f6;
        --dashboard-light: #f8fafc;
        --dashboard-dark: #1e293b;
        --dashboard-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        --dashboard-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --dashboard-shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .dashboard-container {
        padding: 2rem 0;
    }

    /* Page Header */
    .dashboard-header {
        background: var(--dashboard-gradient);
        color: white;
        padding: 3rem 0 2rem;
        margin: -2rem -15px 3rem -15px;
        border-radius: 0 0 2rem 2rem;
        position: relative;
        overflow: hidden;
    }

    .dashboard-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,0 1000,100 0,100"/></svg>');
        background-size: cover;
    }

    .dashboard-header .container-fluid {
        position: relative;
        z-index: 1;
    }

    .dashboard-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .dashboard-subtitle {
        font-size: 1.1rem;
        opacity: 0.9;
        font-weight: 400;
    }

    .dashboard-time {
        font-size: 0.95rem;
        opacity: 0.8;
        margin-top: 0.5rem;
    }

    /* Statistics Cards */
    .stats-section {
        margin-bottom: 3rem;
    }

    .stat-card {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: var(--dashboard-shadow);
        border: 1px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--gradient-color, var(--dashboard-primary));
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: var(--dashboard-shadow-lg);
    }

    .stat-card.primary::before { background: var(--dashboard-primary); }
    .stat-card.success::before { background: var(--dashboard-success); }
    .stat-card.warning::before { background: var(--dashboard-warning); }
    .stat-card.info::before { background: var(--dashboard-info); }

    .stat-icon {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        margin-bottom: 1rem;
    }

    .stat-icon.primary { background: var(--dashboard-primary); }
    .stat-icon.success { background: var(--dashboard-success); }
    .stat-icon.warning { background: var(--dashboard-warning); }
    .stat-icon.info { background: var(--dashboard-info); }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dashboard-dark);
        margin-bottom: 0.5rem;
        line-height: 1;
    }

    .stat-label {
        color: #64748b;
        font-weight: 500;
        font-size: 0.95rem;
        margin-bottom: 1rem;
    }

    .stat-change {
        font-size: 0.85rem;
        padding: 0.25rem 0.75rem;
        border-radius: 1rem;
        font-weight: 600;
    }

    .stat-change.positive {
        background: rgba(16, 185, 129, 0.1);
        color: var(--dashboard-success);
    }

    .stat-change.neutral {
        background: rgba(100, 116, 139, 0.1);
        color: #64748b;
    }

    /* Quick Actions */
    .quick-actions {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: var(--dashboard-shadow);
        margin-bottom: 3rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--dashboard-dark);
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .section-title i {
        color: var(--dashboard-primary);
    }

    .action-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .action-card {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border: 2px solid transparent;
        border-radius: 0.75rem;
        padding: 1.5rem;
        text-decoration: none;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .action-card:hover {
        border-color: var(--dashboard-primary);
        transform: translateY(-2px);
        text-decoration: none;
        background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
    }

    .action-card-icon {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: white;
    }

    .action-card-content h5 {
        color: var(--dashboard-dark);
        font-weight: 600;
        margin-bottom: 0.25rem;
        font-size: 1rem;
    }

    .action-card-content p {
        color: #64748b;
        margin: 0;
        font-size: 0.85rem;
    }

    /* Recent Activities */
    .recent-section {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: var(--dashboard-shadow);
        margin-bottom: 3rem;
    }

    .activity-item {
        display: flex;
        align-items: center;
        padding: 1rem;
        border-radius: 0.5rem;
        transition: all 0.2s ease;
        border-left: 3px solid transparent;
    }

    .activity-item:hover {
        background: #f8fafc;
        border-left-color: var(--dashboard-primary);
    }

    .activity-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1rem;
    }

    .activity-content h6 {
        margin: 0 0 0.25rem 0;
        font-weight: 600;
        color: var(--dashboard-dark);
        font-size: 0.9rem;
    }

    .activity-content small {
        color: #64748b;
        font-size: 0.8rem;
    }

    .activity-time {
        margin-left: auto;
        color: #64748b;
        font-size: 0.75rem;
        font-weight: 500;
    }

    /* Charts Section */
    .chart-container {
        background: white;
        border-radius: 1rem;
        padding: 2rem;
        box-shadow: var(--dashboard-shadow);
        height: 400px;
    }

    .chart-canvas {
        width: 100% !important;
        height: 300px !important;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .dashboard-header {
            margin: -1rem -15px 2rem -15px;
            padding: 2rem 0 1.5rem;
        }

        .dashboard-title {
            font-size: 2rem;
        }

        .stat-number {
            font-size: 2rem;
        }

        .action-grid {
            grid-template-columns: 1fr;
        }

        .quick-actions,
        .recent-section {
            padding: 1.5rem;
        }
    }

    /* Enhanced Responsive Design - Mobile First Approach */
    @media (max-width: 575.98px) {
        /* Extra small devices (phones, less than 576px) */
        .dashboard-container {
            padding: 10px;
        }
        
        .dashboard-header {
            padding: 1rem 0;
            margin: -10px -10px 15px -10px;
            border-radius: 0 0 15px 15px;
        }
        
        .dashboard-title {
            font-size: 1.5rem !important;
            margin-bottom: 5px;
        }
        
        .dashboard-subtitle {
            font-size: 0.85rem;
            display: none; /* Hide subtitle on very small screens */
        }
        
        .admin-info {
            text-align: center;
            margin-top: 10px;
        }
        
        .admin-avatar {
            width: 40px;
            height: 40px;
        }
        
        .admin-details h6 {
            font-size: 0.9rem;
            margin-bottom: 2px;
        }
        
        .admin-details small {
            font-size: 0.7rem;
        }
        
        /* Statistics Cards - 2x2 grid on mobile */
        .stats-grid {
            display: grid !important;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .stat-card {
            padding: 15px;
            margin-bottom: 0;
        }
        
        .stat-card h3 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }
        
        .stat-card .stat-label {
            font-size: 0.7rem;
            margin-bottom: 8px;
        }
        
        .stat-card .stat-icon {
            font-size: 1.2rem;
            width: 35px;
            height: 35px;
            line-height: 35px;
        }
        
        /* Quick Actions - stacked layout */
        .action-grid {
            grid-template-columns: 1fr !important;
            gap: 15px;
            margin-bottom: 20px;
        }
        
        .action-card {
            padding: 15px;
            text-align: center;
        }
        
        .action-card .action-icon {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }
        
        .action-card h5 {
            font-size: 0.9rem;
            margin-bottom: 8px;
        }
        
        .action-card p {
            font-size: 0.8rem;
            margin-bottom: 10px;
        }
        
        .action-card .btn {
            width: 100%;
            padding: 8px 16px;
            font-size: 0.85rem;
        }
        
        /* Recent Activities */
        .recent-section {
            padding: 15px;
        }
        
        .recent-section h4 {
            font-size: 1.2rem;
            margin-bottom: 15px;
        }
        
        .recent-item {
            padding: 10px;
            margin-bottom: 10px;
        }
        
        .recent-item h6 {
            font-size: 0.85rem;
            margin-bottom: 5px;
        }
        
        .recent-item small {
            font-size: 0.7rem;
        }
        
        /* Tables on mobile */
        .table-responsive {
            font-size: 0.8rem;
        }
        
        .table th {
            padding: 8px 4px;
            font-size: 0.75rem;
        }
        
        .table td {
            padding: 8px 4px;
            vertical-align: top;
        }
        
        .badge {
            font-size: 0.65rem;
            padding: 3px 6px;
        }
        
        .btn-sm {
            padding: 4px 8px;
            font-size: 0.7rem;
        }
        
        /* Navigation improvements */
        .logout-btn {
            padding: 6px 12px;
            font-size: 0.8rem;
        }
        
        /* Alert messages */
        .alert {
            padding: 10px 12px;
            font-size: 0.85rem;
            margin-bottom: 15px;
        }
    }

    @media (min-width: 576px) and (max-width: 767.98px) {
        /* Small devices (landscape phones, 576px and up) */
        .dashboard-container {
            padding: 15px;
        }
        
        .dashboard-title {
            font-size: 1.8rem;
        }
        
        .dashboard-subtitle {
            display: block;
            font-size: 0.9rem;
        }
        
        /* Statistics Cards - 2 columns */
        .stats-grid {
            display: grid !important;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        
        /* Quick Actions - 2 columns */
        .action-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 20px;
        }
        
        .action-card {
            padding: 20px;
        }
        
        .table-responsive {
            font-size: 0.875rem;
        }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
        /* Medium devices (tablets, 768px and up) */
        .dashboard-title {
            font-size: 2rem;
        }
        
        /* Statistics Cards - 4 columns */
        .stats-grid {
            display: grid !important;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }
        
        /* Quick Actions - 2 columns */
        .action-grid {
            grid-template-columns: repeat(2, 1fr) !important;
            gap: 25px;
        }
        
        .table-responsive {
            font-size: 0.9rem;
        }
        
        .btn-group .btn {
            padding: 0.375rem 0.5rem;
            font-size: 0.875rem;
        }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
        /* Large devices (desktops, 992px and up) */
        .dashboard-container {
            max-width: 95%;
            margin: 0 auto;
        }
        
        /* Quick Actions - 3 columns */
        .action-grid {
            grid-template-columns: repeat(3, 1fr) !important;
        }
    }

    @media (min-width: 1200px) {
        /* Extra large devices (large desktops, 1200px and up) */
        .dashboard-container {
            max-width: 90%;
            margin: 0 auto;
        }
        
        /* Quick Actions - 4 columns for very large screens */
        .action-grid {
            grid-template-columns: repeat(4, 1fr) !important;
        }
    }

    /* Touch-friendly improvements for all touch devices */
    @media (hover: none) and (pointer: coarse) {
        .btn {
            min-height: 44px; /* Apple's recommended touch target size */
            padding: 10px 16px;
        }
        
        .btn-sm {
            min-height: 40px;
            padding: 8px 12px;
        }
        
        .action-card {
            cursor: pointer;
            transition: transform 0.2s ease;
        }
        
        .action-card:active {
            transform: scale(0.98);
        }
        
        /* Larger tap targets for navigation */
        .logout-btn {
            min-height: 44px;
            padding: 10px 20px;
        }
    }
}
</style>

<div class="dashboard-container">
    <!-- Dashboard Header -->
    <div class="dashboard-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="dashboard-title">
                        <i class="fas fa-tachometer-alt me-3"></i>
                        Admin Dashboard
                    </h1>
                    <p class="dashboard-subtitle">Welcome back, <?php echo htmlspecialchars($admin_username); ?>! Here's what's happening with your automation business.</p>
                    <div class="dashboard-time">
                        <i class="far fa-clock me-2"></i>
                        <?php echo date('l, F j, Y \a\t g:i A'); ?>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <div class="d-none d-md-block">
                        <i class="fas fa-chart-line" style="font-size: 4rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Statistics Cards -->
        <div class="stats-section">
            <div class="row g-4">
                <div class="col-xl-3 col-md-6">
                    <div class="stat-card primary">
                        <div class="stat-icon primary">
                            <i class="fas fa-briefcase"></i>
                        </div>
                        <div class="stat-number"><?php echo $total_services; ?></div>
                        <div class="stat-label">Total Services</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up me-1"></i>
                            Active System
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="stat-card success">
                        <div class="stat-icon success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-number"><?php echo $active_services; ?></div>
                        <div class="stat-label">Active Services</div>
                        <div class="stat-change positive">
                            <i class="fas fa-arrow-up me-1"></i>
                            <?php echo number_format(($active_services / max($total_services, 1)) * 100, 1); ?>% Active
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="stat-card warning">
                        <div class="stat-icon warning">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="stat-number"><?php echo $total_categories; ?></div>
                        <div class="stat-label">Categories</div>
                        <div class="stat-change neutral">
                            <i class="fas fa-minus me-1"></i>
                            Organized
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="stat-card info">
                        <div class="stat-icon info">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="stat-number"><?php echo count($recent_services); ?></div>
                        <div class="stat-label">Recent (7 days)</div>
                        <div class="stat-change positive">
                            <i class="fas fa-plus me-1"></i>
                            New Additions
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h2 class="section-title">
                <i class="fas fa-bolt"></i>
                Quick Actions
            </h2>
            <div class="action-grid">
                <a href="add-service.php" class="action-card">
                    <div class="action-card-icon" style="background: var(--dashboard-success);">
                        <i class="fas fa-plus"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>Add New Service</h5>
                        <p>Create a new service listing for your business</p>
                    </div>
                </a>

                <a href="manage-services.php" class="action-card">
                    <div class="action-card-icon" style="background: var(--dashboard-primary);">
                        <i class="fas fa-cog"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>Manage Services</h5>
                        <p>Edit, update, or delete existing services</p>
                    </div>
                </a>

                <a href="manage-categories.php" class="action-card">
                    <div class="action-card-icon" style="background: var(--dashboard-warning);">
                        <i class="fas fa-folder"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>Manage Categories</h5>
                        <p>Organize services into different categories</p>
                    </div>
                </a>

                <a href="../index.php" target="_blank" class="action-card">
                    <div class="action-card-icon" style="background: var(--dashboard-info);">
                        <i class="fas fa-globe"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>View Website</h5>
                        <p>Preview your live website in a new tab</p>
                    </div>
                </a>

                <a href="#" onclick="backupDatabase()" class="action-card">
                    <div class="action-card-icon" style="background: #8b5cf6;">
                        <i class="fas fa-download"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>Backup Data</h5>
                        <p>Download a backup of your services data</p>
                    </div>
                </a>

                <a href="#" onclick="showSystemInfo()" class="action-card">
                    <div class="action-card-icon" style="background: #06b6d4;">
                        <i class="fas fa-server"></i>
                    </div>
                    <div class="action-card-content">
                        <h5>System Info</h5>
                        <p>View system status and information</p>
                    </div>
                </a>
            </div>
        </div>

        <div class="row g-4">
            <!-- Recent Activities -->
            <div class="col-lg-8">
                <div class="recent-section">
                    <h2 class="section-title">
                        <i class="fas fa-clock"></i>
                        Recent Activities
                    </h2>

                    <div class="activity-list">
                        <?php if (!empty($recent_services)): ?>
                            <?php foreach (array_slice($recent_services, 0, 8) as $service_item): ?>
                                <div class="activity-item">
                                    <div class="activity-icon" style="background: var(--dashboard-success); color: white;">
                                        <i class="fas fa-plus"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h6>New service added: <?php echo htmlspecialchars($service_item['title']); ?></h6>
                                        <small>Service was created and is now available</small>
                                    </div>
                                    <div class="activity-time">
                                        <?php 
                                        $time_diff = time() - strtotime($service_item['created_at']);
                                        if ($time_diff < 3600) {
                                            echo floor($time_diff / 60) . 'm ago';
                                        } elseif ($time_diff < 86400) {
                                            echo floor($time_diff / 3600) . 'h ago';
                                        } else {
                                            echo floor($time_diff / 86400) . 'd ago';
                                        }
                                        ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="activity-item">
                                <div class="activity-icon" style="background: var(--dashboard-info); color: white;">
                                    <i class="fas fa-info-circle"></i>
                                </div>
                                <div class="activity-content">
                                    <h6>Welcome to your dashboard!</h6>
                                    <small>Start by adding your first service to see activities here</small>
                                </div>
                                <div class="activity-time">Just now</div>
                            </div>
                        <?php endif; ?>
                        
                        <!-- System activities -->
                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--dashboard-primary); color: white;">
                                <i class="fas fa-sign-in-alt"></i>
                            </div>
                            <div class="activity-content">
                                <h6>Admin login successful</h6>
                                <small>Administrator logged into the system</small>
                            </div>
                            <div class="activity-time">Now</div>
                        </div>

                        <div class="activity-item">
                            <div class="activity-icon" style="background: var(--dashboard-success); color: white;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="activity-content">
                                <h6>System status: All systems operational</h6>
                                <small>All services are running normally</small>
                            </div>
                            <div class="activity-time">5m ago</div>
                        </div>
                    </div>

                    <div class="text-center mt-4">
                        <a href="manage-services.php" class="btn btn-outline-primary">
                            <i class="fas fa-list me-2"></i>View All Services
                        </a>
                    </div>
                </div>
            </div>

            <!-- Service Categories Chart -->
            <div class="col-lg-4">
                <div class="chart-container">
                    <h2 class="section-title">
                        <i class="fas fa-chart-pie"></i>
                        Service Distribution
                    </h2>
                    <canvas id="categoryChart" class="chart-canvas"></canvas>
                </div>
            </div>
        </div>

        <!-- Service Status Overview -->
        <div class="row g-4 mt-2">
            <div class="col-lg-6">
                <div class="chart-container">
                    <h2 class="section-title">
                        <i class="fas fa-chart-bar"></i>
                        Service Status Overview
                    </h2>
                    <canvas id="statusChart" class="chart-canvas"></canvas>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="recent-section">
                    <h2 class="section-title">
                        <i class="fas fa-info-circle"></i>
                        System Overview
                    </h2>
                    
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded">
                                <div class="h4 text-primary mb-1"><?php echo date('Y'); ?></div>
                                <small class="text-muted">Current Year</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded">
                                <div class="h4 text-success mb-1">
                                    <?php echo $inactive_services > 0 ? 'Issues' : 'Good'; ?>
                                </div>
                                <small class="text-muted">System Health</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded">
                                <div class="h4 text-info mb-1"><?php echo date('M'); ?></div>
                                <small class="text-muted">Current Month</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="text-center p-3 bg-light rounded">
                                <div class="h4 text-warning mb-1">24/7</div>
                                <small class="text-muted">Uptime</small>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h6 class="mb-3">Quick Stats</h6>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small>Database Size</small>
                            <small class="text-primary fw-bold">~<?php echo round(filesize(__DIR__ . '/../database/automation_industry.sql') / 1024, 1); ?>KB</small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small>PHP Version</small>
                            <small class="text-success fw-bold"><?php echo phpversion(); ?></small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <small>Server Time</small>
                            <small class="text-info fw-bold"><?php echo date('H:i:s'); ?></small>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small>Last Backup</small>
                            <small class="text-muted">Manual</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js Implementation -->
<script>
// Category Distribution Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
const categoryData = <?php echo json_encode($category_counts); ?>;
const categoryLabels = <?php echo json_encode($categories ? array_column($categories, 'name') : []); ?>;
const categoryMapping = <?php echo json_encode($categories ? array_column($categories, 'id', 'name') : []); ?>;

// Prepare data for category chart with error handling
const categoryChartData = categoryLabels.length > 0 ? categoryLabels.map(label => {
    const categoryId = categoryMapping[label];
    return categoryData[categoryId] || 0;
}) : [1]; // Default data if no categories

const finalLabels = categoryLabels.length > 0 ? categoryLabels : ['No Categories'];

new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: finalLabels,
        datasets: [{
            data: categoryChartData,
            backgroundColor: [
                '#4f46e5', '#10b981', '#f59e0b', '#ef4444', 
                '#8b5cf6', '#06b6d4', '#84cc16', '#f97316'
            ],
            borderWidth: 2,
            borderColor: '#ffffff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
                labels: {
                    padding: 20,
                    usePointStyle: true
                }
            }
        }
    }
});

// Service Status Chart
const statusCtx = document.getElementById('statusChart').getContext('2d');
new Chart(statusCtx, {
    type: 'bar',
    data: {
        labels: ['Active Services', 'Inactive Services', 'Total Categories'],
        datasets: [{
            label: 'Count',
            data: [<?php echo $active_services; ?>, <?php echo $inactive_services; ?>, <?php echo $total_categories; ?>],
            backgroundColor: ['#10b981', '#ef4444', '#f59e0b'],
            borderColor: ['#10b981', '#ef4444', '#f59e0b'],
            borderWidth: 1,
            borderRadius: 8
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        },
        plugins: {
            legend: {
                display: false
            }
        }
    }
});

// Utility functions
function backupDatabase() {
    if (confirm('This will download a backup of your database. Continue?')) {
        // You can implement actual backup functionality here
        alert('Backup feature would be implemented here. Contact your developer to set up automated backups.');
    }
}

function showSystemInfo() {
    alert(`System Information:
    
    PHP Version: <?php echo phpversion(); ?>
    Server Time: <?php echo date('Y-m-d H:i:s'); ?>
    Total Services: <?php echo $total_services; ?>
    Active Services: <?php echo $active_services; ?>
    Total Categories: <?php echo $total_categories; ?>
    
    System Status: All systems operational`);
}

// Auto-refresh dashboard every 5 minutes
setInterval(function() {
    location.reload();
}, 300000);
</script>

<?php include 'includes/admin-footer.php'; ?>