<!-- front end index page.  -->
<?php
require_once 'config/config.php';
require_once 'classes/Service.php';
$page_title = 'Home - Automation Industry Solutions';
include 'includes/header.php';
?>

<main class="pt-5">
    <!-- Enhanced Hero Carousel Section -->
    <section id="heroCarousel" class="carousel slide vh-100 position-relative overflow-hidden" data-bs-ride="carousel" data-bs-interval="6000">
        <!-- Animated Background Pattern -->
        <div class="hero-pattern position-absolute w-100 h-100"></div>
        
        <!-- Performance Optimized Carousel Indicators -->
        <div class="carousel-indicators position-absolute" style="bottom: 2rem; z-index: 15;">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active indicator-enhanced" aria-current="true" aria-label="Slide 1 - Industry 4.0 Solutions"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" class="indicator-enhanced" aria-label="Slide 2 - AI & Robotics"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" class="indicator-enhanced" aria-label="Slide 3 - Green Technology"></button>
        </div>
        
        <div class="carousel-inner h-100">
            <!-- Slide 1 - Enhanced with Modern Effects -->
            <div class="carousel-item active h-100 position-relative hero-slide">
                <!-- Optimized Background with Lazy Loading -->
                <div class="hero-bg position-absolute w-100 h-100" 
                     style="background: linear-gradient(135deg, rgba(0,0,0,0.6) 0%, rgba(0,0,0,0.3) 50%, rgba(0,0,0,0.5) 100%), url('public/freepics/3d-render-futuristic-modern-network-communications-design.jpg') center/cover; will-change: transform;">
                </div>
                
                <!-- Floating Elements Animation -->
                <div class="floating-elements position-absolute w-100 h-100">
                    <div class="floating-shape shape-1"></div>
                    <div class="floating-shape shape-2"></div>
                    <div class="floating-shape shape-3"></div>
                    <div class="floating-shape shape-4"></div>
                </div>
                
                <!-- Enhanced Content Container -->
                <div class="d-flex align-items-center justify-content-center h-100 position-relative" style="z-index: 10;">
                    <div class="container text-center text-white">
                        <div class="hero-content-wrapper" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                            <!-- Animated Badge -->
                            <span class="badge hero-badge px-4 py-3 fs-5 mb-4 position-relative overflow-hidden" 
                                  style="background: rgba(216, 213, 219, 0.15); color: var(--color-platinum); border: 2px solid rgba(216, 213, 219, 0.3); backdrop-filter: blur(15px); border-radius: 50px; font-weight: 600;">
                                <span class="badge-shimmer position-absolute top-0 start-0 w-100 h-100"></span>
                                <i class="fas fa-industry me-2 badge-icon"></i>Industry 4.0 Solutions
                            </span>
                            
                            <!-- Enhanced Typography -->
                            <h1 class="hero-title display-2 mb-4 position-relative" style="font-weight: 900; line-height: 1.1; letter-spacing: -0.02em;">
                                <span class="hero-text-line" data-aos="fade-right" data-aos-delay="400" data-aos-duration="800">
                                    Transform Your
                                </span>
                                <br>
                                <span class="hero-text-highlight position-relative" data-aos="fade-left" data-aos-delay="600" data-aos-duration="800" 
                                      style="color: var(--color-platinum); background: linear-gradient(135deg, #ffffff 0%, var(--color-platinum) 50%, #ffffff 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Industrial Operations
                                    <div class="hero-text-underline position-absolute bottom-0 start-0"></div>
                                </span>
                            </h1>
                            
                            <!-- Enhanced Description -->
                            <p class="hero-description fs-4 mb-5 col-lg-10 mx-auto position-relative" 
                               data-aos="fade-up" data-aos-delay="800" data-aos-duration="800"
                               style="font-weight: 400; line-height: 1.6; color: rgba(255, 255, 255, 0.95);">
                                Leading provider of cutting-edge automation solutions that revolutionize manufacturing processes and boost productivity with AI-driven innovation
                            </p>
                            
                            <!-- Enhanced Action Buttons -->
                            <div class="hero-actions d-flex gap-4 justify-content-center flex-wrap" 
                                 data-aos="fade-up" data-aos-delay="1000" data-aos-duration="800">
                                <a href="services.php" class="btn hero-btn-primary btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: linear-gradient(135deg, var(--color-platinum) 0%, #ffffff 100%); color: var(--color-gunmetal); border: none; border-radius: 15px; font-size: 1.1rem; box-shadow: 0 8px 25px rgba(216, 213, 219, 0.3); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-shimmer position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-rocket me-3"></i>Explore Services
                                </a>
                                <a href="contact.php" class="btn hero-btn-secondary btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.8); border-radius: 15px; font-size: 1.1rem; backdrop-filter: blur(10px); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-phone me-3"></i>Get Quote
                                </a>
                            </div>
                            
                            <!-- Trust Indicators -->
                            <div class="hero-trust-indicators mt-5" data-aos="fade-up" data-aos-delay="1200">
                                <div class="row justify-content-center g-4">
                                    <div class="col-auto">
                                        <div class="trust-item text-center">
                                            <div class="trust-number fw-bold fs-4 text-white">500+</div>
                                            <div class="trust-label small text-light opacity-75">Projects Delivered</div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="trust-separator"></div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="trust-item text-center">
                                            <div class="trust-number fw-bold fs-4 text-white">15+</div>
                                            <div class="trust-label small text-light opacity-75">Years Experience</div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="trust-separator"></div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="trust-item text-center">
                                            <div class="trust-number fw-bold fs-4 text-white">98%</div>
                                            <div class="trust-label small text-light opacity-75">Success Rate</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 2 - Enhanced AI & Robotics -->
            <div class="carousel-item h-100 position-relative hero-slide">
                <!-- Optimized Background -->
                <div class="hero-bg position-absolute w-100 h-100" 
                     style="background: linear-gradient(45deg, rgba(13, 110, 253, 0.4) 0%, rgba(0,0,0,0.5) 50%, rgba(70, 130, 180, 0.3) 100%), url('public/freepics/ai-robot-hand-close-human-hand.jpg') center/cover; will-change: transform;">
                </div>
                
                <!-- Tech Pattern Overlay -->
                <div class="tech-pattern position-absolute w-100 h-100"></div>
                
                <!-- Circuit Animation -->
                <div class="circuit-animation position-absolute w-100 h-100">
                    <div class="circuit-line circuit-1"></div>
                    <div class="circuit-line circuit-2"></div>
                    <div class="circuit-line circuit-3"></div>
                    <div class="circuit-node node-1"></div>
                    <div class="circuit-node node-2"></div>
                    <div class="circuit-node node-3"></div>
                </div>
                
                <div class="d-flex align-items-center justify-content-center h-100 position-relative" style="z-index: 10;">
                    <div class="container text-center text-white">
                        <div class="hero-content-wrapper" data-aos="zoom-in" data-aos-duration="1000" data-aos-delay="200">
                            <!-- AI Badge with Pulse Effect -->
                            <span class="badge hero-badge px-4 py-3 fs-5 mb-4 position-relative overflow-hidden pulse-badge" 
                                  style="background: rgba(13, 110, 253, 0.2); color: white; border: 2px solid rgba(13, 110, 253, 0.5); backdrop-filter: blur(15px); border-radius: 50px; font-weight: 600;">
                                <span class="badge-pulse position-absolute top-0 start-0 w-100 h-100"></span>
                                <i class="fas fa-brain me-2 badge-icon"></i>Smart Manufacturing
                            </span>
                            
                            <!-- Enhanced Typography -->
                            <h1 class="hero-title display-2 mb-4 position-relative" style="font-weight: 900; line-height: 1.1; letter-spacing: -0.02em;">
                                <span class="hero-text-line" data-aos="slide-right" data-aos-delay="400" data-aos-duration="800">
                                    Advanced
                                </span>
                                <br>
                                <span class="hero-text-highlight-ai position-relative" data-aos="slide-left" data-aos-delay="600" data-aos-duration="800" 
                                      style="background: linear-gradient(135deg, #0d6efd 0%, #4682B4 50%, #007BFF 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Robotics & AI
                                    <div class="hero-text-underline-ai position-absolute bottom-0 start-0"></div>
                                </span>
                            </h1>
                            
                            <p class="hero-description fs-4 mb-5 col-lg-10 mx-auto" 
                               data-aos="fade-up" data-aos-delay="800" data-aos-duration="800"
                               style="font-weight: 400; line-height: 1.6; color: rgba(255, 255, 255, 0.95);">
                                Harness the power of artificial intelligence and robotics to create intelligent, self-optimizing manufacturing systems that adapt and evolve
                            </p>
                            
                            <!-- Enhanced Action Buttons -->
                            <div class="hero-actions d-flex gap-4 justify-content-center flex-wrap" 
                                 data-aos="fade-up" data-aos-delay="1000" data-aos-duration="800">
                                <a href="services.php" class="btn hero-btn-ai btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: linear-gradient(135deg, #0d6efd 0%, #4682B4 100%); color: white; border: none; border-radius: 15px; font-size: 1.1rem; box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-ai-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-robot me-3"></i>AI Solutions
                                </a>
                                <a href="about.php" class="btn hero-btn-secondary btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.8); border-radius: 15px; font-size: 1.1rem; backdrop-filter: blur(10px); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-info-circle me-3"></i>Learn More
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 3 - Enhanced Green Technology -->
            <div class="carousel-item h-100 position-relative hero-slide">
                <!-- Optimized Background -->
                <div class="hero-bg position-absolute w-100 h-100" 
                     style="background: linear-gradient(135deg, rgba(25, 135, 84, 0.4) 0%, rgba(0,0,0,0.5) 50%, rgba(40, 167, 69, 0.3) 100%), url('public/freepics/3442501.jpg') center/cover; will-change: transform;">
                </div>
                
                <!-- Eco Pattern Overlay -->
                <div class="eco-pattern position-absolute w-100 h-100"></div>
                
                <!-- Leaf Animation -->
                <div class="leaf-animation position-absolute w-100 h-100">
                    <div class="floating-leaf leaf-1"></div>
                    <div class="floating-leaf leaf-2"></div>
                    <div class="floating-leaf leaf-3"></div>
                    <div class="floating-leaf leaf-4"></div>
                    <div class="floating-leaf leaf-5"></div>
                </div>
                
                <div class="d-flex align-items-center justify-content-center h-100 position-relative" style="z-index: 10;">
                    <div class="container text-center text-white">
                        <div class="hero-content-wrapper" data-aos="flip-up" data-aos-duration="1000" data-aos-delay="200">
                            <!-- Green Badge with Eco Effect -->
                            <span class="badge hero-badge px-4 py-3 fs-5 mb-4 position-relative overflow-hidden eco-badge" 
                                  style="background: rgba(25, 135, 84, 0.2); color: white; border: 2px solid rgba(25, 135, 84, 0.5); backdrop-filter: blur(15px); border-radius: 50px; font-weight: 600;">
                                <span class="badge-eco-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                <i class="fas fa-leaf me-2 badge-icon leaf-rotate"></i>Sustainable Future
                            </span>
                            
                            <!-- Enhanced Typography -->
                            <h1 class="hero-title display-2 mb-4 position-relative" style="font-weight: 900; line-height: 1.1; letter-spacing: -0.02em;">
                                <span class="hero-text-line" data-aos="fade-down" data-aos-delay="400" data-aos-duration="800">
                                    Green
                                </span>
                                <br>
                                <span class="hero-text-highlight-green position-relative" data-aos="fade-up" data-aos-delay="600" data-aos-duration="800" 
                                      style="background: linear-gradient(135deg, #198754 0%, #28a745 50%, #20c997 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">
                                    Technology Solutions
                                    <div class="hero-text-underline-green position-absolute bottom-0 start-0"></div>
                                </span>
                            </h1>
                            
                            <p class="hero-description fs-4 mb-5 col-lg-10 mx-auto" 
                               data-aos="fade-up" data-aos-delay="800" data-aos-duration="800"
                               style="font-weight: 400; line-height: 1.6; color: rgba(255, 255, 255, 0.95);">
                                Sustainable automation solutions that reduce environmental impact while maximizing operational efficiency for a greener tomorrow
                            </p>
                            
                            <!-- Enhanced Action Buttons -->
                            <div class="hero-actions d-flex gap-4 justify-content-center flex-wrap" 
                                 data-aos="fade-up" data-aos-delay="1000" data-aos-duration="800">
                                <a href="services.php" class="btn hero-btn-green btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: linear-gradient(135deg, #198754 0%, #28a745 100%); color: white; border: none; border-radius: 15px; font-size: 1.1rem; box-shadow: 0 8px 25px rgba(25, 135, 84, 0.3); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-green-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-leaf me-3"></i>Green Solutions
                                </a>
                                <a href="contact.php" class="btn hero-btn-secondary btn-lg px-5 py-4 fw-bold position-relative overflow-hidden" 
                                   style="background: transparent; color: white; border: 2px solid rgba(255, 255, 255, 0.8); border-radius: 15px; font-size: 1.1rem; backdrop-filter: blur(10px); transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);">
                                    <span class="btn-glow position-absolute top-0 start-0 w-100 h-100"></span>
                                    <i class="fas fa-calendar me-3"></i>Schedule Demo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Enhanced Carousel Controls -->
        <button class="carousel-control-prev hero-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <div class="hero-control-icon">
                <i class="fas fa-chevron-left"></i>
            </div>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next hero-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <div class="hero-control-icon">
                <i class="fas fa-chevron-right"></i>
            </div>
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

