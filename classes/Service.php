<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/database.php';

class Service {
    private $conn;
    private $table = 'services';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAllServices() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServicesByCategory($category) {
        $query = "SELECT s.*, c.name as category_name FROM " . $this->table . " s 
                  JOIN categories c ON s.category_id = c.id 
                  WHERE c.name = ? ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getServiceById($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getCategories() {
        $query = "SELECT name FROM categories WHERE is_active = 1 ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function getCategoriesWithDetails() {
        $query = "SELECT * FROM categories WHERE is_active = 1 ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createService($title, $category_id, $description, $image, $features = '') {
        $query = "INSERT INTO " . $this->table . " (title, category_id, description, image, features) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $category_id, $description, $image, $features]);
    }

    public function updateService($id, $title, $category_id, $description, $image = null, $features = '') {
        if ($image) {
            $query = "UPDATE " . $this->table . " SET title = ?, category_id = ?, description = ?, image = ?, features = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$title, $category_id, $description, $image, $features, $id]);
        } else {
            $query = "UPDATE " . $this->table . " SET title = ?, category_id = ?, description = ?, features = ? WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$title, $category_id, $description, $features, $id]);
        }
    }

    public function deleteService($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>
