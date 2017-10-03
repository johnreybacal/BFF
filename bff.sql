-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 04:28 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bff`
--

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE IF NOT EXISTS `inventory` (
  `inv_id` varchar(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `quantity` int(4) NOT NULL,
  PRIMARY KEY (`inv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inv_id`, `name`, `quantity`) VALUES
('0001', 'Sunflower', 50),
('0002', 'Vase', 42),
('0003', 'Balloons', 48);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` varchar(4) NOT NULL,
  `client_id` varchar(4) NOT NULL,
  `cart` text NOT NULL,
  `date` date NOT NULL,
  `total_bill` int(10) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `trans_id` varchar(4) NOT NULL,
  `client_id` varchar(4) NOT NULL,
  `cart` text NOT NULL,
  `date` date NOT NULL,
  `total_bill` int(10) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `client_id`, `cart`, `date`, `total_bill`) VALUES
('0001', '0001', '{"0":{"id": "0002","name": "Vase","qty": "3"},"1":{"id": "0003","name": "Balloons","qty": "15"},"2":{"id": "0001","name": "Sunflower","qty": "10"}}', '2017-09-30', 1150),
('0002', '0001', '{"0":{"id": "0003","name": "Balloons","qty": "13"}}', '2017-09-30', 130),
('0003', '0001', '{"0":{"id": "0002","name": "Vase","qty": "5"},"1":{"id": "0001","name": "Sunflower","qty": "3"}}', '2017-09-30', 850),
('0004', '0001', '{"0":{"id": "0002","name": "Vase","qty": "1"},"1":{"id": "0003","name": "Balloons","qty": "10"}}', '2017-10-02', 400);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
