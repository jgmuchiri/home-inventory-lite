-- phpMyAdmin SQL Dump
-- version 4.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 09, 2014 at 01:36 AM
-- Server version: 5.6.11-log
-- PHP Version: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql_inventory`
--
CREATE DATABASE IF NOT EXISTS `sql_inventory` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sql_inventory`;

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `item` varchar(25) NOT NULL,
  `location` varchar(25) NOT NULL,
  `model` varchar(50) NOT NULL,
  `serial` varchar(25) NOT NULL,
  `price` int(10) NOT NULL,
  `value` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item`, `location`, `model`, `serial`, `price`, `value`) VALUES
(25, 'Queen bed', '1', '', '', 1300, 0),
(26, 'Queen matress', '1', '', '', 700, 0),
(27, '48in Tv', '7', 'Samsung', '', 680, 0),
(28, 'Desktop Computer', '3', 'Acer Aspire', '', 450, 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory_locations`
--

CREATE TABLE IF NOT EXISTS `inventory_locations` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `loc` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `inventory_locations`
--

INSERT INTO `inventory_locations` (`id`, `loc`) VALUES
(1, 'Bedroom (Master)'),
(2, 'Storage'),
(3, 'Bathroom'),
(4, 'Other'),
(5, 'Bedroom (Guest)'),
(6, 'Closet (Master)'),
(7, 'Living Room'),
(8, 'Closet (Guest)');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `date` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `content`, `date`) VALUES
(12, 'Call movers', 'Compare moving companies\r\n</br>\r\ncall 1-800-267-8910\r\n</br>\r\nhttp://movers.com', '1404873051'),
(13, 'Message from movers', '"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"', '1404873111');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE IF NOT EXISTS `site_settings` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `site_name`) VALUES
(1, 'InventoryPro');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cat` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `cat`, `name`) VALUES
(81, 0, 'Inventory living room'),
(80, 0, 'Inventory bedroom'),
(79, 0, 'Photo items'),
(78, 0, 'Pack kitchenware'),
(84, 0, 'Inventory kitchen'),
(85, 0, 'Transfer cable'),
(86, 0, 'Cancel water'),
(87, 0, 'Cancel lease'),
(88, 0, 'Schedule pickup');

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inventory_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id`, `inventory_id`, `title`, `file`, `width`, `height`, `type`, `size`, `date`) VALUES
(9, 25, 'queenbed.jpeg', '46f815987825d3653d54548d66caaabc.jpeg', 525, 366, 'jpeg', 32, 1404873226);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
