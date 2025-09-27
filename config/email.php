<?php
/**
 * Email Configuration
 * Configure your email settings here
 */

// Email Settings
define('SMTP_HOST', 'smtp.gmail.com'); // Change to your SMTP host
define('SMTP_PORT', 587); // SMTP Port (587 for TLS, 465 for SSL)
define('SMTP_USERNAME', 'sonawanekunal289@gmail.com'); // Your email address
define('SMTP_PASSWORD', 'laps oony xkga xzal'); // Your email password or app password
define('SMTP_ENCRYPTION', 'tls'); // 'tls' or 'ssl'

// Email Settings for basic PHP mail()
define('FROM_EMAIL', 'sonawanekunal289@gmail.com'); // Your website email
define('FROM_NAME', 'AutomationPro Contact Form'); // Your website name
define('ADMIN_EMAIL', 'sonawanekunal289@gmail.com'); // Use your actual email

// Email Templates
define('EMAIL_TEMPLATE_DIR', __DIR__ . '/../email-templates/');

/**
 * Email Class for sending emails
 */
class EmailService {
    
    /**
     * Send email using PHP's built-in mail function
     */
    public static function sendContactEmail($name, $email, $subject, $message) {
        $to = ADMIN_EMAIL;
        $email_subject = "New Contact Form Submission: " . $subject;
        
        // Create email headers
        $headers = [
            'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
            'Reply-To: ' . $name . ' <' . $email . '>',
            'X-Mailer: PHP/' . phpversion(),
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8'
        ];
        
        // Create email body
        $email_body = self::getContactEmailTemplate($name, $email, $subject, $message);
        
        // Send email
        $result = mail($to, $email_subject, $email_body, implode("\r\n", $headers));
        
        // Send confirmation email to user
        if ($result) {
            self::sendConfirmationEmail($name, $email, $subject);
        }
        
        return $result;
    }
    
    /**
     * Send confirmation email to user
     */
    public static function sendConfirmationEmail($name, $email, $subject) {
        $email_subject = "Thank you for contacting AutomationPro - We'll be in touch!";
        
        $headers = [
            'From: ' . FROM_NAME . ' <' . FROM_EMAIL . '>',
            'X-Mailer: PHP/' . phpversion(),
            'MIME-Version: 1.0',
            'Content-Type: text/html; charset=UTF-8'
        ];
        
        $email_body = self::getConfirmationEmailTemplate($name, $subject);
        
        return mail($email, $email_subject, $email_body, implode("\r\n", $headers));
    }
    
    /**
     * Get contact email template
     */
    private static function getContactEmailTemplate($name, $email, $subject, $message) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>New Contact Form Submission</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #2d3558ff 0%, #41384bff 100%); color: white; padding: 20px; text-align: center; }
                .content { background: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
                .field { margin-bottom: 20px; }
                .label { font-weight: bold; color: #2d3558ff; }
                .value { margin-top: 5px; padding: 10px; background: white; border-left: 4px solid #FF6B35; }
                .footer { background: #333; color: white; padding: 15px; text-align: center; font-size: 12px; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🏭 New Contact Form Submission</h2>
                    <p>AutomationPro Website</p>
                </div>
                <div class='content'>
                    <div class='field'>
                        <div class='label'>👤 Name:</div>
                        <div class='value'>" . htmlspecialchars($name) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>📧 Email:</div>
                        <div class='value'>" . htmlspecialchars($email) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>📋 Project Type:</div>
                        <div class='value'>" . htmlspecialchars($subject) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>💬 Message:</div>
                        <div class='value'>" . nl2br(htmlspecialchars($message)) . "</div>
                    </div>
                    <div class='field'>
                        <div class='label'>⏰ Submitted:</div>
                        <div class='value'>" . date('F j, Y, g:i a') . "</div>
                    </div>
                </div>
                <div class='footer'>
                    <p>This email was sent from the AutomationPro contact form.</p>
                </div>
            </div>
        </body>
        </html>";
    }
    
    /**
     * Get confirmation email template
     */
    private static function getConfirmationEmailTemplate($name, $subject) {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='UTF-8'>
            <title>Thank you for contacting AutomationPro</title>
            <style>
                body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; }
                .container { max-width: 600px; margin: 0 auto; padding: 20px; }
                .header { background: linear-gradient(135deg, #2d3558ff 0%, #41384bff 100%); color: white; padding: 30px; text-align: center; }
                .content { background: #f9f9f9; padding: 30px; border: 1px solid #ddd; }
                .highlight { background: #FF6B35; color: white; padding: 15px; border-radius: 5px; text-align: center; margin: 20px 0; }
                .footer { background: #333; color: white; padding: 20px; text-align: center; }
                .contact-info { background: white; padding: 15px; border-radius: 5px; margin: 15px 0; }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h2>🚀 Thank You for Your Interest!</h2>
                    <p>AutomationPro - Industrial Automation Solutions</p>
                </div>
                <div class='content'>
                    <p>Dear " . htmlspecialchars($name) . ",</p>
                    
                    <p>Thank you for reaching out to AutomationPro regarding <strong>" . htmlspecialchars($subject) . "</strong>. We've received your inquiry and our team of automation experts is reviewing your requirements.</p>
                    
                    <div class='highlight'>
                        <h3>⚡ What Happens Next?</h3>
                        <p>Our automation specialists will review your project details and contact you within <strong>24 hours</strong> to discuss your specific needs and provide a customized solution.</p>
                    </div>
                    
                    <p>In the meantime, here are some ways to learn more about our services:</p>
                    <ul>
                        <li>📱 Visit our website: <a href='#'>www.automationpro.com</a></li>
                        <li>📞 Call us directly: <strong>+1 (555) 123-4567</strong></li>
                        <li>📧 Email us: <strong>info@automationpro.com</strong></li>
                    </ul>
                    
                    <div class='contact-info'>
                        <h4>🏢 Our Office</h4>
                        <p>123 Automation Street<br>
                        Industrial City, State 12345<br>
                        Mon - Fri: 9AM - 6PM</p>
                    </div>
                </div>
                <div class='footer'>
                    <p><strong>AutomationPro</strong> - Transforming Industries with Smart Automation</p>
                    <p style='font-size: 11px; opacity: 0.8;'>This is an automated confirmation email. Please do not reply directly to this message.</p>
                </div>
            </div>
        </body>
        </html>";
    }
}
?>