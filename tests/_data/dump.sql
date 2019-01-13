-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.6.37 - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных note2
DROP DATABASE IF EXISTS `note2`;
CREATE DATABASE IF NOT EXISTS `note2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `note2`;

-- Дамп структуры для таблица note2.migration
DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы note2.migration: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` (`version`, `apply_time`) VALUES
	('m000000_000000_base', 1547049049),
	('m190109_154913_create_notes_table', 1547049055);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;

-- Дамп структуры для таблица note2.notes
DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы note2.notes: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` (`id`, `title`, `date`, `text`) VALUES
	(1, 'test22', '2019-10-10', 'Заметка 1'),
	(4, 'test', '2019-01-10', 'Заметка 1'),
	(5, 'test31414', '2019-01-10', 'Заметка 1'),
	(6, 'test22', '2019-01-10', 'Заметка 1'),
	(7, 'test333', '2019-01-10', 'Заметка 1');
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
