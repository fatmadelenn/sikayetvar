
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/sikayet.css">
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
	<h1 align="center">Şikayet Yaz</h1>
	<hr class="hr1" color="#EEE"/>
	<hr class="hr2" color="#EEE"/>
<div class="form1">
	<form action="sikayet2.php" method="post">
	<label>Şikayetiniz</label></br>
	<input type="text" name="sikayet_icerik" class="sikayet"required/></br>
	<label>Şikayet Başlığı</label></br>
	<input type="text" name="sikayet_basligi" class="baslik" required/></br>
	<label>Şikayet Kategori</label></br>
	<select  name="kategori_id" class="firma">
	<?php
	include("connect.php");
	$sorgu = mysqli_query($baglan,"SELECT * FROM kategori ");
	while(	$sonuc =  mysqli_fetch_array($sorgu))
	{
		echo '<option value="'.$sonuc[kategori_id].'">'.$sonuc[kategori_adi].'</option>';
	} ?>
	</select></br>
	<label>Şikayetçi Olduğunuz Firma</label></br>
	<select  name="marka_id" class="firma">
	<?php
	include("connect.php");
	$sorgu = mysqli_query($baglan,"SELECT * FROM marka ");
	while(	$sonuc =  mysqli_fetch_array($sorgu))
	{
		echo '<option value="'.$sonuc[marka_id].'">'.$sonuc[marka_adi].'</option>';
	} ?>
	</select></br>
	<label>Varsa Şikayetine Dair Görseller</label></br>
	<input type="file" name="sikayet_medya" class="resim" value="Resim/Video Yükle"/>
	<input type="submit" class="gönder" name="gönder" value="Gönder"/>
	</form>
	</div>
</div>
</div>

</body>
</html>

<?php
include("connect.php");

if($_SESSION){
	if($_SESSION['giris']==1)
	 {
  $kullanici_id=$_SESSION['kullanici_id'];
if($_POST){
$sikayet_basligi=$_POST["sikayet_basligi"];
$sikayet_icerik=$_POST["sikayet_icerik"];
$kategori_id=$_POST['kategori_id'];
$marka_id=$_POST["marka_id"];
$sikayet_medya=$_POST["sikayet_medya"];
$veritabaninaKaydet =mysqli_query($baglan, "INSERT INTO sikayetler(kullanici_id,kategori_id,sikayet_basligi,sikayet_icerik,marka_id,sikayet_medya)
values('$kullanici_id','$kategori_id','$sikayet_basligi','$sikayet_icerik','$marka_id','$sikayet_medya')");
	header("Location:sikayetlerim.php");
	}
}
}

include("markagirisi.php");
?>
