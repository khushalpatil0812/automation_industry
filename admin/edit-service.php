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

$service_id = $_GET['id'] ?? 0;
$current_service = $service->getServiceById($service_id);

if (!$current_service) {
    header('Location: manage-services.php');
    exit;
}

if ($_POST) {
    $title = trim($_POST['title']);
    $category_id = $_POST['category_id'];
    $description = trim($_POST['description']);
    $features = trim($_POST['features']);
    
    $errors = [];
    
    // Basic validation
    if (empty($title)) {
        $errors[] = "Service title is required.";
    }
    if (empty($description)) {
        $errors[] = "Service description is required.";
    }
    
    $image_path = $current_service['image'];
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../public/services/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        $max_size = 5 * 1024 * 1024; // 5MB

        if (!in_array($_FILES['image']['type'], $allowed_types)) {
            $errors[] = "Invalid file type. Please upload JPG, PNG, GIF, or WebP images.";
        } elseif ($_FILES['image']['size'] > $max_size) {
            $errors[] = "File too large. Maximum size is 5MB.";
        } else {
            // Use original filename with sanitization
            $original_name = $_FILES['image']['name'];
            $file_extension = pathinfo($original_name, PATHINFO_EXTENSION);
            $base_name = pathinfo($original_name, PATHINFO_FILENAME);
            
            // Sanitize filename: remove special characters, spaces to hyphens
            $safe_name = preg_replace('/[^a-zA-Z0-9\-_]/', '-', $base_name);
            $safe_name = preg_replace('/-+/', '-', $safe_name); // Remove multiple hyphens
            $safe_name = trim($safe_name, '-'); // Remove leading/trailing hyphens
            
            // Create final filename
            $filename = $safe_name . '.' . strtolower($file_extension);
            
            // Check if file already exists, if so add timestamp
            $upload_path = $upload_dir . $filename;
            if (file_exists($upload_path)) {
                $filename = $safe_name . '-' . time() . '.' . strtolower($file_extension);
                $upload_path = $upload_dir . $filename;
            }

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                // Delete old image if it exists
                if ($current_service['image'] && file_exists('../' . $current_service['image'])) {
                    unlink('../' . $current_service['image']);
                }
                $image_path = 'public/services/' . $filename;
            } else {
                $errors[] = "Failed to upload image. Please try again.";
            }
        }
    }

    // Only proceed if no errors
    if (empty($errors)) {
        if ($service->updateService($service_id, $title, $category_id, $description, $image_path, $features)) {
            $message = '<div class="alert alert-success alert-dismissible fade show" role="alert">
                          <i class="fas fa-check-circle"></i> Service updated successfully!
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            $current_service = $service->getServiceById($service_id);
        } else {
            $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <i class="fas fa-exclamation-circle"></i> Error updating service.
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
        }
    } else {
        // Display validation errors
        $message = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <i class="fas fa-exclamation-triangle"></i> Please fix the following errors:<br>
                      • ' . implode('<br>• ', $errors) . '
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
    }
}

$categories = $category->getAllCategories();
?>

<?php include 'includes/admin-header.php'; ?>

<style>
body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
    min-height: 100vh;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.admin-content {
    padding: 30px;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}

.content-header {
    margin-bottom: 30px;
    text-align: center;
}

.content-header h1 {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
    position: relative;
    display: inline-block;
}

