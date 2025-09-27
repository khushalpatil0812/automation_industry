<?php
// Site configuration
define('SITE_URL', 'http://localhost/automation_industry');
define('ADMIN_URL', 'http://localhost/automation_industry/admin');
define('UPLOAD_PATH', 'uploads/services/');

// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'automation_industry');
define('DB_USER', 'root');
define('DB_PASS', '');

// Admin session configuration
define('ADMIN_SESSION_NAME', 'admin_logged_in');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
