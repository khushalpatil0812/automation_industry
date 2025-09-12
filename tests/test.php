<?php
// Simple test file to check basic functionality
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Quick System Test</h1>";

// Test 1: Basic PHP
echo "<h2>1. PHP Test</h2>";
echo "PHP Version: " . phpversion() . "<br>";
echo "Current Time: " . date('Y-m-d H:i:s') . "<br>";

// Test 2: File includes
echo "<h2>2. File Include Test</h2>";
try {
    require_once '../config/config.php';
    echo "✅ Config loaded<br>";
} catch (Exception $e) {
    echo "❌ Config error: " . $e->getMessage() . "<br>";
}

// Test 3: Database
echo "<h2>3. Database Test</h2>";
try {
    require_once '../config/database.php';
    $connection = $database->getConnection();
    if ($connection) {
        echo "✅ Database connected<br>";
        
        // Test a simple query
        $stmt = $connection->query("SELECT 1 as test");
        $result = $stmt->fetch();
        echo "✅ Database query works: " . $result['test'] . "<br>";
    } else {
        echo "❌ Database connection failed<br>";
    }
} catch (Exception $e) {
    echo "❌ Database error: " . $e->getMessage() . "<br>";
}

// Test 4: Session
echo "<h2>4. Session Test</h2>";
if (session_status() == PHP_SESSION_ACTIVE) {
    echo "✅ Session is active<br>";
    $_SESSION['test'] = 'Session working';
    echo "✅ Session write test: " . $_SESSION['test'] . "<br>";
} else {
    echo "❌ Session not active<br>";
}

// Test 5: Classes
echo "<h2>5. Class Test</h2>";
try {
    require_once '../classes/Service.php';
    $service = new Service();
    echo "✅ Service class loaded<br>";
} catch (Exception $e) {
    echo "❌ Service class error: " . $e->getMessage() . "<br>";
}

// Test 6: Simple header test
echo "<h2>6. Header Test</h2>";
try {
    ob_start();
    $page_title = 'Test Page';
    include '../includes/header.php';
    $header_output = ob_get_clean();
    
    if (strlen($header_output) > 50) {
        echo "✅ Header generates output (" . strlen($header_output) . " chars)<br>";
    } else {
        echo "❌ Header output too short<br>";
        echo "Output: " . htmlspecialchars($header_output) . "<br>";
    }
} catch (Exception $e) {
    echo "❌ Header error: " . $e->getMessage() . "<br>";
}

echo "<hr>";
echo "<h2>Next Step</h2>";
echo "<p>If all tests pass, try: <a href='../index.php'>Go to Index Page</a></p>";
echo "<p>For detailed diagnostics: <a href='diagnostic.php'>Run Full Diagnostics</a></p>";
?>
