<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Sửa sản phẩm</title>
	<link rel="stylesheet" href="">
	<style type="text/css">
		*{
			margin: 0;
			padding: 0;
		}
		table{
			border: 1px solid;
			margin: auto;
		}
		body{
			padding: 0;
			margin: 0 auto;
			overflow-x: hidden; 
			font-family: Arial;
		}
		.update{
			width: 100%;
			height: 600px;
		}
		button{
			font-size: 24px;
			cursor: pointer;
		}
		td input{
			font-size: 17px;
			padding: 3px;
		}
		.span_error{
			color: red;
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
$thu_muc_anh = '../../image/';
require '../../connect.php';
$sql_sp = "select * from san_pham where ma = '$ma'";
$result_sp = mysqli_query($connect,$sql_sp);
$each_sp = mysqli_fetch_array($result_sp);

$sql_nsx = "select * from nha_san_xuat";
$result_nsx = mysqli_query($connect,$sql_nsx);
?>
<?php if(mysqli_num_rows($result_sp) == 0) { ?>
	<h1 style="text-align: center; color: red">
		<?php echo "Không tồn tại sản phẩm!" ?>
	</h1>
<?php } else { ?>
<div class="update">
<h1 style="text-align: center">
	Sửa thông tin sản phẩm
</h1>
<form method="post" action="process_update.php" enctype="multipart/form-data">
	<table>
		<input type="hidden" name="ma" value="<?php echo $ma ?>">
		<tr>
			<td>
				Nhập tên sản phẩm
			</td>
			<td>
				<input size="30px" type="text" name="ten_san_pham" id="ten" value="<?php echo $each_sp['ten_san_pham'] ?>">
				<span class="span_error" id="ten_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Nhập giá
			</td>
			<td>
				<input size="10px" type="text" name="gia" id="gia" value="<?php echo $each_sp['gia'] ?>">
				<span class="span_error" id="gia_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Nhập thông tin sản phẩm
			</td>
			<td>
				<textarea style="width: 235px; height: 100px" name="mo_ta" id="mo_ta"><?php echo $each_sp['mo_ta'] ?></textarea>
				<span class="span_error" id="mo_ta_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Ảnh cũ
			</td>
			<td>
				<input type="hidden" name="anh_cu" value="<?php echo $each_sp['anh'] ?>">
				<img height="200px" src="<?php echo $thu_muc_anh . $each_sp['anh'] ?>">
			</td>
		</tr>
		<tr>
			<td>
				Chọn ảnh mới
			</td>
			<td>
				<input type="file" name="anh_moi">
			</td>
		</tr>
		<tr>
			<td>
				Nhà sản xuất
			</td>
			<td>
				<select name="ma_nha_san_xuat">
				<?php foreach ($result_nsx as $each_nsx): ?>
				<option value="<?php echo $each_nsx['ma'] ?>"
					<?php 
					if($each_nsx['ma'] == $each_sp['ma_nha_san_xuat']) echo "selected";
					?>
					>
					<?php echo $each_nsx['ten'] ?>
				</option>
			<?php endforeach ?>
		</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button onclick="return sua()" type="submit">
					Sửa
				</button>
			</td>
		</tr>
	</table>
</form>
</div>
<?php } ?>
<?php } else { ?>
      <?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<script type="text/javascript">
            function sua() {
            var check_error = false;
            var ten = document.getElementById('ten').value;
            var ten_regex = /[^\s]/;
            if(ten_regex.test(ten)){
                document.getElementById('ten_error').innerHTML='';
            }
            else {
                document.getElementById('ten_error').innerHTML='Không được để trống';
                check_error = true;
            }
            var gia = document.getElementById('gia').value;
            var gia_regex = /^[0-9]*[1-9][0-9]*$/;
            if(gia_regex.test(gia)){
                document.getElementById('gia_error').innerHTML='';
            }
            else {
                document.getElementById('gia_error').innerHTML='Giá trị không hợp lệ';
                check_error = true;
            }
            var mo_ta = document.getElementById('mo_ta').value;
            var mo_ta_regex = /[^\s]/;
            if(mo_ta_regex.test(mo_ta)){
                document.getElementById('mo_ta_error').innerHTML='';
            }
            else {
                document.getElementById('mo_ta_error').innerHTML='Không được để trống';
                check_error = true;
            }
            if(check_error){
            	return false;
            }
        }
</script>
<?php mysqli_close($connect) ?>
</body>
</html>