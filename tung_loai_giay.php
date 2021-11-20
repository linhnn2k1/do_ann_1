<title>Từng loại giày</title>
<style type="text/css">
	#items{
		margin-top: 190px;
		padding: 0;
		width: 100%;
		height: 700px;
		/* background: red; */
	}
	.tung_san_pham{
		width: 19%;
		float: left;
		height: 320px;
		margin: 5px;	
		border: 1px solid #dbdad5;
	}
	.tung_san_pham > .item{
		margin: 9px;
		text-align: center;
		font-size: 14px;
	}
	.tung_san_pham > .item p{
		text-align: center;
		font-size: 18px;
		color: red;
	}
	.tung_san_pham > .item > .nha_san_xuat{
		text-align: center;
		font-size: 18px;
		color: #737373;
	}
	.tung_san_pham > .item > img{
		height: 200px;
		width: 100%;
	}
	.view_item{
		text-decoration: none;
		color: black;
	}
	#items:hover > .tung_san_pham {
		border: 1px solid red;
	}
	.error{
		position: relative;
		color: red;
		text-align: center;
		top: 10px;
	}
</style>


<?php 
include 'connect.php';
$ma = $_GET['ma'];
$sql_sp = "select san_pham.ma, san_pham.ten_san_pham, san_pham.anh, san_pham.gia, nha_san_xuat.ten
	from san_pham
	join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat 
	where ma_nha_san_xuat = '$ma'";
$result_sp = mysqli_query($connect, $sql_sp);
$thu_muc_anh = 'image/';
?>
<?php 
	include 'fixed.php'; 
?>
<?php if(!empty($_GET['ma'])){ ?>
<div id="items">
		<!-- nút quay lại -->
	<a href="index.php">
		<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
	</a>
	<h1 class="error">
		<?php 
		if(mysqli_num_rows($result_sp) == 0){
			echo 'Sản phẩm không tồn tại!';
		}
		?>
	</h1>
	<?php foreach ($result_sp as $each_sp): ?>
	<a href="xem_san_pham.php?ma=<?php echo $each_sp['ma'] ?>" class="view_item">
	<div class="tung_san_pham">
		<div class="item">
			<img src="<?php echo $thu_muc_anh . $each_sp['anh'] ?>">
			<h2>
				<?php echo $each_sp['ten_san_pham'] ?>
			</h2>
			<p>
				<?php echo $each_sp['gia'] ?>đ
			</p>
			<p class="nha_san_xuat">
				<?php echo $each_sp['ten'] ?>
			</p>
		</div>
	</div>
	</a>
	<?php endforeach ?>
</div>
<?php } else { ?>
		<?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>
<?php include('footer.php') ?>

