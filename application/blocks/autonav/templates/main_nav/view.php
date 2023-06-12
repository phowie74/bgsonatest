<?php defined('C5_EXECUTE') or die('Access Denied.');
/** @var \Concrete\Block\Autonav\Controller $controller */

//$controller->setIncludeParentItem(true);

$navItems = $controller->getNavItems();
$c = \Concrete\Core\Page\Page::getCurrentPage();

/**
 * The $navItems variable is an array of objects, each representing a nav menu item.
 * It is a "flattened" one-dimensional list of all nav items -- it is not hierarchical.
 * However, a nested nav menu can be constructed from this "flat" array by
 * looking at various properties of each item to determine its place in the hierarchy
 * (see below, for example $navItem->level, $navItem->subDepth, $navItem->hasSubmenu, etc.).
 *
 * Items in the array are ordered with the first top-level item first, followed by its sub-items, etc.
 *
 * Each nav item object contains the following information:
 *	$navItem->url        : URL to the page
 *	$navItem->name       : page title (already escaped for html output)
 *	$navItem->target     : link target (e.g. "_self" or "_blank")
 *	$navItem->level      : number of levels deep the current menu item is from the top (top-level nav items are 1, their sub-items are 2, etc.)
 *	$navItem->subDepth   : number of levels deep the current menu item is *compared to the next item in the list* (useful for determining how many <ul>'s to close in a nested list)
 *	$navItem->hasSubmenu : true/false -- if this item has one or more sub-items (sometimes useful for CSS styling)
 *	$navItem->isFirst    : true/false -- if this is the first nav item *in its level* (for example, the first sub-item of a top-level item is TRUE)
 *	$navItem->isLast     : true/false -- if this is the last nav item *in its level* (for example, the last sub-item of a top-level item is TRUE)
 *	$navItem->isCurrent  : true/false -- if this nav item represents the page currently being viewed
 *	$navItem->inPath     : true/false -- if this nav item represents a parent page of the page currently being viewed (also true for the page currently being viewed)
 *	$navItem->attrClass  : Value of the 'nav_item_class' custom page attribute (if it exists and is set)
 *	$navItem->isHome     : true/false -- if this nav item represents the home page
 *	$navItem->cID        : collection id of the page this nav item represents
 *	$navItem->cObj       : collection object of the page this nav item represents (use this if you need to access page properties and attributes that aren't already available in the $navItem object)
 */

foreach ($navItems as $ni) {
    $classes = [];
    if ($ni->isCurrent) { $classes[] = 'nav-selected'; }
    if ($ni->inPath) { $classes[] = 'nav-path-selected'; }
    //if ($ni->isFirst) { $classes[] = 'nav-first'; }
    //if ($ni->isLast) { $classes[] = 'nav-last'; }
    if ($ni->hasSubmenu) { $classes[] = 'dropdown open'; }
    //if (!empty($ni->attrClass)) { $classes[] = $ni->attrClass; }
    //if ($ni->isHome) { $classes[] = 'nav-home'; }
    //$classes[] = 'nav-item-' . $ni->cID;
    //if (($ni->subDepth === 0) || ($ni->subDepth === -1)) { $classes[] = 'h3'; }
    //$classes[] = $ni->subDepth;
    $ni->classes = implode(' ', $classes);
}


echo '<a href="/sitemap" id="toggle-menu" class="" aria-label="Navigation Menu"><span></span></a>';

if (count($navItems) > 0) {
    echo '<ul role="list" id="main-nav">'; //opens the top-level menu

    foreach ($navItems as $ni) {
        echo '<li class="' . $ni->classes . '">'; //opens a nav item
        echo '<a href="' . $ni->url . '" target="' . $ni->target . '">' . h($ni->name) . '</a>';

        if ($ni->hasSubmenu) {
            echo '<ul class="list-inline" role="list">'; //opens a dropdown sub-menu
        } else {
            echo '</li>'; //closes a nav item

            echo str_repeat('</ul></li>', $ni->subDepth); //closes dropdown sub-menu(s) and their top-level nav item(s)
        }
    }

    echo '</ul>'; //closes the top-level menu
} elseif (is_object($c) && $c->isEditMode()) {
    ?>
    <div class="ccm-edit-mode-disabled-item"><?=t('Empty Auto-Nav Block.')?></div>
<?php
}


