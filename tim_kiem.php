<?php 
include 'connect.php';
// $tim_kiem = $_GET['tim_kiem'];
$tim_kiem = '';
$sql_sp = "select san_pham.ma, san_pham.ten_san_pham, san_pham.anh, san_pham.gia, nha_san_xuat.ten
from san_pham
join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
where san_pham.ten_san_pham like '%$tim_kiem%' or nha_san_xuat.ten like '%$tim_kiem%'";
$result_sp = mysqli_query($connect, $sql_sp);
$thu_muc_anh = 'image/';

$tong_so_san_pham = mysqli_num_rows($result);
$so_san_pham_1_trang = 5;

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
<h1>
	Tổng số sản phẩm: <?php echo $tong_so_san_pham ?>
</h1>
<p>
	Trang: <?php for($i = 1; $i<=$tong_so_trang; $i++){ ?>
		<a href="?trang=<?php echo $i ?>&tim_kiem=<?php echo $tim_kiem ?>">
			<?php echo $i ?>
		</a>
	<?php } ?>
</p>