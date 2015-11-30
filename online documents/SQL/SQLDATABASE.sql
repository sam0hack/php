-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2015 at 03:47 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myhealthpackage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat`) VALUES
(1, 'General ward'),
(2, 'Semi private'),
(3, 'Private'),
(4, 'Emergency'),
(5, 'Deluxe'),
(6, 'OPD'),
(8, 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `client_login`
--

CREATE TABLE IF NOT EXISTS `client_login` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_of_upload` int(11) NOT NULL,
  `con_id` varchar(55) NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `client_login`
--

INSERT INTO `client_login` (`client_id`, `username`, `password`, `no_of_upload`, `con_id`) VALUES
(1, 'sam.nyx@live.com', 'sam', 36, ''),
(2, 'mohsin@ilmtechlab.com', 'TCSXISJI', 0, '5xlGpkvSMrZNyiMlijW8rDDJH2Gqsr3pKhVzslN08HmYpZdZe4xvB4'),
(3, 'test@tst.com', 'PXOGZQOX', -1, 'I5VW9Tn02fItAXlnuE5TL3v9xHHW1yteWK2V7jvyP7npWz8l720JxU'),
(4, 'email@gmail.com', 'SZGEMVSQ', 0, 'H6TTEPuzTE9MK12YopOSknFCmNH5H8qo3dc0uxyi2ZUftQ8eBmVM23');

-- --------------------------------------------------------

--
-- Table structure for table `contact_toDoc`
--

CREATE TABLE IF NOT EXISTS `contact_toDoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `email` varchar(55) NOT NULL,
  `phone` varchar(22) NOT NULL,
  `message` longtext NOT NULL,
  `doc_id` varchar(26) NOT NULL,
  `procedure` varchar(99) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact_toDoc`
--

INSERT INTO `contact_toDoc` (`id`, `name`, `email`, `phone`, `message`, `doc_id`, `procedure`) VALUES
(1, 'sameer khan', 'sam.nyx@live.com', '888888', 'llldldldl', 'doctor@doctor.com', '9');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_detail`
--

CREATE TABLE IF NOT EXISTS `doctor_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_q` varchar(35) NOT NULL,
  `security_a` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastname` varchar(22) NOT NULL,
  `address` longtext NOT NULL,
  `gender` varchar(8) NOT NULL,
  `speciality` varchar(55) NOT NULL,
  `department` varchar(55) NOT NULL,
  `facebook` varchar(222) NOT NULL,
  `twitter` varchar(222) NOT NULL,
  `linkedin` varchar(222) NOT NULL,
  `googleplus` varchar(222) NOT NULL,
  `myweb` varchar(220) NOT NULL,
  `myclinic` varchar(220) NOT NULL,
  `city` varchar(58) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doctor_detail`
--

INSERT INTO `doctor_detail` (`id`, `pic`, `name`, `email`, `phone`, `password`, `security_q`, `security_a`, `status`, `lastname`, `address`, `gender`, `speciality`, `department`, `facebook`, `twitter`, `linkedin`, `googleplus`, `myweb`, `myclinic`, `city`) VALUES
(1, 'mydocs/doctor@doctor.com/profile//logo.png', 'sameer', 'doctor@doctor.com', 8744883682, 'doctor', '', '', 1, 'khan', 'noida', 'Male', 'General surgery ', 'IT', 'http://facebook.com/', 'http://twitter.com', 'http://linkedin.com', '', 'http://.google.com/sam0hack', 'http://entnoida.com', ''),
(2, 'NULL', 'anand', 'google@google.com', 8744883682, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'What was your childhood nickname', 'oskdok', 1, 'ee', 'NULL', 'Male', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', ''),
(3, 'mydocs/josh@gmail.com/profile//ace_one_piece-wallpaper-1366x768.jpg', 'Josheph', 'josh@gmail.com', 8744883682, '123456', 'What was your childhood nickname', 'johnny', 1, '', 'NULL', 'Male', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', '', '', ''),
(4, 'NULL', 'jay', 'jay@sharma.com', 8744883682, '123456', 'What was your childhood nickname', 'jay', 1, 'sharma', 'NULL', 'Male', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'NULL', 'noida');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_login`
--

