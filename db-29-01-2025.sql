-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 29, 2025 at 04:11 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_absensi_sma10`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tahun_ajaran` bigint UNSIGNED DEFAULT NULL,
  `id_guru` bigint UNSIGNED DEFAULT NULL,
  `id_kelas` bigint UNSIGNED DEFAULT NULL,
  `id_pelajaran` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` mediumtext COLLATE utf8mb4_unicode_ci,
  `pertemuan_ke` tinyint DEFAULT NULL,
  `status` enum('draft','saved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_tahun_ajaran`, `id_guru`, `id_kelas`, `id_pelajaran`, `tanggal`, `judul`, `deskripsi`, `pertemuan_ke`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2024-04-26', 'Absensi Kelas X IPA 1 Pelajaran KIMIA', 'perkenalan', 1, 'saved', '2024-04-27 00:36:35', '2024-04-27 00:39:01'),
(2, 1, 1, 1, 1, '2024-04-24', 'Absensi Kelas X IPA 1 Pelajaran KIMIA', 'test', 2, 'saved', '2024-04-27 00:39:19', '2024-04-27 00:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_siswa`
--

CREATE TABLE `absensi_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_absensi` bigint UNSIGNED DEFAULT NULL,
  `id_siswa` bigint UNSIGNED DEFAULT NULL,
  `status` enum('hadir','izin','sakit','alpa') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'alpa',
  `keterangan` mediumtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absensi_siswa`
--

INSERT INTO `absensi_siswa` (`id`, `id_absensi`, `id_siswa`, `status`, `keterangan`) VALUES
(1, 1, 1, 'hadir', NULL),
(2, 1, 2, 'izin', NULL),
(3, 1, 3, 'sakit', NULL),
(4, 1, 4, 'alpa', NULL),
(5, 1, 5, 'sakit', NULL),
(6, 1, 6, 'izin', NULL),
(7, 1, 7, 'hadir', NULL),
(8, 1, 8, 'hadir', NULL),
(9, 1, 9, 'hadir', NULL),
(10, 1, 10, 'hadir', NULL),
(11, 1, 11, 'hadir', NULL),
(12, 1, 12, 'hadir', NULL),
(13, 1, 13, 'hadir', NULL),
(14, 1, 14, 'hadir', NULL),
(15, 1, 15, 'hadir', NULL),
(16, 1, 16, 'hadir', NULL),
(17, 1, 17, 'hadir', NULL),
(18, 1, 18, 'hadir', NULL),
(19, 1, 19, 'hadir', NULL),
(20, 2, 1, 'hadir', NULL),
(21, 2, 2, 'hadir', NULL),
(22, 2, 3, 'hadir', NULL),
(23, 2, 4, 'hadir', NULL),
(24, 2, 5, 'hadir', NULL),
(25, 2, 6, 'hadir', NULL),
(26, 2, 7, 'hadir', NULL),
(27, 2, 8, 'hadir', NULL),
(28, 2, 9, 'hadir', NULL),
(29, 2, 10, 'hadir', NULL),
(30, 2, 11, 'hadir', NULL),
(31, 2, 12, 'hadir', NULL),
(32, 2, 13, 'hadir', NULL),
(33, 2, 14, 'hadir', NULL),
(34, 2, 15, 'hadir', NULL),
(35, 2, 16, 'hadir', NULL),
(36, 2, 17, 'hadir', NULL),
(37, 2, 18, 'hadir', NULL),
(38, 2, 19, 'hadir', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nuptk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nama`, `nip`, `nuptk`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`) VALUES
(1, 2, 'Martin Mulyo Syahidin', '1234567', '12345', 'Bengkulu', '2024-04-24', 'L', 'Islam', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru_pelajaran`
--

CREATE TABLE `guru_pelajaran` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tahun_ajaran` bigint UNSIGNED NOT NULL,
  `id_guru` bigint UNSIGNED NOT NULL,
  `id_pelajaran` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_pelajaran`
--

INSERT INTO `guru_pelajaran` (`id`, `id_tahun_ajaran`, `id_guru`, `id_pelajaran`) VALUES
(1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `guru_pelajaran_kelas`
--

CREATE TABLE `guru_pelajaran_kelas` (
  `id_guru_pelajaran` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru_pelajaran_kelas`
--

INSERT INTO `guru_pelajaran_kelas` (`id_guru_pelajaran`, `id_kelas`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id`, `nama`) VALUES
(1, 'IPA'),
(2, 'IPS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `id_jurusan` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `id_jurusan`, `nama`, `tingkat`) VALUES
(1, 1, 'X IPA 1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswa`
--

CREATE TABLE `kelas_siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tahun_ajaran` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `id_siswa` bigint UNSIGNED NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas_siswa`
--

INSERT INTO `kelas_siswa` (`id`, `id_tahun_ajaran`, `id_kelas`, `id_siswa`, `aktif`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 2, 1),
(3, 1, 1, 3, 1),
(4, 1, 1, 4, 1),
(5, 1, 1, 5, 1),
(6, 1, 1, 6, 1),
(7, 1, 1, 7, 1),
(8, 1, 1, 8, 1),
(9, 1, 1, 9, 1),
(10, 1, 1, 10, 1),
(11, 1, 1, 11, 1),
(12, 1, 1, 12, 1),
(13, 1, 1, 13, 1),
(14, 1, 1, 14, 1),
(15, 1, 1, 15, 1),
(16, 1, 1, 16, 1),
(17, 1, 1, 17, 1),
(18, 1, 1, 18, 1),
(19, 1, 1, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversions_disk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` bigint UNSIGNED NOT NULL,
  `manipulations` json NOT NULL,
  `custom_properties` json NOT NULL,
  `generated_conversions` json NOT NULL,
  `responsive_images` json NOT NULL,
  `order_column` int UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_01_142402_add_role_column_to_users_table', 1),
(6, '2023_06_01_214138_create_jurusans_table', 1),
(7, '2023_06_01_215430_create_kelas_table', 1),
(8, '2023_06_01_221420_create_tahun_ajarans_table', 1),
(9, '2023_06_01_224048_create_gurus_table', 1),
(10, '2023_06_01_235722_create_wali_kelas_table', 1),
(11, '2023_06_02_005051_create_siswas_table', 1),
(12, '2023_06_02_012354_create_kelas_siswas_table', 1),
(13, '2023_06_02_024156_create_pelajarans_table', 1),
(14, '2023_06_02_030424_create_guru_pelajarans_table', 1),
(15, '2023_06_02_041802_create_absensis_table', 1),
(16, '2023_06_02_042018_create_absensi_siswas_table', 1),
(17, '2023_06_02_102537_remove_id_kelas_from_guru_pelajaran_table', 1),
(18, '2023_06_02_102548_create_guru_pelajaran_kelas_table', 1),
(19, '2023_06_02_115123_add_id_pelajaran_column_to_absensi_table', 1),
(20, '2023_06_02_170757_create_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tingkat` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('umum','jurusan') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id`, `nama`, `tingkat`, `jenis`) VALUES
(1, 'KIMIA', '1', 'jurusan');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nisn` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `nama`, `nis`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Tami Maria Usamah S.T.', '65612', '8589878665', 'Sawahlunto', '2009-08-11', 'L', 'Kristen', 'Psr. Merdeka No. 308, Pekanbaru 54496, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(2, 'Putri Nilam Sudiati', '25524', '3993580818', 'Sabang', '1983-06-16', 'P', 'Konghucu', 'Psr. Supono No. 937, Batu 30570, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(3, 'Elvina Vanesa Mandasari M.Pd', '10430', '1781886348', 'Pariaman', '2006-12-19', 'L', 'Konghucu', 'Ds. Baiduri No. 207, Batu 60450, Kalsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(4, 'Aditya Setiawan', '93167', '9904365454', 'Cilegon', '2019-05-23', 'L', 'Hindu', 'Ki. Jamika No. 407, Pasuruan 41006, Kalteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(5, 'Asirwanda Setiawan', '74388', '8779674686', 'Tangerang', '2020-02-22', 'P', 'Hindu', 'Jr. Ikan No. 484, Solok 41041, Riau', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(6, 'Endah Mulyani', '98055', '3811329255', 'Sungai Penuh', '2006-05-13', 'P', 'Islam', 'Kpg. Yos No. 78, Bima 17200, Jabar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(7, 'Arsipatra Rajata', '19342', '9433050594', 'Sukabumi', '1993-12-19', 'L', 'Kristen', 'Kpg. Gading No. 187, Batu 74618, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(8, 'Lanang Nashiruddin', '15072', '2410873358', 'Kotamobagu', '1996-08-13', 'L', 'Islam', 'Ki. Astana Anyar No. 881, Administrasi Jakarta Pusat 50900, Kepri', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(9, 'Kamaria Cici Nurdiyanti', '69733', '5787301297', 'Bima', '2006-07-02', 'P', 'Konghucu', 'Ds. Suryo Pranoto No. 288, Metro 94186, Jateng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(10, 'Rendy Hutapea', '42211', '3337146587', 'Jayapura', '2019-10-28', 'L', 'Islam', 'Psr. Baranang No. 377, Pematangsiantar 45472, Lampung', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(11, 'Vicky Andriani', '64955', '9777966476', 'Bandar Lampung', '2017-12-08', 'P', 'Katolik', 'Dk. Nangka No. 234, Tasikmalaya 68470, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(12, 'Mutia Uli Purnawati S.Farm', '91275', '7034564394', 'Bau-Bau', '1992-03-27', 'P', 'Konghucu', 'Dk. Ahmad Dahlan No. 149, Salatiga 52251, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(13, 'Lintang Usada S.E.I', '21506', '7493572061', 'Makassar', '2016-10-22', 'L', 'Budha', 'Jln. W.R. Supratman No. 445, Palembang 23284, Kalteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(14, 'Labuh Gatra Nababan S.Psi', '25090', '9995920368', 'Langsa', '1985-02-17', 'P', 'Hindu', 'Gg. Bagonwoto  No. 701, Subulussalam 32477, Papua', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(15, 'Gambira Wasita S.Ked', '78691', '8482905814', 'Pekalongan', '2004-01-23', 'P', 'Kristen', 'Jr. W.R. Supratman No. 963, Kendari 32654, DIY', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(16, 'Aisyah Lestari', '73196', '8288181574', 'Salatiga', '1978-04-28', 'L', 'Katolik', 'Ds. Cut Nyak Dien No. 573, Bandung 16000, Papua', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(17, 'Bahuwarna Pranowo', '14587', '9377884578', 'Administrasi Jakarta Barat', '1988-07-23', 'L', 'Budha', 'Ki. Eka No. 817, Pariaman 55405, Sulbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(18, 'Lalita Yulianti', '17238', '8909260223', 'Sukabumi', '1973-03-12', 'P', 'Katolik', 'Jln. Pattimura No. 4, Tangerang 78434, Babel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(19, 'Dasa Megantara S.Pd', '80801', '5888406503', 'Subulussalam', '1974-01-27', 'P', 'Katolik', 'Jln. Ujung No. 38, Probolinggo 64792, Lampung', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(20, 'Luthfi Hartana Simbolon S.IP', '39801', '2701643022', 'Surakarta', '1994-11-09', 'L', 'Islam', 'Psr. Yogyakarta No. 533, Pontianak 27755, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(21, 'Rina Mulyani', '62379', '5678129881', 'Bukittinggi', '1972-06-02', 'L', 'Konghucu', 'Dk. Veteran No. 274, Medan 42499, Sulteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(22, 'Tasdik Utama Siregar S.Pd', '85767', '6897018003', 'Kendari', '1977-03-08', 'L', 'Kristen', 'Gg. Yogyakarta No. 248, Pekalongan 80317, Bali', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(23, 'Satya Najmudin S.Pt', '78343', '1224996219', 'Tanjung Pinang', '2019-11-05', 'P', 'Kristen', 'Jln. Babah No. 94, Ambon 50918, Sumsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(24, 'Candra Wisnu Santoso', '97963', '9848811827', 'Subulussalam', '1974-03-21', 'L', 'Budha', 'Ds. Wora Wari No. 764, Blitar 58812, Lampung', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(25, 'Jane Talia Prastuti', '14839', '1632186855', 'Gorontalo', '1985-01-17', 'P', 'Hindu', 'Ki. Mahakam No. 813, Ambon 22302, Jabar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(26, 'Rini Zelda Melani S.Gz', '86569', '2039089996', 'Padangpanjang', '2006-08-01', 'P', 'Islam', 'Psr. Ekonomi No. 382, Samarinda 64835, Aceh', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(27, 'Keisha Suryatmi', '26436', '2456636698', 'Gorontalo', '1998-08-25', 'P', 'Katolik', 'Jr. Ekonomi No. 959, Bau-Bau 47467, DKI', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(28, 'Salsabila Tania Yulianti M.TI.', '26213', '3206013519', 'Administrasi Jakarta Utara', '1972-09-01', 'P', 'Hindu', 'Gg. Balikpapan No. 342, Banjarmasin 21756, Papua', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(29, 'Karman Kuswoyo', '82449', '7063712968', 'Tidore Kepulauan', '2012-06-10', 'P', 'Islam', 'Jln. K.H. Maskur No. 291, Administrasi Jakarta Pusat 27864, Lampung', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(30, 'Hamima Aurora Riyanti', '71594', '1666673988', 'Banda Aceh', '1986-03-01', 'L', 'Katolik', 'Jr. Kali No. 895, Tegal 11216, DKI', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(31, 'Karja Wadi Adriansyah M.TI.', '10552', '6602132268', 'Kupang', '2019-11-18', 'P', 'Katolik', 'Gg. Zamrud No. 972, Metro 29995, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(32, 'Warta Prasetya', '53428', '3177473205', 'Magelang', '1979-02-16', 'P', 'Kristen', 'Jln. Mahakam No. 272, Medan 21209, Gorontalo', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(33, 'Nasim Dalimin Mandala S.Kom', '59382', '4499891770', 'Banjar', '2009-02-07', 'P', 'Hindu', 'Psr. Dewi Sartika No. 108, Batam 60605, Sultra', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(34, 'Unjani Usada M.Farm', '82419', '5727592178', 'Pasuruan', '2020-01-13', 'P', 'Kristen', 'Jr. Warga No. 48, Pangkal Pinang 62479, Aceh', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(35, 'Jaya Balijan Situmorang', '58540', '4226230796', 'Banjarmasin', '1981-09-13', 'P', 'Budha', 'Ds. Labu No. 540, Kupang 50799, Lampung', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(36, 'Respati Ardianto', '62359', '2284650218', 'Bima', '1990-07-08', 'P', 'Hindu', 'Ds. Cemara No. 392, Kediri 57355, Jabar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(37, 'Carla Talia Purnawati M.Kom.', '81623', '4344306881', 'Lubuklinggau', '1975-07-06', 'P', 'Islam', 'Kpg. Qrisdoren No. 707, Tarakan 77603, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(38, 'Vanesa Anggraini', '49105', '4270636365', 'Banjarmasin', '2015-05-03', 'P', 'Katolik', 'Kpg. Samanhudi No. 792, Sibolga 81454, Malut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(39, 'Samsul Utama', '67925', '7362239660', 'Subulussalam', '1973-11-29', 'L', 'Islam', 'Ki. Laksamana No. 984, Solok 40709, Sulteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(40, 'Safina Fujiati', '22681', '4483938658', 'Padangsidempuan', '1983-10-23', 'L', 'Hindu', 'Ds. Nakula No. 132, Sukabumi 22728, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(41, 'Nardi Maheswara', '49377', '6554427392', 'Prabumulih', '2005-10-28', 'L', 'Hindu', 'Ki. Elang No. 291, Padang 33606, Riau', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(42, 'Damu Luwar Waluyo S.Kom', '25164', '4865035055', 'Semarang', '2004-07-10', 'L', 'Budha', 'Dk. Ikan No. 816, Administrasi Jakarta Utara 90999, Riau', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(43, 'Ellis Suryatmi S.Pt', '83477', '6273307151', 'Sukabumi', '1978-09-27', 'L', 'Islam', 'Psr. Bahagia  No. 187, Tanjungbalai 81051, Sulbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(44, 'Jasmin Wahyuni', '88853', '8502736336', 'Bandar Lampung', '1996-09-29', 'P', 'Kristen', 'Ki. Honggowongso No. 825, Bandung 41761, Sumut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(45, 'Gambira Prakasa', '73895', '5222114198', 'Cilegon', '1992-10-21', 'L', 'Kristen', 'Ki. Radio No. 555, Lubuklinggau 38221, Babel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(46, 'Rahmi Pratiwi', '23353', '5145057588', 'Depok', '2022-06-12', 'P', 'Katolik', 'Jln. Suryo Pranoto No. 142, Tangerang Selatan 42533, Sulbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(47, 'Nasrullah Pangestu', '89043', '1823924747', 'Kendari', '1980-12-30', 'L', 'Katolik', 'Ds. Bakau Griya Utama No. 993, Surabaya 35754, Kaltara', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(48, 'Raihan Widodo', '28435', '1510706571', 'Pematangsiantar', '2016-02-07', 'L', 'Budha', 'Kpg. Pasir Koja No. 62, Gorontalo 17763, Kalbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(49, 'Jono Soleh Nababan', '41484', '3047437652', 'Bekasi', '1987-05-24', 'L', 'Budha', 'Jr. Untung Suropati No. 908, Probolinggo 41331, DIY', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(50, 'Queen Safitri', '32033', '6643453993', 'Padangpanjang', '2014-03-02', 'P', 'Konghucu', 'Ds. Uluwatu No. 441, Tanjungbalai 47099, Sumut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(51, 'Tiara Fujiati', '45769', '2486635754', 'Tarakan', '2021-05-20', 'L', 'Kristen', 'Jln. Sukajadi No. 299, Tanjungbalai 29660, Kalteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(52, 'Ani Aryani', '43790', '3752014330', 'Sawahlunto', '2017-09-06', 'L', 'Hindu', 'Dk. Babakan No. 249, Metro 17535, NTB', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(53, 'Estiono Simanjuntak', '79144', '2561001966', 'Makassar', '2007-08-24', 'L', 'Hindu', 'Psr. Muwardi No. 171, Blitar 96770, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(54, 'Febi Padmasari S.Ked', '73331', '5898333097', 'Denpasar', '2022-01-04', 'P', 'Islam', 'Jr. Basoka Raya No. 397, Administrasi Jakarta Pusat 83983, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(55, 'Jelita Dinda Pudjiastuti S.Sos', '41433', '2629325382', 'Tasikmalaya', '1971-02-05', 'L', 'Kristen', 'Gg. Cihampelas No. 224, Padangsidempuan 49777, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(56, 'Rafid Kunthara Halim', '63989', '2473437597', 'Jambi', '1986-01-26', 'P', 'Budha', 'Ds. Kyai Mojo No. 297, Banjar 17087, Jatim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(57, 'Johan Hidayat', '18993', '3295500119', 'Pontianak', '1980-09-19', 'P', 'Kristen', 'Jr. Pasteur No. 408, Pangkal Pinang 36160, Bengkulu', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(58, 'Catur Pradana', '84086', '7720748614', 'Sawahlunto', '1970-11-30', 'L', 'Katolik', 'Gg. Baing No. 306, Banda Aceh 76393, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(59, 'Kenzie Sabar Rajasa S.Kom', '72770', '8046966539', 'Ambon', '1977-09-10', 'L', 'Kristen', 'Kpg. Babadak No. 455, Tual 52116, Pabar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(60, 'Purwadi Putu Tampubolon S.Sos', '15112', '3191970266', 'Tomohon', '2022-01-17', 'P', 'Katolik', 'Jln. Sugiyopranoto No. 313, Bogor 67438, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(61, 'Vanesa Sudiati M.Farm', '57522', '6056853295', 'Kediri', '1983-06-15', 'L', 'Hindu', 'Jln. Bayam No. 664, Bandar Lampung 47379, Kaltara', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(62, 'Dian Usamah', '55730', '7940061735', 'Administrasi Jakarta Timur', '1987-05-30', 'L', 'Hindu', 'Gg. Setiabudhi No. 394, Palembang 85702, Gorontalo', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(63, 'Gading Santoso', '54195', '9899890867', 'Malang', '2013-06-04', 'L', 'Islam', 'Psr. Jend. A. Yani No. 222, Pasuruan 23096, Sumbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(64, 'Juli Nabila Hastuti S.Psi', '66958', '6195082172', 'Depok', '1975-03-29', 'L', 'Konghucu', 'Ds. Pahlawan No. 469, Bogor 95731, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(65, 'Gatot Gandi Natsir', '74778', '8052887056', 'Administrasi Jakarta Barat', '2004-11-26', 'P', 'Islam', 'Kpg. Yogyakarta No. 663, Parepare 53391, Gorontalo', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(66, 'Jagaraga Haryanto', '59212', '7221903441', 'Sorong', '2009-12-11', 'L', 'Hindu', 'Psr. Balikpapan No. 249, Palu 50256, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(67, 'Jaiman Saputra S.Gz', '90942', '8270694547', 'Banjarbaru', '2006-07-24', 'L', 'Budha', 'Ki. Bakau Griya Utama No. 168, Batu 62485, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(68, 'Mala Usada', '42166', '3378529747', 'Bekasi', '2015-08-06', 'P', 'Hindu', 'Jr. Bacang No. 826, Ambon 62101, Jabar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(69, 'Michelle Nadia Handayani S.Pt', '42993', '8323995380', 'Solok', '2020-04-30', 'P', 'Hindu', 'Jr. Pattimura No. 899, Malang 72804, Aceh', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(70, 'Upik Prasetyo', '90993', '9318263165', 'Manado', '1976-04-28', 'P', 'Kristen', 'Psr. Nanas No. 449, Sibolga 16390, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(71, 'Aditya Kurniawan S.Pd', '76275', '4516632426', 'Probolinggo', '1987-08-08', 'L', 'Islam', 'Psr. Bak Air No. 361, Tangerang Selatan 69680, Aceh', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(72, 'Febi Suartini', '50384', '9080706385', 'Singkawang', '1970-07-18', 'P', 'Konghucu', 'Dk. Imam No. 146, Bima 56187, Sumut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(73, 'Mutia Yuniar S.Sos', '76126', '3083103145', 'Ambon', '2002-04-04', 'P', 'Kristen', 'Ki. Baik No. 432, Padang 27439, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(74, 'Dalima Farida M.Kom.', '62502', '7120427272', 'Administrasi Jakarta Selatan', '1996-10-07', 'P', 'Kristen', 'Ki. Acordion No. 32, Singkawang 96630, Sumbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(75, 'Aisyah Laksmiwati', '85277', '6466900083', 'Bandar Lampung', '2017-04-21', 'L', 'Konghucu', 'Ki. Kiaracondong No. 512, Tasikmalaya 69787, Kalbar', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(76, 'Padmi Cici Wijayanti S.E.', '73394', '8315895498', 'Surakarta', '1974-03-09', 'L', 'Katolik', 'Ds. Halim No. 985, Payakumbuh 18598, Jateng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(77, 'Padma Nadine Nurdiyanti', '67824', '7074861742', 'Prabumulih', '2009-01-11', 'P', 'Hindu', 'Jr. Bacang No. 513, Padangpanjang 88582, Maluku', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(78, 'Gatot Hardana Dabukke S.Kom', '18838', '6083456899', 'Batu', '2009-12-15', 'L', 'Kristen', 'Dk. Jamika No. 711, Batu 48362, Sulsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(79, 'Anggabaya Irsad Permadi', '19811', '4521240623', 'Banjarmasin', '2012-08-19', 'L', 'Kristen', 'Psr. Cut Nyak Dien No. 725, Padangpanjang 63999, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(80, 'Marwata Pranowo', '35574', '7094496779', 'Bontang', '2019-12-22', 'L', 'Konghucu', 'Jln. Wahid No. 415, Tegal 90307, Banten', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(81, 'Hamima Andriani M.Pd', '68972', '5788194446', 'Administrasi Jakarta Barat', '2011-01-25', 'P', 'Katolik', 'Gg. Lada No. 696, Mojokerto 65668, NTT', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(82, 'Titi Wijayanti', '51419', '5994265965', 'Dumai', '1986-08-25', 'L', 'Hindu', 'Ki. Jend. Sudirman No. 782, Batu 21199, NTB', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(83, 'Zelaya Hilda Fujiati', '13184', '7022797623', 'Sabang', '1977-12-14', 'L', 'Budha', 'Ds. Labu No. 710, Denpasar 15709, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(84, 'Danuja Martaka Nashiruddin', '32188', '6702345313', 'Pekalongan', '1988-11-08', 'P', 'Katolik', 'Gg. Camar No. 988, Samarinda 54863, Banten', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(85, 'Jail Eja Firgantoro', '45348', '2708900175', 'Batam', '1998-06-01', 'L', 'Hindu', 'Psr. Cemara No. 958, Padang 99853, Bali', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(86, 'Harsanto Natsir', '68852', '6946318146', 'Ternate', '2006-09-01', 'L', 'Konghucu', 'Dk. Salak No. 906, Pasuruan 60133, Kepri', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(87, 'Kawaca Jumadi Dabukke', '71303', '3235817758', 'Bitung', '2022-07-15', 'P', 'Katolik', 'Jln. S. Parman No. 229, Bandung 46703, Sumsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(88, 'Banawa Hutagalung', '57078', '8791133147', 'Bau-Bau', '2015-01-09', 'P', 'Hindu', 'Kpg. Bambu No. 709, Subulussalam 43078, Kepri', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(89, 'Diah Uyainah M.Pd', '75337', '8410529179', 'Manado', '2002-08-28', 'L', 'Konghucu', 'Ds. Untung Suropati No. 145, Solok 22756, Kaltim', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(90, 'Jayeng Pratama', '18698', '2951476282', 'Cilegon', '2017-04-13', 'P', 'Budha', 'Dk. Salak No. 195, Gorontalo 23603, Sulut', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(91, 'Puji Rahmi Yulianti', '23113', '4330005852', 'Padangpanjang', '1995-05-07', 'P', 'Konghucu', 'Ki. Basuki No. 958, Tidore Kepulauan 82718, Jateng', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(92, 'Fitriani Suartini', '69703', '8721222433', 'Tangerang', '2002-01-30', 'P', 'Katolik', 'Ki. Adisumarmo No. 178, Tangerang Selatan 16192, Sumsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(93, 'Tina Prastuti', '27571', '1395978865', 'Sibolga', '1979-02-10', 'L', 'Kristen', 'Gg. HOS. Cjokroaminoto (Pasirkaliki) No. 851, Tangerang Selatan 33838, Maluku', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(94, 'Janet Hasanah', '87173', '3498636061', 'Kendari', '1992-10-10', 'P', 'Islam', 'Jln. Badak No. 522, Denpasar 59408, Kepri', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(95, 'Eman Manah Gunawan S.E.I', '79091', '2082651084', 'Probolinggo', '1990-06-26', 'P', 'Islam', 'Psr. Pacuan Kuda No. 754, Tanjung Pinang 25553, Banten', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(96, 'Hana Yolanda', '26859', '2495471040', 'Kupang', '1976-04-30', 'P', 'Budha', 'Jr. Villa No. 735, Cirebon 80594, Papua', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(97, 'Sari Susanti', '42484', '7555599565', 'Kupang', '1970-08-24', 'P', 'Katolik', 'Gg. Dewi Sartika No. 555, Palangka Raya 66444, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(98, 'Labuh Dariati Maulana S.Farm', '88993', '6324679475', 'Subulussalam', '2017-01-24', 'L', 'Budha', 'Jln. Umalas No. 433, Madiun 12438, Kalsel', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(99, 'Gandi Suwarno', '92980', '3094477865', 'Mataram', '1970-02-19', 'L', 'Katolik', 'Kpg. Babah No. 976, Gunungsitoli 46032, Jambi', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(100, 'Suci Yessi Hartati S.Pd', '85863', '6945999115', 'Semarang', '2012-05-19', 'P', 'Budha', 'Gg. Bambu No. 767, Sawahlunto 62767, Kalteng', '2024-04-27 00:30:35', '2024-04-27 00:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_mulai` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `semester`, `tanggal_mulai`, `tanggal_selesai`, `aktif`, `created_at`, `updated_at`) VALUES
(1, '2023/2024', '1', '2024-01-01', '2024-06-30', 1, '2024-04-27 00:32:00', '2024-04-27 00:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','siswa','guru','wali_murid') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@local.test', 'admin', '2024-04-27 00:30:35', '$2y$10$E4FO8VS8zNXHaDqQ7vIlyOA/8DdjTQIJg5cqJIiIckUSaOEfEIYaG', 'admin', 'BdtRrz79MZiccXFD3tVXr4OEO29Xwo1mngpMSLOHlQmhuadpLsp8b6y00s1A', '2024-04-27 00:30:35', '2024-04-27 00:30:35'),
(2, 'Martin Mulyo Syahidin', 'martinms@gmail.com', 'martinms', NULL, '$2y$10$FtzhL/Wt.GNsFZa7YSp2C.ddLSpjYQX5Ifz6dt48fXQD1OM4Eh5Ee', 'guru', NULL, '2024-04-27 00:35:02', '2024-04-27 00:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `wali_kelas`
--

CREATE TABLE `wali_kelas` (
  `id` bigint UNSIGNED NOT NULL,
  `id_tahun_ajaran` bigint UNSIGNED NOT NULL,
  `id_kelas` bigint UNSIGNED NOT NULL,
  `id_guru` bigint UNSIGNED NOT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wali_kelas`
--

INSERT INTO `wali_kelas` (`id`, `id_tahun_ajaran`, `id_kelas`, `id_guru`, `aktif`) VALUES
(1, 1, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_id_tahun_ajaran_foreign` (`id_tahun_ajaran`),
  ADD KEY `absensi_id_guru_foreign` (`id_guru`),
  ADD KEY `absensi_id_kelas_foreign` (`id_kelas`),
  ADD KEY `absensi_id_pelajaran_foreign` (`id_pelajaran`);

--
-- Indexes for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absensi_siswa_id_absensi_foreign` (`id_absensi`),
  ADD KEY `absensi_siswa_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_user_id_foreign` (`user_id`);

--
-- Indexes for table `guru_pelajaran`
--
ALTER TABLE `guru_pelajaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_pelajaran_id_tahun_ajaran_foreign` (`id_tahun_ajaran`),
  ADD KEY `guru_pelajaran_id_guru_foreign` (`id_guru`),
  ADD KEY `guru_pelajaran_id_pelajaran_foreign` (`id_pelajaran`);

--
-- Indexes for table `guru_pelajaran_kelas`
--
ALTER TABLE `guru_pelajaran_kelas`
  ADD KEY `guru_pelajaran_kelas_id_guru_pelajaran_foreign` (`id_guru_pelajaran`),
  ADD KEY `guru_pelajaran_kelas_id_kelas_foreign` (`id_kelas`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id_jurusan_foreign` (`id_jurusan`);

--
-- Indexes for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswa_id_tahun_ajaran_foreign` (`id_tahun_ajaran`),
  ADD KEY `kelas_siswa_id_kelas_foreign` (`id_kelas`),
  ADD KEY `kelas_siswa_id_siswa_foreign` (`id_siswa`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `media_order_column_index` (`order_column`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_nis_unique` (`nis`),
  ADD UNIQUE KEY `siswa_nisn_unique` (`nisn`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wali_kelas_id_tahun_ajaran_foreign` (`id_tahun_ajaran`),
  ADD KEY `wali_kelas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `wali_kelas_id_guru_foreign` (`id_guru`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru_pelajaran`
--
ALTER TABLE `guru_pelajaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi`
--
ALTER TABLE `absensi`
  ADD CONSTRAINT `absensi_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_id_pelajaran_foreign` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `absensi_siswa`
--
ALTER TABLE `absensi_siswa`
  ADD CONSTRAINT `absensi_siswa_id_absensi_foreign` FOREIGN KEY (`id_absensi`) REFERENCES `absensi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absensi_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru_pelajaran`
--
ALTER TABLE `guru_pelajaran`
  ADD CONSTRAINT `guru_pelajaran_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_pelajaran_id_pelajaran_foreign` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_pelajaran_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru_pelajaran_kelas`
--
ALTER TABLE `guru_pelajaran_kelas`
  ADD CONSTRAINT `guru_pelajaran_kelas_id_guru_pelajaran_foreign` FOREIGN KEY (`id_guru_pelajaran`) REFERENCES `guru_pelajaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_pelajaran_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_siswa`
--
ALTER TABLE `kelas_siswa`
  ADD CONSTRAINT `kelas_siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_siswa_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wali_kelas`
--
ALTER TABLE `wali_kelas`
  ADD CONSTRAINT `wali_kelas_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wali_kelas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wali_kelas_id_tahun_ajaran_foreign` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
