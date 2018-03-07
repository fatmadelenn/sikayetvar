<?php
include("connect.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sikayetvar.com</title>
 	<meta charset="utf-8" />
 	<link rel="stylesheet" href="CSS/markaprofil.css">
 </head>
 <body><div class="girisarkaplan"> <header>
   <div class="golge">
   <a href="tumsikayetler.php">
   <img src="foto/business.png" width="200" height="70" alt="logo"  left="200"/></a>
   <a href="cevaplanan.php"><p class="cevaplanan">Cevaplanan şikayetler</p></a>
   <p class="markayazi">Marka Profil Sayfası</p>
   <a href="cikis.php" ><p class="cikis">Çıkış Yap</p></a>
   </div>
   </header>

<?php
if($_SESSION){
$marka_id=$_SESSION['marka_id'];

$sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id where marka.marka_id='$marka_id' and sikayetler.cevapdurumu='0'");

while($getir=mysqli_fetch_array($sorgu)){

  $sikayet_id=$getir['sikayet_id'];
  $s_basligi=$getir['sikayet_basligi'];
  $s_zaman=$getir['sikayet_zaman'];
  $mlogo=$getir['marka_logo'];
  $k_adi=$getir['kullanici_adi'];
  $goruntulenme=0;
  echo '
  <div class="endisdiv"><div class="div1"><div class="fotodivi"><img src="foto/'.$mlogo.'" height="70" width="70" class="foto"/></div><br/>
  <h3 name="sikayet_baslik" class="baslik" >'.substr($s_basligi, 0, 70).'...</h3>
  <div class="zaman"><img src="foto/zaman.png" width="30" height="30" style="float:right; margin-right:20px; margin-top:-115px;"/>
  <span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:-110px; margin-right:60px;">'.$s_zaman.'</span></div><br/>
  <p name="kullanici_adi" class="kullanici" >'.$k_adi.'</p>  </div>
  <div  class="cevapla"><a href="cevapla.php?sikayet_id='.$sikayet_id.'"><input type="submit" class="buton" value="Cevapla"/></a></div>
</div>';

}
 }
 else{
   header("Location:markalogin2.php");
 }

  ?> </div></body>
