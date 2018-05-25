# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.21)
# Database: angelfood
# Generation Time: 2018-05-25 00:48:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table address
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `addressId` int(11) NOT NULL AUTO_INCREMENT,
  `addrLine1` varchar(100) DEFAULT NULL,
  `addrLine2` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`addressId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;

INSERT INTO `address` (`addressId`, `addrLine1`, `addrLine2`, `city`, `state`, `zip`, `created_at`, `updated_at`)
VALUES
	(1,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-06-06 18:55:45','2018-06-06 18:55:45'),
	(2,'22 Morssy Blvd','Apt 101','Boston','MA','02125','2018-06-06 18:55:45','2018-06-06 18:55:45'),
	(9,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 15:18:52','2018-05-13 15:18:52'),
	(10,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 16:27:42','2018-05-13 16:27:42'),
	(11,'900 Sesame Street','1 Apt','Scranton','PA','123456','2018-05-13 16:33:49','2018-05-13 16:33:49'),
	(12,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 16:45:50','2018-05-13 16:45:50'),
	(13,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 17:41:35','2018-05-13 17:41:35'),
	(14,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 17:42:36','2018-05-13 17:42:36'),
	(15,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 21:05:07','2018-05-13 21:05:07'),
	(16,'900 Sesame Street','1 Apt','Scranton','PA','123456','2018-05-13 21:57:02','2018-05-13 21:57:02'),
	(17,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-13 22:07:00','2018-05-13 22:07:00'),
	(18,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-14 19:41:33','2018-05-14 19:41:33'),
	(19,'1 Harbor Point','Apt 101','Boston','MA','02125','2018-05-14 19:41:40','2018-05-14 19:41:40'),
	(20,'22 Morssy Blvd','Apt 101','Boston','MA','02125','2018-05-14 21:20:13','2018-05-14 21:20:13');

/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table admin_action
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin_action`;

