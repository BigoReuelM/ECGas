-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 29, 2019 at 02:04 AM
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
  `client_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_first_name`, `client_middle_name`, `client_last_name`, `client_contact`, `client_address`, `registration_date`, `client_status`) VALUES
(1, 'Wilfreda', '', 'Dawilan', '09235685996', 'Tetepan Village, Bakakeng sur', '2019-03-11 07:12:10', 'active'),
(2, 'Ronnel', 'Martinez', 'Bigo', '09632205642', 'Dizon Subdivision, Baguio City', '2019-03-11 07:14:33', 'active'),
(3, 'Rachel', 'Martinez', 'Bigo', '09632205642', 'Dizon Subdivision, Baguio City', '2019-03-11 07:14:33', 'active'),
(4, 'Zara Mae', 'Martinez', 'Isican', '06632554895', 'Quezon Hill', '2019-03-11 07:15:08', 'active'),
(5, 'Maricris', '', 'Macario', '096322564', 'Quirino Hill', '2019-03-11 07:16:32', 'active'),
(6, 'Emarry', '', 'Cayabyab', '09656235485', 'Queen Of Peace', '2019-03-11 07:17:11', 'inactive'),
(7, 'Janny', '', 'Toledo', '0965623456', 'Bonifacio Street, Baguio City', '2019-03-11 07:18:03', 'active'),
(8, 'Marinell', '', 'Alegre', '0652365489', 'Balakbak', '2019-03-11 07:18:25', 'active'),
(9, 'Sylvester', '', 'Carineo', '09562356485', 'Tamawan', '2019-03-11 07:19:03', 'active'),
(10, 'Jayson', '', 'Caliway', '09562354256', 'Buyagan', '2019-03-11 07:19:35', 'active'),
(11, 'Patrick', 'Malunay', 'Kalidang', '09260878700', 'Green Valeey', '2019-03-11 07:20:35', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

DROP TABLE IF EXISTS `expenses`;
CREATE TABLE IF NOT EXISTS `expenses` (
  `expense_id` int(11) NOT NULL AUTO_INCREMENT,
  `expense_name` varchar(255) NOT NULL,
  `expense_description` varchar(255) NOT NULL,
  `expense_amount` decimal(10,0) NOT NULL,
  `expense_date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`expense_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `expense_name`, `expense_description`, `expense_amount`, `expense_date`, `user_id`) VALUES
(1, 'Food', 'Food for the workers', '500', '2019-03-29', 1),
(2, 'Fair', 'Pamasahi nung sumundu sa akin', '500', '2019-03-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(255) NOT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issues`
--

INSERT INTO `issues` (`issue_id`, `issue`) VALUES
(1, 'Damaged Cylender'),
(2, 'Chiped Paint'),
(3, 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `issue_records`
--

DROP TABLE IF EXISTS `issue_records`;
CREATE TABLE IF NOT EXISTS `issue_records` (
  `issue_record_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `date_recorded` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`issue_record_id`),
  KEY `client_id` (`client_id`),
  KEY `product_id` (`product_id`),
  KEY `issue_id` (`issue_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `issue_records`
--

INSERT INTO `issue_records` (`issue_record_id`, `product_id`, `client_id`, `user_id`, `issue_id`, `date_recorded`) VALUES
(1, 1, 1, 1, 1, '2019-03-28 00:09:31'),
(2, 1, 2, 1, 1, '2019-03-28 00:09:41'),
(3, 2, 3, 1, 1, '2019-03-28 00:09:49'),
(4, 2, 1, 1, 2, '2019-03-28 00:11:21'),
(5, 6, 1, 1, 2, '2019-03-28 00:11:34'),
(6, 2, 1, 1, 2, '2019-03-28 00:28:13'),
(7, 1, 1, 1, 3, '2019-03-28 00:30:39');

-- --------------------------------------------------------

--
-- Table structure for table `payment_logs`
--

DROP TABLE IF EXISTS `payment_logs`;
CREATE TABLE IF NOT EXISTS `payment_logs` (
  `payment_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_of_payment` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`payment_log_id`),
  KEY `sales_id` (`sales_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_logs`
--

INSERT INTO `payment_logs` (`payment_log_id`, `sales_id`, `user_id`, `time_of_payment`, `amount`) VALUES
(1, 1, 1, '2019-03-25 12:45:39', '2800'),
(2, 2, 1, '2019-03-25 13:57:15', '500'),
(3, 2, 1, '2019-03-25 14:08:53', '500'),
(4, 2, 1, '2019-03-25 14:10:27', '200'),
(5, 2, 1, '2019-03-25 14:10:38', '1800'),
(6, 3, 1, '2019-03-25 14:29:43', '600'),
(7, 3, 1, '2019-03-25 14:31:47', '100');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`payment_method_id`, `payment_method`) VALUES
(1, 'Cash'),
(2, 'CHEQUE');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `product_date_added` datetime DEFAULT CURRENT_TIMESTAMP,
  `product_price` decimal(10,0) NOT NULL,
  `product_cost` decimal(10,0) NOT NULL,
  `product_sku` int(11) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_image_url` varchar(1000) NOT NULL,
  `product_status` enum('active','inactive') NOT NULL DEFAULT 'active',
  PRIMARY KEY (`product_id`),
  KEY `product_category_id` (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_title`, `product_description`, `product_category_id`, `product_date_added`, `product_price`, `product_cost`, `product_sku`, `product_quantity`, `product_image_url`, `product_status`) VALUES
(1, 'EC gas', 'Newly delivered brand new cylinders', 2, '2019-03-10 20:09:21', '3000', '2200', 30, 32, 'http://localhost/project/uploads/products/29a594a034a0da784c4d8c64d6337fda.jpg', 'active'),
(2, 'ECGas Refill cylinders', 'Refilled cylinders', 2, '2019-03-10 20:34:59', '900', '680', 30, 28, 'http://localhost/project/uploads/products/0c68637b222b15496e9db2d7cf9cd0e6.jpg', 'active'),
(6, 'Regulator', 'Regulates the flow of gas from the tank to the hose', 1, '2019-03-11 09:40:13', '300', '250', 30, 26, 'http://localhost/project/uploads/products/0b13e74848586d88e45bd840864f7629.jpg', 'active'),
(7, 'Stove', 'Dual burner stove', 1, '2019-03-13 08:07:04', '1200', '1000', 5, 8, 'http://localhost/project/uploads/products/3f50b0360bd1a613d957fccfaa077ecb.jpg', 'active'),
(8, 'Gas stove hose', 'Hose for gas stove', 1, '2019-03-13 08:08:34', '300', '250', 5, 8, 'http://localhost/project/uploads/products/aad5f4fcb0f3f644a84576d6741f2284.jpg', 'active'),
(9, 'Propane single burner', 'Single burner', 1, '2019-03-13 08:10:43', '800', '600', 5, 0, 'http://localhost/project/uploads/products/28befa4b3591a7a8f13464cde19d2d5a.jpg', 'inactive'),
(10, 'Hose clamp', 'Clamp for gas hose to prevent leakage', 1, '2019-03-13 08:13:08', '50', '35', 10, 46, 'http://localhost/project/uploads/products/1d3111707c2a3657679b777902f66f32.jpg', 'active'),
(11, 'Timed stove shut off', 'Set time for when a stove automatically turns off', 3, '2019-03-13 08:16:33', '2500', '2000', 5, 10, 'http://localhost/project/uploads/products/54ce9f70d101d87b80ea85fd1af2c9db.jpg', 'active'),
(12, 'Gas leak detector', 'Detects leaks on gas stoves or gas tanks', 3, '2019-03-13 08:19:22', '1500', '1000', 5, 9, 'http://localhost/project/uploads/products/923952bea3458cddf3fe7f0989c1edd1.jpg', 'active'),
(13, 'Fire gas leak detector system', '', 3, '2019-03-13 08:23:12', '3000', '2500', 5, 9, 'http://localhost/project/uploads/products/918c23a76d75f4957aabfa792d903dc4.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`product_category_id`, `product_category`) VALUES
(1, 'Accessories'),
(2, 'Gas'),
(3, 'Safety Devices');

-- --------------------------------------------------------

--
-- Table structure for table `product_customer_alert`
--

DROP TABLE IF EXISTS `product_customer_alert`;
CREATE TABLE IF NOT EXISTS `product_customer_alert` (
  `alert_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `days_of_ussage` int(11) NOT NULL,
  PRIMARY KEY (`alert_id`),
  KEY `client_id` (`client_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_customer_alert`
--

INSERT INTO `product_customer_alert` (`alert_id`, `product_id`, `client_id`, `days_of_ussage`) VALUES
(1, 2, 4, 30),
(2, 1, 1, 4),
(3, 1, 3, 10),
(4, 2, 7, 5);

-- --------------------------------------------------------

--
-- Table structure for table `product_sales`
--

DROP TABLE IF EXISTS `product_sales`;
CREATE TABLE IF NOT EXISTS `product_sales` (
  `product_sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  `product_count` int(11) NOT NULL,
  `product_total_amount` decimal(10,0) NOT NULL,
  `product_cost` decimal(10,0) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`product_sales_id`),
  KEY `product_id` (`product_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sales`
--

INSERT INTO `product_sales` (`product_sales_id`, `product_id`, `sales_id`, `product_count`, `product_total_amount`, `product_cost`, `product_price`) VALUES
(1, 1, 1, 1, '3000', '2200', '3000'),
(2, 1, 2, 1, '3000', '2200', '3000'),
(3, 2, 3, 1, '900', '680', '900'),
(4, 1, 4, 1, '3000', '2200', '3000'),
(5, 1, 5, 1, '3000', '2200', '3000');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
CREATE TABLE IF NOT EXISTS `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sales_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sales_total_amount` decimal(10,0) NOT NULL,
  `sales_discount` decimal(10,0) NOT NULL,
  `sales_total_payable` decimal(10,0) NOT NULL,
  `sales_amount_tendered` decimal(10,0) NOT NULL,
  `sales_paid_amount` decimal(10,0) NOT NULL,
  `sales_balance` decimal(10,0) NOT NULL,
  `sales_change` decimal(10,0) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `sales_total_items` int(11) NOT NULL,
  `sales_status` enum('credit','partialyPaid','fullyPaid') NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `client_id`, `user_id`, `sales_date`, `sales_total_amount`, `sales_discount`, `sales_total_payable`, `sales_amount_tendered`, `sales_paid_amount`, `sales_balance`, `sales_change`, `payment_method_id`, `sales_total_items`, `sales_status`) VALUES
(1, 1, 1, '2019-03-25 12:45:38', '3000', '200', '2800', '3000', '2800', '0', '200', 1, 1, 'fullyPaid'),
(2, 3, 1, '2019-03-25 12:46:11', '3000', '0', '3000', '0', '3000', '0', '0', NULL, 1, 'fullyPaid'),
(3, 7, 1, '2019-03-25 14:29:43', '900', '200', '700', '600', '700', '0', '0', 1, 1, 'fullyPaid'),
(4, 1, 1, '2019-03-25 17:03:59', '3000', '0', '3000', '0', '0', '3000', '0', NULL, 1, 'credit'),
(5, NULL, 1, '2019-03-25 17:08:39', '3000', '0', '3000', '0', '0', '3000', '0', NULL, 1, 'credit');

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
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `middle_name`, `last_name`, `user_type`, `contact`, `address`, `gender`, `username`, `password`, `status`) VALUES
(1, 'Reuel', 'Martinez', 'Bigo', 'admin', '09260878700', '#31 Kalapati Street, Dizon Subdivision, Baguio City', 'male', 'reuel', 'password', 'active'),
(2, 'Pedro', '', 'Pipito', 'employee', '09656623564', 'Pinget, Baguio City', 'male', 'pedro', 'password', 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `issue_records`
--
ALTER TABLE `issue_records`
  ADD CONSTRAINT `issue_records_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_records_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_records_ibfk_3` FOREIGN KEY (`issue_id`) REFERENCES `issues` (`issue_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `issue_records_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `payment_logs`
--
ALTER TABLE `payment_logs`
  ADD CONSTRAINT `payment_logs_ibfk_1` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_logs_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`product_category_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_customer_alert`
--
ALTER TABLE `product_customer_alert`
  ADD CONSTRAINT `product_customer_alert_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_customer_alert_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `product_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_sales_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON UPDATE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`payment_method_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
