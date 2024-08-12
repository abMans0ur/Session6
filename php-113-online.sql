-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 09:09 PM
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
-- Database: `php-113-online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'ali', 'ali@ali.com', '$2y$10$x.q0p1u3fabPRJd8.LsMxuEdCBlbU/iDL3BVZfOtUUYWi5s4RBwyu'),
(2, 'abdallah', 'abdallah@abdallah.com', '$2y$10$oALrVvNDgFis/M.kGtGnre4SuWmosZU.ntCBDSTSpshmAo5ALZ8jO');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`) VALUES
(1, 'php', 'web'),
(2, 'python', 'data analysis'),
(3, 'flutter', 'mobile'),
(4, 'Swift', 'IOS'),
(5, '', ''),
(6, 'flutter', 'Dart'),
(7, 'flutter', 'Dart'),
(8, 'flutter', 'Dart'),
(9, 'JAVA', 'DESKTOP APPS'),
(10, 'JAVA', 'DESKTOP APPS'),
(11, 'C++', 'desktop application'),
(12, 'C++', 'desktop application');

-- --------------------------------------------------------

--
-- Table structure for table `courses_images`
--

CREATE TABLE `courses_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://placehold.co/400',
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses_images`
--

INSERT INTO `courses_images` (`id`, `image`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/courses/ps.jpg', 10, '2024-08-12 17:55:16', '2024-08-12 17:55:16'),
(2, 'uploads/courses/three.jpeg', 10, '2024-08-12 17:55:16', '2024-08-12 17:55:16'),
(3, 'uploads/courses/two.jpeg', 10, '2024-08-12 17:55:16', '2024-08-12 17:55:16'),
(4, 'uploads/courses/xbox.jpg', 10, '2024-08-12 17:55:16', '2024-08-12 17:55:16'),
(5, 'uploads/courses/1723485528.gif', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(6, 'uploads/courses/1723485528.jpeg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(7, 'uploads/courses/1723485528.jpg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(8, 'uploads/courses/1723485528.webp', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(9, 'uploads/courses/1723485528.jpg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(10, 'uploads/courses/1723485528.jpg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(11, 'uploads/courses/1723485528.jpeg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(12, 'uploads/courses/1723485528.jpeg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(13, 'uploads/courses/1723485528.jpg', 11, '2024-08-12 17:58:48', '2024-08-12 17:58:48'),
(14, 'uploads/courses/66ba4e2f79a66.gif', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(15, 'uploads/courses/66ba4e2f7a84c.jpeg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(16, 'uploads/courses/66ba4e2f7b28e.jpg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(17, 'uploads/courses/66ba4e2f7bc85.webp', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(18, 'uploads/courses/66ba4e2f7f57b.jpg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(19, 'uploads/courses/66ba4e2f802ec.jpg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(20, 'uploads/courses/66ba4e2f82647.jpeg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(21, 'uploads/courses/66ba4e2f83109.jpeg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23'),
(22, 'uploads/courses/66ba4e2f83b51.jpg', 12, '2024-08-12 18:02:23', '2024-08-12 18:02:23');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://placehold.co/400',
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `image`, `course_id`) VALUES
(1, 'Ahmed MoHamed', 'ahmed12@ahmed.com', 'https://placehold.co/400', 1),
(6, 'Mohamed', 'Mohamed@mohamed.com', 'https://placehold.co/400', 2),
(7, 'hemdan', 'hemdan@hemdan.com', 'https://placehold.co/400', 4),
(8, 'zaki', 'omar12@omar.com', 'https://placehold.co/400', 3),
(9, 'Abdelrahman', 'Abdelrahman@gmail.com', 'https://placehold.co/400', 1),
(14, 'test', 'test@test.com', 'https://placehold.co/400', 1),
(15, 'asd', 'asd@sad.com', 'https://placehold.co/400', 1),
(16, 'test', 'qwe@asd.com', 'https://placehold.co/400', 4),
(17, 'cat', 'cat@cat.com', 'uploads/cat.jpg', 3),
(22, 'ahedm', 'ahmed@asdmasod.com', 'https://placehold.co/400', 1),
(23, 'test', 'test@asd.com', 'uploads/logo1.webp', 1),
(24, 'zxczxc', 'zxccxzczx@zcxzc.com', 'uploads/logo1.webp', 1),
(25, 'asd', 'asdsdasda@dadasdsa.com', 'uploads/cat.jpg', 1),
(26, 'test', 'testt@test.com', 'uploads/4652430.jpg', 3),
(27, 'test', 'wqe@qwe.com', 'uploads/1723059709.gif', 1),
(28, 'tree1', 'tree@tree.com', 'uploads/1723060240.jpeg', 3),
(29, 'ahmed', 'ahmed@ahmed.com', 'https://placehold.co/400', 1),
(32, 'ahmed', 'ahmed12123@ahmed.com', 'https://placehold.co/400', 1),
(34, 'asd', 'asd@aszxqwe.com', 'https://placehold.co/400', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_images`
--
ALTER TABLE `courses_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `courses_images`
--
ALTER TABLE `courses_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses_images`
--
ALTER TABLE `courses_images`
  ADD CONSTRAINT `courses_images_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
