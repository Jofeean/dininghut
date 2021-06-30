-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2021 at 12:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dininghut`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `remember_token`, `created_at`, `updated_at`, `name`) VALUES
(3, 'qweqewrqwerq123123', '$2y$10$XN8HTLz5OQRkFwopTtb0zuvom4Nld2PW2/VeP70ZDlOJPN33aT3ei', NULL, '2021-06-21 03:56:08', '2021-06-23 03:08:32', '123123123'),
(4, 'jogario', '$2y$10$Zwk1AYDQZZK88NozMiIo/uiJhOQmoUjmJ92qz/OlUXb.xClncsj6O', 'AToGHXdkQFdmTpu1MBwk0DxTgB2l3k7YOevNNgmYabzuDIi5PkzOUJWxMDgE', '2021-06-21 21:33:30', '2021-06-23 03:54:16', 'Jofeean Ogario'),
(5, 'jupin', '$2y$10$iqsFcz4X/hALdY2wFLZO2uDU7bLh4.v65NOUEtB4yD026buekImOi', NULL, '2021-06-22 09:02:12', '2021-06-22 09:02:51', 'Jofeean P. Ogario');

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint(20) UNSIGNED NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_values` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_type`, `user_id`, `event`, `auditable_type`, `auditable_id`, `old_values`, `new_values`, `url`, `ip_address`, `user_agent`, `tags`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admin', 1, 'updated', 'App\\Models\\Admin', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 00:37:46', '2021-06-21 00:37:46'),
(2, 'App\\Models\\Admin', 1, 'created', 'App\\Models\\Admin', 2, '[]', '{\"name\":\"qwer\",\"username\":\"qewrqer\",\"updated_at\":\"2021-06-21 11:34:47\",\"created_at\":\"2021-06-21 11:34:47\",\"id\":2}', 'http://localhost/dininghut/admin/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 03:34:48', '2021-06-21 03:34:48'),
(3, 'App\\Models\\Admin', 1, 'created', 'App\\Models\\Admin', 3, '[]', '{\"name\":\"qwerqwerqewr\",\"username\":\"qweqewrqwerq\",\"updated_at\":\"2021-06-21 11:56:08\",\"created_at\":\"2021-06-21 11:56:08\",\"id\":3}', 'http://localhost/dininghut/admin/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 03:56:08', '2021-06-21 03:56:08'),
(4, 'App\\Models\\Admin', 1, 'updated', 'App\\Models\\Admin', 1, '{\"username\":\"jogario\",\"updated_at\":\"2021-06-18 04:52:23\"}', '{\"username\":\"jogario123\",\"updated_at\":\"2021-06-22 04:53:16\"}', 'http://localhost/dininghut/admin/admin/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 20:53:16', '2021-06-21 20:53:16'),
(5, 'App\\Models\\Admin', 1, 'updated', 'App\\Models\\Admin', 1, '{\"username\":\"jogario123\",\"updated_at\":\"2021-06-22 04:53:16\",\"name\":\"Jofeean Ogario\"}', '{\"username\":\"jogario\",\"updated_at\":\"2021-06-22 04:53:28\",\"name\":\"Jofeean Ogario123\"}', 'http://localhost/dininghut/admin/admin/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 20:53:28', '2021-06-21 20:53:28'),
(6, 'App\\Models\\Admin', 1, 'updated', 'App\\Models\\Admin', 1, '{\"updated_at\":\"2021-06-22 04:53:28\",\"name\":\"Jofeean Ogario123\"}', '{\"updated_at\":\"2021-06-22 04:58:50\",\"name\":\"Jofeean Ogario\"}', 'http://localhost/dininghut/admin/admin/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 20:58:50', '2021-06-21 20:58:50'),
(7, 'App\\Models\\Admin', 1, 'deleted', 'App\\Models\\Admin', 1, '{\"id\":1,\"username\":\"jogario\",\"created_at\":\"2021-06-18 04:52:23\",\"updated_at\":\"2021-06-22 04:58:50\",\"name\":\"Jofeean Ogario\"}', '[]', 'http://localhost/dininghut/admin/admin/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:31:44', '2021-06-21 21:31:44'),
(8, NULL, NULL, 'created', 'App\\Models\\Admin', 4, '[]', '{\"name\":\"Jofeean Ogario\",\"username\":\"jogario\",\"updated_at\":\"2021-06-22 05:33:30\",\"created_at\":\"2021-06-22 05:33:30\",\"id\":4}', 'http://localhost/dininghut/sample', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:33:30', '2021-06-21 21:33:30'),
(9, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/admin/login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:33:44', '2021-06-21 21:33:44'),
(10, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Admin', 2, '{\"id\":2,\"username\":\"qewrqer\",\"created_at\":\"2021-06-21 11:34:47\",\"updated_at\":\"2021-06-21 11:34:47\",\"name\":\"qwer\"}', '[]', 'http://localhost/dininghut/admin/admin/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:35:50', '2021-06-21 21:35:50'),
(11, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:47:33', '2021-06-21 21:47:33'),
(12, NULL, NULL, 'created', 'App\\Models\\User', 3, '[]', '{\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgario123123\",\"contact\":\"094535452\",\"gender\":\"Male\",\"email\":\"jofeean@gmail.com123\",\"code\":1310337953,\"updated_at\":\"2021-06-22 05:56:16\",\"created_at\":\"2021-06-22 05:56:16\",\"id\":3}', 'http://localhost/dininghut/user/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-21 21:56:16', '2021-06-21 21:56:16'),
(13, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 3, '{\"updated_at\":\"2021-06-21 11:56:08\"}', '{\"updated_at\":\"2021-06-22 16:49:47\"}', 'http://localhost/dininghut/admin/admin/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-22 08:49:47', '2021-06-22 08:49:47'),
(14, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '{\"updated_at\":\"2021-06-22 05:33:30\"}', '{\"updated_at\":\"2021-06-22 16:55:51\"}', 'http://localhost/dininghut/admin/admin/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-22 08:55:51', '2021-06-22 08:55:51'),
(15, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Admin', 5, '[]', '{\"name\":\"Jofeean P. Ogario\",\"username\":\"jupin\",\"updated_at\":\"2021-06-22 17:02:12\",\"created_at\":\"2021-06-22 17:02:12\",\"id\":5}', 'http://localhost/dininghut/admin/admin', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-22 09:02:12', '2021-06-22 09:02:12'),
(16, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 5, '{\"updated_at\":\"2021-06-22 17:02:12\"}', '{\"updated_at\":\"2021-06-22 17:02:51\"}', 'http://localhost/dininghut/admin/admin/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-22 09:02:51', '2021-06-22 09:02:51'),
(17, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 3, '{\"updated_at\":\"2021-06-22 16:49:47\"}', '{\"updated_at\":\"2021-06-22 17:03:02\"}', 'http://localhost/dininghut/admin/admin/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-22 09:03:02', '2021-06-22 09:03:02'),
(18, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 3, '{\"username\":\"qweqewrqwerq\",\"updated_at\":\"2021-06-22 17:03:02\",\"name\":\"qwerqwerqewr\"}', '{\"username\":\"qweqewrqwerq123123\",\"updated_at\":\"2021-06-23 11:08:32\",\"name\":\"123123123\"}', 'http://localhost/dininghut/admin/admin/3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:08:32', '2021-06-23 03:08:32'),
(19, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\User', 1, '{\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgario\",\"contact\":\"09053139902\",\"gender\":\"Male\",\"email\":\"jofeean@gmail.com\",\"updated_at\":\"2021-06-12 09:44:25\"}', '{\"name\":\"Jofeean P. Ogario1\",\"username\":\"JOgario1\",\"contact\":\"090531399021\",\"gender\":\"Female\",\"email\":\"jofeean@gmail.com1\",\"updated_at\":\"2021-06-23 11:21:04\"}', 'http://localhost/dininghut/admin/user/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:21:04', '2021-06-23 03:21:04'),
(20, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\User', 3, '{\"id\":3,\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgario123123\",\"contact\":\"094535452\",\"gender\":\"Male\",\"email\":\"jofeean@gmail.com123\",\"code\":\"1310337953\",\"verified\":0,\"created_at\":\"2021-06-22 05:56:16\",\"updated_at\":\"2021-06-22 05:56:16\"}', '[]', 'http://localhost/dininghut/admin/user/3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:23:01', '2021-06-23 03:23:01'),
(21, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\User', 4, '[]', '{\"name\":\"qewrqer\",\"username\":\"qwerqewrqwer\",\"contact\":\"123123412\",\"gender\":\"Male\",\"email\":\"qwe12@gmail.com\",\"code\":9765611516,\"updated_at\":\"2021-06-23 11:23:45\",\"created_at\":\"2021-06-23 11:23:45\",\"id\":4}', 'http://localhost/dininghut/admin/user', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:23:45', '2021-06-23 03:23:45'),
(22, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\User', 1, '{\"name\":\"Jofeean P. Ogario1\",\"username\":\"JOgario1\",\"contact\":\"090531399021\",\"gender\":\"Female\",\"email\":\"jofeean@gmail.com1\",\"updated_at\":\"2021-06-23 11:21:04\"}', '{\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgario\",\"contact\":\"09053139902\",\"gender\":\"Male\",\"email\":\"jofeean@gmail.com\",\"updated_at\":\"2021-06-23 11:47:12\"}', 'http://localhost/dininghut/admin/user/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:47:13', '2021-06-23 03:47:13'),
(23, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\User', 1, '{\"updated_at\":\"2021-06-23 11:47:12\"}', '{\"updated_at\":\"2021-06-23 11:53:57\"}', 'http://localhost/dininghut/admin/user/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:53:57', '2021-06-23 03:53:57'),
(24, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '{\"updated_at\":\"2021-06-22 16:55:51\"}', '{\"updated_at\":\"2021-06-23 11:54:16\"}', 'http://localhost/dininghut/admin/admin/reset', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:54:16', '2021-06-23 03:54:16'),
(25, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:54:19', '2021-06-23 03:54:19'),
(26, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:54:35', '2021-06-23 03:54:35'),
(27, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 03:54:52', '2021-06-23 03:54:52'),
(28, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Category', 1, '[]', '{\"category\":\"Japanese\",\"updated_at\":\"2021-06-24 07:29:48\",\"created_at\":\"2021-06-24 07:29:48\",\"id\":1}', 'http://localhost/dininghut/admin/category', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 23:29:48', '2021-06-23 23:29:48'),
(29, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Category', 2, '[]', '{\"category\":\"Filipino\",\"updated_at\":\"2021-06-24 07:33:05\",\"created_at\":\"2021-06-24 07:33:05\",\"id\":2}', 'http://localhost/dininghut/admin/category', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 23:33:05', '2021-06-23 23:33:05'),
(30, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Category', 2, '{\"category\":\"Filipino\",\"updated_at\":\"2021-06-24 07:33:05\"}', '{\"category\":\"Filipino Ngi\",\"updated_at\":\"2021-06-24 07:40:36\"}', 'http://localhost/dininghut/admin/category/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-23 23:40:36', '2021-06-23 23:40:36'),
(31, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Category', 3, '[]', '{\"category\":\"Bisaya\",\"updated_at\":\"2021-06-24 08:30:19\",\"created_at\":\"2021-06-24 08:30:19\",\"id\":3}', 'http://localhost/dininghut/admin/category', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 00:30:19', '2021-06-24 00:30:19'),
(32, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Category', 2, '{\"category\":\"Filipino Ngi\",\"updated_at\":\"2021-06-24 07:40:36\"}', '{\"category\":\"Filipino\",\"updated_at\":\"2021-06-24 08:30:42\"}', 'http://localhost/dininghut/admin/category/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 00:30:42', '2021-06-24 00:30:42'),
(33, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Category', 3, '{\"id\":3,\"category\":\"Bisaya\",\"created_at\":\"2021-06-24 08:30:19\",\"updated_at\":\"2021-06-24 08:30:19\"}', '[]', 'http://localhost/dininghut/admin/category/3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 00:31:32', '2021-06-24 00:31:32'),
(34, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Category', 4, '[]', '{\"category\":\"Native\",\"updated_at\":\"2021-06-24 10:23:30\",\"created_at\":\"2021-06-24 10:23:30\",\"id\":4}', 'http://localhost/dininghut/admin/category', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 02:23:30', '2021-06-24 02:23:30'),
(35, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 1, '[]', '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 10:53:14\",\"created_at\":\"2021-06-24 10:53:14\",\"id\":1}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 02:53:14', '2021-06-24 02:53:14'),
(36, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 1, '[]', '{\"category_id\":\"1\",\"menu_id\":1,\"updated_at\":\"2021-06-24 10:53:14\",\"created_at\":\"2021-06-24 10:53:14\",\"id\":1}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 02:53:14', '2021-06-24 02:53:14'),
(37, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 2, '[]', '{\"category_id\":\"2\",\"menu_id\":1,\"updated_at\":\"2021-06-24 10:53:14\",\"created_at\":\"2021-06-24 10:53:14\",\"id\":2}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 02:53:14', '2021-06-24 02:53:14'),
(38, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\User', 2, '{\"id\":2,\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgario123\",\"contact\":\"09054631\",\"gender\":\"Male\",\"email\":\"jofeean1@gmail.com\",\"code\":\"3831558502\",\"verified\":0,\"created_at\":\"2021-06-16 09:05:32\",\"updated_at\":\"2021-06-16 09:05:32\"}', '[]', 'http://localhost/dininghut/admin/user/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:22:06', '2021-06-24 03:22:06'),
(39, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 2, '{\"id\":2,\"category_id\":2,\"menu_id\":1,\"created_at\":\"2021-06-24 10:53:14\",\"updated_at\":\"2021-06-24 10:53:14\"}', '[]', 'http://localhost/dininghut/admin/tag/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:22:15', '2021-06-24 03:22:15'),
(40, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 1, '{\"id\":1,\"category_id\":1,\"menu_id\":1,\"created_at\":\"2021-06-24 10:53:14\",\"updated_at\":\"2021-06-24 10:53:14\"}', '[]', 'http://localhost/dininghut/admin/tag/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:22:25', '2021-06-24 03:22:25'),
(41, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 1, '[]', '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 11:23:43\",\"created_at\":\"2021-06-24 11:23:43\",\"id\":1}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:23:43', '2021-06-24 03:23:43'),
(42, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 1, '[]', '{\"category_id\":\"1\",\"menu_id\":1,\"updated_at\":\"2021-06-24 11:23:43\",\"created_at\":\"2021-06-24 11:23:43\",\"id\":1}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:23:43', '2021-06-24 03:23:43'),
(43, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 2, '[]', '{\"category_id\":\"2\",\"menu_id\":1,\"updated_at\":\"2021-06-24 11:23:43\",\"created_at\":\"2021-06-24 11:23:43\",\"id\":2}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:23:43', '2021-06-24 03:23:43'),
(44, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 3, '[]', '{\"category_id\":\"4\",\"menu_id\":1,\"updated_at\":\"2021-06-24 11:23:43\",\"created_at\":\"2021-06-24 11:23:43\",\"id\":3}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:23:43', '2021-06-24 03:23:43'),
(45, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 2, '{\"id\":2,\"category_id\":2,\"menu_id\":1,\"created_at\":\"2021-06-24 11:23:43\",\"updated_at\":\"2021-06-24 11:23:43\"}', '[]', 'http://localhost/dininghut/admin/tag/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:23:57', '2021-06-24 03:23:57'),
(46, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 3, '{\"id\":3,\"category_id\":4,\"menu_id\":1,\"created_at\":\"2021-06-24 11:23:43\",\"updated_at\":\"2021-06-24 11:23:43\"}', '[]', 'http://localhost/dininghut/admin/tag/3', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:32:46', '2021-06-24 03:32:46'),
(47, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Menu', 1, '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 11:23:43\"}', '{\"dish\":\"Filipino Sushi 1\",\"description\":\"basta 1\",\"updated_at\":\"2021-06-24 11:45:05\"}', 'http://localhost/dininghut/admin/menu/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:45:05', '2021-06-24 03:45:05'),
(48, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Menu', 1, '{\"dish\":\"Filipino Sushi 1\",\"description\":\"basta 1\",\"updated_at\":\"2021-06-24 11:45:05\"}', '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 11:46:41\"}', 'http://localhost/dininghut/admin/menu/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:46:42', '2021-06-24 03:46:42'),
(49, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 1, '{\"id\":1,\"category_id\":1,\"menu_id\":1,\"created_at\":\"2021-06-24 11:23:43\",\"updated_at\":\"2021-06-24 11:23:43\"}', '[]', 'http://localhost/dininghut/admin/tag/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:06', '2021-06-24 03:50:06'),
(50, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Menu', 1, '{\"id\":1,\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"created_at\":\"2021-06-24 11:23:43\",\"updated_at\":\"2021-06-24 11:46:41\"}', '[]', 'http://localhost/dininghut/admin/menu/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:27', '2021-06-24 03:50:27'),
(51, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 2, '[]', '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 11:50:38\",\"created_at\":\"2021-06-24 11:50:38\",\"id\":2}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:38', '2021-06-24 03:50:38'),
(52, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 4, '[]', '{\"category_id\":\"1\",\"menu_id\":2,\"updated_at\":\"2021-06-24 11:50:38\",\"created_at\":\"2021-06-24 11:50:38\",\"id\":4}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:38', '2021-06-24 03:50:38'),
(53, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 5, '[]', '{\"category_id\":\"2\",\"menu_id\":2,\"updated_at\":\"2021-06-24 11:50:38\",\"created_at\":\"2021-06-24 11:50:38\",\"id\":5}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:38', '2021-06-24 03:50:38'),
(54, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 6, '[]', '{\"category_id\":\"4\",\"menu_id\":2,\"updated_at\":\"2021-06-24 11:50:38\",\"created_at\":\"2021-06-24 11:50:38\",\"id\":6}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:38', '2021-06-24 03:50:38'),
(55, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Menu', 2, '{\"id\":2,\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"created_at\":\"2021-06-24 11:50:38\",\"updated_at\":\"2021-06-24 11:50:38\"}', '[]', 'http://localhost/dininghut/admin/menu/2', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:50:46', '2021-06-24 03:50:46'),
(56, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 3, '[]', '{\"dish\":\"Filipino Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 11:51:02\",\"created_at\":\"2021-06-24 11:51:02\",\"id\":3}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(57, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 7, '[]', '{\"category_id\":\"1\",\"menu_id\":3,\"updated_at\":\"2021-06-24 11:51:02\",\"created_at\":\"2021-06-24 11:51:02\",\"id\":7}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(58, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 8, '[]', '{\"category_id\":\"2\",\"menu_id\":3,\"updated_at\":\"2021-06-24 11:51:02\",\"created_at\":\"2021-06-24 11:51:02\",\"id\":8}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(59, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 9, '[]', '{\"category_id\":\"4\",\"menu_id\":3,\"updated_at\":\"2021-06-24 11:51:02\",\"created_at\":\"2021-06-24 11:51:02\",\"id\":9}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(60, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 9, '{\"id\":9,\"category_id\":4,\"menu_id\":3,\"created_at\":\"2021-06-24 11:51:02\",\"updated_at\":\"2021-06-24 11:51:02\"}', '[]', 'http://localhost/dininghut/admin/tag/9', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 04:28:26', '2021-06-24 04:28:26'),
(61, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 4, '[]', '{\"dish\":\"Sushi\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 12:31:00\",\"created_at\":\"2021-06-24 12:31:00\",\"id\":4}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 04:31:00', '2021-06-24 04:31:00'),
(62, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 10, '[]', '{\"category_id\":\"1\",\"menu_id\":4,\"updated_at\":\"2021-06-24 12:31:00\",\"created_at\":\"2021-06-24 12:31:00\",\"id\":10}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 04:31:00', '2021-06-24 04:31:00'),
(63, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 5, '[]', '{\"dish\":\"Tinolang Manok\",\"description\":\"basta\",\"updated_at\":\"2021-06-24 13:35:26\",\"created_at\":\"2021-06-24 13:35:26\",\"id\":5}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 05:35:26', '2021-06-24 05:35:26'),
(64, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 11, '[]', '{\"category_id\":\"4\",\"menu_id\":5,\"updated_at\":\"2021-06-24 13:35:26\",\"created_at\":\"2021-06-24 13:35:26\",\"id\":11}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 05:35:26', '2021-06-24 05:35:26'),
(65, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 6, '[]', '{\"dish\":\"Soup No. 5\",\"description\":\"bat soup\",\"updated_at\":\"2021-06-24 14:00:14\",\"created_at\":\"2021-06-24 14:00:14\",\"id\":6}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 06:00:14', '2021-06-24 06:00:14'),
(66, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 12, '[]', '{\"category_id\":\"2\",\"menu_id\":6,\"updated_at\":\"2021-06-24 14:00:14\",\"created_at\":\"2021-06-24 14:00:14\",\"id\":12}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-24 06:00:14', '2021-06-24 06:00:14'),
(67, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 7, '[]', '{\"dish\":\"Ramen\",\"description\":\"noodles\",\"updated_at\":\"2021-06-25 12:39:11\",\"created_at\":\"2021-06-25 12:39:11\",\"id\":7}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:39:12', '2021-06-25 04:39:12'),
(68, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 13, '[]', '{\"category_id\":\"1\",\"menu_id\":7,\"updated_at\":\"2021-06-25 12:39:12\",\"created_at\":\"2021-06-25 12:39:12\",\"id\":13}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:39:12', '2021-06-25 04:39:12'),
(69, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Category', 5, '[]', '{\"category\":\"Fusion\",\"updated_at\":\"2021-06-25 12:39:26\",\"created_at\":\"2021-06-25 12:39:26\",\"id\":5}', 'http://localhost/dininghut/admin/category', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:39:26', '2021-06-25 04:39:26'),
(70, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Menu', 8, '[]', '{\"dish\":\"Pininyahang manok\",\"description\":\"chicken\",\"updated_at\":\"2021-06-25 12:41:38\",\"created_at\":\"2021-06-25 12:41:38\",\"id\":8}', 'http://localhost/dininghut/admin/menu', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:41:38', '2021-06-25 04:41:38'),
(71, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 14, '[]', '{\"menu_id\":\"8\",\"category_id\":\"2\",\"updated_at\":\"2021-06-25 12:42:32\",\"created_at\":\"2021-06-25 12:42:32\",\"id\":14}', 'http://localhost/dininghut/admin/tag', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:42:32', '2021-06-25 04:42:32'),
(72, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 15, '[]', '{\"menu_id\":\"4\",\"category_id\":\"4\",\"updated_at\":\"2021-06-25 12:43:11\",\"created_at\":\"2021-06-25 12:43:11\",\"id\":15}', 'http://localhost/dininghut/admin/tag', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:43:11', '2021-06-25 04:43:11'),
(73, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 16, '[]', '{\"menu_id\":\"4\",\"category_id\":\"5\",\"updated_at\":\"2021-06-25 12:43:11\",\"created_at\":\"2021-06-25 12:43:11\",\"id\":16}', 'http://localhost/dininghut/admin/tag', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:43:11', '2021-06-25 04:43:11'),
(74, 'App\\Models\\Admin', 4, 'created', 'App\\Models\\Tags', 17, '[]', '{\"menu_id\":\"8\",\"category_id\":\"5\",\"updated_at\":\"2021-06-25 12:43:30\",\"created_at\":\"2021-06-25 12:43:30\",\"id\":17}', 'http://localhost/dininghut/admin/tag', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:43:30', '2021-06-25 04:43:30'),
(75, 'App\\Models\\Admin', 4, 'deleted', 'App\\Models\\Tags', 15, '{\"id\":15,\"category_id\":4,\"menu_id\":4,\"created_at\":\"2021-06-25 12:43:11\",\"updated_at\":\"2021-06-25 12:43:11\"}', '[]', 'http://localhost/dininghut/admin/tag/15', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 04:43:39', '2021-06-25 04:43:39'),
(76, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 09:27:26', '2021-06-25 09:27:26'),
(77, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 10:39:50', '2021-06-25 10:39:50'),
(78, NULL, NULL, 'created', 'App\\Models\\User', 5, '[]', '{\"name\":\"Jofeean P. Ogario\",\"username\":\"JOgarioqwqwe\",\"contact\":\"09053139902\",\"gender\":\"Male\",\"email\":\"jofeean@gmail.comqwe\",\"code\":6979593783,\"updated_at\":\"2021-06-25 18:40:17\",\"created_at\":\"2021-06-25 18:40:17\",\"id\":5}', 'http://localhost/dininghut/user/add', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 10:40:17', '2021-06-25 10:40:17'),
(79, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 10:51:04', '2021-06-25 10:51:04'),
(80, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-25 10:58:07', '2021-06-25 10:58:07'),
(81, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 00:03:07', '2021-06-30 00:03:07'),
(82, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 00:33:11', '2021-06-30 00:33:11'),
(83, 'App\\Models\\Admin', 4, 'updated', 'App\\Models\\Admin', 4, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 01:37:44', '2021-06-30 01:37:44'),
(84, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"gender\":\"Male\",\"updated_at\":\"2021-06-23 11:53:57\"}', '{\"gender\":\"Jofeean P. Ogario\",\"updated_at\":\"2021-06-30 10:18:57\"}', 'http://localhost/dininghut/update/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 02:18:57', '2021-06-30 02:18:57'),
(85, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"name\":\"Jofeean P. Ogario\",\"updated_at\":\"2021-06-30 10:18:57\"}', '{\"name\":\"Jofeean P. Ogario 123\",\"updated_at\":\"2021-06-30 10:19:42\"}', 'http://localhost/dininghut/update/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 02:19:42', '2021-06-30 02:19:42'),
(86, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '{\"name\":\"Jofeean P. Ogario 123\",\"gender\":\"Jofeean P. Ogario\",\"updated_at\":\"2021-06-30 10:19:42\"}', '{\"name\":\"Jofeean P. Ogario\",\"gender\":\"Jofeean P. Ogario 123\",\"updated_at\":\"2021-06-30 10:19:47\"}', 'http://localhost/dininghut/update/1', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 02:19:47', '2021-06-30 02:19:47'),
(87, 'App\\Models\\User', 1, 'updated', 'App\\Models\\User', 1, '[]', '[]', 'http://localhost/dininghut/logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.114 Safari/537.36', NULL, '2021-06-30 02:20:04', '2021-06-30 02:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(1, 'Japanese', '2021-06-23 23:29:48', '2021-06-23 23:29:48'),
(2, 'Filipino', '2021-06-23 23:33:05', '2021-06-24 00:30:42'),
(4, 'Native', '2021-06-24 02:23:30', '2021-06-24 02:23:30'),
(5, 'Fusion', '2021-06-25 04:39:26', '2021-06-25 04:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, '1625045473.jpg', '2021-06-29 23:23:18', '2021-06-30 01:31:14'),
(2, '<p><span style=\"font-family: Lobster; font-size: 96px;\">About time fuckerssss</span></p>', '2021-06-29 23:23:32', '2021-06-29 23:47:54'),
(3, '<p><span style=\"font-size: 96px; font-family: Lobster;\">Dining time boisssssssssss</span></p>', '2021-06-29 23:23:32', '2021-06-29 23:49:30'),
(4, '<p><span style=\"font-family: Lobster; font-size: 96px;\">Eto ay contact</span></p>', '2021-06-29 23:23:33', '2021-06-29 23:50:58'),
(5, '<p><span style=\'font-family: \"Lobster Two\"; font-size: 96px;\'>Eto naman ay footer nang ina mo</span></p>', '2021-06-29 23:23:34', '2021-06-29 23:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dish` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `dish`, `description`, `created_at`, `updated_at`) VALUES
(3, 'Filipino Sushi', 'basta', '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(4, 'Sushi', 'basta', '2021-06-24 04:31:00', '2021-06-24 04:31:00'),
(5, 'Tinolang Manok', 'basta', '2021-06-24 05:35:26', '2021-06-24 05:35:26'),
(6, 'Soup No. 5', 'bat soup', '2021-06-24 06:00:14', '2021-06-24 06:00:14'),
(7, 'Ramen', 'noodles', '2021-06-25 04:39:11', '2021-06-25 04:39:11'),
(8, 'Pininyahang manok', 'chicken', '2021-06-25 04:41:38', '2021-06-25 04:41:38');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2021_06_16_020631_create_admins_table', 2),
(6, '2021_06_18_045348_add_name_to_admins_table', 3),
(7, '2021_06_21_081503_create_audits_table', 4),
(8, '2021_06_24_043659_create_menus_table', 5),
(9, '2021_06_24_064617_create_categories_table', 6),
(11, '2021_06_24_064536_create_tags_table', 7),
(14, '2021_06_25_190202_create_reservations_table', 8),
(15, '2021_06_29_032853_create_cms_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attendees` int(11) NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `date`, `attendees`, `time`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '30 June 2021', 12, '02:34 PM', 1, '2021-06-25 22:34:44', '2021-06-28 05:57:00'),
(2, 1, '29 June 2021', 32, '02:34 PM', 2, '2021-06-25 22:34:54', '2021-06-25 22:34:54'),
(3, 1, '30 June 2021', 123, '02:35 PM', 1, '2021-06-25 22:35:02', '2021-06-28 05:49:08'),
(4, 1, '09 July 2021', 12, '02:35 PM', 2, '2021-06-25 22:35:12', '2021-06-28 05:49:16'),
(5, 1, '30 June 2021', 21, '02:43 PM', 2, '2021-06-25 22:43:38', '2021-06-28 05:59:16'),
(6, 1, '30 June 2021', 21, '02:43 PM', 0, '2021-06-25 22:43:38', '2021-06-25 22:43:38'),
(7, 1, '30 June 2021', 21, '02:43 PM', 0, '2021-06-25 22:43:38', '2021-06-25 22:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `category_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(7, 1, 3, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(8, 2, 3, '2021-06-24 03:51:02', '2021-06-24 03:51:02'),
(10, 1, 4, '2021-06-24 04:31:00', '2021-06-24 04:31:00'),
(11, 4, 5, '2021-06-24 05:35:26', '2021-06-24 05:35:26'),
(12, 2, 6, '2021-06-24 06:00:14', '2021-06-24 06:00:14'),
(13, 1, 7, '2021-06-25 04:39:12', '2021-06-25 04:39:12'),
(14, 2, 8, '2021-06-25 04:42:32', '2021-06-25 04:42:32'),
(16, 5, 4, '2021-06-25 04:43:11', '2021-06-25 04:43:11'),
(17, 5, 8, '2021-06-25 04:43:30', '2021-06-25 04:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `contact`, `gender`, `email`, `password`, `code`, `verified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jofeean P. Ogario', 'JOgario', '09053139902', 'Jofeean P. Ogario 123', 'jofeean@gmail.com', '$2y$10$W6zIs1nMW0DPRTYP4s4OoOHgMAQ8zdL9buDRws6QvMBeJYFGHVDd6', '6774381144', 1, 'AjvcC50koAGcyQVoayB4FvUD1PF6IltH2r27vo25Y1sJjvp350V4si4tlRMF', '2021-06-12 01:39:01', '2021-06-30 02:19:47'),
(4, 'qewrqer', 'qwerqewrqwer', '123123412', 'Male', 'qwe12@gmail.com', '$2y$10$e3NDwsbR7BuV9yJnT4D7Yes6vTYIT.aP.Ag.ZqJG.C5i0oESoFaEO', '9765611516', 0, NULL, '2021-06-23 03:23:45', '2021-06-23 03:23:45'),
(5, 'Jofeean P. Ogario', 'JOgarioqwqwe', '09053139902', 'Male', 'jofeean@gmail.comqwe', '$2y$10$o.bkLPeg0zKONWbEivX0zuZOvtfnNSN8giYsNJ0hn2pkQuCOGnkda', '6979593783', 0, NULL, '2021-06-25 10:40:17', '2021-06-25 10:40:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  ADD KEY `audits_user_id_user_type_index` (`user_id`,`user_type`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservations_user_id_foreign` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tags_category_id_foreign` (`category_id`),
  ADD KEY `tags_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tags_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
