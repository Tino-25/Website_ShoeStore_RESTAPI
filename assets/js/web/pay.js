// $(document).ready(function(){

// // chuyển dữ liệu lấy từ form về dạng json
// // targetForm - là selector thẻ muốn lấy dữ liệu
// function JsonData(targetForm){
// 	//Chuyển tất cả giá trị lấy từ form vào mảng, có dạng như
// 	// tên thuộc tính của thẻ : "giá trị thuộc tính đó"
// 	var arr=$(targetForm).serializeArray(); 

// 	//console.log(arr); //name: "sname", value: "prince" 
// 	// Create empty object 
// 	var obj1={};       
// 	for(i=0; i<arr.length; i++){
// 		//validation: check values empty or not
// 		if(arr[i].value == ""){
// 			return false;
// 		}
// 		// thêm dữ liệu vào object
// 		// giá trị thuộc tính name = giá trị thuộc tính value
// 		obj1[arr[i].name] = arr[i].value; 
// 	}

// 	// chuyển object thành json
// 	var json_string=JSON.stringify(obj1);
// 	return json_string;
// }

// $("#btnSave__order").on("click", function(e){
// 		e.preventDefault();
// 		var jsonobj = JsonData("#formSave__Order");
// 		console.log(jsonobj);
// 		$.ajax({
// 			url: "http://localhost:8080/WORK_SPACE/dacn1_fashion/RestAPI/order/create.php",
// 			type: "POST",
// 			data: jsonobj,
// 			success: function(data){
// 				console.log("thêm order thành công")
// 				// window.location = "?mod=product&act=list";
// 			},
// 			error: function(){
// 				console.log("Lỗi")
// 			}
// 		});
// 	});

// });