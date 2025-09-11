<?php
// components/ui/avatar.php
function renderAvatar($src = '', $alt = 'Avatar', $class = 'avatar') {
    echo '<img src="' . htmlspecialchars($src) . '" alt="' . htmlspecialchars($alt) . '" class="' . htmlspecialchars($class) . '" />';
}
?>
