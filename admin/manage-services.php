<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

$admin = new Admin();
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$service = new Service();
$category = new Category($pdo);
$message = '';

// Handle AJAX requests from view-service.php
if (isset($_POST['action'])) {
    header('Content-Type: application/json');
    
    if ($_POST['action'] === 'delete' && isset($_POST['service_id'])) {
        $id = intval($_POST['service_id']);
        if ($service->deleteService($id)) {
            echo json_encode(['success' => true, 'message' => 'Service deleted successfully']);
        } else {
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Error deleting service']);
        }
        exit;
    }
    
    if ($_POST['action'] === 'toggle_status' && isset($_POST['service_id'])) {
        $id = intval($_POST['service_id']);
        // Get current status and toggle it
        $currentService = $service->getServiceByIdAdmin($id);
        if ($currentService) {
            $newStatus = $currentService['is_active'] ? 0 : 1;
            if ($service->setServiceStatus($id, $newStatus)) {
                echo json_encode(['success' => true, 'message' => 'Service status updated', 'new_status' => $newStatus]);
            } else {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Error updating service status']);
            }
        } else {
            http_response_code(404);
            echo json_encode(['success' => false, 'message' => 'Service not found']);
        }
        exit;
    }
}

// Handle delete service
if (isset($_POST['delete_service'])) {
    $id = $_POST['service_id'];
    if ($service->deleteService($id)) {
        $message = '<div class="alert alert-success">Service deleted successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error deleting service.</div>';
    }
}

// Handle activate/deactivate service
if (isset($_POST['toggle_service'])) {
    $id = intval($_POST['service_id']);
    $status = ($_POST['toggle_service'] === 'activate') ? 1 : 0;
    if ($service->setServiceStatus($id, $status)) {
        $message = '<div class="alert alert-success">Service status updated!</div>';
    } else {
        $message = '<div class="alert alert-error">Error updating status.</div>';
    }
}

// Handle add/delete category
if (isset($_POST['add_category'])) {
    $name = trim($_POST['new_category_name']);
    $desc = trim($_POST['new_category_desc']);
    if ($category->createCategory($name, $desc, null)) {
        $message = '<div class="alert alert-success">Category added successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error adding category.</div>';
    }
}
if (isset($_POST['delete_category'])) {
    $id = $_POST['category_id'];
    if ($category->deleteCategory($id)) {
        $message = '<div class="alert alert-success">Category deleted successfully!</div>';
    } else {
        $message = '<div class="alert alert-error">Error deleting category.</div>';
    }
}

// Get all services and categories
$services = $service->getAllServices();
$categories = $category->getAllCategories();
?>

<?php include 'includes/admin-header.php'; ?>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.bootstrap5.min.css">

<!-- Custom Professional Styles -->
<style>
:root {
    --manage-primary: #4f46e5;
    --manage-secondary: #6366f1;
    --manage-success: #10b981;
    --manage-warning: #f59e0b;
    --manage-danger: #ef4444;
    --manage-info: #3b82f6;
    --manage-light: #f8fafc;
    --manage-dark: #1e293b;
    --manage-border: #e2e8f0;
    --manage-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --manage-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
}

.manage-container {
    padding: 2rem 0;
}

/* Page Header */
.page-header {
    background: linear-gradient(135deg, var(--manage-primary) 0%, var(--manage-secondary) 100%);
    color: white;
    padding: 2.5rem 0;
    margin: -2rem -15px 2rem -15px;
    border-radius: 0 0 1.5rem 1.5rem;
    position: relative;
    overflow: hidden;
}

.page-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,0 1000,100 0,100"/></svg>');
    background-size: cover;
}

.page-header .container-fluid {
    position: relative;
    z-index: 1;
}

