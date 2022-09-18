-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 19 Haz 2022, 16:54:59
-- Sunucu sürümü: 5.7.17-log
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `takishop`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_adsoyad` varchar(255) NOT NULL,
  `kullanici_mail` varchar(255) NOT NULL,
  `kullanici_sifre` varchar(255) NOT NULL,
  `kullanici_adres` varchar(1200) NOT NULL,
  `kullanici_yetki` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`kullanici_id`, `kullanici_adsoyad`, `kullanici_mail`, `kullanici_sifre`, `kullanici_adres`, `kullanici_yetki`) VALUES
(3, 'Emre Bil', 'info@mrebil.com', '123', '', '2'),
(11, 'Emre Bil', 'info@mrebil.com', '123', 'daskjlksjladkjsakşjsaoşsa', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `siparis_no` int(11) DEFAULT NULL,
  `kullanici_id` int(11) NOT NULL,
  `siparis_toplam` int(11) NOT NULL,
  `kullanici_adres` varchar(1000) NOT NULL,
  `siparis_odeme` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis`
--

INSERT INTO `siparis` (`siparis_id`, `siparis_zaman`, `siparis_no`, `kullanici_id`, `siparis_toplam`, `kullanici_adres`, `siparis_odeme`) VALUES
(750055, '2022-06-17 17:09:44', NULL, 9, 230, '', '0'),
(750056, '2022-06-17 18:04:06', NULL, 9, 460, '', '0'),
(750057, '2022-06-17 18:20:45', NULL, 9, 460, '', '0'),
(750058, '2022-06-19 16:26:45', NULL, 11, 460, 'daskjlksjladkjsakşjsaoşsa', '0'),
(750059, '2022-06-19 16:27:44', NULL, 11, 303, 'daskjlksjladkjsakşjsaoşsa', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_fiyat` int(11) NOT NULL,
  `urun_stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_stok`) VALUES
(29, 750055, 12, 230, 1),
(30, 750056, 12, 230, 2),
(31, 750057, 12, 230, 1),
(32, 750057, 13, 230, 1),
(33, 750058, 15, 230, 2),
(34, 750059, 26, 229, 1),
(35, 750059, 43, 74, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunler`
--

CREATE TABLE `urunler` (
  `urun_id` int(11) NOT NULL,
  `urun_resim` varchar(255) NOT NULL,
  `urun_ad` varchar(255) NOT NULL,
  `urun_fiyat` varchar(255) NOT NULL,
  `urun_stok` varchar(255) NOT NULL,
  `urun_kategori` varchar(255) NOT NULL,
  `urun_onecikan` enum('1','2') NOT NULL,
  `urun_aciklama` varchar(1250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `urunler`
--

INSERT INTO `urunler` (`urun_id`, `urun_resim`, `urun_ad`, `urun_fiyat`, `urun_stok`, `urun_kategori`, `urun_onecikan`, `urun_aciklama`) VALUES
(12, 'urunler/258142284520800242570001177_incili-lotus-pembe-tasli-rose-ayarlanabilir-yuzuk_415.jpg', 'İncili Lotus Pembe Taşlı Rose Ayarlanabilir Yüzük', '230.00', '10', 'yüzük', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve pembe zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 16.55 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(13, 'urunler/316533107824430227090001192_incili-lotus-ametist-tasli-rose-kolye_415.jpg', 'İncili Lotus Ametist Taşlı Rose Kolye  ', '230.00', '10', 'kolye', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve ametist zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir&nbsp;uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>Kolye ucu boyutu 16.60 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(14, 'urunler/311753152623788292750001460_ametist-tasli-lotus-cicegi-yuzuk_415.jpg', 'Ametist Taşlı Lotus Çiçeği Yüzük', '230.00', '10', 'yüzük', '1', '<p>&Uuml;r&uuml;n&uuml;m&uuml;z 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Ametist&nbsp;zirkon damla taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(15, 'urunler/279973125129476203100001282_zirkon-tasli-tektas-bestas-ayarlanabilir-yuzuk_415.jpg', 'Zirkon Taşlı Tektaş Beştaş Ayarlanabilir Yüzük', '230.00', '8', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(16, 'urunler/278342807329201259980001288_pembe-tasli-sevda-cicegi-ayarlanabilir-yuzuk_415.jpg', 'Pembe Taşlı Sevda Çiçeği Ayarlanabilir Yüzük', '230.00', '10', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Pembe zirkon mekik taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(17, 'urunler/310822401130897236880001280_zirkon-tasli-yaprak-ayarlanabilir-yuzuk_415.jpg', 'Zirkon Taşlı Yaprak Ayarlanabilir Yüzük', '230.00', '10', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(18, 'urunler/224062525331591291670001183_incili-lotus-beyaz-tasli-rodaj-ayarlanabilir-yuzuk_415.jpg', 'İncili Lotus Beyaz Taşlı Rodaj Ayarlanabilir Yüzük', '230.00', '10', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve beyaz zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 16.55 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(19, 'urunler/317032300625159287240001464_beyaz-tasli-lotus-cicegi-yuzuk_415.jpg', 'Beyaz Taşlı Lotus Çiçeği Yüzük', '230.00', '10', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Beyaz zirkon damla taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(20, 'urunler/236772614031145259220001171_incili-lotus-akuamarin-tasli-rose-ayarlanabilir-yuzuk_415.jpg', 'İncili Lotus Akuamarin Taşlı Rose Ayarlanabilir Yüzük', '230.00', '10', 'yüzük', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve akuamarin zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyu ayarlanabilirdir, her parmağa uygundur.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 16.55 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(21, 'urunler/220242468229172211560001314_rose-yilan-kolye_415.jpg', 'Rose Yılan Kolye', '230.00', '10', 'kolye', '1', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Siyah ve beyaz zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(22, 'urunler/308073164226505221510001312_pembe-tasli-rose-papatya-kolye_415.jpg', 'Pembe Taşlı Rose Papatya Kolye', '230.00', '10', 'kolye', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Pembe zirkon mekik taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(23, 'urunler/217982424125510256340001320_incili-rodaj-istiridye-kolye_415.jpg', 'İncili Rodaj İstiridye Kolye', '250.00', '10', 'kolye', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(24, 'urunler/248092910925836319910001322_beyaz-tasli-yildiz-cicegi-kolye_415.jpg', 'Beyaz Taşlı Yıldız Çiçeği Kolye', '230.00', '10', 'kolye', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Beyaz damla taş ve zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 42 cm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(25, 'urunler/260652389922352290950001330_100-dilde-seni-seviyorum-kolye_415.jpg', '100 Dilde Seni Seviyorum Kolye', '230.00', '10', 'kolye', '1', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(26, 'urunler/253582973431765249170001412_papatya-rodaj-seviyor-sevmiyor-yazili-kolye_415.jpg', 'Papatya Rodaj Seviyor Sevmiyor Yazılı Kolye', '229.00', '10', 'kolye', '1', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>Sarı ve beyaz renkli mine kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(27, 'urunler/251492685624472208840001390_lila-tasli-lotus-cicegi-kolye_415.jpg', 'Lila Taşlı Lotus Çiçeği Kolye', '230.00', '10', 'kolye', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Lila zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Zincir uzunluğu 40+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(28, 'urunler/318093120723185231960001212_incili-lotus-ametist-tasli-rose-kupe_415.jpg', 'İncili Lotus Ametist Taşlı Rose Küpe', '280.00', '10', 'küpe', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve ametist zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(29, 'urunler/313712171625947204200001230_incili-lotus-siyah-tasli-rose-kupe_415.jpg', 'İncili Lotus Siyah Taşlı Rose Küpe', '280.00', '10', 'küpe', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve siyah zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(30, 'urunler/235182719124581279050001359_beyaz-tasli-yildiz-cicegi-kupe_415.jpg', 'Beyaz Taşlı Yıldız Çiçeği Küpe', '260.00', '10', 'küpe', '1', '<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Beyaz damla taş ve zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boy uzunluğu 3.30 cm&#39; dir.</p>\r\n\r\n<p>K&uuml;pe en uzunluğu 1.70 cm&#39; dir.</p>\r\n\r\n<p>Ortalama ağırlık 4.68 g&#39; dır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(31, 'urunler/290962050129332301630001219_incili-lotus-akuamarin-tasli-rodaj-kupe_415.jpg', 'İncili Lotus Akuamarin Taşlı Rodaj Küpe', '280.00', '10', 'küpe', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve akuamarin zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml;n ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(32, 'urunler/204162021929267267280001228_incili-lotus-beyaz-tasli-rodaj-kupe_415.jpg', 'İncili Lotus Beyaz Taşlı Rodaj Küpe', '280.00', '10', 'küpe', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve beyaz zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu,&nbsp;dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(33, 'urunler/260712424230920235380001232_incili-lotus-siyah-tasli-rodaj-kupe_415.jpg', 'İncili Lotus Siyah Taşlı Rodaj Küpe', '280.00', '10', 'küpe', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve siyah zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(34, 'urunler/311263030228011226420001361_ametist-tasli-yildiz-cicegi-kupe_415.jpg', 'Ametist Taşlı Yıldız Çiçeği Küpe', '260.00', '10', 'küpe', '2', '<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Ametist damla taş ve zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boy uzunluğu 3.30 cm&#39; dir.</p>\r\n\r\n<p>K&uuml;pe en uzunluğu 1.70 cm&#39; dir.</p>\r\n\r\n<p>Ortalama ağırlık 4.68 g&#39; dır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(35, 'urunler/279602800921880271820001363_pembe-tasli-yildiz-cicegi-kupe_415.jpg', 'Pembe Taşlı Yıldız Çiçeği Küpe', '260.00', '10', 'küpe', '1', '<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Pembe damla taş ve zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boy uzunluğu 3.30 cm&#39; dir.</p>\r\n\r\n<p>K&uuml;pe en uzunluğu 1.70 cm&#39; dir.</p>\r\n\r\n<p>Ortalama ağırlık 4.68 g&#39; dır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(36, 'urunler/319712432728033244350001234_incili-lotus-ametist-tasli-rose-bileklik_415.jpg', 'İncili Lotus Ametist Taşlı Rose Bileklik', '230.00', '10', 'bileklik', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve ametist zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Bileklik zincir &ouml;l&ccedil;&uuml;s&uuml; 17+4 cm uzatmalıdır.</p>\r\n\r\n<p>Bileklik boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(37, 'urunler/281232848229204221120001238_incili-lotus-akuamarin-tasli-rose-bileklik_415.jpg', 'İncili Lotus Akuamarin Taşlı Rose Bileklik', '230.00', '10', 'bileklik', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve akuamarin zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Bileklik zincir &ouml;l&ccedil;&uuml;s&uuml; 17+4 cm uzatmalıdır.</p>\r\n\r\n<p>Bileklik boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(38, 'urunler/275622057928045270650001244_incili-lotus-pembe-tasli-rodaj-bileklik_415.jpg', 'İncili Lotus Pembe Taşlı Rodaj Bileklik', '230.00', '10', 'bileklik', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve pembe zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Bileklik zincir &ouml;l&ccedil;&uuml;s&uuml; 17+4 cm uzatmalıdır.</p>\r\n\r\n<p>Bileklik boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(39, 'urunler/217942001131799293390001250_incili-lotus-siyah-tasli-rose-bileklik_415.jpg', 'İncili Lotus Siyah Taşlı Rose Bileklik', '230.00', '10', 'bileklik', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve siyah zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Bileklik zincir &ouml;l&ccedil;&uuml;s&uuml; 17+4 cm uzatmalıdır.</p>\r\n\r\n<p>Bileklik boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(40, 'urunler/258593184122867225930001346_ici-bos-forse-bileklik_415.jpg', 'İçi Boş Forse Bileklik', '300.00', '10', 'bileklik', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>G&uuml;m&uuml;ş kaplama uygulanmıştır.</p>\r\n\r\n<p>Bileklik &ouml;l&ccedil;&uuml;s&uuml; 19 cm&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(41, 'urunler/273502817831993261200001349_ici-bos-fantezi-bileklik_415.jpg', 'İçi Boş Fantezi Bileklik', '350.00', '10', 'bileklik', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>G&uuml;m&uuml;ş kaplama uygulanmıştır.</p>\r\n\r\n<p>Bileklik &ouml;l&ccedil;&uuml;s&uuml; 19.50&#39; dir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(42, 'urunler/252622340031065218000001437_kalp-figurlu-bileklik_415.jpg', 'Kalp Figürlü Bileklik', '220.00', '10', 'bileklik', '1', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Bileklik &ouml;l&ccedil;&uuml;s&uuml; 16+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(43, 'urunler/301142422124479239330001607_koyu-mavi-nazar-boncuklu-ve-harfli-bileklik_415.jpg', 'Koyu Mavi Nazar Boncuklu Ve Harfli Bileklik', '74.00', '9', 'bileklik', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>Koyu&nbsp;mavi renkli nazar boncuk kullanılmıştır.</p>\r\n\r\n<p>Bileklik zincir &ouml;l&ccedil;&uuml;s&uuml; 15+5 cm uzatmalıdır.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(44, 'urunler/207972273224256296640001257_incili-lotus-ametist-tasli-rose-uclu-set_415.jpg', 'İncili Lotus Ametist Taşlı Rose Üçlü Set', '460.00', '10', 'takı seti', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve ametist zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(45, 'urunler/294802183420130306290001274_incili-lotus-akuamarin-tasli-rose-uclu-set_415.jpg', 'İncili Lotus Akuamarin Taşlı Rose Üçlü Set', '460.00', '10', 'takı seti', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve akuamarin zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(46, 'urunler/241002953425345290470001263_incili-lotus-pembe-tasli-rose-uclu-set_415.jpg', 'İncili Lotus Pembe Taşlı Rose Üçlü Set', '460.00', '10', 'takı seti', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve pembe zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(47, 'urunler/235742875928926289800001264_incili-lotus-pembe-tasli-rodaj-uclu-set_415.jpg', 'İncili Lotus Pembe Taşlı Rodaj Üçlü Set', '460.00', '10', 'takı seti', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve pembe zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(48, 'urunler/296432036522880306330001265_incili-lotus-beyaz-tasli-rose-uclu-set_415.jpg', 'İncili Lotus Beyaz Taşlı Rose Üçlü Set', '460.00', '10', 'takı seti', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve beyaz zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(49, 'urunler/263382480221412267930001266_incili-lotus-beyaz-tasli-rodaj-uclu-set_415.jpg', 'İncili Lotus Beyaz Taşlı Rodaj Üçlü Set', '460.00', '10', 'takı seti', '2', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve beyaz zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(50, 'urunler/204902940825409243670001268_incili-lotus-siyah-tasli-rose-uclu-set_415.jpg', 'İncili Lotus Siyah Taşlı Rose Üçlü Set', '460.00', '10', 'takı seti', '1', '<p>&Uuml;r&uuml;n 925&nbsp;ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rose kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve siyah zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(51, 'urunler/250722814427570263330001273_incili-lotus-siyah-tasli-rodaj-uclu-set_415.jpg', 'İncili Lotus Siyah Taşlı Rodaj Üçlü Set', '460.00', '10', 'takı seti', '2', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>Rodaj kaplama uygulanmıştır.</p>\r\n\r\n<p>İnci ve siyah zirkon taş kullanılmıştır.</p>\r\n\r\n<p>K&uuml;pe boyutu 13.70 mm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k boyutu 13.55 mm&#39; dir.</p>\r\n\r\n<p>Kolye ucu boyutu 13.60 mm&#39; dir.</p>\r\n\r\n<p>Zincir boyutu 40+5 cm&#39; dir.</p>\r\n\r\n<p>Y&uuml;z&uuml;k ayarlanabilir, her parmağa uygundur.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyı, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n'),
(52, 'urunler/266302403029223204380001353_karisik-model-20-li-hizma_415.jpg', 'Karışık Model 20\' li Hızma', '230.00', '10', 'hızma', '1', '<p>&Uuml;r&uuml;n 925 ayar g&uuml;m&uuml;şten &uuml;retilmiştir.</p>\r\n\r\n<p>G&uuml;m&uuml;ş kaplama uygulanmıştır.</p>\r\n\r\n<p>Zirkon taş kullanılmıştır.</p>\r\n\r\n<p>Hızmaların pim uzunluğu 8 mm ve ucu yuvarlak top şeklindedir.</p>\r\n\r\n<p>&Uuml;r&uuml;n&uuml; ıslatmayınız. Parf&uuml;m, sabun, şampuan, &ccedil;amaşır suyu, dezenfektan, kolonya gibi kimyasallarla temas ettirmeyiniz!</p>\r\n\r\n<p>Sipariş etmiş olduğunuz &uuml;r&uuml;n size kutu ve hediye paketi ile g&ouml;nderilecektir.</p>\r\n');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `urunler`
--
ALTER TABLE `urunler`
  ADD PRIMARY KEY (`urun_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=750060;
--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Tablo için AUTO_INCREMENT değeri `urunler`
--
ALTER TABLE `urunler`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
