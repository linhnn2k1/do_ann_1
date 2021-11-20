<?php 
include 'check_khach_hang.php'; 
include 'check_trang_thai_tai_khoan.php';
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Giỏ hàng</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
	html{
		scroll-behavior: smooth;
	}
	*{
		padding: 5px;
		margin: 0;
		font-family: Arial;
	}
	.tong_gio_hang{
		width: 100%;
		height: 800px;
		margin-top: 190px;
	}
	.banner_shopping{
		position: relative;
		left: 490px;
		width: 25%;
		height: 250px;
	}
	a{
		text-decoration: none;
	}
	.trong{
		position: absolute;
		left: 500px;
		color: #575757;
	}
	.quay_lai_mua_hang{
		padding: 8px;
		width: 260px;
		position: absolute;
		top: 574px;
		left: 530px;
		font-size:24px;
		background: #f53e11;
		color: white;
		border: 1px solid #ffd9bf;
		border-radius: 3px;
	}
	.quay_lai_mua_hang a{
		color: #ffd9bf;
	}
	td a{
		cursor: pointer;
	}
	td{
		width: 16%;
	}
	.dat_hang{
		width: 100%;
		height: 1000px;
		background: black;
		opacity: 0.7;
	}
	.form_dat_hang{
		position: relative;
		top: 180px;
		margin: auto;
		width: 50%;
		height: 500px;
		background: white;
		border-radius: 4px;
		text-align: left;
	}
	.table_form{
		width: 100%;
		position: relative;
		top: 30px;
		font-size: 16px;
	}
	h1{
		text-align: center;
		top: 5px;
		position: relative;
		color: black;
	}
	input{
		font-size: 16px;
	}

	.popup_dat_hang .overlay{
		position: fixed;
		top: 0px;
		left: 0px;
		width: 100vw;
		height: 100vh;
		background: rgba(0,0,0,0.7);
		z-index: 1;
		display: none;
	}
	.popup_dat_hang .content{
		font-size: 16px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%) scale(0);
		background: #fff;
		width: 450px;
		height: 250px;
		z-index: 100;
		text-align: center;
		padding: 20px;
		box-sizing: border-box;
		border-radius: 5px;
	}
	.popup_dat_hang .close{
		cursor: pointer;
		position: absolute;
		right: 20px;
		top: 20px;
		width: 30px;
		height: 30px;
		background: #222;
		color: #fff;
		font-size: 25px;
		line-height: 30px;
		text-align: center;
		border-radius: 50%;
		z-index: 1;
	}
	.popup_dat_hang.active .overlay{
		display: block;
	}
	.popup_dat_hang.active .content{
		transition: all 300ms ease-in-out;
		transform: translate(-50%, -50%) scale(1);
	}
	.bt_dat_hang{
		position: relative;
		top: 30px;
		font-size: 20px;
	}
	.bt_popup_dat_hang{
		cursor: pointer;
		position: absolute;
		margin: 10px;
		padding: 5px;
		font-size: 25px;
		right: 0px;
		background: #fc7703;
		color: white;
	}
	.span_error{
		color: red;
	}
	button{
		cursor: pointer;
	}
</style>

<?php 
include 'fixed.php'
?>

