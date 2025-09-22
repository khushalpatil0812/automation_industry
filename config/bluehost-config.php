<?php
// BlueHost Configuration
// Replace this with your actual BlueHost database credentials

// Site configuration for BlueHost
define('SITE_URL', 'https://yourdomain.com'); // Replace with your domain
define('ADMIN_URL', 'https://yourdomain.com/admin'); // Replace with your domain
define('UPLOAD_PATH', 'uploads/services/');

// BlueHost Database configuration
// Get these from your cPanel -> MySQL Databases
define('DB_HOST', 'localhost'); // Usually localhost on BlueHost
define('DB_NAME', 'yourusername_automation_industry'); // BlueHost format: username_dbname
define('DB_USER', 'yourusername_dbuser'); // BlueHost database user
define('DB_PASS', 'your_secure_password'); // Your database password

// Admin session configuration
define('ADMIN_SESSION_NAME', 'admin_logged_in');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// BlueHost specific settings
ini_set('display_errors', 0); // Disable error display in production
error_reporting(E_ALL & ~E_NOTICE); // Log errors but don't show them
?>