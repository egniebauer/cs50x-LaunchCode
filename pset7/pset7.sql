-- MySQL dump 10.13  Distrib 5.5.46, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: pset7
-- ------------------------------------------------------
-- Server version	5.5.46-0ubuntu0.14.04.2

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
-- Table structure for table `history`
--

DROP TABLE IF EXISTS `history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` varchar(4) NOT NULL,
  `symbol` varchar(12) NOT NULL,
  `shares` int(10) unsigned NOT NULL,
  `price` decimal(65,4) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `history`
--

LOCK TABLES `history` WRITE;
/*!40000 ALTER TABLE `history` DISABLE KEYS */;
INSERT INTO `history` VALUES (1,11,'2016-08-13 00:04:32','BUY','FB',1,124.8800),(2,0,'2016-08-13 00:04:32','','',0,0.0000),(3,11,'2016-08-13 00:11:55','BUY','TAP',1,99.7900),(4,11,'2016-08-13 00:12:52','BUY','TAP',1,99.7900),(5,11,'2016-08-13 00:15:42','SELL','FB',3,374.6400),(6,12,'2016-08-13 02:35:05','BUY','H',1,52.6300),(7,12,'2016-08-13 02:38:46','BUY','g',1,24.0800),(8,12,'2016-08-13 02:38:56','BUY','gg',1,18.8800),(9,12,'2016-08-13 02:39:13','BUY','a',1,48.1400),(10,12,'2016-08-13 02:39:23','BUY','b',1,40.3700),(11,12,'2016-08-13 02:39:30','BUY','c',1,45.5800),(12,12,'2016-08-13 02:39:37','BUY','d',1,75.9600),(13,12,'2016-08-13 02:39:58','BUY','z',1,35.2000),(14,12,'2016-08-13 02:40:07','BUY','ap',1,12.7600),(15,12,'2016-08-13 02:40:20','BUY','t',1,43.2800),(16,12,'2016-08-13 02:40:33','BUY','r',1,65.2800),(17,12,'2016-08-13 02:40:44','BUY','y',1,533.8700),(18,12,'2016-08-13 02:41:01','BUY','x',1,21.0600),(19,12,'2016-08-13 02:41:09','BUY','w',1,38.9900),(20,12,'2016-08-13 02:41:21','BUY','v',1,80.0200),(21,12,'2016-08-13 02:41:47','BUY','s',1,6.0900),(22,12,'2016-08-13 02:42:02','BUY','q',1,76.4000),(23,12,'2016-08-13 02:42:30','BUY','p',1,13.2000),(24,12,'2016-08-13 02:42:42','BUY','aa',1,10.1700),(25,12,'2016-08-13 02:42:53','BUY','ab',1,21.9300),(26,12,'2016-08-13 02:43:01','BUY','e',1,30.4600),(27,12,'2016-08-13 02:43:07','BUY','f',1,12.3300),(28,12,'2016-08-13 02:44:57','BUY','h',1,52.6300),(29,12,'2016-08-13 02:45:27','SELL','H',1,52.6300),(30,12,'2016-08-13 02:45:50','SELL','g',1,24.0800),(31,11,'2016-08-14 00:28:39','BUY','APB',20,208.5000);
/*!40000 ALTER TABLE `history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `symbol` varchar(12) NOT NULL,
  `shares` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`symbol`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (1,1,'LUV',3),(2,2,'BUD',7),(3,3,'LVB',5),(4,4,'ZEUS',7),(5,5,'MOO',21),(6,6,'HOG',98),(9,7,'GRR',4),(10,8,'COOL',45),(11,9,'BOOM',4),(12,10,'FIZZ',17),(21,11,'CASH',30),(22,11,'BOOM',17),(23,11,'FB',99),(29,11,'LUV',44),(31,11,'T',25),(33,11,'TAP',4),(37,12,'H',1),(39,12,'GG',1),(40,12,'A',1),(41,12,'B',1),(42,12,'C',1),(43,12,'D',1),(44,12,'Z',1),(45,12,'AP',1),(46,12,'T',1),(47,12,'R',1),(48,12,'Y',1),(49,12,'X',1),(50,12,'W',1),(51,12,'V',1),(52,12,'S',1),(53,12,'Q',1),(54,12,'P',1),(55,12,'AA',1),(56,12,'AB',1),(57,12,'E',1),(58,12,'F',1),(59,11,'APB',20);
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cash` decimal(65,4) unsigned NOT NULL DEFAULT '0.0000',
  `username` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,10000.0000,'andi','$2y$10$c.e4DK7pVyLT.stmHxgAleWq4yViMmkwKz3x8XCo4b/u3r8g5OTnS'),(2,10000.0000,'caesar','$2y$10$0p2dlmu6HnhzEMf9UaUIfuaQP7tFVDMxgFcVs0irhGqhOxt6hJFaa'),(3,10000.0000,'eli','$2y$10$COO6EnTVrCPCEddZyWeEJeH9qPCwPkCS0jJpusNiru.XpRN6Jf7HW'),(4,10000.0000,'hdan','$2y$10$o9a4ZoHqVkVHSno6j.k34.wC.qzgeQTBHiwa3rpnLq7j2PlPJHo1G'),(5,10000.0000,'jason','$2y$10$ci2zwcWLJmSSqyhCnHKUF.AjoysFMvlIb1w4zfmCS7/WaOrmBnLNe'),(6,10000.0000,'john','$2y$10$dy.LVhWgoxIQHAgfCStWietGdJCPjnNrxKNRs5twGcMrQvAPPIxSy'),(7,10000.0000,'levatich','$2y$10$fBfk7L/QFiplffZdo6etM.096pt4Oyz2imLSp5s8HUAykdLXaz6MK'),(8,10000.0000,'rob','$2y$10$3pRWcBbGdAdzdDiVVybKSeFq6C50g80zyPRAxcsh2t5UnwAkG.I.2'),(9,10000.0000,'skroob','$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK'),(10,10000.0000,'zamyla','$2y$10$UOaRF0LGOaeHG4oaEkfO4O7vfI34B1W23WqHr9zCpXL68hfQsS3/e'),(11,69853.9053,'eniebauer','$2y$10$t2PHT9WI2ctMo9vOOfQN4.Gf9WLdnC8/lmmyEBtworalm6zIqkizO'),(12,8717.4000,'Butt+plug','$2y$10$1TIScrd8GXQpyDk7EMyMheFbYtX8h928CuA9fytqazW6o0E12IsCS');
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

-- Dump completed on 2016-08-14  2:26:32
