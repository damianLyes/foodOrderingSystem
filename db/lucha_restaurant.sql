-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 11:53 PM
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
-- Database: `lucha_restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `cid` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `menu_item_name` varchar(50) NOT NULL,
  `menu_item_id` int(10) NOT NULL,
  `price` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`cid`, `user_id`, `menu_item_name`, `menu_item_id`, `price`, `date`) VALUES
(29, 0, 'Beef Burger', 8, 15, '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `category` varchar(10) NOT NULL,
  `description` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `image`, `category`, `description`, `price`, `date_added`) VALUES
(7, 'Chicken Burger', 'product-chicken-burger.jpg', 'burger', 'Chicken, cheese, vegetables, onion, fries', 19, '2022-05-29'),
(8, 'Beef Burger', 'product-burger.jpg', 'burger', 'Beef, cheese, potato, onion, fries, veggies', 15, '2022-05-29'),
(9, 'Peperoni', 'product-pizza.jpg', 'pizza', 'Special pizza sauce , Mozzarella, Peperoni, X Large', 29, '2022-05-29'),
(10, 'Nigiri-sushi', 'product-sushi.jpg', 'sushi', '320g sushi rice, 80ml sushi vinegar, nori seaweed, nigiri sushi mould, wasabi paste', 31, '2022-05-29'),
(11, 'Creste di Galli', 'product-pasta.jpg', 'pasta', 'Macaroni, Farfalle, Campanelle', 12, '2022-05-29');

-- --------------------------------------------------------

--
-- Table structure for table `my_orders`
--

CREATE TABLE `my_orders` (
  `order_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `price` int(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_orders`
--

INSERT INTO `my_orders` (`order_id`, `user_id`, `menu_id`, `menu_name`, `address`, `price`, `date`) VALUES
(1, 19, 11, 'Creste di Galli', '59 sokak street', 12, '2022-05-30'),
(2, 19, 8, 'Beef Burger', '59 sokak street', 15, '2022-05-30'),
(3, 19, 8, 'Beef Burger', 'mkpkokiti ave.', 15, '2022-05-30'),
(6, 19, 11, 'Creste di Galli', 'mkpkokiti ave.', 12, '2022-05-30'),
(7, 15, 10, 'Nigiri-sushi', 'Agege Street Ogbe', 31, '2022-05-30'),
(8, 15, 7, 'Chicken Burger', 'Agege Street Ogbe', 19, '2022-05-30'),
(9, 15, 9, 'Peperoni', 'Agege Street Ogbe', 29, '2022-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `phone`, `password`, `dob`, `date_created`) VALUES
(14, 'Ekenechuku', 'ekene@mail.com', '23453255439', '1234568', '2012-12-12', '2022-05-27 10:03:49'),
(15, 'Ebuka', 'ebuka@mail.com', '12345651234', '1234566', '2018-12-31', '2022-05-27 10:07:30'),
(19, 'Humpty Dumpty', 'humptyd@mail.com', '234 903 234 891', 'qwert67899', '2016-05-04', '2022-05-27 11:42:12'),
(21, 'Obum Obums', 'obum@bums.com', '9876549087', '23456789', '2015-05-29', '2022-05-27 12:10:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_orders`
--
ALTER TABLE `my_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `my_orders`
--
ALTER TABLE `my_orders`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
