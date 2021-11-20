<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm nhà sản xuất</title>
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
		.span_loi{
			color: red;
		}
		input{
			font-size: 20px;
			padding: 5px;
			margin: 5px;
		}
		button{
			cursor: pointer;
		}
	</style>
</head>
<body>
<!-- menu -->
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
include '../../connect.php';
?>
<!-- nút quay lại -->
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<br>
<h1 style="text-align: center">
	Thêm nhà sản xuất
</h1>
<form method="post" action="process_insert.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<label for="ten_nha_san_xuat">Tên nhà sản xuất</label>
			</td>
			<td>
				<input size="30px" type="text" name="ten_nha_san_xuat" id="ten_nha_san_xuat">
				<br>
				<span class="span_loi" id="span_loi">
					<?php if(isset($_GET['loi'])) { ?>
						<?php echo $_GET['loi'] ?>
					<?php } ?>
				</span>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button onclick="return them()" style="font-size: 20px">Thêm</button>
			</td>	
		</tr>
	</table>
</form>
<script>
	function them(){
		var check_error = false;
		var ten_nha_san_xuat = document.getElementById('ten_nha_san_xuat').value;
		var ten_nha_san_xuat_regex = /[^\s]/;
		if(ten_nha_san_xuat_regex.test(ten_nha_san_xuat)){
			document.getElementById('span_loi').innerHTML = '';
		} else {
			document.getElementById('span_loi').innerHTML = 'Không được để trống';
			check_error = true;
		}

		if(check_error == true){
			return false;
		} else {
			alert('Thêm thành công!');
			return true;
		}
	}
</script>
<?php mysqli_close($connect) ?>
</body>
</html>