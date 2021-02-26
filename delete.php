<?php
	
	include_once "connect.php";

	$id = $_GET['id'];

	$sql = "DELETE FROM info_kh WHERE id ='$id'";
	$query = mysqli_query($conn, $sql);

	if($query) {
		header("location: ./admin.php");
	} else {
		echo "Xóa Thất Bại";
	}	
?>