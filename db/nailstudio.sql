-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2023 at 01:04 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nailstudio`
--

-- --------------------------------------------------------

--
-- Table structure for table `afspraak`
--

DROP TABLE IF EXISTS `afspraak`;
CREATE TABLE IF NOT EXISTS `afspraak` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nagelKleur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `telnr` varchar(16) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `afspraakDate` datetime NOT NULL,
  `soort` varchar(255) NOT NULL,
  `AfspraakCreated` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `afspraak`
--

INSERT INTO `afspraak` (`Id`, `nagelKleur`, `telnr`, `mail`, `afspraakDate`, `soort`, `AfspraakCreated`) VALUES
(1, '#ff0000, #ff9500, #eeff00, #00ff04', '+31 6 414 62 199', 'tjardoihrig1@gmail.com', '2023-08-27 13:58:00', 'nagelbijt, luxeMani', '2023-02-19 12:58:38'),
(2, '#f0b7b7, #917aff, #ff00ea, #fbff00', '+31 6 827 69 734', 'EgbertGoede@teleworm.us', '2023-02-20 16:05:00', 'luxeMani, nagelReparatie', '2023-02-19 12:59:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
