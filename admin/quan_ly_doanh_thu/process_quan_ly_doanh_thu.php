<?php require_once '../check_admin.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Thống kê</title>
	<style type="text/css">
		table{
			margin: 0 auto;
			border-collapse: collapse;
			font-size: 17px;
		}
	</style>
</head>
<body>
<?php 
include('../common/header_admin.php');
include('../common/menu_admin.php');
?>
<?php 
	$ngay_bat_dau=$_POST['ngay_bat_dau'];
	$ngay_ket_thuc=$_POST['ngay_ket_thuc'];
	require_once'../../connect.php';
	$sql="select sum(if(hoa_don.tinh_trang = 2, hoa_don_chi_tiet.so_luong * hoa_don_chi_tiet.gia,0)) as doanh_thu_da_nhan,
		sum(if(hoa_don.tinh_trang = 1, hoa_don_chi_tiet.so_luong * hoa_don_chi_tiet.gia,0)) as doanh_thu_du_kien,
		sum(if(hoa_don.tinh_trang = 2, hoa_don_chi_tiet.so_luong,0)) as san_pham_da_ban,
		sum(if(hoa_don.tinh_trang = 1, hoa_don_chi_tiet.so_luong,0)) as san_pham_sap_ban from hoa_don join hoa_don_chi_tiet on hoa_don_chi_tiet.ma_hoa_don = hoa_don.ma where (thoi_gian_mua >= '$ngay_bat_dau 00:00:00' AND thoi_gian_mua <= '$ngay_ket_thuc 23:59:59')";
	$result = mysqli_query($connect,$sql);

	$sql_san_pham_ban_chay = "select san_pham.*,nha_san_xuat.ten, sum(hoa_don_chi_tiet.so_luong) from hoa_don 
	join hoa_don_chi_tiet on hoa_don.ma = hoa_don_chi_tiet.ma_hoa_don
	join san_pham on san_pham.ma = hoa_don_chi_tiet.ma_san_pham 
	join nha_san_xuat on nha_san_xuat.ma = san_pham.ma_nha_san_xuat
	where tinh_trang = 2 and (thoi_gian_mua >= '$ngay_bat_dau 00:00:00' AND thoi_gian_mua <= '$ngay_ket_thuc 23:59:59') group by hoa_don_chi_tiet.ma_san_pham order by sum(hoa_don_chi_tiet.so_luong) desc limit 5 ";
	$result_san_pham_ban_chay = mysqli_query($connect,$sql_san_pham_ban_chay);
	$thu_muc_anh = '../../image/';
?>
<!-- nút quay lại -->
<a href="../view_admin/index.php">
	<i class="fa fa-angle-double-left" style="font-size:48px;color:red"></i>
</a>
<br>
<h1 style="text-align: center">
	Thống kê
</h1>
<?php if(mysqli_num_rows($result) == 0) { ?>
	<?php echo "Chưa có dữ liệu!" ?>
<?php } else { ?>
<table border="1">
	<tr>
		<th>Doanh thu đã nhận</th>
		<th>Doanh thu dự kiến</th>
		<th>Số lượng sản phẩm đã bán</th>
		<th>Số lượng sản phẩm dự sắp bán</th>
	</tr>
<?php foreach ($result as $each): ?>
	<tr>
		<td>
			<?php echo $each['doanh_thu_da_nhan'] ?>
		</td>
		<td>
			<?php echo $each['doanh_thu_du_kien'] ?>
		</td>
		<td>
			<?php echo $each['san_pham_da_ban'] ?>
		</td>
		<td>
			<?php echo $each['san_pham_sap_ban'] ?>
		</td>
	</tr>			
<?php endforeach ?>
</table>
<?php } ?>
<br>
<h1 style="text-align: center;">
	Sản phẩm bán chạy
</h1>
<?php if(mysqli_num_rows($result_san_pham_ban_chay) == 0) { ?>
	<h3 style="color: red; text-align: center">
		<?php echo "Thời gian này chưa bán sản phẩm nào!" ?>
	</h3>
<?php } else { ?>
<table border="1" width="100%">
	<tr>
		<th>Tên sản phẩm</th>
		<th>Giá</th>
		<th>Mô tả</th>
		<th>Ảnh</th>
		<th>Nhà Sản Xuất</th>
		<th>Số lượng</th>
	</tr>

<?php foreach ($result_san_pham_ban_chay as $each): ?>
	<tr>
		<td>
			<?php echo $each['ten_san_pham'] ?>
		</td>
		<td>
			<?php echo $each['gia'] ?>
		</td>
		<td>
			<?php echo $each['mo_ta'] ?>
		</td>
		<td>
			<img height="200px" src="<?php echo $thu_muc_anh . $each['anh'] ?>">
		</td>
		<td>
			<?php echo $each['ten'] ?>
		</td>
		<td>
			<?php echo $each['sum(hoa_don_chi_tiet.so_luong)'] ?>
		</td>
	</tr>			
<?php endforeach ?>
</table>
<?php } ?>
<?php mysqli_close($connect); ?>
</body>
</html>
