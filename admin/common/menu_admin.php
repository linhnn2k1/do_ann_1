<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	body{
		padding: 0;
		margin: 0 auto;
		overflow-x: hidden; 
		font-family: Arial;
	}
	ul{
		line-height: 78px;
		background-color: black;
		list-style-type: none;
		height: 50px;
		width: 100%;
		display: flex;
		justify-content: center;
	}
	ul li{
		width: 240px;
		height: 38px;
		text-align: center;
		top: 30px;
		margin: -14px;
		float: left;
	}
	ul li a{
		padding: 14px;
		text-decoration: none;
		color: white;
		font-size: 17px;
	}
	ul li:hover a{
		background: #00eaff;
		color: black;
	}
	ul li ul{
		display: none;
		position: absolute;
		top:190px;
		left: 500px;
		z-index: 99;
	}
	ul li:hover ul{
		display: block;
	}
</style>

<ul>
	<li>
		<a href="../view_admin/index.php">Trang chủ</a>
	</li>
	<li>
		<a href="../quan_ly_san_pham/index.php">Quản lý sản phẩm</a>
	</li>
	<?php if($_SESSION['cap_do']==1) { ?>
		<li>
			<a href="../quan_ly_admin/index.php">Quản lý admin</a>
		</li>
	<?php } ?>
	<li>
		<a href="../quan_ly_khach_hang/index.php">Quản lý khách hàng</a>
	</li>
	<li>
		<a class="li_1" href="../quan_ly_hoa_don/index.php">Quản lý đơn hàng</a>
		<ul>
			<li>
				<a class="lists" href="../quan_ly_hoa_don/hoa_don_chua_xu_ly.php">
					Đơn hàng chưa xử lý
				</a>
			</li>
			<li>
				<a class="lists" href="../quan_ly_hoa_don/hoa_don_da_duyet.php">
					Đơn hàng đã duyệt
				</a>
			</li>
			<li>
				<a class="lists" href="../quan_ly_hoa_don/hoa_don_da_huy.php">
					Đơn hàng đã hủy
				</a>
			</li>
		</ul>
	</li>
	<?php if($_SESSION['cap_do']==1){ ?>
		<li>
			<a href="../information/information_super_admin.php">Thông tin cá nhân</a>
		</li>
	<?php } else{ ?>
		<li>
			<a href="../information/information_admin.php">Thông tin cá nhân</a>
		</li>
	<?php } ?>
	<li>
		<a href="" id="log_out" onclick="log_out()">Đăng xuất</a>
	</li>
</ul>

<script type="text/javascript">
	function log_out(){
		var i = confirm('Bạn có chắc chắn đăng xuất!');
		if(i==true){
			document.getElementById('log_out').href='../logout/process_logout.php';
		}
		else{
			//không đăng xuất
		}
	}
</script>
