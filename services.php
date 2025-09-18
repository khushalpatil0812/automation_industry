<?php
require_once 'config/config.php';
require_once 'classes/Service.php';

$page_title = 'Services';
$service = new Service();

// Get category filter
$selected_category = isset($_GET['category']) ? $_GET['category'] : '';

// Get services based on category (only active ones)
if ($selected_category) {
    $services = $service->getServicesByCategory($selected_category);
} else {
    $services = $service->getActiveServices();
}

// Get active categories
$categories = $service->getCategories();

include 'includes/header.php';
?>

<main class="pt-5">
    <!-- Page Header -->
    <section class="py-5 position-relative text-white" style="background: #212529; overflow: hidden;">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-10 text-center" data-aos="fade-up">
                    <div class="mb-4">
                        <span class="d-inline-flex align-items-center justify-content-center rounded-circle shadow-lg mb-3" style="width: 70px; height: 70px; background: rgba(33,37,41,0.7); border: 2px solid #fff;">
                            <i class="fas fa-cogs fa-2x text-white"></i>
                        </span>
                    </div>
                    <h1 class="display-3 fw-bold mb-3" style="letter-spacing: 1px;">Our Services</h1>
                    <p class="fs-4 col-lg-8 mx-auto mb-0 opacity-85">Comprehensive automation solutions tailored to transform your business operations and drive success</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <!-- Service Category Dropdown -->
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <div class="d-inline-block">
                        <select id="serviceFilter" class="form-select form-select-lg" style="min-width: 300px; background-color: #343a40; border-color: var(--color-gunmetal); color: white; border-radius: 25px; padding: 12px 20px;" onchange="filterServices(this.value)">
                            <option value="" <?php echo !$selected_category ? 'selected' : ''; ?>>🔍 All Services</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo htmlspecialchars($category); ?>" <?php echo $selected_category === $category ? 'selected' : ''; ?>>
                                    📁 <?php echo htmlspecialchars($category); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="row g-4">
                <?php if (empty($services)): ?>
                    <div class="col-12">
                        <div class="alert alert-info text-center py-5" data-aos="fade-up">
                            <i class="fas fa-info-circle fs-1 mb-3" style="color: var(--color-gunmetal);"></i>
                            <h4 class="fw-bold mb-3">No Services Found</h4>
                            <p class="mb-3">No services found in this category. Please try another category or view all services.</p>
                            <a href="services.php" class="btn" style="background-color: var(--color-gunmetal); color: white; border: none;">
                                <i class="fas fa-list me-2"></i>View All Services
                            </a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php foreach ($services as $index => $service_item): 
                        $delay = ($index % 3 + 1) * 100; // Stagger animation delays
                    ?>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                            <div class="card border-0 shadow-sm h-100 service-card" style="cursor: pointer;" onclick="viewService(<?php echo $service_item['id']; ?>)">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?php echo htmlspecialchars($service_item['image']); ?>" 
                                         class="card-img-top" alt="<?php echo htmlspecialchars($service_item['title']); ?>" 
                                         style="height: 250px; object-fit: cover; transition: transform 0.3s ease;">
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge px-3 py-2" style="background-color: var(--color-gunmetal); color: white;">
                                            <?php echo htmlspecialchars($service_item['category_name'] ?? 'Service'); ?>
                                        </span>
                                    </div>
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <div class="bg-white rounded-circle p-2 shadow-sm">
                                            <i class="fas fa-arrow-right" style="color: var(--color-gunmetal);"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-4">
                                    <h5 class="fw-bold mb-3"><?php echo htmlspecialchars($service_item['title']); ?></h5>
                                    <p class="text-muted mb-3">
                                        <?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?>
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="fw-semibold" style="color: var(--color-gunmetal);">Learn More</span>
                                        <i class="fas fa-chevron-right" style="color: var(--color-gunmetal);"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <!-- Call to Action -->
            <?php if (!empty($services)): ?>
            <div class="row mt-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <div class="rounded-4 p-5" style="background-color: #343a40;">
                        <h3 class="fw-bold mb-3 text-white">Can't Find What You're Looking For?</h3>
                        <p class="text-light opacity-75 mb-4 fs-5">Our team can create custom automation solutions tailored to your specific needs.</p>
                        <div class="d-flex gap-3 justify-content-center flex-wrap">
                            <a href="contact.php" class="btn btn-lg px-4 py-3 fw-semibold" style="background-color: var(--color-gunmetal); color: white; border: none;">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                            <a href="about.php" class="btn btn-lg px-4 py-3 fw-semibold" style="color: var(--color-gunmetal); border: 1px solid var(--color-gunmetal); background: transparent;">
                                <i class="fas fa-info-circle me-2"></i>Learn More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5" style="background-color: #212529;">
        <div class="container">
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <span class="badge text-white px-3 py-2 fs-6 mb-3" style="background-color: var(--color-french-gray);">Why Choose Our Services</span>
                    <h2 class="display-5 fw-bold text-white mb-3">Service Excellence</h2>
                    <p class="fs-5 text-light col-lg-8 mx-auto">What sets our automation services apart from the competition</p>
                </div>
            </div>
            
            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="text-center">
                        <div class="bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px; background: var(--gradient-primary) !important;">
                            <i class="fas fa-rocket text-white fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3 text-white">Fast Implementation</h5>
                        <p class="text-light opacity-75">Quick deployment with minimal downtime to get your operations running smoothly</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="text-center">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-shield-alt text-white fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3 text-white">Reliable Support</h5>
                        <p class="text-light opacity-75">24/7 technical support and maintenance to ensure optimal performance</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="text-center">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-cogs text-white fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3 text-white">Custom Solutions</h5>
                        <p class="text-light opacity-75">Tailored automation systems designed to meet your specific requirements</p>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="text-center">
                        <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="fas fa-chart-line text-white fs-2"></i>
                        </div>
                        <h5 class="fw-bold mb-3 text-white">Proven Results</h5>
                        <p class="text-light opacity-75">Track record of successful implementations with measurable ROI improvements</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<style>
.service-card:hover {
    transform: translateY(-5px);
    transition: transform 0.3s ease;
}

.service-card:hover .card-img-top {
    transform: scale(1.05);
}

#serviceFilter {
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
}

#serviceFilter:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}

#serviceFilter:focus {
    outline: none;
    box-shadow: 0 0 0 3px rgba(var(--color-gunmetal-rgb), 0.3);
    border-color: var(--color-gunmetal);
}

#serviceFilter option {
    background-color: #343a40;
    color: white;
    padding: 10px;
}

@media (max-width: 768px) {
    #serviceFilter {
        min-width: 250px !important;
        font-size: 0.9rem;
    }
}
</style>

<script>
function filterServices(category) {
    if (category) {
        window.location.href = 'services.php?category=' + encodeURIComponent(category);
    } else {
        window.location.href = 'services.php';
    }
}

function viewService(id) {
    window.location.href = 'service-detail.php?id=' + id;
}

// Add hover effects for service cards
document.addEventListener('DOMContentLoaded', function() {
    const serviceCards = document.querySelectorAll('.service-card');
    serviceCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.boxShadow = '0 1rem 3rem rgba(0,0,0,.175)';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.boxShadow = '0 .5rem 1rem rgba(0,0,0,.15)';
        });
    });
});
</script>

<?php include 'includes/footer.php'; ?>