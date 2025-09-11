<?php
// components/ui/toggle.php
function renderToggle($name = '', $checked = false, $label = '', $class = 'toggle') {
    echo '<label class="' . htmlspecialchars($class) . '">';
    echo '<input type="checkbox" name="' . htmlspecialchars($name) . '"' . ($checked ? ' checked' : '') . ' />';
    echo htmlspecialchars($label);
    echo '</label>';
}
?>
