<?php 
require_once "Controller.php";
class HomeController extends Controller{

	public function dataHome(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		
		$topSelling = $this->Get_All($this->basicUrl."/product/top_selling.php?limit=5");
		$newProduct = $this->Get_All($this->basicUrl."/product/newProduct.php");
		$banner = $this->Get_All($this->basicUrl."/banner/read.php");
		require "View/index.php";
	}
  
}
?>