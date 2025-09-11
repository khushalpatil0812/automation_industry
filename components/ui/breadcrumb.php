<?php
// components/ui/breadcrumb.php
function renderBreadcrumb($items = [], $class = 'breadcrumb') {
    echo '<nav class="' . htmlspecialchars($class) . '"><ol>';
    foreach ($items as $item) {
        echo '<li>' . htmlspecialchars($item) . '</li>';
    }
    echo '</ol></nav>';
}
?>
