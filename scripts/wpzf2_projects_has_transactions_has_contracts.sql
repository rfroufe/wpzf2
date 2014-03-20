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
-- Table structure for table `projects_has_transactions_has_contracts`
--

DROP TABLE IF EXISTS `projects_has_transactions_has_contracts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects_has_transactions_has_contracts` (
  `projects_has_transactions_transactions_idtransaction` int(11) NOT NULL,
  `projects_has_transactions_companies_idcompanie` int(11) NOT NULL,
  `contracts_idcontract` int(11) NOT NULL,
  PRIMARY KEY (`projects_has_transactions_transactions_idtransaction`,`projects_has_transactions_companies_idcompanie`,`contracts_idcontract`),
  KEY `fk_projects_has_transactions_has_contracts_contracts1_idx` (`contracts_idcontract`),
  KEY `fk_projects_has_transactions_has_contracts_projects_has_tra_idx` (`projects_has_transactions_transactions_idtransaction`,`projects_has_transactions_companies_idcompanie`),
  CONSTRAINT `fk_projects_has_transactions_has_contracts_projects_has_trans1` FOREIGN KEY (`projects_has_transactions_transactions_idtransaction`, `projects_has_transactions_companies_idcompanie`) REFERENCES `projects_has_transactions` (`transactions_idtransaction`, `companies_idcompanie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_projects_has_transactions_has_contracts_contracts1` FOREIGN KEY (`contracts_idcontract`) REFERENCES `contracts` (`idcontract`) ON DELETE NO ACTION ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects_has_transactions_has_contracts`
--

LOCK TABLES `projects_has_transactions_has_contracts` WRITE;
/*!40000 ALTER TABLE `projects_has_transactions_has_contracts` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects_has_transactions_has_contracts` ENABLE KEYS */;
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
