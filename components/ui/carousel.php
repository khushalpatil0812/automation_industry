<?php
// components/ui/carousel.php
function renderCarousel($items = [], $class = 'carousel') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<div class="carousel-item">' . $item . '</div>';
    }
    echo '</div>';
}
?>
