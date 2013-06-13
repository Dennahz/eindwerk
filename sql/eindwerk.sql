-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 13 jun 2013 om 15:23
-- Serverversie: 5.5.31-MariaDB-1~squeeze
-- PHP-versie: 5.3.26-1~dotdeb.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `eindwerk`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `basket`
--

CREATE TABLE IF NOT EXISTS `basket` (
  `basketId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  PRIMARY KEY (`basketId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `basketContent`
--

CREATE TABLE IF NOT EXISTS `basketContent` (
  `basketContentId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `quantity` int(2) DEFAULT NULL,
  PRIMARY KEY (`basketContentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categoryLocale`
--

CREATE TABLE IF NOT EXISTS `categoryLocale` (
  `categoryLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `localeId` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `translated` enum('YES','NO') DEFAULT NULL,
  PRIMARY KEY (`categoryLocaleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locale`
--

CREATE TABLE IF NOT EXISTS `locale` (
  `localeId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`localeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photoId` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('JPG','JPEG','PNG') DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`photoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photoLocale`
--

CREATE TABLE IF NOT EXISTS `photoLocale` (
  `photoLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `localeId` int(11) DEFAULT NULL,
  `photoId` int(11) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `teaser` varchar(200) DEFAULT NULL,
  `translated` enum('YES','NO') DEFAULT NULL,
  PRIMARY KEY (`photoLocaleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productId` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(45) DEFAULT NULL,
  `status` enum('ONLINE','OFFLINE') DEFAULT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productCategory`
--

CREATE TABLE IF NOT EXISTS `productCategory` (
  `productCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productLocale`
--

CREATE TABLE IF NOT EXISTS `productLocale` (
  `productLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `localeId` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `teaser` varchar(200) DEFAULT NULL,
  `content` text,
  `translated` enum('YES','NO') DEFAULT NULL,
  PRIMARY KEY (`productLocaleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productPhoto`
--

CREATE TABLE IF NOT EXISTS `productPhoto` (
  `productPhotoId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `photoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productPhotoId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
  `translateId` int(11) NOT NULL AUTO_INCREMENT,
  `localeId` int(11) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  `translation` text,
  PRIMARY KEY (`translateId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `surname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `function` enum('USER','DEALER','ADMIN') DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
