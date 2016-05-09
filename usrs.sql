-- phpMyAdmin SQL Dump
-- version 4.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 09, 2016 at 11:56 PM
-- Server version: 5.5.38
-- PHP Version: 5.4.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u1207946`
--

-- --------------------------------------------------------

--
-- Table structure for table `usrs`
--

CREATE TABLE IF NOT EXISTS `usrs` (
`user_id` int(11) NOT NULL,
  `UserQuestionLevel` int(11) NOT NULL,
  `UserLevel` int(11) NOT NULL DEFAULT '1',
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `Username` text NOT NULL,
  `password` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InitialQuestion1` text NOT NULL,
  `InitialQuestion2` text NOT NULL,
  `InitialQuestion3` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `usrs`
--

INSERT INTO `usrs` (`user_id`, `UserQuestionLevel`, `UserLevel`, `first_name`, `last_name`, `email`, `Username`, `password`, `timestamp`, `InitialQuestion1`, `InitialQuestion2`, `InitialQuestion3`) VALUES
(1, 0, 1, 'Kevin', 'Kheddo', 'kevin.kheddo@hotmail.co.uk', 'Kevin', 'Kheddo', '2016-05-09 21:47:07', 'None', 'None', 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usrs`
--
ALTER TABLE `usrs`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usrs`
--
ALTER TABLE `usrs`
MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
