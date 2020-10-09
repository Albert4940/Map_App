-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 08, 2020 at 04:24 PM
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
-- Database: `map`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `address` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `zip_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address`, `country`, `city`, `zip_code`) VALUES
(1, '1', '1', '1', '1'),
(2, '2', '2', '2', '2'),
(3, '1', '2', 'pv', '23'),
(4, '12', '21', '3', '23'),
(5, 'ok', 'hjjh', 'kafou', '23'),
(6, '12', 'pv', 'delmas', '99'),
(7, 'rue faubert', 'Haiti', 'Petion-ville', '123'),
(8, 'rue faubert', 'Haiti', 'Petion-ville', '123'),
(9, 'rue faubert', 'Haiti', 'Petion-ville', '123'),
(10, 'rue faubert', 'Haiti', 'Petion-ville', '123'),
(11, 'RTNH delmas 33', 'Haiti', 'delmas', 'ht123'),
(12, 'TNH delmas ', 'Haiti', 'delmas', 'ht123'),
(13, 'K-naval Market', 'Haiti', 'Delmas', 'HHt123'),
(14, 'rue faubert 123', 'Haiti', 'Petion-ville', '123'),
(15, 'clercine', 'Haiti', 'tabarre', 'ht123'),
(16, 'clercine 14', 'Haiti', 'tabarre', 'ht123'),
(17, 'RTNH delmas 33', 'Haiti', 'delmaskre', 'ht123'),
(18, 'champ de mars', 'france', 'paris ', 'fr123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, '12', '13', '14', '15'),
(2, 'Albert-Mary', 'Dorce', 'AlbertDev', 'danger'),
(3, 'Albert-Mary', 'Dorce', 'AlbertDev1', '3'),
(4, 'Albert-Mary', 'Dorce', 'AlbertDev5', '3'),
(5, 'klass', 'code', 'klass', '12345'),
(6, 'stee', 'str', '.stee', '.stee'),
(7, 'Albert-Mary', 'Chill', 'mazet', '1111'),
(8, 'Albert-Mary', 'Dorce', 'AlbertDev', '12'),
(9, 'Albert-Mary', 'Dorce', 'AlbDev', '1234'),
(10, 'Albert-Mary', 'Dorce', 'AlbertDev', 'danger'),
(11, 'sanon', 'steeve', 'steevy', 'steevy');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
