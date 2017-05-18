-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2017 at 08:42 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hfm`
--

-- --------------------------------------------------------

--
-- Table structure for table `7_events`
--

CREATE TABLE `7_events` (
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `brief` text NOT NULL,
  `eventURL` varchar(100) NOT NULL,
  `regURL` varchar(100) NOT NULL,
  `collegeWebsite` varchar(100) NOT NULL,
  `FBLink` varchar(100) NOT NULL,
  `twitterLink` varchar(100) NOT NULL,
  `youtubeLink` varchar(100) NOT NULL,
  `posterLink` varchar(100) NOT NULL,
  `androidLink` varchar(100) NOT NULL,
  `brochureLink` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `contactPerson` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `7_events`
--

INSERT INTO `7_events` (`name`, `type`, `fromDate`, `toDate`, `brief`, `eventURL`, `regURL`, `collegeWebsite`, `FBLink`, `twitterLink`, `youtubeLink`, `posterLink`, `androidLink`, `brochureLink`, `venue`, `contactPerson`, `college_id`, `id`) VALUES
('SRK TEDx', 'TEDx', '2017-05-15', '2017-05-16', 'In cillum sequi quia voluptatem', 'http://www.fihire.me', 'Cum possimus voluptatem harum nostrum quos ratione tenetur ea', 'http://www.vebobejymuk.ws', 'Ex et aute molestias ullam tempora ut fuga Ab et quis id ut dicta ullamco est', 'Sint dolorum sit magna maxime quis officia nostrud aut amet', 'Quia pariatur At voluptatem qui et eligendi', 'Similique est libero est quisquam maiores nesciunt', 'Sed eligendi qui sit laboris incididunt non non distinctio Doloremque occaecat odit sapiente irure c', 'Velit consequatur laudantium aut eum quaerat et laborum Consequatur aspernatur sapiente eveniet null', 'Quo consequat Architecto dolor corporis exercitation aliquip earum quia quaerat ullamco in aspernatu', 'Alias lorem irure dolor quo provident et quos enim corporis culpa officia earum corrupti dolor non', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `7_noticeboard`
--

CREATE TABLE `7_noticeboard` (
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `brief` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `7_noticeboard`
--

INSERT INTO `7_noticeboard` (`title`, `date`, `time`, `brief`, `college_id`, `status`, `id`) VALUES
('New Notice updated', '2017-05-13', '13:45:00', 'Hello this is new notice', 7, 'running', 13),
('Testing 4', '2017-05-13', '15:45:00', 'Tested', 7, 'running', 15);

-- --------------------------------------------------------

--
-- Table structure for table `c36_events`
--

CREATE TABLE `c36_events` (
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `brief` text NOT NULL,
  `eventURL` varchar(100) NOT NULL,
  `regURL` varchar(100) NOT NULL,
  `collegeWebsite` varchar(100) NOT NULL,
  `FBLink` varchar(100) NOT NULL,
  `twitterLink` varchar(100) NOT NULL,
  `youtubeLink` varchar(100) NOT NULL,
  `posterLink` varchar(100) NOT NULL,
  `androidLink` varchar(100) NOT NULL,
  `brochureLink` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `contactPerson` text NOT NULL,
  `college_id` varchar(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c36_events`
--

