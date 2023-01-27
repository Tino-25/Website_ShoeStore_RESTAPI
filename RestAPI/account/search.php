<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập

require_once "../model/account.php";
$account_obj = new Account();

$search = isset($_GET['search'])?$_GET['search']:null;
if(!empty($search)){
	$data = $account_obj->search($search);
	if(empty($data))
		$account_obj->deliver_response(200, "Dữ liệu nhận về rỗng, không tìm thấy dữ liệu nào", null);
	else
		$account_obj->deliver_response(200, "find OK, tìm thấy dữ liệu", $data);
}else{
	$account_obj->deliver_response(400, "Yêu cầu không hợp lệ!", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/search.php?search=nội dung tìm kiếm để vào đây
?>