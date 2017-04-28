<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] !=1 ){
		header("location:../index.php");
	}

	require"../lib/dbCon.php";
	require"../lib/quantri.php";
?>
<?php 
	if (isset($_POST["btnThem"])){
		$TenTL = $_POST["tentheloai"];
		$TenTL_KhongDau = changeTitle($TenTL);
		$ThuTu = $_POST["thutu"];
		settype($ThuTu, "int");
		$AnHien = $_POST["rdAnHien"];
		settype($AnHien, "int");
		$qr = "insert into theloai values(null,'$TenTL','$TenTL_KhongDau','$ThuTu','$AnHien') ";
		mysql_query($qr);
		header("location:listTheLoai.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset=utf-8 />
	<title>Trang Admin</title>
		<link rel=stylesheet href="css/bootstrap.min.css" />
		<script src="js/jquery-2.2.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/normalize.css"/>
		<link rel="stylesheet" href="css/style.css"/>
	</head>
	<body>

		<?php require "top.php" ?>

		<?php require "menu.php" ?>

		<div class="right">
				<div class="col-md-10">				
					<div class="content">
						<div class="col-md-4 add-dm">
							<h4 class="text-center">Thêm thể loại</h4>
						</div>
						<div class="clearfix"></div>
						<form method="post">
							<div class="form">							
								<table class="table">
							      <tr>
							        <td><p>Tên thể loại</p>
							        <td><input type="text" name="tentheloai" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><p>Thứ tự</p>
							        <td><input type="text" name="thutu" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><p>Ẩn/Hiện</p>
							        <td>&nbsp Ẩn &nbsp<input type="radio" name="rdAnHien" value="0">&nbsp Hiện &nbsp<input type="radio" name="rdAnHien" value="1"></td>
							      </tr>
							    					      
							  </table>							
							</div>
							<div class="col-md-3 form-group pull-right">
								 <input type="submit" name="btnThem" value="Thêm" class="btn btn-primary btn-block">
							</div>
						</form>
					</div><!--end .content-->
				</div>
		</div>
	
	</body>
</html>