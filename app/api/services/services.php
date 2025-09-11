<?php
// app/api/services/services.php
header('Content-Type: application/json');
require_once '../../../classes/Service.php';

$serviceId = isset($_GET['id']) ? intval($_GET['id']) : 0;
$serviceObj = new Service();
$service = $serviceObj->getServiceById($serviceId);

if ($service) {
    echo json_encode([
        'success' => true,
        'data' => $service
    ]);
} else {
    echo json_encode([
        'success' => false,
        'error' => 'Service not found.'
    ]);
}
?>
