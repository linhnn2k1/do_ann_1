<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
        <style>
            body{
                margin: auto;
                padding: auto;
                font-family: Arial;
                background: black;
            }
            .admin{
                height: 740px;
                width: 100%;
            }
            .box_form{
                position: absolute;
                top: 20px;
                left: 450px;
                background-color: white;
                width: 450px;
                height: 420px;
                border: 1px solid black;
                text-align: center;
        
            }
            .dang_nhap{
                color: black;
                font-size: 20px;
                font-family: Arial, Helvetica, sans-serif;
            }
            input{
                font-size: 20px;
                border: 0,1px  black;
                height: 25px;
                margin: 20px;
                cursor: pointer;
            }
            h1{
                color: red;
                text-align: center;
                font-size: 20px;
            }
         	#submit{
         		width: 200px;
         		background-color: black;
         		height: 40px; 
         		color:white;
         		border: 1px solid black;
         		font-size: 20px;
                position: absolute;
                top: 200px;
                left: 90px;
                cursor: pointer;
         	}
         	#submit a{
                text-decoration: none;
                color: white;
            }
            .dang_nhap h2{
                position: absolute;
                top: 20px;
                left: 100px;
            }
            .form{
                position: absolute;
                top: 130px;
                left: 40px;
            }
            .show_pass{
                position: absolute;
                right: 10px;
                z-index: 99;
                width: 17px;
            }
        </style>
</head>
<body>
<div class="admin">
    <div class="box_form">
        <?php if(isset($_GET["loi"])){?>
            <h1>
                <?php echo $_GET["loi"]?>       
            </h1>
        <?php } ?>
       <div class="dang_nhap">
            <h2>
            	Đăng Nhập Admin:
            </h2>
            <form action="process_dang_nhap_admin.php" method="post" class="form">
                <table>
                    <tr>
                        <td>
                            <label for="email">
                                Email:
                            </label>
                        </td>
                        <td>
                            <input type="email" name="email" id="email">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="mat_khau">
                            Mật Khẩu:
                            </label>
                        </td>
                        <td>
                            <input type="password" name="mat_khau" id="mat_khau">
                            <input type="checkbox" class="show_pass" onclick="show_pass()">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button id="submit" type="submit">
                               Đăng nhập
                            </button>
                        </td>
                    </tr>
                </table>
            </form>
       </div>
    </div>
</div>
<script>
  function show_pass() {
    var x = document.getElementById("mat_khau");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</body>
</html>
