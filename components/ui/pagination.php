<?php
// components/ui/pagination.php
function renderPagination($pages = 1, $current = 1, $class = 'pagination') {
    echo '<ul class="' . htmlspecialchars($class) . '">';
    for ($i = 1; $i <= $pages; $i++) {
        $active = ($i == $current) ? ' active' : '';
        echo '<li class="page-item' . $active . '"><a href="?page=' . $i . '">' . $i . '</a></li>';
    }
    echo '</ul>';
}
?>
