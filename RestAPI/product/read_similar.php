<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập

require_once "../model/product.php";
$product_obj = new Product();

$idProduct = isset($_GET['id']) ? $_GET['id'] : false;
if($idProduct){
	$data = $product_obj->similar_product($idProduct);

	if(empty($data))
		$product_obj->deliver_response(200, "Không tìm thấy dữ liệu", NULL);
	else
		$product_obj->deliver_response(200, "OK", $data);
}
else{
	$product_obj->deliver_response(400, "Lỗi không nhận được id", null);
}

?>