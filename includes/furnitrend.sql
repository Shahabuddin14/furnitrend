-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2019 at 03:52 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnitrend`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2019-12-20 10:21:18', '21-12-2019 02:04:45 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(200) NOT NULL,
  `categoryImg` text NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryImg`, `creationDate`) VALUES
(1, 'Shop by Room', '80224037_600226650795112_1513761811885719552_n.png', '2019-12-24 14:26:48'),
(2, 'Rent', '80422397_507744369837676_5491829764903665664_n.jpg', '2019-12-24 14:31:04'),
(3, 'interior ', '80604632_2818581448163930_6714331208584527872_n.jpg', '2019-12-24 14:40:21');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(7, 2, '1', 1, '2019-12-21 08:39:58', 'COD', 'Delivered'),
(8, 2, '1', 1, '2019-12-21 08:44:26', 'Internet Banking', 'in Process'),
(9, 1, '4', 1, '2019-12-22 11:24:09', 'COD', 'Delivered'),
(10, 1, '5', 1, '2019-12-22 11:24:09', 'COD', 'Delivered'),
(11, 1, '12', 1, '2019-12-22 11:24:09', 'COD', 'Delivered'),
(12, 1, '2', 1, '2019-12-22 11:38:34', 'bKash', 'in Process'),
(13, 1, '2', 2, '2019-12-22 12:07:27', 'bKash', 'Delivered'),
(14, 1, '8', 1, '2019-12-23 07:19:58', 'bKash', 'Delivered');

-- --------------------------------------------------------

