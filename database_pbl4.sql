-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 05:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pbl4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin123', '123123123');

-- --------------------------------------------------------

--
-- Table structure for table `buoihoc`
--

CREATE TABLE `buoihoc` (
  `GioBatDau` time NOT NULL,
  `GioKetThuc` time NOT NULL,
  `NgayHoc` date NOT NULL,
  `ID_Lop` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capdo`
--

CREATE TABLE `capdo` (
  `ID` int(11) NOT NULL,
  `TenCapDo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `capdo`
--

INSERT INTO `capdo` (`ID`, `TenCapDo`) VALUES
(1, 'N1'),
(2, 'N2'),
(3, 'N3'),
(4, 'N4'),
(5, 'N5');

-- --------------------------------------------------------

--
-- Table structure for table `diemdanh`
--

CREATE TABLE `diemdanh` (
  `ID` int(11) NOT NULL,
  `ID_BuoiHoc` int(11) NOT NULL,
  `ID_HocVien` int(11) NOT NULL,
  `ThoiGianDiemDanh` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hocky`
--

CREATE TABLE `hocky` (
  `ID` int(11) NOT NULL,
  `NgayBatDau` date NOT NULL,
  `NgayKetThuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocky`
--

INSERT INTO `hocky` (`ID`, `NgayBatDau`, `NgayKetThuc`) VALUES
(1, '2023-10-19', '2024-10-19'),
(2, '2023-09-08', '2024-09-08');

-- --------------------------------------------------------

--
-- Table structure for table `hocvien`
--

CREATE TABLE `hocvien` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` enum('Nam','Nữ') NOT NULL,
  `Email` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `Anh` varchar(255) NOT NULL,
  `ID_Lop` int(11) NOT NULL,
  `ID_CapDo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hocvien`
--

INSERT INTO `hocvien` (`ID`, `Ten`, `NgaySinh`, `GioiTinh`, `Email`, `DiaChi`, `Anh`, `ID_Lop`, `ID_CapDo`) VALUES
(1, 'nguyen van a', '2024-10-02', 'Nam', 'nguyenvana@gmail.com', '292 ly thuong kiet', '', 1, 3),
(2, 'tran thi b', '2024-09-25', 'Nữ', 'tranthib@gmail.com', '123 duong 3/2', '', 1, 2),
(3, 'le van c', '2024-08-14', 'Nam', 'levanc@gmail.com', '456 hoang hoa tham', '', 1, 5),
(5, 'nguyen van e', '2024-06-11', 'Nam', 'nguyenvane@gmail.com', '123 phan dinh phung', '', 3, 3),
(6, 'hoang thi f', '2024-05-15', 'Nữ', 'hoangthif@gmail.com', '654 le loi', '', 1, 1),
(7, 'le van g', '2024-04-22', 'Nam', 'levang@gmail.com', '234 tran hung dao', '', 1, 2),
(9, 'nguyen van i', '2024-02-18', 'Nam', 'nguyenvani@gmail.com', '789 truong dinh', '', 1, 1),
(10, 'tran thi k', '2024-01-09', 'Nữ', 'tranthik@gmail.com', '234 dien bien phu', '', 1, 2),
(11, 'le van l', '2023-12-29', 'Nam', 'levanl@gmail.com', '567 ba trieu', '', 1, 3),
(12, 'pham thi m', '2023-11-17', 'Nữ', 'phamthim@gmail.com', '678 quang trung', '', 1, 1),
(13, 'nguyen van n', '2023-10-05', 'Nam', 'nguyenvann@gmail.com', '123 cach mang thang tam', '', 1, 2),
(14, 'hoang thi o', '2023-09-12', 'Nữ', 'hoangthio@gmail.com', '234 le thanh ton', '', 2, 3),
(15, 'le van p', '2023-08-01', 'Nam', 'levanp@gmail.com', '789 tran phu', '', 2, 1),
(16, 'pham thi q', '2023-07-15', 'Nữ', 'phamthiq@gmail.com', '123 tran hung dao', '', 2, 2),
(17, 'nguyen van r', '2023-06-25', 'Nam', 'nguyenvanr@gmail.com', '456 nguyen du', '', 2, 3),
(18, 'tran thi s', '2023-05-30', 'Nữ', 'tranthis@gmail.com', '789 le quang dinh', '', 2, 1),
(19, 'le van t', '2023-04-18', 'Nam', 'levant@gmail.com', '123 nguyen van troi', '', 2, 2),
(20, 'pham thi u', '2023-03-25', 'Nữ', 'phamthiu@gmail.com', '234 tran quoc toan', '', 2, 3),
(21, 'nguyen van v', '2023-02-11', 'Nam', 'nguyenvanv@gmail.com', '567 ngo gia tu', '', 2, 1),
(22, 'tran thi w', '2023-01-05', 'Nữ', 'tranthiw@gmail.com', '789 le hong phong', '', 2, 2),
(23, 'le van x', '2022-12-22', 'Nam', 'levanx@gmail.com', '123 nguyen thi minh khai', '', 2, 3),
(24, 'pham thi y', '2022-11-09', 'Nữ', 'phamthiy@gmail.com', '234 vo thi sau', '', 2, 1),
(25, 'nguyen van z', '2022-10-17', 'Nam', 'nguyenvanz@gmail.com', '567 ngo tat to', '', 2, 2),
(26, 'hoang thi aa', '2022-09-26', 'Nữ', 'hoangthiaa@gmail.com', '789 ly chinh thang', '', 2, 3),
(27, 'le van bb', '2022-08-14', 'Nam', 'levanbb@gmail.com', '123 hai ba trung', '', 3, 1),
(28, 'pham thi cc', '2022-07-22', 'Nữ', 'phamthicc@gmail.com', '234 nguyen an ninh', '', 3, 2),
(29, 'nguyen van dd', '2022-06-13', 'Nam', 'nguyenvandd@gmail.com', '567 hong bang', '', 3, 3),
(30, 'tran thi ee', '2022-05-01', 'Nữ', 'tranthiee@gmail.com', '789 tan ky tan quy', '', 3, 1),
(32, 'pham thi gg', '2022-03-09', 'Nữ', 'phamthigg@gmail.com', '234 dao duy tu', '', 3, 3),
(33, 'nguyen van hh', '2022-02-18', 'Nam', 'nguyenvanhh@gmail.com', '567 nguyen hue', '', 3, 1),
(34, 'hoang thi ii', '2022-01-05', 'Nữ', 'hoangthiii@gmail.com', '789 cong hoa', '', 3, 2),
(35, 'le van jj', '2021-12-28', 'Nam', 'levanjj@gmail.com', '123 an duong vuong', '', 3, 3),
(36, 'pham thi kk', '2021-11-16', 'Nữ', 'phamthikk@gmail.com', '234 tran khac chan', '', 3, 1),
(37, 'nguyen van ll', '2021-10-25', 'Nam', 'nguyenvanll@gmail.com', '567 nguyen cong tru', '', 3, 2),
(38, 'tran thi mm', '2021-09-11', 'Nữ', 'tranthimm@gmail.com', '789 nguyen tat thanh', '', 3, 3),
(39, 'le van nn', '2021-08-01', 'Nam', 'levannn@gmail.com', '123 hung vuong', '', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lop`
--

CREATE TABLE `lop` (
  `ID` int(11) NOT NULL,
  `TenLop` varchar(255) NOT NULL,
  `ID_CapDo` int(11) NOT NULL,
  `ID_HocKy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `lop`
--

INSERT INTO `lop` (`ID`, `TenLop`, `ID_CapDo`, `ID_HocKy`) VALUES
(1, 'N3_A', 3, 1),
(2, 'N5_A', 5, 1),
(3, 'N5_B', 5, 1),
(4, 'N1_A', 1, 2),
(5, 'N4_A', 4, 2),
(6, 'N2_A', 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `buoihoc`
--
ALTER TABLE `buoihoc`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Lop` (`ID_Lop`);

--
-- Indexes for table `capdo`
--
ALTER TABLE `capdo`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_BuoiHoc` (`ID_BuoiHoc`),
  ADD KEY `ID_HocVien` (`ID_HocVien`);

--
-- Indexes for table `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CapDo` (`ID_CapDo`),
  ADD KEY `ID_Lop` (`ID_Lop`);

--
-- Indexes for table `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_CapDo` (`ID_CapDo`),
  ADD KEY `ID_HocKy` (`ID_HocKy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `buoihoc`
--
ALTER TABLE `buoihoc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capdo`
--
ALTER TABLE `capdo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hocky`
--
ALTER TABLE `hocky`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `hocvien`
--
ALTER TABLE `hocvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `lop`
--
ALTER TABLE `lop`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buoihoc`
--
ALTER TABLE `buoihoc`
  ADD CONSTRAINT `buoihoc_ibfk_1` FOREIGN KEY (`ID_Lop`) REFERENCES `lop` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `diemdanh_ibfk_1` FOREIGN KEY (`ID_BuoiHoc`) REFERENCES `buoihoc` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diemdanh_ibfk_2` FOREIGN KEY (`ID_HocVien`) REFERENCES `hocvien` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hocvien`
--
ALTER TABLE `hocvien`
  ADD CONSTRAINT `hocvien_ibfk_1` FOREIGN KEY (`ID_CapDo`) REFERENCES `capdo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hocvien_ibfk_2` FOREIGN KEY (`ID_Lop`) REFERENCES `lop` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`ID_CapDo`) REFERENCES `capdo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lop_ibfk_2` FOREIGN KEY (`ID_HocKy`) REFERENCES `hocky` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
