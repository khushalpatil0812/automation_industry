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

    // 🔹 Get all services (admin: active + inactive)
    public function getAllServices() {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  LEFT JOIN categories c ON s.category_id = c.id 
                  ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Get only active services (frontend)
    public function getActiveServices() {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  LEFT JOIN categories c ON s.category_id = c.id 
                  WHERE s.is_active = 1 
                  ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Get services by category (only active)
    public function getServicesByCategory($category) {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  JOIN categories c ON s.category_id = c.id 
                  WHERE c.name = ? AND s.is_active = 1 
                  ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $category);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Get services by category ID (only active)
    public function getServicesByCategoryId($category_id) {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  JOIN categories c ON s.category_id = c.id 
                  WHERE s.category_id = ? AND s.is_active = 1 
                  ORDER BY s.created_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $category_id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Get a single service by ID (only active on frontend)
    public function getServiceById($id) {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  LEFT JOIN categories c ON s.category_id = c.id 
                  WHERE s.id = ? AND s.is_active = 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Get a single service by ID (admin: includes inactive services)
    public function getServiceByIdAdmin($id) {
        $query = "SELECT s.*, c.name as category_name 
                  FROM " . $this->table . " s 
                  LEFT JOIN categories c ON s.category_id = c.id 
                  WHERE s.id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 🔹 Get active categories (names only)
    public function getCategories() {
        $query = "SELECT name FROM categories WHERE is_active = 1 ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    // 🔹 Get active categories with full details
    public function getCategoriesWithDetails() {
        $query = "SELECT * FROM categories WHERE is_active = 1 ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Get all categories (including inactive) with full details
    public function getAllCategoriesWithDetails() {
        $query = "SELECT * FROM categories ORDER BY name";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔹 Create service (defaults to active)
    public function createService($title, $category_id, $description, $image, $features = '', $is_active = 1) {
        $query = "INSERT INTO " . $this->table . " (title, category_id, description, image, features, is_active) 
                  VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$title, $category_id, $description, $image, $features, $is_active]);
    }

    // 🔹 Update service
    public function updateService($id, $title, $category_id, $description, $image = null, $features = '', $is_active = 1) {
        if ($image) {
            $query = "UPDATE " . $this->table . " 
                      SET title = ?, category_id = ?, description = ?, image = ?, features = ?, is_active = ? 
                      WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$title, $category_id, $description, $image, $features, $is_active, $id]);
        } else {
            $query = "UPDATE " . $this->table . " 
                      SET title = ?, category_id = ?, description = ?, features = ?, is_active = ? 
                      WHERE id = ?";
            $stmt = $this->conn->prepare($query);
            return $stmt->execute([$title, $category_id, $description, $features, $is_active, $id]);
        }
    }

    // 🔹 Permanently delete service (admin only)
    public function deleteService($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }

    // 🔹 Activate / Deactivate service
    public function setServiceStatus($id, $status) {
        $query = "UPDATE " . $this->table . " SET is_active = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$status, $id]);
    }
}
?>
