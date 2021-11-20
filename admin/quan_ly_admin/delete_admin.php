<?php

$ma = $_GET['ma'];

require '../../connect.php';

$sql = "delete from admin
where
ma = '$ma'";

mysqli_query($connect,$sql);
mysqli_close($connect);

header('location:index.php');