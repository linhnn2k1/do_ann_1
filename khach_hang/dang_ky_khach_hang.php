<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Ký Khách Hàng</title>
        <style>
            *{
            font-family: Arial;
            }
            body{
            margin: auto;
            padding: auto;
            background: black;
            }
            .box_form{
                position: absolute;
                top: 20px;
                left: 430px;
                background-color: white;
                width: 500px;
                height: 800px;
                border: 1px solid black;
                text-align: center;
            }
            .form{
                padding: 30px;
                color: black;
                font-size: 20px;
                position: absolute;
                top: 50px;
            }
            input{
                font-size: 17px;
                border: 0,1px  black;
               /*  border-radius: 10px; */
                height: 25px;
                margin: 17px;
                padding: 4px 38px 4px 15px;
            }
            h1{
                color: red;
                text-align: center;
                font-size: 30px;
                color: red;
            }
            .box_form h2{
                color: black;
                position: absolute;
                top: 20px;
                left: 125px;
            }
            #dangky{
                width: 400px;
                background-color: black;
                height: 40px;
                color:white;
                border: 1px solid black;
                font-size: 20px;
                border-radius: 2px;
                position: absolute;
                left:55px;
            }
            td{
                text-align: left;
            }
            tr{
                text-align: center;
            }
            .span_error{
                color: red;
                font-size: 20px;
            }
            #dang_nhap{
                text-decoration: none;
                font-size: 18px;
                padding: 10px;
                position: absolute;
                top:769px;
                left: 110px;
                color:#696969;
            }
        </style>
</head>
<body>
<div class="dang_ky_khach_hang">
    <div class="box_form">
    <h2>
        Đăng Ký Khách Hàng
    </h2>
    <?php if(isset($_GET["loi"])){?>
        <p style="color: red;"><?php echo $_GET["loi"]; ?></p><?php 
        }
        ?>
        <div class="form">
            <form action="process_dang_ky_khach_hang.php" method="post">
                <table>
                    <tr>
                        <td>
                            Tên :
                        </td>
                        <td>
                            <input type="text" id="ten" name="ten_khach_hang" >
                            <br>
                            <span id="ten_error" class="span_error">
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Email :
                        </td>
                        <td>
                            <input type="text" id="email" name="email" >
                            <br>
                            <span id="email_error" class="span_error">
                                
                            </span>

                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mật Khẩu :
                        </td>
                        <td>
                            <input id="mat_khau" type="password" name="mat_khau" >
                            <br>
                            <span id="mat_khau_error" class="span_error">
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Ngày sinh :
                        </td>
                        <td>
                            <input type="date" name="ngay_sinh" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Giới Tính :
                        </td>
                        <td>
                            <input type="radio" name="gioi_tinh" value="1" checked>Nam
                            <input type="radio" name="gioi_tinh" value="0">Nữ
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Địa Chỉ :
                        </td>
                        <td>
                        <input type="text" id="dia_chi" name="dia_chi" >
                        <br>
                        <span id="dia_chi_error" class="span_error">
                                
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Sđt :
                        </td>
                        <td>
                            <input type="number" id="sdt" name="sdt" >
                            <br>
                            <span id="sdt_error" class="span_error">
                                
                            </span>
                        </td>
                    <tr>
                        <td colspan="2">
                            <button type="submit" id="dangky" onclick="return dang_ky()">
                                Đăng ký
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <div id="dang_nhap">Bạn đã có tài khoản? <a href="dang_nhap_khach_hang.php">đăng nhập</a></div>
    </div> 
</div>
<script type="text/javascript">
            function dang_ky() {
            var check_error = false;
            var ten = document.getElementById('ten').value;
            var ten_regex = /[^\s]/;
            if(ten_regex.test(ten)){
                document.getElementById('ten_error').innerHTML='';
            }
            else {
                document.getElementById('ten_error').innerHTML='Không được để trống';
                check_error = true;
            }
            var email = document.getElementById('email').value;
            var email_regex = /(\W|^)[\w.+\-]*@gmail\.com(\W|$)/;
            if(email_regex.test(email)){
                document.getElementById('email_error').innerHTML='';
            }
            else {
                document.getElementById('email_error').innerHTML='Email không hợp lệ';
                check_error = true;
            }
            var mat_khau = document.getElementById('mat_khau').value;
            var mat_khau_regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
            if(mat_khau_regex.test(mat_khau)){
                document.getElementById('mat_khau_error').innerHTML='';
            }
            else {
                document.getElementById('mat_khau_error').innerHTML='Mật khẩu có ít nhất 6 ký tự gồm chữ hoa, chữ thường và số';
                check_error = true;
            }
            var dia_chi = document.getElementById('dia_chi').value;
            var dia_chi_regex = /[^\s]/;
            if(dia_chi_regex.test(dia_chi)){
                document.getElementById('dia_chi_error').innerHTML='';
            }
            else {
                document.getElementById('dia_chi_error').innerHTML='Không được để trống';
                check_error = true;
            }
            var sdt = document.getElementById('sdt').value;
            var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if(sdt_regex.test(sdt)){
                document.getElementById('sdt_error').innerHTML='';
            }
            else {
                document.getElementById('sdt_error').innerHTML='Số điện thoại không đúng';
                check_error = true;
            }
            if(check_error){
                return false;
            } else {
                alert('Đăng ký thành công!');
                return true;
            }
        }
</script>
</body>
</html>