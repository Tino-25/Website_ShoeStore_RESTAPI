<?php 
session_start();
$userName = isset($_GET['userName']) ? $_GET['userName'] : null;
$idUser = isset($_GET['idUser']) ? $_GET['idUser'] : null;
$idDivision = isset($_GET['idDivision']) ? $_GET['idDivision'] : null;
echo $userName;
if(isset($userName) && isset($idUser) && isset($idDivision) && $userName!=undefined && $idUser!=undefined){
	$_SESSION['userName'] = $userName;
	$_SESSION['idUser'] = $idUser;
	$_SESSION['idDivision'] = $idDivision;
	header("location: ./");
}else{
	header("location: ./login.php");
	$_SESSION['error_login'] = "Email hoặc mật khẩu không đúng.<br> Vui lòng nhập lại!";
}
?>