<?php
// components/ui/use-toast.php
function showToast($message = '', $class = 'toast') {
    echo '<div class="' . htmlspecialchars($class) . '">' . htmlspecialchars($message) . '</div>';
}
?>
