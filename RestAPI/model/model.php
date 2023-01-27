<?php 
require_once("connection.php");
session_start();

class Model
{
	var $conn;
	var $table;
	var $contens;
	function __construct()
	{
		$conn_obj = new Connect();
		$this->conn = $conn_obj->conn; 
	}

	// lấy tất cả tên cột của bảng
	function showAll_nameColumn(){
		$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='dacn1_fashion' AND TABLE_NAME='$this->table'";
		$result = $this->conn->query($query);
		$data = array();
		// nếu kết quả trả về không rỗng => tên bảng lấy từ getname có tồn tại
		if(!empty($result)){
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
		}
		return $data;
	}
	function All()
	{
		$query = "SELECT * FROM $this->table ORDER BY $this->contens ASC";

		require("result.php");

		return $data;
	}

	function find($id)
	{
		$query = "SELECT * FROM $this->table WHERE $this->contens = $id";
		return $this->conn->query($query)->fetch_assoc();
	}

	function delete($id)
	{
		$query = "DELETE FROM $this->table WHERE $this->contens = $id";

		$status = $this->conn->query($query);
		if($status == true){
			setcookie('msg', 'xóa thành công', time()+2);
		}else{
			setcookie('msg', 'Xóa không thành công', time()+2);
		}

		//header('Location: ?mod=',$this->table);
		return $status;
	}

	function insert($data)
	{
		$f = "";
		$v = "";
		foreach($data as $key => $value){
			$f .= $key . ",";
			$v .= "'" . $value . "',";
		}
			// xóa dấu , ở đầu hoặc cuối 
			$f = trim($f, ",");   // $f là tên các cột
			$v = trim($v, ",");	// $v là giá trị thêm vào các cột
			// query dưới tương ứng như insert into table(cot1, cot2, cot 3) VALUE (value1, value2, value3)
			$query = "INSERT INTO $this->table($f) VALUES($v)";

			$status = $this->conn->query($query);

			if($status == true){
				setcookie('msg', 'Thêm thành công', time()+2);
				//header('Location: ?mod='.$this->table);
			} else{
				setcookie('msg', 'Thêm không thành công', time() + 2);
				//header('Location: ?mod='.$this->table . '&act=add');
			}
			return $status;
		}

		function update($data){
			$v = '';
			foreach($data as $key => $value){
				$v .= $key."='".$value."',";
			}
			$v = trim($v, ',');
			$query = "UPDATE $this->table SET $v WHERE $this->contens = ".$data[$this->contens];

			$result = $this->conn->query($query);
			if($result == true){
				// phải có  "/" không thì sẽ không chạy
				setcookie('msg', 'Cập nhật thành công', time()+20, "/");   
				//header('Location: ?mod='.$this->table);
			}else{
				setcookie('msg', 'Cập nhật không thành công', time()+20, "/");
				//header('Location: ?mod='.$this->table.'&act=edit&id='.$data['id']['id']);
			}
			return $result;
		}

		function search($input){
			$columnNames = $this->showAll_nameColumn();
			//print_r($columnNames);
			$f = "";
			foreach($columnNames as $key=>$value){
				$f .= $value['COLUMN_NAME'] . " LIKE " . "'%".$input."%' OR ";
			}
			$f = trim($f, 'OR ');  // phải có dấu cách chỗ OR vì hàm trim tính luôn dấu cách đó
			//echo $f;
			$query = "SELECT * FROM $this->table WHERE $f";
			$result = $this->conn->query($query);
			$data = array();
			while($row = $result->fetch_assoc()){
				$data[] = $row;
			}
			return $data;
		}

		// hiển thị mã trạng thái json - vd: status 200, status_message OK, $data = dữ liệu json
		function deliver_response($status, $status_message, $data){
			header("HTTP/1.1 $status $status_message");
			
			if(isset($data)){
				foreach ($data as $key => $value) {
					$response[$key] = $value;
					}
			}
			/* hoặc
				$nameColumns = $this->showAll_nameColumn();
				foreach ($nameColumns as $key => $value) {
					if(is_numeric($key)){
						$response[$value['COLUMN_NAME']] = $value["COLUMN_NAME"];
					}
				}
			*/
			$response['Status']['code'] = $status;
			$response['Status']['message'] = $status_message;
			
			$json_response = json_encode($response);
			echo $json_response;
		}


	}
?>