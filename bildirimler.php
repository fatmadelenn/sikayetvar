<?php
include("markagirisi.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/profil.css">
    <link rel="stylesheet" href="CSS/markagirisi.css">
    <link rel="stylesheet" href="CSS/bildirimler.css">
	<style text="text/css">
  html{
    font-size: 100%;
    box-sizing: border-box;
  }body{
		margin-bottom: 120px;
    background-color: #f8f8f8;
    font-family: "Nunito-Regular";
    font-size: 18px;
    padding-top: 90px;
    font-family: "Helvetica Neue", Helvetica, Roboto, Arial, sans-serif;
    font-weight: normal;
    line-height: 1.5;
    color: #343434;
    }

</style>

</head>
<body>
<div class="sayfa">
<header>
  <div class="golge">
  <a href="tumsikayetler.php">
  <img src="foto/sikayetlogo2.png" width="50" height="59" alt="logo"  left="200" top="0"/></a>

  		<div class="kose">
  		<ul class="butonlar">
  		<li class="girisbutonu"><img src="foto/profil.png" width="50" height="50"/>
  		<ul class="acilirmenu">
  				<li><a href="sikayetlerim.php">Şikayetlerim</a></li>
  				<li><a href="profil2.php">Profilim</a></li>
  				<li><a href="bildirimler.php">Bildirimlerim </a></li>
  				<li class="cikis"><a href="cikis.php" id="logoutButton">Çıkış Yap<i class="icon-right"></i>
  				</a></li>
  			</ul>

  			</li>
  		<li ><button class="sikayetyaz">
  		<a href="sikayet2.php">Şikayet Yaz</a></button></li>
  		</ul>
  	</div>
	<div style="">
		<form action="tumsikayetler.php"  method="get">
	<div style="">
		<input type="text" name="arama"class="aramayap" placeholder="Şikayet veya marka arayın..."/>
		<div style="">
		<button class="aramabutonu"/><img src="foto/arama.png" width="30" height="30"/></button>
	</div></a>
	</div>
 </form>
	</div>
</div>
</header>
<div class="baslik">
	<h1 align="center">Bildirimler</h1>
	<hr class="hr1" color="#EEE"/>
	<hr class="hr2" color="#EEE"/>
</div>

<?php
include("connect.php");
if($_SESSION){

  if($_SESSION['giris']==1)
   {

      $kullanici_id=$_SESSION['kullanici_id'];
       $durumguncelle=mysqli_query($baglan,"UPDATE musteri_bildirim SET durum=1 where kullanici_id='$kullanici_id'");
      $sorgu = mysqli_query($baglan,"SELECT * FROM kullanici where kullanici_id='$kullanici_id'");
      $sonuc =  mysqli_fetch_array($sorgu);
      $sorgu=mysqli_query($baglan,"SELECT*FROM musteri_bildirim JOIN sikayetler on sikayetler.sikayet_id=musteri_bildirim.sikayet_id
        where musteri_bildirim.kullanici_id='$kullanici_id'");
    $sorgu2=mysqli_query($baglan,"SELECT*FROM musteri_bildirim JOIN sikayetler on sikayetler.sikayet_id=musteri_bildirim.sikayet_id
          where musteri_bildirim.kullanici_id='$kullanici_id' and musteri_bildirim.durum='0'");
          $bildirimler=mysqli_num_rows($sorgu2);

      while($getir=mysqli_fetch_array($sorgu))
      {
        echo '<a href="sikayetayrinti.php?sikayet_id='.$getir['sikayet_id'].'"><div class="bildirim">
        <p><span class="bldrm" >'.$getir['sikayet_basligi'].'</span></a>başlıklı sorunuz yanıtlanmıştır.</p>
        </div>
        ';
      }
  }

}else{
	header("Location:login2.php");
}
include("markagirisi.php");
?>
