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

// Get service ID from URL or session
$service_id = isset($_GET['id']) ? $_GET['id'] : (isset($_SESSION['viewed_service_id']) ? $_SESSION['viewed_service_id'] : null);

// Store in session for future use
if ($service_id) {
    $_SESSION['viewed_service_id'] = $service_id;
}

if (!$service_id) {
    header('Location: manage-services.php');
    exit;
}

// Get service details
$service_data = $service->getServiceByIdAdmin($service_id);
if (!$service_data) {
    header('Location: manage-services.php');
    exit;
}

// Get category name
$category_data = $category->getCategoryById($service_data['category_id']);
$category_name = $category_data ? $category_data['name'] : 'Uncategorized';

$page_title = "View Service - " . htmlspecialchars($service_data['title']);
include 'includes/admin-header.php';
?>

<link rel="stylesheet" href="../assets/css/admindashboard.css">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<main class="admin-main">
    <div class="admin-container">
        <!-- Navigation Breadcrumb -->
        <div class="admin-breadcrumb">
            <a href="dashboard.php"><i class="fas fa-home"></i> Dashboard</a>
            <i class="fas fa-chevron-right"></i>
            <a href="manage-services.php">Services</a>
            <i class="fas fa-chevron-right"></i>
            <span>View Service</span>
        </div>

        <!-- Service View Header -->
        <div class="service-view-header">
            <div class="header-content">
                <h1><?php echo htmlspecialchars($service_data['title']); ?></h1>
                <div class="service-meta">
                    <span class="category-badge">
                        <i class="fas fa-folder"></i>
                        <?php echo htmlspecialchars($category_name); ?>
                    </span>
                    <span class="status-badge <?php echo isset($service_data['is_active']) && $service_data['is_active'] ? 'active' : 'inactive'; ?>">
                        <i class="fas fa-circle"></i>
                        <?php echo isset($service_data['is_active']) && $service_data['is_active'] ? 'Active' : 'Inactive'; ?>
                    </span>
                </div>
            </div>
            
            <!-- Quick Action Buttons -->
            <div class="quick-actions-bar">
                <a href="dashboard.php" class="action-btn home">
                    <i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
                <a href="edit-service.php?id=<?php echo $service_id; ?>" class="action-btn edit">
                    <i class="fas fa-edit"></i>
                    <span>Edit Service</span>
                </a>
                <a href="add-service.php" class="action-btn add">
                    <i class="fas fa-plus"></i>
                    <span>New Service</span>
                </a>
                <a href="manage-services.php" class="action-btn back">
                    <i class="fas fa-list"></i>
                    <span>All Services</span>
                </a>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="service-content-grid">
            <!-- Left Column - Main Info -->
            <div class="service-main-content">
                <!-- Service Image and Details -->
                <div class="content-card">
                    <div class="card-header">
                        <h2><i class="fas fa-images"></i> Service Image</h2>
                    </div>
                    <div class="service-image-main">
                        <?php if ($service_data['image']): ?>
                        <img src="../<?php echo htmlspecialchars($service_data['image']); ?>" 
                             alt="<?php echo htmlspecialchars($service_data['title']); ?>">
                        <?php else: ?>
                        <div class="no-image">
                            <i class="fas fa-image"></i>
                            <p>No image available</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Service Description -->
                <div class="content-card">
                    <div class="card-header">
                        <h2><i class="fas fa-align-left"></i> Service Description</h2>
                    </div>
                    <div class="service-description">
                        <?php if (!empty($service_data['description'])): ?>
                            <?php echo nl2br(htmlspecialchars($service_data['description'])); ?>
                        <?php else: ?>
                            <p class="no-content">No description available</p>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Features Section -->
                <?php if (!empty($service_data['features'])): ?>
                <div class="content-card">
                    <div class="card-header">
                        <h2><i class="fas fa-star"></i> Features & Benefits</h2>
                    </div>
                    <div class="features-grid">
                        <?php 
                        $features = explode("\n", $service_data['features']);
                        foreach ($features as $feature):
                            if (trim($feature)):
                        ?>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span><?php echo htmlspecialchars(trim($feature)); ?></span>
                        </div>
                        <?php 
                            endif;
                        endforeach; 
                        ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <!-- Right Column - Additional Info -->
            <div class="service-sidebar">
                <!-- Status Card -->
                <div class="content-card">
                    <div class="card-header">
                        <h2><i class="fas fa-info-circle"></i> Service Information</h2>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <label><i class="fas fa-tag"></i> Service ID</label>
                            <span>#<?php echo $service_id; ?></span>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-folder"></i> Category</label>
                            <span><?php echo htmlspecialchars($category_name); ?></span>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-calendar-plus"></i> Created</label>
                            <span><?php echo date('F j, Y', strtotime($service_data['created_at'])); ?></span>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-calendar-check"></i> Last Updated</label>
                            <span><?php echo date('F j, Y', strtotime($service_data['updated_at'])); ?></span>
                        </div>
                        <div class="info-item">
                            <label><i class="fas fa-toggle-on"></i> Status</label>
                            <span class="status-text <?php echo isset($service_data['is_active']) && $service_data['is_active'] ? 'active' : 'inactive'; ?>">
                                <?php echo isset($service_data['is_active']) && $service_data['is_active'] ? 'Active' : 'Inactive'; ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="content-card">
                    <div class="card-header">
                        <h2><i class="fas fa-cog"></i> Actions</h2>
                    </div>
                    <div class="actions-grid">
                        <a href="edit-service.php?id=<?php echo $service_id; ?>" class="action-button edit-btn">
                            <i class="fas fa-edit"></i>
                            Edit Service
                        </a>
                        <a href="../service-detail.php?id=<?php echo $service_id; ?>" class="action-button preview-btn" target="_blank">
                            <i class="fas fa-external-link-alt"></i>
                            Preview
                        </a>
                        <button class="action-button toggle-btn" data-id="<?php echo $service_id; ?>">
                            <i class="fas fa-power-off"></i>
                            <?php echo (isset($service_data['is_active']) && $service_data['is_active']) ? 'Deactivate' : 'Activate'; ?>
                        </button>
                        <button class="action-button delete-btn" data-id="<?php echo $service_id; ?>">
                            <i class="fas fa-trash-alt"></i>
                            Delete Service
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="modal">
    <div class="modal-content">
        <h2><i class="fas fa-exclamation-triangle"></i> Delete Service</h2>
        <p>Are you sure you want to delete this service? This action cannot be undone.</p>
        <div class="modal-actions">
            <button id="confirmDelete" class="delete-btn">
                <i class="fas fa-trash-alt"></i> Delete
            </button>
            <button id="cancelDelete" class="cancel-btn">
                <i class="fas fa-times"></i> Cancel
            </button>
        </div>
    </div>
