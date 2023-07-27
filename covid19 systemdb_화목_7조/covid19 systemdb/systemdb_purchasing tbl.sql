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
-- Table structure for table `purchasing tbl`
--

DROP TABLE IF EXISTS `purchasing tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchasing tbl` (
  `orderNumber` int NOT NULL AUTO_INCREMENT,
  `purchasing_pharmaceuticalCom` varchar(15) NOT NULL,
  `purchaseVolume` int NOT NULL,
  `purchasingDate` date NOT NULL,
  `hospitalName` varchar(45) NOT NULL,
  PRIMARY KEY (`orderNumber`),
  KEY `fk_purchasing tbl_vaccine tbl1_idx` (`purchasing_pharmaceuticalCom`),
  CONSTRAINT `fk_purchasing tbl_vaccine tbl1` FOREIGN KEY (`purchasing_pharmaceuticalCom`) REFERENCES `vaccine tbl` (`pharmaceuticalCom`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchasing tbl`
--

LOCK TABLES `purchasing tbl` WRITE;
/*!40000 ALTER TABLE `purchasing tbl` DISABLE KEYS */;
INSERT INTO `purchasing tbl` VALUES (1,'Pfizer',50000,'2021-11-11','Yeungnam'),(2,'Pfizer',30000,'2021-11-25','Yeungnam'),(3,'Pfizer',60000,'2021-11-18','Kyungpook'),(4,'Pfizer',40000,'2021-11-13','Daegu'),(5,'Pfizer',10000,'2021-11-27','Daegu'),(6,'Moderna',20000,'2021-11-13','Yeungnam'),(7,'Moderna',40000,'2021-11-18','Kyungpook'),(8,'Moderna',50000,'2021-11-27','Kyungpook'),(9,'Moderna',10000,'2021-12-02','Kyungpook'),(10,'Moderna',20000,'2021-12-01','Daegu'),(11,'Pfizer',5000,'2021-12-02','Daegu'),(12,'Pfizer',12000,'2021-11-17','Yeungnam'),(13,'Moderna',9000,'2021-11-30','Daegu'),(14,'Pfizer',1000,'2021-11-30','Kyungpook'),(15,'Moderna',3000,'2021-12-05','Yeungnam'),(16,'Moderna',18000,'2021-12-09','Daegu'),(17,'Moderna',7500,'2021-11-11','Yeungnam'),(18,'Pfizer',8800,'2021-11-11','Kyungpook'),(19,'Pfizer',14000,'2021-12-10','Kyungpook'),(20,'Moderna',12500,'2021-12-11','Daegu');
/*!40000 ALTER TABLE `purchasing tbl` ENABLE KEYS */;
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
