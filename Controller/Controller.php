<?php 
session_start();
//session_destroy();
class Controller{
	// protected: lớp con có thể truy cập trực tiếp
	protected $basicUrl = "http://localhost/WORK_SPACE/Website-shoe-store_RESTAPI/RestAPI/";

	function __construct(){
	}

	// hiển thị tất cả category => nam và nữ - dùng trong gợi ý size
	public function common_show(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		require "View/index.php";
	}

	public function Get_All($url){
		//Resourse Address        
		//$url = "http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/category/read.php";

	    //Khởi tạo curl với url đã cho       
		$client = curl_init($url);

	    // CURLOPT_RETURNTRANSFER: để khi gửi yêu cầu bằng curl_exec trả về chuỗi chứ không xuất ra màn hình
	    // tùy chọn để chuyển url thành gì
	    // cấu hình thông số cho curl
		curl_setopt($client,CURLOPT_RETURNTRANSFER,1);

	    //get response from resource
	    // được gọi sau khi đặt tùy chọn cho url
	    // thực thi curl
		$response = curl_exec($client);

	    //echo $response;

	    //decode        
		$result = json_decode($response, TRUE);

		// copy mảng $result sang $data nhưng không lấy cái status 
		$data = array();
		if(!empty($result)){
			foreach($result as $key=>$value){
				if(is_numeric($key)){
					$data[] = $value;
				}
			}
		}

		// ngắt curl - giải phóng
		curl_close($client);
		
		//var_dump($data);

		// hiển thị dữ liệu
		// foreach($data as $key=>$value){
		// 	echo $value['categoryName'];
		// }
		return $data;
	}


	public function insert_curl($idUser, $idProduct, $quantityOrder){
		// URL có chứa hai thông tin name và diachi
		$url = "http://localhost/WORK_SPACE/dacn1_fashion/RestAPI/order/create.php?idUser=".$idUser."&idProduct=".$idProduct."&quantityOrder=".$quantityOrder;

		// Khởi tạo CURL
		$ch = curl_init($url);

		// Thiết lập có return
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		$result = curl_exec($ch);

		curl_close($ch);

		echo $result;
	} 


	
}
?>