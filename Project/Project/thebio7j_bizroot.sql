-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2018 at 09:16 PM
-- Server version: 5.6.36-82.0-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thebio7j_bizroot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adminID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ismap` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`adminID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `ismap`) VALUES
(1, 'Admin', '$2y$10$m5f9wrwo5/KX0QfQfrVqzus6nDChmQ47LqwDruTRKzTf9sXywn2ei', 'slider');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE IF NOT EXISTS `business` (
  `businessID` int(11) NOT NULL AUTO_INCREMENT,
  `businessEmail` varchar(255) NOT NULL,
  `businessPassword` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`businessID`),
  UNIQUE KEY `businessEmail` (`businessEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessID`, `businessEmail`, `businessPassword`, `isActive`, `resetToken`, `resetComplete`) VALUES
(42, 'kbkhairnar26@gmail.com', '$2y$10$SwNHJaGouPQRbhfNm41U4.4AXpBYj6XCL/s2Z4jXgrSVrS/SrSVE6', 'Yes', NULL, NULL),
(44, 'shivkantbkadam@gmail.com', '$2y$10$RwwUS1LqBw.zBACO3JNAAejQL.VaGyjD4ctKyET.Wy.7FkyD19eVa', '25b72f6e38f219f1ed10bf1d224732ca', NULL, NULL),
(38, 'kadam.shiva@gmail.com', '$2y$10$/Dum4xy0xq3FXbuJ9ybQWuITgRMTtrWkXdKjupjt5QZ1kWBIpaI2y', '65c8988fc61a372a57e7768678c57091', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `businessaddress`
--

CREATE TABLE IF NOT EXISTS `businessaddress` (
  `businessAddressId` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `businessStreetAddress` text,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessAddressId`),
  KEY `countryID` (`countryID`),
  KEY `stateID` (`stateID`),
  KEY `cityID` (`cityID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `businessaddress`
--

INSERT INTO `businessaddress` (`businessAddressId`, `businessID`, `businessStreetAddress`, `countryID`, `stateID`, `cityID`, `zipCode`) VALUES
(9, 38, '', 0, 0, 0, 0),
(15, 44, 'Pune', 91, 22, 6, 411041),
(13, 42, '', 91, 0, 0, 0),
(14, 43, '', 91, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `businesscontactinformation`
--

CREATE TABLE IF NOT EXISTS `businesscontactinformation` (
  `businessContactID` bigint(20) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `businessWebsite` varchar(255) DEFAULT NULL,
  `businessMobileNo` int(20) DEFAULT NULL,
  `businessContact2` bigint(20) DEFAULT NULL,
  `businessLandline` bigint(20) DEFAULT NULL,
  `businessFaxNo` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`businessContactID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `businesscontactinformation`
--

INSERT INTO `businesscontactinformation` (`businessContactID`, `businessID`, `businessName`, `businessWebsite`, `businessMobileNo`, `businessContact2`, `businessLandline`, `businessFaxNo`) VALUES
(9, 38, 'shivkant kadam', '', 0, 0, 0, 0),
(15, 44, 'Shivkant Kadam', '', 2147483647, 0, 0, 0),
(13, 42, 'Krishikesh Khairanr', '', 0, 0, 0, 0),
(14, 43, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `businessenquriy`
--

CREATE TABLE IF NOT EXISTS `businessenquriy` (
  `businessEnquriyID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `message` text,
  `businessID` int(255) NOT NULL,
  PRIMARY KEY (`businessEnquriyID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `businessindustry`
--

CREATE TABLE IF NOT EXISTS `businessindustry` (
  `businessIndustryID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessIndustryID`),
  KEY `businessID` (`businessID`),
  KEY `industryID` (`industryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `businessindustry`
--

INSERT INTO `businessindustry` (`businessIndustryID`, `businessID`, `industryID`) VALUES
(8, 37, 6),
(11, 40, 25),
(10, 39, 26),
(9, 38, 0),
(7, 36, 6),
(12, 41, 8),
(13, 42, 0),
(14, 43, 6),
(15, 44, 3);

-- --------------------------------------------------------

--
-- Table structure for table `businesslead`
--

CREATE TABLE IF NOT EXISTS `businesslead` (
  `businessLeadId` int(11) NOT NULL AUTO_INCREMENT,
  `businessName` varchar(255) DEFAULT NULL,
  `businessEmail` varchar(255) DEFAULT NULL,
  `businessMobile` bigint(20) DEFAULT NULL,
  `offerType` text,
  `leadName` text,
  `leadDescription` text,
  `selectType` varchar(255) DEFAULT NULL,
  `businessID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dateofpost` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`businessLeadId`),
  KEY `businessID` (`businessID`),
  KEY `industryID` (`industryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `businessleadimage`
--

CREATE TABLE IF NOT EXISTS `businessleadimage` (
  `businessLeadImageID` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagePath` text,
  `businessLeadId` int(11) DEFAULT NULL,
  PRIMARY KEY (`businessLeadImageID`),
  KEY `businessLeadId` (`businessLeadId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

-- --------------------------------------------------------

--
-- Table structure for table `businesslogo`
--

CREATE TABLE IF NOT EXISTS `businesslogo` (
  `businesslogoID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `busienssLogoPath` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`businesslogoID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `businesslogo`
--

INSERT INTO `businesslogo` (`businesslogoID`, `businessID`, `busienssLogoPath`) VALUES
(40, 44, 'Mylogo/1ce5cf33b22becab68ae7ff9643eff07.png'),
(39, 43, 'Mylogo/default.jpg'),
(38, 42, 'Mylogo/8c159c03520a3bafbe54ced779bec96c.png'),
(36, 40, 'Mylogo/default.jpg'),
(37, 41, 'Mylogo/default.jpg'),
(34, 38, 'Mylogo/default.jpg'),
(35, 39, 'Mylogo/bb86d50fdaab1b22dd1f25474d5f3dd1.png'),
(33, 37, 'Mylogo/default.png'),
(32, 36, 'Mylogo/default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `businessprofile`
--

CREATE TABLE IF NOT EXISTS `businessprofile` (
  `businessProfilePersonID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `establishmentYear` int(11) DEFAULT NULL,
  `levelToExpand` varchar(255) DEFAULT NULL,
  `aboutCompany` text,
  `ProductAndServices` text,
  `isSampleProvide` varchar(255) DEFAULT NULL,
  `firmTypeName` varchar(255) DEFAULT NULL,
  `businessOffer` varchar(255) NOT NULL DEFAULT 'No Offer',
  `status` varchar(255) NOT NULL DEFAULT 'NOT FEATURED',
  `isverified` varchar(255) NOT NULL DEFAULT 'Not Verified',
  PRIMARY KEY (`businessProfilePersonID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `businessprofile`
--

INSERT INTO `businessprofile` (`businessProfilePersonID`, `businessID`, `companyName`, `establishmentYear`, `levelToExpand`, `aboutCompany`, `ProductAndServices`, `isSampleProvide`, `firmTypeName`, `businessOffer`, `status`, `isverified`) VALUES
(41, 43, 'TheBizRoot', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'partnership', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(36, 38, '', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'organization', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(42, 44, 'Test', 2015, '', 'We are MNC', 'Product/Service', 'yes', 'proprietorship', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(40, 42, 'Stuyd', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'proprietorship', 'No Offer', 'NOT FEATURED', 'Not Verified');

-- --------------------------------------------------------

--
-- Table structure for table `businesssalesperson`
--

CREATE TABLE IF NOT EXISTS `businesssalesperson` (
  `businessSalesPersonID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `busienssPersonName` varchar(255) DEFAULT NULL,
  `busienssPersonEmail` varchar(255) DEFAULT NULL,
  `busienssPersonContact` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`businessSalesPersonID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `businesssalesperson`
--

INSERT INTO `businesssalesperson` (`businessSalesPersonID`, `businessID`, `busienssPersonName`, `busienssPersonEmail`, `busienssPersonContact`) VALUES
(36, 38, '', '', 0),
(42, 44, '', '', 0),
(40, 42, '', '', 0),
(41, 43, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `businesssocialinformation`
--

CREATE TABLE IF NOT EXISTS `businesssocialinformation` (
  `businessSocialInformationID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `facebookLink` varchar(255) NOT NULL,
  `instagramLink` varchar(255) DEFAULT NULL,
  `twitterLink` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  PRIMARY KEY (`businessSocialInformationID`),
  UNIQUE KEY `facebookLink` (`facebookLink`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `businesssupportperson`
--

CREATE TABLE IF NOT EXISTS `businesssupportperson` (
  `businessSupportPersonID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `busienssPersonName` varchar(255) DEFAULT NULL,
  `busienssPersonEmail` varchar(255) DEFAULT NULL,
  `busienssPersonContact` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`businessSupportPersonID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `businesssupportperson`
--

INSERT INTO `businesssupportperson` (`businessSupportPersonID`, `businessID`, `busienssPersonName`, `busienssPersonEmail`, `busienssPersonContact`) VALUES
(42, 44, '', '', 0),
(40, 42, '', '', 0),
(41, 43, '', '', 0),
(36, 38, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE IF NOT EXISTS `businesstype` (
  `businesstypeID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `busienssTypeName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`businesstypeID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `businesstype`
--

INSERT INTO `businesstype` (`businesstypeID`, `businessID`, `busienssTypeName`) VALUES
(43, 42, 'Exporter'),
(42, 42, 'Manufacturer'),
(41, 41, 'Service Provider'),
(40, 41, 'Wholesale Supplier'),
(39, 41, 'Importer'),
(38, 41, 'Exporter'),
(37, 41, 'Manufacturer'),
(36, 40, 'Importer'),
(35, 40, 'Exporter'),
(34, 40, 'Manufacturer'),
(33, 39, 'Wholesale Supplier'),
(32, 39, 'Importer'),
(31, 39, 'Manufacturer'),
(30, 37, 'Service Provider'),
(29, 36, 'Service Provider'),
(44, 43, 'Manufacturer'),
(45, 43, 'Service Provider'),
(46, 44, 'Manufacturer'),
(47, 44, 'Exporter'),
(48, 44, 'Wholesale Supplier'),
(49, 44, 'Service Provider');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `cityID` int(11) NOT NULL AUTO_INCREMENT,
  `cityName` varchar(255) NOT NULL,
  `stateID` int(11) DEFAULT NULL,
  PRIMARY KEY (`cityID`),
  UNIQUE KEY `cityName` (`cityName`),
  KEY `stateID` (`stateID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `cityName`, `stateID`) VALUES
(6, 'Pune', 22),
(5, 'Mumbai', 22);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `clientID` int(11) NOT NULL AUTO_INCREMENT,
  `clientEmail` varchar(255) NOT NULL,
  `clientPassword` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`clientID`),
  UNIQUE KEY `clientEmail` (`clientEmail`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `clientEmail`, `clientPassword`, `isActive`, `resetToken`, `resetComplete`) VALUES
(6, 'krishikhairnar@gmail.com', '$2y$10$Z26lKj24iZqBTOQ4rtK7yOixi7nOjdj5E1PXPDszjkhC/fbxYM4q2', 'Yes', NULL, NULL),
(7, 'kadam.shiva@gmail.com', '$2y$10$UPeqCduZdEHwhepcbPcXQexJrCPwLJhWVAWdnzrT8LG/VCyX72dvC', '9ecbbb8a7f394d6e63b27401ea7bbf94', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clientaddress`
--

CREATE TABLE IF NOT EXISTS `clientaddress` (
  `clientAddressId` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` int(11) NOT NULL,
  `clientStreetAddress` varchar(255) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientAddressId`),
  KEY `countryID` (`countryID`),
  KEY `stateID` (`stateID`),
  KEY `cityID` (`cityID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `clientaddress`
--

INSERT INTO `clientaddress` (`clientAddressId`, `clientID`, `clientStreetAddress`, `countryID`, `stateID`, `cityID`, `zipCode`) VALUES
(4, 6, '', 91, 0, 0, 0),
(5, 7, 'Narhe,Pune', 91, 22, 6, 411041),
(6, 8, '', 91, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientcontactinformation`
--

CREATE TABLE IF NOT EXISTS `clientcontactinformation` (
  `clientContactID` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` int(11) NOT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `clientWebsite` varchar(255) DEFAULT NULL,
  `clientMobileNo` int(11) DEFAULT NULL,
  `clientContact2` int(11) DEFAULT NULL,
  `clientLandline` int(11) DEFAULT NULL,
  `clientFaxNo` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientContactID`),
  KEY `clientID` (`clientID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `clientcontactinformation`
--

INSERT INTO `clientcontactinformation` (`clientContactID`, `clientID`, `clientName`, `clientWebsite`, `clientMobileNo`, `clientContact2`, `clientLandline`, `clientFaxNo`) VALUES
(5, 7, 'Shivkant Kadam', '', 2147483647, 0, 0, 0),
(4, 6, 'Krishikesh Khairnar', '', 2147483647, 0, 0, 0),
(6, 8, 'Ajit', '', 2147483647, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientindustry`
--

CREATE TABLE IF NOT EXISTS `clientindustry` (
  `clientIndustryID` int(11) NOT NULL AUTO_INCREMENT,
  `clientID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `IndustrySublistID` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientIndustryID`),
  KEY `clientID` (`clientID`),
  KEY `industryID` (`industryID`),
  KEY `IndustrySublistID` (`IndustrySublistID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `clientindustry`
--

INSERT INTO `clientindustry` (`clientIndustryID`, `clientID`, `industryID`, `IndustrySublistID`) VALUES
(5, 7, 1, 19),
(4, 6, 17, 69),
(6, 8, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientlead`
--

CREATE TABLE IF NOT EXISTS `clientlead` (
  `clientLeadId` int(11) NOT NULL AUTO_INCREMENT,
  `clientName` varchar(255) DEFAULT NULL,
  `clientEmail` varchar(255) DEFAULT NULL,
  `clientMobile` bigint(20) DEFAULT NULL,
  `offerType` text,
  `leadName` text,
  `leadDescription` text,
  `selectType` varchar(255) DEFAULT NULL,
  `clientID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `dateofpost` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`clientLeadId`),
  KEY `clientID` (`clientID`),
  KEY `industryID` (`industryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientleadimage`
--

CREATE TABLE IF NOT EXISTS `clientleadimage` (
  `clientLeadImage` bigint(20) NOT NULL AUTO_INCREMENT,
  `imagePath` text,
  `clientLeadId` int(11) DEFAULT NULL,
  PRIMARY KEY (`clientLeadImage`),
  KEY `clientLeadId` (`clientLeadId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=202 ;

-- --------------------------------------------------------

--
-- Table structure for table `clientprductwishlist`
--

CREATE TABLE IF NOT EXISTS `clientprductwishlist` (
  `wishlistID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) DEFAULT NULL,
  `clientID` int(11) DEFAULT NULL,
  PRIMARY KEY (`wishlistID`),
  KEY `productID` (`productID`),
  KEY `clientID` (`clientID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `countryID` int(11) NOT NULL AUTO_INCREMENT,
  `countryName` varchar(250) NOT NULL,
  `countryFlag` varchar(250) NOT NULL,
  `countrycode` char(3) NOT NULL,
  `country-codes` char(2) NOT NULL,
  PRIMARY KEY (`countryID`),
  UNIQUE KEY `countryName` (`countryName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=255 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`countryID`, `countryName`, `countryFlag`, `countrycode`, `country-codes`) VALUES
(4, 'Afghanistan', 'images\\country\\af.png', 'AFG', 'AF'),
(5, 'Aland', 'images\\country\\ax.png', 'ALA', 'AX'),
(6, 'Albania', 'images\\country\\al.png', 'ALB', 'AL'),
(7, 'Algeria', 'images\\country\\dz.png', 'DZA', 'DZ'),
(8, 'American Samoa', 'images\\country\\as.png', 'ASM', 'AS'),
(9, 'Andorra', 'images\\country\\ad.png', 'AND', 'AD'),
(10, 'Angola', 'images\\country\\ao.png', 'AGO', 'AO'),
(11, 'Anguilla', 'images\\country\\ai.png', 'AIA', 'AI'),
(12, 'Antarctica', 'images\\country\\aq.png', 'ATA', 'AQ'),
(13, 'Antigua and Barbuda', 'images\\country\\ag.png', 'ATG', 'AG'),
(14, 'Argentina', 'images\\country\\ar.png', 'ARG', 'AR'),
(15, 'Armenia', 'images\\country\\am.png', 'ARM', 'AM'),
(16, 'Aruba', 'images\\country\\aw.png', 'ABW', 'AW'),
(17, 'Australia', 'images\\country\\au.png', 'AUS', 'AU'),
(18, 'Austria', 'images\\country\\at.png', 'AUT', 'AT'),
(19, 'Azerbaijan', 'images\\country\\az.png', 'AZE', 'AZ'),
(20, 'Bahamas', 'images\\country\\bs.png', 'BHS', 'BS'),
(21, 'Bahrain', 'images\\country\\bh.png', 'BHR', 'BH'),
(22, 'Bangladesh', 'images\\country\\bd.png', 'BGD', 'BD'),
(23, 'Barbados', 'images\\country\\bb.png', 'BRB', 'BB'),
(24, 'Belarus', 'images\\country\\by.png', 'BLR', 'BY'),
(25, 'Belgium', 'images\\country\\be.png', 'BEL', 'BE'),
(26, 'Belize', 'images\\country\\bz.png', 'BLZ', 'BZ'),
(27, 'Benin', 'images\\country\\bj.png', 'BEN', 'BJ'),
(28, 'Bermuda', 'images\\country\\bm.png', 'BMU', 'BM'),
(29, 'Bhutan', 'images\\country\\bt.png', 'BTN', 'BT'),
(30, 'Bolivia', 'images\\country\\bo.png', 'BOL', 'BO'),
(31, 'Bonaire', 'images\\country\\bq.png', 'BES', 'BQ'),
(32, 'Bosnia and Herzegovina', 'images\\country\\ba.png', 'BIH', 'BA'),
(33, 'Botswana', 'images\\country\\bw.png', 'BWA', 'BW'),
(34, 'Bouvet Island', 'images\\country\\bv.png', 'BVT', 'BV'),
(35, 'Brazil', 'images\\country\\br.png', 'BRA', 'BR'),
(36, 'British Indian Ocean Territory', 'images\\country\\io.png', 'IOT', 'IO'),
(37, 'British Virgin Islands', 'images\\country\\vg.png', 'VGB', 'VG'),
(38, 'Brunei', 'images\\country\\bn.png', 'BRN', 'BN'),
(39, 'Bulgaria', 'images\\country\\bg.png', 'BGR', 'BG'),
(40, 'Burkina Faso', 'images\\country\\bf.png', 'BFA', 'BF'),
(41, 'Burundi', 'images\\country\\bi.png', 'BDI', 'BI'),
(42, 'Cambodia', 'images\\country\\kh.png', 'KHM', 'KH'),
(43, 'Cameroon', '', 'CMR', 'CM'),
(44, 'Canada', '', 'CAN', 'CA'),
(45, 'Cape Verde', '', 'CPV', 'CV'),
(46, 'Cayman Islands', '', 'CYM', 'KY'),
(47, 'Central African Republic', '', 'CAF', 'CF'),
(48, 'Chad', '', 'TCD', 'TD'),
(49, 'Chile', '', 'CHL', 'CL'),
(50, 'China', '', 'CHN', 'CN'),
(51, 'Christmas Island', '', 'CXR', 'CX'),
(52, 'Cocos [Keeling] Islands', '', 'CCK', 'CC'),
(53, 'Colombia', '', 'COL', 'CO'),
(54, 'Comoros', '', 'COM', 'KM'),
(55, 'Cook Islands', '', 'COK', 'CK'),
(56, 'Costa Rica', '', 'CRI', 'CR'),
(57, 'Croatia', '', 'HRV', 'HR'),
(58, 'Cuba', '', 'CUB', 'CU'),
(59, 'Curacao', '', 'CUW', 'CW'),
(60, 'Cyprus', '', 'CYP', 'CY'),
(61, 'Czech Republic', '', 'CZE', 'CZ'),
(62, 'Democratic Republic of the Congo', '', 'COD', 'CD'),
(63, 'Denmark', '', 'DNK', 'DK'),
(64, 'Djibouti', '', 'DJI', 'DJ'),
(65, 'Dominica', '', 'DMA', 'DM'),
(66, 'Dominican Republic', '', 'DOM', 'DO'),
(67, 'East Timor', '', 'TLS', 'TL'),
(68, 'Ecuador', '', 'ECU', 'EC'),
(69, 'Egypt', '', 'EGY', 'EG'),
(70, 'El Salvador', '', 'SLV', 'SV'),
(71, 'Equatorial Guinea', '', 'GNQ', 'GQ'),
(72, 'Eritrea', '', 'ERI', 'ER'),
(73, 'Estonia', '', 'EST', 'EE'),
(74, 'Ethiopia', '', 'ETH', 'ET'),
(75, 'Falkland Islands', '', 'FLK', 'FK'),
(76, 'Faroe Islands', '', 'FRO', 'FO'),
(77, 'Fiji', '', 'FJI', 'FJ'),
(78, 'Finland', '', 'FIN', 'FI'),
(79, 'France', '', 'FRA', 'FR'),
(80, 'French Guiana', '', 'GUF', 'GF'),
(81, 'French Polynesia', '', 'PYF', 'PF'),
(82, 'French Southern Territories', '', 'ATF', 'TF'),
(83, 'Gabon', '', 'GAB', 'GA'),
(84, 'Gambia', '', 'GMB', 'GM'),
(85, 'Georgia', '', 'GEO', 'GE'),
(86, 'Germany', '', 'DEU', 'DE'),
(87, 'Ghana', '', 'GHA', 'GH'),
(88, 'Gibraltar', '', 'GIB', 'GI'),
(89, 'Greece', '', 'GRC', 'GR'),
(90, 'Greenland', '', 'GRL', 'GL'),
(92, 'Guadeloupe', '', 'GLP', 'GP'),
(93, 'Guam', '', 'GUM', 'GU'),
(94, 'Guatemala', '', 'GTM', 'GT'),
(95, 'Guernsey', '', 'GGY', 'GG'),
(96, 'Guinea', '', 'GIN', 'GN'),
(97, 'Guinea-Bissau', '', 'GNB', 'GW'),
(98, 'Guyana', '', 'GUY', 'GY'),
(99, 'Haiti', '', 'HTI', 'HT'),
(100, 'Heard Island and McDonald Islands', '', 'HMD', 'HM'),
(101, 'Honduras', '', 'HND', 'HN'),
(102, 'Hong Kong', '', 'HKG', 'HK'),
(103, 'Hungary', '', 'HUN', 'HU'),
(104, 'Iceland', '', 'ISL', 'IS'),
(91, 'India', 'images\\country\\in.png', 'IND', 'IN'),
(106, 'Indonesia', '', 'IDN', 'ID'),
(107, 'Iran', '', 'IRN', 'IR'),
(108, 'Iraq', '', 'IRQ', 'IQ'),
(109, 'Ireland', '', 'IRL', 'IE'),
(110, 'Isle of Man', '', 'IMN', 'IM'),
(111, 'Israel', '', 'ISR', 'IL'),
(112, 'Italy', '', 'ITA', 'IT'),
(113, 'Ivory Coast', '', 'CIV', 'CI'),
(114, 'Jamaica', '', 'JAM', 'JM'),
(115, 'Japan', '', 'JPN', 'JP'),
(116, 'Jersey', '', 'JEY', 'JE'),
(117, 'Jordan', '', 'JOR', 'JO'),
(118, 'Kazakhstan', '', 'KAZ', 'KZ'),
(119, 'Kenya', '', 'KEN', 'KE'),
(120, 'Kiribati', '', 'KIR', 'KI'),
(121, 'Kosovo', '', 'XKX', 'XK'),
(122, 'Kuwait', '', 'KWT', 'KW'),
(123, 'Kyrgyzstan', '', 'KGZ', 'KG'),
(124, 'Laos', '', 'LAO', 'LA'),
(125, 'Latvia', '', 'LVA', 'LV'),
(126, 'Lebanon', '', 'LBN', 'LB'),
(127, 'Lesotho', '', 'LSO', 'LS'),
(128, 'Liberia', '', 'LBR', 'LR'),
(129, 'Libya', '', 'LBY', 'LY'),
(130, 'Liechtenstein', '', 'LIE', 'LI'),
(131, 'Lithuania', '', 'LTU', 'LT'),
(132, 'Luxembourg', '', 'LUX', 'LU'),
(133, 'Macao', '', 'MAC', 'MO'),
(134, 'Macedonia', '', 'MKD', 'MK'),
(135, 'Madagascar', '', 'MDG', 'MG'),
(136, 'Malawi', '', 'MWI', 'MW'),
(137, 'Malaysia', '', 'MYS', 'MY'),
(138, 'Maldives', '', 'MDV', 'MV'),
(139, 'Mali', '', 'MLI', 'ML'),
(140, 'Malta', '', 'MLT', 'MT'),
(141, 'Marshall Islands', '', 'MHL', 'MH'),
(142, 'Martinique', '', 'MTQ', 'MQ'),
(143, 'Mauritania', '', 'MRT', 'MR'),
(144, 'Mauritius', '', 'MUS', 'MU'),
(145, 'Mayotte', '', 'MYT', 'YT'),
(146, 'Mexico', '', 'MEX', 'MX'),
(147, 'Micronesia', '', 'FSM', 'FM'),
(148, 'Moldova', '', 'MDA', 'MD'),
(149, 'Monaco', '', 'MCO', 'MC'),
(150, 'Mongolia', '', 'MNG', 'MN'),
(151, 'Montenegro', '', 'MNE', 'ME'),
(152, 'Montserrat', '', 'MSR', 'MS'),
(153, 'Morocco', '', 'MAR', 'MA'),
(154, 'Mozambique', '', 'MOZ', 'MZ'),
(155, 'Myanmar [Burma]', '', 'MMR', 'MM'),
(156, 'Namibia', '', 'NAM', 'NA'),
(157, 'Nauru', '', 'NRU', 'NR'),
(158, 'Nepal', '', 'NPL', 'NP'),
(159, 'Netherlands', '', 'NLD', 'NL'),
(160, 'New Caledonia', '', 'NCL', 'NC'),
(161, 'New Zealand', '', 'NZL', 'NZ'),
(162, 'Nicaragua', '', 'NIC', 'NI'),
(163, 'Niger', '', 'NER', 'NE'),
(164, 'Nigeria', '', 'NGA', 'NG'),
(165, 'Niue', '', 'NIU', 'NU'),
(166, 'Norfolk Island', '', 'NFK', 'NF'),
(167, 'North Korea', '', 'PRK', 'KP'),
(168, 'Northern Mariana Islands', '', 'MNP', 'MP'),
(169, 'Norway', '', 'NOR', 'NO'),
(170, 'Oman', '', 'OMN', 'OM'),
(171, 'Pakistan', '', 'PAK', 'PK'),
(172, 'Palau', '', 'PLW', 'PW'),
(173, 'Palestine', '', 'PSE', 'PS'),
(174, 'Panama', '', 'PAN', 'PA'),
(175, 'Papua New Guinea', '', 'PNG', 'PG'),
(176, 'Paraguay', '', 'PRY', 'PY'),
(177, 'Peru', '', 'PER', 'PE'),
(178, 'Philippines', '', 'PHL', 'PH'),
(179, 'Pitcairn Islands', '', 'PCN', 'PN'),
(180, 'Poland', '', 'POL', 'PL'),
(181, 'Portugal', '', 'PRT', 'PT'),
(182, 'Puerto Rico', '', 'PRI', 'PR'),
(183, 'Qatar', '', 'QAT', 'QA'),
(184, 'Republic of the Congo', '', 'COG', 'CG'),
(185, 'Réunion', '', 'REU', 'RE'),
(186, 'Romania', '', 'ROU', 'RO'),
(187, 'Russia', '', 'RUS', 'RU'),
(188, 'Rwanda', '', 'RWA', 'RW'),
(189, 'Saint Barthélemy', '', 'BLM', 'BL'),
(190, 'Saint Helena', '', 'SHN', 'SH'),
(191, 'Saint Kitts and Nevis', '', 'KNA', 'KN'),
(192, 'Saint Lucia', '', 'LCA', 'LC'),
(193, 'Saint Martin', '', 'MAF', 'MF'),
(194, 'Saint Pierre and Miquelon', '', 'SPM', 'PM'),
(195, 'Saint Vincent and the Grenadines', '', 'VCT', 'VC'),
(196, 'Samoa', '', 'WSM', 'WS'),
(197, 'San Marino', '', 'SMR', 'SM'),
(198, 'São Tomé and Príncipe', '', 'STP', 'ST'),
(199, 'Saudi Arabia', '', 'SAU', 'SA'),
(200, 'Senegal', '', 'SEN', 'SN'),
(201, 'Serbia', '', 'SRB', 'RS'),
(202, 'Seychelles', '', 'SYC', 'SC'),
(203, 'Sierra Leone', '', 'SLE', 'SL'),
(204, 'Singapore', '', 'SGP', 'SG'),
(205, 'Sint Maarten', '', 'SXM', 'SX'),
(206, 'Slovakia', '', 'SVK', 'SK'),
(207, 'Slovenia', '', 'SVN', 'SI'),
(208, 'Solomon Islands', '', 'SLB', 'SB'),
(209, 'Somalia', '', 'SOM', 'SO'),
(210, 'South Africa', '', 'ZAF', 'ZA'),
(211, 'South Georgia and the South Sandwich Islands', '', 'SGS', 'GS'),
(212, 'South Korea', '', 'KOR', 'KR'),
(213, 'South Sudan', '', 'SSD', 'SS'),
(214, 'Spain', '', 'ESP', 'ES'),
(215, 'Sri Lanka', '', 'LKA', 'LK'),
(216, 'Sudan', '', 'SDN', 'SD'),
(217, 'Suriname', '', 'SUR', 'SR'),
(218, 'Svalbard and Jan Mayen', '', 'SJM', 'SJ'),
(219, 'Swaziland', '', 'SWZ', 'SZ'),
(220, 'Sweden', '', 'SWE', 'SE'),
(221, 'Switzerland', '', 'CHE', 'CH'),
(222, 'Syria', '', 'SYR', 'SY'),
(223, 'Taiwan', '', 'TWN', 'TW'),
(224, 'Tajikistan', '', 'TJK', 'TJ'),
(225, 'Tanzania', '', 'TZA', 'TZ'),
(226, 'Thailand', '', 'THA', 'TH'),
(227, 'Togo', '', 'TGO', 'TG'),
(228, 'Tokelau', '', 'TKL', 'TK'),
(229, 'Tonga', '', 'TON', 'TO'),
(230, 'Trinidad and Tobago', '', 'TTO', 'TT'),
(231, 'Tunisia', '', 'TUN', 'TN'),
(232, 'Turkey', '', 'TUR', 'TR'),
(233, 'Turkmenistan', '', 'TKM', 'TM'),
(234, 'Turks and Caicos Islands', '', 'TCA', 'TC'),
(235, 'Tuvalu', '', 'TUV', 'TV'),
(236, 'U.S. Minor Outlying Islands', '', 'UMI', 'UM'),
(237, 'U.S. Virgin Islands', '', 'VIR', 'VI'),
(238, 'Uganda', '', 'UGA', 'UG'),
(239, 'Ukraine', '', 'UKR', 'UA'),
(240, 'United Arab Emirates', '', 'ARE', 'AE'),
(241, 'United Kingdom', '', 'GBR', 'GB'),
(242, 'United States', '', 'USA', 'US'),
(243, 'Uruguay', '', 'URY', 'UY'),
(244, 'Uzbekistan', '', 'UZB', 'UZ'),
(245, 'Vanuatu', '', 'VUT', 'VU'),
(246, 'Vatican City', '', 'VAT', 'VA'),
(247, 'Venezuela', '', 'VEN', 'VE'),
(248, 'Vietnam', '', 'VNM', 'VN'),
(249, 'Wallis and Futuna', '', 'WLF', 'WF'),
(250, 'Western Sahara', '', 'ESH', 'EH'),
(251, 'Yemen', '', 'YEM', 'YE'),
(252, 'Zambia', '', 'ZMB', 'ZM'),
(253, 'Zimbabwe', '', 'ZWE', 'ZW');

-- --------------------------------------------------------

--
-- Table structure for table `industrylist`
--

CREATE TABLE IF NOT EXISTS `industrylist` (
  `industryID` int(11) NOT NULL AUTO_INCREMENT,
  `industryName` varchar(255) NOT NULL,
  PRIMARY KEY (`industryID`),
  UNIQUE KEY `industryName` (`industryName`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `industrylist`
--

INSERT INTO `industrylist` (`industryID`, `industryName`) VALUES
(1, 'Agriculture & Forestry / Wildlife'),
(2, 'Ayurvedic & Herbal Products'),
(3, 'Automotive & Auto Parts'),
(6, 'Business & Information'),
(7, 'Construction / Utilities / Contracting'),
(8, 'Finance & Insurance'),
(19, 'Gaming'),
(18, 'Food & Hospitality'),
(17, 'Education'),
(16, 'Chemicals'),
(28, 'Other'),
(20, 'Health Services'),
(21, 'Motor Vehicle'),
(22, 'Natural Resources / Environmental'),
(23, 'Personal Services'),
(24, 'Real Estate & Housing'),
(25, 'Safety/Security & Legal'),
(26, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `industrysublist`
--

CREATE TABLE IF NOT EXISTS `industrysublist` (
  `IndustrySublistID` int(11) NOT NULL AUTO_INCREMENT,
  `industryID` int(11) DEFAULT NULL,
  `subindustryName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`IndustrySublistID`),
  UNIQUE KEY `subindustryName` (`subindustryName`),
  KEY `industryID` (`industryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=204 ;

--
-- Dumping data for table `industrysublist`
--

INSERT INTO `industrysublist` (`IndustrySublistID`, `industryID`, `subindustryName`) VALUES
(20, 1, 'Lawn care Services'),
(19, 1, 'Landscape Services'),
(18, 1, 'Fishing/Hunting'),
(17, 1, 'Farming(Crop Production)'),
(16, 1, 'Farming(Animal Production)'),
(15, 1, 'Extermination/Pest Control'),
(21, 1, 'Other (Agriculture & Forestry/Wildlife)'),
(22, 3, 'Automotive & Auto Parts'),
(23, 3, 'Auto Polish, Cleaner, Car Cleaner.'),
(24, 3, 'Auto Electrical System & Parts'),
(25, 3, 'Auto Battery, Automotive Battery Charger.'),
(26, 3, 'Car Stereos, Auto Security System & Alarms'),
(27, 3, 'Service Station Equipment, Air Conditioner, Side Lamps'),
(28, 3, 'Auto Tyres & Tubes, Windshield Wipers'),
(29, 3, 'Car Seats, Car Air Fresheners, Auto Seat Covers'),
(30, 3, 'Auto Brakes, Auto Bearing, Auto Jacks & Jacks Parts'),
(31, 3, 'Automobile Maintenance , Automobile Repairing'),
(32, 3, 'Transmission Fluids , Automotive Grease , Gear Oils'),
(33, 3, 'Automotive Components, Automotive H & tools'),
(34, 3, 'Car Parts, Accessories & Car Care Product'),
(35, 3, 'Trucks Parts'),
(36, 3, 'Electric Motorcycles, Motorcycle Battery Container, Scooter Parts'),
(37, 3, 'Bicycles Accessories, Bicycles valve, Bicycles Parts'),
(38, 6, 'Consultant'),
(39, 6, 'Employment Office'),
(40, 6, 'Fundraisers'),
(41, 6, 'Going out of Business Sales'),
(42, 6, 'Marketing/Advertising'),
(43, 6, 'Non Profit Organization'),
(44, 6, 'Notary Public'),
(45, 6, 'Online Business'),
(46, 6, 'Other (Business & Information)'),
(47, 6, 'Publishing Services'),
(48, 6, 'Record Business'),
(49, 6, 'Retail Sales'),
(50, 6, 'Technology Services'),
(51, 6, 'Telemarketing'),
(52, 6, 'Travel Agency'),
(53, 6, 'Video Production'),
(54, 7, 'AC & Heating'),
(55, 7, 'Architect'),
(56, 7, 'Building Construction'),
(57, 7, 'Building Inspection'),
(58, 7, 'Concrete Manufacturing'),
(59, 7, 'Contractor'),
(60, 7, 'Engineering/Drafting'),
(61, 7, 'Equipment Rental'),
(62, 7, 'Other (Construction/Utilities/Contracting)'),
(63, 7, 'Plumbing'),
(64, 7, 'Remodeling'),
(65, 7, 'Repair/Maintenance'),
(69, 17, 'College/Universities'),
(68, 17, 'Child Care Services'),
(70, 17, 'Cosmetology School'),
(71, 17, 'Elementary & Secondary Education'),
(72, 17, 'GED Certification'),
(73, 17, 'Other (Education)'),
(74, 17, 'Private School'),
(75, 17, 'Real Estate School'),
(76, 17, 'Technical School'),
(77, 17, 'Trade School'),
(78, 17, 'Tutoring Services'),
(79, 17, 'Vocational School'),
(80, 8, 'Accountant'),
(81, 8, 'Auditing'),
(82, 8, 'Bank/Credit Union'),
(83, 8, 'Bookkeeping'),
(84, 8, 'Cash Advances'),
(85, 8, 'Collection Agency'),
(86, 8, 'Insurance'),
(87, 8, 'Investor'),
(88, 8, 'Other (Finance & Insurance)'),
(89, 8, 'Pawn Brokers'),
(90, 8, 'Tax Preparation'),
(91, 18, 'Alcohol/Tobacco Sales'),
(92, 18, 'Alcoholic Beverage Manufacturing'),
(93, 18, 'Bakery'),
(94, 18, 'Caterer'),
(95, 18, 'Food/Beverage Manufacturing'),
(96, 18, 'Grocery/Convenience Store(Gas Station)'),
(97, 18, 'Grocery/Convenience Store(No Gas Station)'),
(98, 18, 'Hotels/Motels(Casino)'),
(99, 18, 'Hotels/Motels(No Casino)'),
(100, 18, 'Mobile Food Services'),
(101, 18, 'Other (Food & Hospitality)'),
(102, 18, 'Restaurant/Bar'),
(103, 18, 'Specialty Food(Fruit/Vegetables)'),
(104, 18, 'Specialty Food(Meat)'),
(105, 18, 'Specialty Food(Seafood)'),
(106, 18, 'Tobacco Product Manufacturing'),
(107, 18, 'Truck Stop'),
(108, 18, 'Vending Machine'),
(109, 19, 'Auctioneer'),
(110, 19, 'Boxing/Wrestling'),
(111, 19, 'Casino/Video Gaming'),
(112, 19, 'Other (Gaming)'),
(113, 19, 'Racetrack'),
(114, 19, 'Sports Agent'),
(115, 20, 'Acupuncturist'),
(116, 20, 'Athletic Trainer'),
(117, 20, 'Child/Youth Services'),
(118, 20, 'Chiropractic Office'),
(119, 20, 'Dentistry'),
(120, 20, 'Electrolysis'),
(121, 20, 'Embalmer'),
(122, 20, 'Emergency Medical Services'),
(123, 20, 'Emergency Medical Transportation'),
(124, 20, 'Hearing Aid Dealers'),
(125, 20, 'Home Health Services'),
(126, 20, 'Hospital'),
(127, 20, 'Massage Therapy'),
(128, 20, 'Medical Office'),
(129, 20, 'Mental Health Services'),
(130, 20, 'Non Emergency Medical Transportation'),
(131, 20, 'Optometry'),
(132, 20, 'Other (Health Services)'),
(133, 20, 'Pharmacy'),
(134, 20, 'Physical Therapy'),
(135, 20, 'Physicians Office'),
(136, 20, 'Radiology'),
(137, 20, 'Residential Care Facility'),
(138, 20, 'Speech/Occupational Therapy'),
(139, 20, 'Substance Abuse Services'),
(140, 20, 'Veterinary Medicine'),
(141, 20, 'Vocational Rehabilitation'),
(142, 20, 'Wholesale Drug Distribution'),
(144, 21, 'Automotive Part Sales'),
(145, 21, 'Car Wash/Detailing'),
(146, 21, 'Motor Vehicle Rental'),
(147, 21, 'Motor Vehicle Repair'),
(148, 21, 'New Motor Vehicle Sales'),
(149, 21, 'Other (Motor Vehicle)'),
(150, 21, 'Recreational Vehicle Sales'),
(159, 22, 'Pipeline'),
(152, 22, 'Conservation Organizations'),
(153, 22, 'Environmental Health'),
(154, 22, 'Land Surveying'),
(155, 22, 'Oil & Gas Distribution'),
(156, 22, 'Oil & Gas Extraction/Production'),
(157, 22, 'Other (Natural Resources/Environmental)'),
(158, 0, 'as'),
(160, 22, 'Water Well Drilling'),
(161, 28, 'Other(Business Type Not Listed)'),
(162, 23, 'Animal Boarding'),
(163, 23, 'Barber Shop'),
(164, 23, 'Beauty Salon'),
(165, 23, 'Cemetery'),
(166, 23, 'Diet Center'),
(167, 23, 'Dry cleaning/Laundry'),
(168, 23, 'Entertainment/Party Rentals'),
(169, 23, 'Event Planning'),
(170, 23, 'Fitness Center'),
(171, 23, 'Florist'),
(172, 23, 'Funeral Director'),
(173, 23, 'Janitorial/Cleaning Services'),
(174, 23, 'Massage/Day Spa'),
(175, 23, 'Nail Salon'),
(176, 23, 'Other (Personal Services)'),
(177, 23, 'Personal Assistant'),
(178, 23, 'Photography'),
(179, 23, 'Tanning Salon'),
(180, 24, 'Home Inspection'),
(181, 24, 'Interior Design'),
(182, 24, 'Manufactured Housing'),
(183, 24, 'Mortgage Company'),
(184, 24, 'Other (Real Estate & Housing)'),
(185, 24, 'Property Management'),
(186, 24, 'Real Estate Broker/Agent'),
(187, 24, 'Warehouse/Storage'),
(188, 25, 'Attorney'),
(189, 25, 'Bail Bonds'),
(190, 25, 'Court Reporter'),
(191, 25, 'Drug Screening'),
(192, 25, 'Locksmith'),
(193, 25, 'Other (Safety/Security & Legal)'),
(194, 25, 'Private Investigator'),
(195, 25, 'Security Guard'),
(196, 25, 'Security System Services'),
(197, 26, 'Air Transportation'),
(198, 26, 'Boat Services'),
(199, 26, 'Limousine Services'),
(200, 26, 'Other (Transportation)'),
(201, 26, 'Taxi Services'),
(202, 26, 'Towing'),
(203, 26, 'Truck Transportation(Fuel)');

-- --------------------------------------------------------

--
-- Table structure for table `industrysubtype`
--

CREATE TABLE IF NOT EXISTS `industrysubtype` (
  `industrysubtypeID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `IndustrySublistID` int(11) DEFAULT NULL,
  PRIMARY KEY (`industrysubtypeID`),
  KEY `businessID` (`businessID`),
  KEY `industryID` (`industryID`),
  KEY `IndustrySublistID` (`IndustrySublistID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `industrysubtype`
--

INSERT INTO `industrysubtype` (`industrysubtypeID`, `businessID`, `industryID`, `IndustrySublistID`) VALUES
(41, 44, 3, 23),
(40, 43, 6, 0),
(39, 42, 0, 0),
(38, 41, 8, 0),
(37, 40, 25, 0),
(36, 39, 26, 0),
(35, 38, 0, 0),
(34, 37, 6, 0),
(33, 36, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE IF NOT EXISTS `manager` (
  `managerID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`managerID`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerID`, `username`, `password`, `resetToken`, `resetComplete`, `email`) VALUES
(5, 'manager', '$2y$10$UoHDHH/NEAE4QsaaHha6Ce3WykgrE6S.FtcuiQPrYOVj.9KxkIMVu', NULL, NULL, 'pborole25@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE IF NOT EXISTS `menulist` (
  `menuID` int(11) NOT NULL AUTO_INCREMENT,
  `industryID` int(11) NOT NULL DEFAULT '0',
  `URL` varchar(255) NOT NULL DEFAULT '#',
  PRIMARY KEY (`menuID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `menulist`
--

INSERT INTO `menulist` (`menuID`, `industryID`, `URL`) VALUES
(1, 1, 'http://www.thebizroot.com/businesses.php?industry=1&country=&type=&subindustry='),
(2, 2, 'http://www.thebizroot.com/businesses.php?industry=2&country=&type=&subindustry='),
(3, 3, 'https://www.thebizroot.com/businesses.php?industry=3&country=&type=&subindustry='),
(4, 6, 'https://www.thebizroot.com/businesses.php?industry=6&country=&type=&subindustry='),
(5, 7, 'https://www.thebizroot.com/businesses.php?industry=7&country=&type=&subindustry='),
(6, 16, 'https://www.thebizroot.com/businesses.php?industry=16&country=&type=&subindustry='),
(7, 17, 'https://www.thebizroot.com/businesses.php?industry=17&country=&type=&subindustry='),
(8, 8, 'https://www.thebizroot.com/businesses.php?industry=8&country=&type=&subindustry='),
(9, 18, 'https://www.thebizroot.com/businesses.php?industry=18&country=&type=&subindustry='),
(10, 19, 'https://www.thebizroot.com/businesses.php?industry=19&country=&type=&subindustry='),
(11, 20, 'https://www.thebizroot.com/businesses.php?industry=20&country=&type=&subindustry='),
(12, 21, 'https://www.thebizroot.com/businesses.php?industry=21&country=&type=&subindustry='),
(13, 22, 'https://www.thebizroot.com/businesses.php?industry=22&country=&type=&subindustry='),
(14, 23, 'https://www.thebizroot.com/businesses.php?industry=23&country=&type=&subindustry='),
(15, 24, 'https://www.thebizroot.com/businesses.php?industry=24&country=&type=&subindustry=');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `NewsID` int(11) NOT NULL AUTO_INCREMENT,
  `newsemail` text NOT NULL,
  PRIMARY KEY (`NewsID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`NewsID`, `newsemail`) VALUES
(26, 'jeetpatel1995@yahoo.in');

-- --------------------------------------------------------

--
-- Table structure for table `porductinformation`
--

CREATE TABLE IF NOT EXISTS `porductinformation` (
  `productID` int(11) NOT NULL AUTO_INCREMENT,
  `businessID` int(11) NOT NULL,
  `productName` text,
  `productDescription` text,
  `productType` text,
  `industryID` int(11) NOT NULL,
  `productOffer` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`productID`),
  KEY `businessID` (`businessID`),
  KEY `industryID` (`industryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=84 ;

-- --------------------------------------------------------

--
-- Table structure for table `prductwishlist`
--

CREATE TABLE IF NOT EXISTS `prductwishlist` (
  `wishlistID` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) DEFAULT NULL,
  `businessID` int(11) NOT NULL,
  PRIMARY KEY (`wishlistID`),
  KEY `productID` (`productID`),
  KEY `businessID` (`businessID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=356 ;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE IF NOT EXISTS `productimage` (
  `productImage` int(11) NOT NULL AUTO_INCREMENT,
  `imagePath` text,
  `productID` int(11) NOT NULL,
  PRIMARY KEY (`productImage`),
  KEY `productID` (`productID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=263 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `stateID` int(11) NOT NULL AUTO_INCREMENT,
  `stateName` varchar(255) NOT NULL,
  `countryID` int(11) DEFAULT NULL,
  PRIMARY KEY (`stateID`),
  UNIQUE KEY `stateName` (`stateName`),
  KEY `countryID` (`countryID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateID`, `stateName`, `countryID`) VALUES
(1, 'Andaman and Nicobar Islands', 91),
(2, 'Andhra Pradesh', 91),
(3, 'Arunachal Pradesh', 91),
(4, 'Assam', 91),
(5, 'Bihar', 91),
(6, 'Chandigarh', 91),
(7, 'Chhattisgarh', 91),
(8, 'Dadra and Nagar Haveli', 91),
(9, 'Daman and Diu', 91),
(10, 'Delhi', 91),
(11, 'Goa', 91),
(12, 'Gujarat', 91),
(13, 'Haryana', 91),
(14, 'Himachal Pradesh', 91),
(15, 'Jammu and Kashmir', 91),
(16, 'Jharkhand', 91),
(17, 'Karnataka', 91),
(18, 'Kenmore', 91),
(19, 'Kerala', 91),
(20, 'Lakshadweep', 91),
(21, 'Madhya Pradesh', 91),
(22, 'Maharashtra', 91),
(23, 'Manipur', 91),
(24, 'Meghalaya', 91),
(25, 'Mizoram', 91),
(26, 'Nagaland', 91),
(27, 'Narora', 91),
(28, 'Natwar', 91),
(29, 'Odisha', 91),
(30, 'Paschim Medinipur', 91),
(31, 'Pondicherry', 91),
(32, 'Punjab', 91),
(33, 'Rajasthan', 91),
(34, 'Sikkim', 91),
(35, 'Tamil Nadu', 91),
(36, 'Telangana', 91),
(37, 'Tripura', 91),
(38, 'Uttar Pradesh', 91),
(39, 'Uttarakhand', 91),
(40, 'Vaishali', 91),
(41, 'West Bengal', 91);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
