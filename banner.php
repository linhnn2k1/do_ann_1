<style type="text/css">
	.slide_banner{
		padding: 0;
		margin: auto;
		width: 100%;
		height: 350px;
		margin-top: 190px;
	}
</style>	
<?php 
require 'connect.php';
$sql = "select * from nha_san_xuat where ma = 2";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<div class="slide_banner">
		<div class="banner">
			<a href="tung_loai_giay.php?ma=<?php echo $each['ma'] ?>">
			<img src="image/banner.jpg" style="width: 100%; height: 350px;">
			</a>
		</div>
</div>

