<?php
// components/ui/toaster.php
function renderToaster($messages = [], $class = 'toaster') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($messages as $msg) {
        echo '<div class="toast-message">' . htmlspecialchars($msg) . '</div>';
    }
    echo '</div>';
}
?>
