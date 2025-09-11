<?php
// components/ui/alert-dialog.php
function renderAlertDialog($message = '', $class = 'alert-dialog') {
    echo '<div class="' . htmlspecialchars($class) . '">' . htmlspecialchars($message) . '</div>';
}
?>
