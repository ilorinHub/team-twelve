-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 01:31 PM
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
-- Database: `revenue_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_infos`
--

CREATE TABLE `account_infos` (
  `id` int(12) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_infos`
--

INSERT INTO `account_infos` (`id`, `username`, `password`, `user_id`, `created_at`, `modified_at`) VALUES
(11, 'abc', '$2y$10$hl0.9tAk7VsDX8NtohuyK.t84T38ObmG3LPenPRntrpIJS9yE3MZm', 4, '2023-01-27 21:47:30', '2023-01-27 21:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

CREATE TABLE `agents` (
  `id` int(12) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `state` varchar(50) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `passport` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`id`, `full_name`, `state`, `phone_num`, `email`, `username`, `password`, `passport`, `gender`, `created_at`, `modified_at`) VALUES
(5, 'def', 'oyo', '9066666677', 'def@gmail.com', 'def', '$2y$10$WfPAHAQxR0KAEZ4ybEbj5uqXyKAOYVkOkbRZVt2dB5aMR1bTa5iCW', 'defavatar.png', 'male', '2023-01-27 21:55:46', '2023-01-28 17:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `business_infos`
--

CREATE TABLE `business_infos` (
  `id` int(12) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `type` varchar(100) NOT NULL,
  `customer_id` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(12) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `price`, `created_at`, `modified_at`) VALUES
(1, 'kiosk', '500', '2023-01-28 11:44:12', '2023-01-28 11:44:12'),
(2, 'enterprises', '1000', '2023-01-28 12:37:05', '2023-01-28 12:37:05'),
(3, 'factory', '3000', '2023-01-28 12:39:17', '2023-01-28 12:39:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(12) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `phone_num` varchar(10) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `full_name`, `phone_num`, `description`, `added_by`, `created_at`, `modified_at`) VALUES
(5, 'abc', '9133333334', '', 'def', '2023-01-27 23:21:02', '2023-01-27 23:21:02'),
(6, 'a', '8106614197', '', 'def', '2023-01-28 17:35:51', '2023-01-28 17:35:51'),
(7, 'a', 'c', '', 'def', '2023-01-29 08:32:23', '2023-01-29 08:32:23'),
(8, 'adedokun julius ayobami', '8106614197', '        hfhhfkfo        \r\n              ', 'def', '2023-01-29 10:42:16', '2023-01-29 10:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
  `id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `acct_id` int(12) NOT NULL COMMENT 'account id',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`id`, `name`, `email`, `phone_no`, `logo`, `address`, `acct_id`, `created_at`, `modified_at`) VALUES
(8, 'abc enterprises', 'abc@gmail.com', '9087755555', 'abcavatar.png', 'kwara', 11, '2023-01-27 21:47:30', '2023-01-27 21:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `id` int(12) NOT NULL,
  `customer_id` int(12) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `paid_for` varchar(100) NOT NULL,
  `redeem_to` varchar(100) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(12) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone_num`, `gender`, `created_at`, `modified_at`) VALUES
(1, 'adedokun julius ayobami', 'adedokunjulius@gmail.com', '8106614197', 'male', '2023-01-26 12:15:36', '2023-01-26 12:15:36'),
(2, 'a', 'd@g.com', '7136666636', 'female', '2023-01-26 12:34:24', '2023-01-26 12:34:24'),
(3, 'adetola ', 'adedokunjuliusayobami@gmail.com', '8123345779', 'male', '2023-01-27 01:59:44', '2023-01-27 01:59:44'),
(4, 'abc', 'abc@gmail.com', '9087755555', 'male', '2023-01-27 21:47:30', '2023-01-27 21:47:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_infos`
--
ALTER TABLE `account_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `business_infos`
--
ALTER TABLE `business_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acct_id` (`acct_id`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_infos`
--
ALTER TABLE `account_infos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `business_infos`
--
ALTER TABLE `business_infos`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
