<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		*{
			padding: 0;
			margin: 0;
			font-family: Arial;
		}
		.header{
			text-align: center;
			width: 100%;
			height: 140px;
			/* background: pink; */
			position: relative;
		}
		.header > .trai{
			width: 20%;
			height: 140px;
			/* background: purple; */
			float: left;
			/* position: absolute; */
		}
		.header > .phai{
			width: 80%;
			height: 140px;
			background: #ededed;
			float: left;
			/* position: absolute; */
		}
		.img{
			width: 100%;
			height: 140px;
	</style>

<?php  
include '../../connect.php';
$ma = $_SESSION['ma_admin'];
$sql = "select * from admin where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<div class="header">
		<div class="trai">
			<a href="../view_admin/index.php">
				<img class="img" src="../../image/logo.jpg" alt="">
			</a>
		</div>
		<div class="phai">
			<?php if($_SESSION['cap_do']==1){ ?>
				<h1>
					Xin chào <?php echo $each['ten_admin'] ?>
				</h1>
			<?php } else { ?>
				<h1>
					Xin chào <?php echo $each['ten_admin'] ?>
				</h1>
			<?php } ?>
		</div>
</div>