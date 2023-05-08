-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-server
-- Generation Time: Jan 15, 2022 at 01:37 PM
-- Server version: 8.0.1-dmr
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--
CREATE DATABASE IF NOT EXISTS `project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `project`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `activated` bit(1) DEFAULT b'0',
  `role` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dayoff` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `activated`, `role`, `name`, `gender`, `phone`, `mail`, `position`, `department`, `avatar`, `dayoff`) VALUES
(1, 'admin', '$2y$10$rqEbk41xz4WVGMKZ224rxusVZaeUnnRoZ6bWk2ytCOTzKLUMKgGOO', b'1', 3, 'Nguyễn Hữu Huy', 'Nam', '0869719487', 'huuhuy@gmail.com', 'Giám đốc', 'Giám Đốc', 'samsung-galaxy-a22-6gb-128gb-tim-1.jpg', 0),
(2, 'sangsinh', '$2y$10$A4OOpPavudhdfit6v7Ji5ugcIeEkkw99x3Sw3AXXJcaR4YM1l74ae', b'1', 2, 'Nguyễn Sang Sinh', 'Nam', '0859857083', 'sangsinh.kn@gmail.com', 'Trưởng phòng', 'Phát triển phần mềm', 'male.svg', 0),
(3, 'thachhuu', '$2y$10$i2Oss0ZEzMg/lyjLXwHMaeEFx.Tgu1vUTT/.051Vc.f7mfJYGr.iC', b'0', 2, 'Thạch Thanh Hữu', 'Nam', '08123781273', 'thachthanhhuu@gmail.com', 'Trưởng phòng', 'Triển khai phần mềm', 'male.svg', 0),
(4, 'vutrunghau', '$2y$10$XOJlxOQ.WOHRs4AunXu6Geen59QfWVd5Jc6RzWteGkYWV4BmARgXa', b'1', 2, 'Vũ Trung Hậu', 'Nam', '076819572', 'vutrunghau@gmail.com', 'Trưởng phòng', 'Kiểm thử phần mềm', 'male.svg', 0),
(5, 'huuhoa', '$2y$10$a1ulQYqNGuO4ibXHTY34iOkT.npN2PkaioCjS4Own/8PTLgQIkl7u', b'1', 1, 'Nguyễn Hữu Hòa', 'Nam', '0581923750', 'huuhoa@gmail.com', 'Nhân viên', 'Kiểm thử phần mềm', 'male.svg', 0),
(6, 'duchung', '$2y$10$xq2gbAfuIJpnYbGys2Btwe3wR.xZ4ml/8fZd.KwYXz1sIEHbDXbwS', b'1', 1, 'Trần Đức Hưng', 'Nam', '068912375', 'duchung@gmail.com', 'Nhân viên', 'Phát triển phần mềm', 'male.svg', 0),
(7, 'quynhhuong', '$2y$10$sHcXXTFSjFwnscxRVKhiNOOfkA74eSfskLNj6lBIxEoZXH3oNFoD6', b'0', 1, 'Nguyễn Quỳnh Hương', 'Nam', '01527981', 'quynhuong@gmail.com', 'Nhân viên', 'Triển khai phần mềm', 'female.svg', 0),
(9, 'thienhuong', '$2y$10$7SsC3JA4GRYWE5g7PuBN3OOI6by2SrX7DEzBjAUKOaCBZiarsuTsy', b'0', 1, 'Võ Thiên Hương', 'Nữ', '012378912', 'thienhuong@gmail.com', 'Nhân viên', 'Kiểm thử phần mềm', 'female.svg', 0),
(11, 'vankhanh', '$2y$10$MnUwR1DgsgWadV2cS6ZOt.QGwxtNNnwPyzIVS1Pek.RPsSOkrfMH.', b'1', 1, 'Vũ Vân Khánh', 'Nữ', '05893815', 'vankhanh@gmail.com', 'Nhân viên', 'Phát triển phần mềm', 'female.svg', 0),
(13, 'baokhanh', '$2y$10$rLphmLPyVB5ZzMJvTiFvu.MuZnXifN.fCx5.IE4AeZFOUfTWuUtAq', b'0', 1, 'Nguyễn Bảo Khánh', 'Nam', '0814241672', 'baokhanh@gmail.com', 'Nhân viên', 'Kiểm thử phần mềm', 'avatar.jpg', 0),
(15, 'minhnhat', '$2y$10$0isN2iTGB7XrG0fpVon6jOy2Qn2brIwDDNLNolb1Fkewevi7xP8hC', b'0', 1, 'Vũ Minh Nhật', 'Nam', '0851928371', 'minhnhat@gmail.com', 'Nhân viên', 'Phát triển phần mềm', 'avatar.jpg', 0),
(17, 'minhkhue', '$2y$10$B9SXez9XONPxfD5258uhFeCVeFtyTCCqALTYxdLUiR/F6k1Jm44oW', b'0', 1, 'Nguyễn Minh Khuê', 'Nam', '0851982312', 'minhkhue@gmail.com', 'Nhân viên', 'Triển khai phần mềm', 'avatar.jpg', 0),
(19, 'baohan', '$2y$10$81AyqbnVtYy3im8pP9qgKuiPfXiW4JnMPZSsrHEMqvovy7i6Ioh/S', b'0', 1, 'Nguyễn Bảo Hân', 'Nam', '0851928312', 'baohan@gmail.com', 'Nhân viên', 'Phát triển phần mềm', 'avatar.jpg', 0),
(21, 'truongkha', '$2y$10$bA3gC95Vd1qNR8G.xUORSOnTNGy4HiLl1JoPkOryiIbRzLsgOVJlG', b'0', 1, 'Nguyễn Trường Khả', 'Nam', '0851928312', 'truongkha@gmail.com', 'Nhân viên', 'Phát triển phần mềm', 'avatar.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `departmentName` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `room` int(11) DEFAULT NULL,
  `manager` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `departmentName`, `description`, `room`, `manager`) VALUES
