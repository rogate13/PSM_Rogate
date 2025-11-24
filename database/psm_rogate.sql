-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 24, 2025 at 06:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psm_rogate`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `status` enum('SUCCESS','FAILED') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `user_id`, `ip_address`, `user_agent`, `status`, `created_at`) VALUES
(1, 1, '::1', 'PostmanRuntime/7.49.1', 'SUCCESS', '2025-11-21 19:39:05'),
(2, 1, '::1', 'PostmanRuntime/7.49.1', 'SUCCESS', '2025-11-21 20:21:47'),
(3, 1, '::1', 'PostmanRuntime/7.49.1', 'SUCCESS', '2025-11-21 20:24:55'),
(4, 1, '::1', 'PostmanRuntime/7.49.1', 'SUCCESS', '2025-11-21 20:25:48'),
(5, 1, '::1', 'PostmanRuntime/7.49.1', 'SUCCESS', '2025-11-21 20:32:49'),
(6, 1, '::1', NULL, 'SUCCESS', '2025-11-24 20:42:46');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_code` varchar(30) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE','BLOCKED') NOT NULL DEFAULT 'ACTIVE',
  `current_balance` bigint(20) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_code`, `full_name`, `email`, `phone`, `status`, `current_balance`, `created_at`, `updated_at`) VALUES
(1, 'MBR1763651778', 'Christine Olivia', 'christine.new@test.com', '08129999999', 'ACTIVE', 2949000, '2025-11-20 22:16:18', '2025-11-25 00:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `member_log`
--

CREATE TABLE `member_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `action` enum('CREATE','UPDATE','DELETE') NOT NULL,
  `old_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`old_data`)),
  `new_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`new_data`)),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member_log`
--

INSERT INTO `member_log` (`id`, `member_id`, `action`, `old_data`, `new_data`, `created_at`) VALUES
(1, 1, 'UPDATE', '{\"id\":\"1\",\"member_code\":\"MBR1763651778\",\"full_name\":\"Christine\",\"email\":\"christine@test.com\",\"phone\":\"081234567\",\"status\":\"ACTIVE\",\"current_balance\":\"30000\",\"created_at\":\"2025-11-20 22:16:18\",\"updated_at\":\"2025-11-20 22:27:52\"}', '{\"id\":\"1\",\"member_code\":\"MBR1763651778\",\"full_name\":\"Christine Olivia\",\"email\":\"christine.new@test.com\",\"phone\":\"08129999999\",\"status\":\"ACTIVE\",\"current_balance\":\"30000\",\"created_at\":\"2025-11-20 22:16:18\",\"updated_at\":\"2025-11-21 20:35:43\"}', '2025-11-21 20:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_type_id` tinyint(3) UNSIGNED NOT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `amount` bigint(20) NOT NULL,
  `balance_before` bigint(20) NOT NULL,
  `balance_after` bigint(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `channel` enum('SYSTEM','ADMIN','WEB','MOBILE') NOT NULL DEFAULT 'SYSTEM',
  `created_by` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `transaction_type_id`, `reference_no`, `amount`, `balance_before`, `balance_after`, `description`, `channel`, `created_by`, `created_at`) VALUES
