<?php
require_once 'config/config.php';
<<<<<<< HEAD
require_once 'config/email.php';
=======
require_once 'config/database.php';
require_once 'classes/Category.php';

>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
$page_title = 'Contact';

// Initialize database connection and Category class
$db = $pdo; // Use the $pdo connection from database.php
$categories = [];

try {
    if ($db) {
        $category = new Category($db);
        $categories = $category->getAllCategories();
    }
} catch (Exception $e) {
    // If there's an error fetching categories, use fallback options
    error_log("Error fetching categories: " . $e->getMessage());
}

// Handle URL parameters for messages (from redirect)
$message = '';
$message_type = '';
$form_data = [];

if (isset($_GET['status'])) {
    if ($_GET['status'] === 'success') {
        $message = 'Thank you for your message! We will get back to you soon.';
        $message_type = 'success';
    } elseif ($_GET['status'] === 'error') {
        $message = 'Please fill in all required fields.';
        $message_type = 'error';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message_text = trim($_POST['message'] ?? '');
    
<<<<<<< HEAD
    // Store form data for repopulation if needed
    $form_data = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message_text
    ];
    
    // Validation
    $errors = [];
    
    if (!$name) {
        $errors[] = 'Name is required.';
    } elseif (strlen($name) < 2) {
        $errors[] = 'Name must be at least 2 characters long.';
    }
    
    if (!$email) {
        $errors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    
    if (!$subject) {
        $errors[] = 'Project type is required.';
    }
    
    if (!$message_text) {
        $errors[] = 'Project details are required.';
    } elseif (strlen($message_text) < 10) {
        $errors[] = 'Please provide more details about your project (at least 10 characters).';
    }
    
    // If no errors, attempt to send email
    if (empty($errors)) {
        try {
            $email_sent = EmailService::sendContactEmail($name, $email, $subject, $message_text);
            
            if ($email_sent) {
                $message = '<i class="fas fa-check-circle me-2"></i><strong>Success!</strong> Your message has been sent successfully. We\'ll contact you within 24 hours to discuss your automation needs.';
                $message_type = 'success';
                $form_data = []; // Clear form data on success
            } else {
                $message = '<i class="fas fa-exclamation-triangle me-2"></i><strong>Email Error:</strong> There was a problem sending your message. Please try again or contact us directly at <a href="tel:+15551234567" class="text-decoration-none"><strong>+1 (555) 123-4567</strong></a>.';
                $message_type = 'error';
            }
        } catch (Exception $e) {
            $message = '<i class="fas fa-exclamation-triangle me-2"></i><strong>System Error:</strong> Unable to process your request. Please contact us directly at <a href="mailto:info@automationpro.com" class="text-decoration-none"><strong>info@automationpro.com</strong></a>.';
            $message_type = 'error';
            
            // Log error for debugging (in production, use proper logging)
            error_log("Contact form error: " . $e->getMessage());
        }
    } else {
        $message = '<i class="fas fa-exclamation-triangle me-2"></i><strong>Please fix the following issues:</strong><ul class="mb-0 mt-2"><li>' . implode('</li><li>', $errors) . '</li></ul>';
        $message_type = 'error';
=======
    if ($name && $email && $subject && $message_text) {
        // Here you can add code to save the message to database or send email
        
        // Redirect to prevent form resubmission
        header('Location: contact.php?status=success');
        exit();
    } else {
        // Redirect with error status
        header('Location: contact.php?status=error');
        exit();
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
    }
}

include 'includes/header.php';
?>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Enhanced Contact Page Styles -->
<style>
:root {
    --contact-primary: #2d3558ff;
    --contact-secondary: #41384bff;
    --contact-accent: #3c323dff;
    --contact-success: #4facfe;
    --contact-warning: #2b4f37ff;
    --contact-danger: #fa709a;
    --contact-dark: #1a1a2e;
    --contact-light: #16213e;
    --contact-white: #eee;
    --contact-gray: #0f3460;
    --shadow-soft: 0 10px 40px rgba(0,0,0,0.1);
    --shadow-strong: 0 20px 60px rgba(0,0,0,0.15);
    --gradient-primary: linear-gradient(135deg, var(--contact-primary) 0%, var(--contact-secondary) 100%);
    --gradient-accent: linear-gradient(135deg, var(--contact-accent) 0%, var(--contact-primary) 100%);
    --gradient-success: linear-gradient(135deg, var(--contact-success) 0%, var(--contact-warning) 100%);
}

body {
    font-family: 'Inter', sans-serif;
    background: var(--contact-dark);
    color: var(--contact-white);
}

.contact-hero {
    background: var(--gradient-primary);
    position: relative;
    overflow: hidden;
    min-height: 60vh;
    display: flex;
    align-items: center;
}

.contact-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" fill="rgba(255,255,255,0.1)"><polygon points="1000,0 1000,100 0,100"/></svg>');
    background-size: cover;
}

.contact-hero .container {
    position: relative;
    z-index: 2;
}

.hero-title {
    font-family: 'Space Grotesk', sans-serif;
    font-size: 4rem;
    font-weight: 700;
    text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    margin-bottom: 1.5rem;
    background: linear-gradient(45deg, #fff, #f0f0f0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: 1.4rem;
    font-weight: 400;
    opacity: 0.95;
    line-height: 1.6;
}

.contact-section {
    background: var(--contact-dark);
    position: relative;
    padding: 100px 0;
}

.contact-card {
    background: var(--contact-light);
    border-radius: 24px;
    box-shadow: var(--shadow-strong);
    border: 1px solid rgba(255,255,255,0.1);
    backdrop-filter: blur(10px);
    transition: all 0.4s ease;
    overflow: hidden;
    position: relative;
}

.contact-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--gradient-primary);
}

