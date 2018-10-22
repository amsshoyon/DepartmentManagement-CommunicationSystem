-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2018 at 07:51 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apee`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `image` varchar(50) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `image`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`) VALUES
(2, 'ru_logo.png', 'Abdullah', 'Al Mamun', 'amsshoyon', 'amsshoyon@gmail.com', '546496', '01722937278');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(10) NOT NULL,
  `value` varchar(30) NOT NULL,
  `text` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_title` varchar(200) NOT NULL,
  `marks` varchar(10) NOT NULL,
  `credits` varchar(10) NOT NULL,
  `contact_hour_week` varchar(10) NOT NULL,
  `contact_periods_week` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_id`, `course_code`, `course_title`, `marks`, `credits`, `contact_hour_week`, `contact_periods_week`, `year`, `semester`) VALUES
(1, 'eng1111', 'ENG 1111', 'Technical and Communicative English', '50', '2', '2', '3', 'Part-I', 'Odd'),
(2, 'math1111', 'MATH 1111', 'Algebra , Trigonometry and Vector Analysis', '75', '3', '3', '5', 'Part-I', 'Odd'),
(3, 'chem1111', 'CHEM 1111', 'Physical and Inorganic Chemistry', '75', '3', '3', '5', 'Part-I', 'Odd'),
(4, 'apee1111', 'APEE 1111', 'Basic Electrical Engineering', '100', '4', '4', '6', 'Part-I', 'Odd'),
(5, 'apee1121', 'APEE 1121', 'Heat Engineering', '100', '4', '4', '6', 'Part-I', 'Odd'),
(6, 'apee1172', 'APEE 1172', 'Engineering Drawing', '25', '1', '2', '3', 'Part-I', 'Odd'),
(7, 'apee1182', 'APEE 1182', 'Lab (Experiments on the courses APEE 1111, 1121)', '75', '3', '6', '9', 'Part-I', 'Odd');

-- --------------------------------------------------------

--
-- Table structure for table `course_apee1111`
--

CREATE TABLE `course_apee1111` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_apee1111`
--

INSERT INTO `course_apee1111` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(4, '14064902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(5, '14064903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(6, '14064904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(7, '14064905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(8, '14064906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(9, '14064907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(10, '14064908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(11, '14064909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(12, '14064910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_apee1121`
--

CREATE TABLE `course_apee1121` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_apee1121`
--

INSERT INTO `course_apee1121` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(4, '14064902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(5, '14064903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(6, '14064904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(7, '14064905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(8, '14064906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(9, '14064907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(10, '14064908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(11, '14064909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(12, '14064910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_apee1172`
--

CREATE TABLE `course_apee1172` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_apee1172`
--

INSERT INTO `course_apee1172` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(4, '14064902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(5, '14064903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(6, '14064904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(7, '14064905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(8, '14064906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(9, '14064907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(10, '14064908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(11, '14064909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(12, '14064910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_apee1182`
--

CREATE TABLE `course_apee1182` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_apee1182`
--

INSERT INTO `course_apee1182` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(4, '14064902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(5, '14064903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(6, '14064904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(7, '14064905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(8, '14064906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(9, '14064907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(10, '14064908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(11, '14064909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(12, '14064910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_chem1111`
--

CREATE TABLE `course_chem1111` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_chem1111`
--

INSERT INTO `course_chem1111` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(4, '14064902', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(5, '14064903', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(6, '14064904', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(7, '14064905', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(8, '14064906', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(9, '14064907', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(10, '14064908', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(11, '14064909', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0'),
(12, '14064910', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_eng1111`
--

CREATE TABLE `course_eng1111` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_eng1111`
--

INSERT INTO `course_eng1111` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', '20', '20', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(4, '14064902', '18', '18', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(5, '14064903', '16', '16', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(6, '14064904', '14', '14', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(7, '14064905', '12', '12', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(8, '14064906', '10', '10', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(9, '14064907', '8', '8', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(10, '14064908', '6', '6', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(11, '14064909', '4', '4', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(12, '14064910', '2', '2', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course_math1111`
--

