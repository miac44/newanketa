-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2017 at 06:50 PM
-- Server version: 5.7.13
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newanketa`
--

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE IF NOT EXISTS `forms` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `name`, `description`, `action`, `created_at`, `modified_at`) VALUES
(1, 'Стационар МЗ', 'АНКЕТА\r\nдля оценки качества оказания услуг медицинскими организациями\r\nв стационарных условиях', 'stacionar', NULL, '2017-08-10 11:32:25'),
(2, 'Амбулатория МЗ', 'АНКЕТА\r\nдля оценки качества оказания услуг медицинскими организациями\r\nв амбулаторных условиях', 'ambulatoria', NULL, '2017-08-10 11:32:25'),
(3, 'Амбулатория (Приказ 240)', 'АНКЕТА для оценки качества оказания услуг медицинскими организациями в амбулаторных условиях (Приказ N240)', 'ambulatoria_240', NULL, '2017-08-10 11:32:25'),
(4, 'Стационар (Приказ 240)', 'АНКЕТА\nдля оценки качества оказания услуг медицинскими\nорганизациями в стационарных условиях (Приказ N240)', 'stacionar_240', NULL, '2017-08-10 11:32:25');

-- --------------------------------------------------------

--
-- Table structure for table `medicalorganization_to_form`
--

CREATE TABLE IF NOT EXISTS `medicalorganization_to_form` (
  `id` bigint(20) unsigned NOT NULL,
  `medicalorganization_id` int(20) NOT NULL,
  `form_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicalorganization_to_form`
--

INSERT INTO `medicalorganization_to_form` (`id`, `medicalorganization_id`, `form_id`, `created_at`, `modified_at`) VALUES
(7, 12, 3, '2017-08-10 13:53:34', '2017-08-10 13:53:34'),
(8, 12, 4, '2017-08-10 13:53:34', '2017-08-10 13:53:34'),
(9, 15, 3, '2017-08-10 14:00:42', '2017-08-10 14:00:42'),
(10, 15, 4, '2017-08-10 14:00:42', '2017-08-10 14:00:42'),
(11, 16, 3, '2017-08-10 14:02:05', '2017-08-10 14:02:05'),
(12, 16, 4, '2017-08-10 14:02:05', '2017-08-10 14:02:05'),
(13, 17, 3, '2017-08-10 14:02:17', '2017-08-10 14:02:17'),
(14, 17, 4, '2017-08-10 14:02:17', '2017-08-10 14:02:17'),
(15, 18, 3, '2017-08-10 14:05:02', '2017-08-10 14:05:02'),
(16, 18, 4, '2017-08-10 14:05:02', '2017-08-10 14:05:02'),
(17, 19, 3, '2017-08-10 14:05:46', '2017-08-10 14:05:46'),
(18, 19, 4, '2017-08-10 14:05:46', '2017-08-10 14:05:46'),
(19, 20, 3, '2017-08-10 14:05:48', '2017-08-10 14:05:48'),
(20, 20, 4, '2017-08-10 14:05:48', '2017-08-10 14:05:48'),
(21, 21, 3, '2017-08-10 14:07:51', '2017-08-10 14:07:51'),
(22, 21, 4, '2017-08-10 14:07:51', '2017-08-10 14:07:51'),
(23, 22, 3, '2017-08-10 14:08:57', '2017-08-10 14:08:57'),
(24, 22, 4, '2017-08-10 14:08:57', '2017-08-10 14:08:57'),
(25, 23, 3, '2017-08-10 14:09:50', '2017-08-10 14:09:50'),
(26, 23, 4, '2017-08-10 14:09:50', '2017-08-10 14:09:50'),
(27, 24, 3, '2017-08-10 14:11:45', '2017-08-10 14:11:45'),
(28, 24, 4, '2017-08-10 14:11:45', '2017-08-10 14:11:45'),
(29, 25, 3, '2017-08-10 14:11:47', '2017-08-10 14:11:47'),
(30, 25, 4, '2017-08-10 14:11:47', '2017-08-10 14:11:47'),
(35, 28, 3, '2017-08-10 14:12:34', '2017-08-10 14:12:34'),
(36, 28, 4, '2017-08-10 14:12:34', '2017-08-10 14:12:34'),
(44, 0, 2, '2017-08-10 15:48:56', '2017-08-10 15:48:56'),
(45, 0, 4, '2017-08-10 15:48:56', '2017-08-10 15:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `medical_organizations`
--

CREATE TABLE IF NOT EXISTS `medical_organizations` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `region_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_organizations`
--

INSERT INTO `medical_organizations` (`id`, `name`, `region_id`, `created_at`, `modified_at`) VALUES
(1, '1-я организация', 0, NULL, '2017-08-10 11:02:16'),
(2, '2-я организация', 0, NULL, '2017-08-10 11:02:16'),
(5, 'sdadasd', 1, '2017-08-10 13:01:56', '2017-08-10 13:01:56'),
(6, 'fasdfsdfdsfsdfsdff', 1, '2017-08-10 13:20:41', '2017-08-10 13:20:41'),
(7, 'fasdfsdfdsfsdfsdff', 1, '2017-08-10 13:26:42', '2017-08-10 13:26:42'),
(8, 'fasdfsdfdsfsdfsdff', 1, '2017-08-10 13:29:43', '2017-08-10 13:29:43'),
(9, 'fasdfsdfdsfsdfsdff', 1, '2017-08-10 13:30:25', '2017-08-10 13:30:25'),
(10, 'fasdfsdfdsfsdfsdff', 1, '2017-08-10 13:30:52', '2017-08-10 13:30:52'),
(12, 'новая', 11, '2017-08-10 13:52:05', '2017-08-10 13:52:05'),
(14, 'новая', 11, '2017-08-10 13:53:34', '2017-08-10 13:53:34'),
(15, 'новая', 11, '2017-08-10 14:00:42', '2017-08-10 14:00:42'),
(16, 'новая', 11, '2017-08-10 14:02:05', '2017-08-10 14:02:05'),
(17, 'новая', 11, '2017-08-10 14:02:17', '2017-08-10 14:02:17'),
(18, 'новая', 11, '2017-08-10 14:05:02', '2017-08-10 14:05:02'),
(19, 'новая', 11, '2017-08-10 14:05:46', '2017-08-10 14:05:46'),
(20, 'новая', 11, '2017-08-10 14:05:48', '2017-08-10 14:05:48'),
(21, 'новая', 11, '2017-08-10 14:07:51', '2017-08-10 14:07:51'),
(22, 'новая', 11, '2017-08-10 14:08:57', '2017-08-10 14:08:57'),
(23, 'новая', 11, '2017-08-10 14:09:50', '2017-08-10 14:09:50'),
(24, 'новая', 11, '2017-08-10 14:11:45', '2017-08-10 14:11:45'),
(25, 'новая', 11, '2017-08-10 14:11:47', '2017-08-10 14:11:47'),
(28, 'новая', 11, '2017-08-10 14:12:34', '2017-08-10 14:12:34');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE IF NOT EXISTS `regions` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `created_at`, `modified_at`) VALUES
(1, 'Костромской район', NULL, '2017-08-10 10:11:01'),
(2, 'Антроповский район', NULL, '2017-08-10 10:11:01'),
(3, 'Буйский район', NULL, '2017-08-10 10:11:01'),
(4, 'Волгореченский район', NULL, '2017-08-10 10:11:01'),
(5, 'Вохомский район', NULL, '2017-08-10 10:11:01'),
(6, 'Галичский район', NULL, '2017-08-10 10:11:01'),
(7, 'Кадыйский район', NULL, '2017-08-10 10:11:01'),
(8, 'Кологривский район', NULL, '2017-08-10 10:11:01'),
(9, 'Красносельский район', NULL, '2017-08-10 10:11:01'),
(10, 'Макарьевский район', NULL, '2017-08-10 10:11:01'),
(11, 'Мантуровский район', NULL, '2017-08-10 10:11:01'),
(12, 'Межевской район', NULL, '2017-08-10 10:11:01'),
(13, 'Нейский район', NULL, '2017-08-10 10:11:01'),
(14, 'Нерехтский район', NULL, '2017-08-10 10:11:01'),
(15, 'Октябрьский район', NULL, '2017-08-10 10:11:01'),
(16, 'Островский район', NULL, '2017-08-10 10:11:01'),
(17, 'Павинский район', NULL, '2017-08-10 10:11:01'),
(18, 'Парфеньевский район', NULL, '2017-08-10 10:11:01'),
(19, 'Поназыревский район', NULL, '2017-08-10 10:11:01'),
(20, 'Пыщугский район', NULL, '2017-08-10 10:11:01'),
(21, 'Солигалический район', NULL, '2017-08-10 10:11:01'),
(22, 'Судиславский район', NULL, '2017-08-10 10:11:01'),
(23, 'Сусанинский район', NULL, '2017-08-10 10:11:01'),
(24, 'Чухломский район', NULL, '2017-08-10 10:11:01'),
(25, 'Шарьинский район', NULL, '2017-08-10 10:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `name`, `password`, `created_at`, `modified_at`) VALUES
(1, 'admin', 'Антон Шатунов', '$2y$10$qCmNUAvkR1XixAOEmiSDP.z8M77qZb1K5lxSP1ffj9O.Vesh46.sy', NULL, '2017-06-24 13:22:16'),
(2, 'another', 'Другой Админ', 'йцуйцуйц', NULL, '2017-08-07 13:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `user_sessions`
--

CREATE TABLE IF NOT EXISTS `user_sessions` (
  `id` bigint(20) unsigned NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `hash` varchar(512) NOT NULL,
  `ua` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`, `ua`, `ip`, `created_at`, `modified_at`) VALUES
