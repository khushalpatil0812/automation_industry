<?php
// components/ui/resizable.php
function renderResizable($content = '', $class = 'resizable') {
    echo '<div class="' . htmlspecialchars($class) . '" style="resize:both;overflow:auto;">' . $content . '</div>';
}
?>