.contact-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 80px rgba(102, 126, 234, 0.15);
}

.info-card {
    background: var(--contact-light);
    border-radius: 20px;
    padding: 2rem;
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.3s ease;
    height: 100%;
}

.info-card:hover {
    transform: translateY(-5px);
    border-color: var(--contact-primary);
    box-shadow: var(--shadow-soft);
}

.info-icon {
    width: 70px;
    height: 70px;
    border-radius: 20px;
    background: var(--gradient-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 1.5rem;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
}

.info-card:hover .info-icon {
    transform: scale(1.1) rotate(5deg);
}

.form-group {
    margin-bottom: 2rem;
    position: relative;
}

.form-label {
    font-weight: 600;
    color: var(--contact-white);
    margin-bottom: 0.75rem;
    font-size: 1rem;
    display: block;
}

.form-control-modern {
    background: rgba(255,255,255,0.05);
    border: 2px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    padding: 1rem 1.5rem;
    color: var(--contact-white);
    font-size: 1rem;
    transition: all 0.3s ease;
    width: 100%;
}

.form-control-modern:focus {
    background: rgba(255,255,255,0.08);
    border-color: var(--contact-primary);
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    outline: none;
    transform: translateY(-2px);
}

.form-control-modern::placeholder {
    color: rgba(255,255,255,0.5);
}

/* Enhanced Select Dropdown Styling */
.form-control-modern select,
select.form-control-modern {
    background-color: rgba(255,255,255,0.05) !important;
    color: var(--contact-white) !important;
    cursor: pointer;
}

.form-control-modern option {
    background-color: var(--contact-light) !important;
    color: var(--contact-white) !important;
    padding: 0.75rem !important;
    border: none !important;
}

.form-control-modern option:hover,
.form-control-modern option:focus,
.form-control-modern option:checked {
    background-color: var(--contact-primary) !important;
    color: white !important;
}

.form-control-modern option:disabled {
    background-color: rgba(255,255,255,0.1) !important;
    color: rgba(255,255,255,0.3) !important;
}

/* Dropdown arrow styling */
select.form-control-modern {
    background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTQgNkw4IDEwTDEyIDYiIHN0cm9rZT0iI2ZmZmZmZiIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiLz4KPHN2Zz4K') !important;
    background-repeat: no-repeat !important;
    background-position: right 1.5rem center !important;
    background-size: 16px 16px !important;
    appearance: none !important;
    -webkit-appearance: none !important;
    -moz-appearance: none !important;
}

/* Focus states for select */
select.form-control-modern:focus {
    background-color: rgba(255,255,255,0.08) !important;
    border-color: var(--contact-primary) !important;
    box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1) !important;
}

