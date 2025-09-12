<?php
// Database Setup Script
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>";
echo "<html><head><title>Database Setup</title>";
echo "<style>body{font-family:Arial,sans-serif;margin:20px;background:#f5f5f5;}";
echo ".container{background:white;padding:20px;border-radius:8px;max-width:800px;}";
echo ".success{color:#28a745;font-weight:bold;}";
echo ".error{color:#dc3545;font-weight:bold;}";
echo ".warning{color:#ffc107;font-weight:bold;}";
echo "pre{background:#f8f9fa;padding:15px;border-radius:4px;overflow-x:auto;}";
echo "</style></head><body>";

echo "<div class='container'>";
echo "<h1>🔧 Database Setup for Automation Industry</h1>";

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = 'kunal';
$database_name = 'automation_industry';

try {
    // First, connect without specifying database to create it
    echo "<h2>Step 1: Connecting to MySQL Server</h2>";
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='success'>✅ Connected to MySQL server successfully</p>";

    // Create database if it doesn't exist
    echo "<h2>Step 2: Creating Database</h2>";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$database_name`");
    echo "<p class='success'>✅ Database '$database_name' created/verified</p>";

    // Connect to the specific database
    echo "<h2>Step 3: Connecting to Database</h2>";
    $pdo_db = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
    $pdo_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='success'>✅ Connected to database '$database_name'</p>";

    // Read and execute schema
    echo "<h2>Step 4: Setting Up Database Schema</h2>";
    $schema_file = __DIR__ . '/../database/schema.sql';
    
    if (file_exists($schema_file)) {
        $schema_content = file_get_contents($schema_file);
        
        // Remove CREATE DATABASE statements since we already created it
        $schema_content = preg_replace('/CREATE DATABASE[^;]+;/', '', $schema_content);
        $schema_content = preg_replace('/USE[^;]+;/', '', $schema_content);
        
        // Split by semicolons and execute each statement
        $statements = array_filter(array_map('trim', explode(';', $schema_content)));
        
        $executed = 0;
        foreach ($statements as $statement) {
            if (!empty($statement) && !preg_match('/^\s*--/', $statement)) {
                try {
                    $pdo_db->exec($statement);
                    $executed++;
                } catch (PDOException $e) {
                    // Skip if table already exists
                    if (strpos($e->getMessage(), 'already exists') === false) {
                        echo "<p class='warning'>⚠️ Warning executing statement: " . htmlspecialchars($e->getMessage()) . "</p>";
                    }
                }
            }
        }
        
        echo "<p class='success'>✅ Executed $executed SQL statements</p>";
    } else {
        echo "<p class='error'>❌ Schema file not found: $schema_file</p>";
    }

    // Verify tables were created
    echo "<h2>Step 5: Verifying Database Structure</h2>";
    $stmt = $pdo_db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<p>Tables created:</p><ul>";
    foreach ($tables as $table) {
        echo "<li>$table</li>";
    }
    echo "</ul>";

    // Check data in categories table
    echo "<h2>Step 6: Checking Sample Data</h2>";
    try {
        $stmt = $pdo_db->query("SELECT COUNT(*) as count FROM categories");
        $category_count = $stmt->fetch()['count'];
        echo "<p class='success'>✅ Categories table has $category_count records</p>";

        $stmt = $pdo_db->query("SELECT COUNT(*) as count FROM services");
        $service_count = $stmt->fetch()['count'];
        echo "<p class='success'>✅ Services table has $service_count records</p>";

        $stmt = $pdo_db->query("SELECT COUNT(*) as count FROM admin_users");
        $admin_count = $stmt->fetch()['count'];
        echo "<p class='success'>✅ Admin users table has $admin_count records</p>";

    } catch (PDOException $e) {
        echo "<p class='error'>❌ Error checking data: " . $e->getMessage() . "</p>";
    }

    echo "<h2>🎉 Database Setup Complete!</h2>";
    echo "<p class='success'>Your database is now ready. You can:</p>";
    echo "<ul>";
    echo "<li><a href='test.php'>Run the test again</a></li>";
    echo "<li><a href='../index.php'>Try your main website</a></li>";
    echo "<li><a href='../admin/'>Access the admin panel</a></li>";
    echo "</ul>";

    echo "<h3>Default Admin Credentials:</h3>";
    echo "<p><strong>Username:</strong> admin<br>";
    echo "<strong>Password:</strong> kunal</p>";

} catch (PDOException $e) {
    echo "<p class='error'>❌ Database connection failed: " . $e->getMessage() . "</p>";
    echo "<h3>Troubleshooting:</h3>";
    echo "<ul>";
    echo "<li>Make sure XAMPP MySQL service is running</li>";
    echo "<li>Check if the database credentials are correct in config/config.php</li>";
    echo "<li>Verify MySQL is accessible on localhost:3306</li>";
    echo "</ul>";
}

echo "</div></body></html>";
?>
