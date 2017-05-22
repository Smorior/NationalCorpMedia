-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.45-community-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema natmedia
--

CREATE DATABASE IF NOT EXISTS natmedia;
USE natmedia;

--
-- Definition of table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(145) NOT NULL,
  `size` varchar(55) NOT NULL,
  `status` int(10) unsigned NOT NULL default '1',
  `price` double NOT NULL,
  `ins4` double default NULL,
  `ins16` double default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`,`name`,`size`,`status`,`price`,`ins4`,`ins16`) VALUES 
 (1,'Full page - Back Cover ','10.375’’ W x 11.5’’ H',1,5000,4500,4000),
 (2,'Full page - Inside Cover ','10.375’’ W x 11.5’’ H',1,5000,4500,4000),
 (3,'Full page - Elsewhere ','10.375’’ W x 11.5’’ H',1,4000,3500,3000),
 (4,'1/2 page','10.375’’ W x 5.75’’ H',1,2000,1500,1000),
 (5,'Horizontal 1/4','10.375’’ W x 2.875’’ H',1,1500,1000,750),
 (6,'Vertical 1/4','2.5’’ W x 11.5’’ H',1,1500,1000,750),
 (7,'Base banner','10.375’’ W x 1.438’’ H',1,1000,800,600),
 (8,'Top banner','10.375’’ W x 1.438’’ H',1,1000,800,600),
 (9,'Puzzle page','6.732’’ W x 2.834’’ H',1,3000,2500,2000),
 (10,'Custom Editorial - Front Page','Custom',1,6500,6000,5500),
 (11,'Custom Editorial - Elsewhere','Custom',1,5500,5000,4500);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;


--
-- Definition of table `home_page`
--

DROP TABLE IF EXISTS `home_page`;
CREATE TABLE `home_page` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `image_name` varchar(45) NOT NULL,
  `status` int(10) unsigned NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `home_page`
--

/*!40000 ALTER TABLE `home_page` DISABLE KEYS */;
INSERT INTO `home_page` (`id`,`image_name`,`status`) VALUES 
 (3,'noviHome1.png',1);
/*!40000 ALTER TABLE `home_page` ENABLE KEYS */;


--
-- Definition of table `user_uploads`
--

DROP TABLE IF EXISTS `user_uploads`;
CREATE TABLE `user_uploads` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `banner_id` int(10) unsigned NOT NULL,
  `file_name` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  USING BTREE (`user_id`,`file_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_uploads`
--

/*!40000 ALTER TABLE `user_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_uploads` ENABLE KEYS */;


--
-- Definition of table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(45) NOT NULL,
  `surname` varchar(145) NOT NULL,
  `company` varchar(145) default NULL,
  `username` varchar(45) NOT NULL,
  `pswd` varchar(15) NOT NULL,
  `reg_code` varchar(45) default NULL,
  `mail` varchar(45) NOT NULL,
  `adress` varchar(45) default NULL,
  `phone` varchar(45) default NULL,
  `status` int(10) unsigned default NULL,
  `reg_status` int(10) unsigned default '0',
  `date_reg` datetime NOT NULL,
  `access_group` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`,`name`,`surname`,`company`,`username`,`pswd`,`reg_code`,`mail`,`adress`,`phone`,`status`,`reg_status`,`date_reg`,`access_group`) VALUES 
 (1,'admin','admin','Nationalcorp Media','admin','a','12342','info@nationalmedia.ca',NULL,NULL,1,1,'2014-12-05 00:00:00',5);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
