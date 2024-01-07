-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 07 Oca 2024, 21:29:46
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bby361_iremtasci`
--
CREATE DATABASE IF NOT EXISTS `bby361_iremtasci` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bby361_iremtasci`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eser`
--

CREATE TABLE `eser` (
  `eserID` int(11) NOT NULL,
  `eserAdi` text NOT NULL,
  `eserISBN` varchar(13) NOT NULL,
  `eserBasimYeri` text DEFAULT NULL,
  `eserBasimTarihi` int(11) DEFAULT NULL,
  `eserSayfaSayisi` int(11) DEFAULT NULL,
  `eserDili` text DEFAULT NULL,
  `eserOrijinalDili` text DEFAULT NULL,
  `eserYazarID` int(11) NOT NULL,
  `eserYayineviID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `eser`
--

INSERT INTO `eser` (`eserID`, `eserAdi`, `eserISBN`, `eserBasimYeri`, `eserBasimTarihi`, `eserSayfaSayisi`, `eserDili`, `eserOrijinalDili`, `eserYazarID`, `eserYayineviID`) VALUES
(1, 'Ütopya', '9789755841977', 'İstanbul', 2017, 147, 'Türkçe', 'Latince', 1, 1),
(2, 'Doğunun Limanları', '9789750809777', 'İstanbul', 2020, 183, 'Türkçe', 'Fransızca', 2, 2),
(3, 'Kayıp Tanrılar Ülkesi', '9789750850417', 'İstanbul', 2021, 502, 'Türkçe', 'Türkçe', 3, 2),
(4, 'Kukla', '9789750846342', 'İstanbul', 2021, 551, 'Türkçe', 'Türkçe', 3, 2),
(5, 'Şeytan Ayrıntıda Gizlidir', '9752930328', 'İstanbul', 2006, 179, 'Türkçe', 'Türkçe', 3, 4),
(6, 'Akhilleus/un Şarkısı', '9756057762931', 'İstanbul', 2021, 450, 'Türkçe', 'İngilizce', 4, 5),
(7, 'Küçük Arı', '9756054263370', 'İstanbul', 2010, 341, 'Türkçe', 'İngilizce', 5, 6),
(8, 'Puslu Kıtalar Atlası', '9789754704723', 'İstanbul', 2020, 238, 'Türkçe', 'Türkçe', 6, 3),
(9, 'Suskunlar', '9789750505380', 'İstanbul', 2010, 268, 'Türkçe', 'Türkçe', 6, 3),
(10, 'Yabancı', '9789750715709', 'İstanbul', 2014, 110, 'Türkçe', 'Fransızca', 7, 7),
(11, 'Yaşamın Ucuna Yolculuk', '9789753631545', 'İstanbul', 2017, 125, 'Türkçe', 'Türkçe', 8, 2),
(13, 'Cebelavi Sokağının Çocukları', '9789944756341', 'İstanbul', 2020, 453, 'Türkçe', 'Arapça', 10, 9),
(14, 'Bülbülü Öldürmek', '9789755706849', 'İstanbul', 2018, 357, 'Türkçe', 'İngilizce', 11, 10),
(15, 'Göğe Bakma Durağı', '9789750813870', 'İstanbul', 2022, 108, 'Türkçe', 'Türkçe', 12, 2),
(16, 'Hamlet', '9789944883061', 'İstanbul', 2019, 186, 'Türkçe', 'İngilizce', 13, 8),
(17, 'Oğullar ve Rencide Ruhlar', '9786254491008', 'İstanbul', 2018, 230, 'Türkçe', 'Türkçe', 15, 3),
(20, 'Gizli Ajans', '9786254491003', 'İstanbul', 2021, 180, 'Türkçe', 'Türkçe', 15, 3);

-- --------------------------------------------------------

--
-- Görünüm yapısı durumu `eser_yazar_yayinevi`
-- (Asıl görünüm için aşağıya bakın)
--
CREATE TABLE `eser_yazar_yayinevi` (
`eserID` int(11)
,`eserAdi` text
,`eserISBN` varchar(13)
,`yazarAdi` varchar(255)
,`yazarSoyadi` text
,`yayineviAdi` text
,`yayineviURL` text
);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konuAltBaslik`
--

CREATE TABLE `konuAltBaslik` (
  `konuAltBaslikID` int(11) NOT NULL,
  `altBasliklar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `konuAltBaslik`
--

