-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2020 at 07:14 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cod`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `address_line1` varchar(100) DEFAULT NULL,
  `address_line2` varchar(100) DEFAULT NULL,
  `landmark` varchar(100) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `coutntry` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `user_id`, `address_line1`, `address_line2`, `landmark`, `pincode`, `city`, `coutntry`) VALUES
(1, 1, '4234dwfrgfwefer', 'dfefwe', 'ewfew', 21133, 'jhansi', 'INDIA'),
(2, 5, 'sfgrtjtyj', 'vdgreg', 'gwgerhtrh', 232353, 'jhansi', 'INDIA'),
(3, 6, '4234dwfrgfwefer', 'dfefwe', 'ewfew', 21133, 'jhansi', 'INDIA'),
(4, 10, 'sfgrtjtyj', 'vdgreg', 'gwgerhtrh', 232353, 'jhansi', 'INDIA');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(6) UNSIGNED NOT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `promo_applied` enum('applied','not applied') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `user_id`, `promo_applied`) VALUES
(1, 1, 'applied'),
(2, 2, 'not applied'),
(3, 1, 'applied'),
(4, 2, 'not applied'),
(5, 1, 'applied'),
(6, 2, 'not applied'),
(7, 1, 'applied'),
(8, 2, 'not applied'),
(9, 1, 'applied'),
(10, 2, 'not applied');

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(6) NOT NULL,
  `order_id` int(6) UNSIGNED DEFAULT NULL,
  `product_id` int(6) UNSIGNED DEFAULT NULL,
  `user_id` int(6) UNSIGNED DEFAULT NULL,
  `price` decimal(6,2) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `quantity` int(6) NOT NULL,
  `price` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `title`, `quantity`, `price`) VALUES
(1, 'cupcake', 2, '120.00'),
(2, 'lava cake', 6, '720.00'),
(3, 'rumcake', 6, '180.00'),
(4, 'oreo cake', 6, '520.00');

-- --------------------------------------------------------

--
-- Table structure for table `product_feature`
--

CREATE TABLE `product_feature` (
  `product_id` int(6) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_feature`
--

INSERT INTO `product_feature` (`product_id`, `title`, `description`) VALUES
(1, 'Delicious Cupcake', 'it is a cupcake made up of soft bread and with the toppings of tooty frooty.'),
(4, 'Oreo Cake', 'it is a cupcake made up of oreo it is made up of oreo biscuits.'),
(2, 'lava cake', 'it is a cupcake with a texture like that of volcano with erupting chocolate'),
(3, 'rum cake', 'it is cupcake made with rum and it has a taste of rum');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) UNSIGNED NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `contact_no` int(10) UNSIGNED NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `favourite_item` varchar(100) DEFAULT NULL,
  `order` int(6) UNSIGNED DEFAULT NULL,
  `mode_of_payment` enum('cash on delivery','net banking','debit card','credit car') DEFAULT NULL,
  `order_type` enum('takeaway','delivery') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `contact_no`, `address`, `gender`, `email`, `favourite_item`, `order`, `mode_of_payment`, `order_type`) VALUES
(1, 'divyanshu', 'shivhare', 83900654, 'behind central hotel sipri bazaar', 'male', 'divyanshu.shivhare32@gmail.com', 'noodles', 1, 'net banking', 'delivery'),
(2, 'varun', 'agarwal', 93232, 'farzi gali', 'male', 'varunagarwal166@gmail.com', 'pasta', 1, 'cash on delivery', 'takeaway'),
(3, 'kushagra', 'akhauri', 23697, 'sipri', NULL, 'kushagra@gmail.com', 'eggs', 2, 'debit card', 'delivery'),
(4, 'satyam', 'kumar', 6312182, 'sadar', 'female', 'satyam@gmail.com', 'pani-puri', 5, 'cash on delivery', 'takeaway'),
(5, 'ayush', 'dwivedi', 0, 'sehar', 'male', 'ayush@gmail.com', NULL, 2, 'debit card', 'delivery'),
(6, 'divyanshu', 'shivhare', 83900654, 'behind central hotel sipri bazaar', 'male', 'divyanshu.shivhare32@gmail.com', 'noodles', 1, 'net banking', 'delivery'),
(7, 'varun', 'agarwal', 93232, 'farzi gali', 'male', 'varunagarwal166@gmail.com', 'pasta', 1, 'cash on delivery', 'takeaway'),
(8, 'kushagra', 'akhauri', 23697, 'sipri', NULL, 'kushagra@gmail.com', 'eggs', 2, 'debit card', 'delivery'),
(9, 'satyam', 'kumar', 6312182, 'sadar', 'female', 'satyam@gmail.com', 'pani-puri', 5, 'cash on delivery', 'takeaway'),
(10, 'ayush', 'dwivedi', 0, 'sehar', 'male', 'ayush@gmail.com', NULL, 2, 'debit card', 'delivery');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `order_product_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `product_feature`
--
ALTER TABLE `product_feature`
  ADD CONSTRAINT `product_feature_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
