-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2025 at 02:29 PM
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
-- Table structure for table `form_answers`
--

CREATE TABLE `form_answers` (
  `answer_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text NOT NULL,
  `option_id` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_answers`
--

INSERT INTO `form_answers` (`answer_id`, `schedule_id`, `template_id`, `question_id`, `answer`, `option_id`, `created_at`) VALUES
(1, 0, 18, 13, 'pass_fail', '0', '2025-04-24 09:51:47'),
(2, 0, 18, 13, 'true_false', '0', '2025-04-24 09:52:39'),
(3, 0, 18, 13, 'pass_fail', '0', '2025-04-24 09:59:16'),
(4, 0, 18, 13, 'pass_fail', '0', '2025-04-24 10:00:32'),
(5, 0, 18, 14, 'Option 3', '0', '2025-04-24 10:00:32'),
(6, 0, 18, 13, 'pass_fail', '', '2025-04-24 10:17:00'),
(7, 0, 18, 14, 'Option 2', '2', '2025-04-24 10:17:00'),
(8, 0, 70, 70, 'fdghdf ', '', '2025-04-24 11:51:12'),
(9, 0, 70, 71, 'Option 1 dfgfdgs ', '82', '2025-04-24 11:51:12'),
(10, 0, 70, 72, 'Option 1 rewret ert ertew ert er', '86', '2025-04-24 11:51:12'),
(11, 17, 70, 70, 'ffdg', '', '2025-04-24 12:00:28'),
(12, 17, 70, 71, 'Option 1 dfgfdgs ', '82', '2025-04-24 12:00:28'),
(13, 17, 70, 72, 'Option 1 rewret ert ertew ert er', '86', '2025-04-24 12:00:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_answers`
--
ALTER TABLE `form_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_answers`
--
ALTER TABLE `form_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
