-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2019 at 06:33 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transport`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abcd` (IN `push` INT)  NO SQL
SELECT* from user_info$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nishu` (IN `bus` INT)  NO SQL
SELECT* from bus_details$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `raj` (IN `raj` INT)  NO SQL
SELECT* from ticket$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `name`, `psw`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `booking_det`
--

CREATE TABLE `booking_det` (
  `bus_id` int(11) NOT NULL,
  `vacant` int(11) NOT NULL,
  `jdate` varchar(30) NOT NULL,
  `bfrom` varchar(30) NOT NULL,
  `bto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_det`
--

INSERT INTO `booking_det` (`bus_id`, `vacant`, `jdate`, `bfrom`, `bto`) VALUES
(3, 75, '2019-11-16', 'Bhind ', 'Delhi'),
(2, 78, '2019-11-21', 'Bhind ', 'Delhi'),
(5, 70, '2019-11-23', 'Bangalore', 'Ladakh');

-- --------------------------------------------------------

--
-- Table structure for table `bus_details`
--

CREATE TABLE `bus_details` (
  `bus_id` int(11) NOT NULL,
  `bname` varchar(30) NOT NULL,
  `bno` varchar(20) NOT NULL,
  `bfrom` varchar(30) NOT NULL,
  `bto` varchar(30) NOT NULL,
  `time` varchar(10) NOT NULL,
  `type` varchar(10) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `fare` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_details`
--

INSERT INTO `bus_details` (`bus_id`, `bname`, `bno`, `bfrom`, `bto`, `time`, `type`, `no_seat`, `fare`) VALUES
(2, 'Toofan Express', 'mp 30 sc 0137', 'Bhind ', 'Delhi', '6pm', 'Ac', 80, 1000),
(3, 'Satabdi Express', 'MP07 Se1212', 'Bhind ', 'Delhi', '7 pm', 'Non Ac', 80, 500),
(4, 'Janrath', 'up16sc1212', 'Lucknow', 'gorakhpur', '6am', 'Ac', 80, 350),
(5, 'Taj express', 'mp30Ka1213', 'Bangalore', 'Ladakh', '8AM', 'Ac', 80, 5000);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `tid` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `seat_no` varchar(30) NOT NULL,
  `no_seat` int(11) NOT NULL,
  `ticket_status` varchar(30) NOT NULL,
  `jdate` varchar(30) NOT NULL,
  `booking_date` date NOT NULL,
  `pname` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`tid`, `bus_id`, `uid`, `seat_no`, `no_seat`, `ticket_status`, `jdate`, `booking_date`, `pname`) VALUES
(1, 3, 1, ' 1 2', 2, 'Conform', '2019-11-16', '2019-11-17', 'rajesh'),
(2, 2, 1, ' 1 2', 2, 'Conform', '2019-11-21', '2019-11-21', 'Rajesh'),
(3, 5, 2, ' 1 2 3 4 5 6 7 8 9 10', 10, 'Conform', '2019-11-23', '2019-11-21', 'Nishant'),
(4, 3, 3, ' 3 4 5', 3, 'Conform', '2019-11-16', '2019-11-21', 'Rajeev Kumar');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `uid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `uname` varchar(30) NOT NULL,
  `age` varchar(30) NOT NULL,
  `adhar_no` varchar(30) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`uid`, `name`, `uname`, `age`, `adhar_no`, `psw`, `email`) VALUES
(1, 'Rajesh', 'rajesh', '22', '123456', 'rajesh', 'raj@gmail.com'),
(2, 'Nishant', 'nishant', '22', '12345', 'nishant', 'ni@gmail.com'),
(3, 'Rajeev Kumar', 'rajeev', '23', '1234567', 'rajeev', 'ra@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `bus_details`
--
ALTER TABLE `bus_details`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bus_details`
--
ALTER TABLE `bus_details`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
