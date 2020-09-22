-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 06:09 AM
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
-- Table structure for table `mst_disposisi`
--

CREATE TABLE `mst_disposisi` (
  `id_disposisi` int(11) NOT NULL,
  `tgl_disposisi` date NOT NULL,
  `isi_disposisi` text NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Table structure for table `mst_role`
--

CREATE TABLE `mst_role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mst_role`
--

INSERT INTO `mst_role` (`id_role`, `nama_role`) VALUES
(1, 'Superadmin');

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
(13, 1, 'Master Perihal', 'Perihal/index'),
(14, 1, 'Master Tujuan', 'Tujuan/index'),
(15, 2, 'Surat Masuk', 'Suratmasuk/index'),
(16, 2, 'Surat Keluar', 'Suratkeluar/index'),
(17, 2, 'Surat Baru', 'Suratbaru/index'),
(18, 2, 'Disposisi', 'Disposisi/index');

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
(1, 1, 'Admin', 'Admin@kominfo.com', 'd033e22ae348aeb5660fc2140aec35850c4da997');

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
(1, 1, 1),
(2, 1, 3),
(3, 1, 12),
(15, 1, 13),
(16, 1, 14),
(17, 1, 15),
(18, 1, 16),
(19, 1, 17),
(31, 1, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_disposisi`
--
ALTER TABLE `mst_disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`id_menu`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_disposisi`
--
ALTER TABLE `mst_disposisi`
  MODIFY `id_disposisi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_role`
--
ALTER TABLE `mst_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_status`
--
ALTER TABLE `mst_status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_sub_menu`
--
ALTER TABLE `mst_sub_menu`
  MODIFY `id_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `mst_user`
--
ALTER TABLE `mst_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mst_user_access`
--
ALTER TABLE `mst_user_access`
  MODIFY `id_user_access` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
