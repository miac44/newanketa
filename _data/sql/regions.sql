-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 13, 2017 at 06:22 PM
-- Server version: 5.7.16
-- PHP Version: 7.1.0

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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
