<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'automation_industry';
    private $username = 'root';
    private $password = 'KHUSHAL#0812';
    private $conn;
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                                $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

$database = new Database();
$pdo = $database->getConnection();
?>
