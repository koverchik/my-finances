-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: finances
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (25,'2014_10_12_000000_create_users_table',1),(26,'2014_10_12_100000_create_password_resets_table',1),(27,'2019_08_19_000000_create_failed_jobs_table',1),(28,'2020_04_23_151437_name_outlay',1),(29,'2020_04_23_161048_row_outlay',1),(30,'2020_05_31_132337_create_powers',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name_outlay`
--

DROP TABLE IF EXISTS `name_outlay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `name_outlay` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_outlay_user_id_foreign` (`user_id`),
  CONSTRAINT `name_outlay_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name_outlay`
--

LOCK TABLES `name_outlay` WRITE;
/*!40000 ALTER TABLE `name_outlay` DISABLE KEYS */;
INSERT INTO `name_outlay` VALUES (1,'Животное',1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(2,'Воздух',1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(3,'Птица',2,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(4,'Область',2,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(5,'Koнтeкcт',4,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(6,'Kyтюpьe',4,'2020-06-22 17:53:05','2020-06-22 17:53:05'),(7,'Кoppecпoндeнт',2,'2020-06-22 17:53:05','2020-06-22 17:53:05'),(8,'Aпoфeoз',4,'2020-06-22 17:53:05','2020-07-22 17:53:05'),(9,'Пeйзaжиcт',3,'2020-07-22 17:53:05','2020-07-23 17:53:05'),(10,'Пpeзидиyм',3,'2020-05-22 17:53:05','2020-07-28 17:53:05');
/*!40000 ALTER TABLE `name_outlay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `name_purse`
--

DROP TABLE IF EXISTS `name_purse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `name_purse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name_purse_user_id_foreign` (`user_id`),
  CONSTRAINT `name_purse_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `name_purse`
--

LOCK TABLES `name_purse` WRITE;
/*!40000 ALTER TABLE `name_purse` DISABLE KEYS */;
INSERT INTO `name_purse` VALUES (1,'vf',2,NULL,NULL),(2,'vf',2,NULL,NULL),(3,'vf',2,NULL,NULL),(4,'vf',2,NULL,NULL),(5,'Название',2,NULL,NULL),(6,'Название',2,NULL,NULL),(7,'Название',2,NULL,NULL),(8,'Новая',2,NULL,NULL),(9,'Новая',2,NULL,NULL),(10,'Таблица',2,NULL,NULL),(11,'Таблица',2,NULL,NULL),(12,'Таблица',2,NULL,NULL),(13,'Таблица',2,NULL,NULL),(14,'Таблица',2,NULL,NULL),(15,'Таблица',2,NULL,NULL),(16,'Таблица',2,NULL,NULL),(17,'Таблица',2,NULL,NULL),(18,'Таблица',2,NULL,NULL),(19,'Таблица',2,NULL,NULL),(20,'Таблица',2,NULL,NULL),(21,'Таблица',2,NULL,NULL),(22,'Расходы',2,NULL,NULL),(23,'Расходы',2,NULL,NULL),(24,'Расходы',2,NULL,NULL),(25,'Расходы',2,NULL,NULL),(26,'Расходы',2,NULL,NULL),(27,'Расходы',2,NULL,NULL),(28,'Расходы',2,NULL,NULL),(29,'Расходы',2,NULL,NULL),(30,'Расходы',2,NULL,NULL),(31,'Расходы',2,NULL,NULL),(32,'Расходы',2,NULL,NULL),(33,'Расходы',2,NULL,NULL),(34,'Расходы',2,NULL,NULL),(35,'Расходы',2,NULL,NULL),(36,'Расходы',2,NULL,NULL),(37,'Расходы',2,NULL,NULL),(38,'Расходы',2,NULL,NULL),(39,'Расходы',2,NULL,NULL),(40,'Расходы',2,NULL,NULL),(41,'Расходы',2,NULL,NULL),(42,'Расходы',2,NULL,NULL),(43,'Расходы',2,NULL,NULL),(44,'Расходы',2,NULL,NULL),(45,'Расходы',2,NULL,NULL),(46,'Расходы',2,NULL,NULL),(47,'Расходы',2,NULL,NULL),(48,'Расходы',2,NULL,NULL),(49,'Расходы',2,NULL,NULL),(50,'Расходы',2,NULL,NULL),(51,'Расходы',2,NULL,NULL),(52,'Расходы',2,NULL,NULL),(53,'Расходы',2,NULL,NULL),(54,'Расходы',2,NULL,NULL),(55,'Расходы',2,NULL,NULL),(56,'Расходы',2,NULL,NULL),(57,'Расходы',2,NULL,NULL),(58,'Расходы',2,NULL,NULL),(59,'Расходы',2,NULL,NULL),(60,'Расходы',2,NULL,NULL),(61,'Расходы',2,NULL,NULL),(62,'Расходы',2,NULL,NULL),(63,'Расходы',2,NULL,NULL),(64,'Расходы',2,NULL,NULL),(65,'Расходы',2,NULL,NULL),(66,'Расходы',2,NULL,NULL),(67,'Расходы',2,NULL,NULL),(68,'Расходы',2,NULL,NULL),(69,'Расходы',2,NULL,NULL),(70,'Расходы',2,NULL,NULL),(71,'Расходы',2,NULL,NULL),(72,'Расходы',2,NULL,NULL),(73,'Расходы',2,NULL,NULL),(74,'Расходы',2,NULL,NULL),(75,'Расходы',2,NULL,NULL),(76,'Расходы',2,NULL,NULL),(77,'Расходы',2,NULL,NULL),(78,'Расходы',2,NULL,NULL),(79,'Расходы',2,NULL,NULL),(80,'Расходы',2,NULL,NULL),(81,'Расходы',2,NULL,NULL),(82,'Расходы',2,NULL,NULL),(83,'Расходы',2,NULL,NULL),(84,'Расходы',2,NULL,NULL),(85,'Расходы',2,NULL,NULL),(86,'Расходы',2,NULL,NULL),(87,'Расходы',2,NULL,NULL),(88,'Расходы',2,NULL,NULL),(89,'Расходы',2,NULL,NULL),(90,'Расходы',2,NULL,NULL),(91,'Расходы',2,NULL,NULL),(92,'Расходы',2,NULL,NULL),(93,'Расходы',2,NULL,NULL),(94,'Расходы',2,NULL,NULL),(95,'Расходы',2,NULL,NULL),(96,'Расходы',2,NULL,NULL),(97,'Расходы',2,NULL,NULL),(98,'Расходы',2,NULL,NULL),(99,'Расходы',2,NULL,NULL),(100,'Расходы',2,NULL,NULL),(101,'Расходы',2,NULL,NULL),(102,'Расходы',2,NULL,NULL),(103,'Расходы',2,NULL,NULL),(104,'Название',3,NULL,NULL),(105,'Тест',3,NULL,NULL),(106,'Тест',3,NULL,NULL),(107,'Тест',3,NULL,NULL),(108,'Тест',3,NULL,NULL),(109,'Тест',3,NULL,NULL),(110,'Тест',3,NULL,NULL),(111,'Тест',3,NULL,NULL),(112,'Тест',3,NULL,NULL),(113,'Тест',3,NULL,NULL),(114,'Тест',3,NULL,NULL),(115,'Расходы',3,NULL,NULL),(116,'Новая',3,NULL,NULL),(117,'Новая',3,NULL,NULL),(118,'Новая',3,NULL,NULL),(119,'Новая',3,NULL,NULL),(120,'Новая',3,NULL,NULL),(121,'Новая',3,NULL,NULL),(122,'Новая',3,NULL,NULL),(123,'Новая',3,NULL,NULL),(124,'Новая',3,NULL,NULL),(125,'Новая',3,NULL,NULL),(126,'Новая',3,NULL,NULL),(127,'Новая',3,NULL,NULL),(128,'Новая',3,NULL,NULL),(129,'Новая',3,NULL,NULL),(130,'Новая',3,NULL,NULL),(131,'Новая',3,NULL,NULL),(132,'Новая',3,NULL,NULL),(133,'Новая',3,NULL,NULL),(134,'Новая',3,NULL,NULL),(135,'Новая',3,NULL,NULL),(136,'Новая',3,NULL,NULL),(137,'Новая',3,NULL,NULL),(138,'Новая',3,NULL,NULL),(139,'Новая',3,NULL,NULL),(140,'Новая',3,NULL,NULL),(141,'Новая',3,NULL,NULL),(142,'Новая',3,NULL,NULL),(143,'Новая',3,NULL,NULL),(144,'Новая',3,NULL,NULL),(145,'Новая',3,NULL,NULL),(146,'Тесты',3,NULL,NULL),(147,'Тесты',3,NULL,NULL),(148,'Тесты',3,NULL,NULL),(149,'Тесты',3,NULL,NULL),(150,'Тесты',3,NULL,NULL),(151,'Тесты',3,NULL,NULL),(152,'Тесты',3,NULL,NULL),(153,'Тесты',3,NULL,NULL),(154,'Тесты',3,NULL,NULL),(155,'Тесты',3,NULL,NULL),(156,'Тесты',3,NULL,NULL),(157,'Тесты',3,NULL,NULL),(158,'Тесты',3,NULL,NULL),(159,'Тесты',3,NULL,NULL),(160,'Тесты',3,NULL,NULL),(161,'Тесты',3,NULL,NULL),(162,'Тесты',3,NULL,NULL),(163,'Тесты',3,NULL,NULL),(164,'доходы',3,NULL,NULL),(165,'доходы',3,NULL,NULL),(166,'доходы',3,NULL,NULL),(167,'доходы',3,NULL,NULL),(168,'доходы',3,NULL,NULL),(169,'доходы',3,NULL,NULL),(170,'доходы',3,NULL,NULL),(171,'доходы',3,NULL,NULL),(172,'доходы',3,NULL,NULL),(173,'доходы',3,NULL,NULL),(174,'доходы',3,NULL,NULL),(175,'доходы',3,NULL,NULL),(176,'доходы',3,NULL,NULL),(177,'доходы',3,NULL,NULL),(178,'доходы',3,NULL,NULL),(179,'доходы',3,NULL,NULL),(180,'доходы',3,NULL,NULL),(181,'доходы',3,NULL,NULL),(182,'доходы',3,NULL,NULL),(183,'доходы',3,NULL,NULL),(184,'доходы',3,NULL,NULL),(185,'доходы',3,NULL,NULL),(186,'доходы',3,NULL,NULL),(187,'доходы',3,NULL,NULL),(188,'доходы',3,NULL,NULL),(189,'доходы',3,NULL,NULL),(190,'доходы',3,NULL,NULL),(191,'доходы',3,NULL,NULL),(192,'доходы',3,NULL,NULL),(193,'доходы',3,NULL,NULL),(194,'доходы',3,NULL,NULL),(195,'доходы',3,NULL,NULL),(196,'доходы',3,NULL,NULL),(197,'доходы',3,NULL,NULL),(198,'доходы',3,NULL,NULL),(199,'доходы',3,NULL,NULL),(200,'Расходы',3,NULL,NULL),(201,'Расходы',3,NULL,NULL),(202,'Расходы',3,NULL,NULL),(203,'Расходы',3,NULL,NULL),(204,'Расходы',3,NULL,NULL),(205,'Расходы',3,NULL,NULL),(206,'Расходы',3,NULL,NULL),(207,'Расходы',3,NULL,NULL),(208,'Расходы',3,NULL,NULL),(209,'Расходы',3,NULL,NULL),(210,'Расходы',3,NULL,NULL),(211,'Новые',3,NULL,NULL),(212,'тут',3,NULL,NULL),(213,'Новая',3,NULL,NULL),(214,'Новая',3,NULL,NULL),(215,'Новая',3,NULL,NULL),(216,'Новая',3,NULL,NULL),(217,'Новая',3,NULL,NULL),(218,'Новая',3,NULL,NULL),(219,'Новая',3,NULL,NULL),(220,'Новая',3,NULL,NULL),(221,'Новая',3,NULL,NULL),(222,'Новая',3,NULL,NULL),(223,'Новая',3,NULL,NULL),(224,'Новая',3,NULL,NULL),(225,'Новая',3,NULL,NULL),(226,'Новая',3,NULL,NULL),(227,'Новая',3,NULL,NULL),(228,'Новая',3,NULL,NULL),(229,'Новая',3,NULL,NULL),(230,'Новая',3,NULL,NULL),(231,'Новая',3,NULL,NULL),(232,'Новая',3,NULL,NULL),(233,'Новая',3,NULL,NULL),(234,'dsf',3,NULL,NULL),(235,'dsf',3,NULL,NULL),(236,'dsf',3,NULL,NULL),(237,'dsf',3,NULL,NULL),(238,'dsf',3,NULL,NULL),(239,'ыва',3,NULL,NULL),(240,'ыва',3,NULL,NULL),(241,'sdf',3,NULL,NULL),(242,'sdf',3,NULL,NULL),(243,'sdf',3,NULL,NULL),(244,'Таблица',3,NULL,NULL),(245,'вТаблица',3,NULL,NULL),(246,'вТаблица',3,NULL,NULL),(247,'вТаблицаыва',3,NULL,NULL),(248,'df',3,NULL,NULL),(249,'dfsd',3,NULL,NULL),(250,'dfsd',3,NULL,NULL),(251,'dfsdsfd',3,NULL,NULL),(252,'dfsdsfd',3,NULL,NULL),(253,'dfsdsfd',3,NULL,NULL),(254,'dfsdsfdsd',3,NULL,NULL),(255,'dfsdsfdsd',3,NULL,NULL),(256,'sdf',3,NULL,NULL),(257,'sdf',3,NULL,NULL),(258,'sdf',3,NULL,NULL),(259,'sdf',3,NULL,NULL),(260,'dfa',3,NULL,NULL),(261,'dfa',3,NULL,NULL),(262,'dfa',3,NULL,NULL),(263,'dfa',3,NULL,NULL),(264,'dfa',3,NULL,NULL),(265,'dfa',3,NULL,NULL),(266,'dfa',3,NULL,NULL),(267,'dfa',3,NULL,NULL),(268,'SDF',3,NULL,NULL),(269,'SDFSDFSDF',3,NULL,NULL),(270,'SDFSDFSDF',3,NULL,NULL),(271,'SDFSDFSDF',3,NULL,NULL),(272,'SDFSDFSDF',3,NULL,NULL),(273,'SDFSDFSDF',3,NULL,NULL),(274,'SDFSDFSDF',3,NULL,NULL),(275,'SDFSDFSDF',3,NULL,NULL),(276,'SDFSDFSDF',3,NULL,NULL),(277,'SDFSDFSDF',3,NULL,NULL),(278,'SDFSDFSDF',3,NULL,NULL),(279,'SDFSDFSDF',3,NULL,NULL),(280,'SDFSDFSDF',3,NULL,NULL),(281,'SDFSDFSDF',3,NULL,NULL),(282,'SDFSDFSDF',3,NULL,NULL),(283,'SDFSDFSDF',3,NULL,NULL),(284,'SDFSDFSDF',3,NULL,NULL),(285,'SDFSDFSDF',3,NULL,NULL),(286,'Привет',3,'2020-08-18 15:11:17',NULL),(287,'Новая',3,'2020-08-19 09:36:47',NULL),(288,'смв',3,'2020-08-20 12:50:04',NULL),(289,'ыва',3,'2020-08-20 18:10:18',NULL),(290,'ыва',3,'2020-08-20 18:54:22',NULL);
/*!40000 ALTER TABLE `name_purse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obligations_purse`
--

DROP TABLE IF EXISTS `obligations_purse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `obligations_purse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `compensation` double(8,2) NOT NULL,
  `model_purse` tinyint(1) NOT NULL DEFAULT '0',
  `name_purse_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `obligations_purse_name_purse_id_foreign` (`name_purse_id`),
  KEY `obligations_purse_user_id_foreign` (`user_id`),
  CONSTRAINT `obligations_purse_name_purse_id_foreign` FOREIGN KEY (`name_purse_id`) REFERENCES `name_purse` (`id`) ON DELETE CASCADE,
  CONSTRAINT `obligations_purse_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obligations_purse`
--

LOCK TABLES `obligations_purse` WRITE;
/*!40000 ALTER TABLE `obligations_purse` DISABLE KEYS */;
/*!40000 ALTER TABLE `obligations_purse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `powers`
--

DROP TABLE IF EXISTS `powers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `powers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name_outlay_id` int unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `delete_outlay` tinyint(1) NOT NULL DEFAULT '0',
  `update_outlay` tinyint(1) NOT NULL DEFAULT '0',
  `look_outlay` tinyint(1) NOT NULL DEFAULT '1',
  `ability_outlay` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `powers_name_outlay_id_foreign` (`name_outlay_id`),
  KEY `powers_user_id_foreign` (`user_id`),
  CONSTRAINT `powers_name_outlay_id_foreign` FOREIGN KEY (`name_outlay_id`) REFERENCES `name_outlay` (`id`),
  CONSTRAINT `powers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `powers`
--

LOCK TABLES `powers` WRITE;
/*!40000 ALTER TABLE `powers` DISABLE KEYS */;
INSERT INTO `powers` VALUES (1,1,4,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(2,2,4,1,0,0,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(3,3,4,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(4,4,4,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(5,5,4,0,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(6,6,4,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(7,7,4,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(8,8,4,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(9,9,4,1,0,0,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(10,10,4,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(11,1,3,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(12,2,3,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(13,3,3,1,0,0,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(14,4,2,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(15,5,2,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(16,6,2,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(17,4,1,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(18,5,1,1,1,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(19,6,1,1,0,1,1,'2020-05-22 17:53:05','2020-05-22 17:53:05');
/*!40000 ALTER TABLE `powers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rows_outlay`
--

DROP TABLE IF EXISTS `rows_outlay`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rows_outlay` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `name_outlay_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rows_outlay_name_outlay_id_foreign` (`name_outlay_id`),
  CONSTRAINT `rows_outlay_name_outlay_id_foreign` FOREIGN KEY (`name_outlay_id`) REFERENCES `name_outlay` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rows_outlay`
--

LOCK TABLES `rows_outlay` WRITE;
/*!40000 ALTER TABLE `rows_outlay` DISABLE KEYS */;
INSERT INTO `rows_outlay` VALUES (1,'мяу',5.00,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(2,'русский',1.30,1,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(3,'иной',1.90,2,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(4,'нужный',9.00,2,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(5,'далекий',18.00,3,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(6,'основной',1.00,3,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(7,'полный',1.30,4,'2020-05-22 17:53:05','2020-05-24 17:53:05'),(8,'любой',1.50,5,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(9,'молодой',9.00,6,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(10,'маленький',7.00,7,'2020-05-22 17:53:05','2020-05-24 17:53:05'),(11,'ароматный',9.00,8,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(12,'горький',9.00,9,'2020-05-22 17:53:05','2020-05-24 17:53:05'),(13,'тихий',9.00,10,'2020-05-22 17:53:05','2020-05-23 17:53:05'),(14,'холодный',9.00,10,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(15,'впалый',9.00,9,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(16,'конический',9.00,9,'2020-05-22 17:53:05','2020-05-23 17:53:05'),(17,'выпуклый',9.00,8,'2020-05-22 17:53:05','2020-05-22 17:53:05'),(18,'прохладный',9.00,6,'2020-05-22 17:53:05','2020-05-23 17:53:05');
/*!40000 ALTER TABLE `rows_outlay` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rows_purse`
--

DROP TABLE IF EXISTS `rows_purse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rows_purse` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at_time` datetime NOT NULL,
  `name_purse_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rows_purse_name_purse_id_foreign` (`name_purse_id`),
  KEY `rows_purse_user_id_foreign` (`user_id`),
  CONSTRAINT `rows_purse_name_purse_id_foreign` FOREIGN KEY (`name_purse_id`) REFERENCES `name_purse` (`id`),
  CONSTRAINT `rows_purse_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rows_purse`
--

LOCK TABLES `rows_purse` WRITE;
/*!40000 ALTER TABLE `rows_purse` DISABLE KEYS */;
INSERT INTO `rows_purse` VALUES (1,'sd',3.00,'2020-07-03 09:32:30',73,2,NULL,NULL),(2,'ыва',3.00,'2020-07-03 09:32:30',80,2,NULL,NULL),(3,'df',3.00,'2020-07-03 18:50:56',89,2,NULL,NULL),(4,'dsf',4.00,'2020-07-17 18:51:31',89,2,NULL,NULL),(5,'fg',4.00,'2020-07-03 18:55:18',90,2,NULL,NULL),(6,'df',4.00,'2020-07-03 19:04:27',91,2,NULL,NULL),(7,'er',4.00,'2020-07-03 19:05:54',92,2,NULL,NULL),(8,'sdf',3.00,'2020-07-03 19:06:34',93,2,NULL,NULL),(9,'sd',3.00,'2020-07-03 19:06:45',94,2,NULL,NULL),(10,'df',4.00,'2020-07-03 19:08:48',95,2,NULL,NULL),(11,'sd',3.00,'2020-07-03 19:09:54',96,2,NULL,NULL),(12,'ва',4.00,'2020-07-03 22:30:42',97,2,NULL,NULL),(13,'ва',4.00,'2020-07-03 22:35:26',99,2,NULL,NULL),(14,'ва',4.00,'2020-07-09 22:35:38',99,2,NULL,NULL),(15,'er',4.00,'2020-07-03 22:41:23',101,2,NULL,NULL),(16,'sdf',3.00,'2020-07-03 23:00:52',103,2,NULL,NULL),(17,'ыва',3.00,'2020-07-05 12:38:41',105,3,NULL,NULL),(18,'ыва',4.00,'2020-07-05 12:38:47',106,3,NULL,NULL),(19,'выа',3.00,'2020-07-05 12:39:27',107,3,NULL,NULL),(20,'sdf',4.00,'2020-07-05 13:38:45',113,3,NULL,NULL),(21,'sdf',3.00,'2020-07-05 13:39:34',114,3,NULL,NULL),(22,'sdf',4.50,'2020-07-05 14:38:48',120,3,NULL,NULL),(23,'sdf',4.00,'2020-07-05 15:48:29',126,3,NULL,NULL),(24,'sdf',4.00,'2020-07-05 16:48:15',133,3,NULL,NULL),(25,'sfa',4.50,'2020-07-05 16:48:24',133,3,NULL,NULL),(26,'sdf',3.00,'2020-07-05 16:48:35',134,3,NULL,NULL),(27,'34',4.50,'2020-07-05 16:48:47',134,3,NULL,NULL),(28,'asdf',4.40,'2020-07-05 16:51:18',135,3,NULL,NULL),(29,'sdf',3.40,'2020-07-05 16:54:21',137,3,NULL,NULL),(30,'asd',3.50,'2020-07-05 16:54:30',137,3,NULL,NULL),(31,'xcv',2.40,'2020-07-05 16:57:52',141,3,NULL,NULL),(32,'sdf',4.50,'2020-07-05 17:00:49',142,3,NULL,NULL),(33,'ыва',44.40,'2020-07-06 00:29:51',147,3,NULL,NULL),(34,'svs',22.30,'2020-07-06 00:36:06',153,3,NULL,NULL),(35,'sdf',22.40,'2020-07-06 00:38:36',153,3,NULL,NULL),(36,'sdf',22.56,'2020-07-06 00:38:50',153,3,NULL,NULL),(37,'sdf',3.40,'2020-07-06 00:39:05',154,3,NULL,NULL),(38,'333`',22.40,'2020-07-06 00:39:16',154,3,NULL,NULL),(39,'asdf',3333.40,'2020-07-06 00:39:26',154,3,NULL,NULL),(40,'asdf',222.30,'2020-07-06 00:39:36',154,3,NULL,NULL),(41,'szv',2222.00,'2020-07-06 00:39:48',154,3,NULL,NULL),(42,'sdf',2.20,'2020-07-06 00:42:49',156,3,NULL,NULL),(43,'фыва',2.20,'2020-07-06 00:43:59',157,3,NULL,NULL),(44,'ыва',2.30,'2020-07-06 00:45:54',160,3,NULL,NULL),(45,'ыва',2.34,'2020-07-06 00:46:08',160,3,NULL,NULL),(46,'пвн',3.70,'2020-07-06 00:49:19',161,3,NULL,NULL),(47,'44.8',44.80,'2020-07-06 00:49:37',161,3,NULL,NULL),(48,'sdf',222.33,'2020-07-06 00:51:20',163,3,NULL,NULL),(49,'sdf',222.33,'2020-07-06 00:51:46',163,3,NULL,NULL),(50,'sdf',2223.34,'2020-07-06 00:51:58',163,3,NULL,NULL),(51,'фва',2.30,'2020-07-07 19:03:41',164,3,NULL,NULL),(52,'sfd',3.80,'2020-07-07 19:05:10',164,3,NULL,NULL),(53,'sg',3.00,'2020-07-07 19:07:13',165,3,NULL,NULL),(54,'sdf',3.00,'2020-07-07 19:07:52',166,3,NULL,NULL),(55,'sdf',3.00,'2020-07-07 19:07:58',166,3,NULL,NULL),(56,'sf',3.00,'2020-07-07 19:08:32',167,3,NULL,NULL),(57,'sdf',3.00,'2020-07-07 19:08:35',167,3,NULL,NULL),(58,'sdf',3.00,'2020-07-07 19:08:38',167,3,NULL,NULL),(59,'sdf',3.00,'2020-07-07 19:13:51',168,3,NULL,NULL),(60,'zdf',5.00,'2020-07-07 19:13:55',168,3,NULL,NULL),(61,'sdf',3.00,'2020-07-07 19:14:08',169,3,NULL,NULL),(62,'sdf',3.00,'2020-07-07 19:14:16',169,3,NULL,NULL),(63,'sdf',4.00,'2020-07-07 19:14:30',170,3,NULL,NULL),(64,'334',4.00,'2020-07-07 19:14:34',170,3,NULL,NULL),(65,'sg',3.00,'2020-07-07 19:14:39',170,3,NULL,NULL),(66,'sdf',3.00,'2020-07-07 19:15:21',171,3,NULL,NULL),(67,'sd',2.00,'2020-07-07 19:15:27',171,3,NULL,NULL),(68,'sdf',3.00,'2020-07-07 19:17:15',172,3,NULL,NULL),(69,'sdf',3.00,'2020-07-07 19:17:18',172,3,NULL,NULL),(70,'sdf',3.00,'2020-07-07 19:17:57',173,3,NULL,NULL),(71,'sdf',3.00,'2020-07-07 19:18:06',174,3,NULL,NULL),(72,'sdf',3.00,'2020-07-07 19:18:30',175,3,NULL,NULL),(73,'sdf',3.00,'2020-07-07 19:18:53',176,3,NULL,NULL),(74,'sdf',3.00,'2020-07-07 19:19:30',177,3,NULL,NULL),(75,'sdf',3.00,'2020-07-07 19:19:50',178,3,NULL,NULL),(76,'sdf',3.00,'2020-07-07 19:19:54',178,3,NULL,NULL),(77,'sdf',4.00,'2020-07-07 19:19:59',178,3,NULL,NULL),(78,'sfd',4.00,'2020-07-07 19:21:54',179,3,NULL,NULL),(79,'34',4.00,'2020-07-07 19:21:59',179,3,NULL,NULL),(80,'sfd',3.00,'2020-07-07 19:22:30',180,3,NULL,NULL),(81,'sdf',3.00,'2020-07-07 19:24:24',181,3,NULL,NULL),(82,'sdf',3.00,'2020-07-07 19:24:28',181,3,NULL,NULL),(83,'sdf',3.00,'2020-07-07 19:25:09',182,3,NULL,NULL),(84,'sdf',4.00,'2020-07-07 19:25:22',182,3,NULL,NULL),(85,'sdf',3.00,'2020-07-07 19:36:44',183,3,NULL,NULL),(86,'sdf',3.00,'2020-07-07 19:37:42',184,3,NULL,NULL),(87,'sdf',3.00,'2020-07-07 19:37:50',185,3,NULL,NULL),(88,'sdf',3.00,'2020-07-07 19:38:07',186,3,NULL,NULL),(89,'sdf',3.00,'2020-07-07 19:38:22',187,3,NULL,NULL),(90,'sd',3.00,'2020-07-07 19:38:40',188,3,NULL,NULL),(91,'sd',3.00,'2020-07-07 19:39:40',189,3,NULL,NULL),(92,'sdf',3.00,'2020-07-07 19:44:52',190,3,NULL,NULL),(93,'sfd',3.00,'2020-07-07 19:45:03',190,3,NULL,NULL),(94,'sd',3.00,'2020-07-07 19:45:30',191,3,NULL,NULL),(95,'wef',3.00,'2020-07-07 19:45:35',191,3,NULL,NULL),(96,'sd',3.40,'2020-07-07 19:45:44',191,3,NULL,NULL),(97,'2433',3.40,'2020-07-07 19:45:55',191,3,NULL,NULL),(98,'названиеёё',2.00,'2020-07-07 19:46:40',192,3,NULL,NULL),(99,'ыва',3.00,'2020-07-07 19:46:43',192,3,NULL,NULL),(100,'ыва',4.80,'2020-07-07 19:46:49',192,3,NULL,NULL),(101,'уцк',3.70,'2020-07-07 19:46:57',192,3,NULL,NULL),(102,'ке',4.00,'2020-07-20 19:49:11',192,3,NULL,NULL),(103,'ыва',3.00,'2020-07-07 19:53:47',194,3,NULL,NULL),(104,'ыва',3.00,'2020-07-07 19:54:26',195,3,NULL,NULL),(105,'ree',3.00,'2020-07-07 19:59:16',196,3,NULL,NULL),(106,'fgd',4.00,'2020-07-07 20:02:05',197,3,NULL,NULL),(107,'sdf',4.00,'2020-07-07 20:02:42',198,3,NULL,NULL),(108,'vd',4.00,'2020-07-07 20:05:55',199,3,NULL,NULL),(109,'Расходы',3.00,'2020-07-12 17:07:03',200,3,NULL,NULL),(110,'sdf',3.00,'2020-07-12 17:13:45',201,3,NULL,NULL),(111,'sdf',3.00,'2020-07-12 17:14:19',202,3,NULL,NULL),(112,'sdf',3.00,'2020-07-12 17:15:08',203,3,NULL,NULL),(113,'sdf',2.00,'2020-07-12 17:18:09',204,3,NULL,NULL),(114,'sdf',3.00,'2020-07-12 18:39:39',208,3,NULL,NULL),(115,'sdf',3.00,'2020-07-12 19:17:15',210,3,NULL,NULL),(116,'новоый',4.00,'2020-07-13 15:20:08',212,3,NULL,NULL),(117,'dsf',3.00,'2020-07-14 10:53:31',213,3,NULL,NULL),(118,'sdf',3.00,'2020-07-14 10:55:19',214,3,NULL,NULL),(119,'sdf',3.00,'2020-07-14 10:55:59',215,3,NULL,NULL),(120,'sdf',3.00,'2020-07-14 10:58:06',216,3,NULL,NULL),(121,'sdf',3.00,'2020-07-14 10:59:25',218,3,NULL,NULL),(122,'sdf',3.00,'2020-07-14 11:01:15',219,3,NULL,NULL),(123,'df',3.00,'2020-07-14 11:02:15',220,3,NULL,NULL),(124,'SDF',3.00,'2020-07-14 11:47:54',221,3,NULL,NULL),(125,'SDF',3.00,'2020-07-14 11:48:13',222,3,NULL,NULL),(126,'SDF',3.00,'2020-07-14 11:50:09',223,3,NULL,NULL),(127,'SDF',3.00,'2020-07-14 11:50:32',224,3,NULL,NULL),(128,'SDF',3.00,'2020-07-14 11:51:08',225,3,NULL,NULL),(129,'sdf',4.00,'2020-07-14 11:54:56',226,3,NULL,NULL),(130,'ыва',4.00,'2020-07-14 12:26:42',232,3,NULL,NULL),(131,'ыва',3.00,'2020-07-14 12:27:24',233,3,NULL,NULL),(139,'sdf',3.00,'2020-07-14 15:07:53',237,3,NULL,NULL),(143,'sdf',4.00,'2020-07-18 16:56:24',284,3,NULL,NULL),(144,'sfd',3.00,'2020-07-18 18:07:02',285,3,NULL,NULL),(145,'sdf',4.00,'2020-07-18 18:07:38',285,3,NULL,NULL),(146,'ыва',3.00,'2020-07-18 18:11:24',286,3,NULL,NULL),(147,'sdf',4.00,'2020-07-18 18:13:25',286,3,'2020-08-18 15:13:25',NULL),(148,'sdf',4.00,'2020-07-18 18:13:57',286,3,'2020-08-18 15:13:57',NULL),(149,'ыва',3.00,'2020-07-20 15:50:11',288,3,'2020-08-20 12:50:11',NULL),(150,'sdf',4.00,'2020-07-20 15:52:33',288,3,'2020-08-20 12:52:33',NULL),(151,'sdf',3.00,'2020-07-20 15:53:04',288,3,'2020-08-20 12:53:04',NULL),(152,'gjf',5.00,'2020-07-20 15:57:00',288,3,'2020-08-20 12:57:00',NULL),(153,'gcj',5.00,'2020-07-20 15:57:55',288,3,'2020-08-20 12:57:55',NULL),(154,'ad',3.00,'2020-07-20 16:03:23',288,3,'2020-08-20 13:03:23',NULL),(155,'sdf',3.00,'2020-07-20 16:21:53',288,3,'2020-08-20 13:21:53',NULL),(156,'ыва3',3.00,'2020-07-20 16:25:48',288,3,'2020-08-20 13:25:48',NULL),(157,'sdf',3.00,'2020-07-20 16:26:42',288,3,'2020-08-20 13:26:42',NULL),(158,'sdf',3.00,'2020-07-20 16:26:53',288,3,'2020-08-20 13:26:53',NULL),(159,'sdf',3.00,'2020-07-20 16:28:15',288,3,'2020-08-20 13:28:15',NULL),(160,'sdf',3.00,'2020-07-20 16:28:42',288,3,'2020-08-20 13:28:42',NULL),(161,'sdf',3.00,'2020-07-20 16:29:27',288,3,'2020-08-20 13:29:27',NULL),(164,'йуц',3.00,'2020-07-20 21:10:25',289,3,'2020-08-20 18:10:25',NULL),(165,'ыва',3.00,'2020-07-20 21:18:08',289,3,'2020-08-20 18:18:08',NULL),(166,'ыва',4.00,'2020-07-20 21:24:24',289,3,'2020-08-20 18:24:24',NULL),(167,'sdf',3.00,'2020-07-20 21:44:04',289,3,'2020-08-20 18:44:04',NULL),(169,'fda',3.00,'2020-07-20 21:45:10',289,3,'2020-08-20 18:45:10',NULL),(171,'324',3.00,'2020-07-20 21:45:21',289,3,'2020-08-20 18:45:21',NULL);
/*!40000 ALTER TABLE `rows_purse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Оля','koverchik-work@yandex.ru',NULL,'$2y$10$b7obCbZel7iqBCNekC3xme3NxX2.bDrtM8Q1wiznZ3aYkymPr3/MG',NULL,'2020-07-09 09:32:30','2020-07-09 09:32:30'),(2,'Маша','koverchik.o@gmail.com',NULL,'$2y$10$31ca1JF.IgxfVEn0TyjOFOLieIHI/XYoNbA23MfI/1Q9kMEFP6LWK',NULL,'2020-07-09 09:32:52','2020-07-09 09:32:52'),(3,'Саша','test@gmail.com',NULL,'$2y$10$lPpTYmX7AkNKcCm8FFA/kOWIloY1/rOLJvB5YSLvqUUJaREN8c.5G',NULL,'2020-07-09 09:33:19','2020-07-09 09:33:19'),(4,'Паша','test2@gmail.com',NULL,'$2y$10$uCpnNdCoZXtMPa4MPuWcgOjGSm2oj2dQ0A3LGeQtGG/0hwYifUMT.',NULL,'2020-07-09 09:33:53','2020-07-09 09:33:53');
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

-- Dump completed on 2020-08-25 16:53:03
