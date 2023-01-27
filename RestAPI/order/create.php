<?php 
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Mehtods: GET");
header("Access-Control-Allow-Headers:Access-Control-Allow-Mehtods,Content-Type,Access-Control-Allow-Mehtods,Authorization,X-Requested-With");

require_once "../model/order.php";
$order_obj = new Order();

if($_SERVER['REQUEST_METHOD']=="GET"){
		$order_obj->deliver_response(200, "Đã nhận được dữ liệu", null);
		$data_order = array();
		$data_order['idUser'] = $_GET['idUser'];
		$data_order['dateDelivery'] = date("d/m/Y");#$data_get['dateDelivery'];
		$data_order['dateOrder'] = date("d/m/Y");#$data_get['dateOrder'];
		$data_order['status'] = 0;

		$data_orderDetails = array();
		$data_orderDetails['idProduct'] = $_GET['idProduct'];
		$data_orderDetails['quantityOrder'] = $_GET['quantityOrder'];
		$data_orderDetails['discount'] = 0;

		$result = $order_obj->create_full($data_order, $data_orderDetails);
		if($result){
			$order_obj->deliver_response(200, "Thêm dữ liệu thành công", null);
		}else{
			$order_obj->deliver_response(200, "Thêm dữ liệu thất bại", null);
		}
}else{
	$order_obj->deliver_response(400, "Không hợp lệ - yêu cầu phương thức POST", null);
}

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/order/create.php
// kèm theo dữ liệu với phương thức POST - vì ở trên chỉ nhận POST (dòng 4)
?>