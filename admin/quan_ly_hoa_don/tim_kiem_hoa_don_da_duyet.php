<?php include '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý hóa đơn</title>
	<link rel="stylesheet" href="">
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
			color: blue;
		}
	</style>
</head>
<body>
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>

<?php 
include '../../connect.php';
$ngay_bat_dau = '';
$ngay_ket_thuc = '';
if(isset($_GET['ngay_bat_dau'])){
	$ngay_bat_dau = $_GET['ngay_bat_dau'];
}
if(isset($_GET['ngay_ket_thuc'])){
	$ngay_ket_thuc = $_GET['ngay_ket_thuc'];
}

$sql = "select 
hoa_don.*,
khach_hang.ten_khach_hang,
khach_hang.sdt,
khach_hang.dia_chi
from hoa_don
join khach_hang on hoa_don.ma_khach_hang = khach_hang.ma where tinh_trang = '2' and thoi_gian_mua >= '$ngay_bat_dau 00:00:00' and thoi_gian_mua <= '$ngay_ket_thuc 23:59:59' order by ma asc";
$result = mysqli_query($connect,$sql);
$thu_muc_anh = '../../image/';
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

<?php if(mysqli_num_rows($result) == 0){ ?>
	<!-- nút quay lại -->
	<a href="../quan_ly_hoa_don/index.php">
		<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
	</a>
	<h1 style="color: red;text-align: center;">
		<?php echo "Không có hóa đơn"; ?>
	</h1>
<?php } else { ?>
<h1 style="text-align: center">
	Quản lý hóa đơn
</h1>
<h1>
	Số hóa đơn đã duyệt: <?php echo $tong_so_hoa_don ?>
</h1>
<p>
	Trang: <?php for($i = 1; $i<=$tong_so_trang; $i++){ ?>
		<a href="?trang=<?php echo $i ?>&ngay_bat_dau=<?php echo $ngay_bat_dau ?>&ngay_ket_thuc=<?php echo $ngay_ket_thuc ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>
</p>
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
				<?php 
				if($each['tinh_trang']==1){
					echo "Đang chờ duyệt";
				}else if($each['tinh_trang']==2){
					echo "Đã duyệt";
				} else{
					echo "Đã hủy";
				}
				?>
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
				<a href="xem_chi_tiet.php?ma=<?php echo $each['ma']?>">
					Xem chi tiết
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>