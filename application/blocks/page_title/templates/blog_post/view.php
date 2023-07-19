<?php  defined('C5_EXECUTE') or die('Access Denied.');


$c = Page::getCurrentPage();
$date = $c->getCollectionDatePublicObject()->format('jS F Y');
if(isset($_GET['u'])) {
    $bioID = $_GET['u'];
} else {
    $bioID = $c->getCollectionUserID();
}

$user = UserInfo::getByID($bioID);
if ($user->hasAvatar()) {
    $avatar = $user->getUserAvatar();
    $img = '<img src="'.$avatar->getPath().'" width="100" height="100" class="img-circle">';
} else {
    $img = '<img src="https://upload.wikimedia.org/wikipedia/commons/8/89/Portrait_Placeholder.png" width="100" height="100" class="img-circle" />';
}

$blog_name = $user->getAttribute('blog');
$company = $user->getAttribute('company');

echo '<div class="layout-flex flex-start flex-middle divider">';
if ($title) { echo '<div class="flex-full"><'.$formatting.' class="h2">'.h($title).'</'.$formatting.'></div>'; }
if (!empty($bioID)) {
    echo '<div class="flow">'.$img.'</div>';
    echo '<div class="flow">';
    echo '<p class="text-small text-muted"><a href="/blog/profile?u='.$bioID.'">';
    if ($c->getPageTypeHandle() == "blog") { echo '<i class="fa fa-calendar"></i>&emsp;'.$date.'<br>'; }
    if(!empty($blog_name)) { echo '<i class="fa fa-user"></i>&emsp;'.$blog_name.'<br>'; }
    if(!empty($company)) { echo '<i class="fa fa-building"></i>&emsp;'.$company; }
    echo '</a></p>';
    echo '</div>';
    if ($c->getPageTypeHandle() != "blog") { echo '<div class="flex-full flow">'.$user->getAttribute('biography').'</div>'; }
}
echo '</div>';
