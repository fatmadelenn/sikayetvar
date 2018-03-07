
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/uyeol.css">
    <style text="text/css">
    body{
    background:url("foto/arkaplan3.jpg");
    background-size: 100%;
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
		<h2 align="center">Üye Ol</h2>
		<hr class="hr1" color="#EEE"/>
		<hr class="hr2" color="#EEE"/>
		<form action="uyeol2.php" method="POST">
			<label>Ad ve soyad</label></br>
			<input type="text" name="kullanici_adi" class="kullanici_adi" required/></br>
			<label>E-posta</label></br>
			<input type="email" name="mail" class="mail" required/></br>
			<label>Şifre</label></br>
			<input type="password" name="kullanici_sifre" class="kullanici_sifre" minlength="6" placeholder="En az 6 karakter..." required/></br>
			<label>Şifre tekrar</label></br>
			<input type="password" name="kullanici_sifre" class="kullanici_sifre" minlength="6" required/></br>
		<div class="sozlesme">"Üye Ol" butonuna tıklayarak Şikayetvar'ın Kullanıcı,<br/>gizlilik ve çerez sözleşmelerini<br/> kabul etmiş sayılacaksınız. </div>
		<input type="submit" name="uyebuton" class="uyebuton" value="Üye ol"/></br>
		<div class="uyemi">Zaten üye misiniz? <a href="login2.php">Giriş Yap</a></div>
		</form>
	</div>
	</div>
</body>
</html>

<?php
include("connect.php");
if($_POST){
$kullanici_adi=$_POST["kullanici_adi"];
$mail=$_POST["mail"];
$kullanici_sifre=$_POST['kullanici_sifre'];
$mailvarmi=  mysqli_query($baglan,  "SELECT * FROM kullanici where mail='$mail' ") or die("Hatalı");

  if($kayitvarmi>0){
    echo "bu mail adresi kullanılıyor";
  }
  else{
$veritabaninaKaydet =mysqli_query($baglan, "INSERT INTO kullanici(kullanici_adi,mail,kullanici_sifre)
values('$kullanici_adi','$mail','$kullanici_sifre')");

	if($veritabaninaKaydet)
		{
echo "kjhgfd";
		header("Location:login2.php");

	}
}
}
?>
