<?php
	include_once("connect.php");
	session_start();
	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$password = $_POST['password'];
		$sql = "SELECT * FROM login where user = '$user' and password = '$password' ";
		$query = mysqli_query($conn,$sql);
		$row= mysqli_fetch_assoc($query);
		print_r($row);
		if (mysqli_num_rows($query) == 0){
			echo "Tài khoản hoặc mật khẩu không chính xác!";
		}
		else if ($row['position']== 1) {
			# code...
			header("location:admin.php");
		}
		else{
			header("location:giahan.php");
		}


	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Modern Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="css/style_login.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<!-- //css files -->
<!-- web-fonts -->
<link href="//fonts.googleapis.com/css?family=Snippet" rel="stylesheet"><!--online fonts-->
<!-- //web-fonts -->
</head>
<body>
<div data-vide-bg="video/keyboard">
	<div class="main-container">
		<!--header-->
		<div class="header-w3l">
			<h1>Quản lý phòng Gym</h1>
		</div>
		<!--//header-->
		<!--main-->
		<div class="main-content-agile">
			<div class="w3ls-pro">
				<h2>Login</h2>
			</div>
			<div class="sub-main-w3ls">	
				<form method="POST">
					<input placeholder="Username" name="user" type="email">
					<span class="icon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
					<input  placeholder="Enter Password" name="password" type="password">
					<span class="icon2"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
					<div class="checkbox-w3">
						<span class="check-w3"><input type="checkbox" />Lưu mật khẩu</span>
						<a href="index.php"> Trang Chủ </a>
						<div class="clear"></div>
					</div>
					<div class="social-icons"> 
							<ul>
								<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li> 
							</ul>  
						</div>
					<input type="submit" name="submit">
				</form>
			</div>
		</div>
		<!--//main-->
		<!--footer-->
		<div class="footer">
			<p></p>
		</div>
		<!--//footer-->
	</div>
</div>
<!-- js -->
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script><!--common-js-->
<script src="js/jquery.vide.min.js"></script><!--video-js-->
<!-- //js -->
</body>
</html>