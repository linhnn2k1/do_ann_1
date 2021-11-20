<?php
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
     
    }
}