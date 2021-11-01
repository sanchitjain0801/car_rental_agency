-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2021 at 05:24 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_rental_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `vehicle_number` varchar(100) NOT NULL,
  `total_rent` int(11) NOT NULL,
  `booked_by` varchar(100) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `number_of_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`vehicle_number`, `total_rent`, `booked_by`, `booking_id`, `start_date`, `number_of_days`) VALUES
('HR26B1013', 550, 'rohit1331@gmail.com', 18, '2021-11-02', 1),
('HR36AB1433', 3000, 'rohit1331@gmail.com', 19, '2021-11-03', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`name`, `email`, `password`, `type`) VALUES
('Rohit Mishra', 'rohit1331@gmail.com', 'rohit1331', 'customer'),
('Sanchit Jain', 'sanchit1331@gmail.com', 'sanchit1331', 'agency');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_details`
--

CREATE TABLE `vehicle_details` (
  `vehicle_model` varchar(100) NOT NULL,
  `vehicle_number` varchar(100) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `rent_per_day` int(11) NOT NULL,
  `added_by` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_details`
--

INSERT INTO `vehicle_details` (`vehicle_model`, `vehicle_number`, `seating_capacity`, `rent_per_day`, `added_by`) VALUES
('Polo Red Auto', 'DL07DA1234', 4, 700, 'sanchit1331@gmail.com'),
('Swift Blue Manual', 'HR26B1013', 4, 550, 'sanchit1331@gmail.com'),
('Swift Red auto', 'HR26B1023', 4, 500, 'sanchit1331@gmail.com'),
('XUV700 black auto', 'HR26B1076', 4, 700, 'sanchit1331@gmail.com'),
('Xylo white Manual', 'HR26B1111', 7, 1200, 'sanchit1331@gmail.com'),
('Nano Yellow Manual', 'HR26B1323', 4, 400, 'sanchit1331@gmail.com'),
('Swift Red auto', 'HR26B1399', 4, 560, 'sanchit1331@gmail.com'),
('XUV700 blue auto', 'HR26B1436', 7, 1010, 'sanchit1331@gmail.com'),
('Nano white Manual', 'HR26B1666', 4, 450, 'sanchit1331@gmail.com'),
('Xylo Red Manual', 'HR36AB1433', 7, 1000, 'sanchit1331@gmail.com'),
('Polo White Auto', 'HR36TR0987', 4, 600, 'sanchit1331@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `vehicle_details`
--
ALTER TABLE `vehicle_details`
  ADD PRIMARY KEY (`vehicle_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
