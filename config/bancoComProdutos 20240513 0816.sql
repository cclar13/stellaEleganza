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
  `fotoAdm` varchar(145) NOT NULL,
  `nomeAdm` varchar(90) NOT NULL DEFAULT '',
  `email` varchar(150) NOT NULL DEFAULT '',
  `senha` varchar(100) NOT NULL DEFAULT '',
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idadm`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

/*!40000 ALTER TABLE `adm` DISABLE KEYS */;
INSERT INTO `adm` (`idadm`,`fotoAdm`,`nomeAdm`,`email`,`senha`,`ativo`,`alteracao`) VALUES 
 (1,'icon.png','Arthur','ademir@gmail.com','$2y$12$Vj8vfftWoS9NFMOUbRCNeeVQXYFJwLfyrq3mFPGRn922rR9rsiKL6','A','2024-05-12 20:22:13'),
 (2,'icon.png','Clarisse','clarisse@gmail.com','$2y$12$Vj8vfftWoS9NFMOUbRCNeeVQXYFJwLfyrq3mFPGRn922rR9rsiKL6','A','2024-05-13 07:53:29');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` (`idcontato`,`nomeContato`,`telefone`,`ativo`,`alteracao`) VALUES 
 (1,'Arthur Gomes','(21) 4512-1515','A','2024-05-10 16:06:18'),
 (2,'testes','(23) 5253-5223','A','2024-05-10 16:08:47'),
 (3,'Ademir Silva','(52) 3523-5525','A','2024-05-10 16:10:56'),
 (4,'Ronaldo Gama','(23) 5253-5223','A','2024-05-12 20:15:27'),
 (5,'Ronaldo Gama','(23) 5253-5223','A','2024-05-12 20:15:27'),
 (6,'Ronaldo Gama','(23) 5253-5223','A','2024-05-12 20:15:27'),
 (7,'Admeir','(23) 5253-5223','A','2024-05-12 20:15:55'),
 (8,'Admeir','(23) 5253-5223','A','2024-05-12 20:15:27'),
 (9,'Ademir Silva','(33) 5 8585-8585','A','2024-05-10 16:15:01'),
 (10,'Marco','(32) 4 3437-8929','A','2024-05-11 16:03:49'),
 (11,'Marco','(33) 4 4556-6870','A','2024-05-11 16:04:53'),
 (12,'Lua','(31) 2 2554-5892','A','2024-05-11 16:05:36'),
 (13,'Teste','(33) 3 3333-3333','A','2024-05-11 16:10:50'),
 (14,'Teste','(66) 6 6666-6666','A','2024-05-11 16:11:25'),
 (15,'tuiu','(55) 5 5555-5555','A','2024-05-11 17:25:52');
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;


