-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2017 at 02:56 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `astrid`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` varchar(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
('jOGpPn5f2jc', 'Astrid Technologies');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `employee_number` varchar(20) DEFAULT NULL,
  `sss_no` int(11) DEFAULT NULL,
  `tin_no` int(11) DEFAULT NULL,
  `phil_health` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `employee_number`, `sss_no`, `tin_no`, `phil_health`, `user_id`) VALUES
(1, NULL, 123, 12322, 123, 2),
(2, NULL, 11, 0, 0, 4),
(3, NULL, 123, 0, 0, 10),
(30, NULL, NULL, NULL, NULL, 56),
(31, '', 123, 123, 123, 1),
(32, NULL, NULL, NULL, NULL, 57),
(33, NULL, NULL, NULL, NULL, 58),
(34, NULL, NULL, NULL, NULL, 59),
(35, NULL, NULL, NULL, NULL, 60),
(36, NULL, NULL, NULL, NULL, 61);

-- --------------------------------------------------------

--
-- Table structure for table `expense_classification`
--

CREATE TABLE `expense_classification` (
  `id` int(11) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `allowance_per_user` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `budget` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_classification`
--

INSERT INTO `expense_classification` (`id`, `classification`, `allowance_per_user`, `created_at`, `budget`) VALUES
(1, 'Transporation', 1000.00, '2017-09-15 14:25:01', 5000.00),
(2, 'Communication', 550.00, '2017-09-15 14:27:52', 2000.00),
(3, 'Technology', 2500.00, '2017-09-15 15:27:22', 3000.00),
(4, 'Clothing', 1000.00, '2017-09-18 03:41:40', 2000.00),
(6, 'Dental', 500.00, '2017-09-18 06:04:08', 1000.00),
(7, 'Optical', 500.00, '2017-12-12 02:18:02', 10000.00),
(8, 'Medical', 25000.00, '2017-12-12 02:20:10', 250000.00),
(9, 'Laptop', 3000.00, '2017-12-12 07:37:54', 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `expense_reimbursement`
--

CREATE TABLE `expense_reimbursement` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(5) DEFAULT NULL,
  `classification_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `receipt` tinyint(2) DEFAULT NULL,
  `amount` float(8,2) NOT NULL,
  `receipt_img` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_reimbursement`
--

INSERT INTO `expense_reimbursement` (`id`, `user_id`, `status`, `classification_id`, `created_at`, `updated_at`, `receipt`, `amount`, `receipt_img`) VALUES
(1, 1, 0, 2, '2017-09-16 01:38:09', '2017-09-17 00:35:25', 0, 500.00, 'noimage.png'),
(2, 1, 1, 3, '2017-09-16 01:45:57', '2017-09-16 14:13:29', 1, 500.00, 'd73fea79538f29d3f3b4038e43729a18.jpg'),
(3, 2, 0, 3, '2017-09-16 02:00:32', '2017-09-17 00:35:17', 0, 500.00, 'noimage.png'),
(4, 1, 1, 1, '2017-09-17 00:10:35', '2017-09-17 00:10:43', 0, 1000.00, 'noimage.png'),
(5, 1, 1, 1, '2017-09-17 00:27:58', '2017-09-17 00:28:11', 0, 200.00, 'noimage.png'),
(6, 1, 1, 1, '2017-09-17 00:30:23', '2017-09-17 00:30:28', 0, 500.00, 'noimage.png'),
(7, 1, 1, 1, '2017-09-17 00:36:00', '2017-09-17 00:36:05', 0, 500.00, 'noimage.png'),
(8, 1, 1, 3, '2017-09-17 09:53:05', '2017-09-17 09:53:17', 0, 1000.00, 'noimage.png'),
(9, 12, 1, 6, '2017-09-25 03:01:59', '2017-09-25 03:02:29', 0, 123.00, 'noimage.png'),
(10, 14, 1, 3, '2017-11-19 03:36:38', '2017-11-19 03:36:58', 0, 1000.00, 'noimage.png'),
(11, 12, 1, 2, '2017-12-12 07:10:03', '2017-12-12 07:26:48', 0, 400.00, 'noimage.png'),
(12, 12, 1, 4, '2017-12-12 07:26:22', '2017-12-12 07:26:46', 0, 200.00, 'noimage.png');

-- --------------------------------------------------------

--
-- Table structure for table `expense_users`
--

CREATE TABLE `expense_users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `transporation` float(8,2) DEFAULT NULL,
  `communication` float(8,2) DEFAULT NULL,
  `technology` float(8,2) DEFAULT NULL,
  `allowance_update` date DEFAULT NULL,
  `clothing` float(8,2) DEFAULT NULL,
  `dental` float(8,2) DEFAULT NULL,
  `optical` float(8,2) DEFAULT NULL,
  `medical` float(8,2) DEFAULT NULL,
  `laptop` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_users`
--

INSERT INTO `expense_users` (`id`, `firstname`, `lastname`, `middlename`, `profile_picture`, `email`, `password`, `pos_id`, `status`, `created_at`, `updated_at`, `transporation`, `communication`, `technology`, `allowance_update`, `clothing`, `dental`, `optical`, `medical`, `laptop`) VALUES
(1, 'Erin', 'Rugas', '', 'no_image.jpg', 'ejr012495@gmail.com', '$2y$11$oLgjrpJrYrBGDpaayjCvseokuBQJVtNOTTLgELutjqaeCM2sx0qUG', 1, 1, '2017-09-14 07:24:04', '2017-12-12 08:03:19', 0.00, 550.00, 1500.00, '2017-09-16', 1000.00, 500.00, 500.00, 25000.00, 3000.00),
(2, 'Sample', 'Sample', '', 'no_image.jpg', 'sample@gmail.com', '$2y$11$32w2kHROwA3drnzz67ID..Kk69SElqGOqnk5T4OzaQfbnKiVhDzYy', 1, 1, '2017-09-15 14:26:03', '2017-12-12 08:03:19', 1000.00, 550.00, 2500.00, '2017-09-16', 1000.00, 500.00, 500.00, 25000.00, 3000.00),
(11, 'Emplyoee', 'Employee', '', 'no_image.jpg', 'employee@mail.com', '$2y$11$G0QbSiQaXlBymhL4RnjCDOtz/zkITsd4lyrvsEkJwqi0FVOgdn9m6', 2, 1, '2017-09-17 00:51:27', '2017-12-12 08:03:19', 1000.00, 550.00, 2500.00, NULL, 1000.00, 500.00, 500.00, 25000.00, 3000.00),
(12, 'Human', 'Resource', '', '2b3a209e28789c89ab338caf1bf787aa.jpg', 'hr@gmail.com', '$2y$11$d9xN0gBIU0EKwpEa6LbFa.MpsasLvLm.0WSIBNUCgEvHAERzflDfG', 3, 1, '2017-09-17 00:51:49', '2017-12-12 08:03:19', 1000.00, 150.00, 2500.00, NULL, 1000.00, 377.00, 500.00, 25000.00, 3000.00),
(13, 'Test', 'Test', '', 'no_image.jpg', 'test@mail.com', '$2y$11$78BUM24zg0jM1j/oaq5mS./Esr3lZWfhy2MX100aUdv.Nl0uB75yG', 2, 0, '2017-09-17 09:49:07', '2017-12-12 08:03:19', 1000.00, 550.00, 2500.00, NULL, 1000.00, 500.00, 500.00, 25000.00, 3000.00),
(14, 'Martin', 'Lizardo', '', 'f0f54e6daeda88bce7f5c034f10f40f0.PNG', 'martslizardo@gmail.com', '$2y$11$ygDuXphegBNwyNos359oUuSQ/PW7qPW9XPBpyv69QYHDBpiT3VQjK', 2, 1, '2017-11-19 03:32:58', '2017-12-12 08:03:19', 1000.00, 550.00, 1500.00, NULL, 1000.00, 500.00, 500.00, 25000.00, 3000.00);

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `school` varchar(255) DEFAULT NULL,
  `no_of_hrs` int(11) NOT NULL,
  `course` varchar(150) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `remaining` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`id`, `user_id`, `school`, `no_of_hrs`, `course`, `birthday`, `year`, `remaining`) VALUES
