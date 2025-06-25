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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `application_user_id` int(11) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lastlog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `application_user_id`, `eid`, `password`, `name`, `email`, `lastlog`, `status`) VALUES
(1, 0, 'user', 'pass', 'User', 'user@gmail.com', '2025-05-21 06:17:08', 1),
(2, 15, 'asdasd', '45435435444', 'asdasd', 'asdasd@df.in', '2025-05-19 08:32:08', 1),
(3, 16, 'basicuser', '9878987898', 'Basic User', 'basicuser@inventruck.in', '2025-06-25 04:58:48', 1),
(4, 17, 'basicuser2', '9878987899', 'Basic User 2', 'basicuser2@inventruck.in', '2025-06-25 06:29:58', 0),
(5, 18, 'audit_lead', '9878987897', 'Audit lead', 'audit_lead@inventruck.in', '2025-06-19 04:51:09', 1),
(6, 19, 'auditor1', '45435435436', 'Auditor 1', 'auditor1@inventruck.in', '2025-06-11 09:55:21', 1),
(7, 20, 'auditor2', '45435435422', 'Auditor 2', 'auditor2@inventruck.in', '2025-06-16 05:09:37', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
