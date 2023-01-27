<?php 
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/user.php";

$user_obj = new Users();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"), TRUE);
	if(isset($data_get)){
		$_SESSION['test'] = "Nhận được dữ liệu";
		$data_user=array();
		$data_user['idUser'] = $data_get['idUser'];
		$data_user['idDivision'] = $data_get['idDivision'];
		$data_user['lastName'] = $data_get['lastName'];
		$data_user['firstName'] = $data_get['firstName'];
		$data_user['address'] = $data_get['address'];
		$data_user['sex'] = $data_get['sex'];
		$data_user['phone'] = $data_get['phone'];

		$data_account = array();
		$data_account['idUser'] = $data_user['idUser'];
		$data_account['email'] = $data_get['email'];
		$data_account['password'] = $data_get['password'];

		$status = $user_obj->updateFull($data_user, $data_account);
		if($status){
			$_SESSION['test'] = "Cập nhật OK";
			$user_obj->deliver_response(200, "Cập nhật thành công", null);
		}else{
			$_SESSION['test'] = "Không Cập nhật được";
			$user_obj->deliver_response(200, "Cập nhật không thành công", null);
		}
	}else{
		$_SESSION['test'] = "Không Nhận được dữ liệu";
		$user_obj->deliver_response(200, "Không nhận được dữ liệu", null);
	}
}else{
	$user_obj->deliver_response(400, "Không hợp lệ - cần phương thức POST", null);
}


//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/update.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 5)
?>