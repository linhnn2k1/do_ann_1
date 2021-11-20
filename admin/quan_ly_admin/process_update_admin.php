<?php

$ma = $_GET['ma'];
$ten_admin = $_POST['ten_admin'];
$mat_khau = $_POST['mat_khau'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$cmnd = $_POST['cmnd'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];

require '../../connect.php';

$sql = "update admin 
set 
ten_admin = '$ten_admin', 
mat_khau = '$mat_khau',
ngay_sinh = '$ngay_sinh',
gioi_tinh = '$gioi_tinh',
cmnd = '$cmnd',
sdt = '$sdt',
dia_chi = '$dia_chi',
where 
ma = '$ma'";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');