.page-title {
    font-size: 2.25rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.page-subtitle {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-bottom: 1.5rem;
}

.header-stats {
    display: flex;
    gap: 2rem;
    margin-top: 1rem;
}

.stat-item {
    text-align: center;
}

.stat-number {
    font-size: 1.5rem;
    font-weight: 700;
    display: block;
}

.stat-label {
    font-size: 0.875rem;
    opacity: 0.8;
}

/* Action Bar */
.action-bar {
    background: white;
    border-radius: 1rem;
    padding: 1.5rem;
    margin-bottom: 2rem;
    box-shadow: var(--manage-shadow);
    border: 1px solid var(--manage-border);
}

.search-section {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.search-input {
    flex: 1;
    min-width: 300px;
    padding: 0.75rem 1rem;
    border: 2px solid var(--manage-border);
    border-radius: 0.75rem;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.search-input:focus {
    border-color: var(--manage-primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    outline: none;
}

.filter-select {
    padding: 0.75rem 1rem;
    border: 2px solid var(--manage-border);
    border-radius: 0.75rem;
    background: white;
    font-size: 1rem;
    min-width: 150px;
    transition: all 0.3s ease;
}

.filter-select:focus {
    border-color: var(--manage-primary);
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
    outline: none;
}

/* Professional Buttons */
.btn-professional {
    padding: 0.75rem 1.5rem;
    border-radius: 0.75rem;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    text-decoration: none;
}

.btn-professional:hover {
    transform: translateY(-2px);
    box-shadow: var(--manage-shadow-lg);
    text-decoration: none;
}

.btn-primary-pro {
    background: var(--manage-primary);
    color: white;
}

.btn-success-pro {
    background: var(--manage-success);
    color: white;
}

.btn-warning-pro {
    background: var(--manage-warning);
    color: white;
}

.btn-danger-pro {
    background: var(--manage-danger);
    color: white;
}

.btn-info-pro {
    background: var(--manage-info);
    color: white;
}

.btn-outline-pro {
    background: transparent;
    border: 2px solid var(--manage-primary);
    color: var(--manage-primary);
}

.btn-outline-pro:hover {
    background: var(--manage-primary);
    color: white;
}

/* Data Cards */
.data-card {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--manage-shadow);
    border: 1px solid var(--manage-border);
    overflow: hidden;
    margin-bottom: 2rem;
}

.card-header-pro {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 1.5rem;
    border-bottom: 1px solid var(--manage-border);
}

.card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--manage-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-subtitle {
    color: #64748b;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.card-body-pro {
    padding: 0;
}

/* Professional DataTable Styling */
.table-professional {
    margin: 0;
    font-size: 0.95rem;
}

.table-professional thead th {
    background: #f8fafc;
    border: none;
    font-weight: 600;
    color: var(--manage-dark);
    padding: 1rem;
    text-transform: uppercase;
    font-size: 0.875rem;
    letter-spacing: 0.05em;
}

.table-professional tbody td {
    padding: 1rem;
    border-top: 1px solid var(--manage-border);
    vertical-align: middle;
}

.table-professional tbody tr:hover {
    background: #f8fafc;
}

/* Status Badges */
.status-badge {
    padding: 0.375rem 0.75rem;
    border-radius: 2rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--manage-success);
}

.status-inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--manage-danger);
}

/* Category Tags */
.category-tag {
    background: rgba(79, 70, 229, 0.1);
    color: var(--manage-primary);
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Action Buttons */
.action-buttons {
    display: flex;
    gap: 0.5rem;
    flex-wrap: wrap;
}

.action-btn {
    padding: 0.5rem 0.75rem;
    border-radius: 0.5rem;
    font-size: 0.875rem;
    font-weight: 500;
    transition: all 0.2s ease;
    border: none;
    cursor: pointer;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
}

.action-btn:hover {
    transform: translateY(-1px);
    text-decoration: none;
}

.action-edit {
    background: rgba(59, 130, 246, 0.1);
    color: var(--manage-info);
}

.action-edit:hover {
    background: var(--manage-info);
    color: white;
}

.action-view {
    background: rgba(100, 116, 139, 0.1);
    color: #64748b;
}

.action-view:hover {
    background: #64748b;
    color: white;
}

.action-toggle {
    background: rgba(245, 158, 11, 0.1);
    color: var(--manage-warning);
}

.action-toggle:hover {
    background: var(--manage-warning);
    color: white;
}

.action-delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--manage-danger);
}

