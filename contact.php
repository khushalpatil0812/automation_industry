<?php
require_once 'config/config.php';
$page_title = 'Contact';

$message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message_text = trim($_POST['message'] ?? '');
    
    if ($name && $email && $subject && $message_text) {
        $message = 'Thank you for your message! We will get back to you soon.';
        $message_type = 'success';
    } else {
        $message = 'Please fill in all required fields.';
        $message_type = 'error';
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
                                <div class="alert-modern <?php echo $message_type === 'success' ? 'alert-success-modern' : 'alert-danger-modern'; ?>">
                                    <i class="fas fa-<?php echo $message_type === 'success' ? 'check-circle' : 'exclamation-triangle'; ?> me-2"></i>
                                    <?php echo htmlspecialchars($message); ?>
                                </div>
                            <?php endif; ?>

                            <form method="POST" class="needs-validation" novalidate>
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Full Name <span style="color: var(--contact-danger);">*</span></label>
                                            <input type="text" name="name" class="form-control-modern" 
                                                   placeholder="Enter your full name" required
                                                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                                            <i class="fas fa-user input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Email Address <span style="color: var(--contact-danger);">*</span></label>
                                            <input type="email" name="email" class="form-control-modern" 
                                                   placeholder="your.email@company.com" required
                                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                                            <i class="fas fa-envelope input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Project Type <span style="color: var(--contact-danger);">*</span></label>
                                            <select name="subject" class="form-control-modern" required style="appearance: none; background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTYiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAxNiAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTQgNkw4IDEwTDEyIDYiIHN0cm9rZT0iIzk5OTk5OSIgc3Ryb2tlLXdpZHRoPSIxLjUiIHN0cm9rZS1saW5lY2FwPSJyb3VuZCIgc3Ryb2tlLWxpbmVqb2luPSJyb3VuZCIvPgo8L3N2Zz4K'); background-repeat: no-repeat; background-position: right 1.5rem center;">
                                                <option value="">Select your project type...</option>
                                                <option value="Industrial Automation" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Industrial Automation') ? 'selected' : ''; ?>>Industrial Automation</option>
                                                <option value="Smart Manufacturing" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Smart Manufacturing') ? 'selected' : ''; ?>>Smart Manufacturing</option>
                                                <option value="Process Control" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Process Control') ? 'selected' : ''; ?>>Process Control Systems</option>
                                                <option value="Robotics Integration" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Robotics Integration') ? 'selected' : ''; ?>>Robotics Integration</option>
                                                <option value="Custom Solutions" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Custom Solutions') ? 'selected' : ''; ?>>Custom Solutions</option>
                                                <option value="Technical Support" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Technical Support') ? 'selected' : ''; ?>>Technical Support</option>
                                            </select>
                                            <i class="fas fa-cog input-icon"></i>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label class="form-label">Project Details <span style="color: var(--contact-danger);">*</span></label>
                                            <textarea name="message" class="form-control-modern" rows="6" 
                                                      placeholder="Tell us about your automation needs, current challenges, expected outcomes, timeline, and budget range..." 
                                                      required style="resize: vertical; min-height: 150px;"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
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