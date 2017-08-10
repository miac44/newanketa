-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 10, 2017 at 01:11 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medical_organizations`
--

CREATE TABLE IF NOT EXISTS `medical_organizations` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sessions`
--

INSERT INTO `user_sessions` (`id`, `user_id`, `hash`, `ua`, `ip`, `created_at`, `modified_at`) VALUES
(2, 1, '371159fde3693c6bdee71db903d9c0e6b7277d1c2c9d3b53e888c1377f80f862', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '127.0.0.1', '2017-08-07 21:38:17', '2017-08-07 21:38:17'),
(4, 1, 'f96ad7849b13022bbd63b60c81453fd00452831bb2f0c991b268fcea97c2654e', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36', '127.0.0.1', '2017-08-07 22:13:25', '2017-08-07 22:13:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
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
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `medical_organizations`
--
ALTER TABLE `medical_organizations`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
