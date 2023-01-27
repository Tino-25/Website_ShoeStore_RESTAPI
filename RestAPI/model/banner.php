<?php 
	require_once('model.php');
	class Banner extends Model 
	{
		var $table='banner';
		var $contens = 'idBanner';

		public function active($idBanner, $num_active){
			$q = "UPDATE banner SET active = 0";
			$result1 = $this->conn->query($q);
			if($result1){
				$query = "UPDATE banner SET active = $num_active WHERE idBanner=$idBanner;";
				$status = $this->conn->query($query);
				return $status;
			}
		}
	}
?>