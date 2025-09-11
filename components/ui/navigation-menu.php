<?php
// components/ui/navigation-menu.php
function renderNavigationMenu($items = [], $class = 'navigation-menu') {
    echo '<nav class="' . htmlspecialchars($class) . '"><ul>';
    foreach ($items as $item) {
        echo '<li>' . htmlspecialchars($item) . '</li>';
    }
    echo '</ul></nav>';
}
?>
