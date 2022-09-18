<?php
ob_start();
session_start();
include "../baglan.php";

if (isset($_POST['urun_ekle'])) {

	$uploads_dir = '../urunler';
	@$tmp_name = $_FILES['urun_resim']["tmp_name"];
	@$name = $_FILES['urun_resim']["name"];

	$benzersizsayi1 = rand(20000, 32000);
	$benzersizsayi2 = rand(20000, 32000);
	$benzersizsayi3 = rand(20000, 32000);
	$benzersizsayi4 = rand(20000, 32000);
	$benzersizad = $benzersizsayi1 . $benzersizsayi2 . $benzersizsayi3 . $benzersizsayi4;
	$refimgyol = substr($uploads_dir, 3) . "/" . $benzersizad . $name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");




	$kaydet = $db->prepare("INSERT INTO urunler SET
	urun_resim=:urun_resim,
	urun_ad=:urun_ad,
	urun_fiyat=:urun_fiyat,
	urun_stok=:urun_stok,
	urun_kategori=:urun_kategori,
	urun_onecikan=:urun_onecikan,
	urun_aciklama=:urun_aciklama");

	$insert = $kaydet->execute(array(
		'urun_resim' => $refimgyol,
		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_kategori' => $_POST['urun_kategori'],
		'urun_onecikan' => $_POST['urun_onecikan'],
		'urun_aciklama' => $_POST['urun_aciklama']
	));


	if ($insert) {

		Header("Location:../urunlistele.php?durum=ok");
	} else {

		Header("Location:../urunlistele.php?durum=hata");
	}
}

if (isset($_POST['urun_guncelle'])) {

	$urunid = $_POST['urun_id'];

	$duzenle = $db->prepare("UPDATE urunler SET
			urun_ad=:urun_ad,
			urun_fiyat=:urun_fiyat,
			urun_stok=:urun_stok,
			urun_kategori=:urun_kategori,
			urun_onecikan=:urun_onecikan,
			urun_aciklama=:urun_aciklama
			WHERE urun_id=$urunid");
	$update = $duzenle->execute(array(
		'urun_ad' => $_POST['urun_ad'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_stok' => $_POST['urun_stok'],
		'urun_kategori' => $_POST['urun_kategori'],
		'urun_onecikan' => $_POST['urun_onecikan'],
		'urun_aciklama' => $_POST['urun_aciklama']
	));



	if ($update) {

		Header("Location:../urunduzenle.php?urun_id=$urunid&durum=ok");
	} else {

		Header("Location:../urunduzenle.php?durum=no");
	}
}

if (isset($_POST['kullanici_guncelle'])) {

	$k_id = $_POST['k_id'];

	$duzenle = $db->prepare("UPDATE kullanicilar SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_mail=:kullanici_mail,
			kullanici_yetki=:kullanici_yetki
			WHERE kullanici_id=$k_id");
	$update = $duzenle->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_yetki' => $_POST['kullanici_yetki']
	));



	if ($update) {

		Header("Location:../kullaniciduzenle.php?kullanici_id=$k_id&durum=ok");
	} else {

		Header("Location:../kullaniciduzenle.php?durum=no");
	}
}


if ($_GET['kullanici_sil'] == "ok") {
	$k_idd = $_GET['kullanici_id'];


	$ksil = $db->prepare("DELETE FROM kullanicilar WHERE kullanici_id=:id");
	$kkontrol = $ksil->execute(array(
		'id' => $k_idd
	));


	if ($kkontrol) {
		Header("Location:../kullanicilar.php?durum=ok");
		exit;
	} else {
		Header("Location:../kullanicilar.php?durum=no");
		exit;
	}
}


if ($_GET['urun_sil'] == "ok") {
	$u_id = $_GET['urun_id'];


	$ksil = $db->prepare("DELETE FROM urunler WHERE urun_id=:id");
	$kkontrol = $ksil->execute(array(
		'id' => $u_id
	));


	if ($kkontrol) {
		Header("Location:../urunlistele.php?durum=ok");
		exit;
	} else {
		Header("Location:../urunlistele.php?durum=no");
		exit;
	}
}


if (isset($_POST['admin_giris'])) {

	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_sifre = $_POST['kullanici_sifre'];

	$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where kullanici_mail=:mail and kullanici_sifre=:sifre");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'sifre' => $kullanici_sifre
	));
	$say = $kullanicisor->rowCount();


	if ($say == 1) {
		$_SESSION['kullanici_mail'] = $kullanici_mail;
		header("Location:../index.php");
	} else {
		header("Location:../login.php?durum=no");
	}
}



if (isset($_POST['kayit_ol'])) {

	$kaydet = $db->prepare("INSERT INTO kullanicilar SET
	kullanici_adsoyad=:kullanici_adsoyad,
	kullanici_mail=:kullanici_mail,
	kullanici_sifre=:kullanici_sifre");

	$insert = $kaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_mail' => $_POST['kullanici_mail'],
		'kullanici_sifre' => $_POST['kullanici_sifre']
	));


	if ($insert) {

		Header("Location:../../giris-yap.php?kayit=basarili");
	} else {

		Header("Location:../../kayit-ol.php?kayit=hata");
	}
}





