$(document).ready(function(){

	// show details product - dùng khi hsow details và update
	function showDetails(){
		// xử lý dữ liệu - hiển thị chi tiết sản phẩm
		//$_GET đã được định nghĩa ở common.js
		var idProduct = $_GET['id'];
		//alert(idProduct);
		$.ajax({
			url:  basicUrl+"RestAPI/product/read_details.php?id="+idProduct,
			type: "GET",
			success: function(data){
				$("#details_product #idproduct").val(data[0]['idProduct']);
				$("#details_product #product_idCategoryProduct").val(data[0]['idCategoryProduct']);
				$("#details_product #product_idBrand").val(data[0]['idBrand']);
				$("#details_product #productName").val(data[0]['productName']);
				$("#details_product #productUnitPrice").val(data[0]['productUnitPrice']);
				$("#details_product #dateIn").val(data[0]['dateIn']);
				$("#details_product #productDescription").val(data[0]['productDescription']);
				$("#details_product #productSold").val(data[0]['productSold']);
				$("#details_product #categoryName").val(data[0]['categoryName']);
				$("#details_product #categoryImage_show").attr("src", "../assets/img/category/"+data[0]['categoryImage']);
				$("#details_product #brandName").val(data[0]['brandName']);
				$("#details_product #color").val(data[0]['color']);
				$("#details_product #size").val(data[0]['size']);
				$("#details_product #quantity").val(data[0]['quantity']);
			}
		});	
	}


	// show list image
	function showList_image(idProduct){
		// show all list image
		$.ajax({
			url:  basicUrl+"RestAPI/image/read.php",
			type: "POST",
			data: {
				idProduct: idProduct
			},
			success: function(data){
				$.each(data, function(key, value){
					if(!isNaN(key)){
						if(value.isMain == 1){
							var class_ismain = 'ismain';
						}else{
							var class_ismain = '';
						}
						$(".listImage__wrap").append(
							"<div class='image_item width-20'>"+
							"<img src='../assets/img/product/"+value.image+"' alt='ảnh sản phẩm'>"+
							"<button id='delete_img' data-idimg='"+value.idImg+"'>Xóa</button>"+
							"<button class='"+class_ismain+"' id='set_main' data-idimg='"+value.idImg+"'>chính</button>"+
							"</div>"
							);
					}
				});
			}
		});
	}


	// show list
	function loadAll_product(){
		$("#list-product").html("");
		$.ajax({
			url:  basicUrl+"RestAPI/product/read.php",
			type: "GET",
			success: function(data){
				//console.log(data)
				$.each(data, function(key, value){
					if(!isNaN(key)){
						//console.log(value.idProduct)
						$("#list-product").append(
							"<tr>"+
							"<td>"+value.idProduct+"</td>"+
							// "<td>"+value.idCategoryProduct+"</td>"+
							// "<td>"+value.idBrand+"</td>"+
							// "<td>"+value.idQuantity+"</td>"+
							"<td>"+value.productName+"</td>"+
							"<td id='show_image__product'>"+
							"<img class='img-showList' src='../assets/img/product/"+value.image+"'>"+
							"<button type='button' data-idproduct='"+value.idProduct+"' data-toggle='modal' data-target='#myModal' id='btn_image'>Image</button>"+
							"</td>"+
							"<td>"+value.productUnitPrice+"</td>"+
							"<td>"+value.dateIn+"</td>"+
							"<td>"+value.productDescription+"</td>"+
							"<td>"+value.productSold+"</td>"+
							"<td><button id='btn_details__product' data-idproduct='"+value.idProduct+"'>Chi tiết</a>"+
							"<button id='btn_delete__product' data-idproduct='"+value.idProduct+"'>Xóa</button>"+
							"<button id='btn_update__product' data-idproduct='"+value.idProduct+"'>Update</button></td>"+
							"</tr>"
							);
					}
				});
			},
			error: function(){
				console.log("lỗi show list sản phẩm");
			}
		});
	}

	loadAll_product();

	// show form add product
	$.ajax({
		url:  basicUrl+"RestAPI/category/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formAdd__product #idCategoryProduct").append(
						"<option value='"+value.idCategoryProduct+"'>"+value.categoryName+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/brand/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formAdd__product #idBrand").append(
						"<option value='"+value.idBrand+"'>"+value.brandName+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/color/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formAdd__product #idColor").append(
						"<option value='"+value.idcolor+"'>"+value.color+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/size/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formAdd__product #idSize").append(
						"<option value='"+value.idsize+"'>"+value.size+"</option>"
						);
				}
			});
		}
	});
	// lấy giá trị ngày / tháng / năm hiện tại => hàm getTime được định ghĩa ở common.js
	$("#formAdd__product #dateIn").val(getTime());

	// thêm sản phẩm => thêm bảng quantity trước rồi mới thêm product
	//save product
	$("#btnSave_product").on("click", function(e){
		e.preventDefault();
		var jsonobj = JsonData("#formAdd__product #form");
		//console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/product/create.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				alert("Thêm sản phẩm thành công!");
				window.location = "?mod=product&act=list";
			}
		});
	});


	// delete - product
	$(document).on("click", "#btn_delete__product", function(){
		var idProduct = $(this).data('idproduct');
		//alert(idProduct);
		if(confirm("Bạn có muốn xóa sản phẩm "+idProduct+" không?")){
			$.ajax({
				url:  basicUrl+"RestAPI/product/delete.php?id="+idProduct,
				type: "GET",
				success: function(data){
					alert("Đã xóa thành công sản phẩm");
					loadAll_product();
				}
			});
		}
	});



	$(document).on("click", "#btn_details__product", function(e){
		e.preventDefault();
		var idProduct = $(this).data('idproduct');
		window.location = "?mod=product&act=details&id="+idProduct;
	});

	showDetails();



	// UPDATE
	//show update
	$(document).on("click", "#btn_update__product", function(e){
		e.preventDefault();
		var idProduct = $(this).data('idproduct');
		window.location = "?mod=product&act=update&id="+idProduct;
	});

	// show form update product
	$.ajax({
		url:  basicUrl+"RestAPI/category/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formUpdate__product #idCategoryProduct").append(
						"<option value='"+value.idCategoryProduct+"'>"+value.categoryName+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/brand/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formUpdate__product #idBrand").append(
						"<option value='"+value.idBrand+"'>"+value.brandName+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/color/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formUpdate__product #idColor").append(
						"<option value='"+value.idcolor+"'>"+value.color+"</option>"
						);
				}
			});
		}
	});
	$.ajax({
		url:  basicUrl+"RestAPI/size/read.php",
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formUpdate__product #idSize").append(
						"<option value='"+value.idsize+"'>"+value.size+"</option>"
						);
				}
			});
		}
	});

	var idProduct = $_GET['id'];
	$.ajax({
		url:  basicUrl+"RestAPI/product/read_details.php?id="+idProduct,
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#formUpdate__product #idProduct").val(value.idProduct);
					$("#formUpdate__product #idQuantity").val(value.idQuantity);
					$("#formUpdate__product #productSold").val(value.productSold);
					// prepend là thêm vào đầu tiên // apend là thêm vào nhưng sẽ thêm vào cuối
					$("#formUpdate__product #idCategoryProduct").prepend(
						"<option selected value='"+value.idCategoryProduct+"'>"+value.categoryName+"</option>"
						);
					$("#formUpdate__product #idBrand").prepend(
						"<option selected value='"+value.idBrand+"'>"+value.brandName+"</option>"
						);
					$("#formUpdate__product #idColor").prepend(
						"<option selected value='"+value.idColor+"'>"+value.color+"</option>"
						);
					$("#formUpdate__product #idSize").prepend(
						"<option selected value='"+value.idSize+"'>"+value.size+"</option>"
						);
					$("#formUpdate__product #dateIn").val(value.dateIn);
					$("#formUpdate__product #productName").val(value.productName);
					$("#formUpdate__product #productUnitPrice").val(value.productUnitPrice);
					$("#formUpdate__product #productDescription").val(value.productDescription);
					$("#formUpdate__product #quantity").val(value.quantity);
				}
			});
		}
	});


	$(document).on("click", "#btnUpdate_product", function(e){
		e.preventDefault();
		var jsonobj = JsonData("#formUpdate__product #form");
		console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/product/update.php?id="+idProduct,
			type: "POST",
			data: jsonobj,
			success: function(data){
				console.log("update thành công");
				window.location = "?mod=product&act=list";
			}
		})
	})


	// Quản lý hình ảnh

	// lấy text title lần đầu => để reset lại text của title
	var firstTitle = $('#modal-title').text();
	$(document).on("click", "#btn_image", function(e){
		e.preventDefault();
		// set text lại từ đầu cho title => để tránh bị nối thêm các idProduct
		$('#modal-title').text(firstTitle);
		// đặt lại giá trị của thẻ thành trống - để tránh bị nối thêm ảnh vào
		$(".listImage__wrap").text('');

		var idProduct = $(this).data('idproduct');
		$('#modal-title').append(idProduct);

		//set idproduct cho input hidden để có thể lấy để thêm ảnh mới
		$("#idProduct").val(idProduct);

		showList_image(idProduct);
		
	});


	// action thêm hình ảnh
	$(".modal-content #add_image").on("click", function(e){
		e.preventDefault();

		// đặt lại giá trị của thẻ thành trống - để tránh bị nối thêm ảnh vào
		$(".listImage__wrap").text('');

		var filename = $("#imageProduct")[0].files[0];
		//alert(filename['name']);
		var idProduct = $("#idProduct").val();
		var obj = {
			idProduct: idProduct,
			image: filename['name']
		};
		var jsonobj = JSON.stringify(obj);
		//console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/image/create.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				console.log('ok')
			}
		});

		//upload ảnh
		var fd = new FormData();
		// không dùng file[0] vì để dùng files.length ở dưới 
		var files = $("#imageProduct")[0].files;
		//console.log(files[0]['name']);  hiển thị tên file
		if(files.length > 0){
			fd.append('imageProduct', files[0]);
			$.ajax({
				url: 'product/upload_product.php',
				type: "POST",
				data: fd,
				contentType: false,
				processData: false,
				success: function(data){
					alert('thêm ảnh và upload ảnh thành công');
					showList_image(idProduct);
					// reset giá trị đã chọn trong input file
					$("#imageProduct").val('');
				}
			});
		}else{
			alert("Please select a file.");
		}
	});

	// xóa hình ảnh
	$(document).on("click", "#delete_img", function(e){
		e.preventDefault();
		var idImg = $(this).data('idimg');
		var idProduct = $("#idProduct").val();

		// đặt lại giá trị của thẻ thành trống - để tránh bị nối thêm ảnh vào
		$(".listImage__wrap").text('');

		//alert(idImg);
		$.ajax({
			url:  basicUrl+"RestAPI/image/delete.php?id="+idImg,
			type: "GET",
			success: function(data){
				showList_image(idProduct);

			},
			error: function(){
				alert("Lỗi khi xóa ảnh sản phẩm");
			}
		});
	});


	// set main cho ảnh
	$(document).on("click", "#set_main", function(e){
		e.preventDefault();
		// đặt lại giá trị của thẻ thành trống - để tránh bị nối thêm ảnh vào
		$(".listImage__wrap").text('');
		var idProduct = $("#idProduct").val();
		var idImg = $(this).data('idimg');
		var obj = {
			idProduct: idProduct,
			idImg: idImg
		}
		var jsonobj = JSON.stringify(obj);
		//console.log(jsonobj)
		$.ajax({
			url:  basicUrl+"RestAPI/image/isMain.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				console.log("set thành công");
				showList_image(idProduct);
				loadAll_product();
			}
		});
	});






});