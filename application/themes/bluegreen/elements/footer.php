<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<footer>
<?php //$a = new GlobalArea("Footer Address"); $a->display(); ?>
<?php $a = new GlobalArea("Footer Contact"); $a->display(); ?>
&copy;<?php echo date("Y"); ?> <?php echo Config::get("concrete.site"); ?>
<?php //$a = new GlobalArea("Footer Legal"); $a->display(); ?>
<?php //$a = new GlobalArea("Footer Extra"); $a->display(); ?>
<?php $a = new GlobalArea("Footer Navigation"); $a->display(); ?>
</footer>