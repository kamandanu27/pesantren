-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 20, 2023 at 05:49 PM
-- Server version: 5.7.33
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_alquraniyah`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_years`
--

CREATE TABLE `academic_years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year` varchar(9) NOT NULL COMMENT 'Tahun Pelajaran',
  `semester` enum('odd','even') NOT NULL DEFAULT 'odd' COMMENT 'odd = Ganjil, even = Genap',
  `current_semester` enum('true','false') NOT NULL DEFAULT 'false',
  `admission_semester` enum('true','false') NOT NULL DEFAULT 'false',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT '0',
  `achievement_description` varchar(255) NOT NULL,
  `achievement_type` bigint(20) DEFAULT '0',
  `achievement_level` smallint(6) NOT NULL DEFAULT '0',
  `achievement_year` year(4) NOT NULL,
  `achievement_organizer` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admission_phases`
--

CREATE TABLE `admission_phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) DEFAULT '0' COMMENT 'Tahun Pelajaran',
  `phase_name` varchar(255) NOT NULL COMMENT 'Gelombang Pendaftaran',
  `phase_start_date` date DEFAULT NULL COMMENT 'Tanggal Mulai',
  `phase_end_date` date DEFAULT NULL COMMENT 'Tanggal Selesai',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `admission_quotas`
--

CREATE TABLE `admission_quotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) DEFAULT '0' COMMENT 'Tahun Pelajaran',
  `admission_type_id` bigint(20) DEFAULT '0' COMMENT 'Jalur Pendaftaran',
  `major_id` bigint(20) DEFAULT '0' COMMENT 'Program Keahlian',
  `quota` smallint(6) NOT NULL DEFAULT '0' COMMENT 'Kuota Pendaftaran',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) DEFAULT '0',
  `answer` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) DEFAULT NULL,
  `category_description` varchar(255) DEFAULT NULL,
  `category_type` enum('post','file') DEFAULT 'post',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_description`, `category_type`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Uncategorized', 'uncategorized', 'Uncategorized', 'post', '2021-03-24 06:57:48', '2021-03-23 23:57:48', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'Uncategorized', 'uncategorized', 'Uncategorized', 'file', '2021-03-24 06:57:48', '2021-03-23 23:57:48', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `class_groups`
--

CREATE TABLE `class_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_group` varchar(100) DEFAULT NULL,
  `sub_class_group` varchar(100) DEFAULT NULL,
  `major_id` bigint(20) DEFAULT '0' COMMENT 'Program Keahlian',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_group_settings`
--

CREATE TABLE `class_group_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `academic_year_id` bigint(20) DEFAULT '0' COMMENT 'FK dari academic_years',
  `class_group_id` bigint(20) DEFAULT '0' COMMENT 'Kelas, FK dari class_groups',
  `employee_id` bigint(20) DEFAULT '0' COMMENT 'Wali Kelas, FK dari employees',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class_group_students`
--

CREATE TABLE `class_group_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `class_group_setting_id` bigint(20) DEFAULT '0',
  `student_id` bigint(20) DEFAULT '0',
  `is_class_manager` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Ketua Kelas ?',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment_post_id` bigint(20) DEFAULT '0',
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) DEFAULT NULL,
  `comment_url` varchar(255) DEFAULT NULL,
  `comment_ip_address` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_subject` varchar(255) DEFAULT NULL,
  `comment_reply` text,
  `comment_status` enum('approved','unapproved','spam') DEFAULT 'approved',
  `comment_agent` varchar(255) DEFAULT NULL,
  `comment_parent_id` varchar(255) DEFAULT NULL,
  `comment_type` enum('post','message') DEFAULT 'post',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_letter_number` varchar(255) DEFAULT NULL COMMENT 'Nomor Surat Tugas',
  `assignment_letter_date` date DEFAULT NULL COMMENT 'Tanggal Surat Tugas',
  `assignment_start_date` date DEFAULT NULL COMMENT 'TMT Tugas',
  `parent_school_status` enum('true','false') NOT NULL DEFAULT 'true' COMMENT 'Status Sekolah Induk',
  `full_name` varchar(150) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `nik` varchar(50) DEFAULT NULL,
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `mother_name` varchar(150) DEFAULT NULL,
  `street_address` varchar(255) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rt` varchar(10) DEFAULT NULL COMMENT 'Rukun Tetangga',
  `rw` varchar(10) DEFAULT NULL COMMENT 'Rukun Warga',
  `sub_village` varchar(255) DEFAULT NULL COMMENT 'Nama Dusun',
  `village` varchar(255) DEFAULT NULL COMMENT 'Nama Kelurahan/Desa',
  `sub_district` varchar(255) DEFAULT NULL COMMENT 'Kecamatan',
  `district` varchar(255) DEFAULT NULL COMMENT 'Kota/Kabupaten',
  `postal_code` varchar(20) DEFAULT NULL COMMENT 'Kode POS',
  `religion_id` bigint(20) DEFAULT '0',
  `marriage_status_id` bigint(20) DEFAULT '0',
  `spouse_name` varchar(255) DEFAULT NULL COMMENT 'Nama Pasangan : Suami / Istri',
  `spouse_employment_id` bigint(20) DEFAULT '0' COMMENT 'Pekerjaan Pasangan : Suami / Istri',
  `citizenship` enum('WNI','WNA') NOT NULL DEFAULT 'WNI' COMMENT 'Kewarganegaraan',
  `country` varchar(255) DEFAULT NULL,
  `npwp` varchar(100) DEFAULT NULL,
  `employment_status_id` bigint(20) DEFAULT '0' COMMENT 'Status Kepegawaian',
  `nip` varchar(100) DEFAULT NULL,
  `niy` varchar(100) DEFAULT NULL COMMENT 'NIY/NIGK',
  `nuptk` varchar(100) DEFAULT NULL,
  `employment_type_id` bigint(20) DEFAULT '0' COMMENT 'Jenis Guru dan Tenaga Kependidikan (GTK)',
  `decree_appointment` varchar(255) DEFAULT NULL COMMENT 'SK Pengangkatan',
  `appointment_start_date` date DEFAULT NULL COMMENT 'TMT Pengangkatan',
  `institution_lifter_id` bigint(20) DEFAULT '0' COMMENT 'Lembaga Pengangkat',
  `decree_cpns` varchar(100) DEFAULT NULL COMMENT 'SK CPNS',
  `pns_start_date` date DEFAULT NULL COMMENT 'TMT CPNS',
  `rank_id` bigint(20) DEFAULT '0' COMMENT 'Pangkat/Golongan',
  `salary_source_id` bigint(20) DEFAULT '0' COMMENT 'Sumber Gaji',
  `headmaster_license` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Punya Lisensi Kepala Sekolah?',
  `laboratory_skill_id` bigint(20) DEFAULT '0' COMMENT 'Keahlian Lab oratorium',
  `special_need_id` bigint(20) DEFAULT '0' COMMENT 'Mampu Menangani Kebutuhan Khusus',
  `braille_skills` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Keahlian Braile ?',
  `sign_language_skills` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Keahlian Bahasa Isyarat ?',
  `phone` varchar(255) DEFAULT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `photo` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file_title` varchar(255) DEFAULT NULL,
  `file_description` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(255) DEFAULT NULL,
  `file_category_id` bigint(20) DEFAULT '0',
  `file_path` varchar(255) DEFAULT NULL,
  `file_ext` varchar(255) DEFAULT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `file_visibility` enum('public','private') DEFAULT 'public',
  `file_counter` bigint(20) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_sliders`
--

CREATE TABLE `image_sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `caption` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `image_sliders`
--

