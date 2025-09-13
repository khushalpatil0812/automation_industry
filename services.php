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
    $services = $service->getAllServices();
}

// Get active categories
$categories = $service->getCategories();

include 'includes/header.php';
?>

<main>
    <style>
/* Improved Category Filter Styling */
.category-filter {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 10px;
    margin: 25px 0;
}

.filter-btn {
    padding: 10px 20px;
    background-color: #f8f9fa;
    border: 1px solid #dee2e6;
    border-radius: 5px;
    color: #495057;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
}

.filter-btn:hover {
    background-color: #e9ecef;
}

.filter-btn.active {
    background-color: #007bff;
    color: white;
    border-color: #007bff;
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .category-filter {
        gap: 8px;
    }
    
    .filter-btn {
        padding: 8px 16px;
        font-size: 0.9rem;
    }
}

@media (max-width: 576px) {
    .category-filter {
        justify-content: flex-start;
        overflow-x: auto;
        padding-bottom: 10px;
        margin: 15px -10px;
    }
    
    .filter-btn {
        flex-shrink: 0;
    }
}

/* Services Grid */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 1.5rem;
}

.service-card {
    background: #fff;
    border: 1px solid #e5e5e5;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s, box-shadow 0.2s;
}

.service-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.service-image img {
    width: 100%;
    height: 180px;
    object-fit: cover;
}

.service-content {
    padding: 1rem;
}

.service-title {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
}

.service-description {
    font-size: 0.95rem;
    color: #666;
}

.no-services {
    text-align: center;
    padding: 2rem;
    font-size: 1.1rem;
    color: #888;
}
</style>

    <section class="page-header">
        <div class="container">
            <h1>Our Services</h1>
            <p>Comprehensive business solutions tailored to your needs</p>
        </div>
    </section>

    <section class="services-section">
        <div class="container">
            <!-- Category Filter -->
            <div class="category-filter">
                <button class="filter-btn <?php echo !$selected_category ? 'active' : ''; ?>" 
                        onclick="filterServices('')">All Services</button>
                <?php foreach ($categories as $category): ?>
                    <button class="filter-btn <?php echo $selected_category === $category ? 'active' : ''; ?>" 
                            onclick="filterServices('<?php echo htmlspecialchars($category); ?>')">
                        <?php echo htmlspecialchars($category); ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- Services Grid -->
            <div class="services-grid">
                <?php if (empty($services)): ?>
                    <div class="no-services">
                        <p>No services found in this category.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($services as $service_item): ?>
                        <div class="service-card" onclick="viewService(<?php echo $service_item['id']; ?>)">
                            <div class="service-image">
                                <img src="<?php echo htmlspecialchars($service_item['image']); ?>" 
                                     alt="<?php echo htmlspecialchars($service_item['title']); ?>">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title"><?php echo htmlspecialchars($service_item['title']); ?></h3>
                                <p class="service-description">
                                    <?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?>
                                </p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

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
</script>

<?php include 'includes/footer.php'; ?>
