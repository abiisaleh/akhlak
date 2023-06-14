-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: akhlak
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

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
-- Table structure for table `auth_activation_attempts`
--

DROP TABLE IF EXISTS `auth_activation_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_activation_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_activation_attempts`
--

LOCK TABLES `auth_activation_attempts` WRITE;
/*!40000 ALTER TABLE `auth_activation_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_activation_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups`
--

DROP TABLE IF EXISTS `auth_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups`
--

LOCK TABLES `auth_groups` WRITE;
/*!40000 ALTER TABLE `auth_groups` DISABLE KEYS */;
INSERT INTO `auth_groups` VALUES (1,'admin','kelola data admin'),(2,'pemilik','kelola data pemilik');
/*!40000 ALTER TABLE `auth_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_permissions`
--

DROP TABLE IF EXISTS `auth_groups_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_permissions` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  KEY `group_id_permission_id` (`group_id`,`permission_id`),
  CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_permissions`
--

LOCK TABLES `auth_groups_permissions` WRITE;
/*!40000 ALTER TABLE `auth_groups_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_groups_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `group_id` int unsigned NOT NULL DEFAULT '0',
  `user_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  KEY `group_id_user_id` (`group_id`,`user_id`),
  CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (1,1),(2,2),(2,3),(2,4),(2,5),(2,6);
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'127.0.0.1','admin@demo.com',1,'2023-06-03 16:40:58',1),(2,'127.0.0.1','akhlak@demo.com',2,'2023-06-03 16:48:56',1),(3,'127.0.0.1','admin@demo.com',1,'2023-06-03 16:49:29',1),(4,'127.0.0.1','abi@demo.com',3,'2023-06-03 16:56:35',1),(5,'127.0.0.1','admin@demo.com',1,'2023-06-03 16:56:57',1),(6,'127.0.0.1','admin@demo.com',1,'2023-06-04 02:04:56',1),(7,'127.0.0.1','abi@demo.com',3,'2023-06-04 05:55:24',1),(8,'127.0.0.1','admin@demo.com',1,'2023-06-04 06:09:18',1),(9,'127.0.0.1','darmono@demo.com',4,'2023-06-13 11:40:05',1),(10,'127.0.0.1','admin@demo.com',1,'2023-06-13 11:47:20',1),(11,'127.0.0.1','admin@demo.com',1,'2023-06-13 12:03:11',1),(12,'127.0.0.1','fauwzi@demo.com',5,'2023-06-13 23:06:56',1),(13,'127.0.0.1','sutaji@demo.com',6,'2023-06-13 23:51:49',1),(14,'127.0.0.1','admin@demo.com',1,'2023-06-14 00:03:14',1),(15,'127.0.0.1','admin@demo.com',1,'2023-06-14 12:15:13',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions`
--

DROP TABLE IF EXISTS `auth_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions`
--

LOCK TABLES `auth_permissions` WRITE;
/*!40000 ALTER TABLE `auth_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_reset_attempts`
--

DROP TABLE IF EXISTS `auth_reset_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_reset_attempts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_reset_attempts`
--

LOCK TABLES `auth_reset_attempts` WRITE;
/*!40000 ALTER TABLE `auth_reset_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_reset_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_tokens`
--

DROP TABLE IF EXISTS `auth_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_tokens` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int unsigned NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_tokens_user_id_foreign` (`user_id`),
  KEY `selector` (`selector`),
  CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_tokens`
--

LOCK TABLES `auth_tokens` WRITE;
/*!40000 ALTER TABLE `auth_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_users_permissions`
--

DROP TABLE IF EXISTS `auth_users_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_users_permissions` (
  `user_id` int unsigned NOT NULL DEFAULT '0',
  `permission_id` int unsigned NOT NULL DEFAULT '0',
  KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  KEY `user_id_permission_id` (`user_id`,`permission_id`),
  CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_users_permissions`
--

LOCK TABLES `auth_users_permissions` WRITE;
/*!40000 ALTER TABLE `auth_users_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_users_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fasilitas`
--

DROP TABLE IF EXISTS `fasilitas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fasilitas` (
  `idFasilitas` int unsigned NOT NULL AUTO_INCREMENT,
  `fkRuko` int NOT NULL,
  `fkKriteria` int NOT NULL,
  `fkSubkriteria` int NOT NULL,
  PRIMARY KEY (`idFasilitas`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fasilitas`
--

LOCK TABLES `fasilitas` WRITE;
/*!40000 ALTER TABLE `fasilitas` DISABLE KEYS */;
INSERT INTO `fasilitas` VALUES (1,1,1,2),(2,1,2,5),(3,1,3,8),(4,1,4,10),(5,1,5,0),(6,1,6,0),(7,1,7,0),(8,1,8,0),(9,1,9,0),(10,1,10,0),(11,2,1,1),(12,2,2,6),(13,2,3,9),(14,2,4,11),(15,2,5,13),(16,2,6,18),(17,2,7,20),(18,2,8,22),(19,2,9,26),(20,2,10,28),(21,3,1,3),(22,3,2,7),(23,3,3,8),(24,3,4,12),(25,3,5,13),(26,3,6,17),(27,3,7,20),(28,3,8,22),(29,3,9,26),(30,3,10,27),(31,4,1,3),(32,4,2,6),(33,4,3,8),(34,4,4,12),(35,4,5,13),(36,4,6,17),(37,4,7,20),(38,4,8,22),(39,4,9,26),(40,4,10,27),(41,5,1,3),(42,5,2,7),(43,5,3,8),(44,5,4,12),(45,5,5,13),(46,5,6,17),(47,5,7,20),(48,5,8,22),(49,5,9,26),(50,5,10,27);
/*!40000 ALTER TABLE `fasilitas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kriteria`
--

DROP TABLE IF EXISTS `kriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kriteria` (
  `idKriteria` int unsigned NOT NULL AUTO_INCREMENT,
  `kriteria` varchar(50) NOT NULL,
  `bobot` int NOT NULL,
  PRIMARY KEY (`idKriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kriteria`
--

LOCK TABLES `kriteria` WRITE;
/*!40000 ALTER TABLE `kriteria` DISABLE KEYS */;
INSERT INTO `kriteria` VALUES (1,'harga',18),(2,'ukuran',16),(3,'lokasi',15),(4,'fasilitas',13),(5,'kondisi jalan',11),(6,'lingkungan',9),(7,'listrik',7),(8,'lantai',5),(9,'halaman parkir',2),(10,'air',4);
/*!40000 ALTER TABLE `kriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2017-11-20-223112','App\\Database\\Migrations\\CreateAuthTables','default','App',1685810113,1),(2,'2023-04-15-021725','App\\Database\\Migrations\\Ruko','default','App',1685810113,1),(3,'2023-04-15-021753','App\\Database\\Migrations\\Kriteria','default','App',1685810113,1),(4,'2023-04-15-021814','App\\Database\\Migrations\\Subkriteria','default','App',1685810113,1),(5,'2023-04-15-023456','App\\Database\\Migrations\\Pesanan','default','App',1685810113,1),(6,'2023-04-15-023527','App\\Database\\Migrations\\Fasilitas','default','App',1685810113,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pesanan`
--

DROP TABLE IF EXISTS `pesanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pesanan` (
  `idPesanan` int unsigned NOT NULL AUTO_INCREMENT,
  `fkRuko` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int NOT NULL,
  `pembayaran` varchar(30) NOT NULL,
  PRIMARY KEY (`idPesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pesanan`
--

LOCK TABLES `pesanan` WRITE;
/*!40000 ALTER TABLE `pesanan` DISABLE KEYS */;
/*!40000 ALTER TABLE `pesanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ruko`
--

DROP TABLE IF EXISTS `ruko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ruko` (
  `idRuko` int unsigned NOT NULL AUTO_INCREMENT,
  `alamat` varchar(50) NOT NULL,
  `lat` varchar(50) NOT NULL,
  `lng` varchar(50) NOT NULL,
  `harga` int NOT NULL,
  `pemilik` varchar(30) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `dokumen` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `verifikasi` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `idUser` varchar(3) NOT NULL,
  PRIMARY KEY (`idRuko`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ruko`
--

LOCK TABLES `ruko` WRITE;
/*!40000 ALTER TABLE `ruko` DISABLE KEYS */;
INSERT INTO `ruko` VALUES (3,'Koya Barat','-2.6431730783281084','140.80640316009524',45000000,'Darmono','082238204776','1686656817_458cb9931d73041b0bdb.pdf','1686656817_d0ba4c75e0fa92a46cc1.png','1','0','4'),(4,'Koya Barat','-2.6597421014458376','140.80492794513705',50000000,'Fauwzi','082198655602','1686697901_c71f4c5c512f18247740.pdf','1686697901_46dcc8a0c088258612a8.jpg','0','0','5'),(5,'Koya Barat','-2.6441108523725667','140.8059096336365',40000000,'sutaji','082198655602','1686700503_12731d77d73a1d887517.pdf','1686700503_9e16402993f2914a8fc3.jpg','0','0','6');
/*!40000 ALTER TABLE `ruko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subkriteria`
--

DROP TABLE IF EXISTS `subkriteria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subkriteria` (
  `idSubkriteria` int unsigned NOT NULL AUTO_INCREMENT,
  `fkKriteria` varchar(50) NOT NULL,
  `subkriteria` varchar(30) NOT NULL,
  `nilai` int NOT NULL,
  PRIMARY KEY (`idSubkriteria`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subkriteria`
--

LOCK TABLES `subkriteria` WRITE;
/*!40000 ALTER TABLE `subkriteria` DISABLE KEYS */;
INSERT INTO `subkriteria` VALUES (1,'1','< 26 Juta',1),(2,'1','26 Juta - 30 Juta',2),(3,'1','31 Juta - 60 Juta',3),(4,'1','> 60 Juta',4),(5,'2','< 5 x 10 m',1),(6,'2','5 x 10 m - 5 x 20 m',2),(7,'2','> 5 x 20 m',3),(8,'3','koya barat',0),(9,'3','koya timur',0),(10,'4','kamar mandi',1),(11,'4','kamar mandi dan kamar tidur',2),(12,'4','kamar mandi, kamar tidur dan d',3),(13,'5','jalan beraspal',4),(14,'5','jalan timbunan',3),(15,'5','jalan berlubang',2),(16,'5','jalan corcoran semen',1),(17,'6','perumahan',3),(18,'6','sekolah',1),(19,'6','pasar',2),(20,'7','prabayar',2),(21,'7','pascabayar',1),(22,'8','2 lantai',2),(23,'8','1 lantai',1),(24,'9','kendaraan roda 2',1),(25,'9','kendaraan roda 4',2),(26,'9','kendaraan roda 6',3),(27,'10','sumur bor',2),(28,'10','PDAM',1);
/*!40000 ALTER TABLE `subkriteria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin@demo.com','admin','$2y$10$5o.FGeie.MBXd83PNbMs0erMo10FeTYCS/XICVdPuA4uiqkLB1M8y',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-03 16:35:13','2023-06-03 16:35:14',NULL),(2,'akhlak@demo.com','akhlak','$2y$10$MEENVUnwMb42RQARh5wrQ.W2vYFL9K2lLqpPwVflbIYc7GmgUD67S',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-03 16:35:14','2023-06-03 16:35:14',NULL),(3,'abi@demo.com','abiisaleh','$2y$10$IEHpqWNt49M1Qp6NKIyjYOadUWjpgcxdr1lN9SyO8ZYw6hfRwbHAK',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-03 16:56:27','2023-06-03 16:56:27',NULL),(4,'darmono@demo.com','darmono','$2y$10$qJrApj/sMfn16qZIDjTgIusl4UzZmjlHSo0jb5vYEmyputmx4FvI6',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-13 11:39:58','2023-06-13 11:39:58',NULL),(5,'fauwzi@demo.com','fauwzi','$2y$10$sjfQt5SCQwfRxf2StYc8a.pbpuSDeHn6dMRsEGbYaL.yc81Up67EW',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-13 23:06:52','2023-06-13 23:06:52',NULL),(6,'sutaji@demo.com','sutaji','$2y$10$PE2J3Huyk3a6TI294c/FJOt7BKkDovcKCnZonB9iFdvPXvlAPfMs6',NULL,NULL,NULL,NULL,NULL,NULL,1,0,'2023-06-13 23:51:42','2023-06-13 23:51:42',NULL);
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

-- Dump completed on 2023-06-14 21:28:18
