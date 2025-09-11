<?php
// components/ui/popover.php
function renderPopover($content = '', $class = 'popover') {
    echo '<div class="' . htmlspecialchars($class) . '">' . $content . '</div>';
}
?>
