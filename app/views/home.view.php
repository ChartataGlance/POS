<?php defined("ROOTPATH") ? "":die();?>
<?php require views_path('partials/header')?>
<main>
<h1 style="color:aliceblue ; text-align:center; ">hi, <?=Auth::get('user_name')?></h1>
</main>
<?php require views_path('partials/footer')?>
