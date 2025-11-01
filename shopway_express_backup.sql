-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.31 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for shopway_express
CREATE DATABASE IF NOT EXISTS `shopway_express` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `shopway_express`;

-- Dumping structure for table shopway_express.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.admin: ~0 rows (approximately)
DELETE FROM `admin`;
INSERT INTO `admin` (`email`, `fname`, `lname`, `verification_code`) VALUES
	('hasalawakehan@gmail.com', 'Kehan', 'Hasalawa', '689332a55fd8f');

-- Dumping structure for table shopway_express.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.brand: ~15 rows (approximately)
DELETE FROM `brand`;
INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
	(1, 'Xiaomi'),
	(2, 'Huawei'),
	(3, 'Apple'),
	(4, 'Infinix'),
	(5, 'Asus'),
	(6, 'LG'),
	(7, 'Lenovo'),
	(8, 'Samsung'),
	(9, 'Nokia'),
	(10, 'Vivo'),
	(11, 'HP'),
	(12, 'DELL'),
	(13, 'Canon'),
	(14, 'MSI'),
	(15, 'Acer'),
	(16, 'Nikon'),
	(17, 'Epson'),
	(18, 'Sony');

-- Dumping structure for table shopway_express.brand_has_category
CREATE TABLE IF NOT EXISTS `brand_has_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_brand_id` int NOT NULL,
  `category_category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_brand_has_category_category1_idx` (`category_category_id`),
  KEY `fk_brand_has_category_brand1_idx` (`brand_brand_id`),
  CONSTRAINT `fk_brand_has_category_brand1` FOREIGN KEY (`brand_brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_brand_has_category_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.brand_has_category: ~26 rows (approximately)
DELETE FROM `brand_has_category`;
INSERT INTO `brand_has_category` (`id`, `brand_brand_id`, `category_category_id`) VALUES
	(1, 13, 2),
	(2, 16, 2),
	(3, 18, 2),
	(4, 2, 3),
	(5, 4, 3),
	(6, 6, 3),
	(8, 9, 3),
	(9, 8, 3),
	(10, 18, 3),
	(11, 10, 3),
	(12, 1, 3),
	(15, 3, 3),
	(16, 15, 4),
	(17, 3, 4),
	(18, 5, 4),
	(19, 11, 4),
	(22, 12, 4),
	(24, 7, 4),
	(25, 14, 4),
	(26, 6, 5),
	(27, 8, 5),
	(28, 15, 6),
	(29, 12, 6),
	(30, 11, 6),
	(31, 6, 6),
	(32, 8, 6),
	(33, 3, 7);

-- Dumping structure for table shopway_express.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `product_product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`cart_id`),
  KEY `fk_product_has_user_user1_idx` (`user_email`),
  KEY `fk_product_has_user_product1_idx` (`product_product_id`),
  CONSTRAINT `fk_product_has_user_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_product_has_user_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.cart: ~0 rows (approximately)
DELETE FROM `cart`;
INSERT INTO `cart` (`cart_id`, `qty`, `product_product_id`, `user_email`) VALUES
	(64, 5, 67, 'hasalawakehan@gmail.com');

-- Dumping structure for table shopway_express.category
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.category: ~4 rows (approximately)
DELETE FROM `category`;
INSERT INTO `category` (`category_id`, `category_name`) VALUES
	(2, 'Cameras'),
	(3, 'Mobile Phones'),
	(4, 'Laptops'),
	(5, 'TV'),
	(6, 'Monitor'),
	(7, 'Smart Watches');

-- Dumping structure for table shopway_express.city
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(45) DEFAULT NULL,
  `district_district_id` int NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `fk_city_district1_idx` (`district_district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_district_id`) REFERENCES `district` (`district_id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.city: ~55 rows (approximately)
