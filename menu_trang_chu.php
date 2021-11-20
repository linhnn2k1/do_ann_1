<style>
	*{
		margin: 0;
		padding: 0;
	}
	body{
		font-family: Arial;
	}
	.menu{
		line-height: 50px;
		background-color: black;
		list-style-type: none;
		height: 50px;
		width: 100%;
		display: flex;
		justify-content: center;
		position: relative;
	}
	.menu > .list{
		width: 240px;
		height:0px;
		text-align: center;
	}
	.menu > .list > .li_1{
		padding: 14px;
		color: #00fbff;
		font-size: 20px;
	}
	.menu > .list:hover > .li_1{
		background: #00eaff;
		color: black;
	}
	.menu > .list:hover .list_hover{
		display: block;
	}
	.list_hover{
		display: none;
	 	background-color: #f9f9f9;
	  	width: 150px;
	  	box-shadow: 0px 8px 16px 0px #8a8a8a;
	  	position: relative;
	  	left: 60px;
	  	top: -3px;
	  	z-index: 99;
	}
	.dropdown > .list_hover:hover{
		background: #00eaff;
		/* display: inline-block; */
	}
	.dropdown > .list_hover > .lists{
		color: black;
		font-size: 20px;
	}
	a{
		text-decoration: none;
	}
</style>
<?php 
include 'connect.php';

$sql = "select * from nha_san_xuat";
$result = mysqli_query($connect,$sql);
?>

<ul class="menu">
	<li class="list">
		<a class="li_1" href="index.php">Trang chủ</a>
	</li>
	<li class="list">
		<a class="li_1" href="all_items.php">Sản phẩm</a>
		<ul class="dropdown">
			<?php foreach ($result as $each): ?>
				<li class="list_hover">
					<a class="lists" href="tung_loai_giay.php?ma=<?php echo $each['ma'] ?>"><?php echo $each['ten']?></a>
				</li>
			<?php endforeach ?>
		</ul>
	</li>
	<?php if(isset($_SESSION['ma_khach_hang'])) {?>
		<li class="list">
			<a class="li_1" href="xem_hoa_don.php">Đơn hàng</a>
		</li>
		<li class="list">
			<a class="li_1" href="information_khach_hang.php">Thông tin cá nhân</a>
		</li>
	<?php } ?>
	<li class="list">
		<a class="li_1" href="#end">Thông tin liên hệ</a>
	</li>
</ul>