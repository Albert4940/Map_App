-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2020 at 02:59 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jehovah_jireh_junck_parts`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL,
  `account_state` varchar(225) NOT NULL,
  `creation_date` date NOT NULL,
  `access_keys` int(10) NOT NULL,
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `access_keys` (`access_keys`),
  KEY `fk_accuser_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `user_id`, `username`, `password`, `status`, `account_state`, `creation_date`, `access_keys`) VALUES
(1, 1, 'AlbertDev', '1111', 'adm', 'active', '2020-08-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `connection_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `date_login` date NOT NULL,
  `date_logout` date NOT NULL,
  PRIMARY KEY (`connection_id`),
  KEY `fk_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `product_base_id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `product_comment` text NOT NULL,
  `creation_date` date NOT NULL,
  `product_quantity` int(10) NOT NULL,
  `sale_price_percent` decimal(10,0) NOT NULL,
  `sale_price` int(10) NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_pb` (`product_base_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_base_id`, `price`, `product_comment`, `creation_date`, `product_quantity`, `sale_price_percent`, `sale_price`) VALUES
(16, 28, 123, 'nkl', '2020-08-30', 12, '12', 138),
(17, 29, 23, 'nkl', '2020-09-02', 1234, '34', 31),
(18, 30, 500, 'bon bagay', '2020-08-31', 12, '32', 660),
(19, 31, 123, 'bon bagay', '2020-09-01', 123, '321', 518),
(20, 32, 1455343, 'nkl', '2020-08-31', 12, '34', 1950160);

-- --------------------------------------------------------

--
-- Table structure for table `product_base`
--

DROP TABLE IF EXISTS `product_base`;
CREATE TABLE IF NOT EXISTS `product_base` (
  `product_base_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `product_name` varchar(225) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `product_model` varchar(225) NOT NULL,
  PRIMARY KEY (`product_base_id`),
  KEY `fk_pb_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_base`
--

INSERT INTO `product_base` (`product_base_id`, `user_id`, `product_name`, `product_category`, `product_model`) VALUES
(1, 1, 'prod_name', 'prod_category', 'prod_model'),
(3, 1, 'prod_name', 'prod_category', 'prod_model'),
(7, 1, 'oil', 'oil cat', '2019'),
(8, 1, 'ok', 'ok', 'ok'),
(9, 1, 'ok', 'ok', 'ok'),
(11, 1, 'ok', 'ok', 'ok'),
(12, 1, 'ok', 'ok', 'ok'),
(13, 1, 'ok', 'ok', 'ok'),
(14, 1, 'ok', 'ok', 'ok'),
(15, 1, 'ok', 'ok', 'ok'),
(16, 1, 'ok', 'ok', 'ok'),
(17, 1, 'ok', 'ok', 'ok'),
(21, 1, 'ok', 'ok', 'ok'),
(28, 1, 'Chilles', 'instagram', 'ok'),
(29, 1, 'Albert-Mary dorce', 'instagram', 'ok'),
(30, 1, 'galon lwil', 'machin', '2012'),
(31, 1, 'ok', 'zo devan', '2012'),
(32, 1, 'ok', 'ok', 'ok');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

DROP TABLE IF EXISTS `sale`;
CREATE TABLE IF NOT EXISTS `sale` (
  `sale_id` int(10) NOT NULL AUTO_INCREMENT,
  `sale_code` bigint(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_amount` float NOT NULL DEFAULT '0',
  `cash` float NOT NULL DEFAULT '0',
  `due` float NOT NULL DEFAULT '0',
  `item_count` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`sale_id`),
  UNIQUE KEY `sale_code` (`sale_code`),
  KEY `fk_sale_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`sale_id`, `sale_code`, `user_id`, `sale_date`, `sale_amount`, `cash`, `due`, `item_count`) VALUES
(51, 2029, 1, '2020-09-05', 138, 138, 0, 1),
(53, 2023, 1, '2020-09-05', 829, 829, 0, 3),
(54, 2020, 1, '2020-09-05', 1489, 1489, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `sales_line`
--

DROP TABLE IF EXISTS `sales_line`;
CREATE TABLE IF NOT EXISTS `sales_line` (
  `sale_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `discount_rate` int(10) NOT NULL DEFAULT '0',
  `total` bigint(20) NOT NULL,
  PRIMARY KEY (`sale_id`,`product_id`),
  KEY `fk_product_id` (`product_id`),
  KEY `fk_salesline_id` (`sale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_line`
--

INSERT INTO `sales_line` (`sale_id`, `product_id`, `quantity`, `price`, `discount_rate`, `total`) VALUES
(51, 16, 1, 138, 0, 138),
(53, 16, 1, 138, 0, 138),
(53, 17, 1, 31, 0, 31),
(53, 18, 1, 660, 0, 660),
(54, 16, 1, 138, 0, 138),
(54, 17, 1, 31, 0, 31),
(54, 18, 2, 660, 0, 1320);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `phone_number` int(10) NOT NULL,
  `email` varchar(225) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `phone_number`, `email`) VALUES
(1, 'Albert-MAry', 'Dorce', 37089865, 'dorce@gmail.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_accuser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pb` FOREIGN KEY (`product_base_id`) REFERENCES `product_base` (`product_base_id`);

--
-- Constraints for table `product_base`
--
ALTER TABLE `product_base`
  ADD CONSTRAINT `fk_pb_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `fk_sale_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `sales_line`
--
ALTER TABLE `sales_line`
  ADD CONSTRAINT `fk_salesline_id` FOREIGN KEY (`sale_id`) REFERENCES `sale` (`sale_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
