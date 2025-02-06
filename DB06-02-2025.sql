-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 06, 2025 at 12:45 PM
-- Server version: 10.3.39-MariaDB
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mwaredi_hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `description_ar` mediumtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `title`, `title_ar`, `description`, `description_ar`, `updated_at`, `created_at`) VALUES
(1, 'ABout Us En', '.', '<p>We are dedicated to revolutionizing the way businesses manage their workforce. Our <strong>HR Management System mwaredi</strong> is designed to simplify and automate HR processes, helping organizations improve efficiency, enhance employee experience, and drive business growth.</p><p>With a deep understanding of HR challenges, we provide <strong>innovative, cloud-based solutions</strong> that streamline everything from <strong>recruitment and payroll to performance management and employee engagement</strong>. Whether you\'re a small business or a large enterprise, our system adapts to your needs, ensuring compliance, security, and seamless operations.</p>', '<p>نحن ملتزمون بإحداث ثورة في الطريقة التي تدير بها الشركات قوتها العاملة. تم تصميم نظام إدارة الموارد البشرية &nbsp;مواردي &nbsp;لتبسيط وأتمتة عمليات الموارد البشرية، ومساعدة المؤسسات على تحسين الكفاءة، وتعزيز تجربة الموظفين، ودفع نمو الأعمال.</p><p>بفضل فهمنا العميق لتحديات الموارد البشرية، نقدم حلولاً مبتكرة قائمة على السحابة تعمل على تبسيط كل شيء من التوظيف وكشوف المرتبات إلى إدارة الأداء وإشراك الموظفين. سواء كنت شركة صغيرة أو مؤسسة كبيرة، فإن نظامنا يتكيف مع احتياجاتك، ويضمن الامتثال والأمان والعمليات السلسة.</p>', '2025-02-06 10:06:34', '2025-02-04 02:19:31'),
(2, 'Default Title', 'عنوان افتراضي', 'Default description', 'وصف افتراضي', '2025-02-04 02:23:04', '2025-02-04 02:23:04'),
(3, NULL, NULL, NULL, NULL, '2025-02-04 14:33:18', '2025-02-04 14:33:18'),
(4, NULL, NULL, NULL, NULL, '2025-02-04 14:33:43', '2025-02-04 14:33:43'),
(5, NULL, NULL, NULL, NULL, '2025-02-04 14:33:50', '2025-02-04 14:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `absences`
--

CREATE TABLE `absences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `number_of_days` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `discount_amount` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leave_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `absences`
--

INSERT INTO `absences` (`id`, `employee_id`, `type`, `number_of_days`, `start_date`, `end_date`, `created_by`, `discount_amount`, `created_at`, `updated_at`, `leave_id`) VALUES
(26, 3, 'S', 25, '2025-01-01', '2025-01-25', 2, '0', '2025-01-26 21:15:04', '2025-01-26 21:15:04', NULL),
(27, 3, 'A', 68, '2025-01-26', '2025-04-03', 2, '0', '2025-01-26 21:19:52', '2025-01-26 21:19:52', NULL),
(28, 3, 'S', 46, '2025-01-26', '2025-03-12', 2, '1250', '2025-01-26 21:26:29', '2025-01-26 21:26:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `account_lists`
--

CREATE TABLE `account_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `initial_balance` double NOT NULL DEFAULT 0,
  `account_number` varchar(255) NOT NULL,
  `branch_code` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `batch_uuid` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin_payment_settings`
--

CREATE TABLE `admin_payment_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allowances`
--

CREATE TABLE `allowances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `allowance_option` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allowances`
--

INSERT INTO `allowances` (`id`, `employee_id`, `allowance_option`, `title`, `date`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 5, 1, 'بدل2', '2025-01-15', 23, 2, '2025-01-15 11:55:35', '2025-01-15 11:55:35'),
(3, 3, 1, 'بدل 1', '2025-01-26', 500, 2, '2025-01-26 13:30:44', '2025-01-26 13:30:44');

-- --------------------------------------------------------

--
-- Table structure for table `allowance_options`
--

CREATE TABLE `allowance_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `insurance_active` tinyint(4) NOT NULL DEFAULT 0,
  `payroll_dispaly` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `allowance_options`
--

INSERT INTO `allowance_options` (`id`, `name`, `name_ar`, `insurance_active`, `payroll_dispaly`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Housing Allowance', 'إفادة بدل السكن', 0, 1, 2, '2025-01-10 15:07:33', '2025-01-10 15:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `branch_id` int(11) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `announcement_employees`
--

CREATE TABLE `announcement_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appraisals`
--

CREATE TABLE `appraisals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `employee` int(11) NOT NULL DEFAULT 0,
  `rating` varchar(255) DEFAULT NULL,
  `appraisal_date` varchar(255) NOT NULL,
  `customer_experience` int(11) NOT NULL DEFAULT 0,
  `marketing` int(11) NOT NULL DEFAULT 0,
  `administration` int(11) NOT NULL DEFAULT 0,
  `professionalism` int(11) NOT NULL DEFAULT 0,
  `integrity` int(11) NOT NULL DEFAULT 0,
  `attendance` int(11) NOT NULL DEFAULT 0,
  `remark` text DEFAULT NULL,
  `remark_ar` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `supported_date` date DEFAULT NULL,
  `amount` double NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `assets_type_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `employee_id`, `name`, `purchase_date`, `supported_date`, `amount`, `description`, `created_by`, `created_at`, `updated_at`, `serial_number`, `status`, `assets_type_id`) VALUES
(2, 3, 'chair', '0000-00-00', '0000-00-00', 1000, 'الوصف', 2, '2025-02-04 23:00:50', '2025-02-04 23:00:50', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assets_types`
--

CREATE TABLE `assets_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance_employees`
--

CREATE TABLE `attendance_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` text DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `clock_in` time DEFAULT NULL,
  `clock_out` time DEFAULT NULL,
  `in_company_range` tinyint(4) DEFAULT NULL COMMENT '1:Yes, 0:No, null: Company does not check the location',
  `lat` decimal(10,7) DEFAULT NULL,
  `lon` decimal(10,7) DEFAULT NULL,
  `late` time DEFAULT NULL,
  `early_leaving` time DEFAULT NULL,
  `overtime` time DEFAULT NULL,
  `total_rest` time DEFAULT NULL,
  `delay_reason` varchar(255) DEFAULT NULL,
  `urgent_end_reason` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `note` text DEFAULT NULL,
  `image_clock_in` varchar(255) DEFAULT NULL,
  `image_clock_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_employees`
--

INSERT INTO `attendance_employees` (`id`, `employee_id`, `date`, `status`, `clock_in`, `clock_out`, `in_company_range`, `lat`, `lon`, `late`, `early_leaving`, `overtime`, `total_rest`, `delay_reason`, `urgent_end_reason`, `created_by`, `created_at`, `updated_at`, `note`, `image_clock_in`, `image_clock_out`) VALUES
(2, 1, '2025-01-25', 'Present', '09:00:00', '17:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-25 20:30:20', '2025-01-25 20:30:20', NULL, NULL, NULL),
(3, 2, '2025-01-25', 'Leave', '00:00:00', '00:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-25 20:30:20', '2025-01-25 20:30:20', NULL, NULL, NULL),
(4, 5, '28-01-2025', 'Present', '10:20:00', '04:15:00', NULL, NULL, NULL, '01:20:00', '12:45:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-28 22:48:45', '2025-01-28 22:48:45', NULL, NULL, NULL),
(5, 5, '29-01-2025', 'Present', '01:01:00', '05:00:00', NULL, NULL, NULL, '-00:00:08', '12:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-28 23:59:40', '2025-01-28 23:59:40', NULL, NULL, NULL),
(6, 3, '2025-01-29', 'Leave', '00:00:00', '00:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-29 00:00:52', '2025-01-29 00:21:34', NULL, NULL, NULL),
(7, 5, '2025-01-29', 'Leave', '00:00:00', '00:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-29 00:00:52', '2025-01-29 00:00:52', NULL, NULL, NULL),
(8, 6, '30-01-2025', 'Present', '12:20:00', '16:20:00', NULL, NULL, NULL, '03:20:00', '00:40:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-01-30 21:31:21', '2025-01-30 21:31:21', NULL, NULL, NULL),
(9, 7, '30-01-2025', 'Present', '12:20:00', '23:59:00', NULL, NULL, NULL, '03:20:00', '-00:00:07', '06:59:00', '00:00:00', NULL, NULL, 2, '2025-01-30 21:47:08', '2025-01-30 21:47:08', NULL, NULL, NULL),
(18, 6, '2025-02-02', 'Present', '02:09:46', '02:09:55', NULL, NULL, NULL, '00:00:00', '14:50:05', '00:00:00', NULL, NULL, NULL, 0, '2025-02-02 02:09:46', '2025-02-02 02:09:55', NULL, NULL, NULL),
(19, 3, '04-02-2025', 'Present', '09:00:00', '17:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-02-04 22:50:32', '2025-02-04 22:51:43', NULL, NULL, NULL),
(20, 3, '2025-02-04', 'Present', '08:00:00', '17:00:00', NULL, NULL, NULL, '-01:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-02-04 22:52:42', '2025-02-04 22:53:09', NULL, NULL, NULL),
(21, 5, '2025-02-04', 'Present', '09:00:00', '17:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-02-04 22:52:42', '2025-02-04 22:52:42', NULL, NULL, NULL),
(22, 6, '2025-02-04', 'Present', '09:00:00', '17:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-02-04 22:52:42', '2025-02-04 22:52:42', NULL, NULL, NULL),
(23, 7, '2025-02-04', 'Present', '09:00:00', '17:00:00', NULL, NULL, NULL, '00:00:00', '00:00:00', '00:00:00', '00:00:00', NULL, NULL, 2, '2025-02-04 22:52:42', '2025-02-04 22:52:42', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_movements`
--

CREATE TABLE `attendance_movements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_movement_date` date DEFAULT NULL,
  `end_movement_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendance_movements`
--

INSERT INTO `attendance_movements` (`id`, `start_movement_date`, `end_movement_date`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2025-01-01', '2025-01-31', NULL, 2, '2025-01-12 01:22:22', '2025-01-12 01:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `award_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `gift` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `award_types`
--

CREATE TABLE `award_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `award_types`
--

INSERT INTO `award_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'annual Award', 'مكافئة سنوية', 2, '2025-01-11 12:08:06', '2025-01-11 12:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Alahly Bank', 'البنك  الأهلي', 2, '2025-01-12 01:16:46', '2025-01-12 01:16:46'),
(2, 'Alrajhi', 'الراجحي', 2, '2025-01-22 19:39:46', '2025-01-22 19:39:46');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `lat` text DEFAULT NULL,
  `lon` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `employee_id`, `name`, `name_ar`, `lat`, `lon`, `created_by`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Jeddah', 'جدة', '21.5766292', '39.2138664', 2, '2025-01-10 00:26:37', '2025-01-10 00:26:37'),
(5, NULL, 'Riadh', 'الرياض', '24.7305650', '46.6555170', 2, '2025-01-25 11:18:50', '2025-01-25 11:18:50'),
(6, NULL, 'Main Branch', 'الفرع الرئيسي', '24.7305650', '46.6555170', 2, '2025-01-25 11:20:42', '2025-01-25 11:20:42');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `image`, `created_at`, `updated_at`, `name`, `name_ar`) VALUES
(1, 'clients/eSIu1EthDwoV2y5l68ltO0YGupnmjJUfcHP6yfDv.png', '2025-02-04 13:25:07', '2025-02-06 12:16:37', 'amuhamed', 'العميل H'),
(3, 'clients/gpzTUxuD7WD5f94YkuK57kZlWLLhlz6L1MjhBBJT.png', '2025-02-04 13:29:21', '2025-02-06 12:15:55', 'Almizan', 'الميزان');

-- --------------------------------------------------------

--
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `commission_amount` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '$',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precentage` varchar(255) DEFAULT NULL,
  `close_deal_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `commissions`
--

INSERT INTO `commissions` (`id`, `employee_id`, `title`, `date`, `commission_amount`, `amount`, `type`, `created_by`, `created_at`, `updated_at`, `precentage`, `close_deal_amount`) VALUES
(2, 5, 'Commission', '2025-01-22', NULL, 100, '$', 2, '2025-01-22 20:06:23', '2025-01-22 20:06:23', NULL, NULL),
(4, 1, 'مبيعات عامة', '2025-01-25', NULL, 100, '$', 2, '2025-01-25 22:47:07', '2025-01-25 22:47:07', NULL, NULL),
(7, 3, 'عمولة جديد', '2025-01-26', '200', 40, '%', 2, '2025-01-26 14:49:23', '2025-01-26 14:49:23', NULL, NULL),
(8, 3, 'عمولة جديد2', '2025-01-26', NULL, 50, '$', 2, '2025-01-26 14:50:06', '2025-01-26 14:50:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companyslates`
--

CREATE TABLE `companyslates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `file_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_breaks`
--

CREATE TABLE `company_breaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_ducument_uploads`
--

CREATE TABLE `company_ducument_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) DEFAULT NULL,
  `deleted_at` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_ducument_upload_categories`
--

CREATE TABLE `company_ducument_upload_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_job_requests`
--

CREATE TABLE `company_job_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('approved','rejected','pending') NOT NULL DEFAULT 'pending',
  `created_by` bigint(20) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `title` varchar(191) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `job_type` varchar(255) DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `career_level` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `form_link` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_location` varchar(255) DEFAULT NULL,
  `job_description` longtext DEFAULT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `education_level` varchar(255) DEFAULT NULL,
  `positions_count` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `job_requirement` text NOT NULL,
  `location` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_policies`
--

CREATE TABLE `company_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_policies`
--

INSERT INTO `company_policies` (`id`, `branch`, `title`, `description`, `description_ar`, `title_ar`, `attachment`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 5, 'Reprehenderit accus', 'Pariatur Ut lorem s', 'Sunt sed lorem aliqu', 'Recusandae Veniam', 'Screenshot 2025-01-23 at 7.35.52 PM_1738703108.png', 2, '2025-02-04 23:05:08', '2025-02-04 23:05:08');

-- --------------------------------------------------------

--
-- Table structure for table `company_structures`
--

CREATE TABLE `company_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
  `name_ar` varchar(255) NOT NULL,
  `structure_key` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_structure_employees`
--

CREATE TABLE `company_structure_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `structure_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_structure_employees`
--

INSERT INTO `company_structure_employees` (`id`, `structure_id`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 5, 136, 0, NULL, NULL),
(9, 10, 117, 0, NULL, NULL),
(10, 11, 111, 0, NULL, NULL),
(11, 12, 111, 0, NULL, NULL),
(12, 13, 111, 0, NULL, NULL),
(13, 14, 112, 0, NULL, NULL),
(14, 15, 74, 0, NULL, NULL),
(15, 16, 90, 0, NULL, NULL),
(16, 17, 94, 0, NULL, NULL),
(17, 18, 93, 0, NULL, NULL),
(18, 19, 96, 0, NULL, NULL),
(19, 20, 116, 0, NULL, NULL),
(21, 21, 74, 0, NULL, NULL),
(22, 22, 74, 0, NULL, NULL),
(23, 23, 95, 0, NULL, NULL),
(24, 24, 98, 0, NULL, NULL),
(25, 25, 97, 0, NULL, NULL),
(26, 26, 91, 0, NULL, NULL),
(27, 27, 92, 0, NULL, NULL),
(28, 28, 102, 0, NULL, NULL),
(29, 29, 106, 0, NULL, NULL),
(30, 30, 185, 0, NULL, NULL),
(31, 31, 104, 0, NULL, NULL),
(32, 32, 103, 0, NULL, NULL),
(39, 55, 242, 0, NULL, NULL),
(40, 56, 238, 0, NULL, NULL),
(41, 57, 560, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `competencies`
--

CREATE TABLE `competencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `competencies`
--

INSERT INTO `competencies` (`id`, `name`, `type`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'كفاءات القيادة', '1', '2', '2025-01-10 15:35:20', '2025-01-10 15:35:20');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `complaint_from` int(11) NOT NULL,
  `complaint_against` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `complaint_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `updated_at`, `created_at`) VALUES
(3, 'aazzz', 'elrubyomar@gmail.com', 'zzxx', 'zvxx', '2025-02-06 02:19:34', '2025-02-06 02:19:34'),
(4, 'aaa', 'elrubyomar@gmail.com', 'as', 'as', '2025-02-06 02:20:11', '2025-02-06 02:20:11'),
(5, 'aaa', 'elrubyomar@gmail.com', 'dd', 'zxz', '2025-02-06 02:22:23', '2025-02-06 02:22:23'),
(8, 'aaa', 'omar@gmail.com', 'as', 'sad', '2025-02-06 02:27:42', '2025-02-06 02:27:42');

-- --------------------------------------------------------

--
-- Table structure for table `contract_templates`
--

CREATE TABLE `contract_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `template` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` double(8,2) NOT NULL DEFAULT 0.00,
  `limit` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `name`, `code`, `discount`, `limit`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'aa', 'D3P2LLED2T', 5.00, 3, NULL, 1, '2025-01-24 00:29:00', '2025-01-24 00:29:00');

-- --------------------------------------------------------

--
-- Table structure for table `custom_questions`
--

CREATE TABLE `custom_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `is_required` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deduction_options`
--

CREATE TABLE `deduction_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deduction_options`
--

INSERT INTO `deduction_options` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Social Insurance Deduction', 'خصم التأمينات الاجتماعية', 2, '2025-01-10 15:12:08', '2025-01-12 00:58:12'),
(2, 'Loan Repayment Deduction', 'خصم سداد القرض', 2, '2025-01-10 15:12:42', '2025-01-12 00:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `employee_id`, `branch_id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(10, NULL, 6, 'Hr', 'قسم الموارد البشرية', 2, '2025-01-25 11:21:28', '2025-01-25 11:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE `deposits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `income_category_id` int(11) NOT NULL,
  `payer_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `referal_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `section_id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(5, 1, 'Recruitment Specialist', 'متخصص التوظيف', 2, '2025-01-25 11:44:27', '2025-01-25 11:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `document` varchar(255) DEFAULT NULL,
  `is_contract` tinyint(4) NOT NULL DEFAULT 0,
  `contract_specific` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `is_start_end_date` tinyint(4) NOT NULL DEFAULT 0,
  `document_type_id` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `employee_id`, `start_date`, `end_date`, `document`, `is_contract`, `contract_specific`, `name`, `name_ar`, `is_start_end_date`, `document_type_id`, `description`, `created_by`, `created_at`, `updated_at`) VALUES
(35, 3, '2025-02-01', '2025-02-28', '41081a9b2f965b50f638a25019317384_1738098429.jpg', 1, 1, 'شهادة تخرج', '', 1, 4, 'اخترت نوع ملف عقد اضغط هنا', 2, '2025-01-28 23:07:09', '2025-02-04 23:04:13'),
(36, 5, NULL, NULL, '41081a9b2f965b50f638a25019317384_1738108063.jpg', 0, 0, 'aaa', '', 0, 4, NULL, 2, '2025-01-29 01:47:43', '2025-01-29 01:47:43'),
(37, 6, NULL, NULL, '41081a9b2f965b50f638a25019317384_1738269373.jpg', 0, 0, 'omar elruby', '', 0, 4, NULL, 2, '2025-01-30 22:36:13', '2025-01-30 22:36:13'),
(38, 7, NULL, NULL, '41081a9b2f965b50f638a25019317384_1738270103.jpg', 0, 0, 'aaa', '', 0, 4, NULL, 2, '2025-01-30 22:48:23', '2025-01-30 22:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `document_types`
--

INSERT INTO `document_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(4, 'الشهادات', 'Certificates', 2, '2025-01-25 21:18:47', '2025-01-25 21:18:47'),
(5, 'Cards', 'البطاقات', 2, '2025-01-25 21:47:18', '2025-01-25 21:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `ducument_uploads`
--

CREATE TABLE `ducument_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `document_id` bigint(20) UNSIGNED DEFAULT NULL,
  `exp_date` varchar(250) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ducument_upload_images`
--

CREATE TABLE `ducument_upload_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `ducument_upload_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_register` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `dob` text DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `jobtitle_id` int(11) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `personal_email` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `branch_location` varchar(255) DEFAULT NULL,
  `insurance_number` varchar(255) DEFAULT NULL,
  `residence_number` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `work_time` varchar(255) DEFAULT NULL,
  `nationality_type` tinyint(4) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `religion` tinyint(4) DEFAULT NULL,
  `out_of_saudia` tinyint(4) DEFAULT 0,
  `employer_phone` text DEFAULT NULL,
  `place_of_issuance_of_ID_residence` text DEFAULT NULL,
  `iqama_issuance_date_Hijri` text DEFAULT NULL,
  `iqama_issuance_date_gregorian` text DEFAULT NULL,
  `iqama_issuance_expirydate_Hijri` text DEFAULT NULL,
  `iqama_issuance_expirydate_gregorian` text DEFAULT NULL,
  `iqama_attachment` text DEFAULT NULL,
  `place_of_issuance_of_passport` text DEFAULT NULL,
  `passport_issuance_date_gregorian` text DEFAULT NULL,
  `passport_issuance_expirydate_gregorian` text DEFAULT NULL,
  `passport_attachment` text DEFAULT NULL,
  `building_number` text DEFAULT NULL,
  `street_name` text DEFAULT NULL,
  `region` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `postal_code` text DEFAULT NULL,
  `mother_city` text DEFAULT NULL,
  `mother_country` text DEFAULT NULL,
  `emergency_contact_name` text DEFAULT NULL,
  `emergency_contact_relationship` text DEFAULT NULL,
  `emergency_contact_address` text DEFAULT NULL,
  `emergency_contact_phone` text DEFAULT NULL,
  `custom_field_corona` text DEFAULT NULL,
  `custom_field_notes` text DEFAULT NULL,
  `Join_date_gregorian` text DEFAULT NULL,
  `Join_date_hijri` text DEFAULT NULL,
  `labor_hire_company` text DEFAULT NULL,
  `work_unit` text DEFAULT NULL,
  `class` text DEFAULT NULL,
  `direct_manager` text DEFAULT NULL,
  `permission` text DEFAULT NULL,
  `uploading_record_permission` text DEFAULT NULL,
  `contract_type` text DEFAULT NULL,
  `contract_duration` text DEFAULT NULL,
  `employee_on_probation` text DEFAULT NULL,
  `payment_type` text DEFAULT NULL,
  `employee_account_type` text DEFAULT NULL,
  `salary_card_number` text DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `IBAN_number` text DEFAULT NULL,
  `account_holder_name_ar` text DEFAULT NULL,
  `branch_location_ar` text DEFAULT NULL,
  `sub_dep_id` int(11) DEFAULT NULL,
  `swift_code` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `bank_country` text DEFAULT NULL,
  `policy_number` text DEFAULT NULL,
  `insurance_startdate` text DEFAULT NULL,
  `category` text DEFAULT NULL,
  `salary_type` varchar(255) DEFAULT NULL,
  `cost` text DEFAULT NULL,
  `salary` text DEFAULT NULL,
  `net_salary` varchar(255) DEFAULT NULL,
  `availability_health_insurance_council` text DEFAULT NULL,
  `health_insurance_council_startdate` text DEFAULT NULL,
  `insurance_document` text DEFAULT NULL,
  `annual_leave_entitlement` text DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `fingerprint_out_campany` varchar(255) NOT NULL DEFAULT '0',
  `skip_start_work_location` int(11) NOT NULL DEFAULT 0,
  `read_slate` int(11) DEFAULT 0,
  `on_off_notification` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `user_id`, `user_register`, `name`, `name_ar`, `dob`, `nationality_id`, `jobtitle_id`, `gender`, `phone`, `address`, `email`, `personal_email`, `password`, `employee_id`, `branch_id`, `department_id`, `section_id`, `designation_id`, `account_holder_name`, `account_number`, `bank_name`, `branch_location`, `insurance_number`, `residence_number`, `passport_number`, `city`, `work_time`, `nationality_type`, `is_active`, `created_by`, `created_at`, `updated_at`, `religion`, `out_of_saudia`, `employer_phone`, `place_of_issuance_of_ID_residence`, `iqama_issuance_date_Hijri`, `iqama_issuance_date_gregorian`, `iqama_issuance_expirydate_Hijri`, `iqama_issuance_expirydate_gregorian`, `iqama_attachment`, `place_of_issuance_of_passport`, `passport_issuance_date_gregorian`, `passport_issuance_expirydate_gregorian`, `passport_attachment`, `building_number`, `street_name`, `region`, `country`, `postal_code`, `mother_city`, `mother_country`, `emergency_contact_name`, `emergency_contact_relationship`, `emergency_contact_address`, `emergency_contact_phone`, `custom_field_corona`, `custom_field_notes`, `Join_date_gregorian`, `Join_date_hijri`, `labor_hire_company`, `work_unit`, `class`, `direct_manager`, `permission`, `uploading_record_permission`, `contract_type`, `contract_duration`, `employee_on_probation`, `payment_type`, `employee_account_type`, `salary_card_number`, `bank_id`, `IBAN_number`, `account_holder_name_ar`, `branch_location_ar`, `sub_dep_id`, `swift_code`, `sort_code`, `bank_country`, `policy_number`, `insurance_startdate`, `category`, `salary_type`, `cost`, `salary`, `net_salary`, `availability_health_insurance_council`, `health_insurance_council_startdate`, `insurance_document`, `annual_leave_entitlement`, `shift`, `location`, `fingerprint_out_campany`, `skip_start_work_location`, `read_slate`, `on_off_notification`) VALUES
(3, 709, 1, 'omar elruby', 'omar elruby', '26-01-2025', NULL, 1, 'Male', '01102021700', NULL, 'elrubyomar@gmail.com', 'elrubyomar@gmail.com', '$2y$10$mhntYNPU2ewX13LqhWvFQ.U3MuchcnR2uTtdpWbsJ2TvbppePKqAe', '2', 1, 10, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, 2, '2025-01-26 13:03:43', '2025-01-27 15:38:55', 1, 1, '01102021700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '26-01-2025', NULL, NULL, NULL, '6 october city ,cairo -egypt', NULL, 'Egypt', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '0', '2', NULL, 'on', '1', '1', '0', 'cash', '0', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '20-01-2026', NULL, NULL, NULL, '5000', '2824', '20-01-2026', '20-01-2026', NULL, NULL, NULL, NULL, '0', 0, 0, 1),
(5, 711, 1, 'Ahmed Malek', 'أحمد مالك', '02-01-2025', NULL, 1, 'Male', '0110202022', NULL, 'malek@gmail.com', 'malek@gmail.com', '$2y$10$dpWDimgv8GCpkeSUPfRSwOYk/iNvo3N9YkIwDhD9G.l0vwXcpwPdK', '4', 1, 10, 1, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, 2, '2025-01-28 13:22:29', '2025-01-28 13:50:05', 1, 1, '01102021700', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'حلوان القاهرة', NULL, 'Egypt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '0', '2', NULL, 'on', '1', '1', '0', 'cash', '0', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '20-01-2028', NULL, NULL, NULL, '3000', '2873', '20-01-2028', '20-01-2028', NULL, NULL, NULL, NULL, '0', 0, 0, 1),
(6, 712, 1, 'depadmin', 'depadmin', '29-01-2025', NULL, 1, 'Male', '0112020220', NULL, 'depadmin@gmail.com', 'depadmin@gmail.com', '$2y$10$mTdqP7YSuxIylfg2taKqUOdpFci2ZFtBEew7iLqcmty972Tsc2L4G', '6', 1, 10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, 2, '2025-01-29 20:56:17', '2025-01-30 14:26:07', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6 october city ,cairo -egypt', NULL, 'Egypt', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '0', '2', NULL, 'on', '1', '1', '0', 'cash', '0', NULL, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, '20-01-2029', NULL, NULL, NULL, NULL, '0', '20-01-2029', '20-01-2029', NULL, NULL, NULL, NULL, '0', 0, 0, 1),
(7, 713, 1, 'subdepadmin', 'subdepadmin', '29-01-2025', NULL, 1, 'Male', '01102021700', NULL, 'subdepadmin@gmail.com', 'subdepadmin@gmail.com', '$2y$10$jiZmO/9G9r/KYttZ6wzc8eVI3K6BhD3DrbWIsNEPgs92WZ5hpdGum', '7', 1, 10, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, 2, '2025-01-29 20:57:30', '2025-01-30 14:27:33', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '1', '0', '2', NULL, 'on', '1', '1', '0', 'cash', '0', NULL, 1, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, '20-01-2029', NULL, NULL, NULL, NULL, '0', '20-01-2029', '20-01-2029', NULL, NULL, NULL, NULL, '0', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_branches`
--

CREATE TABLE `employee_branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `branch_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_breaks`
--

CREATE TABLE `employee_breaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `break_id` bigint(20) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_contracts`
--

CREATE TABLE `employee_contracts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `contract_type` tinyint(4) DEFAULT NULL,
  `contract_duration` int(11) DEFAULT NULL,
  `contract_startdate` date DEFAULT NULL,
  `contract_startdate_hijri` varchar(200) DEFAULT NULL,
  `contract_enddate` date DEFAULT NULL,
  `contract_enddate_hijri` varchar(200) DEFAULT NULL,
  `contract_document` varchar(255) DEFAULT NULL,
  `medical_insurance` tinyint(4) NOT NULL,
  `insurance_startdate` date DEFAULT NULL,
  `insurance_enddate` date DEFAULT NULL,
  `insurance_document` varchar(255) DEFAULT NULL,
  `worker` tinyint(4) NOT NULL,
  `worker_startdate` date DEFAULT NULL,
  `worker_enddate` date DEFAULT NULL,
  `worker_document` varchar(255) DEFAULT NULL,
  `residence_number` varchar(255) DEFAULT NULL,
  `residence_expiredate` date DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_expiredate` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contracts`
--

INSERT INTO `employee_contracts` (`id`, `employee_id`, `contract_type`, `contract_duration`, `contract_startdate`, `contract_startdate_hijri`, `contract_enddate`, `contract_enddate_hijri`, `contract_document`, `medical_insurance`, `insurance_startdate`, `insurance_enddate`, `insurance_document`, `worker`, `worker_startdate`, `worker_enddate`, `worker_document`, `residence_number`, `residence_expiredate`, `passport_number`, `passport_expiredate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-12 01:28:21', '2025-01-12 01:28:21'),
(2, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-12 15:36:43', '2025-01-12 15:36:43'),
(3, 3, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-12 16:47:28', '2025-01-12 16:47:28'),
(4, 4, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-12 16:28:56', '2025-01-12 16:28:56'),
(5, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-13 15:11:22', '2025-01-13 15:11:22'),
(6, 6, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-15 23:30:07', '2025-01-15 23:30:07'),
(7, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-15 23:39:05', '2025-01-15 23:39:05'),
(8, 8, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-15 23:39:31', '2025-01-15 23:39:31'),
(9, 9, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-18 21:24:52', '2025-01-18 21:24:52'),
(10, 10, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-18 22:40:18', '2025-01-18 22:40:18'),
(11, 11, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-22 08:39:36', '2025-01-22 08:39:36'),
(12, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-25 14:19:24', '2025-01-25 14:19:24'),
(13, 3, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-26 13:03:44', '2025-01-26 13:03:44'),
(14, 5, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-28 13:22:29', '2025-01-28 13:22:29'),
(15, 6, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-29 20:56:17', '2025-01-29 20:56:17'),
(16, 7, 1, 1, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-29 20:57:30', '2025-01-29 20:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_documents`
--

CREATE TABLE `employee_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `document_id` int(11) NOT NULL,
  `document_value` varchar(255) NOT NULL,
  `document_type_id` int(11) DEFAULT NULL,
  `document_type_value` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_finger_print_locations`
--

CREATE TABLE `employee_finger_print_locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_followers`
--

CREATE TABLE `employee_followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `relationship` varchar(255) DEFAULT NULL,
  `nationality_type` tinyint(4) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `social_status` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `medical_insurance_number` varchar(255) DEFAULT NULL,
  `medical_insurance_expiry_date` date DEFAULT NULL,
  `residence_number` varchar(255) DEFAULT NULL,
  `passport_number` varchar(255) DEFAULT NULL,
  `passport_expiry_date` date DEFAULT NULL,
  `documents` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_permissions`
--

CREATE TABLE `employee_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `from` varchar(255) DEFAULT NULL,
  `to` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `message` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint(20) DEFAULT NULL,
  `admin_message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee_requests`
--

CREATE TABLE `employee_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `request_type_id` int(11) NOT NULL,
  `sub_request_type_id` int(11) DEFAULT NULL,
  `applied_on` date NOT NULL,
  `start_date` date NOT NULL,
  `reject_reason` text DEFAULT NULL,
  `end_date` date NOT NULL,
  `request_reason` varchar(255) DEFAULT NULL,
  `request_reason_ar` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_requests`
--

INSERT INTO `employee_requests` (`id`, `employee_id`, `request_type_id`, `sub_request_type_id`, `applied_on`, `start_date`, `reject_reason`, `end_date`, `request_reason`, `request_reason_ar`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 3, 1, NULL, '2025-01-29', '2025-01-31', 'ee', '2025-02-04', 'da', 'vvvvvvvvvvvvv', '2', 2, '2025-01-29 15:48:44', '2025-02-03 00:16:07'),
(4, 3, 1, NULL, '2025-01-29', '2025-01-17', 'aa', '2025-01-22', 'aa', 'ee', '2', 2, '2025-01-29 16:04:48', '2025-02-03 00:15:52'),
(5, 7, 1, NULL, '2025-01-29', '2025-01-23', NULL, '2025-01-31', 'ثث', 'ءء', '1', 2, '2025-01-29 21:02:11', '2025-02-03 00:27:29'),
(6, 6, 1, NULL, '2025-01-29', '2025-01-23', 'h', '2025-01-30', 'Dep admin', 'Dep admin', '2', 2, '2025-01-29 23:39:23', '2025-02-03 00:28:00'),
(7, 3, 1, NULL, '2025-02-01', '2025-02-18', 'وقت غير مناسبvv', '2025-02-26', 'أجازة عادية', 'أجازة عادية', '0', 2, '2025-02-01 20:30:15', '2025-02-01 20:49:17'),
(8, 6, 1, 3, '2025-02-03', '2025-02-12', NULL, '2025-02-18', 'aaa', 'ccc', '0', 2, '2025-02-03 02:15:39', '2025-02-03 02:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `employee_shifts`
--

CREATE TABLE `employee_shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `shift_days` text DEFAULT NULL,
  `shift_starttime` time DEFAULT NULL,
  `shift_endtime` time DEFAULT NULL,
  `buffer_time` time DEFAULT NULL,
  `shift_startdate` date DEFAULT NULL,
  `shift_type` varchar(255) DEFAULT NULL,
  `allowed_delay` tinyint(4) DEFAULT NULL,
  `allowed_delay_minutes` int(11) DEFAULT NULL,
  `split_time` time DEFAULT NULL,
  `second_shift_start_time` time DEFAULT NULL,
  `second_shift_exit_time` time DEFAULT NULL,
  `work_times` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_shifts`
--

INSERT INTO `employee_shifts` (`id`, `name`, `name_ar`, `shift_days`, `shift_starttime`, `shift_endtime`, `buffer_time`, `shift_startdate`, `shift_type`, `allowed_delay`, `allowed_delay_minutes`, `split_time`, `second_shift_start_time`, `second_shift_exit_time`, `work_times`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Shift A', 'دوام A', '01,03', '02:23:00', '02:26:00', NULL, '2025-01-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025-01-12 01:24:49', '2025-01-12 01:24:49'),
(2, 'New Shift', 'شيفت جديد', '02,03,04,05,06', '08:00:00', '17:00:00', NULL, '2025-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, '2025-01-22 19:37:31', '2025-01-22 19:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `employee_tasks`
--

CREATE TABLE `employee_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `type` enum('monthly','quarter','semi','yearly') DEFAULT NULL,
  `status` enum('pending','completed') DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `title` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_answers`
--

CREATE TABLE `evaluation_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_id` bigint(20) DEFAULT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `result` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT 0.00,
  `employee_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_categories`
--

CREATE TABLE `evaluation_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_results`
--

CREATE TABLE `evaluation_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `evaluation_id` bigint(20) DEFAULT NULL,
  `result` double(8,2) NOT NULL DEFAULT 0.00,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_sections`
--

CREATE TABLE `evaluation_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `evaluation_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) DEFAULT NULL,
  `department_id` longtext DEFAULT NULL,
  `employee_id` longtext DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `noted` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `lectures` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `branch_id`, `department_id`, `employee_id`, `title`, `start_date`, `end_date`, `start_time`, `color`, `description`, `description_ar`, `title_ar`, `noted`, `created_by`, `created_at`, `updated_at`, `end_time`, `lectures`, `location`, `about`, `photo`) VALUES
(1, 1, '[\"3\",\"4\",\"5\"]', '[\"5\"]', 'عنوان الحدث', '2025-01-18', '2025-01-24', NULL, '#FF5630', 'عنوان الحدث', 'عنوان الحدث', 'عنوان الحدث', 0, 2, '2025-01-18 11:01:07', '2025-01-18 11:01:07', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_employees`
--

CREATE TABLE `event_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_employees`
--

INSERT INTO `event_employees` (`id`, `event_id`, `employee_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 2, '2025-01-18 11:01:07', '2025-01-18 11:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `payee_id` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `referal_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fcm`
--

CREATE TABLE `fcm` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `description_ar` mediumtext DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `title`, `title_ar`, `description`, `description_ar`, `icon`, `updated_at`, `created_at`) VALUES
(3, 'Employee Management', 'إدارة الموظفين', 'Centralized employee database with profiles 📋\r\n Easy access to personal, job, and payroll details 🗂️\r\n Document storage for contracts, IDs, and certificates 📑', 'قاعدة بيانات مركزية للموظفين مع ملفات تعريف 📋\r\n سهولة الوصول إلى التفاصيل الشخصية والوظيفية وتفاصيل الرواتب 🗂️\r\n تخزين المستندات للعقود والهويات والشهادات 📑', 'features/Vv6J2ieXrH7TCGa5WGv6MQ7WZ74RoOlXzm2eAi80.png', '2025-02-06 10:22:09', '2025-02-05 00:13:29'),
(4, 'Attendance & Time Tracking', 'الحضور وتتبع الوقت', 'Automated clock-in/out with biometric or GPS tracking ⏰\r\n Real-time attendance monitoring 📊\r\nOvertime and leave tracking 📅', 'تسجيل الدخول والخروج الآلي مع التتبع البيومتري أو نظام تحديد المواقع العالمي (GPS) ⏰\r\nمراقبة الحضور في الوقت الفعلي 📊\r\nتتبع العمل الإضافي والإجازات 📅', 'features/GIeMN4oEHtRoIqMgfFbRsUK0sDZr36wvzNJVCJkC.png', '2025-02-06 10:26:04', '2025-02-06 10:26:04'),
(5, 'Payroll & Compensation Management', 'إدارة الرواتب والتعويضات', 'Calculate salaries with tax and benefits deductions 💰\r\nCreate payroll and direct bank transfers 🏦\r\nComply with the legal regulations of the Labor and Workers Office ✅', 'حساب الرواتب مع خصم الضرائب والمزايا 💰\r\nإنشاء كشوف الرواتب والتحويلات المصرفية المباشرة 🏦\r\nالامتثال للوائح القانونية لمكتب العمل والعمال ✅', 'features/ld9S6UuO0BVsHC9ZnSnqwqdkoTA4QaVI2Op55VSZ.png', '2025-02-06 10:32:49', '2025-02-06 10:32:49'),
(6, 'Leave & Absence Management', 'إدارة الإجازات والغياب', 'Online leave requests & approvals 🏖️\r\n Customizable leave policies 🎯\r\nHoliday & sick leave tracking 🏥', 'طلبات الإجازات والموافقات عليها عبر الإنترنت 🏖️ سياسات إجازات قابلة للتخصيص 🎯\r\nتتبع الإجازات والعطلات المرضية 🏥', 'features/vfAZ1t6Nhu30wQBOWjyVCfuwxjuhhGhx2MfCOamK.png', '2025-02-06 10:36:37', '2025-02-06 10:36:37'),
(7, 'Performance & Appraisal Management', 'إدارة الأداء والتقييم', 'KPI-based performance evaluations 📈\r\n 360-degree feedback system 🔄\r\nGoal setting & employee growth tracking 🚀', 'تقييمات الأداء القائمة على مؤشرات الأداء الرئيسية 📈\r\nنظام تقييم شامل 🔄\r\nتحديد الأهداف وتتبع نمو الموظفين 🚀', 'features/au3ShRI3O3mi1BFGUXYypdBRkZAoY9QLgihq3Jl6.png', '2025-02-06 10:39:48', '2025-02-06 10:39:48'),
(8, 'Recruitment & Onboarding', 'التوظيف والتوجيه', 'Job posting & applicant tracking system (ATS) 📝\r\nResume parsing & candidate scoring 🤖\r\nSmooth onboarding process with task automation 🎯', 'نظام نشر الوظائف وتتبع المتقدمين (ATS) 📝\r\nتحليل السيرة الذاتية وتقييم المرشحين 🤖\r\nعملية توجيه سلسة مع أتمتة المهام 🎯', 'features/kaL0AUqow5Pxdk62gagsaMpa1lkSKGq6f8nZjN0W.png', '2025-02-06 10:44:23', '2025-02-06 10:44:23'),
(9, 'Employee Self-Service (ESS) Portal', 'بوابة الخدمة الذاتية للموظفين (ESS)', 'Employees can view payslips, request leaves & update info 🖥️\r\nManagers can approve requests on the go ✅\r\nAccessible via mobile & web 🌍', 'يمكن للموظفين عرض كشوف المرتبات وطلب الإجازات وتحديث المعلومات 🖥️\r\nيمكن للمديرين الموافقة على الطلبات أثناء التنقل ✅\r\nيمكن الوصول إليها عبر الهاتف المحمول والويب 🌍', 'features/wLOfja54Phnx50nlAg3c2dQvhQhA2hz0iuTcSdDz.jpg', '2025-02-06 10:47:41', '2025-02-06 10:47:41'),
(10, 'Compliance & Legal Management', 'إدارة الامتثال والقانونية', 'Automated labor law compliance 📜\r\nEmployee contract & policy tracking 🔍\r\nGDPR & data protection adherence 🔐', 'الامتثال لقانون العمل والعمال 📜\r\nتتبع عقود الموظفين والسياسات 🔍\r\nالالتزام بقانون حماية البيانات العامة وحماية البيانات 🔐', 'features/U7P5m1ogvHcjxiKpbICK3RhS7RdeyCjVKpU94T4r.jpg', '2025-02-06 11:07:51', '2025-02-06 10:51:13'),
(11, 'Reports & Analytics', 'التقارير والتحليلات', 'HR dashboards for real-time insights 📊\r\nCustomizable reports for decision-making 📈\r\nAI-driven workforce predictions 🤖', 'لوحات معلومات الموارد البشرية للحصول على رؤى في الوقت الفعلي 📊\r\nتقارير قابلة للتخصيص لاتخاذ القرارات 📈\r\nتوقعات القوى العاملة المدعومة بالذكاء الاصطناعي 🤖', 'features/XSR8HqmMRPM2VTyyucUEmq6UomJA3XHAa7onhe9P.png', '2025-02-06 10:54:02', '2025-02-06 10:54:02');

-- --------------------------------------------------------

--
-- Table structure for table `front_setting`
--

CREATE TABLE `front_setting` (
  `id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `front_setting`
--

INSERT INTO `front_setting` (`id`, `address`, `map`, `email`, `facebook`, `twitter`, `instagram`, `linkedin`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'KSA', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463879.6380948855!2d47.15218084420127!3d24.724831559335883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1738793399926!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'email@example.com', 'https://facebook.com/default', 'https://twitter.com/default', 'https://instagram.com/default', 'https://linkedin.com/default', '0555555555', '2025-02-04 14:32:17', '2025-02-06 10:58:24'),
(3, 'Default Address', NULL, 'default@example.com', 'https://facebook.com/default', 'https://twitter.com/default', 'https://instagram.com/default', 'https://linkedin.com/default', '000-000-0000', '2025-02-06 00:06:58', '2025-02-06 00:06:58'),
(4, 'Default Address', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d463879.6380948855!2d47.15218084420127!3d24.724831559335883!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03890d489399%3A0xba974d1c98e79fd5!2z2KfZhNix2YrYp9i2INin2YTYs9i52YjYr9mK2Kk!5e0!3m2!1sar!2seg!4v1738793399926!5m2!1sar!2seg\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'default@example.com', 'https://facebook.com/default', 'https://twitter.com/default', 'https://instagram.com/default', 'https://linkedin.com/default', '000-000-0000', '2025-02-06 00:11:23', '2025-02-06 00:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `genrate_payslip_options`
--

CREATE TABLE `genrate_payslip_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_trackings`
--

CREATE TABLE `goal_trackings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL,
  `goal_type` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `target_achievement` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `description_ar` text NOT NULL,
  `subject_ar` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `progress` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `goal_types`
--

CREATE TABLE `goal_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `goal_types`
--

INSERT INTO `goal_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Strategic Goals', 'الأهداف الاستراتيجية', 2, '2025-01-10 15:23:11', '2025-01-10 15:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `occasion` text NOT NULL,
  `occasion_ar` varchar(191) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `date`, `occasion`, `occasion_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '2025-01-09', 'New Year', 'رأس السنة', 2, '2025-01-12 01:18:52', '2025-01-12 01:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `holiday_types`
--

CREATE TABLE `holiday_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_section`
--

CREATE TABLE `home_section` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `description_ar` mediumtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_section`
--

INSERT INTO `home_section` (`id`, `title`, `description`, `image`, `title_ar`, `description_ar`, `created_at`, `updated_at`) VALUES
(0, 'Welcome to mwaredi Smart HR Solutions for a Smarter Workforce', 'At Wmaredi, we believe that managing your workforce should be simple, efficient, and stress-free. Our all-in-one HR Management System is designed to streamline HR processes, empower employees, and help businesses of all sizes grow with confidence.', 'home_sections/cNT7HM2Jm3scZeJuzDe97whFAlHzHqkyZpPJaq4s.png', 'مرحبًا بكم في مواردي حلول الموارد البشرية الذكية لقوة عاملة أكثر ذكاءً', 'في مواردي، نؤمن بأن إدارة القوى العاملة الخاصة بك يجب أن تكون بسيطة وفعالة وخالية من التوتر. تم تصميم نظام إدارة الموارد البشرية الشامل لدينا لتبسيط عمليات الموارد البشرية وتمكين الموظفين ومساعدة الشركات من جميع الأحجام على النمو بثقة.', '2025-02-04 01:10:49', '2025-02-06 12:23:15'),
(0, 'Welcome to mwaredi Smart HR Solutions for a Smarter Workforce', 'At Wmaredi, we believe that managing your workforce should be simple, efficient, and stress-free. Our all-in-one HR Management System is designed to streamline HR processes, empower employees, and help businesses of all sizes grow with confidence.', 'home_sections/cNT7HM2Jm3scZeJuzDe97whFAlHzHqkyZpPJaq4s.png', 'مرحبًا بكم في مواردي حلول الموارد البشرية الذكية لقوة عاملة أكثر ذكاءً', 'في مواردي، نؤمن بأن إدارة القوى العاملة الخاصة بك يجب أن تكون بسيطة وفعالة وخالية من التوتر. تم تصميم نظام إدارة الموارد البشرية الشامل لدينا لتبسيط عمليات الموارد البشرية وتمكين الموظفين ومساعدة الشركات من جميع الأحجام على النمو بثقة.', '2025-02-04 02:07:58', '2025-02-06 12:23:15'),
(0, 'Default Title', 'At Wmaredi, we believe that managing your workforce should be simple, efficient, and stress-free. Our all-in-one HR Management System is designed to streamline HR processes, empower employees, and help businesses of all sizes grow with confidence.', 'home_sections/cNT7HM2Jm3scZeJuzDe97whFAlHzHqkyZpPJaq4s.png', 'عنوان افتراضي', 'في مواردي، نؤمن بأن إدارة القوى العاملة الخاصة بك يجب أن تكون بسيطة وفعالة وخالية من التوتر. تم تصميم نظام إدارة الموارد البشرية الشامل لدينا لتبسيط عمليات الموارد البشرية وتمكين الموظفين ومساعدة الشركات من جميع الأحجام على النمو بثقة.', '2025-02-06 09:58:09', '2025-02-06 12:23:15'),
(0, 'Default Title', 'Default description', 'home_sections/cNT7HM2Jm3scZeJuzDe97whFAlHzHqkyZpPJaq4s.png', 'عنوان افتراضي', 'وصف افتراضي', '2025-02-06 10:00:32', '2025-02-06 12:23:15');

-- --------------------------------------------------------

--
-- Table structure for table `income_types`
--

CREATE TABLE `income_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indicators`
--

CREATE TABLE `indicators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `department` int(11) NOT NULL DEFAULT 0,
  `designation` int(11) NOT NULL DEFAULT 0,
  `rating` varchar(255) DEFAULT NULL,
  `customer_experience` int(11) NOT NULL DEFAULT 0,
  `marketing` int(11) NOT NULL DEFAULT 0,
  `administration` int(11) NOT NULL DEFAULT 0,
  `professionalism` int(11) NOT NULL DEFAULT 0,
  `integrity` int(11) NOT NULL DEFAULT 0,
  `attendance` int(11) NOT NULL DEFAULT 0,
  `created_user` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `insurance_companies`
--

CREATE TABLE `insurance_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interview_schedules`
--

CREATE TABLE `interview_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate` int(11) NOT NULL,
  `employee` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `comment` text DEFAULT NULL,
  `employee_response` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `in_out_logs`
--

CREATE TABLE `in_out_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `requirement` text DEFAULT NULL,
  `branch` int(11) NOT NULL DEFAULT 0,
  `category` int(11) NOT NULL DEFAULT 0,
  `skill` text DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `applicant` varchar(255) DEFAULT NULL,
  `visibility` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `custom_question` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobtitles`
--

CREATE TABLE `jobtitles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobtitles`
--

INSERT INTO `jobtitles` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'CEO', 'مدير تنفيذي', 2, '2025-01-12 01:04:02', '2025-01-12 01:04:02'),
(2, 'CMO', 'مدير طبي', 2, '2025-01-12 01:04:22', '2025-01-12 01:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `cover_letter` text DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `stage` int(11) NOT NULL DEFAULT 1,
  `order` int(11) NOT NULL DEFAULT 0,
  `skill` text DEFAULT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `is_archive` int(11) NOT NULL DEFAULT 0,
  `custom_question` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_application_notes`
--

CREATE TABLE `job_application_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` int(11) NOT NULL DEFAULT 0,
  `note_created` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_categories`
--

CREATE TABLE `job_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_categories`
--

INSERT INTO `job_categories` (`id`, `title`, `title_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Administrative Jobs', 'الوظائف الإدارية', 2, '2025-01-10 15:28:24', '2025-01-10 15:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_answers`
--

CREATE TABLE `job_offer_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_offer_user_id` bigint(20) UNSIGNED NOT NULL,
  `company_job_request_id` bigint(20) UNSIGNED NOT NULL,
  `job_offer_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `points` double(8,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_questions`
--

CREATE TABLE `job_offer_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `job_offer_section_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `point` double(8,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_question_options`
--

CREATE TABLE `job_offer_question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `job_offer_question_id` bigint(20) UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_sections`
--

CREATE TABLE `job_offer_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `company_job_request_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_offer_users`
--

CREATE TABLE `job_offer_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `company_job_request_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(255) NOT NULL,
  `nationality_id` bigint(20) UNSIGNED NOT NULL,
  `qualification_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `field_of_study` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `graduation_year` varchar(255) DEFAULT NULL,
  `grade` varchar(255) DEFAULT NULL,
  `portfolio_link` varchar(255) DEFAULT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `interview_from` timestamp NULL DEFAULT NULL,
  `interview_to` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_on_boards`
--

CREATE TABLE `job_on_boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application` int(11) NOT NULL,
  `joining_date` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `convert_to_employee` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_requests`
--

CREATE TABLE `job_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_job_request_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `findus` varchar(255) DEFAULT NULL,
  `interview_day` varchar(255) DEFAULT NULL,
  `field` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` text DEFAULT NULL,
  `education` text DEFAULT NULL,
  `experience` varchar(255) DEFAULT NULL,
  `linkedin_profile` text DEFAULT NULL,
  `join_us_date` varchar(255) DEFAULT NULL,
  `salary` varchar(255) DEFAULT NULL,
  `english_rate` varchar(255) DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_stages`
--

CREATE TABLE `job_stages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_stages`
--

INSERT INTO `job_stages` (`id`, `title`, `title_ar`, `order`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Internship/Trainee', 'التدريب/المتدرب', 0, 2, '2025-01-10 15:30:04', '2025-01-10 15:30:04'),
(2, 'Entry-Level/Junior', 'مستوى المبتدئين', 0, 2, '2025-01-10 15:30:37', '2025-01-10 15:30:37'),
(3, 'Applied', '', 0, 673, '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(4, 'Phone Screen', '', 0, 673, '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(5, 'Interview', '', 0, 673, '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(6, 'Hired', '', 0, 673, '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(7, 'Rejected', '', 0, 673, '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(8, 'Applied', '', 0, 673, '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(9, 'Phone Screen', '', 0, 673, '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(10, 'Interview', '', 0, 673, '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(11, 'Hired', '', 0, 673, '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(12, 'Rejected', '', 0, 673, '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(13, 'Applied', '', 0, 676, '2025-01-15 02:10:03', '2025-01-15 02:10:03'),
(14, 'Phone Screen', '', 0, 676, '2025-01-15 02:10:03', '2025-01-15 02:10:03'),
(15, 'Interview', '', 0, 676, '2025-01-15 02:10:03', '2025-01-15 02:10:03'),
(16, 'Hired', '', 0, 676, '2025-01-15 02:10:03', '2025-01-15 02:10:03'),
(17, 'Rejected', '', 0, 676, '2025-01-15 02:10:03', '2025-01-15 02:10:03'),
(18, 'Applied', '', 0, 677, '2025-01-15 02:11:37', '2025-01-15 02:11:37'),
(19, 'Phone Screen', '', 0, 677, '2025-01-15 02:11:37', '2025-01-15 02:11:37'),
(20, 'Interview', '', 0, 677, '2025-01-15 02:11:37', '2025-01-15 02:11:37'),
(21, 'Hired', '', 0, 677, '2025-01-15 02:11:37', '2025-01-15 02:11:37'),
(22, 'Rejected', '', 0, 677, '2025-01-15 02:11:37', '2025-01-15 02:11:37'),
(23, 'Applied', '', 0, 678, '2025-01-15 02:14:26', '2025-01-15 02:14:26'),
(24, 'Phone Screen', '', 0, 678, '2025-01-15 02:14:26', '2025-01-15 02:14:26'),
(25, 'Interview', '', 0, 678, '2025-01-15 02:14:26', '2025-01-15 02:14:26'),
(26, 'Hired', '', 0, 678, '2025-01-15 02:14:26', '2025-01-15 02:14:26'),
(27, 'Rejected', '', 0, 678, '2025-01-15 02:14:26', '2025-01-15 02:14:26'),
(28, 'Applied', '', 0, 679, '2025-01-15 02:16:33', '2025-01-15 02:16:33'),
(29, 'Phone Screen', '', 0, 679, '2025-01-15 02:16:33', '2025-01-15 02:16:33'),
(30, 'Interview', '', 0, 679, '2025-01-15 02:16:33', '2025-01-15 02:16:33'),
(31, 'Hired', '', 0, 679, '2025-01-15 02:16:33', '2025-01-15 02:16:33'),
(32, 'Rejected', '', 0, 679, '2025-01-15 02:16:33', '2025-01-15 02:16:33'),
(33, 'Applied', '', 0, 686, '2025-01-15 11:24:30', '2025-01-15 11:24:30'),
(34, 'Phone Screen', '', 0, 686, '2025-01-15 11:24:30', '2025-01-15 11:24:30'),
(35, 'Interview', '', 0, 686, '2025-01-15 11:24:30', '2025-01-15 11:24:30'),
(36, 'Hired', '', 0, 686, '2025-01-15 11:24:30', '2025-01-15 11:24:30'),
(37, 'Rejected', '', 0, 686, '2025-01-15 11:24:30', '2025-01-15 11:24:30'),
(38, 'Applied', '', 0, 687, '2025-01-15 21:12:19', '2025-01-15 21:12:19'),
(39, 'Phone Screen', '', 0, 687, '2025-01-15 21:12:19', '2025-01-15 21:12:19'),
(40, 'Interview', '', 0, 687, '2025-01-15 21:12:19', '2025-01-15 21:12:19'),
(41, 'Hired', '', 0, 687, '2025-01-15 21:12:19', '2025-01-15 21:12:19'),
(42, 'Rejected', '', 0, 687, '2025-01-15 21:12:19', '2025-01-15 21:12:19'),
(43, 'Applied', '', 0, 691, '2025-01-16 11:57:49', '2025-01-16 11:57:49'),
(44, 'Phone Screen', '', 0, 691, '2025-01-16 11:57:49', '2025-01-16 11:57:49'),
(45, 'Interview', '', 0, 691, '2025-01-16 11:57:49', '2025-01-16 11:57:49'),
(46, 'Hired', '', 0, 691, '2025-01-16 11:57:49', '2025-01-16 11:57:49'),
(47, 'Rejected', '', 0, 691, '2025-01-16 11:57:49', '2025-01-16 11:57:49'),
(48, 'Applied', '', 0, 692, '2025-01-16 12:35:26', '2025-01-16 12:35:26'),
(49, 'Phone Screen', '', 0, 692, '2025-01-16 12:35:26', '2025-01-16 12:35:26'),
(50, 'Interview', '', 0, 692, '2025-01-16 12:35:26', '2025-01-16 12:35:26'),
(51, 'Hired', '', 0, 692, '2025-01-16 12:35:26', '2025-01-16 12:35:26'),
(52, 'Rejected', '', 0, 692, '2025-01-16 12:35:26', '2025-01-16 12:35:26'),
(53, 'Applied', '', 0, 693, '2025-01-17 09:16:47', '2025-01-17 09:16:47'),
(54, 'Phone Screen', '', 0, 693, '2025-01-17 09:16:47', '2025-01-17 09:16:47'),
(55, 'Interview', '', 0, 693, '2025-01-17 09:16:47', '2025-01-17 09:16:47'),
(56, 'Hired', '', 0, 693, '2025-01-17 09:16:47', '2025-01-17 09:16:47'),
(57, 'Rejected', '', 0, 693, '2025-01-17 09:16:47', '2025-01-17 09:16:47'),
(58, 'Applied', '', 0, 697, '2025-01-23 23:28:20', '2025-01-23 23:28:20'),
(59, 'Phone Screen', '', 0, 697, '2025-01-23 23:28:20', '2025-01-23 23:28:20'),
(60, 'Interview', '', 0, 697, '2025-01-23 23:28:20', '2025-01-23 23:28:20'),
(61, 'Hired', '', 0, 697, '2025-01-23 23:28:20', '2025-01-23 23:28:20'),
(62, 'Rejected', '', 0, 697, '2025-01-23 23:28:20', '2025-01-23 23:28:20'),
(63, 'Applied', '', 0, 698, '2025-01-24 11:14:27', '2025-01-24 11:14:27'),
(64, 'Phone Screen', '', 0, 698, '2025-01-24 11:14:27', '2025-01-24 11:14:27'),
(65, 'Interview', '', 0, 698, '2025-01-24 11:14:27', '2025-01-24 11:14:27'),
(66, 'Hired', '', 0, 698, '2025-01-24 11:14:27', '2025-01-24 11:14:27'),
(67, 'Rejected', '', 0, 698, '2025-01-24 11:14:27', '2025-01-24 11:14:27'),
(68, 'Applied', '', 0, 699, '2025-01-24 13:37:48', '2025-01-24 13:37:48'),
(69, 'Phone Screen', '', 0, 699, '2025-01-24 13:37:48', '2025-01-24 13:37:48'),
(70, 'Interview', '', 0, 699, '2025-01-24 13:37:48', '2025-01-24 13:37:48'),
(71, 'Hired', '', 0, 699, '2025-01-24 13:37:48', '2025-01-24 13:37:48'),
(72, 'Rejected', '', 0, 699, '2025-01-24 13:37:48', '2025-01-24 13:37:48'),
(73, 'Applied', '', 0, 700, '2025-01-24 13:45:16', '2025-01-24 13:45:16'),
(74, 'Phone Screen', '', 0, 700, '2025-01-24 13:45:16', '2025-01-24 13:45:16'),
(75, 'Interview', '', 0, 700, '2025-01-24 13:45:16', '2025-01-24 13:45:16'),
(76, 'Hired', '', 0, 700, '2025-01-24 13:45:16', '2025-01-24 13:45:16'),
(77, 'Rejected', '', 0, 700, '2025-01-24 13:45:16', '2025-01-24 13:45:16'),
(78, 'Applied', '', 0, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45'),
(79, 'Phone Screen', '', 0, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45'),
(80, 'Interview', '', 0, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45'),
(81, 'Hired', '', 0, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45'),
(82, 'Rejected', '', 0, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45'),
(83, 'Applied', '', 0, 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(84, 'Phone Screen', '', 0, 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(85, 'Interview', '', 0, 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(86, 'Hired', '', 0, 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(87, 'Rejected', '', 0, 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(88, 'Applied', '', 0, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22'),
(89, 'Phone Screen', '', 0, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22'),
(90, 'Interview', '', 0, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22'),
(91, 'Hired', '', 0, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22'),
(92, 'Rejected', '', 0, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22'),
(93, 'Applied', '', 0, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51'),
(94, 'Phone Screen', '', 0, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51'),
(95, 'Interview', '', 0, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51'),
(96, 'Hired', '', 0, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51'),
(97, 'Rejected', '', 0, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51'),
(98, 'Applied', '', 0, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29'),
(99, 'Phone Screen', '', 0, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29'),
(100, 'Interview', '', 0, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29'),
(101, 'Hired', '', 0, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29'),
(102, 'Rejected', '', 0, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'وقت كامل', 'Full Time', 2, '2025-01-12 01:25:35', '2025-01-12 01:25:35'),
(2, 'Part Time', 'وقت جزذي', 2, '2025-01-22 19:48:39', '2025-01-22 19:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `join_us`
--

CREATE TABLE `join_us` (
  `id` int(11) DEFAULT NULL,
  `email` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `labor_hire_companies`
--

CREATE TABLE `labor_hire_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labor_hire_companies`
--

INSERT INTO `labor_hire_companies` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Watanya', 'وطنية', 2, '2025-01-12 01:12:13', '2025-01-12 01:12:13');

-- --------------------------------------------------------

--
-- Table structure for table `landaboutcards`
--

CREATE TABLE `landaboutcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` text DEFAULT NULL,
  `titleAr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landblogs`
--

CREATE TABLE `landblogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` text DEFAULT NULL,
  `titleAr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `metaTitleEn` text DEFAULT NULL,
  `metaTitleAr` text DEFAULT NULL,
  `metaDescriptionEn` text DEFAULT NULL,
  `metaDescriptionAr` text DEFAULT NULL,
  `metakeyEn` text DEFAULT NULL,
  `metakeyAr` text DEFAULT NULL,
  `metaTagEn` text DEFAULT NULL,
  `metaTagAr` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landcloudcards`
--

CREATE TABLE `landcloudcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landcontactcards`
--

CREATE TABLE `landcontactcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landdemocards`
--

CREATE TABLE `landdemocards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landfaqs`
--

CREATE TABLE `landfaqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text DEFAULT NULL,
  `question_ar` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `answer_ar` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landfeatures`
--

CREATE TABLE `landfeatures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descriptionEn` varchar(255) DEFAULT NULL,
  `descriptionAr` varchar(255) DEFAULT NULL,
  `landplan_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landhelpcards`
--

CREATE TABLE `landhelpcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` varchar(255) DEFAULT NULL,
  `titleAr` varchar(255) DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_sections`
--

CREATE TABLE `landing_page_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_order` int(11) NOT NULL DEFAULT 0,
  `content` text DEFAULT NULL,
  `section_type` enum('section-1','section-2','section-3','section-4','section-5','section-6','section-7','section-8','section-9','section-10','section-plan') NOT NULL,
  `default_content` text NOT NULL,
  `section_demo_image` text NOT NULL,
  `section_blade_file_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `landing_page_sections`
--

INSERT INTO `landing_page_sections` (`id`, `section_name`, `section_order`, `content`, `section_type`, `default_content`, `section_demo_image`, `section_blade_file_name`, `created_at`, `updated_at`) VALUES
(2, 'section-2', 3, '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'section-2', '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'logo-part-main-back-part.png', 'custome-logo-part-main-back-part', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(3, 'section-3', 15, NULL, 'section-3', '{\"image\": \"sec-2.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-even.png', 'custome-simple-sec-even', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(4, 'section-4', 17, NULL, 'section-4', '{\"image\": \"sec-3.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-odd.png', 'custome-simple-sec-odd', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(5, 'section-5', 19, NULL, 'section-5', '{\"button\": {\"text\": \"TRY OUR SYSTEM\",\"href\": \"#\"},\"text\": {\"text-1\": \"See more features\",\"text-2\": \"All Features\",\"text-3\": \"in one place\",\"text-4\": \"Attractive Dashboard Customer & Vendor Login Multi Languages\",\"text-5\":\"Invoice, Billing & Transaction Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-6\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-7\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting User Friendly Invoice Theme Make your own setting\",\"text-8\":\"Multi User & Permission Paypal & Stripe for Invoice\"},\"custom_class_name\":\"\"}', 'features-inner-part.png', 'custome-features-inner-part', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(6, 'section-6', 5, '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'section-6', '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'container-our-system-div.png', 'custome-container-our-system-div', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(7, 'section-7', 21, NULL, 'section-7', '{\"testimonials\":[{\"id\":1,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":2,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":3,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":4,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":5,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"}],\"custom_class_name\":\"\"}', 'testimonials-section.png', 'custome-testimonials-section', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(8, 'section-plan', 7, 'plan', 'section-plan', 'plan', 'plan-section.png', 'plan-section', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(9, 'section-8', 9, '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'section-8', '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'subscribe-part.png', 'custome-subscribe-part', '2025-01-14 01:24:08', '2025-01-14 01:24:08'),
(10, 'section-9', 11, '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'section-9', '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'social-links.png', 'custome-social-links', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(11, 'section-10', 13, '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'section-10', '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'footer-section.png', 'custome-footer-section', '2025-01-14 01:24:08', '2025-01-24 01:49:23'),
(12, 'section-1', 2, '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired\"},\"custom_class_name\":\"\"}', 'section-1', '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired \"},\"custom_class_name\":\"\"}', 'top-header-section.png', 'custome-top-header-section', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(13, 'section-2', 4, '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'section-2', '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'logo-part-main-back-part.png', 'custome-logo-part-main-back-part', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(14, 'section-3', 16, NULL, 'section-3', '{\"image\": \"sec-2.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-even.png', 'custome-simple-sec-even', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(15, 'section-4', 18, NULL, 'section-4', '{\"image\": \"sec-3.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-odd.png', 'custome-simple-sec-odd', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(16, 'section-5', 20, NULL, 'section-5', '{\"button\": {\"text\": \"TRY OUR SYSTEM\",\"href\": \"#\"},\"text\": {\"text-1\": \"See more features\",\"text-2\": \"All Features\",\"text-3\": \"in one place\",\"text-4\": \"Attractive Dashboard Customer & Vendor Login Multi Languages\",\"text-5\":\"Invoice, Billing & Transaction Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-6\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-7\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting User Friendly Invoice Theme Make your own setting\",\"text-8\":\"Multi User & Permission Paypal & Stripe for Invoice\"},\"custom_class_name\":\"\"}', 'features-inner-part.png', 'custome-features-inner-part', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(17, 'section-6', 6, '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'section-6', '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'container-our-system-div.png', 'custome-container-our-system-div', '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(18, 'section-7', 22, NULL, 'section-7', '{\"testimonials\":[{\"id\":1,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":2,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":3,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":4,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":5,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"}],\"custom_class_name\":\"\"}', 'testimonials-section.png', 'custome-testimonials-section', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(19, 'section-plan', 8, 'plan', 'section-plan', 'plan', 'plan-section.png', 'plan-section', '2025-01-14 01:28:42', '2025-01-14 01:28:42'),
(20, 'section-8', 10, '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'section-8', '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'subscribe-part.png', 'custome-subscribe-part', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(21, 'section-9', 12, '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'section-9', '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'social-links.png', 'custome-social-links', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(22, 'section-10', 14, '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'section-10', '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'footer-section.png', 'custome-footer-section', '2025-01-14 01:28:42', '2025-01-24 01:49:23'),
(23, 'section-1', 1, '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired\"},\"custom_class_name\":\"\"}', 'section-1', '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired \"},\"custom_class_name\":\"\"}', 'top-header-section.png', 'custome-top-header-section', '2025-01-24 01:49:24', '2025-01-24 01:49:24'),
(24, 'section-1', 1, '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired\"},\"custom_class_name\":\"\"}', 'section-1', '{\"logo\":\"landing_logo.png\",\"image\":\"top-banner.png\",\"button\":{\"text\":\"Login\"},\"menu\":[{\"menu\":\"Features\",\"href\":\"#\"},{\"menu\":\"Pricing\",\"href\":\"#\"}],\"text\":{\"text-1\":\"HRMGo Saas\",\"text-2\":\"HRM and Payroll Tool\",\"text-3\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\",\"text-4\":\"get started - its free\",\"text-5\":\"no creadit card reqired \"},\"custom_class_name\":\"\"}', 'top-header-section.png', 'custome-top-header-section', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(25, 'section-2', 2, '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'section-2', '{\"image\":\"cal-sec.png\",\"button\":{\"text\":\"try our system\",\"href\":\"#\"},\"text\":{\"text-1\":\"Features\",\"text-2\":\"Lorem Ipsum is simply dummy\",\"text-3\":\"text of the printing\",\"text-4\":\"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"image_array\":[{\"id\":1,\"image\":\"nexo.png\"},{\"id\":2,\"image\":\"edge.png\"},{\"id\":3,\"image\":\"atomic.png\"},{\"id\":4,\"image\":\"brd.png\"},{\"id\":5,\"image\":\"trust.png\"},{\"id\":6,\"image\":\"keep-key.png\"},{\"id\":7,\"image\":\"atomic.png\"},{\"id\":8,\"image\":\"edge.png\"}],\"custom_class_name\":\"\"}', 'logo-part-main-back-part.png', 'custome-logo-part-main-back-part', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(26, 'section-3', 3, NULL, 'section-3', '{\"image\": \"sec-2.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-even.png', 'custome-simple-sec-even', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(27, 'section-4', 4, NULL, 'section-4', '{\"image\": \"sec-3.png\",\"button\": {\"text\": \"try our system\",\"href\": \"#\"},\"text\": {\"text-1\": \"Features\",\"text-2\": \"Lorem Ipsum is simply dummy\",\"text-3\": \"text of the printing\",\"text-4\": \"Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting\"},\"custom_class_name\":\"\"}', 'simple-sec-odd.png', 'custome-simple-sec-odd', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(28, 'section-5', 5, NULL, 'section-5', '{\"button\": {\"text\": \"TRY OUR SYSTEM\",\"href\": \"#\"},\"text\": {\"text-1\": \"See more features\",\"text-2\": \"All Features\",\"text-3\": \"in one place\",\"text-4\": \"Attractive Dashboard Customer & Vendor Login Multi Languages\",\"text-5\":\"Invoice, Billing & Transaction Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-6\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting\",\"text-7\":\"Multi User & Permission Paypal & Stripe for Invoice User Friendly Invoice Theme Make your own setting User Friendly Invoice Theme Make your own setting\",\"text-8\":\"Multi User & Permission Paypal & Stripe for Invoice\"},\"custom_class_name\":\"\"}', 'features-inner-part.png', 'custome-features-inner-part', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(29, 'section-6', 6, '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'section-6', '{\"system\":[{\"id\":1,\"name\":\"Dashboard\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":5,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":2,\"name\":\"Functions\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"}]},{\"id\":3,\"name\":\"Reports\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":4,\"name\":\"Tables\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"},{\"data_id\":3,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-3.png\"},{\"data_id\":4,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]},{\"id\":5,\"name\":\"Settings\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"},{\"data_id\":2,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-2.png\"}]},{\"id\":6,\"name\":\"Contact\",\"data\":[{\"data_id\":1,\"text\":{\"text_1\":\"Dashboard\",\"text_2\":\"Main Page\"},\"button\":{\"text\":\"LIVE DEMO\",\"href\":\"#\"},\"image\":\"tab-1.png\"}]}],\"custom_class_name\":\"\"}', 'container-our-system-div.png', 'custome-container-our-system-div', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(30, 'section-7', 7, NULL, 'section-7', '{\"testimonials\":[{\"id\":1,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":2,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":3,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":4,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"},{\"id\":5,\"text\":{\"text_1\":\"We have been building AI projects for a long time and we decided it was time to build a platform that can streamline the broken process that we had to put up with. Here are some of the key things we wish we had when we were building projects before.\",\"text_2\":\"Lorem Ipsum\",\"text_3\":\"Founder and CEO at Rajodiya Infotech\"},\"image\":\"testimonials-img.png\"}],\"custom_class_name\":\"\"}', 'testimonials-section.png', 'custome-testimonials-section', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(31, 'section-plan', 8, 'plan', 'section-plan', 'plan', 'plan-section.png', 'plan-section', '2025-01-26 11:27:05', '2025-01-26 11:27:05');
INSERT INTO `landing_page_sections` (`id`, `section_name`, `section_order`, `content`, `section_type`, `default_content`, `section_demo_image`, `section_blade_file_name`, `created_at`, `updated_at`) VALUES
(32, 'section-8', 9, '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'section-8', '{\"button\":{\"text\":\"Subscribe\"},\"text\":{\"text-1\":\"Try for free\",\"text-2\":\"Lorem Ipsum is simply dummy text\",\"text-3\":\"of the printing and typesetting industry\",\"text-4\":\"Type your email address and click the button\"},\"custom_class_name\":\"\"}', 'subscribe-part.png', 'custome-subscribe-part', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(33, 'section-9', 10, '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'section-9', '{\"menu\":[{\"menu\":\"Facebook\",\"href\":\"#\"},{\"menu\":\"LinkedIn\",\"href\":\"#\"},{\"menu\":\"Twitter\",\"href\":\"#\"},{\"menu\":\"Discord\",\"href\":\"#\"}],\"custom_class_name\":\"\"}', 'social-links.png', 'custome-social-links', '2025-01-26 11:27:05', '2025-01-26 11:27:05'),
(34, 'section-10', 11, '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'section-10', '{\"footer\":{\"logo\":{\"logo\":\"landing_logo.png\"},\"footer_menu\":[{\"id\":1,\"menu\":\"FIO Protocol\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":2,\"menu\":\"Learn\",\"data\":[{\"menu_name\":\"Feature\",\"menu_href\":\"#\"},{\"menu_name\":\"Download\",\"menu_href\":\"#\"},{\"menu_name\":\"Integration\",\"menu_href\":\"#\"},{\"menu_name\":\"Extras\",\"menu_href\":\"#\"}]},{\"id\":3,\"menu\":\"Foundation\",\"data\":[{\"menu_name\":\"About Us\",\"menu_href\":\"#\"},{\"menu_name\":\"Customers\",\"menu_href\":\"#\"},{\"menu_name\":\"Resources\",\"menu_href\":\"#\"},{\"menu_name\":\"Blog\",\"menu_href\":\"#\"}]}],\"contact_app\":[{\"menu\":\"Contact\",\"data\":[{\"id\":1,\"image\":\"app-store.png\",\"image_href\":\"#\"},{\"id\":2,\"image\":\"google-pay.png\",\"image_href\":\"#\"}]}],\"bottom_menu\":{\"text\":\"All rights reserved.\",\"data\":[{\"menu_name\":\"Privacy Policy\",\"menu_href\":\"#\"},{\"menu_name\":\"Github\",\"menu_href\":\"#\"},{\"menu_name\":\"Press Kit\",\"menu_href\":\"#\"},{\"menu_name\":\"Contact\",\"menu_href\":\"#\"}]}},\"custom_class_name\":\"\"}', 'footer-section.png', 'custome-footer-section', '2025-01-26 11:27:05', '2025-01-26 11:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `landing_page_settings`
--

CREATE TABLE `landing_page_settings` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `value` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landplans`
--

CREATE TABLE `landplans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('lite','regular','pro') DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `dateType` enum('monthly','yearly') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsaycards`
--

CREATE TABLE `landsaycards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsections`
--

CREATE TABLE `landsections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) DEFAULT NULL,
  `titleEn` text DEFAULT NULL,
  `titleAr` text DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `metaTitleEn` text DEFAULT NULL,
  `metaTitleAr` text DEFAULT NULL,
  `metaDescriptionEn` text DEFAULT NULL,
  `metaDescriptionAr` text DEFAULT NULL,
  `metakeyEn` text DEFAULT NULL,
  `metakeyAr` text DEFAULT NULL,
  `metaTagEn` text DEFAULT NULL,
  `metaTagAr` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsliders`
--

CREATE TABLE `landsliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titleEn` varchar(200) DEFAULT NULL,
  `titleAr` varchar(200) DEFAULT NULL,
  `descriptionEn` text DEFAULT NULL,
  `descriptionAr` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsocialmedia`
--

CREATE TABLE `landsocialmedia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('twitter','facebook','instagram','youtube','googleplus','linkedin') DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `landsupportforms`
--

CREATE TABLE `landsupportforms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `subject` enum('question','complaint','appointment') NOT NULL DEFAULT 'question',
  `message` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `code` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fullName` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `code`, `fullName`, `created_at`, `updated_at`) VALUES
(1, 'en', 'English', '2025-01-23 17:42:38', '2025-01-23 17:42:38'),
(2, 'ar', 'Arabic', '2025-01-23 17:42:51', '2025-01-23 17:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_leave_days` varchar(255) NOT NULL,
  `leave_reason` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('approved','rejected','pending','approvedWithDeduction') NOT NULL DEFAULT 'pending',
  `deduction` double(8,2) NOT NULL DEFAULT 0.00,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `leave_type_id` bigint(20) UNSIGNED NOT NULL,
  `applied_on` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `admin_message` text DEFAULT NULL,
  `replacement_employee_id` bigint(20) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `ticket_flight_status` enum('no_both','go','back','go_back') DEFAULT NULL,
  `direct_manager` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leaves_types`
--

CREATE TABLE `leaves_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '0',
  `days` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `weekend_exception` tinyint(4) NOT NULL DEFAULT 0,
  `holiday_exception` tinyint(4) NOT NULL DEFAULT 0,
  `leave_plan` tinyint(4) NOT NULL DEFAULT 0,
  `leave_plan_percentage` varchar(255) DEFAULT NULL,
  `monthly_waiting_period` varchar(255) DEFAULT NULL,
  `min_allowed_days` varchar(255) DEFAULT NULL,
  `max_allowed_days` varchar(255) DEFAULT NULL,
  `vacation_balance` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE `leave_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `days` text DEFAULT NULL,
  `maxDays` int(11) DEFAULT NULL,
  `maxDaysPerMonth` int(11) DEFAULT NULL,
  `afterMaxHour` int(11) DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `daysBeforeApply` int(11) DEFAULT NULL,
  `deduction` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `title`, `title_ar`, `created_by`, `created_at`, `updated_at`, `type`, `days`, `maxDays`, `maxDaysPerMonth`, `afterMaxHour`, `parent`, `daysBeforeApply`, `deduction`) VALUES
(25, 'sick leave', 'أجازة مرضية', 2, '2025-01-12 01:00:45', '2025-01-12 01:00:45', NULL, '7', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `loans`
--

CREATE TABLE `loans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `loan_option` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `discount_monthly` double DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `loan_pending_id` bigint(20) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loans`
--

INSERT INTO `loans` (`id`, `employee_id`, `loan_option`, `title`, `date`, `amount`, `discount_monthly`, `start_date`, `end_date`, `reason`, `loan_pending_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'قرض', '2025-01-12', 1000, 100, '2025-01-12', '2026-01-11', 'سبب', NULL, 2, '2025-01-12 02:11:07', '2025-01-12 02:11:07'),
(3, 5, 1, 'سلفة شخصي', '2025-01-15', 50, 6, '2025-01-15', '2025-01-23', 'سلفة', NULL, 2, '2025-01-15 12:07:56', '2025-01-15 12:07:56'),
(4, 3, 1, 'سلفة 50', '2025-01-26', 50, 20, '2025-01-15', '2025-01-15', 'سلفة عادية', NULL, 2, '2025-01-26 14:54:12', '2025-01-26 14:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `loan_options`
--

CREATE TABLE `loan_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `loan_options`
--

INSERT INTO `loan_options` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Housing Loan', 'قرض السكن', 2, '2025-01-10 15:10:13', '2025-01-10 15:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `loan_pendings`
--

CREATE TABLE `loan_pendings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `month_nubmer` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `status` varchar(191) DEFAULT 'pending',
  `loan_option` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint(20) DEFAULT NULL,
  `admin_message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mac_address`
--

CREATE TABLE `mac_address` (
  `id` int(11) NOT NULL,
  `mac` varchar(255) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mac_address`
--

INSERT INTO `mac_address` (`id`, `mac`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '192.168.1.1', 2, '2025-02-02 01:11:38', '2025-02-02 01:11:38');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` int(11) NOT NULL,
  `department_id` longtext NOT NULL,
  `employee_id` longtext NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `note` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `persons` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_employees`
--

CREATE TABLE `meeting_employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meeting_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reject_reason` varchar(255) DEFAULT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meeting_employees`
--

INSERT INTO `meeting_employees` (`id`, `meeting_id`, `employee_id`, `created_by`, `created_at`, `updated_at`, `reject_reason`, `status`) VALUES
(1, 1, 5, 2, '2025-01-18 10:59:52', '2025-01-18 10:59:52', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `missions`
--

CREATE TABLE `missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reason` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `direct_manager` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 19),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 24),
(2, 'App\\Models\\User', 68),
(2, 'App\\Models\\User', 154),
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
(2, 'App\\Models\\User', 218),
(2, 'App\\Models\\User', 362),
(2, 'App\\Models\\User', 380),
(2, 'App\\Models\\User', 381),
(2, 'App\\Models\\User', 385),
(2, 'App\\Models\\User', 401),
(2, 'App\\Models\\User', 402),
(2, 'App\\Models\\User', 403),
(2, 'App\\Models\\User', 404),
(2, 'App\\Models\\User', 405),
(2, 'App\\Models\\User', 406),
(2, 'App\\Models\\User', 407),
(2, 'App\\Models\\User', 477),
(2, 'App\\Models\\User', 500),
(2, 'App\\Models\\User', 501),
(2, 'App\\Models\\User', 514),
(2, 'App\\Models\\User', 515),
(2, 'App\\Models\\User', 519),
(2, 'App\\Models\\User', 520),
(2, 'App\\Models\\User', 521),
(2, 'App\\Models\\User', 522),
(2, 'App\\Models\\User', 523),
(2, 'App\\Models\\User', 524),
(2, 'App\\Models\\User', 525),
(2, 'App\\Models\\User', 526),
(2, 'App\\Models\\User', 528),
(2, 'App\\Models\\User', 529),
(2, 'App\\Models\\User', 530),
(2, 'App\\Models\\User', 531),
(2, 'App\\Models\\User', 532),
(2, 'App\\Models\\User', 533),
(2, 'App\\Models\\User', 534),
(2, 'App\\Models\\User', 535),
(2, 'App\\Models\\User', 572),
(2, 'App\\Models\\User', 573),
(2, 'App\\Models\\User', 574),
(2, 'App\\Models\\User', 575),
(2, 'App\\Models\\User', 576),
(2, 'App\\Models\\User', 578),
(2, 'App\\Models\\User', 579),
(2, 'App\\Models\\User', 581),
(2, 'App\\Models\\User', 582),
(2, 'App\\Models\\User', 583),
(2, 'App\\Models\\User', 584),
(2, 'App\\Models\\User', 585),
(2, 'App\\Models\\User', 586),
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
(2, 'App\\Models\\User', 623),
(2, 'App\\Models\\User', 673),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 17),
(3, 'App\\Models\\User', 37),
(4, 'App\\Models\\User', 9),
(4, 'App\\Models\\User', 10),
(4, 'App\\Models\\User', 11),
(4, 'App\\Models\\User', 13),
(4, 'App\\Models\\User', 14),
(4, 'App\\Models\\User', 15),
(4, 'App\\Models\\User', 26),
(4, 'App\\Models\\User', 27),
(4, 'App\\Models\\User', 28),
(4, 'App\\Models\\User', 30),
(4, 'App\\Models\\User', 32),
(4, 'App\\Models\\User', 35),
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
(4, 'App\\Models\\User', 69),
(4, 'App\\Models\\User', 70),
(4, 'App\\Models\\User', 89),
(4, 'App\\Models\\User', 138),
(4, 'App\\Models\\User', 156),
(4, 'App\\Models\\User', 199),
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
(4, 'App\\Models\\User', 373),
(4, 'App\\Models\\User', 375),
(4, 'App\\Models\\User', 382),
(4, 'App\\Models\\User', 383),
(4, 'App\\Models\\User', 384),
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
(4, 'App\\Models\\User', 502),
(4, 'App\\Models\\User', 504),
(4, 'App\\Models\\User', 505),
(4, 'App\\Models\\User', 506),
(4, 'App\\Models\\User', 507),
(4, 'App\\Models\\User', 508),
(4, 'App\\Models\\User', 510),
(4, 'App\\Models\\User', 512),
(4, 'App\\Models\\User', 513),
(4, 'App\\Models\\User', 516),
(4, 'App\\Models\\User', 517),
(4, 'App\\Models\\User', 518),
(4, 'App\\Models\\User', 527),
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
(4, 'App\\Models\\User', 577),
(4, 'App\\Models\\User', 587),
(4, 'App\\Models\\User', 588),
(4, 'App\\Models\\User', 613),
(4, 'App\\Models\\User', 614),
(4, 'App\\Models\\User', 615),
(4, 'App\\Models\\User', 616),
(4, 'App\\Models\\User', 617),
(4, 'App\\Models\\User', 620),
(4, 'App\\Models\\User', 621),
(4, 'App\\Models\\User', 622),
(4, 'App\\Models\\User', 632),
(4, 'App\\Models\\User', 633),
(4, 'App\\Models\\User', 634),
(4, 'App\\Models\\User', 635),
(4, 'App\\Models\\User', 636),
(4, 'App\\Models\\User', 637),
(4, 'App\\Models\\User', 638),
(4, 'App\\Models\\User', 639),
(4, 'App\\Models\\User', 640),
(4, 'App\\Models\\User', 642),
(4, 'App\\Models\\User', 643),
(4, 'App\\Models\\User', 644),
(4, 'App\\Models\\User', 645),
(4, 'App\\Models\\User', 646),
(4, 'App\\Models\\User', 647),
(4, 'App\\Models\\User', 648),
(4, 'App\\Models\\User', 649),
(4, 'App\\Models\\User', 650),
(4, 'App\\Models\\User', 651),
(4, 'App\\Models\\User', 652),
(4, 'App\\Models\\User', 653),
(4, 'App\\Models\\User', 654),
(4, 'App\\Models\\User', 655),
(4, 'App\\Models\\User', 656),
(4, 'App\\Models\\User', 657),
(4, 'App\\Models\\User', 658),
(4, 'App\\Models\\User', 659),
(4, 'App\\Models\\User', 660),
(4, 'App\\Models\\User', 661),
(4, 'App\\Models\\User', 662),
(4, 'App\\Models\\User', 664),
(4, 'App\\Models\\User', 665),
(31, 'App\\Models\\User', 3),
(33, 'App\\Models\\User', 1),
(34, 'App\\Models\\User', 2),
(34, 'App\\Models\\User', 673),
(34, 'App\\Models\\User', 676),
(34, 'App\\Models\\User', 677),
(34, 'App\\Models\\User', 678),
(34, 'App\\Models\\User', 679),
(34, 'App\\Models\\User', 686),
(34, 'App\\Models\\User', 687),
(34, 'App\\Models\\User', 691),
(34, 'App\\Models\\User', 692),
(34, 'App\\Models\\User', 693),
(34, 'App\\Models\\User', 697),
(34, 'App\\Models\\User', 698),
(34, 'App\\Models\\User', 699),
(34, 'App\\Models\\User', 700),
(34, 'App\\Models\\User', 702),
(35, 'App\\Models\\User', 3),
(35, 'App\\Models\\User', 680),
(35, 'App\\Models\\User', 681),
(35, 'App\\Models\\User', 682),
(35, 'App\\Models\\User', 683),
(35, 'App\\Models\\User', 684),
(36, 'App\\Models\\User', 688),
(36, 'App\\Models\\User', 689),
(36, 'App\\Models\\User', 690),
(36, 'App\\Models\\User', 694),
(36, 'App\\Models\\User', 695),
(36, 'App\\Models\\User', 696),
(36, 'App\\Models\\User', 701),
(39, 'App\\Models\\User', 685),
(41, 'App\\Models\\User', 701),
(42, 'App\\Models\\User', 1),
(43, 'App\\Models\\User', 2),
(43, 'App\\Models\\User', 703),
(43, 'App\\Models\\User', 704),
(43, 'App\\Models\\User', 710),
(44, 'App\\Models\\User', 3),
(45, 'App\\Models\\User', 709),
(45, 'App\\Models\\User', 711),
(45, 'App\\Models\\User', 712),
(45, 'App\\Models\\User', 713);

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Saudi', 'سعودي', 2, '2025-01-12 01:10:02', '2025-01-12 01:10:02'),
(2, 'Egyptian', 'مصري', 2, '2025-01-12 01:10:25', '2025-01-12 01:10:25');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `body_ar` varchar(255) DEFAULT NULL,
  `read` tinyint(4) NOT NULL DEFAULT 0,
  `for_admin` tinyint(4) DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `redirect_url` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `offer` varchar(255) NOT NULL,
  `end_date` date NOT NULL,
  `promocode` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `offer_category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_categories`
--

CREATE TABLE `offer_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_number` varchar(10) DEFAULT NULL,
  `card_exp_month` varchar(10) DEFAULT NULL,
  `card_exp_year` varchar(10) DEFAULT NULL,
  `plan_name` varchar(100) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `price_currency` varchar(10) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` varchar(100) NOT NULL,
  `payment_type` varchar(255) NOT NULL DEFAULT 'Manually',
  `receipt` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_requests`
--

CREATE TABLE `order_requests` (
  `id` int(11) NOT NULL,
  `plan_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `other_payments`
--

CREATE TABLE `other_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_payments`
--

INSERT INTO `other_payments` (`id`, `employee_id`, `title`, `date`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 5, 'Other Payment', '2025-01-22', 70, 2, '2025-01-22 20:08:01', '2025-01-22 20:08:01'),
(3, 3, 'دفع جديد', '2025-01-26', 10, 2, '2025-01-26 15:07:13', '2025-01-26 15:07:13');

-- --------------------------------------------------------

--
-- Table structure for table `overtimes`
--

CREATE TABLE `overtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `number_of_days` int(11) NOT NULL,
  `hours` int(11) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `avg_hour` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `overtimes`
--

INSERT INTO `overtimes` (`id`, `employee_id`, `title`, `date`, `number_of_days`, `hours`, `amount`, `avg_hour`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 1, 'وقت اضافي بعد العمل', '2025-01-25', 0, 3, NULL, '10', 2, '2025-01-25 22:26:00', '2025-01-25 22:26:00'),
(3, 3, 'عمل اضافة جديد', '2025-01-26', 0, 2, '4', '2', 2, '2025-01-26 15:12:27', '2025-01-26 15:12:27');

-- --------------------------------------------------------

--
-- Table structure for table `over_time_requests`
--

CREATE TABLE `over_time_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `reason` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `admin_message` text DEFAULT NULL,
  `direct_manager` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payees`
--

CREATE TABLE `payees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payee_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payers`
--

CREATE TABLE `payers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_types`
--

CREATE TABLE `payment_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_types`
--

INSERT INTO `payment_types` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Cash', 2, '2025-01-10 15:17:41', '2025-01-10 15:17:41');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_settings`
--

CREATE TABLE `payroll_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `payroll_dispaly` tinyint(4) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payslip_types`
--

CREATE TABLE `payslip_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payslip_types`
--

INSERT INTO `payslip_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Hourly Salary', 'الراتب بالساعة', 2, '2025-01-10 15:05:05', '2025-01-12 01:42:13'),
(2, 'Monthly Payslip', 'راتب شهري', 2, '2025-01-10 15:06:14', '2025-01-12 01:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `pay_slips`
--

CREATE TABLE `pay_slips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `net_payble` int(11) NOT NULL,
  `salary_month` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `basic_salary` int(11) NOT NULL,
  `allowance` text NOT NULL,
  `commission` text NOT NULL,
  `loan` text NOT NULL,
  `saturation_deduction` text NOT NULL,
  `other_payment` text NOT NULL,
  `overtime` text NOT NULL,
  `absence` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_recieved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pay_slips`
--

INSERT INTO `pay_slips` (`id`, `employee_id`, `net_payble`, `salary_month`, `status`, `basic_salary`, `allowance`, `commission`, `loan`, `saturation_deduction`, `other_payment`, `overtime`, `absence`, `created_by`, `created_at`, `updated_at`, `is_recieved`) VALUES
(15, 3, 2824, '2025-01', 0, 5000, '[{\"id\":3,\"employee_id\":3,\"allowance_option\":1,\"title\":\"\\u0628\\u062f\\u0644 1\",\"date\":\"2025-01-26\",\"amount\":500,\"created_by\":2,\"created_at\":\"2025-01-26T11:30:44.000000Z\",\"updated_at\":\"2025-01-26T11:30:44.000000Z\"}]', '[{\"id\":7,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0648\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"commission_amount\":\"200\",\"amount\":40,\"type\":\"%\",\"created_by\":2,\"created_at\":\"2025-01-26T12:49:23.000000Z\",\"updated_at\":\"2025-01-26T12:49:23.000000Z\",\"precentage\":null,\"close_deal_amount\":null},{\"id\":8,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0648\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f2\",\"date\":\"2025-01-26\",\"commission_amount\":null,\"amount\":50,\"type\":\"$\",\"created_by\":2,\"created_at\":\"2025-01-26T12:50:06.000000Z\",\"updated_at\":\"2025-01-26T12:50:06.000000Z\",\"precentage\":null,\"close_deal_amount\":null}]', '[{\"id\":4,\"employee_id\":3,\"loan_option\":1,\"title\":\"\\u0633\\u0644\\u0641\\u0629 50\",\"date\":\"2025-01-26\",\"amount\":50,\"discount_monthly\":20,\"start_date\":\"2025-01-15\",\"end_date\":\"2025-01-15\",\"reason\":\"\\u0633\\u0644\\u0641\\u0629 \\u0639\\u0627\\u062f\\u064a\\u0629\",\"loan_pending_id\":null,\"created_by\":2,\"created_at\":\"2025-01-26T12:54:12.000000Z\",\"updated_at\":\"2025-01-26T12:54:12.000000Z\"}]', '[{\"id\":2,\"employee_id\":3,\"deduction_option\":1,\"title\":\"\\u062e\\u0635\\u0645 \\u062a\\u0634\\u0628\\u0639 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"percent\":null,\"amount\":20,\"created_by\":2,\"created_at\":\"2025-01-26T13:06:55.000000Z\",\"updated_at\":\"2025-01-26T13:06:55.000000Z\"},{\"id\":3,\"employee_id\":3,\"deduction_option\":1,\"title\":\"new ded\",\"date\":\"2025-01-27\",\"percent\":null,\"amount\":10,\"created_by\":2,\"created_at\":\"2025-01-27T13:38:54.000000Z\",\"updated_at\":\"2025-01-27T13:38:54.000000Z\"}]', '[{\"id\":3,\"employee_id\":3,\"title\":\"\\u062f\\u0641\\u0639 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"amount\":10,\"created_by\":2,\"created_at\":\"2025-01-26T13:07:13.000000Z\",\"updated_at\":\"2025-01-26T13:07:13.000000Z\"}]', '[{\"id\":3,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0644 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"number_of_days\":0,\"hours\":2,\"amount\":\"4\",\"avg_hour\":\"2\",\"created_by\":2,\"created_at\":\"2025-01-26T13:12:27.000000Z\",\"updated_at\":\"2025-01-26T13:12:27.000000Z\"}]', '[{\"id\":26,\"employee_id\":3,\"type\":\"S\",\"number_of_days\":25,\"start_date\":\"2025-01-01\",\"end_date\":\"2025-01-25\",\"created_by\":2,\"discount_amount\":\"0\",\"created_at\":\"2025-01-26T19:15:04.000000Z\",\"updated_at\":\"2025-01-26T19:15:04.000000Z\",\"leave_id\":null},{\"id\":27,\"employee_id\":3,\"type\":\"A\",\"number_of_days\":68,\"start_date\":\"2025-01-26\",\"end_date\":\"2025-04-03\",\"created_by\":2,\"discount_amount\":\"0\",\"created_at\":\"2025-01-26T19:19:52.000000Z\",\"updated_at\":\"2025-01-26T19:19:52.000000Z\",\"leave_id\":null},{\"id\":28,\"employee_id\":3,\"type\":\"S\",\"number_of_days\":46,\"start_date\":\"2025-01-26\",\"end_date\":\"2025-03-12\",\"created_by\":2,\"discount_amount\":\"1250\",\"created_at\":\"2025-01-26T19:26:29.000000Z\",\"updated_at\":\"2025-01-26T19:26:29.000000Z\",\"leave_id\":null}]', 2, '2025-01-28 16:03:56', '2025-01-28 16:03:56', 0),
(16, 5, 2873, '2025-01', 0, 3000, '[{\"id\":2,\"employee_id\":5,\"allowance_option\":1,\"title\":\"\\u0628\\u062f\\u06442\",\"date\":\"2025-01-15\",\"amount\":23,\"created_by\":2,\"created_at\":\"2025-01-15T09:55:35.000000Z\",\"updated_at\":\"2025-01-15T09:55:35.000000Z\"}]', '[{\"id\":2,\"employee_id\":5,\"title\":\"Commission\",\"date\":\"2025-01-22\",\"commission_amount\":null,\"amount\":100,\"type\":\"$\",\"created_by\":2,\"created_at\":\"2025-01-22T18:06:23.000000Z\",\"updated_at\":\"2025-01-22T18:06:23.000000Z\",\"precentage\":null,\"close_deal_amount\":null}]', '[{\"id\":3,\"employee_id\":5,\"loan_option\":1,\"title\":\"\\u0633\\u0644\\u0641\\u0629 \\u0634\\u062e\\u0635\\u064a\",\"date\":\"2025-01-15\",\"amount\":50,\"discount_monthly\":6,\"start_date\":\"2025-01-15\",\"end_date\":\"2025-01-23\",\"reason\":\"\\u0633\\u0644\\u0641\\u0629\",\"loan_pending_id\":null,\"created_by\":2,\"created_at\":\"2025-01-15T10:07:56.000000Z\",\"updated_at\":\"2025-01-15T10:07:56.000000Z\"}]', '[]', '[{\"id\":2,\"employee_id\":5,\"title\":\"Other Payment\",\"date\":\"2025-01-22\",\"amount\":70,\"created_by\":2,\"created_at\":\"2025-01-22T18:08:01.000000Z\",\"updated_at\":\"2025-01-22T18:08:01.000000Z\"}]', '[]', '[]', 2, '2025-01-28 16:03:56', '2025-01-28 16:03:56', 0),
(17, 6, 0, '2025-01', 0, 0, '[]', '[]', '[]', '[]', '[]', '[]', '[]', 2, '2025-01-30 14:58:08', '2025-01-30 14:58:08', 0),
(18, 7, 0, '2025-01', 0, 0, '[]', '[]', '[]', '[]', '[]', '[]', '[]', 2, '2025-01-30 14:58:08', '2025-01-30 14:58:08', 0),
(19, 3, 2824, '2025-02', 1, 5000, '[{\"id\":3,\"employee_id\":3,\"allowance_option\":1,\"title\":\"\\u0628\\u062f\\u0644 1\",\"date\":\"2025-01-26\",\"amount\":500,\"created_by\":2,\"created_at\":\"2025-01-26T11:30:44.000000Z\",\"updated_at\":\"2025-01-26T11:30:44.000000Z\"}]', '[{\"id\":7,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0648\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"commission_amount\":\"200\",\"amount\":40,\"type\":\"%\",\"created_by\":2,\"created_at\":\"2025-01-26T12:49:23.000000Z\",\"updated_at\":\"2025-01-26T12:49:23.000000Z\",\"precentage\":null,\"close_deal_amount\":null},{\"id\":8,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0648\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f2\",\"date\":\"2025-01-26\",\"commission_amount\":null,\"amount\":50,\"type\":\"$\",\"created_by\":2,\"created_at\":\"2025-01-26T12:50:06.000000Z\",\"updated_at\":\"2025-01-26T12:50:06.000000Z\",\"precentage\":null,\"close_deal_amount\":null}]', '[{\"id\":4,\"employee_id\":3,\"loan_option\":1,\"title\":\"\\u0633\\u0644\\u0641\\u0629 50\",\"date\":\"2025-01-26\",\"amount\":50,\"discount_monthly\":20,\"start_date\":\"2025-01-15\",\"end_date\":\"2025-01-15\",\"reason\":\"\\u0633\\u0644\\u0641\\u0629 \\u0639\\u0627\\u062f\\u064a\\u0629\",\"loan_pending_id\":null,\"created_by\":2,\"created_at\":\"2025-01-26T12:54:12.000000Z\",\"updated_at\":\"2025-01-26T12:54:12.000000Z\"}]', '[{\"id\":2,\"employee_id\":3,\"deduction_option\":1,\"title\":\"\\u062e\\u0635\\u0645 \\u062a\\u0634\\u0628\\u0639 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"percent\":null,\"amount\":20,\"created_by\":2,\"created_at\":\"2025-01-26T13:06:55.000000Z\",\"updated_at\":\"2025-01-26T13:06:55.000000Z\"},{\"id\":3,\"employee_id\":3,\"deduction_option\":1,\"title\":\"new ded\",\"date\":\"2025-01-27\",\"percent\":null,\"amount\":10,\"created_by\":2,\"created_at\":\"2025-01-27T13:38:54.000000Z\",\"updated_at\":\"2025-01-27T13:38:54.000000Z\"}]', '[{\"id\":3,\"employee_id\":3,\"title\":\"\\u062f\\u0641\\u0639 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"amount\":10,\"created_by\":2,\"created_at\":\"2025-01-26T13:07:13.000000Z\",\"updated_at\":\"2025-01-26T13:07:13.000000Z\"}]', '[{\"id\":3,\"employee_id\":3,\"title\":\"\\u0639\\u0645\\u0644 \\u0627\\u0636\\u0627\\u0641\\u0629 \\u062c\\u062f\\u064a\\u062f\",\"date\":\"2025-01-26\",\"number_of_days\":0,\"hours\":2,\"amount\":\"4\",\"avg_hour\":\"2\",\"created_by\":2,\"created_at\":\"2025-01-26T13:12:27.000000Z\",\"updated_at\":\"2025-01-26T13:12:27.000000Z\"}]', '[{\"id\":26,\"employee_id\":3,\"type\":\"S\",\"number_of_days\":25,\"start_date\":\"2025-01-01\",\"end_date\":\"2025-01-25\",\"created_by\":2,\"discount_amount\":\"0\",\"created_at\":\"2025-01-26T19:15:04.000000Z\",\"updated_at\":\"2025-01-26T19:15:04.000000Z\",\"leave_id\":null},{\"id\":27,\"employee_id\":3,\"type\":\"A\",\"number_of_days\":68,\"start_date\":\"2025-01-26\",\"end_date\":\"2025-04-03\",\"created_by\":2,\"discount_amount\":\"0\",\"created_at\":\"2025-01-26T19:19:52.000000Z\",\"updated_at\":\"2025-01-26T19:19:52.000000Z\",\"leave_id\":null},{\"id\":28,\"employee_id\":3,\"type\":\"S\",\"number_of_days\":46,\"start_date\":\"2025-01-26\",\"end_date\":\"2025-03-12\",\"created_by\":2,\"discount_amount\":\"1250\",\"created_at\":\"2025-01-26T19:26:29.000000Z\",\"updated_at\":\"2025-01-26T19:26:29.000000Z\",\"leave_id\":null}]', 2, '2025-02-03 18:03:35', '2025-02-04 22:45:13', 0),
(20, 5, 2873, '2025-02', 0, 3000, '[{\"id\":2,\"employee_id\":5,\"allowance_option\":1,\"title\":\"\\u0628\\u062f\\u06442\",\"date\":\"2025-01-15\",\"amount\":23,\"created_by\":2,\"created_at\":\"2025-01-15T09:55:35.000000Z\",\"updated_at\":\"2025-01-15T09:55:35.000000Z\"}]', '[{\"id\":2,\"employee_id\":5,\"title\":\"Commission\",\"date\":\"2025-01-22\",\"commission_amount\":null,\"amount\":100,\"type\":\"$\",\"created_by\":2,\"created_at\":\"2025-01-22T18:06:23.000000Z\",\"updated_at\":\"2025-01-22T18:06:23.000000Z\",\"precentage\":null,\"close_deal_amount\":null}]', '[{\"id\":3,\"employee_id\":5,\"loan_option\":1,\"title\":\"\\u0633\\u0644\\u0641\\u0629 \\u0634\\u062e\\u0635\\u064a\",\"date\":\"2025-01-15\",\"amount\":50,\"discount_monthly\":6,\"start_date\":\"2025-01-15\",\"end_date\":\"2025-01-23\",\"reason\":\"\\u0633\\u0644\\u0641\\u0629\",\"loan_pending_id\":null,\"created_by\":2,\"created_at\":\"2025-01-15T10:07:56.000000Z\",\"updated_at\":\"2025-01-15T10:07:56.000000Z\"}]', '[]', '[{\"id\":2,\"employee_id\":5,\"title\":\"Other Payment\",\"date\":\"2025-01-22\",\"amount\":70,\"created_by\":2,\"created_at\":\"2025-01-22T18:08:01.000000Z\",\"updated_at\":\"2025-01-22T18:08:01.000000Z\"}]', '[]', '[]', 2, '2025-02-03 18:03:35', '2025-02-03 18:03:35', 0),
(21, 6, 0, '2025-02', 0, 0, '[]', '[]', '[]', '[]', '[]', '[]', '[]', 2, '2025-02-03 18:03:35', '2025-02-03 18:03:35', 0),
(22, 7, 0, '2025-02', 0, 0, '[]', '[]', '[]', '[]', '[]', '[]', '[]', 2, '2025-02-03 18:03:35', '2025-02-03 18:03:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

CREATE TABLE `performance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `rate` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `performance_period_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_details`
--

CREATE TABLE `performance_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `performance_id` bigint(20) UNSIGNED NOT NULL,
  `performance_factor` varchar(255) DEFAULT NULL,
  `points` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_factors`
--

CREATE TABLE `performance_factors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `performance_period_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance_periods`
--

CREATE TABLE `performance_periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `months_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `performance__types`
--

CREATE TABLE `performance__types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `performance__types`
--

INSERT INTO `performance__types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'الأداء الفردي', 'Individual Performance', '2', '2025-01-10 15:33:05', '2025-01-10 15:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `category`) VALUES
(1, 'Manage User', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(2, 'Create User', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(3, 'Edit User', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(4, 'Delete User', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(5, 'Manage Role', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(6, 'Create Role', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(7, 'Delete Role', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(8, 'Edit Role', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(9, 'Manage Award', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(10, 'Create Award', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(11, 'Delete Award', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(12, 'Edit Award', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(13, 'Manage Transfer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(14, 'Create Transfer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(15, 'Delete Transfer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(16, 'Edit Transfer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(17, 'Manage Resignation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(18, 'Create Resignation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(19, 'Edit Resignation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(20, 'Delete Resignation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(21, 'Manage Travel', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(22, 'Create Travel', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(23, 'Edit Travel', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(24, 'Delete Travel', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(25, 'Manage Promotion', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(26, 'Create Promotion', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(27, 'Edit Promotion', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(28, 'Delete Promotion', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(29, 'Manage Complaint', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(30, 'Create Complaint', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(31, 'Edit Complaint', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(32, 'Delete Complaint', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(33, 'Manage Warning', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(34, 'Create Warning', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(35, 'Edit Warning', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(36, 'Delete Warning', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(37, 'Manage Termination', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(38, 'Create Termination', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(39, 'Edit Termination', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(40, 'Delete Termination', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(41, 'Manage Department', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(42, 'Create Department', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(43, 'Edit Department', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(44, 'Delete Department', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(45, 'Manage Designation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(46, 'Create Designation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(47, 'Edit Designation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(48, 'Delete Designation', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(49, 'Manage Document Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(50, 'Create Document Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(51, 'Edit Document Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(52, 'Delete Document Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(53, 'Manage Branch', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(54, 'Create Branch', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(55, 'Edit Branch', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(56, 'Delete Branch', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(57, 'Manage Award Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(58, 'Create Award Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(59, 'Edit Award Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(60, 'Delete Award Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(61, 'Manage Termination Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(62, 'Create Termination Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(63, 'Edit Termination Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(64, 'Delete Termination Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(65, 'Manage Employee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(66, 'Create Employee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(67, 'Edit Employee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(68, 'Delete Employee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(69, 'Show Employee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(70, 'Manage Payslip Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(71, 'Create Payslip Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(72, 'Edit Payslip Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(73, 'Delete Payslip Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(74, 'Manage Allowance Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(75, 'Create Allowance Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(76, 'Edit Allowance Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(77, 'Delete Allowance Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(78, 'Manage Loan Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(79, 'Create Loan Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(80, 'Edit Loan Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(81, 'Delete Loan Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(82, 'Manage Deduction Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(83, 'Create Deduction Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(84, 'Edit Deduction Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(85, 'Delete Deduction Option', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(86, 'Manage Set Salary', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(87, 'Create Set Salary', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(88, 'Edit Set Salary', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(89, 'Delete Set Salary', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(90, 'Manage Allowance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(91, 'Create Allowance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(92, 'Edit Allowance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(93, 'Delete Allowance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(94, 'Create Commission', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(95, 'Create Loan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(96, 'Create Saturation Deduction', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(97, 'Create Other Payment', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(98, 'Create Overtime', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(99, 'Edit Commission', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(100, 'Delete Commission', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(101, 'Edit Loan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(102, 'Delete Loan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(103, 'Edit Saturation Deduction', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(104, 'Delete Saturation Deduction', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(105, 'Edit Other Payment', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(106, 'Delete Other Payment', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(107, 'Edit Overtime', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(108, 'Delete Overtime', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(109, 'Manage Pay Slip', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(110, 'Create Pay Slip', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(111, 'Edit Pay Slip', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(112, 'Delete Pay Slip', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(113, 'Manage Account List', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(114, 'Create Account List', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(115, 'Edit Account List', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(116, 'Delete Account List', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(117, 'View Balance Account List', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(118, 'Manage Payee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(119, 'Create Payee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(120, 'Edit Payee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(121, 'Delete Payee', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(122, 'Manage Payer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(123, 'Create Payer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(124, 'Edit Payer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(125, 'Delete Payer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(126, 'Manage Expense Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(127, 'Create Expense Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(128, 'Edit Expense Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(129, 'Delete Expense Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(130, 'Manage Income Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(131, 'Edit Income Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(132, 'Delete Income Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(133, 'Create Income Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(134, 'Manage Payment Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(135, 'Create Payment Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(136, 'Edit Payment Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(137, 'Delete Payment Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(138, 'Manage Deposit', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(139, 'Create Deposit', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(140, 'Edit Deposit', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(141, 'Delete Deposit', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(142, 'Manage Expense', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(143, 'Create Expense', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(144, 'Edit Expense', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(145, 'Delete Expense', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(146, 'Manage Transfer Balance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(147, 'Create Transfer Balance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(148, 'Edit Transfer Balance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(149, 'Delete Transfer Balance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(150, 'Manage Event', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(151, 'Create Event', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(152, 'Edit Event', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(153, 'Delete Event', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(154, 'Manage Announcement', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(155, 'Create Announcement', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(156, 'Edit Announcement', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(157, 'Delete Announcement', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(158, 'Manage Leave Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(159, 'Create Leave Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(160, 'Edit Leave Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(161, 'Delete Leave Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(162, 'Manage Leave', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(163, 'Create Leave', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(164, 'Edit Leave', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(165, 'Delete Leave', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(166, 'Manage Meeting', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(167, 'Create Meeting', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(168, 'Edit Meeting', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(169, 'Delete Meeting', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(170, 'Manage Ticket', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(171, 'Create Ticket', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(172, 'Edit Ticket', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(173, 'Delete Ticket', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(174, 'Manage Attendance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(175, 'Create Attendance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(176, 'Edit Attendance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(177, 'Delete Attendance', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(178, 'Manage Language', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(179, 'Create Language', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(180, 'Manage Plan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(181, 'Create Plan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(182, 'Edit Plan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(183, 'Buy Plan', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(184, 'Manage System Settings', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(185, 'Manage Company Settings', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(186, 'Manage TimeSheet', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(187, 'Create TimeSheet', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(188, 'Edit TimeSheet', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(189, 'Delete TimeSheet', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(190, 'Manage Order', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(191, 'manage coupon', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(192, 'create coupon', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(193, 'edit coupon', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(194, 'delete coupon', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(195, 'Manage Assets', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(196, 'Create Assets', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(197, 'Edit Assets', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(198, 'Delete Assets', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(199, 'Manage Document', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(200, 'Create Document', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(201, 'Edit Document', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(202, 'Delete Document', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(203, 'Manage Employee Profile', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(204, 'Show Employee Profile', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(205, 'Manage Employee Last Login', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(206, 'Manage Indicator', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(207, 'Create Indicator', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(208, 'Edit Indicator', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(209, 'Delete Indicator', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(210, 'Show Indicator', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(211, 'Manage Appraisal', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(212, 'Create Appraisal', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(213, 'Edit Appraisal', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(214, 'Delete Appraisal', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(215, 'Show Appraisal', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(216, 'Manage Goal Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(217, 'Create Goal Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(218, 'Edit Goal Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(219, 'Delete Goal Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(220, 'Manage Goal Tracking', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(221, 'Create Goal Tracking', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(222, 'Edit Goal Tracking', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(223, 'Delete Goal Tracking', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(224, 'Manage Company Policy', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(225, 'Create Company Policy', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(226, 'Edit Company Policy', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(227, 'Delete Company Policy', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(228, 'Manage Trainer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(229, 'Create Trainer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(230, 'Edit Trainer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(231, 'Delete Trainer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(232, 'Show Trainer', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(233, 'Manage Training', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(234, 'Create Training', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(235, 'Edit Training', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(236, 'Delete Training', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(237, 'Show Training', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(238, 'Manage Training Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(239, 'Create Training Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(240, 'Edit Training Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(241, 'Delete Training Type', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(242, 'Manage Report', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(243, 'Manage Holiday', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(244, 'Create Holiday', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(245, 'Edit Holiday', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(246, 'Delete Holiday', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(247, 'Manage Job Category', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(248, 'Create Job Category', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(249, 'Edit Job Category', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(250, 'Delete Job Category', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(251, 'Manage Job Stage', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(252, 'Create Job Stage', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(253, 'Edit Job Stage', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(254, 'Delete Job Stage', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(255, 'Manage Job', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(256, 'Create Job', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(257, 'Edit Job', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(258, 'Delete Job', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(259, 'Show Job', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(260, 'Manage Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(261, 'Create Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(262, 'Edit Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(263, 'Delete Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(264, 'Show Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(265, 'Move Job Application', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(266, 'Add Job Application Note', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(267, 'Delete Job Application Note', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(268, 'Add Job Application Skill', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(269, 'Manage Job OnBoard', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(270, 'Manage Custom Question', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(271, 'Create Custom Question', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(272, 'Edit Custom Question', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(273, 'Delete Custom Question', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(274, 'Manage Interview Schedule', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(275, 'Create Interview Schedule', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(276, 'Edit Interview Schedule', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(277, 'Delete Interview Schedule', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(278, 'Manage Career', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(279, 'Manage Competencies', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(280, 'Create Competencies', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(281, 'Edit Competencies', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(282, 'Delete Competencies', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(283, 'Manage tasks', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(284, 'Create tasks', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(285, 'Edit tasks', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL),
(286, 'Delete tasks', 'web', '2025-01-26 11:27:01', '2025-01-26 11:27:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lon` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `name`, `name_ar`, `lat`, `lon`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Riadh', 'الرياض', '24.7305650', '46.6555170', 2, '2025-01-12 16:21:25', '2025-01-12 16:21:25'),
(2, 'jeddah', 'جدة', '21.5813727', '39.2270065', 2, '2025-01-22 19:38:15', '2025-01-22 19:38:15');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `storage` varchar(255) DEFAULT NULL,
  `chat_gpt` int(11) NOT NULL DEFAULT 0,
  `duration` varchar(100) NOT NULL,
  `max_users` int(11) NOT NULL DEFAULT 0,
  `max_employees` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `storage`, `chat_gpt`, `duration`, `max_users`, `max_employees`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Free Plan', 0.00, NULL, 0, 'unlimited', 20, 500, 'Allow users to access ChatGPT features with this plan.', 'free_plan.png', '2022-02-05 22:59:41', '2025-02-05 07:19:32'),
(2, 'premium', 250.00, NULL, 0, 'unlimited', 20, 20, 'vmvb', NULL, '2022-05-11 07:58:38', '2022-05-11 07:58:38'),
(9, 'silver', 300.00, '6000', 1, 'year', 50, 500, NULL, NULL, '2025-02-03 13:59:12', '2025-02-03 14:23:13');

-- --------------------------------------------------------

--
-- Table structure for table `plan_request`
--

CREATE TABLE `plan_request` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `buisness_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `plan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `plan_request`
--

INSERT INTO `plan_request` (`id`, `name`, `buisness_type`, `email`, `phone`, `created_at`, `updated_at`, `plan_id`) VALUES
(2, 'omar elruby', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 03:13:27', '2025-02-05 03:13:27', 2),
(3, 'omar elruby', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 03:14:21', '2025-02-05 03:14:21', 2),
(4, 'omar elruby', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 03:16:05', '2025-02-05 03:16:05', 2),
(5, 'omar elruby', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 03:16:34', '2025-02-05 03:16:34', 9),
(6, 'aa', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 22:24:45', '2025-02-05 22:24:45', 2),
(7, 'aa', NULL, 'elrubyomar@gmail.com', '3222222222', '2025-02-05 22:24:46', '2025-02-05 22:24:46', 2),
(8, 'omar elruby', 'ada', 'elrubyomar@gmail.com', '3222222222', '2025-02-05 22:44:32', '2025-02-05 22:44:32', 9);

-- --------------------------------------------------------

--
-- Table structure for table `plan_requests`
--

CREATE TABLE `plan_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `duration` varchar(20) NOT NULL DEFAULT 'monthly',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_requests`
--

INSERT INTO `plan_requests` (`id`, `user_id`, `plan_id`, `duration`, `created_at`, `updated_at`) VALUES
(1, 0, 2, 'monthly', '2025-02-05 03:10:41', '2025-02-05 03:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `designation_id` int(11) NOT NULL,
  `promotion_title` varchar(255) NOT NULL,
  `promotion_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `promotion_title_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `major` varchar(255) DEFAULT NULL,
  `degree` varchar(255) DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `study_length` varchar(255) DEFAULT NULL,
  `institute_name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `evaluation_section_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `evaluation_category_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'choice',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `point` double(8,2) DEFAULT NULL COMMENT 'null if has multi select'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_options`
--

CREATE TABLE `question_options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `point` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `request_types`
--

CREATE TABLE `request_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_types`
--

INSERT INTO `request_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'National Day', 'اليوم الوطني', 2, '2025-01-12 01:17:30', '2025-01-12 01:17:30'),
(3, 'Hijri New Year', 'اجازة راس السنة الهجري', 2, '2025-02-03 01:59:22', '2025-02-03 01:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `resignations`
--

CREATE TABLE `resignations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `notice_date` date NOT NULL,
  `resignation_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_by`, `created_at`, `updated_at`) VALUES
(42, 'super admin', 'web', 0, '2025-01-26 11:27:02', '2025-01-26 11:27:02'),
(43, 'company', 'web', 1, '2025-01-26 11:27:02', '2025-01-26 11:27:02'),
(44, 'hr', 'web', 703, '2025-01-26 11:27:03', '2025-01-26 11:27:03'),
(45, 'employee', 'web', 703, '2025-01-26 11:27:05', '2025-01-26 11:27:05');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(2, 42),
(2, 43),
(3, 42),
(3, 43),
(4, 42),
(4, 43),
(5, 42),
(5, 43),
(5, 45),
(6, 42),
(6, 43),
(7, 42),
(7, 43),
(8, 42),
(8, 43),
(9, 43),
(9, 44),
(9, 45),
(10, 43),
(10, 44),
(11, 43),
(11, 44),
(12, 43),
(12, 44),
(13, 43),
(13, 44),
(13, 45),
(14, 43),
(14, 44),
(15, 43),
(15, 44),
(16, 43),
(16, 44),
(17, 43),
(17, 44),
(17, 45),
(18, 43),
(18, 44),
(18, 45),
(19, 43),
(19, 44),
(19, 45),
(20, 43),
(20, 44),
(20, 45),
(21, 43),
(21, 44),
(21, 45),
(22, 43),
(22, 44),
(23, 43),
(23, 44),
(24, 43),
(24, 44),
(25, 43),
(25, 44),
(25, 45),
(26, 43),
(26, 44),
(27, 43),
(27, 44),
(28, 43),
(28, 44),
(29, 43),
(29, 44),
(29, 45),
(30, 43),
(30, 44),
(30, 45),
(31, 43),
(31, 44),
(31, 45),
(32, 43),
(32, 44),
(32, 45),
(33, 43),
(33, 44),
(33, 45),
(34, 43),
(34, 44),
(34, 45),
(35, 43),
(35, 44),
(35, 45),
(36, 43),
(36, 44),
(36, 45),
(37, 43),
(37, 44),
(37, 45),
(38, 43),
(38, 44),
(39, 43),
(39, 44),
(40, 43),
(40, 44),
(41, 43),
(41, 44),
(42, 43),
(42, 44),
(43, 43),
(43, 44),
(44, 43),
(44, 44),
(45, 43),
(45, 44),
(46, 43),
(46, 44),
(47, 43),
(47, 44),
(48, 43),
(48, 44),
(49, 43),
(49, 44),
(50, 43),
(50, 44),
(51, 43),
(51, 44),
(52, 43),
(52, 44),
(53, 43),
(53, 44),
(54, 43),
(54, 44),
(55, 43),
(55, 44),
(56, 43),
(56, 44),
(57, 43),
(57, 44),
(58, 43),
(58, 44),
(59, 43),
(59, 44),
(60, 43),
(60, 44),
(61, 43),
(61, 44),
(62, 43),
(62, 44),
(63, 43),
(63, 44),
(64, 43),
(64, 44),
(65, 43),
(65, 44),
(65, 45),
(66, 43),
(66, 44),
(67, 43),
(67, 44),
(67, 45),
(68, 43),
(68, 44),
(69, 43),
(69, 44),
(69, 45),
(70, 43),
(70, 44),
(71, 43),
(71, 44),
(72, 43),
(72, 44),
(73, 43),
(73, 44),
(74, 43),
(74, 44),
(74, 45),
(75, 43),
(75, 44),
(76, 43),
(76, 44),
(77, 43),
(77, 44),
(78, 43),
(78, 44),
(78, 45),
(79, 43),
(79, 44),
(80, 43),
(80, 44),
(81, 43),
(81, 44),
(82, 43),
(82, 44),
(82, 45),
(83, 43),
(83, 44),
(84, 43),
(84, 44),
(85, 43),
(85, 44),
(86, 43),
(86, 44),
(86, 45),
(87, 43),
(87, 44),
(88, 43),
(88, 44),
(89, 43),
(89, 44),
(90, 43),
(90, 44),
(90, 45),
(91, 43),
(91, 44),
(92, 43),
(92, 44),
(93, 43),
(93, 44),
(94, 43),
(94, 44),
(95, 43),
(95, 44),
(96, 43),
(96, 44),
(97, 43),
(97, 44),
(98, 43),
(98, 44),
(99, 43),
(99, 44),
(100, 43),
(100, 44),
(101, 43),
(101, 44),
(102, 43),
(102, 44),
(103, 43),
(103, 44),
(104, 43),
(104, 44),
(105, 43),
(105, 44),
(106, 43),
(106, 44),
(107, 43),
(107, 44),
(108, 43),
(108, 44),
(109, 43),
(109, 44),
(109, 45),
(110, 43),
(110, 44),
(110, 45),
(111, 43),
(111, 44),
(111, 45),
(112, 43),
(112, 44),
(112, 45),
(113, 43),
(114, 43),
(115, 43),
(116, 43),
(117, 43),
(118, 43),
(119, 43),
(120, 43),
(121, 43),
(122, 43),
(123, 43),
(124, 43),
(125, 43),
(126, 43),
(127, 43),
(128, 43),
(129, 43),
(130, 43),
(131, 43),
(132, 43),
(133, 43),
(134, 43),
(135, 43),
(136, 43),
(137, 43),
(138, 43),
(139, 43),
(140, 43),
(141, 43),
(142, 43),
(143, 43),
(144, 43),
(145, 43),
(146, 43),
(147, 43),
(148, 43),
(149, 43),
(150, 43),
(150, 44),
(150, 45),
(151, 43),
(151, 44),
(152, 43),
(152, 44),
(153, 43),
(153, 44),
(154, 43),
(154, 44),
(154, 45),
(155, 43),
(155, 44),
(156, 43),
(156, 44),
(157, 43),
(157, 44),
(158, 43),
(158, 44),
(159, 43),
(159, 44),
(160, 43),
(160, 44),
(161, 43),
(161, 44),
(162, 43),
(162, 44),
(162, 45),
(163, 43),
(163, 44),
(163, 45),
(164, 43),
(164, 44),
(164, 45),
(165, 43),
(165, 44),
(165, 45),
(166, 43),
(166, 44),
(166, 45),
(167, 43),
(167, 44),
(168, 43),
(168, 44),
(169, 43),
(169, 44),
(170, 43),
(170, 44),
(170, 45),
(171, 43),
(171, 44),
(171, 45),
(172, 43),
(172, 44),
(172, 45),
(173, 43),
(173, 44),
(173, 45),
(174, 43),
(174, 44),
(174, 45),
(175, 43),
(175, 44),
(175, 45),
(176, 43),
(176, 44),
(177, 43),
(177, 44),
(178, 42),
(178, 43),
(178, 44),
(179, 42),
(180, 42),
(180, 43),
(181, 42),
(182, 42),
(183, 43),
(184, 42),
(185, 43),
(186, 43),
(186, 44),
(186, 45),
(187, 43),
(187, 44),
(187, 45),
(188, 43),
(188, 44),
(188, 45),
(189, 43),
(189, 44),
(189, 45),
(190, 42),
(190, 43),
(191, 42),
(192, 42),
(193, 42),
(194, 42),
(195, 43),
(195, 44),
(195, 45),
(196, 43),
(196, 44),
(197, 43),
(197, 44),
(198, 43),
(198, 44),
(199, 43),
(199, 44),
(199, 45),
(200, 43),
(200, 45),
(201, 43),
(202, 43),
(203, 43),
(203, 44),
(204, 43),
(204, 44),
(205, 43),
(205, 44),
(206, 43),
(206, 44),
(207, 43),
(207, 44),
(208, 43),
(208, 44),
(209, 43),
(209, 44),
(210, 43),
(210, 44),
(211, 43),
(211, 44),
(212, 43),
(212, 44),
(213, 43),
(213, 44),
(214, 43),
(214, 44),
(215, 43),
(215, 44),
(216, 43),
(216, 44),
(217, 43),
(217, 44),
(218, 43),
(218, 44),
(219, 43),
(219, 44),
(220, 43),
(220, 44),
(221, 43),
(221, 44),
(222, 43),
(222, 44),
(223, 43),
(223, 44),
(224, 43),
(224, 44),
(225, 43),
(225, 44),
(226, 43),
(226, 44),
(227, 43),
(227, 44),
(228, 43),
(228, 44),
(229, 43),
(229, 44),
(230, 43),
(230, 44),
(231, 43),
(231, 44),
(232, 43),
(232, 44),
(233, 43),
(233, 44),
(233, 45),
(234, 43),
(234, 44),
(235, 43),
(235, 44),
(236, 43),
(236, 44),
(237, 43),
(237, 44),
(238, 43),
(238, 44),
(238, 45),
(239, 43),
(239, 44),
(240, 43),
(240, 44),
(241, 43),
(241, 44),
(242, 43),
(242, 45),
(243, 43),
(243, 44),
(243, 45),
(244, 43),
(244, 44),
(245, 43),
(245, 44),
(246, 43),
(246, 44),
(247, 43),
(247, 44),
(247, 45),
(248, 43),
(248, 44),
(249, 43),
(249, 44),
(250, 43),
(250, 44),
(251, 43),
(251, 44),
(251, 45),
(252, 43),
(252, 44),
(253, 43),
(253, 44),
(254, 43),
(254, 44),
(255, 43),
(255, 44),
(255, 45),
(256, 43),
(256, 44),
(257, 43),
(257, 44),
(258, 43),
(258, 44),
(259, 43),
(259, 44),
(260, 43),
(260, 44),
(261, 43),
(261, 44),
(262, 43),
(262, 44),
(263, 43),
(263, 44),
(264, 43),
(264, 44),
(265, 43),
(265, 44),
(266, 43),
(266, 44),
(267, 43),
(267, 44),
(268, 43),
(268, 44),
(269, 43),
(269, 44),
(270, 43),
(270, 44),
(271, 43),
(271, 44),
(272, 43),
(272, 44),
(273, 43),
(273, 44),
(274, 43),
(274, 44),
(275, 43),
(275, 44),
(276, 43),
(276, 44),
(277, 43),
(277, 44),
(278, 43),
(278, 44),
(278, 45),
(279, 43),
(280, 43),
(281, 43),
(282, 43),
(283, 43),
(283, 44),
(283, 45),
(284, 43),
(284, 44),
(285, 43),
(285, 44),
(286, 43),
(286, 44);

-- --------------------------------------------------------

--
-- Table structure for table `salary_components_types`
--

CREATE TABLE `salary_components_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_components_types`
--

INSERT INTO `salary_components_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Housing Allowance', 'بدل السكن', 2, '2025-01-12 01:19:36', '2025-01-22 19:53:55'),
(2, 'Basic Salary', 'الراتب الأساسي', 2, '2025-01-22 19:53:22', '2025-01-22 19:53:22'),
(3, 'Transportation Allowance', 'بدل المواصلات', 2, '2025-01-22 19:54:28', '2025-01-22 19:54:28');

-- --------------------------------------------------------

--
-- Table structure for table `salary_settings`
--

CREATE TABLE `salary_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `saudi_company_insurance_percentage` double DEFAULT NULL,
  `saudi_employee_insurance_percentage` double DEFAULT NULL,
  `Nonsaudi_company_insurance_percentage` double DEFAULT NULL,
  `Nonsaudi_employee_insurance_percentage` double DEFAULT NULL,
  `saudi_employee_medical_insurance` double DEFAULT NULL,
  `Nonsaudi_employee_medical_insurance` double DEFAULT NULL,
  `saudi_company_medical_insurance` double DEFAULT NULL,
  `Nonsaudi_company_medical_insurance` double DEFAULT NULL,
  `work_days` varchar(255) DEFAULT NULL,
  `work_hours` int(11) NOT NULL DEFAULT 8,
  `annual_vacations` varchar(255) DEFAULT NULL,
  `week_vacations` varchar(255) DEFAULT NULL,
  `sick_absence_discount` double(8,2) DEFAULT NULL,
  `absence_with_permission_discount` double(8,2) DEFAULT NULL,
  `absence_without_permission_discount` double(8,2) DEFAULT NULL,
  `overtime_rate` double(8,2) DEFAULT NULL,
  `payroll_calculator` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `other_currency_rate` double NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salary_settings`
--

INSERT INTO `salary_settings` (`id`, `saudi_company_insurance_percentage`, `saudi_employee_insurance_percentage`, `Nonsaudi_company_insurance_percentage`, `Nonsaudi_employee_insurance_percentage`, `saudi_employee_medical_insurance`, `Nonsaudi_employee_medical_insurance`, `saudi_company_medical_insurance`, `Nonsaudi_company_medical_insurance`, `work_days`, `work_hours`, `annual_vacations`, `week_vacations`, `sick_absence_discount`, `absence_with_permission_discount`, `absence_without_permission_discount`, `overtime_rate`, `payroll_calculator`, `created_by`, `created_at`, `updated_at`, `other_currency_rate`) VALUES
(1, 12, 10, 2, 0, NULL, NULL, NULL, NULL, '30', 8, '21', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-04-21 07:49:21', 1),
(2, 1, 9, 9, 0, 0, 0, 0, 0, NULL, 8, '21', 'Saturday,Friday', 0.25, 1.00, 2.00, 1.50, NULL, 22, '2022-06-07 10:44:08', '2023-11-25 22:42:48', 8.17),
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
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 612, '2022-12-26 12:15:02', '2022-12-26 12:15:02', 1),
(105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 623, '2023-12-18 09:14:11', '2023-12-18 09:14:11', 1),
(106, 21, 9, 0, 0, 200, 200, NULL, NULL, NULL, 8, '60', 'Friday', 20.00, 20.00, 10.00, 20.00, NULL, 2, '2024-11-20 14:48:03', '2025-01-26 21:17:06', 1),
(107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 702, '2025-01-25 23:13:45', '2025-01-25 23:13:45', 1),
(108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 704, '2025-01-26 11:30:22', '2025-01-26 11:30:22', 1),
(109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 705, '2025-01-26 11:43:51', '2025-01-26 11:43:51', 1),
(110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 710, '2025-01-26 15:48:29', '2025-01-26 15:48:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saturation_deductions`
--

CREATE TABLE `saturation_deductions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `deduction_option` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `percent` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `saturation_deductions`
--

INSERT INTO `saturation_deductions` (`id`, `employee_id`, `deduction_option`, `title`, `date`, `percent`, `amount`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 3, 1, 'خصم تشبع جديد', '2025-01-26', NULL, 20, 2, '2025-01-26 15:06:55', '2025-01-26 15:06:55'),
(3, 3, 1, 'new ded', '2025-01-27', NULL, 10, 2, '2025-01-27 15:38:54', '2025-01-27 15:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `sub_dep_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `sub_dep_id`, `created_by`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Talent Acquisition and Recruitment', 'إدارة التوظيف والاستقطاب', '2025-01-25 11:29:32', '2025-01-25 11:43:55');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'company_logo', '2_logo.png', 2, NULL, NULL),
(2, 'company_favicon', '2_favicon.png', 2, NULL, NULL),
(3, 'site_currency', 'Saudi', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(4, 'site_currency_symbol', 'SR', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(5, 'site_currency_symbol_position', 'pre', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(6, 'site_date_format', 'M j, Y', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(7, 'site_time_format', 'g:i A', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(8, 'employee_prefix', '#EMP00', 2, '2025-01-09 23:39:37', '2025-01-09 23:39:37'),
(27, 'company_name', 'Mwaredi', 2, NULL, NULL),
(28, 'company_address', 'jeddah', 2, NULL, NULL),
(29, 'company_city', 'jeddah', 2, NULL, NULL),
(30, 'company_state', 'Makkah', 2, NULL, NULL),
(31, 'company_zipcode', '23245', 2, NULL, NULL),
(32, 'company_country', 'Saudi Arabia', 2, NULL, NULL),
(33, 'company_email', 'ahmad.melouk@gmail.com', 2, NULL, NULL),
(34, 'company_start_time', '09:00', 2, NULL, NULL),
(35, 'company_end_time', '17:00', 2, NULL, NULL),
(36, 'company_grace_period', '30', 2, NULL, NULL),
(37, 'company_grace_period_befor', '30', 2, NULL, NULL),
(38, 'ip_restrict', 'on', 2, NULL, NULL),
(39, 'lat', '21.5766988', 2, NULL, NULL),
(40, 'lon', '39.2138709', 2, NULL, NULL),
(41, 'title_text', 'mwaredi', 2, NULL, NULL),
(42, 'metakeyword', 'HRM', 2, NULL, NULL),
(43, 'metadesc', 'HRM', 2, NULL, NULL),
(50, 'company_telephone', '0553370407', 2, NULL, NULL),
(51, 'company_email_from_name', 'Mwardi', 2, NULL, NULL),
(128, 'company_logo', '673_logo.png', 673, NULL, NULL),
(129, 'company_logo', '693_logo.png', 693, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `set_salaries`
--

CREATE TABLE `set_salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `location_id` bigint(20) DEFAULT NULL,
  `shift_id` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_department`
--

CREATE TABLE `sub_department` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_department`
--

INSERT INTO `sub_department` (`id`, `department_id`, `created_by`, `name`, `name_ar`, `created_at`, `updated_at`) VALUES
(1, 10, 2, 'HR planning', 'تخطيط الموارد البشرية', '2025-01-25 09:39:11', '2025-01-25 11:39:11'),
(2, 10, 2, 'Training', 'التدريب', '2025-01-25 11:26:53', '2025-01-25 11:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `sub_request_types`
--

CREATE TABLE `sub_request_types` (
  `id` int(11) NOT NULL,
  `request_type_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `name_ar` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_request_types`
--

INSERT INTO `sub_request_types` (`id`, `request_type_id`, `name`, `name_ar`, `created_by`, `updated_at`, `created_at`) VALUES
(1, 1, 'ccc', 'cccccccccccccccc', 2, '2025-02-03 02:05:07', '2025-02-03 01:56:49'),
(3, 1, 'dddd', 'dddddddddddd', 2, '2025-02-03 02:30:36', '2025-02-03 02:30:36');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `start_date` text DEFAULT NULL,
  `due_date` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `employee_id`, `name`, `label`, `start_date`, `due_date`, `status`, `note`, `priority`, `created_at`, `updated_at`, `created_by`) VALUES
(7, 1, 'انترفيو مع المبرمج', NULL, '25-01-2025', '30-01-2025', 0, NULL, 1, '2025-01-25 21:14:12', '2025-01-25 21:15:20', 2),
(8, 5, 'new task', NULL, '29-01-2025', '29-01-2025', 0, NULL, 0, '2025-01-29 13:15:07', '2025-01-29 13:15:07', 2),
(9, 3, 'new task', NULL, '29-01-2025', '29-01-2025', 0, NULL, 0, '2025-01-29 13:15:32', '2025-01-29 13:15:32', 2),
(10, 6, 'omar elruby', NULL, '29-01-2025', '29-01-2025', 0, NULL, 0, '2025-01-29 23:49:42', '2025-01-29 23:49:42', 2),
(11, 7, 'aaa', NULL, '29-01-2025', '29-01-2025', 0, 'aa', 0, '2025-01-30 14:08:14', '2025-01-30 14:08:14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `task_activity_logs`
--

CREATE TABLE `task_activity_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_comments`
--

CREATE TABLE `task_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text DEFAULT NULL,
  `attachments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminate_requests`
--

CREATE TABLE `terminate_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) DEFAULT NULL,
  `date_termination` varchar(255) DEFAULT NULL,
  `date_notify` varchar(255) DEFAULT NULL,
  `leave_credit` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `terminations`
--

CREATE TABLE `terminations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `notice_date` date NOT NULL,
  `termination_date` date NOT NULL,
  `termination_type` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `termination_types`
--

CREATE TABLE `termination_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `termination_types`
--

INSERT INTO `termination_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Resignation', 'الاستقالة', 2, '2025-01-10 15:21:33', '2025-01-10 15:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `description_ar` varchar(255) DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `ticket_code` varchar(255) DEFAULT NULL,
  `ticket_created` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_replies`
--

CREATE TABLE `ticket_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_sheets`
--

CREATE TABLE `time_sheets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `hours` double(8,2) NOT NULL DEFAULT 0.00,
  `remark` text DEFAULT NULL,
  `remark_ar` text DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `time_sheets`
--

INSERT INTO `time_sheets` (`id`, `employee_id`, `date`, `hours`, `remark`, `remark_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(6, 3, '2025-01-16', 8.00, NULL, NULL, 2, '2025-01-29 13:57:29', '2025-01-29 13:57:29'),
(7, 5, '2025-01-31', 9.00, NULL, NULL, 2, '2025-01-29 13:59:59', '2025-01-29 13:59:59'),
(8, 712, '2025-01-24', 22.00, NULL, NULL, 2, '2025-01-30 21:16:29', '2025-01-30 21:16:29'),
(9, 712, '2025-01-31', 22.00, NULL, NULL, 2, '2025-01-30 21:21:23', '2025-01-30 21:21:23'),
(10, 6, '2025-01-29', 20.00, NULL, NULL, 2, '2025-01-30 21:23:10', '2025-01-30 21:23:10'),
(11, 7, '2025-01-31', 99.00, NULL, NULL, 2, '2025-01-30 21:26:13', '2025-01-30 21:26:13');

-- --------------------------------------------------------

--
-- Table structure for table `trainers`
--

CREATE TABLE `trainers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname_ar` varchar(255) NOT NULL,
  `lastname_ar` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `expertise` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch` int(11) NOT NULL,
  `trainer_option` int(11) NOT NULL,
  `training_type` int(11) NOT NULL,
  `trainer` int(11) NOT NULL,
  `training_cost` double(8,2) NOT NULL DEFAULT 0.00,
  `employee` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text DEFAULT NULL,
  `description_ar` text NOT NULL,
  `performance` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `remarks` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `training_types`
--

CREATE TABLE `training_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_types`
--

INSERT INTO `training_types` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Technical Skills Training', 'تدريب المهارات التقنية', 2, '2025-01-10 15:26:22', '2025-01-10 15:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `transfer_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transfer_balances`
--

CREATE TABLE `transfer_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_account_id` int(11) NOT NULL,
  `to_account_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type_id` int(11) NOT NULL,
  `referal_id` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `purpose_of_visit` varchar(255) NOT NULL,
  `place_of_visit` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `purpose_of_visit_ar` varchar(255) NOT NULL,
  `place_of_visit_ar` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `request_type` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `lang` varchar(255) NOT NULL,
  `plan` int(11) DEFAULT NULL,
  `plan_expire_date` date DEFAULT NULL,
  `requested_plan` int(11) NOT NULL DEFAULT 0,
  `number_of_employees` varchar(255) DEFAULT NULL,
  `device_id` varchar(255) DEFAULT NULL,
  `fcm_token` text DEFAULT NULL,
  `forgetcode` varchar(255) DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1,
  `user_status` tinyint(4) NOT NULL DEFAULT 1,
  `company_slate_readed` double DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `messenger_color` varchar(255) NOT NULL DEFAULT '#2180f3',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `have_hr` tinyint(4) DEFAULT NULL,
  `activity_type` varchar(255) DEFAULT NULL,
  `job_title` varchar(255) DEFAULT NULL,
  `work_email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `company_name`, `email`, `phone`, `email_verified_at`, `password`, `type`, `request_type`, `avatar`, `lang`, `plan`, `plan_expire_date`, `requested_plan`, `number_of_employees`, `device_id`, `fcm_token`, `forgetcode`, `last_login`, `is_active`, `user_status`, `company_slate_readed`, `created_by`, `remember_token`, `created_at`, `updated_at`, `messenger_color`, `dark_mode`, `active_status`, `have_hr`, `activity_type`, `job_title`, `work_email`) VALUES
(1, 'Super Admin', NULL, 'superadmin@example.com', NULL, NULL, '$2y$10$gCmhYhUoZ7YiNIMfbNOpAePS.FB8cOfuzMI2xoQxVu3Nzdi67tckS', 'super admin', NULL, '', 'ar', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-06 12:08:48', 1, 1, NULL, '0', NULL, '2022-02-05 22:59:38', '2025-02-06 12:11:00', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(2, 'admin', NULL, 'admin@idev.com', NULL, NULL, '$2y$10$gCmhYhUoZ7YiNIMfbNOpAePS.FB8cOfuzMI2xoQxVu3Nzdi67tckS', 'company', NULL, 'uploads/avatar//41081a9b2f965b50f638a25019317384_1737883822.jpg', 'en', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-06 12:12:01', 1, 1, NULL, '1', NULL, '2025-01-26 11:30:22', '2025-02-06 12:12:01', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(703, 'company', NULL, 'company@example.com', NULL, NULL, '$2y$10$iaSn1zeW4x8fv9Ohjf7m8eGbLCcKSao1bEA4BqCQEs..Mth41K8c.', 'company', NULL, '', 'en', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-01-26 11:29:29', 1, 1, NULL, '1', NULL, '2025-01-26 11:27:03', '2025-01-26 11:29:29', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(707, 'omar elruby', NULL, 'omar@gmail.com', NULL, NULL, '$2y$10$3Dl5/.K/gkvlPdzl1aoHrORwKoBZSBZNdLJQhoQ16WXqk/WJwvh3W', 'company', NULL, 'uploads/avatar//Diamond-Painting-Chat-avec-Rose_1737884631.jpg', '', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-01-26 13:00:51', 1, 1, NULL, '1', NULL, '2025-01-26 11:43:51', '2025-01-26 13:00:51', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(708, 'ahmed', NULL, 'ahmed@idev.com', NULL, NULL, '$2y$10$gCmhYhUoZ7YiNIMfbNOpAePS.FB8cOfuzMI2xoQxVu3Nzdi67tckS', 'company', NULL, 'uploads/avatar//41081a9b2f965b50f638a25019317384_1737883822.jpg', '', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-01-26 11:39:55', 1, 1, NULL, '1', NULL, '2025-01-26 11:30:22', '2025-01-26 11:39:55', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(709, 'omar elruby', NULL, 'elrubyomar@gmail.com', NULL, NULL, '$2y$10$siidKj0LkTmy3kjNgMEiWOUhg9DMgtqLErL1ugN59dPqesHWFOs1O', 'employee', NULL, NULL, 'ar', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-02 19:03:54', 1, 1, NULL, '2', NULL, '2025-01-26 13:03:43', '2025-02-02 19:03:54', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(710, 'New Company', NULL, 'company@company.com', NULL, NULL, '$2y$10$ivVl.tV2Ex4cLpBLorkbs.9mPj6ybm49iyY.mPlW3HwJAgGlpqX3W', 'company', NULL, 'uploads/avatar//Screenshot 2025-01-17 at 1.29.15 AM_1737899309.png', '', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-01-26 15:49:23', 1, 1, NULL, '1', NULL, '2025-01-26 15:48:29', '2025-01-26 15:49:23', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(711, 'Ahmed Malek', NULL, 'malek@gmail.com', NULL, NULL, '$2y$10$Khw5pPZK8APmnsrfMg77A.CV6ilZnXd5VToriuIYbgAzbsPSrIR1S', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2025-01-28 13:22:29', '2025-01-28 13:22:29', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(712, 'depadmin', NULL, 'depadmin@gmail.com', NULL, NULL, '$2y$10$dyU8LMVhWKcLr8CVSK2SROxP9x5S73FJON4YTs/I57C8d2shfi9Ue', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-03 02:10:41', 1, 1, NULL, '2', NULL, '2025-01-29 20:56:17', '2025-02-03 02:10:41', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(713, 'subdepadmin', NULL, 'subdepadmin@gmail.com', NULL, NULL, '$2y$10$3gbR1OJ8mk5mAjkc6jqNkuaRbaGj/asF6FA1HiMc2OhAD0kiNscgu', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2025-02-04 00:58:05', 1, 1, NULL, '2', NULL, '2025-01-29 20:57:30', '2025-02-04 00:58:05', '#2180f3', 0, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupons`
--

CREATE TABLE `user_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` int(11) NOT NULL,
  `coupon` int(11) NOT NULL,
  `order` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_type_ar` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `model_ar` varchar(255) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `check_date` date DEFAULT NULL,
  `custody` varchar(255) DEFAULT NULL,
  `custody_ar` varchar(255) DEFAULT NULL,
  `insurance_expiry_date` date DEFAULT NULL,
  `check_expiry_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `warnings`
--

CREATE TABLE `warnings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `warning_to` int(11) NOT NULL,
  `warning_by` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `warning_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `description_ar` varchar(255) NOT NULL,
  `subject_ar` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `title_ar` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `title`, `title_ar`, `updated_at`, `created_at`) VALUES
(1, 'Centralized HR Management – Manage employee records, payroll, attendance, and performance in one place.', 'إدارة الموارد البشرية المركزية - إدارة سجلات الموظفين، وكشوف المرتبات، والحضور، والأداء في مكان واحد.', '2025-02-06 10:09:12', '2025-02-05 22:51:02'),
(3, 'Automated Payroll and Compliance - Ensure timely payroll processing while automating deductions and benefits.', 'الرواتب الآلية والامتثال - ضمان معالجة الرواتب في الوقت المناسب مع أتمتة الخصومات والمزايا.', '2025-02-06 10:10:42', '2025-02-05 23:00:43'),
(4, 'Smart Attendance & Leave Tracking – Real-time clock-in, leave approvals, and shift scheduling.', 'تتبع الحضور والانصراف الذكي – تسجيل الحضور والانصراف في الوقت الفعلي، والموافقة على الإجازات، وجدولة المناوبات.', '2025-02-06 10:12:06', '2025-02-06 10:12:06'),
(5, 'AI-Powered Recruitment – Simplify hiring with applicant tracking and automated onboarding.', 'التوظيف المدعوم بالذكاء الاصطناعي – قم بتبسيط عملية التوظيف من خلال تتبع المتقدمين والتوجيه الآلي.', '2025-02-06 10:12:54', '2025-02-06 10:12:54'),
(6, 'Employee Self-Service Portal – Empower your team with access to their payslips, requests, and performance insights.', 'بوابة الخدمة الذاتية للموظفين – قم بتمكين فريقك من الوصول إلى كشوف رواتبهم وطلباتهم ورؤى الأداء.', '2025-02-06 10:14:04', '2025-02-06 10:14:04'),
(7, 'Powerful Analytics & Reports – Gain real-time insights into workforce performance.', 'تحليلات وتقارير قوية - احصل على رؤى في الوقت الفعلي حول أداء القوى العاملة.', '2025-02-06 10:14:52', '2025-02-06 10:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `work_from_home_requests`
--

CREATE TABLE `work_from_home_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) DEFAULT 'pending',
  `created_by` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `direct_manager` bigint(20) DEFAULT NULL,
  `reject_reason` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `work_unites`
--

CREATE TABLE `work_unites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_unites`
--

INSERT INTO `work_unites` (`id`, `name`, `name_ar`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'hr', 'موارد بشرية', 2, '2025-01-12 16:17:21', '2025-01-12 16:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `zkteco_devices`
--

CREATE TABLE `zkteco_devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) NOT NULL,
  `port` varchar(10) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zoom_meetings`
--

CREATE TABLE `zoom_meetings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `meeting_id` varchar(255) NOT NULL DEFAULT '0',
  `user_id` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) DEFAULT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `duration` int(11) NOT NULL DEFAULT 0,
  `start_url` text DEFAULT NULL,
  `join_url` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'waiting',
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `clients`
--
ALTER TABLE `clients`
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
  ADD KEY `parent_fk` (`parent`);

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
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
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `front_setting`
--
ALTER TABLE `front_setting`
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
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
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
-- Indexes for table `languages`
--
ALTER TABLE `languages`
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
-- Indexes for table `mac_address`
--
ALTER TABLE `mac_address`
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
-- Indexes for table `order_requests`
--
ALTER TABLE `order_requests`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `plan_request`
--
ALTER TABLE `plan_request`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `section`
--
ALTER TABLE `section`
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
-- Indexes for table `sub_department`
--
ALTER TABLE `sub_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_request_types`
--
ALTER TABLE `sub_request_types`
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
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
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
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `absences`
--
ALTER TABLE `absences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `account_lists`
--
ALTER TABLE `account_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_payment_settings`
--
ALTER TABLE `admin_payment_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowances`
--
ALTER TABLE `allowances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `allowance_options`
--
ALTER TABLE `allowance_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `announcement_employees`
--
ALTER TABLE `announcement_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appraisals`
--
ALTER TABLE `appraisals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assets_types`
--
ALTER TABLE `assets_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_employees`
--
ALTER TABLE `attendance_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `attendance_movements`
--
ALTER TABLE `attendance_movements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `award_types`
--
ALTER TABLE `award_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `companyslates`
--
ALTER TABLE `companyslates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_breaks`
--
ALTER TABLE `company_breaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_ducument_uploads`
--
ALTER TABLE `company_ducument_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_ducument_upload_categories`
--
ALTER TABLE `company_ducument_upload_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_job_requests`
--
ALTER TABLE `company_job_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_policies`
--
ALTER TABLE `company_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `company_structures`
--
ALTER TABLE `company_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `company_structure_employees`
--
ALTER TABLE `company_structure_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contract_templates`
--
ALTER TABLE `contract_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `custom_questions`
--
ALTER TABLE `custom_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_options`
--
ALTER TABLE `deduction_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ducument_uploads`
--
ALTER TABLE `ducument_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ducument_upload_images`
--
ALTER TABLE `ducument_upload_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_branches`
--
ALTER TABLE `employee_branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_breaks`
--
ALTER TABLE `employee_breaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_contracts`
--
ALTER TABLE `employee_contracts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee_documents`
--
ALTER TABLE `employee_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_finger_print_locations`
--
ALTER TABLE `employee_finger_print_locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_followers`
--
ALTER TABLE `employee_followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_permissions`
--
ALTER TABLE `employee_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_requests`
--
ALTER TABLE `employee_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `employee_shifts`
--
ALTER TABLE `employee_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_tasks`
--
ALTER TABLE `employee_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_answers`
--
ALTER TABLE `evaluation_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_categories`
--
ALTER TABLE `evaluation_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_results`
--
ALTER TABLE `evaluation_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_sections`
--
ALTER TABLE `evaluation_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_employees`
--
ALTER TABLE `event_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fcm`
--
ALTER TABLE `fcm`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `front_setting`
--
ALTER TABLE `front_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genrate_payslip_options`
--
ALTER TABLE `genrate_payslip_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal_trackings`
--
ALTER TABLE `goal_trackings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal_types`
--
ALTER TABLE `goal_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `holiday_types`
--
ALTER TABLE `holiday_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income_types`
--
ALTER TABLE `income_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `indicators`
--
ALTER TABLE `indicators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `insurance_companies`
--
ALTER TABLE `insurance_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interview_schedules`
--
ALTER TABLE `interview_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `in_out_logs`
--
ALTER TABLE `in_out_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ip_restricts`
--
ALTER TABLE `ip_restricts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobtitles`
--
ALTER TABLE `jobtitles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_application_notes`
--
ALTER TABLE `job_application_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_categories`
--
ALTER TABLE `job_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_offer_answers`
--
ALTER TABLE `job_offer_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `job_offer_questions`
--
ALTER TABLE `job_offer_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `job_offer_question_options`
--
ALTER TABLE `job_offer_question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_offer_sections`
--
ALTER TABLE `job_offer_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_offer_users`
--
ALTER TABLE `job_offer_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_on_boards`
--
ALTER TABLE `job_on_boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_requests`
--
ALTER TABLE `job_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_stages`
--
ALTER TABLE `job_stages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `labor_hire_companies`
--
ALTER TABLE `labor_hire_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `landaboutcards`
--
ALTER TABLE `landaboutcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landblogs`
--
ALTER TABLE `landblogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landcloudcards`
--
ALTER TABLE `landcloudcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landcontactcards`
--
ALTER TABLE `landcontactcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landdemocards`
--
ALTER TABLE `landdemocards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landfaqs`
--
ALTER TABLE `landfaqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landfeatures`
--
ALTER TABLE `landfeatures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landhelpcards`
--
ALTER TABLE `landhelpcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landing_page_sections`
--
ALTER TABLE `landing_page_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `landing_page_settings`
--
ALTER TABLE `landing_page_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landplans`
--
ALTER TABLE `landplans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsaycards`
--
ALTER TABLE `landsaycards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsections`
--
ALTER TABLE `landsections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsliders`
--
ALTER TABLE `landsliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsocialmedia`
--
ALTER TABLE `landsocialmedia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landsupportforms`
--
ALTER TABLE `landsupportforms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leaves_types`
--
ALTER TABLE `leaves_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `loan_options`
--
ALTER TABLE `loan_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `loan_pendings`
--
ALTER TABLE `loan_pendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mac_address`
--
ALTER TABLE `mac_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `meeting_employees`
--
ALTER TABLE `meeting_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `missions`
--
ALTER TABLE `missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_categories`
--
ALTER TABLE `offer_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_requests`
--
ALTER TABLE `order_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `other_payments`
--
ALTER TABLE `other_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `over_time_requests`
--
ALTER TABLE `over_time_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payees`
--
ALTER TABLE `payees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payers`
--
ALTER TABLE `payers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_types`
--
ALTER TABLE `payment_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll_settings`
--
ALTER TABLE `payroll_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslip_types`
--
ALTER TABLE `payslip_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pay_slips`
--
ALTER TABLE `pay_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `performance`
--
ALTER TABLE `performance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_details`
--
ALTER TABLE `performance_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_factors`
--
ALTER TABLE `performance_factors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_periods`
--
ALTER TABLE `performance_periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `performance__types`
--
ALTER TABLE `performance__types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=287;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `plan_request`
--
ALTER TABLE `plan_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_options`
--
ALTER TABLE `question_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request_types`
--
ALTER TABLE `request_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `salary_components_types`
--
ALTER TABLE `salary_components_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary_settings`
--
ALTER TABLE `salary_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `saturation_deductions`
--
ALTER TABLE `saturation_deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `set_salaries`
--
ALTER TABLE `set_salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_department`
--
ALTER TABLE `sub_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_request_types`
--
ALTER TABLE `sub_request_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `task_activity_logs`
--
ALTER TABLE `task_activity_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_comments`
--
ALTER TABLE `task_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminate_requests`
--
ALTER TABLE `terminate_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `terminations`
--
ALTER TABLE `terminations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `termination_types`
--
ALTER TABLE `termination_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_sheets`
--
ALTER TABLE `time_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `trainers`
--
ALTER TABLE `trainers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `training_types`
--
ALTER TABLE `training_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transfer_balances`
--
ALTER TABLE `transfer_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=714;

--
-- AUTO_INCREMENT for table `user_coupons`
--
ALTER TABLE `user_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warnings`
--
ALTER TABLE `warnings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `work_from_home_requests`
--
ALTER TABLE `work_from_home_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_unites`
--
ALTER TABLE `work_unites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zkteco_devices`
--
ALTER TABLE `zkteco_devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zoom_meetings`
--
ALTER TABLE `zoom_meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
