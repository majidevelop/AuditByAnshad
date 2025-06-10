-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 02:47 PM
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
-- Table structure for table `audit_non_confirmity_master`
--

CREATE TABLE `audit_non_confirmity_master` (
  `nc_id` int(11) NOT NULL,
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
-- Dumping data for table `audit_non_confirmity_master`
--

INSERT INTO `audit_non_confirmity_master` (`nc_id`, `scheduled_audit_id`, `template_id`, `description`, `created_by`, `created_by_type`, `created_at`, `updated_at`, `category`, `severity`, `nc_image`, `nc_image_id`, `nc_question_id`, `nc_status`, `updated_by`, `updated_by_type`) VALUES
(1, 0, 0, 'sdfsdfsdf', 0, '', '2025-06-10 10:05:52', '2025-06-10 10:05:52', '', 'Minor NC', 'uploads/1749549952_Screenshot2024-02-07144255.png', 5, 24, '', 0, ''),
(2, 0, 0, 'sadsadsadasd', 0, '', '2025-06-10 11:14:51', '2025-06-10 11:14:51', '', 'Minor NC', 'uploads/1749554091_Screenshot2023-12-22153102.png', 6, 24, '', 0, ''),
(3, 0, 0, 'sfsdf', 0, '', '2025-06-10 11:15:34', '2025-06-10 11:15:34', '', 'Major NC', 'uploads/1749554134_Screenshot2023-12-22153102.png', 7, 24, '', 0, ''),
(4, 0, 0, 'dsfsdf', 0, '', '2025-06-10 11:16:39', '2025-06-10 11:16:39', '', 'Minor NC', 'uploads/1749554199_Screenshot2023-12-22153102.png', 8, 24, '', 0, ''),
(5, 0, 0, 'fdgfd ', 0, '', '2025-06-10 11:17:06', '2025-06-10 11:17:06', '', 'Minor NC', 'uploads/1749554226_Screenshot2023-12-22153102.png', 9, 24, '', 0, ''),
(6, 8, 18, 'dfsf', 16, '', '2025-06-10 11:19:35', '2025-06-10 11:19:35', '', 'Major NC', 'uploads/1749554744_Screenshot2023-12-22153102.png', 12, 24, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit_non_confirmity_master`
--
ALTER TABLE `audit_non_confirmity_master`
  ADD PRIMARY KEY (`nc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit_non_confirmity_master`
--
ALTER TABLE `audit_non_confirmity_master`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
