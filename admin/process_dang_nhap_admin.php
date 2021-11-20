<?php 
    require '../connect.php';
    $email = $_POST["email"];
    $mat_khau = $_POST["mat_khau"];
    $sql = "select * from admin where email = '$email' and mat_khau = '$mat_khau'";
    $result = mysqli_query($connect,$sql);
    $dem = mysqli_num_rows($result);
    if($dem == 1){
        session_start();
        $each = mysqli_fetch_array($result);
        $_SESSION["ma_admin"] = $each["ma"];
        $_SESSION["ten"] = $each["ten"];
        $_SESSION["cap_do"] = $each["cap_do"];
        $_SESSION["admin"] = 1;
        
        header("location:view_admin/index.php");
    }
    else{
        header("location:index.php?loi=Tên email hoặc mật khẩu không đúng");
    }
    mysqli_close($connect);