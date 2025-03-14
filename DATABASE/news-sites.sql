-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 26, 2021 at 05:35 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-sites`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(39, 'Sports', 1),
(40, 'Poltices', 2),
(41, 'Entertainment', 2),
(42, 'Education', 2),
(45, 'Business', 2),
(44, 'Transports', 2),
(46, 'Bad', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL,
  PRIMARY KEY (`post_id`),
  UNIQUE KEY `post_id` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(60, 'Railway', 'Muzaffarpur Junction', '44', 'Fri Oct, 2021', 38, 'tra.jpg'),
(75, 'Bollyhood', 'Amir Khan', '41', '30 Oct, 2021', 35, '1635576740-ent.jpg'),
(72, 'Cricket', 'Virat Kholi', '39', '30 Oct, 2021', 38, '1635575950-spo.jpg'),
(77, 'abc', '                    abc                ', '45', '02 Nov, 2021', 35, '1635831256-1580696078-business.jpg'),
(79, 'ghj', '                    ghj                ', '42', '02 Nov, 2021', 35, '1635833614-edu.jpg'),
(80, 'qwer', 'qwer', '45', '02 Nov, 2021', 35, '1635833670-pol.jpg'),
(81, 'sdf', '                    asdfrt                ', '44', '02 Nov, 2021', 35, '1635833704-bus.jpg'),
(82, 'game', '                    the goog game                ', '40', '05 Nov, 2021', 35, '1637135858-1.jpg'),
(83, 'good boy', '                                        Static Friction\r\nï‚· The force required to overcome friction at the instant an object starts moving from rest is the measure\r\nof static friction.\r\nSliding Friction\r\nï‚· The force required to keep an object moving with the same speed is the measure of sliding friction.\r\nï‚· Sliding friction is always lesser than static friction.\r\nRolling Friction\r\nï‚· The frictional force which comes into action when an object rolls over a surface is called rolling friction.\r\nï‚· This force slows down the motion of a rolling object.                                ', '41', '05 Nov, 2021', 28, '1636112074-1.png'),
(84, 'Bad Girl', 'Static Friction\r\nï‚· The force required to overcome friction at the instant an object starts moving from rest is the measure\r\nof static friction.\r\nSliding Friction\r\nï‚· The force required to keep an object moving with the same speed is the measure of sliding friction.\r\nï‚· Sliding friction is always lesser than static friction.\r\nRolling Friction\r\nï‚· The frictional force which comes into action when an object rolls over a surface is called rolling friction.\r\nï‚· This force slows down the motion of a rolling object.', '42', '05 Nov, 2021', 28, '1636111836-3.png'),
(85, 'tt', 'tt', '46', '05 Nov, 2021', 28, '1636112844-Hindi.png'),
(86, 'ttt', 'ttt', '46', '05 Nov, 2021', 28, '1636112881-1.jpg'),
(87, 'juh', 'hjgj', '40', '05 Nov, 2021', 28, '1636112932-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `website_name` varchar(50) NOT NULL,
  `logo` varchar(60) NOT NULL,
  `footer_desc` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`website_name`, `logo`, `footer_desc`) VALUES
('News', 'news.jpg', 'Copyright 2021 News | Powered by<b> <a href = \"https://www.examtube.in\">examtube</a></b>');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(37, 'Mukesh', 'Sha', 'mukesh', '256d23ebdfeb388c10a3019a2c223ca5c90edfcc', 1),
(26, 'Rakesh ', 'Singh', 'rakesh', '3fd99be3a75d8c9d22adb22bc769361dcf768f6f', 1),
(28, 'Ram', 'Raj', 'ram', '77c7960e890deddebb7ff2e55e340d2ed1708368', 0),
(38, 'Abhishek', 'Rajput', 'abhishek', '0731fdeb307910eeaae4e58897b7baaba45e054b', 0),
(35, 'Nityanand', 'jha', 'nityanand', '910f1fa42c12526c76672b8d19a308fae610bc54', 1),
(36, 'Rohan', 'Rana', 'rohan', '9671c73253cee9b18b8df367e3e627fab2863fe8', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
