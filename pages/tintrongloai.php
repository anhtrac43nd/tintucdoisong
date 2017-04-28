<?php 
    $idLT = $_GET["idLT"]; 
    settype($idLT, "int");
?>
<?php 
$thongtin = ThongTinTin($idLT);
$row_thongtin = mysql_fetch_array($thongtin);
?>
<div>
  <p style="font-size:16px;font-weight:bold;">Trang Chủ >> <?php echo $row_thongtin['TenTL'] ?> >> <?php echo $row_thongtin['Ten'] ?></p>
</div>
<?php 
    $sotin1trang=20;
    if (isset($_GET["trang"])){
        $trang = $_GET["trang"];
        settype($trang, "int");
    } else {
        $trang = 1;
    }
    $from = ($trang - 1 ) * $sotin1trang;
    $tin = TinTheoLoaiTin_PhanTrang($idLT,$from,$sotin1trang);
    while ($row_tin = mysql_fetch_array($tin)){
?>
<div class="box-cat">
    <div class="cat1">
        
        <div class="clear"></div>
        <div class="cat-content">
            <div class="col0 col1">
                <div class="news">
                    <h3 class="title" ><a href="index.php?p=chitiettin&idTin=<?php echo $row_tin['idTin'] ?>"><?php echo $row_tin['TieuDe'] ?></a></h3>
                    <img class="images_news" src="upload/tintuc/<?php echo $row_tin['urlHinh'] ?>" align="left" />
                    <div class="des"><?php echo $row_tin['TomTat'] ?></div>
                    <div class="clear"></div>
                   
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- box cat-->
<div class="clear"></div>
<?php
 }
 ?>

<hr/>
<style>
    #phantrang{
        margin-top: 20px;
        text-align: center;
    }
    #phantrang a{
        font-size: 18px;
        background-color: #635F5F;
        color: #FFFFFF;
        padding: 5px;
        margin-right: 5px;
         border-radius: 5px;
    }
    #phantrang a:hover{
        background-color: black;
    }
</style>
<div id="phantrang">
<?php 
    $t = TinTheoLoaiTin($idLT);
    $tongsotin = mysql_num_rows($t);
    $tongsotrang = ceil($tongsotin / $sotin1trang);
    for ($i=1 ; $i<=$tongsotrang ; $i++){
    ?>  
    <a <?php if ($i == $trang) echo "style='background-color:black;'" ?> href="index.php?p=tintrongloai&idLT=<?php echo $idLT ?>&trang=<?php echo $i ?>">
    <?php echo $i ?></a>
    <?php }
?>
</div>