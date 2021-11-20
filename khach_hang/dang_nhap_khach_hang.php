<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Đăng Nhập Khách Hàng</title>
  <style>
    *{
      font-family: arial;
    }
    body{
      margin: auto;
      background: black;
    }
    .box_form{
      position: absolute;
      top: 20px;
      left: 430px;
      background-color: white;
      width: 500px;
      height: 450px;
      border: 1px solid black;
      text-align: center;
      color: red;
    }
    .form{
      padding: 10px;
      color: black;
      font-size: 20px;

    }
    input{
      font-size: 20px;
      border: 0,1px  black;
      height: 25px;
      margin: 15px;
    }
    h1{
      text-align: center;
      font-size: 30px;
    }
    #dang_ki{
      text-decoration: none;
      font-size: 15px;
      padding: 10px;
      position: absolute;
      top: 416px;
      left: 120px;
      color:#696969;
    }
    #submit{
      width: 250px;
      background-color: black;
      height: 40px;
      color:white;
      border: 1px solid black;
      font-size: 20px;
      cursor: pointer;
    }
    .show_pass{
      position: absolute;
      right: 20px;
      z-index: 99;
      width: 17px;
    }
    input{
      cursor: pointer;
    }
  </style>
</head>
<body>
<?php
if(isset($_COOKIE['ma_khach_hang'])){
$ma = $_COOKIE['ma_khach_hang'];
$ten_khach_hang = $_COOKIE['ten_khach_hang'];

session_start();
$_SESSION['ma_khach_hang'] = $ma; 
$_SESSION['ten_khach_hang'] = $ten_khach_hang; 

header('location:../index.php');
} 
?>
<div class="dang_nhap_khach_hang">
  <div class="box_form">
    <?php if(isset($_GET["loi"])){?>
      <h1><?php echo $_GET["loi"] ?></h1>
    <?php } ?>
    <div class="form">
      <h1>Đăng Nhập</h1>
      <form action="process_dang_nhap_khach_hang.php" method="post">
        <table width="100%">
          <tr>
            <td>
              <label for="email"> 
                Email:
              </label>
            </td>
            <td>
              <input size="30px" type="text" id="email" name="email" placeholder="nhập địa chỉ email" autocomplete="off"><br>
            </td>
          </tr>
          <tr>
            <td>
              <label for="mat_khau">
                Mật Khẩu:
              </label>
            </td>
            <td>
              <input size="30px" type="password" id="mat_khau" name="mat_khau" placeholder="nhập mật khẩu">
              <input class="show_pass" type="checkbox" onclick="show_pass()">
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <input style="width: 17px;" type="checkbox" name="ghi_nho">
              <span> Ghi nhớ đăng nhập</span>   
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <button id="submit" >
                Đăng nhập
              </button>
            </td>
          </tr>
        </table>
      </form>
    </div>

    <div id="dang_ki">Bạn mới đến shop của tôi? <a href="dang_ky_khach_hang.php">đăng ký</a></div>
  </div>
</div>

<script>
  function show_pass() {
    var x = document.getElementById("mat_khau");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</body>
</html>