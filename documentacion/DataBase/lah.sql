CREATE DATABASE  IF NOT EXISTS `db_liceo_web` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `db_liceo_web`;
-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: 160.153.63.133    Database: db_liceo_web
-- ------------------------------------------------------
-- Server version	5.6.48-cll-lve

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
-- Table structure for table `constancia`
--

DROP TABLE IF EXISTS `constancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `constancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado` tinyint(1) DEFAULT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha_finalizada` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_persona_UNIQUE` (`id_persona`),
  UNIQUE KEY `id_persona` (`id_persona`),
  KEY `consper_idx` (`id_persona`),
  CONSTRAINT `pe` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `constancia`
--

LOCK TABLES `constancia` WRITE;
/*!40000 ALTER TABLE `constancia` DISABLE KEYS */;
INSERT INTO `constancia` VALUES (2,0,13,NULL),(3,1,27,'2020-12-09'),(4,1,12,'2020-12-09'),(15,0,29,NULL),(21,0,28,NULL),(25,0,40,NULL);
/*!40000 ALTER TABLE `constancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contacto`
--

DROP TABLE IF EXISTS `contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `contacto` varchar(150) CHARACTER SET latin1 NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id_contacto`),
  KEY `idpersona_idx` (`id_persona`),
  KEY `Fk_tipo_idx` (`tipo`),
  CONSTRAINT `FK_tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo_contacto` (`id_tipo_contacto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `idpersona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contacto`
--

