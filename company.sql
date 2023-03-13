-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 09:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'sharaf', '123');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created-at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `created-at`) VALUES
(11, 'marketing', '2023-03-08 14:18:48'),
(13, 'mobile', '2023-03-08 14:18:52'),
(18, 'aaaaaaa', '2023-03-10 17:14:46'),
(19, 'maliat', '2023-03-11 14:12:03'),
(20, 'edara', '2023-03-11 14:12:11'),
(21, 'it', '2023-03-12 17:42:07'),
(22, 'it', '2023-03-12 18:27:47'),
(23, 'it', '2023-03-12 18:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `emp-name` varchar(50) CHARACTER SET ucs2 COLLATE ucs2_general_ci NOT NULL,
  `salary` int(11) NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created-at` date NOT NULL DEFAULT current_timestamp(),
  `dept-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `emp-name`, `salary`, `image`, `created-at`, `dept-id`) VALUES
(29, 'mohamed ashraf', 12121212, '167854344911111.JPG', '2023-03-11', 11),
(30, 'ashraf', 3333333, '1678543505327fa7bd-eebb-4a7b-a257-60fa898960fa.jpg', '2023-03-11', 18),
(31, 'malek', 4444444, '167854349211111111111.JPG', '2023-03-11', 19);

-- --------------------------------------------------------

--
-- Stand-in structure for view `empwithdept`
-- (See below for the actual view)
--
CREATE TABLE `empwithdept` (
`empId` int(11)
,`empName` varchar(50)
,`empImage` text
,`empSalary` int(11)
,`deptId` int(11)
,`deptName` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `empwithdept`
--
DROP TABLE IF EXISTS `empwithdept`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `empwithdept`  AS SELECT `employee`.`id` AS `empId`, `employee`.`emp-name` AS `empName`, `employee`.`image` AS `empImage`, `employee`.`salary` AS `empSalary`, `department`.`id` AS `deptId`, `department`.`name` AS `deptName` FROM (`employee` join `department` on(`employee`.`dept-id` = `department`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept-id` (`dept-id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`dept-id`) REFERENCES `department` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
