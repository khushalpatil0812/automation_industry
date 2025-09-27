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

    <!-- Enhanced Key Metrics Section -->
    <section id="metricsSection" class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1a1d2e 0%, #212529 50%, #2c3034 100%);">
        <!-- Animated Background Elements -->
        <div class="metrics-bg-animation position-absolute w-100 h-100">
            <div class="metrics-particle particle-1"></div>
            <div class="metrics-particle particle-2"></div>
            <div class="metrics-particle particle-3"></div>
            <div class="metrics-particle particle-4"></div>
            <div class="metrics-particle particle-5"></div>
        </div>
        
        <!-- Tech Grid Overlay -->
        <div class="metrics-grid-overlay position-absolute w-100 h-100"></div>
        
        <!-- Professional Decorative Elements -->
        <div class="metrics-decorations position-absolute w-100 h-100">
            <div class="metrics-glow glow-1"></div>
            <div class="metrics-glow glow-2"></div>
            <div class="metrics-line line-1"></div>
            <div class="metrics-line line-2"></div>
        </div>
        
        <div class="container position-relative" style="z-index: 10;">
            <!-- Enhanced Header -->
            <div class="row text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <div class="col-12">
                    <!-- Animated Badge -->
                    <div class="metrics-badge-wrapper mb-4">
                        <span class="badge metrics-badge px-4 py-3 fs-5 position-relative overflow-hidden" 
                              style="background: rgba(255, 107, 53, 0.15); color: var(--color-industrial-orange); border: 2px solid rgba(255, 107, 53, 0.3); backdrop-filter: blur(15px); border-radius: 50px; font-weight: 600;">
                            <span class="badge-metrics-glow position-absolute top-0 start-0 w-100 h-100"></span>
                            <i class="fas fa-chart-line me-2 metrics-icon"></i>Performance Metrics
                        </span>
                    </div>
                    
                    <!-- Enhanced Title -->
                    <h2 class="metrics-title display-4 fw-bold text-white mb-4 position-relative">
                        <span class="metrics-text-line" data-aos="fade-right" data-aos-delay="300" data-aos-duration="800">
                            Proven Track
                        </span>
                        <br>
                        <span class="metrics-text-highlight" data-aos="fade-left" data-aos-delay="500" data-aos-duration="800">
                            Record
                        </span>
                        <div class="metrics-title-underline position-absolute bottom-0 start-50 translate-middle-x"></div>
                    </h2>
                    
                    <!-- Enhanced Description -->
                    <p class="fs-4 text-light mb-0 col-lg-8 mx-auto metrics-description" 
                       data-aos="fade-up" data-aos-delay="700" data-aos-duration="800"
                       style="font-weight: 400; line-height: 1.6; color: rgba(255, 255, 255, 0.9);">
                        Numbers that speak for our excellence in automation solutions and industrial innovation
                    </p>
                </div>
            </div>
            
            <!-- Enhanced Metrics Cards -->
            <div class="row g-4 metrics-cards-container">
                <!-- Projects Metric -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="800">
                    <div class="metrics-card card border-0 h-100 text-center position-relative overflow-hidden" 
                         style="background: rgba(30, 35, 40, 0.9) !important; color: white !important;">
                        <!-- Card Glow Effect -->
                        <div class="metrics-card-glow position-absolute w-100 h-100"></div>
                        
                        <!-- Animated Border -->
                        <div class="metrics-card-border position-absolute w-100 h-100"></div>
                        
                        <div class="card-body p-5 position-relative" style="z-index: 2; background: transparent !important; color: white !important;">
                            <!-- Enhanced Icon Container -->
                            <div class="metrics-icon-container position-relative mb-4">
                                <div class="metrics-icon-bg bg-gradient rounded-3 d-inline-flex align-items-center justify-content-center position-relative overflow-hidden" 
                                     style="width: 90px; height: 90px; background: linear-gradient(135deg, var(--color-industrial-orange) 0%, #e55100 100%) !important; box-shadow: 0 8px 25px rgba(255, 107, 53, 0.3);">
                                    <div class="metrics-icon-shimmer position-absolute w-100 h-100"></div>
                                    <i class="fas fa-industry text-white" style="font-size: 2.2rem; position: relative; z-index: 1;"></i>
                                </div>
                                <!-- Floating Ring -->
                                <div class="metrics-icon-ring position-absolute top-0 start-0 w-100 h-100"></div>
                            </div>
                            
                            <!-- Enhanced Counter -->
                            <div class="metrics-number-container mb-3">
                                <h3 class="metrics-number fw-bold mb-0 position-relative" style="font-size: 3rem; line-height: 1;">
                                    <span class="counter" data-target="500">0</span><span class="metrics-plus">+</span>
                                    <div class="metrics-number-glow position-absolute top-0 start-0 w-100 h-100"></div>
                                </h3>
                            </div>
                            
                            <!-- Enhanced Label -->
                            <h5 class="metrics-label fw-bold mb-3 text-white" style="font-size: 1.3rem; letter-spacing: -0.01em;">Projects Completed</h5>
                            
                            <!-- Enhanced Description -->
                            <p class="metrics-desc text-light mb-0" style="font-size: 0.95rem; line-height: 1.5; opacity: 0.85;">
                                Successfully delivered automation solutions worldwide with cutting-edge technology
                            </p>
                            
                            <!-- Progress Indicator -->
                            <div class="metrics-progress mt-4">
                                <div class="metrics-progress-bar"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Clients Metric -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="800">
                    <div class="metrics-card card border-0 h-100 text-center position-relative overflow-hidden" 
                         style="background: rgba(30, 35, 40, 0.9) !important; color: white !important;">
                        <div class="metrics-card-glow metrics-card-glow-green position-absolute w-100 h-100"></div>
                        <div class="metrics-card-border position-absolute w-100 h-100"></div>
                        
                        <div class="card-body p-5 position-relative" style="z-index: 2; background: transparent !important; color: white !important;">
                            <div class="metrics-icon-container position-relative mb-4">
                                <div class="metrics-icon-bg bg-success bg-gradient rounded-3 d-inline-flex align-items-center justify-content-center position-relative overflow-hidden" 
                                     style="width: 90px; height: 90px; box-shadow: 0 8px 25px rgba(25, 135, 84, 0.3);">
                                    <div class="metrics-icon-shimmer metrics-icon-shimmer-green position-absolute w-100 h-100"></div>
                                    <i class="fas fa-users text-white" style="font-size: 2.2rem; position: relative; z-index: 1;"></i>
                                </div>
                                <div class="metrics-icon-ring metrics-icon-ring-green position-absolute top-0 start-0 w-100 h-100"></div>
                            </div>
                            
                            <div class="metrics-number-container mb-3">
                                <h3 class="metrics-number metrics-number-green fw-bold mb-0 position-relative" style="font-size: 3rem; line-height: 1;">
                                    <span class="counter" data-target="150">0</span><span class="metrics-plus">+</span>
                                    <div class="metrics-number-glow metrics-number-glow-green position-absolute top-0 start-0 w-100 h-100"></div>
                                </h3>
                            </div>
                            
                            <h5 class="metrics-label fw-bold mb-3 text-white" style="font-size: 1.3rem; letter-spacing: -0.01em;">Happy Clients</h5>
                            <p class="metrics-desc text-light mb-0" style="font-size: 0.95rem; line-height: 1.5; opacity: 0.85;">
                                Trusted by leading manufacturing companies across diverse industries
                            </p>
                            
                            <div class="metrics-progress mt-4">
                                <div class="metrics-progress-bar metrics-progress-bar-green"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Experience Metric -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="800">
                    <div class="metrics-card card border-0 h-100 text-center position-relative overflow-hidden" 
                         style="background: rgba(30, 35, 40, 0.9) !important; color: white !important;">
                        <div class="metrics-card-glow metrics-card-glow-warning position-absolute w-100 h-100"></div>
                        <div class="metrics-card-border position-absolute w-100 h-100"></div>
                        
                        <div class="card-body p-5 position-relative" style="z-index: 2; background: transparent !important; color: white !important;">
                            <div class="metrics-icon-container position-relative mb-4">
                                <div class="metrics-icon-bg bg-warning bg-gradient rounded-3 d-inline-flex align-items-center justify-content-center position-relative overflow-hidden" 
                                     style="width: 90px; height: 90px; box-shadow: 0 8px 25px rgba(255, 193, 7, 0.3);">
                                    <div class="metrics-icon-shimmer metrics-icon-shimmer-warning position-absolute w-100 h-100"></div>
                                    <i class="fas fa-clock text-white" style="font-size: 2.2rem; position: relative; z-index: 1;"></i>
                                </div>
                                <div class="metrics-icon-ring metrics-icon-ring-warning position-absolute top-0 start-0 w-100 h-100"></div>
                            </div>
                            
                            <div class="metrics-number-container mb-3">
                                <h3 class="metrics-number metrics-number-warning fw-bold mb-0 position-relative" style="font-size: 3rem; line-height: 1;">
                                    <span class="counter" data-target="15">0</span><span class="metrics-plus">+</span>
                                    <div class="metrics-number-glow metrics-number-glow-warning position-absolute top-0 start-0 w-100 h-100"></div>
                                </h3>
                            </div>
                            
                            <h5 class="metrics-label fw-bold mb-3 text-white" style="font-size: 1.3rem; letter-spacing: -0.01em;">Years Experience</h5>
                            <p class="metrics-desc text-light mb-0" style="font-size: 0.95rem; line-height: 1.5; opacity: 0.85;">
                                Decades of expertise in industrial automation and smart manufacturing
                            </p>
                            
                            <div class="metrics-progress mt-4">
                                <div class="metrics-progress-bar metrics-progress-bar-warning"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Success Rate Metric -->
                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="800">
                    <div class="metrics-card card border-0 h-100 text-center position-relative overflow-hidden" 
                         style="background: rgba(30, 35, 40, 0.9) !important; color: white !important;">
                        <div class="metrics-card-glow metrics-card-glow-info position-absolute w-100 h-100"></div>
                        <div class="metrics-card-border position-absolute w-100 h-100"></div>
                        
                        <div class="card-body p-5 position-relative" style="z-index: 2; background: transparent !important; color: white !important;">
                            <div class="metrics-icon-container position-relative mb-4">
                                <div class="metrics-icon-bg bg-info bg-gradient rounded-3 d-inline-flex align-items-center justify-content-center position-relative overflow-hidden" 
                                     style="width: 90px; height: 90px; box-shadow: 0 8px 25px rgba(13, 202, 240, 0.3);">
                                    <div class="metrics-icon-shimmer metrics-icon-shimmer-info position-absolute w-100 h-100"></div>
                                    <i class="fas fa-trophy text-white" style="font-size: 2.2rem; position: relative; z-index: 1;"></i>
                                </div>
                                <div class="metrics-icon-ring metrics-icon-ring-info position-absolute top-0 start-0 w-100 h-100"></div>
                            </div>
                            
                            <div class="metrics-number-container mb-3">
                                <h3 class="metrics-number metrics-number-info fw-bold mb-0 position-relative" style="font-size: 3rem; line-height: 1;">
                                    <span class="counter" data-target="98">0</span><span class="metrics-plus">%</span>
                                    <div class="metrics-number-glow metrics-number-glow-info position-absolute top-0 start-0 w-100 h-100"></div>
                                </h3>
                            </div>
                            
                            <h5 class="metrics-label fw-bold mb-3 text-white" style="font-size: 1.3rem; letter-spacing: -0.01em;">Success Rate</h5>
                            <p class="metrics-desc text-light mb-0" style="font-size: 0.95rem; line-height: 1.5; opacity: 0.85;">
                                Exceptional project delivery success rate with unmatched quality standards
                            </p>
                            
                            <div class="metrics-progress mt-4">
                                <div class="metrics-progress-bar metrics-progress-bar-info"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Additional Trust Elements -->
            <div class="row mt-5" data-aos="fade-up" data-aos-delay="800">
                <div class="col-12 text-center">
                    <div class="metrics-trust-section p-4 rounded-4 position-relative overflow-hidden">
                        <div class="metrics-trust-bg position-absolute w-100 h-100"></div>
                        <p class="text-light mb-0 fs-5 position-relative" style="z-index: 1; opacity: 0.9;">
                            <i class="fas fa-shield-alt text-warning me-2"></i>
                            Trusted by our clients for mission-critical automation projects
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic Key Features Section -->
    <section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1a1d2e 0%, #212529 50%, #2c3034 100%);">
        <!-- Background Pattern -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="
            background-image: 
                radial-gradient(circle at 20% 20%, rgba(255, 107, 53, 0.05) 2px, transparent 2px),
                radial-gradient(circle at 80% 80%, rgba(70, 130, 180, 0.05) 1px, transparent 1px);
            background-size: 60px 60px, 40px 40px;
            z-index: 1;
        "></div>
        
        <div class="container position-relative" style="z-index: 2;">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge text-white px-4 py-2 fs-6 mb-3" style="
                        background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(70, 130, 180, 0.2));
                        border: 1px solid rgba(255, 107, 53, 0.3);
                        border-radius: 25px;
                        backdrop-filter: blur(10px);
                    ">Our Expertise</span>
                    <h2 class="display-5 fw-bold text-white mb-3" style="
                        font-family: 'Space Grotesk', sans-serif;
                        background: linear-gradient(135deg, #ffffff, #f8f9fa);
                        -webkit-background-clip: text;
                        -webkit-text-fill-color: transparent;
                        text-shadow: 0 2px 4px rgba(0,0,0,0.3);
                    ">Professional Solutions</h2>
                    <p class="fs-5 text-light col-lg-8 mx-auto opacity-90">Explore our comprehensive range of services designed to meet your business needs</p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php
                // Fetch categories from database
                require_once 'classes/Category.php';
                $category = new Category($pdo);
                $categories = $category->getCategoriesWithServiceCount();
                
                // Color schemes for cards
                $colorSchemes = [
                    ['primary' => '#FF6B35', 'secondary' => '#FFA500', 'accent' => 'rgba(255, 107, 53, 0.1)'],
                    ['primary' => '#4682B4', 'secondary' => '#5A9FD1', 'accent' => 'rgba(70, 130, 180, 0.1)'],
                    ['primary' => '#28A745', 'secondary' => '#20C997', 'accent' => 'rgba(40, 167, 69, 0.1)'],
                    ['primary' => '#6610F2', 'secondary' => '#8B5FBF', 'accent' => 'rgba(102, 16, 242, 0.1)'],
                    ['primary' => '#DC3545', 'secondary' => '#FD7E14', 'accent' => 'rgba(220, 53, 69, 0.1)'],
                    ['primary' => '#17A2B8', 'secondary' => '#20C997', 'accent' => 'rgba(23, 162, 184, 0.1)']
                ];
                
                $index = 0;
                foreach ($categories as $cat):
                    if (!$cat['is_active']) continue;
                    
                    $colors = $colorSchemes[$index % count($colorSchemes)];
                    $delay = ($index + 1) * 100;
                    
                    // Parse description into bullet points
                    $descriptionPoints = array_filter(explode('.', $cat['description']));
                    $descriptionPoints = array_slice($descriptionPoints, 0, 3); // Limit to 3 points
                ?>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <div class="feature-card h-100 position-relative overflow-hidden" style="
                        background: linear-gradient(135deg, 
                            rgba(255, 255, 255, 0.02) 0%, 
                            rgba(255, 255, 255, 0.05) 50%, 
                            rgba(255, 255, 255, 0.02) 100%
                        );
                        border: 1px solid rgba(255, 255, 255, 0.1);
                        border-radius: 20px;
                        backdrop-filter: blur(10px);
                        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                        box-shadow: 
                            0 8px 32px rgba(0, 0, 0, 0.3),
                            inset 0 1px 0 rgba(255, 255, 255, 0.1);
                    ">
                        <!-- Gradient Overlay -->
                        <div class="position-absolute top-0 start-0 w-100 h-100" style="
                            background: linear-gradient(135deg, <?php echo $colors['accent']; ?> 0%, transparent 70%);
                            opacity: 0.5;
                            transition: opacity 0.3s ease;
                        "></div>
                        
                        <!-- Animated Border -->
                        <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4" style="
                            background: linear-gradient(45deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                            padding: 1px;
                            opacity: 0;
                            transition: opacity 0.3s ease;
                        ">
                            <div class="w-100 h-100 rounded-4" style="background: #2c3034;"></div>
                        </div>
                        
                        <div class="card-body p-4 position-relative" style="z-index: 2;">
                            <!-- Icon and Title Section -->
                            <div class="d-flex align-items-center mb-4">
                                <div class="feature-icon-wrapper me-3" style="
                                    width: 70px;
                                    height: 70px;
                                    border-radius: 18px;
                                    background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    box-shadow: 
                                        0 8px 25px rgba(0, 0, 0, 0.3),
                                        inset 0 1px 0 rgba(255, 255, 255, 0.2);
                                    transition: all 0.3s ease;
                                ">
                                    <i class="fas fa-<?php echo htmlspecialchars($cat['icon']); ?> text-white" style="font-size: 1.5rem;"></i>
                                </div>
                                <div>
                                    <h4 class="fw-bold mb-1 text-white" style="
                                        font-family: 'Space Grotesk', sans-serif;
                                        font-size: 1.3rem;
                                        line-height: 1.2;
                                    "><?php echo htmlspecialchars($cat['name']); ?></h4>
                                    <small class="text-muted" style="
                                        background: <?php echo $colors['accent']; ?>;
                                        padding: 2px 8px;
                                        border-radius: 12px;
                                        font-size: 0.75rem;
                                    "><?php echo $cat['service_count']; ?> Services</small>
                                </div>
                            </div>
                            
                            <!-- Description -->
                            <p class="text-light mb-4 opacity-90" style="
                                font-size: 0.95rem;
                                line-height: 1.6;
                            "><?php echo htmlspecialchars(substr($cat['description'], 0, 120) . (strlen($cat['description']) > 120 ? '...' : '')); ?></p>
                            
                            <!-- Feature Points -->
                            <div class="feature-points mb-4">
                                <?php if (!empty($descriptionPoints)): ?>
                                    <?php foreach ($descriptionPoints as $point): ?>
                                        <?php if (trim($point)): ?>
                                        <div class="feature-point d-flex align-items-start mb-2">
                                            <div class="point-indicator me-2 mt-1" style="
                                                width: 6px;
                                                height: 6px;
                                                border-radius: 50%;
                                                background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                                                box-shadow: 0 0 8px <?php echo $colors['primary']; ?>33;
                                                flex-shrink: 0;
                                            "></div>
                                            <span class="text-light" style="
                                                font-size: 0.85rem;
                                                opacity: 0.9;
                                                line-height: 1.4;
                                            "><?php echo htmlspecialchars(trim($point)); ?></span>
                                        </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <div class="feature-point d-flex align-items-start mb-2">
                                        <div class="point-indicator me-2 mt-1" style="
                                            width: 6px;
                                            height: 6px;
                                            border-radius: 50%;
                                            background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                                            box-shadow: 0 0 8px <?php echo $colors['primary']; ?>33;
                                            flex-shrink: 0;
                                        "></div>
                                        <span class="text-light" style="font-size: 0.85rem; opacity: 0.9;">Professional solutions tailored to your needs</span>
                                    </div>
                                    <div class="feature-point d-flex align-items-start mb-2">
                                        <div class="point-indicator me-2 mt-1" style="
                                            width: 6px;
                                            height: 6px;
                                            border-radius: 50%;
                                            background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                                            box-shadow: 0 0 8px <?php echo $colors['primary']; ?>33;
                                            flex-shrink: 0;
                                        "></div>
                                        <span class="text-light" style="font-size: 0.85rem; opacity: 0.9;">Expert team with proven experience</span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <!-- CTA Button -->
                            <a href="services.php?category=<?php echo $cat['id']; ?>" class="btn btn-feature w-100" style="
                                background: linear-gradient(135deg, <?php echo $colors['primary']; ?>, <?php echo $colors['secondary']; ?>);
                                border: none;
                                color: white;
                                padding: 12px 24px;
                                border-radius: 12px;
                                font-weight: 600;
                                font-size: 0.9rem;
                                transition: all 0.3s ease;
                                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
                                position: relative;
                                overflow: hidden;
                            ">
                                <span class="btn-text">Explore Services</span>
                                <i class="fas fa-arrow-right ms-2 btn-icon" style="transition: transform 0.3s ease;"></i>
                                
                                <!-- Button shine effect -->
                                <div class="btn-shine position-absolute top-0 start-0 w-100 h-100" style="
                                    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.3) 50%, transparent 70%);
                                    transform: translateX(-100%);
                                    transition: transform 0.6s ease;
                                "></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php 
                    $index++;
                endforeach; 
                ?>
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
/* ===== BASE RESPONSIVE FOUNDATION ===== */
:root {
    /* Responsive font sizes */
    --font-xs: clamp(0.75rem, 2vw, 0.875rem);
    --font-sm: clamp(0.875rem, 2.5vw, 1rem);
    --font-base: clamp(1rem, 3vw, 1.125rem);
    --font-lg: clamp(1.125rem, 3.5vw, 1.25rem);
    --font-xl: clamp(1.25rem, 4vw, 1.5rem);
    --font-2xl: clamp(1.5rem, 5vw, 2rem);
    --font-3xl: clamp(2rem, 6vw, 3rem);
    --font-4xl: clamp(2.5rem, 8vw, 4rem);
    
    /* Responsive spacing */
    --spacing-xs: clamp(0.25rem, 1vw, 0.5rem);
    --spacing-sm: clamp(0.5rem, 2vw, 1rem);
    --spacing-md: clamp(1rem, 3vw, 1.5rem);
    --spacing-lg: clamp(1.5rem, 4vw, 2rem);
    --spacing-xl: clamp(2rem, 5vw, 3rem);
    --spacing-2xl: clamp(3rem, 6vw, 5rem);
}

