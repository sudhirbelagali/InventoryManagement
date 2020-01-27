-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 22, 2020 at 06:33 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentId` int(11) NOT NULL,
  `departmentName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentId`, `departmentName`) VALUES
(1, 'Computer Science & Engineering'),
(3, 'Electronics & Communication Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productName`) VALUES
(1, 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `productDescription`
--

CREATE TABLE `productDescription` (
  `productid` int(11) NOT NULL,
  `productDescription` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productDescription`
--

INSERT INTO `productDescription` (`productid`, `productDescription`) VALUES
(1, 'Lenovo Intel Core 2 Duo 4GB DDR2 RAM 500GB HDD 10/100');

-- --------------------------------------------------------

--
-- Table structure for table `receivedProducts`
--

CREATE TABLE `receivedProducts` (
  `productid` int(11) NOT NULL,
  `productDescription` varchar(250) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `SupplierDetails` varchar(250) NOT NULL,
  `dateofreceipt` varchar(100) NOT NULL,
  `receiptnumber` varchar(100) NOT NULL,
  `referencenumber` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `receivedProducts`
--

INSERT INTO `receivedProducts` (`productid`, `productDescription`, `quantity`, `rate`, `cost`, `SupplierDetails`, `dateofreceipt`, `receiptnumber`, `referencenumber`, `type`, `remarks`) VALUES
(1, 'Lenovo Intel Core 2 Duo 4GB DDR2 RAM 500GB HDD 10/100', '12', '1234', '12341234', 'Fortuna Office Automation \r\n3rd Floor Ramdev Galli\r\nBelagavi - 5900001', '01/02/2020', '2', '2', 'Non Consumable', 'we have done payments'),
(1, 'Lenovo Intel Core 2 Duo 4GB DDR2 RAM 500GB HDD 10/100', '12', '1234', '12341234', 'Fortuna Office Automation \r\n3rd floor Ramdev Galli Belagavi - 5900001', '01/08/2020', '2', '3', 'Non Consumable', 'we have done payments');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transferId` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productDescription` varchar(300) NOT NULL,
  `department` varchar(300) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `remarks` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`transferId`, `productid`, `productDescription`, `department`, `quantity`, `dated`, `remarks`) VALUES
(1, 1, 'Lenovo Intel Core 2 Duo 4GB DDR2 RAM 500GB HDD 10/100', '1', '12', '01/22/2020', 'Transferred by Sudhir');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'sudhir', '2a8a71ea11949a7d0be56f23111df151', 'sudhirbelagalisdm@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transferId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
