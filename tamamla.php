
<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/tamamla.css">
		<link rel="stylesheet" href="CSS/markagirisi.css">
  <body><img src="foto/arkaplan.jpg"/><div class="girisarkaplan"><div>
	<a href="profil2.php"><img src="foto/kapat.png" width="50" height="50" class="kapat" /></a>
	</div>
  	<div class="form" ><h2 align="center">Profil Değişikliği</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
<?php
if($_SESSION["giris"]!=1){
	header("Location:login2.php");

}
  @$kullanici_id=$_SESSION['kullanici_id'];
if ($_POST) {

  @$aylik_gelir=$_POST['aylik_gelir'];
  @$cinsiyet=$_POST['cinsiyet'];
  $medeni_durum=$_POST['medeni_durum'];
  $egitim_durumu=$_POST['egitim_durumu'];
  $calisma_durumu=$_POST['calisma_durumu'];

  $sorgu=  mysqli_query($baglan,  "UPDATE kullanici SET aylik_gelir='$aylik_gelir' ,cinsiyet='$cinsiyet', medeni_durum='$medeni_durum', egitim_durumu='$egitim_durumu',calisma_durumu='$calisma_durumu' where kullanici_id='$kullanici_id'");
	header("Location:profil2.php");
}
$yazdir=mysqli_fetch_array(mysqli_query($baglan,"SELECT * FROM kullanici where kullanici_id='".$kullanici_id."'"));


echo'
<form method="POST" action="tamamla.php">
  <label>Aylık Gelir:</label><br/>
  <select name="aylik_gelir" class="aylik" value="'.$yazdir['aylik_gelir'].'">
    <option value="Belirtilmemiş">Belirtilmemiş</option>
  <option value="1000">1000</option>
  <option value="1000-2000">1000-2000</option>
  <option value="2000-3000">2000-3000</option>
  <option value="4000-5000 ">4000 üstü</option>
  <option value="6000 üstü">2000-3000</option>
</select><br/>
  <label>Cinsiyet</label><br/>
  <select name="cinsiyet" value="'.$yazdir['cinsiyet'].'">
  <option value="Belirtilmemiş">Belirtilmemiş</option>
  <option value="Bay">Bay</option>
  <option value="Bayan">Bayan</option>
  </select><br/>
  <label>Medeni Durumu</label><br/>
  <select name="medeni_durum" value="'.$yazdir['medeni_durum'].'">
  <option value="Belirtilmemiş">Belirtilmemiş</option>
  <option value="Evli">Evli</option>
  <option value="Bekar">Bekar</option>
  <option value="Dul">Dul</option>
</select><br/>
  <label>Eğitim Durumu</label><br/>
  <select name="egitim_durumu" value="'.$yazdir['egitim_durumu'].'">
  <option value="Belirtilmemiş">Belirtilmemiş</option>
  <option value="Okur Yazar Değil">Okur Yazar Değil</option>
  <option value="İlköğretim">İlköğretim</option>
  <option value="Lise">Lise</option>
  <option value="Üniversite">Üniversite</option>
</select><br/>
  <label>Çalışma Durumu</label><br/>
  <select name="calisma_durumu" value="'.$yazdir["calisma_durumu"].'">
  <option value="Belirtilmemiş">Belirtilmemiş</option>
  <option value="Çalışıyor">Çalışıyor</option>
  <option value="Çalışmıyor">Çalışmıyor</option>
</select><br/>
<input type="submit" class="gbuton" value="Güncelle"/><br/>
</form>' ;

include("markagirisi.php");
?>