<!-- Enhanced Hero Carousel Styles -->
<style>
/* ===== HERO CAROUSEL ENHANCEMENTS ===== */

/* Performance Optimizations */
.hero-slide {
    will-change: transform;
    backface-visibility: hidden;
    transform: translateZ(0);
}

.hero-bg {
    will-change: transform;
    background-attachment: fixed;
    transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.carousel-item.active .hero-bg {
    transform: scale(1.02);
}

/* ===== ANIMATED BACKGROUND PATTERNS ===== */
.hero-pattern {
    background: 
        radial-gradient(circle at 20% 80%, rgba(255, 107, 53, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(70, 130, 180, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 40% 40%, rgba(216, 213, 219, 0.05) 0%, transparent 50%);
    animation: patternShift 20s ease-in-out infinite;
    pointer-events: none;
}

@keyframes patternShift {
    0%, 100% { opacity: 0.3; transform: scale(1) rotate(0deg); }
    50% { opacity: 0.7; transform: scale(1.1) rotate(2deg); }
}

/* ===== FLOATING ELEMENTS ===== */
.floating-elements {
    pointer-events: none;
}

.floating-shape {
    position: absolute;
    border-radius: 50%;
    background: linear-gradient(135deg, rgba(255, 107, 53, 0.1), rgba(70, 130, 180, 0.1));
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 100px;
    height: 100px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
    animation-duration: 8s;
}

.shape-2 {
    width: 60px;
    height: 60px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
    animation-duration: 6s;
}

.shape-3 {
    width: 80px;
    height: 80px;
    bottom: 30%;
    left: 70%;
    animation-delay: 4s;
    animation-duration: 7s;
}

.shape-4 {
    width: 40px;
    height: 40px;
    top: 40%;
    left: 80%;
    animation-delay: 1s;
    animation-duration: 9s;
}

@keyframes float {
    0%, 100% { 
        transform: translateY(0) translateX(0) scale(1);
        opacity: 0.3;
    }
    25% { 
        transform: translateY(-20px) translateX(10px) scale(1.1);
        opacity: 0.5;
    }
    50% { 
        transform: translateY(-40px) translateX(-5px) scale(0.9);
        opacity: 0.7;
    }
    75% { 
        transform: translateY(-20px) translateX(-15px) scale(1.05);
        opacity: 0.4;
    }
}

/* ===== TECH PATTERNS FOR AI SLIDE ===== */
.tech-pattern {
    background: 
        linear-gradient(90deg, transparent 24%, rgba(13, 110, 253, 0.03) 25%, rgba(13, 110, 253, 0.03) 26%, transparent 27%, transparent 74%, rgba(13, 110, 253, 0.03) 75%, rgba(13, 110, 253, 0.03) 76%, transparent 77%),
        linear-gradient(0deg, transparent 24%, rgba(70, 130, 180, 0.03) 25%, rgba(70, 130, 180, 0.03) 26%, transparent 27%, transparent 74%, rgba(70, 130, 180, 0.03) 75%, rgba(70, 130, 180, 0.03) 76%, transparent 77%);
    background-size: 50px 50px;
    animation: techGrid 15s linear infinite;
    pointer-events: none;
}

@keyframes techGrid {
    0% { transform: translate(0, 0); }
    100% { transform: translate(50px, 50px); }
}

/* ===== CIRCUIT ANIMATION ===== */
.circuit-animation {
    pointer-events: none;
}

.circuit-line {
    position: absolute;
    background: linear-gradient(90deg, transparent, rgba(13, 110, 253, 0.5), transparent);
    height: 2px;
    animation: circuitFlow 4s ease-in-out infinite;
}

.circuit-1 {
    top: 25%;
    left: 0;
    width: 40%;
    animation-delay: 0s;
}

.circuit-2 {
    top: 50%;
    right: 0;
    width: 35%;
    animation-delay: 1.5s;
}

.circuit-3 {
    bottom: 30%;
    left: 20%;
    width: 45%;
    animation-delay: 3s;
}

.circuit-node {
    position: absolute;
    width: 8px;
    height: 8px;
    background: #0d6efd;
    border-radius: 50%;
    box-shadow: 0 0 10px rgba(13, 110, 253, 0.8);
    animation: nodePulse 2s ease-in-out infinite;
}

.node-1 {
    top: 25%;
    left: 40%;
    animation-delay: 0.5s;
}

.node-2 {
    top: 50%;
    right: 35%;
    animation-delay: 2s;
}

.node-3 {
    bottom: 30%;
    left: 65%;
    animation-delay: 3.5s;
}

@keyframes circuitFlow {
    0%, 100% { opacity: 0; transform: scaleX(0); }
    50% { opacity: 1; transform: scaleX(1); }
}

@keyframes nodePulse {
    0%, 100% { transform: scale(1); box-shadow: 0 0 10px rgba(13, 110, 253, 0.8); }
    50% { transform: scale(1.5); box-shadow: 0 0 20px rgba(13, 110, 253, 1); }
}

/* ===== ECO PATTERNS FOR GREEN SLIDE ===== */
.eco-pattern {
    background: 
        radial-gradient(circle at 25% 25%, rgba(25, 135, 84, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 75% 75%, rgba(40, 167, 69, 0.05) 0%, transparent 50%);
    animation: ecoFlow 12s ease-in-out infinite;
    pointer-events: none;
}

@keyframes ecoFlow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.1); }
}

/* ===== FLOATING LEAVES ===== */
.leaf-animation {
    pointer-events: none;
}

.floating-leaf {
    position: absolute;
    width: 20px;
    height: 20px;
    background: linear-gradient(45deg, #198754, #28a745);
    border-radius: 0 100% 0 100%;
    animation: leafFloat 8s ease-in-out infinite;
}

.leaf-1 {
    top: 20%;
    left: 15%;
    animation-delay: 0s;
    animation-duration: 8s;
}

.leaf-2 {
    top: 70%;
    right: 20%;
    animation-delay: 2s;
    animation-duration: 6s;
}

.leaf-3 {
    bottom: 40%;
    left: 60%;
    animation-delay: 4s;
    animation-duration: 7s;
}

.leaf-4 {
    top: 40%;
    right: 70%;
    animation-delay: 1s;
    animation-duration: 9s;
}

.leaf-5 {
    bottom: 20%;
    left: 30%;
    animation-delay: 3s;
    animation-duration: 5s;
}

@keyframes leafFloat {
    0%, 100% { 
        transform: translateY(0) rotate(0deg);
        opacity: 0.3;
    }
    25% { 
        transform: translateY(-30px) rotate(90deg);
        opacity: 0.6;
    }
    50% { 
        transform: translateY(-60px) rotate(180deg);
        opacity: 0.8;
    }
    75% { 
        transform: translateY(-30px) rotate(270deg);
        opacity: 0.5;
    }
}

/* ===== ENHANCED TYPOGRAPHY ===== */
.hero-title {
    text-shadow: 
        0 2px 4px rgba(0, 0, 0, 0.3),
        0 4px 8px rgba(0, 0, 0, 0.2),
        0 8px 16px rgba(0, 0, 0, 0.1);
    font-family: 'Space Grotesk', -apple-system, BlinkMacSystemFont, sans-serif;
}

.hero-text-line {
    display: inline-block;
    animation: textGlow 3s ease-in-out infinite;
}

@keyframes textGlow {
    0%, 100% { text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3); }
    50% { text-shadow: 0 4px 8px rgba(0, 0, 0, 0.5), 0 0 20px rgba(255, 255, 255, 0.1); }
}

.hero-text-underline {
    height: 4px;
    background: linear-gradient(90deg, var(--color-platinum), transparent);
    width: 0;
    animation: underlineGrow 2s ease-out 1s forwards;
}

.hero-text-underline-ai {
    height: 4px;
    background: linear-gradient(90deg, #0d6efd, #4682B4);
    width: 0;
    animation: underlineGrow 2s ease-out 1s forwards;
}

.hero-text-underline-green {
    height: 4px;
    background: linear-gradient(90deg, #198754, #28a745);
    width: 0;
    animation: underlineGrow 2s ease-out 1s forwards;
}

@keyframes underlineGrow {
    to { width: 100%; }
}

.hero-description {
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
    font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
    animation: descriptionFade 1s ease-out 1.2s both;
}

@keyframes descriptionFade {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== ENHANCED BADGES ===== */
.hero-badge {
    animation: badgeFloat 3s ease-in-out infinite;
}

.badge-shimmer {
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.2) 50%, transparent 70%);
    animation: shimmer 3s ease-in-out infinite;
}

.badge-pulse {
    background: radial-gradient(circle, rgba(13, 110, 253, 0.3) 0%, transparent 70%);
    animation: pulse 2s ease-in-out infinite;
}

.badge-eco-glow {
    background: radial-gradient(circle, rgba(25, 135, 84, 0.3) 0%, transparent 70%);
    animation: ecoGlow 2.5s ease-in-out infinite;
}

.badge-icon {
    animation: iconSpin 4s linear infinite;
}

.leaf-rotate {
    animation: leafSpin 6s ease-in-out infinite;
}

@keyframes badgeFloat {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
}

@keyframes shimmer {
    0%, 100% { transform: translateX(-100%); }
    50% { transform: translateX(100%); }
}

@keyframes pulse {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.1); }
}

