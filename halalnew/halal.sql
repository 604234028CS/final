-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22 มี.ค. 2020 เมื่อ 03:04 PM
-- เวอร์ชันของเซิร์ฟเวอร์: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `halal`
--

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `addmin`
--

CREATE TABLE `addmin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(30) NOT NULL,
  `a_sname` varchar(30) NOT NULL,
  `a_sex` varchar(30) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_phone` varchar(12) NOT NULL,
  `a_password` varchar(10) NOT NULL,
  `a_status` varchar(50) NOT NULL,
  `a_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `addmin`
--

INSERT INTO `addmin` (`a_id`, `a_name`, `a_sname`, `a_sex`, `a_email`, `a_phone`, `a_password`, `a_status`, `a_address`) VALUES
(1, 'อาดินัส', 'สบูบก', 'ชาย', 'computerfile3@gmail.com', '0805405410', '1234', 'ผู้นำศาสนา', 'มัสยิดโคกเมา');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `member`
--

CREATE TABLE `member` (
  `mem_id` int(11) NOT NULL,
  `mem_name` varchar(50) DEFAULT NULL,
  `mem_lastname` varchar(50) DEFAULT NULL,
  `mem_sex` varchar(10) DEFAULT NULL,
  `mem_email` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(10) DEFAULT NULL,
  `mem_password` varchar(25) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `member`
--

INSERT INTO `member` (`mem_id`, `mem_name`, `mem_lastname`, `mem_sex`, `mem_email`, `phonenumber`, `mem_password`, `status`, `address`) VALUES
(2, 'admin', NULL, NULL, 'admin@test.com', NULL, '12345', 'ผู้ออกฮาลาล', NULL),
(5, 'wanida', 'baikodem', 'หญิง', 'nunut-15@hotmail.co.th', '063-920557', '12345', 'สมาชิก', '76 ม.3 ต.ย่านซื่อ อ.ควนโดน จ.สตูล 91160'),
(6, 'needa', 'baikodem', 'หญิง', 'nida@gmail.com', '063-920557', '12345', 'สมาชิก', '76 ม.3 ต.ย่านซื่อ อ.ควนโดน จ.สตูล 91160'),
(7, 'tera', 'rak', 'ชาย', 'tera@gmail.com', '099999999', '1234', 'สมาชิก', '234 สงขลา');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `operator`
--

CREATE TABLE `operator` (
  `op_id` int(11) NOT NULL,
  `op_com` varchar(100) DEFAULT NULL,
  `op_idcard` varchar(13) DEFAULT NULL,
  `address` varchar(355) DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `operator`
--

INSERT INTO `operator` (`op_id`, `op_com`, `op_idcard`, `address`, `mem_id`, `logo`) VALUES
(12, 'nina', '1232354324534', '12 จ.สงขลา', 5, '43542057.jpg'),
(13, 'needashop', '1234134524515', 'สงขลา', 6, 'Pokemon-1.png');

-- --------------------------------------------------------

--
-- โครงสร้างตาราง `product`
--

CREATE TABLE `product` (
  `procduct_id` int(10) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_brand` varchar(100) DEFAULT NULL,
  `product_company` varchar(100) DEFAULT NULL,
  `product_add` varchar(100) DEFAULT NULL,
  `mem_id` int(11) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- dump ตาราง `product`
--

INSERT INTO `product` (`procduct_id`, `product_name`, `product_brand`, `product_company`, `product_add`, `mem_id`, `status`, `img`) VALUES
(0, 'ขนมปัง ', 'atic', 'company', '0900735950', 7, 'อนุมัติ', 'unit3.png'),
(1234, 'ขนม ', 'lay', 'totoro', '12 ม.1 ต.อุใด อ.ควนกาหลง จ.สงขลา', 6, 'อนุมัติ', 'Pokemon-1.png'),
(9092, 'ขนมปัง ', 'atic', 'heartbead', '76 ม.3 ต.ย่านซื่อ อ.ควนโดน จ.สตูล 91160', 5, 'อนุมัติ', 'ดาวน์โหลด.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addmin`
--
ALTER TABLE `addmin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`mem_id`),
  ADD UNIQUE KEY `mem_email` (`mem_email`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`op_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`procduct_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `mem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `op_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