if (isset($_POST['giris_yap'])) {

	$kullanici_mail = $_POST['kullanici_mail'];
	$kullanici_sifre = $_POST['kullanici_sifre'];

	$kullanicisor = $db->prepare("SELECT * FROM kullanicilar where kullanici_mail=:mail and kullanici_sifre=:sifre");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'sifre' => $kullanici_sifre
	));
	$say = $kullanicisor->rowCount();


	if ($say == 1) {
		$_SESSION['userkullanici_mail'] = $kullanici_mail;
		header("Location:../../index.php");
	} else {
		header("Location:../../giris-yap.php?durum=no");
	}
}





if (isset($_POST['sepet_ekle'])) {


	$kaydet = $db->prepare("INSERT INTO sepet SET
	urun_stok=:urun_stok,
	urun_id=:urun_id,
	kullanici_id=:kullanici_id");

	$insert = $kaydet->execute(array(
		'urun_stok' => $_POST['urun_stok'],
		'urun_id' => $_POST['urunid'],
		'kullanici_id' => $_POST['kid']
	));


	if ($insert) {

		Header("Location:../../sepet.php?durum=ok");
	} else {

		Header("Location:../../sepet.php?durum=hata");
	}
}

if ($_GET['sepetsil'] == "ok") {
	$sepet_idd = $_GET['sepet_id'];


	$ksil = $db->prepare("DELETE FROM sepet WHERE sepet_id=:id");
	$kkontrol = $ksil->execute(array(
		'id' => $sepet_idd
	));


	if ($kkontrol) {
		Header("Location:../../sepet.php?durum=ok");
		exit;
	} else {
		Header("Location:../../sepet.php?durum=no");
		exit;
	}
}



if (isset($_POST['profil_guncelle'])) {

	$kaid = $_POST['kaid'];

	$duzenle = $db->prepare("UPDATE kullanicilar SET
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_sifre=:kullanici_sifre,
			kullanici_adres=:kullanici_adres
			WHERE kullanici_id=$kaid");
	$update = $duzenle->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_sifre' => $_POST['kullanici_sifre'],
		'kullanici_adres' => $_POST['kullanici_adres']
	));



	if ($update) {

		Header("Location:../../profil.php?durum=ok");
	} else {

		Header("Location:../../profil.php?durum=no");
	}
}



$kartonaltihane = "0123456789123456";
$cvv = 123;
$sk1 = 13;
$sk2 = 2026;


if (isset($_POST['odeme'])) {
$urunadet= $_POST['urun_idd'];

	$a16 = $_POST['onalti'];
	$acvv = $_POST['cvv'];
	$ask1 = $_POST['sk11'];
	$ask2 = $_POST['sk22'];

	if ($a16 == $kartonaltihane and $acvv == $cvv and $ask1 == $sk1 and $ask2 == $sk2) {

		$kaydet = $db->prepare("INSERT INTO siparis SET
					kullanici_id=:kullanici_id,
					kullanici_adres=:kullanici_adres,
					siparis_toplam=:siparis_toplam");

		$insert = $kaydet->execute(array(
			'kullanici_id' => $_POST['kullanici_id'],
			'kullanici_adres' => $_POST['kullanici_adres'],
			'siparis_toplam' => $_POST['siparis_toplam']
		));



		if ($insert) {
			echo $siparis_id = $db->lastInsertId();

			echo "<hr>";

			$kullanici_id = $_POST['kullanici_id'];
			$sepetsor = $db->prepare("SELECT * FROM sepet where kullanici_id=:id");
			$sepetsor->execute(array(
				'id' => $kullanici_id
			));
			while ($sepetcek = $sepetsor->fetch(PDO::FETCH_ASSOC)) {
				$urun_id = $sepetcek['urun_id'];
				$urun_stok = $sepetcek['urun_stok'];






				$urunsor = $db->prepare("SELECT * FROM urunler where urun_id=:id");
				$urunsor->execute(array(
					'id' => $urun_id
				));

				$uruncek = $urunsor->fetch(PDO::FETCH_ASSOC);
				$urun_fiyat = $uruncek['urun_fiyat'];

				$urun_stokk = $uruncek['urun_stok']-$urun_stok;



					$duzenle = $db->prepare("UPDATE urunler SET
						urun_stok=:urun_stok WHERE urun_id=$urunid");

					$update = $duzenle->execute(array(
						'urun_stok' => $urun_stokk
					));








				$kaydet = $db->prepare("INSERT INTO siparis_detay SET
				siparis_id=:siparis_id,
				urun_id=:urun_id,
				urun_stok=:urun_stok,
				urun_fiyat=:urun_fiyat");

				$insert = $kaydet->execute(array(
					'siparis_id' => $siparis_id,
					'urun_id' => $urun_id,
					'urun_stok' => $urun_stok,
					'urun_fiyat' => $urun_fiyat
				));
			}



			if ($insert) {

				$ksil = $db->prepare("DELETE FROM sepet WHERE kullanici_id=:id");
				$kkontrol = $ksil->execute(array(
					'id' => $kullanici_id
				));




					if($ksil){

						





					$duzenle = $db->prepare("UPDATE urunler SET
							urun_stok=:urun_stok
							WHERE urun_id=$urunadet");

					$update = $duzenle->execute(array(
						'urun_stok' => $urun_stokk
					));


					}




				header("Location:../../siparis.php");

				
			}


		}
	} else {
		header("Location:../../odeme.php?durum=basarisiz&#odemegit");
	}
}




if(isset($_POST['igonder'])){
	header("Location:../../iletisim.php?durum=gonderildi");

}




?>