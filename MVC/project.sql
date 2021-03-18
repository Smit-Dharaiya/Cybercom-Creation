-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 18, 2021 at 03:06 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `status`, `createdDate`) VALUES
(4, 'Poojan Dharaiya', '1234', 1, '2021-03-18 12:52:32');

-- --------------------------------------------------------

--
-- Table structure for table `attribute`
--

CREATE TABLE `attribute` (
  `id` int(11) NOT NULL,
  `entityTypeId` enum('product','category') NOT NULL,
  `name` varchar(64) NOT NULL,
  `code` varchar(20) NOT NULL,
  `inputType` varchar(20) NOT NULL,
  `backendType` varchar(64) NOT NULL,
  `sortOrder` int(4) NOT NULL,
  `backendModel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attribute`
--

INSERT INTO `attribute` (`id`, `entityTypeId`, `name`, `code`, `inputType`, `backendType`, `sortOrder`, `backendModel`) VALUES
(4, 'category', 'Size', 'sz111', 'checkbox', 'varchar', 1, '0'),
(5, 'product', 'Colourrrr', 'clr11', 'text', 'varchar', 1, '0');

-- --------------------------------------------------------

--
-- Table structure for table `attributeoption`
--

CREATE TABLE `attributeoption` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `attributeId` int(11) NOT NULL,
  `sortOrder` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(100) NOT NULL,
  `categoryStatus` tinyint(4) NOT NULL,
  `description` varchar(500) NOT NULL,
  `parentId` int(11) DEFAULT NULL,
  `path` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryStatus`, `description`, `parentId`, `path`) VALUES
(76, 'Home', 0, '', 0, '76'),
(79, 'Bedroom', 0, 'asddd', 76, '76=79');

-- --------------------------------------------------------

--
-- Table structure for table `cmspage`
--

CREATE TABLE `cmspage` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `identifier` varchar(20) NOT NULL,
  `content` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmspage`
--

INSERT INTO `cmspage` (`id`, `title`, `identifier`, `content`, `status`, `createdDate`) VALUES
(2, '1234', 'tgezg', 'asdsf', 1, '2021-03-18 18:29:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contactNo` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `password` varchar(200) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `firstName`, `lastName`, `email`, `contactNo`, `status`, `password`, `createdDate`, `updatedDate`) VALUES
(19, 'smit P', 'dharaiya', 'smitd@gmail.com', '7872822234', 1, 'asd', '2021-03-14 00:16:52', '2021-03-17 20:01:03'),
(29, 'Poojan ', 'Dharaiya', 'poojan@gmail.com', '6789905', 1, 'asdf', '0000-00-00 00:00:00', '2021-03-18 19:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zipcode` varchar(20) NOT NULL,
  `country` varchar(20) NOT NULL,
  `addressType` varchar(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`id`, `address`, `city`, `state`, `zipcode`, `country`, `addressType`, `customerId`, `createdDate`, `updatedDate`) VALUES
(57, 'PUSHPAK', 'PADDHARI', 'Gujarat', '360110', 'India', 'billing', 19, '2021-03-17 20:06:22', '2021-03-17 20:06:22'),
(58, 'om', 'PADDHARI', 'Gujarat', '360110', 'India', 'shipping', 19, '2021-03-17 20:06:22', '2021-03-17 20:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `customergroup`
--

CREATE TABLE `customergroup` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customergroup`
--

INSERT INTO `customergroup` (`id`, `name`, `status`, `createdDate`) VALUES
(9, 'Wholesaler', 1, '2021-03-18 19:05:19'),
(10, 'Retailer', 0, '2021-03-18 18:48:59');

-- --------------------------------------------------------

--
-- Table structure for table `paymentmethod`
--

CREATE TABLE `paymentmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymentmethod`
--

INSERT INTO `paymentmethod` (`id`, `name`, `code`, `description`, `status`, `createdDate`) VALUES
(3, 'Online', '09', 'good', 0, '2021-03-18 18:30:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `SKU` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `SKU`, `name`, `price`, `discount`, `quantity`, `description`, `status`, `createdAt`, `updatedAt`) VALUES
(157, '15', 'Iphone 12 pro', '100k', '10%', 1, 'Black', 0, '2021-03-18 12:19:41', '2021-03-18 12:19:38'),
(165, '111', 'Watch 2', '4000', '10%', 1, 'Black', 1, '2021-03-18 14:06:10', '2021-03-18 14:06:06');

-- --------------------------------------------------------

--
-- Table structure for table `productmedia`
--

CREATE TABLE `productmedia` (
  `id` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `label` varchar(11) NOT NULL,
  `small` tinyint(4) NOT NULL,
  `thumb` tinyint(4) NOT NULL,
  `base` tinyint(4) NOT NULL,
  `gallery` tinyint(4) NOT NULL,
  `productId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productmedia`
--

INSERT INTO `productmedia` (`id`, `image`, `label`, `small`, `thumb`, `base`, `gallery`, `productId`) VALUES
(71, 'iphone.jpeg', '', 1, 1, 0, 0, 157),
(72, 'iphone2.jpeg', '', 0, 0, 0, 1, 157),
(73, 'iphone3.jpeg', '', 0, 0, 0, 1, 157),
(79, 'FeistelCipher.png', '', 0, 0, 0, 0, 154),
(81, 'RailFence.png', '', 0, 0, 0, 0, 154),
(96, 'RailFence.png', 'Image 1', 1, 0, 0, 0, 165);

-- --------------------------------------------------------

--
-- Table structure for table `product_group_price`
--

CREATE TABLE `product_group_price` (
  `entityId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `customerGroupId` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_group_price`
--

INSERT INTO `product_group_price` (`entityId`, `productId`, `customerGroupId`, `price`) VALUES
(62, 154, 9, '4.00'),
(63, 154, 10, '8.00');

-- --------------------------------------------------------

--
-- Table structure for table `shippingmethod`
--

CREATE TABLE `shippingmethod` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `code` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingmethod`
--

INSERT INTO `shippingmethod` (`id`, `name`, `code`, `amount`, `description`, `status`, `createdDate`) VALUES
(2, 'xyz', 8, 4, 'fast', 1, '2021-03-18 18:55:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute`
--
ALTER TABLE `attribute`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributeId` (`attributeId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cmspage`
--
ALTER TABLE `cmspage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerId` (`customerId`);

--
-- Indexes for table `customergroup`
--
ALTER TABLE `customergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productmedia`
--
ALTER TABLE `productmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_group_price`
--
ALTER TABLE `product_group_price`
  ADD PRIMARY KEY (`entityId`);

--
-- Indexes for table `shippingmethod`
--
ALTER TABLE `shippingmethod`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attribute`
--
ALTER TABLE `attribute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `attributeoption`
--
ALTER TABLE `attributeoption`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `cmspage`
--
ALTER TABLE `cmspage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customeraddress`
--
ALTER TABLE `customeraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `customergroup`
--
ALTER TABLE `customergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `paymentmethod`
--
ALTER TABLE `paymentmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `productmedia`
--
ALTER TABLE `productmedia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `product_group_price`
--
ALTER TABLE `product_group_price`
  MODIFY `entityId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `shippingmethod`
--
ALTER TABLE `shippingmethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributeoption`
--
ALTER TABLE `attributeoption`
  ADD CONSTRAINT `attributeoption_ibfk_1` FOREIGN KEY (`attributeId`) REFERENCES `attribute` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `customeraddress`
--
ALTER TABLE `customeraddress`
  ADD CONSTRAINT `customeraddress_ibfk_1` FOREIGN KEY (`customerId`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
