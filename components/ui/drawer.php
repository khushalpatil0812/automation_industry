<?php
// components/ui/drawer.php
function renderDrawer($content = '', $class = 'drawer') {
    echo '<div class="' . htmlspecialchars($class) . '">' . $content . '</div>';
}
?>
