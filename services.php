<?php
require_once 'config/config.php';
require_once 'classes/Service.php';
require_once 'classes/Category.php';

// Online Icon/Logo Resources Array
$iconResources = [
    'fontawesome' => 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css',
    'bootstrap_icons' => 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css',
    'google_icons' => 'https://fonts.googleapis.com/icon?family=Material+Icons',
    'feather_icons' => 'https://cdn.jsdelivr.net/npm/feather-icons@4.29.0/dist/feather.min.css',
    'heroicons' => 'https://cdn.jsdelivr.net/npm/heroicons@2.0.18/24/outline/index.js',
    'lucide' => 'https://unpkg.com/lucide@latest/dist/umd/lucide.js',
    'tabler_icons' => 'https://cdn.jsdelivr.net/npm/@tabler/icons@2.40.0/icons-sprite.svg',
    'remix_icons' => 'https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css'
];

$page_title = 'Services';
$service = new Service();
$categoryObj = new Category($pdo);

// Get category filter - can be ID or name
$selected_category = isset($_GET['category']) ? $_GET['category'] : '';
$selected_category_name = '';

// Get services based on category (only active ones)
if ($selected_category) {
    // Check if it's a numeric ID or category name
    if (is_numeric($selected_category)) {
        // It's a category ID
        $services = $service->getServicesByCategoryId($selected_category);
        // Get category name for display
        $categoryDetails = $categoryObj->getCategoryById($selected_category);
        $selected_category_name = $categoryDetails ? $categoryDetails['name'] : '';
    } else {
        // It's a category name
        $services = $service->getServicesByCategory($selected_category);
        $selected_category_name = $selected_category;
    }
} else {
    $services = $service->getActiveServices();
}

// Get active categories for dropdown
$categories = $categoryObj->getAllCategories();

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
            <!-- Service Category Dropdown with Enhanced Responsive Design -->
            <div class="row mb-5" data-aos="fade-up">
                <div class="col-12 text-center">
                    <?php if ($selected_category && $selected_category_name): ?>
                        <!-- Show selected category info -->
                        <div class="mb-4">
                            <div class="d-inline-flex align-items-center bg-gradient rounded-pill px-4 py-2 mb-3" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.2), rgba(70, 130, 180, 0.2)); border: 1px solid rgba(255, 107, 53, 0.3);">
                                <i class="fas fa-filter me-2 text-warning"></i>
                                <span class="text-white fw-semibold">Filtered by: </span>
                                <span class="text-warning fw-bold ms-1"><?php echo htmlspecialchars($selected_category_name); ?></span>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <div class="d-inline-block position-relative">
                        <select id="serviceFilter" class="form-select form-select-lg custom-select" onchange="filterServices(this.value)">
                            <option value="" <?php echo !$selected_category ? 'selected' : ''; ?>>🏭 All Services</option>
                            <?php if (!empty($categories)): ?>
                                <?php foreach ($categories as $category): ?>
                                    <?php if ($category['is_active']): ?>
                                        <option value="<?php echo $category['id']; ?>" <?php echo $selected_category == $category['id'] ? 'selected' : ''; ?>>
                                            → <?php echo htmlspecialchars($category['name']); ?>
                                        </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
                            <div class="card border-0 h-100 service-card" style="cursor: pointer;" onclick="viewService(<?php echo $service_item['id']; ?>)">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?php echo htmlspecialchars($service_item['image']); ?>" 
                                         class="card-img-top" alt="<?php echo htmlspecialchars($service_item['title']); ?>">
                                    
                                    <!-- Enhanced Image Overlay for Better Readability -->
                                    <div class="position-absolute top-0 start-0 w-100 h-100 service-card-overlay"></div>
                                    
                                    <!-- Category Badge -->
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <span class="badge service-category-badge px-3 py-2">
                                            <i class="fas fa-tag me-1"></i>
                                            <?php echo htmlspecialchars($service_item['category_name'] ?? 'Service'); ?>
                                        </span>
                                    </div>
                                    
                                    <!-- Arrow Icon -->
                                    <div class="position-absolute bottom-0 end-0 m-3">
                                        <div class="service-arrow-icon">
                                            <i class="fas fa-arrow-right"></i>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Enhanced Card Body -->
                                <div class="card-body service-card-body p-4">
                                    <h5 class="service-card-title fw-bold mb-3">
                                        <?php echo htmlspecialchars($service_item['title']); ?>
                                    </h5>
                                    <p class="service-card-description mb-4">
                                        <?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?>
                                    </p>
                                    
                                    <!-- Enhanced Action Button -->
                                    <div class="service-card-action d-flex justify-content-between align-items-center">
                                        <span class="service-learn-more fw-bold">
                                            <i class="fas fa-play-circle me-2"></i>Learn More
                                        </span>
                                        <div class="service-chevron">
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
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
                            <a href="contact.php" class="btn btn-lg px-4 py-3 fw-semibold" style="background-color: var(--color-gunmetal); color: white; border:  1px solid var(--color-gunmetal);  background: transparent;">
                                <i class="fas fa-phone me-2"></i>Contact Us
                            </a>
                            <a href="about.php" class="btn btn-lg px-4 py-3 fw-semibold" style="color: var(--color-gunmetal);color:white; border: 1px solid var(--color-gunmetal); background: transparent;">
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
/* ===== RESPONSIVE SERVICES PAGE STYLES ===== */

