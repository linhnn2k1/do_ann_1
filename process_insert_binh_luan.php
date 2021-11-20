<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$ma_san_pham = $_POST['ma'];
$noi_dung = $_POST['noi_dung'];
$ma_khach_hang = $_SESSION['ma_khach_hang'];
$thoi_gian = date("Y-m-d H:i:s");
include 'connect.php';
// die($thoi_gian);
$sql = "insert into binh_luan(ma_san_pham,ma_khach_hang,noi_dung,thoi_gian) values ('$ma_san_pham','$ma_khach_hang','$noi_dung','$thoi_gian')";

mysqli_query($connect,$sql);
mysqli_close($connect);

 header("Location: " . $_SERVER["HTTP_REFERER"]);
