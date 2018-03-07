<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/sikayetayrinti.css">
	<link rel="stylesheet" href="CSS/markagirisi.css">
</head>
<body>
  <div class="girisarkaplan">
<?php
include("connect.php");
if($_SESSION){
$kullanici_id=$_SESSION['kullanici_id'];

if($_GET){
@$sikayet_id=$_GET['sikayet_id'];}
$sorgu2=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id where sikayetler.sikayet_id='$sikayet_id'");
$getir2=mysqli_fetch_array($sorgu2);

$cevapdurumu=$getir2['cevapdurumu'];


if ($cevapdurumu == 1) {
	$sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id JOIN cevap on sikayetler.sikayet_id=cevap.sikayet_id where sikayetler.sikayet_id='$sikayet_id'");
}
else {
	$sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id where sikayetler.sikayet_id='$sikayet_id'");

}



$getir=mysqli_fetch_array($sorgu);

  $sikayet_id=$getir2['sikayet_id'];
  $sorgu2=mysqli_query($baglan, "INSERT INTO goruntulenme(sikayet_id,kullanici_id) values('$sikayet_id','$kullanici_id')");
	$sikayet_id=$getir2['sikayet_id'];
  $k_id=$getir2['kullanici_id'];
  $kat_id=$getir2['kategori_id'];
  $mar_id=$getir2['marka_id'];
	@$cevap=$getir['cevap'];
  $s_basligi=$getir2['sikayet_basligi'];
  $s_icerik=$getir2['sikayet_icerik'];
  $s_zaman=$getir2['sikayet_zaman'];
  $s_medya=$getir2['sikayet_medya'];
  $mlogo=$getir2['marka_logo'];
  $profil=$getir2['profil_resmi'];
  $k_adi=$getir2['kullanici_adi'];
  $goruntulenme=0;
  $goruntulenme = mysqli_num_rows(mysqli_query($baglan,"SELECT * FROM goruntulenme where sikayet_id='$sikayet_id'"));
  echo '<div class="div1"><div class="fotodivi">  <div>
    <a href="tumsikayetler.php"><img src="foto/kapat.png" width="50" height="50" class="kapat" /></a>
    </div><img src="foto/'.$mlogo.'" height="100" width="100" class="baslikfoto"/>
</div>
<div class="zaman"><img src="foto/zaman.png" width="30" height="30" style="float:right; margin-right:10px;"/>
<span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:10px; margin-right:-30px;">'.$s_zaman.'</span></div><br/>
  <h3 name="sikayet_baslik"  class="sikayet_baslik">'.$s_basligi.'</h3><br/>
  <p name="sikayet_icerik" class="icerik">'.substr($s_icerik, 0, 870).'..</p>
    <div class="altkisim">
      <img src="foto/'.$profil.'" height="50" width="50" class="profil"/>
      <p name="kullanici_adi" class="kullaniciadi" >'.$k_adi.'</p>
      <span class="goruldu"><img src="foto/goruldu.png" width="20" height="20" />'.$goruntulenme.'</span>
';

	if ($cevapdurumu == 1) {

	 			echo ' <div class="cevapdivi">
	 			  <h4 style="color:#b7b7b7;font-family: Nunito-Regular;margin-top:40px;"> CEVAP: </h4><p name="cevap" style="font-family: Nunito-ExtraBold;font-size:18px; font-weight:bold;
	 			border-radius:40px;box-shadow: -2px 4px 20px 0px rgba(0, 0, 0, 0.08);  width: 82.5%;
	 			        padding: 20px; margin-top:-15px;margin-left:100px;
	 			        min-height: 40px; height:auto; margin-bottom:20px;">'.substr($cevap, 0, 80).'</p>
								</div>
	 			</div>
	';

			echo '</div>';
}
}
else{
	header("Location:login2.php");
}
 ?></body>
 </div>
 <?php include("markagirisi.php");
  ?>
