<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/product.php";
$product_obj = new Product();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get=json_decode(file_get_contents("php://input"),TRUE);
	if(!empty($data_get)){
		//$product_obj->deliver_response(200, "Đã nhận được dữ liệu", null);
		$data = array();
		$data['idCategoryProduct'] = $data_get['idCategoryProduct'];
		$data['idBrand'] = $data_get['idBrand'];
		$data['idQuantity'] = -1;
		$data['productName'] = $data_get['productName'];
		$data['productUnitPrice'] = $data_get['productUnitPrice'];
		$data['dateIn'] = $data_get['dateIn'];
		$data['productDescription'] = $data_get['productDescription'];
		$data['productSold'] = 0;

		$data_quantity = array();
		$data_quantity['idColor'] = $data_get['idColor'];
		$data_quantity['idSize'] = $data_get['idSize'];
		$data_quantity['quantity'] = $data_get['quantity'];

		$result = $product_obj->create_full($data_quantity, $data);
		if($result){
			$product_obj->deliver_response(200, "Thêm dữ liệu thành công", null);
		}else{
			$product_obj->deliver_response(200, "Thêm dữ liệu thất bại", null);
		}
	}else{
		$product_obj->deliver_response(200, "Không nhận được dữ liệu", null);
	}
}else{
	$product_obj->deliver_response(400, "Không hợp lệ - yêu cầu phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/create.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 4)
?>