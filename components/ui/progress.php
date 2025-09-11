<?php
// components/ui/progress.php
function renderProgress($value = 0, $max = 100, $class = 'progress') {
    echo '<progress class="' . htmlspecialchars($class) . '" value="' . intval($value) . '" max="' . intval($max) . '"></progress>';
}
?>
