<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý khách hàng</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial;
		}
		.table_khach_hang{
			width: 100%;
			border-collapse: collapse;
		}
		.table_khach_hang th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_khach_hang td, .table_khach_hang th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_khach_hang tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_khach_hang tr:hover {
			background-color: #f5f5f5;
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
		.mau_do{
			color: red;
		}
		input{
			margin: 4px;
			font-size: 17px;
		}
		button{
			font-size: 17px;
			cursor: pointer
		}
		.in_dam{
			font-weight: bold;
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
$tim_kiem = '';
if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
$sql = "select * from khach_hang where email like '%$tim_kiem%'";
$result = mysqli_query($connect,$sql);
$tong_so_khach_hang = mysqli_num_rows($result);
$so_khach_hang_1_trang = 5;

// Tính số trang
$tong_so_trang = ceil($tong_so_khach_hang / $so_khach_hang_1_trang);

$trang_hien_tai = 1;
if(isset($_GET['trang'])){
	$trang_hien_tai = $_GET['trang'];
}

$so_khach_hang_can_bo_qua = ($trang_hien_tai - 1) * $so_khach_hang_1_trang;

// Hiện thị sản phẩm trên 1 trang
$sql = "$sql
limit $so_khach_hang_1_trang offset $so_khach_hang_can_bo_qua";
$result = mysqli_query($connect,$sql);
?>
<!-- nút quay lại -->

<?php if(mysqli_num_rows($result) == 0){ ?>
	<a href="../quan_ly_khach_hang/index.php">
		<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
	</a>
	<h1 class="mau_do" style="text-align: center">
		<?php echo "Khách hàng không tồn tại" ?>
	</h1>
<?php } else { ?>
	<h1 style="text-align: center">
		Quản lý khách hàng
	</h1>
	<h1>
		Tổng số khách hàng: <?php echo $tong_so_khach_hang ?>
	</h1>
<p>
	Trang: <?php for($i = 1; $i<=$tong_so_trang; $i++){ ?>
		<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>
</p>
<p>
	<form action="">
		Nhập tìm kiếm:
		<input type="search" name="tim_kiem" placeholder="nhập email khách hàng" value="<?php echo $tim_kiem ?>">
		<button type="submit">Tìm kiếm</button>
	</form>
</p>

<table class="table_khach_hang">
	<tr>
		<th>
			Tên
		</th>	
		<th>
			Tài Khoản
		</th>
		<th>
			Mật khẩu
		</th>
		<th>
			Ngày sinh
		</th>
		<th>
			Giới tính
		</th>
		<th>
			Địa chỉ
		</th>
		<th>
			SĐT
		</th>
		<th>
			Trạng thái tài khoản
		</th>
		<th>
			Sửa trạng thái tài khoản
		</th>
		<th>
			Xem hóa đơn
		</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo $each['ten_khach_hang'] ?>
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
				<?php echo $each['dia_chi'] ?>
			</td>
			<td>
				<?php echo $each['sdt'] ?>
			</td>
			<td class="in_dam">
				<?php if($each['trang_thai'] == 1){ ?>
					<?php echo "Hoạt động" ?>
				<?php } else { ?>
					<?php echo "Bị khóa" ?>
				<?php } ?>
			</td>
			<td>
				<a href="view_update_khach_hang.php?ma=<?php echo $each['ma'] ?>">Sửa trạng thái</a>	
			</td>
			<td>
				<a href="../quan_ly_hoa_don/index.php?ma=<?php echo $each['ma'] ?>">Xem hóa đơn</a>	
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>