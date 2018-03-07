
<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/guncelle.css">
	<link rel="stylesheet" href="CSS/markagirisi.css">
  <body><img src="foto/arkaplan.jpg"/><div class="girisarkaplan"><div>
	<a href="profil2.php"><img src="foto/kapat.png" width="50" height="50" class="kapat" /></a>
	</div>
  	<div class="form"><h2 align="center" >Kişisel Bilgi Değişikliği</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
<?php
if($_SESSION["giris"]!=1){
	header("Location:login2.php");

}
  @$kullanici_id=$_SESSION['kullanici_id'];
if ($_POST) {

  @$kullanici_adi=$_POST['kullanici_adi'];
  @$mail=$_POST['mail'];
  $telefon_no=$_POST['telefon_no'];
  $kullanici_sifre=$_POST['kullanici_sifre'];

  $sorgu=  mysqli_query($baglan,  "UPDATE kullanici SET kullanici_adi='$kullanici_adi' ,mail='$mail', telefon_no='$telefon_no', kullanici_sifre='$kullanici_sifre' where kullanici_id='$kullanici_id'");
	header("Location:profil2.php");
}
$yazdir=mysqli_fetch_array(mysqli_query($baglan,"SELECT * FROM kullanici where kullanici_id='".$kullanici_id."'"));


echo'
<form method="POST" action="guncelle.php">
  <label>Ad Soyad:</label><br/>
  <input type="text" name="kullanici_adi" class="adi" value="'.$yazdir["kullanici_adi"].'" required/><br/>
  <label>E-Posta:</label><br/>
  <input type="text" name="mail" class="email" value="'.$yazdir["mail"].'" required/><br/>
  <label>Telefon:</label><br/>
  <input type="text" name="telefon_no" class="telefon" value="'.$yazdir["telefon_no"].'" required/><br/>
  <label>Şifre:</label><br/>
  <input type="password" name="kullanici_sifre" class="sifre" value="'.$yazdir["kullanici_sifre"].'" required/><br/>
  <input type="submit" class="gbuton" value="Güncelle"/><br/>
</form>';


include("markagirisi.php");
?>
