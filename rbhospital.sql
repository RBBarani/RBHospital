-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2022 at 01:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rbhospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$LKJX1HlFtKIeP1LDPCo/fuRI/JNqx8/HuYpl2i70hbe1sxUaZDd3.', '2022-03-20 06:39:28', '2022-03-20 06:39:28');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patients_id` bigint(20) UNSIGNED NOT NULL,
  `doctors_id` bigint(20) UNSIGNED NOT NULL,
  `apdate` date NOT NULL,
  `status` enum('Fixed','Completed','Cancelled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Fixed',
  `created_by` enum('Admin','Patients') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Patients',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `patients_id`, `doctors_id`, `apdate`, `status`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 12, 1, '2022-04-01', 'Fixed', 'Patients', '2022-03-20 06:41:44', '2022-03-20 06:41:44', NULL),
(3, 12, 9, '2022-06-24', 'Fixed', 'Patients', '2022-03-20 06:44:56', '2022-03-20 06:44:56', NULL),
(4, 8, 6, '2022-04-09', 'Cancelled', 'Admin', '2022-03-20 06:46:13', '2022-03-20 06:48:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Casualty', '2022-03-20 06:39:29', '2022-03-20 06:39:29'),
(2, 'Cardiology', '2022-03-20 06:39:29', '2022-03-20 06:39:29'),
(3, 'ENT', '2022-03-20 06:39:29', '2022-03-20 06:39:29'),
(4, 'Gynaecology', '2022-03-20 06:39:29', '2022-03-20 06:39:29'),
(5, 'Neurology', '2022-03-20 06:39:29', '2022-03-20 06:39:29'),
(6, 'Orthopaedic', '2022-03-20 06:39:30', '2022-03-20 06:39:30');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departments_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `departments_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Mr. Gerardo Vandervort', 'predovic.tanner@hotmail.com', '$2y$10$3kk3y0gLrmer25dPteWx3eLhK7Sk.APkeq.9KeD58VSgBldtibEHi', 2, '2022-03-20 06:39:35', '2022-03-20 06:39:35', NULL),
(2, 'Julio Waters', 'lueilwitz.edmund@white.com', '$2y$10$n1kKIfp99dhQvqfOMUYht.66t6ly53WQXtAUpreqlxQWuPeIG69jO', 6, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(3, 'Dr. Charlotte Little', 'mbrakus@gmail.com', '$2y$10$8xZRj9r9D5zQiHJNRfP8LO9gOKc5fbGRiD8chNAqis.vHs0uAHwo.', 5, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(4, 'Dr. Joany Pfeffer', 'glover.hershel@yahoo.com', '$2y$10$NJvUNYLEB1UZ8qcdloZp0e6DfG.v6USdyDT.o7mWpUomBiydcjqpS', 6, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(5, 'Gerson Macejkovic', 'vbednar@lebsack.biz', '$2y$10$7tEs4GbD93bQiiCA1F28/u4.mxplVzBtO060jEr4mC4tS8rkjaep6', 6, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(6, 'Mrs. Madonna Howell I', 'gorczany.andre@welch.net', '$2y$10$5cUBug82X5dIiVxXuXiTV.ehe40qgpN1AJ5Rh6BIiLvz9GMPW/fPC', 1, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(7, 'Mrs. Madelyn Blanda', 'oberbrunner.ethel@boyle.com', '$2y$10$Dfu.Oyrhrp2rXheFxfB/Deg9ikOXIYTVUkqFttdvbUfdYXNhAz3Aa', 1, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(8, 'Dr. Edd Osinski', 'ztromp@lubowitz.biz', '$2y$10$.jztuRtSEqJn8bj9sBx36.2WlJcs0ygkiZL420qPLsGNGt3.f.S3a', 5, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(9, 'Prof. Amira Witting', 'walton.stehr@gibson.org', '$2y$10$QG35ez4Pnnk8gFLn50WGLuHZWDIxvNJQjdP6ojaCq5Ao9oBtxRkuS', 5, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL),
(10, 'Mr. Alan Tromp', 'demario.gislason@hotmail.com', '$2y$10$6w4gP8X6NaTcLvSANRVcqut7wwzL/jCsfjxntw9Q6QetlySxWqRUC', 5, '2022-03-20 06:39:36', '2022-03-20 06:39:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2022_03_17_164251_create_admins_table', 1),
(16, '2022_03_17_164319_create_departments_table', 1),
(17, '2022_03_17_164355_create_patients_table', 1),
(18, '2022_03_17_164501_create_doctors_table', 1),
(19, '2022_03_17_165639_create_appointments_table', 1),
(20, '2022_03_17_194126_create_pdfs_table', 1);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Bavithra Barani', 'bavithrabarani@gmail.com', '$2y$10$W.qcUptrO9DROkHOdtBLiuqLlILAKoFce2nr2oKdaOwVs6wbCtRN2', '2022-03-20 06:37:35', '2022-03-20 06:37:35', NULL),
(2, 'Katlynn Kuphal', 'elizabeth.schmitt@haag.org', '$2y$10$7LpWV6gl7KwEGr7UYTtz9OVXwBkxq4hNQEqYf/jmQYEN3EO0jooOS', '2022-03-20 06:38:13', '2022-03-20 06:38:13', NULL),
(3, 'Dr. Juliana Oberbrunner', 'margarette.nienow@lakin.com', '$2y$10$ulk5nSYUrJdgxM7tvWMVp.BJ2E9yYKKBQUm.drFIHQ9lWZJrrd1Lq', '2022-03-20 06:38:13', '2022-03-20 06:38:13', NULL),
(4, 'Prof. Gladyce Koepp', 'ayla09@schimmel.info', '$2y$10$KH6FpUtQ2CSgt.1UDcS39eTBiYRNDZ24lRuz15CJrsBEhLp/SMcE6', '2022-03-20 06:38:13', '2022-03-20 06:38:13', NULL),
(5, 'Dr. Alexandre Price', 'balistreri.annetta@kerluke.com', '$2y$10$Y662C99G670UeIasDs.XseLATzPQWrVNNtUQgp6v9D39kM24LbINW', '2022-03-20 06:38:13', '2022-03-20 06:38:13', NULL),
(6, 'Prof. Lamont Zemlak', 'bayer.brett@predovic.com', '$2y$10$7eZetw524WeFdo0C.MzZgeXG1.DATH8iA0IWp5QkFPh5TiOj8ntwe', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(7, 'Dr. Harvey Jaskolski', 'block.brandon@yahoo.com', '$2y$10$XnKmoWcfYPD62bmCXgAFheqcE8S5l82vrhCyaodmjo3KWz.hPwX1S', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(8, 'Ona Bogan DDS', 'twisozk@gmail.com', '$2y$10$4cx4dcKsu0Y.RgNpxEoaeekL/Yhms2DASL947Pg64HxutsOUI8Nja', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(9, 'Harry O\'Hara', 'evalyn98@walker.biz', '$2y$10$/w3uz1DVll/qYn/FNMvnCeX4r/nzWOfbpbpXphmd0...X6x7bSKfu', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(10, 'Howard Pacocha', 'rebecca34@hane.com', '$2y$10$fJpNO81yPb.qdBWQBX6Fz.TqcQii6Sj0rmW8iWlo8CfM9dcwhDPWa', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(11, 'Herminio Mueller', 'maxime.koepp@gmail.com', '$2y$10$4c3BAl3XGhqemgVOiqmiXO6jM8H2dSiXHwv8sfOCZuQYZdIY.VvSC', '2022-03-20 06:38:14', '2022-03-20 06:38:14', NULL),
(12, 'Pavai', 'user@email.com', '$2y$10$rtl0JnDzfclQd2cKFRP/ueUp18CFrZeLYYc/5R.GQ19p7YX2RNXkC', '2022-03-20 06:41:44', '2022-03-20 06:41:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pdfs`
--

CREATE TABLE `pdfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_patients_id_foreign` (`patients_id`),
  ADD KEY `appointments_doctors_id_foreign` (`doctors_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_email_unique` (`email`),
  ADD KEY `doctors_departments_id_foreign` (`departments_id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_email_unique` (`email`);

--
-- Indexes for table `pdfs`
--
ALTER TABLE `pdfs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pdfs`
--
ALTER TABLE `pdfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_doctors_id_foreign` FOREIGN KEY (`doctors_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patients_id_foreign` FOREIGN KEY (`patients_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_departments_id_foreign` FOREIGN KEY (`departments_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
