-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2022 at 06:10 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resep`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(4, '2022_03_31_023654_create_obats_table', 2),
(5, '2022_03_31_045641_add_status_to_obats_table', 3),
(6, '2022_03_31_121950_create_signas_table', 4),
(7, '2022_04_01_013250_create_racikans_table', 5),
(8, '2022_04_01_013524_create_nonracikans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `nonracikans`
--

CREATE TABLE `nonracikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nonracikans`
--

INSERT INTO `nonracikans` (`id`, `nama_obat`, `signa`, `qty`, `created_at`, `updated_at`) VALUES
(2, 'Paracetamol', '3 x sehari 0,8', '4', '2022-03-31 19:05:32', '2022-03-31 19:21:13'),
(3, 'Paracetamol', '1 x sehari 0,5ds', '3', '2022-03-31 19:25:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `obats`
--

CREATE TABLE `obats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_obat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obats`
--

INSERT INTO `obats` (`id`, `nama_obat`, `stok`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Paracetamol', '40', '2022-03-31 05:41:55', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `racikans`
--

CREATE TABLE `racikans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_racikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `signa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obat_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `racikans`
--

INSERT INTO `racikans` (`id`, `nama_racikan`, `signa`, `qty`, `obat_id`, `created_at`, `updated_at`) VALUES
(3, 'Obat Sakit Lambungg', '1 x sehari 0,5', '45', 'Paracetamol,Paracetamol', '2022-03-31 19:56:50', '2022-03-31 20:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `signas`
--

CREATE TABLE `signas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `signa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contoh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signas`
--

INSERT INTO `signas` (`id`, `signa`, `contoh`, `created_at`, `updated_at`) VALUES
(1, '1 x sehari 0,5', '', '2022-03-31 05:32:39', NULL),
(2, '1 x sehari 1', '', '2022-03-31 05:33:14', NULL),
(3, '1 x sehari 2', '', '2022-03-31 05:33:19', NULL),
(4, '1 x sehari 3', '', '2022-03-31 05:33:23', NULL),
(5, '2 x sehari 0,5', '', '2022-03-31 05:33:31', NULL),
(6, '2 x sehari 1', '', '2022-03-31 05:33:40', NULL),
(7, '2 x sehari 2', '', '2022-03-31 05:33:48', NULL),
(8, '2 x sehari 3', '', '2022-03-31 05:33:53', NULL),
(9, '3 x sejahari 0,4', '', '2022-03-31 05:34:05', NULL),
(10, '3 x sehari 0,5', '', '2022-03-31 05:34:16', NULL),
(11, '3 x sehari 0,8', '', '2022-03-31 05:34:23', NULL),
(12, '3 x sehari 1', '', '2022-03-31 05:34:32', NULL),
(13, '3 x sehari 2', '', '2022-03-31 05:34:37', NULL),
(14, '3 x sehari 3', '', '2022-03-31 05:34:40', NULL),
(15, '4 x sehari 0,5', '', '2022-03-31 05:34:47', NULL),
(16, '4 x sehari 1', '', '2022-03-31 05:34:52', NULL),
(17, '4 x sehari 2', '', '2022-03-31 05:35:01', NULL),
(19, '4 x sehari 3', '', '2022-03-31 05:43:39', NULL),
(23, '1 x sehari 0,5ds', '2,2,2', '2022-03-31 16:23:37', '2022-03-31 16:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$uTnIosU/eal0ileyiYy4Xe8CRLphbLZgcQltsEzzeHvmA/6mUkiHm', NULL, '2022-03-30 19:26:45', '2022-03-30 19:26:45'),
(2, 'User', 'user@user.com', NULL, 0, '$2y$10$OEkB.xziw5pd.qrbETtN7.UdxeC5nHd1RSpmvlYbRYnL4sWZ.f9Y2', NULL, '2022-03-30 19:26:45', '2022-03-30 19:26:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nonracikans`
--
ALTER TABLE `nonracikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obats`
--
ALTER TABLE `obats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `racikans`
--
ALTER TABLE `racikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signas`
--
ALTER TABLE `signas`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nonracikans`
--
ALTER TABLE `nonracikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `obats`
--
ALTER TABLE `obats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `racikans`
--
ALTER TABLE `racikans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `signas`
--
ALTER TABLE `signas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
