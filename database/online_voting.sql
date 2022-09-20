-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2022 at 08:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_voting`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `loginId` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `loginId`, `pass`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `candidate_list`
--

CREATE TABLE `candidate_list` (
  `cid` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL,
  `cfaculty` varchar(20) NOT NULL,
  `c-collegeId` int(11) NOT NULL,
  `votingList` int(11) DEFAULT NULL,
  `categoryList` int(11) DEFAULT NULL,
  `cdescription` varchar(300) NOT NULL,
  `cagenda` varchar(300) NOT NULL,
  `can_img` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidate_list`
--

INSERT INTO `candidate_list` (`cid`, `cname`, `cfaculty`, `c-collegeId`, `votingList`, `categoryList`, `cdescription`, `cagenda`, `can_img`) VALUES
(42, 'Sita guragain', 'BBM', 5643, 55, 48, 'Sita guragain is an enthuasistic women actively participating in different program in Prime college also helps in organizing.', '', 'candidate 3.jpg'),
(31, 'John Thapa', 'BCA', 8738, 47, 31, 'Hey Everybodyi am john thapa, by the way you can call me jhonny. i am a candidate of general member of prime cultural club please vote me', 'as', '242717927_1012670119571836_1047849468440400654_n.jpg'),
(36, 'Sandesh Rajbanshi', 'BCA', 9485, 49, 37, 'Hello guys i am sandesh you can call me sandy. Support me for club president', '', 'sandesh.jpg'),
(34, 'Jyoti Adhikari', 'MBS', 90457, 49, 34, 'I am jyoti Adhikair standing for School Prefect please support me.', 'abc', 'istockphoto-515630181-612x612.jpg'),
(37, 'Jenisha Khadka', 'Bsc.Csit', 93830, 49, 35, 'This is jenisha khadka from BSc.Csit. I will create a friendly environment in college', '', 'istockphoto-615279718-612x612.jpg'),
(47, 'Hari maya Deuba', 'BBA', 98763, 55, 50, 'Ms.Deuba is a member of nepali nari samiti which is a it club of nepali women and now she is a candidate for president ', '', 'can 6.jpg'),
(44, 'Rajeshwor Tamang', 'BBA', 476325, 55, 49, 'Rajeshwor Tamang is the social activist of the college now engaging towards the field of IT and a candidate of executive member', '', 'candidate 2.jpg'),
(35, 'Shyam BHandari', 'BBS', 783457, 49, 34, 'Shyam is currently part of Shoreline and has been leading and supporting Business and Technology Transformations in various roles as college club president.', '', 'istockphoto-502581380-612x612.jpg'),
(45, 'Sita Nagarkoti', 'BCA', 872538, 55, 50, 'SIta nagarkoti is a women empowerer of prime college who is encouraging and was also a active member and became the president of cultural club and a candidate of IT hub.', '', 'candidate 4.jpg'),
(46, 'Jenish Maharjan', 'BCA', 876482, 55, 49, 'Jenish maharjan is a cyclist and active member of nepal cycle society actively participating in different campaign. Now he is a candidate for Executive member.', '', 'can 5.jpg'),
(30, 'Rikesh Shrestha', 'BCA', 2143535, 47, 31, 'I am Rikesh Shrestha of prime college standing for General member please vote me', 'ok now its agenda and i will build my college very nicely', '13248478_520702534783904_3400370560990870149_o.jpg'),
(43, 'Ram Adhikari', 'BCA', 7683246, 55, 50, 'Ram adhikari is the previous executive member of Prime It club and now a candidate of President of IT hub', '', 'candidate 1.jpeg'),
(27, 'Dipshika Bhandari', 'BBS', 8973153, 36, 28, 'Hello i am president of the company vote me', 'Ok cool votenoe', 'edited-20220210134631-4.jpg'),
(29, 'Saugat Sapkota', ' ', 98736471, 49, 34, 'I am Saugat and your own candidate i graduated from NCCS where i took Computer Science as a major subject and graduated with a gpa of 4.0', '', 'candidate 2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `category_Id` int(10) NOT NULL,
  `category` varchar(200) NOT NULL,
  `cat-description` varchar(200) NOT NULL,
  `votingList` int(11) DEFAULT NULL,
  `Flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`category_Id`, `category`, `cat-description`, `votingList`, `Flag`) VALUES
(16, 'Category ', 'Description of the category', 48, 0),
(28, 'Vice president', 'Vice president for kasjdhladaklkdfdsv', 36, 0),
(31, 'General Member', 'General Member for Prime Cultural Club', 47, 0),
(32, 'Vice president', 'Vice President for Cultural Club', 47, 0),
(33, 'President', 'President the top most position of Cultural Club', 47, 0),
(34, 'School Prefect', 'This post is for school prefect', 49, NULL),
(35, 'Club President', 'bacd', 49, NULL),
(36, 'General Member', 'General member for PBS', 49, NULL),
(37, 'Club Vice president', 'THis is for club vice president', 49, NULL),
(48, 'Member', 'Club member are those person who are selected to be a part of prime it hub and be as a volunteer in some program as well as actively participate in it', 55, NULL),
(49, 'Executive Member', 'Executive member are those who is selected to organize and direct orders to the general members and help the club to run properly', 55, NULL),
(50, 'President', 'President is the head of the club. His/her responsibility is to manage the club organize different program direct orders to the members and so on.', 55, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `voteId` int(11) NOT NULL,
  `candidateId` int(11) DEFAULT NULL,
  `votingId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `voteCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`voteId`, `candidateId`, `votingId`, `categoryId`, `voteCount`) VALUES
(1, 27, 36, 28, 0),
(2, 27, 36, 28, 1),
(3, 27, 36, 28, 1),
(4, 27, 36, 28, 1),
(5, 27, 36, 28, 1),
(26, 27, 36, 28, 1),
(27, 30, 47, 31, 1),
(28, 31, 47, 31, 1),
(29, 29, 47, 31, 1),
(30, 30, 47, 31, 1),
(31, 30, 47, 31, 1),
(32, 29, 47, 31, 1),
(33, 31, 47, 31, 1),
(34, 31, 47, 31, 1),
(36, 31, 47, 31, 1),
(37, 27, 36, 28, 1),
(38, 27, 36, 28, 1),
(39, 27, 36, 28, 1),
(40, 27, 36, 28, 1),
(41, 31, 47, 31, 1),
(42, 31, 47, 31, 1),
(43, 31, 47, 31, 1),
(44, 34, 49, 34, 1),
(45, 37, 49, 35, 1),
(46, 36, 49, 37, 1),
(47, 35, 49, 34, 1),
(48, 36, 49, 37, 1),
(49, 37, 49, 35, 1),
(50, 29, 47, 31, 1),
(51, 29, 47, 31, 1),
(52, 27, 36, 28, 1),
(55, 42, 55, 48, 1),
(56, 44, 55, 49, 1),
(57, 47, 55, 50, 1),
(58, 44, 55, 49, 1),
(59, 47, 55, 50, 1),
(60, 42, 55, 48, 1),
(61, 44, 55, 49, 1),
(62, 42, 55, 48, 1),
(63, 45, 55, 50, 1),
(64, 42, 55, 48, 1),
(65, 45, 55, 50, 1),
(66, 46, 55, 49, 1),
(67, 42, 55, 48, 1),
(68, 46, 55, 49, 1),
(69, 46, 55, 49, 1),
(70, 42, 55, 48, 1),
(71, 45, 55, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voted`
--

CREATE TABLE `voted` (
  `id` int(11) NOT NULL,
  `user` int(11) DEFAULT NULL,
  `cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voted`
--

INSERT INTO `voted` (`id`, `user`, `cat`) VALUES
(8, 13873, 28),
(9, 13873, 31),
(12, 12932, 31),
(13, 12932, 28),
(14, 1966, 31),
(15, 1966, 28),
(20, 18728, 28),
(21, 9841, 28),
(23, 9841, 31),
(24, 9841, 34),
(25, 9841, 35),
(26, 9841, 37),
(27, 1966, 34),
(28, 1966, 37),
(29, 1966, 35),
(31, 54742, 31),
(33, 78901, 38),
(34, 78901, 39),
(35, 89765, 48),
(36, 89765, 49),
(37, 89765, 50),
(38, 9841, 49),
(39, 9841, 50),
(40, 9841, 48),
(41, 3701, 49),
(42, 3701, 48),
(43, 3701, 50),
(44, 1966, 48),
(45, 1966, 50),
(46, 1966, 49),
(47, 112233, 48),
(48, 112233, 49),
(49, 12932, 49),
(50, 12932, 48),
(51, 12932, 50);

-- --------------------------------------------------------

--
-- Table structure for table `voter_list`
--

CREATE TABLE `voter_list` (
  `S.N` int(11) NOT NULL,
  `Full_name` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `College_Id_No.` int(30) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voter_list`
--

INSERT INTO `voter_list` (`S.N`, `Full_name`, `Gender`, `College_Id_No.`, `password`) VALUES
(48, 'gagan1', 'Male', 100, '9831'),
(44, 'Gagan', 'Male', 123, ''),
(45, 'asd', 'Male', 999, 'cbds'),
(28, 'Dipshika Bhandari', 'Female', 1966, '1818'),
(40, 'Bishwo Acharya', 'Male', 3701, 'riijan'),
(47, 'gagan', 'Male', 9101, 'hdfdk'),
(27, 'user', 'Male', 9841, '123'),
(24, 'dsfdsf', 'Male', 9875, 'sf'),
(29, 'Ram Shakya', 'Male', 12345, 'abcd'),
(14, 'Hari Adhikari', 'Male', 12932, 'hari'),
(17, 'Manjil Shrestha', 'Male', 13873, 'abcd'),
(63, 'Aayush Adhikari', 'Male', 17280, 'Aayush@123'),
(16, 'alish tamang', 'Male', 18728, 'alish'),
(25, 'sada', 'Male', 54742, '1234'),
(53, 'shova', 'Male', 77265, '123'),
(20, 'Dipshika Bhandari', 'Female', 78202, ''),
(61, 'Kumar Tamang', 'Male', 78901, 'Tamang@12'),
(62, 'Rajkumar Tamang', 'Male', 87123, 'Tamang@123'),
(64, 'Shyam Bhandari', 'Male', 89765, 'bhandari@1'),
(65, 'Ram Basnet', 'Male', 112233, 'Acharya@1'),
(60, 'Bahadur shah', 'Male', 556677, 'Nepal@123'),
(59, 'Ram Kumar Shrestha', 'Male', 567890, 'Acharya@1'),
(51, 'krishna', 'Male', 568031, '123'),
(57, 'Gagan Acharya', 'Male', 1798234, 'Acharya@1'),
(58, 'Gagan Acharya', 'Male', 1976265, 'Acharya@1'),
(8, 'Rikesh Shrestha', 'Female', 1989732, ''),
(15, 'Banepa', 'Male', 16832126, ''),
(9, 'this is from admin', 'Male', 37334242, ''),
(26, 'Aarati kharel', 'Female', 87473932, 'aaratikhar'),
(7, 'Gagan', 'Male', 190203030, ''),
(22, 'Rikesh shrestha', 'Male', 1234567890, '8b1a9953c4'),
(23, 'Gagan', 'Male', 2147483647, '');

-- --------------------------------------------------------

--
-- Table structure for table `voting_list`
--

CREATE TABLE `voting_list` (
  `votingId` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `organizer` varchar(100) NOT NULL,
  `start` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `end` datetime(6) NOT NULL,
  `resultStatus` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_list`
--

INSERT INTO `voting_list` (`votingId`, `name`, `description`, `organizer`, `start`, `end`, `resultStatus`) VALUES
(36, 'Dipshika voting', 'This is the voting of dipshika bhandari from nepal.', 'Dipshika bhandari', '2022-05-15 08:25:44.010684', '2023-03-01 00:59:00.000000', 0),
(47, 'Prime Cultural Club', 'We donot have description', 'Prime College', '2022-05-21 10:25:09.375718', '2022-05-30 04:31:00.000000', 1),
(48, 'Prime It Club', 'It club is organization this voting', 'Prime college', '2022-05-02 12:51:00.000000', '2022-07-09 18:36:00.000000', 0),
(49, 'Presidential Business School', 'This is the voting coducted by PBS for the selection of prefect of the college.', 'PBS', '2022-08-20 07:20:32.468822', '2022-05-18 14:34:00.000000', 0),
(55, 'Prime It hub', 'PrimeIt hub a newly from club in prime college. which is intended to provide workshops to the prime students', 'prime college', '2022-05-31 18:00:00.000000', '2022-06-10 23:45:00.000000', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidate_list`
--
ALTER TABLE `candidate_list`
  ADD PRIMARY KEY (`c-collegeId`),
  ADD UNIQUE KEY `cid` (`cid`),
  ADD KEY `categoryList` (`categoryList`),
  ADD KEY `votingList` (`votingList`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`category_Id`),
  ADD KEY `votingList` (`votingList`),
  ADD KEY `Flag` (`Flag`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`voteId`),
  ADD KEY `Candidate name` (`candidateId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `votingId` (`votingId`);

--
-- Indexes for table `voted`
--
ALTER TABLE `voted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `voted_ibfk_1` (`user`),
  ADD KEY `voted_ibfk_2` (`cat`);

--
-- Indexes for table `voter_list`
--
ALTER TABLE `voter_list`
  ADD PRIMARY KEY (`College_Id_No.`),
  ADD UNIQUE KEY `Serial number` (`S.N`);

--
-- Indexes for table `voting_list`
--
ALTER TABLE `voting_list`
  ADD PRIMARY KEY (`votingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `candidate_list`
--
ALTER TABLE `candidate_list`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `category_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `voteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `voted`
--
ALTER TABLE `voted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `voter_list`
--
ALTER TABLE `voter_list`
  MODIFY `S.N` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `voting_list`
--
ALTER TABLE `voting_list`
  MODIFY `votingId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `candidate_list`
--
ALTER TABLE `candidate_list`
  ADD CONSTRAINT `candidate_list_ibfk_1` FOREIGN KEY (`categoryList`) REFERENCES `category_list` (`category_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `candidate_list_ibfk_2` FOREIGN KEY (`votingList`) REFERENCES `voting_list` (`votingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `category_list`
--
ALTER TABLE `category_list`
  ADD CONSTRAINT `category_list_ibfk_1` FOREIGN KEY (`votingList`) REFERENCES `voting_list` (`votingId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`candidateId`) REFERENCES `candidate_list` (`cid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`categoryId`) REFERENCES `category_list` (`category_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vote_ibfk_3` FOREIGN KEY (`votingId`) REFERENCES `voting_list` (`votingId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
