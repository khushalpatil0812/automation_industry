<?php
// components/ui/scroll-area.php
function renderScrollArea($content = '', $class = 'scroll-area') {
    echo '<div class="' . htmlspecialchars($class) . '" style="overflow:auto;">' . $content . '</div>';
}
?>