/* ===== HERO SECTION RESPONSIVE ENHANCEMENTS ===== */
#heroCarousel {
    height: 100vh;
    min-height: 600px;
}

.hero-title {
    font-size: var(--font-4xl);
    line-height: 1.1;
    font-weight: 900;
    letter-spacing: -0.02em;
}

.hero-description {
    font-size: var(--font-lg);
    line-height: 1.6;
    margin-bottom: var(--spacing-xl);
}

.hero-badge {
    font-size: var(--font-sm);
    padding: var(--spacing-sm) var(--spacing-md);
    margin-bottom: var(--spacing-md);
}

.hero-actions {
    gap: var(--spacing-md);
}

.hero-btn-primary,
.hero-btn-secondary,
.hero-btn-ai,
.hero-btn-green {
    padding: var(--spacing-md) var(--spacing-lg);
    font-size: var(--font-base);
    border-radius: 15px;
    min-width: 200px;
}

/* ===== METRICS SECTION RESPONSIVE ===== */
#metricsSection {
    padding: var(--spacing-2xl) 0;
}

.metrics-title {
    font-size: var(--font-3xl);
    margin-bottom: var(--spacing-md);
}

.metrics-description {
    font-size: var(--font-lg);
    margin-bottom: var(--spacing-xl);
}

