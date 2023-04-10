-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2023 at 05:17 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning_profile`
--

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `height` decimal(3,2) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `hobbies` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`hobbies`)),
  `address` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `photo_path` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `name`, `email`, `age`, `height`, `dob`, `gender`, `hobbies`, `address`, `city`, `photo_path`, `created_at`, `updated_at`) VALUES
(18, 'Anne Woods', 'kymeh@mailinator.com', 39, '9.99', '2013-06-12', 'male', '[\"Playing Cricket\"]', 'Consequatur Volupta', 'hyderabad', '', '2023-04-09 15:58:13', '2023-04-09 15:58:13'),
(19, 'Anne Woods', 'kymeh@mailinator.com', 39, '9.99', '2013-06-12', 'male', '[\"Playing Cricket\"]', 'Consequatur Volupta', 'hyderabad', 'uploads/png-clipart-lion-lion.png', '2023-04-09 15:58:57', '2023-04-09 15:58:57'),
(20, 'Anne Woods', 'kymeh@mailinator.com', 39, '9.99', '2013-06-12', 'male', '[\"Playing Cricket\"]', 'Consequatur Volupta', 'hyderabad', '../uploads/png-clipart-lion-lion.png', '2023-04-09 16:00:39', '2023-04-09 16:00:39'),
(21, 'Anne Woods', 'kymeh@mailinator.com', 39, '9.99', '2013-06-12', 'male', '[\"Playing Cricket\"]', 'Consequatur Volupta', 'hyderabad', '../uploads/png-clipart-lion-lion-1.png', '2023-04-09 16:59:47', '2023-04-09 16:59:47'),
(22, 'Kristen Salas', 'devojez@mailinator.com', 92, '9.99', '2019-06-10', 'female', 'null', 'Exercitationem animi', 'hyderabad', '../uploads/6b7ed698713c09ad9e6afc7dcb996a09.jpg', '2023-04-09 17:03:16', '2023-04-09 17:03:16'),
(23, 'Macaulay English', 'didupoqu@mailinator.com', 80, '9.99', '2008-12-13', 'male', '[\"Playing Chess\",\"Music\"]', 'Sunt quis nulla est ', 'hyderabad', '', '2023-04-09 17:03:57', '2023-04-09 17:03:57'),
(24, 'Macaulay English', 'didupoqu@mailinator.com', 80, '9.99', '2008-12-13', 'male', '[\"Playing Chess\",\"Music\"]', 'Sunt quis nulla est ', 'hyderabad', '', '2023-04-09 17:05:21', '2023-04-09 17:05:21'),
(25, 'Rhona Walsh', 'hukekifavo@mailinator.com', 35, '9.99', '1975-08-24', 'male', '[\"Playing Chess\"]', 'Tempore ea tempora ', 'mumbai', '', '2023-04-09 17:05:32', '2023-04-09 17:05:32'),
(26, 'Echo Gay', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '', '2023-04-09 17:09:09', '2023-04-09 17:09:09'),
(27, 'Echo Gay', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '', '2023-04-09 17:09:37', '2023-04-09 17:09:37'),
(28, 'Echo Gay1', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '', '2023-04-09 17:10:16', '2023-04-09 17:28:58'),
(29, 'Echo Gay', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '../uploads/6b7ed698713c09ad9e6afc7dcb996a09-1.jpg', '2023-04-09 17:10:20', '2023-04-09 17:10:20'),
(30, 'Echo Gay', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '../uploads/6b7ed698713c09ad9e6afc7dcb996a09-2.jpg', '2023-04-09 17:10:36', '2023-04-09 17:10:36'),
(31, 'Echo Gay', 'gacenunug@mailinator.com', 56, '9.99', '1992-12-31', 'female', '[\"Playing Cricket\"]', 'Totam deserunt ullam', 'hyderabad', '../uploads/6b7ed698713c09ad9e6afc7dcb996a09-3.jpg', '2023-04-09 17:15:26', '2023-04-09 17:15:26'),
(32, 'Ocean Adkins', 'mowuciku@mailinator.com', 9, '9.99', '1984-08-12', 'male', '[\"Music\"]', 'Duis quos voluptatem', 'chennai', '../uploads/2cdpt79.jpg', '2023-04-09 17:15:34', '2023-04-09 17:15:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
