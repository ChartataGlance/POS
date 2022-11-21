<?php
defined("ROOTPATH") ? "": header( "location:../../index.php");
$tab = $_GET['tab'] ?? 'dashboard';
if($tab == "products"){
   $productClass = new Products();
   $productlist = $productClass->query("select * from products order by id desc");
}
if(Auth::access('supervisor'))
{
   require views_path('admin/admin');
}
require views_path('auth/denied');

