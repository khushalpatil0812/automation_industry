<?php
// components/ui/card.php
function renderCard($title = '', $content = '', $class = 'card') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    if ($title) {
        echo '<h3>' . htmlspecialchars($title) . '</h3>';
    }
    echo '<div>' . $content . '</div>';
    echo '</div>';
}
?>
