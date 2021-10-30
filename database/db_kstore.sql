-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2021 at 04:32 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `transaction_id` int(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `user_id`, `transaction_id`, `product_name`, `quantity`, `status`) VALUES
(2, 6, 3, 7, 'tets', 1, 'pending'),
(3, 7, 3, 7, 'item1', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(1, 'food'),
(2, 'drinks'),
(3, 'desserts');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price`) VALUES
(1, 0, 'test5', '55'),
(2, 0, 'item2', '55'),
(3, 0, 'item3', '11'),
(4, 0, 'test item', '55'),
(5, 0, 'prod', 'test'),
(6, 1, 'tets', '55'),
(7, 2, 'item1', '5'),
(8, 3, 'item3', '3'),
(9, 1, 'test5', '1');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `transaction_date`, `status`) VALUES
(1, 3, '2021-10-29 20:17:10', 'requested'),
(2, 3, '2021-10-29 20:17:10', 'requested'),
(3, 3, '2021-10-29 20:17:10', 'requested'),
(4, 3, '2021-10-29 20:17:10', 'requested');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `user_type` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `user_type`, `password`) VALUES
(2, '790', '23', '1231@123123', 'user', 'dff54615aaf85d9b65f74f912b29e429'),
(3, 'admin', 'admin', 'admin@asdasdw', 'admin', '827ccb0eea8a706c4c34a16891f84e7b'),
(11, '123', 'yaps', 'yaps@yaps', 'user', '202cb962ac59075b964b07152d234b70'),
(13, '123', 'test', 'test@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70'),
(18, 'a', 'a', '', 'admin', 'd41d8cd98f00b204e9800998ecf8427e'),
(19, '1', '1', '', 'admin', 'd41d8cd98f00b204e9800998ecf8427e'),
(20, 'admin2', 'test', '', 'admin', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