/* Enhanced Animations */
@keyframes ripple {
    0% {
        transform: scale(0);
        opacity: 1;
    }
    100% {
        transform: scale(4);
        opacity: 0;
    }
}

@keyframes cardEntrance {
    0% {
        opacity: 0;
        transform: translateY(30px) scale(0.95);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

@keyframes shimmer {
    0% {
        background-position: -1000px 0;
    }
    100% {
        background-position: 1000px 0;
    }
}

/* Base responsive variables */
:root {
    --services-padding: clamp(1rem, 3vw, 2rem);
    --card-padding: clamp(1rem, 2.5vw, 1.5rem);
    --select-width: clamp(250px, 50vw, 400px);
    --select-padding: clamp(0.75rem, 2vw, 1rem);
    --card-image-height: clamp(200px, 30vw, 250px);
}

/* Enhanced Custom Select Dropdown */
.custom-select {
    min-width: var(--select-width);
    background: linear-gradient(135deg, #343a40, #495057) !important;
    border: 2px solid rgba(255, 107, 53, 0.3) !important;
    color: white !important;
    border-radius: 25px !important;
    padding: var(--select-padding) 1.5rem !important;
    font-size: clamp(0.9rem, 2vw, 1rem) !important;
    font-weight: 500;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    backdrop-filter: blur(10px);
    cursor: pointer;
}

.custom-select:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    border-color: rgba(255, 107, 53, 0.5) !important;
    background: linear-gradient(135deg, #495057, #343a40) !important;
}

.custom-select:focus {
    outline: none !important;
    box-shadow: 0 0 0 4px rgba(255, 107, 53, 0.25), 0 8px 25px rgba(0, 0, 0, 0.3) !important;
    border-color: #FF6B35 !important;
    transform: translateY(-2px);
}

.custom-select option {
    background: #343a40 !important;
    color: white !important;
    padding: 12px 16px !important;
    font-size: 0.95rem;
    border: none;
}

.custom-select option:hover,
.custom-select option:focus {
    background: linear-gradient(135deg, #FF6B35, #FFA500) !important;
    color: white !important;
}

/* ===== ENHANCED PREMIUM SERVICE CARDS ===== */

.service-card {
    /* High-contrast, premium background */
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.95) 0%, 
        rgba(248, 249, 250, 0.98) 50%,
        rgba(255, 255, 255, 0.95) 100%
    ) !important;
    border: 2px solid rgba(255, 107, 53, 0.1) !important;
    border-radius: 24px !important;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    cursor: pointer;
    overflow: hidden;
    backdrop-filter: blur(20px);
    box-shadow: 
        0 10px 40px rgba(0, 0, 0, 0.15),
        0 4px 20px rgba(255, 107, 53, 0.1),
        inset 0 1px 0 rgba(255, 255, 255, 0.8);
    position: relative;
}

.service-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, 
        rgba(255, 107, 53, 0.02) 0%, 
        rgba(70, 130, 180, 0.02) 100%
    );
    z-index: 1;
    border-radius: 22px;
}

.service-card:hover {
    transform: translateY(-12px) scale(1.03);
    box-shadow: 
        0 25px 80px rgba(0, 0, 0, 0.25),
        0 8px 30px rgba(255, 107, 53, 0.3),
        inset 0 1px 0 rgba(255, 255, 255, 0.9),
        0 0 0 2px rgba(255, 107, 53, 0.4);
    border-color: rgba(255, 107, 53, 0.6) !important;
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.98) 0%, 
        rgba(255, 251, 247, 0.99) 50%,
        rgba(255, 255, 255, 0.98) 100%
    ) !important;
}

/* Image Container */
.service-card .card-img-top {
    height: var(--card-image-height, 250px);
    object-fit: cover;
    transition: all 0.5s ease;
    border-radius: 22px 22px 0 0;
    position: relative;
    z-index: 2;
}

