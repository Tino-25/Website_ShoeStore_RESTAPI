<?php 
$act = isset($_GET['act']) ? $_GET['act'] : null;
switch($act){
	case 'home':
		require "home.php";
		break;
	case "cuahang":
		require "cuahang.php";
		break;
	case "details":
		require "details.php";
		break;
	case "cart":
		require "cart.php";
		break;
	case "pay":
		require "pay.php";
		break;
	case "orderDone":
		require "orderDone.php";
		break;
	case "introduction":
		require "introduction.php";
		break;
	default:
		require "home.php";
		break;
}
?>