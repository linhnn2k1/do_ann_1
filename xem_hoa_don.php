<?php 
include 'check_khach_hang.php'; 
include 'check_trang_thai_tai_khoan.php';
?>
<title>Đơn hàng</title>
<style type="text/css">
	.table_hoa_don{
			width: 100%;
			border-collapse: collapse;
		}
		.table_hoa_don th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_hoa_don td, .table_hoa_don th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_hoa_don tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_hoa_don tr:hover {
			background-color: #f5f5f5;
		}
		a{
			text-decoration: none;
		}
		.mau_do{
			color: red;
		}
		.in_dam{
			font-weight: bold;
		}
		.mau_xanh{
			color: #1706d1;
		}
		.mau_vang{
			text-shadow: 0 0 0.2em yellow, 0 0 0.2em yellow;
		}
		.tong_don{
			width: 100%;
			height: 600px;
			margin-top: 190px;
		}
</style>

<?php
include 'fixed.php';
include 'connect.php';

$ma = $_SESSION['ma_khach_hang'];
$sql = "select 
hoa_don.*,
khach_hang.ten_khach_hang,
khach_hang.sdt,
khach_hang.dia_chi
from hoa_don
join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma where hoa_don.ma_khach_hang = '$ma' order by tinh_trang asc, ma desc";
$result = mysqli_query($connect,$sql);

$tong_so_hoa_don = mysqli_num_rows($result);
$so_hoa_don_1_trang = 5;
$tong_so_trang = ceil($tong_so_hoa_don / $so_hoa_don_1_trang);
$trang_hien_tai = 1;
if(isset($_GET['trang'])){
	$trang_hien_tai = $_GET['trang'];
}
$so_hoa_don_can_bo_qua = ($trang_hien_tai - 1) * $so_hoa_don_1_trang;
$sql = "$sql
limit $so_hoa_don_1_trang offset $so_hoa_don_can_bo_qua";
$result = mysqli_query($connect,$sql);
?>

<div class="tong_don">
<!-- nút quay lại -->
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
	<?php if(mysqli_num_rows($result) != 0) { ?>
<h1>
	Tổng số hóa đơn: <?php echo $tong_so_hoa_don ?>
</h1>
<p>
	Trang: <?php for($i = 1; $i<=$tong_so_trang; $i++){ ?>
		<a href="?trang=<?php echo $i ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>
</p>

<h1 style="text-align: center;">
	Đơn hàng
</h1>
<table border="1px" width="100%" class="table_hoa_don">
	<tr>
		<th>Thời gian</th>
		<th>Tình trạng</th>
		<th>Thông tin người nhận</th>
		<th>Thông tin người đặt</th>
		<th>Xem chi tiết</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo date_format(date_create($each['thoi_gian_mua']),'d-m-Y H:i:s')?>
			</td>
			<td>
				<?php if($each['tinh_trang']==1){ ?>
					<span class="mau_vang in_dam">
						<?php echo "Đang chờ duyệt"; ?>
					</span>
					<br>
					<a href="view_huy_don.php?ma=<?php echo $each['ma'] ?>">
						Hủy đơn
					</a>
				<?php } else if ($each['tinh_trang']==2){ ?>
					<span class="mau_xanh in_dam">
						<?php echo "Đã duyệt";?>
					</span>
				<?php } else { ?>
					<span class="mau_do in_dam">
						<?php echo "Đã hủy"; ?>
					</span>
				<?php } ?>
			</td>
			<td>
				Tên: <?php echo $each['ten_nguoi_nhan']?>
				<br>
				SĐT: <?php echo $each['sdt_nguoi_nhan']?>
				<br>
				Địa chỉ: <?php echo $each['dia_chi_nguoi_nhan']?>
			</td>
			<td>
				Tên: <?php echo $each['ten_khach_hang']?>
				<br>
				SĐT: <?php echo $each['sdt']?>
				<br>
				Địa chỉ: <?php echo $each['dia_chi']?>
			</td>
			<td>
				<a href="xem_chi_tiet_hoa_don.php?ma=<?php echo $each['ma']?>">
					Xem chi tiết
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php } else { ?>
	<h1 style="text-align: center; color: red">
		<?php echo "Không có trang này!!!" ?>
	</h1>
<?php } ?>
</div>
<?php include 'footer.php' ?>
<?php mysqli_close($connect) ?>
