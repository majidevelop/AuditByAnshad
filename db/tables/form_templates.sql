-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2025 at 09:21 PM
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
-- Table structure for table `form_templates`
--

CREATE TABLE `form_templates` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `template_type` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_templates`
--

INSERT INTO `form_templates` (`id`, `title`, `description`, `template_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '  Title', '  Title', 'safety', 1, '2025-04-02 16:01:24', '2025-04-02 16:01:24'),
(2, '  Title', '  Title', 'safety', 1, '2025-04-02 16:10:34', '2025-04-02 16:10:34'),
(3, '  Title', '  Title', 'safety', 1, '2025-04-02 16:11:59', '2025-04-02 16:11:59'),
(4, '  Title', '  Title', 'safety', 1, '2025-04-02 16:12:02', '2025-04-02 16:12:02'),
(5, '  Title', '  Title', 'safety', 1, '2025-04-02 16:13:36', '2025-04-02 16:13:36'),
(6, '  Title', '  Title', 'safety', 1, '2025-04-02 16:14:05', '2025-04-02 16:14:05'),
(7, '  Title', '  Title', 'safety', 1, '2025-04-02 16:14:06', '2025-04-02 16:14:06'),
(8, '  Title', '  Title', 'safety', 1, '2025-04-02 16:14:06', '2025-04-02 16:14:06'),
(9, '  Title', '  Title', 'safety', 1, '2025-04-02 16:14:11', '2025-04-02 16:14:11'),
(10, '  Title', '  Title', 'safety', 1, '2025-04-02 16:14:24', '2025-04-02 16:14:24'),
(11, '  Title', '  Title', 'safety', 1, '2025-04-02 16:15:42', '2025-04-02 16:15:42'),
(12, '  Title1', '  Title1', 'safety', 1, '2025-04-02 16:19:05', '2025-04-02 16:19:05'),
(13, '  Title1', '  Title1', 'safety', 1, '2025-04-02 16:19:42', '2025-04-02 16:19:42'),
(14, '  Title1', '  Title1', 'safety', 1, '2025-04-02 16:24:52', '2025-04-02 16:24:52'),
(15, '  Title1', '  Title1', 'safety', 1, '2025-04-02 16:26:06', '2025-04-02 16:26:06'),
(16, '  Title', '  Title', 'safety', 1, '2025-04-02 16:28:04', '2025-04-02 16:28:04'),
(17, '  Title', '  Title', 'safety', 1, '2025-04-02 16:28:49', '2025-04-02 16:28:49'),
(18, '  Title form 18', '  Title desc', 'safety', 1, '2025-04-02 16:32:15', '2025-04-02 16:32:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_templates`
--
ALTER TABLE `form_templates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_templates`
--
ALTER TABLE `form_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
