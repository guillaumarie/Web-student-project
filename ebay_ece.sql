-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 20, 2020 at 09:37 PM
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
  `NumeroCommande` int(11) NOT NULL,
  `IdItem` int(11) NOT NULL,
  `IdAcheteur` int(11) NOT NULL,
  `IdVendeur` int(11) NOT NULL,
  `DateVente` date NOT NULL,
  `Prix` int(11) NOT NULL,
  `TypeAchat` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`RefAchat`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `achat`
--

INSERT INTO `achat` (`RefAchat`, `NumeroCommande`, `IdItem`, `IdAcheteur`, `IdVendeur`, `DateVente`, `Prix`, `TypeAchat`) VALUES
(1, 1, 49, 8, 2, '2020-04-20', 700, 'immediat'),
(2, 2, 40, 8, 10, '2020-04-20', 15000, 'immediat'),
(3, 3, 39, 8, 10, '2020-04-20', 5000000, 'immediat_offre');

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
  `Telephone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TypeCarte` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NumeroCarte` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `NomTitulaire` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Expiration` date NOT NULL,
  `CVC` varchar(3) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAcheteur`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`IdAcheteur`, `Nom`, `Prenom`, `Email`, `Password`, `Adresse1`, `Adresse2`, `CP`, `Ville`, `Pays`, `Telephone`, `TypeCarte`, `NumeroCarte`, `NomTitulaire`, `Expiration`, `CVC`) VALUES
(10, 'SARDOU', 'Michel', 'sardou@gmail.com', '456', '11 Avenue Charles de Gaulle', '', '92200', 'Neuilly-sur-Seine', 'France', '0123401234', 'mastercard', '1234123412341234', 'MR SARDOU', '2021-12-21', '456'),
(8, 'MARIE', 'Guillaume', 'guillaume.marie@edu.ece.fr', 'azerty', '9 Square du Trocadéro', '', '75116', 'Paris', 'France', '0605040302', 'Visa', '1111222233334444', 'MR GUILLAUME MARIE', '2022-01-01', '123'),
(12, 'QUISTIN', 'Larys', 'larys.quistin@edu.ece.fr', 'quistin', '5 Rue des Lilas', '4ème étage', '75007', 'Paris', 'France', '0102030405', 'amex', '4321432143214321', 'MR LARYS QUISTIN', '2023-02-17', '789'),
(13, 'LENNON', 'Killian', 'killian.lennon@edu.ece.fr', 'lennon', '18 Avenue de la Gare', '', '75008', 'Paris', 'France', '9876543210', 'paypal', '4321432143214321', 'MR KILLIAN LENNON', '2023-07-13', '123'),
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
(46, 0, 200000, '2020-04-29', '2020-05-13'),
(44, 12, 100000, '2020-04-19', '2020-05-15'),
(44, 10, 120000, '2020-04-19', '2020-05-15'),
(44, 8, 90000, '2020-04-19', '2020-05-15'),
(45, 0, 170001, '2020-04-10', '2020-04-15'),
(44, 0, 100001, '2020-04-19', '2020-05-15'),
(45, 13, 200000, '2020-04-10', '2020-04-15'),
(45, 10, 170000, '2020-04-10', '2020-04-15'),
(47, 0, 150000, '2020-04-20', '2020-05-21'),
(50, 0, 40, '2020-05-22', '2020-06-25'),
(51, 0, 700, '2020-06-10', '2020-09-04');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IdItem` int(11) NOT NULL AUTO_INCREMENT,
  `IdVendeur` int(11) NOT NULL,
  `Nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo1` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo2` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo3` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo4` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Photo5` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Video` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `TypeAchat` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdItem`)
) ENGINE=MyISAM AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`IdItem`, `IdVendeur`, `Nom`, `Photo1`, `Photo2`, `Photo3`, `Photo4`, `Photo5`, `Video`, `Description`, `Prix`, `Categorie`, `TypeAchat`) VALUES
(44, 1, 'Montre Rolex', 'images/item/img_rolex.jpg', 'images/item/img_rolex_2.jpg', '', '', '', '', 'Portée 2 fois seulement', 75000, 'ferraille', 'enchere'),
(45, 8, 'Hummer', 'images/item/hummer.jpg', '', '', '', '', '', 'Comme neuf', 150000, 'vip', 'enchere'),
(43, 3, 'Montre Richard Mille', 'images/item/img_richard_mille.jpg', '', '', '', '', '', 'Achetée il y a 30 ans !', 45000, 'vip', 'offre'),
(41, 1, 'La Joconde', 'images/item/joconde-1.jpg', 'images/item/joconde-2.jpg', 'images/item/joconde-3.jpg', 'images/item/joconde-4.jpg', 'images/item/joconde-5.jpg', 'images/item/une-minute-au-musee-ep07-la-joconde.mp4', 'Pas mal...', 2500000, 'musee', 'offre'),
(51, 2, 'Chaise', 'images/item/chaise.jpg', '', '', '', '', '', 'Date du 18ème siècle', 700, 'ferraille', 'enchere'),
(38, 8, 'Villa', 'images/item/villa.jpg', '', '', '', '', '', 'Belle et bien située', 3000000, 'ferraille', 'offre'),
(46, 2, 'Venus de Milo', 'images/item/venus_de_milo.jpg', '', '', '', '', '', 'I found it in Paris!', 200000, 'musee', 'enchere'),
(47, 8, 'Trésor de pirate', 'images/item/pirate1.jpg', 'images/item/pirate2.jpg', '', '', '', '', 'Trouvé aux Caraïbes', 150000, 'ferraille', 'enchere'),
(48, 3, 'Ferrari', 'images/item/18900944lpw-18900957-article-jpg_6766931_1250x625.jpg', 'images/item/ferrari.jpg', 'images/item/ferrari2.jpg', '', '', '', 'Très peu roulé', 170000, 'vip', 'offre'),
(50, 11, 'Assiettes', 'images/item/assiettes.jpg', '', '', '', '', '', 'Très plates ! Parfait pour mes omelettes', 40, 'ferraille', 'enchere');

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
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `offre`
--

