-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: systemdb
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `prodlist tbl`
--

DROP TABLE IF EXISTS `prodlist tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prodlist tbl` (
  `prodNumber` int NOT NULL AUTO_INCREMENT,
  `prodDate` date NOT NULL,
  `prodVolume` int NOT NULL,
  `prodlist_pharmaceuticalCom` varchar(45) NOT NULL,
  PRIMARY KEY (`prodNumber`),
  KEY `fk_prodList tbl_pharmaceuticalCom_idx` (`prodlist_pharmaceuticalCom`),
  CONSTRAINT `fk_prodList tbl_pharmaceuticalCom` FOREIGN KEY (`prodlist_pharmaceuticalCom`) REFERENCES `vaccine tbl` (`pharmaceuticalCom`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prodlist tbl`
--

LOCK TABLES `prodlist tbl` WRITE;
/*!40000 ALTER TABLE `prodlist tbl` DISABLE KEYS */;
INSERT INTO `prodlist tbl` VALUES (1,'2021-10-01',50000,'Moderna'),(2,'2021-10-10',100000,'Moderna'),(3,'2021-10-20',80000,'Moderna'),(4,'2021-10-15',70000,'Pfizer'),(5,'2021-10-30',150000,'Pfizer'),(6,'2021-11-10',230000,'Pfizer'),(7,'2022-10-22',10000,'Moderna'),(8,'2022-10-22',90000,'Pfizer');
/*!40000 ALTER TABLE `prodlist tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 12:24:53