.metrics-card {
    padding: var(--spacing-lg);
    margin-bottom: var(--spacing-md);
    border-radius: 1rem;
    transition: all 0.3s ease;
}

.metrics-number {
    font-size: var(--font-3xl);
    line-height: 1;
}

.metrics-label {
    font-size: var(--font-xl);
    letter-spacing: -0.01em;
}

.metrics-desc {
    font-size: var(--font-sm);
    line-height: 1.5;
    opacity: 0.85;
}

.metrics-icon-bg {
    width: clamp(60px, 8vw, 90px);
    height: clamp(60px, 8vw, 90px);
}

/* ===== SERVICES SECTION RESPONSIVE ===== */
.section-padding {
    padding: var(--spacing-2xl) 0;
}

.section-title {
    font-size: var(--font-3xl);
    margin-bottom: var(--spacing-md);
}

.section-subtitle {
    font-size: var(--font-lg);
    margin-bottom: var(--spacing-xl);
}

.card-body {
    padding: var(--spacing-lg);
}

.card-title {
    font-size: var(--font-xl);
    margin-bottom: var(--spacing-sm);
}

/* ===== CTA SECTION RESPONSIVE ===== */
.cta-section {
    padding: var(--spacing-2xl) 0;
}

.cta-title {
    font-size: var(--font-3xl);
    margin-bottom: var(--spacing-md);
}

