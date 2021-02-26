<?php
require_once('dbhelp.php');
if (isset($_POST['sub'])) {
	$user = $_POST['user'];
	$password = $_POST['password'];
	$chucvu = $_POST['chucvu'];
	$sql="insert into login(user, password,chucvu) values('$user','$password','$chucvu' )";
	execute($sql);
}if (isset($sql)) {
	echo "Thêm Thành Công";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	
</head>
<body>
	<table class="table dark">
		<tr>
			<td>Stt</td>
			<td>User</td>
			<td>Chức vụ</td>
			<td>Xóa</td>
		</tr>
		<?php
			$i=1;
			$sql = "select * from login where chucvu ='nhanvien'";
			$result = executeresult($sql);
			foreach ($result as $res) {
				echo'
				<tr>
					<td>'.($i++).'</td>
					<td>'.$res['user'].'</td>
					<td>'.$res['chucvu'].'</td>
					<form>
					<td><button class="btn btn-success"><a href="delete_user.php?id='.$res['user'].'" style="color:#fff;">xóa</a></button></td>
					</form>
				</tr>
				';
			}
		?>
	</table>
<table class="table">
	<tr>
		<td>User</td>
		<td>Password</td>
		<td>Chức Vụ</td>
	</tr>
	<form method="POST">
		<tr>
			<td><input type="email" name="user" placeholder="Nhập người dùng" class="form-control"></td>
			<td><input type="text" name="password" placeholder="Nhập mật khẩu" class="form-control" required="true"></td>
			<td><select class="form-control" name="chucvu">
				<option value="nhanvien">Nhân Viên</option>
				<option value="admin">Admin</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="3"><input type="submit" name="sub" class="btn btn-success"></td>
		</tr>
	</form>
</table>

</body>
</html>