-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2019 at 01:52 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `issues`
--

DROP TABLE IF EXISTS `issues`;
CREATE TABLE IF NOT EXISTS `issues` (
  `issue_id` int(11) NOT NULL AUTO_INCREMENT,
  `issue` varchar(255) NOT NULL,
  PRIMARY KEY (`issue_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_category` varchar(255) NOT NULL,
  PRIMARY KEY (`product_category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_return`
--

DROP TABLE IF EXISTS `product_return`;
CREATE TABLE IF NOT EXISTS `product_return` (
  `return_id` int(11) NOT NULL AUTO_INCREMENT,
  `rr_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_returned_count` int(11) NOT NULL,
  PRIMARY KEY (`return_id`),
  KEY `product_id` (`product_id`),
  KEY `rr_id` (`rr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `returned_product_count` int(11) NOT NULL DEFAULT '0',
  `product_total_amount` decimal(10,0) NOT NULL,
  `product_cost` decimal(10,0) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  PRIMARY KEY (`product_sales_id`),
  KEY `product_id` (`product_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returns_refunds`
--

DROP TABLE IF EXISTS `returns_refunds`;
CREATE TABLE IF NOT EXISTS `returns_refunds` (
  `rr_id` int(11) NOT NULL AUTO_INCREMENT,
  `rr_reason` varchar(255) NOT NULL,
  `rr_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rr_amount` decimal(10,0) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sales_id` int(11) NOT NULL,
  PRIMARY KEY (`rr_id`),
  KEY `user_id` (`user_id`),
  KEY `sales_id` (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `sales_refund_amount` decimal(10,0) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `sales_total_items` int(11) NOT NULL,
  `sales_status` enum('credit','partialyPaid','fullyPaid') NOT NULL,
  PRIMARY KEY (`sales_id`),
  KEY `client_id` (`client_id`),
  KEY `user_id` (`user_id`),
  KEY `payment_method_id` (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Constraints for table `product_return`
--
ALTER TABLE `product_return`
  ADD CONSTRAINT `product_return_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_return_ibfk_2` FOREIGN KEY (`rr_id`) REFERENCES `returns_refunds` (`rr_id`) ON UPDATE CASCADE;

--
-- Constraints for table `product_sales`
--
ALTER TABLE `product_sales`
  ADD CONSTRAINT `product_sales_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_sales_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON UPDATE CASCADE;

--
-- Constraints for table `returns_refunds`
--
ALTER TABLE `returns_refunds`
  ADD CONSTRAINT `returns_refunds_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `returns_refunds_ibfk_2` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`sales_id`) ON UPDATE CASCADE;

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
