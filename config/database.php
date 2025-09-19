<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'automation_industry';
    private $username = 'root';
<<<<<<< HEAD
    private $password = 'KHUSHAL#0812';
=======
    private $port = '3307';
    private $password = '';
>>>>>>> d8c443245e204701c115af58b0a17b88c67b7182
    private $conn;
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db_name,
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
