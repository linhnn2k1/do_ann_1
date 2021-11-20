<?php include('../check_super_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa thông tin Admin</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
		}
		table{
			border: 1px solid;
			margin: auto;
		}
		*{
			margin: 0;
			padding: 0;
		}
		body{
			padding: 0;
			margin: 0 auto;
			overflow-x: hidden; 
			font-family: Arial;
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
	</style>
</head>
<body>
<?php
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>
<!-- nút quay lại -->
<a href="index.php">
    <i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<!-- Kiểm tra tồn tại mã -->
<?php if(!empty($_GET['ma'])) { ?>

<?php 
$ma = $_GET['ma'];
require '../../connect.php';
$sql = "select * from admin where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>

<?php if(mysqli_num_rows($result) == 0){ ?>
	<h1 style="text-align: center; color: red">
        <?php echo "Không tồn tại admin này!"; ?>
    </h1>
<?php } else { ?>
<h1 style="text-align: center">
	Sửa thông tin Admin
</h1>
<form method="post" action="process_update_admin.php?ma=<?php echo $each['ma']?>">

	<table>
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<table>
		<tr>
			<td>
				<label for="ten">Nhập tên admin</label>
			</td>
			<td>
				<input type="text" name="ten_admin" id="ten" value="<?php echo $each['ten_admin'] ?>">
				<span class="span_error" id="ten_error">
			</td>	
			</span>
		</tr>
		<tr>
			<td>
				<label for="mat_khau">Nhập mật khẩu</label>
			</td>
			<td>
				<input type="text" name="mat_khau" id="mat_khau" value="<?php echo $each['mat_khau'] ?>">
				<span class="span_error" id="mat_khau_error">
				
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Ngày sinh
			</td>
			<td>
				<input type="date" name="ngay_sinh" id="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>">

			</td>
		</tr>
		<tr>
            <td>
                Giới Tính
            </td>
            <td>
                <input type="radio" name="gioi_tinh" value="1" checked>Nam
                <input type="radio" name="gioi_tinh" value="0">Nữ
            </td>
        </tr>
		<tr>
            <td>
                <label for="cmnd">CMND</label>
            </td>
            <td>
                <input type="number" name="cmnd" id="cmnd" value="<?php echo $each['cmnd'] ?>">
                <span class="span_error" id="cmnd_error">
				
				</span>
            </td>
        </tr>
		<tr>
            <td>
                <label for="sdt">Số điện thoại</label>
            </td>
            <td>
                <input type="text" name="sdt" id="sdt" value="<?php echo $each['sdt'] ?>">
                <span class="span_error" id="sdt_error">
				
				</span>
            </td>
        </tr>
		<tr>
            <td>
                <label for="dia_chi">Địa chỉ</label>
            </td>
            <td>
                <input type="text" name="dia_chi" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">
                <span class="span_error" id="dia_chi_error">
				
				</span>
            </td>
        </tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button style="font-size: 20px" type="submit" onclick="return sua()">Sửa</button>
			</td>	
		</tr>
	</table>
</form>
<?php } ?>
<?php } else { ?>
    <?php 
        echo '<script>alert("Lỗi!");
        location.replace("index.php");</script>'; 
    ?>
<?php } ?>
<script type="text/javascript">
function sua() {
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