<div class="update-category">
	<div class="title_top">
		<span>Cập nhật thông tin Category</span>
	</div>
	<div class="container">
		<form id="updateForm_category" enctype="multipart/form-data">
			<input type="text" id="idCategoryProduct" class="idCategory" name="idCategoryProduct" value="<?php echo $_GET['idCategoryProduct']; ?>">
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="categoryName">Category Name</label>
					<input type="text" class="form-control" name="categoryName" id="categoryName" placeholder="">
				</div>
				<div class="mb-3 form-group col-md-6">
					<label for="formFile" class="form-label">Chọn ảnh</label>
					<input type="file" name="categoryImage" id="input_file_category" class="form-control" >
				</div>
				<div class="mb-3 form-group col-md-6">
					<img id='categoryImage_show' class='img-showList' src=''>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="categoryDesc">Category Desc</label>
					<input type="text" class="form-control" name="categoryDesc" id="categoryDesc" placeholder="">
				</div>
			</div>
			
			<button type="submit" id="btn-update__category" class="btn btn-primary">Send</button>
		</form>
	</div>
</div>

