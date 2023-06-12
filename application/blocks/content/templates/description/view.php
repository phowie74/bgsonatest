<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Block\Content\Controller $controller */
/** @var string $content */

    $c = \Concrete\Core\Page\Page::getCurrentPage();
    $text = app('helper/text');
    if (!$content && is_object($c) && $c->isEditMode()) {
        ?>
		<div class="ccm-edit-mode-disabled-item"><?=t('Empty Content Block.')?></div> 
	<?php
    } else {
        if (!empty($c->getCollectionDescription())) {
            echo '<p class="text-lead">'.$text->makenice($c->getCollectionDescription()).'</p>';
        } else {
            echo $content;
        }
    }