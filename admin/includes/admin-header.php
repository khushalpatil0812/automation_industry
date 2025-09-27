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
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Admin Responsive CSS -->
    <link rel="stylesheet" href="includes/responsive.css">
    <!-- Custom Admin CSS -->
    <style>
        :root {
            --admin-primary: #2c3e50;
            --admin-secondary: #34495e;
            --admin-accent: #3498db;
            --admin-success: #27ae60;
            --admin-warning: #f39c12;
            --admin-danger: #e74c3c;
        }
        
        .admin-navbar {
            background: linear-gradient(135deg, var(--admin-primary) 0%, var(--admin-secondary) 100%);
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            min-height: 70px;
        }
        
        .navbar-brand {
            font-weight: 600;
            font-size: 1.4rem;
            color: white !important;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .navbar-brand i {
            color: var(--admin-accent);
            font-size: 1.6rem;
        }
        
        .navbar-nav .nav-link {
            color: rgba(255,255,255,0.9) !important;
            font-weight: 500;
            padding: 0.75rem 1rem !important;
            border-radius: 8px;
            margin: 0 2px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .navbar-nav .nav-link:hover {
            background-color: rgba(255,255,255,0.1);
            color: white !important;
            transform: translateY(-1px);
        }
        
        .navbar-nav .nav-link.active {
            background-color: var(--admin-accent);
            color: white !important;
            box-shadow: 0 2px 8px rgba(52, 152, 219, 0.3);
        }
        
        .navbar-nav .nav-link i {
            width: 18px;
            text-align: center;
        }
        
        .user-info {
            color: rgba(255,255,255,0.9);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 0.5rem 1rem;
            background-color: rgba(255,255,255,0.1);
            border-radius: 25px;
            margin-right: 10px;
        }
        
        .user-info i {
            color: var(--admin-accent);
            font-size: 1.2rem;
        }
        
        .logout-btn {
            color: rgba(255,255,255,0.9) !important;
            border: 1px solid rgba(255,255,255,0.3);
            border-radius: 6px;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
        }
        
        .logout-btn:hover {
            background-color: var(--admin-danger);
            border-color: var(--admin-danger);
            color: white !important;
        }
        
        @media (max-width: 991.98px) {
            .navbar-nav {
                padding-top: 1rem;
            }
            
            .user-info {
                margin: 1rem 0 0.5rem 0;
                justify-content: center;
            }
        }
    </style>
</head>
<body class="bg-light">
    <!-- Admin Navigation -->
    <nav class="navbar navbar-expand-lg admin-navbar sticky-top">
        <div class="container-fluid">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="dashboard.php">
                <i class="fas fa-cogs"></i>
                <span>Automation Admin</span>
            </a>
            
            <!-- Mobile Toggle Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" 
                    aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <i class="fas fa-bars text-white"></i>
                </span>
            </button>
            
            <!-- Navigation Menu -->
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'dashboard.php' ? 'active' : ''; ?>" 
                           href="dashboard.php">
                            <i class="fas fa-tachometer-alt"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'manage-services.php' ? 'active' : ''; ?>" 
                           href="manage-services.php">
                            <i class="fas fa-list"></i>
                            <span>Manage Services</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'add-service.php' ? 'active' : ''; ?>" 
                           href="add-service.php">
                            <i class="fas fa-plus-circle"></i>
                            <span>Add Service</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $current_page == 'manage-categories.php' ? 'active' : ''; ?>" 
                           href="manage-categories.php">
                            <i class="fas fa-tags"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            <span>View Site</span>
                        </a>
                    </li>
                </ul>
                
                <!-- User Info & Logout -->
                <div class="d-flex align-items-center">
                    <div class="user-info me-3">
                        <i class="fas fa-user-circle"></i>
                        <span>Welcome, Admin</span>
                    </div>
                    <a href="logout.php" class="nav-link logout-btn" 
                       onclick="return confirm('Are you sure you want to logout?')">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="d-none d-lg-inline ms-1">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content Container -->
    <div class="container-fluid mt-4">