(1, 1, 1, NULL, 50000, 0, 50000, NULL, '', NULL, '2025-11-20 22:23:13'),
(2, 1, 2, NULL, 20000, 50000, 30000, NULL, '', NULL, '2025-11-20 22:27:52'),
(3, 1, 1, NULL, 50000, 30000, 80000, NULL, '', NULL, '2025-11-21 20:40:50'),
(4, 1, 2, NULL, 20000, 80000, 60000, NULL, '', NULL, '2025-11-21 20:45:46'),
(5, 1, 2, NULL, 1000, 60000, 59000, 'Pembelian barang', '', NULL, '2025-11-21 20:56:16'),
(6, 1, 1, NULL, 10000, 59000, 69000, NULL, 'WEB', NULL, '2025-11-24 23:41:13'),
(7, 1, 1, NULL, 1000000, 69000, 1069000, NULL, 'WEB', NULL, '2025-11-24 23:41:20'),
(8, 1, 2, NULL, 10000, 1069000, 1059000, NULL, 'WEB', NULL, '2025-11-24 23:41:28'),
(9, 1, 2, NULL, 10000, 1059000, 1049000, NULL, 'WEB', NULL, '2025-11-24 23:42:17'),
(10, 1, 1, NULL, 2000000, 1049000, 3049000, NULL, 'WEB', NULL, '2025-11-25 00:08:57'),
(11, 1, 2, NULL, 100000, 3049000, 2949000, NULL, 'WEB', NULL, '2025-11-25 00:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_log`
--

CREATE TABLE `transaction_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `before_balance` bigint(20) NOT NULL,
  `after_balance` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_log`
--

INSERT INTO `transaction_log` (`id`, `transaction_id`, `member_id`, `before_balance`, `after_balance`, `created_at`) VALUES
(1, 3, 1, 30000, 80000, '2025-11-21 20:40:50'),
(2, 4, 1, 80000, 60000, '2025-11-21 20:45:46'),
(3, 5, 1, 60000, 59000, '2025-11-21 20:56:16'),
(4, 6, 1, 59000, 69000, '2025-11-24 23:41:13'),
(5, 7, 1, 69000, 1069000, '2025-11-24 23:41:20'),
(6, 8, 1, 1069000, 1059000, '2025-11-24 23:41:28'),
(7, 9, 1, 1059000, 1049000, '2025-11-24 23:42:17'),
(8, 10, 1, 1049000, 3049000, '2025-11-25 00:08:57'),
(9, 11, 1, 3049000, 2949000, '2025-11-25 00:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_types`
--

CREATE TABLE `transaction_types` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `direction` enum('CREDIT','DEBIT') NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_types`
--

INSERT INTO `transaction_types` (`id`, `code`, `name`, `direction`, `description`) VALUES
(1, 'TOPUP', 'Top Up Saldo', 'CREDIT', 'Penambahan saldo member'),
(2, 'PURCHASE', 'Pembelian / Pemakaian Saldo', 'DEBIT', 'Mengurangi saldo member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `role` enum('ADMIN','STAFF','MEMBER') NOT NULL DEFAULT 'MEMBER',
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `api_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password_hash`, `full_name`, `role`, `member_id`, `created_at`, `updated_at`, `api_token`) VALUES
(1, 'admin', '$2y$10$4J1ro/Hud2HYwrASgK9KZuOFaGZR5.EZ/XiZosD3xNFvW9dPZUaQ6', 'admin', 'ADMIN', NULL, '2025-11-21 19:38:59', '2025-11-21 19:38:59', NULL),
(2, 'christine', '$2y$10$4J1ro/Hud2HYwrASgK9KZuOFaGZR5.EZ/XiZosD3xNFvW9dPZUaQ6', 'christine', 'MEMBER', 1, '2025-11-24 22:10:53', '2025-11-24 22:12:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_tokens`
--

CREATE TABLE `user_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` datetime NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tokens`
--

INSERT INTO `user_tokens` (`id`, `user_id`, `token`, `expired_at`, `created_at`) VALUES
(13, 2, '635d1f2f3af58dbd3ccd2dc55fcae4ba9aabdfe2', '2025-11-25 01:17:03', '2025-11-25 00:17:03'),
(14, 1, '5301c41979414988d964282a8f669a7efb84da3c', '2025-11-25 01:29:08', '2025-11-25 00:29:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_loginlog_user` (`user_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `member_code` (`member_code`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_members_status` (`status`);

--
-- Indexes for table `member_log`
--
ALTER TABLE `member_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_memberlog_member` (`member_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trx_type` (`transaction_type_id`),
  ADD KEY `fk_trx_user` (`created_by`),
  ADD KEY `idx_trx_member_created` (`member_id`,`created_at`),
  ADD KEY `idx_trx_reference` (`reference_no`);

--
-- Indexes for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_trxlog_trx` (`transaction_id`),
  ADD KEY `fk_trxlog_member` (`member_id`);

--
-- Indexes for table `transaction_types`
--
ALTER TABLE `transaction_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_tokens`
--
ALTER TABLE `user_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `member_log`
--
ALTER TABLE `member_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction_log`
--
ALTER TABLE `transaction_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_types`
--
ALTER TABLE `transaction_types`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_tokens`
--
ALTER TABLE `user_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_log`
--
ALTER TABLE `login_log`
  ADD CONSTRAINT `fk_loginlog_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_log`
--
ALTER TABLE `member_log`
  ADD CONSTRAINT `fk_memberlog_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_trx_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_type` FOREIGN KEY (`transaction_type_id`) REFERENCES `transaction_types` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trx_user` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaction_log`
--
ALTER TABLE `transaction_log`
  ADD CONSTRAINT `fk_trxlog_member` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_trxlog_trx` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
