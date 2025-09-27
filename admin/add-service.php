<!-- #region the css is include in this file itself -->
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

$service  = new Service();
$category = new Category($pdo);
$message  = '';

// Handle form submission
if ($_POST) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $title       = trim($_POST['title'] ?? '');
    $category_id = intval($_POST['category_id'] ?? 0);
    $description = trim($_POST['description'] ?? '');
    $features    = trim($_POST['features'] ?? '');
    
    $errors = [];

    // Validation
    if (empty($title)) {
        $errors[] = "Service title is required.";
    } elseif (strlen($title) < 3) {
        $errors[] = "Service title must be at least 3 characters long.";
    } elseif (strlen($title) > 255) {
        $errors[] = "Service title must be less than 255 characters.";
    }

    if ($category_id <= 0) {
        $errors[] = "Please select a valid category.";
    }

    if (empty($description)) {
        $errors[] = "Service description is required.";
    } elseif (strlen($description) < 10) {
        $errors[] = "Description must be at least 10 characters long.";
    }

    // Validate category exists
    $validCategories = $service->getCategoriesWithDetails();
    $categoryExists = false;
    foreach($validCategories as $cat) {
        if ($cat['id'] == $category_id) {
            $categoryExists = true;
            break;
        }
    }
    if (!$categoryExists) {
        $errors[] = "Selected category does not exist.";
    }

    if (!empty($errors)) {
        $message = '<div class="alert alert-error"><strong>Please fix the following errors:</strong><ul>';
        foreach($errors as $error) {
            $message .= '<li>' . htmlspecialchars($error) . '</li>';
        }
        $message .= '</ul></div>';
    } else {
        // Handle file upload with better validation
        $image_path = '';
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
                // Use original filename with some sanitization
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
                    $image_path = 'public/services/' . $filename;
                } else {
                    $errors[] = "Failed to upload image. Please try again.";
                }
            }
        } elseif (isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_NO_FILE) {
            $errors[] = "Image upload error: " . $_FILES['image']['error'];
        }

        if (empty($errors)) {
            try {
                if ($service->createService($title, $category_id, $description, $image_path, $features)) {
                    $message = '<div class="alert alert-success"><strong>Success!</strong> Service "' . htmlspecialchars($title) . '" has been added successfully! <a href="manage-services.php">View all services</a></div>';
                    // Clear form data after successful submission
                    $_POST = [];
                } else {
                    $message = '<div class="alert alert-error"><strong>Database Error:</strong> Failed to add service. Please check your database connection and try again.</div>';
                }
            } catch (Exception $e) {
                $message = '<div class="alert alert-error"><strong>Error:</strong> ' . htmlspecialchars($e->getMessage()) . '</div>';
                error_log("Service creation error: " . $e->getMessage());
            }
        } else {
            $message = '<div class="alert alert-error"><strong>Upload Error:</strong><ul>';
            foreach($errors as $error) {
                $message .= '<li>' . htmlspecialchars($error) . '</li>';
            }
            $message .= '</ul></div>';
        }
    }
}

$categories = $service->getCategoriesWithDetails();
?>

