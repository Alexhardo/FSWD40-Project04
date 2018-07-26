-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2018 at 10:44 AM
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
(2, 'Front-End Course', 'Front-end web development is everything involved in programming the user interface of a web application. Typically it refers to the Hypertext Markup Language (HTML), Cascading Style Sheets (CSS) and JavaScript portion of web site production as opposed to the database or server-side programming. It encompasses everything from building a simple page of HTML text to creating complex, responsive HTML5 websites designed to be accessed via various different browsers, devices and screen sizes.\r\n\r\n', '2018-08-05', '2018-09-28'),
(3, 'Back-End Course', 'This course presents an overview of a variety of Web backend topics: handling user input, producing templated output, storing information in databases and data stores, and building systems with secure user accounts.\r\n\r\n', '2018-08-13', '2018-09-10'),
(4, 'Full Stack web development Course', 'In this program, you will prepare for a job as a Full Stack Web Developer, and learn to create websites, and complex server-side web applications that use powerful relational databases to persistently store data.\r\n\r\n', '2018-08-20', '2018-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `link_users_courses`
--

CREATE TABLE `link_users_courses` (
  `link_id` int(11) NOT NULL,
  `fk_course_id` int(11) DEFAULT NULL,
  `fk_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `link_users_courses`
--

INSERT INTO `link_users_courses` (`link_id`, `fk_course_id`, `fk_user_id`) VALUES
(1, 3, 2),
(2, 2, 4),
(3, 4, 5),
(4, 3, 3),
(5, 4, 6),
(6, 2, 7),
(7, 2, 8),
(8, 4, 17),
(9, 3, 18),
(10, 2, 20);

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
(1, 2, 'what does CSS mean?', 3, 'CSS still not so clear to me', 2, 7, '2018-07-25 09:00:00', NULL, 'open'),
(2, 4, 'method vs functions', 2, 'what is the difference between METHODS and FUNCTIONS ?', 2, 7, '2018-07-25 10:00:00', '2018-07-25 12:00:00', 'closed'),
(3, 5, 'model view controller', 5, 'i need some more details about model view controller!', 3, 3, '2018-07-26 09:00:00', NULL, 'open'),
(4, 4, 'vcghxgh', 1, 'vbnxvn', 2, 8, '2018-07-26 11:18:00', NULL, 'open'),
(5, 18, 'more about jQuery ', 8, 'i need some advanced subjects in jQuery !!', 3, 3, '2018-07-26 10:45:00', NULL, 'open'),
(6, 4, 'Software Testing\r\n', 10, 'i still fill that Software Testing is just wasting of time, can you contradict that please !', 4, 6, '2018-07-26 10:00:00', NULL, 'open'),
(7, 5, 'Waterfall model', 9, 'is it correct that for small project the Waterfall model is more efficient than scrum method!', 4, 6, '2018-07-26 12:17:00', NULL, 'open'),
(8, 2, 'Twig', 7, 'is the Twig file, kind of plain text files or a normal HTML document ?', 3, 3, '2018-07-26 13:12:00', NULL, 'open'),
(9, 5, 'Symfony vs angular', 7, 'Symfony vs angular ', 4, 6, '2018-07-25 11:00:00', NULL, 'taken');

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
(7, 'Symfony'),
(8, 'JQs'),
(9, 'Requirement Eng'),
(10, 'Testing');

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
  `rights` enum('admin','teacher','student') DEFAULT NULL,
  `img` varchar(265) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `pass`, `last_name`, `first_name`, `rights`, `img`) VALUES
(1, 'admin@learn.com', 'admin123', 'admin', 'admin', 'admin', 'admin.png'),
(2, 'alex@learn.com', 'student123', 'alex', 'Hardo', 'student', 'alex.jpeg'),
(3, 'goran@learn.com', 'teacher123', 'goran', 'stevic', 'teacher', 'goran.jpeg'),
(4, 'tim@learn.com', 'student123', 'tim', 'almamedov', 'student', 'tim.jpeg'),
(5, 'matthias@learn.com', 'student123', 'matthias', 'liszt', 'student', 'matthias.jpeg'),
(6, 'zeljiko@learn.com', 'teacher123', 'zeljiko', 'puljic', 'teacher', 'zeljko.jpeg'),
(7, 'ghiath@learn.com', 'teacher123', 'ghiath', 'serri', 'teacher', 'serri.jpeg'),
(8, 'theodora@learn.com', 'teacher123', 'theodora', 'patkos', 'teacher', 'theo.jpg'),
(17, 'sameh@learn.at', 'student123', 'sameh', 'shahin', 'student', 'sameh.jpeg'),
(18, 'ivan@learn.at', 'student123', 'ivan', 'zet', 'student', 'ivan.jpeg'),
(20, 'asd@learn.at', 'pass', 'Almamedov', 'tim', 'teacher', NULL),
(21, 'timur.almamedov@gmail.com', '0000', 'Kolyabina', 'Marina', 'student', NULL);

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
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
