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
	<title>Gia Hạn </title>
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
					<h3 style="text-align: center;">gia hạn thêm tháng</h3>
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