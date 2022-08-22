-- MySQL dump 10.13  Distrib 8.0.11, for Win64 (x86_64)
--
-- Host: localhost    Database: chat
-- ------------------------------------------------------
-- Server version	8.0.11

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chatgroups`
--

DROP TABLE IF EXISTS `chatgroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `chatgroups` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `gname` varchar(20) NOT NULL,
  `gpic` varchar(50) DEFAULT NULL,
  `ctime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatgroups`
--

LOCK TABLES `chatgroups` WRITE;
/*!40000 ALTER TABLE `chatgroups` DISABLE KEYS */;
INSERT INTO `chatgroups` VALUES (1,'聊天群','/assets/mini-pics/01.jpg',NULL),(2,'聊天群1','/assets/mini-pics/timg-20220111102757.jpeg',NULL);
/*!40000 ALTER TABLE `chatgroups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emoji`
--

DROP TABLE IF EXISTS `emoji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `emoji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emoji`
--

LOCK TABLES `emoji` WRITE;
/*!40000 ALTER TABLE `emoji` DISABLE KEYS */;
INSERT INTO `emoji` VALUES (1,'微笑','/assets/gif/0.gif'),(2,'撇嘴','/assets/gif/1.gif'),(3,'色','/assets/gif/2.gif'),(4,'发呆','/assets/gif/3.gif'),(5,'得意','/assets/gif/4.gif'),(6,'流泪','/assets/gif/5.gif'),(7,'害羞','/assets/gif/6.gif'),(8,'闭嘴','/assets/gif/7.gif'),(9,'睡','/assets/gif/8.gif'),(10,'大哭','/assets/gif/9.gif'),(11,'尴尬','/assets/gif/10.gif'),(12,'发怒','/assets/gif/11.gif'),(13,'调皮','/assets/gif/12.gif'),(14,'呲牙','/assets/gif/13.gif'),(15,'惊讶','/assets/gif/14.gif'),(16,'难过','/assets/gif/15.gif'),(17,'酷','/assets/gif/16.gif'),(18,'冷汗','/assets/gif/17.gif'),(19,'抓狂','/assets/gif/18.gif'),(20,'吐','/assets/gif/19.gif'),(21,'偷笑','/assets/gif/20.gif'),(22,'可爱','/assets/gif/21.gif'),(23,'白眼','/assets/gif/22.gif'),(24,'傲慢','/assets/gif/23.gif'),(25,'饥饿','/assets/gif/24.gif'),(26,'困','/assets/gif/25.gif'),(27,'惊恐','/assets/gif/26.gif'),(28,'流汗','/assets/gif/27.gif'),(29,'憨笑','/assets/gif/28.gif'),(30,'大兵','/assets/gif/29.gif'),(31,'奋斗','/assets/gif/30.gif'),(32,'咒骂','/assets/gif/31.gif'),(33,'疑问','/assets/gif/32.gif'),(34,'嘘','/assets/gif/33.gif'),(35,'晕','/assets/gif/34.gif'),(36,'折磨','/assets/gif/35.gif'),(37,'衰','/assets/gif/36.gif'),(38,'骷髅','/assets/gif/37.gif'),(39,'敲打','/assets/gif/38.gif'),(40,'再见','/assets/gif/39.gif'),(41,'擦汗','/assets/gif/40.gif'),(42,'抠鼻','/assets/gif/41.gif'),(43,'鼓掌','/assets/gif/42.gif'),(44,'糗大了','/assets/gif/43.gif'),(45,'坏笑','/assets/gif/44.gif'),(46,'左哼哼','/assets/gif/45.gif'),(47,'右哼哼','/assets/gif/46.gif'),(48,'哈欠','/assets/gif/47.gif'),(49,'鄙视','/assets/gif/48.gif'),(50,'委屈','/assets/gif/49.gif'),(51,'快哭了','/assets/gif/50.gif'),(52,'阴险','/assets/gif/51.gif'),(53,'亲亲','/assets/gif/52.gif'),(54,'吓','/assets/gif/53.gif'),(55,'可怜','/assets/gif/54.gif'),(56,'菜刀','/assets/gif/55.gif'),(57,'西瓜','/assets/gif/56.gif'),(58,'啤酒','/assets/gif/57.gif'),(59,'篮球','/assets/gif/58.gif'),(60,'乒乓','/assets/gif/59.gif'),(61,'咖啡','/assets/gif/60.gif'),(62,'饭','/assets/gif/61.gif'),(63,'猪头','/assets/gif/62.gif'),(64,'玫瑰','/assets/gif/63.gif'),(65,'凋谢','/assets/gif/64.gif'),(66,'示爱','/assets/gif/65.gif'),(67,'爱心','/assets/gif/66.gif'),(68,'心碎','/assets/gif/67.gif'),(69,'蛋糕','/assets/gif/68.gif'),(70,'闪电','/assets/gif/69.gif'),(71,'炸弹','/assets/gif/70.gif'),(72,'刀','/assets/gif/71.gif'),(73,'足球','/assets/gif/72.gif'),(74,'瓢虫','/assets/gif/73.gif'),(75,'便便','/assets/gif/74.gif'),(76,'月亮','/assets/gif/75.gif'),(77,'太阳','/assets/gif/76.gif'),(78,'礼物','/assets/gif/77.gif'),(79,'拥抱','/assets/gif/78.gif'),(80,'强','/assets/gif/79.gif'),(81,'弱','/assets/gif/80.gif'),(82,'握手','/assets/gif/81.gif'),(83,'胜利','/assets/gif/82.gif'),(84,'抱拳','/assets/gif/83.gif'),(85,'勾引','/assets/gif/84.gif'),(86,'拳头','/assets/gif/85.gif'),(87,'差劲','/assets/gif/86.gif'),(88,'爱你','/assets/gif/87.gif'),(89,'不','/assets/gif/88.gif'),(90,'好','/assets/gif/89.gif'),(91,'爱情','/assets/gif/90.gif'),(92,'飞吻','/assets/gif/91.gif'),(93,'跳跳','/assets/gif/92.gif'),(94,'发抖','/assets/gif/93.gif'),(95,'怄火','/assets/gif/94.gif'),(96,'转圈','/assets/gif/95.gif'),(97,'磕头','/assets/gif/96.gif'),(98,'回头','/assets/gif/97.gif'),(99,'跳绳','/assets/gif/98.gif'),(100,'挥手','/assets/gif/99.gif'),(101,'激动','/assets/gif/100.gif'),(102,'街舞','/assets/gif/101.gif'),(103,'献吻','/assets/gif/102.gif'),(104,'左太极','/assets/gif/103.gif'),(105,'右太极','/assets/gif/104.gif');
/*!40000 ALTER TABLE `emoji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `friends` (
  `fid` int(11) NOT NULL AUTO_INCREMENT,
  `apply` int(11) DEFAULT NULL,
  `receive` int(11) DEFAULT NULL,
  `ftime` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `refused` tinyint(1) DEFAULT '0',
  `uRead` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (5,1,3,'2021-12-10 03:21:55',1,0,1),(19,1,5,'2021-12-16 06:32:31',1,0,1),(21,1,2,'2021-12-16 06:31:26',1,0,1),(42,2,3,'2021-12-20 07:28:47',1,0,1),(43,3,5,'2021-12-20 07:28:09',1,0,1),(44,2,5,'2021-12-20 11:44:43',1,0,1),(64,4,3,'2021-12-26 08:02:46',1,0,1),(66,2,4,'2021-12-26 08:03:52',1,0,1),(89,6,1,NULL,0,1,1),(109,1,7,NULL,0,0,1),(110,4,7,NULL,0,0,1),(111,5,7,NULL,0,0,1),(112,6,7,NULL,0,0,1);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `members` (
  `mbid` int(11) NOT NULL AUTO_INCREMENT,
  `mbuid` int(11) DEFAULT NULL,
  `mbgid` int(11) DEFAULT NULL,
  `isRead` tinyint(1) DEFAULT '0',
  `jtime` varchar(50) DEFAULT NULL,
  `uRead` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`mbid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (1,1,1,1,NULL,0),(2,3,1,1,NULL,0),(3,4,1,1,NULL,0),(4,2,1,1,'2021-12-14 05:46:25',0),(5,1,2,1,NULL,0),(6,2,2,1,NULL,0),(11,6,2,0,'2022-01-17 10:41:51',0);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `msg` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `send` int(11) NOT NULL,
  `receive` int(11) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `mtime` varchar(20) NOT NULL,
  `isRead` tinyint(1) DEFAULT '0',
  `mtype` tinyint(1) DEFAULT '0',
  `mpic` varchar(255) DEFAULT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mfile` varchar(255) DEFAULT NULL,
  `fsize` int(11) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msg`
--

LOCK TABLES `msg` WRITE;
/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` VALUES (1,1,2,'你好','2022-01-29 03:18:45',1,0,NULL,NULL,NULL,NULL),(2,1,2,'在吗','2022-01-29 03:29:23',1,0,NULL,NULL,NULL,NULL),(3,2,2,'有人吗','2022-01-29 03:29:43',0,1,NULL,NULL,NULL,NULL),(4,1,2,'看看这个怎么样','2022-01-31 06:21:10',1,0,NULL,NULL,NULL,NULL),(5,1,2,'111','2022-01-31 06:21:38',1,0,'/assets/mini-pics/14_1184_7-20220126110303.jpg',NULL,NULL,NULL),(6,1,2,'222333','2022-01-31 06:21:38',1,0,NULL,NULL,NULL,NULL),(7,1,3,'你看这张图怎么样','2022-01-31 06:54:49',1,0,'/assets/mini-pics/14_1187-20220127094948.jpg',NULL,NULL,NULL),(8,3,1,'111','2022-01-31 06:55:18',1,0,'/assets/mini-pics/14_1184_7-20220126110303.jpg',NULL,NULL,NULL),(9,3,1,'222333','2022-01-31 06:55:18',1,0,'/assets/mini-pics/14_1184_10-20220126110338.jpg',NULL,NULL,NULL),(10,1,3,'333','2022-01-31 06:56:33',1,0,'/assets/mini-pics/14_1189_3-20220129121014.jpg',NULL,NULL,NULL),(11,1,3,'222111','2022-01-31 06:56:33',1,0,'/assets/mini-pics/14_1189_10-20220127094948.jpg',NULL,NULL,NULL),(12,3,1,'666','2022-01-31 07:00:03',1,0,'/assets/mini-pics/big_9318-20220113105019.jpg',NULL,NULL,NULL),(13,3,1,'777888','2022-01-31 07:00:03',1,0,'/assets/mini-pics/ani_24-20220110093233.jpg',NULL,NULL,NULL),(14,1,5,'看看这张图怎么样','2022-01-31 07:04:04',1,0,'/assets/mini-pics/14_1184_10-20220126110338.jpg',NULL,NULL,NULL),(15,1,5,'111','2022-01-31 07:04:44',1,0,'/assets/mini-pics/ani_21-20220110095612.jpg',NULL,NULL,NULL),(16,1,5,'222','2022-01-31 07:04:44',1,0,'/assets/mini-pics/14_1187_13-20220127094948.jpg',NULL,NULL,NULL),(17,1,5,'333444','2022-01-31 07:04:44',1,0,'/assets/mini-pics/14_1187-20220127094948.jpg',NULL,NULL,NULL),(18,5,1,'还不错','2022-01-31 07:05:02',1,0,NULL,NULL,NULL,NULL),(19,5,1,'看看我这张','2022-01-31 07:05:22',1,0,'/assets/mini-pics/ADMIRA~1-20220111102706.JPG',NULL,NULL,NULL),(20,5,1,'还有这张','2022-01-31 07:06:21',1,0,'/assets/mini-pics/COLLARIS-20220113112640.JPG',NULL,NULL,NULL),(21,5,1,'以及这张','2022-01-31 07:06:21',1,0,'/assets/mini-pics/FIGHTF~1-20220113112338.JPG',NULL,NULL,NULL),(22,1,2,'你好','2022-02-04 04:52:30',1,0,NULL,NULL,NULL,NULL),(23,1,2,'111','2022-02-04 04:52:49',1,0,'/assets/mini-pics/14_1187-20220127094948.jpg',NULL,NULL,NULL),(24,1,2,'333555','2022-02-04 04:52:50',1,0,'/assets/mini-pics/14_1184_10-20220126110338.jpg',NULL,NULL,NULL),(28,1,5,'下午好😀😅','2022-02-06 01:45:33',1,0,NULL,NULL,NULL,NULL),(29,5,1,'🤡🤡🤡','2022-02-06 01:47:01',1,0,NULL,NULL,NULL,NULL),(33,1,5,'<img class=\"gif\" src=\"/assets/gif/1.gif\"><img class=\"gif\" src=\"/assets/gif/13.gif\">','2022-02-11 03:11:30',1,0,NULL,NULL,NULL,NULL),(34,1,5,'晚上好<img class=\"gif\" src=\"/assets/gif/16.gif\">','2022-02-11 05:43:13',1,0,NULL,NULL,NULL,NULL),(35,4,2,'hello<img class=\"gif\" src=\"/assets/gif/33.gif\">','2022-02-11 05:51:34',1,0,NULL,NULL,NULL,NULL),(36,2,4,'hi<img class=\"gif\" src=\"/assets/gif/21.gif\">','2022-02-11 05:52:23',1,0,NULL,NULL,NULL,NULL),(38,1,3,NULL,'2022-02-16 10:00:16',1,0,'/assets/mini-pics/pic009a-20220216100016.jpg',NULL,NULL,NULL),(39,1,1,NULL,'2022-02-18 01:17:10',0,1,'/assets/mini-pics/pic006a-20220218011710.jpg',NULL,NULL,NULL),(40,1,1,NULL,'2022-02-18 01:17:10',0,1,'/assets/mini-pics/pic007a-20220218011710.jpg',NULL,NULL,NULL),(41,1,1,NULL,'2022-02-18 01:17:10',0,1,'/assets/mini-pics/pic008a-20220218011710.jpg',NULL,NULL,NULL),(42,2,3,'hello<img class=\"gif\" src=\"/assets/gif/79.gif\"><img class=\"gif\" src=\"/assets/gif/80.gif\"><img class=\"gif\" src=\"/assets/gif/81.gif\"><img class=\"gif\" src=\"/assets/gif/82.gif\">','2022-02-18 01:19:37',1,0,NULL,NULL,NULL,NULL),(43,2,3,'你好😜🤡','2022-02-18 01:20:02',1,0,NULL,NULL,NULL,NULL),(46,1,2,'下午好啊','2022-02-18 02:15:19',1,1,NULL,NULL,NULL,NULL),(47,1,3,'早上好','2022-02-22 05:29:35',1,0,NULL,NULL,NULL,NULL),(48,1,3,'你们好啊','2022-02-22 05:29:50',1,0,NULL,NULL,NULL,NULL),(49,1,1,'大家好','2022-02-22 05:30:07',0,1,NULL,NULL,NULL,NULL),(50,1,5,'333','2022-02-22 12:44:34',1,0,NULL,NULL,NULL,NULL),(51,1,5,'666','2022-02-22 12:50:16',1,0,NULL,NULL,NULL,NULL),(53,1,3,'555','2022-02-22 01:22:54',1,0,NULL,'text.js','/assets/source/text-20220222012254.js',883),(54,3,1,'777','2022-02-22 01:23:43',1,0,NULL,'index.html','/assets/source/index-20220222012343.html',611),(55,1,3,'333','2022-02-22 01:39:07',1,0,NULL,'jquery.js','/assets/source/jquery.js',299459),(56,1,3,'hfhdhqjoeejhoihpnpajosgagpsgjapgnanbnapsbjcxbccxmnbneowaifsfsajfkp[k','2022-02-22 03:34:17',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(57,1,2,NULL,'2022-02-27 02:19:45',1,1,'/assets/mini-pics/14_1184_7-20220126110303.jpg',NULL,NULL,NULL),(58,1,2,NULL,'2022-02-27 02:19:56',1,1,'/assets/mini-pics/14_1187-20220127094948.jpg',NULL,NULL,NULL),(60,1,2,NULL,'2022-02-27 02:20:36',1,1,'/assets/mini-pics/14_1189_10-20220127094948.jpg',NULL,NULL,NULL),(61,1,2,NULL,'2022-02-27 02:20:36',1,1,'/assets/mini-pics/ani_22-20211207033131.jpg',NULL,NULL,NULL),(62,1,2,'你们好','2022-02-27 02:50:18',1,1,NULL,NULL,NULL,NULL),(63,3,1,'你们好','2022-02-27 02:51:08',1,1,NULL,NULL,NULL,NULL),(64,1,1,'下午好','2022-02-27 02:51:55',0,1,NULL,NULL,NULL,NULL),(65,1,1,NULL,'2022-02-27 02:54:33',0,1,'/assets/mini-pics/pic009a-20220216100016.jpg',NULL,NULL,NULL),(66,1,1,NULL,'2022-02-27 02:54:34',0,1,'/assets/mini-pics/14_1184_10-20220126110338.jpg',NULL,NULL,NULL),(67,1,1,NULL,'2022-02-27 02:54:34',0,1,'/assets/mini-pics/ani_07-20220110093349.jpg',NULL,NULL,NULL),(68,1,3,NULL,'2022-02-27 02:55:27',1,0,'/assets/mini-pics/ani_24-20220110093233.jpg',NULL,NULL,NULL),(69,1,3,NULL,'2022-02-27 02:55:27',1,0,'/assets/mini-pics/14_1184_10-20220126110338.jpg',NULL,NULL,NULL),(70,1,3,NULL,'2022-02-27 02:55:27',1,0,'/assets/mini-pics/14_807-20220114015829.jpg',NULL,NULL,NULL),(71,3,1,NULL,'2022-02-27 02:57:27',1,0,'/assets/mini-pics/big_9318-20220113105019.jpg',NULL,NULL,NULL),(72,3,1,NULL,'2022-02-27 02:57:27',1,0,'/assets/mini-pics/14_807-20220114015829.jpg',NULL,NULL,NULL),(73,3,1,NULL,'2022-02-27 02:57:27',1,0,'/assets/mini-pics/14_1184_7-20220126110303.jpg',NULL,NULL,NULL),(74,1,2,NULL,'2022-02-27 02:58:55',1,0,'/assets/mini-pics/14_1187_13-20220127094948.jpg',NULL,NULL,NULL),(75,1,2,NULL,'2022-02-27 02:58:55',1,0,'/assets/mini-pics/pic006a-20220218011710.jpg',NULL,NULL,NULL),(76,1,2,NULL,'2022-02-27 02:58:55',1,0,'/assets/mini-pics/nature_53-20220111072639.jpg',NULL,NULL,NULL),(77,1,3,NULL,'2022-02-27 03:00:21',1,0,'/assets/mini-pics/FIGHTF~1-20220113112338.JPG',NULL,NULL,NULL),(78,1,3,NULL,'2022-02-27 03:00:21',1,0,'/assets/mini-pics/ani_07-20220110093349.jpg',NULL,NULL,NULL),(79,1,3,NULL,'2022-02-27 03:00:21',1,0,'/assets/mini-pics/ani_21-20220110095612.jpg',NULL,NULL,NULL),(80,1,1,NULL,'2022-02-27 03:01:09',0,1,'/assets/mini-pics/pic008a-20220218011710.jpg',NULL,NULL,NULL),(81,1,1,NULL,'2022-02-27 03:01:09',0,1,'/assets/mini-pics/ani_22-20211207033131.jpg',NULL,NULL,NULL),(82,1,1,NULL,'2022-02-27 03:01:09',0,1,'/assets/mini-pics/MONA_LIS-20220112012240.JPG',NULL,NULL,NULL),(83,1,5,'看看这个','2022-02-28 05:08:06',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(84,1,5,'再看这个','2022-02-28 05:36:43',1,0,NULL,'bootstrap.js','/assets/source/bootstrap.js',75484),(85,1,5,'看到了么','2022-02-28 05:39:46',1,0,NULL,'socket.io.js','/assets/source/socket.io.js',188407),(86,1,5,'你好啊','2022-02-28 06:09:48',1,0,NULL,NULL,NULL,NULL),(87,5,3,'111','2022-02-28 06:14:03',1,0,NULL,'jquery.js','/assets/source/jquery.js',299459),(88,5,3,'222','2022-02-28 06:14:03',1,0,NULL,'socket.io.js','/assets/source/socket.io.js',188407),(89,5,3,NULL,'2022-02-28 06:14:03',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(90,3,5,'111','2022-02-28 06:15:03',1,0,NULL,'jquery.js','/assets/source/jquery.js',299459),(91,3,5,'222333','2022-02-28 06:15:03',1,0,NULL,'socket.io.js','/assets/source/socket.io.js',188407),(92,3,5,NULL,'2022-02-28 06:15:03',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(93,3,5,'111','2022-02-28 06:16:04',1,0,'/assets/mini-pics/ani_21-20220110095612.jpg',NULL,NULL,NULL),(94,3,5,'222','2022-02-28 06:16:04',1,0,'/assets/mini-pics/M0PCSAL1-20220110100221.JPG',NULL,NULL,NULL),(96,5,3,'111','2022-02-28 06:17:26',1,0,NULL,'bootstrap.js','/assets/source/bootstrap.js',75484),(97,5,3,'222','2022-02-28 06:17:26',1,0,NULL,'jquery.js','/assets/source/jquery.js',299459),(98,5,3,'333444','2022-02-28 06:17:27',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(99,1,5,'1234','2022-02-28 02:40:35',1,0,NULL,NULL,NULL,NULL),(100,1,5,'6666','2022-02-28 02:44:45',1,0,NULL,NULL,NULL,NULL),(101,1,5,NULL,'2022-02-28 02:44:52',1,0,'/assets/mini-pics/M0PCSAL1-20220110100221.JPG',NULL,NULL,NULL),(102,1,5,NULL,'2022-02-28 02:45:08',1,0,NULL,'socket.io.js','/assets/source/socket.io.js',188407),(103,1,5,'888','2022-02-28 02:50:10',1,0,NULL,NULL,NULL,NULL),(104,1,5,NULL,'2022-02-28 02:50:16',1,0,NULL,'text-20220222012254.js','/assets/source/text-20220222012254.js',883),(105,1,5,'888999','2022-02-28 02:50:47',1,0,NULL,'bootstrap.js','/assets/source/bootstrap.js',75484),(106,5,1,NULL,'2022-03-01 06:53:38',1,0,NULL,'hello.txt','/assets/source/20582f8e7d1d35a4461b7f9444e9f76d.txt',14),(107,1,5,NULL,'2022-03-01 06:57:24',1,0,'/assets/mini-pics/625127e27b94775153ecd3a1f7da971c.jpg',NULL,NULL,NULL),(108,1,2,'下午好','2022-03-01 06:03:13',1,0,NULL,NULL,NULL,NULL),(109,2,2,NULL,'2022-03-03 04:10:28',0,1,'/assets/mini-pics/625127e27b94775153ecd3a1f7da971c.jpg',NULL,NULL,NULL),(110,1,2,NULL,'2022-03-03 04:11:39',0,1,'/assets/mini-pics/COLLARIS-20220113112640.JPG',NULL,NULL,NULL),(111,1,2,'晚上好','2022-03-03 04:11:54',0,1,NULL,NULL,NULL,NULL),(112,2,2,'你好','2022-03-03 04:12:30',0,1,NULL,NULL,NULL,NULL),(114,2,2,NULL,'2022-03-03 04:18:37',0,1,'/assets/mini-pics/pic009a-20220216100016.jpg',NULL,NULL,NULL),(115,2,2,'我也好','2022-03-03 04:18:47',0,1,NULL,NULL,NULL,NULL),(116,2,2,'大家好才是真的好','2022-03-03 04:24:53',0,1,NULL,NULL,NULL,NULL),(117,2,3,'你好吗','2022-03-11 06:36:06',1,0,'/assets/mini-pics/14_1187-20220127094948.jpg',NULL,NULL,NULL),(118,1,1,'你们好','2022-03-17 05:17:17',0,1,NULL,NULL,NULL,NULL),(119,2,1,'你好','2022-03-17 05:18:48',1,0,NULL,NULL,NULL,NULL),(120,1,2,'111','2022-03-17 08:54:56',0,1,'/assets/mini-pics/ani_21-20220110095612.jpg',NULL,NULL,NULL),(121,1,2,'222','2022-03-17 08:54:56',0,1,'/assets/mini-pics/c06d1002cb0745f34d7d2425cc18f450.jpg',NULL,NULL,NULL),(122,1,2,'333','2022-03-17 08:54:56',0,1,'/assets/mini-pics/FIGHTF~1-20220113112338.JPG',NULL,NULL,NULL),(123,2,5,'你好啊','2022-03-22 08:09:48',1,0,NULL,NULL,NULL,NULL),(124,2,2,'大家好','2022-03-22 08:10:00',0,1,NULL,NULL,NULL,NULL),(125,2,5,NULL,'2022-03-22 08:10:13',1,0,'/assets/mini-pics/14_807-20220114015829.jpg',NULL,NULL,NULL),(126,2,5,'晚上好<img class=\"gif\" src=\"/assets/gif/13.gif\"><img class=\"gif\" src=\"/assets/gif/13.gif\">','2022-03-22 08:10:40',1,0,NULL,NULL,NULL,NULL),(127,2,5,'111','2022-03-22 08:10:58',1,0,'/assets/mini-pics/ani_07-20220110093349.jpg',NULL,NULL,NULL),(128,2,5,'222333','2022-03-22 08:10:58',1,0,'/assets/mini-pics/FIGHTF~1-20220113112338.JPG',NULL,NULL,NULL);
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `users` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Uname` varchar(20) NOT NULL,
  `Upic` varchar(255) DEFAULT NULL,
  `isOnline` tinyint(1) DEFAULT '0',
  `Upw` varchar(50) DEFAULT NULL,
  `Usid` varchar(50) DEFAULT NULL,
  `rtime` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Uid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Tom','/assets/mini-pics/02.jpg',0,'7afed10b1e1bc70b8a428a44754de091',NULL,NULL),(2,'Jack','/assets/mini-pics/trumpK.jpg',0,'7afed10b1e1bc70b8a428a44754de091',NULL,NULL),(3,'John','/assets/mini-pics/logo.png',0,'7afed10b1e1bc70b8a428a44754de091',NULL,NULL),(4,'Mike','/assets/mini-pics/06.jpg',0,'7afed10b1e1bc70b8a428a44754de091',NULL,NULL),(5,'William','/assets/mini-pics/ani_22-20211207033131.jpg',0,'d16bf8b94053cdd1024340aa7e50eedc',NULL,NULL),(6,'newuser','/assets/mini-pics/ani_04-20211207035245.jpg',0,'429e1d7f435965b92d4e459c987f3745',NULL,NULL),(7,'wsy','/assets/mini-pics/MONA_LIS-20220112012240-20220301054723.JPG',0,'e51ac5f189929497f4da850e9e8120bb',NULL,'2022-03-01 05:47:23'),(8,'Sam','/assets/mini-pics/c06d1002cb0745f34d7d2425cc18f450.jpg',0,'8a1e9a9d588f65334e85e16155fb0f59',NULL,'2022-03-11 06:38:56');
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

-- Dump completed on 2022-03-24  0:11:50
