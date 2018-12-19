-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2018 lúc 01:46 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webmusic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbaihat`
--

CREATE TABLE `tblbaihat` (
  `id` int(10) NOT NULL,
  `BaiHat` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ChuDe` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgheSi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `noidung` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LuotNghe` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbaihat`
--

INSERT INTO `tblbaihat` (`id`, `BaiHat`, `ChuDe`, `NgheSi`, `ordernum`, `status`, `noidung`, `anh`, `anh_thumb`, `LuotNghe`) VALUES
(14, 'Anh Đang Ở Nơi Đâu', 'Tình yêu', 'Tóc Tiên', 2, 1, 'upload/Anh-Dang-O-Dau-Day-Anh-Huong-Giang.mp3', 'upload/512.png', 'upload/resized/512_thumb.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblchude`
--

CREATE TABLE `tblchude` (
  `id` int(10) NOT NULL,
  `ChuDe` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblchude`
--

INSERT INTO `tblchude` (`id`, `ChuDe`, `ordernum`, `Status`) VALUES
(1, 'Tình yêu', 1, 1),
(2, 'EDM', 2, 1),
(3, 'Coffee Time', 3, 1),
(4, 'Mưa', 4, 1),
(5, 'Gym', 5, 1),
(6, 'Việt Nam', 6, 0),
(7, 'Âu Mỹ', 7, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblnghesi`
--

CREATE TABLE `tblnghesi` (
  `id` int(10) NOT NULL,
  `NgheSi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `anh` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `anh_thumb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblnghesi`
--

INSERT INTO `tblnghesi` (`id`, `NgheSi`, `anh`, `anh_thumb`, `ordernum`, `status`) VALUES
(5, 'Tóc Tiên', 'upload/1523441118154_600.jpg', 'upload/resized/1523441118154_600_thumb.jpg', 1, 1),
(7, 'Karik', 'upload/1495165872455_600.jpg', 'upload/resized/1495165872455_600_thumb.jpg', 2, 1),
(8, 'Mr.Siro', 'upload/1505103180911_600.jpg', 'upload/resized/1505103180911_600_thumb.jpg', 3, 1),
(9, 'Sunmi', 'upload/cbbbeb2e3978db2e9ac6d10a000b9c1b.jpg', 'upload/resized/cbbbeb2e3978db2e9ac6d10a000b9c1b_th', 4, 1),
(10, 'Hyuna', 'upload/h.jpg', 'upload/resized/h_thumb.jpg', 5, 1),
(11, 'Tuấn Hưng', 'upload/1503913422094_600.jpg', 'upload/resized/1503913422094_600_thumb.jpg', 6, 1),
(12, 'Justin Timberlake', 'upload/1515058585711_600.jpg', 'upload/resized/1515058585711_600_thumb.jpg', 7, 1),
(13, 'Sơn Tùng', 'upload/1.jpg', 'upload/resized/1_thumb.jpg', 8, 1),
(14, 'Đàm Vĩnh Hưng', 'upload/1478675642158_600.jpg', 'upload/resized/1478675642158_600_thumb.jpg', 9, 1),
(15, 'Bùi Anh Tuấn', 'upload/1506075171981_600.jpg', 'upload/resized/1506075171981_600_thumb.jpg', 10, 1),
(16, 'Justin biebers', 'upload/ju.jpg', 'upload/resized/ju_thumb.jpg', 11, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int(10) NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluser`
--

INSERT INTO `tbluser` (`id`, `taikhoan`, `matkhau`, `hoten`, `dienthoai`, `email`, `diachi`, `status`) VALUES
(11, 'huy', '202cb962ac59075b964b07152d234b70', 'Đỗ Hương Trà', '01694014958', 'huongtra.saejin@gmail.com', '21', 1),
(12, 'linh', '202cb962ac59075b964b07152d234b70', 'Nguyễn Mỹ Linh', '01694014958', 'bener_98@yahoo.com.vn', '21', 1),
(13, 'trang', '202cb962ac59075b964b07152d234b70', 'nguyenthithom', '01694014958', 'huydm62@wru.vn', '10', 1),
(14, 'manh', '202cb962ac59075b964b07152d234b70', 'đình mạnh', '01694014958', 'huy123465@gmail.com', '10', 1),
(15, 'tung', '202cb962ac59075b964b07152d234b70', 'dohuongtra', '01694014958', 'gg@gmail.com', '21', 1),
(16, 'tinhyeu', '202cb962ac59075b964b07152d234b70', 'Đỗ Hương Trà', '01694014958', 'huyhuy@yahoo.com', '21', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblvideo`
--

CREATE TABLE `tblvideo` (
  `id` int(10) NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `ordernum` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  `title` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tblvideo`
--

INSERT INTO `tblvideo` (`id`, `link`, `ordernum`, `status`, `title`) VALUES
(17, 'https://www.youtube.com/watch?v=t7tZFq29lis', 1, 1, 'HongKong1 | OFFICIAL MV'),
(18, 'https://www.youtube.com/watch?v=DK_0jXPuIr0', 2, 1, 'Justin Bieber - What Do You Mean?'),
(19, 'https://www.youtube.com/watch?v=PYGODWJgR-c', 3, 1, 'Wonder Girls \"Why So Lonely\" M/V'),
(20, 'https://www.youtube.com/watch?v=vcqImqOVE2U', 4, 1, '[MV] HyunA(현아) _ Lip & Hip'),
(21, 'https://www.youtube.com/watch?v=ur0hCdne2-s', 6, 1, '[MV] SUNMI(선미) _ Gashina(가시나)'),
(22, 'https://www.youtube.com/watch?v=F4qfN5UeFvQ', 5, 1, '[MV] SUNMI (선미) _ Heroine (주인공)'),
(23, 'https://www.youtube.com/watch?v=6GUm5g8SG4o', 34, 1, 'R. City - Locked Away ft. Adam Levine'),
(24, 'https://www.youtube.com/watch?v=kJQP7kiw5Fk', 1, 1, 'Luis Fonsi - Despacito ft. Daddy Yankee');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblbaihat`
--
ALTER TABLE `tblbaihat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblchude`
--
ALTER TABLE `tblchude`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblnghesi`
--
ALTER TABLE `tblnghesi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tblvideo`
--
ALTER TABLE `tblvideo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbaihat`
--
ALTER TABLE `tblbaihat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tblchude`
--
ALTER TABLE `tblchude`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tblnghesi`
--
ALTER TABLE `tblnghesi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
