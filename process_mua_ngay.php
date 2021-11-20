<?php
$ma_san_pham = $_GET['ma'];
session_start();

if(empty($_SESSION['ten_khach_hang'])){
	header("location:khach_hang/dang_nhap_khach_hang.php?loi=Bạn phải đăng nhập đã!");
} else {
	if(isset($_SESSION['gio_hang'][$ma_san_pham])){
	$_SESSION['gio_hang'][$ma_san_pham]++;
} else{
	$_SESSION['gio_hang'][$ma_san_pham] = 1;
}
header('location:xem_gio_hang.php');
}

