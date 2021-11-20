<?php include '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Hóa đơn chi tiết</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.table_xem_chi_tiet{
			width: 100%;
			border-collapse: collapse;
		}
		.table_xem_chi_tiet th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_xem_chi_tiet td, .table_xem_chi_tiet th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_xem_chi_tiet tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_xem_chi_tiet tr:hover {
			background-color: #f5f5f5;
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
$thu_muc_anh = '../../image/';
$ma = $_GET['ma'];
include '../../connect.php';
$sql = "select 
hoa_don_chi_tiet.*,
san_pham.ten_san_pham,
san_pham.anh 
from hoa_don_chi_tiet 
join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham 
where ma_hoa_don = '$ma'";
$result = mysqli_query($connect,$sql);
$tong=0;
?>

<?php if(mysqli_num_rows($result) == 0){ ?>
	<h1 style="text-align: center; color: red">
		<?php echo "Không tồn tại đơn hàng"; ?>
	</h1>
<?php } else{ ?>
<h1 style="text-align: center">
	Hóa đơn chi tiết
</h1>
<table border="1px" width="100%" class="table_xem_chi_tiet">
	<tr>
		<th>
			Tên
		</th>
		<th>
			Ảnh
		</th>
		<th>
			Số lượng
		</th>
		<th>
			Giá
		</th>
		<th>
			Tổng
		</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo $each['ten_san_pham'] ?>
			</td>
			<td>
				<img height="200px" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			</td>
			<td>
				<?php echo $each['so_luong']?>
			</td>
			<td>
				<?php echo $each['gia'] ?>
			</td>
			<td>
				<?php echo $each['so_luong'] * $each['gia']?>
				<?php $tong += $each['so_luong'] * $each['gia'] ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
Tổng tất cả: <?php echo $tong ?>
</h1>
<?php } ?>
<?php } else { ?>
       <?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>