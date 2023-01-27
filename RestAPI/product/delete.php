<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/product.php";
$product_obj = new Product();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if(isset($id)){
	$result = $product_obj->delete_Full($id);
	if($result){
		$product_obj->deliver_response(200, "Đã xóa thành công", null);
	}else{
		$product_obj->deliver_response(200, "Không xóa được dữ liệu", null);
	}
}else{
	$product_obj->deliver_response(400, "Không hợp lệ - thiếu giá trị id để xóa", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/product/delete.php?id= id record cần xóa
?>