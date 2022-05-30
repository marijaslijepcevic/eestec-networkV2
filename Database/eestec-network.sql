-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 30, 2022 at 02:30 PM
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
  `picture` mediumblob NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '0',
  `openApplications` tinyint(1) NOT NULL DEFAULT '0',
  `isApproved` int(11) NOT NULL DEFAULT '0',
  `IdEventCom` int(11) UNSIGNED DEFAULT NULL,
  `finishedSelection` tinyint(1) NOT NULL DEFAULT '0',
  `dateStart` date NOT NULL,
  `dateEnd` date NOT NULL,
  `numOfAcc` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdEvent`),
  KEY `IdEventCom` (`IdEventCom`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`IdEvent`, `eventName`, `type`, `description`, `numOfParticipants`, `picture`, `isActive`, `openApplications`, `isApproved`, `IdEventCom`, `finishedSelection`, `dateStart`, `dateEnd`, `numOfAcc`) VALUES
(6, 'Spring Congress IMW', 'IMW', 'Rest well deserved after this year\'s Spring Congress! Join us for 2 unforgettable days in sunny Belgrade, with more than 250 other EESTEC-ers.', 250, 0x417274626f61726420312e706e67, 1, 0, 1, 11, 1, '2022-05-20', '2022-05-22', 0),
(7, 'Autumn Congress IMW', 'IMW', 'Join us in the amazing Swiss Alps for the weekend - great views, great cheese, and great chocolate. A one of a kind event, that only an LC like Zurich can organize. You don\'t want to miss this one :)', 100, 0x4369726968206a6573656e6a692e706e67, 1, 1, 1, 18, 0, '2022-11-25', '2022-11-27', 0),
(8, 'RESPAWN: Game Development Workshop', 'Workshop', 'Are you ready to dive into the world of game development while adventuring through the beautiful city of Novi Sad? ', 15, 0x42656c677261646549734261636b2e4a5047, 0, 1, 1, 11, 0, '2022-06-13', '2022-06-19', 0),
(9, 'RESPAWN: Game Development Workshop', 'Workshop', 'Are you ready to dive into the world of game development while adventuring through the beautiful city of Novi Sad? \r\nIf your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on ', 15, 0x6d696e68656e206a6573656e6a692e706e67, 0, 1, 1, 11, 0, '2022-06-13', '2022-06-19', 0),
(10, 'RESPAWN: Game Development Workshop', 'Workshop', 'Are you ready to dive into the world of game development while adventuring through the beautiful city of Novi Sad? \r\n\r\nIf your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen!\r\n\r\nThroughout this adventure you will upgrade your game development skill tree to the next level ⬆ by participating in sessions focusing on both the theory and practical applications of the knowledge while creating your own game.\r\n\r\nOf course, the adventure spans way beyond just the sessions guild and advances into the vast open world of Novi Sad, the 2022 European Capital of Culture. You will have a chance to explore this immersive land and take part in various activities throughout it. \r\n\r\nFor the completionists among you, we\'ve prepared an  Achievement Hunt which will take you through various side quests around the city (some would even say rally) and allow you to collect enough XP to progress through the main storyline. Keep in mind that fast travel will be disabled during this questline so make sure to stock up on health and stamina potions beforehand!\r\n', 15, 0x6d696e68656e206a6573656e6a692e706e67, 0, 0, 2, 11, 0, '2022-06-13', '2022-06-19', 0),
(11, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen!', 15, 0x417274626f61726420352e706e67, 0, 0, 2, 11, 0, '2022-05-30', '2022-06-05', 0),
(12, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen!\r\n\r\nThroughout this adventure you will upgrade your game development skill tree to the next level ⬆ by participating in sessions focusing on both the theory and practical applications of the knowledge while creating your own game.', 15, 0x417274626f61726420352e706e67, 1, 1, 1, 11, 0, '2022-05-31', '2022-06-05', 0),
(13, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen!\r\nThroughout this adventure you will upgrade your game development skill tree to the next level by participating in sessions focusing on both the theory and practical applications of the knowledge while creating your own game.', 15, 0x417274626f61726420352e706e67, 0, 0, 0, 11, 0, '2022-05-30', '2022-06-05', 0),
(14, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on  an epic quest to create the best game the world has ever seen!\r\n', 15, 0x417274626f61726420352e706e67, 1, 0, 1, 11, 0, '2022-05-23', '2022-05-29', 0),
(15, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen!\n\nThroughout this adventure you will upgrade your game development skill tree to the next level by participating in sessions focusing on both the theory and practical applications of the knowledge while creating your own game.\n\nOf course, the adventure spans way beyond just the sessions guild and advances into the vast open world of Novi Sad, the 2022 European Capital of Culture. You will have a chance to explore this immersive land and take part in various activities throughout it.\n\nFor the completionists among you, we\'ve prepared an Achievement Hunt which will take you through various side quests around the city (some would even say rally) and allow you to collect enough XP to progress through the main storyline. Keep in mind that fast travel will be disabled during this questline so make sure to stock up on health and stamina potions beforehand!\n', 15, 0x417274626f6172642d352e6a706567, 1, 1, 1, 11, 0, '2022-05-30', '2022-06-05', 0),
(16, 'RESPAWN: Game Development Workshop', 'Workshop', 'If your answer is YES, then you\'re in luck because we are looking for a team of adventurous heroes willing to join us on an epic quest to create the best game the world has ever seen! Throughout this adventure you will upgrade your game development skill tree to the next level by participating in sessions focusing on both the theory and practical applications of the knowledge while creating your own game. Of course, the adventure spans way beyond just the sessions guild and advances into the vast open world of Novi Sad, the 2022 European Capital of Culture. You will have a chance to explore this immersive land and take part in various activities', 15, 0x417274626f6172642d352e6a706567, 0, 0, 0, 11, 0, '2022-06-13', '2022-06-19', 0);

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
  `dateOfAppl` date NOT NULL,
  `id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdUser`,`IdEvent`),
  KEY `IdUser` (`IdUser`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `eventapplication`
--

INSERT INTO `eventapplication` (`IdUser`, `IdEvent`, `motivationalLetter`, `isAccepted`, `dateOfAppl`, `id`) VALUES
(14, 6, NULL, 0, '2022-05-27', 1),
(14, 7, NULL, 0, '2022-05-27', 2),
(14, 15, 'Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!Hello my name is Jovan!', 0, '2022-05-29', 3);

-- --------------------------------------------------------

--
-- Table structure for table `localcommittee`
--

DROP TABLE IF EXISTS `localcommittee`;
CREATE TABLE IF NOT EXISTS `localcommittee` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `committeeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `universityName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` longblob,
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `isApproved` int(11) NOT NULL DEFAULT '0',
  `dateOfReg` date NOT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `IdUser` (`IdUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `localcommittee`
--

INSERT INTO `localcommittee` (`IdUser`, `committeeName`, `universityName`, `picture`, `type`, `isApproved`, `dateOfReg`) VALUES
(11, 'Belgrade', 'University of Belgrade', NULL, 'Local Committee', 1, '2022-05-27'),
(12, 'Zagreb', 'University of Zagreb', NULL, 'Local Committee', 1, '2022-05-27'),
(13, 'Munich', 'Technische Universität München', NULL, 'Local Committee', 1, '2022-05-27'),
(18, 'Zurich', 'ETH Zurich', NULL, 'Local Committee', 1, '2022-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `organizingcommittee`
--

DROP TABLE IF EXISTS `organizingcommittee`;
CREATE TABLE IF NOT EXISTS `organizingcommittee` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `IdEvent` int(11) UNSIGNED NOT NULL,
  `Id` int(11) NOT NULL,
  PRIMARY KEY (`IdUser`,`IdEvent`),
  KEY `IdUser` (`IdUser`),
  KEY `IdEvent` (`IdEvent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `organizingcommittee`
--

INSERT INTO `organizingcommittee` (`IdUser`, `IdEvent`, `Id`) VALUES
(14, 6, 0),
(14, 8, 0),
(14, 9, 0),
(14, 10, 0),
(14, 11, 0),
(14, 12, 0),
(14, 13, 0),
(14, 14, 0),
(14, 15, 0),
(14, 16, 0),
(15, 6, 0),
(15, 8, 0),
(15, 9, 0),
(15, 10, 0),
(15, 11, 0),
(15, 12, 0),
(15, 13, 0),
(15, 14, 0),
(15, 15, 0),
(15, 16, 0),
(19, 7, 0);

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
  `isApproved` int(11) NOT NULL DEFAULT '0',
  `dateOfReg` date NOT NULL,
  PRIMARY KEY (`IdUser`),
  KEY `IdUser` (`IdUser`),
  KEY `IdUserCom` (`IdUserCom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`IdUser`, `IdUserCom`, `name`, `surname`, `picture`, `isApproved`, `dateOfReg`) VALUES
(14, 11, 'Jovan', 'Dojčilović', NULL, 1, '2022-05-27'),
(15, 11, 'Marija', 'Slijepcevic', NULL, 1, '2022-05-27'),
(16, 13, 'Atanas', 'Daltchev', NULL, 1, '2022-05-27'),
(17, 12, 'Jan', 'Djurinec', NULL, 1, '2022-05-27'),
(19, 18, 'Benjamin', 'Stadler', NULL, 1, '2022-05-27');

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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `username`, `psw`, `email`) VALUES
(1, 'admin', '123', 'admin@gmail.com'),
(11, 'lcBelgrade', '123', 'belgrade@eestec.net'),
(12, 'lcZagreb', '123', 'zagreb@eestec.net'),
(13, 'lcMunich', '123', 'munich@eestec.net'),
(14, 'dojcilovicjovan', '123', 'jovandojcilovic@gmail.com'),
(15, 'marijaslijepcevic', '123', 'marija.01.ms@gmail.com'),
(16, 'atanas', '123', 'atanas@eestec.net'),
(17, 'jandjurinec', '123', 'jan@eestec.net'),
(18, 'lcZurich', '123', 'zurich@eestec.net'),
(19, 'benjaminstadler', '123', 'benjaminstadler@eestec.net');

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
