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
        // Log for debugging
        error_log("Delete action called with ID: " . ($_POST['id'] ?? 'not set'));
        
        $id = intval($_POST['id'] ?? 0);
        
        if ($id <= 0) {
            echo json_encode(['success' => false, 'message' => 'Invalid category ID']);
            exit;
        }
        
        try {
            $result = $category->deleteCategory($id);
            error_log("Delete result: " . ($result ? 'true' : 'false'));
            
            if ($result) {
                echo json_encode(['success' => true, 'message' => 'Category deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Failed to delete category']);
            }
        } catch (Exception $e) {
            error_log("Delete error: " . $e->getMessage());
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

<!-- Responsive CSS for Admin Panel -->
<style>
/* Mobile-First Responsive Design */
@media (max-width: 575.98px) {
    /* Extra small devices (phones, less than 576px) */
    .container-fluid {
        padding-left: 10px !important;
        padding-right: 10px !important;
    }
    
    .d-flex.justify-content-between {
        flex-direction: column !important;
        gap: 15px;
    }
    
    .breadcrumb {
        font-size: 0.875rem;
        margin-bottom: 10px !important;
    }
    
    .h3 {
        font-size: 1.5rem !important;
    }
    
    .btn {
        width: 100%;
        margin-bottom: 10px;
    }
    
    .btn.me-2 {
        margin-right: 0 !important;
        margin-bottom: 10px;
    }
    
    .card {
        margin-bottom: 15px;
    }
    
    .table-responsive {
        font-size: 0.875rem;
    }
    
    .btn-group {
        flex-direction: column;
        width: 100%;
    }
    
    .btn-group .btn {
        margin-bottom: 5px;
        border-radius: 0.25rem !important;
    }
    
    .btn-group-mobile {
        display: flex !important;
        flex-direction: column;
        gap: 5px;
        width: 100%;
    }
    
    .btn-group-mobile .btn {
        width: 100%;
        text-align: left;
        justify-content: flex-start;
        padding: 8px 12px !important;
        margin-bottom: 3px;
        border-radius: 0.25rem !important;
    }
    
    .table td {
        padding: 8px 6px;
        vertical-align: top;
    }
    
    .table th {
        padding: 10px 6px;
        font-size: 0.85rem;
    }
    
    .badge {
        font-size: 0.7rem;
        padding: 3px 6px;
    }
    
    .modal-dialog {
        margin: 10px;
        max-width: calc(100% - 20px);
    }
    
    .modal-body {
        padding: 15px;
    }
    
    .form-control, .form-select {
        font-size: 14px;
        padding: 8px 12px;
        margin-bottom: 10px;
    }
    
    .form-label {
        font-size: 0.9rem;
        margin-bottom: 5px;
    }
    
    .modal-footer {
        padding: 10px 15px;
        gap: 10px;
    }
    
    .modal-footer .btn {
        flex: 1;
        margin: 0;
    }
    
    .stats-row .col-xl-3 {
        margin-bottom: 15px;
    }
}

@media (min-width: 576px) and (max-width: 767.98px) {
    /* Small devices (landscape phones, 576px and up) */
    .container-fluid {
        padding-left: 15px !important;
        padding-right: 15px !important;
    }
    
    .d-flex.justify-content-between {
        flex-wrap: wrap;
        gap: 10px;
    }
    
    .btn-group {
        flex-wrap: wrap;
    }
    
    .table-responsive {
        font-size: 0.9rem;
    }
    
    .stats-row .col-xl-3 {
        margin-bottom: 20px;
    }
}

@media (min-width: 768px) and (max-width: 991.98px) {
    /* Medium devices (tablets, 768px and up) */
    .h3 {
        font-size: 1.75rem;
    }
    
    .table-responsive {
        font-size: 0.95rem;
    }
    
    .btn-group .btn {
        padding: 0.375rem 0.5rem;
        font-size: 0.875rem;
    }
    
    .stats-row .col-xl-3 {
        margin-bottom: 20px;
    }
}

@media (min-width: 992px) and (max-width: 1199.98px) {
    /* Large devices (desktops, 992px and up) */
    .container-fluid {
        max-width: 95%;
    }
}

@media (min-width: 1200px) {
    /* Extra large devices (large desktops, 1200px and up) */
    .container-fluid {
        max-width: 90%;
    }
}

/* Universal Mobile Improvements */
@media (max-width: 991.98px) {
    .table th,
    .table td {
        padding: 0.5rem 0.25rem;
        font-size: 0.875rem;
    }
    
    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .modal-body {
        padding: 1rem;
    }
    
    .form-control {
        font-size: 16px; /* Prevents zoom on iOS */
    }
    
    .alert {
        padding: 0.5rem;
        font-size: 0.875rem;
    }
    
    /* Hide less important columns on mobile */
    .d-none-mobile {
        display: none !important;
    }
    
    /* Stack action buttons vertically on mobile */
    .btn-group-mobile {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }
    
    .btn-group-mobile .btn {
        width: 100%;
        text-align: center;
    }
}

/* Tablet specific adjustments */
@media (min-width: 768px) and (max-width: 1023px) {
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    
    .btn-group {
        flex-wrap: nowrap;
    }
    
    .modal-lg {
        max-width: 90%;
    }
}

/* Touch-friendly improvements */
@media (hover: none) and (pointer: coarse) {
    .btn {
        min-height: 44px; /* Apple's recommended touch target size */
        padding: 0.5rem 1rem;
    }
    
    .btn-sm {
        min-height: 38px;
        padding: 0.375rem 0.75rem;
    }
    
    .table th,
    .table td {
        padding: 0.75rem 0.5rem;
    }
}

/* Print styles */
@media print {
    .btn,
    .breadcrumb,
    .modal,
    .alert {
        display: none !important;
    }
    
    .table {
        font-size: 12px;
    }
    
    .card {
        border: 1px solid #000;
        break-inside: avoid;
    }
}
</style>

<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-start mb-4 flex-wrap">
                <div class="flex-grow-1 mb-3 mb-md-0">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-2">
                            <li class="breadcrumb-item">
                                <a href="dashboard.php" class="text-decoration-none">
                                    <i class="fas fa-tachometer-alt me-1"></i><span class="d-none d-sm-inline">Dashboard</span>
                                </a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                <span class="d-none d-sm-inline">Manage </span>Categories
                            </li>
                        </ol>
                    </nav>
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fas fa-tags text-primary me-2"></i>
                        <span class="d-none d-sm-inline">Manage </span>Categories
                    </h1>
                    <p class="text-muted mb-0 d-none d-md-block">Organize and manage your service categories</p>
                </div>
                <div class="d-flex flex-column flex-sm-row gap-2 w-100 w-md-auto">
                    <a href="dashboard.php" class="btn btn-purple" style="background-color: #6f42c1; border-color: #6f42c1; color: white;">
                        <i class="fas fa-arrow-left me-1"></i>
                        <span class="d-none d-sm-inline">Back to </span>Dashboard
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                        <i class="fas fa-plus me-1"></i>
                        <span class="d-none d-sm-inline">Add </span>Category
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    <?php if ($message): ?>
        <div class="row">
            <div class="col-12">
                <?php echo $message; ?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Statistics Cards -->
    <div class="row mb-4 stats-row">
        <div class="col-6 col-md-3 mb-3 mb-md-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body p-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 d-none d-sm-block">Total Categories</div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 d-sm-none">Total</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($categories); ?></div>
                        </div>
                        <div class="col-auto d-none d-sm-block">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3 mb-md-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body p-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 d-none d-sm-block">Active Categories</div>
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1 d-sm-none">Active</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_reduce($categories, function($count, $cat) { return ($cat['is_active'] ?? 1) ? $count + 1 : $count; }, 0); ?>
                            </div>
                        </div>
                        <div class="col-auto d-none d-sm-block">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3 mb-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body p-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 d-none d-sm-block">With Services</div>
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1 d-sm-none">Used</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_reduce($categories, function($count, $cat) { return ($cat['service_count'] ?? 0) > 0 ? $count + 1 : $count; }, 0); ?>
                            </div>
                        </div>
                        <div class="col-auto d-none d-sm-block">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-3 mb-3 mb-md-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body p-3">
                    <div class="row no-gutters align-items-center">
                        <div class="col">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 d-none d-sm-block">Total Services</div>
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1 d-sm-none">Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_sum(array_column($categories, 'service_count')); ?>
                            </div>
                        </div>
                        <div class="col-auto d-none d-sm-block">
                            <i class="fas fa-th-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Table -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Categories List</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow">
                            <div class="dropdown-header">Actions:</div>
                            <a class="dropdown-item" href="#" onclick="refreshTable()">
                                <i class="fas fa-sync fa-sm fa-fw mr-2 text-gray-400"></i>Refresh
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (empty($categories)): ?>
                        <div class="text-center py-5">
                            <i class="fas fa-tags fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-600">No Categories Found</h5>
                            <p class="text-muted">Get started by creating your first category</p>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                                <i class="fas fa-plus me-1"></i>Add First Category
                            </button>
                        </div>
                    <?php else: ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="categoriesTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="d-none d-lg-table-cell">ID</th>
                                        <th>Name</th>
                                        <th class="d-none d-md-table-cell">Description</th>
                                        <th class="d-none d-xl-table-cell">Icon</th>
                                        <th>Services</th>
                                        <th class="d-none d-sm-table-cell">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $cat): ?>
                                        <tr>
                                            <td class="d-none d-lg-table-cell"><?php echo $cat['id']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center flex-wrap">
                                                    <?php if (!empty($cat['icon'])): ?>
                                                        <i class="fas fa-<?php echo htmlspecialchars($cat['icon']); ?> text-primary me-2"></i>
                                                    <?php endif; ?>
                                                    <strong><?php echo htmlspecialchars($cat['name']); ?></strong>
                                                </div>
                                                <!-- Mobile-only status and ID -->
                                                <div class="d-sm-none mt-1">
                                                    <small class="text-muted">ID: <?php echo $cat['id']; ?></small>
                                                    <?php if (($cat['is_active'] ?? 1)): ?>
                                                        <span class="badge bg-success ms-2">Active</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-danger ms-2">Inactive</span>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- Mobile-only description -->
                                                <div class="d-md-none mt-1">
                                                    <small class="text-muted">
                                                        <?php 
                                                        $desc = $cat['description'] ?? '';
                                                        echo !empty($desc) ? htmlspecialchars(substr($desc, 0, 30)) . '...' : 'No description'; 
                                                        ?>
                                                    </small>
                                                </div>
                                            </td>
                                            <td class="d-none d-md-table-cell">
                                                <?php 
                                                $desc = $cat['description'] ?? '';
                                                echo !empty($desc) ? htmlspecialchars(substr($desc, 0, 50)) . (strlen($desc) > 50 ? '...' : '') : '<em class="text-muted">No description</em>'; 
                                                ?>
                                            </td>
                                            <td class="d-none d-xl-table-cell">
                                                <?php if (!empty($cat['icon'])): ?>
                                                    <span class="badge bg-light text-dark">
                                                        <i class="fas fa-<?php echo htmlspecialchars($cat['icon']); ?>"></i>
                                                        fa-<?php echo htmlspecialchars($cat['icon']); ?>
                                                    </span>
                                                <?php else: ?>
                                                    <span class="text-muted">No icon</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <span class="badge bg-primary"><?php echo $cat['service_count'] ?? 0; ?></span>
                                            </td>
                                            <td class="d-none d-sm-table-cell">
                                                <?php if (($cat['is_active'] ?? 1)): ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group d-none d-md-flex" role="group">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" 
                                                            onclick="editCategory(<?php echo htmlspecialchars(json_encode($cat)); ?>)"
                                                            data-bs-toggle="tooltip" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-warning" 
                                                            onclick="toggleStatus(<?php echo $cat['id']; ?>, <?php echo $cat['is_active'] ?? 1; ?>)"
                                                            data-bs-toggle="tooltip" title="Toggle Status">
                                                        <i class="fas fa-toggle-<?php echo ($cat['is_active'] ?? 1) ? 'on' : 'off'; ?>"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger category-delete-btn" 
                                                            data-category-id="<?php echo $cat['id']; ?>" 
                                                            data-category-name="<?php echo htmlspecialchars($cat['name']); ?>"
                                                            data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </div>
                                                <!-- Mobile stacked buttons -->
                                                <div class="btn-group-mobile d-md-none">
                                                    <button type="button" class="btn btn-sm btn-outline-primary mb-1" 
                                                            onclick="editCategory(<?php echo htmlspecialchars(json_encode($cat)); ?>)">
                                                        <i class="fas fa-edit me-1"></i>Edit
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-warning mb-1" 
                                                            onclick="toggleStatus(<?php echo $cat['id']; ?>, <?php echo $cat['is_active'] ?? 1; ?>)">
                                                        <i class="fas fa-toggle-<?php echo ($cat['is_active'] ?? 1) ? 'on' : 'off'; ?> me-1"></i>Toggle
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-outline-danger category-delete-btn mb-1" 
                                                            data-category-id="<?php echo $cat['id']; ?>" 
                                                            data-category-name="<?php echo htmlspecialchars($cat['name']); ?>">
                                                        <i class="fas fa-trash me-1"></i>Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">
                    <i class="fas fa-plus me-2"></i>Add New Category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="add">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoryName" class="form-label">Category Name *</label>
                        <input type="text" class="form-control" id="categoryName" name="name" required maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="categoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="categoryDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="categoryIcon" class="form-label">Icon (FontAwesome)</label>
                        <input type="text" class="form-control" id="categoryIcon" name="icon" placeholder="e.g., home, user, cog">
                        <div class="form-text">Enter icon name without 'fa-' prefix</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel">
                    <i class="fas fa-edit me-2"></i>Edit Category
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" id="editCategoryId" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editCategoryName" class="form-label">Category Name *</label>
                        <input type="text" class="form-control" id="editCategoryName" name="name" required maxlength="100">
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="editCategoryDescription" name="description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="editCategoryIcon" class="form-label">Icon (FontAwesome)</label>
                        <input type="text" class="form-control" id="editCategoryIcon" name="icon" placeholder="e.g., home, user, cog">
                        <div class="form-text">Enter icon name without 'fa-' prefix</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="deleteModalLabel">
                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm Delete
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this category?</p>
                <p class="text-muted" id="deleteMessage"></p>
                <div class="alert alert-warning">
                    <i class="fas fa-info-circle me-2"></i>
                    This action will remove the category from all associated services.
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

