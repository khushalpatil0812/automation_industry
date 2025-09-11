<?php
// components/service-card.php
function renderServiceCard($title = '', $description = '', $image = '', $class = 'service-card') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    if ($image) {
        echo '<img src="' . htmlspecialchars($image) . '" alt="' . htmlspecialchars($title) . '" />';
    }
    echo '<h3>' . htmlspecialchars($title) . '</h3>';
    echo '<p>' . htmlspecialchars($description) . '</p>';
    echo '</div>';
}
?>
