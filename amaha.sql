-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.25a - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             8.2.0.4675
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table lp.client
CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `client_auto_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `phone_office` varchar(50) NOT NULL,
  `mobile1` varchar(50) NOT NULL,
  `mobile2` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `client_auto_id` (`client_auto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.client: ~4 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `client_auto_id`, `first_name`, `last_name`, `company_name`, `phone_office`, `mobile1`, `mobile2`, `email`, `user_id`, `fax`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'AMA-CL-547cd0b472600', 'Client', 'First', 'Quantum web solution', '9876543210', '9876543210', '', 'client_first@gmail.com', 0, '9876543210', 'LGF, GK-2', 'New Delhi', 'American Samoa', '110019', 'United States', 1, '0000-00-00 00:00:00', '2014-12-10 19:28:07'),
	(2, 'AMA-CL-547cd12fc47ad', 'Client', 'Second', 'Raj Infosoft', '9876543210', '9876543210', '9876541321', 'raj@quantumwebsol.com', 0, '8975643210', 'UGF, Kalkaji', 'New Delhi', 'AL', '110019', 'DZ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'AMA-CL-548c0d96da79c', 'test', 'test', 'test', '34343', '34343', '434344', 'admin@tset.com', 0, '343434', 'test', 'test', 'American Samoa', '3434343', 'United States', 1, '2014-12-13 15:27:42', '2014-12-14 09:48:19'),
	(4, 'AMA-CL-54c92098451c9', 'test', 'test', 'tet', '654-765-6543', '654-765-6543', '654-765-6543', 'test@test1.com', 14, '23232343', 'test', 'test', 'New York', '110019', 'United States', 1, '2015-01-28 23:17:04', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


-- Dumping structure for table lp.elfinder_file
CREATE TABLE IF NOT EXISTS `elfinder_file` (
  `id` int(7) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(7) unsigned NOT NULL,
  `name` varchar(256) NOT NULL,
  `content` longblob NOT NULL,
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `mtime` int(10) unsigned NOT NULL,
  `mime` varchar(256) NOT NULL DEFAULT 'unknown',
  `read` enum('1','0') NOT NULL DEFAULT '1',
  `write` enum('1','0') NOT NULL DEFAULT '1',
  `locked` enum('1','0') NOT NULL DEFAULT '0',
  `hidden` enum('1','0') NOT NULL DEFAULT '0',
  `width` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parent_name` (`parent_id`,`name`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Dumping data for table lp.elfinder_file: 0 rows
DELETE FROM `elfinder_file`;
/*!40000 ALTER TABLE `elfinder_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `elfinder_file` ENABLE KEYS */;


-- Dumping structure for table lp.equipment
CREATE TABLE IF NOT EXISTS `equipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Dumping data for table lp.equipment: ~0 rows (approximately)
DELETE FROM `equipment`;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;


-- Dumping structure for table lp.labour_rate
CREATE TABLE IF NOT EXISTS `labour_rate` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `class` varchar(50) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '0',
  `rate` double(10,2) NOT NULL DEFAULT '0.00',
  `overtime_rate` double(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lp.labour_rate: ~0 rows (approximately)
DELETE FROM `labour_rate`;
/*!40000 ALTER TABLE `labour_rate` DISABLE KEYS */;
/*!40000 ALTER TABLE `labour_rate` ENABLE KEYS */;


-- Dumping structure for table lp.magnet_board
CREATE TABLE IF NOT EXISTS `magnet_board` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `started_at` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) unsigned NOT NULL DEFAULT '0',
  `supervisor_id` int(11) unsigned NOT NULL DEFAULT '0',
  `worksite_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.magnet_board: ~26 rows (approximately)
DELETE FROM `magnet_board`;
/*!40000 ALTER TABLE `magnet_board` DISABLE KEYS */;
INSERT INTO `magnet_board` (`id`, `started_at`, `client_id`, `supervisor_id`, `worksite_id`, `created_at`, `updated_at`) VALUES
	(13, '2015-02-04 00:00:00', 0, 3, 3, '2015-02-04 02:03:10', '0000-00-00 00:00:00'),
	(14, '2015-02-03 00:00:00', 0, 3, 1, '2015-02-04 02:14:20', '2015-02-03 22:28:50'),
	(15, '2015-02-04 00:00:00', 0, 12, 2, '2015-02-18 14:41:30', '2015-02-21 10:52:09'),
	(16, '2026-08-08 00:00:00', 0, 0, 1, '2015-02-21 15:42:23', '0000-00-00 00:00:00'),
	(17, '2026-08-08 00:00:00', 0, 0, 2, '2015-02-21 15:42:31', '0000-00-00 00:00:00'),
	(18, '2015-02-04 10:29:57', 0, 0, 1, '2015-02-21 15:59:57', '0000-00-00 00:00:00'),
	(19, '2015-02-04 10:33:18', 0, 3, 1, '2015-02-21 16:03:18', '0000-00-00 00:00:00'),
	(20, '2015-02-04 10:43:06', 0, 0, 4, '2015-02-21 16:13:06', '0000-00-00 00:00:00'),
	(21, '2015-02-21 10:53:05', 0, 0, 2, '2015-02-21 16:23:05', '2015-02-21 11:35:54'),
	(22, '2015-02-21 10:53:09', 0, 0, 2, '2015-02-21 16:23:09', '2015-02-21 11:36:00'),
	(23, '2015-02-20 11:00:48', 0, 12, 1, '2015-02-21 16:30:48', '2015-02-21 11:06:47'),
	(24, '2015-02-20 11:05:16', 0, 13, 2, '2015-02-21 16:35:16', '2015-02-21 11:06:48'),
	(25, '2015-02-20 11:05:23', 0, 3, 2, '2015-02-21 16:35:23', '2015-02-21 11:06:44'),
	(26, '2015-02-21 11:28:43', 0, 3, 1, '2015-02-21 16:58:43', '2015-02-21 11:36:09'),
	(27, '2015-02-21 11:33:11', 0, 0, 3, '2015-02-21 17:03:11', '2015-02-21 11:36:02'),
	(28, '2015-02-19 11:53:15', 0, 3, 1, '2015-02-21 17:23:15', '0000-00-00 00:00:00'),
	(29, '2015-02-19 11:53:17', 0, 0, 1, '2015-02-21 17:23:17', '0000-00-00 00:00:00'),
	(30, '2015-02-19 11:53:18', 0, 0, 1, '2015-02-21 17:23:18', '0000-00-00 00:00:00'),
	(31, '2015-02-18 11:55:15', 0, 0, 1, '2015-02-21 17:25:15', '0000-00-00 00:00:00'),
	(32, '2015-02-22 13:23:04', 0, 0, 1, '2015-02-22 18:53:04', '0000-00-00 00:00:00'),
	(33, '2015-02-22 13:23:49', 0, 0, 3, '2015-02-22 18:53:49', '0000-00-00 00:00:00'),
	(34, '2015-02-22 13:26:41', 0, 13, 4, '2015-02-22 18:56:41', '0000-00-00 00:00:00'),
	(35, '2015-02-22 13:26:48', 0, 12, 4, '2015-02-22 18:56:48', '2015-02-22 13:26:50'),
	(36, '2015-02-22 14:08:41', 0, 0, 2, '2015-02-22 19:38:41', '0000-00-00 00:00:00'),
	(37, '2015-03-25 18:44:41', 0, 3, 1, '2015-03-26 00:14:41', '0000-00-00 00:00:00'),
	(38, '2015-03-26 19:08:32', 0, 3, 8, '2015-03-26 00:38:32', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `magnet_board` ENABLE KEYS */;


-- Dumping structure for table lp.magnet_board_user
CREATE TABLE IF NOT EXISTS `magnet_board_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `start_time` varchar(50) NOT NULL DEFAULT '0',
  `end_time` varchar(50) NOT NULL DEFAULT '0',
  `magnetboard_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.magnet_board_user: ~42 rows (approximately)
DELETE FROM `magnet_board_user`;
/*!40000 ALTER TABLE `magnet_board_user` DISABLE KEYS */;
INSERT INTO `magnet_board_user` (`id`, `user_id`, `start_time`, `end_time`, `magnetboard_id`) VALUES
	(9, 4, '0', '0', 3),
	(10, 5, '0', '0', 3),
	(15, 4, '10', '2', 4),
	(16, 5, '10', '3', 4),
	(28, 4, '10', '10', 2),
	(29, 5, '10', '10', 2),
	(38, 4, '3', '7', 6),
	(39, 5, '3', '7', 6),
	(40, 6, '3', '7', 6),
	(41, 7, '3', '7', 6),
	(42, 4, '10 : 00', '18 : 00', 9),
	(43, 5, '10 : 00', '18 : 00', 9),
	(44, 7, '10 : 00', '18 : 00', 9),
	(45, 9, '10 : 00', '18 : 00', 9),
	(46, 5, '10', '2', 13),
	(49, 6, '', '', 15),
	(51, 9, '', '', 16),
	(57, 5, '03:00', '14:00', 14),
	(58, 11, '10', '2', 14),
	(60, 6, '15:00', '19:00', 15),
	(61, 4, '0', '0', 16),
	(62, 6, '0', '0', 17),
	(63, 5, '0', '0', 18),
	(64, 11, '0', '0', 20),
	(72, 4, '0', '0', 25),
	(74, 11, '0', '0', 23),
	(78, 7, '0', '0', 21),
	(79, 6, '0', '0', 22),
	(80, 10, '0', '0', 27),
	(81, 5, '0', '0', 29),
	(82, 7, '0', '0', 30),
	(83, 4, '0', '0', 31),
	(84, 5, '0', '0', 31),
	(85, 7, '0', '0', 31),
	(93, 11, '0', '0', 32),
	(94, 11, '0', '0', 36),
	(95, 5, '0', '0', 37),
	(96, 16, '0', '0', 37),
	(97, 17, '0', '0', 37),
	(98, 5, '0', '0', 38),
	(99, 16, '0', '0', 38),
	(100, 17, '0', '0', 38);
/*!40000 ALTER TABLE `magnet_board_user` ENABLE KEYS */;


-- Dumping structure for table lp.material
CREATE TABLE IF NOT EXISTS `material` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table lp.material: ~0 rows (approximately)
DELETE FROM `material`;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;


-- Dumping structure for table lp.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table lp.migrations: ~2 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES
	('2014_10_01_180431_users', 1),
	('2014_10_01_180825_create_password_reminders_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;


-- Dumping structure for table lp.password_reminders
CREATE TABLE IF NOT EXISTS `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table lp.password_reminders: ~2 rows (approximately)
DELETE FROM `password_reminders`;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
INSERT INTO `password_reminders` (`email`, `token`, `created_at`) VALUES
	('admin@admin.com', '9a29de9383b2d89c52c98e9dde7606a6587a246a', '2014-10-02 18:38:44'),
	('jitengaur123@gmail.com', '6966d1c3696316fc248c673896a674cb1b5c02f8', '2014-10-02 18:39:49');
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;


-- Dumping structure for table lp.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.post: ~3 rows (approximately)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `page_name`, `description`, `created_at`, `updated_at`) VALUES
	(2, 'test', 'test', '0000-00-00 00:00:00', '2015-01-05 17:16:31'),
	(3, 'test', 'test se tsesresresr ', '2014-12-14 23:36:11', '2015-01-05 17:16:50'),
	(4, 'te fdsfsdfsdfds f', 'f sfd fds fdsfs ddf dsfdsf df', '2014-12-14 23:36:42', '2014-12-14 18:10:24');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


-- Dumping structure for table lp.safety_certificate
CREATE TABLE IF NOT EXISTS `safety_certificate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '0',
  `date_of_completion` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_of_expiration` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `files` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.safety_certificate: ~3 rows (approximately)
DELETE FROM `safety_certificate`;
/*!40000 ALTER TABLE `safety_certificate` DISABLE KEYS */;
INSERT INTO `safety_certificate` (`id`, `title`, `date_of_completion`, `date_of_expiration`, `files`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 'testests', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '54ca95733d8c2Chrysanthemum.jpg', 1, '0000-00-00 00:00:00', '2015-03-10 19:00:44'),
	(8, 'test sdf sdf sfdsfsd f', '2015-01-04 00:00:00', '2021-02-12 00:00:00', '54d79d9fce201home.php', 6, '2015-02-08 22:55:43', '2015-02-08 17:34:01'),
	(9, 'test ', '2015-01-04 00:00:00', '2021-02-12 00:00:00', '54d79e094510fplan.jpg', 6, '2015-02-08 23:04:01', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `safety_certificate` ENABLE KEYS */;


-- Dumping structure for table lp.timesheet
CREATE TABLE IF NOT EXISTS `timesheet` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `labour_id` int(11) unsigned NOT NULL,
  `class` varchar(50) NOT NULL,
  `reg_hour` int(11) NOT NULL,
  `reg_rate` double NOT NULL,
  `ot_hour` int(11) NOT NULL,
  `ot_rate` double NOT NULL,
  `dt_hour` int(11) NOT NULL,
  `dt_rate` double NOT NULL,
  `workreport_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.timesheet: ~12 rows (approximately)
DELETE FROM `timesheet`;
/*!40000 ALTER TABLE `timesheet` DISABLE KEYS */;
INSERT INTO `timesheet` (`id`, `labour_id`, `class`, `reg_hour`, `reg_rate`, `ot_hour`, `ot_rate`, `dt_hour`, `dt_rate`, `workreport_id`, `created_at`, `updated_at`) VALUES
	(1, 4, 'Class A', 3, 4, 2, 2, 0, 0, 1, '0000-00-00 00:00:00', '2014-12-07 11:37:34'),
	(2, 5, 'Class A', 3, 2, 1, 2, 0, 0, 1, '0000-00-00 00:00:00', '2014-12-07 11:37:34'),
	(3, 0, '', 0, 0, 0, 0, 0, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 4, 'Class B', 3, 4, 3, 5, 0, 0, 3, '2014-12-13 16:17:16', '2014-12-13 11:08:40'),
	(5, 4, '', 9, 90, 8, 8, 0, 0, 4, '2014-12-13 16:21:41', '0000-00-00 00:00:00'),
	(6, 4, 'Class A', 3, 3, 3, 3, 0, 0, 5, '2014-12-13 16:37:57', '2014-12-14 10:43:11'),
	(7, 4, 'Class A', 10, 0, 3, 0, 5, 0, 7, '2015-01-30 00:45:55', '0000-00-00 00:00:00'),
	(8, 0, '', 10, 0, 3, 0, 5, 0, 7, '2015-01-30 00:45:55', '0000-00-00 00:00:00'),
	(9, 3, 'Class A', 5, 0, 3, 0, 2, 0, 8, '2015-03-26 00:39:56', '0000-00-00 00:00:00'),
	(10, 4, 'Class B', 5, 0, 3, 0, 2, 0, 8, '2015-03-26 00:39:56', '0000-00-00 00:00:00'),
	(11, 16, 'Class C', 5, 0, 3, 0, 2, 0, 8, '2015-03-26 00:39:56', '0000-00-00 00:00:00'),
	(12, 17, 'Class C', 5, 0, 4, 0, 1, 0, 8, '2015-03-26 00:39:56', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `timesheet` ENABLE KEYS */;


-- Dumping structure for table lp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_auth_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `job_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) unsigned NOT NULL DEFAULT '1',
  `role` int(10) unsigned NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `profile_pic` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `emergency_contact_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `spouse_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `race` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `disability` text COLLATE utf8_unicode_ci,
  `veterun_status` text COLLATE utf8_unicode_ci,
  `date_of_discharge` datetime DEFAULT NULL,
  `is_complete` tinyint(4) NOT NULL DEFAULT '0',
  `rating` tinyint(4) NOT NULL DEFAULT '0',
  `user_note` text COLLATE utf8_unicode_ci NOT NULL,
  `has_certificate` int(11) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_auth_id` (`user_auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table lp.users: ~17 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_auth_id`, `job_title`, `first_name`, `last_name`, `email`, `user_name`, `password`, `parent_id`, `role`, `remember_token`, `created_at`, `updated_at`, `profile_pic`, `emergency_name`, `emergency_contact_number`, `gender`, `dob`, `spouse_name`, `address`, `city`, `state`, `postcode`, `country`, `phone_number`, `mobile_number`, `race`, `about`, `disability`, `veterun_status`, `date_of_discharge`, `is_complete`, `rating`, `user_note`, `has_certificate`, `deleted_at`) VALUES
	(1, 'AMA-EM-34df4548s3434', 'PM', 'admin', 'admin', 'jitengaur123@gmail.com', 'admin', '$2y$10$7k.NRvbjGPvZaWLNEbhdd.G0cdYgosNJYkpf6mCFrJ2NBjuw/elXa', 1, 1, 'xcjxjkRFMc5Vh6bhTR9fRENSrAlQ0BUuJwCsencRzsuBi4K637ZVLuD2pLyX', '2014-10-07 18:38:47', '2015-03-10 19:01:15', 'b.jpg', NULL, '456-344-3434', 'male', '2014-08-11 00:00:00', 'testdfsdf fsd', 'kalkaji', 'cegtst', 'Arkansas', '343434', 'United States', '456-344-3434', '456-344-3434', 'Hispanic or Latino', 'test sfdfsdfdsff\r\n\r\n\r\n', NULL, '["I am not a protected veteran.","I am a protected veteran but I choose not to self\\u2010identify the classifications to which I belong."]', '1970-04-01 00:00:00', 1, 0, '', 0, NULL),
	(2, 'AMA-EM-547ccec3883b9', 'FM', 'Raj', 'Kumar', 'vice-president@gmail.com', 'vice_president', '$2y$10$QBA4/Twl2HmPo63S8ZLleePFIkcNmU3W1eRLg4lFdEI7K2hkEW.bi', 1, 2, NULL, '0000-00-00 00:00:00', '2015-01-05 17:01:57', '1420477317far.jpg', NULL, '456', 'male', '1970-07-01 00:00:00', 'gyhtfyrty', 'tytyty', 'tuyty', 'American Samoa', '4554545', 'United States', '466', '456', 'Hispanic or Latino', 'fhfhgfhhgh\r\n\r\n', NULL, NULL, '1970-05-01 00:00:00', 1, 0, '', 0, NULL),
	(3, 'AMA-EM-547ccf041600f', 'AP1', 'Foreman', 'User', 'foreman@gmail.com', 'foreman', '$2y$10$mlUKOOYfmXgtsDFxe/4AWeoVk/xC9A0YPLPEYXm0H7iU4OfRO/dFq', 2, 3, NULL, '0000-00-00 00:00:00', '2015-02-22 12:55:59', '1424609758Chrysanthemum.jpg', NULL, '898-454-7878', 'male', '1970-01-01 00:00:00', 'testseeffsdf', 'test', 't3setesr', 'Arkansas', '334343', 'United States', '898-454-7878', '898-454-7878', 'Hispanic or Latino', 'sfsdfsdfsfdfd\r\n', NULL, NULL, '2014-02-13 00:00:00', 1, 4, 'testes tsetes ffsdf dsf\r\n', 0, NULL),
	(4, 'AMA-EM-547ccf5a738da', 'AP1', 'Engineer', 'User', 'engineer@gmail.com', 'engineer', '$2y$10$2zbQTxPpdOhjuw1Mxtw4tO7ePOIG5H14e9HAgpCuH7cmtrRCXG3rS', 3, 4, 'nPA9drmNKvE8Zu8hscB7J2Mfah04C7Y5P0t0s49QqQf4PyiCBCncCB50G8Kw', '0000-00-00 00:00:00', '2015-03-10 19:01:52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(5, 'AMA-EM-54824f50ac143', 'AP1', 'Engineer1', 'Engineer1', 'Engineer1@gmail.com', 'Engineer1', '$2y$10$Iv3mPNU66Iw2nDmt1CBNCuXxRWStYmgg1gp24so4CS84R2kj44J8q', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(6, 'AMA-EM-54824f6fa85d0', 'AP1', 'Engineer2', 'Engineer2', 'Engineer2@gmail.com', 'Engineer2', '$2y$10$oObJYqPe.KEBU61KZs2Po.zRVT6pCEhUxY.VZG8O5uIeaOCoJ9zaa', 3, 4, 'Yoj9fU818RTEsLOz6dxz3Ok2nP4ZaxrsN0fILcNGS2Kv5k5QghyUvzZweHho', '0000-00-00 00:00:00', '2015-02-08 17:34:01', NULL, NULL, '345-565-4454', 'male', '1970-06-01 00:00:00', 'test', 'testst', 'test', 'Arizona', '343434', 'United States', '345-565-4454', '345-565-4454', 'Hispanic or Latino', 'test\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', NULL, '["Disabled Veteran: a veteran of the U.S. military, ground, naval or air service who is entitled to compensation (or who but for the receipt of military retired pay would be entitled to compensation) under as administered by the Secretary of Veterans Affairs; or a person who was discharged or released from active duty because of a serviceconnect disability."]', '1970-01-01 00:00:00', 1, 0, '', 1, NULL),
	(7, 'AMA-EM-54846d25ca6ba', 'AP1', 'Engineer3', 'Engineer3', 'Engineer3@gmail.com', 'Engineer3', '$2y$10$XXFYaaBaa8TRt8jW5K4b3e6YJeZxxUTEsT08k7fFPKZQAhRz3fEji', 3, 4, 'JjHDL2BDnoxr64uFtwOfB4bJWRjXTs5GbjvTtNbiL5TVZanbXllEAeo918tI', '0000-00-00 00:00:00', '2015-02-08 17:17:36', NULL, NULL, '345-565-4454', 'male', '1969-12-01 00:00:00', 'test', 'testtestset setsetsetest', 'test', 'Alabama', '110019', 'United States', '345-565-4454', '345-565-4454', 'Hispanic or Latino', 'twefsdfsdfsdfs ds dsf', NULL, NULL, '1970-01-01 00:00:00', 1, 0, '', 1, NULL),
	(8, 'AMA-EM-54888f037ac5b', 'AP1', 'test', 'test', 'admin@tset.com', 'test', '$2y$10$7WSibiwVfNw98NT7XsOcXuby4LNi60ZhXdhbjLMAW1t9t5HhDb7Wy', 2, 2, NULL, '0000-00-00 00:00:00', '2015-03-25 19:40:31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, '2015-03-25 19:40:31'),
	(9, 'AMA-EM-548c093171e72', 'AP1', 'test', 'et', 'test1@tset.com', 'test_1', '$2y$10$iQyQj3HgQ/q5gljhjOC4BucJ5n7inuFvLEyxetcO9C8hV8e0j/7a.', 3, 4, NULL, '0000-00-00 00:00:00', '2015-03-25 19:40:38', NULL, NULL, '8388607', 'male', '1972-03-20 00:00:00', 'testsest', 'test', 'test', 'American Samoa', '3434343', 'United States', '343434', '3434343', 'Hispanic or Latino', 'tests efdf sfdf sdfdf dfd\r\n\r\n', NULL, '["I am not a protected veteran.","I am a protected veteran but I choose not to self\\u2010identify the classifications to which I belong.","Disabled Veteran: a veteran of the U.S. military, ground, naval or air service who is entitled to compensation (or who but for the receipt of military retired pay would be entitled to compensation) under as administered by the Secretary of Veterans Affairs; or a person who was discharged or released from active duty because of a serviceconnect disability."]', '1984-11-16 00:00:00', 1, 0, '', 0, '2015-03-25 19:40:38'),
	(10, 'AMA-EM-548c0c16a48f6', 'AP1', 'etset', 'test', 'test3@test.com', 'test3', '$2y$10$aHOgsVHTzw9lcLA.yhfzHODHlGJS.i0eJHdDAQBcSy0WpVmUaCUOq', 3, 4, NULL, '2014-12-13 15:21:18', '2015-03-25 19:40:45', NULL, NULL, NULL, 'male', '0000-00-00 00:00:00', 'fgfdg dfgdfg ', 'tyrt', NULL, 'American Samoa', NULL, 'United States', '7676767', '676767', 'Hispanic or Latino', NULL, NULL, '"option3"', '0000-00-00 00:00:00', 1, 0, '', 0, '2015-03-25 19:40:45'),
	(11, 'AMA-EM-54aac8687d8d4', 'AP1', 'grdgdfg', 'dfgdfg', 'dfgdfg@test.com', 'testsets', '$2y$10$EEbVoItRS2pGhyURIgf/euWcjY64kZbcUrxnTSLmB5AEnRzCinPNW', 3, 4, NULL, '2015-01-05 22:52:48', '2015-03-25 19:40:50', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, '2015-03-25 19:40:50'),
	(12, 'AMA-EM-54bd48f10fbea', 'AP6', 'test', 'test', 'tester1@gmail.com', 'tester1', '$2y$10$0tly2t5POnb66J0fJfuVee1V1B5Psirnub5jFMTr6ig/yDWv07K/W', 2, 3, NULL, '2015-01-19 23:42:01', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(13, 'AMA-EM-54bd49627c990', 'AP5', 'test', 'test', 'tester2@gmail.com', 'tester2', '$2y$10$fbmkxxMsy/8BkEjHNWgWLeORla/IHSP4cCjJjRhBdqU1RtGb.XCDq', 2, 3, NULL, '2015-01-19 23:43:54', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(14, 'AMA-EM-54c920980dc58', 'AP4', 'test', 'test', 'test@test1.com', 'test_user', '$2y$10$vfWrFv4cri48NaKe6UdIAuqFcOqMWCavrG64MLEtyJT.cldbLfFrm', 1, 5, 'eFcgb1ucnNPqJnZlhDl1VhQnfGFoGY23LUVSzTCbyW004A9Lm3JBvJj5k13N', '2015-01-28 23:17:04', '2015-01-28 18:43:18', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(15, 'AMA-EM-54ff470b985aa', 'AP3', 'test', 'test', 'client_firsttes@gmail.com', 'client_firsttes', '$2y$10$ggKVccIVKge/9yDqX7G4Fewd9SEfFrpGZGtSm5ZOH4TY.egm3/v7K', 1, 1, NULL, '2015-03-11 01:03:31', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(16, 'AMA-EM-551301081235a', 'AP2', 'testing1', 'testing1', 'testing1@test.com', 'testing1', '$2y$10$4GGO5yBb4En9D06H0nf9X.ZLfe27711ff6KL0pFC7ObQy6Tm12Tr2', 1, 7, NULL, '2015-03-26 00:10:08', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL),
	(17, 'AMA-EM-551301260f8f7', 'AP1', 'testing2', 'testing2', 'testing2@test.com', 'testing2', '$2y$10$.u/7tpidS0YnRjpBfCByfOWNLgYG1.EnAPVwJBwHvpIBGqj87KMUu', 2, 8, NULL, '2015-03-26 00:10:38', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, '', 0, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table lp.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.user_role: ~8 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `name`, `title`) VALUES
	(1, 'Administrator', 'President'),
	(2, 'Project Manager', 'Vice-President'),
	(3, 'Supervisor', 'Foreman'),
	(4, 'End User', 'Journeyman'),
	(5, 'Client', 'Client'),
	(6, 'Sub-Contractor/Supplier', 'Sub-Contractor/Supplier'),
	(7, 'General Foreman', 'General Foreman'),
	(8, 'Apprentice', 'Apprentice');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;


-- Dumping structure for table lp.worksite
CREATE TABLE IF NOT EXISTS `worksite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_auto_id` varchar(50) NOT NULL DEFAULT '0',
  `started_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) unsigned NOT NULL,
  `job_name` varchar(50) NOT NULL,
  `labour_rate` double(10,2) NOT NULL,
  `ot_rate` double(10,2) NOT NULL,
  `dt_rate` double(10,2) NOT NULL,
  `general_foreman_rate` double(10,2) NOT NULL,
  `foreman_rate` double(10,2) NOT NULL,
  `journyman_rate` double(10,2) NOT NULL,
  `apprentice_rate` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `postal_code` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `ocip` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `pm` enum('MJM','KH','TA') NOT NULL DEFAULT 'MJM',
  `billing_type` enum('T&M','LUMP SUM','CONTRACT') NOT NULL DEFAULT 'T&M',
  `cret_pr` enum('YES','NO') NOT NULL DEFAULT 'YES',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `work_auto_id` (`work_auto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.worksite: ~1 rows (approximately)
DELETE FROM `worksite`;
/*!40000 ALTER TABLE `worksite` DISABLE KEYS */;
INSERT INTO `worksite` (`id`, `work_auto_id`, `started_at`, `client_id`, `job_name`, `labour_rate`, `ot_rate`, `dt_rate`, `general_foreman_rate`, `foreman_rate`, `journyman_rate`, `apprentice_rate`, `description`, `address`, `city`, `state`, `postal_code`, `country`, `ocip`, `pm`, `billing_type`, `cret_pr`, `created_at`, `updated_at`) VALUES
	(8, 'AMA-WS-5513073094cd1', '2015-03-25 00:00:00', 1, 'Electric Work', 0.00, 0.00, 0.00, 10.00, 11.00, 12.00, 13.00, 'test', 'M.N. 58P, 2nd Floor', 'GK2', 'American Samoa', '110019', 'United States', 'YES', 'TA', 'T&M', 'YES', '2015-03-26 00:36:24', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `worksite` ENABLE KEYS */;


-- Dumping structure for table lp.work_reports
CREATE TABLE IF NOT EXISTS `work_reports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_number` varchar(50) NOT NULL,
  `client_id` int(11) unsigned NOT NULL,
  `site_id` int(11) unsigned NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` text NOT NULL,
  `submit_by` int(11) NOT NULL,
  `approve_by` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `job_number` (`job_number`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.work_reports: ~8 rows (approximately)
DELETE FROM `work_reports`;
/*!40000 ALTER TABLE `work_reports` DISABLE KEYS */;
INSERT INTO `work_reports` (`id`, `job_number`, `client_id`, `site_id`, `date_create`, `description`, `submit_by`, `approve_by`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'AMA-WR-5484318297345', 1, 1, '2014-07-12 00:00:00', '', 1, 1, 1, '0000-00-00 00:00:00', '2014-12-07 14:18:05'),
	(2, 'AMA-WR-5488a65dd270b', 1, 1, '2015-10-06 00:00:00', '', 1, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'AMA-WR-548c19156c603', 2, 3, '2014-12-13 00:00:00', '', 1, NULL, 0, '2014-12-13 16:17:16', '2014-12-13 11:08:40'),
	(4, 'AMA-WR-548c1a0bd5683', 1, 2, '0000-00-00 00:00:00', '', 1, NULL, 0, '2014-12-13 16:21:41', '0000-00-00 00:00:00'),
	(5, 'AMA-WR-548c1a7ee61ed', 1, 2, '2014-12-14 00:00:00', ' fdfddf df sdf sfsd fdfdfsf sf sfs', 1, NULL, 0, '2014-12-13 16:37:57', '2014-12-14 10:43:11'),
	(6, 'AMA-WR-54ca860ba30db', 1, 7, '2015-01-29 00:00:00', 'dfsdfsdfdsf', 1, NULL, 0, '2015-01-30 00:43:01', '0000-00-00 00:00:00'),
	(7, 'AMA-WR-54ca86c8b06b3', 1, 7, '2015-01-29 00:00:00', '', 1, NULL, 0, '2015-01-30 00:45:55', '0000-00-00 00:00:00'),
	(8, 'AMA-WR-551307c1a3708', 1, 8, '2015-03-26 00:00:00', '', 1, NULL, 0, '2015-03-26 00:39:56', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `work_reports` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
