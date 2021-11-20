<style type="text/css">
	#top_sale{
		margin: 0;
		padding: 0;
		width: 100%;
		height: 400px;
		background: black;
	}
	.tung_san_pham{
		width: 19%;
		float: left;
		height: 320px;
		margin: 5px;	
		border: 1px solid #dbdad5;
		background: white;
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
	#top_sale > .view_item{
		text-decoration: none;
		color: black;
	}
	.tung_san_pham:hover{
		box-shadow: 0px 8px 16px 0px red;
	}

	.text_top_sale{
		width: 100%;
		height: 40px;
		position: relative;
	}
	.text_top_sale h2{
		position: relative;
		top: 9px;
		text-align: center;
		color: whitesmoke;
	}
	.them{
		position: absolute;
		z-index: 99;
		font-size: 14px;
	}
	button{
		z-index: 99;
		cursor: pointer;
	}
</style>

<?php 
include 'connect.php';
$sql_sp = "select san_pham.*,nha_san_xuat.ten, sum(hoa_don_chi_tiet.so_luong) from hoa_don 
		join hoa_don_chi_tiet on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
		join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham 
		join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
		where tinh_trang = 2 and month(thoi_gian_mua) = month(current_date())
		and year(thoi_gian_mua) = year(current_date()) group by hoa_don_chi_tiet.ma_san_pham order by sum(hoa_don_chi_tiet.so_luong) desc limit 5";
$result_sp = mysqli_query($connect, $sql_sp);
$thu_muc_anh = 'image/';
?>

<div id="top_sale">
	<div class="text_top_sale">
		<h2>
			Sản phẩm bán chạy
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
