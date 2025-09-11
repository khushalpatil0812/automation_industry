<?php
class Category {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Get all categories
    public function getAllCategories() {
        $stmt = $this->pdo->query("SELECT * FROM categories ORDER BY name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get category by ID
    public function getCategoryById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM categories WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create category
    public function createCategory($name, $description = '', $icon = '') {
        $stmt = $this->pdo->prepare("INSERT INTO categories (name, description, icon) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $description, $icon]);
    }

    // Update category
    public function updateCategory($id, $name, $description = '', $icon = '') {
        $stmt = $this->pdo->prepare("UPDATE categories SET name = ?, description = ?, icon = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $icon, $id]);
    }

    // Delete category
    public function deleteCategory($id) {
        // If you want to also remove this category from services, update services table before deleting
        $stmt = $this->pdo->prepare("UPDATE services SET category_id = NULL WHERE category_id = ?");
        $stmt->execute([$id]);

        $stmt = $this->pdo->prepare("DELETE FROM categories WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Get categories with service count
    public function getCategoryWithServiceCount() {
        $stmt = $this->pdo->query("
            SELECT c.*, COUNT(s.id) AS service_count
            FROM categories c
            LEFT JOIN services s ON s.category_id = c.id
            GROUP BY c.id
            ORDER BY c.name ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
