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
  `idCode` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idUser` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `filename` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table tentcode.code: ~3 rows (approximately)
DELETE FROM `code`;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` (`idCode`, `idUser`, `filename`) VALUES
	('VYIgZM', '1905472106359672', 'Untitled'),
	('VYIgZM', '1905472106359672', 'Untitled'),
	('VYIgZM', '1905472106359672', 'Untitled');
/*!40000 ALTER TABLE `code` ENABLE KEYS */;

-- Dumping structure for table tentcode.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` char(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `token` tinytext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Bảng lưu thông tin người dùng';

-- Dumping data for table tentcode.user: ~0 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
