<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/user.php";

$user_obj = new Users();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"), TRUE);
	$data=array();
	$data['idUser'] = $data_get['idUser'];
	$data['idDivision'] = $data_get['idDivision'];
	$data['lastName'] = $data_get['lastName'];
	$data['firstName'] = $data_get['firstName'];
	$data['address'] = $data_get['address'];
	$data['sex'] = $data_get['sex'];
	$data['phone'] = $data_get['phone'];
	$status = $user_obj->update($data);
	if($status){
		$user_obj->deliver_response(200, "Cập nhật thành công", null);
	}else{
		$user_obj->deliver_response(200, "Cập nhật không thành công", null);
	}
}else{
	$user_obj->deliver_response(400, "Không hợp lệ - cần phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/update.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 5)
?>