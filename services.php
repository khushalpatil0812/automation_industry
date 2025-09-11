<?php
require_once 'config/config.php';
require_once 'classes/Service.php';

$page_title = 'Services';
$service = new Service();

// Get category filter
$selected_category = isset($_GET['category']) ? $_GET['category'] : '';

// Get services based on category
if ($selected_category) {
    $services = $service->getServicesByCategory($selected_category);
} else {
    $services = $service->getAllServices();
}

$categories = $service->getCategories();

include 'includes/header.php';
?>

<main>
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
                                <!-- <div class="service-category">php echo htmlspecialchars($service_item['id']); ?></div> -->
                                <h3 class="service-title"><?php echo htmlspecialchars($service_item['title']); ?></h3>
                                <p class="service-description"><?php echo htmlspecialchars(substr($service_item['description'], 0, 120)) . '...'; ?></p>
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
