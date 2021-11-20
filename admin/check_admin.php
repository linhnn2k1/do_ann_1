<?php 
	session_start();
	if(empty($_SESSION['ma_admin'])){
		header("location:../index.php?loi=Bạn phải đăng nhập đã");
	}