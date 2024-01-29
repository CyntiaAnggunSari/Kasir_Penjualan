/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.5.5-10.4.28-MariaDB : Database - dbpenjualan2110038
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbpenjualan2110038` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbpenjualan2110038`;

/*Table structure for table `tbl_detailpesanan` */

DROP TABLE IF EXISTS `tbl_detailpesanan`;

CREATE TABLE `tbl_detailpesanan` (
  `iddetailpesanan` int(11) NOT NULL AUTO_INCREMENT,
  `idpesanan` int(11) DEFAULT NULL,
  `idproduk` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`iddetailpesanan`),
  KEY `idpesanan` (`idpesanan`),
  KEY `idproduk` (`idproduk`),
  CONSTRAINT `tbl_detailpesanan_ibfk_1` FOREIGN KEY (`idpesanan`) REFERENCES `tbl_pesanan` (`idpesanan`),
  CONSTRAINT `tbl_detailpesanan_ibfk_2` FOREIGN KEY (`idproduk`) REFERENCES `tbl_produk` (`idproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=200011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_detailpesanan` */

insert  into `tbl_detailpesanan`(`iddetailpesanan`,`idpesanan`,`idproduk`,`qty`,`harga`,`total`) values (200009,100010,1,1,250000,250000),(200010,100010,3,1,20000,20000);

/*Table structure for table `tbl_pesanan` */

DROP TABLE IF EXISTS `tbl_pesanan`;

CREATE TABLE `tbl_pesanan` (
  `idpesanan` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  PRIMARY KEY (`idpesanan`),
  KEY `iduser` (`iduser`),
  CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tbl_user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=100011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_pesanan` */

insert  into `tbl_pesanan`(`idpesanan`,`tanggal`,`iduser`,`total`) values (100010,'2024-01-27',1,270000);

/*Table structure for table `tbl_produk` */

DROP TABLE IF EXISTS `tbl_produk`;

CREATE TABLE `tbl_produk` (
  `idproduk` int(11) NOT NULL AUTO_INCREMENT,
  `namaproduk` varchar(35) DEFAULT NULL,
  `deskripsi` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` double DEFAULT NULL,
  PRIMARY KEY (`idproduk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_produk` */

insert  into `tbl_produk`(`idproduk`,`namaproduk`,`deskripsi`,`stok`,`harga`) values (1,'Cake Pisang','Makanan',18,250000),(2,'Kue 88','Snack',29,8000),(3,'Keripik Balado','Snack',19,20000),(4,'Pisang Salay','Snack',35,15000);

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id_user`,`nama_user`,`email`,`password`,`level`) values (1,'CYNTIA','cyntia0@gmail.com','$2y$10$7BSbfxzZBDHGEonE7Kj.Tegpcn0Hpd0oW1vf.jpeJnUaDRas1MwhK',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
