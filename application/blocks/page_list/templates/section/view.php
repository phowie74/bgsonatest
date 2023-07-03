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










<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php
$c = Page::getCurrentPage();
/** @var \Concrete\Core\Utility\Service\Text $th */
$th = Core::make('helper/text');
/** @var \Concrete\Core\Localization\Service\Date $dh */
$dh = Core::make('helper/date');
if (is_object($c) && $c->isEditMode() && $controller->isBlockEmpty()) {
?>
<div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.') ?></div>
<?php } else { ?>

<div class="layout-grid">
    <?php if (isset($pageListTitle) && $pageListTitle) { ?>
<div class="grid-full">
<<?php echo $titleFormat; ?>><?php echo h($pageListTitle) ?></<?php echo $titleFormat; ?>>
</div>
    <?php } ?>

    <?php if (isset($rssUrl) && $rssUrl) { ?>
<a href="<?php echo $rssUrl ?>" target="_blank" class="ccm-block-page-list-rss-feed">
<i class="fas fa-rss"></i>
</a>
    <?php } ?>

    <?php foreach ($pages as $page) { ?>

<?php
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
$description = $page->getCollectionDescription();
$description = $controller->truncateSummaries ? $th->wordSafeShortText($description, $controller->truncateChars) : $description;
$thumbnail = false;
if ($displayThumbnail) {
    $thumbnail = $page->getAttribute('thumbnail');
}
//$date = $dh->formatDateTime($page->getCollectionDatePublic(), true);
$collectionDate = strtotime($page->getCollectionDatePublic());
$date = date("jS F Y", $collectionDate);
?>



    <?php if (is_object($thumbnail)) { ?>                      
<?php
//$img = Core::make('html/image', ['f' => $thumbnail]);
//$tag = $img->getTag();
//$tag->addClass('img-fluid');
//echo $tag;

// blog entry thumbnail = 
$fv = $thumbnail->getApprovedVersion();
$sm = \Concrete\Core\File\Image\Thumbnail\Type\Type::getByHandle('blog_entry_thumbnail');
$small = $fv->getThumbnailURL($sm->getBaseVersion());
$small2x = $fv->getThumbnailURL($sm->getDoubledVersion());
$findme = "thumbnails";
if (strpos($small2x, $findme)) {
echo '<picture>';
echo "<!--[if IE 9]><video style='display: none;'><![endif]-->";

if (strpos($small, $findme)) {
    echo '<source srcset="'.$small;
    if (strpos($small2x, $findme)) {
        echo ', '.$small2x.' 2x';
    } else {
        echo ', '.$fv->getRelativePath().' 2x';
    }
    echo '" media="(min-width: 100px)">';
}
echo '<!--[if IE 9]></video><![endif]-->';
}
echo '<img src="'.$small.'" alt="'.h($title).'" class="ccm-image-block">';
if (strpos($small2x, $findme)) {
echo '</picture>';
}
?>
    <?php } ?>

    <?php if (isset($includeName) && $includeName) { ?>

<a href="<?php echo h($url) ?>" target="<?php echo h($target) ?>">
<?php echo h($title) ?>
</a>
    <?php } ?>

    <?php if (isset($includeDate) && $includeDate) { ?>
<?php echo h($date) ?>
    <?php } ?>

    <?php if (isset($includeDescription) && $includeDescription) { ?>
<?php echo h($description) ?>
    <?php } ?>

    <?php if (isset($useButtonForLink) && $useButtonForLink) { ?>
<a href="<?php echo h($url) ?>" target="<?php echo h($target) ?>" class="btn"><?php echo h($buttonLinkText) ?></a>
    <?php } ?>

    <?php } ?>

    <?php if (count($pages) == 0) { ?>
<div class="grid-full"><?php echo h($noResultsMessage) ?></div>
    <?php } ?>

    <?php if ($showPagination) { ?>
<div class="grid-full"><?php echo $pagination; ?></div>
    <?php } ?>

</div><!-- end .ccm-block-page-list-wrapper -->

<?php } ?>