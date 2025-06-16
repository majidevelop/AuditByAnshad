-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2025 at 02:39 PM
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
-- Table structure for table `audit_non_confirmity_remarks`
--

CREATE TABLE `audit_non_confirmity_remarks` (
  `nc_remark_id` int(11) NOT NULL,
  `nc` int(11) NOT NULL,
  `version` int(11) NOT NULL,
  `stage` enum('audit_team','audit_lead','auditee') NOT NULL,
  `action` enum('submitted','approved','rejected','commented') NOT NULL,
  `scheduled_audit_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_type` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category` varchar(255) NOT NULL,
  `severity` varchar(255) NOT NULL,
  `nc_image` text NOT NULL,
  `nc_image_id` int(11) NOT NULL,
  `nc_question_id` int(11) NOT NULL,
  `nc_status` varchar(20) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_by_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_non_confirmity_remarks`
--

INSERT INTO `audit_non_confirmity_remarks` (`nc_remark_id`, `nc`, `version`, `stage`, `action`, `scheduled_audit_id`, `template_id`, `description`, `created_by`, `created_by_type`, `created_at`, `updated_at`, `category`, `severity`, `nc_image`, `nc_image_id`, `nc_question_id`, `nc_status`, `updated_by`, `updated_by_type`) VALUES
(1, 0, 0, 'audit_team', 'submitted', 12, 25, 'e te terter t', 20, '', '2025-06-16 12:13:52', '2025-06-16 12:13:52', '', 'Minor NC', 'uploads/1750076032_Screenshot2023-12-22153102.png', 24, 884, '', 0, ''),
(2, 0, 0, 'audit_team', 'submitted', 12, 25, 'e te terter t', 20, '', '2025-06-16 12:14:01', '2025-06-16 12:14:01', '', 'Minor NC', 'uploads/1750076041_Screenshot2023-12-22153102.png', 25, 884, '', 0, ''),
(3, 0, 0, 'audit_team', 'submitted', 12, 25, 'e te terter t', 20, '', '2025-06-16 12:14:04', '2025-06-16 12:14:04', '', 'Minor NC', 'uploads/1750076044_Screenshot2023-12-22153102.png', 26, 884, '', 0, ''),
(4, 0, 0, 'audit_team', 'submitted', 12, 25, 'e te terter t', 20, '', '2025-06-16 12:15:35', '2025-06-16 12:15:35', '', 'Minor NC', 'uploads/1750076135_Screenshot2023-12-22153102.png', 27, 884, '', 0, ''),
(5, 0, 0, 'audit_team', 'submitted', 12, 25, 'f we', 20, '', '2025-06-16 12:36:54', '2025-06-16 12:36:54', '', 'Minor NC', 'uploads/1750077414_Screenshot2024-02-29114731.png', 28, 884, '', 0, ''),
(6, 10, 0, 'audit_team', 'submitted', 12, 25, 'werwe ', 20, '', '2025-06-16 12:38:16', '2025-06-16 12:38:16', '', 'Minor NC', 'uploads/1750077496_Screenshot2024-02-07144255.png', 29, 884, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_non_confirmity_remarks`
--
ALTER TABLE `audit_non_confirmity_remarks`
  ADD PRIMARY KEY (`nc_remark_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_non_confirmity_remarks`
--
ALTER TABLE `audit_non_confirmity_remarks`
  MODIFY `nc_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
