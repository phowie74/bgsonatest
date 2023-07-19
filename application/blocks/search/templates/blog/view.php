<?php defined('C5_EXECUTE') or die('Access Denied.');

if (isset($error)) { echo '<p class="text-danger">'.$error.'</p>'; }
if (!isset($query) || !is_string($query)) { $query = ''; }
?>
<div class="flow">
<?php
if (isset($title) && ($title !== '')) {
    echo '<p class="h3">'.h($title).'</p>';
}

if (isset($do_search) && $do_search) {

    echo '<p class="text-lead">Your search for "<strong>'.htmlentities($query, ENT_COMPAT, APP_CHARSET).'</strong>" found <strong>'.count($results).'</strong> results...</p>';

    if (count($results) == 0) {
        echo '<p class="">Unfortuantely your search found no results.<br>Please try another keyword or phrase.</p>';

    } else {

        $tt = Core::make('helper/text');
        foreach ($results as $r) {
            $currentPageBody = $this->controller->highlightedExtendedMarkup($r->getPageIndexContent(), $query);

            echo '<p class="text-lead"><a href="'.$r->getCollectionLink().'">'.$r->getCollectionName().'</a></p>';
            echo '<p>'.$this->controller->highlightedMarkup($tt->shortText($r->getCollectionDescription()), $query).'</p>';
            echo '<p>'.$currentPageBody.'</p>';
            echo '<p class="text-small"><a href="'.$r->getCollectionLink().'">'.$this->controller->highlightedMarkup($r->getCollectionLink(), $query).'</a></p>';
        }

        $pages = $pagination->getCurrentPageResults();
        if ($pagination->getTotalPages() > 1 && $pagination->haveToPaginate()) {
            $showPagination = true;
            echo $pagination->renderDefaultView();
        }
    }

}

?>

<form class="search-box" action="<?= $view->url($resultTarget) ?>" method="get">
<?php if ($query === '') { ?>
<input name="search_paths[]" type="hidden" value="<?= htmlentities($baseSearchPath, ENT_COMPAT, APP_CHARSET) ?>" />
<?php } elseif (isset($_REQUEST['search_paths']) && is_array($_REQUEST['search_paths'])) { ?>
    <?php foreach ($_REQUEST['search_paths'] as $search_path) { ?>
        <?php if (is_string($search_path)) { ?>
<input name="search_paths[]" type="hidden" value="<?= htmlentities($search_path, ENT_COMPAT, APP_CHARSET) ?>" />
        <?php } ?>
    <?php } ?>
<?php } ?>
<input name="query" class="" type="search" value="<?= htmlentities($query, ENT_COMPAT, APP_CHARSET) ?>" />
<button name="submit" type="submit" class="btn" /><i class="fa fa-search"></i></button>
</form>
</div>