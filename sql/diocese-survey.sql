-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2016 at 10:17 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diocese-survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `agriculture`
--

CREATE TABLE IF NOT EXISTS `agriculture` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Agriculture') CHARACTER SET utf8 DEFAULT 'Agriculture',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Type` enum('paddy','betelnut','cocunut','rubber','spice','fruit','flower','fish','others') CHARACTER SET utf8 DEFAULT 'paddy',
  `Other` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `agriculture`
--

INSERT INTO `agriculture` (`ID`, `ClassName`, `LastEdited`, `Created`, `Type`, `Other`, `FamilyID`) VALUES
(1, 'Agriculture', '2016-01-21 07:41:42', '2016-01-21 07:38:26', 'paddy', NULL, 6),
(2, 'Agriculture', '2016-01-21 07:38:51', '2016-01-21 07:38:51', 'others', 'coffee', 5);

-- --------------------------------------------------------

--
-- Table structure for table `appliance`
--

CREATE TABLE IF NOT EXISTS `appliance` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Appliance') CHARACTER SET utf8 DEFAULT 'Appliance',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Computer` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `WashingMachine` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `AirConditioner` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `MicrowaveOven` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `CookingGas` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Fridge` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Others` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Specify` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `appliance`
--

INSERT INTO `appliance` (`ID`, `ClassName`, `LastEdited`, `Created`, `Computer`, `WashingMachine`, `AirConditioner`, `MicrowaveOven`, `CookingGas`, `Fridge`, `Others`, `Specify`, `FamilyID`) VALUES
(1, 'Appliance', '2016-02-03 13:26:10', '2016-02-03 13:25:05', 1, 1, 0, 0, 0, 0, 0, 'game cosole', 5),
(2, 'Appliance', '2016-02-25 15:44:04', '2016-02-25 15:39:19', 1, 1, 1, 0, 0, 0, 0, NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Business') CHARACTER SET utf8 DEFAULT 'Business',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Type` enum('streetvendor','unduvandi','pettikada','shop','trade','industry','selfemployed','others') CHARACTER SET utf8 DEFAULT 'streetvendor',
  `Other` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`ID`, `ClassName`, `LastEdited`, `Created`, `Type`, `Other`, `FamilyID`) VALUES
(1, 'Business', '2016-01-21 08:05:03', '2016-01-21 08:05:03', 'trade', NULL, 1),
(2, 'Business', '2016-02-25 15:09:32', '2016-02-24 12:11:24', 'others', 'no idea', 6);

-- --------------------------------------------------------

--
-- Table structure for table `catholicmagazine`
--

CREATE TABLE IF NOT EXISTS `catholicmagazine` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('CatholicMagazine') CHARACTER SET utf8 DEFAULT 'CatholicMagazine',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Jeevadeepthi` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Jeevanaadam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Christain` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `PreshithaKeralam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Shalom` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Cherupushpam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Others` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Specify` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `catholicmagazine`
--

INSERT INTO `catholicmagazine` (`ID`, `ClassName`, `LastEdited`, `Created`, `Jeevadeepthi`, `Jeevanaadam`, `Christain`, `PreshithaKeralam`, `Shalom`, `Cherupushpam`, `Others`, `Specify`, `FamilyID`) VALUES
(1, 'CatholicMagazine', '2016-02-04 13:09:15', '2016-02-04 13:09:15', 1, 0, 0, 0, 0, 1, 1, 'Not Reachable', 5),
(2, 'CatholicMagazine', '2016-02-26 05:16:53', '2016-02-26 05:16:53', 1, 0, 1, 0, 0, 0, 1, 'Mangalam, Manoroma', 1);

-- --------------------------------------------------------

--
-- Table structure for table `communitygroup`
--

CREATE TABLE IF NOT EXISTS `communitygroup` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('CommunityGroup') CHARACTER SET utf8 DEFAULT 'CommunityGroup',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `communitygroup`
--

