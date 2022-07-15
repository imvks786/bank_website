-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql106.byetcluster.com
-- Generation Time: May 29, 2022 at 07:17 AM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_30423704_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_data`
--

CREATE TABLE `acc_data` (
  `cust_id` int(20) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `gen` varchar(5) NOT NULL,
  `dob` date NOT NULL,
  `m_status` varchar(10) NOT NULL,
  `f_m_name` varchar(60) NOT NULL,
  `g_name` varchar(60) NOT NULL,
  `nation` varchar(60) NOT NULL,
  `rusr` varchar(60) NOT NULL,
  `pwd` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_data`
--

INSERT INTO `acc_data` (`cust_id`, `fname`, `gen`, `dob`, `m_status`, `f_m_name`, `g_name`, `nation`, `rusr`, `pwd`, `email`) VALUES
(1, 'HB STORE', 'M', '2021-12-08', 'YES', 'RAHUL', 'RAM', 'INDIAN', 'hbstore', 'hb@store', 'hbstore@imvks.com'),
(2, 'hbgame', 'M', '2021-12-07', 'NO', 'hbgame', 'hbgames', 'INDIAN', 'rahul', 'rahul', 'hbgame@imvks.com'),
(3, 'hgjhg', 'M', '7657-06-05', 'YES', 'tyu', 'yu', 'tyu', 'Vivek786', 'viveksingh', '56756@hh.m'),
(4, 'dfg', 'M', '2112-03-12', 'YES', 'dfg', 'dfg', 'dfg', 'admin', 'admin@786', 'fghfh@gdfg'),
(5, 'fghfg', 'O', '6545-04-05', 'YES', 'gh', 'h', 'h', 'hbmailghjhg', 'hbmail', 'hjh@fghfg'),
(6, 'gfjhfgjfg', 'M', '1222-11-11', 'YES', 'ggfdgf', 'fghgfh', 'bjhgj', 'jhjkhkjhkhkh', 'hkhkjhk', 'hkjhkh@dfgfdgfd'),
(7, 'ghgfh', 'M', '7657-05-06', 'YES', '6567ty', 'ghg', 'ggf', 'Vivek786', 'hbmail', 'fghg@fghgf'),
(8, 'fhfg', 'M', '2211-12-11', 'YES', 'fgh', 'g', 'g', '99vks', 'viveksingh', 'ghf@fgh'),
(9, 'hg', 'O', '5555-04-11', 'YES', 'hg', 'gj', 'ghj', '12fghgf', 'hfghfg', 'ghj@fghfh'),
(10, 'VIVEK', 'M', '2211-12-21', 'YES', '12DS', 'SD', 'DFFG', 'HBNNNN', 'ERTRYRTYT', 'FGF@GHGJ'),
(11, 'fghfgh', 'M', '1212-12-12', 'YES', 'fg', 'gf', 'gf', 'Vivek786@ghgh', 'viveksinghhgjhg', 'fdgf@hgj'),
(12, 'vivek singh', 'M', '2001-03-12', 'NO', 'VVVV', 'XXXX', 'INDIAN', 'VIVEK777', 'VKS777', 'INDIAN@IMVKS.COM'),
(13, 'AYUSH SINGH', 'M', '2007-03-29', 'NO', 'MR UDAY RAJ SINGH', 'MR RADHEY SHYAM SINGH', 'INDIAN ', 'AYUSH', 'AYUSH123456789', 'AYUSHSINGH201170@GMAIL.COM'),
(14, 'admin', 'M', '2021-12-16', 'YES', 'admin', 'admin', 'indian', 'admin', 'admin', 'admin@imvks.com'),
(15, 'viveksingh', 'M', '2021-12-03', 'YES', 'asdsa', 'asdas', 'asdsa', 'newadmin', 'newadmin', 'asda@imvks.com'),
(16, 'dfgfd', 'M', '5555-04-01', 'YES', 'dgfd', 'fdg', 'fgh', 'hbstorefghfgh', 'hb@storefghfg', 'fghfg@dfgdf'),
(17, 'admin', 'M', '2000-11-11', 'NO', 'admin', 'admin', 'indian', 'admin', 'admin', 'admin@imvks.com'),
(18, 'admin', 'M', '1928-01-01', 'YES', 'admin', 'admin', 'INDIAN', 'admin', 'admin', 'admin@admin');

