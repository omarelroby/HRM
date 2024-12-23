-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 13, 2023 at 04:17 AM
-- Server version: 8.0.24
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_of_days` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leave_id` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_lists`
--

CREATE TABLE `account_lists` (
  `id` bigint UNSIGNED NOT NULL,
  `account_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_balance` double NOT NULL DEFAULT '0',
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

CREATE TABLE `admin_payment_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `allowance_option` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowance_options`
--

CREATE TABLE `allowance_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `insurance_active` tinyint NOT NULL DEFAULT '0',
  `payroll_dispaly` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `branch_id` int NOT NULL,
  `department_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_employees`
--

CREATE TABLE `announcement_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `announcement_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appraisals`
--

CREATE TABLE `appraisals` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` int NOT NULL DEFAULT '0',
  `employee` int NOT NULL DEFAULT '0',
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appraisal_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_experience` int NOT NULL DEFAULT '0',
  `marketing` int NOT NULL DEFAULT '0',
  `administration` int NOT NULL DEFAULT '0',
  `professionalism` int NOT NULL DEFAULT '0',
  `integrity` int NOT NULL DEFAULT '0',
  `attendance` int NOT NULL DEFAULT '0',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remark_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `supported_date` date DEFAULT NULL,
  `amount` double NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assets_type_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets_types`
--

CREATE TABLE `assets_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_employees`
--

CREATE TABLE `attendance_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `in_company_range` tinyint DEFAULT NULL COMMENT '1:Yes, 0:No, null: Company does not check the location',
  `lat` decimal(10,7) DEFAULT NULL,
  `lon` decimal(10,7) DEFAULT NULL,
  `late` time DEFAULT NULL,
  `early_leaving` time DEFAULT NULL,
  `overtime` time DEFAULT NULL,
  `total_rest` time DEFAULT NULL,
  `delay_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `urgent_end_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image_clock_in` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_clock_out` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_movements`
--

CREATE TABLE `attendance_movements` (
  `id` bigint UNSIGNED NOT NULL,
  `start_movement_date` date DEFAULT NULL,
  `end_movement_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `award_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `gift` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `employee_id`, `award_type`, `date`, `gift`, `description`, `description_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '2', '2022-04-21', '1000', 'nv.snvknvkn', 'cknsklvcnlsnv', 2, '2022-04-26 09:35:38', '2022-04-26 09:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `award_types`
--

CREATE TABLE `award_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award_types`
--

INSERT INTO `award_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'award', 'مكأفاة', 18, '2022-04-26 09:31:16', '2022-04-26 09:31:16'),
(2, 'award', 'مكأفاة', 2, '2022-04-26 09:34:46', '2022-04-26 09:34:46'),
(3, 'TEST', 'TEST', 362, '2022-11-14 13:25:59', '2022-11-14 13:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Al Rajhi Bank', 'بنك الراجحى', 2, '2022-04-12 12:59:23', '2022-04-12 12:59:23'),
(2, 'Al Ahly Bank', 'بنك الأهلى', 2, '2022-04-12 12:59:23', '2022-04-12 12:59:23'),
(3, 'CIB', 'سى اى بى', 22, '2022-06-05 11:03:38', '2023-02-07 13:43:47'),
(4, 'Saudi National Bank', 'البنك الاهلي', 18, '2022-09-14 14:04:34', '2022-09-14 14:04:34'),
(5, 'AlRajhi Bank', 'بنك الراجحي', 18, '2022-09-14 14:05:04', '2022-09-14 14:05:04'),
(6, 'Bank AlBilad', 'بنك البلاد', 18, '2022-09-14 14:05:37', '2022-09-14 14:05:37'),
(7, 'Riyadh Bank', 'بنك الرياض', 18, '2022-09-14 14:06:17', '2022-09-14 14:06:17'),
(8, 'Banque Saudi Fransi', 'البنك الفرنسي', 18, '2022-09-17 15:42:27', '2022-09-17 15:42:27'),
(9, 'Alinma Bank', 'بنك الانماء', 18, '2022-09-17 15:43:07', '2022-09-17 15:43:07'),
(10, 'Cib', 'سى اى بى', 157, '2022-09-26 22:11:32', '2022-09-26 22:11:32'),
(11, 'SNB', 'البنك الاهلي', 21, '2022-10-04 14:53:32', '2022-10-04 14:55:24'),
(12, 'AL INMA', 'بنك الأنماء', 21, '2022-10-04 14:54:09', '2022-10-04 14:55:45'),
(13, 'RAJHI', 'بنك الراجحي', 21, '2022-10-04 14:55:06', '2022-10-04 14:55:06'),
(14, 'ARAB NATIONAL BANK', 'البنك العربي', 21, '2022-10-04 14:56:30', '2022-10-04 14:56:30'),
(15, 'SNB', 'البنك الاهلي', 19, '2022-10-07 16:14:58', '2022-10-07 16:14:58'),
(16, 'BANK ALRAJHI', 'بنك الراجحي', 19, '2022-10-07 16:15:25', '2022-10-07 16:15:25'),
(17, 'BANK ALINMA', 'بنك الأنماء', 19, '2022-10-07 16:16:01', '2022-10-07 16:16:01'),
(18, 'BANK ALRIYAD', 'بنك الرياض', 19, '2022-10-07 16:17:02', '2022-10-07 16:17:02'),
(19, 'SNB', 'البنك الاهلي', 362, '2022-10-23 09:06:19', '2022-10-23 09:06:19'),
(20, 'BANK ALINMA', 'بنك الأنماء', 362, '2022-10-23 09:06:41', '2022-10-23 09:06:41'),
(21, 'BANK ALRAJHI', 'بنك الراجحي', 362, '2022-10-23 09:07:31', '2022-10-23 09:07:31'),
(22, 'Saudi investment bank', 'البنك السعودي للاستثمار', 154, '2022-11-12 00:17:27', '2022-11-12 00:17:27'),
(23, 'Arab national bank', 'البنك العربي', 154, '2022-11-12 00:18:42', '2022-11-12 00:18:42'),
(24, 'Snb alahli', 'البنك الاهلي السعودي', 154, '2022-11-12 00:21:33', '2022-11-12 00:21:33'),
(25, 'Alrajhi bank', 'مصرف الراجحي', 154, '2022-11-12 00:42:40', '2022-11-12 00:42:40'),
(26, 'SNB', 'البنك الاهلي', 500, '2022-12-13 11:01:52', '2022-12-13 11:01:52'),
(27, 'BANK ALINMA', 'بنك الأنماء', 500, '2022-12-13 11:03:22', '2022-12-13 11:03:22'),
(28, 'BANK ALRIYAD', 'بنك الرياض', 500, '2022-12-13 11:04:11', '2022-12-13 11:04:11'),
(29, 'BANK ALRAJHI', 'بنك الراجحي', 500, '2022-12-13 11:11:15', '2022-12-13 11:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `employee_id`, `name`, `name_ar`, `lat`, `lon`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 13, 'FenTech', 'القطاع المالي التقني', '21.6023901', '39.1502068', 18, '2022-02-06 02:56:21', '2022-09-21 08:45:15'),
(4, 377, 'FenTech', 'Milli', '21.4873', '39.1813', 19, '2022-02-06 02:56:21', '2022-11-14 10:54:52'),
(5, NULL, 'cairo branch', 'القطاع المالي التقني', NULL, NULL, 20, '2022-02-20 14:36:32', '2022-02-20 14:36:32'),
(6, NULL, 'FenTech', 'القطاع المالي التقني', NULL, NULL, 21, '2022-02-06 02:56:21', '2022-02-08 14:35:50'),
(7, NULL, 'FinTech', 'القطاع المالي التقني', NULL, NULL, 22, '2022-02-06 02:56:21', '2022-05-17 13:31:11'),
(8, NULL, 'cairo branch', 'القطاع المالي التقني', NULL, NULL, 23, '2022-02-20 14:36:32', '2022-02-20 14:36:32'),
(9, NULL, 'FenTech', 'القطاع المالي التقني', NULL, NULL, 24, '2022-02-06 02:56:21', '2022-02-08 14:35:50'),
(10, 91, 'Badia Tec Egypt', 'باديا تك مصر', '30.111802', '31.346112', 22, '2022-05-31 12:06:06', '2022-08-07 21:12:26'),
(16, 107, 'Tuwasl', 'تواصل', '30.088949', '31.330276', 22, '2022-08-07 21:14:35', '2022-08-07 21:14:35'),
(17, NULL, 'الرئيسي - جدة', 'jeddah', '21.4669671', '39.8321176', 154, '2022-08-13 18:19:49', '2022-08-13 18:19:49'),
(20, NULL, 'headqurter', 'الفرع الرئيسى', '30.0839389', '31.3198379', 157, '2022-09-26 22:13:07', '2022-09-26 22:13:07'),
(21, 13, 'MASH\'HOOR', 'مشهور', '21.4873', '39.1813', 18, '2022-10-03 16:18:49', '2022-10-03 16:18:49'),
(22, 13, 'Amini', 'أمنّي', '21.4873', '39.1813', 18, '2022-10-03 16:34:46', '2022-10-03 16:34:46'),
(23, NULL, 'BADIA', 'باديا', '21.4873', '39.1813', 21, '2022-10-04 14:45:40', '2022-10-04 14:45:40'),
(24, 380, 'mwardi', 'مواردي', '21.602345', '39.150217', 362, '2022-10-23 09:24:15', '2022-10-23 09:24:15'),
(25, 268, 'HTC', 'صالة الحج و العمرة', '24.7305650', '46.6555170', 160, '2022-10-25 15:07:16', '2022-10-25 15:07:31'),
(26, 390, 'Hail', 'حائل', '27.475879', '41.810294', 68, '2022-11-10 12:13:00', '2022-11-10 12:13:00'),
(27, 509, 'Tawasul', 'تواصل', '21.602496', '39.150196', 500, '2022-11-20 11:38:52', '2022-11-20 11:38:52'),
(28, 111, 'باديا تك - المنيا', 'باديا تك - المنيا', '30.1462679', '31.3198379', 22, '2022-11-22 15:34:11', '2022-11-22 15:34:11'),
(31, 514, 'tgujtguj', 'gujtguj', '24.7305650', '46.6555170', 526, '2022-12-06 08:08:20', '2022-12-06 08:08:20'),
(32, 514, 'Deacon Zamora', 'Jameson Wise', '24.7305650', '46.6555170', 526, '2022-12-06 08:23:31', '2022-12-06 08:23:31'),
(33, 514, 'Deacon Zamora', 'Jameson Wise', '24.7305650', '46.6555170', 526, '2022-12-06 08:36:39', '2022-12-06 08:37:06');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Management', 'الإدارة', 2, '2022-02-20 18:20:47', '2022-02-20 18:21:11'),
(2, 'Management', 'الإدارة', 18, '2022-04-27 05:55:12', '2022-09-17 15:39:07'),
(3, 'marketing', 'التسويق', 19, '2022-04-27 09:03:10', '2022-04-27 09:03:10'),
(4, 'marketing', 'التسويق', 20, '2022-04-27 09:26:04', '2022-04-27 09:26:04'),
(5, 'marketing', 'التسويق', 21, '2022-04-27 10:41:49', '2022-04-27 10:41:49'),
(6, 'marketing', 'التسويق', 22, '2022-04-27 10:59:21', '2022-04-27 10:59:21'),
(7, 'marketing', 'التسويق', 23, '2022-04-28 06:11:42', '2022-04-28 06:11:42'),
(8, 'marketing', 'التسويق', 24, '2022-04-28 06:15:34', '2022-04-28 06:15:34'),
(9, 'Project Management', 'إدارة المشاريع', 18, '2022-09-14 14:02:39', '2022-09-14 14:02:39'),
(10, 'Sales', 'المبيعات', 18, '2022-09-17 15:33:17', '2022-09-17 15:33:17'),
(11, 'Marketing', 'التسويق', 18, '2022-09-17 15:33:47', '2022-09-17 15:33:47'),
(12, 'Financial department', 'قسم المالية', 18, '2022-09-17 15:35:29', '2022-09-17 15:35:29'),
(13, 'Technical Department', 'القسم التقني', 18, '2022-09-17 15:38:36', '2022-09-17 15:38:36'),
(14, 'Human resource', 'الموارد البشرية', 18, '2022-09-17 15:40:14', '2022-09-17 15:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint NOT NULL,
  `user_id` bigint NOT NULL,
  `favorite_id` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint NOT NULL,
  `to_id` bigint NOT NULL,
  `body` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `type`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
(-2043311760, 'user', 3, 3, 'مم', NULL, 1, '2022-02-16 14:59:17', '2022-03-06 08:33:59'),
(-1757039179, 'user', 3, 4, 'كك', NULL, 0, '2022-02-16 14:59:33', '2022-02-16 14:59:33');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `percentage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_deal_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `employee_id`, `title`, `date`, `amount`, `type`, `created_by`, `created_at`, `updated_at`, `percentage`, `close_deal_amount`) VALUES
(1, 1, 'pppppppppp', '2022-02-06', 15000, '$', 2, '2022-02-06 01:26:13', '2022-07-25 16:22:51', NULL, NULL),
(2, 4, 'نسبة مبيعات', '2022-03-06', 10, '$', 2, '2022-03-06 06:41:51', '2022-07-25 16:22:51', NULL, NULL),
(3, 117, 'عمولات شهر سبتمبر 2022', '2022-09-15', 1000, '$', 22, '2022-09-21 11:41:30', '2022-09-21 11:41:30', NULL, NULL),
(4, 117, 'فرق عمولات شهر سبتمبر 2022', '2022-09-01', 6000, '$', 22, '2022-09-21 11:42:15', '2022-09-21 11:42:15', NULL, NULL),
(5, 67, '..', '2022-10-04', 15000, '$', 21, '2022-10-04 14:25:30', '2022-10-04 14:25:30', NULL, NULL),
(6, 257, 'عمولة ميلي', '2022-09-25', 15000, '$', 21, '2022-10-08 17:04:59', '2022-10-08 17:04:59', NULL, NULL),
(7, 262, 'عمولة ميلي', '2022-09-26', 15000, '$', 19, '2022-10-12 12:59:15', '2022-10-12 12:59:15', NULL, NULL),
(8, 117, 'عمولة تعاقد  خاتم السلطان', '2022-10-13', 4250, '$', 22, '2022-10-20 22:34:32', '2022-10-20 22:34:32', NULL, NULL),
(10, 262, 'عمولة ميلي', '2022-11-20', 15000, '$', 19, '2022-11-20 09:52:09', '2022-11-20 09:52:09', NULL, NULL),
(11, 411, 'نسبة مبيعات تشغيلية', '2022-11-30', 0, '%', 154, '2022-12-06 19:29:05', '2022-12-06 19:29:05', NULL, NULL),
(12, 262, 'عمولة ميلي', '2022-12-25', 15000, '$', 19, '2022-12-25 11:38:02', '2022-12-25 11:38:02', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companyslates`
--

CREATE TABLE `companyslates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companyslates`
--

INSERT INTO `companyslates` (`id`, `title`, `title_ar`, `file`, `file_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'لائحة تنظيم العمل لشركة باديا _ مصر 2022 (1)', 'لائحة تنظيم العمل لشركة باديا _ مصر 2022 (1)', 'uploads/company_slate_2022.pdf', 'uploads/company_slate_ar_2022.pdf', 2, '2022-05-31 11:48:30', '2022-05-31 11:48:30'),
(2, 'slate 2022', 'slate 2022', 'uploads/company_slate_2023.pdf', 'uploads/company_slate_ar_2023.pdf', 22, '2022-05-31 11:56:23', '2023-02-14 16:49:23'),
(3, 'لائحة تنظيم العمل للشركة', 'لائحة تنظيم العمل للشركة', 'uploads/company_slate_2022.pdf', 'uploads/company_slate_ar_2022.pdf', 154, '2022-11-11 20:01:17', '2022-11-11 20:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `company_breaks`
--

CREATE TABLE `company_breaks` (
  `id` bigint UNSIGNED NOT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_breaks`
--

INSERT INTO `company_breaks` (`id`, `start_time`, `end_time`, `created_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '12:00 pm', '01:00 pm', 22, NULL, '2022-11-24 12:52:54', NULL),
(4, '01:15 am', '02:15 am', 362, '2022-11-14 13:14:08', '2022-11-14 13:14:08', NULL),
(5, '01:00 am', '02:00 am', 362, '2022-11-14 13:14:33', '2022-11-14 13:14:33', NULL),
(6, '01:00 pm', '02:00 pm', 21, '2022-11-20 12:33:13', '2022-11-20 12:33:13', NULL),
(7, '01:30 pm', '02:30 pm', 21, '2022-11-20 12:33:39', '2022-11-20 12:33:39', NULL),
(8, '02:00 pm', '03:00 pm', 21, '2022-11-20 12:34:07', '2022-11-20 12:34:07', NULL),
(9, '01:00 pm', '02:00 pm', 18, '2022-11-20 12:35:30', '2022-11-20 12:35:30', NULL),
(10, '01:30 pm', '02:30 pm', 18, '2022-11-20 12:36:01', '2022-11-20 12:36:01', NULL),
(11, '01:00 pm', '02:00 pm', 19, '2022-11-21 10:49:03', '2022-11-21 10:49:03', NULL),
(12, '01:30 pm', '02:30 pm', 19, '2022-11-21 10:49:45', '2022-11-21 10:49:45', NULL),
(14, '12:00 pm', '01:00 pm', 18, '2023-01-04 13:47:10', '2023-01-04 13:47:10', NULL),
(15, '12:00 pm', '01:00 pm', 19, '2023-01-04 13:49:21', '2023-01-04 13:49:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_ducument_uploads`
--

CREATE TABLE `company_ducument_uploads` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint DEFAULT NULL,
  `deleted_at` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_ducument_uploads`
--

INSERT INTO `company_ducument_uploads` (`id`, `name`, `document`, `description`, `created_by`, `created_at`, `updated_at`, `category_id`, `deleted_at`) VALUES
(7, 'urehueyr', 'logo (1)_1679233427.png', 'fvfv', 22, '2023-03-19 15:43:47', '2023-03-19 15:43:47', 6, NULL),
(8, 'Attendance.pdf', 'documents/xmRyS34khgHo8qZZ9rXpcWEYpksItwqEKH45T4V7.pdf', 'Attendance.pdf', 22, '2023-04-18 10:33:09', '2023-04-18 10:33:09', 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_ducument_upload_categories`
--

CREATE TABLE `company_ducument_upload_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_ducument_upload_categories`
--

INSERT INTO `company_ducument_upload_categories` (`id`, `name`, `name_ar`, `deleted_at`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Deacon Zamora', 'الحالة الججنائية', NULL, 22, '2022-11-17 16:34:21', '2022-11-17 16:34:21'),
(3, 'مواردي ..', 'مواردي ..', NULL, 500, '2022-11-20 14:02:34', '2022-11-20 14:02:34'),
(4, 'test', 'test', NULL, 19, '2022-12-11 13:30:05', '2022-12-11 13:30:05'),
(5, 'books', 'books', NULL, 22, '2023-02-28 10:09:59', '2023-04-18 10:33:09'),
(6, 'test', 'test', NULL, 22, '2023-03-19 15:43:24', '2023-03-19 15:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `company_job_requests`
--

CREATE TABLE `company_job_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `status` enum('approved','rejected','pending') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_by` bigint DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `career_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `form_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `company_logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `positions_count` bigint UNSIGNED NOT NULL DEFAULT '1',
  `job_requirement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_job_requests`
--

INSERT INTO `company_job_requests` (`id`, `status`, `created_by`, `start_date`, `end_date`, `title`, `deleted_at`, `created_at`, `updated_at`, `job_type`, `experience`, `career_level`, `salary`, `form_link`, `company_name`, `company_location`, `job_description`, `company_logo`, `education_level`, `positions_count`, `job_requirement`, `location`) VALUES
(3, 'pending', 22, '2022-11-23', '2023-06-03', 'Front end developer', '2023-04-12 12:09:26', '2022-11-23 14:41:39', '2023-04-12 12:09:26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', NULL),
(4, 'pending', 19, '2022-11-27', '2022-11-30', 'test', '2023-04-12 12:09:46', '2022-11-27 14:48:40', '2023-04-12 12:09:46', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', NULL),
(5, 'pending', 19, '2022-12-19', '2022-12-20', 'test', '2023-04-12 12:09:08', '2022-12-19 14:47:15', '2023-04-12 12:09:08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', NULL),
(6, 'pending', 21, '2022-12-28', '2022-12-29', '..', '2023-04-12 12:09:38', '2022-12-26 13:00:03', '2023-04-12 12:09:38', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', NULL),
(7, 'pending', NULL, '2023-04-10', '2023-04-10', 'vhg', NULL, '2023-04-10 14:58:54', '2023-04-10 14:58:54', 'vgh', 'vg', 'vgh', 'vgh', 'iSoecvgl', NULL, NULL, 'vgh', '', 'vgh', 1, '', NULL),
(8, 'pending', NULL, '2023-04-12', '2023-04-12', 'Quam excepturi odit ', '2023-04-12 13:04:23', '2023-04-12 12:30:05', '2023-04-12 13:04:23', 'Et vel dolores sit ', 'Nulla ratione et qui', 'ffff', 'Animi facilis culpa', 'BomLYJoo', NULL, NULL, 'Consectetur voluptat', '', 'Natus porro velit iu', 1, '', NULL),
(9, 'pending', NULL, '2023-04-18', '2023-04-18', 'Deserunt do fugiat ', NULL, '2023-04-12 13:08:37', '2023-04-18 16:22:27', 'Full Time', 'Sequi rerum dolor vo', 'Minim deserunt enim ', 'Reiciendis fugit se', 'ePfVMWbW', NULL, NULL, 'Totam pariatur Quos Totam pariatur Quos Totam pariatur Quos Totam pariatur Quos Totam pariatur Quos Totam pariatur Quos Totam pariatur Quos ', NULL, 'Do consequuntur labo', 0, 'Voluptatem Et fugia', 'Fugiat vitae quasi '),
(10, 'pending', NULL, '1976-11-08', '1983-05-18', 'Asperiores voluptas ', NULL, '2023-04-18 16:19:25', '2023-04-18 16:19:25', 'Part Time', 'Ea minus tempore te', 'Quisquam eius ipsum ', 'Et cum et iure magna', 'H1LOIeNl', NULL, NULL, 'Consequat Dolores h', NULL, 'Autem sed nostrud of', 0, 'Voluptatum eiusmod q', 'Nihil consequatur in');

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

CREATE TABLE `company_policies` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_structures`
--

CREATE TABLE `company_structures` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint UNSIGNED DEFAULT NULL,
  `structure_key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_structures`
--

INSERT INTO `company_structures` (`id`, `name`, `name_ar`, `parent`, `structure_key`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'Organizational Chart', 'الهيكل التنظيمي - باديا تك مصر', NULL, NULL, '74', 22, '2022-08-03 14:48:36', '2023-04-17 11:40:09'),
(5, 'General Director', 'المدير العام', 4, NULL, NULL, 22, '2022-08-03 14:57:31', '2022-08-03 14:57:31'),
(10, 'Sales Manager', 'مدير المبيعات', 5, NULL, NULL, 22, '2022-08-08 10:17:11', '2022-08-08 10:19:47'),
(11, 'Managing Director', 'المدير الادارى', 5, NULL, NULL, 22, '2022-08-08 10:19:29', '2022-08-08 10:19:29'),
(12, 'Accountant', 'ادارة الحسابات', 11, NULL, NULL, 22, '2022-08-08 10:20:55', '2022-08-08 10:20:55'),
(13, 'HR Manger', 'مدير الموارد البشرية', 11, NULL, NULL, 22, '2022-08-08 10:21:31', '2022-08-08 10:21:31'),
(14, 'Director of Legal Affairs', 'مدير الشئون القانونية', 11, NULL, NULL, 22, '2022-08-08 10:22:27', '2022-08-08 10:22:27'),
(15, 'CTO', 'مدير التكنولوجيا التنفيذي', 5, NULL, NULL, 22, '2022-08-11 13:24:07', '2022-08-11 13:24:07'),
(16, 'Senior Mobile Developer', 'سنيور مطور تطبيقات الهواتف الذكية', 15, NULL, NULL, 22, '2022-08-11 14:58:18', '2022-08-11 14:58:18'),
(17, 'Mobile developer', 'مطور تطبيقات الهواتف الذكية', 16, NULL, NULL, 22, '2022-08-11 15:17:59', '2022-08-11 15:17:59'),
(18, 'Mobile developer', 'مطور تطبيقات الهواتف الذكية', 16, NULL, NULL, 22, '2022-08-11 15:18:17', '2022-08-11 15:18:17'),
(19, 'Mobile developer', 'مطور تطبيقات الهواتف الذكية', 16, NULL, NULL, 22, '2022-08-11 15:18:56', '2022-08-11 15:18:56'),
(20, 'Mobile developer', 'مطور تطبيقات الهواتف الذكية', 16, NULL, NULL, 22, '2022-08-11 15:22:11', '2022-08-11 15:22:11'),
(21, 'Backend Developer', 'مطور الواجهة الخلفية', 15, NULL, NULL, 22, '2022-08-11 15:26:55', '2022-08-11 15:26:55'),
(22, 'Frontend Developer', 'مطور الواجهة الامامية', 15, NULL, NULL, 22, '2022-08-11 15:28:34', '2022-08-11 15:28:34'),
(23, 'Frontend Developer', 'مطور الواجهة الامامية', 22, NULL, NULL, 22, '2022-08-11 15:29:43', '2022-08-11 15:29:43'),
(24, 'Backend Developer', 'مطور الواجهة الخلفية', 21, NULL, NULL, 22, '2022-08-11 15:32:09', '2022-08-11 15:32:09'),
(25, 'Frontend Developer', 'مطور الواجهة الامامية', 22, NULL, NULL, 22, '2022-08-11 15:32:33', '2022-08-11 15:32:33'),
(26, 'Backend Developer', 'مطور الواجهة الخلفية', 21, NULL, NULL, 22, '2022-08-11 15:33:05', '2022-08-11 15:33:05'),
(27, 'Backend Developer', 'مطور الواجهة الخلفية', 21, NULL, NULL, 22, '2022-08-11 15:34:10', '2022-08-11 15:34:10'),
(28, 'Backend Developer', 'مطور الواجهة الخلفية', 21, NULL, NULL, 22, '2022-08-11 15:35:22', '2022-08-11 15:35:22'),
(29, 'Backend Developer', 'مطور الواجهة الخلفية', 21, NULL, NULL, 22, '2022-08-11 15:36:38', '2022-08-11 15:36:38'),
(30, 'Frontend Developer', 'مطور الواجهة الامامية', 22, NULL, NULL, 22, '2022-08-11 15:38:00', '2022-08-11 15:38:00'),
(31, 'UI/UX DESIGNER', 'مصمم واجهة المستخدم', 22, NULL, NULL, 22, '2022-08-11 15:38:59', '2022-08-11 15:38:59'),
(32, 'UI/UX DESIGNER', 'مصمم واجهة المستخدم', 22, NULL, NULL, 22, '2022-08-11 15:39:33', '2022-08-11 15:39:33'),
(33, 'marketing', 'التسويق', NULL, NULL, NULL, 157, '2022-09-04 16:27:56', '2022-09-04 16:27:56'),
(44, 'خليفه الباتع', 'خليفه الباتع', NULL, NULL, NULL, 68, '2022-09-27 13:29:36', '2022-09-27 13:29:36'),
(53, 'H R', 'الموارد البشرية', NULL, NULL, NULL, 500, '2023-01-01 11:46:19', '2023-01-01 11:46:19'),
(54, 'الرئيس التنفيذي', 'الرئيس التنفيذي', NULL, NULL, NULL, 18, '2023-01-01 11:56:22', '2023-01-01 11:56:22'),
(55, 'Backend developer', 'مطور واجهات خلفية', 21, NULL, NULL, 22, '2023-02-21 14:03:43', '2023-02-21 14:06:45'),
(56, 'Backend developer', 'مطور واجهات خلفية', 21, NULL, NULL, 22, '2023-02-21 14:08:15', '2023-02-21 14:08:15');

-- --------------------------------------------------------

--
-- Table structure for table `company_structure_employees`
--

CREATE TABLE `company_structure_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `structure_id` bigint UNSIGNED DEFAULT NULL,
  `employee_id` bigint UNSIGNED DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

CREATE TABLE `competencies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competencies`
--

INSERT INTO `competencies` (`id`, `name`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '5', '2', '2', '2022-06-08 14:22:16', '2022-06-08 14:22:16'),
(2, '4', '2', '2', '2022-06-08 14:22:24', '2022-06-08 14:22:24'),
(5, 'الالتزام باجراءات وأساليب العمل', '12', '22', '2022-06-08 16:13:26', '2022-06-08 16:13:26'),
(6, 'انجاز العمل بالمستوى المطلوب', '12', '22', '2022-06-08 16:13:50', '2022-06-08 16:13:50'),
(7, 'المحافظة على ممتلكات الشركة', '12', '22', '2022-06-08 16:14:07', '2022-06-08 16:50:48'),
(8, 'السرعة في إنجاز العمل مع قلة الأخطاء', '12', '22', '2022-06-08 16:14:26', '2022-06-08 16:14:26'),
(9, 'الاجتهاد والتجاوب مع ضغط العمل', '12', '22', '2022-06-08 16:14:41', '2022-06-08 16:14:41'),
(10, 'الترتيب والنظام في العمل', '12', '22', '2022-06-08 16:14:53', '2022-06-08 16:14:53'),
(11, 'الاهتمام بتطوير وتحسين مستوى العمل', '12', '22', '2022-06-08 16:15:13', '2022-06-08 16:15:13'),
(12, 'تقبل توجيهات وانتقادات الرؤساء', '12', '22', '2022-06-08 16:15:25', '2022-06-08 16:15:25'),
(13, 'التعاون مع مساعدة الزملاء', '12', '22', '2022-06-08 16:15:40', '2022-06-08 16:15:40'),
(14, 'القدرة على تحمل مسؤولية أكبر', '12', '22', '2022-06-08 16:15:57', '2022-06-08 16:15:57'),
(16, 'التعاون مع مساعدة الزملاء', '12', '22', '2022-06-08 16:50:23', '2022-06-08 16:50:23'),
(17, 'احترام الغير', '12', '22', '2022-06-08 16:51:15', '2022-06-08 16:51:15'),
(18, 'المظهر', '12', '22', '2022-06-08 16:51:29', '2022-06-08 16:51:29'),
(19, 'الإلتزام بالحضور صباحا بدون تأخيرات', '12', '22', '2022-06-08 16:57:53', '2022-06-08 16:57:53'),
(20, 'القدرة على اتخاذ القرارات', '12', '22', '2022-06-08 16:58:52', '2022-06-08 16:59:02'),
(22, 'متميز (80 - 100)', '25', '154', '2022-11-14 03:11:56', '2022-11-14 03:11:56'),
(23, 'متميز (80 - 100)', '26', '154', '2022-11-14 03:12:23', '2022-11-14 03:12:23'),
(24, 'متميز (80 - 100)', '27', '154', '2022-11-14 03:12:34', '2022-11-14 03:12:34'),
(25, 'فوق المتوسط (60 - 79)', '25', '154', '2022-11-14 03:14:36', '2022-11-14 03:14:36'),
(26, 'فوق المتوسط (60 - 79)', '26', '154', '2022-11-14 03:14:59', '2022-11-14 03:14:59'),
(27, 'فوق المتوسط (60 - 79)', '27', '154', '2022-11-14 03:15:11', '2022-11-14 03:15:11'),
(28, 'متوسط (50 - 69)', '25', '154', '2022-11-14 03:16:23', '2022-11-14 03:16:23'),
(29, 'متوسط (50 - 69)', '26', '154', '2022-11-14 03:16:35', '2022-11-14 03:16:35'),
(30, 'متوسط (50 - 69)', '27', '154', '2022-11-14 03:16:49', '2022-11-14 03:16:49'),
(31, 'تحت المتوسط (40 - 49)', '25', '154', '2022-11-14 03:17:54', '2022-11-14 03:17:54'),
(32, 'تحت المتوسط (40 - 49)', '26', '154', '2022-11-14 03:18:07', '2022-11-14 03:18:07'),
(33, 'تحت المتوسط (40 - 49)', '27', '154', '2022-11-14 03:18:18', '2022-11-14 03:18:18'),
(34, 'منخفض (10 - 39)', '25', '154', '2022-11-14 03:19:11', '2022-11-14 03:19:11'),
(35, 'منخفض (10 - 39)', '26', '154', '2022-11-14 03:19:12', '2022-11-14 03:19:41'),
(36, 'منخفض (10 - 39)', '27', '154', '2022-11-14 03:19:59', '2022-11-14 03:19:59');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint UNSIGNED NOT NULL,
  `complaint_from` int NOT NULL,
  `complaint_against` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `complaint_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contract_templates`
--

CREATE TABLE `contract_templates` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contract_templates`
--

INSERT INTO `contract_templates` (`id`, `name`, `date`, `template`, `created_at`, `updated_at`) VALUES
(2, 'dev', '2023-05-01', '<p>Hello {employee_Name} your salary is {Salary}</p>', '2023-05-01 11:36:03', '2023-05-01 11:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT '0.00',
  `limit` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `discount`, `limit`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'badia', '123', 10.00, 10, NULL, 1, '2022-04-28 09:04:14', '2022-04-28 09:04:14');

-- --------------------------------------------------------

--
-- Table structure for table `custom_questions`
--

CREATE TABLE `custom_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_options`
--

CREATE TABLE `deduction_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deduction_options`
--

INSERT INTO `deduction_options` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'absent discount', 0, 2, '2022-03-06 06:43:07', '2022-03-06 06:43:07'),
(2, '25%', 0, 22, '2022-06-21 09:37:07', '2022-06-21 09:37:07'),
(3, '50%', 0, 22, '2022-06-21 09:40:57', '2022-06-21 09:40:57'),
(4, '75%', 0, 22, '2022-06-21 09:43:29', '2022-06-21 09:43:29'),
(5, '100%', 0, 22, '2022-06-21 09:43:49', '2022-06-21 09:43:49'),
(6, '200%', 0, 22, '2022-06-21 09:44:12', '2022-06-21 09:44:12'),
(7, '25%', 25, 18, '2022-07-20 09:39:02', '2022-07-20 09:39:02'),
(8, '50%', 50, 18, '2022-07-20 09:39:17', '2022-07-20 09:39:17'),
(9, '75%', 75, 18, '2022-07-20 09:39:31', '2022-07-20 09:39:31'),
(10, '100%', 100, 18, '2022-07-20 09:39:40', '2022-07-20 09:39:40'),
(11, '200%', 200, 18, '2022-07-20 09:39:56', '2022-07-20 09:39:56'),
(16, '25%', 25, 20, '2022-07-20 10:24:54', '2022-07-20 10:24:54'),
(17, '50%', 50, 20, '2022-07-20 10:25:05', '2022-07-20 10:25:05'),
(18, '100%', 100, 20, '2022-07-20 10:25:16', '2022-07-20 10:25:16'),
(19, '200%', 200, 20, '2022-07-20 10:25:27', '2022-07-20 10:25:27'),
(20, '25%', 25, 21, '2022-07-20 10:31:58', '2022-07-20 10:31:58'),
(21, '50%', 50, 21, '2022-07-20 10:32:18', '2022-07-20 10:32:18'),
(22, '100%', 100, 21, '2022-07-20 10:32:32', '2022-07-20 10:32:32'),
(23, '200%', 200, 21, '2022-07-20 10:32:47', '2022-07-20 10:32:47'),
(24, '25%', 25, 23, '2022-07-20 10:59:49', '2022-07-20 10:59:49'),
(25, '50%', 50, 23, '2022-07-20 11:00:08', '2022-07-20 11:00:08'),
(26, '100%', 100, 23, '2022-07-20 11:00:19', '2022-07-20 11:00:19'),
(27, '200%', 200, 23, '2022-07-20 11:00:33', '2022-07-20 11:00:33'),
(28, '25%', 25, 24, '2022-07-20 11:07:36', '2022-07-20 11:07:36'),
(29, '50%', 50, 24, '2022-07-20 11:07:52', '2022-07-20 11:07:52'),
(30, '100%', 100, 24, '2022-07-20 11:08:04', '2022-07-20 11:08:04'),
(31, '200%', 200, 24, '2022-07-20 11:08:16', '2022-07-20 11:08:16'),
(32, 'Advance', 0, 68, '2022-07-20 11:58:00', '2022-11-10 10:59:35'),
(33, 'laon', 0, 18, '2022-10-11 13:59:33', '2022-10-11 13:59:33'),
(34, '..', 0, 362, '2022-11-06 10:05:06', '2022-11-06 10:05:06'),
(35, 'Cut-Off', 0, 68, '2022-11-10 10:58:10', '2022-11-10 10:58:52'),
(36, 'Traffic violations', 0, 68, '2022-11-10 11:00:20', '2022-11-10 11:00:20'),
(37, 'OTHER', 0, 19, '2022-11-13 11:25:14', '2022-11-13 11:25:14'),
(38, 'LATE', 0, 19, '2022-11-13 14:35:12', '2022-11-13 14:35:12'),
(40, 'Delay discount', 0, 154, '2022-11-13 15:57:40', '2022-11-13 15:57:40'),
(41, 'Misconduct discount', 0, 154, '2022-11-13 15:59:00', '2022-11-13 15:59:00'),
(42, 'OTHER', 0, 500, '2022-11-20 11:54:13', '2022-11-20 11:54:13');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int DEFAULT NULL,
  `branch_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `employee_id`, `branch_id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 'department', 'الإدارة', 2, '2022-02-06 02:56:59', '2022-05-22 14:39:06'),
(2, NULL, 1, 'department', 'الإدارة', 18, '2022-02-06 02:56:59', '2022-02-07 09:49:14'),
(4, NULL, 1, 'department', 'الإدارة', 20, '2022-02-06 02:56:59', '2022-02-07 09:49:14'),
(5, NULL, 1, 'department', 'الإدارة', 21, '2022-02-06 02:56:59', '2022-02-07 09:49:14'),
(7, NULL, 1, 'department', 'الإدارة', 23, '2022-02-06 02:56:59', '2022-02-07 09:49:14'),
(8, NULL, 1, 'department', 'الإدارة', 24, '2022-02-06 02:56:59', '2022-02-07 09:49:14'),
(9, 89, 10, 'HR', 'الموارد البشرية', 22, '2022-05-31 12:07:19', '2022-05-31 12:07:19'),
(10, 74, 10, 'Development', 'التطوير', 22, '2022-05-31 12:42:13', '2022-05-31 12:42:13'),
(11, 107, 10, 'Marketing', 'التسويق', 22, '2022-05-31 12:42:50', '2022-05-31 12:42:50'),
(12, 89, 10, 'Finance', 'المالية', 22, '2022-05-31 12:43:41', '2022-05-31 12:43:41'),
(13, 89, 10, 'Sales', 'المبيعات', 22, '2022-06-02 10:02:29', '2022-06-02 10:04:57'),
(14, 89, 10, 'Services', 'الخدمات', 22, '2022-06-02 10:24:19', '2022-06-02 10:29:11'),
(15, 111, 10, 'Management', 'الإدارة', 22, '2022-06-02 10:29:46', '2022-06-02 10:29:46'),
(16, 118, 15, 'HR', 'الموارد البشرية', 68, '2022-07-26 11:37:32', '2022-07-26 11:37:32'),
(17, 120, 15, 'Administration', 'الاداره', 68, '2022-07-27 10:11:12', '2022-07-27 10:11:12'),
(18, 121, 15, 'Project', 'المشاريع', 68, '2022-07-28 07:50:41', '2022-07-28 07:50:41'),
(19, 122, 15, 'Finance', 'الماليه', 68, '2022-07-28 08:01:48', '2022-07-28 08:02:23'),
(31, 383, 24, 'SALES', 'المبيعات', 362, '2022-10-23 09:24:50', '2022-11-03 14:13:56'),
(32, 388, 17, 'قسم السائقين', 'قسم السائقين', 154, '2022-11-06 22:07:36', '2022-11-06 22:08:06'),
(33, 408, 17, 'الشؤون الإدارية', 'الشؤون الإدارية', 154, '2022-11-12 00:30:44', '2022-11-12 00:30:44'),
(34, 412, 17, 'Marketing', 'التسويق', 154, '2022-11-12 01:02:34', '2022-11-12 01:02:34'),
(35, 256, 4, 'SALES', 'المبيعات', 19, '2022-11-14 10:48:39', '2022-11-14 10:48:39'),
(36, 20, 4, 'Accountant', 'محاسبة', 19, '2022-11-14 10:52:29', '2022-11-14 10:52:29'),
(37, 383, 24, 'Operations', 'الادارة', 362, '2022-11-14 10:59:13', '2022-11-14 10:59:13'),
(38, 495, 3, 'SALES', 'المبيعات', 18, '2022-11-15 13:21:13', '2022-11-15 13:21:13'),
(39, 412, 17, 'خدمة العملاء', 'خدمة العملاء', 154, '2022-11-16 00:34:08', '2022-11-16 00:34:08'),
(40, 509, 27, 'Accountant', 'محاسبة', 500, '2022-11-20 11:39:20', '2022-11-20 11:39:20'),
(41, 510, 27, 'SALES', 'مبيعات', 500, '2022-11-20 11:48:30', '2022-11-20 11:48:30'),
(42, 377, 4, 'Administration', 'الادارة', 19, '2022-11-22 17:01:29', '2022-11-22 17:01:29'),
(43, 273, 25, 'Operations', 'التشغيل', 160, '2022-12-05 08:28:37', '2022-12-05 08:28:37'),
(44, 0, 32, 'Mary Wilder', 'Jameson Wise', 526, '2022-12-06 08:50:34', '2022-12-06 08:50:56'),
(45, 0, 17, 'فنيين الكهرباء', 'فنيين الكهرباء', 154, '2022-12-31 20:45:29', '2022-12-31 20:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` int NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `income_category_id` int NOT NULL,
  `payer_id` int NOT NULL,
  `payment_type_id` int NOT NULL,
  `referal_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint UNSIGNED NOT NULL,
  `department_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `department_id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'designation', 'تعيين', 2, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(2, 1, 'designation', 'تعيين', 18, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(3, 1, 'designation', 'تعيين', 19, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(4, 1, 'designation', 'تعيين', 20, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(5, 1, 'designation', 'تعيين', 21, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(6, 1, 'designation', 'تعيين', 22, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(7, 1, 'designation', 'تعيين', 23, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(8, 1, 'designation', 'تعيين', 24, '2022-02-06 02:58:33', '2022-02-06 02:58:33'),
(9, 9, 'full time contract', 'عقد دوام كامل', 22, '2022-05-31 12:46:11', '2022-05-31 12:46:11'),
(10, 9, 'part time contract', 'عقد دوام جزئي', 22, '2022-05-31 12:47:21', '2022-05-31 12:47:21'),
(11, 9, 'temporary contract', 'عقد مؤقت', 22, '2022-05-31 12:47:46', '2022-05-31 12:47:46'),
(12, 9, 'special contract', 'عقد خاص', 22, '2022-05-31 12:48:32', '2022-05-31 12:48:32'),
(13, 16, 'HRM', 'مدير الموارد البشرية', 68, '2022-07-26 11:39:19', '2022-07-26 11:39:19'),
(14, 17, 'manegar', 'مدير الاداره', 68, '2022-07-27 10:13:05', '2022-07-27 10:13:05'),
(15, 18, 'Project Manager', 'مدير المشاريع', 68, '2022-07-28 07:51:11', '2022-07-28 07:51:11'),
(16, 19, 'accountant', 'محاسب عام', 68, '2022-07-28 08:03:08', '2022-07-28 08:03:08'),
(17, 18, 'Electrical Engineer', 'مهندس كهرباء', 68, '2022-07-28 08:25:38', '2022-07-28 08:25:38'),
(18, 17, 'Data entry', 'مدخل بيانات', 68, '2022-07-28 08:34:35', '2022-07-28 08:34:35'),
(19, 17, 'technician', 'فني كهرباء', 68, '2022-07-28 08:36:00', '2022-07-28 08:36:00'),
(20, 17, 'Expeditor', 'معقب', 68, '2022-07-28 08:36:41', '2022-07-28 08:36:41'),
(21, 18, 'Safety Coordinator', 'منسق سلامة', 68, '2022-07-28 08:37:32', '2022-07-28 08:37:32'),
(22, 18, 'driver', 'سائق', 68, '2022-07-28 10:28:13', '2022-07-28 10:28:13'),
(23, 18, 'surveyor', 'مساح', 68, '2022-07-31 08:16:52', '2022-07-31 08:16:52'),
(24, 18, 'Equipment operator', 'مشغل معدات سفلته', 68, '2022-08-04 12:30:55', '2022-08-04 12:30:55'),
(25, 18, 'Distribution panel', 'مجمع لوحات توزيع', 68, '2022-08-04 12:32:04', '2022-08-04 12:32:04'),
(26, 16, 'General electrician', 'كهربائي عام', 68, '2022-08-04 12:33:09', '2022-08-04 12:33:09'),
(27, 18, 'worker', 'عامل', 68, '2022-08-07 07:14:01', '2022-08-07 07:14:01'),
(28, 43, 'Full time', 'دوام كامل', 160, '2022-12-05 08:29:03', '2022-12-05 08:29:03'),
(29, 44, 'Naomi Higgins', 'Jameson Wise', 526, '2022-12-06 08:55:48', '2022-12-06 08:55:48'),
(30, 0, 'sdsdsd', 'Emi Shields', 526, '2022-12-06 09:00:28', '2022-12-06 09:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_required` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `name`, `name_ar`, `is_required`, `document_type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'National ID', 'الرقم القومى', '1', NULL, 22, '2022-10-17 15:37:06', '2022-10-17 15:37:06'),
(2, 'Birth certificate', 'شهادة الميلاد', '1', NULL, 22, '2022-10-17 15:38:00', '2022-10-17 15:53:55'),
(3, 'Qualification', 'شهادة المؤهل الدراسي', '1', NULL, 22, '2022-10-17 15:52:55', '2022-10-17 15:53:34'),
(4, 'Military', 'الخدمة العسكرية', '0', NULL, 22, '2022-10-17 15:56:10', '2022-10-17 15:56:10'),
(5, 'الحالة الجنائية', 'الحالة الجنائية', '1', NULL, 22, '2022-10-17 15:56:52', '2022-10-17 15:56:52'),
(6, '(8) recent photo', 'صورة فوتوغرافية', '1', NULL, 22, '2022-10-17 15:57:27', '2022-10-17 15:57:27'),
(7, 'work stub', 'كعب العمل', '1', NULL, 22, '2022-10-17 15:58:04', '2022-10-17 15:58:22'),
(8, 'Number of insurance', 'الرقم التأميني', '0', NULL, 22, '2022-10-17 15:58:53', '2022-10-17 15:58:53'),
(9, 'Form 111', 'استمارة 111', '1', NULL, 22, '2022-10-17 15:59:20', '2022-10-17 15:59:20'),
(10, 'certificate', 'الشهادة', '0', NULL, 19, '2022-10-18 11:15:53', '2022-10-18 11:15:53'),
(11, 'National ID', 'الهوية الوطنية / الاقامة', '0', NULL, 19, '2022-10-18 11:17:15', '2022-10-18 11:17:15'),
(12, 'Bank account', 'الحساب البنكي', '0', NULL, 19, '2022-10-18 11:17:46', '2022-10-18 11:17:46'),
(13, 'Passport', 'جواز السفر', '1', NULL, 154, '2022-11-13 18:16:51', '2022-11-13 18:16:51'),
(14, 'Staff advance', 'سلفة الموظفين', '0', NULL, 154, '2022-11-13 18:17:58', '2022-11-13 18:17:58'),
(15, 'National ID / Iqama', 'الهوية الوطنية / الاقامة', '1', NULL, 154, '2022-11-13 18:20:04', '2022-11-13 18:20:04'),
(16, 'National ID / Iqama', 'الهوية الوطنية / الاقامة', '1', NULL, 154, '2022-11-13 18:20:05', '2022-11-13 18:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'Personal Documents', 'مستندات شخصية', '2023-05-01 11:31:33', '2023-05-01 11:31:33'),
(2, 'Company Documents', 'مستندات الشركة', '2023-05-01 11:31:33', '2023-05-01 11:31:33'),
(3, 'Assets Documents', 'مستندات العهد', '2023-05-01 11:31:33', '2023-05-01 11:31:33'),
(4, 'Insurance Documents', 'مستندات التأمين', '2023-05-01 11:31:33', '2023-05-01 11:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `ducument_uploads`
--

CREATE TABLE `ducument_uploads` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `document_id` bigint UNSIGNED NOT NULL,
  `exp_date` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ducument_uploads`
--

INSERT INTO `ducument_uploads` (`id`, `employee_id`, `role`, `document`, `description`, `document_id`, `exp_date`, `created_by`, `created_at`, `updated_at`) VALUES
(119, 102, '0', '630_1676200595.jpg', 'bvbvbvb', 1, '2023-02-03', 22, '2023-02-12 11:09:28', '2023-02-19 13:58:23'),
(120, 96, '0', '630_1676200670.jpg', '', 2, '2023-02-04', 22, '2023-02-12 11:10:01', '2023-02-12 13:18:09'),
(121, 106, '0', '', 'fffffffff', 3, '2023-03-04', 22, '2023-03-15 10:12:26', '2023-03-15 10:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `ducument_upload_images`
--

CREATE TABLE `ducument_upload_images` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ducument_upload_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ducument_upload_images`
--

INSERT INTO `ducument_upload_images` (`id`, `image`, `ducument_upload_id`, `created_at`, `updated_at`) VALUES
(134, '630_1676200595.jpg', 119, '2023-02-12 13:16:35', '2023-02-12 13:16:35'),
(135, 'download_1676200670.jpeg', 120, '2023-02-12 13:17:50', '2023-02-12 13:17:50'),
(136, '630_1676200670.jpg', 120, '2023-02-12 13:17:50', '2023-02-12 13:17:50'),
(137, 'Screenshot from 2023-03-15 09-38-19_1678867946.png', 121, '2023-03-15 10:12:26', '2023-03-15 10:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `sync_attendance_employee_id` int DEFAULT NULL,
  `user_register` tinyint NOT NULL DEFAULT '1',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `jobtitle_id` int DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` int DEFAULT NULL,
  `department_id` int DEFAULT NULL,
  `designation_id` int DEFAULT NULL,
  `company_doj` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_identifier_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax_payer_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_type` int DEFAULT NULL,
  `salary` double DEFAULT '0',
  `expiry_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `driving_license` tinyint DEFAULT NULL,
  `insurance_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commencement_date` date DEFAULT NULL,
  `social_status` tinyint DEFAULT NULL,
  `residence_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_type` tinyint DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `religion` tinyint DEFAULT NULL,
  `out_of_saudia` tinyint DEFAULT '0',
  `employer_phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `place_of_issuance_of_ID_residence` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `iqama_issuance_date_Hijri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `iqama_issuance_date_gregorian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `iqama_issuance_expirydate_Hijri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `iqama_issuance_expirydate_gregorian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `iqama_attachment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `place_of_issuance_of_passport` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport_issuance_date_gregorian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport_issuance_expirydate_gregorian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `passport_attachment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `building_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `street_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `region` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `postal_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mother_city` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `mother_country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emergency_contact_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emergency_contact_relationship` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emergency_contact_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emergency_contact_phone` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_field_corona` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `custom_field_notes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Join_date_gregorian` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `Join_date_hijri` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `labor_hire_company` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `work_unit` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `class` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `direct_manager` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `permission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `uploading_record_permission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `contract_duration` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_on_probation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `probation_periods_duration` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `probation_periods_status` int DEFAULT NULL,
  `payment_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_account_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_IBAN_number` int DEFAULT NULL,
  `salary_card_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_id` int DEFAULT NULL,
  `IBAN_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `account_holder_name_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `branch_location_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `swift_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `sort_code` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `bank_country` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `policy_number` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `insurance_startdate` date DEFAULT NULL,
  `category` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cost` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `availability_health_insurance_council` date DEFAULT NULL,
  `health_insurance_council_startdate` date DEFAULT NULL,
  `insurance_document` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `annual_leave_entitlement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shift` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` int DEFAULT NULL,
  `medical_insurance_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_card_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_blood_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_cover_ratio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_policy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_company_id` bigint DEFAULT NULL,
  `login_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fingerprint_out_campany` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `skip_start_work_location` int NOT NULL DEFAULT '0',
  `read_slate` int DEFAULT '0',
  `national_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_off_notification` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `sync_attendance_employee_id`, `user_register`, `name`, `name_ar`, `dob`, `nationality_id`, `category_id`, `jobtitle_id`, `gender`, `phone`, `address`, `email`, `password`, `employee_id`, `branch_id`, `department_id`, `designation_id`, `company_doj`, `documents`, `account_holder_name`, `account_number`, `bank_name`, `bank_identifier_code`, `branch_location`, `tax_payer_id`, `salary_type`, `salary`, `expiry_date`, `driving_license_number`, `driving_license`, `insurance_number`, `contract_number`, `commencement_date`, `social_status`, `residence_number`, `passport_number`, `city`, `work_time`, `nationality_type`, `is_active`, `created_by`, `created_at`, `updated_at`, `religion`, `out_of_saudia`, `employer_phone`, `place_of_issuance_of_ID_residence`, `iqama_issuance_date_Hijri`, `iqama_issuance_date_gregorian`, `iqama_issuance_expirydate_Hijri`, `iqama_issuance_expirydate_gregorian`, `iqama_attachment`, `place_of_issuance_of_passport`, `passport_issuance_date_gregorian`, `passport_issuance_expirydate_gregorian`, `passport_attachment`, `building_number`, `street_name`, `region`, `country`, `postal_code`, `mother_city`, `mother_country`, `emergency_contact_name`, `emergency_contact_relationship`, `emergency_contact_address`, `emergency_contact_phone`, `custom_field_corona`, `custom_field_notes`, `Join_date_gregorian`, `Join_date_hijri`, `labor_hire_company`, `work_unit`, `class`, `direct_manager`, `permission`, `uploading_record_permission`, `contract_type`, `contract_duration`, `employee_on_probation`, `probation_periods_duration`, `probation_periods_status`, `payment_type`, `employee_account_type`, `bank_IBAN_number`, `salary_card_number`, `bank_id`, `IBAN_number`, `account_holder_name_ar`, `branch_location_ar`, `swift_code`, `sort_code`, `bank_country`, `policy_number`, `insurance_startdate`, `category`, `cost`, `availability_health_insurance_council`, `health_insurance_council_startdate`, `insurance_document`, `annual_leave_entitlement`, `shift`, `location`, `medical_insurance_number`, `medical_insurance_card_number`, `medical_insurance_start_date`, `medical_insurance_end_date`, `medical_blood_type`, `medical_insurance_type`, `medical_cover_ratio`, `medical_insurance_policy`, `insurance_company_id`, `login_image`, `fingerprint_out_campany`, `skip_start_work_location`, `read_slate`, `national_id`, `on_off_notification`) VALUES
(562, 622, NULL, 1, 'Briar Gardner', 'Chantale Massey', '2023-05-08', 13, NULL, 85, 'Female', '+1 (193) 552-3172', 'Illo sint deserunt v', 'sikufosady@mailinator.com', '$2y$10$J9azptaxguY3tZBhwwAB5.xDK0rMcBlFwlGqOOfhGtxt3nla68Gd2', '1', 25, 44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '130', NULL, NULL, NULL, 1, 22, '2023-05-08 11:33:10', '2023-05-08 11:33:10', 2, 0, NULL, NULL, NULL, '2023-05-08', NULL, '2023-05-08', NULL, 'Voluptates vel sit c', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_branches`
--

CREATE TABLE `employee_branches` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `branch_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_branches`
--

INSERT INTO `employee_branches` (`id`, `employee_id`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 560, 20, NULL, NULL),
(2, 561, 20, NULL, NULL),
(3, 562, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee_breaks`
--

CREATE TABLE `employee_breaks` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `break_id` bigint DEFAULT NULL,
  `start_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_breaks`
--

INSERT INTO `employee_breaks` (`id`, `employee_id`, `break_id`, `start_time`, `end_time`, `created_by`, `created_at`, `updated_at`) VALUES
(41, 92, 1, '03:11 pm', NULL, 22, '2022-11-24 15:11:58', '2022-11-24 15:11:58'),
(42, 74, 1, '03:29 pm', '03:51 pm', 22, '2022-11-24 15:29:05', '2022-11-24 15:51:31'),
(43, 238, 1, '04:07 pm', NULL, 22, '2022-11-24 16:07:44', '2022-11-24 16:07:44'),
(44, 111, 1, '02:31 pm', '03:03 pm', 22, '2022-11-28 14:31:55', '2022-11-28 15:03:31'),
(45, 95, 1, '12:38 pm', NULL, 22, '2022-12-01 12:38:18', '2022-12-01 12:38:18'),
(46, 94, 1, '12:38 pm', NULL, 22, '2022-12-01 12:38:20', '2022-12-01 12:38:20'),
(47, 95, 1, '12:26 pm', NULL, 22, '2022-12-04 12:26:23', '2022-12-04 12:26:23'),
(48, 261, 12, '01:46 pm', '03:13 pm', 19, '2023-01-04 13:46:07', '2023-01-04 15:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contracts`
--

CREATE TABLE `employee_contracts` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `contract_type` tinyint NOT NULL,
  `contract_duration` int DEFAULT NULL,
  `contract_startdate` date DEFAULT NULL,
  `contract_startdate_hijri` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_enddate` date DEFAULT NULL,
  `contract_enddate_hijri` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance` tinyint NOT NULL,
  `insurance_startdate` date DEFAULT NULL,
  `insurance_enddate` date DEFAULT NULL,
  `insurance_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `worker` tinyint NOT NULL,
  `worker_startdate` date DEFAULT NULL,
  `worker_enddate` date DEFAULT NULL,
  `worker_document` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_expiredate` date DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiredate` date DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `document_id` int NOT NULL,
  `document_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `document_type_id` int DEFAULT NULL,
  `document_type_value` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_finger_print_locations`
--

CREATE TABLE `employee_finger_print_locations` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_followers`
--

CREATE TABLE `employee_followers` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality_type` tinyint DEFAULT NULL,
  `nationality_id` int DEFAULT NULL,
  `social_status` int DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `medical_insurance_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_insurance_expiry_date` date DEFAULT NULL,
  `residence_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_followers`
--

INSERT INTO `employee_followers` (`id`, `employee_id`, `name`, `name_ar`, `gender`, `relationship`, `nationality_type`, `nationality_id`, `social_status`, `dob`, `medical_insurance_number`, `medical_insurance_expiry_date`, `residence_number`, `passport_number`, `passport_expiry_date`, `documents`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'mohamed abdelateef', 'محمد عبد اللطيف', 'Male', 'أخ', 0, 1, 0, '2022-04-17', '989646465454011', '2022-04-17', '11111111', '00000000099', '2022-04-17', '\"letter 2022-04-04_1650192871.pdf\"', 2, '2022-04-17 08:27:59', '2022-04-17 08:54:31'),
(3, 11, 'Ali', 'على', 'Male', 'أخ', 0, 1, 1, '2022-04-20', '4444', '2022-04-20', '00000', '4444', '2022-04-20', NULL, 2, '2022-04-20 10:09:01', '2022-04-20 10:09:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_permissions`
--

CREATE TABLE `employee_permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint DEFAULT NULL,
  `admin_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_requests`
--

CREATE TABLE `employee_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `request_type_id` int NOT NULL,
  `applied_on` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `request_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_reason_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_requests`
--

INSERT INTO `employee_requests` (`id`, `employee_id`, `request_type_id`, `applied_on`, `start_date`, `end_date`, `request_reason`, `request_reason_ar`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 3, '2022-05-19', '2022-05-19', '2022-05-20', 'test', 'test', 'Pending', 2, '2022-05-19 13:34:40', '2022-05-19 13:34:40'),
(2, 4, 3, '2022-05-22', '2022-05-22', '2022-05-23', 'test', 'test', '3', 2, '2022-05-22 14:39:55', '2022-05-22 14:41:41'),
(3, 89, 6, '2022-06-02', '2022-06-03', '2022-06-04', 'test', 'test', '1', 22, '2022-06-02 10:14:30', '2022-06-02 10:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `employee_shifts`
--

CREATE TABLE `employee_shifts` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shift_days` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `shift_starttime` time DEFAULT NULL,
  `shift_endtime` time DEFAULT NULL,
  `buffer_time` time DEFAULT NULL,
  `shift_startdate` date DEFAULT NULL,
  `shift_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_delay` tinyint DEFAULT NULL,
  `allowed_delay_minutes` int DEFAULT NULL,
  `split_time` time DEFAULT NULL,
  `second_shift_start_time` time DEFAULT NULL,
  `second_shift_exit_time` time DEFAULT NULL,
  `work_times` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_shifts`
--

INSERT INTO `employee_shifts` (`id`, `name`, `name_ar`, `shift_days`, `shift_starttime`, `shift_endtime`, `buffer_time`, `shift_startdate`, `shift_type`, `allowed_delay`, `allowed_delay_minutes`, `split_time`, `second_shift_start_time`, `second_shift_exit_time`, `work_times`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'shift A', 'دوام A', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(2, 'shift B', 'دوام B', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 2, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(7, 'shift A', 'دوام A', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 20, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(8, 'shift B', 'دوام B', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 20, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(11, 'shift A', 'دوام A', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 22, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(12, 'shift B', 'دوام B', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 22, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(13, 'shift A', 'دوام A', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 23, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(14, 'shift B', 'دوام B', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 23, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(15, 'shift A', 'دوام A', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 24, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(16, 'shift B', 'دوام B', NULL, '08:00:00', '05:00:00', '09:00:00', '2022-04-12', 'Normal', 0, NULL, NULL, NULL, NULL, NULL, 24, '2022-04-12 12:56:38', '2022-04-12 12:56:38'),
(17, 'full time', 'داوم كامل', '01,02,03,04,05,06', '08:00:00', '17:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 154, '2022-08-13 18:38:58', '2022-08-13 18:41:16'),
(18, 'part time', 'دوام جزئي', '01,02,03,04,05,06', '08:00:00', '12:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 154, '2022-08-13 18:40:41', '2022-08-13 18:40:41'),
(19, 'shift 1', 'شيفت 1', '02,03,04,05', '17:56:00', '19:56:00', NULL, '2022-09-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 157, '2022-09-04 16:56:49', '2022-09-04 16:56:49'),
(20, 'خطة عمل أ', 'work plan A', '02,03,04,05,06', '09:00:00', '18:00:00', NULL, '2022-01-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, '2022-10-06 08:56:09', '2022-10-06 08:56:09'),
(21, 'work plan A', 'خطة عمل أ', '02,03,04,05,06', '09:00:00', '18:00:00', NULL, '2022-12-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, '2022-10-06 15:56:44', '2022-12-18 09:42:10'),
(22, 'WORK PLAN A', 'خطة عمل أ', '02,03,04,05,06', '09:00:00', '18:00:00', NULL, '2022-09-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2022-10-07 16:10:18', '2022-10-07 16:10:18'),
(23, 'WORK PLAN A', 'work plan A', '02,03,04,05,06', '09:00:00', '18:00:00', NULL, '2022-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 362, '2022-10-23 09:01:13', '2022-11-07 09:15:00'),
(24, 'Full Time', 'دوام كامل', '01,02,03,04,05,06', '07:00:00', '16:00:00', NULL, '2022-11-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 68, '2022-11-10 10:45:22', '2022-11-10 10:45:22'),
(25, 'WORKPLAN B', 'خطة عمل ب', '02,03,04,05,06', '08:00:00', '17:00:00', NULL, '2022-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19, '2022-11-15 13:47:57', '2022-11-15 13:47:57'),
(26, 'WORKPLAN B', 'خطة عمل ب', '02,03,04,05,06', '08:00:00', '17:00:00', NULL, '2022-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 18, '2022-11-15 15:11:17', '2022-11-15 15:11:17'),
(27, 'WORK PLAN A', 'خطة عمل أ', '02,03,04,05,06', '21:00:00', '06:00:00', NULL, '2022-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 501, '2022-11-17 13:03:53', '2022-11-17 13:03:53'),
(28, 'WORK PLAN A', 'خطة عمل أ', '02,03,04,05,06', '21:00:00', '06:00:00', NULL, '2022-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 501, '2022-11-17 13:03:54', '2022-11-17 13:03:54'),
(29, 'WORK PLAN A', 'خطة عمل أ', '02,03,04,05,06', '09:00:00', '18:00:00', NULL, '2022-10-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, '2022-11-20 10:25:44', '2022-11-20 10:25:44'),
(30, 'WORKPLAN B', 'خطة عمل ب', '02,03,04,05,06', '08:00:00', '17:00:00', NULL, '2022-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 500, '2022-11-20 10:26:41', '2022-11-20 10:26:41'),
(31, 'WORKPLAN B', 'خطة عمل ب', '02,03,04,05,06', '08:00:00', '05:00:00', NULL, '2022-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21, '2022-11-27 10:10:43', '2022-11-27 10:10:43'),
(32, 'A', 'A', '02,03,04', '17:00:00', '01:00:00', NULL, '2022-12-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 160, '2022-12-05 08:31:56', '2022-12-05 08:31:56'),
(33, 'B', 'B', '05,06', '08:00:00', '18:00:00', NULL, '2022-12-09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 160, '2022-12-05 08:32:35', '2022-12-05 08:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tasks`
--

CREATE TABLE `employee_tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_tasks`
--

INSERT INTO `employee_tasks` (`id`, `task_id`, `employee_id`, `created_at`, `updated_at`) VALUES
(2, 2, 105, '2023-04-12 14:58:45', '2023-04-12 14:58:45'),
(3, 2, 37, '2023-04-13 13:22:27', '2023-04-13 13:22:27'),
(4, 3, 74, '2023-05-02 10:47:01', '2023-05-02 10:47:01'),
(5, 3, 111, '2023-05-02 10:47:01', '2023-05-02 10:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `type` enum('monthly','quarter','semi','yearly') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','completed') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `employee_id`, `created_by`, `type`, `status`, `deleted_at`, `created_at`, `updated_at`, `start_date`, `end_date`, `is_completed`, `title`, `parent_id`) VALUES
(397, NULL, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', NULL),
(1010, 74, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1011, 90, 22, 'monthly', 'completed', NULL, '2023-04-12 14:10:26', '2023-05-02 10:34:13', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 1, 'Aut eum numquam nihi', 397),
(1012, 91, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1013, 92, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1014, 93, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1015, 94, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1016, 95, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1017, 96, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1018, 97, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1019, 98, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1020, 100, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1021, 101, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1022, 102, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1023, 103, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1024, 104, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1025, 105, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1026, 106, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1027, 107, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1028, 108, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1029, 109, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1030, 110, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1031, 111, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1032, 112, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1033, 113, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1034, 114, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1035, 116, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1036, 117, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1037, 136, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1038, 185, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1039, 202, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1040, 237, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1041, 238, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1042, 239, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1043, 240, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1044, 241, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1045, 242, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1046, 243, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1047, 246, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1048, 259, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1049, 385, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1050, 511, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1051, 512, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1052, 554, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1053, 555, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1054, 556, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1055, 557, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1056, 558, 22, 'monthly', 'pending', NULL, '2023-04-12 14:10:26', '2023-05-01 15:31:00', '2019-08-09 00:00:00', '2023-05-10 00:00:00', 0, 'Aut eum numquam nihi', 397),
(1057, NULL, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', NULL),
(1106, 74, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1107, 90, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1108, 91, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1109, 92, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1110, 93, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1111, 94, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1112, 95, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1113, 96, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1114, 97, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1115, 98, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1116, 100, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1117, 101, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1118, 102, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1119, 103, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1120, 104, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1121, 105, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1122, 106, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1123, 107, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1124, 108, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1125, 109, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1126, 110, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1127, 111, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1128, 112, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1129, 113, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1130, 114, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1131, 116, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1132, 117, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1133, 136, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1134, 185, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1135, 202, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1136, 237, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1137, 238, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1138, 239, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1139, 240, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1140, 241, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1141, 242, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1142, 243, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1143, 246, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1144, 259, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1145, 385, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1146, 511, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1147, 512, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1148, 554, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1149, 555, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1150, 556, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1151, 557, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1152, 558, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057),
(1153, 559, 22, 'yearly', 'completed', NULL, '2023-05-01 16:39:43', '2023-05-01 16:40:09', '1995-05-19 00:00:00', '2023-05-31 00:00:00', 0, 'Nostrud enim aliquamf', 1057);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answers`
--

CREATE TABLE `evaluation_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluation_id` bigint DEFAULT NULL,
  `question_id` bigint DEFAULT NULL,
  `result` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT '0.00',
  `employee_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_categories`
--

CREATE TABLE `evaluation_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_results`
--

CREATE TABLE `evaluation_results` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `evaluation_id` bigint DEFAULT NULL,
  `result` double(8,2) NOT NULL DEFAULT '0.00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_sections`
--

CREATE TABLE `evaluation_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `evaluation_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_sections`
--

INSERT INTO `evaluation_sections` (`id`, `title`, `evaluation_id`, `created_at`, `updated_at`) VALUES
(16, 'section title 1', 397, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(17, 'section title 2', 397, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(19, 'section title 1', 1057, '2023-05-01 16:40:09', '2023-05-01 16:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` int DEFAULT NULL,
  `department_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `noted` tinyint NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `lectures` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_employees`
--

CREATE TABLE `event_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `account_id` int NOT NULL,
  `amount` int NOT NULL,
  `date` date NOT NULL,
  `expense_category_id` int NOT NULL,
  `payee_id` int NOT NULL,
  `payment_type_id` int NOT NULL,
  `referal_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fcm`
--

CREATE TABLE `fcm` (
  `id` bigint UNSIGNED NOT NULL,
  `company_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genrate_payslip_options`
--

CREATE TABLE `genrate_payslip_options` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_trackings`
--

CREATE TABLE `goal_trackings` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` int NOT NULL,
  `goal_type` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `target_achievement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '0',
  `progress` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_trackings`
--

INSERT INTO `goal_trackings` (`id`, `branch`, `goal_type`, `start_date`, `end_date`, `subject`, `rating`, `target_achievement`, `description`, `description_ar`, `subject_ar`, `status`, `progress`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-01', '2022-06-30', 'test', '4', 'انجاز 1', 'test', 'تيست', 'تيست', 1, 53, 2, '2022-06-08 14:25:41', '2022-06-08 14:41:21'),
(2, 10, 2, '2022-06-08', '2022-06-08', 'New Project', '2', 'صلدسبلديسب', 'دبلللب', 'يلسبلسبلب', 'سيلثصشقل', 1, 58, 22, '2022-06-08 14:40:12', '2022-06-08 14:40:29'),
(3, 10, 2, '2022-06-08', '2022-07-01', 'تست', '3', '5000', 'تست', 'تست', 'تست', 1, 36, 22, '2022-06-08 14:48:36', '2022-06-08 14:48:53'),
(4, 3, 3, '2022-11-06', '2022-11-09', 'test', NULL, '>>>>', '<<<<', '>>>>>>>>', 'test', 0, 0, 18, '2022-11-06 09:31:37', '2022-11-06 09:31:37'),
(6, 4, 4, '2022-12-30', '2022-12-31', 'test', '5', '>>>>', '...', '...', 'test', 0, 86, 19, '2022-11-30 13:52:10', '2022-11-30 13:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `goal_types`
--

CREATE TABLE `goal_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_types`
--

INSERT INTO `goal_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'goal 1', 'هدف 1', 2, '2022-06-08 14:24:43', '2022-06-08 14:24:43'),
(2, 'مهمة', 'مهمة', 22, '2022-06-08 14:38:46', '2022-06-08 14:38:46'),
(3, 'test', 'اختبار', 18, '2022-11-06 09:30:40', '2022-11-06 09:30:40'),
(4, 'test', 'test', 19, '2022-11-07 13:50:04', '2022-11-07 13:50:04'),
(5, 'نن', 'نن', 154, '2022-11-11 19:46:55', '2022-11-11 19:46:55');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `occasion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occasion_ar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `occasion`, `occasion_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2022-05-01', 'labor day', 'عيد العمال', 22, '2022-06-02 10:47:40', '2022-06-02 10:47:40'),
(2, '2022-09-23', 'National Day holiday', 'عطلة اليوم الوطني', 154, '2022-08-13 18:51:34', '2022-08-13 18:51:34'),
(3, '2023-02-22', 'Founding Day Holiday', 'عطلة يوم التأسيس', 154, '2022-08-13 18:52:56', '2022-08-13 18:52:56'),
(4, '2022-09-22', 'Saudi National Day', 'اليوم الوطني السعودي', 18, '2022-09-14 14:07:12', '2022-09-14 14:07:12'),
(5, '2022-10-06', '6 October', 'السادس من أكتوبر', 157, '2022-09-26 22:12:12', '2022-09-26 22:12:12'),
(7, '2022-10-06', 'نصر اكتوبر', '6اكتوبر', 22, '2022-10-20 13:48:51', '2022-10-20 13:48:51'),
(8, '2023-02-22', 'Foundation Day', 'يوم التأسيس', 19, '2023-01-01 11:41:30', '2023-01-01 11:41:30'),
(9, '2023-02-22', 'Foundation Day', 'يوم التأسيس', 18, '2023-01-01 11:42:31', '2023-01-01 11:42:31'),
(10, '2023-02-22', 'Foundation Day', 'يوم التأسيس', 500, '2023-01-01 11:52:02', '2023-01-01 11:52:02'),
(11, '2023-02-16', 'فقسث', 'فثسف', 22, '2023-02-20 13:21:56', '2023-02-20 13:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_types`
--

CREATE TABLE `holiday_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holiday_types`
--

INSERT INTO `holiday_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'normal', 'عادية', 2, '2022-02-27 23:50:23', '2022-02-27 23:50:23');

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE `indicators` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` int NOT NULL DEFAULT '0',
  `department` int NOT NULL DEFAULT '0',
  `designation` int NOT NULL DEFAULT '0',
  `rating` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_experience` int NOT NULL DEFAULT '0',
  `marketing` int NOT NULL DEFAULT '0',
  `administration` int NOT NULL DEFAULT '0',
  `professionalism` int NOT NULL DEFAULT '0',
  `integrity` int NOT NULL DEFAULT '0',
  `attendance` int NOT NULL DEFAULT '0',
  `created_user` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indicators`
--

INSERT INTO `indicators` (`id`, `branch`, `department`, `designation`, `rating`, `customer_experience`, `marketing`, `administration`, `professionalism`, `integrity`, `attendance`, `created_user`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'null', 0, 0, 0, 0, 0, 0, 3, 2, '2022-05-15 10:37:51', '2022-05-15 10:37:51'),
(2, 1, 1, 1, 'null', 0, 0, 0, 0, 0, 0, 3, 2, '2022-05-17 12:32:36', '2022-05-17 12:32:36'),
(3, 10, 9, 9, '{\"3\":\"3\"}', 0, 0, 0, 0, 0, 0, 22, 22, '2022-05-31 15:41:56', '2022-06-08 14:36:55'),
(6, 3, 2, 2, 'null', 0, 0, 0, 0, 0, 0, 18, 18, '2022-11-09 14:45:03', '2022-11-09 14:45:03'),
(7, 4, 42, 3, 'null', 0, 0, 0, 0, 0, 0, 19, 19, '2022-11-30 13:50:20', '2022-11-30 13:50:20');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `insurance_companies`
--

INSERT INTO `insurance_companies` (`id`, `name`, `created_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'شركة الحياة للتامين', 22, NULL, '2022-10-19 15:04:03', '2022-10-19 15:11:37'),
(5, 'شركة مصر للتامين', 22, NULL, '2022-10-19 15:11:58', '2022-10-19 15:11:58'),
(6, 'Tmni', 68, '2022-10-31 15:03:00', '2022-10-31 15:02:35', '2022-10-31 15:03:00'),
(7, 'شركة سلامة للتامين التعاوني', 154, NULL, '2022-11-12 00:43:54', '2022-11-12 00:43:54');

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

CREATE TABLE `interview_schedules` (
  `id` bigint UNSIGNED NOT NULL,
  `candidate` int NOT NULL,
  `employee` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_response` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_out_logs`
--

CREATE TABLE `in_out_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `time_calc` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ip_restricts`
--

CREATE TABLE `ip_restricts` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `requirement` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `branch` int NOT NULL DEFAULT '0',
  `category` int NOT NULL DEFAULT '0',
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `position` int DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visibility` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `requirement`, `branch`, `category`, `skill`, `position`, `start_date`, `end_date`, `status`, `applicant`, `visibility`, `code`, `custom_question`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Telesales', 'We are hiring a talented Telesales Representative professional to join our team. If you\'re excited to be part of team, Badia Tec Co. is a great place to grow your career.\r\n\r\nResponsibilities :\r\n\r\n• Research and recommend prospects for new business opportunities\r\n• Research and analyze sales options\r\n• Build and maintain relationships with clients and prospects\r\n• Stay current with trends and competitors to identify improvements or recommend new products\r\n• Collect and analyze information and prepare data and sales reports\r\n• Build and maintain professional networks\r\n• Meet with potential clients to determine their needs\r\n\r\nQualifications for Sales Executive :\r\n\r\n• Bachelor degree\r\n• 1–3 years of relevant experience in sales, preferably in e-learning, digital education, education, and IT sectors\r\n• Competency in English\r\n• Proven experience as Telesales representative or other sales/customer service role\r\n• Proven track record of successfully meeting sales quota preferably over the phone\r\n• Good knowledge of relevant computer programs (e.g. CRM software) and telephone systems\r\n• Knowledge of MS Office software and CRM software\r\n• Ability to negotiate and understanding of marketing skills\r\n• Self-motivated and goal-oriented, desire to deliver results\r\n• Ability to create and deliver presentations\r\n• Fast learner and quick thinker\r\n• Passionate about sales\r\n• Excellent communication skills.\r\nProblem-solving skills\r\n• Ability to adapt and grow in a competitive environment\r\n\r\n\r\nIf you interested to join us, you can apply now throw the below link :\r\nhttps://docs.google.com/forms/d/1YGFfkH4iADIWuCvtXZOt5QUgfYWTWHvLGQw-wnIztkg/edit', 'Bachelor degree\r\n• 1–3 years of relevant experience in sales, preferably in e-learning, digital education, education, and IT sectors\r\n• Competency in English\r\n• Proven experience as Telesales representative or other sales/customer service role\r\n• Proven track record of successfully meeting sales quota preferably over the phone\r\n• Good knowledge of relevant computer programs (e.g. CRM software) and telephone systems\r\n• Knowledge of MS Office software and CRM software\r\n• Ability to negotiate and understanding of marketing skills\r\n• Self-motivated and goal-oriented, desire to deliver results\r\n• Ability to create and deliver presentations\r\n• Fast learner and quick thinker\r\n• Passionate about sales\r\n• Excellent communication skills.\r\nProblem-solving skills\r\n• Ability to adapt and grow in a competitive environment', 10, 1, '• Excellent communication skills.', 3, '2022-08-14', '2022-09-14', 'active', '', '', '62fe137a96c42', '', 22, '2022-08-18 12:24:58', '2022-08-18 12:26:29');

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE `jobtitles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobtitles`
--

INSERT INTO `jobtitles` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'مدير', 2, '2022-02-20 17:04:47', '2022-02-20 17:34:00'),
(2, 'employee', 'موظف', 18, '2022-04-27 05:51:54', '2022-04-27 05:51:54'),
(3, 'Employee', 'Employee', 19, '2022-04-27 09:02:49', '2022-10-12 13:27:48'),
(4, 'employee', 'موظف', 20, '2022-04-27 09:26:20', '2022-04-27 09:26:20'),
(5, 'employee', 'موظف', 21, '2022-04-27 10:41:19', '2022-04-27 10:41:19'),
(6, 'Employee', 'موظف', 22, '2022-04-27 10:58:50', '2022-05-18 12:57:30'),
(7, 'employee', 'موظف', 23, '2022-04-28 06:11:20', '2022-04-28 06:11:20'),
(8, 'employee', 'موظف', 24, '2022-04-28 06:15:16', '2022-04-28 06:15:16'),
(9, 'CTO', 'مدير التكنولوجيا التنفيذي', 22, '2022-05-17 13:22:51', '2022-05-18 12:43:04'),
(10, 'Social media specialist', 'أخصائي مواقع التواصل الاجتماعي', 22, '2022-05-17 13:23:06', '2022-05-18 12:51:07'),
(11, 'Motion Graphic', 'موشن جرافيك', 22, '2022-05-17 13:23:23', '2022-05-18 12:49:18'),
(12, 'Backend Developer', 'مطور الواجهة الخلفية', 22, '2022-05-17 13:23:39', '2022-05-18 12:42:20'),
(13, 'Mobile developer', 'مطور تطبيقات الهواتف الذكية', 22, '2022-05-17 13:23:51', '2022-05-18 12:48:36'),
(14, 'UI/UX DESIGNER', 'مصمم واجهة المستخدم', 22, '2022-05-17 13:24:36', '2022-05-18 12:53:33'),
(15, 'Senior Mobile Developer', 'سنيور مطور تطبيقات الهواتف الذكية', 22, '2022-05-17 13:24:50', '2022-05-18 12:50:39'),
(16, 'Full Stack Developer', 'مطوّر الويب المتكامل', 22, '2022-05-17 15:04:24', '2022-05-18 12:46:13'),
(17, 'Frontend Developer', 'مُطوّر الواجهة الأمامية', 22, '2022-05-17 15:09:55', '2022-05-18 12:45:09'),
(18, 'Media Buyer', 'مسؤول شراء وسائط إعلامية', 22, '2022-05-17 15:10:20', '2022-05-18 12:47:13'),
(19, 'HR Manger', 'مدير الموارد البشرية', 22, '2022-05-18 12:56:58', '2022-05-18 12:56:58'),
(20, 'Managing Director', 'مدير ادارى', 22, '2022-05-19 09:10:45', '2022-05-19 09:10:45'),
(21, 'Accountant', 'محاسب', 22, '2022-05-19 09:11:29', '2022-05-19 09:11:29'),
(22, 'Financial Manager', 'مدير مالى', 22, '2022-05-19 09:11:45', '2022-05-19 09:11:45'),
(23, 'Office boy', 'ساعي المكتب', 22, '2022-05-19 09:14:41', '2022-05-19 09:14:41'),
(24, 'Sales manager', 'مدير المبيعات', 22, '2022-05-19 09:15:24', '2022-05-19 09:15:24'),
(25, 'Sales Executive', 'مسئول المبيعات', 22, '2022-05-19 09:16:11', '2022-05-19 09:16:38'),
(26, 'Copywriter', 'كاتب محتوى', 22, '2022-05-22 07:44:33', '2022-05-22 07:44:33'),
(27, 'Graphic designer', 'مصمم جرافيك', 22, '2022-06-02 10:00:47', '2022-06-02 10:00:47'),
(28, 'SEO specialist', 'أخصائي تحسين محركات البحث', 22, '2022-06-02 10:01:17', '2022-06-02 10:01:17'),
(29, 'اخصائي تسويق الكتروني', 'Digital Marketing Specialist', 22, '2022-06-25 23:18:37', '2022-06-25 23:18:37'),
(30, 'hr', 'الموارد البشرية', 2, '2022-07-04 10:04:40', '2022-07-04 10:04:40'),
(44, 'General Director', 'المدير العام', 22, '2022-08-03 14:55:00', '2022-08-03 14:56:37'),
(51, 'Personnel operations officer', 'مسؤول عمليات موظفين', 154, '2022-08-13 18:22:56', '2022-08-13 18:23:29'),
(52, 'Administrative Operations Officer', 'مسؤول عمليات إدارية', 154, '2022-08-13 18:24:08', '2022-08-13 18:24:08'),
(53, 'Administration and Personnel Operations Supervisor', 'مشرف عمليات الشؤون الإدارية و الموظفين', 154, '2022-08-13 18:25:18', '2022-08-13 18:25:18'),
(54, 'Operation Department Officer', 'مسؤول إدارة التشغيل', 154, '2022-08-13 18:26:23', '2022-08-13 18:26:23'),
(55, 'Senior Operations Manager', 'مسؤول اول إدارة التشغيل', 154, '2022-08-13 18:31:07', '2022-08-13 18:31:07'),
(56, 'Operation Department Superviso', 'مشرف إدارة التشغيل', 154, '2022-08-13 18:33:02', '2022-08-13 18:33:02'),
(57, 'accountant', 'محاسب', 154, '2022-08-13 18:34:38', '2022-08-13 18:34:38'),
(58, 'Account Management Supervisor', 'مشرف إدارة الحسابات', 154, '2022-08-13 18:35:09', '2022-08-13 18:35:09'),
(59, 'Managing Director', 'المدير الإداري', 154, '2022-08-13 18:35:46', '2022-08-13 18:35:46'),
(60, 'General Director', 'المدير العام', 154, '2022-08-13 18:36:06', '2022-08-13 18:36:06'),
(61, 'Chief Executive Officer', 'الرئيس التنفيذي', 18, '2022-09-13 11:34:51', '2022-09-13 11:35:14'),
(63, 'Secretary', 'سكرتيرة', 18, '2022-09-14 15:18:43', '2022-09-14 15:18:43'),
(64, 'Dierctor General', 'مدير عام', 18, '2022-09-15 10:38:38', '2022-09-15 11:00:36'),
(65, 'Project Manager', 'مدير مشروع', 18, '2022-09-15 10:39:47', '2022-09-15 10:39:47'),
(66, 'Chief Technical Officer', 'المدير التقني', 18, '2022-09-15 10:57:55', '2022-09-15 10:57:55'),
(67, 'Chief Financial Officer', 'المدير المالي', 18, '2022-09-15 10:59:47', '2022-09-15 10:59:47'),
(68, 'Business Development', 'مطور اعمال', 18, '2022-09-17 12:04:21', '2022-09-17 12:04:21'),
(69, 'Technical support', 'الدعم الفني', 18, '2022-09-17 12:04:44', '2022-09-17 12:04:44'),
(70, 'Sales Specialist', 'أخصائي مبيعات', 18, '2022-09-17 13:07:07', '2022-09-17 13:07:07'),
(71, 'Hr Manager', 'مدير الموارد البشرية', 157, '2022-09-26 22:10:18', '2022-09-26 22:10:18'),
(72, 'اخصائي مبيعات', 'مبيعات', 21, '2022-10-05 14:25:21', '2022-11-17 13:20:39'),
(73, 'TEA BOY', 'TEA BOY', 19, '2022-10-07 16:07:47', '2022-10-07 16:07:47'),
(74, 'sales', 'sales', 19, '2022-10-07 16:52:42', '2022-10-12 13:08:05'),
(75, 'platform managet', 'platform managet', 18, '2022-10-07 17:03:06', '2022-10-07 17:03:06'),
(76, 'Operation and development manager', 'Operation and development manager', 21, '2022-10-08 16:54:21', '2022-10-08 16:54:21'),
(77, 'Technical support employee', 'Technical support employee', 21, '2022-10-08 16:54:44', '2022-10-08 16:54:44'),
(78, 'HR Assistant', 'مساعد موارد بشريه', 21, '2022-10-08 16:55:28', '2022-10-08 16:55:28'),
(79, 'HR Assistant', 'HR Assistant', 19, '2022-10-12 09:02:34', '2022-10-12 09:02:34'),
(80, 'IT', 'IT', 19, '2022-10-12 13:08:56', '2022-10-12 13:08:56'),
(81, 'OfficeBoy', 'OfficeBoy', 19, '2022-10-12 13:11:12', '2022-10-12 13:11:12'),
(82, 'Technical support employee', 'Technical support employee', 19, '2022-10-12 14:18:28', '2022-10-12 14:18:28'),
(83, 'Accountant', 'Accountant', 19, '2022-10-12 14:35:48', '2022-10-12 14:35:48'),
(84, 'Business Development', 'Business Development', 19, '2022-10-12 14:36:19', '2022-10-12 14:36:19'),
(85, 'Business Development', 'Business Development', 19, '2022-10-12 14:36:21', '2022-10-12 14:36:21'),
(86, 'Platform managet', 'Platform managet', 19, '2022-10-19 11:03:37', '2022-10-19 11:03:37'),
(87, 'Operations', 'Operations', 19, '2022-10-20 09:00:32', '2022-10-20 09:00:32'),
(88, 'Operations', 'Operations', 19, '2022-10-20 09:00:34', '2022-10-20 09:00:34'),
(89, 'Operations', 'Operations', 19, '2022-10-20 09:00:35', '2022-10-20 09:00:35'),
(90, 'Operations', 'Operations', 19, '2022-10-20 09:00:37', '2022-10-20 09:00:37'),
(91, 'Sales manager', 'مدير المبيعات', 362, '2022-10-23 09:08:37', '2022-10-23 09:08:37'),
(92, 'sales spacialist', 'اخصائي مبيعات', 362, '2022-10-26 10:54:27', '2022-10-26 10:54:27'),
(93, 'Executive Sales Manager', 'مدير تنفيذي للمبيعات', 362, '2022-11-03 14:18:09', '2022-11-03 14:18:09'),
(94, 'سائق', 'سائق', 154, '2022-11-06 21:43:23', '2022-11-06 21:43:23'),
(95, 'General Manager', 'المدير العام', 68, '2022-11-10 10:22:39', '2022-11-10 10:22:39'),
(96, 'Executive Director', 'المدير التنفيذي', 68, '2022-11-10 10:23:39', '2022-11-10 10:23:39'),
(97, 'Financial Manager', 'المدير المالي', 68, '2022-11-10 10:24:14', '2022-11-10 10:24:14'),
(98, 'Electrical Engineer', 'مهندس كهرباء', 68, '2022-11-10 10:25:29', '2022-11-10 10:25:29'),
(99, 'Civil Engineer', 'مهندس مدني', 68, '2022-11-10 10:26:03', '2022-11-10 10:26:32'),
(100, 'General Accountant', 'محاسب عام', 68, '2022-11-10 10:27:16', '2022-11-10 10:27:16'),
(101, 'Labor supervisor', 'مشرف', 68, '2022-11-10 10:28:27', '2022-11-10 10:29:13'),
(102, 'Driver', 'سائق', 68, '2022-11-10 10:29:47', '2022-11-10 10:29:47'),
(103, 'Electricity technician', 'فني كهرباء', 68, '2022-11-10 10:30:30', '2022-11-10 10:30:30'),
(104, 'car mechanic', 'ميكانيكي سيارات', 68, '2022-11-10 10:31:17', '2022-11-10 10:31:17'),
(105, 'Smith', 'حداد', 68, '2022-11-10 10:32:14', '2022-11-10 10:32:14'),
(106, 'Workers', 'عمال', 68, '2022-11-10 10:32:41', '2022-11-10 10:33:16'),
(107, 'Separate and repeat', 'فصل و اعاده', 68, '2022-11-10 10:34:12', '2022-11-10 10:34:12'),
(108, 'Saudi', 'سعوده', 68, '2022-11-10 10:34:40', '2022-11-10 10:34:40'),
(109, 'Safety engineer', 'مهندس سلامة', 68, '2022-11-10 10:35:27', '2022-11-10 10:35:27'),
(110, 'Data Entry', 'مدخل بيانات', 68, '2022-11-10 10:35:50', '2022-11-10 10:35:50'),
(111, 'Expeditor', 'معقب', 68, '2022-11-10 12:23:16', '2022-11-10 12:23:16'),
(112, 'Electricity', 'خاص الكهرباء', 68, '2022-11-10 13:19:34', '2022-11-10 13:19:34'),
(113, 'Customer data writer', 'كاتب بيانات عملاء', 154, '2022-11-12 00:28:13', '2022-11-12 00:28:13'),
(114, 'Marketing specialist', 'اختصاصي تسويق', 154, '2022-11-12 00:57:35', '2022-11-12 00:57:35'),
(115, 'equipment driver', 'سائق باسكت', 68, '2022-11-15 08:29:57', '2022-11-15 08:29:57'),
(116, 'equipment driver', 'سائق بوكيت', 68, '2022-11-15 08:30:27', '2022-11-15 08:30:27'),
(117, 'equipment driver', 'سائق ترنشر', 68, '2022-11-15 08:30:43', '2022-11-15 08:30:43'),
(118, 'equipment driver', 'سائق باكلودر', 68, '2022-11-15 08:31:01', '2022-11-15 08:31:01'),
(119, 'equipment driver', 'سائق شيول', 68, '2022-11-15 08:31:19', '2022-11-15 08:31:19'),
(120, 'equipment driver', 'سائق رصاصه', 68, '2022-11-15 08:31:31', '2022-11-15 08:31:31'),
(121, 'personal driver', 'سائق خاص', 68, '2022-11-15 08:31:54', '2022-11-15 08:31:54'),
(122, 'Executive Sales Manager', 'مدير تنفيذي للمبيعات', 18, '2022-11-15 13:07:53', '2022-11-15 13:07:53'),
(123, 'مدير تطوير', 'مدير تطوير', 501, '2022-11-17 13:05:16', '2022-11-17 13:05:16'),
(124, 'مدير مشروع', 'مدير مشروع', 501, '2022-11-17 13:05:36', '2022-11-17 13:05:36'),
(125, 'مدير تطوير', 'مدير تطوير', 21, '2022-11-17 13:19:49', '2022-11-17 13:19:49'),
(126, 'Accountant', 'محاسب', 500, '2022-11-20 10:16:04', '2022-11-20 10:16:04'),
(127, 'اخصائي مبيعات', 'اخصائي مبيعات', 500, '2022-11-20 10:17:20', '2022-11-20 11:47:20'),
(128, 'Executive Sales Manager', 'المدير التنفيذي للمبيعات', 500, '2022-12-18 10:48:05', '2022-12-18 10:48:05'),
(129, 'Internist', 'طبيب باطني', 526, '2022-12-28 07:40:14', '2022-12-28 07:40:14'),
(130, 'OB Gyn', 'نساء و توليد', 526, '2022-12-28 07:42:00', '2022-12-28 07:42:00'),
(131, 'Pediatrician', 'طبيب اطفال', 526, '2022-12-28 07:42:49', '2022-12-28 07:42:49'),
(132, 'Dentist', 'طبيب اسنان', 526, '2022-12-28 07:43:24', '2022-12-28 07:43:24'),
(133, 'Gp', 'طبيب عام', 526, '2022-12-28 07:44:13', '2022-12-28 07:44:13'),
(134, 'Lap Specialist', 'اخصائي معمل', 526, '2022-12-28 07:46:29', '2022-12-28 07:46:29'),
(135, 'XRAY Specialist', 'اخصائي اشعة', 526, '2022-12-28 07:47:16', '2022-12-28 07:47:16'),
(136, 'Lap technician', 'فني معمل', 526, '2022-12-28 07:49:08', '2022-12-28 07:49:08'),
(137, 'XRAY technician', 'فني اشعة', 526, '2022-12-28 07:50:13', '2022-12-28 07:50:13'),
(138, 'Nurse', 'ممرضه', 526, '2022-12-28 07:51:59', '2022-12-28 07:51:59'),
(139, 'General Manager', 'مدير عام', 526, '2022-12-28 07:52:49', '2022-12-28 07:52:49'),
(140, 'Receptionist', 'موظف الاستقبال', 526, '2022-12-28 07:54:29', '2022-12-28 07:54:29'),
(141, 'Accountant', 'محاسب', 526, '2022-12-28 07:54:51', '2022-12-28 07:54:51'),
(142, 'Purchasing Manager', 'مسؤول الشراء', 526, '2022-12-28 07:57:29', '2022-12-28 07:57:29'),
(143, 'Marketing Specialist', 'اخصائي تسويق', 526, '2022-12-28 07:58:27', '2022-12-28 07:58:27'),
(144, 'common labour', 'common labour', 526, '2022-12-28 08:02:03', '2022-12-28 08:02:03'),
(145, 'Cleaner', 'عامل نظافة', 526, '2022-12-28 08:02:37', '2022-12-28 08:02:37'),
(146, 'Consultant', 'مستشار', 526, '2022-12-28 08:04:54', '2022-12-28 08:04:54'),
(147, 'Public relations', 'موظف علاقات عامة', 526, '2022-12-28 08:06:19', '2022-12-28 08:06:19'),
(148, 'Medical & pharma Scienes Specialist', 'اخصائي علوم طبيه و صيدلانية', 526, '2022-12-28 08:08:43', '2022-12-28 08:08:43'),
(149, 'فني كهرباء', 'فني كهرباء', 154, '2022-12-31 20:43:19', '2022-12-31 20:43:42');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint UNSIGNED NOT NULL,
  `job` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_letter` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` int NOT NULL DEFAULT '1',
  `order` int NOT NULL DEFAULT '0',
  `skill` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `rating` int NOT NULL DEFAULT '0',
  `is_archive` int NOT NULL DEFAULT '0',
  `custom_question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `job`, `name`, `email`, `phone`, `profile`, `resume`, `cover_letter`, `dob`, `gender`, `country`, `state`, `city`, `stage`, `order`, `skill`, `rating`, `is_archive`, `custom_question`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'test', 'badia-eg@tecbadia.com', '01092299324', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 0, 0, 'null', 22, '2022-09-12 19:08:09', '2022-09-12 19:08:09');

-- --------------------------------------------------------

--
-- Table structure for table `job_application_notes`
--

CREATE TABLE `job_application_notes` (
  `id` bigint UNSIGNED NOT NULL,
  `application_id` int NOT NULL DEFAULT '0',
  `note_created` int NOT NULL DEFAULT '0',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`, `title_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Full Time', 0, 22, '2022-08-18 12:23:25', '2022-08-18 12:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_answers`
--

CREATE TABLE `job_offer_answers` (
  `id` bigint UNSIGNED NOT NULL,
  `job_offer_user_id` bigint UNSIGNED NOT NULL,
  `company_job_request_id` bigint UNSIGNED NOT NULL,
  `job_offer_question_id` bigint UNSIGNED NOT NULL,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_questions`
--

CREATE TABLE `job_offer_questions` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_offer_section_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `point` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_offer_questions`
--

INSERT INTO `job_offer_questions` (`id`, `title`, `job_offer_section_id`, `type`, `point`, `created_at`, `updated_at`) VALUES
(1, 'this is question content', 1, 'single_select', 0.00, '2023-04-10 14:58:54', '2023-04-10 14:58:54'),
(2, 'الاسم', 2, 'short_text', 10.00, '2023-04-12 13:08:37', '2023-04-12 13:08:37'),
(3, 'العمر', 2, 'short_text', 5.00, '2023-04-12 13:08:37', '2023-04-12 13:08:37'),
(4, 'this is question content', 3, 'multi_select', 0.00, '2023-04-12 13:08:37', '2023-04-12 13:08:37'),
(5, 'this is question content12222', 3, 'single_select', 0.00, '2023-04-12 13:08:37', '2023-04-12 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_question_options`
--

CREATE TABLE `job_offer_question_options` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_offer_question_id` bigint UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_sections`
--

CREATE TABLE `job_offer_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_job_request_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_offer_sections`
--

INSERT INTO `job_offer_sections` (`id`, `title`, `company_job_request_id`, `created_at`, `updated_at`) VALUES
(1, 'section title 1', 7, '2023-04-10 14:58:54', '2023-04-10 14:58:54'),
(2, 'المعلومات الاساسية', 9, '2023-04-12 13:08:37', '2023-04-12 13:08:37'),
(3, 'section title 2', 9, '2023-04-12 13:08:37', '2023-04-12 13:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_users`
--

CREATE TABLE `job_offer_users` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_job_request_id` bigint UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality_id` bigint UNSIGNED NOT NULL,
  `qualification_id` bigint UNSIGNED NOT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_of_study` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `portfolio_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT '0',
  `interview_from` timestamp NULL DEFAULT NULL,
  `interview_to` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_offer_users`
--

INSERT INTO `job_offer_users` (`id`, `created_at`, `updated_at`, `cv`, `company_job_request_id`, `name`, `date_of_birth`, `gender`, `nationality_id`, `qualification_id`, `country`, `city`, `area`, `phone`, `email`, `field_of_study`, `university`, `graduation_year`, `grade`, `portfolio_link`, `is_seen`, `interview_from`, `interview_to`) VALUES
(1, '2023-04-12 12:08:34', '2023-04-18 10:44:39', 'cv/ycpeARDDW4MAbIgdNWTRZOsAhsSnEZliT1ARLzUx.png', 7, 'kero', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '2023-04-12 13:10:59', '2023-05-01 12:19:48', 'cv/kI6qFPVmF3QQWntQEEQhb5s18GmZWYvHt3NU93cT.jpg', 9, 'كيرلس', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(3, '2023-04-12 13:11:23', '2023-04-12 13:11:23', 'cv/CGEHS4HHgO1nPKYACP6Dc5wzIznTMzpEVqoJUkk7.jpg', 9, 'كيرلس', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(4, '2023-04-12 13:23:20', '2023-04-12 13:23:20', 'cv/iWuFSxS4PwG9fuMF5E4qMbj8ICu21GU1gBCwDCBO.jpg', 9, '111', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(5, '2023-04-12 13:24:40', '2023-04-12 13:24:40', 'cv/umVTqLZVbzKzxAMByAMmopHgYKFXjC8uOtq0p922.jpg', 9, 'Lysandra Lowery', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(6, '2023-04-12 13:28:17', '2023-04-12 13:28:17', 'cv/puItRKZZu5715ba7jYkJxKLo27mnda1OTyWY3Zo8.png', 9, 'Darrel Swanson', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(7, '2023-04-12 13:29:15', '2023-04-12 13:29:15', 'cv/RPaiGRzfdlW7fKggdbWPUsluiFcItuePKQY6nhGk.png', 9, 'Darrel Swanson', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(8, '2023-04-12 13:30:03', '2023-04-12 13:30:03', 'cv/KCQvMLdz3AWK9z3PpxlUCXziw0zdQQhlrs1cy5ww.png', 9, 'Darrel Swanson', '0000-00-00', '', 0, 0, '', '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job_on_boards`
--

CREATE TABLE `job_on_boards` (
  `id` bigint UNSIGNED NOT NULL,
  `application` int NOT NULL,
  `joining_date` date DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convert_to_employee` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

CREATE TABLE `job_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `company_job_request_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `findus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interview_day` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `education` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `experience` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_profile` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `join_us_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_read` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_requests`
--

INSERT INTO `job_requests` (`id`, `company_job_request_id`, `name`, `email`, `phone`, `cv`, `message`, `age`, `role`, `findus`, `interview_day`, `field`, `created_at`, `updated_at`, `address`, `education`, `experience`, `linkedin_profile`, `join_us_date`, `salary`, `english_rate`, `is_read`) VALUES
(3, '4', 'Amethyst Sharpe', 'qewuj@mailinator.com', '+1 (831) 887-4455', 'uploads/cvs/rYTZyLltqHFjP1z53IjVA7OBYVfgw8N8o2X8nxjv.pdf', 'Pariatur Fugit sit', '31', 'other', 'facebook', 'Saturday', '[\"Senior Frontend Developer\",\"Senior Backend Developer\",\"Mid-Level Backend Developer\",\"Senior Java Developer\",\"Java Engineer Developer\",\"WordPress Developer\",\"Mobile Developer\",\"UI UX Designer\",\"Digital Marketing Manager\",\"Community Manager\",\"Graphic Designer\",\"Business Development\",\"Sales Executive\",\"Telesales Representative\",\"Customer Service Representative\",\"Administrative Secretary\"]', '2022-11-27 11:51:34', '2022-11-27 11:51:34', 'Ullamco quis archite', 'Est dolorem aute ex', 'Maxime optio ut in', 'https://manager.mwardi.com/vacancies/eyJpdiI6IkZXZlpWbjE5WDdhRTZKWDd5c1F5MFE9PSIsInZhbHVlIjoiYzBpY29CSFMvZ2REdm1aV0xJa1dMUT09IiwibWFjIjoiYjhmN2ExYTgwMTNlZWEyNDllMWMxM2Y2MWEyMzBiNGI2ZDFjYWMyY2U4ODRiOTQwY2ExZmJlMjUzYTY1ZTUyNSIsInRhZyI6IiJ9', '1977-03-15', '99', '2', 0),
(4, '4', 'test', 'hand.qahtani@bobrgroup.com', '0542638322', 'uploads/cvs/feFJP07fKukswbc8zBiHRy4Kf1x1Z3haXjDYJkNA.pdf', 'test', '29', 'full', 'twitter', 'Sunday', '[\"Sales Manager\",\"Other\"]', '2022-11-27 14:55:12', '2022-11-27 14:55:12', 'test', 'test', 'test', '', '2022-11-28', '100', '3', 0),
(5, '3', 'Jolene Mcmahon', 'rymumuniju@mailinator.com', '+1 (513) 587-3521', 'uploads/cvs/3GPhl2A1JgMn8xIoAXdpkw1WWHPauxpKqOCiRJOd.pdf', 'Aliquid nisi incidid', '86', 'part', 'facebook', 'Monday', '[\"Senior Frontend Developer\",\"Senior Backend Developer\",\"Senior Frontend Developer\",\"Senior Java Developer\",\"Mid-Level Frontend Developer\",\"Full Stack Web Developer\",\"WordPress Developer\",\"Mobile Developer\",\"Digital Marketing Manager\",\"Social Media Specialist\",\"Motion Graphic\",\"Media Buyer\",\"Sales Manager\",\"Sales Executive\",\"Other\"]', '2022-11-27 12:15:26', '2022-11-27 12:15:26', 'Voluptatem dicta es', 'Nostrum tempor sed s', 'Sit explicabo Aliqu', 'https://manager.mwardi.com/vacancies/eyJpdiI6InZsQzBFcFZIUGNPdkpYL3ZsaDdVVnc9PSIsInZhbHVlIjoiNjFUcTg2czNNUHlnSzQ0ckVGeko1QT09IiwibWFjIjoiNmRlMGU1OTU2MTlkYjE4MDQxODZlNWU3ODc3YTA5Mzk0MzNhZTg1NTczYjRjNTdkNzEwMTNmZGI5YzY1NjIwNCIsInRhZyI6IiJ9', '1999-02-15', '21', '2', 0),
(6, '4', 'Todd Phillips', 'kanyqubos@mailinator.com', '+1 (465) 477-2998', 'uploads/cvs/xeETk6cUcXdd3hxecbIj15KL1Wocd04ezqchBxU1.pdf', 'Fugit alias volupta', '69', 'full', 'twitter', 'Tuesday', '[\"Full Stack Web Developer\",\"iOS Developers\",\"WordPress Developer\",\"UI UX Designer\",\"Digital Marketing Specialist\",\"Social Media Specialist\",\"Copywriter\",\"Content Creator\",\"Business Development\",\"Business Developer\",\"Accountant\"]', '2022-11-27 18:06:29', '2022-11-27 18:06:29', 'Qui vel distinctio', 'Fugit facilis est', 'Qui quas ad in dolor', 'https://manager.mwardi.com/vacancies/eyJpdiI6IkZXZlpWbjE5WDdhRTZKWDd5c1F5MFE9PSIsInZhbHVlIjoiYzBpY29CSFMvZ2REdm1aV0xJa1dMUT09IiwibWFjIjoiYjhmN2ExYTgwMTNlZWEyNDllMWMxM2Y2MWEyMzBiNGI2ZDFjYWMyY2U4ODRiOTQwY2ExZmJlMjUzYTY1ZTUyNSIsInRhZyI6IiJ9', '1986-06-30', '79', '3', 0),
(7, '4', 'Amethyst Mcgee', 'lutew@mailinator.com', '+1 (296) 821-2597', 'uploads/cvs/nP140zg3eudXsp4nwjFGNseSmGT6wNJ8NBe5ouOz.pdf', 'Ea quibusdam maxime', '63', 'internship', 'linkedin', 'Thursday', '[\"Senior Frontend Developer\",\"Senior Backend Developer\",\"Senior Frontend Developer\",\"Mid-Level Backend Developer\",\"Senior Java Developer\",\"Java Engineer Developer\",\"Mid-Level Frontend Developer\",\"Senior Android Engineer\",\"Full Stack Web Developer\",\"iOS Developers\",\"WordPress Developer\",\"Mobile Developer\",\"UI UX Designer\",\"Digital Marketing Manager\",\"Social Media Specialist\",\"SEO Specialist\",\"Copywriter\",\"Graphic Designer\",\"Motion Graphic\",\"Business Development\",\"Media Buyer\",\"Sales Manager\",\"Sales Executive\",\"Telesales Representative\",\"Customer Service Representative\",\"Business Developer\",\"Accountant\",\"Other\"]', '2022-11-27 18:07:03', '2022-11-27 18:07:03', 'Sit illo eaque magn', 'Quia sint velit ut', 'Aute quis eligendi v', 'https://manager.mwardi.com/vacancies/eyJpdiI6IkZXZlpWbjE5WDdhRTZKWDd5c1F5MFE9PSIsInZhbHVlIjoiYzBpY29CSFMvZ2REdm1aV0xJa1dMUT09IiwibWFjIjoiYjhmN2ExYTgwMTNlZWEyNDllMWMxM2Y2MWEyMzBiNGI2ZDFjYWMyY2U4ODRiOTQwY2ExZmJlMjUzYTY1ZTUyNSIsInRhZyI6IiJ9', '1988-05-22', '4500', '2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `job_stages`
--

CREATE TABLE `job_stages` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_stages`
--

INSERT INTO `job_stages` (`id`, `title`, `title_ar`, `order`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Applied', '', 0, 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(2, 'Phone Screen', '', 0, 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(3, 'Interview', '', 0, 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(4, 'Hired', '', 0, 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(5, 'Rejected', '', 0, 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(6, 'Applied', '', 0, 18, '2022-04-26 09:12:32', '2022-04-26 09:12:32'),
(7, 'Phone Screen', '', 0, 18, '2022-04-26 09:12:32', '2022-04-26 09:12:32'),
(8, 'Interview', '', 0, 18, '2022-04-26 09:12:32', '2022-04-26 09:12:32'),
(9, 'Hired', '', 0, 18, '2022-04-26 09:12:32', '2022-04-26 09:12:32'),
(10, 'Rejected', '', 0, 18, '2022-04-26 09:12:32', '2022-04-26 09:12:32'),
(11, 'Applied', '', 0, 19, '2022-04-26 09:13:46', '2022-04-26 09:13:46'),
(12, 'Phone Screen', '', 0, 19, '2022-04-26 09:13:46', '2022-04-26 09:13:46'),
(13, 'Interview', '', 0, 19, '2022-04-26 09:13:46', '2022-04-26 09:13:46'),
(14, 'Hired', '', 0, 19, '2022-04-26 09:13:46', '2022-04-26 09:13:46'),
(15, 'Rejected', '', 0, 19, '2022-04-26 09:13:46', '2022-04-26 09:13:46'),
(16, 'Applied', '', 0, 20, '2022-04-26 09:14:40', '2022-04-26 09:14:40'),
(17, 'Phone Screen', '', 0, 20, '2022-04-26 09:14:40', '2022-04-26 09:14:40'),
(18, 'Interview', '', 0, 20, '2022-04-26 09:14:40', '2022-04-26 09:14:40'),
(19, 'Hired', '', 0, 20, '2022-04-26 09:14:40', '2022-04-26 09:14:40'),
(20, 'Rejected', '', 0, 20, '2022-04-26 09:14:40', '2022-04-26 09:14:40'),
(21, 'Applied', '', 0, 21, '2022-04-26 09:15:39', '2022-04-26 09:15:39'),
(22, 'Phone Screen', '', 0, 21, '2022-04-26 09:15:39', '2022-04-26 09:15:39'),
(23, 'Interview', '', 0, 21, '2022-04-26 09:15:39', '2022-04-26 09:15:39'),
(24, 'Hired', '', 0, 21, '2022-04-26 09:15:39', '2022-04-26 09:15:39'),
(25, 'Rejected', '', 0, 21, '2022-04-26 09:15:39', '2022-04-26 09:15:39'),
(26, 'Applied', '', 0, 22, '2022-04-26 09:16:54', '2022-04-26 09:16:54'),
(27, 'Phone Screen', '', 0, 22, '2022-04-26 09:16:54', '2022-04-26 09:16:54'),
(28, 'Interview', '', 0, 22, '2022-04-26 09:16:54', '2022-04-26 09:16:54'),
(29, 'Hired', '', 0, 22, '2022-04-26 09:16:54', '2022-04-26 09:16:54'),
(30, 'Rejected', '', 0, 22, '2022-04-26 09:16:54', '2022-04-26 09:16:54'),
(31, 'Applied', '', 0, 23, '2022-04-26 09:18:13', '2022-04-26 09:18:13'),
(32, 'Phone Screen', '', 0, 23, '2022-04-26 09:18:13', '2022-04-26 09:18:13'),
(33, 'Interview', '', 0, 23, '2022-04-26 09:18:13', '2022-04-26 09:18:13'),
(34, 'Hired', '', 0, 23, '2022-04-26 09:18:13', '2022-04-26 09:18:13'),
(35, 'Rejected', '', 0, 23, '2022-04-26 09:18:13', '2022-04-26 09:18:13'),
(36, 'Applied', '', 0, 24, '2022-04-26 09:19:04', '2022-04-26 09:19:04'),
(37, 'Phone Screen', '', 0, 24, '2022-04-26 09:19:04', '2022-04-26 09:19:04'),
(38, 'Interview', '', 0, 24, '2022-04-26 09:19:04', '2022-04-26 09:19:04'),
(39, 'Hired', '', 0, 24, '2022-04-26 09:19:04', '2022-04-26 09:19:04'),
(40, 'Rejected', '', 0, 24, '2022-04-26 09:19:04', '2022-04-26 09:19:04'),
(41, 'Applied', '', 0, 68, '2022-07-17 07:23:39', '2022-07-17 07:23:39'),
(42, 'Phone Screen', '', 0, 68, '2022-07-17 07:23:39', '2022-07-17 07:23:39'),
(43, 'Interview', '', 0, 68, '2022-07-17 07:23:39', '2022-07-17 07:23:39'),
(44, 'Hired', '', 0, 68, '2022-07-17 07:23:39', '2022-07-17 07:23:39'),
(45, 'Rejected', '', 0, 68, '2022-07-17 07:23:39', '2022-07-17 07:23:39'),
(46, 'Applied', '', 0, 154, '2022-08-11 17:04:38', '2022-08-11 17:04:38'),
(47, 'Phone Screen', '', 0, 154, '2022-08-11 17:04:38', '2022-08-11 17:04:38'),
(48, 'Interview', '', 0, 154, '2022-08-11 17:04:38', '2022-08-11 17:04:38'),
(49, 'Hired', '', 0, 154, '2022-08-11 17:04:38', '2022-08-11 17:04:38'),
(50, 'Rejected', '', 0, 154, '2022-08-11 17:04:38', '2022-08-11 17:04:38'),
(51, 'Applied', '', 0, 157, '2022-08-24 09:48:46', '2022-08-24 09:48:46'),
(52, 'Phone Screen', '', 0, 157, '2022-08-24 09:48:46', '2022-08-24 09:48:46'),
(53, 'Interview', '', 0, 157, '2022-08-24 09:48:46', '2022-08-24 09:48:46'),
(54, 'Hired', '', 0, 157, '2022-08-24 09:48:46', '2022-08-24 09:48:46'),
(55, 'Rejected', '', 0, 157, '2022-08-24 09:48:46', '2022-08-24 09:48:46'),
(56, 'Applied', '', 0, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21'),
(57, 'Phone Screen', '', 0, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21'),
(58, 'Interview', '', 0, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21'),
(59, 'Hired', '', 0, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21'),
(60, 'Rejected', '', 0, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21'),
(61, 'Applied', '', 0, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28'),
(62, 'Phone Screen', '', 0, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28'),
(63, 'Interview', '', 0, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28'),
(64, 'Hired', '', 0, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28'),
(65, 'Rejected', '', 0, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28'),
(66, 'Applied', '', 0, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31'),
(67, 'Phone Screen', '', 0, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31'),
(68, 'Interview', '', 0, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31'),
(69, 'Hired', '', 0, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31'),
(70, 'Rejected', '', 0, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31'),
(71, 'Applied', '', 0, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38'),
(72, 'Phone Screen', '', 0, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38'),
(73, 'Interview', '', 0, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38'),
(74, 'Hired', '', 0, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38'),
(75, 'Rejected', '', 0, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38'),
(76, 'Applied', '', 0, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35'),
(77, 'Phone Screen', '', 0, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35'),
(78, 'Interview', '', 0, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35'),
(79, 'Hired', '', 0, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35'),
(80, 'Rejected', '', 0, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35'),
(81, 'Applied', '', 0, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05'),
(82, 'Phone Screen', '', 0, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05'),
(83, 'Interview', '', 0, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05'),
(84, 'Hired', '', 0, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05'),
(85, 'Rejected', '', 0, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05'),
(86, 'Applied', '', 0, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56'),
(87, 'Phone Screen', '', 0, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56'),
(88, 'Interview', '', 0, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56'),
(89, 'Hired', '', 0, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56'),
(90, 'Rejected', '', 0, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56'),
(91, 'Applied', '', 0, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19'),
(92, 'Phone Screen', '', 0, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19'),
(93, 'Interview', '', 0, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19'),
(94, 'Hired', '', 0, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19'),
(95, 'Rejected', '', 0, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19'),
(96, 'Applied', '', 0, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29'),
(97, 'Phone Screen', '', 0, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29'),
(98, 'Interview', '', 0, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29'),
(99, 'Hired', '', 0, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29'),
(100, 'Rejected', '', 0, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29'),
(101, 'Applied', '', 0, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42'),
(102, 'Phone Screen', '', 0, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42'),
(103, 'Interview', '', 0, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42'),
(104, 'Hired', '', 0, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42'),
(105, 'Rejected', '', 0, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42'),
(106, 'Applied', '', 0, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55'),
(107, 'Phone Screen', '', 0, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55'),
(108, 'Interview', '', 0, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55'),
(109, 'Hired', '', 0, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55'),
(110, 'Rejected', '', 0, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55'),
(111, 'Applied', '', 0, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37'),
(112, 'Phone Screen', '', 0, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37'),
(113, 'Interview', '', 0, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37'),
(114, 'Hired', '', 0, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37'),
(115, 'Rejected', '', 0, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37'),
(116, 'Applied', '', 0, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11'),
(117, 'Phone Screen', '', 0, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11'),
(118, 'Interview', '', 0, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11'),
(119, 'Hired', '', 0, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11'),
(120, 'Rejected', '', 0, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11'),
(121, 'Applied', '', 0, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19'),
(122, 'Phone Screen', '', 0, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19'),
(123, 'Interview', '', 0, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19'),
(124, 'Hired', '', 0, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19'),
(125, 'Rejected', '', 0, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19'),
(126, 'Applied', '', 0, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54'),
(127, 'Phone Screen', '', 0, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54'),
(128, 'Interview', '', 0, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54'),
(129, 'Hired', '', 0, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54'),
(130, 'Rejected', '', 0, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54'),
(131, 'Applied', '', 0, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32'),
(132, 'Phone Screen', '', 0, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32'),
(133, 'Interview', '', 0, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32'),
(134, 'Hired', '', 0, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32'),
(135, 'Rejected', '', 0, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32'),
(136, 'Applied', '', 0, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36'),
(137, 'Phone Screen', '', 0, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36'),
(138, 'Interview', '', 0, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36'),
(139, 'Hired', '', 0, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36'),
(140, 'Rejected', '', 0, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36'),
(141, 'Applied', '', 0, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11'),
(142, 'Phone Screen', '', 0, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11'),
(143, 'Interview', '', 0, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11'),
(144, 'Hired', '', 0, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11'),
(145, 'Rejected', '', 0, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11'),
(146, 'Applied', '', 0, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30'),
(147, 'Phone Screen', '', 0, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30'),
(148, 'Interview', '', 0, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30'),
(149, 'Hired', '', 0, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30'),
(150, 'Rejected', '', 0, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30'),
(151, 'Applied', '', 0, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11'),
(152, 'Phone Screen', '', 0, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11'),
(153, 'Interview', '', 0, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11'),
(154, 'Hired', '', 0, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11'),
(155, 'Rejected', '', 0, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11'),
(156, 'Applied', '', 0, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22'),
(157, 'Phone Screen', '', 0, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22'),
(158, 'Interview', '', 0, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22'),
(159, 'Hired', '', 0, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22'),
(160, 'Rejected', '', 0, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22'),
(161, 'Applied', '', 0, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11'),
(162, 'Phone Screen', '', 0, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11'),
(163, 'Interview', '', 0, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11'),
(164, 'Hired', '', 0, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11'),
(165, 'Rejected', '', 0, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11'),
(166, 'Applied', '', 0, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14'),
(167, 'Phone Screen', '', 0, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14'),
(168, 'Interview', '', 0, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14'),
(169, 'Hired', '', 0, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14'),
(170, 'Rejected', '', 0, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14'),
(171, 'Applied', '', 0, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08'),
(172, 'Phone Screen', '', 0, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08'),
(173, 'Interview', '', 0, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08'),
(174, 'Hired', '', 0, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08'),
(175, 'Rejected', '', 0, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08'),
(176, 'Applied', '', 0, 362, '2022-10-19 11:15:49', '2022-10-19 11:15:49'),
(177, 'Phone Screen', '', 0, 362, '2022-10-19 11:15:49', '2022-10-19 11:15:49'),
(178, 'Interview', '', 0, 362, '2022-10-19 11:15:49', '2022-10-19 11:15:49'),
(179, 'Hired', '', 0, 362, '2022-10-19 11:15:49', '2022-10-19 11:15:49'),
(180, 'Rejected', '', 0, 362, '2022-10-19 11:15:49', '2022-10-19 11:15:49'),
(181, 'Applied', '', 0, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38'),
(182, 'Phone Screen', '', 0, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38'),
(183, 'Interview', '', 0, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38'),
(184, 'Hired', '', 0, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38'),
(185, 'Rejected', '', 0, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38'),
(186, 'Applied', '', 0, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07'),
(187, 'Phone Screen', '', 0, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07'),
(188, 'Interview', '', 0, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07'),
(189, 'Hired', '', 0, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07'),
(190, 'Rejected', '', 0, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07'),
(191, 'Applied', '', 0, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49'),
(192, 'Phone Screen', '', 0, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49'),
(193, 'Interview', '', 0, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49'),
(194, 'Hired', '', 0, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49'),
(195, 'Rejected', '', 0, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49'),
(196, 'Applied', '', 0, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47'),
(197, 'Phone Screen', '', 0, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47'),
(198, 'Interview', '', 0, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47'),
(199, 'Hired', '', 0, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47'),
(200, 'Rejected', '', 0, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47'),
(201, 'Applied', '', 0, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38'),
(202, 'Phone Screen', '', 0, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38'),
(203, 'Interview', '', 0, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38'),
(204, 'Hired', '', 0, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38'),
(205, 'Rejected', '', 0, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38'),
(206, 'Applied', '', 0, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51'),
(207, 'Phone Screen', '', 0, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51'),
(208, 'Interview', '', 0, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51'),
(209, 'Hired', '', 0, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51'),
(210, 'Rejected', '', 0, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51'),
(211, 'Applied', '', 0, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24'),
(212, 'Phone Screen', '', 0, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24'),
(213, 'Interview', '', 0, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24'),
(214, 'Hired', '', 0, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24'),
(215, 'Rejected', '', 0, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24'),
(216, 'Applied', '', 0, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37'),
(217, 'Phone Screen', '', 0, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37'),
(218, 'Interview', '', 0, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37'),
(219, 'Hired', '', 0, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37'),
(220, 'Rejected', '', 0, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37'),
(221, 'Applied', '', 0, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16'),
(222, 'Phone Screen', '', 0, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16'),
(223, 'Interview', '', 0, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16'),
(224, 'Hired', '', 0, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16'),
(225, 'Rejected', '', 0, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16'),
(226, 'Applied', '', 0, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08'),
(227, 'Phone Screen', '', 0, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08'),
(228, 'Interview', '', 0, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08'),
(229, 'Hired', '', 0, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08'),
(230, 'Rejected', '', 0, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08'),
(231, 'Applied', '', 0, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53'),
(232, 'Phone Screen', '', 0, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53'),
(233, 'Interview', '', 0, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53'),
(234, 'Hired', '', 0, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53'),
(235, 'Rejected', '', 0, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53'),
(236, 'Applied', '', 0, 500, '2022-11-16 09:39:33', '2022-11-16 09:39:33'),
(237, 'Phone Screen', '', 0, 500, '2022-11-16 09:39:33', '2022-11-16 09:39:33'),
(238, 'Interview', '', 0, 500, '2022-11-16 09:39:33', '2022-11-16 09:39:33'),
(239, 'Hired', '', 0, 500, '2022-11-16 09:39:33', '2022-11-16 09:39:33'),
(240, 'Rejected', '', 0, 500, '2022-11-16 09:39:33', '2022-11-16 09:39:33'),
(241, 'Applied', '', 0, 501, '2022-11-16 09:40:04', '2022-11-16 09:40:04'),
(242, 'Phone Screen', '', 0, 501, '2022-11-16 09:40:04', '2022-11-16 09:40:04'),
(243, 'Interview', '', 0, 501, '2022-11-16 09:40:04', '2022-11-16 09:40:04'),
(244, 'Hired', '', 0, 501, '2022-11-16 09:40:04', '2022-11-16 09:40:04'),
(245, 'Rejected', '', 0, 501, '2022-11-16 09:40:04', '2022-11-16 09:40:04'),
(246, 'Applied', '', 0, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47'),
(247, 'Phone Screen', '', 0, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47'),
(248, 'Interview', '', 0, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47'),
(249, 'Hired', '', 0, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47'),
(250, 'Rejected', '', 0, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47'),
(251, 'Applied', '', 0, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25'),
(252, 'Phone Screen', '', 0, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25'),
(253, 'Interview', '', 0, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25'),
(254, 'Hired', '', 0, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25'),
(255, 'Rejected', '', 0, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25'),
(256, 'Applied', '', 0, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16'),
(257, 'Phone Screen', '', 0, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16'),
(258, 'Interview', '', 0, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16'),
(259, 'Hired', '', 0, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16'),
(260, 'Rejected', '', 0, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16'),
(261, 'Applied', '', 0, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29'),
(262, 'Phone Screen', '', 0, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29'),
(263, 'Interview', '', 0, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29'),
(264, 'Hired', '', 0, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29'),
(265, 'Rejected', '', 0, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29'),
(266, 'Applied', '', 0, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27'),
(267, 'Phone Screen', '', 0, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27'),
(268, 'Interview', '', 0, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27'),
(269, 'Hired', '', 0, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27'),
(270, 'Rejected', '', 0, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27'),
(271, 'Applied', '', 0, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41'),
(272, 'Phone Screen', '', 0, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41'),
(273, 'Interview', '', 0, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41'),
(274, 'Hired', '', 0, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41'),
(275, 'Rejected', '', 0, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41'),
(276, 'Applied', '', 0, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10'),
(277, 'Phone Screen', '', 0, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10'),
(278, 'Interview', '', 0, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10'),
(279, 'Hired', '', 0, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10'),
(280, 'Rejected', '', 0, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10'),
(281, 'Applied', '', 0, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57'),
(282, 'Phone Screen', '', 0, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57'),
(283, 'Interview', '', 0, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57'),
(284, 'Hired', '', 0, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57'),
(285, 'Rejected', '', 0, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57'),
(286, 'Applied', '', 0, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31'),
(287, 'Phone Screen', '', 0, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31'),
(288, 'Interview', '', 0, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31'),
(289, 'Hired', '', 0, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31'),
(290, 'Rejected', '', 0, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31'),
(291, 'Applied', '', 0, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06'),
(292, 'Phone Screen', '', 0, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06'),
(293, 'Interview', '', 0, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06'),
(294, 'Hired', '', 0, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06'),
(295, 'Rejected', '', 0, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06'),
(296, 'Applied', '', 0, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56'),
(297, 'Phone Screen', '', 0, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56'),
(298, 'Interview', '', 0, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56'),
(299, 'Hired', '', 0, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56'),
(300, 'Rejected', '', 0, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56'),
(301, 'Applied', '', 0, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43'),
(302, 'Phone Screen', '', 0, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43'),
(303, 'Interview', '', 0, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43'),
(304, 'Hired', '', 0, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43'),
(305, 'Rejected', '', 0, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43'),
(306, 'Applied', '', 0, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56'),
(307, 'Phone Screen', '', 0, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56'),
(308, 'Interview', '', 0, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56'),
(309, 'Hired', '', 0, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56'),
(310, 'Rejected', '', 0, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56'),
(311, 'Applied', '', 0, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23'),
(312, 'Phone Screen', '', 0, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23'),
(313, 'Interview', '', 0, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23'),
(314, 'Hired', '', 0, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23'),
(315, 'Rejected', '', 0, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23'),
(316, 'Applied', '', 0, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47'),
(317, 'Phone Screen', '', 0, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47'),
(318, 'Interview', '', 0, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47'),
(319, 'Hired', '', 0, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47'),
(320, 'Rejected', '', 0, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47'),
(321, 'Applied', '', 0, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02'),
(322, 'Phone Screen', '', 0, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02'),
(323, 'Interview', '', 0, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02'),
(324, 'Hired', '', 0, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02'),
(325, 'Rejected', '', 0, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02'),
(326, 'Applied', '', 0, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36'),
(327, 'Phone Screen', '', 0, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36'),
(328, 'Interview', '', 0, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36'),
(329, 'Hired', '', 0, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36'),
(330, 'Rejected', '', 0, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36'),
(331, 'Applied', '', 0, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05'),
(332, 'Phone Screen', '', 0, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05'),
(333, 'Interview', '', 0, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05'),
(334, 'Hired', '', 0, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05'),
(335, 'Rejected', '', 0, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05'),
(336, 'Applied', '', 0, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(337, 'Phone Screen', '', 0, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(338, 'Interview', '', 0, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(339, 'Hired', '', 0, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(340, 'Rejected', '', 0, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14'),
(341, 'Applied', '', 0, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26'),
(342, 'Phone Screen', '', 0, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26'),
(343, 'Interview', '', 0, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26'),
(344, 'Hired', '', 0, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26'),
(345, 'Rejected', '', 0, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26'),
(346, 'Applied', '', 0, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46'),
(347, 'Phone Screen', '', 0, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46'),
(348, 'Interview', '', 0, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46'),
(349, 'Hired', '', 0, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46'),
(350, 'Rejected', '', 0, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46'),
(351, 'Applied', '', 0, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14'),
(352, 'Phone Screen', '', 0, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14'),
(353, 'Interview', '', 0, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14'),
(354, 'Hired', '', 0, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14'),
(355, 'Rejected', '', 0, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14'),
(356, 'Applied', '', 0, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57'),
(357, 'Phone Screen', '', 0, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57'),
(358, 'Interview', '', 0, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57'),
(359, 'Hired', '', 0, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57'),
(360, 'Rejected', '', 0, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57'),
(361, 'Applied', '', 0, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04'),
(362, 'Phone Screen', '', 0, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04'),
(363, 'Interview', '', 0, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04'),
(364, 'Hired', '', 0, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04'),
(365, 'Rejected', '', 0, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04'),
(366, 'Applied', '', 0, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52'),
(367, 'Phone Screen', '', 0, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52'),
(368, 'Interview', '', 0, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52'),
(369, 'Hired', '', 0, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52'),
(370, 'Rejected', '', 0, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52'),
(371, 'Applied', '', 0, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22'),
(372, 'Phone Screen', '', 0, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22'),
(373, 'Interview', '', 0, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22'),
(374, 'Hired', '', 0, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22'),
(375, 'Rejected', '', 0, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22'),
(376, 'Applied', '', 0, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26'),
(377, 'Phone Screen', '', 0, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26'),
(378, 'Interview', '', 0, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26'),
(379, 'Hired', '', 0, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26'),
(380, 'Rejected', '', 0, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26'),
(381, 'Applied', '', 0, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53'),
(382, 'Phone Screen', '', 0, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53'),
(383, 'Interview', '', 0, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53'),
(384, 'Hired', '', 0, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53'),
(385, 'Rejected', '', 0, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53'),
(386, 'Applied', '', 0, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52'),
(387, 'Phone Screen', '', 0, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52'),
(388, 'Interview', '', 0, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52'),
(389, 'Hired', '', 0, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52'),
(390, 'Rejected', '', 0, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52'),
(391, 'Applied', '', 0, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18'),
(392, 'Phone Screen', '', 0, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18'),
(393, 'Interview', '', 0, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18'),
(394, 'Hired', '', 0, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18'),
(395, 'Rejected', '', 0, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18'),
(396, 'Applied', '', 0, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45'),
(397, 'Phone Screen', '', 0, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45'),
(398, 'Interview', '', 0, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45'),
(399, 'Hired', '', 0, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45'),
(400, 'Rejected', '', 0, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45'),
(401, 'Applied', '', 0, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28'),
(402, 'Phone Screen', '', 0, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28'),
(403, 'Interview', '', 0, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28'),
(404, 'Hired', '', 0, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28'),
(405, 'Rejected', '', 0, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28'),
(406, 'Applied', '', 0, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13'),
(407, 'Phone Screen', '', 0, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13'),
(408, 'Interview', '', 0, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13'),
(409, 'Hired', '', 0, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13'),
(410, 'Rejected', '', 0, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13'),
(411, 'Applied', '', 0, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11'),
(412, 'Phone Screen', '', 0, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11'),
(413, 'Interview', '', 0, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11'),
(414, 'Hired', '', 0, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11'),
(415, 'Rejected', '', 0, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11'),
(416, 'Applied', '', 0, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57'),
(417, 'Phone Screen', '', 0, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57'),
(418, 'Interview', '', 0, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57'),
(419, 'Hired', '', 0, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57'),
(420, 'Rejected', '', 0, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57'),
(421, 'Applied', '', 0, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54'),
(422, 'Phone Screen', '', 0, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54'),
(423, 'Interview', '', 0, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54'),
(424, 'Hired', '', 0, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54'),
(425, 'Rejected', '', 0, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54'),
(426, 'Applied', '', 0, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12'),
(427, 'Phone Screen', '', 0, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12'),
(428, 'Interview', '', 0, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12'),
(429, 'Hired', '', 0, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12'),
(430, 'Rejected', '', 0, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12'),
(431, 'Applied', '', 0, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02'),
(432, 'Phone Screen', '', 0, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02'),
(433, 'Interview', '', 0, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02'),
(434, 'Hired', '', 0, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02'),
(435, 'Rejected', '', 0, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02'),
(436, 'Applied', '', 0, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56'),
(437, 'Phone Screen', '', 0, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56'),
(438, 'Interview', '', 0, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56'),
(439, 'Hired', '', 0, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56'),
(440, 'Rejected', '', 0, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56'),
(441, 'Applied', '', 0, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40'),
(442, 'Phone Screen', '', 0, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40'),
(443, 'Interview', '', 0, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40'),
(444, 'Hired', '', 0, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40'),
(445, 'Rejected', '', 0, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40'),
(446, 'Applied', '', 0, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56'),
(447, 'Phone Screen', '', 0, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56'),
(448, 'Interview', '', 0, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56'),
(449, 'Hired', '', 0, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56'),
(450, 'Rejected', '', 0, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56'),
(451, 'Applied', '', 0, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54'),
(452, 'Phone Screen', '', 0, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54'),
(453, 'Interview', '', 0, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54'),
(454, 'Hired', '', 0, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54'),
(455, 'Rejected', '', 0, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54'),
(456, 'Applied', '', 0, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32'),
(457, 'Phone Screen', '', 0, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32'),
(458, 'Interview', '', 0, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32'),
(459, 'Hired', '', 0, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32'),
(460, 'Rejected', '', 0, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32'),
(461, 'Applied', '', 0, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25'),
(462, 'Phone Screen', '', 0, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25'),
(463, 'Interview', '', 0, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25'),
(464, 'Hired', '', 0, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25'),
(465, 'Rejected', '', 0, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25'),
(466, 'Applied', '', 0, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08'),
(467, 'Phone Screen', '', 0, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08'),
(468, 'Interview', '', 0, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08'),
(469, 'Hired', '', 0, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08'),
(470, 'Rejected', '', 0, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08'),
(471, 'Applied', '', 0, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00'),
(472, 'Phone Screen', '', 0, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00'),
(473, 'Interview', '', 0, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00'),
(474, 'Hired', '', 0, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00'),
(475, 'Rejected', '', 0, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00'),
(476, 'Applied', '', 0, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36'),
(477, 'Phone Screen', '', 0, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36'),
(478, 'Interview', '', 0, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36'),
(479, 'Hired', '', 0, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36'),
(480, 'Rejected', '', 0, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36'),
(481, 'Applied', '', 0, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26'),
(482, 'Phone Screen', '', 0, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26'),
(483, 'Interview', '', 0, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26'),
(484, 'Hired', '', 0, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26'),
(485, 'Rejected', '', 0, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26'),
(486, 'Applied', '', 0, 606, '2022-12-26 09:51:25', '2022-12-26 09:51:25'),
(487, 'Phone Screen', '', 0, 606, '2022-12-26 09:51:25', '2022-12-26 09:51:25'),
(488, 'Interview', '', 0, 606, '2022-12-26 09:51:25', '2022-12-26 09:51:25'),
(489, 'Hired', '', 0, 606, '2022-12-26 09:51:25', '2022-12-26 09:51:25'),
(490, 'Rejected', '', 0, 606, '2022-12-26 09:51:25', '2022-12-26 09:51:25'),
(491, 'Applied', '', 0, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59'),
(492, 'Phone Screen', '', 0, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59'),
(493, 'Interview', '', 0, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59'),
(494, 'Hired', '', 0, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59'),
(495, 'Rejected', '', 0, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59'),
(496, 'Applied', '', 0, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08'),
(497, 'Phone Screen', '', 0, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08'),
(498, 'Interview', '', 0, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08'),
(499, 'Hired', '', 0, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08'),
(500, 'Rejected', '', 0, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08'),
(501, 'Applied', '', 0, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11'),
(502, 'Phone Screen', '', 0, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11'),
(503, 'Interview', '', 0, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11'),
(504, 'Hired', '', 0, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11'),
(505, 'Rejected', '', 0, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11'),
(506, 'Applied', '', 0, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02'),
(507, 'Phone Screen', '', 0, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02'),
(508, 'Interview', '', 0, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02'),
(509, 'Hired', '', 0, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02'),
(510, 'Rejected', '', 0, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02'),
(511, 'Applied', '', 0, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01'),
(512, 'Phone Screen', '', 0, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01'),
(513, 'Interview', '', 0, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01'),
(514, 'Hired', '', 0, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01'),
(515, 'Rejected', '', 0, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01'),
(516, 'Applied', '', 0, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02'),
(517, 'Phone Screen', '', 0, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02'),
(518, 'Interview', '', 0, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02'),
(519, 'Hired', '', 0, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02'),
(520, 'Rejected', '', 0, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'full time', 'دوام كامل', 2, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(2, 'part time', 'دوام جزئى', 2, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(3, 'full time', 'دوام كامل', 18, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(4, 'part time', 'دوام جزئى', 18, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(5, 'full time', 'دوام كامل', 19, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(6, 'part time', 'دوام جزئى', 19, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(7, 'full time', 'دوام كامل', 20, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(8, 'part time', 'دوام جزئى', 20, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(9, 'full time', 'دوام كامل', 21, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(10, 'part time', 'دوام جزئى', 21, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(11, 'full time', 'دوام كامل', 22, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(12, 'part time', 'دوام جزئى', 22, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(13, 'full time', 'دوام كامل', 23, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(14, 'part time', 'دوام جزئى', 23, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(15, 'full time', 'دوام كامل', 24, '2022-04-12 12:49:40', '2022-04-12 12:49:40'),
(16, 'part time', 'دوام جزئى', 24, '2022-04-12 12:55:39', '2022-04-12 12:55:39'),
(17, 'Full Time', 'دوام كامل', 68, '2022-07-21 09:03:05', '2022-11-10 10:42:00'),
(18, 'full time', 'دوام كامل', 157, '2022-09-26 22:11:08', '2022-09-26 22:11:08'),
(19, 'TELEWORK', 'عن بعد', 18, '2022-10-10 08:52:00', '2022-10-10 08:52:00'),
(20, 'TELEWORK', 'عن بعد', 19, '2022-10-10 09:02:02', '2022-10-10 09:02:02'),
(21, 'Full time', 'دوام كامل', 362, '2022-10-23 09:05:48', '2022-10-23 09:05:48'),
(22, 'عقد', 'عقد', 154, '2022-11-06 21:52:02', '2022-11-11 21:13:15'),
(23, 'من غير عقد', 'من غير عقد', 154, '2022-11-11 21:13:36', '2022-11-11 21:13:36'),
(24, 'Full time', 'دوام كامل', 500, '2022-11-20 10:22:13', '2022-11-20 10:22:13');

-- --------------------------------------------------------

--
-- Table structure for table `labor_hire_companies`
--

CREATE TABLE `labor_hire_companies` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labor_hire_companies`
--

INSERT INTO `labor_hire_companies` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'samasco', 'سماسكو', 2, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(2, 'samasco', 'سماسكو', 18, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(3, 'samasco', 'سماسكو', 19, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(4, 'samasco', 'سماسكو', 20, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(5, 'samasco', 'سماسكو', 21, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(6, 'Other', 'أخرى', 22, '2022-04-12 12:23:23', '2022-05-18 12:58:30'),
(7, 'samasco', 'سماسكو', 23, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(8, 'samasco', 'سماسكو', 24, '2022-04-12 12:23:23', '2022-04-12 12:23:23'),
(9, 'SMASCO', 'سماسكو', 22, '2022-05-18 13:04:36', '2022-05-18 13:04:36'),
(10, 'NONE', 'NONE', 21, '2022-10-06 08:59:29', '2022-10-06 08:59:29'),
(11, 'NONE', 'NONE', 19, '2022-10-07 16:17:54', '2022-10-07 16:17:54'),
(12, 'NONE', 'NONE', 18, '2022-10-07 17:04:11', '2022-10-07 17:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `landaboutcards`
--

CREATE TABLE `landaboutcards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `titleAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landaboutcards`
--

INSERT INTO `landaboutcards` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `created_at`, `updated_at`) VALUES
(7, 'correspond', 'متوافق', 'Corresponds to the countries of Egypt and Saudi Arabia', 'يتوافق مع دولتي مصر والمملكة العربية السعودية', 'uploads/D5CwF0kFoS13cXaiT0jZjJ57Lbft3J6g5hjk3ODR.svg', '2022-11-08 11:40:59', '2022-12-12 14:02:06'),
(8, 'flexible', 'مرن', 'You can customize my resources according to your industry and your needs', 'يمكنك تخصيص مواردي حسب مجال عملك واحتياجاتك', 'uploads/aATfZZC4FYpzyDgH4bQBy1cyeHyWeqvlqcurqbeG.svg', '2022-11-08 11:43:11', '2022-12-12 14:02:24'),
(9, 'cloud system', 'نظام سحابي', 'It allows you to use it anytime and anywhere', 'يتيح لك استخدامه في أي وقت ومن أي مكان', 'uploads/Zp2ZwpJb1NbdxwJdZalnpLiqUqbFiYIM8HZ1MRen.svg', '2022-11-08 11:44:13', '2022-12-12 14:02:46');

-- --------------------------------------------------------

--
-- Table structure for table `landblogs`
--

CREATE TABLE `landblogs` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `titleAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaTitleEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTitleAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaDescriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaDescriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metakeyEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metakeyAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTagEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTagAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landcloudcards`
--

CREATE TABLE `landcloudcards` (
  `id` bigint UNSIGNED NOT NULL,
  `number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landcontactcards`
--

CREATE TABLE `landcontactcards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleAr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landcontactcards`
--

INSERT INTO `landcontactcards` (`id`, `titleEn`, `titleAr`, `image`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Cairo, Egypt', 'القاهرة، مصر', 'uploads/Nds7B9L17Nn1hXPkA06NpxGXFESK3OfqSdnq5REi.png', '2022-09-25 14:40:34', '2022-12-14 09:15:19', 'location'),
(2, 'sales@mwardi.com', 'sales@mwardi.com', 'uploads/c33vxYCUnUx9mAaPxhfi0ESEPCn52RmrxBiPhGUW.png', '2022-09-25 14:40:34', '2022-11-09 17:23:12', 'email'),
(3, '+966920005913', '+966920005913', 'uploads/lBC63lc73GeSB5s3B2KiwDtAvGooojIUU0Ab1oSU.png', '2022-09-25 14:40:34', '2022-12-14 09:59:26', 'phone'),
(5, 'Jeddah, Saudi Arabia', 'جدة، المملكة العربية السعودية', 'uploads/qzyqZgObZBNV0qsIMYFdaCaL7PL1JEhxenuelBbq.png', '2022-11-09 16:54:56', '2022-12-14 09:16:10', 'location');

-- --------------------------------------------------------

--
-- Table structure for table `landdemocards`
--

CREATE TABLE `landdemocards` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landdemocards`
--

INSERT INTO `landdemocards` (`id`, `descriptionEn`, `descriptionAr`, `created_at`, `updated_at`) VALUES
(1, 'Track the attendance and departure of your employees', 'تتبع حضور وإنصراف الموظفين', '2022-09-25 14:40:34', '2022-12-12 12:07:59'),
(2, 'Manage employee data', 'أدِر بيانات الموظفين', '2022-09-25 14:40:34', '2022-12-12 12:07:47'),
(3, 'Calculate salaries, penalties and deductions, bonuses, vacation balances', 'احسب المرتبات، الجزاءات والخصومات، المكافآت، أرصدة الإجازات', '2022-09-25 14:40:34', '2022-12-12 12:08:13'),
(4, 'Monitor the performance and evaluation of employees', 'تابع أداء وتقييم الموظفين', '2022-11-02 16:08:21', '2022-12-12 12:08:27'),
(5, 'Generate employee monthly attendance and payroll reports', 'إنشئ تقارير حول الحضور الشهري للموظفين وكشوفات المرتبات', '2022-11-02 16:08:54', '2022-12-12 12:08:40');

-- --------------------------------------------------------

--
-- Table structure for table `landfaqs`
--

CREATE TABLE `landfaqs` (
  `id` bigint UNSIGNED NOT NULL,
  `question` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `question_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `answer_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landfaqs`
--

INSERT INTO `landfaqs` (`id`, `question`, `question_ar`, `answer`, `answer_ar`, `created_at`, `updated_at`) VALUES
(1, 'how old are you', 'عندك كام سنة', '10 years', '10 سنوات', NULL, NULL),
(2, 'how are you', 'كيف حالك', 'elhamdo lellah', 'الحمد لله ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `landfeatures`
--

CREATE TABLE `landfeatures` (
  `id` bigint UNSIGNED NOT NULL,
  `descriptionEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionAr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landplan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landhelpcards`
--

CREATE TABLE `landhelpcards` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleAr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sections`
--

CREATE TABLE `landing_page_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `section_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_order` int NOT NULL DEFAULT '0',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `section_type` enum('section-1','section-2','section-3','section-4','section-5','section-6','section-7','section-8','section-9','section-10','section-plan') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_demo_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `section_blade_file_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_sections`
--

INSERT INTO `landing_page_sections` (`id`, `section_name`, `section_order`, `content`, `section_type`, `default_content`, `section_demo_image`, `section_blade_file_name`, `created_at`, `updated_at`) VALUES
(1, 'section-1', 1, '{\"logo\":\"logo_1644282490332503550.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Home\",\"href\":\"#\"},{\"menu\":\"About\",\"href\":\"#\"}],\"text\":{\"text-1\":\"tecbadia\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"ON-DEMAND DEVELOPERS WITH INDUSTRY EXPERIENCE\",\"text-4\":\"Contact Us\",\"text-5\":\"We are a group of 250+ software development experts helping businesses to accelerate the development of world-class software solutions and applications.\"},\"custom_class_name\":null}', 'section-1', '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired \"},\"custom_class_name\":\"\"}', 'top-header-section.png', 'custome-top-header-section', '2022-02-05 22:59:41', '2022-02-08 06:08:10'),
(2, 'section-2', 2, '', 'section-2', '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'logo-part-main-back-part.png', 'custome-logo-part-main-back-part', '2022-02-05 22:59:41', '2022-02-08 05:43:48'),
(3, 'section-3', 3, '{\"image\":\"sec-2.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":null}', 'section-3', '{\"image\": \"sec-2.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-even.png', 'custome-simple-sec-even', '2022-02-05 22:59:41', '2022-02-08 06:07:02'),
(4, 'section-4', 4, '{\"image\":\"sec-3.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":null}', 'section-4', '{\"image\": \"sec-3.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-odd.png', 'custome-simple-sec-odd', '2022-02-05 22:59:41', '2022-02-08 06:07:02'),
(5, 'section-5', 5, '', 'section-5', '{\"button\": {\"text\": \"TRY OUR SYSTEM\",\"href\": \"#\"},\"text\": {\"text-1\": \"See more features\",\"text-2\": \"All Features\",\"text-3\": \"in one place\",\"text-4\": \"Attractive Dashboard Customer & Vendor Login Multi Languages\",\"text-5\":\"Invoice, Billing & Transaction Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-6\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-7\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting User Friendly Invoice Theme Make your own setting\",\"text-8\":\"Multi User & Permission Paypal & Stripe for Invoice\"},\"custom_class_name\":\"\"}', 'features-inner-part.png', 'custome-features-inner-part', '2022-02-05 22:59:41', '2022-02-08 05:44:16'),
(6, 'section-6', 6, '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":null}', 'section-6', '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'container-our-system-div.png', 'custome-container-our-system-div', '2022-02-05 22:59:41', '2022-02-08 06:07:12'),
(7, 'section-7', 7, '{\"testimonials\":[{\"id\":1,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":2,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":3,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":4,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":5,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"}],\"custom_class_name\":null}', 'section-7', '{\"testimonials\":[{\"id\":1,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":2,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":3,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":4,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":5,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"}],\"custom_class_name\":\"\"}', 'testimonials-section.png', 'custome-testimonials-section', '2022-02-05 22:59:41', '2022-02-08 06:07:16'),
(8, 'section-plan', 8, 'plan', 'section-plan', 'plan', 'plan-section.png', 'plan-section', '2022-02-05 22:59:41', '2022-02-08 06:07:19'),
(9, 'section-8', 9, '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":null}', 'section-8', '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'subscribe-part.png', 'custome-subscribe-part', '2022-02-05 22:59:41', '2022-02-08 06:07:21'),
(10, 'section-9', 10, '', 'section-9', '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'social-links.png', 'custome-social-links', '2022-02-05 22:59:41', '2022-02-08 05:44:41'),
(11, 'section-10', 11, '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":null}', 'section-10', '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'footer-section.png', 'custome-footer-section', '2022-02-05 22:59:41', '2022-02-08 06:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `landplans`
--

CREATE TABLE `landplans` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('lite','regular','pro') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateType` enum('monthly','yearly') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsaycards`
--

CREATE TABLE `landsaycards` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsections`
--

CREATE TABLE `landsections` (
  `id` bigint UNSIGNED NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `titleAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `metaTitleEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTitleAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaDescriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaDescriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metakeyEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metakeyAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTagEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metaTagAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landsections`
--

INSERT INTO `landsections` (`id`, `key`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `metaTitleEn`, `metaTitleAr`, `metaDescriptionEn`, `metaDescriptionAr`, `metakeyEn`, `metakeyAr`, `metaTagEn`, `metaTagAr`, `created_at`, `updated_at`) VALUES
(1, 'homeSection', 'More tech, more productivity', 'تكنولوجيا أكثر .. إنتاجية أكثر', '<p dir=\"ltr\">Mwardi is a system that helps you manage and organize personnel affairs using the best technological solutions, Which allows you to increase your business productivity and increase your profit rate</p>', '<p dir=\"rtl\">مواردي نظام يساعدك في إدارة وتنظيم شؤون الموظفين باستخدام أفضل الحلول التكنولوجية؛ مما يساعدك على زيادة معدل إنتاج&nbsp;أعمالك وزيادة معدل أرباحك</p>', 'uploads/WuTvqHg2FqMtHpGkppoVDme2SjxxdJqHQWSNuTMC.webp', 'Mwardi', 'مواردي', 'Eligendi voluptate c', 'Nostrum eos vero id', 'Temporibus dignissim', 'Ducimus soluta quis', 'meta tag englsih,Laboris ea quas offi', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-12-14 09:25:30'),
(2, 'purposeSection', 'Mwardi application', 'تطبيق مواردي', '<p dir=\"ltr\">It enables your employees to self-service, which makes it easier for you to communicate with them and follow them up more accurately.</p>\r\n\r\n<p dir=\"ltr\">Fits all the needs of your employees, from registering their attendance and adding their personal data, to knowing their payroll and receiving their credit</p>', '<p dir=\"rtl\">يُمكن موظفيك من الخدمة الذاتية مما يسهل عليك التواصل معهم ومتابعتهم بدقة أكبر.</p>\r\n\r\n<p dir=\"rtl\">يلائم جميع احتياجات الموظفين، بدءًا من تسجيل حضوره وإضافة بياناته الشخصية، حتى معرفة كشوف المرتبات الخاصة به واستلام رصيده</p>', 'uploads/IkuyBA0qr2KZ0X0gxyonenPkT4JvaZ2n0iFtZVF1.webp', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-12-14 09:44:08'),
(3, 'sliderSection', 'How does Mwardi help you in managing human resources?', 'كيف يساعدك مواردي في إدارة الموارد البشرية؟', 'Follow up on attendance and departure\r\nFollow up and know the attendance movement of employees, the hour of attendance and departure, early departure or late attendance of the employee, and overtime work in minutes.', 'متابعة الحضور والإنصراف\r\nمتابعة ومعرفة حركة حضور الموظفين، ساعة الحضور والإنصراف، المغادرة المبكرة أو الحضور المتأخر للموظف وعمله الإضافي بالدقائق.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-11-08 10:33:15'),
(4, 'aboutSection', 'Mwardi helps you to manage your human resources', 'مواردي يساعدك في إدارة مواردك البشرية', '<p>Mwardi is a cloud-based system that aims to make managing human resources and personnel matters easier; Therefore, we have worked to create a technological system that helps you manage your human capital effectively to achieve the goals of the institution, raise the level of work efficiency and increase growth</p>', '<p dir=\"rtl\">مواردي نظام سحابي يهدف إلى جعل إدارة الموارد البشرية أسهل</p>\r\n\r\n<p dir=\"rtl\">عملنا على خلق نظام تكنولوجي يساعدك في إدارة رأس مالك البشري بفاعلية لتحقيق أهداف المؤسسة ورفع مستوى كفاءة العمل وزيادة النمو</p>', 'uploads/Ehsv68YpoVy4m8hxLaIq7Q8UGS0aAf3DA5lFMuY3.jpg', 'About mwardi', 'عن مواردي', 'meta description english', 'ميتا ديسكربشن انجليش', 'meta key english', 'ميتا كي عربي', 'meta tag englsih', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-12-14 09:10:48'),
(5, 'cloudSection', 'Reasons to invest in a cloud HR software like Mwardi', 'Reasons to invest in a cloud HR software like Mwardi', '<p>Try Mwardi For 7 Days &amp; Get Unrestricted Access To All Our Services &amp; Features.</p>', '<p>Try Mwardi For 7 Days &amp; Get Unrestricted Access To All Our Services &amp; Features.</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-12-13 15:44:36'),
(6, 'helpSection', 'How does my resources help you in managing human resources?', 'كيف يساعدك مواردي في إدارة الموارد البشرية؟', NULL, NULL, 'uploads/3PuPdL9qVj2ZZnevP4aaawisilkYTQaxyZ5rOzn1.svg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-11-08 11:13:05'),
(7, 'planSection', '', '', '', '', NULL, '', '', '', '', '', '', '', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-11-07 15:02:42'),
(8, 'saySection', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-11-07 15:04:00'),
(9, 'blogSection', 'our useful articles for you', 'our useful articles for you', NULL, NULL, NULL, 'Blog', 'المدونة', 'meta description english', 'ميتا ديسكربشن انجليش', 'meta key english', 'ميتا كي عربي', 'meta tag englsih', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-11-03 15:13:20'),
(10, 'priceSection', 'get started now, pick a plan later', 'get started now, pick a plan later', 'Try Mawaridi For 7 Days & Get Unrestricted Access To All\r\nOur Services & Features.', 'Try Mawaridi For 7 Days & Get Unrestricted Access To All\r\nOur Services & Features.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-11-01 15:59:53'),
(11, 'demoSection', 'Mwardi helps you manage human resources', 'مواردي يساعدك في إدارة الموارد البشرية', '', '', 'uploads/LAnuXuYiqOI4iiuLYtCjvDKAE41m9lZpCHskVKjA.png', 'Demo', 'نسخة تجريبية', 'meta description english', 'ميتا ديسكربشن انجليش', 'meta key english', 'ميتا كي عربي', 'meta tag englsih', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-11-09 15:20:00'),
(12, 'contactSection', 'If you have any question about Mwardi', 'لديك أي سؤال حول مواردي؟', '', '', NULL, 'meta title english', 'ميتا تايتل عربي', 'meta description english', 'ميتا ديسكربشن انجليش', 'meta key english', 'ميتا كي عربي', 'meta tag englsih', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-11-09 15:10:34'),
(13, 'getTouchSection', 'Get in touch with us', 'ابق على تواصل معنا', '<p>We are always here at your service</p>', '<p>نحن هنا دومًا في خدمتك</p>', 'uploads/zLXD0TrAP6b3lboyUgc0iCHWN9RHb5j7Qz6fagT9.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-12-12 14:07:23'),
(14, 'footerSection', '', '', '<p dir=\"ltr\">Mwardi is a cloud human resource management system that aims to make managing human resources and personnel matters easier</p>', '<p>مواردي نظام سحابي لإدارة الموارد البشرية، يهدف إلى جعل إدارة الموارد البشرية وشؤون الموظفين سهلة</p>', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-09-25 14:40:34', '2022-12-12 12:04:54'),
(15, 'termSection', 'Terms and Privacy', 'الشروط والخصوصية', '<p>These terms and conditions inform you of the policy and legal practices of my Mawaredi system, please review these terms and conditions carefully before using them.</p>\r\n\r\n<p><strong>Governing rules:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Not to violate or violate the applicable laws, while observing the rights of others through the available means of communication.</p>\r\n\r\n<p dir=\"ltr\"><strong>Data protection:</strong></p>\r\n\r\n<p dir=\"ltr\">Any personal information you provide to us when you use this system will be treated in accordance with our Privacy Policy.</p>\r\n\r\n<p dir=\"ltr\">My resources are subject to all applicable laws, regulations, and codes of practice within the Kingdom of Saudi Arabia and Egypt.</p>\r\n\r\n<p dir=\"ltr\"><strong>Property rights:</strong></p>\r\n\r\n<ul dir=\"ltr\">\r\n	<li>You may not copy, modify, publish, broadcast, distribute, sell or transfer any material from My Resources, in whole or in part, without our prior express written permission, however, the contents of My Resources may be downloaded, printed or copied for personal, non-commercial use only. You have.</li>\r\n	<li>No unauthorized use of my resources may result in a violation of copyright laws, trademark laws, the laws of privacy and publicity, and the basic rules and laws of communications.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\"><strong>Limitation of Liability:</strong></p>\r\n\r\n<p dir=\"ltr\">You agree that you do not have, and will not have, any right to file a claim of any kind against us in connection with the use of this system or in connection with it, and you also bear responsibility in the event that you publish or distribute materials, links, information or opinions that incite violence and sectarianism and do not respect religions. Or offend national symbols and constants.</p>\r\n\r\n<p dir=\"ltr\"><strong>Our compensation for damages:</strong></p>\r\n\r\n<p dir=\"ltr\">You agree to indemnify us for damages and keep us insured from and against all costs, claims, demands, liabilities, expenses, damages, or losses (including, without limitation, consequential losses, loss of profits, and loss of reputation, and all interest, penalties, legal and other professional costs and expenses) that arise for or in connection with your breach of these Terms and Conditions.</p>\r\n\r\n<p dir=\"ltr\"><strong>Updates:</strong></p>\r\n\r\n<p dir=\"ltr\">We reserve the right to change the terms and conditions of the system at any time and without prior notice, and your continued access to the system or your continued use after these changes means your acceptance of the terms and conditions after being modified, and it is your responsibility to review the terms and conditions regularly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:right\">هذه الشروط والأحكام لتبليغكم بالسياسة والممارسات القانونية لنظام مواردي، يرجى أن تراجع هذه الشروط والأحكام بعناية قبل الإستخدام.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>القواعد الحاكمة:</strong></p>\r\n\r\n<p style=\"text-align:right\">عدم مخالفة القوانين السارية او انتهاكها مع مراعاة حقوق الآخرين من خلال ووسائل الاتصال المتاحة.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>حماية البيانات:</strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:right\">\r\n	<p style=\"text-align:right\">أي معلومات شخصية تزودنا بها عند استخدامك لهذا النظام سوف تعامل وفقاً لسياسة الخصوصية الموجودة لدينا.</p>\r\n	</li>\r\n	<li style=\"text-align:right\">\r\n	<p style=\"text-align:right\">يخضع مواردي لجميع القوانين واللوائح ومدونات قواعد الممارسات السارية داخل المملكة العربية السعودية ومصر.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:right\"><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>حقوق الملكية:</strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:right\">لا يجوز لك نسخ أو تعديل أو نشر أو إذاعة أو توزيع أو بيع أو نقل أي مواد من مواردي سواء كان ذلك بصورة إجمالية او جزئية بدون إذن كتابي صريح مسبق، ومع ذلك يجوز تحميل محتويات مواردي أو طبعها أو نسخها بغرض الاستخدام الشخصي فقط غير التجاري لديك.</li>\r\n	<li style=\"text-align:right\">&nbsp;لا يجوز أي استخدام غير مصرح به لمواردي قد يؤدي إلى انتهاك لقوانين حقوق التأليف والنشر وقوانين العلامات التجارية وقوانين الخصوصية والدعاية والقواعد والقوانين الأساسية للإتصالات.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;<strong>حدود المسئولية:</strong></p>\r\n\r\n<p style=\"text-align:right\">أنت توافق على أنك ليس لديك ولن يكون لديك اى حق في رفع دعوى من أي نوع ضدنا فيما يتعلق بإستخدام هذا النظام أو فيما يتصل به, كما تتحمل المسئولية في حالة نشر او توزيع مواد أو روابط أو معلومات أو أراء تحرض على العنف والطائفية ولا تحترم الأديان أو تسيء للرموز والثوابت الوطنية.</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>\r\n\r\n<p dir=\"rtl\"><strong>تعويضنا عن الأضرار:</strong></p>\r\n\r\n<p dir=\"rtl\">أنت توافق على تعويضنا عن الأضرار والحفاظ علينا مؤَّمنين عن وضد كل التكاليف أو المطالبات أو المطالب أو الالتزامات أو المصروفات أو الأضرار أو الخسائر (بما في ذلك وبدون حصر الخسائر المترتبة, خسائر الأرباح وخسائر السمعة, وجميع الفوائد والغرامات والتكاليف والمصروفات القانونية والمهنية الأخرى) التي تنشأ عن أو تتصل بخرقك لهذه الشروط والأحكام.</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>\r\n\r\n<p dir=\"rtl\"><strong>التحديثات:</strong></p>\r\n\r\n<p dir=\"rtl\">نحن نحتفظ بالحق في تغيير الشروط والأحكام الخاصة بالنظام في أي وقت ودون إخطار مسبق, ومواصلتك دخول النظام أو استمرارك في إستخدامه بعد هذه التغييرات يعنى قبولكم بالشروط والأحكام بعد تعديلها، ومن مسؤوليتكم مراجعة الشروط والأحكام بإنتظام.</p>', NULL, 'Mwardi', 'مواردي', 'Eligendi voluptate c', 'Nostrum eos vero id', 'Temporibus dignissim', 'Ducimus soluta quis', 'meta tag englsih,Laboris ea quas offi', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-11-09 13:29:18'),
(16, 'privacySection', 'privacy policy', 'الشروط والخصوصية', '<p>These terms and conditions inform you of the policy and legal practices of my Mawaredi system, please review these terms and conditions carefully before using them.</p>\r\n\r\n<p><strong>Governing rules:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Not to violate or violate the applicable laws, while observing the rights of others through the available means of communication.</p>\r\n\r\n<p dir=\"ltr\"><strong>Data protection:</strong></p>\r\n\r\n<p dir=\"ltr\">Any personal information you provide to us when you use this system will be treated in accordance with our Privacy Policy.</p>\r\n\r\n<p dir=\"ltr\">My resources are subject to all applicable laws, regulations, and codes of practice within the Kingdom of Saudi Arabia and Egypt.</p>\r\n\r\n<p dir=\"ltr\"><strong>Property rights:</strong></p>\r\n\r\n<ul dir=\"ltr\">\r\n	<li>You may not copy, modify, publish, broadcast, distribute, sell or transfer any material from My Resources, in whole or in part, without our prior express written permission, however, the contents of My Resources may be downloaded, printed or copied for personal, non-commercial use only. You have.</li>\r\n	<li>No unauthorized use of my resources may result in a violation of copyright laws, trademark laws, the laws of privacy and publicity, and the basic rules and laws of communications.</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\"><strong>Limitation of Liability:</strong></p>\r\n\r\n<p dir=\"ltr\">You agree that you do not have, and will not have, any right to file a claim of any kind against us in connection with the use of this system or in connection with it, and you also bear responsibility in the event that you publish or distribute materials, links, information or opinions that incite violence and sectarianism and do not respect religions. Or offend national symbols and constants.</p>\r\n\r\n<p dir=\"ltr\"><strong>Our compensation for damages:</strong></p>\r\n\r\n<p dir=\"ltr\">You agree to indemnify us for damages and keep us insured from and against all costs, claims, demands, liabilities, expenses, damages, or losses (including, without limitation, consequential losses, loss of profits, and loss of reputation, and all interest, penalties, legal and other professional costs and expenses) that arise for or in connection with your breach of these Terms and Conditions.</p>\r\n\r\n<p dir=\"ltr\"><strong>Updates:</strong></p>\r\n\r\n<p dir=\"ltr\">We reserve the right to change the terms and conditions of the system at any time and without prior notice, and your continued access to the system or your continued use after these changes means your acceptance of the terms and conditions after being modified, and it is your responsibility to review the terms and conditions regularly.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '<p style=\"text-align:right\">هذه الشروط والأحكام لتبليغكم بالسياسة والممارسات القانونية لنظام مواردي، يرجى أن تراجع هذه الشروط والأحكام بعناية قبل الإستخدام.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>القواعد الحاكمة:</strong></p>\r\n\r\n<p style=\"text-align:right\">عدم مخالفة القوانين السارية او انتهاكها مع مراعاة حقوق الآخرين من خلال ووسائل الاتصال المتاحة.</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>حماية البيانات:</strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:right\">\r\n	<p style=\"text-align:right\">أي معلومات شخصية تزودنا بها عند استخدامك لهذا النظام سوف تعامل وفقاً لسياسة الخصوصية الموجودة لدينا.</p>\r\n	</li>\r\n	<li style=\"text-align:right\">\r\n	<p style=\"text-align:right\">يخضع مواردي لجميع القوانين واللوائح ومدونات قواعد الممارسات السارية داخل المملكة العربية السعودية ومصر.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p style=\"text-align:right\"><br />\r\n&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><strong>حقوق الملكية:</strong></p>\r\n\r\n<ul>\r\n	<li style=\"text-align:right\">لا يجوز لك نسخ أو تعديل أو نشر أو إذاعة أو توزيع أو بيع أو نقل أي مواد من مواردي سواء كان ذلك بصورة إجمالية او جزئية بدون إذن كتابي صريح مسبق، ومع ذلك يجوز تحميل محتويات مواردي أو طبعها أو نسخها بغرض الاستخدام الشخصي فقط غير التجاري لديك.</li>\r\n	<li style=\"text-align:right\">&nbsp;لا يجوز أي استخدام غير مصرح به لمواردي قد يؤدي إلى انتهاك لقوانين حقوق التأليف والنشر وقوانين العلامات التجارية وقوانين الخصوصية والدعاية والقواعد والقوانين الأساسية للإتصالات.</li>\r\n</ul>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;<strong>حدود المسئولية:</strong></p>\r\n\r\n<p style=\"text-align:right\">أنت توافق على أنك ليس لديك ولن يكون لديك اى حق في رفع دعوى من أي نوع ضدنا فيما يتعلق بإستخدام هذا النظام أو فيما يتصل به, كما تتحمل المسئولية في حالة نشر او توزيع مواد أو روابط أو معلومات أو أراء تحرض على العنف والطائفية ولا تحترم الأديان أو تسيء للرموز والثوابت الوطنية.</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>\r\n\r\n<p dir=\"rtl\"><strong>تعويضنا عن الأضرار:</strong></p>\r\n\r\n<p dir=\"rtl\">أنت توافق على تعويضنا عن الأضرار والحفاظ علينا مؤَّمنين عن وضد كل التكاليف أو المطالبات أو المطالب أو الالتزامات أو المصروفات أو الأضرار أو الخسائر (بما في ذلك وبدون حصر الخسائر المترتبة, خسائر الأرباح وخسائر السمعة, وجميع الفوائد والغرامات والتكاليف والمصروفات القانونية والمهنية الأخرى) التي تنشأ عن أو تتصل بخرقك لهذه الشروط والأحكام.</p>\r\n\r\n<p dir=\"rtl\">&nbsp;</p>\r\n\r\n<p dir=\"rtl\"><strong>التحديثات:</strong></p>\r\n\r\n<p dir=\"rtl\">نحن نحتفظ بالحق في تغيير الشروط والأحكام الخاصة بالنظام في أي وقت ودون إخطار مسبق, ومواصلتك دخول النظام أو استمرارك في إستخدامه بعد هذه التغييرات يعنى قبولكم بالشروط والأحكام بعد تعديلها، ومن مسؤوليتكم مراجعة الشروط والأحكام بإنتظام.</p>', NULL, 'Mwardi', 'مواردي', 'Eligendi voluptate c', 'Nostrum eos vero id', 'Temporibus dignissim', 'Ducimus soluta quis', 'meta tag englsih,Laboris ea quas offi', 'ميتتا تاج عربي', '2022-09-25 14:40:34', '2022-12-05 13:57:35');

-- --------------------------------------------------------

--
-- Table structure for table `landsliders`
--

CREATE TABLE `landsliders` (
  `id` bigint UNSIGNED NOT NULL,
  `titleEn` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `titleAr` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptionEn` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `descriptionAr` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landsliders`
--

INSERT INTO `landsliders` (`id`, `titleEn`, `titleAr`, `descriptionEn`, `descriptionAr`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Track attendance and departure', 'متابعة الحضور والإنصراف', 'Track Accurately and flexibly the attendance and departure of employees in accordance with your policies and regulations\r\nMwardi enables you to follow the attendance and departure times of each employee, the number of working hours in minutes, and know the early departure or late arrival of each employee', 'تابع حضور وإنصراف الموظفين بدقة ومرونة وفقًا لسياساتك ولوائحك المهنية؛ يُمكّنك مواردي من متابعة مواعيد حضور وإنصراف كل موظف، وعدد ساعات عمله بالدقائق، ومعرفة المغادرة المبكرة أو الحضور المتأخر لكل موظف', 'uploads/OAkWZw4yirHgebxaZGqcfn1zTTFexOHLmO8jm2pD.jpg', '2022-09-25 14:40:34', '2022-12-14 09:37:17'),
(2, 'Personnel Affairs Management', 'إدارة شؤون الموظفين', 'Manage and follow up on personnel affairs with ease.\r\nMwardi helps you manage employee requests and leaves, and store all their employment documents, Which helps you in digitizing all human resources management tasks', 'أدِر وتابع شؤون الموظفين بكل سهولة؛ يساعدك مواردي في إدارة طلبات وإجازات الموظفين، وتخزين جميع وثائق توظيفهم؛ مما يساعدك في رقمنة جميع مهام إدارة الموارد البشرية', 'uploads/KLM3Hsmd2PodtVfFJLkD8WJ6G0NJGUWaK9yU0UO3.jpg', '2022-09-25 14:40:34', '2022-12-12 14:15:39'),
(3, 'Accounting', 'الحسابات', 'Complete salary calculations with ease and accuracy. \r\nMwardi helps you calculate the net salary for each employee, and calculate penalties, deductions, bonuses, and insurances', 'تمم عمليات حساب الرواتب بكل سهولة ودقة، يساعدك مواردي في حساب صافي الراتب لكل موظف، وحساب الجزاءات والخصومات، المكافآت، التأمينات', 'uploads/9GkndHWQ0P77fV6JDlKsPJwUUJ3lCjHzwmPEEcMa.jpg', '2022-09-25 14:40:34', '2022-12-12 14:16:13'),
(4, 'Track employee performance', 'متابعة أداء الموظفين', 'Evaluate employee performance and track their achievement of company goals\r\nMwardi helps you to include the employee\'s self-evaluation, managers\' evaluation, and management\'s evaluation, which makes it easier for you to direct your employees better and more effectively', 'قيّم أداء الموظفين وتتبع مدى تحقيقهم لأهداف الشركة؛ يساعدك مواردي على إدراج تقييم الموظف لنفسه، وتقييم المدراء، وتقييم الإدارة، مما يسهل عليك توجيه الموظفين بشكل أفضل وفعالية أكبر', 'uploads/djJ2ikAONThnrFvog5O45KvyTVBSxGRDAVDMTn7y.jpg', '2022-10-26 15:37:45', '2022-12-14 09:39:54'),
(6, 'Create reports', 'إنشاء التقارير', 'Stay up-to-date with all personnel updates and developments\r\nMwardi helps you to generate multiple reports on personnel affairs such as monthly attendance reports and payroll reports', 'كن على إطلاع دائم بكل تحديثات وتطورات شؤون الموظفين، يساعدك مواردي على إنشاء تقارير متعددة عن شؤون الموظفين مثل تقارير الحضور الشهري وتقارير كشوفات المرتبات', 'uploads/zKH2RN5aiSsEuk8AmmFz5dKRPdstX4AmEtrovP9l.jpg', '2022-11-01 11:18:35', '2022-12-12 14:17:24');

-- --------------------------------------------------------

--
-- Table structure for table `landsocialmedia`
--

CREATE TABLE `landsocialmedia` (
  `id` bigint UNSIGNED NOT NULL,
  `type` enum('twitter','facebook','instagram','youtube','googleplus','linkedin') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landsocialmedia`
--

INSERT INTO `landsocialmedia` (`id`, `type`, `url`, `created_at`, `updated_at`) VALUES
(1, 'twitter', 'http://www.twitter.com/mwardi_co', NULL, '2022-11-09 10:23:43'),
(2, 'facebook', 'http://www.facebook.com/mwardi.co', NULL, '2022-11-09 10:23:02'),
(3, 'instagram', 'http://www.instagram.com/mwardi.co', NULL, '2022-11-09 10:24:12'),
(7, 'linkedin', 'http://eg.linkedin.com/company/mwardi', '2022-11-09 10:24:32', '2022-11-09 10:24:32'),
(8, 'youtube', 'https://www.youtube.com/channel/UCJ2cbpE_T83q4zjs5gMkNdg', '2022-11-09 10:24:55', '2022-11-09 10:24:55'),
(9, 'googleplus', 'mailto:mwardihr@gmail.com', '2022-11-09 11:12:08', '2022-11-09 11:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `landsupportforms`
--

CREATE TABLE `landsupportforms` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` enum('question','complaint','appointment') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'question',
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landsupportforms`
--

INSERT INTO `landsupportforms` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'hbhj', 'hjbhj@FSD.com', 'question', 'hbjhbjh', '2022-09-26 15:01:53', '2022-09-26 15:01:53'),
(2, 'Harry Williams', 'harrywilliamwork3@gmail.com', 'appointment', 'Hey,\n\nThis is Harry Williams\nCan we talk about your website designing and Promotion?\n\nMay I have your phone number?', '2022-11-02 08:34:21', '2022-11-02 08:34:21'),
(3, 'fdvfdvdf', 'vfdv@vfdv.com', 'question', 'revrevererfe', '2022-11-10 10:43:06', '2022-11-10 10:43:06'),
(4, 'vfdvfd', 'fdvfd@vfdv.com', 'question', 'fdcvfdvdf', '2022-11-10 11:07:57', '2022-11-10 11:07:57'),
(5, 'lljuihnuin', 'rrtgb2g@jhjyb', 'question', '3182562.5', '2022-11-10 11:53:40', '2022-11-10 11:53:40'),
(6, 'لللب', 'sksk@gmail.com', 'question', 'klm', '2022-11-10 11:59:50', '2022-11-10 11:59:50'),
(7, 'Donec sollicitudin molestie malesuada. Proin eget tortor risus. Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tinVivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. ', 'civucaj@mailinator.com', 'question', 'Voluptatem Hic sit', '2022-11-10 14:29:30', '2022-11-10 14:29:30'),
(8, 'fff', 'sabet.abdo@gmail.com', 'question', 'ttt', '2022-11-10 14:51:50', '2022-11-10 14:51:50'),
(9, 'ff', 'sabet.abdo@gmail.com', 'question', 'ff', '2022-11-10 15:57:14', '2022-11-10 15:57:14'),
(10, 'ff', 'a@gmail.com', 'question', 'fff', '2022-11-21 14:03:12', '2022-11-21 14:03:12'),
(11, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:10:26', '2022-11-28 14:10:26'),
(12, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:13:19', '2022-11-28 14:13:19'),
(13, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:14:41', '2022-11-28 14:14:41'),
(14, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:15:38', '2022-11-28 14:15:38'),
(15, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:15:54', '2022-11-28 14:15:54'),
(16, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:16:16', '2022-11-28 14:16:16'),
(17, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:16:50', '2022-11-28 14:16:50'),
(18, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:18:33', '2022-11-28 14:18:33'),
(19, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:20:48', '2022-11-28 14:20:48'),
(20, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:22:00', '2022-11-28 14:22:00'),
(21, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:25:05', '2022-11-28 14:25:05'),
(22, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:31:36', '2022-11-28 14:31:36'),
(23, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:32:32', '2022-11-28 14:32:32'),
(24, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:37:42', '2022-11-28 14:37:42'),
(25, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:45:18', '2022-11-28 14:45:18'),
(26, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:46:13', '2022-11-28 14:46:13'),
(27, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:49:28', '2022-11-28 14:49:28'),
(28, 'sdsdsd', 'saadnabil00@gmail.com', 'appointment', 'dsd', '2022-11-28 14:52:31', '2022-11-28 14:52:31'),
(29, 'sdsdsd', 'saadnabil00@gmail.com', 'question', 'dsd', '2022-11-28 14:53:18', '2022-11-28 14:53:18'),
(30, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:53:55', '2022-11-28 14:53:55'),
(31, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:54:27', '2022-11-28 14:54:27'),
(32, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:55:10', '2022-11-28 14:55:10'),
(33, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:56:50', '2022-11-28 14:56:50'),
(34, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:57:54', '2022-11-28 14:57:54'),
(35, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:59:09', '2022-11-28 14:59:09'),
(36, 'sdsdsd', 'test@mwardi.com', 'question', 'dsd', '2022-11-28 14:59:28', '2022-11-28 14:59:28'),
(37, 'kjhfs', 'hifh@nmsn.com', 'question', ',fngfng', '2022-11-28 15:26:21', '2022-11-28 15:26:21');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint UNSIGNED NOT NULL,
  `total_leave_days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `leave_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('approved','rejected','pending','approvedWithDeduction') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `deduction` double(8,2) NOT NULL DEFAULT '0.00',
  `employee_id` bigint UNSIGNED NOT NULL,
  `leave_type_id` bigint UNSIGNED NOT NULL,
  `applied_on` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `replacement_employee_id` bigint DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `ticket_flight_status` enum('no_both','go','back','go_back') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direct_manager` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_types`
--

CREATE TABLE `leaves_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `weekend_exception` tinyint NOT NULL DEFAULT '0',
  `holiday_exception` tinyint NOT NULL DEFAULT '0',
  `leave_plan` tinyint NOT NULL DEFAULT '0',
  `leave_plan_percentage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthly_waiting_period` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_allowed_days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max_allowed_days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vacation_balance` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maxDays` int DEFAULT NULL,
  `maxDaysPerMonth` int DEFAULT NULL,
  `afterMaxHour` int DEFAULT NULL,
  `parent` bigint DEFAULT NULL,
  `daysBeforeApply` int DEFAULT NULL,
  `deduction` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `title_ar`, `created_by`, `created_at`, `updated_at`, `type`, `maxDays`, `maxDaysPerMonth`, `afterMaxHour`, `parent`, `daysBeforeApply`, `deduction`) VALUES
(1, 'leave', 'أجازة', 22, '2022-10-03 10:49:02', '2022-10-03 10:49:02', 'leave', NULL, NULL, NULL, NULL, NULL, 0),
(6, 'Separated', 'اجازة منفصلة', 22, '2022-10-04 14:59:06', '2022-11-21 14:25:11', NULL, 21, 2, 24, 1, 0, 0),
(7, 'اجازة متصلة', 'اجازة متصلة', 22, '2022-10-04 14:59:46', '2022-12-21 12:43:35', NULL, 10, 15, 0, 1, 0, 0),
(8, 'اجازة عرضة', 'اجازة عرضة', 22, '2022-10-04 15:06:19', '2023-02-08 13:44:19', NULL, 1, 0, 0, 1, 0, 0),
(12, 'اضطراريه', 'اضطراريه', 19, '2022-11-15 16:16:33', '2022-12-29 12:45:47', NULL, 2, 3, 0, 1, 0, 1),
(13, 'جزء من الرصيد', 'جزء من الرصيد', 19, '2022-11-15 16:42:03', '2022-11-16 10:54:06', NULL, 5, 10, 0, 1, 3, 0),
(15, 'من غير راتب', 'من غير راتب', 19, '2022-11-15 16:43:57', '2022-11-15 16:43:57', NULL, 3, 5, 0, 1, 2, 1),
(16, 'جزء من الرصيد', 'جزء من الرصيد', 18, '2022-11-15 16:45:55', '2022-11-20 09:17:36', NULL, 21, 21, 0, 1, 4, 0),
(17, 'اضطراريه', 'اضطراريه', 18, '2022-11-15 16:46:32', '2022-11-15 16:46:32', NULL, 2, 4, 0, 1, 0, 0.5),
(18, 'من غير راتب', 'من غير راتب', 18, '2022-11-15 16:49:07', '2022-11-15 16:49:07', NULL, 2, 4, 48, 1, 2, 1),
(19, 'اجازه مرضيه', 'اجازه مرضيه', 18, '2022-11-15 16:50:02', '2022-11-15 16:50:02', NULL, 2, 4, 0, 1, 0, 0),
(20, 'الاجازه السنويه', 'الاجازه السنويه', 19, '2022-11-16 10:42:30', '2022-11-16 10:42:30', NULL, 21, 30, 24, 1, 20, 0),
(21, 'W F H', 'عمل من المنزل', 22, '2022-11-21 13:51:46', '2022-12-21 16:20:31', NULL, 12, 9, 24, 1, 1, 50),
(22, 'اجازة مرضية', 'اجازة مرضية', 22, '2022-11-22 12:34:22', '2022-11-22 12:34:22', NULL, 60, 4, 24, 1, 0, 25),
(23, 'Loan', 'قرض - سلفة', 22, '2022-10-03 10:49:02', '2022-10-03 10:49:02', 'loan', NULL, NULL, NULL, NULL, NULL, 0),
(24, 'Blance leave', 'جزء من الرصيد', 500, '2022-12-25 15:34:43', '2022-12-25 15:34:43', NULL, 10, 21, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `loan_option` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int NOT NULL,
  `discount_monthly` double DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan_pending_id` bigint DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan_options`
--

CREATE TABLE `loan_options` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_options`
--

INSERT INTO `loan_options` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Loans', 'سلف', 2, '2022-03-01 17:37:06', '2022-03-01 17:37:06'),
(3, 'Salary Advance', 'سلفة مقدمة من الراتب', 18, '2022-07-20 09:35:17', '2022-07-20 09:35:17'),
(4, 'Salary Advance', 'Salary Advance', 19, '2022-07-20 10:13:33', '2022-11-13 11:10:45'),
(5, 'Salary Advance', 'سلفة مقدمة من الراتب', 20, '2022-07-20 10:24:03', '2022-07-20 10:24:03'),
(6, 'Salary Advance', 'سلفة مقدمة من الراتب', 21, '2022-07-20 10:31:29', '2022-07-20 10:31:29'),
(7, 'Salary Advance', 'سلفة مقدمة من الراتب', 23, '2022-07-20 10:59:16', '2022-07-20 10:59:16'),
(8, 'Salary Advance', 'سلفة مقدمة من الراتب', 24, '2022-07-20 11:07:14', '2022-07-20 11:07:14'),
(9, 'Advance', 'سلفة', 68, '2022-07-20 11:57:22', '2022-11-10 10:52:23'),
(12, 'advance', 'سلفة', 154, '2022-11-13 15:53:08', '2022-11-15 15:35:04'),
(13, 'Salary Advance', 'سلفة', 362, '2022-11-15 08:58:43', '2022-11-15 08:58:43'),
(18, 'loan', 'سلفه', 22, '2023-02-20 16:46:08', '2023-02-20 16:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `loan_pendings`
--

CREATE TABLE `loan_pendings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month_nubmer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `employee_id` bigint DEFAULT NULL,
  `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `loan_option` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint DEFAULT NULL,
  `admin_message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint UNSIGNED NOT NULL,
  `branch_id` int NOT NULL,
  `department_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persons` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`id`, `branch_id`, `department_id`, `employee_id`, `title`, `date`, `time`, `note`, `url`, `created_by`, `created_at`, `updated_at`, `duration`, `location`, `persons`) VALUES
(1, 2, '[\"0\"]', '[\"1\"]', 'اجتماع', '2022-04-28', '00:00:09', 'ييبصب', NULL, 2, '2022-04-28 08:18:48', '2022-11-01 15:14:57', NULL, NULL, NULL),
(2, 10, '[\"10\"]', '[\"91\"]', 'test', '2022-11-28', '03:00:00', 'test', 'https://www.google.com/', 22, '2022-09-15 10:59:01', '2022-11-28 13:32:36', NULL, NULL, NULL),
(3, 0, '[\"0\"]', '[\"17\"]', 'كابتني', '2022-09-15', '01:00:00', NULL, NULL, 18, '2022-09-15 15:20:34', '2022-09-15 15:20:34', NULL, NULL, NULL),
(4, 0, '[\"10\"]', '[\"91\"]', 'Aut duis adipisicing', '2022-10-11', '12:00:00', 'Sed proident dolor', 'Labore velit anim ut', 22, '2022-10-11 10:56:32', '2022-10-11 10:56:32', NULL, NULL, NULL),
(5, 10, '[\"0\"]', '[\"91\"]', 'Eos magnam tempore', '2022-10-11', '03:00:00', 'Laboriosam eveniet', 'Do neque ad enim inc', 22, '2022-10-11 10:57:28', '2022-10-11 10:57:28', NULL, NULL, NULL),
(6, 0, '[\"0\"]', '[\"261\"]', 'test', '2022-11-28', '02:00:00', 'test', 'https://meet.google.com/ihp-uvzr-vti', 19, '2022-10-18 10:08:12', '2022-11-28 13:17:08', NULL, NULL, NULL),
(7, 0, '', '[\"74\"]', 'Impedit porro corru', '2023-05-31', '09:00:00', 'Placeat debitis ani', NULL, 22, '2023-04-16 12:16:53', '2023-04-18 15:16:59', 'Temporibus ipsa id', 'Qui quam laborum Lo', NULL),
(8, 0, '', '[\"61\",\"62\",\"63\",\"64\",\"65\",\"74\",\"86\",\"90\",\"91\",\"92\",\"93\",\"94\"]', 'Qui autem tenetur re', '2023-04-24', '09:00:00', 'Quam explicabo Omni', NULL, 22, '2023-04-16 12:20:48', '2023-04-16 13:07:53', 'Sunt quis optio at', 'Neque quia sed conse', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `meeting_employees`
--

CREATE TABLE `meeting_employees` (
  `id` bigint UNSIGNED NOT NULL,
  `meeting_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reject_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','accepted','rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_employees`
--

INSERT INTO `meeting_employees` (`id`, `meeting_id`, `employee_id`, `created_by`, `created_at`, `updated_at`, `reject_reason`, `status`) VALUES
(43, 7, 74, 22, '2023-04-18 15:16:59', '2023-05-02 10:05:40', NULL, 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_22_192348_create_messages_table', 1),
(5, '2019_09_28_102009_create_settings_table', 1),
(6, '2019_10_16_211433_create_favorites_table', 1),
(7, '2019_10_18_223259_add_avatar_to_users', 1),
(8, '2019_10_20_211056_add_messenger_color_to_users', 1),
(9, '2019_10_22_000539_add_dark_mode_to_users', 1),
(10, '2019_10_25_214038_add_active_status_to_users', 1),
(11, '2019_12_26_101754_create_departments_table', 1),
(12, '2019_12_26_101814_create_designations_table', 1),
(13, '2019_12_26_105721_create_documents_table', 1),
(14, '2019_12_27_083751_create_branches_table', 1),
(15, '2019_12_27_090831_create_employees_table', 1),
(16, '2019_12_27_112922_create_employee_documents_table', 1),
(17, '2019_12_28_050508_create_awards_table', 1),
(18, '2019_12_28_050919_create_award_types_table', 1),
(19, '2019_12_31_060916_create_termination_types_table', 1),
(20, '2019_12_31_062259_create_terminations_table', 1),
(21, '2019_12_31_070521_create_resignations_table', 1),
(22, '2019_12_31_072252_create_travels_table', 1),
(23, '2019_12_31_090637_create_promotions_table', 1),
(24, '2019_12_31_092838_create_transfers_table', 1),
(25, '2019_12_31_100319_create_warnings_table', 1),
(26, '2019_12_31_103019_create_complaints_table', 1),
(27, '2020_01_02_090837_create_payslip_types_table', 1),
(28, '2020_01_02_093331_create_allowance_options_table', 1),
(29, '2020_01_02_102558_create_loan_options_table', 1),
(30, '2020_01_02_103822_create_deduction_options_table', 1),
(31, '2020_01_02_110828_create_genrate_payslip_options_table', 1),
(32, '2020_01_02_111807_create_set_salaries_table', 1),
(33, '2020_01_03_084302_create_allowances_table', 1),
(34, '2020_01_03_101735_create_commissions_table', 1),
(35, '2020_01_03_105019_create_loans_table', 1),
(36, '2020_01_03_105046_create_saturation_deductions_table', 1),
(37, '2020_01_03_105100_create_other_payments_table', 1),
(38, '2020_01_03_105111_create_overtimes_table', 1),
(39, '2020_01_04_072527_create_pay_slips_table', 1),
(40, '2020_01_06_045425_create_account_lists_table', 1),
(41, '2020_01_06_062213_create_payees_table', 1),
(42, '2020_01_06_070037_create_payers_table', 1),
(43, '2020_01_06_072939_create_income_types_table', 1),
(44, '2020_01_06_073055_create_expense_types_table', 1),
(45, '2020_01_06_085218_create_deposits_table', 1),
(46, '2020_01_06_090709_create_payment_types_table', 1),
(47, '2020_01_06_121442_create_expenses_table', 1),
(48, '2020_01_06_124036_create_transfer_balances_table', 1),
(49, '2020_01_13_084720_create_events_table', 1),
(50, '2020_01_16_041720_create_announcements_table', 1),
(51, '2020_01_16_090747_create_leave_types_table', 1),
(52, '2020_01_16_093256_create_leaves_table', 1),
(53, '2020_01_16_110357_create_meetings_table', 1),
(54, '2020_01_17_051906_create_tickets_table', 1),
(55, '2020_01_17_112647_create_ticket_replies_table', 1),
(56, '2020_01_23_101613_create_meeting_employees_table', 1),
(57, '2020_01_23_123844_create_event_employees_table', 1),
(58, '2020_01_24_062752_create_announcement_employees_table', 1),
(59, '2020_01_27_052503_create_attendance_employees_table', 1),
(60, '2020_02_17_035047_create_plans_table', 1),
(61, '2020_02_17_072503_create_orders_table', 1),
(62, '2020_02_28_051636_create_time_sheets_table', 1),
(63, '2020_03_12_095629_create_coupons_table', 1),
(64, '2020_03_12_120749_create_user_coupons_table', 1),
(65, '2020_04_21_115823_create_assets_table', 1),
(66, '2020_05_01_122144_create_ducument_uploads_table', 1),
(67, '2020_05_04_070452_create_indicators_table', 1),
(68, '2020_05_05_023742_create_appraisals_table', 1),
(69, '2020_05_05_061241_create_goal_types_table', 1),
(70, '2020_05_05_095926_create_goal_trackings_table', 1),
(71, '2020_05_07_093520_create_company_policies_table', 1),
(72, '2020_05_07_131311_create_training_types_table', 1),
(73, '2020_05_08_023838_create_trainers_table', 1),
(74, '2020_05_08_043039_create_trainings_table', 1),
(75, '2020_05_21_065337_create_permission_tables', 1),
(76, '2020_07_06_102454_add_payment_type_in_orders_table', 1),
(77, '2020_07_18_065859_create_messageses_table', 1),
(78, '2020_07_22_131715_change_amount_type_size', 1),
(79, '2020_10_07_034726_create_holidays_table', 1),
(80, '2021_02_19_085311_add_ticket_created__in_tickets', 1),
(81, '2021_03_13_093312_create_ip_restricts_table', 1),
(82, '2021_03_13_114832_create_job_categories_table', 1),
(83, '2021_03_13_123125_create_job_stages_table', 1),
(84, '2021_03_15_094707_create_jobs_table', 1),
(85, '2021_03_15_153745_create_job_applications_table', 1),
(86, '2021_03_16_115140_create_job_application_notes_table', 1),
(87, '2021_03_17_163107_create_custom_questions_table', 1),
(88, '2021_03_18_140630_create_interview_schedules_table', 1),
(89, '2021_03_22_122532_create_job_on_boards_table', 1),
(90, '2021_06_22_094220_create_landing_page_sections_table', 1),
(91, '2021_06_25_032625_admin_payment_setting', 1),
(92, '2021_08_20_084119_create_competencies_table', 1),
(93, '2021_08_21_044211_add_rating_in_competencies', 1),
(94, '2021_09_10_165514_create_plan_requests_table', 1),
(95, '2021_11_22_043537_create_performance__types_table', 1),
(96, '2021_12_24_061634_create_zoom_meetings_table', 1),
(97, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(98, '2022_2_19_083761_create_jobtitles_table', 2),
(99, '2022_2_19_083762_create_categories_table', 2),
(100, '2022_2_19_083763_create_nationalities_table', 2),
(101, '2022_2_19_083781_create_jobtitles_table', 3),
(102, '2022_2_19_083782_create_categories_table', 3),
(103, '2022_2_19_083783_create_nationalities_table', 3),
(104, '2022_2_19_083784_add_columns_to_employees_table', 4),
(105, '2022_2_24_083785_add_columns_to_employees_table', 5),
(106, '2022_02_27_083786_create_employee_contracts_table', 6),
(107, '2022_02_27_083787_create_employee_followers_table', 7),
(108, '2022_02_27_083788_create_holiday_types_table', 8),
(109, '2022_03_01_083789_add_column_discount_monthly_to_loans_table', 9),
(110, '2022_03_01_083790_add_column_ticket_to_leaves_table', 10),
(111, '2022_03_03_083791_create_salary_settings_table', 11),
(112, '2022_03_03_083792_create_salary_settings_table', 12),
(113, '2022_03_03_083793_add_column_insurance_active_to_allowance_options_table', 13),
(114, '2022_03_06_083794_add_column_type_to_commissions_table', 14),
(115, '2022_03_09_083795_add_column_sync_attendance_employee_id_to_employees_table', 15),
(116, '2022_03_09_083796_add_column_sync_attendance_employee_id_to_employees_table', 16),
(117, '2022_03_13_083797_add_columns_to_attendance_employees_table', 17),
(118, '2022_03_13_083798_add_columns_to_attendance_employees_table', 18),
(119, '2022_03_13_083799_add_columns_to_attendance_employees_table', 19),
(120, '2022_03_17_083800_add_columns_work_hours_to_salary_settings_table', 20),
(121, '2022_04_11_083801_add_multiple_columns_to_employees_table', 21),
(122, '2022_04_12_083781_create_employee_shifts_table', 22),
(123, '2022_04_12_083782_create_job_types_table', 23),
(124, '2022_04_12_083783_create_labor_hire_companies_table', 24),
(125, '2022_04_12_083784_create_work_unites_table', 24),
(126, '2022_04_12_083785_create_banks_table', 25),
(127, '2022_04_12_083786_add_column_contract_duration_to_employee_contracts_table', 26),
(128, '2022_04_12_083787_add_column_probation_periods_status_to_employees_table', 27),
(129, '2022_04_13_083788_add_column_hijri_dates_to_employee_contracts_table', 28),
(130, '2022_04_13_083789_add_column_employee_id_to_assets_table', 29),
(131, '2022_04_13_083790_add_column_employee_id_to_ducument_uploads_table', 30),
(132, '2022_04_17_083791_add_additional_columns_to_employee_followers_table', 31),
(133, '2022_04_17_083792_add_additional_columns_to_employee_followers_table', 32),
(134, '2022_04_17_083790_add_additional_columns_to_employee_followers_table', 33),
(135, '2022_04_17_083791_create_qualifications_table', 34),
(136, '2022_04_18_083792_add_column_bank_IBAN_number_to_employees_table', 35),
(137, '2022_04_17_083792_add_column_bank_IBAN_number_to_employees_table', 36),
(138, '2022_05_16_083789_add_column_user_register_to_employees_table', 37),
(139, '2022_05_16_083789_add_column_user_status_to_users_table', 37),
(140, '2022_05_17_083790_create_request_types_table', 38),
(141, '2022_05_17_0932592_create_employee_requests_table', 38),
(142, '2022_05_18_083793_add_column_employee_id_to_branches_table', 39),
(143, '2022_05_18_083794_add_column_employee_id_to_departments_table', 39),
(144, '2022_05_18_0932595_create_notifications_table', 39),
(145, '2022_05_29_0932596_add_column_created_by_to_salary_settings_table', 40),
(146, '2022_05_29_0932597_add_column_payroll_dispaly_to_allowance_options_table', 40),
(147, '2022_05_30_0932598_add_column_medical_insurance_to_salary_settings_table', 41),
(148, '2022_05_31_09325100_create_companyslates_table', 41),
(149, '2022_05_31_09325101_add_column_company_slate_readed_to_users_table', 41),
(150, '2022_05_31_09325102_create_salary_components_types_table', 42),
(151, '2022_06_01_09325103_create_attendance_movements_table', 42),
(152, '2022_06_06_09325104_create_absences_table', 43),
(153, '2022_06_08_09325105_add_column_absence_to_pay_slips_table', 44),
(154, '2022_06_13_09325106_add_columns_to_salary_setting_table', 45),
(155, '2022_06_23_09325107_add_column_overtime_rate_to_salary_setting_table', 46),
(156, '2022_07_18_09325108_add_column_lat_lon_to_branch_table', 47),
(157, '2022_07_19_09325109_create_vehicles_table', 47),
(158, '2022_07_19_09325110_add_columns_to_vehicles_table', 47),
(159, '2022_07_19_09325111_create_company_ducument_uploads_table', 48),
(162, '2022_07_20_09325112_create_company_structures_table', 49),
(163, '2022_07_24_09325112_create_company_structure_employees_table', 49),
(164, '2022_07_25_09325113_add_column_date_to_multiple_tables', 50),
(165, '2022_07_28_09325114_create_leaves_types_table', 51),
(166, '2022_07_31_09325115_add_column_device_id_to_users_table', 51),
(167, '2022_07_31_09325116_create_fcm_table', 51),
(168, '2022_08_02_09325117_add_delay_reason_to_attendance_employees_table', 51),
(169, '2022_08_02_09325118_alter_columns_to_attendance_employees_table', 51),
(170, '2022_08_02_09325119_add_urgent_end_reason_to_attendance_employees_table', 51),
(171, '2022_08_11_09325120_create_places_table', 52),
(172, '2022_08_11_09325121_add_column_location_to_employees_table', 52),
(173, '2021_08_23_185057_create_zkteco_devices_table', 53),
(174, '2021_08_23_185624_create_in_out_logs_table', 53),
(175, '2022_09_11_09325122_add_multiple_columns_to_users_table', 53),
(176, '2022_09_19_09325123_add_forgetcode_column_to_users_table', 54),
(177, '2022_09_19_09325124_add_time_column_to_events_table', 54),
(178, '2022_09_19_09325125_add_url_column_to_meetings_table', 54),
(179, '2022_09_20_100338_create_landsections_table', 55),
(180, '2022_09_20_110425_create_landsliders_table', 55),
(181, '2022_09_20_110843_create_landcloudcards_table', 55),
(182, '2022_09_20_111243_create_landhelpcards_table', 55),
(183, '2022_09_20_111434_create_landplans_table', 55),
(184, '2022_09_20_111838_create_landfeatures_table', 55),
(185, '2022_09_20_112012_create_landsaycards_table', 55),
(186, '2022_09_20_112127_create_landblogs_table', 55),
(187, '2022_09_20_112319_create_landaboutcards_table', 55),
(188, '2022_09_20_112437_create_landdemocards_table', 55),
(189, '2022_09_20_112637_create_landcontactcards_table', 55),
(190, '2022_09_20_112638_add_percent_column_to_saturation_deductions_table', 55),
(191, '2022_09_26_092121_create_landsocialmedia_table', 56),
(192, '2022_09_26_133857_create_landsupportforms_table', 57),
(193, '2022_09_27_141053_update_leave_types_table', 58),
(194, '2022_09_27_153728_delete_columns_to_leaves_table', 58),
(195, '2022_09_27_153825_add_columns_to_leaves_table', 59),
(196, '2022_09_28_114110_add_parent_to_leave_types_table', 59),
(197, '2022_09_28_151933_change_leaves_table', 59),
(198, '2022_09_28_152143_add_to_leaves_table', 59),
(199, '2022_09_28_235911_add_to_leave_types_table', 59),
(200, '2022_09_29_011310_drop_column_same_day', 59),
(201, '2022_10_02_153239_add_admin_message_to_leaves_table', 59),
(202, '2022_10_04_102022_add_replacement_employee_id_to_leaves_table', 60),
(203, '2022_10_18_133109_create_ducument_upload_images_table', 61),
(204, '2022_10_19_132121_create_insurance_companies_table', 62),
(205, '2022_10_20_115215_add_insurance_fields', 63),
(206, '2022_10_20_140810_add_insurance_company', 64),
(207, '2022_10_25_160527_add_leave_id_to_table_abscence', 65),
(208, '2022_11_03_140306_create_questions_table', 66),
(209, '2022_11_06_105146_create_evaluation_categories_table', 66),
(210, '2022_11_09_144354_create_evaluations_table', 67),
(211, '2022_11_09_152946_create_evaluation_results_table', 67),
(212, '2022_11_10_140158_create_company_breaks_table', 68),
(213, '2022_11_10_155945_create_employee_breaks_table', 69),
(214, '2022_11_14_100200_add_soft_deletes_to_company_breaks', 70),
(215, '2022_11_15_115008_create_landfaqs_table', 71),
(216, '2022_11_17_093251010_add_column_payroll_calculator_to_salary_setting_table', 72),
(217, '2022_11_17_115009_create_payroll_settings_table', 72),
(218, '2022_11_17_103058_create_company_ducument_upload_categories_table', 73),
(219, '2022_11_17_103415_add_category_to_company_document_uploads_table', 73),
(220, '2022_11_21_132840_create_company_job_requests_table', 74),
(221, '2022_11_21_132855_create_job_requests_table', 74),
(222, '2022_11_23_133759_add_to_job_requests_table', 75),
(223, '2022_11_27_103138_add_ticket_flight_status_to_leaves_table', 76),
(224, '2022_11_27_131920_create_shifts_table', 77),
(225, '2022_11_29_094229_create_employee_branches_table', 78),
(226, '2022_11_30_144122_add_to_attendance_employees', 79),
(227, '2022_12_07_110848_add_type_to_questions_table', 80),
(228, '2022_12_12_104950_create_loan_pendings_table', 81),
(229, '2022_12_12_150311_add_activity_type_to_users', 82),
(230, '2022_12_12_155847_create_evaluation_answers_table', 83),
(231, '2022_12_13_140111_add_work_email_to_users', 83),
(232, '2022_12_21_154314_create_terminate_requests_table', 84),
(233, '2023_01_01_194900_add_login_image_to_employees_table', 85),
(234, '2023_01_02_101624_add_to_image_clock_in_image_clock_out_to_attendance_employees', 85),
(235, '2023_01_17_094335_create_employee_permissions_table', 86),
(236, '2023_01_18_094621_add_is_recieved_to_pay_slips_table', 87),
(237, '2023_02_05_100045_add_lat_lang_to_employee', 88),
(238, '2023_02_05_111824_create_employee_finger_print_locations_table', 88),
(239, '2023_02_14_141543_add_skip_location_to_employees', 89),
(240, '2023_02_14_160307_add_read_slate_to_employees', 90),
(241, '2023_02_15_110529_create_work_from_home_requests_table', 91),
(242, '2023_02_20_130736_add_direct_manager_to_employee_permissions', 92),
(243, '2023_02_20_143721_add_other_currency_rateto_salary_setting_table', 92),
(244, '2023_02_21_130008_create_activity_log_table', 93),
(245, '2023_02_21_130009_add_event_column_to_activity_log_table', 93),
(246, '2023_02_21_130010_add_batch_uuid_column_to_activity_log_table', 93),
(247, '2023_02_21_164007_add_direct_manager_to_work_from_home_requests', 94),
(248, '2023_02_22_105708_add_direct_manager_to_loan_pendings_table', 95),
(249, '2023_02_22_105858_add_direct_manager_to_leaves_table', 95),
(250, '2023_03_07_155410_add_is_read_to_job_requests_table', 96),
(251, '2023_03_08_100952_add_columns_to_company_job_requests', 96),
(252, '2023_03_08_100953_add_columns_to_commission_table', 96),
(253, '2023_03_14_111509_alter_assets_table', 96),
(254, '2023_03_16_112330_add_category_to_permissions', 96),
(255, '2023_03_22_103614_create_evaluation_sections_table', 96),
(256, '2023_03_22_103729_add_section_id_to_questions_table', 96),
(257, '2023_03_22_104030_create_question_options_table', 96),
(258, '2023_03_22_112254_add_column_to_meetings_table', 96),
(259, '2023_03_22_152301_add_start_and_end_date_to_evaluations_table', 96),
(260, '2023_03_23_134647_create_tasks_table', 96),
(261, '2023_03_23_134847_create_employee_tasks_table', 96),
(262, '2023_03_23_135024_create_task_activity_logs_table', 96),
(263, '2023_03_26_125637_alter_events_table', 96),
(264, '2023_03_27_140223_add_columns_to_evaluations', 96),
(265, '2023_03_28_095411_add_points_to_answers_table', 96),
(266, '2023_03_28_134536_add_column_to_tasks_table', 96),
(267, '2023_03_29_095433_create_offers_table', 96),
(268, '2023_03_29_121524_create_news_table', 96),
(269, '2023_03_30_112200_create_contract_templates_table', 96),
(270, '2023_04_02_120101_create_job_offer_sections_table', 96),
(271, '2023_04_02_134536_add_column_structure_key_to_company_structures_table', 96),
(272, '2023_04_02_134537_add_column_employee_id_to_company_structures_table', 96),
(273, '2023_04_03_110758_add_priority_to_tasks_table', 96),
(274, '2023_04_03_130550_create_job_offer_questions_table', 96),
(275, '2023_04_03_131905_create_job_offer_question_options_table', 96),
(276, '2023_04_04_114406_create_job_offer_users_table', 96),
(277, '2023_04_04_114510_create_job_offer_answers_table', 96),
(278, '2023_04_05_114510_create_performance__periods_table', 96),
(279, '2023_04_05_131911_create_performance_factors_table', 96),
(280, '2023_04_05_131912_create_performance_table', 96),
(281, '2023_04_05_131913_create_performance_details_table', 96),
(282, '2023_04_06_100131_add_cv_to_job_offer_users_table', 96),
(283, '2023_04_06_121815_add_name_to_job_offer_users_table', 96),
(284, '2023_04_06_134445_add_points_to_job_offer_answers_table', 96),
(285, '2023_04_09_133439_create_missions_table', 97),
(286, '2023_04_09_140503_create_over_time_requests_table', 97),
(287, '2023_04_10_134446_add_type_to_performance_table', 97),
(288, '2023_04_11_100249_add_reject_reason_to_work_from_home_requests', 97),
(289, '2023_04_11_144838_create_task_comments_table', 97),
(290, '2023_04_12_134719_add_parent_id_to_evaluations__table', 97),
(291, '2023_04_12_142059_add_missied_columns_to_evaluations__table', 98),
(292, '2023_04_12_110822_add_admin_message_to_employee_permissions_table', 99),
(293, '2023_04_12_130006_add_status_to_missions_table', 99),
(294, '2023_04_17_133225_add_extra_columns_to_job_offer_users_table', 100),
(295, '2023_04_17_142060_add_national_id_column_to_employees__table', 100),
(296, '2023_04_17_144745_add_new_columns_to_compnay_job_requests_table', 100),
(297, '2023_04_17_142559_create_assets_types_table', 101),
(298, '2023_04_17_145857_alter_type_assets_table', 101),
(299, '2023_04_18_123314_add_contraint_cascaed_for_delete_to_job_offer_answers_table', 102),
(300, '2023_04_16_121625_add_status_to_over_time_requests_table', 103),
(301, '2023_04_18_110044_add_admin_message_to_over_time_requests', 103),
(302, '2023_04_18_155514_add_location_to_compnay_job_offers', 104),
(303, '2023_04_26_155515_add_document_type_to_documents_table', 105),
(304, '2023_04_26_155516_create_document_types_table', 105),
(305, '2023_04_27_094330_add_months_no_to_performance_periods_table', 105),
(306, '2023_04_27_102836_add_start_date_to_offers_table', 105),
(307, '2023_04_27_135813_add_persons_to_meetings_table', 105),
(308, '2023_04_27_150723_add_photo_to_events_table', 105),
(309, '2023_04_28_102837_add_columns_to_employee_documents_table', 105),
(310, '2023_04_30_105830_add_status_reject_reason_to_table_meeting_employees_table', 105),
(311, '2023_04_30_105831_add_status_to_company_job_requests', 105),
(312, '2023_04_30_105832_add_end_date_to_news_table', 105),
(313, '2023_04_30_150254_add_interview_date_from_and_to_to_job_offer_users_table', 105),
(314, '2023_04_30_171110_add_direct_manager_to_missions_table', 106),
(315, '2023_05_02_141546_create_offer_categories_table', 106),
(316, '2023_05_02_141651_add_category_to_offers', 106),
(317, '2023_05_02_144729_update_status_in_meeting_employees', 107),
(318, '2023_05_02_155829_add_confirm_receive_salary_to_payslips_table', 108),
(319, '2023_05_03_092408_delete_confirm_recieve_salary_from_from_pay_slips', 109),
(320, '2023_05_03_100424_add_direct_manager_to_over_time_requests', 110),
(321, '2023_05_03_105036_add_admin_message_to_loan_pendings_table', 110),
(322, '2023_05_03_151449_add_on_off_notification_to_employees_table', 110);

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `direct_manager` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `missions`
--

INSERT INTO `missions` (`id`, `employee_id`, `date`, `start`, `end`, `reason`, `created_at`, `updated_at`, `status`, `direct_manager`) VALUES
(1, 41, '2023-04-30', '14:44:00', '17:44:00', 'kjmn', '2023-04-30 16:06:05', '2023-05-08 11:53:01', 'rejected', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 12),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(3, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(10, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 30),
(4, 'App\\Models\\User', 32),
(4, 'App\\Models\\User', 35),
(3, 'App\\Models\\User', 37),
(4, 'App\\Models\\User', 40),
(4, 'App\\Models\\User', 41),
(4, 'App\\Models\\User', 42),
(4, 'App\\Models\\User', 43),
(4, 'App\\Models\\User', 44),
(4, 'App\\Models\\User', 45),
(4, 'App\\Models\\User', 46),
(4, 'App\\Models\\User', 47),
(4, 'App\\Models\\User', 48),
(4, 'App\\Models\\User', 49),
(4, 'App\\Models\\User', 51),
(4, 'App\\Models\\User', 52),
(4, 'App\\Models\\User', 53),
(4, 'App\\Models\\User', 54),
(4, 'App\\Models\\User', 55),
(4, 'App\\Models\\User', 56),
(4, 'App\\Models\\User', 57),
(4, 'App\\Models\\User', 58),
(4, 'App\\Models\\User', 59),
(4, 'App\\Models\\User', 60),
(4, 'App\\Models\\User', 61),
(4, 'App\\Models\\User', 62),
(4, 'App\\Models\\User', 63),
(4, 'App\\Models\\User', 64),
(4, 'App\\Models\\User', 65),
(4, 'App\\Models\\User', 66),
(4, 'App\\Models\\User', 67),
(2, 'App\\Models\\User', 68),
(4, 'App\\Models\\User', 69),
(4, 'App\\Models\\User', 70),
(4, 'App\\Models\\User', 89),
(4, 'App\\Models\\User', 138),
(2, 'App\\Models\\User', 154),
(4, 'App\\Models\\User', 155),
(4, 'App\\Models\\User', 156),
(2, 'App\\Models\\User', 157),
(2, 'App\\Models\\User', 160),
(2, 'App\\Models\\User', 163),
(2, 'App\\Models\\User', 164),
(2, 'App\\Models\\User', 165),
(2, 'App\\Models\\User', 166),
(2, 'App\\Models\\User', 167),
(2, 'App\\Models\\User', 168),
(2, 'App\\Models\\User', 169),
(2, 'App\\Models\\User', 170),
(2, 'App\\Models\\User', 171),
(2, 'App\\Models\\User', 172),
(2, 'App\\Models\\User', 173),
(2, 'App\\Models\\User', 174),
(2, 'App\\Models\\User', 175),
(2, 'App\\Models\\User', 176),
(2, 'App\\Models\\User', 177),
(2, 'App\\Models\\User', 178),
(2, 'App\\Models\\User', 179),
(2, 'App\\Models\\User', 180),
(2, 'App\\Models\\User', 181),
(2, 'App\\Models\\User', 182),
(2, 'App\\Models\\User', 183),
(2, 'App\\Models\\User', 184),
(2, 'App\\Models\\User', 185),
(4, 'App\\Models\\User', 199),
(2, 'App\\Models\\User', 218),
(4, 'App\\Models\\User', 219),
(4, 'App\\Models\\User', 220),
(4, 'App\\Models\\User', 221),
(4, 'App\\Models\\User', 222),
(4, 'App\\Models\\User', 223),
(4, 'App\\Models\\User', 224),
(4, 'App\\Models\\User', 225),
(4, 'App\\Models\\User', 226),
(4, 'App\\Models\\User', 228),
(4, 'App\\Models\\User', 229),
(4, 'App\\Models\\User', 235),
(4, 'App\\Models\\User', 236),
(4, 'App\\Models\\User', 239),
(4, 'App\\Models\\User', 242),
(4, 'App\\Models\\User', 244),
(4, 'App\\Models\\User', 245),
(4, 'App\\Models\\User', 246),
(4, 'App\\Models\\User', 248),
(4, 'App\\Models\\User', 249),
(4, 'App\\Models\\User', 250),
(4, 'App\\Models\\User', 251),
(4, 'App\\Models\\User', 252),
(4, 'App\\Models\\User', 253),
(4, 'App\\Models\\User', 254),
(4, 'App\\Models\\User', 255),
(4, 'App\\Models\\User', 256),
(4, 'App\\Models\\User', 257),
(4, 'App\\Models\\User', 258),
(4, 'App\\Models\\User', 259),
(4, 'App\\Models\\User', 260),
(4, 'App\\Models\\User', 261),
(4, 'App\\Models\\User', 262),
(4, 'App\\Models\\User', 263),
(4, 'App\\Models\\User', 264),
(4, 'App\\Models\\User', 265),
(4, 'App\\Models\\User', 266),
(4, 'App\\Models\\User', 267),
(4, 'App\\Models\\User', 268),
(4, 'App\\Models\\User', 269),
(4, 'App\\Models\\User', 270),
(4, 'App\\Models\\User', 271),
(4, 'App\\Models\\User', 272),
(4, 'App\\Models\\User', 273),
(4, 'App\\Models\\User', 274),
(4, 'App\\Models\\User', 275),
(4, 'App\\Models\\User', 276),
(4, 'App\\Models\\User', 277),
(4, 'App\\Models\\User', 278),
(4, 'App\\Models\\User', 279),
(4, 'App\\Models\\User', 280),
(4, 'App\\Models\\User', 281),
(4, 'App\\Models\\User', 282),
(4, 'App\\Models\\User', 283),
(4, 'App\\Models\\User', 284),
(4, 'App\\Models\\User', 285),
(4, 'App\\Models\\User', 286),
(4, 'App\\Models\\User', 287),
(4, 'App\\Models\\User', 288),
(4, 'App\\Models\\User', 289),
(4, 'App\\Models\\User', 290),
(4, 'App\\Models\\User', 291),
(4, 'App\\Models\\User', 292),
(4, 'App\\Models\\User', 293),
(4, 'App\\Models\\User', 294),
(4, 'App\\Models\\User', 295),
(4, 'App\\Models\\User', 296),
(4, 'App\\Models\\User', 297),
(4, 'App\\Models\\User', 298),
(4, 'App\\Models\\User', 299),
(4, 'App\\Models\\User', 300),
(4, 'App\\Models\\User', 301),
(4, 'App\\Models\\User', 302),
(4, 'App\\Models\\User', 303),
(4, 'App\\Models\\User', 304),
(4, 'App\\Models\\User', 305),
(4, 'App\\Models\\User', 306),
(4, 'App\\Models\\User', 307),
(4, 'App\\Models\\User', 308),
(4, 'App\\Models\\User', 309),
(4, 'App\\Models\\User', 310),
(4, 'App\\Models\\User', 311),
(4, 'App\\Models\\User', 312),
(4, 'App\\Models\\User', 313),
(4, 'App\\Models\\User', 314),
(4, 'App\\Models\\User', 315),
(4, 'App\\Models\\User', 316),
(4, 'App\\Models\\User', 317),
(4, 'App\\Models\\User', 318),
(4, 'App\\Models\\User', 319),
(4, 'App\\Models\\User', 320),
(4, 'App\\Models\\User', 321),
(4, 'App\\Models\\User', 322),
(4, 'App\\Models\\User', 323),
(4, 'App\\Models\\User', 324),
(4, 'App\\Models\\User', 325),
(4, 'App\\Models\\User', 326),
(4, 'App\\Models\\User', 327),
(4, 'App\\Models\\User', 328),
(4, 'App\\Models\\User', 329),
(4, 'App\\Models\\User', 330),
(4, 'App\\Models\\User', 331),
(4, 'App\\Models\\User', 332),
(4, 'App\\Models\\User', 333),
(4, 'App\\Models\\User', 334),
(4, 'App\\Models\\User', 335),
(4, 'App\\Models\\User', 336),
(4, 'App\\Models\\User', 337),
(4, 'App\\Models\\User', 338),
(4, 'App\\Models\\User', 339),
(4, 'App\\Models\\User', 340),
(4, 'App\\Models\\User', 341),
(4, 'App\\Models\\User', 342),
(4, 'App\\Models\\User', 343),
(4, 'App\\Models\\User', 344),
(4, 'App\\Models\\User', 345),
(4, 'App\\Models\\User', 346),
(4, 'App\\Models\\User', 347),
(4, 'App\\Models\\User', 348),
(4, 'App\\Models\\User', 349),
(4, 'App\\Models\\User', 350),
(4, 'App\\Models\\User', 351),
(4, 'App\\Models\\User', 352),
(4, 'App\\Models\\User', 353),
(4, 'App\\Models\\User', 354),
(4, 'App\\Models\\User', 355),
(4, 'App\\Models\\User', 356),
(4, 'App\\Models\\User', 357),
(4, 'App\\Models\\User', 358),
(4, 'App\\Models\\User', 359),
(4, 'App\\Models\\User', 360),
(4, 'App\\Models\\User', 361),
(2, 'App\\Models\\User', 362),
(4, 'App\\Models\\User', 373),
(4, 'App\\Models\\User', 375),
(2, 'App\\Models\\User', 380),
(2, 'App\\Models\\User', 381),
(4, 'App\\Models\\User', 382),
(4, 'App\\Models\\User', 383),
(4, 'App\\Models\\User', 384),
(2, 'App\\Models\\User', 385),
(4, 'App\\Models\\User', 386),
(4, 'App\\Models\\User', 387),
(4, 'App\\Models\\User', 388),
(4, 'App\\Models\\User', 389),
(4, 'App\\Models\\User', 390),
(4, 'App\\Models\\User', 391),
(4, 'App\\Models\\User', 392),
(4, 'App\\Models\\User', 393),
(4, 'App\\Models\\User', 394),
(4, 'App\\Models\\User', 395),
(4, 'App\\Models\\User', 396),
(4, 'App\\Models\\User', 397),
(4, 'App\\Models\\User', 398),
(4, 'App\\Models\\User', 399),
(4, 'App\\Models\\User', 400),
(2, 'App\\Models\\User', 401),
(2, 'App\\Models\\User', 402),
(2, 'App\\Models\\User', 403),
(2, 'App\\Models\\User', 404),
(2, 'App\\Models\\User', 405),
(2, 'App\\Models\\User', 406),
(2, 'App\\Models\\User', 407),
(4, 'App\\Models\\User', 408),
(4, 'App\\Models\\User', 409),
(4, 'App\\Models\\User', 410),
(4, 'App\\Models\\User', 411),
(4, 'App\\Models\\User', 412),
(4, 'App\\Models\\User', 414),
(4, 'App\\Models\\User', 415),
(4, 'App\\Models\\User', 416),
(4, 'App\\Models\\User', 417),
(4, 'App\\Models\\User', 418),
(4, 'App\\Models\\User', 419),
(4, 'App\\Models\\User', 420),
(4, 'App\\Models\\User', 421),
(4, 'App\\Models\\User', 422),
(4, 'App\\Models\\User', 423),
(4, 'App\\Models\\User', 424),
(4, 'App\\Models\\User', 425),
(4, 'App\\Models\\User', 426),
(4, 'App\\Models\\User', 427),
(4, 'App\\Models\\User', 428),
(4, 'App\\Models\\User', 429),
(4, 'App\\Models\\User', 430),
(4, 'App\\Models\\User', 431),
(4, 'App\\Models\\User', 432),
(4, 'App\\Models\\User', 433),
(4, 'App\\Models\\User', 434),
(4, 'App\\Models\\User', 435),
(4, 'App\\Models\\User', 436),
(4, 'App\\Models\\User', 437),
(4, 'App\\Models\\User', 438),
(4, 'App\\Models\\User', 439),
(4, 'App\\Models\\User', 440),
(4, 'App\\Models\\User', 441),
(4, 'App\\Models\\User', 443),
(4, 'App\\Models\\User', 444),
(4, 'App\\Models\\User', 445),
(4, 'App\\Models\\User', 447),
(4, 'App\\Models\\User', 448),
(4, 'App\\Models\\User', 449),
(4, 'App\\Models\\User', 450),
(4, 'App\\Models\\User', 451),
(4, 'App\\Models\\User', 452),
(4, 'App\\Models\\User', 453),
(4, 'App\\Models\\User', 454),
(4, 'App\\Models\\User', 455),
(4, 'App\\Models\\User', 456),
(4, 'App\\Models\\User', 457),
(4, 'App\\Models\\User', 458),
(4, 'App\\Models\\User', 459),
(4, 'App\\Models\\User', 460),
(4, 'App\\Models\\User', 461),
(4, 'App\\Models\\User', 462),
(4, 'App\\Models\\User', 463),
(4, 'App\\Models\\User', 464),
(4, 'App\\Models\\User', 465),
(4, 'App\\Models\\User', 466),
(4, 'App\\Models\\User', 467),
(4, 'App\\Models\\User', 468),
(4, 'App\\Models\\User', 469),
(4, 'App\\Models\\User', 470),
(4, 'App\\Models\\User', 471),
(4, 'App\\Models\\User', 472),
(4, 'App\\Models\\User', 473),
(4, 'App\\Models\\User', 474),
(4, 'App\\Models\\User', 475),
(4, 'App\\Models\\User', 476),
(2, 'App\\Models\\User', 477),
(4, 'App\\Models\\User', 478),
(4, 'App\\Models\\User', 479),
(4, 'App\\Models\\User', 480),
(4, 'App\\Models\\User', 481),
(4, 'App\\Models\\User', 482),
(4, 'App\\Models\\User', 483),
(4, 'App\\Models\\User', 484),
(4, 'App\\Models\\User', 485),
(4, 'App\\Models\\User', 486),
(4, 'App\\Models\\User', 487),
(4, 'App\\Models\\User', 488),
(4, 'App\\Models\\User', 489),
(4, 'App\\Models\\User', 490),
(4, 'App\\Models\\User', 491),
(4, 'App\\Models\\User', 492),
(4, 'App\\Models\\User', 493),
(4, 'App\\Models\\User', 494),
(4, 'App\\Models\\User', 495),
(4, 'App\\Models\\User', 497),
(4, 'App\\Models\\User', 498),
(4, 'App\\Models\\User', 499),
(2, 'App\\Models\\User', 500),
(2, 'App\\Models\\User', 501),
(4, 'App\\Models\\User', 502),
(4, 'App\\Models\\User', 504),
(4, 'App\\Models\\User', 505),
(4, 'App\\Models\\User', 506),
(4, 'App\\Models\\User', 507),
(4, 'App\\Models\\User', 508),
(4, 'App\\Models\\User', 510),
(4, 'App\\Models\\User', 512),
(4, 'App\\Models\\User', 513),
(2, 'App\\Models\\User', 514),
(2, 'App\\Models\\User', 515),
(4, 'App\\Models\\User', 516),
(4, 'App\\Models\\User', 517),
(4, 'App\\Models\\User', 518),
(2, 'App\\Models\\User', 519),
(2, 'App\\Models\\User', 520),
(2, 'App\\Models\\User', 521),
(2, 'App\\Models\\User', 522),
(2, 'App\\Models\\User', 523),
(2, 'App\\Models\\User', 524),
(2, 'App\\Models\\User', 525),
(2, 'App\\Models\\User', 526),
(4, 'App\\Models\\User', 527),
(2, 'App\\Models\\User', 528),
(2, 'App\\Models\\User', 529),
(2, 'App\\Models\\User', 530),
(2, 'App\\Models\\User', 531),
(2, 'App\\Models\\User', 532),
(2, 'App\\Models\\User', 533),
(2, 'App\\Models\\User', 534),
(2, 'App\\Models\\User', 535),
(4, 'App\\Models\\User', 536),
(4, 'App\\Models\\User', 538),
(4, 'App\\Models\\User', 539),
(4, 'App\\Models\\User', 540),
(4, 'App\\Models\\User', 541),
(4, 'App\\Models\\User', 542),
(4, 'App\\Models\\User', 543),
(4, 'App\\Models\\User', 544),
(4, 'App\\Models\\User', 545),
(4, 'App\\Models\\User', 546),
(4, 'App\\Models\\User', 547),
(4, 'App\\Models\\User', 548),
(4, 'App\\Models\\User', 549),
(4, 'App\\Models\\User', 550),
(4, 'App\\Models\\User', 551),
(4, 'App\\Models\\User', 552),
(4, 'App\\Models\\User', 553),
(4, 'App\\Models\\User', 554),
(4, 'App\\Models\\User', 555),
(4, 'App\\Models\\User', 556),
(4, 'App\\Models\\User', 557),
(4, 'App\\Models\\User', 558),
(4, 'App\\Models\\User', 559),
(4, 'App\\Models\\User', 560),
(4, 'App\\Models\\User', 561),
(4, 'App\\Models\\User', 562),
(4, 'App\\Models\\User', 563),
(4, 'App\\Models\\User', 564),
(4, 'App\\Models\\User', 565),
(4, 'App\\Models\\User', 566),
(4, 'App\\Models\\User', 567),
(4, 'App\\Models\\User', 568),
(4, 'App\\Models\\User', 569),
(4, 'App\\Models\\User', 570),
(4, 'App\\Models\\User', 571),
(2, 'App\\Models\\User', 572),
(2, 'App\\Models\\User', 573),
(2, 'App\\Models\\User', 574),
(2, 'App\\Models\\User', 575),
(2, 'App\\Models\\User', 576),
(4, 'App\\Models\\User', 577),
(2, 'App\\Models\\User', 578),
(2, 'App\\Models\\User', 579),
(2, 'App\\Models\\User', 581),
(2, 'App\\Models\\User', 582),
(2, 'App\\Models\\User', 583),
(2, 'App\\Models\\User', 584),
(2, 'App\\Models\\User', 585),
(2, 'App\\Models\\User', 586),
(4, 'App\\Models\\User', 587),
(4, 'App\\Models\\User', 588),
(2, 'App\\Models\\User', 589),
(2, 'App\\Models\\User', 590),
(2, 'App\\Models\\User', 591),
(2, 'App\\Models\\User', 592),
(2, 'App\\Models\\User', 593),
(2, 'App\\Models\\User', 594),
(2, 'App\\Models\\User', 595),
(2, 'App\\Models\\User', 596),
(2, 'App\\Models\\User', 597),
(2, 'App\\Models\\User', 598),
(2, 'App\\Models\\User', 599),
(2, 'App\\Models\\User', 600),
(2, 'App\\Models\\User', 601),
(2, 'App\\Models\\User', 602),
(2, 'App\\Models\\User', 603),
(2, 'App\\Models\\User', 604),
(2, 'App\\Models\\User', 605),
(2, 'App\\Models\\User', 606),
(2, 'App\\Models\\User', 607),
(2, 'App\\Models\\User', 608),
(2, 'App\\Models\\User', 609),
(2, 'App\\Models\\User', 610),
(2, 'App\\Models\\User', 611),
(2, 'App\\Models\\User', 612),
(4, 'App\\Models\\User', 613),
(4, 'App\\Models\\User', 614),
(4, 'App\\Models\\User', 615),
(4, 'App\\Models\\User', 616),
(4, 'App\\Models\\User', 617),
(1, 'App\\Models\\User', 620),
(1, 'App\\Models\\User', 621);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Egyptian', 'مصرى', 2, '2022-02-20 18:27:56', '2022-02-20 18:28:20'),
(2, 'egyptian', 'مصرى', 18, '2022-04-27 05:57:12', '2022-04-27 05:57:12'),
(3, 'Pakistan', 'باكستانى', 18, '2022-04-27 06:00:29', '2022-04-27 06:00:29'),
(4, 'Palestine', 'فلسطين', 18, '2022-04-27 06:07:49', '2022-04-27 06:07:49'),
(5, 'egyptian', 'مصرى', 19, '2022-04-27 09:03:52', '2022-04-27 09:03:52'),
(6, 'India', 'هندى', 19, '2022-04-27 09:04:14', '2022-04-27 09:04:14'),
(7, 'Pakistan', 'باكستانى', 19, '2022-04-27 09:04:32', '2022-04-27 09:04:32'),
(8, 'Jordanian', 'أردنى', 19, '2022-04-27 09:04:52', '2022-04-27 09:04:52'),
(9, 'Yemen', 'اليمن', 19, '2022-04-27 09:05:09', '2022-04-27 09:05:09'),
(10, 'India', 'هندى', 20, '2022-04-27 09:25:21', '2022-04-27 09:25:21'),
(11, 'egyptian', 'مصرى', 21, '2022-04-27 10:42:18', '2022-04-27 10:42:18'),
(12, 'Egyptian', 'مصرى', 22, '2022-04-27 10:59:42', '2022-05-18 12:58:00'),
(13, 'egyptian', 'مصرى', 23, '2022-04-28 06:12:17', '2022-04-28 06:12:17'),
(14, 'malii', 'مالى', 24, '2022-04-28 06:15:57', '2022-04-28 06:15:57'),
(15, 'saudi', 'سعودي', 2, '2022-05-17 11:05:13', '2022-05-17 11:05:13'),
(17, 'Sudanese', 'سُوْدانيّ', 22, '2022-05-19 09:13:48', '2022-05-19 09:13:48'),
(18, 'سعودي', 'saudi', 68, '2022-07-18 08:06:06', '2022-07-18 08:06:06'),
(19, 'مصر', 'Egypt', 68, '2022-07-18 08:07:22', '2022-11-10 10:37:28'),
(20, 'باكستان', 'Pakistan', 68, '2022-07-18 08:07:54', '2022-07-18 08:07:54'),
(21, 'الهند', 'India', 68, '2022-07-18 08:08:17', '2022-07-18 08:08:17'),
(22, 'نيبال', 'Nepal', 68, '2022-07-18 08:08:39', '2022-07-18 08:08:39'),
(23, 'الفلبين', 'Philippines', 68, '2022-07-18 08:08:59', '2022-07-18 08:08:59'),
(24, 'Saudi', 'سعودي', 18, '2022-09-13 11:31:51', '2022-09-13 11:31:51'),
(25, 'India', 'هندي', 18, '2022-09-17 11:17:48', '2022-09-17 11:17:48'),
(26, 'malii', 'مالي', 18, '2022-09-17 12:01:46', '2022-09-17 12:01:46'),
(27, 'Yemeni', 'يمني', 18, '2022-09-17 12:17:18', '2022-09-17 12:17:18'),
(28, 'egyptian', 'مصرى', 157, '2022-09-26 22:10:40', '2022-09-26 22:10:40'),
(29, 'سعودي', 'SAUDI', 21, '2022-10-06 08:59:04', '2022-10-06 08:59:04'),
(30, 'BANGLADESH', 'بنغلاديش', 19, '2022-10-07 16:05:09', '2022-10-07 16:05:09'),
(31, 'Pakistan', 'باكستان', 21, '2022-10-08 16:55:57', '2022-10-08 16:55:57'),
(32, 'saudi', 'سعودي', 362, '2022-10-23 08:56:30', '2022-10-23 08:56:30'),
(33, 'Egyptian', 'مصري', 362, '2022-10-23 08:58:53', '2022-10-23 08:58:53'),
(34, 'Indian', 'هندي', 362, '2022-10-23 08:59:40', '2022-10-23 08:59:40'),
(35, 'yemnuan', 'يمني', 362, '2022-10-26 10:53:16', '2022-10-26 10:53:16'),
(36, 'باكستاني', 'باكستاني', 154, '2022-11-06 21:42:18', '2022-11-06 21:42:18'),
(37, 'يمني', 'يمني', 154, '2022-11-06 21:42:30', '2022-11-06 21:42:30'),
(38, 'مصري', 'مصري', 154, '2022-11-12 01:49:00', '2022-11-12 01:49:00'),
(39, 'يمني', 'يمني', 21, '2022-11-17 13:21:23', '2022-11-17 13:21:23'),
(40, 'مالي', 'مالي', 21, '2022-11-17 13:21:39', '2022-11-17 13:21:39'),
(41, 'مصري', 'مصري', 500, '2022-11-20 10:18:19', '2022-11-20 10:18:43'),
(42, 'هندي', 'هندي', 500, '2022-11-20 10:19:04', '2022-11-20 10:19:04'),
(43, 'Egypt', 'مصر', 526, '2022-12-28 08:09:36', '2022-12-28 08:09:36'),
(44, 'sudan', 'سودان', 526, '2022-12-28 08:10:06', '2022-12-28 08:10:06'),
(45, 'yemen', 'اليمن', 526, '2022-12-28 08:11:13', '2022-12-28 08:11:13'),
(46, 'Philippines', 'الفلبين', 526, '2022-12-28 08:11:54', '2022-12-28 08:11:54'),
(47, 'syria', 'سوريا', 526, '2022-12-28 08:12:27', '2022-12-28 08:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` timestamp NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `read` tinyint NOT NULL DEFAULT '0',
  `for_admin` tinyint DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `redirect_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `offer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` date NOT NULL,
  `promocode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `offer_category_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_categories`
--

CREATE TABLE `offer_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offer_categories`
--

INSERT INTO `offer_categories` (`id`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 'Food', 'مأكولات', NULL, NULL),
(2, 'Drinks', 'مشروبات', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_number` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_month` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_exp_year` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_currency` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `txn_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Manually',
  `receipt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `name`, `email`, `card_number`, `card_exp_month`, `card_exp_year`, `plan_name`, `plan_id`, `price`, `price_currency`, `txn_id`, `payment_status`, `payment_type`, `receipt`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '62D39DA7DABC7903031263', NULL, NULL, NULL, NULL, NULL, 'premium', 2, 250.00, 'SAR', '', 'succeeded', 'Manually', NULL, 68, '2022-07-17 07:27:03', '2022-07-17 07:27:03'),
(2, '62EB9934EFE26746685586', NULL, NULL, NULL, NULL, NULL, 'Free Plan', 1, 0.00, 'SAR', '', 'succeeded', 'Manually', NULL, 68, '2022-08-04 12:02:28', '2022-08-04 12:02:28'),
(3, '62EB9935A2959306433696', NULL, NULL, NULL, NULL, NULL, 'Free Plan', 1, 0.00, 'SAR', '', 'succeeded', 'Manually', NULL, 68, '2022-08-04 12:02:29', '2022-08-04 12:02:29'),
(4, '62EB993654344040510616', NULL, NULL, NULL, NULL, NULL, 'Free Plan', 1, 0.00, 'SAR', '', 'succeeded', 'Manually', NULL, 68, '2022-08-04 12:02:30', '2022-08-04 12:02:30'),
(5, '62EB999207F04666461292', NULL, NULL, NULL, NULL, NULL, 'خطة شركة خليفة', 3, 6500.00, 'SAR', '', 'succeeded', 'Manually', NULL, 68, '2022-08-04 12:04:02', '2022-08-04 12:04:02'),
(6, '630F5505400E9928574680', NULL, NULL, NULL, NULL, NULL, 'خطة شركة خليفة', 3, 6500.00, 'SAR', '', 'succeeded', 'Manually', NULL, 2, '2022-08-31 14:33:09', '2022-08-31 14:33:09'),
(7, '630F55103073F938813696', NULL, NULL, NULL, NULL, NULL, 'Free Plan', 1, 0.00, 'SAR', '', 'succeeded', 'Manually', NULL, 2, '2022-08-31 14:33:20', '2022-08-31 14:33:20');

-- --------------------------------------------------------

--
-- Table structure for table `other_payments`
--

CREATE TABLE `other_payments` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `number_of_days` int NOT NULL,
  `hours` int NOT NULL,
  `rate` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `over_time_requests`
--

CREATE TABLE `over_time_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `admin_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `direct_manager` bigint DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `over_time_requests`
--

INSERT INTO `over_time_requests` (`id`, `employee_id`, `date`, `start`, `end`, `reason`, `created_at`, `updated_at`, `status`, `admin_message`, `direct_manager`) VALUES
(1, 41, '2022-05-10', '10:10:00', '10:10:00', 'kfjdkjfdkjfdf', '2023-04-30 15:18:26', '2023-05-08 11:53:08', 'rejected', NULL, NULL),
(2, 41, '2022-05-10', '10:10:00', '10:10:00', 'kfjdkjfdkjfdf', '2023-04-30 15:20:37', '2023-05-08 11:53:04', 'approved', NULL, NULL),
(3, 41, '2022-05-10', '15:10:00', '10:10:00', 'kfjdkjfdkjfdf', '2023-04-30 15:25:51', '2023-05-05 00:12:02', 'approved', NULL, NULL),
(4, 74, '2023-05-04', '06:34:00', '03:34:00', '', '2023-05-02 14:06:12', '2023-05-03 14:44:23', 'rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('hr@example.com', '$2y$10$8wBp7dVzQ316OsTJanqWyuGdmieXNY6caJzCaeCMgWHWSqDr51bEa', '2022-04-21 05:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `payees`
--

CREATE TABLE `payees` (
  `id` bigint UNSIGNED NOT NULL,
  `payee_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

CREATE TABLE `payers` (
  `id` bigint UNSIGNED NOT NULL,
  `payer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'كاش', 18, '2022-07-20 09:24:13', '2022-07-20 09:24:13');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_settings`
--

CREATE TABLE `payroll_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payroll_dispaly` tinyint DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payroll_settings`
--

INSERT INTO `payroll_settings` (`id`, `name`, `payroll_dispaly`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Employee Code', 1, 2, NULL, NULL),
(2, 'Name', 1, 2, NULL, NULL),
(3, 'Job', 1, 2, NULL, NULL),
(4, 'Work Days', 1, 2, NULL, NULL),
(5, 'Basic Salary', 1, 2, NULL, NULL),
(6, 'Other allowances', 1, 2, NULL, NULL),
(7, 'OverTime', 1, 2, NULL, NULL),
(8, 'Sales percentage', 1, 2, NULL, NULL),
(9, 'Other dues', 1, 2, NULL, NULL),
(10, 'Total due', 1, 2, NULL, NULL),
(11, 'Employee social insurance', 1, 2, NULL, NULL),
(12, 'Employee medical insurance', 1, 2, NULL, NULL),
(13, 'Absence', 1, 2, NULL, NULL),
(14, 'vacations', 1, 2, NULL, NULL),
(15, 'Advanced Loans', 1, 2, NULL, NULL),
(16, 'Other deductions', 1, 2, NULL, NULL),
(17, 'Total deduction', 1, 2, NULL, NULL),
(18, 'net salary', 1, 2, NULL, NULL),
(19, 'Employee Code', 1, 18, NULL, '2022-11-20 09:11:25'),
(20, 'Name', 1, 18, NULL, '2022-11-20 09:11:25'),
(21, 'Job', 1, 18, NULL, '2022-11-20 09:11:25'),
(22, 'Work Days', 1, 18, NULL, '2022-11-20 09:11:25'),
(23, 'Basic Salary', 1, 18, NULL, '2022-11-20 09:11:25'),
(24, 'Other allowances', 1, 18, NULL, '2022-11-20 09:11:25'),
(25, 'OverTime', 1, 18, NULL, '2022-11-20 09:11:25'),
(26, 'Sales percentage', 1, 18, NULL, '2022-11-20 09:11:25'),
(27, 'Other dues', 1, 18, NULL, '2022-11-20 09:11:25'),
(28, 'Total due', 1, 18, NULL, '2022-11-20 09:11:25'),
(29, 'Employee social insurance', 1, 18, NULL, '2022-11-20 09:11:25'),
(30, 'Employee medical insurance', 0, 18, NULL, '2022-11-20 09:11:25'),
(31, 'Absence', 1, 18, NULL, '2022-11-20 09:11:25'),
(32, 'vacations', 1, 18, NULL, '2022-11-20 09:11:25'),
(33, 'Advanced Loans', 1, 18, NULL, '2022-11-20 09:11:25'),
(34, 'Other deductions', 1, 18, NULL, '2022-11-20 09:11:25'),
(35, 'Total deduction', 1, 18, NULL, '2022-11-20 09:11:25'),
(36, 'net salary', 1, 18, NULL, '2022-11-20 09:11:25'),
(37, 'Employee Code', 1, 19, NULL, '2022-11-20 12:23:07'),
(38, 'Name', 1, 19, NULL, '2022-11-20 12:23:07'),
(39, 'Job', 1, 19, NULL, '2022-11-20 12:23:07'),
(40, 'Work Days', 1, 19, NULL, '2022-11-20 12:23:07'),
(41, 'Basic Salary', 1, 19, NULL, '2022-11-20 12:23:07'),
(42, 'Other allowances', 1, 19, NULL, '2022-11-20 12:23:07'),
(43, 'OverTime', 0, 19, NULL, '2022-11-20 12:23:07'),
(44, 'Sales percentage', 1, 19, NULL, '2022-11-20 12:23:07'),
(45, 'Other dues', 1, 19, NULL, '2022-11-20 12:23:07'),
(46, 'Total due', 1, 19, NULL, '2022-11-20 12:23:07'),
(47, 'Employee social insurance', 0, 19, NULL, '2022-11-20 12:23:07'),
(48, 'Employee medical insurance', 0, 19, NULL, '2022-11-20 12:23:07'),
(49, 'Absence', 1, 19, NULL, '2022-11-20 12:23:07'),
(50, 'vacations', 0, 19, NULL, '2022-11-20 12:23:07'),
(51, 'Advanced Loans', 1, 19, NULL, '2022-11-20 12:23:07'),
(52, 'Other deductions', 1, 19, NULL, '2022-11-20 12:23:07'),
(53, 'Total deduction', 1, 19, NULL, '2022-11-20 12:23:07'),
(54, 'net salary', 1, 19, NULL, '2022-11-20 12:23:07'),
(55, 'Employee Code', 1, 20, NULL, NULL),
(56, 'Name', 1, 20, NULL, NULL),
(57, 'Job', 1, 20, NULL, NULL),
(58, 'Work Days', 1, 20, NULL, NULL),
(59, 'Basic Salary', 1, 20, NULL, NULL),
(60, 'Other allowances', 1, 20, NULL, NULL),
(61, 'OverTime', 1, 20, NULL, NULL),
(62, 'Sales percentage', 1, 20, NULL, NULL),
(63, 'Other dues', 1, 20, NULL, NULL),
(64, 'Total due', 1, 20, NULL, NULL),
(65, 'Employee social insurance', 1, 20, NULL, NULL),
(66, 'Employee medical insurance', 1, 20, NULL, NULL),
(67, 'Absence', 1, 20, NULL, NULL),
(68, 'vacations', 1, 20, NULL, NULL),
(69, 'Advanced Loans', 1, 20, NULL, NULL),
(70, 'Other deductions', 1, 20, NULL, NULL),
(71, 'Total deduction', 1, 20, NULL, NULL),
(72, 'net salary', 1, 20, NULL, NULL),
(73, 'Employee Code', 1, 21, NULL, NULL),
(74, 'Name', 1, 21, NULL, NULL),
(75, 'Job', 1, 21, NULL, NULL),
(76, 'Work Days', 1, 21, NULL, NULL),
(77, 'Basic Salary', 1, 21, NULL, NULL),
(78, 'Other allowances', 1, 21, NULL, NULL),
(79, 'OverTime', 1, 21, NULL, NULL),
(80, 'Sales percentage', 1, 21, NULL, NULL),
(81, 'Other dues', 1, 21, NULL, NULL),
(82, 'Total due', 1, 21, NULL, NULL),
(83, 'Employee social insurance', 1, 21, NULL, NULL),
(84, 'Employee medical insurance', 1, 21, NULL, NULL),
(85, 'Absence', 1, 21, NULL, NULL),
(86, 'vacations', 1, 21, NULL, NULL),
(87, 'Advanced Loans', 1, 21, NULL, NULL),
(88, 'Other deductions', 1, 21, NULL, NULL),
(89, 'Total deduction', 1, 21, NULL, NULL),
(90, 'net salary', 1, 21, NULL, NULL),
(91, 'Employee Code', 1, 22, NULL, '2023-02-20 16:41:53'),
(92, 'Name', 1, 22, NULL, '2023-02-20 16:41:53'),
(93, 'Job', 1, 22, NULL, '2023-02-20 16:41:53'),
(94, 'Work Days', 1, 22, NULL, '2023-02-20 16:41:53'),
(95, 'Basic Salary', 1, 22, NULL, '2023-02-20 16:41:53'),
(96, 'Other allowances', 1, 22, NULL, '2023-02-20 16:41:53'),
(97, 'OverTime', 0, 22, NULL, '2023-02-20 16:41:53'),
(98, 'Sales percentage', 0, 22, NULL, '2023-02-20 16:41:53'),
(99, 'Other dues', 1, 22, NULL, '2023-02-20 16:41:53'),
(100, 'Total due', 1, 22, NULL, '2023-02-20 16:41:53'),
(101, 'Employee social insurance', 0, 22, NULL, '2023-02-20 16:41:53'),
(102, 'Employee medical insurance', 0, 22, NULL, '2023-02-20 16:41:53'),
(103, 'Absence', 1, 22, NULL, '2023-02-20 16:41:53'),
(104, 'vacations', 1, 22, NULL, '2023-02-20 16:41:53'),
(105, 'Advanced Loans', 1, 22, NULL, '2023-02-20 16:41:53'),
(106, 'Other deductions', 1, 22, NULL, '2023-02-20 16:41:53'),
(107, 'Total deduction', 1, 22, NULL, '2023-02-20 16:41:53'),
(108, 'net salary', 1, 22, NULL, '2023-02-20 16:41:53'),
(109, 'Employee Code', 1, 23, NULL, NULL),
(110, 'Name', 1, 23, NULL, NULL),
(111, 'Job', 1, 23, NULL, NULL),
(112, 'Work Days', 1, 23, NULL, NULL),
(113, 'Basic Salary', 1, 23, NULL, NULL),
(114, 'Other allowances', 1, 23, NULL, NULL),
(115, 'OverTime', 1, 23, NULL, NULL),
(116, 'Sales percentage', 1, 23, NULL, NULL),
(117, 'Other dues', 1, 23, NULL, NULL),
(118, 'Total due', 1, 23, NULL, NULL),
(119, 'Employee social insurance', 1, 23, NULL, NULL),
(120, 'Employee medical insurance', 1, 23, NULL, NULL),
(121, 'Absence', 1, 23, NULL, NULL),
(122, 'vacations', 1, 23, NULL, NULL),
(123, 'Advanced Loans', 1, 23, NULL, NULL),
(124, 'Other deductions', 1, 23, NULL, NULL),
(125, 'Total deduction', 1, 23, NULL, NULL),
(126, 'net salary', 1, 23, NULL, NULL),
(127, 'Employee Code', 1, 24, NULL, NULL),
(128, 'Name', 1, 24, NULL, NULL),
(129, 'Job', 1, 24, NULL, NULL),
(130, 'Work Days', 1, 24, NULL, NULL),
(131, 'Basic Salary', 1, 24, NULL, NULL),
(132, 'Other allowances', 1, 24, NULL, NULL),
(133, 'OverTime', 1, 24, NULL, NULL),
(134, 'Sales percentage', 1, 24, NULL, NULL),
(135, 'Other dues', 1, 24, NULL, NULL),
(136, 'Total due', 1, 24, NULL, NULL),
(137, 'Employee social insurance', 1, 24, NULL, NULL),
(138, 'Employee medical insurance', 1, 24, NULL, NULL),
(139, 'Absence', 1, 24, NULL, NULL),
(140, 'vacations', 1, 24, NULL, NULL),
(141, 'Advanced Loans', 1, 24, NULL, NULL),
(142, 'Other deductions', 1, 24, NULL, NULL),
(143, 'Total deduction', 1, 24, NULL, NULL),
(144, 'net salary', 1, 24, NULL, NULL),
(145, 'Employee Code', 1, 68, NULL, NULL),
(146, 'Name', 1, 68, NULL, NULL),
(147, 'Job', 1, 68, NULL, NULL),
(148, 'Work Days', 1, 68, NULL, NULL),
(149, 'Basic Salary', 1, 68, NULL, NULL),
(150, 'Other allowances', 1, 68, NULL, NULL),
(151, 'OverTime', 1, 68, NULL, NULL),
(152, 'Sales percentage', 1, 68, NULL, NULL),
(153, 'Other dues', 1, 68, NULL, NULL),
(154, 'Total due', 1, 68, NULL, NULL),
(155, 'Employee social insurance', 1, 68, NULL, NULL),
(156, 'Employee medical insurance', 1, 68, NULL, NULL),
(157, 'Absence', 1, 68, NULL, NULL),
(158, 'vacations', 1, 68, NULL, NULL),
(159, 'Advanced Loans', 1, 68, NULL, NULL),
(160, 'Other deductions', 1, 68, NULL, NULL),
(161, 'Total deduction', 1, 68, NULL, NULL),
(162, 'net salary', 1, 68, NULL, NULL),
(163, 'Employee Code', 1, 154, NULL, NULL),
(164, 'Name', 1, 154, NULL, NULL),
(165, 'Job', 1, 154, NULL, NULL),
(166, 'Work Days', 1, 154, NULL, NULL),
(167, 'Basic Salary', 1, 154, NULL, NULL),
(168, 'Other allowances', 1, 154, NULL, NULL),
(169, 'OverTime', 1, 154, NULL, NULL),
(170, 'Sales percentage', 1, 154, NULL, NULL),
(171, 'Other dues', 1, 154, NULL, NULL),
(172, 'Total due', 1, 154, NULL, NULL),
(173, 'Employee social insurance', 1, 154, NULL, NULL),
(174, 'Employee medical insurance', 1, 154, NULL, NULL),
(175, 'Absence', 1, 154, NULL, NULL),
(176, 'vacations', 1, 154, NULL, NULL),
(177, 'Advanced Loans', 1, 154, NULL, NULL),
(178, 'Other deductions', 1, 154, NULL, NULL),
(179, 'Total deduction', 1, 154, NULL, NULL),
(180, 'net salary', 1, 154, NULL, NULL),
(181, 'Employee Code', 1, 157, NULL, NULL),
(182, 'Name', 1, 157, NULL, NULL),
(183, 'Job', 1, 157, NULL, NULL),
(184, 'Work Days', 1, 157, NULL, NULL),
(185, 'Basic Salary', 1, 157, NULL, NULL),
(186, 'Other allowances', 1, 157, NULL, NULL),
(187, 'OverTime', 1, 157, NULL, NULL),
(188, 'Sales percentage', 1, 157, NULL, NULL),
(189, 'Other dues', 1, 157, NULL, NULL),
(190, 'Total due', 1, 157, NULL, NULL),
(191, 'Employee social insurance', 1, 157, NULL, NULL),
(192, 'Employee medical insurance', 1, 157, NULL, NULL),
(193, 'Absence', 1, 157, NULL, NULL),
(194, 'vacations', 1, 157, NULL, NULL),
(195, 'Advanced Loans', 1, 157, NULL, NULL),
(196, 'Other deductions', 1, 157, NULL, NULL),
(197, 'Total deduction', 1, 157, NULL, NULL),
(198, 'net salary', 1, 157, NULL, NULL),
(199, 'Employee Code', 1, 160, NULL, NULL),
(200, 'Name', 1, 160, NULL, NULL),
(201, 'Job', 1, 160, NULL, NULL),
(202, 'Work Days', 1, 160, NULL, NULL),
(203, 'Basic Salary', 1, 160, NULL, NULL),
(204, 'Other allowances', 1, 160, NULL, NULL),
(205, 'OverTime', 1, 160, NULL, NULL),
(206, 'Sales percentage', 1, 160, NULL, NULL),
(207, 'Other dues', 1, 160, NULL, NULL),
(208, 'Total due', 1, 160, NULL, NULL),
(209, 'Employee social insurance', 1, 160, NULL, NULL),
(210, 'Employee medical insurance', 1, 160, NULL, NULL),
(211, 'Absence', 1, 160, NULL, NULL),
(212, 'vacations', 1, 160, NULL, NULL),
(213, 'Advanced Loans', 1, 160, NULL, NULL),
(214, 'Other deductions', 1, 160, NULL, NULL),
(215, 'Total deduction', 1, 160, NULL, NULL),
(216, 'net salary', 1, 160, NULL, NULL),
(217, 'Employee Code', 1, 163, NULL, NULL),
(218, 'Name', 1, 163, NULL, NULL),
(219, 'Job', 1, 163, NULL, NULL),
(220, 'Work Days', 1, 163, NULL, NULL),
(221, 'Basic Salary', 1, 163, NULL, NULL),
(222, 'Other allowances', 1, 163, NULL, NULL),
(223, 'OverTime', 1, 163, NULL, NULL),
(224, 'Sales percentage', 1, 163, NULL, NULL),
(225, 'Other dues', 1, 163, NULL, NULL),
(226, 'Total due', 1, 163, NULL, NULL),
(227, 'Employee social insurance', 1, 163, NULL, NULL),
(228, 'Employee medical insurance', 1, 163, NULL, NULL),
(229, 'Absence', 1, 163, NULL, NULL),
(230, 'vacations', 1, 163, NULL, NULL),
(231, 'Advanced Loans', 1, 163, NULL, NULL),
(232, 'Other deductions', 1, 163, NULL, NULL),
(233, 'Total deduction', 1, 163, NULL, NULL),
(234, 'net salary', 1, 163, NULL, NULL),
(235, 'Employee Code', 1, 164, NULL, NULL),
(236, 'Name', 1, 164, NULL, NULL),
(237, 'Job', 1, 164, NULL, NULL),
(238, 'Work Days', 1, 164, NULL, NULL),
(239, 'Basic Salary', 1, 164, NULL, NULL),
(240, 'Other allowances', 1, 164, NULL, NULL),
(241, 'OverTime', 1, 164, NULL, NULL),
(242, 'Sales percentage', 1, 164, NULL, NULL),
(243, 'Other dues', 1, 164, NULL, NULL),
(244, 'Total due', 1, 164, NULL, NULL),
(245, 'Employee social insurance', 1, 164, NULL, NULL),
(246, 'Employee medical insurance', 1, 164, NULL, NULL),
(247, 'Absence', 1, 164, NULL, NULL),
(248, 'vacations', 1, 164, NULL, NULL),
(249, 'Advanced Loans', 1, 164, NULL, NULL),
(250, 'Other deductions', 1, 164, NULL, NULL),
(251, 'Total deduction', 1, 164, NULL, NULL),
(252, 'net salary', 1, 164, NULL, NULL),
(253, 'Employee Code', 1, 165, NULL, NULL),
(254, 'Name', 1, 165, NULL, NULL),
(255, 'Job', 1, 165, NULL, NULL),
(256, 'Work Days', 1, 165, NULL, NULL),
(257, 'Basic Salary', 1, 165, NULL, NULL),
(258, 'Other allowances', 1, 165, NULL, NULL),
(259, 'OverTime', 1, 165, NULL, NULL),
(260, 'Sales percentage', 1, 165, NULL, NULL),
(261, 'Other dues', 1, 165, NULL, NULL),
(262, 'Total due', 1, 165, NULL, NULL),
(263, 'Employee social insurance', 1, 165, NULL, NULL),
(264, 'Employee medical insurance', 1, 165, NULL, NULL),
(265, 'Absence', 1, 165, NULL, NULL),
(266, 'vacations', 1, 165, NULL, NULL),
(267, 'Advanced Loans', 1, 165, NULL, NULL),
(268, 'Other deductions', 1, 165, NULL, NULL),
(269, 'Total deduction', 1, 165, NULL, NULL),
(270, 'net salary', 1, 165, NULL, NULL),
(271, 'Employee Code', 1, 166, NULL, NULL),
(272, 'Name', 1, 166, NULL, NULL),
(273, 'Job', 1, 166, NULL, NULL),
(274, 'Work Days', 1, 166, NULL, NULL),
(275, 'Basic Salary', 1, 166, NULL, NULL),
(276, 'Other allowances', 1, 166, NULL, NULL),
(277, 'OverTime', 1, 166, NULL, NULL),
(278, 'Sales percentage', 1, 166, NULL, NULL),
(279, 'Other dues', 1, 166, NULL, NULL),
(280, 'Total due', 1, 166, NULL, NULL),
(281, 'Employee social insurance', 1, 166, NULL, NULL),
(282, 'Employee medical insurance', 1, 166, NULL, NULL),
(283, 'Absence', 1, 166, NULL, NULL),
(284, 'vacations', 1, 166, NULL, NULL),
(285, 'Advanced Loans', 1, 166, NULL, NULL),
(286, 'Other deductions', 1, 166, NULL, NULL),
(287, 'Total deduction', 1, 166, NULL, NULL),
(288, 'net salary', 1, 166, NULL, NULL),
(289, 'Employee Code', 1, 167, NULL, NULL),
(290, 'Name', 1, 167, NULL, NULL),
(291, 'Job', 1, 167, NULL, NULL),
(292, 'Work Days', 1, 167, NULL, NULL),
(293, 'Basic Salary', 1, 167, NULL, NULL),
(294, 'Other allowances', 1, 167, NULL, NULL),
(295, 'OverTime', 1, 167, NULL, NULL),
(296, 'Sales percentage', 1, 167, NULL, NULL),
(297, 'Other dues', 1, 167, NULL, NULL),
(298, 'Total due', 1, 167, NULL, NULL),
(299, 'Employee social insurance', 1, 167, NULL, NULL),
(300, 'Employee medical insurance', 1, 167, NULL, NULL),
(301, 'Absence', 1, 167, NULL, NULL),
(302, 'vacations', 1, 167, NULL, NULL),
(303, 'Advanced Loans', 1, 167, NULL, NULL),
(304, 'Other deductions', 1, 167, NULL, NULL),
(305, 'Total deduction', 1, 167, NULL, NULL),
(306, 'net salary', 1, 167, NULL, NULL),
(307, 'Employee Code', 1, 168, NULL, NULL),
(308, 'Name', 1, 168, NULL, NULL),
(309, 'Job', 1, 168, NULL, NULL),
(310, 'Work Days', 1, 168, NULL, NULL),
(311, 'Basic Salary', 1, 168, NULL, NULL),
(312, 'Other allowances', 1, 168, NULL, NULL),
(313, 'OverTime', 1, 168, NULL, NULL),
(314, 'Sales percentage', 1, 168, NULL, NULL),
(315, 'Other dues', 1, 168, NULL, NULL),
(316, 'Total due', 1, 168, NULL, NULL),
(317, 'Employee social insurance', 1, 168, NULL, NULL),
(318, 'Employee medical insurance', 1, 168, NULL, NULL),
(319, 'Absence', 1, 168, NULL, NULL),
(320, 'vacations', 1, 168, NULL, NULL),
(321, 'Advanced Loans', 1, 168, NULL, NULL),
(322, 'Other deductions', 1, 168, NULL, NULL),
(323, 'Total deduction', 1, 168, NULL, NULL),
(324, 'net salary', 1, 168, NULL, NULL),
(325, 'Employee Code', 1, 169, NULL, NULL),
(326, 'Name', 1, 169, NULL, NULL),
(327, 'Job', 1, 169, NULL, NULL),
(328, 'Work Days', 1, 169, NULL, NULL),
(329, 'Basic Salary', 1, 169, NULL, NULL),
(330, 'Other allowances', 1, 169, NULL, NULL),
(331, 'OverTime', 1, 169, NULL, NULL),
(332, 'Sales percentage', 1, 169, NULL, NULL),
(333, 'Other dues', 1, 169, NULL, NULL),
(334, 'Total due', 1, 169, NULL, NULL),
(335, 'Employee social insurance', 1, 169, NULL, NULL),
(336, 'Employee medical insurance', 1, 169, NULL, NULL),
(337, 'Absence', 1, 169, NULL, NULL),
(338, 'vacations', 1, 169, NULL, NULL),
(339, 'Advanced Loans', 1, 169, NULL, NULL),
(340, 'Other deductions', 1, 169, NULL, NULL),
(341, 'Total deduction', 1, 169, NULL, NULL),
(342, 'net salary', 1, 169, NULL, NULL),
(343, 'Employee Code', 1, 170, NULL, NULL),
(344, 'Name', 1, 170, NULL, NULL),
(345, 'Job', 1, 170, NULL, NULL),
(346, 'Work Days', 1, 170, NULL, NULL),
(347, 'Basic Salary', 1, 170, NULL, NULL),
(348, 'Other allowances', 1, 170, NULL, NULL),
(349, 'OverTime', 1, 170, NULL, NULL),
(350, 'Sales percentage', 1, 170, NULL, NULL),
(351, 'Other dues', 1, 170, NULL, NULL),
(352, 'Total due', 1, 170, NULL, NULL),
(353, 'Employee social insurance', 1, 170, NULL, NULL),
(354, 'Employee medical insurance', 1, 170, NULL, NULL),
(355, 'Absence', 1, 170, NULL, NULL),
(356, 'vacations', 1, 170, NULL, NULL),
(357, 'Advanced Loans', 1, 170, NULL, NULL),
(358, 'Other deductions', 1, 170, NULL, NULL),
(359, 'Total deduction', 1, 170, NULL, NULL),
(360, 'net salary', 1, 170, NULL, NULL),
(361, 'Employee Code', 1, 171, NULL, NULL),
(362, 'Name', 1, 171, NULL, NULL),
(363, 'Job', 1, 171, NULL, NULL),
(364, 'Work Days', 1, 171, NULL, NULL),
(365, 'Basic Salary', 1, 171, NULL, NULL),
(366, 'Other allowances', 1, 171, NULL, NULL),
(367, 'OverTime', 1, 171, NULL, NULL),
(368, 'Sales percentage', 1, 171, NULL, NULL),
(369, 'Other dues', 1, 171, NULL, NULL),
(370, 'Total due', 1, 171, NULL, NULL),
(371, 'Employee social insurance', 1, 171, NULL, NULL),
(372, 'Employee medical insurance', 1, 171, NULL, NULL),
(373, 'Absence', 1, 171, NULL, NULL),
(374, 'vacations', 1, 171, NULL, NULL),
(375, 'Advanced Loans', 1, 171, NULL, NULL),
(376, 'Other deductions', 1, 171, NULL, NULL),
(377, 'Total deduction', 1, 171, NULL, NULL),
(378, 'net salary', 1, 171, NULL, NULL),
(379, 'Employee Code', 1, 172, NULL, NULL),
(380, 'Name', 1, 172, NULL, NULL),
(381, 'Job', 1, 172, NULL, NULL),
(382, 'Work Days', 1, 172, NULL, NULL),
(383, 'Basic Salary', 1, 172, NULL, NULL),
(384, 'Other allowances', 1, 172, NULL, NULL),
(385, 'OverTime', 1, 172, NULL, NULL),
(386, 'Sales percentage', 1, 172, NULL, NULL),
(387, 'Other dues', 1, 172, NULL, NULL),
(388, 'Total due', 1, 172, NULL, NULL),
(389, 'Employee social insurance', 1, 172, NULL, NULL),
(390, 'Employee medical insurance', 1, 172, NULL, NULL),
(391, 'Absence', 1, 172, NULL, NULL),
(392, 'vacations', 1, 172, NULL, NULL),
(393, 'Advanced Loans', 1, 172, NULL, NULL),
(394, 'Other deductions', 1, 172, NULL, NULL),
(395, 'Total deduction', 1, 172, NULL, NULL),
(396, 'net salary', 1, 172, NULL, NULL),
(397, 'Employee Code', 1, 173, NULL, NULL),
(398, 'Name', 1, 173, NULL, NULL),
(399, 'Job', 1, 173, NULL, NULL),
(400, 'Work Days', 1, 173, NULL, NULL),
(401, 'Basic Salary', 1, 173, NULL, NULL),
(402, 'Other allowances', 1, 173, NULL, NULL),
(403, 'OverTime', 1, 173, NULL, NULL),
(404, 'Sales percentage', 1, 173, NULL, NULL),
(405, 'Other dues', 1, 173, NULL, NULL),
(406, 'Total due', 1, 173, NULL, NULL),
(407, 'Employee social insurance', 1, 173, NULL, NULL),
(408, 'Employee medical insurance', 1, 173, NULL, NULL),
(409, 'Absence', 1, 173, NULL, NULL),
(410, 'vacations', 1, 173, NULL, NULL),
(411, 'Advanced Loans', 1, 173, NULL, NULL),
(412, 'Other deductions', 1, 173, NULL, NULL),
(413, 'Total deduction', 1, 173, NULL, NULL),
(414, 'net salary', 1, 173, NULL, NULL),
(415, 'Employee Code', 1, 174, NULL, NULL),
(416, 'Name', 1, 174, NULL, NULL),
(417, 'Job', 1, 174, NULL, NULL),
(418, 'Work Days', 1, 174, NULL, NULL),
(419, 'Basic Salary', 1, 174, NULL, NULL),
(420, 'Other allowances', 1, 174, NULL, NULL),
(421, 'OverTime', 1, 174, NULL, NULL),
(422, 'Sales percentage', 1, 174, NULL, NULL),
(423, 'Other dues', 1, 174, NULL, NULL),
(424, 'Total due', 1, 174, NULL, NULL),
(425, 'Employee social insurance', 1, 174, NULL, NULL),
(426, 'Employee medical insurance', 1, 174, NULL, NULL),
(427, 'Absence', 1, 174, NULL, NULL),
(428, 'vacations', 1, 174, NULL, NULL),
(429, 'Advanced Loans', 1, 174, NULL, NULL),
(430, 'Other deductions', 1, 174, NULL, NULL),
(431, 'Total deduction', 1, 174, NULL, NULL),
(432, 'net salary', 1, 174, NULL, NULL),
(433, 'Employee Code', 1, 175, NULL, NULL),
(434, 'Name', 1, 175, NULL, NULL),
(435, 'Job', 1, 175, NULL, NULL),
(436, 'Work Days', 1, 175, NULL, NULL),
(437, 'Basic Salary', 1, 175, NULL, NULL),
(438, 'Other allowances', 1, 175, NULL, NULL),
(439, 'OverTime', 1, 175, NULL, NULL),
(440, 'Sales percentage', 1, 175, NULL, NULL),
(441, 'Other dues', 1, 175, NULL, NULL),
(442, 'Total due', 1, 175, NULL, NULL),
(443, 'Employee social insurance', 1, 175, NULL, NULL),
(444, 'Employee medical insurance', 1, 175, NULL, NULL),
(445, 'Absence', 1, 175, NULL, NULL),
(446, 'vacations', 1, 175, NULL, NULL),
(447, 'Advanced Loans', 1, 175, NULL, NULL),
(448, 'Other deductions', 1, 175, NULL, NULL),
(449, 'Total deduction', 1, 175, NULL, NULL),
(450, 'net salary', 1, 175, NULL, NULL),
(451, 'Employee Code', 1, 176, NULL, NULL),
(452, 'Name', 1, 176, NULL, NULL),
(453, 'Job', 1, 176, NULL, NULL),
(454, 'Work Days', 1, 176, NULL, NULL),
(455, 'Basic Salary', 1, 176, NULL, NULL),
(456, 'Other allowances', 1, 176, NULL, NULL),
(457, 'OverTime', 1, 176, NULL, NULL),
(458, 'Sales percentage', 1, 176, NULL, NULL),
(459, 'Other dues', 1, 176, NULL, NULL),
(460, 'Total due', 1, 176, NULL, NULL),
(461, 'Employee social insurance', 1, 176, NULL, NULL),
(462, 'Employee medical insurance', 1, 176, NULL, NULL),
(463, 'Absence', 1, 176, NULL, NULL),
(464, 'vacations', 1, 176, NULL, NULL),
(465, 'Advanced Loans', 1, 176, NULL, NULL),
(466, 'Other deductions', 1, 176, NULL, NULL),
(467, 'Total deduction', 1, 176, NULL, NULL),
(468, 'net salary', 1, 176, NULL, NULL),
(469, 'Employee Code', 1, 177, NULL, NULL),
(470, 'Name', 1, 177, NULL, NULL),
(471, 'Job', 1, 177, NULL, NULL),
(472, 'Work Days', 1, 177, NULL, NULL),
(473, 'Basic Salary', 1, 177, NULL, NULL),
(474, 'Other allowances', 1, 177, NULL, NULL),
(475, 'OverTime', 1, 177, NULL, NULL),
(476, 'Sales percentage', 1, 177, NULL, NULL),
(477, 'Other dues', 1, 177, NULL, NULL),
(478, 'Total due', 1, 177, NULL, NULL),
(479, 'Employee social insurance', 1, 177, NULL, NULL),
(480, 'Employee medical insurance', 1, 177, NULL, NULL),
(481, 'Absence', 1, 177, NULL, NULL),
(482, 'vacations', 1, 177, NULL, NULL),
(483, 'Advanced Loans', 1, 177, NULL, NULL),
(484, 'Other deductions', 1, 177, NULL, NULL),
(485, 'Total deduction', 1, 177, NULL, NULL),
(486, 'net salary', 1, 177, NULL, NULL),
(487, 'Employee Code', 1, 178, NULL, NULL),
(488, 'Name', 1, 178, NULL, NULL),
(489, 'Job', 1, 178, NULL, NULL),
(490, 'Work Days', 1, 178, NULL, NULL),
(491, 'Basic Salary', 1, 178, NULL, NULL),
(492, 'Other allowances', 1, 178, NULL, NULL),
(493, 'OverTime', 1, 178, NULL, NULL),
(494, 'Sales percentage', 1, 178, NULL, NULL),
(495, 'Other dues', 1, 178, NULL, NULL),
(496, 'Total due', 1, 178, NULL, NULL),
(497, 'Employee social insurance', 1, 178, NULL, NULL),
(498, 'Employee medical insurance', 1, 178, NULL, NULL),
(499, 'Absence', 1, 178, NULL, NULL),
(500, 'vacations', 1, 178, NULL, NULL),
(501, 'Advanced Loans', 1, 178, NULL, NULL),
(502, 'Other deductions', 1, 178, NULL, NULL),
(503, 'Total deduction', 1, 178, NULL, NULL),
(504, 'net salary', 1, 178, NULL, NULL),
(505, 'Employee Code', 1, 179, NULL, NULL),
(506, 'Name', 1, 179, NULL, NULL),
(507, 'Job', 1, 179, NULL, NULL),
(508, 'Work Days', 1, 179, NULL, NULL),
(509, 'Basic Salary', 1, 179, NULL, NULL),
(510, 'Other allowances', 1, 179, NULL, NULL),
(511, 'OverTime', 1, 179, NULL, NULL),
(512, 'Sales percentage', 1, 179, NULL, NULL),
(513, 'Other dues', 1, 179, NULL, NULL),
(514, 'Total due', 1, 179, NULL, NULL),
(515, 'Employee social insurance', 1, 179, NULL, NULL),
(516, 'Employee medical insurance', 1, 179, NULL, NULL),
(517, 'Absence', 1, 179, NULL, NULL),
(518, 'vacations', 1, 179, NULL, NULL),
(519, 'Advanced Loans', 1, 179, NULL, NULL),
(520, 'Other deductions', 1, 179, NULL, NULL),
(521, 'Total deduction', 1, 179, NULL, NULL),
(522, 'net salary', 1, 179, NULL, NULL),
(523, 'Employee Code', 1, 180, NULL, NULL),
(524, 'Name', 1, 180, NULL, NULL),
(525, 'Job', 1, 180, NULL, NULL),
(526, 'Work Days', 1, 180, NULL, NULL),
(527, 'Basic Salary', 1, 180, NULL, NULL),
(528, 'Other allowances', 1, 180, NULL, NULL),
(529, 'OverTime', 1, 180, NULL, NULL),
(530, 'Sales percentage', 1, 180, NULL, NULL),
(531, 'Other dues', 1, 180, NULL, NULL),
(532, 'Total due', 1, 180, NULL, NULL),
(533, 'Employee social insurance', 1, 180, NULL, NULL),
(534, 'Employee medical insurance', 1, 180, NULL, NULL),
(535, 'Absence', 1, 180, NULL, NULL),
(536, 'vacations', 1, 180, NULL, NULL),
(537, 'Advanced Loans', 1, 180, NULL, NULL),
(538, 'Other deductions', 1, 180, NULL, NULL),
(539, 'Total deduction', 1, 180, NULL, NULL),
(540, 'net salary', 1, 180, NULL, NULL),
(541, 'Employee Code', 1, 181, NULL, NULL),
(542, 'Name', 1, 181, NULL, NULL),
(543, 'Job', 1, 181, NULL, NULL),
(544, 'Work Days', 1, 181, NULL, NULL),
(545, 'Basic Salary', 1, 181, NULL, NULL),
(546, 'Other allowances', 1, 181, NULL, NULL),
(547, 'OverTime', 1, 181, NULL, NULL),
(548, 'Sales percentage', 1, 181, NULL, NULL),
(549, 'Other dues', 1, 181, NULL, NULL),
(550, 'Total due', 1, 181, NULL, NULL),
(551, 'Employee social insurance', 1, 181, NULL, NULL),
(552, 'Employee medical insurance', 1, 181, NULL, NULL),
(553, 'Absence', 1, 181, NULL, NULL),
(554, 'vacations', 1, 181, NULL, NULL),
(555, 'Advanced Loans', 1, 181, NULL, NULL),
(556, 'Other deductions', 1, 181, NULL, NULL),
(557, 'Total deduction', 1, 181, NULL, NULL),
(558, 'net salary', 1, 181, NULL, NULL),
(559, 'Employee Code', 1, 182, NULL, NULL),
(560, 'Name', 1, 182, NULL, NULL),
(561, 'Job', 1, 182, NULL, NULL),
(562, 'Work Days', 1, 182, NULL, NULL),
(563, 'Basic Salary', 1, 182, NULL, NULL),
(564, 'Other allowances', 1, 182, NULL, NULL),
(565, 'OverTime', 1, 182, NULL, NULL),
(566, 'Sales percentage', 1, 182, NULL, NULL),
(567, 'Other dues', 1, 182, NULL, NULL),
(568, 'Total due', 1, 182, NULL, NULL),
(569, 'Employee social insurance', 1, 182, NULL, NULL),
(570, 'Employee medical insurance', 1, 182, NULL, NULL),
(571, 'Absence', 1, 182, NULL, NULL),
(572, 'vacations', 1, 182, NULL, NULL),
(573, 'Advanced Loans', 1, 182, NULL, NULL),
(574, 'Other deductions', 1, 182, NULL, NULL),
(575, 'Total deduction', 1, 182, NULL, NULL),
(576, 'net salary', 1, 182, NULL, NULL),
(577, 'Employee Code', 1, 183, NULL, NULL),
(578, 'Name', 1, 183, NULL, NULL),
(579, 'Job', 1, 183, NULL, NULL),
(580, 'Work Days', 1, 183, NULL, NULL),
(581, 'Basic Salary', 1, 183, NULL, NULL),
(582, 'Other allowances', 1, 183, NULL, NULL),
(583, 'OverTime', 1, 183, NULL, NULL),
(584, 'Sales percentage', 1, 183, NULL, NULL),
(585, 'Other dues', 1, 183, NULL, NULL),
(586, 'Total due', 1, 183, NULL, NULL),
(587, 'Employee social insurance', 1, 183, NULL, NULL),
(588, 'Employee medical insurance', 1, 183, NULL, NULL),
(589, 'Absence', 1, 183, NULL, NULL),
(590, 'vacations', 1, 183, NULL, NULL),
(591, 'Advanced Loans', 1, 183, NULL, NULL),
(592, 'Other deductions', 1, 183, NULL, NULL),
(593, 'Total deduction', 1, 183, NULL, NULL),
(594, 'net salary', 1, 183, NULL, NULL),
(595, 'Employee Code', 1, 184, NULL, NULL),
(596, 'Name', 1, 184, NULL, NULL),
(597, 'Job', 1, 184, NULL, NULL),
(598, 'Work Days', 1, 184, NULL, NULL),
(599, 'Basic Salary', 1, 184, NULL, NULL),
(600, 'Other allowances', 1, 184, NULL, NULL),
(601, 'OverTime', 1, 184, NULL, NULL),
(602, 'Sales percentage', 1, 184, NULL, NULL),
(603, 'Other dues', 1, 184, NULL, NULL),
(604, 'Total due', 1, 184, NULL, NULL),
(605, 'Employee social insurance', 1, 184, NULL, NULL),
(606, 'Employee medical insurance', 1, 184, NULL, NULL),
(607, 'Absence', 1, 184, NULL, NULL),
(608, 'vacations', 1, 184, NULL, NULL),
(609, 'Advanced Loans', 1, 184, NULL, NULL),
(610, 'Other deductions', 1, 184, NULL, NULL),
(611, 'Total deduction', 1, 184, NULL, NULL),
(612, 'net salary', 1, 184, NULL, NULL),
(613, 'Employee Code', 1, 185, NULL, NULL),
(614, 'Name', 1, 185, NULL, NULL),
(615, 'Job', 1, 185, NULL, NULL),
(616, 'Work Days', 1, 185, NULL, NULL),
(617, 'Basic Salary', 1, 185, NULL, NULL),
(618, 'Other allowances', 1, 185, NULL, NULL),
(619, 'OverTime', 1, 185, NULL, NULL),
(620, 'Sales percentage', 1, 185, NULL, NULL),
(621, 'Other dues', 1, 185, NULL, NULL),
(622, 'Total due', 1, 185, NULL, NULL),
(623, 'Employee social insurance', 1, 185, NULL, NULL),
(624, 'Employee medical insurance', 1, 185, NULL, NULL),
(625, 'Absence', 1, 185, NULL, NULL),
(626, 'vacations', 1, 185, NULL, NULL),
(627, 'Advanced Loans', 1, 185, NULL, NULL),
(628, 'Other deductions', 1, 185, NULL, NULL),
(629, 'Total deduction', 1, 185, NULL, NULL),
(630, 'net salary', 1, 185, NULL, NULL),
(631, 'Employee Code', 1, 218, NULL, NULL),
(632, 'Name', 1, 218, NULL, NULL),
(633, 'Job', 1, 218, NULL, NULL),
(634, 'Work Days', 1, 218, NULL, NULL),
(635, 'Basic Salary', 1, 218, NULL, NULL),
(636, 'Other allowances', 1, 218, NULL, NULL),
(637, 'OverTime', 1, 218, NULL, NULL),
(638, 'Sales percentage', 1, 218, NULL, NULL),
(639, 'Other dues', 1, 218, NULL, NULL),
(640, 'Total due', 1, 218, NULL, NULL),
(641, 'Employee social insurance', 1, 218, NULL, NULL),
(642, 'Employee medical insurance', 1, 218, NULL, NULL),
(643, 'Absence', 1, 218, NULL, NULL),
(644, 'vacations', 1, 218, NULL, NULL),
(645, 'Advanced Loans', 1, 218, NULL, NULL),
(646, 'Other deductions', 1, 218, NULL, NULL),
(647, 'Total deduction', 1, 218, NULL, NULL),
(648, 'net salary', 1, 218, NULL, NULL),
(649, 'Employee Code', 1, 362, NULL, NULL),
(650, 'Name', 1, 362, NULL, NULL),
(651, 'Job', 1, 362, NULL, NULL),
(652, 'Work Days', 1, 362, NULL, NULL),
(653, 'Basic Salary', 1, 362, NULL, NULL),
(654, 'Other allowances', 1, 362, NULL, NULL),
(655, 'OverTime', 1, 362, NULL, NULL),
(656, 'Sales percentage', 1, 362, NULL, NULL),
(657, 'Other dues', 1, 362, NULL, NULL),
(658, 'Total due', 1, 362, NULL, NULL),
(659, 'Employee social insurance', 1, 362, NULL, NULL),
(660, 'Employee medical insurance', 1, 362, NULL, NULL),
(661, 'Absence', 1, 362, NULL, NULL),
(662, 'vacations', 1, 362, NULL, NULL),
(663, 'Advanced Loans', 1, 362, NULL, NULL),
(664, 'Other deductions', 1, 362, NULL, NULL),
(665, 'Total deduction', 1, 362, NULL, NULL),
(666, 'net salary', 1, 362, NULL, NULL),
(667, 'Employee Code', 1, 380, NULL, NULL),
(668, 'Name', 1, 380, NULL, NULL),
(669, 'Job', 1, 380, NULL, NULL),
(670, 'Work Days', 1, 380, NULL, NULL),
(671, 'Basic Salary', 1, 380, NULL, NULL),
(672, 'Other allowances', 1, 380, NULL, NULL),
(673, 'OverTime', 1, 380, NULL, NULL),
(674, 'Sales percentage', 1, 380, NULL, NULL),
(675, 'Other dues', 1, 380, NULL, NULL),
(676, 'Total due', 1, 380, NULL, NULL),
(677, 'Employee social insurance', 1, 380, NULL, NULL),
(678, 'Employee medical insurance', 1, 380, NULL, NULL),
(679, 'Absence', 1, 380, NULL, NULL),
(680, 'vacations', 1, 380, NULL, NULL),
(681, 'Advanced Loans', 1, 380, NULL, NULL),
(682, 'Other deductions', 1, 380, NULL, NULL),
(683, 'Total deduction', 1, 380, NULL, NULL),
(684, 'net salary', 1, 380, NULL, NULL),
(685, 'Employee Code', 1, 381, NULL, NULL),
(686, 'Name', 1, 381, NULL, NULL),
(687, 'Job', 1, 381, NULL, NULL),
(688, 'Work Days', 1, 381, NULL, NULL),
(689, 'Basic Salary', 1, 381, NULL, NULL),
(690, 'Other allowances', 1, 381, NULL, NULL),
(691, 'OverTime', 1, 381, NULL, NULL),
(692, 'Sales percentage', 1, 381, NULL, NULL),
(693, 'Other dues', 1, 381, NULL, NULL),
(694, 'Total due', 1, 381, NULL, NULL),
(695, 'Employee social insurance', 1, 381, NULL, NULL),
(696, 'Employee medical insurance', 1, 381, NULL, NULL),
(697, 'Absence', 1, 381, NULL, NULL),
(698, 'vacations', 1, 381, NULL, NULL),
(699, 'Advanced Loans', 1, 381, NULL, NULL),
(700, 'Other deductions', 1, 381, NULL, NULL),
(701, 'Total deduction', 1, 381, NULL, NULL),
(702, 'net salary', 1, 381, NULL, NULL),
(703, 'Employee Code', 1, 385, NULL, NULL),
(704, 'Name', 1, 385, NULL, NULL),
(705, 'Job', 1, 385, NULL, NULL),
(706, 'Work Days', 1, 385, NULL, NULL),
(707, 'Basic Salary', 1, 385, NULL, NULL),
(708, 'Other allowances', 1, 385, NULL, NULL),
(709, 'OverTime', 1, 385, NULL, NULL),
(710, 'Sales percentage', 1, 385, NULL, NULL),
(711, 'Other dues', 1, 385, NULL, NULL),
(712, 'Total due', 1, 385, NULL, NULL),
(713, 'Employee social insurance', 1, 385, NULL, NULL),
(714, 'Employee medical insurance', 1, 385, NULL, NULL),
(715, 'Absence', 1, 385, NULL, NULL),
(716, 'vacations', 1, 385, NULL, NULL),
(717, 'Advanced Loans', 1, 385, NULL, NULL),
(718, 'Other deductions', 1, 385, NULL, NULL),
(719, 'Total deduction', 1, 385, NULL, NULL),
(720, 'net salary', 1, 385, NULL, NULL),
(721, 'Employee Code', 1, 401, NULL, NULL),
(722, 'Name', 1, 401, NULL, NULL),
(723, 'Job', 1, 401, NULL, NULL),
(724, 'Work Days', 1, 401, NULL, NULL),
(725, 'Basic Salary', 1, 401, NULL, NULL),
(726, 'Other allowances', 1, 401, NULL, NULL),
(727, 'OverTime', 1, 401, NULL, NULL),
(728, 'Sales percentage', 1, 401, NULL, NULL),
(729, 'Other dues', 1, 401, NULL, NULL),
(730, 'Total due', 1, 401, NULL, NULL),
(731, 'Employee social insurance', 1, 401, NULL, NULL),
(732, 'Employee medical insurance', 1, 401, NULL, NULL),
(733, 'Absence', 1, 401, NULL, NULL),
(734, 'vacations', 1, 401, NULL, NULL),
(735, 'Advanced Loans', 1, 401, NULL, NULL),
(736, 'Other deductions', 1, 401, NULL, NULL),
(737, 'Total deduction', 1, 401, NULL, NULL),
(738, 'net salary', 1, 401, NULL, NULL),
(739, 'Employee Code', 1, 402, NULL, NULL),
(740, 'Name', 1, 402, NULL, NULL),
(741, 'Job', 1, 402, NULL, NULL),
(742, 'Work Days', 1, 402, NULL, NULL),
(743, 'Basic Salary', 1, 402, NULL, NULL),
(744, 'Other allowances', 1, 402, NULL, NULL),
(745, 'OverTime', 1, 402, NULL, NULL),
(746, 'Sales percentage', 1, 402, NULL, NULL),
(747, 'Other dues', 1, 402, NULL, NULL),
(748, 'Total due', 1, 402, NULL, NULL),
(749, 'Employee social insurance', 1, 402, NULL, NULL),
(750, 'Employee medical insurance', 1, 402, NULL, NULL),
(751, 'Absence', 1, 402, NULL, NULL),
(752, 'vacations', 1, 402, NULL, NULL),
(753, 'Advanced Loans', 1, 402, NULL, NULL),
(754, 'Other deductions', 1, 402, NULL, NULL),
(755, 'Total deduction', 1, 402, NULL, NULL),
(756, 'net salary', 1, 402, NULL, NULL),
(757, 'Employee Code', 1, 403, NULL, NULL),
(758, 'Name', 1, 403, NULL, NULL),
(759, 'Job', 1, 403, NULL, NULL),
(760, 'Work Days', 1, 403, NULL, NULL),
(761, 'Basic Salary', 1, 403, NULL, NULL),
(762, 'Other allowances', 1, 403, NULL, NULL),
(763, 'OverTime', 1, 403, NULL, NULL),
(764, 'Sales percentage', 1, 403, NULL, NULL),
(765, 'Other dues', 1, 403, NULL, NULL),
(766, 'Total due', 1, 403, NULL, NULL),
(767, 'Employee social insurance', 1, 403, NULL, NULL),
(768, 'Employee medical insurance', 1, 403, NULL, NULL),
(769, 'Absence', 1, 403, NULL, NULL),
(770, 'vacations', 1, 403, NULL, NULL),
(771, 'Advanced Loans', 1, 403, NULL, NULL),
(772, 'Other deductions', 1, 403, NULL, NULL),
(773, 'Total deduction', 1, 403, NULL, NULL),
(774, 'net salary', 1, 403, NULL, NULL),
(775, 'Employee Code', 1, 404, NULL, NULL),
(776, 'Name', 1, 404, NULL, NULL),
(777, 'Job', 1, 404, NULL, NULL),
(778, 'Work Days', 1, 404, NULL, NULL),
(779, 'Basic Salary', 1, 404, NULL, NULL),
(780, 'Other allowances', 1, 404, NULL, NULL),
(781, 'OverTime', 1, 404, NULL, NULL),
(782, 'Sales percentage', 1, 404, NULL, NULL),
(783, 'Other dues', 1, 404, NULL, NULL),
(784, 'Total due', 1, 404, NULL, NULL),
(785, 'Employee social insurance', 1, 404, NULL, NULL),
(786, 'Employee medical insurance', 1, 404, NULL, NULL),
(787, 'Absence', 1, 404, NULL, NULL),
(788, 'vacations', 1, 404, NULL, NULL),
(789, 'Advanced Loans', 1, 404, NULL, NULL),
(790, 'Other deductions', 1, 404, NULL, NULL),
(791, 'Total deduction', 1, 404, NULL, NULL),
(792, 'net salary', 1, 404, NULL, NULL),
(793, 'Employee Code', 1, 405, NULL, NULL),
(794, 'Name', 1, 405, NULL, NULL),
(795, 'Job', 1, 405, NULL, NULL),
(796, 'Work Days', 1, 405, NULL, NULL),
(797, 'Basic Salary', 1, 405, NULL, NULL),
(798, 'Other allowances', 1, 405, NULL, NULL),
(799, 'OverTime', 1, 405, NULL, NULL),
(800, 'Sales percentage', 1, 405, NULL, NULL),
(801, 'Other dues', 1, 405, NULL, NULL),
(802, 'Total due', 1, 405, NULL, NULL),
(803, 'Employee social insurance', 1, 405, NULL, NULL),
(804, 'Employee medical insurance', 1, 405, NULL, NULL),
(805, 'Absence', 1, 405, NULL, NULL),
(806, 'vacations', 1, 405, NULL, NULL),
(807, 'Advanced Loans', 1, 405, NULL, NULL),
(808, 'Other deductions', 1, 405, NULL, NULL),
(809, 'Total deduction', 1, 405, NULL, NULL),
(810, 'net salary', 1, 405, NULL, NULL),
(811, 'Employee Code', 1, 406, NULL, NULL),
(812, 'Name', 1, 406, NULL, NULL),
(813, 'Job', 1, 406, NULL, NULL),
(814, 'Work Days', 1, 406, NULL, NULL),
(815, 'Basic Salary', 1, 406, NULL, NULL),
(816, 'Other allowances', 1, 406, NULL, NULL),
(817, 'OverTime', 1, 406, NULL, NULL),
(818, 'Sales percentage', 1, 406, NULL, NULL),
(819, 'Other dues', 1, 406, NULL, NULL),
(820, 'Total due', 1, 406, NULL, NULL),
(821, 'Employee social insurance', 1, 406, NULL, NULL),
(822, 'Employee medical insurance', 1, 406, NULL, NULL),
(823, 'Absence', 1, 406, NULL, NULL),
(824, 'vacations', 1, 406, NULL, NULL),
(825, 'Advanced Loans', 1, 406, NULL, NULL),
(826, 'Other deductions', 1, 406, NULL, NULL),
(827, 'Total deduction', 1, 406, NULL, NULL),
(828, 'net salary', 1, 406, NULL, NULL),
(829, 'Employee Code', 1, 407, NULL, NULL),
(830, 'Name', 1, 407, NULL, NULL),
(831, 'Job', 1, 407, NULL, NULL),
(832, 'Work Days', 1, 407, NULL, NULL),
(833, 'Basic Salary', 1, 407, NULL, NULL),
(834, 'Other allowances', 1, 407, NULL, NULL),
(835, 'OverTime', 1, 407, NULL, NULL),
(836, 'Sales percentage', 1, 407, NULL, NULL),
(837, 'Other dues', 1, 407, NULL, NULL),
(838, 'Total due', 1, 407, NULL, NULL),
(839, 'Employee social insurance', 1, 407, NULL, NULL),
(840, 'Employee medical insurance', 1, 407, NULL, NULL),
(841, 'Absence', 1, 407, NULL, NULL),
(842, 'vacations', 1, 407, NULL, NULL),
(843, 'Advanced Loans', 1, 407, NULL, NULL),
(844, 'Other deductions', 1, 407, NULL, NULL),
(845, 'Total deduction', 1, 407, NULL, NULL),
(846, 'net salary', 1, 407, NULL, NULL),
(847, 'Employee Code', 1, 477, NULL, NULL),
(848, 'Name', 1, 477, NULL, NULL),
(849, 'Job', 1, 477, NULL, NULL),
(850, 'Work Days', 1, 477, NULL, NULL),
(851, 'Basic Salary', 1, 477, NULL, NULL),
(852, 'Other allowances', 1, 477, NULL, NULL),
(853, 'OverTime', 1, 477, NULL, NULL),
(854, 'Sales percentage', 1, 477, NULL, NULL),
(855, 'Other dues', 1, 477, NULL, NULL),
(856, 'Total due', 1, 477, NULL, NULL),
(857, 'Employee social insurance', 1, 477, NULL, NULL),
(858, 'Employee medical insurance', 1, 477, NULL, NULL),
(859, 'Absence', 1, 477, NULL, NULL),
(860, 'vacations', 1, 477, NULL, NULL),
(861, 'Advanced Loans', 1, 477, NULL, NULL),
(862, 'Other deductions', 1, 477, NULL, NULL),
(863, 'Total deduction', 1, 477, NULL, NULL),
(864, 'net salary', 1, 477, NULL, NULL),
(865, 'Employee Code', 1, 500, NULL, '2022-12-25 10:39:10'),
(866, 'Name', 1, 500, NULL, '2022-12-25 10:39:10'),
(867, 'Job', 1, 500, NULL, '2022-12-25 10:39:10'),
(868, 'Work Days', 1, 500, NULL, '2022-12-25 10:39:10'),
(869, 'Basic Salary', 1, 500, NULL, '2022-12-25 10:39:10'),
(870, 'Other allowances', 1, 500, NULL, '2022-12-25 10:39:10'),
(871, 'OverTime', 1, 500, NULL, '2022-12-25 10:39:10'),
(872, 'Sales percentage', 1, 500, NULL, '2022-12-25 10:39:10'),
(873, 'Other dues', 1, 500, NULL, '2022-12-25 10:39:10'),
(874, 'Total due', 1, 500, NULL, '2022-12-25 10:39:10'),
(875, 'Employee social insurance', 0, 500, NULL, '2022-12-25 10:39:10'),
(876, 'Employee medical insurance', 0, 500, NULL, '2022-12-25 10:39:10'),
(877, 'Absence', 1, 500, NULL, '2022-12-25 10:39:10'),
(878, 'vacations', 1, 500, NULL, '2022-12-25 10:39:10'),
(879, 'Advanced Loans', 1, 500, NULL, '2022-12-25 10:39:10'),
(880, 'Other deductions', 1, 500, NULL, '2022-12-25 10:39:10'),
(881, 'Total deduction', 1, 500, NULL, '2022-12-25 10:39:10'),
(882, 'net salary', 1, 500, NULL, '2022-12-25 10:39:10'),
(883, 'Employee Code', 1, 501, NULL, NULL),
(884, 'Name', 1, 501, NULL, NULL),
(885, 'Job', 1, 501, NULL, NULL),
(886, 'Work Days', 1, 501, NULL, NULL),
(887, 'Basic Salary', 1, 501, NULL, NULL),
(888, 'Other allowances', 1, 501, NULL, NULL),
(889, 'OverTime', 1, 501, NULL, NULL),
(890, 'Sales percentage', 1, 501, NULL, NULL),
(891, 'Other dues', 1, 501, NULL, NULL),
(892, 'Total due', 1, 501, NULL, NULL),
(893, 'Employee social insurance', 1, 501, NULL, NULL),
(894, 'Employee medical insurance', 1, 501, NULL, NULL),
(895, 'Absence', 1, 501, NULL, NULL),
(896, 'vacations', 1, 501, NULL, NULL),
(897, 'Advanced Loans', 1, 501, NULL, NULL),
(898, 'Other deductions', 1, 501, NULL, NULL),
(899, 'Total deduction', 1, 501, NULL, NULL),
(900, 'net salary', 1, 501, NULL, NULL),
(901, 'Currency rate', 0, 22, NULL, '2023-02-20 16:41:53'),
(902, 'Egyptian net salary', 0, 22, NULL, '2023-02-20 16:41:53');

-- --------------------------------------------------------

--
-- Table structure for table `payslip_types`
--

CREATE TABLE `payslip_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_types`
--

INSERT INTO `payslip_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Bank Account', 'حساب بنكى', 2, '2022-01-31 16:43:46', '2022-03-03 07:08:58'),
(2, 'cash', 'كاش', 2, '2022-03-03 07:09:38', '2022-03-03 07:09:38'),
(3, 'cash', 'كاش', 18, '2022-07-20 09:25:37', '2022-07-20 09:25:37'),
(4, 'Transformation', 'تحويل', 18, '2022-07-20 09:58:43', '2022-07-20 09:58:43'),
(5, 'batches', 'دفعات', 18, '2022-07-20 09:59:02', '2022-07-20 09:59:02'),
(6, 'cash', 'كاش', 19, '2022-07-20 10:08:27', '2022-07-20 10:08:27'),
(7, 'Transformation', 'تحويل', 19, '2022-07-20 10:08:45', '2022-07-20 10:08:45'),
(8, 'batches', 'دفعات', 19, '2022-07-20 10:09:07', '2022-07-20 10:09:07'),
(9, 'cash', 'كاش', 20, '2022-07-20 10:21:25', '2022-07-20 10:21:25'),
(10, 'Transformation', 'تحويل', 20, '2022-07-20 10:22:25', '2022-07-20 10:22:25'),
(11, 'batches', 'دفعات', 20, '2022-07-20 10:22:41', '2022-07-20 10:22:41'),
(12, 'cash', 'كاش', 21, '2022-07-20 10:29:06', '2022-07-20 10:29:06'),
(13, 'Transformation', 'تحويل', 21, '2022-07-20 10:29:22', '2022-07-20 10:29:22'),
(14, 'batches', 'دفعات', 21, '2022-07-20 10:30:00', '2022-07-20 10:30:09'),
(15, 'cash', 'كاش', 23, '2022-07-20 10:56:00', '2022-07-20 10:56:00'),
(16, 'Transformation', 'تحويل', 23, '2022-07-20 10:56:18', '2022-07-20 10:56:18'),
(17, 'batches', 'دفعات', 23, '2022-07-20 10:56:59', '2022-07-20 10:56:59'),
(18, 'cash', 'كاش', 24, '2022-07-20 11:04:18', '2022-07-20 11:04:18'),
(19, 'Transformation', 'تحويل', 24, '2022-07-20 11:04:42', '2022-07-20 11:04:42'),
(20, 'batches', 'دفعات', 24, '2022-07-20 11:05:31', '2022-07-20 11:05:31'),
(21, 'cash', 'كاش', 68, '2022-07-20 11:56:20', '2022-07-20 11:56:20'),
(22, 'CASH', 'CASH', 362, '2022-10-24 14:24:36', '2022-10-24 14:24:36'),
(23, 'Transformation', 'Transformation', 362, '2022-10-24 14:25:24', '2022-10-24 14:25:24'),
(24, 'Cash', 'نقدي', 154, '2022-11-13 16:02:30', '2022-11-13 16:02:30'),
(25, 'Bank', 'بنكي', 154, '2022-11-13 16:02:56', '2022-11-13 16:02:56'),
(26, 'تحويل', 'تحويل', 501, '2022-11-17 13:00:21', '2022-11-17 13:00:21'),
(27, 'CASH', 'كاش', 500, '2022-11-20 11:50:52', '2022-11-20 11:50:52'),
(28, 'Transformation', 'تحويل', 500, '2022-11-20 11:51:10', '2022-11-20 11:51:10');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slips`
--

CREATE TABLE `pay_slips` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `net_payble` int NOT NULL,
  `salary_month` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL,
  `basic_salary` int NOT NULL,
  `allowance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `loan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `saturation_deduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_payment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `overtime` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `absence` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_recieved` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `rate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `performance_period_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_details`
--

CREATE TABLE `performance_details` (
  `id` bigint UNSIGNED NOT NULL,
  `performance_id` bigint UNSIGNED NOT NULL,
  `performance_factor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `points` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_factors`
--

CREATE TABLE `performance_factors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `performance_period_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_factors`
--

INSERT INTO `performance_factors` (`id`, `name`, `name_ar`, `performance_period_id`, `created_at`, `updated_at`) VALUES
(1, 'Attendance', 'الحضور والانصراف', 1, '2023-05-01 12:44:24', '2023-05-01 12:44:24'),
(2, 'Appearance', 'المظهر الخارجي', 1, '2023-05-01 12:45:09', '2023-05-01 12:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `performance_periods`
--

CREATE TABLE `performance_periods` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `months_no` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance_periods`
--

INSERT INTO `performance_periods` (`id`, `name`, `name_ar`, `created_at`, `updated_at`, `months_no`) VALUES
(1, 'Quarter', 'ربع سنوي', '2023-05-01 12:42:52', '2023-05-01 12:43:14', 3),
(2, 'Bi-annual', 'نصف سنوي', '2023-05-01 12:43:50', '2023-05-01 12:43:50', 6),
(3, 'Anual', 'سنوي', '2023-05-01 12:44:02', '2023-05-01 12:44:02', 12);

-- --------------------------------------------------------

--
-- Table structure for table `performance__types`
--

CREATE TABLE `performance__types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance__types`
--

INSERT INTO `performance__types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'good', 'good', '3', '2022-06-08 12:02:06', '2022-06-08 12:02:06'),
(2, 'excellent', 'ممتاز', '2', '2022-06-08 14:14:30', '2022-06-08 14:14:30'),
(3, 'very good', 'جيد جدا', '2', '2022-06-08 14:15:07', '2022-06-08 14:15:07'),
(4, 'الاخلاق', 'الاخلاق', '22', '2022-06-08 14:36:02', '2022-06-08 14:36:02'),
(5, 'الالتزام باجراءات وأساليب العمل', 'الالتزام باجراءات وأساليب العمل', '22', '2022-06-08 15:16:44', '2022-06-08 15:16:44'),
(6, 'انجاز العمل بالمستوى المطلوب', 'انجاز العمل بالمستوى المطلوب', '22', '2022-06-08 15:34:08', '2022-06-08 15:34:08'),
(7, 'انجاز العمل في الموعد المطلوب', 'انجاز العمل في الموعد المطلوب', '22', '2022-06-08 15:36:18', '2022-06-08 15:36:18'),
(8, 'السرعة في إنجاز العمل مع قلة الأخطاء', 'السرعة في إنجاز العمل مع قلة الأخطاء', '22', '2022-06-08 15:36:33', '2022-06-08 15:36:33'),
(9, 'الاجتهاد والتجاوب مع ضغط العمل', 'الاجتهاد والتجاوب مع ضغط العمل', '22', '2022-06-08 15:36:47', '2022-06-08 15:36:47'),
(10, 'التقييم الادارى', 'التقييم الادارى', '22', '2022-06-08 15:40:31', '2022-06-08 15:40:31'),
(11, 'personal evaluation', 'التقييم الشخصى', '22', '2022-06-08 15:48:28', '2022-06-08 15:48:28'),
(12, 'Evaluation after the probationary period', 'تقييم بعد فترة الاختبار', '22', '2022-06-08 15:54:27', '2022-06-08 15:54:27'),
(13, 'Annual Evaluation', 'تقييم سنوى', '22', '2022-06-08 15:55:35', '2022-06-08 15:55:35'),
(14, 'Monthly evaluation', 'تقييم شهرى', '22', '2022-06-08 16:32:08', '2022-06-08 16:32:08'),
(15, 'Quarterly evaluation', 'تقييم ربع سنوى', '22', '2022-06-08 16:38:48', '2022-06-08 16:38:48'),
(16, 'Semi-annual evaluation', 'تقييم نصف سنوى', '22', '2022-06-08 16:39:27', '2022-06-08 16:39:27'),
(17, 'test', 'test', '19', '2022-10-18 08:30:59', '2022-10-18 08:30:59'),
(18, 'Traditional Appraisal', 'التقييم التقليدي', '18', '2022-11-06 09:16:59', '2022-11-06 09:16:59'),
(19, '360 degree review', 'التقييم الشامل 360', '18', '2022-11-06 09:17:30', '2022-11-06 09:17:30'),
(20, 'Self Appraisal', 'التقييم الذاتي', '18', '2022-11-06 09:18:09', '2022-11-06 09:18:09'),
(21, 'Group appraisal', 'التقييم الجماعي', '18', '2022-11-06 09:18:50', '2022-11-06 09:18:50'),
(22, 'Upward appraisal', 'التقييم العكسي', '18', '2022-11-06 09:19:22', '2022-11-06 09:19:22'),
(25, 'سنوي', 'سنوي', '154', '2022-11-14 03:10:33', '2022-11-14 03:10:33'),
(26, 'نصف سنوي', 'نصف سنوي', '154', '2022-11-14 03:10:45', '2022-11-14 03:10:45'),
(27, 'ربع سنوي', 'ربع سنوي', '154', '2022-11-14 03:10:58', '2022-11-14 03:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `category`) VALUES
(283, 'shift-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(284, 'shift-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(285, 'shift-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(286, 'shift-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(287, 'shift-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(288, 'attendance-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(289, 'attendance-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(290, 'attendance-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(291, 'attendance-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(292, 'attendance-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(293, 'employee_permission-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(294, 'employee_permission-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(295, 'employee_permission-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(296, 'employee_permission-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(297, 'employee_permission-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(298, 'employee_permission-accept', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(299, 'employee_permission-reject', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(300, 'vacation-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(301, 'vacation-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(302, 'vacation-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(303, 'vacation-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(304, 'vacation-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(305, 'vacation-accept', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(306, 'vacation-reject', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(307, 'work_from_home-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(308, 'work_from_home-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(309, 'work_from_home-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(310, 'work_from_home-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(311, 'work_from_home-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(312, 'work_from_home-accept', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(313, 'work_from_home-reject', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(314, 'loan-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(315, 'loan-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(316, 'loan-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(317, 'loan-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(318, 'loan-export', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(319, 'loan-accept', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(320, 'loan-reject', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(321, 'employee-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(322, 'employee-create', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(323, 'employee-edit', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(324, 'employee-delete', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(325, 'attendanc-list', 'web', '2023-04-13 11:36:14', '2023-04-13 11:36:14', NULL),
(326, 'Dashboard-View', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Dashboard'),
(327, 'Employee-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(328, 'Employee-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(329, 'Employee-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(330, 'Employee-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(331, 'Employee-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(332, 'Employee-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Employee'),
(333, 'Shift-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(334, 'Shift-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(335, 'Shift-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(336, 'Shift-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(337, 'Shift-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(338, 'Shift-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Shift'),
(339, 'Attendance-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Attendance'),
(340, 'Attendance-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Attendance'),
(341, 'Attendance-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Attendance'),
(342, 'Saturationdeduction-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(343, 'Saturationdeduction-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(344, 'Saturationdeduction-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(345, 'Saturationdeduction-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(346, 'Saturationdeduction-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(347, 'Saturationdeduction-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Saturationdeduction'),
(348, 'Task-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(349, 'Task-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(350, 'Task-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(351, 'Task-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(352, 'Task-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(353, 'Task-Filter', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Task'),
(354, 'EmployeePermission-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(355, 'EmployeePermission-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(356, 'EmployeePermission-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(357, 'EmployeePermission-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(358, 'EmployeePermission-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(359, 'EmployeePermission-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(360, 'EmployeePermission-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(361, 'EmployeePermission-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'EmployeePermission'),
(362, 'Vacation-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(363, 'Vacation-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(364, 'Vacation-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(365, 'Vacation-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(366, 'Vacation-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(367, 'Vacation-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(368, 'Vacation-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(369, 'Vacation-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Vacation'),
(370, 'WorkFromHome-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(371, 'WorkFromHome-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(372, 'WorkFromHome-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(373, 'WorkFromHome-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(374, 'WorkFromHome-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(375, 'WorkFromHome-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(376, 'WorkFromHome-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(377, 'WorkFromHome-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Work From Home'),
(378, 'Loan-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(379, 'Loan-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(380, 'Loan-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(381, 'Loan-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(382, 'Loan-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(383, 'Loan-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(384, 'Loan-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(385, 'Loan-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Loan'),
(386, 'Mission-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(387, 'Mission-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(388, 'Mission-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(389, 'Mission-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(390, 'Mission-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(391, 'Mission-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(392, 'Mission-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(393, 'Mission-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Mission'),
(394, 'OverTime-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(395, 'OverTime-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(396, 'OverTime-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(397, 'OverTime-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(398, 'OverTime-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(399, 'OverTime-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(400, 'OverTime-Accept', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(401, 'OverTime-Reject', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'OverTime'),
(402, 'Evaluation-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(403, 'Evaluation-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(404, 'Evaluation-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(405, 'Evaluation-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(406, 'Evaluation-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(407, 'Evaluation-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Evaluation'),
(408, 'Performance-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(409, 'Performance-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(410, 'Performance-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(411, 'Performance-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(412, 'Performance-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(413, 'Performance-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Performance'),
(414, 'Meeting-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(415, 'Meeting-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(416, 'Meeting-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(417, 'Meeting-Delete', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(418, 'Meeting-Export', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(419, 'Meeting-Print', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Meeting'),
(420, 'Event-List', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Event'),
(421, 'Event-Create', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Event'),
(422, 'Event-Edit', 'web', '2023-05-03 12:49:50', '2023-05-03 12:49:50', 'Event'),
(423, 'Event-Delete', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Event'),
(424, 'Event-Export', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Event'),
(425, 'Event-Print', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Event'),
(426, 'News-List', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'News'),
(427, 'News-Create', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'News'),
(428, 'News-Edit', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'News'),
(429, 'News-Delete', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'News'),
(430, 'Offers-List', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Offers'),
(431, 'Offers-Create', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Offers'),
(432, 'Offers-Edit', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Offers'),
(433, 'Offers-Delete', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Offers'),
(434, 'JobOffers-List', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(435, 'JobOffers-Create', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(436, 'JobOffers-Edit', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(437, 'JobOffers-Delete', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(438, 'JobOffers-Export', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(439, 'JobOffers-Print', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'JobOffers'),
(440, 'Payroll-List', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(441, 'Payroll-View', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(442, 'Payroll-Create', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(443, 'Payroll-Export', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(444, 'Payroll-Print', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(445, 'Payroll-Monthly-Salary-Record', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(446, 'Payroll-Payroll-Tape', 'web', '2023-05-03 12:49:51', '2023-05-03 12:49:51', 'Payroll'),
(447, 'Payroll-MonthlySalaryRecord', 'web', '2023-05-03 16:56:48', '2023-05-03 16:56:48', 'Payroll'),
(448, 'Payroll-PayrollTape', 'web', '2023-05-03 16:56:48', '2023-05-03 16:56:48', 'Payroll'),
(449, 'Payroll-Payment', 'web', '2023-05-03 16:56:48', '2023-05-03 16:56:48', 'Payroll');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 42, 'MyApp', 'ab7640c7697ecf742f98e662def09dabb9d107cbf211d7852d1e8d502c66893f', '[\"*\"]', NULL, '2022-08-02 16:41:11', '2022-08-02 16:41:11'),
(2, 'App\\Models\\User', 42, 'MyApp', '568f706a9dc1edbc31703a46c2fa45d57c29d4299669eb5073622427edaecabc', '[\"*\"]', '2022-08-07 17:06:53', '2022-08-02 16:41:28', '2022-08-07 17:06:53'),
(3, 'App\\Models\\User', 42, 'MyApp', 'ce54fba71862e4f01638e0afe2b37096bfd902bc36217976b70349d896b3b7a6', '[\"*\"]', '2022-08-04 10:15:13', '2022-08-03 15:33:41', '2022-08-04 10:15:13'),
(4, 'App\\Models\\User', 42, 'MyApp', '1eac17326d4ae87c0f79275b09fbea2f7121c1b82a97e4397a0817fc2d21ecd7', '[\"*\"]', NULL, '2022-08-03 16:00:22', '2022-08-03 16:00:22'),
(5, 'App\\Models\\User', 42, 'MyApp', '7c606f954b481ef876a7383d74bb9a2aa3618154fc18d887c1579aa082b1cf3e', '[\"*\"]', NULL, '2022-08-03 16:01:45', '2022-08-03 16:01:45'),
(6, 'App\\Models\\User', 42, 'MyApp', 'e2cb7c5e5b2510b47db5621f7e17bffd9f47c4e31f6f88334ba273743adef25f', '[\"*\"]', NULL, '2022-08-03 16:02:01', '2022-08-03 16:02:01'),
(8, 'App\\Models\\User', 42, 'MyApp', '102e94221baf2fc9de3a2d34e34f9e88a6388af93ca08aa6cd375d5bb3d0143d', '[\"*\"]', NULL, '2022-08-04 14:01:31', '2022-08-04 14:01:31'),
(9, 'App\\Models\\User', 42, 'MyApp', '54b0a0f1cae12401fd64fb64cc9a531948e6a8b63e8da860742ffbf9242e7d4a', '[\"*\"]', NULL, '2022-08-04 14:01:44', '2022-08-04 14:01:44'),
(10, 'App\\Models\\User', 42, 'MyApp', '5d9e94cde7bf133f1d0e899c0e1cee1eeb03b8d1e1efb82b50178555bcf7abaa', '[\"*\"]', NULL, '2022-08-04 14:02:29', '2022-08-04 14:02:29'),
(11, 'App\\Models\\User', 42, 'MyApp', 'b0f1783757337fecce11f25627ec6bb2a83b85fe9825be0dc6bcf3869ee57b08', '[\"*\"]', '2022-08-04 14:06:35', '2022-08-04 14:02:50', '2022-08-04 14:06:35'),
(12, 'App\\Models\\User', 42, 'MyApp', 'f2dd02278c9eb6e40b4899fddf7ddab0db5601630b13e0a5b9a27ee3d1ee8593', '[\"*\"]', '2022-08-06 15:19:59', '2022-08-04 14:32:27', '2022-08-06 15:19:59'),
(13, 'App\\Models\\User', 42, 'MyApp', '2abbd6113d09de354181e96b78d2c92844bf19b1a9d8cc0051050466804b5144', '[\"*\"]', '2022-08-05 21:36:52', '2022-08-05 21:36:42', '2022-08-05 21:36:52'),
(14, 'App\\Models\\User', 42, 'MyApp', 'd32ec673599dc2a66b00eefd8426d761ee282dd74045e346f8facc139e0f3932', '[\"*\"]', '2022-08-06 16:15:05', '2022-08-06 15:49:49', '2022-08-06 16:15:05'),
(15, 'App\\Models\\User', 42, 'MyApp', '5bbb4957bb615898eabf123db3573e722a1a7e5dfa4ce81e4e98df64f5941f9c', '[\"*\"]', '2022-08-06 16:18:24', '2022-08-06 16:18:14', '2022-08-06 16:18:24'),
(18, 'App\\Models\\User', 42, 'MyApp', 'c72afd827bbe226e706b8fdc5995e31d7433af669ed8436ba595a27f9c40ab1f', '[\"*\"]', '2022-08-07 16:14:53', '2022-08-06 16:21:01', '2022-08-07 16:14:53'),
(20, 'App\\Models\\User', 42, 'MyApp', 'ce78789528948077eb512e00fdb4a150da0c2643694353219e967c77774c4c4e', '[\"*\"]', '2022-08-07 16:20:14', '2022-08-07 14:08:24', '2022-08-07 16:20:14'),
(21, 'App\\Models\\User', 42, 'MyApp', 'b04613fee03f6a0955f22653c4f36b2640389eb5630ee221cd74ffc1a2a87935', '[\"*\"]', '2022-08-07 17:07:22', '2022-08-07 16:23:00', '2022-08-07 17:07:22'),
(22, 'App\\Models\\User', 42, 'MyApp', '8ecbd7fd22c641b731a81f58946c342cbb427dcafb7425d80ee416d743b7de4c', '[\"*\"]', '2022-08-10 17:05:17', '2022-08-10 17:04:32', '2022-08-10 17:05:17'),
(23, 'App\\Models\\User', 42, 'MyApp', '411ccb00f8064eab36fc6c064c7412a93ec54852f04f107a922cf46598fc536f', '[\"*\"]', '2022-09-13 17:07:15', '2022-09-13 17:04:46', '2022-09-13 17:07:15'),
(25, 'App\\Models\\User', 42, 'MyApp', 'a24809de12768aef0bc338e2b3b44823c960898750d90935f41b61044c71b873', '[\"*\"]', NULL, '2022-09-15 15:16:14', '2022-09-15 15:16:14'),
(26, 'App\\Models\\User', 42, 'MyApp', '4ebb17d9d37ca62d689eb136e196e90cd701404dd218807edf3a9ce1dd02a6ad', '[\"*\"]', '2022-09-20 11:05:03', '2022-09-15 15:18:27', '2022-09-20 11:05:03'),
(27, 'App\\Models\\User', 42, 'MyApp', '43d9b8cc67d402532fd66e7cc698b5a770d2fa5d02b28ec2742998895befcdfe', '[\"*\"]', NULL, '2022-09-15 15:18:52', '2022-09-15 15:18:52'),
(28, 'App\\Models\\User', 42, 'MyApp', '38bc92a09432b85edd2d5d6e703b85e87de7f4ce7947d094afacceb6b6bb6ae9', '[\"*\"]', NULL, '2022-09-15 16:23:40', '2022-09-15 16:23:40'),
(29, 'App\\Models\\User', 42, 'MyApp', '6dde6f8fd35f34f146606dccaebd1669de0630608dca5cc76c2d99019a70b71a', '[\"*\"]', NULL, '2022-09-15 17:34:25', '2022-09-15 17:34:25'),
(30, 'App\\Models\\User', 42, 'MyApp', 'd58b87f27635c515c17f291c0fe0b9895f67bf71e87011624796ef5d4751d8b5', '[\"*\"]', NULL, '2022-09-15 17:36:46', '2022-09-15 17:36:46'),
(31, 'App\\Models\\User', 42, 'MyApp', '4ed544ef6671e1b5c0f8f1c1b6cd61aca5956c87147a4c374f7161bd606e5a9e', '[\"*\"]', NULL, '2022-09-19 11:02:12', '2022-09-19 11:02:12'),
(32, 'App\\Models\\User', 42, 'MyApp', 'eb2bb3099c771f762fecf507890e7d70772815043c54cca79f667c471143fbe7', '[\"*\"]', NULL, '2022-09-19 11:02:42', '2022-09-19 11:02:42'),
(33, 'App\\Models\\User', 42, 'MyApp', '2decbcff292ff11db95cc47a524fe498c278cb09c19d09941b8b042eaf5db86c', '[\"*\"]', '2022-09-19 17:13:00', '2022-09-19 11:29:33', '2022-09-19 17:13:00'),
(34, 'App\\Models\\User', 42, 'MyApp', 'd991f978529abf8f410b28d7979f7bc339865e5a509a50af08911b89148f470c', '[\"*\"]', '2022-09-20 10:03:03', '2022-09-20 10:02:10', '2022-09-20 10:03:03'),
(35, 'App\\Models\\User', 42, 'MyApp', '3a252d829502b49b0e182c0e8dceda3e2f68e12d8f22f45fb768e94a22117ae2', '[\"*\"]', '2022-09-22 10:21:20', '2022-09-20 13:32:02', '2022-09-22 10:21:20'),
(36, 'App\\Models\\User', 42, 'MyApp', '73153b301719b1e850582ef747e9f698ec8c22f2e51d487fc1b82eb1f7a7ca08', '[\"*\"]', '2022-09-20 15:58:41', '2022-09-20 13:42:45', '2022-09-20 15:58:41'),
(37, 'App\\Models\\User', 42, 'MyApp', 'e5aa79e52c56f466d99ce420c9bbb7f7e5b9c840f6d2ce28c983aac5841dd20b', '[\"*\"]', NULL, '2022-09-20 13:53:55', '2022-09-20 13:53:55'),
(38, 'App\\Models\\User', 42, 'MyApp', '7610ac00032885627063cadd3ee33a4e7ae33afb6cd4278c17aa7de2f39dd3fa', '[\"*\"]', NULL, '2022-09-20 13:56:36', '2022-09-20 13:56:36'),
(39, 'App\\Models\\User', 42, 'MyApp', '68e4f3903df74fe0feb9b3966dc6fe3937fdc068c8a977e0a08c865514fc3dbd', '[\"*\"]', '2022-09-21 10:05:08', '2022-09-21 10:02:03', '2022-09-21 10:05:08'),
(40, 'App\\Models\\User', 42, 'MyApp', 'aaccd415709c4964608711968b5d0c6e6220da1026f72fbbe705ed2106a05aef', '[\"*\"]', '2022-09-21 11:01:52', '2022-09-21 10:04:26', '2022-09-21 11:01:52'),
(41, 'App\\Models\\User', 42, 'MyApp', '52bfa7cf5f025b77be8d796d8948bdf23844afec11381d0990e9d178f94aa7c7', '[\"*\"]', '2022-09-21 14:16:41', '2022-09-21 12:02:22', '2022-09-21 14:16:41'),
(42, 'App\\Models\\User', 42, 'MyApp', 'b58d7d7894187663cd50ce1d7d300e1c6a269185430d971b7378f9cd5775fa9d', '[\"*\"]', '2022-09-21 17:22:29', '2022-09-21 17:15:57', '2022-09-21 17:22:29'),
(43, 'App\\Models\\User', 42, 'MyApp', 'bb6698987d80fe68777932f973a480830ef251bedbead88e665f2415f61c625c', '[\"*\"]', '2022-12-07 09:35:47', '2022-09-21 18:56:17', '2022-12-07 09:35:47'),
(44, 'App\\Models\\User', 42, 'MyApp', '5104cedd1bf1dad438395d173c1a54edf47aabf77175808aba060b160d45da0e', '[\"*\"]', '2022-09-22 11:53:39', '2022-09-22 10:03:56', '2022-09-22 11:53:39'),
(45, 'App\\Models\\User', 42, 'MyApp', 'd34a5796b64cbe017b3d1bb3dc2e2a6812f40020750cec0ddc942346ddb22586', '[\"*\"]', '2022-09-22 17:07:20', '2022-09-22 11:55:36', '2022-09-22 17:07:20'),
(46, 'App\\Models\\User', 42, 'MyApp', 'e66b8ddec40f1969ff5c2c507333b3b0dc8b203a107c02cbe95e6c2b8d43b1f2', '[\"*\"]', '2022-09-22 17:09:11', '2022-09-22 17:08:29', '2022-09-22 17:09:11'),
(47, 'App\\Models\\User', 42, 'MyApp', '8f0cbc0e1a9368a94e067994fff0c31b396b2412750f56b78533d0add1423299', '[\"*\"]', '2022-09-25 18:35:10', '2022-09-25 10:44:08', '2022-09-25 18:35:10'),
(48, 'App\\Models\\User', 42, 'MyApp', 'c539b3d8bb75bd01fdac3eba0a3a9182764089fb94697feac72a066de15e79dc', '[\"*\"]', '2022-09-25 12:15:48', '2022-09-25 12:14:55', '2022-09-25 12:15:48'),
(49, 'App\\Models\\User', 42, 'MyApp', '53523843f7c13c72fbf99d52e4ffa00aaf106c06b479a35905f9b2d4ac588110', '[\"*\"]', '2022-09-26 11:42:34', '2022-09-26 10:19:53', '2022-09-26 11:42:34'),
(50, 'App\\Models\\User', 42, 'MyApp', 'e106afb9119a29977c351d790887717dd946cf51551100812681801a2d6dfa93', '[\"*\"]', NULL, '2022-09-26 11:38:28', '2022-09-26 11:38:28'),
(51, 'App\\Models\\User', 42, 'MyApp', '8c98174c7cc8679855b7ef7511f824fb144755ba56e22f6a4b995210caee5b2f', '[\"*\"]', NULL, '2022-09-26 13:15:00', '2022-09-26 13:15:00'),
(52, 'App\\Models\\User', 42, 'MyApp', 'cf40cd79a8151c2b7db10dd45e218eedb72d357f25315626a376348548c42079', '[\"*\"]', NULL, '2022-09-26 13:15:08', '2022-09-26 13:15:08'),
(54, 'App\\Models\\User', 42, 'MyApp', 'ef2bccf3ab459148f4d9314442be1d83e444726394b74b46100bc5d0ef2df3f4', '[\"*\"]', NULL, '2022-09-26 14:14:25', '2022-09-26 14:14:25'),
(55, 'App\\Models\\User', 42, 'MyApp', '7836799b2029f0da3b51910500a3596b1dba59c988a488a838e5ac9b80d7753b', '[\"*\"]', NULL, '2022-09-26 14:14:37', '2022-09-26 14:14:37'),
(56, 'App\\Models\\User', 42, 'MyApp', '06f84fd049680dc91cc516a698f45cf8722b35f98bb27cad19b11afa8fe5da06', '[\"*\"]', NULL, '2022-09-26 14:14:46', '2022-09-26 14:14:46'),
(57, 'App\\Models\\User', 42, 'MyApp', 'bb2b68040567a7ba82fde2e19b123cf1b47e438165d17c3b76cd2c558a8063ff', '[\"*\"]', NULL, '2022-09-26 14:15:38', '2022-09-26 14:15:38'),
(58, 'App\\Models\\User', 42, 'MyApp', '867ec84d7f8a76491c23534e495ef48a0e877ab07ce124923c4bb18ccff09b74', '[\"*\"]', NULL, '2022-09-26 14:20:33', '2022-09-26 14:20:33'),
(60, 'App\\Models\\User', 42, 'MyApp', 'f6377e5124499b7c838c9cb59fd9e405c2ff989a74f222a67a105b91b2af5a66', '[\"*\"]', '2022-09-26 16:09:25', '2022-09-26 15:59:35', '2022-09-26 16:09:25'),
(61, 'App\\Models\\User', 42, 'MyApp', '0538a78ecb71bea33ea2112a98fd7eee46c861417d57641c3d44828e60e96304', '[\"*\"]', '2022-09-27 11:48:00', '2022-09-26 16:32:41', '2022-09-27 11:48:00'),
(62, 'App\\Models\\User', 42, 'MyApp', 'f20a4a47d2e1d6cafcfd28d7e75a103d5defd19b11be3c525afbea61efcf5fa5', '[\"*\"]', '2022-10-05 14:53:39', '2022-09-27 11:02:10', '2022-10-05 14:53:39'),
(63, 'App\\Models\\User', 42, 'MyApp', '1f6066ca09d8c0151ca2f70864aae0429d13288c0404484131eb8099bb814f4d', '[\"*\"]', '2022-09-27 14:44:56', '2022-09-27 11:52:08', '2022-09-27 14:44:56'),
(64, 'App\\Models\\User', 42, 'MyApp', 'f92d1e312cdd2a4726e61559d40327e007dfe87014bd3c6085932de661464328', '[\"*\"]', '2022-09-27 17:23:52', '2022-09-27 16:39:03', '2022-09-27 17:23:52'),
(65, 'App\\Models\\User', 42, 'MyApp', '140079b481ab40618193c451df656808dd41f4d79fa5b37fdfd9fb1176670ecf', '[\"*\"]', NULL, '2022-09-28 13:43:37', '2022-09-28 13:43:37'),
(66, 'App\\Models\\User', 42, 'MyApp', '5ff658593037b27b799df1885efb0a8431fc819700f10e8e18a2efa648224270', '[\"*\"]', NULL, '2022-09-28 13:44:59', '2022-09-28 13:44:59'),
(67, 'App\\Models\\User', 42, 'MyApp', '24d8d777c4d943d5819c9253fe5d99cbce6c2bd09e5b2af78acc9c2108a62ce8', '[\"*\"]', NULL, '2022-09-28 13:45:44', '2022-09-28 13:45:44'),
(68, 'App\\Models\\User', 42, 'MyApp', '041d0d27665645be99bce547471552c723978f47fa372331597b4d0a0cd76403', '[\"*\"]', '2022-09-28 15:40:52', '2022-09-28 15:40:51', '2022-09-28 15:40:52'),
(69, 'App\\Models\\User', 42, 'MyApp', '87812d70738f2e96429b82792f850e1fde650ba7671c6e245f1261b1ed2b6e39', '[\"*\"]', '2022-09-29 11:53:29', '2022-09-29 11:52:14', '2022-09-29 11:53:29'),
(70, 'App\\Models\\User', 42, 'MyApp', '1cefd0326a407602cfada048fe2a66bdb4c11e4a709739617392d79903e2fc5d', '[\"*\"]', '2022-09-29 11:53:45', '2022-09-29 11:53:37', '2022-09-29 11:53:45'),
(71, 'App\\Models\\User', 42, 'MyApp', '41698afeac879def05c7ed3f1399e7288f5ac42320f6dc824d72532f6ea8fb8c', '[\"*\"]', '2022-09-29 11:54:56', '2022-09-29 11:53:49', '2022-09-29 11:54:56'),
(72, 'App\\Models\\User', 42, 'MyApp', 'bf95369b8e3acaaa24188d25aa9d395bae75016e6d90279e4ed82f0f4b5b05a7', '[\"*\"]', '2022-10-03 22:18:22', '2022-09-29 11:55:02', '2022-10-03 22:18:22'),
(73, 'App\\Models\\User', 42, 'MyApp', '623758510fe2fb6566a2bf652b76cb8501f7555e44e61bb715bce77befab26bc', '[\"*\"]', '2022-09-29 16:02:51', '2022-09-29 16:02:43', '2022-09-29 16:02:51'),
(74, 'App\\Models\\User', 42, 'MyApp', '750660dfaf68dd2453c26ada90c2dbedc094c624e38fcbfb6935007754ea149a', '[\"*\"]', '2022-09-29 16:17:44', '2022-09-29 16:03:02', '2022-09-29 16:17:44'),
(75, 'App\\Models\\User', 42, 'MyApp', 'ee1ea5c126a0fb581194918a885825f452acd87fafdbf241d9bbd10fcc5e473a', '[\"*\"]', '2022-10-05 10:33:11', '2022-10-03 15:53:25', '2022-10-05 10:33:11'),
(76, 'App\\Models\\User', 42, 'MyApp', 'a4dbccaeff29a64ffac0db78059f9a15eb4966a412d3768b0c01aac69893703f', '[\"*\"]', '2022-10-04 10:22:49', '2022-10-04 09:45:03', '2022-10-04 10:22:49'),
(77, 'App\\Models\\User', 42, 'MyApp', '8091b4480c43afa535f5332c341b24d1d0f77fbe9f27e239d33a7cf054dcdffd', '[\"*\"]', '2022-10-04 12:14:04', '2022-10-04 10:47:33', '2022-10-04 12:14:04'),
(78, 'App\\Models\\User', 42, 'MyApp', 'f4b607e4f697007bf2ba66f5778c9250a52a5182a713ab17c6dd48c1038ec0f8', '[\"*\"]', '2022-10-04 15:51:55', '2022-10-04 12:27:30', '2022-10-04 15:51:55'),
(79, 'App\\Models\\User', 42, 'MyApp', 'af2ee2c3e55194009f3610ece02fab67a5be0f30df832ce7336501eee81c76c8', '[\"*\"]', '2022-10-05 15:25:58', '2022-10-04 12:30:02', '2022-10-05 15:25:58'),
(80, 'App\\Models\\User', 42, 'MyApp', '82b6ec9ed7ed1ebe6f534fb93a051f56938ffbb410e04fc43bcf79f3de3b5e16', '[\"*\"]', '2022-10-04 14:45:10', '2022-10-04 14:44:37', '2022-10-04 14:45:10'),
(81, 'App\\Models\\User', 42, 'MyApp', '273041368ee6fbf3beac674248c8dc20078a63fefacb010068046d3952f414e2', '[\"*\"]', '2022-10-04 17:18:48', '2022-10-04 16:00:04', '2022-10-04 17:18:48'),
(82, 'App\\Models\\User', 42, 'MyApp', 'f4e7ac98ce1d73128e15254f79a79fe44b4b1860d0bfd553a1b60310a7d51b31', '[\"*\"]', '2022-10-25 16:20:01', '2022-10-04 16:28:18', '2022-10-25 16:20:01'),
(83, 'App\\Models\\User', 42, 'MyApp', 'a21ce0f1f70c5a8964368c70d18387ca6ea5c9ce0a94bb287de2f7dc43305805', '[\"*\"]', '2022-10-04 17:21:25', '2022-10-04 17:19:35', '2022-10-04 17:21:25'),
(84, 'App\\Models\\User', 42, 'MyApp', '8a955f1dbae343d9c54eb9563cdef64dd68a78f73514f7712e8afa9e447fc05d', '[\"*\"]', '2022-10-05 09:32:17', '2022-10-05 09:32:12', '2022-10-05 09:32:17'),
(86, 'App\\Models\\User', 42, 'MyApp', '68a0ea6163adcbe5bba5ab0c73c6ea4ef6b6aee2aa44b1d5c8f4b619c470e51c', '[\"*\"]', '2022-10-05 09:34:03', '2022-10-05 09:33:16', '2022-10-05 09:34:03'),
(87, 'App\\Models\\User', 42, 'MyApp', '44e6eeb198e9be36a1a5b17b8d0cc7d42931f0e5c170e36b643c446692721a74', '[\"*\"]', '2022-10-05 17:58:40', '2022-10-05 09:37:43', '2022-10-05 17:58:40'),
(88, 'App\\Models\\User', 42, 'MyApp', '294538f045e4b01b6141b690abb5a4853545d7d2939654385d15a9a5990d9760', '[\"*\"]', '2022-10-05 15:44:54', '2022-10-05 15:36:15', '2022-10-05 15:44:54'),
(89, 'App\\Models\\User', 42, 'MyApp', '431c1d3f746daebb59500b79d681299a202fb06b98353dc1965f09d9dfe9290b', '[\"*\"]', '2022-10-05 15:57:50', '2022-10-05 15:42:21', '2022-10-05 15:57:50'),
(90, 'App\\Models\\User', 42, 'MyApp', '377b1c9e7e766e358aed00ff5c6f81bc0b5528722cf06d56cfb781197a3ffa8f', '[\"*\"]', '2022-10-05 15:50:04', '2022-10-05 15:47:41', '2022-10-05 15:50:04'),
(92, 'App\\Models\\User', 42, 'MyApp', '38ac85d6d942a7285609ab6a272a49b8d6c425abf7b729f859d7ee9cf51f7bf1', '[\"*\"]', '2022-10-05 16:43:33', '2022-10-05 16:07:15', '2022-10-05 16:43:33'),
(93, 'App\\Models\\User', 22, 'MyApp', '077169657b0fec9f68676aabb8a55290888966ed8bc716e512b099fb930c12c3', '[\"*\"]', NULL, '2022-10-05 17:02:00', '2022-10-05 17:02:00'),
(94, 'App\\Models\\User', 22, 'MyApp', '908604e7c597b23da9f40c6293fd7c1251bb1a315658a3fb824df7fbc5a02a5a', '[\"*\"]', NULL, '2022-10-05 17:02:08', '2022-10-05 17:02:08'),
(96, 'App\\Models\\User', 22, 'MyApp', 'ada5862a8a07b796fb0f4b92465a51e71cdc2f88ced8059534bf026a8f0987e3', '[\"*\"]', NULL, '2022-10-05 17:03:46', '2022-10-05 17:03:46'),
(97, 'App\\Models\\User', 22, 'MyApp', '173419d5f40250b5ad0d9444fa8ff96df3c05feb77ed950f5c970b9f074982e7', '[\"*\"]', NULL, '2022-10-05 17:03:51', '2022-10-05 17:03:51'),
(98, 'App\\Models\\User', 22, 'MyApp', '30f50ce00b4e5cd9d8b2fe6340387c94eb7b2a0ad0ec6c8eac94496d025bcebe', '[\"*\"]', NULL, '2022-10-05 17:03:59', '2022-10-05 17:03:59'),
(99, 'App\\Models\\User', 22, 'MyApp', '47d230d983939775310148af337ac1ff19a7715057e1d916fe73d9dd1fd6527d', '[\"*\"]', NULL, '2022-10-05 17:04:16', '2022-10-05 17:04:16'),
(100, 'App\\Models\\User', 63, 'MyApp', '4bb714a569085445218af7e669670869d94a76783e1a20b46f6805cffc337898', '[\"*\"]', '2022-10-05 17:06:12', '2022-10-05 17:05:37', '2022-10-05 17:06:12'),
(101, 'App\\Models\\User', 63, 'MyApp', 'a9be88cfc6ff800ae7e28e25a678789a8f799340df58670d3c35f799e5003b2b', '[\"*\"]', '2022-10-05 17:07:02', '2022-10-05 17:06:37', '2022-10-05 17:07:02'),
(102, 'App\\Models\\User', 63, 'MyApp', '5ecf00d55c600d9218d9d25b53bddb14cf37ab473fad850b99023d8eccc97607', '[\"*\"]', '2022-10-05 17:09:15', '2022-10-05 17:07:14', '2022-10-05 17:09:15'),
(103, 'App\\Models\\User', 63, 'MyApp', '1eb9a40bff61018f0621ba85011e4695cdbb6e0a376b98407263829a3f6b9e69', '[\"*\"]', '2022-10-05 17:10:32', '2022-10-05 17:09:57', '2022-10-05 17:10:32'),
(104, 'App\\Models\\User', 63, 'MyApp', '7a52a8f3edf3542b2daa2e55689180d463c003204982793e9d7d99bf9f4375b6', '[\"*\"]', '2022-10-05 17:10:41', '2022-10-05 17:10:37', '2022-10-05 17:10:41'),
(105, 'App\\Models\\User', 63, 'MyApp', '87c8ac3a83efbbdba64029127a81de5beb60c79f5b61c085ef37fac92427263a', '[\"*\"]', '2022-10-05 17:14:32', '2022-10-05 17:12:11', '2022-10-05 17:14:32'),
(106, 'App\\Models\\User', 41, 'MyApp', '4a677a1285839c6d7f30217e00fc9003393669aff3438c090ff7f85af53035de', '[\"*\"]', '2022-10-10 09:19:01', '2022-10-09 08:43:32', '2022-10-10 09:19:01'),
(107, 'App\\Models\\User', 42, 'MyApp', '5831715c001fe8f41ee52c0fbff8b546cd05d2bbce385d13f8537f31b786a914', '[\"*\"]', '2022-10-09 14:47:27', '2022-10-09 09:31:08', '2022-10-09 14:47:27'),
(108, 'App\\Models\\User', 42, 'MyApp', '9f475a4d4c9030e1e95230f877526da193511769e7668d3c63945083ac40fd26', '[\"*\"]', '2022-10-09 14:50:29', '2022-10-09 14:48:45', '2022-10-09 14:50:29'),
(109, 'App\\Models\\User', 42, 'MyApp', 'b5a590d1b07b45f78378c278af68ab002288b8df2049c148d45fd4e7ad55b746', '[\"*\"]', '2022-10-09 14:57:08', '2022-10-09 14:52:34', '2022-10-09 14:57:08'),
(110, 'App\\Models\\User', 42, 'MyApp', '0fc57975989edf3f0a9a98427ead8562e2a242b41033ec5869fbe62d6c962640', '[\"*\"]', '2022-10-09 15:37:00', '2022-10-09 14:58:46', '2022-10-09 15:37:00'),
(111, 'App\\Models\\User', 42, 'MyApp', '04e7e9b8d9a324c5cdd71be2230f120b135b803a1aeb5a1648fabe70393d853c', '[\"*\"]', '2022-10-09 15:54:32', '2022-10-09 15:39:52', '2022-10-09 15:54:32'),
(112, 'App\\Models\\User', 42, 'MyApp', '388332ff17371edd40ff9899353d1333803d438948c810d1c616dcdee257e419', '[\"*\"]', '2022-10-09 16:06:57', '2022-10-09 15:56:36', '2022-10-09 16:06:57'),
(113, 'App\\Models\\User', 42, 'MyApp', '5cf123efb34e4097781ddc398e84317a95e6bccb700f870d83604f18781c404c', '[\"*\"]', '2022-10-09 16:13:24', '2022-10-09 16:08:17', '2022-10-09 16:13:24'),
(114, 'App\\Models\\User', 42, 'MyApp', '612a9641ecb977c97b5e0d5c664004505c87c28dbc5e6da9d4a0e69396aa3699', '[\"*\"]', '2022-10-10 09:20:53', '2022-10-09 16:14:24', '2022-10-10 09:20:53'),
(118, 'App\\Models\\User', 42, 'MyApp', '05c25979e8332fbba024eaa9c639977ef08ca6c189e6040f27da04a2eca95435', '[\"*\"]', '2022-10-10 16:14:22', '2022-10-10 10:58:41', '2022-10-10 16:14:22'),
(119, 'App\\Models\\User', 42, 'MyApp', '508b3900ccb907ac9cf131ec1d92e4e81818d9d147db7645dd509d9460413e3d', '[\"*\"]', '2022-10-10 15:32:12', '2022-10-10 15:31:46', '2022-10-10 15:32:12'),
(120, 'App\\Models\\User', 42, 'MyApp', '7358ddabdfabef4d80cbc5d43af3c448bb9ddd304d58e31514ca69be34034052', '[\"*\"]', '2022-10-10 16:17:33', '2022-10-10 16:16:40', '2022-10-10 16:17:33'),
(121, 'App\\Models\\User', 42, 'MyApp', '389e2d53aa918be4d5a18760caf83b6e14f2de66d583e6db6d9440c45f68aa94', '[\"*\"]', '2022-10-11 09:46:19', '2022-10-11 09:43:48', '2022-10-11 09:46:19'),
(122, 'App\\Models\\User', 42, 'MyApp', '9170c2a4cef7a570873925df00de06efb9ab90e03b0e296a91bd916568ab7910', '[\"*\"]', '2022-10-11 10:13:08', '2022-10-11 10:12:00', '2022-10-11 10:13:08'),
(123, 'App\\Models\\User', 42, 'MyApp', 'd4617a64b833ff92bcdda0e49b1bbeca0743733ea303d36312b9d4c1cb3f2d8c', '[\"*\"]', '2022-10-11 10:39:34', '2022-10-11 10:38:16', '2022-10-11 10:39:34'),
(124, 'App\\Models\\User', 42, 'MyApp', '720897ac2b6b564dd27545d9baa05b040e6e6e2fbfc01cae2f63f0bbc14752eb', '[\"*\"]', '2022-10-11 10:41:49', '2022-10-11 10:41:19', '2022-10-11 10:41:49'),
(126, 'App\\Models\\User', 42, 'MyApp', '7974db7b711cc11dde88c592006d0b02c208fc2e0fc83bfb2957c541069c0f79', '[\"*\"]', NULL, '2022-10-11 11:47:58', '2022-10-11 11:47:58'),
(127, 'App\\Models\\User', 42, 'MyApp', '2232be65fe18ff595435863a6d989fb170a83f96d9dcee79405e8d7b026a0de9', '[\"*\"]', '2022-10-11 12:02:58', '2022-10-11 12:02:01', '2022-10-11 12:02:58'),
(130, 'App\\Models\\User', 42, 'MyApp', 'baaf41b1384adba5c21df707810d7d93aa662fa1c8c505ad89174bf562737aff', '[\"*\"]', '2022-10-11 16:49:42', '2022-10-11 16:43:01', '2022-10-11 16:49:42'),
(133, 'App\\Models\\User', 18, 'MyApp', 'b7aa65169d505408d028ae01c4036c724337323c0203b0ec878dd1ebd17aa399', '[\"*\"]', NULL, '2022-10-17 10:49:55', '2022-10-17 10:49:55'),
(134, 'App\\Models\\User', 18, 'MyApp', '8b043e036a14eaaa9e1b4d88761f307315bf7f978ffc60effc8a208e12c36da7', '[\"*\"]', NULL, '2022-10-17 10:50:15', '2022-10-17 10:50:15'),
(135, 'App\\Models\\User', 18, 'MyApp', 'dab62e2f8a8d62a639aea3268f37f64645653b285efe6b437a7bd759884f5758', '[\"*\"]', NULL, '2022-10-17 10:50:19', '2022-10-17 10:50:19'),
(136, 'App\\Models\\User', 18, 'MyApp', '3917dd9feb97535515c1fbd9193f5aecb40d7c63726cbccfe47dedec9b6cbb65', '[\"*\"]', NULL, '2022-10-17 10:50:44', '2022-10-17 10:50:44'),
(137, 'App\\Models\\User', 18, 'MyApp', 'a1341af3a51a548dcf2dc0680af7c978298f21ac58781e58b9ac2b930f027c52', '[\"*\"]', NULL, '2022-10-17 10:51:57', '2022-10-17 10:51:57'),
(138, 'App\\Models\\User', 19, 'MyApp', 'a8b3be0d2b19dee73e07b1c4219bf4428ff512fbb772fa2c46387f9714b3ad05', '[\"*\"]', NULL, '2022-10-17 10:52:37', '2022-10-17 10:52:37'),
(139, 'App\\Models\\User', 19, 'MyApp', 'c07bd73b86ad5f469be851ec9cb2d75d7d7dee10aac873fa469655f4742cc980', '[\"*\"]', NULL, '2022-10-17 10:52:58', '2022-10-17 10:52:58'),
(140, 'App\\Models\\User', 19, 'MyApp', '1f0b8d9a5b236888d62282777dcecd214fc7c73f825428d2f7a35ff19202d240', '[\"*\"]', NULL, '2022-10-17 10:53:02', '2022-10-17 10:53:02'),
(141, 'App\\Models\\User', 244, 'MyApp', '8d4ca6864dcd4925cc6d8ca1e5fa0e1ca6102d57ff42d7d9b79945ca7ec54869', '[\"*\"]', NULL, '2022-10-17 11:59:08', '2022-10-17 11:59:08'),
(144, 'App\\Models\\User', 42, 'MyApp', '3909eafc5ec56dd488688518254e19c569b884c06840733c47bf5a7ef2444182', '[\"*\"]', '2022-10-17 16:51:58', '2022-10-17 16:49:40', '2022-10-17 16:51:58'),
(145, 'App\\Models\\User', 244, 'MyApp', 'c1b5c2713c35acee0aeaf3f512b7788fabbd34633a826e446c7aa749776d3f88', '[\"*\"]', NULL, '2022-10-18 10:54:38', '2022-10-18 10:54:38'),
(146, 'App\\Models\\User', 244, 'MyApp', '06a6b839f1f50d75cb602fd3ddbb0de1600ac872ae37e7536812c7e513f945cd', '[\"*\"]', NULL, '2022-10-18 10:55:19', '2022-10-18 10:55:19'),
(147, 'App\\Models\\User', 244, 'MyApp', 'adf6703bab18324f16c09dfbd88e8022cb246660e865fd1f00dc9d680d22e9d0', '[\"*\"]', NULL, '2022-10-18 11:00:53', '2022-10-18 11:00:53'),
(149, 'App\\Models\\User', 42, 'MyApp', 'fb31170efe2007c8a0eb71f2bae68f955fabfcf3009c1361940159014eda5570', '[\"*\"]', '2022-10-20 17:12:22', '2022-10-20 13:18:45', '2022-10-20 17:12:22'),
(151, 'App\\Models\\User', 42, 'MyApp', '2c54ff815a2dc043890e26ee0acd334fadc5690e2724748eaeeb701187869037', '[\"*\"]', NULL, '2022-10-25 16:20:33', '2022-10-25 16:20:33'),
(152, 'App\\Models\\User', 42, 'MyApp', '7ca69397c54de0a427276c6f1940b9220012f7d6e7181172e2e256f19867ba3a', '[\"*\"]', '2022-11-02 14:06:12', '2022-11-02 14:04:09', '2022-11-02 14:06:12'),
(154, 'App\\Models\\User', 42, 'MyApp', 'cbd3719e3acb48acfc6a36a06326ac447b3000bc81160407154873fdb3c76430', '[\"*\"]', '2022-11-02 15:17:49', '2022-11-02 15:15:51', '2022-11-02 15:17:49'),
(157, 'App\\Models\\User', 42, 'MyApp', '7bd69e2ed9fb1cee2d265bea362a7cc675476958981df546b3db68e7e26aef2b', '[\"*\"]', '2022-11-02 16:09:27', '2022-11-02 15:53:11', '2022-11-02 16:09:27'),
(158, 'App\\Models\\User', 42, 'MyApp', '8e77d4117ba9b867dbc3e9568a13abfb3f03bb9de7a2bb5596c0761543773995', '[\"*\"]', '2022-11-03 16:47:31', '2022-11-03 16:46:39', '2022-11-03 16:47:31'),
(159, 'App\\Models\\User', 42, 'MyApp', '3f71d6beca8d7119b939287b76a771b8807e3602e033aaac1f15f544df49761d', '[\"*\"]', '2022-11-03 16:52:51', '2022-11-03 16:50:48', '2022-11-03 16:52:51'),
(160, 'App\\Models\\User', 42, 'MyApp', '0f97564ccd1e8a14e0f42ea9bde7266eadf37e1fb4fc262253a88fb619a7d056', '[\"*\"]', '2022-11-06 09:03:56', '2022-11-06 09:03:37', '2022-11-06 09:03:56'),
(161, 'App\\Models\\User', 244, 'MyApp', 'f883c9132ebf6730aed2753696427b0dcac9968473b4b415ff0f2b33af3bc41c', '[\"*\"]', '2022-11-06 10:01:08', '2022-11-06 09:43:13', '2022-11-06 10:01:08'),
(164, 'App\\Models\\User', 49, 'MyApp', 'e72b11a4f217e60286cfdc322a4159cc12553c13f0ceb888965e724d3af8a01a', '[\"*\"]', '2022-11-16 09:02:28', '2022-11-06 10:30:00', '2022-11-16 09:02:28'),
(165, 'App\\Models\\User', 221, 'MyApp', 'b350d03c39b66b51c32214520005aa329d959c2ea9a5a72539b929869daba2c7', '[\"*\"]', '2022-11-13 17:37:46', '2022-11-06 11:10:51', '2022-11-13 17:37:46'),
(166, 'App\\Models\\User', 47, 'MyApp', '8cb41ef5fa92ae11b17f25a564dd8787d591b95eaba6d00f27bdaeeb1056f08d', '[\"*\"]', '2023-01-07 18:29:46', '2022-11-06 11:19:24', '2023-01-07 18:29:46'),
(168, 'App\\Models\\User', 56, 'MyApp', 'cb6cb8a39b8c0bc7a86083b5b770d36ca5f2e8dd5e1dc8ab0eb493686ac4f175', '[\"*\"]', '2022-11-20 09:07:27', '2022-11-06 11:37:33', '2022-11-20 09:07:27'),
(172, 'App\\Models\\User', 222, 'MyApp', '0fd47b2dd60b98703372cd6dcbf42493a99b9c99bc2d24420cec5cf90063468a', '[\"*\"]', '2022-11-15 14:12:39', '2022-11-06 14:18:14', '2022-11-15 14:12:39'),
(173, 'App\\Models\\User', 42, 'MyApp', '2f22bfa7698b9438c2d77c8325b499923c3a4eb79aa352ae34be53cf8e7be758', '[\"*\"]', NULL, '2022-11-06 16:38:10', '2022-11-06 16:38:10'),
(174, 'App\\Models\\User', 42, 'MyApp', 'dd827b6f412dad4ed487436f940d2b390dd88ba151bd2db0e0f9cb950a0db812', '[\"*\"]', NULL, '2022-11-06 16:42:25', '2022-11-06 16:42:25'),
(175, 'App\\Models\\User', 42, 'MyApp', '72409909dea4b0903b24db3b56ad55c9c4bb7381059e84a53b541288ee6586f9', '[\"*\"]', NULL, '2022-11-06 16:43:49', '2022-11-06 16:43:49'),
(176, 'App\\Models\\User', 42, 'MyApp', '51f4d87c1fcba4a49f9320d66bcd490d8e24a907ded918274b331ab1d290279d', '[\"*\"]', NULL, '2022-11-06 16:45:25', '2022-11-06 16:45:25'),
(177, 'App\\Models\\User', 42, 'MyApp', '1732ab485d9241343ec21880399806f0ce37050e6b54eea9bb90e398320045dc', '[\"*\"]', NULL, '2022-11-06 16:46:18', '2022-11-06 16:46:18'),
(178, 'App\\Models\\User', 42, 'MyApp', '6e5724a8ae336c7f66ad37a934efbf9aeee952a0ef04ca5932538e7100872e0f', '[\"*\"]', NULL, '2022-11-06 16:46:54', '2022-11-06 16:46:54'),
(179, 'App\\Models\\User', 42, 'MyApp', '6b38e2ec6fb4a59fdd5bb71c82c104ba3f8639cb966272a32eebe104c85199e9', '[\"*\"]', NULL, '2022-11-06 16:47:10', '2022-11-06 16:47:10'),
(180, 'App\\Models\\User', 42, 'MyApp', '943354267c3e2f711754de120a3e189cce5944df0ff9398c34f39ac782e28a47', '[\"*\"]', NULL, '2022-11-06 16:51:00', '2022-11-06 16:51:00'),
(181, 'App\\Models\\User', 42, 'MyApp', 'dd8318912a0ab91f7f4709837d9be90e599b0dff037baf0c8ce1a7e8297a11e7', '[\"*\"]', NULL, '2022-11-06 16:51:42', '2022-11-06 16:51:42'),
(182, 'App\\Models\\User', 42, 'MyApp', '3f578523d1b30e21aa04c0d2586845cd8dee58b0df6557494fd602814a4596f1', '[\"*\"]', NULL, '2022-11-06 16:52:00', '2022-11-06 16:52:00'),
(183, 'App\\Models\\User', 42, 'MyApp', '3a9f83199631d464aaf91df8ffd73a8814b8e6675ac00b07e414f92c7ae0c2c4', '[\"*\"]', NULL, '2022-11-06 16:52:33', '2022-11-06 16:52:33'),
(184, 'App\\Models\\User', 42, 'MyApp', '3653ba1f3e10a145544d663136d34f890ea90f34c02ed3f6c5504d57d281932a', '[\"*\"]', NULL, '2022-11-06 16:54:56', '2022-11-06 16:54:56'),
(185, 'App\\Models\\User', 42, 'MyApp', '51c1d966527d2455cbe68e6fb203b4d200b198a6cae9ccf9c0bcb7aaec76ce96', '[\"*\"]', NULL, '2022-11-06 16:55:27', '2022-11-06 16:55:27'),
(186, 'App\\Models\\User', 42, 'MyApp', '4dcdb8eb89afb8c0f9e8e4284a3bcbb25ccf87b0fa8eae71bec15d0ec7227f45', '[\"*\"]', NULL, '2022-11-06 16:56:06', '2022-11-06 16:56:06'),
(187, 'App\\Models\\User', 42, 'MyApp', '781a3af30bc5bc4107578757eaa8fc3878a1f5e938c3d60e96ccfea13978dd4d', '[\"*\"]', NULL, '2022-11-06 16:56:34', '2022-11-06 16:56:34'),
(188, 'App\\Models\\User', 42, 'MyApp', '1619688ec455a65bf0af1369f7a4e07f663abaf58c310b0e343ec1898a014a57', '[\"*\"]', NULL, '2022-11-06 16:56:58', '2022-11-06 16:56:58'),
(189, 'App\\Models\\User', 42, 'MyApp', 'e819ab58e65bc1c48db14637af14e1fbe141f96958e86ca8d39415e9d0860521', '[\"*\"]', NULL, '2022-11-06 16:57:49', '2022-11-06 16:57:49'),
(190, 'App\\Models\\User', 42, 'MyApp', '45fe889f3f3c0e453d7f321aeba89b068870ce10757d428ac7183eb67f0da689', '[\"*\"]', NULL, '2022-11-06 16:59:11', '2022-11-06 16:59:11'),
(191, 'App\\Models\\User', 42, 'MyApp', 'e9d85bd70b97e5fdb360670cdfa9334a0f81265c984993eb6cd964b718ed01b6', '[\"*\"]', NULL, '2022-11-06 17:01:49', '2022-11-06 17:01:49'),
(192, 'App\\Models\\User', 42, 'MyApp', '59914d349215724082f85c754db2b7e394ce909902dc98437abc304d9323ad72', '[\"*\"]', NULL, '2022-11-06 17:03:34', '2022-11-06 17:03:34'),
(193, 'App\\Models\\User', 42, 'MyApp', 'fe9a641d1e78b2fb5e750e4b1f3f7e959cab75dbefc8e71af620faa5bbeb5818', '[\"*\"]', NULL, '2022-11-06 17:04:22', '2022-11-06 17:04:22'),
(194, 'App\\Models\\User', 48, 'MyApp', '65884f13094c91ddcfc9f0aba1bb27f0b6752210294750798a28dcd03889564c', '[\"*\"]', '2022-11-07 09:19:09', '2022-11-07 09:17:59', '2022-11-07 09:19:09'),
(196, 'App\\Models\\User', 46, 'MyApp', '1bda098fec61e5b49376edffab8b6ffbd74cc7d245abad2726e7095302dcb7be', '[\"*\"]', '2022-11-15 13:12:44', '2022-11-07 09:45:01', '2022-11-15 13:12:44'),
(198, 'App\\Models\\User', 42, 'MyApp', 'fd5b8e4e6b690d5791e76e48e619c937867a50ad07df2f49f4923bb04a55aa9f', '[\"*\"]', NULL, '2022-11-07 09:46:06', '2022-11-07 09:46:06'),
(200, 'App\\Models\\User', 45, 'MyApp', '8e06e7ffb3c7c593c9ae2155cb48358dd046d1d70334f071e96496d97cdaa825', '[\"*\"]', NULL, '2022-11-07 09:54:19', '2022-11-07 09:54:19'),
(202, 'App\\Models\\User', 45, 'MyApp', '2b7667c7a6cd49a713178cb36d3b78a3e549ade563481e06a9990f95554c3c40', '[\"*\"]', NULL, '2022-11-07 10:08:38', '2022-11-07 10:08:38'),
(203, 'App\\Models\\User', 220, 'MyApp', '31f80f97621c87962a53a3df802132276f720d4f0b48bb3e206533dcc9628326', '[\"*\"]', '2022-11-23 09:24:17', '2022-11-07 10:09:29', '2022-11-23 09:24:17'),
(204, 'App\\Models\\User', 41, 'MyApp', '8c133efc770cbc2ba53688e1df852148fcdd2c2123dbde57548a70a5a450d78e', '[\"*\"]', '2022-11-09 13:29:31', '2022-11-07 10:19:40', '2022-11-09 13:29:31'),
(206, 'App\\Models\\User', 51, 'MyApp', '6b16cfa19ea1ba591aee830d536314ee0a6f5390b6c62dfd07e68b04de6cdb39', '[\"*\"]', '2022-11-12 18:17:59', '2022-11-07 10:28:40', '2022-11-12 18:17:59'),
(207, 'App\\Models\\User', 45, 'MyApp', '3216032aa97ab9aafdfc8a317e5a1f600b64a897e41421305c80c81853c8683c', '[\"*\"]', '2022-11-08 14:53:55', '2022-11-07 10:29:35', '2022-11-08 14:53:55'),
(208, 'App\\Models\\User', 45, 'MyApp', '372721a03b027ca469ddad493568154010749932cdeaf24f28bf9972778971a4', '[\"*\"]', NULL, '2022-11-07 11:00:28', '2022-11-07 11:00:28'),
(209, 'App\\Models\\User', 199, 'MyApp', '1df83ed8c6c74ea96c96f30082efc4e78d462c8fd9da8ca4a7f71d05ae146009', '[\"*\"]', NULL, '2022-11-07 11:22:54', '2022-11-07 11:22:54'),
(210, 'App\\Models\\User', 199, 'MyApp', '946722ec8d2ee3d4e3dffc8e09cd2c4eb385405dd0af67a8fbbdef485064e7cf', '[\"*\"]', NULL, '2022-11-07 11:23:09', '2022-11-07 11:23:09'),
(211, 'App\\Models\\User', 199, 'MyApp', 'ae3b14a975b283133100915d36839fe80f7ad279abd8e2ec0be99f49d9f867c1', '[\"*\"]', NULL, '2022-11-07 11:24:32', '2022-11-07 11:24:32'),
(212, 'App\\Models\\User', 199, 'MyApp', 'f2ba32651a6244884cfd83fbef2c7762531f21dfbd8fa5e7d152c3d8d0fb48e2', '[\"*\"]', NULL, '2022-11-07 11:24:36', '2022-11-07 11:24:36'),
(213, 'App\\Models\\User', 199, 'MyApp', 'ce3e86a454bde5c0d2c46e0906d34f20869f3c3da6ec39c5d7982aa5351e9255', '[\"*\"]', NULL, '2022-11-07 11:26:53', '2022-11-07 11:26:53'),
(215, 'App\\Models\\User', 45, 'MyApp', 'f02baa9ac5280d804abebc6284a7f108d8a75d0b90a06efd118f72363c7ba420', '[\"*\"]', NULL, '2022-11-07 11:46:43', '2022-11-07 11:46:43'),
(216, 'App\\Models\\User', 199, 'MyApp', '29dafa4f0a0b4d427b73f939e4dacaec0035a6b8a5d2456433dd52ca85bb87de', '[\"*\"]', NULL, '2022-11-07 12:19:34', '2022-11-07 12:19:34'),
(217, 'App\\Models\\User', 199, 'MyApp', '8bf528b50d6107fed22568dfbd9a5fd768794d68c77a94ae4244e19ddeb6c54b', '[\"*\"]', NULL, '2022-11-07 12:20:20', '2022-11-07 12:20:20'),
(218, 'App\\Models\\User', 199, 'MyApp', '13eda7dfabd707f6d1d679727118147ca3b3997e5dee9a6c833b3105a6b107bf', '[\"*\"]', NULL, '2022-11-07 12:22:50', '2022-11-07 12:22:50'),
(219, 'App\\Models\\User', 199, 'MyApp', '900c9710e1bd9ed1038c1329118de65565d81b05369282ec17f1f355a8a28f66', '[\"*\"]', NULL, '2022-11-07 12:22:54', '2022-11-07 12:22:54'),
(220, 'App\\Models\\User', 244, 'MyApp', 'f97ffd34e3ae2816e014ed4bee37495561cd9c92c08516d2fa01e78d0a7dcc1e', '[\"*\"]', NULL, '2022-11-07 12:25:25', '2022-11-07 12:25:25'),
(221, 'App\\Models\\User', 244, 'MyApp', '2961166a9e6cfe9779795b31e0abd9559f2ea62438c79c5497980c326ee836a6', '[\"*\"]', NULL, '2022-11-07 12:25:59', '2022-11-07 12:25:59'),
(222, 'App\\Models\\User', 244, 'MyApp', '0037f68f440b091b005368d63a05241b3a56ca4bf776c31f141403aa3b0373c4', '[\"*\"]', NULL, '2022-11-07 12:26:23', '2022-11-07 12:26:23'),
(223, 'App\\Models\\User', 244, 'MyApp', '13208bf7cec1bd3f0aa57d51338322ee43f80d3fafd167ec9d22803ca21aaa24', '[\"*\"]', NULL, '2022-11-07 12:26:27', '2022-11-07 12:26:27'),
(224, 'App\\Models\\User', 244, 'MyApp', '3bf632256c4cded6fda16e7986708ce38c13becb9b91830fdfcd5cc4d4ee94f3', '[\"*\"]', NULL, '2022-11-07 12:26:31', '2022-11-07 12:26:31'),
(225, 'App\\Models\\User', 244, 'MyApp', '68b43b8efb83865ab8e7e48fbded9cef3c879ab051226092ac76d498ef558fb1', '[\"*\"]', NULL, '2022-11-07 12:29:52', '2022-11-07 12:29:52'),
(226, 'App\\Models\\User', 244, 'MyApp', 'fd266e92227c9d740996f0260f1ad6e1a84ddf6dcf167bc682f89f83bf2cd5fa', '[\"*\"]', NULL, '2022-11-07 13:13:53', '2022-11-07 13:13:53'),
(227, 'App\\Models\\User', 244, 'MyApp', 'c10a328891a08184d18478d0293436f441d38c67c517361fbc2acbab42f7fe65', '[\"*\"]', NULL, '2022-11-07 13:14:40', '2022-11-07 13:14:40'),
(228, 'App\\Models\\User', 244, 'MyApp', 'e68a44ceb1dfba6e354dc1f426157f0e23944da2386669e0eed349ba42922b57', '[\"*\"]', NULL, '2022-11-07 13:14:46', '2022-11-07 13:14:46'),
(229, 'App\\Models\\User', 45, 'MyApp', '67b401702d998833454941e47347233a86512c9f6fce84b4886579c0ad29eeec', '[\"*\"]', '2022-11-07 15:47:48', '2022-11-07 13:18:48', '2022-11-07 15:47:48'),
(230, 'App\\Models\\User', 53, 'MyApp', 'fec346ed94f761d3a246157a8bc55fec235ff9a9430d528e3c53fff002b76018', '[\"*\"]', '2022-11-07 13:21:25', '2022-11-07 13:20:19', '2022-11-07 13:21:25'),
(231, 'App\\Models\\User', 244, 'MyApp', 'c933920b749301f3a586764606b4e0bf4576a7ca5579ccfc9159b8b8f40079b4', '[\"*\"]', NULL, '2022-11-07 13:47:02', '2022-11-07 13:47:02'),
(232, 'App\\Models\\User', 244, 'MyApp', 'b7a463498c0aef1ccd961fe10b7df764206453c8117f42acb11bf60cd35d2f23', '[\"*\"]', NULL, '2022-11-07 13:47:07', '2022-11-07 13:47:07'),
(233, 'App\\Models\\User', 244, 'MyApp', 'cada83b93c8a1565d41b21d82eff87874ba4d78159f9b44e251be1f59e83f463', '[\"*\"]', NULL, '2022-11-07 13:47:42', '2022-11-07 13:47:42'),
(234, 'App\\Models\\User', 244, 'MyApp', 'a3079f85cac4f5e1edab3620c0f4c28245df7177f75276ffbad624d67be909c6', '[\"*\"]', NULL, '2022-11-07 13:48:50', '2022-11-07 13:48:50'),
(235, 'App\\Models\\User', 244, 'MyApp', '1b5c881d08182363dcc5a05cbe0c06a8a072ee4ca35f02796e4ea1a3b0b8788d', '[\"*\"]', NULL, '2022-11-07 13:49:58', '2022-11-07 13:49:58'),
(236, 'App\\Models\\User', 244, 'MyApp', 'a9951631465720aeba7ecb8e0ff5fa57c5c12860ba2b964f02eb078a67104f05', '[\"*\"]', NULL, '2022-11-07 13:51:17', '2022-11-07 13:51:17'),
(237, 'App\\Models\\User', 244, 'MyApp', 'a524c75215f09e926291af2eb38d604a021e1dba83a2c9c8e6f0d2067735d477', '[\"*\"]', NULL, '2022-11-07 13:52:25', '2022-11-07 13:52:25'),
(240, 'App\\Models\\User', 45, 'MyApp', '0942f96ba4e735b443b3d9d92204ee19cb0c5023b46b9c3b47c4bbc0f3aecd86', '[\"*\"]', NULL, '2022-11-07 15:46:03', '2022-11-07 15:46:03'),
(241, 'App\\Models\\User', 45, 'MyApp', '27aaba214e0d4c5e4ffdfeff7c05a9365fd2959c7b051ce14754f2bcc141a5ec', '[\"*\"]', '2022-11-07 15:55:04', '2022-11-07 15:49:46', '2022-11-07 15:55:04'),
(242, 'App\\Models\\User', 45, 'MyApp', '30f00d36454655640f298660428b1991cb862139491c7da772bde3115ab369da', '[\"*\"]', NULL, '2022-11-07 15:54:37', '2022-11-07 15:54:37'),
(243, 'App\\Models\\User', 45, 'MyApp', '14a895f9470d056ba6c37d06395e78ee68dc7aec31290afc5f19f2a6d3662033', '[\"*\"]', '2022-11-07 16:31:39', '2022-11-07 15:56:14', '2022-11-07 16:31:39'),
(244, 'App\\Models\\User', 244, 'MyApp', 'abcee0de6e8198bd16b2b79c5a34852b9fb990f179fd2ac67a82f970b556467b', '[\"*\"]', NULL, '2022-11-07 16:10:00', '2022-11-07 16:10:00'),
(245, 'App\\Models\\User', 244, 'MyApp', '3da596b0766146019dbc9f987f5ef680d1f3ce4bc1ef744688d256761e5834a9', '[\"*\"]', NULL, '2022-11-07 16:10:11', '2022-11-07 16:10:11'),
(246, 'App\\Models\\User', 244, 'MyApp', 'ab41a9c427e5add4e4fc97b9481e7055cfebbcde3552ec7a42ec8e66b14737cc', '[\"*\"]', '2022-11-07 16:17:58', '2022-11-07 16:10:32', '2022-11-07 16:17:58'),
(247, 'App\\Models\\User', 45, 'MyApp', 'dcb30ffe531147bc4e8d3bfea2e5444e48b22720b56da7c6df649b69753e1653', '[\"*\"]', '2022-11-07 16:51:19', '2022-11-07 16:33:00', '2022-11-07 16:51:19'),
(249, 'App\\Models\\User', 40, 'MyApp', 'c9e1f387c2a53635768921d689681dc9b903b233ebc68f7cf4e1d3b53173d4b6', '[\"*\"]', '2022-11-08 09:42:44', '2022-11-07 17:15:53', '2022-11-08 09:42:44'),
(250, 'App\\Models\\User', 45, 'MyApp', 'efeb0e78e3ec98361b236816cd82c378705947b8723d7af87c06831645f61467', '[\"*\"]', '2022-11-08 11:13:58', '2022-11-08 11:13:56', '2022-11-08 11:13:58'),
(251, 'App\\Models\\User', 45, 'MyApp', 'd1680e685b76946c64df2a9bff54ac4beafe1afef2737397314e0359cb99132c', '[\"*\"]', '2022-11-08 11:14:25', '2022-11-08 11:14:23', '2022-11-08 11:14:25'),
(252, 'App\\Models\\User', 45, 'MyApp', 'bf5afdb0ef58979664114cf6c3448701124ebd4ef03afa846b72615f7255300d', '[\"*\"]', '2022-11-08 11:14:30', '2022-11-08 11:14:28', '2022-11-08 11:14:30'),
(253, 'App\\Models\\User', 45, 'MyApp', '2bf53f1e32b228d0bd9505542ef22219a2241385c64e2b6c90529823a8d4758f', '[\"*\"]', '2022-11-08 11:14:36', '2022-11-08 11:14:35', '2022-11-08 11:14:36'),
(254, 'App\\Models\\User', 45, 'MyApp', '80c0ced7b934b9294890775f56d372a6fa2b4d0a46e207f2df1eb467ace9d40f', '[\"*\"]', '2022-11-08 11:24:03', '2022-11-08 11:15:04', '2022-11-08 11:24:03'),
(255, 'App\\Models\\User', 45, 'MyApp', 'e1d715b57fa01b13530c21a574937e85175660204b1a2c6cfc0cd7793160ba97', '[\"*\"]', '2022-11-08 11:44:39', '2022-11-08 11:43:01', '2022-11-08 11:44:39'),
(256, 'App\\Models\\User', 246, 'MyApp', '85de0694287a3660dcb61cf6580757359aec362b213790532a80796ce39d0ba8', '[\"*\"]', '2022-12-05 12:18:36', '2022-11-08 11:51:45', '2022-12-05 12:18:36'),
(257, 'App\\Models\\User', 45, 'MyApp', 'b77d2958c1490f31d688872c5fb8d991b9ce95a19e665c8a61c767658751cc1d', '[\"*\"]', '2022-11-08 15:27:48', '2022-11-08 11:54:47', '2022-11-08 15:27:48'),
(260, 'App\\Models\\User', 42, 'MyApp', 'bb27ed760e233e89e55b7644b18210fad10d5eac02c23cfc48d4c4d831426cc3', '[\"*\"]', '2022-11-16 10:38:04', '2022-11-08 15:25:11', '2022-11-16 10:38:04'),
(261, 'App\\Models\\User', 48, 'MyApp', 'fa3da1a965ba5eec141c4f7a534f3d420369477031acf1d009e456ea7d26dd2e', '[\"*\"]', '2022-11-09 13:44:10', '2022-11-08 17:19:33', '2022-11-09 13:44:10'),
(262, 'App\\Models\\User', 40, 'MyApp', 'c888aa16041624be954036c1c30b9163d4e323e31285ef09a6becc90391b39fb', '[\"*\"]', '2022-11-10 11:39:14', '2022-11-08 17:36:13', '2022-11-10 11:39:14'),
(263, 'App\\Models\\User', 45, 'MyApp', 'aa0b56a45174e3b2a8ae4fdfeec089ccee0c01c8c83ae2a98e1d42b8ce6d3187', '[\"*\"]', '2022-11-08 18:59:56', '2022-11-08 18:59:48', '2022-11-08 18:59:56'),
(264, 'App\\Models\\User', 53, 'MyApp', 'd2013f18eb518e67e74495fd1ae8b7ab2891187b93bd7e5c8532579aff6e1623', '[\"*\"]', '2022-11-09 09:15:42', '2022-11-09 09:15:32', '2022-11-09 09:15:42'),
(266, 'App\\Models\\User', 41, 'MyApp', 'f5c7daad0ae7d75ec4d7edac01c8d8ba4fa95386d467f6ea5e15ec1151762dc9', '[\"*\"]', '2022-11-15 13:16:59', '2022-11-09 13:32:02', '2022-11-15 13:16:59'),
(267, 'App\\Models\\User', 45, 'MyApp', '1d620e772f302cc6e87b84d192063c5d9aefa81fb403cd1850ad2a2c6d708fec', '[\"*\"]', '2022-11-09 13:46:56', '2022-11-09 13:45:33', '2022-11-09 13:46:56'),
(268, 'App\\Models\\User', 45, 'MyApp', '61dbf34bb879ce2a9694fcf26340bc31eb7e7f6a84170bbd641e34b89160cc15', '[\"*\"]', '2022-11-09 13:53:31', '2022-11-09 13:48:08', '2022-11-09 13:53:31'),
(269, 'App\\Models\\User', 45, 'MyApp', 'c1b66dcdce68e051aa26fc8ede0baa66cc9edb1bb0e49d9a467f041034ed243b', '[\"*\"]', '2022-11-09 14:00:36', '2022-11-09 13:54:21', '2022-11-09 14:00:36'),
(270, 'App\\Models\\User', 45, 'MyApp', '0cc9e86a3e9b620904baeda65ad390654ee0d0eb5d9f7e02e2f106dae1e208c2', '[\"*\"]', '2022-11-09 14:05:45', '2022-11-09 14:01:40', '2022-11-09 14:05:45'),
(271, 'App\\Models\\User', 45, 'MyApp', 'ae98a0dd6ee0eb0be6697f185d838f763984ed1b1ed825e0aa40b202632a795b', '[\"*\"]', '2022-11-09 14:12:48', '2022-11-09 14:06:55', '2022-11-09 14:12:48'),
(272, 'App\\Models\\User', 45, 'MyApp', 'cf24982df57965b370f46895632641c0223c9c4bfa144224bd89fd0ee8057162', '[\"*\"]', '2022-11-09 14:14:11', '2022-11-09 14:13:40', '2022-11-09 14:14:11'),
(273, 'App\\Models\\User', 45, 'MyApp', '3a9b5ea5fd14d0928d3fac981e08434d1d8433b5a872647a0db821798f3cd91b', '[\"*\"]', '2022-11-09 14:19:10', '2022-11-09 14:18:56', '2022-11-09 14:19:10'),
(274, 'App\\Models\\User', 45, 'MyApp', '3b7be628bc903415db031ef4271563d9135761aaa6b0a2b6c617ad29d798b098', '[\"*\"]', '2022-11-09 14:23:53', '2022-11-09 14:20:35', '2022-11-09 14:23:53'),
(275, 'App\\Models\\User', 45, 'MyApp', '4598d89072ddd1e1cdc37de786b4af32cb8088cccc0fefe4dd1ae57508f82f75', '[\"*\"]', '2022-11-09 14:26:23', '2022-11-09 14:25:17', '2022-11-09 14:26:23'),
(276, 'App\\Models\\User', 45, 'MyApp', '9abb0673edf6ac4b323ebf1887238a51c842cadede521aa305e134abc4f6d915', '[\"*\"]', '2022-11-09 14:29:20', '2022-11-09 14:27:58', '2022-11-09 14:29:20'),
(277, 'App\\Models\\User', 45, 'MyApp', 'a4a3a59f5b9a1852df6f3a8b170064a0f161b2831d3dd4e7e272974885660cbc', '[\"*\"]', '2022-11-09 15:03:23', '2022-11-09 14:54:37', '2022-11-09 15:03:23'),
(278, 'App\\Models\\User', 45, 'MyApp', 'aee38312416b277296b7f702290e336a0456328426ea596fea1bf3f02623e8fd', '[\"*\"]', '2022-11-09 16:37:27', '2022-11-09 16:37:16', '2022-11-09 16:37:27'),
(279, 'App\\Models\\User', 45, 'MyApp', '51e8d234aa4a7fcfeea143c70bbde71a8c52a443345c24ee2d3037249237ec22', '[\"*\"]', '2022-11-09 16:41:30', '2022-11-09 16:41:05', '2022-11-09 16:41:30'),
(280, 'App\\Models\\User', 45, 'MyApp', '1ba36f77174f652fec1239eb3dd40acdd7347478afd7ef39c150c93ebc775ef1', '[\"*\"]', '2022-11-10 16:35:47', '2022-11-10 11:35:30', '2022-11-10 16:35:47'),
(281, 'App\\Models\\User', 53, 'MyApp', '6b901dbeb26a7709e3e009b9520ff261ce75271a513b08e3e70349a4e7155459', '[\"*\"]', NULL, '2022-11-10 14:33:02', '2022-11-10 14:33:02'),
(282, 'App\\Models\\User', 45, 'MyApp', 'f2e7990b0102b733fcfbcc384abd53b166964b7160bfa422b6539a7fabe29084', '[\"*\"]', '2022-11-10 14:59:44', '2022-11-10 14:58:46', '2022-11-10 14:59:44'),
(283, 'App\\Models\\User', 45, 'MyApp', 'd2fffb7de7a862666dfa82839c4c05b5861a8cf9f51184045fccc50e8d948a9c', '[\"*\"]', '2022-11-10 16:58:24', '2022-11-10 16:37:21', '2022-11-10 16:58:24'),
(284, 'App\\Models\\User', 53, 'MyApp', '698573c3342f7351314c6160d5d838329813b52411169dca04cc85672f658e06', '[\"*\"]', '2022-11-13 16:37:17', '2022-11-10 16:42:08', '2022-11-13 16:37:17'),
(285, 'App\\Models\\User', 55, 'MyApp', 'ac1092763bb3a1414959f007eaf8f7b44848ff840ab8b8be7dc98afa93a3fab1', '[\"*\"]', '2022-11-22 09:27:00', '2022-11-13 09:56:54', '2022-11-22 09:27:00'),
(286, 'App\\Models\\User', 45, 'MyApp', '157e1ec5eab4a51114eba7107b83e403d0c8499b8e24a8d4062fb50e44d8c57f', '[\"*\"]', '2022-11-14 10:31:00', '2022-11-14 10:30:23', '2022-11-14 10:31:00'),
(287, 'App\\Models\\User', 45, 'MyApp', '932a4146bde495d8311881e79bed201da54e26b1b021192d6e8502a425696b87', '[\"*\"]', '2022-11-14 10:56:39', '2022-11-14 10:33:28', '2022-11-14 10:56:39'),
(288, 'App\\Models\\User', 45, 'MyApp', '763e01c38769ad21951e226c90385bab808e0aa6bfcd80c91ebf40f62f03d3ee', '[\"*\"]', '2022-11-14 13:54:00', '2022-11-14 10:57:59', '2022-11-14 13:54:00'),
(289, 'App\\Models\\User', 199, 'MyApp', 'e29b305bfbd576b2792a0538bf184d0cee2058b2336de5828eb945e441195da1', '[\"*\"]', '2022-11-21 10:24:42', '2022-11-14 11:15:34', '2022-11-21 10:24:42'),
(291, 'App\\Models\\User', 55, 'MyApp', 'c0550cfdfbb134af40ab3b97dee931f7a9e9068952f6ab01203694702ec46182', '[\"*\"]', '2022-11-14 16:58:12', '2022-11-14 16:54:50', '2022-11-14 16:58:12'),
(292, 'App\\Models\\User', 45, 'MyApp', 'c949591801b62b3d579aa4b9c27f2300320b8d3915cdc57bdd3a35db859d3271', '[\"*\"]', '2022-11-15 11:00:16', '2022-11-15 10:56:04', '2022-11-15 11:00:16'),
(293, 'App\\Models\\User', 45, 'MyApp', 'b69f4284c23d6efa87359179dcdc896bea939dfa5f224a79a6b7e0845bc1df2d', '[\"*\"]', '2022-11-15 11:19:15', '2022-11-15 11:18:57', '2022-11-15 11:19:15'),
(296, 'App\\Models\\User', 371, 'MyApp', '6bbac7dee3a849d101ce33967e63d2fb23ea918a2432143e4e8c8993e2434634', '[\"*\"]', '2022-11-15 12:00:19', '2022-11-15 11:56:28', '2022-11-15 12:00:19'),
(297, 'App\\Models\\User', 48, 'MyApp', 'f765b39d09e6df9f7e22c677d7bd53c71fc574ed3782012f6718b04774b6acea', '[\"*\"]', '2022-11-15 13:14:17', '2022-11-15 13:11:58', '2022-11-15 13:14:17'),
(299, 'App\\Models\\User', 138, 'MyApp', '6108cc1cc9b0fdb17f59cf10842aff001d2e461e8307fca0a5a0b9f5f7579629', '[\"*\"]', '2023-01-03 09:10:58', '2022-11-15 13:17:16', '2023-01-03 09:10:58'),
(304, 'App\\Models\\User', 497, 'MyApp', '564c7e022fe5bf56fde1ff2269f0877a1994dbb8890a41eea899f9cd725c9585', '[\"*\"]', '2023-01-16 16:02:11', '2022-11-15 13:28:22', '2023-01-16 16:02:11'),
(306, 'App\\Models\\User', 54, 'MyApp', 'd9ea371b6aa213c4fe2343df7e6d009a710ded3b34aeaf1211ad19d0b4f73cd9', '[\"*\"]', '2023-01-03 09:33:58', '2022-11-15 13:32:58', '2023-01-03 09:33:58'),
(307, 'App\\Models\\User', 40, 'MyApp', 'd34ed5125aa03d0141ffab0aca14e6bae53ae87327c64a6015635ac1f2df58e8', '[\"*\"]', '2022-12-12 08:58:59', '2022-11-15 13:33:16', '2022-12-12 08:58:59'),
(309, 'App\\Models\\User', 239, 'MyApp', 'ef57828a72d345131ecf161733c65b368d48a462355454e67d127ef9ac031612', '[\"*\"]', '2023-01-16 16:07:26', '2022-11-15 14:12:31', '2023-01-16 16:07:26'),
(310, 'App\\Models\\User', 369, 'MyApp', '9554eba524c4a36ebb1db9ad93eb460610021db6e8d84921e8ad5236980c131f', '[\"*\"]', '2022-11-17 09:34:40', '2022-11-15 14:18:10', '2022-11-17 09:34:40'),
(313, 'App\\Models\\User', 446, 'MyApp', '7da68912ee0c5f224eac36e99714f885bb11e7c542e032b43abafcc595ee6d80', '[\"*\"]', '2022-11-16 21:07:20', '2022-11-15 16:19:20', '2022-11-16 21:07:20'),
(316, 'App\\Models\\User', 244, 'MyApp', 'bb286469518f36ab0e250d76315ab0c94d9fb96ce17a96f01e31f0badbe1d337', '[\"*\"]', '2022-11-15 20:06:07', '2022-11-15 16:47:45', '2022-11-15 20:06:07'),
(322, 'App\\Models\\User', 222, 'MyApp', '87143f9d97d71638bbf463ee405186279571e89defc56f2dbf0de1cc80322859', '[\"*\"]', '2023-01-06 15:09:02', '2022-11-16 09:11:20', '2023-01-06 15:09:02'),
(323, 'App\\Models\\User', 69, 'MyApp', '3fedd4393e753e38cf799273e099e255761b151d44be484be77a94ab1c54e76b', '[\"*\"]', '2023-01-03 09:06:30', '2022-11-16 09:55:50', '2023-01-03 09:06:30'),
(326, 'App\\Models\\User', 53, 'MyApp', '4dcb45521ae28f2f8bdf8949d9c97a0b3381365f286e55b62e8e3ec4f4914fb2', '[\"*\"]', '2022-11-16 10:41:54', '2022-11-16 10:38:48', '2022-11-16 10:41:54'),
(327, 'App\\Models\\User', 244, 'MyApp', '8eed22bebc2c14ca7343863df793c6aaa1be79aaf32c0078813e5ee890534f60', '[\"*\"]', '2022-11-16 13:12:30', '2022-11-16 10:43:31', '2022-11-16 13:12:30'),
(329, 'App\\Models\\User', 244, 'MyApp', 'f405e14f5967b1941afa6000b810409e7b4e637d3d9fc9b07afb67d2d1bdf7fe', '[\"*\"]', '2022-11-20 14:47:57', '2022-11-16 11:08:18', '2022-11-20 14:47:57'),
(330, 'App\\Models\\User', 244, 'MyApp', '0fa4481cacf776e03055b4ba4747baf2f38061190116d087050d011283401d7e', '[\"*\"]', '2022-11-16 17:02:41', '2022-11-16 13:21:14', '2022-11-16 17:02:41'),
(331, 'App\\Models\\User', 30, 'MyApp', '9acda81f28c38c0d694773e98087cab4f5e9d2c286cfb9ef8a02993880f0c42f', '[\"*\"]', '2023-01-16 08:29:44', '2022-11-16 13:39:25', '2023-01-16 08:29:44'),
(332, 'App\\Models\\User', 374, 'MyApp', 'bd246d0642ffa6bd603843df868efcf459e1e71c3300cbeb20e3950440f7418d', '[\"*\"]', '2022-11-16 13:44:04', '2022-11-16 13:43:11', '2022-11-16 13:44:04'),
(336, 'App\\Models\\User', 45, 'MyApp', '0ad7f6b2715aeeac8349f0b455064d25d4768884f8c7c416489b849708ad0b6a', '[\"*\"]', '2022-11-17 11:30:11', '2022-11-17 11:10:48', '2022-11-17 11:30:11'),
(337, 'App\\Models\\User', 45, 'MyApp', '4806b2c5e52a3051310f2bb4c11840a9e484baa3069401244ea9ecbbdee27dfb', '[\"*\"]', '2022-11-17 18:24:25', '2022-11-17 11:57:09', '2022-11-17 18:24:25'),
(340, 'App\\Models\\User', 45, 'MyApp', 'aaad40c0defda23d3cb9cb565462cb5580d6ede3cd1ec871331d59928438cf28', '[\"*\"]', '2022-11-17 18:46:43', '2022-11-17 18:32:33', '2022-11-17 18:46:43'),
(341, 'App\\Models\\User', 28, 'MyApp', '8cad4379ce532ffbfbe547ba6aeddce1218a34df51f89c51a962b2b3c7618b93', '[\"*\"]', '2022-11-20 07:50:05', '2022-11-20 06:07:19', '2022-11-20 07:50:05'),
(344, 'App\\Models\\User', 45, 'MyApp', '012afd6e7cc94c0ba7666df4a984b27ef55a7d605b1c3c288cd3f9513f8dbad6', '[\"*\"]', '2022-11-20 13:28:16', '2022-11-20 10:17:28', '2022-11-20 13:28:16'),
(346, 'App\\Models\\User', 53, 'MyApp', 'e31ed0545cd195cbb01dcce6a67e7572d3038fec9a77e720737f91487b85fd29', '[\"*\"]', NULL, '2022-11-20 10:34:50', '2022-11-20 10:34:50'),
(347, 'App\\Models\\User', 53, 'MyApp', 'a69d786a066e0cee1cf38b1816276b6fe9c40a203f91515402a9e98431df828d', '[\"*\"]', NULL, '2022-11-20 10:39:56', '2022-11-20 10:39:56'),
(348, 'App\\Models\\User', 53, 'MyApp', 'efb9d0d5c598102a002b46f4e6d488e532dbf5a8b54f79ec1b30e03cf0d65481', '[\"*\"]', '2022-11-20 14:45:10', '2022-11-20 10:41:08', '2022-11-20 14:45:10'),
(349, 'App\\Models\\User', 53, 'MyApp', 'b63b39bd855ae1ec3ede5b28d478abf6fae2320e86601c368ffc1518eb2e70da', '[\"*\"]', NULL, '2022-11-20 11:58:59', '2022-11-20 11:58:59');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(350, 'App\\Models\\User', 45, 'MyApp', '1ecd9cbe790223f9d51eee731cc02f7de73b9cb6854aba5d8e9232d92afcc7cb', '[\"*\"]', '2022-11-20 13:52:03', '2022-11-20 13:50:37', '2022-11-20 13:52:03'),
(351, 'App\\Models\\User', 48, 'MyApp', '0da700108e3628994e9419f0d9ee10e90055554d5cc0f87afa252eccbd659024', '[\"*\"]', '2022-11-20 17:17:51', '2022-11-20 14:49:40', '2022-11-20 17:17:51'),
(352, 'App\\Models\\User', 45, 'MyApp', 'e9c6943058abcb597d5f2638866103578d460e6e697625c611168955fc53fc72', '[\"*\"]', '2022-11-20 16:34:43', '2022-11-20 14:19:38', '2022-11-20 16:34:43'),
(353, 'App\\Models\\User', 45, 'MyApp', '0470b0c04c0c79ee5ca711c95690baee8b508d7da33d4559bbf029a0917fedc1', '[\"*\"]', '2022-11-20 16:39:01', '2022-11-20 14:36:00', '2022-11-20 16:39:01'),
(354, 'App\\Models\\User', 45, 'MyApp', '5d7d47d37026e4d3b3368445780243962bd98a11fb20146f8f81782212dea305', '[\"*\"]', '2022-11-20 16:44:44', '2022-11-20 14:41:50', '2022-11-20 16:44:44'),
(356, 'App\\Models\\User', 45, 'MyApp', 'bfce550026b0f4cc8440bea0d7286cff5f4f60f454a683c9e137cfc7f8bb9eb3', '[\"*\"]', '2022-11-20 17:18:00', '2022-11-20 15:13:39', '2022-11-20 17:18:00'),
(358, 'App\\Models\\User', 40, 'MyApp', 'c88831beba2bb387eca7096aab1f01a40883c476f8d9abcd6432942d60a8b9fa', '[\"*\"]', '2022-11-22 17:08:23', '2022-11-20 15:40:15', '2022-11-22 17:08:23'),
(360, 'App\\Models\\User', 63, 'MyApp', 'b063e0d42fd7db9dea238cb4149b1eaab8efb98246f2ad1ab624d8aa6b514786', '[\"*\"]', '2023-01-04 16:55:05', '2022-11-21 07:12:04', '2023-01-04 16:55:05'),
(364, 'App\\Models\\User', 48, 'MyApp', 'ae7f9ba1d7f6935c0cb53a58743cb65d4012c234b72fc44330380d2492e0317c', '[\"*\"]', '2023-01-03 09:13:03', '2022-11-21 10:21:48', '2023-01-03 09:13:03'),
(365, 'App\\Models\\User', 45, 'MyApp', 'a39b95255a898a5933fb9956c48d43a12862ce68d985f23978be541065db073c', '[\"*\"]', NULL, '2022-11-21 11:17:58', '2022-11-21 11:17:58'),
(366, 'App\\Models\\User', 45, 'MyApp', 'a42185fbba2664a682970d8c4df82fe3368008b68d341152ed908b70c5678071', '[\"*\"]', NULL, '2022-11-21 11:18:56', '2022-11-21 11:18:56'),
(367, 'App\\Models\\User', 45, 'MyApp', '00e0248117e5e2166b6efa6f7f6c647b2984655c08031c833e507a3062fbb609', '[\"*\"]', NULL, '2022-11-21 11:20:11', '2022-11-21 11:20:11'),
(368, 'App\\Models\\User', 224, 'MyApp', '9da8ba25c4461a7294813e227e2005a7736e9138b2bad13002d950af39fd9d1f', '[\"*\"]', '2023-01-03 09:09:32', '2022-11-21 11:22:15', '2023-01-03 09:09:32'),
(369, 'App\\Models\\User', 45, 'MyApp', '1ca51abf2e17996eb2cf380dc6d6d0f4abbb3d807e5103fb87171554cdd642b9', '[\"*\"]', NULL, '2022-11-21 11:22:26', '2022-11-21 11:22:26'),
(370, 'App\\Models\\User', 45, 'MyApp', '75b40d7a86079cc2c201b83038d5f5a8e24570ed1b946dfa08edfe51713268c7', '[\"*\"]', NULL, '2022-11-21 11:22:49', '2022-11-21 11:22:49'),
(371, 'App\\Models\\User', 45, 'MyApp', '9ab82c54f4a9384b47e6598726b29e1d0ba2b5c32fc5cfd6a596bc41ae12dffa', '[\"*\"]', NULL, '2022-11-21 11:23:05', '2022-11-21 11:23:05'),
(372, 'App\\Models\\User', 45, 'MyApp', '9234f1e0b8524f445d4b5e95f8423513625036a7b29646d564a29f3b1b8dc229', '[\"*\"]', NULL, '2022-11-21 11:23:22', '2022-11-21 11:23:22'),
(373, 'App\\Models\\User', 45, 'MyApp', '4fd6ea9426749ef6f1990514318f7ad238390b415312c4196ccd5abcb9fafbe2', '[\"*\"]', NULL, '2022-11-21 11:23:48', '2022-11-21 11:23:48'),
(374, 'App\\Models\\User', 45, 'MyApp', '4764b82455bff70d7fbf8072b91bdc987896de3a6b8fe790ef58232d7de8dc9d', '[\"*\"]', NULL, '2022-11-21 11:26:11', '2022-11-21 11:26:11'),
(377, 'App\\Models\\User', 45, 'MyApp', 'd0d3565e99003c30109a090d4277ba9508ff474b582154e20ea05191f8cd7b68', '[\"*\"]', NULL, '2022-11-21 11:28:14', '2022-11-21 11:28:14'),
(378, 'App\\Models\\User', 45, 'MyApp', 'fb49e28b6b98ddbe392f095426c39ba288f5f9b78aca141e9bee26d4a836f6e5', '[\"*\"]', NULL, '2022-11-21 11:28:25', '2022-11-21 11:28:25'),
(379, 'App\\Models\\User', 45, 'MyApp', '7566a4b785b46de02b6c768e033bf7b26069cbf742af63f109443cc52025dec2', '[\"*\"]', NULL, '2022-11-21 11:28:41', '2022-11-21 11:28:41'),
(380, 'App\\Models\\User', 45, 'MyApp', '2dbf497be9c5b38fbaaee9dab97794d64a3b6f887b58bc4f500989162972c469', '[\"*\"]', NULL, '2022-11-21 11:28:55', '2022-11-21 11:28:55'),
(381, 'App\\Models\\User', 45, 'MyApp', '4974eb1b9bed278c46d2d77437f511a814e7a96d1f266edc0864f098be859a03', '[\"*\"]', NULL, '2022-11-21 11:29:32', '2022-11-21 11:29:32'),
(382, 'App\\Models\\User', 45, 'MyApp', '152cfc9a2dddd2b1d4b7e592bf9f87f8e86516355852d22cd2f8ca6733e05f1e', '[\"*\"]', NULL, '2022-11-21 11:30:00', '2022-11-21 11:30:00'),
(384, 'App\\Models\\User', 45, 'MyApp', 'a18c862103b132144f4fbb9e0e796671d90d3a53f4228189ed3b2bd84473d563', '[\"*\"]', NULL, '2022-11-21 12:20:20', '2022-11-21 12:20:20'),
(386, 'App\\Models\\User', 45, 'MyApp', '0bbc4507dfcda9175bbe37b24ddd79b62570b3a6ebad0fcf0ecd0d5af2fb069c', '[\"*\"]', '2022-11-21 15:15:14', '2022-11-21 13:05:12', '2022-11-21 15:15:14'),
(387, 'App\\Models\\User', 45, 'MyApp', 'a786a3d93449b0c1206dc0032c5ade5ae4578762575ac5416f656640e8f9e099', '[\"*\"]', '2022-11-21 15:19:10', '2022-11-21 13:16:10', '2022-11-21 15:19:10'),
(388, 'App\\Models\\User', 45, 'MyApp', 'edc89d463e4324abf95115250aa67425517b0a11d74039c2bf1bbe6883a283c6', '[\"*\"]', NULL, '2022-11-21 13:23:14', '2022-11-21 13:23:14'),
(389, 'App\\Models\\User', 45, 'MyApp', '0166080d11e82390c2719fe5e5695adf290eaeca848b141cfa6d0f4be0bb2662', '[\"*\"]', NULL, '2022-11-21 13:24:31', '2022-11-21 13:24:31'),
(390, 'App\\Models\\User', 45, 'MyApp', '13e72ba27f78eec6cd597dc140b67a51fc8b1c702e10dcebf3e7bbbde7665371', '[\"*\"]', '2022-11-21 16:46:49', '2022-11-21 13:26:16', '2022-11-21 16:46:49'),
(391, 'App\\Models\\User', 45, 'MyApp', '438be5782e823eddcb397991ea724d601e4b93e0bc24c588fdb3bf3d64285d0e', '[\"*\"]', '2022-11-21 16:54:05', '2022-11-21 14:53:07', '2022-11-21 16:54:05'),
(392, 'App\\Models\\User', 45, 'MyApp', '8c11f8794d5d467391b50b8029d7efcef94b49726e8a08cf1eff51eb003702ef', '[\"*\"]', '2022-11-21 17:13:54', '2022-11-21 14:56:07', '2022-11-21 17:13:54'),
(393, 'App\\Models\\User', 45, 'MyApp', '1445f8d6b99dded431ef322d91e55f19303014e8c34ab250a2976f525a8f3193', '[\"*\"]', '2022-11-22 09:20:17', '2022-11-22 07:13:29', '2022-11-22 09:20:17'),
(395, 'App\\Models\\User', 55, 'MyApp', '4d73f5db1aa4a495be42b134bacf90a2d258fbe9ac7f2efc6445d6add0b6a575', '[\"*\"]', '2023-01-03 10:15:05', '2022-11-22 07:28:21', '2023-01-03 10:15:05'),
(396, 'App\\Models\\User', 44, 'MyApp', '6aeb7bcb779f44d44cad6f9d65c8107386ca5cd6108f174b2ce4b9d7bfbb3dd8', '[\"*\"]', '2022-11-22 11:10:44', '2022-11-22 09:10:05', '2022-11-22 11:10:44'),
(398, 'App\\Models\\User', 45, 'MyApp', 'a096eba856bf9eb398d04a6a1c46f74f8a06016307bef29963cd0b5ce1be01d3', '[\"*\"]', '2022-11-22 13:33:03', '2022-11-22 11:31:40', '2022-11-22 13:33:03'),
(400, 'App\\Models\\User', 45, 'MyApp', '2d6ff162e036c07955158ef2d4561080389f81fd2861b8645509118a9cc404c8', '[\"*\"]', '2022-11-22 17:03:05', '2022-11-22 14:51:54', '2022-11-22 17:03:05'),
(401, 'App\\Models\\User', 44, 'MyApp', '59ce6d6e0c2b3d72c0295739506c8d3563ec5b953ad56d087ea4306d1d0174ca', '[\"*\"]', '2022-12-28 09:29:32', '2022-11-22 15:45:19', '2022-12-28 09:29:32'),
(403, 'App\\Models\\User', 53, 'MyApp', '10aa3bb7e4274aa0838e7b5837ba383ab20e36aa114e43c016ab25797ac52b04', '[\"*\"]', '2022-11-24 14:12:56', '2022-11-23 14:31:07', '2022-11-24 14:12:56'),
(404, 'App\\Models\\User', 57, 'MyApp', '0b8d3641bef0afa2fc7bfaea783c1d3ab13856895ec1f7b780fbc213b1a552ad', '[\"*\"]', NULL, '2022-11-23 15:11:48', '2022-11-23 15:11:48'),
(405, 'App\\Models\\User', 57, 'MyApp', '0e764d24637686bf9d0702eb535ea8a2d99646091aaab470d9003ce813e98aa6', '[\"*\"]', NULL, '2022-11-23 15:12:59', '2022-11-23 15:12:59'),
(406, 'App\\Models\\User', 57, 'MyApp', 'dbf8dfe8a124e98111f1012a3df372383eaf5f4a9b8934832727f80a9b956828', '[\"*\"]', '2022-11-24 09:08:25', '2022-11-23 15:13:09', '2022-11-24 09:08:25'),
(407, 'App\\Models\\User', 45, 'MyApp', '11e898563267830fdbc97cb64229d5d1f7a80a849b5c35f06af4aeba36d44b90', '[\"*\"]', '2023-01-03 09:06:29', '2022-11-24 07:03:13', '2023-01-03 09:06:29'),
(408, 'App\\Models\\User', 57, 'MyApp', '7ff9bbf6861e46ed5f9f2133bba6e7025e80e5c7798e6919727d2ad487c9639a', '[\"*\"]', '2023-01-03 09:14:31', '2022-11-24 12:06:12', '2023-01-03 09:14:31'),
(409, 'App\\Models\\User', 43, 'MyApp', 'aa48b146a0a2e2b34e49c68d991f75d928289f37f8acc6e6920ac104a855b6fd', '[\"*\"]', '2022-11-24 14:20:49', '2022-11-24 12:13:29', '2022-11-24 14:20:49'),
(410, 'App\\Models\\User', 53, 'MyApp', 'd19168d9a52c577d08bd2385f37eaff3f496388a6c15cf66e340cd6f1ae110d2', '[\"*\"]', '2022-11-24 15:00:44', '2022-11-24 12:52:30', '2022-11-24 15:00:44'),
(411, 'App\\Models\\User', 43, 'MyApp', '371b0f1feda8b3bd7814213cc2483c3d675a72842ee9bec0d786edaf52001527', '[\"*\"]', '2022-11-24 15:06:28', '2022-11-24 13:01:38', '2022-11-24 15:06:28'),
(413, 'App\\Models\\User', 41, 'MyApp', '1c23c1146ad164b05fbe7ba42caec1c3bc70634fdf1ffb1da66ec7469e8b195c', '[\"*\"]', '2023-01-03 09:18:01', '2022-11-24 13:33:08', '2023-01-03 09:18:01'),
(415, 'App\\Models\\User', 220, 'MyApp', '83ea4e429fbcff1cdb9d2eb3621f817d5ea55ee36f358b93a01d63ec73cd0b34', '[\"*\"]', '2022-11-24 16:05:45', '2022-11-24 13:58:02', '2022-11-24 16:05:45'),
(416, 'App\\Models\\User', 220, 'MyApp', 'e56d0ea90eb990716108a9c10a4464e558b0e225c4919e466749da9b0c7cd347', '[\"*\"]', '2023-01-03 16:13:25', '2022-11-24 14:04:17', '2023-01-03 16:13:25'),
(417, 'App\\Models\\User', 506, 'MyApp', 'e7fa98fc04fb45aeb6b5cf8323d1494061aff1952e1a7fd915e5fb179af92840', '[\"*\"]', '2023-01-16 16:17:40', '2022-11-27 12:48:12', '2023-01-16 16:17:40'),
(418, 'App\\Models\\User', 518, 'MyApp', '234f7946551c1f67f01516d48bd5885987a9d51a1368f5148c832732ba73650c', '[\"*\"]', '2023-01-16 16:00:24', '2022-11-27 13:06:02', '2023-01-16 16:00:24'),
(419, 'App\\Models\\User', 496, 'MyApp', '13ae610bad01a415ef51fee8e6a88ddbcf509848c80dd06c0972c274bcea4ab2', '[\"*\"]', '2022-12-18 07:07:00', '2022-11-28 05:05:15', '2022-12-18 07:07:00'),
(423, 'App\\Models\\User', 27, 'MyApp', 'ab33cc2d0db6a462ae8d9c68628b21df1bbb528e10ecca033741bdff90d5594a', '[\"*\"]', '2022-11-28 09:41:36', '2022-11-28 06:55:53', '2022-11-28 09:41:36'),
(425, 'App\\Models\\User', 45, 'MyApp', 'e1f08139be8123d27247232cba3300a1847cdedaa9e42341a16d8a41a04caf78', '[\"*\"]', '2022-11-28 10:35:40', '2022-11-28 07:33:52', '2022-11-28 10:35:40'),
(426, 'App\\Models\\User', 45, 'MyApp', 'b7db8671a29edb42e39cc377ab58e059eca5c849cc7e93e51cb9219c773dc7c2', '[\"*\"]', '2022-11-28 09:38:15', '2022-11-28 07:37:14', '2022-11-28 09:38:15'),
(427, 'App\\Models\\User', 69, 'MyApp', '523b5e11e75b7944e9408097e84627355fbf9adfd6e59a9ea3bdc767abe09238', '[\"*\"]', NULL, '2022-11-28 07:38:52', '2022-11-28 07:38:52'),
(428, 'App\\Models\\User', 69, 'MyApp', 'cdf83787bf8a7e94da43e4d2cdc66ac44edcad9325194f5d3fc6b94f9f985eaa', '[\"*\"]', '2022-11-28 09:39:21', '2022-11-28 07:38:56', '2022-11-28 09:39:21'),
(434, 'App\\Models\\User', 45, 'MyApp', 'd60f57562825432ee0b379d94109d3d7a4c46db5d917833bf8eed728f78d946b', '[\"*\"]', '2022-11-29 16:48:23', '2022-11-29 14:48:20', '2022-11-29 16:48:23'),
(438, 'App\\Models\\User', 45, 'MyApp', 'b22461ffb532abcc5bf8a521fec2aa4abcf4a23369b5178f246c2ecc2d2094be', '[\"*\"]', '2022-11-30 11:33:25', '2022-11-30 09:31:08', '2022-11-30 11:33:25'),
(441, 'App\\Models\\User', 45, 'MyApp', '5e74d98014d69befe6a2f4ac71e333caef6884cac10510cd6eee98f51c202773', '[\"*\"]', '2022-12-01 10:03:15', '2022-12-01 08:02:20', '2022-12-01 10:03:15'),
(442, 'App\\Models\\User', 45, 'MyApp', '1f878d77435faaff3c0a96b0cab81036766ddbc22764c89b7d624fa7d3a09421', '[\"*\"]', '2022-12-04 17:16:24', '2022-12-04 14:08:16', '2022-12-04 17:16:24'),
(444, 'App\\Models\\User', 45, 'MyApp', '633e072b23a22a3790286652aeb9a17546e1c2a5bda43b4ffc3940c80467d690', '[\"*\"]', '2022-12-05 15:01:35', '2022-12-05 12:45:00', '2022-12-05 15:01:35'),
(445, 'App\\Models\\User', 225, 'MyApp', 'ea1ffb07b3c982413d20084faca2b3c39ed76b4ab14e45bf20be29c9ba1fab00', '[\"*\"]', '2023-01-03 10:55:18', '2022-12-06 10:12:54', '2023-01-03 10:55:18'),
(446, 'App\\Models\\User', 156, 'MyApp', '23ac54dfb7b7015d43095347de09b528dfe73ddbd48b3beb32facc99db3d9a38', '[\"*\"]', '2022-12-07 16:48:25', '2022-12-06 12:41:46', '2022-12-07 16:48:25'),
(447, 'App\\Models\\User', 45, 'MyApp', '9d4ef0ffb7f855283188d4926697f7ae1547803688d771a0afe2dbbea4e07556', '[\"*\"]', '2022-12-08 09:21:18', '2022-12-07 07:33:19', '2022-12-08 09:21:18'),
(448, 'App\\Models\\User', 244, 'MyApp', '90671028afbecb447a80a95afb35bf631414e544cbb428d730a16a8d070839f0', '[\"*\"]', '2023-01-15 10:49:38', '2022-12-08 06:35:10', '2023-01-15 10:49:38'),
(449, 'App\\Models\\User', 44, 'MyApp', 'c5b96b1ecab7566b35340a31b0b160f0e259bf92fd7305333288e14905acda3b', '[\"*\"]', '2022-12-12 09:25:43', '2022-12-12 07:25:30', '2022-12-12 09:25:43'),
(450, 'App\\Models\\User', 220, 'MyApp', '65b0ebad1a6252576f19062163ff32caf3f48da5b5e4dd9ea2845980d18c385a', '[\"*\"]', NULL, '2022-12-12 09:29:43', '2022-12-12 09:29:43'),
(452, 'App\\Models\\User', 45, 'MyApp', 'ee63172bf09ebc9c6e744b8b4a240ffe0618b3ba2554925d07d7836ad1144a6f', '[\"*\"]', '2022-12-12 16:30:09', '2022-12-12 14:29:52', '2022-12-12 16:30:09'),
(455, 'App\\Models\\User', 246, 'MyApp', '56b353c20440f850d7d412d052037bb5330c2f2b5e727fdc91339bb2fc13e800', '[\"*\"]', '2022-12-12 16:43:12', '2022-12-12 14:40:08', '2022-12-12 16:43:12'),
(459, 'App\\Models\\User', 199, 'MyApp', '9008a3edc423ae7a5ce687386cad10de64228fa3cd17577efe37e2ad9dc31923', '[\"*\"]', '2022-12-12 17:01:28', '2022-12-12 15:00:48', '2022-12-12 17:01:28'),
(460, 'App\\Models\\User', 40, 'MyApp', 'ca849d874b6ae29e31933febd2666e8202c4081a017ccec72de1c4a6c367c8b6', '[\"*\"]', '2023-01-03 09:12:31', '2022-12-12 15:45:13', '2023-01-03 09:12:31'),
(462, 'App\\Models\\User', 244, 'MyApp', 'dc51980f73fcfdca7c963c35f561d6eec974ed3d7866f53ea901ff8d157b9f24', '[\"*\"]', '2022-12-13 10:31:53', '2022-12-13 08:29:59', '2022-12-13 10:31:53'),
(463, 'App\\Models\\User', 244, 'MyApp', '1974f437d3cd2278b229984f84898d832225fc8bac649d00209ea0e32271ffe3', '[\"*\"]', '2022-12-13 13:14:43', '2022-12-13 08:35:13', '2022-12-13 13:14:43'),
(465, 'App\\Models\\User', 513, 'MyApp', '5f131a550b79f13ea8c5a2240ac3165c469a58806c3be81767b043e98a051c74', '[\"*\"]', '2023-01-16 16:02:08', '2022-12-13 11:50:02', '2023-01-16 16:02:08'),
(467, 'App\\Models\\User', 246, 'MyApp', '10f0982341c8f1de18b5ae21cbe93871e385cfd9c8e696a951802142947b01b6', '[\"*\"]', '2023-01-14 16:44:39', '2022-12-13 12:12:56', '2023-01-14 16:44:39'),
(468, 'App\\Models\\User', 19, 'MyApp', '0277e15f0bc9f01f8c5358e65b44a785cfcb247fde4d0c623f4b5c626ebd6e68', '[\"*\"]', NULL, '2022-12-13 12:58:06', '2022-12-13 12:58:06'),
(469, 'App\\Models\\User', 19, 'MyApp', 'b249e7c6ddcc9c941814816ec61a0437e4753042c291da7adf2a72ec6957afde', '[\"*\"]', NULL, '2022-12-13 12:58:13', '2022-12-13 12:58:13'),
(470, 'App\\Models\\User', 19, 'MyApp', '0c25960fadd4a93c79bb43c92ab9118ed687ad9b3fbcb42496f960186169ecd8', '[\"*\"]', NULL, '2022-12-13 13:00:47', '2022-12-13 13:00:47'),
(471, 'App\\Models\\User', 19, 'MyApp', 'd3b2de9d6d3472588986022fcc559c833d9156087fa7cb9c7a88d05ce0449ea8', '[\"*\"]', NULL, '2022-12-13 13:00:59', '2022-12-13 13:00:59'),
(472, 'App\\Models\\User', 19, 'MyApp', 'dc4a955d98e2f2f0a20102e14b5d850a81e9cc87aa049079560295b5d897bb90', '[\"*\"]', NULL, '2022-12-13 13:03:56', '2022-12-13 13:03:56'),
(473, 'App\\Models\\User', 19, 'MyApp', '06a853bb6beaa3e96211fbdc094295d72d40ae431142d6bc71cf07990d17ea02', '[\"*\"]', NULL, '2022-12-13 13:04:34', '2022-12-13 13:04:34'),
(474, 'App\\Models\\User', 19, 'MyApp', '18920c6ef10117664de9f81e8548c069b7cbcbea3f2b871680ffd1b8eaf1ad41', '[\"*\"]', NULL, '2022-12-13 13:04:40', '2022-12-13 13:04:40'),
(475, 'App\\Models\\User', 19, 'MyApp', '60922f7baf1be7edd1be1aa4cb5ae7366e5fd56baf9276f605f9a1ee02e1ada7', '[\"*\"]', NULL, '2022-12-13 13:13:02', '2022-12-13 13:13:02'),
(476, 'App\\Models\\User', 19, 'MyApp', '70c6e9bbfde24fadadb43b5153e13449d308c1b06225bd10a6dfc04e55958c51', '[\"*\"]', NULL, '2022-12-13 13:16:06', '2022-12-13 13:16:06'),
(477, 'App\\Models\\User', 43, 'MyApp', '62d59e7cb41773b046c3290b40db9e536c20f603ff7d30c0009e48561a464f9c', '[\"*\"]', '2023-01-02 15:01:03', '2022-12-13 13:17:37', '2023-01-02 15:01:03'),
(478, 'App\\Models\\User', 28, 'MyApp', 'e866ef167de261a62e1fa3ff469556ee75bd23708289432075860a37740a12eb', '[\"*\"]', '2022-12-14 14:51:05', '2022-12-14 12:21:19', '2022-12-14 14:51:05'),
(486, 'App\\Models\\User', 27, 'MyApp', '2ef5c5ea83bb0abb70f5692af802e2dcc66fa9697183f9af52eb7ee4c600daf3', '[\"*\"]', '2022-12-14 15:23:44', '2022-12-14 13:04:26', '2022-12-14 15:23:44'),
(487, 'App\\Models\\User', 28, 'MyApp', '40d57297396546a290a91b710a86939f6708ced57ffd723039c21f47e65f3ec6', '[\"*\"]', '2022-12-15 08:23:58', '2022-12-14 13:06:40', '2022-12-15 08:23:58'),
(493, 'App\\Models\\User', 27, 'MyApp', '9217d827ca53bd9e6dde282a11492bf68ce19b273b669723bd171d4326200f73', '[\"*\"]', '2022-12-26 08:11:15', '2022-12-14 13:21:54', '2022-12-26 08:11:15'),
(497, 'App\\Models\\User', 45, 'MyApp', '9d08f44a3bc35ee62b77cb3165f8cc1bc91c5f2711b81f0a0d0d3a1e7c5b93df', '[\"*\"]', '2022-12-15 09:10:25', '2022-12-15 06:20:49', '2022-12-15 09:10:25'),
(498, 'App\\Models\\User', 45, 'MyApp', '017d97497c0546791a6ad0d810ea4b1d18ca7196ecd6b476c488de03365216f0', '[\"*\"]', NULL, '2022-12-17 18:29:49', '2022-12-17 18:29:49'),
(499, 'App\\Models\\User', 28, 'MyApp', 'd67cc7d49fc3706b41e52e8018420d23da42bcde74dba817ac78a63e3a1d6b6d', '[\"*\"]', '2022-12-18 06:40:30', '2022-12-18 04:39:12', '2022-12-18 06:40:30'),
(500, 'App\\Models\\User', 588, 'MyApp', 'b14047afecdb3818923f2ac3a206ee0cbb98dc4e31b97b6e0ae5dfdd866d417d', '[\"*\"]', '2023-01-05 16:15:05', '2022-12-18 08:17:51', '2023-01-05 16:15:05'),
(501, 'App\\Models\\User', 577, 'MyApp', 'e89d75f2f831a3a4570322cda7747cad6ff2949da85157bb2e53a1140a24b387', '[\"*\"]', '2023-01-16 08:09:11', '2022-12-18 13:16:40', '2023-01-16 08:09:11'),
(502, 'App\\Models\\User', 244, 'MyApp', '24f9774763995e82f0efe54ea6e46d36b6a46976332848b245e2f2be387dc793', '[\"*\"]', '2023-01-16 15:46:30', '2022-12-19 08:42:18', '2023-01-16 15:46:30'),
(503, 'App\\Models\\User', 45, 'MyApp', '45b034ae65430699b051bc8b4a61cad673c7a113e18c857d189a0bebe19b02c7', '[\"*\"]', NULL, '2022-12-20 18:47:19', '2022-12-20 18:47:19'),
(504, 'App\\Models\\User', 375, 'MyApp', '436c457df10181137701d296ed8f9e0018a0b1676e523110e8dbb836b41d0467', '[\"*\"]', '2023-01-16 16:09:04', '2022-12-25 07:59:37', '2023-01-16 16:09:04'),
(506, 'App\\Models\\User', 27, 'MyApp', '52cb8281a2f636cf59ccb6837717f85f74dcfec19349017b3120398a999f282a', '[\"*\"]', '2022-12-26 08:02:11', '2022-12-26 05:08:21', '2022-12-26 08:02:11'),
(510, 'App\\Models\\User', 157, 'MyApp', '1be8b2fbfb07c8d44ac9f16da15cee72ebd4cab5d03249324af3fc2bf92b1feb', '[\"*\"]', NULL, '2022-12-26 06:21:27', '2022-12-26 06:21:27'),
(511, 'App\\Models\\User', 157, 'MyApp', '0b62978a06cd1472a93742b4377688c91ca020e4591672f709f4499cbd157d25', '[\"*\"]', NULL, '2022-12-26 06:21:43', '2022-12-26 06:21:43'),
(512, 'App\\Models\\User', 157, 'MyApp', '962d6ceb42a212b17e86fc75b51ea4bbe867854ad7a9564870889c66b7347809', '[\"*\"]', NULL, '2022-12-26 06:22:14', '2022-12-26 06:22:14'),
(515, 'App\\Models\\User', 361, 'MyApp', '99703ff8b8944ba95d92697a7cebca92fdc532a05c3565b4de3e2be22846cdb5', '[\"*\"]', '2023-01-16 08:17:15', '2022-12-27 15:34:28', '2023-01-16 08:17:15'),
(518, 'App\\Models\\User', 70, 'MyApp', '9c3d94b2825ff3cdf2db7d9e86cdbed3231967b78c7ebc73d06e3c8d5d171cb2', '[\"*\"]', '2023-01-03 09:57:23', '2022-12-28 13:32:32', '2023-01-03 09:57:23'),
(519, 'App\\Models\\User', 242, 'MyApp', '940bbf36d6160491434663670a529ac9eb3e0486b998a87b04101b10f4a84429', '[\"*\"]', '2023-01-03 17:38:00', '2022-12-28 13:36:10', '2023-01-03 17:38:00'),
(520, 'App\\Models\\User', 42, 'MyApp', '7485439733e2409c641e9aca24466b11d511f3b25760d3207a8f83839278ec1c', '[\"*\"]', '2023-01-04 15:21:32', '2022-12-28 13:39:21', '2023-01-04 15:21:32'),
(521, 'App\\Models\\User', 51, 'MyApp', '02e3e629ae4ffcd5c9409ffc4d4b3d773290c256a9067e0e5204a9d404da003d', '[\"*\"]', '2023-01-03 09:05:16', '2022-12-28 13:40:56', '2023-01-03 09:05:16'),
(522, 'App\\Models\\User', 56, 'MyApp', '621eb4a7dcebf420f16236e07019c89186b3ca7c640f9f0b4d9f3ab7d8aefb35', '[\"*\"]', '2023-01-03 11:40:13', '2022-12-28 14:00:04', '2023-01-03 11:40:13'),
(526, 'App\\Models\\User', 219, 'MyApp', '29258805b4137b33b43f16e8b9ccb7ee552b24c9d74f7470c8942f6026b6cf16', '[\"*\"]', '2023-01-03 21:02:55', '2022-12-28 14:11:04', '2023-01-03 21:02:55'),
(527, 'App\\Models\\User', 62, 'MyApp', '7d2027c308818b8fccf4c6ef71e9528a58c17a0f51d48f497490e760e2f8720c', '[\"*\"]', '2023-01-06 14:55:44', '2022-12-28 14:20:28', '2023-01-06 14:55:44'),
(528, 'App\\Models\\User', 228, 'MyApp', '0ffc2601e394efd875c8f9722264e99559a884e09e664a7bdf7b8b600c0c8c5c', '[\"*\"]', '2023-01-03 11:53:22', '2022-12-28 14:43:09', '2023-01-03 11:53:22'),
(531, 'App\\Models\\User', 53, 'MyApp', 'e462e7e8fcb931887d45e39633d39082127096eb1302605dfa8218e693f3de9c', '[\"*\"]', '2023-01-11 13:05:37', '2022-12-29 07:45:22', '2023-01-11 13:05:37'),
(532, 'App\\Models\\User', 221, 'MyApp', 'dbe11e699900e856198c2246e4e7ae639400a98c20c0bacacc44ef3261ebdc94', '[\"*\"]', '2023-01-04 01:04:26', '2022-12-29 08:04:41', '2023-01-04 01:04:26'),
(533, 'App\\Models\\User', 373, 'MyApp', 'c2ed99b8780acc6722084440ec994f321d60d0916df5cf6adc31b74b74cb9907', '[\"*\"]', '2023-01-02 18:48:02', '2022-12-29 08:22:11', '2023-01-02 18:48:02'),
(534, 'App\\Models\\User', 60, 'MyApp', '255bd983040501330bdfc4df3266b7ce953eef8a9194327f06ca3b5086a0400e', '[\"*\"]', '2023-01-11 19:30:48', '2022-12-29 08:57:10', '2023-01-11 19:30:48'),
(535, 'App\\Models\\User', 517, 'MyApp', 'c41d8d0f451b07a58ea2018ddb9f00c25d3d2a8d8d9203d4e43393b0919e4a05', '[\"*\"]', '2022-12-29 16:58:30', '2022-12-29 09:30:19', '2022-12-29 16:58:30'),
(536, 'App\\Models\\User', 587, 'MyApp', 'ecf82ac7ec5a7867c2cf2344050bff83f9d8665f2ea11f38d07d7216803eb277', '[\"*\"]', '2023-01-16 16:24:27', '2022-12-29 12:55:22', '2023-01-16 16:24:27'),
(546, 'App\\Models\\User', 49, 'MyApp', 'f69463fb78e88c230c6e68d8ca32af1ed133413e94cea874370bb7c988b5d92e', '[\"*\"]', '2023-01-03 16:56:13', '2023-01-02 07:28:02', '2023-01-03 16:56:13'),
(552, 'App\\Models\\User', 45, 'MyApp', 'a8bc3999a005f5cd40ecc07c94c2f665f9131b7ea0596fb2e36a798081da9cd4', '[\"*\"]', '2023-01-03 10:20:15', '2023-01-03 07:59:46', '2023-01-03 10:20:15'),
(553, 'App\\Models\\User', 46, 'MyApp', 'dc684c093b7ad291acc2def85c9c12a4fbc7b166ae4b89384c518647320326c8', '[\"*\"]', '2023-01-03 10:14:25', '2023-01-03 08:13:19', '2023-01-03 10:14:25'),
(554, 'App\\Models\\User', 46, 'MyApp', '14b23760bc818c2ec0bdba8a1ef8ec569dff7c3dedff2b468b8fc53146e01f79', '[\"*\"]', '2023-01-03 22:16:16', '2023-01-03 08:16:52', '2023-01-03 22:16:16'),
(555, 'App\\Models\\User', 45, 'MyApp', '3d6e01e0472ed1e24349ab4e5be45c9c04e3857706594bcc3bc48bd5cb565f01', '[\"*\"]', '2023-01-03 10:58:51', '2023-01-03 08:32:29', '2023-01-03 10:58:51'),
(556, 'App\\Models\\User', 45, 'MyApp', '049785b77ea231b2bed60264ea435476a35cf0ac9100bf2da6326ede6e34f30f', '[\"*\"]', '2023-01-03 13:18:11', '2023-01-03 08:37:09', '2023-01-03 13:18:11'),
(557, 'App\\Models\\User', 45, 'MyApp', 'f3ab34a3df6f46cafb42f3bba6b41ab7e11be1282fc3a46de9a942f9cde4faca', '[\"*\"]', '2023-01-03 11:02:53', '2023-01-03 09:01:36', '2023-01-03 11:02:53'),
(559, 'App\\Models\\User', 45, 'MyApp', 'bf89acdb25848ab2194380bcb9f694f453437cc77cd6350e53ab4573128240aa', '[\"*\"]', '2023-01-03 14:32:02', '2023-01-03 11:50:37', '2023-01-03 14:32:02'),
(561, 'App\\Models\\User', 45, 'MyApp', '81e590eadf7a5e76d4171d809de75da1a20e80c096036e668e617d0e59b393a3', '[\"*\"]', '2023-01-03 14:12:09', '2023-01-03 12:09:51', '2023-01-03 14:12:09'),
(562, 'App\\Models\\User', 45, 'MyApp', 'c8b41fada998cbacd92fc3501ef858644b68650828088a5bf11b2bfd7ff0ff25', '[\"*\"]', '2023-01-03 15:37:56', '2023-01-03 12:42:53', '2023-01-03 15:37:56'),
(563, 'App\\Models\\User', 45, 'MyApp', '0bb83844a3e8d14b64314a474a1bc9130dbd928336e90ec409df513330857fe0', '[\"*\"]', '2023-01-03 15:41:20', '2023-01-03 13:38:58', '2023-01-03 15:41:20'),
(565, 'App\\Models\\User', 45, 'MyApp', '00cbae65d6f430d77faeceb1d11a6b77cbaaaad8d039fb425889eb7322fdd7fe', '[\"*\"]', '2023-01-03 15:50:43', '2023-01-03 13:42:33', '2023-01-03 15:50:43'),
(566, 'App\\Models\\User', 45, 'MyApp', '3277b5dd81e2712f2c9310f52cd8dcb534be90fff3542b39a1fae0ff8c1d392c', '[\"*\"]', '2023-01-03 15:51:42', '2023-01-03 13:51:40', '2023-01-03 15:51:42'),
(580, 'App\\Models\\User', 27, 'MyApp', 'b717721075ec078141fcc2c2b01eb763b1fe5d6139e1bd0bce071a80fb4dbac0', '[\"*\"]', '2023-01-10 15:58:19', '2023-01-09 14:19:12', '2023-01-10 15:58:19'),
(583, 'App\\Models\\User', 28, 'MyApp', '04bcdaa025bbc68b03052c6edbb0117d7d42c49620206cfe461d80ee2502eca5', '[\"*\"]', '2023-01-11 07:20:19', '2023-01-11 05:20:16', '2023-01-11 07:20:19'),
(586, 'App\\Models\\User', 28, 'MyApp', 'b5cf0653ea96e0df5046629656c567e6e6ba22596174109a74a8617b6633a067', '[\"*\"]', '2023-01-15 15:56:38', '2023-01-12 05:17:15', '2023-01-15 15:56:38'),
(587, 'App\\Models\\User', 45, 'MyApp', '7a450493928213719c147cb687d7d6d10b64cfa727b367245acd3a4b0ba8d0d0', '[\"*\"]', '2023-01-13 01:35:13', '2023-01-12 11:43:06', '2023-01-13 01:35:13'),
(588, 'App\\Models\\User', 154, 'MyApp', '7e776c90ba5a12cd00392ff9a9fec48be6bcd24f6dd24de4bc4981c60ffbaead', '[\"*\"]', NULL, '2023-01-12 13:57:14', '2023-01-12 13:57:14'),
(589, 'App\\Models\\User', 154, 'MyApp', '72ac9b4521de87964f8d793f2b04bfdfaf1d8637d8bb8015d67133a6c592a939', '[\"*\"]', NULL, '2023-01-12 13:57:19', '2023-01-12 13:57:19'),
(590, 'App\\Models\\User', 28, 'MyApp', 'df48ab4164cb3898deb2841c9426494fead5745d2b76e9a48dc86d11326d056e', '[\"*\"]', '2023-01-15 10:48:56', '2023-01-15 08:35:30', '2023-01-15 10:48:56'),
(591, 'App\\Models\\User', 47, 'MyApp', '6443666e4175d8468ab974e68740379359e2f9f14598169f4c15c54dc31eaa4d', '[\"*\"]', NULL, '2023-01-18 15:38:24', '2023-01-18 15:38:24'),
(592, 'App\\Models\\User', 47, 'MyApp', '5295bb8ce8fe7c0e247e86dc03918bafd27986982cb12f12011bb9d3b8813240', '[\"*\"]', '2023-01-22 11:17:15', '2023-01-18 16:26:33', '2023-01-22 11:17:15'),
(593, 'App\\Models\\User', 47, 'MyApp', '18e27d3e3bd3888ce2998b819d00f9c198cb09f26d3183e3fc5b128e40a08310', '[\"*\"]', '2023-02-17 11:31:03', '2023-01-19 09:42:58', '2023-02-17 11:31:03'),
(594, 'App\\Models\\User', 47, 'MyApp', '0a0dc9202911f3bb741d7f9ee7cf05977379aa80f9f39096c72122eb25c6f7f4', '[\"*\"]', '2023-01-23 15:17:14', '2023-01-23 13:00:26', '2023-01-23 15:17:14'),
(595, 'App\\Models\\User', 47, 'MyApp', 'faf0046bacc72f0062973bc98b74f69ccd43e8b37dea8c2ac86828b6ba4f2ed0', '[\"*\"]', '2023-02-06 14:39:13', '2023-01-24 13:02:15', '2023-02-06 14:39:13'),
(597, 'App\\Models\\User', 45, 'MyApp', '6f8394eb3f2767e82479f308bdff5818168560b06fa2b561b64de5e047aaeb29', '[\"*\"]', '2023-01-29 10:23:05', '2023-01-29 08:01:07', '2023-01-29 10:23:05'),
(598, 'App\\Models\\User', 47, 'MyApp', '5e4e513d677c5feffe62b5f19405b43dd525acd305acf5ce3c40665bd3005172', '[\"*\"]', NULL, '2023-01-29 08:06:18', '2023-01-29 08:06:18'),
(599, 'App\\Models\\User', 47, 'MyApp', 'a73228d7e2ca7af0c72380a01bf62146a7d5a3829085ea01bbc07c8c4f386ff6', '[\"*\"]', NULL, '2023-01-29 08:09:18', '2023-01-29 08:09:18'),
(600, 'App\\Models\\User', 53, 'MyApp', '47944af576bd3ced8bd3558719ba5529dffdce6dff8c07e32d1f4659a93cd1ec', '[\"*\"]', NULL, '2023-01-29 08:14:29', '2023-01-29 08:14:29'),
(601, 'App\\Models\\User', 45, 'MyApp', 'dbcf9020271e672a084218eb79e050cc38e15965e480cacc6282a5922bae582a', '[\"*\"]', '2023-01-29 10:29:58', '2023-01-29 08:24:32', '2023-01-29 10:29:58'),
(602, 'App\\Models\\User', 53, 'MyApp', 'a65f0009df5f9255c23c12caeba3cfc66f763f199f442d41800d7c4840c4128d', '[\"*\"]', NULL, '2023-01-29 08:39:06', '2023-01-29 08:39:06'),
(603, 'App\\Models\\User', 45, 'MyApp', '4e4846717f23e9e2f570dfa99588ab73b53a614250df17cda4a37fe99f15134e', '[\"*\"]', '2023-01-29 10:40:58', '2023-01-29 08:40:21', '2023-01-29 10:40:58'),
(604, 'App\\Models\\User', 45, 'MyApp', '84367747223b6aa090b096efd6be41f619da8dc36d5d3409db50c5c04b83e48f', '[\"*\"]', '2023-02-04 14:27:00', '2023-01-29 08:50:28', '2023-02-04 14:27:00'),
(605, 'App\\Models\\User', 45, 'MyApp', 'a7529b2eb2803eb2ef4d3c864b477fdeb697f5748311580471d3a3c8900c49ce', '[\"*\"]', '2023-01-29 16:54:56', '2023-01-29 09:08:26', '2023-01-29 16:54:56'),
(606, 'App\\Models\\User', 45, 'MyApp', 'f93ccc01d5ddb9ae3288654dd610f56f54f34f88b8f4e7293868dd7e6b417d79', '[\"*\"]', '2023-01-30 13:35:38', '2023-01-29 13:59:30', '2023-01-30 13:35:38'),
(607, 'App\\Models\\User', 45, 'MyApp', 'ca49b7bcb4834dcbe1f3c7fd07b2fdb2ff14cd37ec41f6df99501ff6bbcbf8c7', '[\"*\"]', '2023-01-30 11:48:17', '2023-01-30 08:10:42', '2023-01-30 11:48:17'),
(608, 'App\\Models\\User', 45, 'MyApp', 'ca76c8525afe5ebe5e02b87bc4b9b42edc22945e42169de49fd9d3ba5f0a0da5', '[\"*\"]', '2023-01-30 16:24:35', '2023-01-30 08:29:04', '2023-01-30 16:24:35'),
(609, 'App\\Models\\User', 53, 'MyApp', 'f9b2035f6fc4eddf55735cec7be069989163f255f24c90b44109ca21e2804e86', '[\"*\"]', '2023-01-30 13:49:43', '2023-01-30 08:38:54', '2023-01-30 13:49:43'),
(610, 'App\\Models\\User', 45, 'MyApp', 'd671e252d8f6f79035a545101ce3ec1daab7bb992bcb8c784670ae9c011b0517', '[\"*\"]', '2023-01-30 16:45:49', '2023-01-30 11:51:38', '2023-01-30 16:45:49'),
(612, 'App\\Models\\User', 45, 'MyApp', '54d9bc0be97cfe4a95dd45be5d66fc40d48b459a44ff17919514d5affebd6de5', '[\"*\"]', '2023-01-30 16:25:16', '2023-01-30 13:03:06', '2023-01-30 16:25:16'),
(613, 'App\\Models\\User', 45, 'MyApp', 'a1b9dfdf20b6695d1b81d0ac59e82864c6975cec3658cb08cab11e7a1f075280', '[\"*\"]', NULL, '2023-01-30 13:59:08', '2023-01-30 13:59:08'),
(614, 'App\\Models\\User', 45, 'MyApp', '4f9e3395cd38c6105ad9053d639c30327a24186f9f1b30daee4a527e27b8c52e', '[\"*\"]', '2023-01-31 15:26:21', '2023-01-31 07:39:54', '2023-01-31 15:26:21'),
(615, 'App\\Models\\User', 53, 'MyApp', '8e7be3c0d891f0e645954db2353723f374276af0c2fa3d8462224b740e6311d6', '[\"*\"]', '2023-02-09 14:35:34', '2023-02-02 08:37:30', '2023-02-09 14:35:34'),
(616, 'App\\Models\\User', 53, 'MyApp', 'd4cf546b06c13c33043e2831a8103181786dc9633ae96d07db594a722a2d4852', '[\"*\"]', NULL, '2023-02-06 08:31:48', '2023-02-06 08:31:48'),
(617, 'App\\Models\\User', 47, 'MyApp', 'a0b7489fa2cb6da044557523ada93bc13c516f47495899b62d292e3e5940749b', '[\"*\"]', '2023-02-06 15:05:08', '2023-02-06 12:47:58', '2023-02-06 15:05:08'),
(618, 'App\\Models\\User', 62, 'MyApp', 'f7d482ab3f5a2bc018b582477eb7c6adc08fb4db1068308b7fadb1977a0f6cbf', '[\"*\"]', '2023-02-06 17:19:11', '2023-02-06 14:38:09', '2023-02-06 17:19:11'),
(619, 'App\\Models\\User', 45, 'MyApp', '32cb1b147f70f09942608e46ca08279e07a1197a0bb090cae90c0e14f1b0928b', '[\"*\"]', '2023-02-06 16:55:21', '2023-02-06 14:44:57', '2023-02-06 16:55:21'),
(620, 'App\\Models\\User', 47, 'MyApp', 'aee6c214872f9a1945d66cc5e24399141dc8d1bffe71dfb7fd947486fd9923a4', '[\"*\"]', NULL, '2023-02-06 14:46:53', '2023-02-06 14:46:53'),
(622, 'App\\Models\\User', 47, 'MyApp', '3281e73df4567ced809c06d574ad7de08aa3aa926d7986eb5225c314c8ccb0e6', '[\"*\"]', '2023-02-07 09:11:04', '2023-02-06 15:00:10', '2023-02-07 09:11:04'),
(623, 'App\\Models\\User', 48, 'MyApp', '71fbedb1097be9da92ebf48396907f6124ff58ceb56eaebdcd0ee38a1ddeacd1', '[\"*\"]', '2023-02-13 17:17:12', '2023-02-06 16:07:59', '2023-02-13 17:17:12'),
(624, 'App\\Models\\User', 138, 'MyApp', 'ec97721f564dbc5316e3ab1a16fb44dc86086a340a7be77d0b2f2811f35d1062', '[\"*\"]', '2023-02-13 17:18:06', '2023-02-06 16:23:58', '2023-02-13 17:18:06'),
(626, 'App\\Models\\User', 62, 'MyApp', '1ae2151adf1218b551da62c7245d22204b25fb4859abfcb78b9ca7fd40e75f55', '[\"*\"]', '2023-02-12 18:57:34', '2023-02-06 17:04:54', '2023-02-12 18:57:34'),
(627, 'App\\Models\\User', 43, 'MyApp', 'd1d2273d68a3617f08ce650ab36d530a83445a79a330c6073b29e0d4aca0c9e1', '[\"*\"]', '2023-02-13 17:17:02', '2023-02-06 18:15:58', '2023-02-13 17:17:02'),
(628, 'App\\Models\\User', 55, 'MyApp', '331e4dc9bbee5c22c397fe720e23e31c2c3d3f631b61452ec007973c7e58bda4', '[\"*\"]', '2023-02-13 16:53:39', '2023-02-06 19:23:41', '2023-02-13 16:53:39'),
(629, 'App\\Models\\User', 224, 'MyApp', '3c6bee5d721cdd892507f58358472ad86a44980cd4d46da2ac19f31e1c0959a6', '[\"*\"]', '2023-02-13 17:17:58', '2023-02-06 19:47:08', '2023-02-13 17:17:58'),
(630, 'App\\Models\\User', 220, 'MyApp', '12a171d1397b3110e8df68e0a5ec57a4507b035b1fc7ace67c988802d2dd2d19', '[\"*\"]', '2023-02-13 09:58:43', '2023-02-07 05:52:52', '2023-02-13 09:58:43'),
(631, 'App\\Models\\User', 46, 'MyApp', '17a0b5222594c9d10cef247289d1d1dbcd238a11a3c9b22d05cf90a343ea0188', '[\"*\"]', '2023-02-13 17:48:45', '2023-02-07 05:54:23', '2023-02-13 17:48:45'),
(634, 'App\\Models\\User', 57, 'MyApp', '9c89e94282e834c355d1a1fae292b2492158f22f87aadff7d599dc3c02b4fe58', '[\"*\"]', '2023-02-13 17:17:14', '2023-02-07 07:16:46', '2023-02-13 17:17:14'),
(635, 'App\\Models\\User', 56, 'MyApp', '1d3343b847524c140c6cadd983ebf2fb5f48d650fa214c604d2fc38fe6288189', '[\"*\"]', '2023-02-12 17:21:54', '2023-02-07 07:30:22', '2023-02-12 17:21:54'),
(636, 'App\\Models\\User', 47, 'MyApp', 'a4c0c12bb2e7747455aa2ce7e6c783ecc7145ff67af51071ae9004f2624fc2ab', '[\"*\"]', '2023-02-07 10:29:32', '2023-02-07 08:09:30', '2023-02-07 10:29:32'),
(637, 'App\\Models\\User', 242, 'MyApp', '1c7d3230c9c15ccbd69bd2ccb4d99fb02e7d274f5cfb672caaabe36d15b0be5e', '[\"*\"]', '2023-02-13 09:39:42', '2023-02-07 08:34:51', '2023-02-13 09:39:42'),
(638, 'App\\Models\\User', 47, 'MyApp', '531e2cbb7b859fe5ce145771a2ecf4b540abc77109c365e8e06b9e0740e4d9b4', '[\"*\"]', '2023-02-07 11:18:46', '2023-02-07 08:50:54', '2023-02-07 11:18:46'),
(639, 'App\\Models\\User', 47, 'MyApp', 'de72ec1e0cac118a70446809b530f0fb07fba431e8d7c4842f59b6b9c71d5cbb', '[\"*\"]', '2023-02-07 11:13:26', '2023-02-07 09:13:03', '2023-02-07 11:13:26'),
(640, 'App\\Models\\User', 47, 'MyApp', '3f04e23db096e9ede331cc9a19c54e29aad030e2c45d5082182b87bf5934fda4', '[\"*\"]', '2023-02-07 13:10:47', '2023-02-07 11:08:28', '2023-02-07 13:10:47'),
(641, 'App\\Models\\User', 47, 'MyApp', '37a7db2c035981c6c45a1fd8d4549b87ce1523eb907dffec17e9661d7512b181', '[\"*\"]', '2023-02-07 16:16:05', '2023-02-07 14:15:37', '2023-02-07 16:16:05'),
(642, 'App\\Models\\User', 47, 'MyApp', '68df64d451a9ff72557b4b06193c87ca08d8c15553bd78f3c3936c237a2cb244', '[\"*\"]', '2023-02-08 15:43:45', '2023-02-07 15:00:42', '2023-02-08 15:43:45'),
(643, 'App\\Models\\User', 42, 'MyApp', '9d9aac472d4d3cd19745bba01db86935d390379ce73455082f9d7674bb37f048', '[\"*\"]', '2023-02-14 17:00:50', '2023-02-07 15:20:24', '2023-02-14 17:00:50'),
(644, 'App\\Models\\User', 47, 'MyApp', 'fae9fae85402aeec7f00f6343e382cdd54f9db3586ad33da906efb37790529af', '[\"*\"]', '2023-02-08 10:12:32', '2023-02-08 08:12:24', '2023-02-08 10:12:32'),
(645, 'App\\Models\\User', 47, 'MyApp', 'e5240878f596c95c744595f5b11345090f97825670e54a5496b4669a7395ff46', '[\"*\"]', '2023-02-08 11:23:45', '2023-02-08 09:23:21', '2023-02-08 11:23:45'),
(646, 'App\\Models\\User', 47, 'MyApp', 'bef4d852ba552fce584a7d4d03458be8f0bcf11a461968d0d8387db05d3d44eb', '[\"*\"]', '2023-02-08 11:30:02', '2023-02-08 09:29:11', '2023-02-08 11:30:02'),
(647, 'App\\Models\\User', 47, 'MyApp', 'a0ca011009655770a1543ed1f3ad7de434dca6d54575a3262f25304a43aa2372', '[\"*\"]', '2023-02-08 11:34:18', '2023-02-08 09:33:02', '2023-02-08 11:34:18'),
(649, 'App\\Models\\User', 47, 'MyApp', '0271eca6c7e07e409107fba319b40a1ed3b8ea3c7b76db9192c4c4e522923f39', '[\"*\"]', '2023-02-08 17:08:27', '2023-02-08 15:07:22', '2023-02-08 17:08:27'),
(650, 'App\\Models\\User', 44, 'MyApp', '2b10dcbd957538157146817fe2d6af00b7a53bae768f442190817e08a60d6da2', '[\"*\"]', '2023-02-09 10:13:21', '2023-02-08 15:26:56', '2023-02-09 10:13:21'),
(651, 'App\\Models\\User', 41, 'MyApp', '8bf90460423e837ee342df7dfa2f287f5fb4066725ad4d1a50a596ef7c19a536', '[\"*\"]', '2023-02-13 17:17:27', '2023-02-08 15:33:45', '2023-02-13 17:17:27'),
(654, 'App\\Models\\User', 45, 'MyApp', 'ab53082bffe90a13d4334d8f4d19e782619887026f8e03b931edfe9e76e6e25b', '[\"*\"]', '2023-02-09 10:15:10', '2023-02-09 07:40:03', '2023-02-09 10:15:10'),
(655, 'App\\Models\\User', 53, 'MyApp', '49bca929de58ab9c524518474c5eb1c2d4c3ba1865954178bbc13ba2431166b3', '[\"*\"]', '2023-02-09 11:50:14', '2023-02-09 08:17:10', '2023-02-09 11:50:14'),
(657, 'App\\Models\\User', 53, 'MyApp', '2bccdd6559b06a7f07b96d77a6b6a9c482ec2e148f171e90314d74fd5ce9788d', '[\"*\"]', NULL, '2023-02-09 11:15:54', '2023-02-09 11:15:54'),
(658, 'App\\Models\\User', 53, 'MyApp', '4db7fa5141a51f7381a3416a5d34d3c7bf0cd4fc9df94644a7a38fd5fedb9aee', '[\"*\"]', NULL, '2023-02-09 11:15:58', '2023-02-09 11:15:58'),
(659, 'App\\Models\\User', 53, 'MyApp', '66838c46cb1f7540ba377e2cc4ed2ceb94049835eefe2501ebf585c495e6b98b', '[\"*\"]', NULL, '2023-02-09 11:17:04', '2023-02-09 11:17:04'),
(660, 'App\\Models\\User', 53, 'MyApp', '3bbf33accb7614789849a74341c0dff25bbd085d85a8c812be6980015b88e52b', '[\"*\"]', NULL, '2023-02-09 11:18:23', '2023-02-09 11:18:23'),
(663, 'App\\Models\\User', 47, 'MyApp', '3f1ca26b24457c5f855742ef9ec84512d1de1a04240e3e95ef694e6947a1d935', '[\"*\"]', '2023-02-09 13:31:08', '2023-02-09 11:26:54', '2023-02-09 13:31:08'),
(664, 'App\\Models\\User', 47, 'MyApp', '0bbe300980764e5e2703c95983270f151219af838a3909e981322a6e956c546f', '[\"*\"]', '2023-02-09 13:41:07', '2023-02-09 11:40:47', '2023-02-09 13:41:07'),
(669, 'App\\Models\\User', 47, 'MyApp', '88f2d6a3a5ede9ad73078fd053fb28cfa52530abf60c420a4f7ee93b2217bb90', '[\"*\"]', '2023-02-09 13:55:59', '2023-02-09 11:55:42', '2023-02-09 13:55:59'),
(670, 'App\\Models\\User', 44, 'MyApp', '3fa59f78a43dd17dbcc22aa982c65c4bc7bef8b60b1b49d691537865016b8fc7', '[\"*\"]', '2023-02-09 13:59:56', '2023-02-09 11:59:53', '2023-02-09 13:59:56'),
(676, 'App\\Models\\User', 47, 'MyApp', 'ae6a70f154ef5de755a944cefaec5cf96500a62a15a34bb424e19aa8d2fe06e4', '[\"*\"]', '2023-02-12 11:10:55', '2023-02-09 13:26:05', '2023-02-12 11:10:55'),
(677, 'App\\Models\\User', 44, 'MyApp', 'bc37a01d29ad60b36f97b8cc17de8df5d4a7f1fdfe3c2931a9473f0986f6d647', '[\"*\"]', '2023-02-09 15:37:27', '2023-02-09 13:37:26', '2023-02-09 15:37:27'),
(678, 'App\\Models\\User', 47, 'MyApp', '676e2cb87ff0fa07043aa9b6bf94e43a1724fccd8ff89b5acd7a7bb3f215d5d2', '[\"*\"]', '2023-02-09 16:02:57', '2023-02-09 13:59:27', '2023-02-09 16:02:57'),
(679, 'App\\Models\\User', 47, 'MyApp', '9d259fa162cef855e4b830841f6ed61c1cc13456cb28612ed5478b567b83f35c', '[\"*\"]', '2023-02-12 12:03:01', '2023-02-09 14:11:26', '2023-02-12 12:03:01'),
(680, 'App\\Models\\User', 44, 'MyApp', 'fab572f66cbfda0d7c47e5f71a412209c49907c1e38862567db854829c553a7d', '[\"*\"]', '2023-02-13 17:45:33', '2023-02-09 14:42:22', '2023-02-13 17:45:33'),
(683, 'App\\Models\\User', 49, 'MyApp', 'b565878a7f941d0ede246a4604d9595477aebf0ae38a22f6018caa2d0cdf30e9', '[\"*\"]', '2023-02-13 09:09:36', '2023-02-09 15:16:12', '2023-02-13 09:09:36'),
(684, 'App\\Models\\User', 47, 'MyApp', 'bf90eb8b0ea3b9e081230ea69d07115296992248a93add75733edba882f3b3d6', '[\"*\"]', '2023-02-10 13:08:19', '2023-02-10 11:07:14', '2023-02-10 13:08:19'),
(687, 'App\\Models\\User', 47, 'MyApp', '45fa15742c2d40af88e6c8df231d4f09ead4f07a0e99f7cef6a1c96146bfe2da', '[\"*\"]', '2023-02-12 11:30:03', '2023-02-12 09:26:57', '2023-02-12 11:30:03'),
(688, 'App\\Models\\User', 47, 'MyApp', 'c611fa6958e171c4e0c11b3be1271985c4f3ec95068914cdc5fb414375d6a67a', '[\"*\"]', '2023-02-12 16:59:01', '2023-02-12 09:36:42', '2023-02-12 16:59:01'),
(689, 'App\\Models\\User', 47, 'MyApp', 'a5c827302671e628de600d5a2ca52b87e5aa6d217a4c73f7516d60e0b2b2dc7e', '[\"*\"]', '2023-02-12 11:41:19', '2023-02-12 09:40:56', '2023-02-12 11:41:19'),
(690, 'App\\Models\\User', 47, 'MyApp', 'd9e5073015c7c32178ce9ebe9c35cd055162014a513937f77f474a87f45b9faa', '[\"*\"]', '2023-02-12 14:24:06', '2023-02-12 11:21:59', '2023-02-12 14:24:06'),
(691, 'App\\Models\\User', 47, 'MyApp', 'a63b16d355822eb13cc613ba8760dbd37c5d2329d6b4182aa176134a12c94271', '[\"*\"]', '2023-02-14 10:15:22', '2023-02-12 12:51:08', '2023-02-14 10:15:22'),
(692, 'App\\Models\\User', 40, 'MyApp', '49df396c42e0962d6064865d9d313435631daae2bf7f6a991ac64069b8ee0528', '[\"*\"]', '2023-02-12 16:21:59', '2023-02-12 14:21:55', '2023-02-12 16:21:59'),
(693, 'App\\Models\\User', 47, 'MyApp', '83074941211126c84ec6fccac0954c7e801ec414380b202adf1577d980989aa1', '[\"*\"]', '2023-02-14 16:49:44', '2023-02-12 15:00:19', '2023-02-14 16:49:44'),
(695, 'App\\Models\\User', 45, 'MyApp', 'bbc105ca87785a3373da3fa0429c9fa3111ad404f0e87d696684931a83a69ae5', '[\"*\"]', '2023-02-13 10:56:21', '2023-02-13 08:56:19', '2023-02-13 10:56:21'),
(696, 'App\\Models\\User', 47, 'MyApp', 'a36ca129880760efd9ed047c7142f863d292bd5a61b3955772e1dfb645713557', '[\"*\"]', '2023-02-13 13:12:50', '2023-02-13 11:11:47', '2023-02-13 13:12:50'),
(697, 'App\\Models\\User', 47, 'MyApp', '243b15f60d6f4d6af7b50b2a923c3dede19ae4a2f9a9db79f0963bc01766d85f', '[\"*\"]', '2023-02-13 14:49:18', '2023-02-13 12:26:44', '2023-02-13 14:49:18'),
(699, 'App\\Models\\User', 49, 'MyApp', '8527df7422258991addc6d8e8813267cee81f2372ec585c843991ed696295d8a', '[\"*\"]', '2023-05-03 07:56:01', '2023-02-13 15:21:19', '2023-05-03 07:56:01'),
(700, 'App\\Models\\User', 43, 'MyApp', '02e321bcdadc2fa42cca24f414a222d5082c8aa72869368d0fccf1f5b4e5e809', '[\"*\"]', '2023-05-03 07:57:57', '2023-02-13 15:21:31', '2023-05-03 07:57:57'),
(701, 'App\\Models\\User', 138, 'MyApp', '2c736bd5c4d2b3e4fa7bda52a162d8394c75cdbd7b816e0d8b7199b5b1508797', '[\"*\"]', '2023-05-03 08:01:15', '2023-02-13 15:21:32', '2023-05-03 08:01:15'),
(702, 'App\\Models\\User', 57, 'MyApp', '0279a1c2bc5298ca2b004de5f5a611dee6258379128983c5dda9ce26e3255979', '[\"*\"]', '2023-05-03 07:56:05', '2023-02-13 15:22:00', '2023-05-03 07:56:05'),
(705, 'App\\Models\\User', 45, 'MyApp', '4c677f788c9b0ffb9fa8c23392431b77727e66f47735fcd8968da1fd339d63be', '[\"*\"]', '2023-02-13 17:25:55', '2023-02-13 15:25:48', '2023-02-13 17:25:55'),
(711, 'App\\Models\\User', 62, 'MyApp', '64da1105e34e16b941e8c0ffc969f4f7680124be4c8163308d0b7dc5e241e226', '[\"*\"]', '2023-02-13 18:02:03', '2023-02-13 16:01:09', '2023-02-13 18:02:03'),
(712, 'App\\Models\\User', 55, 'MyApp', 'a6d12286abab2c76e46ddbf294116ba6b1dc7501598340673091dba29b6f524b', '[\"*\"]', '2023-05-03 08:19:38', '2023-02-13 16:10:03', '2023-05-03 08:19:38'),
(713, 'App\\Models\\User', 222, 'MyApp', '7a3fbd8ab24a6a1111c701aa1498e9d52d5e29acc069f7a3e919816842edc764', '[\"*\"]', '2023-05-03 08:03:18', '2023-02-13 18:37:02', '2023-05-03 08:03:18'),
(714, 'App\\Models\\User', 56, 'MyApp', 'dd514543ee48febe07a2c89c3eaf9035452aeb87bee088ddf0d51bcd618ffaba', '[\"*\"]', '2023-04-11 20:42:03', '2023-02-13 18:42:13', '2023-04-11 20:42:03'),
(715, 'App\\Models\\User', 219, 'MyApp', 'b93dda53ba386ce0c9ef602acf8d90dfd877661529917147e987b0f2216006c7', '[\"*\"]', '2023-05-02 17:56:22', '2023-02-13 18:42:27', '2023-05-02 17:56:22'),
(717, 'App\\Models\\User', 47, 'MyApp', '75da77c55406619d0316db39214fc9a954a7bbf0b9fdc5c31cbd624329842f8d', '[\"*\"]', '2023-02-13 22:19:21', '2023-02-13 20:19:20', '2023-02-13 22:19:21'),
(718, 'App\\Models\\User', 51, 'MyApp', '0134d53cdffff0cf6f9d39952ff5904c701de68e701351dce8e3e08b228a6adc', '[\"*\"]', '2023-05-03 08:45:29', '2023-02-13 21:24:09', '2023-05-03 08:45:29'),
(719, 'App\\Models\\User', 225, 'MyApp', '043260b128c1e157ebe94efc218d41c046ca1ad1722b840b0205acf67e56bab1', '[\"*\"]', '2023-04-10 16:04:18', '2023-02-13 21:24:17', '2023-04-10 16:04:18'),
(723, 'App\\Models\\User', 228, 'MyApp', '1bef3deca4bb5e50c3250753ba6f442f69ff03194f160ab448bcde9d900af314', '[\"*\"]', '2023-03-08 10:43:10', '2023-02-13 21:48:47', '2023-03-08 10:43:10'),
(724, 'App\\Models\\User', 221, 'MyApp', 'cb23a67c19542a923d89cddbe3264863a2bad20a3c21ff5c1badf3ab13dce81f', '[\"*\"]', '2023-03-01 09:33:44', '2023-02-13 21:48:51', '2023-03-01 09:33:44'),
(725, 'App\\Models\\User', 41, 'MyApp', '0b58f9a91a9cfedcbc895038623984d7a7809d693a2021af73916d53df1e05b4', '[\"*\"]', '2023-02-19 14:19:57', '2023-02-13 23:02:53', '2023-02-19 14:19:57'),
(727, 'App\\Models\\User', 62, 'MyApp', '53ceda57ececc238dc58fb5f6749ac61b5593110f1af38716895f769cf630d02', '[\"*\"]', '2023-02-14 16:57:47', '2023-02-14 07:10:24', '2023-02-14 16:57:47'),
(728, 'App\\Models\\User', 54, 'MyApp', 'cbc88e4c9810837a6e02160d43cfdc0f5a4a8eb98a6750eeffbe2a3d641a075b', '[\"*\"]', '2023-03-30 10:07:16', '2023-02-14 07:11:01', '2023-03-30 10:07:16'),
(729, 'App\\Models\\User', 242, 'MyApp', '2a8089ff1d4e399dfce4de9d528542c9b4d163fd313b305c2b2be0a61763d432', '[\"*\"]', '2023-04-12 18:00:57', '2023-02-14 07:28:57', '2023-04-12 18:00:57'),
(735, 'App\\Models\\User', 47, 'MyApp', '01e1dbb51f3817c2b85476204c4a1df25b91380c037aa93aa852ba316bf04106', '[\"*\"]', NULL, '2023-02-14 09:31:01', '2023-02-14 09:31:01'),
(736, 'App\\Models\\User', 45, 'MyApp', 'd903c910d09f7875530f005d3057091e1df832f03b06f082917b7ba57961382f', '[\"*\"]', '2023-02-14 11:45:11', '2023-02-14 09:45:09', '2023-02-14 11:45:11'),
(737, 'App\\Models\\User', 614, 'MyApp', '6c474219f2f28ddc4bdf24e3ce98f15d7a5d220c6bf5d7d324f6584e7bd7e262', '[\"*\"]', NULL, '2023-02-14 12:43:20', '2023-02-14 12:43:20'),
(739, 'App\\Models\\User', 614, 'MyApp', 'ae1c4ea8855ce12d07c314d4fcb2e43d9fff25c31eeceb5c829a8f12a627b318', '[\"*\"]', '2023-04-06 00:06:43', '2023-02-14 12:50:47', '2023-04-06 00:06:43'),
(740, 'App\\Models\\User', 614, 'MyApp', 'f5ae6198c151fcc750a2739db60fa0b26216927845a56d0ff55fc8db885e98c0', '[\"*\"]', NULL, '2023-02-14 13:58:10', '2023-02-14 13:58:10'),
(741, 'App\\Models\\User', 614, 'MyApp', '6791eae332931582d7bb2a65f9bff302981441aced5c2c89ab644a27744fc974', '[\"*\"]', NULL, '2023-02-14 14:00:20', '2023-02-14 14:00:20'),
(742, 'App\\Models\\User', 47, 'MyApp', '6171afa266792fc330921f14c69cc6b5810d23657e780e1340512bfb449653e6', '[\"*\"]', '2023-02-15 09:34:50', '2023-02-14 14:11:32', '2023-02-15 09:34:50'),
(743, 'App\\Models\\User', 614, 'MyApp', '84dcd75810d6efee317eb735a199f40611dd4a5d7cfd25e7362624e6a1f7709b', '[\"*\"]', '2023-04-22 06:33:59', '2023-02-14 14:15:15', '2023-04-22 06:33:59'),
(744, 'App\\Models\\User', 614, 'MyApp', '1b3f70e53abfdba20bc9f12476b2a870fff47fac2b7f3d2f78768d3584b026db', '[\"*\"]', NULL, '2023-02-14 14:19:00', '2023-02-14 14:19:00'),
(745, 'App\\Models\\User', 42, 'MyApp', '193c650b895353e442e719e665fe7d85708bd0e1432cc92219147e82d3542f97', '[\"*\"]', '2023-05-03 14:55:13', '2023-02-14 14:22:04', '2023-05-03 14:55:13'),
(747, 'App\\Models\\User', 614, 'MyApp', 'e59a43c27acec85d3d075d140e75e4396c582762f3c8de45a2ca40333b220d9f', '[\"*\"]', NULL, '2023-02-14 14:49:50', '2023-02-14 14:49:50'),
(748, 'App\\Models\\User', 614, 'MyApp', 'a5df5b43e036e28decd37e96732c3e9642efc571cab010c2618c5684236b660b', '[\"*\"]', '2023-02-26 13:33:23', '2023-02-14 15:16:59', '2023-02-26 13:33:23'),
(750, 'App\\Models\\User', 62, 'MyApp', '7a27d69f818fc20d05eb5304da37fa961adfece1b6b5181f933be9bb1d4739b2', '[\"*\"]', '2023-05-03 08:46:34', '2023-02-14 15:24:10', '2023-05-03 08:46:34'),
(751, 'App\\Models\\User', 47, 'MyApp', 'b9da82065278b2cf194bf3cc66a1a63f6a5a190be5f1b9fa377126bfc3b7f355', '[\"*\"]', '2023-02-15 10:36:26', '2023-02-15 07:41:54', '2023-02-15 10:36:26'),
(752, 'App\\Models\\User', 47, 'MyApp', '2b5fde94fc3852164cc2e79dbe3cde809af3c8370bf6065cd284005c5c27fc77', '[\"*\"]', '2023-02-15 10:54:36', '2023-02-15 08:39:04', '2023-02-15 10:54:36'),
(753, 'App\\Models\\User', 47, 'MyApp', '6e796f665539b286d0f3cf10bee0138d428d5016bf7337c011de7d75ba67ef4b', '[\"*\"]', '2023-02-15 12:05:46', '2023-02-15 09:03:10', '2023-02-15 12:05:46'),
(754, 'App\\Models\\User', 223, 'MyApp', 'de579e75d65e3efc14168d59e62e2de95fa9f50f49efbc24ecf182161d5f105b', '[\"*\"]', '2023-03-15 16:07:22', '2023-02-15 09:27:47', '2023-03-15 16:07:22'),
(755, 'App\\Models\\User', 614, 'MyApp', '7f2eac35ac5227dfc0924985698b39c823d4bd66a67dc6e88305c032f5ac5bee', '[\"*\"]', NULL, '2023-02-15 09:39:19', '2023-02-15 09:39:19'),
(756, 'App\\Models\\User', 53, 'MyApp', '70598362656ec47d6b006b80a71fa17c12a8df78e6d13e7356a6577cc96bd801', '[\"*\"]', '2023-02-15 12:03:58', '2023-02-15 09:39:26', '2023-02-15 12:03:58'),
(757, 'App\\Models\\User', 47, 'MyApp', 'ada34d80867d292fe57d815a7aa0fdef5043ba030f6a678c454e8ef9b476725b', '[\"*\"]', NULL, '2023-02-15 10:04:30', '2023-02-15 10:04:30'),
(758, 'App\\Models\\User', 47, 'MyApp', '3d28d0a20f89eb9248563fb2bafb900e6610f5b19c7e5ff8b74a12b3f5520ef6', '[\"*\"]', '2023-02-15 12:05:02', '2023-02-15 10:04:33', '2023-02-15 12:05:02'),
(759, 'App\\Models\\User', 47, 'MyApp', '25a8658fef5eadefeebd5295a128dd05651ecf3d65d744d7edba753b4faa1305', '[\"*\"]', '2023-02-15 13:14:50', '2023-02-15 10:31:08', '2023-02-15 13:14:50'),
(760, 'App\\Models\\User', 47, 'MyApp', '3e151e6d88ff7016a83cef4bb1cfeede392eef5ec0d01f735a7b05327b2f1d7e', '[\"*\"]', '2023-02-15 16:30:41', '2023-02-15 10:58:06', '2023-02-15 16:30:41'),
(761, 'App\\Models\\User', 47, 'MyApp', '393054468c92bc758da7af8e06d1429c0813d37a9b3e225aa505b95e1e869edc', '[\"*\"]', '2023-02-15 15:06:42', '2023-02-15 11:20:19', '2023-02-15 15:06:42'),
(762, 'App\\Models\\User', 47, 'MyApp', '410d19f4905477667e0965cd08d5bce6ad209ef2e418177566e5e41a5bc0a764', '[\"*\"]', '2023-02-15 16:25:27', '2023-02-15 13:21:50', '2023-02-15 16:25:27'),
(763, 'App\\Models\\User', 47, 'MyApp', 'd7238c40d752c0b413048908ec432bd52af42b6f75652f5e8aa6cecf6c39ae1b', '[\"*\"]', '2023-02-16 09:22:53', '2023-02-15 14:39:05', '2023-02-16 09:22:53'),
(765, 'App\\Models\\User', 47, 'MyApp', 'd918569c50b4d3cd97502e6a8ae2e7faa7894bf1096cf611d076a16aafb33f39', '[\"*\"]', '2023-02-16 10:23:24', '2023-02-16 07:42:17', '2023-02-16 10:23:24'),
(766, 'App\\Models\\User', 47, 'MyApp', 'c1f6954c1c14e4b7fa92eda479bc8c384ee2e432435a7b07f9a6fbc8981ad428', '[\"*\"]', '2023-02-16 10:35:41', '2023-02-16 08:30:40', '2023-02-16 10:35:41'),
(767, 'App\\Models\\User', 53, 'MyApp', '700de6e4525dde734e53d181e5079497216f48e295d4af4edadc9188a12a0d73', '[\"*\"]', NULL, '2023-02-16 09:14:21', '2023-02-16 09:14:21'),
(769, 'App\\Models\\User', 47, 'MyApp', 'b8b5dbf661818638b3a9c42fe301021929f9dcac521acd8fe8e9915ab237e02f', '[\"*\"]', '2023-02-16 12:00:47', '2023-02-16 09:24:59', '2023-02-16 12:00:47'),
(770, 'App\\Models\\User', 47, 'MyApp', '9c83006d384a64be2a4398b0f117619726428839f1d56ac20f4f108aba43b072', '[\"*\"]', '2023-02-16 12:07:56', '2023-02-16 10:06:08', '2023-02-16 12:07:56'),
(771, 'App\\Models\\User', 47, 'MyApp', 'dc1bb90b9863be326236220eb478d8c0aa431d7e045e14e784148c534a9e3cce', '[\"*\"]', '2023-02-16 15:16:24', '2023-02-16 10:36:23', '2023-02-16 15:16:24');
INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(773, 'App\\Models\\User', 44, 'MyApp', 'dad9338b686ba2e979c0f321d07b14103ae0b5a8e9e9932a87a8a8033a832414', '[\"*\"]', '2023-02-16 15:43:54', '2023-02-16 12:03:22', '2023-02-16 15:43:54'),
(774, 'App\\Models\\User', 44, 'MyApp', 'cc44d9dd128ed9261e7f6df8e7c34bce3608357138cf5325b9d1cbb99e89e41d', '[\"*\"]', '2023-02-16 16:18:24', '2023-02-16 14:18:22', '2023-02-16 16:18:24'),
(775, 'App\\Models\\User', 44, 'MyApp', '31e2a5f924a0db55203a90ba87b90fdc8a7a30009bc46536be87086065c75cbd', '[\"*\"]', '2023-02-16 16:31:50', '2023-02-16 14:31:48', '2023-02-16 16:31:50'),
(776, 'App\\Models\\User', 44, 'MyApp', 'cf526826ce11297d3d2a01e4670d0017abe546ba89ee948d2f4d3eac53ab98e7', '[\"*\"]', '2023-02-16 16:43:49', '2023-02-16 14:36:56', '2023-02-16 16:43:49'),
(778, 'App\\Models\\User', 47, 'MyApp', '52adec4c9ef8aa9607f26618c529b63ec22ccd535424b0331d4a9c11e764a108', '[\"*\"]', '2023-02-16 17:32:46', '2023-02-16 14:53:15', '2023-02-16 17:32:46'),
(780, 'App\\Models\\User', 47, 'MyApp', 'cee55ad74748958de392307fd13ab2f53f356323f4a2776f80fb94cb8413417a', '[\"*\"]', '2023-02-17 11:37:51', '2023-02-17 09:33:14', '2023-02-17 11:37:51'),
(781, 'App\\Models\\User', 47, 'MyApp', '7324c23b0375b7f123022710ca71535ab19a9a76eb6d0af7a131f9e9b40e9d5d', '[\"*\"]', '2023-02-18 12:24:13', '2023-02-18 10:22:53', '2023-02-18 12:24:13'),
(782, 'App\\Models\\User', 47, 'MyApp', '682f65e64c6f1f4ab0ee1c868dcad77887a3b79822fd52e3644fcbc02377a51c', '[\"*\"]', '2023-02-19 09:13:44', '2023-02-18 12:59:55', '2023-02-19 09:13:44'),
(783, 'App\\Models\\User', 47, 'MyApp', '685764bdc539aa2d983a4dd987800bd75d1309b80ef39a040e691a67bb3f7897', '[\"*\"]', '2023-02-21 12:08:01', '2023-02-19 08:06:27', '2023-02-21 12:08:01'),
(784, 'App\\Models\\User', 53, 'MyApp', '0f9f32bc164a2c92e548839bd01231c70354eb233c2c0d71925da545120ecc77', '[\"*\"]', '2023-02-19 10:43:13', '2023-02-19 08:36:22', '2023-02-19 10:43:13'),
(785, 'App\\Models\\User', 53, 'MyApp', '78b6b967f4ad10d52a2ca852415c6b5a6e8125528c46c0752fc02bd5d89fa532', '[\"*\"]', '2023-02-19 11:15:13', '2023-02-19 09:08:58', '2023-02-19 11:15:13'),
(786, 'App\\Models\\User', 47, 'MyApp', 'af4d41d80078ca20c60d486f0348a8edfb502aa6ab5d868059a71f7437ec1584', '[\"*\"]', '2023-02-19 12:59:39', '2023-02-19 09:17:44', '2023-02-19 12:59:39'),
(787, 'App\\Models\\User', 53, 'MyApp', 'df8b0184cbabe02edbb278545a9394aa18cf14b323ec8102efdbc04e7c5b3df0', '[\"*\"]', NULL, '2023-02-19 10:49:35', '2023-02-19 10:49:35'),
(788, 'App\\Models\\User', 53, 'MyApp', '1b2dae2e9379327c2fc44c634d06c8575f699468eb84466d9dbb77127f54892b', '[\"*\"]', '2023-02-19 13:04:48', '2023-02-19 11:00:46', '2023-02-19 13:04:48'),
(789, 'App\\Models\\User', 53, 'MyApp', 'c98e025efadcaa622b1626a88e353b84d3c9ad80da5cdf543be3b55ea3c1c687', '[\"*\"]', '2023-02-19 14:13:35', '2023-02-19 11:04:54', '2023-02-19 14:13:35'),
(790, 'App\\Models\\User', 53, 'MyApp', '7897379e9aa109e7d8eaa279200ff821884e2a8510de90ded5a4bb40beef5194', '[\"*\"]', '2023-02-19 14:27:51', '2023-02-19 12:18:52', '2023-02-19 14:27:51'),
(791, 'App\\Models\\User', 41, 'MyApp', 'bcdb715db656017cf7d02865e9ad5f0d211dc37155c182e06ac73fdb75616573', '[\"*\"]', '2023-02-20 13:34:16', '2023-02-19 12:30:02', '2023-02-20 13:34:16'),
(792, 'App\\Models\\User', 53, 'MyApp', 'f8a3393c70928239d56b340f2a43d469641779a3c493ba9d542896ef596441bb', '[\"*\"]', '2023-02-19 15:30:43', '2023-02-19 12:43:09', '2023-02-19 15:30:43'),
(793, 'App\\Models\\User', 47, 'MyApp', '257484a567f0013b9ad1b6bd314bafe5da143de5d0320955a595dd317bba4735', '[\"*\"]', '2023-02-20 09:57:03', '2023-02-19 13:32:08', '2023-02-20 09:57:03'),
(795, 'App\\Models\\User', 47, 'MyApp', '97982ac65155cdd4a15899833946f89756ea108dccd0423486c8825247e02090', '[\"*\"]', NULL, '2023-02-20 08:41:45', '2023-02-20 08:41:45'),
(796, 'App\\Models\\User', 47, 'MyApp', 'b66a01b9b052f5e7d7f197d477a9c6e72363e4b52c9fbe86421d0e9b4038af75', '[\"*\"]', '2023-02-22 10:54:45', '2023-02-20 08:49:53', '2023-02-22 10:54:45'),
(798, 'App\\Models\\User', 47, 'MyApp', '33a028525c6fc9d9c112c0ed285773275308a6a5987ae97f65827a5de5c94538', '[\"*\"]', NULL, '2023-02-20 13:10:32', '2023-02-20 13:10:32'),
(799, 'App\\Models\\User', 47, 'MyApp', '39c692ff20aa0c5d3af190e655c3ca3b879ce29c66c1c26cefb8fb0efce56fce', '[\"*\"]', NULL, '2023-02-20 13:11:04', '2023-02-20 13:11:04'),
(800, 'App\\Models\\User', 47, 'MyApp', '877f88afd0da6a44b3cea1d9989d3c290c4cd980c598c53f3aac5a5305605680', '[\"*\"]', NULL, '2023-02-20 13:11:59', '2023-02-20 13:11:59'),
(801, 'App\\Models\\User', 47, 'MyApp', 'bc6effce5b6a7db33492799211317ba82afb388eed598691725dcbd5fcefcc80', '[\"*\"]', '2023-02-20 16:03:31', '2023-02-20 14:00:22', '2023-02-20 16:03:31'),
(802, 'App\\Models\\User', 47, 'MyApp', 'c8ab3738ee403116aaa1da9e7f9695a862936a7607ffd3f42df7ca88ceb5dc6e', '[\"*\"]', '2023-02-21 13:07:17', '2023-02-21 11:02:52', '2023-02-21 13:07:17'),
(803, 'App\\Models\\User', 47, 'MyApp', '276381e915c5e881516fcf9452f19978f91f9ad56bd08b42f47e1cb36c9bb120', '[\"*\"]', '2023-02-21 13:58:04', '2023-02-21 11:19:49', '2023-02-21 13:58:04'),
(804, 'App\\Models\\User', 47, 'MyApp', 'd65b9e5a25f97bf9f59fa0c444b34c41e57037f50b959a93d7b1192f3746d0dd', '[\"*\"]', '2023-02-21 14:14:41', '2023-02-21 12:06:22', '2023-02-21 14:14:41'),
(805, 'App\\Models\\User', 47, 'MyApp', '9ba06ace5196b8e345a7e3c9cbba81bcf7cbabce27a06e714a7092551b1bebe4', '[\"*\"]', '2023-02-21 15:29:25', '2023-02-21 12:26:39', '2023-02-21 15:29:25'),
(806, 'App\\Models\\User', 47, 'MyApp', 'e738b31190fe04cad781671530f3a455fc4b3fb93868f9f11b1f521477829176', '[\"*\"]', '2023-02-21 16:45:51', '2023-02-21 13:57:46', '2023-02-21 16:45:51'),
(807, 'App\\Models\\User', 53, 'MyApp', '385745b7a8557872326b49225d16109a7d1301b892ebecc5ed016f59766c603d', '[\"*\"]', '2023-02-21 16:47:02', '2023-02-21 14:09:46', '2023-02-21 16:47:02'),
(808, 'App\\Models\\User', 47, 'MyApp', 'afd8b2ee1f02e8c0c158d4e411e3637d7c930515436d5fc340f05f82c8172300', '[\"*\"]', '2023-02-22 11:51:41', '2023-02-21 14:53:30', '2023-02-22 11:51:41'),
(809, 'App\\Models\\User', 46, 'MyApp', '0141a65ec00b7d368f6dce62e3090354c6bc82b7df0d0f4ad261df4b1fadb540', '[\"*\"]', '2023-05-03 08:17:04', '2023-02-21 20:07:49', '2023-05-03 08:17:04'),
(811, 'App\\Models\\User', 47, 'MyApp', 'ccf2c83172fb8abc2a776e817a99a7e0e91a110ae1caa7f6f0b18be1fa215ebf', '[\"*\"]', '2023-02-22 09:42:31', '2023-02-22 07:36:52', '2023-02-22 09:42:31'),
(812, 'App\\Models\\User', 53, 'MyApp', '89d1c52d857794bcc0872cf3db62c1fed0018c45d7cae05d096293c9ee7d0d5f', '[\"*\"]', '2023-04-26 13:12:12', '2023-02-22 07:47:00', '2023-04-26 13:12:12'),
(816, 'App\\Models\\User', 47, 'MyApp', 'a3ba17f646bfaea9ebaeed6b124d91e633fd3c029e53153cc44623903003771f', '[\"*\"]', '2023-02-23 11:18:20', '2023-02-22 09:53:12', '2023-02-23 11:18:20'),
(817, 'App\\Models\\User', 47, 'MyApp', '1b2021230b98a636bb7b207c6f3cf30b32769ca744b06dd3147009dff9975e32', '[\"*\"]', '2023-02-22 18:41:42', '2023-02-22 16:38:15', '2023-02-22 18:41:42'),
(819, 'App\\Models\\User', 47, 'MyApp', '2898254779877477f5642a34433d97b3c781481ae72cb73f43f0d0f60d9eae59', '[\"*\"]', '2023-02-23 12:00:41', '2023-02-23 09:34:30', '2023-02-23 12:00:41'),
(821, 'App\\Models\\User', 614, 'MyApp', 'dd82433c34e5b98935c18a4263bc708c6bfbc33fe0a40708b234e1b42fe9a6cb', '[\"*\"]', '2023-04-01 01:10:59', '2023-02-23 13:14:10', '2023-04-01 01:10:59'),
(825, 'App\\Models\\User', 47, 'MyApp', 'a49b820e8c4a1feba72b80f5686702771479facfbab83280e823b2567c9b4111', '[\"*\"]', '2023-03-05 09:06:05', '2023-02-26 19:08:47', '2023-03-05 09:06:05'),
(830, 'App\\Models\\User', 373, 'MyApp', 'e8b87222789ae99ecc17711929a14b8f1b9b57a241e28c4c47b2c79e0b3138e8', '[\"*\"]', '2023-04-26 11:44:47', '2023-02-27 15:01:02', '2023-04-26 11:44:47'),
(838, 'App\\Models\\User', 47, 'MyApp', '4f750749eba61d2cfba0194cf453643872e2b42a10fbc8085eb36bd005bc7216', '[\"*\"]', '2023-04-13 09:18:08', '2023-03-05 14:49:12', '2023-04-13 09:18:08'),
(841, 'App\\Models\\User', 221, 'MyApp', '4b12ad3d3943d1a2f1a5f73363932c50fa82ab962be50b69b8c2074a8ccab3ca', '[\"*\"]', '2023-03-15 00:48:44', '2023-03-07 07:46:32', '2023-03-15 00:48:44'),
(843, 'App\\Models\\User', 220, 'MyApp', 'abc49c5797309cb9dbf7fb5e02359244d5a67253385995ba96825a71ffe9824e', '[\"*\"]', '2023-05-03 14:01:51', '2023-03-08 07:24:51', '2023-05-03 14:01:51'),
(845, 'App\\Models\\User', 48, 'MyApp', '234d7cb3138a7ec36d47359cb8722c183de74cbfde331e4f67fdafb7b3dcce8d', '[\"*\"]', '2023-03-29 09:17:50', '2023-03-08 07:28:12', '2023-03-29 09:17:50'),
(848, 'App\\Models\\User', 45, 'MyApp', '9ae65292499e29c6ea6da139c8a72d99b6746cb6a6742fe5fc51f5ca4f6183d7', '[\"*\"]', '2023-03-30 09:22:22', '2023-03-09 13:59:28', '2023-03-30 09:22:22'),
(851, 'App\\Models\\User', 614, 'MyApp', '09547ad7af888168121bda3aff9fd703e75adcdcdfa4c764f3ed3754136987c4', '[\"*\"]', '2023-04-18 02:47:50', '2023-03-11 16:03:49', '2023-04-18 02:47:50'),
(852, 'App\\Models\\User', 44, 'MyApp', '8a7e20efbb84260b8ab16bcb60769c092935c3a1b5854f8dd5d4eef4f74bf349', '[\"*\"]', '2023-03-21 09:42:37', '2023-03-19 15:35:48', '2023-03-21 09:42:37'),
(853, 'App\\Models\\User', 220, 'MyApp', '5d8632e99a816be0f176eda0d1121e06bcb72ec8f34451cc7cd85cb683764c7b', '[\"*\"]', '2023-05-03 08:33:12', '2023-03-20 15:04:32', '2023-05-03 08:33:12'),
(855, 'App\\Models\\User', 246, 'MyApp', 'ae52205e397f779d0b7dbc7929640e8b9be6f8ed6947c2e65ae77681a432c7a0', '[\"*\"]', '2023-04-10 05:14:07', '2023-03-20 23:38:40', '2023-04-10 05:14:07'),
(857, 'App\\Models\\User', 44, 'MyApp', '453d3ca03ed48052a790b4558ae312e950bfdccc0777368c989dfc757b23adb6', '[\"*\"]', '2023-05-03 08:03:19', '2023-03-21 15:05:55', '2023-05-03 08:03:19'),
(860, 'App\\Models\\User', 53, 'MyApp', 'f5d742050a689d2f53db3099d58af726d171a6ca6913583d70d033dd831155c5', '[\"*\"]', '2023-05-03 08:13:59', '2023-03-22 14:24:52', '2023-05-03 08:13:59'),
(861, 'App\\Models\\User', 199, 'MyApp', '9316dea850ca6948dbc14cf97b092d7e5fbc308baf4ab6121c326be276e6b4bd', '[\"*\"]', '2023-03-26 09:11:17', '2023-03-26 07:11:15', '2023-03-26 09:11:17'),
(862, 'App\\Models\\User', 617, 'MyApp', '342becdf2a0b178939f0ae41bde964d999ed54b5e44b58c0363969c85586ddfa', '[\"*\"]', '2023-03-28 14:36:25', '2023-03-28 12:36:19', '2023-03-28 14:36:25'),
(863, 'App\\Models\\User', 41, 'MyApp', 'de001828f2b35c521ebc4c0cc417105fe21c0638f54f6b5c2d4edf84486d361b', '[\"*\"]', '2023-05-03 13:47:11', '2023-03-28 12:37:15', '2023-05-03 13:47:11'),
(864, 'App\\Models\\User', 48, 'MyApp', '7034884f26baf7fe5e3f54cdad53a162ef5080a53e2b1861ca46d8751cdfc451', '[\"*\"]', '2023-03-28 17:10:30', '2023-03-28 14:57:31', '2023-03-28 17:10:30'),
(866, 'App\\Models\\User', 617, 'MyApp', '482398ce7d373409ea05db4d461e0072d6fb75af970ba85abf25e257bfa70b94', '[\"*\"]', '2023-04-03 19:07:23', '2023-03-29 08:58:11', '2023-04-03 19:07:23'),
(868, 'App\\Models\\User', 40, 'MyApp', '71d1cea493325786800c65a38ec855db8ad75bb155a0b8d0c3b19cb7fe303ea7', '[\"*\"]', '2023-05-03 08:03:27', '2023-03-29 14:12:38', '2023-05-03 08:03:27'),
(869, 'App\\Models\\User', 47, 'MyApp', '89c78a3e575385f5d5533fe3895b865253ea6ab72fac18e270e7011102f0b7ea', '[\"*\"]', '2023-04-27 17:08:35', '2023-03-30 14:32:25', '2023-04-27 17:08:35'),
(870, 'App\\Models\\User', 617, 'MyApp', '39e09ec4d071f099dcc0082f8d0ec624e8e93596031bdcb7611c1e785a06d7af', '[\"*\"]', '2023-05-03 12:08:58', '2023-04-03 17:53:26', '2023-05-03 12:08:58'),
(873, 'App\\Models\\User', 48, 'MyApp', '753bee09bb842877abeffe4cfdd395dbaf111c9c4731eb1107a9d4efce52e8df', '[\"*\"]', '2023-04-11 16:11:00', '2023-04-09 14:17:07', '2023-04-11 16:11:00'),
(874, 'App\\Models\\User', 53, 'MyApp', '102c33a8693391f2ca7efbb92dd97026f18ae9b3f070e35da16259a49cf881bb', '[\"*\"]', NULL, '2023-04-10 07:27:23', '2023-04-10 07:27:23'),
(875, 'App\\Models\\User', 225, 'MyApp', '0e7d2c024e356133e467a539190e6d845fb9bd3ed1e847aea9ad5b3618b3219a', '[\"*\"]', '2023-05-03 08:34:37', '2023-04-10 22:04:41', '2023-05-03 08:34:37'),
(876, 'App\\Models\\User', 47, 'MyApp', '5c995b471c1c916459c3f87ef3e74532835b94501d5940c38f37ac7b7a358b4d', '[\"*\"]', '2023-04-11 16:15:24', '2023-04-11 14:10:51', '2023-04-11 16:15:24'),
(877, 'App\\Models\\User', 221, 'MyApp', 'ad8f7ef9124837c76f6a5506cb74473e3da2cff70625f869bbbbc5c2decd8f36', '[\"*\"]', '2023-04-12 01:06:23', '2023-04-11 23:03:12', '2023-04-12 01:06:23'),
(878, 'App\\Models\\User', 47, 'MyApp', '3c58307c74532a430aded244c813215c6eda00e6f139f9a2dd4cf3fbc07d4ed2', '[\"*\"]', NULL, '2023-04-13 12:31:28', '2023-04-13 12:31:28'),
(879, 'App\\Models\\User', 47, 'MyApp', '042f231dea02b431ddb7a53f03a4c6c530da49c92bf2b94e7dc6a84a0c62f96b', '[\"*\"]', NULL, '2023-04-13 12:36:40', '2023-04-13 12:36:40'),
(880, 'App\\Models\\User', 47, 'MyApp', '576817367940276a00e7e8a54e17e611dadff2d2f50e4b2dc8754efd5aed198e', '[\"*\"]', NULL, '2023-04-13 12:42:26', '2023-04-13 12:42:26'),
(881, 'App\\Models\\User', 47, 'MyApp', 'ae6d0ed47ae8c8ce9c830b53f0ceb380def986dff9a405e4336a541bd1f5011b', '[\"*\"]', NULL, '2023-04-13 12:44:24', '2023-04-13 12:44:24'),
(882, 'App\\Models\\User', 47, 'MyApp', '9158c1b86aad29270a7df0b8e65a1c7aef3432a73bbc2376ffd8c5b282dc9bb6', '[\"*\"]', NULL, '2023-04-13 12:46:29', '2023-04-13 12:46:29'),
(883, 'App\\Models\\User', 47, 'MyApp', 'bd1aef88adee7472ab546d858075d988e64a4c1190c8ea9285d62821d703d766', '[\"*\"]', NULL, '2023-04-13 12:47:39', '2023-04-13 12:47:39'),
(884, 'App\\Models\\User', 47, 'MyApp', '76414b0c36acc43e0feb4a25b40303c5fee1e93d6269c398850997e3cdb0df83', '[\"*\"]', NULL, '2023-04-13 12:48:08', '2023-04-13 12:48:08'),
(885, 'App\\Models\\User', 47, 'MyApp', '178e5b580d17716a0e0d917090196ebcb40a15208d27d8fce1141482925d4f30', '[\"*\"]', '2023-04-13 21:34:10', '2023-04-13 12:49:52', '2023-04-13 21:34:10'),
(887, 'App\\Models\\User', 47, 'MyApp', '080ad694052db423fbbe4be8ffbad04d6f0c7b13c7110ffa41398c0e82f6bf95', '[\"*\"]', '2023-04-13 22:27:42', '2023-04-13 20:10:28', '2023-04-13 22:27:42'),
(888, 'App\\Models\\User', 47, 'MyApp', '1c44cc46d5f5b62026cba3b88be3aad5513a452daa7f38e142d1a31f9de05e78', '[\"*\"]', '2023-04-14 00:00:40', '2023-04-13 21:10:15', '2023-04-14 00:00:40'),
(889, 'App\\Models\\User', 47, 'MyApp', 'f1b726a214add487072f828e0a57ee0a0df2f7a28207b184051572b84d62076e', '[\"*\"]', '2023-04-16 09:06:06', '2023-04-13 22:32:56', '2023-04-16 09:06:06'),
(892, 'App\\Models\\User', 45, 'MyApp', '3ed54530a723f9edd5be3ac81b65a712a65a0c0a551840fbbb1937da814c6c84', '[\"*\"]', '2023-04-26 13:33:01', '2023-04-16 09:28:21', '2023-04-26 13:33:01'),
(893, 'App\\Models\\User', 41, 'MyApp', '209c6c5bbbe4819fe64693627e2a5a7006778ee235c0e368a10a61a64e0b1644', '[\"*\"]', '2023-04-18 15:17:35', '2023-04-18 13:10:21', '2023-04-18 15:17:35'),
(894, 'App\\Models\\User', 41, 'MyApp', '36905f2ae8d5101bffb0dda8695fb9e3bd40ce7712b0e20c6277be126e8180ce', '[\"*\"]', '2023-04-26 14:02:58', '2023-04-18 13:17:55', '2023-04-26 14:02:58'),
(895, 'App\\Models\\User', 41, 'MyApp', 'a211e9ad0358e1d960bf872ccdc0efb1d3a72affcf3ef820edd2909b9a72acb7', '[\"*\"]', NULL, '2023-04-18 13:25:46', '2023-04-18 13:25:46'),
(897, 'App\\Models\\User', 41, 'MyApp', '176eb76ad8c69574f1e2810e7b06ffa0030b71731a53122064c10416f80db466', '[\"*\"]', NULL, '2023-04-18 13:29:26', '2023-04-18 13:29:26'),
(898, 'App\\Models\\User', 41, 'MyApp', '4fb7159a5ed4bab88ce785a67b1c6db34cd3e34615558a2f0bc5773ebc970cd6', '[\"*\"]', NULL, '2023-04-18 13:29:58', '2023-04-18 13:29:58'),
(899, 'App\\Models\\User', 41, 'MyApp', '011b961cde34f746dfd3a5ec05653cedb5380b89e5bf44e80676fcbcb70a54b1', '[\"*\"]', NULL, '2023-04-18 13:30:13', '2023-04-18 13:30:13'),
(901, 'App\\Models\\User', 41, 'MyApp', '0a4375ed660d0f37414347644b93558ad105834cb9016ff76819ebab8bde2420', '[\"*\"]', NULL, '2023-04-26 08:01:57', '2023-04-26 08:01:57'),
(902, 'App\\Models\\User', 41, 'MyApp', '8d3c4718e210edfb79fa2deddd775abc8ad7cf59ca4176a6abd3c0532c761f87', '[\"*\"]', NULL, '2023-04-26 08:02:23', '2023-04-26 08:02:23'),
(903, 'App\\Models\\User', 41, 'MyApp', 'f2aaba9437fd9eb7c9dfa6b235f47dfc57365384fca58bf864db597f689559d8', '[\"*\"]', NULL, '2023-04-26 08:03:49', '2023-04-26 08:03:49'),
(904, 'App\\Models\\User', 41, 'MyApp', '57cc0edc2fd2ad31088000a5380c80e18debb6b9d55e28b4d6eda389352dffab', '[\"*\"]', NULL, '2023-04-26 08:06:03', '2023-04-26 08:06:03'),
(905, 'App\\Models\\User', 41, 'MyApp', 'e1fa8f33a305665113169881066ddfbab9f374b4f4b9c44eec143da6487319b1', '[\"*\"]', NULL, '2023-04-26 08:06:59', '2023-04-26 08:06:59'),
(906, 'App\\Models\\User', 41, 'MyApp', 'cde91ede34a9b7671bf011c57ce6648e8fd1362bb37314a5946c2bda39539956', '[\"*\"]', NULL, '2023-04-26 08:10:06', '2023-04-26 08:10:06'),
(907, 'App\\Models\\User', 41, 'MyApp', 'a18eec2c2209530e74b96f8a1545c327b12ec62e758802fddd20eca0ae72a3fa', '[\"*\"]', '2023-04-26 10:55:18', '2023-04-26 08:10:39', '2023-04-26 10:55:18'),
(908, 'App\\Models\\User', 41, 'MyApp', 'a5746955f916df8329f691363f79ee886c0e9eb984dc126a95a87ab6a8205730', '[\"*\"]', '2023-04-26 10:12:24', '2023-04-26 08:12:23', '2023-04-26 10:12:24'),
(909, 'App\\Models\\User', 41, 'MyApp', 'fe037ca64b260e9c8aa8f2e50e1668c032307ce00aefd68b79e4b1f73df82c05', '[\"*\"]', '2023-04-26 10:18:17', '2023-04-26 08:18:16', '2023-04-26 10:18:17'),
(910, 'App\\Models\\User', 41, 'MyApp', '2906369e09aeb77c792d92be09d32529cd7c26ddab83b32facd0acc94eb46c71', '[\"*\"]', '2023-04-26 10:21:32', '2023-04-26 08:21:31', '2023-04-26 10:21:32'),
(911, 'App\\Models\\User', 41, 'MyApp', 'aa2d73c362583d5cf2781d1ebf03f75a7c23141c6624d33eacd84060f5298801', '[\"*\"]', NULL, '2023-04-26 08:25:27', '2023-04-26 08:25:27'),
(912, 'App\\Models\\User', 41, 'MyApp', '69702d1361afe0ebf47e95447990e548932835aa21db8b75a3244f2815cbac5a', '[\"*\"]', '2023-04-26 10:32:06', '2023-04-26 08:32:05', '2023-04-26 10:32:06'),
(913, 'App\\Models\\User', 41, 'MyApp', '7f764ff909d83edcf9e5f45df382294742215fb3924ca4cb44e0974bf73d69fb', '[\"*\"]', '2023-04-26 10:55:38', '2023-04-26 08:55:37', '2023-04-26 10:55:38'),
(914, 'App\\Models\\User', 41, 'MyApp', '968323a35bebb1639b4963ec6a5fbdc13a88e0710bf0d86f330fad58abcfa95b', '[\"*\"]', NULL, '2023-04-26 09:04:06', '2023-04-26 09:04:06'),
(915, 'App\\Models\\User', 41, 'MyApp', '4e741e83c48670aafbcc334d9354010e6bfe02cc43ae4729200d576b214535db', '[\"*\"]', '2023-04-26 13:41:28', '2023-04-26 09:11:30', '2023-04-26 13:41:28'),
(916, 'App\\Models\\User', 41, 'MyApp', 'e5b435cb0fb31b035253eb0e0c87868c1048744e6348cd305fd9e6d9acd21961', '[\"*\"]', '2023-05-02 15:52:28', '2023-04-26 11:42:46', '2023-05-02 15:52:28'),
(917, 'App\\Models\\User', 41, 'MyApp', 'f923ecc524b511e379cea480e12a299b5b5c03edf4e8ba35ec7c2914c350f071', '[\"*\"]', NULL, '2023-04-26 12:16:41', '2023-04-26 12:16:41'),
(918, 'App\\Models\\User', 41, 'MyApp', '8b0bad71f76f4acd6d4194de38073d7b50e7338a89d73fdc0c0c25870fa6083d', '[\"*\"]', NULL, '2023-04-26 13:56:15', '2023-04-26 13:56:15'),
(919, 'App\\Models\\User', 41, 'MyApp', 'b0915cab385f9771b7531e9057eb10b6729cc8307cf08f8818b24cb213d8d512', '[\"*\"]', NULL, '2023-04-26 13:58:08', '2023-04-26 13:58:08'),
(920, 'App\\Models\\User', 41, 'MyApp', '5dc44263586618075406442de01bd23df5f3c9646fe5147aadf3d1ffc1aa2b5b', '[\"*\"]', '2023-04-26 16:56:41', '2023-04-26 14:05:22', '2023-04-26 16:56:41'),
(921, 'App\\Models\\User', 41, 'MyApp', 'fc9dc3f10f7f674b582dfa2051e5a0bfc78dd172a1065a0f1b9d71973f85e152', '[\"*\"]', '2023-04-27 11:06:28', '2023-04-27 07:41:08', '2023-04-27 11:06:28'),
(922, 'App\\Models\\User', 41, 'MyApp', 'c1a7afda797ea047b2aad6536c06e97e61f707df427935461cf15096e5651d7e', '[\"*\"]', '2023-04-27 11:51:38', '2023-04-27 09:15:07', '2023-04-27 11:51:38'),
(923, 'App\\Models\\User', 41, 'MyApp', '17bc02c477b6e53418ac07d71ff29f594df4daaf38302846aa6e9fa5d2c75003', '[\"*\"]', '2023-04-27 11:20:41', '2023-04-27 09:20:40', '2023-04-27 11:20:41'),
(924, 'App\\Models\\User', 41, 'MyApp', '944c6c452ead585c87e9b7c7b36ebd33df82ff106e67e95b068f222748f6128f', '[\"*\"]', '2023-04-30 09:06:43', '2023-04-27 11:06:33', '2023-04-30 09:06:43'),
(926, 'App\\Models\\User', 224, 'MyApp', '304d08e07dce5a6329ccc29fb36c200a23ae2f96ec667e31cfe2458109302e41', '[\"*\"]', '2023-04-30 16:34:19', '2023-04-27 15:34:06', '2023-04-30 16:34:19'),
(930, 'App\\Models\\User', 45, 'MyApp', '93857de9253b9b146d4f1b3602796db51e73f9b61248c836c43daacbb36d6f79', '[\"*\"]', '2023-05-02 17:25:17', '2023-04-30 06:31:41', '2023-05-02 17:25:17'),
(931, 'App\\Models\\User', 41, 'MyApp', 'b8997256f8102923dfa3d3b3338289ccea3bdc40122d0f537e3b3978dd6f6c0a', '[\"*\"]', NULL, '2023-04-30 08:26:36', '2023-04-30 08:26:36'),
(932, 'App\\Models\\User', 224, 'MyApp', 'b6f0d320f30432f5fcc651dbe938140cf8636e7949258302bafefda3d60e51ff', '[\"*\"]', '2023-04-30 10:27:24', '2023-04-30 08:27:01', '2023-04-30 10:27:24'),
(933, 'App\\Models\\User', 41, 'MyApp', '1d73e0d655046008b50acd4002b69df5e3bc0b09be59f5e883eba6ca4c6aa863', '[\"*\"]', '2023-05-02 14:29:26', '2023-04-30 08:27:45', '2023-05-02 14:29:26'),
(934, 'App\\Models\\User', 40, 'MyApp', '99f08a28c35fe99a05ee9832d0af612149dd5e01402100b78fbb7f996c561285', '[\"*\"]', '2023-04-30 10:33:58', '2023-04-30 08:33:57', '2023-04-30 10:33:58'),
(935, 'App\\Models\\User', 41, 'MyApp', '6af308ab7f70b1fa8d5cd33a78931860f8a812b8a9ce54ff8516f7764d9d095a', '[\"*\"]', '2023-04-30 10:47:06', '2023-04-30 08:34:21', '2023-04-30 10:47:06'),
(936, 'App\\Models\\User', 41, 'MyApp', '183443c3e98d1dd582b66555caa2f695176fec54a991dded8c2d953f3436e5ce', '[\"*\"]', '2023-04-30 13:51:32', '2023-04-30 10:20:19', '2023-04-30 13:51:32'),
(937, 'App\\Models\\User', 41, 'MyApp', '8ab4dc2e8699cac525ef4fd0013d18125d6afc403b98003ca2720f80b6994a13', '[\"*\"]', '2023-04-30 15:18:37', '2023-04-30 12:23:17', '2023-04-30 15:18:37'),
(938, 'App\\Models\\User', 41, 'MyApp', 'bdf0ef6617a99347aa36ceaa90dddece561904b3535b99fbf7c60d1467fa08e5', '[\"*\"]', '2023-04-30 15:44:04', '2023-04-30 13:44:01', '2023-04-30 15:44:04'),
(939, 'App\\Models\\User', 41, 'MyApp', '8a20d879545bb0e7bdf35ed7b987aae9527454dab2c8ada7c8f11adbf981eda5', '[\"*\"]', '2023-05-01 13:18:52', '2023-04-30 13:48:23', '2023-05-01 13:18:52'),
(941, 'App\\Models\\User', 48, 'MyApp', 'a02d2f2b8fe0a15aebbea4239517d7e461eb314ef7f9f664c4bfab99cd281520', '[\"*\"]', '2023-05-03 08:09:26', '2023-05-01 06:17:34', '2023-05-03 08:09:26'),
(942, 'App\\Models\\User', 41, 'MyApp', '5c50752c896080b50026ca7f21cb766e2a6e77a392cbb9e5832e83cad6378414', '[\"*\"]', '2023-05-01 14:01:40', '2023-05-01 11:24:18', '2023-05-01 14:01:40'),
(943, 'App\\Models\\User', 40, 'MyApp', '928f37a5aaabafb5bda6dbb296020727391f20c2588eebd38b55b68eb44ee097', '[\"*\"]', '2023-05-03 15:02:25', '2023-05-01 11:24:32', '2023-05-03 15:02:25'),
(944, 'App\\Models\\User', 41, 'MyApp', 'c1d616bf3bbf138f3fd276bb740358fefa6d774ec646af5d95b143195403601a', '[\"*\"]', '2023-05-02 10:44:15', '2023-05-01 12:51:59', '2023-05-02 10:44:15'),
(945, 'App\\Models\\User', 41, 'MyApp', 'd820b93f53bb186643443741755867fb9f7919bd208d2f60fb930eb12989fb6f', '[\"*\"]', '2023-05-02 15:41:56', '2023-05-02 06:52:42', '2023-05-02 15:41:56'),
(946, 'App\\Models\\User', 41, 'MyApp', 'f24a7d700267c90e74b08f7ac978796bc90a4a51b7c742295284952601dfe1a2', '[\"*\"]', NULL, '2023-05-02 08:08:30', '2023-05-02 08:08:30'),
(947, 'App\\Models\\User', 41, 'MyApp', 'a3481255efd5991a98bc84ff85624983ba2df075df96c3c10ecdca4c41156ab5', '[\"*\"]', NULL, '2023-05-02 08:11:52', '2023-05-02 08:11:52'),
(948, 'App\\Models\\User', 41, 'MyApp', '1053cfd1f67e0471bad754ed37d1488949fa4e3f03612e7fc3f21319506b55d7', '[\"*\"]', NULL, '2023-05-02 08:12:48', '2023-05-02 08:12:48'),
(949, 'App\\Models\\User', 41, 'MyApp', 'ed34b370d14083ae995fb876b0454c46d339b284b33825540290c9d4c6708b8b', '[\"*\"]', '2023-05-02 15:42:19', '2023-05-02 08:46:00', '2023-05-02 15:42:19'),
(950, 'App\\Models\\User', 41, 'MyApp', '1aedde3f218b0b06d421dce84df85494a37ffe9001e24b5291836fbbec4b3a6d', '[\"*\"]', NULL, '2023-05-02 08:47:16', '2023-05-02 08:47:16'),
(952, 'App\\Models\\User', 47, 'MyApp', '64a7727a45094bc342c31dcaf3ffb26f16ef841f9c04816ea2f65844ded1ac43', '[\"*\"]', '2023-05-03 15:02:38', '2023-05-03 06:11:20', '2023-05-03 15:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `name_ar`, `lat`, `lon`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Riyadh', 'الرياض', '24.697548', '46.675978', 22, '2022-08-11 15:38:23', '2022-08-11 15:38:23'),
(2, 'المطار', 'airport', '24.7305650', '46.6555170', 157, '2022-09-04 16:57:09', '2022-09-04 16:57:09'),
(3, 'Bobr', 'مجموعة بوبر - جدة', '21.5996626', '39.143952', 18, '2022-09-13 12:04:15', '2022-09-13 12:04:15'),
(4, 'BOBRGROUP', 'مجموعة بوبر - جده', '21.600914', '39.164228', 19, '2022-10-07 16:14:32', '2022-11-22 17:42:22'),
(5, 'BOBRGROUP', 'مجموعة بوبر - جده', '21.5424', '39.2081', 21, '2022-10-08 16:57:08', '2022-10-08 16:57:08'),
(6, 'BOBRGROUP', 'بوبر - جده', '21.602336', '39.150228', 362, '2022-10-23 09:05:10', '2022-10-23 09:05:10'),
(7, 'جدة', 'جدة', '21.472986', '39.189497', 154, '2022-11-06 21:52:27', '2022-11-06 21:52:27'),
(8, 'Headquarter', 'المقر الاداري', '27.475156', '41.809522', 68, '2022-11-10 10:39:19', '2022-11-10 10:39:19'),
(9, 'Sites', 'مواقع العمل', '27.497047', '41.699916', 68, '2022-11-10 10:41:27', '2022-11-10 10:41:27'),
(10, 'BOBRGROUP', 'بوبر - جده', '21.602385', '39.150154', 500, '2022-11-20 10:23:59', '2022-11-20 10:23:59'),
(11, 'A', 'A', '21.4873', '39.1813', 160, '2022-12-05 08:35:26', '2022-12-05 08:35:26'),
(12, 'B', 'B', '21.4873', '39.1813', 160, '2022-12-05 08:35:42', '2022-12-05 08:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `duration` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_users` int NOT NULL DEFAULT '0',
  `max_employees` int NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `duration`, `max_users`, `max_employees`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, 'unlimited', 20, 500, NULL, 'free_plan.png', '2022-02-05 22:59:41', '2022-05-15 12:25:38'),
(2, 'premium', 250.00, 'unlimited', 20, 20, 'vmvb', NULL, '2022-05-11 07:58:38', '2022-05-11 07:58:38'),
(3, 'خطة شركة خليفة', 6500.00, 'unlimited', 15, 99, NULL, NULL, '2022-08-04 12:03:19', '2022-08-04 12:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

CREATE TABLE `plan_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` int NOT NULL,
  `plan_id` int NOT NULL,
  `duration` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `designation_id` int NOT NULL,
  `promotion_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `promotion_title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `study_length` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `employee_id`, `major`, `degree`, `graduation_date`, `study_length`, `institute_name`, `location`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 'هندسة برمجيات', 'بكاريوس حاسبات ومعلومات', '2022-04-17', '5', 'كلية الحاسبات والمعلومات - جامعة المنصورة', 'مدينة المنصورة', 2, '2022-04-17 10:56:08', '2022-04-17 11:03:02'),
(3, 11, 'هندسة برمجيات', 'بكاريوس حاسبات ومعلومات', '2022-04-20', '4', 'كلية الحاسبات والمعلومات جامعة المنصورة', 'المنصورة', 2, '2022-04-20 10:23:13', '2022-04-20 10:23:13'),
(4, 5, 'تقنية معلومات', 'ماجيستير', '2018-01-01', '٢', 'الكلية الملكية البريطانية', 'لندن', 2, '2022-05-15 10:13:17', '2022-05-15 10:13:17');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint UNSIGNED NOT NULL,
  `evaluation_section_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint DEFAULT NULL,
  `evaluation_category_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'choice',
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `point` double(8,2) DEFAULT NULL COMMENT 'null if has multi select'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `evaluation_section_id`, `title`, `title_ar`, `created_by`, `evaluation_category_id`, `created_at`, `updated_at`, `type`, `parent_id`, `point`) VALUES
(1, NULL, 'test\r\ntest', 'اختبار \r\nاختبار', 19, 1, '2022-12-12 11:32:02', '2022-12-12 11:32:02', 'choice', NULL, NULL),
(2, NULL, 'Your Name:', 'الاسم :', 21, 3, '2023-01-02 10:56:45', '2023-01-02 10:56:45', 'text', NULL, NULL),
(3, NULL, 'Job title :', 'المسمى الوظيفي :', 21, 3, '2023-01-02 10:57:46', '2023-01-02 10:57:46', 'text', NULL, NULL),
(4, NULL, 'department :', 'القسم :', 21, 3, '2023-01-02 10:58:42', '2023-01-02 10:58:42', 'text', NULL, NULL),
(5, NULL, 'Do you think that your job is commensurate with your talents?', 'هل تعتقد بأن وظيفتك تتناسب مع مواهبك ؟', 21, 3, '2023-01-02 11:00:21', '2023-01-02 11:07:07', 'choice', NULL, NULL),
(6, NULL, 'Do you feel that you need to develop your skills and improve your performance?', 'هل تشعر بأنك تحتاج الى تطوير مهاراتك و تحسين أدائك ؟', 21, 3, '2023-01-02 11:01:41', '2023-01-02 11:07:33', 'choice', NULL, NULL),
(7, NULL, 'Select the types of courses that you feel you need to develop your skills?', 'حدد أنواع الدورات التي التشعر بأنك تحتاجها لتطوير مهاراتك  ؟', 21, 3, '2023-01-02 11:09:27', '2023-01-02 11:09:27', 'text', NULL, NULL),
(8, NULL, 'What is your plan to improve your work ?', 'ما هي الخطة المتبعه التي تقوم بها لتحسين عملك ؟', 21, 3, '2023-01-02 11:11:42', '2023-01-02 11:11:42', 'text', NULL, NULL),
(9, NULL, 'Were there tasks that affected positively or negatively on your performance or achievements, such as: organizational changes, work pressures, or others?', 'هل كانت هناك مهام اثرت ايجابيا او سلبيا على دائك اوانجازاتك مثل : تغيرات تنظيميه أو ضغوط عمل أو غيرها ؟', 21, 3, '2023-01-02 11:13:48', '2023-01-02 11:13:48', 'text', NULL, NULL),
(10, NULL, 'What are the achievements that have been achieved during the last period?', 'ماهي الانجازات التي تم تحقيقها خلال الفتره الماضيه ؟', 21, 3, '2023-01-02 11:17:47', '2023-01-02 11:17:47', 'text', NULL, NULL),
(11, NULL, 'fffffffffffffffff', 'ففففففففففف', 22, 1, '2023-03-16 10:56:51', '2023-03-16 10:56:51', 'choice', NULL, NULL),
(34, 16, 'this is question content 1', NULL, 22, NULL, '2023-05-01 15:31:00', '2023-05-01 15:31:00', 'multi_select', NULL, 0.00),
(35, 16, 'this is question content 2', NULL, 22, NULL, '2023-05-01 15:31:00', '2023-05-01 15:31:00', 'single_select', NULL, 0.00),
(36, 16, 'this is question content 3', NULL, 22, NULL, '2023-05-01 15:31:00', '2023-05-01 15:31:00', 'short_text', NULL, 11.00),
(38, 19, 'this is question content', NULL, 22, NULL, '2023-05-01 16:40:09', '2023-05-01 16:40:09', 'multi_select', NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `question_id` bigint UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_options`
--

INSERT INTO `question_options` (`id`, `title`, `question_id`, `point`, `created_at`, `updated_at`) VALUES
(44, 'Option 1', 34, 1.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(45, 'Option 2', 34, 2.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(46, 'Option 3', 34, 1.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(47, 'Option 1', 35, 1.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(48, 'Option 2', 35, 2.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00'),
(49, 'Option 3', 35, 3.00, '2023-05-01 15:31:00', '2023-05-01 15:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE `request_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_types`
--

INSERT INTO `request_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Sick leave request', 'طلب أجازة مرضية', 22, '2022-05-18 13:06:25', '2022-05-31 12:28:00'),
(3, 'Vacation', 'اجازة', 2, '2022-05-19 13:28:01', '2022-05-19 13:28:01'),
(5, 'Request a salary advance', 'طلب سلفة مقدمة من الراتب', 22, '2022-05-31 12:16:33', '2022-05-31 12:21:15'),
(6, 'Vacation request', 'طلب اجازة', 22, '2022-05-31 12:20:05', '2022-05-31 12:20:05'),
(7, 'طلب اذن انصراف مبكر', 'Request for early leave', 22, '2022-05-31 12:24:27', '2022-05-31 12:24:27'),
(8, 'A vacation request', 'طلب اجازة', 154, '2022-08-13 18:45:43', '2022-08-13 18:45:43'),
(9, 'ask permission', 'طلب استأذان', 154, '2022-08-13 18:46:19', '2022-08-13 18:46:19'),
(10, 'Request for early leave from work', 'طلب خروج مبكر من العمل', 154, '2022-08-13 18:47:05', '2022-08-13 18:47:05'),
(11, 'Late arrival to work', 'طلب حضور متأخر للعمل', 154, '2022-08-13 18:47:57', '2022-08-13 18:47:57'),
(12, 'Request for internal transfer', 'طلب نقل داخلي', 154, '2022-08-13 18:50:00', '2022-08-13 18:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `notice_date` date NOT NULL,
  `resignation_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resignations`
--

INSERT INTO `resignations` (`id`, `employee_id`, `notice_date`, `resignation_date`, `description`, `description_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, '0000-00-00', '0000-00-00', 'ccsc', 'cscc', 2, '2022-04-26 09:36:55', '2022-04-26 09:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'super admin', 'web', 0, '2022-02-05 22:59:38', '2022-02-05 22:59:38'),
(2, 'company', 'web', 1, '2022-02-05 22:59:38', '2022-02-05 22:59:38'),
(3, 'hr', 'web', 2, '2022-02-05 22:59:40', '2022-02-05 22:59:40'),
(4, 'employee', 'web', 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(5, 'مدير عام', 'web', 18, '2022-07-25 11:40:44', '2022-07-25 11:40:44'),
(6, 'hr', 'web', 154, '2022-11-11 20:45:53', '2022-11-11 21:04:31'),
(7, 'المدير المالي', 'web', 68, '2022-11-12 08:08:26', '2022-11-12 08:08:26'),
(8, 'محاسب عام', 'web', 68, '2022-11-12 08:09:27', '2022-11-12 08:09:27'),
(9, 'HR', 'web', 19, '2022-11-13 14:23:20', '2022-11-13 14:33:03'),
(10, 'super admin 2', 'web', 22, '2023-04-13 11:38:26', '2023-04-13 11:38:26');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(283, 10),
(284, 10),
(285, 10),
(286, 10),
(287, 10),
(288, 10),
(289, 10),
(290, 10),
(291, 10),
(292, 10),
(293, 10),
(294, 10),
(295, 10),
(296, 10),
(297, 10),
(298, 10),
(299, 10),
(300, 10),
(301, 10),
(302, 10),
(303, 10),
(304, 10),
(305, 10),
(306, 10),
(307, 10),
(308, 10),
(309, 10),
(310, 10),
(311, 10),
(312, 10),
(313, 10),
(314, 10),
(315, 10),
(316, 10),
(317, 10),
(318, 10),
(319, 10),
(320, 10),
(321, 10),
(322, 10),
(323, 10),
(324, 10),
(325, 10),
(326, 10),
(327, 10),
(328, 10),
(329, 10),
(330, 10),
(331, 10),
(332, 10),
(333, 10),
(334, 10),
(335, 10),
(336, 10),
(337, 10),
(338, 10),
(339, 10),
(340, 10),
(341, 10),
(342, 10),
(343, 10),
(344, 10),
(345, 10),
(346, 10),
(347, 10),
(348, 10),
(349, 10),
(350, 10),
(351, 10),
(352, 10),
(353, 10),
(354, 10),
(355, 10),
(356, 10),
(357, 10),
(358, 10),
(359, 10),
(360, 10),
(361, 10),
(362, 10),
(363, 10),
(364, 10),
(365, 10),
(366, 10),
(367, 10),
(368, 10),
(369, 10),
(370, 10),
(371, 10),
(372, 10),
(373, 10),
(374, 10),
(375, 10),
(376, 10),
(377, 10),
(378, 10),
(379, 10),
(380, 10),
(381, 10),
(382, 10),
(383, 10),
(384, 10),
(385, 10),
(386, 10),
(387, 10),
(388, 10),
(389, 10),
(390, 10),
(391, 10),
(392, 10),
(393, 10),
(394, 10),
(395, 10),
(396, 10),
(397, 10),
(398, 10),
(399, 10),
(400, 10),
(401, 10),
(402, 10),
(403, 10),
(404, 10),
(405, 10),
(406, 10),
(407, 10),
(408, 10),
(409, 10),
(410, 10),
(411, 10),
(412, 10),
(413, 10),
(414, 10),
(415, 10),
(416, 10),
(417, 10),
(418, 10),
(419, 10),
(420, 10),
(421, 10),
(422, 10),
(423, 10),
(424, 10),
(425, 10),
(426, 10),
(427, 10),
(428, 10),
(429, 10),
(430, 10),
(431, 10),
(432, 10),
(433, 10),
(434, 10),
(435, 10),
(436, 10),
(437, 10),
(438, 10),
(439, 10),
(440, 10),
(441, 10),
(442, 10),
(443, 10),
(444, 10),
(445, 10),
(446, 10);

-- --------------------------------------------------------

--
-- Table structure for table `salary_components_types`
--

CREATE TABLE `salary_components_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_components_types`
--

INSERT INTO `salary_components_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'annual increase', 'زيادة سنوية', 22, '2022-06-02 10:49:23', '2022-06-02 10:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `salary_settings`
--

CREATE TABLE `salary_settings` (
  `id` bigint UNSIGNED NOT NULL,
  `saudi_company_insurance_percentage` double DEFAULT NULL,
  `saudi_employee_insurance_percentage` double DEFAULT NULL,
  `Nonsaudi_company_insurance_percentage` double DEFAULT NULL,
  `Nonsaudi_employee_insurance_percentage` double DEFAULT NULL,
  `saudi_employee_medical_insurance` double DEFAULT NULL,
  `Nonsaudi_employee_medical_insurance` double DEFAULT NULL,
  `saudi_company_medical_insurance` double DEFAULT NULL,
  `Nonsaudi_company_medical_insurance` double DEFAULT NULL,
  `work_days` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_hours` int NOT NULL DEFAULT '8',
  `annual_vacations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `week_vacations` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sick_absence_discount` double(8,2) DEFAULT NULL,
  `absence_with_permission_discount` double(8,2) DEFAULT NULL,
  `absence_without_permission_discount` double(8,2) DEFAULT NULL,
  `overtime_rate` double(8,2) DEFAULT NULL,
  `payroll_calculator` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `other_currency_rate` double NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_settings`
--

INSERT INTO `salary_settings` (`id`, `saudi_company_insurance_percentage`, `saudi_employee_insurance_percentage`, `Nonsaudi_company_insurance_percentage`, `Nonsaudi_employee_insurance_percentage`, `saudi_employee_medical_insurance`, `Nonsaudi_employee_medical_insurance`, `saudi_company_medical_insurance`, `Nonsaudi_company_medical_insurance`, `work_days`, `work_hours`, `annual_vacations`, `week_vacations`, `sick_absence_discount`, `absence_with_permission_discount`, `absence_without_permission_discount`, `overtime_rate`, `payroll_calculator`, `created_by`, `created_at`, `updated_at`, `other_currency_rate`) VALUES
(1, 12, 10, 2, 0, NULL, NULL, NULL, NULL, '30', 8, '21', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 07:49:21', 1),
(2, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 22, '2022-06-07 10:44:08', '2023-02-20 16:08:57', 8.17),
(3, 0, 10, 0, 0, 0, 0, 0, 0, NULL, 8, '21', 'Friday', 0.00, 0.00, 0.00, 0.00, NULL, 68, '2022-07-17 07:23:39', '2022-11-10 12:50:48', 1),
(4, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, '21', 'Saturday,Friday', 0.00, 1.01, 0.00, 1.50, NULL, 18, '2022-07-19 16:20:02', '2022-12-20 10:35:49', 1),
(5, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, '21', 'Saturday,Friday', 0.00, 0.00, 1.01, 1.50, NULL, 19, '2022-07-20 10:15:48', '2022-12-20 17:01:03', 1),
(6, 0, 0, 10, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 20, '2022-07-20 10:26:45', '2022-07-20 10:26:45', 1),
(7, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 21, '2022-07-20 10:33:41', '2022-11-17 13:18:34', 1),
(8, 0, 0, 10, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 23, '2022-07-20 11:02:02', '2022-07-20 11:02:02', 1),
(9, 0, 0, 10, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 24, '2022-07-20 11:09:14', '2022-07-20 11:09:14', 1),
(10, 11.75, 9.75, 2, 0, 0, 0, 0, 0, NULL, 8, '21', 'Friday', 0.00, 1.00, 1.00, 0.00, NULL, 154, '2022-08-11 17:04:38', '2023-01-03 12:47:15', 1),
(11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 157, '2022-08-24 09:48:46', '2022-09-26 22:30:31', 1),
(12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 160, '2022-09-01 12:50:21', '2022-09-01 12:50:21', 1),
(13, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 163, '2022-09-11 15:31:28', '2022-09-11 15:31:28', 1),
(14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 164, '2022-09-11 17:32:31', '2022-09-11 17:32:31', 1),
(15, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 165, '2022-09-11 17:33:38', '2022-09-11 17:33:38', 1),
(16, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 166, '2022-09-11 17:35:35', '2022-09-11 17:35:35', 1),
(17, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 167, '2022-09-12 10:08:05', '2022-09-12 10:08:05', 1),
(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 168, '2022-09-12 13:27:56', '2022-09-12 13:27:56', 1),
(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 169, '2022-09-12 13:28:19', '2022-09-12 13:28:19', 1),
(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 170, '2022-09-12 13:28:29', '2022-09-12 13:28:29', 1),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 171, '2022-09-12 13:28:42', '2022-09-12 13:28:42', 1),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 172, '2022-09-12 13:29:55', '2022-09-12 13:29:55', 1),
(23, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 173, '2022-09-12 13:49:37', '2022-09-12 13:49:37', 1),
(24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 174, '2022-09-12 13:51:11', '2022-09-12 13:51:11', 1),
(25, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 175, '2022-09-12 13:52:19', '2022-09-12 13:52:19', 1),
(26, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 176, '2022-09-12 13:52:54', '2022-09-12 13:52:54', 1),
(27, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 177, '2022-09-12 14:05:32', '2022-09-12 14:05:32', 1),
(28, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 178, '2022-09-12 14:07:36', '2022-09-12 14:07:36', 1),
(29, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 179, '2022-09-12 14:09:11', '2022-09-12 14:09:11', 1),
(30, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 180, '2022-09-12 14:11:30', '2022-09-12 14:11:30', 1),
(31, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 181, '2022-09-12 14:22:11', '2022-09-12 14:22:11', 1),
(32, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 183, '2022-09-13 10:12:22', '2022-09-13 10:12:22', 1),
(33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 184, '2022-09-13 10:13:11', '2022-09-13 10:13:11', 1),
(34, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 185, '2022-09-13 10:15:14', '2022-09-13 10:15:14', 1),
(35, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 218, '2022-09-19 15:07:08', '2022-09-19 15:07:08', 1),
(36, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, '21', 'Saturday,Friday', 0.00, 0.50, 0.80, 1.50, NULL, 362, '2022-10-19 11:15:49', '2022-11-06 10:08:02', 1),
(37, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 380, '2022-11-10 11:52:38', '2022-11-10 11:52:38', 1),
(38, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 381, '2022-11-10 12:01:07', '2022-11-10 12:01:07', 1),
(39, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 385, '2022-11-10 12:29:49', '2022-11-10 12:29:49', 1),
(40, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 401, '2022-11-10 14:19:47', '2022-11-10 14:19:47', 1),
(41, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 402, '2022-11-10 14:22:38', '2022-11-10 14:22:38', 1),
(42, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 403, '2022-11-10 14:24:51', '2022-11-10 14:24:51', 1),
(43, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 404, '2022-11-10 16:11:24', '2022-11-10 16:11:24', 1),
(44, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 405, '2022-11-10 16:24:37', '2022-11-10 16:24:37', 1),
(45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 406, '2022-11-10 17:17:16', '2022-11-10 17:17:16', 1),
(46, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 407, '2022-11-10 17:19:08', '2022-11-10 17:19:08', 1),
(47, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 477, '2022-11-15 10:09:53', '2022-11-15 10:09:53', 1),
(48, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', NULL, 1.00, 0.00, 0.00, NULL, 500, '2022-11-16 09:39:33', '2022-12-25 10:37:07', 1),
(49, 0, 0, 0, 0, 0, 0, 0, 0, NULL, 9, '21', 'Saturday,Friday', NULL, 1.00, 1.00, 1.50, NULL, 501, '2022-11-16 09:40:04', '2022-11-17 13:02:34', 1),
(50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 514, '2022-11-21 23:13:47', '2022-11-21 23:13:47', 1),
(51, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 515, '2022-11-21 23:15:25', '2022-11-21 23:15:25', 1),
(52, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 519, '2022-11-28 11:10:16', '2022-11-28 11:10:16', 1),
(53, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 520, '2022-11-28 11:13:29', '2022-11-28 11:13:29', 1),
(54, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 521, '2022-11-28 15:06:27', '2022-11-28 15:06:27', 1),
(55, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 522, '2022-11-28 15:07:41', '2022-11-28 15:07:41', 1),
(56, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 523, '2022-11-28 15:09:10', '2022-11-28 15:09:10', 1),
(57, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 524, '2022-11-28 15:11:57', '2022-11-28 15:11:57', 1),
(58, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 525, '2022-11-28 15:25:31', '2022-11-28 15:25:31', 1),
(59, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 526, '2022-12-05 16:29:06', '2022-12-05 16:29:06', 1),
(60, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 528, '2022-12-06 12:57:56', '2022-12-06 12:57:56', 1),
(61, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 529, '2022-12-06 13:04:43', '2022-12-06 13:04:43', 1),
(62, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 530, '2022-12-06 13:13:56', '2022-12-06 13:13:56', 1),
(63, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 531, '2022-12-06 13:14:23', '2022-12-06 13:14:23', 1),
(64, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 532, '2022-12-06 13:14:47', '2022-12-06 13:14:47', 1),
(65, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 533, '2022-12-06 13:16:02', '2022-12-06 13:16:02', 1),
(66, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 534, '2022-12-06 13:19:36', '2022-12-06 13:19:36', 1),
(67, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 535, '2022-12-06 13:20:05', '2022-12-06 13:20:05', 1),
(68, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 572, '2022-12-08 08:24:14', '2022-12-08 08:24:14', 1),
(69, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 573, '2022-12-08 13:59:26', '2022-12-08 13:59:26', 1),
(70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 574, '2022-12-11 06:46:46', '2022-12-11 06:46:46', 1),
(71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 575, '2022-12-12 13:27:14', '2022-12-12 13:27:14', 1),
(72, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 576, '2022-12-12 14:45:57', '2022-12-12 14:45:57', 1),
(73, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 578, '2022-12-13 12:09:04', '2022-12-13 12:09:04', 1),
(74, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 579, '2022-12-13 12:14:52', '2022-12-13 12:14:52', 1),
(75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 581, '2022-12-14 12:05:22', '2022-12-14 12:05:22', 1),
(76, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 582, '2022-12-14 12:22:26', '2022-12-14 12:22:26', 1),
(77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 583, '2022-12-15 12:05:53', '2022-12-15 12:05:53', 1),
(78, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 584, '2022-12-15 12:34:52', '2022-12-15 12:34:52', 1),
(79, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 585, '2022-12-15 18:04:18', '2022-12-15 18:04:18', 1),
(80, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 586, '2022-12-15 18:07:45', '2022-12-15 18:07:45', 1),
(81, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 589, '2022-12-18 09:36:28', '2022-12-18 09:36:28', 1),
(82, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 590, '2022-12-18 09:38:13', '2022-12-18 09:38:13', 1),
(83, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 591, '2022-12-18 09:53:11', '2022-12-18 09:53:11', 1),
(84, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 592, '2022-12-18 13:04:57', '2022-12-18 13:04:57', 1),
(85, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 593, '2022-12-18 13:09:54', '2022-12-18 13:09:54', 1),
(86, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 594, '2022-12-18 13:11:12', '2022-12-18 13:11:12', 1),
(87, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 595, '2022-12-18 13:45:02', '2022-12-18 13:45:02', 1),
(88, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 596, '2022-12-18 13:47:56', '2022-12-18 13:47:56', 1),
(89, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 597, '2022-12-18 13:48:40', '2022-12-18 13:48:40', 1),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 598, '2022-12-18 13:49:56', '2022-12-18 13:49:56', 1),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 599, '2022-12-18 13:54:54', '2022-12-18 13:54:54', 1),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 600, '2022-12-18 14:19:32', '2022-12-18 14:19:32', 1),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 601, '2022-12-18 14:24:25', '2022-12-18 14:24:25', 1),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 602, '2022-12-18 14:27:08', '2022-12-18 14:27:08', 1),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 603, '2022-12-19 08:13:00', '2022-12-19 08:13:00', 1),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 604, '2022-12-19 11:37:36', '2022-12-19 11:37:36', 1),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 605, '2022-12-26 08:11:26', '2022-12-26 08:11:26', 1),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 606, '2022-12-26 09:51:24', '2022-12-26 09:51:24', 1),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 607, '2022-12-26 11:36:59', '2022-12-26 11:36:59', 1),
(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 608, '2022-12-26 11:39:08', '2022-12-26 11:39:08', 1),
(101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 609, '2022-12-26 11:45:11', '2022-12-26 11:45:11', 1),
(102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 610, '2022-12-26 11:48:02', '2022-12-26 11:48:02', 1),
(103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 611, '2022-12-26 12:03:01', '2022-12-26 12:03:01', 1),
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saturation_deductions`
--

CREATE TABLE `saturation_deductions` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `deduction_option` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date DEFAULT NULL,
  `percent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saturation_deductions`
--

INSERT INTO `saturation_deductions` (`id`, `employee_id`, `deduction_option`, `title`, `date`, `percent`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 101, 5, 'تاخيرات', '2022-06-20', NULL, 222, 22, '2022-06-20 09:42:49', '2022-07-25 16:22:51'),
(4, 91, 4, 'تاخيرات', '2022-06-20', NULL, 296, 22, '2022-06-20 09:47:55', '2022-07-25 16:22:51'),
(5, 105, 2, 'تاخيرات', '2022-06-20', NULL, 58, 22, '2022-06-20 09:49:44', '2022-07-25 16:22:51'),
(6, 99, 5, 'خصومات تاخيرات الامتحانات', '2022-06-20', NULL, 346, 22, '2022-06-20 10:06:03', '2022-07-25 16:22:51'),
(7, 103, 3, 'عمل من المنزل', '2022-07-20', NULL, 131, 22, '2022-07-20 15:19:35', '2022-07-25 16:22:51'),
(9, 99, 5, 'تاخيرات', '2022-07-20', NULL, 287, 22, '2022-07-20 16:55:24', '2022-07-25 16:22:51'),
(12, 91, 2, 'تاخير عن مواعيد العمل', '2022-08-20', NULL, 98, 22, '2022-08-23 01:16:23', '2022-08-23 01:16:23'),
(13, 94, 2, 'تاخير عن مواعيد العمل', '2022-08-20', NULL, 98, 22, '2022-08-23 01:16:59', '2022-08-29 14:56:00'),
(17, 99, 2, 'تاخير عن مواعيد العمل', '2022-08-20', NULL, 115, 22, '2022-08-23 01:21:38', '2022-08-23 01:21:38'),
(18, 117, 2, 'تاخير عن مواعيد العمل', '2022-08-20', NULL, 57, 22, '2022-08-23 01:23:30', '2022-08-23 01:23:30'),
(19, 101, 3, 'عمل من المنزل يزم 8/8', '2022-08-08', NULL, 74, 22, '2022-08-23 01:55:30', '2022-08-23 01:55:30'),
(20, 105, 3, 'عمل من المنزل يوم 1/8', '2022-08-01', NULL, 115, 22, '2022-08-23 01:59:56', '2022-08-23 01:59:56'),
(22, 202, 5, 'فرق حساب اول شهر', '2022-08-20', NULL, 789, 22, '2022-08-23 02:27:57', '2022-08-23 02:27:57'),
(25, 170, 32, 'عمل 18 يوم', '2022-08-31', NULL, 640, 68, '2022-08-31 13:38:41', '2022-08-31 13:38:41'),
(26, 204, 32, 'عمل 17', '2022-08-31', NULL, 1734, 68, '2022-08-31 13:41:32', '2022-08-31 13:41:32'),
(27, 166, 32, 'مخالفة', '2022-08-01', NULL, 200, 68, '2022-08-31 13:49:12', '2022-08-31 13:49:12'),
(28, 176, 32, 'رخصه', '2022-08-01', NULL, 500, 68, '2022-08-31 13:50:26', '2022-08-31 13:50:26'),
(29, 163, 32, 'رخصه', '2022-08-01', NULL, 500, 68, '2022-08-31 13:51:19', '2022-08-31 13:51:19'),
(30, 169, 32, 'مخالفه', '2022-08-31', NULL, 1000, 68, '2022-08-31 13:52:03', '2022-08-31 13:52:03'),
(31, 157, 32, 'مخالفه', '2022-08-31', NULL, 1000, 68, '2022-08-31 13:52:39', '2022-08-31 13:52:39'),
(32, 161, 32, 'مخالفه', '2022-08-01', NULL, 500, 68, '2022-08-31 13:53:35', '2022-08-31 13:53:35'),
(37, 103, 3, 'عمل من المنزل', '2022-10-11', '50', 145, 22, '2022-10-20 17:31:54', '2022-10-25 14:35:36'),
(38, 99, 3, 'خصم نصف يوم للتاخير عن العمل الذى تسبب فى تعطيل سير العمل', '2022-09-22', '50', 127, 22, '2022-10-20 20:33:46', '2022-10-25 14:35:18'),
(39, 91, 3, 'تأخير عن مواعيد العمل', '2022-10-01', '50', 217, 22, '2022-10-21 00:55:53', '2022-10-25 14:34:09'),
(40, 99, 3, 'تأخير عن مواعيد العمل', '2022-10-01', '50', 127, 22, '2022-10-21 01:00:10', '2022-10-25 14:38:57'),
(41, 202, 2, 'تأخير عن مواعيد العمل', '2022-10-01', '25', 108, 22, '2022-10-21 01:12:39', '2022-10-25 14:37:32'),
(42, 241, 2, 'اذن مكرر', '2022-10-11', '25', 41, 22, '2022-10-21 01:17:38', '2022-10-21 01:17:38'),
(43, 96, 2, 'تصليح اللابتوب', '2022-10-01', '76', 250, 22, '2022-10-21 01:22:01', '2022-10-21 01:22:01'),
(44, 378, 12, 'تأخير', '2022-10-19', '10%', 29, 19, '2022-10-24 10:44:32', '2022-10-24 12:27:06'),
(45, 378, 12, 'تأخير', '2022-10-24', '10%', 29, 19, '2022-10-24 10:49:46', '2022-10-24 10:49:46'),
(46, 378, 12, 'تأخير', '2022-10-25', '40%', 117, 19, '2022-10-25 16:45:44', '2022-10-25 16:45:44'),
(47, 262, 12, 'عجز', '2022-10-19', '%80', 2960, 19, '2022-10-27 12:36:07', '2022-10-30 09:26:18'),
(48, 384, 34, 'يوم', '2022-10-26', '%', 242, 362, '2022-11-06 10:05:57', '2022-11-06 10:05:57'),
(49, 390, 35, 'تامينات', '2022-11-10', '10', 2500, 68, '2022-11-10 12:09:13', '2022-11-10 12:10:16'),
(52, 446, 34, '..', '2022-11-13', '%', 2613, 362, '2022-11-14 08:45:49', '2022-11-14 08:45:49'),
(53, 496, 7, '..', '2022-10-26', '%', 242, 18, '2022-11-20 09:07:27', '2022-11-20 09:07:27'),
(54, 378, 38, 'تاخير 4 ساعات خلال الشهر', '2022-11-20', '%', 172, 19, '2022-11-20 11:08:32', '2022-11-21 12:49:30'),
(55, 510, 42, 'OTHER', '2022-11-13', '%', 2613, 500, '2022-11-20 11:55:29', '2022-11-20 11:55:29'),
(56, 495, 7, 'تأخير ساعة توتل الشهر', '2022-11-21', '%', 34, 18, '2022-11-21 09:44:58', '2022-11-21 09:44:58'),
(58, 91, 2, 'تاخير عن مواعيد العمل', '2022-11-01', '50', 217, 22, '2022-11-21 16:13:37', '2022-11-21 16:13:37'),
(59, 99, 2, 'Late', '2022-11-01', '75', 190, 22, '2022-11-21 17:22:06', '2022-11-21 17:22:06'),
(60, 114, 2, 'تأخير عن مواعيد العمل', '2022-11-21', '175', 460, 22, '2022-11-21 17:29:40', '2022-11-21 17:29:40'),
(61, 202, 5, 'عدم التوقيع فى ابلكيشن البصمة', '2022-11-01', '150', 651, 22, '2022-11-21 17:33:52', '2022-11-21 17:34:47'),
(62, 202, 2, 'تأخيرات عن مواعيد العمل', '2022-11-01', '175', 759, 22, '2022-11-21 17:35:29', '2022-11-21 17:35:29'),
(63, 243, 2, 'late', '2022-11-01', '100', 247, 22, '2022-11-21 17:45:55', '2022-11-21 17:45:55'),
(64, 259, 2, 'late', '2022-11-01', '25', 58, 22, '2022-11-21 17:47:32', '2022-11-21 17:47:32'),
(65, 246, 2, 'late', '2022-11-01', '25', 49, 22, '2022-11-21 17:49:48', '2022-11-21 17:49:48'),
(66, 26, 37, '..', '2022-11-22', '%', 1742, 19, '2022-11-22 10:23:06', '2022-11-22 10:23:27'),
(67, 378, 38, 'تأخير 5 ساعات خلال الشهر', '2022-12-14', '%', 222, 19, '2022-12-14 11:12:51', '2022-12-14 11:12:51'),
(68, 25, 38, 'تأخير 3 ساعات توتل الشهر', '2022-12-14', '%', 111, 19, '2022-12-14 11:17:57', '2022-12-14 11:17:57'),
(69, 510, 42, 'تاخير 4 ساعات خلال الشهر', '2022-12-18', '%', 67, 500, '2022-12-18 10:32:17', '2022-12-18 10:32:17'),
(70, 551, 42, 'تأخير 3 ساعات توتل الشهر', '2022-12-18', '%', 44, 500, '2022-12-18 10:44:16', '2022-12-18 10:44:16'),
(71, 496, 7, 'تاخير ساعة', '2022-12-20', '%', 28, 18, '2022-12-24 17:04:55', '2022-12-24 17:04:55'),
(72, 378, 38, 'تأخير 4 ساعات', '2022-12-25', '%', 177, 19, '2022-12-25 15:19:27', '2022-12-25 15:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'display_landing_page', 'on', 1, NULL, NULL),
(2, 'default_language', 'en', 1, NULL, NULL),
(3, 'gdpr_cookie', 'off', 1, NULL, NULL),
(4, 'disable_signup_button', 'off', 1, NULL, NULL),
(21, 'company_logo', '2_logo.png', 2, NULL, NULL),
(22, 'company_favicon', '2_favicon.png', 2, NULL, NULL),
(23, 'site_currency', 'SAR', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(24, 'site_currency_symbol', 'SAR', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(25, 'site_currency_symbol_position', 'pre', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(26, 'site_date_format', 'M j, Y', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(27, 'site_time_format', 'g:i A', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(28, 'employee_prefix', '#EMP00', 2, '2022-05-17 07:55:39', '2022-05-17 07:55:39'),
(41, 'site_currency', 'SAR', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(42, 'site_currency_symbol', 'SAR', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(43, 'site_currency_symbol_position', 'post', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(44, 'site_date_format', 'd-m-Y', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(45, 'site_time_format', 'g:i A', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(46, 'employee_prefix', '#EMP0', 22, '2022-05-17 09:27:34', '2022-05-17 09:27:34'),
(53, 'company_logo', '22_logo.png', 22, NULL, NULL),
(60, 'company_name', '', 19, NULL, NULL),
(61, 'company_address', '', 19, NULL, NULL),
(62, 'company_city', '', 19, NULL, NULL),
(63, 'company_state', '', 19, NULL, NULL),
(64, 'company_zipcode', '', 19, NULL, NULL),
(65, 'company_country', '', 19, NULL, NULL),
(66, 'company_telephone', '', 19, NULL, NULL),
(67, 'company_email', '', 19, NULL, NULL),
(68, 'company_email_from_name', '', 19, NULL, NULL),
(69, 'company_start_time', '9:00', 19, NULL, NULL),
(70, 'company_end_time', '17:00', 19, NULL, NULL),
(71, 'ip_restrict', 'off', 19, NULL, NULL),
(73, 'company_favicon', '22_favicon.png', 22, NULL, NULL),
(75, 'site_currency', 'SAR', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(76, 'site_currency_symbol', 'SAR', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(77, 'site_currency_symbol_position', 'post', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(78, 'site_date_format', 'M j, Y', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(79, 'site_time_format', 'g:i A', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(80, 'employee_prefix', '#EMP00', 18, '2022-07-20 09:43:22', '2022-07-20 09:43:22'),
(81, 'site_currency', 'sar', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(82, 'site_currency_symbol', 'SAR', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(83, 'site_currency_symbol_position', 'post', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(84, 'site_date_format', 'M j, Y', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(85, 'site_time_format', 'g:i A', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(86, 'employee_prefix', '#EMP00', 19, '2022-07-20 10:11:13', '2022-07-20 10:11:13'),
(93, 'site_currency', 'SAR', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(94, 'site_currency_symbol', 'SR', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(95, 'site_currency_symbol_position', 'pre', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(96, 'site_date_format', 'M j, Y', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(97, 'site_time_format', 'g:i A', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(98, 'employee_prefix', '#EMP00', 20, '2022-07-20 10:20:19', '2022-07-20 10:20:19'),
(99, 'site_currency', 'SAR', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(100, 'site_currency_symbol', 'SAR', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(101, 'site_currency_symbol_position', 'post', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(102, 'site_date_format', 'M j, Y', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(103, 'site_time_format', 'g:i A', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(104, 'employee_prefix', '#EMP00', 21, '2022-07-20 10:27:59', '2022-07-20 10:27:59'),
(105, 'site_currency', 'SAR', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(106, 'site_currency_symbol', 'SR', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(107, 'site_currency_symbol_position', 'pre', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(108, 'site_date_format', 'M j, Y', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(109, 'site_time_format', 'g:i A', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(110, 'employee_prefix', '#EMP00', 23, '2022-07-20 10:50:48', '2022-07-20 10:50:48'),
(111, 'site_currency', 'SAR', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(112, 'site_currency_symbol', 'SR', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(113, 'site_currency_symbol_position', 'pre', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(114, 'site_date_format', 'M j, Y', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(115, 'site_time_format', 'g:i A', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(116, 'employee_prefix', '#EMP00', 24, '2022-07-20 11:03:42', '2022-07-20 11:03:42'),
(117, 'site_currency', 'SAR', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(118, 'site_currency_symbol', 'sar', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(119, 'site_currency_symbol_position', 'pre', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(120, 'site_date_format', 'M j, Y', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(121, 'site_time_format', 'g:i A', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(122, 'employee_prefix', '#EMP00', 68, '2022-07-20 11:56:02', '2022-07-20 11:56:02'),
(123, 'company_logo', '160_logo.png', 160, NULL, NULL),
(124, 'company_favicon', '160_favicon.png', 160, NULL, NULL),
(125, 'site_currency', 'الريال السعودي', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(126, 'site_currency_symbol', 'sar', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(127, 'site_currency_symbol_position', 'pre', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(128, 'site_date_format', 'M j, Y', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(129, 'site_time_format', 'g:i A', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(130, 'employee_prefix', '#EMP00', 362, '2022-10-23 10:21:40', '2022-10-23 10:21:40'),
(131, 'company_logo', '68_logo.png', 68, NULL, NULL),
(132, 'company_favicon', '68_favicon.png', 68, NULL, NULL),
(139, 'site_currency', 'ريال', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(140, 'site_currency_symbol', 'SAR', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(141, 'site_currency_symbol_position', 'post', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(142, 'site_date_format', 'd-m-Y', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(143, 'site_time_format', 'g:i A', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(144, 'employee_prefix', '#EMP00', 154, '2022-11-06 22:06:13', '2022-11-06 22:06:13'),
(145, 'company_grace_period', '15', 19, NULL, NULL),
(146, 'company_grace_period_befor', '30', 19, NULL, NULL),
(147, 'ip_address', '[{\"value\":\"4:8c:16:25:f1:ec\"},{\"value\":\"04:8c:16:25:f1:ec\"},{\"value\":\"8a:02:71:dc:8e:22\"}]', 19, NULL, NULL),
(148, 'lat', '21.602485', 19, NULL, NULL),
(149, 'lon', '39.150190', 19, NULL, NULL),
(150, 'site_currency', 'Dollars', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(151, 'site_currency_symbol', 'sar', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(152, 'site_currency_symbol_position', 'pre', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(153, 'site_date_format', 'M j, Y', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(154, 'site_time_format', 'g:i A', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(155, 'employee_prefix', '#EMP00', 160, '2022-11-07 16:44:05', '2022-11-07 16:44:05'),
(162, 'company_favicon', '21_favicon.png', 21, NULL, NULL),
(175, 'commercial_registration_no', '0', 19, NULL, NULL),
(176, 'tax_number', '0', 19, NULL, NULL),
(177, 'company_logo', '154_logo.png', 154, NULL, NULL),
(178, 'company_favicon', '154_favicon.png', 154, NULL, NULL),
(197, 'site_currency', 'SAR', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(198, 'site_currency_symbol', 'SAR', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(199, 'site_currency_symbol_position', 'post', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(200, 'site_date_format', 'M j, Y', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(201, 'site_time_format', 'g:i A', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(202, 'employee_prefix', '#EMP00', 500, '2022-11-16 09:42:12', '2022-11-16 09:42:12'),
(203, 'site_currency', 'SAR', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(204, 'site_currency_symbol', 'SAR', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(205, 'site_currency_symbol_position', 'post', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(206, 'site_date_format', 'M j, Y', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(207, 'site_time_format', 'g:i A', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(208, 'employee_prefix', '#EMP00', 501, '2022-11-16 09:42:59', '2022-11-16 09:42:59'),
(221, 'timezone', 'Asia/Riyadh', 19, NULL, NULL),
(222, 'insurance_number', '0', 19, NULL, NULL),
(223, 'company_favicon', '19_favicon.png', 19, NULL, NULL),
(224, 'company_name', '', 22, NULL, NULL),
(225, 'company_address', '', 22, NULL, NULL),
(226, 'company_city', '', 22, NULL, NULL),
(227, 'company_state', '', 22, NULL, NULL),
(228, 'company_zipcode', '', 22, NULL, NULL),
(229, 'company_country', '', 22, NULL, NULL),
(230, 'company_telephone', '', 22, NULL, NULL),
(231, 'company_email', '', 22, NULL, NULL),
(232, 'commercial_registration_no', '0', 22, NULL, NULL),
(233, 'tax_number', '0', 22, NULL, NULL),
(234, 'insurance_number', '0', 22, NULL, NULL),
(235, 'company_email_from_name', '', 22, NULL, NULL),
(236, 'company_start_time', '09:00', 22, NULL, '2023-04-16 07:30:14'),
(237, 'company_end_time', '17:00', 22, NULL, NULL),
(238, 'company_grace_period', '57', 22, NULL, '2023-04-16 07:30:28'),
(239, 'company_grace_period_befor', '120', 22, NULL, '2023-04-16 07:29:56'),
(240, 'ip_address', 'd0:21:f9:5a:32:45,d0:21:f9:5a:32:45,d0:21:f9:5a:32:45,d0:21:f9:5a:32:45', 22, NULL, '2023-04-16 07:30:14'),
(241, 'timezone', 'Africa/Cairo', 22, NULL, NULL),
(242, 'lat', '30.069267', 22, NULL, NULL),
(243, 'lon', '31.346198', 22, NULL, NULL),
(244, 'company_name', '', 500, NULL, NULL),
(245, 'company_address', '', 500, NULL, NULL),
(246, 'company_city', '', 500, NULL, NULL),
(247, 'company_state', '', 500, NULL, NULL),
(248, 'company_zipcode', '', 500, NULL, NULL),
(249, 'company_country', '', 500, NULL, NULL),
(250, 'company_telephone', '', 500, NULL, NULL),
(251, 'company_email', '', 500, NULL, NULL),
(252, 'commercial_registration_no', '0', 500, NULL, NULL),
(253, 'tax_number', '0', 500, NULL, NULL),
(254, 'insurance_number', '0', 500, NULL, NULL),
(255, 'company_email_from_name', '', 500, NULL, NULL),
(256, 'company_start_time', '08:00', 500, NULL, NULL),
(257, 'company_end_time', '18:00', 500, NULL, NULL),
(258, 'company_grace_period', '15', 500, NULL, NULL),
(259, 'company_grace_period_befor', '30', 500, NULL, NULL),
(260, 'ip_address', '[{\"value\":\"8a:02:71:dc:8e:22\"},{\"value\":\"4:8c:16:25:f1:ec\"},{\"value\":\"04:8c:16:25:f1:ec\"}]', 500, NULL, NULL),
(261, 'timezone', 'Asia/Riyadh', 500, NULL, NULL),
(262, 'lat', '21.602498', 500, NULL, NULL),
(263, 'lon', '39.150192', 500, NULL, NULL),
(264, 'company_name', '', 18, NULL, NULL),
(265, 'company_address', '', 18, NULL, NULL),
(266, 'company_city', '', 18, NULL, NULL),
(267, 'company_state', '', 18, NULL, NULL),
(268, 'company_zipcode', '', 18, NULL, NULL),
(269, 'company_country', '', 18, NULL, NULL),
(270, 'company_telephone', '', 18, NULL, NULL),
(271, 'company_email', '', 18, NULL, NULL),
(272, 'commercial_registration_no', '0', 18, NULL, NULL),
(273, 'tax_number', '0', 18, NULL, NULL),
(274, 'insurance_number', '0', 18, NULL, NULL),
(275, 'company_email_from_name', '', 18, NULL, NULL),
(276, 'company_start_time', '08:00', 18, NULL, NULL),
(277, 'company_end_time', '18:00', 18, NULL, NULL),
(278, 'company_grace_period', '60', 18, NULL, NULL),
(279, 'company_grace_period_befor', '30', 18, NULL, NULL),
(280, 'ip_address', '[{\"value\":\"04:8c:16:25:f1:ec\"},{\"value\":\"4:8c:16:25:f1:ec\"}]', 18, NULL, NULL),
(281, 'timezone', 'Asia/Riyadh', 18, NULL, NULL),
(282, 'lat', '21.602409', 18, NULL, NULL),
(283, 'lon', '39.150210', 18, NULL, NULL),
(284, 'company_name', '', 21, NULL, NULL),
(285, 'company_address', '', 21, NULL, NULL),
(286, 'company_city', '', 21, NULL, NULL),
(287, 'company_state', '', 21, NULL, NULL),
(288, 'company_zipcode', '', 21, NULL, NULL),
(289, 'company_country', '', 21, NULL, NULL),
(290, 'company_telephone', '', 21, NULL, NULL),
(291, 'company_email', '', 21, NULL, NULL),
(292, 'commercial_registration_no', '0', 21, NULL, NULL),
(293, 'tax_number', '0', 21, NULL, NULL),
(294, 'insurance_number', '0', 21, NULL, NULL),
(295, 'company_email_from_name', '', 21, NULL, NULL),
(296, 'company_start_time', '08:00', 21, NULL, NULL),
(297, 'company_end_time', '18:00', 21, NULL, NULL),
(298, 'company_grace_period', '30', 21, NULL, NULL),
(299, 'company_grace_period_befor', '30', 21, NULL, NULL),
(300, 'ip_address', '[{\"value\":\"8a:02:71:dc:8e:22\"},{\"value\":\"4:8c:16:25:f1:ec\"},{\"value\":\"04:8c:16:25:f1:ec\"}]', 21, NULL, NULL),
(301, 'timezone', 'Asia/Riyadh', 21, NULL, NULL),
(302, 'lat', '21.602489', 21, NULL, NULL),
(303, 'lon', '39.150199', 21, NULL, NULL),
(304, 'company_logo', '18_logo.png', 18, NULL, NULL),
(305, 'company_favicon', '18_favicon.png', 18, NULL, NULL),
(306, 'company_logo', '19_logo.png', 19, NULL, NULL),
(309, 'site_currency', 'SAR', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(310, 'site_currency_symbol', 'SAR', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(311, 'site_currency_symbol_position', 'post', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(312, 'site_date_format', 'M j, Y', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(313, 'site_time_format', 'g:i A', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(314, 'employee_prefix', '220', 526, '2022-12-06 09:21:21', '2022-12-06 09:21:21'),
(334, 'country', 'Saudi Arabia', 19, '2022-12-20 17:46:00', '2022-12-20 17:46:00'),
(340, 'company_logo', '500_logo.png', 500, NULL, NULL),
(341, 'company_favicon', '500_favicon.png', 500, NULL, NULL),
(343, 'country', 'Egypt', 22, '2022-12-26 11:41:28', '2022-12-26 11:41:28'),
(350, 'country', 'Saudi Arabia', 501, '2022-12-29 13:14:06', '2022-12-29 13:14:06'),
(364, 'company_grace_period_end_before', '0', 22, NULL, NULL),
(365, 'company_grace_period_end_after', '60', 22, NULL, NULL),
(401, 'break_start_time', '09:00', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56'),
(402, 'break_end_time', '10:00', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56'),
(403, 'work_hours', '8', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56'),
(404, 'week_vacations', 'friday,saturday', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56'),
(405, 'permissions_monthly_limit', '2', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56'),
(406, 'time_zone', 'Africa/Cairo', 22, '2023-04-16 07:29:56', '2023-04-16 07:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `set_salaries`
--

CREATE TABLE `set_salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `location_id` bigint DEFAULT NULL,
  `shift_id` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shifts`
--

INSERT INTO `shifts` (`id`, `employee_id`, `location_id`, `shift_id`, `created_at`, `updated_at`) VALUES
(3, 248, 11, 32, '2022-12-05 08:36:41', '2022-12-05 08:36:41'),
(4, 248, 12, 33, '2022-12-05 08:37:05', '2022-12-05 08:37:05'),
(5, 30, 4, 22, '2022-12-07 10:05:36', '2022-12-13 15:43:26'),
(6, 375, 4, 25, '2022-12-07 10:14:09', '2022-12-07 10:14:09'),
(7, 239, 4, 25, '2022-12-07 10:18:03', '2022-12-07 10:18:03'),
(8, 244, 4, 25, '2022-12-07 10:19:15', '2022-12-07 10:19:15'),
(9, 506, 5, 31, '2022-12-07 17:44:04', '2022-12-07 17:44:04'),
(10, 513, 10, 30, '2022-12-07 17:46:44', '2022-12-07 17:46:44'),
(11, 518, 10, 30, '2022-12-07 17:47:27', '2022-12-07 17:47:27'),
(12, 27, 3, 26, '2022-12-13 15:34:58', '2022-12-13 15:34:58'),
(13, 28, 3, 26, '2022-12-13 15:35:44', '2022-12-13 15:35:44'),
(14, 199, 3, 21, '2022-12-13 15:37:03', '2022-12-13 15:40:08'),
(16, 497, 3, 26, '2022-12-13 15:38:14', '2022-12-13 15:38:14'),
(17, 246, 4, 22, '2022-12-13 15:49:56', '2022-12-13 15:49:56'),
(18, 361, 4, 22, '2022-12-13 15:51:04', '2022-12-13 15:51:04'),
(19, 587, 10, 30, '2022-12-18 10:42:28', '2022-12-18 10:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` int NOT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `label`, `start_date`, `due_date`, `status`, `note`, `priority`, `created_at`, `updated_at`, `created_by`) VALUES
(1, 'Rooney Jenkins', 'Quisquam doloremque', '2023-04-12', '2023-04-13', 1, 'Sit id odio totam s', 0, '2023-04-12 14:57:25', '2023-04-16 09:47:13', 22),
(2, 'Thane Lowery', 'Ut cum dicta reprehe', '2023-04-13', '2023-04-15', 2, 'Non nihil qui id vel', 0, '2023-04-12 14:58:45', '2023-04-16 11:27:10', 22),
(3, 'task1', 'label1', '2023-05-01', '2023-05-01', 1, NULL, 0, '2023-05-02 10:47:01', '2023-05-02 10:47:01', 22);

-- --------------------------------------------------------

--
-- Table structure for table `task_activity_logs`
--

CREATE TABLE `task_activity_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_activity_logs`
--

INSERT INTO `task_activity_logs` (`id`, `task_id`, `employee_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 22, '1', '2023-04-12 14:59:13', '2023-04-12 14:59:13'),
(2, 1, 22, '2', '2023-04-13 11:11:33', '2023-04-13 11:11:33'),
(3, 2, 22, '2', '2023-04-13 11:11:36', '2023-04-13 11:11:36'),
(4, 1, 22, '3', '2023-04-13 11:12:09', '2023-04-13 11:12:09'),
(5, 2, 22, '3', '2023-04-13 11:12:13', '2023-04-13 11:12:13'),
(6, 1, 22, '2', '2023-04-13 12:45:02', '2023-04-13 12:45:02'),
(7, 1, 22, '1', '2023-04-13 12:45:04', '2023-04-13 12:45:04'),
(8, 1, 22, '3', '2023-04-13 12:45:05', '2023-04-13 12:45:05'),
(9, 1, 22, '1', '2023-04-13 13:28:26', '2023-04-13 13:28:26'),
(10, 1, 22, '2', '2023-04-16 09:47:12', '2023-04-16 09:47:12'),
(11, 1, 22, '1', '2023-04-16 09:47:13', '2023-04-16 09:47:13'),
(12, 2, 22, '2', '2023-04-16 11:27:10', '2023-04-16 11:27:10');

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `task_id` bigint UNSIGNED NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attachments` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminate_requests`
--

CREATE TABLE `terminate_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint DEFAULT NULL,
  `date_termination` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_notify` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `leave_credit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terminate_requests`
--

INSERT INTO `terminate_requests` (`id`, `employee_id`, `date_termination`, `date_notify`, `leave_credit`, `amount`, `reason`, `created_at`, `updated_at`) VALUES
(1, 74, '2022-12-14', '2022-12-26', '22.86', '16532.75', 'fdfdfdffg', '2022-12-26 10:21:06', '2022-12-26 10:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `notice_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termination_types`
--

CREATE TABLE `termination_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termination_types`
--

INSERT INTO `termination_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Resignation', 'استقالة', 22, '2022-05-31 13:08:08', '2022-05-31 13:08:08'),
(2, 'Contract expiration', 'انتهاء العقد', 22, '2022-05-31 13:09:56', '2022-05-31 13:09:56');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int DEFAULT NULL,
  `priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `ticket_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket_created` int NOT NULL DEFAULT '0',
  `created_by` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `title`, `title_ar`, `description_ar`, `employee_id`, `priority`, `end_date`, `description`, `ticket_code`, `ticket_created`, `created_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'أختبار', 'بسيبس', 4, 'low', '2022-05-09', 'سيسيبسبي', '120520', 3, 2, 'close', '2022-05-10 12:42:20', '2022-05-10 12:44:12'),
(2, 'gfds', 'werty', 'asfafde', 4, 'low', '2022-05-22', 'qefqeqer', '110544', 3, 2, 'open', '2022-05-15 11:48:44', '2022-05-15 11:48:44'),
(3, 'ytrew', 'sdfghjk', 'zsdxfcgvhjkl', 13, 'low', '2022-05-17', 'mkjhgfdxszdxfcgvhbj', '100534', 2, 2, 'open', '2022-05-17 10:39:34', '2022-05-17 10:39:34');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint UNSIGNED NOT NULL,
  `ticket_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `is_read` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_replies`
--

INSERT INTO `ticket_replies` (`id`, `ticket_id`, `employee_id`, `description`, `created_by`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'نتلتنلنتلنت', 2, 0, '2022-05-10 12:43:05', '2022-05-10 12:43:05');

-- --------------------------------------------------------

--
-- Table structure for table `time_sheets`
--

CREATE TABLE `time_sheets` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `hours` double(8,2) NOT NULL DEFAULT '0.00',
  `remark` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `remark_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_sheets`
--

INSERT INTO `time_sheets` (`id`, `employee_id`, `date`, `hours`, `remark`, `remark_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, '2022-02-05', 8.50, 'fffffffffffffffff', 'ببببببببببببببببببببب', 2, '2022-02-06 01:35:28', '2022-06-20 13:39:08'),
(2, 6, '2022-03-06', 40.00, 'ggg', 'ggg', 2, '2022-03-06 09:58:38', '2022-03-06 09:58:38'),
(3, 4, '2022-05-15', 8.00, 'lkjhgfdsa', 'kjhgfdsa', 2, '2022-05-15 10:18:30', '2022-05-15 10:18:30'),
(4, 26, '2022-07-25', 9.00, NULL, NULL, 18, '2022-07-25 12:23:45', '2022-07-25 12:23:45'),
(6, 41, '2022-08-14', 1.00, 'hh', 'hh', 22, '2022-08-14 11:45:41', '2022-08-14 11:45:41');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `expertise` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainers`
--

INSERT INTO `trainers` (`id`, `branch`, `firstname`, `lastname`, `firstname_ar`, `lastname_ar`, `contact`, `email`, `address`, `expertise`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '4', 'hend', 'alqahtani', 'هند', 'القحطاني', '0000', 'hand.qahtani@bobrgroup.com', 'test', 'test', 19, '2022-12-06 11:53:01', '2022-12-06 11:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `branch` int NOT NULL,
  `trainer_option` int NOT NULL,
  `training_type` int NOT NULL,
  `trainer` int NOT NULL,
  `training_cost` double(8,2) NOT NULL DEFAULT '0.00',
  `employee` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description_ar` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `performance` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `branch`, `trainer_option`, `training_type`, `trainer`, `training_cost`, `employee`, `start_date`, `end_date`, `description`, `description_ar`, `performance`, `status`, `remarks`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 4, 0, 2, 1, 1500.00, 261, '2022-12-06', '2022-12-07', '', 'test', 0, 1, 'test', 19, '2022-12-06 11:53:38', '2022-12-06 11:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `training_types`
--

CREATE TABLE `training_types` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_types`
--

INSERT INTO `training_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'تت', 'تت', 154, '2022-11-11 19:46:41', '2022-11-11 19:46:41'),
(2, 'test', 'test', 19, '2022-12-06 11:51:29', '2022-12-06 11:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `branch_id` int NOT NULL,
  `department_id` int NOT NULL,
  `transfer_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_balances`
--

CREATE TABLE `transfer_balances` (
  `id` bigint UNSIGNED NOT NULL,
  `from_account_id` int NOT NULL,
  `to_account_id` int NOT NULL,
  `date` date NOT NULL,
  `amount` int NOT NULL,
  `payment_type_id` int NOT NULL,
  `referal_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` bigint UNSIGNED NOT NULL,
  `employee_id` int NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose_of_visit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_visit` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose_of_visit_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `place_of_visit_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` int DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `requested_plan` int NOT NULL DEFAULT '0',
  `number_of_employees` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fcm_token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `forgetcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `user_status` tinyint NOT NULL DEFAULT '1',
  `company_slate_readed` double DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `messenger_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#2180f3',
  `dark_mode` tinyint(1) NOT NULL DEFAULT '0',
  `active_status` tinyint(1) NOT NULL DEFAULT '0',
  `have_hr` tinyint DEFAULT NULL,
  `activity_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `email`, `phone`, `email_verified_at`, `password`, `type`, `request_type`, `avatar`, `lang`, `plan`, `plan_expire_date`, `requested_plan`, `number_of_employees`, `device_id`, `fcm_token`, `forgetcode`, `last_login`, `is_active`, `user_status`, `company_slate_readed`, `created_by`, `remember_token`, `created_at`, `updated_at`, `messenger_color`, `dark_mode`, `active_status`, `have_hr`, `activity_type`, `job_title`, `work_email`) VALUES
(22, 'MeleSbs', NULL, 'demo@demo.demo', NULL, NULL, '$2y$10$1cYnxbkeD53HaOKBegbL4unDu5xq.2vNyCmRMMUfIXR0G8KLQAlem', 'company', NULL, 'Dejavunew (1)_1675948718.jpg', 'ar', 1, NULL, 0, NULL, '809d481be0520574', NULL, NULL, '2023-05-08 08:59:09', 1, 1, NULL, '1', NULL, '2022-04-26 09:16:54', '2023-05-08 08:59:09', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(622, 'Briar Gardner', NULL, 'sikufosady@mailinator.com', NULL, NULL, '$2y$10$2Umlf/Y8DnQToPmAyMjd9.VaWuufr0WpbNmcl00MpQH.EnMfAJXXu', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '22', NULL, '2023-05-08 11:33:09', '2023-05-08 11:33:09', '#2180f3', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `user` int NOT NULL,
  `coupon` int NOT NULL,
  `order` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint UNSIGNED NOT NULL,
  `vehicle_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vehicle_type_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `check_date` date DEFAULT NULL,
  `custody` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custody_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `insurance_expiry_date` date DEFAULT NULL,
  `check_expiry_date` date DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicle_type`, `vehicle_type_ar`, `model`, `model_ar`, `registration_date`, `insurance_date`, `check_date`, `custody`, `custody_ar`, `insurance_expiry_date`, `check_expiry_date`, `created_by`, `created_at`, `updated_at`) VALUES
(3, 'بوبكات شيول أ أ ص 1094', 'bobcat', '2022', '2022', '2022-06-01', '2022-06-01', '2022-06-08', 'aaa', 'ااا', '2022-10-12', '2022-10-04', 68, '2022-08-30 12:22:33', '2022-08-30 12:22:33'),
(4, 'مرسيدس شاحنه أ د ه 1541', 'track', '1997', '1997', '2020-02-05', '2022-05-17', '2022-08-17', 'aaa', 'ااا', '2022-11-16', '2022-11-24', 68, '2022-08-30 12:25:06', '2022-08-30 12:25:06'),
(5, 'مرسيدس شاحنه أ ق ه 1694', 'track', '1976', '1976', '2020-05-01', '2022-06-21', '2022-06-22', 'aaa', 'ااا', '2022-10-20', '2022-10-20', 68, '2022-08-30 12:26:22', '2022-08-30 12:26:22'),
(6, 'كتربلر أ أ ص 2331', 'cat', '2012', '2012', '2020-01-01', '2022-06-13', '2022-06-14', 'aaa', 'ااا', '2022-10-19', '2022-10-13', 68, '2022-08-30 12:27:54', '2022-08-30 12:27:54'),
(7, 'كتربلر شيول  أ أ ص 2333', 'cat', '2012', '2012', '2020-08-05', '2022-06-28', '2022-06-22', 'aaa', 'ااا', '2022-11-23', '2022-12-21', 68, '2022-08-30 12:29:22', '2022-08-30 12:29:22'),
(8, 'مرسيدس قلاب ب أ ط 2638', 'galad', '1981', '1981', '2020-08-02', '2022-05-23', '2022-08-08', 'aaa', 'ااا', '2022-12-14', '2023-04-06', 68, '2022-08-30 12:31:02', '2022-08-30 12:31:02'),
(9, 'ايسوزو غمارة ب ب ر 2716', 'backup', '2016', '2016', '2020-03-13', '2022-04-17', '2022-05-17', 'aaa', 'ااا', '2022-12-01', '2022-11-24', 68, '2022-08-30 12:33:05', '2022-08-30 12:33:05'),
(10, 'متسوبيشي فوزو أ ل ص 2724', 'fozo', '2012', '2012', '2020-07-23', '2022-04-11', '2022-05-24', 'aaa', 'ااا', '2022-12-08', '2022-11-30', 68, '2022-08-30 12:34:57', '2022-08-30 12:34:57'),
(11, 'جي سي بي شيول حفار أ أ ق 2852', 'JCB', '2013', '2013', '2021-05-12', '2022-04-18', '2022-04-05', 'aaa', 'ااا', '2022-12-08', '2022-12-17', 68, '2022-08-30 12:36:25', '2022-08-30 12:36:25'),
(12, 'متسوبيشي شاحنة أ م و 2905', 'track', '2013', '2013', '2021-02-11', '2022-04-11', '2022-05-24', 'aaa', 'ااا', '2022-11-16', '2022-11-10', 68, '2022-08-30 12:38:26', '2022-08-30 12:38:26'),
(13, 'جي سي بي باكهولودر أ أ د 2969', 'JCB BACKHOLDER', '2015', '2015', '2022-02-09', '2022-05-31', '2022-05-10', 'aaa', 'ااا', '2022-11-17', '2022-10-26', 68, '2022-08-30 12:44:34', '2022-08-30 12:44:34');

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` bigint UNSIGNED NOT NULL,
  `warning_to` int NOT NULL,
  `warning_by` int NOT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `warning_date` date NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_from_home_requests`
--

CREATE TABLE `work_from_home_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `employee_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_by` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint DEFAULT NULL,
  `reject_reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_unites`
--

CREATE TABLE `work_unites` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_ar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_unites`
--

INSERT INTO `work_unites` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'technology and information systems', 'تقنية ونظم المعلومات', 2, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(2, 'technology and information systems', 'تقنية ونظم المعلومات', 18, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(3, 'technology and information systems', 'تقنية ونظم المعلومات', 19, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(4, 'technology and information systems', 'تقنية ونظم المعلومات', 20, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(5, 'technology and information systems', 'تقنية ونظم المعلومات', 21, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(6, 'technology and information systems', 'تقنية ونظم المعلومات', 22, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(7, 'technology and information systems', 'تقنية ونظم المعلومات', 23, '2022-04-12 12:26:00', '2022-04-12 12:26:00'),
(8, 'technology and information systems', 'تقنية ونظم المعلومات', 24, '2022-04-12 12:26:00', '2022-04-12 12:26:00');

-- --------------------------------------------------------

--
-- Table structure for table `zkteco_devices`
--

CREATE TABLE `zkteco_devices` (
  `id` bigint UNSIGNED NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `port` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meetings`
--

CREATE TABLE `zoom_meetings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meeting_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` int NOT NULL DEFAULT '0',
  `start_url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `join_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'waiting',
  `created_by` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absences`
--
ALTER TABLE `absences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `account_lists`
--
ALTER TABLE `account_lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_payment_settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `allowances`
--
ALTER TABLE `allowances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allowance_options`
--
ALTER TABLE `allowance_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement_employees`
--
ALTER TABLE `announcement_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appraisals`
--
ALTER TABLE `appraisals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assets_assets_type_id_foreign` (`assets_type_id`);

--
-- Indexes for table `assets_types`
--
ALTER TABLE `assets_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_employees`
--
ALTER TABLE `attendance_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_movements`
--
ALTER TABLE `attendance_movements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `award_types`
--
ALTER TABLE `award_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commissions`
--
ALTER TABLE `commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyslates`
--
ALTER TABLE `companyslates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_breaks`
--
ALTER TABLE `company_breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_ducument_uploads`
--
ALTER TABLE `company_ducument_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_ducument_upload_categories`
--
ALTER TABLE `company_ducument_upload_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_job_requests`
--
ALTER TABLE `company_job_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_policies`
--
ALTER TABLE `company_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_structures`
--
ALTER TABLE `company_structures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_structures_parent_foreign` (`parent`);

--
-- Indexes for table `company_structure_employees`
--
ALTER TABLE `company_structure_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_structure_employees_structure_id_foreign` (`structure_id`),
  ADD KEY `company_structure_employees_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `competencies`
--
ALTER TABLE `competencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract_templates`
--
ALTER TABLE `contract_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_questions`
--
ALTER TABLE `custom_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_options`
--
ALTER TABLE `deduction_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_types`
--
ALTER TABLE `document_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ducument_uploads`
--
ALTER TABLE `ducument_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_id_foreign` (`document_id`);

--
-- Indexes for table `ducument_upload_images`
--
ALTER TABLE `ducument_upload_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ducument_upload_images_ducument_upload_id_foreign` (`ducument_upload_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_branches`
--
ALTER TABLE `employee_branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_breaks`
--
ALTER TABLE `employee_breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_contracts`
--
ALTER TABLE `employee_contracts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_documents`
--
ALTER TABLE `employee_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_finger_print_locations`
--
ALTER TABLE `employee_finger_print_locations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_finger_print_locations_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_followers`
--
ALTER TABLE `employee_followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_requests`
--
ALTER TABLE `employee_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_shifts`
--
ALTER TABLE `employee_shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_tasks`
--
ALTER TABLE `employee_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_answers`
--
ALTER TABLE `evaluation_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_categories`
--
ALTER TABLE `evaluation_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_results`
--
ALTER TABLE `evaluation_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluation_sections`
--
ALTER TABLE `evaluation_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluation_sections_evaluation_id_foreign` (`evaluation_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_employees`
--
ALTER TABLE `event_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcm`
--
ALTER TABLE `fcm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genrate_payslip_options`
--
ALTER TABLE `genrate_payslip_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal_trackings`
--
ALTER TABLE `goal_trackings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal_types`
--
ALTER TABLE `goal_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holiday_types`
--
ALTER TABLE `holiday_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_types`
--
ALTER TABLE `income_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indicators`
--
ALTER TABLE `indicators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `in_out_logs`
--
ALTER TABLE `in_out_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ip_restricts`
--
ALTER TABLE `ip_restricts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobtitles`
--
ALTER TABLE `jobtitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_application_notes`
--
ALTER TABLE `job_application_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_categories`
--
ALTER TABLE `job_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_offer_answers`
--
ALTER TABLE `job_offer_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_answers_company_job_request_id_foreign` (`company_job_request_id`),
  ADD KEY `job_offer_answers_job_offer_question_id_foreign` (`job_offer_question_id`),
  ADD KEY `job_offer_answers_job_offer_user_id_foreign` (`job_offer_user_id`);

--
-- Indexes for table `job_offer_questions`
--
ALTER TABLE `job_offer_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_questions_job_offer_section_id_foreign` (`job_offer_section_id`);

--
-- Indexes for table `job_offer_question_options`
--
ALTER TABLE `job_offer_question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_question_options_job_offer_question_id_foreign` (`job_offer_question_id`);

--
-- Indexes for table `job_offer_sections`
--
ALTER TABLE `job_offer_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_sections_company_job_request_id_foreign` (`company_job_request_id`);

--
-- Indexes for table `job_offer_users`
--
ALTER TABLE `job_offer_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_offer_users_company_job_request_id_foreign` (`company_job_request_id`);

--
-- Indexes for table `job_on_boards`
--
ALTER TABLE `job_on_boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_requests`
--
ALTER TABLE `job_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_stages`
--
ALTER TABLE `job_stages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_types`
--
ALTER TABLE `job_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labor_hire_companies`
--
ALTER TABLE `labor_hire_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landaboutcards`
--
ALTER TABLE `landaboutcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landblogs`
--
ALTER TABLE `landblogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landcloudcards`
--
ALTER TABLE `landcloudcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landcontactcards`
--
ALTER TABLE `landcontactcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landdemocards`
--
ALTER TABLE `landdemocards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landfaqs`
--
ALTER TABLE `landfaqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landfeatures`
--
ALTER TABLE `landfeatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `landfeatures_landplan_id_foreign` (`landplan_id`);

--
-- Indexes for table `landhelpcards`
--
ALTER TABLE `landhelpcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landplans`
--
ALTER TABLE `landplans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landsaycards`
--
ALTER TABLE `landsaycards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landsections`
--
ALTER TABLE `landsections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landsliders`
--
ALTER TABLE `landsliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landsocialmedia`
--
ALTER TABLE `landsocialmedia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landsupportforms`
--
ALTER TABLE `landsupportforms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`),
  ADD KEY `leaves_leave_type_id_foreign` (`leave_type_id`),
  ADD KEY `leaves_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `leaves_types`
--
ALTER TABLE `leaves_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_options`
--
ALTER TABLE `loan_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loan_pendings`
--
ALTER TABLE `loan_pendings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_employees`
--
ALTER TABLE `meeting_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `missions`
--
ALTER TABLE `missions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_offer_category_id_foreign` (`offer_category_id`);

--
-- Indexes for table `offer_categories`
--
ALTER TABLE `offer_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`);

--
-- Indexes for table `other_payments`
--
ALTER TABLE `other_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtimes`
--
ALTER TABLE `overtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `over_time_requests`
--
ALTER TABLE `over_time_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payees`
--
ALTER TABLE `payees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payers`
--
ALTER TABLE `payers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_types`
--
ALTER TABLE `payment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll_settings`
--
ALTER TABLE `payroll_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payslip_types`
--
ALTER TABLE `payslip_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pay_slips`
--
ALTER TABLE `pay_slips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance`
--
ALTER TABLE `performance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_employee_id_foreign` (`employee_id`),
  ADD KEY `performance_performance_period_id_foreign` (`performance_period_id`);

--
-- Indexes for table `performance_details`
--
ALTER TABLE `performance_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_factors`
--
ALTER TABLE `performance_factors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `performance_factors_performance_period_id_foreign` (`performance_period_id`);

--
-- Indexes for table `performance_periods`
--
ALTER TABLE `performance_periods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance__types`
--
ALTER TABLE `performance__types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `plans_name_unique` (`name`);

--
-- Indexes for table `plan_requests`
--
ALTER TABLE `plan_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_evaluation_section_id_foreign` (`evaluation_section_id`);

--
-- Indexes for table `question_options`
--
ALTER TABLE `question_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_options_question_id_foreign` (`question_id`);

--
-- Indexes for table `request_types`
--
ALTER TABLE `request_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resignations`
--
ALTER TABLE `resignations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `salary_components_types`
--
ALTER TABLE `salary_components_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_settings`
--
ALTER TABLE `salary_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saturation_deductions`
--
ALTER TABLE `saturation_deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_name_created_by_unique` (`name`,`created_by`);

--
-- Indexes for table `set_salaries`
--
ALTER TABLE `set_salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_activity_logs`
--
ALTER TABLE `task_activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_comments`
--
ALTER TABLE `task_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminate_requests`
--
ALTER TABLE `terminate_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminations`
--
ALTER TABLE `terminations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termination_types`
--
ALTER TABLE `termination_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_sheets`
--
ALTER TABLE `time_sheets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainers`
--
ALTER TABLE `trainers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_types`
--
ALTER TABLE `training_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_balances`
--
ALTER TABLE `transfer_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_coupons`
--
ALTER TABLE `user_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warnings`
--
ALTER TABLE `warnings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_from_home_requests`
--
ALTER TABLE `work_from_home_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_from_home_requests_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `work_unites`
--
ALTER TABLE `work_unites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zkteco_devices`
--
ALTER TABLE `zkteco_devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `account_lists`
--
ALTER TABLE `account_lists`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowance_options`
--
ALTER TABLE `allowance_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_employees`
--
ALTER TABLE `announcement_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appraisals`
--
ALTER TABLE `appraisals`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets_types`
--
ALTER TABLE `assets_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_employees`
--
ALTER TABLE `attendance_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_movements`
--
ALTER TABLE `attendance_movements`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `award_types`
--
ALTER TABLE `award_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `companyslates`
--
ALTER TABLE `companyslates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_breaks`
--
ALTER TABLE `company_breaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `company_ducument_uploads`
--
ALTER TABLE `company_ducument_uploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `company_ducument_upload_categories`
--
ALTER TABLE `company_ducument_upload_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company_job_requests`
--
ALTER TABLE `company_job_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `company_policies`
--
ALTER TABLE `company_policies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_structures`
--
ALTER TABLE `company_structures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `company_structure_employees`
--
ALTER TABLE `company_structure_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_templates`
--
ALTER TABLE `contract_templates`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_questions`
--
ALTER TABLE `custom_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_options`
--
ALTER TABLE `deduction_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ducument_uploads`
--
ALTER TABLE `ducument_uploads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `ducument_upload_images`
--
ALTER TABLE `ducument_upload_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=563;

--
-- AUTO_INCREMENT for table `employee_branches`
--
ALTER TABLE `employee_branches`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_breaks`
--
ALTER TABLE `employee_breaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `employee_contracts`
--
ALTER TABLE `employee_contracts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_finger_print_locations`
--
ALTER TABLE `employee_finger_print_locations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_followers`
--
ALTER TABLE `employee_followers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employee_requests`
--
ALTER TABLE `employee_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_shifts`
--
ALTER TABLE `employee_shifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `employee_tasks`
--
ALTER TABLE `employee_tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1154;

--
-- AUTO_INCREMENT for table `evaluation_answers`
--
ALTER TABLE `evaluation_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_categories`
--
ALTER TABLE `evaluation_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_results`
--
ALTER TABLE `evaluation_results`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_sections`
--
ALTER TABLE `evaluation_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_employees`
--
ALTER TABLE `event_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fcm`
--
ALTER TABLE `fcm`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genrate_payslip_options`
--
ALTER TABLE `genrate_payslip_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal_trackings`
--
ALTER TABLE `goal_trackings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `goal_types`
--
ALTER TABLE `goal_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holiday_types`
--
ALTER TABLE `holiday_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indicators`
--
ALTER TABLE `indicators`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_out_logs`
--
ALTER TABLE `in_out_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_restricts`
--
ALTER TABLE `ip_restricts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobtitles`
--
ALTER TABLE `jobtitles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_application_notes`
--
ALTER TABLE `job_application_notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_offer_answers`
--
ALTER TABLE `job_offer_answers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_offer_questions`
--
ALTER TABLE `job_offer_questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_offer_question_options`
--
ALTER TABLE `job_offer_question_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_offer_sections`
--
ALTER TABLE `job_offer_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job_offer_users`
--
ALTER TABLE `job_offer_users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_on_boards`
--
ALTER TABLE `job_on_boards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_requests`
--
ALTER TABLE `job_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `job_stages`
--
ALTER TABLE `job_stages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=521;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `labor_hire_companies`
--
ALTER TABLE `labor_hire_companies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `landaboutcards`
--
ALTER TABLE `landaboutcards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `landblogs`
--
ALTER TABLE `landblogs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landcloudcards`
--
ALTER TABLE `landcloudcards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landcontactcards`
--
ALTER TABLE `landcontactcards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `landdemocards`
--
ALTER TABLE `landdemocards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `landfaqs`
--
ALTER TABLE `landfaqs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `landfeatures`
--
ALTER TABLE `landfeatures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landhelpcards`
--
ALTER TABLE `landhelpcards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `landplans`
--
ALTER TABLE `landplans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsaycards`
--
ALTER TABLE `landsaycards`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsections`
--
ALTER TABLE `landsections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `landsliders`
--
ALTER TABLE `landsliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `landsocialmedia`
--
ALTER TABLE `landsocialmedia`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `landsupportforms`
--
ALTER TABLE `landsupportforms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves_types`
--
ALTER TABLE `leaves_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_options`
--
ALTER TABLE `loan_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `loan_pendings`
--
ALTER TABLE `loan_pendings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `meeting_employees`
--
ALTER TABLE `meeting_employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_categories`
--
ALTER TABLE `offer_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `other_payments`
--
ALTER TABLE `other_payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `over_time_requests`
--
ALTER TABLE `over_time_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payees`
--
ALTER TABLE `payees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_settings`
--
ALTER TABLE `payroll_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=903;

--
-- AUTO_INCREMENT for table `payslip_types`
--
ALTER TABLE `payslip_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pay_slips`
--
ALTER TABLE `pay_slips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_details`
--
ALTER TABLE `performance_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_factors`
--
ALTER TABLE `performance_factors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `performance_periods`
--
ALTER TABLE `performance_periods`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `performance__types`
--
ALTER TABLE `performance__types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=450;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=953;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `request_types`
--
ALTER TABLE `request_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `salary_components_types`
--
ALTER TABLE `salary_components_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary_settings`
--
ALTER TABLE `salary_settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `saturation_deductions`
--
ALTER TABLE `saturation_deductions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT for table `set_salaries`
--
ALTER TABLE `set_salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `task_activity_logs`
--
ALTER TABLE `task_activity_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminate_requests`
--
ALTER TABLE `terminate_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `termination_types`
--
ALTER TABLE `termination_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `time_sheets`
--
ALTER TABLE `time_sheets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `training_types`
--
ALTER TABLE `training_types`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_balances`
--
ALTER TABLE `transfer_balances`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=623;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_from_home_requests`
--
ALTER TABLE `work_from_home_requests`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_unites`
--
ALTER TABLE `work_unites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zkteco_devices`
--
ALTER TABLE `zkteco_devices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assets`
--
ALTER TABLE `assets`
  ADD CONSTRAINT `assets_assets_type_id_foreign` FOREIGN KEY (`assets_type_id`) REFERENCES `assets_types` (`id`);

--
-- Constraints for table `company_structures`
--
ALTER TABLE `company_structures`
  ADD CONSTRAINT `company_structure_foreign` FOREIGN KEY (`parent`) REFERENCES `company_structures` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company_structure_employees`
--
ALTER TABLE `company_structure_employees`
  ADD CONSTRAINT `company_structure_employees_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `company_structure_employees_structure_id_foreign` FOREIGN KEY (`structure_id`) REFERENCES `company_structures` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ducument_uploads`
--
ALTER TABLE `ducument_uploads`
  ADD CONSTRAINT `document_id_foreign` FOREIGN KEY (`document_id`) REFERENCES `documents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ducument_upload_images`
--
ALTER TABLE `ducument_upload_images`
  ADD CONSTRAINT `ducument_upload_images_ducument_upload_id_foreign` FOREIGN KEY (`ducument_upload_id`) REFERENCES `ducument_uploads` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee_finger_print_locations`
--
ALTER TABLE `employee_finger_print_locations`
  ADD CONSTRAINT `employee_finger_print_locations_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `evaluation_sections`
--
ALTER TABLE `evaluation_sections`
  ADD CONSTRAINT `evaluation_sections_evaluation_id_foreign` FOREIGN KEY (`evaluation_id`) REFERENCES `evaluations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_offer_answers`
--
ALTER TABLE `job_offer_answers`
  ADD CONSTRAINT `job_offer_answers_company_job_request_id_foreign` FOREIGN KEY (`company_job_request_id`) REFERENCES `company_job_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_offer_answers_job_offer_question_id_foreign` FOREIGN KEY (`job_offer_question_id`) REFERENCES `job_offer_questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_offer_answers_job_offer_user_id_foreign` FOREIGN KEY (`job_offer_user_id`) REFERENCES `job_offer_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_offer_questions`
--
ALTER TABLE `job_offer_questions`
  ADD CONSTRAINT `job_offer_questions_job_offer_section_id_foreign` FOREIGN KEY (`job_offer_section_id`) REFERENCES `job_offer_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_offer_question_options`
--
ALTER TABLE `job_offer_question_options`
  ADD CONSTRAINT `job_offer_question_options_job_offer_question_id_foreign` FOREIGN KEY (`job_offer_question_id`) REFERENCES `job_offer_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_offer_sections`
--
ALTER TABLE `job_offer_sections`
  ADD CONSTRAINT `job_offer_sections_company_job_request_id_foreign` FOREIGN KEY (`company_job_request_id`) REFERENCES `company_job_requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_offer_users`
--
ALTER TABLE `job_offer_users`
  ADD CONSTRAINT `job_offer_users_company_job_request_id_foreign` FOREIGN KEY (`company_job_request_id`) REFERENCES `company_job_requests` (`id`);

--
-- Constraints for table `landfeatures`
--
ALTER TABLE `landfeatures`
  ADD CONSTRAINT `landfeatures_landplan_id_foreign` FOREIGN KEY (`landplan_id`) REFERENCES `landplans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `leaves`
--
ALTER TABLE `leaves`
  ADD CONSTRAINT `leaves_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `leaves_leave_type_id_foreign` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_offer_category_id_foreign` FOREIGN KEY (`offer_category_id`) REFERENCES `offer_categories` (`id`);

--
-- Constraints for table `performance`
--
ALTER TABLE `performance`
  ADD CONSTRAINT `performance_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `performance_performance_period_id_foreign` FOREIGN KEY (`performance_period_id`) REFERENCES `performance_periods` (`id`);

--
-- Constraints for table `performance_factors`
--
ALTER TABLE `performance_factors`
  ADD CONSTRAINT `performance_factors_performance_period_id_foreign` FOREIGN KEY (`performance_period_id`) REFERENCES `performance_periods` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_evaluation_section_id_foreign` FOREIGN KEY (`evaluation_section_id`) REFERENCES `evaluation_sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `question_options`
--
ALTER TABLE `question_options`
  ADD CONSTRAINT `question_options_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_from_home_requests`
--
ALTER TABLE `work_from_home_requests`
  ADD CONSTRAINT `work_from_home_requests_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
