-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 09, 2025 at 09:16 PM
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `leave_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `date` date NOT NULL,
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
-- Table structure for table `commissions`
--

CREATE TABLE `commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `type` varchar(255) NOT NULL DEFAULT '$',
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `percentage` varchar(255) DEFAULT NULL,
  `close_deal_amount` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `company_structures`
--

CREATE TABLE `company_structures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `parent` bigint(20) UNSIGNED DEFAULT NULL,
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
  `name_ar` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `department_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) NOT NULL,
  `is_required` varchar(255) NOT NULL,
  `document_type` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `document_types`
--

CREATE TABLE `document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `sync_attendance_employee_id` int(11) DEFAULT NULL,
  `user_register` tinyint(4) NOT NULL DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `name_ar` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
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
  `designation_id` int(11) DEFAULT NULL,
  `company_doj` varchar(255) DEFAULT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `account_holder_name` varchar(255) DEFAULT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_identifier_code` varchar(255) DEFAULT NULL,
  `branch_location` varchar(255) DEFAULT NULL,
  `tax_payer_id` varchar(255) DEFAULT NULL,
  `salary_type` int(11) DEFAULT NULL,
  `salary` double DEFAULT 0,
  `expiry_date` varchar(255) DEFAULT NULL,
  `driving_license_number` varchar(255) DEFAULT NULL,
  `driving_license` tinyint(4) DEFAULT NULL,
  `insurance_number` varchar(255) DEFAULT NULL,
  `contract_number` varchar(255) DEFAULT NULL,
  `commencement_date` date DEFAULT NULL,
  `social_status` tinyint(4) DEFAULT NULL,
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
  `probation_periods_duration` text DEFAULT NULL,
  `probation_periods_status` int(11) DEFAULT NULL,
  `payment_type` text DEFAULT NULL,
  `employee_account_type` text DEFAULT NULL,
  `bank_IBAN_number` int(11) DEFAULT NULL,
  `salary_card_number` text DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `IBAN_number` text DEFAULT NULL,
  `account_holder_name_ar` text DEFAULT NULL,
  `branch_location_ar` text DEFAULT NULL,
  `swift_code` text DEFAULT NULL,
  `sort_code` text DEFAULT NULL,
  `bank_country` text DEFAULT NULL,
  `policy_number` text DEFAULT NULL,
  `insurance_startdate` date DEFAULT NULL,
  `category` text DEFAULT NULL,
  `cost` text DEFAULT NULL,
  `availability_health_insurance_council` date DEFAULT NULL,
  `health_insurance_council_startdate` date DEFAULT NULL,
  `insurance_document` text DEFAULT NULL,
  `annual_leave_entitlement` text DEFAULT NULL,
  `shift` text DEFAULT NULL,
  `location` int(11) DEFAULT NULL,
  `medical_insurance_number` varchar(255) DEFAULT NULL,
  `medical_insurance_card_number` varchar(255) DEFAULT NULL,
  `medical_insurance_start_date` varchar(255) DEFAULT NULL,
  `medical_insurance_end_date` varchar(255) DEFAULT NULL,
  `medical_blood_type` varchar(255) DEFAULT NULL,
  `medical_insurance_type` varchar(255) DEFAULT NULL,
  `medical_cover_ratio` varchar(255) DEFAULT NULL,
  `medical_insurance_policy` varchar(255) DEFAULT NULL,
  `insurance_company_id` bigint(20) DEFAULT NULL,
  `login_image` varchar(255) DEFAULT NULL,
  `fingerprint_out_campany` varchar(255) NOT NULL DEFAULT '0',
  `skip_start_work_location` int(11) NOT NULL DEFAULT 0,
  `read_slate` int(11) DEFAULT 0,
  `national_id` varchar(255) DEFAULT NULL,
  `on_off_notification` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `applied_on` date NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `request_reason` varchar(255) DEFAULT NULL,
  `request_reason_ar` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `maxDays` int(11) DEFAULT NULL,
  `maxDaysPerMonth` int(11) DEFAULT NULL,
  `afterMaxHour` int(11) DEFAULT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `daysBeforeApply` int(11) DEFAULT NULL,
  `deduction` float DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(13, 'App\\Models\\User', 640),
