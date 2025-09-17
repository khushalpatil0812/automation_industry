<?php
require_once 'config/config.php';
$page_title = 'About Us - Automation Industry Solutions';
include 'includes/header.php';
?>

<main class="pt-5">
    <!-- Hero Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-6" data-aos="fade-right">
                    <span class="badge bg-warning text-dark px-3 py-2 fs-6 mb-3">Our Journey</span>
                    <h1 class="display-4 fw-bold mb-4">Pioneering the Future of <span class="text-warning">Industrial Automation</span></h1>
                    <p class="fs-5 mb-4">Founded in 2010, our journey began with a vision to revolutionize industrial automation. What started as a small team of passionate engineers has grown into a global leader in automation solutions.</p>
                    
                    <div class="row g-3 mt-4">
                        <div class="col-md-6">
                            <div class="card bg-transparent border-light text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="fw-bold text-warning">2010</h4>
                                    <p class="mb-0 small">Company Founded</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card bg-transparent border-light text-white">
                                <div class="card-body text-center p-3">
                                    <h4 class="fw-bold text-warning">500+</h4>
                                    <p class="mb-0 small">Projects Delivered</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="text-center">
                        <img src="public/hero/industrial-automation-hero.jpg" 
                             alt="Industrial Automation" 
                             class="img-fluid rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge bg-primary text-white px-3 py-2 fs-6 mb-3">Core Values</span>
                    <h2 class="display-5 fw-bold text-dark mb-3">What Drives Us Forward</h2>
                    <p class="fs-5 text-muted col-lg-8 mx-auto">Our fundamental principles that guide every decision and innovation</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-lightbulb text-white fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Innovation</h4>
                            <p class="text-muted">Constantly pushing boundaries to create cutting-edge solutions that transform industries</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-handshake text-white fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Collaboration</h4>
                            <p class="text-muted">Working together with clients and partners to achieve exceptional results</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-star text-white fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Excellence</h4>
                            <p class="text-muted">Delivering the highest quality in everything we do, exceeding expectations</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="flip-left" data-aos-delay="400">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-leaf text-white fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-3">Sustainability</h4>
                            <p class="text-muted">Creating solutions that protect our environment for future generations</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge bg-secondary text-white px-3 py-2 fs-6 mb-3">Our Team</span>
                    <h2 class="display-5 fw-bold text-dark mb-3">The Innovators Behind Our Success</h2>
                    <p class="fs-5 text-muted col-lg-8 mx-auto">Meet the experts who make automation dreams a reality</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">John Anderson</h5>
                            <p class="text-primary fw-semibold mb-2">CEO & Founder</p>
                            <p class="text-muted small">15+ years of experience in industrial automation and strategic business development</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">Sarah Mitchell</h5>
                            <p class="text-success fw-semibold mb-2">CTO</p>
                            <p class="text-muted small">Expert in AI and robotics with PhD in Mechanical Engineering</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="Team Member" 
                                     class="rounded-circle shadow"
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1">David Chen</h5>
                            <p class="text-warning fw-semibold mb-2">Lead Engineer</p>
                            <p class="text-muted small">Specialist in IoT integration and process optimization systems</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Global Presence Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-up">
                    <span class="badge bg-info text-white px-3 py-2 fs-6 mb-3">Global Impact</span>
                    <h2 class="display-5 fw-bold text-dark mb-4">Worldwide Presence</h2>
                    
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                                <h3 class="fw-bold text-primary mb-1">25+</h3>
                                <p class="text-muted mb-0 small">Countries</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                                <h3 class="fw-bold text-success mb-1">150+</h3>
                                <p class="text-muted mb-0 small">Partners</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="text-center p-3 bg-white rounded-3 shadow-sm">
                                <h3 class="fw-bold text-warning mb-1">500k+</h3>
                                <p class="text-muted mb-0 small">Users</p>
                            </div>
                        </div>
                    </div>
                    
                    <p class="mt-4 text-muted">Our solutions are deployed across industries worldwide, from automotive manufacturing in Germany to semiconductor facilities in Asia, helping companies achieve unprecedented levels of efficiency and innovation.</p>
                </div>
                <div class="col-lg-6" data-aos="zoom-in">
                    <div class="text-center">
                        <img src="public/freepics/engineer-cooperation-male-female-technician-maintenance-control-relay-robot-arm-system-welding-with-tablet-laptop-control-quality-operate-process-work-heavy-industry-40-manufacturing-factory.jpg" 
                             alt="Global Presence" 
                             class="img-fluid rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Ready to Transform Your Industry?</h2>
                    <p class="fs-5 mb-0">Join us in shaping the future of manufacturing with innovative automation solutions that drive success.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="contact.php" class="btn btn-warning btn-lg px-4 py-3 fw-semibold me-3">
                        <i class="fas fa-phone me-2"></i>Get Started
                    </a>
                    <a href="services.php" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                        <i class="fas fa-list me-2"></i>Our Services
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>