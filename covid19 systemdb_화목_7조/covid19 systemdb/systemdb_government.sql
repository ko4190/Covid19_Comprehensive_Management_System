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
-- Table structure for table `government`
--

DROP TABLE IF EXISTS `government`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `government` (
  `government_id` int NOT NULL,
  `vaccine tbl_pharmaceuticalCom` varchar(15) NOT NULL,
  `hospital tbl_Hospital Name` char(12) NOT NULL,
  `Nation_Nation_ID` int DEFAULT NULL,
  PRIMARY KEY (`government_id`),
  KEY `fk_government_vaccine tbl1_idx` (`vaccine tbl_pharmaceuticalCom`),
  KEY `fk_government_hospital tbl1_idx` (`hospital tbl_Hospital Name`),
  KEY `fk_government_Nation1_idx` (`Nation_Nation_ID`),
  CONSTRAINT `fk_government_hospital tbl1` FOREIGN KEY (`hospital tbl_Hospital Name`) REFERENCES `hospital tbl` (`Hospital Name`),
  CONSTRAINT `fk_government_Nation1` FOREIGN KEY (`Nation_Nation_ID`) REFERENCES `mydb`.`nation` (`Nation_ID`),
  CONSTRAINT `fk_government_Nation2` FOREIGN KEY (`Nation_Nation_ID`) REFERENCES `mydb`.`nation` (`Nation_ID`),
  CONSTRAINT `fk_government_vaccine tbl1` FOREIGN KEY (`vaccine tbl_pharmaceuticalCom`) REFERENCES `vaccine tbl` (`pharmaceuticalCom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `government`
--

LOCK TABLES `government` WRITE;
/*!40000 ALTER TABLE `government` DISABLE KEYS */;
INSERT INTO `government` VALUES (1,'Moderna','Yeungnam',1),(2,'Pfizer','Yeungnam',1),(3,'Moderna','Daegu',1),(4,'Pfizer','Daegu',1),(5,'Moderna','Kyungpook',1),(6,'Pfizer','Kyungpook',1);
/*!40000 ALTER TABLE `government` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-01 12:24:52
