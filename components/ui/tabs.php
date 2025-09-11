<?php
// components/ui/tabs.php
function renderTabs($tabs = [], $active = 0, $class = 'tabs') {
    echo '<div class="' . htmlspecialchars($class) . '">';
    echo '<ul class="tab-list">';
    foreach ($tabs as $i => $tab) {
        $activeClass = ($i == $active) ? ' active' : '';
        echo '<li class="tab' . $activeClass . '">' . htmlspecialchars($tab) . '</li>';
    }
    echo '</ul>';
    echo '</div>';
}
?>
