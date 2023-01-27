<?php 
require_once "Controller.php";
class Pay extends Controller{
	public function index(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		if(isset($_SESSION['idUser'])){
			$user = $this->Get_All($this->basicUrl."/user/read_one.php?idUser=".$_SESSION['idUser']);
			require "View/index.php";
		}else{
			echo "<script>alert('Đăng nhập trước khi vào thanh toán nhé!')</script>";
			echo "<script language='javascript'>";
            echo "location.href='login.php';</script>";
		}
	}

	public function insert(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		foreach ($_SESSION["cart_item"] as $item){ 
			$a = $this->insert_curl($_GET['idUser'], $item['idProduct'], $item['quantity']);
		}
		unset($_SESSION["cart_item"]);
		unset($_SESSION['quantity_cart']);
		header("location: ?act=orderDone");
	}
}
?>