<?php 

$ma = $_POST['ma'];
$ly_do_huy_don = $_POST['ly_do_huy_don'];

include 'connect.php';

$sql = "update hoa_don 
set 
tinh_trang = '3',
ly_do_huy_don = '$ly_do_huy_don'
where 
ma = '$ma' and tinh_trang = 1";
mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:xem_hoa_don.php');