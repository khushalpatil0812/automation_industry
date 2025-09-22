<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';
require_once '../classes/Category.php';

$admin = new Admin();
$service = new Service();
$category = new Category($pdo);

// Check if logged in
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

// Get service ID from URL
$service_id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!$service_id) {
    header('Location: manage-services.php?error=invalid_id');
    exit;
}

// Get service details with enhanced error handling
try {
    $service_data = $service->getServiceByIdAdmin($service_id);
    if (!$service_data) {
        header('Location: manage-services.php?error=service_not_found');
        exit;
    }
} catch (Exception $e) {
    error_log("Error fetching service: " . $e->getMessage());
    header('Location: manage-services.php?error=database_error');
    exit;
}

// Get category information
$category_name = $service_data['category_name'] ?? 'Uncategorized';
$category_id = $service_data['category_id'] ?? null;

// Set page title
$page_title = "View Service - " . htmlspecialchars($service_data['title']);
include 'includes/admin-header.php';
?>

<!-- Professional CSS Styling -->
<style>
:root {
    --view-primary: #4f46e5;
    --view-secondary: #6366f1;
    --view-success: #10b981;
    --view-warning: #f59e0b;
    --view-danger: #ef4444;
    --view-info: #3b82f6;
    --view-light: #f8fafc;
    --view-dark: #1e293b;
    --view-border: #e2e8f0;
    --view-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --view-shadow-lg: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    --view-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.view-container {
    padding: 2rem 0;
    min-height: calc(100vh - 200px);
}

/* Professional Header */
.service-header {
    background: var(--view-gradient);
    color: white;
    padding: 2.5rem 0;
    margin: -2rem -15px 2rem -15px;
    border-radius: 0 0 1.5rem 1.5rem;
    position: relative;
    overflow: hidden;
}

.service-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="white" opacity="0.1"><polygon points="1000,0 1000,100 0,100"/></svg>');
    background-size: cover;
}

.service-header .container-fluid {
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

/* Service Title and Meta */
.service-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
    line-height: 1.2;
}

.service-meta {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
}

.meta-badge {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    font-size: 0.875rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(10px);
}

.status-active {
    background: rgba(16, 185, 129, 0.2);
    color: #10b981;
}

.status-inactive {
    background: rgba(239, 68, 68, 0.2);
    color: #ef4444;
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
}

.action-btn-header:hover {
    background: rgba(255, 255, 255, 0.3);
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

/* Main Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 2rem;
    margin-bottom: 2rem;
}

/* Professional Cards */
.info-card {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--view-shadow);
    border: 1px solid var(--view-border);
    overflow: hidden;
    margin-bottom: 2rem;
    transition: all 0.3s ease;
}

.info-card:hover {
    transform: translateY(-2px);
    box-shadow: var(--view-shadow-lg);
}

.card-header-pro {
    background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
    padding: 1.5rem;
    border-bottom: 1px solid var(--view-border);
}

.card-title-pro {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--view-dark);
    margin: 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.card-title-pro i {
    color: var(--view-primary);
}

.card-body-pro {
    padding: 2rem;
}

/* Service Image Display */
.image-container {
    position: relative;
    border-radius: 0.75rem;
    overflow: hidden;
    background: var(--view-light);
    min-height: 300px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.service-image {
    width: 100%;
    height: auto;
    max-height: 400px;
    object-fit: cover;
    border-radius: 0.75rem;
}

.no-image-placeholder {
    text-align: center;
    color: #64748b;
    padding: 3rem;
}

.no-image-placeholder i {
    font-size: 4rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

/* Description Styling */
.description-content {
    font-size: 1.1rem;
    line-height: 1.7;
    color: #374151;
}

.description-content p {
    margin-bottom: 1rem;
}

/* Features Grid */
.features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1rem;
}

.feature-item {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    border-left: 3px solid var(--view-success);
    transition: all 0.3s ease;
}

.feature-item:hover {
    background: #f1f5f9;
    transform: translateX(5px);
}

.feature-item i {
    color: var(--view-success);
    font-size: 1.1rem;
    margin-top: 0.125rem;
}

.feature-text {
    font-weight: 500;
    color: var(--view-dark);
}

/* Information Grid */
.info-grid {
    display: grid;
    gap: 1.5rem;
}

.info-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background: #f8fafc;
    border-radius: 0.5rem;
    border: 1px solid #e2e8f0;
}

.info-label {
    font-weight: 600;
    color: #64748b;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.info-value {
    font-weight: 500;
    color: var(--view-dark);
}

