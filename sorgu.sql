-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 May 2024, 22:24:33
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `sorgu`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `adetarttir`
--

CREATE TABLE `adetarttir` (
  `id` int(11) NOT NULL,
  `adetler` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `apiusers`
--

CREATE TABLE `apiusers` (
  `id` int(11) NOT NULL,
  `auth_key` text NOT NULL,
  `ipadres` text NOT NULL,
  `adsoyad` text NOT NULL,
  `tc` text NOT NULL,
  `aile` text NOT NULL,
  `sulale` text NOT NULL,
  `tcgsm` text NOT NULL,
  `gsmtc` text NOT NULL,
  `annetaraf` text NOT NULL,
  `babataraf` text NOT NULL,
  `smsbomber` text NOT NULL,
  `adres` text NOT NULL,
  `plaka` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek_talepleri`
--

CREATE TABLE `destek_talepleri` (
  `id` int(11) NOT NULL,
  `konu` varchar(255) DEFAULT NULL,
  `yardim_turu` varchar(50) DEFAULT NULL,
  `olusturan` varchar(255) DEFAULT NULL,
  `olay` text DEFAULT NULL,
  `cevap` text DEFAULT NULL,
  `admin` text DEFAULT NULL,
  `durum` int(11) DEFAULT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `destek_talepleri`
--

INSERT INTO `destek_talepleri` (`id`, `konu`, `yardim_turu`, `olusturan`, `olay`, `cevap`, `admin`, `durum`, `tarih`) VALUES
(190, 'sicil', 'Şikayet', 'mkobbq', 'bence sicil vip dsn çıkarılmalı', 'Tabii ki efendim, başka emriniz varmıydı acaba ?', 'Andrei.', 1, '2023-08-23 18:31:14'),
(191, 'xss deniyom knk', 'Yardım/Hata', 'baba1', '&lt;script&gt;alert(&quot;sa&quot;);&lt;/script&gt;', 'Tabii.', 'Andrei', 1, '2023-08-23 19:23:14'),
(192, 'VİP', 'Diğer', 'yusufhamzax58', 'kral arada bir 3 günlük VİP hesap atsanıza ücretsiz bi tadina bakalim güzelse aliriz', 'Olabilir, Düşüneceğim.', 'Andrei', 1, '2023-08-23 20:10:33'),
(194, 'telefon', 'Şikayet', 'sarhan316931', 'telefon sorgu kısmı tam olarak doğru çalışmıyor bunu düzeltme imkanınız varsa düzeltirmisiniz', 'İsteğiniz işleme alınmıştır, en kısa süre içinde düzeltilecektir.', 'Andrei', 1, '2023-08-23 21:28:45'),
(195, 'Sorguda hiç bir cvp cıkmıyor ', 'Yardım/Hata', 'Ardagx098', 'Her hangi bir sorguda sonuç vermiyor ', 'Hangi Sorguda Sonuç Vermediğini Söylerseniz Yardımcı Olalım.', 'Andrei', 1, '2023-08-23 21:35:49'),
(199, 'sa', 'Şikayet', '2exxo', 'sa', 'Birdaha gereksiz bir destek talebi açarsanız üyeliğiniz silinecektir ve siteden ip ban yiyeceksiniz.', 'Andrei', 1, '2023-08-23 23:29:39'),
(200, 'Vip üyelik ', 'Yardım/Hata', 'Admin6044', 'Ben discord üzerinden haftalık üyelik aldım ama teslim edilmedi', NULL, NULL, NULL, '2023-08-24 08:58:31');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duyuru`
--

CREATE TABLE `duyuru` (
  `id` int(11) NOT NULL,
  `duyuruatan` text NOT NULL,
  `atılanduyuru` text NOT NULL,
  `tarih` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `key_ad` text NOT NULL,
  `role` text NOT NULL,
  `ipadres` text NOT NULL,
  `owner` text NOT NULL,
  `createdadmin` text NOT NULL,
  `key_pas` text NOT NULL,
  `createddate` text NOT NULL,
  `enddate` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `key_ad`, `role`, `ipadres`, `owner`, `createdadmin`, `key_pas`, `createddate`, `enddate`) VALUES
(2870, 'worex1', '1', '::1', '1', '1', '$2y$10$lBY37AbCVdQcqrI5xkwNR.cJFeBKWfOa.FKuUttRbge7QKapH23HC', '14.05.2024', '2050-12-20'),
(2869, 'worex', '1', '::1', '1', '1', '$2y$10$LgTHd4yAOOuq4puy9QWkWO.vQx1TWv2qvuODYu2nhm3iS7ikRFPEa', '04.04.2024', '2050-12-20');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `apiusers`
--
ALTER TABLE `apiusers`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek_talepleri`
--
ALTER TABLE `destek_talepleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `duyuru`
--
ALTER TABLE `duyuru`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `apiusers`
--
ALTER TABLE `apiusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `destek_talepleri`
--
ALTER TABLE `destek_talepleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- Tablo için AUTO_INCREMENT değeri `duyuru`
--
ALTER TABLE `duyuru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2871;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
