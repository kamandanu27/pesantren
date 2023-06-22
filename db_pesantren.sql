-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2023 at 04:18 AM
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
(4, 'alvin', '123', 'sumber', '678', 'alvin@gmail.com', '9e1f505e74ca9864c9132ba05e0670d85ff56fe5', '1687231657-download.jpg');

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
-- Table structure for table `tbl_institusi`
--

CREATE TABLE `tbl_institusi` (
  `id_institusi` int NOT NULL,
  `nama_institusi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_institusi`
--

INSERT INTO `tbl_institusi` (`id_institusi`, `nama_institusi`) VALUES
(2, 'iknkn'),
(3, 'hfjnjx42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_juz`
--

CREATE TABLE `tbl_juz` (
  `id_juz` int NOT NULL,
  `nama_juz` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_juz`
--

INSERT INTO `tbl_juz` (`id_juz`, `nama_juz`) VALUES
(1, '24'),
(3, '17'),
(4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int NOT NULL,
  `nama_kelas` varchar(250) NOT NULL,
  `id_institusi` int NOT NULL,
  `id_guru` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelas`
--

INSERT INTO `tbl_kelas` (`id_kelas`, `nama_kelas`, `id_institusi`, `id_guru`) VALUES
(6, 'sayaaa', 2, 4);

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
-- Table structure for table `tbl_santri`
--

CREATE TABLE `tbl_santri` (
  `id_santri` int NOT NULL,
  `nama_santri` varchar(250) NOT NULL,
  `nis_santri` varchar(250) NOT NULL,
  `alamat_santri` varchar(250) NOT NULL,
  `notlp_santri` varchar(250) NOT NULL,
  `username_santri` varchar(250) NOT NULL,
  `password_santri` varchar(250) NOT NULL,
  `foto_santri` text NOT NULL,
  `id_kelas` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_santri`
--

INSERT INTO `tbl_santri` (`id_santri`, `nama_santri`, `nis_santri`, `alamat_santri`, `notlp_santri`, `username_santri`, `password_santri`, `foto_santri`, `id_kelas`) VALUES
(1, 'alvin', '234', 'cbc', '0897696', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1685674818-download.jpg', 6),
(6, 'toma', '343', 'disini', '089734', 'admin', 'c55c508614dd2a3e2ca2a00250dc33fb924a7244', '1687337221-3339.jpg', 6),
(7, 'toma', '565', 'cbc', '089734', 'admin', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1687407228-3339.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `id_juz` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_surat`
--

INSERT INTO `tbl_surat` (`id_surat`, `nama_surat`, `id_juz`) VALUES
(1, 'as', 1),
(4, 'adaaa', 3),
(5, 'dd', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `nama_user` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat_user` varchar(50) NOT NULL,
  `nohp_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `instansi_user` varchar(50) NOT NULL,
  `level_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `foto_user` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `alamat_user`, `nohp_user`, `email_user`, `instansi_user`, `level_user`, `username`, `password`, `foto_user`) VALUES
(1, 'Admin', 'Cirebon', '0896', 'sdd@gmail.com', 'TI', 'admin', 'superadmin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1687253550-admin.png'),
(6, 'Dian Siswantoro', 'Kuningan', '0884', 'abc@gmail.com', 'TI', 'admin', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1687252776-1687248133-3409.jpg'),
(9, 'ijot', 'cbc', '0884', 'cbc@gmail.com', 'ti', 'support', 'admin', '', '1687330525-download.jpg');

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
-- Indexes for table `tbl_institusi`
--
ALTER TABLE `tbl_institusi`
  ADD PRIMARY KEY (`id_institusi`);

--
-- Indexes for table `tbl_juz`
--
ALTER TABLE `tbl_juz`
  ADD PRIMARY KEY (`id_juz`);

--
-- Indexes for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tbl_santri`
--
ALTER TABLE `tbl_santri`
  ADD PRIMARY KEY (`id_santri`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`);

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
-- AUTO_INCREMENT for table `tbl_institusi`
--
ALTER TABLE `tbl_institusi`
  MODIFY `id_institusi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_juz`
--
ALTER TABLE `tbl_juz`
  MODIFY `id_juz` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_santri`
--
ALTER TABLE `tbl_santri`
  MODIFY `id_santri` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
