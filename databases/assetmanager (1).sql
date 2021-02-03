-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 06, 2015 at 05:00 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `assetmanager`
--
CREATE DATABASE IF NOT EXISTS `assetmanager` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `assetmanager`;

-- --------------------------------------------------------

--
-- Table structure for table `asset`
--

CREATE TABLE IF NOT EXISTS `asset` (
  `assetid` int(11) NOT NULL AUTO_INCREMENT,
  `assetname` varchar(200) DEFAULT NULL,
  `assetdesc` text,
  `providedby` varchar(200) DEFAULT NULL,
  `acquiredate` date DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `amountpurchased` double DEFAULT NULL,
  `assettagid` varchar(200) NOT NULL,
  `ownertype` varchar(200) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `assetCommit` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`assetid`),
  UNIQUE KEY `assetid` (`assetid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `asset`
--

INSERT INTO `asset` (`assetid`, `assetname`, `assetdesc`, `providedby`, `acquiredate`, `lifetime`, `amountpurchased`, `assettagid`, `ownertype`, `ownerid`, `photo`, `categoryid`, `assetCommit`) VALUES
(1, 'Motor Vehicle', 'Mercedes Benz GL 450', 'IGR', '2014-06-01', 1461, 5850000, '5IF-01FG', 'Faculty', 4, NULL, 1, 1),
(2, 'Motor Vehicle', 'Toyota Prado TXL', 'Government', '2014-06-01', 1461, 14995000, '5IF-02FG', 'Faculty', 4, NULL, 1, 1),
(3, 'Motor Vehicle', 'Toyota Camry (1.8) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-03FG', 'faculty', 4, '', 1, 1),
(4, 'Peugeot 407', 'Peugeot 407', 'Government', '2014-06-01', 1461, 2650000, '#5IE-04FG', 'faculty', 4, '1436176984il_fullxfull.205880679.jpg', 1, 1),
(5, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '#5IF-05FG', 'faculty', 4, '1436176865candy_cane_sticker-p217245593274652605z74qp_400.jpg', 1, 1),
(6, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-06FG', 'Faculty', 4, NULL, 1, 1),
(7, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-07FG', 'Faculty', 4, NULL, 1, 0),
(8, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-08FG', 'Faculty', 4, NULL, 1, 0),
(9, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-09FG', 'Faculty', 4, NULL, 1, 0),
(10, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-10FG', 'Faculty', 4, NULL, 1, 0),
(11, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-11FG', 'Faculty', 4, NULL, 1, 0),
(12, 'Motor Vehicle', 'Toyota Corolla (1.8L) 2011', 'IGR', '2014-06-01', 1461, 3750000, '5IF-12FG', 'Faculty', 4, NULL, 1, 0),
(13, 'Motor Vehicle', 'Peugeot Ambulance Expert', 'Government', '2014-06-01', 1461, 5475000, '5IF-13FG', 'Faculty', 4, NULL, 1, 0),
(14, 'Motor Vehicle', 'Toyota Hilux VVTi', 'IGR', '2014-06-01', 1461, 4888000, '5IF-14FG', 'Faculty', 4, NULL, 1, 0),
(15, 'Motor Vehicle', 'Toyota Hilux VVTi', 'Government', '2014-06-01', 1461, 4888000, '5IF-15FG', 'Faculty', 4, NULL, 1, 0),
(16, 'Motor Vehicle', 'Toyota Hilux VVTi', 'Government', '2014-06-01', 1461, 4888000, '5IF-16FG', 'Faculty', 4, NULL, 1, 0),
(17, 'Motor Vehicle', 'Toyota Hilux VVTi', 'Government', '2014-06-01', 1461, 4888000, '5IF-17FG', 'Faculty', 4, NULL, 1, 1),
(18, 'Motor Vehicle', 'Toyota Bus Coaster VVTi', 'Government', '2014-06-01', 1461, 9225000, '5IF-18FG', 'Faculty', 4, NULL, 1, 0),
(19, 'Motor Vehicle', 'Toyota Bus Coaster VVTi', 'Government', '2014-06-01', 1461, 9225000, '5IF-19FG', 'Faculty', 4, NULL, 1, 0),
(20, 'Motor Vehicle', '"Mercedes Benz Tanker 10', 'Government', '2014-06-01', 1461, 11150000, '5IF-20FG', 'Faculty', 4, NULL, 1, 0),
(21, 'Motor Vehicle', '"Mercedes Benz Tanker 15', 'Government', '2014-06-01', 1461, 11150000, '5IF-21FG', 'Faculty', 4, NULL, 1, 0),
(22, 'Motor Vehicle', 'Mercedes Benz van Refuse Van', 'Government', '2014-06-01', 1461, 10650000, '5IF-22FG', 'Faculty', 4, NULL, 1, 0),
(23, 'Motor Vehicle', 'Mercedes Benz bus 52-Seater', 'Government', '2014-06-01', 1461, 11275000, '5IF-23FG', 'Faculty', 4, NULL, 1, 0),
(24, 'Motor Vehicle', 'Toyota Hilux VVTi', 'Government', '2014-06-01', 1461, 5225000, '5IF-24FG', 'Faculty', 4, NULL, 1, 1),
(25, 'Motor Vehicle', 'Toyota Hilux VVTi', 'Government', '2014-06-01', 1461, 4888000, '5IF-25FG', 'Faculty', 4, NULL, 1, 1),
(26, 'Ceiling Fan', 'Ceiling Fan_', 'Government', '2015-06-03', 360, 2000, '#EA333', 'faculty', 5, '143617681637299-candy-party-dessert-plates.jpg', 7, 1),
(27, 'AC', 'Air Conditioner', 'Government', '2011-01-10', 360, 5000, '#RAAA', 'faculty', 2, '1436104648479stethoscope.jpg', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assetcategory`
--

CREATE TABLE IF NOT EXISTS `assetcategory` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(100) DEFAULT NULL,
  `categorydesc` text,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `assetcategory`
--

INSERT INTO `assetcategory` (`categoryid`, `categoryname`, `categorydesc`) VALUES
(1, 'Automobile', 'AutoMobile'),
(2, 'Furniture', 'Furniture'),
(3, 'Plant & Machinery', 'Plant & Machinery'),
(4, 'Computer', 'Computer'),
(5, 'Equipments', 'Equipments'),
(6, 'Electric Plants', 'Electric Plants'),
(7, 'Office Electronics', 'Office Electronics'),
(8, 'Land & Building', 'Land &Building');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(200) DEFAULT NULL,
  `facultyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`departmentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`, `facultyid`) VALUES
(1, 'Agricultural Economics', 1),
(2, 'Animal Production & Health', 1),
(3, 'Crop Production & Protection', 1),
(4, 'Fisheries & Aquacultural Technology', 1),
(5, 'Food Sciences & Technology', 1),
(6, 'Forestry and Wild Life Management', 1),
(7, 'Accounting', 2),
(8, 'Business Management', 2),
(9, 'Economics & Development', 2),
(10, 'Geography and Regional Planning', 2),
(11, 'History & Strategic Studies', 2),
(12, 'Languages & Communication Studies', 2),
(13, 'Political Science', 2),
(14, 'Sociology', 2),
(15, 'Applied Chemistry', 3),
(16, 'Biochemistry & Molecular Biology', 3),
(17, 'Biological Sciences', 2),
(18, 'Educational Foundation', 2),
(19, 'Mathematical Sciences & IT', 3),
(20, 'Microbiology', 3),
(21, 'Physics', 3),
(22, 'Science Education', 3);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `facultyid` int(11) NOT NULL AUTO_INCREMENT,
  `facultyname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`facultyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyid`, `facultyname`) VALUES
