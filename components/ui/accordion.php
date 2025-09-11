<?php
// components/ui/accordion.php
function renderAccordion($items = [], $class = 'accordion') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    foreach ($items as $item) {
        echo '<div class="accordion-item">';
        echo '<div class="accordion-header">' . htmlspecialchars($item['header']) . '</div>';
        echo '<div class="accordion-body">' . htmlspecialchars($item['body']) . '</div>';
        echo '</div>';
    }
    echo '</div>';
}
?>
