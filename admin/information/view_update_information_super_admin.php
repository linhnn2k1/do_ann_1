<?php include('../check_super_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa thông tin</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial:
		}
		.table_admin{
			width: 40%;
			border-collapse: collapse;
			margin: auto;
		}
		.table_admin th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_admin td, .table_admin th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_admin tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_admin tr:hover {
			background-color: #f5f5f5;
		}
		td input{
			width: 95%;
			padding: 5px;
			margin: 2px;
			font-size: 17px;
		}
		td .input_gioi_tinh{
			width: 15%;
		}
		.span_error{
			color: red;
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
$ma = $_SESSION['ma_admin'];
require '../../connect.php';
$sql = "select * from admin where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<!-- nút quay lại -->
<a href="information_super_admin.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<br>

<h1 align="center">
	Sửa thông tin cá nhân Super Admin
</h1>
<form method="post" action="process_update_information_super_admin.php">
	<table class="table_admin">
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<tr>
			<th>
				Tên Admin
			</th>
			<td>
				<input type="text" name="ten_admin" id="ten" value="<?php echo $each['ten_admin'] ?>">
				<span class="span_error" id="ten_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<th>
				Ngày sinh
			</th>
			<td>
				<input type="text" name="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>">
			</td>
		</tr>
		<tr>
			<th>
				Giới tính
			</th>
			<td>
				<?php if($each['gioi_tinh'] == 1) {?>
					<input class="input_gioi_tinh" type="radio" name="gioi_tinh" value=1 checked> Nam
					<input class="input_gioi_tinh" type="radio" name="gioi_tinh" value=0> Nữ
				<?php } else {?>
					<input class="input_gioi_tinh" type="radio" name="gioi_tinh" value=1 checked> Nam
					<input class="input_gioi_tinh" type="radio" name="gioi_tinh" value=0 checked> Nữ
			<?php }?>
			</td>
		</tr>
		<tr>
			<th>
				CMND
			</th>
			<td>
				<input type="text" name="cmnd" id="cmnd" value="<?php echo $each['cmnd'] ?>">
				<span class="span_error" id="cmnd_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<th>
				Sdt
			</th>
			<td>
				<input type="text" name="sdt" id="sdt" value="<?php echo $each['sdt'] ?>">
				<span class="span_error" id="sdt_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<th>
				Địa chỉ
			</td>
			<td>
				<input type="text" name="dia_chi" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">
				<span class="span_error" id="dia_chi_error">
					
				</span>
			</td>
		</tr>		
		<tr>
			<td colspan="2" align="center">
				<button type="submit" onclick="return sua()">Sửa</button>
			</td>
		</tr>
	</table>
</form>
<script type="text/javascript">
	function sua(){
		var check_error = false;
		var ten = document.getElementById('ten').value;
        var ten_regex = /[^\s]/;
        if(ten_regex.test(ten)){
            document.getElementById('ten_error').innerHTML='';
        }
        else {
            document.getElementById('ten_error').innerHTML='không được để trống';
            check_error = true;
        }
        var cmnd = document.getElementById('cmnd').value;
        var cmnd_regex = /[^\s]/;
        if(cmnd_regex.test(cmnd)){
            document.getElementById('cmnd_error').innerHTML='';
        }
        else {
            document.getElementById('cmnd_error').innerHTML='không được để trống';
            check_error = true;
        }
        var sdt = document.getElementById('sdt').value;
        var sdt_regex = /[^\s]/;
        if(sdt_regex.test(sdt)){
            document.getElementById('sdt_error').innerHTML='';
        }
        else {
            document.getElementById('sdt_error').innerHTML='không được để trống';
            check_error = true;
        }
        var dia_chi = document.getElementById('dia_chi').value;
        var dia_chi_regex = /[^\s]/;
        if(dia_chi_regex.test(dia_chi)){
            document.getElementById('dia_chi_error').innerHTML='';
        }
        else {
            document.getElementById('dia_chi_error').innerHTML='không được để trống';
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