INSERT INTO `c36_events` (`name`, `type`, `fromDate`, `toDate`, `brief`, `eventURL`, `regURL`, `collegeWebsite`, `FBLink`, `twitterLink`, `youtubeLink`, `posterLink`, `androidLink`, `brochureLink`, `venue`, `contactPerson`, `college_id`, `id`) VALUES
('New event', 'TEDx', '2017-05-16', '2017-05-18', 'Brief', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'www.google.com', 'hyd', 'dinesh', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c36_noticeboard`
--

CREATE TABLE `c36_noticeboard` (
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `brief` text NOT NULL,
  `college_id` varchar(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c36_noticeboard`
--

INSERT INTO `c36_noticeboard` (`title`, `date`, `time`, `brief`, `college_id`, `status`, `id`) VALUES
('Holiday Tommorrow', '2017-05-15', '08:00:00', 'Holiday', '0', 'running', 1),
('Half day', '2017-05-15', '13:45:00', 'today', 'C36', 'running', 2);

-- --------------------------------------------------------

--
-- Table structure for table `c38a4_questions`
--

CREATE TABLE `c38a4_questions` (
  `question` varchar(100) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c38a4_questions`
--

INSERT INTO `c38a4_questions` (`question`, `option1`, `option2`, `option3`, `option4`, `id`) VALUES
('Question?', '1', '2', '3', '4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `c38_assessments`
--

CREATE TABLE `c38_assessments` (
  `name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `questionCount` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c38_assessments`
--

INSERT INTO `c38_assessments` (`name`, `duration`, `fromDate`, `toDate`, `questionCount`, `id`) VALUES
('.NET', 10, '2017-05-15', '2017-05-15', 15, 1),
('JAVA', 10, '2017-05-15', '2017-05-17', 10, 2),
('JAVA', 10, '2017-05-15', '2017-05-15', 10, 3),
('PHP v2', 20, '2017-05-16', '2017-05-25', 20, 4);

-- --------------------------------------------------------

--
-- Table structure for table `c38_events`
--

CREATE TABLE `c38_events` (
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `brief` text NOT NULL,
  `eventURL` varchar(100) NOT NULL,
  `regURL` varchar(100) NOT NULL,
  `collegeWebsite` varchar(100) NOT NULL,
  `FBLink` varchar(100) NOT NULL,
  `twitterLink` varchar(100) NOT NULL,
  `youtubeLink` varchar(100) NOT NULL,
  `posterLink` varchar(100) NOT NULL,
  `androidLink` varchar(100) NOT NULL,
  `brochureLink` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `contactPerson` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `c38_noticeboard`
--

CREATE TABLE `c38_noticeboard` (
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `brief` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c38_noticeboard`
--

INSERT INTO `c38_noticeboard` (`title`, `date`, `time`, `brief`, `college_id`, `status`, `id`) VALUES
('Lavanya', '2017-05-15', '13:45:00', 'Lavanya', 0, 'running', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c44a1_questions`
--

CREATE TABLE `c44a1_questions` (
  `question` varchar(100) NOT NULL,
  `option1` varchar(50) NOT NULL,
  `option2` varchar(50) NOT NULL,
  `option3` varchar(50) NOT NULL,
  `option4` varchar(50) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c44a1_questions`
--

INSERT INTO `c44a1_questions` (`question`, `option1`, `option2`, `option3`, `option4`, `id`) VALUES
('What is Java', 'Planet ', 'Programming language', 'Computer name', 'Scientist name', 0);

-- --------------------------------------------------------

--
-- Table structure for table `c44_assessments`
--

CREATE TABLE `c44_assessments` (
  `name` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `questionCount` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c44_assessments`
--

INSERT INTO `c44_assessments` (`name`, `duration`, `fromDate`, `toDate`, `questionCount`, `id`) VALUES
('Java', 20, '2017-05-15', '2017-05-15', 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c44_events`
--

CREATE TABLE `c44_events` (
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `brief` text NOT NULL,
  `eventURL` varchar(100) NOT NULL,
  `regURL` varchar(100) NOT NULL,
  `collegeWebsite` varchar(100) NOT NULL,
  `FBLink` varchar(100) NOT NULL,
  `twitterLink` varchar(100) NOT NULL,
  `youtubeLink` varchar(100) NOT NULL,
  `posterLink` varchar(100) NOT NULL,
  `androidLink` varchar(100) NOT NULL,
  `brochureLink` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `contactPerson` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c44_events`
--

INSERT INTO `c44_events` (`name`, `type`, `fromDate`, `toDate`, `brief`, `eventURL`, `regURL`, `collegeWebsite`, `FBLink`, `twitterLink`, `youtubeLink`, `posterLink`, `androidLink`, `brochureLink`, `venue`, `contactPerson`, `college_id`, `id`) VALUES
('SRK TEDx', 'TEDx', '2017-05-18', '2017-05-20', 'SRK speaks', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'www.url.com', 'venue', 'contact', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `c44_noticeboard`
--

CREATE TABLE `c44_noticeboard` (
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `brief` text NOT NULL,
  `college_id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c44_noticeboard`
--

INSERT INTO `c44_noticeboard` (`title`, `date`, `time`, `brief`, `college_id`, `status`, `id`) VALUES
('New Notice', '2017-05-15', '13:45:00', 'Hello Students', 0, 'running', 1);

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `collegeName` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `collegeDesc` text NOT NULL,
  `collegeAddress` text NOT NULL,
  `collegePhone` bigint(20) NOT NULL,
  `coursesOffered` varchar(500) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`id`, `name`, `email`, `password`, `phone`, `collegeName`, `website`, `role`, `collegeDesc`, `collegeAddress`, `collegePhone`, `coursesOffered`, `status`) VALUES
(40, 'Samuel Mercer', 'cyvemosa@gmail.com', '123', 625, 'Cool', 'www.coolcollege.com', 1, '', '', 0, '', ''),
(41, 'College Admin', 'admin@college.com', '123', 1234, 'college', 'www.college.com', 1, 'Brief', 'Hyderabad', 1234, 'a:1:{i:0;s:24:\"Aeronautical Engineering\";}', ''),
(42, 'hello', 'hello@hello.com', '123', 123, 'hello college', 'www.hello.com', 1, '', '', 0, 'a:1:{i:0;s:38:\"Computer Science and Engineering (CSE)\";}', 'completed'),
(43, 'new college', 'new@college.com', '123', 1234, 'new College', 'www.new.com', 1, '', '', 0, 'a:1:{i:0;s:24:\"Aeronautical Engineering\";}', 'completed'),
(44, 'Lester Mays', 'risydela@yahoo.com', '123', 725, 'col name', 'www.college.com', 1, '', '', 0, 'a:1:{i:0;s:30:\"Mechanical Engineering (Mech.)\";}', 'completed');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(4) NOT NULL,
  `college_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `collegeName` varchar(50) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `college_id`, `name`, `email`, `password`, `phone`, `collegeName`, `role`) VALUES
(6, 0, 'Chiquita Oneill', 'vupyfe@gmail.com', '123', 311, 'My College', 2),
(7, 7, 'Alma Mcdaniel', 'zezotip@hotmail.com', '123', 761, 'My College', 2),
(8, 44, 'Kermit Brown', 'dukan@hotmail.com', 'Pa$$w0rd!', 612, 'col name', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'not_completed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `status`) VALUES
('', 'dukan@hotmail.com', 'Pa$$w0rd!', 2, 'not_completed'),
('1', 'admin', 'admin', 0, 'not_completed'),
('2', 'college', 'college', 1, 'not_completed'),
('3', 'student', 'student', 2, 'not_completed'),
('4', 'pro', 'pro', 3, 'not_completed'),
('8', 'zezotip@hotmail.com', '123', 2, 'not_-completed'),
('c41', 'admin@college.com', '123', 1, 'completed'),
('c42', 'hello@hello.com', '123', 1, 'completed'),
('c43', 'new@college.com', '123', 1, 'completed'),
('c44', 'risydela@yahoo.com', '123', 1, 'completed'),
('C7', 'kazim@email.com', '123', 1, 'not_completed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `7_events`
--
ALTER TABLE `7_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `7_noticeboard`
--
ALTER TABLE `7_noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c36_events`
--
ALTER TABLE `c36_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c36_noticeboard`
--
ALTER TABLE `c36_noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c38a4_questions`
--
ALTER TABLE `c38a4_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c38_assessments`
--
ALTER TABLE `c38_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c38_events`
--
ALTER TABLE `c38_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c38_noticeboard`
--
ALTER TABLE `c38_noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c44a1_questions`
--
ALTER TABLE `c44a1_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c44_assessments`
--
ALTER TABLE `c44_assessments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c44_events`
--
ALTER TABLE `c44_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `c44_noticeboard`
--
ALTER TABLE `c44_noticeboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `7_noticeboard`
--
ALTER TABLE `7_noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `c36_noticeboard`
--
ALTER TABLE `c36_noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `c38a4_questions`
--
ALTER TABLE `c38a4_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `c38_assessments`
--
ALTER TABLE `c38_assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `c44_assessments`
--
ALTER TABLE `c44_assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `c44_events`
--
ALTER TABLE `c44_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `c44_noticeboard`
--
ALTER TABLE `c44_noticeboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
