-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 10:18 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guru`
--

CREATE TABLE `tbl_guru` (
  `id_guru` int NOT NULL,
  `nama_guru` varchar(250) NOT NULL,
  `nip_guru` varchar(250) NOT NULL,
  `alamat_guru` varchar(250) NOT NULL,
  `notlp_guru` varchar(250) NOT NULL,
  `username_guru` varchar(250) NOT NULL,
  `password_guru` varchar(250) NOT NULL,
  `foto_guru` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_guru`
--

INSERT INTO `tbl_guru` (`id_guru`, `nama_guru`, `nip_guru`, `alamat_guru`, `notlp_guru`, `username_guru`, `password_guru`, `foto_guru`) VALUES
(4, 'alvin', '123', 'sumber', '678', 'alvin@gmail.com', '9e1f505e74ca9864c9132ba05e0670d85ff56fe5', '1685613125-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_identitas`
--

CREATE TABLE `tbl_identitas` (
  `id_identitas` int NOT NULL,
  `noijin_identitas` varchar(250) NOT NULL,
  `nama_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rt_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rw_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `telp_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `kelurahan_identitas` varchar(250) NOT NULL,
  `kecamatan_identitas` varchar(250) NOT NULL,
  `provinsi_identitas` varchar(250) NOT NULL,
  `email_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `fb_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `twitter_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `instagram_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `logo_identitas` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_identitas`
--

INSERT INTO `tbl_identitas` (`id_identitas`, `noijin_identitas`, `nama_identitas`, `alamat_identitas`, `rt_identitas`, `rw_identitas`, `telp_identitas`, `kelurahan_identitas`, `kecamatan_identitas`, `provinsi_identitas`, `email_identitas`, `fb_identitas`, `twitter_identitas`, `instagram_identitas`, `logo_identitas`) VALUES
(1, '12345', 'YAYASAN 1 PONDOK PESANTREN AL QUR’ANIYAH', 'JL. Sumur Pondok. NO 38 Ds. Dukuhjati Kec. Krangkeng', '2', '6', '082321755977', 'Kejaksan', 'Kejaksan 1', 'Jawa Barat', 'https://youtube/media quraniyah', 'https://web.facebook.com/mediaquraniyah', 'https://www.tiktok.com/@mediaquraniyah', 'https://www.instagram.com/mediaquraniyah/', '1685595509-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepalasekolah`
--

CREATE TABLE `tbl_kepalasekolah` (
  `id_kepalasekolah` int NOT NULL,
  `nama_kepalasekolah` varchar(250) NOT NULL,
  `nip_kepalasekolah` varchar(250) NOT NULL,
  `logo_kepalasekolah` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kepalasekolah`
--

INSERT INTO `tbl_kepalasekolah` (`id_kepalasekolah`, `nama_kepalasekolah`, `nip_kepalasekolah`, `logo_kepalasekolah`) VALUES
(1, 'Alvin', '67566', '1685597852-download.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `foto_user` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name_user`, `username`, `password`, `level_user`, `foto_user`, `created_at`, `update_at`, `is_deleted`) VALUES
(1, 'Admin', 'superadmin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin.png', '2021-06-15 15:22:55', '2021-06-22 07:26:57', 0),
(6, 'Dian Siswantoro', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Tenaga Pendidik', '1623777780-Desert.jpg', '2021-06-15 17:23:01', '2021-06-28 03:43:34', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tbl_identitas`
--
ALTER TABLE `tbl_identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guru`
--
ALTER TABLE `tbl_guru`
  MODIFY `id_guru` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_identitas`
--
ALTER TABLE `tbl_identitas`
  MODIFY `id_identitas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
