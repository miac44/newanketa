-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2017 at 05:12 PM
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
-- Table structure for table `medicalorganization_to_form`
--

CREATE TABLE IF NOT EXISTS `medicalorganization_to_form` (
  `id` bigint(20) unsigned NOT NULL,
  `medicalorganization_id` int(20) NOT NULL,
  `form_id` int(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicalorganization_to_form`
--

INSERT INTO `medicalorganization_to_form` (`id`, `medicalorganization_id`, `form_id`, `created_at`, `modified_at`) VALUES
(1, 49, 7, '2017-08-24 14:04:40', '2017-08-24 14:04:40'),
(2, 50, 7, '2017-08-24 14:04:40', '2017-08-24 14:04:40'),
(3, 51, 7, '2017-08-24 14:04:40', '2017-08-24 14:04:40'),
(4, 52, 7, '2017-08-24 14:04:40', '2017-08-24 14:04:40'),
(5, 47, 6, '2017-08-24 14:05:11', '2017-08-24 14:05:11'),
(6, 48, 6, '2017-08-24 14:05:11', '2017-08-24 14:05:11'),
(8, 41, 8, '2017-08-24 14:06:08', '2017-08-24 14:06:08'),
(9, 44, 8, '2017-08-24 14:06:08', '2017-08-24 14:06:08'),
(10, 45, 8, '2017-08-24 14:06:08', '2017-08-24 14:06:08'),
(34, 43, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(35, 53, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(36, 54, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(37, 55, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(38, 56, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(39, 57, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(40, 58, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(41, 59, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(42, 60, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(43, 61, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(44, 62, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(45, 63, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(46, 64, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(47, 65, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(48, 66, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(49, 67, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(50, 68, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(51, 69, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(52, 70, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(53, 71, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(54, 72, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(55, 73, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(56, 74, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03'),
(57, 75, 5, '2017-08-24 14:11:03', '2017-08-24 14:11:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medicalorganization_to_form`
--
ALTER TABLE `medicalorganization_to_form`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `medicalorganization_to_form`
--
ALTER TABLE `medicalorganization_to_form`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
