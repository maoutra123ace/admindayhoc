-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2021 lúc 06:58 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dayhoc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin@gmail.com', '4297f44b13955235245b2497399d7a93', 'Anh Vỹ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(16, 'Văn học'),
(17, 'Tin học'),
(18, 'Toán học'),
(19, 'Ngoại ngữ'),
(20, 'Hóa học');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `giaodich_id` int(11) NOT NULL,
  `ngaythang` date NOT NULL,
  `mahoadon` varchar(100) NOT NULL,
  `tinhtrangdon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `giaodich_id`, `ngaythang`, `mahoadon`, `tinhtrangdon`) VALUES
(8, 7, '2021-05-07', 'hóa đơn 2', 'Chưa thanh toán');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `lophoc_id` int(11) NOT NULL,
  `tengiaodich` varchar(100) NOT NULL,
  `giagiaodich` int(11) NOT NULL,
  `ngaythang` date NOT NULL,
  `hocsinh_id` int(11) NOT NULL,
  `tinhtrangdon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `lophoc_id`, `tengiaodich`, `giagiaodich`, `ngaythang`, `hocsinh_id`, `tinhtrangdon`) VALUES
(7, 16, 'Giao dịch 1', 150000, '2021-05-10', 6, 'Chưa đăng kí'),
(8, 17, '213213asas', 121212, '2021-05-12', 6, 'Chấp nhận đăng kí'),
(9, 18, '1222', 1222, '2021-05-18', 7, 'Từ chối đăng kí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giaovien`
--

CREATE TABLE `tbl_giaovien` (
  `giaovien_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `category_id` int(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giaovien`
--

INSERT INTO `tbl_giaovien` (`giaovien_id`, `name`, `phone`, `address`, `category_id`, `email`, `password`) VALUES
(13, 'Trần Vương', '0362465660', 'TPHCM', 17, 'vuong@gmail.com', '4297f44b13955235245b2497399d7a93'),
(14, 'Trần Đức Dũng', '0932454796', 'Hà Nội', 16, 'dung@gmail.com', '4297f44b13955235245b2497399d7a93'),
(15, 'Mạnh Đức Hòa', '0399477942', 'Đà Nẵng', 18, 'hoa1@gmail.com', '4297f44b13955235245b2497399d7a93'),
(16, 'Huỳnh Công Đức', '0362445661', 'Quy Nhơn', 16, 'duc1@gmail.com', '4297f44b13955235245b2497399d7a93'),
(17, 'Trà Vương Thái Bảo', '0399477941', 'Cần Thơ', 19, 'bao1@gmail.com', '6caed8e064b0e75565b4f009ab042125');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_hocsinh`
--

CREATE TABLE `tbl_hocsinh` (
  `hocsinh_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `class` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_hocsinh`
--

INSERT INTO `tbl_hocsinh` (`hocsinh_id`, `name`, `phone`, `address`, `class`, `email`, `password`) VALUES
(5, 'Trà Anh Vỹ', '0399477942', 'TPHCM', 12, 'vy@gmail.com', '4297f44b13955235245b2497399d7a93'),
(6, 'Đoàn Trung Tín', '0399477212', 'TPHCM', 11, 'tin@gmail.com', '4297f44b13955235245b2497399d7a93'),
(7, 'Bùi Tấn Trung', '0121548711', 'An Giang', 12, 'trung@gmail.com', '4297f44b13955235245b2497399d7a93');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lophoc`
--

CREATE TABLE `tbl_lophoc` (
  `lophoc_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `giaovien_id` int(11) DEFAULT NULL,
  `tenlophoc` varchar(200) NOT NULL,
  `lophoc_giaca` int(11) NOT NULL,
  `lophoc_hinhanh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_lophoc`
--

INSERT INTO `tbl_lophoc` (`lophoc_id`, `category_id`, `giaovien_id`, `tenlophoc`, `lophoc_giaca`, `lophoc_hinhanh`) VALUES
(16, 16, 14, 'Văn học 11 siêu dễ hiểu', 100000, '1167538_1479862222679_400_300.jpg'),
(17, 17, 13, 'Lớp tin cấp tốc lập trình', 100000, '8d6113e42df97d6fa0f08cbfc9d1151c.png_wh860.png'),
(18, 19, 17, 'Lớp tiếng anh IELST 6.0', 150000, 'unnamed.png'),
(20, 16, 16, 'Văn siêu hay lớp 12', 200000, '179222017_3628145510743376_4249118153853761577_n.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`),
  ADD KEY `giaodich_id` (`giaodich_id`);

--
-- Chỉ mục cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`),
  ADD KEY `lophoc_id` (`lophoc_id`),
  ADD KEY `hocsinh_id` (`hocsinh_id`);

--
-- Chỉ mục cho bảng `tbl_giaovien`
--
ALTER TABLE `tbl_giaovien`
  ADD PRIMARY KEY (`giaovien_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `tbl_hocsinh`
--
ALTER TABLE `tbl_hocsinh`
  ADD PRIMARY KEY (`hocsinh_id`);

--
-- Chỉ mục cho bảng `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD PRIMARY KEY (`lophoc_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `giaovien_id` (`giaovien_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_giaovien`
--
ALTER TABLE `tbl_giaovien`
  MODIFY `giaovien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_hocsinh`
--
ALTER TABLE `tbl_hocsinh`
  MODIFY `hocsinh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  MODIFY `lophoc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_ibfk_3` FOREIGN KEY (`giaodich_id`) REFERENCES `tbl_giaodich` (`giaodich_id`);

--
-- Các ràng buộc cho bảng `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD CONSTRAINT `tbl_giaodich_ibfk_2` FOREIGN KEY (`hocsinh_id`) REFERENCES `tbl_hocsinh` (`hocsinh_id`),
  ADD CONSTRAINT `tbl_giaodich_ibfk_3` FOREIGN KEY (`lophoc_id`) REFERENCES `tbl_lophoc` (`lophoc_id`);

--
-- Các ràng buộc cho bảng `tbl_giaovien`
--
ALTER TABLE `tbl_giaovien`
  ADD CONSTRAINT `tbl_giaovien_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`);

--
-- Các ràng buộc cho bảng `tbl_lophoc`
--
ALTER TABLE `tbl_lophoc`
  ADD CONSTRAINT `tbl_lophoc_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`category_id`),
  ADD CONSTRAINT `tbl_lophoc_ibfk_2` FOREIGN KEY (`giaovien_id`) REFERENCES `tbl_giaovien` (`giaovien_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
