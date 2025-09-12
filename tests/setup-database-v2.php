<?php
// Improved Database Setup Script with Better Error Handling
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<!DOCTYPE html>";
echo "<html><head><title>Database Setup - Improved</title>";
echo "<style>body{font-family:Arial,sans-serif;margin:20px;background:#f5f5f5;}";
echo ".container{background:white;padding:20px;border-radius:8px;max-width:900px;}";
echo ".success{color:#28a745;font-weight:bold;}";
echo ".error{color:#dc3545;font-weight:bold;}";
echo ".warning{color:#ffc107;font-weight:bold;}";
echo ".info{color:#17a2b8;}";
echo "pre{background:#f8f9fa;padding:15px;border-radius:4px;overflow-x:auto;max-height:200px;}";
echo ".sql-statement{background:#f1f3f4;padding:10px;margin:5px 0;border-left:4px solid #4285f4;font-family:monospace;font-size:12px;}";
echo "</style></head><body>";

echo "<div class='container'>";
echo "<h1>🔧 Improved Database Setup for Automation Industry</h1>";

// Database connection parameters
$host = 'localhost';
$username = 'root';
$password = 'kunal';
$database_name = 'automation_industry';

try {
    // Step 1: Connect to MySQL server
    echo "<h2>Step 1: Connecting to MySQL Server</h2>";
    $pdo = new PDO("mysql:host=$host", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='success'>✅ Connected to MySQL server successfully</p>";

    // Step 2: Drop and recreate database to ensure clean state
    echo "<h2>Step 2: Creating Fresh Database</h2>";
    $pdo->exec("DROP DATABASE IF EXISTS `$database_name`");
    echo "<p class='info'>🗑️ Dropped existing database if it existed</p>";
    
    $pdo->exec("CREATE DATABASE `$database_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "<p class='success'>✅ Created fresh database '$database_name'</p>";

    // Step 3: Connect to the specific database
    echo "<h2>Step 3: Connecting to New Database</h2>";
    $pdo_db = new PDO("mysql:host=$host;dbname=$database_name", $username, $password);
    $pdo_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p class='success'>✅ Connected to database '$database_name'</p>";

    // Step 4: Create tables manually (more reliable than parsing SQL file)
    echo "<h2>Step 4: Creating Database Tables</h2>";
    
    // Create categories table
    echo "<h3>Creating categories table...</h3>";
    $categories_sql = "
    CREATE TABLE categories (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) UNIQUE NOT NULL,
        description TEXT,
        icon VARCHAR(50),
        is_active BOOLEAN DEFAULT TRUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_name (name)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo_db->exec($categories_sql);
    echo "<p class='success'>✅ Categories table created</p>";

    // Create services table
    echo "<h3>Creating services table...</h3>";
    $services_sql = "
    CREATE TABLE services (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        category_id INT,
        description TEXT NOT NULL,
        image VARCHAR(500),
        features TEXT,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        INDEX idx_category_id (category_id),
        INDEX idx_created_at (created_at),
        FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo_db->exec($services_sql);
    echo "<p class='success'>✅ Services table created</p>";

    // Create admin_users table
    echo "<h3>Creating admin_users table...</h3>";
    $admin_sql = "
    CREATE TABLE admin_users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100),
        is_active BOOLEAN DEFAULT TRUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        last_login TIMESTAMP NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo_db->exec($admin_sql);
    echo "<p class='success'>✅ Admin users table created</p>";

    // Step 5: Insert sample data
    echo "<h2>Step 5: Inserting Sample Data</h2>";
    
    // Insert categories
    echo "<h3>Inserting categories...</h3>";
    $categories_data = [
        ['Web Development', 'Custom websites and web applications', 'code'],
        ['Mobile Apps', 'iOS and Android mobile applications', 'smartphone'],
        ['Digital Marketing', 'SEO, social media, and online marketing', 'trending-up'],
        ['Consulting', 'Business and technology consulting services', 'users'],
        ['E-commerce', 'Online stores and payment solutions', 'shopping-cart'],
        ['Cloud Services', 'Cloud hosting and infrastructure', 'cloud'],
        ['Automation', 'Industrial automation and robotics', 'robot'],
        ['IoT Solutions', 'Internet of Things integration', 'wifi']
    ];
    
    $cat_stmt = $pdo_db->prepare("INSERT INTO categories (name, description, icon) VALUES (?, ?, ?)");
    foreach ($categories_data as $cat) {
        $cat_stmt->execute($cat);
    }
    echo "<p class='success'>✅ Inserted " . count($categories_data) . " categories</p>";

    // Insert services
    echo "<h3>Inserting services...</h3>";
    $services_data = [
        ['Custom Web Development', 1, 'Build responsive, modern websites tailored to your business needs with cutting-edge technologies and best practices.', '/modern-web-development.png'],
        ['E-commerce Solutions', 5, 'Complete online store development with payment integration, inventory management, and customer analytics.', '/placeholder.svg'],
        ['Mobile App Development', 2, 'Native and cross-platform mobile applications for iOS and Android with seamless user experiences.', '/mobile-app-development.png'],
        ['Progressive Web Apps', 2, 'Fast, reliable web applications that work offline and provide native app-like experiences.', '/placeholder.svg'],
        ['SEO Optimization', 3, 'Improve your search engine rankings and drive organic traffic with comprehensive SEO strategies.', '/digital-marketing-dashboard.png'],
        ['Social Media Marketing', 3, 'Engage your audience and build brand awareness through strategic social media campaigns.', '/placeholder.svg'],
        ['Business Strategy Consulting', 4, 'Strategic planning and business analysis to help you make informed decisions and achieve growth.', '/placeholder.svg'],
        ['Digital Transformation', 4, 'Guide your business through digital transformation with technology adoption and process optimization.', '/placeholder.svg'],
        ['Cloud Infrastructure', 6, 'Scalable cloud solutions for hosting, storage, and application deployment with enterprise-grade security.', '/placeholder.svg'],
        ['Database Design', 6, 'Efficient database architecture and optimization for high-performance applications and data analytics.', '/placeholder.svg'],
        ['Industrial Automation', 7, 'Complete automation solutions for manufacturing and industrial processes.', '/robotics-arm.jpg'],
        ['IoT Integration', 8, 'Smart sensors and data analytics for real-time monitoring and control.', '/iot-sensors.jpg']
    ];
    
    $serv_stmt = $pdo_db->prepare("INSERT INTO services (title, category_id, description, image) VALUES (?, ?, ?, ?)");
    foreach ($services_data as $service) {
        $serv_stmt->execute($service);
    }
    echo "<p class='success'>✅ Inserted " . count($services_data) . " services</p>";

    // Insert admin user
    echo "<h3>Creating admin user...</h3>";
    $admin_stmt = $pdo_db->prepare("INSERT INTO admin_users (username, password, email) VALUES (?, ?, ?)");
    $admin_stmt->execute(['admin', 'kunal', 'admin@automation-industry.com']);
    echo "<p class='success'>✅ Created admin user</p>";

    // Step 6: Verify everything
    echo "<h2>Step 6: Final Verification</h2>";
    
    $stmt = $pdo_db->query("SHOW TABLES");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo "<h3>Tables in database:</h3><ul>";
    foreach ($tables as $table) {
        echo "<li><strong>$table</strong></li>";
    }
    echo "</ul>";

    // Check row counts
    echo "<h3>Data verification:</h3>";
    foreach (['categories', 'services', 'admin_users'] as $table) {
        try {
            $stmt = $pdo_db->query("SELECT COUNT(*) as count FROM $table");
            $count = $stmt->fetch()['count'];
            echo "<p class='success'>✅ Table <strong>$table</strong>: $count records</p>";
        } catch (PDOException $e) {
            echo "<p class='error'>❌ Error checking $table: " . $e->getMessage() . "</p>";
        }
    }

    // Test sample queries
    echo "<h3>Testing sample queries:</h3>";
    try {
        $stmt = $pdo_db->query("SELECT name FROM categories LIMIT 3");
        $sample_categories = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "<p class='success'>✅ Sample categories: " . implode(', ', $sample_categories) . "</p>";
        
        $stmt = $pdo_db->query("SELECT title FROM services LIMIT 3");
        $sample_services = $stmt->fetchAll(PDO::FETCH_COLUMN);
        echo "<p class='success'>✅ Sample services: " . implode(', ', $sample_services) . "</p>";
    } catch (PDOException $e) {
        echo "<p class='error'>❌ Error in sample queries: " . $e->getMessage() . "</p>";
    }

    echo "<h2>🎉 Database Setup Complete!</h2>";
    echo "<div style='background:#d1ecf1;border:1px solid #bee5eb;padding:15px;border-radius:5px;margin:20px 0;'>";
    echo "<h3 style='color:#0c5460;margin-top:0;'>✅ Success! Your database is ready.</h3>";
    echo "<p style='color:#0c5460;margin-bottom:0;'><strong>Default Admin Credentials:</strong><br>";
    echo "Username: <code>admin</code><br>";
    echo "Password: <code>kunal</code></p>";
    echo "</div>";

    echo "<h3>Next Steps:</h3>";
    echo "<ul>";
    echo "<li><a href='test.php'>Run Quick Test</a> to verify everything works</li>";
    echo "<li><a href='../index.php'>Visit Main Website</a></li>";
    echo "<li><a href='../admin/'>Access Admin Panel</a></li>";
    echo "</ul>";

} catch (PDOException $e) {
    echo "<h2>❌ Database Setup Failed</h2>";
    echo "<p class='error'>Error: " . $e->getMessage() . "</p>";
    echo "<h3>Troubleshooting:</h3>";
    echo "<ul>";
    echo "<li>Make sure XAMPP MySQL service is running</li>";
    echo "<li>Check MySQL credentials in the script</li>";
    echo "<li>Verify MySQL is accessible on localhost:3306</li>";
    echo "<li>Try restarting XAMPP services</li>";
    echo "</ul>";
}

echo "</div></body></html>";
?>