CREATE TABLE `admin_action` (
  `ACTION_ID` int(11) NOT NULL,
  `ACTION_NAME` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ACTION_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `admin_action` WRITE;
/*!40000 ALTER TABLE `admin_action` DISABLE KEYS */;

INSERT INTO `admin_action` (`ACTION_ID`, `ACTION_NAME`)
VALUES
	(0,'NA');

/*!40000 ALTER TABLE `admin_action` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table alert_action
# ------------------------------------------------------------

DROP TABLE IF EXISTS `alert_action`;

CREATE TABLE `alert_action` (
  `actionId` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `ALERT_DATE` datetime DEFAULT NULL,
  `ENTERED_BY` varchar(20) DEFAULT NULL,
  `notes` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `alert_action` WRITE;
/*!40000 ALTER TABLE `alert_action` DISABLE KEYS */;

INSERT INTO `alert_action` (`actionId`, `uid`, `ALERT_DATE`, `ENTERED_BY`, `notes`)
VALUES
	(1,1,'2018-06-06 18:55:45','Admin','Test');

/*!40000 ALTER TABLE `alert_action` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table casemanager
# ------------------------------------------------------------

DROP TABLE IF EXISTS `casemanager`;

CREATE TABLE `casemanager` (
  `casemanagerId` int(11) NOT NULL AUTO_INCREMENT,
  `casemanagerName` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `casemanagerPhone` varchar(20) DEFAULT NULL,
  `casemanagerFax` varchar(20) DEFAULT NULL,
  `casemanagerAgency` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`casemanagerId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `casemanager` WRITE;
/*!40000 ALTER TABLE `casemanager` DISABLE KEYS */;

INSERT INTO `casemanager` (`casemanagerId`, `casemanagerName`, `created_at`, `updated_at`, `casemanagerPhone`, `casemanagerFax`, `casemanagerAgency`)
VALUES
	(1,'John Doe','2018-06-06 18:55:45','2018-06-06 18:55:45','123456789','NA','NA'),
	(2,'Ben','2018-06-06 18:55:45','2018-06-06 18:55:45','123456789','NA','NA');

/*!40000 ALTER TABLE `casemanager` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cohabitant
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cohabitant`;

CREATE TABLE `cohabitant` (
  `cohabitantId` int(11) NOT NULL AUTO_INCREMENT,
  `cohabitantFirstName` varchar(20) DEFAULT NULL,
  `cohabitantLastName` varchar(30) DEFAULT NULL,
  `cohabitantAge` int(11) DEFAULT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `isCaretaker` tinyint(1) DEFAULT NULL,
  `mealRequired` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`cohabitantId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `cohabitant` WRITE;
/*!40000 ALTER TABLE `cohabitant` DISABLE KEYS */;

INSERT INTO `cohabitant` (`cohabitantId`, `cohabitantFirstName`, `cohabitantLastName`, `cohabitantAge`, `relationship`, `created_at`, `updated_at`, `isCaretaker`, `mealRequired`)
VALUES
	(1,'John','Doe',25,'Single','2018-06-06 18:55:45','2018-06-06 18:55:45',0,1),
	(2,'Alexa','Martinez',21,'Single','2018-06-06 18:55:45','2018-06-06 18:55:45',1,1),
	(8,'Some Name','Some LName',21,'Single','2018-05-12 18:36:14','2018-05-12 18:36:14',1,1),
	(14,'Some Name','Some LName',21,'Single','2018-05-13 15:10:15','2018-05-13 15:10:15',1,NULL),
	(15,'Some Name','Some LName',21,'Single','2018-05-13 15:18:52','2018-05-13 15:18:52',1,NULL),
	(16,'Some Name','Some LName',21,'Single','2018-05-13 16:27:42','2018-05-13 16:27:42',1,NULL),
	(17,'Jim','Halpert',30,'Brother','2018-05-13 16:33:49','2018-05-13 16:33:49',1,NULL),
	(18,'Some Name','Some LName',21,'Single','2018-05-13 16:45:51','2018-05-13 16:45:51',1,NULL),
	(19,'Some Name','Some LName',21,'Single','2018-05-13 17:41:35','2018-05-13 17:41:35',1,NULL),
	(20,'CoAdmin','Doe',28,'Single','2018-05-13 17:42:36','2018-05-13 17:42:36',1,NULL),
	(21,'CoAdmin','Doe',28,'Single','2018-05-13 21:05:07','2018-05-13 21:05:07',1,NULL),
	(22,'Jim','Halpert',30,'Brother','2018-05-13 21:57:02','2018-05-13 21:57:02',1,NULL),
	(23,'CoAdmin','Doe',28,'Single','2018-05-13 22:07:00','2018-05-13 22:07:00',0,NULL),
	(24,'CoAdmin','Doe',28,'Single','2018-05-14 19:41:34','2018-05-14 19:41:34',0,NULL),
	(25,'CoAdmin','Doe',28,'Single','2018-05-14 19:41:40','2018-05-14 19:41:40',0,NULL),
	(26,'Alexa','Martinez',21,'Single','2018-05-14 21:20:14','2018-05-14 21:20:14',1,NULL);

/*!40000 ALTER TABLE `cohabitant` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table congressional_districts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `congressional_districts`;

CREATE TABLE `congressional_districts` (
  `congressionalDId` int(11) NOT NULL,
  `congressionalDName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`congressionalDId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `congressional_districts` WRITE;
/*!40000 ALTER TABLE `congressional_districts` DISABLE KEYS */;

INSERT INTO `congressional_districts` (`congressionalDId`, `congressionalDName`)
VALUES
	(1,'NA');

/*!40000 ALTER TABLE `congressional_districts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table county
# ------------------------------------------------------------

DROP TABLE IF EXISTS `county`;

CREATE TABLE `county` (
  `countyID` int(11) NOT NULL,
  `countyName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`countyID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `county` WRITE;
/*!40000 ALTER TABLE `county` DISABLE KEYS */;

INSERT INTO `county` (`countyID`, `countyName`)
VALUES
	(1,'Suffolk');

/*!40000 ALTER TABLE `county` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table emergency_contact
# ------------------------------------------------------------

DROP TABLE IF EXISTS `emergency_contact`;

CREATE TABLE `emergency_contact` (
  `contactId` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `contactName` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `relation` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contactId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `emergency_contact` WRITE;
/*!40000 ALTER TABLE `emergency_contact` DISABLE KEYS */;

INSERT INTO `emergency_contact` (`contactId`, `uid`, `contactName`, `created_at`, `updated_at`, `phone`, `relation`)
VALUES
	(1,1,'Dwight','2018-06-06 18:55:45','2018-06-06 18:55:45','9876543211','Friend');

/*!40000 ALTER TABLE `emergency_contact` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table food_prep_facilities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `food_prep_facilities`;

CREATE TABLE `food_prep_facilities` (
  `prepId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `prepName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`prepId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `food_prep_facilities` WRITE;
/*!40000 ALTER TABLE `food_prep_facilities` DISABLE KEYS */;

INSERT INTO `food_prep_facilities` (`prepId`, `created_at`, `updated_at`, `prepName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Non-vegeterian'),
	(2,'2018-05-13 14:46:20','2018-05-13 14:46:20','Non-vegeterian'),
	(3,'2018-05-13 14:47:45','2018-05-13 14:47:45','Non-vegeterian'),
	(4,'2018-05-13 15:03:35','2018-05-13 15:03:35','Non-vegeterian'),
	(5,'2018-05-13 15:05:38','2018-05-13 15:05:38','Non-vegeterian'),
	(6,'2018-05-13 15:10:15','2018-05-13 15:10:15','Non-vegeterian'),
	(7,'2018-05-13 15:18:52','2018-05-13 15:18:52','Non-vegeterian'),
	(8,'2018-05-13 16:27:43','2018-05-13 16:27:43','Non-vegeterian'),
	(9,'2018-05-13 16:33:49','2018-05-13 16:33:49','Grilled'),
	(10,'2018-05-13 16:45:51','2018-05-13 16:45:51','Non-vegeterian'),
	(11,'2018-05-13 17:41:36','2018-05-13 17:41:36','Vegan'),
	(12,'2018-05-13 17:42:36','2018-05-13 17:42:36','Vegan'),
	(13,'2018-05-13 21:05:07','2018-05-13 21:05:07','Vegan'),
	(14,'2018-05-13 21:57:02','2018-05-13 21:57:02','Grilled'),
	(15,'2018-05-13 22:07:00','2018-05-13 22:07:00','Vegan'),
	(16,'2018-05-14 19:41:34','2018-05-14 19:41:34','Vegan'),
	(17,'2018-05-14 19:41:40','2018-05-14 19:41:40','Vegan'),
	(18,'2018-05-14 21:20:14','2018-05-14 21:20:14','Non-vegeterian');

/*!40000 ALTER TABLE `food_prep_facilities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gender
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gender`;

CREATE TABLE `gender` (
  `genderTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `genderTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`genderTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `gender` WRITE;
/*!40000 ALTER TABLE `gender` DISABLE KEYS */;

INSERT INTO `gender` (`genderTypeId`, `created_at`, `updated_at`, `genderTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Male'),
	(2,'2018-06-06 18:55:45','2018-06-06 18:55:45','Female'),
	(7,'2018-05-11 07:31:41','2018-05-11 07:31:41','Transgender'),
	(8,'2018-05-11 07:32:13','2018-05-11 07:32:13','Other');

/*!40000 ALTER TABLE `gender` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table housing_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `housing_type`;

CREATE TABLE `housing_type` (
  `housingTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `housingTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`housingTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `housing_type` WRITE;
/*!40000 ALTER TABLE `housing_type` DISABLE KEYS */;

INSERT INTO `housing_type` (`housingTypeId`, `created_at`, `updated_at`, `housingTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Studio'),
	(2,'2018-06-06 18:55:45','2018-06-06 18:55:45','1 BHK');

/*!40000 ALTER TABLE `housing_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table medical_diagnosises
# ------------------------------------------------------------

DROP TABLE IF EXISTS `medical_diagnosises`;

CREATE TABLE `medical_diagnosises` (
  `diagnosisId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `diagnosisName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`diagnosisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `medical_diagnosises` WRITE;
/*!40000 ALTER TABLE `medical_diagnosises` DISABLE KEYS */;

INSERT INTO `medical_diagnosises` (`diagnosisId`, `created_at`, `updated_at`, `diagnosisName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Healthy'),
	(2,'2018-05-13 14:46:20','2018-05-13 14:46:20','Healthy'),
	(3,'2018-05-13 14:47:45','2018-05-13 14:47:45','Healthy'),
	(4,'2018-05-13 15:03:35','2018-05-13 15:03:35','Healthy'),
	(5,'2018-05-13 15:05:38','2018-05-13 15:05:38','Healthy'),
	(6,'2018-05-13 15:10:15','2018-05-13 15:10:15','Healthy'),
	(7,'2018-05-13 15:18:52','2018-05-13 15:18:52','Healthy'),
	(8,'2018-05-13 16:27:42','2018-05-13 16:27:42','Healthy'),
	(9,'2018-05-13 16:33:49','2018-05-13 16:33:49','Recyclotron'),
	(10,'2018-05-13 16:45:51','2018-05-13 16:45:51','Healthy'),
	(11,'2018-05-13 17:41:36','2018-05-13 17:41:36','Healthy'),
	(12,'2018-05-13 17:42:36','2018-05-13 17:42:36','Healthy'),
	(13,'2018-05-13 21:05:07','2018-05-13 21:05:07','Healthy'),
	(14,'2018-05-13 21:57:02','2018-05-13 21:57:02','Recyclotron'),
	(15,'2018-05-13 22:07:00','2018-05-13 22:07:00','Healthy'),
	(16,'2018-05-14 19:41:34','2018-05-14 19:41:34','Healthy'),
	(17,'2018-05-14 19:41:40','2018-05-14 19:41:40','Healthy'),
	(18,'2018-05-14 21:20:14','2018-05-14 21:20:14','Healthy');

/*!40000 ALTER TABLE `medical_diagnosises` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table political_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `political_info`;

CREATE TABLE `political_info` (
  `uid` int(11) DEFAULT NULL,
  `countyId` int(11) DEFAULT NULL,
  `stateId` int(11) DEFAULT NULL,
  `congressionalDId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `political_info` WRITE;
/*!40000 ALTER TABLE `political_info` DISABLE KEYS */;

INSERT INTO `political_info` (`uid`, `countyId`, `stateId`, `congressionalDId`)
VALUES
	(1,1,1,1);

/*!40000 ALTER TABLE `political_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table race
# ------------------------------------------------------------

DROP TABLE IF EXISTS `race`;

CREATE TABLE `race` (
  `raceTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `raceTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`raceTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `race` WRITE;
/*!40000 ALTER TABLE `race` DISABLE KEYS */;

INSERT INTO `race` (`raceTypeId`, `created_at`, `updated_at`, `raceTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Asian'),
	(2,'2018-06-06 18:55:45','2018-06-06 18:55:45','American');

/*!40000 ALTER TABLE `race` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table refer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `refer`;

CREATE TABLE `refer` (
  `referId` int(11) NOT NULL AUTO_INCREMENT,
  `referTypeId` int(11) DEFAULT NULL,
  `referPhone` varchar(20) DEFAULT NULL,
  `referName` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`referId`),
  KEY `referTypeId` (`referTypeId`),
  CONSTRAINT `refer_ibfk_1` FOREIGN KEY (`referTypeId`) REFERENCES `refer_type` (`referTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `refer` WRITE;
/*!40000 ALTER TABLE `refer` DISABLE KEYS */;

INSERT INTO `refer` (`referId`, `referTypeId`, `referPhone`, `referName`, `created_at`, `updated_at`)
VALUES
	(1,1,'123456789','Jane Doe','2018-06-06 18:55:45','2018-06-06 18:55:45'),
	(2,1,'123456789','Jane Doe','2018-05-13 14:46:20','2018-05-13 14:46:20'),
	(3,1,'123-456-7891','Jane Doe','2018-05-13 14:47:44','2018-05-13 14:47:44'),
	(4,1,'123-456-7891','Jane Doe','2018-05-13 15:03:35','2018-05-13 15:03:35'),
	(5,1,'123-456-7891','Jane Doe','2018-05-13 15:05:38','2018-05-13 15:05:38'),
	(6,1,'123-456-7891','Jane Doe','2018-05-13 15:10:15','2018-05-13 15:10:15'),
	(7,1,'123-456-7891','Jane Doe','2018-05-13 15:18:52','2018-05-13 15:18:52'),
	(8,1,'123-456-7891','Jane Doe','2018-05-13 16:27:42','2018-05-13 16:27:42'),
	(9,1,'987-654-3122','Joey','2018-05-13 16:33:49','2018-05-13 16:33:49'),
	(10,1,'123-456-7891','Jane Doe','2018-05-13 16:45:50','2018-05-13 16:45:50'),
	(11,1,'123-456-7891','Jane Doe','2018-05-13 17:41:35','2018-05-13 17:41:35'),
	(12,1,'123-456-7891','Jane Doe','2018-05-13 17:42:36','2018-05-13 17:42:36'),
	(13,1,'123-456-7891','Jane Doe','2018-05-13 21:05:07','2018-05-13 21:05:07'),
	(14,1,'987-654-3122','Joey','2018-05-13 21:57:02','2018-05-13 21:57:02'),
	(15,1,'123-456-7891','Jane Doe','2018-05-13 22:07:00','2018-05-13 22:07:00'),
	(16,1,'123-456-7891','Jane Doe','2018-05-14 19:41:34','2018-05-14 19:41:34'),
	(17,1,'123-456-7891','Jane Doe','2018-05-14 19:41:40','2018-05-14 19:41:40'),
	(18,1,'123456789','Jane Doe','2018-05-14 21:20:14','2018-05-14 21:20:14');

/*!40000 ALTER TABLE `refer` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table refer_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `refer_type`;

CREATE TABLE `refer_type` (
  `referTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `referTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`referTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `refer_type` WRITE;
/*!40000 ALTER TABLE `refer_type` DISABLE KEYS */;

INSERT INTO `refer_type` (`referTypeId`, `created_at`, `updated_at`, `referTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Local');

/*!40000 ALTER TABLE `refer_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table sexual_orientation
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sexual_orientation`;

CREATE TABLE `sexual_orientation` (
  `sexualOrientationTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sexualOrientationTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sexualOrientationTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sexual_orientation` WRITE;
/*!40000 ALTER TABLE `sexual_orientation` DISABLE KEYS */;

INSERT INTO `sexual_orientation` (`sexualOrientationTypeId`, `created_at`, `updated_at`, `sexualOrientationTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Straight');

/*!40000 ALTER TABLE `sexual_orientation` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user`;

CREATE TABLE `site_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(20) DEFAULT NULL,
  `lname` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ssn` varchar(20) DEFAULT NULL,
  `mobPhone` varchar(20) DEFAULT NULL,
  `printLang` varchar(20) DEFAULT NULL,
  `oralLang` varchar(20) DEFAULT NULL,
  `userTypeId` int(11) DEFAULT NULL,
  `genderTypeId` int(11) DEFAULT NULL,
  `raceTypeId` int(11) DEFAULT NULL,
  `sexualOrientationTypeId` int(11) DEFAULT NULL,
  `housingTypeId` int(11) DEFAULT NULL,
  `isVeteran` tinyint(1) DEFAULT NULL,
  `addressId` int(11) DEFAULT NULL,
  `referId` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `casemanagerId` int(11) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user` WRITE;
/*!40000 ALTER TABLE `site_user` DISABLE KEYS */;

INSERT INTO `site_user` (`uid`, `fname`, `lname`, `email`, `username`, `password`, `dob`, `ssn`, `mobPhone`, `printLang`, `oralLang`, `userTypeId`, `genderTypeId`, `raceTypeId`, `sexualOrientationTypeId`, `housingTypeId`, `isVeteran`, `addressId`, `referId`, `created_at`, `updated_at`, `casemanagerId`, `token`, `active`)
VALUES
	(1,'Administrator',' ','admin@test.com','admin','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','1992-01-01','123-456-7899','123-456-7899','English','English',1,2,1,1,1,0,19,17,'2018-06-06 18:55:45','2018-05-18 19:15:38',1,'bbe50ec2d62678b115dcf83b47ba87ffe06d4f53',1),
	(2,'Pam','Bheasly','pam@test.com','pam','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','1992-01-01','12345678','123456789','English','English',3,2,2,1,2,0,20,18,'2018-06-06 18:55:45','2018-05-15 14:26:05',1,'6bbda3719162b90d23838f04529dd488444b435b',1),
	(22,'Dwight','Shrute','dwight@test.net','dwight','5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','2018-05-31','123-456-6666','123-456-7888','English','English',2,1,2,1,2,1,16,14,'2018-05-13 16:33:49','2018-05-13 21:57:02',2,NULL,0);

/*!40000 ALTER TABLE `site_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user_cohabitant_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user_cohabitant_map`;

CREATE TABLE `site_user_cohabitant_map` (
  `uid` int(11) NOT NULL,
  `cohabitantId` int(11) NOT NULL,
  PRIMARY KEY (`cohabitantId`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user_cohabitant_map` WRITE;
/*!40000 ALTER TABLE `site_user_cohabitant_map` DISABLE KEYS */;

INSERT INTO `site_user_cohabitant_map` (`uid`, `cohabitantId`)
VALUES
	(3,3),
	(22,22),
	(1,25),
	(2,26);

/*!40000 ALTER TABLE `site_user_cohabitant_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user_diagnosis_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user_diagnosis_map`;

CREATE TABLE `site_user_diagnosis_map` (
  `uid` int(11) NOT NULL,
  `diagnosisId` int(11) NOT NULL,
  PRIMARY KEY (`uid`,`diagnosisId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user_diagnosis_map` WRITE;
/*!40000 ALTER TABLE `site_user_diagnosis_map` DISABLE KEYS */;

INSERT INTO `site_user_diagnosis_map` (`uid`, `diagnosisId`)
VALUES
	(1,17),
	(2,18),
	(3,2),
	(22,14);

/*!40000 ALTER TABLE `site_user_diagnosis_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user_food_prep_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user_food_prep_map`;

CREATE TABLE `site_user_food_prep_map` (
  `prepId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`prepId`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user_food_prep_map` WRITE;
/*!40000 ALTER TABLE `site_user_food_prep_map` DISABLE KEYS */;

INSERT INTO `site_user_food_prep_map` (`prepId`, `uid`)
VALUES
	(1,3),
	(14,22),
	(17,1),
	(18,2);

/*!40000 ALTER TABLE `site_user_food_prep_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user_special_need_map
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user_special_need_map`;

CREATE TABLE `site_user_special_need_map` (
  `specialNeedId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`specialNeedId`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user_special_need_map` WRITE;
/*!40000 ALTER TABLE `site_user_special_need_map` DISABLE KEYS */;

INSERT INTO `site_user_special_need_map` (`specialNeedId`, `uid`)
VALUES
	(15,22),
	(18,1),
	(19,2);

/*!40000 ALTER TABLE `site_user_special_need_map` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table site_user_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `site_user_type`;

CREATE TABLE `site_user_type` (
  `userTypeId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `userTypeName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`userTypeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `site_user_type` WRITE;
/*!40000 ALTER TABLE `site_user_type` DISABLE KEYS */;

INSERT INTO `site_user_type` (`userTypeId`, `created_at`, `updated_at`, `userTypeName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Admin'),
	(2,'2018-05-13 17:10:45','2018-05-13 17:10:45','Staff'),
	(3,'2018-06-06 18:55:45','2018-06-06 18:55:45','User'),
	(4,'2018-05-15 14:16:58','2018-05-15 14:16:58','Volunteer'),
	(5,'2018-05-15 14:17:12','2018-05-15 14:17:12','Referer');

/*!40000 ALTER TABLE `site_user_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table special_need
# ------------------------------------------------------------

DROP TABLE IF EXISTS `special_need`;

CREATE TABLE `special_need` (
  `specialNeedId` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `specialNeedName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`specialNeedId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `special_need` WRITE;
/*!40000 ALTER TABLE `special_need` DISABLE KEYS */;

INSERT INTO `special_need` (`specialNeedId`, `created_at`, `updated_at`, `specialNeedName`)
VALUES
	(1,'2018-06-06 18:55:45','2018-06-06 18:55:45','Protiens'),
	(2,'2018-06-06 18:55:45','2018-06-06 18:55:45','Diary Free'),
	(3,'2018-05-13 14:46:20','2018-05-13 14:46:20','Protiens'),
	(4,'2018-05-13 14:47:45','2018-05-13 14:47:45','Protiens'),
	(5,'2018-05-13 15:03:35','2018-05-13 15:03:35','Protiens'),
	(6,'2018-05-13 15:05:38','2018-05-13 15:05:38','Protiens'),
	(7,'2018-05-13 15:10:15','2018-05-13 15:10:15','Protiens'),
	(8,'2018-05-13 15:18:52','2018-05-13 15:18:52','Protiens'),
	(9,'2018-05-13 16:27:43','2018-05-13 16:27:43','Protiens'),
	(10,'2018-05-13 16:33:49','2018-05-13 16:33:49','Beets'),
	(11,'2018-05-13 16:45:51','2018-05-13 16:45:51','Protiens'),
	(12,'2018-05-13 17:41:36','2018-05-13 17:41:36','Protiens'),
	(13,'2018-05-13 17:42:36','2018-05-13 17:42:36','Protiens'),
	(14,'2018-05-13 21:05:07','2018-05-13 21:05:07','Protiens'),
	(15,'2018-05-13 21:57:02','2018-05-13 21:57:02','Beets'),
	(16,'2018-05-13 22:07:00','2018-05-13 22:07:00','Protiens'),
	(17,'2018-05-14 19:41:34','2018-05-14 19:41:34','Protiens'),
	(18,'2018-05-14 19:41:40','2018-05-14 19:41:40','Protiens'),
	(19,'2018-05-14 21:20:14','2018-05-14 21:20:14','Protiens');

/*!40000 ALTER TABLE `special_need` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table state
# ------------------------------------------------------------

DROP TABLE IF EXISTS `state`;

CREATE TABLE `state` (
  `stateId` int(11) NOT NULL,
  `stateName` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`stateId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