DELETE FROM `city`;
INSERT INTO `city` (`city_id`, `city_name`, `district_district_id`) VALUES
	(1, 'Colombo', 1),
	(2, 'Dehiwala-Mount Lavinia', 1),
	(3, 'Negombo', 1),
	(4, 'Kandy', 1),
	(5, 'Matale', 1),
	(6, 'Nuwara Eliya', 1),
	(7, 'Jaffna', 1),
	(8, 'Kilinochchi', 8),
	(9, 'Mannar', 16),
	(10, 'Batticaloa', 22),
	(11, 'Ampara', 15),
	(12, 'Chilaw', 17),
	(13, 'Kurunegala', 12),
	(14, 'Trincomalee', 23),
	(15, 'Vavuniya', 15),
	(16, 'Badulla', 16),
	(17, 'Monaragala', 7),
	(18, 'Ratnapura', 13),
	(19, 'Kegalle', 19),
	(20, 'Galle', 12),
	(21, 'Matara', 22),
	(22, 'Hambantota', 6),
	(23, 'Kurunegala', 13),
	(24, 'Nikaweratiya', 13),
	(25, 'Mahiyangana', 16),
	(26, 'Bandarawela', 16),
	(27, 'Ella', 16),
	(28, 'Balangoda', 18),
	(29, 'Rakwana', 18),
	(30, 'Pelmadulla', 18),
	(31, 'Kegalle', 19),
	(32, 'Mawanella', 19),
	(33, 'Rambukkana', 19),
	(34, 'Hatton', 6),
	(35, 'Maskeliya', 6),
	(36, 'Talawakele', 6),
	(37, 'Tissamaharama', 22),
	(38, 'Point Pedro', 7),
	(39, 'Kattankudy', 10),
	(40, 'Negombo', 2),
	(41, 'Dehiattakandiya', 11),
	(42, 'Kekirawa', 16),
	(43, 'Hingurakgoda', 16),
	(44, 'Haputale', 5),
	(45, 'Wellawaya', 17),
	(46, 'Nuwara Eliya', 6),
	(47, 'Kuliyapitiya', 12),
	(48, 'Vavuniya', 15),
	(49, 'Akkaraipattu', 11),
	(50, 'Ratnapura', 18),
	(51, 'Mullaitivu', 8),
	(52, 'Weligama', 18),
	(53, 'Bentota', 3),
	(54, 'Matale', 5),
	(55, 'Balapitiya', 23);

-- Dumping structure for table shopway_express.color
CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int NOT NULL AUTO_INCREMENT,
  `color_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.color: ~48 rows (approximately)
DELETE FROM `color`;
INSERT INTO `color` (`color_id`, `color_name`) VALUES
	(1, 'Green'),
	(2, 'Black'),
	(3, 'Red'),
	(4, 'Blue'),
	(5, 'Yellow'),
	(6, 'Orange'),
	(7, 'Purple'),
	(8, 'Pink'),
	(9, 'Brown'),
	(10, 'White'),
	(11, 'Gray'),
	(12, 'Violet'),
	(13, 'Indigo'),
	(14, 'Cyan'),
	(15, 'Magenta'),
	(16, 'Turquoise'),
	(17, 'Maroon'),
	(18, 'Beige'),
	(19, 'Lavender'),
	(20, 'Gold'),
	(21, 'Silver'),
	(22, 'Bronze'),
	(23, 'Teal'),
	(24, 'Navy'),
	(25, 'Coral'),
	(26, 'Aqua'),
	(27, 'Salmon'),
	(28, 'Peach'),
	(29, 'Mint'),
	(30, 'Lime'),
	(31, 'Olive'),
	(32, 'Chocolate'),
	(33, 'Ivory'),
	(34, 'Crimson'),
	(35, 'Azure'),
	(36, 'Rose'),
	(37, 'Amber'),
	(38, 'Mauve'),
	(39, 'Chartreuse'),
	(40, 'Tan'),
	(41, 'Plum'),
	(42, 'Fuchsia'),
	(43, 'Orchid'),
	(44, 'Saffron'),
	(45, 'Copper'),
	(46, 'Periwinkle'),
	(47, 'Cerulean'),
	(48, 'Ochre');

-- Dumping structure for table shopway_express.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `condition_id` int NOT NULL AUTO_INCREMENT,
  `condition_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`condition_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.condition: ~2 rows (approximately)
DELETE FROM `condition`;
INSERT INTO `condition` (`condition_id`, `condition_name`) VALUES
	(1, 'Brandnew'),
	(2, 'Used');

-- Dumping structure for table shopway_express.district
CREATE TABLE IF NOT EXISTS `district` (
  `district_id` int NOT NULL AUTO_INCREMENT,
  `district_name` varchar(45) DEFAULT NULL,
  `province_province_id` int NOT NULL,
  PRIMARY KEY (`district_id`),
  KEY `fk_district_province1_idx` (`province_province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_province_id`) REFERENCES `province` (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.district: ~26 rows (approximately)
DELETE FROM `district`;
INSERT INTO `district` (`district_id`, `district_name`, `province_province_id`) VALUES
	(1, 'Colombo', 1),
	(2, 'Gampaha', 1),
	(3, 'Kalutara', 1),
	(4, 'Kandy', 1),
	(5, 'Matale', 1),
	(6, 'Nuwara Eliya', 1),
	(7, 'Jaffna', 1),
	(8, 'Kilinochchi', 1),
	(9, 'Mannar', 1),
	(10, 'Trincomalee', 1),
	(11, 'Batticaloa', 1),
	(12, 'Ampara', 1),
	(13, 'Puttalam', 1),
	(14, 'Kurunegala', 3),
	(15, 'Anuradhapura', 1),
	(16, 'Polonnaruwa', 1),
	(17, 'Badulla', 3),
	(18, 'Monaragala', 1),
	(19, 'Ratnapura', 1),
	(20, 'Kegalle', 1),
	(21, 'Hambantota', 1),
	(22, 'Matara', 3),
	(23, 'Galle', 3),
	(24, 'Vavuniya', 1),
	(25, 'Mullaitivu', 1),
	(26, 'Nanadankanan', 1);

-- Dumping structure for table shopway_express.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int NOT NULL AUTO_INCREMENT,
  `gender_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.gender: ~2 rows (approximately)
