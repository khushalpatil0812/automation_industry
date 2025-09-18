<!-- front end index page.  -->
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
                        <span class="badge px-3 py-2 fs-6 mb-3" style="background-color: var(--color-platinum); color: var(--color-gunmetal);">Industry 4.0 Solutions</span>
                        <h1 class="display-3 mb-4" style="font-weight: 900; text-shadow: 2px 2px 8px rgba(0,0,0,0.7), 0 0 20px rgba(0,0,0,0.5);">Transform Your <span style="color: var(--color-platinum); text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 25px rgba(216,213,219,0.3);">Industrial Operations</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.6);">Leading provider of cutting-edge automation solutions that revolutionize manufacturing processes and boost productivity</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="services.php" class="btn btn-lg px-4 py-3 fw-semibold" style="background-color: var(--color-platinum); color: var(--color-gunmetal); border: none;">
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
                        <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-gunmetal);">Smart Manufacturing</span>
                        <h1 class="display-3 mb-4" style="font-weight: 900; text-shadow: 2px 2px 8px rgba(0,0,0,0.7), 0 0 20px rgba(0,0,0,0.5);">Advanced <span style="color: var(--color-gunmetal); text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 25px rgba(33,37,41,0.4);">Robotics & AI</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.6);">Harness the power of artificial intelligence and robotics to create intelligent, self-optimizing manufacturing systems</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="services.php" class="btn btn-lg px-4 py-3 fw-semibold" style="background-color: var(--color-gunmetal); color: white; border: none;">
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
                        <h1 class="display-3 mb-4" style="font-weight: 900; text-shadow: 2px 2px 8px rgba(0,0,0,0.7), 0 0 20px rgba(0,0,0,0.5);">Green <span class="text-success" style="text-shadow: 2px 2px 8px rgba(0,0,0,0.8), 0 0 25px rgba(25,135,84,0.4);">Technology Solutions</span></h1>
                        <p class="fs-5 mb-4 col-lg-8 mx-auto" style="text-shadow: 1px 1px 4px rgba(0,0,0,0.6);">Sustainable automation solutions that reduce environmental impact while maximizing operational efficiency</p>
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
    <section id="metricsSection" class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row text-center mb-5" data-aos="fade-up">
                <div class="col-12">
                    <h2 class="display-5 fw-bold text-white mb-3">Proven Track Record</h2>
                    <p class="fs-5 text-light">Numbers that speak for our excellence in automation solutions</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px; background: var(--gradient-primary) !important;">
                                <i class="fas fa-industry text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold mb-1 text-white"><span class="counter" data-target="500">0</span>+</h3>
                            <h5 class="fw-semibold mb-2 text-light">Projects Completed</h5>
                            <p class="text-light small mb-0 opacity-75">Successfully delivered automation solutions worldwide</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-users text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-success mb-1"><span class="counter" data-target="150">0</span>+</h3>
                            <h5 class="fw-semibold mb-2 text-light">Happy Clients</h5>
                            <p class="text-light small mb-0 opacity-75">Trusted by leading manufacturing companies</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-clock text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-warning mb-1"><span class="counter" data-target="15">0</span>+</h3>
                            <h5 class="fw-semibold mb-2 text-light">Years Experience</h5>
                            <p class="text-light small mb-0 opacity-75">Decades of expertise in industrial automation</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-trophy text-white fs-3"></i>
                            </div>
                            <h3 class="fw-bold text-info mb-1"><span class="counter" data-target="98">0</span>%</h3>
                            <h5 class="fw-semibold mb-2 text-light">Success Rate</h5>
                            <p class="text-light small mb-0 opacity-75">Exceptional project delivery success rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-gunmetal);">Why Choose Us</span>
                    <h2 class="display-5 fw-bold text-white mb-3">Advanced Automation Features</h2>
                    <p class="fs-5 text-light col-lg-8 mx-auto">Discover how our cutting-edge technology transforms manufacturing processes</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-gradient rounded-3 p-3 me-3" style="background: var(--gradient-primary) !important;">
                                    <i class="fas fa-robot text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-white">AI-Powered Robotics</h4>
                            </div>
                            <p class="text-light mb-3 opacity-75">Intelligent robotic systems that learn and adapt to optimize manufacturing processes in real-time.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Machine Learning Integration</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Predictive Maintenance</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Quality Control Automation</span></li>
                            </ul>
                            <a href="services.php" class="btn btn-sm mt-2" style="color: var(--color-platinum); border: 1px solid var(--color-platinum);">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-success bg-gradient rounded-3 p-3 me-3">
                                    <i class="fas fa-network-wired text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-white">IoT Integration</h4>
                            </div>
                            <p class="text-light mb-3 opacity-75">Connect all your devices and systems for seamless data flow and centralized control.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Real-time Monitoring</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Cloud Connectivity</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Remote Access Control</span></li>
                            </ul>
                            <a href="services.php" class="btn btn-sm mt-2" style="color: #198754; border: 1px solid #198754;">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-center mb-3">
                                <div class="bg-warning bg-gradient rounded-3 p-3 me-3">
                                    <i class="fas fa-chart-line text-white fs-4"></i>
                                </div>
                                <h4 class="fw-bold mb-0 text-white">Analytics & Insights</h4>
                            </div>
                            <p class="text-light mb-3 opacity-75">Advanced analytics to optimize performance and make data-driven decisions.</p>
                            <ul class="list-unstyled">
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Performance Dashboards</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Predictive Analytics</span></li>
                                <li class="mb-2"><i class="fas fa-check text-success me-2"></i><span class="text-light">Custom Reports</span></li>
                            </ul>
                            <a href="services.php" class="btn btn-sm mt-2" style="color: #ffc107; border: 1px solid #ffc107;">
                                Learn More <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Preview Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-french-gray);">Our Services</span>
                    <h2 class="display-5 fw-bold text-white mb-3">Professional Solutions</h2>
                    <p class="fs-5 text-light col-lg-8 mx-auto">Comprehensive automation services tailored to your industry needs</p>
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
                        <div class="card border-0 shadow-sm h-100 position-relative overflow-hidden" style="background-color: #343a40;">
                            <div class="position-relative">
                                <img src="<?php echo htmlspecialchars($service_item['image']); ?>" 
                                     class="card-img-top" alt="<?php echo htmlspecialchars($service_item['title']); ?>" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge" style="background-color: var(--color-gunmetal); color: white;"><?php echo htmlspecialchars($service_item['category_name'] ?? 'Service'); ?></span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-white"><?php echo htmlspecialchars($service_item['title']); ?></h5>
                                <p class="text-light mb-3 opacity-75">
                                    <?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?>
                                </p>
                                <a href="service-detail.php?id=<?php echo $service_item['id']; ?>" 
                                   class="btn btn-sm" style="color: var(--color-platinum); border: 1px solid var(--color-platinum);">
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
                        <div class="alert" style="background-color: #343a40; border: 1px solid var(--color-french-gray); color: white;">
                            <h5 class="text-white">Services Coming Soon</h5>
                            <p class="mb-0 text-light opacity-75">We're preparing amazing automation solutions for you. Stay tuned!</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <a href="services.php" class="btn btn-lg px-5 py-3 fw-semibold" style="background-color: var(--color-platinum); color: var(--color-gunmetal); border: none;">
                        <i class="fas fa-list me-2"></i>View All Services
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 position-relative overflow-hidden" style="background-color: #212529;">
        <!-- Decorative Elements -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.1;">
            <div class="position-absolute" style="top: 10%; left: 5%; width: 100px; height: 100px; background: var(--color-platinum); border-radius: 50%; filter: blur(60px);"></div>
            <div class="position-absolute" style="top: 60%; right: 10%; width: 150px; height: 150px; background: var(--color-french-gray); border-radius: 50%; filter: blur(80px);"></div>
            <div class="position-absolute" style="bottom: 20%; left: 15%; width: 80px; height: 80px; background: var(--color-platinum); border-radius: 50%; filter: blur(50px);"></div>
        </div>
        
        <!-- Geometric Pattern Overlay -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.05; background-image: url('data:image/svg+xml,<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"60\" height=\"60\" viewBox=\"0 0 60 60\"><g fill=\"%23ffffff\"><polygon points=\"30,0 60,30 30,60 0,30\"/></g></svg>'); background-size: 60px 60px;"></div>
        
        <div class="container position-relative">
            <div class="row align-items-center py-5">
                <!-- Content Column -->
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="mb-4">
                        <span class="badge px-4 py-2 fs-6 mb-3" style="background: rgba(216, 213, 219, 0.2); color: var(--color-platinum); border: 1px solid rgba(216, 213, 219, 0.3); backdrop-filter: blur(10px);">
                            <i class="fas fa-rocket me-2"></i>Start Your Digital Transformation
                        </span>
                    </div>
                    
                    <h2 class="display-4 fw-bold text-white mb-4">
                        Ready to <span style="color: var(--color-platinum); text-shadow: 0 0 20px rgba(216, 213, 219, 0.5);">Transform</span> Your Operations?
                    </h2>
                    
                    <p class="fs-5 text-light mb-4 opacity-90 lh-lg">
                        Join <strong class="text-white">500+ companies</strong> that have revolutionized their manufacturing processes with our cutting-edge automation solutions. Experience increased efficiency, reduced costs, and enhanced productivity.
                    </p>
                    
                    <!-- Key Benefits -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-success rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-white fs-6"></i>
                                </div>
                                <span class="fw-semibold">Free Consultation & Analysis</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-warning rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-clock text-white fs-6"></i>
                                </div>
                                <span class="fw-semibold">Quick Implementation</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-info rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-shield-alt text-white fs-6"></i>
                                </div>
                                <span class="fw-semibold">24/7 Expert Support</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px; background: var(--color-platinum);">
                                    <i class="fas fa-trophy fs-6" style="color: var(--color-gunmetal);"></i>
                                </div>
                                <span class="fw-semibold">Industry-Leading Solutions</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Action Column -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="200">
                    <div class="bg-white rounded-4 p-5 shadow-lg position-relative" style="backdrop-filter: blur(10px);">
                        <!-- Decorative Corner -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <div class="rounded-circle p-2" style="background: linear-gradient(135deg, var(--color-gunmetal), var(--color-french-gray)); width: 50px; height: 50px;">
                                <i class="fas fa-industry text-white d-flex align-items-center justify-content-center h-100"></i>
                            </div>
                        </div>
                        
                        <div class="text-center mb-4">
                            <h3 class="fw-bold mb-2" style="color: var(--color-gunmetal);">Get Your Free Consultation</h3>
                            <p class="text-muted mb-0">Discover how automation can transform your business in just 30 minutes.</p>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="d-grid gap-3">
                            <a href="contact.php" class="btn btn-lg py-3 fw-semibold position-relative overflow-hidden" style="background: linear-gradient(135deg, var(--color-gunmetal) 0%, #1a1d2e 100%); color: white; border: none; transition: all 0.3s ease;">
                                <span class="position-relative z-2">
                                    <i class="fas fa-calendar-check me-2"></i>Schedule Free Consultation
                                </span>
                                <div class="position-absolute top-0 start-0 w-100 h-100 opacity-0" style="background: linear-gradient(135deg, #1a1d2e 0%, var(--color-gunmetal) 100%); transition: opacity 0.3s ease;"></div>
                            </a>
                            
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <a href="tel:+15551234567" class="btn btn-outline-dark btn-lg py-3 fw-semibold w-100" style="border-color: var(--color-french-gray); color: var(--color-gunmetal);">
                                        <i class="fas fa-phone me-2"></i>Call Now
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="about.php" class="btn btn-lg py-3 fw-semibold w-100" style="background-color: var(--color-platinum); color: var(--color-gunmetal); border: none;">
                                        <i class="fas fa-info-circle me-2"></i>Learn More
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Trust Indicators -->
                        <div class="text-center mt-4 pt-3" style="border-top: 1px solid var(--color-platinum);">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="fw-bold" style="color: var(--color-gunmetal);">500+</div>
                                    <small class="text-muted">Projects</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold" style="color: var(--color-gunmetal);">98%</div>
                                    <small class="text-muted">Success Rate</small>
                                </div>
                                <div class="col-4">
                                    <div class="fw-bold" style="color: var(--color-gunmetal);">15+</div>
                                    <small class="text-muted">Years Exp.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.counter {
    font-weight: inherit;
    transition: all 0.3s ease;
}

