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
	$idLT = $_GET["idLT"];
	settype($idLT, "int");
	$row_loaitin = ChiTietLoaiTin($idLT);
?>
<?php 
	if (isset($_POST["btnSua"])){
		$Ten = $_POST["tenloaitin"];
		$Ten_KhongDau = changeTitle($Ten);
		$ThuTu = $_POST["thutu"];
		settype($ThuTu, "int");
		$AnHien = $_POST["rdAnHien"];
		settype($AnHien, "int");
		$idTL = $_POST["idTL"];
		settype($idTL, "int");
		$qr = "UPDATE loaitin SET
		Ten = '$Ten',
		Ten_KhongDau = '$Ten_KhongDau',
		ThuTu = '$ThuTu',
		AnHien = '$AnHien',
		idTL = '$idTL'
		where idLT = '$idLT'
		";
		mysql_query($qr);
		header("location:listLoaiTin.php");
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
							<h4 class="text-center">Sửa loại tin</h4>
						</div>
						<div class="clearfix"></div>
						<form method="post">
							<div class="form">							
								<table class="table">
							      <tr>
							        <td><p>Tên loại tin</p>
							        <td><input type="text" name="tenloaitin" class="form-control" value="<?php echo $row_loaitin['Ten'] ?>"></td>
							      </tr>
							      <tr>
							        <td><p>Thứ tự</p>
							        <td><input type="text" name="thutu" class="form-control" value="<?php echo $row_loaitin['ThuTu'] ?>"></td>
							      </tr>
							      <tr>
							      <tr>
							        <td><p>Ẩn/Hiện</p>
							        <td>&nbsp Ẩn &nbsp<input <?php if($row_loaitin["AnHien"]==0) echo "checked='checked'"; ?> type="radio" name="rdAnHien" value="0" id="AnHien_0">&nbsp Hiện &nbsp<input <?php if($row_loaitin["AnHien"]==1) echo "checked='checked'"; ?> type="radio" name="rdAnHien" value="1" id="AnHien_1"></td>
							      </tr>
							      <tr>
							        <td><p>ID Thể loại</p>
							        <td>
								        <select name="idTL" id="idTL">
								        	<?php 
								        		$theloai = DanhSachTheLoai();
								        		while ($row_theloai = mysql_fetch_array($theloai)) {
								        			
								        	?>
								        	<option <?php if($row_theloai["idTL"] == $row_loaitin["idTL"]) echo "selected='selected'" ?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
								        	<?php 
								        		}
								        	?>
								        </select>
							        </td>
							      </tr>
							    					      
							  </table>							
							</div>
							<div class="col-md-3 form-group pull-right">
								 <input type="submit" name="btnSua" value="Sửa" class="btn btn-primary btn-block">
							</div>
						</form>
					</div><!--end .content-->
				</div>
		</div>
	
	</body>
</html>