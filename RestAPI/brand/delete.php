<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: GET");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/brand.php";
$brand_obj = new Brand();

$id = isset($_GET['id']) ? $_GET['id'] : null;
if(isset($id)){
	$result = $brand_obj->delete($id);
	if($result){
		$brand_obj->deliver_response(200, "Đã xóa thành công", null);
	}else{
		$brand_obj->deliver_response(200, "Không xóa được dữ liệu", null);
	}
}else{
	$brand_obj->deliver_response(400, "Không hợp lệ - thiếu giá trị id để xóa", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/order/delete.php?id= id record cần xóa
?>