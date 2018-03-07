
<?php
include("connect.php");
if($_POST){
$marka_adi=$_POST["marka_adi"];
$temsilciad_soyad=$_POST["temsilciad_soyad"];
$temsilci_mail=$_POST['temsilci_mail'];
$irtibat=$_POST["irtibat"];
$temsilci_sifre=$_POST["temsilci_sifre"];

$veritabaninaKaydet =mysqli_query($baglan, "INSERT INTO mtemsilcisi(marka_adi,temsilad_soyad,temsilci_sifre,irtibat,temsilci_mail)
values('$marka_adi','$temsilciad_soyad','$temsilci_sifre','$irtibat','$temsilci_mail')");

	if($veritabaninaKaydet)
		{
		header("Location:markalogin2.php");
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8" />
		<link rel="stylesheet" href="CSS/markauyeol.css">
	<style text="text/css">

	body{

	      background: #efefef;
	    font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
	    font-size: 18px;
	    padding-top: 90px;
	    font-weight: normal;
	    line-height: 1.5px;
	}
	</style>
</head>
<body >
  <header>
  <div class="golge">
  <a href="tumsikayetler.php">
  <img src="foto/business.png" width="200" height="70" alt="logo"  left="200"/></a>
  <p class="markayazi">Marka Üyelik Başvurusu</p>
  </div>
  </header>
  <div class="form">
	<form action="markauyeol2.php" method="post">
    <label>Firma/Marka ismi</label><br/>
    <input type="text" name="marka_adi" class="adi" required/><br/>
      <label>Yetkili Kişi Adı Soyadı</label><br/>
    <input type="text" name="temsilciad_soyad" class="yetkili" required/><br/>
      <label>Yetkili Kişi E-posta Adresi</label><br/>
    <input type="email" name="temsilci_mail" class="mail" required/><br/>
      <label>GSM Numarası *</label><br/>
    <input type="text" name="irtibat" class="telefon" required/><br/>
      <label>Şifre</label><br/>
    <input type="password" name="temsilci_sifre" class="sifre" required/><br/>

		<p>* Cep telefonunuza göndereceğimiz bir kod ile sonraki adımda<p/><br/> telefon doğrulaması gerçekleştireceğiz.
    <p>* Üye giriş bilgileriniz e-posta adresinize de gönderilecektir.</p>
    <input type="submit" name="uyebuton" class="uyebuton" value="Üye ol"/></br>
  </form></div>

</body>
</html>
