-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2020 at 03:51 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `username`, `password`) VALUES
(1, 'admin01', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int(5) NOT NULL,
  `bill_total` int(5) NOT NULL,
  `bill_num` int(5) NOT NULL,
  `bill_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `bill_total`, `bill_num`, `bill_date`) VALUES
(5, 120, 3, '2020-09-26'),
(6, 240, 6, '2020-09-26'),
(7, 360, 9, '2020-09-26'),
(8, 480, 12, '2020-09-26'),
(9, 600, 15, '2020-09-26'),
(10, 720, 18, '2020-09-26'),
(11, 840, 21, '2020-09-26'),
(12, 960, 24, '2020-09-26'),
(13, 1080, 27, '2020-09-26'),
(14, 1200, 30, '2020-09-26'),
(15, 1320, 33, '2020-09-26'),
(16, 1440, 36, '2020-09-26'),
(17, 1560, 39, '2020-09-26'),
(18, 1680, 42, '2020-09-26'),
(19, 1800, 45, '2020-09-26'),
(20, 1920, 48, '2020-09-26'),
(21, 2040, 51, '2020-09-26'),
(22, 2160, 54, '2020-09-26'),
(23, 2280, 57, '2020-09-26'),
(24, 2400, 60, '2020-09-26'),
(25, 2520, 63, '2020-09-26'),
(26, 2640, 66, '2020-09-26'),
(27, 2760, 69, '2020-09-26'),
(28, 2880, 72, '2020-09-26'),
(29, 2955, 74, '2020-09-26'),
(30, 3030, 76, '2020-09-26'),
(31, 3105, 78, '2020-09-26'),
(32, 3180, 80, '2020-09-26'),
(33, 3285, 83, '2020-09-26'),
(34, 3390, 86, '2020-09-26'),
(35, 3495, 89, '2020-09-26'),
(36, 3600, 92, '2020-09-26'),
(37, 3705, 95, '2020-09-26'),
(38, 3810, 98, '2020-09-26'),
(39, 3915, 101, '2020-09-26'),
(40, 4020, 104, '2020-09-26'),
(41, 4020, 105, '2020-09-26'),
(42, 4135, 108, '2020-09-26'),
(43, 4250, 111, '2020-09-26'),
(44, 4365, 114, '2020-09-26'),
(45, 4480, 117, '2020-09-26'),
(46, 4670, 130, '2020-09-26'),
(47, 4745, 132, '2020-09-26'),
(48, 4860, 137, '2020-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `bill_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `num`, `bill_id`) VALUES
(18, 1, 1, 5),
(19, 2, 1, 5),
(20, 3, 1, 5),
(21, 1, 1, 6),
(22, 2, 1, 6),
(23, 3, 1, 6),
(24, 1, 1, 7),
(25, 2, 1, 7),
(26, 3, 1, 7),
(27, 1, 1, 8),
(28, 2, 1, 8),
(29, 3, 1, 8),
(30, 1, 1, 9),
(31, 2, 1, 9),
(32, 3, 1, 9),
(33, 1, 1, 10),
(34, 2, 1, 10),
(35, 3, 1, 10),
(36, 1, 1, 11),
(37, 2, 1, 11),
(38, 3, 1, 11),
(39, 1, 1, 12),
(40, 2, 1, 12),
(41, 3, 1, 12),
(42, 1, 1, 13),
(43, 2, 1, 13),
(44, 3, 1, 13),
(45, 1, 1, 14),
(46, 2, 1, 14),
(47, 3, 1, 14),
(48, 1, 1, 15),
(49, 2, 1, 15),
(50, 3, 1, 15),
(51, 1, 1, 16),
(52, 2, 1, 16),
(53, 3, 1, 16),
(54, 1, 1, 17),
(55, 2, 1, 17),
(56, 3, 1, 17),
(57, 1, 1, 18),
(58, 2, 1, 18),
(59, 3, 1, 18),
(60, 1, 1, 19),
(61, 2, 1, 19),
(62, 3, 1, 19),
(63, 1, 1, 20),
(64, 2, 1, 20),
(65, 3, 1, 20),
(66, 1, 1, 21),
(67, 2, 1, 21),
(68, 3, 1, 21),
(69, 1, 1, 22),
(70, 2, 1, 22),
(71, 3, 1, 22),
(72, 1, 1, 23),
(73, 2, 1, 23),
(74, 3, 1, 23),
(75, 1, 1, 24),
(76, 2, 1, 24),
(77, 3, 1, 24),
(78, 1, 1, 25),
(79, 2, 1, 25),
(80, 3, 1, 25),
(81, 1, 1, 26),
(82, 2, 1, 26),
(83, 3, 1, 26),
(84, 1, 1, 27),
(85, 2, 1, 27),
(86, 3, 1, 27),
(87, 1, 1, 28),
(88, 2, 1, 28),
(89, 3, 1, 28),
(90, 1, 1, 29),
(91, 2, 1, 29),
(92, 1, 1, 30),
(93, 2, 1, 30),
(94, 1, 1, 31),
(95, 2, 1, 31),
(96, 1, 1, 32),
(97, 2, 1, 32),
(98, 1, 1, 33),
(99, 2, 1, 33),
(100, 4, 1, 33),
(101, 1, 1, 34),
(102, 2, 1, 34),
(103, 4, 1, 34),
(104, 1, 1, 35),
(105, 2, 1, 35),
(106, 4, 1, 35),
(107, 1, 1, 36),
(108, 2, 1, 36),
(109, 4, 1, 36),
(110, 1, 1, 37),
(111, 2, 1, 37),
(112, 4, 1, 37),
(113, 1, 2, 38),
(114, 2, 1, 38),
(115, 4, 1, 38),
(116, 1, 1, 39),
(117, 2, 1, 39),
(118, 4, 1, 39),
(119, 1, 1, 40),
(120, 2, 1, 40),
(121, 4, 1, 40),
(122, 4, 1, 42),
(123, 3, 1, 42),
(124, 2, 1, 42),
(125, 4, 1, 43),
(126, 3, 1, 43),
(127, 2, 1, 43),
(128, 4, 1, 44),
(129, 3, 1, 44),
(130, 2, 1, 44),
(131, 4, 1, 45),
(132, 3, 1, 45),
(133, 2, 1, 45),
(134, 4, 2, 46),
(135, 3, 3, 46),
(136, 2, 4, 46),
(137, 1, 2, 46),
(138, 5, 2, 46),
(139, 4, 1, 47),
(140, 3, 1, 47),
(141, 4, 1, 48),
(142, 3, 1, 48),
(143, 2, 3, 48);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_detail` text COLLATE utf8_unicode_ci NOT NULL,
  `product_price` float(15,2) NOT NULL,
  `product_photo` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_detail`, `product_price`, `product_photo`) VALUES
(1, 'กระเพราไก่', 'กระเพราไก่', 35.00, ''),
(2, 'กระเพราหมูกรอบ', 'กระเพราหมูกรอบ', 40.00, ''),
(3, 'กระเพรารวม', 'กระเพรารวม', 45.00, ''),
(4, 'กระเพราหมูสับ', 'กระเพราหมูสับ', 30.00, ''),
(5, 'ข้าวผัดหมู', 'ข้าวผัดหมู', 40.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_no`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
