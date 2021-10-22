-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2021 at 05:35 PM
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
  `headings` text NOT NULL,
  `image` text NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jk_category`
--

INSERT INTO `jk_category` (`id`, `name`, `slug`, `description`, `parent_id`, `headings`, `image`, `banner_image`, `status`) VALUES
(1, 'Jewellery & Accessories', 'jewellery-accessories', '', 0, '{\"accessories\":\"Accessories\",\"bags-purses\":\"Bags & Purses\",\"necklaces\":\"Necklaces\",\"rings\":\"Rings\"}', '/assets/images/category/jewellery-accessories2.jpeg', NULL, 1),
(2, 'Hats & Caps', 'hats-caps', '', 1, 'accessories', '/assets/images/category/hats-caps.jpeg', NULL, 1),
(3, 'Clothing & Shoes', 'clothing-shoes', '', 0, '', '/assets/images/category/clothing-shoes.jpeg', NULL, 1),
(4, 'Backpacks', 'backpacks', '', 1, 'bags-purses', '/assets/images/category/backpacks.jpeg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jk_enquiry`
--

CREATE TABLE `jk_enquiry` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `query` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jk_enquiry`
--

INSERT INTO `jk_enquiry` (`id`, `product_id`, `name`, `mobile`, `email`, `query`, `status`, `added_on`) VALUES
(1, 1, 'Atal Prateek Barla', '7739576693', 'prateek.atal@gmail.com', 'sdf', 0, '2021-10-21 14:00:03');

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

--
-- Dumping data for table `jk_products`
--

INSERT INTO `jk_products` (`id`, `category`, `sku`, `name`, `slug`, `unit_id`, `short_description`, `description`, `price`, `discount`, `status`) VALUES
(1, '2', NULL, 'Product 1', 'product-1', 0, 'Acc', 'eCommerce\nLive Search Bar for an eCommerce Website like Amazon\nMay 11th, 2021\neCommerce live search example PHP code with steps to implement for an eCommerce website. Lightweight custom PHP without using any plugin or\nSingle Product eCommerce Website with Email Checkout in PHP\nApril 27th, 2021\nA basic and clear example for creating an eCommerce website for selling one and only product online and allow checkout order via customer em\nBootstrap eCommerce Recently Viewed Products List Carousel\nMarch 10th, 2021\nBootstrap enabled eCommerce carousel that is dynamically loaded with recently viewed product items from the database.\nBootstrap eCommerce Product Category Subcategory Page with Filter and Navigation\nFebruary 22nd, 2021\nEasy eCommerce website category subcategory setup with search and navigation using jQuery AJAX and Bootstrap UI template.\nGenerate eCommerce Purchase Invoice PDF using PHP Script\nJanuary 24th, 2021\nCode to generate eCommerce purchase order invoice as a PDF document using PHP script.\nBetter Customer Engagement with eCommerce wishlist implementation for shopping cart\nJanuary 3rd, 2021\nA lightweight eCommerce shopping cart wishlist PHP script for free download and implementation.\nStripe One Time Payment with Prebuilt Hosted Checkout in PHP\nOctober 1st, 2020\nEasy integration guide to set up a Stripe payment via hosted checkout with simple example code.\nShipping API Integration in PHP with Australia Post Example\nJanuary 22nd, 2020\nCode for Australia Post shipping API integration in PHP to calculate shipping rates on domestic shipping. It gives good template to build an\nOne Page Checkout Script Free with Example Template in PHP\nDecember 13th, 2019\nA simple solution with example for creating one page checkout script in PHP will reduce the number of steps along with the checkout process.\nHow to Integrate 2Checkout Payment Gateway using PHP\nNovember 27th, 2019\nA simple, step by step implementation guide for integrating 2Checkout payment gateway in PHP using payment API library.', 10000.00, 0, 0),
(2, '2', NULL, 'Product 2', 'product-2', 0, 'asfsdasdfsd', 'sdafasdfas', 3000.00, 0, 0);

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

--
-- Dumping data for table `jk_product_images`
--

INSERT INTO `jk_product_images` (`id`, `product_id`, `type`, `image`, `status`) VALUES
(1, 1, 'thumb', '/assets/images/product/product-1.jpeg', 1),
(2, 1, '', '/assets/images/product/product-11.jpeg', 1),
(3, 2, 'thumb', '/assets/images/product/product-2.png', 1);

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
-- Indexes for table `jk_enquiry`
--
ALTER TABLE `jk_enquiry`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jk_enquiry`
--
ALTER TABLE `jk_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jk_products`
--
ALTER TABLE `jk_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jk_product_images`
--
ALTER TABLE `jk_product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
