-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 25, 2024 at 06:53 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwl_pos`
--

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
(5, '2024_09_09_032639_create_m_level_table', 1),
(6, '2024_09_09_034344_create_m_kategoris_table', 1),
(7, '2024_09_09_034422_create_m_suppliers_table', 1),
(8, '2024_09_09_041509_create_m_user_table', 1),
(9, '2024_09_09_050346_create_m_barang_table', 1),
(10, '2024_09_09_052440_create_t_penjualan_table', 1),
(11, '2024_09_09_052614_create_t_stok_table', 1),
(12, '2024_09_09_052735_create_t_penjualan_detail_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `m_barangs`
--

CREATE TABLE `m_barangs` (
  `barang_id` bigint UNSIGNED NOT NULL,
  `kategori_id` bigint UNSIGNED NOT NULL,
  `barang_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `barang_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` int NOT NULL,
  `harga_jual` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_barangs`
--

INSERT INTO `m_barangs` (`barang_id`, `kategori_id`, `barang_kode`, `barang_nama`, `harga_beli`, `harga_jual`, `created_at`, `updated_at`) VALUES
(1, 1, 'B001', 'Oreo', 10000, 18000, NULL, NULL),
(2, 2, 'B002', 'Kazler Nugget', 18000, 25000, NULL, NULL),
(3, 3, 'B003', 'Fanta 1 lt', 7000, 10000, NULL, NULL),
(4, 4, 'B004', 'Aqua 1 lt', 3000, 5000, NULL, NULL),
(5, 5, 'B005', 'Anggur Merah', 50000, 65000, NULL, NULL),
(6, 1, 'B006', 'Chitato', 10000, 12000, NULL, NULL),
(7, 2, 'B007', 'Kentang Goreng', 20000, 25000, NULL, NULL),
(8, 3, 'B008', 'Sprite 1 lt', 8000, 10000, NULL, NULL),
(9, 4, 'B009', 'Cleo 1 lt', 4000, 6000, NULL, NULL),
(10, 5, 'B010', 'Atlas', 60000, 75000, NULL, NULL),
(11, 1, 'B011', 'Sponge', 8000, 10000, NULL, NULL),
(12, 2, 'B012', 'Jamur Crispy', 15000, 20000, NULL, NULL),
(13, 3, 'B013', 'Coca Cola', 9000, 11000, NULL, NULL),
(14, 4, 'B014', 'J Water 1 lt', 2500, 4000, NULL, NULL),
(15, 5, 'B015', 'Vibes', 250000, 300000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_kategoris`
--

