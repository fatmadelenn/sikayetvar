<?php
include("../connect.php");
if($_POST){
  $kullanici_id=$_POST['kullanici_id'];
  $aktiflik=mysqli_query($baglan,"UPDATE kullanici SET aktiflik='0' where kullanici_id='$kullanici_id' ");
  header("Location:kullanici.php");
}else{
$sorgu=mysqli_query($baglan,"SELECT*FROM kullanici where yetki='0' and aktiflik='1'");
while($getir=mysqli_fetch_array($sorgu))
{
  echo '<div class="kullanici" style="border:1px solid blue;height:100px; padding-top:30px; padding-left:50px;widht:400px;margin-left:300px; margin-right:300px;margin-bottom:10px;>
    <p class="adi" style="font-size:30px;">'.$getir['kullanici_adi'].'</p>
    <div class="foto"><img src="../foto/'.$getir["profil_resmi"].'"width="70" height="70" style="margin-left:300px; margin-top:-40px;"/>
  <form action="kullanici.php" method="post">
  <input type="hidden" name="kullanici_id" value="'.$getir['kullanici_id'].'"/>
  <input type="submit" value="SİL" style="float:right;width:100px;height:70px; margin-top:-70px; margin-right:100px;"/></form></div>
    </div>';
}
}
?>