--
-- Definition of table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
  `idproduto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsexo` int(10) unsigned NOT NULL,
  `nomeProduto` varchar(250) NOT NULL DEFAULT '',
  `tipo` varchar(50) NOT NULL DEFAULT '',
  `nomeFoto` varchar(200) NOT NULL DEFAULT '',
  `valor` varchar(45) NOT NULL DEFAULT '',
  `marca` varchar(45) NOT NULL DEFAULT '',
  `cor` varchar(45) NOT NULL DEFAULT '',
  `tamanho` int(10) unsigned NOT NULL DEFAULT 0,
  `cadastro` datetime NOT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'A',
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`idproduto`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produto`
--

/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` (`idproduto`,`idsexo`,`nomeProduto`,`tipo`,`nomeFoto`,`valor`,`marca`,`cor`,`tamanho`,`cadastro`,`ativo`,`alteracao`) VALUES 
 (1,1,'Blazer Básico Alfaiatado Com Fechamento Em Botão Único Branco Neve','blazer','blazerF1.png','130.00','stellaEleganze','Branco Neve',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (2,1,'Blazer Alfaiatado Acinturado Em Crepe Com Botões Com Brasões Off White','blazer','blazerF2.png','120.00','stellaEleganze','Branco',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (3,1,'Blazer Em Polivelour Com Botões E Lapela Aplicada Preto','blazer','blazerF3.png','150.00','stellaEleganze','Preto',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (4,1,'Calça Reta Alfaiatada Com Risca De Giz E Cós Elástico Cinza','calca','calcaF1.png','300.00','stellaEleganze','Cinza',40,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (5,1,'Calça Cenoura Com Cinto E Pregas Curve & Plus Szie Preto','calca','calcaF2.png','130.00','stellaEleganze','Preto',48,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (6,1,'Calça Wide Leg Em Viscose Com Fivelas Na Cós E Bolsos Off White','calca','calcaF3.png','170.00','stellaEleganze','Branco',35,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (7,1,'Calça Wide Leg Alfaiataria Com Botão Onix Curve & Plus Size Cinza','calca','calcaF4.png','100.00','stellaEleganze','Cinza',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (8,1,'Vestido New Midi Com Leve Brilho E Decote Halter Bege','vestido','vestidoF1.png','250.00','stellaEleganze','Bege',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (9,1,'Vestido Longo Em Meia Malha Com Fenda Na Lateral Preto','vestido','vestidoF2.png','150.00','stellaEleganze','Preto',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (10,2,'Blazer Super Slim Em Meia Malha Sem Forro Cinza Claro','blazer','blazerM1.png','320.00','stellaEleganze','Cinza Claro',40,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (11,2,'Blazer Slim Em Poliviscose Com Gola Lapela E Bolsos Verde Escuro','blazer','blazerM2.png','210.00','stellaEleganze','Verde Escuro',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (12,2,'Blazer Texturizado Com Botões E Bolsos Preto','blazer','blazerM3.png','323.00','stellaEleganze','Preto',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (13,2,'Blazer Super Slim Em Poliviscose Xadrez Com Bolsos','blazer','blazerM4.png','130.00','stellaEleganze','Cinza/Branco',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (14,2,'Calça Social Super Slim Com Estampa Xadrez Azul Escuro ','calca','calcaM1.png','170.00','stellaEleganze','Azul Escuro',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (15,2,'Calça Slim Social Com Estampa Xadrez Azul','calca','calcaM2.png','60.00','stellaEleganze','Azul',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (16,2,'Calça Social Slim Em Poliviscose Com Bolsos Marrom','calca','calcaM3.png','300.00','stellaEleganze','Marrom',36,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (17,2,'Calça Social Slim Em Poliviscose Com Bolsos Cinza','calca','calcaM4.png','210.00','stellaEleganze','Cinza',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (18,2,'Camiseta Comfort em Meia Malha com Estampa Tropical Summer Paradise Verde','camisa','camisaM1.png','100.00','stellaEleganze','Verde',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (19,2,'Camiseta Relaxed Em Meia Malha Com Bordado E Estampa Taz Trap Nas Costas Marrom','camisa','camisaM2.png','80.00','stellaEleganze','Marrom',36,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (20,2,'Camiseta Oversized Em Meia Malha Com Lettering Lucky E Recorte Contrastante Preto/ Branco','camisa','camisaM3.png','70.00','stellaEleganze','Preto/Branco',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (21,2,'Camiseta Comfort Básica Em Meia Malha Com Etiqueta Na Manga Branco Neve','camisa','camisaM4.png','80.00','stellaEleganze','Branco Neve',37,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (22,1,'Blusa Em Tricô Com Manga Bufante E Textura Canelada Vermelho','blusa','camisaF1.png','60.00','stellaEleganze','Vermelho',38,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (23,1,'Blusa Texturizada Com Gola Alta Com Frufru Branco','blusa','camisaF2.png','70.00','stellaEleganze','Branco',40,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (24,1,'Blusa Sem Manga Em Tricô Com Babadinhos Na Cava E Barra Preto','blusa','camisaF3.png','90.00','stellaEleganze','Preto',35,'2024-05-11 17:18:27','A','2024-05-12 18:22:06'),
 (25,1,'Blusa Básica Em Tricô Canelado Com Gola Alta Bege','blusa','camisaF4.png','120.00','stellaEleganze','Bege',36,'2024-05-11 17:18:27','A','2024-05-12 18:22:06');
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;


--
-- Definition of table `sexo`
--

DROP TABLE IF EXISTS `sexo`;
CREATE TABLE `sexo` (
  `idsexo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sexo` varchar(45) NOT NULL DEFAULT '',
  `cadastro` datetime DEFAULT NULL,
  `alteracao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ativo` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`idsexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sexo`
--

/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
INSERT INTO `sexo` (`idsexo`,`sexo`,`cadastro`,`alteracao`,`ativo`) VALUES 
 (1,'Feminino','2024-05-11 12:59:48','2024-05-11 13:00:03','A'),
 (2,'Masculino','2024-05-11 12:59:48','2024-05-11 13:00:04','A');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
