-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2023 at 01:50 PM
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
-- Database: `clouthshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `categories_name` text NOT NULL,
  `categories_slug` text NOT NULL,
  `categories_img` text NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_name`, `categories_slug`, `categories_img`, `is_delete`, `created_at`, `updated_at`) VALUES
(2, 'Mans', 'mans', 'uploads/images/istockphoto-1440834111-170667a.jpg', 0, '2023-08-22 23:19:13', '2023-08-22 23:55:31'),
(3, 'women\'s', 'womens', 'uploads/images/baner-right-image-01.jpg', 0, '2023-08-22 23:21:22', '2023-08-22 23:56:43'),
(4, 'children\'s', 'childrens', 'uploads/images/baner-right-image-03.jpg', 0, '2023-08-22 23:57:33', '2023-08-22 23:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `product_name` text DEFAULT NULL,
  `price` text DEFAULT NULL,
  `product_slug` text DEFAULT NULL,
  `product_img` text DEFAULT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `categories_id`, `product_name`, `price`, `product_slug`, `product_img`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 2, 'Leather Jacket', '600', 'leather-jacket', 'uploads/images/istockphoto-1440834111-170667a.jpg', 0, '2023-08-22 23:36:28', '2023-08-22 23:58:53'),
(3, 2, 'Classic jacket', '600', 'classic-jacket', 'uploads/images/jacket4.jpg', 0, '2023-08-22 23:59:30', '2023-08-22 23:59:30'),
(4, 2, 'Terry Jacket', '800', 'terry-jacket', 'uploads/images/jacket3.png', 0, '2023-08-23 00:00:09', '2023-08-23 00:00:09'),
(5, 3, 'Terry Jacket For Women', '700', 'terry-jacket-for-women', 'uploads/images/jacket7.png', 0, '2023-08-23 00:00:56', '2023-08-23 00:00:56'),
(6, 3, 'Leather Jacket For Women', '600', 'leather-jacket-for-women', 'uploads/images/jacket1.jpg', 0, '2023-08-23 00:01:20', '2023-08-23 00:01:20'),
(7, 3, 'Classic jacket For Women', '669', 'classic-jacket-for-women', 'uploads/images/jacket6.png', 0, '2023-08-23 00:01:55', '2023-08-23 00:01:55'),
(8, 4, 'Jam & Honey', '698', 'jam-honey', 'uploads/images/kid-02.jpg', 0, '2023-08-23 00:05:01', '2023-08-23 00:05:01'),
(9, 4, 'Kid\'s Quilted', '987', 'kids-quilted', 'uploads/images/Jam & Honey.jpg', 0, '2023-08-23 00:07:39', '2023-08-23 00:09:13'),
(10, 4, 'Leather Retail', '546', 'leather-retail', 'uploads/images/Leather Retail.jpg', 0, '2023-08-23 00:08:24', '2023-08-23 00:08:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `password` text NOT NULL,
  `is_delete` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatede_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `password`, `is_delete`, `created_at`, `updatede_at`) VALUES
(1, 'admin@gmail.com', '$2a$12$J5fnJ019bkyQ1LQeC1xoBuIvDFZ5nylCv3qad3r/Y3VfwOccHJ3n.', 0, '2023-08-23 11:21:36', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
