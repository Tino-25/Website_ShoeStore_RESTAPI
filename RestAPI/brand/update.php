<?php 
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once "../model/brand.php";
$brand_obj = new Brand();

if($_SERVER['REQUEST_METHOD']=="POST"){
	$data_get = json_decode(file_get_contents("php://input"), TRUE);
	$data = array();
	$data['idBrand'] = $data_get['idBrand'];
	$data['brandName'] = $data_get['brandName'];
	$data['brandDesc'] = $data_get['brandDesc'];
	$data['brandLogo'] = $data_get['brandLogo'];
	$status = $brand_obj->update($data);
	if($status){
		$brand_obj->deliver_response(200, "Cập nhật thành công", null);
	}else{
		$brand_obj->deliver_response(200, "Cập nhật không thành công", null);
	}
}else{
	$brand_obj->deliver_response(400, "Không hợp lệ - cần phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/update.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 5)
?>