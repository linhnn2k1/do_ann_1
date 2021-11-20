<?php include 'check_trang_thai_tai_khoan.php' ?>
<title>Tất cả sản phẩm</title>
<style type="text/css">
		#all_items{
			margin-top: 190px;
			padding: 0;
			width: 100%;
			height: 675px;
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
			color: black;
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
		.so_trang{
			position: relative;
			margin: auto;
			width: 5%;
			display: flex;
		}
		.so_trang > .so{
			font-size: 25px;
		}
</style>
<?php 
include 'fixed.php'
?>
<?php 
$thu_muc_anh = 'image/';

require 'connect.php';

// TÌm kiếm
$tim_kiem = '';
if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
// var_dump($tim_kiem);
// Lấy tất cả toàn bộ sản phẩm
$sql = "select san_pham.ma, san_pham.ten_san_pham, san_pham.anh, san_pham.gia, nha_san_xuat.ten
	from san_pham
	join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
	where san_pham.ten_san_pham like '%$tim_kiem%' or nha_san_xuat.ten like '%$tim_kiem%'";
$result = mysqli_query($connect,$sql);

// Đếm tổng số sản phẩm
$tong_so_san_pham = mysqli_num_rows($result);
$so_san_pham_1_trang = 10;

// Tính số trang
$tong_so_trang = ceil($tong_so_san_pham / $so_san_pham_1_trang);

$trang_hien_tai = 1;
if(isset($_GET['trang'])){
	$trang_hien_tai = $_GET['trang'];
}

$so_san_pham_can_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_1_trang;

// Hiện thị sản phẩm trên 1 trang
$sql = "$sql
limit $so_san_pham_1_trang offset $so_san_pham_can_bo_qua";
$result = mysqli_query($connect,$sql);
?>

<div id="all_items">
	<br>
	<h1 style="text-align: center; color: red">
		<?php if(mysqli_num_rows($result) == 0){
			echo "Không tìm thấy sản phẩm!";
			}
		?>	
	</h1>
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
<div class="so_trang">
	<?php for($i = 1; $i<=$tong_so_trang; $i++){ ?>
		<button class="so">
			<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
				<?php echo $i ?>
			</a>
		</button>
	<?php } ?>
</div>

<?php mysqli_close($connect) ?>
<?php include 'footer.php'?>