.cta-description {
    font-size: var(--font-lg);
    margin-bottom: var(--spacing-lg);
}

/* ===== RESPONSIVE BREAKPOINTS ===== */

/* Extra Small devices (phones, 576px and down) */
@media (max-width: 575.98px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    #heroCarousel {
        height: 100vh;
        min-height: 500px;
    }
    
    .hero-title {
        font-size: 2rem;
        line-height: 1.2;
        margin-bottom: 1rem;
    }
    
    .hero-description {
        font-size: 1rem;
        margin-bottom: 2rem;
    }
    
    .hero-badge {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
        margin-bottom: 1rem;
    }
    
    .hero-actions {
        flex-direction: column;
        align-items: center;
        gap: 1rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        width: 100%;
        max-width: 280px;
        padding: 1rem 1.5rem;
        font-size: 0.95rem;
    }
    
    .hero-trust-indicators {
        margin-top: 1.5rem;
    }
    
    .trust-item {
        margin-bottom: 1rem;
    }
    
    .trust-number {
        font-size: 1.2rem;
    }
    
    .trust-label {
        font-size: 0.8rem;
    }
    
    /* Metrics responsive */
    .metrics-title {
        font-size: 1.8rem;
    }
    
    .metrics-description {
        font-size: 1rem;
    }
    
    .metrics-number {
        font-size: 2rem;
    }
    
    .metrics-label {
        font-size: 1.1rem;
    }
    
    .metrics-icon-bg {
        width: 60px;
        height: 60px;
    }
    
    /* Services responsive */
    .section-title {
        font-size: 1.8rem;
    }
    
    .section-subtitle {
        font-size: 1rem;
    }
    
    .card-body {
        padding: 1rem;
    }
    
    .card-title {
        font-size: 1.1rem;
    }
    
    /* CTA responsive */
    .cta-title {
        font-size: 1.8rem;
    }
    
    .cta-description {
        font-size: 1rem;
    }
    
    /* Hide complex animations on mobile */
    .floating-shape,
    .floating-leaf,
    .circuit-line,
    .circuit-node,
    .metrics-particle,
    .tech-pattern,
    .eco-pattern {
        display: none;
    }
    
    /* Carousel controls */
    .hero-control-prev,
    .hero-control-next {
        width: 40px;
        height: 40px;
    }
    
    .hero-control-prev {
        left: 0.5rem;
    }
    
    .hero-control-next {
        right: 0.5rem;
    }
    
    /* Carousel indicators */
    .carousel-indicators {
        bottom: 1rem;
    }
    
    .indicator-enhanced {
        width: 40px;
        height: 3px;
    }
}

