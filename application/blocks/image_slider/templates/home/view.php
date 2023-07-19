<?php defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
if ($c->isEditMode()) {
    $loc = Localization::getInstance();
    $loc->pushActiveContext(Localization::CONTEXT_UI); ?>
<div class="ccm-edit-mode-disabled-item" style="<?php echo isset($width) ? "width: $width;" : ''; ?><?php echo isset($height) ? "height: $height;" : ''; ?>">
    <i style="font-size:40px; margin-bottom:20px; display:block;" class="fa fa-picture-o" aria-hidden="true"></i>
    <div style="padding: 40px 0px 40px 0px"><?php echo t('Image Slider disabled in edit mode.'); ?>
        <div style="margin-top: 15px; font-size:9px;">
            <i class="fa fa-circle" aria-hidden="true"></i>
            <?php
if (count($rows) > 0) {
        foreach (array_slice($rows, 1) as $row) {
            ?>
            <i class="fa fa-circle-thin" aria-hidden="true"></i>
            <?php
        }
    } ?>
        </div>
    </div>
</div>
<?php
    $loc->popActiveContext();
} else { // edit mode
?>

<?php if (count($rows) > 0) { ?>
<ul class="homslides slider-<?php echo $bID; ?>" role="list">
    <?php foreach ($rows as $row) { ?>
    <li>
        <figure>
            <?php
$f = File::getByID($row['fID']);
if (is_object($f)) {
    $tag = Core::make('html/image', ['f' => $f])->getTag();
    if ($row['title']) {
        $tag->alt(h($row['title']));
    } else {
        $tag->alt("slide");
    }
    echo $tag;

}
?>
            <figcaption class="flow">
                <?php if ($row['title']) { ?>
                <p class="h2"><?php echo h($row['title']); ?></p>
                <?php } ?>
                <?php echo $row['description'];?>
                <?php if ($row['linkURL']) { ?>
                <p><a href="<?php echo $row['linkURL'];?>" class="btn"><?php echo h($row['title']); ?> Industry...</a></p>
                <?php } ?>
            </figcaption>
        </figure>
    </li>
    <?php } // foreach?>
</ul>
<script>
$(function() {
    $(".homslides.slider-<?php echo $bID; ?>").responsiveSlides({
        prevText: "", // String: Text for the "previous" button
        nextText: "",
        nav: false,
        pager: false,
        <?php if ($noAnimate) { ?>
        auto: false,
        <?php } ?>
        timeout: 7000,
        <?php //if ($timeout) { echo "timeout: $timeout,"; } // 5000?>
        speed: 500,
        <?php //if ($speed) { echo "speed: $speed,"; } // 600?>
        pause: true,
        <?php //if ($pause) { echo "pause: true,"; }?>
        //pauseControls: true,
        <?php if ($maxWidth) { ?>
        maxwidth: $maxWidth,
        <?php } ?>
        //random: true, // Boolean: Randomize the order of the slides, true or false
        //navContainer: "", // Selector: Where controls appended, default after the 'ul'
        manualControls: ".industry-buttons",
        namespace: "homslides",
        before: function(i) {
            $('.homslides1 li').removeClass('before', 'after');
            $('.homslides1_on').addClass('before');
            //$('.homslides1_on').removeClass('after');
        }, // Function: Before callback
        after: function(i) {
            $('.homslides1_on').removeClass('before');
            $('.homslides1_on').addClass('after');
        } // Function: After callback
    });
});
</script>
<?php } else { // count rows?>
<div class="ccm-image-slider-placeholder">
    <p><?php echo t('No Slides Entered.'); ?></p>
</div>
<?php
    } // count rows
} // edit mode
?>