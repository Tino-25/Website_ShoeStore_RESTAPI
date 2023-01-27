<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/category.php";
$category_obj = new Category();

$id = filter_input(INPUT_POST, 'number');
// hoặc $id = isset($_GET['number']) ? $_GET['number'] : false;
if(isset($id)){
	$result = $category_obj->delete($id);
	if($result){
		$category_obj->deliver_response(200, "Đã xóa thành công", null);
	}else{
		$category_obj->deliver_response(200, "Không xóa được dữ liệu", null);
	}
}else{
	$category_obj->deliver_response(400, "Không hợp lệ - thiếu giá trị id để xóa", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/order/delete.php?id= id record cần xóa
?>