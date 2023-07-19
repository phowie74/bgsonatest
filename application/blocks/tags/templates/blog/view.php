<?php defined('C5_EXECUTE') or die('Access Denied.');
if (isset($options) && count($options) > 0) {
    echo '<div class="flow">';
    if ($title) { echo '<p class="h3">'.$title.'</p>'; }
    echo '<ul class="list-inline text-small">';
    foreach ($options as $option) {

if (isset($target) && $target) {
 
    $selected = "";
    if (isset($selectedTag) && mb_strtolower($option->getSelectAttributeOptionValue()) == mb_strtolower($selectedTag)) { $selected = " selected"; }
    echo '<li><a href="'.$controller->getTagLink($option).'" class="label'.$selected.'">'.$option->getSelectAttributeOptionValue().'</a></li>';

} else {

    $selected = "";
    if (isset($selectedTag) && mb_strtolower($option->getSelectAttributeOptionValue()) == mb_strtolower($selectedTag)) { $selected = " selected"; }
    echo '<li><span class="label'.$selected.'"><?=$option->getSelectAttributeOptionValue()?></span></li>';
}
    }
    echo '</ul>';
    echo '</div>';
}
?>