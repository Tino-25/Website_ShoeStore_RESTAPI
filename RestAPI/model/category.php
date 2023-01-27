<?php 
require_once('model.php');
class Category extends Model 
{
	var $table = "categoryproduct";
	var $contens = "idCategoryProduct";

	public function readAll_Full(){
		//INNER JOIN gender ON categoryproduct.idGender = gender.idGender
		//INNER JOIN material ON categoryproduct.idMaterial = material.idMaterial
		$query = "SELECT * FROM categoryproduct 
					Order By categoryproduct.idCategoryProduct ASC";
		// thực thi câu lệnh truy vấn
		$result = $this->conn->query($query);

		// lặp qua các hàng trong $result và lưu vào mảng data
		$data = array();

		while($row = $result->fetch_assoc() ){
		    $data[] = $row;
		}

		return $data;
	}
}
?>