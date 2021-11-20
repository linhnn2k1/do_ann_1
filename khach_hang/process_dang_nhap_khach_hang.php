<?php 
    require '../connect.php';
    $email = $_POST["email"];
    $mat_khau = $_POST["mat_khau"];
    $sql = "select * from khach_hang where email = '$email' and mat_khau = '$mat_khau'";
    $result = mysqli_query($connect,$sql);
    $dem = mysqli_num_rows($result);

    if($dem == 1){
        //đếm nếu có bản ghi là 1 thì nhảy vào đây
            session_start();
            $each = mysqli_fetch_array($result);
            $_SESSION['ma_khach_hang'] = $each['ma'];
            $_SESSION['ten_khach_hang'] = $each['ten_khach_hang'];
            $_SESSION['trang_thai'] = $each['trang_thai'];

            if(isset($_POST['ghi_nho']) && $each['trang_thai'] == 1){
                setcookie('ma_khach_hang',$each['ma'],time() + (60*60*24*60), "/");
                setcookie('ten_khach_hang',$each['ten_khach_hang'],time() + (60*60*24*60), "/");
            }
            //kiểm tra tình trạng nếu bằng 0 thì bị khóa nếu khác 0 thì đăng nhập được
        if($each['trang_thai'] == 0){
            header("location:dang_nhap_khach_hang.php?loi=Tài khoản đã bị khóa");
            }
            else{
             header("location:../index.php");
            }
        }
    else{
            header("location:dang_nhap_khach_hang.php?loi=Tài khoản hoặc mật khẩu không đúng!");
        }
    mysqli_close($connect);