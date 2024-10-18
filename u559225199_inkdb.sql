-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2021 at 03:32 PM
-- Server version: 10.4.18-MariaDB-cll-lve
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
-- Database: `u559225199_inkdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `alert_name` varchar(250) DEFAULT NULL,
  `stock_count` int(11) DEFAULT NULL,
  `stock_name` varchar(250) DEFAULT NULL,
  `triggered_at` varchar(250) DEFAULT NULL,
  `triggered_date` date DEFAULT NULL,
  `first_price` double DEFAULT NULL,
  `latest_price` double DEFAULT NULL,
  `change_per_first` double DEFAULT NULL,
  `change_per_latest` double DEFAULT NULL,
  `stock_date` varchar(50) DEFAULT NULL,
  `time_diff` varchar(50) DEFAULT NULL,
  `high_time_diff` varchar(50) DEFAULT NULL,
  `etc2` varchar(250) DEFAULT NULL,
  `etc3` varchar(250) DEFAULT NULL,
  `etc4` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
