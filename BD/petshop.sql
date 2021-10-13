-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: sist_petshop
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.3

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
-- Table structure for table `animal`
--

DROP TABLE IF EXISTS `animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animal` (
  `codigo_ani` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `raca` varchar(250) DEFAULT NULL,
  `idade` varchar(250) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `preco` varchar(50) DEFAULT NULL,
  `status` binary(1) DEFAULT '0',
  `codigo_cli` int DEFAULT NULL,
  PRIMARY KEY (`codigo_ani`),
  UNIQUE KEY `nome` (`nome`),
  KEY `codigo_cli` (`codigo_cli`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animal`
--

LOCK TABLES `animal` WRITE;
/*!40000 ALTER TABLE `animal` DISABLE KEYS */;
INSERT INTO `animal` VALUES (7,'Mel','persa','5','gato','R$ 1332,11',_binary '1',14),(11,'mart','pit bul','10','cÃ£o','R$ 2500,00',_binary '1',12),(12,'Stive','CanÃ¡rio.','5','pÃ¡ssaro ','R$ 500,00',_binary '1',12),(13,'Booby','Sula Nebouxii','5','pÃ¡ssaro','R$ 1612,64',_binary '1',15),(14,'Puppy','Dogue alemÃ£o','3','cÃ£o','R$ 5000,00',_binary '1',15),(18,'Dog','Dog','2','Cachorro','300',_binary '1',17);
/*!40000 ALTER TABLE `animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bet`
--

DROP TABLE IF EXISTS `bet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bet` (
  `codigo_bet` int NOT NULL AUTO_INCREMENT,
  `fk_func` int NOT NULL,
  `fk_ani` int NOT NULL,
  `horario` varchar(250) DEFAULT NULL,
  `data_prevista` varchar(250) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`fk_func`,`fk_ani`),
  UNIQUE KEY `codigo_bet` (`codigo_bet`),
  KEY `fk_func` (`fk_func`),
  KEY `fk_ani` (`fk_ani`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bet`
--

LOCK TABLES `bet` WRITE;
/*!40000 ALTER TABLE `bet` DISABLE KEYS */;
INSERT INTO `bet` VALUES (35,18,12,'13:15','2021-09-17','banho e cortar as unhas.','1'),(37,7,7,'09:00','2021-09-28','banho normal e tosa higiÃªnica ','1'),(38,25,14,'13:00','2021-09-30','somente banho','1'),(39,16,14,'11:20','2021-09-24','banho e tosa normal','1');
/*!40000 ALTER TABLE `bet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cliente` (
  `codigo_cli` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `ende` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `tel_residencial` varchar(50) DEFAULT NULL,
  `tel_celular` varchar(50) DEFAULT NULL,
  `status` binary(1) DEFAULT '0',
  PRIMARY KEY (`codigo_cli`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (12,'Maria Melo da ConceiÃ§Ã£o ','0432 Leonor Parkways Suite 304 - Indianapolis, DE / 22703','mariaddc@gmail.com','87694747617','38421225','999255447',_binary '1'),(14,'AmÃ©lia Santos Coelho','rua h n 6 bairro do carmo','amelia@ujf','13548555690','38421247','999877885',_binary '1'),(15,'Manoel Leandro Cavalcanti','Rua K 256 Novo Oriente MaracanaÃº CE','mmanoelleandrocavalcanti@zfenksysteme.com','15996355874','38421478','999855874',_binary '1'),(16,'JosÃ© Vinicius Thomas Ribeiro','Rua Eletricista JosÃ© Monteiro da Silva 823 Padre AntÃ´nio Lima','jose@edu','82176000584','26020714','993704470',_binary '1'),(17,'Gabriel Franco','Rua C, 6, Bairro do Carmo','gabrielfdg10@gmail.com','10813384664','3438428174','34999171345',_binary '1');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `consulta` (
  `codigo_con` int NOT NULL AUTO_INCREMENT,
  `fk_vet` int NOT NULL,
  `fk_ani` int NOT NULL,
  `horario` varchar(250) DEFAULT NULL,
  `data_prevista` varchar(250) DEFAULT NULL,
  `descricao` varchar(250) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`fk_vet`,`fk_ani`),
  UNIQUE KEY `codigo_con` (`codigo_con`),
  KEY `fk_vet` (`fk_vet`),
  KEY `fk_ani` (`fk_ani`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (24,14,11,'07:30','2021-09-11','AvaliaÃ§Ã£o da saÃºde do animal semestral','1'),(35,18,12,'13:15','2021-09-17','consulta com a antonella','1');
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `funcionario` (
  `codigo_func` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `senha` varchar(250) NOT NULL,
  `status` binary(1) DEFAULT '0',
  PRIMARY KEY (`codigo_func`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcionario`
--

LOCK TABLES `funcionario` WRITE;
/*!40000 ALTER TABLE `funcionario` DISABLE KEYS */;
INSERT INTO `funcionario` VALUES (7,'Tulio Araujo','13235366962','988122110','tulio@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(16,'Rafael Araujo','18778777778','1999999999','rafael@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(21,'marcelo da cunha','12374125896','9994554585','marceloa@edu','202cb962ac59075b964b07152d234b70',_binary '1'),(18,'marcelo','14774588545','998554547','marcelo@edu','202cb962ac59075b964b07152d234b70',_binary '1'),(19,'paulo alves','12378999858','999275482','paulo@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(20,'paulo cardoso da silva','18332111252','999877885','ph@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(22,'alvaro silva','6468468168','861681681','alv@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(23,'daniel de melo','125965965625','6656262626262','dani@ufu','202cb962ac59075b964b07152d234b70',_binary '1'),(24,'tiago','351631531635135153','168161865168','ti@edu','81dc9bdb52d04dc20036dbd8313ed055',_binary '1'),(25,'fabio melo','5464161561','65165165165','gabiog@eud','202cb962ac59075b964b07152d234b70',_binary '1');
/*!40000 ALTER TABLE `funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produto` (
  `codigo_prod` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `descr` varchar(250) DEFAULT NULL,
  `status` binary(1) DEFAULT '0',
  `preco` float DEFAULT NULL,
  PRIMARY KEY (`codigo_prod`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produto`
--

LOCK TABLES `produto` WRITE;
/*!40000 ALTER TABLE `produto` DISABLE KEYS */;
INSERT INTO `produto` VALUES (16,'Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa','A Caixa de Transporte FuracÃ£o Pet Luxo Branco e Rosa foi elaborada pensando no conforto de seu pet e para facilitar a vida de seu dono.',_binary '1',200),(17,'Banheira Tudo Pet para Calopsita - Tam. Ãšnico','O banho faz parte da natureza diÃ¡ria da ave, por este motivo permita que a banheira esteja sempre a disposiÃ§Ã£o com Ã¡gua limpa e mais importante apÃ³s o banho retire do local evitando que o pet beba a Ã¡gua.',_binary '1',200);
/*!40000 ALTER TABLE `produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venda_produto`
--

DROP TABLE IF EXISTS `venda_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `venda_produto` (
  `codigo_venda` int NOT NULL,
  `codigo_prod` int NOT NULL,
  PRIMARY KEY (`codigo_venda`,`codigo_prod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venda_produto`
--

LOCK TABLES `venda_produto` WRITE;
/*!40000 ALTER TABLE `venda_produto` DISABLE KEYS */;
INSERT INTO `venda_produto` VALUES (53,16),(53,17),(54,16),(54,17),(55,16),(55,17);
/*!40000 ALTER TABLE `venda_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendas`
--

DROP TABLE IF EXISTS `vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vendas` (
  `codigo_vendas` int NOT NULL AUTO_INCREMENT,
  `fk_func` int NOT NULL,
  `fk_cli` int NOT NULL,
  `status` varchar(250) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  PRIMARY KEY (`codigo_vendas`),
  KEY `fk_func` (`fk_func`),
  KEY `fk_ani` (`fk_cli`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendas`
--

LOCK TABLES `vendas` WRITE;
/*!40000 ALTER TABLE `vendas` DISABLE KEYS */;
INSERT INTO `vendas` VALUES (49,7,14,'0',NULL,200),(50,7,16,'0',NULL,400),(51,7,15,'0',NULL,400),(52,23,12,'0',NULL,400),(53,22,15,'0',NULL,400),(54,16,12,'0',NULL,400),(55,16,14,'0',NULL,400);
/*!40000 ALTER TABLE `vendas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vet`
--

DROP TABLE IF EXISTS `vet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vet` (
  `codigo_vet` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(250) NOT NULL,
  `crmv` varchar(250) NOT NULL,
  `status` binary(1) DEFAULT '0',
  PRIMARY KEY (`codigo_vet`),
  UNIQUE KEY `cpf` (`cpf`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vet`
--

LOCK TABLES `vet` WRITE;
/*!40000 ALTER TABLE `vet` DISABLE KEYS */;
INSERT INTO `vet` VALUES (1,'Marcos Pereira','13235885245','4554',_binary '1'),(14,'Thereza Matos','15995175395','2552',_binary '1'),(17,'Mirella Emilly Costa','44027692802','4778',_binary '1'),(18,'Antonella Teresinha Nair Pereira','16923444985','6532',_binary '1');
/*!40000 ALTER TABLE `vet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-05 18:10:08
