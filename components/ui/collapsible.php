<?php
// components/ui/collapsible.php
function renderCollapsible($title = '', $content = '', $class = 'collapsible') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    echo '<div class="collapsible-title">' . htmlspecialchars($title) . '</div>';
    echo '<div class="collapsible-content">' . $content . '</div>';
    echo '</div>';
}
?>
