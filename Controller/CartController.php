<?php 
require_once "Controller.php";
class Cart extends Controller{
	public function index(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");

		$modify = isset($_GET['mod']) ? $_GET['mod'] : null;
		switch($modify){
			case 'add':		
				//unset($_SESSION["cart_item"]);
				if(!empty($_GET["quantity"])){
					// 0=> array{name: "name", ...}
					$productByID = $this->Get_All($this->basicUrl."/product/read_one.php?id=".$_GET['idProduct']);
					// idProduct => array{name:"name", ...}
					$itemArray = array($productByID[0]["idProduct"]=>array('productName'=>$productByID[0]["productName"], 'idProduct'=>$productByID[0]["idProduct"], 'quantity'=>$_GET["quantity"], 'productUnitPrice'=>$productByID[0]["productUnitPrice"], 'image'=>$productByID[0]["image"]));

					// nếu cart đã có sản phẩm 
					if(!empty($_SESSION["cart_item"])) {
						//in_array(a, b) kiểm tra giá trị a có trong mảng b hay không
						// array_key(mảng) // trả về tập các khóa của mảng vào
						// nếu sản phẩm trong cart là sản phẩm chuẩn bị thêm vào thì cộng thêm phần quantity
						if(in_array($productByID[0]["idProduct"], array_keys($_SESSION["cart_item"]))) {
							foreach($_SESSION["cart_item"] as $k => $v) {
									if($productByID[0]["idProduct"] == $k) {
										if(empty($_SESSION["cart_item"][$k]["quantity"])) {
											$_SESSION["cart_item"][$k]["quantity"] = 0;
										}
										$_SESSION["cart_item"][$k]["quantity"] += $_GET["quantity"];
									}
							}
						// ngược lại nếu sản phẩm chuẩn bị thêm vào cart chưa có trong cart thì thêm vào
						}else{
							// lỗi merge 2 mảng làm mất đi dạng array ban đầu - chỉ mục là id mà sau khi merge thì chỉ mục là 0, 1, ... nên lỗi
							//$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
							$_SESSION["cart_item"] = $_SESSION["cart_item"]+$itemArray;
						}
					// nếu cart trống thì chỉ cần thêm vào 
					} else {
						$_SESSION["cart_item"] = $itemArray;
					}
				}
				//var_dump($_SESSION["cart_item"]);
				break;
			case "remove":
				if(!empty($_SESSION["cart_item"])) {
					foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["idProduct"] == $k){
							unset($_SESSION["cart_item"][$k]);
						}
						if(empty($_SESSION["cart_item"])){
							unset($_SESSION["cart_item"]);
						}
					}
				}
				break;
			case "empty":
				unset($_SESSION["cart_item"]);
				unset($_SESSION['quantity_cart']);
				break;
			}

	
		if(!empty($_SESSION['cart_item'])){
			$_SESSION['quantity_cart'] = 0;
			foreach($_SESSION["cart_item"] as $key=>$value){
				$_SESSION['quantity_cart'] += $value['quantity'];
			}
		}
		require "View/index.php";
	}
}
?>