(1, 'Agric & Agric Technology'),
(2, 'Arts, Management & Social Sciences'),
(3, 'Science & Education'),
(4, 'VC''s Office'),
(5, 'Registry'),
(6, 'Busary'),
(7, 'Library'),
(8, 'Audit'),
(9, 'Institute of Communication Technology (ICT)'),
(10, 'Student Affairs');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `logid` int(11) NOT NULL AUTO_INCREMENT,
  `logoperation` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `remarks` text NOT NULL,
  `resourceid` int(11) NOT NULL,
  PRIMARY KEY (`logid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logid`, `logoperation`, `userid`, `time`, `remarks`, `resourceid`) VALUES
(1, 'assetCommit', 0, '2015-07-06 15:27:57', '', 42),
(2, 'assetCommit', 0, '2015-07-06 15:39:11', '', 6),
(3, 'editFaculty', 3, '2015-07-06 16:17:57', '', 1),
(7, 'editUser', 3, '2015-07-06 16:23:11', '', 4),
(8, 'editUser', 3, '2015-07-06 16:28:18', '', 4),
(9, 'assetDelete', 3, '2015-07-06 16:50:47', '', 42),
(10, 'assetCommit', 3, '2015-07-06 16:54:10', '', 25),
(11, 'assetUncommit', 3, '2015-07-06 16:54:17', '', 25),
(12, 'assetCommit', 3, '2015-07-06 16:54:52', '', 25);

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `permissionid` int(11) NOT NULL AUTO_INCREMENT,
  `permissionname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`permissionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`permissionid`, `permissionname`) VALUES
