<?php defined('C5_EXECUTE') or die('Access Denied.');
$c = Page::getCurrentPage();
/** @var \Concrete\Core\Utility\Service\Text $th */
$th = Core::make('helper/text');
if (is_object($c) && $c->isEditMode() && $controller->isBlockEmpty()) {
?>
<div class="ccm-edit-mode-disabled-item"><?php echo t('Empty Page List Block.') ?></div>
<?php } else { ?>
    <?php if (isset($pageListTitle) && $pageListTitle) { ?>
<<?php echo $titleFormat; ?> class="text-center"><?php echo h($pageListTitle) ?></<?php echo $titleFormat; ?>>
    <?php } ?>
    <?php if (isset($rssUrl) && $rssUrl) { ?>
<a href="<?php echo $rssUrl ?>" target="_blank" class="ccm-block-page-list-rss-feed"><i class="fas fa-rss"></i></a>
    <?php } ?>


<?php
// FILTER PAGES FOR USER PROFILE PAGE
if(isset($_GET['u'])) {
  $uid = $_GET['u'];
  $pg = $list->filterByUserID($uid);
  $pages = $list->get();
  $pg = $list->getPagination();
}
?>



<div class="layout-grid">
<?php
foreach ($pages as $page) {
    $title = $page->getCollectionName();
    $subtitle = $page->getAttribute('product_subtitle');
    $target = '_self';
    if ($page->getCollectionPointerExternalLink() != '') {
        $url = $page->getCollectionPointerExternalLink();
        if ($page->openCollectionPointerExternalLinkInNewWindow()) { $target = '_blank'; }
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
    $user = "";
    $blog_name = "";
    $company = "";
    $bioID = $page->getCollectionUserID();
    if ($bioID) {
        $user = UserInfo::getByID($bioID);
        $blog_name = $user->getAttribute('blog');
        $company = $user->getAttribute('company');
    }
?>
<div class="card">
<div class="card-image">
<?php if (is_object($thumbnail)) {                    
//$img = Core::make('html/image', ['f' => $thumbnail]);
//$tag = $img->getTag();
//$tag->addClass('img-fluid');
//echo $tag;

// blog entry thumbnail = 
echo '<a href="'.h($url).'" target="'.h($target).'" class="">';
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
echo '</a>';

}
?>
</div>
<div class="card-content flow">
<p class="h4 text-strong"><a href="<?php echo h($url) ?>" target="<?php echo h($target) ?>" class="">
<?php echo h($title) ?>
</a></p>
<?php
if (isset($includeDescription) && $includeDescription) {
    echo '<p>'.h(nl2br($description)).'</p>';
}
?>
<p><small>
<?php
if (isset($includeDate) && $includeDate) {
    echo '<i class="fa fa-calendar"></i>&emsp;'.h($date).'<br>';
}
echo '<a href="/blog/profile?u='.$bioID.'">';
if(!empty($blog_name)) { echo '<i class="fa fa-user"></i>&emsp;'.$blog_name.'<br>'; }
if(!empty($company)) { echo '<i class="fa fa-building"></i>&emsp;'.$company; }
echo '</a>';
?>
</small></p>


<?php if (isset($useButtonForLink) && $useButtonForLink) { ?>
<a href="<?php echo h($url) ?>" target="<?php echo h($target) ?>" class="btn"><?php echo h($buttonLinkText) ?></a>
<?php } ?>
</div>
</div>

<?php } ?>
    </div>
<?php } ?>


    <?php if (count($pages) == 0) { ?>
<div class=""><?php echo h($noResultsMessage) ?></div>
    <?php } ?>

    <?php if ($showPagination) { ?>
<div class=""><?php echo $pagination; ?></div>
    <?php } ?>
