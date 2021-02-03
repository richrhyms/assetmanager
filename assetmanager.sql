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
  `ownertype` varchar(200) DEFAULT NULL,
  `ownerid` int(11) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `categoryid` int(11) DEFAULT NULL,
  PRIMARY KEY (`assetid`),
  UNIQUE KEY `assetid` (`assetid`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `asset` */

insert  into `asset`(`assetid`,`assetname`,`assetdesc`,`providedby`,`acquiredate`,`lifetime`,`amountpurchased`,`assettagid`,`ownertype`,`ownerid`,`photo`,`categoryid`) values (1,'Motor Vehicle','Mercedes Benz GL 450','University','2014-06-01',1461,5850000,'5IF-01FG','Faculty',4,NULL,1),(2,'Motor Vehicle','Toyota Prado TXL','Government','2014-06-01',1461,14995000,'5IF-02FG','Faculty',4,NULL,1),(3,'Motor Vehicle','Toyota Camry (1.8) 2011','University','2014-06-01',1461,3750000,'5IF-03FG','Faculty',4,NULL,1),(4,'Motor Vehicle','Peugeot 407','Government','2014-06-01',1461,2650000,'5IF-04FG','Faculty',4,NULL,1),(5,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-05FG','Faculty',4,NULL,1),(6,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-06FG','Faculty',4,NULL,1),(7,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-07FG','Faculty',4,NULL,1),(8,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-08FG','Faculty',4,NULL,1),(9,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-09FG','Faculty',4,NULL,1),(10,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-10FG','Faculty',4,NULL,1),(11,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-11FG','Faculty',4,NULL,1),(12,'Motor Vehicle','Toyota Corolla (1.8L) 2011','University','2014-06-01',1461,3750000,'5IF-12FG','Faculty',4,NULL,1),(13,'Motor Vehicle','Peugeot Ambulance Expert','Government','2014-06-01',1461,5475000,'5IF-13FG','Faculty',4,NULL,1),(14,'Motor Vehicle','Toyota Hilux VVTi','University','2014-06-01',1461,4888000,'5IF-14FG','Faculty',4,NULL,1),(15,'Motor Vehicle','Toyota Hilux VVTi','Government','2014-06-01',1461,4888000,'5IF-15FG','Faculty',4,NULL,1),(16,'Motor Vehicle','Toyota Hilux VVTi','Government','2014-06-01',1461,4888000,'5IF-16FG','Faculty',4,NULL,1),(17,'Motor Vehicle','Toyota Hilux VVTi','Government','2014-06-01',1461,4888000,'5IF-17FG','Faculty',4,NULL,1),(18,'Motor Vehicle','Toyota Bus Coaster VVTi','Government','2014-06-01',1461,9225000,'5IF-18FG','Faculty',4,NULL,1),(19,'Motor Vehicle','Toyota Bus Coaster VVTi','Government','2014-06-01',1461,9225000,'5IF-19FG','Faculty',4,NULL,1),(20,'Motor Vehicle','\"Mercedes Benz Tanker 10','Government','2014-06-01',1461,11150000,'5IF-20FG','Faculty',4,NULL,1),(21,'Motor Vehicle','\"Mercedes Benz Tanker 15','Government','2014-06-01',1461,11150000,'5IF-21FG','Faculty',4,NULL,1),(22,'Motor Vehicle','Mercedes Benz van Refuse Van','Government','2014-06-01',1461,10650000,'5IF-22FG','Faculty',4,NULL,1),(23,'Motor Vehicle','Mercedes Benz bus 52-Seater','Government','2014-06-01',1461,11275000,'5IF-23FG','Faculty',4,NULL,1),(24,'Motor Vehicle','Toyota Hilux VVTi','Government','2014-06-01',1461,5225000,'5IF-24FG','Faculty',4,NULL,1),(25,'Motor Vehicle','Toyota Hilux VVTi','Government','2014-06-01',1461,4888000,'5IF-25FG','Faculty',4,NULL,1);

/*Table structure for table `assetcategory` */

CREATE TABLE `assetcategory` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `categoryname` varchar(100) DEFAULT NULL,
  `categorydesc` text,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `assetcategory` */

insert  into `assetcategory`(`categoryid`,`categoryname`,`categorydesc`) values (1,'Automobile','AutoMobile'),(2,'Furniture','Furniture'),(3,'Plant & Machinery','Plant & Machinery'),(4,'Computer','Computer'),(5,'Equipments','Equipments'),(6,'Electric Plants','Electric Plants'),(7,'Office Electronics','Office Electronics');

/*Table structure for table `department` */

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL AUTO_INCREMENT,
  `departmentname` varchar(200) DEFAULT NULL,
  `facultyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`departmentid`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `department` */

insert  into `department`(`departmentid`,`departmentname`,`facultyid`) values (1,'Agricultural Economics',1),(2,'Animal Production & Health',1),(3,'Crop Production & Protection',1),(4,'Fisheries & Aquacultural Technology',1),(5,'Food Sciences & Technology',1),(6,'Forestry and Wild Life Management',1),(7,'Accounting',2),(8,'Business Management',2),(9,'Economics & Development',2),(10,'Geography and Regional Planning',2),(11,'History & Strategic Studies',2),(12,'Languages & Communication Studies',2),(13,'Political Science',2),(14,'Sociology',2),(15,'Applied Chemistry',3),(16,'Biochemistry & Molecular Biology',3),(17,'Biological Sciences',2),(18,'Educational Foundation',2),(19,'Mathematical Sciences & IT',3),(20,'Microbiology',3),(21,'Physics',3),(22,'Science Education',3);

/*Table structure for table `faculty` */

CREATE TABLE `faculty` (
  `facultyid` int(11) NOT NULL AUTO_INCREMENT,
  `facultyname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`facultyid`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `faculty` */

insert  into `faculty`(`facultyid`,`facultyname`) values (1,'Agric & Agric Technology'),(2,'Arts, Management & Social Sciences'),(3,'Science & Education'),(4,'VC\'s Office'),(5,'Registry'),(6,'Busary'),(7,'Library'),(8,'Audit'),(9,'Institute of Communication Technology (ICT)'),(10,'Student Affairs');

/*Table structure for table `permission` */

CREATE TABLE `permission` (
  `permissionid` int(11) NOT NULL AUTO_INCREMENT,
  `permissionname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`permissionid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `permission` */

insert  into `permission`(`permissionid`,`permissionname`) values (1,'list asset_'),(2,'create asset'),(3,'edit asset'),(4,'delete asset'),(6,'export asset'),(7,'upload asset picture');

/*Table structure for table `role` */

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `rolename` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `role` */

insert  into `role`(`roleid`,`rolename`) values (1,'Admin'),(2,'Super Admin'),(3,'Operator'),(4,'Developer_'),(5,'End User');

/*Table structure for table `role_permission` */

CREATE TABLE `role_permission` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) DEFAULT NULL,
  `permissionid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `role_permission` */

insert  into `role_permission`(`id`,`roleid`,`permissionid`) values (2,1,1),(3,1,2),(6,1,5),(7,2,4),(8,2,5),(9,1,3),(10,1,4),(11,4,2),(12,4,3),(13,5,1),(14,5,4),(15,5,2);

/*Table structure for table `user` */

CREATE TABLE `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `displayname` text,
  `datecreated` date DEFAULT NULL,
  `enabled` int(1) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`userid`,`username`,`password`,`displayname`,`datecreated`,`enabled`) values (1,'admin','admin','Aminu Onimisi Abdulsalami','2014-01-01',1),(4,'admin3','admin3','123456','0000-00-00',1),(6,'admin4','123456','My Admin','0000-00-00',1),(8,'mamudasalami','123','Mamuda Salami','2014-01-24',1),(9,'abdulkareem','otaru','Abdulkareem Bello','2014-01-24',1),(10,'suleiman','123','Suleiman 400L','2014-02-06',1),(12,'chiroma','staff','Chiroma','2014-02-07',1);

/*Table structure for table `user_role` */

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `roleid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`userid`,`roleid`) values (1,1,1),(2,10,4),(3,6,2),(4,12,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