@keyframes ecoGlow {
    0%, 100% { opacity: 0.3; transform: scale(1); }
    50% { opacity: 0.6; transform: scale(1.05); }
}

@keyframes iconSpin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

@keyframes leafSpin {
    0%, 100% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.1); }
}

/* ===== ENHANCED BUTTONS ===== */
.hero-btn-primary {
    transform: translateY(0);
    box-shadow: 0 8px 25px rgba(216, 213, 219, 0.3), 0 0 0 1px rgba(255, 255, 255, 0.1);
}

.hero-btn-primary:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 35px rgba(216, 213, 219, 0.5), 0 0 0 1px rgba(255, 255, 255, 0.2);
}

.hero-btn-ai {
    transform: translateY(0);
    box-shadow: 0 8px 25px rgba(13, 110, 253, 0.3), 0 0 0 1px rgba(13, 110, 253, 0.1);
}

.hero-btn-ai:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 35px rgba(13, 110, 253, 0.5), 0 0 0 1px rgba(13, 110, 253, 0.2);
}

.hero-btn-green {
    transform: translateY(0);
    box-shadow: 0 8px 25px rgba(25, 135, 84, 0.3), 0 0 0 1px rgba(25, 135, 84, 0.1);
}

.hero-btn-green:hover {
    transform: translateY(-3px) scale(1.02);
    box-shadow: 0 12px 35px rgba(25, 135, 84, 0.5), 0 0 0 1px rgba(25, 135, 84, 0.2);
}

