<style type="text/css">
		#new_product{
			margin: 0;
			padding: 0;
			width: 100%;
			height: 400px;
			background: white;
		}
		#new_product > .tung_san_pham{
			width: 19%;
			float: left;
			height: 360px;
			margin: 5px;	
			border: 1px solid #dbdad5;
		}
		#new_product > .tung_san_pham > .item{
			margin: 9px;
			text-align: center;
			font-size: 14px;
		}
		#new_product > .tung_san_pham > .item > .gia{
			text-align: center;
			font-size: 18px;
			color: red;
		}
		#new_product > .tung_san_pham > .item > .nha_san_xuat{
			text-align: center;
			font-size: 18px;
			color: #737373;
		}
		#new_product > .tung_san_pham > .item > img{
			height: 200px;
			width: 100%;
		}
		#new_product > .view_item{
			text-decoration: none;
			color: black;
		}
		.text_new_product{
			width: 100%;
			height: 40px;
			position: relative;
		}
		.text_new_product h2{
			position: relative;
			top: 9px;
			text-align: center;
			color: black;
		}
</style>



<?php 
include 'connect.php';
$sql_sp = "select san_pham.ma, san_pham.ten_san_pham, san_pham.anh, san_pham.gia, nha_san_xuat.ten
	from san_pham
	join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
	order by ma desc limit 5";
$result_sp = mysqli_query($connect, $sql_sp);
$thu_muc_anh = 'image/';
?>

<div id="new_product">
	<div class="text_new_product">
		<h2>
			Sản Phẩm Mới
		</h2>
	</div>

	<?php foreach ($result_sp as $each_sp): ?>
		<a href="xem_san_pham.php?ma=<?php echo $each_sp['ma'] ?>" class="view_item">
			<div class="tung_san_pham">
				<div class="item">
					<img src="<?php echo $thu_muc_anh . $each_sp['anh'] ?>">
					<h2>
						<?php echo $each_sp['ten_san_pham'] ?>
					</h2>
					<p class="gia">
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

