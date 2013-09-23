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
  `keyword` char(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`art_id`),
  KEY `art_title` (`title`),
  KEY `user_id` (`author_id`),
  KEY `value` (`value`),
  KEY `author_id` (`author_id`),
  KEY `title` (`title`),
  KEY `price` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (1,'我卖的就是这么一种白色的大褂','有能力的人，就给我12块钱，然后自己去抢过来吧，哈哈哈哈哈哈',1,'2013-05-07 17:58:09',20,1367921096,55,1,1,19,12,'201367920689.jpg',''),(2,'凉鞋大减价了，10块钱就卖了','我说这就是我们销售的现场，哈哈哈，有谁相信吗？我是信了，',2,'2013-05-08 12:46:52',19,1367925253,41,1,0,20,15,'191367924950.jpg',''),(3,'上流社会的演唱会的门票','吊丝们，你们颤抖吧，这里是上层社会的演唱会的门票，想来吗？40块钱，让你有公爵般的体验',1,'2013-05-07 19:23:34',19,1367926749,55,2,0,19,40,'191367925814.jpg',''),(4,'卖帝王沙发，送美人一个','买帝王沙发，送每人一个保暖杯，让你体会到店家的温暖',7,'2013-05-08 13:02:12',19,1367926419,85,2,0,21,2000,'191367989331.jpg',''),(5,'火爆的销售现场','你知道，我们在销售什么吗？',1,'2013-05-08 12:52:15',19,1367990892,158,5,0,19,12,'real.png',''),(6,'tadfasd','asdvadsfasdf',1,'2013-05-08 12:59:57',19,1367989983,21,4,0,21,10,'191367989196.jpg',''),(7,'最美不过夕阳红','出售最美的夕阳',1,'2013-05-08 15:04:48',20,1367996851,19,0,0,0,1000,'201367996688.jpg',''),(8,'谁又不是从地球上生长呢','保护环境哦哦哦',9,'2013-05-08 19:00:07',19,1368011074,32,1,0,22,20,'191368010806.jpg',''),(9,'出一个宠物老鼠','听说是荷兰猪的一种，不清楚，廉价出手吧',11,'2013-05-08 21:04:10',21,1368018611,37,0,0,0,12,'211368018250.jpg',''),(10,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:12:30',22,1368018990,24,0,0,0,23,'221368018749.jpg',''),(11,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:15:50',22,1368019001,6,0,0,0,23,'221368018949.jpg',''),(12,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:16:09',22,1368019309,34,0,0,0,23,'221368018968.jpg',''),(13,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:16:25',22,1368019395,41,0,0,0,23,'221368018984.jpg',''),(14,'出售自己','我出售的，是自己心中黑暗的一面，恩，就是这个样子，23块钱，哈哈',1,'2013-05-08 21:17:15',22,1368019507,49,0,0,0,23,'221368019034.jpg',''),(15,'这个是我的桌面，给我钱，我给他配成这个样子','有谁干吗？',6,'2013-05-08 21:50:45',22,1368020860,120,0,0,0,12,'221368021044.jpg',''),(16,'血红色的眼睛，又能看多远','这个，是用来形容鼬的，我就用猫眼来代替吧',6,'2013-05-08 21:49:55',22,1368022257,91,1,0,21,33,'221368020773.jpg',''),(17,'出卖自己的那个哦','给自己标价多少呢，',4,'2013-05-08 21:59:48',22,1368021755,22,0,0,0,11,'real.png',''),(18,'检查中，','检查中，',1,'2013-05-08 22:09:22',22,1368022962,80,0,0,0,23,'221368022161.jpg',''),(19,'这里应该被压缩吧','压缩检查',1,'2013-05-08 22:12:25',22,1368024507,158,1,1,19,33,'221368022345.jpg',''),(20,'鸟，我想出售的的是这个','鸟人，哪里走',1,'2013-05-10 19:09:59',25,1368184589,39,0,0,0,22,'251368184199.jpg',''),(21,'出书','毕业季节',8,'2013-06-12 23:09:58',19,1368192274,32,0,0,0,22,'191368191994.jpg','二手市场;图书;其他;'),(22,'可以照见未来的水晶球，便宜出手了','你看看里面反映的，不是你的未来吧',1,'2013-05-23 22:26:32',19,1369319282,9,0,0,0,23,'191369319192.jpg',''),(23,'testting title','testing content',0,'2013-06-03 09:26:31',19,6443,0,0,0,0,57,'',''),(24,'testting title','testing content',3,'2013-06-03 09:27:19',19,1656,0,0,0,0,408,'191367926062.jpg',''),(25,'testting title','testing content',8,'2013-06-03 09:27:20',19,4753,2,0,0,0,734,'191367926062.jpg',''),(26,'testting title','testing content',8,'2013-06-03 09:27:20',19,4753,2,0,0,0,734,'191367926062.jpg',''),(27,'testting title','testing content',7,'2013-06-03 09:27:21',19,2749,0,0,0,0,58,'191367926062.jpg',''),(28,'testting title','testing content',7,'2013-06-03 09:27:21',19,2749,0,0,0,0,58,'191367926062.jpg',''),(29,'testting title','testing content',9,'2013-06-03 09:27:36',19,3132,0,0,0,0,852,'191367926062.jpg',''),(30,'testting title','testing content',9,'2013-06-03 09:27:36',19,3132,0,0,0,0,852,'191367926062.jpg',''),(31,'testting title','testing content',8,'2013-06-03 09:27:37',19,6153,0,0,0,0,676,'191367926062.jpg',''),(32,'testting title','testing content',8,'2013-06-03 09:27:37',19,6253,10,0,0,0,676,'191367926062.jpg',''),(33,'testting title','testing content',2,'2013-06-03 09:27:38',19,4222,1,0,0,0,498,'191367926062.jpg',''),(34,'testting title','testing content',2,'2013-06-03 09:27:38',19,4212,0,0,0,0,498,'191367926062.jpg',''),(35,'testting title','testing content',2,'2013-06-03 09:27:38',19,4612,40,0,0,0,498,'191367926062.jpg',''),(36,'testting title','testing content',6,'2013-06-03 09:27:39',19,2323,3,0,0,0,819,'191367926062.jpg',''),(37,'testting title','testing content',6,'2013-06-03 09:27:39',19,2293,0,0,0,0,819,'191367926062.jpg',''),(38,'testting title','testing content',6,'2013-06-03 09:27:39',19,2333,4,0,0,0,819,'191367926062.jpg',''),(39,'testting title','testing content',6,'2013-06-03 09:27:39',19,2293,0,0,0,0,819,'191367926062.jpg',''),(40,'testting title','testing content',0,'2013-06-03 09:27:40',19,244,0,0,0,0,136,'191367926062.jpg',''),(41,'testting title','testing content',4,'2013-06-03 09:27:41',19,8227,2,0,0,0,949,'191367926062.jpg',''),(42,'testting title','testing content',2,'2013-06-03 09:27:43',19,10613,17,2,0,19,592,'191367926062.jpg',''),(43,'testting title','testing content',2,'2013-06-03 09:27:43',19,9273,3,0,0,0,592,'191367926062.jpg',''),(44,'testting title','testing content',2,'2013-06-03 09:27:43',19,9253,1,0,0,0,592,'191367926062.jpg',''),(45,'testting title','testing content',2,'2013-06-03 09:27:43',19,9263,2,0,0,0,592,'191367926062.jpg',''),(46,'testting title','testing content',2,'2013-06-03 09:27:43',19,9243,0,0,0,0,592,'191367926062.jpg',''),(47,'testting title','testing content',7,'2013-06-03 09:27:44',19,2317,0,0,0,0,413,'191367926062.jpg',''),(48,'testting title','testing content',7,'2013-06-03 09:27:44',19,2317,0,0,0,0,413,'191367926062.jpg',''),(49,'testting title','testing content',7,'2013-06-03 09:27:44',19,2317,0,0,0,0,413,'191367926062.jpg',''),(50,'testting title','testing content',6,'2013-06-03 09:27:45',19,5343,0,0,0,0,236,'191367926062.jpg',''),(51,'testting title','testing content',6,'2013-06-03 09:27:45',19,5343,0,0,0,0,236,'191367926062.jpg',''),(52,'testting title','testing content',10,'2013-06-03 09:27:46',19,3386,0,0,0,0,555,'191367926062.jpg',''),(53,'testting title','testing content',10,'2013-06-03 09:27:46',19,3386,0,0,0,0,555,'191367926062.jpg',''),(54,'testting title','testing content',4,'2013-06-03 09:27:47',19,6485,9,0,0,0,870,'191367926062.jpg',''),(55,'testting title','testing content',4,'2013-06-03 09:27:47',19,6475,8,0,0,0,870,'191367926062.jpg',''),(56,'testting title','testing content',1,'2013-06-03 09:27:56',19,3679,0,0,0,0,757,'191367926062.jpg',''),(57,'testting title','testing content',1,'2013-06-03 09:27:56',19,3679,0,0,0,0,757,'191367926062.jpg',''),(58,'testting title','testing content',0,'2013-06-03 09:27:57',19,6641,0,0,0,0,576,'191367926062.jpg',''),(59,'testting title','testing content',0,'2013-06-03 09:27:57',19,6641,0,0,0,0,576,'191367926062.jpg',''),(60,'testting title','testing content',0,'2013-06-03 09:27:57',19,6641,0,0,0,0,576,'191367926062.jpg',''),(61,'testting title','testing content',4,'2013-06-03 09:27:58',19,9695,1,0,0,0,401,'191367926062.jpg',''),(62,'testting title','testing content',4,'2013-06-03 09:27:58',19,9685,0,0,0,0,401,'191367926062.jpg',''),(63,'testting title','testing content',4,'2013-06-03 09:27:58',19,9715,3,0,0,0,401,'191367926062.jpg',''),(64,'testting title','testing content',9,'2013-06-03 09:27:59',19,7634,0,0,0,0,708,'191367926062.jpg',''),(65,'testting title','testing content',9,'2013-06-03 09:27:59',19,7634,0,0,0,0,708,'191367926062.jpg',''),(66,'testting title','testing content',9,'2013-06-03 09:27:59',19,7634,0,0,0,0,708,'191367926062.jpg',''),(67,'testting title','testing content',2,'2013-06-03 09:28:00',19,5709,0,0,0,0,533,'191367926062.jpg',''),(68,'testting title','testing content',2,'2013-06-03 09:28:00',19,5709,0,0,0,0,533,'191367926062.jpg',''),(69,'testting title','testing content',2,'2013-06-03 09:28:00',19,5719,1,0,0,0,533,'191367926062.jpg',''),(70,'testting title','testing content',2,'2013-06-03 09:28:00',19,5729,2,0,0,0,533,'191367926062.jpg',''),(71,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(72,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(73,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(74,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(75,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(76,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(77,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(78,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(79,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(80,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(81,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(82,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(83,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(84,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(85,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(86,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(87,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(88,'testting title','testing content',7,'2013-06-03 09:28:01',19,3967,16,0,0,0,360,'191367926062.jpg',''),(89,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(90,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(91,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(92,'testting title','testing content',7,'2013-06-03 09:28:01',19,3807,0,0,0,0,360,'191367926062.jpg',''),(93,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(94,'testting title','testing content',1,'2013-06-03 09:28:02',19,6808,1,0,0,0,677,'191367926062.jpg',''),(95,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(96,'testting title','testing content',1,'2013-06-03 09:28:02',19,6808,1,0,0,0,677,'191367926062.jpg',''),(97,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(98,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(99,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(100,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(101,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(102,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(103,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(104,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(105,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(106,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(107,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(108,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(109,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(110,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(111,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(112,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(113,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(114,'testting title','testing content',1,'2013-06-03 09:28:02',19,6808,1,0,0,0,677,'191367926062.jpg',''),(115,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(116,'testting title','testing content',1,'2013-06-03 09:28:02',19,6808,1,0,0,0,677,'191367926062.jpg',''),(117,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(118,'testting title','testing content',1,'2013-06-03 09:28:02',19,6798,0,0,0,0,677,'191367926062.jpg',''),(119,'testting title','testing content',5,'2013-06-03 09:28:03',19,4892,6,0,0,0,992,'191367926062.jpg',''),(120,'testting title','testing content',5,'2013-06-03 09:28:03',19,4872,4,0,0,0,992,'191367926062.jpg',''),(121,'testting title','testing content',5,'2013-06-03 09:28:03',19,4842,1,0,0,0,992,'191367926062.jpg',''),(122,'testting title','testing content',5,'2013-06-03 09:28:03',19,4832,0,0,0,0,992,'191367926062.jpg',''),(123,'testting title','testing content',5,'2013-06-03 09:28:03',19,4832,0,0,0,0,992,'191367926062.jpg',''),(124,'testting title','testing content',5,'2013-06-03 09:28:03',19,4852,2,0,0,0,992,'191367926062.jpg',''),(125,'testting title','testing content',5,'2013-06-03 09:28:03',19,4832,0,0,0,0,992,'191367926062.jpg',''),(126,'testting title','testing content',5,'2013-06-03 09:28:03',19,4832,0,0,0,0,992,'191367926062.jpg',''),(127,'testting title','testing content',5,'2013-06-03 09:28:03',19,4862,3,0,0,0,992,'191367926062.jpg',''),(128,'testting title','testing content',5,'2013-06-03 09:28:03',19,4852,2,0,0,0,992,'191367926062.jpg',''),(129,'testting title','testing content',5,'2013-06-03 09:28:03',19,4872,4,0,0,0,992,'191367926062.jpg',''),(130,'testting title','testing content',10,'2013-06-03 09:28:04',19,2868,0,0,0,0,318,'191367926062.jpg',''),(131,'testting title','testing content',8,'2013-06-03 09:53:13',19,4807,1,0,0,0,854,'221368022161.jpg',''),(132,'testting title','testing content',8,'2013-06-03 09:53:13',19,4797,0,0,0,0,854,'221368022161.jpg',''),(133,'testting title','testing content',1,'2013-06-03 09:53:14',19,7862,0,0,0,0,682,'191367926062.jpg',''),(134,'testting title','testing content',1,'2013-06-03 09:53:14',19,7872,1,0,0,0,682,'191367926062.jpg',''),(135,'testting title','testing content',1,'2013-06-03 09:53:14',19,7882,2,0,0,0,682,'191367926062.jpg',''),(136,'testting title','testing content',1,'2013-06-03 09:53:14',19,7862,0,0,0,0,682,'191367926062.jpg',''),(137,'testting title','testing content',0,'2013-06-03 09:53:15',19,921,0,0,0,0,996,'221368022161.jpg',''),(138,'testting title','testing content',0,'2013-06-03 09:53:15',19,921,0,0,0,0,996,'221368022161.jpg',''),(139,'testting title','testing content',0,'2013-06-03 09:53:15',19,921,0,0,0,0,996,'221368022161.jpg',''),(140,'testting title','testing content',5,'2013-06-03 09:53:16',19,3918,0,0,0,0,322,'191369575022.jpg',''),(141,'testting title','testing content',5,'2013-06-03 09:53:16',19,3918,0,0,0,0,322,'191369575022.jpg',''),(142,'我们的测试尚未结束','任重而到远',12,'2013-06-04 16:05:35',19,1370333305,17,0,0,0,23,'real.png',''),(143,'sdf asdlf asdkf alsdkf;asdjf;lk asdkfa;sd阿斯顿发ADS ASDFASDFASDFASDFASDFASDFASDFASDF','<img src=\"http://www.edian.cn/upload/month_1306/201306061832245766.jpg\" alt=\"\" />',1,'2013-06-06 18:36:47',20,1370515117,11,0,0,0,12,'201370515007.jpg',''),(144,'asdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasdfasd','<p><img src=\"http://www.edian.cn/upload/month_1306/201306061840387022.jpg\" alt=\"\" /></p><p>关于图片大小的测试中</p>',1,'2013-06-06 18:40:52',20,1370516072,82,0,0,0,56,'201370515251.jpg',''),(145,'阿德发','阿飞',4,'2013-06-10 10:15:24',20,1370830564,4,0,0,0,23,'real.png',''),(146,'桑拿了，桑拿了','速度发速度',3,'2013-06-10 13:08:40',20,1370840990,7,0,0,0,322,'201370840920.jpg',''),(147,'二手的轿车，还是新车的呢，便宜出了。','<p><img src=\"http://www.edian.cn/upload/month_1306/201306101310265776.jpg\" alt=\"\" /></p><p>如百合一般的车子，给你飞一般的享受，刚买不久，买股票发了大财，就把这个车卖了，买一个新的高级的车子，哈哈哈哈，恭喜我把</p>',9,'2013-06-10 13:26:10',20,1370842010,4,0,0,0,2000,'201370841970.jpg','轿车;现代;优惠;结实;日用百货;其他;'),(148,'泡澡便宜了','便宜了',3,'2013-06-10 15:09:49',20,1370848339,15,0,0,0,23,'real.png','优惠;折扣;降价;生活;泡澡;'),(149,'我们的商店开业了','<p>好好看，好好吃的火锅<img src=\"http://www.edian.cn/upload/month_1306/201306281243524066.JPG\" width=\"768\" height=\"768\" alt=\"\" /></p><p>你没有看错，吃夕阳红火锅，给你一种登峰造极的感觉，一种一览众山小的感觉</p>',1,'2013-06-28 12:45:07',27,1372394757,5,0,0,0,34,'271372394707.jpg','夕阳红火锅;火锅;饭店;烧烤;');
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
INSERT INTO `ci_sessions` VALUES ('3e47ad734060d2e01868a59c0868d803','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.31 (KHTML, like Gecko) Chrome/26.0.1410.63 Safari/537.31',1375087116,'a:2:{s:7:\"user_id\";s:2:\"19\";s:9:\"user_name\";s:6:\"tianyi\";}');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comItem`
--

DROP TABLE IF EXISTS `comItem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comItem` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `score` tinyint(4) NOT NULL DEFAULT '9',
  `context` text,
  `time` date DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `item_id` (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comItem`
--

LOCK TABLES `comItem` WRITE;
/*!40000 ALTER TABLE `comItem` DISABLE KEYS */;
INSERT INTO `comItem` VALUES (1,9,'adsf|asdf|2013-07-28|tianyi;asdf|2013-07-28|tianyi','2013-07-28',19,40),(2,9,'adsf|asdf|2013-07-28|tianyi;asdf|2013-07-28|tianyi&testing recom|2013-07-28|tianyi&酱油|2013-07-28|tianyi&再次酱油|2013-07-28|tianyi&呵呵|2013-07-28|tianyi','2013-07-28',19,40),(3,9,'asdfasd|asdf|2013-07-28|tianyi;asdf|2013-07-28|tianyi;asdf|2013-07-28|tianyi;a;sdf|2013-07-28|tianyi','2013-07-28',19,40),(4,0,'asdf|asdf|2013-07-28|tianyi;asdf|2013-07-28|tianyi','2013-07-28',19,0),(5,6,'呵呵，正式的来一发&同来一发|2013-07-28|tianyi&同水一发，:-)|2013-07-28|tianyi','2013-07-28',19,40),(6,3,'asdfasdf','2013-07-28',19,0),(7,2,'酱油，不解释','2013-07-28',19,0);
/*!40000 ALTER TABLE `comItem` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('这不坑爹吗？给一个美女图，送美人，草，居然打错字了','2013-05-07 11:48:11',20,181,4),('切','2013-05-08 05:15:24',19,182,1),('出洋相，是的话，你就是雇佣童工了','2013-05-08 06:32:56',20,183,2),('果然是上流社会，哈哈，我仿佛看到了香槟，红地毯，音乐和走动的性感女郎','2013-05-08 06:38:21',20,184,3),('真实不清楚，看不清，','2013-05-08 12:16:15',19,185,5),('或许是你这个家伙的自画像吧','2013-05-08 12:17:53',19,186,5),('那也就是说你在出售自己','2013-05-08 12:18:06',19,187,5),('也就是说，哈哈哈[face:11][face:11][face:11]','2013-05-08 12:18:16',19,188,5),('表示店家坑人','2013-05-08 12:21:25',21,189,4),('没有想到过外星人的存在吗？比如，绿灯下，绝地武士之类的','2013-05-08 13:01:59',22,190,8),('我想，这个是乱码的意思吧[face:11][face:11]','2013-05-08 14:00:27',22,191,6),('也或许是认真的呢','2013-05-08 14:15:34',21,192,6),('我想，只有作者自己知道吧','2013-05-08 14:16:37',21,193,6),('最后再帮顶一次','2013-05-08 14:30:19',21,194,6),('鼬，一个悲情人物哦','2013-05-08 14:31:10',21,195,16),('玩笑大了吧','2013-05-14 01:31:52',19,196,3),('不呵呵','2013-05-20 13:32:48',19,197,5),('234','2013-06-05 17:28:20',19,198,42),('asdfasd','2013-06-05 17:28:32',19,199,42),('为什么他们可以评论，而我不可乙','2013-06-16 02:29:36',19,200,19);
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
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `img`
--

LOCK TABLES `img` WRITE;
/*!40000 ALTER TABLE `img` DISABLE KEYS */;
INSERT INTO `img` VALUES (72,19,'191368016856.jpg','win8.jpg','2013-05-08 20:40:57',''),(73,19,'191368016876.jpg',')sdfa?>,.jpg','2013-05-08 20:41:16',''),(74,19,'191369575022.jpg','2e8d37a8a1d82077c9b636587ab6db94.jpg','2013-05-26 21:30:22',''),(75,19,'191369575048.jpg','1366 (111).jpg','2013-05-26 21:30:48',''),(76,19,'191369575205.jpg','12530224.jpg','2013-05-26 21:33:25',''),(77,19,'191369575278.jpg','14140006.jpg','2013-05-26 21:34:39',''),(78,19,'191369575303.jpg','14140010.jpg','2013-05-26 21:35:03',''),(79,19,'191369988975.jpg','12530112.jpg','2013-05-31 16:29:35',''),(80,19,'191374151197.jpg','胡歌0545.jpg','2013-07-18 20:39:57',''),(81,19,'191374151353.jpg','动漫05418541.jpg','2013-07-18 20:42:33',''),(82,19,'191374151394.jpg','020.JPG','2013-07-18 20:43:14',''),(83,19,'191374324915.jpg','Penguins.jpg','2013-07-20 20:55:16',''),(84,19,'191374325063.jpg','0012.JPG','2013-07-20 20:57:43',''),(85,19,'191374325085.jpg','115.JPG','2013-07-20 20:58:05',''),(86,19,'191374326184.jpg','0011.JPG','2013-07-20 21:16:24',''),(87,19,'191374326217.jpg','Lighthouse.jpg','2013-07-20 21:16:57',''),(88,19,'191374326227.jpg','0017.JPG','2013-07-20 21:17:07','');
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
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imgComment`
--

LOCK TABLES `imgComment` WRITE;
/*!40000 ALTER TABLE `imgComment` DISABLE KEYS */;
INSERT INTO `imgComment` VALUES (17,'2013-05-26 22:04:08','win8霸气',72,19),(18,'2013-05-26 23:42:37','这个是什么星球？',74,19);
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
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `content` text,
  `time` datetime DEFAULT NULL,
  `author_id` int(10) unsigned DEFAULT '0',
  `value` int(10) unsigned DEFAULT '1',
  `visitor_num` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `store_num` smallint(5) unsigned DEFAULT NULL,
  `judgescore` int(10) unsigned NOT NULL DEFAULT '0',
  `price` float(10,2) NOT NULL DEFAULT '0.00',
  `img` tinytext,
  `keyword` char(50) DEFAULT NULL,
  `attr` tinytext,
  `promise` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `author_id` (`author_id`),
  KEY `price` (`price`),
  KEY `author_id_2` (`author_id`),
  FULLTEXT KEY `keyword` (`keyword`),
  FULLTEXT KEY `title` (`title`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'物美价廉',' 测试信息','2013-07-23 12:05:11',19,1374552311,0,123,0,13.00,'http://www.edian.cn/upload/191374151394.jpg|',';明天;美好;世界;','','送货'),(2,'物美价廉',' 测试信息','2013-07-23 12:05:22',19,1374552322,0,123,0,13.00,'http://www.edian.cn/upload/191374324915.jpg| http://www.edian.cn/upload/191374151394.jpg|',';明天;美好;世界;','','送货'),(3,'物美价廉',' 测试信息','2013-07-23 12:07:20',19,1374552440,0,123,0,13.00,'http://www.edian.cn/upload/191374326217.jpg|',';明天;美好;世界;','','送货'),(4,'物美价廉',' 测试信息','2013-07-23 12:07:39',19,1374552459,0,123,0,13.00,'http://www.edian.cn/upload/191374325085.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(5,'物美价廉',' 测试信息','2013-07-23 12:08:31',19,1374552511,0,123,0,13.00,'http://www.edian.cn/upload/191374325085.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(6,'物美价廉',' 测试信息','2013-07-23 12:08:46',19,1374552526,0,123,0,13.00,'http://www.edian.cn/upload/191374151197.jpg| http://www.edian.cn/upload/191374151197.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(7,'物美价廉',' 测试信息','2013-07-23 12:09:27',19,1374552567,0,123,0,13.00,'http://www.edian.cn/upload/191369575205.jpg|',';明天;美好;世界;','','送货'),(8,'物美价廉',' 测试信息','2013-07-23 12:12:53',19,1374552773,0,123,0,13.00,'http://www.edian.cn/upload/191374326184.jpg| http://www.edian.cn/upload/191374325085.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(9,'物美价廉',' 测试信息','2013-07-23 12:13:19',19,1374552799,0,123,0,13.00,'http://www.edian.cn/upload/191374324915.jpg| http://www.edian.cn/upload/191374324915.jpg|',';明天;美好;世界;','','送货'),(10,'物美价廉',' 测试信息','2013-07-23 12:17:23',19,1374553043,0,123,0,13.00,'http://www.edian.cn/upload/191374151197.jpg| http://www.edian.cn/upload/191374326184.jpg| http://www.edian.cn/upload/191374325085.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(11,'物美价廉',' 测试信息','2013-07-23 12:19:06',19,1374553146,0,123,0,13.00,'http://www.edian.cn/upload/191374151197.jpg| http://www.edian.cn/upload/191374326227.jpg| http://www.edian.cn/upload/191374326184.jpg| http://www.edian.cn/upload/191374325085.jpg|',';明天;美好;世界;','','送货'),(12,'物美价廉',' 测试信息','2013-07-23 12:22:39',19,1374553359,0,123,0,13.00,'http://www.edian.cn/upload/191374326227.jpg| http://www.edian.cn/upload/191374326217.jpg|',';明天;美好;世界;','','送货'),(13,'物美价廉',' 测试信息','2013-07-23 12:23:04',19,1374553384,0,123,0,13.00,'http://www.edian.cn/upload/191369575278.jpg| http://www.edian.cn/upload/191369575303.jpg| http://www.edian.cn/upload/191369988975.jpg|',';明天;美好;世界;','','送货'),(14,'物美价廉',' 测试信息','2013-07-23 12:24:28',19,1374553468,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(15,'物美价廉',' 测试信息','2013-07-23 12:25:17',19,1374553517,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(16,'物美价廉',' 测试信息','2013-07-23 12:26:42',19,1374553602,0,123,0,13.00,'',';明天;美好;世界;','',''),(17,'物美价廉',' 测试信息','2013-07-23 12:27:29',19,1374553649,0,123,0,13.00,'',';','',''),(18,'','','2013-07-23 12:27:53',19,1374553673,0,0,0,0.00,'','','',''),(19,'','','2013-07-23 12:28:14',19,1374553694,0,0,0,0.00,'','','',''),(20,'物美价廉',' 测试信息','2013-07-23 12:30:04',19,1374553804,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(21,'物美价廉',' 测试信息','2013-07-23 12:32:10',19,1374553930,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(22,'物美价廉',' 测试信息','2013-07-23 12:33:35',19,1374554015,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(23,'物美价廉',' 测试信息','2013-07-23 12:52:56',19,1374555176,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(24,'物美价廉','呵呵呵和','2013-07-23 12:56:56',19,1374555416,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(25,'物美价廉',' 测试信息','2013-07-23 13:00:15',19,1374555615,0,133,0,13.00,'http://www.edian.cn/upload/191374325085.jpg| http://www.edian.cn/upload/191374325063.jpg| http://www.edian.cn/upload/191374324915.jpg|',';明天;美好;世界;水果;干果;','2,2,款式,红色,<img src=\"http://www.edian.cn/upload/191374325063.jpg\">,<img src=\"http://www.edian.cn/upload/191374326227.jpg\">,白色,绿色|12,10;23,10;43,10;56,10;','送货'),(26,'物美价廉','最后一发','2013-07-23 13:14:46',19,1374556486,0,123,0,13.00,'http://www.edian.cn/upload/191369988975.jpg| http://www.edian.cn/upload/191374326227.jpg| http://www.edian.cn/upload/191374326217.jpg| http://www.edian.cn/upload/191374326184.jpg| http://www.edian.cn/upload/191374325063.jpg|',';明天;美好;世界;','','送货'),(27,'物美价廉',' 测试信息','2013-07-23 16:16:15',19,1374567375,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(28,'物美价廉',' 测试信息','2013-07-23 16:16:31',19,1374567391,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(29,'物美价廉',' 测试信息','2013-07-23 16:17:15',19,1374567435,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(30,'物美价廉',' 测试信息','2013-07-23 16:20:36',19,1374567636,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(31,'物美价廉',' 测试信息','2013-07-23 16:21:07',19,1374567667,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(32,'物美价廉',' 测试信息','2013-07-23 16:25:56',19,1374567956,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(33,'物美价廉',' 测试信息','2013-07-23 16:35:37',19,1374568537,0,123,0,13.00,'191374326227.jpg|191374326217.jpg|191374326184.jpg|191374325085.jpg|191374325063.jpg|191374151394.jpg|',';明天;美好;世界;','1,2,款式,颜色,款式是图片,红色12元13件,白色13元10件|13,12;10,13;','送货'),(34,'物美价廉',' 测试信息','2013-07-23 16:38:45',19,1374568725,0,123,0,13.00,'191374324915.jpg|191374151394.jpg|',';明天;美好;世界;','2,图片,191374326184.jpg,191374326217.jpg|13,10;14,10;','送货'),(35,'物美价廉',' 测试信息','2013-07-26 13:24:10',19,1374816250,0,123,0,13.00,'191369575022.jpg|191368016876.jpg|191368016856.jpg|191374151353.jpg|191374151394.jpg|191374324915.jpg|',';明天;美好;世界;','','送货'),(36,'物美价廉',' 测试信息','2013-07-26 13:27:02',19,1374816422,0,123,0,13.00,'191374324915.jpg|191374325063.jpg',';明天;美好;世界;','','送货'),(37,'物美价廉',' 测试信息','2013-07-26 14:15:02',19,1374819302,0,123,0,13.00,'191369575278.jpg|191369575205.jpg',';明天;美好;世界;','2,颜色,佰色,红色|12,10;12,10','送货'),(38,'物美价廉',' 测试信息','2013-07-26 14:49:28',19,1374821368,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(39,'物美价廉',' 测试信息','2013-07-26 14:51:58',19,1374821518,0,123,0,13.00,'',';明天;美好;世界;','','送货'),(40,'物美价廉',' 测试信息','2013-07-26 14:58:29',19,1374821909,0,123,0,13.00,'191374326227.jpg|191374326217.jpg|191374325085.jpg',';明天;美好;世界;','2,2,图片,颜色,191374326184.jpg,191374326227.jpg,红色10元11个,白色10个10元|11,10;10,10;11,10;10,10','送货');
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,2,'欢迎来到新世界','NoBody','2013-05-08 01:39:42',0,1,0),(19,1,'有意求该','可以砍价吗？','2013-05-21 05:49:04',0,2,0),(19,1,'买东西','我不仅对你东西感兴趣，也对你人感兴趣，怎么办？','2013-05-26 10:51:23',0,3,0),(19,1,'呵呵','对我的提议感觉如何？','2013-05-26 10:52:23',0,4,0),(19,1,'adta','test','2013-05-26 11:10:30',0,5,0),(19,1,'test','asdfas','2013-05-26 11:11:27',0,6,0),(19,1,'asdfa','asdfa','2013-05-26 11:11:51',0,7,0),(19,1,'sda','sdfas','2013-05-26 11:12:28',0,8,0),(19,1,'sdf','','2013-05-26 11:13:23',0,9,0),(19,1,'asdfa','asdfa','2013-05-26 11:14:53',0,10,0),(19,1,'asdfasdf标题','','2013-05-26 11:15:48',0,11,0),(19,1,'asdfasd','','2013-05-26 11:16:27',0,12,0),(19,1,'asdfasdasdfa','asdfa','2013-05-26 11:17:49',0,13,0),(19,1,'同志 哦','阿德算法速度','2013-05-26 11:18:51',0,14,0),(19,1,'老鼠有多重？','可以用来吃肉吗？','2013-05-26 11:19:16',0,15,0),(19,22,'test','133','2013-05-26 12:06:43',0,16,0),(19,22,'hi','有事没事常联系哦','2013-05-26 12:07:51',0,17,0),(19,20,'test','test','2013-05-30 15:03:06',0,18,0),(19,22,'hi','招呼一下','2013-06-01 15:34:10',0,19,0),(19,22,'hi','招呼而已','2013-06-01 15:34:38',1,20,0),(19,NULL,NULL,'在说些什么嘛','2013-06-13 14:14:42',0,21,7);
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
-- Table structure for table `ord`
--

DROP TABLE IF EXISTS `ord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `addr` tinyint(4) NOT NULL DEFAULT '0',
  `info` tinytext,
  `seller` int(10) unsigned NOT NULL DEFAULT '0',
  `item_id` int(10) unsigned NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `state` tinyint(4) NOT NULL DEFAULT '0',
  `ordor` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`seller`),
  KEY `item_id` (`item_id`),
  KEY `state` (`state`),
  KEY `ordor` (`ordor`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ord`
--

LOCK TABLES `ord` WRITE;
/*!40000 ALTER TABLE `ord` DISABLE KEYS */;
INSERT INTO `ord` VALUES (1,0,'ç‰©ç¾Žä»·å»‰;191374326227.jpg|191374326217.jpg|191374325085.jpg;13.00;1;é¢œè‰²:çº¢è‰²;å¤§å°:18å·éž‹å­',19,40,'2013-07-29 06:12:42',0,19),(2,0,'物美价廉;191374326227.jpg|191374326217.jpg|191374325085.jpg;13.00;1;红色|18号鞋子',19,40,'2013-07-29 06:16:26',0,19);
/*!40000 ALTER TABLE `ord` ENABLE KEYS */;
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
  `lng` double(10,7) DEFAULT '0.0000000',
  `lat` double(10,7) DEFAULT '0.0000000',
  `impress` text,
  `operst` time NOT NULL DEFAULT '09:00:00',
  `opered` time NOT NULL DEFAULT '17:00:00',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_photo` (`user_photo`),
  KEY `contra` (`contract1`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (19,'tianyi','123',1,'2013-05-07','1368191608.jpg',NULL,'2013-07-29','','','12;12;12','13648044299','',0,0,103.9347430,30.7563300,NULL,'00:00:00','00:00:00'),(20,'tianyi2','123',2,'2013-05-07','1367920625.jpg',NULL,'2013-06-11','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',1,0,103.9347430,30.7593300,NULL,'00:00:00','00:00:00'),(21,'unasm4','1',2,'2013-05-08','1368015653.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','我是管理员','12346789233','douunasm@gmail.com',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(22,'123','123',2,'2013-05-08','edianlogo.jpg',NULL,'2013-06-20','','','','13648044299','',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(23,'tianyi12','123',2,'2013-05-10','edianlogo.jpg',NULL,'2013-05-10','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','大红花','13648044299','',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(24,'temp','123',2,'2013-05-10','edianlogo.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','asdasdf','13648044299','asd',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(25,'yitian','123',2,'2013-05-10','1368184077.jpg',NULL,'2013-05-10','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(26,'unasm','123',1,'2013-06-11','1370935219.jpg',NULL,'2013-06-11','douunasm@gmail.com','china','顾客就是上课','13648044299','1264310280',0,0,NULL,0.0000000,NULL,'00:00:00','00:00:00'),(27,'abc','abc',1,'2013-06-20','edianlogo.jpg',NULL,'2013-07-02','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0,103.9371170,30.7576070,NULL,'00:00:00','00:00:00'),(28,'abcd','abc',1,'2013-06-20','1371714431.jpg',NULL,'2013-06-20','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','为人民服务','13648044299','',0,0,103.9370940,30.7574480,NULL,'00:00:00','00:00:00'),(29,'bbb','abc',1,'2013-06-20','edianlogo.jpg',NULL,'2013-06-20','','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299','',0,0,103.9353280,30.7563960,NULL,'00:00:00','00:00:00');
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

-- Dump completed on 2013-07-29 16:47:47
