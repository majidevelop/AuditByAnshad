-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 02:30 PM
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
-- Table structure for table `scheduled_inspections`
--

CREATE TABLE `scheduled_inspections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `template_id` int(11) NOT NULL,
  `assignees` text DEFAULT NULL,
  `audit_lead` int(11) DEFAULT NULL,
  `audit_manager` int(11) DEFAULT NULL,
  `audit_date` date DEFAULT NULL,
  `site` int(11) NOT NULL,
  `asset` int(11) NOT NULL,
  `auditee` int(11) NOT NULL,
  `report_template` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduled_inspections`
--

INSERT INTO `scheduled_inspections` (`id`, `title`, `description`, `template_id`, `assignees`, `audit_lead`, `audit_manager`, `audit_date`, `site`, `asset`, `auditee`, `report_template`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 10:46:54', '2025-04-12 10:46:54'),
(2, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 10:47:17', '2025-04-12 10:47:17'),
(3, NULL, NULL, 67, '', 2, 1, '0000-00-00', 0, 0, 0, 0, '2025-04-12 10:49:04', '2025-04-12 10:49:04'),
(4, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 10:50:40', '2025-04-12 10:50:40'),
(5, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 11:12:47', '2025-04-12 11:12:47'),
(6, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 11:13:13', '2025-04-12 11:13:13'),
(7, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 12:44:17', '2025-04-12 12:44:17'),
(8, NULL, NULL, 67, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 12:44:43', '2025-04-12 12:44:43'),
(9, NULL, NULL, 67, '2', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 12:50:47', '2025-04-12 12:50:47'),
(10, NULL, NULL, 67, '2,1', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-12 12:51:36', '2025-04-12 12:51:36'),
(11, 'sc 1', NULL, 67, '2,1', 0, 0, '2025-05-08', 0, 0, 0, 0, '2025-04-12 12:51:53', '2025-04-12 12:51:53'),
(12, 'vncvb', NULL, 67, '2,1', 0, 0, '2025-04-11', 0, 0, 0, 0, '2025-04-12 12:53:52', '2025-04-12 12:53:52'),
(13, '', '', 18, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-22 12:20:53', '2025-04-22 12:20:53'),
(14, '', '', 18, '', 0, 0, '0000-00-00', 0, 0, 0, 0, '2025-04-22 12:24:04', '2025-04-22 12:24:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scheduled_inspections`
--
ALTER TABLE `scheduled_inspections`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scheduled_inspections`
--
ALTER TABLE `scheduled_inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
