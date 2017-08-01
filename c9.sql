-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2017 at 09:13 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `Candidate`
--

CREATE TABLE IF NOT EXISTS `Candidate` (
  `CID` int(11) NOT NULL AUTO_INCREMENT,
  `PID` int(11) NOT NULL,
  `Cname` varchar(256) NOT NULL,
  `Picture` varchar(256) NOT NULL,
  PRIMARY KEY (`CID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Candidate`
--

INSERT INTO `Candidate` (`CID`, `PID`, `Cname`, `Picture`) VALUES
(1, 1, 'Head Boy 1', ''),
(2, 1, 'Head Boy 2', '');

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
  `PID` int(11) NOT NULL AUTO_INCREMENT,
  `Pname` varchar(256) NOT NULL,
  `Cname1` varchar(256) NOT NULL,
  `Cname2` varchar(256) NOT NULL,
  `Votes1` int(11) NOT NULL,
  `Votes2` int(11) NOT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`PID`, `Pname`, `Cname1`, `Cname2`, `Votes1`, `Votes2`) VALUES
(1, 'Head Boy', 'Head Boy Candidate 1', 'Head Boy Candidate 2', 13, 9),
(2, 'Head Girl', 'Head Girl Candidate 1', 'Head Girl Candidate 2', 9, 12),
(3, 'Cultural Secretary ', 'Cultural Secretary Candidate 1', 'Cultural Secretary Candidate 2', 14, 7),
(4, 'Assembly Monitor', 'Assembly Monitor Candidate 1', 'Assembly Monitor Candidate 2', 4, 14),
(5, 'Sports Captain', 'Sports Captain Candidate 1', 'Sports Captain Candidate 2', 1, 0),
(6, 'Deputy Cultural Secretary', 'Deputy Cultural Secretary Candidate 1', 'Deputy Cultural Secretary Candidate 2', 0, 1),
(7, 'Student Council', 'Student Council Candidate 1', 'Student Council Candidate 2', 0, 1),
(8, 'Deputy Student Council', 'Deputy Student Council Candidate 1', 'Deputy Student Council Candidate 2', 1, 0),
(9, 'Deputy Sports Captain', 'Deputy Sports Captain Candidate 1', 'Deputy Sports Captain Candidate 2', 0, 1),
(10, 'Community Service Secretary', 'Community Service Secretary Candidate 1', 'Community Service Secretary Candidate 2', 1, 0),
(11, 'Deputy Community Service Secretary', 'Deputy Community Service Secretary Candidate 1', 'Deputy Community Service Secretary Candidate 2', 1, 0),
(12, 'Deputy Assembly Monitor', 'Deputy Assembly Monitor Candidate 1', 'Deputy Assembly Monitor Candidate 2', 1, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
