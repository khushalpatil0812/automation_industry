<?php
// components/ui/toggle-group.php
function renderToggleGroup($name = '', $options = [], $selected = [], $class = 'toggle-group') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($options as $value => $label) {
        $isChecked = in_array($value, $selected) ? ' checked' : '';
        echo '<label><input type="checkbox" name="' . htmlspecialchars($name) . '[]" value="' . htmlspecialchars($value) . '"' . $isChecked . ' />' . htmlspecialchars($label) . '</label>';
    }
    echo '</div>';
}
?>
