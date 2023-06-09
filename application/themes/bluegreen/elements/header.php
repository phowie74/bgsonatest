<?php defined('C5_EXECUTE') or die('Access Denied.'); ?>
<header>
<div class="wrapper layout-flex justify-end">
  <div class="login"><?php $a = new GlobalArea("Header SRC"); $a->display(); ?></div>
  <div class="secondary"><?php $a = new GlobalArea("Header Secondary Nav"); $a->display(); ?></div>
</div>
<div class="wrapper padded layout-flex align-center" style="--padded: 1rem;">
  <div class="logo"><?php $a = new GlobalArea("Header"); $a->display(); ?></div>
  <div class="tel"><?php $a = new GlobalArea("Header Phone"); $a->display(); ?></div>
  <div class="email"><?php $a = new GlobalArea("Header Email"); $a->display(); ?></div>
</div>
</header>
<nav class="wrapper bg-tint layout-flex align-center" id="mainNav">
  <div><?php $a = new GlobalArea("Header Navigation"); $a->display(); ?></div>
  <div class="search"><a href="/search/"><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1216 832q0-185-131.5-316.5t-316.5-131.5-316.5 131.5-131.5 316.5 131.5 316.5 316.5 131.5 316.5-131.5 131.5-316.5zm512 832q0 52-38 90t-90 38q-54 0-90-38l-343-342q-179 124-399 124-143 0-273.5-55.5t-225-150-150-225-55.5-273.5 55.5-273.5 150-225 225-150 273.5-55.5 273.5 55.5 225 150 150 225 55.5 273.5q0 220-124 399l343 343q37 37 37 90z"></path></svg></a></div>
</nav>