(1, 'Kiểm thử phần mềm', 'Phòng có chức năng kiểm thử các phần mềm trước khi đem đi triền khai', 7, 'vutrunghau'),
(2, 'Phát triển phần mềm', 'Phòng có chức năng phát triển, quản lý sửa chữa bảo trì các phần mềm', 10, 'sangsinh'),
(3, 'Triển khai phần mềm', 'Phòng có chức năng deploy sản phẩm đến khách hàng', 6, 'thachhuu');

-- --------------------------------------------------------

--
-- Table structure for table `requestabsence`
--

CREATE TABLE `requestabsence` (
  `id` int(11) NOT NULL,
  `username` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `dayAbsence` int(11) NOT NULL,
  `reason` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `expire_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `requestabsence`
--

INSERT INTO `requestabsence` (`id`, `username`, `department`, `role`, `dayAbsence`, `reason`, `file`, `status`, `date`, `expire_on`) VALUES
(1, 'sangsinh', 'Phát triển phần mềm', 2, 3, 'Về thăm gia đình', 'TĐT_logo.png', 'waiting', '2022-01-15 12:59:00', 1642856396),
(2, 'duchung', 'Phát triển phần mềm', 1, 2, 'Nghỉ lễ Valentine', '', 'waiting', '2022-01-15 01:00:00', 1642856410),
(3, 'vutrunghau', 'Kiểm thử phần mềm', 2, 5, 'Nghỉ thêm lễ 30/4', '', 'waiting', '2022-01-15 01:12:00', 1642857174),
(4, 'huuhoa', 'Kiểm thử phần mềm', 1, 3, 'chăm mẹ', '', 'waiting', '2022-01-15 01:13:00', 1642857205),
(5, 'vankhanh', 'Phát triển phần mềm', 1, 10, 'Bị mắc Covid', 'Công nhân, tư sản, tiểu tư sản.docx', 'waiting', '2022-01-15 01:32:00', 1642858341);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `employee` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadline` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deadtime` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `describ` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `process` varchar(28) COLLATE utf8_unicode_ci NOT NULL,
  `feedback` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_submit` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`, `employee`, `deadline`, `deadtime`, `describ`, `file`, `process`, `feedback`, `file_submit`, `rating`, `department`, `date`) VALUES
(1, 'Thêm giao diện', 'duchung', '2022-01-15', '11:59', '', 'Công nhân, tư sản, tiểu tư sản.docx', 'task-waiting', 'Đã hoàn thành', 'Công nhân, tư sản, tiểu tư sản.docx', NULL, 'Phát triển phần mềm', '2022-01-15 12:49:00'),
(2, 'Thêm sản phẩm', 'duchung', '2022-01-17', '11:59', 'Thêm sản phẩm mới', '', 'task-complete', 'Đã hoàn thành', 'Công nhân, tư sản, tiểu tư sản.docx', 'Good', 'Phát triển phần mềm', '2022-01-15 12:51:00'),
(3, 'Kiểm thử', 'duchung', '2022-01-15', '11:59', '', '', 'task-rejected', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 12:52:00'),
(4, 'Thêm giao diện 2', 'vankhanh', '2022-01-17', '11:59', 'Thêm giao diện thứ 2', 'ahead.png', 'task-canceled', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 12:55:00'),
(5, 'Tác vụ mới cho Đức Hưng', 'duchung', '2022-01-15', '11:59', 'Hoàn thành bài tập', '', 'task-new', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 12:59:00'),
(6, 'Một tác vụ nào đó', 'duchung', '2022-01-25', '11:59', 'Mô tả', 'EQ2.png//EQ1.png', 'task-new', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 01:03:00'),
(7, 'Một tác vụ', 'huuhoa', '2022-01-15', '11:59', '', '', 'task-rejected', '', '', NULL, 'Kiểm thử phần mềm', '2022-01-15 01:05:00'),
(8, 'Tác vụ 2', 'huuhoa', '2022-01-19', '03:03', 'Tác vụ thứ 2', 'CHU NGHIA XA HOI CUOI KY.docx', 'task-waiting', '', '', NULL, 'Kiểm thử phần mềm', '2022-01-15 01:06:00'),
(9, 'Tác vụ 2', 'huuhoa', '2022-01-19', '03:03', '', 'CHU NGHIA XA HOI CUOI KY.docx', 'task-rejected', '', '', NULL, 'Kiểm thử phần mềm', '2022-01-15 01:06:00'),
(10, 'Giao diện đặc biệt', 'huuhoa', '2022-01-15', '11:59', '', '', 'task-complete', '', '', 'Good', 'Kiểm thử phần mềm', '2022-01-15 01:06:00'),
(11, 'Kiểm thử phần mềm A', 'huuhoa', '2022-01-15', '11:59', 'Kiểm thử phần mềm', 'EQ2.png//EQ1.png', 'task-new', '', '', NULL, 'Kiểm thử phần mềm', '2022-01-15 01:07:00'),
(12, 'Nhập dữ liệu vùng miền', 'vankhanh', '2022-01-15', '11:59', 'Nhập dữ liệu', 'BC_XLA.docx//BC_XLA (1).docx', 'task-new', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 01:30:00'),
(13, 'Kiểm tra dữ liệu', 'vankhanh', '2022-01-15', '11:59', '', '', 'task-progress', '', '', NULL, 'Phát triển phần mềm', '2022-01-15 01:31:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestabsence`
--
ALTER TABLE `requestabsence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requestabsence`
--
ALTER TABLE `requestabsence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