<!-- jQuery and DataTables JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

<script>
// Simple, reliable delete function without jQuery complications
document.addEventListener('DOMContentLoaded', function() {
    console.log('Page loaded');
    
    // Initialize tooltips if Bootstrap is available
    if (typeof bootstrap !== 'undefined') {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }
    
    // Add event listeners to delete buttons
    console.log('=== SETTING UP DELETE BUTTON LISTENERS ===');
    var deleteButtons = document.querySelectorAll('.category-delete-btn');
    console.log('Found delete buttons:', deleteButtons.length);
    
    deleteButtons.forEach(function(button, index) {
        console.log('Setting up button', index, ':', button);
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-category-id');
            var name = this.getAttribute('data-category-name');
            console.log('Delete button clicked - ID:', id, 'Name:', name);
            console.log('About to call confirmCategoryDelete...');
            confirmCategoryDelete(id, name);
            console.log('confirmCategoryDelete called');
        });
    });
});

// Global variable for delete ID
var deleteId = null;

// Simple confirm delete function for categories
function confirmCategoryDelete(id, name) {
    try {
        console.log('=== CONFIRM DELETE CALLED ===');
        console.log('ID:', id, '(type:', typeof id, ')');
        console.log('Name:', name, '(type:', typeof name, ')');
        
        deleteId = id;
        console.log('deleteId set to:', deleteId);
        
        // Set the message in the modal
        var messageElement = document.getElementById('deleteMessage');
        console.log('Message element found:', messageElement !== null);
        if (messageElement) {
            messageElement.textContent = 'Category: "' + name + '"';
            console.log('Message set to:', messageElement.textContent);
        } else {
            console.error('deleteMessage element not found!');
        }
        
        // Show the modal
        var modalElement = document.getElementById('deleteModal');
        console.log('Modal element found:', modalElement !== null);
        console.log('Bootstrap available:', typeof bootstrap !== 'undefined');
        
        if (modalElement && typeof bootstrap !== 'undefined') {
            try {
                console.log('Creating Bootstrap modal...');
                var deleteModal = new bootstrap.Modal(modalElement);
                console.log('Modal created, showing...');
                deleteModal.show();
                console.log('=== MODAL SHOWN SUCCESSFULLY ===');
            } catch (error) {
                console.error('Error creating/showing modal:', error);
                console.error('Modal element:', modalElement);
                // Fallback to simple confirm
                if (confirm('Are you sure you want to delete category "' + name + '"?')) {
                    // Call delete directly
                    performDelete(id);
                }
            }
        } else {
            console.error('Modal element not found or Bootstrap not loaded');
            console.error('modalElement:', modalElement);
            console.error('bootstrap:', typeof bootstrap);
            // Fallback to simple confirm
            if (confirm('Are you sure you want to delete category "' + name + '"?')) {
                // Call delete directly
                performDelete(id);
            }
        }
    } catch (error) {
        console.error('Error in confirmDelete function:', error);
        console.error('Stack trace:', error.stack);
        // Fallback to simple confirm
        if (confirm('Are you sure you want to delete category "' + name + '"?')) {
            performDelete(id);
        }
    }
}

