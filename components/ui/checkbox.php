<?php
// components/ui/checkbox.php
function renderCheckbox($name = '', $checked = false, $label = '', $class = 'checkbox') {
    echo '<label class="' . htmlspecialchars($class) . '">';
    echo '<input type="checkbox" name="' . htmlspecialchars($name) . '"' . ($checked ? ' checked' : '') . ' />';
    echo htmlspecialchars($label);
    echo '</label>';
}
?>
