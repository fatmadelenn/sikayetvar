<?php
include("connect.php");
 ?>
 <!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/header.css">
	<style text="text/css">
</style>
</head>
<body>
<div class="sayfa">
<header>

<div class="golge">
<a href="tumsikayetler.php">
<img src="foto/sikayetlogo2.png" width="50" height="59" alt="logo"  /></a>
		<div class="kose">
		<ul class="butonlar">
      <?php
      $giris=0;
      if($_SESSION){
        $giris=$_SESSION['giris'];
      }
      if($giris==1){
        echo'
        <div class="kose">
    		<ul class="butonlar">
    		<li class="girisbutonu"><img src="foto/profil.png" width="50" height="50"/>
    		<ul class="acilirmenu">
    				<li><a href="sikayetlerim.php">Şikayetlerim</a></li>
    				<li><a href="profil2.php">Profilim</a></li>
    				<li><a href="bildirimler.php">Bildirimlerim </a></li>
    				<li class="cikis"><a href="cikis.php" id="logoutButton">Çıkış Yap
    				</a></li>
    			</ul>

    			</li>
    		</ul>
    		</div>';
      }

        else{
        echo '
		<div class="link">
		<li class="girisbutonu1"><a href="login2.php">Giriş Yap</a></li>
		<hr class="linklerarasi">
		<li class="uyeol"><a href="uyeol2.php">Üye ol</a></li></div>'; } ?>

		</ul>
		</div>
    <div class="form" style="">
          <form action="tumsikayetler.php"  method="get">
        <div style="">
        	<input type="text" name="arama" class="aramayap" placeholder="Şikayet veya marka arayın..."/>
          <div style="">
          <input type="submit" value="" class="aramabutonu"/>
          </div></a>
        </div>
      </form></div></a>
	<div style="">
	<button class="aramabutonu"><img src="foto/arama.png" width="30" height="30"/></button>
	</div>
</div>
</header>
