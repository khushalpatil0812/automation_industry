<?php
// app/services/service.php
include '../../includes/header.php';
require_once '../../classes/Service.php';

// Get service ID from query parameter
$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$serviceObj = new Service();
$service = $serviceObj->getServiceById($serviceId);

if ($service) {
    echo '<h1>' . htmlspecialchars($service['name']) . '</h1>';
    echo '<p>' . htmlspecialchars($service['description']) . '</p>';
    // Add more fields as needed
} else {
    echo '<h2>Service not found.</h2>';
}

include '../../includes/footer.php';
?>
