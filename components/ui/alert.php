<?php
// components/ui/alert.php
function renderAlert($message = '', $type = 'info', $class = 'alert') {
    echo '<div class="' . htmlspecialchars($class) . ' ' . htmlspecialchars($type) . '">' . htmlspecialchars($message) . '</div>';
}
?>
