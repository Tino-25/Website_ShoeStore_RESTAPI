<table id="load-table">
	<tr>
		<td></td>
	</tr>
</table>
<div class="title_top">
	<span>Quản lý user</span>
</div>
<span style="display: none;" id="gettext"><?php echo $_SESSION['idUser']; ?></span>
<a href="?mod=user&act=add" class="btn btn-primary">Thêm user</a>
<table class="table">
	<thead class="thead-light">
		<tr>
			<th scope="col">#</th>
			<th scope="col">Quyen</th>
			<th scope="col">Fullname</th>
			<th scope="col">Email</th>
			<th scope="col">Password</th>
			<th scope="col">Address</th>
			<th scope="col">Sex</th>
			<th scope="col">Phone</th>
			<th scope="col">Action</th>
		</tr>
	</thead>
	<tbody id="list-user">
		<!-- dữ liệu show ở đây - show bằng js -->
		<script type="text/javascript">
			var curent_admin = document.getElementById("gettext")
			var curent_admin = curent_admin.textContent
			console.log("dsdsdsd"+curent_admin)
		</script>
	</tbody>
</table>
