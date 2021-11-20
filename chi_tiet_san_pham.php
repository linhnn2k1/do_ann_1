<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	#full_detail{
		width: 100%;
		height: 1700px;
		margin: 0px;
		padding: 0px;
		background: #ebebeb;
	}
	#detail{
		width: 90%;
		height: 1800px;
		background: white;
		margin: auto;
	}
	#detail > .tren{
		width: 100%;
		height: 450px;
		float: left;
		position: relative;
	}
	#detail > .duoi{
		width: 100%;
		height: 1000px;
		float: left;
		position: relative;
		/* background: red; */
		margin: 35px 0 0 0;
	}
	#detail > .tren > .trai{
		width:40%;
		height: 450px;
		float: left;
		position: absolute;
	}
	#detail > .tren > .phai{
		width: 58%;
		height: 450px;
		float: left;	
		position: absolute;
		right: 0px;
	}
	#detail > .tren > .phai > .ten{
		font-size: 35px;
		position: absolute;
		top: 5px;
	}
	#detail > .tren > .phai > .ten_nsx{
		font-size: 22px;
		position: absolute;
		top: 85px;
		color: #807e7e;
	}
	#detail > .tren > .phai > .gia{
		font-size: 35px;
		position: absolute;
		top: 120px;
		font-weight: bold;
	}
	#detail > .tren > .phai > .mua_hang{
		font-size: 25px;
		position: absolute;
		top: 200px;
	}
	#detail > .tren > .phai > .mua_hang > .size{
		font-size: 20px;
		position: absolute;
		left: 125px;
	}
	#detail > .tren > .phai > .mua_hang > .so_luong{
		padding: 5px;
		position: absolute;
		top: 55px;
		font-size: 20px;
	}
	#detail > .tren > .phai > .mua_hang > .them_vao_gio_hang{
		padding: 8px;
		width: 260px;
		position: absolute;
		top: 213px;
		font-size:24px;
		background: #ffd9bf;
		color: #f53e11;
		border: 1px solid #f53e11;
		border-radius: 3px;
	}
	#detail > .tren > .phai > .mua_hang > .mua_ngay{
		padding: 8px;
		width: 260px;
		position: absolute;
		top: 213px;
		left: 280px;
		font-size:24px;
		background: #f53e11;
		color: white;
		border: 1px solid #ffd9bf;
		border-radius: 3px;
	}
	#detail > .tren > .trai > .anh_san_pham img{
		width: 100%;
		height: 450px;	
		margin: 10px;
	}
	#full_detail> #detail > .tren > hr{
		border: 1px solid #ded9d7;
		width: 100%;
		position: absolute;
		top: 480px;
	}
	#detail > .duoi > .tren{
		width: 100%;
		height: 300px;
		/* background: pink; */
		float: left;
	}
	#detail > .duoi > .duoi{
		width: 100%;
		height: 450px;
		/* background: red; */
		float: left;
	}
	#detail > .duoi > .tren > .tieu_de{
		font-size: 30px;
		color: black;
		position: absolute;
		left: 480px;
		top: 5px;
	}
	#detail > .duoi > .tren > .mo_ta{
		width: 100%;
		font-size: 20px;
		color: black;
		position: absolute;
		left: 5px;
		top: 50px;
	}
	.them_vao_gio_hang > a{
		text-decoration: none;
		color: #f53e11;
	}
	.them_vao_gio_hang{
		cursor: pointer;
	}
	.mua_ngay{
		cursor: pointer;
		border: none;
		background: none;
		color: #f53e11;
		text-align: center;
	}
	.binh_luan{
		width: 100%;
		height: 550px;
		background: #ededed;
		float: left;
	}
	.table_binh_luan{
		width: 100%;
		border-collapse: collapse;
		background: white;
		border: 1px solid #ffae00;
		margin: 5px;
	}
	.text_binh_luan{
		position: relative;
		top: 5px;
		left: 5px;
		margin-bottom: 5px;
	}
	.form_binh_luan{
		position: relative;
		top: 0px;
	}
	.form_binh_luan .noi_dung{
		width: 30%;
		height: 50px;
	}
	.error{
		position: relative;
		color: red;
		text-align: center;
		top: 10px;
	}
	button{
		font-size: 20px;
		cursor: pointer;
	}
	.in_dam{
		font-weight: bold;
	}
	.content{
		width: 100%;
		background: white;
	}
	.thoi_gian{
		position: relative;
		font-size: 14px;
	}
	.noi_dung_binh_luan{
		font-size: 20px;
	}
