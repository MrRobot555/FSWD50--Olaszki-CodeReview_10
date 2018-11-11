-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2018 at 04:29 PM
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
(8, 'David', 'Getta'),
(9, 'Madonna', ''),
(10, 'Sade', ''),
(11, 'Pet Shop Boys', ''),
(12, 'Snoop Dogg', ''),
(13, 'The Weeknd', ''),
(14, 'Depeche Mode', ''),
(15, 'Queen', ''),
(16, 'Freddie', 'Mercury'),
(17, 'Savage Garden', ''),
(18, 'Duft Punk', ''),
(19, 'Stevie', 'Wonder'),
(20, 'Stephen', 'King'),
(21, 'Justin', 'Timberlake'),
(22, 'John', 'Grisham');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `media_ID` int(10) NOT NULL,
  `title` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `image` varchar(50) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `ISBN` varchar(13) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `short_description` varchar(2000) CHARACTER SET utf16 COLLATE utf16_hungarian_ci NOT NULL,
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
(2, 'Amazing', './img/6.png', '6278243294985', 'Three versions of the song. After his death I wanted a few items in my Amazon collection that I had when I was younger and Wham! was new. I remembered this from his later years and hearing it really cheered me up. As a fan you would know this was at one of the few truly happy & content times in his life and remembering that makes the sting of missing him just a little less.', '2004-04-25', 1, 2, 2, 1),
(3, 'Elevation', './img/1.png', '5843ö95743889', 'Set in the fictional town of Castle Rock, Maine\r\n\r\nThe latest from legendary master storyteller Stephen King, a riveting, extraordinarily eerie, and moving story about a man whose mysterious affliction brings a small town together—a timely, upbeat tale about finding common ground despite deep-rooted differences. \r\n\r\nAlthough Scott Carey doesn’t look any different, he’s been steadily losing weight. There are a couple of other odd things, too. He weighs the same in his clothes and out of them, no ', '2018-01-01', 11, 20, 1, 1),
(4, 'The Outsider', './img/2.png', '687234294234', 'NEW YORK TIMES BESTSELLER\r\n\r\nAn unspeakable crime. A confounding investigation. At a time when the King brand has never been stronger, he has delivered one of his most unsettling and compulsively readable stories.\r\n\r\nAn eleven-year-old boy’s violated corpse is found in a town park. Eyewitnesses and fingerprints point unmistakably to one of Flint City’s most popular citizens. He is Terry Maitland, Little League coach, English teacher, husband, and father of two girls. Detective Ralph Anderson...', '2018-05-01', 11, 20, 1, 1),
(5, 'Sleeping Beauties: A Novel', './img/3.png', '8927842388443', '#1 NEW YORK TIMES BESTSELLER\r\n\r\nIn this spectacular father/son collaboration, Stephen King and Owen King tell the highest of high-stakes stories: what might happen if women disappeared from the world of men?\r\n\r\nIn a future so real and near it might be now, something happens when women go to sleep: they become shrouded in a cocoon-like gauze. If they are awakened, if the gauze wrapping their bodies is disturbed or violated, the women become feral and spectacularly violent. And while they sleep th', '2017-09-01', 11, 20, 1, 1),
(6, 'IT', './img/4.png', '65745793453', 'Now a major motion picture\r\nStephen King’s terrifying, classic #1 New York Times bestseller, “a landmark in American literature” (Chicago Sun-Times)—about seven adults who return to their hometown to confront a nightmare they had first stumbled on as teenagers…an evil without a name: It.\r\n\r\nWelcome to Derry, Maine. It’s a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real.\r\n\r\nThey were seven teenagers when they first stumbled upon the horror. Now ', '2017-08-01', 11, 20, 1, 1),
(7, 'Ray of Light', './img/8.jpg', '74583794334', 'I already had all of Madonna\'s albums on CD when I purchased this compilation so I really only bought it because it contains 2 songs which were only released as singles and 2 new songs. It\'s still nice, however, to have all of her greatest hits in one place, even if you are a hardcore fan who has all of her albums. For non-hardcore fans who want to taste the milk without having to buy the whole cow this is a truly spectacular compilation despite a few drawbacks as mentioned in other reviews.', '2009-09-18', 12, 9, 2, 1),
(8, '4 Minutes', './img/9.jpg', '6781501163401', '$8.99\r\nStart your 30-day free trial of Unlimited to listen to this album plus tens of millions more songs. Exclusive Prime pricing.  \r\n$8.99 to buy', '2009-08-11', 12, 9, 2, 1),
(10, 'FutureSex/LoveSounds [Explicit] (Bonus Track)', './img/10.jpg', 'B001HT4YXC', 'Every track is awesome and has the pure ability to put you in a better mood even the break-up riffs of \"What Comes Around Goes Around..\". Even though it was released in 2006 (yep, you heard right this album is approaching its 7th anniversary)\r\n', '2006-09-12', 1, 21, 2, 1),
(14, 'The Reckoning', './img/11.jpg', '0385544154', '#1 bestselling author John Grishamâ€™s The Reckoning is his most powerful, surprising, and suspenseful thriller yet.\r\n \r\nâ€œA murder mystery, a courtroom drama, a family sagaâ€¦The Reckoning is Grisham\'s argument that he\'s not just a boilerplate thriller writer. Most jurors will think the counselor has made his case.â€\r\nâ€”USA Today\r\n \r\n October 1946, Clanton, Mississippi\r\n\r\nPete Banning was Clanton, Mississippiâ€™s favorite sonâ€”a decorated World War II hero, the patriarch of a prominent family, a farmer, father, neighbor, and a faithful member of the Methodist church. Then one cool October morning he rose early, drove into town, and committed a shocking crime.  Pete\'s only statement about itâ€”to the sheriff, to his lawyers, to the judge, to the jury, and to his familyâ€”was: \"I have nothing to say.\" He was not afraid of death and was willing to take his motive to the grave.\r\n           \r\nIn a major novel unlike anything he has written before, John Grisham takes us on an incredible journey, from the Jim Crow South to the jungles of the Philippines during World War II; from an insane asylum filled with secrets to the Clanton courtroom where Peteâ€™s defense attorney tries desperately to save him. \r\n\r\nReminiscent of the finest tradition of Southern Gothic storytelling, The Reckoning would not be complete without Grishamâ€™s signature layers of legal suspense, and he delivers on every page.', '2018-10-23', 13, 22, 1, 1);

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
(2, 'Budapest Records', '28. Beke Korut', '1001', 2),
(3, 'Universal Music Investments, Inc.', '2220 Colorado Ave', 'CA 90404', 3),
(4, 'Studio Fontana spol. s r.o.', 'V PodvrÅ¡Ã­ 1', '182 00', 2),
(5, 'Warner Music Group', '1633 Broadway', '10019', 3),
(6, 'Artist Publishing Group', '1635 N. Cahuenga Blvd., 2nd floor', '90028', 1),
(7, 'Arthouse Entertainment', 'P.O. Box 3900', '90078', 1),
(8, 'Imagem Music', '229 West 28 St., 11th Floor', '10001', 1),
(9, 'Notting Hill Music', '15 Tileyard Studio', 'N79AH', 1),
(10, 'Word Music Publishing', '25 Music Square West', '37203', 1),
(11, 'Simon & Schuster, Inc.', '1230 Avenue of the Americas', '10020', 2),
(12, 'Warner Bros. Entertainment Inc.', '4000 Warner Boulevard', '91522', 3),
(13, 'Penguin Random House LLC', '1745 Broadway', '10019', 2);

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
('10001', 'New York'),
('1001', 'Budapest'),
('10019', 'New York'),
('10020', 'New York'),
('1120', 'Vienna'),
('182 00', 'Praha'),
('3100', 'Salgotarjan'),
('37203', 'Nashville'),
('90028', 'Los Angeles'),
('90078', 'Hollywood'),
('91522', 'Burbank'),
('9330', 'Kapuvar'),
('9400', 'Sopron'),
('CA 90404', 'Santa Monica'),
('N79AH', 'London');

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
  MODIFY `media_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
