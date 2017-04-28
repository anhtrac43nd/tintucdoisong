<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION["idUser"]) ){
		header("location:../index.php");
	}
	else {
		if ($_SESSION["idGroup"] ==0){
			header("location:../index.php");
		}
	}

	require"../lib/dbCon.php";
	require"../lib/quantri.php";


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
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	</head>
	<body>


		<?php require "top.php" ?>

		<?php require "menu.php" ?>
		<?php 
		 	$tongdanhmuc = TongDanhMuc();
		 	$tongbaiviet = TongBaiViet();
		 	$tonguser = TongSoUser();
		?>

		<div class="right">
				<div class="col-md-10">				
					<div class="content">
							<div class="col-md-4 thongbao codm">
							<h4 class="text-right" style="color: #fff">Tổng số danh mục</h4>
							<h4 class="text-right" style="color: #fff"> <?php echo $tongdanhmuc ?> </h4>
							<p class="text-left"><i class="fa fa-table fa-4x" style="color: #fbdb94" aria-hidden="true"></i></p>
							</div>
							<div class="col-md-4 thongbao cobv">
							<h4 class="text-right" style="color: #fff">Tổng số bài viết</h4>
							<h4 class="text-right" style="color: #fff"><?php echo $tongbaiviet ?></h4>
							<p class="text-left"><i class="fa fa-newspaper-o fa-4x" style="color: #b1ca89" aria-hidden="true"></i></p>
							</div>
							<div class="col-md-4 thongbao cotv">
							<h4 class="text-right" style="color: #fff">Tổng số thành viên</h4>
							<h4 class="text-right" style="color: #fff"><?php echo $tonguser ?></h4>
							<p class="text-left"><i class="fa fa-user fa-4x" style="color: #aedce9" aria-hidden="true"></i></p>
							</div>
					</div><!--end .content-->
				</div>
		</div>
	</div>
	</body>
<html>