// Helper function to perform the actual delete
function performDelete(id) {
    console.log('=== PERFORMING DELETE ===');
    console.log('Delete ID:', id);
    
    var formData = new FormData();
    formData.append('action', 'delete');
    formData.append('id', id);
    
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        console.log('Response received:', response.status);
        return response.text();
    })
    .then(function(text) {
        console.log('Response text:', text);
        try {
            var result = JSON.parse(text);
            if (result.success) {
                console.log('Delete successful, reloading...');
                window.location.reload();
            } else {
                alert('Error: ' + (result.message || 'Failed to delete'));
            }
        } catch (e) {
            console.error('JSON parse error:', e);
            alert('Server error. Check console for details.');
        }
    })
    .catch(function(error) {
        console.error('Delete error:', error);
        alert('Network error: ' + error.message);
    });
}

// Handle the actual delete when confirm button is clicked
document.addEventListener('DOMContentLoaded', function() {
    console.log('=== SETTING UP DELETE HANDLER ===');
    var confirmBtn = document.getElementById('confirmDeleteBtn');
    console.log('Confirm button found:', confirmBtn !== null);
    
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            console.log('=== DELETE PROCESS STARTED ===');
            console.log('Confirm delete clicked, ID:', deleteId);
            console.log('Button element:', this);
            
            if (!deleteId) {
                console.error('No deleteId set!');
                alert('No category selected');
                return;
            }
            
            // Disable button
            this.disabled = true;
            this.textContent = 'Deleting...';
            console.log('Button disabled, text changed');
            
            // Create form data
            var formData = new FormData();
            formData.append('action', 'delete');
            formData.append('id', deleteId);
            
            console.log('=== FORM DATA CREATED ===');
            console.log('Action:', formData.get('action'));
            console.log('ID:', formData.get('id'));
            console.log('Request URL:', window.location.href);
            
            // Send the request
            console.log('=== SENDING FETCH REQUEST ===');
            fetch(window.location.href, {
                method: 'POST',
                body: formData
            })
            .then(function(response) {
                console.log('=== RESPONSE RECEIVED ===');
                console.log('Response status:', response.status);
                console.log('Response ok:', response.ok);
                console.log('Response statusText:', response.statusText);
                return response.text();
            })
            .then(function(text) {
                console.log('=== RESPONSE TEXT RECEIVED ===');
                console.log('Raw response text:', text);
                console.log('Response length:', text.length);
                console.log('Response type:', typeof text);
                
                // Check if response is empty
                if (!text || text.trim() === '') {
                    console.error('Empty response received');
                    alert('Server returned empty response');
                    confirmBtn.disabled = false;
                    confirmBtn.textContent = 'Delete';
                    return;
                }
                
                try {
                    console.log('=== PARSING JSON ===');
                    var result = JSON.parse(text);
                    console.log('Parsed result:', result);
                    console.log('Success property:', result.success);
                    console.log('Message property:', result.message);
                    
                    if (result.success) {
                        console.log('=== DELETE SUCCESSFUL ===');
                        console.log('Reloading page...');
                        window.location.reload();
                    } else {
                        console.error('=== DELETE FAILED ===');
                        console.error('Error message:', result.message);
                        alert('Error: ' + (result.message || 'Failed to delete'));
                        // Re-enable button
                        confirmBtn.disabled = false;
                        confirmBtn.textContent = 'Delete';
                    }
                } catch (e) {
                    console.error('=== JSON PARSE ERROR ===');
                    console.error('Parse error:', e);
                    console.error('Raw response was:', text);
                    alert('Server error. Check console for details.');
                    // Re-enable button
                    confirmBtn.disabled = false;
                    confirmBtn.textContent = 'Delete';
                }
            })
            .catch(function(error) {
                console.error('=== NETWORK ERROR ===');
                console.error('Fetch error:', error);
                console.error('Error name:', error.name);
                console.error('Error message:', error.message);
                alert('Network error: ' + error.message);
                // Re-enable button
                confirmBtn.disabled = false;
                confirmBtn.textContent = 'Delete';
            });
        });
    } else {
        console.error('=== ERROR: confirmDeleteBtn not found! ===');
    }
});

