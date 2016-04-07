-- MySQL dump 10.15  Distrib 10.0.21-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: homeblack
-- ------------------------------------------------------
-- Server version	10.0.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bpo`
--

DROP TABLE IF EXISTS `bpo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bpo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `proyecto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaini` date NOT NULL,
  `fechafin` date NOT NULL,
  `fechacompra` date NOT NULL,
  `cliente` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `costocompro` int(11) NOT NULL,
  `costoreal` int(11) NOT NULL,
  `precioventa` int(11) NOT NULL,
  `proveedor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avance` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bpo`
--

LOCK TABLES `bpo` WRITE;
/*!40000 ALTER TABLE `bpo` DISABLE KEYS */;
INSERT INTO `bpo` VALUES (3,'2016-01-13 02:32:03','2016-01-13 02:32:03','prueba','0000-00-00','0000-00-00','0000-00-00','prueba',2,2,4,'prueba',50),(4,'2016-01-13 02:33:59','2016-01-13 02:33:59','prueba','2016-01-12','2016-01-12','2016-01-12','prueba',2,2,4,'prueba',50);
/*!40000 ALTER TABLE `bpo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_areas`
--

DROP TABLE IF EXISTS `catalogo_areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_areas` (
  `clave_area` int(11) NOT NULL,
  `desc_area` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_areas`
--

LOCK TABLES `catalogo_areas` WRITE;
/*!40000 ALTER TABLE `catalogo_areas` DISABLE KEYS */;
INSERT INTO `catalogo_areas` VALUES (102,'Finanzas'),(101,'BPO');
/*!40000 ALTER TABLE `catalogo_areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_estatus`
--

DROP TABLE IF EXISTS `catalogo_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_estatus` (
  `clave_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `desc_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_estatus`
--

LOCK TABLES `catalogo_estatus` WRITE;
/*!40000 ALTER TABLE `catalogo_estatus` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_puestos`
--

DROP TABLE IF EXISTS `catalogo_puestos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_puestos` (
  `clave_puesto` int(11) NOT NULL,
  `desc_puesto` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_puestos`
--

LOCK TABLES `catalogo_puestos` WRITE;
/*!40000 ALTER TABLE `catalogo_puestos` DISABLE KEYS */;
INSERT INTO `catalogo_puestos` VALUES (200,'Director'),(201,'Gerente'),(202,'Coordinador'),(203,'Operativo');
/*!40000 ALTER TABLE `catalogo_puestos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_roles`
--

DROP TABLE IF EXISTS `catalogo_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_roles` (
  `clave_rol` int(11) NOT NULL,
  `desc_rol` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_roles`
--

LOCK TABLES `catalogo_roles` WRITE;
/*!40000 ALTER TABLE `catalogo_roles` DISABLE KEYS */;
INSERT INTO `catalogo_roles` VALUES (300,'Senior'),(301,'Intermedio'),(302,'Basico'),(303,'Becario');
/*!40000 ALTER TABLE `catalogo_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empleados` (
  `id_empleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_pat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apellido_mat` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `clave_puesto` int(11) NOT NULL,
  `RFC` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `tel_casa` int(11) NOT NULL,
  `fecha_ing` date NOT NULL,
  `direccion` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `clave_area` int(11) NOT NULL,
  `clave_status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `clave_rol` int(11) NOT NULL,
  `fecha_baja` date NOT NULL,
  `fecha_cambio` date NOT NULL,
  `jefe_inmediato` int(11) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Michale','Powlowski','Boehm',8,'HESC8703',7,'1980-09-01','Gutmann Crest',100,'9',2,'2000-06-29','2004-06-24',1),(2,'Keara','Ryan','Gusikowski',7,'HESC8703',4,'1992-07-13','Konopelski Sh',12,'7',5,'1998-02-09','1976-10-17',3),(3,'Tristin','Cormier','Schuster',3,'HESC8703',2,'2008-12-03','Hailey Views',11,'5',4,'2004-12-26','2013-01-23',2),(4,'Gerry','Pagac','Feil',1,'HESC8703',4,'2014-08-27','Goldner Mills',53,'3',7,'1999-01-30','1978-04-30',3),(5,'Rita','Vandervort','Schulist',7,'HESC8703',1,'1973-05-02','Paula Lane',83,'9',2,'1976-04-07','2015-09-09',1),(6,'Ryleigh','Boyer','Jenkins',6,'HESC8703',5,'2015-01-10','Jenkins Circl',15,'8',1,'2006-12-23','2000-01-24',4),(7,'Aisha','Dooley','Kreiger',4,'HESC8703',4,'1994-02-18','Marvin Extens',18,'6',9,'1972-02-15','1976-09-07',1),(8,'test','test','test',100,'HES8703',7,'1969-12-31','test dir',100,'2',4,'1969-12-31','1969-12-31',1);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `finanzas`
--

DROP TABLE IF EXISTS `finanzas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `finanzas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fecha_ing` date NOT NULL,
  `plataforma` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `grossmar` bigint(20) NOT NULL,
  `ebitda` int(11) NOT NULL,
  `grossideal` int(11) NOT NULL,
  `ebitdaideal` int(11) NOT NULL,
  `ingresos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `finanzas`
--

LOCK TABLES `finanzas` WRITE;
/*!40000 ALTER TABLE `finanzas` DISABLE KEYS */;
INSERT INTO `finanzas` VALUES (1,'2016-01-08 23:14:13','2016-01-08 23:26:01','2016-01-01','Finanzas 1',214748364712,1010101,10010101,1010101,1000);
/*!40000 ALTER TABLE `finanzas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_04_30_200000_create_catalogos_area_table',1),('2015_05_02_040651_create_catalogoPuesto_table',1),('2015_05_02_040715_create_catalogoRol_table',1),('2015_05_02_040746_create_catalogoEstatus_table',1),('2015_05_04_004327_create_empleados_table',1),('2015_09_09_041701_create_finanzas_table',1),('2015_09_09_043833_create_bpo_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `clave_area` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clave_rol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rfc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `jefe_inmediato` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_baja` datetime DEFAULT NULL,
  `fecha_ing` datetime DEFAULT NULL,
  `fecha_cambio` datetime DEFAULT NULL,
  `tel_casa` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `clave_puesto` int(11) DEFAULT NULL,
  `apellidos` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'Administrator','admin@gmail.com','$2y$10$ov.UHZgQnvv8IjD5zICxfOlzAhq7drfgOw7gv7iHv9Li3VKP8EajS','rWoDxFNcAYCxoFf5zeKEN5bkppXi1mt1H7ROGJZsLKW7oX3cqrBXiQ23Wgrw','0000-00-00 00:00:00','2016-01-14 05:26:30','100','1000','','','',NULL,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2016-01-13 17:36:14
