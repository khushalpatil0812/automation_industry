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

// Handle form submission
if ($_POST) {
    $title = trim($_POST['title']);
    $category_id = $_POST['category_id'];
    $description = trim($_POST['description']);
    $features = trim($_POST['features']);
    
    // Handle file upload
    $image_path = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../uploads/services/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $filename = uniqid() . '.' . $file_extension;
        $upload_path = $upload_dir . $filename;
        
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            $image_path = 'uploads/services/' . $filename;
        }
    }
    
    if ($service->createService($title, $category_id, $description, $image_path, $features)) {
        $message = '<div class="success-message">Service added successfully!</div>';
    } else {
        $message = '<div class="error-message">Error adding service.</div>';
    }
}

$categories = $category->getAllCategories();

// Handle quick add category
if (isset($_POST['quick_add_category'])) {
    $new_cat_name = trim($_POST['new_category_name'] ?? '');
    $new_cat_desc = trim($_POST['new_category_desc'] ?? '');
    $new_cat_icon = trim($_POST['new_category_icon'] ?? '');
    if ($new_cat_name) {
        if ($category->createCategory($new_cat_name, $new_cat_desc, $new_cat_icon)) {
            $message = '<div class="success-message">Category added successfully!</div>';
            $categories = $category->getAllCategories(); // Refresh list
        } else {
            $message = '<div class="error-message">Error adding category.</div>';
        }
    } else {
        $message = '<div class="error-message">Category name is required.</div>';
    }
}
?>

<?php include 'includes/admin-header.php'; ?>

<div class="admin-content">
    <div class="content-header">
        <h1>Add New Service</h1>
        <p>Create a new automation service</p>
    </div>

    <?php echo $message; ?>

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" class="service-form">
                <div class="form-grid">
                    <div class="form-group">
                        <label for="title">Service Title *</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="category_id">Category *</label>
                        <select id="category_id" name="category_id" required>
                            <option value="">Select Category</option>
                            <?php foreach ($categories as $cat): ?>
                            <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div style="margin-top:1rem;">
                            <form method="POST" style="display:flex;gap:0.5rem;flex-wrap:wrap;align-items:center;">
                                <input type="text" name="new_category_name" placeholder="New category name" required style="padding:0.3rem;">
                                <input type="text" name="new_category_desc" placeholder="Description" style="padding:0.3rem;">
                                <input type="text" name="new_category_icon" placeholder="Icon (optional)" style="padding:0.3rem;">
                                <button type="submit" name="quick_add_category" class="btn btn-sm btn-secondary">Add Category</button>
                            </form>
                        </div>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="description">Description *</label>
                        <textarea id="description" name="description" rows="4" required></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="features">Features (one per line)</label>
                        <textarea id="features" name="features" rows="6" placeholder="Enter each feature on a new line"></textarea>
                    </div>
                    
                    <div class="form-group full-width">
                        <label for="image">Service Image</label>
                        <div class="file-upload-area">
                            <input type="file" id="image" name="image" accept="image/*">
                            <div class="upload-placeholder">
                                <div class="upload-icon">📁</div>
                                <p>Click to select image or drag & drop</p>
                                <small>PNG, JPG, GIF up to 5MB</small>
                            </div>
                            <div class="image-preview"></div>
                        </div>
                    </div>
                </div>
                
                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Add Service</button>
                    <a href="manage-services.php" class="btn btn-secondary">Cancel</a>
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
</script>

<?php include 'includes/admin-footer.php'; ?>
