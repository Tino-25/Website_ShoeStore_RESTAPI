<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập

require_once "../model/product.php";
$product_obj = new Product();

$data = $product_obj->read_full();

if(empty($data))
	$product_obj->deliver_response(200, "Không tìm thấy dữ liệu", NULL);
else
	$product_obj->deliver_response(200, "OK", $data);

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/read.php
?>