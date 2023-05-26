<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<?php
/*$c = Page::getCurrentPage();
$nh = Core::make("helper/navigation");
$cobj = $nh->getTrailToCollection($c);
$rcobj = array_reverse($cobj);
if (is_object($rcobj[1])) {
  $pID = $rcobj[1]->getCollectionID();
  $page = Page::getByID($pID); //$GLOBALS["sect"] = $page->getCollectionName();
  $section = '<p class="h2">'.$page->getCollectionName().'</p>';
} else {
  $section = '<h1 class="h2">'.$c->getCollectionName().'</h1>';
}*/
?>
<!doctype html>
<html class="no-js" lang="">
<head>
<!-- FONT? -->
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php View::element('header_required'); ?>
<link rel="stylesheet" href="<?=$view->getThemePath()?>/styles.css">
</head>
<body>
<div class="<?=$c->getPageWrapperClass()?>">
<a href="#main_content" class="visually-hidden" tabindex="1">Skip to content</a>
<?php $view->inc('elements/header.php'); ?>
<main id="main_content">
<?php // This template is used to display non-system single pages.
print $innerContent;
?>
</main>
<?php $view->inc('elements/footer.php'); ?>
</div>
<?php View::element('footer_required'); ?>
<script src="<?=$view->getThemePath()?>/js/scripts-min.js"></script>
</body>
</html>