DELETE FROM `gender`;
INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table shopway_express.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `product_product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_product1_idx` (`product_product_id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.invoice: ~0 rows (approximately)
DELETE FROM `invoice`;
INSERT INTO `invoice` (`id`, `order_id`, `date`, `total`, `qty`, `status`, `product_product_id`, `user_email`) VALUES
	(51, '6893320ed314d', '2025-08-06 16:15:03', 4800, 1, 0, 67, 'hasalawakehan@gmail.com');

-- Dumping structure for table shopway_express.model
CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int NOT NULL AUTO_INCREMENT,
  `model_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.model: ~27 rows (approximately)
DELETE FROM `model`;
INSERT INTO `model` (`model_id`, `model_name`) VALUES
	(1, 'Redmi 8'),
	(2, 'Redmi 8 pro'),
	(3, 'Redmi 9'),
	(4, 'Redmi 9c'),
	(5, 'Redmi 9b'),
	(6, 'Redmi 9a'),
	(8, 'Apple 11'),
	(9, 'Apple 12'),
	(12, 'Apple 13'),
	(13, 'Apple 14'),
	(14, 'Apple 15'),
	(15, 'Tuf gaming'),
	(16, 'Katana'),
	(19, 'Legion 5'),
	(20, 'Bravo thin'),
	(21, 'Infinix hot 10 play'),
	(22, 'Infinix 11'),
	(23, 'Rog'),
	(24, 'Y6'),
	(25, 'Y7'),
	(26, 'Y8'),
	(27, 'A55'),
	(28, 'A15'),
	(29, 'LG'),
	(30, 'Samsung'),
	(31, 'G9'),
	(32, 'Canon');

-- Dumping structure for table shopway_express.model_has_brand
CREATE TABLE IF NOT EXISTS `model_has_brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_model_id` int NOT NULL,
  `brand_brand_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_model_has_brand_brand1_idx` (`brand_brand_id`),
  KEY `fk_model_has_brand_model1_idx` (`model_model_id`),
  CONSTRAINT `fk_model_has_brand_brand1` FOREIGN KEY (`brand_brand_id`) REFERENCES `brand` (`brand_id`),
  CONSTRAINT `fk_model_has_brand_model1` FOREIGN KEY (`model_model_id`) REFERENCES `model` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.model_has_brand: ~26 rows (approximately)
DELETE FROM `model_has_brand`;
INSERT INTO `model_has_brand` (`id`, `model_model_id`, `brand_brand_id`) VALUES
	(1, 1, 1),
	(2, 3, 1),
	(3, 6, 1),
	(4, 5, 1),
	(5, 4, 1),
	(6, 2, 1),
	(11, 24, 2),
	(12, 25, 2),
	(13, 26, 2),
	(14, 8, 3),
	(16, 9, 3),
	(17, 12, 3),
	(18, 13, 3),
	(19, 14, 3),
	(26, 21, 4),
	(27, 22, 4),
	(28, 15, 5),
	(30, 23, 5),
	(31, 19, 7),
	(33, 28, 8),
	(34, 27, 8),
	(35, 29, 6),
	(36, 30, 8),
	(37, 16, 14),
	(38, 31, 3),
	(39, 32, 13);

-- Dumping structure for table shopway_express.product
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `title` varchar(100) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_matara` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `category_category_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `model_has_brand_id` int NOT NULL,
  `color_color_id` int NOT NULL,
  `status_status_id` int NOT NULL,
  `condition_condition_id` int NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_category1_idx` (`category_category_id`),
  KEY `fk_product_user1_idx` (`user_email`),
  KEY `fk_product_model_has_brand1_idx` (`model_has_brand_id`),
  KEY `fk_product_color1_idx` (`color_color_id`),
  KEY `fk_product_status1_idx` (`status_status_id`),
  KEY `fk_product_condition1_idx` (`condition_condition_id`),
  CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_category_id`) REFERENCES `category` (`category_id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_color_id`) REFERENCES `color` (`color_id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_condition_id`) REFERENCES `condition` (`condition_id`),
  CONSTRAINT `fk_product_model_has_brand1` FOREIGN KEY (`model_has_brand_id`) REFERENCES `model_has_brand` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_status_id`) REFERENCES `status` (`status_id`),
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.product: ~13 rows (approximately)
DELETE FROM `product`;
INSERT INTO `product` (`product_id`, `price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee_matara`, `delivery_fee_other`, `category_category_id`, `user_email`, `model_has_brand_id`, `color_color_id`, `status_status_id`, `condition_condition_id`) VALUES
	(1, 1200, 100, 'The Huawei Y6 2019 sports a 6.1-inch display with 720 x 1560 pixels resolution, Helio A22 processor, 3020 mAh battery and Android 9.0 Pie.', 'Huawei Y6 8Gb Storage 2GB RAM', '2024-06-08 21:14:13', 300, 350, 3, 'hasalawakehan@gmail.com', 11, 2, 2, 1),
	(56, 2000, 49, 'TUF Gaming F15 is a feature-packed gaming laptop with the power to carry you to victory. The new GeForce RTX™ 3060 GPU delivers fluid gameplay on up to a 240Hz display with 100% sRGB, while the potent Intel® Core™ i9-11900H CPU is bolstered by improved cooling that amps performance and keeps acoustics stealthy.', 'Asus Tuf Gaming F15', '2024-06-08 21:39:04', 300, 350, 4, 'hasalawakehan@gmail.com', 28, 2, 1, 1),
	(57, 2500, 249, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Apple iphone12', '2024-06-08 21:46:35', 300, 350, 3, 'hasalawakehan@gmail.com', 16, 3, 2, 1),
	(58, 2500, 145, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A13 Bionic chipset, 13 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Apple iphone13', '2024-06-08 21:56:30', 300, 350, 3, 'hasalawakehan@gmail.com', 17, 4, 1, 1),
	(59, 1750, 148, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Apple iphone13 pro', '2024-06-08 22:19:46', 300, 350, 3, 'hasalawakehan@gmail.com', 17, 3, 1, 2),
	(60, 2750, 105, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Redmi 8', '2024-06-08 22:23:42', 300, 350, 3, 'hasalawakehan@gmail.com', 1, 2, 1, 1),
	(61, 2750, 14, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Samsung A55', '2024-06-08 22:27:28', 300, 350, 3, 'hasalawakehan@gmail.com', 34, 17, 1, 1),
	(62, 12750, 400, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Samsung Tv', '2024-06-08 22:34:59', 300, 350, 5, 'hasalawakehan@gmail.com', 36, 2, 1, 1),
	(63, 12750, 98, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'G9 Ultra Smart Watch', '2024-06-08 22:39:18', 300, 350, 7, 'hasalawakehan@gmail.com', 38, 6, 2, 1),
	(64, 46000, 251, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'Canon Full Hd camera', '2024-06-08 22:42:14', 300, 350, 2, 'hasalawakehan@gmail.com', 39, 18, 1, 1),
	(65, 4500, 9, 'Apple iPhone XR smartphone. Announced Sep 2018. Features 6.1″ display, Apple A12 Bionic chipset, 12 MP primary camera, 7 MP front camera, 2942 mAh battery, 256 GB storage', 'MSI Lap', '2024-06-08 22:58:47', 300, 350, 4, 'hasalawakehan@gmail.com', 37, 11, 2, 1),
	(66, 4500, 100, 'good', 'Apple 12', '2024-06-09 20:15:40', 300, 350, 3, 'hasalawakehan@gmail.com', 16, 11, 1, 2),
	(67, 4500, 99, 'good', 'Apple 12', '2024-06-09 20:16:04', 300, 350, 3, 'hasalawakehan@gmail.com', 16, 11, 1, 2);

-- Dumping structure for table shopway_express.product_image
CREATE TABLE IF NOT EXISTS `product_image` (
  `product_image_path` varchar(100) NOT NULL,
  `product_product_id` int NOT NULL,
  PRIMARY KEY (`product_image_path`),
  KEY `fk_product_image_product1_idx` (`product_product_id`),
  CONSTRAINT `fk_product_image_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.product_image: ~36 rows (approximately)
