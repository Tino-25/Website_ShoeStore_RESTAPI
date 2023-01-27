<div class="update-brand">
	<div class="title_top">
		<span>update Brand</span>
	</div>
	<div class="container">
		<form id="updateForm_brand">
			<input type="text" class="form-control" name="idBrand" id="idBrand" value="<?php echo $_GET['idBrand']; ?>">
			<div class="form-group col-md-12">
				<label for="brandName">Brand Name</label>
				<input type="text" class="form-control" name="brandName" id="brandName" placeholder="">
			</div>
			<div class="form-group col-md-12">
				<label for="brandDesc">Brand Desc</label>
				<input type="text" class="form-control" name="brandDesc" id="brandDesc" placeholder="">
			</div>
			<div class="form-group col-md-12">
				<label for="brandLogo">Brand Logo</label>
				<input type="text" class="form-control" name="brandLogo" id="brandLogo" placeholder="Hãy copy link image logo ở google rồi dán vào - đảm bảo logo luôn đúng">
			</div>
			
			<button type="submit" id="btn-update__brand" class="btn btn-primary">Send</button>
		</form>
	</div>
</div>