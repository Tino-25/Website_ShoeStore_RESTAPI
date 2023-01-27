$(document).ready(function(){
	function showList(){
		$("#list-order").text('');
		$.ajax({
			url:  basicUrl+"RestAPI/order/read.php",
			type: "GET",
			success: function(data){
				//console.log(data);
				$.each(data, function(key, value){
					if(!isNaN(key)){
						if(value.status == 0){
							var status = "<button class='btn btn-warning' id='new_order' data-status='1' data-idorder='"+value.idOrder+"' data-quantity='"+value.quantityOrder+"' data-idquantity='"+value.idQuantity+"'>Đơn hàng mới</button>";
						}else if(value.status == 1){
							var status = "<button class='btn btn-primary' id='done_order' data-status='0' data-idorder='"+value.idOrder+"' data-quantity='"+value.quantityOrder+"' data-idquantity='"+value.idQuantity+"'>Đơn hàng Đã xử lý</button>";
						}
						$("#list-order").append(
							"<tr>"+
							"<td>"+value.idOrder+"</td>"+
							"<td>"+value.idUser+"</td>"+
							"<td>"+value.dateDelivery+"</td>"+
							"<td>"+value.dateOrder+"</td>"+
							"<td>"+status+"</td>"+
							"<td>"+
							"<button id='btn_delete' data-idorder='"+value.idOrder+"'>Xóa đơn hàng</button>"+
							"<br>"+
							"<button id='btn_details' data-idorder='"+value.idOrder+"'>chi tiết đơn hàng</button>"+
							"</td>"+
							"</tr>"
							);
					}
				});
			}
		});
	}

	showList();

	// chuyển qua  trang details
	$(document).on("click", "#btn_details", function(e){
		e.preventDefault();
		var idOrder = $(this).data('idorder');
		window.location = "?mod=order&act=details&idOrder="+idOrder;
	});	

	//show details
	var idOrder = $_GET['idOrder'];
	$.ajax({
		url:  basicUrl+"RestAPI/order/read_details.php?id="+idOrder,
		type: "GET",
		success: function(data){
			$.each(data, function(key, value){
				if(!isNaN(key)){
					$("#details_order #idOrder").val(value.idOrder);
					$("#details_order #dateDelivery").val(value.dateDelivery);
					$("#details_order #dateOrder").val(value.dateOrder);
					$("#details_order #idOrder").val(value.idOrder);
					$("#details_order #status").val(value.status);
					$("#details_order #quantityOrder").val(value.quantityOrder);
					$("#details_order #discount").val(value.discount);

					$("#details_order #idUser").val(value.idUser);
					$("#details_order #lastName").val(value.lastName);
					$("#details_order #firstName").val(value.firstName);
					$("#details_order #address").val(value.address);
					$("#details_order #sex").val(value.sex);
					$("#details_order #phone").val(value.phone);

					$("#details_order #idProduct").val(value.idProduct);
					$("#details_order #productName").val(value.productName);
					$("#details_order #productUnitPrice").val(value.productUnitPrice);
					$("#details_order #dateIn").val(value.dateIn);
					$("#details_order #productDescription").val(value.productDescription);
					$("#details_order #productSold").val(value.productSold);

				}
			});
		}
	});

	// xử lý status
	

	
	$(document).on("click", "#new_order", function(e){
		e.preventDefault();
		var new_status = $(this).data("status");
		var idOrder = $(this).data("idorder");
		var quantityOrder = $(this).data("quantity");
		var idQuantity = $(this).data("idquantity");
		console.log("sdsd"+idOrder)
		var jsonobj = JSON.stringify({
			idOrder: idOrder,
			status: new_status,
			quantityOrder: quantityOrder,
			idQuantity: idQuantity,
			flag: 1
		});
		//console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/order/update_status.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				console.log("đã update thành công");
				showList();
			},
			error: function(){
				console.log("Lỗi");
			}
		});
	});
	$(document).on("click", "#done_order", function(e){
		e.preventDefault();
		var new_status = $(this).data("status");
		var idOrder = $(this).data("idorder");
		var quantityOrder = $(this).data("quantity");
		var idQuantity = $(this).data("idquantity");
		var jsonobj = JSON.stringify({
			idOrder: idOrder,
			status: new_status,
			quantityOrder: quantityOrder,
			idQuantity: idQuantity,
			flag: 0
		});
		//console.log(jsonobj);
		$.ajax({
			url:  basicUrl+"RestAPI/order/update_status.php",
			type: "POST",
			data: jsonobj,
			success: function(data){
				console.log("đã update thành công");
				showList();
			},
			error: function(){
				console.log("Lỗi");
			}
		});
	});



	//delete
	$(document).on("click", "#btn_delete", function(e){
		e.preventDefault();
		var idOrder = $(this).data('idorder');
		//alert(idOrder);
		if(confirm("Xác nhận xóa "+idOrder+" ?")){
			$.ajax({
				url:  basicUrl+"RestAPI/order/delete.php?id="+idOrder,
				type: "GET",
				success: function(data){
					console.log('xóa order và orderdetails thành công');
					showList();
				}
			});
		}
	})



});