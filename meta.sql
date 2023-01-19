-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2023 at 07:50 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(3) NOT NULL,
  `parent` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `class` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `parent`, `name`, `class`, `url`) VALUES
(29, 26, 'Permissions', '', 'Admin/permissions'),
(28, 26, 'Roles', '', 'Admin/roles'),
(26, 0, 'Users', 'fa fa-users', ''),
(27, 26, 'List Users', '', 'Admin/list_users'),
(25, 23, 'Manage', '', 'Admin/manage_inquiries'),
(24, 23, 'View', '', 'Admin/view_inquiries'),
(23, 0, 'Inquiries', 'fa fa-book', ''),
(30, 26, 'Assign Permissions', '', 'Admin/assign_permissions'),
(31, 0, 'Subscriptions', 'fa fa-money', ''),
(32, 0, 'Settings', 'fa fa-wrench', ''),
(33, 32, 'Theme', '', ''),
(34, 32, 'Color', '', ''),
(36, 0, 'Web Configuration', 'fa fa-cogs', ''),
(37, 36, 'Add', '', 'admin/add_config'),
(38, 0, 'Services', 'fa fa-wrench', ''),
(39, 38, 'Packages', '', 'admin/packages'),
(40, 38, 'Micro Packages', '', 'admin/micro_packages'),
(41, 38, 'Add-on packages', '', 'admin/addon_packages'),
(42, 38, 'Package Types', '', 'admin/manage_pkg_type');

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `detail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `questions` text NOT NULL,
  `answer` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `status` enum('Approved','Pending') NOT NULL,
  `approved_by` int(3) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `from` varchar(200) NOT NULL,
  `fullname` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `channel` text NOT NULL,
  `package` int(5) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Pending','In Progress','Resolved','Answered') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `from`, `fullname`, `email`, `channel`, `package`, `description`, `status`, `created_at`) VALUES
(1, 'Home Page', 'Mudassar', 'malikmudassar@gmail.com', 'afdadsfase', 2, 'adsfasdfasdfsa', 'Pending', '2023-01-09 03:56:02'),
(3, 'Home Page', 'Mudassar', 'malikmudassar@gmail.com', 'afdadsfase', 3, 'afdasfdadsfasd', 'Pending', '2023-01-09 03:59:35'),
(4, 'Home Page', 'Brijesh', 'brijest@gmail.com', 'a;lfdja;sldkjf', 4, 'this is custom support test query', 'Pending', '2023-01-09 06:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `pkg_type` int(3) NOT NULL,
  `pkg_name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `price` int(6) NOT NULL,
  `duration` int(3) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pkg_type`, `pkg_name`, `icon`, `price`, `duration`, `created_at`, `created_by`) VALUES
(1, 2, 'Diwali special', 'fa fa-money', 25, 1, '2023-01-09 06:00:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `package_types`
--

CREATE TABLE `package_types` (
  `id` int(11) NOT NULL,
  `type_name` text NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_types`
--

INSERT INTO `package_types` (`id`, `type_name`, `description`, `created_at`) VALUES
(2, 'Meta Growth', 'Sample Description', '2023-01-05 12:35:36'),
(3, 'Meta Income', 'Sample Description', '2023-01-05 12:35:51'),
(4, 'Meta Support', 'Sample Description', '2023-01-05 12:36:46'),
(5, 'Meta Safety', 'Sample Description', '2023-01-05 12:36:57'),
(6, 'Meta Boost', 'Sample Description', '2023-01-05 12:37:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `status` enum('pending','approved') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `status`) VALUES
(1, 'john', '56f5950b728849d0b97c1bccf1691c090ab6734c', 'John Vick', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_types`
--
ALTER TABLE `package_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `package_types`
--
ALTER TABLE `package_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
