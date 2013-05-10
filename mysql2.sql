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
  `price` mediumint(8) unsigned DEFAULT NULL,
  `img` char(25) NOT NULL DEFAULT 'edianlogo.jpg',
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`title`),
  KEY `user_id` (`author_id`),
  KEY `value` (`value`),
  KEY `author_id` (`author_id`),
  KEY `title` (`title`),
  KEY `price` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (1,'我卖的就是这么一种白色的大褂','有能力的人，就给我12块钱，然后自己去抢过来吧，哈哈哈哈哈哈',1,'2013-05-07 17:58:09',20,1367920700,11,0,0,0,12,'201367920689.jpg'),(2,'凉鞋大减价了，10块钱就卖了','我说这就是我们销售的现场，哈哈哈，有谁相信吗？',2,'2013-05-07 19:09:10',19,1367924955,5,0,0,0,10,'191367924950.jpg'),(3,'上流社会的演唱会的门票','吊丝们，你们颤抖吧，这里是上层社会的演唱会的门票，想来吗？40块钱，让你有公爵般的体验',1,'2013-05-07 19:23:34',19,1367925817,3,0,0,0,40,'191367925814.jpg'),(4,'卖帝王沙发，送美人一个','买帝王沙发，送每人一个保暖杯，让你体会到店家的温暖',7,'2013-05-07 19:27:42',19,1367926108,36,1,1,20,2000,'191367926062.jpg');
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
INSERT INTO `ci_sessions` VALUES ('ad36b578718557d8fbedd1e89020e787','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920395,''),('4f0077acc973ffd1d29e44efed704d8b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928098,''),('2f2ca58a7b1f2fc7412ab51efe19b15e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928095,''),('97bd22996044e3fc3c411a54c59e054c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928087,''),('8a457a17f9f25edd86475113f79c95dd','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928086,''),('1be9e66dbf06e03e27887b49adb4e318','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367925940,''),('df4e67411a4b5bc3c9cff13fc20bdf69','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367925836,''),('d31f6bea90fb4c46871020bf7eb69dd1','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367925674,''),('4ad89724703d0eda7372385a0f36a802','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924810,'a:3:{s:9:\"user_data\";s:0:\"\";s:9:\"user_name\";s:7:\"tianyi2\";s:7:\"user_id\";s:2:\"20\";}'),('dfc3daf2c903b536bab450085bc61967','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924890,''),('e4d54ac713d9d87b743b5d7df8d12f7e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920582,''),('61cae335fb18307778c0064b76835862','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920636,''),('d23f13ce20759360dd1e2c794b0f59b4','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920979,''),('1233e0ce4f2eb03dd86c9e7d1f076c02','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920988,''),('942674eb3299247254116dadd239ca7f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920990,''),('cdfbf9f8e23cf2d4db0ce31bc2f83074','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367920999,''),('96d51f7f55da939f10f30271fbea1208','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921000,''),('b42f4d6ca83534a2bbda8b5c73b123a5','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921002,''),('d4765b00b4f7777bd752ab1c44f2914e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921003,''),('799a005223d3e0641cb787415768aa1c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921005,''),('11b4b33b3c741943740632123b9ba707','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921332,''),('345a9044f3d88ed9e25fb673d67e6746','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921491,''),('58f2a81d6983d1a403b6bf63b14c54df','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921512,''),('ae20596e2fb5d89747ef1c037a630938','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921549,''),('b6c845215084b72f7ea8b12207087262','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921557,''),('4ea33759c2251e76562fc62b94de1450','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921570,''),('f6f065ac3305aa4e5911448b1a1d0e39','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921577,''),('f8b4151adc5954b65771da315bcf9eab','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921578,''),('29b4e84e6029d83ffc5b925f05fbe89f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921641,''),('02d7204b12d67e5232cddd4d9f6606d6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921646,''),('ca661f2f2a2bdf5c2029a8cdf6e43fd6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921648,''),('9f47386fb69be154f2672a6593e63c0b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921649,''),('2e2be74df21b7670353f6ec947958e7d','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921651,''),('20ff509be51d1670fabfff7a4282e4c2','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921687,''),('197de4ea8a4482621bcea868eeaa8500','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921688,''),('d03394f8aedeb2200328aa4a702f075d','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921690,''),('680a499c81116cefb46addbebd9fd4c0','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921725,''),('be8737051735adcdb24c2643e99e89b6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921731,''),('1e1fce3d7b8dddc0085ba6008becc1f0','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921774,''),('09d61552690806cabc37046303e17d7e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921781,''),('75244b2af4f58c0bbe04b60570fb61ef','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921821,''),('05bcdd11e1f2d2a734a6437b45d73c2a','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921824,''),('3efe3f059b828dd7d285ca8152a4b4de','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921826,''),('b747c7f0a63b76666da6ab705f9f6d80','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921834,''),('ac7b17493e2666458f81e08f42cea80b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921848,''),('575925d2179cee61c155a4e7a8192f8c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921859,''),('ac9b4f6e0e91b949cd005c330957045b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367921932,''),('cbfabae0b851bbbf8ef3575fe5407499','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924810,''),('25523342db91ea210bfd0d6e55adf66e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924810,''),('d9098a78dfcda189c1763e06add2a4d4','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924810,''),('4c7a4b910589177b1d7ce2e498d5dc96','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928080,''),('e6936a22f76582b5aa146214a4fc7d21','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924814,''),('82286f4801074dc10ef17b5e35528e7b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367924814,''),('42df3e49f828ba49e656c2a6dcbe1848','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367934096,'a:3:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"20\";s:9:\"user_name\";s:7:\"tianyi2\";}'),('3bd85ac24226518a6ee6b2c07ff85da6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928232,''),('2f7232dd1c7ad44608c2136634715ad3','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367928434,''),('ddf0457b6e855d35f04484996069d40a','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367930809,''),('d5173e4a5e8de5791fbae6dcdae84b43','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367931007,''),('84c3126fb955c0e7ba7fe69b4711e3c5','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367931009,''),('d243324e1944f79cb10eb750472d188e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367933325,''),('eb309b732fbe385eb45a8d92aa3f9abf','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367934104,''),('331bd6ad89ab7e8569cb3d318c9e1415','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367934111,''),('ee57337145687cfd75fdbe9a2d5c0b95','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367934118,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=182 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('这不坑爹吗？给一个美女图，送美人，草，居然打错字了','2013-05-07 11:48:11',20,181,4);
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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'tianyi','123',2,'2013-05-07','edianlogo.jpg',NULL,'2013-05-07',NULL,NULL,NULL,'13648044299',NULL,0,1),(20,'tianyi2','123',2,'2013-05-07','1367920625.jpg',NULL,'2013-05-07','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0);
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

-- Dump completed on 2013-05-07 22:05:17
