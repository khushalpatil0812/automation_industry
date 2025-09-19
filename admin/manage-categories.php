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

<div class="container-fluid py-4">
    <!-- Page Header -->
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h1 class="h3 mb-0 text-gray-800">
                        <i class="fas fa-tags text-primary me-2"></i>Manage Categories
                    </h1>
                    <p class="text-muted mb-0">Organize and manage your service categories</p>
                </div>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus me-1"></i>Add Category
                </button>
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
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($categories); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Active Categories</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_reduce($categories, function($count, $cat) { return ($cat['is_active'] ?? 1) ? $count + 1 : $count; }, 0); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">With Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_reduce($categories, function($count, $cat) { return ($cat['service_count'] ?? 0) > 0 ? $count + 1 : $count; }, 0); ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Services</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo array_sum(array_column($categories, 'service_count')); ?>
                            </div>
                        </div>
                        <div class="col-auto">
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Icon</th>
                                        <th>Services</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $cat): ?>
                                        <tr>
                                            <td><?php echo $cat['id']; ?></td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <?php if (!empty($cat['icon'])): ?>
                                                        <i class="fas fa-<?php echo htmlspecialchars($cat['icon']); ?> text-primary me-2"></i>
                                                    <?php endif; ?>
                                                    <strong><?php echo htmlspecialchars($cat['name']); ?></strong>
                                                </div>
                                            </td>
                                            <td>
                                                <?php 
                                                $desc = $cat['description'] ?? '';
                                                echo !empty($desc) ? htmlspecialchars(substr($desc, 0, 50)) . (strlen($desc) > 50 ? '...' : '') : '<em class="text-muted">No description</em>'; 
                                                ?>
                                            </td>
                                            <td>
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
                                            <td>
                                                <?php if (($cat['is_active'] ?? 1)): ?>
                                                    <span class="badge bg-success">Active</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group">
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
                                                    <button type="button" class="btn btn-sm btn-outline-danger" 
                                                            onclick="confirmDelete(<?php echo $cat['id']; ?>, '<?php echo addslashes($cat['name']); ?>')"
                                                            data-bs-toggle="tooltip" title="Delete">
                                                        <i class="fas fa-trash"></i>
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

<script>
$(document).ready(function() {
    // Initialize DataTable
    $('#categoriesTable').DataTable({
        responsive: true,
        pageLength: 10,
        order: [[0, 'asc']],
        columnDefs: [
            { orderable: false, targets: [6] }
        ]
    });
    
    // Initialize tooltips
    $('[data-bs-toggle="tooltip"]').tooltip();
});

// Edit category function
function editCategory(category) {
    $('#editCategoryId').val(category.id);
    $('#editCategoryName').val(category.name);
    $('#editCategoryDescription').val(category.description || '');
    $('#editCategoryIcon').val(category.icon || '');
    $('#editCategoryModal').modal('show');
}

// Toggle status function
async function toggleStatus(id, currentStatus) {
    try {
        const formData = new FormData();
        formData.append('action', 'toggle_status');
        formData.append('id', id);
        formData.append('current_status', currentStatus);
        
        const response = await fetch(window.location.href, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
}

// Confirm delete function
let deleteId = null;
function confirmDelete(id, name) {
    deleteId = id;
    $('#deleteMessage').text(`Category: "${name}"`);
    $('#deleteModal').modal('show');
}

// Handle delete confirmation
$('#confirmDeleteBtn').click(async function() {
    if (!deleteId) return;
    
    try {
        const formData = new FormData();
        formData.append('action', 'delete');
        formData.append('id', deleteId);
        
        const response = await fetch(window.location.href, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            $('#deleteModal').modal('hide');
            location.reload();
        } else {
            alert('Error: ' + result.message);
        }
    } catch (error) {
        alert('An error occurred: ' + error.message);
    }
});

// Refresh table function
function refreshTable() {
    location.reload();
}
</script>

<?php include 'includes/admin-footer.php'; ?>