<?php 
include 'check_khach_hang.php'; 
include 'check_trang_thai_tai_khoan.php';
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Thông tin cá nhân</title>
<link rel="stylesheet" href="">
<style type="text/css">
	html{
		scroll-behavior: smooth;
	}
	body{
		font-family: Arial;
		margin-top: 190px;
	}
	.table_khach_hang{
		width: 50%;
		border-collapse: collapse;
		margin: auto;
	}
	.table_khach_hang th{
		background: #0a0f45;
		color: #fab8a7;
	}
	.table_khach_hang td, .table_khach_hang th {
		border: 1px solid #bdbbbb;
		padding: 3px;
	}
	.table_khach_hang tr:nth-child(even){
		background-color: #f2f2f2;
	}
	.table_khach_hang tr:hover {
		background-color: #f5f5f5;
	}
	a{
		text-decoration: none;
	}

	table{
		margin: auto;
		margin: auto;
		border-collapse: collapse;
	}
	table td{
		text-align: center;
	}
	.popup_thong_tin .overlay{
		position: fixed;
		top: 0px;
		left: 0px;
		width: 100vw;
		height: 100vh;
		background: rgba(0,0,0,0.7);
		z-index: 1;
		display: none;
	}
	.popup_thong_tin .content{
		font-size: 16px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%) scale(0);
		background: #fff;
		width: 450px;
		height: 310px;
		z-index: 100;
		text-align: center;
		padding: 20px;
		box-sizing: border-box;
		border-radius: 5px;
	}
	.popup_thong_tin .close{
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
	}
	.popup_thong_tin.active .overlay{
		display: block;
	}
	.popup_thong_tin.active .content{
		transition: all 300ms ease-in-out;
		transform: translate(-50%, -50%) scale(1);
	}

	.popup_mat_khau .overlay{
		position: fixed;
		top: 0px;
		left: 0px;
		width: 100vw;
		height: 100vh;
		background: rgba(0,0,0,0.7);
		z-index: 1;
		display: none;
	}
	.popup_mat_khau .content{
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
	.popup_mat_khau .close{
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
	}
	.popup_mat_khau.active .overlay{
		display: block;
	}
	.popup_mat_khau.active .content{
		transition: all 300ms ease-in-out;
		transform: translate(-50%, -50%) scale(1);
	}
	.span_error{
		color: red;
	}
	.tong_information{
		width: 100%;
		height: 500px;
	}
	button{
		cursor: pointer;
		font-size: 20px;
	}
	.table_thong_tin{
		position: relative;
		text-align: left;
	}
	.bt_sua{
		position: absolute;
		top: 280px;
		left: 210px;
		background: black;
		color: white;
	}
	.bt_doi_mat_khau{
		position: absolute;
		top: 174px;
		left: 160px;
		background: black;
		color: white;
	}
	.span_error{
		color: red;
	}
	input{
		padding: 5px;
	}
</style>

<?php 
include 'fixed.php'
?>

<?php
include 'connect.php';
$ma = $_SESSION['ma_khach_hang'];
$sql = "select * from khach_hang where ma = '$ma'";
$result = mysqli_query($connect,$sql);
$each = mysqli_fetch_array($result);
?>
<!-- Hiển thị thông tin cá nhân -->
<div class="tong_information">
	<h1 style="text-align: center">
		Thông tin cá nhân
	</h1>
	<table class="table_khach_hang" align="center">
		<?php foreach ($result as $each): ?>
		<tr>
			<th>
				Tên khách hàng
			</th>
			<td>
			<?php echo $each['ten_khach_hang'] ?>
			</td>
		</tr>
		<tr>	
			<th>
				Gmail
			</th>
			<td>	
				<?php echo $each['email'] ?>
			</td>
		</tr>
		<tr>	
			<th>
				Ngày sinh
			</th>
			<td>
				<?php echo date_format(date_create($each['ngay_sinh']),'d-m-Y')?>
			</td>
		</tr>
		<tr>	
			<th>
				Giới tính
			</th>
			<td>
				<?php 
				if($each['gioi_tinh']==1){
				echo "Nam";
				}else{
					echo "Nữ";
				}
				?>
			</td>
		</tr>
		<tr>	
			<th>
				Số điện thoại
			</th>
			<td>
				<?php echo $each['sdt'] ?>
			</td>
		</tr>
		<tr>	
			<th>
				Địa chỉ
			</th>
			<td>
				<?php echo $each['dia_chi'] ?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<button onclick="toggle_popup_1()">Đổi thông tin</button>
				<button onclick="toggle_popup_2()">Đổi mật khẩu</button>
			</td>
		</tr>
		<?php endforeach ?>
	</table>
<!-- popup đổi thông tin -->
	<div class="popup_thong_tin" id="popup_1">
		<div class="overlay"></div>
		<div class="content">
			<div class="close" onclick="toggle_popup_1()">&times;</div>
			<h1 style="text-align: center">
				Sửa thông tin cá nhân
			</h1>
			<br>
			<?php 
			$ma = $_SESSION['ma_khach_hang'];
			require 'connect.php';
			$sql = "select * from khach_hang where ma = '$ma'";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
			?>

			<form method="post" action="khach_hang/process_update_information.php">
				<table class="table_thong_tin">
					<input type="hidden" name="ma" value="<?php echo $ma ?>">
					<tr>
						<td>
							<label for="ten">Tên khách hàng</label>
						</td>
						<td>
							<input type="text" name="ten_khach_hang" id="ten" value="<?php echo $each['ten_khach_hang'] ?>">
							<br>
                            <span id="ten_error" class="span_error">
                                
                            </span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="ngay_sinh">Ngày sinh</label>
						</td>
						<td>
							<input type="date" name="ngay_sinh" id="ngay_sinh" value="<?php echo $each['ngay_sinh'] ?>">
						</td>
					</tr>
					<tr>
						<td>
							Giới tính
						</td>
						<td>
							<input type="radio" name="gioi_tinh" value="1" checked> Nam
							<input type="radio" name="gioi_tinh" value="0"> Nữ
						</td>
					</tr>
					<tr>
						<td>
							<label for="dia_chi">Địa chỉ</label>
						</td>
						<td>
							<input type="text" name="dia_chi" id="dia_chi" value="<?php echo $each['dia_chi'] ?>">
							<br>
							<span id="dia_chi_error" class="span_error">
                                
                            </span>
						</td>
					</tr>
					<tr>
						<td>
							<label for="sdt">SĐT</label>
						</td>
						<td>
							<input type="text" name="sdt" id="sdt" value="<?php echo $each['sdt'] ?>">
							<br>
							<span id="sdt_error" class="span_error">
                                
                            </span>
						</td>
					</tr>
						<button class="bt_sua" onclick="return sua()">
							Sửa
						</button>
				</table>
			</form>
		</div>
	</div>
<!-- popup đổi mật khẩu -->
	<div class="popup_mat_khau" id="popup_2">
		<div class="overlay"></div>
			<div class="content">
			<div class="close" onclick="toggle_popup_2()">&times;</div>
			<?php
				$ma = $_SESSION['ma_khach_hang'];
			?>
			<h1>
				Đổi mật khẩu
			</h1>
			<br>
			<form action="khach_hang/process_update_password.php?ma=<?php echo $ma ?>" method="post">
			<table>
				<tr>
					<td>
						<label for="mat_khau_cu">Nhập mật khẩu hiện tại</label> 
					</td>
					<td>
						<input type="password" name="mat_khau_cu" id="mat_khau_cu">
						<span class="span_error">
							<?php if(isset($_GET["loi"])){?>
				               <p><?php echo $_GET["loi"] ?></p>
				           	<?php } ?>
			           	<span id="mat_khau_cu_error">
							
						</span>
					</span>
					</td>
				</tr>
				<tr>
					<td>
						<label for="mat_khau_moi">Nhập mật khẩu mới</label> 
					</td>
					<td>
						<input type="password" name="mat_khau_moi" id="mat_khau_moi">
						<span id="mat_khau_moi_error" class="span_error">
			                                    
			       		</span>
					</td>       	
				</tr>
					<button onclick="return update_password()" class="bt_doi_mat_khau">
						Đổi mật khẩu
					</button>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">
	//đổi thông tin
	function toggle_popup_1(){
		document.getElementById('popup_1').classList.toggle("active");
	}
	//đổi mật khẩu
	function toggle_popup_2(){
		document.getElementById('popup_2').classList.toggle("active");
	}
	//regex thông tin
	function sua(){
            var check_error = false;
            // ten
            var ten = document.getElementById('ten').value;
            var ten_regex = /[^\s]/;
            if(ten_regex.test(ten)){
                document.getElementById('ten_error').innerHTML='';
            }
            else {
                document.getElementById('ten_error').innerHTML='Không được để trống';
                check_error = true;
            }
            // số điện thoại
            var sdt = document.getElementById('sdt').value;
            var sdt_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
            if(sdt_regex.test(sdt)){
                document.getElementById('sdt_error').innerHTML='';
            }
            else {
                document.getElementById('sdt_error').innerHTML='Số điện thoại không đúng';
                check_error = true;
            }
            //địa chỉ
            var dia_chi = document.getElementById('dia_chi').value;
            var dia_chi_regex = /[^\s]/;
            if(dia_chi_regex.test(dia_chi)){
                document.getElementById('dia_chi_error').innerHTML='';
            }
            else {
                document.getElementById('dia_chi_error').innerHTML='Không được để trống';
                check_error = true;
            }

            if(check_error == true){
            	return false;
            } else {
            	alert("Đổi thông tin thành công!");
            	return true;
            }
    }
	// regex mật khẩu
	function update_password(){
		var check_error = false;
		var mat_khau_moi = document.getElementById('mat_khau_moi').value;
        var mat_khau_moi_regex = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
        if(mat_khau_moi_regex.test(mat_khau_moi)){
            document.getElementById('mat_khau_moi_error').innerHTML='';
        }
        else {
            document.getElementById('mat_khau_moi_error').innerHTML='Mật khẩu có ít nhất 6 ký tự gồm chữ hoa, chữ thường và số';
            check_error = true;
        }

        var mat_khau_cu = document.getElementById('mat_khau_cu').value;
        var mat_khau_cu_regex = /[^\s]/;
        if(mat_khau_cu_regex.test(mat_khau_cu)){
            document.getElementById('mat_khau_cu_error').innerHTML='';
        }
        else {
            document.getElementById('mat_khau_cu_error').innerHTML='Không được để trống';
            check_error = true;
        }

        if(check_error){
        	return false;
        } else {
        	alert('Đổi mật khẩu thành công!'); 
        	return true;
        }
    } 
</script>

<?php include 'footer.php' ?>	
<?php mysqli_close($connect) ?>