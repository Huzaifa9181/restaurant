-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 03:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resturant`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `time`) VALUES
(1, 'Fast Food', '2022-09-21 18:30:08'),
(2, 'Chinese', '2022-09-21 02:46:57'),
(3, 'Desi', '2022-09-21 18:30:19'),
(4, 'Beverages', '2022-09-21 04:05:19');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `order_id` int(50) NOT NULL,
  `order_name` varchar(50) NOT NULL,
  `order_price` int(25) NOT NULL,
  `order_quantity` int(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_id`, `order_name`, `order_price`, `order_quantity`, `user_email`, `time`) VALUES
(25, 1, 'Krunch Burger\r\n', 290, 1, 'huzaifa@gmail.com', '2022-09-24 06:06:37'),
(26, 1, 'Krunch Burger\r\n', 290, 5, 'huzaifa@gmail.com', '2022-09-24 06:10:09'),
(27, 1, 'Krunch Burger\r\n', 290, 1, 'huzaifa@gmail.com', '2022-09-24 06:10:20'),
(28, 1, 'Krunch Burger\r\n', 290, 1, 'huzaifa@gmail.com', '2022-09-24 06:11:46'),
(29, 1, 'Krunch Burger\r\n', 290, 3, 'huzaifa@gmail.com', '2022-09-24 06:14:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `path` text NOT NULL,
  `price` int(25) NOT NULL,
  `cat_id` int(20) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `path`, `price`, `cat_id`, `time`) VALUES
(1, 'Krunch Burger\n', '1.png', 290, 1, '2022-09-21 04:16:52'),
(6, '\nKrunch With Fries N Drink', '2.png', 290, 1, '2022-09-21 18:23:26'),
(8, 'Value Bucket\n', '3.png', 350, 1, '2022-09-21 19:58:40'),
(10, 'Mutton Karahi', 'mu-2-300x169.jpg', 1500, 3, '2022-09-24 06:15:56'),
(11, 'Halwa Puri', 'halwa_puri.jpg', 40, 3, '2022-09-24 06:16:52'),
(12, 'Sajji', 'saji.jpg', 1600, 3, '2022-09-24 06:17:40'),
(13, 'Coke Cola', 'coke.jpg', 100, 4, '2022-09-24 06:18:42'),
(14, 'Special Lassi', 'lassi.jpg', 120, 4, '2022-09-24 06:23:37'),
(15, 'Mocktails', 'mocktails.jpg', 180, 4, '2022-09-24 06:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `table_reservation`
--

CREATE TABLE `table_reservation` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `people` int(30) NOT NULL,
  `table_book` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_reservation`
--

INSERT INTO `table_reservation` (`id`, `email`, `phone`, `people`, `table_book`, `date`, `time`) VALUES
(21, 'huzaifa@gmail.com', 1231321321, 6, 'Booked', '2022-09-09', '04:53:00'),
(22, 'huzaifa@gmail.com', 13213131, 12, 'Booked', '2022-09-28', '06:18:00'),
(23, 'huzaifa@gmail.com', 312541661, 22, 'Cancel', '2022-10-08', '06:31:00'),
(24, 'huzaifa@gmail.com', 1231321321, 5, 'Booked', '2022-09-23', '06:35:00'),
(25, 'huzaifaahmed9181@gmail.com', 312541661, 222, 'Booked', '2022-09-13', '01:45:00'),
(26, 'huzaifa@gmail.com', 312541661, 222, 'Booked', '2022-10-07', '01:49:00'),
(27, 'huzaifa@gmail.com', 1231321321, 4, 'Booked', '2022-09-03', '07:08:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` varchar(10) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone_no`, `password`, `role_id`, `time`) VALUES
(20, 'huzaifaa', 'huzaifa@gmail.com', 123456789, '123', '2', '2022-09-16 04:39:12'),
(23, 'admin', 'admin@gmail.com', 1213131321, '123', '1', '2022-09-18 06:46:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_reservation`
--
ALTER TABLE `table_reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `table_reservation`
--
ALTER TABLE `table_reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
