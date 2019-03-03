-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 02, 2019 at 11:42 PM
-- Server version: 5.7.24
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectsql`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_first_name` varchar(255) NOT NULL,
  `client_middle_name` varchar(255) DEFAULT NULL,
  `client_last_name` varchar(255) NOT NULL,
  `client_contact` varchar(255) NOT NULL,
  `client_address` varchar(255) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_first_name`, `client_middle_name`, `client_last_name`, `client_contact`, `client_address`, `registration_date`) VALUES
(7, 'wilfreda', 'palngew', 'dawilan', '09260878700', 'bakakeng', '2019-02-27 11:55:14');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `product_price` decimal(10,0) NOT NULL,
  `product_cost` decimal(10,0) NOT NULL,
  `product_sku` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image_url` varchar(1000) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_date_added`, `product_price`, `product_cost`, `product_sku`, `product_quantity`, `product_image_url`, `product_status`) VALUES
(1, 'Single Middle Aged man with money', 'Full blooded igorot from the land of the potatos.. Buguias boy', '2019-02-26 09:21:19', '1000000', '0', 1, 7, 'http://localhost/project/uploads/products/b7234e0db5bb46baeaba28781655d1c0.jpg', 'active'),
(2, 'Red Gas Tank', 'Red gas tank containing eco gas obtained from the fart of young virgins.', '2019-02-08 10:18:19', '1000', '900', 10, 13, 'http://localhost/project/uploads/products/e46ab2cab1451d78b76787ed7264136e.jpg', 'active'),
(5, 'icon', 'icon test product', '2019-02-28 05:47:10', '500', '300', 2, 14, 'http://localhost/project/uploads/products/b27f665c08ff7b900acecfcfafd9bceb.jpg', 'active'),
(6, 'test', 'a test product only', '2019-02-28 05:55:08', '600', '300', 2, 30, 'http://localhost/project/uploads/products/9a672bb2d92cc1a22689958d7be3ffd8.jpg', 'active'),
(7, 'just a test again', 'testing500', '2019-02-28 06:07:48', '500', '5', 5, 5, 'http://localhost/project/uploads/products/9304019f898a1a50240f81c15a81e78c.jpg', 'active'),
(8, 'Papaya', 'papaya na fresh adi', '2019-03-02 12:30:43', '500', '50', 5, 5, 'http://localhost/project/uploads/products/9d8f22255f5127206cc06e348acb9066.jpg', 'active'),
(9, 'this product', 'product of mine', '2019-03-02 12:31:34', '600', '400', 56, 5, 'http://localhost/project/uploads/products/65347493f6a8ad0d5783b7f9deddf186.jpg', 'active'),
(10, 'this is a nother product', 'productng wala ka nang hahanapin pang iba', '2019-03-02 12:32:08', '62', '65', 6564, 65, 'http://localhost/project/uploads/products/b87b69c1f9ae3a142051614d61221dc3.jpg', 'active'),
(11, 'kala kwa ngy nga product', 'basta prooduct nga kwa', '2019-03-02 12:32:55', '500', '200', 23, 12, 'http://localhost/project/uploads/products/6bd42421880bee2412f8066f7249f4be.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `user_type` enum('admin','employee') NOT NULL,
  `contact` int(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `user_type`, `contact`, `address`, `gender`, `username`, `password`, `status`) VALUES
(1, 'administrator', 'administrator', 'administrator', 'admin', 960878700, 'ijy compony', 'female', 'admin', 'admin', 'active'),
(10, 'reuel', 'martinez', 'bigo', 'admin', NULL, NULL, NULL, 'reuel', 'password', 'active'),
(12, 'rinima', 'amwda', 'ammwfaf', 'admin', NULL, NULL, NULL, 'kwa', 'password', 'active'),
(14, 'wilfreda', 'damuki', 'dawilan', 'admin', NULL, NULL, NULL, 'freda', 'password', 'inactive'),
(16, 'Practice', 'atoy', 'nga', 'admin', NULL, NULL, NULL, 'user', 'password', 'active'),
(17, 'another', 'prac', 'this', 'admin', NULL, NULL, NULL, 'adaw', 'password', 'active'),
(18, 'reuel', 'martinez', 'bigo', 'admin', NULL, NULL, NULL, 'mypass', 'password', 'active'),
(19, 'patil', 'bird', 'binigo', 'employee', 260878700, 'Pusel, Amgalueygey, Buguias, Benguet', 'male', 'rachel', 'mypass', 'inactive');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
