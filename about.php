<?php
require_once 'config/config.php';
$page_title = 'About Us - Automation Indus                <div class="col-lg-3 col-md-6" da                <div class=                <div class=                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="card border-0 shadow-sm text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="David Chen" 
                                     class="rounded-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1 text-white">David Chen</h5>
                            <p class="text-warning fw-semibold mb-2">Lead Engineer</p>
                            <p class="text-light opacity-75 small">Specialist in IoT integration and process optimization systems</p>l-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="card border-0 shadow-sm text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="Sarah Mitchell" 
                                     class="rounded-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1 text-white">Sarah Mitchell</h5>
                            <p class="text-success fw-semibold mb-2">CTO</p>
                            <p class="text-light opacity-75 small">Expert in AI and robotics with PhD in Mechanical Engineering</p>l-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="card border-0 shadow-sm text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="position-relative d-inline-block mb-3">
                                <img src="public/icons/placeholder-user.jpg" 
                                     alt="John Anderson" 
                                     class="rounded-circle" 
                                     style="width: 120px; height: 120px; object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-1 text-white">John Anderson</h5>
                            <p class="fw-semibold mb-2" style="color: var(--color-platinum);">CEO & Founder</p>
                            <p class="text-light opacity-75 small">15+ years of experience in industrial automation and strategic business development</p>-left" data-aos-delay="300">
                    <div class="card border-0 shadow-sm h-100 text-center" style="background-color: #343a40;">
                        <div class="card-body p-4">
                            <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" 
                                 style="width: 80px; height: 80px;">
                                <i class="fas fa-trophy text-white fs-2"></i>
                            </div>
                            <h4 class="fw-bold mb-3 text-white">Excellence</h4>
                            <p class="text-light opacity-75">Delivering the highest quality in everything we do, exceeding expectations</p>ions';
include 'includes/header.php';
?>

