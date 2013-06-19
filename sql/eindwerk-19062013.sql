-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 19 jun 2013 om 16:31
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
-- Tabelstructuur voor tabel `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `categoryId` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `category`
--

INSERT INTO `category` (`categoryId`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categoryLocale`
--

CREATE TABLE IF NOT EXISTS `categoryLocale` (
  `categoryLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `locale` varchar(5) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `translated` enum('YES','NO') DEFAULT NULL,
  PRIMARY KEY (`categoryLocaleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Gegevens worden uitgevoerd voor tabel `categoryLocale`
--

INSERT INTO `categoryLocale` (`categoryLocaleId`, `categoryId`, `locale`, `name`, `translated`) VALUES
(1, 1, 'nl_BE', 'Telefoons', 'YES'),
(2, 2, 'nl_BE', 'Ramen', 'YES'),
(3, 2, 'en', 'Windows', 'YES'),
(4, 1, 'en', 'Telephones', 'YES');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `locale`
--

CREATE TABLE IF NOT EXISTS `locale` (
  `localeId` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(5) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`localeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `locale`
--

INSERT INTO `locale` (`localeId`, `locale`, `name`) VALUES
(1, 'nl_BE', 'Nederlands'),
(2, 'en', 'English');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('ONLINE','OFFLINE') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `page`
--

INSERT INTO `page` (`pageId`, `status`) VALUES
(2, 'ONLINE');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pageLocale`
--

CREATE TABLE IF NOT EXISTS `pageLocale` (
  `pageLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `pageId` int(11) NOT NULL,
  `locale` varchar(5) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`pageLocaleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Gegevens worden uitgevoerd voor tabel `pageLocale`
--

INSERT INTO `pageLocale` (`pageLocaleId`, `pageId`, `locale`, `title`, `content`) VALUES
(2, 2, 'en', 'About', '&copy; Dennis Dirksma - 2013'),
(3, 2, 'nl_BE', 'Over', '&copy; Dennis Dirksma 2013');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `photoId` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('JPG','JPEG','PNG') DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`photoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `photo`
--

INSERT INTO `photo` (`photoId`, `type`, `name`) VALUES
(1, 'JPG', 'windows95'),
(2, 'JPG', 'windows95-2');

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
  `price` float NOT NULL,
  PRIMARY KEY (`productId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `product`
--

INSERT INTO `product` (`productId`, `label`, `status`, `price`) VALUES
(1, NULL, 'ONLINE', 1),
(4, NULL, 'ONLINE', 1.25),
(5, NULL, 'ONLINE', 2),
(6, NULL, 'ONLINE', 4),
(7, NULL, 'ONLINE', 6),
(8, NULL, 'ONLINE', 7),
(9, NULL, 'ONLINE', 8),
(10, NULL, 'ONLINE', 10),
(11, NULL, 'ONLINE', 100),
(12, NULL, 'ONLINE', 85),
(13, NULL, 'ONLINE', 95);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productCategory`
--

CREATE TABLE IF NOT EXISTS `productCategory` (
  `productCategoryId` int(11) NOT NULL AUTO_INCREMENT,
  `categoryId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productCategoryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `productCategory`
--

INSERT INTO `productCategory` (`productCategoryId`, `categoryId`, `productId`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productLocale`
--

CREATE TABLE IF NOT EXISTS `productLocale` (
  `productLocaleId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `locale` varchar(5) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `teaser` varchar(200) DEFAULT NULL,
  `content` text,
  `translated` enum('YES','NO') DEFAULT NULL,
  PRIMARY KEY (`productLocaleId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `productLocale`
--

INSERT INTO `productLocale` (`productLocaleId`, `productId`, `locale`, `title`, `teaser`, `content`, `translated`) VALUES
(1, 1, 'nl_BE', 'Ramen 3.11', 'Windows 3.11, het paradepaardje van Microsoft.', 'Windows 3.11, het paradepaardje van Microsoft. Volledig draaiend op MS-DOS.', 'YES'),
(2, 4, 'nl_BE', 'Ramen 95', 'Nog beter dan 3.11 ! ', 'Nu met een startmenu en Internet Explorer 3.0! ', 'YES'),
(3, 5, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(4, 5, 'en', 'Windows 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(5, 4, 'en', 'Windows 95', 'Nog beter dan 3.11 ! ', 'Nu met een startmenu en Internet Explorer 3.0! ', 'YES'),
(6, 1, 'en', 'Windows 3.11', 'Windows 3.11, het paradepaardje van Microsoft.', 'Windows 3.11, het paradepaardje van Microsoft. Volledig draaiend op MS-DOS.', 'YES'),
(7, 6, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(8, 6, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(9, 7, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(10, 8, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(11, 9, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(12, 10, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES'),
(13, 11, 'nl_BE', 'Ramen 98', 'Bladiebla', 'Lorem ipsum', 'YES');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `productPhoto`
--

CREATE TABLE IF NOT EXISTS `productPhoto` (
  `productPhotoId` int(11) NOT NULL AUTO_INCREMENT,
  `productId` int(11) DEFAULT NULL,
  `photoId` int(11) DEFAULT NULL,
  PRIMARY KEY (`productPhotoId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `productPhoto`
--

INSERT INTO `productPhoto` (`productPhotoId`, `productId`, `photoId`) VALUES
(1, 4, 1),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `translate`
--

CREATE TABLE IF NOT EXISTS `translate` (
  `translateId` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(5) DEFAULT NULL,
  `tag` varchar(45) DEFAULT NULL,
  `translation` text,
  PRIMARY KEY (`translateId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Gegevens worden uitgevoerd voor tabel `translate`
--

INSERT INTO `translate` (`translateId`, `locale`, `tag`, `translation`) VALUES
(1, 'nl_BE', 'fp.search', 'Zoeken'),
(2, 'en', 'fp.search', 'Search'),
(3, 'nl_BE', 'fp.products', 'Producten'),
(4, 'en', 'fp.products', 'Products'),
(5, 'nl_BE', 'fp.cats', 'Categorieen'),
(6, 'en', 'fp.cats', 'Categories'),
(7, 'nl_BE', 'addtobasket', 'Voeg toe aan mandje'),
(8, 'en', 'addtobasket', 'Add to basket'),
(9, 'nl_BE', 'emptybasket', 'Winkelmandje legen'),
(10, 'en', 'emptybasket', 'Empty basket'),
(11, 'nl_BE', 'login.username', 'Gebruikersnaam'),
(12, 'nl_BE', 'login.password', 'Wachtwoord'),
(13, 'en', 'login.username', 'Username'),
(14, 'en', 'login.password', 'Password'),
(15, 'nl_BE', 'login.submit', 'Inloggen'),
(16, 'en', 'login.submit', 'Login'),
(17, 'nl_BE', 'header.subtxt', 'De beste shop voor alle Microsoft artikelen.'),
(18, 'en', 'header.subtxt', 'The best shop for all Microsoft products.'),
(19, 'nl_BE', 'login.title', 'Inloggen'),
(20, 'en', 'login.title', 'Login');

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
  `role` enum('USER','DEALER','ADMIN') DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `name`, `surname`, `email`, `role`) VALUES
(1, 'dennis', 'dennis', 'Dennis', 'Dirksma', 'dennis@dirksma.nl', 'ADMIN');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