/* Mobile Safari specific fixes */
@supports (-webkit-touch-callout: none) {
    select.form-control-modern {
        background-color: rgba(255,255,255,0.05) !important;
    }
    
    select.form-control-modern option {
        background-color: #1a1a2e !important;
        color: white !important;
    }
}

.input-icon {
    position: absolute;
    right: 1.5rem;
    top: 50%;
    transform: translateY(-50%);
    color: rgba(255,255,255,0.4);
    transition: all 0.3s ease;
    pointer-events: none;
}

.form-group:focus-within .input-icon {
    color: var(--contact-primary);
    transform: translateY(-50%) scale(1.1);
}

.btn-modern {
    background: var(--gradient-primary);
    border: none;
    border-radius: 16px;
    padding: 1.2rem 3rem;
    font-weight: 600;
    font-size: 1.1rem;
    color: white;
    transition: all 0.3s ease;
    box-shadow: var(--shadow-soft);
    position: relative;
    overflow: hidden;
}

.btn-modern::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
    transition: left 0.5s ease;
}

.btn-modern:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 40px rgba(102, 126, 234, 0.4);
}

.btn-modern:hover::before {
    left: 100%;
}

.floating-animation {
    animation: floating 6s ease-in-out infinite;
}

@keyframes floating {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
}

.quick-contact-card {
    background: var(--contact-light);
    border-radius: 20px;
    padding: 2.5rem 2rem;
    text-align: center;
    border: 1px solid rgba(255,255,255,0.1);
    transition: all 0.4s ease;
    height: 100%;
    position: relative;
    overflow: hidden;
}

.quick-contact-card::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(102, 126, 234, 0.05) 0%, transparent 70%);
    transition: all 0.5s ease;
    transform: scale(0);
}

.quick-contact-card:hover::before {
    transform: scale(1);
}

.quick-contact-card:hover {
    transform: translateY(-10px);
    border-color: var(--contact-primary);
    box-shadow: var(--shadow-strong);
}

.contact-icon {
    width: 80px;
    height: 80px;
    border-radius: 24px;
    background: var(--gradient-accent);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    box-shadow: var(--shadow-soft);
    transition: all 0.3s ease;
    position: relative;
    z-index: 2;
}

.quick-contact-card:hover .contact-icon {
    transform: scale(1.1) rotate(-5deg);
}

.fade-in {
    opacity: 0;
    transform: translateY(30px);
    animation: fadeInUp 0.8s ease forwards;
}

