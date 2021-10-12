-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2021 at 10:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covidv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `adminEmail` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `adminEmail`, `password`) VALUES
(1, 'Admin Malith', 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `first_vaccine_requests`
--

CREATE TABLE `first_vaccine_requests` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `patientID` int(255) NOT NULL,
  `FvaccineLocation` varchar(1000) NOT NULL,
  `FvaccineTime` varchar(1000) NOT NULL,
  `status` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `first_vaccine_requests`
--

INSERT INTO `first_vaccine_requests` (`id`, `name`, `email`, `city`, `vaccinename`, `patientID`, `FvaccineLocation`, `FvaccineTime`, `status`) VALUES
(37, 'Malith Deshan', 'Malithranaweera@gmail.com', 'Colombo', 'Moderna', 1, 'Mathugama Genaral Hospital', '2021/12/22.7.30', 'compleated'),
(38, 'Malith Deshan', 'malithranaweera123@gmail.com', 'Colombo', 'Janssen', 5, 'Mathugama Genaral Hospital', '2021/12/9.15', 'compleated'),
(39, 'asd', 'malithranaweera112@gmail.com', 'Colombo', 'Oxford AstraZeneca', 6, 'Mathugama Genaral Hospital', '2021/12/9.15', 'compleated'),
(40, 'Malith Deshan', 'malithranaweera321@gmail.com', 'Colombo', 'Covaxin', 8, 'Mathugama Genaral Hospital', '2021/12/9.15', 'compleated'),
(41, 'Malith Deshan', 'malithranaweera154@gmail.com', 'Kalutara', 'Sputnik V', 10, 'NIHS MaKALUTARA', '2021/12/22.7.30', 'compleated'),
(42, 'saman', 'samanranaweera@gmail.com', 'Colombo', 'Sinopharm (WIBP)', 11, 'Mathugama Genaral Hospital', '2021/12/22.7.30', 'compleated');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `patientEmail` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `nic` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `patientEmail`, `password`, `vaccinename`, `city`, `nic`) VALUES
(1, 'Malith Deshan', 'Malithranaweera@gmail.com', '1234', 'Moderna', 'Colombo', '32432'),
(2, 'ddd', 'asd@gmail.com', '1234', 'Covaxin', 'Kurunagala', '23423'),
(3, 'asd', 'asd', 'asd', '', 'asd', 'asd'),
(4, 'saman', 'unix.assignments@gmail.com', '1234', '', 'Kalutara', '2123'),
(5, 'Malith Deshan', 'malithranaweera123@gmail.com', '1234', 'Janssen', 'Colombo', '3423432'),
(6, 'asd', 'malithranaweera112@gmail.com', '1234', 'Oxford AstraZeneca', 'Colombo', 'asdas'),
(7, 'asd', 'malithranaweera112@gmail.com', '1234', '', 'Colombo', 'asdas'),
(8, 'Malith Deshan', 'malithranaweera321@gmail.com', '1234', 'Covaxin', 'Colombo', '2123'),
(9, 'saman', 'unixassignments@gmail.com', '1234', '', 'Kalutara', '2123'),
(10, 'Malith Deshan', 'malithranaweera154@gmail.com', '1234', 'Sputnik V', 'Kalutara', '3423432'),
(11, 'saman', 'samanranaweera@gmail.com', '1234', 'Sinopharm (WIBP)', 'Colombo', '2123');

-- --------------------------------------------------------

--
-- Table structure for table `second_vaccine_requests`
--

CREATE TABLE `second_vaccine_requests` (
  `id` int(255) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `city` varchar(1000) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `patientID` varchar(1000) NOT NULL,
  `SvaccineLocation` varchar(1000) NOT NULL,
  `SvaccineTime` varchar(1000) NOT NULL,
  `status` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `second_vaccine_requests`
--

INSERT INTO `second_vaccine_requests` (`id`, `name`, `email`, `city`, `vaccinename`, `patientID`, `SvaccineLocation`, `SvaccineTime`, `status`) VALUES
(10, 'Malith Deshan', 'Malithranaweera@gmail.com', 'Colombo', 'Moderna', '1', 'STF  ', '12/12/22.12.01', 'compleated'),
(11, 'Malith Deshan', 'malithranaweera123@gmail.com', 'Colombo', 'Janssen', '5', 'Colombo Genaral', '12/12/21.12.01', 'compleated'),
(12, 'asd', 'malithranaweera112@gmail.com', 'Colombo', 'Oxford AstraZeneca', '6', 'Colombo Genaral', '12/12/22.12.01', 'compleated'),
(13, 'Malith Deshan', 'malithranaweera321@gmail.com', 'Colombo', 'Covaxin', '8', '', '', 'compleated'),
(14, 'Malith Deshan', 'malithranaweera154@gmail.com', 'Kalutara', 'Sputnik V', '10', '', '', 'compleated'),
(15, 'saman', 'samanranaweera@gmail.com', 'Colombo', 'Sinopharm (WIBP)', '11', 'STF  ', '12/12/21.14.01', 'compleated');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` int(255) NOT NULL,
  `vaccinename` varchar(1000) NOT NULL,
  `details` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `vaccinename`, `details`) VALUES
(1, 'null', 'null'),
(2, 'Moderna', 'lorum'),
(3, 'Oxford AstraZeneca', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(4, 'Janssen', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(5, 'Sputnik V', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(6, 'Sinopharm (WIBP)', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(7, 'Covaxin', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'),
(9, 'Pfizer BioNTech', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `first_vaccine_requests`
--
ALTER TABLE `first_vaccine_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_vaccine_requests`
--
ALTER TABLE `second_vaccine_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `first_vaccine_requests`
--
ALTER TABLE `first_vaccine_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `second_vaccine_requests`
--
ALTER TABLE `second_vaccine_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
