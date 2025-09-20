<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check authentication
require_once '../config/config.php';
require_once '../classes/Admin.php';

$admin = new Admin();
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

// Get current page for navigation highlighting
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Admin Panel - Automation Industry</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/admindashboard.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="../assets/css/manage-service.css?v=<?php echo time(); ?>">
</head>
<body class="admin-body">
    <div class="admin-page-wrapper">
        <header class="admin-header">
            <nav class="admin-nav">
                <div class="admin-logo">
                    <a href="dashboard.php">
                        <i class="fas fa-cogs"></i>
                        <span>Automation Admin</span>
                    </a>
                </div>
                
                <ul class="admin-menu">
                    <li>
                        <a href="dashboard.php" class="<?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage-services.php" class="<?php echo $current_page == 'manage-services.php' ? 'active' : ''; ?>">
                            <i class="fas fa-list"></i>
                            <span>Manage Services</span>
                        </a>
                    </li>
                    <li>
                        <a href="add-service.php" class="<?php echo $current_page == 'add-service.php' ? 'active' : ''; ?>">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add Service</span>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php" class="<?php echo $current_page == 'manage-categories.php' ? 'active' : ''; ?>">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="../index.php" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Site</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
                
                <div class="admin-user-info">
                    <span class="user-welcome">
                        <i class="fas fa-user-circle"></i>
                        Welcome, Admin
                    </span>
                </div>
            </nav>
        </header>
