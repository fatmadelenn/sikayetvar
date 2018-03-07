

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/login.css">
	<style text="text/css">
  body{
  background:url("foto/arkaplan.jpg");
  background-size: 100%;
  background-position: bottom;
  background-repeat: no-repeat;
  margin-top: 0px;
  margin-left: 0px;
  padding-right: 30px;
  margin-bottom: 700px;
  position: relative;
  width: 100%;
  height: 100%;
  }
	</style>
</head>
<body >

	<div class="girisarkaplan">
		<div class="logo"><img src="foto/loginlogo.png " class="resim" align="center" /></div>
	<div>
	<a href="index.php"><img src="foto/kapat.png" width="50" height="50" class="kapat" /></a>
	</div>
	<div class="form">
		<h2 align="center">Giriş Yap</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
		<form action="login2.php" method="POST">
			<label>E-posta veya Cep Telefonu</label></br>
			<input type="email" name="mail" class="mail"  required/></br>
			<label>Şifre</label></br>
			<input type="password" name="kullanici_sifre" class="kullanici_sifre"  required/></br>

			<input type="submit" name="gbuton" class="gbuton" value="Giriş Yap"/></br>
			<span class="unuttunmu">Şifreni mi unuttun?</span>
			<span class="uyeol"><a href="uyeol2.php">Üye Ol</a></span>
			</form>
	</div>
	</div>
</body>
</html>
<?php
include("connect.php");
if($_POST){
$mail=$_POST['mail'];
$kullanici_sifre=$_POST['kullanici_sifre'];
$sorgu=mysqli_query($baglan,"SELECT * FROM kullanici WHERE mail='$mail'");
while($getir=mysqli_fetch_array($sorgu))
{
  $kullanici_adi=$getir['kullanici_adi'];
  $kullanici_id=$getir['kullanici_id'];
  $sifre=$getir['kullanici_sifre'];
  $foto=$getir['profil_resmi'];
  if($kullanici_sifre==$sifre){
    $_SESSION['giris']=1;
    $_SESSION['kullanici_id']=$kullanici_id;
    $_SESSION['kullanici_adi']=$kullanici_adi;
    $_SESSION['profil_resmi']=$foto;

    header("Location: profil2.php");
  }
  else {
    echo "Mail veya şifre yanlış";
  }
}

}
?>