(13, 'App\\Models\\User', 642);

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
  `rate` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(326, 'Dashboard-View', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Dashboard'),
(327, 'Employee-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(328, 'Employee-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(329, 'Employee-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(330, 'Employee-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(331, 'Employee-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(332, 'Employee-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Employee'),
(333, 'Shift-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(334, 'Shift-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(335, 'Shift-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(336, 'Shift-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(337, 'Shift-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(338, 'Shift-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Shift'),
(339, 'Attendance-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Attendance'),
(340, 'Attendance-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Attendance'),
(341, 'Attendance-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Attendance'),
(342, 'Saturationdeduction-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(343, 'Saturationdeduction-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(344, 'Saturationdeduction-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(345, 'Saturationdeduction-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(346, 'Saturationdeduction-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(347, 'Saturationdeduction-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Saturationdeduction'),
(348, 'Task-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(349, 'Task-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(350, 'Task-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(351, 'Task-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(352, 'Task-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(353, 'Task-Filter', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Task'),
(354, 'EmployeePermission-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(355, 'EmployeePermission-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(356, 'EmployeePermission-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(357, 'EmployeePermission-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(358, 'EmployeePermission-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(359, 'EmployeePermission-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(360, 'EmployeePermission-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(361, 'EmployeePermission-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'EmployeePermission'),
(362, 'Vacation-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(363, 'Vacation-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(364, 'Vacation-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(365, 'Vacation-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(366, 'Vacation-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(367, 'Vacation-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(368, 'Vacation-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(369, 'Vacation-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Vacation'),
(370, 'WorkFromHome-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(371, 'WorkFromHome-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(372, 'WorkFromHome-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(373, 'WorkFromHome-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(374, 'WorkFromHome-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(375, 'WorkFromHome-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(376, 'WorkFromHome-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(377, 'WorkFromHome-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Work From Home'),
(378, 'Loan-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(379, 'Loan-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(380, 'Loan-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(381, 'Loan-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(382, 'Loan-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(383, 'Loan-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(384, 'Loan-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(385, 'Loan-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Loan'),
(386, 'Mission-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(387, 'Mission-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(388, 'Mission-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(389, 'Mission-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(390, 'Mission-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(391, 'Mission-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(392, 'Mission-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(393, 'Mission-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Mission'),
(394, 'OverTime-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(395, 'OverTime-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(396, 'OverTime-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(397, 'OverTime-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(398, 'OverTime-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(399, 'OverTime-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(400, 'OverTime-Accept', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(401, 'OverTime-Reject', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'OverTime'),
(402, 'Evaluation-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(403, 'Evaluation-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(404, 'Evaluation-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(405, 'Evaluation-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(406, 'Evaluation-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(407, 'Evaluation-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Evaluation'),
(408, 'Performance-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(409, 'Performance-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(410, 'Performance-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(411, 'Performance-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(412, 'Performance-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(413, 'Performance-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Performance'),
(414, 'Meeting-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(415, 'Meeting-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(416, 'Meeting-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(417, 'Meeting-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(418, 'Meeting-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(419, 'Meeting-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Meeting'),
(420, 'Event-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(421, 'Event-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(422, 'Event-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(423, 'Event-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(424, 'Event-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(425, 'Event-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Event'),
(426, 'News-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'News'),
(427, 'News-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'News'),
(428, 'News-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'News'),
(429, 'News-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'News'),
(430, 'Offers-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Offers'),
(431, 'Offers-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Offers'),
(432, 'Offers-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Offers'),
(433, 'Offers-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Offers'),
(434, 'JobOffers-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(435, 'JobOffers-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(436, 'JobOffers-Edit', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(437, 'JobOffers-Delete', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(438, 'JobOffers-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(439, 'JobOffers-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'JobOffers'),
(440, 'Payroll-List', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(441, 'Payroll-View', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(442, 'Payroll-Create', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(443, 'Payroll-Export', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(444, 'Payroll-Print', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(445, 'Payroll-MonthlySalaryRecord', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(446, 'Payroll-PayrollTape', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(447, 'Payroll-Payment', 'web', '2023-05-07 10:00:50', '2023-05-07 10:00:50', 'Payroll'),
(448, 'Assets-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(449, 'Assets-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(450, 'Assets-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(451, 'Assets-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(452, 'Assets-Export', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(453, 'Assets-Print', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Assets'),
(454, 'companyStructures-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'companyStructures'),
(455, 'companyStructures-Assign', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'companyStructures'),
(456, 'Library-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Library'),
(457, 'Library-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Library'),
(458, 'Library-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Library'),
(459, 'Library-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Library'),
(460, 'AttendanceReport-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AttendanceReport'),
(461, 'AttendanceReport-Export', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AttendanceReport'),
(462, 'AttendanceReport-Print', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AttendanceReport'),
(463, 'VacationReport-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationReport'),
(464, 'VacationReport-Export', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationReport'),
(465, 'VacationReport-Print', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationReport'),
(466, 'EmailReport-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'EmailReport'),
(467, 'EmailReport-Export', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'EmailReport'),
(468, 'EmailReport-Print', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'EmailReport'),
(469, 'PayrollReport-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayrollReport'),
(470, 'PayrollReport-Export', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayrollReport'),
(471, 'PayrollReport-Print', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayrollReport'),
(472, 'Users-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Users'),
(473, 'Users-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Users'),
(474, 'Users-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Users'),
(475, 'Users-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Users'),
(476, 'Branch-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Branch'),
(477, 'Branch-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Branch'),
(478, 'Branch-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Branch'),
(479, 'Branch-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Branch'),
(480, 'Department-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Department'),
(481, 'Department-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Department'),
(482, 'Department-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Department'),
(483, 'Department-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Department'),
(484, 'PerformanceFactor-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformanceFactor'),
(485, 'PerformanceFactor-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformanceFactor'),
(486, 'PerformanceFactor-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformanceFactor'),
(487, 'PerformanceFactor-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformanceFactor'),
(488, 'PerformancePeriod-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformancePeriod'),
(489, 'PerformancePeriod-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformancePeriod'),
(490, 'PerformancePeriod-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformancePeriod'),
(491, 'PerformancePeriod-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PerformancePeriod'),
(492, 'InsuranceCompanies-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'InsuranceCompanies'),
(493, 'InsuranceCompanies-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'InsuranceCompanies'),
(494, 'InsuranceCompanies-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'InsuranceCompanies'),
(495, 'InsuranceCompanies-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'InsuranceCompanies'),
(496, 'AssetTypes-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AssetTypes'),
(497, 'AssetTypes-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AssetTypes'),
(498, 'AssetTypes-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AssetTypes'),
(499, 'AssetTypes-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AssetTypes'),
(500, 'Document-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Document'),
(501, 'Document-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Document'),
(502, 'Document-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Document'),
(503, 'Document-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'Document'),
(504, 'ContractTemplates-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'ContractTemplates'),
(505, 'ContractTemplates-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'ContractTemplates'),
(506, 'ContractTemplates-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'ContractTemplates'),
(507, 'ContractTemplates-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'ContractTemplates'),
(508, 'SalarySetting-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'SalarySetting'),
(509, 'PayrollSetting-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayrollSetting'),
(510, 'PayslipType-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayslipType'),
(511, 'PayslipType-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayslipType'),
(512, 'PayslipType-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayslipType'),
(513, 'PayslipType-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PayslipType'),
(514, 'AllowanceOption-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AllowanceOption'),
(515, 'AllowanceOption-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AllowanceOption'),
(516, 'AllowanceOption-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AllowanceOption'),
(517, 'AllowanceOption-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AllowanceOption'),
(518, 'AwardType-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AwardType'),
(519, 'AwardType-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AwardType'),
(520, 'AwardType-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AwardType'),
(521, 'AwardType-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AwardType'),
(522, 'DeductionOption-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'DeductionOption'),
(523, 'DeductionOption-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'DeductionOption'),
(524, 'DeductionOption-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'DeductionOption'),
(525, 'DeductionOption-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'DeductionOption'),
(526, 'LoanOption-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'LoanOption'),
(527, 'LoanOption-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'LoanOption'),
(528, 'LoanOption-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'LoanOption'),
(529, 'LoanOption-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'LoanOption'),
(530, 'PaymentType-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PaymentType'),
(531, 'PaymentType-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PaymentType'),
(532, 'PaymentType-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PaymentType'),
(533, 'PaymentType-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'PaymentType'),
(534, 'AttendanceSetting-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'AttendanceSetting'),
(535, 'VacationSetting-List', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationSetting'),
(536, 'VacationSetting-Create', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationSetting'),
(537, 'VacationSetting-Edit', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationSetting'),
(538, 'VacationSetting-Delete', 'web', '2023-05-10 09:57:25', '2023-05-10 09:57:25', 'VacationSetting'),
(539, 'Roles-List', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', 'Roles'),
(540, 'Roles-Create', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', 'Roles'),
(541, 'Roles-Edit', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', 'Roles'),
(542, 'Roles-Delete', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', 'Roles'),
(543, 'Create Employee', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', NULL),
(544, 'Manage Employee', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', NULL),
(545, 'Manage User', 'web', '2023-05-10 11:15:06', '2023-05-10 11:15:06', NULL),
(546, 'Manage User', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(547, 'Create User', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(548, 'Edit User', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(549, 'Delete User', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(550, 'Manage Role', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(551, 'Create Role', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(552, 'Delete Role', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(553, 'Edit Role', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(554, 'Manage Award', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(555, 'Create Award', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(556, 'Delete Award', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(557, 'Edit Award', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(558, 'Manage Transfer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(559, 'Create Transfer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(560, 'Delete Transfer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(561, 'Edit Transfer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(562, 'Manage Resignation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(563, 'Create Resignation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(564, 'Edit Resignation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(565, 'Delete Resignation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(566, 'Manage Travel', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(567, 'Create Travel', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(568, 'Edit Travel', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(569, 'Delete Travel', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(570, 'Manage Promotion', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(571, 'Create Promotion', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(572, 'Edit Promotion', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(573, 'Delete Promotion', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(574, 'Manage Complaint', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(575, 'Create Complaint', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(576, 'Edit Complaint', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(577, 'Delete Complaint', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(578, 'Manage Warning', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(579, 'Create Warning', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(580, 'Edit Warning', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(581, 'Delete Warning', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(582, 'Manage Termination', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(583, 'Create Termination', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(584, 'Edit Termination', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(585, 'Delete Termination', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(586, 'Manage Department', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(587, 'Create Department', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(588, 'Edit Department', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(589, 'Delete Department', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(590, 'Manage Designation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(591, 'Create Designation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(592, 'Edit Designation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(593, 'Delete Designation', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(594, 'Manage Document Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(595, 'Create Document Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(596, 'Edit Document Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(597, 'Delete Document Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(598, 'Manage Branch', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(599, 'Create Branch', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(600, 'Edit Branch', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(601, 'Delete Branch', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(602, 'Manage Award Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(603, 'Create Award Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(604, 'Edit Award Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(605, 'Delete Award Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(606, 'Manage Termination Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(607, 'Create Termination Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(608, 'Edit Termination Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(609, 'Delete Termination Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(610, 'Manage Employee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(611, 'Create Employee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(612, 'Edit Employee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(613, 'Delete Employee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(614, 'Show Employee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(615, 'Manage Payslip Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(616, 'Create Payslip Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(617, 'Edit Payslip Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(618, 'Delete Payslip Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(619, 'Manage Allowance Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(620, 'Create Allowance Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(621, 'Edit Allowance Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(622, 'Delete Allowance Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(623, 'Manage Loan Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(624, 'Create Loan Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(625, 'Edit Loan Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(626, 'Delete Loan Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(627, 'Manage Deduction Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(628, 'Create Deduction Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(629, 'Edit Deduction Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(630, 'Delete Deduction Option', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(631, 'Manage Set Salary', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(632, 'Create Set Salary', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(633, 'Edit Set Salary', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(634, 'Delete Set Salary', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(635, 'Manage Allowance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(636, 'Create Allowance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(637, 'Edit Allowance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(638, 'Delete Allowance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(639, 'Create Commission', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(640, 'Create Loan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(641, 'Create Saturation Deduction', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(642, 'Create Other Payment', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(643, 'Create Overtime', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(644, 'Edit Commission', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(645, 'Delete Commission', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(646, 'Edit Loan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(647, 'Delete Loan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(648, 'Edit Saturation Deduction', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(649, 'Delete Saturation Deduction', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(650, 'Edit Other Payment', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(651, 'Delete Other Payment', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(652, 'Edit Overtime', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(653, 'Delete Overtime', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(654, 'Manage Pay Slip', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(655, 'Create Pay Slip', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(656, 'Edit Pay Slip', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(657, 'Delete Pay Slip', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(658, 'Manage Account List', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(659, 'Create Account List', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(660, 'Edit Account List', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(661, 'Delete Account List', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(662, 'View Balance Account List', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(663, 'Manage Payee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(664, 'Create Payee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(665, 'Edit Payee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(666, 'Delete Payee', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(667, 'Manage Payer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(668, 'Create Payer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(669, 'Edit Payer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(670, 'Delete Payer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(671, 'Manage Expense Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(672, 'Create Expense Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(673, 'Edit Expense Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(674, 'Delete Expense Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(675, 'Manage Income Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(676, 'Edit Income Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(677, 'Delete Income Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(678, 'Create Income Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(679, 'Manage Payment Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(680, 'Create Payment Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(681, 'Edit Payment Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(682, 'Delete Payment Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(683, 'Manage Deposit', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(684, 'Create Deposit', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(685, 'Edit Deposit', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(686, 'Delete Deposit', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(687, 'Manage Expense', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(688, 'Create Expense', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(689, 'Edit Expense', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(690, 'Delete Expense', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(691, 'Manage Transfer Balance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(692, 'Create Transfer Balance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(693, 'Edit Transfer Balance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(694, 'Delete Transfer Balance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(695, 'Manage Event', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(696, 'Create Event', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(697, 'Edit Event', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(698, 'Delete Event', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(699, 'Manage Announcement', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(700, 'Create Announcement', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(701, 'Edit Announcement', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(702, 'Delete Announcement', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(703, 'Manage Leave Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(704, 'Create Leave Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(705, 'Edit Leave Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(706, 'Delete Leave Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(707, 'Manage Leave', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(708, 'Create Leave', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(709, 'Edit Leave', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(710, 'Delete Leave', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(711, 'Manage Meeting', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(712, 'Create Meeting', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(713, 'Edit Meeting', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(714, 'Delete Meeting', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(715, 'Manage Ticket', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(716, 'Create Ticket', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(717, 'Edit Ticket', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(718, 'Delete Ticket', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(719, 'Manage Attendance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(720, 'Create Attendance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(721, 'Edit Attendance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(722, 'Delete Attendance', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(723, 'Manage Language', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(724, 'Create Language', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(725, 'Manage Plan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(726, 'Create Plan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(727, 'Edit Plan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(728, 'Buy Plan', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(729, 'Manage System Settings', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(730, 'Manage Company Settings', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(731, 'Manage TimeSheet', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(732, 'Create TimeSheet', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(733, 'Edit TimeSheet', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(734, 'Delete TimeSheet', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(735, 'Manage Order', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(736, 'manage coupon', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(737, 'create coupon', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(738, 'edit coupon', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(739, 'delete coupon', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(740, 'Manage Assets', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(741, 'Create Assets', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(742, 'Edit Assets', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(743, 'Delete Assets', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(744, 'Manage Document', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(745, 'Create Document', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(746, 'Edit Document', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(747, 'Delete Document', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(748, 'Manage Employee Profile', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(749, 'Show Employee Profile', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(750, 'Manage Employee Last Login', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(751, 'Manage Indicator', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(752, 'Create Indicator', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(753, 'Edit Indicator', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(754, 'Delete Indicator', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(755, 'Show Indicator', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(756, 'Manage Appraisal', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(757, 'Create Appraisal', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(758, 'Edit Appraisal', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(759, 'Delete Appraisal', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(760, 'Show Appraisal', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(761, 'Manage Goal Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(762, 'Create Goal Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(763, 'Edit Goal Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(764, 'Delete Goal Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(765, 'Manage Goal Tracking', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(766, 'Create Goal Tracking', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(767, 'Edit Goal Tracking', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(768, 'Delete Goal Tracking', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(769, 'Manage Company Policy', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(770, 'Create Company Policy', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(771, 'Edit Company Policy', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(772, 'Delete Company Policy', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(773, 'Manage Trainer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(774, 'Create Trainer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(775, 'Edit Trainer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(776, 'Delete Trainer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(777, 'Show Trainer', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(778, 'Manage Training', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(779, 'Create Training', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(780, 'Edit Training', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(781, 'Delete Training', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(782, 'Show Training', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(783, 'Manage Training Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(784, 'Create Training Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(785, 'Edit Training Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(786, 'Delete Training Type', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(787, 'Manage Report', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(788, 'Manage Holiday', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(789, 'Create Holiday', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(790, 'Edit Holiday', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(791, 'Delete Holiday', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(792, 'Manage Job Category', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(793, 'Create Job Category', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(794, 'Edit Job Category', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(795, 'Delete Job Category', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(796, 'Manage Job Stage', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(797, 'Create Job Stage', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(798, 'Edit Job Stage', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(799, 'Delete Job Stage', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(800, 'Manage Job', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(801, 'Create Job', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(802, 'Edit Job', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(803, 'Delete Job', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(804, 'Show Job', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(805, 'Manage Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(806, 'Create Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(807, 'Edit Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(808, 'Delete Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(809, 'Show Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(810, 'Move Job Application', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(811, 'Add Job Application Note', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(812, 'Delete Job Application Note', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(813, 'Add Job Application Skill', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(814, 'Manage Job OnBoard', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(815, 'Manage Custom Question', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(816, 'Create Custom Question', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(817, 'Edit Custom Question', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(818, 'Delete Custom Question', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(819, 'Manage Interview Schedule', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(820, 'Create Interview Schedule', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(821, 'Edit Interview Schedule', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(822, 'Delete Interview Schedule', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(823, 'Manage Career', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(824, 'Manage Competencies', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(825, 'Create Competencies', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(826, 'Edit Competencies', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(827, 'Delete Competencies', 'web', '2023-11-25 09:46:51', '2023-11-25 09:46:51', NULL),
(828, 'Manage User', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(829, 'Create User', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(830, 'Edit User', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(831, 'Delete User', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(832, 'Manage Role', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(833, 'Create Role', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(834, 'Delete Role', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(835, 'Edit Role', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(836, 'Manage Award', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(837, 'Create Award', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(838, 'Delete Award', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(839, 'Edit Award', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(840, 'Manage Transfer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(841, 'Create Transfer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(842, 'Delete Transfer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(843, 'Edit Transfer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(844, 'Manage Resignation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(845, 'Create Resignation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(846, 'Edit Resignation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(847, 'Delete Resignation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(848, 'Manage Travel', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(849, 'Create Travel', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(850, 'Edit Travel', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(851, 'Delete Travel', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(852, 'Manage Promotion', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(853, 'Create Promotion', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(854, 'Edit Promotion', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(855, 'Delete Promotion', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL);
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `category`) VALUES
(856, 'Manage Complaint', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(857, 'Create Complaint', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(858, 'Edit Complaint', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(859, 'Delete Complaint', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(860, 'Manage Warning', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(861, 'Create Warning', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(862, 'Edit Warning', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(863, 'Delete Warning', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(864, 'Manage Termination', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(865, 'Create Termination', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(866, 'Edit Termination', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(867, 'Delete Termination', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(868, 'Manage Department', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(869, 'Create Department', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(870, 'Edit Department', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(871, 'Delete Department', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(872, 'Manage Designation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(873, 'Create Designation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(874, 'Edit Designation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(875, 'Delete Designation', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(876, 'Manage Document Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(877, 'Create Document Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(878, 'Edit Document Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(879, 'Delete Document Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(880, 'Manage Branch', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(881, 'Create Branch', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(882, 'Edit Branch', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(883, 'Delete Branch', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(884, 'Manage Award Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(885, 'Create Award Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(886, 'Edit Award Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(887, 'Delete Award Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(888, 'Manage Termination Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(889, 'Create Termination Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(890, 'Edit Termination Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(891, 'Delete Termination Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(892, 'Manage Employee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(893, 'Create Employee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(894, 'Edit Employee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(895, 'Delete Employee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(896, 'Show Employee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(897, 'Manage Payslip Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(898, 'Create Payslip Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(899, 'Edit Payslip Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(900, 'Delete Payslip Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(901, 'Manage Allowance Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(902, 'Create Allowance Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(903, 'Edit Allowance Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(904, 'Delete Allowance Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(905, 'Manage Loan Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(906, 'Create Loan Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(907, 'Edit Loan Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(908, 'Delete Loan Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(909, 'Manage Deduction Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(910, 'Create Deduction Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(911, 'Edit Deduction Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(912, 'Delete Deduction Option', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(913, 'Manage Set Salary', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(914, 'Create Set Salary', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(915, 'Edit Set Salary', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(916, 'Delete Set Salary', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(917, 'Manage Allowance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(918, 'Create Allowance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(919, 'Edit Allowance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(920, 'Delete Allowance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(921, 'Create Commission', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(922, 'Create Loan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(923, 'Create Saturation Deduction', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(924, 'Create Other Payment', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(925, 'Create Overtime', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(926, 'Edit Commission', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(927, 'Delete Commission', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(928, 'Edit Loan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(929, 'Delete Loan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(930, 'Edit Saturation Deduction', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(931, 'Delete Saturation Deduction', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(932, 'Edit Other Payment', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(933, 'Delete Other Payment', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(934, 'Edit Overtime', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(935, 'Delete Overtime', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(936, 'Manage Pay Slip', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(937, 'Create Pay Slip', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(938, 'Edit Pay Slip', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(939, 'Delete Pay Slip', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(940, 'Manage Account List', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(941, 'Create Account List', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(942, 'Edit Account List', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(943, 'Delete Account List', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(944, 'View Balance Account List', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(945, 'Manage Payee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(946, 'Create Payee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(947, 'Edit Payee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(948, 'Delete Payee', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(949, 'Manage Payer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(950, 'Create Payer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(951, 'Edit Payer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(952, 'Delete Payer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(953, 'Manage Expense Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(954, 'Create Expense Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(955, 'Edit Expense Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(956, 'Delete Expense Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(957, 'Manage Income Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(958, 'Edit Income Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(959, 'Delete Income Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(960, 'Create Income Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(961, 'Manage Payment Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(962, 'Create Payment Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(963, 'Edit Payment Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(964, 'Delete Payment Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(965, 'Manage Deposit', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(966, 'Create Deposit', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(967, 'Edit Deposit', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(968, 'Delete Deposit', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(969, 'Manage Expense', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(970, 'Create Expense', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(971, 'Edit Expense', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(972, 'Delete Expense', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(973, 'Manage Transfer Balance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(974, 'Create Transfer Balance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(975, 'Edit Transfer Balance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(976, 'Delete Transfer Balance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(977, 'Manage Event', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(978, 'Create Event', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(979, 'Edit Event', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(980, 'Delete Event', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(981, 'Manage Announcement', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(982, 'Create Announcement', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(983, 'Edit Announcement', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(984, 'Delete Announcement', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(985, 'Manage Leave Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(986, 'Create Leave Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(987, 'Edit Leave Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(988, 'Delete Leave Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(989, 'Manage Leave', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(990, 'Create Leave', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(991, 'Edit Leave', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(992, 'Delete Leave', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(993, 'Manage Meeting', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(994, 'Create Meeting', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(995, 'Edit Meeting', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(996, 'Delete Meeting', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(997, 'Manage Ticket', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(998, 'Create Ticket', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(999, 'Edit Ticket', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1000, 'Delete Ticket', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1001, 'Manage Attendance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1002, 'Create Attendance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1003, 'Edit Attendance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1004, 'Delete Attendance', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1005, 'Manage Language', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1006, 'Create Language', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1007, 'Manage Plan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1008, 'Create Plan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1009, 'Edit Plan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1010, 'Buy Plan', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1011, 'Manage System Settings', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1012, 'Manage Company Settings', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1013, 'Manage TimeSheet', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1014, 'Create TimeSheet', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1015, 'Edit TimeSheet', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1016, 'Delete TimeSheet', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1017, 'Manage Order', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1018, 'manage coupon', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1019, 'create coupon', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1020, 'edit coupon', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1021, 'delete coupon', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1022, 'Manage Assets', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1023, 'Create Assets', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1024, 'Edit Assets', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1025, 'Delete Assets', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1026, 'Manage Document', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1027, 'Create Document', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1028, 'Edit Document', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1029, 'Delete Document', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1030, 'Manage Employee Profile', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1031, 'Show Employee Profile', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1032, 'Manage Employee Last Login', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1033, 'Manage Indicator', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1034, 'Create Indicator', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1035, 'Edit Indicator', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1036, 'Delete Indicator', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1037, 'Show Indicator', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1038, 'Manage Appraisal', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1039, 'Create Appraisal', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1040, 'Edit Appraisal', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1041, 'Delete Appraisal', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1042, 'Show Appraisal', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1043, 'Manage Goal Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1044, 'Create Goal Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1045, 'Edit Goal Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1046, 'Delete Goal Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1047, 'Manage Goal Tracking', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1048, 'Create Goal Tracking', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1049, 'Edit Goal Tracking', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1050, 'Delete Goal Tracking', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1051, 'Manage Company Policy', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1052, 'Create Company Policy', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1053, 'Edit Company Policy', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1054, 'Delete Company Policy', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1055, 'Manage Trainer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1056, 'Create Trainer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1057, 'Edit Trainer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1058, 'Delete Trainer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1059, 'Show Trainer', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1060, 'Manage Training', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1061, 'Create Training', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1062, 'Edit Training', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1063, 'Delete Training', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1064, 'Show Training', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1065, 'Manage Training Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1066, 'Create Training Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1067, 'Edit Training Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1068, 'Delete Training Type', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1069, 'Manage Report', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1070, 'Manage Holiday', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1071, 'Create Holiday', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1072, 'Edit Holiday', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1073, 'Delete Holiday', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1074, 'Manage Job Category', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1075, 'Create Job Category', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1076, 'Edit Job Category', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1077, 'Delete Job Category', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1078, 'Manage Job Stage', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1079, 'Create Job Stage', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1080, 'Edit Job Stage', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1081, 'Delete Job Stage', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1082, 'Manage Job', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1083, 'Create Job', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1084, 'Edit Job', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1085, 'Delete Job', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1086, 'Show Job', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1087, 'Manage Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1088, 'Create Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1089, 'Edit Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1090, 'Delete Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1091, 'Show Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1092, 'Move Job Application', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1093, 'Add Job Application Note', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1094, 'Delete Job Application Note', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1095, 'Add Job Application Skill', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1096, 'Manage Job OnBoard', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1097, 'Manage Custom Question', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1098, 'Create Custom Question', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1099, 'Edit Custom Question', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1100, 'Delete Custom Question', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1101, 'Manage Interview Schedule', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1102, 'Create Interview Schedule', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1103, 'Edit Interview Schedule', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1104, 'Delete Interview Schedule', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1105, 'Manage Career', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1106, 'Manage Competencies', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1107, 'Create Competencies', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1108, 'Edit Competencies', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1109, 'Delete Competencies', 'web', '2023-11-25 09:47:17', '2023-11-25 09:47:17', NULL),
(1110, 'Manage User', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1111, 'Create User', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1112, 'Edit User', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1113, 'Delete User', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1114, 'Manage Role', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1115, 'Create Role', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1116, 'Delete Role', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1117, 'Edit Role', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1118, 'Manage Award', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1119, 'Create Award', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1120, 'Delete Award', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1121, 'Edit Award', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1122, 'Manage Transfer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1123, 'Create Transfer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1124, 'Delete Transfer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1125, 'Edit Transfer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1126, 'Manage Resignation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1127, 'Create Resignation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1128, 'Edit Resignation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1129, 'Delete Resignation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1130, 'Manage Travel', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1131, 'Create Travel', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1132, 'Edit Travel', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1133, 'Delete Travel', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1134, 'Manage Promotion', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1135, 'Create Promotion', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1136, 'Edit Promotion', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1137, 'Delete Promotion', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1138, 'Manage Complaint', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1139, 'Create Complaint', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1140, 'Edit Complaint', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1141, 'Delete Complaint', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1142, 'Manage Warning', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1143, 'Create Warning', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1144, 'Edit Warning', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1145, 'Delete Warning', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1146, 'Manage Termination', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1147, 'Create Termination', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1148, 'Edit Termination', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1149, 'Delete Termination', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1150, 'Manage Department', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1151, 'Create Department', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1152, 'Edit Department', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1153, 'Delete Department', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1154, 'Manage Designation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1155, 'Create Designation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1156, 'Edit Designation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1157, 'Delete Designation', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1158, 'Manage Document Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1159, 'Create Document Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1160, 'Edit Document Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1161, 'Delete Document Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1162, 'Manage Branch', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1163, 'Create Branch', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1164, 'Edit Branch', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1165, 'Delete Branch', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1166, 'Manage Award Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1167, 'Create Award Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1168, 'Edit Award Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1169, 'Delete Award Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1170, 'Manage Termination Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1171, 'Create Termination Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1172, 'Edit Termination Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1173, 'Delete Termination Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1174, 'Manage Employee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1175, 'Create Employee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1176, 'Edit Employee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1177, 'Delete Employee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1178, 'Show Employee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1179, 'Manage Payslip Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1180, 'Create Payslip Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1181, 'Edit Payslip Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1182, 'Delete Payslip Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1183, 'Manage Allowance Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1184, 'Create Allowance Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1185, 'Edit Allowance Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1186, 'Delete Allowance Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1187, 'Manage Loan Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1188, 'Create Loan Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1189, 'Edit Loan Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1190, 'Delete Loan Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1191, 'Manage Deduction Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1192, 'Create Deduction Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1193, 'Edit Deduction Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1194, 'Delete Deduction Option', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1195, 'Manage Set Salary', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1196, 'Create Set Salary', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1197, 'Edit Set Salary', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1198, 'Delete Set Salary', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1199, 'Manage Allowance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1200, 'Create Allowance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1201, 'Edit Allowance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1202, 'Delete Allowance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1203, 'Create Commission', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1204, 'Create Loan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1205, 'Create Saturation Deduction', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1206, 'Create Other Payment', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1207, 'Create Overtime', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1208, 'Edit Commission', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1209, 'Delete Commission', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1210, 'Edit Loan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1211, 'Delete Loan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1212, 'Edit Saturation Deduction', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1213, 'Delete Saturation Deduction', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1214, 'Edit Other Payment', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1215, 'Delete Other Payment', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1216, 'Edit Overtime', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1217, 'Delete Overtime', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1218, 'Manage Pay Slip', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1219, 'Create Pay Slip', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1220, 'Edit Pay Slip', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1221, 'Delete Pay Slip', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1222, 'Manage Account List', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1223, 'Create Account List', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1224, 'Edit Account List', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1225, 'Delete Account List', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1226, 'View Balance Account List', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1227, 'Manage Payee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1228, 'Create Payee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1229, 'Edit Payee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1230, 'Delete Payee', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1231, 'Manage Payer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1232, 'Create Payer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1233, 'Edit Payer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1234, 'Delete Payer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1235, 'Manage Expense Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1236, 'Create Expense Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1237, 'Edit Expense Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1238, 'Delete Expense Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1239, 'Manage Income Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1240, 'Edit Income Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1241, 'Delete Income Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1242, 'Create Income Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1243, 'Manage Payment Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1244, 'Create Payment Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1245, 'Edit Payment Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1246, 'Delete Payment Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1247, 'Manage Deposit', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1248, 'Create Deposit', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1249, 'Edit Deposit', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1250, 'Delete Deposit', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1251, 'Manage Expense', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1252, 'Create Expense', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1253, 'Edit Expense', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1254, 'Delete Expense', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1255, 'Manage Transfer Balance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1256, 'Create Transfer Balance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1257, 'Edit Transfer Balance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1258, 'Delete Transfer Balance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1259, 'Manage Event', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1260, 'Create Event', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1261, 'Edit Event', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1262, 'Delete Event', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1263, 'Manage Announcement', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1264, 'Create Announcement', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1265, 'Edit Announcement', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1266, 'Delete Announcement', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1267, 'Manage Leave Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1268, 'Create Leave Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1269, 'Edit Leave Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1270, 'Delete Leave Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1271, 'Manage Leave', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1272, 'Create Leave', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1273, 'Edit Leave', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1274, 'Delete Leave', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1275, 'Manage Meeting', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1276, 'Create Meeting', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1277, 'Edit Meeting', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1278, 'Delete Meeting', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1279, 'Manage Ticket', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1280, 'Create Ticket', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1281, 'Edit Ticket', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1282, 'Delete Ticket', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1283, 'Manage Attendance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1284, 'Create Attendance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1285, 'Edit Attendance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1286, 'Delete Attendance', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1287, 'Manage Language', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1288, 'Create Language', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1289, 'Manage Plan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1290, 'Create Plan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1291, 'Edit Plan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1292, 'Buy Plan', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1293, 'Manage System Settings', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1294, 'Manage Company Settings', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1295, 'Manage TimeSheet', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1296, 'Create TimeSheet', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1297, 'Edit TimeSheet', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1298, 'Delete TimeSheet', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1299, 'Manage Order', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1300, 'manage coupon', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1301, 'create coupon', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1302, 'edit coupon', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1303, 'delete coupon', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1304, 'Manage Assets', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1305, 'Create Assets', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1306, 'Edit Assets', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1307, 'Delete Assets', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1308, 'Manage Document', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1309, 'Create Document', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1310, 'Edit Document', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1311, 'Delete Document', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1312, 'Manage Employee Profile', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1313, 'Show Employee Profile', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1314, 'Manage Employee Last Login', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1315, 'Manage Indicator', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1316, 'Create Indicator', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1317, 'Edit Indicator', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1318, 'Delete Indicator', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1319, 'Show Indicator', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1320, 'Manage Appraisal', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1321, 'Create Appraisal', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1322, 'Edit Appraisal', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1323, 'Delete Appraisal', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1324, 'Show Appraisal', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1325, 'Manage Goal Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1326, 'Create Goal Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1327, 'Edit Goal Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1328, 'Delete Goal Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1329, 'Manage Goal Tracking', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1330, 'Create Goal Tracking', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1331, 'Edit Goal Tracking', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1332, 'Delete Goal Tracking', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1333, 'Manage Company Policy', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1334, 'Create Company Policy', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1335, 'Edit Company Policy', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1336, 'Delete Company Policy', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1337, 'Manage Trainer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1338, 'Create Trainer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1339, 'Edit Trainer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1340, 'Delete Trainer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1341, 'Show Trainer', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1342, 'Manage Training', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1343, 'Create Training', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1344, 'Edit Training', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1345, 'Delete Training', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1346, 'Show Training', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1347, 'Manage Training Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1348, 'Create Training Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1349, 'Edit Training Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1350, 'Delete Training Type', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1351, 'Manage Report', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1352, 'Manage Holiday', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1353, 'Create Holiday', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1354, 'Edit Holiday', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1355, 'Delete Holiday', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1356, 'Manage Job Category', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1357, 'Create Job Category', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1358, 'Edit Job Category', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1359, 'Delete Job Category', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1360, 'Manage Job Stage', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1361, 'Create Job Stage', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1362, 'Edit Job Stage', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1363, 'Delete Job Stage', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1364, 'Manage Job', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1365, 'Create Job', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1366, 'Edit Job', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1367, 'Delete Job', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1368, 'Show Job', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1369, 'Manage Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1370, 'Create Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1371, 'Edit Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1372, 'Delete Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1373, 'Show Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1374, 'Move Job Application', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1375, 'Add Job Application Note', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1376, 'Delete Job Application Note', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1377, 'Add Job Application Skill', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1378, 'Manage Job OnBoard', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1379, 'Manage Custom Question', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1380, 'Create Custom Question', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1381, 'Edit Custom Question', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1382, 'Delete Custom Question', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1383, 'Manage Interview Schedule', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1384, 'Create Interview Schedule', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1385, 'Edit Interview Schedule', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1386, 'Delete Interview Schedule', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1387, 'Manage Career', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1388, 'Manage Competencies', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1389, 'Create Competencies', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1390, 'Edit Competencies', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL),
(1391, 'Delete Competencies', 'web', '2023-11-25 09:48:15', '2023-11-25 09:48:15', NULL);

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

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(100) NOT NULL,
  `max_users` int(11) NOT NULL DEFAULT 0,
  `max_employees` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'super admin', 'web', 0, '2022-02-05 22:59:38', '2022-02-05 22:59:38'),
(2, 'company', 'web', 1, '2022-02-05 22:59:38', '2022-02-05 22:59:38'),
(3, 'hr', 'web', 2, '2022-02-05 22:59:40', '2022-02-05 22:59:40'),
(4, 'employee', 'web', 2, '2022-02-05 22:59:41', '2022-02-05 22:59:41'),
(5, 'مدير عام', 'web', 18, '2022-07-25 11:40:44', '2022-07-25 11:40:44'),
(6, 'hr', 'web', 154, '2022-11-11 20:45:53', '2022-11-11 21:04:31'),
(7, 'المدير المالي', 'web', 68, '2022-11-12 08:08:26', '2022-11-12 08:08:26'),
(8, 'محاسب عام', 'web', 68, '2022-11-12 08:09:27', '2022-11-12 08:09:27'),
(9, 'HR', 'web', 19, '2022-11-13 14:23:20', '2022-11-13 14:33:03'),
(10, 'admin', 'web', 22, '2023-04-13 11:38:26', '2023-04-13 11:38:26'),
(11, 'admin', 'web', 0, '2023-05-10 11:15:26', '2023-05-10 11:15:26'),
(12, 'مدير', 'web', 623, '2023-12-18 09:18:41', '2023-12-18 09:18:41'),
(13, 'HR2', 'web', 2, '2024-11-20 02:02:03', '2024-11-20 02:02:03'),
(14, 'حازم فاروق محمد', 'web', 2, '2024-11-20 14:46:37', '2024-11-20 14:46:37'),
(15, 'شش', 'web', 2, '2025-01-05 12:02:17', '2025-01-05 12:02:17'),
(19, 'asdds', 'web', 2, '2025-01-05 12:16:32', '2025-01-05 12:16:32'),
(20, 'dsa', 'web', 2, '2025-01-05 12:19:14', '2025-01-05 12:19:14'),
(21, 'sda', 'web', 2, '2025-01-05 12:19:53', '2025-01-05 12:19:53'),
(22, 'aaaaaaaaa', 'web', 2, '2025-01-05 12:21:54', '2025-01-05 12:21:54'),
(24, 'asdsd', 'web', 2, '2025-01-05 12:23:03', '2025-01-05 12:23:03'),
(26, 'adsad', 'web', 2, '2025-01-05 12:23:50', '2025-01-05 12:23:50'),
(27, 'faasd', 'web', 2, '2025-01-05 12:28:36', '2025-01-05 12:28:36'),
(28, 'aa', 'web', 2, '2025-01-05 12:31:56', '2025-01-05 12:31:56'),
(29, 'zzz', 'web', 2, '2025-01-05 12:32:46', '2025-01-05 12:32:46'),
(30, 'عمر الروبي', 'web', 2, '2025-01-05 12:36:28', '2025-01-05 12:36:28');

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
(283, 10),
(283, 11),
(284, 10),
(284, 11),
(285, 10),
(285, 11),
(286, 10),
(286, 11),
(287, 10),
(287, 11),
(288, 10),
(288, 11),
(289, 10),
(289, 11),
(290, 10),
(290, 11),
(291, 10),
(291, 11),
(292, 10),
(292, 11),
(293, 10),
(293, 11),
(294, 10),
(294, 11),
(295, 10),
(295, 11),
(296, 10),
(296, 11),
(297, 10),
(297, 11),
(298, 10),
(298, 11),
(299, 10),
(299, 11),
(300, 10),
(300, 11),
(301, 10),
(301, 11),
(302, 10),
(302, 11),
(303, 10),
(303, 11),
(304, 10),
(304, 11),
(305, 10),
(305, 11),
(306, 10),
(306, 11),
(307, 10),
(307, 11),
(308, 10),
(308, 11),
(309, 10),
(309, 11),
(310, 10),
(310, 11),
(311, 10),
(311, 11),
(312, 10),
(312, 11),
(313, 10),
(313, 11),
(314, 10),
(314, 11),
(315, 10),
(315, 11),
(316, 10),
(316, 11),
(317, 10),
(317, 11),
(318, 10),
(318, 11),
(319, 10),
(319, 11),
(320, 10),
(320, 11),
(321, 10),
(321, 11),
(322, 10),
(322, 11),
(323, 10),
(323, 11),
(324, 10),
(324, 11),
(325, 10),
(325, 11),
(326, 10),
(326, 11),
(327, 10),
(327, 11),
(328, 10),
(328, 11),
(329, 10),
(329, 11),
(330, 10),
(330, 11),
(331, 10),
(331, 11),
(332, 10),
(332, 11),
(333, 10),
(333, 11),
(334, 10),
(334, 11),
(335, 10),
(335, 11),
(336, 10),
(336, 11),
(337, 10),
(337, 11),
(338, 10),
(338, 11),
(339, 10),
(339, 11),
(340, 10),
(340, 11),
(341, 10),
(341, 11),
(342, 10),
(342, 11),
(343, 10),
(343, 11),
(344, 10),
(344, 11),
(345, 10),
(345, 11),
(346, 10),
(346, 11),
(347, 10),
(347, 11),
(348, 10),
(348, 11),
(349, 10),
(349, 11),
(350, 10),
(350, 11),
(351, 10),
(351, 11),
(352, 10),
(352, 11),
(353, 10),
(353, 11),
(354, 10),
(354, 11),
(355, 10),
(355, 11),
(356, 10),
(356, 11),
(357, 10),
(357, 11),
(358, 10),
(358, 11),
(359, 10),
(359, 11),
(360, 10),
(360, 11),
(361, 10),
(361, 11),
(362, 10),
(362, 11),
(363, 10),
(363, 11),
(364, 10),
(364, 11),
(365, 10),
(365, 11),
(366, 10),
(366, 11),
(367, 10),
(367, 11),
(368, 10),
(368, 11),
(369, 10),
(369, 11),
(370, 10),
(370, 11),
(371, 10),
(371, 11),
(372, 10),
(372, 11),
(373, 10),
(373, 11),
(374, 10),
(374, 11),
(375, 10),
(375, 11),
(376, 10),
(376, 11),
(377, 10),
(377, 11),
(378, 10),
(378, 11),
(379, 10),
(379, 11),
(380, 10),
(380, 11),
(381, 10),
(381, 11),
(382, 10),
(382, 11),
(383, 10),
(383, 11),
(384, 10),
(384, 11),
(385, 10),
(385, 11),
(386, 10),
(386, 11),
(387, 10),
(387, 11),
(388, 10),
(388, 11),
(389, 10),
(389, 11),
(390, 10),
(390, 11),
(391, 10),
(391, 11),
(392, 10),
(392, 11),
(393, 10),
(393, 11),
(394, 10),
(394, 11),
(395, 10),
(395, 11),
(396, 10),
(396, 11),
(397, 10),
(397, 11),
(398, 10),
(398, 11),
(399, 10),
(399, 11),
(400, 10),
(400, 11),
(401, 10),
(401, 11),
(402, 10),
(402, 11),
(403, 10),
(403, 11),
(404, 10),
(404, 11),
(405, 10),
(405, 11),
(406, 10),
(406, 11),
(407, 10),
(407, 11),
(408, 10),
(408, 11),
(409, 10),
(409, 11),
(410, 10),
(410, 11),
(411, 10),
(411, 11),
(412, 10),
(412, 11),
(413, 10),
(413, 11),
(414, 10),
(414, 11),
(415, 10),
(415, 11),
(416, 10),
(416, 11),
(417, 10),
(417, 11),
(418, 10),
(418, 11),
(419, 10),
(419, 11),
(420, 10),
(420, 11),
(421, 10),
(421, 11),
(422, 10),
(422, 11),
(423, 10),
(423, 11),
(424, 10),
(424, 11),
(425, 10),
(425, 11),
(426, 10),
(426, 11),
(427, 10),
(427, 11),
(428, 10),
(428, 11),
(429, 10),
(429, 11),
(430, 10),
(430, 11),
(431, 10),
(431, 11),
(432, 10),
(432, 11),
(433, 10),
(433, 11),
(434, 10),
(434, 11),
(435, 10),
(435, 11),
(436, 10),
(436, 11),
(437, 10),
(437, 11),
(438, 10),
(438, 11),
(439, 10),
(439, 11),
(440, 10),
(440, 11),
(441, 10),
(441, 11),
(442, 10),
(442, 11),
(443, 10),
(443, 11),
(444, 10),
(444, 11),
(445, 10),
(445, 11),
(446, 10),
(446, 11),
(447, 10),
(447, 11),
(448, 10),
(448, 11),
(449, 10),
(449, 11),
(450, 10),
(450, 11),
(451, 10),
(451, 11),
(452, 10),
(452, 11),
(453, 10),
(453, 11),
(454, 10),
(454, 11),
(455, 10),
(455, 11),
(456, 10),
(456, 11),
(457, 10),
(457, 11),
(458, 10),
(458, 11),
(459, 10),
(459, 11),
(460, 10),
(460, 11),
(461, 10),
(461, 11),
(462, 10),
(462, 11),
(463, 10),
(463, 11),
(464, 10),
(464, 11),
(465, 10),
(465, 11),
(466, 10),
(466, 11),
(467, 10),
(467, 11),
(468, 10),
(468, 11),
(469, 10),
(469, 11),
(470, 10),
(470, 11),
(471, 10),
(471, 11),
(472, 10),
(472, 11),
(473, 10),
(473, 11),
(474, 10),
(474, 11),
(475, 10),
(475, 11),
(476, 10),
(476, 11),
(477, 10),
(477, 11),
(478, 10),
(478, 11),
(479, 10),
(479, 11),
(480, 10),
(480, 11),
(481, 10),
(481, 11),
(482, 10),
(482, 11),
(483, 10),
(483, 11),
(484, 10),
(484, 11),
(485, 10),
(485, 11),
(486, 10),
(486, 11),
(487, 10),
(487, 11),
(488, 10),
(488, 11),
(489, 10),
(489, 11),
(490, 10),
(490, 11),
(491, 10),
(491, 11),
(492, 10),
(492, 11),
(493, 10),
(493, 11),
(494, 10),
(494, 11),
(495, 10),
(495, 11),
(496, 10),
(496, 11),
(497, 10),
(497, 11),
(498, 10),
(498, 11),
(499, 10),
(499, 11),
(500, 10),
(500, 11),
(501, 10),
(501, 11),
(502, 10),
(502, 11),
(503, 10),
(503, 11),
(504, 10),
(504, 11),
(505, 10),
(505, 11),
(506, 10),
(506, 11),
(507, 10),
(507, 11),
(508, 10),
(508, 11),
(509, 10),
(509, 11),
(510, 10),
(510, 11),
(511, 10),
(511, 11),
(512, 10),
(512, 11),
(513, 10),
(513, 11),
(514, 10),
(514, 11),
(515, 10),
(515, 11),
(516, 10),
(516, 11),
(517, 10),
(517, 11),
(518, 10),
(518, 11),
(519, 10),
(519, 11),
(520, 10),
(520, 11),
(521, 10),
(521, 11),
(522, 10),
(522, 11),
(523, 10),
(523, 11),
(524, 10),
(524, 11),
(525, 10),
(525, 11),
(526, 10),
(526, 11),
(527, 10),
(527, 11),
(528, 10),
(528, 11),
(529, 10),
(529, 11),
(530, 10),
(530, 11),
(531, 10),
(531, 11),
(532, 10),
(532, 11),
(533, 10),
(533, 11),
(534, 10),
(534, 11),
(535, 10),
(535, 11),
(536, 10),
(536, 11),
(537, 10),
(537, 11),
(538, 10),
(538, 11),
(539, 10),
(539, 11),
(540, 10),
(540, 11),
(541, 10),
(541, 11),
(542, 10),
(542, 11),
(543, 2),
(543, 3),
(543, 10),
(543, 12),
(544, 2),
(544, 3),
(544, 10),
(544, 12),
(545, 1),
(545, 2),
(545, 3),
(545, 12),
(545, 14),
(545, 15),
(545, 27),
(545, 28),
(547, 1),
(547, 2),
(547, 3),
(547, 12),
(547, 14),
(547, 27),
(547, 28),
(547, 29),
(548, 1),
(548, 2),
(548, 3),
(548, 12),
(548, 14),
(549, 1),
(549, 2),
(549, 3),
(549, 12),
(549, 30),
(550, 1),
(550, 2),
(550, 12),
(550, 14),
(551, 1),
(551, 2),
(551, 3),
(551, 12),
(551, 14),
(551, 29),
(552, 1),
(552, 2),
(552, 3),
(552, 12),
(553, 1),
(553, 2),
(553, 3),
(553, 12),
(554, 2),
(554, 3),
(554, 12),
(554, 14),
(555, 2),
(555, 3),
(555, 12),
(555, 14),
(555, 29),
(556, 2),
(556, 3),
(556, 12),
(557, 2),
(557, 3),
(557, 12),
(558, 2),
(558, 12),
(558, 14),
(559, 2),
(559, 3),
(559, 12),
(559, 14),
(559, 29),
(560, 2),
(560, 3),
(560, 12),
(561, 2),
(561, 3),
(561, 12),
(562, 2),
(562, 12),
(563, 2),
(563, 12),
(564, 2),
(564, 3),
(564, 12),
(565, 2),
(565, 3),
(565, 12),
(566, 2),
(566, 3),
(566, 12),
(567, 2),
(567, 3),
(567, 12),
(568, 2),
(568, 3),
(568, 12),
(569, 2),
(569, 3),
(569, 12),
(570, 2),
(570, 3),
(570, 12),
(571, 2),
(571, 3),
(571, 12),
(572, 2),
(572, 3),
(572, 12),
(573, 2),
(573, 3),
(573, 12),
(574, 2),
(574, 3),
(574, 12),
(575, 2),
(575, 3),
(575, 12),
(576, 2),
(576, 3),
(576, 12),
(577, 2),
(577, 3),
(577, 12),
(578, 2),
(578, 3),
(578, 12),
(579, 2),
(579, 3),
(579, 12),
(580, 2),
(580, 3),
(580, 12),
(581, 2),
(581, 3),
(581, 12),
(582, 2),
(582, 3),
(582, 12),
(583, 2),
(583, 3),
(583, 12),
(584, 2),
(584, 3),
(584, 12),
(585, 2),
(585, 3),
(585, 12),
(586, 2),
(586, 3),
(586, 12),
(587, 2),
(587, 3),
(587, 12),
(588, 2),
(588, 3),
(588, 12),
(589, 2),
(589, 3),
(589, 12),
(590, 2),
(590, 3),
(590, 12),
(591, 2),
(591, 3),
(591, 12),
(592, 2),
(592, 3),
(592, 12),
(593, 2),
(593, 3),
(593, 12),
(594, 2),
(594, 3),
(594, 12),
(595, 2),
(595, 3),
(595, 12),
(596, 2),
(596, 3),
(596, 12),
(597, 2),
(597, 3),
(597, 12),
(598, 2),
(598, 3),
(598, 12),
(599, 2),
(599, 3),
(599, 12),
(600, 2),
(600, 3),
(600, 12),
(601, 2),
(601, 3),
(601, 12),
(602, 2),
(602, 3),
(602, 12),
(603, 2),
(603, 3),
(603, 12),
(604, 2),
(604, 3),
(604, 12),
(605, 2),
(605, 3),
(605, 12),
(606, 2),
(606, 3),
(606, 12),
(607, 2),
(607, 3),
(607, 12),
(608, 2),
(608, 3),
(608, 12),
(609, 2),
(609, 3),
(609, 12),
(612, 2),
(612, 3),
(612, 12),
(613, 2),
(613, 3),
(613, 12),
(614, 2),
(614, 3),
(614, 12),
(615, 2),
(615, 3),
(615, 12),
(616, 2),
(616, 3),
(616, 12),
(617, 2),
(617, 3),
(617, 12),
(618, 2),
(618, 3),
(618, 12),
(619, 2),
(619, 3),
(619, 12),
(620, 2),
(620, 3),
(620, 12),
(621, 2),
(621, 3),
(621, 12),
(622, 2),
(622, 3),
(622, 12),
(623, 2),
(623, 3),
(623, 12),
(624, 2),
(624, 3),
(624, 12),
(625, 2),
(625, 3),
(625, 12),
(626, 2),
(626, 3),
(626, 12),
(627, 2),
(627, 3),
(627, 12),
(628, 2),
(628, 3),
(628, 12),
(629, 2),
(629, 3),
(629, 12),
(630, 2),
(630, 3),
(630, 12),
(631, 2),
(631, 3),
(631, 12),
(632, 2),
(632, 3),
(632, 12),
(633, 2),
(633, 3),
(633, 12),
(634, 2),
(634, 3),
(634, 12),
(635, 2),
(635, 3),
(635, 12),
(636, 2),
(636, 3),
(636, 12),
(637, 2),
(637, 3),
(637, 12),
(638, 2),
(638, 3),
(638, 12),
(639, 2),
(639, 3),
(639, 12),
(640, 2),
(640, 3),
(640, 12),
(641, 2),
(641, 3),
(641, 12),
(642, 2),
(642, 3),
(642, 12),
(643, 2),
(643, 3),
(643, 12),
(644, 2),
(644, 3),
(644, 12),
(645, 2),
(645, 3),
(645, 12),
(646, 2),
(646, 3),
(646, 12),
(647, 2),
(647, 3),
(647, 12),
(648, 2),
(648, 3),
(648, 12),
(649, 2),
(649, 3),
(649, 12),
(650, 2),
(650, 3),
(650, 12),
(651, 2),
(651, 3),
(651, 12),
(652, 2),
(652, 3),
(652, 12),
(653, 2),
(653, 3),
(653, 12),
(654, 2),
(654, 3),
(654, 12),
(655, 2),
(655, 3),
(655, 12),
(656, 2),
(656, 3),
(656, 12),
(657, 2),
(657, 3),
(657, 12),
(658, 2),
(658, 3),
(658, 12),
(659, 2),
(659, 3),
(659, 12),
(660, 2),
(660, 3),
(660, 12),
(661, 2),
(661, 3),
(661, 12),
(662, 2),
(663, 2),
(663, 3),
(663, 12),
(664, 2),
(664, 3),
(664, 12),
(665, 2),
(665, 3),
(665, 12),
(666, 2),
(666, 3),
(666, 12),
(667, 2),
(667, 3),
(667, 12),
(668, 2),
(668, 3),
(668, 12),
(669, 2),
(669, 3),
(669, 12),
(670, 2),
(670, 3),
(670, 12),
(671, 2),
(671, 3),
(671, 12),
(672, 2),
(672, 3),
(672, 12),
(673, 2),
(673, 3),
(673, 12),
(674, 2),
(674, 3),
(674, 12),
(675, 2),
(675, 3),
(675, 12),
(676, 2),
(676, 3),
(676, 12),
(677, 2),
(677, 3),
(677, 12),
(678, 2),
(678, 3),
(678, 12),
(679, 2),
(679, 3),
(679, 12),
(680, 2),
(680, 12),
(681, 2),
(681, 12),
(682, 2),
(682, 12),
(683, 2),
(683, 12),
(684, 2),
(684, 12),
(685, 2),
(685, 12),
(686, 2),
(686, 12),
(687, 2),
(687, 12),
(688, 2),
(688, 12),
(689, 2),
(689, 12),
(690, 2),
(690, 12),
(691, 2),
(691, 12),
(692, 2),
(692, 12),
(693, 2),
(693, 12),
(694, 2),
(694, 12),
(695, 2),
(695, 12),
(696, 2),
(696, 12),
(697, 2),
(697, 12),
(698, 2),
(698, 12),
(699, 2),
(699, 12),
(700, 2),
(700, 12),
(701, 2),
(701, 12),
(702, 2),
(702, 12),
(703, 2),
(703, 12),
(704, 2),
(704, 12),
(705, 2),
(705, 12),
(706, 2),
(706, 12),
(707, 2),
(707, 12),
(708, 2),
(708, 12),
(709, 2),
(709, 12),
(710, 2),
(710, 12),
(711, 2),
(711, 12),
(712, 2),
(712, 12),
(713, 2),
(713, 12),
(714, 2),
(714, 12),
(715, 2),
(715, 12),
(716, 2),
(716, 12),
(717, 2),
(717, 12),
(718, 2),
(718, 12),
(719, 2),
(719, 12),
(720, 2),
(720, 12),
(721, 2),
(721, 12),
(722, 2),
(722, 12),
(723, 1),
(723, 2),
(724, 1),
(725, 1),
(725, 2),
(725, 12),
(726, 1),
(726, 12),
(727, 1),
(727, 12),
(728, 2),
(728, 12),
(729, 1),
(730, 2),
(731, 2),
(731, 12),
(732, 2),
(732, 12),
(733, 2),
(733, 12),
(734, 2),
(734, 12),
(735, 1),
(735, 2),
(736, 1),
(737, 1),
(738, 1),
(739, 1),
(740, 2),
(740, 12),
(741, 2),
(741, 12),
(742, 2),
(742, 12),
(743, 2),
(743, 12),
(744, 2),
(744, 12),
(745, 2),
(745, 12),
(746, 2),
(746, 12),
(747, 2),
(747, 12),
(748, 2),
(748, 12),
(749, 2),
(749, 12),
(750, 2),
(750, 12),
(751, 2),
(751, 12),
(752, 2),
(752, 12),
(753, 2),
(753, 12),
(754, 2),
(754, 12),
(755, 2),
(755, 12),
(756, 2),
(756, 12),
(757, 2),
(757, 12),
(758, 2),
(758, 12),
(759, 2),
(759, 12),
(760, 2),
(760, 12),
(761, 2),
(761, 12),
(762, 2),
(762, 12),
(763, 2),
(763, 12),
(764, 2),
(764, 12),
(765, 2),
(765, 12),
(766, 2),
(766, 12),
(767, 2),
(767, 12),
(768, 2),
(768, 12),
(769, 2),
(769, 12),
(770, 2),
(770, 12),
(771, 2),
(771, 12),
(772, 2),
(772, 12),
(773, 2),
(773, 12),
(774, 2),
(774, 12),
(775, 2),
(775, 12),
(776, 2),
(776, 12),
(777, 2),
(777, 12),
(778, 2),
(778, 12),
(779, 2),
(779, 12),
(780, 2),
(780, 12),
(781, 2),
(781, 12),
(782, 2),
(782, 12),
(783, 2),
(783, 12),
(784, 2),
(784, 12),
(785, 2),
(785, 12),
(786, 2),
(786, 12),
(787, 2),
(787, 12),
(787, 13),
(788, 2),
(788, 12),
(789, 2),
(789, 12),
(790, 2),
(790, 12),
(791, 2),
(791, 12),
(792, 2),
(792, 12),
(793, 2),
(793, 12),
(794, 2),
(794, 12),
(795, 2),
(795, 12),
(796, 2),
(796, 12),
(797, 2),
(797, 12),
(798, 2),
(798, 12),
(799, 2),
(799, 12),
(800, 2),
(800, 12),
(801, 2),
(801, 12),
(802, 2),
(802, 12),
(803, 2),
(803, 12),
(804, 2),
(804, 12),
(805, 2),
(805, 12),
(806, 2),
(806, 12),
(807, 2),
(807, 12),
(808, 2),
(808, 12),
(809, 2),
(809, 12),
(810, 2),
(810, 12),
(811, 2),
(811, 12),
(812, 2),
(812, 12),
(813, 2),
(814, 2),
(814, 12),
(815, 2),
(815, 12),
(815, 13),
(816, 2),
(816, 12),
(817, 2),
(817, 12),
(818, 2),
(818, 12),
(819, 2),
(820, 2),
(821, 2),
(822, 2),
(823, 2),
(823, 12),
(823, 13),
(824, 2),
(824, 12),
(825, 2),
(825, 12),
(826, 2),
(826, 12),
(827, 2),
(827, 12);

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
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Super Admin', NULL, 'superadmin@example.com', NULL, NULL, '$2y$10$ve4ttclBUTrtb2mfUb4vLuyoJv8X3EHUS1tfnJ.C4dCQUYtg/4NRS', 'super admin', NULL, '', 'ar', NULL, NULL, 0, NULL, NULL, NULL, NULL, '2024-11-20 03:16:26', 1, 1, NULL, '0', NULL, '2022-02-05 22:59:38', '2024-11-20 03:16:26', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(2, 'company', NULL, 'admin@idev.com', NULL, NULL, '$2y$10$ve4ttclBUTrtb2mfUb4vLuyoJv8X3EHUS1tfnJ.C4dCQUYtg/4NRS', 'company', NULL, '', 'en', 1, NULL, 0, NULL, NULL, NULL, NULL, '2025-01-09 22:14:39', 1, 1, NULL, '1', NULL, '2022-02-05 22:59:40', '2025-01-09 22:14:39', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(3, 'hr', NULL, 'hr@example.com', NULL, NULL, '$2y$10$ve4ttclBUTrtb2mfUb4vLuyoJv8X3EHUS1tfnJ.C4dCQUYtg/4NRS', 'hr', NULL, 'logo_1652021564.png', 'ar', 2, NULL, 2, NULL, NULL, NULL, NULL, '2024-11-20 03:21:21', 1, 1, NULL, '2', NULL, '2022-02-05 22:59:41', '2024-11-20 03:21:21', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(621, 'Ahmed Adel', NULL, 'ahmad.melouk@gmail.com', NULL, NULL, '$2y$10$gSw.UzGTf/GxLJvyxkSNqOPfVbyb7YjLx4ROA5SAGJiWT3KG.XYP2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '22', NULL, '2023-11-26 01:13:14', '2023-11-26 01:13:14', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(623, 'IDEV for IT Solution', NULL, 'admin@idev-it.com', NULL, NULL, '$2y$10$U4L5KgusHl5VQxqrKACzmeg7Spg8pqv3ZuXzi4TyCZaAB1fQt.4om', 'company', NULL, NULL, 'ar', 3, NULL, 0, NULL, NULL, NULL, NULL, '2023-12-18 09:15:37', 1, 1, NULL, '1', NULL, '2023-12-18 09:14:11', '2023-12-18 09:15:48', '#2180f3', 0, 0, NULL, NULL, NULL, 'aa@gmail.com'),
(632, 'sadsd', NULL, 'elrubyomar1a1e@gmail.com', NULL, NULL, '$2y$10$dBBt8gayLuMwhcSPeCie6uZfois4bZuXZAz4fqPulFCQVEnX3ayB2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-25 23:44:36', '2024-12-25 23:44:36', '#2180f3', 0, 0, NULL, NULL, NULL, 'asd@gmail.com'),
(633, 'fsadsd', NULL, 'elrubyomar3@gmail.com', NULL, NULL, '$2y$10$do96MFq8t7yAe42a3EzFZueewYqOOB3RQaPxgdaIsdUzeHl4Ppjw2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-25 23:58:37', '2024-12-25 23:58:37', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(634, 'fsadsd', NULL, 'elrubyomard3@gmail.com', NULL, NULL, '$2y$10$4EZceVh.18WhhNWx2poPP.FgSZ2U1b7a6O2fFcLnfo.lfo5jFdDUa', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-25 23:58:58', '2024-12-25 23:58:58', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(635, 'fsadsd', NULL, 'elrubyomards3@gmail.com', NULL, NULL, '$2y$10$xw7p6Uvg0fgene24/pfFUe4U8JVkkRLfwvwMyfC2.LnGieMXf0UgC', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-25 23:59:35', '2024-12-25 23:59:35', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(636, 'asdsd', NULL, 'elrubyomar333@gmail.com', NULL, NULL, '$2y$10$3T5pQrvJ009hPnFWvHhEAeXKnnlrGTspRy.3qHmHPsmPHykZL7A7e', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-26 00:01:39', '2024-12-26 00:01:39', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(637, 'omar elruby', NULL, 'elrubyomar434@gmail.com', NULL, NULL, '$2y$10$jqF6YAsNJB7byTnS7wDC9.SkUT/jWn6WVfgseaLCegcBLqI7WuFXS', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-26 02:03:06', '2024-12-26 02:03:06', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(638, 'omar elruby', NULL, 'elrubyomsdsar@gmail.com', NULL, NULL, '$2y$10$rtqLZ8Irm31qTzed83QmU.Ekg0X6zVrY4jKcw5joaygV58eb/O422', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-26 02:07:34', '2024-12-26 02:07:34', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(639, 'omar elruby', NULL, 'elrubyomasdsar@gmail.com', NULL, NULL, '$2y$10$HUpXGInxA5V10svsIBnd9.7NXQUCkX1ZV.vGFrvLCFrarJR0NTx2i', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-26 02:08:30', '2024-12-26 02:08:30', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(640, 'omar elruby', NULL, 'elrubyoasdmar@gmail.com', NULL, NULL, '$2y$10$8XPfQLrjD37pqUUM2MGICO0uHjql1WqL90sJdPpaPVdCOoooqidcC', 'HR2', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-26 02:15:10', '2025-01-02 20:21:12', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(642, 'عمر حسين', NULL, 'elrubyoms7777ar@gmail.com', NULL, NULL, '$2y$10$qgIhiPUh9nDkXMyJ4QAdgu1TT2zpOHTffRErfEUZazQfwtPgWkv8y', 'HR2', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-27 23:14:40', '2025-01-02 20:32:22', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(643, 'عمر حسين', NULL, 'elrub77@gmail.com', NULL, NULL, '$2y$10$7xyHUJdUplJKlfG4d2EhuuMScHmI6TVWBJkR.qj1FDz7BNgcTLE6G', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, '2', NULL, '2024-12-27 23:16:58', '2024-12-27 23:16:58', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(644, 'omar elruby', NULL, 'elrubyomasr@gmail.com', NULL, NULL, '$2y$10$soyJEBAOotV29BVbZuJcIurzWdtWMy3M2fQ35KfcH0LsPkMnwHxny', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-29 01:55:22', '2024-12-29 01:55:22', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(645, 'omar elruby', NULL, 'elrubyo22mar@gmail.com', NULL, NULL, '$2y$10$Ih16.LGylJpWPL7eqcvoauYhSqUFtWJFtK93PUQwSVJft8Z49lXr2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:00:16', '2024-12-29 02:00:16', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(646, 'omar elruby', NULL, 'elrubyoma33r@gmail.com', NULL, NULL, '$2y$10$z67.XI.ZphQRZHqpDnW8reyIW83Ss62kFKGAS2tOzLAV5RjoZfOHy', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-29 02:03:04', '2024-12-29 02:03:04', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(647, 'omar elruby', NULL, 'elrubyowwmar@gmail.com', NULL, NULL, '$2y$10$gXGDfKu2Ibm2KWJQ/x/COugFOaAqNCDGBN136pzXbvTWc2bgykS82', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-29 02:07:28', '2024-12-29 02:07:28', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(648, 'omar elruby', NULL, 'elrubyo222mar@gmail.com', NULL, NULL, '$2y$10$95aYuFgmWsGcc/yBWrBSMuxqlsohC6sNciclNTOLC.HBQgZpfTwj2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-29 02:09:59', '2024-12-29 02:09:59', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(649, 'omar elruby', NULL, 'elrubyoma22r@gmail.com', NULL, NULL, '$2y$10$BVliIwo5kPwQEpP7wvvWb.vYdl8OS5oZQpWCwuFB0pIf4zCPWMM7i', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:13:37', '2024-12-29 02:13:37', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(650, 'omar elruby', NULL, 'elrubyomassssr@gmail.com', NULL, NULL, '$2y$10$kbuDdYR8u7PyIts/FXsrSew31TIqSkpOe/qglh7ZE0MJEsbD4YP7i', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, '2', NULL, '2024-12-29 02:16:26', '2024-12-29 02:16:26', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(651, 'omar elruby', NULL, 'elrubysssomar@gmail.com', NULL, NULL, '$2y$10$kXTdWsY6FNBeYlzp9qmT3OLfDa/EdUEw.fJirVtzgHZZM0qpb5JSe', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:17:49', '2024-12-29 02:17:49', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(652, 'omar elruby', NULL, 'elrubyomsdsdar@gmail.com', NULL, NULL, '$2y$10$bBj0GydVZYklEM5bFyJQz..8HgoiNDHxpBqtjCT0pDNt2QDXq0Sfm', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:19:21', '2024-12-29 02:19:21', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(653, 'omar elruby', NULL, 'elrubyomsdsdsar@gmail.com', NULL, NULL, '$2y$10$Vi0.pXMtm08IDqzLN9TKrODzIjTF0.83zFYu5WE4PSGTOe7/E8ipi', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:19:54', '2024-12-29 02:19:54', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(654, 'omar elruby', NULL, 'elrubyomaaaar@gmail.com', NULL, NULL, '$2y$10$AUo2WASnzx6wGDyknlYVS.TR0Bh3MTBWdmE.TlV4d3HCbz48EWJo2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:20:19', '2024-12-29 02:20:19', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(655, 'omar elruby', NULL, 'elrubyoma456565r@gmail.com', NULL, NULL, '$2y$10$SFTF4m1VYhEM68ASh04RvOkyNFtQ4DGz5T33JDaKYzZGqethqFyGW', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:21:50', '2024-12-29 02:21:50', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(656, 'omar elruby', NULL, 'elrubyoma4a56565r@gmail.com', NULL, NULL, '$2y$10$ewTCLYAtZiF6/G7NxW0o5ePeq3V04t9XJ6Ep.ROuCUp1mwZ0MDbj2', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:22:06', '2024-12-29 02:22:06', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(657, 'omar elruby', NULL, 'elrubayoma4a56565r@gmail.com', NULL, NULL, '$2y$10$uLVgNQuvY88lSjACfl0AD.BbD6XIVvddZBjcQM1WYLLWj393M4Lia', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:23:19', '2024-12-29 02:23:19', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(658, 'omar elruby', NULL, 'elrubyomasdsdar@gmail.com', NULL, NULL, '$2y$10$hDnZpTdKrVjpMTGSiXGahO3Td.k5awDBeS2DuDVyc0xqPNj8CfnJO', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:24:45', '2024-12-29 02:24:45', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(659, 'omar elruby', NULL, 'elrubyoasasamar@gmail.com', NULL, NULL, '$2y$10$uZyNU3QhUl2DMV.oWeV0eeZ/TABN3hDrXl5JBCHOJyDXyo51h8flu', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:26:38', '2024-12-29 02:26:38', '#2180f3', 0, 0, NULL, NULL, NULL, NULL),
(660, 'Dana sdsd', NULL, 'danabnaj6em@yahoo.com', NULL, NULL, '$2y$10$AwSPZwS0UxtHm/TGRxBBlulxQJxydt01aa.qfG8DvcGmCmswxi6K6', 'employee', NULL, NULL, 'en', NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, '2', NULL, '2024-12-29 02:30:17', '2024-12-29 02:30:17', '#2180f3', 0, 0, NULL, NULL, NULL, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allowance_options`
--
ALTER TABLE `allowance_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assets_types`
--
ALTER TABLE `assets_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_employees`
--
ALTER TABLE `attendance_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance_movements`
--
ALTER TABLE `attendance_movements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `award_types`
--
ALTER TABLE `award_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commissions`
--
ALTER TABLE `commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_structures`
--
ALTER TABLE `company_structures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_structure_employees`
--
ALTER TABLE `company_structure_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `competencies`
--
ALTER TABLE `competencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contract_templates`
--
ALTER TABLE `contract_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_questions`
--
ALTER TABLE `custom_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deduction_options`
--
ALTER TABLE `deduction_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `document_types`
--
ALTER TABLE `document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_shifts`
--
ALTER TABLE `employee_shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_employees`
--
ALTER TABLE `event_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_types`
--
ALTER TABLE `job_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labor_hire_companies`
--
ALTER TABLE `labor_hire_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `loans`
--
ALTER TABLE `loans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_options`
--
ALTER TABLE `loan_options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loan_pendings`
--
ALTER TABLE `loan_pendings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting_employees`
--
ALTER TABLE `meeting_employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `other_payments`
--
ALTER TABLE `other_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `overtimes`
--
ALTER TABLE `overtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payroll_settings`
--
ALTER TABLE `payroll_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payslip_types`
--
ALTER TABLE `payslip_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pay_slips`
--
ALTER TABLE `pay_slips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1392;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_requests`
--
ALTER TABLE `plan_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resignations`
--
ALTER TABLE `resignations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `salary_components_types`
--
ALTER TABLE `salary_components_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_settings`
--
ALTER TABLE `salary_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `saturation_deductions`
--
ALTER TABLE `saturation_deductions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_replies`
--
ALTER TABLE `ticket_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_sheets`
--
ALTER TABLE `time_sheets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=661;

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
-- AUTO_INCREMENT for table `work_from_home_requests`
--
ALTER TABLE `work_from_home_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `work_unites`
--
ALTER TABLE `work_unites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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

--
-- Constraints for dumped tables
--

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
