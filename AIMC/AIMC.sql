-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 26, 2020 at 03:14 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AIMC`
--

-- --------------------------------------------------------
--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProduceYear` date NOT NULL,
  `price` int(11) NOT NULL,
  `thedepth` int(10) NOT NULL,
  `thespeed` int(10) DEFAULT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`id`, `Name`, `Description`, `ProduceYear`, `price`, `thedepth`, `thespeed`, `image`) VALUES
(1, 'Potato Harvester', 'Available machine , Quality control : A', '2011-08-11', 45000, 24, 20, 'Potato Harvester.jpg'),
(2, 'Rotary Mower', 'Available machine , Quality control : A- ', '2017-07-16', 25000, 12, 34, 'Rotary-mower2.jpg'),
(3, 'Hole Digger', 'Available machine , Quality control : A+', '2020-06-03', 33000, 26, 38, 'Hole-digger.jpg'),
(4, 'Feed Silo', 'Available machine , Quality control : A', '2010-08-11', 42000, 52, 0, 'Feed-silo.jpg'),
(5, 'Loader', 'Available machine , Quality control : A-', '2016-12-09', 60000, 10, 18, 'Loader2.jpg'),
(6, 'Tractor', 'Available machine , Quality control : A+', '2015-02-18', 54000, 18, 38, 'post1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `Subscription_Code` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `family_name` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_number` int(100) DEFAULT NULL,
  `district_NO` int(10) DEFAULT NULL,
  `street` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(10) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  
  `role` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  PRIMARY KEY (`Subscription_Code`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`Subscription_Code`, `name`,family_name,`phone_number`,`district_NO`,`street`,`num`, `email`, `password`, `role`) VALUES
(1, 'Admin','use', 0,1,'elahie',3, 'admin@gmail.com', '$2y$10$eIUI0tDGqwqqUIJsH2neFeqd9yG.FoqUw/xC7xHGzpzZGtYHibNh6', 'admin'),
(5, 'Codegenes','.net', NULL,2,'elahie1',8, 'codegenes@gmail.com', '$2y$10$XlaF7VQcd22ZbUJUyyQXbeqIIOBH8f3P6pbsTAgUvN9cI4dys.V8m', 'customer');
--------------------------------------------------------------------
--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `order_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`order_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`order_ID`, `Amount`, `Date`) VALUES
(6, '0', '2021-02-21');

-------------------------------------------
ALTER TABLE `client`
  ADD PRIMARY KEY (`Subscription_Code`);
---------------------------------------------
ALTER TABLE `machine`
  ADD PRIMARY KEY (`id`);
--------------------------------------------
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`order_ID`);

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT for table `transaction`
--
  ALTER TABLE `transaction`
  MODIFY `order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