<?php 
include('connect.php');
$ma = $_SESSION['ma_khach_hang'];
$sql = "select * from khach_hang where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<!-- Thông tin sản phẩm trong giỏ hàng -->
<div class="tong_gio_hang">
	<!-- nút quay lại -->
	<a href="index.php">
		<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
	</a>
	<h1 style="text-align: center">
		Giỏ hàng của <?php echo $each['ten_khach_hang'] ?>
	</h1>
	<br>
	<?php if(!empty($_SESSION['gio_hang'])){ ?>
		<table border="2px" width="100%" style="border-collapse: collapse">
			<tr>
				<th>
					Tên
				</th>
				<th>
					Ảnh
				</th>
				<th>
					Số lượng
				</th>
				<th>
					Giá
				</th>
				<th>
					Tổng
				</th>
				<th>
					Xóa
				</th>
			</tr>
			<!-- in giỏ hàng -->
			<?php foreach ($_SESSION['gio_hang'] as $ma_san_pham => $so_luong): ?>
				<?php
				$thu_muc_anh = 'image/';
				$sql = "select * from san_pham where ma = '$ma_san_pham'";
				$result = mysqli_query($connect,$sql);
				$each = mysqli_fetch_array($result); 
				?>
				<tr>
					<td>
						<?php echo $each['ten_san_pham'] ?>
					</td>
					<td>
						<img style="height: 200px; width: 100%" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
					</td>
					<td style="text-align: center">
						<!-- Tăng giảm số lượng sản phẩm -->
						<a href ="thay_doi_so_luong_san_pham_gio_hang.php?ma=<?php echo $ma_san_pham ?>&kieu=tru">
							<i class="fa fa-minus" style="font-size:15px"></i>
						</a>
						<?php echo $so_luong ?>
						<?php if($so_luong < 10) { ?>
							<a href="thay_doi_so_luong_san_pham_gio_hang.php?ma=<?php echo $ma_san_pham ?>&kieu=cong">
								<i class="fa fa-plus" style="font-size:15px"></i>
							</a>
						<?php } ?>
					</td>
					<td>
						<?php echo $each['gia'] ?>
					</td>
					<td>
						<?php echo $so_luong * $each['gia'] ?>
						<input type="hidden" value="<?php $tong += $so_luong * $each['gia'] ?>"> 
					</td>
					<td style="text-align: center">
						<a onclick="return confirm('Bạn có chắc chắn xóa sản phẩm này?')" href="xoa_san_pham_gio_hang.php?ma=<?php echo $ma_san_pham ?>" style="color: red">
							<i class="fa fa-close" style="font-size:36px"></i>
						</a>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
		<!-- Tổng tiền -->
		<h1 style="text-align: right">
			Tổng tiền: 
			<?php if(isset($tong)){ ?>
				<?php echo $tong ?>
			<?php } else{ ?>
				<?php echo 0 ?>
			<?php } ?>
		</h1>

		<button onclick="popup_dat_hang()" class="bt_popup_dat_hang">
			Đặt hàng
		</button>

		<!-- Hiển thị khi không có sản phẩm trong giỏ hàng -->
	</div>
<?php } else { ?>
	<img class="banner_shopping" src="image/banner_shopping.jpg" alt="">
	<h2 class="trong">
		Giỏ hàng của bạn còn trống
	</h2>
	<button class="quay_lai_mua_hang" type="button">
		<a href="index.php">Quay lại mua hàng</a>
	</button>
<?php } ?>
</div>
<!-- Popup hiển thị ra form đặt hàng -->
<div class="popup_dat_hang" id="popup_1">
	<div class="overlay"></div>
	<div class="content">
		<div class="close" onclick="popup_dat_hang()">&times;</div>
		<?php 
		include 'connect.php';
		$ma = $_SESSION['ma_khach_hang'];
		$sql = "select * from khach_hang where ma = '$ma'";
		$result = mysqli_query($connect,$sql);
		$each = mysqli_fetch_array($result);
		?>
		<form action="process_dat_hang.php" method="post">
			<h1>
				Thông tin đặt hàng
			</h1>
			<table class="table_form">
				<tr>
					<td>
						<label for="ten_nguoi_nhan">Tên người nhận</label>
					</td>
					<td>
						<input type="text" name="ten_nguoi_nhan" id="ten_nguoi_nhan" value="<?php echo $each['ten_khach_hang']?>">
						<br>
						<span class="span_error" id="ten_nguoi_nhan_error">
							
						</span>
					</td>
				</tr>
				<tr>
					<td>
						<label for="sdt_nguoi_nhan">Số điện thoại</label>
					</td>
					<td>
						<input type="number" name="sdt_nguoi_nhan" id="sdt_nguoi_nhan" value="<?php echo $each['sdt']?>">
						<br>
						<span class="span_error" id="sdt_nguoi_nhan_error">
							
						</span>
					</td>
				</tr>
				<tr>
					<td>
						<label for="dia_chi_nguoi_nhan">Địa chỉ người nhận</label>
					</td>
					<td>
						<input type="text" name="dia_chi_nguoi_nhan" id="dia_chi_nguoi_nhan" value="<?php echo $each['dia_chi']?>">
						<br>
						<span class="span_error" id="dia_chi_nguoi_nhan_error">
							
						</span>
					</td>
				</tr>
			</table>
			<button class="bt_dat_hang" onclick="return dat_hang()">
				Đặt hàng
			</button>
		</form>
	</div>
</div>

<script type="text/javascript">
	function popup_dat_hang(){
		document.getElementById('popup_1').classList.toggle("active");
	}
	// regex đặt hàng
	function dat_hang(){
		var check_error = false;
        var ten_nguoi_nhan = document.getElementById('ten_nguoi_nhan').value;
        var ten_nguoi_nhan_regex = /[^\s]/;
            if(ten_nguoi_nhan_regex.test(ten_nguoi_nhan)){
                document.getElementById('ten_nguoi_nhan_error').innerHTML='';
            }
            else {
                document.getElementById('ten_nguoi_nhan_error').innerHTML='Không được để trống';
                check_error = true;
            }
        var sdt_nguoi_nhan = document.getElementById('sdt_nguoi_nhan').value;
        var sdt_nguoi_nhan_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if(sdt_nguoi_nhan_regex.test(sdt_nguoi_nhan)){
                document.getElementById('sdt_nguoi_nhan_error').innerHTML='';
            }
            else {
                document.getElementById('sdt_nguoi_nhan_error').innerHTML='Số điện thoại không hợp lệ';
                check_error = true;
            }
        var dia_chi_nguoi_nhan = document.getElementById('dia_chi_nguoi_nhan').value;
        var dia_chi_nguoi_nhan_regex = /[^\s]/;
            if(dia_chi_nguoi_nhan_regex.test(dia_chi_nguoi_nhan)){
                document.getElementById('dia_chi_nguoi_nhan_error').innerHTML='';
            }
            else {
                document.getElementById('dia_chi_nguoi_nhan_error').innerHTML='Không được để trống';
                check_error = true;
            }
            if(check_error){
            	return false;
            }
	}
</script>
<?php include 'footer.php' ?>