.hero-btn-secondary:hover {
    transform: translateY(-3px) scale(1.02);
    background: rgba(255, 255, 255, 0.1) !important;
    border-color: white !important;
    box-shadow: 0 12px 35px rgba(255, 255, 255, 0.2);
}

.btn-shimmer {
    background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.3) 50%, transparent 70%);
    animation: buttonShimmer 3s ease-in-out infinite;
}

.btn-ai-glow {
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
    animation: aiGlow 2s ease-in-out infinite;
}

.btn-green-glow {
    background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
    animation: greenGlow 2.5s ease-in-out infinite;
}

.btn-glow {
    background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
    animation: glow 2s ease-in-out infinite;
}

@keyframes buttonShimmer {
    0%, 100% { transform: translateX(-100%) skewX(-15deg); }
    50% { transform: translateX(100%) skewX(-15deg); }
}

@keyframes aiGlow {
    0%, 100% { opacity: 0; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.05); }
}

@keyframes greenGlow {
    0%, 100% { opacity: 0; transform: scale(1); }
    50% { opacity: 1; transform: scale(1.05); }
}

@keyframes glow {
    0%, 100% { opacity: 0; transform: scale(1); }
    50% { opacity: 0.8; transform: scale(1.02); }
}

/* ===== TRUST INDICATORS ===== */
.hero-trust-indicators {
    animation: trustFade 1s ease-out 1.5s both;
}

