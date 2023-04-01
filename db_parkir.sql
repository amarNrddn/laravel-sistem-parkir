-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2021 at 09:08 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_parkiran`
-- (See below for the actual view)
--
CREATE TABLE `laporan_parkiran` (
`id` int(10) unsigned
,`code` varchar(64)
,`plat_nomor` varchar(7)
,`jenis_kendaraan` varchar(255)
,`jam_masuk` time
,`jam_keluar` time
,`tgl_masuk` date
,`tgl_keluar` date
,`total` int(50)
,`bayar` int(50)
,`kembalian` int(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2021_04_14_000000_create_users_table', 1),
(11, '2021_04_14_100000_create_password_resets_table', 1),
(12, '2021_04_14_081552_create_parkir_masuk_table', 1),
(13, '2021_04_14_120219_create_tarif', 1),
(14, '2021_04_14_064828_stok__parkir', 2);

-- --------------------------------------------------------

--
-- Table structure for table `parkir_keluar`
--

CREATE TABLE `parkir_keluar` (
  `id` int(10) NOT NULL,
  `code` varchar(64) DEFAULT NULL,
  `plat_nomor` varchar(7) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `jam_keluar` time NOT NULL,
  `tgl_keluar` date NOT NULL,
  `total` int(50) NOT NULL,
  `bayar` int(50) NOT NULL,
  `kembalian` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parkir_keluar`
--

INSERT INTO `parkir_keluar` (`id`, `code`, `plat_nomor`, `jenis_kendaraan`, `jam_keluar`, `tgl_keluar`, `total`, `bayar`, `kembalian`) VALUES
(19, 'PKR-041920', 'B8329YU', 'Motor', '22:25:43', '2021-04-14', 3000, 3000, 0),
(20, 'AG768KY', 'AG768KY', 'Mobil', '22:37:32', '2021-04-14', 3000, 10000, 7000),
(21, 'AE86GUE', 'AE86GUE', 'Mobil', '23:18:12', '2021-04-14', 6000, 10000, 4000),
(22, 'PKR-0414996', 'B7384HJ', 'Mobil', '13:10:38', '2021-04-15', 45000, 50000, 5000),
(23, 'PKR-0414250', 'B7282HH', 'Motor', '23:37:40', '2021-04-14', 3000, 3000, 0);

--
-- Triggers `parkir_keluar`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `parkir_keluar` FOR EACH ROW BEGIN
UPDATE stok_parkir 
SET stok = stok + 1
WHERE jenis_kendaraan = New.jenis_kendaraan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `parkir_masuk`
--

CREATE TABLE `parkir_masuk` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `plat_nomor` varchar(7) COLLATE utf8_unicode_ci NOT NULL,
  `jenis_kendaraan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jam_masuk` time NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parkir_masuk`
--

INSERT INTO `parkir_masuk` (`id`, `code`, `plat_nomor`, `jenis_kendaraan`, `jam_masuk`, `tgl_masuk`) VALUES
(19, 'PKR-0414374', 'B8329YU', 'Motor', '21:53:41', '2021-04-14'),
(20, 'PKR-0414508', 'AG768KY', 'Mobil', '21:55:39', '2021-04-14'),
(21, 'PKR-0414754', 'AE86GUE', 'Mobil', '21:56:05', '2021-04-14'),
(22, 'PKR-0414996', 'B7384HJ', 'Mobil', '22:06:54', '2021-04-14'),
(23, 'PKR-0414250', 'B7282HH', 'Motor', '23:17:34', '2021-04-14'),
(24, 'PKR-0414979', 'H8293GH', 'Mobil', '23:35:40', '2021-04-14'),
(25, 'PKR-0414575', 'L7364JJ', 'Motor', '23:36:12', '2021-04-14'),
(26, 'PKR-0415286', 'L892TRR', 'Mobil', '14:07:04', '2021-04-15');

--
-- Triggers `parkir_masuk`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `parkir_masuk` FOR EACH ROW BEGIN
UPDATE stok_parkir 
SET stok = stok - 1
WHERE jenis_kendaraan = New.jenis_kendaraan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_parkir`
--

