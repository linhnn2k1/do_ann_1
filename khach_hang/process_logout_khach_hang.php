<?php 

session_start();
unset($_SESSION['ma_khach_hang']);
unset($_SESSION['ten_khach_hang']);

setcookie('ma_khach_hang','',(-1),'/');
setcookie('ten_khach_hang','',(-1),'/');

header('location:../index.php');