(1, 'addAsset'),
(2, 'editAsset'),
(3, 'deleteAsset'),
(4, 'viewAsset'),
(5, 'addAssetCategory'),
(6, 'editAssetCategory'),
(7, 'deleteAssetCategory'),
(8, 'viewAssetCategory'),
(9, 'addFaculty'),
(10, 'editFaculty'),
(11, 'deleteFaculty'),
(12, 'viewFaculty'),
(13, 'addDepartment'),
(14, 'editDepartment'),
(15, 'deleteDepartment'),
(16, 'viewDepartment'),
(17, 'addRole'),
(18, 'editRole'),
(19, 'deleteRole'),
(20, 'viewRole'),
(21, 'addPermission'),
(22, 'editPermission'),
(23, 'deletePermission'),
(24, 'viewPermission'),
(25, 'addUser'),
(26, 'editUser'),
(27, 'deleteUser'),
(28, 'viewUser'),
(29, 'evaluateAsset'),
(30, 'viewParameterizedReport'),
(31, 'importAsset'),
(32, 'exportAsset'),
(33, 'addUserRole'),
(34, 'addRolePermission'),
(35, 'assetCommit');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'admin'),
(2, 'Controller_Faculty'),
(3, 'trainingRole01'),
(4, 'trainingRole02');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT NULL,
  `permissionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `roleid`, `permissionid`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 1, 2),
(4, 1, 3),
(5, 1, 5),
(6, 1, 6),
(7, 1, 7),
(8, 1, 32),
(9, 1, 31),
(10, 1, 30),
(11, 1, 29),
(12, 1, 28),
(13, 1, 27),
(14, 1, 26),
(15, 1, 25),
(16, 1, 24),
(17, 1, 23),
(18, 1, 22),
(19, 1, 21),
(20, 1, 20),
(21, 1, 19),
(22, 1, 18),
(23, 1, 17),
(24, 1, 16),
(25, 1, 15),
(26, 1, 14),
(27, 1, 13),
(28, 1, 12),
(29, 1, 11),
(30, 1, 10),
(31, 1, 9),
(32, 1, 8),
(33, 1, 33),
(34, 1, 34),
(35, 3, 1),
(36, 3, 4),
(37, 1, 35),
(38, 2, 1),
(39, 2, 5),
(40, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `displayname` text,
  `datecreated` date DEFAULT NULL,
  `enabled` int(1) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `displayname`, `datecreated`, `enabled`) VALUES
(1, 'user001', 'fudma', 'A.K Bello', '2015-06-02', 1),
(2, 'user002', 'fudma', 'A.O Abdulsalami', '2015-06-02', 1),
(3, 'admin', 'admin', 'Admin', '2015-06-02', 1),
(4, 'user100', '123456', 'User 100', '2015-06-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `userid`, `roleid`) VALUES
(1, 1, 1),
(2, 3, 1),
(3, 4, 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
