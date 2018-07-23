-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2018 at 03:46 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `help_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `link_users_courses`
--

CREATE TABLE `link_users_courses` (
  `link_id` int(11) NOT NULL,
  `fk_course_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticket_id` int(11) NOT NULL,
  `fk_student_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `fk_topic_id` int(11) DEFAULT NULL,
  `description` text,
  `fk_course_id` int(11) DEFAULT NULL,
  `fk_teacher_id` int(11) DEFAULT NULL,
  `open_date_time` datetime DEFAULT NULL,
  `close_date_time` datetime DEFAULT NULL,
  `ticket_status` enum('open','closed') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `last_name` varchar(252) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `rights` enum('admin','teacher','student') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `link_users_courses`
--
ALTER TABLE `link_users_courses`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `fk_course_id` (`fk_course_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `fk_student_id` (`fk_student_id`),
  ADD KEY `fk_topic_id` (`fk_topic_id`),
  ADD KEY `fk_course_id` (`fk_course_id`),
  ADD KEY `fk_teacher_id` (`fk_teacher_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `link_users_courses`
--
ALTER TABLE `link_users_courses`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `link_users_courses`
--
ALTER TABLE `link_users_courses`
  ADD CONSTRAINT `link_users_courses_ibfk_1` FOREIGN KEY (`fk_course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `link_users_courses_ibfk_2` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`fk_student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`fk_topic_id`) REFERENCES `topics` (`topic_id`),
  ADD CONSTRAINT `tickets_ibfk_3` FOREIGN KEY (`fk_course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `tickets_ibfk_4` FOREIGN KEY (`fk_teacher_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
