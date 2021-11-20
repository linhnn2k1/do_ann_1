<?php include('../check_super_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm Admin</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
		}
		table{
			border: 1px solid;
			margin: auto;
		}
		.span_error{
			color: red;
		}
		input{
            font-size: 20px;
            padding: 5px;
        }
        button{
            font-size: 20px;
            cursor: pointer;
        }
        .them{
        	width: 100%;
        	height: 550px;
        }
	</style>
</head>
<body>
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>
<div class="them">
<!-- nút quay lại -->
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>

<?php 
include '../../connect.php';
$sql_nsx = "select * from admin";
$result_nsx = mysqli_query($connect,$sql_nsx);
?>
<br>
<h1 style="text-align: center">
	Thêm Admin
</h1>

<form method="post" action="process_insert_admin.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<?php if(isset($_GET["loi"])){?>
        <p style="color: red;"><?php echo $_GET["loi"]; ?></p><?php 
        }
        ?>
			</td>
		</tr>
		<tr>
			<td>
				Nhập tên admin
			</td>
			<td>
				<input type="text" name="ten_admin" id="ten">
				<span class="span_error" id="ten_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Nhập email
			</td>
			<td>
				<input type="email" name="email" id="email">
				<span class="span_error" id="email_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Nhập mật khẩu
			</td>
			<td>
				<input type="password" name="mat_khau" id="mat_khau">
				<span class="span_error" id="mat_khau_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Ngày sinh
			</td>
			<td>
				<input type="date" name="ngay_sinh" id="ngay_sinh">
				<span class="span_error" id="ngay_sinh_error">
					
				</span>
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
                CMND :
            </td>
            <td>
                <input type="number" name="cmnd" id="cmnd">
                <span class="span_error" id="cmnd_error">
					
				</span>
            </td>
        </tr>
		<tr>
            <td>
                Số điện thoại :
            </td>
            <td>
                <input type="text" name="sdt" id="sdt">
                <span class="span_error" id="sdt_error">
					
				</span>
            </td>
        </tr>
		<tr>
            <td>
                Địa chỉ :
            </td>
            <td>
                <input type="text" name="dia_chi" id="dia_chi">
                <span class="span_error" id="dia_chi_error">
					
				</span>
            </td>
        </tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button style="font-size: 20px" type="submit" onclick="return them()">Thêm</button>
			</td>	
		</tr>
	</table>
</form>
</div>

<script type="text/javascript">
function them() {
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
            var mat_khau_regex = /[^\s]/;
            if(mat_khau_regex.test(mat_khau)){
                document.getElementById('mat_khau_error').innerHTML='';
            }
            else {
                document.getElementById('mat_khau_error').innerHTML='không được để trống';
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
            var cmnd = document.getElementById('cmnd').value;
            var cmnd_regex = /[^\s]/;
            if(cmnd_regex.test(cmnd)){
                document.getElementById('cmnd_error').innerHTML='';
            }
            else {
                document.getElementById('cmnd_error').innerHTML='Không được để trống';
                check_error = true;
            }
            if(check_error){
                return false;
         	}
        }
</script>
<?php mysqli_close($connect) ?>
</body>
</html>