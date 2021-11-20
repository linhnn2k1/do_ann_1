<?php

$ma = $_POST['ma'];
$ten_admin = $_POST['ten_admin'];
$ngay_sinh = $_POST['ngay_sinh'];
$cmnd = $_POST['cmnd'];
$gioi_tinh = $_POST['gioi_tinh'];
$dia_chi = $_POST['dia_chi'];
$sdt = $_POST['sdt'];

require '../../connect.php';

$sql = "update admin
set 
ten_admin = '$ten_admin', 
ngay_sinh = '$ngay_sinh',
gioi_tinh = '$gioi_tinh',
cmnd = '$cmnd',
dia_chi = '$dia_chi',
sdt = '$sdt'
where 
ma = '$ma'";

session_start();
$_SESSION['ten_admin'] = $ten_admin;
 
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:information_super_admin.php');