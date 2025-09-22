<?php
// BlueHost Database Configuration
class Database {
    // BlueHost database credentials
    private $host = 'localhost'; // BlueHost MySQL host
    private $db_name = 'yourusername_automation_industry'; // Format: cpanel_username_dbname
    private $username = 'yourusername_dbuser'; // BlueHost database username
    private $password = 'your_secure_password'; // Your database password
    private $port = '3306'; // Standard MySQL port
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            // BlueHost PDO connection
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name . ";charset=utf8mb4",
                $this->username, 
                $this->password,
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
                )
            );
        } catch(PDOException $exception) {
            // Log error instead of displaying (for production)
            error_log("Database Connection Error: " . $exception->getMessage());
            die("Database connection failed. Please contact administrator.");
        }
        return $this->conn;
    }
}

$database = new Database();
$pdo = $database->getConnection();
?>