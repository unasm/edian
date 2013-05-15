-- MySQL dump 10.13  Distrib 5.1.69, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: edian
-- ------------------------------------------------------
-- Server version	5.1.69

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
  `price` mediumint(8) unsigned DEFAULT NULL,
  `img` char(25) NOT NULL DEFAULT 'edianlogo.jpg',
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`title`),
  KEY `user_id` (`author_id`),
  KEY `value` (`value`),
  KEY `author_id` (`author_id`),
  KEY `title` (`title`),
  KEY `price` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (1,'我卖的就是这么一种白色的大褂','有能力的人，就给我12块钱，然后自己去抢过来吧，哈哈哈哈哈哈',1,'2013-05-07 17:58:09',20,1367920726,18,1,1,19,12,'201367920689.jpg'),(2,'凉鞋大减价了，10块钱就卖了','我说这就是我们销售的现场，哈哈哈，有谁相信吗？我是信了，',2,'2013-05-08 12:46:52',19,1367924993,15,1,1,20,15,'191367924950.jpg'),(3,'上流社会的演唱会的门票','吊丝们，你们颤抖吧，这里是上层社会的演唱会的门票，想来吗？40块钱，让你有公爵般的体验',1,'2013-05-07 19:23:34',19,1367926569,37,2,0,19,40,'191367925814.jpg'),(4,'卖帝王沙发，送美人一个','买帝王沙发，送每人一个保暖杯，让你体会到店家的温暖',7,'2013-05-08 13:02:12',19,1367926289,72,2,0,21,2000,'191367989331.jpg'),(5,'火爆的销售现场','你知道，我们在销售什么吗？',1,'2013-05-08 12:52:15',19,1367988822,11,4,0,19,12,'real.png'),(6,'tadfasd','asdvadsfasdf',1,'2013-05-08 12:59:57',19,1367989853,8,4,1,21,10,'191367989196.jpg'),(7,'最美不过夕阳红','出售最美的夕阳',1,'2013-05-08 15:04:48',20,1367996751,9,0,0,0,1000,'201367996688.jpg'),(8,'谁又不是从地球上生长呢','保护环境哦哦哦',9,'2013-05-08 19:00:07',19,1368010984,23,1,0,22,20,'191368010806.jpg'),(9,'出一个宠物老鼠','听说是荷兰猪的一种，不清楚，廉价出手吧',11,'2013-05-08 21:04:10',21,1368018281,4,0,0,0,12,'211368018250.jpg'),(10,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:12:30',22,1368018790,4,0,0,0,23,'221368018749.jpg'),(11,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:15:50',22,1368018961,2,0,0,0,23,'221368018949.jpg'),(12,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:16:09',22,1368019049,8,0,0,0,23,'221368018968.jpg'),(13,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:16:25',22,1368019225,24,0,0,0,23,'221368018984.jpg'),(14,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:17:15',22,1368019077,6,0,0,0,23,'221368019034.jpg'),(15,'这个是我的桌面，给我钱，我给他配成这个样子','有谁干吗？',6,'2013-05-08 21:50:45',22,1368019820,16,0,0,0,12,'221368021044.jpg'),(16,'血红色的眼睛，又能看多远','这个，是用来形容鼬的，我就用猫眼来代替吧',6,'2013-05-08 21:49:55',22,1368021427,8,1,1,21,33,'221368020773.jpg'),(17,'出卖自己的那个哦','给自己标价多少呢，',4,'2013-05-08 21:59:48',22,1368021685,15,0,0,0,11,'real.png'),(18,'检查中，','检查中，',1,'2013-05-08 22:09:22',22,1368022212,5,0,0,0,23,'221368022161.jpg'),(19,'这里应该被压缩吧','压缩检查',1,'2013-05-08 22:12:25',22,1368022367,4,0,0,0,33,'221368022345.jpg'),(20,'鸟，我想出售的的是这个','鸟人，哪里走',1,'2013-05-10 19:09:59',25,1368184289,9,0,0,0,22,'251368184199.jpg'),(21,'出书','毕业季节，大出售，清仓处理书了，电工的书，5元一本',11,'2013-05-10 21:19:54',19,1368192184,23,0,0,0,22,'191368191994.jpg');
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
INSERT INTO `ci_sessions` VALUES ('e4012edcb1e46ad867da0d3ebba0a8dc','127.0.0.1','Mozilla/5.0 (X11; Linux i686; rv:17.0) Gecko/20130402 Firefox/17.0',1368592465,''),('96d5b38f21d08ea89a48ecda12370533','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31',1368592041,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=197 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('这不坑爹吗？给一个美女图，送美人，草，居然打错字了','2013-05-07 11:48:11',20,181,4),('切','2013-05-08 05:15:24',19,182,1),('出洋相，是的话，你就是雇佣童工了','2013-05-08 06:32:56',20,183,2),('果然是上流社会，哈哈，我仿佛看到了香槟，红地毯，音乐和走动的性感女郎','2013-05-08 06:38:21',20,184,3),('真实不清楚，看不清，','2013-05-08 12:16:15',19,185,5),('或许是你这个家伙的自画像吧','2013-05-08 12:17:53',19,186,5),('那也就是说你在出售自己','2013-05-08 12:18:06',19,187,5),('也就是说，哈哈哈[face:11][face:11][face:11]','2013-05-08 12:18:16',19,188,5),('表示店家坑人','2013-05-08 12:21:25',21,189,4),('没有想到过外星人的存在吗？比如，绿灯下，绝地武士之类的','2013-05-08 13:01:59',22,190,8),('我想，这个是乱码的意思吧[face:11][face:11]','2013-05-08 14:00:27',22,191,6),('也或许是认真的呢','2013-05-08 14:15:34',21,192,6),('我想，只有作者自己知道吧','2013-05-08 14:16:37',21,193,6),('最后再帮顶一次','2013-05-08 14:30:19',21,194,6),('鼬，一个悲情人物哦','2013-05-08 14:31:10',21,195,16),('玩笑大了吧','2013-05-14 01:31:52',19,196,3);
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
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (72,19,'191368016856.jpg','win8.jpg','2013-05-08 20:40:57',''),(73,19,'191368016876.jpg',')sdfa?>,.jpg','2013-05-08 20:41:16','');
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,2,'欢迎来到新世界','NoBody','2013-05-08 01:39:42',0,1,0);
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
  `contract2` char(30) DEFAULT NULL,
  `mailNum` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `comNum` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_photo` (`user_photo`),
  KEY `contra` (`contract1`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'tianyi','123',2,'2013-05-07','1368191608.jpg',NULL,'2013-05-14','','','','13648044299','',0,0),(20,'tianyi2','123',2,'2013-05-07','1367920625.jpg',NULL,'2013-05-09','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0),(21,'unasm4','1',2,'2013-05-08','1368015653.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','我是管理员','12346789233','douunasm@gmail.com',0,0),(22,'123','123',2,'2013-05-08','edianlogo.jpg',NULL,'2013-05-08','','','','13648044299','',0,1),(23,'tianyi12','123',2,'2013-05-10','edianlogo.jpg',NULL,'2013-05-10','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','大红花','13648044299','',0,0),(24,'temp','123',2,'2013-05-10','edianlogo.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','asdasdf','13648044299','asd',0,0),(25,'yitian','123',2,'2013-05-10','1368184077.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0);
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

-- Dump completed on 2013-05-15 12:35:54
