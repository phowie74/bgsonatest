<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<footer>
<div class="wrapper padded layout-flex justify-around" style="--padded: 1rem;">
<div><?php $a = new GlobalArea("Footer Strap"); $a->display(); ?></div>
</div>
<div class="wrapper bg-tint padded highlight layout-flex">
    <div class="logo"><?php $a = new GlobalArea("Footer Logo"); $a->display(); ?></div>
    <div class="contact"><?php $a = new GlobalArea("Footer Contact"); $a->display(); ?></div>
    <div class="contact"><?php $a = new GlobalArea("Footer Address"); $a->display(); ?></div>
    <div class="social"><?php $a = new GlobalArea("Footer Social"); $a->display(); ?></div>
</div>
<div class="wrapper padded layout-flex">
    <div class="content"><?php $a = new GlobalArea("Footer Navigation"); $a->display(); ?></div>
    <div><?php $a = new GlobalArea("Footer Legal"); $a->display(); ?></div>
</div>
<div class="wrapper padded layout-flex justify-around">
    <div>&copy;<?php echo date("Y"); ?> <?php echo Config::get("concrete.site"); ?></div>
</div>
<?php //$a = new GlobalArea("Footer Extra"); $a->display(); ?>
</footer>