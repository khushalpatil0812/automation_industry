<?php
// components/navbar.php
function renderNavbar($links = [], $class = 'navbar') {
    echo '<nav class="' . htmlspecialchars($class) . '"><ul>';
    foreach ($links as $text => $url) {
        echo '<li><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($text) . '</a></li>';
    }
    echo '</ul></nav>';
}
?>
