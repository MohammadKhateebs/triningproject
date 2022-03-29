-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 02:08 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tomorrwyouth`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` int(11) NOT NULL,
  `studyLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `archives` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`name`, `identification`, `studyLevel`, `date`, `role`, `created_at`, `updated_at`, `archives`) VALUES
('اسلام  جرادات', 100, 'الاول', '2021-05-12', 3, '2021-05-10 16:08:05', '2021-05-20 13:36:45', 0),
('اسلام  جرادات', 100, 'الاول', '2021-05-14', 3, '2021-05-10 16:12:18', '2021-05-20 13:36:45', 0),
('اسلام  جرادات', 100, 'الاول', '2021-05-15', 3, '2021-05-10 16:09:03', '2021-05-20 13:36:45', 0),
('اسلام  جرادات', 100, 'الاول', '2021-05-28', 3, '2021-05-10 16:12:46', '2021-05-20 13:36:45', 1),
('نبيل خليل', 101, 'الثاني', '2021-04-12', 3, '2021-04-12 12:22:31', '2021-05-20 13:36:45', 1),
('ليث  ابوصلاح', 105, 'الاول', '2021-05-13', 3, '2021-05-10 16:04:15', '2021-05-20 13:36:45', 1),
('ليث  ابوصلاح', 105, 'الاول', '2021-05-18', 3, '2021-05-10 16:10:20', '2021-05-20 13:36:45', 1),
('ليث  ابوصلاح', 105, 'الاول', '2021-05-20', 3, '2021-05-11 10:24:24', '2021-05-20 13:36:45', 1),
('ليث  ابوصلاح', 105, 'الاول', '2021-05-23', 3, '2021-05-10 16:09:30', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-04-07', 4, '2021-05-10 15:52:32', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-11', 4, '2021-05-10 15:22:09', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-14', 4, '2021-05-10 15:59:10', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-18', 4, '2021-05-10 15:54:39', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-19', 4, '2021-05-10 15:49:47', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-21', 4, '2021-05-10 15:59:42', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-26', 4, '2021-05-10 15:56:02', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-05-27', 4, '2021-05-10 16:09:13', '2021-05-20 13:36:45', 1),
('محمد  شسي', 121, 'الاول', '2021-06-11', 4, '2021-05-10 15:51:47', '2021-05-20 13:36:45', 1),
('كرم  مقالدة', 400, 'الاول', '2021-05-11', 4, '2021-05-10 15:22:09', '2021-05-20 13:36:45', 1),
('كرم  مقالدة', 400, 'الاول', '2021-05-12', 4, '2021-05-10 15:56:53', '2021-05-20 13:36:45', 1),
('كرم  مقالدة', 400, 'الاول', '2021-05-22', 4, '2021-05-10 15:56:19', '2021-05-20 13:36:45', 1),
('ادم جمال', 404, 'الثاني', '2021-04-12', 4, '2021-04-12 12:21:44', '2021-05-20 13:36:45', 1),
('يوسف  اعمور', 406, 'الاول', '2021-05-10', 4, '2021-05-10 15:54:01', '2021-05-20 13:36:45', 1),
('يوسف  اعمور', 406, 'الاول', '2021-05-18', 4, '2021-05-10 15:54:39', '2021-05-20 13:36:45', 1),
('يوسف  اعمور', 406, 'الاول', '2021-05-20', 4, '2021-05-10 15:58:44', '2021-05-20 13:36:45', 1),
('يوسف  اعمور', 406, 'الاول', '2021-05-26', 4, '2021-05-10 15:56:02', '2021-05-20 13:36:45', 1),
('اوس جرادات', 407, 'الثاني', '2021-04-12', 4, '2021-04-12 12:21:44', '2021-05-20 13:36:45', 1),
('محمد  سسس', 1258, 'الاول', '2020-12-24', 4, '2021-05-11 10:24:43', '2021-05-20 13:36:45', 1),
('محمد  سسس', 1258, 'الاول', '2021-05-14', 4, '2021-05-10 15:59:10', '2021-05-20 13:36:45', 1),
('محمد  جرادات', 4042, 'الاول', '2021-05-11', 4, '2021-05-10 15:22:09', '2021-05-20 13:36:45', 1),
('محمد  جرادات', 4042, 'الاول', '2021-05-19', 4, '2021-05-10 15:49:47', '2021-05-20 13:36:45', 1),
('محمد  جرادات', 4042, 'الاول', '2021-06-11', 4, '2021-05-10 15:51:47', '2021-05-20 13:36:45', 1),
('اسلام  جرادات', 4564, 'الاول', '2021-04-22', 3, '2021-05-10 16:13:34', '2021-05-20 13:36:45', 0),
('اسلام  جرادات', 4564, 'الاول', '2021-05-11', 3, '2021-05-10 16:02:39', '2021-05-20 13:36:45', 0),
('كمنمك  نتنم', 4564, 'الاول', '2021-10-05', 4, '2021-10-06 13:47:59', '2021-10-06 13:47:59', 0),
('كمنمك  نتنم', 4564, 'الاول', '2021-10-06', 4, '2021-10-06 13:46:24', '2021-10-06 13:46:24', 0),
('كمكم  كمكمك', 4654, 'الاول', '2021-10-05', 4, '2021-10-06 13:47:59', '2021-10-06 13:47:59', 0),
('كمكم  كمكمك', 4654, 'الاول', '2021-10-06', 4, '2021-10-06 13:46:25', '2021-10-06 13:46:25', 0),
('منمك  كمنكمنمك', 5465, 'الاول', '2021-10-05', 4, '2021-10-06 13:47:59', '2021-10-06 13:47:59', 0),
('منمك  كمنكمنمك', 5465, 'الاول', '2021-10-06', 4, '2021-10-06 13:46:25', '2021-10-06 13:46:25', 0),
('شسيس  خطيب', 64654, 'الاول', '2021-05-11', 4, '2021-05-10 15:22:09', '2021-05-20 13:36:45', 1),
('وجدي محادي', 40484976, 'الثاني', '2021-04-12', 4, '2021-04-12 12:21:44', '2021-05-20 13:36:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `identification` int(11) NOT NULL,
  `studyLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evaluation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archives` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`identification`, `studyLevel`, `date`, `from`, `to`, `created_at`, `updated_at`, `evaluation`, `archives`) VALUES
(105, 'الاول', '2021-05-19', 2, 3, '2021-05-11 10:31:45', '2021-05-20 13:36:45', 'lljh. ', 1),
(112, 'الثالث', '2021-05-13', 3, 4, '2021-05-12 09:28:24', '2021-05-20 13:36:45', 'ممتاز ', 1),
(121, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(121, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:27', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(121, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(400, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(400, 'الاول', '2021-05-03', 2, 4, '2021-05-03 10:47:37', '2021-05-20 13:36:45', 'ممتاز ,fdvfds', 1),
(400, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:28', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(400, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(401, 'الثالث', '2021-05-13', 3, 4, '2021-05-12 09:28:24', '2021-05-20 13:36:45', 'ممتاز ', 1),
(404, 'الثاني', '2021-04-12', 2, 4, '2021-04-12 12:28:54', '2021-05-20 13:36:45', 'ممتاز', 1),
(406, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(406, 'الاول', '2021-05-03', 2, 4, '2021-05-03 10:47:37', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(406, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:28', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(406, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(407, 'الثاني', '2021-04-12', 2, 4, '2021-04-12 12:28:54', '2021-05-20 13:36:45', 'ممتاز', 1),
(1258, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(1258, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:28', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(1258, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(4042, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(4042, 'الاول', '2021-05-03', 2, 4, '2021-05-03 10:47:37', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(4042, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:28', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(4042, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(4045, 'الاول', '2021-05-19', 2, 3, '2021-05-11 10:31:45', '2021-05-20 13:36:45', 'lljh. ', 1),
(4564, 'الاول', '2021-10-06', 2, 4, '2021-10-06 13:49:55', '2021-10-06 13:49:55', 'ممتاز ,تنتنتنتنت', 0),
(4647, 'الثالث', '2021-05-06', 3, 4, '2021-05-18 13:55:06', '2021-05-20 13:36:45', 'ممتاز ', 1),
(4647, 'الثالث', '2021-05-13', 3, 4, '2021-05-18 13:57:54', '2021-05-20 13:36:45', 'ممتاز بي', 1),
(4647, 'الثالث', '2021-05-27', 3, 4, '2021-05-18 13:55:37', '2021-05-20 13:36:45', 'ممتاز ', 1),
(4654, 'الاول', '2021-10-06', 2, 4, '2021-10-06 13:49:55', '2021-10-06 13:49:55', 'lljh. ,', 0),
(5465, 'الاول', '2021-10-06', 2, 4, '2021-10-06 13:49:55', '2021-10-06 13:49:55', 'ممتاز ,', 0),
(64654, 'الاول', '2021-04-28', 2, 4, '2021-05-11 10:30:14', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(64654, 'الاول', '2021-05-12', 2, 4, '2021-05-10 16:14:28', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(64654, 'الاول', '2021-05-27', 2, 4, '2021-05-11 10:24:15', '2021-05-20 13:36:45', 'ممتاز ,', 1),
(40484976, 'الثاني', '2021-04-12', 2, 4, '2021-04-12 12:28:55', '2021-05-20 13:36:45', 'جيد', 1);

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_texts`
--

