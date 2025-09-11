<?php
// components/ui/slider.php
function renderSlider($name = '', $min = 0, $max = 100, $value = 0, $class = 'slider') {
    echo '<input type="range" name="' . htmlspecialchars($name) . '" min="' . intval($min) . '" max="' . intval($max) . '" value="' . intval($value) . '" class="' . htmlspecialchars($class) . '" />';
}
?>
