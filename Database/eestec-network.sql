-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2022 at 09:00 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eestec-network`
--
CREATE DATABASE IF NOT EXISTS `eestec-network` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `eestec-network`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  KEY `IdUser` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`IdUser`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `IdEvent` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `eventName` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `numOfParticipants` int(10) UNSIGNED NOT NULL,
  `picture` blob,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `openApplications` tinyint(1) NOT NULL DEFAULT '0',
  `isApproved` int(1) NOT NULL DEFAULT '0',
  `IdEventCom` int(11) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IdEvent`),
  KEY `IdEventCom` (`IdEventCom`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`IdEvent`, `eventName`, `type`, `description`, `numOfParticipants`, `picture`, `isActive`, `openApplications`, `isApproved`, `IdEventCom`) VALUES
(1, 'Kongres', 'IMW', 'Lorem ipsum', 400, NULL, 1, 1, 1, 6),
(2, 'Jobfair', 'IMW', 'lorem ipsum', 200, NULL, 0, 0, 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `eventapplication`
--

DROP TABLE IF EXISTS `eventapplication`;
CREATE TABLE IF NOT EXISTS `eventapplication` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `IdEvent` int(11) UNSIGNED NOT NULL,
  `motivationalLetter` text COLLATE utf8_unicode_ci,
  `isAccepted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdUser`,`IdEvent`),
  KEY `IdUser` (`IdUser`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventapplication`
--

INSERT INTO `eventapplication` (`IdUser`, `IdEvent`, `motivationalLetter`, `isAccepted`) VALUES
(2, 2, NULL, 1),
(4, 1, 'lorem ipsum', 0);

-- --------------------------------------------------------

--
-- Table structure for table `localcommittee`
--

DROP TABLE IF EXISTS `localcommittee`;
CREATE TABLE IF NOT EXISTS `localcommittee` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `committeeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `universityName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` blob,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdUser`),
  KEY `IdUser` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `localcommittee`
--

INSERT INTO `localcommittee` (`IdUser`, `committeeName`, `universityName`, `picture`, `type`, `isApproved`) VALUES
(6, 'LCBelgrade', 'University of Belgrade', NULL, 'LC', 0),
(7, 'LCMadrid', 'University of Madrid', NULL, 'observer', 0);

-- --------------------------------------------------------

--
-- Table structure for table `organizingcommittee`
--

DROP TABLE IF EXISTS `organizingcommittee`;
CREATE TABLE IF NOT EXISTS `organizingcommittee` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `IdEvent` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`IdUser`,`IdEvent`),
  KEY `IdUser` (`IdUser`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizingcommittee`
--

INSERT INTO `organizingcommittee` (`IdUser`, `IdEvent`) VALUES
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

DROP TABLE IF EXISTS `reguser`;
CREATE TABLE IF NOT EXISTS `reguser` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `IdUserCom` int(11) UNSIGNED DEFAULT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` blob,
  `isApproved` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdUser`),
  KEY `IdUser` (`IdUser`),
  KEY `IdUserCom` (`IdUserCom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`IdUser`, `IdUserCom`, `name`, `surname`, `picture`, `isApproved`) VALUES
(2, 6, 'Sava', 'Andric', NULL, 1),
(3, 6, 'Marija', 'Sljepcevic', NULL, 1),
(4, 6, 'Jovan', 'Dojcilovic', NULL, 1),
(5, 7, 'Petar', 'Petrovic', NULL, 0),
(8, 7, 'Zika', 'Zikic', NULL, 0),
(9, 7, 'Nikola', 'Nikolic', NULL, 0),
(10, 7, 'Ana', 'Anic', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `IdUser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `psw` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`IdUser`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `username`, `psw`, `email`) VALUES
(1, 'admin', '123', 'admin@gmail.com'),
(2, 'sava', '123', 'sava@gmail.com'),
(3, 'marija', '123', 'marija@gmail.com'),
(4, 'jovan', '123', 'jovan@gmail.com'),
(5, 'pera', '123', 'pera@gmail.com'),
(6, 'LCBelgrade', '123', 'lcbelgrade@gmail.com'),
(7, 'LCMadrid', '123', 'lcmadrid@gmail.com'),
(8, 'zika', '123', 'zika@gmail.com'),
(9, 'nikola', 'nikola@gmail.com', 'nikola@gmail.com'),
(10, 'ana', '123', 'ana@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`IdEventCom`) REFERENCES `localcommittee` (`IdUser`) ON UPDATE CASCADE;

--
-- Constraints for table `eventapplication`
--
ALTER TABLE `eventapplication`
  ADD CONSTRAINT `eventapplication_ibfk_2` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`IdEvent`) ON UPDATE CASCADE,
  ADD CONSTRAINT `eventapplication_ibfk_3` FOREIGN KEY (`IdUser`) REFERENCES `reguser` (`IdUser`) ON UPDATE CASCADE;

--
-- Constraints for table `localcommittee`
--
ALTER TABLE `localcommittee`
  ADD CONSTRAINT `localcommittee_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `organizingcommittee`
--
ALTER TABLE `organizingcommittee`
  ADD CONSTRAINT `organizingcommittee_ibfk_1` FOREIGN KEY (`IdEvent`) REFERENCES `event` (`IdEvent`) ON UPDATE CASCADE,
  ADD CONSTRAINT `organizingcommittee_ibfk_2` FOREIGN KEY (`IdUser`) REFERENCES `reguser` (`IdUser`) ON UPDATE CASCADE;

--
-- Constraints for table `reguser`
--
ALTER TABLE `reguser`
  ADD CONSTRAINT `reguser_ibfk_1` FOREIGN KEY (`IdUser`) REFERENCES `user` (`IdUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reguser_ibfk_2` FOREIGN KEY (`IdUserCom`) REFERENCES `localcommittee` (`IdUser`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
