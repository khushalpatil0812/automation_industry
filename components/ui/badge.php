<?php
// components/ui/badge.php
function renderBadge($label = '', $class = 'badge') {
    echo '<span class="' . htmlspecialchars($class) . '">' . htmlspecialchars($label) . '</span>';
}
?>
