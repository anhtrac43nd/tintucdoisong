<?php 
	require"../lib/dbCon.php";

?>
<?php 
  if (isset($_POST["btn_dangky"]) ){
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
    $idgroup = 0;
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
     	header("localtion:../index.php");
     	
}

?>

<html>
<head>
<title>Đăng ký thành viên</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="../css/style_register.css" media="all" />
    <link rel="stylesheet" type="text/css" href="../css/demo.css" media="all" />
</head>
<body>
<div class="container">
			<!-- freshdesignweb top bar -->
            <div class="freshdesignweb-top">
                
                <span class="right">
                    
                       
                    </a>
                </span>
                <div class="clr"></div>
            </div><!--/ freshdesignweb top bar -->
			<header>
       <h3><a href="../index.php">Trang Chủ</a></h3>
				<h1>Đăng ký thành viên</h1>
            </header>       
      <div  class="form">
    		<form id="contactform" method="post"> 
    			<p class="contact"><label for="name">Họ và tên</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">Tên đăng nhập</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Mật khẩu</label></p> 
    			<input type="password" id="password" placeholder="password" name="password" required=""> 

                <p class="contact"><label for="repassword">Nhập lại mật khẩu</label></p> 
    			<input type="password" id="repassword" placeholder="password" name="repassword" required=""> 

           <p class="contact"><label for="birth">Ngày sinh</label></p> 
          <input type="date" name="birthday"> 
          <p class="contact"><label for="repassword">Giới tính</label></p> 
          Nam <input type="radio" name="gioitinh" value="1"> Nữ<input type="radio" name="gioitinh" value="0">
<!--             <select class="select-style gender" name="gender">
            <option value="select" name='gioitinh'>Giới tính..</option>
            <option value="1">Nam</option>
            <option value="0">Nữ</option>
            
            </select><br><br> -->
            <p class="contact"><label for="name">Địa chỉ liên hệ</label></p> 
            <input id="name" name="address" placeholder="address" required="" tabindex="1" type="text">

            <p class="contact"><label for="phone">Số điện thoại</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

            <input class="buttom" name="btn_dangky" id="btn_dangky" tabindex="5" value="Đăng ký" type="submit"> 	 
   </form> 
</div>      
</div>


</body>
</html>
