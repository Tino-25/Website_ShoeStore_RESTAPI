$(document).ready(function(){
	$("#btn-register").on("click", function(e){
		e.preventDefault();
		var idDivision = 1
		var lastName = $("#lastName").val()
		var firstName = $("#firstName").val()
		var address = $("#address").val()
		var sex = $("#sex").val()
		var phone = $("#phone").val()

		var email = $("#email").val()
		var password = $("#password").val()
		
		var obj = {
			idDivision: idDivision,
			lastName: lastName,
			firstName: firstName,
			address: address,
			sex: sex,
			phone: phone,
			email: email,
			password: password
		}
		var jsonobj = JSON.stringify(obj)
		//console.log(email+password)
		$.ajax({
			// basicUrl: để dễ sửa path => js/common.js
			url: basicUrl+"/RestAPI/user/create_full.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				var obj2 = {
					email: email,
					password: password
				}
				var jsonobj2 = JSON.stringify(obj2)
					//console.log(email+password)
				$.ajax({
						// basicUrl: để dễ sửa path => js/common.js
					url: basicUrl+"/RestAPI/user/login.php",
					type: "POST",
					data: jsonobj2,
					success: function(data){
						var userName = data['lastName'] + "_" + data['firstName']
						var idUser = data['idUser']
						var idDivision = data['idDivision']
						window.location = basicUrl+"/login_handle.php?userName="+userName+"&idUser="+idUser+"&idDivision="+idDivision
					}
				});
				}
			});
	})
});