<?php 
include 'check_khach_hang.php'; 
include 'check_trang_thai_tai_khoan.php';
?>
<?php 
    require '../connect.php';
    $ma = $_GET['ma'];
    $mat_khau_cu = $_POST['mat_khau_cu'];
    $mat_khau_moi = $_POST['mat_khau_moi'];
    $sql = "select * from khach_hang where mat_khau = '$mat_khau_cu' and ma = '$ma'";
    $result = mysqli_query($connect,$sql);
    $dem = mysqli_num_rows($result);
    
    if($dem == 1){
        $sql = "update khach_hang set mat_khau = '$mat_khau_moi' where ma = '$ma'";
        mysqli_query($connect,$sql);
        header("location:../information_khach_hang.php");
    }
    else{
        header("location:../information_khach_hang.php?loi=Mật khẩu cũ không đúng");
    }
    mysqli_close($connect);
?>