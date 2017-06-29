-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2017 at 08:54 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new_standard_accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_invoice_items`
--

CREATE TABLE `service_invoice_items` (
  `service_item_id` bigint(25) NOT NULL,
  `service_invoice_id` bigint(25) DEFAULT '0',
  `service_id` int(11) DEFAULT '0',
  `service_unit` int(11) DEFAULT '0',
  `service_price` decimal(25,2) DEFAULT '0.00',
  `service_qty` int(11) DEFAULT '0',
  `service_line_total` decimal(25,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_invoice_items`
--
ALTER TABLE `service_invoice_items`
  ADD PRIMARY KEY (`service_item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_invoice_items`
--
ALTER TABLE `service_invoice_items`
  MODIFY `service_item_id` bigint(25) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
