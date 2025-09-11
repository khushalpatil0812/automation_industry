<?php
// lib/services-storage.php
require_once dirname(__DIR__) . '/classes/Service.php';

function getAllServices() {
    $serviceObj = new Service();
    return $serviceObj->getAllServices();
}

function getServiceById($id) {
    $serviceObj = new Service();
    return $serviceObj->getServiceById($id);
}
?>