<?php include 'includes/admin-header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Service - Admin Panel</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7f9;
            color: #333;
            line-height: 1.6;
        }
        
        .admin-content {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
        }
        
        .form-container {
            background: #928e8eff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        .content-header {
            padding: 25px 30px;
            border-bottom: 1px solid #eee;
            background: linear-gradient(to right, #f8f9fa, #fff);
        }
        
        .content-header h1 {
            font-size: 24px;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        
        .content-header p {
            color: #7f8c8d;
            font-size: 15px;
        }
        
        .card {
            border: none;
            border-radius: 0;
        }
        
        .card-body {
            padding: 30px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group.full-width {
            grid-column: 1 / -1;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #34495e;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s;
        }
        
        .form-input:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
        }
        
        textarea.form-input {
            min-height: 120px;
            resize: vertical;
        }
        
        #description {
            min-height: 150px;
        }
        
        #features {
            min-height: 200px;
        }
        
        .file-upload-area {
            border: 2px dashed #5f5959ff;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: border-color 0.3s;
            position: relative;
        }
        
        .file-upload-area:hover {
            border-color: #3498db;
        }
        
        .file-upload-area.drag-over {
            border-color: #3498db;
            background-color: rgba(52, 152, 219, 0.05);
        }
        
        .file-upload-area input[type="file"] {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }
        
        .upload-placeholder {
            color: #7f8c8d;
        }
        
        .upload-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }
        
        .upload-placeholder p {
            margin-bottom: 5px;
            font-size: 16px;
        }
        
        .upload-placeholder small {
            font-size: 13px;
        }
        
        .image-preview {
            margin-top: 15px;
        }
        
        .preview-container {
            position: relative;
            display: inline-block;
            max-width: 100%;
        }
        
        .preview-container img {
            max-width: 100%;
            max-height: 200px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .remove-image {
            position: absolute;
            top: -10px;
            right: -10px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background: #e74c3c;
            color: white;
            border: none;
            font-size: 18px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .form-actions {
            grid-column: 1 / -1;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }
        
        .btn {
            padding: 12px 25px;
            border: none;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: #ad2742ff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
        }
        
        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }
        
        .btn-secondary:hover {
            background-color: #7f8c8d;
        }
        
        .alert {
            padding: 15px;
            margin: 20px 30px;
            border-radius: 6px;
            font-size: 15px;
        }
        
        .alert-error {
            background-color: #ffebee;
            color: #c62828;
            border: 1px solid #ef9a9a;
        }
        
        .alert-success {
            background-color: #e8f5e8;
            color: #2e7d32;
            border: 1px solid #a5d6a7;
        }
        
        .alert ul {
            margin: 10px 0 0 20px;
            padding: 0;
        }
        
        .alert li {
            margin-bottom: 5px;
        }
        
        .alert a {
            color: inherit;
            text-decoration: underline;
            font-weight: bold;
        }
        
        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .admin-content {
                padding: 15px;
            }
            
            .card-body {
                padding: 20px;
            }
        }

        /* Enhanced Responsive Design - Mobile First Approach */
        @media (max-width: 575.98px) {
            /* Extra small devices (phones, less than 576px) */
            .admin-content {
                padding: 10px;
            }
            
            .form-container {
                padding: 15px;
                margin: 10px auto;
                border-radius: 8px;
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
            }
            
            .btn-group {
                display: flex;
                flex-direction: column;
                gap: 10px;
                margin-top: 20px;
            }
            
            .btn-primary, .btn-secondary {
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
            }
            
            .form-check-label {
                font-size: 0.9rem;
                padding-left: 5px;
            }
        }

        @media (min-width: 576px) and (max-width: 767.98px) {
            /* Small devices (landscape phones, 576px and up) */
            .form-container {
                padding: 25px;
                max-width: 90%;
            }
            
            .content-header h1 {
                font-size: 1.8rem;
            }
            
            .btn-group {
                flex-direction: row;
                justify-content: space-between;
                gap: 15px;
            }
            
            .btn-primary, .btn-secondary {
                flex: 1;
                margin: 0;
            }
            
            .form-control, .form-select {
                padding: 10px 12px;
            }
        }

        @media (min-width: 768px) and (max-width: 991.98px) {
            /* Medium devices (tablets, 768px and up) */
            .form-container {
                padding: 30px;
                max-width: 85%;
            }
            
            .content-header h1 {
                font-size: 2rem;
            }
            
            .btn-group {
                justify-content: flex-end;
                gap: 15px;
            }
            
            .btn-primary, .btn-secondary {
                width: auto;
                min-width: 120px;
            }
        }

        @media (min-width: 992px) and (max-width: 1199.98px) {
            /* Large devices (desktops, 992px and up) */
            .form-container {
                max-width: 80%;
            }
        }

        @media (min-width: 1200px) {
            /* Extra large devices (large desktops, 1200px and up) */
            .form-container {
                max-width: 75%;
            }
            
            .admin-content {
                max-width: 1200px;
                margin: 0 auto;
            }
        }

        /* Touch-friendly improvements for all devices */
        @media (hover: none) and (pointer: coarse) {
            .btn, .form-control, .form-select {
                min-height: 44px; /* Apple's recommended touch target size */
            }
            
            .form-check-input {
                transform: scale(1.2);
                margin-right: 8px;
            }
        }
    </style>
