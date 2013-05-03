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
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `art`
--

LOCK TABLES `art` WRITE;
/*!40000 ALTER TABLE `art` DISABLE KEYS */;
INSERT INTO `art` VALUES (31,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325322,102,0,0,1,100000,'edianlogo.jpg'),(32,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325224,4,0,0,1,100000,'edianlogo.jpg'),(33,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1,100000,'edianlogo.jpg'),(34,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1,100000,'edianlogo.jpg'),(35,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325225,9,0,0,1,100000,'edianlogo.jpg'),(36,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325225,7,0,0,1,100000,'edianlogo.jpg'),(37,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,0,0,0,1,100000,'edianlogo.jpg'),(38,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325221,26,0,0,1,100000,'edianlogo.jpg'),(39,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:21',1,1353325222,5,0,0,1,100000,'edianlogo.jpg'),(40,'这里是标题，测试5','<p>\n	zhlkeihaiosdghoiashjdfoi在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',2,'2012-11-19 19:40:22',1,1353325221,45,0,0,1,100000,'edianlogo.jpg'),(41,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(42,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,1,0,0,1,100000,'edianlogo.jpg'),(43,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(44,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:20',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(45,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325341,1,0,0,1,100000,'edianlogo.jpg'),(46,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(47,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(48,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(49,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(50,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325341,1,0,0,1,100000,'edianlogo.jpg'),(51,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(52,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(53,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,1,0,0,1,100000,'edianlogo.jpg'),(54,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-11-19 19:42:21',1,1353325340,0,0,0,1,100000,'edianlogo.jpg'),(55,'这里是标题，测试6','<p>\n	阿斯兰房间里阿斯顿 alksdjfl a sdflkjalkds lasd flkasdfklajsdfkl a在联合国iALKSDFJLKAJSDFLK&nbsp;</p>\n',1,'2012-12-04 09:17:03',3,1353325340,1,0,0,1,100000,'edianlogo.jpg'),(56,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,'2013-03-28 18:19:46',1,123,15,0,0,1,100000,'edianlogo.jpg'),(57,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364466175,3,1,0,1,100000,'edianlogo.jpg'),(58,'这里是锤子rom新闻发布会现场','这里是锤子rom第二新闻发布会现场<br />			',1,NULL,1,1364467033,14,2,1,13,100000,'edianlogo.jpg'),(59,'妖精的尾巴的精彩图片','<p><img src=\"http://www.edian.cn/./upload//month_1303/201303281849292680.png\" alt=\"\" /></p><p>可以看到图片，就是对的，不然就是除了差错，这个是关于上传图片的测试</p>',1,NULL,1,1364468077,255,2,0,13,100000,'edianlogo.jpg'),(60,'标题','							',2,'2013-04-22 20:33:36',13,1366634017,2,0,0,13,100000,'edianlogo.jpg'),(61,'普京访问中国','普京访问中国<!--\n				-->',1,'2013-04-22 21:19:30',13,1366636770,1,0,0,13,100000,'edianlogo.jpg'),(63,'我想做美国总统','我想做美国总统',1,'2013-04-22 21:30:57',13,1366637460,3,0,0,13,100000,'edianlogo.jpg'),(65,'标题党，不解释','<!--\n				-->\n	asdfasdf asdf 三法司的 阿斯蒂芬阿第三法宋代的',1,'2013-04-22 21:43:49',13,1366638235,41,2,0,1,100000,'edianlogo.jpg'),(67,'标题','我们解放吧',1,'2013-04-22 21:46:26',13,1366638386,2,0,0,13,100000,'edianlogo.jpg'),(71,'今天看电影去了，','好激动，有木有',1,'2013-04-23 18:53:27',1,1366714445,39,0,0,1,100000,'edianlogo.jpg'),(72,'标题','',1,'2013-04-23 19:03:54',1,1366715034,1,0,0,1,100000,'edianlogo.jpg'),(73,'测试中，','',1,'2013-04-24 09:33:43',13,1366767227,6,0,0,13,100000,'edianlogo.jpg'),(74,'淫荡的一天又过去了','什么淫荡的事情都没有做<img src=\"http://www.edian.cn/upload/month_1304/201304241037571960.jpg\" width=\"250\" height=\"200\" alt=\"\" />',1,'2013-04-24 10:38:23',13,1366771118,17,1,0,13,100000,'edianlogo.jpg'),(75,'心跳的感觉，人家恋爱了','恩，如题',1,'2013-04-24 12:35:45',1,1366778173,46,1,1,13,100000,'edianlogo.jpg'),(76,'do you hear the people sing?','<p>Do you hear people sing?</p><p>Singing a song of angry men?</p><p>it is a music a of people</p><p>who will not be slaves again!</p><p>when the beating of your heart</p><p>Echoes the beating of the drums</p><p>There is a life about to start</p><p>When tomorrow comes!</p><p>will you join in our crusade?</p><p>Beyond the barricade</p><p>Is there a world you long to see?</p><p>Then join in the fight</p><p>That will give you the right to be be free!</p><p>Do you hear the people sing?</p><p>Singing a song of angry men?</p><p>It is the music of a people</p><p>who will not be slaves again!</p><p>when the beating of your heart</p><p>Echoes the beating of the frums&nbsp;</p><p>there is a life about to start</p><p>when tomorrow comes!</p><p>will you give all can give</p><p>&nbsp;so that our banner may advance</p><p>Some will fall and some will live</p><p>Will you stand up and take your chance?</p><p>The blood of the martyrs</p><p>Will water the meadows of France!</p><p>Do you hear the people sing?</p><p>Singing a song of angry &nbsp;men?</p><p>Tt is the music of a people</p><p>who will not be slaves again!</p><p>When the beating of your heart.</p><p>Echoes the beating of the drums</p><p>There is a life about to start</p><p>When tomorrow comes!</p>',1,'2013-04-24 13:18:05',13,1366780725,40,0,0,13,100000,'edianlogo.jpg'),(77,'我们关于明天的报告->“私下报告”','其实就是哈哈哈哈讲几个而已',1,'2013-04-28 13:26:41',13,1367126821,20,0,0,13,100000,'edianlogo.jpg'),(78,'do you hear the people sing?','<p>Do you hear the people sing lost in the vally of the night</p><p>It is the music of a people who are climbing to the light</p><p>For the wretched of the earth,there is a flame that never dies</p><p>Even the darkest night will end and the sun will rise</p><p>We will live again in freedom in the garden of the lord</p><p>We will walk behind the ploughshare,we will put away the sword</p><p>The chain will be broken and all men will have their reward</p><p>will you join in our cursade who will be strong and stand with me?</p><p>Somewhere beyond the barricade is the a world you long to see?</p><p>Do you hear the people sing ? Say,do you hear the distant drums?</p><p>It is the future that they bring &nbsp;when tomorrow comes!</p><p>Will you join in our crusade who will be strong and stand with me?</p><p>&nbsp;Somewhere beyond the barricade is there a world you long to see?</p><p>Do you hear the people sing?Say,do you hear the distant drums?</p><p>It is the future that we bring when tomorrow comes!</p><p>Tomorrow comes!</p>',4,'2013-04-30 00:38:47',14,1367253535,8,0,0,14,NULL,'edianlogo.jpg'),(79,'','',1,'2013-05-01 10:30:24',1,1367375427,3,0,0,1,NULL,'edianlogo.jpg'),(80,'哈哈哈哈，打折了，优惠了，上好的东西哦','标题党路过',2,'2013-05-01 16:27:09',1,3,3,0,0,0,23,'11367396829.jpg'),(81,'上好的锅贴，一块钱一张','你知道锅贴是什么意思吗？哈哈哈',1,'2013-05-01 16:28:25',1,1367396974,69,0,0,0,1,'11367396905.jpg'),(82,'erwerqwe','',1,'2013-05-01 19:40:53',1,1367408457,4,0,0,0,12,''),(83,'asdfasd','',1,'2013-05-01 19:41:31',1,1367408497,6,0,0,0,12,''),(84,'sdas','',1,'2013-05-01 19:42:50',1,1367408571,1,0,0,0,12,''),(85,'rgb(44, 44, 44)','<span style=\"font-family: \'dejavu sans mono\', monospace; font-size: 11px;\">rgb(44, 44, 44)</span><br />',1,'2013-05-01 20:19:15',1,1367410756,1,0,0,0,12,'11367410754.jpg'),(86,'活人大甩卖了','我买的是自己，哈哈哈，求保养',1,'2013-05-01 20:54:40',1,1367412946,66,0,0,0,15,''),(87,'再次甩卖自己','我买的是自己，哈哈哈，求保养<br />',1,'2013-05-01 21:06:12',1,1367413812,230,1,1,13,1,'edianlogo.jpg');
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
INSERT INTO `ci_sessions` VALUES ('9600f5f87b0e71f0b2270ccb3fd99d42','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597961,''),('d694b36b9a3f2a6bcf259ca85b05a139','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367598279,''),('d4b3b04cec70cb79f38766c2b9da60e8','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367598361,''),('e79b5c76bf4c64a8b70a5e10292564f9','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367598371,''),('6ffea29634ddb42ba2ab4875cce75e16','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597825,''),('af437cb110dc441889c62806974acfe7','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597930,''),('3b9f480b5c01c7366f0cde5e328ef328','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597948,''),('0f73a51b30934000546d023dc9432839','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597820,''),('5945a9a834f3776ebc30368a6ed2f82b','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597818,''),('1d5ed21323355e5751710b4a31272d6f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597802,''),('d3e42e460bdd860276f446acca2ffaf7','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367597557,''),('2bb322eff7915806f541742a2ece4ee5','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601109,''),('1ad0c981951b65c1c545b3ae013b0241','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601495,''),('dfef336988788bad4cdcb81a6c77c23c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601535,''),('21aed48b8fff4796f11852db04dd03fa','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601539,''),('4e86a3a1d07da0d27b7561daee5f15e7','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601540,''),('a87dc0285e46be2a622d38bcc4049a03','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601549,''),('add7f8b0d99a256e7c878be4be2b9efd','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601558,''),('e237dd3db7655284d213bb712605a22c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601564,''),('0d63ade4e62e5a6efc0bb21d136c0ee3','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601566,''),('38e98c7cb07aeef7be83e8f526de13a1','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601859,''),('3fb76aa61e9e63ba4ee0b3c8d7a6b5a2','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601860,''),('36e380363655739e81e5fb186e8a44b1','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601884,''),('39f7fd19b0194811901180f59c82b306','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601885,''),('cb764543c27112f2af1cd81899f2caf2','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601885,''),('555015c8b4e0b1eb0da3916ba7e8170e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601885,''),('d29830e226efc1ed92e6b3b4671db099','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601886,''),('f44453bfcd3aa9e72f023df57935fdc9','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367602032,''),('928f1d7eb0852172be8988d03d8783e9','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367602077,''),('2e4043e66fe8c4d2f38766bd3f79c2d0','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367602077,''),('25c6e959796cc96c8d5b88fe766da679','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367602183,''),('c8c79ffa1edb1ae40b6ddaed38122fe0','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601075,'a:4:{s:9:\"user_data\";s:0:\"\";s:7:\"user_id\";s:2:\"13\";s:9:\"user_name\";s:6:\"unasm4\";s:6:\"passwd\";s:1:\"1\";}'),('07c4280cea24a360fd8734019b9c8275','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599665,''),('e584ac407090e227c3223eb081ce89e9','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599702,''),('b439b61b72765e8129db163cc0449371','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599708,''),('fa7a463e72c3492539397a6bff3646dd','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599746,''),('0b1e0245963b01839724f2d46c6c6476','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599821,''),('32001dd0d1b8c2692ac315c3b641384c','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599859,''),('145b582e8e4ca26a63317f0491c6048f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599873,''),('0482363127c15859f3a4fd740dbdd2fb','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599877,''),('4936928007079c63ee48b8c420ece63e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599989,''),('dc851d4fffce87dd88b71c747deb830f','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367599993,''),('84307da8d797466899aec787c8e86aa6','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600013,''),('ec0e90e360b8058ffb37dc4cca63a4cd','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600075,''),('462d4ed0e3d0c55acb32d2d26d6e4cc8','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600096,''),('870e2b579829a69d93f9e4df90ce3d8a','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600100,''),('7a4063e7155e34f410cba5f48d30c8ab','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600117,''),('50f6f5707afec8e4c562ac83de7eaa9d','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600131,''),('ffe7aa9879851a617fbecde51049fb5e','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367600139,''),('28ed3bc735c0905c69a714e453418b90','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601076,''),('b897ea9c7b92fa82e8922cd6ef0ecb45','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601079,''),('3a3c52f61d3a52929e5f17cffea8e394','127.0.0.1','Mozilla/5.0 (X11; Linux i686) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22',1367601096,'');
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
) ENGINE=MyISAM AUTO_INCREMENT=180 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES ('testing','2012-12-09 03:31:10',NULL,1,0),('sdf[face:15]','2012-12-09 05:03:39',1,2,0),('asdfasdf[face:55]','2012-12-09 05:04:59',4294967295,3,0),('asdfasdf[face:30]','2012-12-09 05:11:53',4,6,0),('[face:41]','2012-12-09 05:12:01',4,7,0),('[face:29]','2013-03-11 00:52:04',4,8,0),('[face:15]','2013-03-11 00:52:09',4,9,0),('[face:41]','2013-03-11 00:52:13',4,10,0),('我其实是来打酱油的','2013-04-07 13:12:19',1,169,40),('              呵呵，笑而不语','2013-04-06 12:55:55',1,168,38),('错了，是my glod','2013-04-06 12:54:34',1,167,38),('大家好，沙发是我的了，哈哈哈','2013-04-06 11:34:08',1,161,38),('oh my gold......','2013-04-06 12:53:55',1,166,38),('[face:11]','2013-04-02 12:03:56',1,159,35),('第五次测试[face:11]','2013-03-27 14:02:47',1,158,35),('asdfasd[face:11]','2013-03-27 13:51:29',1,157,35),('asdfas啊份额的','2013-03-27 12:59:25',1,156,35),('楼上的，小声点','2013-04-06 12:36:26',1,165,38),('asdfas啊份额的','2013-03-27 12:29:29',1,153,35),('asdfs 我们都有一个共同的世界哦','2013-04-06 12:35:45',1,164,38),('2013-4-6 20:27:32 ,这个时间发生了什么事情呢','2013-04-06 12:34:24',1,163,38),('你也太搞笑了','2013-03-16 12:31:12',1,115,2),('你也太搞笑了','2013-03-16 12:47:34',1,116,31),('阿斯的发送的','2013-03-17 16:13:24',1,145,32),('sdfsdf[face:15]特斯能够','2013-03-17 16:13:02',1,144,32),('asdfasdf','2013-04-06 11:40:19',1,162,38),('sdfasdf[face:15]','2013-03-17 17:47:06',1,146,32),('不知道为什么，总是觉得，像一个笑话，呵呵','2013-04-08 13:04:33',1,170,57),('','2013-04-10 08:09:53',0,171,4),('我看发布会就是一个锤子[face:11][face:11][face:11]','2013-04-21 12:26:29',1,172,58),('一楼说话小心点了，人家老罗好歹也算用心做了','2013-04-21 12:29:08',13,173,58),('完全不知道在说什么，果然标题党','2013-04-22 15:58:40',1,174,65),('不过也是喜闻乐见了，记者什么的不都是这么干吗，唉，只能说是世风日下，人心不古了，悲哀哦。。','2013-04-22 16:05:43',1,175,65),('喜闻乐见[face:11][face:11][face:11][face:11]','2013-04-24 02:39:36',13,176,74),('知道了。','2013-04-24 04:59:56',13,177,75),('最喜欢露西了，哈哈哈[face:11][face:11]','2013-04-24 15:36:32',13,178,59),('哦，哈哈哈哈，姿色如何','2013-05-03 08:26:44',13,179,87);
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
INSERT INTO `img` VALUES (48,1,'11365771647.jpg','5.png','2013-04-12 21:00:48',''),(49,1,'11365771657.jpg','1.png','2013-04-12 21:00:57',''),(50,1,'11365771805.jpg','2.png','2013-04-12 21:03:25',''),(51,1,'11365771811.jpg','3.png','2013-04-12 21:03:31',''),(52,1,'11365771817.jpg','4.png','2013-04-12 21:03:37',''),(53,1,'11365771830.jpg','6.png','2013-04-12 21:03:51',''),(54,1,'11365771836.jpg','7.png','2013-04-12 21:03:57',''),(55,1,'11365771842.jpg','8.png','2013-04-12 21:04:02',''),(56,1,'11365771855.jpg','9.png','2013-04-12 21:04:15',''),(57,1,'11365771861.jpg','10.png','2013-04-12 21:04:22',''),(58,1,'11365771882.jpg','11.png','2013-04-12 21:04:43',''),(59,1,'11365771889.jpg','12.png','2013-04-12 21:04:49',''),(60,1,'11366117523.jpg','010_20112.png','2013-04-16 21:05:23','这个是千手柱间回忆他和斑的过去恩怨情愁的图片'),(61,1,'11366422294.jpg','angle.jpg','2013-04-20 09:44:55',''),(62,0,'1366428303.jpg','1366428303.jpg','2013-04-20 11:25:03',''),(63,0,'1367243124.jpg','1367243124.jpg','2013-04-29 21:45:25',''),(64,0,'1367243904.jpg','1367243904.jpg','2013-04-29 21:58:25',''),(65,0,'1367243965.jpg','1367243965.jpg','2013-04-29 21:59:25',''),(66,0,'1367244075.jpg','1367244075.jpg','2013-04-29 22:01:15',''),(67,0,'1367244116.jpg','1367244116.jpg','2013-04-29 22:01:56',''),(68,14,'141367319683.jpg','20121204200343_85692.jpg','2013-04-30 19:01:23',''),(69,14,'141367322950.jpg','2e8d37a8a1d82077c9b636587ab6db94.jpg','2013-04-30 19:55:50',''),(70,14,'141367323009.jpg',')sdfa?>,.jpg','2013-04-30 19:56:49',''),(71,1,'11367390109.jpg','54704062201304031009509563939522820_009.jpg','2013-05-01 14:35:10','');
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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,1,'测试内容','testing','2013-03-31 07:01:23',0,1,0),(1,1,'测试内容','testing','0000-00-00 00:00:00',0,2,0),(13,13,'我想给unasm先生表白','<p>try is a friend!!</p><p>I &nbsp;roll downthe window.</p><p>I\' m a sucker for his charm</p><p>Trouble is a friend&nbsp;</p><p>yeah trouble is a friend of mine</p><p>Ahh</p><p>Ohh&nbsp;</p><p>Ahh&nbsp;</p><p>Ohh</p>','2013-04-27 13:46:24',1,8,0),(1,2,'never foget our faith','never foget our faith<br />','2013-04-02 12:51:48',0,6,0),(2,1,'你好，我们好久没有见面了，想我了吗','其实开玩笑的','2013-04-03 09:21:56',0,7,0),(13,NULL,NULL,'asdfasdf','2013-04-28 13:52:52',0,9,8),(13,NULL,NULL,'当真向表白[face:11][face:11]','2013-04-28 14:04:33',0,10,8),(13,NULL,NULL,'我们不分离，我们手牵手','2013-04-28 15:00:43',0,11,8),(13,NULL,NULL,'我们拥有相同的未来','2013-04-28 15:01:32',0,12,8),(13,NULL,NULL,'标示围观中','2013-04-28 17:35:01',0,13,8),(13,NULL,NULL,'同样为观众','2013-04-28 17:39:44',0,14,8),(13,NULL,NULL,'唉，水人','2013-04-28 17:41:01',0,15,8),(1,1,'biadadsfasd','内容哦asdfasd','2013-05-03 07:41:52',0,18,0),(13,1,'我不想给自己写信了','其实，给自己写信是一个很无聊的行动，无论是写给现在的自己，还是将来的自己，如果可以，就把信寄给过去的自己，或许可以改变现在或者将来的自己','2013-04-29 06:46:11',0,17,0),(1,1,'我们在测试哦','内容哦asdfasd','2013-05-03 07:43:44',0,19,0),(1,1,'dasdfa','sadfasdf阿斯的发三','2013-05-03 08:11:18',0,20,0),(1,1,'abc','asdfasd','2013-05-03 08:14:13',0,21,0),(1,1,'abc','asdfasd','2013-05-03 08:14:17',0,22,0),(1,1,'终极测试','终极大四的','2013-05-03 08:17:34',0,23,0),(13,1,'我们一起发财去吧','哈哈哈哈哈','2013-05-03 08:25:39',0,24,0);
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
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `user_photo` (`user_photo`),
  KEY `contra` (`contract1`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'tianyi','tianyi',1,'2013-03-11','edianlogo.jpg',0,'2013-05-01','1264310280@qq.com','西源大道2006号','未填写','13648044299','未填写'),(2,'老大','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','我可是相当厉害的人哦','13648044299','未填写'),(3,'123','202cb962ac59075b964b07152d234b70',2,'2013-03-30','edianlogo.jpg',NULL,NULL,'未填写','未填写','未填写','13648044299','未填写'),(4,'unasm','f53a4134f2762557b698e0ed2af6f6a6',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','douunasm@gmail.com','四川电子科大','呵呵，其实我就是一个水人','13648044299','未填写'),(5,'tianyi2','f53a4134f2762557b698e0ed2af6f6a6',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','其实我就是一个水人呢','13648044299','未填写'),(6,'tianyi3','f53a4134f2762557b698e0ed2af6f6a6',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','呵呵','13648044299','未填写'),(7,'tianyi4','1992824dou',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','我还是一如既往的呵呵^^','13648044299','未填写'),(8,'tianyi5','1992824dou',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','hehe','13648044299','未填写'),(9,'tianyi6','123',2,'2013-04-19','edianlogo.jpg',NULL,'2013-04-19','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','未填写','13648044299','未填写'),(10,'tianyi7','123',2,'2013-04-20','edianlogo.jpg',NULL,'2013-04-20','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','未填写','13648044299','未填写'),(11,'tianyi8','1',2,'2013-04-20','edianlogo.jpg',NULL,'2013-04-20','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','未填写','13648044299','未填写'),(12,'unasm1','1',2,'2013-04-20','edianlogo.jpg',NULL,'2013-04-20','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','未填写','13648044299','未填写'),(13,'unasm4','1',2,'2013-04-20','1366428454.jpg',NULL,'2013-05-03','douunasm@gmail.com','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','','13648044299',''),(14,'我们的中国新abc_dc','1',2,'2013-04-27','1367254184.jpg',NULL,'2013-04-30','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','其实我还是喜欢一个人走路','13648044299','未填写'),(15,'test','test',2,'2013-04-29','',NULL,'2013-04-29','未填写','成都市西源大道2006号电子科技大学电工学院本科20栋404房间','不需要自我介绍了吧','13648044299','未填写'),(16,'abc','a',2,'2013-05-02','1367496927.jpg',NULL,'2013-05-02','','','','12346789233','');
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

-- Dump completed on 2013-05-04  1:30:58