DELETE FROM `product_image`;
INSERT INTO `product_image` (`product_image_path`, `product_product_id`) VALUES
	('resources//product_images//Huawei Y6 8Gb Storage 2GB RAM_0_66647c84bb9b2.jpeg', 1),
	('resources//product_images//Huawei Y6 8Gb Storage 2GB RAM_1_66647c84bd63b.jpeg', 1),
	('resources//product_images//Huawei Y6 8Gb Storage 2GB RAM_2_66647c84bdb15.jpeg', 1),
	('resources//product_images//Asus Tuf Gaming F15_66648220099e9.jpeg', 56),
	('resources//product_images//Asus Tuf Gaming F15_666482200a019.jpeg', 56),
	('resources//product_images//Asus Tuf Gaming F15_666482200a3c6.jpeg', 56),
	('resources//product_images//Apple iphone12_666483e3996f6.jpeg', 57),
	('resources//product_images//Apple iphone12_666483e399c1b.jpeg', 57),
	('resources//product_images//Apple iphone12_666483e39a053.jpeg', 57),
	('resources//product_images//Apple iphone13_666486360125d.jpeg', 58),
	('resources//product_images//Apple iphone13_666486360170b.jpeg', 58),
	('resources//product_images//Apple iphone13_6664863601b11.jpeg', 58),
	('resources//product_images//Apple iphone13 pro_0_66648bcabcbf5.jpeg', 59),
	('resources//product_images//Apple iphone13 pro_1_66648bcabd05a.jpeg', 59),
	('resources//product_images//Apple iphone13 pro_2_66648bcabd400.jpeg', 59),
	('resources//product_images//Redmi 8_66648c96c745a.jpeg', 60),
	('resources//product_images//Redmi 8_66648c96c790a.jpeg', 60),
	('resources//product_images//Redmi 8_66648c96c7dcd.jpeg', 60),
	('resources//product_images//Samsung A55_66648d782b1cd.jpeg', 61),
	('resources//product_images//Samsung A55_66648d782b64f.jpeg', 61),
	('resources//product_images//Samsung A55_66648d782b9d5.jpeg', 61),
	('resources//product_images//Samsung Tv_66648f3b27dfc.jpeg', 62),
	('resources//product_images//Samsung Tv_66648f3b285bb.jpeg', 62),
	('resources//product_images//Samsung Tv_66648f3b289d6.jpeg', 62),
	('resources//product_images//G9 Ultra Smart Watch_6664903ea1341.jpeg', 63),
	('resources//product_images//G9 Ultra Smart Watch_6664903ea1954.jpeg', 63),
	('resources//product_images//G9 Ultra Smart Watch_6664903ea1d0b.jpeg', 63),
	('resources//product_images//Canon Full Hd camera_666490eea952a.jpeg', 64),
	('resources//product_images//Canon Full Hd camera_666490eea9a92.png', 64),
	('resources//product_images//Canon Full Hd camera_666490eea9e1c.jpeg', 64),
	('resources//product_images//MSI Lap_666494cfca22a.jpeg', 65),
	('resources//product_images//MSI Lap_666494cfca7b6.jpeg', 65),
	('resources//product_images//MSI Lap_666494cfcadf6.png', 65),
	('resources//product_images//Apple 12_6665c0140d21c.jpeg', 66),
	('resources//product_images//Apple 12_6665c0140da01.jpeg', 66),
	('resources//product_images//Apple 12_6665c02c1875d.jpeg', 67),
	('resources//product_images//Apple 12_6665c02c19003.jpeg', 67),
	('resources//product_images//Apple 12_6665c02c197b6.jpeg', 67);

