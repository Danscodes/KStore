-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 03, 2021 at 02:03 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u245151288_pos`
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
(3, 31, 64, 2, 'Curls     10.00 Php', 5, 'requested');

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
(9, 'Drinks'),
(10, 'Food'),
(11, 'Snacks');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `category_id`, `product_name`, `price`, `file_path`) VALUES
(16, 11, 'Pewe', '7', 'default'),
(17, 11, 'Chippy', '8', 'default'),
(18, 11, 'Piatos', '10', 'default'),
(20, 9, 'Mt.Dew', '15', 'default'),
(21, 9, 'Coke', '18', 'default'),
(22, 10, 'Burger', '20.00', '../uploads/burger.jfif'),
(23, 10, 'Fries', '25', 'default'),
(25, 9, 'Mocha', '233.22', '../uploads/Screenshot_1637764903.png'),
(26, 9, 'test', '23', ''),
(27, 9, 'test', '23', '../uploads/'),
(28, 9, 'test', '33', '../uploads/'),
(31, 11, 'Curls', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL,
  `total` decimal(13,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `transaction_date`, `date_updated`, `status`, `total`) VALUES
(2, 64, '2021-10-29 20:17:10', '2021-12-03 00:47:48', 'pickup', '0.00');

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
  `password` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `age` int(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `name`, `email`, `user_type`, `password`, `age`, `sex`, `address`, `contact_no`) VALUES
(26, 'admin', 'admin', 'usera@gmail.com', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', '', ''),
(28, 'a', 'user1', 'a@a', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 0, '', '', ''),
(30, 'b', 'user2', 'test@ga', 'user', '92eb5ffee6ae2fec3ad71c777531578f', 0, '', '', ''),
(61, 'Yengboo', 'Yeng', 'ajsia00@gmail.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 21, 'male', 'asdasds', '09632198045 '),
(62, 'adrian', 'ajsia', 'ajsia@gmail.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 21, 'male', 'asdasda', '12312312'),
(63, 'peaches', 'peaches', 'peaches@ymail.com', 'user', '95cd3fc01819b69d1a4900e6fe3d293c', 25, 'female', 'st test test city', '0384+4 '),
(64, 'yas', 'yas', 'yas@gmal', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 22, 'male', 'brgy.singcang airport subd.', '09565171220 '),
(65, 'reiniel', 'reiniel', 'reinielbancaya7@gmail.com', 'user', '827ccb0eea8a706c4c34a16891f84e7b', 22, 'male', 'silay city', '4950108 ');

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
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