.content-header h1::after {
    content: '';
    position: absolute;
    bottom: -10px;
    left: 50%;
    transform: translateX(-50%);
    width: 50px;
    height: 3px;
    background: linear-gradient(to right, #3498db, #2ecc71);
    border-radius: 3px;
}

.content-header p {
    color: #7f8c8d;
    font-size: 16px;
}

.card {
    border: none;
    border-radius: 12px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
}

.card-body {
    padding: 30px;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 25px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #34495e;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    padding: 12px 15px;
    border: 1px solid #ddd;
    border-radius: 8px;
    font-size: 15px;
    transition: all 0.3s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
    outline: none;
}

.form-group.full-width {
    grid-column: 1 / -1;
}

.file-upload-area {
    border: 2px dashed #bdc3c7;
    border-radius: 8px;
    padding: 25px;
    text-align: center;
    position: relative;
    cursor: pointer;
    transition: all 0.3s;
    background: #f9f9f9;
}

.file-upload-area:hover,
.file-upload-area.drag-over {
    border-color: #3498db;
    background: #f0f8ff;
}

.file-upload-area.has-image {
    border-style: solid;
    background: white;
}

.upload-placeholder {
    color: #7f8c8d;
}

.upload-icon {
    font-size: 40px;
    margin-bottom: 10px;
}

.preview-container {
    position: relative;
    display: inline-block;
    margin-top: 15px;
}

.preview-container img {
    max-width: 100%;
    max-height: 200px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s;
}

.preview-container img:hover {
    transform: scale(1.02);
}

.remove-image {
    position: absolute;
    top: -10px;
    right: -10px;
    width: 28px;
    height: 28px;
    background: #e74c3c;
    border: none;
    color: white;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: background 0.3s;
}

.remove-image:hover {
    background: #c0392b;
}

.form-actions {
    margin-top: 30px;
    display: flex;
    gap: 15px;
    justify-content: flex-end;
}

.btn {
    padding: 12px 25px;
    border-radius: 8px;
    font-weight: 600;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.btn-primary {
    background: linear-gradient(to right, #3498db, #2980b9);
    color: white;
}

.btn-primary:hover {
    background: linear-gradient(to right, #2980b9, #2573a7);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
}

.btn-secondary {
    background: #95a5a6;
    color: white;
}

.btn-secondary:hover {
    background: #7f8c8d;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(149, 165, 166, 0.3);
}

.alert {
    border-radius: 10px;
    padding: 15px 20px;
    margin-bottom: 25px;
    display: flex;
    align-items: center;
    border: none;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.alert-success {
    background: linear-gradient(to right, #2ecc71, #27ae60);
    color: white;
}

.alert-danger {
    background: linear-gradient(to right, #e74c3c, #c0392b);
    color: white;
}

.alert i {
    margin-right: 10px;
    font-size: 20px;
}

.btn-close {
    filter: invert(1);
    opacity: 0.8;
    margin-left: auto;
}

.btn-close:hover {
    opacity: 1;
}

@media (max-width: 768px) {
    .form-grid {
        grid-template-columns: 1fr;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
    }
}

/* Enhanced Responsive Design - Mobile First Approach */
@media (max-width: 575.98px) {
    /* Extra small devices (phones, less than 576px) */
    .admin-content {
        padding: 10px;
        margin: 0;
    }
    
    .content-header {
        text-align: center;
        margin-bottom: 20px;
    }
    
    .content-header h1 {
        font-size: 1.5rem;
        margin-bottom: 10px;
    }
    
    .breadcrumb {
        justify-content: center;
        font-size: 0.8rem;
        padding: 5px 10px;
        margin-bottom: 15px;
    }
    
    .back-btn-container {
        text-align: center;
        margin: 15px 0;
    }
    
    .back-btn {
        width: 100%;
        max-width: 200px;
        padding: 10px 16px;
        font-size: 0.9rem;
    }
    
    .edit-form-container {
        padding: 15px;
        margin: 10px auto;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .form-group {
        margin-bottom: 20px;
    }
    
    .form-label {
        font-size: 0.9rem;
        margin-bottom: 8px;
        font-weight: 600;
    }
    
    .form-control, .form-select {
        font-size: 14px;
        padding: 12px 15px;
        border-radius: 6px;
        margin-bottom: 5px;
        min-height: 44px;
    }
    
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 0.2rem rgba(79, 70, 229, 0.25);
    }
    
    textarea.form-control {
        min-height: 100px;
        resize: vertical;
    }
    
    .btn {
        font-size: 0.9rem;
        padding: 12px 20px;
        border-radius: 6px;
        margin-bottom: 10px;
        min-height: 44px;
    }
    
    .form-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }
    
    .form-actions .btn {
        width: 100%;
        margin: 0;
    }
    
    .alert {
        padding: 12px 15px;
        font-size: 0.85rem;
        margin-bottom: 20px;
        border-radius: 6px;
    }
    
    .invalid-feedback {
        font-size: 0.8rem;
        margin-top: 5px;
    }
    
    .form-text {
        font-size: 0.75rem;
        margin-top: 5px;
    }
    
    /* File upload styling for mobile */
    input[type="file"] {
        padding: 10px;
        font-size: 0.85rem;
    }
    
    /* Better spacing for checkboxes/radios on mobile */
    .form-check {
        margin-bottom: 15px;
    }
    
    .form-check-input {
        margin-top: 0.25rem;
        transform: scale(1.2);
        margin-right: 8px;
    }
    
    .form-check-label {
        font-size: 0.9rem;
        padding-left: 5px;
    }
    
    /* Image preview on mobile */
    .current-image {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
        margin: 10px 0;
    }
    
    .image-preview {
        text-align: center;
        margin: 10px 0;
    }
}

@media (min-width: 576px) and (max-width: 767.98px) {
    /* Small devices (landscape phones, 576px and up) */
    .edit-form-container {
        padding: 25px;
        max-width: 90%;
        margin: 20px auto;
    }
    
    .content-header h1 {
        font-size: 1.8rem;
    }
    
    .form-actions {
        flex-direction: row;
        justify-content: space-between;
        gap: 15px;
    }
    
    .form-actions .btn {
        flex: 1;
        margin: 0;
    }
    
    .form-control, .form-select {
        padding: 10px 12px;
    }
}

@media (min-width: 768px) and (max-width: 991.98px) {
    /* Medium devices (tablets, 768px and up) */
    .edit-form-container {
        padding: 30px;
        max-width: 85%;
        margin: 20px auto;
    }
    
    .content-header h1 {
        font-size: 2rem;
    }
    
    .form-actions {
        justify-content: flex-end;
        gap: 15px;
    }
    
    .form-actions .btn {
        width: auto;
        min-width: 120px;
    }
    
    /* Two-column layout for some form fields on tablets */
    .row.form-row .col-md-6 {
        padding-right: 10px;
        padding-left: 10px;
    }
}

@media (min-width: 992px) and (max-width: 1199.98px) {
    /* Large devices (desktops, 992px and up) */
    .edit-form-container {
        max-width: 80%;
        margin: 30px auto;
    }
}

@media (min-width: 1200px) {
    /* Extra large devices (large desktops, 1200px and up) */
    .edit-form-container {
        max-width: 75%;
        margin: 30px auto;
    }
    
    .admin-content {
        max-width: 1200px;
        margin: 0 auto;
    }
}

/* Touch-friendly improvements for all touch devices */
@media (hover: none) and (pointer: coarse) {
    .btn, .form-control, .form-select {
        min-height: 44px; /* Apple's recommended touch target size */
    }
    
    .form-check-input {
        transform: scale(1.3);
        margin-right: 10px;
    }
    
    /* Larger tap targets for form labels */
    .form-check-label {
        padding: 8px 0;
        cursor: pointer;
    }
}
</style>

<div class="admin-content">
    <div class="content-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-2">
                <li class="breadcrumb-item">
                    <a href="dashboard.php" class="text-decoration-none">
                        <i class="fas fa-tachometer-alt me-1"></i>Dashboard
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="manage-services.php" class="text-decoration-none">Manage Services</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Service</li>
            </ol>
        </nav>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1>Edit Service</h1>
                <p>Update service information</p>
            </div>
            <div>
                <a href="dashboard.php" class="btn me-2" style="background-color: #6f42c1; border-color: #6f42c1; color: white;">
                    <i class="fas fa-arrow-left me-1"></i>Back to Dashboard
                </a>
                <a href="manage-services.php" class="btn btn-outline-primary">
                    <i class="fas fa-list me-1"></i>View All Services
                </a>
            </div>
        </div>
    </div>

    <?php echo $message; ?>

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="service-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Service Title *</label>
                        <input type="text" id="title" name="title" 
                               value="<?php echo htmlspecialchars($current_service['title']); ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Category *</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>" 
                                <?php echo $cat['id'] == $current_service['category_id'] ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($cat['name']); ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" rows="4" required><?php 
                            echo htmlspecialchars($current_service['description']); ?></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="features">Features (one per line)</label>
                        <textarea id="features" name="features" rows="6" 
                                  placeholder="Enter each feature on a new line"><?php 
                            echo htmlspecialchars($current_service['features'] ?? ''); ?></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="image">Service Image</label>
                        <div class="file-upload-area <?php echo $current_service['image'] ? 'has-image' : ''; ?>">
                            <input type="file" id="image" name="image" accept="image/*">
                            <div class="upload-placeholder">
                                <div class="upload-icon">📁</div>
                                <p>Click to select new image or drag & drop</p>
                                <small>PNG, JPG, GIF up to 5MB</small>
                            </div>
                            <div class="image-preview">
                                <?php if ($current_service['image']): ?>
                                <div class="preview-container">
                                    <?php
                                    // All images should be in public/services/ directory
                                    if (strpos($current_service['image'], 'public/') === 0) {
                                        // Image path already includes 'public/' prefix
                                        $image_src = '../' . $current_service['image'];
                                    } else {
                                        // Assume it's just the filename, prepend the directory
                                        $image_src = '../public/services/' . $current_service['image'];
                                    }
                                    ?>
                                    <img src="<?php echo htmlspecialchars($image_src); ?>" alt="Current image">
                                    <button type="button" class="remove-image" onclick="removeImage()">×</button>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-2"></i>Update Service
                    </button>
                    <a href="manage-services.php" class="btn btn-secondary">
                        <i class="fas fa-times me-2"></i>Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// File upload preview and drag & drop
const fileInput = document.getElementById('image');
const uploadArea = document.querySelector('.file-upload-area');
const imagePreview = document.querySelector('.image-preview');

fileInput.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('drop', handleDrop);

function handleFileSelect(e) {
    const file = e.target.files[0];
    if (file) {
        displayImagePreview(file);
    }
}

function handleDragOver(e) {
    e.preventDefault();
    uploadArea.classList.add('drag-over');
}

function handleDrop(e) {
    e.preventDefault();
    uploadArea.classList.remove('drag-over');
    const file = e.dataTransfer.files[0];
    if (file && file.type.startsWith('image/')) {
        fileInput.files = e.dataTransfer.files;
        displayImagePreview(file);
    }
}

function displayImagePreview(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        imagePreview.innerHTML = `
            <div class="preview-container">
                <img src="${e.target.result}" alt="Preview">
                <button type="button" class="remove-image" onclick="removeImage()">×</button>
            </div>
        `;
        uploadArea.classList.add('has-image');
    };
    reader.readAsDataURL(file);
}

function removeImage() {
    fileInput.value = '';
    imagePreview.innerHTML = '';
    uploadArea.classList.remove('has-image');
}

// Add animation to form elements when page loads
document.addEventListener('DOMContentLoaded', function() {
    const formGroups = document.querySelectorAll('.form-group');
    formGroups.forEach((group, index) => {
        group.style.animation = `fadeIn 0.5s ease-in-out ${index * 0.1}s forwards`;
        group.style.opacity = '0';
    });
});
</script>

<?php include 'includes/admin-footer.php'; ?>