.action-delete:hover {
    background: var(--manage-danger);
    color: white;
}

/* Modal Styling */
.modal-content {
    border-radius: 1rem;
    border: none;
    box-shadow: var(--manage-shadow-lg);
}

.modal-header {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    border-bottom: 1px solid var(--manage-border);
    border-radius: 1rem 1rem 0 0;
}

.modal-title {
    font-weight: 600;
    color: var(--manage-dark);
}

/* Loading States */
.loading-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(255, 255, 255, 0.8);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    border-radius: 1rem;
}

.spinner {
    width: 2rem;
    height: 2rem;
    border: 3px solid #e2e8f0;
    border-top: 3px solid var(--manage-primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .page-header {
        margin: -1rem -15px 1.5rem -15px;
        padding: 2rem 0;
    }

    .page-title {
        font-size: 1.875rem;
    }

    .header-stats {
        gap: 1rem;
    }

    .search-section {
        flex-direction: column;
        align-items: stretch;
    }

    .search-input {
        min-width: auto;
    }

    .action-buttons {
        justify-content: center;
    }

    .manage-container {
        padding: 1rem 0;
    }
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 3rem 2rem;
    color: #64748b;
}

.empty-state i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state h3 {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 0.5rem;
    color: var(--manage-dark);
}

.empty-state p {
    margin-bottom: 1.5rem;
}
</style>

<div class="manage-container">
    <!-- Professional Page Header -->
    <div class="page-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="page-title">
                        <i class="fas fa-cogs me-3"></i>
                        Manage Services
                    </h1>
                    <p class="page-subtitle">
                        Efficiently manage your automation services with advanced tools and filters
                    </p>
                    <div class="header-stats d-none d-md-flex">
                        <div class="stat-item">
                            <span class="stat-number"><?php echo count($services); ?></span>
                            <span class="stat-label">Total Services</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo count(array_filter($services, function($s) { return $s['is_active']; })); ?></span>
                            <span class="stat-label">Active Services</span>
                        </div>
                        <div class="stat-item">
                            <span class="stat-number"><?php echo count($categories); ?></span>
                            <span class="stat-label">Categories</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 text-end">
                    <a href="add-service.php" class="btn-professional btn-success-pro">
                        <i class="fas fa-plus"></i>
                        Add New Service
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <!-- Action Bar with Search and Filters -->
        <div class="action-bar">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="search-section">
                        <div class="position-relative flex-grow-1">
                            <i class="fas fa-search position-absolute" style="left: 1rem; top: 50%; transform: translateY(-50%); color: #64748b;"></i>
                            <input type="text" 
                                   class="search-input" 
                                   id="serviceSearch" 
                                   placeholder="Search services by title, description, or category..."
                                   style="padding-left: 3rem;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="d-flex gap-3 justify-content-lg-end">
                        <select class="filter-select" id="categoryFilter">
                            <option value="">All Categories</option>
                            <?php foreach ($categories as $cat): ?>
                                <option value="<?php echo htmlspecialchars($cat['name']); ?>">
                                    <?php echo htmlspecialchars($cat['name']); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        
                        <select class="filter-select" id="statusFilter">
                            <option value="">All Status</option>
                            <option value="active">Active Only</option>
                            <option value="inactive">Inactive Only</option>
                        </select>

                        <button class="btn-professional btn-outline-pro" onclick="toggleCategoryManagement()">
                            <i class="fas fa-tags"></i>
                            Categories
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        <?php if ($message): ?>
            <div class="alert alert-dismissible fade show" role="alert" style="border-radius: 0.75rem; border: none; box-shadow: var(--manage-shadow);">
                <?php echo $message; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Category Management Modal -->
        <div class="data-card" id="categoryManagement" style="display: none;">
            <div class="card-header-pro">
                <h2 class="card-title">
                    <i class="fas fa-tags text-primary"></i>
                    Category Management
                </h2>
                <p class="card-subtitle">Add, edit, and organize your service categories</p>
            </div>
            <div class="card-body-pro">
                <!-- Add New Category Form -->
                <div class="p-4 bg-light">
                    <form method="POST" class="row g-3" id="addCategoryForm">
                        <div class="col-md-4">
                            <input type="text" 
                                   name="new_category_name" 
                                   class="form-control" 
                                   placeholder="Category name" 
                                   required
                                   style="border-radius: 0.5rem; border: 2px solid var(--manage-border);">
                        </div>
                        <div class="col-md-6">
                            <input type="text" 
                                   name="new_category_desc" 
                                   class="form-control" 
                                   placeholder="Category description"
                                   style="border-radius: 0.5rem; border: 2px solid var(--manage-border);">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="add_category" class="btn-professional btn-success-pro w-100">
                                <i class="fas fa-plus"></i>
                                Add
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Categories Table -->
                <?php if (!empty($categories)): ?>
                    <div class="table-responsive">
                        <table class="table table-professional">
                            <thead>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Services Count</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $cat): ?>
                                    <?php $serviceCount = count(array_filter($services, function($s) use ($cat) { return $s['category_id'] == $cat['id']; })); ?>
                                    <tr>
                                        <td>
                                            <div class="fw-bold"><?php echo htmlspecialchars($cat['name']); ?></div>
                                        </td>
                                        <td>
                                            <span class="text-muted"><?php echo htmlspecialchars($cat['description'] ?: 'No description'); ?></span>
                                        </td>
                                        <td>
                                            <span class="category-tag"><?php echo $serviceCount; ?> services</span>
                                        </td>
                                        <td>
                                            <form method="POST" 
                                                  onsubmit="return confirm('Delete this category? Services in this category will become uncategorized.')" 
                                                  style="display: inline;">
                                                <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                                                <button type="submit" name="delete_category" class="action-btn action-delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-tags"></i>
                        <h3>No Categories Yet</h3>
                        <p>Create your first category to organize your services</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Main Services Table -->
        <div class="data-card">
            <div class="card-header-pro">
                <h2 class="card-title">
                    <i class="fas fa-list text-primary"></i>
                    Services Directory
                    <span class="badge bg-primary rounded-pill ms-2"><?php echo count($services); ?></span>
                </h2>
                <p class="card-subtitle">Complete list of all your automation services</p>
            </div>
            <div class="card-body-pro">
                <?php if (!empty($services)): ?>
                    <div class="table-responsive">
                        <table class="table table-professional" id="servicesTable">
                            <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="selectAll" class="form-check-input">
                                    </th>
                                    <th>Service Details</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($services as $svc): ?>
                                    <tr data-service-id="<?php echo $svc['id']; ?>">
                                        <td>
                                            <input type="checkbox" class="form-check-input service-checkbox" value="<?php echo $svc['id']; ?>">
                                        </td>
                                        <td>
                                            <div class="service-details">
                                                <h6 class="mb-1 fw-bold"><?php echo htmlspecialchars($svc['title']); ?></h6>
                                                <p class="mb-0 text-muted small">
                                                    <?php echo substr(htmlspecialchars($svc['description']), 0, 120) . (strlen($svc['description']) > 120 ? '...' : ''); ?>
                                                </p>
                                                <?php if (!empty($svc['image_path'])): ?>
                                                    <small class="text-info">
                                                        <i class="fas fa-image me-1"></i>Has Image
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </td>
                                        <td>
                                            <?php if (!empty($svc['category_name'])): ?>
                                                <span class="category-tag"><?php echo htmlspecialchars($svc['category_name']); ?></span>
                                            <?php else: ?>
                                                <span class="text-muted small">Uncategorized</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="status-badge <?php echo $svc['is_active'] ? 'status-active' : 'status-inactive'; ?>">
                                                <i class="fas fa-<?php echo $svc['is_active'] ? 'check-circle' : 'times-circle'; ?> me-1"></i>
                                                <?php echo $svc['is_active'] ? 'Active' : 'Inactive'; ?>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="text-muted small">
                                                <?php echo date('M j, Y', strtotime($svc['created_at'])); ?>
                                                <br>
                                                <span class="text-xs"><?php echo date('g:i A', strtotime($svc['created_at'])); ?></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="action-buttons">
                                                <a href="view-service.php?id=<?php echo $svc['id']; ?>" 
                                                   class="action-btn action-view" 
                                                   title="View Details">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                
                                                <a href="edit-service.php?id=<?php echo $svc['id']; ?>" 
                                                   class="action-btn action-edit" 
                                                   title="Edit Service">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                
                                                <button onclick="toggleServiceStatus(<?php echo $svc['id']; ?>, <?php echo $svc['is_active'] ? 'false' : 'true'; ?>)" 
                                                        class="action-btn action-toggle" 
                                                        title="<?php echo $svc['is_active'] ? 'Deactivate' : 'Activate'; ?> Service">
                                                    <i class="fas fa-<?php echo $svc['is_active'] ? 'toggle-off' : 'toggle-on'; ?>"></i>
                                                </button>
                                                
                                                <button onclick="deleteService(<?php echo $svc['id']; ?>, '<?php echo htmlspecialchars($svc['title'], ENT_QUOTES); ?>')" 
                                                        class="action-btn action-delete" 
                                                        title="Delete Service">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Bulk Actions Bar -->
                    <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                        <div class="bulk-actions" id="bulkActions" style="display: none;">
                            <span class="text-muted me-3" id="selectedCount">0 selected</span>
                            <button class="btn-professional btn-warning-pro me-2" onclick="bulkToggleStatus()">
                                <i class="fas fa-toggle-on"></i>
                                Toggle Status
                            </button>
                            <button class="btn-professional btn-danger-pro" onclick="bulkDelete()">
                                <i class="fas fa-trash-alt"></i>
                                Delete Selected
                            </button>
                        </div>
                        
                        <div class="table-info">
                            <span class="text-muted">
                                Showing <?php echo count($services); ?> of <?php echo count($services); ?> services
                            </span>
                        </div>
                    </div>

                <?php else: ?>
                    <div class="empty-state">
                        <i class="fas fa-cogs"></i>
                        <h3>No Services Found</h3>
                        <p>Start building your automation business by adding your first service</p>
                        <a href="add-service.php" class="btn-professional btn-primary-pro">
                            <i class="fas fa-plus me-2"></i>
                            Add Your First Service
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!-- DataTables and Professional JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>

