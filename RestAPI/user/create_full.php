<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: POST");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/user.php";

$user_obj = new Users();
if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"),TRUE);

	if(!empty($data_get)){
		//$data['idUser']
		$data_user = array();
		$data_user['idDivision']= 1;
		$data_user['lastName'] = $data_get['lastName'];
		$data_user['firstName'] = $data_get['firstName'];
		$data_user['address'] = $data_get['address'];
		$data_user['sex'] = $data_get['sex'];
		$data_user['phone'] = $data_get['phone'];

		$data_account = array();
		$data_account['email'] = $data_get['email'];
		$data_account['password'] = $data_get['password'];

		$result = $user_obj->insertFull($data_user, $data_account);
		if($result){
			$user_obj->deliver_response(200, "Thêm dữ liệu thành công", null);
		}else{
			$user_obj->deliver_response(200, "Thêm dữ liệu thất bại", null);
		}
	}else{
		$user_obj->deliver_response(200, "Không nhận được dữ liệu", null);
	}
}else{
	$user_obj->deliver_response(400, "Không hợp lệ - yêu cầu phương thức POST - cf", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/create.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 4)
?>