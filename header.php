<!-- <?php session_start(); ?> -->
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
		background: white;
		position: relative;
	}
	.header > .trai{
		width: 20%;
		height: 140px;
		/* background: purple; */
		float: left;
		position: absolute;
	}
	.header > .giua{
		width: 60%;
		height: 140px;
		/* background: blue; */
		float: left;
		position: absolute;
		left: 273px;
		text-align: center;
	}
	.header > .phai{
		width: 20%;
		height: 140px;
		/* background: yellow; */
		position: absolute;
		float: left;
		right: 0px;

	}
	.header > .phai > .tren{
		width: 100%;
		height: 30px;
		position: absolute;
		float: left;
	}
	.img{
		width: 100%;
		height: 140px;
	}
	.form_search input{
		background: white;
		width: 248px;
		border: none;
		outline: none;
		padding: 9px 38px 9px 15px;
		border-radius: 20px;
		top: 35px;
		position: absolute;
		left: 60px;
		font-size: 20px;
		border: 2px solid;
		width: 540px; 
		height: 45px;
	}
	.form_search > .search_button{
		position: absolute;
		top: 35px;
		left: 602px;
		border: none;
		background: white;
		padding: 9px 12px;
		right: 100px;
		font-size: 25px;
	}
	.shopping button{
		background: white;
		border: none;
		top: 50px;
		position: absolute;
		right: 50px;
	}
	.form_search a{
		color: black;
	}
	.shopping a{
		color: black;
		font-size: 60px;
		background: none;
	}
	.shopping > .login{
		background: none;
		border: none;
		/* font-size: 15px; */
		position: absolute;
		top: 0px;
	}
	.login button{
		background: black;
		border: none;
		border-radius: 5px;
		position: absolute;
	}
	.login > .dang_nhap{
		right: 140px;
		top: 10px;
		height: 30px;
		width: 140px;
		text-decoration: none;
		color: black;
		font-size: 20px;
		position: absolute;
	}
	.login > .dang_ky{
		right: 30px;
		top: 10px;
		height: 30px;
		z-index: 99;
		width: 140px;
		text-decoration: none;
		color: black;
		font-size: 20px;
		position: absolute;
	}
	.login > .dang_xuat{
		right: 10px;
		top: 10px;
		height: 30px;
		z-index: 99;
		text-decoration: none;
		color: black;
		font-size: 20px;
		position: absolute;
	}
	.login > .xin_chao{
		right: 140px;
		top: 10px;
		z-index: 99;	
		color: black;
		font-size: 17px;
		position: absolute;
	}
	.login > .dang_nhap:hover {
		color: red;
	}
	.login > .dang_ky:hover {
		color: red;
	}
	.login > .dang_xuat:hover {
		color: red;
	}
</style>
<?php 
$tim_kiem = '';
if(isset($_GET['tim_kiem'])){
	$tim_kiem = $_GET['tim_kiem'];
}
?>
<div class="header">
		<div class="trai">
			<a href="../Do_an_1/">
				<img class="img" src="image/logo.jpg" alt="">
			</a>
		</div>
		<div class="giua"> 	
			<form action="all_items.php?tim_kiem=<?php echo $tim_kiem ?>" method="get" class="form_search">
				<input type="search" name="tim_kiem" placeholder="Bạn muốn tìm giày gì?" value="<?php echo $tim_kiem ?>"> 	
				<button class="search_button" type="submit">
					<a href=""><i class="fa fa-search"></i></a>
				</button>
			</form>
		</div>
		<div class="phai">
			<div class="tren">
				<!-- nút đăng nhập/đăng ký -->
				<div class="login">
					<?php if(empty($_SESSION['ma_khach_hang'])){ ?>
						<a href="khach_hang/dang_nhap_khach_hang.php" class="dang_nhap">Đăng nhập
						</a>
						<a href="khach_hang/dang_ky_khach_hang.php" class="dang_ky">Đăng ký
						</a>
					<?php } else { ?> 
						<p class="xin_chao">
						Xin chào bạn <?php echo $_SESSION['ten_khach_hang'] ?>
						</p>
						<a href="" class="dang_xuat" id="log_out" onclick="log_out()">
							Đăng xuất
						</a>
					<?php } ?>
				</div>
			</div>
			<form action="" class="shopping">
				<button type="button">
					<!-- nút xem giỏ hàng -->
					<a href="xem_gio_hang.php">
						<i class="fa fa-shopping-cart"></i>
					</a>
				</button>
			</form>
		</div>
</div>	
<script type="text/javascript">
	function log_out(){
		var i = confirm('Bạn có chắc chắn đăng xuất!');
		if(i==true){
			document.getElementById('log_out').href='khach_hang/process_logout_khach_hang.php';
		}
		else{
			//không đăng xuất
		}
	}
</script>