-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2016 at 09:13 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--
create database template;
use template;
CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `user_student_id` int(11) NOT NULL,
  `user_professor_id` int(11) NOT NULL,
  `msg` text NOT NULL,
  `grade` varchar(100) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_student_id`, `user_professor_id`, `msg`, `grade`, `created`) VALUES
(16, 8, 9, 'Very good karshma ZMR', 'Very Good', '2016-03-20 16:55:05'),
(17, 10, 10, 'This is feedback', 'Excellent', '2016-04-23 18:22:15'),
(18, 11, 9, 'Rock', 'Excellent', '2016-04-23 20:12:40'),
(19, 12, 10, 'This is simple feedback.', 'Excellent', '2016-04-24 08:57:31'),
(20, 15, 10, 'kdbvkhbdabckhbakhbc', 'Good', '2016-05-26 12:01:51'),
(21, 14, 10, 'gooood', 'Good', '2016-05-26 12:07:34'),
(22, 16, 10, 'good feedback', 'Good', '2016-05-26 12:20:00'),
(23, 16, 10, 'good\r\n', 'Excellent', '2016-05-26 12:36:39'),
(24, 16, 10, 'a good project', 'Good', '2016-05-26 12:39:47');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `specification` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `user_id`, `department`, `designation`, `specification`, `status`, `created`, `modified`) VALUES
(5, 9, 'CSE', 'Ass. Professor', 'Computer Network', 1, '2016-03-20 16:54:10', '2016-03-20 16:54:10'),
(6, 10, 'IT', 'Astt. Professor', 'M. Tech.', 1, '2016-04-19 17:13:48', '2016-04-19 17:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `branch` varchar(200) NOT NULL,
  `start_year` int(11) NOT NULL,
  `end_year` int(11) NOT NULL,
  `semester` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `roll_no`, `branch`, `start_year`, `end_year`, `semester`, `status`, `created`, `modified`) VALUES
(5, 8, '123456', 'CSE', 2013, 2017, 'Fourth', 1, '2016-03-20 16:47:12', '2016-03-20 16:47:12'),
(6, 10, '0188IT121020', 'IT', 2012, 2016, 'Eighth', 1, '2016-04-19 17:01:04', '2016-04-19 17:01:04'),
(7, 11, 'CS81', 'CSE', 2012, 2016, 'Eighth', 1, '2016-04-23 19:32:47', '2016-05-14 08:17:53'),
(8, 12, 'IT57', 'IT', 2012, 2016, 'Eighth', 1, '2016-04-24 08:56:56', '2016-04-24 08:56:56'),
(9, 13, '0188it121008', 'CSE', 2010, 2014, 'Sixth', 1, '2016-04-25 14:09:52', '2016-04-25 14:09:52'),
(10, 14, '0188it121026', 'IT', 2012, 2016, 'Eighth', 1, '2016-05-18 14:33:49', '2016-05-18 14:35:01'),
(11, 15, '0188cs111021', 'IT', 2011, 2015, 'Fourth', 1, '2016-05-26 10:52:45', '2016-05-26 10:56:08'),
(12, 16, '0188IT121050', 'IT', 2012, 2016, 'Eighth', 1, '2016-05-26 12:19:15', '2016-05-26 12:19:15');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `mobile` varchar(14) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` datetime NOT NULL,
  `password` varchar(200) NOT NULL,
  `question` varchar(200) NOT NULL,
  `answer` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL,
  `imgurl` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `mobile`, `address`, `gender`, `email`, `dob`, `password`, `question`, `answer`, `role`, `imgurl`, `status`, `created`, `modified`) VALUES
(7, 'pranay', 'wakodikar', '9537482621', 'Indora', 'Male', 'pranaywakodikar12@gmail.com', '1994-10-12 00:00:00', '12345678', '1', 'sindhi hindi', 'Admin', '913909three.jpg', 1, '2016-03-20 16:40:34', '2016-03-20 16:40:34'),
(8, 'Trupti', 'Shamkuwar', '7024111128', 'Indora', 'Female', 'trupti@gmail.com', '1993-05-06 00:00:00', '12345678', '1', 'gnhs', 'Student', '895721new-year-wallpaper-motivational.jpg', 1, '2016-03-20 16:46:06', '2016-03-20 16:46:06'),
(9, 'Karishma', 'Ukey', '9527732248', 'Bangladesh', 'Female', 'karishmaukey1995@gmail.com', '1995-12-11 00:00:00', '09876543', '2', 'sangam', 'Admin', '776000Beautiful-Girl-and-Boy-Forever-Together-Wallpapers.jpg', 1, '2016-03-20 16:52:45', '2016-03-20 16:56:17'),
(10, 'Govinda', 'Mandal', '8602110570', 'Bhopal', 'Male', 'govinda4india@gmail.com', '1994-01-21 00:00:00', 'govinda1994', '1', 'lnvm', 'Admin', '12255820160303_140936g1.jpg', 1, '2016-04-19 17:00:30', '2016-04-24 22:46:55'),
(11, 'Raksha', 'Umrey', '1234567890', 'BPL', 'Female', 'raksha@gmail.com', '1990-02-06 00:00:00', 'govinda1994', '4', 'Holiday', 'Student', '359100Abhijeet_Sawant.jpg', 1, '2016-04-23 19:32:16', '2016-05-14 08:17:53'),
(12, 'Yashwant', 'Sawai', '8354837433', 'Bhopal', 'Male', 'yashwant@gmail.com', '1994-12-30 00:00:00', '12345678', '3', 'Amir', 'Student', '', 1, '2016-04-24 08:56:26', '2016-04-24 08:56:26'),
(13, 'Beauty', 'Kumari', '9876543210', 'Patna', 'Female', 'beauty@gmail.com', '1992-10-10 00:00:00', 'beauty1992', '1', 'Patna', 'Student', '', 1, '2016-04-25 14:09:18', '2016-04-25 14:09:18'),
(14, 'mukesh ', 'khalote', '8602499507', 'xyzbgigih ', 'Male', 'Mkhalote1118@gmail.com', '1994-04-18 00:00:00', '12345678', '1', 'anshu', 'Student', '430603Abhijeet_Sawant.jpg', 1, '2016-05-18 14:33:06', '2016-05-18 14:35:01'),
(15, 'ram', 'gupta', '9898776644', '112-A near sai temple\r\nkalpna naagar bhopal mp', 'Male', 'ram@gmail.com', '2016-05-29 00:00:00', '12345678', '1', 'bvms bhopal', 'Student', '840057Bharat Mata ki Jay.jpg', 1, '2016-05-26 10:51:38', '2016-05-26 10:56:08'),
(16, 'Saurabh', 'Kumar', '7869244311', 'Bhopal', 'Male', 'sksaurabh2012@gmail.com', '1994-08-10 00:00:00', 'saurabh1994', '3', 'akshay', 'Student', '47943sk.jpg', 1, '2016-05-26 12:18:43', '2016-05-26 12:18:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
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
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
