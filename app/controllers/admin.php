<?php
$tab = $_GET['tab'] ?? 'dashboard';

if($tab == "products"){
   $productClass = new Products();
   $productlist = $productClass->query("select * from products order by id desc");
} else
if($tab == "sales"){
   $salesClass = new Sale();
   $saleslist = $salesClass->query("select * from sales order by id desc limit 10 ");
} else
if($tab == "users")
{

	$limit = 10;
	$pager = new Pager($limit);
	$offset = $pager->offset;

	$userClass = new User();
	$users = $userClass->query("select * from users order by id desc limit $limit offset $offset");
}


if(Auth::access('admin')){
	require views_path('admin/admin');

}else{

	Auth::setMessage("You dont have access to the admin page");
	require views_path('auth/denied');
}
