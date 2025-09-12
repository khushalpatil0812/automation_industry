<?php
// Diagnostic file to test all components
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the diagnostic page
echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>System Diagnostics</title>";
echo "<style>";
echo "body { font-family: Arial, sans-serif; margin: 20px; background: #f5f5f5; }";
echo ".test-section { background: white; margin: 20px 0; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }";
echo ".pass { color: #28a745; font-weight: bold; }";
echo ".fail { color: #dc3545; font-weight: bold; }";
echo ".warning { color: #ffc107; font-weight: bold; }";
echo ".info { color: #17a2b8; }";
echo "pre { background: #f8f9fa; padding: 15px; border-radius: 4px; overflow-x: auto; }";
echo "h1 { color: #333; }";
echo "h2 { color: #666; border-bottom: 2px solid #eee; padding-bottom: 10px; }";
echo "</style>";
echo "</head>";
echo "<body>";

echo "<h1>🔧 System Diagnostics for Automation Industry Website</h1>";
echo "<p>This diagnostic tool will check all system components to identify issues.</p>";

// Test 1: PHP Configuration
echo "<div class='test-section'>";
echo "<h2>1. PHP Configuration</h2>";
echo "<p><strong>PHP Version:</strong> " . phpversion() . "</p>";
echo "<p><strong>Error Reporting:</strong> " . (ini_get('display_errors') ? '<span class="pass">ENABLED</span>' : '<span class="fail">DISABLED</span>') . "</p>";
echo "<p><strong>Session Support:</strong> " . (function_exists('session_start') ? '<span class="pass">AVAILABLE</span>' : '<span class="fail">NOT AVAILABLE</span>') . "</p>";
echo "<p><strong>PDO Support:</strong> " . (class_exists('PDO') ? '<span class="pass">AVAILABLE</span>' : '<span class="fail">NOT AVAILABLE</span>') . "</p>";
echo "<p><strong>MySQL PDO Driver:</strong> " . (in_array('mysql', PDO::getAvailableDrivers()) ? '<span class="pass">AVAILABLE</span>' : '<span class="fail">NOT AVAILABLE</span>') . "</p>";
echo "</div>";

// Test 2: File System Checks
echo "<div class='test-section'>";
echo "<h2>2. File System Checks</h2>";

$critical_files = [
    '../config/config.php',
    '../config/database.php',
    '../includes/header.php',
    '../includes/footer.php',
    '../classes/Service.php',
    '../assets/css/style.css'
];

foreach ($critical_files as $file) {
    $full_path = __DIR__ . '/' . $file;
    if (file_exists($full_path)) {
        echo "<p>✅ <strong>$file:</strong> <span class='pass'>EXISTS</span> (Size: " . filesize($full_path) . " bytes)</p>";
    } else {
        echo "<p>❌ <strong>$file:</strong> <span class='fail'>NOT FOUND</span></p>";
    }
}

$directories = [
    '../uploads/services/',
    '../public/',
    '../assets/css/',
    '../assets/js/'
];

foreach ($directories as $dir) {
    $full_path = __DIR__ . '/' . $dir;
    if (is_dir($full_path)) {
        $writable = is_writable($full_path) ? '<span class="pass">WRITABLE</span>' : '<span class="warning">READ-ONLY</span>';
        echo "<p>📁 <strong>$dir:</strong> <span class='pass'>EXISTS</span> - $writable</p>";
    } else {
        echo "<p>📁 <strong>$dir:</strong> <span class='fail'>NOT FOUND</span></p>";
    }
}
echo "</div>";

// Test 3: Configuration Loading
echo "<div class='test-section'>";
echo "<h2>3. Configuration Loading</h2>";

try {
    require_once '../config/config.php';
    echo "<p>✅ <strong>config.php:</strong> <span class='pass'>LOADED SUCCESSFULLY</span></p>";
    
    echo "<h3>Configuration Values:</h3>";
    echo "<pre>";
    echo "SITE_URL: " . (defined('SITE_URL') ? SITE_URL : 'NOT DEFINED') . "\n";
    echo "ADMIN_URL: " . (defined('ADMIN_URL') ? ADMIN_URL : 'NOT DEFINED') . "\n";
    echo "DB_HOST: " . (defined('DB_HOST') ? DB_HOST : 'NOT DEFINED') . "\n";
    echo "DB_NAME: " . (defined('DB_NAME') ? DB_NAME : 'NOT DEFINED') . "\n";
    echo "DB_USER: " . (defined('DB_USER') ? DB_USER : 'NOT DEFINED') . "\n";
    echo "UPLOAD_PATH: " . (defined('UPLOAD_PATH') ? UPLOAD_PATH : 'NOT DEFINED') . "\n";
    echo "</pre>";
} catch (Exception $e) {
    echo "<p>❌ <strong>config.php:</strong> <span class='fail'>ERROR LOADING</span></p>";
    echo "<p class='fail'>Error: " . $e->getMessage() . "</p>";
}
echo "</div>";

// Test 4: Database Connection
echo "<div class='test-section'>";
echo "<h2>4. Database Connection</h2>";

