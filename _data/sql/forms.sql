-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 15, 2017 at 01:01 PM
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
(1, 'Стационар МЗ', 'АНКЕТА для оценки качества оказания услуг медицинскими организациями в стационарных условиях', 'stacionar', NULL, '2017-08-10 11:32:25'),
(2, 'Амбулатория МЗ', 'АНКЕТА\r\nдля оценки качества оказания услуг медицинскими организациями\r\nв амбулаторных условиях', 'ambulatoria', NULL, '2017-08-10 11:32:25'),
(3, 'Амбулатория (Приказ 240)', 'АНКЕТА для оценки качества оказания услуг медицинскими организациями в амбулаторных условиях (Приказ N240)', 'ambulatoria_240', NULL, '2017-08-10 11:32:25'),
(4, 'Стационар (Приказ 240)', 'АНКЕТА\r\nдля оценки качества оказания услуг медицинскими\r\nорганизациями в стационарных условиях (Приказ N240)', 'stacionar_240', '2017-08-13 14:00:37', '2017-08-13 14:00:37');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
