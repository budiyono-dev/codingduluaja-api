-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: codingduluaja
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `client_app`
--

DROP TABLE IF EXISTS `client_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client_app` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `app_key` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_app_user_id_foreign` (`user_id`),
  CONSTRAINT `client_app_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_app`
--

LOCK TABLES `client_app` WRITE;
/*!40000 ALTER TABLE `client_app` DISABLE KEYS */;
INSERT INTO `client_app` VALUES (1,1,'pakan ikan','7ceb4fa11dba48ff84b5098c38b9deb7','2023-10-02 13:28:19','2023-10-02 13:28:19'),(2,1,'kebun','8774a85a16074806acb7a6149f8c98c9','2023-10-02 13:28:19','2023-10-02 13:28:19'),(3,1,'kopi shop','5ee5c4fef5e3451e8616d39ca985aadf','2023-10-02 13:28:19','2023-10-02 13:28:19'),(4,1,'react app','d4caabc3ad604b809e8655fe2a043670','2023-10-02 13:28:19','2023-10-02 13:28:19'),(5,1,'pos web','8b6997d6e06a46bba128ecdcb4d8e48d','2023-10-02 13:28:19','2023-10-02 13:28:19'),(6,1,'testing','e49e34a5f09d49fe9add396ff75a5e9c','2023-10-02 13:28:19','2023-10-02 13:28:19');
/*!40000 ALTER TABLE `client_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client_resource`
--

DROP TABLE IF EXISTS `client_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client_resource` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `master_resource_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_resource_user_id_foreign` (`user_id`),
  KEY `client_resource_master_resource_id_foreign` (`master_resource_id`),
  CONSTRAINT `client_resource_master_resource_id_foreign` FOREIGN KEY (`master_resource_id`) REFERENCES `master_resource` (`id`),
  CONSTRAINT `client_resource_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client_resource`
--

LOCK TABLES `client_resource` WRITE;
/*!40000 ALTER TABLE `client_resource` DISABLE KEYS */;
INSERT INTO `client_resource` VALUES (1,1,1,'2023-10-02 06:32:22','2023-10-02 06:32:22'),(2,1,2,'2023-10-02 06:32:27','2023-10-02 06:32:27'),(3,1,3,'2023-10-02 06:32:33','2023-10-02 06:32:33'),(4,1,4,'2023-10-02 06:32:38','2023-10-02 06:32:38');
/*!40000 ALTER TABLE `client_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `connected_app`
--

DROP TABLE IF EXISTS `connected_app`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `connected_app` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_resource_id` bigint unsigned NOT NULL,
  `client_app_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `connected_app_client_resource_id_foreign` (`client_resource_id`),
  KEY `connected_app_client_app_id_foreign` (`client_app_id`),
  CONSTRAINT `connected_app_client_app_id_foreign` FOREIGN KEY (`client_app_id`) REFERENCES `client_app` (`id`),
  CONSTRAINT `connected_app_client_resource_id_foreign` FOREIGN KEY (`client_resource_id`) REFERENCES `client_resource` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `connected_app`
--

