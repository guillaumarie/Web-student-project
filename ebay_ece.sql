-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 17, 2020 at 12:29 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebay_ece`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

DROP TABLE IF EXISTS `achat`;
CREATE TABLE IF NOT EXISTS `achat` (
  `RefAchat` int(11) NOT NULL AUTO_INCREMENT,
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Date` date NOT NULL,
  `Prix` int(11) NOT NULL,
  `TypeAchat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RefAchat`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `acheteur`
--

DROP TABLE IF EXISTS `acheteur`;
CREATE TABLE IF NOT EXISTS `acheteur` (
  `IdAcheteur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Adresse1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Adresse2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CP` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ville` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pays` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TypeCarte` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NumeroCarte` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `NomTitulaire` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Expiration` date NOT NULL,
  `CVC` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAcheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`IdAcheteur`, `Nom`, `Prenom`, `Adresse1`, `Adresse2`, `CP`, `Ville`, `Pays`, `Telephone`, `Email`, `TypeCarte`, `NumeroCarte`, `NomTitulaire`, `Expiration`, `CVC`, `Password`) VALUES
(8, 'MARIE', 'Guillaume', '6 Square du Trocadéro', '', '75116', 'Paris', 'France', '0781986785', 'guillaume@gmail.com', 'Visa', '1111222233334444', 'MR GUILLAUME MARIE', '2022-01-01', '123', 'azerty'),
(10, 'SARDOU', 'Michel', '11 Avenue Charles de Gaulle', '', '92200', 'Neuilly-sur-Seine', 'France', '0123401234', 'sardou@gmail.com', 'mastercard', '1234123412341234', 'MR SARDOU', '2021-12-21', '456', '456');

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `Debut` date NOT NULL,
  `Fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enchere`
--

INSERT INTO `enchere` (`IdItem`, `IdAcheteur`, `Prix`, `Debut`, `Fin`) VALUES
(9, 0, 10000000, '2020-05-23', '2020-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IdItem` int(11) NOT NULL AUTO_INCREMENT,
  `IdVendeur` int(11) NOT NULL,
  `Nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Photo1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo2` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Photo3` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Photo4` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Photo5` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TypeAchat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdItem`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IdItem`, `IdVendeur`, `Nom`, `Photo1`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Description`, `Prix`, `Categorie`, `TypeAchat`) VALUES
(4, 3, 'La Joconde', '', '', '', '', '', 'Très célèbre peinture', 10000000, 'musee', 'enchere'),
(5, 3, 'La Joconde', '', '', '', '', '', 'Très célèbre peinture', 10000000, 'musee', 'enchere'),
(6, 3, 'La Joconde', 'joconde-1.jpg', '', '', '', '', 'Très belle pièce', 10000000, 'musee', 'enchere'),
(7, 3, 'La Joconde', 'joconde-1.jpg', 'joconde-2.jpg', '', '', '', 'Belle pièce', 10000000, 'musee', 'enchere'),
(10, 2, 'Bague Cartier', 'joconde-2.jpg', '', '', '', '', 'Belle', 5000, 'vip', 'offre'),
(9, 2, 'La Joconde', 'joconde-1.jpg', 'joconde-2.jpg', 'joconde-3.jpg', 'joconde-4.jpg', '', 'Belle pièce', 10000000, 'musee', 'enchere');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Prix` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`IdItem`, `IdAcheteur`, `Prix`) VALUES
(10, 0, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `IdAcheteur` int(11) NOT NULL,
  `IdItem` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendeur`
--

DROP TABLE IF EXISTS `vendeur`;
CREATE TABLE IF NOT EXISTS `vendeur` (
  `IdVendeur` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PhotoProfil` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `ImageFond` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdVendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`IdVendeur`, `Nom`, `Prenom`, `Email`, `Password`, `PhotoProfil`, `ImageFond`) VALUES
(8, 'MARIE', 'Guillaume', 'guillaume@gmail.com', 'azerty', 'images/vendeur/guillaume-marie.jpg', ''),
(3, 'BEZOS', 'Jeff', 'jeff-bezos@gmail.com', '0000', 'images/vendeur/jeff-bezos.jpg', ''),
(1, 'MACRON', 'Emmanuel', 'macron@gmail.com', 'root', '', ''),
(10, 'FEDERER', 'Roger', 'roger-federer@gmail.com', '00', 'images/vendeur/roger-federer.jpg', 'images/vendeur/banniere-roger.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
