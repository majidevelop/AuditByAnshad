-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2025 at 02:39 PM
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
(6, 8, 18, 'dfsf', 16, '', '2025-06-10 11:19:35', '2025-06-10 11:19:35', '', 'Major NC', 'uploads/1749554744_Screenshot2023-12-22153102.png', 12, 24, '', 0, ''),
(7, 8, 18, 'qwe 345', 16, '', '2025-06-11 04:45:29', '2025-06-11 04:45:29', '', 'OFI', 'uploads/1749617129_Screenshot2024-01-03164049.png', 13, 25, '', 0, ''),
(8, 12, 25, 'Ajd kdsf sdfk ksdfksnd dgsdfsfd.', 20, '', '2025-06-13 08:46:08', '2025-06-13 08:46:08', '', 'OFI', 'uploads/1749804368_Screenshot2024-02-12100426.png', 14, 880, '', 0, ''),
(9, 12, 25, 'Asad dgsd dg ds fgdf dfg .', 20, '', '2025-06-13 08:46:48', '2025-06-13 08:46:48', '', 'Major NC', 'uploads/1749804408_Screenshot2024-02-29182149.png', 15, 883, '', 0, ''),
(10, 12, 25, ' sdfsdf', 20, '', '2025-06-13 08:47:06', '2025-06-13 08:47:06', '', 'Minor NC', 'uploads/1750074891_Screenshot2024-02-29182149.png', 23, 884, '', 0, ''),
(11, 0, 25, 'sa  fe ', 20, '', '2025-06-16 11:43:25', '2025-06-16 11:43:25', '', 'Minor NC', 'uploads/1750074718_Screenshot2023-12-22153102.png', 21, 884, '', 0, ''),
(12, 13, 25, 'Asds sd dfdf  gdfg fdgdg .', 18, '', '2025-06-18 11:07:57', '2025-06-18 11:07:57', '', 'Minor NC', 'uploads/1750244876_Screenshot2023-12-22153102.png', 30, 877, '', 0, ''),
(13, 13, 25, 'Asds sd dfdf  gdfg fdgdg .', 18, '', '2025-06-18 11:08:10', '2025-06-18 11:08:10', '', 'Major NC', 'uploads/1750244890_Screenshot2024-02-16104350.png', 31, 878, '', 0, ''),
(14, 3, 18, 'ghj gh jghjghj', 16, '', '2025-06-19 10:37:00', '2025-06-19 10:37:00', '', 'Minor NC', 'uploads/1750329420_Screenshot2024-02-16104350.png', 33, 25, '', 0, '');

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
(6, 10, 0, 'audit_team', 'submitted', 12, 25, 'werwe ', 20, '', '2025-06-16 12:38:16', '2025-06-16 12:38:16', '', 'Minor NC', 'uploads/1750077496_Screenshot2024-02-07144255.png', 29, 884, '', 0, ''),
(7, 13, 0, 'audit_team', 'submitted', 13, 25, 'adas sfsd  sdf sdf ', 18, '', '2025-06-18 11:09:15', '2025-06-18 11:09:15', '', 'Major NC', '', 0, 878, '', 0, ''),
(8, 12, 0, 'audit_team', 'submitted', 13, 25, ' dfdgdf gdf gsdg', 18, '', '2025-06-18 11:09:19', '2025-06-18 11:09:19', '', 'Minor NC', '', 0, 877, '', 0, ''),
(9, 13, 0, 'audit_team', 'submitted', 13, 25, 'cgfdgdzg', 18, '', '2025-06-18 11:11:33', '2025-06-18 11:11:33', '', 'Major NC', '', 0, 878, '', 0, ''),
(10, 13, 0, 'audit_team', 'submitted', 13, 25, 'sadsda ssa fasd ', 18, '', '2025-06-18 11:12:36', '2025-06-18 11:12:36', '', 'Major NC', 'uploads/1750245156_Screenshot2023-12-22153102.png', 32, 878, '', 0, ''),
(11, 13, 0, 'audit_team', 'submitted', 13, 25, 'fdgdfg dfg fdg sdfgd sf', 18, '', '2025-06-18 11:14:07', '2025-06-18 11:14:07', '', 'Major NC', '', 0, 878, '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `audit_plans`
--

CREATE TABLE `audit_plans` (
  `audit_id` int(11) NOT NULL,
  `audit_title` varchar(255) DEFAULT NULL,
  `audit_type` int(11) DEFAULT NULL,
  `audit_scope` text DEFAULT NULL,
  `audit_criteria` text DEFAULT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_poc` int(11) NOT NULL,
  `planned_start_date` date DEFAULT NULL,
  `planned_end_date` date DEFAULT NULL,
  `auto_calculated_duration` int(11) DEFAULT NULL,
  `lead_auditor` int(11) DEFAULT NULL,
  `audit_team` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `audit_plan_status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_by_company_id` int(11) NOT NULL,
  `row_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `row_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `actual_start_date` datetime DEFAULT NULL,
  `actual_end_date` datetime DEFAULT NULL,
  `actual_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_plans`
--

INSERT INTO `audit_plans` (`audit_id`, `audit_title`, `audit_type`, `audit_scope`, `audit_criteria`, `department_name`, `department_poc`, `planned_start_date`, `planned_end_date`, `auto_calculated_duration`, `lead_auditor`, `audit_team`, `Comments`, `audit_plan_status`, `created_by`, `created_by_company_id`, `row_created_at`, `row_updated_at`, `actual_start_date`, `actual_end_date`, `actual_duration`) VALUES
(1, 'Audit title 1', 0, 'sc1', 'criteria1', 'fghfhfghfg dept', 0, '2025-05-01', '2025-05-31', NULL, 1, NULL, NULL, 'APPROVED', 0, 0, '2025-05-09 07:14:57', '2025-05-09 07:14:57', NULL, NULL, 0),
(2, 'Audit Plan 100', 2, 'Basics', 'Basics', '1', 0, '2025-05-31', '2025-06-28', 0, 18, '16,17', '', 'APPROVED->SCHEDULED', 16, 7, '2025-05-19 09:42:56', '2025-05-19 09:42:56', NULL, NULL, 0),
(3, 'Audit Plan 1001', 2, 'Basics', 'Basics', '2', 0, '2025-06-11', '2025-06-30', 0, 0, '', '', '', 16, 7, '2025-06-09 07:11:43', '2025-06-09 07:11:43', NULL, NULL, 0),
(4, 'Audit Plan 1001', 2, 'Basics', 'Basics', '1', 0, '2025-06-11', '2025-07-03', 0, 18, '16,17', '', 'APPROVED->SCHEDULED', 16, 7, '2025-06-09 07:41:46', '2025-06-09 07:41:46', NULL, NULL, 0),
(5, 'MEP Audit Q2- JUNE 2025', 1, 'Basics', 'Basics', '1', 17, '2025-06-14', '2025-07-12', NULL, 20, '19,20', '', 'APPROVED->SCHEDULED', 16, 7, '2025-06-11 10:08:30', '2025-06-11 10:08:30', NULL, NULL, 0),
(6, 'Audit Plan 100gfhfgh', 2, 'fghdfgh', 'Basics', '1', 18, '2025-06-12', '2025-06-30', 0, 20, '19,20', '', 'APPROVED->SCHEDULED', 20, 7, '2025-06-11 12:48:48', '2025-06-11 12:48:48', NULL, NULL, 0),
(7, 'fhdf', 2, 'Basics', 'dfgfdg', '1', 17, '2025-06-11', '2025-06-24', 0, 20, '20,16', '', 'APPROVED->SCHEDULED', 20, 7, '2025-06-12 09:58:03', '2025-06-12 09:58:03', NULL, NULL, 0),
(8, 'dsfsdf', 2, 'sdfsdf', 'dsfsdfsdf', '1', 17, '2025-06-14', '2025-07-12', 7, 20, '18,19,20', '', 'APPROVED->SCHEDULED', 20, 7, '2025-06-12 10:04:16', '2025-06-12 10:04:16', NULL, NULL, 0),
(9, 'Audit Plan 100dfg dg dfg dfg', 2, 'Basics fdg ', 'df gdf ', '1', 17, '2025-06-14', '2025-07-12', 7, 20, '19', '', '', 20, 7, '2025-06-12 10:06:07', '2025-06-12 10:06:07', NULL, NULL, 0),
(10, 'Audit Plan 100 sdf sdf sdg dgdf', 2, 'Basics dfg df', ' dgd fgd fg', '1', 17, '2025-06-20', '2025-07-05', 7, 20, '18', '', '', 20, 7, '2025-06-12 10:08:13', '2025-06-12 10:08:13', NULL, NULL, 0),
(11, 'MEP Audit Q2- JUNE 2025', 3, 'Basics', 'Basics', '1', 16, '2025-06-20', '2025-07-12', 22, 18, '19,20', '', 'APPROVED->SCHEDULED', 16, 7, '2025-06-18 09:13:56', '2025-06-18 09:13:56', NULL, NULL, 0),
(12, 'MEP Audit Q2- JUNE 2025 123', 2, 'fghdfgh', 'sf s', '1', 18, '2025-06-28', '2025-07-12', 14, 18, '19,20', '', 'APPROVED->SCHEDULED', 16, 7, '2025-06-18 09:46:08', '2025-06-18 09:46:08', NULL, NULL, 0),
(13, 'Audit Plan 100', 2, 'Basics fdg ', 'sf s', '1', 18, '2025-06-25', '2025-07-05', 10, 16, '19', '', '', 16, 7, '2025-06-25 09:41:52', '2025-06-25 09:41:52', NULL, NULL, 0),
(14, 'dsdf', 2, 'Basics', 'Basics', '1', 18, '2025-06-25', '2025-07-05', 10, 16, '18', '', '', 16, 7, '2025-06-25 09:43:21', '2025-06-25 09:43:21', NULL, NULL, 0),
(15, 'dsfsdf', 2, 'Basics dfg df', ' dgd fgd fg', '1', 16, '2025-06-25', '2025-06-30', 5, 16, '16', '', 'APPROVED', 16, 7, '2025-06-25 09:46:03', '2025-06-25 09:46:03', NULL, NULL, 0),
(16, '', 0, '', '', '', 0, '0000-00-00', '0000-00-00', 0, 0, '', '', '', 16, 7, '2025-06-25 09:47:06', '2025-06-25 09:47:06', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `audit_report_layouts`
--

CREATE TABLE `audit_report_layouts` (
  `id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `file_path` text NOT NULL,
  `header_text` text NOT NULL,
  `footer_text` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_report_layouts`
--

INSERT INTO `audit_report_layouts` (`id`, `file_name`, `file_path`, `header_text`, `footer_text`, `created_at`) VALUES
(1, '1745004863_Screenshot1.png', 'uploads/cover_pages/1745004863_Screenshot1.png', '<p>;ldgd</p>', '<p>fdsg</p>', '2025-04-18 19:34:23');

-- --------------------------------------------------------

--
-- Table structure for table `audit_types`
--

CREATE TABLE `audit_types` (
  `audit_type_id` int(11) NOT NULL,
  `audit_type_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_types`
--

INSERT INTO `audit_types` (`audit_type_id`, `audit_type_name`, `created_at`, `updated_at`) VALUES
(1, 'safety', '2025-05-19 06:35:45', '2025-05-19 06:35:45'),
(2, 'design', '2025-05-19 06:41:18', '2025-05-19 06:41:18'),
(3, 'quality', '2025-05-19 06:41:28', '2025-05-19 06:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `audit_workflow_logs`
--

CREATE TABLE `audit_workflow_logs` (
  `id` int(11) NOT NULL,
  `audit_id` int(11) NOT NULL,
  `stage` enum('audit_team','audit_lead','auditee') NOT NULL,
  `action` enum('submitted','approved','rejected','commented') NOT NULL,
  `actor_id` int(11) NOT NULL,
  `actor_role` enum('team','lead','auditee') NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `company_name`, `created_at`, `updated_at`) VALUES
(1, 'avc', '2025-05-16 11:43:37', '2025-05-16 11:43:37'),
(2, 'adb', '2025-05-16 11:45:34', '2025-05-16 11:45:34'),
(3, 'trk', '2025-05-16 12:00:43', '2025-05-16 12:00:43'),
(4, 'qwe', '2025-05-16 12:00:59', '2025-05-16 12:00:59'),
(5, 'sdf', '2025-05-16 12:01:37', '2025-05-16 12:01:37'),
(6, 'yuj', '2025-05-16 12:01:45', '2025-05-16 12:01:45'),
(7, 'Inventruck', '2025-05-19 08:35:17', '2025-05-19 08:35:17');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_company_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_company_id`, `created_by`, `created_at`, `updated_at`, `updated_by`, `status`) VALUES
(1, 'mep', 0, 0, '2025-05-19 06:33:51', '2025-05-19 06:33:51', 0, 1),
(2, 'arche', 0, 0, '2025-05-19 06:33:55', '2025-05-19 06:33:55', 16, 1),
(3, 'Audit', 7, 16, '2025-06-11 09:49:43', '2025-06-11 09:49:43', 0, 1),
(4, 'Finance', 7, 16, '2025-06-23 11:37:17', '2025-06-23 11:37:17', 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `forms_answer_versions`
--

CREATE TABLE `forms_answer_versions` (
  `id` int(11) NOT NULL,
  `audit_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `submitted_by` int(11) NOT NULL,
  `role` enum('team','lead','auditee') NOT NULL,
  `stage` enum('audit_team','audit_lead','auditee') NOT NULL,
  `version` int(11) NOT NULL,
  `version_group_id` int(11) NOT NULL,
  `is_latest` tinyint(1) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13, 17, 70, 72, 'Option 1 rewret ert ertew ert er', '86', '2025-04-24 12:00:28'),
(14, 2, 2, 33, 'sample answer 123', '', '2025-05-26 12:46:27'),
(15, 2, 2, 33, 'sample answer 123', '', '2025-05-29 11:10:41'),
(16, 8, 18, 24, 'pass_fail', '', '2025-06-11 05:04:44'),
(17, 8, 18, 25, 'Option 3', '18', '2025-06-11 05:04:44'),
(18, 8, 18, 26, '[&#34;Answer 1&#34;,&#34;Answer 2&#34;]', '19, 20', '2025-06-11 05:04:44'),
(19, 10, 36, 849, 'Pass', '', '2025-06-12 05:20:46'),
(20, 10, 36, 850, 'dsfsdfsdf', '', '2025-06-12 05:20:46'),
(21, 12, 25, 876, 'True', '', '2025-06-13 08:47:13'),
(22, 12, 25, 877, 'Q2 answer ', '', '2025-06-13 08:47:13'),
(23, 12, 25, 878, '323', '', '2025-06-13 08:47:13'),
(24, 12, 25, 879, 'q4 Option 2', '806', '2025-06-13 08:47:13'),
(25, 12, 25, 880, 'q5 Option 1', '808', '2025-06-13 08:47:13'),
(26, 12, 25, 881, '[&#34;q6 Answer 2&#34;]', '812', '2025-06-13 08:47:13'),
(27, 12, 25, 882, '2025-06-28', '', '2025-06-13 08:47:13'),
(28, 12, 25, 883, 'Fail', '', '2025-06-13 08:47:13'),
(29, 12, 25, 884, 'No', '', '2025-06-13 08:47:13'),
(30, 11, 19, 717, 'q5 Option 1', '736', '2025-06-18 08:30:36'),
(31, 11, 19, 723, 'q5 Option 1', '746', '2025-06-18 08:30:36'),
(32, 1, 2, 33, 'fasdasd', '', '2025-06-18 08:34:16'),
(33, 13, 25, 876, 'True', '', '2025-06-18 11:08:22'),
(34, 13, 25, 877, 'Asnwer of q2', '', '2025-06-18 11:08:22'),
(35, 13, 25, 878, '33', '', '2025-06-18 11:08:22'),
(36, 13, 25, 880, 'q5 Option 1', '808', '2025-06-18 11:08:22'),
(37, 13, 25, 881, '[&#34;q6 Answer 2&#34;,&#34;q6 Answer 3&#34;]', '812, 813', '2025-06-18 11:08:22'),
(38, 13, 25, 882, '2025-06-28', '', '2025-06-18 11:08:22'),
(39, 13, 25, 883, 'Fail', '', '2025-06-18 11:08:22'),
(40, 13, 25, 884, 'No', '', '2025-06-18 11:08:22'),
(41, 3, 18, 25, 'Option 1', '16', '2025-06-19 10:37:03'),
(42, 3, 18, 26, '[&#34;Answer 1&#34;]', '19', '2025-06-19 10:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `form_question_wise_status_log`
--

CREATE TABLE `form_question_wise_status_log` (
  `id` int(11) NOT NULL,
  `scheduled_audit_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `remark` text NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '  Title', '  Title ', 'safety', 1, '2025-04-02 16:10:34', '2025-05-26 08:43:31'),
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
(18, '  Title form 19', '  Title desc', 'safety', 1, '2025-04-02 16:32:15', '2025-05-09 01:26:06'),
(19, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:10:20', '2025-06-11 07:04:30'),
(20, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(21, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(22, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(23, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(24, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(25, 'MEP Safety Audit Template Q2 - June 25', 'MEP Safety Audit Template Q2 - June 25', 'sample type', 1, '2025-06-11 10:16:16', '2025-06-13 03:47:16'),
(26, 'Sample 2', 'Sample 2', 'sample type', 1, '2025-06-11 10:22:41', '2025-06-11 06:52:55'),
(27, 'Sample 2', 'Sample 2', 'sample type', 1, '2025-06-11 10:22:58', '2025-06-11 10:22:58'),
(28, 'Sample 3', 'Sample 3', 'sample type', 1, '2025-06-11 10:23:41', '2025-06-11 06:53:50'),
(29, 'Sample 4', 'Sample 4', 'sample type', 1, '2025-06-11 10:29:12', '2025-06-11 06:59:47'),
(30, 'Sample 5', 'Sample 5', 'sample type', 1, '2025-06-11 11:28:53', '2025-06-11 07:59:13'),
(31, 'Sample 6', 'Sample 6', 'sample type', 1, '2025-06-11 11:29:27', '2025-06-11 08:03:09'),
(32, 'Sample 7', 'Sample 7', 'sample type', 1, '2025-06-11 11:34:53', '2025-06-11 08:05:17'),
(33, 'Sample 8', 'Sample 8', 'sample type', 1, '2025-06-11 11:38:57', '2025-06-11 08:11:05'),
(34, '', '', 'sample type', 1, '2025-06-11 11:43:18', '2025-06-11 11:43:18'),
(35, 'Sample 9', 'Sample 9', 'sample type', 1, '2025-06-11 11:43:34', '2025-06-11 08:13:51'),
(36, 'Sample 2fdg', 'Sample 2fdg', 'sample type', 1, '2025-06-11 12:17:13', '2025-06-12 03:12:04');

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
(16, 25, 18, 'Option 1', 1, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(17, 25, 18, 'Option 2', 2, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(18, 25, 18, 'Option 3', 3, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(19, 26, 18, 'Answer 1', 1, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(20, 26, 18, 'Answer 2', 2, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(21, 26, 18, 'Answer 3', 3, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(663, 625, 20, 'q4 option1', 1, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(664, 625, 20, 'q4 Option 2', 2, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(665, 625, 20, 'q4 Option 3', 3, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(666, 626, 20, 'q5 Option 1', 1, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(667, 626, 20, 'q5 Option 2', 2, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(668, 626, 20, 'q5 Option 3', 3, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(669, 627, 20, 'q6 Answer 1', 1, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(670, 627, 20, 'q6 Answer 2', 2, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(671, 627, 20, 'q6 Answer 3', 3, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(672, 627, 20, 'q6 Answer 4', 4, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(673, 634, 21, 'q4 option1', 1, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(674, 634, 21, 'q4 Option 2', 2, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(675, 634, 21, 'q4 Option 3', 3, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(676, 635, 21, 'q5 Option 1', 1, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(677, 635, 21, 'q5 Option 2', 2, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(678, 635, 21, 'q5 Option 3', 3, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(679, 636, 21, 'q6 Answer 1', 1, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(680, 636, 21, 'q6 Answer 2', 2, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(681, 636, 21, 'q6 Answer 3', 3, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(682, 636, 21, 'q6 Answer 4', 4, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(683, 643, 22, 'q4 option1', 1, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(684, 643, 22, 'q4 Option 2', 2, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(685, 643, 22, 'q4 Option 3', 3, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(686, 644, 22, 'q5 Option 1', 1, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(687, 644, 22, 'q5 Option 2', 2, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(688, 644, 22, 'q5 Option 3', 3, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(689, 645, 22, 'q6 Answer 1', 1, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(690, 645, 22, 'q6 Answer 2', 2, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(691, 645, 22, 'q6 Answer 3', 3, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(692, 645, 22, 'q6 Answer 4', 4, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(693, 652, 23, 'q4 option1', 1, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(694, 652, 23, 'q4 Option 2', 2, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(695, 652, 23, 'q4 Option 3', 3, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(696, 653, 23, 'q5 Option 1', 1, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(697, 653, 23, 'q5 Option 2', 2, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(698, 653, 23, 'q5 Option 3', 3, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(699, 654, 23, 'q6 Answer 1', 1, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(700, 654, 23, 'q6 Answer 2', 2, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(701, 654, 23, 'q6 Answer 3', 3, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(702, 654, 23, 'q6 Answer 4', 4, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(703, 661, 24, 'q4 option1', 1, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(704, 661, 24, 'q4 Option 2', 2, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(705, 661, 24, 'q4 Option 3', 3, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(706, 662, 24, 'q5 Option 1', 1, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(707, 662, 24, 'q5 Option 2', 2, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(708, 662, 24, 'q5 Option 3', 3, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(709, 663, 24, 'q6 Answer 1', 1, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(710, 663, 24, 'q6 Answer 2', 2, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(711, 663, 24, 'q6 Answer 3', 3, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(712, 663, 24, 'q6 Answer 4', 4, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(736, 717, 19, 'q5 Option 1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(737, 717, 19, 'q5 Option 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(738, 717, 19, 'q5 Option 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(739, 721, 19, 'q4 option1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(740, 722, 19, 'q6 Answer 1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(741, 721, 19, 'q4 Option 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(742, 722, 19, 'q6 Answer 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(743, 721, 19, 'q4 Option 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(744, 722, 19, 'q6 Answer 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(745, 722, 19, 'q6 Answer 4', 4, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(746, 723, 19, 'q5 Option 1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(747, 723, 19, 'q5 Option 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(748, 724, 19, 'Option 1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(749, 723, 19, 'q5 Option 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(750, 724, 19, 'Option 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(751, 724, 19, 'Option 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(752, 725, 19, 'q6 Answer 1', 1, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(753, 725, 19, 'q6 Answer 2', 2, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(754, 725, 19, 'q6 Answer 3', 3, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(755, 725, 19, 'q6 Answer 4', 4, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(780, 857, 36, 'true', 1, '2025-06-12 06:42:04', '2025-06-12 06:42:04'),
(804, 876, 25, 'true', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(805, 879, 25, 'q4 option1', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(806, 879, 25, 'q4 Option 2', 2, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(807, 879, 25, 'q4 Option 3', 3, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(808, 880, 25, 'q5 Option 1', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(809, 880, 25, 'q5 Option 2', 2, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(810, 880, 25, 'q5 Option 3', 3, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(811, 881, 25, 'q6 Answer 1', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(812, 881, 25, 'q6 Answer 2', 2, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(813, 881, 25, 'q6 Answer 3', 3, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(814, 881, 25, 'q6 Answer 4', 4, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(815, 883, 25, 'pass', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(816, 884, 25, 'yes', 1, '2025-06-13 07:17:16', '2025-06-13 07:17:16');

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
(24, 18, '  Question 5qw4e5', '  Description', 1, 'preconfigured', 0, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(25, 18, '  Question dshfjsf', '  Question', 2, 'single_select', 0, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(26, 18, 'multi select ', 'dfgfdgdfgdfg', 3, 'multi_select', 0, '2025-05-09 04:56:06', '2025-05-09 04:56:06'),
(33, 2, 'Sample Question 1', 'Sample Question 1 desc', 1, 'text', 0, '2025-05-26 12:13:31', '2025-05-26 12:13:31'),
(622, 20, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(623, 20, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(624, 20, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(625, 20, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(626, 20, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(627, 20, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(628, 20, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(629, 20, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(630, 20, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:15:59', '2025-06-11 10:15:59'),
(631, 21, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(632, 21, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(633, 21, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(634, 21, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(635, 21, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(636, 21, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(637, 21, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(638, 21, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(639, 21, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:16:02', '2025-06-11 10:16:02'),
(640, 22, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(641, 22, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(642, 22, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(643, 22, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(644, 22, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(645, 22, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(646, 22, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(647, 22, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(648, 22, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:16:05', '2025-06-11 10:16:05'),
(649, 23, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(650, 23, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(651, 23, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(652, 23, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(653, 23, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(654, 23, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(655, 23, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(656, 23, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(657, 23, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:16:10', '2025-06-11 10:16:10'),
(658, 24, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(659, 24, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(660, 24, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(661, 24, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(662, 24, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(663, 24, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(664, 24, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(665, 24, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(666, 24, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:16:14', '2025-06-11 10:16:14'),
(682, 26, 'Sample 2', 'Sample 2', 1, 'text', 0, '2025-06-11 10:22:55', '2025-06-11 10:22:55'),
(683, 27, 'Sample 2', 'Sample 2', 1, 'text', 0, '2025-06-11 10:22:58', '2025-06-11 10:22:58'),
(689, 28, 'Sample 3', 'Sample 3', 1, 'text', 0, '2025-06-11 10:23:50', '2025-06-11 10:23:50'),
(702, 29, 'Sample 4', 'Sample 4', 1, 'preconfigured', 0, '2025-06-11 10:29:47', '2025-06-11 10:29:47'),
(703, 29, 'Sample 5', 'Sample 5', 2, 'preconfigured', 0, '2025-06-11 10:29:47', '2025-06-11 10:29:47'),
(717, 19, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(718, 19, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(719, 19, 'q2', 'q2', 2, 'text', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(720, 19, 'q3', 'q3', 3, 'number', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(721, 19, 'q4', 'q4', 4, 'single_select', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(722, 19, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(723, 19, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(724, 19, 'q7', 'q7 date', 7, 'single_select', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(725, 19, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(726, 19, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(727, 19, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(728, 19, 'q7', 'q7 date', 7, 'date', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(729, 19, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(730, 19, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-11 10:34:31', '2025-06-11 10:34:31'),
(738, 30, 'Sample 5', 'Sample 5', 1, 'preconfigured', 0, '2025-06-11 11:29:13', '2025-06-11 11:29:13'),
(760, 31, 'Sample 6', 'Sample 6', 1, 'preconfigured', 0, '2025-06-11 11:33:09', '2025-06-11 11:33:09'),
(761, 31, 'Sample 6', 'Sample 6', 2, 'dropdown', 0, '2025-06-11 11:33:09', '2025-06-11 11:33:09'),
(772, 32, 'Sample 7', 'Sample 7', 1, 'preconfigured', 0, '2025-06-11 11:35:17', '2025-06-11 11:35:17'),
(785, 33, 'Sample 8', 'Sample 8', 1, 'preconfigured', 0, '2025-06-11 11:41:05', '2025-06-11 11:41:05'),
(786, 33, 'Sample 8', 'Sample 8', 2, 'preconfigured', 0, '2025-06-11 11:41:05', '2025-06-11 11:41:05'),
(787, 34, '', '', 1, 'text', 0, '2025-06-11 11:43:18', '2025-06-11 11:43:18'),
(800, 35, 'Sample 9', 'Sample 9', 1, 'preconfigured', 0, '2025-06-11 11:43:51', '2025-06-11 11:43:51'),
(801, 35, 'Sample 9', 'Sample 9', 2, 'preconfigured', 0, '2025-06-11 11:43:51', '2025-06-11 11:43:51'),
(857, 36, 'Is Helmet availabale ?', 'Is Helmet availabale ?', 1, 'preconfigured', 0, '2025-06-12 06:42:04', '2025-06-12 06:42:04'),
(858, 36, 'Sample 2', 'fgfdgfdgfdg', 2, 'text', 0, '2025-06-12 06:42:04', '2025-06-12 06:42:04'),
(876, 25, 'Helmet ?', 'Is helmet is wearing ? true or false', 1, 'preconfigured', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(877, 25, 'q2', 'q2', 2, 'text', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(878, 25, 'q3', 'q3', 3, 'number', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(879, 25, 'q4', 'q4', 4, 'single_select', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(880, 25, 'q5', 'q5', 5, 'dropdown', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(881, 25, 'q6', 'q6', 6, 'multi_select', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(882, 25, 'q7', 'q7 date', 7, 'date', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(883, 25, 'q8 ', 'q8 pre conf pass or fail', 8, 'preconfigured', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16'),
(884, 25, 'q9', 'q9 pre conf yes or no', 9, 'preconfigured', 0, '2025-06-13 07:17:16', '2025-06-13 07:17:16');

-- --------------------------------------------------------

--
-- Table structure for table `process_master`
--

CREATE TABLE `process_master` (
  `process_id` int(11) NOT NULL,
  `process_name` varchar(255) NOT NULL,
  `department_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `process_master`
--

INSERT INTO `process_master` (`process_id`, `process_name`, `department_id`, `company_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status`) VALUES
(1, '', 0, 7, 16, 16, '2025-06-23 12:57:55', '2025-06-23 12:57:55', 1),
(2, 'Arch P2', 2, 7, 16, 16, '2025-06-23 14:35:29', '2025-06-23 14:35:29', 0),
(3, 'MEP P1', 1, 7, 16, 0, '2025-06-23 14:36:42', '2025-06-23 14:36:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2025-05-16 11:56:35', '2025-05-16 11:56:35'),
(2, 'audit lead', '2025-05-16 11:58:30', '2025-05-16 11:58:30'),
(3, 'viewer', '2025-05-16 11:59:08', '2025-05-16 11:59:08'),
(4, 'editor', '2025-05-16 11:59:47', '2025-05-16 11:59:47');

-- --------------------------------------------------------

--
-- Table structure for table `scheduled_audits`
--

CREATE TABLE `scheduled_audits` (
  `scheduled_id` int(11) NOT NULL,
  `audit_id` int(11) NOT NULL,
  `checklist_id` int(11) NOT NULL,
  `planned_start_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `planned_end_date` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `auto_calculated_duration` int(11) DEFAULT NULL,
  `audit_process` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `scheduled_audit_status` varchar(50) NOT NULL,
  `row_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `row_updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `actual_start_date` datetime DEFAULT NULL,
  `actual_end_date` datetime DEFAULT NULL,
  `actual_duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduled_audits`
--

INSERT INTO `scheduled_audits` (`scheduled_id`, `audit_id`, `checklist_id`, `planned_start_date`, `planned_end_date`, `auto_calculated_duration`, `audit_process`, `scheduled_audit_status`, `row_created_at`, `row_updated_at`, `actual_start_date`, `actual_end_date`, `actual_duration`) VALUES
(1, 2, 2, '2025-05-31', '2025-06-28', 28, '1', 'SCHEDULED', '2025-05-26 09:33:03', '2025-05-26 09:33:03', NULL, NULL, 0),
(2, 2, 2, '2025-05-31', '2025-06-28', 28, '3', 'submitted', '2025-05-26 11:54:13', '2025-05-26 11:54:13', NULL, NULL, 0),
(3, 2, 18, '2025-05-31', '2025-06-28', 28, '2', 'SCHEDULED', '2025-05-27 12:48:01', '2025-05-27 12:48:01', NULL, NULL, 0),
(4, 4, 18, '2025-06-11', '2025-07-03', 22, '1', 'SCHEDULED', '2025-06-09 08:32:10', '2025-06-09 08:32:10', NULL, NULL, 0),
(5, 4, 18, '2025-06-11', '2025-07-03', 22, '1', 'SCHEDULED', '2025-06-09 08:34:35', '2025-06-09 08:34:35', NULL, NULL, 0),
(6, 4, 0, '2025-06-11', '2025-07-03', 22, '1', 'SCHEDULED', '2025-06-09 08:34:55', '2025-06-09 08:34:55', NULL, NULL, 0),
(7, 4, 0, '2025-06-11', '2025-07-03', 22, '0', 'SCHEDULED', '2025-06-09 08:37:19', '2025-06-09 08:37:19', NULL, NULL, 0),
(8, 4, 18, '2025-06-11', '2025-07-03', 22, '1', 'SCHEDULED', '2025-06-09 08:41:09', '2025-06-09 08:41:09', NULL, NULL, 0),
(9, 5, 35, '2025-06-14', '2025-07-12', 28, '1', 'SCHEDULED', '2025-06-11 11:46:00', '2025-06-11 11:46:00', NULL, NULL, 0),
(10, 6, 36, '2025-06-12', '2025-06-30', 18, '1', 'SCHEDULED', '2025-06-11 12:49:02', '2025-06-11 12:49:02', NULL, NULL, 0),
(11, 7, 19, '2025-06-11', '2025-06-24', 13, '2', 'SCHEDULED', '2025-06-12 09:58:25', '2025-06-12 09:58:25', NULL, NULL, 0),
(12, 8, 25, '2025-06-14', '2025-07-12', 28, '1', 'SCHEDULED', '2025-06-12 10:04:31', '2025-06-12 10:04:31', NULL, NULL, 0),
(13, 12, 25, '2025-06-28', '2025-07-12', 14, '1', 'SCHEDULED', '2025-06-18 10:01:38', '2025-06-18 10:01:38', '2025-07-03 15:31:00', '2025-07-10 15:31:00', 7);

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

-- --------------------------------------------------------

--
-- Table structure for table `schedule_audit_status_log`
--

CREATE TABLE `schedule_audit_status_log` (
  `status_id` int(11) NOT NULL,
  `scheduled_audit_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `remarks` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_audit_status_log`
--

INSERT INTO `schedule_audit_status_log` (`status_id`, `scheduled_audit_id`, `status`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 0, '', NULL, 0, '2025-05-27 12:04:36', '2025-05-27 12:04:36'),
(2, 2, 'IN REVIEW', NULL, 18, '2025-05-27 12:26:38', '2025-05-27 12:26:38'),
(3, 2, 'IN REVIEW', NULL, 18, '2025-05-27 12:30:08', '2025-05-27 12:30:08'),
(4, 2, 'SUBMITTED', NULL, 16, '2025-05-29 11:30:34', '2025-05-29 11:30:34'),
(5, 2, 'APPROVED', NULL, 18, '2025-05-29 11:57:44', '2025-05-29 11:57:44'),
(6, 8, 'SUBMITTED', NULL, 16, '2025-06-11 05:04:44', '2025-06-11 05:04:44'),
(7, 8, 'IN REVIEW', NULL, 16, '2025-06-11 05:20:15', '2025-06-11 05:20:15'),
(8, 8, 'SUBMITTED', NULL, 16, '2025-06-11 06:26:22', '2025-06-11 06:26:22'),
(9, 10, 'SUBMITTED', NULL, 20, '2025-06-12 05:20:46', '2025-06-12 05:20:46'),
(10, 12, 'SUBMITTED', NULL, 20, '2025-06-13 08:47:13', '2025-06-13 08:47:13'),
(11, 12, 'IN REVIEW', NULL, 20, '2025-06-13 08:52:49', '2025-06-13 08:52:49'),
(12, 12, 'SUBMITTED', NULL, 20, '2025-06-13 08:53:16', '2025-06-13 08:53:16'),
(13, 11, 'SUBMITTED', NULL, 16, '2025-06-18 08:30:36', '2025-06-18 08:30:36'),
(14, 1, 'SUBMITTED', NULL, 16, '2025-06-18 08:34:16', '2025-06-18 08:34:16'),
(15, 11, 'APPROVED', NULL, 16, '2025-06-18 08:45:23', '2025-06-18 08:45:23'),
(16, 13, 'SUBMITTED', NULL, 18, '2025-06-18 11:08:22', '2025-06-18 11:08:22'),
(17, 13, 'POC REJECTED', NULL, 18, '2025-06-18 12:12:01', '2025-06-18 12:12:01'),
(18, 13, 'POC REJECTED', NULL, 18, '2025-06-18 12:12:22', '2025-06-18 12:12:22'),
(19, 13, 'POC REJECTED', NULL, 18, '2025-06-18 12:13:18', '2025-06-18 12:13:18'),
(20, 13, 'POC REJECTED', NULL, 18, '2025-06-18 12:13:36', '2025-06-18 12:13:36'),
(21, 13, 'SUBMITTED', NULL, 16, '2025-06-19 04:41:50', '2025-06-19 04:41:50'),
(22, 13, 'APPROVED', NULL, 16, '2025-06-19 04:49:54', '2025-06-19 04:49:54'),
(23, 13, 'POC APPROVED', NULL, 18, '2025-06-19 04:57:15', '2025-06-19 04:57:15'),
(24, 3, 'SUBMITTED', NULL, 16, '2025-06-19 10:37:03', '2025-06-19 10:37:03');

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
(13, '1749617129_Screenshot2024-01-03164049.png', 'uploads/1749617129_Screenshot2024-01-03164049.png', '2025-06-11 04:45:29'),
(14, '1749804368_Screenshot2024-02-12100426.png', 'uploads/1749804368_Screenshot2024-02-12100426.png', '2025-06-13 08:46:08'),
(15, '1749804408_Screenshot2024-02-29182149.png', 'uploads/1749804408_Screenshot2024-02-29182149.png', '2025-06-13 08:46:48'),
(16, '1749804426_Screenshot2024-04-03095811.png', 'uploads/1749804426_Screenshot2024-04-03095811.png', '2025-06-13 08:47:06'),
(17, '1750074205_Screenshot2023-12-22153102.png', 'uploads/1750074205_Screenshot2023-12-22153102.png', '2025-06-16 11:43:25'),
(18, '1750074507_Screenshot2024-02-12100426.png', 'uploads/1750074507_Screenshot2024-02-12100426.png', '2025-06-16 11:48:27'),
(19, '1750074520_Screenshot2024-02-29182149.png', 'uploads/1750074520_Screenshot2024-02-29182149.png', '2025-06-16 11:48:40'),
(20, '1750074554_Screenshot2024-02-12100426.png', 'uploads/1750074554_Screenshot2024-02-12100426.png', '2025-06-16 11:49:14'),
(21, '1750074718_Screenshot2023-12-22153102.png', 'uploads/1750074718_Screenshot2023-12-22153102.png', '2025-06-16 11:51:58'),
(22, '1750074837_Screenshot2024-02-29182149.png', 'uploads/1750074837_Screenshot2024-02-29182149.png', '2025-06-16 11:53:57'),
(23, '1750074891_Screenshot2024-02-29182149.png', 'uploads/1750074891_Screenshot2024-02-29182149.png', '2025-06-16 11:54:51'),
(24, '1750076032_Screenshot2023-12-22153102.png', 'uploads/1750076032_Screenshot2023-12-22153102.png', '2025-06-16 12:13:52'),
(25, '1750076041_Screenshot2023-12-22153102.png', 'uploads/1750076041_Screenshot2023-12-22153102.png', '2025-06-16 12:14:01'),
(26, '1750076044_Screenshot2023-12-22153102.png', 'uploads/1750076044_Screenshot2023-12-22153102.png', '2025-06-16 12:14:04'),
(27, '1750076135_Screenshot2023-12-22153102.png', 'uploads/1750076135_Screenshot2023-12-22153102.png', '2025-06-16 12:15:35'),
(28, '1750077414_Screenshot2024-02-29114731.png', 'uploads/1750077414_Screenshot2024-02-29114731.png', '2025-06-16 12:36:54'),
(29, '1750077496_Screenshot2024-02-07144255.png', 'uploads/1750077496_Screenshot2024-02-07144255.png', '2025-06-16 12:38:16'),
(30, '1750244876_Screenshot2023-12-22153102.png', 'uploads/1750244876_Screenshot2023-12-22153102.png', '2025-06-18 11:07:56'),
(31, '1750244890_Screenshot2024-02-16104350.png', 'uploads/1750244890_Screenshot2024-02-16104350.png', '2025-06-18 11:08:10'),
(32, '1750245156_Screenshot2023-12-22153102.png', 'uploads/1750245156_Screenshot2023-12-22153102.png', '2025-06-18 11:12:36'),
(33, '1750329420_Screenshot2024-02-16104350.png', 'uploads/1750329420_Screenshot2024-02-16104350.png', '2025-06-19 10:37:00');

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
(3, 16, 'basicuser', '9878987898', 'Basic User', 'basicuser@inventruck.in', '2025-07-16 11:01:58', 1),
(4, 17, 'basicuser2', '9878987899', 'Basic User 2', 'basicuser2@inventruck.in', '2025-06-25 06:29:58', 0),
(5, 18, 'audit_lead', '9878987897', 'Audit lead', 'audit_lead@inventruck.in', '2025-07-16 11:17:29', 1),
(6, 19, 'auditor1', '45435435436', 'Auditor 1', 'auditor1@inventruck.in', '2025-06-11 09:55:21', 1),
(7, 20, 'auditor2', '45435435422', 'Auditor 2', 'auditor2@inventruck.in', '2025-06-16 05:09:37', 1);

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
-- Indexes for table `audit_non_confirmity_master`
--
ALTER TABLE `audit_non_confirmity_master`
  ADD PRIMARY KEY (`nc_id`);

--
-- Indexes for table `audit_non_confirmity_remarks`
--
ALTER TABLE `audit_non_confirmity_remarks`
  ADD PRIMARY KEY (`nc_remark_id`);

--
-- Indexes for table `audit_plans`
--
ALTER TABLE `audit_plans`
  ADD PRIMARY KEY (`audit_id`);

--
-- Indexes for table `audit_report_layouts`
--
ALTER TABLE `audit_report_layouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audit_types`
--
ALTER TABLE `audit_types`
  ADD PRIMARY KEY (`audit_type_id`);

--
-- Indexes for table `audit_workflow_logs`
--
ALTER TABLE `audit_workflow_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`),
  ADD UNIQUE KEY `company_name_uniq` (`company_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `forms_answer_versions`
--
ALTER TABLE `forms_answer_versions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_answers`
--
ALTER TABLE `form_answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `form_question_wise_status_log`
--
ALTER TABLE `form_question_wise_status_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_templates`
--
ALTER TABLE `form_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form_template_answer_options`
--
ALTER TABLE `form_template_answer_options`
  ADD PRIMARY KEY (`option_id`);

--
-- Indexes for table `form_template_questions`
--
ALTER TABLE `form_template_questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `process_master`
--
ALTER TABLE `process_master`
  ADD PRIMARY KEY (`process_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `scheduled_audits`
--
ALTER TABLE `scheduled_audits`
  ADD PRIMARY KEY (`scheduled_id`);

--
-- Indexes for table `scheduled_inspections`
--
ALTER TABLE `scheduled_inspections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_audit_status_log`
--
ALTER TABLE `schedule_audit_status_log`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_users`
--
ALTER TABLE `application_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `audit_non_confirmity_master`
--
ALTER TABLE `audit_non_confirmity_master`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `audit_non_confirmity_remarks`
--
ALTER TABLE `audit_non_confirmity_remarks`
  MODIFY `nc_remark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `audit_plans`
--
ALTER TABLE `audit_plans`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `audit_report_layouts`
--
ALTER TABLE `audit_report_layouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audit_types`
--
ALTER TABLE `audit_types`
  MODIFY `audit_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `audit_workflow_logs`
--
ALTER TABLE `audit_workflow_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `forms_answer_versions`
--
ALTER TABLE `forms_answer_versions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_answers`
--
ALTER TABLE `form_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `form_question_wise_status_log`
--
ALTER TABLE `form_question_wise_status_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `form_templates`
--
ALTER TABLE `form_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `form_template_answer_options`
--
ALTER TABLE `form_template_answer_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=817;

--
-- AUTO_INCREMENT for table `form_template_questions`
--
ALTER TABLE `form_template_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=885;

--
-- AUTO_INCREMENT for table `process_master`
--
ALTER TABLE `process_master`
  MODIFY `process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scheduled_audits`
--
ALTER TABLE `scheduled_audits`
  MODIFY `scheduled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `scheduled_inspections`
--
ALTER TABLE `scheduled_inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule_audit_status_log`
--
ALTER TABLE `schedule_audit_status_log`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
