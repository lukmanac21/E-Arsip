-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 04:41 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_e-arsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_bagian`
--

CREATE TABLE `mst_bagian` (
  `id_bagian` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_bagian`
--

INSERT INTO `mst_bagian` (`id_bagian`, `nama_bagian`) VALUES
(1, 'Kepala'),
(2, 'Sekretaris'),
(3, 'Kepala Bagian'),
(4, 'Kepala Sie'),
(5, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `mst_disposisi`
--

CREATE TABLE `mst_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `diteruskan_kepada` text DEFAULT NULL,
  `isi_disposisi` text DEFAULT NULL,
  `id_paraf_kepala` int(11) DEFAULT NULL,
  `id_paraf_sek` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_disposisi`
--

INSERT INTO `mst_disposisi` (`id_disposisi`, `id_surat`, `tgl_disposisi`, `diteruskan_kepada`, `isi_disposisi`, `id_paraf_kepala`, `id_paraf_sek`, `created_by`) VALUES
(4, 3, '2020-09-24', '<ol><li>Mas Lukman</li><li>Mas Dandi</li></ol>', 'Where are you going man, buwung apa tu?', NULL, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `mst_function`
--

CREATE TABLE `mst_function` (
  `id_function` int(11) NOT NULL,
  `nama_function` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_function`
--

INSERT INTO `mst_function` (`id_function`, `nama_function`) VALUES
(1, 'Tambah'),
(2, 'Ubah'),
(3, 'Hapus'),
(4, 'Cetak'),
(5, 'Paraf');

-- --------------------------------------------------------

--
-- Table structure for table `mst_jenis`
--

CREATE TABLE `mst_jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_jenis`
--

INSERT INTO `mst_jenis` (`id_jenis`, `nama_jenis`) VALUES
(1, 'Peraturan'),
(2, 'Keputusan'),
(3, 'Instruksi'),
(4, 'Prosedur operasional standar'),
(5, 'Surat edaran'),
(6, 'Surat tugas'),
(7, 'Nota dinas'),
(8, 'Memo'),
(9, 'Surat dinas'),
(10, 'Surat undangan'),
(11, 'Nota kesepahaman'),
(12, 'Surat perjanjian'),
(13, 'Surat kuasa'),
(14, 'Surat pelimpahan wewenang'),
(15, 'Surat keterangan'),
(16, 'Berita acara'),
(17, 'Surat pengatar'),
(18, 'Surat pernyataan'),
(19, 'Pengumuman'),
(20, 'Laporan'),
(21, 'Telaahan staf'),
(22, 'Notula rapat');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(20) NOT NULL,
  `icon_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`id_menu`, `nama_menu`, `icon_menu`) VALUES
(1, 'Data Master', 'nav-icon fas fa-th'),
(2, 'Surat', 'nav-icon far fa-envelope');

-- --------------------------------------------------------

--
-- Table structure for table `mst_opd`
--

CREATE TABLE `mst_opd` (
  `id_opd` int(11) NOT NULL,
  `nama_opd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_opd`
--

INSERT INTO `mst_opd` (`id_opd`, `nama_opd`) VALUES
(1, 'DISKOMINFO'),
(2, 'DIKBUD'),
(3, 'DISKOPERINDAG'),
(4, 'DISPARPORA'),
(5, 'DISPENDUK'),
(6, 'DINSOS'),
(7, 'DINAS PUPR'),
(8, 'DINKES'),
(9, 'DPM PTSP dan TK'),
(10, 'DISPERPUSIP'),
(11, 'DINAS PERKIM'),
(12, 'DISPERTA'),
(13, 'BKD'),
(14, 'BPKAD'),
(15, 'BAPPEDA'),
(16, 'BAPENDA'),
(17, 'BAKESBANGPOL'),
(18, 'BPBD'),
(19, 'DPRD'),
(20, 'INSPEKTORAT'),
(21, 'SATPOL PP'),
(22, 'DLHP'),
(23, 'DPMD'),
(24, 'DKPP'),
(25, 'DPPKB');

-- --------------------------------------------------------

--
-- Table structure for table `mst_paraf`
--

CREATE TABLE `mst_paraf` (
  `id_paraf` int(11) NOT NULL,
  `nama_paraf` varchar(255) NOT NULL,
  `img_paraf` varchar(255) NOT NULL,
  `jabatan_surat` varchar(255) NOT NULL,
  `NIP` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_paraf`
--

INSERT INTO `mst_paraf` (`id_paraf`, `nama_paraf`, `img_paraf`, `jabatan_surat`, `NIP`, `id_role`) VALUES
(3, 'Lukman, ST.MT', 'web.png', '', '', 4),
(4, 'Huda, ST.MT', 'LOGO_POLITEKNIK_NEGERI_JEMBER.png', '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `mst_role`
--

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_role`
--

INSERT INTO `mst_role` (`id_role`, `nama_role`, `jabatan`) VALUES
(1, 'Superadmin', NULL),
(2, 'Admin', NULL),
(3, 'Umum', 'Bagian Umum dan Kepegawaian'),
(4, 'Camat', 'Kepala Kecamatan'),
(5, 'Sekcam', 'Sekretaris Kecamatan');

-- --------------------------------------------------------

--
-- Table structure for table `mst_status`
--

CREATE TABLE `mst_status` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_status`
--

INSERT INTO `mst_status` (`id_status`, `nama_status`) VALUES
(1, 'Diterima'),
(2, 'Dibaca'),
(3, 'Disposisi');

-- --------------------------------------------------------

--
-- Table structure for table `mst_sub_menu`
--

CREATE TABLE `mst_sub_menu` (
  `id_sub_menu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `nama_sub_menu` varchar(50) NOT NULL,
  `link_sub_menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_sub_menu`
--

INSERT INTO `mst_sub_menu` (`id_sub_menu`, `id_menu`, `nama_sub_menu`, `link_sub_menu`) VALUES
(1, 1, 'Master Menu', 'Menu/index'),
(3, 1, 'Master Sub Menu', 'Menusub/index'),
(12, 1, 'Master Role', 'Role/index'),
(15, 2, 'Surat Masuk', 'Suratmasuk/index'),
(16, 2, 'Surat Keluar', 'Suratkeluar/index'),
(18, 2, 'Disposisi', 'Disposisi/index'),
(19, 1, 'Master Paraf', 'Paraf/index'),
(21, 2, 'Disposisi Kepala', 'DisposisiKepala/index'),
(22, 2, 'Disposisi Sekretaris', 'DisposisiSekretaris/index'),
(23, 1, 'Master User', 'User/index'),
(24, 1, 'Master OPD', 'OPD/index'),
(25, 1, 'Master Bagian', 'Bagian/index');

-- --------------------------------------------------------

--
-- Table structure for table `mst_surat_keluar`
--

CREATE TABLE `mst_surat_keluar` (
  `id_surat_keluar` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_opd` int(11) NOT NULL,
  `id_bagian` int(11) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `sifat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `isi_surat` text NOT NULL,
  `id_paraf` int(11) NOT NULL,
  `lampiran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_surat_keluar`
--

INSERT INTO `mst_surat_keluar` (`id_surat_keluar`, `id_jenis`, `id_opd`, `id_bagian`, `perihal`, `no_surat`, `sifat`, `tgl_surat`, `isi_surat`, `id_paraf`, `lampiran`) VALUES
(1, 1, 4, 1, 'Usulan Pergantian Bendahara', '182-20321-234', 'Penting', '2020-09-30', '<p class=\"MsoListParagraphCxSpFirst\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify\">Dengan hormat, <o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Berdasarkan informasi yang kami terima\r\ndari Kepala Satpol PP Kabupaten Bogor yang menginformasikan bahwa PT Elang Sejahtera\r\nsaat ini memasang baliho di Jl Raya Bogor Km 35. Baliho tersebut saat ini belum\r\ndibayarkan pajaknya senilai <b>Rp. 5.250.000\r\n(Lima Juta Dua Ratus Lima Puluh Ribu)</b>.<o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpMiddle\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Untuk itu dengan masuknya surat ini kami\r\nbermaksud untuk menagih biaya pajak reklame tersebut. Kami memberikan waktu\r\nhingga 30 September 2019 untuk pihak kantor bapak bisa menyelesaikan\r\npermasalahan ini. Jika dalam waktu yang sudah ditentukan tidak ada respon balik\r\ndari perwakilan perusahaan maka kami akan menindak dengan mencopot baliho tersebut.<o:p></o:p></p>\r\n\r\n<p class=\"MsoListParagraphCxSpLast\" style=\"margin-left:0cm;mso-add-space:auto;\r\ntext-align:justify;line-height:115%\">Demikianlah informasi ini kami sampaikan\r\nagar menjadi perhatian bagi perusahaan bapak. Atas perhatian dan kerjasamanya\r\nkami ucapkan terima kasih.<o:p></o:p></p>                        ', 3, 1),
(2, 1, 5, 2, 'Usulan Pergantian Bendahara', '182-20321-234', 'Penting', '2020-10-02', 'Bendahara minta makan', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mst_surat_masuk`
--

CREATE TABLE `mst_surat_masuk` (
  `id_surat_masuk` int(11) NOT NULL,
  `no_surat` varchar(255) NOT NULL,
  `tgl_surat` date NOT NULL,
  `pengirim_surat` varchar(255) NOT NULL,
  `perihal_surat` text NOT NULL,
  `tgl_terima_surat` date NOT NULL,
  `no_agenda_surat` int(11) NOT NULL,
  `bukti_surat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_surat_masuk`
--

INSERT INTO `mst_surat_masuk` (`id_surat_masuk`, `no_surat`, `tgl_surat`, `pengirim_surat`, `perihal_surat`, `tgl_terima_surat`, `no_agenda_surat`, `bukti_surat`) VALUES
(3, '800/1558/430.9.11/2020', '2020-09-14', 'Dinas PUPR', 'Permohonan Perizinan Magang', '2020-09-09', 278, 'chopper.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user`
--

CREATE TABLE `mst_user` (
  `id_user` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user`
--

INSERT INTO `mst_user` (`id_user`, `id_role`, `nama_user`, `email_user`, `password_user`) VALUES
(1, 1, 'Admin', 'Admin@kominfo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 3, 'Umum', 'Umum@kominfo.com', 'b617726c7f45ecb196ef74881089fa17d90d7276'),
(3, 4, 'Camat', 'Camat@kominfo.com', '93b89e6160d6c85d709954ce733d5eec131ab0a0'),
(4, 5, 'Sekcam', 'Sekcam@kominfo.com', 'd37ea5b3911c9a2a5b9b22321041754193e41acb');

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_access`
--

CREATE TABLE `mst_user_access` (
  `id_user_access` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_user_access`
--

INSERT INTO `mst_user_access` (`id_user_access`, `id_role`, `id_sub_menu`) VALUES
(2, 1, 3),
(3, 1, 12),
(17, 1, 15),
(18, 1, 16),
(32, 1, 19),
(34, 1, 18),
(35, 1, 21),
(36, 1, 1),
(37, 4, 21),
(38, 3, 18),
(39, 1, 22),
(40, 5, 22),
(41, 1, 23),
(42, 1, 24),
(43, 2, 18),
(44, 2, 24),
(45, 2, 19),
(46, 2, 12),
(47, 2, 23),
(48, 2, 16),
(49, 2, 15),
(50, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `mst_user_function`
--

CREATE TABLE `mst_user_function` (
  `id_user_function` int(11) NOT NULL,
  `id_user_access` int(11) NOT NULL,
  `id_function` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_bagian`
--
ALTER TABLE `mst_bagian`
  ADD PRIMARY KEY (`id_bagian`);

--
-- Indexes for table `mst_disposisi`
--
ALTER TABLE `mst_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `mst_function`
--
ALTER TABLE `mst_function`
  ADD PRIMARY KEY (`id_function`);

--
-- Indexes for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `mst_opd`
--
ALTER TABLE `mst_opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indexes for table `mst_paraf`
--
ALTER TABLE `mst_paraf`
  ADD PRIMARY KEY (`id_paraf`);

--
-- Indexes for table `mst_role`
--
ALTER TABLE `mst_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `mst_status`
--
ALTER TABLE `mst_status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `mst_sub_menu`
--
ALTER TABLE `mst_sub_menu`
  ADD PRIMARY KEY (`id_sub_menu`);

--
-- Indexes for table `mst_surat_keluar`
--
ALTER TABLE `mst_surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `mst_surat_masuk`
--
ALTER TABLE `mst_surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `mst_user`
--
ALTER TABLE `mst_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `mst_user_access`
--
ALTER TABLE `mst_user_access`
  ADD PRIMARY KEY (`id_user_access`);

--
-- Indexes for table `mst_user_function`
--
ALTER TABLE `mst_user_function`
  ADD PRIMARY KEY (`id_user_function`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_bagian`
--
ALTER TABLE `mst_bagian`
  MODIFY `id_bagian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_disposisi`
--
ALTER TABLE `mst_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_function`
--
ALTER TABLE `mst_function`
  MODIFY `id_function` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mst_jenis`
--
ALTER TABLE `mst_jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_opd`
--
ALTER TABLE `mst_opd`
  MODIFY `id_opd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mst_paraf`
--
ALTER TABLE `mst_paraf`
  MODIFY `id_paraf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_role`
--
ALTER TABLE `mst_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mst_status`
--
ALTER TABLE `mst_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_sub_menu`
--
ALTER TABLE `mst_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `mst_surat_keluar`
--
ALTER TABLE `mst_surat_keluar`
  MODIFY `id_surat_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_surat_masuk`
--
ALTER TABLE `mst_surat_masuk`
  MODIFY `id_surat_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_user_access`
--
ALTER TABLE `mst_user_access`
  MODIFY `id_user_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `mst_user_function`
--
ALTER TABLE `mst_user_function`
  MODIFY `id_user_function` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
