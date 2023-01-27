<?php 
$action = isset($_GET['act']) ? $_GET['act'] : null;
switch($action){
	case "home":
		require_once "Controller/HomeController.php";
		$obj = new HomeController();
		$obj->dataHome();
		break;
	case "cuahang":
		require_once "Controller/CuahangController.php";
		$obj = new Cuahang();
		$search = isset($_GET['search']) ? $_GET['search'] : null;
		if(!empty($search)){
			$obj->searchProduct($search);
		}else{
			$obj->allProduct();
		}
		break;
	case "details":
		require_once "Controller/DetailsController.php";
		$obj = new Details();
		$obj->index();
		break;
	case "cart":
		require "Controller/CartController.php";
		$obj = new Cart();
		$obj->index();
		break;
	case "pay":
		require "Controller/PayController.php";
		$obj = new Pay();
		$obj->index();
		break;
	case 'order':
		require "Controller/PayController.php";
		$obj = new Pay();
		$obj->insert();
		break;
	case 'introduction':
		require "Controller/Controller.php";
		$obj = new Controller();
		$obj->common_show();
		break;
	default:
		require_once "Controller/HomeController.php";
		$obj = new HomeController();
		$obj->dataHome();
		break;
}

?>