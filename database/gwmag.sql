-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2017 at 10:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gwmag`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'ashik', 'ashik');

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `bill_date` date NOT NULL,
  `pay_mode` varchar(256) NOT NULL,
  `bill_counter` int(11) NOT NULL,
  `sub_start_date` varchar(255) NOT NULL,
  `sub_exp_date` varchar(255) NOT NULL,
  `add1` varchar(256) NOT NULL,
  `add2` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pincode` varchar(256) NOT NULL,
  `life` int(11) NOT NULL,
  `tosent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`id`, `u_id`, `bill_date`, `pay_mode`, `bill_counter`, `sub_start_date`, `sub_exp_date`, `add1`, `add2`, `city`, `country`, `pincode`, `life`, `tosent`) VALUES
(11, 1, '2017-06-19', 'pay_u', 0, '06-17', '06-18', 'q', 'q', 'q', 'q', '123456', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `id` int(11) NOT NULL,
  `u_id` varchar(256) NOT NULL,
  `pass` varchar(256) NOT NULL,
  `u_type` varchar(1) NOT NULL DEFAULT 'u',
  `f_name` varchar(256) NOT NULL,
  `l_name` varchar(256) NOT NULL,
  `school` varchar(256) NOT NULL,
  `class` varchar(256) NOT NULL,
  `phone` bigint(1) NOT NULL,
  `email` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`id`, `u_id`, `pass`, `u_type`, `f_name`, `l_name`, `school`, `class`, `phone`, `email`) VALUES
(1, 'platho', 'platho', 'u', 'albin', 'pla', 'kot', '12', 8281074873, 'p@l.a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
