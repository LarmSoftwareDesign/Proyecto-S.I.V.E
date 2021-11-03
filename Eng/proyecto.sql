-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: larmsoftwaredesign
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `compra`
--

DROP TABLE IF EXISTS `compra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compra` (
  `Numcompra` int NOT NULL AUTO_INCREMENT,
  `Estado` enum('Procesando pago','Pago recibido','Orden en camino','Listo para retirar') DEFAULT NULL,
  `Cantidad` int DEFAULT NULL,
  `Ci` int DEFAULT NULL,
  `IdProducto` int DEFAULT NULL,
  `tipo` enum('debito','credito','red de cobranza') DEFAULT NULL,
  PRIMARY KEY (`Numcompra`),
  KEY `Ci` (`Ci`),
  KEY `IdProducto` (`IdProducto`),
  CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Ci`) REFERENCES `usuario` (`Ci`),
  CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra`
--

LOCK TABLES `compra` WRITE;
/*!40000 ALTER TABLE `compra` DISABLE KEYS */;
INSERT INTO `compra` VALUES (12,'Orden en camino',10,99959999,204,NULL);
/*!40000 ALTER TABLE `compra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `Ci` int NOT NULL DEFAULT '0',
  `IdProducto` int NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`IdProducto`,`Ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `Rut` bigint NOT NULL,
  `Nomempresa` varchar(30) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Direccion` varchar(35) DEFAULT NULL,
  `Telefono` int DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Rut`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Email_2` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (2626262,'INFINITY','satan@gmail.com','juan de dios peza ',999999324,'3044443121EC9D4326B2D01A14DA1596D2B1F740'),(123456789012,'Carambula S.A.','Carambula_S.A.@gmail.com','En mi casa 1132',25001234,'613657D090A5DC15032103248195F9FE648B2FAD');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encarga`
--

DROP TABLE IF EXISTS `encarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `encarga` (
  `Numcompra` int NOT NULL DEFAULT '0',
  `IdProducto` int NOT NULL DEFAULT '0',
  `Ci` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Numcompra`,`IdProducto`,`Ci`),
  KEY `Ci` (`Ci`),
  KEY `IdProducto` (`IdProducto`),
  CONSTRAINT `encarga_ibfk_1` FOREIGN KEY (`Numcompra`) REFERENCES `compra` (`Numcompra`),
  CONSTRAINT `encarga_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`),
  CONSTRAINT `encarga_ibfk_3` FOREIGN KEY (`Ci`) REFERENCES `usuario` (`Ci`),
  CONSTRAINT `encarga_ibfk_4` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encarga`
--

LOCK TABLES `encarga` WRITE;
/*!40000 ALTER TABLE `encarga` DISABLE KEYS */;
INSERT INTO `encarga` VALUES (12,204,99959999);
/*!40000 ALTER TABLE `encarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `es`
--

DROP TABLE IF EXISTS `es`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `es` (
  `Rut` bigint NOT NULL DEFAULT '0',
  `Ci` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Ci`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `es`
--

LOCK TABLES `es` WRITE;
/*!40000 ALTER TABLE `es` DISABLE KEYS */;
/*!40000 ALTER TABLE `es` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horario_pickup`
--

DROP TABLE IF EXISTS `horario_pickup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `horario_pickup` (
  `IdPickup` int NOT NULL AUTO_INCREMENT,
  `Horario_abre` time DEFAULT NULL,
  `Horario_cierra` time DEFAULT NULL,
  PRIMARY KEY (`IdPickup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horario_pickup`
--

LOCK TABLES `horario_pickup` WRITE;
/*!40000 ALTER TABLE `horario_pickup` DISABLE KEYS */;
INSERT INTO `horario_pickup` VALUES (1,'07:30:00','19:00:00'),(2,'08:30:00','16:30:00'),(3,'10:30:00','20:45:00'),(4,'14:30:00','23:30:00'),(5,'10:30:00','18:00:00');
/*!40000 ALTER TABLE `horario_pickup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pickup`
--

DROP TABLE IF EXISTS `pickup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pickup` (
  `IdPickup` int NOT NULL AUTO_INCREMENT,
  `Direccion` varchar(35) DEFAULT NULL,
  `NomPickup` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`IdPickup`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pickup`
--

LOCK TABLES `pickup` WRITE;
/*!40000 ALTER TABLE `pickup` DISABLE KEYS */;
INSERT INTO `pickup` VALUES (1,'Maturana 888, 11800 Montevideo','Agencia Central Br.Artiga'),(2,'Bv.Gral. Artigas 4555,11800 Montevi','ACC - Br. Artigas 4555'),(3,'C. Thompson 3166, 12000 Montevideo','Agencia Central Propios'),(4,'Chiávari 2829, 11600 Montevideo','Depósito Agência Central'),(5,'Cuareim 1825, 11800 Montevideo','ACC Agencia Cuareim de Ca');
/*!40000 ALTER TABLE `pickup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto` (
  `IdProducto` int NOT NULL AUTO_INCREMENT,
  `Nombre_Producto` varchar(50) DEFAULT NULL,
  `Precio` decimal(15,0) DEFAULT NULL,
  `Condicion` enum('Nuevo','Usado','Restaurado') DEFAULT NULL,
  `Categorias` enum('hogar','vestimenta','deporte','nutrición','inmuebles','vehículos','servicios','tecnología','electrodomésticos','software','hardware','arte') DEFAULT NULL,
  `Descripcion` varchar(400) DEFAULT NULL,
  `Nacionalidad` enum('Uruguay','Argentina','Paraguay','Brasil','Chile','Peru','Colombia','Bolivia','Venezuela','Ecuador') DEFAULT NULL,
  `Cantidad` int DEFAULT NULL,
  `Rut` bigint DEFAULT NULL,
  PRIMARY KEY (`IdProducto`),
  KEY `Rut` (`Rut`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Rut`) REFERENCES `empresa` (`Rut`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (204,'momommomos',2622,'Restaurado','hogar','afndoaisdgubasfiodgunaodvufaobfiouasbndviasuondifufndvuond','Paraguay',5555,2626262);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pubilca`
--

DROP TABLE IF EXISTS `pubilca`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pubilca` (
  `Ci` int NOT NULL DEFAULT '0',
  `IdProducto` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pubilca`
--

LOCK TABLES `pubilca` WRITE;
/*!40000 ALTER TABLE `pubilca` DISABLE KEYS */;
/*!40000 ALTER TABLE `pubilca` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `retira`
--

DROP TABLE IF EXISTS `retira`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `retira` (
  `IdPickup` int NOT NULL DEFAULT '0',
  `Numcompra` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Numcompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `retira`
--

LOCK TABLES `retira` WRITE;
/*!40000 ALTER TABLE `retira` DISABLE KEYS */;
/*!40000 ALTER TABLE `retira` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiene`
--

DROP TABLE IF EXISTS `tiene`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiene` (
  `Rut` bigint NOT NULL DEFAULT '0',
  `IdPickup` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Rut`,`IdPickup`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiene`
--

LOCK TABLES `tiene` WRITE;
/*!40000 ALTER TABLE `tiene` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiene` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `Ci` int NOT NULL DEFAULT '0',
  `Nombre` varchar(20) DEFAULT NULL,
  `Apellido` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(100) DEFAULT NULL,
  `Fnac` date DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Direccion` varchar(35) DEFAULT NULL,
  `Es` enum('Cliente','Vendedor') DEFAULT NULL,
  PRIMARY KEY (`Ci`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Email_2` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (31231230,'Leonardo','Carámbula','E32A49CFE640FCA899E893D87930AA12B14D1ADA','1980-10-10','Leo_Carambula@gmail.com','Entre el coso y el cosito 1991','Cliente'),(99959999,'Leonardo','Carámbula','3044443121EC9D4326B2D01A14DA1596D2B1F740','2001-02-22','satan@gmail.com','juan de dios peza ','Cliente');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vender`
--

DROP TABLE IF EXISTS `vender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vender` (
  `Ci` int NOT NULL DEFAULT '0',
  `IdProducto` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`Ci`,`IdProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vender`
--

LOCK TABLES `vender` WRITE;
/*!40000 ALTER TABLE `vender` DISABLE KEYS */;
/*!40000 ALTER TABLE `vender` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-03 12:27:30
