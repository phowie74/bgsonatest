<?php defined('C5_EXECUTE') or die(_("Access Denied."));
$c = Page::getCurrentPage();
$view->inc('view_header.php');
if (count($results)) {
?>
<div class="table-responsive">
<table>
<thead>
<tr>
<?php foreach($tableColumns as $column) { ?>
<th class="<?=$controller->getColumnClass($list, $column)?>">
<?=$controller->getColumnTitle($column)?>
</th>
<?php } ?>
</tr>
</thead>
<tbody>
<?php
foreach($results as $f) { ?>
<tr>
<?php foreach($tableColumns as $column) { ?>
<td><?=$controller->getColumnValue($column, $f)?>
<?php //echo '<!-- '.print_r($f).' -->'; ?>
<?php //echo '<!-- '.gettype($f).' -->'; ?>
</td>
<?php } ?>
</tr>
<?php } ?>
</tbody>
</table>
</div>

<?php if (isset($pagination)) { ?>
<?=$pagination?>
<?php } ?>

<?php } else { ?>
    <p><?=t('No files found.')?></p>
<?php } ?>