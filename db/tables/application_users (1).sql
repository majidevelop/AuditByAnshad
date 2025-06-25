-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 01:19 PM
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
-- Table structure for table `application_users`
--

CREATE TABLE `application_users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_users`
--

INSERT INTO `application_users` (`user_id`, `name`, `department`, `roles`, `company_id`, `email`, `phone`, `created_at`, `updated_at`, `created_by`, `updated_by`, `status`) VALUES
(1, 'test user 1', 1, '[\"1\",\"2\"]', 0, 'user@acs.com', '3456', '2025-04-12 06:43:34', '2025-04-12 06:43:34', 0, 0, 1),
(2, 'test manager 1', 1, '[\"1\",\"3\"]', 0, '0', '0', '2025-04-12 06:43:34', '2025-04-12 06:43:34', 0, 0, 1),
(5, 'hfdh', 1, '1', 2, 'ghjg@gj.com', '8484884', '2025-05-19 05:07:19', '2025-05-19 05:07:19', 0, 0, 1),
(6, 'hfdh', 1, '4', 1, 'gsdfhjg@gj.com', '435435', '2025-05-19 05:07:38', '2025-05-19 05:07:38', 0, 0, 1),
(7, 'hfdh', 1, '1,2', 1, 'ghjg@gj.com', '3423423', '2025-05-19 05:09:19', '2025-05-19 05:09:19', 0, 0, 1),
(8, 'yutu', 1, '1,4', 3, 'ghjytutyug@gj.com', '657567567', '2025-05-19 05:13:27', '2025-05-19 05:13:27', 0, 0, 1),
(9, 'ghjghj', 1, '1', 3, 'gghjghjhjg@gj.com', '66546546', '2025-05-19 05:15:38', '2025-05-19 05:15:38', 0, 0, 1),
(10, 'hfdhsdfsf', 1, '2,3', 3, 'ghcvcvjg@gj.com', '45435435435', '2025-05-19 05:16:55', '2025-05-19 05:16:55', 0, 0, 1),
(11, 'fdgdfsgdfg', 1, '2,4', 5, 'gherewrjg@gj.com', '34234234234', '2025-05-19 05:27:51', '2025-05-19 05:27:51', 0, 0, 1),
(12, 'sdfsfsdf', 1, '2', 1, 'ghjg@gj.in', '2020202020', '2025-05-19 05:32:22', '2025-05-19 05:32:22', 0, 0, 1),
(13, 'hfdhsdfs', 1, '2', 1, 'ghjg@gj.com', '2020202054rr', '2025-05-19 05:32:46', '2025-05-19 05:32:46', 0, 0, 1),
(14, 'asdfg', 1, '2', 2, 'asdfg@as.in', '454354354345', '2025-05-19 08:30:57', '2025-05-19 08:30:57', 0, 0, 1),
(15, 'asdasd', 1, '2,4,3', 2, 'asdasd@df.in', '45435435444', '2025-05-19 08:32:08', '2025-05-19 08:32:08', 0, 0, 1),
(16, 'Basic User', 1, '3', 7, 'basicuser@inventruck.in', '9878987898', '2025-05-19 08:36:47', '2025-05-19 08:36:47', 0, 0, 1),
(17, 'Basic User 2', 1, '4,3', 7, 'basicuser2@inventruck.in', '9878987899', '2025-05-19 09:28:27', '2025-05-19 09:28:27', 0, 0, 0),
(18, 'Audit lead', 1, '1,2', 7, 'audit_lead@inventruck.in', '9878987897', '2025-05-19 09:28:57', '2025-05-19 09:28:57', 0, 0, 1),
(19, 'Auditor 1', 3, '3', 7, 'auditor1@inventruck.in', '45435435436', '2025-06-11 09:55:21', '2025-06-11 09:55:21', 0, 0, 1),
(20, 'Auditor 2', 3, '2,4,3', 7, 'auditor2@inventruck.in', '45435435422', '2025-06-11 10:01:08', '2025-06-11 10:01:08', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_users`
--
ALTER TABLE `application_users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`,`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_users`
--
ALTER TABLE `application_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
