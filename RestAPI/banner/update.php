<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/banner.php";
$banner_obj = new Banner();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"), TRUE);
	$data=array();
	$data['idBanner'] = $data_get['idBanner'];
	$data['image'] = $data_get['image'];
	$status = $banner_obj->update($data);
	if($status){
		$banner_obj->deliver_response(200, "Cập nhật thành công", null);
	}else{
		$banner_obj->deliver_response(200, "Cập nhật không thành công", null);
	}
}else{
	$banner_obj->deliver_response(400, "Không hợp lệ - cần phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/update.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 5)
?>