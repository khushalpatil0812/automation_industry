<?php
// components/ui/command.php
function renderCommand($commands = [], $class = 'command') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($commands as $command) {
        echo '<div class="command-item">' . htmlspecialchars($command) . '</div>';
    }
    echo '</div>';
}
?>
