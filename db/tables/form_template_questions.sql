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
-- Table structure for table `form_template_questions`
--

CREATE TABLE `form_template_questions` (
  `question_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `question_description` varchar(255) DEFAULT NULL,
  `question_order` int(11) NOT NULL,
  `answer_type` varchar(20) DEFAULT NULL,
  `is_required` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_template_questions`
--

INSERT INTO `form_template_questions` (`question_id`, `template_id`, `question_title`, `question_description`, `question_order`, `answer_type`, `is_required`, `created_at`, `updated_at`) VALUES
(1, 11, '  Question', '  Description', 1, '0', 0, '2025-04-02 16:15:42', '2025-04-02 16:15:42'),
(2, 12, '  Question', '  Description', 1, '0', 0, '2025-04-02 16:19:05', '2025-04-02 16:19:05'),
(3, 13, '  Question', '  Description', 1, '0', 0, '2025-04-02 16:19:42', '2025-04-02 16:19:42'),
(4, 14, '  Question', '  Description', 1, '0', 0, '2025-04-02 16:24:52', '2025-04-02 16:24:52'),
(5, 14, '  Question', '  Question', 2, '0', 0, '2025-04-02 16:24:52', '2025-04-02 16:24:52'),
(6, 15, '  Question', '  Description', 1, 'single_select', 0, '2025-04-02 16:26:06', '2025-04-02 16:26:06'),
(7, 15, '  Question', '  Question', 2, 'preconfigured', 0, '2025-04-02 16:26:06', '2025-04-02 16:26:06'),
(8, 16, '  Question', '  Description', 1, 'preconfigured', 0, '2025-04-02 16:28:04', '2025-04-02 16:28:04'),
(9, 16, '  Question', '  Question', 2, 'dropdown', 0, '2025-04-02 16:28:04', '2025-04-02 16:28:04'),
(10, 17, '  Question', '  Description', 1, 'single_select', 0, '2025-04-02 16:28:49', '2025-04-02 16:28:49'),
(11, 17, '  Question', '  Question', 2, 'dropdown', 0, '2025-04-02 16:28:49', '2025-04-02 16:28:49'),
(12, 17, '  Question', '  Question', 3, 'multi_select', 0, '2025-04-02 16:28:49', '2025-04-02 16:28:49'),
(13, 18, '  Question 5qw4e5', '  Description', 1, 'preconfigured', 0, '2025-04-02 16:32:15', '2025-04-02 16:32:15'),
(14, 18, '  Question dshfjsf', '  Question', 2, 'single_select', 0, '2025-04-02 16:32:15', '2025-04-02 16:32:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_template_questions`
--
ALTER TABLE `form_template_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_template_questions`
--
ALTER TABLE `form_template_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
