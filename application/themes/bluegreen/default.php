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
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php View::element('header_required'); ?>
<meta name="theme-color" content="#dcdadb" />
<link rel="stylesheet" href="<?=$view->getThemePath()?>/styles.css">
</head>
<body>
<div class="<?=$c->getPageWrapperClass()?>">
<a href="#main_content" class="visually-hidden">Skip to content</a>
<?php $view->inc('elements/header.php'); ?>
<main id="main_content">
<?php $a = new Area('Page Header'); $a->display($c); ?>
<div class="wrapper padded layout-flex">
  <div class="content flow"><?php $a = new Area('Intro'); $a->display($c); ?></div>
  <div class="flow"><?php $a = new Area('Piccy'); $a->display($c); ?></div>
</div>
<div class="wrapper divider padded layout-flex">
  <div class="content flow"><?php $a = new Area('Main'); $a->display($c); ?></div>
  <div class="flow"><?php $a = new Area('Sidebar'); $a->display($c); ?></div>
</div>
<?php $a = new Area('Page Footer'); $a->display($c); ?>
</main>
<?php $view->inc('elements/footer.php'); ?>
</div>
<?php View::element('footer_required'); ?>
<script src="<?=$view->getThemePath()?>/js/scripts.min.js" type="text/javascript"></script>
</body>
</html>