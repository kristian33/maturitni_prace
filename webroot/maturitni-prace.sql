-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_czech_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `comment` (`id_comment`, `content`, `task_id`, `user_id`, `created_at`) VALUES
(21,	'lol',	8,	14,	'2021-05-04 15:59:42'),
(20,	'lol',	8,	14,	'2021-05-04 15:59:31');

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci,
  PRIMARY KEY (`id_role`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `roles` (`id_role`, `name`, `description`) VALUES
(1,	'NEVYPLNĚNO',	'-'),
(2,	'ZADAVATEL',	'Má přístup k:\r\nzobrazení seznamů úkolů,\r\nzobrazení konkrétního seznamu úkolů,\r\nzobrazení detailu úkolu,\r\npřidání úkolu do konkrétního seznamu úkolů,\r\nkomentování úkolu.\r\n'),
(3,	'REALIZÁTOR',	'má přístup k:\r\nzobrazení seznamů úkolů,\r\nzobrazení konkrétního seznamu úkolů,\r\nzobrazení detailu úkolu,\r\npřidání úkolu do konkrétního seznamu úkolů,\r\nkomentování úkolu.\r\n'),
(4,	'ADMINISTRÁTOR',	'má:\r\npřístup všech předešlých rolí,\r\nnavíc může přidávat uživatele,\r\npřidělovat jim role, \r\nměnit hesla a jejich údaje. \r\n');

DROP TABLE IF EXISTS `tasklists`;
CREATE TABLE `tasklists` (
  `id_tasklist` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_tasklist`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `tasklists` (`id_tasklist`, `name`, `description`, `created_at`) VALUES
(6,	'Kdo vyhraje?',	'Vyhraju já nebo maturitní práce?',	'2021-05-11 13:52:00'),
(5,	'MOP',	'Musím to dobře obkecat',	'2021-05-04 15:54:11');

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci,
  `datetime_from` datetime DEFAULT NULL,
  `datetime_to` datetime DEFAULT NULL,
  `id_tasklist` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_task`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `tasks` (`id_task`, `title`, `description`, `datetime_from`, `datetime_to`, `id_tasklist`) VALUES
(10,	'Úkoly do školy LOL',	'Musím dodělat tasklisty',	'2021-05-05 14:15:00',	'2021-05-06 14:15:00',	6),
(8,	'Obhajoba MOP ',	'Obhajoba Maturitní odborné práce z jazyka PHP',	'2021-05-11 13:30:00',	'2021-05-11 14:30:00',	5);

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`lastname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

INSERT INTO `users` (`id_user`, `email`, `password`, `firstname`, `lastname`, `address`, `city`, `id_role`, `created_at`) VALUES
(14,	'klimo@klimo.cz',	'$2a$09$anexamplestringforsaledUHHNOISQNlLu.C.kQVuPwU2XriALXS',	'Kristián',	'Klimek',	'Klimkovice 123',	'Klimkovice',	4,	'2021-05-04 15:37:22');

-- 2021-05-05 22:07:51