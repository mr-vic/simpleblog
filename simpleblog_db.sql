-- MySQL dump 10.13  Distrib 5.7.32, for Linux (x86_64)
--
-- Host: localhost    Database: simpleblog_db
-- ------------------------------------------------------
-- Server version	5.7.32-0ubuntu0.18.04.1

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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` text,
  `categorie_id` int(11) DEFAULT NULL,
  `pubdate` datetime DEFAULT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Статьи блога';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Как приготовить суп',NULL,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',2,'2021-01-23 16:27:00',0),(2,'План для похудения',NULL,'Aliquet hac tellus augue vulputate mauris nullam aliquet. Sociosqu risus. Integer libero est ridiculus nullam tincidunt praesent habitasse donec facilisi platea. Euismod facilisi. Dapibus enim feugiat fames mus nonummy sagittis nostra. Conubia euismod conubia convallis dapibus.\r\n\r\nId aliquam nisi non rutrum cras lectus eu sem ante at malesuada. Interdum interdum platea. Taciti litora tellus.\r\n\r\nNascetur nec, auctor hymenaeos euismod rhoncus tempor pulvinar condimentum non aliquet aenean diam porttitor sociosqu tincidunt eu nam sed porttitor rutrum sociosqu fermentum lorem conubia senectus amet tortor pede sodales, nisl potenti nascetur dui vivamus fames Velit dictum consequat. Montes nonummy curabitur lacinia class nisi penatibus.',1,'2021-01-19 06:08:00',0),(3,'Что такое Lorem Ipsum?',NULL,'Nulla pede tincidunt fames. Scelerisque nunc amet euismod in dolor ut eleifend penatibus est.\r\n\r\nAenean gravida, lectus hymenaeos, ridiculus dictum cum. Accumsan neque fringilla mi, curabitur pulvinar potenti dictumst nullam. Parturient.\r\n\r\nIaculis aliquet libero ultricies suspendisse hendrerit ultrices metus velit consequat ullamcorper pretium, adipiscing eget.\r\n\r\nConsequat malesuada tempus scelerisque praesent. Scelerisque porta dis turpis. Consectetuer parturient ad potenti.\r\n\r\nNam, fusce dictum vulputate augue ad sodales varius class. Placerat sed, duis sem taciti est ridiculus amet. Penatibus bibendum viverra ligula.\r\n\r\nDictumst praesent accumsan rhoncus morbi taciti cum, amet potenti. Consectetuer erat. Praesent dis dui. Et ad class pede penatibus etiam mi.',4,'2021-01-11 07:00:00',0),(4,'Охота снежного леопарда',NULL,'Lorem ipsum ...',5,'2021-01-24 00:39:12',0);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles_categories`
--

DROP TABLE IF EXISTS `articles_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles_categories`
--

LOCK TABLES `articles_categories` WRITE;
/*!40000 ALTER TABLE `articles_categories` DISABLE KEYS */;
INSERT INTO `articles_categories` VALUES (1,'Спорт'),(2,'Кулинария'),(3,'Садоводство'),(4,'Программирование'),(5,'Охота и рыбалка');
/*!40000 ALTER TABLE `articles_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(100) DEFAULT NULL,
  `text` text NOT NULL,
  `pubdate` datetime NOT NULL,
  `articles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Alex Storm','Классный получился суп','2021-01-23 03:11:00',1);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-25 11:21:46
