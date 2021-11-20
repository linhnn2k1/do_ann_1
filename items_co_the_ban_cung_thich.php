<style type="text/css">
	#co_the_ban_cung_thich{
		width: 100%;
		height:360px;
		/* background: red; */
	}
	.tung_san_pham{
		width: 18%;
		float: left;
		height: 300px;
		margin: 10px;	
		border: 1px solid #dbdad5;
	}
	.tung_san_pham > .item{
		margin: 9px;
		text-align: center;
		font-size: 14px;
	}
	.tung_san_pham > .item > .gia{
		text-align: center;
		font-size: 18px;
		color: red;
		bottom: 5px;
	}
	.tung_san_pham > .item > .nha_san_xuat{
		text-align: center;
		font-size: 18px;
		color: #737373;
		bottom: 5px;
	}
	.tung_san_pham > .item > img{
		height: 150px;
		width: 100%;
	}
	.view_item{
		text-decoration: none;
		color: black;
	}
	.tung_san_pham:hover{
		box-shadow: 0px 8px 16px 0px red;
		}
</style>

<?php 
include 'connect.php';
$sql = "select san_pham.ma, san_pham.ten_san_pham, san_pham.anh, san_pham.gia, nha_san_xuat.ten
	from san_pham
	join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
	order by rand()
	limit 5 offset 15";
$result = mysqli_query($connect, $sql);
$thu_muc_anh = 'image/';

?>
<div id="co_the_ban_cung_thich">
	<?php foreach ($result as $each): ?>
		<a href="xem_san_pham.php?ma=<?php echo $each['ma'] ?>" class="view_item">
			<div class="tung_san_pham">
				<div class="item">
					<img src="<?php echo $thu_muc_anh . $each['anh'] ?>">
					<h2>
						<?php echo $each['ten_san_pham'] ?>
					</h2>
					<p class="gia">
						<?php echo $each['gia'] ?>đ
					</p>
					<p class="nha_san_xuat">
						<?php echo $each['ten'] ?>
					</p>
				</div>	
			</div>
		</a>
	<?php endforeach ?>
</div>
<?php mysqli_close($connect) ?>
