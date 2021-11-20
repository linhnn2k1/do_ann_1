<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Thêm sản phẩm</title>
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
		.span_error{
			color: red;
		}
		button{
			cursor: pointer;
		}
		input{
			padding: 5px;
		}
	</style>
</head>
<body>
<!-- menu -->
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>
<?php 
include '../../connect.php';

$sql_nsx = "select * from nha_san_xuat";
$result_nsx = mysqli_query($connect,$sql_nsx);
?>
<div class="them">
<!-- nút quay lại -->
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<br>
<h1 style="text-align: center">
	Đăng sản phẩm
</h1>
<form method="post" action="process_insert.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>
				<label for="ten">Nhập tên sản phẩm</label>
			</td>
			<td>
				<input size="30px" type="text" id="ten" name="ten_san_pham">
				<span class="span_error" id="ten_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				<label for="gia">Nhập giá</label>
			</td>
			<td>
				<input size="10px" type="text" id="gia" name="gia">
				<span class="span_error" id="gia_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				<label for="mo_ta">Nhập thông tin sản phẩm</label>
			</td>
			<td>
				<textarea style="width: 235px; height: 100px" id="mo_ta" name="mo_ta"></textarea>
				<span class="span_error" id="mo_ta_error">
					
				</span>
			</td>
		</tr>
		<tr>
			<td>
				Chọn ảnh
			</td>
			<td>
				<input type="file" name="anh" accept="image/*">
			</td>
		</tr>
		<tr>
			<td>
				Nhà sản xuất
			</td>
			<td>
			<select name="ma_nha_san_xuat">
				<?php foreach ($result_nsx as $each_nsx): ?>
					<option value="<?php echo $each_nsx['ma'] ?>">
						<?php echo $each_nsx['ten'] ?>
					</option>
				<?php endforeach ?>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="text-align: center">
				<button style="font-size: 20px" type="submit" onclick="return them()">Thêm</button>
			</td>	
		</tr>
	</table>
</form>
</div>
<script type="text/javascript">
            function them() {
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