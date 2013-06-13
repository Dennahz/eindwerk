-- phpMyAdmin SQL Dump
-- version 3.5.4
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 13 jun 2013 om 22:07
-- Serverversie: 5.5.31-MariaDB-1~squeeze
-- PHP-versie: 5.4.16-1~dotdeb.0

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
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`localeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `locale`
--

INSERT INTO `locale` (`localeId`, `name`) VALUES
(1, 'Nederlands'),
(2, 'English');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `pageId` int(11) NOT NULL AUTO_INCREMENT,
  `status` enum('ONLINE','OFFLINE') CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`pageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Gegevens worden uitgevoerd voor tabel `page`
--

INSERT INTO `page` (`pageId`, `status`) VALUES
(1, 'ONLINE');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Gegevens worden uitgevoerd voor tabel `pageLocale`
--

INSERT INTO `pageLocale` (`pageLocaleId`, `pageId`, `locale`, `title`, `content`) VALUES
(1, 1, 'nl_BE', 'Over', '&copy; Dennis Dirksma - 2013'),
(2, 1, 'en', 'About', '&copy; Dennis Dirksma - 2013');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Gegevens worden uitgevoerd voor tabel `product`
--

INSERT INTO `product` (`productId`, `label`, `status`) VALUES
(1, NULL, 'ONLINE'),
(4, NULL, 'ONLINE'),
(5, NULL, 'ONLINE'),
(6, NULL, 'ONLINE'),
(7, NULL, 'ONLINE'),
(8, NULL, 'ONLINE'),
(9, NULL, 'ONLINE'),
(10, NULL, 'ONLINE'),
(11, NULL, 'ONLINE'),
(12, NULL, 'ONLINE'),
(13, NULL, 'ONLINE');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Gegevens worden uitgevoerd voor tabel `translate`
--

INSERT INTO `translate` (`translateId`, `locale`, `tag`, `translation`) VALUES
(1, 'nl_BE', 'fp.search', 'Zoeken'),
(2, 'en_EN', 'fp.search', 'Search'),
(3, 'nl_BE', 'fp.products', 'Producten'),
(4, 'en', 'fp.products', 'Products'),
(5, 'nl_BE', 'fp.cats', 'Categorieën '),
(6, 'en', 'fp.cats', 'Categories');

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
