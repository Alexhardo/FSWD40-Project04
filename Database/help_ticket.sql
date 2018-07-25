-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2018 at 09:31 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

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

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `name`, `description`, `start_date`, `end_date`) VALUES
(2, 'Front-End Course', 'In this track, you’ll learn how to build beautiful, interactive websites by learning the fundamentals of HTML, CSS, and JavaScript — three common coding languages on which all modern websites are built. This is a useful and lucrative skill to acquire as it is used by nearly every single business in the world that needs a website to communicate to its customers. By the end of this track, you’ll have all the skills required to build your own websites or even start a career with one of the thousands of companies that have a website.\r\n\r\n', '2018-08-05', '2018-09-28'),
(3, 'Back-End Course', 'This course presents an overview of a variety of Web backend topics: handling user input, producing templated output, storing information in databases and data stores, and building systems with secure user accounts.\r\n\r\n', '2018-08-13', '2018-09-10'),
(4, 'Full Stack web development Course', 'In this program, you’ll prepare for a job as a Full Stack Web Developer, and learn to create websites, and complex server-side web applications that use powerful relational databases to persistently store data.\r\n\r\n', '2018-08-20', '2018-12-21');

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
  `ticket_status` enum('open','closed','taken') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `fk_student_id`, `title`, `fk_topic_id`, `description`, `fk_course_id`, `fk_teacher_id`, `open_date_time`, `close_date_time`, `ticket_status`) VALUES
(1, 2, 'what does CSS mean?', 3, 'CSS still not so clear to me', 2, 3, '2018-07-25 10:00:00', NULL, 'open'),
(2, 4, 'method vs functions', 2, 'what is the difference between METHODS and FUNCTIONS ?', 4, 7, '2018-07-28 10:00:00', NULL, 'open'),
(3, 5, 'model view controller', 5, 'i need some more details about model view controller!', 4, 3, '2018-07-31 13:00:00', NULL, 'open'),
(4, 4, 'vcghxgh', 1, 'vbnxvn', 2, 7, '2018-07-25 10:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `name`) VALUES
(1, 'HTML'),
(2, 'Javascript'),
(3, 'CSS'),
(4, 'Angular 4'),
(5, 'PHP'),
(6, 'Wordpress'),
(7, 'Symfony');

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
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `pass`, `last_name`, `first_name`, `rights`) VALUES
(1, 'admin@learn.com', 'admin123', 'admin', 'admin', 'admin'),
(2, 'student1@learn.com', 'student123', 'student', 'student', 'student'),
(3, 'teacher1@learn.com', 'teacher123', 'teacher1', 'teacher1', 'teacher'),
(4, 'student2@learn.com', 'student123', 'stundet2', 'student2', 'student'),
(5, 'student3@learn.com', 'student123', 'student3', 'student3', 'student'),
(6, 'teacher2@learn.com', 'teacher123', 'teacher2', 'teacher2', 'teacher'),
(7, 'teacher2@learn.com', 'teacher123', 'teacher2', 'teacher2', 'teacher'),
(8, 'teacher3@learn.com', 'teacher123', 'teacher3', 'teacher3', 'teacher');

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
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `link_users_courses`
--
ALTER TABLE `link_users_courses`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
