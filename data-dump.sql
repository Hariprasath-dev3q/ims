-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: imsdb
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer_details`
--

DROP TABLE IF EXISTS `customer_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer_details` (
  `cid` int(10) NOT NULL AUTO_INCREMENT,
  `cname` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(20) DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2310 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer_details`
--

LOCK TABLES `customer_details` WRITE;
/*!40000 ALTER TABLE `customer_details` DISABLE KEYS */;
INSERT INTO `customer_details` VALUES (2301,'saravanan.sp','poove market','Tirupur','Tamil Nadu',641401,9080706050,'ssaravanan@gmail.com'),(2302,'Murugan.M','Palani road','Palani','Tamil Nadu',641467,7844498456,'murugan32@gmail,com'),(2303,'suresh','chennai','chennai','Tamil Nadu',641420,9999922222,'suresh@gmail.com'),(2304,'Santhiya.S','Avinasi','Coimbatore','Tamil Nadu',641402,224411,'sas57@gmail.com'),(2305,'Sumathi.P','sulur','Coimbatore','Tamil Nadu',641402,9999922222,'sumathi@gmail.com'),(2306,'murali','sulur','Coimbatore','Tamil Nadu',641402,10202030030,'murali@gmail.com'),(2307,'tony','chennai','chennai','Tamil Nadu',641411,111122,'tony@gmail.com'),(2308,'lavanya','ooty station','Ooty','Tamil Nadu',641502,2233007891,'lav234@gmail.com'),(2309,'Harish.MK','mangalam','Coimbatore','Tamil Nadu',641402,1122334455,'harish28@gmail.com');
/*!40000 ALTER TABLE `customer_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_details`
--

DROP TABLE IF EXISTS `purchase_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_details` (
  `vid` int(10) DEFAULT NULL,
  `vname` varchar(20) NOT NULL,
  `pdate` date DEFAULT NULL,
  `item_code` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `gst` double(5,2) NOT NULL,
  `cgst` double(5,2) NOT NULL,
  `sgst` double(5,2) NOT NULL,
  `net` double(10,2) NOT NULL,
  KEY `vid` (`vid`),
  CONSTRAINT `purchase_details_ibfk_1` FOREIGN KEY (`vid`) REFERENCES `vendor_details` (`vid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_details`
--

LOCK TABLES `purchase_details` WRITE;
/*!40000 ALTER TABLE `purchase_details` DISABLE KEYS */;
INSERT INTO `purchase_details` VALUES (200801,'Ganesh.G','2025-04-11',25001,'Notes Lsize',12,100.00,10.00,12.00,6.00,6.00,112.00);
/*!40000 ALTER TABLE `purchase_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reguser`
--

DROP TABLE IF EXISTS `reguser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reguser` (
  `username` varchar(20) NOT NULL,
  `user_email` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_pass` (`user_pass`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reguser`
--

LOCK TABLES `reguser` WRITE;
/*!40000 ALTER TABLE `reguser` DISABLE KEYS */;
INSERT INTO `reguser` VALUES ('admin','ad@gmail.com','admin'),('harisan','harisan@gmail.com','hs57');
/*!40000 ALTER TABLE `reguser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_details`
--

DROP TABLE IF EXISTS `sale_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sale_details` (
  `cid` int(10) DEFAULT NULL,
  `cname` varchar(20) NOT NULL,
  `sdate` date DEFAULT NULL,
  `item_code` int(10) NOT NULL,
  `item_name` varchar(20) NOT NULL,
  `qty` int(10) NOT NULL,
  `price` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `gst` double(5,2) NOT NULL,
  `cgst` double(5,2) NOT NULL,
  `sgst` double(5,2) DEFAULT NULL,
  `net` double(10,2) NOT NULL,
  KEY `cid` (`cid`),
  CONSTRAINT `sale_details_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer_details` (`cid`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_details`
--

LOCK TABLES `sale_details` WRITE;
/*!40000 ALTER TABLE `sale_details` DISABLE KEYS */;
INSERT INTO `sale_details` VALUES (2304,'Santhiya.S','2025-04-13',25001,'Notes Lsize',2,45.00,90.00,5.40,6.00,6.00,95.40);
/*!40000 ALTER TABLE `sale_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendor_details`
--

DROP TABLE IF EXISTS `vendor_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendor_details` (
  `vid` int(10) NOT NULL,
  `vname` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `pincode` int(10) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`vid`),
  UNIQUE KEY `phone` (`phone`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendor_details`
--

LOCK TABLES `vendor_details` WRITE;
/*!40000 ALTER TABLE `vendor_details` DISABLE KEYS */;
INSERT INTO `vendor_details` VALUES (200801,'Ganesh.G','Pallavaram','Chennai','Tamil Nadu',600016,9999912345,'ganesh@gmail.com');
/*!40000 ALTER TABLE `vendor_details` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-15 20:04:03
