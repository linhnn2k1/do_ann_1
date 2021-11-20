<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa nhà sản xuất</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{	
			padding: 0;
			margin: 0 auto;
			font-family: Arial;
		}
		table{
			border: 1px solid;
			margin: auto;
		}
		input{
			font-size: 20px;
			padding: 5px;
		}
		button{
			font-size: 20px;
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
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<!-- Kiểm tra tồn tại mã -->
<?php if(!empty($_GET['ma'])) { ?>

<?php 
include '../../connect.php';
$ma = $_GET['ma'];
require '../../connect.php';
$sql = "select * from nha_san_xuat where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>

<h1 style="text-align: center">
	Sửa nhà sản xuất
</h1>
<form method="post" action="process_update.php" >
	<table>
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<tr>
			<td>
				Tên nhà sản xuất
				<input type="text" name="ten_nha_san_xuat" value="<?php echo $each['ten'] ?>">
				<span class="span_loi">
					<?php if(isset($_GET['loi'])) { ?>
						<?php echo $_GET['loi'] ?>
					<?php } ?>
				</span>
			</td>
		</tr>
		<tr>
			<td align="center">
				<button>Sửa</button>
			</td>
		</tr>
	</table>
</form>
<?php } else { ?>
       <?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php mysqli_close($connect) ?>
</body>
</html>