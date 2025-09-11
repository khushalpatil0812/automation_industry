<?php
// components/ui/select.php
function renderSelect($name = '', $options = [], $selected = '', $class = 'select') {
    echo '<select name="' . htmlspecialchars($name) . '" class="' . htmlspecialchars($class) . '">';
    foreach ($options as $value => $label) {
        $isSelected = ($value == $selected) ? ' selected' : '';
        echo '<option value="' . htmlspecialchars($value) . '"' . $isSelected . '>' . htmlspecialchars($label) . '</option>';
    }
    echo '</select>';
}
?>
