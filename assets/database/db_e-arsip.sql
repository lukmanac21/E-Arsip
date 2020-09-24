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
  `diteruskan_kepada` text DEFAULT NULL,
  `isi_disposisi` text DEFAULT NULL,
  `id_paraf_kepala` int(11) DEFAULT NULL,
  `id_paraf_sek` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id_disposisi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_disposisi` */

insert  into `mst_disposisi`(`id_disposisi`,`id_surat`,`tgl_disposisi`,`diteruskan_kepada`,`isi_disposisi`,`id_paraf_kepala`,`id_paraf_sek`,`created_by`) values 
(3,3,'2020-09-24','<ol><li>Mas Lukman</li></ol>','Where are you going',NULL,NULL,1);

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

/*Table structure for table `mst_paraf` */

DROP TABLE IF EXISTS `mst_paraf`;

CREATE TABLE `mst_paraf` (
  `id_paraf` int(11) NOT NULL AUTO_INCREMENT,
  `nama_paraf` varchar(255) NOT NULL,
  `img_paraf` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL,
  PRIMARY KEY (`id_paraf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_paraf` */

insert  into `mst_paraf`(`id_paraf`,`nama_paraf`,`img_paraf`,`id_role`) values 
(3,'Lukman, ST.MT','ttd-rini.png',4),
(4,'Huda, ST.MT','logo-rsbs.jpg',5);

/*Table structure for table `mst_role` */

DROP TABLE IF EXISTS `mst_role`;

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `nama_role` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_role` */

insert  into `mst_role`(`id_role`,`nama_role`,`jabatan`) values 
(1,'Superadmin',NULL),
(2,'Admin',NULL),
(3,'Umum','Bagian Umum dan Kepegawaian'),
(4,'Camat','Kepala Kecamatan'),
(5,'Sekcam','Sekretaris Kecamatan');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `mst_sub_menu` */

insert  into `mst_sub_menu`(`id_sub_menu`,`id_menu`,`nama_sub_menu`,`link_sub_menu`) values 
(1,1,'Master Menu','Menu/index'),
(3,1,'Master Sub Menu','Menusub/index'),
(12,1,'Master Role','Role/index'),
(15,2,'Surat Masuk','Suratmasuk/index'),
(16,2,'Surat Keluar','Suratkeluar/index'),
(18,2,'Disposisi','Disposisi/index'),
(19,1,'Master Paraf','Paraf/index'),
(21,2,'Disposisi Kepala','DisposisiKepala/index');

/*Table structure for table `mst_surat_masuk` */

DROP TABLE IF EXISTS `mst_surat_masuk`;

CREATE TABLE `mst_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim_surat` varchar(255) NOT NULL,
  `perihal_surat` text NOT NULL,
  `tgl_terima_surat` date NOT NULL,
  `no_agenda_surat` int(11) NOT NULL,
  `bukti_surat` varchar(255) NOT NULL,
  PRIMARY KEY (`id_surat_masuk`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_surat_masuk` */

insert  into `mst_surat_masuk`(`id_surat_masuk`,`no_surat`,`tgl_surat`,`pengirim_surat`,`perihal_surat`,`tgl_terima_surat`,`no_agenda_surat`,`bukti_surat`) values 
(3,'800/1558/430.9.11/2020','2020-09-14','Dinas PUPR','Permohonan Perizinan Magang','2020-09-09',278,'chopper.jpg');

/*Table structure for table `mst_user` */

DROP TABLE IF EXISTS `mst_user`;

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `mst_user` */

insert  into `mst_user`(`id_user`,`id_role`,`nama_user`,`email_user`,`password_user`) values 
(1,1,'Admin','Admin@kominfo.com','d033e22ae348aeb5660fc2140aec35850c4da997'),
(2,3,'Umum','Umum@kominfo.com','b617726c7f45ecb196ef74881089fa17d90d7276'),
(3,4,'Camat','Camat@kominfo.com','93b89e6160d6c85d709954ce733d5eec131ab0a0'),
(4,5,'Sekcam','Sekcam@kominfo.com','d37ea5b3911c9a2a5b9b22321041754193e41acb');

/*Table structure for table `mst_user_access` */

DROP TABLE IF EXISTS `mst_user_access`;

CREATE TABLE `mst_user_access` (
  `id_user_access` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  PRIMARY KEY (`id_user_access`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `mst_user_access` */

insert  into `mst_user_access`(`id_user_access`,`id_role`,`id_sub_menu`) values 
(2,1,3),
(3,1,12),
(17,1,15),
(18,1,16),
(32,1,19),
(34,1,18),
(35,1,21),
(36,1,1),
(37,4,21),
(38,3,18);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
