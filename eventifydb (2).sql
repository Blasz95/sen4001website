-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2026 at 12:40 PM
-- Server version: 8.4.7
-- PHP Version: 8.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE DATABASE IF NOT EXISTS eventifydb;
USE eventifydb;

DROP TABLE IF EXISTS `events`;
CREATE TABLE IF NOT EXISTS `events` (
  `EventID` int NOT NULL AUTO_INCREMENT,
  `AddedBy` varchar(32) NOT NULL,
  `EventName` varchar(32) NOT NULL,
  `EventDescription` varchar(64) NOT NULL,
  `EventCategory` varchar(64) NOT NULL,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `ImageUrl` varchar(32) NOT NULL,
  PRIMARY KEY (`EventID`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`EventID`, `AddedBy`, `EventName`, `EventDescription`, `EventCategory`, `StartDate`, `EndDate`, `ImageUrl`) VALUES
(18, 'Anon', 'UNI Concert', 'Listen to uni student music', 'Music', '2026-05-06 00:00:00', '2026-05-14 00:00:00', 'Music2'),
(17, 'Rob', 'Polish Concert', 'Listen to polish music', 'Music', '2026-05-28 00:00:00', '2026-05-06 00:00:00', 'Music1'),
(16, 'Wojtek', 'Game room', 'Experience new games', 'Gaming', '2026-05-07 00:00:00', '2026-08-20 00:00:00', 'Gaming2'),
(15, 'Anon', 'Gametify', 'Play Games with friends', 'Gaming', '2026-05-06 00:00:00', '2026-06-18 00:00:00', 'Gaming1'),
(19, 'Ethan', 'Ethan Presents', 'Go over New technology with ethan', 'Tech', '2026-05-06 00:00:00', '2026-05-07 00:00:00', 'Tech1'),
(20, 'Rando', 'Techy rando', 'See random Techy stuff', 'Tech', '2026-05-06 00:00:00', '2026-05-08 00:00:00', 'Tech2'),
(21, 'Anon', 'Meet and Greet', 'Meet new people', 'Other', '2026-05-06 00:00:00', '2026-05-09 00:00:00', 'Other1'),
(22, 'Mountain Guy', 'Hiking with Guy', 'go on a mountain hike with Guy', 'Other', '2026-05-06 00:00:00', '2026-05-16 00:00:00', 'Other2'),
(23, 'Racer', 'Race in Wales', 'Watch People race', 'Sports', '2026-05-21 00:00:00', '2026-05-29 00:00:00', 'Sports1'),
(24, 'Anon', 'Swimming Comp', 'Watch swimmers compete', 'Sports', '2026-06-18 00:00:00', '2026-06-18 00:00:00', 'Sports2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Surname` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `DOB` date NOT NULL,
  `Password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`UID`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `FirstName`, `Surname`, `Username`, `Email`, `DOB`, `Password`) VALUES
(4, 'Rog', 'Garcez', 'Troe123', 'Troe@gmail.com', '2007-11-16', '$2y$10$PqnbdTWk9M8pjQ9G2mldTOGQAzRRmTT9TIXTdVzQc.STrO2O6rTk6');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