.service-card:hover .card-img-top {
    transform: scale(1.08);
    filter: brightness(1.15) contrast(1.1) saturate(1.1);
}

/* Image Overlay for Better Text Visibility */
.service-card-overlay {
    background: linear-gradient(
        135deg,
        rgba(0, 0, 0, 0.1) 0%,
        rgba(0, 0, 0, 0.05) 30%,
        rgba(255, 107, 53, 0.1) 70%,
        rgba(255, 107, 53, 0.15) 100%
    );
    opacity: 0.6;
    transition: opacity 0.4s ease;
    z-index: 3;
}

.service-card:hover .service-card-overlay {
    opacity: 0.8;
}

/* Enhanced Card Body */
.service-card-body {
    background: linear-gradient(145deg, 
        rgba(255, 255, 255, 0.98) 0%, 
        rgba(248, 249, 250, 0.95) 100%
    ) !important;
    position: relative;
    z-index: 4;
    backdrop-filter: blur(10px);
    border-radius: 0 0 22px 22px;
}

/* Premium Card Title */
.service-card-title {
    font-size: clamp(1.2rem, 3vw, 1.4rem) !important;
    font-weight: 800 !important;
    color: #1a1d29 !important;
    line-height: 1.3;
    letter-spacing: -0.02em;
    margin-bottom: 1rem !important;
    transition: color 0.3s ease;
}

.service-card:hover .service-card-title {
    color: #FF6B35 !important;
}

/* Enhanced Card Description */
.service-card-description {
    font-size: clamp(0.9rem, 2.2vw, 1rem) !important;
    line-height: 1.7;
    color: #4a5568 !important;
    font-weight: 500;
    margin-bottom: 1.5rem !important;
    transition: color 0.3s ease;
}

.service-card:hover .service-card-description {
    color: #2d3748 !important;
}

/* Enhanced Category Badge */
.service-category-badge {
    background: linear-gradient(135deg, 
        rgba(255, 107, 53, 0.95) 0%, 
        rgba(255, 165, 0, 0.95) 100%
    ) !important;
    color: white !important;
    font-size: clamp(0.75rem, 1.8vw, 0.85rem);
    padding: 0.6rem 1.2rem;
    border-radius: 20px;
    font-weight: 700;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255, 255, 255, 0.3);
    box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
    transition: all 0.3s ease;
    z-index: 5;
    position: relative;
}

.service-card:hover .service-category-badge {
    background: linear-gradient(135deg, 
        rgba(255, 165, 0, 0.98) 0%, 
        rgba(255, 107, 53, 0.98) 100%
    ) !important;
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.4);
}

