<?php
require_once 'config/config.php';
$page_title = 'About Us - Automation Industry Solutions';
include 'includes/header.php';
?>

<main id="main-content">
    <!-- Hero Section with Parallax -->
    <section class="about-hero">
        <div class="parallax-background" style="background-image: url('public/hero/industrial-automation-hero.jpg');"></div>
        <div class="about-hero-content">
            <div class="about-badge">Our Journey</div>
            <h1 class="about-title">Pioneering the Future of <br><span class="gradient-text">Industrial Automation</span></h1>
        </div>
    </section>

    <!-- Company Story Section -->
    <section class="company-story">
        <div class="container">
            <div class="story-grid">
                <div class="story-content" data-aos="fade-right">
                    <span class="section-badge">Our Story</span>
                    <h2>15+ Years of Innovation</h2>
                    <p>Founded in 2010, our journey began with a vision to revolutionize industrial automation. What started as a small team of passionate engineers has grown into a global leader in automation solutions.</p>
                    <div class="milestone-cards">
                        <div class="milestone-card">
                            <div class="year">2010</div>
                            <div class="milestone">Company Founded</div>
                        </div>
                        <div class="milestone-card">
                            <div class="year">2015</div>
                            <div class="milestone">Global Expansion</div>
                        </div>
                        <div class="milestone-card">
                            <div class="year">2020</div>
                            <div class="milestone">Industry 4.0 Pioneer</div>
                        </div>
                        <div class="milestone-card">
                            <div class="year">2025</div>
                            <div class="milestone">AI Integration</div>
                        </div>
                    </div>
                </div>
                <div class="story-image" data-aos="fade-left">
                    <div class="floating-image-container">
                        <img src="public/services/Manufacturing_automation.jpg" alt="Our journey in automation">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values Section -->
    <section class="core-values">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Core Values</span>
                <h2>What Drives Us Forward</h2>
            </div>
            <div class="values-grid">
                <div class="value-card" data-aos="flip-left" data-aos-delay="100">
                    <div class="value-icon">💡</div>
                    <h3>Innovation</h3>
                    <p>Constantly pushing boundaries to create cutting-edge solutions</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-delay="200">
                    <div class="value-icon">🤝</div>
                    <h3>Collaboration</h3>
                    <p>Working together to achieve exceptional results</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-delay="300">
                    <div class="value-icon">⚡</div>
                    <h3>Excellence</h3>
                    <p>Delivering the highest quality in everything we do</p>
                </div>
                <div class="value-card" data-aos="flip-left" data-aos-delay="400">
                    <div class="value-icon">🌱</div>
                    <h3>Sustainability</h3>
                    <p>Creating solutions that protect our environment</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <span class="section-badge">Our Team</span>
                <h2>The Innovators Behind Our Success</h2>
            </div>
            <div class="team-grid">
                <div class="team-card" data-aos="fade-up" data-aos-delay="100">
                    <div class="member-image-container">
                        <img src="public/team/leader1.jpg" alt="Team Leader">
                    </div>
                    <div class="member-info">
                        <h3>John Smith</h3>
                        <span class="position">Chief Technology Officer</span>
                        <p>20+ years experience in industrial automation</p>
                    </div>
                </div>
                <!-- Add more team members as needed -->
            </div>
        </div>
    </section>

    <!-- Global Presence Section -->
    <section class="global-presence">
        <div class="container">
            <div class="presence-content" data-aos="fade-up">
                <span class="section-badge">Global Impact</span>
                <h2>Worldwide Presence</h2>
                <div class="presence-stats">
                    <div class="stat-item">
                        <span class="stat-number">30+</span>
                        <span class="stat-label">Countries</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Projects</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">150+</span>
                        <span class="stat-label">Partners</span>
                    </div>
                </div>
            </div>
            <div class="world-map" data-aos="zoom-in">
                <!-- World map visualization will be added via CSS -->
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="about-cta">
        <div class="container">
            <div class="cta-content" data-aos="fade-up">
                <h2>Ready to Transform Your Industry?</h2>
                <p>Join us in shaping the future of manufacturing with innovative automation solutions.</p>
                <div class="cta-buttons">
                    <a href="contact.php" class="btn btn-primary animated-btn">
                        <span>Get Started</span>
                        <div class="btn-glow"></div>
                    </a>
                    <a href="services.php" class="btn btn-outline">
                        <span>Our Solutions</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>