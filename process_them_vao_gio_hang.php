<?php
include 'connect.php';
$ma_san_pham = $_GET['ma'] ?? '';
$sql = "select * from san_pham where ma = '$ma_san_pham'";
$result = mysqli_query($connect,$sql);
session_start();

if(empty($_SESSION['ten_khach_hang'])){
	header("location:khach_hang/dang_nhap_khach_hang.php?loi=Bạn phải đăng nhập đã!");
} else {
	if(mysqli_num_rows($result) == 1){
		if(isset($_SESSION['gio_hang'][$ma_san_pham])){
			if($_SESSION['gio_hang'][$ma_san_pham] =10){
				echo '<script>alert("Số lượng sản phẩm đã giới hạn!");
			location.replace("index.php");</script>';
			}
		else{
			$_SESSION['gio_hang'][$ma_san_pham]++;
			echo '<script>alert("1 sản phẩm được thêm vào giỏ hàng");
			location.replace("index.php");</script>';
		}
		} 
		else {
			$_SESSION['gio_hang'][$ma_san_pham] = 1;
			echo '<script>alert("1 sản phẩm được thêm vào giỏ hàng");
			location.replace("index.php");</script>';
		}
	} else {
	echo '<script>alert("Lỗi!!!");
	location.replace("index.php");</script>';
}
}