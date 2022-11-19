<?php
defined("ROOTPATH") ? "": header( "location:../../index.php");
$tab = $_GET['tab'] ?? 'dashboard';
if($tab == "products"){
   $productClass = new Products();
   $productlist = $productClass->query("select * from products order by id desc");
}
require views_path('admin/admin');
