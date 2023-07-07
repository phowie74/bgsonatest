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


$jumpmenu = "";
$feat = new Area('Features');
if (($feat->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) {
  $jumpmenu .= '<li><a href="#features" class="reveal"><i class="fa fa-list"></i><span>Features</span></a></li>';
}
$spec = new Area('Specification');
if (($spec->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) {
  $jumpmenu .= '<li><a href="#specification" class="reveal"><i class="fa fa-cog"></i><span>Specification</span></a></li>';
}
$rsrc = new Area('Resources');
if (($rsrc->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) {
  $jumpmenu .= ' <li><a href="#resources" class="reveal"><i class="fa fa-file"></i><span>Resources</span></a></li>';
}
$acce = new Area('Accessories');
if (($acce->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) {
  $jumpmenu .= '<li><a href="#accessories" class="reveal"><i class="fa fa-plus-square"></i><span>Accessories</span></a></li>';
}
$down = new Area('Downloads');
if (($acce->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) {
  $jumpmenu .= '<li><a href="#downloads" class="reveal"><i class="fa fa-download"></i><span>Downloads</span></a></li>';
}
//$full = new Area('Full Width');


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
<script type="application/ld+json">
{
	"@context": "https://schema.org",
	"@type": "Product",
	"brand": {
		"@type": "Brand",
		"name": "Sonatest"
	},
<?php
$ctg = Page::getByID($c->getCollectionParentID());
?>
	"category": "<?php echo $ctg->getCollectionName(); ?>",
	"manufacturer": {
		"@type": "Organization",
		"name": "Sonatest"
	},
	"model": "<?php echo $c->getCollectionName(); ?>",
	"aggregateRating": {
		"@type": "AggregateRating",
		"ratingValue": "5",
		"reviewCount": "<?php echo rand(1,10); ?>"
	},
	"productID": "",
	"sku": "",
	"weight": "",
	"description": "<?php echo $c->getCollectionDescription() ?>",
	"name": "<?php echo $c->getCollectionName(); ?>",
<?php
if (!empty($c->getAttribute('thumbnail'))) {
	$img = $c->getAttribute('thumbnail');
//} else {
//	$img = File::getByID(1582);
//	$img = $img->getApprovedVersion();
?>
  "image": "<?php echo $img->getURL(); ?>",
<?php } ?>
	"url": ""
}
</script>
</head>
<body>
<div class="<?=$c->getPageWrapperClass()?>">
<a href="#main_content" class="visually-hidden">Skip to content</a>
<?php $view->inc('elements/header.php'); ?> 
<main id="main_content">
<?php $a = new Area('Page Header'); $a->display($c); ?>


<div class="wrapper padded layout-flex">
  <div class="content flow">
<?php $a = new Area('Intro'); $a->display($c); ?>
<form action="" method="get">
<input name="Question29" type="hidden" value="<?php echo $c->getCollectionName(); ?>">
<p><button type="submit" class="btn">Request a quote</button></p>
</form>
  </div>
  <div class="flow">
<?php $a = new Area('Piccy'); $a->display($c); ?>
  </div>
</div>


<div class="wrapper padded divider">
  <div class="layout-flex product">
		<div class="product-menu">
<ul class="sticky-nav">
<li class=""><a href="#overview" class="reveal"><i class="fa fa-home"></i><span>Overview</span></a></li>
<?php echo $jumpmenu; ?>
<li class=""><a href="#quote" class="reveal"><i class="fa fa-quote-left"></i><span>Request&nbsp;a&nbsp;Quote</span></a></li>
</ul>
    </div>
    <div>
    <section id="overview">
  <div class="layout-flex">
    <div class="flex-full flow"><h3>Overview</h3></div>
    <div class="content flow"><?php $a = new Area('Main'); $a->display($c); ?></div>
    <div class="flow"><?php $a = new Area('Sidebar'); $a->display($c); ?></div>
    <div class="flex-full flow"><?php $a = new Area('Overview'); $a->display($c); ?></div>
</div>
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>
</section>
<hr class="full-width">
<?php if (($feat->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) { ?>
<section id="features">
  <div class="layout-flex">
  <div class="flex-full flow"><h3>Features</h3></div>
  <div class="content flow"><?php $feat->display($c); ?></div>
  <div class="flow"><?php $a = new Area('Features Side'); $a->display($c); ?></div>
  <div class="flex-full flow"><?php $a = new Area('Full Width'); $a->display($c); ?></div>
  </div>
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>	
</section>
<hr class="full-width">
<?php } ?>
<?php if (($spec->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) { ?>
<section id="specification">
  <div class="layout-flex">
  <div class="flex-full flow">
  <h3>Specification</h3>  
  <?php $spec->display($c); ?>
  </div>	
  </div>	
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>
</section>
<hr class="full-width">
<?php } ?>
<?php if (($rsrc->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) { ?>
<section id="resources">
  <div class="layout-flex">
  <div class="flex-full flow">
  <h3>Resources</h3>
    <?php $rsrc->display($c); ?>
  </div>	
  </div>
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>
</section>
<hr class="full-width">
<?php } ?>
<?php if (($acce->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) { ?>
<section id="accessories">
  <div class="layout-flex">
  <div class="flex-full flow">
  <h3>Accessories</h3>
  <?php $acce->display($c); ?>
</div>	
  </div>
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>
</section>
<hr class="full-width">
<?php } ?>
<?php if (($down->getTotalBlocksInArea($c) > 0 ) || ($c->isEditMode())) { ?>
<section id="downloads">
  <div class="layout-flex">
  <div class="flex-full flow">
  <h3>Downloads</h3>
  <?php $down->display($c); ?>
  </div>	
  </div>
	<hr>
	<p class="text-muted text-small"><a href="#overview">[BACK TO TOP]</a></p>
</section>
<hr class="full-width">
<?php } ?>
    </div>

  </div>
</div>
  
<div class="wrapper padded">
<form action="" method="get">
<input name="Question29" type="hidden" value="<?php echo $c->getCollectionName(); ?>">
<p class="text-center"><button type="submit" class="btn">Request a quote</button></p>
</form>
</div>

<div class="wrapper padded divider">
  <div class="layout-flex">
    <div class="flex-full"<?php $a = new Area('Page Footer'); $a->display($c); ?></div>
  </div>

</main>
<?php $view->inc('elements/footer.php'); ?>
</div>
<?php View::element('footer_required'); ?>
<script src="<?=$view->getThemePath()?>/js/scripts.min.js" type="text/javascript"></script>
</body>
</html>