try {
    require_once '../config/database.php';
    echo "<p>✅ <strong>database.php:</strong> <span class='pass'>LOADED SUCCESSFULLY</span></p>";
    
    if (isset($database) && $database instanceof Database) {
        $connection = $database->getConnection();
        if ($connection) {
            echo "<p>✅ <strong>Database Connection:</strong> <span class='pass'>SUCCESSFUL</span></p>";
            
            // Test database structure
            try {
                $stmt = $connection->query("SHOW TABLES");
                $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
                echo "<h3>Database Tables:</h3>";
                echo "<pre>";
                foreach ($tables as $table) {
                    echo "- $table\n";
                }
                echo "</pre>";
            } catch (Exception $e) {
                echo "<p class='warning'>Could not retrieve table list: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>❌ <strong>Database Connection:</strong> <span class='fail'>FAILED</span></p>";
        }
    } else {
        echo "<p>❌ <strong>Database Object:</strong> <span class='fail'>NOT CREATED</span></p>";
    }
} catch (Exception $e) {
    echo "<p>❌ <strong>Database Connection:</strong> <span class='fail'>ERROR</span></p>";
    echo "<p class='fail'>Error: " . $e->getMessage() . "</p>";
}
echo "</div>";

// Test 5: Session Testing
echo "<div class='test-section'>";
echo "<h2>5. Session Testing</h2>";

echo "<p><strong>Session Status:</strong> ";
switch (session_status()) {
    case PHP_SESSION_DISABLED:
        echo "<span class='fail'>DISABLED</span>";
        break;
    case PHP_SESSION_NONE:
        echo "<span class='warning'>NOT STARTED</span>";
        break;
    case PHP_SESSION_ACTIVE:
        echo "<span class='pass'>ACTIVE</span>";
        break;
}
echo "</p>";

if (session_status() == PHP_SESSION_ACTIVE) {
    echo "<p><strong>Session ID:</strong> " . session_id() . "</p>";
    echo "<p><strong>Session Save Path:</strong> " . session_save_path() . "</p>";
    echo "<p><strong>Session Data:</strong></p>";
    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";
}
echo "</div>";

// Test 6: Classes Loading
echo "<div class='test-section'>";
echo "<h2>6. Classes Loading</h2>";

$classes = ['Service', 'Category', 'Admin'];
foreach ($classes as $class_name) {
    $file_path = "../classes/$class_name.php";
    try {
        if (file_exists($file_path)) {
            require_once $file_path;
            if (class_exists($class_name)) {
                echo "<p>✅ <strong>$class_name:</strong> <span class='pass'>LOADED & AVAILABLE</span></p>";
                
                // Test instantiation
                try {
                    $instance = new $class_name();
                    echo "<p>&nbsp;&nbsp;&nbsp;↳ <span class='pass'>Can be instantiated</span></p>";
                } catch (Exception $e) {
                    echo "<p>&nbsp;&nbsp;&nbsp;↳ <span class='warning'>Instantiation error: " . $e->getMessage() . "</span></p>";
                }
            } else {
                echo "<p>❌ <strong>$class_name:</strong> <span class='fail'>FILE EXISTS BUT CLASS NOT DEFINED</span></p>";
            }
        } else {
            echo "<p>❌ <strong>$class_name:</strong> <span class='fail'>FILE NOT FOUND</span></p>";
        }
    } catch (Exception $e) {
        echo "<p>❌ <strong>$class_name:</strong> <span class='fail'>ERROR LOADING</span></p>";
        echo "<p class='fail'>Error: " . $e->getMessage() . "</p>";
    }
}
echo "</div>";

// Test 7: CSS and Assets
echo "<div class='test-section'>";
echo "<h2>7. CSS and Assets</h2>";

$css_files = ['../assets/css/style.css', '../assets/css/admin.css'];
foreach ($css_files as $css_file) {
    if (file_exists($css_file)) {
        $size = filesize($css_file);
        echo "<p>✅ <strong>$css_file:</strong> <span class='pass'>EXISTS</span> (Size: " . number_format($size) . " bytes)</p>";
        if ($size < 100) {
            echo "<p>&nbsp;&nbsp;&nbsp;↳ <span class='warning'>File seems unusually small</span></p>";
        }
    } else {
        echo "<p>❌ <strong>$css_file:</strong> <span class='fail'>NOT FOUND</span></p>";
    }
}

$js_files = ['../assets/js/script.js', '../assets/js/admin.js'];
foreach ($js_files as $js_file) {
    if (file_exists($js_file)) {
        $size = filesize($js_file);
        echo "<p>✅ <strong>$js_file:</strong> <span class='pass'>EXISTS</span> (Size: " . number_format($size) . " bytes)</p>";
    } else {
        echo "<p>❌ <strong>$js_file:</strong> <span class='fail'>NOT FOUND</span></p>";
    }
}
echo "</div>";

// Test 8: Header Include Test
echo "<div class='test-section'>";
echo "<h2>8. Header Include Test</h2>";

try {
    ob_start();
    $page_title = 'Test Page';
    include '../includes/header.php';
    $header_content = ob_get_clean();
    
    if (strlen($header_content) > 100) {
        echo "<p>✅ <strong>Header Include:</strong> <span class='pass'>WORKING</span> (Generated " . strlen($header_content) . " characters)</p>";
    } else {
        echo "<p>❌ <strong>Header Include:</strong> <span class='fail'>MINIMAL OUTPUT</span></p>";
        echo "<p>Header output:</p>";
        echo "<pre>" . htmlspecialchars($header_content) . "</pre>";
    }
} catch (Exception $e) {
    echo "<p>❌ <strong>Header Include:</strong> <span class='fail'>ERROR</span></p>";
    echo "<p class='fail'>Error: " . $e->getMessage() . "</p>";
}
echo "</div>";

// Test 9: Error Log Check
echo "<div class='test-section'>";
echo "<h2>9. Error Logs</h2>";

$error_log_locations = [
    ini_get('error_log'),
    '/xampp/apache/logs/error.log',
    $_SERVER['DOCUMENT_ROOT'] . '/error.log',
    __DIR__ . '/error.log'
];

$found_errors = false;
foreach ($error_log_locations as $log_file) {
    if ($log_file && file_exists($log_file) && is_readable($log_file)) {
        echo "<p>📄 <strong>Error Log Found:</strong> $log_file</p>";
        $recent_errors = shell_exec("tail -20 \"$log_file\" 2>/dev/null");
        if ($recent_errors) {
            echo "<h3>Recent Errors (last 20 lines):</h3>";
            echo "<pre style='max-height: 200px; overflow-y: auto;'>" . htmlspecialchars($recent_errors) . "</pre>";
            $found_errors = true;
        }
        break;
    }
}

if (!$found_errors) {
    echo "<p><span class='info'>No accessible error logs found or no recent errors.</span></p>";
}
echo "</div>";

// Test 10: Recommendations
echo "<div class='test-section'>";
echo "<h2>10. Recommendations</h2>";

echo "<h3>Based on the diagnostics above, here are the recommendations:</h3>";
echo "<ul>";

// Check for common issues
if (!function_exists('session_start')) {
    echo "<li><span class='fail'>Install PHP session extension</span></li>";
}

if (!class_exists('PDO')) {
    echo "<li><span class='fail'>Install PHP PDO extension</span></li>";
}

if (!in_array('mysql', PDO::getAvailableDrivers())) {
    echo "<li><span class='fail'>Install MySQL PDO driver</span></li>";
}

if (!file_exists('assets/css/style.css')) {
    echo "<li><span class='warning'>Create or check the main CSS file</span></li>";
}

echo "<li><span class='info'>Check XAMPP Apache and MySQL services are running</span></li>";
echo "<li><span class='info'>Verify the database 'automation_industry' exists</span></li>";
echo "<li><span class='info'>Check file permissions for uploads directory</span></li>";
echo "<li><span class='info'>Review error logs for any PHP errors</span></li>";
echo "</ul>";

echo "<h3>Quick Fixes to Try:</h3>";
echo "<ol>";
echo "<li>Restart XAMPP Apache and MySQL services</li>";
echo "<li>Check if the database exists: <code>http://localhost/phpmyadmin</code></li>";
echo "<li>Verify the correct database credentials in config files</li>";
echo "<li>Check if the CSS file is loading properly</li>";
echo "<li>Look for any PHP syntax errors in the files</li>";
echo "</ol>";
echo "</div>";

// Test 11: Simple Index Test
echo "<div class='test-section'>";
echo "<h2>11. Simple Index Test</h2>";

echo "<p>Let's test a simplified version of your index page:</p>";

try {
    echo "<h3>Testing basic PHP execution:</h3>";
    echo "<p>✅ PHP is working - you're seeing this diagnostic page!</p>";
    
    echo "<h3>Testing config inclusion:</h3>";
    require_once '../config/config.php';
    echo "<p>✅ Config loaded successfully</p>";
    
    echo "<h3>Testing header inclusion (simplified):</h3>";
    $page_title = 'Test';
    ob_start();
    echo "<!DOCTYPE html><html><head><title>Test</title></head><body><nav>Test Navbar</nav>";
    $simple_header = ob_get_clean();
    echo "<p>✅ Basic HTML structure works</p>";
    
} catch (Exception $e) {
    echo "<p>❌ <strong>Simple Test Failed:</strong> " . $e->getMessage() . "</p>";
}
echo "</div>";

echo "<div style='margin-top: 30px; padding: 20px; background: #e9ecef; border-radius: 8px;'>";
echo "<h2>🎯 Next Steps</h2>";
echo "<p>After reviewing the diagnostics above:</p>";
echo "<ol>";
echo "<li>Fix any <span class='fail'>FAILED</span> tests first</li>";
echo "<li>Address any <span class='warning'>WARNING</span> issues</li>";
echo "<li>If everything looks good, the issue might be in the CSS or JavaScript</li>";
echo "<li><span class='info'>Try accessing: <code><a href='../index.php'>index.php</a></code> after fixes</li>";
echo "</ol>";
echo "</div>";

echo "</body></html>";
?>
