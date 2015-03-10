-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2015 at 03:00 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(100) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(100) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`) VALUES
(1, 'Rosmaidayu', 'rosma', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`class_id` int(5) NOT NULL,
  `class_name` varchar(30) NOT NULL,
  `class_tingkatan` varchar(15) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `class_tingkatan`) VALUES
(7, 'hhhh', '4 Amanah'),
(8, 'nnnnn', '3 Amanah'),
(9, 'nnnnnrrrr', '5 Amanah');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
`question_id` int(255) NOT NULL,
  `question_name` varchar(1000) DEFAULT NULL,
  `question_category` varchar(1000) DEFAULT NULL,
  `question_form` int(5) NOT NULL,
  `question_file_name` varchar(50) NOT NULL,
  `question_content` mediumblob NOT NULL,
  `question_size` int(10) NOT NULL,
  `question_type` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`student_id` int(100) NOT NULL,
  `student_name` varchar(100) DEFAULT NULL,
  `student_username` varchar(100) DEFAULT NULL,
  `student_password` varchar(100) DEFAULT NULL,
  `student_ic` varchar(100) DEFAULT NULL,
  `student_form` varchar(100) DEFAULT NULL,
  `student_phone` varchar(100) DEFAULT NULL,
  `student_add` varchar(100) DEFAULT NULL,
  `student_state` varchar(100) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_username`, `student_password`, `student_ic`, `student_form`, `student_phone`, `student_add`, `student_state`) VALUES
(26, 'E1', 'v1', 'Z1', '3331', '3 Amanah-nnnnn', 'Aaa1', 'Bbb1', 'Melaka'),
(24, 'Bbb', 'Ain', 'ain', '123123123', '4 Amanah-hhhh', '345435', 'fdgdfg', 'Negeri Sembilan');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
`teacher_id` int(100) NOT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `teacher_username` varchar(100) DEFAULT NULL,
  `teacher_password` varchar(100) DEFAULT NULL,
  `teacher_staffid` varchar(20) DEFAULT NULL,
  `teacher_ic` varchar(12) DEFAULT NULL,
  `teacher_email` varchar(100) DEFAULT NULL,
  `teacher_sub` varchar(50) DEFAULT NULL,
  `teacher_add` varchar(100) DEFAULT NULL,
  `teacher_pos` varchar(5) DEFAULT NULL,
  `teacher_daerah` varchar(50) DEFAULT NULL,
  `teacher_state` varchar(50) DEFAULT NULL,
  `upload` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `teacher_username`, `teacher_password`, `teacher_staffid`, `teacher_ic`, `teacher_email`, `teacher_sub`, `teacher_add`, `teacher_pos`, `teacher_daerah`, `teacher_state`, `upload`) VALUES
(1, 'Malisa Binti Abu11', 'Malisa', '12345', 'Q12', '923546046345', 'Malisa@yahoo.com', 'Bahasa Inggeris', 'Kg Bvfr', '12345', 'Kota Bharu', 'Sarawak', NULL),
(22, 'Ain111', 'Ain', 'Ain', '123', '923546046341', 'Ain@yahoo.com', 'Biologi', 'Pasir Putehi', '16800', 'Kota Bharu', 'Terengganu', NULL),
(21, 'Solehah1', 'Solehah', 'Leha', '1221', '940220035222', 'Solehah@yahoo.com', 'Biologi', 'Kok Lanas', '16400', 'Kota Bharu', 'Kelantan', NULL),
(12, 'Muhamad1111111111', 'Muhamad', '1234567', 'A12', '904325035534', 'Afiq@yahoo.com', '', 'Kg Tendong', '16800', 'Dungun', '', NULL),
(13, 'fazrul afiq hadri', 'afiq', '123456', 'a12', '904325035534', 'afiq@yahoo.com', 'bahasa melayu', 'kg tendong', '123', 'dungun', 'kelantan', NULL),
(33, 'sdgdfg', 'a', '123', 'bbb', '4545', 'sd@yahoo.com', 'Matematik', 'sdf', '32423', 'sdfd', 'Sabah', NULL),
(31, 'Yyyy', 'Ooo', 'Rrr', 'Mmm111', '999', 'Hhhh@yahoo.com', 'Bahasa Melayu', 'Hhhh', '77777', 'Gggg', 'Sabah', NULL),
(32, '', '', '', 'sdfsdf', '', '', '', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE IF NOT EXISTS `upload` (
`id_note` int(100) NOT NULL,
  `name_note` varchar(10000) DEFAULT NULL,
  `jenis_soalan` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `tingkatan` varchar(100) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `upload`
--

INSERT INTO `upload` (`id_note`, `name_note`, `jenis_soalan`, `subjek`, `tingkatan`) VALUES
(29, '..', '.SOALAN TAHUN LEPAS.', '.GEOGRAFI.', '.TINGKATAN 3.'),
(28, '..', '..', '..', '..'),
(27, '..', '..', '..', '..'),
(26, '', '', '', ''),
(25, '', '', '', ''),
(30, '', 'SOALAN TAHUN LEPAS', 'MATEMATIK TAMBAHAN', 'TINGKATAN 1'),
(31, '', 'SOALAN TAHUN LEPAS', 'BIOLOGI', 'TINGKATAN 2'),
(32, '', 'SOALAN TAHUN LEPAS', 'SAINS', 'TINGKATAN 2'),
(33, '', 'SOALAN TAHUN LEPAS', 'LUKISAN KEJURUTERAAN', 'TINGKATAN 1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
 ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
 ADD PRIMARY KEY (`id_note`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `class_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
MODIFY `teacher_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
MODIFY `id_note` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
