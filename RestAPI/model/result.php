<?php 
// thực thi câu lệnh truy vấn
$result = $this->conn->query($query);

// lặp qua các hàng trong $result và lưu vào mảng data
$data = array();

while($row = $result->fetch_assoc() ){
    $data[] = $row;
}
?>
