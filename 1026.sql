-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: timekeeping_sirjun
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `calendar_events`
--

DROP TABLE IF EXISTS `calendar_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `calendar_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `calendar_events`
--

LOCK TABLES `calendar_events` WRITE;
/*!40000 ALTER TABLE `calendar_events` DISABLE KEYS */;
INSERT INTO `calendar_events` VALUES (1,'asdsadsadsad','2017-10-16','2017-10-20','asdadsa',1),(3,'asdsad','2017-10-09','2017-10-10','asdsadsa',1),(4,'test','2017-11-01','2017-11-01','test',1),(5,'papaputok ako','2018-01-01','2018-01-01','bagong taon',1);
/*!40000 ALTER TABLE `calendar_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES ('jOGpPn5f2jc','Astrid Technologies');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_number` varchar(20) DEFAULT NULL,
  `sss_no` int(11) DEFAULT NULL,
  `tin_no` int(11) DEFAULT NULL,
  `phil_health` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,NULL,123,12322,123,2),(2,NULL,11,0,0,4),(3,NULL,123,0,0,10),(30,NULL,NULL,NULL,NULL,56),(31,'',123,123,123,1),(32,NULL,NULL,NULL,NULL,57),(33,NULL,NULL,NULL,NULL,58),(34,NULL,NULL,NULL,NULL,59),(35,NULL,NULL,NULL,NULL,60),(36,NULL,NULL,NULL,NULL,61);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `intern`
--

DROP TABLE IF EXISTS `intern`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `intern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `no_of_hrs` int(11) NOT NULL,
  `course` varchar(150) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `remaining` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `intern`
--

LOCK TABLES `intern` WRITE;
/*!40000 ALTER TABLE `intern` DISABLE KEYS */;
INSERT INTO `intern` VALUES (1,3,'USTs',250,'BSITWMA','2017-05-06','2017-2018','231'),(2,5,'Feu',250,'Feu-it','2017-10-10','2017-2018','242'),(3,6,'123213',2,'Bsit','0000-00-00','asd','2'),(6,9,NULL,520,NULL,NULL,NULL,'520');
/*!40000 ALTER TABLE `intern` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=248 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-08 16:30:13'),(2,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-08 16:30:13'),(3,'Account Access','Account Login ','Intern','::1','Intern Intern','2017-10-08 16:30:13'),(4,'Account Access','Account Logout ','Intern','::1','Intern Intern','2017-10-08 16:30:13'),(5,'Account Access','Account Login ','Human Resource','::1','Hr Hr','2017-10-08 16:30:13'),(6,'Account Access','Account Logout ','Human Resource','::1','Hr Hr','2017-10-08 16:30:36'),(7,'Account Access','Account Login ','Human Resource','::1','Hr Hr','2017-10-08 16:31:17'),(8,'Account Access','Reject Overtime of Employee Emplo','Human Resource','::1','Hr Hr','2017-10-08 16:34:08'),(9,'Approve Overtime','Approved Overtime of Employee Emplo','Human Resource','::1','Hr Hr','2017-10-08 16:36:31'),(10,'Account Access','Account Logout ','Human Resource','::1','Hr Hr','2017-10-08 16:40:05'),(11,'Account Access','Account Login ','Employee','::1','Farrah Dionisios','2017-10-08 16:41:13'),(12,'File Overtime','Filed Overtime By Farrah Dionisios','Employee','::1','Farrah Dionisios','2017-10-08 16:41:31'),(13,'Account Access','Account Logout ','Employee','::1','Farrah Dionisios','2017-10-08 16:41:34'),(14,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-08 16:47:03'),(15,'User Time-in/Time-out','Work From Home','Admin','::1','Erin Rugas','2017-10-08 16:47:10'),(16,'Account Modify','Update information of Intern Interns','Admin','::1','Erin Rugas','2017-10-08 16:56:32'),(17,'Account Modify','Active account of Intern Interns','Admin','::1','Erin Rugas','2017-10-08 16:56:45'),(18,'Account Modify','Update information of Farrah Debrah Dionisios','Admin','::1','Erin Rugas','2017-10-08 17:01:16'),(19,'Account Modify','Update information of Farrah Debrah Dionisios','Admin','::1','Erin Rugas','2017-10-08 17:01:27'),(20,'Account Modify','Update information of Farrah Debrah Dionisio','Admin','::1','Erin Rugas','2017-10-08 17:01:34'),(21,'Account Modify','Update profile picture','Admin','::1','Erin Rugas','2017-10-08 17:02:00'),(22,'Account Modify','Update information','Admin','::1','Erin John Rugas','2017-10-08 17:04:47'),(23,'Edit Position','Update Position ','Admin','::1','Erin John Rugas','2017-10-08 17:08:01'),(24,'Edit Position','Update Position Admin','Admin','::1','Erin John Rugas','2017-10-08 17:08:25'),(25,'Add Position','Added Position ','Admin','::1','Erin John Rugas','2017-10-08 17:09:05'),(26,'Add Position','Added Position ','Admin','::1','Erin John Rugas','2017-10-08 17:10:29'),(27,'Add Position','Added Position Project Head','Admin','::1','Erin John Rugas','2017-10-08 17:10:55'),(28,'Shift Modify','Edit Shift Mid','Admin','::1','Erin John Rugas','2017-10-08 17:12:08'),(29,'Shift Modify','Edit Mid Shift','Admin','::1','Erin John Rugas','2017-10-08 17:12:44'),(30,'Account Modify','Deactivate account of Hr Hr','Admin','::1','Erin John Rugas','2017-10-08 17:13:07'),(31,'Account Modify','Active account of Hr Hr','Admin','::1','Erin John Rugas','2017-10-08 17:13:23'),(32,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-08 17:22:25'),(33,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-08 17:22:31'),(34,'Edit Position','Update Position Human Resource','Admin','::1','Erin John Rugas','2017-10-08 17:23:09'),(35,'Edit Position','Update Position Admin','Admin','::1','Erin John Rugas','2017-10-08 17:23:15'),(36,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-09 02:53:13'),(37,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-09 09:41:01'),(38,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-09 09:57:30'),(39,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-09 09:57:35'),(40,'Account Access','Account Logout ','Employee','::1','Employee Emplo','2017-10-09 09:58:01'),(41,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-09 09:58:40'),(42,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-09 10:11:13'),(43,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-09 10:11:19'),(44,'Account Access','Account Logout ','Employee','::1','Employee Emplo','2017-10-09 10:11:24'),(45,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-09 10:11:30'),(46,'Account Modify','Update information of Intern Interns','Admin','::1','Erin John Rugas','2017-10-09 10:58:06'),(47,'Account Access','Account Logout ','Intern','::1','Intern Interns','2017-10-09 15:50:15'),(48,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-09 15:50:20'),(49,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-10 00:18:31'),(50,'Account Access','Account Login ','Intern','::1','Intern Interns','2017-10-10 00:18:38'),(51,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-10 00:33:13'),(52,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-10 07:52:28'),(53,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-10 08:21:13'),(54,'Account Access','Account Login ','Intern','::1','Intern Interns','2017-10-10 08:21:36'),(55,'Account Access','Account Logout ','Intern','::1','Intern Interns','2017-10-10 09:52:40'),(56,'Account Access','Account Login ','Employee','::1','Farrah Debrah Dionisio','2017-10-10 09:54:44'),(57,'Account Access','Account Logout ','Employee','::1','Farrah Debrah Dionisio','2017-10-10 09:55:04'),(58,'Account Access','Account Login ','Intern','::1','Armani Armani','2017-10-10 09:55:10'),(59,'Account Access','Account Logout ','Intern','::1','Armani Armani','2017-10-10 10:06:42'),(60,'Account Access','Account Login ','Intern','::1','Armani Armani','2017-10-10 10:06:50'),(61,'Account Access','Account Logout ','Intern','::1','Armani Armani','2017-10-10 10:07:16'),(62,'Account Access','Account Login ','Intern','::1','Intern Interns','2017-10-10 10:07:23'),(63,'Account Access','Account Logout ','Intern','::1','Intern Interns','2017-10-10 10:29:54'),(64,'Account Access','Account Login ','Intern','::1','Armani Armani','2017-10-10 10:30:06'),(65,'Account Access','Account Logout ','Intern','::1','Armani Armani','2017-10-10 10:30:10'),(66,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-10 23:15:57'),(67,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-11 12:09:09'),(68,'Edit Position','Update Position Employee','Admin','::1','Erin John Rugas','2017-10-11 12:09:34'),(69,'Edit Position','Update Position Employee','Admin','::1','Erin John Rugas','2017-10-11 12:09:44'),(70,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-11 23:07:13'),(71,'Account Modify','Update information of Farrah Debrah Dionisio','Admin','::1','Erin John Rugas','2017-10-11 23:08:10'),(72,'Account Modify','Update information of Farrah Debrah Dionisio','Admin','::1','Erin John Rugas','2017-10-11 23:08:11'),(73,'Edit Position','Update Position Admin','Admin','::1','Erin John Rugas','2017-10-11 23:11:15'),(74,'Account Modify','Update information','Admin','::1','Erin John Rugas','2017-10-11 23:11:28'),(75,'Account Modify','Update information','Admin','::1','Erin John Rugassss','2017-10-11 23:11:32'),(76,'Account Modify','Update information','Admin','::1','Erin John Rugas','2017-10-11 23:11:38'),(77,'Account Modify','Update information','Admin','::1','Erin John M Rugas','2017-10-11 23:14:15'),(78,'Account Modify','Update information','Admin','::1','Erin John Rugas','2017-10-11 23:14:26'),(79,'Account Modify','Update Profile Picture','Admin','::1','Erin John Rugas','2017-10-11 23:19:10'),(80,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-11 23:19:18'),(81,'Account Access','Account Login ','Intern','::1','Intern Interns','2017-10-11 23:19:26'),(82,'Account Access','Account Logout ','Intern','::1','Intern Interns','2017-10-11 23:19:33'),(83,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-11 23:19:42'),(84,'Edit Position','Update Position Intern','Admin','::1','Erin John Rugas','2017-10-11 23:19:56'),(85,'Edit Position','Update Position Project Head','Admin','::1','Erin John Rugas','2017-10-11 23:20:02'),(86,'Edit Position','Update Position Employee','Admin','::1','Erin John Rugas','2017-10-11 23:20:11'),(87,'Edit Position','Update Position Human Resource','Admin','::1','Erin John Rugas','2017-10-11 23:20:23'),(88,'Edit Position','Update Position Manager','Admin','::1','Erin John Rugas','2017-10-11 23:20:32'),(89,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-11 23:20:36'),(90,'Account Access','Account Login ','Intern','::1','Intern Interns','2017-10-11 23:20:48'),(91,'Account Modify','Update information','Intern','::1','Intern Internss','2017-10-11 23:25:02'),(92,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-11 23:43:19'),(93,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-13 08:46:55'),(94,'Account Modify','Update information','Admin','::1','Erin Rugas','2017-10-13 09:02:08'),(95,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-13 09:15:19'),(96,'Account Access','Account Login ','Intern','::1','Intern Internss','2017-10-13 09:15:26'),(97,'Account Access','Account Logout ','Intern','::1','Intern Internss','2017-10-13 09:24:54'),(98,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-13 09:25:00'),(99,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-13 09:30:27'),(100,'Account Access','Account Login ','Intern','::1','Intern Internss','2017-10-13 09:30:37'),(101,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 03:21:37'),(102,'Account Modify','Update information of Armani Armani','Admin','::1','Erin Rugas','2017-10-16 03:22:45'),(103,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-16 03:29:46'),(104,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-16 03:31:41'),(105,'Account Access','Account Logout ','Employee','::1','Employee Emplo','2017-10-16 03:33:15'),(106,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 03:34:21'),(107,'Add User','Added User Testingpic Testingpic',NULL,'::1','Erin Rugas','2017-10-16 03:35:11'),(108,'Account Modify','Activate account of Testingpic Testingpic','Admin','::1','Erin Rugas','2017-10-16 03:35:22'),(109,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-16 03:35:28'),(110,'Account Access','Account Login ','Employee','::1','Testingpic Testingpic','2017-10-16 03:35:30'),(111,'Account Access','Account Logout ','Employee','::1','Testingpic Testingpic','2017-10-16 03:37:19'),(112,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 03:37:24'),(113,'Add User','Added User Zzzz Aaaa',NULL,'::1','Erin Rugas','2017-10-16 03:37:45'),(114,'Add User','Added User Zzzz Aaaa','Admin','::1','Erin Rugas','2017-10-16 03:46:38'),(115,'Add User','Added User Add Add','Admin','::1','Erin Rugas','2017-10-16 03:47:42'),(116,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 08:24:20'),(117,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-16 08:24:29'),(118,'Account Access','Account Login ','Intern','::1','Intern Internss','2017-10-16 08:24:40'),(119,'Account Access','Account Logout ','Intern','::1','Intern Internss','2017-10-16 08:25:42'),(120,'Account Access','Account Login ','Employee','::1','Employee Emplo','2017-10-16 08:25:48'),(121,'Account Access','Account Logout ','Employee','::1','Employee Emplo','2017-10-16 08:25:56'),(122,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 08:26:01'),(123,'Add User','Added User Asdadsadsa Asdasd','Admin','::1','Erin Rugas','2017-10-16 08:26:18'),(124,'Account Modify','Activate account of Add Add','Admin','::1','Erin Rugas','2017-10-16 08:26:54'),(125,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-16 08:26:59'),(126,'Account Access','Account Login ','Project Head','::1','Add Add','2017-10-16 08:27:04'),(127,'Account Access','Account Logout ','Project Head','::1','Add Add','2017-10-16 08:27:10'),(128,'Account Access','Account Login ','Project Head','::1','Add Add','2017-10-16 08:27:42'),(129,'Account Access','Account Logout ','Project Head','::1','Add Add','2017-10-16 08:29:17'),(130,'Account Access','Account Login ','Intern','::1','Intern Internss','2017-10-16 08:29:26'),(131,'Account Access','Account Logout ','Intern','::1','Intern Internss','2017-10-16 08:43:26'),(132,'Account Access','Account Logout ','Intern','::1','Intern Internss','2017-10-16 08:43:26'),(133,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 08:44:11'),(134,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 08:57:16'),(135,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 08:58:09'),(136,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 08:58:12'),(137,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 08:58:39'),(138,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 08:58:46'),(139,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 08:59:14'),(140,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:03:09'),(141,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:03:27'),(142,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:03:48'),(143,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:03:58'),(144,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:04:04'),(145,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:05:02'),(146,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:06:15'),(147,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:06:26'),(148,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:06:41'),(149,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:07:21'),(150,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:11:01'),(151,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:11:17'),(152,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:11:23'),(153,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:11:39'),(154,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:13:03'),(155,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 09:13:40'),(156,'Account Modify','Update information of Employeesss Emplo','Admin','::1','Erin Rugas','2017-10-16 09:13:47'),(157,'Account Modify','Update information of Asda Asd','Admin','::1','Erin Rugas','2017-10-16 09:14:22'),(158,'Account Modify','Update information of Employee Emplo','Admin','::1','Erin Rugas','2017-10-16 09:15:39'),(159,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 09:16:42'),(160,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 09:16:49'),(161,'Account Modify','Update information of Employees Emplo','Admin','::1','Erin Rugas','2017-10-16 09:17:18'),(162,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-16 14:16:24'),(163,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-17 10:08:47'),(164,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-17 10:50:50'),(165,'Account Access','Account Login ','Employee','::1','Employees Emplo','2017-10-17 10:51:10'),(166,'File Overtime','Filed Overtime','Employee','::1','Employees Emplo','2017-10-17 10:51:24'),(167,'Account Access','Account Logout ','Employee','::1','Employees Emplo','2017-10-17 10:51:28'),(168,'Account Access','Account Login ','Intern','::1','Intern Internss','2017-10-17 10:51:42'),(169,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-17 14:49:36'),(170,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-23 13:21:40'),(171,'Edit Position','Update Position Admin','Admin','::1','Erin Rugas','2017-10-23 13:21:48'),(172,'Edit Position','Update Position Employee','Admin','::1','Erin Rugas','2017-10-25 09:14:02'),(173,'Edit Position','Update Position Employee','Admin','::1','Erin Rugas','2017-10-25 09:14:08'),(174,'Add User','Added User No Of Hours No Of Hours','Admin','::1','Erin Rugas','2017-10-25 10:38:37'),(175,'Account Modify','Activate account of Armani Armani','Admin','::1','Erin Rugas','2017-10-25 10:42:10'),(176,'Account Modify','Deactivate account of Armani Armani','Admin','::1','Erin Rugas','2017-10-25 10:42:13'),(177,'Account Modify','Activate account of Erin Rugas','Admin','::1','Erin Rugas','2017-10-25 10:50:04'),(178,'Account Access','Account Login ',NULL,'::1',' ','2017-10-25 13:31:40'),(179,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-25 13:38:22'),(180,'Add User','Added User Employee Employee','Admin','::1','Erin Rugas','2017-10-25 13:55:18'),(181,'Add User','Added User Human Resource','Admin','::1','Erin Rugas','2017-10-25 13:55:47'),(182,'Add User','Added User Intern Intern','Admin','::1','Erin Rugas','2017-10-25 13:56:48'),(183,'Account Modify','Activate account of Employee Employee','Admin','::1','Erin Rugas','2017-10-25 13:56:58'),(184,'Account Modify','Activate account of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 13:57:01'),(185,'Account Modify','Activate account of Human Resource','Admin','::1','Erin Rugas','2017-10-25 13:57:03'),(186,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-25 13:57:10'),(187,'Account Access','Account Login ','Intern','::1','Intern Intern','2017-10-25 13:57:18'),(188,'Account Access','Account Logout ','Intern','::1','Intern Intern','2017-10-25 13:59:34'),(189,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-25 13:59:44'),(190,'Add User','Added User Intern_two Intern_two','Admin','::1','Erin Rugas','2017-10-25 14:01:38'),(191,'Account Modify','Activate account of Intern_two Intern_two','Admin','::1','Erin Rugas','2017-10-25 14:01:44'),(192,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-25 14:01:46'),(193,'Account Access','Account Login ','Intern','::1','Intern_two Intern_two','2017-10-25 14:01:51'),(194,'Account Access','Account Logout ','Intern','::1','Intern_two Intern_two','2017-10-25 14:06:17'),(195,'Account Access','Account Login ','Intern','::1','Intern Intern','2017-10-25 14:06:23'),(196,'Account Modify','Update information','Intern','::1','Intern Intern','2017-10-25 14:12:38'),(197,'Account Access','Account Logout ','Intern','::1','Intern Intern','2017-10-25 14:12:59'),(198,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-25 14:13:07'),(199,'Account Modify','Update profile picture','Admin','::1','Erin Rugas','2017-10-25 14:37:27'),(200,'Account Modify','Activate account of Employee Employee','Admin','::1','Erin Rugas','2017-10-25 14:52:52'),(201,'Account Modify','Activate account of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 14:52:55'),(202,'Account Modify','Activate account of Intern_two Intern_two','Admin','::1','Erin Rugas','2017-10-25 14:52:59'),(203,'Account Modify','Activate account of Human Resource','Admin','::1','Erin Rugas','2017-10-25 14:53:02'),(204,'Account Modify','Activate account of Erin Rugas','Admin','::1','Erin Rugas','2017-10-25 14:53:05'),(205,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:08:30'),(206,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:08:48'),(207,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:14:36'),(208,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:17:41'),(209,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:18:36'),(210,'Account Modify','Update profile picture','Admin','::1','Erin Rugas','2017-10-25 15:19:08'),(211,'Account Modify','Update profile picture','Admin','::1','Erin Rugas','2017-10-25 15:20:34'),(212,'Account Modify','Update profile picture','Admin','::1','Erin Rugas','2017-10-25 15:20:42'),(213,'Account Modify','Update information of Interns Intern','Admin','::1','Erin Rugas','2017-10-25 15:47:14'),(214,'Account Modify','Update information of Interns Intern','Admin','::1','Erin Rugas','2017-10-25 15:47:15'),(215,'Account Modify','Update information of Interns Intern','Admin','::1','Erin Rugas','2017-10-25 15:47:15'),(216,'Account Modify','Update information of Interns Intern','Admin','::1','Erin Rugas','2017-10-25 15:47:17'),(217,'Account Modify','Update information of Interns Intern','Admin','::1','Erin Rugas','2017-10-25 15:47:17'),(218,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:48:14'),(219,'Account Modify','Update information of Intern Intern','Admin','::1','Erin Rugas','2017-10-25 15:49:11'),(220,'Account Modify','Update information of Intern_two Intern_two','Admin','::1','Erin Rugas','2017-10-25 15:54:07'),(221,'Account Access','Account Logout ','Admin','::1','Erin Rugas','2017-10-25 15:54:35'),(222,'Account Access','Account Login ','Intern','::1','Intern_two Intern_two','2017-10-25 15:57:27'),(223,'Account Modify','Change Password','Intern','::1','Intern_two Intern_two','2017-10-25 15:58:33'),(224,'Account Access','Account Logout ','Intern','::1','Intern_two Intern_two','2017-10-25 15:59:43'),(225,'Account Access','Account Login ','Intern','::1','Intern_two Intern_two','2017-10-25 15:59:51'),(226,'Account Modify','Change Password','Intern','::1','Intern_two Intern_two','2017-10-25 16:00:32'),(227,'Account Modify','Change Password','Intern','::1','Intern_two Intern_two','2017-10-25 16:00:47'),(228,'Account Modify','Update Profile Picture','Intern','::1','Intern_two Intern_two','2017-10-25 16:05:14'),(229,'Account Modify','Update Profile Picture','Intern','::1','Intern_two Intern_two','2017-10-25 16:06:18'),(230,'Account Modify','Update Profile Picture','Intern','::1','Intern_two Intern_two','2017-10-25 16:06:24'),(231,'Account Access','Account Logout ','Intern','::1','Intern_two Intern_two','2017-10-25 16:19:23'),(232,'Account Access','Account Login ','Admin','::1','Erin Rugas','2017-10-25 16:19:32'),(233,'Account Modify','Update Profile Picture','Admin','::1','Erin Rugas','2017-10-25 16:19:41'),(234,'Account Modify','Update information','Admin','::1','Erin John Rugas','2017-10-25 16:19:47'),(235,'Account Modify','Update information of Erin John Rugas','Admin','::1','Erin John Rugas','2017-10-25 16:23:07'),(236,'Account Modify','Update information of Erin John Rugas','Admin','::1','Erin John Rugas','2017-10-25 16:23:16'),(237,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-26 02:10:37'),(238,'Add User','Added User Inten_three Inten_three','Admin','::1','Erin John Rugas','2017-10-26 04:10:25'),(239,'Add User','Added User Intern Four Four','Admin','::1','Erin John Rugas','2017-10-26 04:12:13'),(240,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-26 04:27:53'),(241,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-26 04:28:52'),(242,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-26 04:30:59'),(243,'Account Access','Account Login ','Admin','::1','Erin John Rugas','2017-10-26 04:45:50'),(244,'Add User','Added User Employee_two Employee_two','Admin','::1','Erin John Rugas','2017-10-26 04:48:14'),(245,'Account Access','Account Logout ','Admin','::1','Erin John Rugas','2017-10-26 04:50:00'),(246,'Account Access','Account Login ','Employee','::1','Employee_two Employee_two','2017-10-26 04:50:08'),(247,'Account Access','Account Logout ','Employee','::1','Employee_two Employee_two','2017-10-26 04:50:13');
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(100) NOT NULL,
  `with_sub` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Dashboard','fa fa-dashboard',1,'2017-08-21 14:10:21','2017-09-02 10:03:46','dashboard',NULL),(2,'User Management','fa fa-users',1,'2017-08-21 14:10:21','2017-09-05 17:59:01','users',NULL),(3,'Attendance','fa fa-calendar',1,'2017-08-21 14:10:21','2017-09-05 18:10:20','',1),(4,'Management Shift','fa fa-clock-o',1,'2017-08-21 14:10:21','2017-10-05 08:28:52','',1),(5,'Position Management','fa fa-sitemap',1,'2017-08-21 14:10:21','2017-09-02 10:04:25','position',NULL),(6,'Logs','fa fa-tasks',1,'2017-10-08 17:21:44','0000-00-00 00:00:00','logs',NULL),(7,'Profile','fa fa-user',1,'2017-10-11 23:11:06','0000-00-00 00:00:00','profile',NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `position`
--

DROP TABLE IF EXISTS `position`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `privileges` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `privilege_sub_menu` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'Admin','1,2,3,4,5,6,7','2017-08-22 02:02:42','2017-10-11 23:11:15','1,2,3,4,5,6,7'),(2,'Employee','1,3,7','2017-08-22 02:02:55','2017-10-25 09:14:08','2,3,4,5,6'),(3,'Human Resource','1,2,3,4,5,6,7','2017-08-22 05:02:01','2017-10-11 23:20:23','1,2,3,4,5,6,7'),(4,'Intern','1,3,7','2017-08-22 05:18:24','2017-10-11 23:19:56','3'),(11,'Manager','1,2,3,4,5,7','2017-09-01 05:40:00','2017-10-11 23:20:32',NULL),(14,'Project Head','1,3,7','2017-10-08 17:10:55','2017-10-11 23:20:02',NULL);
/*!40000 ALTER TABLE `position` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `late_status` varchar(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intern_no_hrs` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (1,5,'2017-10-26','08:00:00','17:00:00','Intern Attendance',NULL,NULL,'2017-10-25 16:14:22','8');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_overtime`
--

DROP TABLE IF EXISTS `record_overtime`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_overtime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reason` text,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `overtime_date` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `ot_hours` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_overtime`
--

LOCK TABLES `record_overtime` WRITE;
/*!40000 ALTER TABLE `record_overtime` DISABLE KEYS */;
INSERT INTO `record_overtime` VALUES (19,2,'Will Play Tomb Raider','17:30:00','20:00:00','2017-10-06','2017-10-05','3',1),(20,2,'I Need Money :\'(','17:30:00','20:00:00','2017-10-09','2017-10-05','3',1),(21,2,'Will Play Overwatch And Eat','17:30:00','21:00:00','2017-10-11','2017-10-05','4',1),(22,2,'Wala Lang','15:02:00','16:44:00','2017-10-05','2017-10-06','1',0),(23,2,'Wala Lang','03:02:00','16:44:00','2017-10-05','2017-10-06','13',2),(24,2,'Wala Lang','14:02:00','13:05:00','2017-10-05','2017-10-06','-1',1),(25,2,'','14:22:00','15:20:00','0000-00-00','2017-10-06','0',1),(26,2,'1010','10:10:00','22:10:00','2017-10-10','2017-10-08','12',2),(27,4,'tinatamad mag code','12:31:00','00:31:00','2017-12-31','2017-10-08','-12',2),(28,4,'Tatambay','14:22:00','02:09:00','2017-02-22','2017-10-09','-12',0),(29,2,'','00:00:00','00:00:00','0000-00-00','2017-10-17','0',0);
/*!40000 ALTER TABLE `record_overtime` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `school`
--

DROP TABLE IF EXISTS `school`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `school` (
  `school_id` int(11) NOT NULL AUTO_INCREMENT,
  `school_name` varchar(50) NOT NULL,
  `internship` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  PRIMARY KEY (`school_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `school`
--

LOCK TABLES `school` WRITE;
/*!40000 ALTER TABLE `school` DISABLE KEYS */;
INSERT INTO `school` VALUES (1,'UST',1,250);
/*!40000 ALTER TABLE `school` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_type` varchar(50) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift`
--

LOCK TABLES `shift` WRITE;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` VALUES (1,'Morning','08:00:00','17:00:00'),(2,'Mid','15:00:00','01:00:00'),(3,'Night','22:00:00','10:00:00');
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_menu`
--

DROP TABLE IF EXISTS `sub_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `intern` int(11) DEFAULT NULL,
  `admin_hr` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_menu`
--

LOCK TABLES `sub_menu` WRITE;
/*!40000 ALTER TABLE `sub_menu` DISABLE KEYS */;
INSERT INTO `sub_menu` VALUES (1,'Shift Type','shift',4,NULL,1),(3,'Timesheet','timesheet',3,1,1),(4,'Leaves','leaves',3,NULL,1),(5,'Calendar','calendar',3,NULL,1),(6,'Overtime','overtime',3,NULL,1),(7,'Employee Attendance','attendance/employee',3,NULL,1);
/*!40000 ALTER TABLE `sub_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(60) DEFAULT NULL,
  `employee_number` varchar(40) DEFAULT NULL,
  `reg_key` varchar(30) DEFAULT NULL,
  `verified_email` tinyint(2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `reset_status` tinyint(2) DEFAULT NULL,
  `reset_key` varchar(50) DEFAULT NULL,
  `sss_no` varchar(50) DEFAULT NULL,
  `tin_no` varchar(50) DEFAULT NULL,
  `phil_health` varchar(50) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `course` varchar(80) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `remaining` varchar(10) DEFAULT NULL,
  `no_of_hrs` varchar(10) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_details`
--

LOCK TABLES `user_details` WRITE;
/*!40000 ALTER TABLE `user_details` DISABLE KEYS */;
INSERT INTO `user_details` VALUES (1,1,'1d2377edd76ca309204ca74f078d9f37.jpg',NULL,'_VCl5SvZH9kJDhQL_',0,'2017-05-17',1,NULL,NULL,'333123','1234','12334',NULL,NULL,NULL,NULL,'','',1),(2,2,'no_image.jpg',NULL,'_AWVUhbsQLpTc4lv_',0,'2017-10-31',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1),(3,3,'no_image.jpg',NULL,'_JUluP9pCZWyxEBT_',0,'2017-10-17',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'','',1),(4,4,'fb7703f5baf397674c440fccc9ea23f4.jpg',NULL,'_6FAdL50cYWDbqyJ_',0,'2017-10-16',1,NULL,NULL,NULL,NULL,NULL,'FEU Institute Of Technology','Bsitwma','2017-01-10','2017-2018','520','520',1),(5,5,'ed78cce5aaf95093a23b207cb4b1db17.jpg',NULL,'_lkBfUXiKERC73qS_',0,'2017-10-31',1,NULL,NULL,NULL,NULL,NULL,'UST','Computer Science','2017-01-02','2017-2018','242','250',1),(6,6,'no_image.jpg',NULL,'_g4AG7F3oT6rnpzb_',0,'2017-10-17',1,1,'_R3ApqIseHnB2d4y_','','','','UE','BSITWMA',NULL,'2017-2018','500','500',0),(7,7,'no_image.jpg',NULL,'_Pl2tROhQq4df0VT_',0,'2017-10-17',1,0,'_nQHZxgX7Ky4JPN9_','','','','Ateneo','BSIT',NULL,'2015-2017','300','300',0),(8,8,'no_image.jpg',NULL,'_1wBoEi7Rud5fHL6_',1,'2017-10-04',1,NULL,NULL,'1123','123123','12313','','',NULL,'','','',1);
/*!40000 ALTER TABLE `user_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `profile_picture` varchar(60) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `employee_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Erin John','Rugas','','ejr012495@gmail.com','$2y$11$J/VIhgxJaiJFHPtYX19Axuf7ZJe2He/PMVHDdL8BAvV9TTrrNLABe','no_image.jpg',1,NULL,'2017-10-25 10:49:59','2017-10-25 16:19:47'),(2,'Employee','Employee','','employee@gmail.com','$2y$11$W9ytI2Cog2.qaCZnAAF4dutdBnXy9gYtrsBZJGeL6UkeahU9z/rQm',NULL,2,NULL,'2017-10-25 13:55:18','2017-10-25 13:56:57'),(3,'Human','Resource','','hr@gmail.com','$2y$11$gUvP9IoXX22C99h4HXz9PeebOMwASeKR0UHp4BLsNXDWQ5/zqUy8.',NULL,3,NULL,'2017-10-25 13:55:47','2017-10-25 13:57:03'),(4,'Intern','Intern','','intern@gmail.com','$2y$11$RFVwEQlAWgVmb1MqLmGxluINOSTHY8BHB6xe06EGYVBAzx/vdiGXa','a49c8de68311671f9a072cd9457a6e20.jpg',4,NULL,'2017-10-25 13:56:48','2017-10-25 15:49:11'),(5,'Intern_two','Intern_two','','intern_two@gmail.com','$2y$11$m9TI1B4Rync.H6qQml8UyOF.QcNZRDNUziyh7cfl.fZXT6lrRuFg.','c56257e8f9d6a2fee61955980d7f7601.jpg',4,NULL,'2017-10-25 14:01:38','2017-10-25 16:05:14'),(6,'Inten_three','Inten_three','Inten_three','inten_three@gmail.com','$2y$11$CUv8UbLOl2C04q7gMmmQU.Zc2sb.67qB3WhcCx5sGUDqGonRFoiTq',NULL,4,NULL,'2017-10-26 04:10:25','2017-10-26 04:30:41'),(7,'Intern Four','Four','','intern_four@gmail.com','$2y$11$pwV7rthCbyy8HWdbw7H3d.jYXHl/UzysyuBMRYU0AitEJy4FINQI2',NULL,4,NULL,'2017-10-26 04:12:13','2017-10-26 04:47:30'),(8,'Employee_two','Employee_two','Employee_two','employee_two@gmail.com','$2y$11$JQyeJqTAlToIm3OioJ6jtOjChJrjgEzXnidjOV2jK/VN73hcZOtG2',NULL,2,NULL,'2017-10-26 04:48:14','2017-10-26 04:49:21');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 12:51:14
