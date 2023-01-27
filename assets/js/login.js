$(document).ready(function(){
	$("#btn_login").on("click", function(e){
		e.preventDefault();
		var email = $("#email").val()
		var password = $("#password").val()
		var obj = {
			email: email,
			password: password
		}
		var jsonobj = JSON.stringify(obj)
		//console.log(email+password)
		$.ajax({
			// basicUrl: để dễ sửa path => js/common.js
			url: basicUrl+"/RestAPI/user/login.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				var userName = data['lastName'] + "_" + data['firstName']
				var idUser = data['idUser']
				var idDivision = data['idDivision']
				window.location = basicUrl+"/login_handle.php?userName="+userName+"&idUser="+idUser+"&idDivision="+idDivision
				}
			});
	})
});