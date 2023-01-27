<?php 

$mod = isset($_GET['mod']) ? $_GET['mod'] : null;
$action = isset($_GET['act']) ? $_GET['act'] : null;
switch($mod){
	case "dashboard":
		require "dashboard.php";
		break;
	case "user":
		switch($action){
			case "list":
			require "./user/list.php";
			break;
			case "add":
			require "./user/add.php";
			break;
			case "update":
			require "./user/update.php";
			break;
			default:
			echo "Default";
			require "./user/list.php";
			break;
		}	
		break;
	case "banner":
		switch($action){
			case "list":
			require "./banner/list.php";
			break;
			case "add":
			require "./banner/add.php";
			break;
			default:
			echo "Default banner";
			break;
		}
		break;
	case "brand":
		switch ($action) {
			case 'list':
			require "./brand/list.php";
			break;
			case 'add':
			require "./brand/add.php";
			break;
			case 'update':
			require "./brand/update.php";
			break;
			default:
			echo "default brand!!";
			break;
		}
		break;
	case "category":
		switch($action){
			case 'list':
			require "./category/list.php";
			break;
			case 'add':
			require "./category/add.php";
			break;
			case 'update':
			require "./category/update.php";
			break;
			default: 
			echo "Default of category action";
		}
		break;
	case "product":
		switch($action){
			case 'list':
			require "./product/list.php";
			break;
			case "add":
			require "./product/add.php";
			break;
			case "details":
			require "./product/details.php";
			break;
			case "update":
			require "./product/update.php";
			break;
			default:
			break;
		}
		break;
	case "order":
		switch($action){
			case "list":
			require "./order/list.php";
			break;
			case "details":
			require "./order/details.php";
			break;
			default:
			break;
		}
		break;
	default:
		//echo "Default - không có action hoặc action không hợp lệ!";
		require "dashboard.php";
		break;
}

?>