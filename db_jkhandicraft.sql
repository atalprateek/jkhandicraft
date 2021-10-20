-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 03:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_jkhandicraft`
--

-- --------------------------------------------------------

--
-- Table structure for table `jk_category`
--

CREATE TABLE `jk_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk_category`
--

INSERT INTO `jk_category` (`id`, `name`, `slug`, `description`, `parent_id`, `image`, `banner_image`, `status`) VALUES
(1, 'Jewellery & Accessories', 'jewellery-accessories', '', 0, '/assets/images/category/jewellery-accessories2.jpeg', NULL, 1),
(2, 'Hats & Caps', 'hats-caps', '', 1, '/assets/images/category/hats-caps.jpeg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jk_products`
--

CREATE TABLE `jk_products` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `sku` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `short_description` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `price` float(14,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jk_product_images`
--

CREATE TABLE `jk_product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jk_sidebar`
--

CREATE TABLE `jk_sidebar` (
  `id` int(11) NOT NULL,
  `activate_menu` varchar(255) NOT NULL,
  `activate_not` varchar(255) NOT NULL,
  `base_url` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jk_users`
--

CREATE TABLE `jk_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `vp` varchar(50) NOT NULL,
  `role` varchar(20) NOT NULL,
  `salt` varchar(20) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `token` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL,
  `updated_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk_users`
--

INSERT INTO `jk_users` (`id`, `username`, `mobile`, `name`, `email`, `password`, `vp`, `role`, `salt`, `otp`, `token`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', '7894561230', 'Admin', 'admin@gmail.com', '$2y$10$f33OmrvidkhR2B4b8hdeeOUMbbASo0qsBeW4mtiwpkzneA21pp.Wi', '12345', 'admin', 'BvM0yRosbgfctUY6', '5e74a5b009e1b7c3f7c49c40bbba95fc', '', 1, '2020-01-07 17:05:51', '2021-10-20 06:05:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jk_category`
--
ALTER TABLE `jk_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jk_products`
--
ALTER TABLE `jk_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD UNIQUE KEY `sku` (`sku`);

--
-- Indexes for table `jk_product_images`
--
ALTER TABLE `jk_product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jk_sidebar`
--
ALTER TABLE `jk_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jk_users`
--
ALTER TABLE `jk_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jk_category`
--
ALTER TABLE `jk_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jk_products`
--
ALTER TABLE `jk_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jk_product_images`
--
ALTER TABLE `jk_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jk_sidebar`
--
ALTER TABLE `jk_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jk_users`
--
ALTER TABLE `jk_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
