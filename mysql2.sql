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
  `new` tinyint(4) NOT NULL DEFAULT '0',
  `commer` int(10) unsigned NOT NULL DEFAULT '0',
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
INSERT INTO `art` VALUES (31,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,1,0,0,1),(32,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,1,0,0,1),(33,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1),(34,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1),(35,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,2,0,0,1),(36,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,1,0,0,1),(37,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1),(38,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,3,0,0,1),(39,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,3,0,0,1),(40,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:22',1,1353325221,19,0,0,1),(41,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1),(42,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1),(43,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1),(44,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1),(45,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(46,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(47,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(48,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(49,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(50,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(51,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(52,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(53,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,1,0,0,1),(54,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1),(55,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-12-04 09:17:03',3,1353325340,1,0,0,1),(56,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,'2013-03-28 18:19:46',1,123,2,0,0,1),(57,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364466174,1,1,1,1),(58,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364467031,2,0,0,1),(59,'妖精的尾巴的精彩图片','<p><img src=\"http://www.edian.cn/./upload//month_1303/201303281849292680.png\" alt=\"\" /></p><p>可以看到图片，就是对的，不然就是除了差错，这个是关于上传图片的测试</p>',1,NULL,1,1364467814,2,1,0,2);
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
INSERT INTO `ci_sessions` VALUES ('44346ae1ebe67fca20c1626ba13883ad','127.0.0.1','Mozilla/5.0 (compatible; MSIE 9.0; Windows NT 6.1; Trident/5.0)',1366360630,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=172 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('testing','2012-12-09 03:31:10',NULL,1,0),('sdf[face:15]','2012-12-09 05:03:39',1,2,0),('asdfasdf[face:55]','2012-12-09 05:04:59',4294967295,3,0),('asdfasdf[face:30]','2012-12-09 05:11:53',4,6,0),('[face:41]','2012-12-09 05:12:01',4,7,0),('[face:29]','2013-03-11 00:52:04',4,8,0),('[face:15]','2013-03-11 00:52:09',4,9,0),('[face:41]','2013-03-11 00:52:13',4,10,0),('我其实是来打酱油的','2013-04-07 13:12:19',1,169,40),('              呵呵，笑而不语','2013-04-06 12:55:55',1,168,38),('错了，是my glod','2013-04-06 12:54:34',1,167,38),('大家好，沙发是我的了，哈哈哈','2013-04-06 11:34:08',1,161,38),('oh my gold......','2013-04-06 12:53:55',1,166,38),('[face:11]','2013-04-02 12:03:56',1,159,35),('第五次测试[face:11]','2013-03-27 14:02:47',1,158,35),('asdfasd[face:11]','2013-03-27 13:51:29',1,157,35),('asdfas啊份额的','2013-03-27 12:59:25',1,156,35),('楼上的，小声点','2013-04-06 12:36:26',1,165,38),('asdfas啊份额的','2013-03-27 12:29:29',1,153,35),('asdfs 我们都有一个共同的世界哦','2013-04-06 12:35:45',1,164,38),('2013-4-6 20:27:32 ,这个时间发生了什么事情呢','2013-04-06 12:34:24',1,163,38),('你也太搞笑了','2013-03-16 12:31:12',1,115,2),('你也太搞笑了','2013-03-16 12:47:34',1,116,31),('阿斯的发送的','2013-03-17 16:13:24',1,145,32),('sdfsdf[face:15]特斯能够','2013-03-17 16:13:02',1,144,32),('asdfasdf','2013-04-06 11:40:19',1,162,38),('sdfasdf[face:15]','2013-03-17 17:47:06',1,146,32),('不知道为什么，总是觉得，像一个笑话，呵呵','2013-04-08 13:04:33',1,170,57),('','2013-04-10 08:09:53',0,171,4);
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
  `intro` text,
  PRIMARY KEY (`img_id`),
  KEY `user_id` (`user_id`),
  KEY `img_name` (`img_name`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (48,1,'11365771647.jpg','5.png','2013-04-12 21:00:48',''),(49,1,'11365771657.jpg','1.png','2013-04-12 21:00:57',''),(50,1,'11365771805.jpg','2.png','2013-04-12 21:03:25',''),(51,1,'11365771811.jpg','3.png','2013-04-12 21:03:31',''),(52,1,'11365771817.jpg','4.png','2013-04-12 21:03:37',''),(53,1,'11365771830.jpg','6.png','2013-04-12 21:03:51',''),(54,1,'11365771836.jpg','7.png','2013-04-12 21:03:57',''),(55,1,'11365771842.jpg','8.png','2013-04-12 21:04:02',''),(56,1,'11365771855.jpg','9.png','2013-04-12 21:04:15',''),(57,1,'11365771861.jpg','10.png','2013-04-12 21:04:22',''),(58,1,'11365771882.jpg','11.png','2013-04-12 21:04:43',''),(59,1,'11365771889.jpg','12.png','2013-04-12 21:04:49',''),(60,1,'11366117523.jpg','010_20112.png','2013-04-16 21:05:23','这个是千手柱间回忆他和斑的过去恩怨情愁的图片');
/*!40000 ALTER TABLE `img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imgComment`
--

DROP TABLE IF EXISTS `imgComment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imgComment` (
  `comId` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `comment` text,
  `imgId` int(10) unsigned DEFAULT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`comId`),
  KEY `imgId` (`imgId`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imgComment`
--

LOCK TABLES `imgComment` WRITE;
/*!40000 ALTER TABLE `imgComment` DISABLE KEYS */;
INSERT INTO `imgComment` VALUES (1,'2013-04-16 02:15:53','其实现在还只是测试阶段',59,1),(5,'2013-04-16 13:24:01','我们都有一个家',48,1),(3,'2013-04-16 13:06:41','aergaqer',48,1),(4,'2013-04-16 13:08:06','啦啦啦啦啦，我是快乐的小红花',48,1),(12,'2013-04-16 17:01:19','这个是第二发了吧',49,1),(8,'2013-04-16 13:30:02','测试中，请稍后',48,1),(9,'2013-04-16 13:38:40','asdfa，测试中',48,1),(10,'2013-04-16 13:38:52','接着测试吧',53,1),(11,'2013-04-16 16:37:47','我们的美好家园',48,1),(13,'2013-04-17 14:34:13','扉间大人霸气威武！！！',60,1),(14,'2013-04-17 14:56:28','黑我二代者，随远必诛[face:47]',60,1),(15,'2013-04-17 15:11:11','楼上算是扉粉吗？[face:41]',60,1),(16,'2013-04-17 15:11:50','[face:30][face:30][face:30]',60,1);
/*!40000 ALTER TABLE `imgComment` ENABLE KEYS */;
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
INSERT INTO `message` VALUES (1,1,'测试内容','testing','2013-03-31 07:01:23',0,1,0),(1,1,'测试内容','testing','0000-00-00 00:00:00',0,2,0),(1,2,'never foget our faith','never foget our faith<br />','2013-04-02 12:51:48',0,6,0),(2,1,'你好，我们好久没有见面了，想我了吗','其实开玩笑的','2013-04-03 09:21:56',0,7,0);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tianyi','tianyi',1,'2013-03-11','edianlogo.jpg',0,'2013-04-19','1264310280@qq.com','西源大道2006号','未填写','13648044299','未填写'),(2,'老大','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','我可是相当厉害的人哦','13648044299','未填写'),(3,'123','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','未填写','13648044299','未填写');
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

-- Dump completed on 2013-04-19 16:49:03
