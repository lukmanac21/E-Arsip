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

/*Table structure for table `mst_bagian` */

DROP TABLE IF EXISTS `mst_bagian`;

CREATE TABLE `mst_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(255) NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_bagian` */

insert  into `mst_bagian`(`id_bagian`,`nama_bagian`) values 
(1,'Kepala Dinas'),
(2,'Sekretaris Dinas'),
(3,'Kepala Bagian Dinas');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_disposisi` */

insert  into `mst_disposisi`(`id_disposisi`,`id_surat`,`tgl_disposisi`,`diteruskan_kepada`,`isi_disposisi`,`id_paraf_kepala`,`id_paraf_sek`,`created_by`) values 
(4,3,'2020-09-24','<ol><li>Mas Lukman</li><li>Mas Dandi</li></ol>','Where are you going man, buwung apa tu?',NULL,4,2);

/*Table structure for table `mst_function` */

DROP TABLE IF EXISTS `mst_function`;

CREATE TABLE `mst_function` (
  `id_function` int(11) NOT NULL AUTO_INCREMENT,
  `nama_function` varchar(255) NOT NULL,
  PRIMARY KEY (`id_function`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_function` */

/*Table structure for table `mst_jenis` */

DROP TABLE IF EXISTS `mst_jenis`;

CREATE TABLE `mst_jenis` (
  `id_jenis` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id_jenis`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_jenis` */

insert  into `mst_jenis`(`id_jenis`,`nama_jenis`) values 
(1,'Surat Pengantar'),
(2,'Surat Resmi');

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

/*Table structure for table `mst_opd` */

DROP TABLE IF EXISTS `mst_opd`;

CREATE TABLE `mst_opd` (
  `id_opd` int(11) NOT NULL AUTO_INCREMENT,
  `nama_opd` varchar(255) NOT NULL,
  PRIMARY KEY (`id_opd`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_opd` */

insert  into `mst_opd`(`id_opd`,`nama_opd`) values 
(4,'Dinas Pendidikan'),
(5,'Dinas Kebudayaan, Pariwisata, Kepemudaan dan Olahraga'),
(6,'Dinas Kesehatan'),
(7,'Dinas Sosial, Pemberdayaan Perempuan, dan Perlindungan Anak');

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
(3,'Lukman, ST.MT','web.png',4),
(4,'Huda, ST.MT','LOGO_POLITEKNIK_NEGERI_JEMBER.png',5);

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

/*Data for the table `mst_sub_menu` */

insert  into `mst_sub_menu`(`id_sub_menu`,`id_menu`,`nama_sub_menu`,`link_sub_menu`) values 
(1,1,'Master Menu','Menu/index'),
(3,1,'Master Sub Menu','Menusub/index'),
(12,1,'Master Role','Role/index'),
(15,2,'Surat Masuk','Suratmasuk/index'),
(16,2,'Surat Keluar','Suratkeluar/index'),
(18,2,'Disposisi','Disposisi/index'),
(19,1,'Master Paraf','Paraf/index'),
(21,2,'Disposisi Kepala','DisposisiKepala/index'),
(22,2,'Disposisi Sekretaris','DisposisiSekretaris/index'),
(23,1,'Master User','User/index'),
(24,1,'Master OPD','OPD/index'),
(25,1,'Master Bagian','Bagian/index');

/*Table structure for table `mst_surat_keluar` */

DROP TABLE IF EXISTS `mst_surat_keluar`;

CREATE TABLE `mst_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT,
  `id_jenis` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_surat` text NOT NULL,
  `id_paraf` int(11) NOT NULL,
  `lampiran` int(11) NOT NULL,
  PRIMARY KEY (`id_surat_keluar`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_surat_keluar` */

insert  into `mst_surat_keluar`(`id_surat_keluar`,`id_jenis`,`id_opd`,`id_bagian`,`perihal`,`no_surat`,`sifat`,`tgl_surat`,`isi_surat`,`id_paraf`,`lampiran`) values 
(1,1,4,0,'Usulan Pergantian Bendahara','182-20321-234','Penting','2020-09-30','<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify\">Dengan hormat, <o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Berdasarkan informasi yang kami terima\r\ndari Kepala Satpol PP Kabupaten Bogor yang menginformasikan bahwa PT Elang Sejahtera\r\nsaat ini memasang baliho di Jl Raya Bogor Km 35. Baliho tersebut saat ini belum\r\ndibayarkan pajaknya senilai <b>Rp. 5.250.000\r\n(Lima Juta Dua Ratus Lima Puluh Ribu)</b>.<o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Untuk itu dengan masuknya surat ini kami\r\nbermaksud untuk menagih biaya pajak reklame tersebut. Kami memberikan waktu\r\nhingga 30 September 2019 untuk pihak kantor bapak bisa menyelesaikan\r\npermasalahan ini. Jika dalam waktu yang sudah ditentukan tidak ada respon balik\r\ndari perwakilan perusahaan maka kami akan menindak dengan mencopot baliho tersebut.<o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Demikianlah informasi ini kami sampaikan\r\nagar menjadi perhatian bagi perusahaan bapak. Atas perhatian dan kerjasamanya\r\nkami ucapkan terima kasih.<o:p></o:p></p>                        ',3,1);

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

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
(38,3,18),
(39,1,22),
(40,5,22),
(41,1,23),
(42,1,24),
(43,2,18),
(44,2,24),
(45,2,19),
(46,2,12),
(47,2,23),
(48,2,16),
(49,2,15),
(50,1,25);

/*Table structure for table `mst_user_function` */

DROP TABLE IF EXISTS `mst_user_function`;

CREATE TABLE `mst_user_function` (
  `id_user_function` int(11) NOT NULL AUTO_INCREMENT,
  `id_user_access` int(11) NOT NULL,
  `id_function` int(11) NOT NULL,
  PRIMARY KEY (`id_user_function`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `mst_user_function` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
