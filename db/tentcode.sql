-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.18 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for tentcode
DROP DATABASE IF EXISTS `tentcode`;
CREATE DATABASE IF NOT EXISTS `tentcode` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `tentcode`;

-- Dumping structure for table tentcode.code
DROP TABLE IF EXISTS `code`;
CREATE TABLE IF NOT EXISTS `code` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_code` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(4) DEFAULT '1',
  `create_at` bigint(20) DEFAULT NULL,
  `update_time` bigint(20) DEFAULT NULL,
  `seen` bigint(20) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_code` (`id_code`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table tentcode.code: ~22 rows (approximately)
DELETE FROM `code`;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` (`id`, `id_code`, `title`, `id_user`, `public`, `create_at`, `update_time`, `seen`) VALUES
	(1, 'VYIgZM', NULL, '', NULL, NULL, NULL, 0),
	(2, 'C3IkdUvX', 'Untitled', '1905472106359672', 1, 1501149196, 1501149196, 0),
	(3, 'rTwIQe9R', 'Untitled', '1905472106359672', 1, 1501149207, 1501149207, 0),
	(4, 'l71ynuHt', 'Untitled', '1905472106359672', 1, 1501149242, 1501149242, 0),
	(5, 'pQZVachd', 'Untitled', '1905472106359672', 1, 1501149300, 1501149300, 0),
	(6, 'DQa7ErfG', 'Untitled', '1905472106359672', 1, 1501149448, 1501149448, 0),
	(7, 'B6wtZ5jo', 'Untitled', '1905472106359672', 1, 1501149467, 1501149467, 0),
	(8, '7PS0cNIU', 'Untitled', '1905472106359672', 1, 1501149488, 1501149488, 0),
	(9, 'Z5cKOFYs', 'Untitled', '1905472106359672', 1, 1501149489, 1501149489, 0),
	(10, 'tf8IaSPk', 'Untitled', '1905472106359672', 1, 1501149494, 1501149494, 0),
	(11, 'DUNgKLyA', 'Untitled', '1905472106359672', 1, 1501149496, 1501149496, 0),
	(12, '7A4IYUIv', 'Untitled', '', 1, 1501149501, 1501149501, 0),
	(13, 'ixYKEKFB', 'Untitled', '', 1, 1501149557, 1501149557, 0),
	(14, '6MebDqmE', 'Untitled', '1905472106359672', 1, 1501149936, 1501149936, 0),
	(15, 'ejo5Fxad', 'Untitled', '1905472106359672', 1, 1501149939, 1501149939, 0),
	(16, 'fu7FUAxU', 'Untitled', '1905472106359672', 1, 1501149969, 1501149969, 0),
	(17, '2ReoaEpv', 'Untitled', '1905472106359672', 1, 1501150005, 1501150005, 0),
	(18, '6CiokZA7', 'Untitled', '1905472106359672', 1, 1501150173, 1501150173, 0),
	(20, 'ECMQ4yhM', 'Untitled', '1905472106359672', 1, 1501150188, 1501150188, 0),
	(21, 'lMxpU0JC', 'Untitled', '1905472106359672', 1, 1501150223, 1501150223, 0),
	(22, 'scLdBsaW', 'Untitled', '1905472106359672', 1, 1501150262, 1501150262, 0),
	(24, '4rNFtKr5', 'Untitled', '1905472106359672', 1, 1501150297, 1501150297, 0),
	(25, 'wQXzBLDe', 'Untitled', '1905472106359672', 1, 1501150388, 1501150388, 0);
/*!40000 ALTER TABLE `code` ENABLE KEYS */;

-- Dumping structure for table tentcode.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` char(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `token` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng lưu thông tin người dùng';

-- Dumping data for table tentcode.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
