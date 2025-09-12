<?php
// BlueHost-specific configuration template
// Copy this to config/config.php and update with your actual BlueHost details

// BlueHost Database Configuration
// Note: BlueHost uses prefixed database names
define('DB_HOST', 'localhost'); // Usually localhost on BlueHost
define('DB_NAME', 'yourusername_automation_industry'); // Replace yourusername with your cPanel username
define('DB_USER', 'yourusername_dbuser'); // Database user you create in cPanel
define('DB_PASS', 'your_database_password'); // Password you set for the database user

// BlueHost Site Configuration
define('SITE_URL', 'https://yourdomain.com/automation_industry/'); // Your actual domain
define('ADMIN_URL', 'https://yourdomain.com/automation_industry/admin/');
define('SITE_NAME', 'Automation Industry Solutions');

// Upload configuration for BlueHost
define('UPLOAD_PATH', 'uploads/services/');
define('UPLOAD_MAX_SIZE', 64 * 1024 * 1024); // 64MB - BlueHost default limit

// Admin session configuration
define('ADMIN_SESSION_NAME', 'admin_logged_in');
define('SESSION_TIMEOUT', 3600); // 1 hour

// Production settings for BlueHost
define('ERROR_REPORTING', false); // Set to true only during development/testing
define('DEBUG_MODE', false); // Never enable in production

// Email configuration for BlueHost
define('SMTP_HOST', 'mail.yourdomain.com'); // Replace with your domain
define('SMTP_PORT', 587);
define('SMTP_SECURE', 'tls');
define('SMTP_USERNAME', 'contact@yourdomain.com'); // Your email
define('SMTP_PASSWORD', 'your_email_password');

// File upload settings optimized for BlueHost
define('ALLOWED_IMAGE_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'webp']);
define('MAX_IMAGE_SIZE', 10 * 1024 * 1024); // 10MB per image

// Security settings
define('SECURE_COOKIES', true); // Enable for HTTPS
define('CSRF_PROTECTION', true);

// Timezone (adjust based on your location)
date_default_timezone_set('Asia/Kolkata');

// Error handling for production environment
if (!ERROR_REPORTING) {
    error_reporting(0);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ini_set('error_log', __DIR__ . '/../logs/error.log');
}

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start([
        'cookie_lifetime' => SESSION_TIMEOUT,
        'cookie_secure' => SECURE_COOKIES,
        'cookie_httponly' => true,
        'use_strict_mode' => true
    ]);
}

// Create logs directory if it doesn't exist
$logs_dir = __DIR__ . '/../logs';
if (!file_exists($logs_dir)) {
    mkdir($logs_dir, 0755, true);
}

// Create uploads directory if it doesn't exist
$uploads_dir = __DIR__ . '/../' . UPLOAD_PATH;
if (!file_exists($uploads_dir)) {
    mkdir($uploads_dir, 0755, true);
}

/* 
BLUEHOST DEPLOYMENT CHECKLIST:
===============================

1. DATABASE SETUP:
   - Create database: yourusername_automation_industry
   - Create user: yourusername_dbuser
   - Grant all privileges to user on database
   - Import your database schema

2. FILE UPLOAD:
   - Upload all files to public_html/automation_industry/
   - Set folder permissions: 755
   - Set file permissions: 644
   - Ensure uploads folder is writable (755)

3. CONFIGURATION:
   - Update DB_NAME, DB_USER, DB_PASS above
   - Change SITE_URL to your actual domain
   - Update SMTP settings for contact forms
   - Set ERROR_REPORTING to false

4. TESTING:
   - Visit yourdomain.com/automation_industry/tests/
   - Run BlueHost compatibility check
   - Test all functionality
   - Remove tests folder after verification

5. SECURITY:
   - Enable HTTPS
   - Set secure cookie settings
   - Protect config files with .htaccess
   - Regular backups

6. OPTIMIZATION:
   - Enable compression in .htaccess
   - Optimize images before upload
   - Use CDN for better performance
   - Monitor resource usage
*/
?>
