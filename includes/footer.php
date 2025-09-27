<footer class="position-relative overflow-hidden">
    <!-- Industrial Background Pattern -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="
        background: linear-gradient(135deg, #1a1d2e 0%, #353333ff 50%, #303032ff 100%);
        z-index: -2;
    "></div>
    
    <!-- Tech Pattern Overlay -->
    <div class="position-absolute top-0 start-0 w-100 h-100" style="
        background-image: 
            radial-gradient(circle at 20% 20%, rgba(70, 130, 180, 0.1) 2px, transparent 2px),
            radial-gradient(circle at 80% 80%, rgba(255, 107, 53, 0.1) 1px, transparent 1px),
            linear-gradient(45deg, rgba(216, 213, 219, 0.02) 25%, transparent 25%),
            linear-gradient(-45deg, rgba(216, 213, 219, 0.02) 25%, transparent 25%);
        background-size: 60px 60px, 40px 40px, 20px 20px, 20px 20px;
        z-index: -1;
    "></div>
    
    <!-- Animated Gears Background -->
    <div class="position-absolute top-0 start-0 w-100 h-100 d-none d-lg-block" style="z-index: -1;">
        <div class="position-absolute" style="
            top: 10%; 
            right: 5%; 
            width: 80px; 
            height: 80px; 
            opacity: 0.1;
            animation: rotate-slow 20s linear infinite;
        ">
            <i class="fas fa-cog" style="font-size: 80px; color: var(--color-steel-blue);"></i>
        </div>
        <div class="position-absolute" style="
            bottom: 15%; 
            left: 8%; 
            width: 60px; 
            height: 60px; 
            opacity: 0.08;
            animation: rotate-reverse 15s linear infinite;
        ">
            <i class="fas fa-cogs" style="font-size: 60px; color: var(--color-industrial-orange);"></i>
        </div>
    </div>

    <div class="container py-5 position-relative">
        <div class="row g-4">
            <!-- Company Info Section -->
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="100">
                <div class="footer-section">
                    <h5 class="footer-title fw-bold mb-3 d-flex align-items-center">
                        <i class="fas fa-cogs me-2 footer-brand-icon"></i>
                        AutomationPro
                    </h5>
                    <p class="footer-description text-light mb-4">
                        Professional automation & industrial solutions tailored to your needs. 
                        We help businesses grow and succeed with robust, secure systems that drive innovation and efficiency.
                    </p>
                    
                    <!-- Responsive Social Media Links -->
                    <div class="social-links-container d-flex flex-wrap gap-2 mb-3">
                        <a href="#" class="social-btn linkedin-btn" aria-label="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="social-btn twitter-btn" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-btn facebook-btn" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="social-btn instagram-btn" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                    
                    <!-- Industry Certifications -->
                    <div class="certifications-section">
                        <small class="text-muted d-block mb-2">Certified & Trusted</small>
                        <div class="d-flex flex-wrap gap-2 align-items-center">
                            <span class="certification-badge iso-badge">ISO 9001</span>
                            <span class="certification-badge industry-badge">Industry 4.0</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Links Section -->
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                <div class="footer-section">
                    <h6 class="footer-heading fw-bold mb-3">
                        Quick Links
                        <div class="heading-underline"></div>
                    </h6>
                    <ul class="footer-links list-unstyled">
                        <li class="footer-link-item">
                            <a href="index.php" class="footer-link">
                                <i class="fas fa-chevron-right link-icon"></i>
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="footer-link-item">
                            <a href="about.php" class="footer-link">
                                <i class="fas fa-chevron-right link-icon"></i>
                                <span>About Us</span>
                            </a>
                        </li>
                        <li class="footer-link-item">
                            <a href="services.php" class="footer-link">
                                <i class="fas fa-chevron-right link-icon"></i>
                                <span>Services</span>
                            </a>
                        </li>
                        <li class="footer-link-item">
                            <a href="contact.php" class="footer-link">
                                <i class="fas fa-chevron-right link-icon"></i>
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="col-xl-3 col-lg-5 col-md-6 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                <h6 class="fw-bold mb-3" style="
                    color: var(--color-platinum); 
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 1.1rem;
                    position: relative;
                ">
                    Contact Info
                    <div style="
                        position: absolute;
                        bottom: -5px;
                        left: 0;
                        width: 30px;
                        height: 2px;
                        background: linear-gradient(90deg, #FF6B35, #FFA500);
                        border-radius: 1px;
                    "></div>
                </h6>
                <div class="mb-3">
                    <div class="contact-item d-flex align-items-start mb-3">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div>
                            <span class="text-light small lh-lg">
                                123 Automation Street<br>
                                Industrial City, State 12345
                            </span>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-center mb-3">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div>
                            <a href="tel:+15551234567" class="footer-link text-decoration-none small">+1 (555) 123-4567</a>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-center mb-3">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div>
                            <a href="mailto:info@automationpro.com" class="footer-link text-decoration-none small">info@automationpro.com</a>
                        </div>
                    </div>
                    <div class="contact-item d-flex align-items-center">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div>
                            <span class="text-light small">Mon - Fri: 9AM - 6PM</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Newsletter Section -->
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <h6 class="fw-bold mb-3" style="
                    color: var(--color-platinum); 
                    font-family: 'Space Grotesk', sans-serif;
                    font-size: 1.1rem;
                    position: relative;
                ">
                    Newsletter
                    <div style="
                        position: absolute;
                        bottom: -5px;
                        left: 0;
                        width: 30px;
                        height: 2px;
                        background: linear-gradient(90deg, #FF6B35, #FFA500);
                        border-radius: 1px;
                    "></div>
                </h6>
                <p class="text-light mb-3 small lh-lg" style="opacity: 0.9;">
                    Get product updates, insights and automation tips delivered to your inbox.
                </p>
                <form action="#" method="post" class="newsletter-form">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control newsletter-input" placeholder="Enter your email" required style="
                            background: rgba(255, 255, 255, 0.1);
                            border: 1px solid rgba(216, 213, 219, 0.3);
                            color: white;
                            border-radius: 0.5rem 0 0 0.5rem;
                            padding: 0.75rem;
                        ">
                        <button class="btn newsletter-btn" type="submit" style="
                            background: linear-gradient(135deg, #FF6B35, #FFA500);
                            border: none;
                            color: white;
                            border-radius: 0 0.5rem 0.5rem 0;
                            padding: 0.75rem 1rem;
                            transition: all 0.3s ease;
                        ">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <small class="text-muted">We respect your privacy. Unsubscribe anytime.</small>
                
                <!-- Industry Stats -->
                <div class="mt-4 pt-3 border-top border-secondary border-opacity-25">
                    <div class="row text-center">
                        <div class="col-4">
                            <div class="stat-item">
                                <strong class="d-block text-light" style="font-size: 1.2rem;">500+</strong>
                                <small class="text-muted">Projects</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <strong class="d-block text-light" style="font-size: 1.2rem;">15+</strong>
                                <small class="text-muted">Years</small>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="stat-item">
                                <strong class="d-block text-light" style="font-size: 1.2rem;">24/7</strong>
                                <small class="text-muted">Support</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Separator with Animation -->
        <div class="separator-container my-4 position-relative">
            <hr class="border-secondary opacity-25">
            <div class="position-absolute top-50 start-50 translate-middle">
                <div style="
                    width: 40px;
                    height: 2px;
                    background: linear-gradient(90deg, #FF6B35, #FFA500);
                    border-radius: 1px;
                "></div>
            </div>
        </div>
        
        <!-- Copyright Section -->
        <div class="row align-items-center" data-aos="fade-up" data-aos-delay="500">
            <div class="col-md-6">
                <p class="mb-0 text-light small d-flex align-items-center">
                    <i class="fas fa-copyright me-2" style="color: var(--color-platinum);"></i>
                    <span id="current-year">2024</span> AutomationPro. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                <div class="d-flex justify-content-md-end gap-3 flex-wrap">
                    <a href="contact.php" class="footer-policy-link text-decoration-none small">
                        <i class="fas fa-shield-alt me-1"></i>Privacy Policy
                    </a>
                    <a href="contact.php" class="footer-policy-link text-decoration-none small">
                        <i class="fas fa-question-circle me-1"></i>Support
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Back to top button -->
    <button class="btn position-fixed bottom-0 end-0 m-3 back-to-top-btn" 
            id="backToTop" style="display: none;" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<style>
    /* Enhanced Footer Styles */
    @keyframes rotate-slow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    @keyframes rotate-reverse {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(-360deg); }
    }
    
    @keyframes rotate-gears {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* Social Media Buttons */
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        filter: brightness(1.1);
    }
    
    /* ===== RESPONSIVE FOOTER STYLES ===== */
    
    /* Base Footer Styles */
    .footer-section {
        padding: 0.5rem 0;
    }
    
    .footer-title {
        color: var(--color-platinum, #D8D5DB);
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(1.2rem, 3vw, 1.4rem);
        margin-bottom: 1rem;
    }
    
    .footer-brand-icon {
        background: linear-gradient(45deg, #FF6B35, #FFA500);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: rotate-gears 3s linear infinite;
        filter: drop-shadow(0 0 5px rgba(255, 107, 53, 0.3));
    }
    
    .footer-description {
        font-size: clamp(0.85rem, 2vw, 0.95rem);
        line-height: 1.6;
        opacity: 0.9;
        margin-bottom: 1.5rem;
    }
    
    .footer-heading {
        color: var(--color-platinum, #D8D5DB);
        font-family: 'Space Grotesk', sans-serif;
        font-size: clamp(1rem, 2.5vw, 1.1rem);
        position: relative;
        margin-bottom: 1rem;
    }
    
    .heading-underline {
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 30px;
        height: 2px;
        background: linear-gradient(90deg, #FF6B35, #FFA500);
        border-radius: 1px;
    }
    
    /* Social Media Links - Responsive */
    .social-links-container {
        justify-content: flex-start;
        margin-bottom: 1rem;
    }
    
    .social-btn {
        width: clamp(40px, 6vw, 45px);
        height: clamp(40px, 6vw, 45px);
        border-radius: 50%;
        border: none;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        transition: all 0.3s ease;
        font-size: clamp(0.9rem, 2vw, 1rem);
    }
    
    .linkedin-btn {
        background: linear-gradient(135deg, #0077B5, #00A0DC);
    }
    
    .twitter-btn {
        background: linear-gradient(135deg, #1DA1F2, #0E7EC8);
    }
    
    .facebook-btn {
        background: linear-gradient(135deg, #4267B2, #365899);
    }
    
    .instagram-btn {
        background: linear-gradient(135deg, #E4405F, #FD1D1D, #FCB045);
    }
    
    .social-btn:hover {
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        filter: brightness(1.1);
        color: white;
    }
    
    /* Certifications */
    .certifications-section {
        margin-top: 1rem;
    }
    
    .certification-badge {
        font-size: clamp(0.65rem, 1.5vw, 0.7rem);
        padding: 0.3rem 0.6rem;
        border-radius: 12px;
        font-weight: 600;
    }
    
    .iso-badge {
        background: linear-gradient(45deg, #28a745, #20c997);
        color: white;
    }
    
    .industry-badge {
        background: linear-gradient(45deg, #007bff, #0056b3);
        color: white;
    }
    
    /* Footer Links */
    .footer-links {
        margin: 0;
        padding: 0;
    }
    
    .footer-link-item {
        margin-bottom: 0.5rem;
    }
    
    .footer-link {
        color: var(--color-french-gray, #C5C3C6);
        text-decoration: none;
        display: flex;
        align-items: center;
        font-size: clamp(0.85rem, 2vw, 0.9rem);
        transition: all 0.3s ease;
        padding: 0.25rem 0;
    }
    
    .link-icon {
        font-size: 0.7rem;
        margin-right: 0.5rem;
        color: var(--color-industrial-orange, #FF6B35);
        transition: transform 0.3s ease;
    }
    
    .footer-link:hover {
        color: var(--color-platinum, #D8D5DB);
        transform: translateX(5px);
    }
    
    .footer-link:hover .link-icon {
        transform: translateX(3px);
        color: #FFA500;
    }
    
    /* Contact Items */
    .contact-item {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1rem;
        padding: 0.25rem 0;
    }
    
    .contact-icon {
        width: clamp(35px, 5vw, 40px);
        height: clamp(35px, 5vw, 40px);
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(70, 130, 180, 0.2));
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }
    
    .contact-icon i {
        color: var(--color-industrial-orange, #FF6B35);
        font-size: clamp(0.9rem, 2vw, 1rem);
    }
    
    .contact-item:hover .contact-icon {
        background: linear-gradient(135deg, rgba(255, 107, 53, 0.3), rgba(70, 130, 180, 0.3));
        transform: scale(1.1);
    }
    
    .contact-text {
        color: var(--color-french-gray, #C5C3C6);
        font-size: clamp(0.85rem, 2vw, 0.9rem);
        line-height: 1.5;
    }
    
    .contact-link {
        color: var(--color-french-gray, #C5C3C6);
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .contact-link:hover {
        color: var(--color-industrial-orange, #FF6B35);
    }
    
    /* Newsletter */
    .newsletter-input {
        background: rgba(255, 255, 255, 0.1) !important;
        border: 1px solid rgba(216, 213, 219, 0.3) !important;
        color: white !important;
        border-radius: 0.5rem 0 0 0.5rem !important;
        padding: clamp(0.6rem, 2vw, 0.75rem) !important;
        font-size: clamp(0.85rem, 2vw, 0.9rem) !important;
    }
    
    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.7) !important;
    }
    
    .newsletter-input:focus {
        background: rgba(255, 255, 255, 0.15) !important;
        border-color: var(--color-industrial-orange, #FF6B35) !important;
        box-shadow: 0 0 0 0.2rem rgba(255, 107, 53, 0.25) !important;
    }
    
    .newsletter-btn {
        background: linear-gradient(135deg, #FF6B35, #FFA500) !important;
        border: none !important;
        color: white !important;
        border-radius: 0 0.5rem 0.5rem 0 !important;
        padding: clamp(0.6rem, 2vw, 0.75rem) clamp(0.8rem, 2.5vw, 1rem) !important;
        transition: all 0.3s ease !important;
        font-size: clamp(0.9rem, 2vw, 1rem) !important;
    }
    
    .newsletter-btn:hover {
        background: linear-gradient(135deg, #FFA500, #FF6B35) !important;
        transform: translateY(-1px) !important;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3) !important;
    }
    
    /* Stats Section */
    .stat-item {
        text-align: center;
        padding: 0.5rem;
    }
    
    .stat-item strong {
        font-size: clamp(1rem, 3vw, 1.2rem) !important;
        color: var(--color-platinum, #D8D5DB) !important;
        font-weight: 700;
    }
    
    .stat-item small {
        font-size: clamp(0.7rem, 1.5vw, 0.8rem);
        color: var(--color-french-gray, #C5C3C6);
    }
    
    /* Copyright and Policy Links */
    .footer-policy-link {
        color: var(--color-french-gray, #C5C3C6);
        font-size: clamp(0.8rem, 1.8vw, 0.85rem);
        transition: color 0.3s ease;
        margin: 0 0.25rem;
    }
    
    .footer-policy-link:hover {
        color: var(--color-industrial-orange, #FF6B35);
    }
    
    /* Back to Top Button */
    .back-to-top-btn {
        width: clamp(45px, 6vw, 50px) !important;
        height: clamp(45px, 6vw, 50px) !important;
        border-radius: 50% !important;
        background: linear-gradient(135deg, #FF6B35, #FFA500) !important;
        color: white !important;
        border: none !important;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
        transition: all 0.3s ease !important;
        font-size: clamp(0.9rem, 2vw, 1rem) !important;
    }
    
    .back-to-top-btn:hover {
        transform: translateY(-3px) scale(1.1) !important;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
        background: linear-gradient(135deg, #FFA500, #FF6B35) !important;
        color: white !important;
    }
    
    /* ===== RESPONSIVE BREAKPOINTS ===== */
    
    /* Extra Small Devices (phones, 576px and down) */
    @media (max-width: 575.98px) {
        .container {
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .footer-section {
            padding: 1.5rem 0;
            text-align: center;
            margin-bottom: 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .footer-section:last-child {
            border-bottom: none;
        }
        
        .footer-title, .footer-heading {
            font-size: 1.2rem !important;
            margin-bottom: 1rem !important;
        }
        
        .footer-description {
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .social-links-container {
            justify-content: center;
            margin-bottom: 1.5rem;
            gap: 1rem !important;
        }
        
        .social-btn {
            width: 45px;
            height: 45px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .social-btn:hover {
            transform: translateY(-3px) scale(1.1);
        }
        
        .certifications-section {
            text-align: center;
        }
        
        .certification-badge {
            font-size: 0.8rem;
            padding: 0.3rem 0.8rem;
        }
        
        .footer-links {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-link {
            justify-content: center;
            padding: 0.75rem 0;
            font-size: 0.95rem;
            width: 100%;
            max-width: 200px;
        }
        
        .contact-item {
            justify-content: flex-start;
            text-align: left;
            margin-bottom: 1.5rem;
            padding: 0.5rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
        }
        
        .contact-icon {
            width: 40px;
            height: 40px;
            margin-right: 1rem;
            flex-shrink: 0;
        }
        
        .contact-icon i {
            font-size: 1rem;
        }
        
        .newsletter-form {
            max-width: 100%;
            margin: 0 auto;
        }
        
        .newsletter-input {
            margin-bottom: 1rem;
            font-size: 1rem;
            padding: 0.75rem;
        }
        
        .newsletter-btn {
            width: 100%;
            padding: 0.75rem;
            font-size: 1rem;
        }
        
        .stat-item {
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 8px;
        }
        
        .footer-policy-link {
            display: block;
            margin: 0.75rem 0;
            font-size: 0.9rem;
        }
        
        .back-to-top-btn {
            width: 50px !important;
            height: 50px !important;
            font-size: 1.1rem !important;
            bottom: 20px !important;
            right: 20px !important;
        }
        
        /* Fix column layouts on mobile */
        .row.g-4 {
            gap: 0 !important;
        }
        
        .col-xl-4, .col-lg-4, .col-md-6, .col-sm-12,
        .col-xl-2, .col-lg-3, .col-md-6, .col-sm-6,
        .col-xl-3, .col-lg-5, .col-md-6,
        .col-lg-3 {
            padding: 0 !important;
            margin-bottom: 0 !important;
        }
    }
    
    /* Small Devices (landscape phones, 576px to 767px) */
    @media (min-width: 576px) and (max-width: 767.98px) {
        .footer-section {
            padding: 1rem 0.5rem;
        }
        
        .social-btn {
            width: 38px;
            height: 38px;
            font-size: 0.85rem;
        }
        
        .contact-icon {
            width: 38px;
            height: 38px;
        }
        
        .newsletter-form {
            max-width: 320px;
        }
    }
    
    /* Medium Devices (tablets, 768px to 991px) */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .footer-section {
            padding: 1rem;
        }
        
        .social-btn {
            width: 42px;
            height: 42px;
            font-size: 0.9rem;
        }
        
        .contact-icon {
            width: 42px;
            height: 42px;
        }
        
        .newsletter-form {
            max-width: 100%;
        }
        
        /* Adjust columns for medium screens */
        .col-lg-2 {
            flex: 0 0 auto;
            width: 25%;
        }
        
        .col-lg-3 {
            flex: 0 0 auto;
            width: 37.5%;
        }
    }
    
    /* Large Devices (desktops, 992px to 1199px) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .social-btn {
            width: 44px;
            height: 44px;
            font-size: 0.95rem;
        }
        
        .contact-icon {
            width: 44px;
            height: 44px;
        }
    }
    
    /* Extra Large Devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .social-btn {
            width: 45px;
            height: 45px;
            font-size: 1rem;
        }
        
        .contact-icon {
            width: 45px;
            height: 45px;
        }
        
        .footer-section {
            padding: 1.5rem 1rem;
        }
    }
    
    /* Ultra-wide screens (1400px and up) */
    @media (min-width: 1400px) {
        .container {
            max-width: 1320px;
        }
        
        .footer-title {
            font-size: 1.5rem;
        }
        
        .footer-heading {
            font-size: 1.2rem;
        }
        
        .footer-description {
            font-size: 1rem;
        }
    }
    
    /* ===== ORIENTATION AND DEVICE SPECIFIC ===== */
    
    /* Landscape phones */
    @media (max-height: 600px) and (orientation: landscape) {
        .footer-section {
            padding: 0.5rem 0;
        }
        
        .social-links-container {
            margin-bottom: 0.5rem;
        }
        
        .contact-item {
            margin-bottom: 0.5rem;
        }
    }
    
    /* Touch devices */
    @media (hover: none) and (pointer: coarse) {
        .social-btn {
            min-width: 44px;
            min-height: 44px;
        }
        
        .footer-link {
            min-height: 44px;
            padding: 0.5rem 0;
        }
        
        .back-to-top-btn {
            min-width: 44px !important;
            min-height: 44px !important;
        }
        
        /* Remove hover effects on touch devices */
        .social-btn:hover,
        .footer-link:hover,
        .contact-item:hover .contact-icon,
        .newsletter-btn:hover,
        .back-to-top-btn:hover {
            transform: none;
            box-shadow: initial;
        }
        
        /* Add active states instead */
        .social-btn:active {
            transform: scale(0.95);
        }
        
        .footer-link:active {
            color: var(--color-industrial-orange, #FF6B35);
        }
    }
    
    /* High DPI displays */
    @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
        .footer-brand-icon {
            filter: drop-shadow(0 0 3px rgba(255, 107, 53, 0.5));
        }
        
        .social-btn {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }
    }
    
    /* Reduced motion */
    @media (prefers-reduced-motion: reduce) {
        .footer-brand-icon {
            animation: none;
        }
        
        .social-btn,
        .footer-link,
        .contact-icon,
        .newsletter-btn,
        .back-to-top-btn {
            transition: none;
        }
        
        .social-btn:hover,
        .footer-link:hover,
        .contact-item:hover .contact-icon,
        .newsletter-btn:hover,
        .back-to-top-btn:hover {
            transform: none;
        }
    }
    
    /* Dark mode preference */
    @media (prefers-color-scheme: dark) {
        .newsletter-input {
            background: rgba(0, 0, 0, 0.3) !important;
            border-color: rgba(255, 255, 255, 0.2) !important;
        }
        
        .contact-icon {
            background: linear-gradient(135deg, rgba(255, 107, 53, 0.3), rgba(70, 130, 180, 0.3));
        }
    }
    
    /* High contrast mode */
    @media (prefers-contrast: high) {
        .social-btn,
        .certification-badge,
        .newsletter-btn,
        .back-to-top-btn {
            border: 2px solid white;
        }
        
        .footer-link,
        .contact-link {
            border-bottom: 1px solid transparent;
        }
        
        .footer-link:hover,
        .contact-link:hover {
            border-bottom-color: white;
        }
    }
    
    /* Print styles */
    @media print {
        .social-links-container,
        .newsletter-form,
        .back-to-top-btn {
            display: none !important;
        }
        
        .footer-title,
        .footer-heading {
            color: black !important;
        }
        
        .footer-link,
        .contact-text {
            color: black !important;
        }
    }

    /* Footer Links */
    .footer-link {
        color: rgba(255, 255, 255, 0.8) !important;
        transition: all 0.3s ease;
        font-size: 0.9rem;
    }
    
    .footer-link:hover {
        color: var(--color-platinum) !important;
        transform: translateX(5px);
    }
    
    .footer-link .link-icon {
        color: var(--color-industrial-orange);
        font-size: 0.7rem;
        transition: all 0.3s ease;
    }
    
    .footer-link:hover .link-icon {
        color: var(--color-platinum);
        transform: translateX(3px);
    }
    
    /* Contact Items */
    .contact-item {
        transition: all 0.3s ease;
        padding: 0.5rem 0;
        border-radius: 0.25rem;
    }
    
    .contact-item:hover {
        background: rgba(255, 255, 255, 0.05);
        padding-left: 0.5rem;
        margin-left: -0.5rem;
    }
    
    .contact-icon {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--color-steel-blue), var(--color-electric-blue));
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 0.75rem;
        transition: all 0.3s ease;
        flex-shrink: 0;
    }
    
    .contact-icon i {
        color: white;
        font-size: 0.9rem;
    }
    
    .contact-item:hover .contact-icon {
        background: linear-gradient(135deg, var(--color-industrial-orange), #FFA500);
        transform: scale(1.1);
    }
    
    /* Newsletter Form */
    .newsletter-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    
    .newsletter-input:focus {
        background: rgba(255, 255, 255, 0.15);
        border-color: var(--color-industrial-orange);
        box-shadow: 0 0 15px rgba(255, 107, 53, 0.3);
        color: white;
    }
    
    .newsletter-btn:hover {
        background: linear-gradient(135deg, #FFA500, #FF6B35) !important;
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    }
    
    /* Stats Animation */
    .stat-item {
        transition: all 0.3s ease;
        padding: 0.5rem;
        border-radius: 0.25rem;
    }
    
    .stat-item:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateY(-2px);
    }
    
    /* Policy Links */
    .footer-policy-link {
        color: rgba(255, 255, 255, 0.7) !important;
        transition: all 0.3s ease;
        position: relative;
    }
    
    .footer-policy-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 1px;
        background: var(--color-industrial-orange);
        transition: width 0.3s ease;
    }
    
    .footer-policy-link:hover {
        color: var(--color-platinum) !important;
    }
    
    .footer-policy-link:hover::after {
        width: 100%;
    }
    
    /* Enhanced Back to Top Button */
    .back-to-top-btn {
        width: 55px;
        height: 55px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--color-industrial-orange), #FFA500);
        border: none;
        color: white;
        font-size: 1.2rem;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        transition: all 0.3s ease;
        z-index: 1000;
    }
    
    .back-to-top-btn:hover {
        background: linear-gradient(135deg, #FFA500, var(--color-industrial-orange));
        transform: translateY(-3px) scale(1.1);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
        color: white;
    }
    
    .back-to-top-btn:active {
        transform: translateY(-1px) scale(1.05);
    }
    
    /* Enhanced Mobile Responsiveness */
    @media (max-width: 768px) {
        .footer-section {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .social-btn {
            width: 42px;
            height: 42px;
            font-size: 1rem;
        }
        
        .contact-item {
            justify-content: center;
            text-align: left;
            max-width: 300px;
            margin: 0 auto 1rem;
            padding: 0.75rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }
        
        .contact-icon {
            width: 35px;
            height: 35px;
            margin-right: 1rem;
        }
        
        .contact-icon i {
            font-size: 0.9rem;
        }
        
        .newsletter-form {
            max-width: 320px;
            margin: 0 auto;
        }
        
        .back-to-top-btn {
            width: 50px;
            height: 50px;
            font-size: 1.1rem;
            bottom: 20px;
            right: 20px;
        }
        
        .footer-links {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .footer-link {
            width: 100%;
            max-width: 250px;
            justify-content: center;
            padding: 0.6rem 0;
        }
    }
</style>

<script>
    // Set current year
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Enhanced Back to top functionality
    const backToTopBtn = document.getElementById('backToTop');
    let isVisible = false;
    
    window.addEventListener('scroll', () => {
        const shouldShow = window.scrollY > 300;
        
        if (shouldShow && !isVisible) {
            backToTopBtn.style.display = 'block';
            setTimeout(() => {
                backToTopBtn.style.transform = 'scale(1)';
                backToTopBtn.style.opacity = '1';
            }, 10);
            isVisible = true;
        } else if (!shouldShow && isVisible) {
            backToTopBtn.style.transform = 'scale(0)';
            backToTopBtn.style.opacity = '0';
            setTimeout(() => {
                backToTopBtn.style.display = 'none';
            }, 300);
            isVisible = false;
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        // Add click animation
        backToTopBtn.style.transform = 'scale(0.9)';
        setTimeout(() => {
            backToTopBtn.style.transform = isVisible ? 'scale(1)' : 'scale(0)';
        }, 150);
        
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Initialize back to top button
    backToTopBtn.style.transform = 'scale(0)';
    backToTopBtn.style.opacity = '0';
    backToTopBtn.style.transition = 'all 0.3s ease';
    
    // Newsletter form enhancement
    document.addEventListener('DOMContentLoaded', function() {
        const newsletterForm = document.querySelector('.newsletter-form');
        const newsletterInput = document.querySelector('.newsletter-input');
        const newsletterBtn = document.querySelector('.newsletter-btn');
        
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Add loading state
                const originalHTML = newsletterBtn.innerHTML;
                newsletterBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
                newsletterBtn.disabled = true;
                
                // Simulate form submission
                setTimeout(() => {
                    newsletterBtn.innerHTML = '<i class="fas fa-check"></i>';
                    newsletterInput.value = '';
                    
                    setTimeout(() => {
                        newsletterBtn.innerHTML = originalHTML;
                        newsletterBtn.disabled = false;
                    }, 2000);
                }, 1500);
            });
        }
    });
    
    // Social media button enhancements
    document.addEventListener('DOMContentLoaded', function() {
        const socialBtns = document.querySelectorAll('.social-btn');
        
        socialBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    });
    
    // Contact item hover effects
    document.addEventListener('DOMContentLoaded', function() {
        const contactItems = document.querySelectorAll('.contact-item');
        
        contactItems.forEach(item => {
            item.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(5px)';
            });
            
            item.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    });
    
    // Intersection Observer for animation triggers
    if ('IntersectionObserver' in window) {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.6s ease-out forwards';
                }
            });
        }, observerOptions);
        
        // Observe footer elements
        document.querySelectorAll('footer [data-aos]').forEach(el => {
            observer.observe(el);
        });
    }
</script>

</body>
</html>
