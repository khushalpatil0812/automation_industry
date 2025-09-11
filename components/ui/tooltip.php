<?php
// components/ui/tooltip.php
function renderTooltip($text = '', $class = 'tooltip') {
    echo '<span class="' . htmlspecialchars($class) . '">' . htmlspecialchars($text) . '</span>';
}
?>