-- --------------------------------------------------------

--
-- Table structure for table `acc_detail`
--

CREATE TABLE `acc_detail` (
  `cust_id` bigint(20) NOT NULL,
  `uid` varchar(100) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `pin` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `acc_no` bigint(30) NOT NULL,
  `total_bal` decimal(20,2) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_detail`
--

INSERT INTO `acc_detail` (`cust_id`, `uid`, `username`, `password`, `pin`, `name`, `acc_no`, `total_bal`, `time`) VALUES
(1, 'hbstore@UID', 'hbstore', 'hb@store', 1199, 'hb store', 8783792919, '27660.10', '2022-05-28 14:35:21'),
(2, '', 'viveksingh', 'imtheboss', 1234, 'Vivek Singh', 8900008643, '299848.26', '2022-01-21 13:06:15'),
(3, '', 'Vivek786', 'hbmail', 1111, 'ghgfh', 8900008646, '0.00', '2021-12-09 06:50:44'),
(4, 'admin@UID', 'admin', 'admin', 1234, 'admin', 8900008654, '1830.00', '2022-05-28 14:35:21'),
(5, '', 'hbmailghjhg', 'hbmail', 3371, 'fghfg', 8900008644, '0.00', '2021-12-09 06:24:48'),
(6, '', 'jhjkhkjhkhkh', 'hkhkjhk', 4067, 'gfjhfgjfg', 8900008645, '0.00', '2021-12-09 06:44:03'),
(8, '', '99vks', 'viveksingh', 8931, 'fhfg', 8900008647, '0.00', '2021-12-09 06:52:55'),
(9, '', '12fghgf', 'hfghfg', 3333, 'hg', 8900008648, '0.00', '2021-12-09 06:57:09'),
(10, '', 'HBNNNN', 'ERTRYRTYT', 7364, 'VIVEK', 8900008649, '0.00', '2021-12-09 07:00:58'),
(11, '', 'Vivek786@ghgh', 'viveksinghhgjhg', 55555, 'fghfgh', 8900008650, '0.00', '2021-12-09 07:07:35'),
(12, '', 'VIVEK777', 'VKS777', 7777, 'vivek singh', 8900008651, '0.00', '2021-12-09 07:19:09'),
(13, 'AYUSH@UID', 'AYUSH', 'AYUSH123456789', 1994, 'AYUSH SINGH', 8900008652, '1522.00', '2021-12-16 14:22:14'),
(16, NULL, 'hbstorefghfgh', 'hb@storefghfg', 1222, 'dfgfd', 8900008653, '0.00', '2021-12-16 14:33:19');

-- --------------------------------------------------------

--
-- Table structure for table `pass_book`
--

CREATE TABLE `pass_book` (
  `cust_id` bigint(20) NOT NULL,
  `amt_add` decimal(20,2) DEFAULT NULL,
  `amt_loss` decimal(20,2) DEFAULT NULL,
  `total` decimal(20,2) NOT NULL,
  `to_pay` varchar(30) DEFAULT NULL,
  `pfrom` varchar(30) DEFAULT NULL,
  `mode` varchar(30) NOT NULL,
  `trans_id` bigint(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pass_book`
--

INSERT INTO `pass_book` (`cust_id`, `amt_add`, `amt_loss`, `total`, `to_pay`, `pfrom`, `mode`, `trans_id`, `time`) VALUES
(123456, '340000.00', '0.00', '340000.00', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834359, '2021-05-01 06:22:28'),
(123456, NULL, '1.00', '340000.00', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834361, '2021-05-01 06:24:33'),
(123456, NULL, '1.00', '338330.18', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834363, '2021-05-01 06:28:57'),
(87172, '1.00', NULL, '200.00', NULL, '123456', 'ONLINE', 67767834364, '2021-05-01 06:28:57'),
(123456, NULL, '1699.80', '338330.18', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834365, '2021-05-01 06:35:43'),
(87172, '1.00', NULL, '200.00', NULL, '123456', 'ONLINE', 67767834366, '2021-05-01 06:34:24'),
(123456, NULL, '1.00', '338330.18', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834367, '2021-05-01 06:38:29'),
(87172, '1.00', NULL, '200.00', NULL, '123456', 'ONLINE', 67767834368, '2021-05-01 06:38:29'),
(123456, NULL, '1.00', '338329.18', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834369, '2021-05-01 06:41:07'),
(87172, '1.00', NULL, '200.00', NULL, '123456', 'ONLINE', 67767834370, '2021-05-01 06:41:07'),
(123456, NULL, '1.00', '338328.18', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834371, '2021-05-01 06:54:58'),
(87172, '1.00', NULL, '200.00', NULL, '123456', 'ONLINE', 67767834372, '2021-05-01 06:54:58'),
(123456, NULL, '1.00', '336658.36', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834373, '2021-05-01 06:58:13'),
(87172, '1.00', NULL, '1869.82', NULL, '123456', 'ONLINE', 67767834374, '2021-05-01 06:58:13'),
(123456, NULL, '1669.82', '334988.54', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834375, '2021-05-01 07:00:20'),
(87172, '1669.82', NULL, '3539.64', NULL, '123456', 'ONLINE', 67767834376, '2021-05-01 07:00:20'),
(123456, NULL, '541.00', '334447.54', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834377, '2021-05-05 16:13:31'),
(87172, '541.00', NULL, '4080.64', NULL, '123456', 'ONLINE', 67767834378, '2021-05-05 16:13:31'),
(123456, NULL, '541.00', '333906.54', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834379, '2021-07-23 05:47:37'),
(87172, '541.00', NULL, '4621.64', NULL, '123456', 'ONLINE', 67767834380, '2021-07-23 05:47:37'),
(87172, NULL, '120.00', '4501.64', 'Vivek Singh@123456', NULL, 'ONLINE', 67767834381, '2021-08-01 11:07:24'),
(123456, '120.00', NULL, '334026.54', NULL, 'hb store@87172', 'ONLINE', 67767834382, '2021-08-01 11:07:24'),
(123456, NULL, '13259.64', '320766.90', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834383, '2021-08-01 11:11:37'),
(87172, '13259.64', NULL, '17761.28', NULL, '123456', 'ONLINE', 67767834384, '2021-08-01 11:11:37'),
(123456, NULL, '541.00', '320225.90', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834385, '2021-08-11 05:58:53'),
(87172, '541.00', NULL, '18302.28', NULL, '123456', 'ONLINE', 67767834386, '2021-08-11 05:58:53'),
(123456, NULL, '541.00', '319684.90', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834387, '2021-08-26 07:19:42'),
(87172, '541.00', NULL, '18843.28', NULL, '123456', 'ONLINE', 67767834388, '2021-08-26 07:19:43'),
(123456, NULL, '1669.82', '318015.08', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834389, '2021-08-27 10:27:38'),
(87172, '1669.82', NULL, '20513.10', NULL, '123456', 'ONLINE', 67767834390, '2021-08-27 10:27:38'),
(123456, NULL, '15041.00', '302974.08', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834391, '2021-08-27 10:28:23'),
(87172, '15041.00', NULL, '35554.10', NULL, '123456', 'ONLINE', 67767834392, '2021-08-27 10:28:23'),
(123456, NULL, '541.00', '302433.08', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834393, '2021-11-29 13:02:03'),
(87172, '541.00', NULL, '36095.10', NULL, '123456', 'ONLINE', 67767834394, '2021-11-29 13:02:03'),
(87172, NULL, '1770.00', '34325.10', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834395, '2021-11-29 13:03:12'),
(87172, '1770.00', NULL, '36095.10', NULL, '87172', 'ONLINE', 67767834396, '2021-11-29 13:03:12'),
(87172, NULL, '6900.00', '29195.10', 'VIVEK@123456', NULL, 'ONLINE', 67767834397, '2021-11-29 13:05:30'),
(123456, '6900.00', NULL, '309333.08', NULL, 'hb store@87172', 'ONLINE', 67767834398, '2021-11-29 13:05:30'),
(87172, NULL, '195.00', '29000.10', 'VIVEK@123456', NULL, 'ONLINE', 67767834399, '2021-11-29 13:05:47'),
(123456, '195.00', NULL, '309528.08', NULL, 'hb store@87172', 'ONLINE', 67767834400, '2021-11-29 13:05:47'),
(123456, NULL, '3241.00', '306287.08', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834401, '2021-11-29 15:32:44'),
(87172, '3241.00', NULL, '32241.10', NULL, '123456', 'ONLINE', 67767834402, '2021-11-29 15:32:44'),
(123456, NULL, '541.00', '305746.08', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834403, '2021-11-30 06:14:16'),
(87172, '541.00', NULL, '32782.10', NULL, '123456', 'ONLINE', 67767834404, '2021-11-30 06:14:16'),
(1, NULL, '1000.00', '31782.10', 'AYUSH SINGH @13', NULL, 'ONLINE', 67767834405, '2021-12-12 05:52:16'),
(13, '1000.00', NULL, '1000.00', NULL, 'hb store@1', 'ONLINE', 67767834406, '2021-12-12 05:52:16'),
(1, NULL, '500.00', '31282.10', 'Ayush singh@13', NULL, 'ONLINE', 67767834407, '2021-12-12 05:52:46'),
(13, '500.00', NULL, '1500.00', NULL, 'hb store@1', 'ONLINE', 67767834408, '2021-12-12 05:52:46'),
(2, NULL, '3783.82', '301962.26', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834409, '2021-12-16 13:26:41'),
(13, NULL, '100.00', '1400.00', 'vivek@1', NULL, 'ONLINE', 67767834410, '2021-12-16 14:19:42'),
(1, '100.00', NULL, '31382.10', NULL, 'AYUSH SINGH@13', 'ONLINE', 67767834411, '2021-12-16 14:19:42'),
(1, NULL, '122.00', '31260.10', 'ayusg@13', NULL, 'ONLINE', 67767834412, '2021-12-16 14:22:14'),
(13, '122.00', NULL, '1522.00', NULL, 'hb store@1', 'ONLINE', 67767834413, '2021-12-16 14:22:14'),
(2, NULL, '2114.00', '299848.26', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834414, '2022-01-21 13:06:15'),
(1, NULL, '1700.00', '29560.10', 'Admin@4', NULL, 'ONLINE', 67767834415, '2022-05-27 13:12:20'),
(4, '1700.00', NULL, '1700.00', NULL, 'hb store@1', 'ONLINE', 67767834416, '2022-05-27 13:12:20'),
(1, NULL, '2000.00', '27560.10', 'Admin @4', NULL, 'ONLINE', 67767834417, '2022-05-27 13:13:15'),
(4, '2000.00', NULL, '3700.00', NULL, 'hb store@1', 'ONLINE', 67767834418, '2022-05-27 13:13:15'),
(4, NULL, '1770.00', '1930.00', 'HB-gaming@store.com', NULL, 'ONLINE', 67767834419, '2022-05-27 13:14:51'),
(87172, '1770.00', NULL, '0.00', NULL, '4', 'ONLINE', 67767834420, '2022-05-27 13:14:51'),
(4, NULL, '100.00', '1830.00', 'Vivek@1', NULL, 'ONLINE', 67767834421, '2022-05-28 14:35:21'),
(1, '100.00', NULL, '27660.10', NULL, 'admin@4', 'ONLINE', 67767834422, '2022-05-28 14:35:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_data`
--
ALTER TABLE `acc_data`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `acc_detail`
--
ALTER TABLE `acc_detail`
  ADD PRIMARY KEY (`cust_id`),
  ADD UNIQUE KEY `acc_no` (`acc_no`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `cust_id` (`cust_id`);

--
-- Indexes for table `pass_book`
--
ALTER TABLE `pass_book`
  ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_data`
--
ALTER TABLE `acc_data`
  MODIFY `cust_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `acc_detail`
--
ALTER TABLE `acc_detail`
  MODIFY `acc_no` bigint(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8900008656;

--
-- AUTO_INCREMENT for table `pass_book`
--
ALTER TABLE `pass_book`
  MODIFY `trans_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67767834423;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
