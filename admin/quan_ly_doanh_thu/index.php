<?php require_once '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		button{
			font-size: 18px;
			cursor: pointer;
		}
		input{
			font-size: 17px;
		}
	</style>
</head>
<body>
	<form action="../quan_ly_doanh_thu/process_quan_ly_doanh_thu.php" method="post">
    Từ <input type="date" name="ngay_bat_dau" value="<?php echo date("Y-m-d");?>">
    đến <input type="date" name="ngay_ket_thuc" value="<?php echo date("Y-m-d");?>">
       <button>Thống kê</button>
</form>
 

</body>
</html>