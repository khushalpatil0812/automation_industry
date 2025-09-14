<?php
require_once 'config/config.php';
require_once 'classes/Service.php';

$service_class = new Service();
$service_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$service_id) {
    header('Location: services.php');
    exit;
}

$service_data = $service_class->getServiceById($service_id);

// Redirect if service is inactive or not found
if (!$service_data || !is_array($service_data)) {
    header('Location: services.php');
    exit;
}

// Parse features string into array
$service_features = [];
if (!empty($service_data['features'])) {
    $service_features = preg_split('/\r?\n/', $service_data['features']);
}

$page_title = $service_data['title'];
include 'includes/header.php';
?>

<main>

    <!-- 1️⃣ Service Hero Section -->
    <section class="service-detail-hero">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.php">Home</a> > 
                <a href="services.php">Services</a> > 
                <span><?php echo htmlspecialchars($service_data['category_name'] ?? 'No Category'); ?></span>
            </div>

            <div class="service-hero-flex">
                <!-- Left: Image -->
                <div class="service-hero-image">
                    <img src="<?php echo htmlspecialchars($service_data['image'] ?? ''); ?>" 
                         alt="<?php echo htmlspecialchars($service_data['title']); ?>">
                </div>

                <!-- Right: Text -->
                <div class="service-hero-text">
                    <div class="service-category-badge"><?php echo htmlspecialchars($service_data['category_name'] ?? 'No Category'); ?></div>
                    <h1><?php echo htmlspecialchars($service_data['title']); ?></h1>
                    <p class="service-hero-description"><?php echo htmlspecialchars($service_data['description']); ?></p>
                    <div class="service-hero-buttons">
                        <a href="contact.php" class="btn btn-primary">Get Started</a>
                        <a href="services.php" class="btn btn-secondary">Back to Services</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2️⃣ Key Features Section -->
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

    <!-- 3️⃣ CTA Section -->
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
