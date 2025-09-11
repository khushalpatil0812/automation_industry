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
if (!is_array($service) || !$service) {
    header('Location: services.php');
    exit;
}
// Parse features string into array
$service_features = [];
if (!empty($service['features'])) {
    $service_features = preg_split('/\r?\n/', $service['features']);
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
                <?php if (!empty($service_features)): ?>
                    <?php foreach ($service_features as $feature): ?>
                        <div class="feature-item">
                            <div class="feature-icon">✔️</div>
                            <p><?php echo htmlspecialchars($feature); ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="feature-item">
                        <p>No features listed for this service.</p>
                    </div>
                <?php endif; ?>
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
