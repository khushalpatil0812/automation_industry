<?php
// components/ui/switch.php
function renderSwitch($name = '', $checked = false, $label = '', $class = 'switch') {
    echo '<label class="' . htmlspecialchars($class) . '">';
    echo '<input type="checkbox" name="' . htmlspecialchars($name) . '"' . ($checked ? ' checked' : '') . ' />';
    echo htmlspecialchars($label);
    echo '</label>';
}
?>
