<?php
include("../connect.php");
if($_POST){
  $marka_id=$_POST['marka_id'];
  $onay=mysqli_query($baglan,"UPDATE marka SET durum='1' where marka_id='$marka_id' ");
  header("Location:marka.php");
}
else{
$sorgu=mysqli_query($baglan,"SELECT*FROM marka where  durum='0'");
while($getir=mysqli_fetch_array($sorgu))
{
  echo '<div class="marka" style="border:1px solid blue;height:100px; widht:400px;margin-left:300px; margin-right:300px;margin-bottom:10px;">
  <p class="adi" style="font-size:20px; margin-left:100px;" >'.$getir['marka_adi'].'</p>
  <div class="foto"><img src="../foto/'.$getir["marka_logo"].'" width="70" height="70" style="margin-left:300px; margin-top:-50px;"/>
  <form action="marka.php" method="post">
  <input type="hidden" name="marka_id" value="'.$getir['marka_id'].'"/>
  <input type="submit" value="Marka Onayla" style="float:right;width:100px;height:70px; margin-top:-70px; margin-right:100px;"/></form></div>
  </div>';
}
}

 ?>