CREATE TABLE IF NOT EXISTS `doctor_login` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `no_of_upload` int(11) NOT NULL,
  `con_id` varchar(22) NOT NULL,
  PRIMARY KEY (`doc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doctor_login`
--

INSERT INTO `doctor_login` (`doc_id`, `username`, `password`, `no_of_upload`, `con_id`) VALUES
(1, 'doctor@doctor.com', 'doctor', 21, '1'),
(2, 'google@google.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, '2706Frst22G0psCp917p'),
(3, 'josh@gmail.com', '123456', 0, 'p4nFB2nmj215r4G1BB65'),
(4, 'jay@sharma.com', '123456', 3, '0E9onmlsC7tqE96q2E6p');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_search_count`
--

CREATE TABLE IF NOT EXISTS `doctor_search_count` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc` varchar(111) NOT NULL,
  `date` date NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `doctor_search_count`
--

INSERT INTO `doctor_search_count` (`id`, `doc`, `date`, `count`) VALUES
(1, 'doctor@doctor.com', '2014-11-10', 23),
(2, '', '2014-11-10', 16),
(3, 'josh@gmail.com', '2014-11-10', 1),
(4, 'jay@sharma.com', '2015-11-24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `main_keyid` int(11) NOT NULL,
  `keywords` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `keywords`
--

INSERT INTO `keywords` (`id`, `main_keyid`, `keywords`, `status`) VALUES
(1, 1, 'Apple', 0),
(2, 1, 'Orange', 0),
(3, 1, 'Mango', 0),
(4, 1, 'pineapple', 0),
(5, 2, 'facebook', 0),
(6, 2, 'Gmail', 0),
(7, 2, 'twitter', 0),
(8, 2, 'linked-in', 0),
(9, 3, 'Pizza', 0),
(10, 3, 'burger', 0),
(11, 3, 'french fries', 0),
(12, 4, 'The fault in our stars', 0),
(13, 5, 'Osteoarthritis', 0),
(14, 5, 'Knee replacement', 0),
(15, 5, 'Hip replacement', 0),
(16, 4, 'and the mountains echo', 0),
(17, 4, 'die heart', 0),
(18, 4, 'once a while', 0),
(19, 4, 'the secret', 0),
(20, 4, 'Another world', 0),
(21, 4, 'The time machine', 0),
(22, 6, 'sinus surgery', 0),
(25, 5, 'knee fracture', 0),
(26, 5, 'sdsd', 0),
(27, 6, 'knee fracture', 0),
(28, 5, 'ldldldll', 0),
(29, 5, 'ssllsls', 0),
(30, 5, 'hip fracture', 0),
(31, 3, 'popcorn', 0),
(32, 3, 'pop candy ', 0),
(33, 3, 'pop candy2', 0),
(34, 3, 'pop candy404', 0),
(35, 6, 'abc', 1),
(36, 2, 'abc', 0),
(37, 3, 'abc', 0),
(38, 3, '181', 0),
(39, 3, 'xyz', 0),
(40, 5, 'knee pain', 0),
(41, 2, 'tablets', 0),
(42, 2, 'smartphone', 0),
(43, 6, 'hello', 0),
(44, 7, 'knee fracture', 0),
(45, 7, 'abc', 0),
(46, 7, 'sonu', 0),
(47, 8, 'test1', 0),
(48, 8, 'sdsd', 0),
(49, 6, 'word', 0);

-- --------------------------------------------------------

--
-- Table structure for table `linked_data`
--

CREATE TABLE IF NOT EXISTS `linked_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(55) NOT NULL,
  `location` varchar(255) NOT NULL,
  `curent_folder` varchar(255) NOT NULL,
  `cat` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `linked_data`
--

INSERT INTO `linked_data` (`id`, `user_id`, `location`, `curent_folder`, `cat`) VALUES
(12, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/5/93229.jpg', 'mydocs/doctor@doctor.com/5', 'ashe'),
(13, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/5/ashe_the_frost_archer___league_of_legends-wallpaper-1366x768.jpg', 'mydocs/doctor@doctor.com/5', 'ashe'),
(14, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/5/1836105.jpg', 'mydocs/doctor@doctor.com/5', 'ashe'),
(15, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/5/10353174_10152435411006840_7463565351491682036_n.jpg', 'mydocs/doctor@doctor.com/5', 'ashe'),
(16, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/5/10390112_10152526766708328_2070543616061243130_n.jpg', 'mydocs/doctor@doctor.com/5', 'ashe'),
(27, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/8/15720-tron--sci-fi-futuristic.png', 'mydocs/doctor@doctor.com/8', ''),
(28, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/8/93229.jpg', 'mydocs/doctor@doctor.com/8', ''),
(29, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/8/1836105.jpg', 'mydocs/doctor@doctor.com/8', ''),
(31, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/9/funny_cat_5-wallpaper-1366x768.jpg', 'mydocs/doctor@doctor.com/9', 'cats'),
(32, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/11/312ClaireParlour.jpg', 'mydocs/doctor@doctor.com/11', 'Prescription'),
(33, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/11/20100330-lostkim.jpg', 'mydocs/doctor@doctor.com/11', 'Prescription'),
(34, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/11/elizabeth-mitchell.jpg', 'mydocs/doctor@doctor.com/11', 'Prescription'),
(35, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/11/elizabeth-mitchell-02.jpg', 'mydocs/doctor@doctor.com/11', 'Prescription'),
(36, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/11/Elizabeth Mitchell22.jpg', 'mydocs/doctor@doctor.com/11', 'Prescription'),
(37, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/12/lost_yunjin_kim_sun_kwon_dvdbash_3861.jpg', 'mydocs/doctor@doctor.com/12', 'Prescription'),
(38, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/13/LostPoster.jpg', 'mydocs/doctor@doctor.com/13', 'Prescription'),
(39, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/14/Emilie_de_Ravin_in_Lost_TV_Series_Wallpaper_1148562017.jpg', 'mydocs/doctor@doctor.com/14', 'Prescription'),
(40, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/15/Elizabeth-Mitchell-elizabeth-mitchell-19118476-1920-1200.jpg', 'mydocs/doctor@doctor.com/15', 'Prescription'),
(41, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/17/Elizabeth-Mitchell1.jpg', 'mydocs/doctor@doctor.com/17', 'Prescription'),
(42, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/18/LostPoster.jpg', 'mydocs/doctor@doctor.com/18', 'Prescription'),
(43, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/19/elizabethmitchellemmyma.jpg', 'mydocs/doctor@doctor.com/19', 'mo'),
(44, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/20/Lost-lost-747767_1280_1024.jpg', 'mydocs/doctor@doctor.com/20', 'Prescription'),
(45, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/23/1836105.jpg', 'mydocs/doctor@doctor.com/23', 'Prescription'),
(46, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/24/idnmC7UfcqGo.jpg', 'mydocs/doctor@doctor.com/24', 'pressc'),
(47, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/24/images.jpeg', 'mydocs/doctor@doctor.com/24', 'pressc'),
(48, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/24/images.jpg', 'mydocs/doctor@doctor.com/24', 'pressc'),
(49, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/24/IT-Average-Salaries-Around-The-Globe-Web-Developer.jpg', 'mydocs/doctor@doctor.com/24', 'pressc'),
(50, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/24/kakashi-wallpaper-1366x768.jpg', 'mydocs/doctor@doctor.com/24', 'pressc'),
(51, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/25/1.jpg', 'mydocs/doctor@doctor.com/25', 'nio'),
(52, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/25/01.jpg', 'mydocs/doctor@doctor.com/25', 'nio'),
(53, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/25/2.jpg', 'mydocs/doctor@doctor.com/25', 'nio'),
(54, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/25/02.jpg', 'mydocs/doctor@doctor.com/25', 'nio'),
(55, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/25/03.jpg', 'mydocs/doctor@doctor.com/25', 'nio'),
(56, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/26/anime-girl-212.jpg', 'mydocs/doctor@doctor.com/26', 'Prescription'),
(57, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/26/anime-manga_00356396.jpg', 'mydocs/doctor@doctor.com/26', 'Prescription'),
(58, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/26/anime-manga_00414524.jpg', 'mydocs/doctor@doctor.com/26', 'Prescription'),
(59, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/26/anime_wallpaper_black_white_love.jpg', 'mydocs/doctor@doctor.com/26', 'Prescription'),
(60, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/26/anime_wallpaper_reach.jpg', 'mydocs/doctor@doctor.com/26', 'Prescription'),
(61, '', 'mydocs/clients/sam.nyx@live.com/27/06.jpg', 'mydocs/clients/sam.nyx@live.com/27', ''),
(62, '', 'mydocs/clients/sam.nyx@live.com/27/07.jpg', 'mydocs/clients/sam.nyx@live.com/27', ''),
(63, '', 'mydocs/clients/sam.nyx@live.com/27/1920-1200-anime-wallpaper-hd-background-manga-full-japanese-cute7.png', 'mydocs/clients/sam.nyx@live.com/27', ''),
(64, '', 'mydocs/clients/sam.nyx@live.com/27/1920-1200-anime-wallpaper-hd-background-manga-full-japanese-cute11.jpg', 'mydocs/clients/sam.nyx@live.com/27', ''),
(65, '', 'mydocs/clients/sam.nyx@live.com/27/1920x1080.jpg', 'mydocs/clients/sam.nyx@live.com/27', ''),
(66, '', 'mydocs/clients/sam.nyx@live.com/28/WP0032-01-2560x1600.jpg', 'mydocs/clients/sam.nyx@live.com/28', 'Prescription'),
(67, '', 'mydocs/clients/sam.nyx@live.com/28/WP0032-02-2096x1080.jpg', 'mydocs/clients/sam.nyx@live.com/28', 'Prescription'),
(68, '', 'mydocs/clients/sam.nyx@live.com/28/WP0033-04-1920x1200.jpg', 'mydocs/clients/sam.nyx@live.com/28', 'Prescription'),
(69, '', 'mydocs/clients/sam.nyx@live.com/28/WP0034-04-4961x3508.jpg', 'mydocs/clients/sam.nyx@live.com/28', 'Prescription'),
(70, '', 'mydocs/clients/sam.nyx@live.com/28/WP0037-04-2500x1600.jpg', 'mydocs/clients/sam.nyx@live.com/28', 'Prescription'),
(71, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/29/1.jpg', 'mydocs/doctor@doctor.com/29', 'Prescription'),
(74, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/34/01_Android-all-versions.jpg', 'mydocs/doctor@doctor.com/34', 'Prescription'),
(75, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/38/blog6.jpg', 'mydocs/doctor@doctor.com/38', 'Prescription'),
(76, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/39/01.png', 'mydocs/clients/sam.nyx@live.com/39', 'Prescription'),
(77, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/39/02.png', 'mydocs/clients/sam.nyx@live.com/39', 'Prescription'),
(78, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/39/02A.jpg', 'mydocs/clients/sam.nyx@live.com/39', 'Prescription'),
(79, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/40/01.png', 'mydocs/clients/sam.nyx@live.com/40', 'Prescription'),
(80, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/40/02.png', 'mydocs/clients/sam.nyx@live.com/40', 'Prescription'),
(81, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/40/02A.jpg', 'mydocs/clients/sam.nyx@live.com/40', 'Prescription'),
(82, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/41/WWW.YTS.RE.jpg', 'mydocs/clients/sam.nyx@live.com/41', 'test'),
(83, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/42/yuna-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/42', 'Prescription'),
(84, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/42/world_cup_2014-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/42', 'Prescription'),
(85, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/42/tumblr_n7u579r2821sfevmio1_1280.png', 'mydocs/clients/sam.nyx@live.com/42', 'Prescription'),
(86, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/42/tumblr_n7euvnMN901s4ddyqo1_1280.jpg', 'mydocs/clients/sam.nyx@live.com/42', 'Prescription'),
(87, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/42/top-success-quote_14044-4.png', 'mydocs/clients/sam.nyx@live.com/42', 'Prescription'),
(88, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/43/you_are_being_monitored-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/43', 'Prescription'),
(89, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/43/women_humor_funny-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/43', 'Prescription'),
(90, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/43/wink-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/43', 'Prescription'),
(91, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/43/upside_down_4-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/43', 'Prescription'),
(92, 'sam.nyx@live.com', 'mydocs/clients/sam.nyx@live.com/43/twitter_colorful_birds-wallpaper-1366x768.jpg', 'mydocs/clients/sam.nyx@live.com/43', 'Prescription'),
(93, 'josh@gmail.com', 'mydocs/josh@gmail.com/44/sniper_2-wallpaper-1366x768.jpg', 'mydocs/josh@gmail.com/44', 'Prescription'),
(94, 'josh@gmail.com', 'mydocs/josh@gmail.com/44/skyrim_logo-wallpaper-1366x768.jpg', 'mydocs/josh@gmail.com/44', 'Prescription'),
(99, 'jay@sharma.com', 'mydocs/jay@sharma.com/53/Elizabeth Mitchell22.jpg', 'mydocs/jay@sharma.com/53', 'Prescription'),
(100, 'jay@sharma.com', 'mydocs/jay@sharma.com/54/312ClaireParlour.jpg', 'mydocs/jay@sharma.com/54', 'Prescription'),
(101, 'jay@sharma.com', 'mydocs/jay@sharma.com/55/susan.jpg', 'mydocs/jay@sharma.com/55', 'Prescription'),
(102, 'jay@sharma.com', 'mydocs/jay@sharma.com/56/caroline.jpg', 'mydocs/jay@sharma.com/56', 'Prescription'),
(103, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/57/vonnie.jpg', 'mydocs/doctor@doctor.com/57', 'Prescription'),
(104, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/57/vonda.jpg', 'mydocs/doctor@doctor.com/57', 'Prescription'),
(105, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/57/vivienne.jpg', 'mydocs/doctor@doctor.com/57', 'Prescription'),
(106, 'doctor@doctor.com', 'mydocs/doctor@doctor.com/57/vivien.jpg', 'mydocs/doctor@doctor.com/57', 'Prescription');

-- --------------------------------------------------------

--
-- Table structure for table `main_keys`
--

CREATE TABLE IF NOT EXISTS `main_keys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mkey` varchar(40) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `main_keys`
--

INSERT INTO `main_keys` (`id`, `mkey`, `status`) VALUES
(2, 'Internet', 0),
(4, 'novels', 0),
(5, 'Orthopaedics', 0),
(6, 'ent', 0),
(7, 'Prescription', 1),
(8, 'test', 1),
(9, 'gyne', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mydocs`
--

CREATE TABLE IF NOT EXISTS `mydocs` (
  `docs_id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(200) NOT NULL,
  `current_folder` varchar(255) NOT NULL,
  `img_name` varchar(55) NOT NULL,
  `details` longtext NOT NULL,
  `doc_date` date NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `client_name` varchar(200) NOT NULL,
  `client_phone` double NOT NULL,
  `cod` varchar(55) NOT NULL,
  `cat` varchar(200) NOT NULL,
  PRIMARY KEY (`docs_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `mydocs`
--

INSERT INTO `mydocs` (`docs_id`, `img`, `current_folder`, `img_name`, `details`, `doc_date`, `doctor_name`, `client_name`, `client_phone`, `cod`, `cat`) VALUES
(5, 'mydocs/doctor@doctor.com/5/ashe_the_frost_archer___league_of_legends-wallpaper-1366x768.jpg', 'mydocs/doctor@doctor.com/5', 'sameer khan', 'sam.nyx@live.com', '2014-08-20', 'doctor@doctor.com', '', 918744883682, '1', 'ashe'),
(10, 'mydocs/doctor@doctor.com/9/funny_cat_5-wallpaper-1366x768.jpg_thumb', 'mydocs/doctor@doctor.com/9', 'My cat', 'sam.nyx@live.com', '2014-09-03', 'doctor@doctor.com', '', 8744883682, '1', 'cats'),
(11, 'mydocs/doctor@doctor.com/11/Elizabeth Mitchell22.jpg_thumb', 'mydocs/doctor@doctor.com/11', 'test ehr', 'ss@ss.com', '0000-00-00', 'doctor@doctor.com', '', 8744883682, '1', 'Prescription'),
(12, 'mydocs/doctor@doctor.com/12/lost_yunjin_kim_sun_kwon_dvdbash_3861.jpg_thumb', 'mydocs/doctor@doctor.com/12', 'test', 'test@2d.com', '0000-00-00', 'doctor@doctor.com', '', 778788, '1', 'Prescription'),
(13, 'mydocs/doctor@doctor.com/13/LostPoster.jpg_thumb', 'mydocs/doctor@doctor.com/13', 'trd', 'ddsim@kmk.com', '1970-01-01', 'doctor@doctor.com', '', 87887, '1', 'Prescription'),
(14, 'mydocs/doctor@doctor.com/14/Emilie_de_Ravin_in_Lost_TV_Series_Wallpaper_1148562017.jpg_thumb', 'mydocs/doctor@doctor.com/14', 'imidmis', 'md@n.com', '1970-01-01', 'doctor@doctor.com', '', 4788787, '1', 'Prescription'),
(15, 'mydocs/doctor@doctor.com/15/Elizabeth-Mitchell-elizabeth-mitchell-19118476-1920-1200.jpg_thumb', 'mydocs/doctor@doctor.com/15', 'odjfi', '', '1970-01-01', 'doctor@doctor.com', '', 0, '1', 'Prescription'),
(17, 'mydocs/doctor@doctor.com/17/Elizabeth-Mitchell1.jpg_thumb', 'mydocs/doctor@doctor.com/17', 'imismimi', 'mi', '1970-01-01', 'doctor@doctor.com', '', 0, '1', 'Prescription'),
(18, 'mydocs/doctor@doctor.com/18/LostPoster.jpg_thumb', 'mydocs/doctor@doctor.com/18', 'isidn', 'i', '2014-09-06', 'doctor@doctor.com', '', 0, '1', 'Prescription'),
(19, 'mydocs/doctor@doctor.com/19/elizabethmitchellemmyma.jpg_thumb', 'mydocs/doctor@doctor.com/19', 'osaodm', '', '2014-09-10', 'doctor@doctor.com', '', 0, '1', 'mo'),
(20, 'mydocs/doctor@doctor.com/20/Lost-lost-747767_1280_1024.jpg_thumb', 'mydocs/doctor@doctor.com/20', 'arvind', 'ard@gmail.com', '2014-09-06', 'doctor@doctor.com', '', 8787, '1', 'Prescription'),
(23, 'mydocs/doctor@doctor.com/23/1836105.jpg_thumb', 'mydocs/doctor@doctor.com/23', 'sam', 'sam.nyx@live.com', '2014-09-17', 'doctor@doctor.com', '', 0, '1', 'Prescription'),
(24, 'mydocs/doctor@doctor.com/24/kakashi-wallpaper-1366x768.jpg_thumb', 'mydocs/doctor@doctor.com/24', 'test', 'test@test.com', '2014-09-19', 'doctor@doctor.com', '', 8744883682, '1', 'pressc'),
(25, 'mydocs/doctor@doctor.com/25/03.jpg_thumb', 'mydocs/doctor@doctor.com/25', 'din', 'iwi', '2014-09-19', 'doctor@doctor.com', '', 0, '1', 'nio'),
(26, 'mydocs/doctor@doctor.com/26/anime_wallpaper_reach.jpg_thumb', 'mydocs/doctor@doctor.com/26', 'kkk', 'kkk', '2014-09-19', 'doctor@doctor.com', '', 0, '1', 'Prescription'),
(27, 'mydocs/clients/sam.nyx@live.com/27/1920x1080.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/27', 'sameer khan', 'abc', '2014-09-19', '', 'sam.nyx@live.com', 0, '', ''),
(28, 'mydocs/clients/sam.nyx@live.com/28/WP0037-04-2500x1600.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/28', 'ss', 'sam.nyx@live.com', '2014-09-19', '', 'sam.nyx@live.com', 0, '', 'Prescription'),
(31, 'mydocs/doctor@doctor.com/29/1.jpg_thumb', 'mydocs/doctor@doctor.com/29', 'sam', 'sam.nyx@live.com', '2014-09-19', 'doctor@doctor.com', '', 784564684, '1', 'Prescription'),
(32, '0', 'mydocs/doctor@doctor.com/32', 'android', 'and@roid.com', '2014-10-16', 'doctor@doctor.com', '', 8744883682, '1', 'Prescription'),
(36, 'mydocs/doctor@doctor.com/34/01_Android-all-versions.jpg_thumb', 'mydocs/doctor@doctor.com/34', 'android', 'android@google.com', '2014-10-17', 'doctor@doctor.com', '', 8744883682, '1', 'Prescription'),
(38, 'mydocs/doctor@doctor.com/38/blog6.jpg_thumb', 'mydocs/doctor@doctor.com/38', 'test', 'test@tt.com', '2014-10-17', 'doctor@doctor.com', '', 888, '1', 'Prescription'),
(39, 'mydocs/clients/sam.nyx@live.com/39/02A.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/39', 'sam0hack', 'sam.nyx@live.com', '0000-00-00', '', 'sam.nyx@live.com', 0, '', 'Prescription'),
(40, 'mydocs/clients/sam.nyx@live.com/40/02A.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/40', 'abc', 'sam.nyx@live.com', '0000-00-00', '', 'sam.nyx@live.com', 0, '', 'Prescription'),
(41, 'mydocs/clients/sam.nyx@live.com/41/WWW.YTS.RE.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/41', 'tester', 'sam.nyx@live.com', '0000-00-00', 'testo', 'sam.nyx@live.com', 0, '', 'test'),
(42, 'mydocs/clients/sam.nyx@live.com/42/top-success-quote_14044-4.png_thumb', 'mydocs/clients/sam.nyx@live.com/42', 'jack', 'sam.nyx@live.com', '0000-00-00', 'jack', 'sam.nyx@live.com', 0, '', 'Prescription'),
(43, 'mydocs/clients/sam.nyx@live.com/43/twitter_colorful_birds-wallpaper-1366x768.jpg_thumb', 'mydocs/clients/sam.nyx@live.com/43', 'jack', 'sam.nyx@live.com', '0000-00-00', 'jack', 'sam.nyx@live.com', 0, '', 'Prescription'),
(44, 'mydocs/josh@gmail.com/44/skyrim_logo-wallpaper-1366x768.jpg_thumb', 'mydocs/josh@gmail.com/44', 'hello', 'sam.nyx@live.com', '2014-10-29', 'josh@gmail.com', '', 8744883682, 'p4nFB2nmj215r4G1BB65', 'Prescription'),
(53, 'mydocs/jay@sharma.com/53/Elizabeth Mitchell22.jpg_thumb', 'mydocs/jay@sharma.com/53', 'test2', 'email@gmail.com', '2014-11-13', 'jay@sharma.com', '', 903939283, '0E9onmlsC7tqE96q2E6p', 'Prescription'),
(54, 'mydocs/jay@sharma.com/54/312ClaireParlour.jpg_thumb', 'mydocs/jay@sharma.com/54', 'test3', 'ret@rt.com', '2014-11-13', 'jay@sharma.com', '', 393299390, '0E9onmlsC7tqE96q2E6p', 'Prescription'),
(55, 'mydocs/jay@sharma.com/55/susan.jpg_thumb', 'mydocs/jay@sharma.com/55', 'Susan', 'Susan987@gmail.com', '2014-11-13', 'jay@sharma.com', '', 7896541230, '0E9onmlsC7tqE96q2E6p', 'Prescription'),
(56, 'mydocs/jay@sharma.com/56/caroline.jpg_thumb', 'mydocs/jay@sharma.com/56', 'Caroline', 'Caroline16@gmail.com', '2014-11-13', 'jay@sharma.com', '', 12365479544, '0E9onmlsC7tqE96q2E6p', 'Prescription'),
(57, 'mydocs/doctor@doctor.com/57/vivien.jpg_thumb', 'mydocs/doctor@doctor.com/57', 'demo', 'demo@dd.com', '2014-11-17', 'doctor@doctor.com', '', 8744889328, '1', 'Prescription'),
(79, 'PDF/9GTMDU9890MMT1MDZM557I24F.pdf', 'mydocs/doctor@doctor.com/58', 'test', 'test@ww.com', '2014-11-21', 'doctor@doctor.com', '', 87897879, '9GTMDU9890MMT1MDZM557I24F', 'Prescription');

-- --------------------------------------------------------

--
-- Table structure for table `My_Bills`
--

CREATE TABLE IF NOT EXISTS `My_Bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(55) NOT NULL,
  `patient_name` varchar(22) NOT NULL,
  `procedure_name` varchar(22) NOT NULL,
  `hospital` varchar(33) NOT NULL,
  `appx_chrg` varchar(11) NOT NULL,
  `bill_no` varchar(11) NOT NULL,
  `bill_date` date NOT NULL,
  `procedure_type_id` varchar(33) NOT NULL,
  `cat` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `My_Bills`
--

INSERT INTO `My_Bills` (`id`, `doc_id`, `patient_name`, `procedure_name`, `hospital`, `appx_chrg`, `bill_no`, `bill_date`, `procedure_type_id`, `cat`) VALUES
(1, 'doctor@doctor.com', 'anand', 'eye test', 'Apollo', '500', 'billno', '2014-10-01', 'OPD Consultation ', ''),
(3, 'doctor@doctor.com', 'mohsin', 'xyz', 'yathart', '800', 'billno', '2014-10-02', 'IP Visit', ''),
(4, 'doctor@doctor.com', 'sonu', 'general test', 'kailash', '450', 'billno', '2014-10-08', 'Emergency  Visit', ''),
(5, 'doctor@doctor.com', 'mohsin123', 'abc', 'appolo', '500', 'billno', '2014-10-19', '', ''),
(7, 'doctor@doctor.com', 'my cat', 'general checkup', 'apollo', '9000', 'billno', '2014-12-31', 'OPD Consultation ', 'OPD Consultation '),
(8, 'doctor@doctor.com', 'my cat12', 'general checkup45', 'apollo89', '90000000', 'billno', '2014-12-29', 'General ward', 'General ward'),
(9, 'jay@sharma.com', 'anand', 'x-ray', 'Apollo ', '800', 'billno', '2014-11-13', 'Semi private', 'Semi private'),
(10, 'jay@sharma.com', 'mohsin', 'Blood test', 'apollo', '5000', 'billno', '2014-10-09', 'Emergency  Visit', 'Private'),
(11, 'doctor@doctor.com', 'test', 'test', 'test', '780', 'billno', '2015-02-05', 'General ward', 'General ward');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` varchar(55) NOT NULL,
  `package` text NOT NULL,
  `pdetails` longtext NOT NULL,
  `cost` varchar(55) NOT NULL,
  `discount` varchar(55) NOT NULL,
  `RKEY` varchar(54) NOT NULL,
  `date` date NOT NULL,
  `city` varchar(58) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `doc_id`, `package`, `pdetails`, `cost`, `discount`, `RKEY`, `date`, `city`) VALUES
(1, 'jay@sharma.com', 'htc', 'smartphones', '18000', '0', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM', '0000-00-00', 'noida'),
(2, 'jay@sharma.com', 'htc2', 'testing', '', '0', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q', '0000-00-00', 'delhi');

-- --------------------------------------------------------

--
-- Table structure for table `package_keywords`
--

CREATE TABLE IF NOT EXISTS `package_keywords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keyword` varchar(200) NOT NULL,
  `RKEY` varchar(54) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `package_keywords`
--

INSERT INTO `package_keywords` (`id`, `keyword`, `RKEY`) VALUES
(1, 'smartphone', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(2, 'tablets', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(3, 'linked-in', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(4, 'twitter', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(5, 'Gmail', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(6, 'facebook', 'BxnOdGuYcgKKJbRUV1NGq7frl0Zu8IQ974NaA9yce9nna69wvM'),
(7, 'smartphone', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q'),
(8, 'tablets', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q'),
(9, 'linked-in', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q'),
(10, 'twitter', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q'),
(11, 'Gmail', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q'),
(12, 'facebook', 'AYgCk7YS9uQsCLl1hW7h5vFrfQCInOzonWrOSGhQ1x049kug7q');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_types`
--

CREATE TABLE IF NOT EXISTS `procedure_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procedure_name` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `procedure_types`
--

INSERT INTO `procedure_types` (`id`, `procedure_name`) VALUES
(1, 'OPD Consultation '),
(2, 'OPD Procedure'),
(3, 'Emergency  Visit'),
(4, 'Emergency  Procedure'),
(5, 'IP Procedure'),
(6, 'IP Visit'),
(7, 'Surgeon Charge '),
(8, 'Implant Charge'),
(9, 'word');

-- --------------------------------------------------------

--
-- Table structure for table `searching_words`
--

CREATE TABLE IF NOT EXISTS `searching_words` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `search_word` varchar(111) NOT NULL,
  `count` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `searching_words`
--

INSERT INTO `searching_words` (`id`, `search_word`, `count`, `date`) VALUES
(1, 'Osteoarthritis', 53, '2015-02-05'),
(3, 'Pizza', 4, '2014-10-13'),
(4, 'pineapple', 1, '2014-09-23'),
(5, 'Orange', 1, '2014-09-23'),
(6, 'once a while', 3, '2014-09-27'),
(7, 'and the mountains echo', 3, '2015-11-24'),
(8, 'Another world', 1, '2014-09-23'),
(9, 'The fault in our stars', 6, '2014-09-23'),
(10, 'twitter', 1, '2014-09-23'),
(11, 'die heart', 1, '2014-09-23'),
(12, 'facebook', 6, '2015-01-05'),
(13, 'french fries', 17, '2015-02-05'),
(14, 'z', 1, '2014-09-23'),
(15, 'burger', 1, '2014-09-23'),
(16, 'Knee replacement', 56, '2015-01-05'),
(17, 'o', 1, '2014-10-10'),
(18, 'knee fracture', 3, '2014-11-10'),
(20, 'abc', 1, '2014-10-30'),
(21, 'sinus surgery', 7, '2015-11-24'),
(23, 'knee pain', 1, '2014-11-10'),
(24, 'tablets', 4, '2014-11-13'),
(25, 'smartphone', 20, '2015-11-24'),
(26, '', 12, '2015-11-24'),
(27, 'Apple', 2, '2015-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_table`
--

CREATE TABLE IF NOT EXISTS `tmp_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` double NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_q` varchar(35) NOT NULL,
  `security_a` varchar(35) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastname` varchar(22) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `city` varchar(58) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tmp_table`
--

INSERT INTO `tmp_table` (`id`, `pic`, `name`, `email`, `phone`, `password`, `security_q`, `security_a`, `status`, `lastname`, `gender`, `city`) VALUES
(1, 'NULL', 'sameer', 'sam.nyx@live.com', 8744, '123456', 'What was your childhood nickname', 'sam', 0, 'khan', 'Male', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
