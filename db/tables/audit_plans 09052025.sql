-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2025 at 02:50 PM
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
-- Table structure for table `audit_plans`
--

CREATE TABLE `audit_plans` (
  `audit_id` int(11) NOT NULL,
  `audit_title` varchar(255) DEFAULT NULL,
  `audit_type` int(11) DEFAULT NULL,
  `audit_scope` text DEFAULT NULL,
  `audit_criteria` text DEFAULT NULL,
  `planned_start_date` date DEFAULT NULL,
  `planned_end_date` date DEFAULT NULL,
  `auto_calculated_duration` int(11) DEFAULT NULL,
  `lead_auditor` int(11) DEFAULT NULL,
  `audit_team` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `audit_plan_status` varchar(20) NOT NULL,
  `row_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `row_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_plans`
--

INSERT INTO `audit_plans` (`audit_id`, `audit_title`, `audit_type`, `audit_scope`, `audit_criteria`, `planned_start_date`, `planned_end_date`, `auto_calculated_duration`, `lead_auditor`, `audit_team`, `Comments`, `audit_plan_status`, `row_created_at`, `row_updated_at`) VALUES
(1, 'Audit title 1', 0, 'sc1', 'criteria1', '2025-05-01', '2025-05-31', NULL, 1, NULL, NULL, 'APPROVED', '2025-05-09 07:14:57', '2025-05-09 07:14:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_plans`
--
ALTER TABLE `audit_plans`
  ADD PRIMARY KEY (`audit_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_plans`
--
ALTER TABLE `audit_plans`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
