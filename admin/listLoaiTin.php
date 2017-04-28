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
							<h4 class="text-center">Danh mục loại tin</h4>
						</div>
						<div class="clearfix"></div>				
								<table class="table table-bordered" style="margin-top:20px;">
									<tr class="bg-info">
										<td>ID Loại Tin</td>
										<td>Tên Loại Tin</td>
										<td>Tên Không Dấu</td>
										<td>Thứ Tự</td>
										<td>Ẩn/Hiện</td>
										<td>ID Thể Loại</td>
										<td>Tên Thể Loại</td>
										<td><a href="themLoaiTin.php">Thêm</a></td>
										<td></td>
									</tr>
									<?php 
										$loaitin = DanhSachLoaiTin();
										while ($row_loaitin = mysql_fetch_array($loaitin)){
									?>
									<tr>
										<td><?php echo $row_loaitin['idLT'] ?></td>
										<td><?php echo $row_loaitin['Ten'] ?></td>
										<td><?php echo $row_loaitin['Ten_KhongDau'] ?></td>
										<td><?php echo $row_loaitin['ThuTu'] ?></td>
										<td><?php echo $row_loaitin['AnHien'] ?></td>
										<td><?php echo $row_loaitin['idTL'] ?></td>
										<td><?php echo $row_loaitin['TenTL'] ?></td>
										<td><a href="suaLoaiTin.php?idLT=<?php echo $row_loaitin["idLT"] ?>">Sửa</a></td>
										<td><a onclick="return confirm('Bạn muốn xóa')" href="xoaLoaiTin.php?idLT=<?php echo $row_loaitin["idLT"] ?>">Xóa</a></td>
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