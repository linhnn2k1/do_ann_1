<?php
require '../../connect.php';
$ma = $_POST['ma'];
$ten_nha_san_xuat = $_POST['ten_nha_san_xuat'];

$sql_check = "select * from nha_san_xuat where ten = '$ten_nha_san_xuat'";
$result = mysqli_query($connect, $sql_check);
$dem = mysqli_num_rows($result);

if($dem == 1){
	header("location:". $_SERVER["HTTP_REFERER"]);
} else {
	$sql = "update nha_san_xuat set ten = '$ten' where ma = '$ma'";
	mysqli_query($connect,$sql);
	header('location:index.php');
}

mysqli_close($connect);