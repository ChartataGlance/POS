<?php
defined("ROOTPATH") ? "":die();
$errors = [];

$id = $_GET['id'] ?? null;
$product = new Products();

$row = $product->get_one(['id' => $id]);

if ($_SERVER['REQUEST_METHOD'] == "POST" && $row) {
		$product->delete($row['id']);
		//delete old image
		if (file_exists($row['image'])) { unlink($row['image']); }

		redirect('admin&tab=products');
}
require views_path('products/product-delete');
