-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for join_table
CREATE DATABASE IF NOT EXISTS `join_table` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `join_table`;

-- Dumping structure for table join_table.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(50) NOT NULL DEFAULT '0',
  `product_brand` varchar(50) NOT NULL DEFAULT '0',
  `product_color` varchar(50) NOT NULL DEFAULT '0',
  `product_desc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table join_table.products: ~3 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `product_name`, `product_brand`, `product_color`, `product_desc`) VALUES
	(1, 'Dark Coffeee', 'Nescafe', '#bc1010', '   Caffeine Rich Drinks'),
	(2, 'Butter Biscuits ', 'Parle', '#229fec', '     Creamy Rich Tasty'),
	(14, 'red chilly', 'TATA', '#6aca1c', '   TATA TEA');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table join_table.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `phone` varchar(50) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table join_table.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `phone`) VALUES
	(1, 'shishir', 'shishir@gmail.com', '9999999999'),
	(2, 'vikas', 'vikas@yahoo.com', '8888888888'),
	(4, 'himani', 'himani@gmail.net', '7777777777'),
	(5, 'ashuliii', 'ashuli@bsdk.com', '8080808080');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table join_table.user_profile
CREATE TABLE IF NOT EXISTS `user_profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL DEFAULT '0',
  `last_name` varchar(50) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table join_table.user_profile: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`id`, `first_name`, `last_name`, `user_id`) VALUES
	(1, 'shishir', 'kumar', 1),
	(2, 'vikas', 'dubey', 2),
	(3, 'reshma', 'sharma', 3);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
