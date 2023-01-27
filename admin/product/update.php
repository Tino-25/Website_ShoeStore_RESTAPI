<div id="formUpdate__product">
	<div class="title_top">
		<span>Chỉnh sửa product</span>
	</div>
	<div class="content-wrap" style="padding: 0 50px;">
		<form id="form">
			<input type="text" id="idProduct" name="idProduct">
			<input type="text" id="idQuantity" name="idQuantity">
			<div class="row">
				<div class="col-6">
					<table>
						<tr>
							<td>idCategoryProduct</td>
							<td>
								<select name="idCategoryProduct" id="idCategoryProduct">
								</select>
							</td>
						</tr>
						<tr>
							<td>idBrand</td>
							<td>
								<select name="idBrand" id="idBrand">
								</select>
							</td>
						</tr>
						<tr>
							<td>Product Name</td>
							<td><input type="text" name="productName" id="productName"></td>
						</tr>
						<tr>
							<td>Unit Price</td>
							<td><input type="text" name="productUnitPrice" id="productUnitPrice"></td>
						</tr>
						<tr>
							<td>Date in</td>
							<td><input type="text" name="dateIn" id="dateIn"></td>
						</tr>
						<tr>
							<td>Description</td>
							<td><input type="text" name="productDescription" id="productDescription"></td>
						</tr>
						<tr>
							<td>productSold</td>
							<td><input type="text" name="productSold" id="productSold"></td>
						</tr>
					</table>
				</div>
				<div class="col-6">
					<table>
						<tr>
							<td>Color</td>
							<td>
								<select name="idColor" id="idColor">
								</select>
							</td>
						</tr>
						<tr>
							<td>Size</td>
							<td>
								<select name="idSize" id="idSize">
								</select>
							</td>
						</tr>
						<tr>
							<td>Quantity</td>
							<td><input type="text" name="quantity" id="quantity"></td>
						</tr>
					</table>
				</div>
			</div>
			<button type="submit" id="btnUpdate_product" class="btn btn-primary">Update</button>
		</form>
	</div>
</div>