LOCK TABLES `contacto` WRITE;
/*!40000 ALTER TABLE `contacto` DISABLE KEYS */;
INSERT INTO `contacto` VALUES (12,12,'60851632',1),(14,13,'65656565',1),(17,13,'l@gmail.com',2),(22,15,'60751548',1),(23,15,'hkasa@ja.com',2),(24,15,'60545454',1),(25,16,'60856562',1),(27,16,'27102424',1),(28,16,'j@hot.com',2),(35,28,'54454545',1),(36,28,'a@gma.oc',2),(37,27,'65656545',1),(38,29,'98989897',1),(39,1,'85885855',1),(45,1,'85885855',1),(48,40,'85885855',1),(49,30,'69545436',1);
/*!40000 ALTER TABLE `contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estudiante` (
  `cedula` varchar(12) CHARACTER SET latin1 NOT NULL,
  `nacimiento` date NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_seccion` int(11) DEFAULT NULL,
  UNIQUE KEY `cedula_UNIQUE` (`cedula`),
  KEY `id_persona_idx` (`id_persona`),
  CONSTRAINT `id_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estudiante`
--

LOCK TABLES `estudiante` WRITE;
/*!40000 ALTER TABLE `estudiante` DISABLE KEYS */;
INSERT INTO `estudiante` VALUES ('199945452','2020-10-28',29,11),('454540005','2020-12-29',27,8),('525457145','0000-00-00',40,8),('545554545','2020-08-05',13,7),('745454454','2020-11-11',28,10),('905095611','2019-05-06',12,8);
/*!40000 ALTER TABLE `estudiante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `id_persona` int(11) NOT NULL,
  `rol` int(11) DEFAULT NULL,
  KEY `id_funcionario_persona_idx` (`id_persona`),
  KEY `fun_rol_idx` (`rol`),
  CONSTRAINT `fun_rol` FOREIGN KEY (`rol`) REFERENCES `rol_funcionario` (`id_rol`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_funcionario_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`idpersona`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (15,2),(16,3),(30,1);
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nosotros`
--

DROP TABLE IF EXISTS `nosotros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nosotros` (
  `texto` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nosotros`
--

LOCK TABLES `nosotros` WRITE;
/*!40000 ALTER TABLE `nosotros` DISABLE KEYS */;
INSERT INTO `nosotros` VALUES ('<p>&nbsp;asdasa</p>\r\n\r\n<p>asdasdsasdas</p>\r\n\r\n<p>asdasdasdasd</p>\r\n\r\n<p>asdasdasdasda</p>\r\n\r\n<p>asdadsadasdasd</p>\r\n\r\n<p>adsasdasdasdasd</p>\r\n\r\n<p>asddasd</p>\r\n\r\n<p>AJNAKSJNAKDS KJAASKDJAHJDSIAKDJAHSK ASHJK sfdsf sdfs ASHDKAJHDSK ASHKJASHDKAJSdh&nbsp; asjkjkas</p>\r\n\r\n<p>&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;</p>\r\n\r\n<p>&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;&ntilde;</p>\r\n');
/*!40000 ALTER TABLE `nosotros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persona`
--

DROP TABLE IF EXISTS `persona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persona`
--

LOCK TABLES `persona` WRITE;
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
INSERT INTO `persona` VALUES (1,'liceo'),(12,'pepe perez perez'),(13,'Ã‘O Ã‘O Ã‘O'),(15,'Laura Chinchilla Perez'),(16,'Maria Gomez Torres'),(27,'asas asas asas'),(28,'maria maria maria'),(29,'carlos guerres poles'),(30,'Luiz coca cola'),(40,'LpL LLL  LLLP');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol_funcionario`
--

DROP TABLE IF EXISTS `rol_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol_funcionario` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `rol_UNIQUE` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol_funcionario`
--

LOCK TABLES `rol_funcionario` WRITE;
/*!40000 ALTER TABLE `rol_funcionario` DISABLE KEYS */;
INSERT INTO `rol_funcionario` VALUES (1,'Director'),(2,'Docente espanol'),(3,'Docente ingles');
/*!40000 ALTER TABLE `rol_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seccion`
--

DROP TABLE IF EXISTS `seccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `seccion` (
  `id_seccion` int(11) NOT NULL,
  `grado` varchar(9) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_seccion`),
  UNIQUE KEY `grado_UNIQUE` (`grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seccion`
--

LOCK TABLES `seccion` WRITE;
/*!40000 ALTER TABLE `seccion` DISABLE KEYS */;
INSERT INTO `seccion` VALUES (10,'DECIMO'),(9,'NOVENO'),(8,'OCTAVO'),(7,'SETIMO'),(11,'UNDECIMO');
/*!40000 ALTER TABLE `seccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_contacto`
--

DROP TABLE IF EXISTS `tipo_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_contacto` (
  `id_tipo_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_contacto` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_tipo_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_contacto`
--

LOCK TABLES `tipo_contacto` WRITE;
/*!40000 ALTER TABLE `tipo_contacto` DISABLE KEYS */;
INSERT INTO `tipo_contacto` VALUES (1,' TELEFONO'),(2,'CORREO'),(3,'FACEBOOK'),(4,'YOUTUBE'),(5,'INSTAGRAM'),(6,'TWITTER');
/*!40000 ALTER TABLE `tipo_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'db_liceo_web'
--
/*!50106 SET @save_time_zone= @@TIME_ZONE */ ;
/*!50106 DROP EVENT IF EXISTS `e_hourly` */;
DELIMITER ;;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;;
/*!50003 SET character_set_client  = utf8mb4 */ ;;
/*!50003 SET character_set_results = utf8mb4 */ ;;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;;
/*!50003 SET @saved_time_zone      = @@time_zone */ ;;
/*!50003 SET time_zone             = 'SYSTEM' */ ;;
/*!50106 CREATE*/ /*!50117 DEFINER=`liceo`@`%`*/ /*!50106 EVENT `e_hourly` ON SCHEDULE EVERY 1 DAY STARTS '2020-12-09 14:29:50' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM constancia WHERE fecha_finalizada = DATE_SUB(CURDATE(), INTERVAL 1 DAY) */ ;;
/*!50003 SET time_zone             = @saved_time_zone */ ;;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;;
/*!50003 SET character_set_client  = @saved_cs_client */ ;;
/*!50003 SET character_set_results = @saved_cs_results */ ;;
/*!50003 SET collation_connection  = @saved_col_connection */ ;;
DELIMITER ;
/*!50106 SET TIME_ZONE= @save_time_zone */ ;

--
-- Dumping routines for database 'db_liceo_web'
--
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_actualizarEstudiante`(id int ,nombre varchar(200) ,cedula varchar(12), nacimiento date, grado int)
BEGIN

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
/*SELECT 0 as error;*/
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'An error occurred';
ROLLBACK;
END;

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
SELECT 0 as error;
SIGNAL SQLSTATE '01000'
SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
ROLLBACK;
END;

START TRANSACTION;
UPDATE `db_liceo_web`.`estudiante`
SET
`cedula` = cedula,
`nacimiento` =nacimiento,
`id_seccion` = grado
WHERE`id_persona` = id;

UPDATE `db_liceo_web`.`persona`
SET
`nombre` = nombre
WHERE `idpersona` = id;


/*SELECT ROW_COUNT() ;*/


COMMIT;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarFuncionario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_actualizarFuncionario`(in id int,in nombre varchar(200) , in rol int)
BEGIN

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
/*SELECT 0 as error;*/
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'An error occurred';
ROLLBACK;
END;

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
SELECT 0 as error;
SIGNAL SQLSTATE '01000'
SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
ROLLBACK;
END;
START TRANSACTION;

UPDATE `db_liceo_web`.`funcionario`
SET
`rol` =rol
WHERE `id_persona` = id;

UPDATE `db_liceo_web`.`persona`
SET
`nombre` = nombre
WHERE `idpersona` = id;



