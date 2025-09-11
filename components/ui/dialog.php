<?php
// components/ui/dialog.php
function renderDialog($title = '', $body = '', $class = 'dialog') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    if ($title) {
        echo '<div class="dialog-title">' . htmlspecialchars($title) . '</div>';
    }
    echo '<div class="dialog-body">' . $body . '</div>';
    echo '</div>';
}
?>
