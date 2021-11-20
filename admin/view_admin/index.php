<?php include('../check_admin.php') ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ</title>
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
		ul{
			line-height: 78px;
			background-color: black;
			list-style-type: none;
			height: 50px;
			width: 100%;
			display: flex;
			justify-content: center;
			/* position: absolute; */  
			/* float: left; */
		}
		ul li{
			width: 240px;
			height: 38px;
			/* left: 50px; */
			text-align: center;
			top: 30px;
			/* display: inline-block; */
			margin: -14px;
			/* border: 1px solid red; */

		}
		ul li a{
			padding: 14px;
			text-decoration: none;
			color: white;
			font-size: 17px;
		}
		ul li:hover a{
			background: #00eaff;
			color: black;
		}
		.banner_admin{
			position: absolute;
			left: 350px;
		}
	</style>
</head>
<body>
<?php 
include '../common/header_admin.php';
include '../common/menu_admin.php';
include '../quan_ly_doanh_thu/index.php';
?>
<img class="banner_admin" src="../../image/banner_admin.jpg" alt="">

</body>
</html>