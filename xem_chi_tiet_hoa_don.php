<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		.tong_chi_tiet{
			margin: 0;
			padding: 0;
			width: 100%;
			height: 800px;
			/* background: red; */
			margin-top: 190px;
		}
		.table_xem_chi_tiet{
			width: 100%;
			border-collapse: collapse;
		}
		.table_xem_chi_tiet th{
			background: #0a0f45;
			color: #fab8a7;
			width: 16%;
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
include 'fixed.php';
$ma_khach_hang = $_SESSION['ma_khach_hang'];
$thu_muc_anh = 'image/';
$ma = $_GET['ma'];
include 'connect.php';
$sql = "select 
hoa_don_chi_tiet.*,
hoa_don.ma_khach_hang,
hoa_don.ly_do_huy_don,
san_pham.ten_san_pham,
san_pham.anh 
from hoa_don_chi_tiet 
join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham
join hoa_don on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma
where ma_hoa_don = '$ma' and ma_khach_hang = '$ma_khach_hang'";
$result = mysqli_query($connect,$sql);
$dem = mysqli_num_rows($result);
$tong=0;
?>
<div class="tong_chi_tiet">
<!-- nút quay lại -->
	<a href="xem_hoa_don.php">
		<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
	</a>
<?php if(!empty($_GET['ma'])){ ?>
	<h1 style="text-align: center; color: red">
	<?php if($dem == 0) { ?>
		<?php echo 'Không tồn tại hóa đơn!'?> 
	<?php } else { ?>
	</h1>
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
		<th>
			Lý do hủy đơn
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
			<td>
				<?php echo $each['ly_do_huy_don'] ?>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<h1>
Tổng tất cả: <?php echo $tong ?>
</h1>
<?php } ?>
</div>
<?php } else { ?>
		<?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php include 'footer.php' ?>
<?php mysqli_close($connect) ?>
</body>
</html>