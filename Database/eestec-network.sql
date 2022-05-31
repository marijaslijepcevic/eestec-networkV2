-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 31, 2022 at 09:08 PM
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
  `picture` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`IdEvent`, `eventName`, `type`, `description`, `numOfParticipants`, `picture`, `isActive`, `openApplications`, `isApproved`, `IdEventCom`, `finishedSelection`, `dateStart`, `dateEnd`, `numOfAcc`) VALUES
(28, 'Spring Congress IMW', 'IMW', 'Rest well deserved after this year\'s Spring Congress! Join more than 250 other participants in sunny Belgrade this spring.', 250, '1653944552_5b4530539f5481c0d46c.png', 1, 0, 1, 20, 1, '2022-05-20', '2022-05-22', 0),
(29, 'Autumn Congress', 'Workshop', 'The second biggest event of the year. In the beautiful Swiss Alps, the future of the Association will be discussed during 5 days of GMs.', 100, '1653947752_ce7a561fa05d2ab7aecd.png', 1, 1, 1, 22, 0, '2022-11-13', '2022-11-18', 0),
(30, 'June, the Tenthest (I)MW', 'IMW', 'On a very short notice we decided to open up our (I)MW!\r\nCome with us to the beautiful landscapes of Bavaria and enjoy a weekend full of parties and fun next to the Zugspitze, the highest mountain of Germany! Drink Bavarian beer, have pretzels with Obazda and a Weißwurstfrühstück with us. Don’t know what that is? Well, then it is time to come and find out! We will be more than happy to see all of you \r\n\r\n \r\n\r\n \r\n\r\nJoin us for 2 nights in our cottage in the Alps in breathtaking scenery.\r\n\r\nWe will meet at the Technical University of Munich at 12:00 CEST and take a train to the cottage.\r\n\r\nIn the 3 days and 2 nights we will spend there, you can prepare yourself for lots of drinking games, an incredible hike or a nice day at the public pool in the beautiful scenery and lots of EESTEC spirit!', 15, '1653947860_6f7e1da90932b49466c4.jpg', 1, 1, 0, 27, 0, '2022-06-10', '2022-06-12', 0),
(31, 'How to work 24/7', 'Workshop', 'The smallest event of the year.', 2, '1653997294_40676e54c52b5392e4a6.jpg', 1, 1, 1, 20, 0, '2022-05-16', '2022-05-31', 0),
(32, 'Money Heist: After CRedit', 'IMW', 'We will be getting rid of all the week\'s tiredness by chilling and having loads of fun. You want to know where? Right in Eskişehir! Eskişehir is a small student city with a warm environment, famous for its Odunpazarı and Porsuk Çayı, delicious Çibörek and super fun nightclubs. We\'ll be spending a wonderful weekend there, sightseeing in the morning and having fun to its fullest at night, until you dare to go! The fee includes:\r\n\r\naccommodation for two nights\r\npublic transport tickets in Eskişehir\r\nfood (2x breakfast, 3x lunch, 2x dinner)\r\nsome drinks for the Parties\r\ntickets for museums, morning activities', 40, '1653999977_e4bebd2a39ab74eb61b5.png', 1, 1, 0, 20, 0, '2022-08-19', '2022-08-21', 0),
(33, 'Autumn Congress IMW', 'IMW', 'The best IMW after the best Congress!', 120, '1654001878_85d6af05e8ae630df786.png', 1, 1, 1, 22, 0, '2022-11-18', '2022-11-20', 0),
(35, 'Live Regional Meeting Region V', 'Exchange', 'After quite a long time, the Live Regional Meetings are coming back! We are excited to announce that LC Belgrade will host the LRM for Region V at the beginning of May. Stay tuned, because an IMW is on it’s way, too!', 100, '1654029028_7986fe0f6cd8682f1aa1.png', 1, 1, 1, 20, 0, '2022-08-18', '2022-08-25', 0),
(36, 'Robot Strange in the Multiverse of Robotics', 'Workshop', '“Don’t cast that spell, don’t cast that spell “ as a wise man once said…\r\nBut this didn’t stand in the way of arrogance.\r\nSomething went really wrong after that spell.\r\nThe timeline is now broken and the multiverse of robotics is now unleashed!\r\nWill there be any way home?\r\n', 15, '1654031012_888d79ad311902915658.jpg', 1, 1, 1, 27, 0, '2022-08-12', '2022-08-18', 0);

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
(21, 28, NULL, 1, '2022-05-30', 1),
(21, 31, 'Yoo <3', 0, '2022-05-31', 10),
(23, 28, NULL, 1, '2022-05-30', 7),
(24, 28, NULL, 1, '2022-05-30', 3),
(24, 31, 'I would like to come! :)', 0, '2022-05-31', 8),
(24, 33, NULL, 0, '2022-05-31', 12),
(25, 28, NULL, 1, '2022-05-30', 2),
(25, 31, 'It looks really interesting!', 0, '2022-05-31', 9),
(25, 33, NULL, 0, '2022-05-31', 11),
(28, 28, NULL, 1, '2022-05-30', 5),
(29, 28, NULL, 1, '2022-05-30', 6),
(30, 28, NULL, 1, '2022-05-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `localcommittee`
--

DROP TABLE IF EXISTS `localcommittee`;
CREATE TABLE IF NOT EXISTS `localcommittee` (
  `IdUser` int(11) UNSIGNED NOT NULL,
  `committeeName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `universityName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
(20, 'Belgrade', 'University of Belgrade', '1653944277_de2ab4235e441a6360ff.png', 'Local Committee', 1, '2022-05-30'),
(22, 'Zurich', 'ETH Zurich', '1653946116_aaeda821d65f9b017d4a.jpg', 'Local Committee', 1, '2022-05-30'),
(26, 'Zagreb', 'University of Zagreb', '1653946386_a0fe393c3ae0f69ba2c4.png', 'Local Committee', 0, '2022-05-30'),
(27, 'Munich', 'Technische Universität München', '1653946446_a2af97927118bdfa250a.jpg', 'Local Committee', 1, '2022-05-30'),
(33, 'Krakow', 'AGH Krakow', '1654018900_df99f684458391adae35.png', 'Local Committee', 0, '2022-05-31'),
(34, 'Madrid', 'Polytechnic University of Madrid', '1654019030_b5aa5bcb497ebfbc449f.png', 'Local Committee', 0, '2022-05-31'),
(35, 'Patras', 'University Of Patras', '1654019151_504c8140421bbaf3e42d.png', 'Local Committee', 0, '2022-05-31');

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
(21, 28, 0),
(21, 31, 0),
(21, 32, 0),
(21, 35, 0),
(23, 29, 0),
(23, 33, 0),
(24, 32, 0),
(24, 35, 0),
(25, 32, 0),
(25, 35, 0),
(28, 30, 0),
(28, 36, 0);

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
  `picture` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
(21, 20, 'Jovan', 'Dojčilović', '1653944338_ac7be77cb88f1fb2d442.jpg', 1, '2022-05-30'),
(23, 22, 'Benjamin', 'Stadler', '1653946281_eb1261c2fec307473cd2', 1, '2022-05-30'),
(24, 20, 'Marija', 'Slijepcevic', '1653946305_e488796cd73164caf1d4', 1, '2022-05-30'),
(25, 20, 'Sava', 'Andric', '1653946338_a71044963dce3db73a2d', 1, '2022-05-30'),
(28, 27, 'Atanas', 'Daltchev', '1653946736_eeebbf2ce55f672e6f89', 1, '2022-05-30'),
(29, 26, 'Hana', 'Novak', '1653946775_f5a8b17248b675a0d190', 1, '2022-05-30'),
(30, 26, 'Jan', 'Djurinec', '1653946796_d578c626251242b4addb', 1, '2022-05-30'),
(31, 20, 'Mika', 'Mikić', '1653998158_43ba9783e84d26f89e41', 1, '2022-05-31'),
(32, 20, 'Ivana', 'Ivanović', '1653998209_001b49e074da7d369fd7', 0, '2022-05-31'),
(36, 20, 'Igor', 'Zec', '1654019182_6ce43fcbfc1c768efde3', 0, '2022-05-31'),
(37, 20, 'Andjela', 'Gazdic', '1654019210_88c66d6253f8a8d47289', 0, '2022-05-31'),
(38, 20, 'Marko', 'Tintor', '1654019229_3d7fdec0f75d0213269b', 0, '2022-05-31');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`IdUser`, `username`, `psw`, `email`) VALUES
(1, 'admin', '123', 'admin@gmail.com'),
(20, 'lcBelgrade', '123', 'belgrade@eestec.net'),
(21, 'dojcilovicjovan', '123', 'jovandojcilovic@gmail.com'),
(22, 'lcZurich', '123', 'zurich@eestec.net'),
(23, 'benjaminstadler', '123', 'benjaminstadler@eestec.net'),
(24, 'marijaslijepcevic', '123', 'marijaaslijepcevic@gmail.com'),
(25, 'savaandric', '123', 'sava.andric17@gmail.com'),
(26, 'lcZagreb', '123', 'zagreb'),
(27, 'lcMunich', '123', 'munich@eestec.net'),
(28, 'atanas', '123', 'atanas@eestec.net'),
(29, 'hananovak', '123', 'hananovak@eestec.net'),
(30, 'jandjurinec', '123', 'jan@eestec.net'),
(31, 'mikamikic', '123', 'mikamikic@gmail.com'),
(32, 'ivanaivanovic', '123', 'ivanaivanovic@gmail.com'),
(33, 'lcKrakow', '123', 'krakow@eestec.net'),
(34, 'lcMadrid', '123', 'madrid@eestec.net'),
(35, 'lcPatras', '123', 'patras@eestec.net'),
(36, 'igorzec', '123', 'igorzec@gmail.com'),
(37, 'andjelagazdic', '123', 'andjelagazdic@gmail.com'),
(38, 'markotintor', '123', 'markotintor@gmail.com');

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
