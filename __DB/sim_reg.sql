-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2023 at 04:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sim_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand_series`
--

CREATE TABLE `brand_series` (
  `id` varchar(25) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `brand_description` varchar(50) NOT NULL,
  `brand_id` varchar(50) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `creation_timestamp` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `last_update_timestamp` varchar(50) NOT NULL,
  `series` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `file_uploaded`
--

CREATE TABLE `file_uploaded` (
  `id` int(11) NOT NULL,
  `file_type` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `min_metadata`
--

CREATE TABLE `min_metadata` (
  `id` varchar(25) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `brand_description` varchar(50) NOT NULL,
  `brand_id` varchar(50) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `creation_timestamp` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `last_update_timestamp` varchar(50) NOT NULL,
  `min` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasa_extract`
--

CREATE TABLE `pasa_extract` (
  `id` varchar(25) NOT NULL,
  `pasa_type_upload` varchar(25) NOT NULL,
  `sequence_number` varchar(50) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `date_registered` varchar(50) NOT NULL,
  `primary_min` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `mran` varchar(50) NOT NULL,
  `recipient_min` varchar(50) NOT NULL,
  `amount` varchar(50) NOT NULL,
  `date_initiated` varchar(50) NOT NULL,
  `date_failed` varchar(50) NOT NULL,
  `date_requested` varchar(50) NOT NULL,
  `date_debit_confirmed` varchar(50) NOT NULL,
  `date_credit_confirmed` varchar(50) NOT NULL,
  `denomination_id` varchar(50) NOT NULL,
  `pasa_type` varchar(50) NOT NULL,
  `BRAND2` varchar(50) DEFAULT NULL,
  `STATUS` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sim_reg_extract`
--

CREATE TABLE `sim_reg_extract` (
  `id` int(11) NOT NULL,
  `file_id` varchar(50) NOT NULL,
  `min` varchar(25) NOT NULL,
  `brand` varchar(150) DEFAULT NULL,
  `brand_name` varchar(100) DEFAULT NULL,
  `control_number` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL,
  `simreg_token` text NOT NULL,
  `created_at` varchar(25) NOT NULL,
  `updated_at` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand_series`
--
ALTER TABLE `brand_series`
  ADD KEY `series_idx` (`series`),
  ADD KEY `brand_id_brand_series_idx` (`brand_id`);

--
-- Indexes for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `min_metadata`
--
ALTER TABLE `min_metadata`
  ADD KEY `min_metadata_idx` (`min`),
  ADD KEY `brand_id_min_metadata_idx` (`brand_id`);

--
-- Indexes for table `pasa_extract`
--
ALTER TABLE `pasa_extract`
  ADD KEY `primary_min_idx` (`primary_min`),
  ADD KEY `sequence_number_idx` (`sequence_number`),
  ADD KEY `pasa_type_upload_idx` (`pasa_type_upload`);

--
-- Indexes for table `sim_reg_extract`
--
ALTER TABLE `sim_reg_extract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `number_idx` (`min`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file_uploaded`
--
ALTER TABLE `file_uploaded`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sim_reg_extract`
--
ALTER TABLE `sim_reg_extract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
