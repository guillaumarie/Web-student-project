-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 19, 2020 at 10:17 PM
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
  `Email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Adresse1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Adresse2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `CP` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Ville` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Pays` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Telephone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `TypeCarte` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `NumeroCarte` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `NomTitulaire` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Expiration` date NOT NULL,
  `CVC` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAcheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`IdAcheteur`, `Nom`, `Prenom`, `Email`, `Password`, `Adresse1`, `Adresse2`, `CP`, `Ville`, `Pays`, `Telephone`, `TypeCarte`, `NumeroCarte`, `NomTitulaire`, `Expiration`, `CVC`) VALUES
(10, 'SARDOU', 'Michel', 'sardou@gmail.com', '456', '11 Avenue Charles de Gaulle', '', '92200', 'Neuilly-sur-Seine', 'France', '0123401234', 'mastercard', '1234123412341234', 'MR SARDOU', '2021-12-21', '456'),
(8, 'MARIE', 'Guillaume', 'guillaume@gmail.com', 'azerty', '6 Square du Trocadéro', '', '75116', 'Paris', 'France', '0781986785', 'Visa', '1111222233334444', 'MR GUILLAUME MARIE', '2022-01-01', '123'),
(12, 'QUISTIN', 'Larys', 'larys@gmail.com', 'quistin', '5 Rue des Lilas', '4ème étage', '75007', 'Paris', 'France', '0102030405', 'amex', '4321432143214321', 'MR LARYS QUISTIN', '2023-02-17', '789'),
(13, 'LENNON', 'Killian', 'killian@gmail.com', 'lennon', '18 Avenue de la Gare', '', '75008', 'Paris', 'France', '9876543210', 'paypal', '4321432143214321', 'MR KILLIAN LENNON', '2023-07-13', '123'),
(14, 'SEGADO', 'Jean-Pierre', 'jp-segado@edu.ece.fr', 'jpece', '29 Quai de Grenelle', '', '75015', 'Paris', 'France', '1213141516', 'visa', '0000222244446666', 'MR SEGADO', '2020-10-08', '123');

-- --------------------------------------------------------

--
-- Table structure for table `enchere`
--

DROP TABLE IF EXISTS `enchere`;
CREATE TABLE IF NOT EXISTS `enchere` (
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Plafond` int(11) NOT NULL,
  `Debut` date NOT NULL,
  `Fin` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enchere`
--

INSERT INTO `enchere` (`IdItem`, `IdAcheteur`, `Plafond`, `Debut`, `Fin`) VALUES
(44, 12, 100000, '2020-04-19', '2020-05-15'),
(44, 10, 120000, '2020-04-19', '2020-05-15'),
(44, 8, 90000, '2020-04-19', '2020-05-15'),
(45, 0, 150000, '2020-04-19', '2020-04-23'),
(44, 0, 100001, '2020-04-19', '2020-05-15');

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
  `Video` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `Description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TypeAchat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdItem`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IdItem`, `IdVendeur`, `Nom`, `Photo1`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Video`, `Description`, `Prix`, `Categorie`, `TypeAchat`) VALUES
(44, 1, 'Montre Rolex', 'images/item/img_rolex.jpg', 'images/item/img_rolex_2.jpg', '', '', '', '', 'Portée 2 fois seulement', 75000, 'ferraille', 'enchere'),
(45, 8, 'Hummer', 'images/item/hummer.jpg', '', '', '', '', '', 'Comme neuf', 150000, 'vip', 'enchere'),
(43, 3, 'Montre Richard Mille', 'images/item/img_richard_mille.jpg', '', '', '', '', '', 'Achetée il y a 30 ans !', 45000, 'vip', 'offre'),
(41, 1, 'La Joconde', 'images/item/joconde-1.jpg', 'images/item/joconde-2.jpg', 'images/item/joconde-3.jpg', 'images/item/joconde-4.jpg', 'images/item/joconde-5.jpg', 'images/item/une-minute-au-musee-ep07-la-joconde.mp4', 'Pas mal...', 2500000, 'musee', 'offre'),
(39, 10, 'Guernica', 'images/item/guernica.jpg', '', '', '', '', '', 'Joli !', 5000000, 'musee', 'immediat_offre'),
(40, 10, 'Obus', 'images/item/obus_1.jpg', 'images/item/obus_2.jpg', '', '', '', '', 'Datant de la Première Guerre Mondiale', 15000, 'ferraille', 'immediat'),
(38, 8, 'Villa', 'images/item/villa.jpg', '', '', '', '', '', 'Belle et bien située', 3000000, 'ferraille', 'offre');

-- --------------------------------------------------------

--
-- Table structure for table `offre`
--

DROP TABLE IF EXISTS `offre`;
CREATE TABLE IF NOT EXISTS `offre` (
  `IdOffre` int(11) NOT NULL AUTO_INCREMENT,
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `Proposition` int(11) NOT NULL,
  `Accepte` tinyint(1) NOT NULL,
  PRIMARY KEY (`IdOffre`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`IdOffre`, `IdItem`, `IdAcheteur`, `Proposition`, `Accepte`) VALUES
(18, 41, 10, 2300000, 0),
(17, 39, 8, 4500000, 0),
(16, 43, 0, 45000, 0),
(14, 39, 0, 5000000, 0),
(15, 41, 0, 2500000, 0),
(13, 38, 0, 3000000, 0);

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
(10, 'FEDERER', 'Roger', 'roger-federer@gmail.com', '00', 'images/vendeur/roger-federer.jpg', 'images/vendeur/banniere-roger.jpg'),
(2, 'OBAMA', 'Barack', 'obama@gmail.com', 'barack', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
