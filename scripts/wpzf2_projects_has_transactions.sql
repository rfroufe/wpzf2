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
-- Table structure for table `projects_has_transactions`
--

DROP TABLE IF EXISTS `projects_has_transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_has_transactions` (
  `projects_idproject` int(11) NOT NULL,
  `transactions_idtransaction` int(11) NOT NULL,
  `companies_idcompanie` int(11) NOT NULL,
  `users_iduser` int(11) NOT NULL,
  PRIMARY KEY (`transactions_idtransaction`,`companies_idcompanie`),
  KEY `fk_projects_has_transactions_transactions1_idx` (`transactions_idtransaction`),
  KEY `fk_projects_has_transactions_projects1_idx` (`projects_idproject`),
  KEY `fk_projects_has_transactions_companies1_idx` (`companies_idcompanie`),
  KEY `fk_projects_has_transactions_users1_idx` (`users_iduser`),
  CONSTRAINT `fk_projects_has_transactions_projects1` FOREIGN KEY (`projects_idproject`) REFERENCES `projects` (`idproject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_transactions_transactions1` FOREIGN KEY (`transactions_idtransaction`) REFERENCES `transactions` (`idtransaction`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_transactions_companies1` FOREIGN KEY (`companies_idcompanie`) REFERENCES `companies` (`idcompanie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_transactions_users1` FOREIGN KEY (`users_iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_has_transactions`
--

LOCK TABLES `projects_has_transactions` WRITE;
/*!40000 ALTER TABLE `projects_has_transactions` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_has_transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-03-12 17:53:52
