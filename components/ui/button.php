<?php
// components/ui/button.php
function renderButton($label = 'Button', $type = 'button', $class = 'btn') {
    echo '<button type="' . htmlspecialchars($type) . '" class="' . htmlspecialchars($class) . '">' . htmlspecialchars($label) . '</button>';
}
?>
