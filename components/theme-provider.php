<?php
// components/theme-provider.php
function setTheme($theme = 'light') {
    echo '<body class="theme-' . htmlspecialchars($theme) . '">';
}
?>
