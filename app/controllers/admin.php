<?php
$tab = $_GET['tab'] ?? 'dashboard';

if($tab == "products"){
   $productClass = new Products();
   $productlist = $productClass->query("select * from products order by id desc");
}
if(Auth::access('admin')){
	require views_path('admin/admin');

}else{

	Auth::setMessage("You dont have access to the admin page");
	require views_path('auth/denied');
}