CREATE TABLE `course_math1111` (
  `id` int(20) UNSIGNED NOT NULL,
  `roll_no` varchar(12) DEFAULT NULL,
  `section_a_marks` varchar(10) DEFAULT NULL,
  `section_b_marks` varchar(10) DEFAULT NULL,
  `section_a_classtest` varchar(50) DEFAULT NULL,
  `section_b_classtest` varchar(50) DEFAULT NULL,
  `section_a_attendance` varchar(20) DEFAULT NULL,
  `section_b_attendance` varchar(20) DEFAULT NULL,
  `section_a_examiner` varchar(50) DEFAULT NULL,
  `section_b_examiner` varchar(50) DEFAULT NULL,
  `regularity` varchar(20) DEFAULT NULL,
  `appearance` varchar(10) DEFAULT NULL,
  `limitation` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_math1111`
--

INSERT INTO `course_math1111` (`id`, `roll_no`, `section_a_marks`, `section_b_marks`, `section_a_classtest`, `section_b_classtest`, `section_a_attendance`, `section_b_attendance`, `section_a_examiner`, `section_b_examiner`, `regularity`, `appearance`, `limitation`) VALUES
(3, '14064901', '30', '30', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(4, '14064902', '26', '26', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(5, '14064903', '22', '22', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(6, '14064904', '18', '18', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(7, '14064905', '16', '16', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(8, '14064906', '14', '14', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(9, '14064907', '12', '12', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(10, '14064908', '10', '10', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(11, '14064909', '8', '8', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0'),
(12, '14064910', '4', '6', NULL, NULL, NULL, NULL, '14094920', '14094920', 'regular', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `noticeboard`
--

CREATE TABLE `noticeboard` (
  `id` int(10) NOT NULL,
  `heading` varchar(300) NOT NULL,
  `notice` text NOT NULL,
  `person` varchar(200) NOT NULL,
  `shortname` varchar(30) NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticeboard`
--

INSERT INTO `noticeboard` (`id`, `heading`, `notice`, `person`, `shortname`, `date`, `time`) VALUES
(31, 'Programme for B.Sc. Part-III Geology (Honours) ', 'Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) Programme for B.Sc. Part-III Geology (Honours) ', '14094920', 'MRK', '2018/05/01', '02:50:44 AM'),
(32, ' Application form of Post Publication Review of Answer Scripts', 'Application form of Post Publication Review of Answer Scripts Application form of Post Publication Review of Answer Scripts Application form of Post Publication Review of Answer Scripts Application form of Post Publication Review of Answer Scripts Application form of Post Publication Review of Answer Scripts Application form of Post Publication Review of Answer Scripts ', '14094920', 'MRK', '2018/05/01', '02:51:16 AM'),
(33, ' Instructions for Packing of Answer Papers ', 'Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers Instructions for Packing of Answer Papers ', '14094920', 'MRK', '2018/05/01', '02:51:48 AM'),
(34, ' Programme for B.Sc. Part-III Geology', ' Programme for B.Sc. Part-III Geology Programme for B.Sc. Part-III Geology Programme for B.Sc. Part-III Geology Programme for B.Sc. Part-III Geology Programme for B.Sc. Part-III Geology Programme for B.Sc. Part-III Geology', '14094920', 'MRK', '2018/05/01', '02:54:22 AM'),
(46, 'Programme for B.Sc. Part-III Geology', 'Programme for B.Sc. Part-III Geology', '14094920', 'MRK', '2018/05/01', '03:59:24 AM'),
(47, 'Instructions for Packing of Answer Papers ', 'Instructions for Packing of Answer Papers ', '14094920', 'MRK', '2018/05/01', '03:59:34 AM'),
(48, 'Application form of Post Publication Review of Answer Scripts', 'Application form of Post Publication Review of Answer Scripts', '14094920', 'MRK', '2018/05/01', '03:59:43 AM'),
(49, 'Programme for B.Sc. Part-III Geology (Honours) ', 'Programme for B.Sc. Part-III Geology (Honours) ', '14094920', 'MRK', '2018/05/01', '03:59:51 AM'),
(50, 'Programme for B.Sc. Part-III Geology ', 'Programme for B.Sc. Part-III Geology ', '14094920', 'MRK', '2018/05/01', '03:59:59 AM'),
(51, 'Instructions for Packing of Answer Papers ', 'Instructions for Packing of Answer Papers ', '14094920', 'MRK', '2018/05/01', '04:00:05 AM'),
(52, ' Application form of Post Publication Review of Answer Scripts ', ' Application form of Post Publication Review of Answer Scripts ', '14094920', 'MRK', '2018/05/01', '04:00:13 AM'),
(53, 'Programme for B.Sc. Part-III Geology (Honours) ', 'Programme for B.Sc. Part-III Geology (Honours) ', '14094920', 'MRK', '2018/05/01', '04:00:19 AM');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(10) NOT NULL,
  `status` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `userid` varchar(30) NOT NULL,
  `user` varchar(200) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  `time` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(20) NOT NULL,
  `reg_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `fathers_name` varchar(100) NOT NULL,
  `mothers_name` varchar(100) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `permanent_address` varchar(500) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `nationality` varchar(20) NOT NULL,
  `hall` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `reg_id`, `username`, `roll_no`, `name`, `image`, `gender`, `religion`, `email`, `year`, `semester`, `session`, `phone`, `fathers_name`, `mothers_name`, `present_address`, `permanent_address`, `birth_date`, `pass`, `blood_group`, `nationality`, `hall`) VALUES
(30, '14064901', '', '14064901', 'Mahbub Rahman', '', '', '', 'mahbub@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Shaheed Shamsuzzoha Hall'),
(31, '14064902', '', '14064902', 'student 2', '', '', '', 'student2@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Shah Mukhdum Hall'),
(32, '14064903', '', '14064903', 'student 3', '', '', '', 'student3@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Sher-e Bangla Fazlul Haque Hall'),
(33, '14064904', '', '14064904', 'student 4', '', '', '', 'student4@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Sher-e Bangla Fazlul Haque Hall'),
(34, '14064905', '', '14064905', 'student 5', '', '', '', 'student5@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Sher-e Bangla Fazlul Haque Hall'),
(35, '14064906', '', '14064906', 'student 6', '', '', '', 'student6@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Syed Amer Ali Hall'),
(36, '14064907', '', '14064907', 'student 7', '', '', '', 'student7@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Syed Amer Ali Hall'),
(37, '14064908', '', '14064908', 'student 8', '', '', '', 'student8@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', 'Syed Amer Ali Hall'),
(38, '14064909', '', '14064909', 'student 9', '', '', '', 'student9@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', ' Matihar Hall'),
(39, '14064910', '', '14064910', 'student 10', '', '', '', 'student10@gmail.com', 'Part-I', 'Odd', '2013-14', '', '', '', '', '', '', '111', '', '', ' Matihar Hall');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `shortname` varchar(30) NOT NULL,
  `image` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `fathers_name` varchar(100) NOT NULL,
  `mothers_name` varchar(100) NOT NULL,
  `present_address` varchar(500) NOT NULL,
  `permanent_address` varchar(500) NOT NULL,
  `birth_date` varchar(10) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `nationality` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `userid`, `rank`, `username`, `name`, `shortname`, `image`, `email`, `phone`, `gender`, `religion`, `fathers_name`, `mothers_name`, `present_address`, `permanent_address`, `birth_date`, `pass`, `blood_group`, `nationality`) VALUES
(19, '14094920', 'Associate Professor', '', 'Mahmudur Rahman Khan', 'MRK', 'sdfsfs.jpg', 'shovon@gmail.com', '01722937278', 'Male', 'Islam', 'jani na', 'dont know', 'rajshahi', 'dhaka', '09-11-1994', '123', 'A+', 'Bangladeshi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_apee1111`
--
ALTER TABLE `course_apee1111`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_apee1121`
--
ALTER TABLE `course_apee1121`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_apee1172`
--
ALTER TABLE `course_apee1172`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_apee1182`
--
ALTER TABLE `course_apee1182`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_chem1111`
--
ALTER TABLE `course_chem1111`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_eng1111`
--
ALTER TABLE `course_eng1111`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_math1111`
--
ALTER TABLE `course_math1111`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `noticeboard`
--
ALTER TABLE `noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_apee1111`
--
ALTER TABLE `course_apee1111`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_apee1121`
--
ALTER TABLE `course_apee1121`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_apee1172`
--
ALTER TABLE `course_apee1172`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_apee1182`
--
ALTER TABLE `course_apee1182`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_chem1111`
--
ALTER TABLE `course_chem1111`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_eng1111`
--
ALTER TABLE `course_eng1111`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `course_math1111`
--
ALTER TABLE `course_math1111`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `noticeboard`
--
ALTER TABLE `noticeboard`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
