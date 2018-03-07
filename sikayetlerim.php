<?php
include("connect.php");
include("markagirisi.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sikayetvar.com</title>
 	<meta charset="utf-8" />
 	<link rel="stylesheet" href="CSS/sikayetlerim.css">
  	<link rel="stylesheet" href="CSS/markagirisi.css">
 </head>
 <body><div class="sayfa">
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
 	<input type="text" class="aramayap" placeholder="Şikayet veya marka arayın..."/>
 	</div>
 	<div style="">
 	<button class="aramabutonu"><img src="foto/arama.png" width="30" height="30"/></button>
 	</div>
 </div>
 </header>
 <div class="baslik">
 	<h1 align="center">Şikayetlerim</h1>
 	<hr class="hr1" color="#EEE"/>
 	<hr class="hr2" color="#EEE"/>
 </div>
<?php
if($_SESSION){
$kullanici_id=$_SESSION['kullanici_id'];

$sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id where kullanici.kullanici_id='$kullanici_id' ORDER BY sikayet_zaman DESC");

while($getir=mysqli_fetch_array($sorgu)){
  $sikayet_id=$getir['sikayet_id'];
  $k_id=$getir['kullanici_id'];
  $kat_id=$getir['kategori_id'];
  $mar_id=$getir['marka_id'];
  $s_basligi=$getir['sikayet_basligi'];
  $s_zaman=$getir['sikayet_zaman'];
  $profil=$getir['profil_resmi'];
  $s_icerik=$getir['sikayet_icerik'];
  $marka_adi=$getir['marka_adi'];
  $mlogo=$getir['marka_logo'];
  $k_adi=$getir['kullanici_adi'];
  $goruntulenme=0;
  $goruntulenme = mysqli_num_rows(mysqli_query($baglan,"SELECT * FROM goruntulenme where sikayet_id='$sikayet_id'"));
  echo '<a href="sikayetayrinti.php?sikayet_id='.$sikayet_id.'"><div class="div1"><div>
    <a href="tumsikayetler.php?sikayet_id='.$sikayet_id.'"><img src="foto/'.$mlogo.'" height="100" width="100" style="float:left; margin-right:8px;"/></a>
  <div class="zaman"><img src="foto/zaman.png" width="30" height="30" style="float:right; margin-right:10px; margin-top:-10px;"/>
  <span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:-5px; margin-right:-30px;">'.$s_zaman.'</span></div><br/>
  <h3 name="sikayet_baslik" style="font-size:22px; margin-top:-5px;color:black; ">'.substr($s_basligi, 0, 25).'...</h3><br/>
  <p name="sikayet_icerik" style="font-size:20px; color: #343434;margin: 0px;
  padding: 0px;">'.substr($s_icerik, 0, 85).'...</p></div>
    <div class="altkisim">
      <img src="foto/'.$profil.'" height="50" width="50" style="margin-right: 6px;
      border-radius: 36px;
      margin-left: 10px; border:0px; border-radius:100%; float:left;"/>
    <p name="kullanici_adi" style="color: inherit;
      text-decoration: none;
      cursor: pointer; padding-left:10px; margin-top:10px;float:left;color:black;">'.$k_adi.'</p>
    <span style="float:right;
         margin-top:5px;
        margin-right:15px;
         width: 60px;
          color: #fff;
  background-color: #8e7bc2;
  padding: 5px 18px;
  border-radius: 20px;
  font-size: 20px; ">
  <img src="foto/goruldu.png" width="15" height="15" style="margin-right:10px;"/>'.$goruntulenme.'</span>
    </div>
  </div></a>';
  }
}
else{
  header("Location:login2.php");
}
  ?></body>
  </html>
