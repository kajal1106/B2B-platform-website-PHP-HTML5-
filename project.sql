-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 10:31 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ismap` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `username`, `password`, `ismap`) VALUES
(1, 'Admin', '$2y$10$m5f9wrwo5/KX0QfQfrVqzus6nDChmQ47LqwDruTRKzTf9sXywn2ei', 'slider');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `businessID` int(11) NOT NULL,
  `businessEmail` varchar(255) NOT NULL,
  `businessPassword` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`businessID`, `businessEmail`, `businessPassword`, `isActive`, `resetToken`, `resetComplete`) VALUES
(45, 'yashsomani2007@gmail.com', '$2y$10$6jZYxz4BCm3I5NNhRzl0r.U7zDBYoL6IjAlYMmvET3MCz/PX9eI3S', 'yes', NULL, NULL),
(46, 'vivekmodi456@gmail.com', '$2y$10$I2jtiooNZ.tJvAeOYvrOFunYbrm5VOKOn9bMmEyTR5ufsJTmh8v7S', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `businessaddress`
--

CREATE TABLE `businessaddress` (
  `businessAddressId` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `businessStreetAddress` text,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businessaddress`
--

INSERT INTO `businessaddress` (`businessAddressId`, `businessID`, `businessStreetAddress`, `countryID`, `stateID`, `cityID`, `zipCode`) VALUES
(9, 38, '', 0, 0, 0, 0),
(15, 44, 'Pune', 91, 22, 6, 411041),
(16, 45, 'katraj', 91, 22, 6, 411046),
(14, 43, '', 91, 0, 0, 0),
(17, 46, 'katraj', 91, 22, 6, 411046);

-- --------------------------------------------------------

--
-- Table structure for table `businesscontactinformation`
--

