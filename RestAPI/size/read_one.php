<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập


require_once "../model/size.php";
$size_obj = new Size();

$id = isset($_GET['id'])?$_GET['id']:null;
if(!empty($id)){
	$data = $size_obj->find($id);
	if(empty($data))
		$size_obj->deliver_response(200, "Dữ liệu nhận về rỗng, không tìm thấy dữ liệu nào", null);
	else
		$size_obj->deliver_response(200, "find OK, tìm thấy dữ liệu", $data);
}else{
	$size_obj->deliver_response(400, "Yêu cầu không hợp lệ!", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/read_one.php?id=19
?>