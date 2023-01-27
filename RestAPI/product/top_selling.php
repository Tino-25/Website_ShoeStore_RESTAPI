<?php 
header("Content-Type:application/json; charset=utf-8'");
header("Access-Control-Allow-Origin: *");

require_once "../model/product.php";
$product_obj = new Product();

$data = $product_obj->topSelling($_GET['limit']);

if(empty($data))
	$product_obj->deliver_response(200, "Không tìm thấy dữ liệu", NULL);
else
	$product_obj->deliver_response(200, "OK", $data);


?>