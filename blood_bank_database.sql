-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 30, 2023 at 08:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_info`
--

CREATE TABLE `blood_info` (
  `id` int(11) NOT NULL,
  `blood_grp` varchar(20) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `hospital` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_info`
--

INSERT INTO `blood_info` (`id`, `blood_grp`, `quantity`, `hospital`) VALUES
(1, 'O positive', '1200ml', 'Fortis Hospital'),
(2, 'O negative', '400ml', 'Fortis Hospital'),
(3, 'AB negative', '500ml', 'Fortis Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `blood_requests`
--

CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL,
  `requester` varchar(50) NOT NULL,
  `blood_type` varchar(20) NOT NULL,
  `blood_quantity` varchar(50) NOT NULL,
  `hospital` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blood_requests`
--

INSERT INTO `blood_requests` (`id`, `requester`, `blood_type`, `blood_quantity`, `hospital`) VALUES
(1, 'Abhishek Epili', 'O positive', '120ml', 'Fortis Hospital'),
(2, 'Avinash Epili', 'O negative', '300ml', 'Fortis Hospital');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_data`
--

CREATE TABLE `hospital_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospital_data`
--

INSERT INTO `hospital_data` (`id`, `name`, `contact`, `email`, `address`, `pass`) VALUES
(1, 'Fortis Hospital', '0123456789', 'fortis@gmail.com', 'Mulund West', 'fortis');

-- --------------------------------------------------------

--
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `blood_grp` varchar(20) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `name`, `age`, `blood_grp`, `contact`, `email`, `pass`) VALUES
(1, 'Abhishek Epili', 18, 'O positive', '9082419895', 'epiliabhishek@gmail.com', 'abhi'),
(2, 'Avinash Epili', 22, 'O negative', '7777777777', 'avinashepili@gmail.com', 'avinash');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_info`
--
ALTER TABLE `blood_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_requests`
--
ALTER TABLE `blood_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_data`
--
ALTER TABLE `hospital_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_info`
--
ALTER TABLE `blood_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blood_requests`
--
ALTER TABLE `blood_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital_data`
--
ALTER TABLE `hospital_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
