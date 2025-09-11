<?php
// components/ui/label.php
function renderLabel($for = '', $text = '', $class = 'label') {
    echo '<label for="' . htmlspecialchars($for) . '" class="' . htmlspecialchars($class) . '">' . htmlspecialchars($text) . '</label>';
}
?>
