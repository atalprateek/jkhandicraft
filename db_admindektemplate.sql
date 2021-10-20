-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2021 at 05:39 AM
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
-- Database: `db_admindektemplate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tmp_sidebar`
--

CREATE TABLE `tmp_sidebar` (
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
-- Table structure for table `tmp_users`
--

CREATE TABLE `tmp_users` (
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
-- Dumping data for table `tmp_users`
--

INSERT INTO `tmp_users` (`id`, `username`, `mobile`, `name`, `email`, `password`, `vp`, `role`, `salt`, `otp`, `token`, `status`, `created_on`, `updated_on`) VALUES
(1, 'admin', '7894561230', 'Admin', 'admin@gmail.com', '$2y$10$.5LaAZ50fTL772xeRIoK8ODCgq/552T/3KrXInEA7zrLOLQEUWFh2', '12345', 'admin', 'SVEpKzf1Ovo2tMwx', '5e74a5b009e1b7c3f7c49c40bbba95fc', '', 1, '2020-01-07 17:05:51', '2021-10-20 05:28:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tmp_sidebar`
--
ALTER TABLE `tmp_sidebar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_users`
--
ALTER TABLE `tmp_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tmp_sidebar`
--
ALTER TABLE `tmp_sidebar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tmp_users`
--
ALTER TABLE `tmp_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
