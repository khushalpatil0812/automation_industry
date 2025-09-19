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
</style>

<div class="admin-content">
    <div class="content-header">
        <h1>Edit Service</h1>
        <p>Update service information</p>
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