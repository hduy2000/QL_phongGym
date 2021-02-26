<?php
require_once('dbhelp.php');
$id= $_GET['id'];
	$sql= "delete from login where user='$id'";
execute($sql);
	header("location:add_emp.php");
?>