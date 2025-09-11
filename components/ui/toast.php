<?php
// components/ui/toast.php
function renderToast($message = '', $class = 'toast') {
    echo '<div class="' . htmlspecialchars($class) . '">' . htmlspecialchars($message) . '</div>';
}
?>
