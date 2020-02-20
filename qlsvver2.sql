-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 20, 2020 lúc 11:45 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsvver2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethocphan`
--

CREATE TABLE `chitiethocphan` (
  `id_user` varchar(32) NOT NULL,
  `id_module` int(32) NOT NULL,
  `date_register` varchar(32) DEFAULT NULL,
  `score_regular_1` float DEFAULT NULL,
  `score_regular_2` float DEFAULT NULL,
  `score_regular_3` float DEFAULT NULL,
  `score_mid_1` float DEFAULT NULL,
  `score_mid_2` float DEFAULT NULL,
  `quantity_leave` int(2) DEFAULT 0,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `chitiethocphan`
--

INSERT INTO `chitiethocphan` (`id_user`, `id_module`, `date_register`, `score_regular_1`, `score_regular_2`, `score_regular_3`, `score_mid_1`, `score_mid_2`, `quantity_leave`, `status`) VALUES
('1141460161', 4, '2020-02-18', 9, 9, NULL, 10, NULL, 12, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphan`
--

CREATE TABLE `hocphan` (
  `id_module` int(32) NOT NULL,
  `id_subject` int(32) NOT NULL,
  `id_user` varchar(32) DEFAULT NULL,
  `date_register` varchar(32) DEFAULT NULL,
  `date_start` varchar(32) DEFAULT NULL,
  `date_end` varchar(32) DEFAULT NULL,
  `quantity` int(2) NOT NULL,
  `quantity_registed` int(2) DEFAULT 0,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `hocphan`
--

INSERT INTO `hocphan` (`id_module`, `id_subject`, `id_user`, `date_register`, `date_start`, `date_end`, `quantity`, `quantity_registed`, `status`) VALUES
(4, 1, NULL, '2020-02-18 21:53:05', '2020-02-18', '2020-02-18', 70, 0, 0),
(5, 2, NULL, '2020-02-18 21:53:05', '2020-02-18', '2020-02-18', 70, 0, 0),
(11, 1, NULL, '2020/02/20', '1/1/2020', '2/2/2020', 75, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `id_department` int(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_user` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`id_department`, `name`, `id_user`) VALUES
(0, 'Công nghệ thông tin', '1141460162');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khungdaotao`
--

CREATE TABLE `khungdaotao` (
  `id_department` int(32) NOT NULL,
  `id_subject` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `khungdaotao`
--

INSERT INTO `khungdaotao` (`id_department`, `id_subject`) VALUES
(0, 1),
(0, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id_class` int(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_specialized` int(32) NOT NULL,
  `id_user` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id_class`, `name`, `id_specialized`, `id_user`) VALUES
(1, 'Công nghệ thông tin 1', 1, NULL),
(2, 'Hệ thống thông tin 1', 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id_subject` int(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `credits` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id_subject`, `name`, `credits`) VALUES
(1, 'Lập trình C#', 4),
(2, 'Lập trình C++', 3),
(4, 'toán cao cấp', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `id_term` int(16) NOT NULL,
  `name` varchar(128) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`id_term`, `name`, `date_start`, `date_end`) VALUES
(1, 'Năm học 2020-2021', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghanh`
--

CREATE TABLE `nghanh` (
  `id_specialized` int(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_department` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `nghanh`
--

INSERT INTO `nghanh` (`id_specialized`, `name`, `id_department`) VALUES
(1, 'Công nghệ thôn tin', 0),
(2, 'Hệ thống thông tin', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phonghoc`
--

CREATE TABLE `phonghoc` (
  `id_room` int(2) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `phonghoc`
--

INSERT INTO `phonghoc` (`id_room`, `name`) VALUES
(1, 'Phòng 1'),
(2, 'Phòng 2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(256) NOT NULL,
  `id_department` int(32) NOT NULL,
  `id_class` int(32) DEFAULT NULL,
  `sex` varchar(1) NOT NULL DEFAULT '1',
  `phone` varchar(11) DEFAULT NULL,
  `possion` varchar(1) NOT NULL DEFAULT '0',
  `nationality` varchar(128) DEFAULT NULL,
  `wards` varchar(128) DEFAULT NULL,
  `district` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `image` varchar(1028) DEFAULT NULL,
  `id_card` varchar(13) DEFAULT NULL,
  `date_card` varchar(20) DEFAULT NULL,
  `address_card` varchar(256) DEFAULT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_user`, `password`, `name`, `id_department`, `id_class`, `sex`, `phone`, `possion`, `nationality`, `wards`, `district`, `city`, `image`, `id_card`, `date_card`, `address_card`, `status`) VALUES
('1', '1', '1', 0, 1, '1', '123', '0', '', '', '22222222', '', '', '123', '', '', 0),
('1141460160', '123456', 'Phạm Văn A', 0, NULL, '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
('1141460161', '123456', 'Phạm Văn B', 0, 2, '1', '1234', '2', 'Việt Nam', 'Thượng Cát', 'Bắc Từ Liêm', 'Hà Nội', 'IMG_20200219_1356321582107959586.jpg', '123', '', '', 0),
('1141460162', '123456', 'Phạm Văn C', 0, NULL, '1', '', '1', 'Việt Nam', 'Phường Tân Định', 'Quận 1', 'Hồ Chí Minh', '15820983546931582098378792.jpg', '1', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `id_lesson` int(2) NOT NULL,
  `id_room` int(2) NOT NULL,
  `id_weekday` int(1) NOT NULL,
  `id_module` int(32) NOT NULL,
  `status` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`id_lesson`, `id_room`, `id_weekday`, `id_module`, `status`) VALUES
(1, 1, 1, 4, 0),
(1, 1, 2, 7, 0),
(2, 1, 1, 11, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thutrongtuan`
--

CREATE TABLE `thutrongtuan` (
  `id_weekday` int(1) NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `thutrongtuan`
--

INSERT INTO `thutrongtuan` (`id_weekday`, `name`) VALUES
(1, 'Thứ Hai'),
(2, 'Thứ ba'),
(3, 'Thứ Tư'),
(4, 'Thứ Năm'),
(5, 'Thứ Sáu'),
(6, 'Thứ Bảy'),
(7, 'Chủ Nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiethoc`
--

CREATE TABLE `tiethoc` (
  `id_lesson` int(2) NOT NULL,
  `name` varchar(128) NOT NULL,
  `time_start` varchar(64) NOT NULL,
  `time_end` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Đang đổ dữ liệu cho bảng `tiethoc`
--

INSERT INTO `tiethoc` (`id_lesson`, `name`, `time_start`, `time_end`) VALUES
(1, 'Tiết 1', '07:00:00', '07:45:00'),
(2, 'Tiết 2', '08:00:00', '08:45:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethocphan`
--
ALTER TABLE `chitiethocphan`
  ADD PRIMARY KEY (`id_user`,`id_module`) USING BTREE,
  ADD KEY `FK_KQ1` (`id_module`);

--
-- Chỉ mục cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `FK_HP2` (`id_subject`),
  ADD KEY `FK_HP4` (`id_user`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id_department`),
  ADD KEY `FK_K1` (`id_user`);

--
-- Chỉ mục cho bảng `khungdaotao`
--
ALTER TABLE `khungdaotao`
  ADD PRIMARY KEY (`id_department`,`id_subject`) USING BTREE,
  ADD KEY `FK2K` (`id_subject`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id_class`),
  ADD KEY `FK_N1` (`id_specialized`),
  ADD KEY `FK_N2` (`id_user`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id_subject`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id_term`);

--
-- Chỉ mục cho bảng `nghanh`
--
ALTER TABLE `nghanh`
  ADD PRIMARY KEY (`id_specialized`),
  ADD KEY `FK` (`id_department`);

--
-- Chỉ mục cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  ADD PRIMARY KEY (`id_room`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `FK_tk2` (`id_department`),
  ADD KEY `FK_tk1` (`id_class`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`id_lesson`,`id_room`,`id_weekday`),
  ADD KEY `FK3` (`id_weekday`),
  ADD KEY `FK_TKB1` (`id_lesson`),
  ADD KEY `FK_TKB2` (`id_room`),
  ADD KEY `Fk_TKB3` (`id_module`);

--
-- Chỉ mục cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  ADD PRIMARY KEY (`id_weekday`);

--
-- Chỉ mục cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  ADD PRIMARY KEY (`id_lesson`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  MODIFY `id_module` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id_class` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id_subject` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `id_term` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `nghanh`
--
ALTER TABLE `nghanh`
  MODIFY `id_specialized` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phonghoc`
--
ALTER TABLE `phonghoc`
  MODIFY `id_room` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `thutrongtuan`
--
ALTER TABLE `thutrongtuan`
  MODIFY `id_weekday` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  MODIFY `id_lesson` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethocphan`
--
ALTER TABLE `chitiethocphan`
  ADD CONSTRAINT `FK_KQ1` FOREIGN KEY (`id_module`) REFERENCES `hocphan` (`id_module`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_KQ2` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hocphan`
--
ALTER TABLE `hocphan`
  ADD CONSTRAINT `FK_HP2` FOREIGN KEY (`id_subject`) REFERENCES `monhoc` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_HP4` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`);

--
-- Các ràng buộc cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD CONSTRAINT `FK_K1` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `khungdaotao`
--
ALTER TABLE `khungdaotao`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_department`) REFERENCES `khoa` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2K` FOREIGN KEY (`id_subject`) REFERENCES `monhoc` (`id_subject`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `FK_N1` FOREIGN KEY (`id_specialized`) REFERENCES `nghanh` (`id_specialized`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_N2` FOREIGN KEY (`id_user`) REFERENCES `taikhoan` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `nghanh`
--
ALTER TABLE `nghanh`
  ADD CONSTRAINT `FK` FOREIGN KEY (`id_department`) REFERENCES `khoa` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `FK_tk1` FOREIGN KEY (`id_class`) REFERENCES `lop` (`id_class`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_tk2` FOREIGN KEY (`id_department`) REFERENCES `khoa` (`id_department`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD CONSTRAINT `FK_TKB1` FOREIGN KEY (`id_lesson`) REFERENCES `tiethoc` (`id_lesson`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TKB2` FOREIGN KEY (`id_room`) REFERENCES `phonghoc` (`id_room`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TKB4` FOREIGN KEY (`id_weekday`) REFERENCES `thutrongtuan` (`id_weekday`),
  ADD CONSTRAINT `Fk_TKB3` FOREIGN KEY (`id_module`) REFERENCES `hocphan` (`id_module`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
