<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thông tin cá nhân</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial;
		}
		.table_admin{
			width: 50%;
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
	</style>
</head>
<body>
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>
<?php 
require '../../connect.php';
$sql = "select * from admin where cap_do = 0";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<h1 align="center">
	Thông tin cá nhân Nhân viên
</h1>
<?php
$ma = $_SESSION['ma_admin'];
$sql = "select * from admin where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<table class="table_admin" align="center">
	<?php foreach ($result as $each): ?>
	<tr>
		<th>
			Tên Admin
		</th>
		<td>
		<?php echo $each['ten_admin'] ?>
		</td>
	</tr>
	<tr>	
		<th>
			Gmail
		</th>
		<td>	
			<?php echo $each['email'] ?>
		</td>
	</tr>
	<tr>	
		<th>
			Ngày sinh
		</th>
		<td>
			<?php echo date_format(date_create($each['ngay_sinh']),'d-m-Y')?>
		</td>
	</tr>
	<tr>	
		<th>
			Giới tính
		</th>
		<td>
				<?php 
				if($each['gioi_tinh']==1){
				echo "Nam";
				}else{
					echo "Nữ";
				}
				?>
		</td>
	</tr>
	<tr>	
		<th>
			CMND
		</th>
		<td>
			<?php echo $each['cmnd'] ?>
		</td>
	</tr>
	<tr>	
		<th>
			Số điện thoại
		</th>
		<td>
			<?php echo $each['sdt'] ?>
		</td>
	</tr>
	<tr>	
		<th>
			Địa chỉ
		</th>
		<td>
			<?php echo $each['dia_chi'] ?>
		</td>
	</tr>
	<tr>	
		<td colspan="2" style="text-align: center;">
			<button style="font-size: 20px">
				<a href="view_update_password_admin.php">Đổi mật khẩu</a>
			</button>
		</td>
	</tr>
	<?php endforeach ?>
</table>
<?php mysqli_close($connect) ?>
</body>
</html>