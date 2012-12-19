-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: edian
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.04.2

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
  `art_title` varchar(150) DEFAULT NULL,
  `art_text` text,
  `part_id` int(3) DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(11) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`art_title`),
  KEY `user_id` (`user_id`),
  KEY `value` (`value`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (31,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(32,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(33,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(34,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(35,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(36,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(37,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(38,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(39,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:21',1,1353325221),(40,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 11:40:22',1,1353325221),(41,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340),(42,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340),(43,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340),(44,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:20',1,1353325340),(45,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(46,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(47,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(48,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(49,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(50,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(51,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(52,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(53,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(54,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 11:42:21',1,1353325340),(55,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-12-04 01:17:03',3,1353325340);
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('testing','2012-12-09 11:31:10',NULL,1),('sdf[face:15]','2012-12-09 13:03:39',1,2),('asdfasdf[face:55]','2012-12-09 13:04:59',4294967295,3),('asd[face:30]','2012-12-09 13:06:35',0,4),('asdfasdf[face:30]','2012-12-09 13:07:19',0,5),('asdfasdf[face:30]','2012-12-09 13:11:53',4,6),('[face:41]','2012-12-09 13:12:01',4,7);
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
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
/*这个是用户帖子的函数*/
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
INSERT INTO `user` VALUES (1,'tianyi','tianyi',1,'2012-11-20 06:24:00','edianlogo.jpg');
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

-- Dump completed on 2012-12-09 13:20:35
