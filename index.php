<?php
include("connect.php");
include("markagirisi.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sikayetvar.com</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="CSS/girisheader.css">

  <link rel="stylesheet" href="CSS/markagirisi.css">

	<style text="text/css">

	.body{
		background-image:url("foto/istanbul.jpg") ;
		width: 100%;
	    height: 881px;
	    background-size: 100%;
	    background-position: bottom;
	    background-repeat: no-repeat;
	    margin-top: -300px;
		margin-left: -20px;
		padding-right: 30px;

	}

	body{
    	font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
    	font-size: 18px;
   	 	padding-top: 90px;
   	 	font-weight: normal;


		}

    	.aramayap{
    		float:left;
    		width: 600px;
    		height: 60px;
    		margin-top: 400px;
    		margin-bottom: 100px;
    		margin-left: 350px;
    		margin-right: 250px;
    		border-radius: 50px;
    		border-style: none;
    		padding-left:15px;
    		font-size: 20px;

    	}
    	a:link{
    		color:#FFF;
    		text-decoration: none;
    	}
    	a:visited{
    		color:#FFF;
    	}
    	a:hover{
    		color:#00c35c;
    	}
    	.form{
    		width: 1200px;
    		margin: auto;
    	}
    	.aramabutonu{
    		position: absolute;
    		background-color: #8ccc00;
    		width: 50px;
    		height: 50px;
    		border-radius: 100%;
    		border-style: none;
    		right:  25%;
        	top: 220px;

    	}
      .surec{
        margin-left: -25px;
        margin-right: -65px;

      }
      .detay{
        background-color: #f8f8f8;
        margin-left: -25px;
        margin-right: -65px;
      }
      .detaylar{
      background-color: #fff;
      border-radius: 28px;
        margin-top: 50px;
        margin-bottom: 150px;
        border-color: #f79843;
        margin-left: 550px;
        color: #e77f22;
        width: 120px;
        height: 50px;
        font-size: 18px;
      }
      .detaylar:hover{
      background-color: #e77f22 ;
        border-color: #e77f22;
        color: #fff ;
      }

	</style>
</head>
<body>
<div class="sayfa">
<header>
<div class="golge">
<img src="foto/sikayetlogoo.png" width="200" height="59" alt="logo"  left="200"
		top="0"/>
		<div class="kose">
		<ul class="butonlar">
		<li class="girisbutonu"><a href="login2.php">Giriş Yap</a></li>
		<li class="uyeol"><a href="uyeol2.php">Üye Ol</a></li>
		<li ><button class="sikayetyaz"><a href="sikayet2.php">Şikayet Yaz</a></button></li>
		</ul>
		</div>
</div>
</header>
<div class="body">
<div class="form" style="">

      <form action="tumsikayetler.php"  method="get">
    <div style="">
    	<input type="text" name="arama" class="aramayap" placeholder="Şikayet veya marka arayın..."/>
      <div style="">
      <input type="submit" value="" class="aramabutonu"/>
      </div></a>
    </div>
    </form>

<div class="surec">
<img src="foto/surec.png" width="100%" height="400"></div>
<div class="detay">
<input type="submit" name="detaylar" class="detaylar" value="Detaylar"/><a href="#"></a>
</div></div>
