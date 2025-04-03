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
-- Table structure for table `form_template_answer_options`
--

CREATE TABLE `form_template_answer_options` (
  `option_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `template_id` int(11) NOT NULL,
  `option_value` varchar(255) NOT NULL,
  `answer_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form_template_answer_options`
--

INSERT INTO `form_template_answer_options` (`option_id`, `question_id`, `template_id`, `option_value`, `answer_order`, `created_at`, `updated_at`) VALUES
(1, 14, 18, 'Option 1', 1, '2025-04-02 16:32:15', '2025-04-02 16:32:15'),
(2, 14, 18, 'Option 2', 2, '2025-04-02 16:32:15', '2025-04-02 16:32:15'),
(3, 14, 18, 'Option 3', 3, '2025-04-02 16:32:15', '2025-04-02 16:32:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form_template_answer_options`
--
ALTER TABLE `form_template_answer_options`
  ADD PRIMARY KEY (`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form_template_answer_options`
--
ALTER TABLE `form_template_answer_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
