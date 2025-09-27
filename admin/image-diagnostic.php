<?php
require_once '../config/config.php';
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Service.php';

$admin = new Admin();
$service = new Service();

// Check if logged in
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

// Get all services to test image paths
$services = $service->getAllServices();

$page_title = "Image Path Diagnostic";
include 'includes/admin-header.php';
?>

<style>
.diagnostic-container {
    padding: 2rem 0;
}

.service-test {
    background: white;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 1rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.service-test h4 {
    color: #333;
    margin-bottom: 0.5rem;
}

.image-test {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 1rem;
    align-items: start;
}

.image-preview {
    width: 200px;
    height: 150px;
    border: 2px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f8f9fa;
}

.image-preview img {
    max-width: 100%;
    max-height: 100%;
    object-fit: cover;
}

.image-info {
    font-family: monospace;
    font-size: 0.9rem;
}

.path-check {
    margin: 0.5rem 0;
    padding: 0.5rem;
    border-radius: 4px;
}

.path-check.found {
    background: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
}

.path-check.not-found {
    background: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
}

.breadcrumb {
    background: #f8f9fa;
    padding: 1rem;
    border-radius: 8px;
    margin-bottom: 2rem;
}
</style>

<div class="diagnostic-container">
    <div class="container-fluid">
        <div class="breadcrumb">
            <h2><i class="fas fa-bug"></i> Image Path Diagnostic Tool</h2>
            <p>This tool helps diagnose image path issues by testing different storage locations for each service.</p>
        </div>

        <?php foreach ($services as $svc): ?>
        <div class="service-test">
            <h4>Service #<?php echo $svc['id']; ?>: <?php echo htmlspecialchars($svc['title']); ?></h4>
            
            <div class="image-test">
                <div class="image-preview">
                    <?php
                    $image_found = false;
                    $working_path = '';
                    
                    if (!empty($svc['image'])) {
                        // All images should be in public/services/ directory
                        if (strpos($svc['image'], 'public/') === 0) {
                            // Image path already includes 'public/' prefix
                            $test_path = '../' . $svc['image'];
                        } else {
                            // Assume it's just the filename, prepend the directory
                            $test_path = '../public/services/' . $svc['image'];
                        }
                        
                        if (file_exists($test_path)) {
                            $working_path = $test_path;
                            $image_found = true;
                        }
                    }
                    ?>
                    
                    <?php if ($image_found): ?>
                        <img src="<?php echo htmlspecialchars($working_path); ?>" alt="Service Image">
                    <?php else: ?>
                        <div style="text-align: center; color: #666;">
                            <i class="fas fa-image" style="font-size: 2rem; margin-bottom: 0.5rem;"></i>
                            <br>No Image
                        </div>
                    <?php endif; ?>
                </div>
                
                <div class="image-info">
                    <strong>Database Value:</strong> 
                    <code><?php echo htmlspecialchars($svc['image'] ?? 'NULL'); ?></code>
                    <br><br>
                    
                    <strong>Path Tests:</strong><br>
                    
                    <?php if (!empty($svc['image'])): ?>
                        <?php
                        // Simplified path checking - only public/services/
                        if (strpos($svc['image'], 'public/') === 0) {
                            $final_path = '../' . $svc['image'];
                            $path_type = 'Standard path (with public/ prefix)';
                        } else {
                            $final_path = '../public/services/' . $svc['image'];
                            $path_type = 'Filename only (added public/services/ prefix)';
                        }
                        
                        $exists = file_exists($final_path);
                        ?>
                        <div class="path-check <?php echo $exists ? 'found' : 'not-found'; ?>">
                            <strong><?php echo $path_type; ?>:</strong><br>
                            <code><?php echo htmlspecialchars($final_path); ?></code><br>
                            <?php echo $exists ? '✅ Found' : '❌ Not Found'; ?>
                            <?php if ($exists): ?>
                                <br><small>Size: <?php echo formatBytes(filesize($final_path)); ?></small>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Show what the new system would generate -->
                        <div class="path-check" style="background: #e7f3ff; border-color: #bee5eb; color: #0c5460;">
                            <strong>📝 Note:</strong> New uploads will store images as:<br>
                            <code>public/services/<?php echo preg_replace('/[^a-zA-Z0-9\-_]/', '-', pathinfo($svc['image'], PATHINFO_FILENAME)); ?>.<?php echo pathinfo($svc['image'], PATHINFO_EXTENSION); ?></code>
                        </div>
                    <?php else: ?>
                        <div class="path-check not-found">
                            <strong>No image data in database</strong>
                        </div>
                    <?php endif; ?>
                    
                    <br>
                    <strong>Status:</strong> 
                    <span class="badge <?php echo $svc['is_active'] ? 'bg-success' : 'bg-danger'; ?>">
                        <?php echo $svc['is_active'] ? 'Active' : 'Inactive'; ?>
                    </span>
                    
                    <br><br>
                    <strong>Category:</strong> <?php echo htmlspecialchars($svc['category_name'] ?? 'Uncategorized'); ?>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

        <div class="mt-4">
            <a href="view-service.php?id=<?php echo $services[0]['id'] ?? 1; ?>" class="btn btn-primary">
                <i class="fas fa-eye"></i> Test View Service Page
            </a>
            <a href="manage-services.php" class="btn btn-secondary">
                <i class="fas fa-list"></i> Back to Manage Services
            </a>
        </div>
    </div>
</div>

<?php
function formatBytes($size, $precision = 2) {
    $units = array('B', 'KB', 'MB', 'GB', 'TB');
    for ($i = 0; $size > 1024 && $i < count($units) - 1; $i++) {
        $size /= 1024;
    }
    return round($size, $precision) . ' ' . $units[$i];
}
?>

<?php include 'includes/admin-footer.php'; ?>