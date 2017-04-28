<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] !=1 ){
		header("location:../index.php");
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
	</head>
	<body>

		<?php require "top.php" ?>

		<?php require "menu.php" ?>
		<div class="right">
				<div class="col-md-10">				
					<div class="content">
						<div class="col-md-4 add-dm">
							<h4 class="text-center">Danh Sách Bài Viết</h4>
						</div>
						<div class="clearfix"></div>				
								<table class="table table-bordered" style="margin-top:20px;">

									<tr class="bg-info">
										<td>idTin</td>
										<td>Tiêu Đề</td>
										<td>Thể Loại - Loại</td>
										<td>Số Lần Xem</td>
										<td>Tin Nổi Bật</td>
										<td>Ẩn/Hiện</td>
										<td><a href="themTin.php">Thêm</a></td>
									</tr>
									<?php 
										$tin = DanhSachTin();
										while ($row_tin = mysql_fetch_array($tin)) {
											
										
									?>
									<tr style="border-bottom:1px solid #C7C0C0" >
										<td><?php echo $row_tin["idTin"] ?><br/>Ngày đăng:<br/><?php echo $row_tin["Ngay"] ?></td>
										<td><?php echo $row_tin["TieuDe"] ?><br/><img style="float:left;margin-right:5px" src="../upload/tintuc/<?php echo $row_tin["urlHinh"] ?>" alt="img" width="152px" height="96px" /><?php echo $row_tin["TomTat"] ?></td>
										<td><?php echo $row_tin["TenTL"] ?><br/>-<br/><?php echo $row_tin["Ten"] ?></td>
										<td><?php echo $row_tin["SoLanXem"] ?><br/><br/></td>
										<td><?php echo $row_tin["TinNoiBat"] ?></td>
										<td><?php echo $row_tin["AnHien"] ?></td>
										<td><a href="suaTin.php?idTin=<?php echo $row_tin["idTin"] ?>">Sửa</a> <br/>-<br/> <a href="xoaTin.php?idTin=<?php echo $row_tin["idTin"] ?>">Xóa</a></td>
									</tr>

									<?php 
										}
									?>
								</table>							

					</div><!--end .content-->
				</div>
		</div>
	
	</body>
</html>