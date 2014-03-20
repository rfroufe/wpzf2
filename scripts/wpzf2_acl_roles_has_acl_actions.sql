CREATE DATABASE  IF NOT EXISTS `wpzf2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `wpzf2`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: wpzf2
-- ------------------------------------------------------
-- Server version	5.5.23

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
-- Table structure for table `acl_roles_has_acl_actions`
--

DROP TABLE IF EXISTS `acl_roles_has_acl_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acl_roles_has_acl_actions` (
  `acl_roles_idrole` int(11) NOT NULL,
  `acl_actions_idaction` int(11) NOT NULL,
  PRIMARY KEY (`acl_roles_idrole`,`acl_actions_idaction`),
  KEY `fk_acl_roles_has_acl_actions_acl_actions1_idx` (`acl_actions_idaction`),
  KEY `fk_acl_roles_has_acl_actions_acl_roles_idx` (`acl_roles_idrole`),
  CONSTRAINT `fk_acl_roles_has_acl_actions_acl_roles` FOREIGN KEY (`acl_roles_idrole`) REFERENCES `acl_roles` (`idrole`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_acl_roles_has_acl_actions_acl_actions1` FOREIGN KEY (`acl_actions_idaction`) REFERENCES `acl_actions` (`idaction`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acl_roles_has_acl_actions`
--

LOCK TABLES `acl_roles_has_acl_actions` WRITE;
/*!40000 ALTER TABLE `acl_roles_has_acl_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `acl_roles_has_acl_actions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-12 17:53:53
