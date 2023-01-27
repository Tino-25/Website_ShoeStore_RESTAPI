<?php 
header("Content-Type:application/json; charset=utf-8'");	// trả về dữ liệu json
header("Access-Control-Allow-Origin: *");   //Mọi trang web và mobile app đều có thể được truy cập

require_once "../model/account.php";
$account_obj = new Account();

$data = $account_obj->All();

if(empty($data))
	$account_obj->deliver_response(200, "Không tìm thấy dữ liệu", NULL);
else
	$account_obj->deliver_response(200, "OK", $data);

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/read.php
?>