.counter.counting {
    animation: pulse 0.5s ease-in-out;
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.05); }
    100% { transform: scale(1); }
}
</style>

<script>
// Counter Animation Function
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16); // 60fps
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            current = target;
            clearInterval(timer);
            element.classList.remove('counting');
        }
        element.textContent = Math.floor(current);
    }, 16);
    
    element.classList.add('counting');
}

// Intersection Observer for triggering animation when section is visible
const observerOptions = {
    threshold: 0.3,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const counters = entry.target.querySelectorAll('.counter');
            counters.forEach(counter => {
                if (!counter.classList.contains('animated')) {
                    const target = parseInt(counter.getAttribute('data-target'));
                    const duration = 2500; // 2.5 seconds for smooth animation
                    
                    // Add a small delay based on the counter's position for staggered effect
                    const delay = Array.from(counters).indexOf(counter) * 200;
                    
                    setTimeout(() => {
                        animateCounter(counter, target, duration);
                        counter.classList.add('animated');
                    }, delay);
                }
            });
            
            // Unobserve after animation starts to prevent re-triggering
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Start observing when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const metricsSection = document.querySelector('#metricsSection');
    if (metricsSection) {
        observer.observe(metricsSection);
    }
});
</script>

<?php include 'includes/footer.php'; ?>