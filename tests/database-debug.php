<?php
// Database Debug Script
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>";
echo "<html><head><title>Database Debug</title>";
echo "<style>body{font-family:Arial,sans-serif;margin:20px;background:#f5f5f5;}";
echo ".container{background:white;padding:20px;border-radius:8px;max-width:800px;}";
echo ".success{color:#28a745;font-weight:bold;}";
echo ".error{color:#dc3545;font-weight:bold;}";
echo ".warning{color:#ffc107;font-weight:bold;}";
echo ".info{color:#17a2b8;}";
echo "pre{background:#f8f9fa;padding:15px;border-radius:4px;overflow-x:auto;}";
echo "</style></head><body>";

echo "<div class='container'>";
echo "<h1>🔍 Database Debug Information</h1>";

$host = 'localhost';
$username = 'root';
$password = 'kunal';
$database_name = 'automation_industry';

echo "<h2>Connection Test</h2>";

try {
    // Test MySQL server connection
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='success'>✅ MySQL server connection: OK</p>";
    
    // Check if database exists
    $stmt = $pdo->query("SHOW DATABASES");
    $databases = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<h3>Available Databases:</h3><ul>";
    foreach ($databases as $db) {
        if ($db === $database_name) {
            echo "<li><strong style='color:#28a745;'>$db</strong> ← Target database</li>";
        } else {
            echo "<li>$db</li>";
        }
    }
    echo "</ul>";
    
    if (in_array($database_name, $databases)) {
        echo "<p class='success'>✅ Database '$database_name' exists</p>";
        
        // Connect to the database
        $pdo_db = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
        $pdo_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p class='success'>✅ Connected to '$database_name'</p>";
        
        // Check tables
        echo "<h3>Tables in '$database_name':</h3>";
        $stmt = $pdo_db->query("SHOW TABLES");
        $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        if (empty($tables)) {
            echo "<p class='warning'>⚠️ No tables found in database</p>";
        } else {
            echo "<ul>";
            foreach ($tables as $table) {
                echo "<li><strong>$table</strong>";
                
                // Check row count
                try {
                    $count_stmt = $pdo_db->query("SELECT COUNT(*) as count FROM `$table`");
                    $count = $count_stmt->fetch()['count'];
                    echo " ($count rows)";
                } catch (Exception $e) {
                    echo " (error counting rows)";
                }
                echo "</li>";
            }
            echo "</ul>";
        }
        
        // Check for specific tables
        $required_tables = ['categories', 'services', 'admin_users'];
        echo "<h3>Required Tables Check:</h3>";
        foreach ($required_tables as $table) {
            if (in_array($table, $tables)) {
                echo "<p class='success'>✅ $table: EXISTS</p>";
            } else {
                echo "<p class='error'>❌ $table: MISSING</p>";
            }
        }
        
    } else {
        echo "<p class='error'>❌ Database '$database_name' does not exist</p>";
    }
    
} catch (PDOException $e) {
    echo "<p class='error'>❌ Connection failed: " . $e->getMessage() . "</p>";
}

echo "<h2>🔧 What To Do Next</h2>";

if (isset($tables) && count($tables) === 0) {
    echo "<div style='background:#fff3cd;border:1px solid #ffeaa7;padding:15px;border-radius:5px;'>";
    echo "<h3 style='color:#856404;margin-top:0;'>Database exists but no tables found</h3>";
    echo "<p style='color:#856404;'>The database was created but the table creation failed. This usually happens when:</p>";
    echo "<ul style='color:#856404;'>";
    echo "<li>SQL parsing errors in the original setup script</li>";
    echo "<li>Syntax errors in the schema file</li>";
    echo "<li>Permission issues</li>";
    echo "</ul>";
    echo "<p style='color:#856404;'><strong>Solution:</strong> Use the improved setup script.</p>";
    echo "</div>";
} elseif (!isset($databases) || !in_array($database_name, $databases)) {
    echo "<div style='background:#f8d7da;border:1px solid #f5c6cb;padding:15px;border-radius:5px;'>";
    echo "<h3 style='color:#721c24;margin-top:0;'>Database does not exist</h3>";
    echo "<p style='color:#721c24;'>The automation_industry database was never created or was deleted.</p>";
    echo "<p style='color:#721c24;'><strong>Solution:</strong> Run the database setup script.</p>";
    echo "</div>";
} else {
    echo "<div style='background:#d1ecf1;border:1px solid #bee5eb;padding:15px;border-radius:5px;'>";
    echo "<h3 style='color:#0c5460;margin-top:0;'>Database looks good!</h3>";
    echo "<p style='color:#0c5460;'>All required tables exist. The error might be elsewhere.</p>";
    echo "</div>";
}

echo "<h3>Recommended Actions:</h3>";
echo "<ol>";
echo "<li><a href='setup-database-v2.php'>Run Improved Database Setup</a> (recommended)</li>";
echo "<li><a href='test.php'>Run Quick Test</a> after setup</li>";
echo "<li><a href='diagnostic.php'>Run Full Diagnostics</a> for detailed analysis</li>";
echo "</ol>";

echo "</div></body></html>";
?>
