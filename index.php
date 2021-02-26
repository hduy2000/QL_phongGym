<?php
require_once('dbhelp.php');
$date = getdate(date("U"));
$makh ='';
$anh ='';
$name='';
$mathe='';
$ngaykt='';
$ngaybd='';
$tenthe='';
$menhgia='';
if (isset($_GET['sub']) && $_GET['search'] !='') {
	$search = $_GET['search'];
	$sql = "select * from info_kh where makh = '$search'";
	$shows = executeresult($sql);
	foreach ($shows as $show) {
		$makh = $show['makh'];
		$anh = $show['anh'];
		$name = $show['tenkh'];
		$results = "select * from member where makh='$makh'";
		$resultset = executeresult($results);
		foreach ($resultset as $result) {
			$mathe = $result['mathe'];
			$ngaykt = $result['ngaykt'];
			$ngaybd = $result['ngaybd'];
			$sqls = "select * from tt_the where mathe='$mathe'";
			$cards =  executeresult($sqls);
			foreach ($cards as $card) {
				$tenthe = $card['tenthe'];
				$menhgia = $card['menhgia'];
			}
		}
	}
}
$ktra = "$date[year]-$date[mon]-$date[mday]";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trang Chủ</title>
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
	<div class="banner">
	</div>
	<div class="row" style="min-height: 200px; margin-top: 10px">
		<div class="col-3">
			
		</div>
		<div class="col-5">
	<div class="mains">
		<div class="row">
		<div class="col-12">
		<ul>
			<li><a href="#">Royer</a></li>
			<li><a href="#">Superior</a></li>
			<li><a href="#">Citipassport</a></li>
			<li><a href="#">Classic plus</a></li>
			<li><a href="#" class="active">Classic</a></li>
		</ul>
		</div>
		<div class="col-12">
		<div class="row">
			<div class="col-5" style="border-right: 1px solid black"><br>
				<h5 style="color: red"> Tìm kiếm thông tin hội viên</h5>
				<form method="GET">
					<input type="text" name="search" placeholder="Nhập mã khách hàng" style="width: 15rem">

					<input type="submit" name="sub" value="Tìm kiếm">
				</form>
					<div class="time">
						<div class="time_hours">
						<?php
							echo "$date[hours]: $date[minutes]";
						?>
						</div>
						<div class="weekday">
							<?php
							echo "$date[weekday]";
						?>
						</div>
						<div class="mday">
						<?php
							echo "$date[mday]/$date[mon]/$date[year]";
						?>
						</div>
					</div>
			</div>
			<div class="col-7" style="font-size: 19px;margin-top: 15px">
						<table class="table">
							<tr>
								<td>Tên thành viên</td>
								<td style="color: red"><?=$name?></td>
							</tr>
							<tr>
								<td>Gói dịch vụ</td>
								<td style="color: red"><?=$tenthe?></td>
							</tr>
							<tr>
								<td>Ngày đăng kí:</td>
								<td><?=$ngaybd?></td>
							</tr>
							<tr>
								<td>Giá dịch vụ</td>
								<td><?=$menhgia?></td>
							</tr>
							<tr>
								<td>Ngày bắt đầu</td>
								<td><?=$ngaybd?></td>
							</tr>
							<tr>
								<td>Ngày kết thúc:</td>
								<td><?=$ngaykt?></td>
							</tr>
						</table>
			</div>
		</div>
		</div>
		</div>
	</div>
</div>
<div class="col-4">
	<img src="<?=$anh?>" style="width: 300px;border-radius: 25px">
</div>
</div>
</body>
</html>