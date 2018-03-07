<?php
include("connect.php");
?>
<!DOCTYPE html>
<html>
<head>
 <title>Sikayetvar.com</title>
 <meta charset="utf-8" />
 <link rel="stylesheet" href="CSS/cevapla.css">
</head>
<body><img src="foto/arkaplan.jpg"/> <div class="girisarkaplan">
<?php
if($_POST){
   $cevap=$_POST['cevap'];
   $sikayet_id= $_GET['sikayet_id'];
   $temsilci_id=$_SESSION['mtemsilci_id'];
   $ekle=mysqli_query($baglan,"INSERT INTO cevap(sikayet_id,temsilci_id,cevap) values('$sikayet_id','$temsilci_id','$cevap') ");
   $durumguncelle=mysqli_query($baglan,"UPDATE sikayetler SET cevapdurumu=1 where sikayet_id='$sikayet_id'");
   $sorgugetir=mysqli_query($baglan,"SELECT * FROM sikayetler where sikayet_id=$sikayet_id");
   $getir=mysqli_fetch_array($sorgugetir);
   $kullanici_id=$getir['kullanici_id'];
  $bildirim=mysqli_query($baglan,"INSERT INTO musteri_bildirim(sikayet_id,kullanici_id,temsilci_id) values('$sikayet_id','$kullanici_id','$temsilci_id') ");
header("Location:markaprofil.php");
}
 if($_GET){
   $sikayet_id=$_GET['sikayet_id'];
   $sorgu=mysqli_query($baglan,"SELECT*FROM sikayetler JOIN marka on sikayetler.marka_id=marka.marka_id JOIN kategori on sikayetler.kategori_id=kategori.kategori_id JOIN kullanici on sikayetler.kullanici_id= kullanici.kullanici_id where sikayetler.sikayet_id='$sikayet_id'");
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
     echo '<div class="div1"><div class="fotodivi">  <div>
       <a href="markaprofil.php"><img src="foto/kapat.png" width="50" height="50" class="kapat" /></a>
       </div><img src="foto/'.$mlogo.'" height="100" width="100" class="baslikfoto"/>
   </div>
   <div class="zaman"><img src="foto/zaman.png" width="30" height="30" style="float:right; margin-right:10px;"/>
   <span class="sure" style="float:right;color: #c1c1c2; font-size:15px; margin-top:10px; margin-right:10px;">'.$s_zaman.'</span></div><br/>
     <h3 name="sikayet_baslik"  class="sikayet_baslik">'.$s_basligi.'</h3><br/>
     <p name="sikayet_icerik" class="icerik">'.$s_icerik.'...</p>
       <div class="altkisim">
         <img src="foto/'.$profil.'" height="50" width="50" class="profil"/>
         <p name="kullanici_adi" class="kullaniciadi" >'.$k_adi.'</p>
         <span class="goruldu"><img src="foto/goruldu.png" width="20" height="20" style="padding-right:10px;"/>'.$goruntulenme.'</span>
       </div>
     </div><div class="form">
    <form method="post" action="cevapla.php?sikayet_id='.$sikayet_id.' ">
    <textarea style="resize:none" name="cevap" class="cevap" required ></textarea>
    <input type="submit" value="Cevapla" class="buton"/>
    </form></div>
    
 ';
}
}
else{
  header("Location:markalogin2.php");
}
 ?></body>
