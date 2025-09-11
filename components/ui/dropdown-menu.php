<?php
// components/ui/dropdown-menu.php
function renderDropdownMenu($items = [], $class = 'dropdown-menu') {
    echo '<ul class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<li>' . htmlspecialchars($item) . '</li>';
    }
    echo '</ul>';
}
?>
