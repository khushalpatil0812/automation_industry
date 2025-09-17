<footer class="bg-dark text-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-primary mb-3">BusinessPro</h5>
                <p class="text-light-emphasis">Professional automation & industrial solutions tailored to your needs. We help businesses grow and succeed with robust, secure systems.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="btn btn-outline-light btn-sm" aria-label="LinkedIn">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm" aria-label="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm" aria-label="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="mb-3">Services</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="services.php?category=Web Development" class="text-light-emphasis text-decoration-none">Web Development</a></li>
                    <li class="mb-2"><a href="services.php?category=Mobile Apps" class="text-light-emphasis text-decoration-none">Mobile Apps</a></li>
                    <li class="mb-2"><a href="services.php?category=Digital Marketing" class="text-light-emphasis text-decoration-none">Digital Marketing</a></li>
                    <li class="mb-2"><a href="services.php?category=Consulting" class="text-light-emphasis text-decoration-none">Consulting</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="mb-3">Contact</h6>
                <div class="text-light-emphasis">
                    <p class="mb-2">
                        <i class="fas fa-envelope me-2"></i>
                        <a href="mailto:info@businesspro.com" class="text-light-emphasis text-decoration-none">info@businesspro.com</a>
                    </p>
                    <p class="mb-2">
                        <i class="fas fa-phone me-2"></i>
                        <a href="tel:+15551234567" class="text-light-emphasis text-decoration-none">+1 (555) 123-4567</a>
                    </p>
                    <p class="mb-0">
                        <i class="fas fa-map-marker-alt me-2"></i>
                        123 Business St, City, State 12345
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="mb-3">Subscribe</h6>
                <p class="text-light-emphasis mb-3">Get product updates, insights and tips — twice a month.</p>
                <form action="#" method="post" class="d-flex flex-column gap-2">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="you@company.com" required>
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <hr class="my-4 border-secondary">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-light-emphasis">&copy; <span id="current-year">2024</span> BusinessPro. All rights reserved.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <a href="about.php" class="text-light-emphasis text-decoration-none me-3">About</a>
                <a href="contact.php" class="text-light-emphasis text-decoration-none me-3">Contact</a>
                <a href="services.php" class="text-light-emphasis text-decoration-none">All Services</a>
            </div>
        </div>
    </div>

    <!-- Back to top button -->
    <button class="btn btn-primary position-fixed bottom-0 end-0 m-3" id="backToTop" style="display: none;" aria-label="Back to top">
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
