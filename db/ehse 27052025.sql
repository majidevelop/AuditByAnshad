-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2025 at 10:40 PM
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
  `roles` varchar(255) NOT NULL,
  `company_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application_users`
--

INSERT INTO `application_users` (`user_id`, `name`, `roles`, `company_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'test user 1', '[\"1\",\"2\"]', 0, 'user@acs.com', '3456', '2025-04-12 06:43:34', '2025-04-12 06:43:34'),
(2, 'test manager 1', '[\"1\",\"3\"]', 0, '0', '0', '2025-04-12 06:43:34', '2025-04-12 06:43:34'),
(5, 'basic user', '4,3', 2, 'basicuser@inventrucks.in', '7012092532', '2025-05-24 09:46:59', '2025-05-24 09:46:59'),
(6, 'Majid N', '4,3', 2, 'abhijithmohan4055@gmail.com', '7012092532', '2025-05-24 09:49:08', '2025-05-24 09:49:08');

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
  `planned_start_date` date DEFAULT NULL,
  `planned_end_date` date DEFAULT NULL,
  `auto_calculated_duration` int(11) DEFAULT NULL,
  `lead_auditor` int(11) DEFAULT NULL,
  `audit_team` text DEFAULT NULL,
  `Comments` text DEFAULT NULL,
  `created_by_company_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `audit_plan_status` varchar(20) NOT NULL,
  `row_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `row_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_plans`
--

INSERT INTO `audit_plans` (`audit_id`, `audit_title`, `audit_type`, `audit_scope`, `audit_criteria`, `department_name`, `planned_start_date`, `planned_end_date`, `auto_calculated_duration`, `lead_auditor`, `audit_team`, `Comments`, `created_by_company_id`, `created_by`, `audit_plan_status`, `row_created_at`, `row_updated_at`) VALUES
(1, 'Audit title 1', 0, 'sc1', 'criteria1', 'fghfhfghfg dept', '2025-05-01', '2025-05-31', NULL, 1, NULL, NULL, 2, 6, 'APPROVED', '2025-05-09 07:14:57', '2025-05-09 07:14:57'),
(2, 'Sample audit plan - title 1', 3, 'basics', 'basics', '', '2025-05-25', '2025-06-08', 0, 5, '6', '', 2, 6, 'APPROVED', '2025-05-24 11:57:09', '2025-05-24 11:57:09'),
(3, 'Sample audit plan - title 12', 2, 'basics', 'basics', '', '2025-05-29', '2025-05-31', 0, 5, '5,6', '', 2, 6, '', '2025-05-26 19:00:12', '2025-05-26 19:00:12'),
(4, 'Sample audit plan - title 1 majid', 1, 'basics', 'basics', '', '2025-05-29', '2025-06-08', 0, 6, '5,6', '', 2, 6, 'APPROVED', '2025-05-26 19:07:38', '2025-05-26 19:07:38'),
(5, 'Sample audit plan - title 1 majid 01', 2, 'basics', 'basics', '2', '2025-05-31', '2025-06-08', 0, 6, '5,6', '', 2, 6, 'APPROVED', '2025-05-26 19:13:30', '2025-05-26 19:13:30'),
(6, 'Sample audit plan - majid test 01', 2, 'basics', 'basics', '2', '2025-05-24', '2025-06-08', 0, 6, '5', '', 2, 6, 'APPROVED->SCHEDULED', '2025-05-26 19:23:21', '2025-05-26 19:23:21');

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
  `audit_type_company_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit_types`
--

INSERT INTO `audit_types` (`audit_type_id`, `audit_type_name`, `audit_type_company_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Sample Audit Type 1', 2, 6, '2025-05-24 10:15:50', '2025-05-24 10:15:50'),
(2, 'Sample Audit Type 2', 2, 6, '2025-05-24 10:47:19', '2025-05-24 10:47:19'),
(3, 'Sample Audit Type 3', 2, 6, '2025-05-24 10:53:19', '2025-05-24 10:53:19');

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
(6, 'yuj', '2025-05-16 12:01:45', '2025-05-16 12:01:45');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`, `department_company_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'MEP', 0, 0, '2025-05-24 11:02:55', '2025-05-24 11:02:55'),
(2, 'ARCH', 0, 0, '2025-05-24 11:03:00', '2025-05-24 11:03:00'),
(3, 'ACCOUNTS', 2, 6, '2025-05-24 11:03:05', '2025-05-24 11:03:05'),
(4, 'HR', 2, 6, '2025-05-24 11:09:39', '2025-05-24 11:09:39');

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
(14, 12, 18, 24, 'true_false', '', '2025-05-26 19:32:56'),
(15, 12, 18, 25, 'Option 2', '17', '2025-05-26 19:32:56'),
(16, 12, 18, 26, '[&#34;Answer 3&#34;]', '21', '2025-05-26 19:32:56');

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
(18, '  Title form 19', '  Title desc', 'safety', 1, '2025-04-02 16:32:15', '2025-05-09 01:26:06');

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
(21, 26, 18, 'Answer 3', 3, '2025-05-09 04:56:06', '2025-05-09 04:56:06');

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
(26, 18, 'multi select ', 'dfgfdgdfgdfg', 3, 'multi_select', 0, '2025-05-09 04:56:06', '2025-05-09 04:56:06');

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
  `scheduled_audit_status` varchar(255) NOT NULL,
  `row_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `row_updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scheduled_audits`
--

INSERT INTO `scheduled_audits` (`scheduled_id`, `audit_id`, `checklist_id`, `planned_start_date`, `planned_end_date`, `auto_calculated_duration`, `audit_process`, `scheduled_audit_status`, `row_created_at`, `row_updated_at`) VALUES
(1, 0, 0, NULL, NULL, NULL, NULL, '', '2025-05-12 10:12:44', '2025-05-12 10:12:44'),
(2, 0, 0, NULL, NULL, NULL, NULL, '', '2025-05-12 10:14:46', '2025-05-12 10:14:46'),
(3, 0, 0, NULL, NULL, NULL, NULL, '', '2025-05-12 10:15:20', '2025-05-12 10:15:20'),
(4, 1, 1, '', '', NULL, '', '', '2025-05-12 10:18:53', '2025-05-12 10:18:53'),
(5, 1, 1, '2025-05-01', '2025-05-31', NULL, '', '', '2025-05-12 11:16:13', '2025-05-12 11:16:13'),
(6, 1, 1, '2025-05-01', '2025-05-31', NULL, '1', '', '2025-05-12 11:21:24', '2025-05-12 11:21:24'),
(7, 1, 1, '2025-05-01', '2025-05-31', 30, '0', 'SCHEDULED', '2025-05-12 11:23:28', '2025-05-12 11:23:28'),
(12, 6, 18, '2025-05-24', '2025-06-08', 15, '1', 'submitted', '2025-05-26 19:31:54', '2025-05-26 19:31:54');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `application_user_id` int(11) NOT NULL,
  `eid` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lastlog` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `application_user_id`, `eid`, `password`, `name`, `email`, `lastlog`) VALUES
(1, 0, 'user', 'pass', 'User', 'user@gmail.com', '2025-04-01 04:53:39'),
(2, 6, 'abhijithmohan4055', '7012092532', 'Majid N', 'abhijithmohan4055@gmail.com', '2025-05-24 10:06:34');

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
-- Indexes for table `form_answers`
--
ALTER TABLE `form_answers`
  ADD PRIMARY KEY (`answer_id`);

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
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `audit_plans`
--
ALTER TABLE `audit_plans`
  MODIFY `audit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `form_answers`
--
ALTER TABLE `form_answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `form_templates`
--
ALTER TABLE `form_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `form_template_answer_options`
--
ALTER TABLE `form_template_answer_options`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `form_template_questions`
--
ALTER TABLE `form_template_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scheduled_audits`
--
ALTER TABLE `scheduled_audits`
  MODIFY `scheduled_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `scheduled_inspections`
--
ALTER TABLE `scheduled_inspections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
