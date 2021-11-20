<?php

$ten_nha_san_xuat = $_POST['ten_nha_san_xuat'];
include '../../connect.php';
$sql_check = "select * from nha_san_xuat where ten = '$ten_nha_san_xuat'";
$result = mysqli_query($connect, $sql_check);
$dem = mysqli_num_rows($result);

if($dem == 1){
	header('location:view_insert.php?loi=Nhà sản xuất đã tồn tại!');
} else {
	$sql = "insert into nha_san_xuat(ten) values ('$ten_nha_san_xuat')";
	mysqli_query($connect,$sql);
	header('location:index.php');
}
mysqli_close($connect);
