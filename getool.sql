/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.7.10-enterprise-commercial-advanced-log : Database - getool
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`getool` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `getool`;

/*Table structure for table `center` */

DROP TABLE IF EXISTS `center`;

CREATE TABLE `center` (
  `No` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `boxs` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `center` */

insert  into `center`(`No`,`name`,`boxs`) values (1,'center one','1,2'),(2,'center two','3,4');

/*Table structure for table `keeper` */

DROP TABLE IF EXISTS `keeper`;

CREATE TABLE `keeper` (
  `Id` varchar(15) NOT NULL,
  `pwd` varchar(15) NOT NULL,
  `boxUse` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `keeper` */

insert  into `keeper`(`Id`,`pwd`,`boxUse`) values ('admin','admin','1');

/*Table structure for table `toolbox_1` */

DROP TABLE IF EXISTS `toolbox_1`;

CREATE TABLE `toolbox_1` (
  `No` int(15) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `number` int(15) NOT NULL,
  `status` varchar(15) NOT NULL,
  `intro` text,
  PRIMARY KEY (`No`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `toolbox_1` */

insert  into `toolbox_1`(`No`,`type`,`number`,`status`,`intro`) values (7,'test1',5,'normal',''),(8,'test1',3,'normal','	            ');

/*Table structure for table `toolbox_2` */

DROP TABLE IF EXISTS `toolbox_2`;

CREATE TABLE `toolbox_2` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `intro` text,
  PRIMARY KEY (`No`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

/*Data for the table `toolbox_2` */

insert  into `toolbox_2`(`No`,`type`,`number`,`status`,`intro`) values (15,'test1',43,'normal',''),(16,'test1',454,'normal','	            '),(17,'test1',45,'normal','	            ');

/*Table structure for table `toolbox_3` */

DROP TABLE IF EXISTS `toolbox_3`;

CREATE TABLE `toolbox_3` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `intro` text,
  PRIMARY KEY (`No`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `toolbox_3` */

insert  into `toolbox_3`(`No`,`type`,`number`,`status`,`intro`) values (3,'test1',96,'loan','            ');

/*Table structure for table `toolbox_4` */

DROP TABLE IF EXISTS `toolbox_4`;

CREATE TABLE `toolbox_4` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) NOT NULL,
  `number` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `intro` text,
  PRIMARY KEY (`No`,`type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `toolbox_4` */

insert  into `toolbox_4`(`No`,`type`,`number`,`status`,`intro`) values (4,'test1',101,'loan','            ');

/*Table structure for table `toolloan_1` */

DROP TABLE IF EXISTS `toolloan_1`;

CREATE TABLE `toolloan_1` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) DEFAULT NULL,
  `loanNum` int(11) DEFAULT NULL,
  `loanTime` datetime DEFAULT NULL,
  `loanId` varchar(15) DEFAULT NULL,
  `retNum` varchar(30) DEFAULT NULL,
  `retTime` varchar(300) DEFAULT NULL,
  `retId` varchar(30) DEFAULT NULL,
  `isEnd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MEMORY AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `toolloan_1` */

insert  into `toolloan_1`(`No`,`type`,`loanNum`,`loanTime`,`loanId`,`retNum`,`retTime`,`retId`,`isEnd`) values (8,'test1',10,'2016-04-22 02:42:00','one',NULL,NULL,NULL,0),(7,'test1',10,'2016-04-22 02:40:00','one','10,','2016-04-22 03:45,','one,',1);

/*Table structure for table `toolloan_2` */

DROP TABLE IF EXISTS `toolloan_2`;

CREATE TABLE `toolloan_2` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) DEFAULT NULL,
  `loanNum` int(11) DEFAULT NULL,
  `loanTime` datetime DEFAULT NULL,
  `loanId` varchar(15) DEFAULT NULL,
  `retNum` varchar(30) DEFAULT NULL,
  `retTime` varchar(300) DEFAULT NULL,
  `retId` varchar(30) DEFAULT NULL,
  `isEnd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MEMORY AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

/*Data for the table `toolloan_2` */

insert  into `toolloan_2`(`No`,`type`,`loanNum`,`loanTime`,`loanId`,`retNum`,`retTime`,`retId`,`isEnd`) values (19,'test2',45,'2016-04-22 09:58:00','asd','45,','2016-04-22 11:55,','asd,',1),(8,'test1',5,'2016-04-22 06:38:00','fg','5,','2016-04-22 07:10,','fg,',1),(9,'test1',5,'2016-04-22 06:41:00','fg','5,','2016-04-22 07:10,','fg,',1),(10,'test1',5,'2016-04-22 06:41:00','fg','5,','2016-04-22 07:14,','fg,',1);

/*Table structure for table `toolloan_3` */

DROP TABLE IF EXISTS `toolloan_3`;

CREATE TABLE `toolloan_3` (
  `No` int(1) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) DEFAULT NULL,
  `loanNum` int(11) DEFAULT NULL,
  `loanTime` datetime DEFAULT NULL,
  `loanId` varchar(15) DEFAULT NULL,
  `retNum` varchar(30) DEFAULT NULL,
  `retTime` varchar(300) DEFAULT NULL,
  `retId` varchar(30) DEFAULT NULL,
  `isEnd` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

/*Data for the table `toolloan_3` */

/*Table structure for table `toolloan_4` */

DROP TABLE IF EXISTS `toolloan_4`;

CREATE TABLE `toolloan_4` (
  `No` int(15) NOT NULL AUTO_INCREMENT,
  `type` varchar(15) NOT NULL,
  `loanNum` int(8) NOT NULL,
  `loanTime` datetime NOT NULL,
  `loanId` varchar(15) NOT NULL,
  `retNum` varchar(30) DEFAULT NULL,
  `retTime` varchar(300) DEFAULT NULL,
  `retId` varchar(300) DEFAULT NULL,
  `isEnd` tinyint(1) NOT NULL,
  PRIMARY KEY (`No`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8;

/*Data for the table `toolloan_4` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
