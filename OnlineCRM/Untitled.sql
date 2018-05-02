-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: crm02
-- ------------------------------------------------------
-- Server version	5.6.38

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
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `salesRep` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacts`
--

LOCK TABLES `contacts` WRITE;
/*!40000 ALTER TABLE `contacts` DISABLE KEYS */;
INSERT INTO `contacts` VALUES (5,'Mark','Johnson','Walmart02','Montreal','(514) 333-5676','Mark@gmail.com',0),(83,'john','smith','Johnabbott','Montreal','123456789','john@yahoo.com',0),(86,'Eric','johnson','bam','Montreal','','',0),(88,'David','Smith','Bell','Montreal','123456789','david@yahoo.com',0);
/*!40000 ALTER TABLE `contacts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `customerId` int(11) DEFAULT NULL,
  `saleDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userID_idx` (`userId`),
  KEY `fk_productId_idx` (`productId`),
  KEY `fk_customerId_idx` (`customerId`),
  CONSTRAINT `fk_customerId` FOREIGN KEY (`customerId`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_productId` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_userId` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,NULL,1,5,'2018-04-28 00:27:56',NULL,NULL),(13,5,1,5,'2018-04-28 01:17:03',2,683.9),(14,5,1,5,'2018-04-28 01:17:03',2,683.9),(15,5,1,5,'2018-04-28 01:19:03',2,683.9),(16,5,1,5,'2018-04-28 01:19:03',2,683.9),(17,5,1,83,'2018-04-28 01:20:06',1,341.95),(18,5,1,83,'2018-04-28 01:20:06',1,341.95),(19,4,1,86,'2018-04-28 01:22:21',3,1025.85),(20,1,2,83,'2018-05-01 05:17:34',2,199.98),(21,7,2,83,'2018-05-01 05:19:31',1,99.99);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productName` varchar(45) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Cisco sw C2960',341.95,10),(2,'TP-Link AC1750',99.99,5);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) DEFAULT NULL,
  `todo` varchar(45) DEFAULT NULL,
  `contactId` int(11) DEFAULT NULL,
  `subject` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `isdone` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contactID_idx` (`contactId`),
  KEY `fk_userID_idx` (`userId`),
  KEY `fk_tasks_userID_idx` (`userId`),
  CONSTRAINT `fk_contactID` FOREIGN KEY (`contactId`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_tasks_userID` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,NULL,'Email',83,'Follow Order','2018-05-01',''),(2,NULL,'Email',5,'Order','2018-04-30',''),(3,NULL,'Email',5,'Order','2018-05-03',''),(4,NULL,'Email',5,'Order','2018-05-02',''),(7,1,'Call',5,'Support','2018-05-03',''),(8,1,'Call',83,'order','2018-05-04','');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(45) DEFAULT NULL,
  `lastName` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `userName` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'yasser','soofiyani','yasser@yahoo.com','yasser','$2y$10$iI9ICaoX51YPzhLhPpHY..cNQvxHbldTGMbBfD0VCJ.jVKPIa7X3q','IT','Manager'),(2,'user01','user01','','admin','$2y$10$.bLzj6Qc6Im17zeoKiateOyh7hQmkojZ6vLal8','',''),(4,'admin','admin','admin@yahoo.com','admin2','$2y$10$9GIp2NzEZM1RoyzurlU/Z.JoOrl.JYqc1ykMVfyN5SMQxEVic3aRi','',''),(5,'user02','user02','user02@yahoo.com','user02','$2y$10$Qk43jWSp3cBME5nUiC3cg.88IEYGML.S3R4wNUYDhWHJFCwi4.TKC','Sales','Salesperson'),(6,'manager','','manager@yahoo.com','manager','$2y$10$7wYrDKCgIlCoCvta9rqnS.sylEACNdB63XUJNXngDfLYPJ/5C/S0y','IT','Manager'),(7,'Adam','Smith','Adam@yahoo.com','user','$2y$10$ap1jfG1OG0b1GnNK8PpLKOjoOtcHFTT5QMaYXbe4YhEkBv.pPTDaC','Sales','Salesperson');
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

-- Dump completed on 2018-05-02 18:57:29
