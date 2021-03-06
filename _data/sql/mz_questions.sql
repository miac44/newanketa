-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 29, 2017 at 05:44 PM
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
-- Table structure for table `mz_questions`
--

CREATE TABLE IF NOT EXISTS `mz_questions` (
  `id` bigint(20) unsigned NOT NULL,
  `alias` varchar(512) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mz_questions`
--

INSERT INTO `mz_questions` (`id`, `alias`, `text`, `created_at`, `modified_at`) VALUES
(1, 'ambulatoria', '1. Вы обратились в медицинскую организацию?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(2, 'ambulatoria', '2. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового терапевта?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(3, 'ambulatoria', '3. Удовлетворены ли Вы компетентностью участкового терапевта?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(4, 'ambulatoria', '4. Что именно Вас не удовлетворило?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(5, 'ambulatoria', '5. Форма обращения', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(6, 'ambulatoria', '6. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(7, 'ambulatoria', '7. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового педиатра?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(8, 'ambulatoria', '8. Удовлетворены ли Вы компетентностью участкового педиатра?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(9, 'ambulatoria', '9. Что именно Вас не удовлетворило?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(10, 'ambulatoria', '10. Форма обращения', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(11, 'ambulatoria', '11. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(12, 'ambulatoria', '12. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врача общей практики (семейного врача)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(13, 'ambulatoria', '13. Удовлетворены ли Вы компетентностью врача общей практики (семейного врача)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(14, 'ambulatoria', '14. Что именно Вас не удовлетворило?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(15, 'ambulatoria', '15. Форма обращения', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(16, 'ambulatoria', '16. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(17, 'ambulatoria', '17. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(18, 'ambulatoria', '18. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(19, 'ambulatoria', '19. Что именно Вас не удовлетворило?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(20, 'ambulatoria', '20. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(21, 'ambulatoria', '21. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие) ?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(22, 'ambulatoria', '22. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(23, 'ambulatoria', '23. Что именно Вас не удовлетворило?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(24, 'ambulatoria', '24. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(25, 'ambulatoria', '25. При первом обращении в медицинскую организацию Вы сразу записались на прием к врачу (получили талон с указанием времени приема и ФИО врача) (вызвали врача на дом)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(26, 'ambulatoria', '26. Вы записались на прием к врачу (вызвали врача на дом)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(27, 'ambulatoria', '27. По какой причине', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(28, 'ambulatoria', '28. Врач Вас принял во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(29, 'ambulatoria', '29. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(30, 'ambulatoria', '30. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(31, 'ambulatoria', '31. Перед обращением в медицинскую организацию Вы заходили на официальный сайт медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(32, 'ambulatoria', '32. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(33, 'ambulatoria', '33. Вы удовлетворены условиями пребывания в медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(34, 'ambulatoria', '34. Что не удовлетворяет?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(35, 'ambulatoria', '35. Имеете ли Вы установленную группу ограничения трудоспособности?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(36, 'ambulatoria', '36. Какую группу ограничения трудоспособности Вы имеете?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(37, 'ambulatoria', '37. Медицинская организация оборудована для лиц с ограниченными возможностями?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(38, 'ambulatoria', '38. Пожалуйста, укажите что именно отсутствует', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(39, 'ambulatoria', '39. Вы ожидали проведения диагностического исследования (инструментального, лабораторного) с момента получения направления на диагностическое исследование?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(40, 'ambulatoria', '40. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(41, 'ambulatoria', '41. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(42, 'ambulatoria', '42. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(43, 'ambulatoria', '43. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(44, 'ambulatoria', '44. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(45, 'ambulatoria', '45. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(46, 'ambulatoria', '46. Вы ожидали проведение диагностического исследования (компьютерная томография, магнитно-резонансная томография, ангиография) с момента получения направления на диагностическое исследование?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(47, 'ambulatoria', '47. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(48, 'ambulatoria', '48. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(49, 'ambulatoria', '49. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(50, 'ambulatoria', '50. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(51, 'ambulatoria', '51. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(52, 'ambulatoria', '52. Диагностическое исследование выполнено во время, установленное по записи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(53, 'ambulatoria', '53. Вы удовлетворены оказанными услугами в этой медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(54, 'ambulatoria', '54. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(55, 'ambulatoria', '55. Ваше обслуживание в медицинской организации?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(56, 'ambulatoria', '56. Вы знаете своего участкового терапевта (педиатра, врача общей практики (семейного врача) (ФИО, график работы, № кабинета и др.)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(57, 'ambulatoria', '57. Как часто Вы обращаетесь к участковому терапевту (педиатру, врачу общей практики (семейному врачу)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(58, 'ambulatoria', '58. Как часто Вы обращаетесь к врачам-специалистам (лор, хирург, невролог, офтальмолог, стоматолог и другие)?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(59, 'ambulatoria', '59. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(60, 'ambulatoria', '60. Характеристика комментария', '2017-08-29 13:49:46', '2017-08-29 13:49:46'),
(61, 'stacionar', '1. Госпитализация была:', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(62, 'stacionar', '2. Срок ожидания плановой госпитализации с момента получения направления на плановую госпитализацию?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(63, 'stacionar', '3. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(64, 'stacionar', '4. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(65, 'stacionar', '5. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(66, 'stacionar', '6. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(67, 'stacionar', '7. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(68, 'stacionar', '8. Вы были госпитализированы в назначенный срок?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(69, 'stacionar', '9. Вы удовлетворены условиями пребывания в приемном отделении?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(70, 'stacionar', '10. Что не удовлетворяет?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(71, 'stacionar', '11. Сколько времени Вы ожидали в приемном отделении? ', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(72, 'stacionar', '12. Вы удовлетворены отношением персонала во время пребывания в приемном отделении (доброжелательность, вежливость)?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(73, 'stacionar', '13. Вы были госпитализированы:', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(74, 'stacionar', '14. Имеете ли Вы установленную группу ограничения трудоспособности?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(75, 'stacionar', '15. Какую группу ограничения трудоспособности Вы имеете?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(76, 'stacionar', '16. Медицинская организация оборудована для лиц с ограниченными возможностями? ', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(77, 'stacionar', '17. Пожалуйста, укажите что именно отсутствует', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(78, 'stacionar', '18. Перед госпитализацией Вы заходили на официальный сайт медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(79, 'stacionar', '19. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(80, 'stacionar', '20. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(81, 'stacionar', '21. Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации? ', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(82, 'stacionar', '22. В каком режиме стационара Вы проходили лечение?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(83, 'stacionar', '23. Удовлетворены ли Вы питанием во время пребывания в медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(84, 'stacionar', '24. Вы удовлетворены отношением персонала во время пребывания в отделении (доброжелательность, вежливость)?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(85, 'stacionar', '25. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные лекарственные средства за свой счет?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(86, 'stacionar', '26. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные диагностические исследования за свой счет?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(87, 'stacionar', '27. Необходимость:', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(88, 'stacionar', '28. Удовлетворены ли Вы компетентностью медицинских работников медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(89, 'stacionar', '29. Что не удовлетворяет?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(90, 'stacionar', '30. Удовлетворены ли Вы условиями пребывания в медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(91, 'stacionar', '31. Что не удовлетворяет?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(92, 'stacionar', '32. Удовлетворены ли Вы оказанными услугами в медицинской организации?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(93, 'stacionar', '33. Удовлетворены ли Вы действиями персонала медицинской организации по уходу?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(94, 'stacionar', '34. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(95, 'stacionar', '35. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', '2017-08-29 13:50:49', '2017-08-29 13:50:49'),
(96, 'stacionar', '36. Характеристика комментария', '2017-08-29 13:50:49', '2017-08-29 13:50:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mz_questions`
--
ALTER TABLE `mz_questions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mz_questions`
--
ALTER TABLE `mz_questions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=97;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
