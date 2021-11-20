<?php 

$ma_san_pham = $_GET['ma'];
$kieu = $_GET['kieu'];

session_start();

if($kieu=='tru'){
	if($_SESSION['gio_hang'][$ma_san_pham]>1){
		$_SESSION['gio_hang'][$ma_san_pham]--;
	} else {
		unset($_SESSION['gio_hang'][$ma_san_pham]);
	}
} else { 
	if ($_SESSION['gio_hang'][$ma_san_pham] < 10) {
	$_SESSION['gio_hang'][$ma_san_pham]++;
}
}

header('location:xem_gio_hang.php');