CREATE TABLE `stok_parkir` (
  `id` int(10) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_kendaraan` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stok_parkir`
--

INSERT INTO `stok_parkir` (`id`, `stok`, `jenis_kendaraan`) VALUES
(1, 29, 'Mobil'),
(2, 49, 'Motor');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id` int(10) UNSIGNED NOT NULL,
  `tarif` int(11) NOT NULL,
  `jenis_kendaraan` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id`, `tarif`, `jenis_kendaraan`) VALUES
(2, 3000, 'Mobil'),
(6, 3000, 'Motor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_user`, `no_telp`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jhulang', '02888319', 'jhulang@gmail.com', '$2y$10$HkquboLDS5.WTaXgKS7nf.C2pn8CcWMjskTYmWlLW0p78reu1ZuYG', 'Admin', 'hnjzs0KB8yC63BGhsGsoJczWnNEykMQDx6CA3lcGqnLLzlK0cW81umJSCzU0', '2021-04-13 20:10:04', '2021-04-13 20:10:04'),
(2, 'TRIAL', '08193837434', 'trial@trial.trial', '$2y$10$GreA17TZq96pojsKUWAmdepesuSQgPu866Dy3xSuQTlb9/zliibJq', 'User', 'yYOq6GCXGgBF5W0jdrHGgf1FOlUpmhhBFcvG8Vej5EPzvwfp4eel2m0a4ppG', '2021-04-13 07:00:36', '2021-04-13 07:00:36');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_parkiran`
-- (See below for the actual view)
--
CREATE TABLE `v_parkiran` (
`id` int(10) unsigned
,`plat_nomor` varchar(7)
,`jenis_kendaraan` varchar(255)
,`tgl_masuk` date
,`tgl_keluar` date
,`total` int(50)
,`bayar` int(50)
,`kembalian` int(50)
);

-- --------------------------------------------------------

--
-- Structure for view `laporan_parkiran`
--
DROP TABLE IF EXISTS `laporan_parkiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_parkiran`  AS  select `parkir_masuk`.`id` AS `id`,`parkir_masuk`.`code` AS `code`,`parkir_masuk`.`plat_nomor` AS `plat_nomor`,`parkir_masuk`.`jenis_kendaraan` AS `jenis_kendaraan`,`parkir_masuk`.`jam_masuk` AS `jam_masuk`,`parkir_keluar`.`jam_keluar` AS `jam_keluar`,`parkir_masuk`.`tgl_masuk` AS `tgl_masuk`,`parkir_keluar`.`tgl_keluar` AS `tgl_keluar`,`parkir_keluar`.`total` AS `total`,`parkir_keluar`.`bayar` AS `bayar`,`parkir_keluar`.`kembalian` AS `kembalian` from (`parkir_masuk` join `parkir_keluar` on(`parkir_masuk`.`id` = `parkir_keluar`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_parkiran`
--
DROP TABLE IF EXISTS `v_parkiran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_parkiran`  AS  select `parkir_masuk`.`id` AS `id`,`parkir_masuk`.`plat_nomor` AS `plat_nomor`,`parkir_masuk`.`jenis_kendaraan` AS `jenis_kendaraan`,`parkir_masuk`.`tgl_masuk` AS `tgl_masuk`,`parkir_keluar`.`tgl_keluar` AS `tgl_keluar`,`parkir_keluar`.`total` AS `total`,`parkir_keluar`.`bayar` AS `bayar`,`parkir_keluar`.`kembalian` AS `kembalian` from (`parkir_masuk` join `parkir_keluar` on(`parkir_masuk`.`id` = `parkir_keluar`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkir_keluar`
--
ALTER TABLE `parkir_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parkir_masuk`
--
ALTER TABLE `parkir_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `stok_parkir`
--
ALTER TABLE `stok_parkir`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `parkir_keluar`
--
ALTER TABLE `parkir_keluar`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `parkir_masuk`
--
ALTER TABLE `parkir_masuk`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `stok_parkir`
--
ALTER TABLE `stok_parkir`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
