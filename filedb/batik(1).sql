-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2025 at 05:46 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `stok` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama_barang`, `gambar`, `harga`, `stok`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Batik Kajen', 'batik_kajen.jpg', '55000', '88', 'Ukuran batik 2.10 x 1.10', '2019-11-13 09:00:00', '2025-07-03 21:14:36'),
(2, 'Batik Grobogan', 'batik_grobogan.jpg', '60000', '44', 'Ukuran batik 2.10 x 1.10', '2019-11-13 09:00:00', '2025-07-09 07:20:18'),
(3, 'Batik Cikarang', 'batik_cikarang.jpg', '50000', '0', 'Ukuran batik 2.10 x 1.10', '2019-11-13 09:00:00', '2025-06-25 17:21:41'),
(4, 'Batik Jember', 'batik_jember.jpg', '70000', '49', 'Ukuran batik 2.10 x 1.10', NULL, '2025-06-29 18:51:23'),
(5, 'Batik Banjarnegara', 'batik_banjarnegara.jpg', '80000', '60', 'Ukuran batik 2.10 x 1.10', NULL, NULL),
(6, 'Batik Cianjur', 'batik_cianjur.jpg', '90000', '90', 'Ukuran batik 2.10 x 1.10', NULL, NULL),
(7, 'batik Kebumen', 'batik_kebumen.jpg', '90000', '100', 'Ukuran batik 2.10 x 1.10', NULL, NULL),
(8, 'Batik Tobelo', 'batik_tobelo.jpg', '95000', '100', 'Ukuran batik 2.10 x 1.10', NULL, NULL),
(14, 'Batik Alor', 'batik_alor.jpg', '90000', '100', 'Ukuran batik 2.10 x 1.10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_05_123903_create_barangs_table', 1),
(6, '2025_06_05_124308_create_pesanans_table', 1),
(7, '2025_06_05_124853_create_pesanan_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sintia@gmail.com', '$2y$10$yX30OOhnulaBjRHNzrU7tO0JPZcj56iAjjjcm6zyH5dJfPWz8VgzG', '2025-07-01 20:26:35'),
('sintiahendriyani349@gmail.com', '$2y$10$Uzk06/lxHmAvaGpCcvh/m.7UUPcAfC8Lo5pQxHOfOz0XvounbvUCi', '2025-07-02 18:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `status` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `user_id`, `tanggal`, `status`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(61, 14, '2025-07-09', 2, 60000, '2025-07-09 07:00:02', '2025-07-09 07:00:58'),
(62, 14, '2025-07-09', 2, 120000, '2025-07-09 07:01:44', '2025-07-09 07:17:33'),
(63, 14, '2025-07-09', 2, 60000, '2025-07-09 07:18:40', '2025-07-09 07:20:18'),
(64, 14, '2025-07-09', 1, 55000, '2025-07-09 07:42:00', '2025-07-09 07:42:01');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `barang_id`, `pesanan_id`, `jumlah`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(48, 1, 37, 1, 55000, '2025-07-02 16:49:50', '2025-07-02 16:49:50'),
(50, 1, 39, 1, 55000, '2025-07-02 19:05:15', '2025-07-02 19:05:15'),
(52, 2, 38, 1, 60000, '2025-07-03 17:52:21', '2025-07-03 17:52:21'),
(56, 1, 40, 1, 55000, '2025-07-03 18:05:13', '2025-07-03 18:05:13'),
(57, 1, 41, 1, 55000, '2025-07-03 18:11:44', '2025-07-03 18:11:44'),
(58, 1, 42, 1, 55000, '2025-07-03 18:17:21', '2025-07-03 18:17:21'),
(59, 2, 42, 1, 60000, '2025-07-03 18:18:06', '2025-07-03 18:18:06'),
(60, 1, 43, 1, 55000, '2025-07-03 18:20:23', '2025-07-03 18:20:23'),
(61, 1, 44, 3, 165000, '2025-07-03 19:21:11', '2025-07-03 19:35:19'),
(62, 1, 45, 1, 55000, '2025-07-03 19:44:16', '2025-07-03 19:44:16'),
(63, 1, 46, 1, 55000, '2025-07-03 19:45:20', '2025-07-03 19:45:20'),
(69, 1, 51, 1, 55000, '2025-07-03 20:40:19', '2025-07-03 20:40:19'),
(70, 1, 52, 1, 55000, '2025-07-03 20:51:14', '2025-07-03 20:51:14'),
(76, 2, 55, 1, 60000, '2025-07-08 06:02:17', '2025-07-08 06:02:17'),
(77, 2, 56, 1, 60000, '2025-07-08 06:06:59', '2025-07-08 06:06:59'),
(78, 2, 57, 1, 60000, '2025-07-08 06:10:39', '2025-07-08 06:10:39'),
(79, 1, 54, 1, 55000, '2025-07-09 04:35:31', '2025-07-09 04:35:31'),
(80, 1, 58, 1, 55000, '2025-07-09 04:43:10', '2025-07-09 04:43:10'),
(86, 2, 59, 1, 60000, '2025-07-09 05:28:58', '2025-07-09 05:28:58'),
(87, 2, 59, 1, 60000, '2025-07-09 05:33:57', '2025-07-09 05:33:57'),
(88, 4, 59, 1, 70000, '2025-07-09 05:40:29', '2025-07-09 05:40:29'),
(89, 2, 60, 2, 120000, '2025-07-09 06:01:36', '2025-07-09 06:07:57'),
(90, 2, 61, 1, 60000, '2025-07-09 07:00:02', '2025-07-09 07:00:02'),
(91, 2, 62, 2, 120000, '2025-07-09 07:01:44', '2025-07-09 07:16:55'),
(92, 2, 63, 1, 60000, '2025-07-09 07:18:40', '2025-07-09 07:18:40'),
(93, 1, 64, 1, 55000, '2025-07-09 07:42:00', '2025-07-09 07:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `nohp` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `nohp`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'sintia hendriyani', 'sintia@gmail.com', NULL, '$2y$10$yXLnqUJNwmG0WOcYqFHl5.Qtx61USY.OvmxEyJVnIdDcYAFusgXpi', NULL, NULL, 'SPzozKAIJ1L8hsQ8AbeAJqIor7CC8JgRkL4jANBRYoF1TGhQto2cKG5agklB', '2025-06-04 22:59:50', '2025-06-04 22:59:50', 'admin'),
(2, 'sri sintia', 'sintia28@gmail.com', NULL, '$2y$10$DHutIbWaMAoOlG8LaW55pOBs6bm9SO/a5V.di6h.2EFbxXn0rNm6u', NULL, NULL, NULL, '2025-06-06 14:07:29', '2025-06-06 14:07:29', 'user'),
(3, 'ryo', 'ryo@gmail.com', NULL, '$2y$10$ZU6QkT1TPvroidqcorVhReII7oCSDYyAVp6zfFuw6OqUC.5TKCVxa', NULL, NULL, 'h7OeKhFnUfdRnJQu1Fdmzja5HCBSHBK88PJU6bvUPojwN0RlhUkw1nRVmDWb', '2025-06-09 10:13:46', '2025-06-09 10:13:46', 'user'),
(4, 'Intan Sita', 'intan@email.com', NULL, '$2y$10$dqdF/TprgKBvnqt49HeMTO/W62JV3zX/DbukTD5ejN9fEhUVr/SJm', 'Jl. Mangga, No. 12', '087654321786', NULL, '2025-06-10 15:14:45', '2025-06-11 10:28:58', 'user'),
(5, 'Andika Surya', 'andikas279@gmail.com', NULL, '$2y$10$fi.5XApQ6spSDFjGH770J.3z3zyWS1sbK9bWtHVZzD4MwJJndlIym', 'Jln. Raya Lukluk-Sempidi, Gg. Pura Dalem Lukluk, Br. Tengah, Lukluk, Mengwi, Badung', '0895416300503', 'FNiUgyapKy9J13blNbPpfeanOh05kivJDRhE0hh8ew2MRWJPY2BkODVlt6qB', '2025-06-11 23:07:35', '2025-06-11 23:32:43', 'user'),
(13, 'Admin', 'admin1@gmail.com', NULL, '$2y$10$XlhlBBn6Ln7RV/AjB1SuIujKRUJKyPKHUHAlLKOam0DSR5LJoqXm2', NULL, NULL, NULL, '2025-07-04 18:37:12', '2025-07-04 18:37:12', 'admin'),
(14, 'wirya', 'wirya@gmail.com', NULL, '$2y$10$PltpPf1Q/BC2XD2Af5PLSuoAW0rSWcPJsc7IMvTVndK8YiK6P1SAW', NULL, NULL, NULL, '2025-07-08 06:06:47', '2025-07-08 06:06:47', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
