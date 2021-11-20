<?php
session_start();
$ma = $_GET['ma'];
require '../../connect.php';

$sql = "delete from binh_luan
where
ma = '$ma'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');