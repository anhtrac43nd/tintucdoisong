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
							<h4 class="text-center">Danh mục thể loại</h4>
						</div>
						<div class="clearfix"></div>				
								<table class="table table-bordered" style="margin-top:20px;">
									<tr class="bg-info">
										<td>ID Thể Loại</td>
										<td>Tên Thể Loại</td>
										<td>Tên Không Dấu</td>
										<td>Thứ Tự</td>
										<td>Ẩn/Hiện</td>
										<td><a href="themTheLoai.php">Thêm</a></td>
										<td></td>
									</tr>
									<?php 
										$theloai = DanhSachTheLoai();
										while ($row_theloai = mysql_fetch_array($theloai)){
									?>
									<tr>
										<td><?php echo $row_theloai['idTL'] ?></td>
										<td><?php echo $row_theloai['TenTL'] ?></td>
										<td><?php echo $row_theloai['TenTL_KhongDau'] ?></td>
										<td><?php echo $row_theloai['ThuTu'] ?></td>
										<td><?php echo $row_theloai['AnHien'] ?></td>
										<td><a href="suaTheLoai.php?idTL=<?php echo $row_theloai["idTL"] ?>">Sửa</a></td>
										<td><a onclick="return confirm('Bạn muốn xóa')" href="xoaTheLoai.php?idTL=<?php echo $row_theloai["idTL"] ?>">Xóa</a></td>
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