<div class="add-user">
	<div class="title_top">
		<span>Thêm User</span>
	</div>
	<div class="container">
		<form id="addForm">
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="FirstName">First Name</label>
					<input type="text" class="form-control" name="firstName" id="FirstName" placeholder="">
				</div>
				<div class="form-group col-md-6">
					<label for="LastName">Last Name</label>
					<input type="text" class="form-control" name="lastName" id="LastName" placeholder="">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputEmail4">Email</label>
					<input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Password</label>
					<input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-4">
					<label for="Sex">Sex</label>
					<select name="sex" class="form-control" id="Sex">
						<option value="male">male</option>
						<option value="female">female</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="Phone">Phone</label>
					<input type="text" name="phone" class="form-control" id="Phone" placeholder="Phone">
				</div>
				<div class="form-group col-md-4">
					<label for="Division">Division</label>
					<select class="form-control" id="Division" name="idDivision">
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="inputAddress">Address</label>
				<input type="text" name="address" class="form-control" id="inputAddress" placeholder="1234 Main St">
			</div>
			<button type="submit" class="btn btn-primary" id="save-button">Send</button>
		</form>
	</div>
</div>