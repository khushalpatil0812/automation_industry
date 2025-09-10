<?php
require_once 'config/config.php';
require_once 'classes/Service.php';

$service_class = new Service();
$service_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$service_id) {
    header('Location: services.php');
    exit;
}

$service = $service_class->getServiceById($service_id);

if (!$service) {
    header('Location: services.php');
    exit;
}

$page_title = $service['title'];
include 'includes/header.php';
?>

<main>
    <section class="service-detail-hero">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> > 
                <a href="services.php">Services</a> > 
                <span><?php echo htmlspecialchars($service['title']); ?></span>
            </div>
            <div class="service-hero-content">
                <div class="service-hero-text">
                    <div class="service-category-badge"><?php echo htmlspecialchars($service['category']); ?></div>
                    <h1><?php echo htmlspecialchars($service['title']); ?></h1>
                    <p class="service-hero-description"><?php echo htmlspecialchars($service['description']); ?></p>
                    <div class="service-hero-buttons">
                        <a href="contact.php" class="btn btn-primary">Get Started</a>
                        <a href="services.php" class="btn btn-secondary">Back to Services</a>
                    </div>
                </div>
                <div class="service-hero-image">
                    <img src="<?php echo htmlspecialchars($service['image']); ?>" 
                         alt="<?php echo htmlspecialchars($service['title']); ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="service-features">
        <div class="container">
            <h2>Key Features</h2>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">✨</div>
                    <h3>Professional Quality</h3>
                    <p>High-quality deliverables that meet industry standards and exceed expectations.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🚀</div>
                    <h3>Fast Implementation</h3>
                    <p>Quick project turnaround with efficient processes and dedicated team support.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🎯</div>
                    <h3>Targeted Solutions</h3>
                    <p>Customized approaches tailored to your specific business needs and objectives.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📈</div>
                    <h3>Measurable Results</h3>
                    <p>Clear metrics and KPIs to track success and return on investment.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="service-cta">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Get Started?</h2>
                <p>Contact us today to discuss how this service can benefit your business.</p>
                <a href="contact.php" class="btn btn-primary">Contact Us Now</a>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
