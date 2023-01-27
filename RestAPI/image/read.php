<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập

require_once "../model/image.php";
$image_obj = new Image();

$idProduct = isset($_POST['idProduct']) ? $_POST['idProduct'] : null;
if($idProduct == null){
	$idProduct = $_GET['idProduct'];
}
if(isset($idProduct)){
	//$data = $image_obj->All();
	$data = $image_obj->read_id($idProduct);

	if(empty($data))
		$image_obj->deliver_response(200, "Không tìm thấy dữ liệu", NULL);
	else
		$image_obj->deliver_response(200, "OK", $data);
}else{
	$image_obj->deliver_response(400, "Không tìm thấy idProduct", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/read.php
?>