</head>
<body>
    <!-- Centered Content -->
    <div class="admin-content">
        <div class="form-container">
            
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
                        <li class="breadcrumb-item active" aria-current="page">Add New Service</li>
                    </ol>
                </nav>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1>Add New Service</h1>
                        <p>Create a new automation service</p>
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
                            
                            <!-- Service Title -->
                            <div class="form-group">
                                <label for="title">Service Title *</label>
                                <input type="text" 
                                       id="title" 
                                       name="title" 
                                       required 
                                       class="form-input"
                                       value="<?php echo isset($_POST['title']) ? htmlspecialchars($_POST['title']) : ''; ?>"
                                       placeholder="Enter a descriptive service title">
                            </div>
                            
                            <!-- Category -->
                            <div class="form-group">
                                <label for="category_id">Category *</label>
                                <select id="category_id" name="category_id" required class="form-input">
                                    <option value="">Select Category</option>
                                    <?php foreach ($categories as $cat): ?>
                                        <option value="<?php echo $cat['id']; ?>" 
                                                <?php echo (isset($_POST['category_id']) && $_POST['category_id'] == $cat['id']) ? 'selected' : ''; ?>>
                                            <?php echo htmlspecialchars($cat['name']); ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            
                            <!-- Description -->
                            <div class="form-group full-width">
                                <label for="description">Description *</label>
                                <textarea id="description" 
                                         name="description" 
                                         rows="6" 
                                         required 
                                         class="form-input" 
                                         placeholder="Provide a detailed description of the service..."><?php echo isset($_POST['description']) ? htmlspecialchars($_POST['description']) : ''; ?></textarea>
                            </div>
                            
                            <!-- Features -->
                            <div class="form-group full-width">
                                <label for="features">Features (one per line)</label>
                                <textarea id="features" 
                                         name="features" 
                                         rows="8" 
                                         placeholder="Enter each feature on a new line&#10;Example:&#10;Feature 1&#10;Feature 2&#10;Feature 3" 
                                         class="form-input"><?php echo isset($_POST['features']) ? htmlspecialchars($_POST['features']) : ''; ?></textarea>
                            </div>
                            
                            <!-- Image Upload -->
                            <div class="form-group full-width">
                                <label for="image">Service Image</label>
                                <div class="file-upload-area" id="uploadArea">
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

                        <!-- Actions -->
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Add Service</button>
                            <a href="manage-services.php" class="btn btn-secondary">Cancel</a>
                            <a href="test-database.php" class="btn btn-secondary" style="background: #17a2b8; color: white;">Test Database</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <script>
    // File upload preview and drag & drop
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput    = document.getElementById('image');
        const uploadArea   = document.getElementById('uploadArea');
        const imagePreview = document.querySelector('.image-preview');

        if (fileInput && uploadArea) {
            fileInput.addEventListener('change', handleFileSelect);
            uploadArea.addEventListener('dragover', handleDragOver);
            uploadArea.addEventListener('dragleave', handleDragLeave);
            uploadArea.addEventListener('drop', handleDrop);
        }

        function handleFileSelect(e) {
            const file = e.target.files[0];
            if (file && file.type.startsWith('image/')) {
                displayImagePreview(file);
            }
        }

        function handleDragOver(e) {
            e.preventDefault();
            e.stopPropagation();
            uploadArea.classList.add('drag-over');
        }

        function handleDragLeave(e) {
            e.preventDefault();
            e.stopPropagation();
            uploadArea.classList.remove('drag-over');
        }

        function handleDrop(e) {
            e.preventDefault();
            e.stopPropagation();
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

        window.removeImage = function() {
            fileInput.value = '';
            imagePreview.innerHTML = '';
            uploadArea.classList.remove('has-image');
            uploadArea.classList.remove('drag-over');
        }
    });
    </script>

    <?php include 'includes/admin-footer.php'; ?>
</body>
</html>