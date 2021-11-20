<?php
session_start();
if (isset($_SESSION["ma_khach_hang"])) {
  $ma_khach_hang=$_SESSION["ma_khach_hang"];
  require'connect.php';
  $sql = "select trang_thai from khach_hang where ma ='$ma_khach_hang'";
  $result=mysqli_query($connect,$sql);
   while($row = mysqli_fetch_array($result)){
        $trang_thai = $row['trang_thai'];
    }


    if($trang_thai == 0){
        header("location:khach_hang/dang_nhap_khach_hang.php?loi=Tài Khoản Của Bạn Bị Khóa ");
        unset($_SESSION['ma_khach_hang']);
        unset($_SESSION['ten_khach_hang']);

        setcookie('ma_khach_hang','',(-1),'/');
        setcookie('ten_khach_hang','',(-1),'/');
    }
    else{ 
     date_default_timezone_set('Asia/Ho_Chi_Minh');

$ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
$sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
$dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];

$ma_khach_hang = $_SESSION['ma_khach_hang'];
$tinh_trang = 1; //đang chờ xử lý
$thoi_gian_mua = date("Y-m-d H:i:s");

include 'connect.php';

$sql = "insert into hoa_don(ma_khach_hang,ten_nguoi_nhan,sdt_nguoi_nhan,dia_chi_nguoi_nhan,tinh_trang,thoi_gian_mua) values ('$ma_khach_hang','$ten_nguoi_nhan','$sdt_nguoi_nhan','$dia_chi_nguoi_nhan','$tinh_trang','$thoi_gian_mua')";

mysqli_query($connect,$sql);

$sql = "select max(ma) from hoa_don";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);

$ma_hoa_don = $each['max(ma)'];

foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong) {
	$sql = "select gia from san_pham where ma = '$ma_san_pham'";
	$result = mysqli_query($connect,$sql);
	$each = mysqli_fetch_array($result);

	$gia = $each['gia'];

	$sql = "insert into hoa_don_chi_tiet
	(ma_hoa_don,ma_san_pham,so_luong,gia) values ('$ma_hoa_don','$ma_san_pham','$so_luong','$gia')";
	mysqli_query($connect,$sql);
}

unset($_SESSION['gio_hang']);

header('location:xem_gio_hang.php');
    }
}