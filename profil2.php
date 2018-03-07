<?php
include("markagirisi.php");
include("connect.php");
$bildirimler="";
if($_SESSION){

  if($_SESSION['giris']==1)
   {
      $kullanici_id=$_SESSION['kullanici_id'];

$sorgu2=mysqli_query($baglan,"SELECT*FROM musteri_bildirim JOIN sikayetler on sikayetler.sikayet_id=musteri_bildirim.sikayet_id
      where musteri_bildirim.kullanici_id='$kullanici_id' and musteri_bildirim.durum='0'");
      $bildirimler=mysqli_num_rows($sorgu2);
    }}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/profil.css">
    	<link rel="stylesheet" href="CSS/markagirisi.css">
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
				<li><a href="bildirimler.php">Bildirimlerim <span style="margin-left:10px;color:white;border:1px solid red; text-align:center; width: 10px; height:5px;border-radius:100%; background-color:red;padding:1px 6px 1px 6px;"><?php echo $bildirimler; ?> </span> </a></li>
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
	<h1 align="center">Profil</h1>
	<hr class="hr1" color="#EEE"/>
	<hr class="hr2" color="#EEE"/>
</div>

<?php

if($_SESSION){
if($_SESSION['giris']==1)
 {
    $kullanici_id=$_SESSION['kullanici_id'];
    $sorgu = mysqli_query($baglan,"SELECT * FROM kullanici where kullanici_id='$kullanici_id'");
    $sonuc =  mysqli_fetch_array($sorgu);
echo '
<div class="profil">
<div class="profilad">
<img src="foto/'.$sonuc["profil_resmi"].'" class="foto" width="130" height="130" style="border-radius:100%;"/></br>
<span class="kisiadi">'.$sonuc["kullanici_adi"].'</span>
</div>
<div class="profiltamamla">
<span class="sehir">'.strtoupper($sonuc["yasadigi_sehir"]).'</span>
<a href="tamamla.php"><button class="tamamla">Profilimi Tamamla</button></a>
</div>
</div>
<div class="sil">
<button class="hesabisil">Hesabı Sil</button>
</div>
<div class="bilgiler">
<h3>Üyelik Bilgileri</h3>
<form action="guncelle.php" method="post">
<label class="adsoyad">Ad Soyad:'.$sonuc["kullanici_adi"].'</label><a href="guncelle.php"><input type="submit" class="guncelle" value="Güncelle"/></a><br/>
<label class="eposta">E-Posta:'.$sonuc["mail"].'</label><br/>
<label class="tel">Telefon:'.$sonuc["telefon_no"].'</label><br/>
<label class="sifre">Şifre:'.$sonuc["kullanici_sifre"].'</label>
<hr class="hr3" />
<label class="tel">Aylık Gelir:'.$sonuc["aylik_gelir"].'</label><br/>
<label class="sifre">Medeni Durumu:'.$sonuc["medeni_durum"].'</label><br/>
<label class="tel">Cinsiyet:'.$sonuc["cinsiyet"].'</label><br/>
<label class="sifre">Çalışma Durumu:'.$sonuc["calisma_durumu"].'</label><br/>
<label class="tel">Eğitim Durumu:'.$sonuc["egitim_durumu"].'</label>
</form>
</div>';
}

}
else{
	header("Location:login2.php");
}
include("markagirisi.php");
?>
