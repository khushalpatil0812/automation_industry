<?php
// components/ui/aspect-ratio.php
function renderAspectRatio($content = '', $ratio = '16:9', $class = 'aspect-ratio') {
    $ratios = explode(':', $ratio);
    $padding = ($ratios[1] / $ratios[0]) * 100;
    echo '<div class="' . htmlspecialchars($class) . '" style="position:relative;width:100%;padding-top:' . $padding . '%;">';
    echo '<div style="position:absolute;top:0;left:0;width:100%;height:100%;">' . $content . '</div>';
    echo '</div>';
}
?>