</div>

<script>
    // Modal functionality
    const deleteModal = document.getElementById('deleteModal');
    const deleteBtn = document.querySelector('.delete-btn');
    const confirmDelete = document.getElementById('confirmDelete');
    const cancelDelete = document.getElementById('cancelDelete');
    const toggleBtn = document.querySelector('.toggle-btn');

    // Delete modal functionality
    deleteBtn.addEventListener('click', () => {
        deleteModal.style.display = 'flex';
    });

    cancelDelete.addEventListener('click', () => {
        deleteModal.style.display = 'none';
    });

    // Close modal when clicking outside
    deleteModal.addEventListener('click', (e) => {
        if (e.target === deleteModal) {
            deleteModal.style.display = 'none';
        }
    });

    // Handle service deletion
    confirmDelete.addEventListener('click', async () => {
        const serviceId = deleteBtn.dataset.id;
        
        try {
            const formData = new FormData();
            formData.append('action', 'delete');
            formData.append('service_id', serviceId);
            
            const response = await fetch('manage-services.php', {
                method: 'POST',
                body: formData
            });
            
            if (response.ok) {
                // Redirect to manage services page after successful deletion
                window.location.href = 'manage-services.php?deleted=1';
            } else {
                alert('Error deleting service. Please try again.');
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error deleting service. Please try again.');
        }
        
        deleteModal.style.display = 'none';
    });

    // Toggle service status
    toggleBtn.addEventListener('click', async (e) => {
        const serviceId = e.target.dataset.id;
        const button = e.target;
        const originalText = button.innerHTML;
        
        // Disable button during request
        button.disabled = true;
        button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Processing...';
        
        try {
            const formData = new FormData();
            formData.append('action', 'toggle_status');
            formData.append('service_id', serviceId);
            
            const response = await fetch('manage-services.php', {
                method: 'POST',
                body: formData
            });
            
            if (response.ok) {
                // Reload page to show updated status
                window.location.reload();
            } else {
                alert('Error updating service status. Please try again.');
                button.disabled = false;
                button.innerHTML = originalText;
            }
        } catch (error) {
            console.error('Error:', error);
            alert('Error updating service status. Please try again.');
            button.disabled = false;
            button.innerHTML = originalText;
        }
    });
</script>

<?php include 'includes/admin-footer.php'; ?>
