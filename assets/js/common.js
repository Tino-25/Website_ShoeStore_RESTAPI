// PHẦN DÙNG CHUNG
var basicUrl = 'http://localhost/WORK_SPACE/Website-shoe-store_RESTAPI/'
	


// PHẦN DƯỚI CHO ADMIN

//Show Success or Error message
function Message(message,status){
	if(status==true){
		$("#success-message").html(message).slideDown();
		$("#error-message").slideUp();
		setTimeout(function(){
			$("#success-message").slideUp();
		},4000);

	}else if(status==false){
		$("#error-message").html(message).slideDown();
		$("#success-message").slideUp();
		setTimeout(function(){
			$("#error-message").slideUp();
		},4000);
	}
}

// chuyển dữ liệu lấy từ form về dạng json
// targetForm - là selector thẻ muốn lấy dữ liệu
function JsonData(targetForm){
	//Chuyển tất cả giá trị lấy từ form vào mảng, có dạng như
	// tên thuộc tính của thẻ : "giá trị thuộc tính đó"
	var arr=$(targetForm).serializeArray(); 

	//console.log(arr); //name: "sname", value: "prince" 
	// Create empty object 
	var obj1={};       
	for(i=0; i<arr.length; i++){
		//validation: check values empty or not
		if(arr[i].value == ""){
			return false;
		}
		// thêm dữ liệu vào object
		// giá trị thuộc tính name = giá trị thuộc tính value
		obj1[arr[i].name] = arr[i].value; 
	}

	// chuyển object thành json
	var json_string=JSON.stringify(obj1);
	return json_string;
}


function ObjectData(targetForm){
	//Chuyển tất cả giá trị lấy từ form vào mảng, có dạng như
	// tên thuộc tính của thẻ : "giá trị thuộc tính đó"
	var arr=$(targetForm).serializeArray(); 

	//console.log(arr); //name: "sname", value: "prince" 
	var obj1={};      // Create empty object  
	for(i=0; i<arr.length; i++){
		//validation: check values empty or not
		if(arr[i].value == ""){
			return false;
		}
		// thêm dữ liệu vào object
		// giá trị thuộc tính name = giá trị thuộc tính value
		obj1[arr[i].name] = arr[i].value; 
	}
	return obj1;
}


// thực thi các dòng dưới để có thể lấy được dữ liệu từ path -> như $_GET ở php
var parts = window.location.search.substr(1).split("&");
var $_GET = {};
for (var i = 0; i < parts.length; i++) {
	var temp = parts[i].split("=");
	$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}

// lấy ngày tháng năm hiện tại
function getTime(){
	// var today = new Date();
	// //Sat Oct 29 2022 22:15:58 GMT+0700 (Giờ Đông Dương)
	// console.log(today);
	// // cắt chuỗi lưu vào mảng (cắt bởi dấu cách)
	// var array_time = today.toString().split(" ");
	// var year = array_time[3];
	// var month = array_time[1];
	// var day = array_time[2];
	// return day + '/' + month+ '/'+ year;
	// ==> 08/Nov/2022

	var dateObj = new Date();
	var month = dateObj.getUTCMonth() + 1; //months from 1-12
	var day = dateObj.getUTCDate();
	var year = dateObj.getUTCFullYear();
	newdate = year + "/" + month + "/" + day;
	return newdate;

}