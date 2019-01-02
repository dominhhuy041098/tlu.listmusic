-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2019 lúc 01:48 PM
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
(20, 'What Do You Mean', 'Âu Mỹ', 'Justin biebers', 10, 1, 'upload/What Do You Mean Acoustic Vers... - Justin Bieber (NhacPro.net).mp3', 'upload/j.jpg', 'upload/resized/j_thumb.jpg', 0),
(21, 'Baby', 'Âu Mỹ', 'Justin biebers', 2, 1, 'upload/Baby - Justin Bieber Ludacris (NhacPro.net).mp3', 'upload/220px-Babycoverart.jpg', 'upload/resized/220px-Babycoverart_thumb.jpg', 0),
(23, 'Rồi anh sẽ quên', 'Việt Nam', 'Đàm Vĩnh Hưng', 1, 1, 'upload/Roi Anh Se Quen New Version Re... - Dam Vinh Hung (NhacPro.net).mp3', 'upload/512 - Copy.png', 'upload/resized/512 - Copy_thumb.png', 0),
(24, 'Chạy ngay đi', 'EDM', 'Sơn Tùng', 6, 1, 'upload/Chay Ngay Di Onionn Remix - Son Tung M TP (NhacPro.net)_2.mp3', 'upload/maxresdefault (1).jpg', 'upload/resized/maxresdefault (1)_thumb.jpg', 0),
(25, 'Thanh xuân của chúng ta', 'Tình yêu', 'Bùi Anh Tuấn', 4, 1, 'upload/Thanh Xuan Cua Chung Ta - Bui Anh Tuan Bao Anh (NhacPro.net).mp3', 'upload/dd.jpg', 'upload/resized/dd_thumb.jpg', 0),
(26, 'Siren', 'Coffee Time', 'Sunmi', 10, 1, 'upload/Siren - Sunmi (NhacPro.net).mp3', 'upload/maxresdefault (3).jpg', 'upload/resized/maxresdefault (3)_thumb.jpg', 0),
(27, 'Tan', 'Coffee Time', 'Tuấn Hưng', 9, 1, 'upload/Tan - Tuan Hung (NhacPro.net).mp3', 'upload/maxresdefault (4).jpg', 'upload/resized/maxresdefault (4)_thumb.jpg', 0),
(28, 'Lip and Hip ', 'EDM', 'Hyuna', 10, 1, 'upload/LipHip3DAudio-HyunA-5468910.mp3', 'upload/maxresdefault (5).jpg', 'upload/resized/maxresdefault (5)_thumb.jpg', 0),
(29, 'Gashina', 'Gym', 'Sunmi', 11, 1, 'upload/GashinaAreiaRemix-Summi-5302721.mp3', 'upload/original.png', 'upload/resized/original_thumb.png', 0),
(30, 'Far away', 'Coffee Time', 'Karik', 15, 1, 'upload/FarAway-KayTranTronieNgo-5810154.mp3', 'upload/maxresdefault (6).jpg', 'upload/resized/maxresdefault (6)_thumb.jpg', 0),
(31, 'Thành phố xa lạ', 'Coffee Time', 'Tóc Tiên', 34, 1, 'upload/ThanhPhoXaLa-PhungKhanhLinh-5791553.mp3', 'upload/ttt.jpg', 'upload/resized/ttt_thumb.jpg', 0),
(32, '24h', 'Coffee Time', 'Mr.Siro', 34, 1, 'upload/ThanhPhoXaLa-PhungKhanhLinh-5791553.mp3', 'upload/1544596919931.jpg', 'upload/resized/1544596919931_thumb.jpg', 0),
(34, 'Let Me Love You (Zedd Remix) ', 'Coffee Time', 'Justin biebers', 15, 1, 'upload/Let Me Love You Zedd Remix - DJ Snake Zedd Justin Bieber (NhacPro.net).mp3', 'upload/DJ-Snake-Justin-Bieber-Let-me-love-you.jpg', 'upload/resized/DJ-Snake-Justin-Bieber-Let-me-love-', 0),
(36, 'Where Are Ü Now ', 'Coffee Time', 'Justin biebers', 15, 1, 'upload/Where Are U Now - Justin Bieber Jack U (NhacPro.net).mp3', 'upload/00078226.jpg', 'upload/resized/00078226_thumb.jpg', 0),
(37, 'Despacito (Remix) ', 'EDM', 'Justin biebers', 16, 1, 'upload/Despacito Remix - Luis Fonsi Daddy Yankee Justin... (NhacPro.net).mp3', 'upload/k.jpg', 'upload/resized/k_thumb.jpg', 0),
(38, 'Nonstop Vũ Điệu Cồng Chiêng 2015', 'EDM', 'Tóc Tiên', 17, 1, 'upload/Nonstop Vu Dieu Cong Chieng 20... - DJ Bao Linh (NhacPro.net).mp3', 'upload/hqdefault.jpg', 'upload/resized/hqdefault_thumb.jpg', 0),
(39, 'Quan Trọng Là Thần Thái', 'Gym', 'Karik', 18, 1, 'upload/Quan Trong La Than Thai - OnlyC Karik (NhacPro.net).mp3', 'upload/3_98516.jpg', 'upload/resized/3_98516_thumb.jpg', 0),
(40, 'Càng Níu Giữ Càng Dễ Mất', 'Mưa', 'Mr.Siro', 20, 1, 'upload/Cang Niu Giu Cang De Mat - Mr Siro (NhacPro.net).mp3', 'upload/ss.jpg', 'upload/resized/ss_thumb.jpg', 0),
(41, 'Babe', 'Gym', 'Hyuna', 19, 1, 'upload/Babe - HyunA (NhacPro.net).mp3', 'upload/0.jpg', 'upload/resized/0_thumb.jpg', 0),
(42, 'Nắm Lấy Tay Anh', 'Tình yêu', 'Tuấn Hưng', 21, 1, 'upload/Nam Lay Tay Anh - Tuan Hung (NhacPro.net).mp3', 'upload/tuan-hung.jpg', 'upload/resized/tuan-hung_thumb.jpg', 0),
(43, 'Lạc trôi', 'Mưa', 'Sơn Tùng', 22, 1, 'upload/Lac Troi Beat - Son Tung M TP (NhacPro.net).mp3', 'upload/ds.jpg', 'upload/resized/ds_thumb.jpg', 0),
(44, 'Cant stop the feeling', 'Coffee Time', 'Justin biebers', 23, 1, 'upload/Can t Stop The Feeling Film Ve... - Justin Timberlake Anna Kendric... (NhacPro.net).mp3', 'upload/dsss.jpg', 'upload/resized/dsss_thumb.jpg', 0);

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
(14, 'Đàm Vĩnh Hưng', 'upload/d.jpg', 'upload/resized/d_thumb.jpg', 9, 1),
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
  `role` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbluser`
--

INSERT INTO `tbluser` (`id`, `taikhoan`, `matkhau`, `hoten`, `dienthoai`, `email`, `diachi`, `role`, `status`) VALUES
(11, 'huy', '202cb962ac59075b964b07152d234b70', 'Đỗ Hương Trà', '01694014958', 'huongtra.saejin@gmail.com', '21', ',Chủ đề-add_cd.php-list_cd.php-edit_cd.php-delete_cd.php,Nghệ sĩ-add_ns.php-list_ns.php-edit_ns.php-delete_ns.php,Quản lý bài hát-add_bh.php-list_bh.php-edit_bh.php-delete_bh.php,Quản lý Video-add_vd.php-list_vd.php-edit_vd.php-delete_vd.php,Quản lý User-add_user.php-list_user.php-edit_user.php-delete_user.php', 1),
(14, 'manh', '202cb962ac59075b964b07152d234b70', 'đình mạnh', '01694014958', 'huy123465@gmail.com', '10', ',Quản lý User-add_user.php-list_user.php-edit_user.php-delete_user.php', 1),
(15, 'tung', '202cb962ac59075b964b07152d234b70', 'dohuongtra', '01694014958', 'gg@gmail.com', '21', ',Quản lý User-add_user.php-list_user.php-edit_user.php-delete_user.php', 1),
(16, 'tinhyeu', '202cb962ac59075b964b07152d234b70', 'Đỗ Hương Trà', '01694014958', 'huyhuy@yahoo.com', '21', ',Chủ đề-add_cd.php-list_cd.php-edit_cd.php-delete_cd.php,Nghệ sĩ-add_ns.php-list_ns.php-edit_ns.php-delete_ns.php,Quản lý bài hát-add_bh.php-list_bh.php-edit_bh.php-delete_bh.php,Quản lý Video-add_vd.php-list_vd.php-edit_vd.php-delete_vd.php', 1),
(18, 'sang', '202cb962ac59075b964b07152d234b70', 'Đỗ Hương Trà', '01694014958', 'huongtra.s21aejin@gmail.com', '21', ',Chủ đề-add_cd.php-list_cd.php-edit_cd.php-delete_cd.php,Nghệ sĩ-add_ns.php-list_ns.php-edit_ns.php-delete_ns.php,Quản lý bài hát-add_bh.php-list_bh.php-edit_bh.php-delete_bh.php,Quản lý Video-add_vd.php-list_vd.php-edit_vd.php-delete_vd.php', 1);

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `tblchude`
--
ALTER TABLE `tblchude`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tblnghesi`
--
ALTER TABLE `tblnghesi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
