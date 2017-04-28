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
	$idTin = $_GET["idTin"];
	settype($idTin, "int");
	$row_tin = ChiTietTin($idTin);
?>
 <?php 
	if (isset($_POST["btnSua"])){

		$TieuDe = $_POST["tieude"];
		$TieuDe_KhongDau = changeTitle($TieuDe);
		$TomTat = $_POST["tomtat"];
		$urlHinh = $_POST["hinhanh"];
		$Ngay = date("y-m-d");
		$idUser = $_SESSION["idUser"];
		settype($idUser, "int");
		$NoiDung = $_POST["noidung"];
		$idLT = $_POST["idlt"];
		settype($idLT, "int");
		$idTL = $_POST["idtl"];
		settype($idTL, "int");	
		$TinNoiBat = $_POST["rd_noibat"];
		settype($rd_noibat, "int");
		$AnHien = $_POST["rd_anhien"];
		settype($rd_anhien, "int");
		$qr = "UPDATE tin SET
		TieuDe = '$TieuDe',
		TieuDe_KhongDau = '$TieuDe_KhongDau',
		TomTat = '$TomTat',
		urlHinh = '$urlHinh',
		Ngay = '$Ngay',
		idUser = '$idUser',
		Content = '$NoiDung',
		idLT = '$idLT',
		idTL = '$idTL',
		TinNoiBat = '$TinNoiBat',
		AnHien = '$AnHien'


		where idTin= '$idTin'
		 ";
		mysql_query($qr);
		header("location:listTin.php");
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
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
		<script type="text/javascript">
		function BrowseServer( startupPath, functionData ){
			var finder = new CKFinder();
			finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
			finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
			finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
			finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
			//finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn	
			finder.popup(); // Bật cửa sổ CKFinder
		} //BrowseServer

		function SetFileField( fileUrl, data ){
			document.getElementById( data["selectActionData"] ).value = fileUrl;
		}
		function ShowThumbnails( fileUrl, data ){	
			var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
			document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
			'<img src="' + fileUrl + '" />' +
			'<div class="caption">' +
			'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
			'</div>' +
			'</div>';
			document.getElementById( 'preview' ).style.display = "";
			return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn
		}
		</script>
		<script type="text/javascript" src="../jquery-slider-master/js/jquery-2.1.0.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#idTL").change(function(){
					var id = $(this).val();
					$.get("./loaitin.php",{idTL:id},function(data){
						$("#idLT").html(data);
					});
				});
			});
		</script>
	</head>
	<body>

		<?php require "top.php" ?>

		<?php require "menu.php" ?>

		<div class="right">
				<div class="col-md-10">				
					<div class="content">
						<div class="col-md-4 add-dm">
							<h4 class="text-center">Sửa bài viết</h4>
						</div>
						<div class="clearfix"></div>
						<form method="post">
							<div class="form">							
								<table class="table">
							      <tr>
							        <td><P>Tiêu đề bài viết</p></td>
							        <td><input type="text" name="tieude" class="form-control" value="<?php echo $row_tin['TieuDe'] ?>"></td>
							      </tr>
							     <tr>
							        <td><P>Tóm tắt bài viết</p></td>
							        <td><input type="text" name="tomtat" class="form-control" value="<?php echo $row_tin["TomTat"] ?>"></td>
							      </tr>
							      <tr>
							        <td><P>hình ảnh bài viết</p></td>
							          <td><input type="text" name="hinhanh" class="form-control" id="urlHinh" value="<?php echo $row_tin['urlHinh'] ?>"><input onclick="BrowseServer('','urlHinh')" type="button" name="btnChonFile" id="btnChonFile" value="Chọn file" /></td> 
							         <!-- <td><span><?php echo $row_tin['urlHinh'] ?></span><input type="file" name="hinhanh"></td> --> 
							      </tr>
							      <tr>
							        <td><P>nội dung bài viết</p></td>
							        <td><textarea name="noidung" class="form-control" id="Content" cols="30" rows="10" value="<?php echo $row_tin["Content"]; ?>" ></textarea>
								        <script type="text/javascript">
										var editor = CKEDITOR.replace( 'Content',{
												uiColor : '#9AB8F3',
												language:'vi',
												skin:'v2',	
												filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
												filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
												filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
														 	
												toolbar:[
												['Source','-','Save','NewPage','Preview','-','Templates'],
												['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print'],
												['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
												['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
												['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
												['NumberedList','BulletedList','-','Outdent','Indent','Blockquote','CreateDiv'],
												['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
												['Link','Unlink','Anchor'],
												['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
												['Styles','Format','Font','FontSize'],
												['TextColor','BGColor'],
												['Maximize', 'ShowBlocks','-','About']
												]
											});		
										</script>
							        </td>
							      </tr>
							      <tr>
							        <td><P>id thể loại</p></td>
							        <td>
								        <select name="idtl" class="form-control" id="idTL">
								        	<?php 
								        		$theloai = DanhSachTheLoai();
								        		while ($row_theloai = mysql_fetch_array($theloai)) {
								        			
								        	?>
								        	<option <?php if($row_theloai["idTL"] == $row_tin["idTL"]) echo "selected='selected'" ?> value="<?php echo $row_theloai["idTL"] ?>"><?php echo $row_theloai["TenTL"] ?></option>
								        	<?php 
								        		}
								        	?>
								        </select>
									</td>
							      </tr>
							      <tr>
							        <td><P>id loại tin</p></td>
							        <td><select name="idlt" class="form-control" id="idLT">
										<option value="">Lựa chọn loại tin (danh mục con)</option>
										<?php
										$loaitin = DanhSachLoaiTin();
										while ($row_loaitin = mysql_fetch_array($loaitin)){
										 ?>										
										<option <?php if($row_loaitin["idLT"] == $row_tin["idLT"]) echo "selected='selected'" ?> value="<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></option>
										<?php 
											}
										?>
									</select></td>
							      </tr>	
							      <tr>
							        <td><p>Tin nổi bật</p>
							        <td>&nbsp Nổi Bật &nbsp<input <?php if($row_tin["TinNoiBat"]==1) echo "checked='checked'" ?> type="radio" name="rd_noibat" value="1">&nbsp Thường &nbsp<input <?php if($row_tin["TinNoiBat"]==0) echo "checked='checked'" ?> type="radio" name="rd_noibat" value="0"></td>
							      </tr>>
							      <tr>
							        <td><p>Ẩn/Hiện</p>
							        <td>&nbsp Ẩn &nbsp<input <?php if($row_tin["AnHien"]==0) echo "checked='checked'"; ?> type="radio" name="rd_anhien" value="0" id="AnHien_0">&nbsp Hiện &nbsp<input <?php if($row_tin["AnHien"]==1) echo "checked='checked'"; ?> type="radio" name="rd_anhien" value="1" id="AnHien_1"></td>
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