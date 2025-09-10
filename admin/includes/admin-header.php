<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' - ' : ''; ?>Admin - BusinessPro</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body>
    <nav class="admin-navbar">
        <div class="admin-nav-container">
            <div class="admin-logo">
                <a href="dashboard.php">BusinessPro Admin</a>
            </div>
            <ul class="admin-nav-menu">
                <li><a href="dashboard.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">Dashboard</a></li>
                <li><a href="manage-services.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'manage-services.php' ? 'active' : ''; ?>">Services</a></li>
                <li><a href="add-service.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'add-service.php' ? 'active' : ''; ?>">Add Service</a></li>
                <li><a href="../index.php" target="_blank">View Site</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