/* Small devices (landscape phones, 576px and up) */
@media (min-width: 576px) and (max-width: 767.98px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .hero-description {
        font-size: 1.1rem;
    }
    
    .hero-actions {
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        min-width: 180px;
    }
    
    .metrics-title {
        font-size: 2.2rem;
    }
    
    .metrics-number {
        font-size: 2.5rem;
    }
    
    .metrics-icon-bg {
        width: 70px;
        height: 70px;
    }
    
    .section-title {
        font-size: 2.2rem;
    }
    
    .cta-title {
        font-size: 2.2rem;
    }
}

/* Medium devices (tablets, 768px and up) */
@media (min-width: 768px) and (max-width: 991.98px) {
    .hero-title {
        font-size: 3rem;
    }
    
    .hero-description {
        font-size: 1.2rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        min-width: 200px;
        padding: 1rem 2rem;
    }
    
    .metrics-title {
        font-size: 2.5rem;
    }
    
    .metrics-number {
        font-size: 2.8rem;
    }
    
    .metrics-icon-bg {
        width: 80px;
        height: 80px;
    }
    
    .section-title {
        font-size: 2.5rem;
    }
    
    .cta-title {
        font-size: 2.5rem;
    }
    
    /* Show some animations */
    .floating-shape,
    .floating-leaf {
        display: block;
        animation-duration: 8s;
    }
    
    .circuit-line,
    .circuit-node {
        display: none;
    }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) and (max-width: 1199.98px) {
    .hero-title {
        font-size: 3.5rem;
    }
    
    .hero-description {
        font-size: 1.3rem;
    }
    
    .metrics-title {
        font-size: 2.8rem;
    }
    
    .metrics-number {
        font-size: 3rem;
    }
    
    .section-title {
        font-size: 2.8rem;
    }
    
    .cta-title {
        font-size: 2.8rem;
    }
    
    /* Show more animations */
    .floating-shape,
    .floating-leaf,
    .circuit-line,
    .circuit-node {
        display: block;
    }
}

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
    .hero-title {
        font-size: 4rem;
    }
    
    .hero-description {
        font-size: 1.4rem;
    }
    
    .metrics-title {
        font-size: 3rem;
    }
    
    .metrics-number {
        font-size: 3rem;
    }
    
    .section-title {
        font-size: 3rem;
    }
    
    .cta-title {
        font-size: 3rem;
    }
    
    /* Full animations */
    .floating-shape,
    .floating-leaf,
    .circuit-line,
    .circuit-node,
    .metrics-particle,
    .tech-pattern,
    .eco-pattern {
        display: block;
    }
}

/* Ultra-wide screens (1400px and up) */
@media (min-width: 1400px) {
    .container {
        max-width: 1320px;
    }
    
    .hero-title {
        font-size: 4.5rem;
    }
    
    .hero-description {
        font-size: 1.5rem;
    }
    
    .metrics-title {
        font-size: 3.5rem;
    }
    
    .metrics-number {
        font-size: 3.5rem;
    }
    
    .section-title {
        font-size: 3.5rem;
    }
    
    .cta-title {
        font-size: 3.5rem;
    }
}

