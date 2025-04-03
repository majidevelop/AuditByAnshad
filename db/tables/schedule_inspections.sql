-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2025 at 02:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehse`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule_inspections`
--

CREATE TABLE `schedule_inspections` (
  `inspection_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `assignee` int(11) DEFAULT NULL,
  `schedule` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `due_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_inspections`
--

INSERT INTO `schedule_inspections` (`inspection_id`, `template_id`, `site_id`, `asset_id`, `assignee`, `schedule`, `created_by`, `created_at`, `updated_at`, `due_date`) VALUES
(1, 16, 1, 1, 1, '1', 1, '2025-04-03 11:58:03', '2025-04-03 11:58:03', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedule_inspections`
--
ALTER TABLE `schedule_inspections`
  ADD PRIMARY KEY (`inspection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedule_inspections`
--
ALTER TABLE `schedule_inspections`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
