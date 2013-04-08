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
  `time` datetime DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `value` int(11) NOT NULL DEFAULT '0',
  `visitor_num` smallint(5) unsigned NOT NULL DEFAULT '0',
  `comment_num` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`title`),
  KEY `user_id` (`author_id`),
  KEY `value` (`value`),
  KEY `author_id` (`author_id`),
  KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (31,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(32,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(33,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(34,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(35,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(36,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(37,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(38,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(39,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0),(40,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:22',1,1353325221,0,0),(41,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0),(42,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0),(43,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0),(44,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0),(45,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(46,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(47,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(48,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(49,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(50,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(51,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(52,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(53,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(54,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0),(55,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-12-04 09:17:03',3,1353325340,0,0),(56,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,'2013-03-28 18:19:46',1,123,0,0),(57,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364466174,0,0),(58,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364467031,0,0),(59,'妖精的尾巴的精彩图片','<p><img src=\"http://www.edian.cn/./upload//month_1303/201303281849292680.png\" alt=\"\" /></p><p>可以看到图片，就是对的，不然就是除了差错，这个是关于上传图片的测试</p>',1,NULL,1,1364467814,0,0);
/*!40000 ALTER TABLE `art` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` char(40) NOT NULL DEFAULT '0',
  `ip_address` char(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('cbe2c9868f7be8f0b3167ad21f256ffc','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.11 (KHTML, like Gecko) Chrome/23.0.1271.95 Safari/537.11',1364980787,'a:4:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:1:\"1\";s:9:\"user_name\";s:6:\"tianyi\";s:6:\"passwd\";s:6:\"tianyi\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `comment` text,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) unsigned DEFAULT NULL,
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `art_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `art_id` (`art_id`)
) ENGINE=MyISAM AUTO_INCREMENT=160 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('testing','2012-12-09 03:31:10',NULL,1,0),('sdf[face:15]','2012-12-09 05:03:39',1,2,0),('asdfasdf[face:55]','2012-12-09 05:04:59',4294967295,3,0),('asdfasdf[face:30]','2012-12-09 05:11:53',4,6,0),('[face:41]','2012-12-09 05:12:01',4,7,0),('[face:29]','2013-03-11 00:52:04',4,8,0),('[face:15]','2013-03-11 00:52:09',4,9,0),('[face:41]','2013-03-11 00:52:13',4,10,0),('[face:11]','2013-04-02 12:03:56',1,159,35),('第五次测试[face:11]','2013-03-27 14:02:47',1,158,35),('asdfasd[face:11]','2013-03-27 13:51:29',1,157,35),('asdfas啊份额的','2013-03-27 12:59:25',1,156,35),('','2013-03-27 12:30:32',1,155,35),('','2013-03-27 12:29:53',1,154,35),('asdfas啊份额的','2013-03-27 12:29:29',1,153,35),('','2013-03-27 12:26:51',1,152,35),('','2013-03-27 12:26:42',1,151,35),('','2013-03-27 12:13:53',1,150,35),('','2013-03-27 12:13:32',1,149,35),('','2013-03-27 12:13:29',1,148,35),('你也太搞笑了','2013-03-16 12:31:12',1,115,2),('你也太搞笑了','2013-03-16 12:47:34',1,116,31),('阿斯的发送的','2013-03-17 16:13:24',1,145,32),('sdfsdf[face:15]特斯能够','2013-03-17 16:13:02',1,144,32),('','2013-03-27 11:17:34',0,147,4),('sdfasdf[face:15]','2013-03-17 17:47:06',1,146,32);
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
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_already` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `messageId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `replyTo` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`messageId`),
  KEY `geterId` (`geterId`),
  KEY `senderId` (`senderId`),
  KEY `re` (`replyTo`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,1,'测试内容','testing','2013-03-31 07:01:23',0,1,0),(1,1,'测试内容','testing','0000-00-00 00:00:00',0,2,0),(1,0,'we are in love','we are in love							','2013-04-02 06:13:37',0,3,0),(1,0,'never foget our faith','never foget our faith							','2013-04-02 12:25:28',0,5,0),(1,2,'never foget our faith','never foget our faith<br />','2013-04-02 12:51:48',0,6,0),(2,1,'你好，我们好久没有见面了，想我了吗','其实开玩笑的','2013-04-03 09:21:56',0,7,0);
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
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `user_id` (`user_id`)
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
  `user_type` tinyint(4) NOT NULL DEFAULT '2',
  `reg_time` date DEFAULT NULL,
  `user_photo` char(50) NOT NULL DEFAULT 'edianlogo.jpg',
  `block` tinyint(4) DEFAULT NULL,
  `last_login_time` date DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `addr` varchar(200) DEFAULT NULL,
  `intro` text,
  `contract1` char(15) DEFAULT NULL,
  `contract2` char(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_photo` (`user_photo`),
  KEY `contra` (`contract1`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tianyi','tianyi',1,'2013-03-11','edianlogo.jpg',0,NULL,NULL,NULL,NULL,NULL,NULL),(2,'老大','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','我可是相当厉害的人哦','13648044299','未填写'),(3,'123','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','未填写','13648044299','未填写');
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

-- Dump completed on 2013-04-03 17:24:29
