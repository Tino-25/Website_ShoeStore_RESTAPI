<?php 
require_once "Controller.php";
class Details extends Controller{
	public function index(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		
		$idProduct = isset($_GET['id']) ? $_GET['id'] : Null;
		if($idProduct){
			$productDetails = $this->Get_All($this->basicUrl."/product/read_one.php?id=".$idProduct);
			$productImages = $this->Get_All($this->basicUrl."/image/read.php?idProduct=".$idProduct);
			$productSimilar = $this->Get_All($this->basicUrl."/product/read_similar.php?id=".$idProduct);
		}else{
			$productDetails = Null;
		}
		require "View/index.php";
	}
}

?>