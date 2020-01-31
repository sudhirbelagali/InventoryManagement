-- phpMyAdmin SQL Dump
-- version 4.9.1deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2020 at 03:14 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
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
(3, 'Electronics & Communication Engineering'),
(6, 'office'),
(14, 'Civil Engineering'),
(19, 'Library');

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
(2, 'Desktop Computer'),
(3, 'Electricity'),
(4, 'Mobile'),
(5, 'Furnitures'),
(7, 'Bags'),
(8, 'Chairs'),
(9, 'Cabinet PC');

-- --------------------------------------------------------

--
-- Table structure for table `productDescription`
--

CREATE TABLE `productDescription` (
  `descriptionid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productDescription` varchar(350) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productDescription`
--

INSERT INTO `productDescription` (`descriptionid`, `productid`, `productDescription`) VALUES
(1, 2, 'Intel Core I3 Processor, 6GB DDR3 RAM, 2.4GHz,  500GB HDD 10/100'),
(4, 5, '4 Metal Legs and Wooden top'),
(5, 9, '2GB RAM 500GB HDD 2.4GHz'),
(6, 7, 'Cotton bag with 4 compartments and laptop place as well ');

-- --------------------------------------------------------

--
-- Table structure for table `receivedProducts`
--

CREATE TABLE `receivedProducts` (
  `receiveId` int(11) NOT NULL,
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

INSERT INTO `receivedProducts` (`receiveId`, `productid`, `productDescription`, `quantity`, `rate`, `cost`, `SupplierDetails`, `dateofreceipt`, `receiptnumber`, `referencenumber`, `type`, `remarks`) VALUES
(2, 1, '1', '10', '12', '120', 'Fortuna Office Automation \r\n3rd Floor Ramdev Galli\r\nBelagavi - 590001', '01/22/2020', '1', '1', 'Non Consumable', 'Received by Sudhir for CSE department ');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `transferId` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `productDescription` varchar(300) NOT NULL,
  `department` int(255) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `dated` varchar(200) NOT NULL,
  `remarks` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`transferId`, `productid`, `productDescription`, `department`, `quantity`, `dated`, `remarks`) VALUES
(12, 2, '1', 3, '1', '01/16/2020', 'Transferred by Sudhir B'),
(13, 3, '2', 5, '2', '01/01/2020', 'old girls hostel'),
(14, 3, '2', 5, '2', '01/01/2020', 'old girls hostel'),
(16, 1, '2', 1, '3', '01/21/2020', 'by Sudhir'),
(17, 1, '2', 1, '3', '01/21/2020', 'by Sudhir'),
(18, 1, '1', 1, '2', '01/15/2020', 'by klecet'),
(19, 2, '1', 1, '2', '01/23/2020', 'this is from sudhir');

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
(1, 'sudhir', '2a8a71ea11949a7d0be56f23111df151', 'sudhirbelagalisdm@gmail.com'),
(2, 'mallappa', '2a82b4eed2ee1d31940ba4b4b350da01', 'mdgurav@gmail.com'),
(3, 'mahesh', 'af1bb808142a730431b5d5b649594719', 'hostels@klecet.edu.in');

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
-- Indexes for table `productDescription`
--
ALTER TABLE `productDescription`
  ADD PRIMARY KEY (`descriptionid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `receivedProducts`
--
ALTER TABLE `receivedProducts`
  ADD PRIMARY KEY (`receiveId`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`transferId`),
  ADD KEY `department` (`department`);

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
  MODIFY `departmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `productDescription`
--
ALTER TABLE `productDescription`
  MODIFY `descriptionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `receivedProducts`
--
ALTER TABLE `receivedProducts`
  MODIFY `receiveId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `transferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `productDescription`
--
ALTER TABLE `productDescription`
  ADD CONSTRAINT `productDescription_ibfk_1` FOREIGN KEY (`productid`) REFERENCES `product` (`productid`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
