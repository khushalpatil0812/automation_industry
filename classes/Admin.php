<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

class Admin {
    private $conn;
    public function getConnection() {
        return $this->conn;
    }
    private $table = 'admin_users';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function login($username, $password) {
        $query = "SELECT id, username, password FROM " . $this->table . " WHERE username = ? AND is_active = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $username);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $row['password'])) {
                $_SESSION[ADMIN_SESSION_NAME] = true;
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_username'] = $row['username'];
                $_SESSION['login_time'] = time();
                return true;
            }
        }
        return false;
    }

    public function isLoggedIn() {
        if (isset($_SESSION[ADMIN_SESSION_NAME]) && $_SESSION[ADMIN_SESSION_NAME] === true) {
            // Check session timeout
            if (isset($_SESSION['login_time']) && (time() - $_SESSION['login_time']) > SESSION_TIMEOUT) {
                $this->logout();
                return false;
            }
            return true;
        }
        return false;
    }

    public function logout() {
        unset($_SESSION[ADMIN_SESSION_NAME]);
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_username']);
        unset($_SESSION['login_time']);
        session_destroy();
    }

    public function createDefaultAdmin() {
        $query = "SELECT COUNT(*) FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        if ($stmt->fetchColumn() == 0) {
            $username = 'admin';
            $password = password_hash('admin123', PASSWORD_DEFAULT);
            $email = 'admin@businesspro.com';
            
            $query = "INSERT INTO " . $this->table . " (username, password, email, is_active) VALUES (?, ?, ?, 1)";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$username, $password, $email]);
        }
        return false;
    }

    public function needsSetup() {
        $query = "SELECT COUNT(*) FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn() == 0;
    }
}
?>
