<?php 
require_once('model.php');
class Order extends Model 
{
	var $table = "orders";
	var $contens = "idOrder";

	public function readFull(){
		$query = "SELECT * FROM orders 
					INNER JOIN orderdetails ON orders.idOrder = orderdetails.idOrder
					INNER JOIN user ON orders.idUser = user.idUser
					INNER JOIN product ON orderdetails.idProduct = product.idProduct";
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function create_full($dataOrder, $dataOrderDetails){
		$f_order = "";
        $v_order = "";
        foreach($dataOrder as $key => $value){
            $f_order .= $key . ",";
            $v_order .= "'" . $value . "',";
        }
        $f_order = trim($f_order, ",");
        $v_order = trim($v_order, ",");

        $f_orderDetails = "";
        $v_orderDetails = "";
        foreach($dataOrderDetails as $key => $value){
            $f_orderDetails .= $key . ",";
            $v_orderDetails .= "'" . $value . "',";
        }
        $f_orderDetails = trim($f_orderDetails, ",");
        $v_orderDetails = trim($v_orderDetails, ",");

        $query_1 = "INSERT INTO orders($f_order) VALUES ($v_order);";
        if($this->conn->query($query_1)){
            //$v_account .= ', idUser = '.;
            $query_2 = "insert into orderdetails(idOrder, $f_orderDetails) VALUES ( (SELECT max(idOrder) FROM orders), $v_orderDetails);";
            $status = $this->conn->query($query_2);
        }

        if(isset($status) && $status == true){
            setcookie('msg', 'Thêm thành công', time()+2);
            //header('Location: ?mod='.$this->table);
        } else{
            setcookie('msg', 'Thêm không thành công', time() + 2);
            //header('Location: google.com);
        }
        return $status;
	}

	public function delete_details($idOrder){
		// $query = "DELETE FROM orders WHERE idOrder = $idOrder;
		// 			DELETE FROM orderdetails WHERE idOrder = $idOrder;";
		$query = "DELETE orders, orderdetails FROM orders
					INNER JOIN orderdetails ON orders.idOrder = orderdetails.idOrder
					WHERE orders.idOrder = $idOrder";

		$status = $this->conn->query($query);
		if($status == true){
			setcookie('msg', 'xóa thành công', time()+2);
		}else{
			setcookie('msg', 'Xóa không thành công', time()+2);
		}

		//header('Location: ?mod=',$this->table);
		return $status;
	}

	public function read_details($idOrder){
		$query = "SELECT * FROM orders 
					INNER JOIN orderdetails ON orders.idOrder = orderdetails.idOrder
					INNER JOIN user ON orders.idUser = user.idUser
					INNER JOIN product ON orderdetails.idProduct = product.idProduct
					 WHERE orders.idOrder = ".$idOrder;
		$result = $this->conn->query($query);
		$data = array();
		while($row = $result->fetch_assoc()){
			$data[] = $row;
		}
		return $data;
	}

	public function update_status($idOrder, $new_status, $quantityOrder, $idQuantity, $flag){
		$query = "UPDATE orders SET status = $new_status WHERE idOrder = $idOrder";
		$status = $this->conn->query($query);
		if($status && $flag==1){
			$query2 = "UPDATE quantity SET quantity = quantity - $quantityOrder WHERE idQuantity = $idQuantity";
			$status2 = $this->conn->query($query2);
			return $status2;
		}else{
			return $status;
		}
	}
}
?>