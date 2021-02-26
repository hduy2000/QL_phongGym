<?php
session_start();
require_once('dbhelp.php');
require_once('config.php');
$date = getdate(date("U"));
$ktra = "$date[year]-$date[mon]-$date[mday]";
if (isset($_POST['sub']) && isset($_SESSION['login'])) {
	$makh = $_POST['makh'];
	$tenkh = $_POST['tenkh'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$loaikh = 'thuong';
	$mathe = $_POST['code'];
	$ngaybd = "$date[year]-$date[mon]-$date[mday]";
	$ngaykt = $_POST['ngaykt'];
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die("connect fail");
	$maxs = "SELECT MAX(sothe) AS LargestPrice FROM member";
	$resultset = mysqli_query($conn, $maxs);
	$row = mysqli_fetch_array($resultset);
	$sothe = $row['LargestPrice'] + 1;
	$sql = "INSERT into info_kh(makh,tenkh,sdt,diachi,loaikh) values('$makh','$tenkh','$sdt','diachi','loaikh' )";
	$result = "INSERT into member(makh,mathe,sothe,ngaybd,ngaykt) values('$makh','$mathe','$sothe','$ngaybd','$ngaykt' )";
	execute($sql);
	execute($result);
}
if (isset($_POST['back'])) {
	header("location:index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Thêm khách hàng</title>
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
				<div class="add col-8">
					<h3 style="text-align: center;">Thêm thành viên</h3>
					<div class="row">
						<div class="col-6">
							<form method="POST">

							Mã khách hàng:<input type="text" name="makh" class="form-control" placeholder="Mã KH:">
							Tên khách hàng:<input type="text" name="tenkh" class="form-control" placeholder="Tên KH:">
							Số điện thoại<input type="text" name="sdt" class="form-control" placeholder="SỐ ĐIỆN THOẠI:">
							Địa chỉ<input type="text" name="diachi" class="form-control" placeholder="ĐỊA CHỈ:">
									<label >Chọn dịch vụ:</label>
									<select name="code" class="form-control">
										<?php  
											$sql = "select * from tt_the";
											$shows = executeresult($sql);
											foreach ($shows as $show) {	
											$mahd = $show['mathe'];
										?>
									  <option value="<?=$show['mathe']?>"><?=$show['tenthe']?></option>
									  <?php } ?>
									</select>
									<p>Từ ngày:</p>
								to:<input style="width: 30%" type="text" name="ngaybd" value="<?=$ktra?>">
								to:<input style="width: 40%" type="date" name="ngaykt">
							
						</div>
						<div class="col-6">
							<div class="col-12"><img src="images/php-logo.png" style="height: 150px"></div>
							<div class="col-12">
								Ngày đăng kí:<input type="text" name="ngaydk" value="<?=$ktra?>" class="form-control">
								Email:<input type="text" name="email" placeholder="nhập email(không bắt buộc)" class="form-control">
								Ghi Chú:<input type="text" name="email" placeholder="ghi chú(không bắt buộc)" class="form-control">
							
							</div>
						</div>
						<div class="xacnhan col-12">
							<button class="btn btn-primary" name="back" >Trở về</button>
							<button class="btn btn-primary" name="sub">Đăng kí</button>
						</div>
						</form>
					</div>
				</div>

			</div>
		</div>
		<div class="footer col-12">
			<p>website quản lý phòng gym</p><p>https//:qlphonggym.com-tel:12334555</p>
		</div>
	</div>
</div>
</body>
</html>