INSERT INTO `konuAltBaslik` (`konuAltBaslikID`, `altBasliklar`) VALUES
(1, 'Macera'),
(2, 'Tarihi'),
(3, 'Romantik'),
(4, 'Bilim Kurgu/Fantastik'),
(5, 'Gizem/Polisiye/Gerilim'),
(6, 'Psikolojik'),
(7, 'Distopya'),
(8, 'Genç Yetişkin'),
(9, 'Dünya Klasikleri'),
(10, 'Yerel Klasikler'),
(11, 'Lirik Şiir'),
(12, 'Epik Şiir'),
(13, 'Halk Şiiri'),
(14, 'Tragedya'),
(15, 'Komedi'),
(16, 'Monologlar'),
(17, 'Biyografi'),
(18, 'Otobiyografi'),
(19, 'Anı'),
(20, 'Deneme'),
(21, 'Popüler Bilim'),
(22, 'Teknoloji ve Bilgisayar'),
(23, 'Resim ve Görsel Sanatlar'),
(24, 'Müzik Tarihi'),
(25, 'Sanat Teorisi'),
(26, 'Dünya Tarihi'),
(27, 'İnsanlık Tarihi'),
(28, 'Savaş Tarihi'),
(29, 'Türkiye Tarihi'),
(30, 'Din Kitapları'),
(31, 'Felsefe Kitapları'),
(32, 'Çocuk Kitapları'),
(33, 'Gençlik Kitapları'),
(34, 'Masal'),
(35, 'Seyehat Rehberleri'),
(36, 'Doğa Gezi Kitapları');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konuBaslikGenel`
--

CREATE TABLE `konuBaslikGenel` (
  `genelBaslikID` int(11) NOT NULL,
  `genelBasliklar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `konuBaslikGenel`
--

INSERT INTO `konuBaslikGenel` (`genelBaslikID`, `genelBasliklar`) VALUES
(1, 'Roman'),
(2, 'Klasik Edebiyat'),
(3, 'Şiir'),
(4, 'Tiyatro'),
(5, 'Kurgusal Olmayan'),
(6, 'Bilim ve Teknoloji'),
(7, 'Sanat ve Müzik'),
(8, 'Tarih'),
(9, 'Din ve Felsefe'),
(10, 'Çocuk ve Gençlik'),
(11, 'Gezi ve Doğa'),
(12, 'Dergi');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevi`
--

CREATE TABLE `yayinevi` (
  `yayineviID` int(11) NOT NULL,
  `yayineviAdi` text NOT NULL,
  `yayineviİL` text DEFAULT NULL,
  `yayineviKurulusTarihi` int(11) DEFAULT NULL,
  `yayineviURL` text DEFAULT NULL,
  `yayineviTelefon` int(11) DEFAULT NULL,
  `yayineviEposta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yayinevi`
--

INSERT INTO `yayinevi` (`yayineviID`, `yayineviAdi`, `yayineviİL`, `yayineviKurulusTarihi`, `yayineviURL`, `yayineviTelefon`, `yayineviEposta`) VALUES
(1, 'Öteki Yayınevi', 'İstanbul', 1992, 'www.otekiyayinevi.com', 2147483647, 'kitap@otekiyayinevi.com'),
(2, 'Yapı Kredi Yayınları', 'İstanbul', 1992, 'www.ykykultur.com.tr', 2122524700, 'ykykultur@ykykultur.com.tr'),
(3, 'İletişim Yayınları', 'İstanbul', 1982, 'www.iletisim.com.tr', 2125162260, 'iletisim@iletisim.com.tr'),
(4, 'Doğan Kitap', 'İstanbul', 1999, 'www.dogankitap.com.tr', 2124496006, 'iletisim@dogankitap.com.tr'),
(5, 'İthaki Yayınları', 'İstanbul', 1997, 'www.ithaki.com.tr', 2147483647, 'editor@ithaki.com.tr'),
(6, 'Pegasus Yayınları', 'İstanbul', 2006, 'www.pegasusyayinlari.com', 2122442350, 'info@pegasusyayinlari.com'),
(7, 'Can Yayınları', 'İstanbul', 1981, 'www.canyayinlari.com', 2122525675, 'yayinevi@canyayinlari.com'),
(8, 'Türkiye İş Bankası Kültür Yayınları', 'İstanbul', 1956, 'www.iskultur.com.tr', 2122523991, 'bilgi@iskultur.com.tr'),
(9, 'Kırmızı Kedi Yayınevi', 'İstanbul', 2008, 'www.kirmizikedi.com', 2122448982, 'kirmizikedi@kirmizikedi.com'),
(10, 'Sel Yayıncılık', 'İstanbul', 1990, 'www.selyayincilik.com', 2125229672, 'halklailiskiler@selyayincilik.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar`
--