INSERT INTO `offre` (`IdOffre`, `IdItem`, `IdAcheteur`, `Proposition`, `Accepte`) VALUES
(18, 41, 10, 2300000, 0),
(35, 41, 10, 2450000, 0),
(16, 43, 0, 45000, 0),
(34, 41, 10, 2550000, 0),
(15, 41, 0, 2500000, 0),
(13, 38, 0, 3000000, 0),
(33, 41, 10, 2400000, 0),
(32, 41, 10, 2600000, 0),
(28, 48, 0, 170000, 0),
(30, 41, 12, 2700000, 0);

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
  `Nom` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `PhotoProfil` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ImageFond` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdVendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`IdVendeur`, `Nom`, `Prenom`, `Email`, `Password`, `PhotoProfil`, `ImageFond`) VALUES
(8, 'MARIE', 'Guillaume', 'guillaume@gmail.com', 'azerty', 'images/vendeur/guillaume-marie.jpg', 'images/vendeur/port.jpg'),
(3, 'BEZOS', 'Jeff', 'jeff-bezos@gmail.com', '0000', 'images/vendeur/jeff-bezos.jpg', 'images/vendeur/amazon.jpg'),
(1, 'MACRON', 'Emmanuel', 'macron@gmail.com', 'root', 'images/vendeur/emmanuel-macron.jpg', 'images/vendeur/2e50a585ffd2507d00f4b53e6f1db16bf0398ac5.jpeg'),
(10, 'FEDERER', 'Roger', 'roger-federer@gmail.com', '00', 'images/vendeur/roger-federer.jpg', 'images/vendeur/banniere-roger.jpg'),
(2, 'OBAMA', 'Barack', 'obama@gmail.com', 'barack', 'images/vendeur/obama.jpg', 'images/vendeur/P20170614JB-0303-2-1024x683.jpg'),
(11, 'Etchebest', 'Philippe', 'best@gmail.com', 'cuisine', 'images/vendeur/Philippe_Etchebest.png', 'images/vendeur/detail.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
