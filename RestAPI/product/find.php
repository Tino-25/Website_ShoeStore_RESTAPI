<?php 
header("Content-Type:application/json; charset=utf-8'");
header("Access-Control-Allow-Origin: *");


require_once "../model/product.php";
$product_obj = new Product();

//  khi muốn thêm bộ lọc gì thì sửa ở đây rồi sửa(chỉ thêm isset $_GET) ở file CuaHangController 
$search = isset($_GET['search']) ? $_GET['search'] : null;
$price = isset($_GET['filter-price']) ? $_GET['filter-price'] : null;
$color = isset($_GET['filter-color']) ? $_GET['filter-color'] : null;
$size = isset($_GET['filter-size']) ? $_GET['filter-size'] : null;
$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
$latest = isset($_GET['latest']) ? $_GET['latest'] : null;
$topSelling = isset($_GET['topSelling']) ? $_GET['topSelling'] : null;
$category = isset($_GET['category']) ? $_GET['category'] : null;
$brand = isset($_GET['filter-brand']) ? $_GET['filter-brand'] : null;
$input = "";

if(!empty($search)){
	$data_search = $product_obj->search_full($search);
	$product_obj->deliver_response(200, "find OK, tìm thấy dữ liệu", $data_search);
	exit();
}
if(!empty($price)){
	$data_get = explode("-", $price);
	$a = $data_get[0];
	$b = $data_get[1];
	if($input == ""){
		$input .= " product.productUnitPrice > ".$a." AND product.productUnitPrice < ".$b;
	}else{
		$input = " AND product.productUnitPrice > ".$a." AND product.productUnitPrice < ".$b;
	}
	
}
if(!empty($color)){
	if($input == ""){
		$input .= "color.color = '".$color."'";
	}else{
		$input .= " AND color.color = '".$color."'";
	}
	// $input = "color.color = '".$color."'";
	// $data = $product_obj->searchFull($input);
	
}
if(!empty($size)){
	if($input == ""){
		$input .= "size.size = '".$size."'";
	}else{
		$input .= " AND size.size = '".$size."'";
	}
	// $input = "size.size = '".$size."'";
	// $data = $product_obj->searchFull($input);
}
if(!empty($limit)){
	#http://localhost:8080/WORK_SPACE/dacn1_fashion/?act=cuahang&limit=
	if($input == ""){
		$input .= " 1 LIMIT $limit";
	}else{
		$input .= " LIMIT $limit";
	}
}
if(!empty($category)){
	if($input == ""){
		$input .= " idCategoryProduct = $category";
	}else{
		$input .= " AND product.idCategoryProduct = $category";
	}
	//$input .= " idCategoryProduct = $category";
}
// 1 là để có dạng where 1: là để khi dùng OrderBy thì chữ where cố định bên kia không bị dư
if(!empty($latest)){
	$input .= " 1 Order By idProduct DESC";
}
if(!empty($topSelling)){
	$input .= " 1 Order By productSold DESC";
}
if(!empty($brand)){
	$input .= " brand.idBrand=$brand";
}




// thực thi lệnh input thu thập được ở trên
//var_dump($input);
$data = $product_obj->searchFull($input);

if(empty($data))
	$product_obj->deliver_response(400, "Khong tim thay du lieu nao!", null);
else
	$product_obj->deliver_response(200, "find OK, tìm thấy dữ liệu", $data);

//http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/size/read_one.php?id=19
?>