<style>
:root {
    --color-gunmetal: #2C3A47;
    --color-platinum: #D8D5DB;
    --color-french-gray: #BFBDC1;
    --color-dark-gray: #57606F;
    --primary-gradient: linear-gradient(135deg, #2C3A47 0%, #1a1d2e 50%, #0f1419 100%);
    --secondary-gradient: linear-gradient(135deg, #D8D5DB 0%, #BFBDC1 100%);
}

/* Advanced Animation Keyframes */
@keyframes floating {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    25% { transform: translateY(-10px) rotate(1deg); }
    50% { transform: translateY(-20px) rotate(0deg); }
    75% { transform: translateY(-10px) rotate(-1deg); }
}

@keyframes pulseGlow {
    0%, 100% { 
        box-shadow: 0 0 20px rgba(216, 213, 219, 0.3);
        transform: scale(1);
    }
    50% { 
        box-shadow: 0 0 40px rgba(216, 213, 219, 0.6);
        transform: scale(1.02);
    }
}

@keyframes slideInFromLeft {
    0% { 
        opacity: 0; 
        transform: translateX(-100px) rotate(-5deg); 
    }
    100% { 
        opacity: 1; 
        transform: translateX(0) rotate(0deg); 
    }
}

@keyframes slideInFromRight {
    0% { 
        opacity: 0; 
        transform: translateX(100px) rotate(5deg); 
    }
    100% { 
        opacity: 1; 
        transform: translateX(0) rotate(0deg); 
    }
}

@keyframes fadeInUp {
    0% { 
        opacity: 0; 
        transform: translateY(60px) scale(0.9); 
    }
    100% { 
        opacity: 1; 
        transform: translateY(0) scale(1); 
    }
}

@keyframes textShimmer {
    0%, 100% { background-position: 200% 0; }
    50% { background-position: -200% 0; }
}

@keyframes particleFloat {
    0%, 100% { transform: translate(0, 0) rotate(0deg); }
    25% { transform: translate(10px, -10px) rotate(90deg); }
    50% { transform: translate(-5px, -20px) rotate(180deg); }
    75% { transform: translate(-10px, -10px) rotate(270deg); }
}

@keyframes morphingBlob {
    0%, 100% { border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; }
    25% { border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%; }
    50% { border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%; }
    75% { border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%; }
}

@keyframes countUp {
    0% { 
        opacity: 0; 
        transform: scale(0.5) rotate(-180deg); 
    }
    50% { 
        opacity: 0.7; 
        transform: scale(1.1) rotate(-90deg); 
    }
    100% { 
        opacity: 1; 
        transform: scale(1) rotate(0deg); 
    }
}

@keyframes liquidWave {
    0%, 100% { transform: translateX(0) translateY(0) scaleY(1); }
    25% { transform: translateX(5px) translateY(-5px) scaleY(1.1); }
    50% { transform: translateX(-5px) translateY(-10px) scaleY(0.9); }
    75% { transform: translateX(3px) translateY(-5px) scaleY(1.05); }
}

/* Modern CSS Classes */
.hero-gradient {
    background: var(--primary-gradient);
    position: relative;
    overflow: hidden;
}

.hero-gradient::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 50%, rgba(216, 213, 219, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 40% 80%, rgba(216, 213, 219, 0.08) 0%, transparent 50%);
    animation: liquidWave 8s ease-in-out infinite;
}

.glass-morphism {
    backdrop-filter: blur(20px) saturate(180%);
    background: rgba(255, 255, 255, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
}

.floating-animation {
    animation: floating 6s ease-in-out infinite;
}

.pulse-glow {
    animation: pulseGlow 3s ease-in-out infinite;
}

.slide-in-left {
    animation: slideInFromLeft 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.slide-in-right {
    animation: slideInFromRight 1.2s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.fade-in-up {
    animation: fadeInUp 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.text-shimmer {
    background: linear-gradient(90deg, #D8D5DB, #fff, #D8D5DB);
    background-size: 200% 100%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: textShimmer 3s ease-in-out infinite;
}

.interactive-card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    position: relative;
    overflow: hidden;
    cursor: pointer;
}

.interactive-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
    transition: all 0.6s ease;
    z-index: 1;
}

.interactive-card:hover::before {
    left: 100%;
}

.interactive-card:hover {
    transform: translateY(-15px) scale(1.03);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

.morphing-blob {
    animation: morphingBlob 8s ease-in-out infinite;
}

.particle-field {
    position: absolute;
    width: 100%;
    height: 100%;
    overflow: hidden;
    pointer-events: none;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(216, 213, 219, 0.6);
    border-radius: 50%;
    animation: particleFloat 6s linear infinite;
}

.particle:nth-child(1) { top: 10%; left: 10%; animation-delay: 0s; }
.particle:nth-child(2) { top: 20%; left: 80%; animation-delay: 1s; }
.particle:nth-child(3) { top: 70%; left: 20%; animation-delay: 2s; }
.particle:nth-child(4) { top: 80%; left: 90%; animation-delay: 3s; }
.particle:nth-child(5) { top: 40%; left: 60%; animation-delay: 4s; }

.counter-number {
    animation: countUp 2s ease-out;
}

.gradient-text {
    background: var(--secondary-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hover-lift {
    transition: all 0.3s ease;
}

.hover-lift:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
}

.team-card-3d {
    perspective: 1000px;
    height: 400px;
}

.team-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    transform-style: preserve-3d;
}

.team-card-3d:hover .team-card-inner {
    transform: rotateY(180deg);
}

.team-card-front, .team-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
    border-radius: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

.team-card-back {
    background: var(--primary-gradient);
    transform: rotateY(180deg);
    color: white;
    padding: 30px;
}

.skill-bar {
    width: 100%;
    height: 6px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 3px;
    overflow: hidden;
    margin: 8px 0;
}

.skill-progress {
    height: 100%;
    background: linear-gradient(90deg, #ffc107, #28a745, #17a2b8);
    border-radius: 3px;
    transition: width 2s ease-out;
}

.magnetic-button {
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    position: relative;
    overflow: hidden;
}

.magnetic-button::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255, 255, 255, 0.1);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.6s ease;
}

.magnetic-button:hover::before {
    width: 300px;
    height: 300px;
}

.magnetic-button:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
}

/* Responsive Enhancements */
@media (max-width: 768px) {
    .floating-animation {
        animation-duration: 4s;
    }
    
    .team-card-3d {
        height: 350px;
    }
    
    .interactive-card:hover {
        transform: translateY(-10px) scale(1.02);
    }
}

/* Scroll-triggered animations */
.reveal {
    opacity: 0;
    transform: translateY(50px);
    transition: all 0.8s ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Custom scrollbar styling */
::-webkit-scrollbar {
    width: 8px;
}

::-webkit-scrollbar-track {
    background: var(--color-gunmetal);
}

::-webkit-scrollbar-thumb {
    background: var(--color-platinum);
    border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-french-gray);
}

html {
    scroll-behavior: smooth;
}
</style>

<main class="pt-5">
    <!-- Enhanced Hero Section -->
    <section class="hero-gradient py-5 position-relative overflow-hidden">
        <!-- Particle Field -->
        <div class="particle-field">
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
            <div class="particle"></div>
        </div>
        
        <div class="container position-relative">
            <div class="row align-items-center min-vh-75">
                <div class="col-lg-6 slide-in-left">
                    <div class="glass-morphism p-4 mb-4 d-inline-block">
                        <span class="badge bg-warning text-dark px-4 py-2 fs-6 fw-bold">
                            <i class="fas fa-rocket me-2"></i>Our Journey Since 2010
                        </span>
                    </div>
                    
                    <h1 class="display-3 fw-bold mb-4 text-white">
                        Pioneering the Future of 
                        <span class="text-shimmer d-block">Industrial Automation</span>
                    </h1>
                    
                    <p class="fs-5 mb-5 text-light opacity-90 lh-lg">
                        Founded with a vision to revolutionize industrial automation, we've grown from a passionate team of engineers into a global leader, transforming manufacturing processes worldwide through cutting-edge technology and innovative solutions.
                    </p>
                    
                    <!-- Enhanced Stats Cards -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="glass-morphism text-white text-center p-4 hover-lift">
                                <div class="morphing-blob bg-warning d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-calendar-alt text-dark fs-4"></i>
                                </div>
                                <h3 class="fw-bold text-warning counter-number mb-1">15+</h3>
                                <p class="mb-0 small opacity-75">Years of Excellence</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="glass-morphism text-white text-center p-4 hover-lift">
                                <div class="morphing-blob bg-success d-inline-flex align-items-center justify-content-center mb-3" 
                                     style="width: 60px; height: 60px;">
                                    <i class="fas fa-project-diagram text-white fs-4"></i>
                                </div>
                                <h3 class="fw-bold text-success counter-number mb-1">500+</h3>
                                <p class="mb-0 small opacity-75">Projects Delivered</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 slide-in-right">
                    <div class="position-relative">
                        <div class="floating-animation">
                            <img src="public/hero/industrial-automation-hero.jpg" 
                                 alt="Industrial Automation Hero" 
                                 class="img-fluid rounded-4 shadow-lg pulse-glow">
                        </div>
                        
                        <!-- Floating Info Cards -->
                        <div class="position-absolute top-0 end-0 glass-morphism p-3 m-3 fade-in-up" 
                             style="animation-delay: 1s;">
                            <div class="text-white text-center">
                                <i class="fas fa-award text-warning fs-3 mb-2"></i>
                                <div class="fw-bold">ISO Certified</div>
                                <small class="opacity-75">Quality Assured</small>
                            </div>
                        </div>
                        
                        <div class="position-absolute bottom-0 start-0 glass-morphism p-3 m-3 fade-in-up" 
                             style="animation-delay: 1.5s;">
                            <div class="text-white text-center">
                                <i class="fas fa-globe text-info fs-3 mb-2"></i>
                                <div class="fw-bold">25+ Countries</div>
                                <small class="opacity-75">Global Presence</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Core Values Section -->
    <section class="py-5 position-relative" style="background: linear-gradient(135deg, #212529 0%, #1a1d2e 100%);">
        <div class="container">
            <div class="row mb-5 text-center reveal">
                <div class="col-12">
                    <div class="glass-morphism d-inline-block px-4 py-2 mb-4">
                        <span class="text-white fw-bold">
                            <i class="fas fa-heart me-2 text-danger"></i>Our Core Values
                        </span>
                    </div>
                    <h2 class="display-4 fw-bold text-white mb-4">
                        What Drives Us <span class="gradient-text">Forward</span>
                    </h2>
                    <p class="fs-5 text-light opacity-75 col-lg-8 mx-auto">
                        Our fundamental principles that guide every decision, innovation, and partnership we forge
                    </p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="interactive-card glass-morphism h-100 text-center p-4 reveal" 
                         style="animation-delay: 0.2s;">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-4 pulse-glow" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-lightbulb text-white fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-white">Innovation</h4>
                        <p class="text-light opacity-75 mb-3">Constantly pushing boundaries to create cutting-edge solutions that transform industries</p>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 95%;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="interactive-card glass-morphism h-100 text-center p-4 reveal" 
                         style="animation-delay: 0.4s;">
                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-4 pulse-glow" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-handshake text-white fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-white">Collaboration</h4>
                        <p class="text-light opacity-75 mb-3">Working together with clients and partners to achieve exceptional results</p>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 92%;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="interactive-card glass-morphism h-100 text-center p-4 reveal" 
                         style="animation-delay: 0.6s;">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-4 pulse-glow" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-trophy text-white fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-white">Excellence</h4>
                        <p class="text-light opacity-75 mb-3">Delivering the highest quality in everything we do, exceeding expectations</p>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 98%;"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <div class="interactive-card glass-morphism h-100 text-center p-4 reveal" 
                         style="animation-delay: 0.8s;">
                        <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-4 pulse-glow" 
                             style="width: 80px; height: 80px;">
                            <i class="fas fa-leaf text-white fs-2"></i>
                        </div>
                        <h4 class="fw-bold mb-3 text-white">Sustainability</h4>
                        <p class="text-light opacity-75 mb-3">Creating solutions that protect our environment for future generations</p>
                        <div class="skill-bar">
                            <div class="skill-progress" style="width: 89%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Team Section -->
    <section class="py-5 position-relative" style="background: linear-gradient(135deg, #1a1d2e 0%, #2C3A47 100%);">
        <div class="container">
            <div class="row mb-5 text-center reveal">
                <div class="col-12">
                    <div class="glass-morphism d-inline-block px-4 py-2 mb-4">
                        <span class="text-white fw-bold">
                            <i class="fas fa-users me-2 text-primary"></i>Meet Our Team
                        </span>
                    </div>
                    <h2 class="display-4 fw-bold text-white mb-4">
                        The <span class="gradient-text">Innovators</span> Behind Our Success
                    </h2>
                    <p class="fs-5 text-light opacity-75 col-lg-8 mx-auto">
                        Meet the visionary experts who make automation dreams a reality through passion, expertise, and innovation
                    </p>
                </div>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-3d reveal" style="animation-delay: 0.2s;">
                        <div class="team-card-inner">
                            <div class="team-card-front glass-morphism">
                                <div class="p-4">
                                    <div class="position-relative d-inline-block mb-4">
                                        <img src="public/icons/placeholder-user.jpg" 
                                             alt="John Anderson" 
                                             class="rounded-circle shadow-lg floating-animation"
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-white">John Anderson</h5>
                                    <p class="text-warning fw-semibold mb-2">CEO & Founder</p>
                                    <p class="text-light opacity-75 small">15+ years of experience in industrial automation</p>
                                </div>
                            </div>
                            <div class="team-card-back">
                                <div class="text-center">
                                    <h5 class="fw-bold mb-3">John Anderson</h5>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Leadership</span>
                                            <span>95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Strategy</span>
                                            <span>92%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 92%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Innovation</span>
                                            <span>98%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 98%;"></div>
                                        </div>
                                    </div>
                                    <p class="small opacity-75">Visionary leader driving our mission to revolutionize industrial automation globally.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-3d reveal" style="animation-delay: 0.4s;">
                        <div class="team-card-inner">
                            <div class="team-card-front glass-morphism">
                                <div class="p-4">
                                    <div class="position-relative d-inline-block mb-4">
                                        <img src="public/icons/placeholder-user.jpg" 
                                             alt="Sarah Mitchell" 
                                             class="rounded-circle shadow-lg floating-animation"
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="position-absolute bottom-0 end-0 bg-info rounded-circle p-2">
                                            <i class="fas fa-brain text-white"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-white">Sarah Mitchell</h5>
                                    <p class="text-success fw-semibold mb-2">CTO</p>
                                    <p class="text-light opacity-75 small">Expert in AI and robotics with PhD in Mechanical Engineering</p>
                                </div>
                            </div>
                            <div class="team-card-back">
                                <div class="text-center">
                                    <h5 class="fw-bold mb-3">Sarah Mitchell</h5>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>AI & Robotics</span>
                                            <span>98%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 98%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>System Design</span>
                                            <span>96%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 96%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>R&D</span>
                                            <span>94%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 94%;"></div>
                                        </div>
                                    </div>
                                    <p class="small opacity-75">Technology innovator developing next-generation automation solutions.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6">
                    <div class="team-card-3d reveal" style="animation-delay: 0.6s;">
                        <div class="team-card-inner">
                            <div class="team-card-front glass-morphism">
                                <div class="p-4">
                                    <div class="position-relative d-inline-block mb-4">
                                        <img src="public/icons/placeholder-user.jpg" 
                                             alt="David Chen" 
                                             class="rounded-circle shadow-lg floating-animation"
                                             style="width: 150px; height: 150px; object-fit: cover;">
                                        <div class="position-absolute bottom-0 end-0 bg-warning rounded-circle p-2">
                                            <i class="fas fa-cogs text-dark"></i>
                                        </div>
                                    </div>
                                    <h5 class="fw-bold mb-2 text-white">David Chen</h5>
                                    <p class="text-warning fw-semibold mb-2">Lead Engineer</p>
                                    <p class="text-light opacity-75 small">Specialist in IoT integration and process optimization</p>
                                </div>
                            </div>
                            <div class="team-card-back">
                                <div class="text-center">
                                    <h5 class="fw-bold mb-3">David Chen</h5>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>IoT Systems</span>
                                            <span>96%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 96%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Process Optimization</span>
                                            <span>93%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 93%;"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>Implementation</span>
                                            <span>97%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 97%;"></div>
                                        </div>
                                    </div>
                                    <p class="small opacity-75">Engineering expert ensuring seamless integration and optimization.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Global Impact Section -->
    <section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #2C3A47 0%, #212529 100%);">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 reveal slide-in-left">
                    <div class="glass-morphism d-inline-block px-4 py-2 mb-4">
                        <span class="text-white fw-bold">
                            <i class="fas fa-globe-americas me-2 text-info"></i>Global Impact
                        </span>
                    </div>
                    
                    <h2 class="display-4 fw-bold text-white mb-4">
                        Worldwide <span class="gradient-text">Presence</span>
                    </h2>
                    
                    <p class="fs-5 text-light opacity-90 mb-4">
                        Our solutions span across continents, from automotive manufacturing in Germany to semiconductor facilities in Asia, helping companies achieve unprecedented levels of efficiency and innovation.
                    </p>
                    
                    <!-- Enhanced Statistics Grid -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="glass-morphism text-center p-4 hover-lift">
                                <div class="counter-number">
                                    <h3 class="fw-bold text-warning mb-1">25+</h3>
                                </div>
                                <p class="text-light opacity-75 mb-0 small">Countries Served</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="glass-morphism text-center p-4 hover-lift">
                                <div class="counter-number">
                                    <h3 class="fw-bold text-success mb-1">150+</h3>
                                </div>
                                <p class="text-light opacity-75 mb-0 small">Global Partners</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="glass-morphism text-center p-4 hover-lift">
                                <div class="counter-number">
                                    <h3 class="fw-bold text-info mb-1">500K+</h3>
                                </div>
                                <p class="text-light opacity-75 mb-0 small">Active Users</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Industry Impact List -->
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-primary rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-car text-white"></i>
                                </div>
                                <span class="fw-semibold">Automotive Industry</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-success rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-microchip text-white"></i>
                                </div>
                                <span class="fw-semibold">Semiconductor</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-warning rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-industry text-dark"></i>
                                </div>
                                <span class="fw-semibold">Manufacturing</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light">
                                <div class="bg-info rounded-circle p-2 me-3 flex-shrink-0" style="width: 40px; height: 40px;">
                                    <i class="fas fa-pills text-white"></i>
                                </div>
                                <span class="fw-semibold">Pharmaceuticals</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 reveal slide-in-right">
                    <div class="position-relative">
                        <div class="floating-animation">
                            <img src="public/freepics/engineer-cooperation-male-female-technician-maintenance-control-relay-robot-arm-system-welding-with-tablet-laptop-control-quality-operate-process-work-heavy-industry-40-manufacturing-factory.jpg" 
                                 alt="Global Manufacturing" 
                                 class="img-fluid rounded-4 shadow-lg pulse-glow">
                        </div>
                        
                        <!-- Floating Achievement Badges -->
                        <div class="position-absolute top-0 start-0 glass-morphism p-3 m-3 fade-in-up" 
                             style="animation-delay: 1s;">
                            <div class="text-white text-center">
                                <i class="fas fa-medal text-warning fs-3 mb-2"></i>
                                <div class="fw-bold small">Best Innovation</div>
                                <small class="opacity-75">2023 Award</small>
                            </div>
                        </div>
                        
                        <div class="position-absolute bottom-0 end-0 glass-morphism p-3 m-3 fade-in-up" 
                             style="animation-delay: 1.5s;">
                            <div class="text-white text-center">
                                <i class="fas fa-chart-line text-success fs-3 mb-2"></i>
                                <div class="fw-bold small">40% Growth</div>
                                <small class="opacity-75">This Year</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Call to Action -->
    <section class="py-5 position-relative overflow-hidden" style="background: linear-gradient(135deg, #1a1d2e 0%, #2C3A47 50%, #212529 100%);">
        <!-- Enhanced Background Effects -->
        <div class="position-absolute top-0 start-0 w-100 h-100" style="opacity: 0.1;">
            <div class="position-absolute morphing-blob" 
                 style="top: 10%; left: 5%; width: 200px; height: 200px; background: var(--color-platinum); filter: blur(60px);"></div>
            <div class="position-absolute morphing-blob" 
                 style="top: 60%; right: 10%; width: 250px; height: 250px; background: var(--color-french-gray); filter: blur(80px); animation-delay: 2s;"></div>
            <div class="position-absolute morphing-blob" 
                 style="bottom: 20%; left: 15%; width: 150px; height: 150px; background: var(--color-platinum); filter: blur(50px); animation-delay: 4s;"></div>
        </div>
        
        <div class="container position-relative">
            <div class="row align-items-center py-5">
                <div class="col-lg-7 reveal slide-in-left">
                    <div class="mb-4">
                        <div class="glass-morphism d-inline-block px-4 py-2 mb-3">
                            <span class="text-white fw-bold">
                                <i class="fas fa-rocket me-2 text-warning"></i>Start Your Digital Transformation
                            </span>
                        </div>
                    </div>
                    
                    <h2 class="display-3 fw-bold text-white mb-4">
                        Ready to <span class="text-shimmer">Transform</span> Your Operations?
                    </h2>
                    
                    <p class="fs-5 text-light mb-4 opacity-90 lh-lg">
                        Join <strong class="text-warning">500+ companies</strong> that have revolutionized their manufacturing processes with our cutting-edge automation solutions. Experience increased efficiency, reduced costs, and enhanced productivity.
                    </p>
                    
                    <!-- Enhanced Benefits List -->
                    <div class="row g-3 mb-5">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light hover-lift p-2 rounded">
                                <div class="bg-success rounded-circle p-2 me-3 flex-shrink-0 pulse-glow" style="width: 40px; height: 40px;">
                                    <i class="fas fa-check text-white"></i>
                                </div>
                                <span class="fw-semibold">Free Consultation & Analysis</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light hover-lift p-2 rounded">
                                <div class="bg-warning rounded-circle p-2 me-3 flex-shrink-0 pulse-glow" style="width: 40px; height: 40px;">
                                    <i class="fas fa-clock text-dark"></i>
                                </div>
                                <span class="fw-semibold">Quick Implementation</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light hover-lift p-2 rounded">
                                <div class="bg-info rounded-circle p-2 me-3 flex-shrink-0 pulse-glow" style="width: 40px; height: 40px;">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <span class="fw-semibold">24/7 Expert Support</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center text-light hover-lift p-2 rounded">
                                <div class="bg-primary rounded-circle p-2 me-3 flex-shrink-0 pulse-glow" style="width: 40px; height: 40px;">
                                    <i class="fas fa-trophy text-white"></i>
                                </div>
                                <span class="fw-semibold">Industry-Leading Solutions</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Action Panel -->
                <div class="col-lg-5 reveal slide-in-right" style="animation-delay: 0.3s;">
                    <div class="glass-morphism p-5 rounded-4 shadow-lg position-relative">
                        <!-- Decorative Corner -->
                        <div class="position-absolute top-0 end-0 m-3">
                            <div class="morphing-blob p-3" style="background: var(--primary-gradient); width: 60px; height: 60px;">
                                <i class="fas fa-industry text-white d-flex align-items-center justify-content-center h-100"></i>
                            </div>
                        </div>
                        
                        <div class="text-center mb-4">
                            <h3 class="fw-bold mb-3 text-white">Get Your Free Consultation</h3>
                            <p class="text-light opacity-75 mb-0">Discover how automation can transform your business in just 30 minutes.</p>
                        </div>
                        
                        <!-- Enhanced Action Buttons -->
                        <div class="d-grid gap-3 mb-4">
                            <a href="contact.php" class="magnetic-button btn btn-lg py-3 fw-semibold text-white border-0" 
                               style="background: var(--primary-gradient);">
                                <span class="position-relative z-2">
                                    <i class="fas fa-calendar-check me-2"></i>Schedule Free Consultation
                                </span>
                            </a>
                            
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <a href="tel:+15551234567" class="magnetic-button btn btn-outline-light btn-lg py-3 fw-semibold w-100">
                                        <i class="fas fa-phone me-2"></i>Call Now
                                    </a>
                                </div>
                                <div class="col-sm-6">
                                    <a href="services.php" class="magnetic-button btn btn-lg py-3 fw-semibold w-100 text-dark" 
                                       style="background: var(--color-platinum);">
                                        <i class="fas fa-cogs me-2"></i>Our Services
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Enhanced Trust Indicators -->
                        <div class="text-center pt-4" style="border-top: 1px solid rgba(255, 255, 255, 0.2);">
                            <div class="row text-center">
                                <div class="col-4">
                                    <div class="counter-number fw-bold text-warning">500+</div>
                                    <small class="text-light opacity-75">Projects</small>
                                </div>
                                <div class="col-4">
                                    <div class="counter-number fw-bold text-success">98%</div>
                                    <small class="text-light opacity-75">Success Rate</small>
                                </div>
                                <div class="col-4">
                                    <div class="counter-number fw-bold text-info">15+</div>
                                    <small class="text-light opacity-75">Years Exp.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Enhanced JavaScript for Interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Reveal animation on scroll
    const revealElements = document.querySelectorAll('.reveal');
    
    const revealOnScroll = () => {
        revealElements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.classList.add('active');
            }
        });
    };
    
    window.addEventListener('scroll', revealOnScroll);
    revealOnScroll(); // Initial check
    
    // Counter animation
    const counters = document.querySelectorAll('.counter-number');
    let hasAnimated = false;
    
    const animateCounters = () => {
        if (hasAnimated) return;
        
        counters.forEach(counter => {
            const countElement = counter.querySelector('h3, .fw-bold');
            if (!countElement) return;
            
            const target = countElement.innerText;
            const number = parseInt(target.replace(/\D/g, ''));
            const suffix = target.replace(/\d/g, '');
            
            if (isNaN(number)) return;
            
            let current = 0;
            const increment = number / 50;
            
            const updateCounter = () => {
                if (current < number) {
                    current += increment;
                    countElement.innerText = Math.floor(current) + suffix;
                    requestAnimationFrame(updateCounter);
                } else {
                    countElement.innerText = target;
                }
            };
            
            updateCounter();
        });
        
        hasAnimated = true;
    };
    
    // Trigger counter animation when in view
    const observeCounters = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounters();
            }
        });
    });
    
    counters.forEach(counter => observeCounters.observe(counter));
    
    // Magnetic effect for buttons
    const magneticButtons = document.querySelectorAll('.magnetic-button');
    
    magneticButtons.forEach(button => {
        button.addEventListener('mousemove', (e) => {
            const rect = button.getBoundingClientRect();
            const x = e.clientX - rect.left - rect.width / 2;
            const y = e.clientY - rect.top - rect.height / 2;
            
            button.style.setProperty('--mouse-x', `${x * 0.3}px`);
            button.style.setProperty('--mouse-y', `${y * 0.3}px`);
        });
        
        button.addEventListener('mouseleave', () => {
            button.style.setProperty('--mouse-x', '0px');
            button.style.setProperty('--mouse-y', '0px');
        });
    });
    
    // Smooth scrolling for internal links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Progressive skill bar animation
    const skillBars = document.querySelectorAll('.skill-progress');
    const observeSkills = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const bar = entry.target;
                const width = bar.style.width;
                bar.style.width = '0%';
                
                setTimeout(() => {
                    bar.style.transition = 'width 2s ease-out';
                    bar.style.width = width;
                }, 200);
            }
        });
    });
    
    skillBars.forEach(bar => observeSkills.observe(bar));
    
    // Enhanced parallax effect
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.floating-animation');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            const yPos = -(scrolled * speed);
            element.style.transform = `translateY(${yPos}px)`;
        });
    });
    
    // Dynamic particle generation
    const createParticles = () => {
        const particleFields = document.querySelectorAll('.particle-field');
        
        particleFields.forEach(field => {
            for (let i = 0; i < 5; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 6 + 's';
                particle.style.animationDuration = (6 + Math.random() * 4) + 's';
                field.appendChild(particle);
            }
        });
    };
    
    createParticles();
});
</script>

<?php include 'includes/footer.php'; ?>