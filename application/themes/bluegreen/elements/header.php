<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<header>
<?php //$a = new GlobalArea("Header Left"); $a->display(); ?>
<?php //$a = new GlobalArea("Header Right"); $a->display(); ?>
<?php $a = new GlobalArea("Header Navigation"); $a->display(); ?></div>
<?php
/*$logo = \File::getByID(1);
if ($logo) {
  $logo = $logo->getApprovedVersion();
  $logoURL = $logo->getRelativePath();
} else {
  $logoURL = "<?php echo $view->getThemePath(); ?>/img/logo.svg";
}*/
?>
<a href="/" style="display: inline-block; position: relative; z-index: 1;"><img src="<?php //echo $logoURL; ?>" width="" height="" /></a>
</header>