-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2014 at 06:21 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/* Drop database if exists */
DROP DATABASE IF EXISTS RESTAURANT;

/* Create database */
CREATE DATABASE RESTAURANT;

/* Use database */
USE RESTAURANT;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `Pay_No` int(9) NOT NULL,
  `Balance` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contain`
--

CREATE TABLE IF NOT EXISTS `contain` (
  `Meal_No` varchar(4) NOT NULL,
  `Order_No` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contain`
--

INSERT INTO `contain` (`Meal_No`, `Order_No`) VALUES
('RC01', 1001),
('SM04', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `credit_card`
--

CREATE TABLE IF NOT EXISTS `credit_card` (
  `CC_No` int(16) NOT NULL,
  `Exp_Date` date DEFAULT NULL,
  `Owner_Name` varchar(40) DEFAULT NULL,
  `Card_Type` varchar(15) DEFAULT NULL,
  `Pay_No` int(9) DEFAULT NULL,
  `Cus_ID` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `Cus_ID` int(6) NOT NULL,
  `CFName` varchar(20) NOT NULL,
  `CLName` varchar(20) DEFAULT NULL,
  `CContact` varchar(15) DEFAULT NULL,
  `CEmail` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `Meal_ID` varchar(4) NOT NULL,
  `Name` varchar(40) DEFAULT NULL,
  `Price` int(3) DEFAULT NULL,
  `MCID` varchar(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`Meal_ID`, `Name`, `Price`, `MCID`) VALUES
('RC1', 'SAMBA RICE AND CURRY WITH CHICKEN', 175, 'RC'),
('RC2', 'SAMBA RICE AND CURRY WITH EGG', 130, 'RC'),
('BF01', 'BASMATHI PLAIN RICE', 100, 'BF'),
('BF2', 'DEVILLED CHICKEN', 150, 'BF'),
('BF3', 'PLAIN HOPPERS', 25, 'BF'),
('BF04', 'EGG ROTTI', 50, 'BF'),
('SM01', 'NOODLES WITH CHICKEN', 250, 'SM'),
('SM02', 'CHICKEN SOUP WITH NOODLES', 180, 'SM'),
('SM03', 'ROASTED CHICKEN FULL', 950, 'SM'),
('SM04', 'DEVILLED FISH ', 300, 'SM'),
('DS01', 'DEVON BAKEAWAY SPECIAL', 525, 'DS'),
('DS02', 'DEVON SUPER MIX', 325, 'DS');

-- --------------------------------------------------------

--
-- Table structure for table `meal_catagory`
--

CREATE TABLE IF NOT EXISTS `meal_catagory` (
  `MCID` varchar(4) NOT NULL,
  `MCName` varchar(25) NOT NULL,
  `Description` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal_catagory`
--

INSERT INTO `meal_catagory` (`MCID`, `MCName`, `Description`) VALUES
('RC', 'Rice and Curry', 'Rice and curry and also Biriyani'),
('BF', 'Buffet', 'Buffet lunch and buffet dinner'),
('SM', 'Special Dishes', 'This includes dishes, rice, soup, curry.'),
('DS', 'Devon Special', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `Payment_No` int(9) NOT NULL,
  `Sub_Total` decimal(5,2) DEFAULT NULL,
  `Serv_Charg` decimal(5,2) DEFAULT NULL,
  `Total_Charg` decimal(5,2) DEFAULT NULL,
  `_Date` date DEFAULT NULL,
  `_Time` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `Res_ID` int(6) NOT NULL,
  `_Date` date DEFAULT NULL,
  `_Time` time DEFAULT NULL,
  `Cus_ID` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `Staff_ID` int(4) NOT NULL,
  `NIC` varchar(11) DEFAULT NULL,
  `FName` varchar(15) DEFAULT NULL,
  `LName` varchar(15) DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `Contact` int(10) DEFAULT NULL,
  `Gender` int(1) DEFAULT NULL,
  `Position` varchar(20) DEFAULT NULL,
  `Salary` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`Staff_ID`, `NIC`, `FName`, `LName`, `Address`, `Contact`, `Gender`, `Position`, `Salary`) VALUES
(1001, '921640331V', 'Prasanna', 'Rodrigo', '364, Hokandara, Colombo', 772771029, 0, 'Manager', 60000),
(1002, '921365486V', 'Dinali', 'Dabarera', '34, Halawatha', 774569873, 0, 'Cashier', 20000),
(1003, '911330059V', 'Irunika', 'Weeraratne', '''Anoma'' ,Beminiwatta ,Mawanella', 710790900, 1, 'cashier', 30000),
(1004, '9432449344V', 'Gihan', 'Weerasinghe', 'Aruppola , Kandy', 713298430, 1, 'waiter', 20000),
(1005, '911330059V', 'Irunika', 'Weeraratne', '"Anoma" , Beminiwatta , Mawanella', 710790900, 1, 'cashier', 30000),
(1006, '9245345345V', 'Isuru', 'Randika', 'Gelioya , Kandy', 712343667, 1, 'cashier', 30000),
(1007, '9245345345V', 'Kasuni', 'Randika', 'Gelioya , Kandy', 712343667, 0, 'cashier', 30000),
(1008, '9434534323V', 'Asanki', 'Perera', 'Gampaha , Colombo', 723565456, 0, 'waiter', 20000),
(1009, '9434534323V', 'Darshana', 'Athukorala', 'Gampaha , Colombo', 723565456, 1, 'waiter', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `_order`
--

CREATE TABLE IF NOT EXISTS `_order` (
  `Order_No` int(4) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `QTY` int(3) DEFAULT NULL,
  `Staff_ID` int(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_order`
--

INSERT INTO `_order` (`Order_No`, `Order_Date`, `Order_Time`, `QTY`, `Staff_ID`) VALUES
(1001, '2014-09-10', '05:25:30', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `_table`
--

CREATE TABLE IF NOT EXISTS `_table` (
  `T_No` int(3) NOT NULL,
  `T_SIZE` int(2) NOT NULL,
  `T_Availability` int(2) NOT NULL,
  `Staff_ID` int(4) DEFAULT NULL,
  `Res_ID` int(6) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `_table`
--

INSERT INTO `_table` (`T_No`, `T_SIZE`, `T_Availability`, `Staff_ID`, `Res_ID`) VALUES
(33, 6, 1, NULL, NULL),
(34, 6, 1, NULL, NULL),
(35, 6, 0, NULL, NULL),
(36, 6, 0, NULL, NULL),
(37, 6, 1, NULL, NULL),
(38, 6, 0, NULL, NULL),
(39, 6, 0, NULL, NULL),
(40, 6, 0, NULL, NULL),
(41, 6, 0, NULL, NULL),
(32, 6, 1, NULL, NULL),
(31, 6, 1, NULL, NULL),
(30, 6, 1, NULL, NULL),
(29, 6, 1, NULL, NULL),
(28, 6, 1, NULL, NULL),
(27, 6, 1, NULL, NULL),
(26, 6, 1, NULL, NULL),
(25, 6, 0, NULL, NULL),
(24, 6, 0, NULL, NULL),
(22, 2, 0, NULL, NULL),
(21, 2, 1, NULL, NULL),
(20, 2, 1, NULL, NULL),
(19, 2, 1, NULL, NULL),
(18, 4, 1, NULL, NULL),
(15, 4, 0, NULL, NULL),
(17, 4, 1, NULL, NULL),
(16, 4, 0, NULL, NULL),
(14, 4, 1, NULL, NULL),
(13, 2, 1, NULL, NULL),
(12, 2, 1, NULL, NULL),
(11, 2, 1, NULL, NULL),
(10, 2, 0, NULL, NULL),
(9, 2, 1, NULL, NULL),
(8, 4, 1, NULL, NULL),
(7, 6, 1, NULL, NULL),
(6, 4, 0, NULL, NULL),
(5, 2, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cash`
--
ALTER TABLE `cash`
 ADD PRIMARY KEY (`Pay_No`);

--
-- Indexes for table `contain`
--
ALTER TABLE `contain`
 ADD PRIMARY KEY (`Meal_No`,`Order_No`), ADD KEY `Order_No` (`Order_No`);

--
-- Indexes for table `credit_card`
--
ALTER TABLE `credit_card`
 ADD KEY `Pay_No` (`Pay_No`), ADD KEY `Cus_ID` (`Cus_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`Cus_ID`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
 ADD PRIMARY KEY (`Meal_ID`), ADD KEY `MCID` (`MCID`);

--
-- Indexes for table `meal_catagory`
--
ALTER TABLE `meal_catagory`
 ADD PRIMARY KEY (`MCID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
 ADD PRIMARY KEY (`Payment_No`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`Res_ID`), ADD KEY `Cus_ID` (`Cus_ID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `_order`
--
ALTER TABLE `_order`
 ADD PRIMARY KEY (`Order_No`), ADD KEY `Staff_ID` (`Staff_ID`);

--
-- Indexes for table `_table`
--
ALTER TABLE `_table`
 ADD PRIMARY KEY (`T_No`), ADD KEY `Staff_ID` (`Staff_ID`), ADD KEY `Res_ID` (`Res_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
