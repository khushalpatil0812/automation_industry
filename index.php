<?php
require_once 'config/config.php';
require_once 'classes/Service.php';
$page_title = 'Home - Automation Industry Solutions';
include 'includes/header.php';
?>
<main id="main-content">
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background"></div>
        <div class="hero-container">
            <div class="hero-content">
                <div class="hero-badge">Industry 4.0 Solutions</div>
                <h1 class="hero-title">
                    <span class="gradient-text">Transform Manufacturing</span>
                    <br>with Smart Automation
                </h1>
                <p class="hero-subtitle">Revolutionize your production with cutting-edge robotics, IoT integration, and AI-powered solutions designed for the future of manufacturing.</p>
                
                <div class="hero-cta-buttons">
                    <a href="contact.php" class="btn btn-primary animated-btn">
                        <span>Get Started Today</span>
                        <div class="btn-glow"></div>
                    </a>
                    <a href="services.php" class="btn btn-outline">
                        <span>Explore Services</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Compact Animated Metrics Section -->
    <section class="metrics-section">
        <div class="container">
            <div class="metrics-wrapper">
                <div class="metrics-grid">
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="100">
                        <div class="metric-icon">
                            <span class="icon-bg">🏭</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="500">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Automated Systems</div>
                        <div class="metric-description">Successfully deployed</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="200">
                        <div class="metric-icon">
                            <span class="icon-bg">📈</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="98">0</div>
                            <div class="metric-suffix">%</div>
                        </div>
                        <div class="metric-label">Efficiency Increase</div>
                        <div class="metric-description">Average improvement</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="300">
                        <div class="metric-icon">
                            <span class="icon-bg">🤝</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="150">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Industry Partners</div>
                        <div class="metric-description">Trusted manufacturers</div>
                    </div>
                    
                    <div class="metric-card modern" data-aos="fade-up" data-aos-delay="400">
                        <div class="metric-icon">
                            <span class="icon-bg">🏆</span>
                        </div>
                        <div class="metric-content">
                            <div class="metric-number" data-target="15">0</div>
                            <div class="metric-suffix">+</div>
                        </div>
                        <div class="metric-label">Years Experience</div>
                        <div class="metric-description">Proven track record</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Features Section -->
    <section class="features">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Why Choose Us</span>
                <h2 class="section-title">Advanced Automation Solutions</h2>
                <p class="section-subtitle">Cutting-edge technology meets industrial expertise to deliver unparalleled automation solutions</p>
            </div>
            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🤖</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Advanced Robotics</h3>
                    <p>State-of-the-art robotic systems with AI integration for precision manufacturing, assembly, and quality control.</p>
                    <ul class="feature-list">
                        <li>6-axis industrial robots</li>
                        <li>Collaborative cobots</li>
                        <li>Vision-guided systems</li>
                    </ul>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🔧</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Custom Integration</h3>
                    <p>Seamlessly integrate automation solutions with existing infrastructure using industry-standard protocols.</p>
                    <ul class="feature-list">
                        <li>PLC programming</li>
                        <li>SCADA systems</li>
                        <li>MES integration</li>
                    </ul>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">📊</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>IoT & Analytics</h3>
                    <p>Real-time monitoring and predictive analytics powered by industrial IoT sensors and machine learning.</p>
                    <ul class="feature-list">
                        <li>Predictive maintenance</li>
                        <li>Real-time dashboards</li>
                        <li>Performance optimization</li>
                    </ul>
                </div>
                <div class="feature-card" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-icon-wrapper">
                        <div class="feature-icon">🛡️</div>
                        <div class="feature-glow"></div>
                    </div>
                    <h3>Safety & Compliance</h3>
                    <p>Comprehensive safety systems and regulatory compliance for secure industrial operations.</p>
                    <ul class="feature-list">
                        <li>Safety light curtains</li>
                        <li>Emergency stop systems</li>
                        <li>ISO compliance</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Services Preview -->
    <section class="services-preview">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Our Solutions</span>
                <h2 class="section-title">Industrial Automation Expertise</h2>
                <p class="section-subtitle">Comprehensive automation solutions tailored to your industry needs</p>
            </div>
            <div class="services-preview-grid">
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-image">
                        <img src="public/services/Manufacturing_automation.jpg" alt="Industrial Manufacturing Automation">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🏭</div>
                        <h3>Industrial Automation</h3>
                        <p>Complete factory automation solutions with PLC programming, SCADA systems, and advanced process control.</p>
                        <div class="service-features">
                            <span class="feature-tag">PLC Programming</span>
                            <span class="feature-tag">SCADA Systems</span>
                            <span class="feature-tag">Process Control</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-image">
                        <img src="public/services/robotics-arm.jpg" alt="Advanced Robotics Solutions">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🤖</div>
                        <h3>Robotics Solutions</h3>
                        <p>Advanced robotic systems for assembly, welding, and material handling with precision control.</p>
                        <div class="service-features">
                            <span class="feature-tag">6-Axis Robots</span>
                            <span class="feature-tag">Collaborative Robots</span>
                            <span class="feature-tag">Vision Systems</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
                <div class="service-preview-card" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-image">
                        <img src="public/services/HMI.jpg" alt="IoT Integration and Smart Systems">
                        <div class="service-overlay"></div>
                    </div>
                    <div class="service-content">
                        <div class="service-icon">🌐</div>
                        <h3>Smart IoT Integration</h3>
                        <p>IoT sensors and smart devices for real-time monitoring, predictive maintenance, and data analytics.</p>
                        <div class="service-features">
                            <span class="feature-tag">Smart Sensors</span>
                            <span class="feature-tag">Edge Computing</span>
                            <span class="feature-tag">Real-time Analytics</span>
                        </div>
                        <a href="services.php" class="service-link">
                            Learn More <span class="arrow">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced CTA Section -->
    <section class="cta">
        <div class="cta-background"></div>
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <div class="cta-badge">Ready to Transform?</div>
                <h2>Automate Your Future Today</h2>
                <p>Join industry leaders who have revolutionized their operations with our cutting-edge automation solutions. Let's build the factory of tomorrow, together.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-primary animated-btn">
                        <span>Start Your Journey</span>
                        <div class="btn-glow"></div>
                    </a>
                    <a href="services.php" class="btn btn-outline">
                        <span>View All Services</span>
                    </a>
                </div>
                <div class="cta-stats">
                    <div class="cta-stat">
                        <span class="stat-number">24/7</span>
                        <span class="stat-text">Support</span>
                    </div>
                    <div class="cta-stat">
                        <span class="stat-number">30+</span>
                        <span class="stat-text">Countries</span>
                    </div>
                    <div class="cta-stat">
                        <span class="stat-number">ISO</span>
                        <span class="stat-text">Certified</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Animation Scripts -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    // Initialize AOS animations
    AOS.init({
        duration: 800,
        easing: 'ease-out-cubic',
        once: true,
        offset: 100
    });

    // Animated counter function for metrics section
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    // Initialize counters when metrics section is in viewport
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counters = entry.target.querySelectorAll('[data-target]');
                counters.forEach(counter => {
                    const target = parseInt(counter.getAttribute('data-target'));
                    animateCounter(counter, target);
                });
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe metrics section when page loads
    document.addEventListener('DOMContentLoaded', () => {
        const metricsSection = document.querySelector('.metrics-section');
        if (metricsSection) {
            observer.observe(metricsSection);
        }
    });
</script>

<?php include 'includes/footer.php'; ?>