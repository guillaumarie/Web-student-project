-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 15, 2020 at 01:36 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`IdAcheteur`, `Nom`, `Prenom`, `Adresse1`, `Adresse2`, `CP`, `Ville`, `Pays`, `Telephone`, `Email`, `TypeCarte`, `NumeroCarte`, `NomTitulaire`, `Expiration`, `CVC`, `Password`) VALUES
(8, 'MARIE', 'Guillaume', '6 Square du Trocadéro', '', '75116', 'Paris', 'France', '0781986785', 'guillaume@gmail.com', 'Visa', '1111222233334444', 'MR GUILLAUME MARIE', '2022-01-01', '123', 'azerty');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Prenom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdAdmin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdAdmin`, `Nom`, `Prenom`, `Email`, `Password`) VALUES
(1, 'MACRON', 'Emmanuel', 'emmanuel-macron@gmail.com', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
CREATE TABLE IF NOT EXISTS `item` (
  `IdItem` int(11) NOT NULL AUTO_INCREMENT,
  `IdVendeur` int(11) NOT NULL,
  `Nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Photos` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Description` text COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(11) NOT NULL,
  `Categorie` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TypeAchat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdItem`)
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
  PRIMARY KEY (`IdVendeur`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vendeur`
--

INSERT INTO `vendeur` (`IdVendeur`, `Nom`, `Prenom`, `Email`, `Password`, `PhotoProfil`) VALUES
(3, 'DUPONT', 'Marc', 'marc@gmail.com', '123', ''),
(8, 'MARIE', 'Guillaume', 'guillaume@gmail.com', 'azerty', 'guillaume-marie.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
