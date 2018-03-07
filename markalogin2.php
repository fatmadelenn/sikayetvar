
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
  	<link rel="stylesheet" href="CSS/markalogin.css">
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
		<h2 align="center">Marka Girişi</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
		<form action="markalogin2.php" method="POST">
			<label>E-posta veya Cep Telefonu</label></br>
			<input type="email" name="temsilci_mail" class="mail" required/></br>
			<label>Şifre</label></br>
			<input type="password" name="temsilci_sifre" class="kullanici_sifre" required/></br>
			<input type="submit" name="gbuton" class="gbuton" value="Giriş Yap"/></br>
			<span class="unuttunmu">Şifreni mi unuttun?</span>
			<span class="uyeol"><a href="uyeol.php">Üye Ol</a></span>
			</form>
	</div>
	</div>
</body>
</html>

<?php
include("connect.php");
if($_POST){
$temsilci_mail=$_POST['temsilci_mail'];
$temsilci_sifre=$_POST['temsilci_sifre'];
$sorgu=mysqli_query($baglan,"SELECT * FROM mtemsilcisi WHERE temsilci_mail='$temsilci_mail'");
while($getir=mysqli_fetch_array($sorgu))
{
  $temsilad_soyad=$getir['temsilad_soyad'];
  $mtemsilci_id=$getir['mtemsilci_id'];
  $sifre=$getir['temsilci_sifre'];
  $marka_id=$getir['marka_id'];
  if($temsilci_sifre==$sifre){
    $_SESSION['giris']=2;
    $_SESSION['mtemsilci_id']=$mtemsilci_id;
    $_SESSION['temsilad_soyad']=$temsilad_soyad;
    $_SESSION['marka_id']=$marka_id;
    header("Location: markaprofil.php");
  }
  else {
    echo "Mail veya şifre yanlış";
  }
}
}
?>
