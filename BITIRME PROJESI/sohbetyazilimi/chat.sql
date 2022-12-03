-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 03 Ara 2022, 11:47:53
-- Sunucu sürümü: 5.7.36
-- PHP Sürümü: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `chat`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`user_id`, `adsoyad`, `email`, `parola`, `resim`) VALUES
(1, 'Mehmet Selçuk Batal', 'batalms@gmail.com', '1234', 'img/mehmetselcukbatalprofil.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `msj_id` int(11) NOT NULL AUTO_INCREMENT,
  `kullaniciname` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `zaman` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`msj_id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `message`
--

INSERT INTO `message` (`msj_id`, `kullaniciname`, `mesaj`, `zaman`) VALUES
(164, 'Mehmet Selçuk Batal', 'Merhaba Arkadaşlar ', '03.12.2022 / 14:44'),
(165, 'Mehmet Selçuk Batal', '4 Aralık Pazar günü İBB Veri Laboratuvarında buluşuyoruz.', '03.12.2022 / 14:45'),
(166, 'ismailcnshn@gmail.com', 'Merhabalar hocam ben geliyorum.', '03.12.2022 / 14:45'),
(167, 'Ali Paltacı', 'Bende geliyorum hocam', '03.12.2022 / 14:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `parola` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `durum` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`user_id`, `adsoyad`, `email`, `parola`, `resim`, `durum`) VALUES
(15, 'Ahmet İhsan Bozacı', 'ahmetihsanbozaci@gmail.com', '123456', 'img/ahmetihsanprofil.jpg', '1'),
(14, 'Burak Keskinkılıç', 'burakkeskinkilic@gmail.com', '123456', 'img/burakkeskinilicprofil.jpg', '0'),
(8, 'Mehmet Selçuk Batal', 'batalms@gmail.com', '1234', 'img/mehmetselcukbatalprofil.jpg', '1'),
(12, 'Ali Paltacı', 'alipaltaci@gmail.com', '123456', 'img/aliprofil.jpg', '1'),
(13, 'Serkan Şeker', 'serkanseker@gmail.com', '123456', 'img/serkanprofil.jpg', '0'),
(16, 'Ömer Can Ersoy', 'omercanersoy@gmail.com', '123456', 'img/ömercanprofil.jpg', '0'),
(17, 'Muhammed Ali Güney', 'muhammedaliguney@gmail.com', '123456', 'img/muhammedaliprofil.jpg', '1'),
(18, 'Fatih Ayça', 'fatihayca@gmail.com', '123456', 'img/fatihprofil.jpg', '1'),
(26, 'ismailcnshn@gmail.com', 'ismailcnshn@gmail.com', '123456', 'img/ismailprofil.jpg', '1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