(1, 3, 'USTs', 250, 'BSITWMA', '2017-05-06', '2017-2018', '231'),
(2, 5, 'Feu', 250, 'Feu-it', '2017-10-10', '2017-2018', '242'),
(3, 6, '123213', 2, 'Bsit', '0000-00-00', 'asd', '2'),
(6, 9, NULL, 520, NULL, NULL, NULL, '520');

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `privileges` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `privilege_sub_menu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`id`, `name`, `privileges`, `created_at`, `updated_at`, `privilege_sub_menu`) VALUES
(1, 'Admin', '1,2,3,4,5,6,7,8', '2017-08-22 02:02:42', '2017-10-11 23:11:15', '1,2,3,4,5,6,7,8'),
(2, 'Employee', '1,3,7', '2017-08-22 02:02:55', '2017-10-25 09:14:08', '2,3,4,5,6'),
(3, 'Human Resource', '1,2,3,4,5,6,7', '2017-08-22 05:02:01', '2017-10-11 23:20:23', '1,2,3,4,5,6,7'),
(4, 'Intern', '1,3,7', '2017-08-22 05:18:24', '2017-10-11 23:19:56', '3'),
(11, 'Manager', '1,2,3,4,5,7', '2017-09-01 05:40:00', '2017-10-11 23:20:32', NULL),
(14, 'Project Head', '1,3,7', '2017-10-08 17:10:55', '2017-10-11 23:20:02', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resume_employees`
--

