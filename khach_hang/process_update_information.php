<?php 
include 'check_khach_hang.php'; 
include 'check_trang_thai_tai_khoan.php';
?>
<?php

$ma = $_POST['ma'];
$ten_khach_hang = $_POST['ten_khach_hang'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$dia_chi = $_POST['dia_chi'];
$sdt = $_POST['sdt'];

require '../connect.php';

$sql = "update khach_hang
set 
ten_khach_hang = '$ten_khach_hang',
ngay_sinh = '$ngay_sinh',
gioi_tinh = '$gioi_tinh',
dia_chi = '$dia_chi',
sdt = '$sdt'
where 
ma = '$ma'";

session_start();
$_SESSION['ten_khach_hang'] = $ten_khach_hang;
 
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:../information_khach_hang.php');
?>