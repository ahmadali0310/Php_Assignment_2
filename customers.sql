-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 16, 2021 at 02:39 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customers`
--

-- --------------------------------------------------------

--
-- Table structure for table `customersdetails`
--

CREATE TABLE `customersdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(550) NOT NULL,
  `address` varchar(550) NOT NULL,
  `city` varchar(200) NOT NULL,
  `pin_code` decimal(10,0) NOT NULL,
  `country` varchar(200) NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customersdetails`
--

INSERT INTO `customersdetails` (`id`, `name`, `address`, `city`, `pin_code`, `country`, `description`) VALUES
(24, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Course Title: PSYCHOLOGY IN ACTION<br>Course Duration: 3 Months'),
(25, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a'),
(26, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Master Trainer: Dr. Quratulain<br>Course Duration: 3 '),
(27, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Holds graduate degrees from MIT, University of Toronto, and Oxford University and is one of fewer than 50 ITIL Masters globally.'),
(28, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Holds graduate degrees from MIT, University of Toronto, and Oxford University and is one of fewer than 50 ITIL Masters globally.'),
(29, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Course Title: PSYCHOLOGY IN ACTION<br>Course Duration: 3 Months'),
(30, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Holds graduate degrees from MIT, University of Toronto, and Oxford University and is one of fewer than 50 ITIL Masters globally.'),
(31, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', '( Ph.D. Educational Psychology,  COUNSELLING FOR EDUCATION)'),
(32, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', '( Ph.D. Educational Psychology,  COUNSELLING FOR EDUCATION)'),
(33, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type a'),
(34, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Holds graduate degrees from MIT, University of Toronto, and Oxford University and is one of fewer than 50 ITIL Masters globally.'),
(35, 'Ahmad Ali', 'pwshawar', 'peshawar', '25000', 'Pakistan', 'Course Title: PSYCHOLOGY IN ACTION<br>Course Duration: 3 Months');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customersdetails`
--
ALTER TABLE `customersdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customersdetails`
--
ALTER TABLE `customersdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
