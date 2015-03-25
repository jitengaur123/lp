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
  UNIQUE KEY `client_auto_id` (`client_auto_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.client: ~2 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` (`id`, `client_auto_id`, `first_name`, `last_name`, `company_name`, `phone_office`, `mobile1`, `mobile2`, `email`, `fax`, `address`, `city`, `state`, `postal_code`, `country`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'AMA-CL-547cd0b472600', 'Client', 'First', 'Quantum web solution', '9876543210', '9876543210', '', 'client_first@gmail.com', '9876543210', 'LGF, GK-2', 'New Delhi', 'American Samoa', '110019', 'United States', 1, '0000-00-00 00:00:00', '2014-12-10 19:28:07'),
	(2, 'AMA-CL-547cd12fc47ad', 'Client', 'Second', 'Raj Infosoft', '9876543210', '9876543210', '9876541321', 'raj@quantumwebsol.com', '8975643210', 'UGF, Kalkaji', 'New Delhi', 'AL', '110019', 'DZ', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'AMA-CL-548c0d96da79c', 'test', 'test', 'test', '34343', '34343', '434344', 'admin@tset.com', '343434', 'test', 'test', 'American Samoa', '3434343', 'United States', 1, '2014-12-13 15:27:42', '2014-12-13 10:01:01');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


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
  `worksite_id` int(11) unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.magnet_board: ~3 rows (approximately)
DELETE FROM `magnet_board`;
/*!40000 ALTER TABLE `magnet_board` DISABLE KEYS */;
INSERT INTO `magnet_board` (`id`, `started_at`, `client_id`, `worksite_id`, `created_at`, `updated_at`) VALUES
	(2, '2014-12-11 00:00:00', 1, 2, '0000-00-00 00:00:00', '2014-12-13 09:33:27'),
	(3, '2014-12-12 00:00:00', 2, 3, '0000-00-00 00:00:00', '2014-12-06 13:09:27'),
	(4, '1970-01-01 00:00:00', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(5, '2014-12-15 00:00:00', 1, 2, '2014-12-13 16:40:14', '2014-12-13 11:13:36'),
	(6, '2014-12-13 00:00:00', 2, 3, '2014-12-13 16:42:57', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `magnet_board` ENABLE KEYS */;


-- Dumping structure for table lp.magnet_board_user
CREATE TABLE IF NOT EXISTS `magnet_board_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `start_time` varchar(50) NOT NULL DEFAULT '0',
  `end_time` varchar(50) NOT NULL DEFAULT '0',
  `magnetboard_id` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.magnet_board_user: ~6 rows (approximately)
DELETE FROM `magnet_board_user`;
/*!40000 ALTER TABLE `magnet_board_user` DISABLE KEYS */;
INSERT INTO `magnet_board_user` (`id`, `user_id`, `start_time`, `end_time`, `magnetboard_id`) VALUES
	(9, 4, '0', '0', 3),
	(10, 5, '0', '0', 3),
	(15, 4, '10', '2', 4),
	(16, 5, '10', '3', 4),
	(17, 4, '10', '6', 2),
	(18, 5, '10', '2', 2),
	(23, 4, '3', '3', 6),
	(24, 5, '3', '3', 6),
	(25, 6, '3', '3', 6),
	(26, 7, '3', '3', 6),
	(27, 4, '4', '2', 5),
	(28, 5, '2', '3', 5),
	(29, 6, '2', '2', 5),
	(30, 7, '3', '4', 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.post: ~1 rows (approximately)
DELETE FROM `post`;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `page_name`, `description`, `created_at`, `updated_at`) VALUES
	(2, 'test', 'test', '0000-00-00 00:00:00', '2014-12-08 15:38:01');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.timesheet: ~3 rows (approximately)
DELETE FROM `timesheet`;
/*!40000 ALTER TABLE `timesheet` DISABLE KEYS */;
INSERT INTO `timesheet` (`id`, `labour_id`, `class`, `reg_hour`, `reg_rate`, `ot_hour`, `ot_rate`, `dt_hour`, `dt_rate`, `workreport_id`, `created_at`, `updated_at`) VALUES
	(1, 4, 'Class A', 3, 4, 2, 2, 0, 0, 1, '0000-00-00 00:00:00', '2014-12-07 11:37:34'),
	(2, 5, 'Class A', 3, 2, 1, 2, 0, 0, 1, '0000-00-00 00:00:00', '2014-12-07 11:37:34'),
	(3, 0, '', 0, 0, 0, 0, 0, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(4, 4, 'Class B', 3, 4, 3, 5, 0, 0, 3, '2014-12-13 16:17:16', '2014-12-13 11:08:40'),
	(5, 4, '', 9, 90, 8, 8, 0, 0, 4, '2014-12-13 16:21:41', '0000-00-00 00:00:00'),
	(6, 4, 'Class A', 3, 3, 3, 3, 0, 0, 5, '2014-12-13 16:37:57', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `timesheet` ENABLE KEYS */;


-- Dumping structure for table lp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_auth_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
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
  `emergency_contact_number` mediumint(12) DEFAULT NULL,
  `gender` enum('male','female') COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `spouse_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `postcode` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` mediumint(15) DEFAULT NULL,
  `mobile_number` mediumint(15) DEFAULT NULL,
  `race` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8_unicode_ci,
  `disability` text COLLATE utf8_unicode_ci,
  `veterun_status` text COLLATE utf8_unicode_ci,
  `date_of_discharge` datetime DEFAULT NULL,
  `is_complete` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_auth_id` (`user_auth_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table lp.users: ~9 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_auth_id`, `first_name`, `last_name`, `email`, `user_name`, `password`, `parent_id`, `role`, `remember_token`, `created_at`, `updated_at`, `profile_pic`, `emergency_contact_number`, `gender`, `dob`, `spouse_name`, `address`, `city`, `state`, `postcode`, `country`, `phone_number`, `mobile_number`, `race`, `about`, `disability`, `veterun_status`, `date_of_discharge`, `is_complete`) VALUES
	(1, 'AMA-EM-34df4548s3434', 'admin', 'admin', 'jitengaur123@gmail.com', 'admin', '$2y$10$7k.NRvbjGPvZaWLNEbhdd.G0cdYgosNJYkpf6mCFrJ2NBjuw/elXa', 1, 1, '3h91fkwqhnn2QeDm4zp4nV02SjchDDwFapngj3VezOwR7iGPFfO6THMjX8w6', '2014-10-07 18:38:47', '2014-12-10 19:13:56', 'Hydrangeas.jpg', NULL, 'male', '0000-00-00 00:00:00', 'testdfsdf fsd', 'kalkaji', NULL, 'Arkansas', NULL, 'United States', 343434, 8388607, 'Hispanic or Latino', NULL, NULL, '["Disabled Veteran: a veteran of the U.S. military, ground, naval or air service who is entitled to compensation (or who but for the receipt of military retired pay would be entitled to compensation) under as administered by the Secretary of Veterans Affairs; or a person who was discharged or released from active duty because of a serviceconnect disability.","Active duty wartime or campaign badge veteran: a veteran who served on active duty in the U.S. military, ground, naval,or air service during a war, or in a campaigned or expedition for which a campaign badge has been authorized under the laws administered by the Department of Defense."," Armed forces service medal veteran: a veteran who, while services on active duty in the U.S. military, ground,naval, or air service, participated in a U.S. military operation for which an Armed Forces service medal was awarded pursuant to Executive Order 12985.","Recently separated veteran:a veteran who was discharged or released from active duty in the U.S. military,ground,  naval, or air service within the last three years."]', '0000-00-00 00:00:00', 1),
	(2, 'AMA-EM-547ccec3883b9', 'Raj', 'Kumar', 'vice-president@gmail.com', 'vice_president', '$2y$10$QBA4/Twl2HmPo63S8ZLleePFIkcNmU3W1eRLg4lFdEI7K2hkEW.bi', 1, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(3, 'AMA-EM-547ccf041600f', 'Foreman', 'User', 'foreman@gmail.com', 'foreman', '$2y$10$mlUKOOYfmXgtsDFxe/4AWeoVk/xC9A0YPLPEYXm0H7iU4OfRO/dFq', 2, 3, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(4, 'AMA-EM-547ccf5a738da', 'Engineer', 'User', 'engineer@gmail.com', 'engineer', '$2y$10$2zbQTxPpdOhjuw1Mxtw4tO7ePOIG5H14e9HAgpCuH7cmtrRCXG3rS', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(5, 'AMA-EM-54824f50ac143', 'Engineer1', 'Engineer1', 'Engineer1@gmail.com', 'Engineer1', '$2y$10$Iv3mPNU66Iw2nDmt1CBNCuXxRWStYmgg1gp24so4CS84R2kj44J8q', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(6, 'AMA-EM-54824f6fa85d0', 'Engineer2', 'Engineer2', 'Engineer2@gmail.com', 'Engineer2', '$2y$10$oObJYqPe.KEBU61KZs2Po.zRVT6pCEhUxY.VZG8O5uIeaOCoJ9zaa', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(7, 'AMA-EM-54846d25ca6ba', 'Engineer3', 'Engineer3', 'Engineer3@gmail.com', 'Engineer3', '$2y$10$XXFYaaBaa8TRt8jW5K4b3e6YJeZxxUTEsT08k7fFPKZQAhRz3fEji', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(8, 'AMA-EM-54888f037ac5b', 'test', 'test', 'admin@tset.com', 'test', '$2y$10$7WSibiwVfNw98NT7XsOcXuby4LNi60ZhXdhbjLMAW1t9t5HhDb7Wy', 2, 2, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(9, 'AMA-EM-548c093171e72', 'test', 'et', 'test1@tset.com', 'test_1', '$2y$10$iQyQj3HgQ/q5gljhjOC4BucJ5n7inuFvLEyxetcO9C8hV8e0j/7a.', 3, 4, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(10, 'AMA-EM-548c0c16a48f6', 'etset', 'test', 'test3@test.com', 'test3', '$2y$10$aHOgsVHTzw9lcLA.yhfzHODHlGJS.i0eJHdDAQBcSy0WpVmUaCUOq', 3, 4, NULL, '2014-12-13 15:21:18', '2014-12-13 09:55:16', NULL, NULL, 'male', '0000-00-00 00:00:00', 'fgfdg dfgdfg ', 'tyrt', NULL, 'American Samoa', NULL, 'United States', 7676767, 676767, 'Hispanic or Latino', NULL, NULL, '"option3"', '0000-00-00 00:00:00', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table lp.user_role
CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.user_role: ~4 rows (approximately)
DELETE FROM `user_role`;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` (`id`, `name`, `title`) VALUES
	(1, 'Administrator', 'President'),
	(2, 'Project Manager', 'Vice-President'),
	(3, 'Supervisor', 'Foreman'),
	(4, 'End User', 'Engineer');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;


-- Dumping structure for table lp.worksite
CREATE TABLE IF NOT EXISTS `worksite` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `work_auto_id` varchar(50) NOT NULL DEFAULT '0',
  `started_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `client_id` int(11) unsigned NOT NULL,
  `job_name` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.worksite: ~3 rows (approximately)
DELETE FROM `worksite`;
/*!40000 ALTER TABLE `worksite` DISABLE KEYS */;
INSERT INTO `worksite` (`id`, `work_auto_id`, `started_at`, `client_id`, `job_name`, `description`, `address`, `city`, `state`, `postal_code`, `country`, `ocip`, `pm`, `billing_type`, `cret_pr`, `created_at`, `updated_at`) VALUES
	(1, 'AMA-WS-544sdf56e6', '2014-04-11 00:00:00', 1, 'Electric Work', 'Test All Fittings', 'M.N. 58P, 2nd Floor', 'GK2', 'DZ', '110019', 'AL', 'YES', 'MJM', 'T&M', 'YES', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(2, 'AMA-WS-5434df56e6', '2014-12-12 00:00:00', 1, 'Plumber Work', 'Pipe Fittings', 'LGF, GK-2', 'GK2', 'Arizona', '110019', 'United States', 'YES', 'MJM', 'T&M', 'YES', '0000-00-00 00:00:00', '2014-12-13 11:15:05'),
	(3, 'AMA-WS-544336e6', '2014-12-13 00:00:00', 2, 'Plumber Work', 'test', 'LGF, GK-2', 'GK2', 'Arizona', '110019', 'United States', 'YES', 'MJM', 'T&M', 'YES', '0000-00-00 00:00:00', '2014-12-13 11:17:40'),
	(4, 'AMA-WS-548c1f9068835', '0000-00-00 00:00:00', 3, 'test test ', 'test', 'test', 'test', 'American Samoa', '343434', 'United States', 'YES', 'MJM', 'T&M', 'YES', '2014-12-13 16:44:24', '0000-00-00 00:00:00'),
	(5, 'AMA-WS-548c207e4a3b6', '2014-12-16 00:00:00', 3, 'new Job', 'tees es dfds dsf df', 'tset', 'test', 'Alaska', '343434', 'United States', 'YES', 'MJM', 'T&M', 'YES', '2014-12-13 16:48:22', '0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table lp.work_reports: ~2 rows (approximately)
DELETE FROM `work_reports`;
/*!40000 ALTER TABLE `work_reports` DISABLE KEYS */;
INSERT INTO `work_reports` (`id`, `job_number`, `client_id`, `site_id`, `date_create`, `description`, `submit_by`, `approve_by`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'AMA-WR-5484318297345', 1, 1, '2014-07-12 00:00:00', '', 1, 1, 1, '0000-00-00 00:00:00', '2014-12-07 14:18:05'),
	(2, 'AMA-WR-5488a65dd270b', 1, 1, '2015-10-06 00:00:00', '', 1, NULL, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
	(3, 'AMA-WR-548c19156c603', 2, 3, '2014-12-13 00:00:00', '', 1, NULL, 0, '2014-12-13 16:17:16', '2014-12-13 11:08:40'),
	(4, 'AMA-WR-548c1a0bd5683', 1, 2, '0000-00-00 00:00:00', '', 1, NULL, 0, '2014-12-13 16:21:41', '0000-00-00 00:00:00'),
	(5, 'AMA-WR-548c1a7ee61ed', 1, 2, '2014-12-14 00:00:00', '', 1, NULL, 0, '2014-12-13 16:37:57', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `work_reports` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
