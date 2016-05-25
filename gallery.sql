-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2016 at 01:47 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery_image_master`
--

CREATE TABLE IF NOT EXISTS `gallery_image_master` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `image_name` varchar(200) NOT NULL,
  `image_title` varchar(200) NOT NULL,
  `img_type` varchar(200) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `is_delete` int(11) NOT NULL,
  `createdOn` int(11) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `gallery_image_master`
--

INSERT INTO `gallery_image_master` (`image_id`, `image_name`, `image_title`, `img_type`, `gallery_id`, `is_delete`, `createdOn`) VALUES
(25, '1MB_Toy.jpg', 'sample image', 'image/jpeg', 17, 0, 2016),
(26, 'Jellyfish.jpg', 'sample image2', 'image/jpeg', 17, 0, 2016),
(27, 'Tulips.jpg', 'test12', 'image/jpeg', 17, 0, 2016),
(28, 'screenshot_57.png', 'test32', 'image/png', 17, 0, 2016),
(29, 'Hydrangeas.jpg', 'sample1', 'image/jpeg', 17, 0, 2016),
(30, 'Koala.jpg', 'sample2', 'image/jpeg', 17, 0, 2016),
(31, 'Tulips.jpg', 'sample21', 'image/jpeg', 17, 0, 2016),
(32, '1mb_Girl in Red.jpg', 'sample23', 'image/jpeg', 17, 0, 2016);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_master`
--

CREATE TABLE IF NOT EXISTS `gallery_master` (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `gallery_name` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `is_rar_file` int(11) NOT NULL,
  `gallery_desc` longtext NOT NULL,
  `createdOn` datetime NOT NULL,
  `is_delete` int(11) NOT NULL,
  PRIMARY KEY (`gallery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `gallery_master`
--

INSERT INTO `gallery_master` (`gallery_id`, `gallery_name`, `is_active`, `is_rar_file`, `gallery_desc`, `createdOn`, `is_delete`) VALUES
(6, 'sample gallery1', 1, 2, 'sample description test', '2016-05-25 00:00:00', 0),
(7, 'sample gallery2', 1, 2, 'sample text2', '2016-05-25 00:00:00', 0),
(8, 'SAMPLE ', 1, 1, 'SAMPLE', '2016-05-25 00:00:00', 0),
(9, 'SAMPLE TEXT', 1, 1, 'SAMPLE TETETETE', '2016-05-25 00:00:00', 0),
(10, 'sample text3', 1, 2, 'sample text', '2016-05-25 00:00:00', 0),
(11, 'sample gallery45', 1, 2, 'sample', '2016-05-25 00:00:00', 0),
(17, 'new image upload', 1, 2, 'sample test goes here', '2016-05-25 00:00:00', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
