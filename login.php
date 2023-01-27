<?php 
session_start();
// unset($_SESSION['idUser']);
// unset($_SESSION['userName']);
if(isset($_SESSION['userName']) && isset($_SESSION['idUser'])){
	echo $_SESSION['userName'];
	echo $_SESSION['idUser'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	 <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- css -->
	<link rel="stylesheet" type="text/css" href="assets/css/login.css">
</head>
<body>

	<div class="wrap-login">
		<form id="formLogin" class="formLogin">
			<h2>Form login</h2>
			<div class="error_login">
				<?php 
					if(isset($_SESSION['error_login'])){
						echo $_SESSION['error_login'];
						unset($_SESSION['error_login']);
					}
				?>
			</div>
			<label class="label" for="email">Email</label>
			<br>
			<input type="text" name="email" id="email" placeholder="Nhập email">
			<br>
			<label class="label" for="password">Password</label>
			<br>
			<input type="text" name="password" id="password" placeholder="Nhập password">
			<div class="button_login__wrap">
				<a href="#" id="btn_login" class="btn btn-primary">Login</a>
				<a href="register.php" class="color-white">Or Register</a>
			</div>
		</form>
	</div>
	

	<!-- Jquery -->
	<script src="./assets/js/jquery/jquery.js"></script>
	<!-- JS -->
	<script src="./assets/js/common.js"></script>
	<script src="./assets/js/login.js"></script>
</body>
</html>