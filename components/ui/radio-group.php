<?php
// components/ui/radio-group.php
function renderRadioGroup($name = '', $options = [], $selected = '', $class = 'radio-group') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($options as $value => $label) {
        $isChecked = ($value == $selected) ? ' checked' : '';
        echo '<label><input type="radio" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '"' . $isChecked . ' />' . htmlspecialchars($label) . '</label>';
    }
    echo '</div>';
}
?>
