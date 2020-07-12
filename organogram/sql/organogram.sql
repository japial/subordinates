-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2020 at 08:59 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organogram`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Human Resource', '2020-06-29 19:52:56', '2020-06-29 19:52:56'),
(2, 'Software Development', '2020-06-29 19:52:56', '2020-06-29 19:52:56'),
(3, 'Marketing', '2020-06-29 19:53:23', '2020-06-29 19:53:23'),
(4, 'Support', '2020-06-29 19:53:23', '2020-06-29 19:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(1, 'Alan P. Blane', 'alanlane@jourrapide.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-22 10:07:06'),
(2, 'Cinda K. Manley', 'aindaanley@dayrep.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-22 10:15:57'),
(3, 'Nicholas B. Novello', 'aicholasovello@armyspy.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-22 11:33:26'),
(4, 'Yvette J. McRae', 'etteasdae@jourrapide.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-22 11:33:26'),
(5, 'Alex Hales', 'alex@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:08:27'),
(6, 'Jhon Smith', 'johnsmith@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:08:27'),
(7, 'Michel Clrak', 'clark@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(8, 'Mathew Hayden', 'hayden@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(9, 'Brad Haddin', 'haddin@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(10, 'Bret Lee', 'lee@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(11, 'Mc Gilespi', 'gilespi@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(12, 'Ricky Ponting', 'ponting@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-29 14:10:58'),
(13, 'Virat Kohli', 'virat@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-30 05:59:34'),
(14, 'Rohit Sharma', 'rohit@email.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-06-30 05:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `employee_roles`
--

CREATE TABLE `employee_roles` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `departments_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_roles`
--

INSERT INTO `employee_roles` (`id`, `employee_id`, `roles_id`, `departments_id`, `manager_id`, `created_at`) VALUES
(1, 1, 1, 1, 0, '2020-06-29 19:56:47'),
(2, 1, 3, 2, 2, '2020-06-29 19:56:47'),
(3, 2, 2, 2, 6, '2020-06-29 19:57:26'),
(4, 2, 1, 4, 0, '2020-06-29 19:57:26'),
(5, 2, 1, 3, 0, '2020-06-29 19:58:23'),
(7, 2, 2, 1, 1, '2020-06-29 20:12:16'),
(8, 3, 3, 1, 2, '2020-06-29 20:12:16'),
(9, 4, 4, 1, 3, '2020-06-29 20:12:35'),
(10, 5, 5, 1, 4, '2020-06-29 20:12:35'),
(12, 6, 6, 1, 5, '2020-06-29 20:13:19'),
(13, 6, 1, 2, 0, '2020-06-30 00:03:01'),
(14, 8, 4, 2, 1, '2020-06-30 00:03:01'),
(15, 11, 2, 1, 1, '2020-06-30 00:45:51'),
(16, 12, 3, 1, 11, '2020-06-30 11:39:22'),
(17, 8, 4, 1, 12, '2020-06-30 11:39:22'),
(18, 7, 5, 1, 8, '2020-06-30 11:57:52'),
(19, 10, 5, 1, 8, '2020-06-30 11:57:52'),
(20, 13, 6, 1, 7, '2020-06-30 12:00:28'),
(21, 14, 6, 1, 10, '2020-06-30 12:00:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hierarchy` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'CEO', 1, '2020-06-29 19:54:05', '2020-06-29 19:54:05'),
(2, 'COO', 2, '2020-06-29 19:54:05', '2020-06-29 19:54:05'),
(3, 'GENERAL MANAGER', 3, '2020-06-29 19:54:35', '2020-06-29 19:54:35'),
(4, 'MANAGER', 4, '2020-06-29 19:54:35', '2020-06-29 19:54:35'),
(5, 'SUPERVISOR', 5, '2020-06-29 19:54:59', '2020-06-29 19:54:59'),
(6, 'STAFF', 6, '2020-06-29 19:54:59', '2020-06-29 19:54:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_roles`
--
ALTER TABLE `employee_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `employee_roles`
--
ALTER TABLE `employee_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
