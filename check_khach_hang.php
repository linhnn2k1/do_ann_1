<?php 
	session_start();
	if(empty($_SESSION['ten_khach_hang'])){
		header("location:khach_hang/dang_nhap_khach_hang.php?loi=Bạn phải đăng nhập đã");
	}
