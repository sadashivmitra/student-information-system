-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 08, 2022 at 08:46 PM
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
-- Database: `school2`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_list`
--

CREATE TABLE `course_list` (
  `id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_list`
--

INSERT INTO `course_list` (`id`, `department_id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 2, 'BSIT', 'Bachelor of Science in Information Technology', 1, 1, '2022-01-27 10:03:25', '2022-05-08 22:02:06'),
(14, 2, 'Java', 'Java description', 1, 0, '2022-05-08 22:02:50', NULL),
(15, 2, 'HTML', 'html description', 1, 0, '2022-05-08 22:03:10', NULL),
(16, 2, 'CPP', 'cpp description', 1, 0, '2022-05-08 22:03:26', NULL),
(17, 2, 'C Programming', 'c programming description', 1, 0, '2022-05-08 22:04:04', NULL),
(18, 2, 'Python', 'python description', 1, 0, '2022-05-08 22:04:18', NULL),
(19, 2, 'AWS Cloud', 'amazon web services description', 1, 0, '2022-05-08 22:04:36', '2022-05-08 22:06:36'),
(20, 2, 'Node', 'node js description', 0, 0, '2022-05-08 22:04:58', '2022-05-09 00:08:31'),
(21, 2, 'MEAN Stack', 'mean stack description', 1, 0, '2022-05-08 22:05:16', NULL),
(22, 2, 'MERN Stack', 'mern stack desc', 1, 0, '2022-05-08 22:05:37', NULL),
(23, 2, 'Android', 'android dev description', 1, 0, '2022-05-08 22:05:59', '2022-05-09 00:08:18'),
(24, 2, 'SWIFT', 'swift programming desc', 1, 0, '2022-05-08 22:06:15', NULL),
(25, 2, 'Test', 'Test', 1, 1, '2022-05-09 00:08:44', '2022-05-09 00:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `department_list`
--

CREATE TABLE `department_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department_list`
--

INSERT INTO `department_list` (`id`, `name`, `description`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(2, 'Default', 'This is default Dept.', 1, 0, '2022-05-05 09:22:54', '2022-05-05 09:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(30) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `contact` text NOT NULL,
  `dob` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `firstname`, `lastname`, `contact`, `dob`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(3, 'Sadashiv', 'Mitra', '9877797344', '2022-05-08', 1, 0, '2022-05-08 18:43:30', NULL),
(4, 'Sadashiv', 'Mitra', '9873344459', '1991-05-17', 1, 0, '2022-05-08 21:37:44', NULL),
(5, 'Sadashiv', 'Mitra', '9877797345', '1991-05-17', 1, 0, '2022-05-08 21:39:14', NULL),
(6, 'Amit', 'Singh', '9999832468', '1987-08-01', 1, 0, '2022-05-08 21:53:08', NULL),
(7, 'Siddharth', 'kr', '8755373739', '1993-09-05', 1, 0, '2022-05-08 21:53:50', NULL),
(8, 'Shiel', ' AlE', '765638368', '1997-02-28', 0, 0, '2022-05-08 21:54:54', '2022-05-09 00:07:20'),
(9, 'Sreenivasulu', 'S', '789988688', '1975-04-04', 1, 0, '2022-05-08 21:55:21', NULL),
(10, 'Sourabh', 'Singh', '8783784784', '1998-09-05', 1, 0, '2022-05-08 21:55:52', NULL),
(11, 'Mohan', 'hp', '9887838920', '2004-09-06', 1, 0, '2022-05-08 21:56:34', '2022-05-08 22:28:25'),
(12, 'Gulzar', 'Khan', '8974937889', '1993-03-30', 1, 0, '2022-05-08 21:57:03', NULL),
(13, 'Rajeev', 'Singh', '8362479542', '1983-03-04', 1, 0, '2022-05-08 21:57:34', '2022-05-08 22:15:29'),
(14, 'Anish', 'Sinha', '9867890987', '1991-07-02', 1, 0, '2022-05-08 23:49:03', NULL),
(15, 'Sonam', 'Gupta', '45678765435', '1992-05-30', 0, 0, '2022-05-09 00:05:08', '2022-05-09 00:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_list`
--

CREATE TABLE `subscription_list` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscription_list`
--

INSERT INTO `subscription_list` (`id`, `student_id`, `course_id`, `status`, `date_created`, `date_updated`) VALUES
(8, 11, 19, 1, '2022-05-08 16:50:25', '2022-05-08 16:50:25'),
(9, 11, 15, 1, '2022-05-08 16:59:04', '2022-05-08 16:59:04'),
(10, 11, 23, 1, '2022-05-08 17:02:30', '2022-05-08 17:02:30'),
(11, 13, 16, 1, '2022-05-08 17:43:46', '2022-05-08 17:43:46'),
(12, 14, 22, 1, '2022-05-08 18:19:30', '2022-05-08 18:19:30'),
(13, 3, 18, 1, '2022-05-08 18:39:14', '2022-05-08 18:39:14');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Student Information System'),
(6, 'short_name', 'SAGE'),
(11, 'logo', 'uploads/sage-logo.png'),
(13, 'user_avatar', 'uploads/IMG_20211216_211909_2.jpg'),
(14, 'cover', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '0=not verified, 1 = verified',
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `middlename`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `status`, `date_added`, `date_updated`) VALUES
(1, 'Sadashiv', NULL, 'Mitra', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/avatar-1.png?v=1652034061', NULL, 1, 1, '2021-01-20 14:02:37', '2022-05-08 23:51:01'),
(8, 'Claire', NULL, 'Blake', 'cblake', '4744ddea876b11dcb1d169fadf494418', 'uploads/avatar-8.png?v=1643185259', NULL, 2, 1, '2022-01-26 16:20:59', '2022-01-26 16:20:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_list`
--
ALTER TABLE `course_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_id` (`department_id`);

--
-- Indexes for table `department_list`
--
ALTER TABLE `department_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_list`
--
ALTER TABLE `subscription_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcrip_csfk_1` (`course_id`),
  ADD KEY `subcrip_csfk_2` (`student_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
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
-- AUTO_INCREMENT for table `course_list`
--
ALTER TABLE `course_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `department_list`
--
ALTER TABLE `department_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subscription_list`
--
ALTER TABLE `subscription_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_list`
--
ALTER TABLE `course_list`
  ADD CONSTRAINT `course_list_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department_list` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscription_list`
--
ALTER TABLE `subscription_list`
  ADD CONSTRAINT `subcrip_csfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subcrip_csfk_2` FOREIGN KEY (`student_id`) REFERENCES `student_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
