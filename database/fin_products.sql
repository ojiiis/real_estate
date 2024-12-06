-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: fin
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(100) DEFAULT NULL,
  `property_id` varchar(100) DEFAULT NULL,
  `property_title` varchar(255) DEFAULT NULL,
  `description` text,
  `type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `rooms` int DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `neighborhood` varchar(100) DEFAULT NULL,
  `zip` varchar(20) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `latitude` decimal(9,6) DEFAULT NULL,
  `longitude` decimal(9,6) DEFAULT NULL,
  `google_map_street_view` varchar(255) DEFAULT NULL,
  `detailed_information` text,
  `area_size` decimal(10,2) DEFAULT NULL,
  `size_prefix` varchar(10) DEFAULT NULL,
  `land_area` decimal(10,2) DEFAULT NULL,
  `land_area_size_postfix` varchar(10) DEFAULT NULL,
  `bedrooms` int DEFAULT NULL,
  `bathrooms` int DEFAULT NULL,
  `garages` int DEFAULT NULL,
  `garages_size` decimal(10,2) DEFAULT NULL,
  `year_built` int DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `virtual_tour_url` varchar(255) DEFAULT NULL,
  `amenities` text,
  `air_conditioning` tinyint(1) DEFAULT NULL,
  `lawn` tinyint(1) DEFAULT NULL,
  `swimming_pool` tinyint(1) DEFAULT NULL,
  `barbeque` tinyint(1) DEFAULT NULL,
  `microwave` tinyint(1) DEFAULT NULL,
  `tv_cable` tinyint(1) DEFAULT NULL,
  `dryer` tinyint(1) DEFAULT NULL,
  `outdoor_shower` tinyint(1) DEFAULT NULL,
  `washer` tinyint(1) DEFAULT NULL,
  `gym` tinyint(1) DEFAULT NULL,
  `refrigerator` tinyint(1) DEFAULT NULL,
  `wifi` tinyint(1) DEFAULT NULL,
  `laundry` tinyint(1) DEFAULT NULL,
  `sauna` tinyint(1) DEFAULT NULL,
  `window_coverings` tinyint(1) DEFAULT NULL,
  `property_media` json DEFAULT NULL,
  `attachments` json DEFAULT NULL,
  `floor_plans` json DEFAULT NULL,
  `plan_description` text,
  `plan_bedrooms` int DEFAULT NULL,
  `plan_bathrooms` int DEFAULT NULL,
  `plan_price` decimal(10,2) DEFAULT NULL,
  `price_postfix` varchar(10) DEFAULT NULL,
  `plan_size` decimal(10,2) DEFAULT NULL,
  `plan_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'zwiXoOzKG0eFyQBrBkU8GMq1MQiucM','cTbRtDrMPEcu6rWeqGieGV0DtPs4bN','Sample property new','hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property hello property ','Value3','Value2',3000.00,'12',1,NULL,'Back of owoniboys building taiwo road','Kwara','Ilorin East','Owoniboys','240241','Nigeria',8.966900,4.565100,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-06 13:32:44