--
-- Table structure for table `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(4, 7, 'Delivered', 'Yes', '2019-12-21 08:42:09'),
(5, 8, 'in Process', 'Process', '2019-12-21 09:07:25'),
(6, 9, 'Delivered', 'Yes', '2019-12-22 11:26:34'),
(7, 11, 'Delivered', 'Yes', '2019-12-22 11:28:52'),
(8, 13, 'Delivered', 'yhu', '2019-12-22 12:08:36'),
(9, 10, 'Delivered', 'delivered ', '2019-12-23 07:20:38'),
(10, 14, 'Delivered', 'D', '2019-12-23 09:45:46'),
(11, 12, 'in Process', 'P', '2019-12-23 09:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`) VALUES
(1, 1, 1, 'Bed', 'Brad', 53000, 54000, 'jhgfsfghfhjgjkghfgghghfgfghfgdghhhjghhh<br>', 'b (2).png', 'b (2).png', 'b (2).png', 50, 'In Stock', '2019-12-21 06:29:36', NULL),
(2, 1, 1, 'Bed new', 'New', 53000, 55000, '                                            sdfghjkjhgfdasdfhgjhkjlkjhgfdweghyhbfvdczxfghgfc', 'b (8).png', 'b (8).png', 'b (8).png', 1200, 'In Stock', '2019-12-22 10:09:57', NULL),
(3, 1, 1, 'Bed3', 'New', 53000, 55000, '                                            hgfdsfdghjkljhgffdscfghjk', 'b (3).png', 'b (3).png', 'b (3).png', 1200, 'In Stock', '2019-12-22 10:11:09', NULL),
(4, 1, 1, 'Bed 4', 'New', 53000, 55000, '                                            hgfsfdghjklxfdgfxb', 'b (5).png', 'b (5).png', 'b (5).png', 1200, 'In Stock', '2019-12-22 10:12:58', NULL),
(5, 3, 9, 'Office Chair', 'New', 2300, 2500, 'sfdgfhgjkjlkjjhfgdfdsa<br>                                            ', 'c (7).png', 'c (7).png', 'c (7).png', 60, 'In Stock', '2019-12-22 10:14:36', NULL),
(7, 1, 2, 'Tea table', 'New', 2300, 2500, '                                            kjhgfdslkjhgfdsjhgfd', 'T (11).png', 'T (11).png', 'T (11).png', 50, 'In Stock', '2019-12-22 10:21:07', NULL),
(8, 1, 3, 'Dinning Table', 'New', 53000, 55000, '                                            kjhgfdsfgh', 'T (3).png', 'T (3).png', 'T (3).png', 1200, 'In Stock', '2019-12-22 10:23:22', NULL),
(9, 1, 3, 'Dinning Table 2', 'New', 53000, 55000, '                                            asdfghjklkjhgfds', 'T (6).png', 'T (6).png', 'T (6).png', 1200, 'In Stock', '2019-12-22 10:26:55', NULL),
(10, 2, 4, 'Office Table', 'New', 2300, 2500, '                                            kjhgfdsasdfghjk', 'kisspng-video-game-consoles-table-desk-network-operations-5b014aa1bf7311.6070543215268112977842.png', 'kisspng-video-game-consoles-table-desk-network-operations-5b014aa1bf7311.6070543215268112977842.png', 'kisspng-video-game-consoles-table-desk-network-operations-5b014aa1bf7311.6070543215268112977842.png', 1200, 'In Stock', '2019-12-22 10:29:46', NULL),
(11, 2, 4, 'Office Chair', 'New', 2300, 2500, '                                            kjhgfds', 'chairs_3.png', 'chairs_3.png', 'chairs_3.png', 1200, 'In Stock', '2019-12-22 10:30:46', NULL),
(12, 2, 5, 'Double bed', 'Brad', 5000, 5400, '                                            asdfghjkl', 'b (9).png', 'b (8).png', 'b (9).png', 1200, 'In Stock', '2019-12-22 10:32:54', NULL),
(13, 3, 8, 'Office Table', 'Brad', 53000, 55000, '                                            asdfghjkl', 'kisspng-conference-centre-office-interior-design-services-5b7774da985740.823261561534555354624.png', 'kisspng-conference-centre-office-interior-design-services-5b7774da985740.823261561534555354624.png', 'kisspng-conference-centre-office-interior-design-services-5b7774da985740.823261561534555354624.png', 1200, 'Out of Stock', '2019-12-22 10:35:05', NULL),
(14, 2, 5, 'Sofa', 'Brad', 2300, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (1).png', 's (1).png', 's (1).png', 1200, 'In Stock', '2019-12-24 09:28:35', NULL),
(16, 2, 4, 'Chair', 'New', 2300, 5400, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (12).png', 'c (12).png', 'c (12).png', 1200, 'In Stock', '2019-12-24 09:31:57', NULL),
(17, 2, 4, 'Chair', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (13).png', 'c (13).png', 'c (13).png', 50, 'Out of Stock', '2019-12-24 09:32:26', NULL),
(18, 2, 5, 'Bed', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'b (1).png', 'b (1).png', 'b (1).png', 50, 'In Stock', '2019-12-24 09:48:15', NULL),
(19, 2, 5, 'Bed', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'b (6).png', 'b (6).png', 'b (6).png', 50, 'In Stock', '2019-12-24 09:48:52', NULL),
(20, 2, 5, 'Bed', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'b (7).png', 'b (7).png', 'b (7).png', 50, 'In Stock', '2019-12-24 09:49:28', NULL),
(21, 2, 5, 'Bed', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'b (10).png', 'b (10).png', 'b (10).png', 50, 'In Stock', '2019-12-24 09:50:07', NULL),
(22, 1, 1, 'Bed', 'New', 53000, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'b (4).png', 'b (4).png', 'b (4).png', 1200, 'In Stock', '2019-12-24 09:51:11', NULL),
(23, 2, 5, 'Sofa', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (2).png', 's (2).png', 's (2).png', 50, 'In Stock', '2019-12-24 10:24:22', NULL),
(24, 2, 4, 'Sofa', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (3).png', 's (3).png', 's (3).png', 60, 'In Stock', '2019-12-24 10:25:15', NULL),
(25, 2, 4, 'Sofa', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (4).png', 's (4).png', 's (4).png', 50, 'In Stock', '2019-12-24 10:25:56', NULL),
(26, 3, 6, 'Sofa', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (6).png', 's (6).png', 's (6).png', 50, 'In Stock', '2019-12-24 10:29:01', NULL),
(27, 3, 8, 'Sofa', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (7).png', 's (7).png', 's (7).png', 50, 'In Stock', '2019-12-24 10:29:26', NULL),
(28, 3, 9, 'Sofa', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (8).png', 's (8).png', 's (8).png', 50, 'In Stock', '2019-12-24 10:30:06', NULL),
(29, 1, 2, 'Sofa', 'Brad', 53000, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (9).png', 's (9).png', 's (9).png', 1200, 'In Stock', '2019-12-24 10:44:56', NULL),
(30, 1, 1, 'Sofa', 'New', 53000, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 's (10).png', 's (10).png', 's (10).png', 1200, 'In Stock', '2019-12-24 10:45:26', NULL),
(31, 1, 1, 'Chair', 'Brad', 2500, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (3).png', 'c (3).png', 'c (3).png', 60, 'In Stock', '2019-12-24 10:48:59', NULL),
(32, 1, 1, 'Chair', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (5).png', 'c (5).png', 'c (5).png', 1200, 'In Stock', '2019-12-24 10:49:27', NULL),
(33, 1, 2, 'Chair', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (15).png', 'c (15).png', 'c (15).png', 1200, 'In Stock', '2019-12-24 10:50:04', NULL),
(34, 1, 3, 'Chair', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (6).png', 'c (6).png', 'c (6).png', 1200, 'In Stock', '2019-12-24 10:51:04', NULL),
(35, 1, 3, 'Chair', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (8).png', 'c (8).png', 'c (8).png', 120, 'In Stock', '2019-12-24 10:51:52', NULL),
(36, 3, 6, 'Chair', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'c (17).png', 'c (17).png', 'c (17).png', 50, 'In Stock', '2019-12-24 10:53:04', NULL),
(37, 1, 2, 'Table', 'Brad', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'T (4).png', 'T (4).png', 'T (4).png', 50, 'In Stock', '2019-12-24 10:54:56', NULL),
(38, 1, 2, 'Table', 'New', 53000, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'T (8).png', 'T (8).png', 'T (8).png', 1200, 'In Stock', '2019-12-24 10:55:26', NULL),
(39, 3, 8, 'Table', 'New', 2300, 2500, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'T (1).png', 'T (1).png', 'T (1).png', 1200, 'In Stock', '2019-12-24 10:55:52', NULL),
(40, 3, 8, 'Table', 'New', 53000, 55000, '                                            It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a', 'T (9).png', 'T (9).png', 'T (9).png', 1200, 'In Stock', '2019-12-24 10:56:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) NOT NULL,
  `subcategory` varchar(200) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`) VALUES
(1, 1, 'Bed Room', '2019-12-17 09:30:16'),
(2, 1, 'Living Room', '2019-12-17 09:30:16'),
(3, 1, 'Dinning Room', '2019-12-17 09:30:51'),
(4, 2, 'Rent For Office', '2019-12-17 09:30:51'),
(5, 2, 'Rent For Home', '2019-12-17 09:31:30'),
(6, 3, 'Home', '2019-12-17 09:31:30'),
(8, 3, 'Commercial Space', '2019-12-17 09:31:59'),
(9, 3, 'Office', '2019-12-21 06:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory2`
--

CREATE TABLE `subcategory2` (
  `id` int(11) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory2`
--

INSERT INTO `subcategory2` (`id`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 'Black', '2019-12-18 08:53:30', NULL),
(2, 'Spacegrey', '2019-12-18 08:53:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory3`
--

CREATE TABLE `subcategory3` (
  `id` int(11) NOT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory3`
--

INSERT INTO `subcategory3` (`id`, `subcategory`, `creationDate`, `updationDate`) VALUES
(1, 'Wood', '2019-12-18 09:10:57', NULL),
(2, 'Metal', '2019-12-18 09:10:57', NULL),
(3, 'Mixed', '2019-12-18 09:11:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'Mohammad Shahabuddin', 'shahabuddin650@gmail.com', 1680850224, 'e10adc3949ba59abbe56e057f20f883e', '11/15 Mirbagh, Dhaka', 'Dhaka', 'Dhaka', 1217, '11/15 Mirbagh, Dhaka', 'Dhaka', 'Dhaka', 1217, '2019-12-16 09:33:14', NULL),
(2, 'Md. Shovon Sarkar', 'smshovon1995@gmail.com', 152156919, '1a3d76eac9de6b3d72c1fe8a03237fc1', 'GA/126, Gulshan, Badda, Dhaka', 'Gulshan', 'Dhaka', 1217, 'GA/126, Gulahan, Badda, Dhaka', 'Gulshan', 'Dhaka', 1217, '2019-12-18 07:34:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(6, 2, 8, '2019-12-18 07:39:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`,`categoryName`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`,`subcategory`);

--
-- Indexes for table `subcategory2`
--
ALTER TABLE `subcategory2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory3`
--
ALTER TABLE `subcategory3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subcategory2`
--
ALTER TABLE `subcategory2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory3`
--
ALTER TABLE `subcategory3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