<!-- Professional Management JavaScript -->
<script>
$(document).ready(function() {
    // Initialize DataTable with professional features
    const servicesTable = $('#servicesTable').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        order: [[4, 'desc']], // Sort by created date
        columnDefs: [
            { orderable: false, targets: [0, 5] }, // Disable sorting for checkbox and actions
            { searchable: false, targets: [0, 5] }
        ],
        language: {
            search: "Search:",
            lengthMenu: "Show _MENU_ entries",
            info: "Showing _START_ to _END_ of _TOTAL_ services",
            infoEmpty: "No services available",
            infoFiltered: "(filtered from _MAX_ total services)",
            paginate: {
                first: "First",
                last: "Last",
                next: "Next",
                previous: "Previous"
            }
        },
        dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>rtip'
    });

    // Custom search functionality
    $('#serviceSearch').on('keyup', function() {
        servicesTable.search(this.value).draw();
    });

    // Category filter
    $('#categoryFilter').on('change', function() {
        const selectedCategory = this.value;
        if (selectedCategory === '') {
            servicesTable.column(2).search('').draw();
        } else {
            servicesTable.column(2).search(selectedCategory).draw();
        }
    });

    // Status filter
    $('#statusFilter').on('change', function() {
        const selectedStatus = this.value;
        if (selectedStatus === '') {
            servicesTable.column(3).search('').draw();
        } else if (selectedStatus === 'active') {
            servicesTable.column(3).search('Active').draw();
        } else if (selectedStatus === 'inactive') {
            servicesTable.column(3).search('Inactive').draw();
        }
    });

    // Select all checkbox functionality
    $('#selectAll').on('change', function() {
        const isChecked = this.checked;
        $('.service-checkbox').prop('checked', isChecked);
        updateBulkActions();
    });

    // Individual checkbox functionality
    $(document).on('change', '.service-checkbox', function() {
        updateBulkActions();
        
        // Update select all checkbox
        const totalCheckboxes = $('.service-checkbox').length;
        const checkedCheckboxes = $('.service-checkbox:checked').length;
        $('#selectAll').prop('checked', totalCheckboxes === checkedCheckboxes);
    });

    // Update bulk actions visibility
    function updateBulkActions() {
        const checkedBoxes = $('.service-checkbox:checked');
        const bulkActions = $('#bulkActions');
        const selectedCount = $('#selectedCount');
        
        if (checkedBoxes.length > 0) {
            bulkActions.show();
            selectedCount.text(checkedBoxes.length + ' selected');
        } else {
            bulkActions.hide();
        }
    }
});

