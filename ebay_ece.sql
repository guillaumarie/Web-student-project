-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 15, 2020 at 02:54 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `acheteur`
--

INSERT INTO `acheteur` (`IdAcheteur`, `Nom`, `Prenom`, `Adresse1`, `Adresse2`, `CP`, `Ville`, `Pays`, `Telephone`, `Email`, `TypeCarte`, `NumeroCarte`, `NomTitulaire`, `Expiration`, `CVC`, `Password`) VALUES
(8, 'MARIE', 'Guillaume', '6 Square du Trocadéro', '', '75116', 'Paris', 'France', '0781986785', 'guillaume@gmail.com', 'Visa', '1111222233334444', 'MR GUILLAUME MARIE', '2022-01-01', '123', 'azerty');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
