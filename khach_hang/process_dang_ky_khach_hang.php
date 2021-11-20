<?php
include '../connect.php';
$ten_khach_hang = $_POST['ten_khach_hang'];
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$dia_chi = $_POST['dia_chi'];
$sdt = $_POST['sdt'];
$sql_check = "select * from khach_hang where email = '$email'";
$result_check = mysqli_query($connect,$sql_check);
$dem = mysqli_num_rows($result_check);
if($dem > 0){
     header("location:dang_ky_khach_hang.php?loi=Email đã có người sử dụng");
}
else{
     $sql = "
     insert into khach_hang(ten_khach_hang,email,mat_khau,ngay_sinh
     ,gioi_tinh,dia_chi,sdt,trang_thai) values ('$ten_khach_hang','$email','$mat_khau','$ngay_sinh','$gioi_tinh','$dia_chi','$sdt','1')";
     $result = mysqli_query($connect,$sql); 
     header('location:dang_nhap_khach_hang.php'); 
}
mysqli_close($connect);