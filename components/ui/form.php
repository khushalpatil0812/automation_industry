<?php
// components/ui/form.php
function renderForm($action = '', $method = 'post', $fields = [], $class = 'form') {
    echo '<form action="' . htmlspecialchars($action) . '" method="' . htmlspecialchars($method) . '" class="' . htmlspecialchars($class) . '">';
    foreach ($fields as $field) {
        echo $field; // Each field should be a string of HTML
    }
    echo '<button type="submit">Submit</button>';
    echo '</form>';
}
?>