CREATE TABLE `m_kategoris` (
  `kategori_id` bigint UNSIGNED NOT NULL,
  `kategori_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_kategoris`
--

INSERT INTO `m_kategoris` (`kategori_id`, `kategori_kode`, `kategori_nama`, `created_at`, `updated_at`) VALUES
(1, 'K001', 'Makanan Ringan', NULL, NULL),
(2, 'K002', 'Makanan Frozen', NULL, NULL),
(3, 'K003', 'Minuman Soda', NULL, NULL),
(4, 'K004', 'Minuman', NULL, NULL),
(5, 'K005', 'Alkohol', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_level`
--

CREATE TABLE `m_level` (
  `level_id` bigint UNSIGNED NOT NULL,
  `level_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_level`
--

INSERT INTO `m_level` (`level_id`, `level_kode`, `level_nama`, `created_at`, `updated_at`) VALUES
(1, 'ADM', 'Administrator', NULL, NULL),
(2, 'MNG', 'Manager', NULL, NULL),
(3, 'STF', 'Staff/Kasir', NULL, NULL),
(4, 'PLG', 'Pelanggan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_suppliers`
--

CREATE TABLE `m_suppliers` (
  `supplier_id` bigint UNSIGNED NOT NULL,
  `supplier_kode` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_suppliers`
--

INSERT INTO `m_suppliers` (`supplier_id`, `supplier_kode`, `supplier_nama`, `supplier_alamat`, `created_at`, `updated_at`) VALUES
(1, 'S001', 'PT Indonesia Sehat', 'Jakarta, Indonesia', NULL, NULL),
(2, 'S002', 'CV Rumah Sehat', 'Malang, Indonesia', NULL, NULL),
(3, 'S003', 'PT Makmur Sejahtera', 'Surabaya, Indonesia', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `level_id` bigint UNSIGNED NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`user_id`, `level_id`, `username`, `nama`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin2', 'Administrator2', '$2y$12$v3BORBFGG3jYoOqbPoMI9u/lt18YrfsG5NLOFBYPN.sUoQtntFc9i', NULL, '2024-09-18 07:43:06'),
(2, 2, 'manager', 'Manager', '$2y$12$2Xdl2qyLPWaQctSy3atb3ON2INGsiKzGUJeFHBROMHakoCbb57q5W', NULL, NULL),
(3, 3, 'staff', 'Staff/Kasir', '$2y$12$FE4pmPbrRcgm2k60ieEOB.zYcbXw/.LHdAHuopcOIqn6n.mp4f0ka', NULL, NULL),
(7, 4, 'customer-1', 'Pelanggan Pertama', '$2y$12$F/prEVYeqkhZ/9tGBVruXeNU3ZKuIone2IWbjF59eqN4clZkUnrhO', NULL, '2024-09-13 04:34:47'),
(8, 2, 'manager_dua', 'Manager 2', '$2y$12$s6kR9rS3YX4/qI2gEOW0QuWL9LiQ2SzcnJmLSWlL7jzCCnKks25ZW', '2024-09-18 00:32:07', '2024-09-18 00:32:07'),
(9, 2, 'manager22', 'Manager Dua Dua', '$2y$12$q2BEljc42nD.KWzXecE93Oo0qoF7zQ.vIqHiKeAOYxmewf1vIBJJG', '2024-09-18 01:16:57', '2024-09-18 01:16:57'),
(10, 2, 'manager33', 'Manager Tiga TIga', '$2y$12$Kox1ujjCiO0iXoW1gRVV5ukpd3rQGLWv43QbkZCiK5mtIoF9u0uDC', '2024-09-18 01:22:37', '2024-09-18 01:22:37'),
(17, 2, 'manager56', 'Manager55', '$2y$12$zrbQ9/R8MOWjJ2955hZn6.VLT4cllHgqzHc/UuzVM7.Wz3o81F0Aa', '2024-09-18 06:57:44', '2024-09-18 06:57:44'),
(18, 2, 'manager12', 'Manager11', '$2y$12$8jQX4mfeJ4ArYbWHcEt6Quu1IOGj8bUzo0iOb7uEkUyYSeZ3hcrpa', '2024-09-18 07:00:36', '2024-09-18 07:00:36'),
(20, 1, 'ADM', 'Administrator', '$2y$12$uwx3iSLPxANAVqz0WEW3qOdvOF445T34DwVJy7.nRmQzcAPAi36bq', '2024-09-18 08:24:19', '2024-09-18 08:24:19');

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
-- Table structure for table `t_penjualans`
--

CREATE TABLE `t_penjualans` (
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `pembeli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_kode` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penjualan_tanggal` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualans`
--

INSERT INTO `t_penjualans` (`penjualan_id`, `user_id`, `pembeli`, `penjualan_kode`, `penjualan_tanggal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Andi', 'PNJ001', '2024-09-10 10:00:00', NULL, NULL),
(2, 2, 'Budi', 'PNJ002', '2024-09-10 12:00:00', NULL, NULL),
(3, 3, 'Citra', 'PNJ003', '2024-09-11 09:30:00', NULL, NULL),
(4, 1, 'Dewi', 'PNJ004', '2024-09-11 14:00:00', NULL, NULL),
(5, 2, 'Eka', 'PNJ005', '2024-09-12 11:00:00', NULL, NULL),
(6, 3, 'Faisal', 'PNJ006', '2024-09-12 15:00:00', NULL, NULL),
(7, 1, 'Gita', 'PNJ007', '2024-09-13 10:15:00', NULL, NULL),
(8, 2, 'Hendra', 'PNJ008', '2024-09-13 14:45:00', NULL, NULL),
(9, 3, 'Intan', 'PNJ009', '2024-09-14 09:00:00', NULL, NULL),
(10, 1, 'Joko', 'PNJ010', '2024-09-14 13:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_penjualan_details`
--

CREATE TABLE `t_penjualan_details` (
  `detail_id` bigint UNSIGNED NOT NULL,
  `penjualan_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_penjualan_details`
--

INSERT INTO `t_penjualan_details` (`detail_id`, `penjualan_id`, `barang_id`, `harga`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 18000, 2, NULL, NULL),
(2, 1, 6, 12000, 1, NULL, NULL),
(3, 1, 11, 10000, 3, NULL, NULL),
(4, 2, 2, 25000, 1, NULL, NULL),
(5, 2, 7, 25000, 2, NULL, NULL),
(6, 2, 12, 20000, 1, NULL, NULL),
(7, 3, 3, 10000, 2, NULL, NULL),
(8, 3, 8, 10000, 1, NULL, NULL),
(9, 3, 13, 11000, 1, NULL, NULL),
(10, 4, 4, 5000, 3, NULL, NULL),
(11, 4, 9, 6000, 2, NULL, NULL),
(12, 4, 14, 4000, 1, NULL, NULL),
(13, 5, 5, 65000, 1, NULL, NULL),
(14, 5, 10, 75000, 1, NULL, NULL),
(15, 5, 15, 300000, 1, NULL, NULL),
(16, 6, 1, 18000, 3, NULL, NULL),
(17, 6, 6, 12000, 2, NULL, NULL),
(18, 6, 11, 10000, 2, NULL, NULL),
(19, 7, 2, 25000, 2, NULL, NULL),
(20, 7, 7, 25000, 1, NULL, NULL),
(21, 7, 12, 20000, 1, NULL, NULL),
(22, 8, 3, 10000, 2, NULL, NULL),
(23, 8, 8, 10000, 1, NULL, NULL),
(24, 8, 13, 11000, 1, NULL, NULL),
(25, 9, 4, 5000, 3, NULL, NULL),
(26, 9, 9, 6000, 2, NULL, NULL),
(27, 9, 14, 4000, 1, NULL, NULL),
(28, 10, 5, 65000, 1, NULL, NULL),
(29, 10, 10, 75000, 1, NULL, NULL),
(30, 10, 15, 300000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_stoks`
--

CREATE TABLE `t_stoks` (
  `stok_id` bigint UNSIGNED NOT NULL,
  `barang_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `stok_tanggal` datetime NOT NULL,
  `stok_jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stoks`
--

INSERT INTO `t_stoks` (`stok_id`, `barang_id`, `user_id`, `supplier_id`, `stok_tanggal`, `stok_jumlah`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-09-01 08:00:00', 50, NULL, NULL),
(2, 2, 1, 1, '2024-09-01 08:00:00', 40, NULL, NULL),
(3, 3, 1, 1, '2024-09-01 08:00:00', 60, NULL, NULL),
(4, 4, 2, 2, '2024-09-02 08:00:00', 70, NULL, NULL),
(5, 5, 2, 2, '2024-09-02 08:00:00', 30, NULL, NULL),
(6, 6, 2, 2, '2024-09-02 08:00:00', 20, NULL, NULL),
(7, 7, 3, 3, '2024-09-03 08:00:00', 25, NULL, NULL),
(8, 8, 3, 3, '2024-09-03 08:00:00', 35, NULL, NULL),
(9, 9, 3, 3, '2024-09-03 08:00:00', 45, NULL, NULL),
(10, 10, 1, 1, '2024-09-04 08:00:00', 60, NULL, NULL),
(11, 11, 1, 1, '2024-09-04 08:00:00', 55, NULL, NULL),
(12, 12, 2, 2, '2024-09-05 08:00:00', 70, NULL, NULL),
(13, 13, 3, 3, '2024-09-06 08:00:00', 80, NULL, NULL),
(14, 14, 3, 3, '2024-09-06 08:00:00', 45, NULL, NULL),
(15, 15, 1, 1, '2024-09-07 08:00:00', 50, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `m_barangs`
--
ALTER TABLE `m_barangs`
  ADD PRIMARY KEY (`barang_id`),
  ADD KEY `m_barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `m_kategoris`
--
ALTER TABLE `m_kategoris`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `m_level`
--
ALTER TABLE `m_level`
  ADD PRIMARY KEY (`level_id`),
  ADD UNIQUE KEY `m_level_level_kode_unique` (`level_kode`);

--
-- Indexes for table `m_suppliers`
--
ALTER TABLE `m_suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `m_user_username_unique` (`username`),
  ADD KEY `m_user_level_id_index` (`level_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `t_penjualans`
--
ALTER TABLE `t_penjualans`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `t_penjualans_user_id_foreign` (`user_id`);

--
-- Indexes for table `t_penjualan_details`
--
ALTER TABLE `t_penjualan_details`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `t_penjualan_details_barang_id_foreign` (`barang_id`),
  ADD KEY `t_penjualan_details_penjualan_id_foreign` (`penjualan_id`);

--
-- Indexes for table `t_stoks`
--
ALTER TABLE `t_stoks`
  ADD PRIMARY KEY (`stok_id`),
  ADD KEY `t_stoks_user_id_foreign` (`user_id`),
  ADD KEY `t_stoks_barang_id_foreign` (`barang_id`),
  ADD KEY `t_stoks_supplier_id_foreign` (`supplier_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `m_barangs`
--
ALTER TABLE `m_barangs`
  MODIFY `barang_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `m_kategoris`
--
ALTER TABLE `m_kategoris`
  MODIFY `kategori_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `m_level`
--
ALTER TABLE `m_level`
  MODIFY `level_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `m_suppliers`
--
ALTER TABLE `m_suppliers`
  MODIFY `supplier_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `user_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t_penjualans`
--
ALTER TABLE `t_penjualans`
  MODIFY `penjualan_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `t_penjualan_details`
--
ALTER TABLE `t_penjualan_details`
  MODIFY `detail_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `t_stoks`
--
ALTER TABLE `t_stoks`
  MODIFY `stok_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `m_barangs`
--
ALTER TABLE `m_barangs`
  ADD CONSTRAINT `m_barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `m_kategoris` (`kategori_id`);

--
-- Constraints for table `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `m_user_level_id_foreign` FOREIGN KEY (`level_id`) REFERENCES `m_level` (`level_id`);

--
-- Constraints for table `t_penjualans`
--
ALTER TABLE `t_penjualans`
  ADD CONSTRAINT `t_penjualans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);

--
-- Constraints for table `t_penjualan_details`
--
ALTER TABLE `t_penjualan_details`
  ADD CONSTRAINT `t_penjualan_details_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barangs` (`barang_id`),
  ADD CONSTRAINT `t_penjualan_details_penjualan_id_foreign` FOREIGN KEY (`penjualan_id`) REFERENCES `t_penjualans` (`penjualan_id`);

--
-- Constraints for table `t_stoks`
--
ALTER TABLE `t_stoks`
  ADD CONSTRAINT `t_stoks_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `m_barangs` (`barang_id`),
  ADD CONSTRAINT `t_stoks_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `m_suppliers` (`supplier_id`),
  ADD CONSTRAINT `t_stoks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `m_user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
