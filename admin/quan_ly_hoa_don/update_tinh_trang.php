<?php 

$ma = $_GET['ma'];
$tinh_trang = $_GET['tinh_trang'];

include '../../connect.php';

$sql = "update hoa_don 
set 
tinh_trang = '$tinh_trang'
where 
ma = '$ma' and tinh_trang = 1";

mysqli_query($connect,$sql);
mysqli_close($connect);

header("location:". $_SERVER["HTTP_REFERER"]);