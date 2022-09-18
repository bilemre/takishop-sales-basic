<?php
ob_start();
session_start();
include "baglan.php"; 

$kullanicisor=$db->prepare("SELECT * FROM kullanicilar where kullanici_mail=:mail");
$kullanicisor->execute(array(
'mail'=> $_SESSION['userkullanici_mail']
));
$say = $kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);














?>








<!DOCTYPE html>
<html lang="en">

<head>
	<title>Takı Shop</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body style="background: #eee9e9">
<?php 


if(isset($_SESSION['userkullanici_mail'])){
if(empty($kullanicicek['kullanici_adres'])){?>
<div class="alert alert-danger" role="alert">
 <center>Lütfen Profil Bilgilerinden Adres Bilgisini Doldurunuz..</center> 
</div>

<?php } 
}?>
	<div class="top">
		<div class="container">
			<a href="index.php"><div class="logo"></div></a>
			<div class="menu-alan">
				<ul class="menu">
					<li><a href="index.php">ANA SAYFA</a></li>
					<li><a href="urunler.php?urun_kategori=yüzük">YÜZÜK</a></li>
					<li><a href="urunler.php?urun_kategori=kolye">KOLYE</a></li>
					<li><a href="urunler.php?urun_kategori=küpe">KÜPE</a></li>
					<li><a href="urunler.php?urun_kategori=bileklik">BİLEKLİK</a></li>
					<li><a href="urunler.php?urun_kategori=takı seti">TAKI SETİ</a></li>
					<li><a href="urunler.php?urun_kategori=hızma">HIZMA</a></li>
				</ul>
				<div class="deneme">
					<div class="giris_kaydol">

						<?php if(isset($_SESSION['userkullanici_mail'])){ ?>

							<div class="dropdown">
  <div class="dropbtn"><?php echo $kullanicicek['kullanici_adsoyad']; ?></div>
  <div class="dropdown-content">
  	<a href="profil.php">Profil Bilgilerim</a>
	  <a href="siparislerim.php">Siparişlerim</a>
  <a href="sepet.php">Sepete Git</a>
  <a href="kart.php">Kartlar</a>
  <a href="cikis-yap.php">Çıkış Yap</a>
  </div>
</div>






<?php }else{ ?>
						<ul class="gir_kayit">
							<li class="re"><a href="giris-yap.php">GİRİŞ YAP</a></li>
							<li><a href="kayit-ol.php">KAYIT OL</a></li>
						</ul>


		

				<?php } ?>
					</div>
<form action="urunler.php" method="POST">
			 <div class="alt-menu alt-2">
      <label for="acilirmenu2" style="position:relative;left:80px"><i class="fa fa-search" style="font-size: 30px;cursor: pointer;color:white;"></i></label><input type="checkbox" id="acilirmenu2"/></label>
      <div id="menum2"  class="searchx"><input type="search" name="a_search" class="search_ayar" placeholder="Aramak İstediğiniz Ürünü Yazınız.."></div>
    </div></form>


					
				</div>
			</div>
		</div>
	</div><br>