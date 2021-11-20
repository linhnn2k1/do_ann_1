<?php 
include 'check_trang_thai_tai_khoan.php';
?>
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
			font-family: arial;
		}
		.dat_hang{
			width: 100%;
			height: 1000px;
			background: black;
			opacity: 0.7;
		}
		.form_dat_hang{
			position: relative;
			top: 180px;
			margin: auto;
			width: 50%;
			height: 250px;
			background: white;
			border-radius: 4px;
			text-align: left;
		}
		.table_form{
			width: 100%;
			position: relative;
			top: 30px;
			font-size: 20px;
		}
		h1{
			text-align: center;
			top: 5px;
			position: relative;
			color: black;
		}
		.bt_dat_hang{
			position: absolute;
			top: 170px;
			font-size: 20px;
         	background: black;
         	color: white;
         	width: 100px;
         	height: 30px;
         	margin: auto;
        }
        input{
        	font-size: 20px;
        }
	</style>
</head>
<body>
<div class="dat_hang">
	<?php 
		include 'connect.php';
		$ma = $_SESSION['ma_khach_hang'];
		$sql = "select * from khach_hang where ma = '$ma'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
		?>
	
<form action="process_dat_hang.php" method="post">
	<div class="form_dat_hang">
		<h1>
			Thông tin đặt hàng
		</h1>
	<table class="table_form">
		<tr>
			<td>
				Tên người nhận
			</td>
			<td>
				<input type="text" name="ten_nguoi_nhan" value="<?php echo $each['ten_khach_hang']?>" style="width: 350px">
			</td>
		</tr>
		<tr>
			<td>
				Số điện thoại
			</td>
			<td>
				<input type="number" name="sdt_nguoi_nhan" value="<?php echo $each['sdt']?>" style="width: 200px">
			</td>
		</tr>
		<tr>
			<td>
				Địa chỉ người nhận
			</td>
			<td>
				<input type="text" name="dia_chi_nguoi_nhan" value="<?php echo $each['dia_chi']?>" style="width: 400px">
			</td>
		</tr>
	</table>
	<button onclick="alert('Đặt hàng thành công!')" class="bt_dat_hang">
				Đặt hàng
		</button>
	</div>
</form>	
</div>	
</body>
</html>