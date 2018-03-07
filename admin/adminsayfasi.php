<?php
include("../connect.php");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Sikayetvar.com</title>
 	<meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/adminsayfasi.css">

 </head>
 <body>
<?php
if($_SESSION){
    echo '<div class="menu">
    <ul>
    <li><a href="kullanici.php" target="iframe">Kullanıcılar</a>
    </li>
    <li><a href="marka.php" target="iframe">Marka</a></li>
    <li><a href="sikayett.php" target="iframe">Tüm Şikayetler</a>
   </li>
   <li><a href="../cikis.php" id="logoutButton">ÇIKIŞ</a></li>
    </div>
    <div style="width:100%; height:75%;">
    <iframe name="iframe" width="100%" height="700px;"></iframe></div>';
  }
  else{
    header("Location:admin.php");
}
?>
</body></html>
