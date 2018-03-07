<!DOCTYPE html>
<html>
<head>
 <title>Sikayetvar.com</title>
 <meta charset="utf-8" />
 <style text="text/css">

 .div1{
   box-shadow: 1px 1px 10px #b7b7b7;
   float:left;
   background-color: #FFF;
   margin-left: 90px;
   width:900px;
   min-height: 300px;
   height: auto;
   padding-left:25px;
	 padding-top: 20px;
	 padding-right: 15px;
   margin-bottom: 60px;
 }
 .altkisim{
    margin-left: -25px;
  margin-top: 100px;
  padding: 15px 30px 15px 30px;
  background-color: #f9f9f9;
  display: inline-block;
  width: 97.5%;
  margin-bottom: 10px;
  margin-top: 96px;

}
</style>
</head>
<body>
<?php
include("../connect.php");
if($_POST){
  $sikayet_id=$_POST['sikayet_id'];
  $sil=mysqli_query($baglan,"DELETE FROM sikayetler where sikayet_id='$sikayet_id'");
  header("Location:sikayett.php");
}
else{
  $sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id ");
while($getir=mysqli_fetch_array($sorgu))
{
  while($getir=mysqli_fetch_array($sorgu)){
  /*echo "<pre>";
  print_r($getir2);
  echo "</pre>";*/
  $sikayet_id=$getir['sikayet_id'];
  $k_id=$getir['kullanici_id'];
  $kat_id=$getir['kategori_id'];
  $mar_id=$getir['marka_id'];
  $s_basligi=$getir['sikayet_basligi'];
  $s_icerik=$getir['sikayet_icerik'];
  $s_zaman=$getir['sikayet_zaman'];
  $s_medya=$getir['sikayet_medya'];
  //$goruntulenme=$getir['goruntulenme'];
  $mlogo=$getir['marka_logo'];
  $profil=$getir['profil_resmi'];
  $k_adi=$getir['kullanici_adi'];
  $goruntulenme=0;
  $goruntulenme = mysqli_num_rows(mysqli_query($baglan,"SELECT * FROM goruntulenme where sikayet_id='$sikayet_id'"));
  echo '<div class="div1">
  <img src="../foto/'.$mlogo.'" height="100" width="100" style="float:left;"/>
  <div class="zaman"><img src="../foto/zaman.png" width="30" height="30" style="float:right; margin-right:10px;"/>
  <span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:10px; margin-right:20px;">'.$s_zaman.'</span></div><br/>
  <h3 name="sikayet_baslik" style="font-size:22px; margin-top:-5px; ">'.$s_basligi.'</h3><br/>
  <p name="sikayet_icerik" style="font-size:20px;    color: #343434;margin: 0px;
  padding: 0px;">'.$s_icerik.'</p>
    <div class="altkisim">
      <img src="../foto/'.$profil.'" height="50" width="50"
       style="margin-right: 6px;
      border-radius: 36px;
      margin-left: 10px; border:0px; border-radius:100%; float:left;"/>
    <p name="kullanici_adi" style="color:black; font-size:18px;
      text-decoration: none;
      cursor: pointer; padding-left:10px; margin-top:10px;float:left;">'.$k_adi.'</p>

      <form action="sikayett.php" method="post">
      <input type="hidden" name="sikayet_id" value="'.$getir['sikayet_id'].'"/>
      <input type="submit" style="float:right;margin-top:5px;margin-right:15px;width: 60px;color: #fff;background-color: red;padding: 8px 18px;border-radius: 20px;font-size: 20px; "value="SİL"/>
      </form>

    <span style="float:right;
         margin-top:5px;
        margin-right:15px;
         width: 60px;
          color: #fff;
  background-color: #8e7bc2;
  padding: 8px 18px;
  border-radius: 20px;
  font-size: 20px; ">
  <img src="../foto/goruldu.png" width="20" height="20" style="margin-right:10px;"/>'.$goruntulenme.'</span>
    </div>
  </div>';

}
}
}
 ?></body>
 </html>
