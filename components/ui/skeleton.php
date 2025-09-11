<?php
// components/ui/skeleton.php
function renderSkeleton($count = 1, $class = 'skeleton') {
    for ($i = 0; $i < $count; $i++) {
        echo '<div class="' . htmlspecialchars($class) . '"></div>';
    }
}
?>