CREATE TABLE `evaluation_texts` (
  `evaluation` text NOT NULL,
  `role` int(11) NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `evaluation_texts`
--

INSERT INTO `evaluation_texts` (`evaluation`, `role`, `id`, `created_at`, `updated_at`) VALUES
('ممتاز', 4, 2, '2021-05-03 10:34:56', '2021-05-03 10:34:56'),
('lljh.', 3, 3, '2021-05-11 10:31:31', '2021-05-11 10:31:31'),
('lljh.', 4, 4, '2021-05-11 10:31:31', '2021-05-11 10:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `fromRole` int(2) NOT NULL,
  `toRole` int(2) NOT NULL,
  `fromId` int(10) NOT NULL,
  `toId` int(10) NOT NULL,
  `text` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `seen` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_12_124357_create_students_table', 1),
(5, '2021_03_12_124411_create_volunteers_table', 1),
(6, '2021_03_28_085914_create_courses_table', 1),
(7, '2021_03_28_090001_create_teachers_table', 1),
(8, '2021_03_29_111938_create_attendances_table', 1),
(9, '2021_04_01_194657_create_evaluations_table', 2),
(10, '0000_00_00_000000_create_websockets_statistics_entries_table', 3),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `show_requests`
--

CREATE TABLE `show_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `switch` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `show_requests`
--

INSERT INTO `show_requests` (`id`, `switch`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, '2021-05-20 18:35:51');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thirdName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` int(11) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `studyLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `teacher` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `teacherID` int(11) DEFAULT NULL,
  `archives` int(11) NOT NULL DEFAULT 0,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`firstName`, `secondName`, `thirdName`, `lastName`, `gender`, `identification`, `phone`, `address`, `active`, `studyLevel`, `confirmed`, `created_at`, `updated_at`, `teacher`, `teacherID`, `archives`, `birthday`) VALUES
('منت', 'طكمنت', 'طكمن', 'تنوةز', 'ذكر', 123123123, 1231231230, 'كمنتة', 'inactive', 'الثاني', 1, '2021-10-08 12:17:23', '2021-10-08 12:23:23', NULL, NULL, 0, '2021-10-01'),
('يبلات', 'بلاتن', 'اتىةو', 'لاتن', 'أنثى', 147144447, 1231231230, 'سيسنمي', 'inactive', 'الثاني', 1, '2021-10-08 12:03:37', '2021-10-08 12:03:37', NULL, NULL, 0, '2021-10-01'),
('يبلات', 'بلاتن', 'اتىةو', 'لاتن', 'أنثى', 147147147, 1231231230, 'سيسنمي', 'inactive', 'الثاني', 1, '2021-10-08 12:02:38', '2021-10-08 12:02:38', NULL, NULL, 0, '2021-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` int(11) NOT NULL,
  `studyLevel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `delete` int(11) NOT NULL DEFAULT 0,
  `educationLevel` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `identification`, `studyLevel`, `created_at`, `updated_at`, `delete`, `educationLevel`, `phone`) VALUES
(14, 'سوسو', 123456789, 'الخامس', '2021-05-08 15:20:43', '2021-05-08 15:20:43', 0, NULL, NULL),
(15, 'محممد', 1474, 'الثالث', '2021-05-10 14:58:22', '2021-05-10 14:58:22', 0, NULL, NULL),
(17, 'فادي', 700, 'الثاني', '2021-05-12 10:36:20', '2021-10-08 15:51:16', 1, NULL, NULL),
(18, 'عماد سعاده', 600, 'الاول', '2021-05-20 12:40:00', '2021-10-08 15:51:19', 1, NULL, NULL),
(19, 'Mohammad Khateeb', 822, 'الرابع', '2021-05-20 12:40:49', '2021-05-20 19:01:43', 1, NULL, NULL),
(20, 'شهد', 123456787, 'الثاني', '2021-10-08 15:54:02', '2021-10-08 15:54:02', 0, 'ثانويه عامه', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `archives` int(11) NOT NULL DEFAULT 0,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `role`, `password`, `remember_token`, `created_at`, `updated_at`, `archives`, `name`) VALUES
(1, 123456789, 1, '$2y$10$uVxSHT8wTEZPDDEsV/1.CuuUcZBFO2yoVj77tmM5xKKfvV8SSik0G', NULL, NULL, '2021-05-03 10:31:38', 0, 'ادمن'),
(27, 500, 2, '$2y$10$xEOKuZ.lTXKUf/49N0gZJe1tCgCbJe3SUAvcKgdXiShtItjBu8KEu', NULL, '2021-04-09 15:28:24', '2021-04-09 15:28:24', 0, ''),
(28, 501, 2, '$2y$10$piUBfovWATpcURXV8X90ru8Q9sN5h8OYw3QMq5ClAT1T3cWFhLWla', NULL, '2021-04-09 15:28:48', '2021-04-09 15:28:48', 0, ''),
(29, 502, 2, '$2y$10$DVPJYgePsL79pq83/QThR.9E7e54f.WhwdQRKN9a4oFlZ/G8sQUKy', NULL, '2021-04-09 15:29:25', '2021-04-09 15:29:25', 0, ''),
(39, 4040, 2, '$2y$10$Blaw1tv.Y.YRyXfvTQw5OOhOLwjSlotJiWtSY0u6r0pn5t0OJMHAa', NULL, '2021-04-10 12:28:40', '2021-04-10 12:28:40', 0, ''),
(41, 0, 2, '$2y$10$TV7qKc8T1quq/5TrChKFveGoc0qAFsEtYR/PCNGzJ/CVwy53D3hsy', NULL, '2021-04-11 16:46:30', '2021-04-11 16:46:30', 0, ''),
(55, 123456789, 2, '$2y$10$UDgHWBlwKqVO4BdYpbT2oezXJIr1DyW4cL327BVGmvLIvrxUqw5Bi', NULL, '2021-05-08 15:20:43', '2021-05-08 15:20:43', 0, 'سوسو'),
(56, 1474, 2, '$2y$10$uVxSHT8wTEZPDDEsV/1.CuuUcZBFO2yoVj77tmM5xKKfvV8SSik0G', NULL, '2021-05-10 14:58:22', '2021-05-10 14:58:22', 0, 'محممد'),
(62, 4564, 4, '$2y$10$MeUFddB2zHQus2M5WwUJ0.J42uXgpsp9w5uc8Bp2CHtkKH3mTcjGG', NULL, '2021-10-06 14:54:18', '2021-10-06 14:54:18', 0, 'كمنمك نتنم'),
(63, 123456787, 2, '$2y$10$4i6bIW/H2hx0S4SnJV0Je.HNfiF.2vee8yxfYc3emeiNgCuxuYKlG', NULL, '2021-10-08 15:54:02', '2021-10-08 15:54:02', 0, 'شهد');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `firstName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thirdName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identification` int(10) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `university` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `universityId` int(11) NOT NULL,
  `specialization` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academicYear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `confirmed` tinyint(1) DEFAULT NULL,
  `studyLevel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'undefined',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `permissionEvaluation` int(11) NOT NULL DEFAULT 0,
  `transportation` int(11) NOT NULL DEFAULT 0,
  `archives` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `volunteers`
--

INSERT INTO `volunteers` (`firstName`, `secondName`, `thirdName`, `lastName`, `gender`, `identification`, `phone`, `address`, `university`, `universityId`, `specialization`, `academicYear`, `active`, `confirmed`, `studyLevel`, `created_at`, `updated_at`, `permissionEvaluation`, `transportation`, `archives`) VALUES
('اسلام', 'نافز', 'هشام', 'جرادات', 'أنثى', 100, 59, 'نابلس', 'جامعة النجاح الوطنية', 11716309, 'علوم', '4y', 'active', 1, 'الرابع', '2021-04-09 15:12:04', '2021-05-20 13:36:45', 0, 10, 1),
('نبيل', 'منير', 'احمد', 'خليل', 'أنثى', 101, 563, 'طوباس', 'جامعة بيرزيت', 11716319, 'رياضة', '4y', 'active', 1, 'الثاني', '2021-04-09 15:12:46', '2021-05-20 13:36:45', 0, 100, 1),
('عادل', 'باسم', 'ابراهيم', 'ابويعقوب', 'ذكر', 102, 231, 'رام الله', 'جامعة النجاح الوطنية', 45646, 'تربية أبتدائي', '2y', 'active', 2, 'السادس', '2021-04-09 15:13:26', '2021-05-20 13:36:45', 0, 100, 1),
('ليث', 'لؤي', 'مؤيد', 'ابوصلاح', 'ذكر', 105, 3214, 'قلقيليه', 'الجامعة العربية الأمريكية', 0, 'أنجليزي', 'متخرج', 'active', 2, 'undefined', '2021-04-09 15:14:43', '2021-05-20 13:36:45', 0, 100, 1),
('محمد', 'احمد', 'سامر', 'سمير', 'أنثى', 113, 569856, 'نابلس', 'جامعة النجاح الوطنية', 115655, 'عربي', 'سنه اولى', 'active', 1, 'الثالث', '2021-05-02 16:13:16', '2021-05-20 13:36:45', 1, 10, 1),
('محمحد', 'خطيب', 'سوسو', 'ممم', 'أنثى', 455, 5655, 'نابلس', 'جامعة النجاح الوطنية', 6546546, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-11 11:30:26', '2021-05-20 13:36:45', 0, 0, 1),
('محمحد', 'منمكن', 'مكنمك', 'كمن', 'ذكر', 645, 5465464, 'نابلس', 'جامعة النجاح الوطنية', 65456465, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-10 16:56:36', '2021-05-20 13:36:45', 0, 0, 1),
('تيسير', 'صالح', 'محمد', 'جرادات', 'أنثى', 4045, 59584978, 'نابلس', 'جامعة بيرزيت', 22583, 'تربية أبتدائي', 'سنه اولى', 'active', 1, 'undefined', '2021-04-12 17:40:15', '2021-05-20 13:36:45', 0, 200, 1),
('محمد', 'اسمم', 'مسش', 'تايبل', 'أنثى', 4654, 2223456, 'رام الله', 'جامعة بيرزيت', 2123123, 'عربي', 'سنه ثانيه', 'inactive', 1, 'الثالث', '2021-05-02 17:14:15', '2021-05-20 13:36:45', 0, 200, 1),
('محمحد', 'منمن', 'منمكن', 'منمكن', 'ذكر', 5555, 56465, 'نابلس', 'جامعة النجاح الوطنية', 545645, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'الثالث', '2021-05-11 17:58:11', '2021-05-20 13:36:45', 0, 0, 1),
('بيسب', 'سيبسي', 'يسبيس', 'سيبيس', 'أنثى', 6464, 54654, 'نابلس', 'جامعة بيرزيت', 454545, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-18 15:41:43', '2021-05-20 13:36:45', 0, 0, 1),
('سشيب', 'سشيشس', 'شسيسش', 'شسيسش', 'ذكر', 6489, 65465, 'نابلس', 'جامعة بيرزيت', 65464, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'الثاني', '2021-05-10 14:48:09', '2021-05-20 13:36:45', 0, 10, 1),
('تنمت', 'منتنمت', 'نمتمنتمن', 'مانتن', 'ذكر', 8787, 64654, 'نابلس', 'جامعة النجاح الوطنية', 64787, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'الثالث', '2021-05-12 12:01:48', '2021-05-20 13:36:45', 0, 0, 1),
('محمد', 'احمد', 'رامي', 'محتميد', 'ذكر', 12365, 258963, 'رام الله', 'جامعة بيرزيت', 11223366, 'تربية أبتدائي', 'سنه اولى', 'active', 2, 'السادس', '2021-04-11 16:44:42', '2021-05-20 13:36:45', 0, 10, 1),
('نم', 'نمكن', 'مكنكم', 'نمكنم', 'ذكر', 65465, 456456, 'نابلس', 'جامعة بيرزيت', 646546, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'الخامس', '2021-05-12 11:57:42', '2021-05-20 13:36:45', 0, 0, 1),
('محمحد', 'مكمك', 'كمكم', 'كمكم', 'ذكر', 147852, 546846, 'نابلس', 'جامعة النجاح الوطنية', 465464, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-12 11:46:27', '2021-05-20 13:36:45', 0, 0, 1),
('ناذاتناتناذ', 'نتاتنا', 'تاتنتن', 'انمتنمت', 'ذكر', 465465, 8848, 'نابلس', 'جامعة النجاح الوطنية', 54545, 'أنجليزي', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-12 12:00:53', '2021-05-20 13:36:45', 0, 0, 1),
('نمتمنت', 'منتنمت', 'منتمنت', 'منتمنت', 'ذكر', 564654, 454545, 'نابلس', 'جامعة النجاح الوطنية', 546456, 'علوم', 'سنه اولى', 'inactive', 1, 'undefined', '2021-05-12 11:53:10', '2021-05-20 13:36:45', 0, 0, 1),
('شسيسش', 'شسيسش', 'شسيسش', 'شسيسي', 'ذكر', 654654, 4654, 'نابلس', 'جامعة النجاح الوطنية', 654, 'أنجليزي', 'سنه اولى', 'inactive', 0, 'undefined', '2021-05-10 14:46:50', '2021-05-20 13:36:45', 0, 0, 1),
('نمكن', 'نمكنكم', 'كمنمكن', 'مكنكمن', 'ذكر', 5647687, 4564321, 'نابلس', 'جامعة النجاح الوطنية', 4564, 'أنجليزي', 'سنه ثانيه', 'inactive', 0, 'undefined', '2021-05-12 12:03:18', '2021-05-20 13:36:45', 0, 0, 1),
('تنمكت', 'نمكنكمنكم', 'نمكنمكن', 'كنكمنكم', 'ذكر', 1231231231, 1233213211, 'نابلس', 'جامعة النجاح الوطنية', 1234567, 'أنجليزي', 'سنه اولى', 'inactive', NULL, 'undefined', '2021-05-19 12:07:01', '2021-05-20 13:36:45', 0, 0, 1),
('محمد', 'سمير', 'سوسو', 'نونو', 'أنثى', 1234567890, 597633223, 'نابلس', 'جامعة تشيك', 1234568, 'مخصكش', 'سنه رابعه', 'inactive', NULL, 'undefined', '2021-05-19 11:31:31', '2021-05-20 13:36:45', 0, 0, 1),
('سيشسشي', 'كمنمك', 'نمكنمكن', 'كمنمكنمك', 'ذكر', 1234659870, 1478523690, 'نابلس', 'جامعة النجاح الوطنية', 1452369870, 'أنجليزي', 'سنه اولى', 'inactive', NULL, 'undefined', '2021-05-19 11:37:34', '2021-05-20 13:36:45', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `websockets_statistics_entries`
--

CREATE TABLE `websockets_statistics_entries` (
  `id` int(10) UNSIGNED NOT NULL,
  `app_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peak_connection_count` int(11) NOT NULL,
  `websocket_message_count` int(11) NOT NULL,
  `api_message_count` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`identification`,`date`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`identification`,`date`);

--
-- Indexes for table `evaluation_texts`
--
ALTER TABLE `evaluation_texts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `show_requests`
--
ALTER TABLE `show_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD UNIQUE KEY `students_identification_unique` (`identification`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_identification_unique` (`identification`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `volunteers`
--
ALTER TABLE `volunteers`
  ADD UNIQUE KEY `volunteers_identification_unique` (`identification`);

--
-- Indexes for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `evaluation_texts`
--
ALTER TABLE `evaluation_texts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=603;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `show_requests`
--
ALTER TABLE `show_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `websockets_statistics_entries`
--
ALTER TABLE `websockets_statistics_entries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
