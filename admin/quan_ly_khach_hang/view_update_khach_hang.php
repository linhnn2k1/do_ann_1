<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thay đổi trạng thái</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		body{
			font-family: Arial, Helvetica, sans-serif;
		}
		*{	
			padding: 0;
			margin: 0 auto;
			font-family: Arial;
		}
		table{
			border: 1px solid;
			margin: auto;
		}
		button{
			font-size: 20px;
		}
		.error{
			position: relative;
			color: red;
			text-align: center;
			top: 10px;
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
$ma = $_GET['ma'];
require '../../connect.php';
$sql_khach_hang = "select * from khach_hang where ma = '$ma'";
$result_khach_hang = mysqli_query($connect,$sql_khach_hang);
$each_khach_hang = mysqli_fetch_array($result_khach_hang);
?>

<h1 class="error">
	<?php if(mysqli_num_rows($result_khach_hang) == 0){ ?>
		<?php echo 'Khách hàng không tồn tại!'; ?>
	<?php } else { ?>
</h1>

<h1 style="text-align: center">
	Trạng thái
</h1>
<form method="post" action="process_update_khach_hang.php" >
	<table>
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<tr>
			<td>
				<input checked type="radio" name="trang_thai_khach_hang" value=1> Hoạt động
				<input type="radio" name="trang_thai_khach_hang" value=0> Khóa
			</td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<button>Sửa</button>
			</td>
		</tr>
	</table>
</form>
<?php } ?>
<?php } else { ?>
       <?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>