<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý nhà sản xuất</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial;
		}
		.table_nha_san_xuat{
			width: 50%;
			border-collapse: collapse;
			margin: auto;
		}
		.table_nha_san_xuat th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_nha_san_xuat td, .table_nha_san_xuat th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_nha_san_xuat tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_nha_san_xuat tr:hover {
			background-color: #f5f5f5;
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
		.upload_a > .upload{
			text-decoration: none;
			color: white;
			cursor: pointer;
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
<!-- nút quay lại -->
<a href="../quan_ly_san_pham/index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<br>
<a class="upload_a" href="view_insert.php">
<button class="upload">
	Thêm nhà sản xuất<i class="fa fa-cloud-upload" style="font-size:30px"></i>	
</button>
</a>

<h1 style="text-align: center">
Các nhà sản xuất
</h1>

<?php 
require '../../connect.php';
$sql = "select * from nha_san_xuat";
$result = mysqli_query($connect,$sql);
?>
<table class="table_nha_san_xuat">
	<tr>
		<th>
			Tên
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
				<?php echo $each['ten'] ?>
			</td>
			<td>
				<a href="view_update.php?ma=<?php echo $each['ma'] ?>">Sửa</a>	
			</td>
			<td>
				<a onclick="return confirm('Cảnh báo: Khi bạn xóa nhà sản xuất này thì mọi sản phẩm liên quan sẽ đều bị xóa!!! Chỉ nên xóa khi không còn kinh doanh mặt hàng này!')" href="delete_nha_san_xuat.php?ma=<?php echo $each['ma'] ?>">Xóa</a>	
			</td>
		</tr>
	<?php endforeach ?>
</table>

<script type="text/javascript">
	
</script>
<?php mysqli_close($connect) ?>
</body>
</html>