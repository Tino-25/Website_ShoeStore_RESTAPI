<?php 
require_once('model.php');
class Product extends Model 
{
	var $table = "product";
	var $contens = "idProduct";

	public function similar_product($idProduct){
		$query = "SELECT * FROM product 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize 
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
						FROM image WHERE image.isMain = 1) as image 
						ON product.idProduct = image.idPro 
					WHERE NOT product.idProduct = $idProduct
						AND product.idBrand = (SELECT idBrand FROM product 
												WHERE idProduct =$idProduct) LIMIT 2";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function findFull($id){
		$query = "SELECT * FROM product 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
								FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE product.idProduct = ".$id;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function searchFull($input){
		$query = "SELECT * FROM product 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
								FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE ".$input;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	function search_full($input){
		$columnNames = $this->showAll_nameColumn();
		//print_r($columnNames);
		$f = "";
		foreach($columnNames as $key=>$value){
			$f .= "product.".$value['COLUMN_NAME'] . " LIKE " . "'%".$input."%' OR ";
		}
		$f = trim($f, 'OR ');  // phải có dấu cách chỗ OR vì hàm trim tính luôn dấu cách đó
			//echo $f;
		$query = "SELECT * FROM $this->table 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
					FROM image WHERE image.isMain = 1) as image 
					ON product.idProduct = image.idPro
					WHERE $f";
		//print_r($query);
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}



	// có bao gồm img
	public function read_full(){
		$query = "SELECT * FROM product 
					INNER JOIN brand ON product.idBrand = brand.idBrand 
					INNER JOIN quantity ON product.idQuantity = quantity.idQuantity 
					INNER JOIN size ON quantity.idSize = size.idSize
					INNER JOIN color ON quantity.idColor = color.idcolor 
					LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
						FROM image WHERE image.isMain = 1) as image 
						ON product.idProduct = image.idPro 
					ORDER BY product.idProduct ASC;";

		// thực thi câu lệnh truy vấn
		$result = $this->conn->query($query);

		// lặp qua các hàng trong $result và lưu vào mảng data
		$data = array();

		while($row = $result->fetch_assoc() ){
			$data[] = $row;
		}

		return $data;
	}


	public function read_details($idProduct){
		$query = "Select * from product
		INNER JOIN brand ON product.idBrand = brand.idBrand 
		inner join categoryproduct on product.idCategoryProduct = categoryproduct.idCategoryProduct

		inner join quantity on product.idQuantity = quantity.idQuantity
		inner join color on quantity.idColor = color.idcolor
		inner join size on quantity.idSize = size.idsize
		where product.idProduct = ".$idProduct;

		// thực thi câu lệnh truy vấn
		$result = $this->conn->query($query);

		// lặp qua các hàng trong $result và lưu vào mảng data
		$data = array();
		while($row = $result->fetch_assoc() ){
			$data[] = $row;
		}

		return $data;
	}

	public function create_full($data_quantity, $data){
		$f = "";
		$v = "";
		foreach($data_quantity as $key => $value){
			$f .= $key . ",";
			$v .= "'" . $value . "',";
		}
		// xóa dấu , ở đầu hoặc cuối 
		$f = trim($f, ",");   // $f là tên các cột
		$v = trim($v, ",");	// $v là giá trị thêm vào các cột
		// query dưới tương ứng như insert into table(cot1, cot2, cot 3) VALUE (value1, value2, value3)
		$query = "INSERT INTO quantity($f) VALUES($v)";
		$status = $this->conn->query($query);
		if($status == true){
			
			$idQuantity_insert = $this->conn->query("SELECT max(idQuantity) as idQuantity FROM quantity")->fetch_assoc();
			$data['idQuantity'] = (int)$idQuantity_insert['idQuantity'];
			$f2 = "";
			$v2 = "";
			foreach($data as $key => $value){
				$f2 .= $key . ",";
				$v2 .= "'" . $value . "',";
			}
			// xóa dấu , ở đầu hoặc cuối 
			$f2 = trim($f2, ",");   // $f là tên các cột
			$v2 = trim($v2, ",");	// $v là giá trị thêm vào các cột
			// query dưới tương ứng như insert into table(cot1, cot2, cot 3) VALUE (value1, value2, value3)
			$query2 = "INSERT INTO $this->table($f2) VALUES($v2)";
			$status2 = $this->conn->query($query2);
			return $status2;
		} else{
			setcookie('msg', 'Thêm không thành công', time() + 2);
			//header('Location: ?mod='.$this->table . '&act=add');
		}
	}

	public function delete_Full($id){
		$q = "SELECT * FROM image WHERE idProduct=$id";
		$result = $this->conn->query($q)->fetch_assoc();
		if($result){
			$query = "DELETE product, image, quantity
			FROM product, image, quantity
			WHERE product.idProduct = $id 
			AND product.idProduct = image.idProduct 
			AND product.idQuantity = quantity.idQuantity;";
			$status = $this->conn->query($query);
			return $status;
		}else{
			$query2 = "DELETE product, quantity
			FROM product, quantity
			WHERE product.idProduct = $id 
			AND product.idQuantity = quantity.idQuantity;";
			$status2 = $this->conn->query($query2);
			return $status2;
		}
	}


	public function update_full($data_quantity, $data_product){
		$v = "";
		foreach($data_quantity as $key => $value){
			$v .= $key."='".$value."',";
		}
		$v = trim($v, ",");	// $v là giá trị thêm vào các cột
		$query = "UPDATE quantity SET $v WHERE idQuantity = ".$data_product['idQuantity'];
		$status = $this->conn->query($query);
		if($status == true){
			$v2 = "";
			foreach($data_product as $key => $value){
				$v2 .= $key."='".$value."',";
			}
			$v2 = trim($v2, ",");
			$query2 = "UPDATE $this->table SET $v2 WHERE $this->contens = ".$data_product[$this->contens];
			$status2 = $this->conn->query($query2);
			return $status2;
		} else{
			setcookie('msg', 'Thêm không thành công', time() + 2);
			//header('Location: ?mod='.$this->table . '&act=add');
		}
	}

	public function topSelling($num_limit){
		$query = "SELECT * FROM product 
		LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
			FROM image WHERE image.isMain = 1) as image 
		ON product.idProduct = image.idPro 
		ORDER BY product.productSold DESC
		LIMIT $num_limit";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function newProduct(){
		$query = "SELECT * FROM product 
		LEFT JOIN (SELECT idImg, idProduct AS idPro, image, isMain 
			FROM image WHERE image.isMain = 1) as image 
		ON product.idProduct = image.idPro 
		ORDER BY product.dateIN DESC
		LIMIT 5";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}


}
?>