<?php 

function getNumber($name){
	//Resourse Address        
	$url = "http://localhost/WORK_SPACE/Website-shoe-store_RESTAPI/RestAPI/$name/read.php";

	//Send request to Resourse        
	$client = curl_init($url);

	// CURLOPT_RETURNTRANSFER: để khi gửi yêu cầu bằng curl_exec trả về chuỗi chứ không xuất ra màn hình
	curl_setopt($client,CURLOPT_RETURNTRANSFER,1);

	//get response from resource
	$response = curl_exec($client);

	//echo $response;  => json

	//decode - chuyển json thành 1 đối tượng - object php        
	//$result = json_decode($response);

	//decode - chuyển json thành 1 mảng - array php  
	$result = json_decode($response, TRUE);

	$count = 0;
	foreach ($result as $key => $value) {
		if(is_numeric($key)){
			//echo $key;
			$count += 1;
		}
		
	}

	return $count;


	// hiển thị kết quả
	//var_dump($result[0]);
	// foreach($result[0] as $key => $value){
	// 	echo $value;
	// }
	
}

$num_user = getNumber("user");


$num_product = getNumber("product");


$num_order = getNumber("order");


$num_category = getNumber("category");


$num_brand = getNumber("brand");


$num_banner = getNumber("banner");


?>


<div class="container">
	<h1 class="title_top">Dashboard</h1>
	<div class="row">
		<div class="col">
			User: <?php echo $num_user; ?>
		</div>
		<div class="col order-12">
			Product: <?php echo $num_product; ?>
		</div>
		<div class="col order-1">
			Order: <?php echo $num_order; ?>
		</div>
	</div>
	<div class="row">
		<div class="col">
			Category: <?php echo $num_category; ?>
		</div>
		<div class="col order-12">
			Brand: <?php echo $num_brand; ?>
		</div>
		<div class="col order-1">
			Banner: <?php echo $num_banner; ?>
		</div>
	</div>
</div>