CREATE TABLE `resume_employees` (
  `id` int(11) UNSIGNED NOT NULL,
  `sss` varchar(100) DEFAULT NULL,
  `tin` varchar(100) DEFAULT NULL,
  `philhealth` varchar(100) DEFAULT NULL,
  `pagibig` varchar(100) DEFAULT NULL,
  `record_id` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume_employees`
--

INSERT INTO `resume_employees` (`id`, `sss`, `tin`, `philhealth`, `pagibig`, `record_id`, `created_at`, `updated_at`) VALUES
(11, '444', '333334', '4444', '4444', 'EMPQ5dwhroJ', '2017-11-05 07:08:12', '2017-11-06 06:30:22'),
(12, '444', '3333346', '4444', '4444', 'EMP6R6gBTBy', '2017-11-05 08:31:35', '2017-11-06 06:31:37'),
(13, '1231232', '55555', '31232', '12321', 'EMPOQCfW6kP', '2017-11-06 06:52:04', '2017-11-06 06:54:04'),
(14, NULL, NULL, NULL, NULL, 'EMPX6CHLgAd', '2017-11-08 07:05:28', '2017-11-08 07:05:28'),
(15, NULL, NULL, NULL, NULL, 'EMPb8azkEUM', '2017-11-16 03:09:24', '2017-11-16 03:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `resume_position`
--

CREATE TABLE `resume_position` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume_position`
--

INSERT INTO `resume_position` (`id`, `name`) VALUES
(1, 'Employee'),
(2, 'Intern'),
(3, 'Freelance');

-- --------------------------------------------------------

--
-- Table structure for table `resume_record`
--

CREATE TABLE `resume_record` (
  `id` varchar(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `school` varchar(200) NOT NULL,
  `application_date` date DEFAULT NULL,
  `role_id` varchar(11) NOT NULL,
  `pos_id` int(11) UNSIGNED DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `comment` text,
  `home_address` text NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `date_hired` date DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `images` varchar(255) DEFAULT NULL,
  `available_date` date DEFAULT NULL,
  `interviewer` varchar(100) DEFAULT NULL,
  `interview_notes` text,
  `exam_result` tinyint(4) DEFAULT NULL,
  `interview_result` tinyint(4) DEFAULT NULL,
  `current_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `interview_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume_record`
--

INSERT INTO `resume_record` (`id`, `first_name`, `last_name`, `middle_name`, `degree`, `school`, `application_date`, `role_id`, `pos_id`, `email`, `comment`, `home_address`, `phone_number`, `birthday`, `date_hired`, `file`, `images`, `available_date`, `interviewer`, `interview_notes`, `exam_result`, `interview_result`, `current_status`, `created_at`, `updated_at`, `interview_date`) VALUES
('EMP6R6gBTBy', 'John', 'Nadal', 'Adsadsad', '12321321', '12321', '2017-11-16', 'RLEEeBo0IBm', 1, 'john@123', '12321321', '12321', '12312321', '2017-11-03', '2017-11-08', 'AdaSamples23.pdf', 'facebook-avatar70.jpg', '2017-11-27', NULL, NULL, NULL, NULL, 'Active', '2017-11-05 07:16:18', '2017-11-06 07:33:41', '0000-00-00'),
('EMPb8azkEUM', 'Asdasdasdasdsa', 'Asdasdasdsa', 'Asdsaddsa', '4444', '1231221', '2017-11-06', 'RLEIxnVxu6a', 1, 'mmm@com', 'Ggggg', '2131221', '213123213213', '2017-11-09', '2017-11-16', 'AdaSamples25.pdf', NULL, '2017-11-23', NULL, NULL, NULL, NULL, 'Active', '2017-11-10 01:32:04', '2017-11-16 03:09:24', '2017-11-10'),
('EMPOQCfW6kP', 'Christian', 'Dalan', 'ASDAS', '12312321', '123212', NULL, 'RLEEeBo0IBm', 1, 'christian.dalan@astridtechnologies.com', '12321', '123213213', '111', '2008-02-01', NULL, NULL, 'facebook-avatar68.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2017-11-06 06:52:04', '2017-11-06 06:52:20', '0000-00-00'),
('EMPQ5dwhroJ', 'Martin', 'Lizardo', 'Asdasdsa', '2131232', '1231232', NULL, 'RLEEeBo0IBm', 1, '312312312@gmail.com', '123213', '123123', '1321321', '2017-11-03', '2017-11-03', NULL, 'bsu4.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2017-11-05 07:08:12', '2017-11-06 06:17:15', '0000-00-00'),
('EMPX6CHLgAd', 'Von Vincent', 'Sison', 'Asd', '12312', 'FEU', '2017-11-10', 'RLEoMmCRtUZ', 1, 'von@gmail.com', '12321321', '13123213', '44444', '0001-02-12', '2017-11-08', 'AdaSamples23.pdf', NULL, '2017-11-13', NULL, NULL, NULL, NULL, 'Active', '2017-11-08 07:03:40', '2017-11-08 07:05:28', '0000-00-00'),
('FLNnfh41ZQy', 'Katrina', 'Delfin', 'Asdsad', '13123', '213213', NULL, 'RLEhX2UMarl', 3, 'kat@delfin', '12321321', '12321', '12321321', '2017-11-02', NULL, NULL, 'bsu5.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2017-11-05 07:10:48', '2017-11-05 07:10:48', '0000-00-00'),
('IRN5MFwAaya', 'Nathan', 'Abriol', 'Asdasd', '21321', '2132131', NULL, 'RLEbxwJsx41', 2, '21312@gmail.com', '2131232', '12321', '213213', '2017-11-09', NULL, NULL, 'bsu7.jpg', NULL, NULL, NULL, NULL, NULL, 'Active', '2017-11-05 07:14:39', '2017-11-05 07:14:39', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `resume_role`
--

CREATE TABLE `resume_role` (
  `role_id` varchar(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pos_id` int(11) UNSIGNED NOT NULL,
  `status` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `resume_role`
--

INSERT INTO `resume_role` (`role_id`, `name`, `pos_id`, `status`, `created_at`, `updated_at`) VALUES
('RLE5QIwok5e', 'PHP Developer', 1, 0, '2017-11-07 04:49:10', '2017-12-07 01:58:37'),
('RLE6k4NGoPy', 'Graphics Designer', 2, 1, '2017-11-07 06:22:14', '2017-12-06 16:57:37'),
('RLE9LEtzG4u', 'Asd', 1, 0, '2017-11-09 13:06:03', '2017-12-07 01:58:38'),
('RLEBGhlWDYs', 'Ggg', 2, 1, '2017-11-08 06:14:13', '2017-12-06 16:57:37'),
('RLEbxwJsx41', 'Ruby On Rails Developer', 2, 1, '2017-11-05 07:10:04', '2017-12-06 16:57:37'),
('RLECzBypHPd', 'Aaaa', 1, 0, '2017-11-09 13:22:18', '2017-12-07 01:58:39'),
('RLEEeBo0IBm', 'Java Developer', 1, 1, '2017-11-05 06:52:59', '2017-12-06 16:57:37'),
('RLEfnX50JG4', 'Bbbb', 2, 1, '2017-11-09 13:22:33', '2017-12-06 16:57:37'),
('RLEhh6lCuc3', 'Software Engineer', 2, 1, '2017-11-07 06:23:21', '2017-12-06 16:57:37'),
('RLEhX2UMarl', 'Data Researcher', 3, 1, '2017-11-05 07:09:10', '2017-12-06 16:57:37'),
('RLEIxnVxu6a', 'Android Dev', 1, 1, '2017-11-08 03:10:14', '2017-12-06 16:57:37'),
('RLEj9PBRj8A', 'Asda', 1, 1, '2017-11-08 05:55:34', '2017-12-06 16:57:37'),
('RLEK7P5co9O', 'Ruby On Rails', 1, 1, '2017-11-07 04:27:13', '2017-12-06 16:57:37'),
('RLElLJ0THoK', 'Rrr', 2, 1, '2017-11-09 13:10:01', '2017-12-06 16:57:37'),
('RLEN51XC6nt', 'Fff', 1, 1, '2017-11-08 06:14:05', '2017-12-06 16:57:37'),
('RLEoMmCRtUZ', 'Game Dev', 1, 1, '2017-11-08 01:39:09', '2017-12-06 16:57:37'),
('RLEpNG7yjsZ', 'Nnnnn', 2, 1, '2017-11-09 13:48:20', '2017-12-06 16:57:37'),
('RLEqVlchWX9', 'Admin', 1, 0, '2017-11-08 05:45:37', '2017-12-07 01:49:12'),
('RLEu51QiyaI', 'Sad', 1, 1, '2017-11-08 05:55:50', '2017-12-06 16:57:37'),
('RLEVAnQfYEv', 'Ssss', 3, 1, '2017-11-09 13:23:59', '2017-12-06 16:57:37'),
('RLEXCSLzwrX', 'Jjjjj', 1, 1, '2017-11-08 07:24:54', '2017-12-06 16:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_calendar_events`
--

CREATE TABLE `timekeeping_calendar_events` (
  `id` int(11) NOT NULL,
  `title` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `timekeeping_calendar_events`
--

INSERT INTO `timekeeping_calendar_events` (`id`, `title`, `start`, `end`, `description`, `user_id`) VALUES
(1, 'asdsadsadsad', '2017-10-16', '2017-10-20', 'asdadsa', 1),
(3, 'asdsad', '2017-10-09', '2017-10-10', 'asdsadsa', 1),
(4, 'test', '2017-11-01', '2017-11-01', 'test', 1),
(5, 'papaputok ako', '2018-01-01', '2018-01-01', 'bagong taon', 1);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_logs`
--

CREATE TABLE `timekeeping_logs` (
  `id` int(11) NOT NULL,
  `action` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `position` varchar(50) DEFAULT NULL,
  `ip_address` varchar(20) NOT NULL,
  `user` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_logs`
--

INSERT INTO `timekeeping_logs` (`id`, `action`, `description`, `position`, `ip_address`, `user`, `date`) VALUES
(1, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:30:13'),
(2, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:30:13'),
(3, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Intern', '2017-10-08 16:30:13'),
(4, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Intern', '2017-10-08 16:30:13'),
(5, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:30:13'),
(6, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:30:36'),
(7, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:31:17'),
(8, 'Account Access', 'Reject Overtime of Employee Emplo', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:34:08'),
(9, 'Approve Overtime', 'Approved Overtime of Employee Emplo', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:36:31'),
(10, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Hr Hr', '2017-10-08 16:40:05'),
(11, 'Account Access', 'Account Login ', 'Employee', '::1', 'Farrah Dionisios', '2017-10-08 16:41:13'),
(12, 'File Overtime', 'Filed Overtime By Farrah Dionisios', 'Employee', '::1', 'Farrah Dionisios', '2017-10-08 16:41:31'),
(13, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Farrah Dionisios', '2017-10-08 16:41:34'),
(14, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:47:03'),
(15, 'User Time-in/Time-out', 'Work From Home', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:47:10'),
(16, 'Account Modify', 'Update information of Intern Interns', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:56:32'),
(17, 'Account Modify', 'Active account of Intern Interns', 'Admin', '::1', 'Erin Rugas', '2017-10-08 16:56:45'),
(18, 'Account Modify', 'Update information of Farrah Debrah Dionisios', 'Admin', '::1', 'Erin Rugas', '2017-10-08 17:01:16'),
(19, 'Account Modify', 'Update information of Farrah Debrah Dionisios', 'Admin', '::1', 'Erin Rugas', '2017-10-08 17:01:27'),
(20, 'Account Modify', 'Update information of Farrah Debrah Dionisio', 'Admin', '::1', 'Erin Rugas', '2017-10-08 17:01:34'),
(21, 'Account Modify', 'Update profile picture', 'Admin', '::1', 'Erin Rugas', '2017-10-08 17:02:00'),
(22, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:04:47'),
(23, 'Edit Position', 'Update Position ', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:08:01'),
(24, 'Edit Position', 'Update Position Admin', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:08:25'),
(25, 'Add Position', 'Added Position ', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:09:05'),
(26, 'Add Position', 'Added Position ', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:10:29'),
(27, 'Add Position', 'Added Position Project Head', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:10:55'),
(28, 'Shift Modify', 'Edit Shift Mid', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:12:08'),
(29, 'Shift Modify', 'Edit Mid Shift', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:12:44'),
(30, 'Account Modify', 'Deactivate account of Hr Hr', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:13:07'),
(31, 'Account Modify', 'Active account of Hr Hr', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:13:23'),
(32, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:22:25'),
(33, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:22:31'),
(34, 'Edit Position', 'Update Position Human Resource', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:23:09'),
(35, 'Edit Position', 'Update Position Admin', 'Admin', '::1', 'Erin John Rugas', '2017-10-08 17:23:15'),
(36, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 02:53:13'),
(37, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 09:41:01'),
(38, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 09:57:30'),
(39, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-09 09:57:35'),
(40, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employee Emplo', '2017-10-09 09:58:01'),
(41, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 09:58:40'),
(42, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 10:11:13'),
(43, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-09 10:11:19'),
(44, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employee Emplo', '2017-10-09 10:11:24'),
(45, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 10:11:30'),
(46, 'Account Modify', 'Update information of Intern Interns', 'Admin', '::1', 'Erin John Rugas', '2017-10-09 10:58:06'),
(47, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Interns', '2017-10-09 15:50:15'),
(48, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-09 15:50:20'),
(49, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-10 00:18:31'),
(50, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Interns', '2017-10-10 00:18:38'),
(51, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-10 00:33:13'),
(52, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-10 07:52:28'),
(53, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-10 08:21:13'),
(54, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Interns', '2017-10-10 08:21:36'),
(55, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Interns', '2017-10-10 09:52:40'),
(56, 'Account Access', 'Account Login ', 'Employee', '::1', 'Farrah Debrah Dionisio', '2017-10-10 09:54:44'),
(57, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Farrah Debrah Dionisio', '2017-10-10 09:55:04'),
(58, 'Account Access', 'Account Login ', 'Intern', '::1', 'Armani Armani', '2017-10-10 09:55:10'),
(59, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Armani Armani', '2017-10-10 10:06:42'),
(60, 'Account Access', 'Account Login ', 'Intern', '::1', 'Armani Armani', '2017-10-10 10:06:50'),
(61, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Armani Armani', '2017-10-10 10:07:16'),
(62, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Interns', '2017-10-10 10:07:23'),
(63, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Interns', '2017-10-10 10:29:54'),
(64, 'Account Access', 'Account Login ', 'Intern', '::1', 'Armani Armani', '2017-10-10 10:30:06'),
(65, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Armani Armani', '2017-10-10 10:30:10'),
(66, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-10 23:15:57'),
(67, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 12:09:09'),
(68, 'Edit Position', 'Update Position Employee', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 12:09:34'),
(69, 'Edit Position', 'Update Position Employee', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 12:09:44'),
(70, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:07:13'),
(71, 'Account Modify', 'Update information of Farrah Debrah Dionisio', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:08:10'),
(72, 'Account Modify', 'Update information of Farrah Debrah Dionisio', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:08:11'),
(73, 'Edit Position', 'Update Position Admin', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:11:15'),
(74, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:11:28'),
(75, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugassss', '2017-10-11 23:11:32'),
(76, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:11:38'),
(77, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John M Rugas', '2017-10-11 23:14:15'),
(78, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:14:26'),
(79, 'Account Modify', 'Update Profile Picture', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:19:10'),
(80, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:19:18'),
(81, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Interns', '2017-10-11 23:19:26'),
(82, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Interns', '2017-10-11 23:19:33'),
(83, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:19:42'),
(84, 'Edit Position', 'Update Position Intern', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:19:56'),
(85, 'Edit Position', 'Update Position Project Head', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:20:02'),
(86, 'Edit Position', 'Update Position Employee', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:20:11'),
(87, 'Edit Position', 'Update Position Human Resource', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:20:23'),
(88, 'Edit Position', 'Update Position Manager', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:20:32'),
(89, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:20:36'),
(90, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Interns', '2017-10-11 23:20:48'),
(91, 'Account Modify', 'Update information', 'Intern', '::1', 'Intern Internss', '2017-10-11 23:25:02'),
(92, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-11 23:43:19'),
(93, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-13 08:46:55'),
(94, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin Rugas', '2017-10-13 09:02:08'),
(95, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-13 09:15:19'),
(96, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Internss', '2017-10-13 09:15:26'),
(97, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Internss', '2017-10-13 09:24:54'),
(98, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-13 09:25:00'),
(99, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-13 09:30:27'),
(100, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Internss', '2017-10-13 09:30:37'),
(101, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:21:37'),
(102, 'Account Modify', 'Update information of Armani Armani', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:22:45'),
(103, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:29:46'),
(104, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-16 03:31:41'),
(105, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employee Emplo', '2017-10-16 03:33:15'),
(106, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:34:21'),
(107, 'Add User', 'Added User Testingpic Testingpic', NULL, '::1', 'Erin Rugas', '2017-10-16 03:35:11'),
(108, 'Account Modify', 'Activate account of Testingpic Testingpic', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:35:22'),
(109, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:35:28'),
(110, 'Account Access', 'Account Login ', 'Employee', '::1', 'Testingpic Testingpic', '2017-10-16 03:35:30'),
(111, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Testingpic Testingpic', '2017-10-16 03:37:19'),
(112, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:37:24'),
(113, 'Add User', 'Added User Zzzz Aaaa', NULL, '::1', 'Erin Rugas', '2017-10-16 03:37:45'),
(114, 'Add User', 'Added User Zzzz Aaaa', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:46:38'),
(115, 'Add User', 'Added User Add Add', 'Admin', '::1', 'Erin Rugas', '2017-10-16 03:47:42'),
(116, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:24:20'),
(117, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:24:29'),
(118, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Internss', '2017-10-16 08:24:40'),
(119, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Internss', '2017-10-16 08:25:42'),
(120, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee Emplo', '2017-10-16 08:25:48'),
(121, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employee Emplo', '2017-10-16 08:25:56'),
(122, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:26:01'),
(123, 'Add User', 'Added User Asdadsadsa Asdasd', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:26:18'),
(124, 'Account Modify', 'Activate account of Add Add', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:26:54'),
(125, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:26:59'),
(126, 'Account Access', 'Account Login ', 'Project Head', '::1', 'Add Add', '2017-10-16 08:27:04'),
(127, 'Account Access', 'Account Logout ', 'Project Head', '::1', 'Add Add', '2017-10-16 08:27:10'),
(128, 'Account Access', 'Account Login ', 'Project Head', '::1', 'Add Add', '2017-10-16 08:27:42'),
(129, 'Account Access', 'Account Logout ', 'Project Head', '::1', 'Add Add', '2017-10-16 08:29:17'),
(130, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Internss', '2017-10-16 08:29:26'),
(131, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Internss', '2017-10-16 08:43:26'),
(132, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Internss', '2017-10-16 08:43:26'),
(133, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:44:11'),
(134, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:57:16'),
(135, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:58:09'),
(136, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:58:12'),
(137, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:58:39'),
(138, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:58:46'),
(139, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 08:59:14'),
(140, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:03:09'),
(141, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:03:27'),
(142, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:03:48'),
(143, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:03:58'),
(144, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:04:04'),
(145, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:05:02'),
(146, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:06:15'),
(147, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:06:26'),
(148, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:06:41'),
(149, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:07:21'),
(150, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:11:01'),
(151, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:11:17'),
(152, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:11:23'),
(153, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:11:39'),
(154, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:13:03'),
(155, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:13:40'),
(156, 'Account Modify', 'Update information of Employeesss Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:13:47'),
(157, 'Account Modify', 'Update information of Asda Asd', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:14:22'),
(158, 'Account Modify', 'Update information of Employee Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:15:39'),
(159, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:16:42'),
(160, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:16:49'),
(161, 'Account Modify', 'Update information of Employees Emplo', 'Admin', '::1', 'Erin Rugas', '2017-10-16 09:17:18'),
(162, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-16 14:16:24'),
(163, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-17 10:08:47'),
(164, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-17 10:50:50'),
(165, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employees Emplo', '2017-10-17 10:51:10'),
(166, 'File Overtime', 'Filed Overtime', 'Employee', '::1', 'Employees Emplo', '2017-10-17 10:51:24'),
(167, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employees Emplo', '2017-10-17 10:51:28'),
(168, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Internss', '2017-10-17 10:51:42'),
(169, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-17 14:49:36'),
(170, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-23 13:21:40'),
(171, 'Edit Position', 'Update Position Admin', 'Admin', '::1', 'Erin Rugas', '2017-10-23 13:21:48'),
(172, 'Edit Position', 'Update Position Employee', 'Admin', '::1', 'Erin Rugas', '2017-10-25 09:14:02'),
(173, 'Edit Position', 'Update Position Employee', 'Admin', '::1', 'Erin Rugas', '2017-10-25 09:14:08'),
(174, 'Add User', 'Added User No Of Hours No Of Hours', 'Admin', '::1', 'Erin Rugas', '2017-10-25 10:38:37'),
(175, 'Account Modify', 'Activate account of Armani Armani', 'Admin', '::1', 'Erin Rugas', '2017-10-25 10:42:10'),
(176, 'Account Modify', 'Deactivate account of Armani Armani', 'Admin', '::1', 'Erin Rugas', '2017-10-25 10:42:13'),
(177, 'Account Modify', 'Activate account of Erin Rugas', 'Admin', '::1', 'Erin Rugas', '2017-10-25 10:50:04'),
(178, 'Account Access', 'Account Login ', NULL, '::1', ' ', '2017-10-25 13:31:40'),
(179, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:38:22'),
(180, 'Add User', 'Added User Employee Employee', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:55:18'),
(181, 'Add User', 'Added User Human Resource', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:55:47'),
(182, 'Add User', 'Added User Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:56:48'),
(183, 'Account Modify', 'Activate account of Employee Employee', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:56:58'),
(184, 'Account Modify', 'Activate account of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:57:01'),
(185, 'Account Modify', 'Activate account of Human Resource', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:57:03'),
(186, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:57:10'),
(187, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Intern', '2017-10-25 13:57:18'),
(188, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Intern', '2017-10-25 13:59:34'),
(189, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 13:59:44'),
(190, 'Add User', 'Added User Intern_two Intern_two', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:01:38'),
(191, 'Account Modify', 'Activate account of Intern_two Intern_two', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:01:44'),
(192, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:01:46'),
(193, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 14:01:51'),
(194, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 14:06:17'),
(195, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern Intern', '2017-10-25 14:06:23'),
(196, 'Account Modify', 'Update information', 'Intern', '::1', 'Intern Intern', '2017-10-25 14:12:38'),
(197, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern Intern', '2017-10-25 14:12:59'),
(198, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:13:07'),
(199, 'Account Modify', 'Update profile picture', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:37:27'),
(200, 'Account Modify', 'Activate account of Employee Employee', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:52:52'),
(201, 'Account Modify', 'Activate account of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:52:55'),
(202, 'Account Modify', 'Activate account of Intern_two Intern_two', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:52:59'),
(203, 'Account Modify', 'Activate account of Human Resource', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:53:02'),
(204, 'Account Modify', 'Activate account of Erin Rugas', 'Admin', '::1', 'Erin Rugas', '2017-10-25 14:53:05'),
(205, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:08:30'),
(206, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:08:48'),
(207, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:14:36'),
(208, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:17:41'),
(209, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:18:36'),
(210, 'Account Modify', 'Update profile picture', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:19:08'),
(211, 'Account Modify', 'Update profile picture', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:20:34'),
(212, 'Account Modify', 'Update profile picture', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:20:42'),
(213, 'Account Modify', 'Update information of Interns Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:47:14'),
(214, 'Account Modify', 'Update information of Interns Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:47:15'),
(215, 'Account Modify', 'Update information of Interns Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:47:15'),
(216, 'Account Modify', 'Update information of Interns Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:47:17'),
(217, 'Account Modify', 'Update information of Interns Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:47:17'),
(218, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:48:14'),
(219, 'Account Modify', 'Update information of Intern Intern', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:49:11'),
(220, 'Account Modify', 'Update information of Intern_two Intern_two', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:54:07'),
(221, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 15:54:35'),
(222, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 15:57:27'),
(223, 'Account Modify', 'Change Password', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 15:58:33'),
(224, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 15:59:43'),
(225, 'Account Access', 'Account Login ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 15:59:51'),
(226, 'Account Modify', 'Change Password', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:00:32'),
(227, 'Account Modify', 'Change Password', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:00:47'),
(228, 'Account Modify', 'Update Profile Picture', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:05:14'),
(229, 'Account Modify', 'Update Profile Picture', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:06:18'),
(230, 'Account Modify', 'Update Profile Picture', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:06:24'),
(231, 'Account Access', 'Account Logout ', 'Intern', '::1', 'Intern_two Intern_two', '2017-10-25 16:19:23'),
(232, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin Rugas', '2017-10-25 16:19:32'),
(233, 'Account Modify', 'Update Profile Picture', 'Admin', '::1', 'Erin Rugas', '2017-10-25 16:19:41'),
(234, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-10-25 16:19:47'),
(235, 'Account Modify', 'Update information of Erin John Rugas', 'Admin', '::1', 'Erin John Rugas', '2017-10-25 16:23:07'),
(236, 'Account Modify', 'Update information of Erin John Rugas', 'Admin', '::1', 'Erin John Rugas', '2017-10-25 16:23:16'),
(237, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 02:10:37'),
(238, 'Add User', 'Added User Inten_three Inten_three', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:10:25'),
(239, 'Add User', 'Added User Intern Four Four', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:12:13'),
(240, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:27:53'),
(241, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:28:52'),
(242, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:30:59'),
(243, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:45:50'),
(244, 'Add User', 'Added User Employee_two Employee_two', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:48:14'),
(245, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-10-26 04:50:00'),
(246, 'Account Access', 'Account Login ', 'Employee', '::1', 'Employee_two Employee_two', '2017-10-26 04:50:08'),
(247, 'Account Access', 'Account Logout ', 'Employee', '::1', 'Employee_two Employee_two', '2017-10-26 04:50:13'),
(248, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-10-30 08:19:38'),
(249, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-14 08:29:47'),
(250, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-15 01:00:06'),
(251, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Human Resource', '2017-11-15 01:05:50'),
(252, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin Rugas', '2017-11-15 01:43:01'),
(253, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-15 01:44:42'),
(254, 'Add User', 'Added User Martin Lizardo', 'Human Resource', '::1', 'Human Resource', '2017-11-15 03:16:13'),
(255, 'Account Modify', 'Activate account of Martin Lizardo', 'Human Resource', '::1', 'Human Resource', '2017-11-15 03:17:22'),
(256, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Human Resource', '2017-11-15 03:17:29'),
(257, 'Account Access', 'Account Login ', 'Employee', '::1', 'Martin Lizardo', '2017-11-15 03:17:42'),
(258, 'User Time-in / Time-out', '8 Hours', 'Employee', '::1', 'Martin Lizardo', '2017-11-15 03:17:47'),
(259, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 00:59:30'),
(260, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 01:14:03'),
(261, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 01:35:56'),
(262, 'Add User', 'Added User Martin Lizardo', 'Human Resource', '::1', 'Human Resource', '2017-11-16 02:06:38'),
(263, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 02:12:27'),
(264, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 05:05:17'),
(265, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 05:42:37'),
(266, 'Account Modify', 'Deactivate account of Emplyoee Employee', 'Human Resource', '::1', 'Human Resource', '2017-11-16 05:42:55'),
(267, 'Account Modify', 'Activate account of Emplyoee Employee', 'Human Resource', '::1', 'Human Resource', '2017-11-16 05:55:48'),
(268, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-16 09:10:38'),
(269, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-16 09:10:46'),
(270, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-17 05:10:11'),
(271, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-18 09:23:53'),
(272, 'Account Modify', 'Activate account of Emplyoee Employee', 'Human Resource', '::1', 'Human Resource', '2017-11-18 09:24:07'),
(273, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-19 02:45:19'),
(274, 'Account Access', 'Account Login ', NULL, '::1', 'Human Resource', '2017-11-19 03:45:26'),
(275, 'Account Access', 'Account Login ', NULL, '::1', 'Human Resource', '2017-11-19 03:45:28'),
(276, 'Account Access', 'Account Login ', NULL, '::1', 'Human Resource', '2017-11-19 03:45:29'),
(277, 'Account Access', 'Account Login ', NULL, '::1', 'Human Resource', '2017-11-19 03:45:35'),
(278, 'Account Access', 'Account Login ', NULL, '::1', 'Human Resource', '2017-11-19 03:45:39'),
(279, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Human Resource', '2017-11-19 03:56:43'),
(280, 'Account Access', 'Account Login ', 'Human Resource', '::1', 'Human Resource', '2017-11-19 03:57:12'),
(281, 'User Time-in / Time-out', 'Work From Home', 'Human Resource', '::1', 'Human Resource', '2017-11-19 04:01:46'),
(282, 'Account Access', 'Account Logout ', 'Human Resource', '::1', 'Human Resource', '2017-11-19 04:02:03'),
(283, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-11-19 04:02:12'),
(284, 'User Time-in / Time-out', 'Work From Home', 'Admin', '::1', 'Erin John Rugas', '2017-11-19 04:02:58'),
(285, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin Johns Rugas', '2017-11-19 04:07:09'),
(286, 'Account Modify', 'Update information', 'Admin', '::1', 'Erin John Rugas', '2017-11-19 04:07:13'),
(287, 'Account Modify', 'Update Profile Picture', 'Admin', '::1', 'Erin John Rugas', '2017-11-19 04:07:20'),
(288, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-19 12:59:28'),
(289, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-11-19 14:04:05'),
(290, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-20 04:42:54'),
(291, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-11-20 04:43:07'),
(292, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-11-20 04:52:52'),
(293, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-11-28 08:54:25'),
(294, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-11-29 02:12:22'),
(295, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-12-08 07:18:21'),
(296, 'Account Access', 'Account Logout ', NULL, '::1', ' ', '2017-12-08 07:20:54'),
(297, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-08 07:27:49'),
(298, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-12-10 04:28:41'),
(299, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-10 04:28:54'),
(300, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-12-10 04:29:04'),
(301, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-10 04:29:13'),
(302, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-12-10 04:29:23'),
(303, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-14 05:42:31'),
(304, 'Add User', 'Added User Admin Admin', 'Admin', '::1', 'Erin John Rugas', '2017-12-14 05:43:23'),
(305, 'Account Modify', 'Activate account of Admin Admin', 'Admin', '::1', 'Erin John Rugas', '2017-12-14 05:43:29'),
(306, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-16 06:18:25'),
(307, 'Account Access', 'Account Login ', NULL, '172.16.30.241', ' ', '2017-12-19 05:36:32'),
(308, 'Account Access', 'Account Login ', NULL, '172.16.30.241', ' ', '2017-12-19 05:38:04'),
(309, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 05:41:09'),
(310, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 05:41:15'),
(311, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 05:42:30'),
(312, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 05:48:06'),
(313, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:01:34'),
(314, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:02:49'),
(315, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:03:47'),
(316, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:06:33'),
(317, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:07:26'),
(318, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:09:31'),
(319, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:10:46'),
(320, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:15:23'),
(321, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:15:51'),
(322, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:19:45'),
(323, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:21:56'),
(324, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:28:30'),
(325, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:30:01'),
(326, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:30:55'),
(327, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:44:34'),
(328, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:44:44'),
(329, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 06:45:05'),
(330, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 07:40:20'),
(331, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 07:40:40'),
(332, 'Account Access', 'Account Login ', 'Admin', '::1', 'Admin Admin', '2017-12-19 07:44:52'),
(333, 'Account Access', 'Account Login ', 'Admin', '::1', 'Admin Admin', '2017-12-19 07:44:53'),
(334, 'Account Access', 'Account Login ', 'Admin', '172.16.30.241', ' ', '2017-12-19 07:54:34'),
(335, 'Account Access', 'Account Login ', 'Admin', '::1', 'Erin John Rugas', '2017-12-20 01:33:20'),
(336, 'Account Access', 'Account Logout ', 'Admin', '::1', 'Erin John Rugas', '2017-12-20 01:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_menu`
--

CREATE TABLE `timekeeping_menu` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `url` varchar(100) NOT NULL,
  `with_sub` tinyint(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_menu`
--

INSERT INTO `timekeeping_menu` (`id`, `name`, `icon`, `status`, `created_at`, `updated_at`, `url`, `with_sub`) VALUES
(1, 'Dashboard', 'fa fa-dashboard', 1, '2017-08-21 14:10:21', '2017-09-02 10:03:46', 'dashboard', NULL),
(2, 'User Management', 'fa fa-users', 1, '2017-08-21 14:10:21', '2017-09-05 17:59:01', 'users', NULL),
(3, 'Attendance', 'fa fa-calendar', 1, '2017-08-21 14:10:21', '2017-09-05 18:10:20', '', 1),
(4, 'Management Shift', 'fa fa-clock-o', 1, '2017-08-21 14:10:21', '2017-10-05 08:28:52', '', 1),
(5, 'Position Management', 'fa fa-sitemap', 1, '2017-08-21 14:10:21', '2017-09-02 10:04:25', 'position', NULL),
(6, 'Logs', 'fa fa-tasks', 1, '2017-10-08 17:21:44', '0000-00-00 00:00:00', 'logs', NULL),
(7, 'Profile', 'fa fa-user', 1, '2017-10-11 23:11:06', '0000-00-00 00:00:00', 'profile', NULL),
(8, 'Schedule', 'fa fa-columns', 1, '2017-10-11 23:11:06', '0000-00-00 00:00:00', 'eschedule', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_record`
--

CREATE TABLE `timekeeping_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `time_in` time DEFAULT NULL,
  `time_out` time DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `type` varchar(12) DEFAULT NULL,
  `late_status` varchar(12) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `intern_no_hrs` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_record`
--

INSERT INTO `timekeeping_record` (`id`, `user_id`, `date`, `time_in`, `time_out`, `status`, `type`, `late_status`, `created_at`, `intern_no_hrs`) VALUES
(1, 5, '2017-10-26', '08:00:00', '17:00:00', 'Intern Attendance', NULL, NULL, '2017-10-25 16:14:22', '8'),
(2, 14, '2017-11-15', '11:17:47', '19:17:47', '8 hours', NULL, NULL, '2017-11-15 03:17:47', NULL),
(3, 3, '2017-11-19', '12:01:46', '20:01:46', 'Work From Home', NULL, NULL, '2017-11-19 04:01:46', NULL),
(4, 1, '2017-11-19', '12:02:58', '20:02:58', 'Work From Home', NULL, NULL, '2017-11-19 04:02:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_record_overtime`
--

CREATE TABLE `timekeeping_record_overtime` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reason` text,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `overtime_date` date NOT NULL,
  `date_submitted` date DEFAULT NULL,
  `ot_hours` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_record_overtime`
--

INSERT INTO `timekeeping_record_overtime` (`id`, `user_id`, `reason`, `start`, `end`, `overtime_date`, `date_submitted`, `ot_hours`, `status`) VALUES
(19, 2, 'Will Play Tomb Raider', '17:30:00', '20:00:00', '2017-10-06', '2017-10-05', '3', 1),
(20, 2, 'I Need Money :\'(', '17:30:00', '20:00:00', '2017-10-09', '2017-10-05', '3', 1),
(21, 2, 'Will Play Overwatch And Eat', '17:30:00', '21:00:00', '2017-10-11', '2017-10-05', '4', 1),
(22, 2, 'Wala Lang', '15:02:00', '16:44:00', '2017-10-05', '2017-10-06', '1', 0),
(23, 2, 'Wala Lang', '03:02:00', '16:44:00', '2017-10-05', '2017-10-06', '13', 2),
(24, 2, 'Wala Lang', '14:02:00', '13:05:00', '2017-10-05', '2017-10-06', '-1', 1),
(25, 2, '', '14:22:00', '15:20:00', '0000-00-00', '2017-10-06', '0', 1),
(26, 2, '1010', '10:10:00', '22:10:00', '2017-10-10', '2017-10-08', '12', 2),
(27, 4, 'tinatamad mag code', '12:31:00', '00:31:00', '2017-12-31', '2017-10-08', '-12', 2),
(28, 4, 'Tatambay', '14:22:00', '02:09:00', '2017-02-22', '2017-10-09', '-12', 0),
(29, 2, '', '00:00:00', '00:00:00', '0000-00-00', '2017-10-17', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_school`
--

CREATE TABLE `timekeeping_school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(50) NOT NULL,
  `internship` int(11) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_school`
--

INSERT INTO `timekeeping_school` (`school_id`, `school_name`, `internship`, `hours`) VALUES
(1, 'UST', 1, 250);

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_shift`
--

CREATE TABLE `timekeeping_shift` (
  `id` int(11) NOT NULL,
  `shift_type` varchar(50) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_shift`
--

INSERT INTO `timekeeping_shift` (`id`, `shift_type`, `start_time`, `end_time`) VALUES
(1, 'Morning', '08:00:00', '17:00:00'),
(2, 'Mid', '15:00:00', '01:00:00'),
(3, 'Night', '22:00:00', '10:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `timekeeping_sub_menu`
--

CREATE TABLE `timekeeping_sub_menu` (
  `id` int(11) NOT NULL,
  `sub` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `intern` int(11) DEFAULT NULL,
  `admin_hr` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timekeeping_sub_menu`
--

INSERT INTO `timekeeping_sub_menu` (`id`, `sub`, `url`, `menu_id`, `intern`, `admin_hr`) VALUES
(1, 'Shift Type', 'shift', 4, NULL, 1),
(3, 'Timesheet', 'timesheet', 3, 1, 1),
(4, 'Leaves', 'leaves', 3, NULL, 1),
(5, 'Calendar', 'calendar', 3, NULL, 1),
(6, 'Overtime', 'overtime', 3, NULL, 1),
(7, 'Employee Attendance', 'attendance/employee', 3, NULL, 1),
(8, 'Schedule', 'schedule', 4, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `middlename` varchar(60) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(80) NOT NULL,
  `profile_picture` varchar(60) DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `employee_number` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `middlename`, `email`, `password`, `profile_picture`, `position_id`, `employee_number`, `created_at`, `updated_at`) VALUES
(1, 'Erin John', 'Rugas', '', 'ejr012495@gmail.com', '$2y$11$J/VIhgxJaiJFHPtYX19Axuf7ZJe2He/PMVHDdL8BAvV9TTrrNLABe', 'no_image.jpg', 1, NULL, '2017-10-25 10:49:59', '2017-11-19 04:07:13'),
(2, 'Admin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$11$/TD0t5eAsvQQ/2atAgh6GOcTc3JDzLjwaiX/Z52v4qvFlf.59NOcK', NULL, 1, NULL, '2017-12-14 05:43:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `profile_picture` varchar(60) DEFAULT NULL,
  `employee_number` varchar(40) DEFAULT NULL,
  `reg_key` varchar(30) DEFAULT NULL,
  `verified_email` tinyint(2) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `reset_status` tinyint(2) DEFAULT NULL,
  `reset_key` varchar(50) DEFAULT NULL,
  `sss_no` varchar(50) DEFAULT NULL,
  `tin_no` varchar(50) DEFAULT NULL,
  `phil_health` varchar(50) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `course` varchar(80) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `year` varchar(50) DEFAULT NULL,
  `remaining` varchar(10) DEFAULT NULL,
  `no_of_hrs` varchar(10) DEFAULT NULL,
  `status` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `profile_picture`, `employee_number`, `reg_key`, `verified_email`, `start_date`, `shift_id`, `reset_status`, `reset_key`, `sss_no`, `tin_no`, `phil_health`, `school`, `course`, `birthday`, `year`, `remaining`, `no_of_hrs`, `status`) VALUES
(1, 1, 'c9a962a4f0207fe78e983b623f152458.PNG', NULL, '_VCl5SvZH9kJDhQL_', 0, '2017-05-17', 1, NULL, NULL, '333123', '1234', '12334', NULL, NULL, NULL, NULL, '', '', 1),
(2, 2, 'no_image.jpg', NULL, '_Fv9n15DTflqs4ZO_', 0, '2017-12-14', 1, NULL, NULL, '', '', '', '', '', NULL, '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_classification`
--
ALTER TABLE `expense_classification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_reimbursement`
--
ALTER TABLE `expense_reimbursement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_users`
--
ALTER TABLE `expense_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_employees`
--
ALTER TABLE `resume_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `resume_position`
--
ALTER TABLE `resume_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resume_record`
--
ALTER TABLE `resume_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `record_ibfk_2` (`pos_id`),
  ADD KEY `role_id_pos_id` (`role_id`,`pos_id`);

--
-- Indexes for table `resume_role`
--
ALTER TABLE `resume_role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `pos_id` (`pos_id`);

--
-- Indexes for table `timekeeping_calendar_events`
--
ALTER TABLE `timekeeping_calendar_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_logs`
--
ALTER TABLE `timekeeping_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_menu`
--
ALTER TABLE `timekeeping_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_record`
--
ALTER TABLE `timekeeping_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_record_overtime`
--
ALTER TABLE `timekeeping_record_overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_school`
--
ALTER TABLE `timekeeping_school`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `timekeeping_shift`
--
ALTER TABLE `timekeeping_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timekeeping_sub_menu`
--
ALTER TABLE `timekeeping_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `expense_classification`
--
ALTER TABLE `expense_classification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `expense_reimbursement`
--
ALTER TABLE `expense_reimbursement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `expense_users`
--
ALTER TABLE `expense_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `resume_employees`
--
ALTER TABLE `resume_employees`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `resume_position`
--
ALTER TABLE `resume_position`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `timekeeping_calendar_events`
--
ALTER TABLE `timekeeping_calendar_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `timekeeping_logs`
--
ALTER TABLE `timekeeping_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=337;
--
-- AUTO_INCREMENT for table `timekeeping_menu`
--
ALTER TABLE `timekeeping_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `timekeeping_record`
--
ALTER TABLE `timekeeping_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `timekeeping_record_overtime`
--
ALTER TABLE `timekeeping_record_overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `timekeeping_school`
--
ALTER TABLE `timekeeping_school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `timekeeping_shift`
--
ALTER TABLE `timekeeping_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `timekeeping_sub_menu`
--
ALTER TABLE `timekeeping_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