.trust-item {
    transition: all 0.3s ease;
}

.trust-item:hover {
    transform: translateY(-5px);
}

.trust-number {
    background: linear-gradient(135deg, #ffffff 0%, var(--color-platinum) 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: numberPulse 3s ease-in-out infinite;
}

.trust-separator {
    width: 1px;
    height: 40px;
    background: linear-gradient(to bottom, transparent, rgba(255, 255, 255, 0.3), transparent);
    margin: 0 auto;
}

@keyframes trustFade {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}

@keyframes numberPulse {
    0%, 100% { filter: brightness(1); }
    50% { filter: brightness(1.2); }
}

/* ===== ENHANCED CAROUSEL INDICATORS ===== */
.indicator-enhanced {
    width: 60px !important;
    height: 4px !important;
    border-radius: 2px !important;
    background: rgba(255, 255, 255, 0.3) !important;
    border: none !important;
    margin: 0 8px !important;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    position: relative;
    overflow: hidden;
}

.indicator-enhanced.active {
    background: linear-gradient(90deg, var(--color-platinum), rgba(255, 255, 255, 0.8)) !important;
    transform: scale(1.2);
}

.indicator-enhanced::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.8), transparent);
    transition: left 0.6s ease;
}

.indicator-enhanced.active::before {
    left: 100%;
}

