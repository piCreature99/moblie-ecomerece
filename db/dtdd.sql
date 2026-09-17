-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: May 14, 2026 at 04:24 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtdd`
--

-- --------------------------------------------------------

--
-- Table structure for table `dienthoai`
--

CREATE TABLE `dienthoai` (
  `madt` char(4) NOT NULL,
  `tendt` varchar(50) NOT NULL,
  `mahang` char(4) NOT NULL,
  `gia` int(11) NOT NULL,
  `thongsokythuat` varchar(50) NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dienthoai`
--

INSERT INTO `dienthoai` (`madt`, `tendt`, `mahang`, `gia`, `thongsokythuat`, `hinhanh`) VALUES
('AP01', 'Điện thoại iPhone 16e', 'MHAP', 18900000, '128GB 6GB RAM chip A18', 'Iphone16e.jpg'),
('AP02', 'Điện thoại iPhone 15', 'MHAP', 16500000, '128GB 6GB RAM chip A16 Bionic', 'Iphone15.jpg'),
('AP03', 'Điện thoại iPhone 16 Pro Max', 'MHAP', 32500000, '256GB 8GB RAM chip A18 Pro', '16ProMax.jpg'),
('SO01', 'Điện thoại Sony Xperia 1 VI', 'MHSO', 28900000, '256GB 12GB RAM chip Snapdragon 8 Gen 3', 'Xperia1VI.jpg'),
('SO02', 'Điện thoại Sony Xperia 5 V', 'MHSO', 19500000, '128GB 8GB RAM chip Snapdragon 8 Gen 2', 'Xperia5V.jpg'),
('SO03', 'Điện thoại Sony Xperia 10 VI', 'MHSO', 10800000, '128GB 6GB RAM chip Snapdragon 6 Gen 1', 'Xperia10VI.jpg'),
('SS01', 'Điện thoại SAMSUNG S25 ULTRA', 'MHSS', 12550000, '128GB 8GB RAM chip 4 nhân', 'S25ULTRA.jpg'),
('SS02', 'Điện thoại SAMSUNG S25 FE', 'MHSS', 10200000, '128GB 8GB RAM chip Exynos', 'S25FE.jpg'),
('SS03', 'Điện thoại SAMSUNG S26 Plus', 'MHSS', 15800000, '256GB 12GB RAM chip 8 nhân', 'S26+.jpg'),
('XI01', 'Điện thoại Xiaomi Redmi Note 15', 'MHXI', 7500000, '128GB 6GB RAM chip Dimensity', 'RedmiNote15.jpg'),
('XI02', 'Điện thoại Xiaomi Redmi 15', 'MHXI', 5200000, '64GB 4GB RAM chip Snapdragon', 'Redmi15.jpg'),
('XI03', 'Điện thoại Xiaomi Redmi Note 14', 'MHXI', 6800000, '128GB 8GB RAM chip MediaTek', 'RedmiNote14.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hangsx`
--

CREATE TABLE `hangsx` (
  `mahang` char(4) NOT NULL,
  `tenhang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hangsx`
--

INSERT INTO `hangsx` (`mahang`, `tenhang`) VALUES
('MHSS', 'SAMSUNG'),
('MHAP', 'APPLE'),
('MHSO', 'SONY'),
('MHXI', 'XIAOMI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dienthoai`
--
ALTER TABLE `dienthoai`
  ADD PRIMARY KEY (`madt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