INSERT INTO `communitygroup` (`ID`, `ClassName`, `LastEdited`, `Created`, `Title`) VALUES
(1, 'CommunityGroup', '2016-01-20 15:03:03', NULL, 'Parish Council Member'),
(2, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Family Unit Member'),
(4, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Party Member'),
(5, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Trade Union Member'),
(6, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'SHG Member'),
(7, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Catechism Teacher'),
(8, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Education Committe'),
(9, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'Vincent De Paul'),
(10, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'KLCA'),
(11, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'CSS'),
(12, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'KLCWA'),
(13, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'KCYM'),
(14, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'CLC'),
(15, 'CommunityGroup', '2016-01-20 15:03:02', NULL, 'UFrame'),
(16, 'CommunityGroup', '2016-01-20 15:03:01', NULL, 'Jesus Youth'),
(17, 'CommunityGroup', '2016-01-20 15:03:01', NULL, 'Prayer Group'),
(18, 'CommunityGroup', '2016-01-20 15:03:01', NULL, 'Choir Member'),
(19, 'CommunityGroup', '2016-01-20 15:03:01', NULL, 'Altar Boy/Girl'),
(20, 'CommunityGroup', '2016-01-20 15:03:01', NULL, 'KCSL');

-- --------------------------------------------------------

--
-- Table structure for table `communitygroup_familymembers`
--

CREATE TABLE IF NOT EXISTS `communitygroup_familymembers` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `CommunityGroupID` int(11) NOT NULL DEFAULT '0',
  `FamilyMemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `CommunityGroupID` (`CommunityGroupID`),
  KEY `FamilyMemberID` (`FamilyMemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `communitygroup_familymembers`
--

INSERT INTO `communitygroup_familymembers` (`ID`, `CommunityGroupID`, `FamilyMemberID`) VALUES
(1, 20, 1),
(2, 18, 1),
(3, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Contact') CHARACTER SET utf8 DEFAULT 'Contact',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Name` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Mobile` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ID`, `ClassName`, `LastEdited`, `Created`, `Name`, `Email`, `Mobile`, `FamilyID`) VALUES
(1, 'Contact', '2016-01-14 11:39:20', '2016-01-14 11:39:20', 'M T Clement', NULL, '69858458', 1),
(2, 'Contact', '2016-01-14 11:43:45', '2016-01-14 11:43:29', 'Tambi', NULL, '9898976486', 2),
(3, 'Contact', '2016-01-14 11:44:11', '2016-01-14 11:44:11', 'Grace', NULL, '0484-2588874', 3),
(4, 'Contact', '2016-02-06 10:34:50', '2016-02-06 10:34:50', 'Felix George', NULL, '985265824', 5);

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE IF NOT EXISTS `education` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Education') CHARACTER SET utf8 DEFAULT 'Education',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Code` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `Status` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyMemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyMemberID` (`FamilyMemberID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`ID`, `ClassName`, `LastEdited`, `Created`, `Code`, `Status`, `FamilyMemberID`) VALUES
(1, 'Education', '2016-01-20 15:03:46', '2016-01-20 15:03:46', 'pri', 'p', 1),
(2, 'Education', '2016-01-20 15:03:58', '2016-01-20 15:03:58', 'deg', 'p', 1),
(3, 'Education', '2016-01-27 11:14:46', '2016-01-27 11:14:46', 'pri', 'p', 3),
(4, 'Education', '2016-01-27 12:21:53', '2016-01-27 12:21:53', 'pri', 'p', 2),
(5, 'Education', '2016-01-27 12:22:11', '2016-01-27 12:22:06', 'iti', 'p', 0),
(6, 'Education', '2016-01-27 12:22:18', '2016-01-27 12:22:18', 'deg', 'p', 2);

-- --------------------------------------------------------

--
-- Table structure for table `family`
--

CREATE TABLE IF NOT EXISTS `family` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Family') DEFAULT 'Family',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Pincode` varchar(10) DEFAULT NULL,
  `HouseNo` varchar(255) DEFAULT NULL,
  `ParishID` int(11) NOT NULL DEFAULT '0',
  `IsPanchayat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `IsMunicipality` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `IsCorporation` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `BlockNo` int(11) NOT NULL DEFAULT '0',
  `UnitNo` int(11) NOT NULL DEFAULT '0',
  `FamilyNo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ParishID` (`ParishID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `family`
--

INSERT INTO `family` (`ID`, `ClassName`, `LastEdited`, `Created`, `Name`, `Address`, `Pincode`, `HouseNo`, `ParishID`, `IsPanchayat`, `IsMunicipality`, `IsCorporation`, `BlockNo`, `UnitNo`, `FamilyNo`) VALUES
(1, 'Family', '2016-02-24 13:46:57', '2016-01-05 15:22:04', 'Mulleparambil House', 'Edakochi', '682010', '14/145-16', 10, 0, 0, 1, 3, 21, 27),
(2, 'Family', '2016-01-06 08:18:44', '2016-01-06 08:05:43', 'Mulleparambil House', 'Near Edakochi Bus Stand, Edakochi, Kochi,', '682010', NULL, 10, 0, 0, 1, 0, 0, 0),
(3, 'Family', '2016-01-06 08:12:37', '2016-01-06 08:12:37', 'Mulleparambil House', 'Edackochi, Kochi', '682010', NULL, 10, 1, 0, 0, 0, 0, 0),
(4, 'Family', '2016-01-14 12:28:38', '2016-01-14 12:26:54', 'Kothkath', 'Edakochi, Kochi', '68210', NULL, 10, 0, 0, 0, 2, 12, 2),
(5, 'Family', '2016-01-14 12:30:53', '2016-01-14 12:30:44', 'Kalapurakal House', 'Edakochi, Kochi', '682010', NULL, 10, 0, 0, 1, 3, 18, 22),
(6, 'Family', '2016-01-20 15:27:17', '2016-01-14 12:32:28', 'Vattatara House', 'Edakochi, Kochi', '682010', '22/14/19855', 14, 0, 0, 0, 2, 3, 12);

-- --------------------------------------------------------

--
-- Table structure for table `familymember`
--

CREATE TABLE IF NOT EXISTS `familymember` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('FamilyMember') DEFAULT 'FamilyMember',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `DateOfBirth` date DEFAULT NULL,
  `Gender` varchar(2) DEFAULT NULL,
  `MartialStatus` varchar(2) DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  `HoldsPassport` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `HoldsBankAccount` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `HoldsDrivingLicence` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `BloodGroup` enum('O +','O -','A +','A -','B +','B -','AB +','AB -','NA') DEFAULT 'O +',
  `Relation` enum('Guardian','Father','Mother','Son','Daughter','Wife','Husband','Brother','Sister','Inlaw','Grandfather','Grandmother','Grandson','Granddaughter') DEFAULT 'Guardian',
  `ParishID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`),
  KEY `ParishID` (`ParishID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `familymember`
--

INSERT INTO `familymember` (`ID`, `ClassName`, `LastEdited`, `Created`, `Name`, `DateOfBirth`, `Gender`, `MartialStatus`, `FamilyID`, `HoldsPassport`, `HoldsBankAccount`, `HoldsDrivingLicence`, `BloodGroup`, `Relation`, `ParishID`) VALUES
(1, 'FamilyMember', '2016-01-27 11:10:08', '2016-01-06 07:19:01', 'Thomas Paulson', '1982-03-29', 'm', 'm', 1, 1, 1, 1, 'O +', 'Son', 10),
(2, 'FamilyMember', '2016-01-27 11:11:56', '2016-01-06 09:08:06', 'Preethy P P', '1988-06-30', 'f', 'm', 1, 0, 0, 0, 'O +', 'Inlaw', 10),
(3, 'FamilyMember', '2016-01-27 11:13:02', '2016-01-19 08:27:43', 'Johnson', '1982-02-19', 'm', 'm', 6, 1, 0, 0, 'O +', 'Guardian', 14);

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('File','Folder','Image','Image_Cached') DEFAULT 'File',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Filename` mediumtext,
  `Content` mediumtext,
  `ShowInSearch` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `ParentID` int(11) NOT NULL DEFAULT '0',
  `OwnerID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ParentID` (`ParentID`),
  KEY `OwnerID` (`OwnerID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`ID`, `ClassName`, `LastEdited`, `Created`, `Name`, `Title`, `Filename`, `Content`, `ShowInSearch`, `ParentID`, `OwnerID`) VALUES
(1, 'Folder', '2016-01-04 22:01:34', '2016-01-04 22:01:34', 'Uploads', 'Uploads', 'assets/Uploads/', NULL, 1, 0, 0),
(2, 'Image', '2016-01-04 22:01:34', '2016-01-04 22:01:34', 'SilverStripeLogo.png', 'SilverStripeLogo.png', 'assets/Uploads/SilverStripeLogo.png', NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE IF NOT EXISTS `group` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Group') DEFAULT 'Group',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` mediumtext,
  `Code` varchar(255) DEFAULT NULL,
  `Locked` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Sort` int(11) NOT NULL DEFAULT '0',
  `HtmlEditorConfig` mediumtext,
  `ParentID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ParentID` (`ParentID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`ID`, `ClassName`, `LastEdited`, `Created`, `Title`, `Description`, `Code`, `Locked`, `Sort`, `HtmlEditorConfig`, `ParentID`) VALUES
(1, 'Group', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'Content Authors', NULL, 'content-authors', 0, 1, NULL, 0),
(2, 'Group', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'Administrators', NULL, 'administrators', 0, 0, NULL, 0),
(3, 'Group', '2016-01-27 07:16:34', '2016-01-25 07:29:11', 'Managers', NULL, 'manager', 0, 0, NULL, 0),
(4, 'Group', '2016-01-25 15:15:05', '2016-01-25 15:14:23', 'Priests', NULL, 'priests', 0, 0, NULL, 0),
(5, 'Group', '2016-02-22 04:44:48', '2016-02-22 04:43:33', 'Assistants', NULL, 'assistants', 0, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE IF NOT EXISTS `group_members` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '0',
  `MemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `GroupID` (`GroupID`),
  KEY `MemberID` (`MemberID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`ID`, `GroupID`, `MemberID`) VALUES
(1, 2, 1),
(2, 3, 2),
(3, 4, 3),
(4, 5, 6),
(5, 5, 5),
(6, 5, 7),
(7, 5, 8),
(8, 5, 9),
(9, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `group_roles`
--

CREATE TABLE IF NOT EXISTS `group_roles` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '0',
  `PermissionRoleID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `GroupID` (`GroupID`),
  KEY `PermissionRoleID` (`PermissionRoleID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `health`
--

CREATE TABLE IF NOT EXISTS `health` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Health') CHARACTER SET utf8 DEFAULT 'Health',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Blind` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Deaf` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Dumb` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `OtherPhsicalDisability` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `LearningDisability` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `MentalDisability` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `HearthDisease` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Diabetes` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Cancer` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `BloodPressure` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `OtherDisease` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `OccupationalDisease` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Alcoholic` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `OtherHealthInfo` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyMemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyMemberID` (`FamilyMemberID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `health`
--

INSERT INTO `health` (`ID`, `ClassName`, `LastEdited`, `Created`, `Blind`, `Deaf`, `Dumb`, `OtherPhsicalDisability`, `LearningDisability`, `MentalDisability`, `HearthDisease`, `Diabetes`, `Cancer`, `BloodPressure`, `OtherDisease`, `OccupationalDisease`, `Alcoholic`, `OtherHealthInfo`, `FamilyMemberID`) VALUES
(1, 'Health', '2016-02-12 13:22:19', '2016-02-12 13:21:40', 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, NULL, NULL, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('House') CHARACTER SET utf8 DEFAULT 'House',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Status` enum('own','rent','loan') CHARACTER SET utf8 DEFAULT 'own',
  `Amount` int(11) NOT NULL DEFAULT '0',
  `HoldsRationCard` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `CardType` varchar(4) CHARACTER SET utf8 DEFAULT NULL,
  `Type` enum('hut','ollapera','sheet','oddapera','concrete','2level','multilevel','flat') CHARACTER SET utf8 DEFAULT 'hut',
  `BuildYear` int(11) NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`ID`, `ClassName`, `LastEdited`, `Created`, `Status`, `Amount`, `HoldsRationCard`, `CardType`, `Type`, `BuildYear`, `FamilyID`) VALUES
(1, 'House', '2016-01-19 10:36:32', '2016-01-19 10:36:32', 'own', 0, 1, 'apl', 'oddapera', 1950, 1),
(2, 'House', '2016-02-17 16:23:50', '2016-02-17 16:23:50', 'rent', 10000, 1, 'apl', 'concrete', 2000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE IF NOT EXISTS `job` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Job') CHARACTER SET utf8 DEFAULT 'Job',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `CompanyName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Type` enum('govt','semi-govt','private','self','homemaker') CHARACTER SET utf8 DEFAULT 'govt',
  `Location` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `Pension` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `SavingScheme` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ESI` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `PF` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Salary` varchar(2) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyMemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyMemberID` (`FamilyMemberID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`ID`, `ClassName`, `LastEdited`, `Created`, `Title`, `CompanyName`, `Type`, `Location`, `Pension`, `SavingScheme`, `ESI`, `PF`, `Salary`, `FamilyMemberID`) VALUES
(1, 'Job', '2016-01-20 15:04:53', '2016-01-20 15:04:53', 'Web Developer', 'lastGrade', 'self', 'in', 0, 0, 0, 0, 'lo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Land') CHARACTER SET utf8 DEFAULT 'Land',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `HoldsLand` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Area` enum('nil','1-3cent','4-8cent','7-15cent','16-50cent','50-100cent','>1acre') CHARACTER SET utf8 DEFAULT 'nil',
  `InCent` int(11) NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `land`
--

INSERT INTO `land` (`ID`, `ClassName`, `LastEdited`, `Created`, `HoldsLand`, `Area`, `InCent`, `FamilyID`) VALUES
(1, 'Land', '2016-01-19 13:04:56', '2016-01-19 13:03:18', 1, '16-50cent', 50, 1),
(2, 'Land', '2016-02-17 16:24:15', '2016-02-17 16:24:15', 0, 'nil', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE IF NOT EXISTS `loan` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Loan') CHARACTER SET utf8 DEFAULT 'Loan',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `HasLoan` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Amount` int(11) NOT NULL DEFAULT '0',
  `FromWhere` enum('bank','private-bank','person') CHARACTER SET utf8 DEFAULT 'bank',
  `Reason` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`ID`, `ClassName`, `LastEdited`, `Created`, `HasLoan`, `Amount`, `FromWhere`, `Reason`, `FamilyID`) VALUES
(1, 'Loan', '2016-02-06 10:31:55', '2016-02-06 10:31:55', 1, 20000, 'bank', 'business', 5),
(2, 'Loan', '2016-02-26 05:38:37', '2016-02-26 05:38:37', 1, 20000, 'bank', 'edication', 1),
(3, 'Loan', '2016-02-26 05:38:37', '2016-02-26 05:38:37', 1, 20000, 'bank', 'edication', 1);

-- --------------------------------------------------------

--
-- Table structure for table `loginattempt`
--

CREATE TABLE IF NOT EXISTS `loginattempt` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('LoginAttempt') DEFAULT 'LoginAttempt',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Status` enum('Success','Failure') DEFAULT 'Success',
  `IP` varchar(255) DEFAULT NULL,
  `MemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `MemberID` (`MemberID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Media') CHARACTER SET utf8 DEFAULT 'Media',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Newspaper` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `NewspaperCount` int(11) NOT NULL DEFAULT '0',
  `NewspaperNames` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Magazine` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `KidsMagazine` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Television` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Internet` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Mobile` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `MobileCount` int(11) NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`ID`, `ClassName`, `LastEdited`, `Created`, `Newspaper`, `NewspaperCount`, `NewspaperNames`, `Magazine`, `KidsMagazine`, `Television`, `Internet`, `Mobile`, `MobileCount`, `FamilyID`) VALUES
(1, 'Media', '2016-02-04 11:11:21', '2016-02-04 11:11:21', 1, 2, 'Indian Express, Malayala Monorama', 1, 1, 1, 1, 1, 4, 5),
(2, 'Media', '2016-02-26 05:11:00', '2016-02-26 05:11:00', 1, 2, 'Malayala Manorama, Indian Express', 1, 0, 0, 0, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Member') DEFAULT 'Member',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Email` varchar(254) DEFAULT NULL,
  `TempIDHash` varchar(160) DEFAULT NULL,
  `TempIDExpired` datetime DEFAULT NULL,
  `Password` varchar(160) DEFAULT NULL,
  `RememberLoginToken` varchar(160) DEFAULT NULL,
  `NumVisit` int(11) NOT NULL DEFAULT '0',
  `LastVisited` datetime DEFAULT NULL,
  `AutoLoginHash` varchar(160) DEFAULT NULL,
  `AutoLoginExpired` datetime DEFAULT NULL,
  `PasswordEncryption` varchar(50) DEFAULT NULL,
  `Salt` varchar(50) DEFAULT NULL,
  `PasswordExpiry` date DEFAULT NULL,
  `LockedOutUntil` datetime DEFAULT NULL,
  `Locale` varchar(6) DEFAULT NULL,
  `FailedLoginCount` int(11) NOT NULL DEFAULT '0',
  `DateFormat` varchar(30) DEFAULT NULL,
  `TimeFormat` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `Email` (`Email`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`ID`, `ClassName`, `LastEdited`, `Created`, `FirstName`, `Surname`, `Email`, `TempIDHash`, `TempIDExpired`, `Password`, `RememberLoginToken`, `NumVisit`, `LastVisited`, `AutoLoginHash`, `AutoLoginExpired`, `PasswordEncryption`, `Salt`, `PasswordExpiry`, `LockedOutUntil`, `Locale`, `FailedLoginCount`, `DateFormat`, `TimeFormat`) VALUES
(1, 'Member', '2016-12-09 10:02:25', '2016-01-04 17:31:33', 'Thomas ', 'Paulson', 'admin', '4b53ecac9d2418d2a4a91febf574740b1eee61cd', '2016-12-12 10:02:25', '$2y$10$253a4c79d399ae9e821e9umDc.wRV8FNQt86eZmOjDcpAn/vSpWma', NULL, 85, '2016-12-09 14:44:36', NULL, NULL, 'blowfish', '10$253a4c79d399ae9e821e93', NULL, NULL, 'en_US', 0, NULL, NULL),
(2, 'Member', '2016-01-27 06:43:07', '2016-01-25 07:28:10', 'Manager', 'Diocesan', 'manager', '868a77b4252baf37f6b09e440c9f1013046e8f36', '2016-01-30 06:41:36', '$2y$10$3c9da5da5fc5385798e7auUOcpQUD/IOb/HygzmfqV4eRb899M3hW', NULL, 4, '2016-01-27 11:13:07', NULL, NULL, 'blowfish', '10$3c9da5da5fc5385798e7a0', NULL, NULL, 'en_US', 0, 'yyyy-MM-dd', 'H:mm'),
(3, 'Member', '2016-02-23 06:09:57', '2016-01-25 15:13:23', 'Alexander', 'Kannikatt', 'alex', '4436c9d1177c921dc0251ea01d19259aa253d8bd', '2016-02-26 06:09:57', '$2y$10$3478af83c65dd144ac4ecuA4qs5GoKmkQMpQLvsst3tF/9WYwo9MK', NULL, 12, '2016-02-23 11:35:58', NULL, NULL, 'blowfish', '10$3478af83c65dd144ac4ec7', NULL, NULL, 'en_US', 0, 'yyyy-MM-dd', 'H:mm'),
(5, 'Member', '2016-02-22 04:53:14', '2016-02-22 04:40:05', 'John', 'Mendez', 'john', '7d79223cdeb8e52db5aa4dca45a821dfe23f2d48', '2016-02-25 04:53:14', '$2y$10$c931f3b0c099cbde39e97uYcAgvRRc.e7qz9NeUn2eruqqkNsbQtq', NULL, 2, '2016-02-22 11:48:17', NULL, NULL, 'blowfish', '10$c931f3b0c099cbde39e973', NULL, NULL, 'en_US', 0, NULL, NULL),
(6, 'Member', '2016-02-23 06:59:35', '2016-02-22 04:48:37', 'Mathew', 'Kothakath', 'mathew', NULL, NULL, '$2y$10$034dcbe27ae80555d2405uTsdih1FeGH9aJ0ItC0UyI/3mcsWq1RW', NULL, 0, NULL, NULL, NULL, 'blowfish', '10$034dcbe27ae80555d24055', NULL, NULL, 'en_US', 0, NULL, NULL),
(10, 'Member', '2016-02-24 12:14:13', '2016-02-23 06:08:53', 'mary', NULL, 'mary', '206c4c54a6868c2db702edea16269e1759b0a7a8', '2016-02-27 12:14:13', '$2y$10$805d6b93a24b8314bb917un4PQKFcmXoZ9sD2cZn04K9qrtHPEaqq', NULL, 1, '2016-02-24 16:44:13', NULL, NULL, 'blowfish', '10$805d6b93a24b8314bb9177', NULL, NULL, 'en_US', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `memberpassword`
--

CREATE TABLE IF NOT EXISTS `memberpassword` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('MemberPassword') DEFAULT 'MemberPassword',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Password` varchar(160) DEFAULT NULL,
  `Salt` varchar(50) DEFAULT NULL,
  `PasswordEncryption` varchar(50) DEFAULT NULL,
  `MemberID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `MemberID` (`MemberID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `memberpassword`
--

INSERT INTO `memberpassword` (`ID`, `ClassName`, `LastEdited`, `Created`, `Password`, `Salt`, `PasswordEncryption`, `MemberID`) VALUES
(1, 'MemberPassword', '2016-01-04 17:31:34', '2016-01-04 17:31:34', '$2y$10$253a4c79d399ae9e821e9umDc.wRV8FNQt86eZmOjDcpAn/vSpWma', '10$253a4c79d399ae9e821e93', 'blowfish', 1),
(2, 'MemberPassword', '2016-01-23 07:42:47', '2016-01-23 07:42:47', '$2y$10$253a4c79d399ae9e821e9u.iNnaxQqJONxFy7x6H0qUcmUOgSxTPm', '10$253a4c79d399ae9e821e93', 'blowfish', 1),
(3, 'MemberPassword', '2016-01-23 07:43:25', '2016-01-23 07:43:25', '$2y$10$253a4c79d399ae9e821e9umDc.wRV8FNQt86eZmOjDcpAn/vSpWma', '10$253a4c79d399ae9e821e93', 'blowfish', 1),
(4, 'MemberPassword', '2016-01-25 07:28:11', '2016-01-25 07:28:11', '$2y$10$3c9da5da5fc5385798e7auUOcpQUD/IOb/HygzmfqV4eRb899M3hW', '10$3c9da5da5fc5385798e7a0', 'blowfish', 2),
(5, 'MemberPassword', '2016-01-25 15:13:23', '2016-01-25 15:13:23', '$2y$10$3478af83c65dd144ac4ecuTHLHBpL9BK3Hy2IsM5kK2HfA1sAA1ga', '10$3478af83c65dd144ac4ec7', 'blowfish', 3),
(6, 'MemberPassword', '2016-01-27 06:38:18', '2016-01-27 06:38:18', '$2y$10$3478af83c65dd144ac4ecuA4qs5GoKmkQMpQLvsst3tF/9WYwo9MK', '10$3478af83c65dd144ac4ec7', 'blowfish', 3),
(7, 'MemberPassword', '2016-02-20 13:43:53', '2016-02-20 13:43:53', '$2y$10$b6d4d978f68278e4a6295ufBrQcZ4nu9R2kGLu42TEQMOzMv0v32O', '10$b6d4d978f68278e4a62954', 'blowfish', 4),
(8, 'MemberPassword', '2016-02-22 04:40:05', '2016-02-22 04:40:05', '$2y$10$c931f3b0c099cbde39e97uYcAgvRRc.e7qz9NeUn2eruqqkNsbQtq', '10$c931f3b0c099cbde39e973', 'blowfish', 5),
(9, 'MemberPassword', '2016-02-22 04:48:37', '2016-02-22 04:48:37', '$2y$10$034dcbe27ae80555d2405uTsdih1FeGH9aJ0ItC0UyI/3mcsWq1RW', '10$034dcbe27ae80555d24055', 'blowfish', 6),
(18, 'MemberPassword', '2016-02-23 06:08:53', '2016-02-23 06:08:53', '$2y$10$805d6b93a24b8314bb917un4PQKFcmXoZ9sD2cZn04K9qrtHPEaqq', '10$805d6b93a24b8314bb9177', 'blowfish', 10),
(19, 'MemberPassword', '2016-02-23 06:59:35', '2016-02-23 06:59:35', '$2y$10$034dcbe27ae80555d2405uTsdih1FeGH9aJ0ItC0UyI/3mcsWq1RW', '10$034dcbe27ae80555d24055', 'blowfish', 6);

-- --------------------------------------------------------

--
-- Table structure for table `member_parishes`
--

CREATE TABLE IF NOT EXISTS `member_parishes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `MemberID` int(11) NOT NULL DEFAULT '0',
  `ParishID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `MemberID` (`MemberID`),
  KEY `ParishID` (`ParishID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `member_parishes`
--

INSERT INTO `member_parishes` (`ID`, `MemberID`, `ParishID`) VALUES
(2, 3, 10),
(3, 3, 4),
(4, 5, 10),
(5, 6, 10),
(6, 7, 10),
(7, 8, 10),
(8, 9, 10),
(9, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `monthlyexpense`
--

CREATE TABLE IF NOT EXISTS `monthlyexpense` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('MonthlyExpense') CHARACTER SET utf8 DEFAULT 'MonthlyExpense',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Food` int(11) NOT NULL DEFAULT '0',
  `Education` int(11) NOT NULL DEFAULT '0',
  `Medical` int(11) NOT NULL DEFAULT '0',
  `Mobile` int(11) NOT NULL DEFAULT '0',
  `Others` int(11) NOT NULL DEFAULT '0',
  `Total` int(11) NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `monthlyincome`
--

CREATE TABLE IF NOT EXISTS `monthlyincome` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('MonthlyIncome') CHARACTER SET utf8 DEFAULT 'MonthlyIncome',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Land` int(11) NOT NULL DEFAULT '0',
  `Job` int(11) NOT NULL DEFAULT '0',
  `Others` int(11) NOT NULL DEFAULT '0',
  `Total` int(11) NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `monthlyincome`
--

INSERT INTO `monthlyincome` (`ID`, `ClassName`, `LastEdited`, `Created`, `Land`, `Job`, `Others`, `Total`, `FamilyID`) VALUES
(1, 'MonthlyIncome', '2016-01-29 07:03:10', '2016-01-29 07:03:10', 1000, 1000, 1000, 3000, 1),
(2, 'MonthlyIncome', '2016-02-25 15:13:35', '2016-02-25 15:13:35', 1000, 1000, 1000, 3000, 6);

-- --------------------------------------------------------

--
-- Table structure for table `otherfacility`
--

CREATE TABLE IF NOT EXISTS `otherfacility` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('OtherFacility') CHARACTER SET utf8 DEFAULT 'OtherFacility',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `WaterWell` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `DrillWell` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `WaterConnection` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `RainwaterStorage` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Biogas` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Electricity` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `SolarEnergy` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `VegetableGarden` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `otherfacility`
--

INSERT INTO `otherfacility` (`ID`, `ClassName`, `LastEdited`, `Created`, `WaterWell`, `DrillWell`, `WaterConnection`, `RainwaterStorage`, `Biogas`, `Electricity`, `SolarEnergy`, `VegetableGarden`, `FamilyID`) VALUES
(1, 'OtherFacility', '2016-02-03 13:28:21', '2016-02-03 13:28:21', 0, 0, 0, 1, 1, 1, 1, 0, 5),
(2, 'OtherFacility', '2016-02-25 15:38:29', '2016-02-25 15:38:29', 1, 0, 0, 0, 0, 1, 0, 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `parish`
--

CREATE TABLE IF NOT EXISTS `parish` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Parish') DEFAULT 'Parish',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Location` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Landline` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `parish`
--

INSERT INTO `parish` (`ID`, `ClassName`, `LastEdited`, `Created`, `Title`, `Location`, `Address`, `Landline`) VALUES
(3, 'Parish', '2015-12-22 09:04:26', '2015-09-24 05:21:48', 'SANTA CRUZ BASILICA', 'Fort Cochin', 'Fort Cochin, Cochin - 682 001', '(0484) 2215799'),
(4, 'Parish', '2015-12-22 09:04:43', '2015-09-24 05:23:04', 'OUR LADY OF HOPE CHURCH', 'Vyppen', 'Vypeen, Cochin-682 510', '(0484) 2502366'),
(5, 'Parish', '2015-12-22 09:04:56', '2015-09-24 05:25:25', 'OUR LADY OF LIFE CHURCH', 'Mattanchery', 'Mattanchery, Cochin', '(0484) 2224828'),
(6, 'Parish', '2016-01-06 16:15:32', '2015-10-21 07:56:15', 'ST PETER & PAUL', 'Amaravathy', 'Amaravathy, Cochin- 682 001', '(0484) 2218724'),
(8, 'Parish', '2015-10-30 07:16:11', '2015-10-21 11:55:22', 'HOLY FAMILY CHURCH', 'Nazareth', 'Nazareth, Cochin-682 002', '(0484) 2220180'),
(9, 'Parish', '2016-01-06 16:15:55', '2015-10-21 11:56:56', 'ST JOSEPHS BETHLEHEM CHURCH', 'Chullickal', 'Chullickal, Cochin-682 005', '(0484) 2226793'),
(10, 'Parish', '2016-02-22 05:41:25', '2015-10-24 09:21:56', 'ST LAWRENCE CHURCH', 'Edakochi', 'Edakochi, Kerala, 682010', '284'),
(11, 'Parish', '2015-10-30 07:17:42', '2015-10-30 07:17:42', 'STELLA MARIS CHURCH ', 'Willingdon Island', 'Willingdon Island, Cochin 682003', '(0484) 2666184'),
(12, 'Parish', '0000-00-00 00:00:00', '2015-12-21 18:30:00', 'ST ANTONYS CHURCH', 'Kannamaly', 'Kannamaly, Cochin- 682 008', '(0484) 2247452'),
(13, 'Parish', '2015-12-21 18:30:00', '2015-12-21 18:30:00', 'ST THOMAS THE APOSTLE CHURCH', 'San Thome', 'San Thome, Thoppumpady, Cochin-682 005', '(0484) 2232244'),
(14, 'Parish', '2016-01-06 16:16:05', '2015-12-22 09:11:33', 'ST LOUIS CHURCH ', 'Mundamvely', 'Mundamvely, Cochin-682 507', '(0484) 2231545'),
(15, 'Parish', '2015-12-22 09:12:19', '2015-12-22 09:12:19', 'ST FRANCIS ASSISI CHURCH', 'Kattiparambu', 'Kattiparambu, Kannamaly P.O, Cochin - 682 008', '(0484) 2247340'),
(16, 'Parish', '2015-12-22 09:13:17', '2015-12-22 09:13:17', 'ST JOSEPH CHURCH', 'Cheriyakadavu', 'Cheriyakadavu, Kannamaly PO,  Cochin-682 008', '(0484)2247436'),
(17, 'Parish', '2015-12-22 09:13:48', '2015-12-22 09:13:48', 'ST SEBASTIANS CHURCH', 'Chellanam', 'Chellanam, Cochin 682 008', '(0484) 2249870'),
(19, 'Parish', '2015-12-22 09:15:37', '2015-12-22 09:15:37', 'ST SEBASTIANS CHURCH', 'Palluruthy', 'Palluruthy, Cochin-682 005', '(0484) 2231338'),
(20, 'Parish', '2015-12-22 09:19:47', '2015-12-22 09:19:47', 'ST JOSEPHS CHURCH', 'Chirakkal', 'Chirakkal, Palluruthy, Cochin-682 006', '(0484) 2231354'),
(21, 'Parish', '2016-01-06 16:16:40', '2015-12-22 09:20:19', 'ST LAWRENCE CHURCH', 'Nambiampuram', 'Nambiampuram, Palluruthy, Cochin-682 006', '(0484)2232188'),
(22, 'Parish', '2016-01-06 16:16:29', '2015-12-22 09:21:45', 'ST THOMAS MORE CHURCH ', 'Palluruthy', 'Palluruthy, Cochin-682 006', ' (0484) 223 3622'),
(23, 'Parish', '2015-12-22 09:22:33', '2015-12-22 09:22:33', 'SANTA CRUZ CHURCH ', ' Perumpadappu', ' Perumpadappu, Cochin- 682 006', '(0484) 2231430 '),
(24, 'Parish', '2015-12-22 09:23:12', '2015-12-22 09:23:12', 'ST MARYS CHURCH', 'North Edacochin', 'North Edacochin, Cochin- 682 006', '(0484) 2327149'),
(25, 'Parish', '2015-12-22 09:24:21', '2015-12-22 09:24:21', 'ST JOSEPH CHURCH', 'MADURAKAMPANY ', 'Madurakampany, Palluruthy, Cochin-682 006', ''),
(26, 'Parish', '2015-12-22 09:25:16', '2015-12-22 09:25:16', 'SACRED HEART CHURCH ', 'Kumbalanghy', 'Kumbalanghy, Cochin-682007', '(0484) 2240191'),
(27, 'Parish', '2015-12-22 09:49:44', '2015-12-22 09:49:44', 'ST JOSEPH''S CHURCH ', 'North Kumbalanghy', ' North Kumbalanghy,Cochin - 682 007', '(0484) 2240112'),
(28, 'Parish', '2015-12-22 09:50:32', '2015-12-22 09:50:32', 'ST GEORGE CHURCH ', 'Pazhangad', 'Pazhangad, Kumbalanghy,  Cochin- 682 007', '(0484) 2240083'),
(29, 'Parish', '2015-12-22 09:51:15', '2015-12-22 09:51:15', 'ST PETERS CHURCH', 'Kumbalanghy', 'Kumbalanghy, Cochin- 682 007', '(0484) 2240040'),
(30, 'Parish', '2015-12-22 09:51:53', '2015-12-22 09:51:53', 'MARTIN DE PORES CHURCH', ' Kallanchery', ' Kallanchery, Kumbalanghy, Cochin- 682 007', '(0484) 2240448'),
(31, 'Parish', '2015-12-22 09:52:30', '2015-12-22 09:52:30', 'IMMACULATE CONCEPTION CHURCH', ' Ezhupunna North', ' Ezhupunna North, Alappuzha- 688 548', '(0478)2 872607'),
(32, 'Parish', '2016-01-06 16:16:18', '2015-12-22 09:53:15', 'ST SEBASTIANS CHURCH', 'Neendakara', 'Neendakara, EzhupunnaNorth,  Alappuzha- 688 548', '(0478) 2873646'),
(33, 'Parish', '2015-12-22 09:54:53', '2015-12-22 09:54:53', 'SAN JOSE ETTUMKAL ', 'Kumbalanghy', 'Kumbalanghy, Cochin-682 007', ''),
(34, 'Parish', '2015-12-22 09:55:26', '2015-12-22 09:55:26', 'HOLY MARYS CHURCH', 'AZHEEKKAKAM', 'AZHEEKKAKAM, Kumbalanghy, Cochin-682 007', ''),
(35, 'Parish', '2015-12-22 09:56:26', '2015-12-22 09:56:26', 'ST AUGUSTINE CHURCH ', 'Aroor', 'Aroor , Alappuzha- 688 534', '(0478) 2872223'),
(36, 'Parish', '2015-12-22 10:15:16', '2015-12-22 10:15:16', 'ST JOSEPH CHURCH', ' Kumbalam', ' Kumbalam, Cochin-682 506', '(0478) 2700165 '),
(37, 'Parish', '2015-12-22 10:16:19', '2015-12-22 10:16:19', 'ST ANTONYS CHURCH ', ' Arookutty', ' Arookutty, Paduapuram, Alappuzha', '(0478) 2873122  '),
(38, 'Parish', '2015-12-22 10:17:31', '2015-12-22 10:17:31', 'ST FRANCIS XAVIER CHURCH ', 'Eramallore', 'Eramallore, Cherthala- 688 533', '(0478) 2872229'),
(39, 'Parish', '2015-12-22 10:18:52', '2015-12-22 10:18:52', 'ST JOSEPH CHURCH ', 'Vallethode', 'Vallethode, Cherthala', '(0484) 2563117'),
(40, 'Parish', '2015-12-22 10:20:01', '2015-12-22 10:20:01', 'OUR LADY OF FATIMA CHURCH,', ' Kodamthuruth', ' Kodamthuruth, Kuthiathode P.O., Cherthala', '(0478) 2562017'),
(41, 'Parish', '2015-12-22 10:22:40', '2015-12-22 10:22:40', 'OUR LADY OF RANSOM CHURCH', 'Chandiroor P.O', 'Chandiroor P.O, Cherthala- 688 533', '(0478) - 2874217'),
(42, 'Parish', '2015-12-22 10:24:54', '2015-12-22 10:24:54', 'ST SEBASTIANS CHURCH', ' Karunyapuram', 'KARUNYAPURAM, Vallethode (Kailasam), Cherthala 688 550', ''),
(43, 'Parish', '2015-12-23 02:16:33', '2015-12-23 02:16:33', 'LITTLE FLOWER CHURCH', 'PERUMBALAM', 'PERUMBALAM , Cherthala- 688 533, Alappuzha', ''),
(44, 'Parish', '2015-12-23 02:17:09', '2015-12-23 02:17:09', 'OUR LADY OF PURIFICATION CHURCH', 'Thankey', 'Thankey, Vayalar West, Cherthala, Alappuzha- 688 529', '(0478) 2812065'),
(45, 'Parish', '2015-12-23 02:18:07', '2015-12-23 02:18:07', 'ST GEORGES CHURCH', 'Arthumkal', 'Arthumkal, Alapuzha- 688 530', '(0478) 2572403'),
(46, 'Parish', '2016-01-06 16:17:01', '2015-12-23 02:18:50', 'ST FRANCIS XAVIER''S CHURCH', 'Vayalar East', 'Vayalar East, Cherthala, Alapuzha- 688 536', '(0478) 2813477'),
(47, 'Parish', '2015-12-23 02:19:36', '2015-12-23 02:19:36', 'OUR LADY OF ASSUMPTION CHURCH ', 'Poomkavu,', 'Poomkavu, Mararikulam South , Alapuzha- 688 521', '(0478) 2258430 ');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE IF NOT EXISTS `permission` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Permission') DEFAULT 'Permission',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `Arg` int(11) NOT NULL DEFAULT '0',
  `Type` int(11) NOT NULL DEFAULT '1',
  `GroupID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `GroupID` (`GroupID`),
  KEY `Code` (`Code`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`ID`, `ClassName`, `LastEdited`, `Created`, `Code`, `Arg`, `Type`, `GroupID`) VALUES
(1, 'Permission', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'CMS_ACCESS_CMSMain', 0, 1, 1),
(2, 'Permission', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'CMS_ACCESS_AssetAdmin', 0, 1, 1),
(3, 'Permission', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'CMS_ACCESS_ReportAdmin', 0, 1, 1),
(4, 'Permission', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'SITETREE_REORGANISE', 0, 1, 1),
(5, 'Permission', '2016-01-04 17:31:33', '2016-01-04 17:31:33', 'ADMIN', 0, 1, 2),
(63, 'Permission', '2016-01-25 15:15:05', '2016-01-25 15:15:05', 'CMS_ACCESS_ParishAdmin', 0, 1, 4),
(64, 'Permission', '2016-01-25 15:15:05', '2016-01-25 15:15:05', 'CommunityGroup_VIEW', 0, 1, 4),
(65, 'Permission', '2016-01-25 15:15:05', '2016-01-25 15:15:05', 'PARISH_VIEW', 0, 1, 4),
(66, 'Permission', '2016-01-27 07:16:33', '2016-01-27 07:16:33', 'CMS_ACCESS_LeftAndMain', 0, 1, 3),
(67, 'Permission', '2016-01-27 07:16:33', '2016-01-27 07:16:33', 'CommunityGroup_CREATE', 0, 1, 3),
(68, 'Permission', '2016-01-27 07:16:33', '2016-01-27 07:16:33', 'PARISH_CREATE', 0, 1, 3),
(69, 'Permission', '2016-01-27 07:16:33', '2016-01-27 07:16:33', 'CommunityGroup_DELETE', 0, 1, 3),
(70, 'Permission', '2016-01-27 07:16:33', '2016-01-27 07:16:33', 'PARISH_DELETE', 0, 1, 3),
(71, 'Permission', '2016-01-27 07:16:34', '2016-01-27 07:16:34', 'CommunityGroup_EDIT', 0, 1, 3),
(72, 'Permission', '2016-01-27 07:16:34', '2016-01-27 07:16:34', 'PARISH_EDIT', 0, 1, 3),
(73, 'Permission', '2016-01-27 07:16:34', '2016-01-27 07:16:34', 'CommunityGroup_VIEW', 0, 1, 3),
(74, 'Permission', '2016-01-27 07:16:34', '2016-01-27 07:16:34', 'PARISH_VIEW', 0, 1, 3),
(75, 'Permission', '2016-02-22 04:44:47', '2016-02-22 04:44:47', 'CMS_ACCESS_ParishAdmin', 0, 1, 5),
(76, 'Permission', '2016-02-22 04:44:48', '2016-02-22 04:44:48', 'CommunityGroup_VIEW', 0, 1, 5),
(77, 'Permission', '2016-02-22 04:44:48', '2016-02-22 04:44:48', 'PARISH_VIEW', 0, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `permissionrole`
--

CREATE TABLE IF NOT EXISTS `permissionrole` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('PermissionRole') DEFAULT 'PermissionRole',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Title` varchar(50) DEFAULT NULL,
  `OnlyAdminCanApply` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `permissionrolecode`
--

CREATE TABLE IF NOT EXISTS `permissionrolecode` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('PermissionRoleCode') DEFAULT 'PermissionRoleCode',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Code` varchar(50) DEFAULT NULL,
  `RoleID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `RoleID` (`RoleID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `saving`
--

CREATE TABLE IF NOT EXISTS `saving` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Saving') CHARACTER SET utf8 DEFAULT 'Saving',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `EducationFund` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `LifeInsurance` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `HealthInsurance` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `DeathFund` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `MarriageFund` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Mythri` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Chitty` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Others` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Specify` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `saving`
--

INSERT INTO `saving` (`ID`, `ClassName`, `LastEdited`, `Created`, `EducationFund`, `LifeInsurance`, `HealthInsurance`, `DeathFund`, `MarriageFund`, `Mythri`, `Chitty`, `Others`, `Specify`, `FamilyID`) VALUES
(1, 'Saving', '2016-02-08 05:53:03', '2016-02-08 05:53:03', 1, 1, 0, 0, 0, 0, 0, 1, 'no not', 3),
(3, 'Saving', '2016-02-26 05:43:21', '2016-02-26 05:42:21', 1, 0, 0, 1, 0, 0, 0, 1, 'Bitcoin Deposit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shiftedfrom`
--

CREATE TABLE IF NOT EXISTS `shiftedfrom` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('ShiftedFrom') CHARACTER SET utf8 DEFAULT 'ShiftedFrom',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `FromWhere` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `Reason` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `shiftedfrom`
--

INSERT INTO `shiftedfrom` (`ID`, `ClassName`, `LastEdited`, `Created`, `Status`, `FromWhere`, `Reason`, `FamilyID`) VALUES
(1, 'ShiftedFrom', '2016-01-20 10:18:30', '2016-01-20 10:18:30', 1, 'Qatar', 'Retire Life', 2),
(2, 'ShiftedFrom', '2016-02-17 16:24:45', '2016-02-17 16:24:45', 1, 'Bangalore', 'Work', 6);

-- --------------------------------------------------------

--
-- Table structure for table `talent`
--

CREATE TABLE IF NOT EXISTS `talent` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Talent') CHARACTER SET utf8 DEFAULT 'Talent',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Remark` mediumtext CHARACTER SET utf8,
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ClassName` enum('Vehicle') CHARACTER SET utf8 DEFAULT 'Vehicle',
  `LastEdited` datetime DEFAULT NULL,
  `Created` datetime DEFAULT NULL,
  `Cycle` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Bike` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Autoriskaw` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `LightVehicle` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `HeavyCommercial` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `CountryBoat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `Vallam` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `FishingBoat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `TouristBoat` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `FamilyID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FamilyID` (`FamilyID`),
  KEY `ClassName` (`ClassName`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`ID`, `ClassName`, `LastEdited`, `Created`, `Cycle`, `Bike`, `Autoriskaw`, `LightVehicle`, `HeavyCommercial`, `CountryBoat`, `Vallam`, `FishingBoat`, `TouristBoat`, `FamilyID`) VALUES
(1, 'Vehicle', '2016-02-01 13:03:30', '2016-02-01 13:03:30', 1, 1, 1, 0, 0, 0, 0, 0, 0, 6),
(2, 'Vehicle', '2016-02-03 13:27:04', '2016-02-03 13:27:04', 1, 1, 0, 1, 1, 0, 0, 0, 0, 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