LOCK TABLES `connected_app` WRITE;
/*!40000 ALTER TABLE `connected_app` DISABLE KEYS */;
INSERT INTO `connected_app` VALUES (1,1,1,'2023-10-02 06:33:05','2023-10-02 06:33:05'),(2,2,2,'2023-10-02 06:33:13','2023-10-02 06:33:13'),(3,1,4,'2023-10-02 06:33:19','2023-10-02 06:33:19'),(4,3,4,'2023-10-02 06:33:27','2023-10-02 06:33:27'),(5,3,5,'2023-10-02 06:33:39','2023-10-02 06:33:39'),(6,4,6,'2023-10-02 06:33:52','2023-10-02 06:33:52'),(7,4,5,'2023-10-02 06:34:02','2023-10-02 06:34:02'),(8,1,2,'2023-10-02 06:34:17','2023-10-02 06:34:17'),(9,4,3,'2023-10-02 06:34:28','2023-10-02 06:34:28');
/*!40000 ALTER TABLE `connected_app` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `expired_token`
--

DROP TABLE IF EXISTS `expired_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `expired_token` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `exp_value` int NOT NULL,
  `unit` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `expired_token`
--

LOCK TABLES `expired_token` WRITE;
/*!40000 ALTER TABLE `expired_token` DISABLE KEYS */;
INSERT INTO `expired_token` VALUES (1,1,'DAY','2023-10-02 06:21:33','2023-10-02 06:21:33'),(2,1,'DAY','2023-10-02 06:21:33','2023-10-02 06:21:33');
/*!40000 ALTER TABLE `expired_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `master_resource`
--

DROP TABLE IF EXISTS `master_resource`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `master_resource` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_resource`
--

LOCK TABLES `master_resource` WRITE;
/*!40000 ALTER TABLE `master_resource` DISABLE KEYS */;
INSERT INTO `master_resource` VALUES (1,'Todolist','2023-10-02 06:21:33','2023-10-02 06:21:33'),(2,'Mahasiswa','2023-10-02 13:28:19','2023-10-02 13:28:19'),(3,'Wilayah','2023-10-02 13:28:19','2023-10-02 13:28:19'),(4,'API','2023-10-02 13:28:19','2023-10-02 13:28:19');
/*!40000 ALTER TABLE `master_resource` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_item`
--

DROP TABLE IF EXISTS `menu_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_item` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menu_parent_id` bigint unsigned NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_item_menu_parent_id_sequence_unique` (`menu_parent_id`,`sequence`),
  KEY `menu_item_sequence_index` (`sequence`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_item`
--

LOCK TABLES `menu_item` WRITE;
/*!40000 ALTER TABLE `menu_item` DISABLE KEYS */;
INSERT INTO `menu_item` VALUES (1,1,'menu.item.app_resource','page.appResource',1,'2023-10-02 06:21:32','2023-10-02 06:21:32'),(2,1,'menu.item.app_client','page.appClient',2,'2023-10-02 06:21:32','2023-10-02 06:21:32'),(3,1,'menu.item.app_manager','page.appManager',3,'2023-10-02 06:21:32','2023-10-02 06:21:32');
/*!40000 ALTER TABLE `menu_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_parent`
--

DROP TABLE IF EXISTS `menu_parent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menu_parent` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu_parent_sequence_unique` (`sequence`),
  KEY `menu_parent_sequence_index` (`sequence`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_parent`
--

LOCK TABLES `menu_parent` WRITE;
/*!40000 ALTER TABLE `menu_parent` DISABLE KEYS */;
INSERT INTO `menu_parent` VALUES (1,'menu.parent.application',1,'2023-10-02 06:21:32','2023-10-02 06:21:32');
/*!40000 ALTER TABLE `menu_parent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_reset_tokens_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2023_06_13_030707_create_users_table',1),(5,'2023_08_17_120045_create_app_client_table',1),(6,'2023_08_18_024305_create_expired_token_table',1),(7,'2023_08_18_171650_create_menu_parent_table',1),(8,'2023_08_18_171707_create_menu_item_table',1),(9,'2023_08_18_173158_add_user',1),(10,'2023_08_18_173350_add_menu',1),(11,'2023_09_11_103831_create_master_resources_table',1),(12,'2023_09_11_103856_create_client_resources_table',1),(13,'2023_09_11_104128_add_master_resource',1),(14,'2023_09_12_085005_create_todolists_table',1),(15,'2023_09_14_102906_create_connected_app',1),(16,'2023_10_02_085443_add_expired_token',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `todolist`
--

DROP TABLE IF EXISTS `todolist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `todolist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `todolist`
--

LOCK TABLES `todolist` WRITE;
/*!40000 ALTER TABLE `todolist` DISABLE KEYS */;
/*!40000 ALTER TABLE `todolist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_username_index` (`username`),
  KEY `users_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adminTest','admin','test','male','admin@gmail.com','$2y$10$pLlIf1m0r06Qcs0dbGjHKOiPHr3ilnzU13q6qxmD6yl867ml8psKG',NULL,NULL,NULL,NULL);
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

-- Dump completed on 2023-10-02 20:45:34
