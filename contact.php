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

<main>
    <section class="page-header">
        <div class="container" style="text-align:center; margin-bottom:2rem;">
            <h1>Contact Us</h1>
            <p>Get in touch with our team for professional business solutions</p>
        </div>
    </section>

    <section class="contact-section">
        <div class="container" style="display:flex; justify-content:center;">
            <div class="contact-form-container" style="max-width:480px; width:100%;">
                
                <?php if ($message): ?>
                    <div class="message <?php echo $message_type; ?>" style="margin-bottom:1rem; padding:0.75rem; border-radius:6px; background-color:<?php echo $message_type === 'success' ? '#d1fae5' : '#fee2e2'; ?>; color:<?php echo $message_type === 'success' ? '#065f46' : '#b91c1c'; ?>;">
                        <?php echo htmlspecialchars($message); ?>
                    </div>
                <?php endif; ?>

                <form class="contact-form" method="POST">
                    <div class="form-group">
                        <label for="name">Name *</label>
                        <input type="text" id="name" name="name" placeholder="Your Name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" placeholder="Your Email" required>
                    </div>

                    <div class="form-group">
                        <label for="subject">Subject *</label>
                        <input type="text" id="subject" name="subject" placeholder="Subject" required>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
