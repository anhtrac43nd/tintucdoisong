<?php 
//Quan ly the loai
function DanhSachTheLoai(){
	$qr = "select * from theloai 
			order by idTL DESC
	";
	return mysql_query($qr);
}
function ChiTietTheLoai($idTL){
	$qr = "select * from theloai
			where idTL = $idTL
	";
	$row = mysql_query($qr);
	return mysql_fetch_array($row);
}
function DanhSachLoaiTin(){
	$qr = "select * from theloai, loaitin 
		where theloai.idTL = loaitin.idTL
		order by idLT desc
	";
	return mysql_query($qr);
}
function ChiTietLoaiTin($idLT){
	$qr ="
		select * from loaitin
		where idLT = '$idLT'

	";
	$loaitin = mysql_query($qr);
	return mysql_fetch_array($loaitin);
}
function DanhSachUser(){
  $qr = "
    select * from users 

  ";
  return mysql_query($qr);
}
function ChiTietUser($idUser){
  $qr = "
    select * from  users
    where idUser = $idUser
  ";
  $chitietuser = mysql_query($qr);
  return mysql_fetch_array($chitietuser);
}
function DanhSachTin(){
  $qr = "select tin.*, TenTL,Ten 
  from tin , theloai , loaitin
  where tin.idTL = theloai.idTL 
  and tin.idLT = loaitin.idLT
  order by idTin desc
  limit 0,20
  ";
  return mysql_query($qr);
}
function ChiTietTin($idTin){
  $qr = "select tin.*, TenTL,Ten 
  from tin , theloai , loaitin
  where tin.idTL = theloai.idTL 
  and tin.idLT = loaitin.idLT and idTin = '$idTin' 
  ";
  $row = mysql_query($qr);
  return mysql_fetch_array($row);
}
function TongDanhMuc(){
  $qr = "select * from theloai";
  $qr1 = mysql_query($qr);
  $row = mysql_num_rows($qr1);
  return $row ;
  
}
function TongBaiViet(){
  $qr = "select * from tin";
  $qr1 = mysql_query($qr);
  $row = mysql_num_rows($qr1);
  return $row ;
  
}
function TongSoUser(){
  $qr = "select * from users";
  $qr1 = mysql_query($qr);
  $row = mysql_num_rows($qr1);
  return $row ;
}
function stripUnicode($str){ 
  if(!$str) return false; 
   $unicode = array( 
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ', 
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ', 
     'd'=>'đ', 
     'D'=>'Đ', 
      'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ', 
      'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ', 
      'i'=>'í|ì|ỉ|ĩ|ị',       
      'I'=>'Í|Ì|Ỉ|Ĩ|Ị', 
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ', 
      'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ', 
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự', 
      'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự', 
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ', 
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ' 
   ); 
foreach($unicode as $khongdau=>$codau) { 
    $arr=explode("|",$codau); 
    $str = str_replace($arr,$khongdau,$str); 
} 
return $str; 
} 
function changeTitle($str){ 
    $str=trim($str); 
    if ($str=="") return ""; 
    $str =str_replace('"','',$str); 
    $str =str_replace("'",'',$str); 
    $str = stripUnicode($str); 
    $str = mb_convert_case($str,MB_CASE_TITLE,'utf-8'); 
     
    // MB_CASE_UPPER / MB_CASE_TITLE / MB_CASE_LOWER 
    $str = str_replace(' ','-',$str); 
    $str = str_replace('/','-',$str);
    return $str; 
} 


?>