</style>

<?php if(!empty($_GET['ma'])){ ?>
<?php 
require 'connect.php';
$ma = $_GET['ma'];
$sql = "
select san_pham.ma, san_pham.ten_san_pham, san_pham.gia, san_pham.anh, san_pham.mo_ta, nha_san_xuat.ten 
from san_pham join nha_san_xuat on san_pham.ma_nha_san_xuat = nha_san_xuat.ma
where san_pham.ma = $ma";
$result = mysqli_query($connect, $sql);
$each = mysqli_fetch_array($result);
$dem = mysqli_num_rows($result);
$thu_muc_anh = 'image/';

$sql_binh_luan = "select khach_hang.email, binh_luan.noi_dung, binh_luan.thoi_gian from binh_luan
join khach_hang on binh_luan.ma_khach_hang = khach_hang.ma
join san_pham on binh_luan.ma_san_pham = san_pham.ma where ma_san_pham = $ma";
$result_binh_luan = mysqli_query($connect,$sql_binh_luan);
?>
<!-- nút quay lại -->
<a href="index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<h1 class="error">
	<?php if($dem == 0){
		echo 'Không tồn tại sản phẩm!';
	}
	?>
</h1>

<div id="full_detail">
	<div id="detail">
		<?php foreach ($result as $each): ?>
			<div class="tren">
				<div class="trai">
					<div class="anh_san_pham">
						<img src="<?php echo $thu_muc_anh . $each['anh'] ?>">
					</div>
				</div>
				<div class="phai">
					<p class="ten">
						<?php echo $each['ten_san_pham'] ?>
					</p>
					<p class="ten_nsx">
						<?php echo $each['ten'] ?>
					</p>
					<p class="gia">
						<?php echo $each['gia'] ?>đ
					</p>
					<form method="post" action="" class="mua_hang">
						<a class="them_vao_gio_hang" href="process_them_vao_gio_hang.php?ma=<?php echo $each['ma'] ?>">
							<i class="fa fa-shopping-cart"></i> 
							Thêm vào giỏ hàng
						</a>
						<a class="mua_ngay" href="process_mua_ngay.php?ma=<?php echo $each['ma'] ?>">
								Mua ngay
						</a>
					</form>
				</div>
				<hr>
			</div>
			<div class="duoi">
				<div class="tren">
					<span class="tieu_de">
						Mô tả sản phẩm
					</span>
					<p class="mo_ta">
						<?php echo $each['mo_ta'] ?>
					</p>
				</div>
				<!-- bình luận -->
				<div class="binh_luan">
						<div class="text_binh_luan">
							<h2>
								Bình luận
							</h2>
						</div>
						<hr>	
						<?php if(isset($_SESSION['ma_khach_hang'])) {?>
						<div class="form_binh_luan">
							<form method="post" action="process_insert_binh_luan.php" enctype="multipart/form-data">
								<input type="hidden" name="ma" value="<?php echo $ma ?>">
									<input type="textarea" class="noi_dung" name="noi_dung" placeholder="Nhập bình luận">
									<button>Đăng</button>
							</form>
						</div>
						<?php }?>
						<?php foreach ($result_binh_luan as $each): ?>
							<table class="table_binh_luan">
							<div class="content">
								<div class="email in_dam">
									<i class='fas fa-user-edit' style='font-size:36px'></i>
										<?php echo $each['email'] ?>
								</div>
								<div class="thoi_gian">
									<?php echo date_format(date_create($each['thoi_gian']),'H:i:s d-m-Y')?>
								</div>
								<br>
								<div class="noi_dung_binh_luan">
									<?php echo $each['noi_dung'] ?>
								</div>
							</div>	
						</table>
						<?php endforeach ?>
				</div>
				<div class="duoi">
					<?php include'co_the_ban_cung_thich.php' ?>
					<?php include'items_co_the_ban_cung_thich.php' ?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
<?php } else { ?>
	<?php echo '<script>alert("Lỗi!");
	location.replace("index.php");</script>'; ?>
<?php } ?>