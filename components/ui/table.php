<?php
// components/ui/table.php
function renderTable($headers = [], $rows = [], $class = 'table') {
    echo '<table class="' . htmlspecialchars($class) . '">';
    if (!empty($headers)) {
        echo '<thead><tr>';
        foreach ($headers as $header) {
            echo '<th>' . htmlspecialchars($header) . '</th>';
        }
        echo '</tr></thead>';
    }
    if (!empty($rows)) {
        echo '<tbody>';
        foreach ($rows as $row) {
            echo '<tr>';
            foreach ($row as $cell) {
                echo '<td>' . htmlspecialchars($cell) . '</td>';
            }
            echo '</tr>';
        }
        echo '</tbody>';
    }
    echo '</table>';
}
?>
