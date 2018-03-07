<?php
include("connect.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sikayetvar.com</title>
 	<meta charset="utf-8" />
 	<link rel="stylesheet" href="CSS/markaprofil.css">
  <link rel="stylesheet" href="CSS/cevaplanan.css">
 </head>
 <body><div class="girisarkaplan"> <header>
   <div class="golge">
   <a href="tumsikayetler.php">
   <img src="foto/business.png" width="200" height="70" alt="logo"  left="200"/></a>
   <a href="markaprofil.php"><p class="cevaplanan" style="margin-left:820px;">Şikayetler</p></a>
   <p class="markayazi">Marka Profil Sayfası</p>
   <a href="cikis.php" ><p class="cikis">Çıkış Yap</p></a>
   </div>
   </header>

<?php
if($_SESSION){
$marka_id=$_SESSION['marka_id'];

$sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id JOIN cevap on sikayetler.sikayet_id=cevap.sikayet_id where marka.marka_id='$marka_id' and sikayetler.cevapdurumu='1'");

while($getir=mysqli_fetch_array($sorgu)){
  $sikayet_id=$getir['sikayet_id'];
  $k_id=$getir['kullanici_id'];
  $kat_id=$getir['kategori_id'];
  $mar_id=$getir['marka_id'];
  $cevap=$getir['cevap'];

  $s_basligi=$getir['sikayet_basligi'];
  $s_icerik=$getir['sikayet_icerik'];
  $s_zaman=$getir['sikayet_zaman'];
  $s_medya=$getir['sikayet_medya'];
  //$goruntulenme=$getir['goruntulenme'];
  $mlogo=$getir['marka_logo'];
  $profil=$getir['profil_resmi'];
  $k_adi=$getir['kullanici_adi'];
  $goruntulenme=0;
  $goruntulenme = mysqli_num_rows(mysqli_query($baglan,"SELECT * FROM goruntulenme where sikayet_id='$sikayet_id'"));

  echo '
  <div class="div1"><div class="fotodivi">  <div>
    </div><img src="foto/'.$mlogo.'" height="100" width="100" class="baslikfoto"/>
</div>
<div class="zaman"><img src="foto/zaman.png" width="30" height="30" style="float:right; margin-right:10px;"/>
<span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:10px; margin-right:10px;">'.$s_zaman.'</span></div><br/>
  <h3 name="sikayet_baslik"  class="sikayet_baslik">'.$s_basligi.'</h3><br/>
  <p name="sikayet_icerik" class="icerik">'.substr($s_icerik, 0, 700).'..</p>
    <div class="altkisim">
      <img src="foto/'.$profil.'" height="50" width="50" class="profil"/>
      <p name="kullanici_adi" class="kullaniciadi" >'.$k_adi.'</p>
      <span class="goruldu"><img src="foto/goruldu.png" width="20" height="20" style="margin-right:8px;" />'.$goruntulenme.'</span>

  <div >
  <h4 style="color:#b7b7b7;font-family: Nunito-Regular;margin-top:80px;"> CEVAP: </h4><p name="cevap" style="font-family: Nunito-ExtraBold;font-size:18px; font-weight:bold;
border-radius:40px;box-shadow: -2px 4px 30px 0px rgba(0, 0, 0, 0.08);  width: 91.5%;
        padding: 20px;
        min-height: 50px; height:auto; margin-bottom:20px;">'.substr($cevap, 0, 79).'..</p></div>
</div></div>
';
}
 }
 else{
   header("Location:markalogin2.php");
 }
  ?>