SELECT ROW_COUNT() ;
COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_actualizarNosotros` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_actualizarNosotros`(in par text)
BEGIN

DECLARE EXIT HANDLER FOR 45000
  BEGIN
    SIGNAL SQLSTATE '45000' SET 
      MESSAGE_TEXT = 'Ha ocurrido un error!';
END;


UPDATE nosotros SET texto = par ;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_cambiarConstancia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_cambiarConstancia`( in id_ int )
BEGIN
if(select c.estado from constancia as c  where c.id = id_)
then
UPDATE db_liceo_web.constancia
SET estado =0,
fecha_finalizada =  null
WHERE id =id_;

else

UPDATE db_liceo_web.constancia
SET estado =1,

fecha_finalizada = CURDATE()
WHERE id =id_;

end if;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_eliminarContacto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_eliminarContacto`(in id int)
BEGIN
DELETE FROM `db_liceo_web`.`contacto`
WHERE id_contacto = id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_eliminarEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_eliminarEstudiante`( in id int)
BEGIN

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
/*SELECT 0 as error;*/
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'An error occurred';
ROLLBACK;
END;

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
SELECT 0 as error;
SIGNAL SQLSTATE '01000'
SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
ROLLBACK;
END;
START TRANSACTION;

DELETE FROM `db_liceo_web`.`contacto`
WHERE id_persona = id;

DELETE FROM `db_liceo_web`.`estudiante`
WHERE id_persona = id ;

DELETE FROM `db_liceo_web`.`persona`
WHERE idpersona = id;




COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_eliminarFuncionario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_eliminarFuncionario`( in id int)
BEGIN

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLEXCEPTION
BEGIN
/*SELECT 0 as error;*/
SIGNAL SQLSTATE '45000'
SET MESSAGE_TEXT = 'An error occurred';
ROLLBACK;
END;

/*Handler para error SQL*/
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
SELECT 0 as error;
SIGNAL SQLSTATE '01000'
SET MESSAGE_TEXT = 'A warning occurred', MYSQL_ERRNO = 1000;
ROLLBACK;
END;
START TRANSACTION;

DELETE FROM `db_liceo_web`.`contacto`
WHERE id_persona = id;

DELETE FROM `db_liceo_web`.`funcionario`
WHERE id_persona = id ;

DELETE FROM `db_liceo_web`.`persona`
WHERE idpersona = id;




COMMIT;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarContacto` */;
ALTER DATABASE `db_liceo_web` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_insertarContacto`(in idx int, in contactox varchar(150), in tipox int)
BEGIN
	INSERT INTO contacto (id_persona, contacto, tipo) values (idx, contactox, tipox);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_liceo_web` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_insertarEstudiante`(nombre varchar(200) ,cedula varchar(12), nancimiento date, grado int )
BEGIN

DECLARE EXIT HANDLER FOR 1062
  BEGIN
    SIGNAL SQLSTATE '23000' SET 
      MYSQL_ERRNO =  1062,
      MESSAGE_TEXT = 'Ya fue registrado este estudiante!';
END;


START TRANSACTION;
INSERT INTO `db_liceo_web`.`persona`(`nombre`)VALUES( nombre);
SET @id_persona = (SELECT LAST_INSERT_ID());    
INSERT INTO `db_liceo_web`.`estudiante`(`cedula`,`nacimiento`,`id_persona`,`id_seccion`)
VALUES(cedula ,nacimiento ,  @id_persona ,grado);




