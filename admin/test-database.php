<?php
// Test database connectivity and data fetching
session_start();
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

echo "<h1>Database Connectivity Test</h1>";

try {
    // Test database connection
    $database = new Database();
    $conn = $database->getConnection();
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
    
    // Test Service class
    $service = new Service();
    echo "<h2>Testing Service Class</h2>";
    
    // Test getAllServices
    $services = $service->getAllServices();
    echo "<h3>All Services (" . count($services) . " found):</h3>";
    echo "<pre>";
    foreach($services as $svc) {
        echo "ID: " . $svc['id'] . " | Title: " . $svc['title'] . " | Category: " . ($svc['category_name'] ?? 'NULL') . " | Status: " . ($svc['is_active'] ? 'Active' : 'Inactive') . "\n";
    }
    echo "</pre>";
    
    // Test categories
    $categories = $service->getCategoriesWithDetails();
    echo "<h3>Categories (" . count($categories) . " found):</h3>";
    echo "<pre>";
    foreach($categories as $cat) {
        echo "ID: " . $cat['id'] . " | Name: " . $cat['name'] . " | Description: " . ($cat['description'] ?? 'NULL') . "\n";
    }
    echo "</pre>";
    
    // Test Category class
    $category = new Category($conn);
    $allCategories = $category->getAllCategories();
    echo "<h3>Categories from Category Class (" . count($allCategories) . " found):</h3>";
    echo "<pre>";
    foreach($allCategories as $cat) {
        echo "ID: " . $cat['id'] . " | Name: " . $cat['name'] . " | Description: " . ($cat['description'] ?? 'NULL') . "\n";
    }
    echo "</pre>";
    
    // Test database structure
    echo "<h2>Database Structure Test</h2>";
    
    // Check services table structure
    $stmt = $conn->prepare("DESCRIBE services");
    $stmt->execute();
    $servicesColumns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>Services Table Structure:</h3>";
    echo "<pre>";
    foreach($servicesColumns as $col) {
        echo $col['Field'] . " - " . $col['Type'] . " - " . ($col['Null'] === 'YES' ? 'NULL' : 'NOT NULL') . "\n";
    }
    echo "</pre>";
    
    // Check categories table structure
    $stmt = $conn->prepare("DESCRIBE categories");
    $stmt->execute();
    $categoriesColumns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo "<h3>Categories Table Structure:</h3>";
    echo "<pre>";
    foreach($categoriesColumns as $col) {
        echo $col['Field'] . " - " . $col['Type'] . " - " . ($col['Null'] === 'YES' ? 'NULL' : 'NOT NULL') . "\n";
    }
    echo "</pre>";
    
    // Test a sample service creation (without actually inserting)
    echo "<h2>Service Creation Test (Dry Run)</h2>";
    $testTitle = "Test Service";
    $testCategoryId = 1;
    $testDescription = "This is a test description";
    $testImage = "test.jpg";
    $testFeatures = "Feature 1\nFeature 2\nFeature 3";
    
    echo "<p>Test data prepared:</p>";
    echo "<ul>";
    echo "<li>Title: " . $testTitle . "</li>";
    echo "<li>Category ID: " . $testCategoryId . "</li>";
    echo "<li>Description: " . $testDescription . "</li>";
    echo "<li>Image: " . $testImage . "</li>";
    echo "<li>Features: " . $testFeatures . "</li>";
    echo "</ul>";
    
    // Test the prepared statement (without executing)
    try {
        $query = "INSERT INTO services (title, category_id, description, image, features, is_active) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        echo "<p style='color: green;'>✅ Service creation query prepared successfully!</p>";
        echo "<p>Query: " . $query . "</p>";
    } catch (Exception $e) {
        echo "<p style='color: red;'>❌ Error preparing service creation query: " . $e->getMessage() . "</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ Database connection failed: " . $e->getMessage() . "</p>";
    echo "<p>Error details: " . $e->getTraceAsString() . "</p>";
}

echo "<br><br><a href='add-service.php'>← Back to Add Service</a>";
echo "<br><a href='manage-services.php'>← Back to Manage Services</a>";
echo "<br><a href='dashboard.php'>← Back to Dashboard</a>";
?>