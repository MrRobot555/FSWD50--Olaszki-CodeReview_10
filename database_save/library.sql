-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2018 at 04:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--
CREATE DATABASE IF NOT EXISTS `library` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `library`;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_ID`, `name`, `surname`) VALUES
(1, 'Michael', 'Jackson'),
(2, 'George', 'Michael'),
(3, 'Janet', 'Jackson'),
(4, 'Paul', 'McCartney'),
(5, 'Lady', 'Gaga'),
(6, 'Simply Red', ''),
(7, 'Deep Purple', ''),
(8, 'David', 'Getta');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_ID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `ISBN` bigint(13) NOT NULL,
  `short_description` varchar(300) NOT NULL,
  `publish_date` date NOT NULL,
  `publisher_ID` int(10) DEFAULT NULL,
  `author_ID` int(10) DEFAULT NULL,
  `type_ID` tinyint(4) DEFAULT NULL,
  `available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`media_ID`, `title`, `image`, `ISBN`, `short_description`, `publish_date`, `publisher_ID`, `author_ID`, `type_ID`, `available`) VALUES
(2, 'Amazing', 'http://www.image.com/edwe.jpg', 4627462746248, 'Amazing maxi', '1980-11-22', 1, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_type`
--

CREATE TABLE `media_type` (
  `type_ID` tinyint(4) NOT NULL,
  `type` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media_type`
--

INSERT INTO `media_type` (`type_ID`, `type`) VALUES
(1, 'book'),
(2, 'CD'),
(3, 'DVD');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_ID` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `str_address` varchar(50) NOT NULL,
  `ZIP_code` varchar(8) NOT NULL,
  `size_ID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_ID`, `name`, `str_address`, `ZIP_code`, `size_ID`) VALUES
(1, 'Sony Music Entertainment', '25 Madison Avenue', '1120', 3),
(2, 'Budapest Records', '28. Beke Korut', '1001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `publisher_size`
--

CREATE TABLE `publisher_size` (
  `size_ID` tinyint(4) NOT NULL,
  `size` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher_size`
--

INSERT INTO `publisher_size` (`size_ID`, `size`) VALUES
(1, 'small'),
(2, 'medium'),
(3, 'big');

-- --------------------------------------------------------

--
-- Table structure for table `zip`
--

CREATE TABLE `zip` (
  `ZIP_code` varchar(8) NOT NULL,
  `city` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zip`
--

INSERT INTO `zip` (`ZIP_code`, `city`) VALUES
('', ''),
('1001', 'Budapest'),
('1120', 'Vienna'),
('3100', 'Salgotarjan'),
('9330', 'Kapuvar'),
('9400', 'Sopron');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_ID`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`media_ID`),
  ADD KEY `author_ID` (`author_ID`),
  ADD KEY `publish_ID` (`publisher_ID`),
  ADD KEY `type_ID` (`type_ID`);

--
-- Indexes for table `media_type`
--
ALTER TABLE `media_type`
  ADD PRIMARY KEY (`type_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_ID`),
  ADD KEY `ZIP_code` (`ZIP_code`),
  ADD KEY `size_ID` (`size_ID`);

--
-- Indexes for table `publisher_size`
--
ALTER TABLE `publisher_size`
  ADD PRIMARY KEY (`size_ID`),
  ADD KEY `size_ID` (`size_ID`);

--
-- Indexes for table `zip`
--
ALTER TABLE `zip`
  ADD PRIMARY KEY (`ZIP_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `media_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_ibfk_1` FOREIGN KEY (`author_ID`) REFERENCES `author` (`author_ID`),
  ADD CONSTRAINT `media_ibfk_2` FOREIGN KEY (`publisher_ID`) REFERENCES `publisher` (`publisher_ID`),
  ADD CONSTRAINT `media_ibfk_3` FOREIGN KEY (`type_ID`) REFERENCES `media_type` (`type_ID`);

--
-- Constraints for table `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`ZIP_code`) REFERENCES `zip` (`ZIP_code`),
  ADD CONSTRAINT `publisher_ibfk_2` FOREIGN KEY (`size_ID`) REFERENCES `publisher_size` (`size_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
