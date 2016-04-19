-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 23, 2015 at 05:31 AM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `attoburt_rfid`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `ttl` int(11) NOT NULL DEFAULT '0',
  `descs` varchar(1000) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `name`, `ttl`, `descs`) VALUES
(1, '16oz Ball Peen Hammer', 1, 'For striking, punching, riveting, shaping and straightening unhardened metal. It features an alloy steel head and a hardwood handle.'),
(2, '6*100 Cross Screwdriver', 1, 'With a hexagonal plastic handle and a tough steel shaft, and a cross hardened tip that the can insert into the cross screw head to turn it. '),
(3, '6*100 Slotted Screwdriver', 1, 'With a slotted hardened tip that the can insert into the slot screw head to turn it.'),
(4, 'Claw Hammer', 1, 'Primarily use for pounding or extracting nails from the object. It is associated with woodworking but is not limited to use with wood products. '),
(5, '13mm Combination Spanner', 1, 'Double-ended with one U-shaped opening that grips two opposite faces of the bolt or nut, another is generally a six-point opening for use with nuts or bolt heads with a hexagonal shape. Both ends generally fit the same size of bolt. '),
(6, 'Adjustable Spanner', 1, 'With a jaw of adjustable width, allowing it to be used with different sizes of fastener head. '),
(7, 'Test Pencil', 1, 'With Vanadium steel blade, plastic pen shell, neon lamp and safety resistance. '),
(8, 'Needle-nose Pliers', 1, 'Both cutting and holding pliers to bend, re-position and cut wire. '),
(9, 'Locking Pliers', 1, 'Can be locked into position. One side of the handle includes a bolt that is used to adjust the spacing of the jaws, the other side of the handle includes a lever to push the two sides of the handles apart to unlock the pliers. ');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `rfid` varchar(50) NOT NULL,
  `catid` bigint(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rfid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`rfid`, `catid`, `status`, `posttime`) VALUES
('3000000011112222333344445555', 1, 'Lost', '2015-03-23 09:25:27'),
('3000111122223333444455556666', 2, 'Exist', '2015-03-23 09:25:47'),
('3000222233334444555566667777', 3, 'Lost', '2015-03-23 09:25:27'),
('3000333344445555666677778888', 4, 'Suspended', '2015-03-23 09:19:24'),
('3000444455556666777788889999', 5, 'Suspended', '2015-03-23 09:19:24'),
('3000555566667777888899990000', 6, 'Suspended', '2015-03-23 09:25:20'),
('3000666677778888999900001111', 7, 'Lost', '2015-03-23 09:25:27'),
('3000777788889999000011112222', 8, 'Lost', '2015-03-23 09:25:27'),
('3000888899990000111122223333', 9, 'Lost', '2015-03-23 09:25:27');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
