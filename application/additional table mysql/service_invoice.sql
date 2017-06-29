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
-- Table structure for table `service_invoice`
--

CREATE TABLE `service_invoice` (
  `service_invoice_id` bigint(20) NOT NULL,
  `service_invoice_no` varchar(75) DEFAULT NULL,
  `department_id` int(11) DEFAULT '0',
  `customer_id` int(11) DEFAULT '0',
  `salesperson_id` int(11) DEFAULT '0',
  `address` varchar(150) DEFAULT NULL,
  `total_amount` decimal(25,2) DEFAULT '0.00',
  `date_invoice` date DEFAULT '0000-00-00',
  `date_due` date DEFAULT '0000-00-00',
  `date_created` datetime DEFAULT '0000-00-00 00:00:00',
  `date_modified` datetime DEFAULT '0000-00-00 00:00:00',
  `date_deleted` datetime DEFAULT '0000-00-00 00:00:00',
  `posted_by_user` int(11) DEFAULT '0',
  `deleted_by_user` int(11) DEFAULT '0',
  `modified_by_user` int(11) DEFAULT '0',
  `is_active` bit(1) DEFAULT b'1',
  `is_deleted` bit(1) DEFAULT b'0',
  `remarks` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_invoice`
--
ALTER TABLE `service_invoice`
  ADD PRIMARY KEY (`service_invoice_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_invoice`
--
ALTER TABLE `service_invoice`
  MODIFY `service_invoice_id` bigint(20) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
