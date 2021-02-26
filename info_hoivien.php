<?php
require_once('dbhelp.php');
require_once('config.php');
$date = getdate(date("U"));
$ktra = "$date[year]-$date[mon]-$date[mday]";
$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die("connect fail");
$result = "SELECT COUNT(id) AS count FROM info_kh;";
$resultset = mysqli_query($conn, $result);
$row = mysqli_fetch_array($resultset);
$count = $row['count'];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thông tin hội viên</title>
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
    	body{
    		font-size: 90%;
    	}
    	.banner{
    		width: 100%;
    		height: 500px;
    		background-image: url('images/banner.png');
    		background-size: cover;
    	}
    	.mains{
    		text-align: center;
    	}
    	.mains ul li{
    		list-style: none;
    		float: right;
    		text-align: center;
    	}
    	.mains ul li a{
    		text-align: center;
    		margin-right: 1rem;
    		font-size: 20px;
    		color: black;
    	}
    	.mains .active{
    		color: red;
    	}
    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<a class="navbar-branch" href="index.php">
			<h4 style="color: red;margin-left: 18rem"><strong>ATTTGYM</strong></h4>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" 
			data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto" style="margin-right: 20rem">
				<li class="nav-item">
					<a class="nav-link active" href="index.php">Trang Chủ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="info_hoivien.php">Thông tin hội viên</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="service.php">Bảng dịch vụ</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.php">Đăng nhập</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="add_kh.php" style="background-color: red">Đăng kí thành viên</a>
				</li>
			</ul>
		</div>
	</div>
</nav>
				<div class="giahan col-8">
							<div class="caculator col-12">
								<table class="table">
									<thead>
										<tr>
											<td colspan="6">Có tổng <?=$count?> thành viên</td>
										</tr>
									<tr>
										<td>Xóa</td>
										<td>Số điện thoại</td>
										<td>Mã Hội viên</td>
										<td>Tên Hội Viên</td>
										<td>SDT</td>
										<td>Địa chỉ</td>
										<td>Ảnh</td>
									</tr>
								</thead>
									<?php
									$sql = "select * from info_kh order by id limit 8 offset 0";
									$shows = executeresult($sql);
									$i =1;
									foreach ($shows as $sh) {
										echo'
										<tr>
											<td><button class="btn btn-link"><a style="color:#fff" href="delete_member.php?id='.$sh['id'].'">xóa</a></button></td>
											<td>'.($i++).'</td>
											<td>'.$sh['makh'].'</td>
											<td>'.$sh['tenkh'].'</td>
											<td>'.$sh['sdt'].'</td>
											<td>'.$sh['diachi'].'</td>
											<td>'.$sh['anh'].'</td>
											</tr>
										';
									}
									?>
								</table>
							</div>
				</div>

			</div>
		</div>
		<div class="footer col-12">
			<p>Website quản lý phòng gym</p><p>https//:qlphonggym.com-tel:0353393444</p>
		</div>
	</div>
</div>
</body>
</html>