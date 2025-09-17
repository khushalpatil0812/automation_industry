<?php
require_once 'config/config.php';
require_once 'classes/Service.php';
$page_title = 'Home - Automation Industry Solutions';
include 'includes/header.php';
?>

<main class="pt-5">
    <!-- Hero Carousel Section -->
    <section id="heroCarousel" class="carousel slide vh-100" data-bs-ride="carousel" data-bs-interval="5000">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        
        <div class="carousel-inner h-100">
            <!-- Slide 1 -->
            <div class="carousel-item active h-100 position-relative">
                <div class="position-absolute w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url('public/hero/industrial-automation-hero.jpg') center/cover;"></div>
                <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                    <div class="container text-center text-white" data-aos="fade-up">
                        <span class="badge bg-warning text-dark px-3 py-2 fs-6 mb-3">Industry 4.0 Solutions</span>
                        <h1 class="display-3 fw-bold mb-4">Transform Your <span class="text-warning">Industrial Operations</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto">Leading provider of cutting-edge automation solutions that revolutionize manufacturing processes and boost productivity</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="services.php" class="btn btn-warning btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-rocket me-2"></i>Explore Services
                            </a>
                            <a href="contact.php" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-phone me-2"></i>Get Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 -->
            <div class="carousel-item h-100 position-relative">
                <div class="position-absolute w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url('public/hero/Industry 4.0.jpg') center/cover;"></div>
                <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                    <div class="container text-center text-white" data-aos="fade-up">
                        <span class="badge bg-primary text-white px-3 py-2 fs-6 mb-3">Smart Manufacturing</span>
                        <h1 class="display-3 fw-bold mb-4">Advanced <span class="text-primary">Robotics & AI</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto">Harness the power of artificial intelligence and robotics to create intelligent, self-optimizing manufacturing systems</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="services.php" class="btn btn-primary btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-robot me-2"></i>AI Solutions
                            </a>
                            <a href="about.php" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-info-circle me-2"></i>Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 -->
            <div class="carousel-item h-100 position-relative">
                <div class="position-absolute w-100 h-100" style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.3)), url('public/hero/Header_background.jpg') center/cover;"></div>
                <div class="d-flex align-items-center justify-content-center h-100 position-relative">
                    <div class="container text-center text-white" data-aos="fade-up">
                        <span class="badge bg-success text-white px-3 py-2 fs-6 mb-3">Sustainable Future</span>
                        <h1 class="display-3 fw-bold mb-4">Green <span class="text-success">Technology Solutions</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto">Sustainable automation solutions that reduce environmental impact while maximizing operational efficiency</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="services.php" class="btn btn-success btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-leaf me-2"></i>Green Solutions
                            </a>
                            <a href="contact.php" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                                <i class="fas fa-calendar me-2"></i>Schedule Demo
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <!-- Key Metrics Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center mb-5" data-aos="fade-up">
                <div class="col-12">
                    <h2 class="display-5 fw-bold text-dark mb-3">Proven Track Record</h2>
                    <p class="fs-5 text-muted">Numbers that speak for our excellence in automation solutions</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-industry text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-primary mb-1">500+</h3>
                            <h5 class="fw-semibold mb-2">Projects Completed</h5>
                            <p class="text-muted small mb-0">Successfully delivered automation solutions worldwide</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-users text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-success mb-1">150+</h3>
                            <h5 class="fw-semibold mb-2">Happy Clients</h5>
                            <p class="text-muted small mb-0">Trusted by leading manufacturing companies</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-clock text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-warning mb-1">15+</h3>
                            <h5 class="fw-semibold mb-2">Years Experience</h5>
                            <p class="text-muted small mb-0">Decades of expertise in industrial automation</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow-sm h-100 text-center">
                        <div class="card-body p-4">
                            <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-trophy text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-info mb-1">98%</h3>
                            <h5 class="fw-semibold mb-2">Success Rate</h5>
                            <p class="text-muted small mb-0">Exceptional project delivery success rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge bg-primary text-white px-3 py-2 fs-6 mb-3">Why Choose Us</span>
                    <h2 class="display-5 fw-bold text-dark mb-3">Advanced Automation Features</h2>
                    <p class="fs-5 text-muted col-lg-8 mx-auto">Discover how our cutting-edge technology transforms manufacturing processes</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-primary bg-gradient rounded-3 p-3 me-3">
                                    <i class="fas fa-robot text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0">AI-Powered Robotics</h4>
                            </div>
                            <p class="text-muted mb-3">Intelligent robotic systems that learn and adapt to optimize manufacturing processes in real-time.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Machine Learning Integration</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Predictive Maintenance</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Quality Control Automation</li>
                            </ul>
                            <a href="services.php" class="btn btn-outline-primary btn-sm mt-2">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-gradient rounded-3 p-3 me-3">
                                    <i class="fas fa-network-wired text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0">IoT Integration</h4>
                            </div>
                            <p class="text-muted mb-3">Connect all your devices and systems for seamless data flow and centralized control.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Real-time Monitoring</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Cloud Connectivity</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Remote Access Control</li>
                            </ul>
                            <a href="services.php" class="btn btn-outline-success btn-sm mt-2">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-gradient rounded-3 p-3 me-3">
                                    <i class="fas fa-chart-line text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0">Analytics & Insights</h4>
                            </div>
                            <p class="text-muted mb-3">Advanced analytics to optimize performance and make data-driven decisions.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Performance Dashboards</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Predictive Analytics</li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i>Custom Reports</li>
                            </ul>
                            <a href="services.php" class="btn btn-outline-warning btn-sm mt-2">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge bg-secondary text-white px-3 py-2 fs-6 mb-3">Our Services</span>
                    <h2 class="display-5 fw-bold text-dark mb-3">Professional Solutions</h2>
                    <p class="fs-5 text-muted col-lg-8 mx-auto">Comprehensive automation services tailored to your industry needs</p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php
                $service = new Service();
                $services = $service->getActiveServices(6); // Get 6 services for preview
                
                if (!empty($services)):
                    foreach ($services as $index => $service_item):
                        $delay = ($index % 3 + 1) * 100; // Stagger animation delays
                ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden">
                            <div class="position-relative">
                                <img src="<?php echo htmlspecialchars($service_item['image']); ?>" 
                                     class="card-img-top" alt="<?php echo htmlspecialchars($service_item['title']); ?>" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge bg-primary"><?php echo htmlspecialchars($service_item['category_name'] ?? 'Service'); ?></span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3"><?php echo htmlspecialchars($service_item['title']); ?></h5>
                                <p class="text-muted mb-3">
                                    <?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?>
                                </p>
                                <a href="service-detail.php?id=<?php echo $service_item['id']; ?>" 
                                   class="btn btn-outline-primary btn-sm">
                                    View Details <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else:
                ?>
                    <div class="col-12 text-center">
                        <div class="alert alert-info">
                            <h5>Services Coming Soon</h5>
                            <p class="mb-0">We're preparing amazing automation solutions for you. Stay tuned!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <a href="services.php" class="btn btn-primary btn-lg px-5 py-3 fw-semibold">
                        <i class="fas fa-list me-2"></i>View All Services
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Ready to Transform Your Operations?</h2>
                    <p class="fs-5 mb-0">Let's discuss how our automation solutions can revolutionize your manufacturing processes and boost productivity.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="contact.php" class="btn btn-warning btn-lg px-4 py-3 fw-semibold me-3">
                        <i class="fas fa-phone me-2"></i>Get Started
                    </a>
                    <a href="about.php" class="btn btn-outline-light btn-lg px-4 py-3 fw-semibold">
                        <i class="fas fa-info-circle me-2"></i>Learn More
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>