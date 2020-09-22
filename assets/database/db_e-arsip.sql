/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_e-arsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_e-arsip` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_e-arsip`;

/*Table structure for table `mst_disposisi` */

DROP TABLE IF EXISTS `mst_disposisi`;

CREATE TABLE `mst_disposisi` (
  `id_disposisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_surat` int(11) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi_disposisi` text NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_disposisi` */

/*Table structure for table `mst_menu` */

DROP TABLE IF EXISTS `mst_menu`;

CREATE TABLE `mst_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(20) NOT NULL,
  `icon_menu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mst_menu` */

insert  into `mst_menu`(`id_menu`,`nama_menu`,`icon_menu`) values 
(1,'Data Master','nav-icon fas fa-th'),
(2,'Surat','nav-icon far fa-envelope');

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id_role`,`nama_role`) values 
(1,'Superadmin');

/*Table structure for table `mst_status` */

DROP TABLE IF EXISTS `mst_status`;

CREATE TABLE `mst_status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `mst_status` */

insert  into `mst_status`(`id_status`,`nama_status`) values 
(1,'Diterima'),
(2,'Dibaca'),
(3,'Disposisi');

/*Table structure for table `mst_sub_menu` */

DROP TABLE IF EXISTS `mst_sub_menu`;

CREATE TABLE `mst_sub_menu` (
  `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(50) NOT NULL,
  `link_sub_menu` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sub_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `mst_sub_menu` */

insert  into `mst_sub_menu`(`id_sub_menu`,`id_menu`,`nama_sub_menu`,`link_sub_menu`) values 
(1,1,'Master Menu','Menu/index'),
(3,1,'Master Sub Menu','Menusub/index'),
(12,1,'Master Role','Role/index'),
(13,1,'Master Perihal','Perihal/index'),
(14,1,'Master Tujuan','Tujuan/index'),
(15,2,'Surat Masuk','Suratmasuk/index'),
(16,2,'Surat Keluar','Suratkeluar/index'),
(18,2,'Disposisi','Disposisi/index');

/*Table structure for table `mst_surat_masuk` */

DROP TABLE IF EXISTS `mst_surat_masuk`;

CREATE TABLE `mst_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim_surat` varchar(255) NOT NULL,
  `bukti_surat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_surat_masuk` */

insert  into `mst_surat_masuk`(`id_surat_masuk`,`no_surat`,`tgl_surat`,`pengirim_surat`,`bukti_surat`) values 
(2,'oke tes','2020-09-22','afdaf','962416.png');

/*Table structure for table `mst_user` */

DROP TABLE IF EXISTS `mst_user`;

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `mst_user` */

insert  into `mst_user`(`id_user`,`id_role`,`nama_user`,`email_user`,`password_user`) values 
(1,1,'Admin','Admin@kominfo.com','d033e22ae348aeb5660fc2140aec35850c4da997');

/*Table structure for table `mst_user_access` */

DROP TABLE IF EXISTS `mst_user_access`;

CREATE TABLE `mst_user_access` (
  `id_user_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_user_access`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

/*Data for the table `mst_user_access` */

insert  into `mst_user_access`(`id_user_access`,`id_role`,`id_sub_menu`) values 
(1,1,1),
(2,1,3),
(3,1,12),
(15,1,13),
(16,1,14),
(17,1,15),
(18,1,16),
(31,1,18);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
