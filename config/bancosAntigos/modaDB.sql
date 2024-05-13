-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema moda
--

CREATE DATABASE IF NOT EXISTS moda;
USE moda;

--
-- Definition of table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE `adm` (
  `idadm` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeAdm` varchar(90) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `senha` varchar(100) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`nomeAdm`,`email`,`senha`,`ativo`,`alteracao`) VALUES 
 (1,'Arthur','ademir@gmail.com','$2y$12$Vj8vfftWoS9NFMOUbRCNeeVQXYFJwLfyrq3mFPGRn922rR9rsiKL6','A','2024-05-10 14:15:50');
/*!40000 ALTER TABLE `adm` ENABLE KEYS */;


--
-- Definition of table `banner`
--

DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `idbanner` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `foto1` varchar(255) NOT NULL DEFAULT '',
  `foto2` varchar(255) NOT NULL DEFAULT '',
  `foto3` varchar(255) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idbanner`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `banner`
--

/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` (`idbanner`,`foto1`,`foto2`,`foto3`,`ativo`,`alteracao`) VALUES 
 (1,'1.png','2.png','3.png','A','2024-05-10 15:53:24');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;


--
-- Definition of table `contato`
--

DROP TABLE IF EXISTS `contato`;
CREATE TABLE `contato` (
  `idcontato` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeContato` varchar(150) NOT NULL DEFAULT '',
  `telefone` varchar(16) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idcontato`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`idcontato`,`nomeContato`,`telefone`,`ativo`,`alteracao`) VALUES 
 (1,'Arthur Gomes','(21) 4512-1515','A','2024-05-10 16:06:18'),
 (2,'testes','(23) 5253-5223','A','2024-05-10 16:08:47'),
 (3,'Ademir Silva','(52) 3523-5525','A','2024-05-10 16:10:56'),
 (4,'Ronaldo Gama','(5','A','2024-05-10 16:11:56'),
 (5,'Ronaldo Gama','(5','A','2024-05-10 16:11:57'),
 (6,'Ronaldo Gama','(5','A','2024-05-10 16:11:57'),
 (7,'Admeir','(23) 5235-5','A','2024-05-10 16:12:48'),
 (8,'Admeir','(23) 5235-5','A','2024-05-10 16:12:48'),
 (9,'Ademir Silva','(33) 5 8585-8585','A','2024-05-10 16:15:01');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;


--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nomeProduto` varchar(100) NOT NULL DEFAULT '',
  `valor` varchar(45) NOT NULL DEFAULT '',
  `marca` varchar(45) NOT NULL DEFAULT '',
  `cor` varchar(45) NOT NULL DEFAULT '',
  `tamanho` int(10) unsigned NOT NULL DEFAULT 0,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
