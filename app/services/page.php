<?php
// app/services/page.php
include '../../includes/header.php';
?>
<h1>Our Services</h1>
<?php
// Example: Fetch and display services from database
require_once '../../classes/Service.php';
$serviceObj = new Service();
$services = $serviceObj->getAllServices();
foreach ($services as $service) {
    echo '<div class="service-card">';
    echo '<h2>' . htmlspecialchars($service['name']) . '</h2>';
    echo '<p>' . htmlspecialchars($service['description']) . '</p>';
    echo '</div>';
}
?>
<?php
include '../../includes/footer.php';
?>
