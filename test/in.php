<?php 
$param = array(
    'name' => 'NguyenVanCuong',
    'diachi' => 'Q12TPHCM'
);

// URL có chứa hai thông tin name và diachi
$url = 'http://localhost:8080/WORK_SPACE/dacn1_fashion/test/post.php';

// Khởi tạo CURL
$ch = curl_init($url);

// Thiết lập có return
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Thiết lập sử dụng POST
curl_setopt($ch, CURLOPT_POST, count($param));

// Thiết lập các dữ liệu gửi đi
curl_setopt($ch, CURLOPT_POSTFIELDS, $param); 

$result = curl_exec($ch);

curl_close($ch);

echo $result;
?>