/* ===== ORIENTATION RESPONSIVE ===== */
@media (orientation: landscape) and (max-height: 600px) {
    #heroCarousel {
        height: 100vh;
        min-height: 500px;
    }
    
    .hero-title {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
    
    .hero-description {
        font-size: 1rem;
        margin-bottom: 1rem;
    }
    
    .hero-badge {
        margin-bottom: 0.5rem;
    }
    
    .hero-actions {
        gap: 1rem;
    }
    
    .hero-trust-indicators {
        margin-top: 1rem;
    }
}

/* ===== TOUCH DEVICE OPTIMIZATIONS ===== */
@media (hover: none) and (pointer: coarse) {
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        min-height: 48px;
        padding: 1rem 1.5rem;
    }
    
    .metrics-card {
        transition: none;
    }
    
    .metrics-card:hover {
        transform: none;
    }
    
    /* Larger touch targets */
    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
    }
    
    .carousel-indicators button {
        min-height: 44px;
    }
}

/* ===== HIGH DPI DISPLAYS ===== */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .hero-bg {
        background-size: cover;
        background-position: center;
    }
    
    .metrics-icon i {
        font-size: 1.2em;
    }
}

/* ===== ACCESSIBILITY IMPROVEMENTS ===== */
@media (prefers-reduced-motion: reduce) {
    * {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
    }
    
    .carousel {
        transition: none;
    }
    
    .metrics-card:hover {
        transform: translateY(-5px);
    }
}

/* ===== PRINT STYLES ===== */
@media print {
    .hero-pattern,
    .floating-elements,
    .metrics-bg-animation,
    .carousel-control-prev,
    .carousel-control-next,
    .carousel-indicators {
        display: none !important;
    }
    
    #heroCarousel {
        height: auto !important;
        background: white !important;
        color: black !important;
    }
    
    .hero-title,
    .metrics-title,
    .section-title {
        color: black !important;
    }
}

/* ===== FOLDABLE DEVICES ===== */
@media (max-width: 280px) {
    .hero-title {
        font-size: 1.5rem;
    }
    
    .hero-description {
        font-size: 0.9rem;
    }
    
    .hero-btn-primary,
    .hero-btn-secondary,
    .hero-btn-ai,
    .hero-btn-green {
        font-size: 0.85rem;
        padding: 0.8rem 1rem;
        min-width: 150px;
    }
    
    .container {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }
}

/* ===== LARGE SCREENS ===== */
@media (min-width: 1600px) {
    .container {
        max-width: 1400px;
    }
    
    .hero-title {
        font-size: 5rem;
    }
}

/* ===== ASPECT RATIO RESPONSIVE ===== */
@media (aspect-ratio: 16/9) {
    #heroCarousel {
        height: 80vh;
    }
}

@media (aspect-ratio: 4/3) {
    #heroCarousel {
        height: 85vh;
    }
}

/* ===== FLEXIBLE GRID SYSTEM ===== */
.responsive-grid {
    display: grid;
    gap: var(--spacing-md);
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
}

@media (max-width: 575.98px) {
    .responsive-grid {
        grid-template-columns: 1fr;
        gap: var(--spacing-sm);
    }
}

/* ===== FLEXIBLE TYPOGRAPHY ===== */
.responsive-text {
    font-size: clamp(1rem, 4vw, 1.5rem);
    line-height: 1.5;
}

.responsive-heading {
    font-size: clamp(1.5rem, 6vw, 3rem);
    line-height: 1.2;
}

/* ===== CONTAINER QUERIES (Future-proofing) ===== */
@container (max-width: 400px) {
    .metrics-card {
        padding: 1rem;
    }
    
    .metrics-number {
        font-size: 1.8rem;
    }
}

/* ===== DYNAMIC KEY FEATURES SECTION STYLES ===== */
.feature-card {
    cursor: pointer;
}

.feature-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.2),
        0 0 0 1px rgba(255, 255, 255, 0.1);
}

.feature-card:hover .position-absolute:nth-child(2) {
    opacity: 1;
}

.feature-card:hover .feature-icon-wrapper {
    transform: rotate(5deg) scale(1.1);
    box-shadow: 
        0 12px 35px rgba(0, 0, 0, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
}

.feature-card:hover .btn-feature {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
}

.feature-card:hover .btn-feature .btn-icon {
    transform: translateX(4px);
}

.feature-card:hover .btn-shine {
    transform: translateX(100%);
}

.feature-point {
    animation: fadeInUp 0.6s ease forwards;
    opacity: 0;
    transform: translateY(10px);
}

.feature-card:hover .feature-point:nth-child(1) { animation-delay: 0.1s; }
.feature-card:hover .feature-point:nth-child(2) { animation-delay: 0.2s; }
.feature-card:hover .feature-point:nth-child(3) { animation-delay: 0.3s; }

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.point-indicator {
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.6; }
}

/* Responsive adjustments for feature cards */
@media (max-width: 991.98px) {
    .feature-card {
        margin-bottom: 2rem;
    }
    
    .feature-icon-wrapper {
        width: 60px !important;
        height: 60px !important;
    }
    
    .feature-icon-wrapper i {
        font-size: 1.3rem !important;
    }
    
    .card-body {
        padding: 1.5rem !important;
    }
}

@media (max-width: 767.98px) {
    .feature-card {
        border-radius: 15px !important;
    }
    
    .feature-icon-wrapper {
        width: 50px !important;
        height: 50px !important;
        border-radius: 12px !important;
    }
    
    .feature-icon-wrapper i {
        font-size: 1.1rem !important;
    }
    
    .card-body h4 {
        font-size: 1.1rem !important;
    }
    
    .btn-feature {
        padding: 10px 20px !important;
        font-size: 0.85rem !important;
    }
}

