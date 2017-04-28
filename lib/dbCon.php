<!-- <?php
	// Kết nối MySQLi Object oriented
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "tintucdoisong_new";

	// Tạo kết nối
           $conn = new mysqli($servername, $username, $password,$database);

	// Kiểm tra kết nối có hoạt động không
	// if ($conn->connect_error) {
	// 	die("Connection failed: " . $conn->connect_error);
	// }
	// else {
	// 	echo "Connected successfully";
	// }
    mysqli_query($conn,"SET NAMES 'UTF8'");
?>
 -->
 <?php 
 mysql_connect("localhost","root","");
 mysql_select_db("tintucdoisong");
 mysql_query("SET NAMES 'utf8'");
 ?>