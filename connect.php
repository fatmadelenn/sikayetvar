<?php
session_start();
$host = "localhost";
$adi = "root";
$sifre ="";
$db = "sikayetvar.com";
@$baglan=mysqli_connect ("$host", "$adi", "$sifre","$db") or die ("Hatalı");
mysqli_set_charset($baglan,"utf8");
 ?>
