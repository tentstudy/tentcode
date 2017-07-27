-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `code`;
CREATE TABLE `code` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_code` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(4) DEFAULT '1',
  `create_at` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `seen` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_code` (`id_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `code` (`id`, `id_code`, `title`, `language`, `id_user`, `public`, `create_at`, `update_time`, `seen`) VALUES
(2,	'C3IkdUvX',	'Untitled',	NULL,	'1905472106359672',	1,	1501149196,	1501149196,	0),
(3,	'rTwIQe9R',	'Untitled',	NULL,	'1905472106359672',	1,	1501149207,	1501149207,	0),
(4,	'l71ynuHt',	'Untitled',	NULL,	'1905472106359672',	1,	1501149242,	1501149242,	0),
(5,	'pQZVachd',	'Untitled',	NULL,	'1905472106359672',	1,	1501149300,	1501149300,	0),
(6,	'DQa7ErfG',	'Untitled',	NULL,	'1905472106359672',	1,	1501149448,	1501149448,	0),
(7,	'B6wtZ5jo',	'Untitled',	NULL,	'1905472106359672',	1,	1501149467,	1501149467,	0),
(8,	'7PS0cNIU',	'Untitled',	NULL,	'1905472106359672',	1,	1501149488,	1501149488,	0),
(9,	'Z5cKOFYs',	'Untitled',	NULL,	'1905472106359672',	1,	1501149489,	1501149489,	0),
(10,	'tf8IaSPk',	'Untitled',	NULL,	'1905472106359672',	1,	1501149494,	1501149494,	0),
(11,	'DUNgKLyA',	'Untitled',	NULL,	'1905472106359672',	1,	1501149496,	1501149496,	0),
(14,	'6MebDqmE',	'Untitled',	NULL,	'1905472106359672',	1,	1501149936,	1501149936,	0),
(15,	'ejo5Fxad',	'Untitled',	NULL,	'1905472106359672',	1,	1501149939,	1501149939,	0),
(16,	'fu7FUAxU',	'Untitled',	NULL,	'1905472106359672',	1,	1501149969,	1501149969,	0),
(17,	'2ReoaEpv',	'Untitled',	NULL,	'1905472106359672',	1,	1501150005,	1501150005,	0),
(18,	'6CiokZA7',	'Untitled',	NULL,	'1905472106359672',	1,	1501150173,	1501150173,	0),
(20,	'ECMQ4yhM',	'Untitled',	NULL,	'1905472106359672',	1,	1501150188,	1501150188,	0),
(21,	'lMxpU0JC',	'Untitled',	NULL,	'1905472106359672',	1,	1501150223,	1501150223,	0),
(22,	'scLdBsaW',	'Untitled',	NULL,	'1905472106359672',	1,	1501150262,	1501150262,	0),
(24,	'4rNFtKr5',	'Untitled',	NULL,	'1905472106359672',	1,	1501150297,	1501150297,	0),
(25,	'wQXzBLDe',	'Untitled',	NULL,	'1905472106359672',	1,	1501150388,	1501150388,	0),
(26,	'HSRYbQtK',	'PHP echo 123',	NULL,	'0',	1,	1501165439,	1501165439,	0);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng lưu thông tin người dùng';


-- 2017-07-27 14:24:46
