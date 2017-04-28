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
	$qr = " delete from tin where idTin= '$idTin' ";
	mysql_query($qr);
	header("location:listTin.php");
 ?>