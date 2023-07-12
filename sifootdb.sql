-- MariaDB dump 10.19  Distrib 10.4.28-MariaDB, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: sifootdb
-- ------------------------------------------------------
-- Server version	10.4.28-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `email_admin` varchar(100) NOT NULL,
  `username_admin` varchar(100) DEFAULT NULL,
  `password_admin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`email_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('mausneg@gmail.com','mausneg','$2y$10$F/eYWlNLqmrHXCRBdg33gO3sBHcRoGfjY7dmL2IsLEIzKDvQk2oDm');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `booking` (
  `no_booking` int(11) NOT NULL AUTO_INCREMENT,
  `field_name` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `booking_status` enum('booked','confirm','cancelled','pending','end') NOT NULL,
  `email_customer` varchar(100) NOT NULL,
  PRIMARY KEY (`no_booking`),
  KEY `FK_customer_booking` (`email_customer`),
  CONSTRAINT `FK_customer_booking` FOREIGN KEY (`email_customer`) REFERENCES `customer` (`email_customer`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `booking`
--

LOCK TABLES `booking` WRITE;
/*!40000 ALTER TABLE `booking` DISABLE KEYS */;
INSERT INTO `booking` VALUES (55,'Vinyl','2023-06-29 09:00:00.000000','confirm','amir@gmail.com'),(56,'Sintetis','2023-06-28 09:00:00.000000','confirm','amir@gmail.com'),(57,'Sintetis','2023-06-29 09:00:00.000000','pending','amir@gmail.com'),(58,'Sintetis','2023-06-29 13:00:00.000000','confirm','agi@gmail.com'),(59,'Vinyl','2023-06-26 22:00:00.000000','pending','agi@gmail.com'),(60,'Vinyl','2023-06-26 22:00:00.000000','confirm','agi@gmail.com'),(61,'Sintetis','2023-06-28 17:00:00.000000','pending','amir@gmail.com');
/*!40000 ALTER TABLE `booking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `email_customer` varchar(100) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `contact_customer` varchar(100) NOT NULL,
  `password_customer` varchar(100) NOT NULL,
  PRIMARY KEY (`email_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES ('agi@gmail.com','afrizkiagi','081234567890','$2y$10$iuwuzjgVQxt6ElrGboZYnOlKyQht/.teWc/2l5.g3BlIjzTiX94za'),('amir@gmail.com','amirhamzah','123','$2y$10$pdWmk.MW88IbQu98gQV87Og7HZktJhySX39sdH/CNTcRItrmYVzIK'),('q@gmail.com','q','q','$2y$10$QkoXFuyPmrfjDpT7ZQQpq.wn7Ju5SBOF.D/krWDDuSxMhj/B4J4Gq'),('sam@gmail.com','sam123','081234567890','$2y$10$6p1dEnAZkjp6.dwZJF527ubiGP5EDQOIxgJHbGKPUmMRnMOZY3SEy');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notification` (
  `no_notification` int(11) NOT NULL AUTO_INCREMENT,
  `email_customer` varchar(100) DEFAULT NULL,
  `message` enum('payment_accept','book_canclled') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0,
  `email_admin` varchar(100) DEFAULT NULL,
  `no_booking` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_notification`),
  KEY `notification_customer_email_customer_fk` (`email_customer`),
  KEY `notification_admin_email_admin_fk` (`email_admin`),
  KEY `notification_booking_no_booking_fk` (`no_booking`),
  CONSTRAINT `notification_admin_email_admin_fk` FOREIGN KEY (`email_admin`) REFERENCES `admin` (`email_admin`),
  CONSTRAINT `notification_booking_no_booking_fk` FOREIGN KEY (`no_booking`) REFERENCES `booking` (`no_booking`),
  CONSTRAINT `notification_customer_email_customer_fk` FOREIGN KEY (`email_customer`) REFERENCES `customer` (`email_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notification`
--

LOCK TABLES `notification` WRITE;
/*!40000 ALTER TABLE `notification` DISABLE KEYS */;
INSERT INTO `notification` VALUES (28,'amir@gmail.com','payment_accept','2023-06-15 13:45:22',0,'mausneg@gmail.com',55),(31,'amir@gmail.com','payment_accept','2023-06-15 16:38:26',0,'mausneg@gmail.com',56),(32,'agi@gmail.com','payment_accept','2023-06-16 02:06:47',0,'mausneg@gmail.com',58),(33,'agi@gmail.com','payment_accept','2023-06-16 05:40:38',0,'mausneg@gmail.com',60);
/*!40000 ALTER TABLE `notification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `no_payment` int(11) NOT NULL AUTO_INCREMENT,
  `no_booking` int(11) NOT NULL,
  `id_method_payment` varchar(100) NOT NULL,
  `method_payment` varchar(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_booking` datetime NOT NULL,
  `status_payment` enum('paid','unpaid') DEFAULT NULL,
  `email_admin` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`no_payment`),
  KEY `fk_payment_booking` (`no_booking`),
  KEY `payment_admin_email_admin_fk` (`email_admin`),
  CONSTRAINT `fk_payment_booking` FOREIGN KEY (`no_booking`) REFERENCES `booking` (`no_booking`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `payment_admin_email_admin_fk` FOREIGN KEY (`email_admin`) REFERENCES `admin` (`email_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (47,55,'123','dana',120000,'2023-06-15 20:48:24','paid','mausneg@gmail.com'),(48,56,'12345','gopay',120000,'2023-06-15 22:40:47','paid','mausneg@gmail.com'),(49,57,'1244','shopee',120000,'2023-06-16 00:06:00','unpaid','mausneg@gmail.com'),(50,58,'08123456789','dana',120000,'2023-06-16 10:02:42','paid','mausneg@gmail.com'),(51,59,'08123464892','shopee',120000,'2023-06-16 13:39:40','unpaid',NULL),(52,60,'0812638133','dana',120000,'2023-06-16 13:40:02','paid','mausneg@gmail.com'),(53,61,'123','dana',120000,'2023-06-17 23:21:09','unpaid',NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-20 17:22:01