@media (max-width: 575.98px) {
    .feature-card:hover {
        transform: translateY(-4px) scale(1.01);
    }
    
    .feature-icon-wrapper {
        width: 45px !important;
        height: 45px !important;
    }
    
    .feature-icon-wrapper i {
        font-size: 1rem !important;
    }
    
    .point-indicator {
        width: 4px !important;
        height: 4px !important;
    }
    
    .feature-point span {
        font-size: 0.8rem !important;
    }
}

/* Touch device optimizations */
@media (hover: none) and (pointer: coarse) {
    .feature-card:hover {
        transform: none;
    }
    
    .feature-card:active {
        transform: scale(0.98);
    }
    
    .feature-icon-wrapper {
        transition: none;
    }
    
    .btn-feature {
        min-height: 48px;
    }
}

/* Dark mode support */
@media (prefers-color-scheme: dark) {
    .feature-card {
        background: linear-gradient(135deg, 
            rgba(255, 255, 255, 0.03) 0%, 
            rgba(255, 255, 255, 0.06) 50%, 
            rgba(255, 255, 255, 0.03) 100%
        ) !important;
    }
}

/* High contrast mode */
@media (prefers-contrast: high) {
    .feature-card {
        border: 2px solid #ffffff !important;
    }
    
    .feature-icon-wrapper {
        border: 2px solid #ffffff !important;
    }
    
    .btn-feature {
        border: 2px solid #ffffff !important;
    }
}

/* Reduced motion support */
@media (prefers-reduced-motion: reduce) {
    .feature-card,
    .feature-icon-wrapper,
    .btn-feature,
    .btn-icon,
    .btn-shine,
    .feature-point,
    .point-indicator {
        transition: none !important;
        animation: none !important;
    }
    
    .feature-card:hover {
        transform: none !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced responsive behavior
    function handleResponsiveChanges() {
        const screenWidth = window.innerWidth;
        const carousel = document.getElementById('heroCarousel');
        
        // Adjust carousel behavior based on screen size
        if (screenWidth < 768) {
            // Mobile optimizations
            carousel.setAttribute('data-bs-interval', '8000');
            
            // Disable complex animations on mobile
            document.querySelectorAll('.floating-shape, .circuit-line, .floating-leaf').forEach(el => {
                el.style.display = 'none';
            });
            
            // Simplify hover effects
            document.querySelectorAll('.metrics-card').forEach(card => {
                card.style.transition = 'transform 0.2s ease';
            });
        } else if (screenWidth < 992) {
            // Tablet optimizations
            carousel.setAttribute('data-bs-interval', '6000');
            
            // Show some animations
            document.querySelectorAll('.floating-shape').forEach(el => {
                el.style.display = 'block';
                el.style.animationDuration = '8s';
            });
        } else {
            // Desktop - full features
            carousel.setAttribute('data-bs-interval', '6000');
            
            // Enable all animations
            document.querySelectorAll('.floating-shape, .circuit-line, .floating-leaf, .metrics-particle').forEach(el => {
                el.style.display = 'block';
            });
        }
        
        // Adjust font sizes for very small screens
        if (screenWidth < 350) {
            document.documentElement.style.setProperty('--font-4xl', '1.8rem');
            document.documentElement.style.setProperty('--font-3xl', '1.5rem');
        }
    }
    
    // Handle orientation changes
    function handleOrientationChange() {
        setTimeout(() => {
            handleResponsiveChanges();
            
            // Recalculate carousel height
            const carousel = document.getElementById('heroCarousel');
            if (window.innerHeight < 600 && window.orientation !== undefined) {
                carousel.style.height = '100vh';
            }
        }, 100);
    }
    
    // Touch gesture handling for mobile
    let touchStartX = 0;
    let touchEndX = 0;
    
    function handleSwipe() {
        const swipeThreshold = 50;
        const diff = touchStartX - touchEndX;
        
        if (Math.abs(diff) > swipeThreshold) {
            const carousel = bootstrap.Carousel.getInstance(document.getElementById('heroCarousel'));
            if (diff > 0) {
                carousel.next();
            } else {
                carousel.prev();
            }
        }
    }
    
    document.addEventListener('touchstart', e => {
        touchStartX = e.changedTouches[0].screenX;
    });
    
    document.addEventListener('touchend', e => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
    });
    
    // Performance optimization for different devices
    function optimizePerformance() {
        const isLowPowerDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4;
        const isSlowConnection = navigator.connection && 
                               navigator.connection.effectiveType && 
                               (navigator.connection.effectiveType.includes('2g') || 
                                navigator.connection.effectiveType.includes('3g'));
        
        if (isLowPowerDevice || isSlowConnection) {
            // Reduce animations and effects
            document.querySelectorAll('.floating-shape, .circuit-line, .floating-leaf, .metrics-particle').forEach(el => {
                el.style.display = 'none';
            });
            
            // Lower quality backgrounds
            document.querySelectorAll('.hero-bg').forEach(bg => {
                bg.style.backgroundAttachment = 'scroll';
            });
        }
    }
    
    // Initialize responsive behavior
    handleResponsiveChanges();
    optimizePerformance();
    
    // Event listeners
    window.addEventListener('resize', debounce(handleResponsiveChanges, 250));
    window.addEventListener('orientationchange', handleOrientationChange);
    
    // Utility function to debounce resize events
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
    
    // Intersection Observer for better performance
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('.metrics-card, .hero-content-wrapper').forEach(el => {
        observer.observe(el);
    });
});

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

