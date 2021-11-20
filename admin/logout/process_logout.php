<?php 

session_start();
unset($_SESSION['ma_admin']);

header("location:../index.php");