/* Enhanced Arrow Icon */
.service-arrow-icon {
    background: linear-gradient(135deg, #FF6B35, #FFA500) !important;
    border-radius: 50%;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.4s ease;
    box-shadow: 0 6px 20px rgba(255, 107, 53, 0.3);
    border: 2px solid rgba(255, 255, 255, 0.3);
    z-index: 5;
    position: relative;
}

.service-card:hover .service-arrow-icon {
    transform: rotate(45deg) scale(1.15);
    box-shadow: 0 8px 25px rgba(255, 107, 53, 0.5);
    background: linear-gradient(135deg, #FFA500, #FF6B35) !important;
}

.service-arrow-icon i {
    color: white !important;
    font-size: 1.1rem;
    transition: transform 0.3s ease;
    font-weight: 600;
}

/* Enhanced Action Section */
.service-card-action {
    padding: 1rem 0 0 0;
    border-top: 2px solid rgba(255, 107, 53, 0.1);
    margin-top: 0.5rem;
}

.service-learn-more {
    color: #FF6B35 !important;
    font-size: clamp(0.95rem, 2.2vw, 1.1rem);
    font-weight: 700 !important;
    transition: all 0.3s ease;
    letter-spacing: 0.02em;
}

.service-card:hover .service-learn-more {
    color: #1a1d29 !important;
    transform: translateX(5px);
}

.service-chevron {
    background: linear-gradient(135deg, #FF6B35, #FFA500);
    border-radius: 50%;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    box-shadow: 0 3px 10px rgba(255, 107, 53, 0.3);
}

.service-card:hover .service-chevron {
    transform: translateX(8px) scale(1.1);
    box-shadow: 0 5px 15px rgba(255, 107, 53, 0.4);
    background: linear-gradient(135deg, #FFA500, #FF6B35);
}

.service-chevron i {
    color: white !important;
    font-size: 0.9rem;
    font-weight: 600;
}

/* Filter Info Badge */
.bg-gradient {
    backdrop-filter: blur(10px);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: all 0.3s ease;
}

.bg-gradient:hover {
    transform: scale(1.05);
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
}

/* No Services Alert */
.alert-info {
    background: linear-gradient(135deg, rgba(70, 130, 180, 0.1), rgba(70, 130, 180, 0.05)) !important;
    border: 2px solid rgba(70, 130, 180, 0.3) !important;
    color: #f8f9fa !important;
    border-radius: 20px !important;
    backdrop-filter: blur(10px);
    padding: var(--services-padding) !important;
}

.alert-info .btn {
    background: linear-gradient(135deg, #4682B4, #5A9FD1) !important;
    border: none !important;
    color: white !important;
    padding: 0.75rem 2rem;
    border-radius: 15px;
    font-weight: 600;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
}

.alert-info .btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
    background: linear-gradient(135deg, #5A9FD1, #4682B4) !important;
    color: white !important;
}

/* ===== RESPONSIVE BREAKPOINTS ===== */

/* ===== ENHANCED RESPONSIVE BREAKPOINTS FOR SERVICE CARDS ===== */

/* Extra Small Devices (phones, 576px and down) */
@media (max-width: 575.98px) {
    .container {
        padding-left: 1rem;
        padding-right: 1rem;
    }
    
    .custom-select {
        min-width: 280px;
        font-size: 0.85rem;
        padding: 0.75rem 1rem;
        margin: 0 auto;
        display: block;
    }
    
    /* Enhanced Mobile Service Cards */
    .service-card {
        margin-bottom: 2.5rem;
        border-radius: 20px !important;
        box-shadow: 
            0 8px 30px rgba(0, 0, 0, 0.12),
            0 4px 15px rgba(255, 107, 53, 0.08);
    }
    
    .service-card:hover {
        transform: translateY(-8px) scale(1.02);
    }
    
    .service-card .card-img-top {
        height: 200px;
        border-radius: 18px 18px 0 0;
    }
    
    .service-card-body {
        padding: 1.5rem 1.2rem !important;
    }
    
    .service-card-title {
        font-size: 1.1rem !important;
        margin-bottom: 0.8rem !important;
    }
    
    .service-card-description {
        font-size: 0.9rem !important;
        margin-bottom: 1.2rem !important;
    }
    
    .service-category-badge {
        font-size: 0.75rem;
        padding: 0.5rem 1rem;
        border-radius: 16px;
    }
    
    .service-arrow-icon {
        width: 40px;
        height: 40px;
    }
    
    .service-arrow-icon i {
        font-size: 1rem;
    }
    
    .service-chevron {
        width: 28px;
        height: 28px;
    }
    
    .service-chevron i {
        font-size: 0.8rem;
    }
    
    .service-learn-more {
        font-size: 1rem !important;
    }
    
    .bg-gradient {
        padding: 0.75rem 1rem !important;
        margin-bottom: 2rem !important;
    }
    
    .bg-gradient span {
        font-size: 0.85rem;
    }
    
    /* Stack service cards vertically on mobile */
    .col-lg-4.col-md-6 {
        flex: 0 0 100%;
        max-width: 100%;
    }
}

/* Small Devices (landscape phones, 576px to 767px) */
@media (min-width: 576px) and (max-width: 767.98px) {
    .custom-select {
        min-width: 320px;
        font-size: 0.9rem;
    }
    
    /* Enhanced Small Device Service Cards */
    .service-card {
        box-shadow: 
            0 10px 35px rgba(0, 0, 0, 0.15),
            0 5px 18px rgba(255, 107, 53, 0.1);
    }
    
    .service-card .card-img-top {
        height: 220px;
    }
    
    .service-card-body {
        padding: 1.4rem !important;
    }
    
    .service-card-title {
        font-size: 1.15rem !important;
    }
    
    .service-card-description {
        font-size: 0.92rem !important;
    }
    
    .service-arrow-icon {
        width: 42px;
        height: 42px;
    }
    
    .service-chevron {
        width: 30px;
        height: 30px;
    }
}

/* Medium Devices (tablets, 768px to 991px) */
@media (min-width: 768px) and (max-width: 991.98px) {
    .custom-select {
        min-width: 350px;
        font-size: 0.95rem;
    }
    
    /* Enhanced Tablet Service Cards */
    .service-card {
        box-shadow: 
            0 12px 40px rgba(0, 0, 0, 0.18),
            0 6px 20px rgba(255, 107, 53, 0.12);
    }
    
    .service-card .card-img-top {
        height: 240px;
    }
    
    .service-card-body {
        padding: 1.5rem !important;
    }
    
    .service-card:hover {
        transform: translateY(-10px) scale(1.025);
    }
    
    .service-card-title {
        font-size: 1.25rem !important;
    }
    
    .service-card-description {
        font-size: 0.95rem !important;
    }
    
    /* Show 2 cards per row on tablets */
    .col-lg-4.col-md-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
}

/* Large Devices (desktops, 992px to 1199px) */
@media (min-width: 992px) and (max-width: 1199.98px) {
    .custom-select {
        min-width: 380px;
        font-size: 1rem;
    }
    
    .service-card .card-img-top {
        height: 240px;
    }
    
    .service-card .card-body {
        padding: 1.4rem !important;
    }
}

/* Extra Large Devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {
    .custom-select {
        min-width: 400px;
        font-size: 1rem;
        padding: 1rem 1.5rem;
    }
    
    .service-card .card-img-top {
        height: 250px;
    }
    
    .service-card .card-body {
        padding: 1.5rem !important;
    }
    
    .service-card .card-title {
        font-size: 1.25rem;
    }
    
    .service-card .card-text {
        font-size: 0.95rem;
    }
}

/* Ultra-wide screens (1400px and up) */
@media (min-width: 1400px) {
    .container {
        max-width: 1320px;
    }
    
    .custom-select {
        min-width: 420px;
        font-size: 1.1rem;
    }
    
    .service-card .card-title {
        font-size: 1.3rem;
    }
    
    .service-card .card-text {
        font-size: 1rem;
    }
}

/* ===== ENHANCED TOUCH DEVICE OPTIMIZATIONS ===== */
@media (hover: none) and (pointer: coarse) {
    .service-card {
        transition: transform 0.2s ease;
        min-height: 44px; /* Touch target minimum */
    }
    
    .service-card:hover {
        transform: none;
        box-shadow: 
            0 12px 45px rgba(0, 0, 0, 0.2),
            0 6px 22px rgba(255, 107, 53, 0.15);
    }
    
    .service-card:active {
        transform: scale(0.98);
        background: linear-gradient(145deg, 
            rgba(255, 251, 247, 0.99) 0%, 
            rgba(255, 255, 255, 0.98) 100%
        ) !important;
    }
    
    .custom-select {
        min-height: 48px;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        font-size: 16px; /* Prevent zoom on iOS */
    }
    
    .custom-select:hover {
        transform: none;
    }
    
    /* Enhanced touch interactions */
    .service-category-badge {
        min-height: 44px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .service-arrow-icon {
        min-width: 44px;
        min-height: 44px;
    }
    
    .service-learn-more {
        min-height: 44px;
        display: flex;
        align-items: center;
    }
    
    /* Optimized hover effects for touch */
    .service-card:hover .card-img-top {
        transform: scale(1.02);
        filter: brightness(1.05);
    }
    
    .service-card:hover .service-arrow-icon {
        transform: scale(1.05);
    }
    
    .service-card:hover .service-chevron {
        transform: translateX(3px);
    }
}

/* ===== HIGH DPI DISPLAYS ===== */
@media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
    .service-card .card-img-top {
        image-rendering: -webkit-optimize-contrast;
        image-rendering: crisp-edges;
    }
    
    .custom-select {
        border-width: 1px;
    }
}

/* ===== ENHANCED ACCESSIBILITY IMPROVEMENTS ===== */
@media (prefers-reduced-motion: reduce) {
    .service-card,
    .custom-select,
    .service-card .card-img-top,
    .service-arrow-icon,
    .service-chevron,
    .service-category-badge,
    .bg-gradient {
        transition: none !important;
        animation: none !important;
    }
    
    .service-card:hover {
        transform: translateY(-3px) !important;
        box-shadow: 
            0 15px 45px rgba(0, 0, 0, 0.2),
            0 6px 20px rgba(255, 107, 53, 0.15) !important;
    }
    
    .custom-select:hover {
        transform: none !important;
    }
    
    .service-card:hover .service-arrow-icon {
        transform: none !important;
    }
    
    .service-card:hover .service-chevron {
        transform: none !important;
    }
}

/* Enhanced Focus States for Accessibility */
.service-card:focus,
.service-card:focus-within {
    outline: 3px solid rgba(255, 107, 53, 0.6) !important;
    outline-offset: 2px;
    box-shadow: 
        0 15px 50px rgba(0, 0, 0, 0.25),
        0 0 0 3px rgba(255, 107, 53, 0.3);
}

.service-card:focus .service-card-title,
.service-card:focus-within .service-card-title {
    color: #FF6B35 !important;
}

/* Screen Reader Only Content */
.sr-only {
    position: absolute !important;
    width: 1px !important;
    height: 1px !important;
    padding: 0 !important;
    margin: -1px !important;
    overflow: hidden !important;
    clip: rect(0, 0, 0, 0) !important;
    white-space: nowrap !important;
    border: 0 !important;
}

/* ===== HIGH CONTRAST MODE ===== */
@media (prefers-contrast: high) {
    .service-card {
        border: 2px solid white !important;
    }
    
    .custom-select {
        border: 2px solid white !important;
    }
    
    .service-card .badge {
        border: 2px solid white !important;
    }
}

/* ===== DARK MODE SUPPORT ===== */
@media (prefers-color-scheme: dark) {
    .service-card {
        background: linear-gradient(135deg, 
            rgba(0, 0, 0, 0.3) 0%, 
            rgba(0, 0, 0, 0.1) 100%
        );
    }
    
    .custom-select {
        background: linear-gradient(135deg, #1a1d20, #2c3034) !important;
    }
}

/* ===== PRINT STYLES ===== */
@media print {
    .custom-select,
    .bg-gradient {
        display: none !important;
    }
    
    .service-card {
        border: 1px solid black !important;
        background: white !important;
        color: black !important;
        box-shadow: none !important;
        break-inside: avoid;
        margin-bottom: 1rem;
    }
    
    .service-card .card-body {
        background: white !important;
        color: black !important;
    }
    
    .service-card .card-title {
        color: black !important;
    }
    
    .service-card .card-text {
        color: black !important;
    }
}

/* ===== LANDSCAPE ORIENTATION ===== */
@media (orientation: landscape) and (max-height: 600px) {
    .service-card .card-img-top {
        height: 150px;
    }
    
    .custom-select {
        margin-bottom: 1rem;
    }
}

/* ===== FOLDABLE DEVICES ===== */
@media (max-width: 280px) {
    .custom-select {
        min-width: 200px;
        font-size: 0.8rem;
        padding: 0.6rem 0.8rem;
    }
    
    .service-card .card-body {
        padding: 0.8rem !important;
    }
    
    .service-card .card-title {
        font-size: 0.9rem;
    }
    
    .service-card .card-text {
        font-size: 0.75rem;
    }
}
</style>

<script>
// Enhanced Services Page JavaScript with Full Responsiveness
document.addEventListener('DOMContentLoaded', function() {
    
    // ===== ENHANCED FILTER FUNCTIONALITY =====
    function filterServices(category) {
        // Add loading state
        const select = document.getElementById('serviceFilter');
        const originalText = select.options[select.selectedIndex].text;
        
        // Show loading state
        select.disabled = true;
        select.style.opacity = '0.7';
        select.style.cursor = 'wait';
        
        // Navigate to filtered page
        if (category) {
            window.location.href = 'services.php?category=' + encodeURIComponent(category);
        } else {
            window.location.href = 'services.php';
        }
    }
    
    // Make filterServices globally accessible
    window.filterServices = filterServices;
    
    // ===== ENHANCED PREMIUM SERVICE CARD INTERACTIONS =====
    function setupServiceCards() {
        const serviceCards = document.querySelectorAll('.service-card');
        
        serviceCards.forEach((card, index) => {
            // Enhanced hover effects with performance optimization
            let hoverTimeout;
            
            // Set initial states
            card.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            
            card.addEventListener('mouseenter', function() {
                clearTimeout(hoverTimeout);
                this.style.willChange = 'transform, box-shadow, background';
                
                // Enhanced shadow for new white cards
                this.style.boxShadow = '0 25px 80px rgba(0, 0, 0, 0.25), 0 8px 30px rgba(255, 107, 53, 0.3), inset 0 1px 0 rgba(255, 255, 255, 0.9)';
                
                // Enhance image and overlay
                const img = this.querySelector('.card-img-top');
                const overlay = this.querySelector('.service-card-overlay');
                const arrowIcon = this.querySelector('.service-arrow-icon');
                const chevron = this.querySelector('.service-chevron');
                const badge = this.querySelector('.service-category-badge');
                
                if (img) {
                    img.style.willChange = 'transform, filter';
                }
                
                if (overlay) {
                    overlay.style.opacity = '0.8';
                }
                
                if (arrowIcon) {
                    arrowIcon.style.transform = 'rotate(45deg) scale(1.15)';
                }
                
                if (chevron) {
                    chevron.style.transform = 'translateX(8px) scale(1.1)';
                }
                
                if (badge) {
                    badge.style.transform = 'scale(1.05)';
                }
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.willChange = 'auto';
                this.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.15), 0 4px 20px rgba(255, 107, 53, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.8)';
                
                const img = this.querySelector('.card-img-top');
                const overlay = this.querySelector('.service-card-overlay');
                const arrowIcon = this.querySelector('.service-arrow-icon');
                const chevron = this.querySelector('.service-chevron');
                const badge = this.querySelector('.service-category-badge');
                
                if (img) {
                    img.style.willChange = 'auto';
                }
                
                if (overlay) {
                    overlay.style.opacity = '0.6';
                }
                
                if (arrowIcon) {
                    arrowIcon.style.transform = '';
                }
                
                if (chevron) {
                    chevron.style.transform = '';
                }
                
                if (badge) {
                    badge.style.transform = '';
                }
            });
            
            // Enhanced click handling with premium feedback
            card.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Premium click animation
                this.style.transform = 'scale(0.97)';
                this.style.filter = 'brightness(0.95)';
                
                // Create ripple effect
                const ripple = document.createElement('div');
                ripple.style.cssText = `
                    position: absolute;
                    border-radius: 50%;
                    background: rgba(255, 107, 53, 0.3);
                    pointer-events: none;
                    transform: scale(0);
                    animation: ripple 0.6s linear;
                    width: 20px;
                    height: 20px;
                    left: ${e.offsetX - 10}px;
                    top: ${e.offsetY - 10}px;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    this.style.transform = '';
                    this.style.filter = '';
                    ripple.remove();
                    
                    const serviceId = this.getAttribute('onclick').match(/\d+/)[0];
                    viewService(serviceId);
                }, 200);
            });
            
            // Enhanced keyboard accessibility
            card.setAttribute('tabindex', '0');
            card.setAttribute('role', 'button');
            card.setAttribute('aria-label', `View details for ${card.querySelector('.service-card-title')?.textContent || 'service'}`);
            
            card.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    e.stopPropagation();
                    this.click();
                }
            });
            
            // Enhanced focus indicators
            card.addEventListener('focus', function() {
                this.style.outline = '3px solid rgba(255, 107, 53, 0.6)';
                this.style.outlineOffset = '3px';
                this.style.boxShadow = '0 15px 50px rgba(0, 0, 0, 0.25), 0 0 0 3px rgba(255, 107, 53, 0.3)';
                
                // Announce to screen readers
                const title = this.querySelector('.service-card-title')?.textContent;
                if (title) {
                    this.setAttribute('aria-label', `Focused on ${title}. Press Enter to view details.`);
                }
            });
            
            card.addEventListener('blur', function() {
                this.style.outline = 'none';
                this.style.boxShadow = '0 10px 40px rgba(0, 0, 0, 0.15), 0 4px 20px rgba(255, 107, 53, 0.1), inset 0 1px 0 rgba(255, 255, 255, 0.8)';
            });
            
            // Add loading state for better UX
            card.addEventListener('click', function() {
                const title = this.querySelector('.service-card-title');
                if (title) {
                    const originalText = title.textContent;
                    title.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Loading...';
                    
                    setTimeout(() => {
                        title.textContent = originalText;
                    }, 1000);
                }
            });
        });
    }
    
    // ===== ENHANCED SELECT DROPDOWN =====
    function setupSelectDropdown() {
        const select = document.getElementById('serviceFilter');
        if (!select) return;
        
        // Add enhanced focus and blur effects
        select.addEventListener('focus', function() {
            this.style.transform = 'translateY(-2px)';
        });
        
        select.addEventListener('blur', function() {
            this.style.transform = 'translateY(0)';
        });
        
        // Add change animation
        select.addEventListener('change', function() {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = 'translateY(-2px)';
            }, 100);
        });
        
        // Keyboard navigation enhancement
        select.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                this.dispatchEvent(new Event('change'));
            }
        });
    }
    
    // ===== RESPONSIVE BEHAVIOR HANDLING =====
    function handleResponsiveChanges() {
        const screenWidth = window.innerWidth;
        const cards = document.querySelectorAll('.service-card');
        const select = document.getElementById('serviceFilter');
        
        // Adjust animations based on screen size
        if (screenWidth < 768) {
            // Mobile optimizations
            cards.forEach(card => {
                card.style.transition = 'transform 0.2s ease, box-shadow 0.2s ease';
            });
            
            if (select) {
                select.style.minWidth = '280px';
                select.style.fontSize = '0.85rem';
            }
        } else if (screenWidth < 992) {
            // Tablet optimizations
            cards.forEach(card => {
                card.style.transition = 'all 0.3s cubic-bezier(0.4, 0, 0.2, 1)';
            });
            
            if (select) {
                select.style.minWidth = '350px';
                select.style.fontSize = '0.95rem';
            }
        } else {
            // Desktop - full features
            cards.forEach(card => {
                card.style.transition = 'all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
            });
            
            if (select) {
                select.style.minWidth = '400px';
                select.style.fontSize = '1rem';
            }
        }
        
        // Handle very small screens
        if (screenWidth < 350) {
            if (select) {
                select.style.minWidth = '200px';
                select.style.fontSize = '0.8rem';
                select.style.padding = '0.6rem 0.8rem';
            }
        }
    }
    
    // ===== INTERSECTION OBSERVER FOR ANIMATIONS =====
    function setupIntersectionObserver() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '50px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                    
                    // Add staggered animation
                    const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                    entry.target.style.transitionDelay = `${delay}ms`;
                }
            });
        }, observerOptions);
        
        // Observe all service cards
        document.querySelectorAll('.service-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';
            observer.observe(card);
        });
    }
    
    // ===== PERFORMANCE OPTIMIZATIONS =====
    function optimizePerformance() {
        // Check for low-power devices
        const isLowPowerDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency < 4;
        const isSlowConnection = navigator.connection && 
                               navigator.connection.effectiveType && 
                               (navigator.connection.effectiveType.includes('2g') || 
                                navigator.connection.effectiveType.includes('3g'));
        
        if (isLowPowerDevice || isSlowConnection) {
            // Reduce animation complexity
            const style = document.createElement('style');
            style.textContent = `
                .service-card {
                    transition: transform 0.2s ease !important;
                }
                .service-card:hover {
                    transform: translateY(-3px) !important;
                }
                .custom-select {
                    transition: none !important;
                }
            `;
            document.head.appendChild(style);
        }
    }
    
    // ===== ACCESSIBILITY ENHANCEMENTS =====
    function enhanceAccessibility() {
        // Check for reduced motion preference
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            const style = document.createElement('style');
            style.textContent = `
                .service-card,
                .custom-select,
                .service-card .card-img-top {
                    transition: none !important;
                    animation: none !important;
                }
                .service-card:hover {
                    transform: translateY(-2px) !important;
                }
            `;
            document.head.appendChild(style);
        }
        
        // Add screen reader announcements
        const select = document.getElementById('serviceFilter');
        if (select) {
            select.setAttribute('aria-label', 'Filter services by category');
            
            select.addEventListener('change', function() {
                const selectedText = this.options[this.selectedIndex].text;
                const announcement = selectedText.includes('All Services') 
                    ? 'Showing all services' 
                    : `Filtering by ${selectedText.replace(/^[^\w\s]+\s*/, '').trim()}`;
                
                // Create temporary announcement element
                const announcer = document.createElement('div');
                announcer.setAttribute('aria-live', 'assertive');
                announcer.setAttribute('aria-atomic', 'true');
                announcer.className = 'sr-only';
                announcer.textContent = announcement;
                document.body.appendChild(announcer);
                
                setTimeout(() => {
                    document.body.removeChild(announcer);
                }, 1000);
            });
        }
    }
    
    // ===== SERVICE DETAIL NAVIGATION =====
    function viewService(id) {
        // Add loading indicator
        const body = document.body;
        body.style.cursor = 'wait';
        
        // Navigate to service detail
        window.location.href = 'service-detail.php?id=' + encodeURIComponent(id);
    }
    
    // Make viewService globally accessible
    window.viewService = viewService;
    
    // ===== INITIALIZE ALL FEATURES =====
    setupServiceCards();
    setupSelectDropdown();
    handleResponsiveChanges();
    setupIntersectionObserver();
    optimizePerformance();
    enhanceAccessibility();
    
    // ===== EVENT LISTENERS =====
    
    // Handle window resize with debouncing
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(handleResponsiveChanges, 250);
    });
    
    // Handle orientation change
    window.addEventListener('orientationchange', function() {
        setTimeout(handleResponsiveChanges, 100);
    });
    
    // Handle visibility change for performance
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            // Pause non-essential animations when page is hidden
            document.querySelectorAll('.service-card').forEach(card => {
                card.style.animationPlayState = 'paused';
            });
        } else {
            // Resume animations when page is visible
            document.querySelectorAll('.service-card').forEach(card => {
                card.style.animationPlayState = 'running';
            });
        }
    });
    
    // Handle page load completion
    window.addEventListener('load', function() {
        // Remove any loading states
        const select = document.getElementById('serviceFilter');
        if (select) {
            select.disabled = false;
            select.style.opacity = '1';
            select.style.cursor = 'pointer';
        }
        
        // Add loaded class for any final animations
        document.body.classList.add('page-loaded');
    });
});

// ===== UTILITY FUNCTIONS =====

// Debounce function for performance optimization
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

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    }
}

// ===== FALLBACKS FOR OLDER BROWSERS =====
if (!window.IntersectionObserver) {
    // Fallback for browsers without IntersectionObserver
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.service-card');
        cards.forEach((card, index) => {
            setTimeout(() => {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });
}
</script>

<?php include 'includes/footer.php'; ?>