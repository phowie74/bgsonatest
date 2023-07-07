<?php defined('C5_EXECUTE') or die('Access Denied.');
$c = Page::getCurrentPage();
$img = $c->getAttribute('thumbnail');
//echo $controller->getOpenTag();
if ($img) {
	if ($controller->getTitle()) { echo '<p class="h3">' . $controller->getTitle() . '</p>'; }
    $fv = $img->getApprovedVersion();
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
    echo '<img src="'.$small.'" alt="'.h($c->getCollectionName()).'" class="ccm-image-block">';
if (strpos($small2x, $findme)) {
    echo '</picture>';
}
}