-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2013 at 02:47 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myhealthpakege`
--
CREATE DATABASE IF NOT EXISTS `myhealthpakege` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `myhealthpakege`;

-- --------------------------------------------------------

--
-- Table structure for table `client_login`
--

CREATE TABLE IF NOT EXISTS `client_login` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_of_upload` int(11) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `client_login`
--


-- --------------------------------------------------------

--
-- Table structure for table `doctor_detail`
--

CREATE TABLE IF NOT EXISTS `doctor_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(70) NOT NULL,
  `security_q` varchar(35) NOT NULL,
  `security_a` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE IF NOT EXISTS `doctor_login` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_of_upload` int(11) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `doctor_login`
--
-- --------------------------------------------------------

--
-- Table structure for table `mydocs`
--

CREATE TABLE IF NOT EXISTS `mydocs` (
  `docs_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `img_name` varchar(55) NOT NULL,
  `details` longtext NOT NULL,
  `doc_date` date NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_phone` double NOT NULL,
  PRIMARY KEY (`docs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `mydocs`
--
-- --------------------------------------------------------

--
-- Table structure for table `tmp_table`
--

CREATE TABLE IF NOT EXISTS `tmp_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(70) NOT NULL,
  `security_q` varchar(35) NOT NULL,
  `security_a` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tmp_table`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
