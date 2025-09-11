<?php
// components/ui/sheet.php
function renderSheet($content = '', $class = 'sheet') {
    echo '<div class="' . htmlspecialchars($class) . '">' . $content . '</div>';
}
?>
