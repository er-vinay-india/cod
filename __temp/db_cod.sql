-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 05:00 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(1598179902, 'description', 'this a tasty donut', '2020-08-23 16:21:42'),
(1598179902, 'title', 'donuts chocolaty', '2020-08-23 16:21:42'),
(1598711828, 'email', 'vinay@gmail.com', '2020-08-29 20:07:08'),
(1598711828, 'name', 'Vinay Sharma', '2020-08-29 20:07:08'),
(1598711828, 'password', '6964dfe78b270e8123d9592a958e6e76', '2020-08-29 20:07:08'),
(1599045118, 'email', 'er.vinay.india@gmail.com', '2020-09-02 16:41:58'),
(1599045118, 'is_admin', 'true', '2020-09-02 16:41:58'),
(1599045118, 'name', 'vinay', '2020-09-02 16:41:58'),
(1599045118, 'password', '6964dfe78b270e8123d9592a958e6e76', '2020-09-02 16:41:58');

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
('user', 1598711828, '2020-08-29 14:37:08'),
('user', 1599045118, '2020-09-02 11:11:58');

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

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `guid` bigint(20) UNSIGNED NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `token_index`
--

CREATE TABLE `token_index` (
  `keyword` varchar(255) NOT NULL,
  `guid` bigint(20) UNSIGNED NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`guid`,`keyword`);

--
-- Indexes for table `token_index`
--
ALTER TABLE `token_index`
  ADD PRIMARY KEY (`keyword`,`guid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
