-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 05, 2020 at 07:00 PM
-- Server version: 10.3.14-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ums_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'Hassan Ismail', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(2, 'Mama', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `classID` int(11) NOT NULL AUTO_INCREMENT,
  `teacherID` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `scheduleSectionID` int(11) NOT NULL,
  `semesterID` int(11) NOT NULL,
  `scheduleTimeID` int(11) NOT NULL,
  PRIMARY KEY (`classID`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classID`, `teacherID`, `courseID`, `scheduleSectionID`, `semesterID`, `scheduleTimeID`) VALUES
(31, 12, 4, 1, 5, 2),
(30, 13, 3, 2, 5, 2),
(29, 11, 2, 2, 5, 1),
(33, 10, 1, 1, 5, 1),
(32, 13, 5, 2, 5, 3),
(34, 10, 4, 2, 5, 2),
(35, 10, 6, 1, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `courseName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `credit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `code`, `courseName`, `credit`) VALUES
(1, 'CSC-101', 'Programming 1', '3'),
(2, 'CSC-201', 'Programming 2', '3'),
(3, 'CSC-301', 'Data Base', '3'),
(4, 'CSC-302', 'CCNA 1', '3'),
(5, 'CSC-201', 'Software Engineering', '3'),
(6, 'CSC-303', 'Mobile Application', '3');

-- --------------------------------------------------------

--
-- Table structure for table `schedulesections`
--

DROP TABLE IF EXISTS `schedulesections`;
CREATE TABLE IF NOT EXISTS `schedulesections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schedulesections`
--

INSERT INTO `schedulesections` (`id`, `section`) VALUES
(1, 'M W F'),
(2, 'T TH');

-- --------------------------------------------------------

--
-- Table structure for table `scheduletimes`
--

DROP TABLE IF EXISTS `scheduletimes`;
CREATE TABLE IF NOT EXISTS `scheduletimes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scheduletimes`
--

INSERT INTO `scheduletimes` (`id`, `time`) VALUES
(1, '9 - 10:30'),
(2, '11 - 12:30'),
(4, '3 - 4:30'),
(3, '1 - 2:30');

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

DROP TABLE IF EXISTS `semesters`;
CREATE TABLE IF NOT EXISTS `semesters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `season` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `year`, `season`) VALUES
(5, '2019/2020', 'Spring'),
(4, '2019/2020', 'Fall'),
(3, '2018/2019 ', 'Summer'),
(2, '2018/2019 ', 'Spring'),
(1, '2018/2019 ', 'Fall'),
(6, '2020/2021', 'Spring');

-- --------------------------------------------------------

--
-- Table structure for table `studentclasses`
--

DROP TABLE IF EXISTS `studentclasses`;
CREATE TABLE IF NOT EXISTS `studentclasses` (
  `studentClassID` int(11) NOT NULL AUTO_INCREMENT,
  `classID` int(11) NOT NULL,
  `studentID` int(11) NOT NULL,
  PRIMARY KEY (`studentClassID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `studentclasses`
--

INSERT INTO `studentclasses` (`studentClassID`, `classID`, `studentID`) VALUES
(1, 1, 20),
(2, 3, 20),
(3, 5, 20),
(5, 8, 20),
(6, 10, 20),
(7, 16, 20),
(8, 15, 20),
(9, 5, 20),
(10, 5, 20),
(18, 33, 20),
(16, 28, 20),
(19, 33, 21);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Lname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `Fname`, `Lname`, `email`, `password`, `phone`) VALUES
(20, 'Hassan', 'Ismail', 'hassan.ismail@park-innovtion.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 78868973),
(21, 'Adel', 'Ismail', 'adel.ismail@park-innovtion.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 71496903);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacherName`, `password`, `email`) VALUES
(10, 'adham Ghanam', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'adham@park.com'),
(11, 'Samer Al Sayegh', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'samer@park.com'),
(12, 'Ahmad Bazzi', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'abazzi@park.com'),
(13, 'Alaa Ramadan', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', 'aramadan@park.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
