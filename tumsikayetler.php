<?php
include("header.php");
include("markagirisi.php");

?>
<!DOCTYPE html>
<html>
<head>
 <title>Sikayetvar.com</title>
 <meta charset="utf-8" />
<link rel="stylesheet" href="CSS/markagirisi.css">
 <style text="text/css">

 .div1{
   box-shadow: 1px 1px 10px #b7b7b7;
   float:left;
   background-color: #FFF;

   margin-left: 90px;
   width: 500px;
   height: 300px;
   padding-left:25px;
	 padding-top: 20px;
	 padding-right: 15px;

   width: 500px;

   margin-bottom: 60px;
 }
 .altkisim{
    margin-left: -25px;
  margin-top: 100px;
  padding: 15px 30px 15px 30px;
  background-color: #f9f9f9;
  display: inline-block;
  width: 96%;
  margin-bottom: -8px;
  margin-top: 96px;

}
</style>
</head>
<body>
<div class="baslik">
	<h2>Tüm Şikayetler</h2>

	</div>


	<?php
  if($_GET){
    if($_GET['arama']){
      @$arama=$_GET['arama'];

        $sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id WHERE marka_adi LIKE '%$arama%' ");
      $varmi = mysqli_num_rows($sorgu);
      if($varmi==0&&empty($varmi)){
        echo '<div style="background-color:#fff; width:900px;
        height:60px;
        margin-left:200px;
        margin-top:50px; text-align:center;
        padding-top:40px;    font-size: 20px;        color: #666;     font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
    border: solid 1px #f4f4f4;">Böyle bir marka veya bu markaya ait şikayet yoktur...</div>';
      }
    }
  }
    else{
    $sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id ORDER BY sikayet_zaman DESC");
    }

		while($getir=@mysqli_fetch_array($sorgu)){
		$sikayet_id=$getir['sikayet_id'];
		$k_id=$getir['kullanici_id'];
		$kat_id=$getir['kategori_id'];
		$mar_id=$getir['marka_id'];
		$s_basligi=$getir['sikayet_basligi'];
		$s_icerik=$getir['sikayet_icerik'];
		$s_zaman=$getir['sikayet_zaman'];
		$s_medya=$getir['sikayet_medya'];
		$mlogo=$getir['marka_logo'];
		$profil=$getir['profil_resmi'];
		$k_adi=$getir['kullanici_adi'];
		$goruntulenme=0;
		$goruntulenme = mysqli_num_rows(mysqli_query($baglan,"SELECT * FROM goruntulenme where sikayet_id='$sikayet_id'"));
		echo '<a href="sikayetayrinti.php?sikayet_id='.$sikayet_id.'"><div class="div1"><div>
    <img src="foto/'.$mlogo.'" height="100" width="100" style="float:left; margin-right:8px;"/>
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
	 ?>
</body>
