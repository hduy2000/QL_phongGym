<?php
session_start();
require_once('dbhelp.php');
$id = $_GET['id'];
if (isset($_SESSION['login'])) {
$sql = 'delete from info_kh where id = '.$id;
}
if (!isset($_SESSION['login'])) {
	header("location:info_hoivien.php");
}
execute($sql);
header("location: info_hoivien.php");
?>