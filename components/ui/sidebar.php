<?php
// components/ui/sidebar.php
function renderSidebar($items = [], $class = 'sidebar') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<div class="sidebar-item">' . htmlspecialchars($item) . '</div>';
    }
    echo '</div>';
}
?>
