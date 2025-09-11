<?php
// components/ui/input.php
function renderInput($type = 'text', $name = '', $value = '', $class = 'input', $placeholder = '') {
    echo '<input type="' . htmlspecialchars($type) . '" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" class="' . htmlspecialchars($class) . '" placeholder="' . htmlspecialchars($placeholder) . '" />';
}
?>
