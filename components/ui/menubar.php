<?php
// components/ui/menubar.php
function renderMenubar($items = [], $class = 'menubar') {
    echo '<ul class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<li>' . htmlspecialchars($item) . '</li>';
    }
    echo '</ul>';
}
?>
