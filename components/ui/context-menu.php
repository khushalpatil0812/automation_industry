<?php
// components/ui/context-menu.php
function renderContextMenu($items = [], $class = 'context-menu') {
    echo '<ul class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<li>' . htmlspecialchars($item) . '</li>';
    }
    echo '</ul>';
}
?>
