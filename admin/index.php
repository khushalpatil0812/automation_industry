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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin-login.css">
</head>
<body class="login-page">
    <div class="floating-elements">
        <div class="floating-element float-1"></div>
        <div class="floating-element float-2"></div>
        <div class="floating-element float-3"></div>
        <div class="floating-element float-4"></div>
    </div>
    
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <div class="login-logo">
                    <div class="logo-icon">⚙️</div>
                    <h1>Admin Portal</h1>
                </div>
                <p>Automation Industry Management</p>
            </div>
            
            <?php if ($error): ?>
                <div class="error-message">
                    <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            
            <form class="login-form" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required class="animated-input" placeholder="Enter your username">
                    <i class="fas fa-user input-icon"></i>
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required class="animated-input" placeholder="Enter your password">
                    <i class="fas fa-lock input-icon"></i>
                </div>
                
                <button type="submit" class="btn btn-primary">
                    <span>Login</span>
                    <div class="btn-loader"></div>
                </button>
            </form>
            
            <div class="login-footer">
                <a href="../index.php"><i class="fas fa-arrow-left"></i> Back to Website</a>
            </div>
        </div>
    </div>
    
    <script>
        document.querySelector('.login-form').addEventListener('submit', function(e) {
            const btn = this.querySelector('.btn-primary');
            btn.classList.add('loading');
            
            // Add a slight delay to allow the animation to be visible
            setTimeout(() => {
                if (!document.querySelector('.error-message')) {
                    btn.classList.add('loading');
                }
            }, 100);
        });
        
        // Add input animations
        const inputs = document.querySelectorAll('.animated-input');
        inputs.forEach(input => {
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', () => {
                if (input.value === '') {
                    input.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>