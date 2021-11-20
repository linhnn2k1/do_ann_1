<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản lý sản phẩm</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		#tong{
			margin-top: 190px;
		}
		.upload{
			margin: 2px;
			background-color: DodgerBlue;
			border: none;
			padding: 10px 16px;
			font-size: 20px;
			position: absolute;
			left: 0;
		}
		.upload_nsx{
			margin: 2px;
			background-color: DodgerBlue;
			border: none;
			padding: 10px 16px;
			font-size: 20px;
			position: absolute;
			right: 0;
		}
		.upload_a > .upload, .upload_a > .upload_nsx{
			text-decoration: none;
			color: white;
			cursor: pointer;
		}
		.table_san_pham{
			width: 100%;
			border-collapse: collapse;
		}
		.table_san_pham th{
			background: #0a0f45;
			color: #fab8a7;
		}
		.table_san_pham td, .table_san_pham th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		.table_san_pham tr:nth-child(even){
			background-color: #f2f2f2;
		}
		.table_san_pham tr:hover {
			background-color: #f5f5f5;
		}
		td a{
			cursor: pointer;
		}
		input{
			font-size: 17px;
			padding: 4px;
		}
		button{
			font-size: 19px;
			cursor: pointer;
		}
	</style>
</head>
<body>
<?php 
include '../common/fixed.php'
?>
<div id="tong">
<a class="upload_a" href="view_insert.php">
	<button class="upload">
	Đăng sản phẩm<i class="fa fa-cloud-upload" style="font-size:30px"></i>
</button>
</a>

<a class="upload_a" href="../quan_ly_nha_san_xuat/">
<button class="upload_nsx">
	Nhà sản xuất<i class="fa fa-cloud-upload" style="font-size:30px"></i>	
</button>
</a>

<h1 style="text-align: center">
Quản lý sản phẩm
</h1>
<br>
<?php 
$thu_muc_anh = '../../image/';

require '../../connect.php';

// TÌm kiếm
$tim_kiem = '';
if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
// var_dump($tim_kiem);
// Lấy tất cả toàn bộ sản phẩm
$sql = "select 
san_pham.*,
nha_san_xuat.ten as 'ten_nha_san_xuat'
from san_pham
join nha_san_xuat on san_pham.ma_nha_san_xuat = nha_san_xuat.ma
where san_pham.ten_san_pham like '%$tim_kiem%' or nha_san_xuat.ten like '%$tim_kiem%' order by ma desc";
$result = mysqli_query($connect,$sql);

// Đếm tổng số sản phẩm
$tong_so_san_pham = mysqli_num_rows($result);
$so_san_pham_1_trang = 5;

// Tính số trang
$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);

$trang_hien_tai = 1;
if(isset($_GET['trang'])){
	$trang_hien_tai = $_GET['trang'];
}

$so_san_pham_can_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;

// Hiện thị sản phẩm trên 1 trang
$sql = "$sql
limit $so_san_pham_1_trang offset $so_san_pham_can_bo_qua";
$result = mysqli_query($connect,$sql);
?>
<h1>
	Tổng số sản phẩm: <?php echo $tong_so_san_pham ?>
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
		<input placeholder="Nhập tên sản phẩm" type="search" name="tim_kiem" value="<?php echo $tim_kiem ?>" >
		<button type="submit">Tìm kiếm</button>
	</form>
</p>
<?php if(mysqli_num_rows($result) == 0){ ?>
	<h1 style="text-align: center; color:red;">
		<?php echo "Không tìm thấy sản phẩm" ?>
	</h1>
<?php } else { ?>
<table class="table_san_pham">
	<tr>
		<th>
			Tên Sản Phẩm
		</th>	
		<th>
			Giá
		</th>
		<th>
			Mô tả
		</th>
		<th>
			Ảnh
		</th>
		<th>
			Nhà sản xuất
		</th>
		<th>
			Sửa
		</th>
		<th>
			Xóa
		</th>
		<th>
			Bình luận
		</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo $each['ten_san_pham'] ?>
			</td>
			<td>
				<?php echo $each['gia'] ?>
			</td>
			<td>
				<?php echo $each['mo_ta'] ?>
			</td>
			<td>
				<img height="200px" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
			</td>
			<td>
				<?php echo $each['ten_nha_san_xuat'] ?>
			</td>
			<td>
				<a href="view_update.php?ma=<?php echo $each['ma'] ?>">Sửa</a>	
			</td>
			<td>
				<a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?')" href="delete_san_pham.php?ma=<?php echo $each['ma'] ?>">Xóa</a>	
			</td>
			<td>
				<a href="../quan_ly_binh_luan/index.php?ma=<?php echo $each['ma'] ?>">Xem bình luận</a>	
			</td>
		</tr>
	<?php endforeach ?>
</table>
</div>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>