-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2023 at 07:27 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `management`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `aaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `college_name`, `branch`, `aaded_at`) VALUES
(1, 'IIT', 'Delhi', '2023-03-06 07:59:43'),
(2, 'IIT', 'Mumbai', '2023-03-06 08:00:02'),
(3, 'IIT', 'Roorkee', '2023-03-06 08:00:13'),
(4, 'IIT', 'Kanpur', '2023-03-06 08:00:27'),
(5, 'NIT', 'Delhi', '2023-03-06 08:00:51'),
(6, 'NIT', 'Mumbai', '2023-03-06 08:01:05'),
(7, 'NIT', 'Kanpur', '2023-03-06 08:01:19'),
(8, 'Glocal Institute Of Technology', 'Saharanpur', '2023-03-06 08:02:12'),
(9, 'Glocal Institute Of Medical Science', 'Saharanpur', '2023-03-06 08:03:03'),
(10, 'Glocal Institute Of Aayurveda', 'Saharanpur', '2023-03-06 08:03:42'),
(11, 'college', 'delhi', '2023-03-31 11:45:33');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'CO Admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `college_id` int(11) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `added_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `college_id`, `gender`, `email`, `course`, `added_at`) VALUES
(1, 'trhrtr', 4, 'male', 'khurramgaur8@gmail.com', 'trtrh', '2023-03-06 14:06:32'),
(2, 'kamran', 2, 'male', 'kamran8@gmail.com', 'dsdgtggfghhggh', '2023-03-06 14:09:36'),
(3, 'Salman', 3, 'male', 'salman@gmail.com', 'BA', '2023-03-06 14:10:08'),
(4, 'Rihan', 4, 'male', 'rihan@gmail.com', 'LLB', '2023-03-06 14:11:20'),
(5, 'Shahrukh', 4, 'male', 'khurramgaur8@gmail.com', 'Btech', '2023-03-06 14:13:23'),
(6, 'Rohan Charan', 5, 'male', 'rohancharan@gmail.com', 'BCOM', '2023-03-06 14:14:08'),
(7, 'Danish', 6, 'male', 'danish@gmail.com', 'BBA', '2023-03-06 14:15:04'),
(8, 'Monish', 7, 'male', 'monish@gmail.com', 'B Pharma', '2023-03-06 14:15:33'),
(9, 'Anas', 7, 'male', 'anas@gmail.com', 'BA (f)', '2023-03-06 14:16:04'),
(10, 'Saddam', 9, 'male', 'saddam@gmail.com', 'BUMS', '2023-03-06 14:16:27'),
(11, 'Aditi', 10, 'female', 'aditi@gmail.com', 'MBBS', '2023-03-06 14:16:49'),
(13, 'Aarushi', 7, 'female', 'aarushi@gmail.com', 'B.Tech', '2023-03-06 14:21:50'),
(14, 'Chloe', 8, 'female', 'chloe@gmail.com', 'B.com', '2023-03-06 14:23:02'),
(15, 'Lucifer Morning Star', 1, 'male', 'lucifermorningstar@gmail.com', 'World', '2023-03-06 14:24:44'),
(16, 'The Devil', 5, 'male', 'thedevil@gmail.com', 'Hell', '2023-03-06 15:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `college_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `role_id` int(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cpassword` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `college_id`, `email`, `phone`, `gender`, `role_id`, `password`, `cpassword`, `created_at`) VALUES
(1, 'Khurram Gaur', 0, 'shahkhurram@gmail.com', '08126364389', 'male', 1, '827ccb0eea8a706c4c34a16891f84e7b', '', '2023-03-06 19:03:25'),
(2, 'Khurram Gaur', 1, 'shahkhurram@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 19:06:11'),
(3, 'Zainab', 10, 'shahkhurram@gmail.com', '08126364389', 'female', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:40:01'),
(4, 'Vaibhav', 9, 'vaibhav@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:40:43'),
(5, 'Shahbaaz', 8, 'khurramgaur8@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:41:13'),
(6, 'Shubham', 7, 'shahkhurram@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:41:37'),
(7, 'Priya', 2, 'priya@gmail.com', '08126364389', 'female', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:43:01'),
(8, 'Rahul', 3, 'shahkhurram@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:43:25'),
(9, 'Ashwani', 5, 'ashwani@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:44:08'),
(10, 'Salman', 4, 'salman@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:45:35'),
(11, 'Atikur', 6, 'atikur@gmail.com', '08126364389', 'male', 2, '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '2023-03-06 23:46:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
