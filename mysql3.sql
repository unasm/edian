-- MySQL dump 10.13  Distrib 5.5.30, for Linux (i686)
--
-- Host: localhost    Database: edian
-- ------------------------------------------------------
-- Server version	5.5.30

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
-- Table structure for table `art`
--

DROP TABLE IF EXISTS `art`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `art` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `content` text NOT NULL,
  `part_id` int(3) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `author_id` int(11) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `visitor_num` smallint(5) unsigned DEFAULT NULL,
  `comment_num` smallint(5) unsigned DEFAULT NULL,
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`title`),
  KEY `user_id` (`author_id`),
  KEY `value` (`value`),
  KEY `author_id` (`author_id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (31,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(32,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(33,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(34,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(35,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(36,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(37,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(38,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(39,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221,NULL,NULL),(40,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:22',1,1353325221,NULL,NULL),(41,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340,NULL,NULL),(42,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340,NULL,NULL),(43,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340,NULL,NULL),(44,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340,NULL,NULL),(45,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(46,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(47,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(48,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(49,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(50,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(51,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(52,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(53,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(54,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340,NULL,NULL),(55,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-12-04 01:17:03',3,1353325340,NULL,NULL);
/*!40000 ALTER TABLE `art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment` text,
  `reg_time` datetime DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=115 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('testing','2012-12-09 11:31:10',NULL,1),('sdf[face:15]','2012-12-09 13:03:39',1,2),('asdfasdf[face:55]','2012-12-09 13:04:59',4294967295,3),('asd[face:30]','2012-12-09 13:06:35',0,4),('asdfasdf[face:30]','2012-12-09 13:07:19',0,5),('asdfasdf[face:30]','2012-12-09 13:11:53',4,6),('[face:41]','2012-12-09 13:12:01',4,7),('[face:29]','2013-03-11 08:52:04',4,8),('[face:15]','2013-03-11 08:52:09',4,9),('[face:41]','2013-03-11 08:52:13',4,10),('','2013-03-13 15:10:51',4,11),('','2013-03-13 15:16:32',4,12),('','2013-03-13 15:16:34',4,13),('','2013-03-13 15:16:34',4,14),('','2013-03-13 15:16:34',4,15),('','2013-03-13 15:16:34',4,16),('','2013-03-13 15:16:35',4,17),('','2013-03-13 15:16:35',4,18),('','2013-03-13 15:16:35',4,19),('','2013-03-13 15:16:35',4,20),('','2013-03-13 15:16:35',4,21),('','2013-03-13 15:16:36',4,22),('','2013-03-13 15:16:36',4,23),('','2013-03-13 15:16:36',4,24),('','2013-03-13 15:16:36',4,25),('','2013-03-13 15:16:37',4,26),('','2013-03-13 15:16:38',4,27),('','2013-03-13 15:16:38',4,28),('','2013-03-13 15:16:38',4,29),('','2013-03-13 15:16:55',4,30),('','2013-03-13 15:16:56',4,31),('','2013-03-13 15:16:56',4,32),('','2013-03-13 15:16:56',4,33),('','2013-03-13 15:16:56',4,34),('','2013-03-13 15:18:08',4,35),('','2013-03-13 15:18:12',4,36),('','2013-03-13 15:18:13',4,37),('','2013-03-13 15:18:13',4,38),('','2013-03-13 15:18:13',4,39),('','2013-03-13 15:18:13',4,40),('','2013-03-13 15:18:14',4,41),('','2013-03-13 15:18:16',4,42),('','2013-03-13 15:18:17',4,43),('','2013-03-13 15:21:04',4,44),('','2013-03-13 15:21:04',4,45),('','2013-03-13 15:21:05',4,46),('','2013-03-13 15:21:05',4,47),('','2013-03-13 15:21:05',4,48),('','2013-03-13 15:26:27',4,49),('','2013-03-13 15:26:27',4,50),('','2013-03-13 15:26:28',4,51),('','2013-03-13 15:26:28',4,52),('','2013-03-13 15:26:28',4,53),('','2013-03-13 15:26:28',4,54),('','2013-03-13 15:26:28',4,55),('','2013-03-13 15:26:28',4,56),('','2013-03-13 15:26:29',4,57),('','2013-03-13 15:26:29',4,58),('','2013-03-13 15:29:39',4,59),('','2013-03-13 15:29:40',4,60),('','2013-03-13 15:29:40',4,61),('','2013-03-13 15:29:40',4,62),('','2013-03-13 15:29:40',4,63),('','2013-03-13 15:29:41',4,64),('','2013-03-13 15:29:41',4,65),('','2013-03-13 15:29:41',4,66),('','2013-03-13 15:29:41',4,67),('','2013-03-13 15:29:41',4,68),('','2013-03-13 15:29:42',4,69),('','2013-03-13 15:29:42',4,70),('','2013-03-13 15:29:47',4,71),('','2013-03-13 15:29:47',4,72),('','2013-03-13 15:29:47',4,73),('','2013-03-13 15:29:47',4,74),('','2013-03-13 18:38:41',4,75),('','2013-03-13 18:38:43',4,76),('','2013-03-13 18:38:44',4,77),('','2013-03-13 18:38:44',4,78),('','2013-03-13 18:38:44',4,79),('','2013-03-13 18:38:44',4,80),('','2013-03-13 18:38:45',4,81),('','2013-03-13 18:38:45',4,82),('','2013-03-13 18:41:44',4,83),('','2013-03-13 18:41:45',4,84),('','2013-03-13 18:41:46',4,85),('','2013-03-13 18:41:46',4,86),('','2013-03-13 18:41:46',4,87),('','2013-03-13 18:41:47',4,88),('','2013-03-13 18:41:55',4,89),('','2013-03-13 18:41:55',4,90),('','2013-03-13 18:41:55',4,91),('','2013-03-13 18:41:56',4,92),('','2013-03-13 18:41:56',4,93),('','2013-03-13 18:41:56',4,94),('','2013-03-13 18:41:56',4,95),('','2013-03-13 18:41:56',4,96),('','2013-03-13 18:41:57',4,97),('','2013-03-13 18:41:57',4,98),('','2013-03-13 18:41:57',4,99),('','2013-03-13 18:41:58',4,100),('','2013-03-13 18:41:58',4,101),('','2013-03-13 18:46:48',4,102),('','2013-03-13 18:46:49',4,103),('','2013-03-13 18:46:49',4,104),('','2013-03-13 18:46:49',4,105),('','2013-03-13 18:47:47',4,106),('','2013-03-13 18:47:48',4,107),('','2013-03-13 18:47:48',4,108),('','2013-03-13 18:47:48',4,109),('','2013-03-13 18:47:56',4,110),('','2013-03-13 18:47:56',4,111),('','2013-03-13 18:47:57',4,112),('','2013-03-13 18:47:57',4,113),('','2013-03-13 18:47:57',4,114);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `img`
--

DROP TABLE IF EXISTS `img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `img_name` char(30) DEFAULT NULL,
  `upload_name` varchar(50) DEFAULT NULL,
  `upload_time` datetime DEFAULT NULL,
  PRIMARY KEY (`img_id`),
  KEY `user_id` (`user_id`),
  KEY `img_name` (`img_name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (1,1,'13632450461.jpg','8.jpg','2013-03-14 15:10:46'),(2,1,'1363246302.jpg','12530057.jpg','2013-03-14 15:31:43'),(3,1,'1363246384.jpg','47288aced5ee19e1075e2126b8a471e1.jpg','2013-03-14 15:33:04'),(4,1,'1363246478.jpg','111117of8mtnnro6zyf84a.jpg','2013-03-14 15:34:38'),(5,1,'1363246587.jpg','12530112.jpg','2013-03-14 15:36:28'),(6,1,'1363246735.jpg','12530143(1).jpg','2013-03-14 15:38:56'),(7,1,'1363246797.jpg','12530143(2).jpg','2013-03-14 15:39:57'),(8,1,'1363246845.jpg','14140010.jpg','2013-03-14 15:40:46'),(9,1,'1363246955.jpg','12530182.jpg','2013-03-14 15:42:35'),(10,1,'1363247049.jpg','12530224.jpg','2013-03-14 15:44:09'),(11,1,'1363247067.jpg','321814138302674410224fa2101ddf28.jpg','2013-03-14 15:44:27');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interest`
--

DROP TABLE IF EXISTS `interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interest` (
  `user_id` int(11) NOT NULL,
  `keyword` char(40) DEFAULT NULL,
  `keyValue` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interest`
--

LOCK TABLES `interest` WRITE;
/*!40000 ALTER TABLE `interest` DISABLE KEYS */;
/*!40000 ALTER TABLE `interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `senderId` int(10) unsigned DEFAULT NULL,
  `geterId` int(10) unsigned DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `body` text,
  `time` datetime DEFAULT NULL,
  `read_already` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `messageId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`messageId`),
  KEY `geterId` (`geterId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `online_user`
--

DROP TABLE IF EXISTS `online_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `online_user` (
  `session_id` varchar(35) NOT NULL DEFAULT '0',
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_name` char(40) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `passwd` char(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`session_id`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `online_user`
--

LOCK TABLES `online_user` WRITE;
/*!40000 ALTER TABLE `online_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `online_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` char(40) DEFAULT NULL,
  `user_passwd` char(50) DEFAULT NULL,
  `user_type` int(3) NOT NULL DEFAULT '0',
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_photo` char(50) NOT NULL DEFAULT 'edianlogo.jpg',
  `block` tinyint(4) DEFAULT NULL,
  `user_level` tinyint(4) DEFAULT NULL,
  `last_login_time` date DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_photo` (`user_photo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tianyi','tianyi',1,'2013-03-11 00:36:14','edianlogo.jpg',0,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-03-16  1:20:00
