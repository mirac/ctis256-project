-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 May 2018, 22:24:26
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `test`
--

DELIMITER $$
--
-- Yordamlar
--
CREATE DEFINER=`` PROCEDURE `AddGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64), `t_srid` INT)  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' ADD ', geometry_column,' GEOMETRY REF_SYSTEM_ID=', t_srid); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

CREATE DEFINER=`` PROCEDURE `DropGeometryColumn` (`catalog` VARCHAR(64), `t_schema` VARCHAR(64), `t_name` VARCHAR(64), `geometry_column` VARCHAR(64))  begin
  set @qwe= concat('ALTER TABLE ', t_schema, '.', t_name, ' DROP ', geometry_column); PREPARE ls from @qwe; execute ls; deallocate prepare ls; end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `orders`
--

CREATE TABLE `orders` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `product_id` int(11) NOT NULL,
  `product_id2` int(11) NOT NULL,
  `product_id3` int(11) NOT NULL,
  `product_id4` int(11) NOT NULL,
  `product_id5` int(11) NOT NULL,
  `product_id6` int(11) NOT NULL,
  `product_id7` int(11) NOT NULL,
  `product_id8` int(11) NOT NULL,
  `product_id9` int(11) NOT NULL,
  `product_id10` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `category` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `description` varchar(500) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `raiting` double UNSIGNED NOT NULL,
  `image` varchar(300) NOT NULL,
  `promotional` tinyint(1) NOT NULL,
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`category`, `brand`, `title`, `price`, `description`, `comments`, `raiting`, `image`, `promotional`, `id`, `catid`) VALUES
('Smartphones', 'Nokia', 'Nokia 8 64 GB Smartphone', 2065, 'Ön (Selfie) Kamera13 MPDahili Hafıza64 GBRAM Kapasitesi4 GB RAMPil Gücü3090 mAhGaranti TipiResmi Distribütör GarantiliEkran Boyutu5,3 inçKamera Çözünürlüğü13 MPİşlemci Kapasitesi2,36 GHz Quad Core + 1,7 GHz Quad Core', '', 0, 'https://productimages.hepsiburada.net/s/6/552/9712745218098.jpg', 1, 6, 0),
('Smartphones', 'Samsung', 'Samsung Galaxy S8', 3299, 'Front camera 8,0 MPDahili Hafıza64 GBRAM Kapasitesi4 GB RAMPil Gücü3000 mAhGaranti TipiResmi Distribütör GarantiliEkran Boyutu5,8 inçKamera Çözünürlüğü12 MPİşlemci Kapasitesi2,3 GHz Quad Core + 1,7 GHz Quad Core', '', 0, 'https://productimages.hepsiburada.net/s/3/552/9604775739442.jpg', 0, 7, 0),
('Smartphones', 'Lenovo', 'Lenovo Moto Z2 Play 64 GB', 2.097, 'Ön (Selfie) Kamera5 MPDahili Hafıza64 GBRAM Kapasitesi4 GB RAMPil Gücü3000 mAhGaranti TipiResmi Distribütör GarantiliEkran Boyutu5,5 inçKamera Çözünürlüğü12 MPİşlemci Kapasitesi2,2 GHz Octa Core', '', 0, 'https://productimages.hepsiburada.net/s/18/552/9817308364850.jpg', 0, 8, 0),
('Smartphones', 'Sony', 'Sony Xperia XZ1', 2199.9, 'Ön (Selfie) Kamera13 MPDahili Hafıza64 GBRAM Kapasitesi4 GB RAMPil Gücü2700 mAhGaranti TipiResmi Distribütör GarantiliEkran Boyutu5,2 inçKamera Çözünürlüğü19 MPİşlemci Kapasitesi2,35 GHz Quad Core + 1,9 GHz Quad Core', '', 0, 'https://productimages.hepsiburada.net/s/6/552/9728690061362.jpg', 0, 9, 0),
('Smartphones', 'LG', 'LG G6', 1999.9, 'Ön (Selfie) Kamera5 MPDahili Hafıza32 GBRAM Kapasitesi4 GB RAMPil Gücü3300 mAhGaranti TipiResmi Distribütör GarantiliEkran Boyutu5,7 inçKamera Çözünürlüğü13 MP + 13 MPİşlemci Kapasitesi2,35 GHz Dual-Core + 1,16 GHz Dual-Core', '', 0, 'https://productimages.hepsiburada.net/s/3/552/9616882991154.jpg', 0, 10, 0),
('Notebooks', 'Acer', 'Acer Nitro AN515-51-73HG', 4699, 'Ekran Kartı Hafızası4 GBEkran Boyutu15,6 inçEkran KartıNvidia GeForce GTX1050 Tiİşletim SistemiLinuxRam (Sistem Belleği)16 GBGaranti TipiResmi Distribütör Garantiliİşlemci TipiIntel Core i7Harddisk Kapasitesi1 TB', '', 0, 'https://productimages.hepsiburada.net/s/18/552/9786056998962.jpg', 1, 11, 0),
('Notebooks', 'MSI', 'MSI GT83VR 7RF(Titan SLI)-201T', 22280.97, '8 GBEkran Boyutu18,4 inçEkran KartıNvidia GeForce GTX1080İşletim SistemiWindows 10 HomeRam (Sistem Belleği)64 GBGaranti TipiResmi Distribütör Garantiliİşlemci TipiIntel Core i7Harddisk Kapasitesi1 TB', '', 0, 'https://productimages.hepsiburada.net/s/2/552/9581637238834.jpg', 0, 12, 0),
('Notebooks', 'Dell', 'Dell Gaming 7577 Intel Core i7 7700HQ', 4599, '4 GBEkran Boyutu15,6 inçEkran KartıNvidia GeForce GTX1050 Tiİşletim SistemiYok (Free Dos)Ram (Sistem Belleği)8 GBGaranti TipiResmi Distribütör Garantiliİşlemci TipiIntel Core i7Harddisk Kapasitesi1 TB', '', 0, 'https://productimages.hepsiburada.net/s/7/552/9771767169074.jpg', 0, 13, 0),
('Notebooks', 'Acer', 'Acer AN515-51-7383', 5469, 'Ekran Kartı Hafızası4 GBEkran Boyutu15,6 inçEkran KartıNvidia GeForce GTX1050 Tiİşletim SistemiYok (Free Dos)Ram (Sistem Belleği)16 GBGaranti TipiResmi Distribütör Garantiliİşlemci TipiIntel Core i7Harddisk Kapasitesi1 TB', '', 0, 'https://productimages.hepsiburada.net/s/17/552/9783331061810.jpg', 0, 14, 0),
('Notebooks', 'Asus', 'Asus ROG GL553VE-DM233T', 6188.99, 'Ekran Kartı Hafızası4 GBEkran Boyutu15,6 inçEkran KartıNvidia GeForce GTX1050 Tiİşletim SistemiWindows 10 HomeRam (Sistem Belleği)16 GBGaranti TipiResmi Distribütör Garantiliİşlemci TipiIntel Core i7Harddisk Kapasitesi1 TB', '', 0, 'https://productimages.hepsiburada.net/s/6/552/9713641095218.jpg', 1, 15, 0),
('Tablets', 'Apple', 'Apple iPad Wi-Fi 32GB MPGT2TU/A ', 1699, '', '', 0, 'https://productimages.hepsiburada.net/s/18/500/9788446801970.jpg', 0, 17, 0),
('Tablets', 'Samsung', ' Samsung SM-T820 32GB 9.7 UHD Tablet - Siyah ', 2199, '', '', 0, 'https://productimages.hepsiburada.net/s/3/500/9620428652594.jpg', 0, 19, 0),
('Tablets', 'Samsung', ' Samsung SM-W620 64GB Windows 10 Home 10.6 İkisi ', 2499, '', '', 0, 'https://productimages.hepsiburada.net/s/3/1500/9620429045810.jpg', 0, 20, 0),
('Game Console', 'Sony', ' Sony Playstation 4 Pro 1 Tb', 2299, '', '', 0, 'https://productimages.hepsiburada.net/s/3/500/9612441092146.jpg', 0, 21, 0),
('Game Console', 'Microsoft', ' Xbox One X Standart Edition 1 TB', 2699, '', '', 0, 'https://productimages.hepsiburada.net/s/6/1500/9746324946994.jpg', 1, 22, 0),
('Game Console', 'Nintendo', ' Nintendo Switch Gri', 1749, '', '', 0, 'https://productimages.hepsiburada.net/s/3/500/9608368848946.jpg', 1, 23, 0),
('TVs', 'Samsung', ' Samsung UE43MU7000 43 MU7000 7 Serisi Flat 4K UH', 3299, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9836946456626.jpg', 0, 24, 0),
('TVs', 'LG', ' LG 55UJ630V 55 140 Ekran 4K Uydu Alıcılı Smart L', 4999, '', '', 0, 'https://productimages.hepsiburada.net/s/4/500/9635140206642.jpg', 0, 25, 0),
('Network Devieces', 'Sonicwall', ' Sonıcwall Dell Tz400 3 Yıl Lisans Dahil Cihaz 01-', 11033.18, '', '', 0, 'https://productimages.hepsiburada.net/s/3/500/9589824323634.jpg', 0, 26, 0),
('Network Devieces', 'Asus', ' Asus MAP-AC2200 AC2200 Kablosuz Ağ Dağıtım Sistem', 4098, '', '', 0, 'https://productimages.hepsiburada.net/s/7/1500/9766596608050.jpg', 0, 27, 0),
('Others', 'Cinemaximum', 'Tüm Cinemaximumlar – (Premium Sinemalar ', 75, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9838579875890.jpg', 0, 29, 0),
('Personal Care', 'Taç;', 'Taç Banyo Seti İsabella Ekru&Camel', 259.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9834601644082.jpg', 0, 30, 0),
('Personal Care', 'Dove', 'Dove Kadınlara Özel Bakım Seti', 49.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9839108161586.jpg', 0, 31, 0),
('Coffee', 'Jacobs', 'Jacobs Filtre Kahve 500 gr + Saklama Kab', 39.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9794927460402.jpg', 0, 32, 0),
('Carpet', 'Babycim', 'Babycim Minik Dostlar Oyun Halısı', 109.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9793225687090.jpg', 0, 35, 0),
('Music Player', 'Mikado', 'Mikado Nostalgia Müzik Player', 345.01, '', '', 0, 'https://productimages.hepsiburada.net/s/5/500/9674649239602.jpg', 0, 36, 0),
('TVs', 'Samsung', 'Samsung UE55MU7000 55 140 Ekran [4K] Uy', 4949, '', '', 0, 'https://productimages.hepsiburada.net/s/4/500/9635136766002.jpg', 0, 37, 0),
('Weighing Machine', 'Tefal', 'Tefal Premiss PP1061 Beyaz Cam Banyo Tar', 74.89, '', '', 0, 'https://productimages.hepsiburada.net/s/1/500/9541378441266.jpg', 0, 38, 0),
('Smartphones', 'Samsung', 'Samsung Galaxy Note 8 64 GB Dual Sim', 4299, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9802265657394.jpg', 0, 39, 0),
('Others', 'Gaming', 'Hasbro Gaming Doğum Günü Eğlencesi', 125.23, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9829820071986.jpg', 0, 40, 0),
('Cradle', 'Babybee', 'Babybee Ahşap Sallanan Beşik 60 x 120 cm', 299.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9821047193650.jpg', 0, 41, 0),
('Make Up', 'Lancome', 'Lancome Grandiose Maskara Siyah + Crayon', 233.99, '', '', 0, 'https://productimages.hepsiburada.net/s/7/1500/9759331319858.jpg', 0, 42, 0),
('Baby Care', 'Prima', 'Prima Bebek Bezi Aktif Bebek 3 Beden Mid', 129.99, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9832028143666.jpg', 0, 43, 0),
('Earphones', 'Xiaomi', 'Xiaomi Piston Basic Edition Mikrofonlu K', 44.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9820091646002.jpg', 0, 44, 0),
('Notebooks', 'Dell', 'Dell Gaming 7577 Intel Core i7 7700HQ 8G', 5299, '', '', 0, 'https://productimages.hepsiburada.net/s/7/500/9771767169074.jpg', 0, 45, 0),
('Personal Care', 'Oral-B', 'Oral-B Diş Fırçası Yedek Başlığı', 39.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9789254860850.jpg', 1, 46, 0),
('Earphone', 'JBL', 'JBL C100SIUBLK Kulaklık CT, IE, Siyah   ', 49.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/500/9793030291506.jpg', 0, 47, 0),
('Others', 'Würth', 'Würth Silikon Sprey 500 Ml. ', 48.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9801188671538.jpg', 0, 48, 0),
('Clothing', 'Eagle Eyes', 'Eagle Eyes U1601 Erkek Kol Saati', 189, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9788013412402.jpg', 0, 49, 0),
('Furniture', 'EVDEMO', 'Evdemo İnferno Köşe Koltuk Takımı - Kahv', 1428.43, '', '', 0, 'https://productimages.hepsiburada.net/s/5/1500/9698513256498.jpg', 0, 50, 0),
('Smartphones', 'Samsung', 'Samsung Galaxy Note Fan Edition Dual Sim', 3199, '', '', 0, 'https://productimages.hepsiburada.net/s/6/500/9749709717554.jpg', 0, 51, 0),
('Smartphones', 'Apple', 'Apple iPhone X 64 GB ', 6099, '', '', 0, 'https://productimages.hepsiburada.net/s/6/500/9713620058162.jpg', 1, 52, 0),
('Smartphones', 'Xiaomi', 'Xiaomi Mi Note 3 64 GB', 2099, '', '', 0, 'https://productimages.hepsiburada.net/s/6/500/9735274168370.jpg', 1, 53, 0),
('Smartphones', 'Xiaomi', 'Xiaomi 10000 mAh (Versiyon 2) Taşınabili', 89.9, '', '', 0, 'https://productimages.hepsiburada.net/s/1/1500/9529286721586.jpg', 0, 54, 0),
('Smartphones', 'Xiaomi', 'Xiaomi Mi Band 2 Akıllı Bileklik Siyah  ', 149.9, '', '', 0, 'https://productimages.hepsiburada.net/s/5/1500/9679093858354.jpg', 0, 55, 0),
('Smartphones', 'Xiaomi', 'Xiaomi Mi 6 64 GB 4 GB RAM', 2299, '', '', 0, 'https://productimages.hepsiburada.net/s/17/500/9775958982706.jpg', 1, 56, 0),
('Smartphones', 'Samsung', 'Samsung Galaxy J7 Prime', 1499, '', '', 0, 'https://productimages.hepsiburada.net/s/1/500/9489589600306.jpg', 0, 57, 0),
('TVs', 'LG', 'LG 24MN49HM-PZ 24 61 Ekran USB Movie HD', 1099, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9836946260018.jpg', 0, 58, 0),
('TVs', 'Vestel', 'Vestel 32HB5000 32 82 Ekran HD Uydu Alı', 1299, '', '', 0, 'https://productimages.hepsiburada.net/s/1/1500/9521419550770.jpg', 0, 59, 0),
('TVs', 'LG', 'LG 49UJ630V 49 124 Ekran 4K Uydu Alıcıl', 4199, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9829699518514.jpg', 0, 60, 0),
('TVs', 'Vestel', 'Vestel 40FB5050 40 102 Ekran Full HD Uydu Alıcılı ', 1709, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9831299678258.jpg', 0, 93, 0),
('Notebooks', 'Asus', 'Asus Vivobook X540YA-XO185D AMD E1 7010 2GB 500GB ', 1299, '', '', 0, 'https://productimages.hepsiburada.net/s/7/500/9767357775922.jpg', 0, 163, 0),
('Others', 'Cinemaximum', 'Tüm Cinemaximumlar – (Premium Sinemalar Hariç - 3D', 75, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9838579875890.jpg', 0, 282, 0),
('Furniture', 'Taç;', 'Taç Banyo Seti İsabella', 259.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9834601644082.jpg', 0, 283, 0),
('Personal Care', 'Dove', 'Dove Kadınlara Özel Bakım Seti', 49.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9839108161586.jpg', 0, 284, 0),
('Coffee', 'Jacobs', 'Jacobs Filtre Kahve 1000 gr + Saklama Kabı', 59.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9794927460402.jpg', 0, 285, 0),
('Printers', 'HP', 'HP Sprocket Beyaz Fotoğraf Yazıcı Z3Z91A', 599, '', '', 0, 'https://productimages.hepsiburada.net/s/1/1500/9735334002738.jpg', 0, 287, 0),
('Carpets', 'Babycim', 'Babycim Büyük Dostlar Oyun Halısı', 149.9, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9793225687090.jpg', 0, 288, 0),
('Music Player', 'Mikado', 'Mikado Nostalgia MN-102 Sitah Müzik Kutusu', 345.01, '', '', 0, 'https://productimages.hepsiburada.net/s/5/500/9674649239602.jpg', 0, 289, 0),
('Weighing Machine', 'Tefal', 'Tefal Premiss PP1041 Beyaz Cam Banyo Tartı', 60.99, '', '', 0, 'https://productimages.hepsiburada.net/s/1/500/9541378441266.jpg', 0, 291, 0),
('Smartphones', 'Samsung', 'Samsung Galaxy Note 8 64 GB Dual Sim', 4299, '', '', 0, 'https://productimages.hepsiburada.net/s/18/1500/9802265657394.jpg', 0, 292, 0),
('Others', 'Gaming', 'Hasbro Gaming Doğum Günü Eğlencesi', 125.23, '', '', 0, 'https://productimages.hepsiburada.net/s/19/500/9829820071986.jpg', 0, 293, 0),
('Cradle', 'Babybee', 'Babybee Ahşap Sallanan Beşik 70 x 140 cm', 399.9, '', '', 0, 'https://productimages.hepsiburada.net/s/19/1500/9821047193650.jpg', 0, 294, 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
