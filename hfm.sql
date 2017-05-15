-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2017 at 08:57 PM
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
(7, 'Hussain Kazim', 'kazim@email.com', '123', 9700348466, 'My College', 'www.mycollege.com', 1, 'This is brief Desc', '', 0, 'a:1:{i:0;s:24:\"Aeronautical Engineering\";}', 'completed');

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
(7, 7, 'Alma Mcdaniel', 'zezotip@hotmail.com', '123', 761, 'My College', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(11) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'not_completed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`, `status`) VALUES
(1, 'admin', 'admin', 0, 'not_completed'),
(2, 'college', 'college', 1, 'not_completed'),
(3, 'student', 'student', 2, 'not_completed'),
(4, 'pro', 'pro', 3, 'not_completed'),
(7, 'kazim@email.com', '123', 1, 'completed'),
(8, 'zezotip@hotmail.com', '123', 2, 'completed');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
