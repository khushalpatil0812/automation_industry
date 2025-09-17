<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="mb-4">
                    <h5 class="text-warning fw-bold mb-3">
                        <i class="fas fa-cogs me-2"></i>AutomationPro
                    </h5>
                    <p class="text-light mb-4">Professional automation & industrial solutions tailored to your needs. We help businesses grow and succeed with robust, secure systems that drive innovation and efficiency.</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="LinkedIn">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Twitter">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-sm rounded-circle" style="width: 40px; height: 40px;" aria-label="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold text-warning mb-3">Quick Links</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="index.php" class="text-light text-decoration-none d-flex align-items-center">
                            <i class="fas fa-chevron-right me-2 text-warning" style="font-size: 0.7rem;"></i>Home
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="about.php" class="text-light text-decoration-none d-flex align-items-center">
                            <i class="fas fa-chevron-right me-2 text-warning" style="font-size: 0.7rem;"></i>About Us
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="services.php" class="text-light text-decoration-none d-flex align-items-center">
                            <i class="fas fa-chevron-right me-2 text-warning" style="font-size: 0.7rem;"></i>Services
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="contact.php" class="text-light text-decoration-none d-flex align-items-center">
                            <i class="fas fa-chevron-right me-2 text-warning" style="font-size: 0.7rem;"></i>Contact
                        </a>
                    </li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-warning mb-3">Contact Info</h6>
                <div class="mb-3">
                    <div class="d-flex align-items-start mb-2">
                        <i class="fas fa-map-marker-alt text-warning me-2 mt-1" style="font-size: 0.9rem;"></i>
                        <span class="text-light small">123 Automation Street<br>Industrial City, State 12345</span>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-phone text-warning me-2" style="font-size: 0.9rem;"></i>
                        <a href="tel:+15551234567" class="text-light text-decoration-none small">+1 (555) 123-4567</a>
                    </div>
                    <div class="d-flex align-items-center mb-2">
                        <i class="fas fa-envelope text-warning me-2" style="font-size: 0.9rem;"></i>
                        <a href="mailto:info@automationpro.com" class="text-light text-decoration-none small">info@automationpro.com</a>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock text-warning me-2" style="font-size: 0.9rem;"></i>
                        <span class="text-light small">Mon - Fri: 9AM - 6PM</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold text-warning mb-3">Newsletter</h6>
                <p class="text-light mb-3 small">Get product updates, insights and automation tips delivered to your inbox.</p>
                <form action="#" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Enter your email" required>
                        <button class="btn btn-warning" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
                <small class="text-muted">We respect your privacy. Unsubscribe anytime.</small>
            </div>
        </div>

        <hr class="my-4 border-secondary opacity-25">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light small">
                    &copy; <span id="current-year">2024</span> AutomationPro. All rights reserved.
                </p>
            </div>
            <div class="col-md-6 text-md-end mt-2 mt-md-0">
                <div class="d-flex justify-content-md-end gap-3 flex-wrap">
                    <a href="#" class="text-light text-decoration-none small">Privacy Policy</a>
                    <a href="#" class="text-light text-decoration-none small">Terms of Service</a>
                    <a href="#" class="text-light text-decoration-none small">Cookie Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Back to top button -->
    <button class="btn btn-warning position-fixed bottom-0 end-0 m-3 rounded-circle shadow" 
            id="backToTop" style="display: none; width: 50px; height: 50px;" aria-label="Back to top">
        <i class="fas fa-arrow-up"></i>
    </button>
</footer>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Set current year
    document.getElementById('current-year').textContent = new Date().getFullYear();

    // Back to top functionality
    const backToTopBtn = document.getElementById('backToTop');
    
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.style.display = 'block';
        } else {
            backToTopBtn.style.display = 'none';
        }
    });
    
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

</body>
</html>
