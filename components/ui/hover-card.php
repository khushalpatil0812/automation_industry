<?php
// components/ui/hover-card.php
function renderHoverCard($content = '', $class = 'hover-card') {
    echo '<div class="' . htmlspecialchars($class) . '">' . $content . '</div>';
}
?>
