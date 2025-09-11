<?php
// components/ui/textarea.php
function renderTextarea($name = '', $value = '', $rows = 4, $cols = 40, $class = 'textarea') {
    echo '<textarea name="' . htmlspecialchars($name) . '" rows="' . intval($rows) . '" cols="' . intval($cols) . '" class="' . htmlspecialchars($class) . '">' . htmlspecialchars($value) . '</textarea>';
}
?>
