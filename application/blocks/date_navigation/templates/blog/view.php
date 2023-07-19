<?php defined('C5_EXECUTE') or die('Access Denied.');

/** @var string $titleFormat */
/** @var string $title */
/** @var Concrete\Core\Block\View\BlockView $view */
/** @var array<int,array<string,string>> $dates */
/** @var string|null $selectedYear */
/** @var string|null $selectedMonth */

if (count($dates)) {

    if (!empty($title)) {
        echo '<p class="h3">'.h($title).'</p>';
    }

    $cyear = "0";

    echo '<ul class="list-group list-toggle" role="list">';

    foreach($dates as $date) {
        $label = $view->controller->getDateLabel($date);
        $year = substr($label, -4);
        $url = substr($view->controller->getDateLink($date), -7);

// TOP LEVEL YEAR        
        if ($year != $cyear) {
// NEW YEAR
// CLOSE OLD MONTH
            if ($cyear !== "0") {
                echo '</li></ul>';
            }
// START NEW YEAR
            echo '<li class="list-header"><a href="#0" class="toggle">'.$year.'</a>';
// START MONTHS
            echo '<ul class="show">';
            $cyear = $year;
        } else {
// CLOSE PREVIOUS MONTH
            echo '</li>';
        }
// OUTPUT MONTH
        echo '<li><a href="/news/latest/'.$url.'"';
        if ($view->controller->isSelectedDate($date)) { echo ' class="selected"'; }
        echo '>'.$label.'</a>';
    }
// CLOSE MONTH & YEAR
    echo '</ul></li></ul>';

} else {
    echo t('None.');
}