-- Dumping structure for table shopway_express.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.profile_image: ~2 rows (approximately)
DELETE FROM `profile_image`;
INSERT INTO `profile_image` (`path`, `user_email`) VALUES
	('resources//profile_images//Hasalawa_0740729268_6664a377235fe.jpeg', 'hasalawakehan@gmail.com'),
	('resources//profile_images//Chirantha_0740729269_66649d2e81ef9.jpeg', 'kishan@gmail.com');

-- Dumping structure for table shopway_express.province
CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int NOT NULL AUTO_INCREMENT,
  `province_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.province: ~9 rows (approximately)
DELETE FROM `province`;
INSERT INTO `province` (`province_id`, `province_name`) VALUES
	(1, 'Western Province'),
	(2, 'Central Province'),
	(3, 'Southern Province'),
	(4, 'Northern Province'),
	(5, 'Eastern Province'),
	(6, 'North Western Province'),
	(7, 'North Central Province'),
	(8, 'Uva Province'),
	(9, 'Sabaragamuwa Province');

-- Dumping structure for table shopway_express.status
CREATE TABLE IF NOT EXISTS `status` (
  `status_id` int NOT NULL AUTO_INCREMENT,
  `status_name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.status: ~2 rows (approximately)
DELETE FROM `status`;
INSERT INTO `status` (`status_id`, `status_name`) VALUES
	(1, 'Available'),
	(2, 'Not Available');

