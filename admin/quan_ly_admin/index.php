<?php include('../check_super_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý Admin</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
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
		ul{
			line-height: 78px;
			background-color: black;
			list-style-type: none;
			height: 50px;
			width: 100%;
			display: flex;
			justify-content: center;
			/* position: absolute; */  
			/* float: left; */
		}
		ul li{
			width: 240px;
			height: 38px;
			/* left: 50px; */
			text-align: center;
			top: 30px;
			/* display: inline-block; */
			margin: -14px;
			/* border: 1px solid red; */
		}
		ul li a{
			padding: 14px;
			text-decoration: none;
			color: white;
			font-size: 17px;
		}
		ul li:hover a{
			background: #00eaff;
			color: black;
		}
		.upload{
			margin: 2px;
			background-color: DodgerBlue;
			border: none;
			color: white;
			padding: 10px 16px;
			font-size: 20px;
			/* cursor: pointer; */
			position: absolute;
		}
		.table_admin{
			width: 100%;
			border-collapse: collapse;
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
		.upload > .upload_a{
			text-decoration: none;
			color: white;
		}
		td a{
			cursor: pointer;
		}
	</style>
</head>
<body>
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>

<button class="upload"><a class="upload_a" href="view_insert_admin.php">Thêm Admin<i class="fa fa-cloud-upload" style="font-size:30px"></i></a></button>
<br>
<?php 
require '../../connect.php';
$sql = "select * from admin where cap_do = 0";
$result = mysqli_query($connect,$sql);
?>
<h1 align="center">
	Quản lý Admin
</h1>

<table class="table_admin">
	<tr>
		<th>
			Tên nhân viên
		</th>
		<th>
			Gmail
		</th>
		<th>
			Mật khẩu
		</th>
		<th>
			Ngày sinh
		</th>
		<th>
			Gioi_tinh
		</th>
		<th>
			CMND
		</th>
		<th>
			Số điện thoại
		</th>
		<th>
			Địa chỉ
		</th>
		<th>
			Cấp độ
		</th>
		<th>
			Sửa
		</th>
		<th>
			Xóa
		</th>
	</tr>

<?php foreach ($result as $each): ?>
<tr>
	<td>
		<?php echo $each['ten_admin'] ?>
	</td>
	<td>
		<?php echo $each['email'] ?>
	</td>
	<td>
		<?php echo $each['mat_khau'] ?>
	</td>
	<td>
		<?php echo $each['ngay_sinh'] ?>
	</td>
	<td>
		<?php if($each['gioi_tinh']==1){?>
			<?php echo 'Nam'; ?>
		<?php }else{ ?>
			<?php echo 'Nữ'; ?>
		<?php } ?>
	</td>
	<td>
		<?php echo $each['cmnd'] ?>
	</td>
	<td>
		<?php echo $each['sdt'] ?>
	</td>
	<td>
		<?php echo $each['dia_chi'] ?>
	</td>
	<td>
		<?php if($each['cap_do'] == 0){ ?>
			<?php echo "Nhân viên" ?>
		<?php } ?>
	</td>
	<td>
		<a href="view_update_admin.php?ma=<?php echo $each['ma'] ?>">Sửa</a>	
	</td>
	<td>
		<a href="delete_admin.php?ma=<?php echo $each['ma']?>" 
		onclick="return confirm('Bạn có chắc muốn xóa admin này?')">Xóa</a>	
	</td>
</tr>
<?php endforeach ?>
</table>

<?php mysqli_close($connect) ?>
</body>
</html>