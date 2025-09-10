<?php
require_once '../config/config.php';
require_once '../config/database.php';

$database = new Database();
$conn = $database->getConnection();

// Delete existing admin users
$query = "DELETE FROM admin_users";
$stmt = $conn->prepare($query);
$stmt->execute();

// Create new admin with proper password hash
$username = 'admin';
$password = password_hash('admin123', PASSWORD_DEFAULT);
$email = 'admin@automation-industry.com';

$query = "INSERT INTO admin_users (username, password, email, is_active) VALUES (?, ?, ?, 1)";
$stmt = $conn->prepare($query);
$result = $stmt->execute([$username, $password, $email]);

if ($result) {
    echo "Admin user reset successfully!<br>";
    echo "Username: admin<br>";
    echo "Password: admin123<br>";
    echo "<a href='index.php'>Go to Login</a>";
} else {
    echo "Error resetting admin user.";
}
?>