/* ===== ENHANCED CAROUSEL CONTROLS ===== */
.hero-control-prev,
.hero-control-next {
    width: 60px !important;
    height: 60px !important;
    background: rgba(255, 255, 255, 0.1) !important;
    border: 2px solid rgba(255, 255, 255, 0.2) !important;
    border-radius: 50% !important;
    backdrop-filter: blur(10px) !important;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94) !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
}

.hero-control-prev {
    left: 2rem !important;
}

.hero-control-next {
    right: 2rem !important;
}

.hero-control-prev:hover,
.hero-control-next:hover {
    background: rgba(255, 255, 255, 0.2) !important;
    border-color: rgba(255, 255, 255, 0.5) !important;
    transform: translateY(-50%) scale(1.1) !important;
    box-shadow: 0 8px 25px rgba(255, 255, 255, 0.2) !important;
}

.hero-control-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    color: white;
    font-size: 1.2rem;
    transition: all 0.3s ease;
}

.hero-control-prev:hover .hero-control-icon,
.hero-control-next:hover .hero-control-icon {
    transform: scale(1.2);
}

/* ===== RESPONSIVE OPTIMIZATIONS ===== */
@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem !important;
        line-height: 1.2;
    }
    
    .hero-description {
        font-size: 1.1rem !important;
        margin-bottom: 2rem !important;
    }
    
    .hero-actions {
        flex-direction: column;
        gap: 1rem !important;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        width: 100%;
        max-width: 300px;
    }
    
    .floating-shape,
    .floating-leaf,
    .circuit-line,
    .circuit-node {
        display: none;
    }
    
    .hero-trust-indicators {
        margin-top: 2rem !important;
    }
    
    .trust-item {
        margin-bottom: 1rem;
    }
}

@media (max-width: 576px) {
    .hero-title {
        font-size: 2rem !important;
    }
    
    .hero-badge {
        font-size: 0.9rem !important;
        padding: 0.5rem 1rem !important;
    }
    
    .hero-control-prev,
    .hero-control-next {
        width: 45px !important;
        height: 45px !important;
    }
    
    .hero-control-prev {
        left: 1rem !important;
    }
    
    .hero-control-next {
        right: 1rem !important;
    }
}

/* ===== PERFORMANCE OPTIMIZATIONS ===== */
@media (prefers-reduced-motion: reduce) {
    .floating-shape,
    .floating-leaf,
    .circuit-line,
    .circuit-node,
    .hero-pattern,
    .tech-pattern,
    .eco-pattern {
        animation: none !important;
    }
    
    .badge-shimmer,
    .btn-shimmer,
    .btn-ai-glow,
    .btn-green-glow,
    .btn-glow {
        animation: none !important;
    }
}

