<?php 

function Tinmoinhat_MotTin(){
	$qr = "
		select * from tin 
		order by idTin desc
		limit 0,1
	";
	return mysql_query($qr);
}
function Tinmoinhat_MuoiTin(){
	$qr = "
		select * from tin 
		order by idTin desc
		limit 1,10
	";
	return mysql_query($qr);
}
function TinXemNhieuNhat(){
	$qr = "
		select * from tin
		order by SoLanXem desc
		limit 0,6
	";
	return mysql_query($qr);
}
function Tinmoinhat_TheoLoaiTin_MotTin($idLT){
	$qr = "
		select * from tin 
		where idLT = $idLT
		order by idTin desc
		limit 0,1
	";
	return mysql_query($qr);
}
function Tinmoinhat_TheoLoaiTin_BonTin($idLT){
	$qr = "
		select * from tin 
		where idLT=$idLT
		order by idTin desc
		limit 1,6
	";
	return mysql_query($qr);
}
function TenLoaiTin($idLT){
	$qr = "select Ten 
		from loaitin 
		where idLT = $idLT";
	$loaitin = mysql_query($qr);
	$row = mysql_fetch_array($loaitin);
	return $row['Ten'];
}
function QuangCao($vitri){
	$qr = "
		select * from quangcao
		where vitri = $vitri
	";
	return mysql_query($qr);
}
function DanhSachTheLoai(){
	$qr = "
		select * from theloai
	";
	return mysql_query($qr);
}
function DanhSachLoaiTinTheoTheLoai($idTL){
	$qr = "
		select * from loaitin
		where idTL=$idTL
	";
	return mysql_query($qr);
}
function TinMoi_BenTrai($idTL){
	$qr = "
	select * from tin
	where idTL = $idTL
	order by idTin desc 
	limit 0,1
	";
	return mysql_query($qr);
}
function TinMoi_BenPhai($idTL){
	$qr = "
	select * from tin
	where idTL = $idTL
	order by idTin desc 
	limit 1,2
	";
	return mysql_query($qr);
}
function TinTheoLoaiTin($idLT){
	$qr = "
	select * from tin
	where idLT = $idLT
	order by idTin desc
	";
	return mysql_query($qr);
}
function ThongTinTin($idLT){
	$qr = "
	select TenTL, Ten
	from theloai, loaitin
	where theloai.idTL = loaitin.idTL
	and idLT = $idLT
	";
	return mysql_query($qr);
}
function TinTheoLoaiTin_PhanTrang($idLT,$from,$sotin1trang){
	$qr = "
	select * from tin
	where idLT = $idLT
	order by idTin desc
	limit $from, $sotin1trang
	";
	return mysql_query($qr);
}
function ChiTietTin($idTin){
	$qr = "
	select * from tin
	where idTin = $idTin
	";
	return mysql_query($qr);
}
function TinCungLoai($idTin,$idLT){
	$qr ="
	select * from tin
	where idTin <> $idTin
	and idLT = $idLT
	order by rand()
	limit 0,3
	";
	return mysql_query($qr);
}
function CapNhatSoLanXem ($idTin){
	$qr = "
		update tin
		set SoLanXem = SoLanXem + 1
		where idTin = $idTin
	";
	return mysql_query($qr);
}
function TimKiem($tukhoa){
	$qr = "
		select * from tin
		where TieuDe REGEXP '$tukhoa'
		order by idTin desc
	";
	return mysql_query($qr);
}
?>