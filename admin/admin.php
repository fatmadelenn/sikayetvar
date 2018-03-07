
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
	<style text="text/css">
  body{
  background-color:#663366;
  background-size: 100%;
  width: 100%;
  height: 100%;
  }
  label{
    font-size: 18px;
  }
  input{
    width: 350px;
    height: 25px;
    margin-top: 8px;
    margin-bottom: 8px;
    padding-left: 20px;
  }

	</style>
</head>
<body >
	<div class="form" style="background-color:#fff; width:350px; height:250px; margin:auto; margin-top:200px; padding:40px;">
		<h2 align="center" style="margin-top:-10px;color:#663366;">Giriş Yap</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
		<form action="admin.php" method="POST">
			<label>Admin Kullanıcı Adı</label></br>
			<input type="text" name="kullanici_adi" class="adi" /></br>
			<label>Şifre</label></br>
			<input type="password" name="kullanici_sifre" class="kullanici_sifre" /></br>
			<input type="submit" name="gbuton" class="gbuton" value="Giriş Yap" style="width:100px; height:50px; margin-top:20px; margin-bottom:20px; margin-left:110px; box-shadow:1px 1px 20px; font-size:18px;"/></br>
			</form>
	</div>
</body>
</html>
<?php
include("../connect.php");
if($_POST){
$kullanici_adi=$_POST['kullanici_adi'];
$kullanici_sifre=$_POST['kullanici_sifre'];
$sorgu=mysqli_query($baglan,"SELECT * FROM kullanici WHERE kullanici_adi='$kullanici_adi'");
while($getir=mysqli_fetch_array($sorgu))
{
	if($getir['yetki']==1){
  $adi=$getir['kullanici_adi'];
  $kullanici_id=$getir['kullanici_id'];
  $sifre=$getir['kullanici_sifre'];
  if($kullanici_sifre==$sifre){
    $_SESSION['giris']=3;
    $_SESSION['kullanici_id']=$kullanici_id;
   header("Location:adminsayfasi.php");
  }
}
  else {
    echo "kullanici veya şifre yanlış";
  }
}
}
?>
