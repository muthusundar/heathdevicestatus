-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 18, 2017 at 07:55 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

DROP TABLE IF EXISTS `device`;
CREATE TABLE IF NOT EXISTS `device` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DeviceID` varchar(45) NOT NULL,
  `DeviceLabel` varchar(50) DEFAULT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ReportedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`ID`, `DeviceID`, `DeviceLabel`, `CreatedOn`, `ReportedOn`) VALUES
(2, 'fasdfasdf3', 'dg45wgtgfd', '2017-12-18 13:16:39', '2017-12-18 13:16:00'),
(4, 'fasdfasdf5', 'fsdfasdfasdf', '2017-12-18 13:17:48', '2017-12-18 11:05:00'),
(5, 'fasdfasdf7', 'dgdfgsdfg', '2017-12-18 13:31:08', '2017-12-18 13:31:00'),
(6, 'f43fer4t5q33434', 'sdfasdfasdfasdf', '2017-12-18 17:54:46', '2017-12-18 17:42:12'),
(7, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:12:51', '2017-12-18 17:42:12'),
(8, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:12:53', '2017-12-18 17:42:12'),
(9, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:12:56', '2017-12-18 17:42:12'),
(10, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:13:00', '2017-12-18 17:42:12'),
(11, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:13:25', '2017-12-18 17:42:12'),
(12, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:13:27', '2017-12-18 17:42:12'),
(13, 'f43fer4t5q33434fasdfafsdfasdfsdfasdfsdafsdfas', 'sdfasdfasdfasdf', '2017-12-18 18:13:32', '2017-12-18 17:42:12'),
(14, 'f43fer4t5q33434gdsfg', 'sdfasdfasdfasdf', '2017-12-18 18:22:17', '2017-12-18 17:42:12'),
(15, 'f43fer4t5q33434fasdfafsdfasdfsdfasdf', 'sdfasdfasdfasdf', '2017-12-18 18:32:32', '2017-12-18 17:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `RandomString` varchar(45) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Email`, `Password`, `IsActive`, `RandomString`, `CreatedOn`, `UpdatedOn`) VALUES
(1, 'muthu', 'muthusunda@gmail.com', '0192023a7bbd73250516f069df18b500', 1, 'fec2a13922b8ef0c7cd88f73cad9b134', '2017-12-18 07:09:17', '2017-12-18 14:05:46'),
(3, 'muthu', 'muthusunda2@gmail.com', NULL, 1, '6f4be4c5d5fc747873a0d5d0d1a08c37', '2017-12-18 11:11:29', '2017-12-18 16:01:01'),
(4, 'muthu', 'muthusunda3@gmail.com', NULL, 1, 'eb15fa27c7dc9365b373aa7c53cc41a8', '2017-12-18 13:32:32', '2017-12-18 13:32:32'),
(5, NULL, NULL, NULL, 1, '97034988104f7c201f17a635f9453197', '2017-12-18 18:26:58', '2017-12-18 18:26:58'),
(6, NULL, NULL, NULL, 1, '5b9088a34d3764565f5ce26ed1563c09', '2017-12-18 18:27:51', '2017-12-18 18:27:51'),
(7, 'muthu', 'sundar@su1.com', NULL, 1, '1a45db7402724ade860e1f3a62e3c23f', '2017-12-18 18:34:17', '2017-12-18 18:34:17'),
(8, '', '', NULL, 0, 'e5610c9bec4a5add919163a477933f68', '2017-12-18 19:24:23', '2017-12-18 19:24:23');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