CREATE TABLE `yazar` (
  `yazarID` int(11) NOT NULL,
  `yazarAdi` varchar(255) DEFAULT NULL,
  `yazarSoyadi` text NOT NULL,
  `yazarDogumTarihi` int(11) DEFAULT NULL,
  `yazarCinsiyet` text DEFAULT NULL,
  `yazarURL` text DEFAULT NULL,
  `yazarEposta` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yazar`
--

INSERT INTO `yazar` (`yazarID`, `yazarAdi`, `yazarSoyadi`, `yazarDogumTarihi`, `yazarCinsiyet`, `yazarURL`, `yazarEposta`) VALUES
(1, 'Thomas', 'Moore', 1478, 'Erkek', 'Yok', 'Yok'),
(2, 'Amin ', 'Maalouf', 1949, 'Erkek', 'Yok', 'Yok'),
(3, 'Ahmet ', 'Ümit', 1960, 'Erkek', 'https://www.ahmetumit.com/', 'info@ahmetumit.com'),
(4, 'Madeline', 'Miller', 1978, 'Kadın', 'http://madelinemiller.com/', 'Yok'),
(5, 'Chris ', 'Cleave', 1973, 'Erkek', 'https://chriscleave.com/', 'Yok'),
(6, 'İhsan Oktay', 'Anar', 1960, 'Erkek', 'Yok', 'Yok'),
(7, 'Albert', 'Camus', 1913, 'Erkek', 'Yok', 'Yok'),
(8, 'Tezer', 'Özlü', 1943, 'Kadın', 'Yok', 'Yok'),
(9, 'Maksim', 'Gorki', 1868, 'Erkek', 'Yok', 'Yok'),
(10, 'Necib', 'Mahfuz', 1911, 'Erkek', 'Yok', 'Yok'),
(11, 'Harper', 'Lee', 1926, 'Kadın', 'Yok', 'Yok'),
(12, 'Turgut', 'Uyar', 1927, 'Erkek', 'Yok', 'Yok'),
(13, 'William', 'Shakespeare', 1564, 'Erkek', 'Yok', 'Yok'),
(14, 'Zülfü', 'Livaneli', 1946, 'Erkek', 'https://www.livaneli.gen.tr/', 'livanelizulfu@gmail.com'),
(15, 'Alper', 'Canıgüz', 1969, 'Erkek', 'Yok', 'Yok'),
(20, 'Orhan', 'Pamuk', 1952, 'Erkek', 'https://www.orhanpamuk.net/', 'Yok');

-- --------------------------------------------------------

--
-- Görünüm yapısı `eser_yazar_yayinevi`
--
DROP TABLE IF EXISTS `eser_yazar_yayinevi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eser_yazar_yayinevi`  AS SELECT `eser`.`eserID` AS `eserID`, `eser`.`eserAdi` AS `eserAdi`, `eser`.`eserISBN` AS `eserISBN`, `yazar`.`yazarAdi` AS `yazarAdi`, `yazar`.`yazarSoyadi` AS `yazarSoyadi`, `yayinevi`.`yayineviAdi` AS `yayineviAdi`, `yayinevi`.`yayineviURL` AS `yayineviURL` FROM ((`eser` join `yazar` on(`eser`.`eserYazarID` = `yazar`.`yazarID`)) join `yayinevi` on(`eser`.`eserYayineviID` = `yayinevi`.`yayineviID`)) ;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `eser`
--
ALTER TABLE `eser`
  ADD PRIMARY KEY (`eserID`),
  ADD UNIQUE KEY `eserISBN` (`eserISBN`);

--
-- Tablo için indeksler `konuAltBaslik`
--
ALTER TABLE `konuAltBaslik`
  ADD PRIMARY KEY (`konuAltBaslikID`);

--
-- Tablo için indeksler `konuBaslikGenel`
--
ALTER TABLE `konuBaslikGenel`
  ADD PRIMARY KEY (`genelBaslikID`);

--
-- Tablo için indeksler `yayinevi`
--
ALTER TABLE `yayinevi`
  ADD PRIMARY KEY (`yayineviID`);

--
-- Tablo için indeksler `yazar`
--
ALTER TABLE `yazar`
  ADD PRIMARY KEY (`yazarID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `eser`
--
ALTER TABLE `eser`
  MODIFY `eserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `yayinevi`
--
ALTER TABLE `yayinevi`
  MODIFY `yayineviID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Tablo için AUTO_INCREMENT değeri `yazar`
--
ALTER TABLE `yazar`
  MODIFY `yazarID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
