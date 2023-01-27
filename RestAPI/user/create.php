<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/user.php";

$user_obj = new Users();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get=json_decode(file_get_contents("php://input"),TRUE);
	if(!empty($data_get)){
		//$data['idUser']
		$data = array();
		$data['idDivision'] = $data_get['idDivision'];
		$data['lastName'] = $data_get['lastName'];
		$data['firstName'] = $data_get['firstName'];
		$data['address'] = $data_get['address'];
		$data['sex'] = $data_get['sex'];
		$data['phone'] = $data_get['phone'];
		$result = $user_obj->insert($data);
		if($result){
			$user_obj->deliver_response(200, "Thêm dữ liệu thành công", null);
		}else{
			$user_obj->deliver_response(200, "Thêm dữ liệu thất bại", null);
		}
	}else{
		$user_obj->deliver_response(200, "Không nhận được dữ liệu", null);
	}
}else{
	$user_obj->deliver_response(400, "Không hợp lệ - yêu cầu phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/create.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 4)
?>