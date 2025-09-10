<?php
require_once '../config/config.php';
require_once '../classes/Admin.php';

$admin = new Admin();

// Check if setup is needed
if ($admin->needsSetup()) {
    header('Location: setup.php');
    exit;
}

// Redirect if already logged in
if ($admin->isLoggedIn()) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    
    if ($admin->login($username, $password)) {
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Automation Industry</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
</head>
<body class="login-page">
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <!-- Added animated logo and enhanced styling -->
                <div class="login-logo">
                    <div class="logo-icon">⚙️</div>
                    <h1>Admin Portal</h1>
                </div>
                <p>Automation Industry Management</p>
            </div>
            
            <?php if ($error): ?>
                <div class="error-message animate-shake">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form class="login-form" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required class="animated-input">
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required class="animated-input">
                </div>
                
                <button type="submit" class="btn btn-primary btn-animated">
                    <span>Login</span>
                    <div class="btn-loader"></div>
                </button>
            </form>
            
            <div class="login-footer">
                <a href="../index.php">← Back to Website</a>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector('.login-form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.btn-primary');
            btn.classList.add('loading');
        });
    </script>
</body>
</html>
