<?php defined('C5_EXECUTE') or die('Access Denied.');
$c = Page::getCurrentPage();
/** @var \Concrete\Core\Utility\Service\Text $th */
$th = Core::make('helper/text');
if (is_object($c) && $c->isEditMode() && $controller->isBlockEmpty()) {
?>
<div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.') ?></div>
<?php 
} else {
    echo '<div class="layout-grid">';
    foreach ($pages as $page) {
        $title = $page->getCollectionName();
        $target = '_self';
        if ($page->getCollectionPointerExternalLink() != '') {
            $url = $page->getCollectionPointerExternalLink();
            if ($page->openCollectionPointerExternalLinkInNewWindow()) {
                $target = '_blank';
            }
        } else {
            $url = $page->getCollectionLink();
            $target = $page->getAttribute('nav_target');
        }
?>
<a href="<?php echo h($url) ?>" target="<?php echo h($target) ?>">
<?php echo h($title) ?>
</a>
<?php } ?>
    </div>
<?php } ?>