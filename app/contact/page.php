<?php
// app/contact/page.php
include '../../includes/header.php';
?>

<div class="contact-form">
    <span class="heading">Contact Us</span>
    <p>Get in touch with our team for professional business solutions</p>
  <form method="post" action="../../contact.php">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="form-group">
            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit">Send</button>
    </form>
</div>

<?php
include '../../includes/footer.php';
?>
