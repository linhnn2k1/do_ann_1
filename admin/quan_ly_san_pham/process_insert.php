<?php

$ten_san_pham = $_POST['ten_san_pham'];
$gia = $_POST['gia'];
$mo_ta = $_POST['mo_ta'];
$anh = $_FILES['anh'];
$ma_nha_san_xuat = $_POST['ma_nha_san_xuat'];

$thu_muc_anh = '../../image/';

$duoi_anh = explode('.', $anh['name'])[1];
$ten_anh = time() . '.' . $duoi_anh;
$duong_dan_anh = $thu_muc_anh . $ten_anh;
move_uploaded_file($anh['tmp_name'],$duong_dan_anh);

include '../../connect.php';

$sql = "insert into san_pham(ten_san_pham,gia,mo_ta,anh,ma_nha_san_xuat) values ('$ten_san_pham','$gia','$mo_ta','$ten_anh','$ma_nha_san_xuat')";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');
