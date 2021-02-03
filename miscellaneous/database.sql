/*
SQLyog Ultimate v8.82 
MySQL - 5.5.24-log : Database - assetmanager
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `asset` */

CREATE TABLE `asset` (
  `assetid` int(11) NOT NULL AUTO_INCREMENT,
  `assetname` varchar(200) DEFAULT NULL,
  `assetdesc` text,
  `providedby` varchar(200) DEFAULT NULL,
  `acquiredate` date DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `amountpurchased` double DEFAULT NULL,
  `assettagid` varchar(200) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  PRIMARY KEY (`assetid`),
  UNIQUE KEY `assetid` (`assetid`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

/*Data for the table `asset` */

insert  into `asset`(`assetid`,`assetname`,`assetdesc`,`providedby`,`acquiredate`,`lifetime`,`amountpurchased`,`assettagid`,`photo`,`categoryid`) values (1,'a','b','c','0000-00-00',12,12,'12','23',2),(17,'a','b','c','2014-01-01',12,12,'13','23',2),(18,'a','b','c','2014-01-01',12,12,'13','23',2);

/*Table structure for table `assetcategory` */

CREATE TABLE `assetcategory` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(100) DEFAULT NULL,
  `categorydesc` text,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `assetcategory` */

insert  into `assetcategory`(`categoryid`,`categoryname`,`categorydesc`) values (3,'sometext','sometext'),(4,'sometext','sometext'),(5,'sometext','sometext'),(6,'sometext','sometext'),(7,'sometext','sometext'),(8,'sometext','sometext'),(9,'sometext','sometext'),(10,'sometext','sometext'),(11,'sometext','sometext'),(12,'sometext','sometext'),(13,'sometext','sometext'),(14,'sometext','sometext'),(15,'sometext','sometext'),(16,'eee','eee');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
