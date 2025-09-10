<?php
session_start();
require_once '../config/database.php';
require_once '../classes/Admin.php';
require_once '../classes/Category.php';

$admin = new Admin($pdo);
if (!$admin->isLoggedIn()) {
    header('Location: index.php');
    exit;
}

$category = new Category($pdo);
$message = '';

// Handle form submissions
if ($_POST) {
    if (isset($_POST['add_category'])) {
        $name = trim($_POST['name']);
        $description = trim($_POST['description']);
        $icon = trim($_POST['icon']);
        
        if ($category->createCategory($name, $description, $icon)) {
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
}

$categories = $category->getCategoryWithServiceCount();
?>

<?php include 'includes/admin-header.php'; ?>

<div class="admin-content">
    <div class="content-header">
        <h1>Manage Categories</h1>
        <p>Add, edit, and manage service categories</p>
    </div>

    <?php echo $message; ?>

    <!-- Add Category Form -->
    <div class="card">
        <div class="card-header">
            <h2>Add New Category</h2>
        </div>
        <div class="card-body">
            <form method="POST" class="form">
                <div class="form-group">
                    <label for="name">Category Name *</label>
                    <input type="text" id="name" name="name" required>
                </div>
                
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="icon">Icon (optional)</label>
                    <input type="text" id="icon" name="icon" placeholder="e.g., code, smartphone, trending-up">
                    <small>Use Lucide icon names</small>
                </div>
                
                <button type="submit" name="add_category" class="btn btn-primary">Add Category</button>
            </form>
        </div>
    </div>

    <!-- Categories List -->
    <div class="card">
        <div class="card-header">
            <h2>Existing Categories</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Icon</th>
                            <th>Services Count</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $cat): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($cat['name']); ?></td>
                            <td><?php echo htmlspecialchars($cat['description']); ?></td>
                            <td><?php echo htmlspecialchars($cat['icon']); ?></td>
                            <td><?php echo $cat['service_count']; ?></td>
                            <td>
                                <a href="edit-category.php?id=<?php echo $cat['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                                <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure? This will remove the category from all services.')">
                                    <input type="hidden" name="category_id" value="<?php echo $cat['id']; ?>">
                                    <button type="submit" name="delete_category" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/admin-footer.php'; ?>
