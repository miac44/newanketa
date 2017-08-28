-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2017 at 06:24 PM
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
-- Table structure for table `actions`
--

CREATE TABLE IF NOT EXISTS `actions` (
  `id` bigint(20) unsigned NOT NULL,
  `answer_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `action_object` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `actions`
--

INSERT INTO `actions` (`id`, `answer_id`, `question_id`, `action_object`, `created_at`, `modified_at`) VALUES
(1, 511, 167, 'show', '2017-08-24 14:48:55', '2017-08-24 14:48:55'),
(2, 510, 167, 'hide', '2017-08-24 14:48:55', '2017-08-24 14:48:55'),
(3, 521, 170, 'show', '2017-08-24 14:51:30', '2017-08-24 14:51:30'),
(4, 522, 170, 'hide', '2017-08-24 14:51:30', '2017-08-24 14:51:30'),
(5, 543, 179, 'show', '2017-08-24 14:55:00', '2017-08-24 14:55:00'),
(6, 544, 179, 'hide', '2017-08-24 14:55:00', '2017-08-24 14:55:00'),
(7, 530, 174, 'show', '2017-08-24 14:55:50', '2017-08-24 14:55:50'),
(8, 529, 174, 'hide', '2017-08-24 14:55:50', '2017-08-24 14:55:50'),
(9, 525, 172, 'show', '2017-08-24 15:23:20', '2017-08-24 15:23:20'),
(10, 526, 172, 'hide', '2017-08-24 15:23:20', '2017-08-24 15:23:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actions`
--
ALTER TABLE `actions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actions`
--
ALTER TABLE `actions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
