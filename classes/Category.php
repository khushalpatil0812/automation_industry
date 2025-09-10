<?php
class Category {
    private $db;
    
    public function __construct($database) {
        $this->db = $database;
    }
    
    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM categories ORDER BY name ASC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getCategoryById($id) {
        $stmt = $this->db->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function createCategory($name, $description, $icon) {
        $stmt = $this->db->prepare("INSERT INTO categories (name, description, icon) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $description, $icon]);
    }
    
    public function updateCategory($id, $name, $description, $icon) {
        $stmt = $this->db->prepare("UPDATE categories SET name = ?, description = ?, icon = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $icon, $id]);
    }
    
    public function deleteCategory($id) {
        // First, update services to remove category reference
        $stmt = $this->db->prepare("UPDATE services SET category_id = NULL WHERE category_id = ?");
        $stmt->execute([$id]);
        
        // Then delete the category
        $stmt = $this->db->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }
    
    public function getCategoryWithServiceCount() {
        $stmt = $this->db->prepare("
            SELECT c.*, COUNT(s.id) as service_count 
            FROM categories c 
            LEFT JOIN services s ON c.id = s.category_id 
            GROUP BY c.id 
            ORDER BY c.name ASC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
