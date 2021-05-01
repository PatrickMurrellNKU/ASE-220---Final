-- MySQL dump 10.13  Distrib 8.0.24, for Win64 (x86_64)
--
-- Host: us-cdbr-east-03.cleardb.com    Database: heroku_acf34b15d28d53a
-- ------------------------------------------------------
-- Server version	5.6.50-log

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `is_admin` tinyint(4) NOT NULL DEFAULT '0',
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(96) DEFAULT NULL,
  `firstname` varchar(48) DEFAULT NULL,
  `lastname` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (4,1,'murrellp1@mymail.nku.edu','$2y$10$iQ.vSt/zt4I9Kgb4O9sTm.G2KAvNpOtvHS/a7/cyvZ1Xxkihg431C','Patrick','Murrell'),(84,0,'m@m.com','$2y$10$OFbVjgRvvVOUsGN2MTbpJOmg3XYGQBJjQkfmWWXXgx.7JAGZB9rvS','Michelangelo','di Lodovico Buonarroti Simoni'),(94,0,'v@gogh','$2y$10$N9w8F0SwkbUVwbXRwtzrVusTqHmnzoqyeeKXsH46pFsUxwhQ9uyvC','Vincent','van Gogh'),(124,0,'l@davinci','$2y$10$ECJt6MNwadTIEpEgJH/Hcu5qr1n884BmJH4CSIKhA8qlFahZwthVu','leonardo','davinci');
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

-- Dump completed on 2021-05-01 14:40:38