/* ===== HARDWARE ACCELERATION ===== */
.hero-slide,
.hero-bg,
.floating-shape,
.floating-leaf,
.circuit-line,
.circuit-node,
.hero-btn-primary,
.hero-btn-secondary,
.hero-btn-ai,
.hero-btn-green {
    transform: translateZ(0);
    will-change: transform;
}
</style>
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
// Enhanced Hero Carousel JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // ===== PERFORMANCE OPTIMIZATIONS =====
    
    // Preload next slide images for smoother transitions
    const carousel = document.getElementById('heroCarousel');
    const slides = carousel.querySelectorAll('.carousel-item');
    let currentSlide = 0;
    
    // Image preloading function
    function preloadImages() {
        const imageUrls = [
            'public/freepics/mainheader.jpg',
            'public/freepics/ai-robot-hand-close-human-hand.jpg',
            'public/freepics/3442501.jpg'
        ];
        
        imageUrls.forEach(url => {
            const img = new Image();
            img.src = url;
        });
    }
    
    // Initialize preloading
    preloadImages();
    
    // ===== ENHANCED CAROUSEL FUNCTIONALITY =====
    
    // Custom carousel controller for better performance
    let isTransitioning = false;
    
    carousel.addEventListener('slide.bs.carousel', function(e) {
        if (isTransitioning) return;
        isTransitioning = true;
        
        // Add slide-out animation to current slide
        const activeSlide = carousel.querySelector('.carousel-item.active');
        if (activeSlide) {
            activeSlide.style.transform = 'scale(0.98)';
            activeSlide.style.opacity = '0.8';
        }
        
        // Update current slide index
        currentSlide = e.to;
    });
    
    carousel.addEventListener('slid.bs.carousel', function(e) {
        // Reset previous slide styles
        slides.forEach(slide => {
            slide.style.transform = '';
            slide.style.opacity = '';
        });
        
        // Add slide-in animation to new active slide
        const newActiveSlide = carousel.querySelector('.carousel-item.active');
        if (newActiveSlide) {
            newActiveSlide.style.transform = 'scale(1.02)';
            setTimeout(() => {
                newActiveSlide.style.transform = 'scale(1)';
            }, 600);
        }
        
        isTransitioning = false;
        
        // Trigger custom animations based on slide
        triggerSlideAnimations(e.to);
    });
    
    // ===== SLIDE-SPECIFIC ANIMATIONS =====
    
    function triggerSlideAnimations(slideIndex) {
        // Reset all animations
        resetAnimations();
        
        switch(slideIndex) {
            case 0:
                // Industry 4.0 animations
                animateFloatingShapes();
                break;
            case 1:
                // AI/Tech animations
                animateCircuitElements();
                break;
            case 2:
                // Green tech animations
                animateLeafElements();
                break;
        }
    }
    
    function resetAnimations() {
        const animatedElements = document.querySelectorAll('.floating-shape, .circuit-line, .circuit-node, .floating-leaf');
        animatedElements.forEach(el => {
            el.style.animationPlayState = 'paused';
            setTimeout(() => {
                el.style.animationPlayState = 'running';
            }, 100);
        });
    }
    
    function animateFloatingShapes() {
        const shapes = document.querySelectorAll('.floating-shape');
        shapes.forEach((shape, index) => {
            setTimeout(() => {
                shape.style.animation = `float ${6 + index}s ease-in-out infinite`;
                shape.style.animationDelay = `${index * 0.5}s`;
            }, index * 200);
        });
    }
    
    function animateCircuitElements() {
        const circuits = document.querySelectorAll('.circuit-line');
        const nodes = document.querySelectorAll('.circuit-node');
        
        circuits.forEach((circuit, index) => {
            setTimeout(() => {
                circuit.style.animation = `circuitFlow 4s ease-in-out infinite`;
                circuit.style.animationDelay = `${index * 1.5}s`;
            }, index * 300);
        });
        
        nodes.forEach((node, index) => {
            setTimeout(() => {
                node.style.animation = `nodePulse 2s ease-in-out infinite`;
                node.style.animationDelay = `${index * 0.5 + 0.5}s`;
            }, index * 200);
        });
    }
    
    function animateLeafElements() {
        const leaves = document.querySelectorAll('.floating-leaf');
        leaves.forEach((leaf, index) => {
            setTimeout(() => {
                leaf.style.animation = `leafFloat ${5 + index}s ease-in-out infinite`;
                leaf.style.animationDelay = `${index * 0.8}s`;
            }, index * 150);
        });
    }
    
    // ===== INTERSECTION OBSERVER FOR PERFORMANCE =====
    
    const heroObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Resume animations when hero is visible
                const animatedElements = entry.target.querySelectorAll('[class*="floating"], [class*="circuit"], .hero-pattern, .tech-pattern, .eco-pattern');
                animatedElements.forEach(el => {
                    el.style.animationPlayState = 'running';
                });
            } else {
                // Pause animations when hero is not visible
                const animatedElements = entry.target.querySelectorAll('[class*="floating"], [class*="circuit"], .hero-pattern, .tech-pattern, .eco-pattern');
                animatedElements.forEach(el => {
                    el.style.animationPlayState = 'paused';
                });
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '50px'
    });
    
    heroObserver.observe(carousel);
    
    // ===== ENHANCED BUTTON INTERACTIONS =====
    
    const heroButtons = document.querySelectorAll('.hero-btn-primary, .hero-btn-secondary, .hero-btn-ai, .hero-btn-green');
    
    heroButtons.forEach(button => {
        // Enhanced hover effects
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.02)';
            
            // Add ripple effect
            const ripple = document.createElement('div');
            ripple.className = 'btn-ripple';
            ripple.style.cssText = `
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                animation: rippleExpand 0.6s ease-out;
                pointer-events: none;
                z-index: 0;
            `;
            
            this.style.position = 'relative';
            this.appendChild(ripple);
            
            setTimeout(() => {
                if (ripple.parentNode) {
                    ripple.parentNode.removeChild(ripple);
                }
            }, 600);
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
        
        // Enhanced click feedback
        button.addEventListener('click', function(e) {
            // Create click wave effect
            const wave = document.createElement('div');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            wave.style.cssText = `
                position: absolute;
                top: ${y}px;
                left: ${x}px;
                width: ${size}px;
                height: ${size}px;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.4);
                transform: scale(0);
                animation: waveExpand 0.8s ease-out;
                pointer-events: none;
                z-index: 0;
            `;
            
            this.style.position = 'relative';
            this.appendChild(wave);
            
            setTimeout(() => {
                if (wave.parentNode) {
                    wave.parentNode.removeChild(wave);
                }
            }, 800);
        });
    });
    
    // ===== KEYBOARD NAVIGATION ENHANCEMENT =====
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowLeft') {
            e.preventDefault();
            bootstrap.Carousel.getInstance(carousel).prev();
        } else if (e.key === 'ArrowRight') {
            e.preventDefault();
            bootstrap.Carousel.getInstance(carousel).next();
        }
    });
    
    // ===== TOUCH GESTURE ENHANCEMENT =====
    
    let touchStartX = 0;
    let touchEndX = 0;
    
    carousel.addEventListener('touchstart', function(e) {
        touchStartX = e.changedTouches[0].screenX;
    }, { passive: true });
    
    carousel.addEventListener('touchend', function(e) {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    }, { passive: true });
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Swipe left - next slide
                bootstrap.Carousel.getInstance(carousel).next();
            } else {
                // Swipe right - previous slide
                bootstrap.Carousel.getInstance(carousel).prev();
            }
        }
    }
    
    // ===== ADAPTIVE PERFORMANCE BASED ON DEVICE =====
    
    function optimizeForDevice() {
        const isLowPowerDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4;
        const isSlowConnection = navigator.connection && navigator.connection.effectiveType && 
                                navigator.connection.effectiveType.includes('2g');
        
        if (isLowPowerDevice || isSlowConnection) {
            // Reduce animation complexity for low-power devices
            const complexAnimations = document.querySelectorAll('.floating-shape, .circuit-line, .floating-leaf');
            complexAnimations.forEach(el => {
                el.style.display = 'none';
            });
            
            // Reduce carousel interval
            const carouselInstance = bootstrap.Carousel.getInstance(carousel);
            if (carouselInstance) {
                carouselInstance._config.interval = 8000;
            }
        }
    }
    
    optimizeForDevice();
    
    // ===== LOADING OPTIMIZATION =====
    
    // Lazy load background images after initial load
    setTimeout(() => {
        const heroBackgrounds = document.querySelectorAll('.hero-bg');
        heroBackgrounds.forEach(bg => {
            bg.style.backgroundAttachment = 'scroll'; // Better mobile performance
        });
    }, 2000);
    
    // ===== ACCESSIBILITY ENHANCEMENTS =====
    
    // Pause animations when user prefers reduced motion
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        const allAnimatedElements = document.querySelectorAll('[class*="floating"], [class*="circuit"], [class*="pattern"], [class*="badge"], [class*="btn"]');
        allAnimatedElements.forEach(el => {
            el.style.animation = 'none';
        });
    }
    
    // Auto-pause carousel when page is not visible
    document.addEventListener('visibilitychange', function() {
        const carouselInstance = bootstrap.Carousel.getInstance(carousel);
        if (carouselInstance) {
            if (document.hidden) {
                carouselInstance.pause();
            } else {
                carouselInstance.cycle();
            }
        }
    });
});

// ===== CSS ANIMATIONS FOR DYNAMIC EFFECTS =====
const dynamicStyles = document.createElement('style');
dynamicStyles.textContent = `
    @keyframes rippleExpand {
        to {
            width: 100px;
            height: 100px;
            opacity: 0;
        }
    }
    
    @keyframes waveExpand {
        to {
            transform: scale(2);
            opacity: 0;
        }
    }
    
    .btn-ripple {
        z-index: 0 !important;
    }
    
    .hero-btn-primary span,
    .hero-btn-secondary span,
    .hero-btn-ai span,
    .hero-btn-green span {
        position: relative;
        z-index: 1;
    }
`;
document.head.appendChild(dynamicStyles);
</script>
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