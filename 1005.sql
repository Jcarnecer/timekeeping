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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,NULL,1234,NULL,NULL,2),(2,NULL,NULL,NULL,NULL,4),(3,NULL,NULL,NULL,NULL,10);
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
INSERT INTO `intern` VALUES (1,3,'UST',250,'BSITWMA','2017-05-06','2017-2018','250'),(2,5,NULL,0,NULL,NULL,NULL,NULL),(3,6,'123213',0,'Bsit','0000-00-00','asd',NULL),(6,9,NULL,520,NULL,NULL,NULL,'520');
/*!40000 ALTER TABLE `intern` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Dashboard','fa fa-dashboard',1,'2017-08-21 14:10:21','2017-09-02 10:03:46','dashboard',NULL),(2,'User Management','fa fa-users',1,'2017-08-21 14:10:21','2017-09-05 17:59:01','users',NULL),(3,'Attendance','fa fa-calendar',1,'2017-08-21 14:10:21','2017-09-05 18:10:20','',1),(4,'Management Shift','fa fa-clock-o',1,'2017-08-21 14:10:21','2017-10-05 08:28:52','',1),(5,'Position Management','fa fa-sitemap',1,'2017-08-21 14:10:21','2017-09-02 10:04:25','position',NULL);
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `position`
--

LOCK TABLES `position` WRITE;
/*!40000 ALTER TABLE `position` DISABLE KEYS */;
INSERT INTO `position` VALUES (1,'Admin','1,2,3,4,5','2017-08-22 02:02:42','2017-08-22 03:15:22'),(2,'Employee','1,3','2017-08-22 02:02:55','2017-09-01 05:39:44'),(3,'Human Resource','1,2,3,4,5','2017-08-22 05:02:01','2017-10-01 06:23:03'),(4,'Intern','1,3','2017-08-22 05:18:24','0000-00-00 00:00:00'),(11,'Manager','1,2,3,4,5','2017-09-01 05:40:00','0000-00-00 00:00:00');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
INSERT INTO `record` VALUES (151,1,'2017-10-03','11:15:46','19:15:46','8 hours',NULL,NULL,'2017-10-03 03:15:46'),(152,1,'2017-10-03','11:15:47','19:15:47','Work From Home',NULL,NULL,'2017-10-03 03:15:47'),(153,1,'2017-10-03',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-03 03:15:47'),(154,1,'2017-10-03',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-03 03:15:55'),(155,1,'2017-10-03','11:15:57','15:15:57','4 hours',NULL,NULL,'2017-10-03 03:15:57'),(156,1,'2017-10-03','13:29:53','17:29:53','4 hours',NULL,NULL,'2017-10-03 05:29:53'),(157,1,'2017-10-03','13:59:12','21:59:12','8 hours',NULL,NULL,'2017-10-03 05:59:12'),(158,1,'2017-10-04','10:06:00','14:06:00','4 hours',NULL,NULL,'2017-10-04 02:06:00'),(159,1,'2017-10-04','10:06:00','18:06:00','8 hours',NULL,NULL,'2017-10-04 02:06:00'),(160,1,'2017-10-04','10:06:01','18:06:01','8 hours',NULL,NULL,'2017-10-04 02:06:01'),(161,2,'2017-10-04','10:22:11','18:22:11','8 hours',NULL,NULL,'2017-10-04 02:22:11'),(162,2,'2017-10-04','10:22:11','18:22:11','8 hours',NULL,NULL,'2017-10-04 02:22:11'),(163,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 02:35:46'),(164,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:04:44'),(165,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:04:45'),(166,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:04:51'),(167,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:04:52'),(168,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:42:54'),(169,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:42:55'),(170,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:42:55'),(171,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:44:06'),(172,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:44:11'),(173,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:44:12'),(174,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:44:14'),(175,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:44:21'),(176,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:44:54'),(177,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:44:56'),(178,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:50:25'),(179,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:50:28'),(180,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:52:27'),(181,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:52:55'),(182,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:52:58'),(183,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:52:59'),(184,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:53:06'),(185,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:53:08'),(186,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:54:04'),(187,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:54:07'),(188,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:54:30'),(189,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:55:46'),(190,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:55:48'),(191,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:55:50'),(192,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:55:51'),(193,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 03:56:00'),(194,1,'2017-10-04','11:56:02','15:56:02','4 hours',NULL,NULL,'2017-10-04 03:56:02'),(195,1,'2017-10-04','11:56:02','19:56:02','8 hours',NULL,NULL,'2017-10-04 03:56:02'),(196,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 03:57:43'),(197,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 04:01:30'),(198,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 04:01:32'),(199,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 04:02:24'),(200,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 04:02:26'),(201,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 04:02:29'),(202,1,'2017-10-04',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-04 04:03:28'),(203,1,'2017-10-04',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-04 04:03:30'),(204,1,'2017-10-04','14:34:47','18:34:47','4 hours',NULL,NULL,'2017-10-04 06:34:47'),(205,1,'2017-10-04','15:13:16','19:13:16','4 hours',NULL,NULL,'2017-10-04 07:13:16'),(206,1,'2017-10-04','15:13:23','23:13:23','8 hours',NULL,NULL,'2017-10-04 07:13:23'),(207,1,'2017-10-04','15:13:34','23:13:34','Work From Home',NULL,NULL,'2017-10-04 07:13:34'),(208,1,'2017-10-04','15:13:47','23:13:47','Work From Home',NULL,NULL,'2017-10-04 07:13:47'),(209,1,'2017-10-04','15:16:10','19:16:10','4 hours',NULL,NULL,'2017-10-04 07:16:10'),(210,1,'2017-10-04','15:17:00','19:17:00','4 hours',NULL,NULL,'2017-10-04 07:17:00'),(211,1,'2017-10-04','15:19:36','23:19:36','Work From Home',NULL,NULL,'2017-10-04 07:19:36'),(212,1,'2017-10-04','15:20:48','19:20:48','4 hours',NULL,NULL,'2017-10-04 07:20:48'),(213,1,'2017-10-04','15:21:26','23:21:26','8 hours',NULL,NULL,'2017-10-04 07:21:26'),(214,1,'2017-10-04','15:21:58','19:21:58','4 hours',NULL,NULL,'2017-10-04 07:21:58'),(215,1,'2017-10-04','15:22:03','19:22:03','4 hours',NULL,NULL,'2017-10-04 07:22:03'),(216,1,'2017-10-04','15:23:22','23:23:22','8 hours',NULL,NULL,'2017-10-04 07:23:22'),(217,1,'2017-10-04','15:23:30','23:23:30','8 hours',NULL,NULL,'2017-10-04 07:23:30'),(218,1,'2017-10-04','15:23:37','23:23:37','Work From Home',NULL,NULL,'2017-10-04 07:23:37'),(219,2,'2017-10-05',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-05 09:04:37'),(220,2,'2017-10-05','17:04:38','01:04:38','Work From Home',NULL,NULL,'2017-10-05 09:04:38'),(221,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:04:52'),(222,2,'2017-10-05',NULL,NULL,'Vacation Leave',NULL,NULL,'2017-10-05 09:04:53'),(223,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:07:01'),(224,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:07:02'),(225,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:07:03'),(226,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:07:03'),(227,2,'2017-10-05',NULL,NULL,'Sick Leave',NULL,NULL,'2017-10-05 09:07:03'),(228,2,'2017-10-05','17:09:03','01:09:03','Work From Home',NULL,NULL,'2017-10-05 09:09:03'),(229,2,'2017-10-05','17:12:00','21:12:00','4 hours',NULL,NULL,'2017-10-05 09:12:00'),(230,2,'2017-10-05','17:12:00','01:12:00','8 hours',NULL,NULL,'2017-10-05 09:12:00');
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
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
INSERT INTO `shift` VALUES (1,'Morning','08:00:00','17:00:00'),(2,'Mid','15:00:00','01:00:00'),(3,'Night','22:00:00','09:00:00');
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
INSERT INTO `sub_menu` VALUES (1,'Shift Type','shift',4,NULL,1),(2,'Shift Requests','requests',4,NULL,1),(3,'Timesheet','attendance',3,NULL,1),(4,'Leaves','leaves',3,1,1),(5,'Calendar','calendar',3,NULL,1),(6,'Overtime','overtime',3,1,1),(7,'Employee Attendance','attendance/employee',3,NULL,1);
/*!40000 ALTER TABLE `sub_menu` ENABLE KEYS */;
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
  `status` tinyint(5) NOT NULL,
  `reg_key` varchar(30) DEFAULT NULL,
  `verified_email` tinyint(2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `start_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Erin','Rugas','','ejr012495@gmail.com','$2y$11$Kt4z2p0tCAHgSarRHqEWXu7rmWOh46xpH9ygp2nK8pdEWMYwmTbsS','no_image.jpg',1,NULL,1,'_Wix4k7mYT2_',0,'2017-09-03 12:21:05','2017-09-03 12:21:49',NULL),(2,'Employee','Employee','','employee@mail.com','$2y$11$NVZNbD4tTOk4Cs6Go.trMe8ffOTt4CHlTHEPWCeOYctetMvwJXkea','6b48c0b21b979322e0cabb9bc38a081d.jpg',2,NULL,1,'_RIO8Qx0hwU_',0,'2017-09-03 12:22:39','2017-09-03 16:33:05',NULL),(3,'Intern','Intern','','intern@mail.com','$2y$11$W1brU2Inx.5nLAOr4khcweCh/3pttEI3hSICpuojIF1h6Cy7Y8PtG','c86f2b763e9443c28255ccb39e858917.jpeg',4,NULL,1,'_v98lGqSxng_',0,'2017-09-03 12:24:12','2017-09-03 16:43:33',NULL),(4,'Farrah','Dionisio','Delos Santos','farrahdee24@gmail.com','$2y$11$jHbG/TqK4wAmWqr5Jbt44O9YJSgwAp665LdXIXteNPF70h.4lcTYK','no_image.jpg',2,NULL,1,'_5VXDxiSqOt_',0,'2017-09-04 22:02:49','2017-09-07 18:59:31',NULL),(5,'Armani','Armani','Armni','armani@gmail.com','$2y$11$BwzWE7VlZw5owYOsuChDWOOx6MEvb7jtgOkoxpsnXPll8ioaxIEDG','no_image.jpg',4,NULL,0,'_j4rQ28lxve_',0,'2017-09-09 20:14:55','0000-00-00 00:00:00',NULL),(6,'Armani','Armani','Armani','hello@gmail.com','$2y$11$zc4e021z8S2zqYyhk8/ULOLKi3HYJuvOw7djrym5f60b.9nJX2wV2','no_image.jpg',4,NULL,0,'_5WvapwPS4R_',0,'2017-09-09 20:19:28','2017-09-30 07:12:14',NULL),(9,'Sample Intern','V','Sample Intern','sampleintern@gmail.com','$2y$11$fkflfPDKA.N2zD6JjXqdw.G8uDuuIQR7I9Xi2KZo6wUCI412iLWli','no_image.jpg',4,NULL,1,'_HLN0gYjnrW_',0,'2017-09-30 11:29:51','2017-09-30 11:49:22','2017-12-04'),(10,'Hr','Hr','Hr','hr@gmail.com','$2y$11$iLQonyOCGXiH.uh7OBWSG.KBvQw7OjPFzNxKzJ1fav3IPshR/5OTC','no_image.jpg',3,NULL,1,'_3uTyzZkDUd_',0,'2017-10-01 06:22:09','2017-10-01 06:22:23','2017-10-10'),(24,'Adsad','Asdasd','Asdsad','asdsd@gmail.com','$2y$11$aKbxECT2CYkCInSXRzfcjebSEXjMr0Rwkj5QllcWghSU5ywlkGpcW','no_image.jpg',1,NULL,0,'_iM6wJuegRt_',0,'2017-10-03 00:45:02','0000-00-00 00:00:00','0000-00-00'),(26,'Paypal','Paypal','Paypal','paypal.emailverify@gmail.com','$2y$11$/9fg8nqkc7edzLNINvriE.0Ysq1JPmx1s7sROBasmtOE6WYXrl4kO','no_image.jpg',1,NULL,0,'_B1JvbtIyWZ_',0,'2017-10-03 00:48:38','0000-00-00 00:00:00','0000-00-00');
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

-- Dump completed on 2017-10-05 18:45:37
