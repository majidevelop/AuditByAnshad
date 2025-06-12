-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2025 at 02:41 PM
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
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `file_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`file_id`, `file_name`, `file_path`, `created_at`) VALUES
(1, '1749549061_Screenshot2023-12-22153102.png', 'uploads/1749549061_Screenshot2023-12-22153102.png', '2025-06-10 09:51:01'),
(2, '1749549642_Screenshot2024-01-29120221.png', 'uploads/1749549642_Screenshot2024-01-29120221.png', '2025-06-10 10:00:42'),
(3, '1749549764_Screenshot2024-02-12100426.png', 'uploads/1749549764_Screenshot2024-02-12100426.png', '2025-06-10 10:02:44'),
(4, '1749549922_Screenshot2024-01-29120221.png', 'uploads/1749549922_Screenshot2024-01-29120221.png', '2025-06-10 10:05:22'),
(5, '1749549952_Screenshot2024-02-07144255.png', 'uploads/1749549952_Screenshot2024-02-07144255.png', '2025-06-10 10:05:52'),
(6, '1749554091_Screenshot2023-12-22153102.png', 'uploads/1749554091_Screenshot2023-12-22153102.png', '2025-06-10 11:14:51'),
(7, '1749554134_Screenshot2023-12-22153102.png', 'uploads/1749554134_Screenshot2023-12-22153102.png', '2025-06-10 11:15:34'),
(8, '1749554199_Screenshot2023-12-22153102.png', 'uploads/1749554199_Screenshot2023-12-22153102.png', '2025-06-10 11:16:39'),
(9, '1749554226_Screenshot2023-12-22153102.png', 'uploads/1749554226_Screenshot2023-12-22153102.png', '2025-06-10 11:17:06'),
(10, '1749554375_Screenshot2023-12-22153102.png', 'uploads/1749554375_Screenshot2023-12-22153102.png', '2025-06-10 11:19:35'),
(11, '1749554421_Screenshot2023-12-22153102.png', 'uploads/1749554421_Screenshot2023-12-22153102.png', '2025-06-10 11:20:21'),
(12, '1749554744_Screenshot2023-12-22153102.png', 'uploads/1749554744_Screenshot2023-12-22153102.png', '2025-06-10 11:25:44'),
(13, '1749617129_Screenshot2024-01-03164049.png', 'uploads/1749617129_Screenshot2024-01-03164049.png', '2025-06-11 04:45:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`file_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
