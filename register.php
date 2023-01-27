<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
	integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
	<!-- fontawesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<!-- css -->
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">
</head>
<body>

	<div class="wrap-register">
		<form id="formRegister" class="formRegister">
			<center><h2>Form Register</h2></center>
			<article class="card-body mx-auto" style="max-width: 400px;">
				<form>
					<div class="form-group input-group">
						<input id="firstName" name="firstName" class="form-control" placeholder="First name" type="text">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-user"></i> </span>
						</div>
						<input id="lastName" name="lastName" class="form-control" placeholder="Last name" type="text">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<input id="email" name="email" class="form-control" placeholder="Email" type="text">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
						</div>
						<input id="address" name="address" class="form-control" placeholder="Address" type="text">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-phone"></i> </span>
						</div>
						<input id="phone" name="phone" class="form-control" placeholder="Phone number" type="text">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa-solid fa-mars-and-venus"></i> </span>
						</div>
						<select id="sex" name="sex" class="form-control">
							<option value="male" selected="">Male</option>
							<option value="female">Female</option>
						</select>
					</div> <!-- form-group end.// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input id="password" name="password" class="form-control" placeholder="Create password" type="password">
					</div> <!-- form-group// -->
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"> <i class="fa fa-lock"></i> </span>
						</div>
						<input class="form-control" placeholder="Repeat password" type="password">
					</div> <!-- form-group// -->                                      
					<div class="form-group">
						<button id="btn-register" type="submit" class="btn btn-primary btn-block"> Create Account  </button>
					</div> <!-- form-group// -->      
					<p class="text-center">Have an account? <a href="login.php">Log In</a> </p>                                                                 
				</form>
			</article>
		</form>
	</div>
	
	<!-- Jquery -->
	<script src="./assets/js/jquery/jquery.js"></script>
	<!-- JS -->
	<script src="./assets/js/common.js"></script>
	<script src="./assets/js/register.js"></script>
	<!--  -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>