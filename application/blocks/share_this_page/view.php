<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>

<div class="flow">
    <p class="h3">Share this page...</p>
    <ul class="list-inline">
    <?php foreach ($selected as $service) { ?>
        <li>
            <a href="<?php echo h($service->getServiceLink()) ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo h($service->getDisplayName()) ?>" class="h2"><?php echo $service->getServiceIconHTML()?></a>&emsp;
        </li>
    <?php } ?>
    </ul>
</div>