(2, 1, '371159fde3693c6bdee71db903d9c0e6b7277d1c2c9d3b53e888c1377f80f862', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '127.0.0.1', '2017-08-07 21:38:17', '2017-08-07 21:38:17'),
(4, 1, 'f96ad7849b13022bbd63b60c81453fd00452831bb2f0c991b268fcea97c2654e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '127.0.0.1', '2017-08-07 22:13:25', '2017-08-07 22:13:25'),
(6, 1, '7ca6c3a3185d8bcd758f402cd87ba4e92ea8e49a7ecd4183581485b7d416571c', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/60.0.3112.90 Safari/537.36', '127.0.0.1', '2017-08-10 14:59:15', '2017-08-10 14:59:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD UNIQUE KEY `anketa_id` (`id`),
  ADD UNIQUE KEY `action` (`action`);

--
-- Indexes for table `medicalorganization_to_form`
--
ALTER TABLE `medicalorganization_to_form`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `medical_organizations`
--
ALTER TABLE `medical_organizations`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `user_sessions`
--
ALTER TABLE `user_sessions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `medicalorganization_to_form`
--
ALTER TABLE `medicalorganization_to_form`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `medical_organizations`
--
ALTER TABLE `medical_organizations`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_sessions`
--
ALTER TABLE `user_sessions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
