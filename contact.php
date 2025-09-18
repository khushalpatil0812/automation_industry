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

<main class="pt-5">
    <!-- Page Header -->
    <section class="py-5 text-white" style="background-color: #212529;">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center" data-aos="fade-up">
                    <h1 class="display-4 fw-bold mb-3">Contact Us</h1>
                    <p class="fs-5 col-lg-8 mx-auto">Get in touch with our team for professional automation solutions tailored to your business needs</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row g-5">
                <!-- Contact Information -->
                <div class="col-lg-4" data-aos="fade-right">
                    <h3 class="fw-bold mb-4 text-white">Get In Touch</h3>
                    <p class="text-light opacity-75 mb-4">Ready to transform your operations? Our team of experts is here to help you find the perfect automation solution.</p>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; background: var(--gradient-primary) !important;">
                            <i class="fas fa-map-marker-alt text-white"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Address</h6>
                            <p class="text-light opacity-75 mb-0">123 Automation Street<br>Industrial City, State 12345</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-success bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-phone text-white"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Phone</h6>
                            <p class="text-light opacity-75 mb-0">+1 (555) 123-4567</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-warning bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-envelope text-white"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Email</h6>
                            <p class="text-light opacity-75 mb-0">info@automationpro.com</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-4">
                        <div class="bg-info bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1 text-white">Business Hours</h6>
                            <p class="text-light opacity-75 mb-0">Mon - Fri: 9:00 AM - 6:00 PM<br>Sat: 10:00 AM - 4:00 PM</p>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Form -->
                <div class="col-lg-8" data-aos="fade-left">
                    <div class="card border-0 shadow-lg" style="background-color: #343a40;">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-4 text-white">Send us a Message</h3>
                            
                            <?php if ($message): ?>
                                <div class="alert alert-<?php echo $message_type === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                                    <i class="fas fa-<?php echo $message_type === 'success' ? 'check-circle' : 'exclamation-triangle'; ?> me-2"></i>
                                    <?php echo htmlspecialchars($message); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <form method="POST" class="needs-validation" novalidate>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="name" class="form-label fw-semibold text-white">Full Name <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: #495057; border-color: #6c757d; color: white;"><i class="fas fa-user"></i></span>
                                            <input type="text" class="form-control" id="name" name="name" 
                                                   placeholder="Your Full Name" required
                                                   value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>"
                                                   style="background-color: #495057; border-color: #6c757d; color: white;">
                                            <div class="invalid-feedback">
                                                Please provide your name.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="email" class="form-label fw-semibold text-white">Email Address <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: #495057; border-color: #6c757d; color: white;"><i class="fas fa-envelope"></i></span>
                                            <input type="email" class="form-control" id="email" name="email" 
                                                   placeholder="your.email@company.com" required
                                                   value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>"
                                                   style="background-color: #495057; border-color: #6c757d; color: white;">
                                            <div class="invalid-feedback">
                                                Please provide a valid email address.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="subject" class="form-label fw-semibold text-white">Subject <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text" style="background-color: #495057; border-color: #6c757d; color: white;"><i class="fas fa-tag"></i></span>
                                            <select class="form-select" id="subject" name="subject" required
                                                    style="background-color: #495057; border-color: #6c757d; color: white;">
                                                <option value="">Choose a subject...</option>
                                                <option value="General Inquiry" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'General Inquiry') ? 'selected' : ''; ?>>General Inquiry</option>
                                                <option value="Service Request" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Service Request') ? 'selected' : ''; ?>>Service Request</option>
                                                <option value="Technical Support" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Technical Support') ? 'selected' : ''; ?>>Technical Support</option>
                                                <option value="Partnership" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Partnership') ? 'selected' : ''; ?>>Partnership Opportunity</option>
                                                <option value="Quote Request" <?php echo (isset($_POST['subject']) && $_POST['subject'] === 'Quote Request') ? 'selected' : ''; ?>>Quote Request</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                Please select a subject.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="message" class="form-label fw-semibold text-white">Message <span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <span class="input-group-text align-self-start pt-2" style="background-color: #495057; border-color: #6c757d; color: white;"><i class="fas fa-comment"></i></span>
                                            <textarea class="form-control" id="message" name="message" rows="6" 
                                                      placeholder="Tell us about your automation needs, project requirements, or any questions you have..." 
                                                      required
                                                      style="background-color: #495057; border-color: #6c757d; color: white;"><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                                            <div class="invalid-feedback">
                                                Please provide your message.
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-lg py-3 fw-semibold" style="background-color: var(--color-platinum); color: var(--color-gunmetal); border: none;">
                                                <i class="fas fa-paper-plane me-2"></i>Send Message
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm text-center h-100" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-phone text-white fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-3 text-white">Call Us</h5>
                            <p class="text-light opacity-75 mb-3">Speak directly with our automation experts</p>
                            <a href="tel:+15551234567" class="btn" style="color: var(--color-platinum); border: 1px solid var(--color-platinum); background: transparent;">
                                <i class="fas fa-phone me-2"></i>+1 (555) 123-4567
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm text-center h-100" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-envelope text-white fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-3 text-white">Email Us</h5>
                            <p class="text-light opacity-75 mb-3">Get detailed information via email</p>
                            <a href="mailto:info@automationpro.com" class="btn btn-outline-success">
                                <i class="fas fa-envelope me-2"></i>Send Email
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center h-100" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                <i class="fas fa-calendar text-white fs-4"></i>
                            </div>
                            <h5 class="fw-bold mb-3 text-white">Schedule Demo</h5>
                            <p class="text-light opacity-75 mb-3">Book a personalized demonstration</p>
                            <a href="#" class="btn btn-outline-warning">
                                <i class="fas fa-calendar me-2"></i>Book Demo
                            </a>
                        </div>
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