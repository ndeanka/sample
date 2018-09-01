-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2016 at 08:14 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentdetail`
--

CREATE TABLE IF NOT EXISTS `studentdetail` (
`id` int(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `date1` varchar(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `disability` varchar(20) NOT NULL,
  `coment` text NOT NULL,
  `kinfirstname` varchar(100) NOT NULL,
  `kinlastname` varchar(100) NOT NULL,
  `kingender` varchar(20) NOT NULL,
  `kinphone` varchar(20) NOT NULL,
  `kinemail` varchar(50) NOT NULL,
  `kinaddress` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentdetail`
--

INSERT INTO `studentdetail` (`id`, `student_id`, `firstname`, `lastname`, `gender`, `date1`, `region`, `disability`, `coment`, `kinfirstname`, `kinlastname`, `kingender`, `kinphone`, `kinemail`, `kinaddress`) VALUES
(23, '3', 'soph', 'zuberi', 'female', '1982-10-12', 'Kigoma', 'no', '', 'Sadaa', 'Zuberi', 'male', '0714898989', 'szuberi@yahoo.com', 'Dar es Salaam'),
(24, '4', 'Didas', 'Mgimwa', 'male', '1990-10-21', 'Dar-es-Salaam', 'yes', 'msumbufu', 'Willy', 'Martin', 'male', '0713903936', 'wmartin@gmail.com', 'Kilimanjaro');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `status`) VALUES
(1, 'Willy', '12345', 'admin'),
(3, 'Soph', '1234', 'student'),
(4, 'Mgimwa', '1234', 'student'),
(5, 'Sanja', '1234', 'student'),
(6, 'Muba', '1234', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentdetail`
--
ALTER TABLE `studentdetail`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `studentdetail`
--
ALTER TABLE `studentdetail`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
