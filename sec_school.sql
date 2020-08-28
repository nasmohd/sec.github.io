-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2020 at 04:00 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sec_school`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent_info`
--

CREATE TABLE `parent_info` (
  `parent_id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `phoneNumber` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent_to_student`
--

CREATE TABLE `parent_to_student` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recommended_books`
--

CREATE TABLE `recommended_books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `estimate_price` varchar(255) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `subject_id` int(255) NOT NULL,
  `topics` varchar(255) NOT NULL,
  `Form` varchar(255) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recommended_books`
--

INSERT INTO `recommended_books` (`book_id`, `book_name`, `estimate_price`, `subject_name`, `subject_id`, `topics`, `Form`, `teacher_id`) VALUES
(1, 'Principles of Physics by S. Chand XI (self -reading, exercises, notes, conceptual questions used by NECTA).', '25,000', 'Physics', 8, 'Mechanics (all 12 subtopics),\r\nWave,\r\nHeat,\r\nElectrostatics,\r\nElectromagnetism', 'Form 5', 1),
(2, 'Tranter,\r\nPure Mathematics 2.', '15,000', 'Mathematics', 1, 'Complex Numbers,\r\nHyperbolic Functions,\r\nDifferential Equations,\r\nParabola,\r\nEllipse,\r\nHyperbola,', 'Form 6', 1),
(3, 'Fundamentals in Biology by Nyambari Nyangwine Publishers.', '8,500', 'Biology', 9, 'ALL', 'Form 3', 1),
(4, 'Principles of Physics by S. Chand XII (self reading, exercises, notes, conceptual questions used by NECTA).', '32500', 'Physics', 8, 'Modern physics,\r\nDigital Electronics and Telecommunications,\r\nCurrent Electricity,', 'Form 6', 1),
(5, 'Principles of Physics, Nelkon 7Th Edition (discussion, summary, exercises and some question used by NECTA).', '25,500', 'Physics', 8, 'Modern physics,\r\nDigital Electronics and Telecommunications,\r\nCurrent Electricity,', 'Form 6', 1),
(6, 'Organic Chemistry by John Kansel', '24,000', 'Chemistry', 7, 'Organic Chemistry', 'Form 3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_subjects`
--

CREATE TABLE `students_subjects` (
  `subject_taken_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `student_id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `Acad_Level` varchar(255) DEFAULT NULL,
  `Class_combination` varchar(255) DEFAULT NULL,
  `Student_PhoneNumber` int(255) DEFAULT NULL,
  `Parent_PhoneNumber` int(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`student_id`, `FirstName`, `LastName`, `username`, `Acad_Level`, `Class_combination`, `Student_PhoneNumber`, `Parent_PhoneNumber`, `Password`, `subject_id`) VALUES
(1, 'Festus', 'Maiga', 'fmaiga', '6', 'PGM', 627182919, 627252421, 'fmaiga', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Kiswahili'),
(4, 'Geography'),
(5, 'History'),
(6, 'Civics'),
(7, 'Chemistry'),
(8, 'Physics'),
(9, 'Biology'),
(10, 'Book Keeping'),
(11, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `syllabus`
--

CREATE TABLE `syllabus` (
  `id` int(11) NOT NULL,
  `form` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `chapter_number` int(11) DEFAULT NULL,
  `chapter_contents` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teachers_subjects`
--

CREATE TABLE `teachers_subjects` (
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

CREATE TABLE `teacher_info` (
  `teacher_id` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `FirstName`, `LastName`, `username`, `password`, `subject_id`) VALUES
(1, 'Karl', 'Max', 'km', 'km', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_to_student`
--

CREATE TABLE `teacher_to_student` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_to_student`
--

INSERT INTO `teacher_to_student` (`id`, `teacher_id`, `student_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_info`
--

CREATE TABLE `timetable_info` (
  `timetable_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `information` text DEFAULT NULL,
  `color` varchar(255) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_hours` int(255) NOT NULL,
  `start_minutes` int(255) NOT NULL,
  `end_hours` int(255) NOT NULL,
  `end_minutes` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_info`
--

INSERT INTO `timetable_info` (`timetable_id`, `student_id`, `information`, `color`, `start_date`, `end_date`, `start_hours`, `start_minutes`, `end_hours`, `end_minutes`) VALUES
(3, 1, 'Geography', '', '2020-08-18', '2020-08-19', 21, 41, 22, 50),
(17, 1, 'History', '#FFC107', '2020-08-21', '2020-08-21', 15, 20, 16, 20),
(19, 1, 'Lunch', '#FFC107', '2020-08-19', '2020-08-19', 12, 30, 13, 0),
(20, 1, 'Dinner', '#DC3545', '2020-08-20', '2020-08-20', 20, 30, 21, 0),
(21, 1, 'Civics', '#28A745', '2020-08-10', '2020-08-10', 6, 30, 8, 30),
(25, 1, 'Final Presentations', '#28A745', '2020-08-25', '2020-08-27', 8, 0, 17, 30),
(26, 1, 'History', '#FFC107', '2020-08-20', '2020-08-20', 21, 0, 22, 0),
(27, 1, 'Math Special Test', '#FFC107', '2020-08-24', '2020-08-24', 16, 0, 17, 0),
(28, 1, 'English', '#FFC107', '2020-08-22', '2020-08-22', 15, 0, 16, 0),
(32, 1, 'Heat and Thermodynamics Special Test', '#007BFF', '2020-08-21', '2020-08-21', 16, 30, 17, 30);

-- --------------------------------------------------------

--
-- Table structure for table `time_tracker`
--

CREATE TABLE `time_tracker` (
  `tracker_id` int(11) NOT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `form` varchar(255) DEFAULT NULL,
  `start_date` varchar(255) DEFAULT NULL,
  `end_date` varchar(255) DEFAULT NULL,
  `topics` text DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `date_added` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_tracker`
--

INSERT INTO `time_tracker` (`tracker_id`, `subject_name`, `subject_id`, `form`, `start_date`, `end_date`, `topics`, `status`, `teacher_id`, `date_added`) VALUES
(45, 'Physics', 8, 'Form 5', '2020-08-24', '2020-08-28', 'waves', 1, 1, '24/08/2020'),
(46, 'Mathematics', 1, 'Form 5', '2020-08-24', '2020-08-27', 'Integration', 0, 1, '24/08/2020'),
(47, 'Geography', 4, 'Form 5', '2020-08-24', '2020-08-28', 'Weathering and Mass wasting\r\n', 1, 1, '24/08/2020'),
(48, 'GS', 12, 'Form 5', '2020-08-24', '2020-08-27', 'Philosophy and Religion', 1, 1, '24/08/2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parent_info`
--
ALTER TABLE `parent_info`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `parent_to_student`
--
ALTER TABLE `parent_to_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommended_books`
--
ALTER TABLE `recommended_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `students_subjects`
--
ALTER TABLE `students_subjects`
  ADD PRIMARY KEY (`subject_taken_id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `syllabus`
--
ALTER TABLE `syllabus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher_info`
--
ALTER TABLE `teacher_info`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_to_student`
--
ALTER TABLE `teacher_to_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timetable_info`
--
ALTER TABLE `timetable_info`
  ADD PRIMARY KEY (`timetable_id`);

--
-- Indexes for table `time_tracker`
--
ALTER TABLE `time_tracker`
  ADD PRIMARY KEY (`tracker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parent_info`
--
ALTER TABLE `parent_info`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parent_to_student`
--
ALTER TABLE `parent_to_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommended_books`
--
ALTER TABLE `recommended_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students_subjects`
--
ALTER TABLE `students_subjects`
  MODIFY `subject_taken_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `syllabus`
--
ALTER TABLE `syllabus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teachers_subjects`
--
ALTER TABLE `teachers_subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_info`
--
ALTER TABLE `teacher_info`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_to_student`
--
ALTER TABLE `teacher_to_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timetable_info`
--
ALTER TABLE `timetable_info`
  MODIFY `timetable_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `time_tracker`
--
ALTER TABLE `time_tracker`
  MODIFY `tracker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
