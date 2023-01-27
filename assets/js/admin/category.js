$(document).ready(function(){

	// list category
	function loadTable_category(){
	  $("#list-category").html(""); //starting me empty ho jae
	  $.ajax({
	    url:  basicUrl+"RestAPI/category/read.php",
	    type: "GET",
	    success:function(data){
	        $.each(data,function(key,value){
	        if(!isNaN(key)){   // nếu key không phải là số thì chạy - vì trong json có status để check lỗi
	          $("#list-category").append("<tr>"+
	            "<th id='idUser' scope='row'>"+value.idCategoryProduct+"</th>"+
	            "<td>"+value.categoryName+"</td>"+
	            "<td><img class='img-showList' src='../assets/img/category/"+value.categoryImage+"'></td>"+
	            "<td>"+value.categoryDesc+"</td>"+
	            // "<td>"+value.gender+"</td>"+
	            // "<td>"+value.material+"</td>"+
	            "<td>"+
	            "<button id='delete-btn-category' data-iddelete="+value.idCategoryProduct+">Delete</button>"+
	            "<br>"+
	            "<button id='update-btn-category' data-idcategory="+value.idCategoryProduct+">Update</button>"+
	            "</td>"+
	            "</tr>");
	        }
	      });
	    }
	  });
	}
	loadTable_category();


	// update
	// chuyển hướng update form
	$(document).on("click", "#update-btn-category", function(e){
		e.preventDefault();
		var idCategory = $(this).data("idcategory");
		window.location = "?mod=category&act=update&idCategoryProduct="+idCategory;
	});
	// hiển thị dữ liệu để chuẩn bị update
	var idCategory = $(".update-category #idCategoryProduct").val();
	$.ajax({
		url:  basicUrl+"RestAPI/category/read_one.php?id="+idCategory,
		type: "GET",
		success: function(data){
			$("#categoryName").val(data['categoryName']);
			$("#categoryImage").val(data['categoryImage']);
			$("#categoryImage_show").attr("src", "assets/img/category/"+data['categoryImage']);
			$("#categoryDesc").val(data['categoryDesc']);
		}
	});
	// thực hiện update
	$("#btn-update__category").on("click", function(e){
		e.preventDefault();
		var filename = $("#input_file_category")[0].files[0];
		var obj1 = {
		   "categoryImage": filename['name']
		}

		var obj2 = ObjectData("#updateForm_category");
	  	// nối 2 obj lại thành 1
	  	var obj = { ...obj1, ...obj2}
	  	//alert(obj);
	  	// chuyern obj thành json
	  	var jsonobj=JSON.stringify(obj);
	  	console.log(jsonobj);

	  	$.ajax({
	    url:  basicUrl+"RestAPI/category/update.php",
	    type: "POST",
	    data: jsonobj,
	    success: function(data){
	      console.log("đã update db tên ảnh");
	    },
	    error: function(){
	    	console.log("lỗi update category");
	    }
	  });

	  // upload ảnh
	  var fd = new FormData();
	  var files = $('#input_file_category')[0].files;
	  //console.log(files[0]['name'])
	  // kiểm tra file đã được chọn hay chưa
	  if(files.length > 0 ){
	    //categoryImage là phần key để gửi qua file upload xử lý
	    fd.append('image2',files[0]);
	    $.ajax({
	      url: "category/upload_category.php",
	      type: "POST",
	      data: fd,
	      contentType: false,
	      processData: false,
	      success: function(response){
	        console.log(response);
	        if(response != 0){
	           alert('file uploaded');
	            window.location = "?mod=category&act=list";
	        }else{
	          alert('file not uploaded');
	        }
	      }
	    });
	  }else{
	    alert("Please select a file.");
	  }


	});



	//delete
	$(document).on("click", "#delete-btn-category", function(e){
		e.preventDefault();
		var idCategory = $(this).data("iddelete");
		if(confirm("Bạn có muốn xóa "+idCategory+" không? ")){
			$.ajax({
				url:  basicUrl+"RestAPI/category/delete.php",
				type: "POST",
				data: {
					number: idCategory
				},
				success: function(data){
					alert("Đã xóa thành công!!");
        			loadTable_category();
				}
			});
		}

	});

	// add

	$("#btn-save__category").on("click", function(e){
	  e.preventDefault();

	  // lấy tên file (đầu tiên theo dạng object sau đó chuyển thành json)
	  //để thêm vào db
	  var filename = $("#input_file_category")[0].files[0];
	  var obj1 = {
	    "categoryImage": filename['name']
	  }

	  var obj2 = ObjectData("#addForm_category");
	  // nối 2 obj lại thành 1
	  var obj = { ...obj1, ...obj2}
	  //alert(obj);
	  // chuyern obj thành json
	  var jsonobj=JSON.stringify(obj);
	  console.log(jsonobj);
	  $.ajax({
	    url:  basicUrl+"RestAPI/category/create.php",
	    type: "POST",
	    data: jsonobj,
	    success: function(data){
	      console.log("đã thêm vào db tên ảnh");
	    }
	  });

	  // upload ảnh
	  var fd = new FormData();
	  var files = $('#input_file_category')[0].files;
	  //console.log(files[0]['name'])
	  // kiểm tra file đã được chọn hay chưa
	  if(files.length > 0 ){
	    //categoryImage là phần key để gửi qua file upload xử lý
	    fd.append('image2',files[0]);
	    $.ajax({
	      url: "category/upload_category.php",
	      type: "POST",
	      data: fd,
	      contentType: false,
	      processData: false,
	      success: function(response){
	        console.log(response);
	        if(response != 0){
	           alert('file uploaded');
	            window.location = "?mod=category&act=list";
	        }else{
	          alert('file not uploaded');
	        }
	      }
	    });
	  }else{
	    alert("Please select a file.");
	  }

	});



});