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
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) unsigned NOT NULL,
  `form_id` bigint(20) NOT NULL,
  `text` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `required` bigint(1) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `form_id`, `text`, `type`, `required`, `parent_id`, `created_at`, `modified_at`) VALUES
(1, 1, '1. Госпитализация была:', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(2, 1, 'Срок ожидания плановой госпитализации с момента получения направления на плановую госпитализацию?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(3, 1, 'Вы были госпитализированы в назначенный срок?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(4, 1, 'Вы удовлетворены условиями пребывания в приемном отделении?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(5, 1, 'Что не удовлетворяет?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(6, 1, 'Сколько времени Вы ожидали в приемном отделении?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(7, 1, 'Вы удовлетворены отношением персонала во время пребывания в приемном отделении (доброжелательность, вежливость)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(8, 1, '2. Вы были госпитализированы?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(9, 1, '3. Имеете ли Вы установленную группу ограничения трудоспособности?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(10, 1, 'Какую группу ограничения трудоспособности Вы имеете?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(11, 1, 'Медицинская организация оборудована для лиц с ограниченными возможностями?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(12, 1, 'Пожалуйста, укажите что именно отсутствует', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(13, 1, '4. Перед госпитализаций Вы заходили на официальный сайт медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(14, 1, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(15, 1, '5. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(16, 1, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(17, 1, '6. В каком режиме стационара Вы проходили лечение?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(18, 1, 'Удовлетворены ли Вы питанием во время пребывания в медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(19, 1, 'Вы удовлетворены отношением персонала во время пребывания в отделении (доброжелательность, вежливость)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(20, 1, 'Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные лекарственные средства за свой счет?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(21, 1, 'Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные диагностические исследования за свой счет?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(22, 1, 'Необходимость:', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(23, 1, '7. Удовлетворены ли Вы компетентностью медицинских работников медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(24, 1, 'Что именно Вас не удовлетворило?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(25, 1, '8. Удовлетворены ли Вы условиями пребывания в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(26, 1, 'Что не удовлетворяет?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(27, 1, '9. Удовлетворены ли Вы оказанными услугами в этой медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(28, 1, '10. Удовлетворены ли Вы действиями персонала медицинской организации по уходу?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(29, 1, '11. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(30, 1, '12. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(31, 1, 'Характеристика комментария', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(35, 2, '1. Вы обратились в медицинскую организацию?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(36, 2, '2. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у участкового терапевта (педиатра, врача общей практики (семейного врача)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(37, 2, '3. Удовлетворены ли Вы компетентностью участкового терапевта (педиатра, врача общей практики (семейного врача)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(38, 2, 'Что именно Вас не удовлетворило?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(39, 2, '4. Форма обращения', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(40, 2, '5. Время ожидания приема у врача, к которому Вы записались, с момента записи на прием?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(41, 2, '2. Вы удовлетворены обслуживанием (доброжелательность, вежливость) у врачей- специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(42, 2, '3. Удовлетворены ли Вы компетентностью врачей-специалистов (лор, хирург, невролог, офтальмолог, стоматолог, другие)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(43, 2, 'Что именно Вас не удовлетворило?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(44, 2, '5. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(45, 2, '6. При первом обращении в медицинскую\nорганизацию Вы сразу записались на прием к врачу (получили талон с указанием времени приема и ФИО врача)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(46, 2, 'Вы записались на прием к врачу (вызвали врача на дом)?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(47, 2, 'По какой причине', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(48, 2, '7. Врач Вас принял во время, установленное по записи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(49, 2, '8. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(50, 2, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(51, 2, '9. Перед обращением в медицинскую\r\nорганизацию Вы заходили на официальный\r\nсайт медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(52, 2, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(53, 2, '10. Вы удовлетворены условиями пребывания в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(54, 2, 'Что не удовлетворяет?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(55, 2, '11. Имеете ли Вы установленную группу ограничения трудоспособности?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(56, 2, 'Какую группу ограничения трудоспособности Вы имеете?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(57, 2, 'Медицинская организация оборудована для лиц с ограниченными возможностями?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(58, 2, 'Пожалуйста, укажите что именно отсутствует', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(59, 2, '12. Вы ожидали проведения диагностического исследования (инструментального, лабораторного) с момента получения направления на диагностическое исследование?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(60, 2, 'Диагностическое исследование выполнено во время, установленное по записи?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(61, 2, '13. Вы ожидали проведения диагностического исследования (компьютерная томография, магнитно-резонансная томография, ангиография) с момента получения направления на диагностическое исследование?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(62, 2, 'Диагностическое исследование выполнено во время, установленное по записи?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(63, 2, '14. Вы удовлетворены оказанными услугами в этой медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(64, 2, '15. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(65, 2, '16. Ваше обслуживание в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(69, 2, '20. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(70, 2, 'Характеристика комментария', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(74, 3, '1. Причина, по которой Вы обратились в медицинскую организацию?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(75, 3, '2. Ваше обслуживание в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(76, 3, '3. Имеете ли Вы установленную группу ограничения трудоспособности?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(77, 3, 'Какую группу ограничения трудоспособности Вы имеете?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(78, 3, 'Медицинская организация оборудована для лиц с ограниченными возможностями?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(79, 3, '', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(80, 3, '4. При первом обращении в медицинскую организацию Вы сразу записались на прием к врачу (получили талон с указанием времени приема и ФИО врача)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(81, 3, '5. Вы записались на прием к врачу?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(82, 3, '6. Срок ожидания приема у врача, к которому Вы записались, с момента записи на прием (устанавливается в соответствии с территориальной программой государственных гарантий бесплатного оказания гражданам медицинской помощи)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(83, 3, '7. Врач Вас принял во время, установленное по записи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(84, 3, '8. Вы удовлетворены условиями пребывания в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(85, 3, 'Что не удовлетворяет?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(86, 3, '9. Перед посещением врача Вы заходили на официальный сайт медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(87, 3, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(88, 3, '10. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(89, 3, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(90, 3, '11. Вы знаете своего участкового терапевта (педиатра) (ФИО, график работы, N кабинета и др.)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(91, 3, '12. Как часто Вы обращаетесь к участковому терапевту (педиатру)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(92, 3, '13. Вы удовлетворены обслуживанием у участкового терапевта (педиатра) (доброжелательность, вежливость)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(93, 3, '14. Удовлетворены ли Вы компетентностью участкового врача (педиатра)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(94, 3, '', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(95, 3, '15. Как часто Вы обращаетесь к узким специалистам (лор, хирург, невролог, офтальмолог и др.)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(96, 3, '16. Вы удовлетворены обслуживанием у узких специалистов (доброжелательность, вежливость)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(97, 3, '17. Удовлетворены ли вы компетентностью узких специалистов?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(98, 3, '', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(99, 3, '18. Срок ожидания диагностического исследования (диагностические инструментальные и лабораторные исследования) с момента получения направления на диагностическое исследование (устанавливается в соответствии с территориальной программой государственных гарантий бесплатного оказания гражданам медицинской помощи)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(100, 3, '19. Срок ожидания диагностического исследования (компьютерная томография, магнитно-резонансная томография, ангиография) с момента получения направления на диагностическое исследование (устанавливается в соответствии с территориальной программой государственных гарантий бесплатного оказания гражданам медицинской помощи)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(101, 3, '20. Вы удовлетворены оказанными услугами в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(102, 3, '21. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(103, 3, '22. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(104, 3, '23. Вы благодарили персонал медицинской организации за оказанные Вам медицинские услуги?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(105, 3, 'Кто был инициатором благодарения?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(106, 3, 'Форма благодарения:', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(107, 4, '1. Госпитализация была:', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(108, 4, '2. Вы были госпитализированы:', 'radio', 2, NULL, NULL, '2017-08-15 09:42:02'),
(109, 4, '3. Имеете ли Вы установленную группу ограничения трудоспособности?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(110, 4, 'Какую группу ограничения трудоспособности Вы имеете?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(111, 4, 'Медицинская организация оборудована для лиц с ограниченными возможностями?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(112, 4, '', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(113, 4, '4. Перед госпитализацией Вы заходили на официальный сайт медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(114, 4, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной на официальном сайте медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(115, 4, '5. При обращении в медицинскую организацию Вы обращались к информации, размещенной в помещениях медицинской организации (стенды, инфоматы и др.)?\r\n', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(116, 4, 'Удовлетворены ли Вы качеством и полнотой информации о работе медицинской организации и порядке предоставления медицинских услуг, доступной в помещениях медицинской организации?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(117, 4, '6. В каком режиме стационара Вы проходили лечение?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(118, 4, '7. Вы удовлетворены условиями пребывания в приемном отделении?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(119, 4, 'Что не удовлетворяет?', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(120, 4, '8. Сколько времени Вы ожидали в приемном отделении?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(121, 4, '9. Вы удовлетворены отношением персонала во время пребывания в приемном отделении (доброжелательность, вежливость)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(122, 4, '10. Вы удовлетворены отношением персонала во время пребывания в отделении (доброжелательность, вежливость)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(123, 4, '11. Срок ожидания плановой госпитализации с момента получения направления на плановую госпитализацию (устанавливается в соответствии с территориальной программой государственных гарантий бесплатного оказания гражданам медицинской помощи)?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(124, 4, '12. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные лекарственные средства за свой счет?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(125, 4, '13. Возникала ли у Вас во время пребывания в стационаре необходимость оплачивать назначенные диагностические исследования за свой счет?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(126, 4, 'Необходимость:', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(127, 4, '14. Удовлетворены ли Вы компетентностью медицинских работников медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(128, 4, '', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(129, 4, '15. Удовлетворены ли Вы питанием во время пребывания в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(130, 4, '16. Удовлетворены ли Вы условиями пребывания в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(131, 4, '', 'checkbox', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(132, 4, '17. Удовлетворены ли Вы оказанными услугами в медицинской организации?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(133, 4, '18. Удовлетворены ли Вы действиями персонала медицинской организации по уходу?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(134, 4, '19. Рекомендовали бы Вы данную медицинскую организацию для получения медицинской помощи?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(135, 4, '20. Оставляли ли Вы комментарий о качестве обслуживания в медицинской организации и о медицинских работниках этой организации в социальных сетях?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(136, 4, '21. Вы благодарили персонал медицинской организации за оказанные Вам медицинские услуги?', 'radio', 1, NULL, NULL, '2017-08-15 09:42:02'),
(137, 4, 'Кто был инициатором благодарения?', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02'),
(138, 4, 'Форма благодарения:', 'radio', NULL, NULL, NULL, '2017-08-15 09:42:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=139;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;