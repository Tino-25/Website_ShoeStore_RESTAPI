<?php 
/**
 * 
 */
require_once "Controller.php";
class Cuahang extends Controller
{
	
	function __construct()
	{
		// code...
	}



	public function allProduct(){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");
		$allBrand = $this->Get_All($this->basicUrl."/brand/read.php");

		$search = isset($_GET['search']) ? $_GET['search'] : null;
		$filter_price = isset($_GET['filter-price']) ? $_GET['filter-price'] : null;
		$filter_color = isset($_GET['filter-color']) ? $_GET['filter-color'] : null;
		$filter_size = isset($_GET['filter-size']) && $_GET['filter-size']!="" ? $_GET['filter-size'] : null;
		$filter_brand = isset($_GET['filter-brand']) && $_GET['filter-brand']!="" ? $_GET['filter-brand'] : null;

		$limit = isset($_GET['limit']) ? $_GET['limit'] : null;
		$latest = isset($_GET['latest']) ? $_GET['latest'] : null;
		$topSelling = isset($_GET['topSelling']) ? $_GET['topSelling'] : null;
		$category = isset($_GET['category']) ? $_GET['category'] : null;
		$url_api = "";

		if(!empty($filter_price) || !empty($filter_color) || $filter_size!="" || !empty($limit) || !empty($latest) || !empty($topSelling) || !empty($category) || !empty($filter_brand)){

			// lấy url hiện tại rồi chỉnh sửa sang url của restAPI để gắn vào GET_ALL để lấy dữ liệu

			if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
				$url = "https://";   
			else  
				$url = "http://";   
    		// Append the host(domain name, ip) to the URL.   
			$url.= $_SERVER['HTTP_HOST'];   

    		// Append the requested resource location to the URL   
			$url.= $_SERVER['REQUEST_URI'];    

			//echo $url;
			$s = explode("&", $url);
    		//var_dump($s);
			$main = array();
			for($i = 0; $i<count($s); $i++){
				if($i==0){
					continue;
				}else{
					$main[] = $s[$i];
				}
			}
			$url_api = $this->basicUrl."/product/find.php?".implode("&", $main); 
			//var_dump($url_api);
			$allProduct = $this->Get_All($url_api);
		}
		else{
			$allProduct = $this->Get_All($this->basicUrl."/product/read.php");
		}

		require "View/index.php";
	}



	public function searchProduct($key){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");
		$allBrand = $this->Get_All($this->basicUrl."/brand/read.php");
		$allProduct = $this->Get_All($this->basicUrl."/product/find.php?search=".$key);

		require "View/index.php";
	}

	public function filterProduct__price($price){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");
		$allBrand = $this->Get_All($this->basicUrl."/brand/read.php");
		$allProduct = $this->Get_All($this->basicUrl."/product/find.php?search=".$price);

		require "View/index.php";
	}

	public function filterProduct__color($color){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");
		$allBrand = $this->Get_All($this->basicUrl."/brand/read.php");
		$allProduct = $this->Get_All($this->basicUrl."/product/find.php?search=".$color);
		require "View/index.php";
	}

	public function filterProduct__size($size){
		$allCategory = $this->Get_All($this->basicUrl."/category/read.php");
		$allColor = $this->Get_All($this->basicUrl."/color/read.php");
		$allSize = $this->Get_All($this->basicUrl."/size/read.php");
		$allBrand = $this->Get_All($this->basicUrl."/brand/read.php");
		$allProduct = $this->Get_All($this->basicUrl."/product/find.php?search=".$size);
		require "View/index.php";
	}



}
?>