// Enhanced Metrics Section JavaScript
document.addEventListener('DOMContentLoaded', function() {
    // ===== ENHANCED COUNTER ANIMATION =====
    
    // Sophisticated counter animation with easing
    function animateCounter(element, target, duration = 2500) {
        const start = 0;
        const startTime = performance.now();
        
        // Easing function for smooth animation
        const easeOutQuart = (t) => 1 - Math.pow(1 - t, 4);
        
        function update(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeOutQuart(progress);
            
            const current = Math.floor(start + (target - start) * easedProgress);
            element.textContent = current;
            
            // Add visual feedback during counting
            if (progress < 1) {
                element.classList.add('counting');
                requestAnimationFrame(update);
            } else {
                element.classList.remove('counting');
                element.classList.add('completed');
                // Add completion effect
                element.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    element.style.transform = 'scale(1)';
                }, 200);
            }
        }
        
        requestAnimationFrame(update);
    }
    
    // ===== INTERSECTION OBSERVER FOR METRICS =====
    
    const metricsObserverOptions = {
        threshold: 0.2,
        rootMargin: '0px 0px -100px 0px'
    };
    
    const metricsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const section = entry.target;
                
                // Animate counters with staggered delays
                const counters = section.querySelectorAll('.counter');
                counters.forEach((counter, index) => {
                    if (!counter.classList.contains('animated')) {
                        const target = parseInt(counter.getAttribute('data-target'));
                        const delay = index * 300; // Staggered animation
                        
                        setTimeout(() => {
                            animateCounter(counter, target, 2000 + (index * 200));
                            counter.classList.add('animated');
                        }, delay);
                    }
                });
                
                // Animate cards with staggered entrance
                const cards = section.querySelectorAll('.metrics-card');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.transform = 'translateY(0) rotateX(0)';
                        card.style.opacity = '1';
                    }, index * 150);
                });
                
                // Animate progress bars
                setTimeout(() => {
                    const progressBars = section.querySelectorAll('.metrics-progress-bar');
                    progressBars.forEach((bar, index) => {
                        setTimeout(() => {
                            bar.style.transform = 'translateX(0)';
                        }, index * 200);
                    });
                }, 1000);
                
                // Stop observing after animation
                metricsObserver.unobserve(entry.target);
            }
        });
    }, metricsObserverOptions);
    
    // Start observing metrics section
    const metricsSection = document.querySelector('#metricsSection');
    if (metricsSection) {
        // Initialize cards for animation
        const cards = metricsSection.querySelectorAll('.metrics-card');
        cards.forEach(card => {
            card.style.transform = 'translateY(50px) rotateX(10deg)';
            card.style.opacity = '0';
            card.style.transition = 'all 0.8s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        });
        
        // Initialize progress bars
        const progressBars = metricsSection.querySelectorAll('.metrics-progress-bar');
        progressBars.forEach(bar => {
            bar.style.transform = 'translateX(-100%)';
        });
        
        metricsObserver.observe(metricsSection);
    }
    
    // ===== ENHANCED CARD INTERACTIONS =====
    
    const metricsCards = document.querySelectorAll('.metrics-card');
    metricsCards.forEach(card => {
        // Enhanced hover effects
        card.addEventListener('mouseenter', function() {
            // Pause animations on hover for better UX
            this.style.animationPlayState = 'paused';
            
            // Add subtle parallax effect to icon
            const icon = this.querySelector('.metrics-icon-bg');
            if (icon) {
                icon.style.transform = 'rotateY(10deg) rotateX(5deg) scale(1.1)';
            }
            
            // Enhance number glow
            const numberGlow = this.querySelector('.metrics-number-glow');
            if (numberGlow) {
                numberGlow.style.opacity = '1';
                numberGlow.style.transform = 'scale(1.2)';
            }
        });
        
        card.addEventListener('mouseleave', function() {
            // Resume animations
            this.style.animationPlayState = 'running';
            
            // Reset transforms
            const icon = this.querySelector('.metrics-icon-bg');
            if (icon) {
                icon.style.transform = 'rotateY(0deg) rotateX(0deg) scale(1)';
            }
            
            const numberGlow = this.querySelector('.metrics-number-glow');
            if (numberGlow) {
                numberGlow.style.opacity = '0';
                numberGlow.style.transform = 'scale(1)';
            }
        });
        
        // Add touch support for mobile
        card.addEventListener('touchstart', function() {
            this.classList.add('touch-active');
        });
        
        card.addEventListener('touchend', function() {
            setTimeout(() => {
                this.classList.remove('touch-active');
            }, 150);
        });
    });
    
    // ===== PERFORMANCE OPTIMIZATIONS =====
    
    // Throttle resize events
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            // Recalculate animations if needed
            const cards = document.querySelectorAll('.metrics-card');
            cards.forEach(card => {
                // Reset transforms on resize to prevent layout issues
                if (window.innerWidth <= 768) {
                    card.style.transform = 'translateY(0)';
                }
            });
        }, 250);
    });
    
    // ===== ACCESSIBILITY ENHANCEMENTS =====
    
    // Respect reduced motion preferences
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        // Disable complex animations
        const style = document.createElement('style');
        style.textContent = `
            .metrics-card {
                transition: transform 0.2s ease !important;
            }
            .metrics-card:hover {
                transform: translateY(-5px) !important;
            }
        `;
        document.head.appendChild(style);
    }
    
    // Keyboard navigation support
    metricsCards.forEach((card, index) => {
        card.setAttribute('tabindex', '0');
        card.setAttribute('role', 'article');
        card.setAttribute('aria-label', `Metric ${index + 1}`);
        
        card.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
        
        card.addEventListener('focus', function() {
            this.style.outline = '2px solid var(--color-industrial-orange)';
            this.style.outlineOffset = '4px';
        });
        
        card.addEventListener('blur', function() {
            this.style.outline = 'none';
        });
    });
    
    // ===== DYNAMIC CONTENT LOADING =====
    
    // Add loading states
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        counter.setAttribute('aria-live', 'polite');
        counter.setAttribute('aria-label', 'Loading metric value');
    });
    
    // Update ARIA labels after animation
    setTimeout(() => {
        counters.forEach(counter => {
            const value = counter.textContent;
            const label = counter.closest('.metrics-card').querySelector('.metrics-label').textContent;
            counter.setAttribute('aria-label', `${label}: ${value}`);
        });
    }, 4000);
});

// ===== FALLBACK FOR OLDER BROWSERS =====
if (!window.IntersectionObserver) {
    // Fallback for browsers without IntersectionObserver
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.counter');
        counters.forEach((counter, index) => {
            const target = parseInt(counter.getAttribute('data-target'));
            setTimeout(() => {
                animateCounter(counter, target);
            }, index * 300);
        });
    });
}
</script>

<?php include 'includes/footer.php'; ?>