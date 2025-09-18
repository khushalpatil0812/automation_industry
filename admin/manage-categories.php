<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Category.php';

$admin = new Admin();
$category = new Category($pdo);

// Check if logged in
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$message = '';
$errors = [];

// Handle form submissions
if ($_POST) {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add') {
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $icon = trim($_POST['icon'] ?? '');
        
        // Validation
        if (empty($name)) {
            $errors[] = "Category name is required.";
        } elseif (strlen($name) < 2) {
            $errors[] = "Category name must be at least 2 characters.";
        } elseif (strlen($name) > 100) {
            $errors[] = "Category name must not exceed 100 characters.";
        }
        
        if (empty($errors)) {
            try {
                if ($category->createCategory($name, $description, $icon)) {
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <i class="fas fa-check-circle"></i> Category created successfully!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>';
                } else {
                    $errors[] = "Failed to create category. Please try again.";
                }
            } catch (Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
            }
        }
    }
    
    elseif ($action === 'edit') {
        $id = intval($_POST['id'] ?? 0);
        $name = trim($_POST['name'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $icon = trim($_POST['icon'] ?? '');
        
        // Validation
        if (empty($name)) {
            $errors[] = "Category name is required.";
        } elseif (strlen($name) < 2) {
            $errors[] = "Category name must be at least 2 characters.";
        } elseif (strlen($name) > 100) {
            $errors[] = "Category name must not exceed 100 characters.";
        }
        
        if (empty($errors)) {
            try {
                if ($category->updateCategory($id, $name, $description, $icon)) {
                    $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <i class="fas fa-check-circle"></i> Category updated successfully!
                                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>';
                } else {
                    $errors[] = "Failed to update category. Please try again.";
                }
            } catch (Exception $e) {
                $errors[] = "Error: " . $e->getMessage();
            }
        }
    }
    
    elseif ($action === 'toggle_status') {
        $id = intval($_POST['id'] ?? 0);
        $current_status = intval($_POST['current_status'] ?? 0);
        $new_status = $current_status ? 0 : 1;
        
        try {
            if ($category->toggleStatus($id, $new_status)) {
                echo json_encode(['success' => true, 'new_status' => $new_status]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to update status']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }
    
    elseif ($action === 'delete') {
        $id = intval($_POST['id'] ?? 0);
        
        try {
            if ($category->deleteCategory($id)) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
            }
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => $e->getMessage()]);
        }
        exit;
    }
    
    // Display validation errors
    if (!empty($errors)) {
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:<br>
                      • ' . implode('<br>• ', $errors) . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>';
    }
}

// Get all categories with service count
try {
    $categories = $category->getCategoriesWithServiceCount();
} catch (Exception $e) {
    $categories = [];
    $message = '<div class="alert alert-danger">Error loading categories: ' . $e->getMessage() . '</div>';
}

$page_title = "Manage Categories";
include 'includes/admin-header.php';
?>

<!-- Professional CSS Styling -->
<style>
:root {
    --category-primary: #4f46e5;
    --category-secondary: #6366f1;
    --category-success: #10b981;
    --category-warning: #f59e0b;
    --category-danger: #ef4444;
    --category-info: #3b82f6;
    --category-light: #f8fafc;
    --category-dark: #1e293b;
    --category-border: #e2e8f0;
    --category-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --category-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --category-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.category-container {
    padding: 2rem 0;
    min-height: calc(100vh - 200px);
}

/* Professional Header */
.category-header {
    background: var(--category-gradient);
    color: white;
    padding: 2.5rem 0;
    margin: -2rem -15px 2rem -15px;
    border-radius: 0 0 1.5rem 1.5rem;
    position: relative;
    overflow: hidden;
}

.category-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,0 1000,100 0,100"/></svg>');
    background-size: cover;
}

.category-header .container-fluid {
    position: relative;
    z-index: 1;
}

/* Breadcrumb Navigation */
.breadcrumb-nav {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    font-size: 0.9rem;
}

.breadcrumb-nav a {
    color: rgba(255, 255, 255, 0.8);
    text-decoration: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.breadcrumb-nav a:hover {
    color: white;
    text-decoration: none;
}

.breadcrumb-separator {
    color: rgba(255, 255, 255, 0.6);
}

/* Category Title and Meta */
.category-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    line-height: 1.2;
}

.category-stats {
    display: flex;
    gap: 2rem;
    align-items: center;
    flex-wrap: wrap;
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.75rem 1.5rem;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 2rem;
    backdrop-filter: blur(10px);
}

.stat-icon {
    font-size: 1.5rem;
    opacity: 0.9;
}

.stat-content {
    display: flex;
    flex-direction: column;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
}

.stat-label {
    font-size: 0.875rem;
    opacity: 0.9;
    line-height: 1;
}

/* Action Buttons Header */
.header-actions {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
    flex-wrap: wrap;
}

.action-btn-header {
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    border: 1px solid rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    cursor: pointer;
}

.action-btn-header:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

/* Professional Cards */
.category-card {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--category-shadow);
    border: 1px solid var(--category-border);
    overflow: hidden;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.category-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--category-shadow-lg);
}