// Edit category function
function editCategory(category) {
    console.log('Edit category:', category);
    
    // Fill the form
    var fields = {
        'editCategoryId': category.id,
        'editCategoryName': category.name,
        'editCategoryDescription': category.description || '',
        'editCategoryIcon': category.icon || ''
    };
    
    for (var fieldId in fields) {
        var element = document.getElementById(fieldId);
        if (element) {
            element.value = fields[fieldId];
        }
    }
    
    // Show modal
    var modalElement = document.getElementById('editCategoryModal');
    if (modalElement && typeof bootstrap !== 'undefined') {
        var editModal = new bootstrap.Modal(modalElement);
        editModal.show();
    }
}

// Toggle status function
function toggleStatus(id, currentStatus) {
    console.log('Toggle status for ID:', id);
    
    var formData = new FormData();
    formData.append('action', 'toggle_status');
    formData.append('id', id);
    formData.append('current_status', currentStatus);
    
    fetch(window.location.href, {
        method: 'POST',
        body: formData
    })
    .then(function(response) {
        return response.json();
    })
    .then(function(result) {
        if (result.success) {
            window.location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    })
    .catch(function(error) {
        console.error('Toggle error:', error);
        alert('Error: ' + error.message);
    });
}

// Refresh function
function refreshTable() {
    window.location.reload();
}
</script>

<?php include 'includes/admin-footer.php'; ?>