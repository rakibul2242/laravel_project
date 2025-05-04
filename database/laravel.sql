-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 05:06 PM
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
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `credit_hours` int(11) NOT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `level` enum('Undergraduate','Postgraduate') NOT NULL DEFAULT 'Undergraduate',
  `department` varchar(255) DEFAULT NULL,
  `teacher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `code`, `description`, `credit_hours`, `semester`, `level`, `department`, `teacher_id`, `created_at`, `updated_at`) VALUES
(2, 'History Of English Literature', '101123', 'English Course', 4, '4', 'Postgraduate', 'English', 26, '2025-05-03 09:13:49', '2025-05-04 08:09:24'),
(4, 'Introduction to Computer Science', '101', 'This course provides an introduction to computer science, covering basic programming concepts and algorithms.', 3, '1', 'Undergraduate', 'Computer Science', 2, '2025-05-03 15:32:46', '2025-05-04 05:03:06'),
(5, 'Advanced Programming Techniques', '201', 'This course covers advanced programming topics like data structures, algorithms, and object-oriented programming.', 4, '1', 'Undergraduate', 'Computer Science', 2, '2025-05-03 15:32:46', '2025-05-04 05:03:18'),
(6, 'Linear Algebra', '105', 'This course introduces linear algebra, covering topics such as matrices, vectors, and linear transformations.', 3, '1', 'Undergraduate', 'Philosophy', 3, '2025-05-03 15:32:46', '2025-05-04 05:04:33'),
(7, 'Calculus I', '102', 'This course covers the basics of differential calculus, including limits, derivatives, and their applications.', 4, '1', 'Undergraduate', 'Mathematics', 4, '2025-05-03 15:32:46', '2025-05-04 05:05:16'),
(8, 'Organic Chemistry', '1010', 'An introductory course on organic chemistry, focusing on the study of hydrocarbons and their derivatives.', 3, '1', 'Undergraduate', 'Chemistry', 5, '2025-05-03 15:32:46', '2025-05-04 05:05:25'),
(9, 'Physical Chemistry', '2010', 'A course focusing on the principles of physical chemistry, including thermodynamics and kinetics.', 4, '1', 'Undergraduate', 'Chemistry', 6, '2025-05-03 15:32:46', '2025-05-04 05:05:32'),
(10, 'Quantum Mechanics', '1121', 'An introduction to the principles of quantum mechanics, including wave-particle duality and the Schrödinger equation.', 3, '1', 'Undergraduate', 'Physics', 2, '2025-05-03 15:32:46', '2025-05-04 05:05:39'),
(11, 'Thermodynamics', '1021', 'This course introduces the basic concepts of thermodynamics, including the laws of thermodynamics and entropy.', 4, '1', 'Undergraduate', 'Physics', 2, '2025-05-03 15:32:46', '2025-05-04 05:05:47'),
(12, 'Shakespearean Literature', '1001', 'A study of the works of Shakespeare, focusing on his plays and their historical context.', 3, '1', 'Undergraduate', 'English', 2, '2025-05-03 15:32:46', '2025-05-04 05:13:12'),
(13, 'Modern English Literature', 'ENG102', 'A course exploring modern English literature from the 19th to the 21st century.', 4, 'Spring', 'Undergraduate', 'English', 10, '2025-05-03 15:32:46', '2025-05-03 15:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_26_112824_add_two_factor_columns_to_users_table', 1),
(5, '2025_04_26_112921_create_personal_access_tokens_table', 1),
(9, '0001_01_01_000000_create_users_table', 1),
(10, '0001_01_01_000001_create_cache_table', 1),
(11, '0001_01_01_000002_create_jobs_table', 1),
(12, '2025_04_26_112824_add_two_factor_columns_to_users_table', 1),
(13, '2025_04_26_112921_create_personal_access_tokens_table', 1),
(14, '2025_04_30_135923_create_teams_table', 1),
(15, '2025_04_30_135924_create_team_user_table', 1),
(16, '2025_04_30_135925_create_team_invitations_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `result` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `course_id`, `result`, `created_at`, `updated_at`) VALUES
(21, 13, 5, 'B-', '2025-05-04 07:15:18', '2025-05-04 07:15:18'),
(22, 4, 9, 'C', '2025-05-04 07:23:57', '2025-05-04 07:23:57'),
(23, 10, 7, 'B', '2025-05-04 07:31:25', '2025-05-04 07:31:25'),
(24, 2, 9, 'B', '2025-05-04 07:38:50', '2025-05-04 07:38:50'),
(25, 10, 9, 'B+', '2025-05-04 07:38:59', '2025-05-04 07:38:59'),
(26, 13, 6, 'A-', '2025-05-04 07:39:06', '2025-05-04 07:39:06'),
(27, 9, 6, 'A-', '2025-05-04 07:39:12', '2025-05-04 07:39:12'),
(28, 2, 7, 'C+', '2025-05-04 07:39:21', '2025-05-04 07:39:21'),
(29, 1, 4, 'B-', '2025-05-04 07:39:27', '2025-05-04 07:39:27'),
(30, 1, 9, 'B-', '2025-05-04 07:39:37', '2025-05-04 07:39:37'),
(31, 1, 2, 'B-', '2025-05-04 07:39:45', '2025-05-04 07:39:45'),
(32, 1, 2, 'A-', '2025-05-04 07:39:54', '2025-05-04 07:39:54'),
(33, 4, 5, 'C+', '2025-05-04 07:40:32', '2025-05-04 07:40:32'),
(34, 1, 2, 'C+', '2025-05-04 07:41:03', '2025-05-04 07:41:03'),
(35, 1, 2, 'B-', '2025-05-04 07:41:19', '2025-05-04 07:41:19'),
(36, 1, 10, 'B-', '2025-05-04 08:28:04', '2025-05-04 08:28:04'),
(37, 1, 11, 'C+', '2025-05-04 08:28:44', '2025-05-04 08:28:44'),
(38, 1, 7, 'A', '2025-05-04 08:28:56', '2025-05-04 08:28:56'),
(39, 1, 6, 'A-', '2025-05-04 08:29:28', '2025-05-04 08:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('i79FaJPoAXC45PS6QnqaAjG72nvYNQ8KxPWmoRM5', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMnlaeVFLN2hZN0xWd2N3eFVoTzNWUXRzeGhZRmlNbXlXZ2V4Nmc0NCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fX0=', 1746371178);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `roll` int(20) NOT NULL,
  `section` varchar(10) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `roll`, `section`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'David Brown', 1044, 'C', '01712345601', '1342 Birch St, City, Country', '2025-04-26 12:31:49', '2025-05-03 12:33:46'),
(2, 'Emily White', 105, 'A', '01823456702', '2389 Maple St, City, Country', '2025-04-26 12:31:49', '2025-05-03 12:33:46'),
(3, 'Michael Davis', 106, 'B', '01934567803', '1023 Cedar St, City, Country', '2025-04-26 12:31:49', '2025-05-03 12:33:46'),
(4, 'Sophia Wilson', 107, 'C', '01645678904', '7654 Birch St, City, Country', '2025-04-26 12:31:49', '2025-05-03 12:33:46'),
(7, 'MD Rakibul Islam', 56, 'A', '01756789007', 'Dhaka', '2025-04-26 06:42:19', '2025-05-03 12:33:46'),
(8, 'John Doe', 11, 'A', '01867890108', '1234 Elm Street, Springfield', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(9, 'Jane Smith', 1, 'B', '01978901209', '5678 Oak Avenue, Rivertown', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(10, 'Michael Johnson', 12, 'A', '01689012310', '9101 Pine Road, Lakeside', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(11, 'Emily Davis', 15, 'C', '01790123411', '1122 Maple Drive, Hilltop', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(12, 'David Brown', 55, 'D', '01801234512', '3344 Birch Blvd, Greenfield', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(13, 'Sophia Wilson', 6, 'B', '01912345613', '4455 Cedar Lane, Meadowbrook', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(14, 'James Taylor', 7, 'C', '01623456714', '5566 Spruce Street, Seaview', '2025-05-03 12:22:36', '2025-05-03 12:33:46'),
(35, 'Noah Walker', 17, 'A', '01734567835', '7890 Sycamore Street, Brookfield', '2025-05-03 12:28:26', '2025-05-03 12:33:46'),
(36, 'Mia Young', 2, 'B', '01845678936', '3456 Willow Ave, Riverdale', '2025-05-03 12:28:26', '2025-05-03 12:33:46'),
(37, 'Ethan Hall', 13, 'C', '01956789037', '8765 Ash Road, Sunnytown', '2025-05-03 12:28:26', '2025-05-03 12:33:46'),
(38, 'Ava Allen', 14, 'D', '01667890138', '9087 Magnolia Blvd, Hillcrest', '2025-05-03 12:28:26', '2025-05-03 12:33:46'),
(39, 'Lucas Wright', 25, 'A', '01778901239', '2134 Fir Street, Laketown', '2025-05-03 12:28:26', '2025-05-03 12:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(15) NOT NULL,
  `department` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `department`, `created_at`, `updated_at`) VALUES
(2, 'Amina Rahman', 'amina.rahman@example.com', 1710000001, 'Mathematics', '2025-05-03 11:38:27', '2025-05-03 11:38:27'),
(3, 'Farhan Karim', 'farhan.karim@example.com', 1710000002, 'Physics', '2025-05-03 11:38:27', '2025-05-03 11:38:27'),
(4, 'Nasreen Jahan', 'nasreen.jahan@example.com', 1710000003, 'Chemistry', '2025-05-03 11:38:27', '2025-05-03 11:38:27'),
(5, 'Sajjad Hossain', 'sajjad.hossain@example.com', 1710000004, 'Biology', '2025-05-03 11:38:27', '2025-05-03 11:38:27'),
(6, 'Lamia Chowdhury', 'lamia.chowdhury@example.com', 1710000005, 'English', '2025-05-03 11:38:27', '2025-05-03 11:38:27'),
(22, 'Zakia Sultana', 'zakia.sultana@example.com', 1710000016, 'Physics', '2025-05-03 11:40:20', '2025-05-03 06:13:23'),
(23, 'Nayeem Islam', 'nayeem.islam@example.com', 1710000017, 'Environmental Science', '2025-05-03 11:40:20', '2025-05-03 11:40:20'),
(24, 'Rumana Khan', 'rumana.khan@example.com', 1710000018, 'Computer Science', '2025-05-03 11:40:20', '2025-05-03 06:14:52'),
(25, 'Anwar Hossain', 'anwar.hossain@example.com', 1710000019, 'Literature', '2025-05-03 11:40:20', '2025-05-03 06:17:50'),
(26, 'Shafiqur Rahman', 'shafiqur.rahman@example.com', 1710000020, 'Literature', '2025-05-03 11:40:20', '2025-05-03 06:17:56'),
(27, 'Tahmina Alam', 'tahmina.alam@example.com', 1710000021, 'Music', '2025-05-03 11:40:20', '2025-05-03 06:18:12'),
(28, 'Kamrul Ahsan', 'kamrul.ahsan@example.com', 1710000022, 'Political Science', '2025-05-03 11:40:20', '2025-05-03 06:18:22'),
(29, 'Asma Begum', 'asma.begum@example.com', 1710000023, 'Psychology', '2025-05-03 11:40:20', '2025-05-03 06:18:37'),
(30, 'Md. Saiful Islam', 'saiful.islam@example.com', 1710000024, 'Sociology', '2025-05-03 11:40:20', '2025-05-03 06:18:47'),
(31, 'Raihan Uddin', 'raihan.uddin@example.com', 1710000025, 'Computer Science', '2025-05-03 11:40:20', '2025-05-03 06:20:20');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'MD Rakibul Islam', 'mdrakibulislam2242@gmail.com', NULL, '$2y$12$E5RsYcRderHmZhnk88zM6exfcuR25p4uIy1AhygI5J9y5kNeZ7Vzu', NULL, NULL, NULL, 'XIYk2vimnqqf3pBhWodcH4NyzGteIeSqwSShjianYD94mvbMkwU3dSwyWuIK', NULL, NULL, '2025-04-26 05:33:16', '2025-04-26 05:33:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roll` (`roll`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indexes for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