.card-header-pro {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 1.5rem;
    border-bottom: 1px solid var(--category-border);
}

.card-title-pro {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--category-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-title-pro i {
    color: var(--category-primary);
}

.card-body-pro {
    padding: 0;
}

/* DataTable Styling */
.category-table-container {
    position: relative;
}

.table-responsive {
    border-radius: 0.5rem;
    overflow: hidden;
}

.category-table {
    margin: 0;
    border: none;
}

.category-table thead th {
    background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
    border: none;
    padding: 1rem;
    font-weight: 600;
    color: var(--category-dark);
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border-bottom: 2px solid var(--category-border);
}

.category-table tbody td {
    padding: 1rem;
    border: none;
    border-bottom: 1px solid #f1f5f9;
    vertical-align: middle;
}

.category-table tbody tr:hover {
    background: #f8fafc;
}

/* Category Name with Icon */
.category-name {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-weight: 600;
    color: var(--category-dark);
}

.category-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--category-primary), var(--category-secondary));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.1rem;
}

.category-description {
    color: #64748b;
    font-size: 0.9rem;
    max-width: 300px;
    line-height: 1.4;
}

/* Status Badge */
.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 2rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}

.status-badge.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--category-success);
}

.status-badge.inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--category-danger);
}

.status-badge i {
    font-size: 0.75rem;
}

/* Service Count Badge */
.service-count {
    padding: 0.25rem 0.75rem;
    background: rgba(79, 70, 229, 0.1);
    color: var(--category-primary);
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.action-btn {
    padding: 0.5rem;
    border: none;
    border-radius: 0.5rem;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    font-size: 0.875rem;
}

.action-btn:hover {
    transform: translateY(-2px);
}

.action-btn.edit-btn {
    background: rgba(59, 130, 246, 0.1);
    color: var(--category-info);
}

.action-btn.edit-btn:hover {
    background: var(--category-info);
    color: white;
}

.action-btn.toggle-btn {
    background: rgba(245, 158, 11, 0.1);
    color: var(--category-warning);
}

.action-btn.toggle-btn:hover {
    background: var(--category-warning);
    color: white;
}

.action-btn.delete-btn {
    background: rgba(239, 68, 68, 0.1);
    color: var(--category-danger);
}

.action-btn.delete-btn:hover {
    background: var(--category-danger);
    color: white;
}

.action-btn.loading {
    opacity: 0.7;
    pointer-events: none;
}

.action-btn.loading i {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Modal Styling */
.modal-content {
    border-radius: 1rem;
    border: none;
    box-shadow: var(--category-shadow-lg);
}

.modal-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-bottom: 1px solid var(--category-border);
    border-radius: 1rem 1rem 0 0;
    padding: 1.5rem;
}

.modal-title {
    font-weight: 600;
    color: var(--category-dark);
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.modal-title i {
    color: var(--category-primary);
}

.modal-body {
    padding: 2rem;
}

.modal-footer {
    border-top: 1px solid var(--category-border);
    padding: 1.5rem;
}

/* Form Styling */
.form-group {
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--category-dark);
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.form-control {
    border: 2px solid var(--category-border);
    border-radius: 0.75rem;
    padding: 0.75rem 1rem;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.form-control:focus {
    border-color: var(--category-primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.btn {
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
}

.btn:hover {
    transform: translateY(-2px);
}

.btn-primary {
    background: var(--category-primary);
    border-color: var(--category-primary);
}

.btn-primary:hover {
    background: var(--category-secondary);
    border-color: var(--category-secondary);
}

.btn-secondary {
    background: #6b7280;
    border-color: #6b7280;
}

.btn-secondary:hover {
    background: #4b5563;
    border-color: #4b5563;
}

/* Responsive Design */
@media (max-width: 768px) {
    .category-header {
        margin: -1rem -15px 1.5rem -15px;
        padding: 2rem 0;
    }
    
    .category-title {
        font-size: 2rem;
    }
    
    .category-stats {
        gap: 1rem;
    }
    
    .header-actions {
        gap: 0.5rem;
    }
    
    .action-btn-header {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    .card-body-pro {
        padding: 0;
    }
    
    .category-table thead th,
    .category-table tbody td {
        padding: 0.75rem 0.5rem;
    }
    
    .action-buttons {
        flex-direction: column;
        gap: 0.25rem;
    }
}

/* Loading States */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.9);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 10;
    border-radius: 1rem;
}

.loading-spinner {
    width: 40px;
    height: 40px;
    border: 3px solid #f3f4f6;
    border-top: 3px solid var(--category-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
    color: #64748b;
}

.empty-state i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state h3 {
    color: var(--category-dark);
    margin-bottom: 0.5rem;
}

.empty-state p {
    color: #64748b;
    margin-bottom: 2rem;
}
</style>
