<?php include '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
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
		.error{
			position: relative;
			color: red;
			text-align: center;
			top: 10px;
		}
		.tong_loi{
            width: 100%;
            height: 500px;
            position: relative;
        }
        .loi{
            position: absolute;
            width: 100%;
            height: 50px;
            top: 20px;
            background: #f71616;
            padding: 5px;
            color: white;
        }
	</style>
</head>
<body>
<?php 
include '../common/header_admin.php';
include '../common/menu_admin.php';
?>
<!-- nút quay lại -->
<a href="../quan_ly_san_pham/index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<!-- Kiểm tra tồn tại mã -->
<?php if(!empty($_GET['ma'])) { ?>
<?php 
include '../../connect.php';
$ma = $_GET['ma'];
$sql = "select binh_luan.ma, khach_hang.email, binh_luan.noi_dung,san_pham.ten_san_pham, binh_luan.thoi_gian from binh_luan
	join khach_hang on binh_luan.ma_khach_hang = khach_hang.ma
	join san_pham on binh_luan.ma_san_pham = san_pham.ma where ma_san_pham ='$ma'";
$result = mysqli_query($connect,$sql);
?>

<?php if(mysqli_num_rows($result) == 0){ ?>
	<h1 class="error">
		<?php echo "Không có bình luận" ?>
	</h1>
<?php } else { ?>
	<h1 style="text-align: center">
		Bình luận
	</h1>
<table border="1px" width="100%" class="table_hoa_don">
	<tr>
		<th>Thời gian</th>
		<th>Khách hàng</th>
		<th>Sản phẩm</th>
		<th>Nội dung</th>		
		<th>Xóa</th>
	</tr>
	<?php foreach ($result as $each): ?>
		<tr>
			<td>
				<?php echo $each['thoi_gian']?>
			</td>
			<td>
				<?php echo $each['email']?>
			</td>
			<td>
				<?php echo $each['ten_san_pham']?>
			</td>
			<td>
				<?php echo $each['noi_dung']?>
			</td>
			<td>
				<a onclick="return confirm('Bạn có chắc chắn xóa bình luận này?')" href="delete_binh_luan.php?ma=<?php echo $each['ma'] ?>">
					Xóa
				</a>
			</td>
		</tr>
	<?php endforeach ?>
</table>
<?php } ?>
<?php } else { ?>
       <?php echo '<script>alert("Lỗi!");
	location.replace("../quan_ly_san_pham/index.php");</script>'; ?>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>