<?php

$ma = $_POST['ma'];
$trang_thai_khach_hang = $_POST['trang_thai_khach_hang'];

require '../../connect.php';

$sql = "update khach_hang 
set
trang_thai = '$trang_thai_khach_hang'
where 
ma = '$ma'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');