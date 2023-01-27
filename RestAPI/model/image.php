<?php 
require_once('model.php');
class Image extends Model 
{
	var $table = "image";
	var $contens = "idImg";

	public function read_id($idProduct){
		$query = "SELECT * FROM image WHERE idProduct=".$idProduct;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function set_isMain($idProduct, $idImg){
		//set_All_isMain_0
		$query_1 = "update image set isMain = 0 where idProduct = ".$idProduct;

		$status_1 = $this->conn->query($query_1);
		if($status_1){
			$query_2 = "update image set isMain = 1 where idImg = ".$idImg;
			$status_2 = $this->conn->query($query_2);
			return $status_2;
		}

	}

}


?>