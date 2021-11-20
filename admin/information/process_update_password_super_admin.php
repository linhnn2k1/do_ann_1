<?php 
    require '../../connect.php';
    $ma = $_GET['ma'];
    $mat_khau_cu = $_POST['mat_khau_cu'];
    $mat_khau_moi = $_POST['mat_khau_moi'];
    $sql = "select * from admin where mat_khau = '$mat_khau_cu' and ma = '$ma'";
    $result = mysqli_query($connect,$sql);
    $dem = mysqli_num_rows($result);
    
    if($dem == 1){
        $sql = "update admin set mat_khau = '$mat_khau_moi' where ma = '$ma'";
        mysqli_query($connect,$sql);
        header("location:information_super_admin.php");
    }
    else{
        header("location:view_update_password_super_admin.php?loi=Mật khẩu cũ không đúng");
    }
    mysqli_close($connect);