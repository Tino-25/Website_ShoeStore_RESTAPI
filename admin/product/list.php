
<div class="title_top">
	<span>Quản lý Product</span>
</div>
<a href="?mod=product&act=add" class="btn btn-primary">Thêm Product</a>
<table class="table">
	<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
<!-- 			<th scope="col">idCate</th>
			<th scope="col">idBrand</th>
			<th scope="col">idQuantity</th>
 -->			<th scope="col">productName</th>
			<th scope="col">Image</th>
			<th scope="col">productUnitPrice</th>
			<th scope="col">dateIn</th>
			<th scope="col">productDescription</th>
			<th scope="col">productSold</th>
			<th scope="col">action</th>
		</tr>
	</thead>
	<tbody id="list-product">
		<!-- Dữ liệu show ở đây - show bằng JS -->
	</tbody>
</table>



<!-- Modal  -->

<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog modal-lg">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 id="modal-title" class="modal-title">Quản lý hình ảnh - product </h4>
			</div>
			<div class="modal-body">
				<div class="listImage__wrap">
					<!-- <div class="image_item width-20"> 
						<img src="http://localhost:8080/WORK_SPACE/dacn1_fashion/admin/assets/img/logo_giaphat.jpg" alt="ảnh sản phẩm">
						<button id="delete">Xóa ảnh này</button>
					</div> -->
				</div>
				<!-- body of modal -->
				<form id='form_img' enctype="multipart/form-data">
					<div class="form-group">
						<label for="imageProduct">Chọn ảnh để thêm</label>
						<input type="file" class="form-control-file" id="imageProduct">
						<input type="text" id="idProduct">
					</div>
					<button id='add_image'>Thêm hình ảnh</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>

	</div>
</div>