.status-indicator {
    padding: 0.375rem 0.75rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.status-indicator.active {
    background: rgba(16, 185, 129, 0.1);
    color: var(--view-success);
}

.status-indicator.inactive {
    background: rgba(239, 68, 68, 0.1);
    color: var(--view-danger);
}

/* Action Buttons */
.actions-grid {
    display: grid;
    gap: 1rem;
}

.action-button {
    padding: 1rem;
    border-radius: 0.75rem;
    text-decoration: none;
    font-weight: 600;
    text-align: center;
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    font-size: 0.95rem;
}

.action-edit {
    background: rgba(59, 130, 246, 0.1);
    color: var(--view-info);
    border: 2px solid rgba(59, 130, 246, 0.2);
}

.action-edit:hover {
    background: var(--view-info);
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.action-preview {
    background: rgba(16, 185, 129, 0.1);
    color: var(--view-success);
    border: 2px solid rgba(16, 185, 129, 0.2);
}

.action-preview:hover {
    background: var(--view-success);
    color: white;
    transform: translateY(-2px);
    text-decoration: none;
}

.action-toggle {
    background: rgba(245, 158, 11, 0.1);
    color: var(--view-warning);
    border: 2px solid rgba(245, 158, 11, 0.2);
}

.action-toggle:hover {
    background: var(--view-warning);
    color: white;
    transform: translateY(-2px);
}

.action-delete {
    background: rgba(239, 68, 68, 0.1);
    color: var(--view-danger);
    border: 2px solid rgba(239, 68, 68, 0.2);
}

.action-delete:hover {
    background: var(--view-danger);
    color: white;
    transform: translateY(-2px);
}

/* Loading States */
.action-button.loading {
    opacity: 0.7;
    pointer-events: none;
}

.action-button.loading i {
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

/* Professional Modal */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.75);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
}

.modal-overlay.active {
    opacity: 1;
    visibility: visible;
}

.modal-content {
    background: white;
    border-radius: 1rem;
    box-shadow: var(--view-shadow-lg);
    max-width: 500px;
    width: 90%;
    max-height: 90vh;
    overflow-y: auto;
    transform: scale(0.9);
    transition: transform 0.3s ease;
}

.modal-overlay.active .modal-content {
    transform: scale(1);
}

.modal-header {
    padding: 2rem 2rem 1rem;
    text-align: center;
}

.modal-header h3 {
    color: var(--view-danger);
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
}

.modal-header i {
    font-size: 2rem;
}

.modal-body {
    padding: 0 2rem 2rem;
    text-align: center;
    color: #64748b;
    font-size: 1.1rem;
    line-height: 1.6;
}

.modal-actions {
    padding: 1rem 2rem 2rem;
    display: flex;
    gap: 1rem;
    justify-content: center;
}

.modal-btn {
    padding: 0.75rem 2rem;
    border-radius: 0.75rem;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.modal-btn-danger {
    background: var(--view-danger);
    color: white;
}

.modal-btn-danger:hover {
    background: #dc2626;
    transform: translateY(-2px);
}

.modal-btn-cancel {
    background: #6b7280;
    color: white;
}

.modal-btn-cancel:hover {
    background: #4b5563;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
    
    .features-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .service-header {
        margin: -1rem -15px 1.5rem -15px;
        padding: 2rem 0;
    }
    
    .service-title {
        font-size: 2rem;
    }
    
    .service-meta {
        gap: 0.5rem;
    }
    
    .header-actions {
        gap: 0.5rem;
    }
    
    .action-btn-header {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }
    
    .card-body-pro {
        padding: 1.5rem;
    }
    
    .modal-content {
        margin: 1rem;
    }
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 2rem;
    color: #64748b;
}

.empty-state i {
    font-size: 3rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}
</style>

<div class="view-container">
    <!-- Professional Service Header -->
    <div class="service-header">
        <div class="container-fluid">
            <!-- Breadcrumb Navigation -->
            <div class="breadcrumb-nav">
                <a href="dashboard.php">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
                <i class="fas fa-chevron-right breadcrumb-separator"></i>
                <a href="manage-services.php">
                    <i class="fas fa-cogs"></i>
                    Services
                </a>
                <i class="fas fa-chevron-right breadcrumb-separator"></i>
                <span>View Service</span>
            </div>

            <!-- Service Title and Meta Information -->
            <h1 class="service-title"><?php echo htmlspecialchars($service_data['title']); ?></h1>
            
            <div class="service-meta">
                <div class="meta-badge">
                    <i class="fas fa-tag"></i>
                    ID: #<?php echo $service_id; ?>
                </div>
                
                <div class="meta-badge">
                    <i class="fas fa-folder"></i>
                    <?php echo htmlspecialchars($category_name); ?>
                </div>
                
                <div class="meta-badge <?php echo $service_data['is_active'] ? 'status-active' : 'status-inactive'; ?>">
                    <i class="fas fa-<?php echo $service_data['is_active'] ? 'check-circle' : 'times-circle'; ?>"></i>
                    <?php echo $service_data['is_active'] ? 'Active' : 'Inactive'; ?>
                </div>
                
                <div class="meta-badge">
                    <i class="fas fa-calendar"></i>
                    <?php echo date('M j, Y', strtotime($service_data['created_at'])); ?>
                </div>
            </div>

            <!-- Header Action Buttons -->
            <div class="header-actions">
                <a href="dashboard.php" class="action-btn-header" style="background-color: #6f42c1; border-color: #6f42c1; color: white;">
                    <i class="fas fa-arrow-left"></i>
                    Back to Dashboard
                </a>
                
                <a href="edit-service.php?id=<?php echo $service_id; ?>" class="action-btn-header">
                    <i class="fas fa-edit"></i>
                    Edit Service
                </a>
                
                <a href="../service-detail.php?id=<?php echo $service_id; ?>" 
                   class="action-btn-header" 
                   target="_blank">
                    <i class="fas fa-external-link-alt"></i>
                    Preview Live
                </a>
                
                <a href="add-service.php" class="action-btn-header">
                    <i class="fas fa-plus"></i>
                    New Service
                </a>
                
                <a href="manage-services.php" class="action-btn-header">
                    <i class="fas fa-list"></i>
                    All Services
                </a>
            </div>
        </div>
    </div>

    <!-- Main Content Grid -->
    <div class="content-grid">
        <!-- Primary Content -->
        <div class="primary-content">
            <!-- Service Overview Card -->
            <div class="info-card">
                <div class="card-header-pro">
                    <h2 class="card-title-pro">
                        <i class="fas fa-info-circle"></i>
                        Service Overview
                    </h2>
                </div>
                <div class="card-body-pro">
                    <!-- Service Image -->
                    <div class="image-container">
                        <?php 
                        $image_found = false;
                        $image_src = '';
                        
                        if (!empty($service_data['image'])) {
                            // All images should be in public/services/ directory
                            // Database stores path as: 'public/services/image-name.ext'
                            if (strpos($service_data['image'], 'public/') === 0) {
                                // Image path already includes 'public/' prefix
                                $image_path = '../' . $service_data['image'];
                            } else {
                                // Assume it's just the filename, prepend the directory
                                $image_path = '../public/services/' . $service_data['image'];
                            }
                            
                            if (file_exists($image_path)) {
                                $image_src = $image_path;
                                $image_found = true;
                            }
                        }
                        ?>
                        
                        <?php if ($image_found): ?>
                            <img src="<?php echo htmlspecialchars($image_src); ?>" 
                                 alt="<?php echo htmlspecialchars($service_data['title']); ?>" 
                                 class="service-image" />
                        <?php else: ?>
                            <div class="no-image-placeholder">
                                <i class="fas fa-image"></i>
                                <p>No Image Available</p>
                                <small>Upload an image to enhance this service's presentation</small>
                                <?php if (!empty($service_data['image'])): ?>
                                    <br><small style="color: #999; font-size: 0.7rem;">
                                        Debug: Image not found at <?php echo htmlspecialchars($image_path ?? 'unknown path'); ?>
                                    </small>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Service Description Card -->
            <div class="info-card">
                <div class="card-header-pro">
                    <h2 class="card-title-pro">
                        <i class="fas fa-align-left"></i>
                        Description
                    </h2>
                </div>
                <div class="card-body-pro">
                    <div class="description-content">
                        <?php if (!empty($service_data['description'])): ?>
                            <?php echo nl2br(htmlspecialchars($service_data['description'])); ?>
                        <?php else: ?>
                            <div class="empty-state">
                                <i class="fas fa-file-alt"></i>
                                <p>No description available for this service.</p>
                                <small>Add a detailed description to help users understand this service better.</small>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Service Features Card -->
            <?php if (!empty($service_data['features'])): ?>
            <div class="info-card">
                <div class="card-header-pro">
                    <h2 class="card-title-pro">
                        <i class="fas fa-star"></i>
                        Key Features & Benefits
                    </h2>
                </div>
                <div class="card-body-pro">
                    <div class="features-grid">
                        <?php 
                        $features = explode("\n", $service_data['features']);
                        foreach ($features as $feature):
                            $feature = trim($feature);
                            if (!empty($feature)):
                        ?>
                            <div class="feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span class="feature-text"><?php echo htmlspecialchars($feature); ?></span>
                            </div>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Sidebar Content -->
        <div class="sidebar-content">
            <!-- Service Information Card -->
            <div class="info-card">
                <div class="card-header-pro">
                    <h3 class="card-title-pro">
                        <i class="fas fa-info-circle"></i>
                        Service Details
                    </h3>
                </div>
                <div class="card-body-pro">
                    <div class="info-grid">
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-hashtag"></i>
                                Service ID
                            </div>
                            <div class="info-value">#<?php echo $service_id; ?></div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-folder"></i>
                                Category
                            </div>
                            <div class="info-value"><?php echo htmlspecialchars($category_name); ?></div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-toggle-on"></i>
                                Status
                            </div>
                            <div class="info-value">
                                <span class="status-indicator <?php echo $service_data['is_active'] ? 'active' : 'inactive'; ?>">
                                    <?php echo $service_data['is_active'] ? 'Active' : 'Inactive'; ?>
                                </span>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-plus"></i>
                                Created
                            </div>
                            <div class="info-value">
                                <?php echo date('M j, Y', strtotime($service_data['created_at'])); ?>
                                <br>
                                <small><?php echo date('g:i A', strtotime($service_data['created_at'])); ?></small>
                            </div>
                        </div>

                        <?php if (isset($service_data['updated_at']) && $service_data['updated_at'] != $service_data['created_at']): ?>
                        <div class="info-item">
                            <div class="info-label">
                                <i class="fas fa-calendar-edit"></i>
                                Last Updated
                            </div>
                            <div class="info-value">
                                <?php echo date('M j, Y', strtotime($service_data['updated_at'])); ?>
                                <br>
                                <small><?php echo date('g:i A', strtotime($service_data['updated_at'])); ?></small>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="info-card">
                <div class="card-header-pro">
                    <h3 class="card-title-pro">
                        <i class="fas fa-tools"></i>
                        Actions
                    </h3>
                </div>
                <div class="card-body-pro">
                    <div class="actions-grid">
                        <a href="edit-service.php?id=<?php echo $service_id; ?>" class="action-button action-edit">
                            <i class="fas fa-edit"></i>
                            Edit Service
                        </a>

                        <a href="../service-detail.php?id=<?php echo $service_id; ?>" 
                           target="_blank" 
                           class="action-button action-preview">
                            <i class="fas fa-external-link-alt"></i>
                            Preview Live
                        </a>

                        <button onclick="toggleServiceStatus(<?php echo $service_id; ?>)" 
                                class="action-button action-toggle">
                            <i class="fas fa-toggle-<?php echo $service_data['is_active'] ? 'on' : 'off'; ?>"></i>
                            <?php echo $service_data['is_active'] ? 'Deactivate' : 'Activate'; ?>
                        </button>

                        <button onclick="confirmDelete(<?php echo $service_id; ?>)" 
                                class="action-button action-delete">
                            <i class="fas fa-trash-alt"></i>
                            Delete Service
                        </button>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation Card -->
            <div class="info-card">
                <div class="card-header-pro">
                    <h3 class="card-title-pro">
                        <i class="fas fa-compass"></i>
                        Quick Navigation
                    </h3>
                </div>
                <div class="card-body-pro">
                    <div class="actions-grid">
                        <a href="dashboard.php" class="action-button action-edit">
                            <i class="fas fa-home"></i>
                            Dashboard
                        </a>

                        <a href="manage-services.php" class="action-button action-preview">
                            <i class="fas fa-list"></i>
                            All Services
                        </a>

                        <a href="add-service.php" class="action-button action-toggle">
                            <i class="fas fa-plus"></i>
                            Add New Service
                        </a>

                        <a href="manage-categories.php" class="action-button action-edit">
                            <i class="fas fa-folder"></i>
                            Manage Categories
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Professional Delete Confirmation Modal -->
<div id="deleteModal" class="modal-overlay">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <i class="fas fa-exclamation-triangle"></i>
                Confirm Deletion
            </h3>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this service?</p>
            <p><strong>This action cannot be undone.</strong></p>
            <p>All service data, including images and configurations, will be permanently removed.</p>
        </div>
        <div class="modal-actions">
            <button onclick="deleteService()" class="modal-btn modal-btn-danger">
                <i class="fas fa-trash"></i>
                Delete Service
            </button>
            <button onclick="closeModal()" class="modal-btn modal-btn-cancel">
                <i class="fas fa-times"></i>
                Cancel
            </button>
        </div>
    </div>
</div>

<!-- Enhanced JavaScript for Professional Interactions -->
<script>
let serviceToDelete = null;

// Toggle Service Status with Enhanced UI
async function toggleServiceStatus(serviceId) {
    const button = event.target.closest('.action-button');
    const originalContent = button.innerHTML;
    
    // Show loading state
    button.classList.add('loading');
    button.innerHTML = '<i class="fas fa-spinner"></i> Processing...';
    
    try {
        const formData = new FormData();
        formData.append('service_id', serviceId);
        
        const response = await fetch('toggle-service-status.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            // Show success feedback before reload
            button.classList.remove('loading');
            button.innerHTML = '<i class="fas fa-check"></i> Success!';
            button.style.background = 'var(--view-success)';
            button.style.color = 'white';
            
            // Reload after brief delay to show feedback
            setTimeout(() => {
                location.reload();
            }, 1000);
        } else {
            throw new Error(result.message || 'Failed to toggle status');
        }
    } catch (error) {
        console.error('Error:', error);
        
        // Show error state
        button.classList.remove('loading');
        button.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
        button.style.background = 'var(--view-danger)';
        button.style.color = 'white';
        
        // Show alert and restore button after delay
        setTimeout(() => {
            alert('Error: ' + error.message);
            button.innerHTML = originalContent;
            button.style.background = '';
            button.style.color = '';
        }, 1500);
    }
}

// Professional Delete Confirmation
function confirmDelete(serviceId) {
    serviceToDelete = serviceId;
    const modal = document.getElementById('deleteModal');
    modal.classList.add('active');
    
    // Focus on cancel button for better UX
    setTimeout(() => {
        modal.querySelector('.modal-btn-cancel').focus();
    }, 100);
}

function closeModal() {
    const modal = document.getElementById('deleteModal');
    modal.classList.remove('active');
    serviceToDelete = null;
}

// Enhanced Delete Function
async function deleteService() {
    if (!serviceToDelete) return;
    
    const deleteBtn = document.querySelector('.modal-btn-danger');
    const originalContent = deleteBtn.innerHTML;
    
    // Show loading state
    deleteBtn.classList.add('loading');
    deleteBtn.innerHTML = '<i class="fas fa-spinner"></i> Deleting...';
    
    try {
        const formData = new FormData();
        formData.append('service_id', serviceToDelete);
        
        const response = await fetch('delete-service.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            // Show success state
            deleteBtn.classList.remove('loading');
            deleteBtn.innerHTML = '<i class="fas fa-check"></i> Deleted!';
            deleteBtn.style.background = 'var(--view-success)';
            
            // Redirect after showing success
            setTimeout(() => {
                window.location.href = 'manage-services.php?success=service_deleted';
            }, 1000);
        } else {
            throw new Error(result.message || 'Failed to delete service');
        }
    } catch (error) {
        console.error('Error:', error);
        
        // Show error and restore button
        deleteBtn.classList.remove('loading');
        deleteBtn.innerHTML = '<i class="fas fa-exclamation-triangle"></i> Error';
        deleteBtn.style.background = '#dc2626';
        
        setTimeout(() => {
            alert('Error: ' + error.message);
            deleteBtn.innerHTML = originalContent;
            deleteBtn.style.background = '';
        }, 1500);
    }
}

// Enhanced Modal Controls
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeModal();
    }
});

document.getElementById('deleteModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeModal();
    }
});

// Professional Loading State for Page
document.addEventListener('DOMContentLoaded', function() {
    // Add smooth entrance animations
    const cards = document.querySelectorAll('.info-card');
    cards.forEach((card, index) => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        
        setTimeout(() => {
            card.style.transition = 'all 0.6s ease';
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
        }, index * 150);
    });
});

// Enhanced Action Button Hover Effects
document.querySelectorAll('.action-button').forEach(button => {
    button.addEventListener('mouseenter', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(-2px)';
        }
    });
    
    button.addEventListener('mouseleave', function() {
        if (!this.classList.contains('loading')) {
            this.style.transform = 'translateY(0)';
        }
    });
});
</script>

<?php include 'includes/admin-footer.php'; ?>
