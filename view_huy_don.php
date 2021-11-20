<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title></title>
<link rel="stylesheet" href="">
<style type="text/css">
	.tong_huy_don{
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
		width: 20%;
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
	.ly_do{
		position: relative;
		right: 10px;
		float: right;
		top: 0px;
	}
	.table_huy_don{
		border: none;
	}
	.table_huy_don th{
		background: #0a0f45;
		color: #fab8a7;
		padding:10px;
	}
	button{
		font-size: 20px;
		cursor: pointer;
	}
</style>
<?php include 'fixed.php'; ?>

<?php if(!empty($_GET['ma'])){ ?>
<?php 
$ma_khach_hang = $_SESSION['ma_khach_hang'];
$thu_muc_anh = 'image/';
$ma = $_GET['ma'];
include 'connect.php';
$sql = "select 
hoa_don_chi_tiet.*,
hoa_don.ma_khach_hang,
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

<div class="tong_huy_don">
<!-- nút quay lại -->
<a href="xem_hoa_don.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>

<h1 style="text-align: center; color: red">
<?php if($dem == 0) { ?>
	<?php echo 'Không tồn tại hóa đơn!';?> 
<?php } else { ?>
</h1>

<h1 style="text-align: center">
	Hủy đơn hàng
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
<h2>
Tổng tất cả: <?php echo $tong ?>
</h2>
<div class="ly_do">
	<form action="process_huy_don.php" method="post">
		<table class="table_huy_don">
			<input type="hidden" name="ma" value="<?php echo $ma ?>">
			<tr>
				<th>
					Lý do hủy đơn
				</th>
				<td>
					<textarea name="ly_do_huy_don" style="width: 300px; height: 100px; font-size: 16px; padding: 5px;" placeholder="Nhập lý do hủy đơn"></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<button type="submit" onclick="return confirm('Bạn có chắc chắn hủy đơn này?')">
						Gửi
					</button>
				</td>
			</tr>
		</table>
	</form>
</div>

<?php } ?>
</div>
<?php } else {?>
<?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php include 'footer.php' ?>
<?php mysqli_close($connect) ?>