// Toggle category management panel
function toggleCategoryManagement() {
    const panel = $('#categoryManagement');
    if (panel.is(':visible')) {
        panel.slideUp(300);
    } else {
        panel.slideDown(300);
    }
}

// Toggle service status with AJAX
function toggleServiceStatus(serviceId, newStatus) {
    const statusText = newStatus ? 'activate' : 'deactivate';
    
    if (!confirm(`Are you sure you want to ${statusText} this service?`)) {
        return;
    }

    // Show loading state
    const row = $(`tr[data-service-id="${serviceId}"]`);
    const originalContent = row.html();
    
    // Add loading overlay
    row.css('position', 'relative');
    row.append('<div class="loading-overlay"><div class="spinner"></div></div>');

    $.ajax({
        url: window.location.href,
        method: 'POST',
        data: {
            action: 'toggle_status',
            service_id: serviceId
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Reload page to reflect changes
                window.location.reload();
            } else {
                alert('Error: ' + response.message);
                row.find('.loading-overlay').remove();
            }
        },
        error: function() {
            alert('Error updating service status. Please try again.');
            row.find('.loading-overlay').remove();
        }
    });
}

// Delete service with confirmation
function deleteService(serviceId, serviceName) {
    // Professional confirmation modal
    const confirmed = confirm(
        `⚠️ DELETE SERVICE\n\n` +
        `Are you sure you want to permanently delete "${serviceName}"?\n\n` +
        `This action cannot be undone and will:\n` +
        `• Remove the service from your website\n` +
        `• Delete all associated data\n` +
        `• Remove any uploaded images\n\n` +
        `Type "DELETE" to confirm this action.`
    );
    
    if (!confirmed) return;
    
    const confirmText = prompt('Please type "DELETE" to confirm:');
    if (confirmText !== 'DELETE') {
        alert('Deletion cancelled. You must type "DELETE" exactly.');
        return;
    }

    // Show loading state
    const row = $(`tr[data-service-id="${serviceId}"]`);
    row.css('position', 'relative');
    row.append('<div class="loading-overlay"><div class="spinner"></div></div>');

    $.ajax({
        url: window.location.href,
        method: 'POST',
        data: {
            action: 'delete',
            service_id: serviceId
        },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                // Animate row removal
                row.fadeOut(300, function() {
                    $(this).remove();
                    // Update table info
                    $('#servicesTable').DataTable().row(row).remove().draw();
                });
                
                // Show success message
                showSuccessMessage('Service deleted successfully!');
            } else {
                alert('Error: ' + response.message);
                row.find('.loading-overlay').remove();
            }
        },
        error: function() {
            alert('Error deleting service. Please try again.');
            row.find('.loading-overlay').remove();
        }
    });
}

