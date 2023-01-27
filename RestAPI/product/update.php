<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/product.php";
$product_obj = new Product();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"), TRUE);
	$data_quantity = array();
	$data_quantity['idColor'] = $data_get['idColor'];
	$data_quantity['idSize'] = $data_get['idSize'];
	$data_quantity['quantity'] = $data_get['quantity'];

	$data_product = array();
	$data_product['idProduct'] = $data_get['idProduct'];
	$data_product['idCategoryProduct'] = $data_get['idCategoryProduct'];
	$data_product['idBrand'] = $data_get['idBrand'];
	$data_product['idQuantity'] = $data_get['idQuantity'];
	$data_product['productName'] = $data_get['productName'];
	$data_product['productUnitPrice'] = $data_get['productUnitPrice'];
	$data_product['dateIn'] = $data_get['dateIn'];
	$data_product['productDescription'] = $data_get['productDescription'];
	$data_product['productSold'] = $data_get['productSold'];
	$status = $product_obj->update_full($data_quantity, $data_product);
	if($status){
		$product_obj->deliver_response(200, "Cập nhật thành công", null);
	}else{
		$product_obj->deliver_response(200, "Cập nhật không thành công", null);
	}
}else{
	$product_obj->deliver_response(400, "Không hợp lệ - cần phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/update.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 5)
?>