INSERT INTO `image_sliders` (`id`, `caption`, `image`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '1.png', '2021-03-24 06:57:52', '2021-03-23 23:57:52', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', '2.png', '2021-03-24 06:57:52', '2021-03-23 23:57:52', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link_title` varchar(255) NOT NULL,
  `link_url` varchar(255) DEFAULT NULL,
  `link_target` enum('_blank','_self','_parent','_top') DEFAULT '_blank',
  `link_image` varchar(100) DEFAULT NULL,
  `link_type` enum('link','banner') DEFAULT 'link',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`id`, `link_title`, `link_url`, `link_target`, `link_image`, `link_type`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'CMS Sekolahku', 'https://sekolahku.web.id', '_blank', NULL, 'link', '2021-03-24 06:57:51', '2021-03-23 23:57:51', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'CMS Sekolahku', 'https://sekolahku.web.id', '_blank', '1.png', 'banner', '2021-03-24 06:57:51', '2021-03-23 23:57:51', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `counter` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `datetime` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `majors`
--

CREATE TABLE `majors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_name` varchar(255) DEFAULT NULL COMMENT 'Program Keahlian / Jurusan',
  `major_short_name` varchar(255) DEFAULT NULL COMMENT 'Nama Singkat',
  `is_active` enum('true','false') DEFAULT 'true',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_title` varchar(150) NOT NULL,
  `menu_url` varchar(150) NOT NULL,
  `menu_target` enum('_blank','_self','_parent','_top') DEFAULT '_self',
  `menu_type` varchar(100) NOT NULL DEFAULT 'pages',
  `menu_parent_id` bigint(20) DEFAULT '0',
  `menu_position` bigint(20) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_title`, `menu_url`, `menu_target`, `menu_type`, `menu_parent_id`, `menu_position`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Hubungi Kami', 'hubungi-kami', '_self', 'modules', 0, 7, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'Galeri Foto', 'galeri-foto', '_self', 'modules', 9, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'Galeri Video', 'galeri-video', '_self', 'modules', 9, 2, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(4, 'Formulir PPDB', 'formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(5, 'Hasil Seleksi', 'hasil-seleksi-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 2, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(6, 'Cetak Formulir', 'cetak-formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 3, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(7, 'Download Formulir', 'download-formulir-penerimaan-peserta-didik-baru', '_self', 'modules', 8, 4, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(8, 'PPDB 2021', '#', '_self', 'links', 0, 5, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(9, 'Galeri', '#', '_self', 'links', 0, 6, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(10, 'Kategori', '#', '_self', 'links', 0, 2, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(11, 'Uncategorized', 'kategori/uncategorized', '_self', 'post_categories', 10, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(12, 'Direktori', '#', '_self', 'links', 0, 3, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(13, 'Direktori Alumni', 'direktori-alumni', '_self', 'modules', 12, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(14, 'Direktori Peserta Didik', 'direktori-peserta-didik', '_self', 'modules', 12, 3, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(15, 'Direktori Guru dan Tenaga Kependidikan', 'direktori-guru-dan-tenaga-kependidikan', '_self', 'modules', 12, 2, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(16, 'Pendaftaran Alumni', 'pendaftaran-alumni', '_self', 'modules', 0, 4, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(17, 'Profil', 'read/2/profil', '_self', 'pages', 0, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false'),
(18, 'Visi dan Misi', 'read/3/visi-dan-misi', '_self', 'pages', 0, 1, '2021-03-24 06:57:54', '2021-03-23 23:57:54', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_description` varchar(255) DEFAULT NULL,
  `module_url` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_description`, `module_url`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Pengguna', 'Pengguna', 'users', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'PPDB / PMB', 'PPDB / PMB', 'admission', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'Tampilan', 'Tampilan', 'appearance', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(4, 'Blog', 'Blog', 'blog', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(5, 'GTK / Staff / Dosen', 'GTK / Staff / Dosen', 'employees', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(6, 'Media', 'Media', 'media', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(7, 'Plugins', 'Plugins', 'plugins', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(8, 'Data Referensi', 'Data Referensi', 'reference', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(9, 'Pengaturan', 'Pengaturan', 'settings', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false'),
(10, 'Akademik', 'Akademik', 'academic', '2021-03-24 06:57:45', '2021-03-23 23:57:45', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option_group` varchar(100) NOT NULL,
  `option_name` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `option_group`, `option_name`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'student_status', 'Aktif', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'student_status', 'Lulus', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'student_status', 'Mutasi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(4, 'student_status', 'Dikeluarkan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(5, 'student_status', 'Mengundurkan Diri', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(6, 'student_status', 'Putus Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(7, 'student_status', 'Meninggal', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(8, 'student_status', 'Hilang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(9, 'student_status', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(10, 'employments', 'Tidak bekerja', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(11, 'employments', 'Nelayan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(12, 'employments', 'Petani', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(13, 'employments', 'Peternak', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(14, 'employments', 'PNS/TNI/POLRI', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(15, 'employments', 'Karyawan Swasta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(16, 'employments', 'Pedagang Kecil', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(17, 'employments', 'Pedagang Besar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(18, 'employments', 'Wiraswasta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(19, 'employments', 'Wirausaha', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(20, 'employments', 'Buruh', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(21, 'employments', 'Pensiunan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(22, 'employments', 'Lain-lain', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(23, 'special_needs', 'Tidak', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(24, 'special_needs', 'Tuna Netra', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(25, 'special_needs', 'Tuna Rungu', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(26, 'special_needs', 'Tuna Grahita ringan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(27, 'special_needs', 'Tuna Grahita Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(28, 'special_needs', 'Tuna Daksa Ringan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(29, 'special_needs', 'Tuna Daksa Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(30, 'special_needs', 'Tuna Laras', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(31, 'special_needs', 'Tuna Wicara', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(32, 'special_needs', 'Tuna ganda', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(33, 'special_needs', 'Hiper aktif', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(34, 'special_needs', 'Cerdas Istimewa', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(35, 'special_needs', 'Bakat Istimewa', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(36, 'special_needs', 'Kesulitan Belajar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(37, 'special_needs', 'Narkoba', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(38, 'special_needs', 'Indigo', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(39, 'special_needs', 'Down Sindrome', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(40, 'special_needs', 'Autis', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(41, 'special_needs', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(42, 'educations', 'Tidak sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(43, 'educations', 'Putus SD', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(44, 'educations', 'SD Sederajat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(45, 'educations', 'SMP Sederajat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(46, 'educations', 'SMA Sederajat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(47, 'educations', 'D1', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(48, 'educations', 'D2', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(49, 'educations', 'D3', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(50, 'educations', 'D4/S1', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(51, 'educations', 'S2', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(52, 'educations', 'S3', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(53, 'scholarships', 'Anak berprestasi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(54, 'scholarships', 'Anak Miskin', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(55, 'scholarships', 'Pendidikan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(56, 'scholarships', 'Unggulan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(57, 'scholarships', 'Lain-lain', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(58, 'achievement_types', 'Sains', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(59, 'achievement_types', 'Seni', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(60, 'achievement_types', 'Olahraga', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(61, 'achievement_types', 'Lain-lain', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(62, 'achievement_levels', 'Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(63, 'achievement_levels', 'Kecamatan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(64, 'achievement_levels', 'Kota/Kabupaten', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(65, 'achievement_levels', 'Propinsi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(66, 'achievement_levels', 'Nasional', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(67, 'achievement_levels', 'Internasional', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(68, 'monthly_incomes', 'Kurang dari 500,000', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(69, 'monthly_incomes', '500.000 - 999.9999', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(70, 'monthly_incomes', '1 Juta - 1.999.999', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(71, 'monthly_incomes', '2 Juta - 4.999.999', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(72, 'monthly_incomes', '5 Juta - 20 Juta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(73, 'monthly_incomes', 'Lebih dari 20 Juta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(74, 'residences', 'Bersama orang tua', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(75, 'residences', 'Wali', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(76, 'residences', 'Kos', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(77, 'residences', 'Asrama', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(78, 'residences', 'Panti Asuhan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(79, 'residences', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(80, 'transportations', 'Jalan kaki', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(81, 'transportations', 'Kendaraan pribadi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(82, 'transportations', 'Kendaraan Umum / angkot / Pete-pete', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(83, 'transportations', 'Jemputan Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(84, 'transportations', 'Kereta Api', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(85, 'transportations', 'Ojek', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(86, 'transportations', 'Andong / Bendi / Sado / Dokar / Delman / Beca', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(87, 'transportations', 'Perahu penyebrangan / Rakit / Getek', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(88, 'transportations', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(89, 'religions', 'Islam', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(90, 'religions', 'Kristen / protestan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(91, 'religions', 'Katholik', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(92, 'religions', 'Hindu', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(93, 'religions', 'Budha', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(94, 'religions', 'Khong Hu Chu', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(95, 'religions', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(96, 'school_levels', '1 - Sekolah Dasar (SD) / Sederajat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(97, 'school_levels', '2 - Sekolah Menengah Pertama (SMP) / Sederajat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(98, 'school_levels', '3 - Sekolah Menengah Atas (SMA) / Aliyah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(99, 'school_levels', '4 - Sekolah Menengah Kejuruan (SMK)', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(100, 'school_levels', '5 - Universitas', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(101, 'school_levels', '6 - Sekolah Tinggi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(102, 'school_levels', '7 - Politeknik', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(103, 'marriage_status', 'Kawin', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(104, 'marriage_status', 'Belum Kawin', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(105, 'marriage_status', 'Berpisah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(106, 'institution_lifters', 'Pemerintah Pusat', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(107, 'institution_lifters', 'Pemerintah Provinsi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(108, 'institution_lifters', 'Pemerintah Kab/Kota', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(109, 'institution_lifters', 'Ketua yayasan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(110, 'institution_lifters', 'Kepala Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(111, 'institution_lifters', 'Komite Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(112, 'institution_lifters', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(113, 'employment_status', 'PNS ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(114, 'employment_status', 'PNS Diperbantukan ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(115, 'employment_status', 'PNS DEPAG ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(116, 'employment_status', 'GTY/PTY ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(117, 'employment_status', 'GTT/PTT Provinsi ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(118, 'employment_status', 'GTT/PTT Kota/Kabupaten', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(119, 'employment_status', 'Guru Bantu Pusat ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(120, 'employment_status', 'Guru Honor Sekolah ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(121, 'employment_status', 'Tenaga Honor Sekolah ', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(122, 'employment_status', 'CPNS', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(123, 'employment_status', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(124, 'employment_types', 'Guru Kelas', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(125, 'employment_types', 'Guru Mata Pelajaran', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(126, 'employment_types', 'Guru BK', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(127, 'employment_types', 'Guru Inklusi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(128, 'employment_types', 'Tenaga Administrasi Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(129, 'employment_types', 'Guru Pendamping', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(130, 'employment_types', 'Guru Magang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(131, 'employment_types', 'Guru TIK', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(132, 'employment_types', 'Laboran', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(133, 'employment_types', 'Pustakawan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(134, 'employment_types', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(135, 'ranks', 'I/A', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(136, 'ranks', 'I/B', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(137, 'ranks', 'I/C', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(138, 'ranks', 'I/D', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(139, 'ranks', 'II/A', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(140, 'ranks', 'II/B', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(141, 'ranks', 'II/C', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(142, 'ranks', 'II/D', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(143, 'ranks', 'III/A', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(144, 'ranks', 'III/B', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(145, 'ranks', 'III/C', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(146, 'ranks', 'III/D', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(147, 'ranks', 'IV/A', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(148, 'ranks', 'IV/B', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(149, 'ranks', 'IV/C', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(150, 'ranks', 'IV/D', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(151, 'ranks', 'IV/E', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(152, 'salary_sources', 'APBN', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(153, 'salary_sources', 'APBD Provinsi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(154, 'salary_sources', 'APBD Kab/Kota', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(155, 'salary_sources', 'Yayasan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(156, 'salary_sources', 'Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(157, 'salary_sources', 'Lembaga Donor', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(158, 'salary_sources', 'Lainnya', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(159, 'laboratory_skills', 'Lab IPA', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(160, 'laboratory_skills', 'Lab Fisika', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(161, 'laboratory_skills', 'Lab Biologi', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(162, 'laboratory_skills', 'Lab Kimia', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(163, 'laboratory_skills', 'Lab Bahasa', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(164, 'laboratory_skills', 'Lab Komputer', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(165, 'laboratory_skills', 'Teknik Bangunan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(166, 'laboratory_skills', 'Teknik Survei & Pemetaan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(167, 'laboratory_skills', 'Teknik Ketenagakerjaan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(168, 'laboratory_skills', 'Teknik Pendinginan & Tata Udara', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(169, 'laboratory_skills', 'Teknik Mesin', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `pollings`
--

CREATE TABLE `pollings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer_id` bigint(20) DEFAULT '0',
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_content` longtext,
  `post_image` varchar(100) DEFAULT NULL,
  `post_author` bigint(20) DEFAULT '0',
  `post_categories` varchar(255) DEFAULT NULL,
  `post_type` varchar(50) NOT NULL DEFAULT 'post',
  `post_status` enum('publish','draft') DEFAULT 'draft',
  `post_visibility` enum('public','private') DEFAULT 'public',
  `post_comment_status` enum('open','close') DEFAULT 'close',
  `post_slug` varchar(255) DEFAULT NULL,
  `post_tags` varchar(255) DEFAULT NULL,
  `post_counter` bigint(20) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_title`, `post_content`, `post_image`, `post_author`, `post_categories`, `post_type`, `post_status`, `post_visibility`, `post_comment_status`, `post_slug`, `post_tags`, `post_counter`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, '', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'headmaster_photo.png', 0, '', 'opening_speech', 'publish', 'public', 'open', '', '', 0, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'Profil', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, 1, '+1+', 'page', 'publish', 'public', 'open', 'profil', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'Visi dan Misi', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', NULL, 1, '+1+', 'page', 'publish', 'public', 'open', 'visi-dan-misi', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(4, 'Sample Post 1', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '+1+', 'post', 'publish', 'public', 'open', 'sample-post-1', 'berita, pengumuman, sekilas-info', 5, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(5, 'Sample Post 2', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '+1+', 'post', 'publish', 'public', 'open', 'sample-post-2', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(6, 'Sample Post 3', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '+1+', 'post', 'publish', 'public', 'open', 'sample-post-3', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(7, 'Sample Post 4', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '+1+', 'post', 'publish', 'public', 'open', 'sample-post-4', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false'),
(8, 'Sample Post 5', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'post_image.png', 1, '+1+', 'post', 'publish', 'public', 'open', 'sample-post-5', 'berita, pengumuman, sekilas-info', 1, '2021-03-24 06:57:53', '2021-03-23 23:57:53', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'false',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quote` varchar(255) DEFAULT NULL,
  `quote_by` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `quote_by`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Pendidikan merupakan tiket untuk masa depan. Hari esok untuk orang-orang yang telah mempersiapkan dirinya hari ini', 'Anonim', '2021-03-24 06:57:50', '2021-03-23 23:57:50', NULL, NULL, 1, 0, 0, 0, 'false'),
(2, 'Agama tanpa ilmu pengetahuan adalah buta. Dan ilmu pengetahuan tanpa agama adalah lumpuh', 'Anonim', '2021-03-24 06:57:50', '2021-03-23 23:57:50', NULL, NULL, 1, 0, 0, 0, 'false'),
(3, 'Hiduplah seakan-akan kau akan mati besok. Belajarlah seakan-akan kau akan hidup selamanya', 'Anonim', '2021-03-24 06:57:50', '2021-03-23 23:57:50', NULL, NULL, 1, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) DEFAULT '0',
  `scholarship_type` bigint(20) DEFAULT '0',
  `scholarship_description` varchar(255) NOT NULL,
  `scholarship_start_year` year(4) NOT NULL,
  `scholarship_end_year` year(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `setting_group` varchar(100) NOT NULL,
  `setting_variable` varchar(255) DEFAULT NULL,
  `setting_value` text,
  `setting_default_value` text,
  `setting_access_group` varchar(255) DEFAULT NULL,
  `setting_description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `setting_group`, `setting_variable`, `setting_value`, `setting_default_value`, `setting_access_group`, `setting_description`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'general', 'site_maintenance', NULL, 'false', 'public', 'Pemeliharaan situs', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'general', 'site_maintenance_end_date', NULL, '2021-01-01', 'public', 'Tanggal Berakhir Pemeliharaan Situs', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'general', 'site_cache', NULL, 'false', 'public', 'Cache situs', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(4, 'general', 'site_cache_time', NULL, '10', 'public', 'Lama Cache Situs', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(5, 'general', 'meta_description', NULL, 'CMS Sekolahku adalah Content Management System dan PPDB Online gratis untuk SD SMP/Sederajat SMA/Sederajat', 'public', 'Deskripsi Meta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(6, 'general', 'meta_keywords', NULL, 'CMS, Website Sekolah Gratis, Cara Membuat Website Sekolah, membuat web sekolah, contoh website sekolah, fitur website sekolah, Sekolah, Website, Internet,Situs, CMS Sekolah, Web Sekolah, Website Sekolah Gratis, Website Sekolah, Aplikasi Sekolah, PPDB Online, PSB Online, PSB Online Gratis, Penerimaan Siswa Baru Online, Raport Online, Kurikulum 2013, SD, SMP, SMA, Aliyah, MTs, SMK', 'public', 'Kata Kunci Meta', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(7, 'general', 'map_location', NULL, '', 'public', 'Lokasi di Google Maps', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(8, 'general', 'favicon', NULL, 'favicon.png', 'public', 'Favicon', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(9, 'general', 'header', NULL, 'header.png', 'public', 'Gambar Header', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(10, 'general', 'recaptcha_status', NULL, 'disable', 'public', 'reCAPTCHA Status', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(11, 'general', 'recaptcha_site_key', NULL, '6LeNCTAUAAAAAADTbL1rDw8GT1DF2DUjVtEXzdMu', 'public', 'Recaptcha Site Key', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(12, 'general', 'recaptcha_secret_key', NULL, '6LeNCTAUAAAAAGq8O0ItkzG8fsA9KeJ7mFMMFF1s', 'public', 'Recaptcha Secret Key', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(13, 'general', 'timezone', NULL, 'Asia/Jakarta', 'public', 'Time Zone', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(14, 'media', 'file_allowed_types', NULL, 'jpg, jpeg, png, gif', 'public', 'Tipe file yang diizinkan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(15, 'media', 'upload_max_filesize', NULL, '0', 'public', 'Maksimal Ukuran File yang Diupload', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(16, 'media', 'thumbnail_size_height', NULL, '100', 'public', 'Tinggi Gambar Thumbnail', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(17, 'media', 'thumbnail_size_width', NULL, '150', 'public', 'Lebar Gambar Thumbnail', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(18, 'media', 'medium_size_height', NULL, '308', 'public', 'Tinggi Gambar Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(19, 'media', 'medium_size_width', NULL, '460', 'public', 'Lebar Gambar Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(20, 'media', 'large_size_height', NULL, '600', 'public', 'Tinggi Gambar Besar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(21, 'media', 'large_size_width', NULL, '800', 'public', 'Lebar Gambar Besar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(22, 'media', 'album_cover_height', NULL, '250', 'public', 'Tinggi Cover Album Foto', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(23, 'media', 'album_cover_width', NULL, '400', 'public', 'Lebar Cover Album Foto', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(24, 'media', 'banner_height', NULL, '81', 'public', 'Tinggi Iklan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(25, 'media', 'banner_width', NULL, '245', 'public', 'Lebar Iklan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(26, 'media', 'image_slider_height', NULL, '400', 'public', 'Tinggi Gambar Slide', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(27, 'media', 'image_slider_width', NULL, '900', 'public', 'Lebar Gambar Slide', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(28, 'media', 'student_photo_height', NULL, '400', 'public', 'Tinggi Photo Peserta Didik', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(29, 'media', 'student_photo_width', NULL, '300', 'public', 'Lebar Photo Peserta Didik', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(30, 'media', 'employee_photo_height', NULL, '400', 'public', 'Tinggi Photo Guru dan Tenaga Kependidikan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(31, 'media', 'employee_photo_width', NULL, '300', 'public', 'Lebar Photo Guru dan Tenaga Kependidikan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(32, 'media', 'headmaster_photo_height', NULL, '400', 'public', 'Tinggi Photo Kepala Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(33, 'media', 'headmaster_photo_width', NULL, '300', 'public', 'Lebar Photo Kepala Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(34, 'media', 'header_height', NULL, '80', 'public', 'Tinggi Gambar Header', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(35, 'media', 'header_width', NULL, '200', 'public', 'Lebar Gambar Header', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(36, 'media', 'logo_height', NULL, '120', 'public', 'Tinggi Logo Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(37, 'media', 'logo_width', NULL, '120', 'public', 'Lebar Logo Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(38, 'writing', 'default_post_category', NULL, '1', 'public', 'Default Kategori Tulisan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(39, 'writing', 'default_post_status', NULL, 'publish', 'public', 'Default Status Tulisan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(40, 'writing', 'default_post_visibility', NULL, 'public', 'public', 'Default Akses Tulisan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(41, 'writing', 'default_post_discussion', NULL, 'open', 'public', 'Default Komentar Tulisan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(42, 'writing', 'post_image_thumbnail_height', NULL, '100', 'public', 'Tinggi Gambar Kecil', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(43, 'writing', 'post_image_thumbnail_width', NULL, '150', 'public', 'Lebar Gambar Kecil', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(44, 'writing', 'post_image_medium_height', NULL, '250', 'public', 'Tinggi Gambar Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(45, 'writing', 'post_image_medium_width', NULL, '400', 'public', 'Lebar Gambar Sedang', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(46, 'writing', 'post_image_large_height', NULL, '450', 'public', 'Tinggi Gambar Besar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(47, 'writing', 'post_image_large_width', NULL, '840', 'public', 'Lebar Gambar Besar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(48, 'reading', 'post_per_page', NULL, '10', 'public', 'Tulisan per halaman', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(49, 'reading', 'post_rss_count', NULL, '10', 'public', 'Jumlah RSS', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(50, 'reading', 'post_related_count', NULL, '10', 'public', 'Jumlah Tulisan Terkait', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(51, 'reading', 'comment_per_page', NULL, '10', 'public', 'Komentar per halaman', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(52, 'discussion', 'comment_moderation', NULL, 'false', 'public', 'Komentar harus disetujui secara manual', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(53, 'discussion', 'comment_registration', NULL, 'false', 'public', 'Pengguna harus terdaftar dan login untuk komentar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(54, 'discussion', 'comment_blacklist', NULL, 'kampret', 'public', 'Komentar disaring', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(55, 'discussion', 'comment_order', NULL, 'asc', 'public', 'Urutan Komentar', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(56, 'social_account', 'facebook', NULL, '', 'public', 'Facebook', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(57, 'social_account', 'twitter', NULL, '', 'public', 'Twitter', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(58, 'social_account', 'linked_in', NULL, '', 'public', 'Linked In', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(59, 'social_account', 'youtube', NULL, '', 'public', 'Youtube', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(60, 'social_account', 'instagram', NULL, '', 'public', 'Instagram', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(61, 'mail_server', 'sendgrid_username', NULL, '', 'public', 'Sendgrid Username', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(62, 'mail_server', 'sendgrid_password', NULL, '', 'public', 'Sendgrid Password', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(63, 'mail_server', 'sendgrid_api_key', NULL, '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', 'public', 'Sendgrid API Key', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(64, 'school_profile', 'npsn', NULL, '123', 'public', 'NPSN', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(65, 'school_profile', 'school_name', NULL, 'SMA Negeri 9 Kuningan', 'public', 'Nama Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(66, 'school_profile', 'headmaster', NULL, 'Anton Sofyan', 'public', 'Kepala Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(67, 'school_profile', 'headmaster_photo', NULL, 'headmaster_photo.png', 'public', 'Photo Kepala Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(68, 'school_profile', 'school_level', NULL, '3', 'public', 'Bentuk Pendidikan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(69, 'school_profile', 'school_status', NULL, '1', 'public', 'Status Sekolah', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(70, 'school_profile', 'ownership_status', NULL, '1', 'public', 'Status Kepemilikan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(71, 'school_profile', 'decree_operating_permit', NULL, '-', 'public', 'SK Izin Operasional', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(72, 'school_profile', 'decree_operating_permit_date', NULL, '2021-03-24', 'public', 'Tanggal SK Izin Operasional', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(73, 'school_profile', 'tagline', NULL, 'Where Tomorrow\'s Leaders Come Together', 'public', 'Slogan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(74, 'school_profile', 'rt', NULL, '12', 'public', 'RT', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(75, 'school_profile', 'rw', NULL, '06', 'public', 'RW', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(76, 'school_profile', 'sub_village', NULL, 'Wage', 'public', 'Dusun', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(77, 'school_profile', 'village', NULL, 'Kadugede', 'public', 'Kelurahan / Desa', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(78, 'school_profile', 'sub_district', NULL, 'Kadugede', 'public', 'Kecamatan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(79, 'school_profile', 'district', NULL, 'Kuningan', 'public', 'Kota/Kabupaten', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(80, 'school_profile', 'postal_code', NULL, '45561', 'public', 'Kode Pos', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(81, 'school_profile', 'street_address', NULL, 'Jalan Raya Kadugede No. 11', 'public', 'Alamat Jalan', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(82, 'school_profile', 'phone', NULL, '0232123456', 'public', 'Telepon', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(83, 'school_profile', 'fax', NULL, '0232123456', 'public', 'Fax', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(84, 'school_profile', 'email', NULL, 'info@sman9kuningan.sch.id', 'public', 'Email', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(85, 'school_profile', 'website', NULL, 'http://www.sman9kuningan.sch.id', 'public', 'Website', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(86, 'school_profile', 'logo', NULL, 'logo.png', 'public', 'Logo', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(87, 'admission', 'admission_status', NULL, 'open', 'public', 'Status Penerimaan Peserta Didik Baru', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(88, 'admission', 'admission_year', NULL, '2021', 'public', 'Tahun Penerimaan Peserta Didik Baru', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(89, 'admission', 'admission_start_date', NULL, '2021-01-01', 'public', 'Tanggal Mulai PPDB', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(90, 'admission', 'admission_end_date', NULL, '2021-12-31', 'public', 'Tanggal Selesai PPDB', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(91, 'admission', 'announcement_start_date', NULL, '2021-01-01', 'public', 'Tanggal Mulai Pengumuman Hasil Seleksi PPDB', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false'),
(92, 'admission', 'announcement_end_date', NULL, '2021-12-31', 'public', 'Tanggal Selesai Pengumuman Hasil Seleksi PPDB', '2021-03-24 06:57:46', '2021-03-23 23:57:46', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `major_id` bigint(20) DEFAULT '0' COMMENT 'Program Keahlian',
  `first_choice_id` bigint(20) DEFAULT '0' COMMENT 'Pilihan Pertama PPDB',
  `second_choice_id` bigint(20) DEFAULT '0' COMMENT 'Pilihan Kedua PPDB',
  `registration_number` varchar(10) DEFAULT NULL COMMENT 'Nomor Pendaftaran',
  `admission_exam_number` varchar(10) DEFAULT NULL COMMENT 'Nomor Ujian Tes Tulis',
  `selection_result` varchar(100) DEFAULT NULL COMMENT 'Hasil Seleksi PPDB/PMB',
  `admission_phase_id` bigint(20) DEFAULT '0' COMMENT 'Gelombang Pendaftaran',
  `admission_type_id` bigint(20) DEFAULT '0' COMMENT 'Jalur Pendaftaran',
  `photo` varchar(100) DEFAULT NULL,
  `achievement` text COMMENT 'Prestasi Calon Peserta Didik / Mahasiswa',
  `is_student` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Apakah Siswa Aktif ? Set true jika lolos seleksi PPDB dan set FALSE jika sudah lulus',
  `is_prospective_student` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Apakah Calon Siswa Baru ?',
  `is_alumni` enum('true','false','unverified') NOT NULL DEFAULT 'false' COMMENT 'Apakah Alumni?',
  `is_transfer` enum('true','false') NOT NULL DEFAULT 'false' COMMENT 'Jenis Pendaftaran : Baru / Pindahan ?',
  `re_registration` enum('true','false') DEFAULT NULL COMMENT 'Konfirmasi Pendaftaran Ulang Calon Siswa Baru',
  `start_date` date DEFAULT NULL COMMENT 'Tanggal Masuk Sekolah',
  `identity_number` varchar(50) DEFAULT NULL COMMENT 'NIS/NIM',
  `nisn` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Siswa Nasional',
  `nik` varchar(50) DEFAULT NULL COMMENT 'Nomor Induk Kependudukan/KTP',
  `prev_exam_number` varchar(50) DEFAULT NULL COMMENT 'Nomor Peserta Ujian Sebelumnya',
  `prev_diploma_number` varchar(50) DEFAULT NULL COMMENT 'Nomor Ijazah Sebelumnya',
  `paud` enum('true','false') DEFAULT NULL COMMENT 'Apakah Pernah PAUD',
  `tk` enum('true','false') DEFAULT NULL COMMENT 'Apakah Pernah TK',
  `skhun` varchar(50) DEFAULT NULL COMMENT 'No. Seri Surat Keterangan Hasil Ujian Nasional Sebelumnya',
  `prev_school_name` varchar(255) DEFAULT NULL COMMENT 'Nama Sekolah Sebelumnya',
  `prev_school_address` varchar(255) DEFAULT NULL COMMENT 'Alamat Sekolah Sebelumnya',
  `hobby` varchar(255) DEFAULT NULL,
  `ambition` varchar(255) DEFAULT NULL COMMENT 'Cita-Cita',
  `full_name` varchar(150) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'M',
  `birth_place` varchar(255) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `religion_id` bigint(20) DEFAULT '0',
  `special_need_id` bigint(20) DEFAULT '0' COMMENT 'Berkeburuhan Khusus',
  `street_address` varchar(255) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rt` varchar(10) DEFAULT NULL COMMENT 'Alamat Jalan',
  `rw` varchar(10) DEFAULT NULL COMMENT 'Alamat Jalan',
  `sub_village` varchar(255) DEFAULT NULL COMMENT 'Nama Dusun',
  `village` varchar(255) DEFAULT NULL COMMENT 'Nama Kelurahan/Desa',
  `sub_district` varchar(255) DEFAULT NULL COMMENT 'Kecamatan',
  `district` varchar(255) DEFAULT NULL COMMENT 'Kota/Kabupaten',
  `postal_code` varchar(20) DEFAULT NULL COMMENT 'Kode POS',
  `residence_id` bigint(20) DEFAULT '0' COMMENT 'Tempat Tinggal',
  `transportation_id` bigint(20) DEFAULT '0' COMMENT 'Moda Transportasi',
  `phone` varchar(50) DEFAULT NULL,
  `mobile_phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `sktm` varchar(100) DEFAULT NULL COMMENT 'Surat Keterangan Tidak Mampu (SKTM)',
  `kks` varchar(100) DEFAULT NULL COMMENT 'Kartu Keluarga Sejahtera (KKS)',
  `kps` varchar(100) DEFAULT NULL COMMENT 'Kartu Pra Sejahtera (KPS)',
  `kip` varchar(100) DEFAULT NULL COMMENT 'Kartu Indonesia Pintar (KIP)',
  `kis` varchar(100) DEFAULT NULL COMMENT 'Kartu Indonesia Sehat (KIS)',
  `citizenship` enum('WNI','WNA') NOT NULL DEFAULT 'WNI' COMMENT 'Kewarganegaraan',
  `country` varchar(255) DEFAULT NULL,
  `father_name` varchar(150) DEFAULT NULL,
  `father_birth_year` year(4) DEFAULT NULL,
  `father_education_id` bigint(20) DEFAULT '0',
  `father_employment_id` bigint(20) DEFAULT '0',
  `father_monthly_income_id` bigint(20) DEFAULT '0',
  `father_special_need_id` bigint(20) DEFAULT '0',
  `mother_name` varchar(150) DEFAULT NULL,
  `mother_birth_year` year(4) DEFAULT NULL,
  `mother_education_id` bigint(20) DEFAULT '0',
  `mother_employment_id` bigint(20) DEFAULT '0',
  `mother_monthly_income_id` bigint(20) DEFAULT '0',
  `mother_special_need_id` bigint(20) DEFAULT '0',
  `guardian_name` varchar(150) DEFAULT NULL,
  `guardian_birth_year` year(4) DEFAULT NULL,
  `guardian_education_id` bigint(20) DEFAULT '0',
  `guardian_employment_id` bigint(20) DEFAULT '0',
  `guardian_monthly_income_id` bigint(20) DEFAULT '0',
  `mileage` smallint(6) DEFAULT NULL COMMENT 'Jarak tempat tinggal ke sekolah',
  `traveling_time` smallint(6) DEFAULT NULL COMMENT 'Waktu Tempuh',
  `height` smallint(6) DEFAULT NULL COMMENT 'Tinggi Badan',
  `weight` smallint(6) DEFAULT NULL COMMENT 'Berat Badan',
  `sibling_number` smallint(6) DEFAULT '0' COMMENT 'Jumlah Saudara Kandung',
  `student_status_id` bigint(20) DEFAULT '0' COMMENT 'Status siswa',
  `end_date` date DEFAULT NULL COMMENT 'Tanggal Keluar',
  `reason` varchar(255) DEFAULT NULL COMMENT 'Diisi jika peserta didik sudah keluar',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `slug`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Berita', 'berita', '2021-03-24 06:57:51', '2021-03-23 23:57:51', NULL, NULL, 0, 0, 0, 0, 'false'),
(2, 'Pengumuman', 'pengumuman', '2021-03-24 06:57:51', '2021-03-23 23:57:51', NULL, NULL, 0, 0, 0, 0, 'false'),
(3, 'Sekilas Info', 'sekilas-info', '2021-03-24 06:57:51', '2021-03-23 23:57:51', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `name_admin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `name_admin`, `username`, `password`) VALUES
(2, 'Admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_album`
--

CREATE TABLE `tbl_album` (
  `id_album` bigint(20) UNSIGNED NOT NULL,
  `album_title` varchar(255) NOT NULL,
  `album_description` varchar(255) DEFAULT NULL,
  `album_slug` varchar(255) DEFAULT NULL,
  `album_cover` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `posted_at` date NOT NULL,
  `status_post` varchar(20) NOT NULL,
  `created_by` int(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_album`
--

INSERT INTO `tbl_album` (`id_album`, `album_title`, `album_description`, `album_slug`, `album_cover`, `created_at`, `updated_at`, `posted_at`, `status_post`, `created_by`) VALUES
(5, 'Wisuda Dan Pelepasan Siswa-Siswi Smk Al Islam Pacet', NULL, 'wisuda-dan-pelepasan-siswa-siswi-smk-al-islam-pacet', '1659387869-perpisahan3.jpg', '2021-06-27 19:32:53', '2022-08-01 21:04:29', '0000-00-00', 'Draft', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `blog_judul` varchar(100) DEFAULT NULL,
  `blog_isi` text,
  `blog_kategori` varchar(100) DEFAULT NULL,
  `blog_views` int(11) DEFAULT '0',
  `blog_gambar` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `blog_slug` varchar(200) DEFAULT NULL,
  `blog_status` varchar(20) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `request_date` datetime NOT NULL,
  `publish_date` datetime NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `blog_judul`, `blog_isi`, `blog_kategori`, `blog_views`, `blog_gambar`, `id_user`, `blog_slug`, `blog_status`, `created_date`, `request_date`, `publish_date`, `updated_date`, `is_deleted`) VALUES
(4, 'judul', '<p>sdsd</p>', 'Artikel', 0, '1624192029-Jellyfish.jpg', 1, 'judul', 'Reject', '2021-06-20 12:27:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-06-23 19:13:22', 1),
(5, 'Judul jelli', '<p>sdsd</p>', 'Artikel', 0, '1624347672-Jellyfish.jpg', 1, 'judul-jelli', 'Reject', '2021-06-22 07:41:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-06-23 06:59:09', 1),
(6, 'Pengertian Baterai dan Jenis-jenisnya', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai (Battery) adalah sebuah alat yang dapat merubah energi kimia yang disimpannya menjadi energi Listrik yang dapat digunakan oleh suatu perangkat Elektronik. Hampir semua perangkat elektronik yang portabel seperti Handphone, Laptop, Senter, ataupun Remote Control menggunakan Baterai sebagai sumber listriknya. Dengan adanya Baterai, kita tidak perlu menyambungkan kabel listrik untuk dapat mengaktifkan perangkat elektronik kita sehingga dapat dengan mudah dibawa kemana-mana. Dalam kehidupan kita sehari-hari, kita dapat menemui dua jenis Baterai yaitu Baterai yang hanya dapat dipakai sekali saja (Single Use) dan Baterai yang dapat di isi ulang (Rechargeable).</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Setiap Baterai terdiri dari Terminal Positif( Katoda) dan Terminal Negatif (Anoda) serta Elektrolit yang berfungsi sebagai penghantar. Output Arus Listrik dari Baterai adalah Arus Searah atau disebut juga dengan Arus DC (Direct Current). Pada umumnya, Baterai terdiri dari 2 Jenis utama yakni Baterai Primer yang hanya dapat sekali pakai (single use battery) dan Baterai Sekunder yang dapat diisi ulang (rechargeable battery).</span></p>\r\n<ol>\r\n<li style=\"text-align: justify;\"><strong><span style=\"color: #000000;\">Baterai Primer</span></strong>\r\n<p><span style=\"color: #000000;\">Baterai Primer atau Baterai sekali pakai ini merupakan baterai yang paling sering ditemukan di pasaran, hampir semua toko dan supermarket menjualnya. Hal ini dikarenakan penggunaannya yang luas dengan harga yang lebih terjangkau. Baterai jenis ini pada umumnya memberikan tegangan 1,5 Volt dan terdiri dari berbagai jenis ukuran seperti AAA (sangat kecil), AA (kecil) dan C (medium) dan D (besar). Disamping itu, terdapat juga Baterai Primer (sekali pakai) yang berbentuk kotak dengan tegangan 6 Volt ataupun 9 Volt.</span></p>\r\n<p><span style=\"color: #000000;\">Jenis-jenis Baterai yang tergolong dalam Kategori Baterai Primer (sekali Pakai / Single use) diantaranya adalah :</span></p>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Zinc Carbon</span>\r\n<p><span style=\"color: #000000;\">Baterai Zinc-Carbon juga disering disebut dengan Baterai &ldquo;Heavy Duty&rdquo; yang sering kita jumpai di Toko-toko ataupun Supermarket. Baterai jenis ini terdiri dari bahan Zinc yang berfungsi sebagai Terminal Negatif dan juga sebagai pembungkus Baterainya. Sedangkan Terminal Positifnya adalah terbuat dari Karbon yang berbentuk Batang (rod). Baterai jenis Zinc-Carbon merupakan jenis baterai yang relatif murah dibandingkan dengan jenis lainnya.</span></p>\r\n</li>\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Alkaline</span>\r\n<p><span style=\"color: #000000;\">Baterai Alkaline ini memiliki daya tahan yang lebih lama dengan harga yang lebih mahal dibanding dengan Baterai Zinc-Carbon. Elektrolit yang digunakannya adalah Potassium hydroxide yang merupakan Zat Alkali (Alkaline) sehingga namanya juga disebut dengan Baterai Alkaline. Saat ini, banyak Baterai yang menggunakan Alkalline sebagai Elektrolit, tetapi mereka menggunakan bahan aktif lainnya sebagai Elektrodanya.</span></p>\r\n</li>\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Lithium</span>\r\n<p><span style=\"color: #000000;\">Baterai Primer Lithium menawarkan kinerja yang lebih baik dibanding jenis-jenis Baterai Primer (sekali pakai) lainnya. Baterai Lithium dapat disimpan lebih dari 10 tahun dan dapat bekerja pada suhu yang sangat rendah. Karena keunggulannya tersebut, Baterai jenis Lithium ini sering digunakan untuk aplikasi Memory Backup pada Mikrokomputer maupun Jam Tangan. Baterai Lithium biasanya dibuat seperti bentuk Uang Logam atau disebut juga dengan Baterai Koin (Coin Battery). Ada juga yang memanggilnya Button Cell atau Baterai Kancing.</span></p>\r\n</li>\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Silver Oxide</span>\r\n<p><span style=\"color: #000000;\">Baterai Silver Oxide merupakan jenis baterai yang tergolong mahal dalam harganya. Hal ini dikarenakan tingginya harga Perak (Silver). Baterai Silver Oxide dapat dibuat untuk menghasilkan Energi yang tinggi tetapi dengan bentuk yang relatif kecil dan ringan. Baterai jenis Silver Oxide ini sering dibuat dalam dalam bentuk Baterai Koin (Coin Battery) / Baterai Kancing (Button Cell). Baterai jenis Silver Oxide ini sering dipergunakan pada Jam Tangan, Kalkulator maupun aplikasi militer.</span></p>\r\n</li>\r\n</ol>\r\n</li>\r\n<li style=\"text-align: justify;\">\r\n<p><strong><span style=\"color: #000000;\">Baterai Sekunder</span></strong></p>\r\n<span style=\"color: #000000;\">Baterai Sekunder adalah jenis baterai yang dapat di isi ulang atau Rechargeable Battery. Pada prinsipnya, cara Baterai Sekunder menghasilkan arus listrik adalah sama dengan Baterai Primer. Hanya saja, Reaksi Kimia pada Baterai Sekunder ini dapat berbalik (Reversible). Pada saat Baterai digunakan dengan menghubungkan beban pada terminal Baterai (discharge), Elektron akan mengalir dari Negatif ke Positif. Sedangkan pada saat Sumber Energi Luar (Charger) dihubungkan ke Baterai Sekunder, elektron akan mengalir dari Positif ke Negatif sehingga terjadi pengisian muatan pada baterai. Jenis-jenis Baterai yang dapat di isi ulang (rechargeable Battery) yang sering kita temukan antara lain seperti Baterai Ni-cd (Nickel-Cadmium), Ni-MH (Nickel-Metal Hydride) dan Li-Ion (Lithium-Ion).</span>\r\n<p><span style=\"color: #000000;\">Jenis-jenis Baterai yang tergolong dalam Kategori Baterai Sekunder (Baterai Isi Ulang) diantaranya adalah :</span></p>\r\n<ol style=\"list-style-type: lower-alpha;\">\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Ni-Cd (Nickel-Cadmium)</span>\r\n<p><span style=\"color: #000000;\">Baterai Ni-Cd (NIcket-Cadmium) adalah jenis baterai sekunder (isi ulang) yang menggunakan Nickel Oxide Hydroxide dan Metallic Cadmium sebagai bahan Elektrolitnya. Baterai Ni-Cd memiliki kemampuan beroperasi dalam jangkauan suhu yang luas dan siklus daya tahan yang lama. Di satu sisi, Baterai Ni-Cd akan melakukan discharge sendiri (self discharge) sekitar 30% per bulan saat tidak digunakan. Baterai Ni-Cd juga mengandung 15% Tosik/racun yaitu bahan Carcinogenic Cadmium yang dapat membahayakan kesehatan manusia dan Lingkungan Hidup. Saat ini, Penggunaan dan penjualan Baterai Ni-Cd (Nickel-Cadmiun) dalam perangkat Portabel Konsumen telah dilarang oleh EU (European Union) berdasarkan peraturan &ldquo;Directive 2006/66/EC&rdquo; atau dikenal dengan &ldquo;Battery Directive&rdquo;.</span></p>\r\n</li>\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Alkaline (Nickel-Metal Hydride)</span>\r\n<p><span style=\"color: #000000;\">Baterai Ni-MH (Nickel-Metal Hydride) memiliki keunggulan yang hampir sama dengan Ni-Cd, tetapi baterai Ni-MH mempunyai kapasitas 30% lebih tinggi dibandingkan dengan Baterai Ni-Cd serta tidak memiliki zat berbahaya Cadmium yang dapat merusak lingkungan dan kesehatan manusia. Baterai Ni-MH dapat diisi ulang hingga ratusan kali sehingga dapat menghemat biaya dalam pembelian baterai. Baterai Ni-MH memiliki Self-discharge sekitar 40% setiap bulan jika tidak digunakan. Saat ini Baterai Ni-MH banyak digunakan dalam Kamera dan Radio Komunikasi. Meskipun tidak memiliki zat berbahaya Cadmium, Baterai Ni-MH tetap mengandung sedikit zat berbahaya yang dapat merusak kesehatan manusia dan Lingkungan hidup, sehingga perlu dilakukan daur ulang (recycle) dan tidak boleh dibuang di sembarang tempat.</span></p>\r\n</li>\r\n<li style=\"text-align: justify;\"><span style=\"color: #000000;\">Baterai Li-Ion (Lithium-Ion)</span>\r\n<p><span style=\"color: #000000;\">Baterai jenis Li-Ion (Lithium-Ion) merupakan jenis Baterai yang paling banyak digunakan pada peralatan Elektronika portabel seperti Digital Kamera, Handphone, Video Kamera ataupun Laptop. Baterai Li-Ion memiliki daya tahan siklus yang tinggi dan juga lebih ringan sekitar 30% serta menyediakan kapasitas yang lebih tinggi sekitar 30% jika dibandingkan dengan Baterai Ni-MH. Rasio Self-discharge adalah sekitar 20% per bulan. Baterai Li-Ion lebih ramah lingkungan karena tidak mengandung zat berbahaya Cadmium. Sama seperti Baterai Ni-MH (Nickel- Metal Hydride), Meskipun tidak memiliki zat berbahaya Cadmium, Baterai Li-Ion tetap mengandung sedikit zat berbahaya yang dapat merusak kesehatan manusia dan Lingkungan hidup, sehingga perlu dilakukan daur ulang (recycle) dan tidak boleh dibuang di sembarang tempat.</span></p>\r\n</li>\r\n</ol>\r\n</li>\r\n</ol>', 'Artikel', 0, '1624768780-Baterai-Primer.jpg', 1, 'pengertian-baterai-dan-jenis-jenisnya', 'Publish', '2021-06-23 07:19:39', '2021-06-23 00:00:00', '2021-06-23 21:08:55', '2021-06-27 17:50:15', 0),
(13, 'Artikel Dian Siswantrp', '<p>Teknik Bisnis Sepeda Motor</p>', 'Artikel', 0, '1624439114-Desert.jpg', 6, 'artikel-dian-siswantrp', 'Reject', '2021-06-23 09:05:14', '2021-06-23 11:05:24', '2021-06-23 21:13:10', '2021-06-23 19:13:10', 0),
(14, 'Apa Itu Tune Up Motor', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Saat ini hampir di setiap rumah memiliki kendaraan motor. Hal tersebut menjadi sebuah bukti bahwa motor menjadi salah satu kendaraan yang dibutuhkan banyak orang. Apabila Anda memiliki motor maka ada baiknya jika memperhatikan perawatannya juga. Salah satunya adalah dengan melakukan tune up motor.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Ketika memiliki sebuah motor Anda tentunya menginginkan kendaraan tersebut awet dan nyaman dipakai, bukan? Oleh sebab itu, perawatan motor secara rutin juga penting untuk diperhatikan. Hal ini bertujuan untuk membuat kendaraan Anda tetap aman dan nyaman ketika digunakan.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Pengertian Tune Up pada Motor</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Memiliki sebuah motor&nbsp;ternyata tidak menjamin seseorang memahami tentang beberapa perawatan motor yang perlu dilakukan. Seperti halnya tune up motor, beberapa dari Anda mungkin masih bertanya-tanya sebenarnya apa itu tune up motor dan bagaimana cara tune up motor yang tepat?</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Perlu Anda ketahui bahwa tune up motor ini merupakan sebuah proses yang dilakukan untuk mengembalikan performa motor ke performa standarnya. Hal ini penting untuk dilakukan karena penggunaan motor yang dipakai setiap hari dapat mengakibatkan beberapa perubahan.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Beberapa perubahan yang terjadi pada motor Anda ini harus dikembalikan pada performa standar awal. Khususnya pada komponen mesin dan filter udara. Perubahan-perubahan pada motor ini biasanya terjadi pada komponen mesin dan filter udara karena lama tidak melakukan tune up.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Mesin yang sering digunakan pada motor dapat mengakibatkan keausan. Sementara itu, filter udara yang kotor dapat menghambat aliran udaranya. Perubahan yang dihasilkan memang tidak terlalu besar. Jika Anda menggunakannya dalam waktu lama tanpa melakukan tune up maka akan terasa perbedaannya.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Cara Tune Up yang Tepat</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Tidak sedikit dari Anda yang masih belum mengerti bagaimana cara tune up motor yang tepat, bukan? Untuk melakukan tune up pada motor ada 3 sektor yang harus Anda perhatikan. Diantaranya adalah sektor mesin, chasis dan sektor transmisi.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Hal pertama yang perlu Anda lakukan pada sektor mesin adalah mengecek kualitas dari oli. Kemudian, mengecek busi dan melakukan pemeriksaan filter udara. Setelah itu, Anda perlu memeriksa filter bensin serta karburator. Untuk motor injeksi, Anda perlu melakukan pembersihan injektor dan penyetelan katup.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Pada sektor chasis, Anda harus mengecek kemudi motor dan menyetel rantai roda. Setelah itu, memeriksa ban dan velg serta mengecek kampas rem. Kemudian, melakukan pemeriksaan pada volume minyak rem dan roller untuk motor matic. Selain itu, oli gardan pada motor matic juga perlu Anda periksa.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Cara tune up motor yang ketiga adalah pada sektor transmisi. Pada bagian ini Anda harus mengecek tegangan aki dan tegangan pengisian motor. Tidak hanya itu, rangkaian pengapian motor, serta lampu dan klakson juga perlu Anda cek pada sektor transmisi ini.&nbsp;</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Waktu yang Tepat untuk Melakukan Tune Up</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Anda perlu mengetahui bahwa untuk melakukan tune up ini hendaknya tidak dilakukan secara sembarangan. Ada waktu yang tepat dan memang dianjurkan untuk melakukan tune up pada motor agar hasilnya maksimal.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Waktu yang tepat untuk melakukan tune up ini adalah sekitar 3 bulan sekali atau setiap motor Anda telah mencapai interval 2.000 km. Interval ini berlaku bagi Anda yang sering menggunakan pada jalur yang berdebu. Untuk penggunaan kecepatan lambat dan jarang pada area berdebu sekitar 3.000- 4.000 km.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Waktu untuk melakukan tune up tidak hanya bergantung pada jarak yang ditempuh. Anda juga dapat segera melakukan tune up motor apabila ada masalah pada mesin motor yang digunakan. Misalnya ketika tenaga mesinnya sudah dirasa berkurang atau mesin brebet.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Apabila konsumsi BBM dirasa boros bahkan keluar asap hitam dari knalpot sebaiknya Anda harus segera melakukan tune up. Selain itu, motor yang susah hidup ketika pagi juga menjadi ciri bahwa sudah waktunya Anda melakukan tune up. Ciri lainnya adalah susah oper gigi serta getaran pada mesin tinggi.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Manfaat dari Tune Up pada Motor</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Tune up pada motor tentunya memiliki manfaat yang dapat dirasakan oleh Anda sebagai penggunanya. Selain itu, motor yang Anda miliki juga akan merasakan manfaat setelah dilakukan tune up. Pada dasarnya, manfaat dari tune up pada motor ini untuk mengembalikan performa nya seperti semula.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Anda sebagai penggunanya tentu dapat merasakan perbedaan ketika menggunakan motor yang sudah lama tidak di tune up. Salah satunya adalah apabila tenaga dari mesin motor sudah dirasa kurang dan berat ketika digunakan. Oleh sebab itu, Anda harus segera mengembalikan performa nya yang semula.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Tune up ini juga bermanfaat untuk motor Anda agar kondisi mesin nya tetap terjaga dan awet. Perawatan komponen pada motor yang dilakukan secara rutin tentu dapat membuatnya bertahan lebih lama. Hal tersebut akan berbeda dengan motor yang tidak dirawat secara rutin.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Selain itu, manfaat dari tune up pada motor ini adalah untuk mengetahui bahwa mesin motor selalu dalam keadaan baik. Perawatan rutin ini juga dapat menghindarkan motor Anda dari kerusakan yang lebih parah. Anda sebagai pengguna nya juga akan merasa lebih nyaman ketika berkendara.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Biaya untuk Tune Up</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Tidak dapat dipungkiri bahwa biaya selalu menjadi hal yang dipertimbangkan dalam segala hal, bukan? Termasuk dalam melakukan tune up. Beberapa dari Anda mungkin masih merasa khawatir dengan jumlah yang harus dikeluarkan untuk melakukan tune up motor ini.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Penting untuk Anda ketahui bahwa sebenarnya biaya yang harus dikeluarkan untuk tune up ini beragam. Hal tersebut biasanya disesuaikan dengan jenis motor yang Anda miliki. Biaya untuk motor matic, motor bebek, hingga motor sport tentunya memiliki harga yang berbeda.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Biasanya untuk jenis motor matic dan motor bebek memerlukan biaya sekitar Rp. 50.000,- hingga Rp. 70.000,-. Sementara itu, untuk motor sport dapat menghabiskan biaya sebesar Rp. 100.000,- bahkan lebih. Biaya tersebut hanya untuk ongkos jasa nya saja.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Apabila Anda ingin mengganti beberapa bagian dari motor seperti filter udara, busi, oli maupun bagian lainnya maka harus mengeluarkan biaya tambahan. Oleh sebab itu, ketika hendak melakukan tune up dan mengganti beberapa bagian pada motor minimal harus menyiapkan biaya sebesar Rp. 200.000,-.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\"><strong>Cara Melakukan Tune Up Pada Motor Ketika Mesin Panas</strong></span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Ketika mesin motor dalam keadaan panas, hal pertama yang harus dilakukan untuk melakukan tune up adalah memeriksa dan menyetel celah katup isap. Setelah itu, buang dan sesuai dengan spesifikasi dari motor yang Anda miliki. Kemudian periksa kebersihan dari karburator motor tersebut.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Langsam motor dan campuran AFR harus Anda setelah menggunakan alat pengukur gas CO. Apabila telah selesai, Anda dapat memeriksa tekanan kompresi pada motor. Hal tersebut dikarenakan ketika mesin panas piston sudah memuai dengan sempurna. Setelah itu, Anda dapat melakukan tes jalan pada motor untuk memastikan motor sudah dalam keadaan normal kembali.</span></p>', 'Artikel', 0, '1624465500-cara_tune_up_motor.jpg', 6, 'apa-itu-tune-up-motor', 'Publish', '2021-06-23 16:25:00', '2021-06-23 20:29:55', '2021-06-23 20:31:27', '2021-06-27 18:05:51', 0),
(15, 'Apa itu ECU pada sepeda motor?', '<p style=\"text-align: justify;\">ECU motor atau engine control unit pada motor adalah seperangkat alat yang bekerja sebagai sebuah sistem pengatur dan pengontrol pada mesin kendaraan.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><a href=\"https://www.suzuki.co.id/motorcycle\">Pada kendaraan bermotor</a>&nbsp;dengan sistem injeksi, terdapat sebuah perangkat yang sering disebut-sebut banyak orang, tetapi masih sangat sedikit yang mengetahuinya. Perangkat tersebut adalah engine control unit, atau yang lebih dikenal dengan sebutan ECU motor.</p>\r\n<p style=\"text-align: justify;\">Lalu apa yang sebenarnya dimaksud dengan Ecu dan seberapa penting peran perangkat ini bagi kendaraan bermotor, khususnya kendaraan bermotor dengan sistem injeksi? Berikut ulasan terkaitnya sekaligus uraian tentang apa yang akan terjadi&nbsp; bila sistem ini tidak berfungsi dengan sempurna,</p>\r\n<h2>Pengertian Ecu Motor</h2>\r\n<p>Sebelum membahas mengenai fungsi ecu pada kendaraan bermotor dengan sistem injeksi, terlebih dahulu perlu diketahui apa sebenarnya yang dimaksud dengan engine control unit tersebut. Dengan demikian, akan lebih mudah dan spesifik dalam membahasnya.</p>\r\n<p>Pada intinya, ECU atau engine control unit adalah seperangkat alat yang bekerja sebagai sebuah sistem pengatur dan pengontrol pada kendaraan bermesin. Perangkat ini bisa dikatakan sebagai pusat dari segala kegiatan yang terjadi pada sebuah kendaraan bermotor.</p>\r\n<p>Berkaitan dengan itu, dalam perangkat komputer dikenal dengan istilah CPU yang merupakan pusat pengatur seluruh seluruh kerja komputer.&nbsp; CPU ini akan menerima dan mengolah data-data yang diterima dan kemudian melanjutkan untuk memprosesnya sehingga komputer bisa bekerja.</p>\r\n<p>Dalam hal ini, ECU memiliki fungsi dan sistem kerja yang hampir sama dengan CPU pada komputer. ECU ini akan menerima semua data dan informasi dari semua sistem pada kendaraan bermotor dan kemudian mengolah semua data dan informasi tersebut.</p>\r\n<p>Selanjutnya, semua data dan informasi yang sudah diterima akan diolah dan diteruskan pada seluruh aktuator yang ada pada kendaraan bermotor. Setelahnya, semua aktuator yang ada akan bisa berjalan sebagaimana mestinya. Dengan kata lain, di sini ECU adalah otak dari sebuah kendaraan bermotor.</p>\r\n<h2>Fungsi Ecu Motor</h2>\r\n<p>Karena ECU merupakan otak dari sebuah kendaraan bermotor, maka semua sistem dan perangkat yang ada pada sebuah kendaraan bermotor bekerja sesuai dengan perintah darinya. Semua sistem akan berjalan sesuai dengan perintah berupa sinyal yang diberikan oleh ECU.</p>\r\n<p>Pada kendaraan bermotor, terdapat banyak sekali perangkat yang terhubung dengan ECU. Dengan kata lain, ECU pada kendaraan bermotor bukan hanya terdapat pada satu bagian saja, misalnya pada mesin. Lebih dari itu, komponen ini juga terdapat pada bagian lain dari kendaraan bermotor.</p>\r\n<p>Perangkat ECU ini memiliki banyak sekali kabel yang menghubungkan dengan berbagai komponen yang ada pada kendaraan.&nbsp; Di sini, ECU akan mengatur setiap bagian atau komponen dari kendaraan bermotor tersebut sesuai dengan fungsi dari masing-masing perangkat yang ada.</p>\r\n<p>Misalnya pada bagian kontrol traksi atau mode berkendara, disini fungsi ecu motor adalah untuk membaca perintah yang diberikan sesuai dengan karakter dari kendaraan tersebut. Kemudian, ECU akan mengukur besaran takaran bahan bakar yang akan dialirkan ke silinder.</p>\r\n<p>Dengan cara kerja ini, maka tenaga yang dihasilkan akan sesuai dengan karakter dari kendaraan bermotor tersebut. Jadi, sebesar apapun tarikan gas yang diberikan, tidak akan terjadi spinning atau tenaga berlebihan, karena semua sudah diatur ECU sesuai dengan takaran dan karakter kendaraan.</p>', 'Artikel', 0, '1624471090-ecu.jpg', 6, 'apa-itu-ecu-pada-sepeda-motor?', 'Reject', '2021-06-23 17:58:10', '2021-06-23 19:58:18', '2021-06-23 20:31:34', '2021-06-23 18:31:34', 0),
(17, 'Kunjungan industri Siswa Kelas X Perhotelan SMK Al Islam Pacet', '<p>Program kunjungan industri yang dilaksanakan SMK Al Islam Pacet ke Hotel Alana merupakan salah satu program pendidikan yang berusaha membentuk generasi masa depan untuk mengenal budaya industri (industrial culture), melaksanakan disiplin kerja sekaligus mengenal industri perhotelan. Peserta didik dan guru pemdamping yang mengikuti kegiatan kunjungan industri diharapkan nantinya memiliki kemampuan analitik dan rekayasa yang kreatif, inovatif, dan mandiri, memiliki integritas kepribadian dan keilmuan yang tinggi serta memiliki motivasi untuk mengikuti perkembangan teknologi dan ilmu pengetahuan.<br />Manfaat dari kunjungan Industri ini adalah untuk mengetahui kedisiplinan dan tata tertib yang tegas dalam dunia kerja perhotelan, melihat secara langsung cara kerja produksi, mendapat gambaran saat akan bekerja di industri perhotelan.<br />Perubahaan melalui proses pendidikan dilakukan untuk efek perubahan yang terjadi akan berlangsung lama dan bertumbuh. Inti dari kegiatan kunjungan industri yaitu menumbuhkan kesadaran (sikap), pengetahuan dan keterampilan &ldquo;baru&rdquo; yang mampu mengubah perilaku peserta didik agar kelak dapat berdaya guna menumbuhkan semangat belajar mandiri dan partisipatif, melalui dialog, diskusi dan pertukaran pengalaman (sharring) bersama industri.<br />Kunjungan industri dilakukan sebagai sebuah aktivitas peserta didik Kelas XI Perhotelan dan guru pendamping untuk belajar bagaimana penerapan study di dunia pekerjaan secara nyata. Sebelum melangkah lebih jauh mengenai contoh laporan kunjungan industri, maka Anda perlu mengetahui tujuan pokok kunjungan industri. Tujuan kunjungan industri yaitu: Memberikan pandangan dan wawasan, khususnya pada industri dan implementasi pada peserta didik serta menguatkan kerjasama dengan dunia industri.</p>', 'berita', 0, '1659385112-kunjungan.jpg', 1, 'kunjungan-industri-siswa-kelas-x-perhotelan-smk-al-islam-pacet', 'Publish', '2021-06-24 02:45:07', '0000-00-00 00:00:00', '2021-06-24 04:53:23', '2022-08-01 20:18:32', 0),
(18, 'Selamat ulang tahun Bapak Kepala Sekolah Smk Al Islam Pacet', '<p>Barakallah fii Umrik fii Rizki fii Ilmi fi Dunya Wal Akhirat. Selamat ulang tahun Bapak Kepala Sekolah Smk Al Islam Pacet H. Andri Gunawan., ST.MM. Semoga Allah SWT senantiasa menjaga Bapak. memberi panjang umur dalam keadaan sehat walafiat dan kebahagiaan. Semoga ilmu yang bapak ajarkan menjadi amal jariah yang takkan pernah putus.</p>', 'berita', 0, '1659384607-ultah.jpg', 1, 'selamat-ulang-tahun-bapak-kepala-sekolah-smk-al-islam-pacet', 'Publish', '2021-06-24 02:55:16', '0000-00-00 00:00:00', '2021-06-24 04:55:23', '2022-08-01 20:10:07', 0),
(19, 'Foto bersama salah satu siswa lulusan terbaik tekhnik Kendaraan Ringan', '<p>Dalam ajang Lomba Kompetensi Siswa Tingkat Kabupaten Kebumen, SMK AL Islam Pacet meraih beberapa Juara.</p>\r\n<p>Annas Khafiddudin dari Kelas XII Otomotif berhasil meraih Juara Harapan 1 LKS SMK Tahun 2022 untuk mata lomba Teknik Kendaraan Ringan Otomotif.</p>\r\n<p>Selamat dan terus berjuang, Annas!</p>', 'berita', 0, '1659384353-foto1.jpg', 1, 'foto-bersama-salah-satu-siswa-lulusan-terbaik-tekhnik-kendaraan-ringan', 'Publish', '2021-06-24 02:55:48', '0000-00-00 00:00:00', '2021-06-24 04:55:54', '2022-08-01 20:05:53', 0),
(20, 'Wisuda dan pelepasan siswa-siswi Smk Al islam Pacet', '<p>Perpisahan dan pelepasan siswa kelas XII merupakan agenda rutin SMK Al Islam Pacet yang dilaksanakan setiap tahun setelah semua proses pembelajaran kelas XII selesai atau setelah ujian nasional dilaksanakan. Selain sebagai ajang silaturahmi antarsiswa, dan warga sekolah (para guru dan staff), acara ini juga sebagai prosesi melepas siswa kelas XII yang telah menyelesaikan masa belajarnya di jenjang Sekolah Menengah Kejuruan. Para siswa siswi nantinya akan kembali ke orangtua dan masyarakat sebagai sosok pribadi yang lebih dewasa dalam berpikir dan bertindak dalam menentukan masa depannya, untuk melanjutkan ke jenjang pendidikan di perguruan tinggi maupun berwira usaha atau bekerja.</p>\r\n<p>Acara pelepasan siswa siswi ini di buka oleh Bapak H. Andri Gunawan.,ST.MM selaku Kepala SMK Al Islam Pacet, &ldquo;Apa yang di raih saat ini bukan akhir dari sebuah perjuangan yang telah di tempuh selama 3 tahun namun mulai saat ini merupakan titik awal untuk menjalani kehidupan di luar sana mudah mudahan dengan bekal ilmu yang telah di peroleh selama 3 tahun di bangku sekolah bermanfaat untuk siwa siswi SMK Al Islam Pacet untuk menjalani kehidupan di masyarakat baik untuk bekerja maupun berwirausaha&rdquo; tutur beliau saat menyampaikan sambutanya.</p>\r\n<p>Alhamdulilah acara pelepasan siwa siswi SMK Al Islam Pacet berjalan dengan lancar semoga dengan di adakan acara ini menjadi sebuah kenangan yang istimewa bagi siswa siswi dan semoga siswa siswi SMK Al Islam Pacet menjadi orang orang yang sukses dan berguna bagi lingkungan masyarakat mereka tinggal.</p>', 'berita', 0, '1659384113-wisuda.jpg', 1, 'wisuda-dan-pelepasan-siswa-siswi-smk-al-islam-pacet', 'Publish', '2021-06-24 02:56:24', '0000-00-00 00:00:00', '2021-06-24 04:56:28', '2022-08-01 20:08:15', 0),
(21, '5 Cara Mengganti Oli Mesin Sepeda Motor yang Baik dan Benar', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Mengganti oli mesin<em>&nbsp;</em>pada sepeda motor yang baik dan benar, tentu akan memberikan banyak manfaat kepada sepeda motor yang kita miliki. Bagaimana tidak, sepeda motor akan lebih awet, umurnya lebih panjang, tahan lama, jarang mengalami kerusakan, dan tentunya tetap prima saat di kendarai di jalanan yang mulus maupun tidak. Meskipun begitu, tapi terkadang banyak juga dari kita yang salah dalam mengganti oli mesin pada sepeda motor. Jika sudah salah dalam menggantinya, tidak menutup kemungkinan sepeda motor akan mengalami kerusakan parah yang mengharuskan kita membawanya ke bengkel. Terutama bagi kita yang memiliki sepeda motor metic. Eh, napa? Sepeda motor metic perlu oli khusus alias tidak bisa sembarangan. Jika sembarangan, bisa-bisa motor metic kita bisa lebih cepat rusak.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Nah, agar kita tidak melakukan kesalahan saat mengganti oli pada sepeda motor, maka membaca cara mengganti oli mesin sepeda motor yang baik dan benar sangat direkomendasikan sekali untuk kita. Yuks,<em>&nbsp;check it out</em>:</span></p>\r\n<ol style=\"text-align: justify;\">\r\n<li><span style=\"color: #000000;\">Meletakkan Wadah Penampung di Bagian Bawah Sepeda Motor</span>\r\n<p><span style=\"color: #000000;\">Langkah pertama yang bisa dilakukan saat mengganti oli mesin pada sepeda motor yaitu meletakkan wadah penampung di bagian bawah sepeda motor. Hal ini bertujuan untuk menampung oli lama yang keluar dari sepeda motor. Wadah penampung yang digunakan pun boleh beragam macam misalnya kaleng biskuit, dirigen bensin bekas yang sudah di potong, dan lainnya. Saat meletakkan wadah penampung, pastikan wadah tepat berada di tempat keluarnya oli pada sepeda motor.</span></p>\r\n</li>\r\n<li><span style=\"color: #000000;\">Mengendurkan Baut Oli Mesin Pada Sepeda Motor</span>\r\n<p><span style=\"color: #000000;\">Setelah meletakkan wadah penampung, maka selanjutnya yang kita lakukan adalah mengendurkan baut oli mesin yang terdapat pada sepeda motor. Saat mengendurkan baut, gunakanlah obeng yang pas dengan baut pada sepeda motor, dan putar baut searah jarum jam. Apabila baut oli sudah terbuka bersama dengan penutup mesin, tiba-tiba oli lama yang ada di dalam sepeda motor akan keluar dengan sendirinya. Tunggu oli keluar semua, lalu tutup kembali dengan baut agar udara tidak masuk.</span></p>\r\n</li>\r\n<li><span style=\"color: #000000;\">Membersihkan Oli Lama yang Ada di Mesin Sepeda Motor</span>\r\n<p><span style=\"color: #000000;\">Apabila oli lama sudah keluar semua, lalu kita harus membersihkan oli lama yang masih tersisa di dalam mesin sepeda motor. Saat membersihkannya, gunakan tang untuk membuka penutup bagian atas mesin, kemudian bersihkan mesin.</span></p>\r\n</li>\r\n<li><span style=\"color: #000000;\">Mengencangkan Baut di Bagian Bawah</span>\r\n<p><span style=\"color: #000000;\">Jika mesin oli lama sudah bersih, berikutnya kita harus mengencangkan baut yang terdapat di bagian bawah mesin oli sepeda motor. Pastikan, baut terpasang dengan sempurna dan kencang. Jika baut tidak terpasang dengan kencang atau sempurna, hanya akan mengeluarkan oli baru yang akan dimasukkan ke dalam mesin oli sepeda motor.</span></p>\r\n</li>\r\n<li><span style=\"color: #000000;\">Memasukkan Oli Baru Pada Mesin Sepeda Motor</span>\r\n<p><span style=\"color: #000000;\">Terakhir, hal yang harus dilakukan yaitu memasukkan oli baru ke dalam mesin sepeda motor menggunakan alat bantu seperti torong. Apabila oli sudah masuk semua ke dalam mesin sepeda motor, maka selanjutnya kita tutup kembali penutup mesin oli sepeda motor.</span></p>\r\n</li>\r\n</ol>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Itulah beberapa cara mengganti oli mesin sepeda motor yang baik dan benar. Semoga Bermanfaat.</span></p>\r\n<p style=\"text-align: justify;\"><span style=\"color: #000000;\">&nbsp;</span></p>', 'Artikel', 0, '1624526830-62723-ganti-oli.jpg', 1, '5-cara-mengganti-oli-mesin-sepeda-motor-yang-baik-dan-benar', 'Publish', '2021-06-24 09:27:10', '0000-00-00 00:00:00', '2021-06-24 11:27:17', '2021-06-27 17:59:52', 0),
(22, 'Pengertian Listrik Secara Umum', '<p style=\"text-align: justify;\"><span style=\"color: #000000;\">Pada jaman sekarang, listrik sangat diperlukan sekali dalam kebutuhan setiap manusia. Namun begitu, ternyata sebagian pengguna listrik belum mengetahui apa pengertian listrik sebenarnya. Meski demikian anda tidak perlu khawatir, karena saya akan berbagi untuk menjelaskan kepada anda tentang apa itu listrik.</span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\"><strong>Listrik</strong>&nbsp;adalah aliran&nbsp;elektron-elektron dari atom ke atom&nbsp;pada sebuah penghantar atau suatu energi yang sangat berpengaruh terhadap kehidupan manusia sehari-harinya. Energi listrik ini digunakan dan dimanfaatkan untuk menggerakkan berbagai alat elektronik yang berfungsi untuk mempermudah pekerjaan manusia.</span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\">Secara umum atau dalam kamus bahasa Indonesia, Listrik dapat diartikan sebagai suatu daya yang muncul akibat terjadinya suatu gesekan atau dikarenakan sebab lain dari suatu proses kimia.</span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\">Listrik tersebut terbagi menjadi 2, yaitu listrik statis dan listrik dinamis.</span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\"><strong>Listrik Statis</strong>&nbsp;adalah energi yang dikandung oleh benda yang bermuatan listrik. Muatan listrik benda tersebut dapat positif maupun negatif. Bila diperinci lebih dalam lagi, semua zat itu dibentuk dari sejumlah atom. Tiap-tiap atom memiliki inti atom yang terdiri dari elektron dan proton yang mengitarinya. Proton memiliki muatan listrik yang positif, sedangkan elektron memiliki muatan listrik yang negatif.</span></p>\r\n<p style=\"text-align: center;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\"><img src=\"http://localhost:81/smkmuhkedawung/public/image/upload/detailartikel/1624817515-post-image-1624817513266.jpg\" alt=\"\" width=\"448\" height=\"185\" /></span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\">Disaat dua zat atau benda contohnya tangan kita dan balon saling digesek-gesekan, material yang memiliki daya tarik lebih lemah yaitu tangan akan ditarik elektronnya dan menempel pada benda yang daya tariknya lebih kuat yaitu balon. Dengan demikian maka kedua zat tersebut jadi punya muatan listrik, dimana material yang elektronnya hilang akan memiliki muatan positif dan material yang mendapat elektron jadi bermuatan negatif.</span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\"><strong>Listrik Dinamis</strong>&nbsp;adalah&nbsp;listrik yang dapat bergerak. Cara mengukur kuat arus pada listrik dinamis dengan cara muatan listrik dibagai waktu dengan satuan muatan listrik adalah coulumb dan satuan waktu adalah detik. Kuat arus pada rangkaian bercabang sama dengan kuat arus yang masuk dengan kuat arus yang keluar.</span></p>\r\n<p style=\"text-align: center;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\"><img src=\"http://localhost:81/smkmuhkedawung/public/image/upload/detailartikel/1624817538-post-image-1624817537260.jpg\" alt=\"\" width=\"279\" height=\"204\" /></span></p>\r\n<p style=\"text-align: justify;\" data-adtags-visited=\"true\"><span style=\"color: #000000;\">Sementara itu, pada rangkaian seri, kuat arus tetap sama di setiap ujung-ujung hambatan. Sebaliknya, tegangan berbeda pada hambatan. Pada rangkaian seri, tegangan sangat bergantung pada hambatan. Akan tetapi, pada rangkaian bercabang tegangan tidak berpengaruh pada hambatan. Semua itu telah dikemukakan dalam hukum Kirchoff yang berbunyi &ldquo;jumlah kuat arus listrik yang masuk sama dengan jumlah kuat arus listrik yang keluar&rdquo;.</span></p>', 'Artikel', 0, '1624817784-token-listrik-gratis-1_169.jpeg', 1, 'pengertian-listrik-secara-umum', 'Publish', '2021-06-27 18:12:54', '0000-00-00 00:00:00', '2021-06-27 20:13:01', '2021-06-27 18:16:49', 0);
INSERT INTO `tbl_blog` (`blog_id`, `blog_judul`, `blog_isi`, `blog_kategori`, `blog_views`, `blog_gambar`, `id_user`, `blog_slug`, `blog_status`, `created_date`, `request_date`, `publish_date`, `updated_date`, `is_deleted`) VALUES
(23, 'Coba Artikel Foto', '<p><img src=\"data:image/jpeg;base64,data:image/jpeg;base64,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\" alt=\"\" width=\"266\" height=\"189\" /></p>\r\n<p><img src=\"data:image/jpeg;base64,data:image/jpeg;base64,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\" alt=\"\" width=\"270\" height=\"151\" /></p>', 'Artikel', 0, '1677901238-foto-beranda.jpg', 1, 'coba-artikel-foto', 'Publish', '2023-03-04 03:40:38', '0000-00-00 00:00:00', '2023-03-04 03:40:42', '2023-03-04 03:40:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brosur`
--

CREATE TABLE `tbl_brosur` (
  `id_brosur` int(11) NOT NULL,
  `keterangan_brosur` text NOT NULL,
  `file_brosur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brosur`
--

INSERT INTO `tbl_brosur` (`id_brosur`, `keterangan_brosur`, `file_brosur`) VALUES
(1, 'Brosur', '1684480604-IMG-20230322-WA0002.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_foto`
--

CREATE TABLE `tbl_foto` (
  `id_foto` bigint(20) UNSIGNED NOT NULL,
  `id_album` bigint(20) DEFAULT '0',
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_foto`
--

INSERT INTO `tbl_foto` (`id_foto`, `id_album`, `photo_name`, `created_at`, `updated_at`) VALUES
(8, 2, '118701502_3226765350704172_6124824280208081796_n.jpg', '2021-06-27 19:11:43', '2021-06-27 19:11:43'),
(9, 2, '118818559_3226765520704155_7003447698263898260_n.jpg', '2021-06-27 19:11:58', '2021-06-27 19:11:58'),
(10, 2, '118865616_3226765234037517_5022277500329426845_n.jpg', '2021-06-27 19:12:15', '2021-06-27 19:12:15'),
(11, 2, '118952748_3226765617370812_1173580644856293131_n.jpg', '2021-06-27 19:12:32', '2021-06-27 19:12:32'),
(12, 3, '158718749_6138254489534104_4410327199925045239_n.jpg', '2021-06-27 19:20:06', '2021-06-27 19:20:06'),
(13, 3, '158802323_6138255216200698_3851867777559193714_n.jpg', '2021-06-27 19:20:25', '2021-06-27 19:20:25'),
(14, 3, '158635462_6138254169534136_9171422551703509279_n.jpg', '2021-06-27 19:20:42', '2021-06-27 19:20:42'),
(15, 4, '2.jpg', '2021-06-27 19:24:31', '2021-06-27 19:24:31'),
(16, 4, '3.jpg', '2021-06-27 19:24:39', '2021-06-27 19:24:39'),
(21, 5, 'perpisahan2.jpg', '2022-08-01 21:02:53', '2022-08-01 21:02:53'),
(22, 5, 'perpisahan1.jpg', '2022-08-01 21:04:13', '2022-08-01 21:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gurustaf`
--

CREATE TABLE `tbl_gurustaf` (
  `id_gurustaf` int(11) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_gurustaf` varchar(200) NOT NULL,
  `kelompok` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktif` int(3) NOT NULL,
  `is_deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gurustaf`
--

INSERT INTO `tbl_gurustaf` (`id_gurustaf`, `nik`, `nama`, `jabatan`, `no_telp`, `email`, `password`, `foto_gurustaf`, `kelompok`, `created_date`, `update_date`, `aktif`, `is_deleted`) VALUES
(16, '232323', 'Dian Siswantoro', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(22, '232323', 'E', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(23, '232323', 'F', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(24, '232323', 'G', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(25, '232323', 'H', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(26, '232323', 'I', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(27, '232323', 'J', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(28, '232323', 'K', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0),
(29, '232323', 'L', 'Guru Produktif', '08726376', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', '1623777780-Desert.jpg', 'Tenaga Kependidikan', '2021-06-15 17:23:00', '2021-06-28 08:50:01', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_identitas`
--

CREATE TABLE `tbl_identitas` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `alamat` varchar(250) DEFAULT NULL,
  `telp` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `fb` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `instagram` varchar(250) DEFAULT NULL,
  `logo` varchar(250) DEFAULT NULL,
  `logo_panjang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_identitas`
--

INSERT INTO `tbl_identitas` (`id`, `title`, `alamat`, `telp`, `email`, `fb`, `twitter`, `instagram`, `logo`, `logo_panjang`) VALUES
(1, 'YAYASAN PONDOK PESANTREN AL QUR’ANIYAH', 'JL. Sumur Pondok. NO 38 Ds. Dukuhjati Kec. Krangkeng', '082321755977', 'https://youtube/media quraniyah', 'https://web.facebook.com/mediaquraniyah', 'https://www.tiktok.com/@mediaquraniyah', 'https://www.instagram.com/mediaquraniyah/', '1684477303-logopanjang.png', '1684477309-logopanjang.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jurusan`
--

CREATE TABLE `tbl_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug_jurusan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jurusan`
--

INSERT INTO `tbl_jurusan` (`id_jurusan`, `nama`, `slug_jurusan`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Teknik Kendaraan Ringan Otomotif', 'teknik-kendaraan-ringan-otomotif', '<p><span style=\"color: #000000;\">Teknik Kendaraan Ringan adalah ilmu yang mempelajari tentang alat-alat&nbsp;<a title=\"Transportasi\" href=\"http://id.wikipedia.org/wiki/Transportasi\">transportasi</a>&nbsp;darat yang menggunakan&nbsp;<a title=\"Mesin\" href=\"http://id.wikipedia.org/wiki/Mesin\">mesin</a>, terutama&nbsp;<a title=\"Mobil\" href=\"http://id.wikipedia.org/wiki/Mobil\">mobil</a>&nbsp;yang mulai berkembang sebagai cabang ilmu seiring dengan diciptakannya mesin mobil. Dalam perkembangannya, mobil semakin menjadi alat transportasi yang kompleks yang terdiri dari ribuan komponen yang tergolong dalam puluhan system dan subsistem. Oleh karena itu, Teknik Kendaraan Ringan pun berkembang menjadi ilmu yang luas dan mencakup semua system dan subsistem.</span></p>\r\n<p><span style=\"color: #000000;\">Teknik Kendaraan Ringan yang dulunya adalah Teknik Otomotif, membekali peserta didik dengan ilmu kendaraan ringan &nbsp;agar mampu melaksanakan perawatan dan perbaikan komponen &ndash; komponen mobil secara mandiri, merawat dan memperbaiki mobil sesuai dengan standar yang ditentukan oleh pabrik, merawat dan memperbaiki mobil pada bengkel atau perusahaan dimana tempat ia bekerja, serta menciptakan lapangan kerja baru bagi dirinya dan orang lain.</span></p>\r\n<p><span style=\"color: #000000;\">Tujuan Kompetensi keahlian Teknik Kendaraan Ringan SMK Negeri 2 Surabaya yaitu membekali peserta didik dengan pengetahuan, sikap, prilaku dan ketrampilan agar kompeten dalam :</span></p>\r\n<ol>\r\n<li><span style=\"color: #000000;\">Bidang kompetensi keahlian Teknik Kendaraan Ringan yang diberikan, sehingga mampu mengembangkan dan mengaplikasikan dalam pekerjaanya secara mandiri dan dapat mengisi lowongan pekerjaan yang ada di dunia usaha dan dunia industry sebagai tenaga kerja tingkat menengah yang handal.</span></li>\r\n<li><span style=\"color: #000000;\">Memiliki karakter, mampu berkompetisi dan mengembangkan sikap professional dalam kompetensi keahlianTeknik Kendaraan Ringan.</span></li>\r\n<li><span style=\"color: #000000;\">Menciptakan Lapangan Kerja sendiri atau bewirausaha dalam bidang kompetensi keahlian teknik Kendaraan Ringan.</span></li>\r\n<li><span style=\"color: #000000;\">Melanjutkan ke jenjang Pendidikan yang lebih tinggi sesuai kompetensi yang dimiliki</span></li>\r\n</ol>\r\n<p><span style=\"color: #000000;\">Lulusan kompetensi keahlian Teknik Kendaraan Ringan SMK Negeri 2 Surabaya bekali dengan ilmu pengetahuan dan keterampilan dalam perawatan dan perbaikan motor otomotif, Perawatan dan perbaikan system pemindah tenaga otomotif,&nbsp; Perawatan dan perbaikan chasis dan suspense otomotif, Perawatan dan perbaikan system kelistrikan otomotif serta dibekali kemampuan dalam berwirausaha sesuai dengan perkembangan kebutuhan masyarakat, dunia industry.</span></p>', '1659386403-otomotif.jpg', '2021-06-27 20:37:35', '2022-08-01 20:56:07'),
(2, 'Teknik Managemen Pergudangan', 'teknik-managemen-pergudangan', '<p><span style=\"color: #000000;\">Kemakmuran suatu negara tercermin dari kinerja Logistik. Berangkat dari sini sangat jelas manajemen Logistik memiliki peranan sangat strategis dan sangat penting&nbsp; dalam kemajuan suatu negara. Hal ini nampak nyata dengan banyak berdirinya perusahaan-perrusahaan logistik yang begitu pesat seiring dengan permintaan layanan logistik yang sangat besar baik dari sektor pemerintah, sektor swasta maupun masyarakat perorangan.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>Logistik adalah bagian dari proses rantai suplai (supply chain) yang berfungsi merencanakan, melaksanakan, mengontrol secara efektif dan efisien proses pengadaan, pengelolaan, penyimpanan barang, pelayanan dan informasi mulai dari titik awal (point of origin) hingga titik konsumsi (point of consumption) dengan tujuan memenuhi kebutuhan para konsumen atau pelanggan</strong></span></p>\r\n<p><span style=\"color: #000000;\"><strong>KOMPETENSI KEAHLIAN MANAJEMEN LOGISTIK SMK AL Islam Pacet</strong></span></p>\r\n<p><span style=\"color: #000000;\">Kompetensi keahlian manajemen logistik merupakan salah satu jurusan yang ada di SMK Al Islam Pacet. Kompetensi keahlian ini dirancang menghasilkan lulusan yang kompeten sesuai dengan kebutuhan industri logistik. Kurikulum Kompetensi Manajemen logistik SMK Al Islam Pacet telah diselaraskan dengan industri logistik, yaitu diantaranya dengan PT POS Indonesia.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>SUMBER DAYA MANUSIA</strong></span></p>\r\n<p><span style=\"color: #000000;\">Kompetensi keahlian Manajemen Logistik memiliki tenaga pengajar yang kompeten di bidangnya dan memiliki kualifikasi pendidikan S1 dan S2.</span></p>\r\n<p><span style=\"color: #000000;\"><strong>PELUANG LULUSAN MANAJEMEN LOGISTIK</strong></span></p>\r\n<p><span style=\"color: #000000;\">Tumbuh pesatnya perusahaan yang bergerak dibidang logistik tentunya perlu diimbangi dengan ketersediaan tenaga profesional yang kompeten dalam bidang manajemen logistik tersebut, sementara lulusan atau tamatan komptensi keahlian Manajemen Logistik jumlahnya masih sangat terbatas. Maka peluang lulusan kompetensi keahlian manajemen logistik sangat terbuka lebar untuk menduduki posisi jabatan atau pekerjaan yang ada dibidang Logistik tersebut.</span></p>\r\n<p><span style=\"color: #000000;\">Berikut adalah beberapa peluang kerja untuk lulusan dari jurusan Manajemen Logistik</span></p>\r\n<ol>\r\n<li><span style=\"color: #000000;\">Logistic Administrator Officer</span></li>\r\n<li><span style=\"color: #000000;\">Warehouse operater</span></li>\r\n<li><span style=\"color: #000000;\">Warehouse supervisor</span></li>\r\n<li><span style=\"color: #000000;\">Freight Porwarder</span></li>\r\n<li><span style=\"color: #000000;\">Supply Chain Manager</span></li>\r\n<li><span style=\"color: #000000;\">Dan lain-lain</span></li>\r\n</ol>\r\n<p><span style=\"color: #000000;\">Selain peluang kerja diatas lulusan kompetensi manajemen logistik bisa melanjutkan pendidikan ke jenjang yang lebih tinggi maupun Wirausaha</span></p>\r\n<p><span style=\"color: #000000;\"><strong>MATA PELAJARAN PADA KOMPETENSI KEAHLIAN MANAJEMEN LOGISTIK</strong></span></p>\r\n<ol>\r\n<li><span style=\"color: #000000;\"><strong>Dasar Bidang Keahlian</strong></span></li>\r\n</ol>\r\n<ul>\r\n<li><span style=\"color: #000000;\">Simulasi dan Komunikasi Digital</span></li>\r\n<li><span style=\"color: #000000;\">Ekonomi Bisnis</span></li>\r\n<li><span style=\"color: #000000;\">Administrasi Umum</span></li>\r\n<li><span style=\"color: #000000;\">IPA</span></li>\r\n</ul>\r\n<ol start=\"2\">\r\n<li><span style=\"color: #000000;\"><strong>Dasar program keahlian</strong></span></li>\r\n</ol>\r\n<ul>\r\n<li><span style=\"color: #000000;\">Penanganan Transportasi</span></li>\r\n<li><span style=\"color: #000000;\">Administrasi Pergudangan</span></li>\r\n<li><span style=\"color: #000000;\">Manajemen Distribusi dan Delivery</span></li>\r\n<li><span style=\"color: #000000;\">Regulasi Sektor Logistik dan Keselamatan Kerja</span></li>\r\n</ul>\r\n<ol start=\"3\">\r\n<li><span style=\"color: #000000;\"><strong>Kompetensi Keahlian</strong></span></li>\r\n</ol>\r\n<ul>\r\n<li><span style=\"color: #000000;\">Manajemen Transportasi</span></li>\r\n<li><span style=\"color: #000000;\">Manajemen Pergudangan</span></li>\r\n<li><span style=\"color: #000000;\">Manajemen Distribusi</span></li>\r\n<li><span style=\"color: #000000;\">Freight Forwarding</span></li>\r\n<li><span style=\"color: #000000;\">Produk Kreatif dan Kewirausahaan</span></li>\r\n</ul>', '1659386791-pergudangan.jpg', '2021-06-15 05:55:32', '2022-08-01 20:56:41'),
(3, 'Perhotelan', 'perhotelan', '<section class=\"section\">\r\n<div class=\"container pd-2  \">\r\n<h2 class=\"section-title text-primary mb-2\"><span style=\"color: #000000;\">Tujuan kompetensi</span></h2>\r\n<p><span style=\"color: #000000;\">Tujuan Kompetensi Keahlian Perhotelan secara umum mengacu pada isi Undang Undang Sistem Pendidikan Nasional (UU SPN) pasal 3 mengenai Tujuan Pendidikan Nasional dan penjelasan pasal 15 yang menyebutkan bahwa pendidikan kejuruan merupakan pendidikan menengah yang mempersiapkan peserta didik terutama untuk bekerja dalam bidang tertentu. Secara khusus tujuan Kompetensi Keahlian Perhotelan adalah membekali peserta didik dengan keterampilan, pengetahuan dan sikap agar kompeten:</span></p>\r\n<ol class=\"pd-1\">\r\n<li><span style=\"color: #000000;\">Melaksanakan pekerjaan di lingkup Front Office sebagai Reception, Reservation, Telephone Operator, dan Porter</span></li>\r\n<li><span style=\"color: #000000;\">Melaksanakan pekerjaan di lingkup Housekeeping sebagai Public Area Attendant, Room Attendant, Order Taker, Linen &amp; Uniform Attendant dan Laundry Attendant.</span></li>\r\n</ol>\r\n</div>\r\n</section>\r\n<section class=\"section mx-auto\">\r\n<div class=\"container pd-2 \">\r\n<h2 class=\"section-title text-primary mb-2\"><span style=\"color: #000000;\">Ruang Lingkup Pekerjaan</span></h2>\r\n<p><span style=\"color: #000000;\">Ruang lingkup pekerjaan bagi lulusan Kompetensi Perhotelan adalah jenis pekerjaan dan atau profesi yang relevan dengan kompetensi yang tertuang di dalam SKKNI keahlian Perhotelan pada jenjang SMK antara lain adalah :</span></p>\r\n<ol class=\"pd-1\">\r\n<li><span style=\"color: #000000;\">bidang industri tour dan travel</span></li>\r\n<li><span style=\"color: #000000;\">Ticketing</span></li>\r\n<li><span style=\"color: #000000;\">Tour Planner</span></li>\r\n<li><span style=\"color: #000000;\">Guide</span></li>\r\n<li><span style=\"color: #000000;\">Cargo/Peti Kemas-Ekspedisi</span></li>\r\n<li><span style=\"color: #000000;\">Transportasi dan sebagainya</span></li>\r\n<li><span style=\"color: #000000;\">bidang usaha Restaurant &amp; bar</span></li>\r\n<li><span style=\"color: #000000;\">Caf&eacute;</span></li>\r\n<li><span style=\"color: #000000;\">Catering</span></li>\r\n<li><span style=\"color: #000000;\">Laundry</span></li>\r\n<li><span style=\"color: #000000;\">Dosen/Guru praktisi dibidang pariwisata dan bidang Pemerintahan &ndash; Pariwisata</span></li>\r\n<li><span style=\"color: #000000;\">Bakery dan sebagainya</span></li>\r\n</ol>\r\n<p><span style=\"color: #000000;\">Dengan memanfaatkan kemampuan, pengalaman dan berbagai peluang yang ada, lulusan Kompetensi Keahlian Perhotelan juga dimungkinkan mengelola bidang perhotelan dan jasa pariwisata untuk usaha mandiri.</span></p>\r\n</div>\r\n</section>', '1659387307-perhotelan.jpg', '2021-04-16 06:11:25', '2022-08-01 20:57:44');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kepalasekolah`
--

CREATE TABLE `tbl_kepalasekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sambutan` text NOT NULL,
  `visi` text NOT NULL,
  `misi` text NOT NULL,
  `tujuan` text NOT NULL,
  `poto` varchar(200) NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kepalasekolah`
--

INSERT INTO `tbl_kepalasekolah` (`id`, `nama`, `sambutan`, `visi`, `misi`, `tujuan`, `poto`, `update_at`) VALUES
(1, 'H. Andri Gunawan., ST.MM.', '<p>Didirikannya pondok pesantran Al Qur&rsquo;aniyah, atas prakarsa al maghfurullahKH. MASDUKI dan Nyai Hj. ruduh, yang mempunyai langgar / tajug / mushollaatau tempat pengajian, akan tetapi pada saat itu, karena tidak seimbangnya antara daya tampung dengan jumlah orang yang mengaji, dengan ketidakseimbangan itulah akhirnya putra putri KH. Masduki yang bernama KH. MUNJIDMASDUKI (adik) dan KH. MUHSIN MASDUKI (kakak) mempunyai gagasanuntuk mendirikan sebuah pondok pesantren, supaya dapat menampungmasyarakat yang mengaji dan orang orang yang ingin memperdalam ilmu agama.pondok pesantren Al Qur&rsquo;aniyah mempunyai rencana selain para santri menguasai ilmu agama, juga dibekali dengan pendidikan keterampilan, dengan harapan agarnanti setelah lulus dari pondokpesantren bisa berguna bagi masyarakat, negara dan agama</p>', '<p><span style=\"color: #000000;\">&ldquo;Terciptanya lembaga yang terkemuka, profesional yang beriman dan bertaqwa berbudi pekerti luhur, kreatif, inovatif, berjiwa wirausaha dengan lulusan yang mampu bersaing di dunia kerja&rdquo;</span></p>', '<p><span style=\"color: #000000;\">1.&nbsp;Menciptakan tamatan yang siap memasuki dunia kerja.</span></p>\r\n<p><span style=\"color: #000000;\">2. Meningkatkan profesionalisme SMK Al Islam Pacet sebagai pusat pendidikan.</span></p>\r\n<p><span style=\"color: #000000;\">3. Meningkatkan profesionalisme tenaga pendidikn dan kependidikan yang mempunyai standar kompetensi sesuai dengan bidang keahlian masing-masing.</span></p>\r\n<p><span style=\"color: #000000;\">4. Meningkatkan lulusan yang dilandasi dengan iman dan taqwa serta siap memasuki dunia kerja.</span></p>\r\n<p><span style=\"color: #000000;\">5.Menciptakan generasi yang terampil sesuai dengan tuntutan di era globalisasi dan perkembangan ilmu pengetahuan dan teknologi.</span></p>', '<p>Mencetak kader/Generasi Islam yang menguasai Sains dan Tekhnologi sehingga mampuberkiprah dibidangnya masing-masing secara maksimal dan menjadi pelopor untuk kemajuanUmat Islam, Bangsa, dan Negara</p>', '1684477726-pimpinan.jpeg', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id_slider` int(11) NOT NULL,
  `tulisanbesar_slider` varchar(150) NOT NULL,
  `tulisankecil_slider` varchar(150) NOT NULL,
  `file_slider` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id_slider`, `tulisanbesar_slider`, `tulisankecil_slider`, `file_slider`) VALUES
(1, 'Selamat Datang', 'sdsd', '1684574142-rgrgwer.png'),
(2, 'Selamat Datang', 'sdsd', '1684574552-DSC0607c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tulisan`
--

CREATE TABLE `tbl_tulisan` (
  `id` int(11) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `thumbnail` tinytext NOT NULL,
  `deskripsi_thumbnail` tinytext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `ringkasan` tinytext NOT NULL,
  `konten` text NOT NULL,
  `tags` tinytext NOT NULL,
  `meta_description` tinytext NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_redatur` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `tgl_posting` datetime NOT NULL,
  `viewer` int(11) NOT NULL,
  `is_publish` enum('0','1') NOT NULL,
  `is_editor_pick` enum('0','1') NOT NULL,
  `is_headline` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(10) NOT NULL,
  `name_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level_user` varchar(20) NOT NULL,
  `foto_user` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_deleted` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `name_user`, `username`, `password`, `level_user`, `foto_user`, `created_at`, `update_at`, `is_deleted`) VALUES
(1, 'Admin', 'superadmin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin', 'admin.png', '2021-06-15 15:22:55', '2021-06-22 07:26:57', 0),
(6, 'Dian Siswantoro', 'dian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'Tenaga Pendidik', '1623777780-Desert.jpg', '2021-06-15 17:23:01', '2021-06-28 03:43:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `theme_folder` varchar(255) DEFAULT NULL,
  `theme_author` varchar(255) DEFAULT NULL,
  `is_active` enum('true','false') DEFAULT 'false',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `theme_name`, `theme_folder`, `theme_author`, `is_active`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'Sky Light', 'sky_light', 'Anton Sofyan', 'true', '2021-03-24 06:57:49', '2021-03-23 23:57:49', NULL, NULL, 1, 0, 0, 0, 'false'),
(2, 'Blue Sky', 'blue_sky', 'Anton Sofyan', 'false', '2021-03-24 06:57:49', '2021-03-23 23:57:49', NULL, NULL, 1, 0, 0, 0, 'false'),
(3, 'Green Land', 'green_land', 'Anton Sofyan', 'false', '2021-03-24 06:57:49', '2021-03-23 23:57:49', NULL, NULL, 1, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_full_name` varchar(100) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `user_url` varchar(100) DEFAULT NULL,
  `user_group_id` bigint(20) DEFAULT '0',
  `user_type` enum('super_user','administrator','employee','student') NOT NULL DEFAULT 'administrator',
  `user_profile_id` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'student_id OR employee_id',
  `user_biography` text,
  `user_forgot_password_key` varchar(100) DEFAULT NULL,
  `user_forgot_password_request_date` date DEFAULT NULL,
  `has_login` enum('true','false') DEFAULT 'false',
  `last_logged_in` datetime DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_password`, `user_full_name`, `user_email`, `user_url`, `user_group_id`, `user_type`, `user_profile_id`, `user_biography`, `user_forgot_password_key`, `user_forgot_password_request_date`, `has_login`, `last_logged_in`, `ip_address`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
(1, 'administrator', '$2y$10$fncKPww1IT96E5moEpoX/OLq2rgXQwHS1khou6feR7Z39j6s5Kexq', 'Administrator', 'admin@admin.com', 'sekolahku.web.id', 0, 'super_user', NULL, NULL, NULL, NULL, 'true', '2021-04-07 18:11:02', '::1', '2021-03-24 06:57:48', '2021-04-07 16:11:02', NULL, NULL, 0, 0, 0, 0, 'false');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_group` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_privileges`
--

CREATE TABLE `user_privileges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_group_id` bigint(20) DEFAULT '0',
  `module_id` bigint(20) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `restored_at` datetime DEFAULT NULL,
  `created_by` bigint(20) DEFAULT '0',
  `updated_by` bigint(20) DEFAULT '0',
  `deleted_by` bigint(20) DEFAULT '0',
  `restored_by` bigint(20) DEFAULT '0',
  `is_deleted` enum('true','false') DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `_sessions`
--

CREATE TABLE `_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `_sessions`
--

INSERT INTO `_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('5uogi2j1eoirr1b3as82ueu7c862jf70', '::1', 1617811171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373831313130373b736974655f6d61696e74656e616e63657c733a353a2266616c7365223b736974655f6d61696e74656e616e63655f656e645f646174657c733a31303a22323032312d30312d3031223b736974655f63616368657c733a353a2266616c7365223b736974655f63616368655f74696d657c733a323a223130223b6d6574615f6465736372697074696f6e7c733a3130363a22434d532053656b6f6c61686b75206164616c616820436f6e74656e74204d616e6167656d656e742053797374656d2064616e2050504442204f6e6c696e652067726174697320756e74756b20534420534d502f5365646572616a617420534d412f5365646572616a6174223b6d6574615f6b6579776f7264737c733a3338313a22434d532c20576562736974652053656b6f6c6168204772617469732c2043617261204d656d6275617420576562736974652053656b6f6c61682c206d656d62756174207765622073656b6f6c61682c20636f6e746f6820776562736974652073656b6f6c61682c20666974757220776562736974652073656b6f6c61682c2053656b6f6c61682c20576562736974652c20496e7465726e65742c53697475732c20434d532053656b6f6c61682c205765622053656b6f6c61682c20576562736974652053656b6f6c6168204772617469732c20576562736974652053656b6f6c61682c2041706c696b6173692053656b6f6c61682c2050504442204f6e6c696e652c20505342204f6e6c696e652c20505342204f6e6c696e65204772617469732c2050656e6572696d61616e2053697377612042617275204f6e6c696e652c205261706f7274204f6e6c696e652c204b7572696b756c756d20323031332c2053442c20534d502c20534d412c20416c697961682c204d54732c20534d4b223b6d61705f6c6f636174696f6e7c733a303a22223b66617669636f6e7c733a31313a2266617669636f6e2e706e67223b6865616465727c733a31303a226865616465722e706e67223b7265636170746368615f7374617475737c733a373a2264697361626c65223b7265636170746368615f736974655f6b65797c733a34303a22364c654e435441554141414141414454624c317244773847543144463244556a567445587a644d75223b7265636170746368615f7365637265745f6b65797c733a34303a22364c654e4354415541414141414771384f3049746b7a4738667341394b654a376d464d4d46463173223b74696d657a6f6e657c733a31323a22417369612f4a616b61727461223b66696c655f616c6c6f7765645f74797065737c733a31393a226a70672c206a7065672c20706e672c20676966223b75706c6f61645f6d61785f66696c6573697a657c733a313a2230223b7468756d626e61696c5f73697a655f6865696768747c733a333a22313030223b7468756d626e61696c5f73697a655f77696474687c733a333a22313530223b6d656469756d5f73697a655f6865696768747c733a333a22333038223b6d656469756d5f73697a655f77696474687c733a333a22343630223b6c617267655f73697a655f6865696768747c733a333a22363030223b6c617267655f73697a655f77696474687c733a333a22383030223b616c62756d5f636f7665725f6865696768747c733a333a22323530223b616c62756d5f636f7665725f77696474687c733a333a22343030223b62616e6e65725f6865696768747c733a323a223831223b62616e6e65725f77696474687c733a333a22323435223b696d6167655f736c696465725f6865696768747c733a333a22343030223b696d6167655f736c696465725f77696474687c733a333a22393030223b73747564656e745f70686f746f5f6865696768747c733a333a22343030223b73747564656e745f70686f746f5f77696474687c733a333a22333030223b656d706c6f7965655f70686f746f5f6865696768747c733a333a22343030223b656d706c6f7965655f70686f746f5f77696474687c733a333a22333030223b686561646d61737465725f70686f746f5f6865696768747c733a333a22343030223b686561646d61737465725f70686f746f5f77696474687c733a333a22333030223b6865616465725f6865696768747c733a323a223830223b6865616465725f77696474687c733a333a22323030223b6c6f676f5f6865696768747c733a333a22313230223b6c6f676f5f77696474687c733a333a22313230223b64656661756c745f706f73745f63617465676f72797c733a313a2231223b64656661756c745f706f73745f7374617475737c733a373a227075626c697368223b64656661756c745f706f73745f7669736962696c6974797c733a363a227075626c6963223b64656661756c745f706f73745f64697363757373696f6e7c733a343a226f70656e223b706f73745f696d6167655f7468756d626e61696c5f6865696768747c733a333a22313030223b706f73745f696d6167655f7468756d626e61696c5f77696474687c733a333a22313530223b706f73745f696d6167655f6d656469756d5f6865696768747c733a333a22323530223b706f73745f696d6167655f6d656469756d5f77696474687c733a333a22343030223b706f73745f696d6167655f6c617267655f6865696768747c733a333a22343530223b706f73745f696d6167655f6c617267655f77696474687c733a333a22383430223b706f73745f7065725f706167657c733a323a223130223b706f73745f7273735f636f756e747c733a323a223130223b706f73745f72656c617465645f636f756e747c733a323a223130223b636f6d6d656e745f7065725f706167657c733a323a223130223b636f6d6d656e745f6d6f6465726174696f6e7c733a353a2266616c7365223b636f6d6d656e745f726567697374726174696f6e7c733a353a2266616c7365223b636f6d6d656e745f626c61636b6c6973747c733a373a226b616d70726574223b636f6d6d656e745f6f726465727c733a333a22617363223b66616365626f6f6b7c733a303a22223b747769747465727c733a303a22223b6c696e6b65645f696e7c733a303a22223b796f75747562657c733a303a22223b696e7374616772616d7c733a303a22223b73656e64677269645f757365726e616d657c733a303a22223b73656e64677269645f70617373776f72647c733a303a22223b73656e64677269645f6170695f6b65797c733a36393a2253472e7337614c476977725464695a6c4146724a4f425939512e6370676d765a5833625250377649786f71775553764d6c38733132394d41467a43794458694c77616e7373223b6e70736e7c733a333a22313233223b7363686f6f6c5f6e616d657c733a32313a22534d41204e65676572692039204b756e696e67616e223b686561646d61737465727c733a31323a22416e746f6e20536f6679616e223b686561646d61737465725f70686f746f7c733a32303a22686561646d61737465725f70686f746f2e706e67223b7363686f6f6c5f6c6576656c7c733a313a224d223b7363686f6f6c5f7374617475737c733a313a2231223b6f776e6572736869705f7374617475737c733a313a2231223b6465637265655f6f7065726174696e675f7065726d69747c733a313a222d223b6465637265655f6f7065726174696e675f7065726d69745f646174657c733a31303a22323032312d30332d3234223b7461676c696e657c733a33383a22576865726520546f6d6f72726f772773204c65616465727320436f6d6520546f676574686572223b72747c733a323a223132223b72777c733a323a223036223b7375625f76696c6c6167657c733a343a2257616765223b76696c6c6167657c733a383a224b61647567656465223b7375625f64697374726963747c733a383a224b61647567656465223b64697374726963747c733a383a224b756e696e67616e223b706f7374616c5f636f64657c733a353a223435353631223b7374726565745f616464726573737c733a32363a224a616c616e2052617961204b61647567656465204e6f2e203131223b70686f6e657c733a31303a2230323332313233343536223b6661787c733a31303a2230323332313233343536223b656d61696c7c733a32353a22696e666f40736d616e396b756e696e67616e2e7363682e6964223b776562736974657c733a33313a22687474703a2f2f7777772e736d616e396b756e696e67616e2e7363682e6964223b6c6f676f7c733a383a226c6f676f2e706e67223b61646d697373696f6e5f7374617475737c733a343a226f70656e223b61646d697373696f6e5f796561727c733a343a2232303231223b61646d697373696f6e5f73746172745f646174657c733a31303a22323032312d30312d3031223b61646d697373696f6e5f656e645f646174657c733a31303a22323032312d31322d3331223b616e6e6f756e63656d656e745f73746172745f646174657c733a31303a22323032312d30312d3031223b616e6e6f756e63656d656e745f656e645f646174657c733a31303a22323032312d31322d3331223b5f61636164656d69635f796561727c733a31353a22546168756e2050656c616a6172616e223b5f73747564656e747c733a31333a225065736572746120446964696b223b5f6964656e746974795f6e756d6265727c733a333a224e4953223b5f656d706c6f7965657c733a333a2247544b223b5f5f656d706c6f7965657c733a32383a22477572752064616e2054656e616761204b6570656e646964696b616e223b5f7375626a6563747c733a31343a224d6174612050656c616a6172616e223b5f61646d697373696f6e7c733a343a2250504442223b5f6d616a6f727c733a373a224a75727573616e223b5f686561646d61737465727c733a31343a224b6570616c612053656b6f6c6168223b7468656d657c733a393a22736b795f6c69676874223b6d616a6f725f636f756e747c623a303b757365725f69647c733a313a2231223b757365725f6e616d657c733a31333a2261646d696e6973747261746f72223b757365725f656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f747970657c733a31303a2273757065725f75736572223b757365725f70726f66696c655f69647c4e3b6861735f6c6f67696e7c623a313b757365725f70726976696c656765737c613a31343a7b693a303b733a393a2264617368626f617264223b693a313b733a31353a226368616e67655f70617373776f7264223b693a323b733a31313a226d61696e74656e616e6365223b693a333b733a353a227573657273223b693a343b733a393a2261646d697373696f6e223b693a353b733a31303a22617070656172616e6365223b693a363b733a343a22626c6f67223b693a373b733a393a22656d706c6f79656573223b693a383b733a353a226d65646961223b693a393b733a373a22706c7567696e73223b693a31303b733a393a227265666572656e6365223b693a31313b733a383a2273657474696e6773223b693a31323b733a383a2261636164656d6963223b693a31333b733a373a2270726f66696c65223b7d),
('2fq59v3ev9dr5k12ua0odc7ofa2ivvuv', '::1', 1617816584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313631373831363432363b736974655f6d61696e74656e616e63657c733a353a2266616c7365223b736974655f6d61696e74656e616e63655f656e645f646174657c733a31303a22323032312d30312d3031223b736974655f63616368657c733a353a2266616c7365223b736974655f63616368655f74696d657c733a323a223130223b6d6574615f6465736372697074696f6e7c733a3130363a22434d532053656b6f6c61686b75206164616c616820436f6e74656e74204d616e6167656d656e742053797374656d2064616e2050504442204f6e6c696e652067726174697320756e74756b20534420534d502f5365646572616a617420534d412f5365646572616a6174223b6d6574615f6b6579776f7264737c733a3338313a22434d532c20576562736974652053656b6f6c6168204772617469732c2043617261204d656d6275617420576562736974652053656b6f6c61682c206d656d62756174207765622073656b6f6c61682c20636f6e746f6820776562736974652073656b6f6c61682c20666974757220776562736974652073656b6f6c61682c2053656b6f6c61682c20576562736974652c20496e7465726e65742c53697475732c20434d532053656b6f6c61682c205765622053656b6f6c61682c20576562736974652053656b6f6c6168204772617469732c20576562736974652053656b6f6c61682c2041706c696b6173692053656b6f6c61682c2050504442204f6e6c696e652c20505342204f6e6c696e652c20505342204f6e6c696e65204772617469732c2050656e6572696d61616e2053697377612042617275204f6e6c696e652c205261706f7274204f6e6c696e652c204b7572696b756c756d20323031332c2053442c20534d502c20534d412c20416c697961682c204d54732c20534d4b223b6d61705f6c6f636174696f6e7c733a303a22223b66617669636f6e7c733a31313a2266617669636f6e2e706e67223b6865616465727c733a31303a226865616465722e706e67223b7265636170746368615f7374617475737c733a373a2264697361626c65223b7265636170746368615f736974655f6b65797c733a34303a22364c654e435441554141414141414454624c317244773847543144463244556a567445587a644d75223b7265636170746368615f7365637265745f6b65797c733a34303a22364c654e4354415541414141414771384f3049746b7a4738667341394b654a376d464d4d46463173223b74696d657a6f6e657c733a31323a22417369612f4a616b61727461223b66696c655f616c6c6f7765645f74797065737c733a31393a226a70672c206a7065672c20706e672c20676966223b75706c6f61645f6d61785f66696c6573697a657c733a313a2230223b7468756d626e61696c5f73697a655f6865696768747c733a333a22313030223b7468756d626e61696c5f73697a655f77696474687c733a333a22313530223b6d656469756d5f73697a655f6865696768747c733a333a22333038223b6d656469756d5f73697a655f77696474687c733a333a22343630223b6c617267655f73697a655f6865696768747c733a333a22363030223b6c617267655f73697a655f77696474687c733a333a22383030223b616c62756d5f636f7665725f6865696768747c733a333a22323530223b616c62756d5f636f7665725f77696474687c733a333a22343030223b62616e6e65725f6865696768747c733a323a223831223b62616e6e65725f77696474687c733a333a22323435223b696d6167655f736c696465725f6865696768747c733a333a22343030223b696d6167655f736c696465725f77696474687c733a333a22393030223b73747564656e745f70686f746f5f6865696768747c733a333a22343030223b73747564656e745f70686f746f5f77696474687c733a333a22333030223b656d706c6f7965655f70686f746f5f6865696768747c733a333a22343030223b656d706c6f7965655f70686f746f5f77696474687c733a333a22333030223b686561646d61737465725f70686f746f5f6865696768747c733a333a22343030223b686561646d61737465725f70686f746f5f77696474687c733a333a22333030223b6865616465725f6865696768747c733a323a223830223b6865616465725f77696474687c733a333a22323030223b6c6f676f5f6865696768747c733a333a22313230223b6c6f676f5f77696474687c733a333a22313230223b64656661756c745f706f73745f63617465676f72797c733a313a2231223b64656661756c745f706f73745f7374617475737c733a373a227075626c697368223b64656661756c745f706f73745f7669736962696c6974797c733a363a227075626c6963223b64656661756c745f706f73745f64697363757373696f6e7c733a343a226f70656e223b706f73745f696d6167655f7468756d626e61696c5f6865696768747c733a333a22313030223b706f73745f696d6167655f7468756d626e61696c5f77696474687c733a333a22313530223b706f73745f696d6167655f6d656469756d5f6865696768747c733a333a22323530223b706f73745f696d6167655f6d656469756d5f77696474687c733a333a22343030223b706f73745f696d6167655f6c617267655f6865696768747c733a333a22343530223b706f73745f696d6167655f6c617267655f77696474687c733a333a22383430223b706f73745f7065725f706167657c733a323a223130223b706f73745f7273735f636f756e747c733a323a223130223b706f73745f72656c617465645f636f756e747c733a323a223130223b636f6d6d656e745f7065725f706167657c733a323a223130223b636f6d6d656e745f6d6f6465726174696f6e7c733a353a2266616c7365223b636f6d6d656e745f726567697374726174696f6e7c733a353a2266616c7365223b636f6d6d656e745f626c61636b6c6973747c733a373a226b616d70726574223b636f6d6d656e745f6f726465727c733a333a22617363223b66616365626f6f6b7c733a303a22223b747769747465727c733a303a22223b6c696e6b65645f696e7c733a303a22223b796f75747562657c733a303a22223b696e7374616772616d7c733a303a22223b73656e64677269645f757365726e616d657c733a303a22223b73656e64677269645f70617373776f72647c733a303a22223b73656e64677269645f6170695f6b65797c733a36393a2253472e7337614c476977725464695a6c4146724a4f425939512e6370676d765a5833625250377649786f71775553764d6c38733132394d41467a43794458694c77616e7373223b6e70736e7c733a333a22313233223b7363686f6f6c5f6e616d657c733a32313a22534d41204e65676572692039204b756e696e67616e223b686561646d61737465727c733a31323a22416e746f6e20536f6679616e223b686561646d61737465725f70686f746f7c733a32303a22686561646d61737465725f70686f746f2e706e67223b7363686f6f6c5f6c6576656c7c733a313a224d223b7363686f6f6c5f7374617475737c733a313a2231223b6f776e6572736869705f7374617475737c733a313a2231223b6465637265655f6f7065726174696e675f7065726d69747c733a313a222d223b6465637265655f6f7065726174696e675f7065726d69745f646174657c733a31303a22323032312d30332d3234223b7461676c696e657c733a33383a22576865726520546f6d6f72726f772773204c65616465727320436f6d6520546f676574686572223b72747c733a323a223132223b72777c733a323a223036223b7375625f76696c6c6167657c733a343a2257616765223b76696c6c6167657c733a383a224b61647567656465223b7375625f64697374726963747c733a383a224b61647567656465223b64697374726963747c733a383a224b756e696e67616e223b706f7374616c5f636f64657c733a353a223435353631223b7374726565745f616464726573737c733a32363a224a616c616e2052617961204b61647567656465204e6f2e203131223b70686f6e657c733a31303a2230323332313233343536223b6661787c733a31303a2230323332313233343536223b656d61696c7c733a32353a22696e666f40736d616e396b756e696e67616e2e7363682e6964223b776562736974657c733a33313a22687474703a2f2f7777772e736d616e396b756e696e67616e2e7363682e6964223b6c6f676f7c733a383a226c6f676f2e706e67223b61646d697373696f6e5f7374617475737c733a343a226f70656e223b61646d697373696f6e5f796561727c733a343a2232303231223b61646d697373696f6e5f73746172745f646174657c733a31303a22323032312d30312d3031223b61646d697373696f6e5f656e645f646174657c733a31303a22323032312d31322d3331223b616e6e6f756e63656d656e745f73746172745f646174657c733a31303a22323032312d30312d3031223b616e6e6f756e63656d656e745f656e645f646174657c733a31303a22323032312d31322d3331223b5f61636164656d69635f796561727c733a31353a22546168756e2050656c616a6172616e223b5f73747564656e747c733a31333a225065736572746120446964696b223b5f6964656e746974795f6e756d6265727c733a333a224e4953223b5f656d706c6f7965657c733a333a2247544b223b5f5f656d706c6f7965657c733a32383a22477572752064616e2054656e616761204b6570656e646964696b616e223b5f7375626a6563747c733a31343a224d6174612050656c616a6172616e223b5f61646d697373696f6e7c733a343a2250504442223b5f6d616a6f727c733a373a224a75727573616e223b5f686561646d61737465727c733a31343a224b6570616c612053656b6f6c6168223b7468656d657c733a393a22736b795f6c69676874223b6d616a6f725f636f756e747c623a303b757365725f69647c733a313a2231223b757365725f6e616d657c733a31333a2261646d696e6973747261746f72223b757365725f656d61696c7c733a31353a2261646d696e4061646d696e2e636f6d223b757365725f747970657c733a31303a2273757065725f75736572223b757365725f70726f66696c655f69647c4e3b6861735f6c6f67696e7c623a313b757365725f70726976696c656765737c613a31343a7b693a303b733a393a2264617368626f617264223b693a313b733a31353a226368616e67655f70617373776f7264223b693a323b733a31313a226d61696e74656e616e6365223b693a333b733a353a227573657273223b693a343b733a393a2261646d697373696f6e223b693a353b733a31303a22617070656172616e6365223b693a363b733a343a22626c6f67223b693a373b733a393a22656d706c6f79656573223b693a383b733a353a226d65646961223b693a393b733a373a22706c7567696e73223b693a31303b733a393a227265666572656e6365223b693a31313b733a383a2273657474696e6773223b693a31323b733a383a2261636164656d6963223b693a31333b733a373a2270726f66696c65223b7d);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_years`
--
ALTER TABLE `academic_years`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `academic_year` (`academic_year`);

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `achievements_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `admission_phases`
--
ALTER TABLE `admission_phases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`academic_year_id`,`phase_name`),
  ADD KEY `admission_phases_academic_year_id__idx` (`academic_year_id`) USING BTREE;

--
-- Indexes for table `admission_quotas`
--
ALTER TABLE `admission_quotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`academic_year_id`,`admission_type_id`,`major_id`),
  ADD KEY `admission_quotas_academic_year_id__idx` (`academic_year_id`) USING BTREE,
  ADD KEY `admission_quotas_admission_type_id__idx` (`admission_type_id`) USING BTREE,
  ADD KEY `admission_quotas_major_id__idx` (`major_id`) USING BTREE;

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`question_id`,`answer`),
  ADD KEY `answers_question_id__idx` (`question_id`) USING BTREE;

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`category_name`,`category_type`);

--
-- Indexes for table `class_groups`
--
ALTER TABLE `class_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`class_group`,`sub_class_group`,`major_id`),
  ADD KEY `class_groups_major_id__idx` (`major_id`) USING BTREE;

--
-- Indexes for table `class_group_settings`
--
ALTER TABLE `class_group_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`academic_year_id`,`class_group_id`),
  ADD KEY `class_group_settings_academic_year_id__idx` (`academic_year_id`) USING BTREE,
  ADD KEY `class_group_settings_class_group_id__idx` (`class_group_id`) USING BTREE;

--
-- Indexes for table `class_group_students`
--
ALTER TABLE `class_group_students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`class_group_setting_id`,`student_id`),
  ADD KEY `class_group_students_class_group_setting_id__idx` (`class_group_setting_id`) USING BTREE,
  ADD KEY `class_group_students_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_comment_post_id__idx` (`comment_post_id`) USING BTREE;

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_nik__idx` (`nik`) USING BTREE,
  ADD KEY `employees_full_name__idx` (`full_name`) USING BTREE,
  ADD KEY `employees_email__idx` (`email`) USING BTREE,
  ADD KEY `employees_religion_id__idx` (`religion_id`) USING BTREE,
  ADD KEY `employees_marriage_status_id__idx` (`marriage_status_id`) USING BTREE,
  ADD KEY `employees_spouse_employment_id__idx` (`spouse_employment_id`) USING BTREE,
  ADD KEY `employees_employment_status_id__idx` (`employment_status_id`) USING BTREE,
  ADD KEY `employees_employment_type_id__idx` (`employment_type_id`) USING BTREE,
  ADD KEY `employees_institution_lifter_id__idx` (`institution_lifter_id`) USING BTREE,
  ADD KEY `employees_rank_id__idx` (`rank_id`) USING BTREE,
  ADD KEY `employees_salary_source_id__idx` (`salary_source_id`) USING BTREE,
  ADD KEY `employees_laboratory_skill_id__idx` (`laboratory_skill_id`) USING BTREE,
  ADD KEY `employees_special_need_id__idx` (`special_need_id`) USING BTREE;

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `files_file_category_id__idx` (`file_category_id`) USING BTREE;

--
-- Indexes for table `image_sliders`
--
ALTER TABLE `image_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`link_url`,`link_type`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `majors`
--
ALTER TABLE `majors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `major_name` (`major_name`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `module_name` (`module_name`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`option_group`,`option_name`),
  ADD KEY `options_option_group__idx` (`option_group`) USING BTREE;

--
-- Indexes for table `pollings`
--
ALTER TABLE `pollings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pollings_answer_id__idx` (`answer_id`) USING BTREE;

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_post_author__idx` (`post_author`) USING BTREE;

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `question` (`question`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`quote`,`quote_by`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholarships_student_id__idx` (`student_id`) USING BTREE;

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`setting_group`,`setting_variable`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_registration_number__idx` (`registration_number`) USING BTREE,
  ADD KEY `students_identity_number__idx` (`identity_number`) USING BTREE,
  ADD KEY `students_full_name__idx` (`full_name`) USING BTREE,
  ADD KEY `students_first_choice_id__idx` (`first_choice_id`) USING BTREE,
  ADD KEY `students_second_choice_id__idx` (`second_choice_id`) USING BTREE,
  ADD KEY `students_major_id__idx` (`major_id`) USING BTREE,
  ADD KEY `students_admission_phase_id__idx` (`admission_phase_id`) USING BTREE,
  ADD KEY `students_admission_type_id__idx` (`admission_type_id`) USING BTREE,
  ADD KEY `students_student_status_id__idx` (`student_status_id`) USING BTREE;

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_album`
--
ALTER TABLE `tbl_album`
  ADD PRIMARY KEY (`id_album`),
  ADD UNIQUE KEY `album_title` (`album_title`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_brosur`
--
ALTER TABLE `tbl_brosur`
  ADD PRIMARY KEY (`id_brosur`);

--
-- Indexes for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `photos_photo_album_id__idx` (`id_album`) USING BTREE;

--
-- Indexes for table `tbl_gurustaf`
--
ALTER TABLE `tbl_gurustaf`
  ADD PRIMARY KEY (`id_gurustaf`);

--
-- Indexes for table `tbl_identitas`
--
ALTER TABLE `tbl_identitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tbl_kepalasekolah`
--
ALTER TABLE `tbl_kepalasekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indexes for table `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `theme_name` (`theme_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD KEY `users_user_group_id__idx` (`user_group_id`) USING BTREE,
  ADD KEY `users_user_profile_id__idx` (`user_profile_id`) USING BTREE;

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_group` (`user_group`);

--
-- Indexes for table `user_privileges`
--
ALTER TABLE `user_privileges`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_field` (`user_group_id`,`module_id`),
  ADD KEY `user_privileges_user_group_id__idx` (`user_group_id`) USING BTREE,
  ADD KEY `user_privileges_module_id__idx` (`module_id`) USING BTREE;

--
-- Indexes for table `_sessions`
--
ALTER TABLE `_sessions`
  ADD KEY `ci_sessions_TIMESTAMP` (`timestamp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_years`
--
ALTER TABLE `academic_years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_phases`
--
ALTER TABLE `admission_phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission_quotas`
--
ALTER TABLE `admission_quotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `class_groups`
--
ALTER TABLE `class_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_group_settings`
--
ALTER TABLE `class_group_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_group_students`
--
ALTER TABLE `class_group_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_sliders`
--
ALTER TABLE `image_sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `majors`
--
ALTER TABLE `majors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `pollings`
--
ALTER TABLE `pollings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_album`
--
ALTER TABLE `tbl_album`
  MODIFY `id_album` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_brosur`
--
ALTER TABLE `tbl_brosur`
  MODIFY `id_brosur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_foto`
--
ALTER TABLE `tbl_foto`
  MODIFY `id_foto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_gurustaf`
--
ALTER TABLE `tbl_gurustaf`
  MODIFY `id_gurustaf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_identitas`
--
ALTER TABLE `tbl_identitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_jurusan`
--
ALTER TABLE `tbl_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_kepalasekolah`
--
ALTER TABLE `tbl_kepalasekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_tulisan`
--
ALTER TABLE `tbl_tulisan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_privileges`
--
ALTER TABLE `user_privileges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
