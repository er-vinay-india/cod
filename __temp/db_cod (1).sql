-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2020 at 02:54 PM
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
-- Database: `db_cod`
--

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `guid` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`guid`, `keyword`, `value`, `timestamp`) VALUES
(1597932638, 'price', '2400', '2020-08-20 19:40:38'),
(1597932638, 'quantity', '25', '2020-08-20 19:40:38'),
(1597932638, 'title', 'Air Assult', '2020-08-20 19:40:38'),
(1597932821, 'price', '24000', '2020-08-20 19:43:41'),
(1597932821, 'quantity', '55', '2020-08-20 19:43:42'),
(1597932821, 'title', 'Call of Duty', '2020-08-20 19:43:41'),
(1597937088, 'address', 'Behind Central Hotel, Sipri Bazar Jhansi', '2020-08-20 20:54:49'),
(1597937088, 'contact_no', '8390065404', '2020-08-20 20:54:48'),
(1597937088, 'email', 'divyanshu.shivhare32@gmail.com', '2020-08-20 20:54:49'),
(1597937088, 'favourite_item', '', '2020-08-20 20:54:49'),
(1597937088, 'first_name', 'Divyanshu', '2020-08-20 20:54:48'),
(1597937088, 'gender', 'Male', '2020-08-20 20:54:49'),
(1597937088, 'last_name', 'Shivhare', '2020-08-20 20:54:48'),
(1597937088, 'no_of_order', '0', '2020-08-20 20:54:49'),
(1597937156, 'address', 'Behind Central Hotel, Sipri Bazar Jhansi', '2020-08-20 20:55:56'),
(1597937156, 'contact_no', '9039802180', '2020-08-20 20:55:56'),
(1597937156, 'email', 'darpan9935@gmail.com', '2020-08-20 20:55:56'),
(1597937156, 'favourite_item', '', '2020-08-20 20:55:56'),
(1597937156, 'first_name', 'Darpan', '2020-08-20 20:55:56'),
(1597937156, 'gender', 'Male', '2020-08-20 20:55:56'),
(1597937156, 'last_name', 'Shivhare', '2020-08-20 20:55:56'),
(1597937156, 'no_of_order', '0', '2020-08-20 20:55:56'),
(1597937492, 'address', 'B-355, Deen Dayal Nagar', '2020-08-20 21:01:33'),
(1597937492, 'contact_no', '8800637951', '2020-08-20 21:01:33'),
(1597937492, 'email', 'er.vinay.india@gmail.com', '2020-08-20 21:01:33'),
(1597937492, 'favourite_item', '', '2020-08-20 21:01:33'),
(1597937492, 'first_name', 'Vinay', '2020-08-20 21:01:32'),
(1597937492, 'gender', 'Male', '2020-08-20 21:01:33'),
(1597937492, 'last_name', 'Shamra', '2020-08-20 21:01:33'),
(1597937492, 'no_of_order', '0', '2020-08-20 21:01:33'),
(1597937669, 'address', 'B-355, Deen Dayal Nagar', '2020-08-20 21:04:29'),
(1597937669, 'contact_no', '8800637951', '2020-08-20 21:04:29'),
(1597937669, 'email', 'prtkgupta07@gmail.com', '2020-08-20 21:04:29'),
(1597937669, 'favourite_item', '', '2020-08-20 21:04:29'),
(1597937669, 'first_name', 'Prateek', '2020-08-20 21:04:29'),
(1597937669, 'gender', 'Male', '2020-08-20 21:04:29'),
(1597937669, 'last_name', 'Gupta', '2020-08-20 21:04:29'),
(1597937669, 'no_of_order', '0', '2020-08-20 21:04:29'),
(1597937688, 'address', 'B-355, Deen Dayal Nagar', '2020-08-20 21:04:48'),
(1597937688, 'contact_no', '8800637951', '2020-08-20 21:04:48'),
(1597937688, 'email', 'prtkgupta07@gmail.com', '2020-08-20 21:04:48'),
(1597937688, 'favourite_item', '', '2020-08-20 21:04:48'),
(1597937688, 'first_name', 'Pradeep', '2020-08-20 21:04:48'),
(1597937688, 'gender', 'Male', '2020-08-20 21:04:48'),
(1597937688, 'last_name', 'Gupta', '2020-08-20 21:04:48'),
(1597937688, 'no_of_order', '0', '2020-08-20 21:04:48'),
(1598170375, 'address', 'B-355, Deen Dayal Nagar', '2020-08-23 13:42:55'),
(1598170375, 'contact_no', '8800637951', '2020-08-23 13:42:55'),
(1598170375, 'email', 'prtkgupta07@gmail.com', '2020-08-23 13:42:55'),
(1598170375, 'favourite_item', '', '2020-08-23 13:42:55'),
(1598170375, 'first_name', 'Pradeep', '2020-08-23 13:42:55'),
(1598170375, 'gender', 'Male', '2020-08-23 13:42:55'),
(1598170375, 'last_name', 'Gupta', '2020-08-23 13:42:55'),
(1598170375, 'no_of_order', '0', '2020-08-23 13:42:55'),
(1598179647, 'address', 'B-355, Deen Dayal Nagar', '2020-08-23 16:17:28'),
(1598179647, 'contact_no', '8800637951', '2020-08-23 16:17:28'),
(1598179647, 'email', 'prtkgupta07@gmail.com', '2020-08-23 16:17:28'),
(1598179647, 'favourite_item', '', '2020-08-23 16:17:28'),
(1598179647, 'first_name', 'Pradeep', '2020-08-23 16:17:28'),
(1598179647, 'gender', 'Male', '2020-08-23 16:17:28'),
(1598179647, 'last_name', 'Gupta', '2020-08-23 16:17:28'),
(1598179647, 'no_of_order', '0', '2020-08-23 16:17:28'),
(1598179902, 'description', 'this a tasty donut', '2020-08-23 16:21:42'),
(1598179902, 'title', 'donuts chocolaty', '2020-08-23 16:21:42'),
(1598363786, 'first_name', 'devu', '2020-08-25 19:26:26'),
(1598363786, 'last_name', 'shivhare', '2020-08-25 19:26:26'),
(1598363786, 'password', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-25 19:26:26'),
(1598364121, 'first_name', 'devu', '2020-08-25 19:32:02'),
(1598364121, 'last_name', 'shivhare', '2020-08-25 19:32:02'),
(1598364121, 'password', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-25 19:32:02'),
(1598366549, 'first_name', 'devu', '2020-08-25 20:12:29'),
(1598366549, 'last_name', 'shivhare', '2020-08-25 20:12:29'),
(1598366549, 'password', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-25 20:12:29'),
(1598366780, 'first_name', 'devu', '2020-08-25 20:16:20'),
(1598366780, 'last_name', 'shivhare', '2020-08-25 20:16:20'),
(1598366780, 'password', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-25 20:16:20'),
(1598366978, 'email', 'divyanshu@gmail.com', '2020-08-25 20:19:38'),
(1598366978, 'first_name', 'devu', '2020-08-25 20:19:38'),
(1598366978, 'last_name', 'shivhare', '2020-08-25 20:19:38'),
(1598366978, 'password', '827ccb0eea8a706c4c34a16891f84e7b', '2020-08-25 20:19:38'),
(1598454486, 'email', 'dd@gmail.com', '2020-08-26 20:38:07'),
(1598454486, 'first_name', 'vinay', '2020-08-26 20:38:07'),
(1598454486, 'last_name', 'sharma', '2020-08-26 20:38:07'),
(1598454486, 'password', '6489bcec78211a40fb262f32c4bca7de', '2020-08-26 20:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `entities_index`
--

CREATE TABLE `entities_index` (
  `keyword` varchar(255) NOT NULL,
  `guid` bigint(20) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entities_index`
--

INSERT INTO `entities_index` (`keyword`, `guid`, `timestamp`) VALUES
('product', 1597932638, '2020-08-20 14:10:38'),
('product', 1597932821, '2020-08-20 14:13:42'),
('productfeature', 1598179902, '2020-08-23 10:51:42'),
('user', 1597937088, '2020-08-20 15:24:49'),
('user', 1597937156, '2020-08-20 15:25:57'),
('user', 1597937492, '2020-08-20 15:31:33'),
('user', 1597937669, '2020-08-20 15:34:29'),
('user', 1597937688, '2020-08-20 15:34:48'),
('user', 1598170375, '2020-08-23 08:12:56'),
('user', 1598179647, '2020-08-23 10:47:28'),
('user', 1598363786, '2020-08-25 13:56:27'),
('user', 1598364121, '2020-08-25 14:02:02'),
('user', 1598366549, '2020-08-25 14:42:30'),
('user', 1598366780, '2020-08-25 14:46:20'),
('user', 1598366978, '2020-08-25 14:49:38'),
('user', 1598454486, '2020-08-26 15:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `entities_metadata`
--

CREATE TABLE `entities_metadata` (
  `guid` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `timestamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`guid`,`keyword`);

--
-- Indexes for table `entities_index`
--
ALTER TABLE `entities_index`
  ADD PRIMARY KEY (`keyword`,`guid`);

--
-- Indexes for table `entities_metadata`
--
ALTER TABLE `entities_metadata`
  ADD PRIMARY KEY (`guid`,`keyword`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
