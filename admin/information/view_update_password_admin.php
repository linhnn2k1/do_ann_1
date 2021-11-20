<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Đổi mật khẩu</title>
	<style type="text/css">
		.span_error{
			color: red;
		}
		table{
			margin: auto;
			border-collapse: collapse;
		}
		table th{
			background: #0a0f45;
			color: #fab8a7;
		}
		table td, table th {
			border: 1px solid #bdbbbb;
			padding: 3px;
		}
		table tr:nth-child(even){
			background-color: #f2f2f2;
		}
		table tr:hover {
			background-color: #f5f5f5;
		}
		td input{
			width: 100%;
		}
		button{
			cursor: pointer;
		}
	</style>
</head>
<body>
<?php 
include '../common/header_admin.php'; 
include '../common/menu_admin.php';
?>
<!-- nút quay lại -->
<a href="information_admin.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>

<?php 
$ma = $_SESSION['ma_admin'];
require '../../connect.php';
?>
<h1 style="text-align: center">
	Đổi mật khẩu
</h1>
<form action="process_update_password_admin.php?ma=<?php echo $ma ?>" method="post">
<table>
	<tr>
		<th>
			Nhập mật khẩu hiện tại 
		</th>
		<td>
			<input type="password" name="mat_khau_cu" id="mat_khau_cu">
			<span class="span_error">
			<?php if(isset($_GET["loi"])){?>
                   <?php echo $_GET["loi"]?>
            <?php } ?>
			</span>
		</td>

	</tr>
	<tr>
		<th>
			Nhập mật khẩu mới 
		</th>
		<td>
			<input type="password" name="mat_khau_moi" id="mat_khau_moi">
			<span id="mat_khau_moi_error" class="span_error">
	                                    
	       	</span>
		</td>
	</tr>
	<tr>
		<td colspan="2" style="text-align: center;">
			<button style="font-size: 20px" onclick="return update_password()">
				Đổi mật khẩu
			</button>
		</td>
	</tr>
</table>

<script type="text/javascript">
	function update_password(){
		var check_error = false;
		var mat_khau_moi = document.getElementById('mat_khau_moi').value;
        var mat_khau_moi_regex = /[^\s]/;
        if(mat_khau_moi_regex.test(mat_khau_moi)){
            document.getElementById('mat_khau_moi_error').innerHTML='';
        }
        else {
            document.getElementById('mat_khau_moi_error').innerHTML='không được để trống';
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