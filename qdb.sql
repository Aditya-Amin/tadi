-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2020 at 09:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `username`, `email`, `password`, `type`) VALUES
(8, 'superadmin', 'superadmin@admin.com', '12345', 'superadmin'),
(10, 'demo', 'demo@gmail.com', '1234', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE `choices` (
  `id` int(10) NOT NULL,
  `question_id` int(10) DEFAULT NULL,
  `choice_1` mediumtext DEFAULT NULL,
  `choice_2` mediumtext DEFAULT NULL,
  `choice_3` mediumtext DEFAULT NULL,
  `choice_4` mediumtext DEFAULT NULL,
  `choice_5` mediumtext DEFAULT NULL,
  `choice_6` mediumtext DEFAULT NULL,
  `answer` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choices`
--

INSERT INTO `choices` (`id`, `question_id`, `choice_1`, `choice_2`, `choice_3`, `choice_4`, `choice_5`, `choice_6`, `answer`) VALUES
(7, 9, 'nothing', 'anything', 'something', 'everything', '', '', 'nothing'),
(8, 10, 'sdfsdf', 'fafsd', 'fsdfsd', 'sdfsdfsf', '', '', 'sdfsdf'),
(9, 11, 'No', 'Yes', 'A little', 'Know but no experience', '', '', 'Know but no experience'),
(11, 16, 'Nope', 'Yes', 'No never', 'Yes always', '', '', 'Yes'),
(12, 17, 'FUck o', 'fjsdlfjsd ', 'dsfjsdfj', 'Albatraoz', '', '', 'Albatraoz'),
(13, 18, 'wanna get fucked?', 'I hate you', 'I love u too', 'FUckl off', '', '', 'FUckl off');

-- --------------------------------------------------------

--
-- Table structure for table `examinee`
--

CREATE TABLE `examinee` (
  `id` int(10) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `institution` varchar(255) DEFAULT NULL,
  `initial_training_date` date DEFAULT NULL,
  `refresher_training_date` date DEFAULT NULL,
  `fibroscan_device_serial_no` varchar(150) DEFAULT NULL,
  `scan_done` int(10) DEFAULT NULL,
  `is_verified` tinyint(4) DEFAULT NULL,
  `inst_addr` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examinee`
--

INSERT INTO `examinee` (`id`, `first_name`, `last_name`, `email`, `institution`, `initial_training_date`, `refresher_training_date`, `fibroscan_device_serial_no`, `scan_done`, `is_verified`, `inst_addr`) VALUES
(1, 'Jonathon', 'halim', 'jonathon@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(2, 'Abdur', 'Jabbar', 'jabbar@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(3, 'Barkat', 'Ali', 'barkat@gmail.com', 'Barkat Elmi Institution', '2021-07-20', NULL, 'ERD15412154XX55', NULL, 1, NULL),
(4, 'Asadullah', 'Galib', 'asadullah@gmail.com', NULL, NULL, '2021-06-22', 'EP669TWARPHEXAL', 100, 1, NULL),
(5, 'Intishar', NULL, 'ishmam@gmail.com', NULL, '2020-06-09', NULL, NULL, 1000, 1, NULL),
(6, 'dsfs ', 'fsfsfsf', 'fsdfs@fsedf.sfsdf', 'fsdfsf', NULL, NULL, NULL, NULL, 1, NULL),
(7, 'ishmam', 'fsdfjsfjskdf j', 'ishmam@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(8, 'Hakmaola', NULL, 'hakmaola@gmail.com', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(9, 'Samurain', 'Axe', 'samurain@gmail.com', 'Samurain road, Samurain.', '2020-07-07', NULL, '565656d56as5d6asdasd', 454, 1, 'NULL'),
(10, 'Harkiulis', 'Harkalas', 'harkalas@gmail.com', 'Harkala institution', '2020-07-15', '2020-07-22', 'dfsdfsdf545f', 454, 1, 'Harkala road'),
(11, 'Ima', 'Albatraoz', 'albatraoz@yahoo.com', 'BasAls Hospital Limited', '2020-07-30', '2020-07-02', '151611fsdfdfdsfdfdsfhuhuUFDSFSD', 10, 1, 'Basbagan, Basa mor.'),
(12, 'Ababossar', 'Chad', 'amabossarchar@gmail.com', 'amabossa', '2020-07-09', '2020-07-13', '215405045405', NULL, 1, 'amabossachar'),
(13, 'Azman', 'Hakim', 'asman@gmail.com', 'azman incorporations limited', '2020-07-06', '2020-07-13', '123456789', 123, 0, 'Azman road, Azman'),
(18, 'Md. Aditya', 'Amin', 'adittyaamin@gmail.com', 'The People\'s University Of Bangladesh', '2020-04-12', '2020-07-12', 'N/A', 0, 1, 'Dhaka'),
(19, 'Md. Aditya', 'Amin', 'adittyaamin@gmail.com', 'The People\'s University Of Bangladesh', '2020-04-12', '2020-07-12', 'N/A', 0, 1, 'Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` int(10) NOT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `content`) VALUES
(1, '<div class=\"sectionheading section\">\r\n<h2>Yoo policy for electronic devices, mobile technology and watches</h2>\r\n</div>\r\n<div class=\"text section\">\r\n<p>You are not permitted to have in your possession in the exam room any electronic device and/or mobile technology, or watches of any kind, unless specified by the examiner. Medically prescribed devices are permitted.</p>\r\n<p>Unless specified by the examiner, any electronic device and/or mobile technology/watches of any kind which are brought into the exam room must have all functions switched off and need to be placed in the designated part of the room, as directed by the Supervisor. Medically prescribed devices are permitted.</p>\r\n<p>Any item not permitted in an exam room under Regulation 8d that is found in your possession during an exam will be removed for the duration of the exam and a fine of $100 will apply.</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) NOT NULL,
  `question` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`) VALUES
(9, '<p>What the hell are you waitin for?</p>'),
(10, '<p>fj;sdjflksdjflkjdsfjds</p>'),
(11, '<p>Do you know how to fuck a girl?</p>'),
(16, '<p>Do you know Barak Omaba?</p>'),
(17, '<p>Hello there man?</p>'),
(18, '<p>I love you?</p>');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(10) NOT NULL,
  `examinee_id` int(10) DEFAULT NULL,
  `marks` int(10) DEFAULT NULL,
  `passed` tinyint(4) DEFAULT NULL,
  `submit_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `examinee_id`, `marks`, `passed`, `submit_date`) VALUES
(1, 2, 2, 0, '2020-06-23'),
(2, 2, 0, 0, '2020-06-23'),
(3, 2, 2, 1, '2020-06-23'),
(4, 2, 0, 0, '2020-06-23'),
(5, 5, 0, 0, '2020-06-23'),
(6, 5, 0, 0, '2020-06-23'),
(7, 8, 0, 0, '2020-07-03'),
(8, 7, 0, 0, '2020-07-10'),
(9, 7, 1, 1, '2020-07-11'),
(10, 7, 1, 1, '2020-07-11'),
(11, 7, 0, 0, '2020-07-11'),
(12, 7, 0, 1, '2020-07-11'),
(13, 7, 0, 1, '2020-07-11'),
(14, 7, 0, 1, '2020-07-11'),
(15, 7, 0, 1, '2020-07-11'),
(16, 7, 0, 1, '2020-07-11'),
(17, 7, 33, 1, '2020-07-11'),
(18, 7, 16, 0, '2020-07-11'),
(19, 7, 33, 1, '2020-07-11'),
(20, 7, 100, 1, '2020-07-11'),
(22, 19, 33, 1, '2020-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `studied`
--

CREATE TABLE `studied` (
  `id` int(10) NOT NULL,
  `examinee_id` int(10) DEFAULT NULL,
  `topics_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(10) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `content`) VALUES
(5, 'By the end of the lesson we all come to know that', '<p>Is a word that means a sporitual things.</p>\r\n<p><img src=\"http://localhost/tproject/admin/uploads/100521718_3724171264261072_3130566597941395456_o.jpg\" alt=\"\" width=\"196\" height=\"196\" /></p>'),
(6, 'dfsdfsdfsdf', '<p>fs</p>\r\n<p>fs</p>\r\n<p>f</p>\r\n<p>sf</p>\r\n<p><img src=\"http://localhost/tproject/admin/uploads/83189048_381562509375837_3347907409296228352_n.jpg\" alt=\"\" width=\"960\" height=\"638\" /></p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choices`
--
ALTER TABLE `choices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `examinee`
--
ALTER TABLE `examinee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examinee_id` (`examinee_id`);

--
-- Indexes for table `studied`
--
ALTER TABLE `studied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `examinee_id` (`examinee_id`),
  ADD KEY `topics_id` (`topics_id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `choices`
--
ALTER TABLE `choices`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `examinee`
--
ALTER TABLE `examinee`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `studied`
--
ALTER TABLE `studied`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `choices`
--
ALTER TABLE `choices`
  ADD CONSTRAINT `choices_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`examinee_id`) REFERENCES `examinee` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `studied`
--
ALTER TABLE `studied`
  ADD CONSTRAINT `studied_ibfk_1` FOREIGN KEY (`examinee_id`) REFERENCES `examinee` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `studied_ibfk_2` FOREIGN KEY (`topics_id`) REFERENCES `topics` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
