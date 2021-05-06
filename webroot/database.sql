CREATE DATABASE `maturitni-prace` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_czech_ci */;
USE `maturitni-prace`;

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci DEFAULT NULL,
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

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `description` text COLLATE utf8_czech_ci DEFAULT NULL,
  `datetime_from` datetime DEFAULT NULL,
  `datetime_to` datetime DEFAULT NULL,
  `id_tasklist` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_task`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `phonenumber` int(11) DEFAULT NULL,
  `birthdate` date NOT NULL,
  `address` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_czech_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;
