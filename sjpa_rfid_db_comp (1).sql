-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 18, 2024 at 07:57 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sjpa_rfid_db_comp`
--

-- --------------------------------------------------------

--
-- Table structure for table `table_employees_attendance`
--

DROP TABLE IF EXISTS `table_employees_attendance`;
CREATE TABLE IF NOT EXISTS `table_employees_attendance` (
  `eattn_table_id` int NOT NULL AUTO_INCREMENT,
  `eattn_erfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `eattn_action` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `eattn_datetime` datetime NOT NULL,
  PRIMARY KEY (`eattn_table_id`),
  KEY `eattn_erfid` (`eattn_erfid`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_employees_attendance`
--

INSERT INTO `table_employees_attendance` (`eattn_table_id`, `eattn_erfid`, `eattn_action`, `eattn_datetime`) VALUES
(1, '0010251254', 'LOGGED OUT', '2023-12-14 21:56:22'),
(2, '0010251254', 'LOGGED IN', '2023-12-14 21:56:42'),
(3, '0010251254', 'LOGGED OUT', '2023-12-14 21:56:42'),
(4, '0010251254', 'LOGGED IN', '2023-12-14 22:22:53'),
(5, '0010251254', 'LOGGED OUT', '2023-12-14 22:22:53'),
(6, '0010251254', 'LOGGED IN', '2023-12-14 22:24:07'),
(7, '0010251254', 'LOGGED OUT', '2023-12-14 22:24:07'),
(8, '0010251254', 'LOGGED IN', '2023-12-14 22:24:30'),
(9, '0010251254', 'LOGGED OUT', '2023-12-14 22:24:30'),
(10, '0010251254', 'LOGGED IN', '2023-12-14 22:25:59'),
(11, '0010251254', 'LOGGED OUT', '2023-12-14 22:25:59'),
(12, '0010251254', 'LOGGED IN', '2023-12-14 22:26:55'),
(13, '0010251254', 'LOGGED OUT', '2023-12-14 22:26:55'),
(14, '0010251254', 'LOGGED IN', '2023-12-14 22:27:23'),
(15, '0010251254', 'LOGGED OUT', '2023-12-14 22:27:23'),
(16, '0010251254', 'LOGGED IN', '2023-12-14 22:29:07'),
(17, '0010251254', 'LOGGED OUT', '2023-12-14 22:29:07'),
(18, '0010251254', 'LOGGED OUT', '2023-12-14 22:29:18'),
(19, '0010251254', 'LOGGED IN', '2023-12-14 22:30:38'),
(20, '0010251254', 'LOGGED OUT', '2023-12-14 22:30:38'),
(21, '0010251254', 'LOGGED IN', '2023-12-14 22:31:10'),
(22, '0010251254', 'LOGGED OUT', '2023-12-14 22:31:10'),
(23, '0010251254', 'LOGGED IN', '2023-12-14 22:32:51'),
(24, '0010251254', 'LOGGED IN', '2023-12-14 22:32:52'),
(25, '0010251254', 'LOGGED IN', '2023-12-14 22:32:52'),
(26, '0010251254', 'LOGGED IN', '2023-12-14 22:32:52'),
(27, '0010251254', 'LOGGED IN', '2023-12-14 22:33:03'),
(28, '0010251254', 'LOGGED OUT', '2023-12-14 22:35:19'),
(29, '0010251254', 'LOGGED OUT', '2023-12-14 22:35:35'),
(30, '0010251254', 'LOGGED IN', '2023-12-14 22:35:49'),
(31, '0010251254', 'LOGGED OUT', '2023-12-14 22:36:06'),
(32, '0010251254', 'LOGGED IN', '2023-12-14 22:36:34'),
(33, '0010251254', 'LOGGED IN', '2023-12-14 22:36:48'),
(34, '0010251254', 'LOGGED IN', '2023-12-14 22:40:49'),
(35, '0010251254', 'LOGGED IN', '2023-12-14 22:40:54'),
(36, '0010251254', 'LOGGED IN', '2023-12-14 22:41:53'),
(37, '0010251254', 'LOGGED IN', '2023-12-14 22:43:46'),
(38, '0010251254', 'LOGGED IN', '2023-12-14 22:44:58'),
(39, '0010251254', 'LOGGED IN', '2023-12-14 22:46:20'),
(40, '0010251254', 'LOGGED OUT', '2023-12-14 23:55:44'),
(41, '0010251254', 'LOGGED IN', '2023-12-15 14:00:40'),
(42, '0010251254', 'LOGGED IN', '2023-12-15 14:04:19'),
(43, '0010251254', 'LOGGED IN', '2023-12-15 14:04:24'),
(44, '0010251254', 'LOGGED IN', '2023-12-15 14:05:52'),
(45, '0010251254', 'LOGGED IN', '2023-12-15 14:06:01'),
(46, '0010251254', 'LOGGED IN', '2023-12-15 14:06:18'),
(47, '0010251254', 'LOGGED IN', '2023-12-15 14:06:39'),
(48, '0010251254', 'LOGGED IN', '2023-12-15 14:19:13'),
(49, '0010251254', 'LOGGED IN', '2023-12-15 14:19:29'),
(50, '0010251254', 'LOGGED IN', '2023-12-15 14:19:50'),
(51, '0010251254', 'LOGGED IN', '2023-12-15 14:20:10'),
(52, '0010251254', 'LOGGED IN', '2023-12-15 14:22:01'),
(53, '0010251254', 'LOGGED IN', '2023-12-15 14:22:10'),
(54, '0010251254', 'LOGGED IN', '2023-12-15 14:22:24'),
(55, '0010251254', 'LOGGED IN', '2023-12-15 14:22:39'),
(56, '0010251254', 'LOGGED IN', '2023-12-15 14:23:02'),
(57, '0010251254', 'LOGGED IN', '2023-12-15 14:24:41'),
(67, '001224567', 'LOGGED IN', '2023-12-19 13:58:56'),
(70, '001224567', 'LOGGED IN', '2024-01-29 21:01:35'),
(71, '001224567', 'LOGGED OUT', '2024-01-29 21:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `table_employees_current_status`
--

DROP TABLE IF EXISTS `table_employees_current_status`;
CREATE TABLE IF NOT EXISTS `table_employees_current_status` (
  `ecs_table_id` int NOT NULL AUTO_INCREMENT,
  `ecs_erfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ecs_current_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ecs_datetime` datetime NOT NULL,
  PRIMARY KEY (`ecs_table_id`),
  KEY `ecs_erfid` (`ecs_erfid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_employees_current_status`
--

INSERT INTO `table_employees_current_status` (`ecs_table_id`, `ecs_erfid`, `ecs_current_status`, `ecs_datetime`) VALUES
(1, '0010251254', 'IN', '2023-12-15 14:24:41'),
(6, '001224567', 'OUT', '2024-01-29 21:01:40');

-- --------------------------------------------------------

--
-- Table structure for table `table_employee_info`
--

DROP TABLE IF EXISTS `table_employee_info`;
CREATE TABLE IF NOT EXISTS `table_employee_info` (
  `employee_table_id` int NOT NULL AUTO_INCREMENT,
  `employee_rfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_department` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `employee_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`employee_table_id`),
  UNIQUE KEY `employee_id` (`employee_id`),
  KEY `employee_rfid` (`employee_rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_employee_info`
--

INSERT INTO `table_employee_info` (`employee_table_id`, `employee_rfid`, `employee_id`, `employee_name`, `employee_department`, `employee_position`, `employee_email`, `employee_number`, `employee_img`) VALUES
(1, '0010251254', '0123456789', 'sample employee name', 'sample department', 'sample position / sample position 2', 'sampleemail@gmail.com', '9682176523', 'https://randomwordgenerator.com/img/picture-generator/53e3d342435baa14f1dc8460962e33791c3ad6e04e507440762673d69148cd_640.jpg'),
(6, '001224567', '001', 'Dela Cruz, John A', 'FA', 'Assistant Teacher', 'delacruz@gmail.com', '927-553-0189', 'blank_img.png');

-- --------------------------------------------------------

--
-- Table structure for table `table_rfid`
--

DROP TABLE IF EXISTS `table_rfid`;
CREATE TABLE IF NOT EXISTS `table_rfid` (
  `rfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rfid_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `rfid_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`rfid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_rfid`
--

INSERT INTO `table_rfid` (`rfid`, `rfid_type`, `rfid_status`) VALUES
('0010251254', 'E', 'E'),
('0010253177', 'S', 'E'),
('001224567', 'E', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `table_students_attendance`
--

DROP TABLE IF EXISTS `table_students_attendance`;
CREATE TABLE IF NOT EXISTS `table_students_attendance` (
  `sattn_table_id` int NOT NULL AUTO_INCREMENT,
  `sattn_srfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sattn_action` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sattn_datetime` datetime NOT NULL,
  PRIMARY KEY (`sattn_table_id`),
  KEY `sattn_srfid` (`sattn_srfid`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students_attendance`
--

INSERT INTO `table_students_attendance` (`sattn_table_id`, `sattn_srfid`, `sattn_action`, `sattn_datetime`) VALUES
(1, '0010253177', 'LOGGED IN', '2023-12-19 14:15:00'),
(2, '0010253177', 'LOGGED IN', '2023-12-19 14:15:11'),
(3, '0010253177', 'LOGGED OUT', '2023-12-19 14:15:28'),
(4, '0010253177', 'LOGGED IN', '2023-12-19 20:13:47'),
(5, '0010253177', 'LOGGED IN', '2023-12-19 20:16:26'),
(6, '0010253177', 'LOGGED IN', '2023-12-19 20:22:27'),
(7, '0010253177', 'LOGGED IN', '2023-12-19 20:23:09'),
(8, '0010253177', 'LOGGED IN', '2023-12-19 20:23:19'),
(9, '0010253177', 'LOGGED IN', '2023-12-19 20:27:42'),
(10, '0010253177', 'LOGGED IN', '2023-12-19 21:45:07'),
(11, '0010253177', 'LOGGED IN', '2023-12-19 21:47:53'),
(12, '0010253177', 'LOGGED IN', '2023-12-19 21:48:03'),
(13, '0010253177', 'LOGGED IN', '2023-12-29 18:34:33'),
(17, '0010253177', 'LOGGED IN', '2023-12-29 19:15:30'),
(23, '0010253177', 'LOGGED IN', '2024-01-12 01:31:10'),
(24, '0010253177', 'LOGGED IN', '2024-02-18 15:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `table_students_current_status`
--

DROP TABLE IF EXISTS `table_students_current_status`;
CREATE TABLE IF NOT EXISTS `table_students_current_status` (
  `scs_table_id` int NOT NULL AUTO_INCREMENT,
  `scs_srfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `scs_current_status` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `scs_datetime` datetime NOT NULL,
  PRIMARY KEY (`scs_table_id`),
  KEY `scs_srfid` (`scs_srfid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students_current_status`
--

INSERT INTO `table_students_current_status` (`scs_table_id`, `scs_srfid`, `scs_current_status`, `scs_datetime`) VALUES
(1, '0010253177', 'IN', '2024-02-18 15:44:48');

-- --------------------------------------------------------

--
-- Table structure for table `table_students_info`
--

DROP TABLE IF EXISTS `table_students_info`;
CREATE TABLE IF NOT EXISTS `table_students_info` (
  `student_table_id` int NOT NULL AUTO_INCREMENT,
  `student_rfid` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_grade_section` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_guardian_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_guardian_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_guardian_number` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `student_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`student_table_id`),
  KEY `student_rfid` (`student_rfid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `table_students_info`
--

INSERT INTO `table_students_info` (`student_table_id`, `student_rfid`, `student_id`, `student_name`, `student_grade_section`, `student_guardian_name`, `student_guardian_email`, `student_guardian_number`, `student_img`) VALUES
(1, '0010253177', '0111111', 'sample student', 'sample grade section', 'sample', 'pequejulette012702@gmail.com', '9682176523', 'Image_JAP.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_employees_attendance`
--
ALTER TABLE `table_employees_attendance`
  ADD CONSTRAINT `table_employees_attendance_ibfk_1` FOREIGN KEY (`eattn_erfid`) REFERENCES `table_employee_info` (`employee_rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_employees_current_status`
--
ALTER TABLE `table_employees_current_status`
  ADD CONSTRAINT `table_employees_current_status_ibfk_1` FOREIGN KEY (`ecs_erfid`) REFERENCES `table_employee_info` (`employee_rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_employee_info`
--
ALTER TABLE `table_employee_info`
  ADD CONSTRAINT `table_employee_info_ibfk_1` FOREIGN KEY (`employee_rfid`) REFERENCES `table_rfid` (`rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_students_attendance`
--
ALTER TABLE `table_students_attendance`
  ADD CONSTRAINT `table_students_attendance_ibfk_1` FOREIGN KEY (`sattn_srfid`) REFERENCES `table_students_info` (`student_rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_students_current_status`
--
ALTER TABLE `table_students_current_status`
  ADD CONSTRAINT `table_students_current_status_ibfk_1` FOREIGN KEY (`scs_srfid`) REFERENCES `table_students_info` (`student_rfid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `table_students_info`
--
ALTER TABLE `table_students_info`
  ADD CONSTRAINT `table_students_info_ibfk_1` FOREIGN KEY (`student_rfid`) REFERENCES `table_rfid` (`rfid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
