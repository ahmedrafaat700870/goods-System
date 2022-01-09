-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 03:08 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goods_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `addfamily_member`
--

CREATE TABLE `addfamily_member` (
  `newMember_id` int(30) NOT NULL,
  `member_name` varchar(30) NOT NULL,
  `ssn` int(30) NOT NULL,
  `address` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `governorate` varchar(30) NOT NULL,
  `birthdate` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `card_id` int(30) NOT NULL,
  `points` int(30) NOT NULL,
  `qr-code` int(30) NOT NULL,
  `card_type` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card`
--

INSERT INTO `card` (`card_id`, `points`, `qr-code`, `card_type`) VALUES
(0, 150, 0, 0),
(1, 580, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

CREATE TABLE `citizen` (
  `citizen_id` int(30) NOT NULL,
  `citizen_type` int(30) NOT NULL,
  `account_state` int(30) NOT NULL,
  `citizen_name` varchar(30) NOT NULL,
  `ssn` int(20) NOT NULL,
  `phone` int(20) NOT NULL,
  `birthdate` int(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `governorate` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`citizen_id`, `citizen_type`, `account_state`, `citizen_name`, `ssn`, `phone`, `birthdate`, `address`, `governorate`) VALUES
(44, 1, 1, 'jkjkl', 121456, 65656, 6565, '6565', 135465);

-- --------------------------------------------------------

--
-- Table structure for table `createcard_replacement`
--

CREATE TABLE `createcard_replacement` (
  `cardReplacement_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `createnewcard`
--

CREATE TABLE `createnewcard` (
  `createNewCard_id` int(30) NOT NULL,
  `request_state` int(11) NOT NULL DEFAULT 0,
  `marriage_contract` varchar(30) NOT NULL,
  `phone_number` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `create_subcard`
--

CREATE TABLE `create_subcard` (
  `createSubCard_id` int(30) NOT NULL,
  `request_state` int(11) NOT NULL DEFAULT 0,
  `password` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `d_market`
--

CREATE TABLE `d_market` (
  `market_id` int(30) NOT NULL,
  `ssn` text NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `phone` int(30) NOT NULL,
  `d_password` varchar(30) NOT NULL,
  `d_username` varchar(30) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `activate` int(30) NOT NULL DEFAULT 0,
  `titel` varchar(30) NOT NULL DEFAULT '0',
  `Market_Revision_Code` varchar(150) DEFAULT NULL,
  `Tax_register` varchar(150) NOT NULL,
  `Commercial_register` text NOT NULL,
  `vc` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_market`
--

INSERT INTO `d_market` (`market_id`, `ssn`, `f_name`, `phone`, `d_password`, `d_username`, `gmail`, `activate`, `titel`, `Market_Revision_Code`, `Tax_register`, `Commercial_register`, `vc`) VALUES
(1, '454654', 'ok', 1287580904, '000aa', 'os', 'osama@gmail.com', 0, '0', 'PDF-60c230cfd55534.83146360.pdf', 'PDF-60c230cfd55625.55035884.pdf', 'PDF-60c230cfd55665.60865382.pdf', 0),
(4, '12345678901234', 'ahmed rafaat ', 1287580904, '123', 'ahmed', 'rafaatahmed3800@gmail.com', 1, 'sohage', 'PDF-60b3f0d8904602.31195119.pdf', 'PDF-60b3f0d89046b7.95234929.pdf', 'PDF-60b3f0d89046f4.57198821.pdf', 7211),
(5, '12345678912334', 'ahmed', 123, '123', 'a', 'rafaatahmed@dfgfd.com', 1, '0', NULL, '', '', 0),
(7, '12345678901238', 'ahmed', 1287580904, '123', 'ahmed2', 'rafaatahmed3800@gmail.com', 0, 'gohima', NULL, '', '', 0),
(8, '12345678901239', 'ahmed', 1287580904, '123', 'ahmed21', 'rafaatahmed@dfgfd.com', 0, 'gohima', NULL, '', '', 0),
(9, '12345678931239', 'ahmed', 1287580904, '123', 'aaa', 'rafaatahmed@dfgfd.com', 0, 'gohima', NULL, '', '', 0),
(10, '42345678901239', 'ahmed', 1287580904, '123', 'osos', 'rafaatahmed@dfgfd.com', 0, 'gohima', NULL, '', '', 0),
(11, '12345678901223', 'ahmed', 1287580904, '123', 'aaWE', 'rafaatahmed@dfgfd.com', 0, 'gohima', NULL, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `d_market_card`
--

CREATE TABLE `d_market_card` (
  `card_id` int(30) NOT NULL,
  `card_name` varchar(30) NOT NULL,
  `card_Expiration` int(30) NOT NULL,
  `card_Security_Code` int(30) NOT NULL,
  `Card_Number` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_market_card`
--

INSERT INTO `d_market_card` (`card_id`, `card_name`, `card_Expiration`, `card_Security_Code`, `Card_Number`) VALUES
(4, 'awaw', 111123, 111123, 111123),
(5, 'a', 1, 1, 1),
(6, 'a', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(30) NOT NULL,
  `employee_position` int(30) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `ssn` int(30) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `market_products`
--

CREATE TABLE `market_products` (
  `marketProducts_id` int(30) NOT NULL,
  `market_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `product_amount` int(30) NOT NULL,
  `activity` int(30) NOT NULL DEFAULT 0,
  `approval` int(30) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market_products`
--

INSERT INTO `market_products` (`marketProducts_id`, `market_id`, `product_id`, `product_amount`, `activity`, `approval`) VALUES
(30, 1, 2, 100, 0, 0),
(31, 1, 1, 100, 0, 0),
(50, 5, 2, 20, 0, 0),
(53, 5, 1, 20, 0, 0),
(55, 4, 2, 100, 1, 0),
(56, 4, 3, 100, 1, 0),
(58, 4, 2, 100, 1, 0),
(60, 4, 1, 100, 1, 0),
(61, 4, 2, 20, 1, 0),
(63, 4, 1, 20, 1, 0),
(64, 4, 2, 100, 1, 0),
(65, 4, 1, 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `market_store`
--

CREATE TABLE `market_store` (
  `market_store_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `market_id` int(30) NOT NULL,
  `market_amount` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `market_store`
--

INSERT INTO `market_store` (`market_store_id`, `product_id`, `market_id`, `market_amount`) VALUES
(0, 1, 5, 1),
(1, 1, 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(30) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_price` int(30) NOT NULL,
  `product_points` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_points`) VALUES
(1, 'rice', 50, 10),
(2, 'sugar', 55, 15),
(3, 'hhhhh', 12, 10),
(4, 'aaaa', 12, 10);

-- --------------------------------------------------------

--
-- Table structure for table `request_d_market`
--

CREATE TABLE `request_d_market` (
  `request_id` int(30) NOT NULL,
  `Sub_Header` varchar(150) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_d_market`
--

INSERT INTO `request_d_market` (`request_id`, `Sub_Header`, `content`) VALUES
(1, 'ahmed', 'sadasassdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssss'),
(2, 'as', 'sadasassdasdasssssssssssssssssssssssssssssssssssssssssssssssssssssss');

-- --------------------------------------------------------

--
-- Table structure for table `transfer_governorate`
--

CREATE TABLE `transfer_governorate` (
  `transferGovernorate_id` int(30) NOT NULL,
  `citizen` int(30) NOT NULL,
  `transfer_reason` varchar(30) NOT NULL,
  `new_governorate` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addfamily_member`
--
ALTER TABLE `addfamily_member`
  ADD PRIMARY KEY (`newMember_id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`citizen_id`);

--
-- Indexes for table `createcard_replacement`
--
ALTER TABLE `createcard_replacement`
  ADD KEY `cardReplacement_id` (`cardReplacement_id`);

--
-- Indexes for table `createnewcard`
--
ALTER TABLE `createnewcard`
  ADD KEY `createNewCard_id` (`createNewCard_id`);

--
-- Indexes for table `create_subcard`
--
ALTER TABLE `create_subcard`
  ADD KEY `createSubCard_id` (`createSubCard_id`);

--
-- Indexes for table `d_market`
--
ALTER TABLE `d_market`
  ADD PRIMARY KEY (`market_id`);

--
-- Indexes for table `d_market_card`
--
ALTER TABLE `d_market_card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `market_products`
--
ALTER TABLE `market_products`
  ADD PRIMARY KEY (`marketProducts_id`),
  ADD KEY `market_id` (`market_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `market_store`
--
ALTER TABLE `market_store`
  ADD PRIMARY KEY (`market_store_id`),
  ADD KEY `market_id` (`market_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transfer_governorate`
--
ALTER TABLE `transfer_governorate`
  ADD PRIMARY KEY (`transferGovernorate_id`),
  ADD KEY `citizen` (`citizen`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `d_market`
--
ALTER TABLE `d_market`
  MODIFY `market_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `d_market_card`
--
ALTER TABLE `d_market_card`
  MODIFY `card_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market_products`
--
ALTER TABLE `market_products`
  MODIFY `marketProducts_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `market_products`
--
ALTER TABLE `market_products`
  ADD CONSTRAINT `market_products_ibfk_1` FOREIGN KEY (`market_id`) REFERENCES `d_market` (`market_id`),
  ADD CONSTRAINT `market_products_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `market_store`
--
ALTER TABLE `market_store`
  ADD CONSTRAINT `market_store_ibfk_1` FOREIGN KEY (`market_id`) REFERENCES `d_market` (`market_id`),
  ADD CONSTRAINT `market_store_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `transfer_governorate`
--
ALTER TABLE `transfer_governorate`
  ADD CONSTRAINT `transfer_governorate_ibfk_1` FOREIGN KEY (`citizen`) REFERENCES `citizen` (`citizen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
