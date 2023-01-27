
$(document).ready(function(){

	//
	function loadAll_brand(){
		// cho nội dung (text, thẻ con, ...) của element #list-brand thành rỗng
		$("#list-brand").html("");
		$.ajax({
			url:  basicUrl+"RestAPI/brand/read.php",
			type: "GET",
			success: function(response){
				$.each(response, function(key, value){
					if(!isNaN(key)){
						$("#list-brand").append(
							"<tr>"+
							"<th  id='idUser' scope='row'>"+value.idBrand+"</th>"+
							"<td>"+value.brandName+"</td>"+
							"<td>"+value.brandDesc+"</td>"+
							"<td><img class='img-showList' src='"+value.brandLogo+"''></td>"+
							"<td><div>"+
							"<button id='delete-btn-brand' data-idbrand="+value.idBrand+">Xóa</button>"+
							"<br>"+
							"<a id='update-btn' href='?mod=brand&act=update&idBrand="+value.idBrand+"'>Update</a>"+
							"</div></td>"+
							"</tr>"
							);
					}
				});
			}
		});
	}

	loadAll_brand();

	// add brand
	$("#btn-save__brand").on("click", function(e){
		// loại bỏ các sự kiện mặc định
		e.preventDefault();
		var jsonobj = JsonData("#addForm_brand");
		// nếu dữ liệu nhận được rỗng thi jsonobj trả về false
		//console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/brand/create.php",
			type: "POST",
			data: jsonobj,
			success:function(data){
				window.location = "?mod=brand&act=list";
			},
			error: function(){
				alert("Lỗi");
			}
		});
	});

	$(document).on("click", "#delete-btn-brand", function(){
		var idBrand = $(this).data("idbrand");
		//alert(idBrand);
		if(confirm("Bạn có muốn xóa brand "+idBrand+" không?")){
			$.ajax({
				url:  basicUrl+"RestAPI/brand/delete.php?id="+idBrand,
				type: "POST",
				success: function(data){
					alert("Đã xóa thành công!");
					loadAll_brand();
				}
			});
		}
	});


	//update
	//show details for update
	var idBrand = $(".update-brand #idBrand").val();
	$.ajax({
		url:  basicUrl+"RestAPI/brand/read_one.php?id="+idBrand,
		type: "GET",
		success: function(data){
			$("#brandName").val(data['brandName']);
			$("#brandDesc").val(data['brandDesc']);
			$("#brandLogo").val(data['brandLogo']);
		}
	});
	$("#btn-update__brand").on("click", function(){
		var jsonobj = JsonData("#updateForm_brand");
		console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/brand/update.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				alert("cập nhật thành công - update successfully");
				loadAll_brand();
				window.location = "?mod=brand&act=list";
			}
		});
	});



});