.fade-in-delay-1 { animation-delay: 0.1s; }
.fade-in-delay-2 { animation-delay: 0.2s; }
.fade-in-delay-3 { animation-delay: 0.3s; }
.fade-in-delay-4 { animation-delay: 0.4s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-modern {
    border-radius: 16px;
    border: none;
    padding: 1.5rem;
    margin-bottom: 2rem;
    font-weight: 500;
    box-shadow: var(--shadow-soft);
    position: relative;
    opacity: 1;
    transform: translateY(0);
    transition: all 0.5s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.alert-modern.fade-out {
    opacity: 0;
    transform: translateY(-20px);
    max-height: 0;
    padding: 0;
    margin: 0;
    overflow: hidden;
}

.alert-modern .alert-content {
    display: flex;
    align-items: center;
    flex: 1;
}

.alert-modern .alert-close {
    background: none;
    border: none;
    color: inherit;
    font-size: 1.5rem;
    cursor: pointer;
    padding: 0;
    margin-left: 1rem;
    opacity: 0.7;
    transition: opacity 0.3s ease;
    width: 30px;
    height: 30px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.alert-modern .alert-close:hover {
    opacity: 1;
    background: rgba(255, 255, 255, 0.1);
}

.alert-countdown {
    position: absolute;
    bottom: 0;
    left: 0;
    height: 3px;
    background: rgba(255, 255, 255, 0.3);
    border-radius: 0 0 16px 16px;
    animation: countdown 5s linear forwards;
}

@keyframes countdown {
    from { width: 100%; }
    to { width: 0%; }
}

.alert-success-modern {
    background: linear-gradient(135deg, rgba(79, 172, 254, 0.1), rgba(67, 233, 123, 0.1));
    color: var(--contact-warning);
    border-left: 4px solid var(--contact-warning);
}

.alert-danger-modern {
    background: linear-gradient(135deg, rgba(250, 112, 154, 0.1), rgba(255, 99, 99, 0.1));
    color: var(--contact-danger);
    border-left: 4px solid var(--contact-danger);
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-subtitle {
        font-size: 1.1rem;
    }
    
    .contact-section {
        padding: 60px 0;
    }
    
<<<<<<< HEAD
    .contact-card {
        margin: 0 1rem;
    }
    
    .info-card {
        margin-bottom: 1.5rem;
        padding: 1.5rem;
    }
    
    .quick-contact-card {
        margin-bottom: 1.5rem;
        padding: 2rem 1.5rem;
    }
    
    .form-control-modern {
        font-size: 16px; /* Prevents zoom on iOS */
    }
    
    .btn-modern {
        font-size: 1rem;
        padding: 1rem 2rem;
    }
}

@media (max-width: 576px) {
    .contact-hero {
        min-height: 50vh;
        padding: 2rem 0;
    }
    
    .hero-title {
        font-size: 2rem;
    }
    
    .hero-subtitle {
        font-size: 1rem;
    }
    
    .contact-card .p-5 {
        padding: 2rem !important;
    }
    
    .info-card {
        padding: 1.5rem 1rem;
    }
    
    .info-icon, .contact-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
    }
    
    .quick-contact-card {
        padding: 1.5rem 1rem;
    }
    
    .form-group {
        margin-bottom: 1.5rem;
    }
    
    .alert-modern {
        padding: 1rem;
        font-size: 0.9rem;
=======
    /* Enhanced mobile dropdown styling */
    select.form-control-modern {
        font-size: 16px; /* Prevent zoom on iOS */
    }
    
    select.form-control-modern option {
        padding: 0.5rem !important;
        font-size: 14px !important;
    }
}

/* Additional fixes for better dropdown visibility */
@media (max-width: 480px) {
    select.form-control-modern {
        padding: 0.875rem 3rem 0.875rem 1rem;
        background-size: 14px 14px !important;
        background-position: right 1rem center !important;
    }
}

/* Dark theme specific enhancements */
@media (prefers-color-scheme: dark) {
    select.form-control-modern option {
        background-color: #1a1a2e !important;
        color: #ffffff !important;
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
    }
}
</style>

<main>
    <!-- Enhanced Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-10">
                    <h1 class="hero-title fade-in">Let's Build Something Amazing Together</h1>
                    <p class="hero-subtitle fade-in fade-in-delay-1">
                        Ready to transform your business with cutting-edge automation? 
                        Our expert team is here to turn your vision into reality.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row g-5 align-items-start">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <div class="fade-in fade-in-delay-2">
                        <h2 class="mb-4" style="font-family: 'Space Grotesk', sans-serif; font-weight: 600; font-size: 2.5rem;">
                            Get In Touch
                        </h2>
                        <p class="fs-5 mb-5 opacity-75" style="line-height: 1.7;">
                            Whether you need industrial automation, smart manufacturing solutions, 
                            or custom control systems, we're here to help you succeed.
                        </p>
                    </div>
                    
                    <div class="info-card fade-in fade-in-delay-3 floating-animation">
                        <div class="info-icon">
                            <i class="fas fa-map-marker-alt fs-3 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Visit Our Office</h4>
                        <p class="opacity-75 mb-0">
                            123 Innovation Drive<br>
                            Tech District, Industrial City<br>
                            State 12345, USA
                        </p>
                    </div>
                    
                    <div class="info-card fade-in fade-in-delay-4 mt-4">
                        <div class="info-icon" style="background: var(--gradient-success);">
                            <i class="fas fa-phone fs-3 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Call Us</h4>
                        <p class="opacity-75 mb-2">Speak directly with our automation experts</p>
                        <a href="tel:+15551234567" class="text-decoration-none" style="color: var(--contact-success); font-weight: 600;">
                            +1 (555) 123-4567
                        </a>
                    </div>
                    
                    <div class="info-card fade-in fade-in-delay-4 mt-4">
                        <div class="info-icon" style="background: var(--gradient-accent);">
                            <i class="fas fa-envelope fs-3 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-2">Email Us</h4>
                        <p class="opacity-75 mb-2">Get detailed project information</p>
                        <a href="mailto:info@automationpro.com" class="text-decoration-none" style="color: var(--contact-accent); font-weight: 600;">
                            info@automationpro.com
                        </a>
                    </div>
                </div>
                
                <!-- Enhanced Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-card fade-in fade-in-delay-3">
                        <div class="p-5">
                            <h3 class="mb-4" style="font-family: 'Space Grotesk', sans-serif; font-weight: 600; font-size: 2rem;">
                                Start Your Project
                            </h3>
                            
                            <?php if ($message): ?>
                                <div id="alertMessage" class="alert-modern <?php echo $message_type === 'success' ? 'alert-success-modern' : 'alert-danger-modern'; ?>">
                                    <div class="alert-content">
                                        <i class="fas fa-<?php echo $message_type === 'success' ? 'check-circle' : 'exclamation-triangle'; ?> me-2"></i>
                                        <?php echo htmlspecialchars($message); ?>
                                    </div>
                                    <button type="button" class="alert-close" onclick="dismissAlert()" aria-label="Close">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    <div class="alert-countdown"></div>
                                </div>
                            <?php endif; ?>

                            <form method="POST" class="needs-validation" novalidate>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Full Name <span style="color: var(--contact-danger);">*</span></label>
                                            <input type="text" name="name" class="form-control-modern" 
<<<<<<< HEAD
                                                   placeholder="Enter your full name" required
                                                   value="<?php echo htmlspecialchars($form_data['name'] ?? ''); ?>">
=======
                                                   placeholder="Enter your full name" required>
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Address <span style="color: var(--contact-danger);">*</span></label>
                                            <input type="email" name="email" class="form-control-modern" 
<<<<<<< HEAD
                                                   placeholder="your.email@company.com" required
                                                   value="<?php echo htmlspecialchars($form_data['email'] ?? ''); ?>">
=======
                                                   placeholder="your.email@company.com" required>
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
                                            <i class="fas fa-envelope input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Project Type <span style="color: var(--contact-danger);">*</span></label>
<<<<<<< HEAD
                                            <select name="subject" class="form-control-modern" required style="appearance: none; background-color: black; background-repeat: no-repeat; background-position: right 1.5rem center;">
                                                <option value="">Select your project type...</option>
                                                <option value="Industrial Automation" <?php echo (($form_data['subject'] ?? '') === 'Industrial Automation') ? 'selected' : ''; ?>>Industrial Automation</option>
                                                <option value="Smart Manufacturing" <?php echo (($form_data['subject'] ?? '') === 'Smart Manufacturing') ? 'selected' : ''; ?>>Smart Manufacturing</option>
                                                <option value="Process Control" <?php echo (($form_data['subject'] ?? '') === 'Process Control') ? 'selected' : ''; ?>>Process Control Systems</option>
                                                <option value="Robotics Integration" <?php echo (($form_data['subject'] ?? '') === 'Robotics Integration') ? 'selected' : ''; ?>>Robotics Integration</option>
                                                <option value="Custom Solutions" <?php echo (($form_data['subject'] ?? '') === 'Custom Solutions') ? 'selected' : ''; ?>>Custom Solutions</option>
                                                <option value="Technical Support" <?php echo (($form_data['subject'] ?? '') === 'Technical Support') ? 'selected' : ''; ?>>Technical Support</option>
=======
                                            <select name="subject" class="form-control-modern" required>
                                                <option value="">Select your project type...</option>
                                                <?php if (!empty($categories)): ?>
                                                    <?php foreach ($categories as $cat): ?>
                                                        <option value="<?php echo htmlspecialchars($cat['name']); ?>">
                                                            <?php echo htmlspecialchars($cat['name']); ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <!-- Fallback options if no categories are found -->
                                                    <option value="Industrial Automation">Industrial Automation</option>
                                                    <option value="Smart Manufacturing">Smart Manufacturing</option>
                                                    <option value="Process Control">Process Control Systems</option>
                                                    <option value="Robotics Integration">Robotics Integration</option>
                                                    <option value="Custom Solutions">Custom Solutions</option>
                                                    <option value="Technical Support">Technical Support</option>
                                                <?php endif; ?>
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
                                            </select>
                                            <i class="fas fa-cog input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Project Details <span style="color: var(--contact-danger);">*</span></label>
                                            <textarea name="message" class="form-control-modern" rows="6" 
                                                      placeholder="Tell us about your automation needs, current challenges, expected outcomes, timeline, and budget range..." 
<<<<<<< HEAD
                                                      required style="resize: vertical; min-height: 150px;"><?php echo htmlspecialchars($form_data['message'] ?? ''); ?></textarea>
=======
                                                      required style="resize: vertical; min-height: 150px;"></textarea>
>>>>>>> 16ef633cf137cad3091e28c8c87e33e0c73dbd35
                                            <i class="fas fa-comment-dots input-icon" style="top: 2rem;"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="btn-modern w-100">
                                            <i class="fas fa-rocket me-2"></i>
                                            Send Project Request
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Options -->
    <section class="py-5" style="background: var(--contact-light);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3 fade-in" style="font-family: 'Space Grotesk', sans-serif; font-weight: 600; font-size: 2.5rem;">
                    Multiple Ways to Connect
                </h2>
                <p class="fs-5 opacity-75 fade-in fade-in-delay-1">
                    Choose the method that works best for you
                </p>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="quick-contact-card fade-in fade-in-delay-2">
                        <div class="contact-icon">
                            <i class="fas fa-phone fs-2 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Immediate Consultation</h4>
                        <p class="opacity-75 mb-4">
                            Speak with our automation experts right now. 
                            Get instant answers to your technical questions.
                        </p>
                        <a href="tel:+15551234567" class="btn btn-outline-light rounded-pill px-4 py-2">
                            <i class="fas fa-phone me-2"></i>Call Now
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="quick-contact-card fade-in fade-in-delay-3">
                        <div class="contact-icon" style="background: var(--gradient-success);">
                            <i class="fas fa-video fs-2 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Virtual Demo</h4>
                        <p class="opacity-75 mb-4">
                            Schedule a personalized virtual demonstration 
                            of our automation solutions.
                        </p>
                        <button class="btn btn-outline-light rounded-pill px-4 py-2">
                            <i class="fas fa-calendar me-2"></i>Book Demo
                        </button>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6 mx-auto">
                    <div class="quick-contact-card fade-in fade-in-delay-4">
                        <div class="contact-icon" style="background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);">
                            <i class="fas fa-file-alt fs-2 text-white"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Download Resources</h4>
                        <p class="opacity-75 mb-4">
                            Get our comprehensive automation guide 
                            and case studies for your industry.
                        </p>
                        <button class="btn btn-outline-light rounded-pill px-4 py-2">
                            <i class="fas fa-download me-2"></i>Download
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
// Alert auto-dismiss functionality
function dismissAlert() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        alert.classList.add('fade-out');
        setTimeout(() => {
            alert.style.display = 'none';
        }, 500);
    }
}

// Auto-dismiss alert after 5 seconds
document.addEventListener('DOMContentLoaded', function() {
    const alert = document.getElementById('alertMessage');
    if (alert) {
        // Auto-dismiss after 5 seconds
        setTimeout(function() {
            dismissAlert();
        }, 5000);
    }
});

// Bootstrap form validation
(function() {
    'use strict';
    window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
</script>

<?php include 'includes/footer.php'; ?>