CREATE TABLE `businesscontactinformation` (
  `businessContactID` bigint(20) NOT NULL,
  `businessID` int(11) NOT NULL,
  `businessName` varchar(255) DEFAULT NULL,
  `businessWebsite` varchar(255) DEFAULT NULL,
  `businessMobileNo` int(20) DEFAULT NULL,
  `businessContact2` bigint(20) DEFAULT NULL,
  `businessLandline` bigint(20) DEFAULT NULL,
  `businessFaxNo` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesscontactinformation`
--

INSERT INTO `businesscontactinformation` (`businessContactID`, `businessID`, `businessName`, `businessWebsite`, `businessMobileNo`, `businessContact2`, `businessLandline`, `businessFaxNo`) VALUES
(17, 46, 'vivek modi', '', 2147483647, 0, 0, 0),
(14, 43, '', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `businessenquriy`
--

CREATE TABLE `businessenquriy` (
  `businessEnquriyID` int(11) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `message` text,
  `businessID` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businessindustry`
--

CREATE TABLE `businessindustry` (
  `businessIndustryID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(15, 44, 3),
(16, 45, 19),
(17, 46, 8);

-- --------------------------------------------------------

--
-- Table structure for table `businesslead`
--

CREATE TABLE `businesslead` (
  `businessLeadId` int(11) NOT NULL,
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
  `dateofpost` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businessleadimage`
--

CREATE TABLE `businessleadimage` (
  `businessLeadImageID` bigint(20) NOT NULL,
  `imagePath` text,
  `businessLeadId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesslogo`
--

CREATE TABLE `businesslogo` (
  `businesslogoID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `busienssLogoPath` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesslogo`
--

INSERT INTO `businesslogo` (`businesslogoID`, `businessID`, `busienssLogoPath`) VALUES
(43, 46, 'Mylogo/c37128039d66891173328cb039dba360.jpg'),
(42, 45, 'Mylogo/ae698cc88a9e484c49359dfccc75970b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `businessprofile`
--

CREATE TABLE `businessprofile` (
  `businessProfilePersonID` int(11) NOT NULL,
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
  `isverified` varchar(255) NOT NULL DEFAULT 'Not Verified'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businessprofile`
--

INSERT INTO `businessprofile` (`businessProfilePersonID`, `businessID`, `companyName`, `establishmentYear`, `levelToExpand`, `aboutCompany`, `ProductAndServices`, `isSampleProvide`, `firmTypeName`, `businessOffer`, `status`, `isverified`) VALUES
(41, 43, 'TheBizRoot', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'partnership', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(36, 38, '', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'organization', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(42, 44, 'Test', 2015, '', 'We are MNC', 'Product/Service', 'yes', 'proprietorship', 'No Offer', 'NOT FEATURED', 'Not Verified'),
(43, 45, 'lolilol', 0, 'national', 'About Your Company', 'Product/Service', 'yes', 'partnership', 'No Offer', 'FEATURED', 'Verify'),
(44, 46, 'modi', 0, 'local', 'About Your Company', 'Product/Service', 'yes', 'publicltd', 'No Offer', 'NOT FEATURED', 'Verify');

-- --------------------------------------------------------

--
-- Table structure for table `businesssalesperson`
--

CREATE TABLE `businesssalesperson` (
  `businessSalesPersonID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `busienssPersonName` varchar(255) DEFAULT NULL,
  `busienssPersonEmail` varchar(255) DEFAULT NULL,
  `busienssPersonContact` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesssalesperson`
--

INSERT INTO `businesssalesperson` (`businessSalesPersonID`, `businessID`, `busienssPersonName`, `busienssPersonEmail`, `busienssPersonContact`) VALUES
(36, 38, '', '', 0),
(42, 44, '', '', 0),
(43, 45, 'yash somani', 'yashsomani2007@gmail.com', 0),
(41, 43, '', '', 0),
(44, 46, 'vivek modi', 'vivekmodi456@gmail.com', 9669408831);

-- --------------------------------------------------------

--
-- Table structure for table `businesssocialinformation`
--

CREATE TABLE `businesssocialinformation` (
  `businessSocialInformationID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `facebookLink` varchar(255) NOT NULL,
  `instagramLink` varchar(255) DEFAULT NULL,
  `twitterLink` varchar(255) DEFAULT NULL,
  `googleplus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `businesssupportperson`
--

CREATE TABLE `businesssupportperson` (
  `businessSupportPersonID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `busienssPersonName` varchar(255) DEFAULT NULL,
  `busienssPersonEmail` varchar(255) DEFAULT NULL,
  `busienssPersonContact` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `businesssupportperson`
--

INSERT INTO `businesssupportperson` (`businessSupportPersonID`, `businessID`, `busienssPersonName`, `busienssPersonEmail`, `busienssPersonContact`) VALUES
(42, 44, '', '', 0),
(43, 45, '', 'singh.kajal940@gmail.com', 8805673596),
(41, 43, '', '', 0),
(36, 38, '', '', 0),
(44, 46, '', 'singh.kajal940@gmail.com', 8805673596);

-- --------------------------------------------------------

--
-- Table structure for table `businesstype`
--

CREATE TABLE `businesstype` (
  `businesstypeID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `busienssTypeName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(49, 44, 'Service Provider'),
(50, 45, 'Manufacturer'),
(51, 46, 'Importer');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(11) NOT NULL,
  `cityName` varchar(255) NOT NULL,
  `stateID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `client` (
  `clientID` int(11) NOT NULL,
  `clientEmail` varchar(255) NOT NULL,
  `clientPassword` varchar(255) DEFAULT NULL,
  `isActive` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`clientID`, `clientEmail`, `clientPassword`, `isActive`, `resetToken`, `resetComplete`) VALUES
(9, 'singh.kajal940@gmail.com', '$2y$10$oiYwctvn0r9VBdEKA2sRZ.yRSha9e/Scl5ZXgrF4aAm7xBCPliXKO', 'yes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `clientaddress`
--

CREATE TABLE `clientaddress` (
  `clientAddressId` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `clientStreetAddress` varchar(255) DEFAULT NULL,
  `countryID` int(11) DEFAULT NULL,
  `stateID` int(11) DEFAULT NULL,
  `cityID` int(11) DEFAULT NULL,
  `zipCode` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientaddress`
--

INSERT INTO `clientaddress` (`clientAddressId`, `clientID`, `clientStreetAddress`, `countryID`, `stateID`, `cityID`, `zipCode`) VALUES
(7, 9, '', 91, 22, 5, 0),
(6, 8, '', 91, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientcontactinformation`
--

CREATE TABLE `clientcontactinformation` (
  `clientContactID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `clientName` varchar(255) DEFAULT NULL,
  `clientWebsite` varchar(255) DEFAULT NULL,
  `clientMobileNo` int(11) DEFAULT NULL,
  `clientContact2` int(11) DEFAULT NULL,
  `clientLandline` int(11) DEFAULT NULL,
  `clientFaxNo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientcontactinformation`
--

INSERT INTO `clientcontactinformation` (`clientContactID`, `clientID`, `clientName`, `clientWebsite`, `clientMobileNo`, `clientContact2`, `clientLandline`, `clientFaxNo`) VALUES
(7, 9, 'Nainsha', '', 2147483647, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clientindustry`
--

CREATE TABLE `clientindustry` (
  `clientIndustryID` int(11) NOT NULL,
  `clientID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `IndustrySublistID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientindustry`
--

INSERT INTO `clientindustry` (`clientIndustryID`, `clientID`, `industryID`, `IndustrySublistID`) VALUES
(5, 7, 1, 19),
(4, 6, 17, 69),
(6, 8, 6, 0),
(7, 9, 26, 197);

-- --------------------------------------------------------

--
-- Table structure for table `clientlead`
--

CREATE TABLE `clientlead` (
  `clientLeadId` int(11) NOT NULL,
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
  `dateofpost` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientleadimage`
--

CREATE TABLE `clientleadimage` (
  `clientLeadImage` bigint(20) NOT NULL,
  `imagePath` text,
  `clientLeadId` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clientprductwishlist`
--

CREATE TABLE `clientprductwishlist` (
  `wishlistID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `clientID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `countryID` int(11) NOT NULL,
  `countryName` varchar(250) NOT NULL,
  `countryFlag` varchar(250) NOT NULL,
  `countrycode` char(3) NOT NULL,
  `country-codes` char(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `industrylist` (
  `industryID` int(11) NOT NULL,
  `industryName` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `industrysublist` (
  `IndustrySublistID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `subindustryName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `industrysubtype` (
  `industrysubtypeID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `industryID` int(11) DEFAULT NULL,
  `IndustrySublistID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(33, 36, 6, 0),
(42, 45, 19, 111),
(43, 46, 8, 80);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `managerID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`managerID`, `username`, `password`, `resetToken`, `resetComplete`, `email`) VALUES
(5, 'manager', '$2y$10$UoHDHH/NEAE4QsaaHha6Ce3WykgrE6S.FtcuiQPrYOVj.9KxkIMVu', NULL, NULL, 'pborole25@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `menulist`
--

CREATE TABLE `menulist` (
  `menuID` int(11) NOT NULL,
  `industryID` int(11) NOT NULL DEFAULT '0',
  `URL` varchar(255) NOT NULL DEFAULT '#'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

CREATE TABLE `newsletter` (
  `NewsID` int(11) NOT NULL,
  `newsemail` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `porductinformation`
--

CREATE TABLE `porductinformation` (
  `productID` int(11) NOT NULL,
  `businessID` int(11) NOT NULL,
  `productName` text,
  `productDescription` text,
  `productType` text,
  `industryID` int(11) NOT NULL,
  `productOffer` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prductwishlist`
--

CREATE TABLE `prductwishlist` (
  `wishlistID` int(11) NOT NULL,
  `productID` int(11) DEFAULT NULL,
  `businessID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `productimage`
--

CREATE TABLE `productimage` (
  `productImage` int(11) NOT NULL,
  `imagePath` text,
  `productID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateID` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `countryID` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`businessID`),
  ADD UNIQUE KEY `businessEmail` (`businessEmail`);

--
-- Indexes for table `businessaddress`
--
ALTER TABLE `businessaddress`
  ADD PRIMARY KEY (`businessAddressId`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `stateID` (`stateID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `businesscontactinformation`
--
ALTER TABLE `businesscontactinformation`
  ADD PRIMARY KEY (`businessContactID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businessenquriy`
--
ALTER TABLE `businessenquriy`
  ADD PRIMARY KEY (`businessEnquriyID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businessindustry`
--
ALTER TABLE `businessindustry`
  ADD PRIMARY KEY (`businessIndustryID`),
  ADD KEY `businessID` (`businessID`),
  ADD KEY `industryID` (`industryID`);

--
-- Indexes for table `businesslead`
--
ALTER TABLE `businesslead`
  ADD PRIMARY KEY (`businessLeadId`),
  ADD KEY `businessID` (`businessID`),
  ADD KEY `industryID` (`industryID`);

--
-- Indexes for table `businessleadimage`
--
ALTER TABLE `businessleadimage`
  ADD PRIMARY KEY (`businessLeadImageID`),
  ADD KEY `businessLeadId` (`businessLeadId`);

--
-- Indexes for table `businesslogo`
--
ALTER TABLE `businesslogo`
  ADD PRIMARY KEY (`businesslogoID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businessprofile`
--
ALTER TABLE `businessprofile`
  ADD PRIMARY KEY (`businessProfilePersonID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businesssalesperson`
--
ALTER TABLE `businesssalesperson`
  ADD PRIMARY KEY (`businessSalesPersonID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businesssocialinformation`
--
ALTER TABLE `businesssocialinformation`
  ADD PRIMARY KEY (`businessSocialInformationID`),
  ADD UNIQUE KEY `facebookLink` (`facebookLink`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businesssupportperson`
--
ALTER TABLE `businesssupportperson`
  ADD PRIMARY KEY (`businessSupportPersonID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `businesstype`
--
ALTER TABLE `businesstype`
  ADD PRIMARY KEY (`businesstypeID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityID`),
  ADD UNIQUE KEY `cityName` (`cityName`),
  ADD KEY `stateID` (`stateID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`clientID`),
  ADD UNIQUE KEY `clientEmail` (`clientEmail`);

--
-- Indexes for table `clientaddress`
--
ALTER TABLE `clientaddress`
  ADD PRIMARY KEY (`clientAddressId`),
  ADD KEY `countryID` (`countryID`),
  ADD KEY `stateID` (`stateID`),
  ADD KEY `cityID` (`cityID`);

--
-- Indexes for table `clientcontactinformation`
--
ALTER TABLE `clientcontactinformation`
  ADD PRIMARY KEY (`clientContactID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `clientindustry`
--
ALTER TABLE `clientindustry`
  ADD PRIMARY KEY (`clientIndustryID`),
  ADD KEY `clientID` (`clientID`),
  ADD KEY `industryID` (`industryID`),
  ADD KEY `IndustrySublistID` (`IndustrySublistID`);

--
-- Indexes for table `clientlead`
--
ALTER TABLE `clientlead`
  ADD PRIMARY KEY (`clientLeadId`),
  ADD KEY `clientID` (`clientID`),
  ADD KEY `industryID` (`industryID`);

--
-- Indexes for table `clientleadimage`
--
ALTER TABLE `clientleadimage`
  ADD PRIMARY KEY (`clientLeadImage`),
  ADD KEY `clientLeadId` (`clientLeadId`);

--
-- Indexes for table `clientprductwishlist`
--
ALTER TABLE `clientprductwishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `clientID` (`clientID`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`countryID`),
  ADD UNIQUE KEY `countryName` (`countryName`);

--
-- Indexes for table `industrylist`
--
ALTER TABLE `industrylist`
  ADD PRIMARY KEY (`industryID`),
  ADD UNIQUE KEY `industryName` (`industryName`);

--
-- Indexes for table `industrysublist`
--
ALTER TABLE `industrysublist`
  ADD PRIMARY KEY (`IndustrySublistID`),
  ADD UNIQUE KEY `subindustryName` (`subindustryName`),
  ADD KEY `industryID` (`industryID`);

--
-- Indexes for table `industrysubtype`
--
ALTER TABLE `industrysubtype`
  ADD PRIMARY KEY (`industrysubtypeID`),
  ADD KEY `businessID` (`businessID`),
  ADD KEY `industryID` (`industryID`),
  ADD KEY `IndustrySublistID` (`IndustrySublistID`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`managerID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `menulist`
--
ALTER TABLE `menulist`
  ADD PRIMARY KEY (`menuID`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`NewsID`);

--
-- Indexes for table `porductinformation`
--
ALTER TABLE `porductinformation`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `businessID` (`businessID`),
  ADD KEY `industryID` (`industryID`);

--
-- Indexes for table `prductwishlist`
--
ALTER TABLE `prductwishlist`
  ADD PRIMARY KEY (`wishlistID`),
  ADD KEY `productID` (`productID`),
  ADD KEY `businessID` (`businessID`);

--
-- Indexes for table `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`productImage`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateID`),
  ADD UNIQUE KEY `stateName` (`stateName`),
  ADD KEY `countryID` (`countryID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `businessID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `businessaddress`
--
ALTER TABLE `businessaddress`
  MODIFY `businessAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `businesscontactinformation`
--
ALTER TABLE `businesscontactinformation`
  MODIFY `businessContactID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `businessenquriy`
--
ALTER TABLE `businessenquriy`
  MODIFY `businessEnquriyID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `businessindustry`
--
ALTER TABLE `businessindustry`
  MODIFY `businessIndustryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `businesslead`
--
ALTER TABLE `businesslead`
  MODIFY `businessLeadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `businessleadimage`
--
ALTER TABLE `businessleadimage`
  MODIFY `businessLeadImageID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `businesslogo`
--
ALTER TABLE `businesslogo`
  MODIFY `businesslogoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `businessprofile`
--
ALTER TABLE `businessprofile`
  MODIFY `businessProfilePersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `businesssalesperson`
--
ALTER TABLE `businesssalesperson`
  MODIFY `businessSalesPersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `businesssocialinformation`
--
ALTER TABLE `businesssocialinformation`
  MODIFY `businessSocialInformationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `businesssupportperson`
--
ALTER TABLE `businesssupportperson`
  MODIFY `businessSupportPersonID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `businesstype`
--
ALTER TABLE `businesstype`
  MODIFY `businesstypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `clientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clientaddress`
--
ALTER TABLE `clientaddress`
  MODIFY `clientAddressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientcontactinformation`
--
ALTER TABLE `clientcontactinformation`
  MODIFY `clientContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientindustry`
--
ALTER TABLE `clientindustry`
  MODIFY `clientIndustryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clientlead`
--
ALTER TABLE `clientlead`
  MODIFY `clientLeadId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `clientleadimage`
--
ALTER TABLE `clientleadimage`
  MODIFY `clientLeadImage` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `clientprductwishlist`
--
ALTER TABLE `clientprductwishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `countryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `industrylist`
--
ALTER TABLE `industrylist`
  MODIFY `industryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `industrysublist`
--
ALTER TABLE `industrysublist`
  MODIFY `IndustrySublistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `industrysubtype`
--
ALTER TABLE `industrysubtype`
  MODIFY `industrysubtypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `managerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menulist`
--
ALTER TABLE `menulist`
  MODIFY `menuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `NewsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `porductinformation`
--
ALTER TABLE `porductinformation`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `prductwishlist`
--
ALTER TABLE `prductwishlist`
  MODIFY `wishlistID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;

--
-- AUTO_INCREMENT for table `productimage`
--
ALTER TABLE `productimage`
  MODIFY `productImage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
