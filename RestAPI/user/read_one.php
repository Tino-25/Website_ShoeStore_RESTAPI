<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập


require_once "../model/user.php";
$user_obj = new Users();

$id = isset($_GET['idUser'])?$_GET['idUser']:null;
if(!empty($id)){
	$data = $user_obj->findUserFull($id);
	if(empty($data))
		$user_obj->deliver_response(200, "Dữ liệu nhận về rỗng, không tìm thấy dữ liệu nào", null);
	else
		$user_obj->deliver_response(200, "find OK, tìm thấy dữ liệu", $data);
}else{
	$user_obj->deliver_response(400, "Yêu cầu không hợp lệ! - thiếu id", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/user/read_one.php?id=19
?>