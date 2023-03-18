-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2022 at 05:53 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `sNo` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` char(20) NOT NULL,
  `lastName` char(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `sno` (`sNo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`sNo`, `firstName`, `lastName`, `email`, `password`) VALUES
(1, 'Sadam', 'Hussain', '1@gmail.com', 'Hello123');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `answer` varchar(40) NOT NULL,
  `ans_id` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `answer`, `ans_id`, `subject`) VALUES
(1, 'Small', 1, 'English'),
(2, 'Large', 1, 'English'),
(3, 'Intermediate', 1, 'English'),
(4, 'Low', 1, 'English'),
(5, 'Tiny', 2, 'English'),
(6, 'Low', 2, 'English'),
(7, 'Large', 2, 'English'),
(8, 'Big', 2, 'English'),
(9, '3', 3, 'English'),
(10, '4', 3, 'English'),
(11, '5', 3, 'English'),
(12, '6', 3, 'English'),
(13, 'Linear', 4, 'Maths'),
(14, 'Quadratic', 4, 'Maths'),
(15, 'bi-quadratic', 4, 'Maths'),
(16, 'Cubic', 4, 'Maths'),
(17, 'Linear', 5, 'Maths'),
(18, 'Quadratic', 5, 'Maths'),
(19, 'bi-quadratic', 5, 'Maths'),
(20, 'Cubic', 5, 'Maths'),
(21, '1', 6, 'Science'),
(22, '22', 6, 'Science'),
(23, '43', 6, 'Science'),
(24, '23', 6, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
CREATE TABLE IF NOT EXISTS `queries` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `message` varchar(300) NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`sno`, `email`, `name`, `message`) VALUES
(2, 'hu8@gmail.com', 'Sadam', 'Facing issue in registration.');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) NOT NULL,
  `question` varchar(100) NOT NULL,
  `ans_id` int(11) NOT NULL,
  PRIMARY KEY (`qid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `subject`, `question`, `ans_id`) VALUES
(1, 'English', 'Synonym of <b>big</b> is?', 2),
(2, 'English', 'Antonym of <b>small</b> is?', 8),
(3, 'English', 'a->1 b->2 c->', 9),
(4, 'Maths', 'ax^2 +bx +c is?', 14),
(5, 'Maths', 'ax^2 +bx +c is?', 18),
(6, 'Science', 'Abc =?', 23);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_users`
--

DROP TABLE IF EXISTS `quiz_users`;
CREATE TABLE IF NOT EXISTS `quiz_users` (
  `sNo` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `totalQuestions` int(11) NOT NULL,
  `questionsAttempted` int(10) NOT NULL,
  `correctAnswers` int(11) NOT NULL,
  `subject` varchar(20) NOT NULL,
  PRIMARY KEY (`sNo`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_users`
--

INSERT INTO `quiz_users` (`sNo`, `email`, `totalQuestions`, `questionsAttempted`, `correctAnswers`, `subject`) VALUES
(1, 'sadam@gmail.com', 3, 2, 0, 'html'),
(2, 'sadam@gmail.com', 3, 3, 3, 'html'),
(3, 'sadam@gmail.com', 2, 2, 1, 'Maths'),
(4, 'sadam@gmail.com', 2, 2, 2, 'Maths'),
(5, 'sadam@gmail.com', 2, 2, 2, 'Maths'),
(6, 'sadam@gmail.com', 3, 2, 0, 'html'),
(7, 'sadam@gmail.com', 3, 2, 1, 'Maths'),
(8, 'sadam@gmail.com', 3, 3, 3, 'Maths'),
(9, 'sadam@gmail.com', 3, 3, 0, 'Maths'),
(10, 'sadam@gmail.com', 2, 2, 1, 'English'),
(11, 'sadam@gmail.com', 2, 2, 2, 'English'),
(12, 'sadam@gmail.com', 3, 3, 2, 'English'),
(13, 'sadam@gmail.com', 3, 3, 3, 'English'),
(14, 'sadam@gmail.com', 1, 1, 1, 'Maths'),
(15, 'sadam@gmail.com', 3, 3, 0, 'English'),
(16, '1@gmail.com', 3, 3, 3, 'English'),
(17, 'john@gmail.com', 2, 1, 1, 'Maths'),
(18, '4@gmail.com', 3, 2, 1, 'English'),
(19, '4@gmail.com', 3, 3, 2, 'English'),
(20, '4@gmail.com', 1, 1, 0, 'Science'),
(21, '4@gmail.com', 1, 1, 1, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `sNo` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(20) NOT NULL,
  `topic` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL DEFAULT 'No remarks',
  PRIMARY KEY (`sNo`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`sNo`, `subject`, `topic`, `url`, `remarks`) VALUES
(1, 'Machine Learning', 'Neural Nets', 'https://wiki.com/', 'Material for unit test 1.'),
(2, 'English', 'Verb', 'https://google.com', 'Prepare within 2 days');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `sNo` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` char(15) NOT NULL,
  `lastName` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'not_verified',
  PRIMARY KEY (`email`),
  UNIQUE KEY `sNo` (`sNo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`sNo`, `firstName`, `lastName`, `email`, `gender`, `address`, `city`, `state`, `zip`, `password`, `status`) VALUES
(1, 'sadam', 'sadam', '1@gmail.com', 'Male', 'abcd', '1', '1', '1', 'Hello123', 'verified'),
(2, 'sadam', 'sadam', '2@gmail.com', 'Male', 'abcd', '1', '1', '1', 'Hello123', 'verified'),
(3, 'John', 'Doe', 'john@gmail.com', 'M', 'New York', 'California', 'California', '234567', 'john123', 'verified'),
(4, 'sadam', 'hussain', '4@gmail.com', 'M', 'bvchvhc', 'mcnsd', 'New York', 't76476', 'Hello@123', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `sno` (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`sno`, `email`) VALUES
(1, 'abc@gmail.com'),
(2, 'helo@gmail.vom');

-- --------------------------------------------------------

--
-- Table structure for table `tutors`
--

DROP TABLE IF EXISTS `tutors`;
CREATE TABLE IF NOT EXISTS `tutors` (
  `sNo` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` char(15) NOT NULL,
  `lastName` char(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(2) NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `zip` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'not_verified',
  PRIMARY KEY (`email`),
  UNIQUE KEY `sNo` (`sNo`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutors`
--

INSERT INTO `tutors` (`sNo`, `firstName`, `lastName`, `email`, `gender`, `address`, `city`, `state`, `zip`, `password`, `status`) VALUES
(3, '3', '3', '3@gmail.com', '3', '3', '3', '3', '3', '3', 'verified'),
(1, '1', '1', '1', '1', '1', '1', '1', '1', '1', 'verified'),
(2, 'Sadam', '1', '2', '1', '1', '1', '1', '1', '1', 'verified');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