-- Dumping structure for table shopway_express.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `mobile` varchar(10) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `varification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_gender_id` int NOT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_gender_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_gender_id`) REFERENCES `gender` (`gender_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.user: ~3 rows (approximately)
DELETE FROM `user`;
INSERT INTO `user` (`email`, `fname`, `lname`, `password`, `mobile`, `joined_date`, `varification_code`, `status`, `gender_gender_id`) VALUES
	('hasalawakehan@gmail.com', 'Kehan', 'Hasalawa', 'Kh@17052002', '0740729268', '2023-10-12 21:11:18', '67f24f1077115', 1, 1),
	('kishan@gmail.com', 'Kishan', 'Chirantha', '123456789', '0740729269', '2024-06-08 23:29:44', NULL, 1, 1),
	('lakshan@gmail.com', 'Prasanna', 'Lakshan', '852963', '0715654825', '2024-06-08 23:30:14', NULL, 1, 1);

-- Dumping structure for table shopway_express.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `city_city_id` int NOT NULL,
  `address_line_1` text,
  `address_line_2` text,
  `address_line_3` text,
  `postal_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `fk_user_has_city_city1_idx` (`city_city_id`),
  KEY `fk_user_has_city_user1_idx` (`user_email`),
  CONSTRAINT `fk_user_has_city_city1` FOREIGN KEY (`city_city_id`) REFERENCES `city` (`city_id`),
  CONSTRAINT `fk_user_has_city_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.user_has_address: ~1 rows (approximately)
DELETE FROM `user_has_address`;
INSERT INTO `user_has_address` (`address_id`, `user_email`, `city_city_id`, `address_line_1`, `address_line_2`, `address_line_3`, `postal_code`) VALUES
	(1, 'hasalawakehan@gmail.com', 10, 'Udara Vasana', 'Youn Saviyaga', 'Kekanadura', '81000'),
	(8, 'kishan@gmail.com', 21, 'Galla Road', 'Polhena Handiya', 'Matara', '81100');

-- Dumping structure for table shopway_express.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `watchlist_id` int NOT NULL AUTO_INCREMENT,
  `product_product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`watchlist_id`),
  KEY `fk_user_has_product_product1_idx` (`product_product_id`),
  KEY `fk_user_has_product_user1_idx` (`user_email`),
  CONSTRAINT `fk_user_has_product_product1` FOREIGN KEY (`product_product_id`) REFERENCES `product` (`product_id`),
  CONSTRAINT `fk_user_has_product_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table shopway_express.watchlist: ~4 rows (approximately)
DELETE FROM `watchlist`;
INSERT INTO `watchlist` (`watchlist_id`, `product_product_id`, `user_email`) VALUES
	(31, 57, 'hasalawakehan@gmail.com'),
	(32, 60, 'hasalawakehan@gmail.com'),
	(33, 59, 'hasalawakehan@gmail.com'),
	(36, 64, 'hasalawakehan@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