// Bulk toggle status
function bulkToggleStatus() {
    const selectedServices = $('.service-checkbox:checked');
    if (selectedServices.length === 0) return;
    
    if (!confirm(`Toggle status for ${selectedServices.length} selected services?`)) {
        return;
    }
    
    selectedServices.each(function() {
        const serviceId = $(this).val();
        const row = $(this).closest('tr');
        const isActive = row.find('.status-active').length > 0;
        toggleServiceStatus(serviceId, !isActive);
    });
}

// Bulk delete
function bulkDelete() {
    const selectedServices = $('.service-checkbox:checked');
    if (selectedServices.length === 0) return;
    
    const confirmText = prompt(
        `⚠️ BULK DELETE WARNING\n\n` +
        `You are about to permanently delete ${selectedServices.length} services.\n` +
        `This action cannot be undone.\n\n` +
        `Type "DELETE ALL" to confirm:`
    );
    
    if (confirmText !== 'DELETE ALL') {
        alert('Bulk deletion cancelled.');
        return;
    }
    
    selectedServices.each(function() {
        const serviceId = $(this).val();
        const serviceName = $(this).closest('tr').find('.service-details h6').text();
        deleteService(serviceId, serviceName);
    });
}

// Show success message
function showSuccessMessage(message) {
    const alertDiv = $(`
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 0.75rem; border: none; box-shadow: var(--manage-shadow); margin-bottom: 1rem;">
            <i class="fas fa-check-circle me-2"></i>${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `);
    
    $('.manage-container .container-fluid').prepend(alertDiv);
    
    // Auto dismiss after 5 seconds
    setTimeout(() => {
        alertDiv.alert('close');
    }, 5000);
}

