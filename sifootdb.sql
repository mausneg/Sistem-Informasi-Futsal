-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 10:46 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sifootdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `no_booking` int(11) NOT NULL,
  `field_name` varchar(100) NOT NULL,
  `date` datetime(6) NOT NULL,
  `booking_status` enum('booked','confirm','cancelled','pending','end') NOT NULL,
  `email_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`no_booking`, `field_name`, `date`, `booking_status`, `email_customer`) VALUES
(30, 'Sintetis', '2023-04-30 09:00:00.000000', 'pending', 'mausneg@gmail.com'),
(31, 'Sintetis', '2023-05-01 09:00:00.000000', 'pending', 'mausneg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `email_customer` varchar(100) NOT NULL,
  `username_customer` varchar(100) NOT NULL,
  `contact_customer` varchar(100) NOT NULL,
  `password_customer` varchar(100) NOT NULL,
  `pp_customer` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`email_customer`, `username_customer`, `contact_customer`, `password_customer`, `pp_customer`) VALUES
('mausneg@gmail.com', 'mausneg', '081234567890', '$2y$10$tlOPFslYrcm2/qPCavRU3.QR0Wnx6Mui6qZVt.V4KqXqqypRFpEsW', ''),
('q@gmail.com', 'q', 'q', '$2y$10$QkoXFuyPmrfjDpT7ZQQpq.wn7Ju5SBOF.D/krWDDuSxMhj/B4J4Gq', '');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `no_payment` int(11) NOT NULL,
  `no_booking` int(11) NOT NULL,
  `id_method_payment` varchar(100) NOT NULL,
  `method_payment` varchar(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_booking` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`no_payment`, `no_booking`, `id_method_payment`, `method_payment`, `amount`, `date_booking`) VALUES
(22, 30, '0712398721', 'gopay', 120000, '2023-05-29 11:57:49'),
(23, 31, '7340732490', 'shopee', 120000, '2023-05-29 13:43:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`no_booking`),
  ADD KEY `FK_customer_booking` (`email_customer`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`email_customer`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`no_payment`),
  ADD KEY `fk_payment_booking` (`no_booking`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `no_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `no_payment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_customer_booking` FOREIGN KEY (`email_customer`) REFERENCES `customer` (`email_customer`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_booking` FOREIGN KEY (`no_booking`) REFERENCES `booking` (`no_booking`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
