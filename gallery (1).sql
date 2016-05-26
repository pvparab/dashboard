-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 02:41 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

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
(32, '1mb_Girl in Red.jpg', 'sample23', 'image/jpeg', 17, 0, 2016),
(33, 'screenshot_58.png', 'sample image21', 'image/png', 21, 1, 2016),
(34, 'Tulips.jpg', 'sample image22', 'image/jpeg', 21, 0, 2016),
(35, 'screenshot_64.png', 'sample image2121', 'image/png', 17, 1, 2016),
(36, 'screenshot_66.png', 'sample image21212', 'image/png', 17, 1, 2016),
(37, 'screenshot_46.png', 'screen45', 'image/png', 17, 1, 2016),
(38, 'screenshot_49.png', 'screen46', 'image/png', 17, 1, 2016),
(39, 'screenshot_49.png', 'sample imag12', 'image/png', 17, 1, 2016),
(40, 'screenshot_57.png', 'sample image13', 'image/png', 17, 1, 2016),
(41, 'screenshot_49.png', 'image_49', 'image/png', 17, 1, 2016),
(42, 'Penguins.jpg', 'sample image222', 'image/jpeg', 17, 0, 2016),
(43, 'screenshot_66.png', 'sample img23', 'image/png', 21, 0, 2016);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `gallery_master`
--

INSERT INTO `gallery_master` (`gallery_id`, `gallery_name`, `is_active`, `is_rar_file`, `gallery_desc`, `createdOn`, `is_delete`) VALUES
(6, 'sample gallery1', 1, 2, 'sample description test', '2016-05-25 00:00:00', 1),
(7, 'sample gallery2', 1, 2, 'sample text2', '2016-05-25 00:00:00', 0),
(8, 'SAMPLE ', 1, 1, 'SAMPLE', '2016-05-25 00:00:00', 0),
(9, 'SAMPLE TEXT', 1, 1, 'SAMPLE TETETETE', '2016-05-25 00:00:00', 1),
(10, 'sample text3', 1, 2, 'sample text', '2016-05-25 00:00:00', 0),
(11, 'sample gallery45', 1, 2, 'sample', '2016-05-25 00:00:00', 0),
(17, 'new image upload', 1, 2, 'sample test goes here', '2016-05-25 00:00:00', 0),
(18, '', 1, 0, '', '2016-05-26 00:00:00', 1),
(19, '', 1, 0, '', '2016-05-26 00:00:00', 1),
(20, 'sasa', 1, 0, '', '2016-05-26 00:00:00', 0),
(21, 'sample gallery4', 1, 2, 'sample test', '2016-05-26 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_menu`
--

CREATE TABLE IF NOT EXISTS `main_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) NOT NULL,
  `menu_link` varchar(200) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `menustatus` int(11) NOT NULL,
  `reference_flag` int(11) NOT NULL,
  `rrefrernce_link` varchar(200) NOT NULL,
  `description` longtext NOT NULL,
  `is_delete` int(11) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `main_menu`
--

INSERT INTO `main_menu` (`menu_id`, `menu_name`, `menu_link`, `menu_order`, `parent_id`, `menustatus`, `reference_flag`, `rrefrernce_link`, `description`, `is_delete`, `created_on`, `updated_on`) VALUES
(1, 'Home12', 'home12.php', 1, 0, 1, 0, 'home12.php', '', 0, '2016-05-26 00:00:00', '2016-05-26 10:03:24'),
(2, 'Product', 'product.php', 2, 0, 1, 1, 'product.php', '', 0, '2016-05-26 00:00:00', '0000-00-00 00:00:00'),
(3, 'product2', 'product2.php', 1, 2, 1, 1, 'product/product2', '', 0, '2016-05-26 09:03:16', '0000-00-00 00:00:00'),
(4, 'product3', 'product3.php', 2, 2, 1, 0, 'product/product3', '121212', 1, '2016-05-26 09:04:12', '0000-00-00 00:00:00'),
(5, 'sample44', 'sample44.php', 4, 2, 1, 1, 'product/sample11', '', 0, '2016-05-26 10:09:57', '2016-05-26 10:56:19');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