// Enhanced form validation
document.getElementById('addCategoryForm')?.addEventListener('submit', function(e) {
    const nameInput = this.querySelector('input[name="new_category_name"]');
    const name = nameInput.value.trim();
    
    if (name.length < 2) {
        e.preventDefault();
        alert('Category name must be at least 2 characters long.');
        nameInput.focus();
        return;
    }
    
    if (name.length > 50) {
        e.preventDefault();
        alert('Category name must be less than 50 characters.');
        nameInput.focus();
        return;
    }
    
    // Check for duplicate names
    const existingCategories = Array.from(document.querySelectorAll('.category-tag')).map(el => el.textContent.toLowerCase());
    if (existingCategories.some(cat => cat.includes(name.toLowerCase()))) {
        e.preventDefault();
        if (!confirm('A similar category name already exists. Continue anyway?')) {
            nameInput.focus();
            return;
        }
    }
});

// Auto-hide alerts
setTimeout(() => {
    $('.alert').each(function() {
        if (!$(this).hasClass('alert-permanent')) {
            $(this).fadeOut(500);
        }
    });
}, 7000);

// Keyboard shortcuts
document.addEventListener('keydown', function(e) {
    // Ctrl+N or Cmd+N = Add new service
    if ((e.ctrlKey || e.metaKey) && e.key === 'n') {
        e.preventDefault();
        window.location.href = 'add-service.php';
    }
    
    // Ctrl+F or Cmd+F = Focus search
    if ((e.ctrlKey || e.metaKey) && e.key === 'f') {
        e.preventDefault();
        document.getElementById('serviceSearch').focus();
    }
    
    // Escape = Clear search
    if (e.key === 'Escape') {
        document.getElementById('serviceSearch').value = '';
        $('#servicesTable').DataTable().search('').draw();
    }
});

// Smooth scrolling for internal links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});
</script>

<?php include 'includes/admin-footer.php'; ?>
