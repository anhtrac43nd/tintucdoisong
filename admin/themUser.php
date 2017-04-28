<?php 
	ob_start();
	session_start();
	if (!isset($_SESSION["idUser"]) && $_SESSION["idGroup"] ==0 ){
		header("location:../index.php");
	}

	require"../lib/dbCon.php";
	require"../lib/quantri.php";
?>
<?php 
	require"../lib/dbCon.php";

?>
<?php 
  if (isset($_POST["btnThem"]) ){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username   = $_POST["username"];
    $password   = md5($_POST["password"]);
    $repassword = md5($_POST["repassword"]);
    $birthday = $_POST["birthday"];
    $gioitinh  = $_POST["gioitinh"];
    settype($gioitinh, "int");
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $idgroup = $_POST["idgroup"];
    $ngaydangky = date("y-m-d");
    $active = 1;

    $sql = "SELECT * FROM users WHERE Username = '$username' OR Email = '$email'";
    $result = mysql_query($sql);
    if (mysql_num_rows($result) > 0 ){
     echo "Tên đăng nhập này đã có người dùng. Vui lòng chọn tên đăng nhập khác. <a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
    }
    if ($password != $repassword){
    	echo "Pass phải trùng nhau.<a href='javascript: history.go(-1)'>Trở lại</a>";
     exit;
    }

     $qr = "insert into users values 
         (null,'$name','$username','$password','$address','$phone','$email','$ngaydangky','$idgroup','$birthday','$gioitinh','$active',null)";
        mysql_query($qr);
        
        echo "<script type='text/javascript'>alert('đăng ký thành công vui lòng quay trở về trang chủ để đăng nhập');</script>";
     	
     	
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

	</head>
	<body>

		<?php require "top.php" ?>

		<?php require "menu.php" ?>

		<div class="right">
				<div class="col-md-10">				
					<div class="content">
						<div class="col-md-4 add-dm">
							<h4 class="text-center">Thêm User</h4>
						</div>
						<div class="clearfix"></div>
						<form method="post" enctype="multipart/form-data">
							<div class="form">							
								<table class="table">
							      <tr>
							        <td><P>Họ và tên</p></td>
							        <td><input type="text" name="name" class="form-control"></td>
							      </tr>
							     <tr>
							        <td><P>Email</p></td>
							        <td><input type="text" name="email" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><P>Tên đăng nhập</p></td>
							         <td><input type="text" name="username" class="form-control"></td>  
							         <!-- <td><input type="file" name="hinhanh"></td> -->
							      </tr>
							      <tr>
							        <td><P>Mật khẩu</p></td>
							        <td><input type="password" name="password" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><P>Nhập lại mật khẩu</p></td>
							        <td><input type="password" name="repassword" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><P>Ngày sinh</p></td>
							        <td><input type="date" name="birthday" class="form-control"></td>
							      </tr>
							      <tr>
							      	
							      <td><p>Giới tính</p></td> 
         <td> Nam <input type="radio" name="gioitinh" value="Nam"> Nữ<input type="radio" name="gioitinh" value="Nữ"></td>
							      </tr>
							      <tr>
							        <td><P>id group</p></td>
							        <td>
								        <select name="idgroup" class="form-control" id="idgroup">							
											<option value="0">0</option>
											<option value="1">1</option>
											<option value="2">2</option>
										</select>
									</td>
							      </tr>	
							      <tr>
							        <td><P>Điện thoại</p></td>
							        <td><input type="text" name="phone" class="form-control"></td>
							      </tr>
							      <tr>
							        <td><P>Địa chỉ</p></td>
							        <td><input type="text" name="address" class="form-control"></td>
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