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

<main class="pt-5">
    <!-- Breadcrumb -->
    <section class="py-3" style="background-color: #212529;">
        <div class="container">
            <nav aria-label="breadcrumb" data-aos="fade-right">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none" style="color: var(--color-platinum);">Home</a></li>
                    <li class="breadcrumb-item"><a href="services.php" class="text-decoration-none" style="color: var(--color-platinum);">Services</a></li>
                    <li class="breadcrumb-item text-light"><?php echo htmlspecialchars($service_data['category_name'] ?? 'Service'); ?></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"><?php echo htmlspecialchars($service_data['title']); ?></li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Service Hero Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Service Image -->
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="<?php echo htmlspecialchars($service_data['image'] ?? ''); ?>" 
                             alt="<?php echo htmlspecialchars($service_data['title']); ?>"
                             class="img-fluid rounded-3 shadow-lg w-100"
                             style="height: 400px; object-fit: cover;">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge px-3 py-2 fs-6" style="background-color: var(--color-gunmetal); color: white;">
                                <?php echo htmlspecialchars($service_data['category_name'] ?? 'Service'); ?>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Service Info -->
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="mb-3">
                        <span class="badge px-3 py-2" style="background-color: #198754; color: white;">Professional Solution</span>
                    </div>
                    <h1 class="display-5 fw-bold mb-4 text-white"><?php echo htmlspecialchars($service_data['title']); ?></h1>
                    <p class="fs-5 text-light opacity-75 mb-4 lh-lg"><?php echo htmlspecialchars($service_data['description']); ?></p>
                    
                    <div class="d-flex gap-3 flex-wrap">
                        <a href="contact.php" class="btn btn-lg px-4 py-3 fw-semibold" style="background-color: var(--color-gunmetal); color: white; border: none;">
                            <i class="fas fa-rocket me-2"></i>Get Started
                        </a>
                        <a href="services.php" class="btn btn-lg px-4 py-3 fw-semibold" style="color: var(--color-french-gray); border: 1px solid var(--color-french-gray); background: transparent;">
                            <i class="fas fa-arrow-left me-2"></i>Back to Services
                        </a>
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
                    <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-french-gray);">Service Features</span>
                    <h2 class="display-6 fw-bold text-white mb-3">Key Features & Benefits</h2>
                    <p class="fs-5 text-light col-lg-8 mx-auto">Discover what makes this service exceptional and how it can benefit your business</p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php if (!empty($service_features)): ?>
                    <?php foreach ($service_features as $index => $feature): 
                        $delay = ($index % 3 + 1) * 100;
                        $colors = ['primary', 'success', 'warning', 'info', 'danger', 'secondary'];
                        $color = $colors[$index % count($colors)];
                    ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card border-0 shadow-sm h-100" style="background-color: #343a40;">
                                <div class="card-body p-4">
                                    <div class="d-flex align-items-start">
                                        <div class="bg-<?php echo $color; ?> bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3 flex-shrink-0" 
                                             style="width: 50px; height: 50px;">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <h5 class="fw-bold mb-2 text-white"><?php echo htmlspecialchars(trim($feature)); ?></h5>
                                            <p class="text-light opacity-75 mb-0 small">Advanced feature that enhances your operational efficiency and productivity.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center py-5">
                            <i class="fas fa-info-circle fs-1 text-primary mb-3"></i>
                            <h4 class="fw-bold mb-3">Features Information</h4>
                            <p class="mb-0">Detailed features for this service will be available soon. Contact us for more information about capabilities and benefits.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Service Benefits Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <h2 class="display-6 fw-bold mb-4 text-white">Why Choose This Solution?</h2>
                    <p class="fs-5 text-light opacity-75 mb-4">This automation solution provides comprehensive benefits that transform your business operations and drive measurable results.</p>
                    
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-3" style="background-color: #343a40;">
                                <div class="bg-primary bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-bolt text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-white">Fast Implementation</h6>
                                    <small class="text-light opacity-75">Quick deployment</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-3" style="background-color: #343a40;">
                                <div class="bg-success bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-shield-alt text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-white">Reliable Support</h6>
                                    <small class="text-light opacity-75">24/7 assistance</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 rounded-3" style="background-color: #343a40;">
                                <div class="bg-warning bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-chart-line text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1 text-white">Proven ROI</h6>
                                    <small class="text-light opacity-75">Measurable results</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex align-items-center p-3 bg-light rounded-3">
                                <div class="bg-info bg-gradient rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-cog text-white"></i>
                                </div>
                                <div>
                                    <h6 class="fw-bold mb-1">Customizable</h6>
                                    <small class="text-muted">Tailored to your needs</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="text-center">
                        <img src="public/freepics/engineer-cooperation-male-female-technician-maintenance-control-relay-robot-arm-system-welding-with-tablet-laptop-control-quality-operate-process-work-heavy-industry-40-manufacturing-factory.jpg" 
                             alt="Service Benefits" 
                             class="img-fluid rounded-3 shadow-lg">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-5 text-white" style="background-color: #212529;">
        <div class="container">
            <div class="row align-items-center" data-aos="fade-up">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Ready to Get Started?</h2>
                    <p class="fs-5 mb-0">Contact us today to discuss how this service can transform your business operations and drive measurable results.</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                    <a href="contact.php" class="btn btn-lg px-4 py-3 fw-semibold me-3" style="background-color: var(--color-platinum); color: var(--color-gunmetal); border: none;">
                        <i class="fas fa-phone me-2"></i>Contact Us Now
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Services Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-french-gray);">Related Solutions</span>
                    <h2 class="display-6 fw-bold text-white mb-3">You Might Also Like</h2>
                    <p class="fs-5 text-light">Explore other automation services that complement this solution</p>
                </div>
            </div>
            
            <div class="row g-4">
                <?php
                // Get related services (same category, different service)
                $related_services = [];
                if (!empty($service_data['category_name'])) {
                    $category_services = $service_class->getServicesByCategory($service_data['category_name']);
                    $related_services = array_filter($category_services, function($s) use ($service_id) {
                        return $s['id'] != $service_id;
                    });
                    $related_services = array_slice($related_services, 0, 3); // Limit to 3 services
                }
                
                if (!empty($related_services)):
                    foreach ($related_services as $index => $related_service):
                        $delay = ($index + 1) * 100;
                ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                        <div class="card border-0 shadow-sm h-100" style="cursor: pointer; background-color: #343a40;" onclick="window.location.href='service-detail.php?id=<?php echo $related_service['id']; ?>'">
                            <div class="position-relative overflow-hidden">
                                <img src="<?php echo htmlspecialchars($related_service['image']); ?>" 
                                     class="card-img-top" alt="<?php echo htmlspecialchars($related_service['title']); ?>" 
                                     style="height: 200px; object-fit: cover;">
                                <div class="position-absolute top-0 start-0 m-3">
                                    <span class="badge" style="background-color: var(--color-gunmetal); color: white;"><?php echo htmlspecialchars($related_service['category_name'] ?? 'Service'); ?></span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="fw-bold mb-3 text-white"><?php echo htmlspecialchars($related_service['title']); ?></h5>
                                <p class="text-light opacity-75 mb-3">
                                    <?php echo htmlspecialchars(substr($related_service['description'], 0, 100)) . '...'; ?>
                                </p>
                                <span class="fw-semibold" style="color: var(--color-platinum);">
                                    View Details <i class="fas fa-arrow-right ms-1"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else:
                ?>
                    <div class="col-12 text-center">
                        <div class="py-5">
                            <p class="text-muted mb-3">No related services available at the moment.</p>
                            <a href="services.php" class="btn btn-outline-primary">
                                <i class="fas fa-list me-2"></i>Browse All Services
                            </a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<style>
.card:hover {
    transform: translateY(-3px);
    transition: transform 0.3s ease;
}

.card img {
    transition: transform 0.3s ease;
}

.card:hover img {
    transform: scale(1.05);
}
</style>

<?php include 'includes/footer.php'; ?>