COMMIT;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_insertarFuncionario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_insertarFuncionario`(in nombre varchar(200) , in rol int)
BEGIN


DECLARE EXIT HANDLER FOR 1062
  BEGIN
    SIGNAL SQLSTATE '23000' SET 
      MYSQL_ERRNO =  1062,
      MESSAGE_TEXT = 'Ya fue registrado este funcionario!';
END;


START TRANSACTION;
INSERT INTO `db_liceo_web`.`persona`(`nombre`)VALUES( nombre);

SET @id_persona = (SELECT LAST_INSERT_ID());    

INSERT INTO `db_liceo_web`.`funcionario`(`id_persona`,`rol`)VALUES( @id_persona , rol);


COMMIT;


END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_listaContactosLiceo` */;
ALTER DATABASE `db_liceo_web` CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_listaContactosLiceo`()
BEGIN
	SELECT contacto.id_contacto, contacto.contacto, contacto.tipo, tipo_contacto.nombre_tipo_contacto, 
    contacto.id_persona FROM contacto inner join tipo_contacto on contacto.tipo = tipo_contacto.id_tipo_contacto 
    where contacto.id_persona = 1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
ALTER DATABASE `db_liceo_web` CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obetenerAutoIncrementablePersona` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obetenerAutoIncrementablePersona`()
BEGIN
SELECT `AUTO_INCREMENT` 
FROM  INFORMATION_SCHEMA.TABLES
WHERE TABLE_SCHEMA = 'db_liceo_web'
AND   TABLE_NAME   = 'persona';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerConstancias` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerConstancias`()
BEGIN
select c.id , c.estado ,c.id_persona, e.id_seccion, p.nombre, e.cedula from db_liceo_web.constancia as c inner join db_liceo_web.persona as p on c.id_persona = p.idpersona inner join db_liceo_web.estudiante as e on e.id_persona = p.idpersona;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerContactosEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerContactosEstudiante`(in id int)
BEGIN
select * from contacto where id_persona = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerDatosConstacia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerDatosConstacia`( cedula varchar(12))
BEGIN
select id_persona , nombre , cedula ,id_seccion from persona inner join estudiante where estudiante.id_persona = persona.idpersona and estudiante.cedula = cedula;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerDatosEstudiante` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerDatosEstudiante`(in id int)
BEGIN
select pe.idpersona,pe.nombre, es.cedula, es.id_seccion, es.nacimiento from db_liceo_web.estudiante as es inner join db_liceo_web.persona as pe on pe.idpersona = es.id_persona   where pe.idpersona =id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerDirector` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerDirector`()
BEGIN
select* from db_liceo_web.persona as p inner join db_liceo_web.funcionario as f on f.id_persona =p.idpersona where f.rol=1;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerEstudiantes` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerEstudiantes`()
BEGIN
select pe.idpersona,pe.nombre, es.cedula, es.id_seccion ,co.contacto from db_liceo_web.estudiante as es inner join db_liceo_web.persona as pe on pe.idpersona = es.id_persona  LEFT join (select * from db_liceo_web.contacto where tipo = 1 group by id_persona) as co on co.id_persona =pe.idpersona;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerGrados` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerGrados`()
BEGIN
select * from seccion;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerNosotros` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerNosotros`()
BEGIN
select texto from nosotros;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerPersonal` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerPersonal`()
BEGIN
select pe.nombre, pe.idpersona, ro.rol, co.contacto from db_liceo_web.rol_funcionario as ro inner join db_liceo_web.funcionario  as fu on ro.id_rol = fu.rol inner join db_liceo_web.persona as pe on fu.id_persona = pe.idpersona   LEFT join (select * from db_liceo_web.contacto where tipo = 1 group by id_persona) as co on co.id_persona =pe.idpersona;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerPersonalRol` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerPersonalRol`(in id int)
BEGIN
select pe.nombre, pe.idpersona, ro.rol, co.contacto from db_liceo_web.rol_funcionario as ro inner join db_liceo_web.funcionario  as fu on ro.id_rol = fu.rol inner join db_liceo_web.persona as pe on fu.id_persona = pe.idpersona   LEFT join (select * from db_liceo_web.contacto where tipo = 1 group by id_persona) as co on co.id_persona =pe.idpersona where ro.id_rol = id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerRoles` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerRoles`()
BEGIN
select id_rol, rol from db_liceo_web.rol_funcionario;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_obtenerTipoContacto` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_obtenerTipoContacto`()
BEGIN
select id_tipo_contacto, nombre_tipo_contacto from db_liceo_web.tipo_contacto;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_optenerDatosFuncionario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_optenerDatosFuncionario`(in id int)
BEGIN
select pe.nombre, pe.idpersona, ro.id_rol from db_liceo_web.rol_funcionario as ro inner join db_liceo_web.funcionario  as fu on ro.id_rol = fu.rol inner join db_liceo_web.persona as pe on fu.id_persona = pe.idpersona  where pe.idpersona = id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `sp_solicitarConstancia` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`liceo`@`%` PROCEDURE `sp_solicitarConstancia`(in cedula int (12))
BEGIN

    
DECLARE id_estudiante INT(11) DEFAULT 0;

DECLARE EXIT HANDLER FOR 1062
  BEGIN
    SIGNAL SQLSTATE '23000' SET 
      MYSQL_ERRNO =  1062,
      MESSAGE_TEXT = 'Ya existe una solicitud!';
  END;
  
DECLARE EXIT HANDLER FOR 1048
  BEGIN
    SIGNAL SQLSTATE '23000' SET 
      MYSQL_ERRNO =  1048,
      MESSAGE_TEXT = 'Numero de identificacion incorrecto! o no registrado';
  END;
  
	SET id_estudiante = (select p.idpersona from db_liceo_web.persona as p inner join  db_liceo_web.estudiante  as e on e.id_persona = p.idpersona where e.cedula = cedula); 

				INSERT INTO db_liceo_web.constancia(estado,id_persona,fecha_finalizada)VALUES(0,id_estudiante,null);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-11 17:54:49
