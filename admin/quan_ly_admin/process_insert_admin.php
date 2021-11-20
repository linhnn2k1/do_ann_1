<?php

$ten_admin = $_POST['ten_admin'];
$email = $_POST['email'];
$mat_khau = $_POST['mat_khau'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$cmnd = $_POST['cmnd'];
$sdt = $_POST['sdt'];
$dia_chi = $_POST['dia_chi'];

include '../../connect.php';
$sql_check = "select * from admin where email = '$email'";
$result_check = mysqli_query($connect,$sql_check);
$dem = mysqli_num_rows($result_check);
if($dem > 0){
     header("location:view_insert_admin.php?loi=Email đã có người sử dụng");
}
else{
$sql = "insert into admin(ten_admin,email,mat_khau,ngay_sinh,gioi_tinh,cmnd,sdt,dia_chi,cap_do) values ('$ten_admin','$email','$mat_khau','$ngay_sinh','$gioi_tinh','$cmnd','$sdt','$dia_chi','0')";

mysqli_query($connect,$sql);
mysqli_close($connect);
}
header('location:index.php');