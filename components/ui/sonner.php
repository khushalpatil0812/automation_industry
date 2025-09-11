<?php
// components/ui/sonner.php
function renderSonner($message = '', $class = 'sonner') {
    echo '<div class="' . htmlspecialchars($class) . '">' . htmlspecialchars($message) . '</div>';
}
?>
